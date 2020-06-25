<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Canvas</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="Resoures/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="Resoures/css/stylesIndex.css">
</head>
<body>
	
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
						   <li data-target="#demo" data-slide-to="3"></li>
						   <li data-target="#demo" data-slide-to="4"></li>
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
							<div class="carousel-item">
						      <img src="Resoures/img/carousel_4.png" >
						    </div>
							<div class="carousel-item">
						      <img src="Resoures/img/carousel_8.png" >
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
					<img src="Resoures/img/qc_1.gif" width="100%" style="margin-bottom: 5px" class="mb-4">
				</div>
			</div>
		</div>
		<!-- ShowProduct -->
		<?php include "show_product.php"?>
		<!-- END-ShowProduct -->

		<!-- Footer -->
		<button class="btn btn-success" id="scroll-btn" onclick="goTop();"><i class="fas fa-chevron-up"></i></button>
		<footer>
			<?php include 'footer.php';?>
		</footer>
		<!-- End-footer -->
	</div>
	<script type="text/javascript">
		var sroll_btn = document.getElementById("scroll-btn");

		window.onscroll = function(){
			scrollFunction();
		}

		function scrollFunction(){
			if(document.body.scrollTop > 200 || document.documentElement.scrollTop > 200){
				sroll_btn.style.display = "block";
			}else{
				sroll_btn.style.display = "none";
			}
		}

		function goTop(){
			document.documentElement.scrollTop =0;
		}

	</script>
	<script src="https://kit.fontawesome.com/3a6503522a.js" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>