<?php 
//page to store product info
//fields :: id,name,cat_id,manufacturer, image

 include("../includes/initialize.php");

 $product = new Product();
 $product->id = 2;
 $product->cat_id = 3; 
 $product->name = $_POST['name'];
 $product->manufacturer = $_POST['manufacturer'];
 $image  = $_POST['image'];
 $product->image = "img_" .$product->name.".jpeg" ;
 //modified product class {public $image}
 //added image in db table
 //created images folder


 if($product->save() && file_put_contents("../images/".$product->image, base64_decode($image))){
        echo json_encode([
            "message" => " file upload successfull",
            "status" => "ok"
        ]);
 } else {
        echo json_encode([
            "message" => " file upload failed",
            "status" => "error"
        ]);
       
 }

?>