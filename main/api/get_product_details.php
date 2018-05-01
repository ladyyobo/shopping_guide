<?php include('../../includes/initialize.php');

    if($_POST) {
        //data supplied to API
        $user_id = trim($_POST['user_id']);
        $product_id = trim($_POST['product_id']);

        //get user details
        $user = SystemUser::find_by_id($user_id);
        //get product details
        $product = Product::find_by_id($product_id);

        $nutri_values_response = $product->get_nutri_values();

        //getting the recommendations based the bmi_meaning
        //$recommendations = $product->recommendations($user->get_bmi_meaning());
        $recommendations = $user->recommendations($product);

        //converting the product details into an array
        $product_info = get_object_vars($product);

        echo json_encode(array(
            "product"=>$product_info,
            "values"=>$nutri_values_response,
            "recommendations"=>$recommendations
        ));
    } else {
        echo json_encode(array("status"=>204, "message"=>"no data submitted"));
    }
    ?>
