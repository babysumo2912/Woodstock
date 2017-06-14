<?php 
// include'header_admin.php';
?>
<?php
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', true);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('Report');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}
$pdf->AddPage();

$html = '
<div>
<p style="text-align: center;margin-top:50px"><b style="font-size:20px;">Danh sach don dat hang<b>
<br>
</p>
<i style="font-size:14px;">(Tu ngay '.$day_begin.'den ngay '.$day_end.')</i>
</div>
<div>
<p style="text-align: left">Ten Shop:<b> '.$user.'</b></p>
<p style="text-align: left">Dia chi:<b> '.$address.' - '.$district.' - '.$city.'</b></p>
<div>
<p> </p>';
$id_user = $this->session->userdata('session_user');
if(isset($all_invoice)){
$html.='
<div>
<table cellpadding="10px" border="1px" style="width: 100%;">
	<tr>
		<td style="width:10%">STT</td>
		<td style="width:20%">Ngay tao don</td>
		<td style="width:20%">Ma van don</td>
		<td style="width:15%">So luong</td>
		<td style="width:20%">Gia tri</td>
		<td style="width:20%">Tinh trang</td>
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
			 			$tt = "Chua xac nhan";
			 			break;
			 		case '1':
			 			$tt = "Chua lay hang";
			 			break;
		 			case'2':
		 				$tt = "Dang giao hang";
		 				break;
	 				case'3':
	 					$tt = "Da hoan thanh";
	 					break;
 					case '4':
 						$tt = "Da huy";
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
<p>Nguoi lap phieu</p>
<p><sup><i>(Ki va ghi ro ho ten)</i></sup></p>
</div>
';
}
$pdf->writeHTML($html, true, 0, false, 0);
$pdf->lastPage();
$pdf->Output('report_xuathang.pdf', 'I');
?>
	