<?php
include 'header.php';
?>
<section class="ccc">
    <div class="max800 row">
        <div class="content_pay">
            <div class="title-pay">
                <br>
                <p>Tài khoản của bạn:
                    <b><?php if(isset($user)){
                        echo $user;
                        } ?>
                    </b>
                </p>
                <hr>
                <p>123@gmail.com</p>
                <p>
                    Thông báo đơn hàng sẽ được gửi đến gmail này!
                </p>
            </div>
        </div>
        <div class="content_pay">
            <div class="row">
                <div class="col-md-12">
                    <p style="float: left;">Địa chỉ nhận hàng</p>
                    <span style="float: right">
                        <a href="">Click để thay đổi</a>
                    </span>
                </div>
            </div>
            <hr>
            <p>Đức</p>
            <p>số 38C, ngõ 487 cổ nhuế, từ liêm, hà nội</p>
            <p>Quận Bắc Từ Liêm</p>
            <p>TP hà nội</p>
        </div>
        <div class="content_pay">
            <div class="title-pay">
                <p class="text-center">Sản phẫm đã đặt</p>
<!--                <hr>-->
            </div>
            <table class="table table-hover">
                <?php
                $money = 0;
                if(isset($cart)){
                    foreach ($cart as $row){
                        $money += $row['subtotal'];
                ?>
                <tr>
                    <td>
                        <?php
                        $account = $this->Product_models->getinfo($row['id']);
                        foreach ($account as $value) {?>
                        <div class="avatar1" style="background:url('<?php echo base_url() ?>/public/img/product/<?php echo $value->img ?>') center; background-size: cover;margin:0; padding: 0"></div>
                        &nbsp;<a href="#"><?php echo $value->name?></a><br>
                        <p style="color: red;"> &nbsp;<?php echo number_format($row['price'])?><sup>đ</sup></p>
                        <span style="float: right;"><sub>x&nbsp;<?php echo $row['qty']?></sub></span>
                        <?php }?>
                    </td>
                </tr>
                <?php
                    }
                }
                ?>
                <tr>
                    <td>
                        <p style="float: right;">
                            Tổng cộng:&nbsp;<b><?php echo number_format($money);?></b><sup>đ</sup>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" placeholder="Để lại lưu ý..." style="border: none; background: inherit;width: 100%">
                    </td>
                </tr>
            </table>
            <div class="text-center">
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-github-alt"></i>
                    Đặt hàng
                </button>
            </div>
        </div>
    </div>
</section>
<?php
include 'footer.php'
?>
