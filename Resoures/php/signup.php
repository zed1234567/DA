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
			mysqli_free_result($result);
			header("Location: signup_form.php?message=Gmail đã tồn tại");
		}else
		{
			$hash_pwd = password_hash($pwd,PASSWORD_DEFAULT);
			//Update data
			$sql_update ="INSERT INTO `users`(`User_Name`, `Gmail`, `pwd`) 
						  VALUES ('$username','$gmail','$hash_pwd')";
			if(mysqli_query($connect,$sql_update)){
				header("Location: ../../../../../Do_an_web/index.php?message=Success+please+login");
			}else
			{
				header("Location: signup_form.php?message=Thất bại!");
			}
			mysqli_free_result($sql_update);

		}
	}
	else{
		header("Location: signup_form.php");
	}
	mysqli_close($connect);
?>

