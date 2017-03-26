<?php
include_once("lib_db.php");
// for pagination purposes
$page = isset($_GET['page']) ? $_GET['page'] : 1; // page is the current page, if there's nothing set, default is page 1
$records_per_page = 6; // set records or rows of data per page
$from_record_num = ($records_per_page * $page) - $records_per_page; // calculate for the query LIMIT clause

$sql = "select * from sanpham";
$sql .= " LIMIT {$records_per_page} OFFSET {$from_record_num}";
$product = select_list($sql);
$num = count($product);

?>
  <div class="col-sm-3">
    <div class="left-sidebar">
      <h2>Category</h2>
      <div class="panel-group category-products" id="accordian">
        <!--category-productsr-->
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title"><a href="#">Makeup</a></h4>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title"><a href="#">lipstick</a></h4>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title"><a href="#">moisturizer</a></h4>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title"><a href="#">shampoo</a></h4>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title"><a href="#">shower</a></h4>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title"><a href="#">perfume</a></h4>
          </div>
        </div>

      </div>
      <!--/category-products-->
      <div class="shipping text-center">
        <!--shipping-->
        <img src="images/home/shipping.jpg" alt="" />
      </div>
      <!--/shipping-->
    </div>
  </div>
  <div class="col-sm-9 padding-right">
    <div class="features_items">
      <!--features_items-->
      <h2 class="title text-center">Features Items</h2>
      <?php foreach ($product as $obj) {?>
        <div class="col-sm-3">
          <div class="product-image-wrapper">
            <div class="single-products">
              <div class="productinfo text-center">
                <a href="detail.php?id_sp=<?php echo $obj['id_sp']?>"><img src="images/<?php echo $obj['anh_sp']?>" class="img-responsive" alt="" /></a>
                <h2>$<?php echo $obj['gia_sp']?></h2>
                <p>
                  <a href="detail.php?id_sp=<?php echo $obj['id_sp']?>">
                    <?php echo $obj['ten_sp']?>
                  </a>
                </p>
                <a href="cart.php?id_sp=<?php echo $obj['id_sp']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
          <div class="col-xs-12 text-right">
            <ul class="pagination">
              <li class="active"><a href="">1</a></li>
              <li><a href="">2</a></li>
              <li><a href="">3</a></li>
              <li><a href="">&raquo;</a></li>
            </ul>
          </div>
    </div>
    <!--features_items-->
  </div>