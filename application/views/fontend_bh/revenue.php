<?php 
include'header.php';
 ?>
<section class = "max">
	<div style="margin-top: 40px">
		<div class="text-center">
			<h2 style="font-weight: bold">Thống kê quá trình kinh doanh trong Shop</h2>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-5">
				<div style="padding: 20px">
					<label>Tổng danh thu của Shop:</label>&nbsp;<span style="color: red; font-size: 18px; font-weight: bold"><?php echo number_format($money) ?><sup>đ</sup></span>
					<hr>
				</div>
				<div style="padding: 20px">
					<p>Danh Sách Sản Phẩm bán chạy nhất của shop</p>
					<table class="table table-bordered">
						<tr>
							<td>STT</td>
							<td>Sản phẩm</td>
							<td>Lượt bán</td>
						</tr>
						<?php 
					if(isset($product_last)){
						$i = 0;
						foreach ($product_last as $pdl) {
							$i++;
						?>
						<tr>
							<td><?php echo $i; ?></td>
							<td>
								<div class="row" style="padding: 5px 20px">
	                                <div class="avatar1" style="background:url('<?php echo base_url() ?>/public/img/product/<?php echo $pdl->img ?>') center; background-size: cover;margin:0; padding: 0"></div>
	                                &nbsp;<a href="#"><?php echo $pdl->name?></a>
	                            </div>
							</td>
							<td>
								<?php echo $pdl->like ?>
							</td>
						</tr>
						<?php
						}
					}else{
						?>
						<tr>
							<td colspan="3">Bạn chưa bán được sản phẩm nào!</td>
						</tr>
						<?php
					}
						 ?>
					</table>
					
				 </div>
				 <div style="padding: 20px">
					<p>Danh Sách Sản Phẩm bị cấm bởi admin</p>
					<table class="table table-bordered">
						<tr>
							<td>STT</td>
							<td>Sản phẩm</td>
						</tr>
						<?php 
						if(isset($product_ban)){
						$i = 0;
						foreach ($product_ban as $pdb) {
							$i++;
						?>
						<tr>
							<td><?php echo $i; ?></td>
							<td>
								<div class="row" style="padding: 5px 20px">
	                                <div class="avatar1" style="background:url('<?php echo base_url() ?>/public/img/product/<?php echo $pdb->img ?>') center; background-size: cover;margin:0; padding: 0">
                            		<i class = "fa fa-ban fa-4x" style="color:red"></i>
                            	</div>
	                                &nbsp;<a href="#"><?php echo $pdb->name?></a>
	                            </div>
							</td>
						</tr>
						<?php
						}
						}else{
						?>
						<tr>
							<td colspan="2">Bạn không có sản phẩm bị cấm!</td>
						</tr>
						<?php
					}
						 ?>
					</table>
					<?php
					

					 ?>
				 </div>

			</div>
			<div class="col-md-7">
				<div style="padding: 20px">
					<?php 
					$id_user = $this->session->userdata('session_user');
					if(isset($all_invoice)){
					?>
					<label>Danh sách đơn đặt hàng <br>từ ngày <?php echo $day_begin ?> đến ngày <?php echo $day_end ?></label>
					<?php
						if(isset($day_begin) && isset($day_end)){
							$check = false;
					?>
					<table class="table table-bordered table-hover">
						<tr>
							<td>STT</td>
							<td>Ngày tạo đơn</td>
							<td>Mã vận đơn</td>
							<td>Số lượng</td>
							<td>Giá trị</td>
							<td>Tình trạng</td>
						</tr>
						<?php 
						$i = 0;
						$doanhthu = 0;
							foreach ($all_invoice as $all) {
								$i++;
								$invoice = $this->Invoice_models->list_date($day_begin,$day_end,$all->id_invoice);
								if($invoice){
									$check = true;
								
								foreach ($invoice as $hd) {
								
								$invoice_detail = $this->Invoice_models->get_invoice_active($hd->id_invoice,$id_user);
								if($invoice_detail){
									$number = 0;
									$money = 0;
									
									foreach ($invoice_detail as $cthd) {
										if($cthd->active == 3){
											$doanhthu+=$cthd->subtotal;
										}
										$number+=$cthd->qty;
										$money+=$cthd->subtotal;
									}
								}
						 ?>
						 <tr>
						 	<td><?php echo $i; ?></td>
						 	<td><?php echo $hd->date ?></td>
						 	<td><?php echo $hd->shipping_code ?></td>
						 	<td><?php echo number_format($number) ?></td>
						 	<td><?php echo number_format($money) ?></td>
						 	<td><?php 
						 	switch ($hd->active) {
						 		case '0':
						 			echo "Chờ xác nhận";
						 			break;
						 		case '1':
						 			echo "Chờ đến lấy";
						 			break;
					 			case'2':
					 				echo "Đang giao hàng";
					 				break;
				 				case'3':
				 					echo "Đã hoàn thành";
				 					break;
			 					case '4':
			 						echo "Đã hủy";
			 						break;
						 		default:
						 			echo "";
						 			break;
						 	}

						 	 ?></td>
						 </tr>
						 
						 <?php 
						}
							}
							}
						  ?>
						  <tr>
						 	<td colspan="4"><b style="float: right">Số tiền thu về:</b></td>
						 	<td colspan="2"><?php echo number_format($doanhthu) ?></td>
						 </tr>
					</table>
					<?php
							
							?>
							<div class="text-center">
								<a href="<?php echo base_url() ?>sale/revenue/report/<?php echo $day_begin ?>/<?php echo $day_end ?>" class="btn btn-success"><i class="fa fa-print"></i>&nbsp; In báo cáo</a>
								<a href="<?php echo base_url() ?>sale/revenue" class="btn btn-primary"><i class="fa fa-check"></i>Xong</a>
							</div>
					<?php
							if($check == false){
							?>
							<div class="text-center" style="margin: 50px 0;">
		                        <img src="<?php echo base_url()?>public/img/style/nocart.png" alt="woodstock"><br><br>
		                        <p>Chưa có đơn hàng !</p>
		                    </div>
							<?php
							}
						}
					}else{

					 ?>
					<?php 
					echo form_open('sale/revenue/hoadon');
					 ?>
					<label>Thống kê danh sách hóa đơn của Shop</label>
					<?php 
					if(isset($err_hoadon)){
					?>
					<p style="color: red"><i class="fa fa-warning"></i>&nbsp;<?php echo $err_hoadon ?></p>
					<?php
					}
					 ?>
					 <?php 
					if(isset($err_list_hoadon)){
					?>
					<p style="color: red"><i class="fa fa-warning"></i>&nbsp;<?php echo $err_list_hoadon ?></p>
					<?php
					}
					 ?>
					<hr>
					<div class="form-group">
						<p>Từ ngày:</p>
						<input type="date" name="begin" required class="form-control">
					</div>
					<div class="form-group">
						<p>Đến ngày:</p>
						<input type="date" name="end" required class="form-control">
					</div>
					<div class="text-center">
						<button type="submit" class="btn btn-default">
							<i class="fa fa-save"></i>&nbsp;Tạo danh sách
						</button>
					</div>
					<?php 
					echo form_close();
					 ?>
					 <?php } ?>
				</div>
			</div>
		</div>
	</div>
</section>
 <?php 
include'footer.php';

  ?>