<?php 
	session_start();
	include 'Resoures/php/connect.php';	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tiki</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="Resoures/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="Resoures/css/stylesIndex.css">
</head>
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
				<h4>Kết quả cần tìm:</h4>
				<div class="d-flex justify-content-between flex-wrap" id="page-1">
					<?php
						if (isset($_POST['search'])) {
							$search = mysqli_real_escape_string($connect,$_POST['input_search']);
							$sql = "SELECT `MSHH`,`TenHH`,`Gia`,`hinh` FROM `hanghoa` WHERE `TenHH` LIKE '%$search%'";
							$result = mysqli_query($connect,$sql);
							if(mysqli_num_rows($result)>0){
								while ($row= mysqli_fetch_array($result)) {
									$id = $row['MSHH'];
									$name_product = $row['TenHH'];
									$price = number_format($row['Gia']);
									$img_product = $row['hinh'];
								?>
								<div class="col-md-4 col-sm-6">	
									<div class="card shadow" style="margin-bottom: 30px;">
										<div class="inner">
											<img src="Resoures/<?php echo $img_product?>" class="card-img-top" style="width: 100%; height: 180px;">
										</div>
										
										<div class="card-body">
											<h4 class="card-title" style="font-size: 1.3em"><?php echo $name_product?></h4>
											<div class="card-text">
												<?php echo $price." VND"?><br>

												<div class="product-rating">
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star-half-alt"></i>
												</div>
												
											</div>
											<a href="info_product.php?id=<?php echo $id;?>" class="btn btn-success mt-2">Buy now.</a>
										</div>
									</div>
								</div>

							<?php
								}
								mysqli_free_result($result);

							}else{
								echo "<h5>Không có sản phẩm cần tìm.</h5>";
								
							}
						}
						mysqli_close($connect);
					?>
				</div>
			</div>
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