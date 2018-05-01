<?php
    class SystemUser extends DatabaseObject{
        //class attributes
        public $id;
        public $name;
        public $dob;
        public $weight;
        public $height;
        public $email;
        public $user_password;

        //BMI Constants
        public static $UNDER_WEIGHT = "underweight";
        public static $NORMAL = "normal";
        public static $OVER_WEIGHT = "overweight";
        public static $OBESE = "obese";

        //databaseobject requirements
        protected static $table_name = "system_user";
        protected static $db_fields = array('id' , 'name', 'dob', 'weight', 'height',
                                            'email', 'user_password');


        //bmi calculating function
        public function get_bmi(){
            return round($this->weight/ ($this->height * $this->height), 1);
        }

        //get BMI interpretation
        public function get_bmi_meaning(){
            $status = "";
            if($this->get_bmi() < 18.5){
                $status = self::$UNDER_WEIGHT;
            } elseif($this->get_bmi() <= 24.9){
                $status = self::$NORMAL;
            } elseif($this->get_bmi() <= 29.9){
                $status = self::$OVER_WEIGHT;
            } else {
                $status = self::$OBESE;
            }

            return $status;
        }

        //get the fat recommendation for a product
        private function fat_recommd($percentage ,  $bmi_meaning){
            $response = "";

            if (($percentage >= 50 && $bmi_meaning == SystemUser::$UNDER_WEIGHT) ||
               ($bmi_meaning == SystemUser::$NORMAL) ||
               ($percentage < 50 && $bmi_meaning == SystemUser::$OVER_WEIGHT) ||
               ($percentage < 50 && $bmi_meaning == SystemUser::$OBESE)){
                    $response = 111;
            } elseif (($percentage < 50 && $bmi_meaning == SystemUser::$UNDER_WEIGHT) ||
               ($percentage >= 50 && $bmi_meaning == SystemUser::$OVER_WEIGHT) ) {
                    $response = 222;
            //} elseif ($percentage >= 50 && $bmi_meaning == SystemUser::$OBESE) {
            } else {
                    $response = 333;
            }
            return $response;
        }

        //get recommendations for product
        public function recommendations($product, $recall=0){
            $bmi_meaning = $this->get_bmi();

            $nutri_values = $product->get_nutri_values();
            $response = array();


            foreach ($nutri_values as $nutri_value) {

                if(trim($nutri_value["nutrient"]) == "Fat"){
                    $code = $this->fat_recommd($nutri_value["percentage"], $bmi_meaning);

                    // echo $code;
                    if ($code == 111 ){/*&& $recall == 0){
                        //product is good for your health
                        $response['text'] = $this->recommendation_text($code);
                    } elseif($code == 111 && $recall != 0) {
                        $response['text'] = $this->recommendation_text($code);*/
                        $response[] = $this->recommendation_text($code);


                   } elseif($code == 222 ) {
                       //this product is not good for you health
                    // $better_product = $this->get_better_products($product);
                    // //finding better products
                    //     if($better_product != null){
                    //         foreach ($better_product as $bproduct) {
                    //             $response['products'][] = $this->recommendations($bproduct);
                    //         }
                    //     }
                    $sql = "SELECT p.* FROM product p JOIN nutritional_value nv ON p.id=nv.product_id "
                          ." WHERE p.cat_id='{$product->cat_id}' AND "
                          ."NOT p.id='{$product->id}' AND nv.nutri_id='1' AND nv.percentage>='".$nutri_value["percentage"]."'";
                    $response = $this->get_better_products($product, $sql);

                  } elseif($code==333 ) {
                    $sql = "SELECT p.* FROM product p JOIN nutritional_value nv ON p.id=nv.product_id "
                          ." WHERE p.cat_id='{$product->cat_id}' AND "
                          ."NOT p.id='{$product->id}' AND nv.nutri_id='1' AND nv.percentage<='".$nutri_value["percentage"]."'";
                    $response = $this->get_better_products($product, $sql);
                  }
                } else {

                }

            }
            return $response;
        }

        //product recommendation text
        private function recommendation_text($code=0){
            $recommendation_text = "";

            switch ($code) {
                case 111:
                    $recommendation_text = "This product is good for your health.";
                    break;

                case 222:
                    $recommendation_text = "This product may have implications on your health.";
                    break;

                case 333:
                    $recommendation_text = "This product is highly dangerous to your health.";
                    break;

                default:
                    # code...
                    break;
            }

            return $recommendation_text;
        }

        //get better products for user
        public function get_better_products($product, $sql){
            //echo $sql;
            $response = array();
            $products = Product::find_by_sql($sql);


            if(count($products) == 0){
                //$response['status'] = "no products found";
                $response = null;
            } else {
                // $response['status'] = "products found";
                // foreach($products as $product){
                //  $response['recommended_products'][] = get_object_vars($product);
                // }
                $response = $products;

            }
            return $response;
        }
    }
?>
