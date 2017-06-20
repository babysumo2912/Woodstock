<?php 
include 'header.php';
?> 
<section>
   <div class = "menu_product">
        <ul>
            <!--<li><a href="">Shop của tôi</a></li>-->
            <li><a href="<?php echo base_url()?>/product"><?php if($active == 'all'){ ?><b><u>Tất cả</u></b> <?php }else{ ?>Tất cả<?php } ?></a></li>
            <li><a href="<?php echo base_url()?>/product/active/0"><?php if($active == '0'){ ?><b><u>Chờ xác nhận</u></b> <?php }else{ ?>Chờ xác nhận<?php } ?></a></li>
            <li><a href="<?php echo base_url()?>/product/number"><?php if($active == 'number'){ ?><b><u>Hết hàng</u></b> <?php }else{ ?>Hết hàng<?php } ?> <sup><?php echo $number_hh ?></sup></a></li>
            <li><a href="<?php echo base_url()?>/product/active/2"><?php if($active == '2'){ ?><b><u>Đã bị khóa</u></b> <?php }else{ ?>Đã bị khóa<?php } ?> <sup><?php echo $number_ban ?></sup></a></li>
        </ul>
   </div>
   <div class = "max">
        <div class = "hd_bh">
            <div class = "left">
                <span><?php echo $number ?> Sản phẩm</span>
            </div>
            <div class = "right">
                <form class="navbar-form navbar-left">
                    <div class="input-group" style="border: 1px #ccc solid; border-radius: 5px;padding:5px;">
                        <input type="text" placeholder="Tìm kiếm tên sản phẩm ..." required style="border: none; background: inherit">
                        <button type=submit style="background: inherit;border:none;">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <?php 
        if(isset($succ)){
            ?>
            <div class="row">
                <div class="text-center">
                    <?php echo $succ; ?>
                </div>
            </div>
            <?php
        }

         ?>
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
                        <?php if($row->active == 2){
                        ?>
                            <div class = "bansp">
                            <i class = "fa fa-ban fa-5x"></i>
                        </div>
                        <?php
                        }?>

                        <?php 
                        if($row->active == 0):
                         ?>
                            <div style="background: url('<?php echo base_url() ?>/public/img/style/bg1.png');padding: 10px;color:white">
                                <p><b>Chờ xác nhận</b></p>
                            </div>

                        <?php endif; ?>
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
                            <a href="<?php echo base_url() ?>product/delete/<?php echo $row->id_product ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm <?php echo $row->name ?> ra khỏi shop của bạn không ?')" class = "btn btn-danger right"><i class = "fa fa-remove" title = "Xóa Sản Phẩm"></i></a>
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
<!-- <div class="modal fade bd-example-modal-lg" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      </div>
    </div>  
</div> -->
<?php 
include 'footer.php';
?>