<?php 
include'header.php';
if(isset($account)){
    foreach($account as $acc){};
}
if(isset($address))
{   
    foreach ($address as $add) {};
    $district = $this->Home_models->getinfo('tb_district','id_district',$add->id_district);
    if($district){
        foreach ($district as $dst) {};
    }
    $city = $this->Home_models->getinfo('tb_city','id_city',$add->id_city);
    if($city){
        foreach ($city as $cty) {};
    }
}
 ?>

<section class="ccc">
	<div class="cccwh" style="border-bottom: 1px solid #ccc;max-width: 1000px; margin: 0 auto">
		<div class="row" style="padding: 20px">
			<i class = "fa fa-address-card fa-5x" style="float:left;margin-right: 10px;"></i> 
	        <p href="#" style="margin-left: 30px">
	            <b style="font-size: 25px">Hồ sơ Shop</b><br>
	            <p>Xem tình trạng Shop và cập nhập hồ sơ của bạn</p>
	        </p>
		</div>
	</div>
	<div class="cccwh" style="border-bottom: 1px solid #ccc;max-width: 1000px; margin: 0 auto;">
		<div class="row" style="padding: 20px">
		<?php 
        $style = array(
            'class' => 'form-group',
            'enctype' => 'multipart/form-data'
        );
        echo form_open('myshop/add_infomation',$style);
		 ?>
            <div class="col-md-5">
	           <div class = "img_pro">
                <!-- <div class = "col-md-6"> -->
                <input type="file" name="userfile" accept="image/*" onchange="loadFile(event)"><br>
                <img id="output"/ style = "width: 100%;" src = "<?php echo base_url()?>public/img/user/avatar/<?php echo $acc->img?>" >
                <!-- </div> -->
                </div>
        	</div>
        	<div class="col-md-7">
        		<div class="form_add_pro">
        			<div class="form-group">
        			<caption><b style="font-size: 18px">Chi Tiết Shop</b></caption>
        				<table class="table">
        					<tr>
        						<td><p>Tên Shop:</p></td>
        						<td colspan="2">
        							<input type="text" name="name" value="<?php echo $acc->name?>" class="form-control">
        						</td>
        					</tr>
        					<tr>
        						<td><p>Giới thiệu cơ bản:</p></td>
        						<td colspan="2">
        							<textarea class="form-control" rows="10" name="content"><?php echo strip_tags($acc->discribe) ?></textarea>
        						</td>
        					</tr>
                            <tr>
                                <td>Địa chỉ: </td>
                                <td ><?php 
                                if(!isset($address)){
                                    echo "Cập nhập thông tin địa chỉ Shop để tạo uy tín";
                                }else{
                                 ?>
                                    <?php echo $add->address ?> - <?php echo $dst->district ?> - <?php echo $cty->city ?>
                                    <?php } ?>
                                </td>
                                <td>
                                    <a href="<?php echo base_url()?>myshop/address" title="Sửa thông tin địa chỉ"><i class="fa fa-pencil"></i></a>
                                </td>
                            </tr>
        				</table>
        			</div>
        			<div class="text-center">
        				<button type="submit" class="btn btn-success">
        					<i class="fa fa-save"></i>
        					&nbsp;Lưu thay đổi
        				</button>
        			</div>
        		</div>
        	</div>
    	<?php echo form_close();?>
	    </div>
	</div>
</section>
 <?php 

include 'footer.php';
  ?>