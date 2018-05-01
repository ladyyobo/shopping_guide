<?php
  include('../../includes/initialize.php');
  if ($_SERVER["REQUEST_METHOD"]=="POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql= "SELECT * FROM system_user WHERE email='$email' AND user_password = '$password'";
    $systemuser=SystemUser::find_by_sql($sql);
    $user= array_shift($systemuser);

    if($user){
      $array = get_object_vars($user);
      // echo json_encode(array("status" =>200, "message"=>"user details found","user_details"=>$array));
      echo json_encode($array);

    }
      else {
        echo json_encode(array("status"=>406, "message"=>"invalid user details"));

    }
  }
  else {
    echo json_encode(array("status"=>204, "message"=>"no data submitted"));
  }
?>
