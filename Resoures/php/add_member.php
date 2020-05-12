<?php session_start();
	if(!isset($_SESSION['admin'])){
		header("Location: /../../../../Do_an_web/index.php");
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
			<?php include 'admin_nav.php';?>
			<div class="col-md-10">
				<?php if(isset($_GET['message'])){
					?>
					<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong><?php echo $_GET['message'];?></strong>
					</div>
				<?php } ?>
				<h1 class="text-center font-weight-bold">Add Member</h1>
				<form method="post">
					<div class="row">
						<div class="col-6">
							<div class="form-group">
								<label>MSNV:</label>
								<input type="text" name="MSNV"  pattern=".{1,5}" title="5 ki tu" class="form-control" required>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label>HoTenNV:</label>
								<input type="text" name="HTNV"  class="form-control" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Chuc Vu:</label>
						<input type="text" name="CV" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Dia chi:</label>
						<input type="text" name="DC"  class="form-control" required>
					</div>
					<div class="form-group">
						<label>SDT:</label>
  						<input type="tel" id="phone" class="form-control" name="phone" pattern="[0-9]{4}[0-9]{3}[0-9]{3}">
					</div>
					<button type="submit" name="submit" class="btn btn-success">Add Member</button>
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
				header("Location: add_member.php?message=Ma+da+co.");
			}else{
				$sql ="INSERT INTO `nhanvien`(`MSNV`, `HoTenNV`, `ChucVu`, `DiaChi`, `SDT`) VALUES ('$maso_Nv','$hoten_Nv','$chucvu_Nv','$diachi_Nv','$sdt_Nv')";
				if(mysqli_query($connect,$sql)){
					header("Location: add_member.php?message=added");

				}else{
					header("Location: add_member.php?message=Loi");
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