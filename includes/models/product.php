<?php 
    class Product extends DatabaseObject{
        //class attributes
        public $id;
        public $name;
        public $cat_id;
        public $manufacturer;
        public $image;
        
        //databaseobject requirements 
        protected static $table_name = "product";
        protected static $db_fields = array('id' , 'name', 'cat_id', 'manufacturer','image');
    }

?>