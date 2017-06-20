<?php
include'header.php';
?>
<section class="ccc">
    <div class="max800 row">
        <?php
        $style = array();
        echo form_open('pay/add_new_address',$style);
        if(isset($err)){
        ?>
            <p style="color: red" class="text-center"><i class="fa fa-warning"></i><?php echo $err;?></p>
        <?php
        }
        ?>

        <div class="content_pay">
            <div class="title-pay">
                <p class="text-center">Địa Chỉ Nhận Hàng</p>
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
                            <select name="city" id="city" class="form-control" required>
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
                            <select name="district" id="district" class="form-control" required disabled="">
                                <option value="0">Chọn Quận / Huyện</option>
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
<script type="text/javascript">
        $(document).ready(function(){
           $('#city').on('change', function(){
                var id_city = $(this).val();
                if(id_city == 0)
                {
                    $('#district').prop('disabled', true);
                }
                else
                {
                    $('#district').prop('disabled', false);
                    $.ajax({
                        url:"<?php echo base_url() ?>pay/city",
                        type: "POST",
                        data: {'id_city' : id_city},
                        dataType: 'json',
                        success: function(data){
                           $('#district').html(data);
                        },
                        error: function(){
                            $('#district').prop('disabled', true);           
                        }
                    });
                }
           }); 
        });
    </script>
