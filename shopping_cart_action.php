<?php
include_once("lib_db.php");
define("cart_action_key","cart_id");
class shopping_cart_actions{
    public $cart_id;
    public function add_to_cart($id)
    {
        $cart_id = $this->get_cart_id();
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
    
    public function get_cart_id()
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
    
    public function get_cart_items()
    {
        $shopping_cart_id = $this->get_cart_id();
        $sql = "select * from cart_item";
        $sql .= " where cart_id='{$shopping_cart_id}'";
        $lst_cart_item = select_list($sql);
        return $lst_cart_item;
    }

    public function get_cart_items_by_cart_id($cart_id)
    {
        $sql = "select * from cart_item";
        $sql .= " where cart_id='{$cart_id}'";
        $lst_cart_item = select_list($sql);
        return $lst_cart_item;
    }
    
    public function get_total()
    {
        $shopping_cart_id = $this->get_cart_id();
        $total = 0.0;
        $sql = "select sum(item.quantity * sp.gia_sp) as tong_gia from cart_item item inner join sanpham sp on item.id_sp = sp.id_sp  where cart_id='{$shopping_cart_id}'";
        $total = select_one($sql);
        return $total['tong_gia'];
    }
    public function getCart()
    {
        $this->cart_id = $this->get_cart_id();
        return $this;
    }
    
    public function update_cart($cart_id,$cart_item_update)
    {
        $cart_item_count = count($cart_item_update);
        $my_cart = $this->get_cart_items_by_cart_id($cart_id);
        foreach ($my_cart as $obj) {
            for ($i=0; $i < $cart_item_count; $i++) {
                if($obj['id_sp'] == $cart_item_update[$i]->product_id){
                    if($cart_item_update[$i]->purchase_quantity < 1 || $cart_item_update[$i]->remove_item){
                        $this->remove_item($cart_id,$obj['id_sp']);
                    }else{
                        $this->update_item($cart_id,$obj['id_sp'],$cart_item_update[$i]->purchase_quantity);
                    }
                }
            }
        }
    }
    
    public function remove_item($remove_cart_id,$remove_product_id)
    {
        $sql = "SELECT * from cart_item where cart_id='{$remove_cart_id}' and id_sp='{$remove_product_id}'";
        $success = select_one($sql);
        //echo $success;
        if(!empty($success)){
            $sql1 = "DELETE from cart_item where item_id='{$success['item_id']}'";
            $flag = exec_update($sql1);
            echo $flag;
        }
    }
    public function update_item($update_cart_id,$update_product_id,$quantity)
    {
        $sql = "SELECT * from cart_item where cart_id='{$update_cart_id}' and id_sp='{$update_product_id}'";
        $success = select_one($sql);
        if(!empty($success)){
            $sql1 = "UPDATE cart_item set quantity={$quantity} where item_id='{$success['item_id']}'";
            $flag = exec_update($sql1);
            echo $flag;
        }
    }
    
    public function empty_cart()
    {
        $cart_id = get_cart_id();
        $sql = "SELECT * from cart_item where cart_id='{$cart_id}'";
        $items_remove = select_list($sql);
        $sql1 = "DELETE from cart_item where item_id in (";
        foreach ($items_remove as $obj) {
            $sql1 .= $obj .',';
        }
        $sql1 = substr($sql1,0,count($items_remove) -1);
        $sql1 .= ')';
        $success = exec_update($sql1);
    }
    
    public function get_count()
    {
        $cart_id = get_cart_id();
        $sql = "select sum(quantity) as tong from cart_item where cart_id={$cart_id}";
        $exec = select_one($sql);
        return $exec['tong'];
    }
}

class shopping_cart_update {
    public $product_id;
    public $purchase_quantity;
    public $remove_item;
}
?>