<?php session_start();
	if(!isset($_SESSION["admin"])){
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
	
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<!-- sidebar -->
			
			<div class="col-2">
				<?php include 'admin_nav.php';?>
			</div>
			
			<div class="col-md-10">
				<?php
				include 'connect.php';
				$sql = "SELECT * FROM `dathang`";
				$result = mysqli_query($connect,$sql);
				?>
				<div class="sticky-top text-center bg-light">
					<hr><h3>Order</h3><hr>
				</div>
				<table class="table ">
					<tr>
						<th>SoDonDH</th>
						<th>MSKH</th>
						<th>MSNV</th>
						<th>NgayDH</th>
                        <th>TrangThai</th>
                        <th></th>
					</tr>
					<?php
						while($row = mysqli_fetch_array($result)){
							echo "<tr>";
							echo "<td>".$row['SoDonDH']."</td>";
							echo "<td>".$row['MSKH']."</td>";
							echo "<td>".$row['MSNV']."</td>";
                            echo "<td>".$row['NgayDH']."</td>";
                            echo "<td>".$row['TrangThai']."</td>";
                            ?>
                                <td>
                                    <button class="btn btn-success" data-toggle="collapse" data-target="<?php echo "#detail".$row['SoDonDH']?>">Chi tiết</button>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="6">
                                    <div class="collapse" id="<?php echo "detail".$row['SoDonDH'];?>">
                                        <div class="d-flex justify-content-around">
                                            <div>
                                                <p>Mã số sản phẩm:</p>
                                                <p>Số lượng:</p>
                                                <p>Giá đặt hàng:</p>
                                            </div>
                                       
                                            <?php
                                                $sql_detail = "SELECT `MSHH`, `SoLuong`, `GiaDatHang` FROM `chitietdathang` WHERE `SoDonDH`=".$row['SoDonDH'];
                                                $result_detail= mysqli_query($connect,$sql_detail);
                                                while($row_detail = mysqli_fetch_array($result_detail)){
                                                ?>
                                                    <div>
                                                        <p><?php echo $row_detail['MSHH']?></p>
                                                        <p><?php echo $row_detail['SoLuong']?></p>
                                                        <p><?php echo number_format($row_detail['GiaDatHang'])."₫"?></p>
                                                    </div>

                                                <?php
                
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php
							
						}
						mysqli_close($connect);

					?>
				</table>
			</div>
		</div>
	</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
<?php
	}
	?>