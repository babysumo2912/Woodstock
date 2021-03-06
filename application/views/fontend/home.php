<?php 
$admin = $this->session->userdata('admin');
?>
<?php include "header.php" ?>
<?php if(isset($err)){?>
<section class="max-row">
    <p class="text-center" style="color: red">
        <i class="fa fa-warning"></i>
        <?php echo $err;?>
    </p>
</section>
<?php } ?>
<section class = "max row">
    <div class = "col-md-3 col-sm-12 col-xs-12">
        <div class = "menu">
            <div class = "menu-title">
                <a href="#">Tất cả Danh mục <i class = "fa fa-bars"></i></a>
            </div>
            <ul>
            <?php 
            if(isset($catalog)){
                foreach ($catalog as $key) {
            ?>
                <li>
                    <a href="<?php echo base_url()?>home/catalog/<?php echo $key->id_catalog?>"><?php echo $key->name?></a>
                </li>
            <?php
                }
            }
            ?>
            </ul>
        </div>
    </div>
    <div class = "col-md-9 col-sm-12 col-xs-12">
        <div class="slide">
            <div id="slideshow" class="cycle-slideshow"
            data-cycle-slides="> a"
            data-cycle-speed = "600"
            data-cycle-timeout = "1500"
            data-cycle-next = "#next"
            data-cycle-prev = "#prev">
                <a href="#">
                    <img src="<?php echo base_url(); ?>public/img/style/slide1.png" alt="iphone">
                </a>
                <a href="#">
                    <img src="<?php echo base_url(); ?>public/img/style/slide2.png" alt="tainghe">
                </a>
                <a href="#">
                    <img src="<?php echo base_url(); ?>public/img/style/slide3.png" alt="smartwatch">
                </a>
            </div>
            <img id="prev" src="<?php echo base_url(); ?>public/img/style/prev.png" alt="prev">
            <img id="next" src="<?php echo base_url(); ?>public/img/style/next.png" alt="next">
        </div>
        <div class = "banner">
            <img src="<?php echo base_url(); ?>public/img/style/banner1.jpg" alt="fashion">
            <img src="<?php echo base_url(); ?>public/img/style/banner2.jpg" alt="fashion2">
        </div>
    </div>
</section>
<section class = "max">
    <div class = "center">
        <div class = "title">
            <p><?php 
            if(isset($search)){
                echo 'Từ khóa: "'.$search.'"';
            }else{
                if(isset($catalog_info)){
                    echo $catalog_info;  
                }else echo "Gợi ý hôm nay";
            }
            ?></p>
            <a href="<?php echo base_url() ?>">Xem tất cả <i class = "fa fa-angle-double-right"></i></a>
        </div>
        <!--product-->
        <?php if(isset($product)){
            foreach($product as $row){
        ?>
        <div class = "col-md-2 col-sm-3 col-xs-6">
            <div class = " product">
                <a href="<?php echo base_url()?>product/view/<?php echo $row->id_product?>" title = "<?php echo $row->name?>">
                    <div class = "img-product" style = "background:url('<?php echo base_url()?>public/img/product/<?php echo $row->img ?>') center; background-size: cover">
                    </div>
                    <div class = "content-product">
                        <div class = "name-product">

                                <h4><?php echo $row->name?></h4>

                        </div>
                        <div class = "cost-product">
                            <span><?php echo number_format($row->price)?><sup>đ</sup></span>
                        </div>
                        <div class = "info-product">
                            <i class = "fa fa-heart-o"> &nbsp;<?php echo number_format($row->like)?></i>
                        </div>
                        <div class = "star">
                            <div class="rateit" data-rateit-value="5"  data-rateit-readonly="true"></div>
                            <span>(325)</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <?php 
            }
        }else{
        ?>
        <div class="text-center" style="margin-top: 70px">
            <img src="<?php echo base_url() ?>public/img/style/noproduct.png">
            <p style="font-size: 18px;margin-top:10px">Rất tiếc, chúng tôi không tìm thấy sản phẩm bạn yêu cầu!</p>
        </div>
        <?php
        }
        ?>
        <!--end product-->
        
        <div class = " col-md-12 col-xs-12 col-sm-12 text-center">
            <div class = "readmore">
                <a href="#" class = "btn btn-default">Xem Thêm</a>
            </div>
        </div>
</section>
<?php include "footer.php" ?>