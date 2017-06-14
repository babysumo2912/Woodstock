<?php 
include'header.php';
 ?>
<section class = "center_bh">
    <div class ="title_bh text-center">
        <p>CHÀO MỪNG ĐẾN VỚI HỆ THỐNG QUẢN LÝ WOODSTOCK</p>
    </div>
    <div class = "text-center" style="margin: 100px 0">
        <div class = "row">
            <div class = "col-md-3 col-sm-4 col-xs-6">
                <div class = "catalog_bh">
                    <a href="<?php echo base_url()?>product">
                        <div class = "icon_catalog">
                            <i class = "fa fa-gift fa-4x"></i>
                        </div>
                        <div class = "text-center">
                            <p>Sản phẩm mới <sup>0</sup></p>
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
                            <p>Đơn bán <sup>0</sup></p>
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
                    <a href="#">
                        <div class = "icon_catalog">
                            <i class = "fa fa-money fa-4x"></i>
                        </div>
                        <div class = "text-center">
                            <p>Doanh Thu</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
</section>

<?php 
include'footer.php';
?>