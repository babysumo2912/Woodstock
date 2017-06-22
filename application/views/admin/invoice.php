<?php 
include 'header.php';
?>
<?php 
if(!isset($invoice)){
?>
<div class="text-center" style="margin: 100px 0;">
    <img src="<?php echo base_url()?>public/img/style/nocart.png" alt="woodstock"><br><br>
    <p>Chưa có đơn hàng !</p>
</div>
<?php
}else{

 ?>
<section class="max">
	<h2>
		<?php 
		if(isset($active)){
			switch ($active) {
				case '0':
					echo "Đơn hàng chờ xác nhận";
					break;
				case '1':
					echo "Đơn hàng đã xác nhận";
					break;
				case '2':
					echo "Đơn hàng đang giao";
					break;
				case '3':
					echo "Đơn hàng đã hoàn thành";
					break;
				case '4':
					echo "Đơn hàng bị hủy";
					break;
				default:
					echo "Đơn hàng hoàn về";
					break;
			}
		}

		?>
	</h2>
	<hr>
	<div class="row">
	 	<div class="col-md-8 col-sm-6 col-xs-12">
		 	
		</div>
		<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="input-group">
		      <input type="text" class="form-control" placeholder="Nhập mã vận đơn...">
		      <span class="input-group-btn">
		        <button class="btn btn-default" type="button">Tìm kiếm</button>
		      </span>
		    </div>
		</div>
	</div>
	<?php 
	if(isset($invoice)){
		foreach($invoice as $hd)
		{
	?>
	<div style="margin: 20px 0; border: 1px #ccc solid; box-shadow: 2px 2px 4px #ccc; padding: 20px">
		<p><i class="fa fa-calendar"></i>&nbsp;<?php echo substr($hd->date,0,10) ?></p>
		<p><i class="fa fa-clock-o"></i>&nbsp;<?php echo substr($hd->date,10,9) ?></p>
		<p>Mã vận đơn: <b><?php echo $hd->shipping_code ?></b></p>
		<p>Tên người nhận: <?php echo $hd->name ?></p>
		<p>Số điện thoại: <?php echo $hd->phone ?></p>
		<p>Địa chỉ: <?php echo $hd->address ?> - <?php echo $hd->district ?> - <?php echo $hd->city ?></p>
		<p>Đơn vị vận chuyển: <?php echo $hd->tranformer ?></p>

	<table class="table table-bordered table-hover">
		<tr class="text-center">
			<td>
				STT
			</td>
			<td>
				Sản phẩm
			</td>
			<td>
				Giá tiền
			</td>
			<td>
				Số lượng
			</td>
			<td>
				Thành tiền
			</td>
			<td>
				Liên lạc với người bán
			</td>
			<td></td>
		</tr>
		<?php
			$invoice_detail = $this->Invoice_models->get_invoice_detail($hd->id_invoice);
			if($invoice_detail){
				$i = 0;
				foreach ($invoice_detail as $cthd) {
					$i++;
					$infomation_shop = $this->User_models->getinfo($cthd->id_user);
					$account = $this->User_models->get_address_default($cthd->id_user);
					if($account){
						foreach ($account as $add) {};
						$district = $this->Home_models->getinfo('tb_district','id_district',$add->id_district);
						if($district){
							foreach ($district as $dtr) {}
						}
						$city = $this->Home_models->getinfo('tb_city','id_city',$add->id_city);
						if($city){
							foreach ($city as $tp) {}
						}
					}
		?>
		<tr
		<?php 
		if($cthd->active == '4'){
		?>
		style="background: #ccc"
		<?php
		}

		 ?>
		>	
			<td><?php echo $i ?></td>
			<td>
				<div class="avatar1" style="background:url('<?php echo base_url() ?>/public/img/product/<?php echo $cthd->img ?>') center; background-size: cover;margin:0; padding: 0"></div>
                &nbsp;<a href="<?php echo base_url()?>shop/view/<?php echo $cthd->id_user ?>" target="_blank"><?php echo $cthd->name?></a>
			</td>
			<td>
				<?php echo number_format($cthd->price) ?>
			</td>
			<td>
				
				<?php echo $cthd->qty ?>
				
			</td>
			<td>
				<?php echo number_format($cthd->subtotal) ?>
			</td>
			<td>
				<?php 
				if($account){
					echo $add->phone.'<br>';
				 ?>
					<?php echo $add->address?> - <?php echo $dtr->district ?> - <?php echo $tp->city ?>
				<?php }else 
				if($infomation_shop){
					foreach ($infomation_shop as $ifmt) {};
					echo $ifmt->phone;
				}

				 ?>
			</td>
			<td>
				<?php 
                switch ($cthd->active) {
                    case '0':
                        ?>
                        <i class="fa fa-question"></i>
                        <?php
                        break;
                    case '1':
                        ?>
                        <i class="fa fa-check"></i>
                        <?php
                        break;
                    case '2':
                        ?>
                        <i class="fa fa-truck"></i>
                        <?php
                        break;
                    case '3':
                        ?>
                        <i class="fa fa-thumbs-o-up"></i>
                        <?php
                        break;
                    case '4':
                        ?>
                        <i class="fa fa-warning"></i>
                        <?php
                        break;
                    
                    default:
                        # code...
                        break;
                }

                 ?>
			</td>
		</tr>
		<?php 
					}
				}

		 ?>
	</table>
		<div class="text-center">
	 		<?php 
			if(isset($active)){
				switch ($active) {
					case '0':
						?>
					<a href="" class="btn btn-primary" disabled><i class="fa fa-truck"></i> Lấy hàng</a>
						<?php
						break;
					case '1':
					?>
					<a href="<?php echo base_url() ?>admin/invoice/click_active/<?php echo $hd->id_invoice ?>/2" class="btn btn-primary"><i class="fa fa-truck"></i> Lấy hàng</a>
					<?php
						break;
					case '2':
					?>
					<a href="<?php echo base_url() ?>admin/invoice/click_active/<?php echo $hd->id_invoice ?>/3" class="btn btn-primary"><i class="fa fa-check"></i> Hoàn thành</a>
					<a href="<?php echo base_url() ?>admin/invoice/click_active/<?php echo $hd->id_invoice ?>/5" class="btn btn-success"><i class="fa fa-undo"></i> Hoàn về</a>
					<?php
						break;
					case '3':
						echo "Đơn hàng đã hoàn thành";
						break;
					case '4':
						echo "Đơn hàng đã bị hủy";
						break;
					default:
						echo "Đơn đã hoàn về";
				}
			}

			?>
 		
		</div>
	</div>
	<?php
		}
	}

	 ?>
	<br>
</section>

<?php } ?>

<?php 
include 'footer.php';
?>