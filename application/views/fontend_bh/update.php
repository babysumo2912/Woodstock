<?php
if(isset($err)) {
    echo $err;
    die();
}else{
include 'header.php';?>
    <?php
    if(isset($data_product)){
        foreach($data_product as $row){

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
            <p class = "title_add_pro">Thay đổi hình ảnh sản phẩm</p>
            <div class = "img_pro">
                <!-- <div class = "col-md-6"> -->
                <input type="file" name="userfile" accept="image/*" onchange="loadFile(event)"><br>
                <img id="output"/ style = "width: 100%;" src = "<?php echo base_url()?>public/img/product/<?php echo $row->img?>">
                <!-- </div> -->
            </div>
        </div>
        <div class = "add_content col-md-6 ">
            <p class = "title_add_pro">Chi Tiết Sản Phẩm</p>
            <div class = "form_add_pro">
                <div class = "form-group">
                    <label for=""><i class = "fa fa-align-left"></i>&nbsp;Tên sản phẩm</label>
                    <input type="text" name="name" value="<?php echo $row->name?>" class = "form-control" required>
                </div>
                <div class = "form-group">
                    <label for=""><i class = "fa fa-pencil"></i>&nbsp;Viết mô tả mới</label>
                    <textarea rows="10" name = "discribe" class = "form-control" required><?php echo $row->discribe?></textarea>
                </div>
                <div class = "form-group">
                    <label for=""><i class = "fa fa-list"></i>&nbsp;Danh mục sản phẩm</label>
                    <select name="id_catalog" id="" class = "form-control">
                        <?php
                        if(isset($catalog)){
                            foreach($catalog as $key){
                                if($row->id_catalog == $key->id_catalog){
                                ?>
                                <option value="<?php echo $key->id_catalog ?>" selected><?php echo $key->name ?></option>
                                <?php
                                }else{
                                ?>
                                <option value="<?php echo $key->id_catalog ?>"><?php echo $key->name ?></option>
                                <?php
                                }
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class = "form-group">
                    <label for=""><i class = "fa fa-tags"></i>&nbsp;Giá</label>
                    <input type="number" name="price" min = "1000" value="<?php echo $row->price?>" class = "form-control" required>
                </div>
                <div class = "form-group">
                    <label for=""><i class = "fa fa-database"></i>&nbsp;Kho hàng</label>
                    <input type="number" name="number" value="<?php echo $row->number?>" min = "1" class = "form-control" required>
                </div>
                <div class = "form-group">
                    <label for=""><i class = "fa fa-check-square-o"></i>&nbsp;Tình trạng</label>
                    <select name="id_status" id="" class = "form-control">
                        <?php
                        if(isset($status_product)){
                            foreach($status_product as $value){
                                if($row->id_status == $value->id_status){
                                ?>
                                <option value="<?php echo $value->id_status ?>" selected><?php echo $value->name ?></option>
                                <?php
                                }
                                ?>
                                <option value="<?php echo $value->id_status ?>"><?php echo $value->name ?></option>
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
<?php
        }
    }
    }
?>
