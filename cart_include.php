<?php
//include_once("lib_db.php");
include_once("shopping_cart_action.php");
$rawid = isset($_GET["id_sp"]) ? $_GET["id_sp"] : "";
$id_sp = intval($rawid);
if(!(empty($rawid) || $rawid == null) && $id_sp != 0){
    add_to_cart(intval($rawid));
}else{
    // logDebug("ERROR : We should never get to without a ProductId.");
}
$cart_item = get_cart_items();
?>
  <div class="col-xs-12">
    <div class="table-responsive">
      <table class="table table-striped table-hover">
        <thead class="cart_menu_header">
          <tr>
            <th>Remove</th>
            <th>Image</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          <?php if(!empty($cart_item)){?>
            <?php foreach ($cart_item as $item) { ?>
              <?php $query = "select * from sanpham";?>
                <?php $query .= " where id_sp ={$item["id_sp"]}";?>
                  <?php $obj = select_one($query);?>
                    <tr>
                      <td class="">
                        <input type="checkbox" value="option1" id="optionsCheckbox">
                      </td>
                      <td class="muted center_text">
                        <a href="product.html"><img src="images/<?php echo $obj["anh_sp"]?>" class="fix-image-cart" alt=""></a>
                      </td>
                      <td class="text-center">
                        <a href="detail.html">
                          <?php echo $obj["ten_sp"]?>
                        </a>
                      </td>
                      <td>
                        <input type="text" placeholder="1" class="input-mini form-control text-right" value="<?php echo $item["quantity"]?>">
                      </td>
                      <td class="text-right">
                        <?php echo $obj["gia_sp"]?>
                      </td>
                      <td class="text-right">
                        <?php echo $obj["gia_sp"] * $item["quantity"]?>
                      </td>
                    </tr>
                    <?php }?>
                      <?php }?>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="4">&nbsp;</td>
            <td class="text-right"><strong>Total all:</strong></td>
            <td class="text-right"><strong><?php echo (get_total() > 0 ? "" . get_total() : "Cart is Empty");?></strong></td>
          </tr>
        </tfoot>
      </table>
    </div>
    <div class="text-right">
      <div class="col-xs-4 text-left">
        <div class="row">
          <?php echo get_total() > 0 ? "<a class='btn btn-default check_out' href=''>Update</a>" :""?>

        </div>
      </div>
      <div class="col-xs-4 text-center">
        <a class="btn btn-default check_out" href="shop.php">Continue shopping</a>
      </div>
      <div class="col-xs-4 text-right">
        <div class="row">
          <a class="btn btn-default check_out" href="">Check Out</a>
        </div>
      </div>
      <!--<div>
    <ul class="pagination">
    <li class="active"><a href="">1</a></li>
    <li><a href="">2</a></li>
    <li><a href="">3</a></li>
    <li><a href="">&raquo;</a></li>
    </ul>
    </div>-->
    </div>
  </div>

  <style>
    .fix-image-cart {
      width: 80px;
      height: 80px;
    }
  </style>