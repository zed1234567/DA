<?php 
	$host = "localhost";
	$user = "root";
	$pwd = "";
	$database = "quanlyhanghoa";
	$connect = mysqli_connect($host,$user,$pwd,$database) or die( printf("Error: %s\n", mysqli_error($connect)));
?>