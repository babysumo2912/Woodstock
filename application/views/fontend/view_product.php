<?php
if(isset($err)){
    echo $err;
    die();
}
if(isset($product)){
    foreach($product as $row){}
//    echo $row->img;
}
include 'header.php';
?>
<section class = "menu_catalog max">
<ul>
    <li><a href="<?php echo base_url()?>">Trang Chủ</a></li>
    <li><i class = "fa fa-angle-double-right"></i></li>
    <li><a href=""><?php if(isset($catalog)){echo $catalog;} ?></a></li>
    <li><i class = "fa fa-angle-double-right"></i></li>
    <li><a href="<?php echo base_url()?>product/view/<?php echo $row->id_product?>"><?php echo $row->name?></a></li>
</ul>
</section>
<section class = "ccc">
    <div class = "max row">
        <div class = "col-md-5">
            <img src="<?php echo base_url()?>public/img/product/<?php echo $row->img ?>" alt="<?php echo $row->name?>" width = "100%">
        </div>
        <div class = "col-md-7 white">
            <h2><?php echo $row->name?></h2>
            <div class = "content_buy">
                <p><b style = "color: red"><?php echo number_format($row->price)?><sup>đ</sup></b></p>
                <p><i class = "fa fa-thumbs-o-up"></i>&nbsp;<?php echo $row->like?></p>
                <p><i class = "fa fa-ravelry"></i>&nbsp;Mua hàng và tích 10 xu</p>
            </div>
            <div class = "content_buy">
                <p><i class = "fa fa-truck fa-lg"></i>&nbsp;<span>Miễn phí vận chuyển cho đơn hàng có giá trị từ 180.000 <sup>đ</sup>(giảm tối đa 50.000 <sup>đ</sup>)</span></p>
                <p><i class = "fa fa-handshake-o fa-lg"></i>&nbsp;<span>Đối tác vận chuyển</span></p>
                <ul>
                    <li><a href="http://giaohangnhanh.vn" target = "_blank">Giao hàng nhanh</a></li>
                    <li><a href="https://www.viettelpost.com.vn/" target = "_blank">Viettel Post</a></li>
                </ul>
            </div>
            <div class = "content_buy row">
                <div class = "col-md-6">
                    <div class = "col-xs-4">
                        <span>Số lượng</span>
                    </div>
                    <div class = "col-xs-8">
                        <input type="number" value="" class = "form-control">
                    </div>
                </div>
            </div>
            <div class = "content_buy buy row">
                <ul>
                    <li>
                        <a href="" class = "btn btn-info"><i class = "fa fa-comments-o"></i>&nbsp;Chat Ngay</a>
                    </li>
                    <li>
                        <a href="" class = "btn btn-success"><i class = "fa fa-shopping-cart"></i>&nbsp;Thêm vào giỏ hàng</a>
                    </li>
                    <li>
                        <a href="" class = "btn btn-danger"><i class = "fa fa-hand-o-right"></i>&nbsp;Mua ngay</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
<!--</section>-->
    <div class = "max row margin10">
        <div class = "seo">
            <b><a href=""><i class = "fa fa-superpowers fa-lg"></i>&nbsp;Woodstock đảm bảo</a></b>
            <span>Nhận hàng hoặc được hoàn lại tiền</span>
        </div>
    </div>
<!--<section class = "ccc">-->
    <div class = "max row margin10">
        <div class = "seo1 col-xs-12">
            <div class = "col-xs-4">
                <div class = "user">
                    <a href="#">
                        <div class = "avatar1" style = "background:url('<?php echo base_url()?>/public/img/user/avatar/<?php echo $img ?>') center; background-size: cover"></div>
                        <label>
                            <?php if(isset($seller)){
                                echo $seller;
                            }?>
                        </label><br>
                    </a>
                    <div class = "btn-folow">
                        <a href="" class = "btn btn-default">Xem Shop</a>
                        <a href="" class = "btn btn-default">Theo dõi</a>
                    </div>
                </div>
            </div>
            <div class = "col-xs-8">
                <div class = "col-md-4 menu_seller text-center">
                    <i class = "fa fa-gitlab"></i>&nbsp;<span><?php echo $number_product?></span><br>Sản Phẩm
                </div>
            </div>
        </div>
    </div>
<!--</section>-->
    <div class = "max row margin10">
        <div class = "seo">
            <div class = "title_discribe">
                <h3>CHI TIẾT SẢN PHẨM</h3>
            </div>
            <div class = "content_discribe">
                <?php echo $row->discribe?>
            </div>
        </div>
    </div>
    <div class = "max row margin10">
        <div class = "seo">
            <div class = "title_discribe">
                <h3>BÌNH LUẬN (0)</h3>
            </div>
            <div class = "content_discribe">
                <div class = "row">
                    <?php
                    if(isset($avatar)){
                        ?>
                        <div class = "avatar1 col-xs-3" style = "background:url('<?php echo base_url()?>/public/img/user/avatar/<?php echo $avatar ?>') center; background-size: cover"></div>
                        <div class = "col-xs-9">
                            <?php
                            $style = array(
                                'class' => 'form-group',
                            );
                            echo form_open('product/comment/'.$row->id_product,$style)
                            ?>
                            <input type="text" class = "form-control" name="comment">
                            <button type="submit" class = "btn btn-success" style = "margin-top:5px">
                                <i class = "fa fa-send-o"></i>
                                Gửi
                            </button>

                            <?php
                            echo form_close();
                            ?>
                        </div>
                        <?php
                    }else{
                        ?>
                        <a href="<?php echo base_url()?>home/login">Đăng nhập ngay</a> để có thể để lại bình luận của bạn
                        <?php
                    }
                    ?>
                </div>
                <?php
                if(isset($comment)){
                    foreach ($comment as $row) {
                        $account = $this->User_models->getinfo($row->id_user);
                        foreach ($account as $value) {
                            ?>
                            <br>
                            <div class="row">
                                <div class="avatar1 col-xs-3" style="background:url('<?php echo base_url() ?>/public/img/user/avatar/<?php echo $value->img ?>') center; background-size: cover"></div>
                                <div class="col-xs-9">
                                    <a href="#"><b><?php echo $value->name?></b></a>&nbsp;<span>(<?php echo $row->date?>)</span><br>
                                    <?php echo $row->content ?>
                                    <br>
                                    <i class = "fa fa-thumbs-o-up"></i>&nbsp;<?php echo $row->like?>
                                </div>
                            </div>
                            <?php
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
</section>
<?php
include 'footer.php';
?>