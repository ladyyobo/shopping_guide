<?php
    class Product extends DatabaseObject{
        //class attributes
        public $id;
        public $name;
        public $cat_id;
        public $manufacturer;
        public $image;

        //related objects
        public $nutritionalvalue;
        public $nutrients;

        //databaseobject requirements
        protected static $table_name = "product";
        protected static $db_fields = array('id' , 'name', 'cat_id', 'manufacturer','image');

        public function Product(){
            $nutritionalvalue = array();
            $nutrients = array();
        }

        public function get_nutri_values(){
            //get the nutritional value of the product
            $sql = "SELECT * FROM nutritional_value WHERE product_id='{$this->id}'";
            $this->nutritionalvalue = NutritionalValue::find_by_sql($sql);

            //forming the response for the nutritional value
            $nutri_values_response = array();
            $index = 0;
            foreach($this->nutritionalvalue as $nutri_value){
                $name = Nutrient::find_by_id($nutri_value->nutri_id)->name;
                $this->nutrients[] = $name;
                $nutri_values_response[$index]['nutrient'] = $name;
                $nutri_values_response[$index]['percentage'] = $nutri_value->percentage;
                $index++;
            }

            return $nutri_values_response;
        }

        // public function recommendations($bmi_meaning){
        //     $nutri_values = $this->get_nutri_values();
        //     $response = array();

        //     foreach ($nutri_values as $nutri_value) {
        //         if(trim($nutri_value["nutrient"]) == "fat"){
        //             $code = $this->fat_recommd($nutri_value["percentage"], $bmi_meaning);
        //             if ($code == 111){
        //                 $response['text'] = $this->recommendation_text($code);
        //             } else {
        //                 $response['products'] = $this->get_better_products();
        //             }
        //         } else {
        //         }

        //     }
        //     return $response;
        // }

        // private function fat_recommd($percentage ,  $bmi_meaning){
        //     $response = "";

        //     if (($percentage >= 50 && $bmi_meaning == SystemUser::$UNDER_WEIGHT) ||
        //        ($bmi_meaning == SystemUser::$NORMAL) ||
        //        ($percentage < 50 && $bmi_meaning == SystemUser::$OVER_WEIGHT) ||
        //        ($percentage < 50 && $bmi_meaning == SystemUser::$OBESE)){
        //             $response = 111;
        //     } elseif (($percentage < 50 && $bmi_meaning == SystemUser::$UNDER_WEIGHT) ||
        //        ($percentage >= 50 && $bmi_meaning == SystemUser::$OVER_WEIGHT) ) {
        //             $response = 222;
        //     } elseif ($percentage >= 50 && $bmi_meaning == SystemUser::$OBESE) {
        //             $response = 333;
        //     }
        //     return $response;
        // }

        // private function recommendation_text($code=0){
        //     $recommendation_text = "";

        //     switch ($code) {
        //         case 111:
        //             $recommendation_text = "This product is good for your health.";
        //             break;

        //         case 222:
        //             $recommendation_text = "This product may have implications on your health.";
        //             break;

        //         case 333:
        //             $recommendation_text = "This product is highly dangerous to your health.";
        //             break;

        //         default:
        //             # code...
        //             break;
        //     }

        //     return $recommendation_text;
        // }

    }

?>
