<?php
   //includes db config
   include("../initialize.php");

   if($_POST){
      $category=new Category();
      $category->name = $_POST['cat_name'];
      if($category->create()){
        header('location:../../main/admin/index.php?page=add_category&status=1');
      } else{
        header('location:../../main/admin/index.php?page=add_category&status=0');
      }
   } else {
       header('location:../../main/admin/index.php?page=add_category&status=0');
   }
?>
