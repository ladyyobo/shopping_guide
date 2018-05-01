<?php
    class UserDisease extends DatabaseObject{
        //class attributes
        public $id;
        public $user_id;
        public $disease_id;


        //databaseobject requirements
        protected static $table_name = "user_disease";
        protected static $db_fields = array('id' , 'user_id' , 'disease_id');
    }

?>
