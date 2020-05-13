<?php 
	session_start();
	include 'Resoures/php/connect.php';	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tiki</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="Resoures/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="Resoures/css/stylesIndex.css">
</head>
<body>
	<div class="container-fluid">

 	<?php include "nav_index.php";?> 

		<div style="margin-top: 90px;">
			<?php
				if (!empty($_SESSION['shopping_cart'])) {
				?>
				<div class="row">
					
					<div class="col-8">
						<h4 class="text-center text-uppercase font-weight-bold font-italic">Giỏ hàng</h4><hr>
						<table class="table table-responsive-md text-center table-borderless">
							<tr>
								<th></th>
								<th>Sản Phẩm</th>
								<th>Giá</th>
								<th>Số Lượng</th>
								<th></th>
							</tr>
							<?php
							$total=0;
							foreach($_SESSION['shopping_cart'] as $key => $value){
								$total +=($value['price']*$value['quantity']);
								?>
								<tr>
									<td>
										<img src="Resoures/<?php echo $value['img'];?>" height='100px' width='100px'>
									</td>
									<td><?php echo $value['name'];?></td>
									<td><?php echo $value['price'];?></td>
									<td>
										<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
											<input type="hidden" name="action" value="change">
											<input type="hidden" name="id" value="<?php echo $value['name'];?>">
											<input type="number" onchange="this.form.submit()" name="sl" min="1" max="3" value="<?php echo $value['quantity'];?>">
										</form>
									</td>
									<td>
										<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
											<input type="hidden" name="id" value="<?php echo $key;?>">
											<button class="btn" name="delete"><i class="fas fa-times"></i></button>
										</form>
									</td>
								</tr>
						<?php
							}
						?>	
						</table>
					</div>
					<div class="col-4">
						<h4 class="text-center text-uppercase font-weight-bold font-italic">Thanh Toán</h4>
						<hr>

						<div class="row">
							<div class="col-6">
								<p class="text-center pl-3">Tạm tính:</p>
							</div>
							<div class="col-6">
								<p class="text-center font-weight-bold"><?php echo $total;?></p>
							</div>
						</div>

						<div class="row">
							<div class="col-6">
								<p class="text-center ">Thành tiền:</p>
							</div>
							<div class="col-6">
								<p class="text-center font-weight-bold"><?php echo $total;?><br><small>(Đã bao gồm VAT nếu có)</small></p>
							</div>
						</div>

						<hr>
						<div class="row">
							<div class="col text-center">
								<button class="btn btn-success font-weight-bold" data-target="#form_pay" data-toggle="modal">Tiến hành đặt hàng</button>
								<div class="modal fade w-100" id="form_pay">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">

											<div class="modal-header">
												<h4 class="modal-title">Canvas | <span class="font-italic" style="font-size: 1.2rem">Thông tin khách hàng</span></h4>
												 <button type="button" class="close" data-dismiss="modal">&times;</button>
											</div>

											<div class="modal-body">
												
												<form action="" method="post">
													<div class="row">
														<div class="col-6">
															<input type="text" name="user" class="form-control" placeholder="Họ và Tên" required pattern="[A-Za-z ]{10,}" title="Nhap dung ho ten">
														</div>
														<div class="col-6">
															<input type="text" name="phone" class="form-control" placeholder="Số điện thoại" pattern="[0-9]{10}" title="10 so" required>
														</div>

													</div>

													<div class="row" style="padding-top: 16px;">
														<div class="col">
															<input type="text" name="address" class="form-control" placeholder="Địa chỉ giao hàng" required pattern="[A-Za-z0-9 /]{10,}" title="Nhap dung dia chi">
														</div>
													</div>

													<div class="row" style="padding-top: 16px;">
														<div class="col">
															<button type="submit" name="submit" class="btn btn-success font-weight-bold" style="width: 50%">Đặt Hàng</button>
														</div>
													</div>
												</form>
												
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
					

			<?php	
			}else{
				?>
				<div class="d-flex justify-content-center mb-lg-5">
					
					<h3>Bạn chưa chọn sản phẩm nào!!</h3>
					<a href="index.php" class="btn btn-danger ml-5">Tiếp tục mua sắm</a>
				
				</div>
				

			<?php	
			}
			?>
			<?php
				//Delete product form shopping cart
				if(isset($_POST['delete'])){
					if(!empty($_SESSION['shopping_cart'])){

						foreach ($_SESSION['shopping_cart'] as $key => $value) {
							if($_POST['id'] == $key){
								unset($_SESSION['shopping_cart'][$key]);
								$_SESSION['cart_count'] = count(array_keys($_SESSION['shopping_cart']));
								echo '<meta http-equiv="refresh" content="0">';
								break;
							}
							if(empty($_SESSION['shopping_cart'])){
								unset($_SESSION['shopping_cart']);
							}
						}

					}
				}

				//Change quantity of shopping cart
				if(isset($_POST['action']) && $_POST['action'] == "change"){
				
					foreach($_SESSION['shopping_cart'] as &$value){
						if($value['name'] == $_POST['id']){
							$value['quantity'] = $_POST['sl'];
							echo '<meta http-equiv="refresh" content="0">';
							break;
						}
					}
				}

				//info customer form shopping cart 
				if(isset($_POST['submit'])){
					$name_customer = mysqli_real_escape_string($connect,$_POST['user']);
					$phone_customer = mysqli_real_escape_string($connect,$_POST['phone']);
					$address_customer = mysqli_real_escape_string($connect,$_POST['address']);
					//random id
					$id_customer = $id_order = rand(1,9999);
					
					$sql_insert_customer = "INSERT INTO `khachhang`(`MSKH`, `HoTenKH`, `DiaChi`, `SDT`) VALUES('$id_customer','$name_customer','$address_customer','$phone_customer')";
					mysqli_query($connect,$sql_insert_customer);
					
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
						//con nua
		
					}
					
				}


			?>
		</div>
		<footer>
			<?php include 'footer.php';?>
		</footer>
	</div>
	
	<script src="https://kit.fontawesome.com/3a6503522a.js" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</body>
</html>