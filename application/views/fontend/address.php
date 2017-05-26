<?php
include 'header.php';
?>
<section class="ccc">
    <div class="max800 row">
        <p class="text-center">Chọn Địa Chỉ</p>
        <div class="content_pay">
            <div class="title-pay">
                <?php
                if(isset($address)){
                    foreach ($address as $row){
                        $account = $this->User_models->getinfo($row->id_user);
                        if($account){
                            foreach ($account as $key){};
                        }
                        ?>
                        <div class="row" style="padding: 10px 20px">
                            <input type="radio" name="address" value="<?php echo $row->id_infomation?>" style="float: right;">
                            <div style="float: left;">
                                <p style="font-size: 18px"><?php echo $key->name?></p>
                                <p><?php echo $row->phone?></p>
                                <p><?php echo $row->address?></p>
                                <p><?php echo $row->id_district?></p>
                                <p><?php echo $row->id_city?></p>
                            </div>
                        </div>
                        <?php
                    }
                }else{
                    ?>
                    <p>Vui lòng nhập chính xác địa chỉ để chúng tôi có thể chuyển hàng về cho bạn</p>
                    <?php
                }
                ?>
                <hr>
                <a href="<?php echo base_url()?>pay/add_address" class="display:block">
                    Thêm địa chỉ mới
                    <i style="float: right" class="fa fa-plus"></i>
                </a>
            </div>
        </div>
    </div>
</section>
<?php
include 'footer.php';
?>
