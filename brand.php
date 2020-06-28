<?php 
	session_start();
	include 'Resoures/php/connect.php';	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Canvas</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="Resoures/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="Resoures/css/stylesIndex.css">
<body>
	<div class="container-fluid">
		<!-- NAV -->
	
		<div class=row>
        <!-- LỌC SẢN PHẨM QUA AJAX -->
		<?php
			//select product by brand
			if(isset($_POST['select'])){
				
				$type = mysqli_real_escape_string($connect,$_POST['select']);
				$sql = "SELECT `MSHH`,`TenHH`,`Gia`,`SoLuongHang`,`hinh` FROM `hanghoa` WHERE `MaNhom`='$type'";

				if(isset($_POST['brand']) && $_POST['brand']!=""){
					$brand_name =  mysqli_real_escape_string($connect,$_POST['brand']);
					$sql .=" AND `ThuongHieu`='$brand_name'";
				}		

				if(isset($_POST['price']) && $_POST['price'] == '5000000'){
					$sql.=" AND `Gia` < 5000000";
				}

				if(isset($_POST['price']) && $_POST['price'] == '10000000'){
					$sql.=" AND (`Gia` BETWEEN 5000000 AND  10000000)";
				}

				if(isset($_POST['price']) && $_POST['price'] == '15000000'){
					$sql.=" AND (`Gia` BETWEEN 10000000 AND 15000000)";
				}

				if(isset($_POST['price']) && $_POST['price'] == '16000000'){
					$sql.=" AND `Gia` >= 16000000";
				}

				if(isset($_POST['sort']) && $_POST['sort']=="ASC"){
					$sql .=" ORDER BY `Gia` ASC";
				}

				if(isset($_POST['sort']) && $_POST['sort']=="DESC"){
					$sql .=" ORDER BY `Gia` DESC";
				}
			
				$result = mysqli_query($connect,$sql) or die( printf("Error: %s\n", mysqli_error($connect)));

				if(mysqli_num_rows($result) == 0){
					?>
					<div class="col">
						<div class="no-product">
							<p class="text-center text-success">Không có sản phẩm phù hợp!</p>
						</div>
						
					</div>
					<?php
				}

				while ($row = mysqli_fetch_array($result)) {
					$id = $row['MSHH'];
					$name_product = $row['TenHH'];
					$price = number_format($row['Gia']);
					$img_product = $row['hinh'];
					$quantity = $row['SoLuongHang'];
					if($quantity == 0){
						$msg="(Tạm hết hàng)";
					} else {
						$msg="";
					}
				?>
						<div class="col-md-3 col-sm-6">	
							<div class="card shadow" style="margin-bottom: 30px;">
								<div class="inner d-flex justify-content-center pt-2">
									<img src="Resoures/<?php echo $img_product?>" class="card-img-top" style="width: 200px; height: 200px;">
								</div>
								<div class="card-body">
									<h4 class="card-title" style="font-size: 1.3em">
										<?php echo $name_product." "?>
										<small class="text-danger"><?php echo $msg?></small>
									</h4>
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
									<?php 
										if($quantity != 0){
										
											echo '<a href="info_product.php?id='.$id.'" class="mt-2 stretched-link"></a>';
										
										}
									
									?>
								</div>
							</div>
						</div>
						

				<?php
					}
				mysqli_close($connect);
			}else{
				header("Location: index.php");
				die();
			}
		
			

			// select product by price
		?>
		</div>
		<!-- Footer -->
		<!-- End-footer -->
	</div>
	<script src="https://kit.fontawesome.com/3a6503522a.js" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>