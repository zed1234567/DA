<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tiki</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="Resoures/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="Resoures/css/stylesIndex.css">
</head>
<body>
	<?php if(isset($_GET['message'])){
			?>
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong><?php echo $_GET['message'];?></strong>
			</div>
		<?php } ?>
	<div class="container-fluid">
		<!-- NAV -->
		
		<?php include "nav_index.php"?>
		
		
		<!-- END-NAV -->

		<!-- carousel -->
		<div style="margin-top: 90px">
			<div class="row">
				<div class="col-md-8">
					<div id="demo" class="carousel slide" data-ride="carousel">

						  <!-- Indicators -->
						<ul class="carousel-indicators">
						   <li data-target="#demo" data-slide-to="0" class="active"></li>
						   <li data-target="#demo" data-slide-to="1"></li>
						   <li data-target="#demo" data-slide-to="2"></li>
						</ul>
						  
						  <!-- The slideshow -->
						<div class="carousel-inner">
						    <div class="carousel-item active">
						      <img src="Resoures/img/carousel_1.png">
						    </div>
						    <div class="carousel-item">
						      <img src="Resoures/img/carousel_2.png" >
						    </div>
						    <div class="carousel-item">
						      <img src="Resoures/img/carousel_3.png" >
						    </div>
						</div>
						  
						  <!-- Left and right controls -->
						<a class="carousel-control-prev" href="#demo" data-slide="prev">
						   <span class="carousel-control-prev-icon"></span>
						</a>
						<a class="carousel-control-next" href="#demo" data-slide="next">
						   <span class="carousel-control-next-icon"></span>
						 </a>
					</div>
					
				</div>
				<div class="col-md-4">
					<div class="row">
						<div class="col">
							<img class="img-right" src="Resoures/img/carousel_9.png">
						</div>
					</div>
					<div class="row">
						<div class="col">
							<img  class="img-right" src="Resoures/img/carousel_10.png">
						</div>
					</div>
				</div>
			</div>
			<!-- END-carousel -->

			<div class="row">
				<div class="col-md">
					<img src="Resoures/img/qc_1.gif" width="100%" style="margin-bottom: 5px">
				</div>
			</div>
		</div>
		<!-- ShowProduct -->
		<?php include "show_product.php"?>
		<!-- END-ShowProduct -->

		<!-- Footer -->
		<footer>
			<div class="row bg-dark">
				<div class="col-4">
					<div class="p-5">
						<img src="Resoures/img/logo_2.png"  class="w-50 d-block">
						<img src="Resoures/img/logoSaleNoti.png" class="w-50">
					</div>
					<!-- <img src="Resoures/img/logo_2.png"  class="w-20 d-block">
					<img src="Resoures/img/logoSaleNoti.png" class="w-25"> -->
				</div>
				<div class="col-8 p-5">
					<div class="row">
						<ul class="d-flex">
							<li><a href="#">Chính sách</a></li>
							<li><a href="#">Điều khoản sử dụng</a></li>
							<li><a href="#">Đổi trả sản phẩm</a></li>
							<li><a href="#">Chính sách giao hàng</a></li>
							<li><a href="#">Về Canvas</a></li>
						</ul>
					</div>
					<div class="row">
						<div class="d-block">
							<p>&copy;Copyright 2020 - Canvas.</p>
							<p>CÔNG TY CỔ PHẦN FASTECH ASIA</p>
							<p>Email: contact@canvas.me</p>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- End-footer -->
	</div>
	<script src="https://kit.fontawesome.com/3a6503522a.js" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>