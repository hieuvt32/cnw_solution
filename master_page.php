<?php
// include_once('ketnoi.php');
// $tk = isset($_SESSION["tk"]) ? $_SESSION["tk"] : "";
// $mk = isset($_SESSION["mk"]) ? $_SESSION["mk"] : "";
// $sql = "SELECT * FROM thanhvien
//  WHERE username = '".$tk."'
// AND password = '".$mk."'";
// $query = mysql_query($sql);
// $num_rows = mysql_num_rows($query);

// if($num_rows < 0){
//     header('location:index.php');
// }
//if($include_session) 
include_once('session_start.php');
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin | Lucent-Shopper</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">

    <link href="css/slider.css" rel="stylesheet">

    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="ckeditor/adapters/jquery.js"></script>
    <script type="text/javascript" src="js/jquery.formatCurrency-1.4.0.js"></script>

    <!--  -->
  </head>
  <!--/head-->

  <body>
    <?php include("header.php");?>
      <!--/header-->
      <?php if(!$page_admin) include("slider.php"); ?>

        <!--  <div class="clearfix"></div>
-->
        <div class="content container">
          <div class="row">
            <?php include($page_content);?>
          </div>
        </div>

        <?php include("footer.php");?>
          <!--/Footer-->
          <script src="js/jquery.js"></script>
          <script src="js/bootstrap.min.js"></script>
          <script src="js/jquery.scrollUp.min.js"></script>
          <script src="js/price-range.js"></script>
          <!-- <script src="js/jquery.prettyPhoto.js"></script> -->
          <script src="js/main.js"></script>
  </body>

  </html>