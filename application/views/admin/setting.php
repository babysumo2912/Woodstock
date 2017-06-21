<?php 
include'header.php';
 ?>
<?php 
if(isset($set_time)){
	foreach ($set_time as $st) {}
}

 ?>
<section class="center_bh">
 	<div style="max-width: 600px; margin: 0 auto">
 		<div class="text-center" style="border:1px #ccc solid; padding: 40px">
 			<p><b>Cài đặt setimeout hệ thống</b></p>
 			<?php echo form_open('admin/setting/set_timeout') ?>
 			<table class="table table-hover">
 				<tr>
 					<td>
 						Thời gian 1 phiên đăng nhập :
 						<?php echo $st->time_login/(24*3600) ?> ngày
					</td>
 					<td>
 						<select class="form-control" name="time_login">
 							<option value="24">1 ngày</option>
 							<option value="48">2 ngày</option>
 							<option value="72">3 ngày</option>
 							<option value="96">4 ngày</option>
 						</select>
 					</td>
 				</tr>
 				<tr>
 					<td>
 						Thời gian 1 phiên mua sắm : 
 						<?php echo $st->time_buy/(3600) ?> giờ
					</td>
 					<td>
 						<select class="form-control" name="time_buy">
 							<option value="30">30 phút</option>
 							<option value="60">1 giờ</option>
 							<option value="120">2 giờ</option>
 						</select>
 					</td>
 				</tr>
 				<tr>
 					<td>
 						Thời gian xác nhận đơn hàng : 
 						<?php echo $st->time_check/(24*3600) ?> ngày
					</td>
 					<td>
 						<select class="form-control" name="time_check">
 							<option value="24">1 ngày</option>
 							<option value="48">2 ngày</option>
 							<option value="72">3 ngày</option>
 							<option value="96">4 ngày</option>
 						</select>
 					</td>
 				</tr>
 				<tr>
 					<td colspan="2">
 						<div class="text-center">
 							<button class="btn btn-primary">
 								<i class="fa fa-gears"></i> Lưu
 							</button>
 						</div>
 					</td>
 				</tr>
 			</table>
 			<?php echo form_close() ?>
 		</div>
 	</div>
</section>