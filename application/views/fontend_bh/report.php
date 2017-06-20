<?php 
// include'header_admin.php';
if(!isset($address)){
	$address = '';
}
if(!isset($district)){
	$district = '';
}
if(!isset($city)){
	$city = '';
}
?>
<?php
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('Report');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('dejavusans', '', 10);

// add a page
$pdf->AddPage();

$html = '
<div>
<p style="text-align: center;margin-top:50px"><b style="font-size:20px;">Danh sách đơn đặt hàng<b>
<br>
</p>
<i style="font-size:14px;">(Từ ngày '.$day_begin.'đến ngày '.$day_end.')</i>
</div>
<div>
<p style="text-align: left">Tên Shop:<b> '.$user.'</b></p>
<p style="text-align: left">Địa chỉ:<b> '.$address.' - '.$district.' - '.$city.'</b></p>
<div>
<p> </p>';
$id_user = $this->session->userdata('session_user');
if(isset($all_invoice)){
$html.='
<div>
<table cellpadding="10px" border="1px" style="width: 100%;">
	<tr>
		<td style="width:10%">STT</td>
		<td style="width:20%">Ngày tạo đơn</td>
		<td style="width:20%">Mã vận đơn</td>
		<td style="width:15%">Số lượng</td>
		<td style="width:20%">Giá trị</td>
		<td style="width:20%">Tình trạng</td>
	</tr>';
	$i = 0;
	$doanhthu = 0;
	foreach ($all_invoice as $all) {
	$i++;
	$invoice = $this->Invoice_models->list_date($day_begin,$day_end,$all->id_invoice);
		if($invoice){
			$check = true;
			foreach ($invoice as $hd) {
				switch ($hd->active) {
			 		case '0':
			 			$tt = "Chưa xác nhận";
			 			break;
			 		case '1':
			 			$tt = "Chưa lấy hàng";
			 			break;
		 			case'2':
		 				$tt = "Đang giao hàng";
		 				break;
	 				case'3':
	 					$tt = "Đã hoàn thành";
	 					break;
 					case '4':
 						$tt = "Đã huỷ";
 						break;
			 		default:
			 			$tt = "";
			 			break;
			 	}
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

$html.='
	<tr>
		<td style="width:10%">'.$i.'</td>
		<td style="width:20%">'.substr($hd->date,0,10).'</td>
		<td style="width:20%">'.$hd->shipping_code.'</td>
		<td style="width:15%">'.number_format($number).'</td>
		<td style="width:20%">'.number_format($money).'</td>
		<td style="width:20%">'.$tt.'</td>
	</tr>'
;	
			}
		}
	}
$html.='
</table>
</div>
<div style="text-align: right">
<p>Người lập phiếu</p>
<p><sup><i>(Kí và ghi rõ họ tên)</i></sup></p>
</div>
';
}
$pdf->writeHTML($html, true, 0, false, 0);
$pdf->lastPage();
$pdf->Output('report_xuathang.pdf', 'I');
?>
	