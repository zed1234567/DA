<?php
	session_start();
	include 'connect.php';
	if(isset($_POST['Login'])){
		$gmail = mysqli_real_escape_string($connect,$_POST['Gmail']);
		$pwd = mysqli_real_escape_string($connect,$_POST['pwd']);
		//check
		$sql = "SELECT * FROM `users` WHERE `Gmail`='$gmail' LIMIT 1";
		$result = mysqli_query($connect,$sql);
		if(mysqli_num_rows($result)<=0){
			header("Location: ../../../../../Do_an_web/index.php?message=faild+gmail");
		}
		else{
			while ($row = mysqli_fetch_array($result)) {
				if(!password_verify($pwd,$row['pwd'])){
					header("Location: ../../../../../Do_an_web/index.php?message=faild+password");
				}
				else if(password_verify($pwd,$row['pwd']) && $row['User_role']==1){
					$_SESSION["admin"]=1;
					$_SESSION["User_Name"]= $row['User_Name'];
					header("Location: ../../../../../Do_an_web/Resoures/php/admin.php?message=login+sussces");

				}else if(password_verify($pwd,$row['pwd']) && $row['User_role']!=1){
					$_SESSION['ID_User'] = $row['ID_User'];
					$_SESSION['User_Name'] = $row['User_Name'];
					$_SESSION['Gmail'] = $row['Gmail'];
					header("Location: ../../../../../Do_an_web/index.php?message=login+sussces");
				
				}
			}
		
		}
	}
	else{
		header("Location: ../../../../../Do_an_web/index.php");
	}
?>