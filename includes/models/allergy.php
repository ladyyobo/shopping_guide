<?php
    class Allergy extends DatabaseObject{
        //class attributes
        public $id;
        public $allergy;

        //databaseobject requirements
        protected static $table_name = "allergy";
        protected static $db_fields = array('id' , 'allergy');
    }

?>
