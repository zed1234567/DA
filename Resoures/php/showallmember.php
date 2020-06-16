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
				$sql = "SELECT * FROM `nhanvien`";
				$result = mysqli_query($connect,$sql);
				?>
				<div class="sticky-top text-center bg-light">
					<hr><h3>Member</h3><hr>
				</div>
				<table class="table table-striped">
					<tr>
						<th>MSNV</th>
						<th>Ho Ten NV</th>
						<th>Chuc Vu</th>
						<th>Dia Chi</th>
						<th>SDT</th>
                        <th></th>
					</tr>
					<?php
						while($row = mysqli_fetch_array($result)){
							echo "<tr>";
							echo "<td>".$row['MSNV']."</td>";
							echo "<td>".$row['HoTenNV']."</td>";
							echo "<td>".$row['ChucVu']."</td>";
							echo "<td>".$row['DiaChi']."</td>";
                            echo "<td>".$row['SDT']."</td>";
							echo "<td>
									<a class='btn btn-secondary' href='editmember.php?MSNV=".$row['MSNV']."'>Edit</a>
									<a class='btn btn-danger' href='deletemember.php?MSNV=".$row['MSNV']."'>Delete</a>
								 </td>";
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