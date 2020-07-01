<?php session_start();
	if(!isset($_SESSION['admin'])){
		echo '<script type="text/javascript">window.history.back();</script>';
	}else{
		include "connect.php";
	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style_admin.css">
	<link rel="stylesheet" href="../fontawesome/css/all.css">
	
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<!-- sidebar -->
			<div class="col-2">
				<?php include 'admin_nav.php';?>
			</div>
			<div class="col-md-10">
				<hr><h2 class="text-center font-weight-bold">THỐNG KÊ</h2><hr>
				<div class="row justify-content-center">
					<div class="col-5 bg-success text-white">
					
						<p>Số lượng đơn hàng theo tháng</p>
						<?php
							$sql_count_order_by_month ="SELECT COUNT(*) as SL ,MONTH(NgayDH) as Thang 
														FROM `dathang` GROUP BY MONTH(NgayDH)";
							$result = mysqli_query($connect,$sql_count_order_by_month);
							while($row = mysqli_fetch_array($result)){
								echo "Tháng"." ".$row['Thang'].": ".$row['SL']."<br>";

							}
							mysqli_free_result($result);

						?>
					
						
					</div>
					<div class="col-5  bg-danger text-white">
							<p>Sản phẩm hết hàng</p>
							<?php
								$sql = "SELECT `TenHH` FROM `hanghoa` WHERE SoLuongHang = 0";
								$data = mysqli_query($connect,$sql);
								while($row = mysqli_fetch_array($data)){
									echo $row['TenHH'];
								}
								
								
							?>
					</div>
				
				</div>
			</div>
		</div>
		
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
<?php
}
?>