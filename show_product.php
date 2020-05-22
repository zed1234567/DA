<?php include 'Resoures/php/connect.php';?>
<h4>ĐIỆN THOẠI KHUYẾN MẠI HOT</h4>
<div class="row">
	<?php
		$sql = "SELECT `MSHH`,`TenHH`,`Gia`,`SoLuongHang`,`hinh` FROM `hanghoa` WHERE `MaNhom`='DT' or `MaNhom`='MT' order by `TenHH` desc limit 8";
		$result = mysqli_query($connect,$sql);
		while ($row= mysqli_fetch_array($result)) {
			$id = $row['MSHH'];
			$name_product = $row['TenHH'];
			$price = number_format($row['Gia']);
			$img_product = $row['hinh'];
		?>
			
				<div class="col-md-4 col-sm-6">	
					<div class="card shadow" style="margin-bottom: 30px;">
						<div class="inner">
							<img src="Resoures/<?php echo $img_product?>" class="card-img-top" style="width: 100%; height: 180px;">
						</div>
						
						<div class="card-body">
							<h4 class="card-title" style="font-size: 1.3em"><?php echo $name_product?></h4>
							<div class="card-text">
								<?php echo $price." VND"?><br>

								<div class="product-rating">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star-half-alt"></i>
								</div>
								
							</div>
							<a href="info_product.php?id=<?php echo $id;?>" class="btn btn-success mt-2">Buy now.</a>
						</div>
					</div>
				</div>

		<?php
		}
		mysqli_free_result($result);
	?>
	
				

	
</div>
<h4>LAPTOP KHUYẾN MẠI HOT</h4>
<div class="row">
	<?php
		$sql = "SELECT `MSHH`,`TenHH`,`Gia`,`hinh` FROM `hanghoa` WHERE `MaNhom`='DT' or `MaNhom`='MT' order by `TenHH` desc limit 6";
		$result = mysqli_query($connect,$sql);
		while ($row= mysqli_fetch_array($result)) {
			$id = $row['MSHH'];
			$name_product = $row['TenHH'];
			$price = number_format($row['Gia']);
			$img_product = $row['hinh'];
		?>
				<div class="col-md-4 col-sm-6">	
					<div class="card shadow" style="margin-bottom: 30px;">
						<div class="inner">
							<img src="Resoures/<?php echo $img_product?>" class="card-img-top" style="width: 100%; height: 180px;">
						</div>
						
						<div class="card-body">
							<h4 class="card-title" style="font-size: 1.3em"><?php echo $name_product?></h4>
							<div class="card-text">
								<?php echo $price." VND"?><br>

								<div class="product-rating">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star-half-alt"></i>
								</div>
								
							</div>
							<a href="info_product.php?id=<?php echo $id;?>" class="btn btn-success mt-2">Buy now.</a>
						</div>
					</div>
				</div>

		<?php
		}
		mysqli_free_result($result);
	?>
	
</div>
<h4>TABLET KHUYẾN MẠI HOT</h4>
<div class="row">
	<?php
		$sql = "SELECT `MSHH`,`TenHH`,`Gia`,`hinh` FROM `hanghoa` WHERE `MaNhom`='DT' or `MaNhom`='MT' order by `TenHH` desc limit 6";
		$result = mysqli_query($connect,$sql);
		while ($row= mysqli_fetch_array($result)) {
			$id = $row['MSHH'];
			$name_product = $row['TenHH'];
			$price = number_format($row['Gia']);
			$img_product = $row['hinh'];
		?>
				<div class="col-md-4 col-sm-6">	
					<div class="card shadow" style="margin-bottom: 30px;">
						<div class="inner">
							<img src="Resoures/<?php echo $img_product?>" class="card-img-top" style="width: 100%; height: 180px;">
						</div>
						
						<div class="card-body">
							<h4 class="card-title" style="font-size: 1.3em"><?php echo $name_product?></h4>
							<div class="card-text">
								
								<p><?php echo $price." VND"?></p><br>
								

								<div class="product-rating">
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star"></i>
									<i class="fas fa-star-half-alt"></i>
								</div>
								
							</div>
							<a href="info_product.php?id=<?php echo $id;?>" class="btn btn-success mt-2">Buy now.</a>
						</div>
					</div>
				</div>
		<?php
		}
		mysqli_free_result($result);
	?>
	
</div>