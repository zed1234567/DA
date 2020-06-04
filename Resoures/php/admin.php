<?php session_start();
	if(!isset($_SESSION['admin'])){
		header("Location: /../../../../Do_an_web/index.php");
	}else{
	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style_admin.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<!-- sidebar -->
			<div class="col-2">
				<?php include 'admin_nav.php';?>
			</div>
			<div class="col-md-10">
				<?php echo $_SERVER['SCRIPT_NAME'];?>
			</div>
		</div>
		
	</div>
</body>
</html>
<?php
}
?>