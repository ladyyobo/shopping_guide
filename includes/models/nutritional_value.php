<?php  
    class NutritionalValue extends DatabaseObject{
        //class attributes
        public $id;
        public $percentage;
        public $product_id;
        public $nutri_id;
        
        //databaseobject requirements 
        protected static $table_name = "nutritional_value";
        protected static $db_fields = array('id' , 'percentage', 'product_id', 'nutri_id');
    }
?>