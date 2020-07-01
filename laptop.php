<?php 
	session_start();
	include 'Resoures/php/connect.php';	
    include 'function.php';
    $type ="MT";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Phone</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="Resoures/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="Resoures/css/stylesIndex.css">
    <link rel="stylesheet" href="Resoures/fontawesome/css/all.css">
<body>
	<div class="container-fluid">
		<!-- NAV -->
		<?php include "nav_index.php"?>
		<!-- END-NAV -->

		<!-- carousel -->

		<div class="row" style="margin-top: 90px">
			<div class="col-md">
				<img src="Resoures/img/qc_1.gif" width="100%" style="margin-bottom: 5px">

			</div>
		</div>
		
		

		<div class="row">
			<div class="col">
				<hr>
				<div class="d-flex justify-content-between">
					<h3>MÁY TÍNH NỔI BẬT</h3>

                <!-- FORM FILTER PRODUCT -->
                    <form action="" method="post">
                        <div class="form-row">
                            
                            <div class="col">
                                <select class="custom-select" name="brand" id="brand" onchange="filterProduct()">

                                    <option value="" selected disabled>Thương hiệu</option>
                                    <?php
                                        $sql = "SELECT DISTINCT `ThuongHieu` FROM `hanghoa` WHERE `MaNhom`='$type'";
                                        $result = mysqli_query($connect,$sql);
                                        while($row = mysqli_fetch_array($result)){
                                            
                                            echo '<option value="'.strtoupper($row['ThuongHieu']).'">'.strtoupper($row['ThuongHieu']).'</option>';
                                        }
                                    ?>
                                
                                    
                                </select>
                            </div>

                            <div class="col">
                                <select class="custom-select" name="price" id="price" onchange="filterProduct()">

                                    <option value="" selected disabled>Mức giá</option>
                                    <option value="5000000">Dưới 5 triệu</option>
                                    <option value="10000000">Từ 5 - 10 triệu</option>
                                    <option value="15000000">Từ 10 - 15 triệu</option>
                                    <option value="16000000">Trên 15 triệu</option>
                                    
                                </select>
                            </div>

                            <div class="col">
                                <select class="custom-select" name="sort" id="sort" onchange="filterProduct()">

                                    <option value="" selected disabled>Sắp xếp</option>
                                    <option value="ASC">Giá tăng dần</option>
                                    <option value="DESC">Giá giảm dần</option>
                                    
                                </select>
                            </div>

                        </div>
                        
                        <input type="hidden" name="select" value="<?php echo $type; ?>" id="select">
                    </form>
                    <!-- END FROM FILTER PRODUCT -->
					
				</div>
				<hr>
			</div>
		</div>

		<div class=row id="product">
        <?php
            // PHÂN TRANG SẢN PHẨM
            if(isset($_GET['page']) && $_GET['page']!=''){
                $page = $_GET['page'];
            }else{
                $page = 1;
            }
            //8 product in one page
            $total_product_per_page = 8;
            $offset = ($page-1) * $total_product_per_page;

            $sql_get_total_product = "SELECT COUNT(*) AS total FROM `hanghoa` WHERE `MaNhom`='$type'";
            $total_product = mysqli_fetch_array(mysqli_query($connect,$sql_get_total_product));

            //quantity of page
            $total_page = ceil($total_product['total'] / $total_product_per_page);

            $sql_per_page = "SELECT * FROM `hanghoa` WHERE `MaNhom`='$type' LIMIT $offset, $total_product_per_page";
            $result = mysqli_query($connect,$sql_per_page) or die( printf("Error: %s\n", mysqli_error($connect)));;
            while($row = mysqli_fetch_array($result)){
                $id = $row['MSHH'];
                $name_product = $row['TenHH'];
                $price = number_format($row['Gia']);
                $img_product = $row['hinh'];
				$quantity = $row['SoLuongHang'];
				
				if($quantity == 0){
					$msg="(Tạm hết hàng)";
				}else{
					$msg="";
				}

                ?>
                <div class="col-md-3 col-sm-6">	
                    <div class="card shadow" style="margin-bottom: 30px;">
                        <div class="inner d-flex justify-content-center pt-2">
                            <img src="Resoures/<?php echo $img_product?>" class="card-img-top" style="width: 200px; height: 200px;">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title" style="font-size: 1.3em">
                            	<?php echo $name_product."  "?>
                            	<small class="text-danger"><?php echo $msg?></small>
                            </h4>
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
                            <?php 
                                if($quantity != 0){
                                 
                                    echo '<a href="info_product.php?id='.$id.'" class="mt-2 stretched-link"></a>';
                                  
                                }
                            
                            ?>
                        </div>
                    </div>
                </div>
                <?php
			}
			mysqli_close($connect);
        
        ?>
            <div class="col-12">
                <div class="row">
                    <ul class="col pagination justify-content-center" style="margin: 20px 0;">
                        <?php
                            for($num_page = 1; $num_page <= $total_page; $num_page++){
                                if($num_page == $page ){
                                    echo '<li class="page-item active"><a class="page-link" href="laptop.php?page='.$num_page.'">'.$num_page.'</a></li>';
                                }else{
                                    echo '<li class="page-item "><a class="page-link" href="laptop.php?page='.$num_page.'">'.$num_page.'</a></li>';
                                }
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </div>

		<!-- Footer -->
		
		<footer>
			<?php include 'footer.php';?>
		</footer>
		<!-- End-footer -->
	</div>
    <script>
        function filterProduct(){
            
            var brand = document.getElementById("brand").value;
            var sort = document.getElementById("sort").value;
            var price = document.getElementById("price").value;
            var type = document.getElementById("select").value;
           
            var request = new XMLHttpRequest();
            request.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                   document.getElementById("product").innerHTML = this.responseText;
                }
            };

            request.open("POST","brand.php", true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send("brand="+brand+"&sort="+sort+"&price="+price+"&select="+type);
        }
    </script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>