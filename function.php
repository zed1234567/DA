<?php


//phone-laptop-table
function showProductByType($type){
    include 'Resoures/php/connect.php';	
    $sql = "SELECT `MSHH`,`TenHH`,`Gia`,`SoLuongHang`,`hinh` FROM `hanghoa` WHERE `MaNhom`='$type'";
    $result = mysqli_query($connect,$sql);
    while ($row= mysqli_fetch_array($result)) {
        $id = $row['MSHH'];
        $name_product = $row['TenHH'];
        $price = number_format($row['Gia']);
        $img_product = $row['hinh'];
        $quantity = $row['SoLuongHang'];

        $html='<div class="col-md-6 col-sm-12 col-lg-3">	
                <div class="card shadow" style="margin-bottom: 30px;">
                    <div class="inner">
                        <img src="Resoures/'.$img_product.'" class="card-img-top" style="width: 100%; height: 180px;">
                    </div>
                    <div class="card-body">
                        <h4 class="card-title" style="font-size: 1.3em">'.$name_product.'</h4>
                        <div class="card-text">'.
                            $price.' VND<br>

                            <div class="product-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            
                        </div>';

                            if($quantity == 0){
                                $html.= "<button class='btn btn-danger mt-2'>Tạm hết hàng</button>";
                            }else{
                                
                                $html.='<a href="info_product.php?id='.$id.'" class="btn btn-success mt-2">Buy now.</a>';
            
                            }
                        
            $html.='        
                    </div>
                </div>
            </div>';
            echo $html;
        
            

    
    }
    mysqli_free_result($result);
    mysqli_close($connect);
    
			
    
}



?>