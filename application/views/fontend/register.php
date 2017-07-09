<?php include 'header.php' ?>
<!--<?php echo $this->session->userdata('captcha')?>-->
<div class = "login-form">
    <?php 
    $style = array(
        'class' => 'form-group'
    )
    ?>
    
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
                <p class = "succ text-center">
                    <i class = "fa fa-check-square-o fa-lg"></i>
                    <a href="<?php echo base_url()?>home/login/0"><?php echo $succ;?></a>
                </p>
                <?php
            }
            ?>
            <?php 
            echo form_open('home/verty');

             ?>
             <div class="input-group">
                <input name="phone" type="tel" pattern="([0]{1})([0-9]{9,})" placeholder="Điền số điện thoại..." required class="form-control">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">Gửi mã kích hoạt</button>
                </span>
            </div>
            <?php echo form_close(); ?>
            <br>
            <?php echo form_open('home/register', $style)?>
            <div class = "form-group">
                <lable>Nhập mã kích hoạt <span>(*)</span></lable>
                <input type="text" class = "form-control" required name = "verty">
            </div>
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
            <?php echo form_close()?>
        </fieldset>
</div>
<?php include 'footer.php'?>