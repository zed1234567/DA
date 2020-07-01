<?php 
	session_start();
	if(!isset($_SESSION['User_Name'])){
		header("Location: index.php");
		die();
	}else{
		include 'Resoures/php/connect.php';
	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Canvas</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="Resoures/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="Resoures/css/stylesIndex.css">
	<link rel="stylesheet" href="Resoures/fontawesome/css/all.css">
</head>
<body>
	
	<div class="container-fluid">
		<!-- NAV -->
		
		<?php include "nav_index.php"?>
		<!-- END-NAV -->
        <div style="margin: 150px">
        	<div class="row">
        		<div class="col-md-6 col-sm-12">
        			<h4 class="text-center text-uppercase font-weight-bold font-italic">THÔNG TIN KHÁCH HÀNG</h4><hr>
        			<div class="d-flex justify-content-lg-between">
        				<div class="info-customer-left">
        					<p>Họ Tên:</p>
        					<p>Số điện thoại:</p>
        					<p>Địa chỉ:</p>
        				</div>
        				<div class="info-customer-right">
        					<?php
								$sql_customer ="SELECT `HoTenKH`, `DiaChi`, `SDT` FROM `khachhang` WHERE `MSKH`=".$_SESSION['ID_User'];
								$row = mysqli_fetch_array(mysqli_query($connect,$sql_customer));
								?>
								<p><?php echo $row['HoTenKH']?></p>
								<p><?php echo $row['SDT']?></p>
								<p><?php echo $row['DiaChi']?></p>
								<?php
							?>
        				</div>
        				
        			</div>
        		</div>
        		<div class="col-md-6 col-sm-12">
        			<h4 class="text-center text-uppercase font-weight-bold font-italic">ĐƠN HÀNG ĐÃ MUA</h4><hr>
						<?php
							$sql_order ="SELECT `SoDonDH`,`NgayDH`, `TrangThai` FROM `dathang` WHERE `MSKH`=".$_SESSION['ID_User'];
							$result = mysqli_query($connect,$sql_order);
							while($row = mysqli_fetch_array($result)){

								$sql_get_product ="SELECT TenHH FROM hanghoa H JOIN chitietdathang C on H.MSHH=C.MSHH JOIN dathang D ON C.SoDonDH=D.SoDonDH WHERE C.SoDonDH=".$row['SoDonDH'];
								$product_name = mysqli_query($connect,$sql_get_product);

								?>
								<div class="row">
									<div class="col">
										<button type="button" class="btn" data-toggle="collapse" data-target="<?php echo "#content".$row['SoDonDH']?>" >Đơn Hàng: <?php echo $row['SoDonDH']?></button>
										<div id="<?php echo "content".$row['SoDonDH']?>" class="collapse">
											<div class="d-flex justify-content-lg-between">
												<div class="info-customer-left">
													<p>Trạng thái:</p>
													<p>Ngày mua:</p>
													<p>Sản Phẩm:</p>
												</div>
												<div class="info-customer-right">
													<p><?php echo $row['TrangThai']?></p>
													<p><?php echo $row['NgayDH']?></p>
								
													<?php
														while($row_product=mysqli_fetch_array($product_name)){
															echo "<p>".$row_product['TenHH']."</p>";
														}
													?>

												</div>
											</div>
											
										</div>
										
									</div>
									
								</div><hr>
							<?php

							}
							mysqli_close($connect);
						?>
        				
        				
        			
        		</div>
        	</div>
            
        </div>

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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
<?php
	}
?>