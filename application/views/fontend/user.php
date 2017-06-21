<?php include'header.php'; ?>
<?php
if(isset($account)){
    foreach($account as $acc){}
}

?>
<section class="ccc">
    <div class="max row">
        <div class="col-md-3">
            <div>
                <div style = "height: 300px;background:url('<?php echo base_url()?>public/img/user/avatar/<?php echo $acc->img?>') center; background-size: cover"></div>
            </div>
            <div class="account">
                <ul>
                    <li>
                        <a href="<?php echo base_url() ?>infomation/buyer"><?php echo $acc->name ?></a>
                    </li>
                    <li>
                        <a href="">Thông báo <sup class="badge">0</sup></a>
                    </li>
                    <li>
                        <a href="">Tin nhắn <sup class="badge">0</sup></a>
                    </li>
                    <li>
                        <a href="">Cài đặt <sup>0</sup></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-9 content_pay">
            <div class = "qc2">
                <ul>
                    <li>
                        <a href="<?php echo base_url()?>infomation/buyer/active/0">
                            <i class = "fa fa-question"></i>&nbsp;&nbsp;
                            Chờ xác nhận
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url()?>infomation/buyer/active/1">
                        <i class = "fa fa-check"></i> &nbsp;&nbsp;Chờ lấy hàng
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url()?>infomation/buyer/active/2">
                        <i class = "fa fa-truck"></i>&nbsp;&nbsp;Đang giao
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url()?>infomation/buyer/active/3">
                        <i class = "fa fa-thumbs-o-up"></i>&nbsp;&nbsp;Đã giao</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url()?>infomation/buyer/active/4">
                        <i class = "fa fa-warning"></i>&nbsp;&nbsp;Đã hủy</a>
                    </li>
                </ul>
            </div>
            <hr>
            <div class = "buyer_cart">
                <?php
                if(isset($invoice)){
                    if(isset($active)){
                        switch ($active){
                            case 0:
                                $title = "Đơn hàng chờ xác nhận"; break;
                            case 1:
                                $title = "Đơn hàng chờ đến lấy";break;
                            case 2:
                                $title = "Đơn hàng đang giao";break;
                            case 3:
                                $title = "Đơn hàng đã giao";break;
                            case 4:
                                $title = "Đơn hàng đã hủy";break;
                        }
                    }else $title = "Đơn hàng chờ xác nhận";
                ?>
                <h3 class="text-center"><?php echo $title;?></h3>
                <?php
                foreach($invoice as $hd){
                ?>
                    <div style="border: 1px #ccc solid;padding: 5px">
                        <p>
                            <i class="fa fa-calendar"></i>&nbsp;<?php echo substr($hd->date,0,10)?><br>
                            <i class="fa fa-clock-o"></i>&nbsp;<?php echo substr($hd->date,11,8)?>
                        </p>
                        <p>
                            <b>Mã vận đơn: </b><?php echo $hd->shipping_code;?>
                        </p>
                        <table class="table table-hover">
                            <tr>
                                <td>STT</td>
                                <td>Sản phẩm</td>
                                <td>Shop</td>
                                <td>Số lượng</td>
                                <td>Đơn giá</td>
                                <td></td>
                                <td></td>
                            </tr>
                    <?php
                        $invoice_detail = $this->Invoice_models->get_invoice_detail($hd->id_invoice);
                        if($invoice_detail){
                            $i = 1;
                            $money = 0;
                            foreach($invoice_detail as $hd_ct){
                    ?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td>
                                <div class="row" style="padding: 5px">
                                    <div class="avatar1" style="background:url('<?php echo base_url() ?>/public/img/product/<?php echo $hd_ct->img ?>') center; background-size: cover;margin:0; padding: 0"></div>
                                    &nbsp;<a href="#"><?php echo $hd_ct->name?></a>
                                </div>
                            </td>
                            <td>
                                <?php
                                $account = $this->User_models->getinfo($hd_ct->id_user);
                                foreach ($account as $value1) {
                                    ?>
                                    <div class="row" style="">
                                        <div class="avatar" style="background:url('<?php echo base_url() ?>/public/img/user/avatar/<?php echo $value1->img ?>') center; background-size: cover;margin:0; padding: 0"></div>
                                        &nbsp;<a href="<?php echo base_url() ?>shop/view/<?php echo $hd_ct->id_user ?>"><b><?php echo $value1->name?></b></a>
                                    </div>
                                    <?php
                                }
                                ?>
                            </td>
                            <td>
                                <?php echo $hd_ct->qty?>
                            </td>
                            <td>
                                <?php echo number_format($hd_ct->price)?>
                            </td>
                            <td>
                                <?php 
                                switch ($hd_ct->active) {
                                    case '0':
                                        ?>
                                        <i class="fa fa-question"></i>
                                        <?php
                                        break;
                                    case '1':
                                        ?>
                                        <i class="fa fa-check"></i>
                                        <?php
                                        break;
                                    case '2':
                                        ?>
                                        <i class="fa fa-truck"></i>
                                        <?php
                                        break;
                                    case '3':
                                        ?>
                                        <i class="fa fa-thumbs-o-up"></i>
                                        <?php
                                        break;
                                    case '4':
                                        ?>
                                        <i class="fa fa-warning"></i>
                                        <?php
                                        break;
                                    
                                    default:
                                        # code...
                                        break;
                                }

                                 ?>
                            </td>
                            <td>
                                <?php 
                                if($hd_ct->active == 0){
                                ?>
                                <a href="<?php echo base_url()?>infomation/buyer/remove_invoice/<?php echo $hd_ct->id_detail ?>"onclick="return confirm('Một thông báo sẽ gửi đến chủ shop. Bạn có chắc chắn muốn hủy đơn hàng không? ')"><i class="fa fa-remove"></i></a>
                                <?php
                                }

                                 ?>
                            </td>
                        </tr>
                    <?php
                                $i++;
                                $money+=$hd_ct->subtotal;
                            }
                        }
                    ?>
                            <tr>
                                <td colspan="4" class="text-right">Tổng thanh toán</td>
                                <td><p style="color:red"><?php echo number_format($money)?></p></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                    <hr"><br><br>
                <?php
                }
                ?>
                <?php }else{
                    ?>
                    <div class="text-center" style="margin: 100px 0;">
                        <img src="<?php echo base_url()?>public/img/style/nocart.png" alt="woodstock"><br><br>
                        <p>Chưa có đơn hàng !</p>
                    </div>
                    <?php
                }?>
            </div>
        </div>
    </div>
</section>

<?php include'footer.php';
