<?php
include_once("shopping_cart_action.php");
$cart = new shopping_cart_actions();
?>
  <header id="header">
    <!--header-->
    <div class="header-middle">
      <!--header-middle-->
      <div class="container">
        <div class="row">
          <div class="col-sm-4">
            <div class="logo pull-left">
              <a href="index.html"><img src="images/home/logo.png" alt="" /></a>
            </div>

          </div>
          <div class="col-sm-4 col-sm-offset-4">
            <div class="cart pull-right">
              <div class="active">
                <img src="images/cart/cart-icon.png" width="30" height="15" alt="" />
                <a href="cart.php" class="btn btn-default">
                  <span>You have <b id="total_item_cart"><?php echo count($cart->get_cart_items());?></b> product</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/header-middle-->
    <div class="header-bottom">
      <!--header-bottom-->
      <div class="container">
        <div class="row">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <div class="mainmenu pull-left">
            <ul class="nav navbar-nav collapse navbar-collapse">
              <li><a href="" class="active">Home</a></li>
              <li><a href="quantri.php?page_layout=thanhvien">Member</a> </li>
              <li><a href="admin.php">Admin</a> </li>
              <li><a href="product.php">Product</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12">
            <p class="text-right">
              <a href="#" class="btn btn-warning"><span><?php //echo $tk?></span> Login </a>
              <a href="logout.php" class="btn btn-warning">Logout </a>
            </p>
          </div>
        </div>
      </div>
    </div>
    <!--/header-bottom-->
  </header>