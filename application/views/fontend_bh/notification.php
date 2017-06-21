<?php 
include'header.php';
?>
<section class="ccc">
	<div class="cccwh" style="border-bottom: 1px solid #ccc;max-width: 1000px; margin: 0 auto">
		<div class="row" style="padding: 20px">
			<i class = "fa fa-bell-o fa-5x" style="float:left;margin-right: 10px;"></i> 
	        <p href="#" style="margin-left: 30px">
	            <b style="font-size: 25px">Thông báo</b><br>
	            <p>Cập nhập thông báo chính xác và nhanh chóng</p>
	        </p>
		</div>
	</div>
	<div class="cccwh" style="border-bottom: 1px solid #ccc;max-width: 1000px; margin: 0 auto;">
		<div class="row" style="padding: 20px">
			<?php 
			if(isset($noti)){
			?>
			<div class="row">
				<a href="<?php echo base_url() ?>sale/notification/read_all" style="float:right"><i class="fa fa-check"></i>&nbsp;Đánh dấu tất cả đã đọc</a>
			</div>
			<div class="noti">
				<ul style="list-style: none;">
					<?php 
					foreach($noti as $row){
				?>
					<li
					<?php 
					if($row->active == 0){
					?>
					style="color: black;"
					<?php
					}else{
					?>
					style="color: #ccc"
					<?php
					}
					 ?>
					

					>
						<i></i>					
						<p><?php echo $row->content ?> <br>
						<sub><i class="fa fa-calendar"></i> <?php echo substr($row->time,0,10) ?></sub></p>
					</li>
				<?php
					}

					 ?>
				</ul>
			</div>
			<?php
			}else{
			?>
			<div class="text-center" style="margin-top: 50px">
				<img src="<?php echo base_url() ?>public/img/style/noproduct.png">
				<p style="font-size: 18px;margin-top:10px">Hiện tại, Bạn không có thông báo!</p>
			</div>
			<?php
			}

			 ?>
			<ul>
			</ul>
		</div>
	</div>
</section>