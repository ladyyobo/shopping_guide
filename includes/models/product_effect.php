<?php 
    class ProductEffect extends DatabaseObject{
        //class attributes
        public $id;
        public $product_id;
        public $effect_id;
  
        
        //databaseobject requirements 
        protected static $table_name = "product_effect";
        protected static $db_fields = array('id' , 'product_id', 'effect_id');
    }

?>