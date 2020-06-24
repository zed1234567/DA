<?php session_start();
	if(!isset($_SESSION["admin"])){
		header("Location: /../../../../Do_an_web/index.php");
		die();
	}else{

		?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Add Group</title>
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
				<hr><h3 class="text-center font-weight-bold">Thêm Nhóm Sản Phẩm</h3><hr>
				<form action="" method="post">
					
					<div class="row">
						<div class="col-6">
							<div class="form-group">
								<label>Mã nhóm hàng hóa:</label>
								<input type="text" name="MN" class="form-control" placeholder="Nhập mã nhóm" required>
								
							</div>
                        </div>
						<div class="col-6">
							<div class="form-group">
								<label>Tên nhóm:</label>
								<input type="text" name="TN" class="form-control" placeholder="Nhập tên nhóm" required>
							
							</div>
						</div>
                        <div class="col">
                            <button type="submit" name="submit" class="btn btn-success">ADD</button>
                        </div>
                        
					</div>

				
				</form>
			</div>
		</div>
		
		<?php
			include 'connect.php';
			if(isset($_POST['submit'])){
                $maNhom = mysqli_real_escape_string($connect,$_POST['MN']);
                $tenNhom = mysqli_real_escape_string($connect,$_POST['TN']);
                $sql = "INSERT INTO `nhomhanghoa` (`MaNhom`, `TenNhom`) VALUES ('$maNhom','$tenNhom')";
                if(mysqli_query($connect,$sql)){
                    echo '<script type="text/javascript">alert("Đã Thêm")</script>';
                }else{
					echo '<script type="text/javascript">alert("Lỗi")</script>';
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