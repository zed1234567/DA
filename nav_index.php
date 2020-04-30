<header>
			<nav class="navbar navbar-expand-md navbar-light fixed-top bg-light">
				
				<a href="index.php" class="navbar-brand"><img src="Resoures/img/logo_2.png"></a>
				
				<form class="form-inline mr-auto" action="search.php" method="post">
					<div class="input-group">
						<input type="text" class="form-control col-sm" name="input_search" placeholder="Search something..." required size="40px">
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
						<?php if(isset($_SESSION['ID_User'])){
							?>
							<li class="nav-item">
								<a href="#" class="btn btn-info text-uppercase nav-link">Hello <?php echo $_SESSION['User_Name'];?></a>
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
							<a href="#" class="nav-link text-center">LAPTOP</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link text-center">TABLET</a>
						</li>
						<li class="nav-item">
							<a href="buy_product.php" class="nav-link text-center"><i class="fas fa-cart-arrow-down"></i><span class="notice"><?php if(!isset($_SESSION['cart_count'])){
								echo 0;
							}else{
								echo $_SESSION['cart_count'];
							}
							?></span></a>
						</li>
						<!-- <li class="nav-item"> -->
							<?php if(isset($_SESSION['ID_User'])){
								?>
								<a href="Resoures/php/logout.php" class="btn btn-outline-secondary nav-link">LOGOUT</a>
							<?php

								}else{

							?>
								<button type="button" class="btn " id="btn-login" data-target="#myModal" data-toggle="modal"><i class="far fa-user"></i></button>
								<div class="modal" id="myModal">
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
									
															<input type="email" required name="Gmail" class="form-control" placeholder="Gmail">
														</div>
													</div>
													<div class="form-group">
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text"><i class="fa fa-lock"></i></span>
															</div>
														
															<input type="password" name="pwd" required placeholder="Password" class="form-control">
														</div>
													</div>
													<div class="form-group">
														<button type="submit" name="Login" class="btn btn-primary btn-block btn-lg" style="border-radius: 10px">Dang Nhap</button>
													</div>
													<div class="text-center">Do you have account? <a href="Resoures/php/signup_form.php">Sign in</a></div>
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
						<!-- </li> -->
					</ul>
				</div>
			</nav>
	
</header>