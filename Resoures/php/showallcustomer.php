<?php session_start();
	if(!isset($_SESSION["admin"])){
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
	
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<!-- sidebar -->
			
			<div class="col-2">
				<?php include 'admin_nav.php';?>
			</div>
			
			<div class="col-md-10">
				<?php
				include 'connect.php';
				$sql = "SELECT * FROM `khachhang`";
				$result = mysqli_query($connect,$sql);
				?>
				<div class="sticky-top text-center bg-light">
					<hr><h3>Khách Hàng</h3><hr>
				</div>
				<table class="table table-striped text-center">
					<tr>
						<th>Mã Số</th>
						<th>Họ Tên</th>
						<th>Địa Chỉ</th>
						<th>Số Điện Thoại</th>
					</tr>
					<?php
						while($row = mysqli_fetch_array($result)){
							echo "<tr>";
							echo "<td>".$row['MSKH']."</td>";
							echo "<td>".$row['HoTenKH']."</td>";
							echo "<td>".$row['DiaChi']."</td>";
                            echo "<td>".$row['SDT']."</td>";
							echo "</tr>";
						}
						mysqli_close($connect);

					?>
				</table>
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