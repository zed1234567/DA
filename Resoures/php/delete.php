<?php
	session_start();
	if($_SESSION['admin']!=1 && !isset($_SESSION['admin'])){
		header("Location: /../../../../Do_an_web/index.php");
		die();
	}
	include 'connect.php';
	if(isset($_GET['MSHH'])){
		$id = mysqli_real_escape_string($connect, $_GET['MSHH']);
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