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

		<div style="margin-top: 90px;height: 70vh">
			<h4 class="text-center text-uppercase font-weight-bold font-italic">Giỏ hàng.</h4>
			<?php
				if (!empty($_SESSION['shopping_cart'])) {
				?>
				<div class="row">
					
					<div class="col-8">
						<table class="table table-responsive-md text-center">
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
						<h3>Thanh Toán:</h3>
						<p>Tong tien:<?php echo $total;?></p>
					</div>
				</div>
					

			<?php	
			}else{
				?>
				<div class="d-flex justify-content-center">
					<h3>Bạn chưa chọn sản phẩm nào!!</h3>
					<a href="index.php" class="btn btn-danger ml-5">Tiếp tục mua sắm</a>
				</div>
				

			<?php	
			}
			?>
			<?php
				if(isset($_POST['delete'])){
					if(!empty($_SESSION['shopping_cart'])){
						foreach ($_SESSION['shopping_cart'] as $key => $value) {
							if($_POST['id'] == $key){
								unset($_SESSION['shopping_cart'][$key]);
								$_SESSION['cart_count'] = count(array_keys($_SESSION['shopping_cart']));
								echo '<meta http-equiv="refresh" content="0">';
							}
							if(empty($_SESSION['shopping_cart'])){
								unset($_SESSION['shopping_cart']);
							}
						}

					}
				}
				if(isset($_POST['action']) && $_POST['action'] == "change"){
				
					foreach($_SESSION['shopping_cart'] as &$value){
						if($value['name'] == $_POST['id']){
							$value['quantity'] = $_POST['sl'];
							echo '<meta http-equiv="refresh" content="0">';
							break;
						}
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