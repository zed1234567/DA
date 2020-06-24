<?php
	session_start();
	if(isset($_SESSION['User_Name'])){
		header("Location: /../../../../Do_an_web/index.php");
		die();
	}else{

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sign up</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/stylesSignup.css">
</head>
<body>
	<?php
	include "connect.php";
	if(isset($_POST['signup'])){
		$username = mysqli_real_escape_string($connect,$_POST['username']);
		$gmail = mysqli_real_escape_string($connect,$_POST['Gmail']);
		$pwd = mysqli_real_escape_string($connect,$_POST['pwd']);
		//Check
		$sql = "SELECT * FROM `users` WHERE `Gmail`='$gmail'";
		$result = mysqli_query($connect,$sql);
		if(mysqli_num_rows($result)>0){
			$gmailErr = "Gmail đã được sử dụng!";
		}else
		{
			$hash_pwd = password_hash($pwd,PASSWORD_DEFAULT);
			//Update data
			$sql_update ="INSERT INTO `users`(`User_Name`, `Gmail`, `pwd`) 
						  VALUES ('$username','$gmail','$hash_pwd')";
			if(mysqli_query($connect,$sql_update)){
				header("Location: ../../../../../Do_an_web/index.php?message=Success+please+login");
				die();
			}
			mysqli_free_result($sql_update);

		}
	}
	
	mysqli_close($connect);


	?>

	<div class="signup-form">
		<div class="row">
			<div class="col-6 d-flex  justify-content-around flex-column ">
				<a href="../../../Do_an_web/index.php"><img src="../img/logo_2.png" class="w-50"></a>
			</div>
			<div class="col-6">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" onsubmit="return validForm()">
					<h2 class="text-uppercase font-weight-bold">Create Account</h2>
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fa fa-user"></i></span>
							</div>
							
							<input 	type="text" name="username" id="username" 
									pattern="^[a-zA-Z ]*$"
									title="Only letters and white space allowed"
									required class="form-control shadow-none" placeholder="Username" 
									autocomplete="off" 
									value="<?php echo empty($username) ? "" : $username;?>" 
							>
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fa fa-paper-plane"></i></span>
							</div>
							
							<input 	type="email" name="Gmail" 
									pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
		              				title="Invalid Gmail!"  
		              				required class="form-control shadow-none" 
		              				placeholder="Gmail" autocomplete="off" 
		              				value="<?php echo empty($gmail) ? "" : $gmail;?>"
		              		>
						</div>
						
						<span class="error"><small><?php echo empty($gmailErr) ? "" : $gmailErr?></small>
						</span>
						
					</div>
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fa fa-lock"></i></span>
							</div>
							
							<input type="password" name="pwd" id="pwd" pattern=".{8,}" title="8 or more than 8" placeholder="Password" autocomplete="off" required class="form-control shadow-none">
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fa fa-check"></i></span>
							</div>
							
							<input type="password" name="pwd_comfirm" id="pwd_comfirm" class="form-control shadow-none" autocomplete="off" pattern=".{8,}" required placeholder="Confirm Password">
						</div>
					</div>
					<div class="form-group">
						<button type="submit" name="signup" class="btn btn-success btn-block btn-lg shadow-none">Sign Up</button>
					</div>
				</form>
			</div>
		</div>
		
		
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
<?php
	}
?>