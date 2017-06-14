
<html>
<head>
    <title>Woodstock | Truy cập Admin</title>
    <meta charset = "utf-8">
    <meta name="viewport" content="width=device-width, initial-scale= 1">
    <meta property = "og:title" content = "Woodstock Việt Nam - Ứng dụng mua bán trên Website hàng đầu Việt Nam">
    <meta property = "og:url" content = "<?php echo base_url()?>">
    <meta peoperty = "og:img" content = "<?php echo base_url()?>public/img/style/imgdaidien.JPG">
    <link rel="icon" href="<?php echo base_url()?>public/img/style/icon1.png">
    <link rel="stylesheet" href="<?php echo base_url()?>public/style/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>public/style/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>public/style/css/w3school.css">
    <link rel="stylesheet" href="<?php echo base_url()?>public/style/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url()?>public/style/css/reponsive.css">
    <link rel="stylesheet" href="<?php echo base_url()?>public/style/css/rateit.css">
    <script src = "<?php echo base_url()?>public/style/js/jquery-3.1.0.js"></script>
    <script src = "<?php echo base_url()?>public/style/js/bootstrap.min.js"></script>
    <script src = "<?php echo base_url()?>public/style/js/jquery.cycle2.min.js"></script>
    <script src = "<?php echo base_url()?>public/style/js/javascript.js"></script>
    <script src = "<?php echo base_url()?>public/style/js/jquery.rateit.js"></script>
</head>
<body class="body-login">
  <div class="waper-login">
    <div class="form-login" style = "border-radius:10px 10px 0 0;">
      <div class="login-f">
        <p class="title-login text-center">
          <span><img src="<?php echo base_url()?>public/img/style/icon1.png" alt="iconWoodstock"></span>
          <b>WOODSTOCK</b><sup>&reg;</sup>
        </p>
        <?php 
            if(isset($err)){
              ?>
              <div class="error">
                <i class="fa fa-exclamation-triangle fa-lg" aria-hidden="true"></i> &nbsp;<?php echo $err ?>
              </div>
              <?php
            }
            ?>
        <!--<p>Register an account now to receive incentives from us.</p>-->
        <?php 
        $style = array(
          "style" => "padding-top: 20px;",
          "class" => "form-group",
        );
        echo form_open("admin/login", $style);
        ?>
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user-secret fa-lg"></i></span>
                <input type="text" class="form-control" name="account" placeholder="Tài khoản" required>
              </div>
            </div>
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock fa-lg"></i></span>
                <input type="password" class="form-control" name="password" placeholder="Mật khẩu" required>
              </div>
            </div>
            <div class="form-group">
                <a href="">Quên mật khẩu?</a>
                <input type="submit" name="login" class="btn btn-default" style="float: right;" value="Đăng nhập">
            </div>
        <?php echo form_close() ?>
     </div>
    </div>
    <div class="text-center" style="margin:5% 0;">
      <a href="<?php echo base_url()?>"><i class="fa fa-arrow-left fa-lg"></i> &nbsp;Về trang chủ</a>
    </div>
    <div class="text-center form-login" style = "border-radius:0 0 10px 10px ;">
      <b>Tài khoản thử nghiệm</b>
      <p>Tài khoản: admin <br>Mật khẩu: admin</p>
    </div>
  </div>
  <p class="coppyright">Copyright© 2017 Trần Ngọc Đức - 1221050140.</p>
  </body>
</html>