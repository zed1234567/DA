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

		<div style="margin-top: 90px">
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
							foreach($_SESSION['shopping_cart'] as $key => $value){
								echo "<tr>";
								echo "<td><img src='Resoures/".$value['img']."' height='100px' width='100px'></td>" ;
								echo "<td>".$value['name']."</td>";
								echo "<td>".$value['price']."</td>";
								echo "<td>".$value['quantity']."</td>";
								echo "<td>".'<i class="fas fa-times"></i>'."</td>";
								echo "</tr>";

							}
						?>	
						</table>
					</div>
					<div class="col-4">
						<h3>Thanh Toán:</h3>
					</div>
				</div>
					

			<?php	
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
  	<script type="text/javascript">
  		const minus_input = document.getElementById("minus");
  		const plus_input = document.getElementById("plus");
  		let kq_input = document.getElementById("kq");
  		let price = document.getElementById("price");
  		let payment = document.getElementById("payment");
  		const price_product = price.textContent;

  		function minus(){
  			if(kq_input.value <= 1){
  				kq_input.value = 1;
  			}else{
  				kq_input.value -=1;
  				let result = kq_input.value * price_product;
  				price.innerHTML =result;
  				payment.innerHTML = result;
  			}
  		}

  		function plus(){
  			kq_input.value=(kq_input.value*1+1); 
  			let result = kq_input.value * price_product;
  			price.innerHTML =result;
  			payment.innerHTML = result;
  		}

  		function main (){
  			minus_input.addEventListener('click',() => minus());
  			plus_input.addEventListener('click',() => plus());

  		}

  		main();

  	</script>
</body>
</html>