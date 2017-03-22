<?php
ob_start();
session_start();
// if(isset($_SESSION['tk']) && isset($_SESSION['mk'])){
// 	header('location:product.php');	
// }
include_once('ketnoi.php');
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Login | Lucent-Shopper</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		
		<link href="css/slider.css" rel="stylesheet">
		
		<link href="css/main.css" rel="stylesheet">
		<link href="css/responsive.css" rel="stylesheet">
	      
	</head>
	<!--/head-->
	<body>
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
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<!--/header-middle-->
			<div class="header-bottom">
				<!--header-bottom-->
				<div class="container">
					<div class="row">
						<div class="col-sm-9">
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
									<li><a href="#" class="active">Home</a></li>
									<li><a href="#">Shop</a> </li>
									<li><a href="#">Blog</a>    </li>
									<li><a href="#">Admin</a></li>
								</ul>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="search_box pull-right">
								<input type="text" placeholder="Search"/>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/header-bottom-->
		</header>
		<!--/header-->

		<?php
		if(isset($_POST['submit'])){
			$error = NULL;
			// Bẫy lỗi để trống cho trường nhập tên Tài khoản
			if($_POST['tk'] == ''){
				$error = 'Vui lòng nhập đầy đủ Tài khoản & Mật khẩu!';	
			}
			else{
				$tk = $_POST['tk'];	
			}
			
			// Bẫy lỗi để trống cho trường nhập Mật khẩu
			if($_POST['mk'] == ''){
				$error = 'Vui lòng nhập đầy đủ Tài khoản & Mật khẩu!';	
			}
			else{
				$mk = $_POST['mk'];	
			}
			
			// Dữ liệu được nhập đầy đủ thì mới xử lý Đăng nhập
			if(isset($tk) && isset($mk)){
				
				// Kiểm tra Tài khoản với các thông tin nhận được ở trên trong CSDL
				$sql = "SELECT * FROM thanhvien WHERE username= '$tk' AND password = '$mk'";
				$query = mysql_query($sql);		
				$totalRows = mysql_num_rows($query);
				
				// Không ó kết quả thì báo lỗi ngược lại Tạo phiên Đăng nhập cho Tài khoản
				if($totalRows <= 0){
					$error = 'Tài khoản hoặc Mật khẩu không hợp lệ!';	
				}
				else{
					$_SESSION['tk'] = $tk;
					$_SESSION['mk'] = $mk;
					header('location:admin.php');	
				}
			}
		}
	?>

		<form method="post">
		<div class="container"> 
			<div class="row vertical-center-row"> 
				<div class="col-md-4 col-center-block ">
				</div>
			
					<div class="col-md-4 col-center-block login-widget">
						<h1 class="text-center"><i class="fa fa-dot-circle-o"></i><?php if(isset($error)){echo "<span>$error</span>";}else{echo 'Admin';}?></h1> 
							<div> 
							 <div class="form-group">
							     	<div class="input-group"> 
							     		 <div class="input-group-addon"><i class="fa fa-user fa-fw"></i>
							      			</div> <input class="form-control" placeholder="name" name= "tk" type="text"> 
							     			</div> 
							    	</div> 
							<div class="form-group"> 
							    <div class="input-group"> 
							      	<div class="input-group-addon"><i class="fa fa-key fa-fw"></i>
							      		</div> <input class="form-control" required placeholder="******" name="mk" type="password"> 
							    </div> 
							</div> 
							<div class="form-group"> 
							    <div class="checkbox"> <label for="c1"><input id="c1" name="cc" type="checkbox">Save</label> 
							    </div> 
							</div> 
							    <div class="form-group"> 
							     	<button type="submit" name="submit" required class="btn btn-primary btn-block">Login</button> 
							     	
							    <hr> 
							    </div> 
							</div> 
						</div>
					</div>
				</div>
				</form>



			<footer id="footer" style="margin-top:20px">
			<!--Footer-->
			<div class="footer-top">
				<div class="container">
					<div class="row">
						<div class="col-sm-2">
							<div class="companyinfo">
								<h2><span>LUCENT</span>-shopper</h2>
								<p>564 Market St.<br>
								Suite #307 </br>
								San Francisco,CA 94104</br>
								CONTACT US</br>
								T: 415-722-9374</br>
								lucentskincare307@gmail.com</br>
								</p>
							</div>
						</div>
						<div class="col-sm-7">
							<div class="col-sm-3">
								<div class="video-gallery text-center">
									<a href="#">
										<div class="iframe-img">
											<img src="images/home/2.jpg" alt="" />
										</div>
										<div class="overlay-icon">
											<i class="fa fa-play-circle-o"></i>
										</div>
									</a>
									<p>Circle of Hands</p>
									<h2>28 FEB 2017</h2>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="video-gallery text-center">
									<a href="#">
										<div class="iframe-img">
											<img src="images/home/2.jpg" alt="" />
										</div>
										<div class="overlay-icon">
											<i class="fa fa-play-circle-o"></i>
										</div>
									</a>
									<p>Circle of Hands</p>
									<h2>28 FEB 2017</h2>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="video-gallery text-center">
									<a href="#">
										<div class="iframe-img">
											<img src="images/home/2.jpg" alt="" />
										</div>
										<div class="overlay-icon">
											<i class="fa fa-play-circle-o"></i>
										</div>
									</a>
									<p>Circle of Hands</p>
									<h2>28 FEB 2017</h2>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="video-gallery text-center">
									<a href="#">
										<div class="iframe-img">
											<img src="images/home/2.jpg" alt="" />
										</div>
										<div class="overlay-icon">
											<i class="fa fa-play-circle-o"></i>
										</div>
									</a>
									<p>Circle of Hands</p>
									<h2>28 FEB 2017</h2>
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="address">
								<img src="images/home/map.png" alt="" />
								<p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-bottom">
				<div class="container">
					<div class="row">
						<p class="pull-left">Copyright © 2017 LUCENT-SHOPPER Inc. All rights reserved.</p>
						<p class="pull-right">Designed by <span><a target="_blank" href="https://web.facebook.com/profile.php?id=100014706935311">Hue Dang</a></span></p>
					</div>
				</div>
			</div>
		</footer>
		<!--/Footer-->
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.scrollUp.min.js"></script>
		<script src="js/price-range.js"></script>
		<script src="js/jquery.prettyPhoto.js"></script>
		<script src="js/main.js"></script>
	</body>
</html>
