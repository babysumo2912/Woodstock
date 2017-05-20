<?php
include 'header.php';
?>
<section class="max row margin10">
<?php
if(isset($cart)){
    if(isset ($money) && $money > 0){

?>
    <div class="seo">
        <h3>Giỏ hàng của bạn</h3>
        <table class="table table-hover">
            <tr>
                <td>Sản phẩm</td>
                <td>Shop</td>
                <td>Đơn giá</td>
                <td>Số lượng</td>
                <td>Thành tiền</td>
                <td><a href="<?php echo base_url()?>cart/delete_all" title="Xóa tất cả"><i class="fa fa-trash"></i></a></td>
            </tr>
            <?php
            echo form_open('cart/update');
            foreach($cart as $row){
                echo form_hidden('cart[' . $row['id'] . '][id]', $row['id']);
                echo form_hidden('cart[' . $row['id'] . '][rowid]', $row['rowid']);
                echo form_hidden('cart[' . $row['id'] . '][name]', $row['name']);
                echo form_hidden('cart[' . $row['id'] . '][price]', $row['price']);
                echo form_hidden('cart[' . $row['id'] . '][qty]', $row['qty']);
            ?>
            <tr>
                <td>
                    <?php
                    $account = $this->Product_models->getinfo($row['id']);
                    foreach ($account as $value) {
                        ?>
                        <div class="row" style="">
                            <div class="avatar1" style="background:url('<?php echo base_url() ?>/public/img/product/<?php echo $value->img ?>') center; background-size: cover;margin:0; padding: 0"></div>
                            &nbsp;<a href="#"><b><?php echo $value->name?></b></a>
                        </div>
                        <?php
                    }
                    ?>
<!--                    <a href="">--><?php //echo $row['name']?><!--</a>-->
                </td>
                <td>
                    <?php
                    $account = $this->User_models->getinfo($row['id_user']);
                    foreach ($account as $value) {
                        ?>
                        <div class="row" style="">
                            <div class="avatar" style="background:url('<?php echo base_url() ?>/public/img/user/avatar/<?php echo $value->img ?>') center; background-size: cover;margin:0; padding: 0"></div>
                            &nbsp;<a href="#"><b><?php echo $value->name?></b></a>
                        </div>
                        <?php
                    }
                    ?>
                </td>
                <td style="color:red">
                    <?php echo number_format($row['price']) ?><sup>đ</sup>
                </td>
                <td style="width: 140px">
                    <?php
                    $data = array(
                        'type' => 'number',
                        'class' => 'form-control number',
                        'min' => '0',
                        'max' => $row['max'],
                        'name' => 'cart[' . $row['id'] . '][qty]',
                        'value' => $row['qty'],
                    );
                    echo form_input($data);
                    ?>
                </td>
                <td style="color:#00bcd4">
                    <?php echo number_format($row['subtotal']) ?><sup>đ</sup>
                </td>
                <td>
                    <a href="<?php echo base_url()?>cart/delete/<?php echo $row['rowid']?>" title="Xóa sản phẩm"><i class="fa fa-remove"></i></a>
                </td>
            </tr>
            <?php
            }
            ?>
        </table>

        <div class="text-right">
            Hóa đơn thanh toán:
            <b>
            <?php
            if(isset($money)){
                echo number_format($money);
            }
            ?>
                <sup>đ</sup>
            </b>
        </div>
        <br>
        <div class="text-right">
            <button type="submit" class="btn btn-danger">
                <i class="fa fa-save"></i>&nbsp;Cập nhập
            </button>
            <?php echo form_close();?>
<!--            <a href="--><?php //echo base_url()?><!--cart/update/" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;Cập nhập</a>-->
            <a href="<?php echo base_url()?>pay" class="btn btn-success"><i class="fa fa-credit-card"></i>&nbsp;Thanh toán</a>
        </div>
    </div>
        <?php
    }else{
?>
        <div class="text-center" style="margin: 50px 0">
            <i class="fa fa-frown-o fa-5x"></i>
            <br>
            <?php
            if(isset($err)){
                echo $err;
            }else{
            ?>
            Giỏ hàng của bạn đang trống
            <?php }?>
            <br>
            <a href="<?php echo base_url()?>"><i class="fa fa-angle-double-left"></i> &nbsp;Quay lại mua hàng</a>
        </div>
<?php
    }
}
?>
</section>
<?php
include 'footer.php'
?>