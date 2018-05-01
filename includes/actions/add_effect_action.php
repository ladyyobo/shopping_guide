<?php
   //includes db config
   include("../initialize.php");

   if($_POST){
      $effect=new Effect();
      $effect->type = $_POST['type'];
      $effect->description = $_POST['description'];

      if($effect->create()){
        header('location:../../main/admin/index.php?page=add_effect&status=1');
      } else{
        header('location:../../main/admin/index.php?page=add_effect&status=0');
      }
   } else {
       header('location:../../main/admin/index.php?page=add_effect&status=0');
   }
?>
