<?php
include'header.php';
?>
<div class = "menu_product">
    <ul>
        <!--<li><a href="">Shop của tôi</a></li>-->
        <li><a href="<?php echo base_url()?>sale/invoice">Tất cả</a></li>
        <li>
            <a href="<?php echo base_url()?>sale/invoice/active/0">
                Chờ xác nhận
                <?php
                if(isset($number_invoice)){
                    $number = $number_invoice;
                }else $number = 0;

                ?>
                <sup class="badge"><?php echo $number?></sup>
            </a>
        </li>
        <li><a href="<?php echo base_url()?>sale/invoice/active/1">Chờ lấy hàng</a></li>
        <li><a href="<?php echo base_url()?>sale/invoice/active/2">Đang giao</a></li>
        <li><a href="<?php echo base_url()?>sale/invoice/active/3">Hoàn thành</a></li>
        <li><a href="<?php echo base_url()?>sale/invoice/active/4">Đã hủy</a></li>
        <li><a href="<?php echo base_url()?>sale/invoice/active/5">Hoàn hàng</a></li>
    </ul>
</div>
<section class="max row">
    <form class="navbar-form navbar-left">
        <div class="input-group" style="border: 1px #ccc solid; border-radius: 5px;padding:5px;">
            <input type="text" placeholder="Tìm kiếm mã vận đơn ..." required style="border: none; background: inherit">
            <button type=submit style="background: inherit;border:none;">
                <i class="fa fa-search"></i>
            </button>
        </div>
    </form>
</section>
<section class="max row">
    <div class="text-center">
        <h3>
        <?php
        if(isset($active)){
            switch($active){
                case"0":
                    echo "Đơn hàng chờ xác nhận!";
                    break;
                case"1":
                    echo "Đơn hàng chờ lấy hàng";
                    break;
                case"2":
                    echo "Đơn hàng đang giao";
                    break;
                case"3":
                    echo "Đơn hàng đã hoàn thành";
                    break;
                case"4":
                    echo "Đơn hàng bị hủy";
                    break;
                case"5":
                    echo "Đơn hàng hoàn về";
                    break;
                default:
                    echo "Tất cả đơn hàng";
            }
        }else{
        ?>
        Tất cả đơn hàng
        <?php } ?>
        </h3>
    </div>
    <?php
    if(isset($detail_invoice)){
        if(isset($active)){
            $num_acive = $active;
        }else $active = "all";
        $check = false;
        foreach($detail_invoice as $cthd){
            $invoice = $this->Invoice_models->get_invoice_sale($cthd->id_invoice,$active);
            if($invoice){
                $check = true;
//                var_dump($invoice);die();
                foreach ($invoice as $hd){}
    ?>
    <div style="border: 1px #ccc solid; box-shadow: 5px 5px 15px #ccc; padding: 10px">
    <table class="table table-hover">
        <p>Mã vận đơn: <b><?php echo $hd->shipping_code?></b></p>
        <p>Tình trạng đơn hàng:
            <b>
                <?php
                switch ($hd->active){
                    case "0":
                        echo "Chờ xác nhận";
                        break;
                    case "1":
                        echo "Chờ lấy hàng";
                        break;
                    case "2":
                        echo "Đang giao hàng";
                        break;
                    case "3":
                        echo "Đã hoàn thành";
                        break;
                    case "4":
                        echo "Đã hủy";
                        break;
                    default:
                        echo "Chờ xác nhận";
                }
                ?>
            </b>
        </p>
        <tr>
            <td>STT</td>
            <td>Sản phẩm</td>
            <td>Số lượng</td>
            <td>Người mua</td>
            <td>Đơn vị vận chuyển</td>
            <td>Thành tiền</td>
            <td></td>
        </tr>
        <?php
                $id_user = $this->session->userdata('session_user');
                $detail_invoice = $this->Invoice_models->get_invoice($hd->id_invoice,$id_user);
                if($detail_invoice){
                    $i = 1;
                    $money = 0;
                    foreach ($detail_invoice as $cthd){
                        $money+=$cthd->subtotal;
        ?>
        <tr>
            <td><?php echo $i;?></td>
            <td>
                <?php echo $cthd->name?>
            </td>
            <td>
                <?php echo $cthd->qty?>
            </td>
            <td>
                <?php
                $account = $this->User_models->getinfo($hd->id_user);
                foreach ($account as $value1) {}
                    ?>
                    <div class="row" style="">
                        <div class="avatar" style="background:url('<?php echo base_url() ?>/public/img/user/avatar/<?php echo $value1->img ?>') center; background-size: cover;margin:0; padding: 0"></div>
                        &nbsp;<a href="#"><?php echo $value1->name?></a>
                    </div>
            </td>
            <td>
                <?php echo $hd->tranformer?>
            </td>
            <td>
                <?php echo number_format($cthd->subtotal)?>
            </td>
        </tr>
        <?php
                        $i++;
                    }
                }
        ?>
        <tr>
            <td colspan="5">
                <p class="text-right">Tổng thanh toán:</p>
            </td>
            <td>
                    <b>
                        <?php echo number_format($money)?>
                    </b>
            </td>
        </tr>
    </table>
    </div>
    <br>
    <?php
            }
        }
    ?>
    <?php
    if($check == false){
    ?>
    <div class="text-center" style="margin: 100px 0;">
        <img src="<?php echo base_url()?>public/img/style/nocart.png" alt="woodstock"><br><br>
        <p>Chưa có đơn hàng !</p>
    </div>
    <?php
    }
    ?>
    <?php
    }else{
        ?>
        <div class="text-center" style="margin: 100px 0;">
            <img src="<?php echo base_url()?>public/img/style/nocart.png" alt="woodstock"><br><br>
            <p>Chưa có đơn hàng !</p>
        </div>
    <?php
    }
    ?>
</section>


<?php
include'footer.php';
?>
