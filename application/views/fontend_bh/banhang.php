<?php include'header.php';?>
<section class = "center_bh">
    <div class ="title_bh text-center">
        <p>Chào mừng đến với Woodstock - Kênh người bán</p>
    </div>
    <div class = "text-center">
        <span>Woodstock - Kênh Người bán là công cụ quản lý shop, giúp bạn dễ phân loại sản phẩm, theo dõi đơn hàng, chăm sóc khách hàng và đánh giá hoạt động của shop.
Là chủ shop, bạn vui lòng đọc kĩ và tuân thủ <b><a href="">Chính sách vận chuyển Woodstock</a></b>.
        </span>
        <div class = "row">
            <div class = "col-md-3 col-sm-4 col-xs-6">
                <div class = "catalog_bh">
                    <a href="<?php echo base_url()?>product">
                        <div class = "icon_catalog">
                            <i class = "fa fa-gift fa-4x"></i>
                        </div>
                        <div class = "text-center">
                            <p>Sản phẩm</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class = "col-md-3 col-sm-4 col-xs-6">
                <div class = "catalog_bh">
                    <a href="<?php echo base_url()?>sale/invoice">
                        <div class = "icon_catalog">
                            <i class = "fa fa-building-o fa-4x"></i>
                        </div>
                        <div class = "text-center">
                            <p>Đơn bán <sup><?php echo $number_invoice?></sup></p>
                        </div>
                    </a>
                </div>
            </div>
            <div class = "col-md-3 col-sm-4 col-xs-6">
                <div class = "catalog_bh">
                    <a href="#">
                        <div class = "icon_catalog">
                            <i class = "fa fa-envelope-o fa-4x"></i>
                        </div>
                        <div class = "text-center">
                            <p>Tin nhắn <sup>0</sup></p>
                        </div>
                    </a>
                </div>
            </div>
            <div class = "col-md-3 col-sm-4 col-xs-6">
                <div class = "catalog_bh">
                    <a href="">
                        <div class = "icon_catalog">
                            <i class = "fa fa-bell-o fa-4x"></i>
                        </div>
                        <div class = "text-center">
                            <p>Thông báo</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class = "col-md-3 col-sm-4 col-xs-6">
                <div class = "catalog_bh">
                    <a href="<?php echo base_url() ?>sale/revenue">
                        <div class = "icon_catalog">
                            <i class = "fa fa-money fa-4x"></i>
                        </div>
                        <div class = "text-center">
                            <p>Doanh Thu</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class = "col-md-3 col-sm-4 col-xs-6">
                <div class = "catalog_bh">
                    <a href="#">
                        <div class = "icon_catalog">
                            <i class = "fa fa-credit-card fa-4x"></i>
                        </div>
                        <div class = "text-center">
                            <p>Ví Woodstock</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class = "col-md-3 col-sm-4 col-xs-6">
                <div class = "catalog_bh">
                    <a href="<?php echo base_url()?>myshop">
                        <div class = "icon_catalog">
                            <i class = "fa fa-gears fa-4x"></i>
                        </div>
                        <div class = "text-center">
                            <p>Cài đặt Shop</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
</section>
<?php include'footer.php';?>