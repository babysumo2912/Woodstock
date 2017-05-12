<?php 
include 'header.php';
if(isset($err)){
    echo $err;

}
?>
<section class = "max border row">
    <?php
        $style = array(
            'class' => 'form-group',
            'enctype' => 'multipart/form-data'
        );
        echo form_open('product/add_product',$style)
    ?>
    <div class = "add_content col-md-6">
        <p class = "title_add_pro">Thêm hình ảnh sản phẩm</p>
        <div class = "img_pro">
            <!-- <div class = "col-md-6"> -->
                <input type="file" name="userfile" accept="image/*" onchange="loadFile(event)" required>
<<<<<<< HEAD
                <img id="output" style = "width: 100%;">
=======
                <img id="output"/ style = "width: 100%;">
>>>>>>> 790d92779a769e71446d6bd7192a8edef843a4c9
            <!-- </div> -->
        </div>
    </div>
    <div class = "add_content col-md-6 ">
        <p class = "title_add_pro">Chi Tiết Sản Phẩm</p>
        <div class = "form_add_pro">
            <div class = "form-group">
                <label for=""><i class = "fa fa-align-left"></i>&nbsp;Tên sản phẩm</label>
                <input type="text" name="name" value="" class = "form-control" required>
            </div>
            <div class = "form-group">
                <label for=""><i class = "fa fa-pencil"></i>&nbsp;Mô tả</label>
                <textarea rows="10" name = "discribe" class = "form-control" require></textarea>
            </div>
            <div class = "form-group">
                <label for=""><i class = "fa fa-list"></i>&nbsp;Danh mục sản phẩm</label>
                <select name="id_catalog" id="" class = "form-control">
                    <?php 
                    if(isset($catalog)){
                        foreach($catalog as $row){
                    ?>
                    <option value="<?php echo $row->id_catalog ?>"><?php echo $row->name ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
            </div>
            <div class = "form-group">
                <label for=""><i class = "fa fa-tags"></i>&nbsp;Giá</label>
                <input type="number" name="price" min = "1000" value="" class = "form-control" required>
            </div>
            <div class = "form-group">
                <label for=""><i class = "fa fa-database"></i>&nbsp;Kho hàng</label>
                <input type="number" name="number" value="" min = "1" class = "form-control" required>
            </div>
            <div class = "form-group">
                <label for=""><i class = "fa fa-check-square-o"></i>&nbsp;Tình trạng</label>
                <select name="id_status" id="" class = "form-control">
                    <?php 
                    if(isset($status_product)){
                        foreach($status_product as $row){
                    ?>
                    <option value="<?php echo $row->id_status ?>"><?php echo $row->name ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>
    <div class = "text-center col-md-12 margintop40">
        <button type="submit" class = "btn btn-success">
            <i class = "fa fa-save"></i>&nbsp; Lưu Sản Phẩm
        </button>
    </div>
    <?php 
        echo form_close();
    ?>
</section>
<?php include'footer.php' ?>