<?php
   //includes db config
   include("../initialize.php");

   if($_POST){
      $category= Category::find_by_id($_POST['cat_id']);
      $category->name = $_POST['cat_name'];
      if($category->update()){
        header('location:../../main/admin/index.php?page=man_categories&status=1');
      } else{
        header('location:../../main/admin/index.php?page=man_categories&status=0');
      }
   } else {
       header('location:../../main/admin/index.php?page=man_categories&status=0');
   }
?>
