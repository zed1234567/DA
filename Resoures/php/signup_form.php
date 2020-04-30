<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sign up</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/stylesSignup.css">
</head>
<body>
	<div class="row">
				<div class="col-md">
					<nav class="navbar navbar-expand-md bg-light justify-content-lg-center">
						<div class="logo">
							<a href="../../index.php"><img src="../img/logo_2.png" height="150px"></a>
						</div>
					</nav>
				</div>
		</div>
	<div class="signup-form">
		<?php if(isset($_GET['message'])){
			?>
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong><?php echo $_GET['message'];?></strong>
			</div>
		<?php } ?>
		<form action="signup.php" name="myForm" method="post" onsubmit="return validForm()">
			<h2>Create Account</h2>
			<div class="form-group">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fa fa-user"></i></span>
					</div>
					
					<input type="text" name="username" id="username" required class="form-control" placeholder="Username" >
				</div>
			</div>
			<div class="form-group">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fa fa-paper-plane"></i></span>
					</div>
					
					<input type="email" name="Gmail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
              		title="Invalid Gmail!"  required class="form-control" placeholder="Gmail">
				</div>
			</div>
			<div class="form-group">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fa fa-lock"></i></span>
					</div>
					
					<input type="password" name="pwd" id="pwd" pattern=".{8,}" title="8 or more than 8" placeholder="Password" required class="form-control">
				</div>
			</div>
			<div class="form-group">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fa fa-check"></i></span>
					</div>
					
					<input type="password" name="pwd_comfirm" id="pwd_comfirm" class="form-control" pattern=".{8,}" required placeholder="Confirm Password">
				</div>
			</div>
			<div class="form-group">
				<button type="submit" name="signup" class="btn btn-primary btn-block btn-lg">Sign Up</button>
			</div>
		</form>
		
	</div>
	<script type="text/javascript">
		function validForm() {
			var pwd = document.getElementById("pwd").value;
			var pwd_comfirm = document.getElementById("pwd_comfirm").value;
			if(pwd != pwd_comfirm){
				alert("Password and comfirm password must be the same!");
				document.getElementById("pwd").focus();
				return false;
			}
			return true;
		}
		
	</script>
	<script src="https://kit.fontawesome.com/3a6503522a.js" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>