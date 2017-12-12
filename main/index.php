<?php
    //the home page of the system 
    //it takes a specified product id {prod_id} from the url params
    //and return the corresponding product information


    //include the initialization file which contains 
    //all the files required for operations on this page
    include("../includes/initialize.php");
    
    //access the information from the url params {$_GET['prod_id']} 
    //and stores  it in a varaible {$product_id}
    $product_id = $_GET['prod_id'];

    //fetching the product information based on the product id
    $product = Product::find_by_id($product_id);
    $product->image = "images/".$product->image;

    //converting to JSON format
    //(1) convert the received object to an array
     $product_array = array();
     $product_array["product"] = get_object_vars($product);
    //$product_array = get_object_vars($product);

    //(2) encode as JSON
    $json_data  = json_encode($product_array);
    
    //displaying the requested information
    header('Content-Type: application/json');
    echo $json_data;


?>
