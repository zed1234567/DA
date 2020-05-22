<?php session_start();
	if(!isset($_SESSION["admin"])){
		header("Location: /../../../../Do_an_web/index.php");
	}else{

		?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Add Product</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style_admin.css">
</head>
</head>
<body>
	<div class="container-fluid">
		<!-- ADD PRODUCT -->
		<div class="row">
			<div class="col-2">
				<?php include 'admin_nav.php';?>
			</div>
			<div class="col-md-10">
				<h1 class="text-center font-weight-bold">Add Product</h1>
				<form enctype="multipart/form-data" class="was-validated" method="post">
					
					<div class="row">
						<div class="col-6">
							<div class="form-group">
								<label>MSHH:</label>
								<input type="text" name="mshh" class="form-control" placeholder="Nhap MSHH" required>
								<div class="invalid-feedback">Please fill out this field.</div>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label>TenHH:</label>
								<input type="text" name="tenhh" class="form-control" placeholder="Nhap TenHH" required>
								<div class="invalid-feedback">Please fill out this field.</div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label>Gia:</label>
						<input type="number" name="gia" class="form-control" required>
						<div class="invalid-feedback">Please fill out this field.</div>
					</div>

					<div class="form-group">
						<label>So Luong Hang:</label>
						<input type="number" name="sl" class="form-control" required>
						<div class="invalid-feedback">Please fill out this field.</div>
					</div>		

					<div class="form-group">
						<label>Ma Nhom:</label>
						<input type="text" name="mnhom" class="form-control" placeholder="Nhap Ma Nhom" required>
						<div class="invalid-feedback">Please fill out this field.</div>
					</div>

					<div class="form-group">
						<label>Mo Ta:</label>
						<textarea rows="5" name="comment" class="form-control" placeholder="..."></textarea>
					</div>

					<div class="form-group">
						<label>Hinh Anh:</label>
						<input type="file" name="imgupload">
						<button type="submit" name="submit" class="btn btn-success">Add Product</button>
					</div>
				</form>
			</div>
		</div>
		
		<?php
			include 'connect.php';
			if(isset($_POST['submit'])){
				$ms_product = mysqli_real_escape_string($connect,$_POST['mshh']);
				$ten_product = mysqli_real_escape_string($connect,$_POST['tenhh']);
				$gia_product = $_POST['gia'];
				$sl_product = $_POST['sl'];
				$mnhom_product = mysqli_real_escape_string($connect,$_POST['mnhom']);
				$mota_product = mysqli_real_escape_string($connect,$_POST['comment']);
				// check img upload
				$file = $_FILES['imgupload'];
				$fileName = $file['name'];
				$fileType = $file['type'];
				$fileTmp = $file['tmp_name'];
				$fileErr = $file['error'];
				$fileSize = $file['size'];
				// check file img
				$fileEXT = explode('.',$fileName);
				$fileExtension = strtolower(end($fileEXT));
				$allowedExt = array("jpg","png");
				if(in_array($fileExtension,$allowedExt)){
					if($fileErr === 0){
						if($fileSize < 5000000){
							$newFileName = $fileName;
							$location = "../img/$newFileName";
							$db_img = "img/$newFileName";
							move_uploaded_file($fileTmp,$location);
							$sql ="INSERT INTO `hanghoa`(`MSHH`, `TenHH`, `Gia`, `SoLuongHang`, `MaNhom`, `MoTaHH`, `hinh`) VALUES ('$ms_product','$ten_product','$gia_product','$sl_product','$mnhom_product','$mota_product','$db_img')";
							if(mysqli_query($connect,$sql)){
								header("Location: add.php?message=add+susses");
							}else{
								header("Location: add.php?message=fail");
							}
						}else{
							header("Location: add.php?message=too+big");
						}

					}else{
						header("Location: add.php?message=error");
					}
				}else{
					header("Location: add.php?message=wrong+file");
				}

			}
			mysqli_close($connect);
		?>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
<?php
}

?>