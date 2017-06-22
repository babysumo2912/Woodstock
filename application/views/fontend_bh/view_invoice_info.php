<?php 
include'header.php';
?>
<section class="max">
<div style="margin:50px">
	<?php 
	if(isset($invoice)){
		foreach ($invoice as $hd) {};
		
	 ?>
	<div style="border: 1px #ccc solid; box-shadow: 5px 5px 15px #ccc; padding: 10px">
		<p>Mã vận đơn: <b><?php echo $hd->shipping_code?></b></p>
        
	    <table class="table table-hover">
	    	<tr>
	    		<td>STT</td>
	            <td>Sản phẩm</td>
	            <td>Số lượng</td>
	            <td>Người mua</td>
	            <td>Đơn vị vận chuyển</td>
	            <td>Thành tiền</td>
	            <td></td>
	    	</tr>
	    	<?php
    		$id_user = $this->session->userdata('session_user');
                $detail_invoice = $this->Invoice_models->get_invoice1($hd->id_invoice,$id_user);
                // echo $active;
                // var_dump($detail_invoice);die();
                if($detail_invoice){
                    $i = 1;
                    $money = 0;
                    foreach ($detail_invoice as $cthd){
                        $money+=$cthd->subtotal;
        	?>
	        <tr>
	            <td><?php echo $i;?></td>
	            <td>
	                <?php echo $cthd->name?>
	            </td>
	            <td>
	                <?php echo $cthd->qty?>
	            </td>
	            <td>
	                <?php
	                $account = $this->User_models->getinfo($hd->id_user);
	                foreach ($account as $value1) {}
	                    ?>
	                    <div class="row" style="">
	                        <div class="avatar" style="background:url('<?php echo base_url() ?>/public/img/user/avatar/<?php echo $value1->img ?>') center; background-size: cover;margin:0; padding: 0"></div>
	                        &nbsp;<a href="#"><?php echo $value1->name?></a>
	                    </div>
	            </td>
	            <td>
	                <?php echo $hd->tranformer?>
	            </td>
	            <td>
	                <?php echo number_format($cthd->subtotal)?>
	            </td>
	            <td>
                <?php
                switch ($cthd->active){
                    case "0":
                        echo "Chờ xác nhận";
                        break;
                    case "1":
                        echo "Chờ lấy hàng";
                        break;
                    case "2":
                        echo "Đang giao hàng";
                        break;
                    case "3":
                        echo "Đã hoàn thành";
                        break;
                    case "4":
                        echo "Đã hủy";
                        break;
                    default:
                        echo "Hoàn hàng";
                }
                ?>
	            </td>
	        </tr>
	        <?php
	                        $i++;
	                    }
	                }
	        ?>
	        <tr>
	            <td colspan="5">
	                <p class="text-right">Tổng thanh toán:</p>
	            </td>
	            <td style="color:red;">
	                    <b>
	                        <?php echo number_format($money)?>
	                    </b>
	            </td>
	            <td></td>
	        </tr>
	    </table>
	</div>
	<?php 
	}else{
	?>
	<div class="text-center" style="margin: 100px 0;">
        <img src="<?php echo base_url()?>public/img/style/nocart.png" alt="woodstock"><br><br>
        <p>Không có đơn hàng !</p>
    </div>
	<?php } ?>
</div>
</section>
<?php 
include'footer.php';

?>