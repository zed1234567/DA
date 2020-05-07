<?php 
	session_start();
	include 'Resoures/php/connect.php';	
	function alertMess($msg){
		echo '<script type="text/javascript">alert("' . $msg . '")</script>';
	}
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
			<?php
				if(isset($_GET['id'])){
					$id_product = mysqli_real_escape_string($connect,$_GET['id']);
					$sql = "SELECT `TenHH`,`Gia`,`hinh` FROM `hanghoa` WHERE `MSHH`= '$id_product'";
					$result = mysqli_query($connect,$sql);
					while ( $row = mysqli_fetch_array($result)) {
						$product_name = $row['TenHH'];
						$product_price = $row['Gia'];
						$product_img = $row['hinh'];
						?>
						<div>
							<div class="row" style="margin-top: 90px;">
								<div class="col">
									<h2 class="text-uppercase m-3"><?php echo $product_name;?></h2>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4 col-sm">
									<img src="Resoures/<?php echo $product_img;?>" class="img-fluid mx-auto d-block" style="width: 400px;max-height: 400px;">
								</div>
								<div class="col-md-4 col-sm-12">
									<h2><?php echo $product_price." ";?><span style="font-size: 20px">VND</span></h2>
									<div>
										<p class="border font-weight-bold" style="font-size: 1rem;"><i class="fas fa-shipping-fast mr-2 ml-2"></i>GIAO HÀNH NHANH TRONG 1 GIỜ 63 TỈNH THÀNH</p>
										<div class="border">
											<p style="background-color: #34a105; color: white" class="font-weight-bold">Khuyến mãi đặc biệt (SL có hạn)</p>
											<ul style="list-style-type: square;" class="ml-4">
												<li>Thu cũ đổi mới tiết kiệm đến 14 triệu Xem chi tiết</li>
												<li>Tặng 1 chai gel rửa tay khô 120 ml trị giá 59,000đ</li>
												<li>Trả góp 0%</li>
											</ul>
										</div>
										
									<form action="" method="post">
										<div class="row">
											<div class="col">
												<input type="hidden" name="code" value="<?php echo $id_product;?>">
												<button type="submit" class="btn btn-danger font-weight-bold mt-5 btn-block" styles="">THÊM VÀO GIỎ HÀNG</button>
											</div>
										</div>
										<div class="row">
											<div class="col-6">
												<a href="#" class="btn btn-primary mt-2 font-weight-bold" style="width: 100%">TRẢ GÓP 0%</a></button>
											</div>
											<div class="col-6">
												<a href="#" class="btn btn-primary mt-2 font-weight-bold" style="width: 100%">TRẢ GÓP QUA THẺ</a>
											</div>
										</div>
									</form>
										<div class="row">
											<div class="col">
												<p class="text-center mt-2">Gọi <span style="color:red">1800-6601</span> để được tư vấn mua hàng (Miễn phí)</p>
											</div>
										</div>
										
									</div>
								</div>
								<div class="col-md-4 col-sm text-center">
									<p class="font-weight-bold">Trong hộp có:</p>
									<p>
										<i class="fab fa-dropbox mr-2"></i>Máy, Cáp, Sạc, Tai Nghe, Đệm tai dự phòng, <br>Ốp Lưng, Sách hướng dẫn sử dụng, Cây lấy sim
									</p>
									<p class="font-weight-bold">Canvas cam kết:</p>
									<ul class="list-unstyled" style="font-size: 1rem">
										<li><i class="fas fa-medal mr-2"></i>Hàng chính hãng</li>
										<li><i class="far fa-check-circle mr-2"></i>Bảo hành 12 Tháng chính hãng</li>
										<li><i class="fas fa-shipping-fast mr-2"></i>Giao hàng miễn phí toàn quốc trong 60 phút</li>
										<li><i class="fas fa-map-marker-alt mr-2"></i>Bảo hành nhanh tại Canvas Shop trên toàn quốc</li>
									</ul>
								</div>
							</div>
						</div>
					<?php
					}
					mysqli_free_result($result);


				}
				

			?>
		<?php
			if(isset($_POST['code']) && $_POST['code']!=''){
				$id_product = mysqli_real_escape_string($connect,$_POST['code']);
				$sql = "SELECT * FROM `hanghoa` WHERE `MSHH`= '$id_product'";
				$result = mysqli_query($connect,$sql);
				$row = mysqli_fetch_array($result);

				$name_product = $row['TenHH'];
				$price_product = $row['Gia'];
				$img_product = $row['hinh'];
				
				$cart_array = array($id_product => array(
					'name' => $name_product,
					'price' => $price_product,
					'img' => $img_product,
					'quantity' => 1
					)
				);
			
				if (empty($_SESSION['shopping_cart'])) {
					$_SESSION['shopping_cart'] = $cart_array;
					$msg="Đã thêm vào giỏ hàng!";
					alertMess($msg);
					
				}else{
					$array_key = array_keys($_SESSION['shopping_cart']);
					if(in_array($id_product,$array_key)){
						$msg="Đã có trong giỏ hàng!";
						alertMess($msg);
					}else{
						$_SESSION['shopping_cart'] = array_merge($_SESSION['shopping_cart'],$cart_array);
						$msg="Đã thêm vào giỏ hàng!";
						alertMess($msg);
					}
					
				}
				$_SESSION['cart_count'] = count(array_keys($_SESSION['shopping_cart']));
				mysqli_free_result($result);
				echo '<meta http-equiv="refresh" content="0">';
			}
		?>
		
		<div class="row mt-5">
			<div class="col-md">
				<img src="Resoures/img/quangcao10.jpeg" width="100%" style="margin: 10px 0;">
			</div>
		</div>
		<!-- Footer -->
		<footer>
			<?php include 'footer.php';?>
		</footer>
		<!-- End-footer -->
	</div>
	<script type="text/javascript">
		al
	</script>
	<script src="https://kit.fontawesome.com/3a6503522a.js" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>