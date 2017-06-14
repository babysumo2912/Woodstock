<?php 
include'header.php';
 ?>
<section class="max">
	<h2>Danh sách tài khoản</h2>
	<hr>
	<?php 
	echo form_open();

	 ?>
	<div class="row">
	 	<div class="col-md-8 col-sm-6 col-xs-12">
		 	<buttom type="submit" class="btn btn-danger">
		 		<i class="fa fa-ban"></i> Cấm hàng loạt
		 	</buttom>
		</div>
		<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="input-group">
		      <input type="text" class="form-control" placeholder="Tìm tên tài khoản...">
		      <span class="input-group-btn">
		        <button class="btn btn-default" type="button">Tìm kiếm!</button>
		      </span>
		    </div>
		</div>
	</div>
	<br>
	<table class="table table-bordered table-hover">
		<tr class="text-center">
			<td style="width:5%">
				<input type="checkbox" class="check" id="checkAll">
			</td>
			<td>
				Người dùng
			</td>
			<td>
				Mô tả ngắn
			</td>
			<td></td>
		</tr>
		<?php 
		if($user){
			foreach ($user as $key) {
				// $catalog = $this->Home_models->getinfo('tb_catalog','id_catalog',$key->id_catalog);
				// if($catalog){
				// 	foreach ($catalog as $value) {}
				// }
			 ?>
		<tr>	
			<td class="text-center">
				<input type="checkbox" class="check" value="<?php echo $key->id_user ?>">
			</td>
			<td>
				<div class="avatar1" style="background:url('<?php echo base_url() ?>/public/img/user/avatar/<?php echo $key->img ?>') center; background-size: cover;margin:0; padding: 0"></div>
                &nbsp;<a href="#"><?php echo $key->name?></a>
			</td>
			<td>
				<div style="height:70px;overflow-x: hidden">
					<?php echo $key->discribe ?>
				</div>
			</td>
			<td class="text-center">
				<a href=""><i class="fa fa-remove"></i></a>
			</td>
		</tr>
		<?php 
			}
		}

		 ?>
	</table>
	<?php 
	echo form_close();

	 ?>
</section>


 <?php 
include'footer.php';

  ?>