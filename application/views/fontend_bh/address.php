<?php
include 'header.php';
?>
<section class="ccc">
    <div class="max800 row">
        <p class="text-center">Chọn Địa Chỉ</p>
        <?php
        $style = array(
            'class'=>'form-group'
        );
        echo form_open('myshop/select_address');
        ?>
        <div class="content_pay">
            <div class="title-pay">
                <?php
                if(isset($address)){
                    foreach ($address as $row){
                        $district = $this->Home_models->getinfo('tb_district','id_district',$row->id_district);
                        $city = $this->Home_models->getinfo('tb_city','id_city',$row->id_city);
                        if($district){
                            foreach ($district as $dtr){};
                        }
                        if($city){
                            foreach ($city as $tp){};
                        }
                        ?>
                        <div class="row" style="padding: 10px 20px">
                            <input type="radio" name="address" value="<?php echo $row->id_infomation?>" style="float: right;"
                            <?php
                            if($row->default == "1"){
                                echo "checked";
                            }else echo "";
                            ?>
                            >
                            <div style="float: left;">
                                <p style="font-size: 18px"><?php echo $row->name?></p>
                                <p><?php echo $row->phone?></p>
                                <p><?php echo $row->address ?></p>
                                <p><?php echo $dtr->district?></p>
                                <p><?php echo $tp->city?></p>
                            </div>
                        </div>
                        <hr>
                        <?php
                    }
                }else{
                    ?>
                    <p>Vui lòng nhập chính xác địa chỉ để chúng tôi có thể chuyển hàng về cho bạn</p>
                    <hr>
                    <?php
                }
                ?>
                <?php
                if(isset($max_num)){
                    if($max_num<5){
                ?>
                    <a href="<?php echo base_url()?>myshop/add_address" class="display:block">
                        Thêm địa chỉ mới&nbsp;
                        <i class="fa fa-pencil"></i>
                    </a>
                <?php
                    }else{
                     ?>
                     Bạn đã có đủ 5 địa chỉ gửi hàng, hãy chọn 1 địa chỉ để chúng tôi có thể gửi hàng nhanh chóng đến cho bạn
                     <?php   
                    }
                }else{
                ?>
                    <a href="<?php echo base_url()?>myshop/add_address" class="display:block">
                        Thêm địa chỉ mới&nbsp;
                        <i class="fa fa-pencil"></i>
                    </a>
                <?php
                }
                ?>
            </div>
            <hr>
            <div class="text-center">
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-check"></i>
                    &nbsp;Hoàn thành
                </button>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</section>
<?php
include 'footer.php';
?>
