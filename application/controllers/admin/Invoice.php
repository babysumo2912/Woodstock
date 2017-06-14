<?php 
class invoice extends CI_Controller{
	public function view($active){
		$data = array();
		$invoice = $this->Invoice_models->invoice_admin($active);
		if($invoice){
			$data['invoice'] = $invoice;
		}
		$data['active'] = $active;
		$this->load->view('admin/invoice',$data);
	}
}

 ?>