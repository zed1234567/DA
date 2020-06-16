<form action="brand.php" method="post">
    <div class="form-row">

        <div class="col">
            <select class="custom-select" name="brand"  onchange="this.form.submit()">

                <option value="" selected disabled>Thương hiệu</option>
                <option value="SAMSUNG" <?php if(isset($_POST['brand']) && $_POST['brand']=='SAMSUNG'){echo "selected";}?>>SAMSUNG</option>
                <option value="IPHONE" <?php if(isset($_POST['brand']) && $_POST['brand']=='IPHONE'){echo "selected";}?>>IPHONE</option>
                <option value="SONY" <?php if(isset($_POST['brand']) && $_POST['brand']=='SONY'){echo "selected";}?>>SONY</option>
                
            </select>
        </div>

        <div class="col">
            <select class="custom-select" name="sort"  onchange="this.form.submit()">

                <option value="" selected disabled>Sắp xếp</option>
                <option value="ASC" <?php if(isset($_POST['sort']) && $_POST['sort']=='ASC'){echo "selected";}?>>Giá tăng dần</option>
                <option value="DESC" <?php if(isset($_POST['sort']) && $_POST['sort']=='DESC'){echo "selected";}?>>Giá giảm dần</option>
                
            </select>
        </div>

    </div>
    
    <input type="hidden" name="select">
</form>