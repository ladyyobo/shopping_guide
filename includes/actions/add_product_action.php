<?php
   //includes db config
   include("../initialize.php");

   if($_POST){
      $product=new Product();
      $product->id = $_POST['id'];
      $product->name = $_POST['name'];
      $product->cat_id= $_POST['cat_id'];
      $product->manufacturer = $_POST['manufacturer'];

      $file_info= pathinfo($_FILES["image"]["name"]);
      $ext = $file_info["extension"];
      $image_name = "img_" . rand(10000 , 99999). "." . $ext;
      $product->image = $image_name;

      if($product->create() && move_uploaded_file($_FILES["image"]["tmp_name"], "../../images/".$image_name)){

        header('location:../../main/admin/index.php?page=add_product&status=1');
      } else{
        header('location:../../main/admin/index.php?page=add_product&status=2');
      }
   } else {
       header('location:../../main/admin/index.php?page=add_product&status=0');
   }
?>
