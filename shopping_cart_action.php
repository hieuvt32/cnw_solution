<?php
include_once("lib_db.php");
define("cart_action_key","cart_id");
function add_to_cart($id)
{
    $cart_id = get_cart_id();
    $sql = "select * from cart_item ";
    $sql .= " where cart_id='{$cart_id}' && id_sp={$id}";
    $cart_item = select_one($sql);
    if($cart_item == null){
        $guid = uniqid();
        $insert_sql = "INSERT INTO cart_item(item_id,id_sp,cart_id,quantity)
        VALUES('{$guid}', {$id}, '{$cart_id}', 1)";
        $test = exec_update($insert_sql);
    }else{
        $quantity = ++$cart_item['quantity'];
        $update_sql = "UPDATE cart_item SET quantity={$quantity} WHERE item_id='{$cart_item["item_id"]}'";
        $test = exec_update($update_sql);
    }
}

function get_cart_id()
{
    $cartid= constant("cart_action_key");
    $key = isset($_SESSION[$cartid]) ? $_SESSION[$cartid] : null;
    if(!isset($key)){
        if(isset($_SESSION["user"])){
            $user = $_SESSION["user"];
            $_SESSION[$cartid] = $user["username"];
        }else {
            $guid = uniqid();
            $_SESSION[$cartid] = "" . $guid;
        }
    }
    return "" . $_SESSION[$cartid];
}

function get_cart_items()
{
    $shopping_cart_id = get_cart_id();
    $sql = "select * from cart_item";
    $sql .= " where cart_id='{$shopping_cart_id}'";
    $lst_cart_item = select_list($sql);
    return $lst_cart_item;
}

function get_total()
{
    $shopping_cart_id = get_cart_id();
    $total = 0.0;
    $sql = "select sum(item.quantity * sp.gia_sp) as tong_gia from cart_item item inner join sanpham sp on item.id_sp = sp.id_sp  where cart_id='{$shopping_cart_id}'";
    $total = select_one($sql);
    return $total['tong_gia'];
}
?>