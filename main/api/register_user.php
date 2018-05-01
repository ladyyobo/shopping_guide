<?php
   include('../../includes/initialize.php');
   if ($_POST) {
     $system_user = new SystemUser();

     //set fields from the data submission
     $system_user->name = $_POST['name'];
     $system_user->dob = $_POST['dob'];
      $system_user->weight = $_POST['weight'];
       $system_user->height = $_POST['height'];
        $system_user->email = $_POST['email'];
         $system_user->user_password = $_POST['user_password'];

         //set the allergies
         $allergies = array();
         foreach ($_POST as $key => $value) {
           if (stristr($key, 'alle_')) {
             $allergies[] = $value;
           }
         }

         //set the diseases
         $diseases = array();
         foreach ($_POST as $key => $value) {
           if (stristr($key, 'disease_')) {
             $diseases[] = $value;
           }
         }

         if ($system_user->create()) {
           $status = true;
           //create the user_diseases
           foreach ($diseases as $disease_id) {
             $user_disease = new UserDisease();
             $user_disease-> user_id = $system_user->id;
             $user_disease->disease_id = $disease_id;
             $status = $status && $user_disease->create();
           }

           //create the user_allergies
           foreach ($allergies as $allergy_id ) {
             $user_allergies = new UserAllergy();
             $user_allergies-> user_id = $system_user->id;
             $user_allergies->allergy_id = $allergy_id;
             $status = $status && $user_allergies->create();
           }

           if ($status) {
              echo json_encode(array("status"=>200, "message"=>"successfully created new user"));
           } else {
              echo json_encode(array("status"=>406, "message"=>"failed to record disease and allergies"));
           }
         }else {
           echo json_encode(array("status"=>406, "message"=>"failed to create new user"));
         }

   } else {
     echo json_encode(array("status"=>204, "message"=>"no data submitted"));
   }

?>
