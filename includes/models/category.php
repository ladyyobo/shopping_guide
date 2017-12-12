<?php 
    class Category extends DatabaseObject{
        //class attributes
        public $id;
        public $name;
        
        //databaseobject requirements 
        protected static $table_name = "category";
        protected static $db_fields = array('id' , 'name');
    }

?>