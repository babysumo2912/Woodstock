<?php 
include'header.php';
if(isset($account)){
    foreach($account as $acc){}
}
 ?>
 <?php 
if(isset($err)){
	echo '<h1 class="text-center">'.$err.'</h1>';
	die();
}
  ?>
<section class="ccc">
	<div class="cccwhite">
		<div class="row">
			<div class="col-md-3">
				<div style = "height: 150px;background:url('<?php echo base_url()?>public/img/user/avatar/<?php echo $acc->img ?>') center; background-size: cover;">
					<div style="padding: 17px;color: black; background: url('<?php echo base_url() ?>public/img/style/bg1.png');color:white;width:100%">
						<p class="text-center" style = "padding-top: 20px; font-size: 18px;">
							Welcome,<br><b><?php echo $acc->name ?></b>
						</p>
						<div class="text-center ashop" >
							<a href="" class="btn">Theo dõi</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<a href="" class="btn">Nhắn tin</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-9">
				<div class="col-md-4">
					<div style="padding-top:20px">
						<i class="fa fa-commenting-o"></i> Tỷ lệ phản hồi: <?php echo rand(1, 100) ?>% <br>
					</div>
					<div style="padding-top: 20px">
						<i class="fa fa-cube"></i> Sản phẩm: <?php if(isset($number_product)){echo $number_product;} ?><br>
					</div>
					<div style="padding-top: 20px">
						<i class="fa fa-user-o"></i> Số người theo dõi: <?php echo $acc->follow ?> <br>
					</div>
				</div>
				<div class="col-md-4">
					<div style="padding-top:20px">
						<i class="fa fa-clock-o"></i> Thời gian phản hồi: không có sẵn <br>
					</div>
					<div style="padding-top: 20px">
						<i class="fa fa-handshake-o"></i> Tham gia: vài ngày trước <br>
					</div>
					<!-- <div style="padding-top: 20px">
						<i class="fa fa-user-o"></i> Đang theo: 1 <br>
					</div> -->
				</div>
			</div>
		</div>
	</div>
	<h3>Tất cả sản phẩm</h3>
	<div class="cccwhite">
		<div class = "qc2" style="border-bottom: 1px solid #ccc">
	        <ul>
	            <li style="padding:0 90px">
	                <a href="<?php echo base_url()?>shop/order_by/number/desc/<?php echo $id_user ?>">
	                    
	                    Phổ biến
	                </a>
	            </li>
	            <li style="padding:0 90px">
	                <a href="<?php echo base_url()?>shop/order_by/id_product/desc/<?php echo $id_user ?>">
	                Mới nhất
	                </a>
	            </li>
	            <li style="padding:0 90px">
	                <a href="<?php echo base_url()?>shop/order_by/like/desc/<?php echo $id_user ?>">
	                Bán chạy
	                </a>
	            </li>
	            <li style="padding:0 90px">
	                <a href="<?php echo base_url()?>shop/order_by/price/desc/<?php echo $id_user ?>">
	                Giá&nbsp;&nbsp;
	                <i class="fa fa-angle-double-down"></i>
	                </a>
	            </li>
	            <li style="padding:0 90px">
	                <a href="<?php echo base_url()?>shop/order_by/price/asc/<?php echo $id_user ?>">
	                Giá&nbsp;&nbsp;
	                <i class="fa fa-angle-double-up"></i>
	                </a>
	            </li>
	        </ul>
        </div>	
	</div>
    <div class="row">
    <?php
        if(isset($product)){
            foreach($product as $row){
    ?>
    	<div class = "col-md-2 col-sm-3 col-xs-6">
            <div class = " product">
                <a href="<?php echo base_url()?>product/view/<?php echo $row->id_product?>" title = "<?php echo $row->name?>">
                    <div class = "img-product" style = "background:url('<?php echo base_url()?>public/img/product/<?php echo $row->img ?>') center; background-size: cover"></div>
                    <div class = "content-product">
                        <div class = "name-product">

                                <h4><?php echo $row->name?></h4>

                        </div>
                        <div class = "cost-product">
                            <span><?php echo number_format($row->price)?><sup>đ</sup></span>
                        </div>
                        <div class = "info-product">
                            <i class = "fa fa-heart-o"> &nbsp;<?php echo number_format($row->like)?></i>
                        </div>
                        <div class = "star">
                            <div class="rateit" data-rateit-value="5"  data-rateit-readonly="true"></div>
                            <span>(325)</span>
                        </div>
                    </div>
                </a>
            </div>
    	</div>
	<?php 
		}
	}else{
		?>
		<div class="text-center" style="margin-top: 50px">
			<img src="<?php echo base_url() ?>public/img/style/noproduct.png">
			<p style="font-size: 18px;margin-top:10px">Hiện tại, Shop không có sản phẩm.</p>
		</div>
		<?php
	}
	?>
    </div>
</section>

 <?php 
include'footer.php';

 ?>