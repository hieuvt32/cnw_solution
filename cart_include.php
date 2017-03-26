<?php
include("shopping_cart_action.php");
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
                  <td>
                    <a href="detail.html">
                      <?php echo $obj["chi_tiet"]?>
                    </a>
                  </td>
                  <td>
                    <input type="text" placeholder="1" class="input-mini form-control" value="<?php echo $item["quantity"]?>">
                  </td>
                  <td><?php echo $obj["gia_sp"]?></td>
                  <td><?php echo $obj["gia_sp"] * $item["quantity"]?></td>
                </tr>
                <?php }?>
        </tbody>
        <tfoot>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><strong>Total all:</strong></td>
            <td><strong>$4,700.00</strong></td>
          </tr>
        </tfoot>
      </table>
    </div>
    <div class="text-right">
      <div class="col-xs-4 text-left">
        <div class="row">
          <a class="btn btn-default check_out" href="">Update</a>
        </div>
      </div>
      <div class="col-xs-4 text-center">
        <a class="btn btn-default check_out" href="">Continue shopping</a>
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