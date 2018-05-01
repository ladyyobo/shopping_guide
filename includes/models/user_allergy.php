<?php
    class UserAllergy extends DatabaseObject{
        //class attributes
        public $id;
        public $user_id;
        public $allergy_id;


        //databaseobject requirements
        protected static $table_name = "user_allergy";
        protected static $db_fields = array('id' , 'user_id' , 'allergy_id');
    }

?>
