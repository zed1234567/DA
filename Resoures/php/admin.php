<?php session_start();
	if(!isset($_SESSION['admin'])){
		header("Location: /../../../../Do_an_web/index.php");
	}else{
	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style_admin.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
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
				<div class="row">
					<div class="d-flex col">
						<div class="w-30 bg-success p-5 mr-2 text-white">
							<p>Số lượng đơn hàng theo tháng</p>
							<?php
								include "connect.php";
								$sql_count_order_by_month ="SELECT COUNT(*) as SL ,MONTH(NgayDH) as Thang 
															FROM `dathang` GROUP BY MONTH(NgayDH)";
								$result = mysqli_query($connect,$sql_count_order_by_month);
								while($row = mysqli_fetch_array($result)){
									echo "Tháng"." ".$row['Thang'].": ".$row['SL']."<br>";

								}
								mysqli_free_result($result);

							?>
						</div>
						<div class="w-20 bg-warning p-5">
							<p>Doanh Thu</p>
						</div>
						<div class="w-50 bg-warning p-5 ml-2">
							<p>Sản Phẩm:</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</body>
</html>
<?php
}
?>