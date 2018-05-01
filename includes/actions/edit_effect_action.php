<?php
   //includes db config
   include("../initialize.php");

   if($_POST){
      $effect=Effect::find_by_id($_POST['effect_id']);
    //  $effect->type = $_POST['type'];
    //  $effect->description = $_POST['description'];


      foreach ($_POST as $index => $value) {
        $effect->$index = $value;
      }
      if($effect->update()){
        header('location:../../main/admin/index.php?page=add_effect&status=1');
      } else{
        header('location:../../main/admin/index.php?page=add_effect&status=0');
      }
   } else {
       header('location:../../main/admin/index.php?page=add_effect&status=0');
   }
?>
