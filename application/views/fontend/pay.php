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
                        <a href="<?php echo base_url()?>pay/address">
                            <?php
                            if(isset($address)){
                                echo "Clich để thay đổi";
                            }else
                            {
                                echo "Vui lòng nhập địa chỉ";
                            }
                            ?>
                        </a>
                    </span>
                </div>
            </div>
            <hr>
            <?php
            if(isset($address)){
                foreach ($address as $row){
                $account = $this->User_models->getinfo($row->id_user);
                if($account){
                    foreach ($account as $key){};
                }
            ?>
                <p style="font-size: 18px"><?php echo $key->name?></p>
                <p><?php echo $row->phone?></p>
                <p><?php echo $row->id_district?></p>
                <p><?php echo $row->id_city?></p>
            <?php
                }
            }else{
            ?>
                <p>Vui lòng nhập chính xác địa chỉ để chúng tôi có thể chuyển hàng về cho bạn</p>
            <?php
            }
            ?>
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
            <?php
            if(isset($address) && isset($cart)) {
                ?>
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-github-alt"></i>
                    Đặt hàng
                </button>
                <?php
            }else{
            ?>
                <button type="button" class="btn btn-default">
                    <i class="fa fa-ban"></i>
                    Đặt hàng
                </button>
            <?php
            }
            ?>
            </div>
        </div>
    </div>
</section>
<?php
include 'footer.php'
?>
