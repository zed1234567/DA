<?php session_start();
	if(!isset($_SESSION["admin"])){
		header("Location: /../../../../Do_an_web/index.php");
	}else{
		?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style_admin.css">
</head>
<body>
<?php
	include 'connect.php';
	if(isset($_GET['MSHH'])){
		$id = mysqli_real_escape_string($connect,$_GET['MSHH']);
		$sql = "SELECT * FROM `hanghoa` WHERE MSHH='$id'";
		$result =  mysqli_query($connect,$sql);
		while($row = mysqli_fetch_array($result)){
		?>
			<div class="container-fluid">
				<div class="row">
					<div class="col-2">
						<?php include 'admin_nav.php';?>
					</div>
					<div class="col-md-10">
						<h1 class="text-center font-weight-bold">Edit Product</h1>
						<form enctype="multipart/form-data" method="post">
							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<label>MSHH:</label>
										<input type="text" name="mshh" class="form-control" value="<?php echo $row['MSHH'];?>">
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label>TenHH:</label>
										<input type="text" name="tenhh" class="form-control" value="<?php echo $row['TenHH'];?>">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>Gia:</label>
								<input type="number" name="gia" class="form-control" value="<?php echo $row['Gia'];?>">
							</div>
								
							<div class="form-group">
								<label>So Luong Hang:</label>
								<input type="number" name="sl" class="form-control" value="<?php echo $row['SoLuongHang'];?>">
							</div>				
							<div class="form-group">
								<label>Ma Nhom:</label>
								<input type="text" name="mnhom" class="form-control" value="<?php echo $row['MaNhom'];?>">
							</div>
							<div class="form-group">
								<label>Mo Ta:</label>
								<textarea rows="5" name="comment" class="form-control"><?php echo $row['MoTaHH'];?></textarea>
							</div>
							<div class="form-group">
								<label>Hinh Anh:</label>
								<img src="../<?php echo $row['hinh']?>" height='100px' width='100px'>
								<input type="file" name="imgupload">
								<button type="submit" name="Edit" class="btn btn-success">Save</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<?php
				if(isset($_POST['Edit'])){
					$ms_product = mysqli_real_escape_string($connect,$_POST['mshh']);
					$ten_product = mysqli_real_escape_string($connect,$_POST['tenhh']);
					$gia_product = $_POST['gia'];
					$sl_product = $_POST['sl'];
					$mnhom_product = mysqli_real_escape_string($connect,$_POST['mnhom']);
					$mota_product = mysqli_real_escape_string($connect,$_POST['comment']);
					//upload file
					if (is_uploaded_file($_FILES['imgupload']['tmp_name'])) {
						// check imgupload
						$file = $_FILES['imgupload'];
						$fileName = $file['name'];
						$fileType = $file['type'];
						$fileTmp = $file['tmp_name'];
						$fileErr = $file['error'];
						$fileSize = $file['size'];
						// check loai img
						$fileEXT = explode('.',$fileName);
						$fileExtension = strtolower(end($fileEXT));
						$allowedExt = array("jpg","png");
						if(in_array($fileExtension,$allowedExt)){
							if($fileErr === 0){
								if($fileSize < 5000000){
									$newFileName = uniqid("",true).'.'.$fileExtension;
									$location = "../img/$newFileName";
									$db_img = "img/$newFileName";
									move_uploaded_file($fileTmp,$location);
									$sql ="UPDATE `hanghoa` 
										   SET `MSHH`='$ms_product',`TenHH`='$ten_product',`Gia`='$gia_product',`SoLuongHang`='$sl_product',`MaNhom`='$mnhom_product',`MoTaHH`='$mota_product',`hinh`='$db_img'
										   WHERE MSHH='$id'";
									if(mysqli_query($connect,$sql)){
										header("Location: edit.php?MSHH=$id&message=Edit+susses");
									}else{
										header("Location: edit.php?MSHH=$id&message=fail");
									}
								}else{
									header("Location: edit.php?MSHH=$id&message=too+big");
								}

							}else{
								header("Location: edit.php?MSHH=$id&message=error");
							}
						}else{
							header("Location: edit.php?MSHH=$id&message=wrongfile");
						}

					}else{
						//Not upload file
						$sql_2 ="UPDATE `hanghoa` 
							   SET `MSHH`='$ms_product',`TenHH`='$ten_product',`Gia`='$gia_product',`SoLuongHang`='$sl_product',`MaNhom`='$mnhom_product',`MoTaHH`='$mota_product'
							   WHERE MSHH='$id'";
						if(mysqli_query($connect,$sql_2)){
							header("Location: edit.php?MSHH=$id&message=Edit+susses");
						}else{
							header("Location: edit.php?MSHH=$id&message=error");
						}


					}
					

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