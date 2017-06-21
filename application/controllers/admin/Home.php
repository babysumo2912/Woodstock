<?php 
class home extends CI_Controller{
	function index(){
		$data = array();
        $admin = $this->session->userdata('admin');
        $time_out = $this->session->userdata('time_out_login');
        $set_time = $this->Home_models->get('tb_set_timeout');
        foreach ($set_time as $st) {
        	$invoice_check = $this->Invoice_models->invoice_detail_admin('0');
	        	if($invoice_check){
	        	foreach($invoice_check as $cthd){
	        		if(time() - $cthd->time >= $st->time_check){
	        			$active = array(
	        				'id_invoice' => $cthd->id_invoice,
	        				'active' => '4'
	        				);
	        			$this->Invoice_models->ban_invoice($cthd->id_detail,$active);
	        			$hd = $this->Invoice_models->get_invoice_sale($cthd->id_invoice);
	        			foreach ($hd as $hd1) {};
	        			$content = 'Đơn hàng <b>'.$hd1->shipping_code.'</b> đã bị  hủy do quá thời gian xác nhận';
	        			$add_notification = array(
	        				'id_user' => $cthd->id_user,
	        				'content' => $content,
	        				);
	        			$this->Home_models->add_notification($add_notification);
	        		}
	        	}

        		}
        }
        if(isset($admin)){
        	$data['admin'] = $admin;
            $number_invoice = $this->Invoice_models->invoice_admin('1');
            if($number_invoice){
            	$data_number = count($number_invoice);
            }else $data_number = 0;
            $data['number_invoice'] = $data_number;
            $number_product = $this->Product_models->getall_active();
            if($number_product){
            	$data['number_product'] = count($number_product);
            }else $data['number_product'] = 0;
            $this->load->view('admin/home',$data);
        }else{
        redirect('admin/home/login');die();
        }
	}
	function login(){
		$login_user = $this->session->userdata('admin');
        if(isset($login_user)){
            redirect('admin/home');
            die();
        }
		$taikhoan = $this->input->post('account');
		$matkhau = md5($this->input->post('password'));
		if(isset($taikhoan) && isset($matkhau)){
			$data = array(
				'name' => $taikhoan,
				'password' => $matkhau,
				);
			$login = $this->Admin_models->login($data);
			if($login == true){
				$session = array(
					'admin' => $taikhoan,
					);
				$this->session->set_userdata($session);
				redirect('admin/home');
			}
			else{
				$data['err'] = "Tài khoản hoặc mật khẩu không chính xác";
				$this->load->view('admin/login',$data);
			}
		}
		$this->load->view('admin/login');
	}
	function logout(){
		$this->session->sess_destroy();
		redirect('admin/home');
	}

}
 ?>
