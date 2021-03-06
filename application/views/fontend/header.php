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
    <section class = "hd">

        <div class="container-fluid hd1">
    <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <i class = "fa fa-bars"></i>
                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse hd-sm" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo base_url()?>banhang"><i class = "fa fa-group"></i> &nbsp;Kênh người bán</a></li>
                <li><a href="#"><i class = "fa fa-smile-o"></i> &nbsp;Trợ giúp</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php 
                if(isset($user)){
                ?>
                <li><a href="<?php echo base_url()?>infomation/buyer">
                        <div class = "user">
                            <div class = "avatar" style = "background:url('<?php echo base_url()?>/public/img/user/avatar/<?php echo $avatar ?>') center; background-size: cover"></div>
                            &nbsp;<span><?php echo $user?></span>
                        </div>
                    </a>
                </li>
                <li><a href="<?php echo base_url()?>home/logout"><i class = "fa fa-power-off"></i> &nbsp;Đăng xuất</a></li>
                <?php
                }else{
                ?>
                <li><a href="<?php echo base_url()?>home/register"><i class = "fa fa-address-book-o"></i> &nbsp;Đăng kí</a></li>
                <li><a href="<?php echo base_url()?>home/login/0"><i class = "fa fa-user-o"></i> &nbsp;Đăng nhập</a></li>
                <?php } ?>
            </ul>
            </div><!-- /.navbar-collapse -->
        </div>

    </section>
    <section class = "row hd2">
        <div class = "wapper-hd2">
            <div class = "col-md-3 col-sm-4 col-xs-12">
                <a href="<?php echo base_url()?>">
                    <img src="<?php echo base_url()?>public/img/style/logo.png" alt="Shopee">
                </a>
            </div>
            <div class = "col-md-6 col-sm-4 col-xs-12">
                <?php 
                $style = array(
                    'class'=>'form-group',
                    'style' => 'margin-top: 30px',

                    );
                echo form_open('home/search',$style)

                 ?>
                <!-- <form action="" class = "form-group" style="margin-top:30px"> -->
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Tìm kiếm sản phẩm ..." required name="search">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">Tìm kiếm</button>
                        </span>
                    </div>
                <!-- </form> -->
                <?php echo form_close(); ?>
            </div>
            <div class = "col-md-3 col-sm-4 col-xs-12">
                <div class = "hd-right">
                    <a href="<?php echo base_url()?>cart">
                        <i class = "fa fa-shopping-bag fa-2x"><sup><?php
                                if(isset($count)){
                                    echo $count;
                                }else echo 0;
                                ?></sup></i>
                    </a>
                    <a href="">
                        <i class = "fa fa-bell-o fa-2x"><sup>
                            <?php 
                            if(isset($number_noti)){
                                echo $number_noti;
                            }else echo 0;

                             ?>
                        </sup></i>
                    </a>
                </div>
            </div>
        </div>
    </section>