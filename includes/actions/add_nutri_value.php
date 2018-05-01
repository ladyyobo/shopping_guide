<?php 
     //includes db config files
    include("../initialize.php");

    //checking if data is submitted to this script
    if( $_POST) {
        $nutri_value = new NutritionalValue();
        foreach($_POST as $key => $value){
            $nutri_value->$key = $value;
        }
        $nutri_value->id = 0;

        if( $nutri_value->create()){
            header('location:../../main/admin/index.php?page=add_nutri_value&status=1');
        } else {
            header('location:../../main/admin/index.php?page=add_nutri_value&status=0');   
        }
    } else {
            header('location:../../main/admin/index.php?page=add_nutri_value&status=0');
    }
?>