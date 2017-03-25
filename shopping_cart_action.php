<?php
    include("lib_db.php");
    define("cart_action_key","cart_id");
    
    function add_to_cart($id)
    {
        $cart_id = get_cart_id();
        $sql = "select * from cart_item";
        $sql .= "where cart_id={$cart_id} && id_sp={$id}";
        $cart_item = select_one($sql);
        if($cart_item == null){
            $guid = com_create_guid();
            $insert_sql = "insert into cart_item(item_id,id_sp,cart_id,quantity) values(";
            $insert_sql .= "$guid,";
            $insert_sql .= "$id,";
            $insert_sql .= "$cart_id,";
            $insert_sql .= "1)";
            $exec_update($insert_sql);
        }else{
            $quantity = $cart_item['quantity']++;
            $update_sql = "update cart_item set quantity={$quantity} where {$cart_item["item_id"]}";
        }
    }

    function get_cart_id()
    {
        $key = $_SESSION[constant("cart_action_key")];
        if(!isset($key)){
            if(isset($_SESSION["user"])){
                $user = $_SESSION["user"];
                $_SESSION[$key] = $user["username"];
            }else {
                 $guid = com_create_guid();
                 $_SESSION[$key] = "" . $guid;
            }
        }
        return "" . $_SESSION[$key];
    }

    function get_cart_items()
    {
        $shopping_cart_id = get_cart_id();
        $sql = "select * from cart_item";
        $lst_cart_item = select_list($sql);
        return $lst_cart_item;
    }
?>