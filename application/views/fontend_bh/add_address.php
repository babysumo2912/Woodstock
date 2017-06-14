<?php
include'header.php';
?>
<section class="ccc">
    <div class="max800 row">
        <?php
        $style = array();
        echo form_open('myshop/add_new_address',$style);
        if(isset($err)){
        ?>
            <p style="color: red" class="text-center"><i class="fa fa-warning"></i><?php echo $err;?></p>
        <?php
        }
        ?>

        <div class="content_pay">
            <div class="title-pay">
                <p class="text-center">Địa chỉ Shop</p>
                <table class="table table-hover add_address">
                    <tr>
                        <td>Tên</td>
                        <td><input name="name" type="text" placeholder="Điền tên..." required></td>
                    </tr>
                    <tr>
                        <td>Số điện thoại</td>
                        <td><input name="phone" type="tel" pattern="([0]{1})([0-9]{9,})" placeholder="Điền số điện thoại..." required></td>
                    </tr>
                    <tr>
                        <td>Tỉnh / Thành Phố</td>
                        <td>
                            <select name="city" id="" class="form-control" required>
                                <option value="0">Chọn Tỉnh / Thành Phố</option>
                                <?php
                                if(isset($city)){
                                    foreach ($city as $tp){
                                 ?>
                                <option value="<?php echo $tp->id_city?>"><?php echo $tp->city?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Quận / Huyện</td>
                        <td>
                            <select name="district" id="" class="form-control" required>
                                <option value="0">Chọn Quận / Huyện</option>
                                <?php
                                if(isset($district)){
                                    foreach ($district as $dtr){
                                        ?>
                                        <option value="<?php echo $dtr->id_district?>"><?php echo $dtr->district?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">Địa chỉ cụ thể</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <textarea name="address" id="" cols="5" placeholder="Số nhà/ Tên nhà/ Tên đường/ Tên khu vực" required></textarea>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-check"></i>
                    Hoàn Thành
                </button>
            </div>
        </div>
        <?php echo form_close()?>
    </div>
</section>
<?php
include 'footer.php';
?>
