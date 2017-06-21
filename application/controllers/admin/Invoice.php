<?php 
class invoice extends CI_Controller{
	public function view($active){
		$data = array();
        $admin = $this->session->userdata('admin');
        $time_out = $this->session->userdata('time_out_login');
        if(isset($admin)){
            if(time() - $time_out >=30000000000000){
                $this->session->sess_destroy();
                redirect('admin/home');
            }else{
            	$data['admin'] = $admin;
                $data = array();
				$invoice = $this->Invoice_models->invoice_admin($active);
				if($invoice){
					$data['invoice'] = $invoice;
				}
				$data['active'] = $active;
				$this->load->view('admin/invoice',$data);
            }
        }else{
        redirect('admin/home/login');die();
        }




	}
}

 ?>