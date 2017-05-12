<?php include 'header.php' ?>
<div class = "login-form">
    <?php 
    $style = array(
        'class' => 'form-group'
    )
    ?>
    <?php echo form_open('home/login', $style)?>
        <fieldset>
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
            <?php
            if(isset($succ)){
                ?>
                <p class = "err text-center">
                    <i class = "fa fa-check-square-o"></i>
                    <?php echo $succ;?>
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
        </fieldset>
    <?php echo form_close()?>
</div>
<?php include 'footer.php'?>