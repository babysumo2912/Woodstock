<?php 
include'header.php';

 ?>
<section class="max">
	<h2>Danh sách sản phẩm chờ xác nhận</h2>
	<hr>
	<div class="row">
		<div class="col-md-4">
			<div class="input-group">
		      <input type="text" class="form-control" placeholder="Tìm tên sản phẩm...">
		      <span class="input-group-btn">
		        <button class="btn btn-default" type="button">Tìm kiếm!</button>
		      </span>
		    </div>
		</div>
	</div>
	<?php 
	echo form_open('admin/product/check');

	 ?>
	<div class="text-left">
	 	
	<div class="row">
		<?php 
		if(isset($succ)):
?>
		<br>
		<div class="col-md-6 alert alert-success">
			<?php echo $succ ?>
		</div>
<?php
		endif;

		 ?>
	 	<div class="text-right">
		 	<button type="submit" class="btn btn-primary">
		 		<i class="fa fa-check"></i> Duyệt
		 	</button>
		</div>
	</div>
	</div><br>
	<table class="table table-bordered table-hover">
		<tr class="text-center">
			<td style="width:5%">
				<input type="checkbox" class="check" id="checkAll">
			</td>
			<td style="width:40%">
				Sản phẩm
			</td>
			<td style="width:20%">
				Danh mục
			</td>
			<td style="width:40%">
				Mô tả
			</td>
			<td style="width:5%"></td>
		</tr>
		<?php 
		if(isset($product)):
			foreach ($product as $key):
				// echo form_hidden('sanpham['.$key->id_product.'][id_product]',$key->id_product);
				$catalog = $this->Home_models->getinfo('tb_catalog','id_catalog',$key->id_catalog);
				if($catalog){
					foreach ($catalog as $value) {}
				}
			 ?>
		<tr>	
			<td class="text-center">
				<?php
                    $data = array(
                    'type' => 'checkbox',
                    'class' => 'check',
                    'name' => 'sanpham['.$key->id_product.'][id_product]',
                    'value' => $key->id_product,
                    );
                    echo form_input($data);
                    ?>
				<!-- <input type="checkbox" class="check" value="<?php echo $key->id_product ?>"> -->
			</td>
			<td>
				<div class="avatar1" style="background:url('<?php echo base_url() ?>/public/img/product/<?php echo $key->img ?>') center; background-size: cover;margin:0; padding: 0"></div>
                &nbsp;<a href="#"><?php echo $key->name?></a>
			</td>
			<td>
				<?php echo $value->name ?>
			</td>
			<td>
				<div style="height:70px;overflow-x: hidden">
					<?php echo $key->discribe ?>
				</div>
			</td>
			<td class="text-center">
				<a href=""><i class="fa fa-ban"></i></a>
			</td>
		</tr>
		<?php 
			endforeach;
		endif;

		 ?>
	</table>
	<?php 
	echo form_close();

	 ?>
</section>

 <?php 
include'footer.php';

  ?>