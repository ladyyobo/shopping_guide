<?php 

 include("../includes/initialize.php");
 
 $product = new Product();
 $product->id = $_POST['id'];
 $product->name = $_POST['name'];
 $product->cat_id = $_POST['cat_id'];
 $product->manufacturer = $_POST['manufacturer'];
 $product->image = "img_".rand(1, 500).".jpeg";

 if ( file_put_contents("../images/".$product->image, base64_decode($_POST['image'])  && $product->create() )){
     echo json_encode([
         "message" => "file upload successfull",
         "status" => "ok"
     ]);
 } else {
     echo json_encode([
         "message" => "file upload failed",
         "status" => "error"
     ]);
        // echo json_encode($product);
 }

?>