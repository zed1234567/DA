<?php 
	session_start();
	include 'Resoures/php/connect.php';	
	include 'function.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tiki</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="Resoures/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="Resoures/css/stylesIndex.css">
<body>
	<div class="container-fluid">
		<!-- NAV -->
		<?php include "nav_index.php"?>
		<!-- END-NAV -->

		<!-- carousel -->

		<div class="row" style="margin-top: 90px">
			<div class="col-md">
				<img src="Resoures/img/qc_1.gif" width="100%" style="margin-bottom: 5px">

			</div>
		</div>
		
		

		<div class="row">
			<div class="col">
				<div class="d-flex justify-content-between">
					<h3>LAPTOP NỔI BẬT NHẤT</h3>

					<?php include "nav_filter.php";?>
					
				</div>
				<hr>
			</div>
		</div>
		
		<div class="row">
		<?php
			$type="MT";
			showProductByType($type);
		?>
		</div>
	
		<!-- Footer -->
		<div class="row">
			<div class="col">
				<ul class="pagination justify-content-center" style="margin: 20px 0;">
					<li class="page-item"><a class="page-link" href="#page-1">1</a></li>
					<li class="page-item"><a  class="page-link" href="#page-2">2</a></li>
					<li class="page-item"><a class="page-link" href="">3</a></li>
				</ul>
			</div>
		</div>
		<footer>
			<?php include 'footer.php';?>
		</footer>
		<!-- End-footer -->
	</div>
	<script src="https://kit.fontawesome.com/3a6503522a.js" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>