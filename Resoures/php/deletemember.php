<?php
	include 'connect.php';
	if(isset($_GET['MSNV'])){
		$id = $_GET['MSNV'];
		$sql = "DELETE FROM `nhanvien` WHERE MSNV='$id'";
		if(mysqli_query($connect,$sql)){
			header("Location: showallmember.php?message=deleted");
		}else{
			header("Location: showallmember.php?message=delete+faild");
		}
	}


?>