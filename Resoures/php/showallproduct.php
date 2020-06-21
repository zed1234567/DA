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
				$sql = "SELECT * FROM `hanghoa`";
				$result = mysqli_query($connect,$sql);
				?>
				<div class="sticky-top text-center bg-light">
					<hr><h3>Sản Phẩm</h3><hr>
				</div>
				
				<table class="table table-striped text-center">
					<tr>
						<th>Mã Số</th>
						<th>Tên</th>
						<th>Giá</th>
						<th>Số Lượng</th>
						<th>Mã Nhóm</th>
						<th>Thương Hiệu</th>
						<th>Mô Tả</th>
						<th>Hình</th>
						<th>Thao Tác</th>
					</tr>
					<?php
						while($row = mysqli_fetch_array($result)){
							echo "<tr>";
							echo "<td>".$row['MSHH']."</td>";
							echo "<td>".$row['TenHH']."</td>";
							echo "<td>".$row['Gia']."</td>";
							echo "<td>".$row['SoLuongHang']."</td>";
							echo "<td>".$row['MaNhom']."</td>";
							echo "<td>".$row['ThuongHieu']."</td>";
							echo "<td>".$row['MoTaHH']."</td>";
							echo "<td><img src='../".$row['hinh']."' height='100px' width='100px'></td>" ;
							echo "<td>
									<a class='btn btn-secondary' href='edit.php?MSHH=".$row['MSHH']."'><i class='far fa-edit'></i></a>
									<a class='btn btn-danger' href='delete.php?MSHH=".$row['MSHH']."'><i class='far fa-trash-alt'></i></a>
								 </td>";
							echo "</tr>";
						}
						mysqli_close($connect);

					?>
				</table>
			</div>
		</div>
	</div>
	<script src="https://kit.fontawesome.com/3a6503522a.js" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
<?php
	}
	?>