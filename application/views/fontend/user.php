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
        </div>
        <div class="col-md-9 content_pay">
            <div class = "qc2">
                <ul>
                    <li>
                        <a href="">
                            <i class = "fa fa-lock"></i>&nbsp;&nbsp;
                            <u>Chờ xác nhận</u>
                        </a>
                    </li>
                    <li>

                        <a href=""><i class = "fa fa-bullhorn"></i> &nbsp;&nbsp;Chờ lấy hàng</a>
                    </li>
                    <li>
                        <a href=""><i class = "fa fa-truck"></i>&nbsp;&nbsp;Đang giao</a>
                    </li>
                    <li>

                        <a href=""><i class = "fa fa-lock"></i>&nbsp;&nbsp;Đã giao</a>
                    </li>
                    <li>

                        <a href=""><i class = "fa fa-lock"></i>&nbsp;&nbsp;Đã hủy</a>
                    </li>
                </ul>
            </div>
            <hr>
            <div class = "buyer_cart">
                <?php
                if(isset($cart)){
                ?>
                <h3>Đơn hàng chờ xác nhận</h3>
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
                        // echo form_hidden('cart[' . $row['id'] . '][name]', $row['name']);
                        echo form_hidden('cart[' . $row['id'] . '][price]', $row['price']);
                        echo form_hidden('cart[' . $row['id'] . '][qty]', $row['qty']);
                        ?>
                        <tr>
                            <td>
                                <?php
                                $account = $this->Product_models->getinfo($row['id']);
                                foreach ($account as $value) {
                                    ?>
                                    <div class="row" style="padding: 5px">
                                        <div class="avatar1" style="background:url('<?php echo base_url() ?>/public/img/product/<?php echo $value->img ?>') center; background-size: cover;margin:0; padding: 0"></div>
                                        &nbsp;<a href="#"><?php echo $value->name?></a>
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
