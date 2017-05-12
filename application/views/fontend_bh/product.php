<?php 
include 'header.php';
?>
<section>
   <div class = "menu_product">
        <ul>
            <!--<li><a href="">Shop của tôi</a></li>-->
            <li><a href="">Tất cả</a></li>
            <li><a href="">Còn hàng</a></li>
            <li><a href="">Hết hàng <sup>0</sup></a></li>
            <li><a href="">Đã bị khóa <sup>0</sup></a></li>
        </ul>
   </div>
   <div class = "max">
        <div class = "hd_bh">
            <div class = "left">
                <span>0 Sản phẩm</span>
            </div>
            <div class = "right">
                <a href="<?php echo base_url()?>product/add_by_excel" class = "btn btn-success"><i class = "fa fa-file-excel-o"></i>&nbsp;Thêm mới bằng file excel</a>
            </div>
        </div>
        <div class = "center">
            <div class = "col-md-2 col-sm-3 col-xs-6">
                <a href="<?php echo base_url()?>product/add_product">
                    <div class = "add_product_bh">
                        <div class = "bansp">
                            <i class = "fa fa-plus fa-lg"></i><br>
                            Thêm Sản Phẩm Mới
                        </div>
                    </div>
                </a>
            </div>
            <?php
            if(isset($product)){
                foreach($product as $row){
            ?>
            <div class = "col-md-2 col-sm-3 col-xs-6">
                <div class = " product_bh">
                    <div class = "img-product" style = "background:url('<?php echo base_url()?>public/img/product/<?php echo $row->img?>') center; background-size: cover">
                        <?php if($row->active == 1){
                        ?>
                            <div class = "bansp">
                            <i class = "fa fa-ban fa-5x"></i>
                        </div>
                        <?php
                        }?>
                    </div>
                    <div class = "content-product">
                        <div class = "name-product">
                            <b><?php echo $row->name?></b>
                        </div>
                        <div class = "cost_pro">
                            <p><?php echo number_format($row->price)?><sup>đ</sup></p>
                            <span><?php echo $row->number?><sup>sp</sup></span>
                        </div>
                        <div class = "review">
                            <i class = "fa fa-comments-o"><sup>0</sup></i>
                            <i class = "fa fa-heart"><sup>0</sup></i>
                        </div>
                        <div class = "active_pro">
                            <a href="<?php echo base_url()?>product/update_product/<?php echo $row->id_product?>" class = "btn btn-info left"><i class = "fa fa-pencil" title = "Sửa sản phẩm"></i></a>
                            <a href="#" class = "btn btn-danger right"><i class = "fa fa-remove" title = "Xóa Sản Phẩm"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                }
            }
            ?>
        </div>
   </div>
</section>

<?php 
include 'footer.php';
?>