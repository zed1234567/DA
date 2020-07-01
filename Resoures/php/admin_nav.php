<?php 
	if(!isset($_SESSION['admin'])){
		echo '<script type="text/javascript">window.history.back();</script>';
	}else{
		
	?>
<div class="wrapper">
	<nav id="sidebar">
		<div class="sidebar-header">
			<img src="../img/logo_2.png">
		</div>
		
		<ul class="list-unstyled components">
			<p class="p">Shop Admin</p>
			<li>
				<a href="#showall" data-toggle=collapse class="dropdown-toggle">Show All</a>
				<ul class="collapse list-unstyled" id="showall">
					<li class="li-custom">
						<a href="showallproduct.php">Product</a>
					</li>
					<li class="li-custom">
						<a href="showallmember.php">Member</a>
					</li>
					<li class="li-custom">
						<a href="showallcustomer.php">Customer</a>
					</li>
					<li class="li-custom">
						<a href="detailorder.php">Order</a>
					</li>
				</ul>
			</li>
			<li class="active">
				<a href="#addmenu" data-toggle="collapse" class="dropdown-toggle" aria-expanded="false">Add</a>
				<ul class="collapse list-unstyled" id="addmenu">
					<li class="li-custom">
						<a href="add.php">Product</a>
					</li>
					<li class="li-custom">
						<a href="add_member.php">Member</a>
					</li>
					<li class="li-custom">
						<a href="add_group.php">Group</a>
					</li>
				</ul>
			</li>
		</ul>
		<p class="text-center text-uppercase">Hello <?php echo $_SESSION['User_Name']?></p>
		<div class="d-flex justify-content-around">
			
			<a href="../../../Do_an_web/index.php" class="btn btn-primary"><i class="fas fa-home"></i></a>
			<a href="admin.php" class="btn btn-info"><i class="fas fa-house-user"></i></a>
			<a href="logout.php" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i></a>
		</div>
	</nav>
	
</div>

<?php
	}
?>