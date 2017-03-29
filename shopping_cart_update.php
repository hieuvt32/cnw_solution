<?php
    include_once("shopping_cart_action.php");
    $shoppingcart = new shopping_cart_actions();
    $array = $_REQUEST['diameters'];
    $cart_id = $_REQUEST['cart_id'];
    var_dump($array);
    $cartupdate = array();
    foreach ($array as $key) {
        $object = new shopping_cart_update();
        $object->product_id = $key['product_id'];
        echo $key['product_id'];
        $object->purchase_quantity = $key['purchase_quantity'];
        echo $key['purchase_quantity'];
        $object->remove_item = isset($key['remove_item']) ? $key['remove_item'] : false;
        array_push($cartupdate,$object);
    }
    $shoppingcart->update_cart($cart_id,$cartupdate);
    //header("location:cart.php");
?>