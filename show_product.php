<?php
	include "function.php";
?>
<div class="row">
	<div class="col">
		<div class="d-flex justify-content-between">
			<h4>ĐIỆN THOẠI KHUYẾN MẠI HOT</h4>
			<a href="phone.php">Xem tất cả</a>
		</div>
		<hr>
	</div>
</div>

<div class="row">
<?php
	$type="DT";
	showProductByType($type);
?>
</div>

<div class="row">
	<div class="col">
		<div class="d-flex justify-content-between">
			<h4>LAPTOP KHUYẾN MẠI HOT</h4>
			<a href="laptop.php">Xem tất cả</a>
		</div>
		<hr>
	</div>
</div>
<div class="row">
<?php
	$type="MT";
	showProductByType($type);
?>
</div>
<div class="row">
	<div class="col">
		<div class="d-flex justify-content-between">
			<h4>TABLET KHUYẾN MẠI HOT</h4>
			<a href="tablet.php">Xem tất cả</a>
		</div>
		<hr>
	</div>
</div>
<div class="row">
<?php
	$type="TB";
	showProductByType($type);
?>
</div>