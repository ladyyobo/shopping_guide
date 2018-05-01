<?php
    class Disease extends DatabaseObject{
        //class attributes
        public $id;
        public $disease_name;


        //databaseobject requirements
        protected static $table_name = "disease";
        protected static $db_fields = array('id' , 'disease_name');
    }

?>
