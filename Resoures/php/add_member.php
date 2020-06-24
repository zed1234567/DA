<?php session_start();
	if(!isset($_SESSION['admin'])){
		header("Location: /../../../../Do_an_web/index.php");
		die();
	}else{

	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Add Member</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style_admin.css">
</head>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-2">
				<?php include 'admin_nav.php';?>
			</div>
			<div class="col-md-10">
				<?php if(isset($_GET['message'])){
					?>
					<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong><?php echo $_GET['message'];?></strong>
					</div>
				<?php } ?>
				<hr><h3 class="text-center font-weight-bold">Thêm Nhân Viên</h3><hr>
				<form method="post">
					<div class="row">
						<div class="col-6">
							<div class="form-group">
								<label>Mã Số:</label>
								<input type="text" name="MSNV"  pattern=".{1,5}" title="5 ki tu" class="form-control" required>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label>Họ Tên:</label>
								<input type="text" name="HTNV"  class="form-control" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Chức vụ:</label>
						<input type="text" name="CV" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Địa Chỉ:</label>
						<input type="text" name="DC"  class="form-control" required>
					</div>
					<div class="form-group">
						<label>Số Điện Thoại:</label>
  						<input type="tel" id="phone" class="form-control" name="phone" pattern="[0-9]{4}[0-9]{3}[0-9]{3}">
					</div>
					<button type="submit" name="submit" class="btn btn-success">Thêm</button>
				</form>
			</div>
		</div>
	</div>
	<?php
		include 'connect.php';
		if (isset($_POST['submit'])) {
			$maso_Nv = mysqli_real_escape_string($connect,$_POST['MSNV']);
			$hoten_Nv =mysqli_real_escape_string($connect,$_POST['HTNV']);
			$chucvu_Nv = mysqli_real_escape_string($connect,$_POST['CV']);
			$diachi_Nv =  mysqli_real_escape_string($connect,$_POST['DC']);
			$sdt_Nv =  mysqli_real_escape_string($connect,$_POST['phone']);
			// check MSNV
			$sql_check= "SELECT `MSNV` FROM `nhanvien` WHERE `MSNV`= '$maso_Nv'";
			$result = mysqli_query($connect,$sql_check);
			
			if(mysqli_num_rows($result)>0){
				echo '<script type="text/javascript">alert("Mã Nhân Viên Đac Có")</script>';
			}else{
				$sql ="INSERT INTO `nhanvien`(`MSNV`, `HoTenNV`, `ChucVu`, `DiaChi`, `SDT`) VALUES ('$maso_Nv','$hoten_Nv','$chucvu_Nv','$diachi_Nv','$sdt_Nv')";
				if(mysqli_query($connect,$sql)){
					echo '<script type="text/javascript">alert("Đã Thêm")</script>';

				}else{
					echo '<script type="text/javascript">alert("Lỗi")</script>';
				}
			}			 
		
		}




	?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
<?php
	}
?>