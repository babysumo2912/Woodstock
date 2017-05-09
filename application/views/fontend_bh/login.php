<?php include'header.php' ?>
<section class = "color_f5f5f5">
<div class = "max row top40">
    <div class = "col-md-5 seo">
        <p>
            <h2>Bán hàng chuyên nghiệp</h2>
            Quản lí Shop của bạn một cách dễ dàng hơn trên Woodstock với Kênh người bán
        </p>
        <img src="<?php echo base_url()?>public/img/style/login-img.png" alt="">
    </div>
    <div class = "col-md-3"></div>
    <div class = "col-md-4">
        <div class = "login-form-bh">
            <?php 
            $style = array(
                'class' => 'form-group'
            )
            ?>
            <?php echo form_open('banhang/login', $style)?>
                <legend>ĐĂNG NHẬP</legend>
                <?php 
                if(isset($err)){
                ?>
                    <p class = "err text-center">
                    <i class = "fa fa-warning"></i>
                    <?php echo $err;?>
                    </p>
                <?php
                }
                ?>
                <div class = "form-group">
                    <lable>Tài khoản <span>(*)</span></lable>
                    <?php if(isset($account)){
                    ?>
                    <input type="text" class = "form-control" name = "account" required value = <?php echo $account ?>>
                    <?php }else{
                    ?>
                    <input type="text" class = "form-control" name = "account" required>
                    <?php
                    }
                    ?>
                </div>
                <div class = "form-group">
                    <lable>Password <span>(*)</span></lable>
                    <input type="password" class = "form-control" name = "password" required>
                </div>
                <div class = "form-group">
                    <a href="#">Quên mật khẩu ?</a>
                </div>
                <div class = "form-group text-center">
                    <input type="submit" class = "btn btn-default" value = "Đăng nhập">
                </div>
            <?php echo form_close()?>
        </div>
    </div>
</div>
</section>
<?php include'footer.php' ?>