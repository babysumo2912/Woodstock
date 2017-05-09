<?php 
include 'header.php';
?>
<section class = "max border row">
    <p class = "title_add_pro">Chỉnh sửa hình ảnh sản phẩm</p>
    <div class = "img_pro">
        <div class = "col-md-2 col-sm-3 col-xs-6">
            <a href="<?php echo base_url()?>product/add_product">
                <div class = "add_img_pro">
                    <div class = "bansp">
                        <i class = "fa fa-plus fa-lg"></i><br>
                        Thêm hình ảnh sản phẩm
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class = "add_content">
        <p class = "title_add_pro">Chi Tiết Sản Phẩm</p>
        <div class = "form_add_pro">
            <?php
            $style = array(
                'class' => 'form-group col-md-6 ',
            );
            echo form_open('product/add_product',$style)
            ?>
            <div class = "form-group">
                <label for=""><i class = "fa fa-align-left"></i>&nbsp;Tên sản phẩm</label>
                <input type="text" name="name" value="" class = "form-control">
            </div>
            <div class = "form-group">
                <label for=""><i class = "fa fa-pencil"></i>&nbsp;Mô tả</label>
                <textarea rows="10" cols="" class = "form-control"></textarea>
            </div>
            <?php 
            echo form_close();
            ?>
        </div>
    </div>
</section>