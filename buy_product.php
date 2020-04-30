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

	<?php
		if (!empty($_SESSION['shopping_cart'])) {
			$_SESSION['cart_count'] = count(array_keys($_SESSION['shopping_cart']));
			echo $_SESSION['cart_count'] ;
			foreach( $_SESSION['shopping_cart'] as $key=>$value){
				echo $key;
			}
		}
	?>
	
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