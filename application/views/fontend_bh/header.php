<html>
    <head>
        <title>Woodstock | Mua và bán trên Website</title>
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
    <body>
        <section class ="hd">
            <div class="container-fluid hd1">
            <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <i class = "fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand home" href="<?php echo base_url()?>"><i class = "fa fa-home"></i>&nbsp; Woodstock</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="<?php echo base_url()?>banhang"><i class = "fa fa-group"></i> Kênh người bán<span class="sr-only">(current)</span></a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                    <?php 
                    if(isset($user)){
                    ?>
                        <li>
                            <a href="#">
                                <div class = "user">
                                    <div class = "avatar" style = "background:url('<?php echo base_url()?>/public/img/user/avatar/<?php echo $avatar ?>') center; background-size: cover"></div>
                                    &nbsp;<span><?php echo $user?></span>
                                </div>
                            </a>
                        </li>
                        <li><a href="<?php echo base_url()?>banhang/logout"><i class = "fa fa-power-off"></i>&nbsp;Đăng xuất</a></li>
                    <?php
                    }else{
                    ?>
                        <li><a href="#"><i class = "fa fa-truck"></i>&nbsp;Tra cứu vận đơn</a></li>
                        <?php }?>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div>
        </section>