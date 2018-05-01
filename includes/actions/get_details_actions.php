<?php 
    include('../initialize.php');

    $product_id = $_GET['product_id'];

    if($_GET['info_type'] == 'effect'){
        $table_1 = "effect";
        $table_2 = "product_effect";
        $field = "effect_id";
    } elseif($_GET['info_type'] == 'nutrient') {
        $table_1 = "nutrient";
        $table_2 = "nutritional_value";
        $field = "nutri_id";
    }

    $sql = "SELECT * FROM $table_1 WHERE id NOT IN "
            ."(SELECT $field FROM $table_2 WHERE product_id='$product_id')";

    if ($_GET['info_type'] == 'effect'){
        $effects = Effect::find_by_sql($sql);
    } else {
        $effects = Nutrient::find_by_sql($sql);
    }
    
        
    $display = "<select name=\"$field\" class=\"form-control\">";
    foreach($effects as $effect){
        if ($_GET['info_type'] == 'effect'){
            $display .= "<option value=\"$effect->id\">".strtoupper($effect->description)."</option>\n";
        } else {
            $display .= "<option value=\"$effect->id\">".strtoupper($effect->name)."</option>\n";
        }
        
    }
    $display .= "</select>";

    echo $display;

?>