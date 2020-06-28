<header>
			<nav class="navbar navbar-expand-md navbar-light fixed-top bg-light">
				
				<a href="index.php" class="navbar-brand"><img src="Resoures/img/logo_2.png"></a>
				
				<form class="form-inline mr-auto" action="search.php" method="post">
					<div class="input-group">
						<input type="text" class="form-control shadow-none" name="input_search" placeholder="Search something..." required autocomplete="off" size="25">
						<div class="input-group-append">
							<button type="submit" name="search" class="btn btn-success"><i class="fas fa-search"></i></button>
						</div>
					</div>
				</form>

				<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav">
					<span><i class="fas fa-bars"></i></span>
				</button>
				
				<div class="collapse navbar-collapse" id="nav">
					<ul class="navbar-nav ml-auto">
						<?php 
							if(isset($_SESSION['User_Name']) && isset($_SESSION["admin"])){
							?>
								<li class="nav-item">
									<a href="Resoures/php/admin.php" class="nav-link text-center">HELLO <span class="text-uppercase"><?php echo $_SESSION['User_Name'];?></span></a>
								</li>
						<?php
							}else if(isset($_SESSION['User_Name'])){
								?>
								<li class="nav-item">
									<a href="info_customer.php" class="nav-link text-center">HELLO <span class="text-uppercase"><?php echo $_SESSION['User_Name'];?></span></a>
								</li>
						<?php
							}
						?>
						<li class="nav-item">
							<a href="index.php" class="nav-link text-center">HOME</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link text-center"><i class="fas fa-bell"></i></a>
						</li>
						<li class="nav-item">
							<a href="phone.php" class="nav-link text-center">PHONE</a>
						</li>
						<li class="nav-item">
							<a href="laptop.php" class="nav-link text-center">LAPTOP</a>
						</li>
						<li class="nav-item">
							<a href="tablet.php" class="nav-link text-center">TABLET</a>
						</li>
						<li class="nav-item">
							<a href="buy_product.php" class="nav-link text-center"><i class="fas fa-cart-arrow-down"></i><span class="notice">
							<?php if(!isset($_SESSION['shopping_cart'])){
								echo 0;
							}else{
								echo $_SESSION['cart_count'];
							}
							?></span></a>
						</li>
						<li class="nav-item">
							<?php if(isset($_SESSION['User_Name'])){
								?>
								<a href="Resoures/php/logout.php" class="btn nav-link"><i class="fas fa-sign-out-alt"></i></a>
							<?php

								}else{

							?>
								<button type="button" class="btn shadow-none" id="btn-login" data-target="#myModal" data-toggle="modal"><i class="far fa-user"></i></button>
								
								<div class="modal fade" id="myModal">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
										    	<h4 class="modal-title">Canvas</h4>
										      <!--   <button type="button" class="close" data-dismiss="modal">&times;</button> -->
										    </div>
										    <div class="modal-body">
									
	  											<form action="Resoures/php/login.php" method="post">
													<div class="form-group">
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="fa fa-paper-plane"></i></span>
															</div>
									
															<input type="email" required name="Gmail" class="form-control shadow-none" autocomplete="off" placeholder="Gmail">
														</div>
													</div>
													<div class="form-group">
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="fa fa-lock"></i></span>
															</div>
														
															<input type="password" name="pwd" required placeholder="Password" class="form-control shadow-none">
														</div>
													</div>
													<div class="form-group">
														<button type="submit" name="Login" class="btn btn-primary btn-block btn-lg shadow-none" style="border-radius: 10px">Đăng Nhập</button>
													</div>
													<div class="text-center">Bạn chưa có tài khoản? <a href="Resoures/php/signup_form.php">Đăng ký</a></div>
												</form>
	  										</div>
										    <div class="modal-footer">
										        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
										    </div>
										</div>
									</div>
								</div>
							<?php
							}
							?>
						</li>
					</ul>
				</div>
			</nav>
	
</header>