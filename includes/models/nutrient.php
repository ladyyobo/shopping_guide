<?php  
    class Nutrient extends DatabaseObject{
        //class attributes
        public $id;
        public $name;
        
        //databaseobject requirements 
        protected static $table_name = "nutrient";
        protected static $db_fields = array('id' , 'name');
    }
?>