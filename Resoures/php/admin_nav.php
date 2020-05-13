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
					<a href="showallproduct.php">--Product</a>
				</li>
				<li class="li-custom">
					<a href="showallmember.php">--Member</a>
				</li>
			</ul>
		</li>
		<li class="active">
			<a href="#addmenu" data-toggle="collapse" class="dropdown-toggle" aria-expanded="false">Add</a>
			<ul class="collapse list-unstyled" id="addmenu">
				<li class="li-custom">
					<a href="add.php">--Product</a>
				</li>
				<li class="li-custom">
					<a href="add_member.php">--Member</a>
				</li>
			</ul>
		</li>
	</ul>
	<p class="text-center text-uppercase">Hello <?php echo $_SESSION['User_Name']?></p>
	<div class="d-flex justify-content-around">
		
		<a href="../../../Do_an_web/index.php" class="btn btn-primary">HOME</a>
		<a href="logout.php" class="btn btn-danger">THOAT</a>
	</div>
</nav>