<?php 
     //includes db config files
    include("../initialize.php");

    //checking if data is submitted to this script
    if( $_POST) {
        $product_effect = new ProductEffect();
        $product_effect->id =0;
        $product_effect->effect_id = $_POST['effect_id'];
        $product_effect->product_id = $_POST['product_id'];
        if( $product_effect->create()){
            header('location:../../main/admin/index.php?page=add_product_effect&status=1');
        } else {
            header('location:../../main/admin/index.php?page=add_product_effect&status=0');   
        }
    } else {
            header('location:../../main/admin/index.php?page=add_product_effect&status=0');
    }
?>