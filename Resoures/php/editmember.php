<?php session_start();
	if(!isset($_SESSION["admin"])){
		header("Location: /../../../../Do_an_web/index.php");
	}else{
		?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style_admin.css">
</head>
<body>
<?php
	include 'connect.php';
	if(isset($_GET['MSNV'])){
		$id = mysqli_real_escape_string($connect,$_GET['MSNV']);
		$sql = "SELECT * FROM `nhanvien` WHERE MSNV='$id'";
		$result =  mysqli_query($connect,$sql);
		while($row = mysqli_fetch_array($result)){
		?>
			<div class="container-fluid">
                <div class="row">
                    <?php include 'admin_nav.php';?>
                    <div class="col-md-10">
                        <?php if(isset($_GET['message'])){
                            ?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong><?php echo $_GET['message'];?></strong>
                            </div>
                        <?php } ?>
                        <h1 class="text-center font-weight-bold">Edit Member</h1>
                        <form method="post">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>MSNV:</label>
                                        <input type="text" name="MSNV"  pattern=".{1,5}" title="5 ki tu" class="form-control" 
                                        value="<?php echo $row['MSNV']?>">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>HoTenNV:</label>
                                        <input type="text" name="HTNV"  class="form-control" value="<?php echo $row['HoTenNV']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Chuc Vu:</label>
                                <input type="text" name="CV" class="form-control" value="<?php echo $row['ChucVu']?>">
                            </div>
                            <div class="form-group">
                                <label>Dia chi:</label>
                                <input type="text" name="DC"  class="form-control"  value="<?php echo $row['DiaChi']?>">
                            </div>
                            <div class="form-group">
                                <label>SDT:</label>
                                <input type="tel" id="phone" class="form-control" name="phone" pattern="[0-9]{4}[0-9]{3}[0-9]{3}"  value="<?php echo $row['SDT']?>">
                            </div>
                            <button type="submit" name="edit" class="btn btn-success">Save</button>
                        </form>
                    </div>
                </div>
            </div>
                
            
        <?php
        }
        mysqli_free_result($result);
	}



?>
    <?php
        if(isset($_POST['edit'])){
            $MSNV = mysqli_real_escape_string($connect,$_POST['MSNV']);
            $name = mysqli_real_escape_string($connect,$_POST['HTNV']);
            $position = mysqli_real_escape_string($connect,$_POST['CV']);
            $address = mysqli_real_escape_string($connect,$_POST['DC']);
            $phone = mysqli_real_escape_string($connect,$_POST['phone']);
            $sql_update = "UPDATE `nhanvien` SET `MSNV`='$MSNV',`HoTenNV`='$name',`ChucVu`='$position',`DiaChi`='$address',`SDT`='$phone' WHERE MSNV='$id'";
            if(mysqli_query($connect,$sql_update)){
                header("Location: editmember.php?MSNV=$id&message=Edit+susses");
            }
            
        }
    ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
<?php
	}
	?>