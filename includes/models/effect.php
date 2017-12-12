<?php 
    class Effect extends DatabaseObject{
        //class attributes
        public $id;
        public $description;
        public $type;
        
        //databaseobject requirements 
        protected static $table_name = "effect";
        protected static $db_fields = array('id' , 'description', 'type');
    }

?>