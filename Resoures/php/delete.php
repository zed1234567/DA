<?php
	include 'connect.php';
	if(isset($_GET['MSHH'])){
		$id = $_GET['MSHH'];
		$sql = "DELETE FROM `hanghoa` WHERE MSHH='$id'";
		if(mysqli_query($connect,$sql)){
			header("Location: showallproduct.php?message=deleted");
			die();
		}else{
			header("Location: showallproduct.php?message=delete+faild");
			die();
		}
	}


?>