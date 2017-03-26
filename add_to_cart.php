<?php
   // include("lib_db.php");
    include("shopping_cart_action.php");
    $rawid = isset($_GET["id_sp"]) ? $_GET["id_sp"] : "";
    echo $rawid;
    $id_sp = intval($rawid);
    if(!(empty($rawid) || $rawid == null) && $id_sp != 0){
        add_to_cart(intval($rawid));
    }else{
       // logDebug("ERROR : We should never get to without a ProductId.");
    }
    header('location:cart.php');
?>