<?php


//phone-laptop-table
function showProductByType($type){
    include 'Resoures/php/connect.php';	
    $sql = "SELECT `MSHH`,`TenHH`,`Gia`,`SoLuongHang`,`hinh` FROM `hanghoa` WHERE `MaNhom`='$type' LIMIT 8";
    $result = mysqli_query($connect,$sql);
    while ($row= mysqli_fetch_array($result)) {
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

        $html='<div class="col-md-6 col-sm-12 col-lg-3">	
                <div class="card shadow " style="margin-bottom: 30px;">
                    <div class="inner d-flex justify-content-center pt-2">
                        <img src="Resoures/'.$img_product.'" class="card-img-top" style="width: 200px; height: 200px;">
                    </div>
                    <div class="card-body">
                        <h4 class="card-title" style="font-size: 1.3em">'.
                        $name_product."  ".'
                        <small class="text-danger">'.$msg.'</small>
                        </h4>
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

                        if($quantity != 0){
                                 
                            $html.='<a href="info_product.php?id='.$id.'" class="mt-2 stretched-link"></a>';
                          
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



function alertMess($msg){
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}


?>