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
			 echo '<script type="text/javascript">
			 			alert("Thông tin đăng nhập không đúng!");
			 			window.history.back();
			 	   </script>';
		}
		else{
			while ($row = mysqli_fetch_array($result)) {
				if(!password_verify($pwd,$row['pwd'])){
					echo '<script type="text/javascript">
			 			alert("Thông tin đăng nhập không đúng!");
			 			window.history.back();
			 	   </script>';
				}
				else if(password_verify($pwd,$row['pwd']) && $row['User_role']==1){
					$_SESSION["admin"]=1;
					$_SESSION["User_Name"]= $row['User_Name'];
					$_SESSION['ID_User'] = $row['ID_User'];
					header("Location: admin.php");
					die();

				}else if(password_verify($pwd,$row['pwd']) && $row['User_role']!=1){
					$_SESSION['ID_User'] = $row['ID_User'];
					$_SESSION['User_Name'] = $row['User_Name'];
					$_SESSION['Gmail'] = $row['Gmail'];
					echo '<script type="text/javascript">window.history.back();</script>';
				
				}
			}
		
		}
	}
	
?>