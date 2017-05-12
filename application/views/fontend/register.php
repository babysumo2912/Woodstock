<?php include 'header.php' ?>
<!--<?php echo $this->session->userdata('captcha')?>-->
<div class = "login-form">
    <?php 
    $style = array(
        'class' => 'form-group'
    )
    ?>
    <?php echo form_open('home/register', $style)?>
        <fieldset>
            <legend>ĐĂNG KÍ</legend>
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
                    <i class = "fa fa-check-square-o fa-lg"></i>
                    <a href="<?php echo base_url()?>home/login"><?php echo $succ;?></a>
                </p>
                <?php
            }
            ?>
            <div class = "form-group">
                <lable>Tài khoản <span>(*)</span></lable>
                <input type="text" class = "form-control" required name = "account">
            </div>
            <div class = "form-group">
                <lable>Password <span>(*)</span></lable>
                <input type="password" class="form-control" name="password" required>
            </div>
            <div class = "form-group">
                <lable>Nhập lại mật khẩu <span>(*)</span></lable>
                <input type="password" class = "form-control" name="re_password" required>
            </div>
            <div class = "form-group">
                <lable>Nhập mã xác nhận <span>(*)</span></lable>
                <input type="text" class = "form-control" name="captcha" required><br>
                <div class = "captcha">
                    <?php echo $image?>
                </div>
            </div>
            <div class = "form-group text-center">
                <input type="submit" class = "btn btn-default" value = "Đăng kí">
            </div>
        </fieldset>
    <?php echo form_close()?>
</div>
<?php include 'footer.php'?>