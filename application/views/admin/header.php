<html>
<head>
<title>Woodstock | Admin</title>
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
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><i class="fa fa-home fa-lg"></i></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-cubes"></i>&nbsp;Quản lí sản phẩm<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Danh mục sản phẩm</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?php echo base_url() ?>admin/product">Danh sách Sản phẩm</a></li>
          </ul>
        </li>
        <li><a href="<?php echo base_url() ?>admin/user"><i class="fa fa-users"></i> Quản lí người dùng</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-building"></i>&nbsp;Quản lí giao dịch <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url() ?>admin/invoice/view/0">Hóa đơn chờ xác nhận</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="admin/invoice/view/1">Hóa đơn chờ lấy</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="admin/invoice/view/2">Hóa đơn đang giao</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="admin/invoice/view/3">Hóa đơn hoàn thành</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="admin/invoice/view/4">Hóa đơn hủy</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="admin/invoice/view/5">Hóa đơn hoàn về</a></li>
          </ul>
        </li>
        <li><a href="#"><i class="fa fa-money"></i> Quản lí doanh thu</a></li>
         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-newspaper-o"></i>&nbsp;Quản lí tin tức<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Danh mục tin tức</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Danh sách bài viết</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>