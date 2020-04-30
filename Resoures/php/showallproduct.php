<?php session_start();?>
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
			
				<?php include 'admin_nav.php';?>
			
			<div class="col-md-10">
				<?php
				include 'connect.php';
				$sql = "SELECT * FROM `hanghoa`";
				$result = mysqli_query($connect,$sql);
				?>
				<h3 style="text-align: center;">Product</h3>
				<table class="table table-striped">
					<tr>
						<th>MSHH</th>
						<th>TenHH</th>
						<th>Gia</th>
						<th>So Luong</th>
						<th>Ma Nhom</th>
						<th>Mo Ta</th>
						<th>Hinh</th>
						<th>Thao Tac</th>
					</tr>
					<?php
						while($row = mysqli_fetch_array($result)){
							echo "<tr>";
							echo "<td>".$row['MSHH']."</td>";
							echo "<td>".$row['TenHH']."</td>";
							echo "<td>".$row['Gia']."</td>";
							echo "<td>".$row['SoLuongHang']."</td>";
							echo "<td>".$row['MaNhom']."</td>";
							echo "<td>".$row['MoTaHH']."</td>";
							echo "<td><img src='../".$row['hinh']."' height='100px' width='100px'></td>" ;
							echo "<td>
									<a class='btn btn-secondary' href='edit.php?MSHH=".$row['MSHH']."'>Edit</a>
									<a class='btn btn-danger' href='delete.php?MSHH=".$row['MSHH']."'>Delete</a>
								 </td>";
							echo "</tr>";
						}
						mysqli_close($connect);

					?>
				</table>
			</div>
		</div>
	</div>
</body>
</html>