<?php 
    session_start();
    if(!isset($_SESSION['User_Name'])){
		header("Location: index.php");
		die();
	}else{

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Canvas</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="Resoures/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="Resoures/css/stylesIndex.css">
	<link rel="stylesheet" href="Resoures/fontawesome/css/all.css">
</head>
<body>
	
	<div class="container-fluid">
		<!-- NAV -->
		
		<?php include "nav_index.php"?>
		
		
		<!-- END-NAV -->

		<!-- LƯU THÔNG TIN KHÁCH HÀNG - SẢN PHẨM ĐÃ MUA -- HÓA ĐƠN --NHÂN VIÊN PHỤ TRÁCH  -->
		<div style="margin-top: 90px">
            <?php 
            	include 'Resoures/php/connect.php';	
                if(isset($_POST['submit'])){
					
					$name_customer = mysqli_real_escape_string($connect,$_POST['user']);
					$phone_customer = mysqli_real_escape_string($connect,$_POST['phone']);
					$address_customer = mysqli_real_escape_string($connect,$_POST['address']);

					$id_order = rand(1,99999);
					$id_customer = $_SESSION['ID_User'];
					$sql_check_user ="SELECT `MSKH`FROM `khachhang` WHERE `MSKH`='$id_customer'";

					if(mysqli_num_rows(mysqli_query($connect,$sql_check_user)) > 0){
						//update customer one more time 
						$sql_update_customer ="UPDATE `khachhang` SET `HoTenKH`='$name_customer',`DiaChi`='$address_customer',`SDT`='$phone_customer' WHERE `MSKH`='$id_customer'";
						mysqli_query($connect,$sql_update_customer);
					}else{
						//add new customer
						$sql_insert_customer = "INSERT INTO `khachhang`(`MSKH`, `HoTenKH`, `DiaChi`, `SDT`) VALUES('$id_customer','$name_customer','$address_customer','$phone_customer')";
						mysqli_query($connect,$sql_insert_customer);
					}

					
					$id_who_sell = mysqli_query($connect,"SELECT `MSNV` FROM `nhanvien` WHERE `ChucVu` = 'Ban Hang' LIMIT 1");
					$row=mysqli_fetch_array($id_who_sell);
					$MSNV= $row['MSNV'];
					mysqli_free_result($id_who_sell);

					$sql_insert_order = "INSERT INTO `dathang`(`SoDonDH`, `MSKH`, `MSNV`, `TrangThai`) VALUES('$id_order','$id_customer','$MSNV','Da Nhan')";
					mysqli_query($connect,$sql_insert_order);
					
					foreach($_SESSION['shopping_cart'] as $key => $value){
						
						$quantity = $value['quantity'];
						$price = $value['price'];
						$sql_insert_detail_order = "INSERT INTO `chitietdathang`(`SoDonDH`, `MSHH`, `SoLuong`, `GiaDatHang`) VALUES('$id_order','$key','$quantity','$price')";
						mysqli_query($connect,$sql_insert_detail_order);
						unset($_SESSION['shopping_cart'][$key]);
		
					}
					$_SESSION['cart_count'] = count(array_keys($_SESSION['shopping_cart']));
					

				
					
				?>	
				<div class="col no-product">
					<h3 class="text-center">Cảm ơn quý khách đã mua hàng từ Canvas! Mã đơn hàng của bạn:<span style="color:#e10c00"><?php echo $id_order?></span></h3>
				</div>
					
	                    
            <?php
                }
            ?>

		</div>
		
		<footer>
			<?php include 'footer.php';?>
		</footer>
		<!-- End-footer -->
	</div>
	
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
<?php
}
?>