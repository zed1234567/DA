<?php
	session_start();
	if($_SESSION['admin']!=1 && !isset($_SESSION['admin'])){
		echo '<script type="text/javascript">window.history.back();</script>';
	}

	include 'connect.php';
	if(isset($_GET['MSNV'])){
		$id = mysqli_real_escape_string($connect,$_GET['MSNV']);
		$sql = "DELETE FROM `nhanvien` WHERE MSNV='$id'";
		if(mysqli_query($connect,$sql)){
			header("Location: showallmember.php?message=deleted");
			die();
		}else{
			header("Location: showallmember.php?message=delete+faild");
			die();
		}
	}
	


?>