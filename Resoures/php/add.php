<?php session_start();
	if(!isset($_SESSION["admin"])){
		header("Location: /../../../../Do_an_web/index.php");
	}else{
		include 'connect.php';
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
				<hr><h3 class="text-center font-weight-bold">Thêm Sản Phẩm</h3><hr>
				<form enctype="multipart/form-data" action=""  method="post">
					
					<div class="row">
						<div class="col-6">
							<div class="form-group">
								<label>Mã Số Hàng Hóa:</label>
								<input type="text" name="mshh" class="form-control" placeholder="Nhap MSHH" required>
								<div class="invalid-feedback">Please fill out this field.</div>
							</div>
						</div>
						<div class="col-6">
							<div class="form-group">
								<label>Tên Hàng Hóa:</label>
								<input type="text" name="tenhh" class="form-control" placeholder="Nhap TenHH" required>
								<div class="invalid-feedback">Please fill out this field.</div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label>Giá:</label>
						<input type="number" name="gia" class="form-control" required>
						<div class="invalid-feedback">Please fill out this field.</div>
					</div>

					<div class="form-group">
						<label>Số Lượng Hàng:</label>
						<input type="number" name="sl" class="form-control" required>
						<div class="invalid-feedback">Please fill out this field.</div>
					</div>		
					<div class="row">

						<div class="col-6">
							<div class="form-group">
								<label>Mã Nhóm:</label>
								<?php
									$sql_MN = "SELECT `MaNhom` FROM `nhomhanghoa`";
									$result = mysqli_query($connect,$sql_MN);
									echo '<select name="mnhom" class="custom-select">';
									echo '<option value="" selected disabled>Chọn mã nhóm</option>';
									while($row = mysqli_fetch_array($result)){
										echo '<option value="'.$row['MaNhom'].'">'.$row['MaNhom'].'</option>';
									}
									echo '</select>';
								?>
								
								<div class="invalid-feedback">Please fill out this field.</div>
							</div>
						</div>

						<div class="col-6">
							<div class="form-group">
								<label>Thương Hiệu:</label>
								<input type="text" name="ThuongHieu" class="form-control" required>
								<div class="invalid-feedback">Please fill out this field.</div>
							</div>
						</div>

					</div>
				

					<div class="form-group">
						<label>Mô Tả:</label>
						<textarea rows="5" name="comment" class="form-control" placeholder="..."></textarea>
					</div>

					<div class="form-group">
						<label>Hình Ảnh:</label>
						<input type="file" name="imgupload">
						<button type="submit" name="submit" class="btn btn-success">Thêm</button>
					</div>
				</form>
			</div>
		</div>
		
		<?php
			if(isset($_POST['submit'])){
				$ms_product = mysqli_real_escape_string($connect,$_POST['mshh']);
				$ten_product = mysqli_real_escape_string($connect,$_POST['tenhh']);
				$gia_product = mysqli_real_escape_string($connect,$_POST['gia']);
				$sl_product = mysqli_real_escape_string($connect,$_POST['sl']);
				$mnhom_product = mysqli_real_escape_string($connect,$_POST['mnhom']);
				$ThuongHieu_product =  mysqli_real_escape_string($connect,$_POST['ThuongHieu']);
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
							$sql ="INSERT INTO `hanghoa`(`MSHH`, `TenHH`, `Gia`, `SoLuongHang`, `MaNhom`,`ThuongHieu`, `MoTaHH`, `hinh`) VALUES ('$ms_product','$ten_product','$gia_product','$sl_product','$mnhom_product','$ThuongHieu_product','$mota_product','$db_img')";
							if(mysqli_query($connect,$sql)){
								echo '<script type="text/javascript">alert("Đã Thêm!")</script>';
							}else{
								echo '<script type="text/javascript">alert("Lỗi!")</script>';
							}
						}else{
							echo '<script type="text/javascript">alert("Ảnh quá lớn!")</script>';
						}

					}else{
						echo '<script type="text/javascript">alert("Lỗi")</script>';
					}
				}else{
					echo '<script type="text/javascript">alert("Ảnh không đúng định dạng!")</script>';
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