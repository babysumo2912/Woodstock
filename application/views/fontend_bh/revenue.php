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
			<div class="col-md-6">
				<div style="padding: 20px">
					<label>Tổng danh thu của Shop:</label>&nbsp;<span style="color: red; font-size: 18px; font-weight: bold"><?php echo number_format($money) ?><sup>đ</sup></span>
					<hr>
				</div>
				<div style="padding: 20px">
					<p>Danh Sách Sản Phẩm bán chạy nhất của shop</p>
					<?php 
					if(isset($product_last)){
						$i = 0;
					?>
					<table class="table table-bordered">
						<tr>
							<td>STT</td>
							<td>Sản phẩm</td>
							<td>Lượt bán</td>
						</tr>
						<?php 
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

						 ?>
					</table>
					<?php
					}else{
						echo "Bạn chưa bán được sản phẩm nào ~~";
					}

					 ?>
				 </div>
				 <div style="padding: 20px">
					<p>Danh Sách Sản Phẩm bị cấm bởi admin</p>
					<?php 
					if(isset($product_ban)){
						$i = 0;
					?>
					<table class="table table-bordered">
						<tr>
							<td>STT</td>
							<td>Sản phẩm</td>
						</tr>
						<?php 
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

						 ?>
					</table>
					<?php
					}else{
						echo "Bạn không có sản phẩm nào bị cấm cả ~~";
					}

					 ?>
				 </div>

			</div>
			<div class="col-md-6">
				<div style="padding: 20px">
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
				</div>
			</div>
		</div>
	</div>
</section>
 <?php 
include'footer.php';

  ?>