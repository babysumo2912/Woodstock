<?php 
class home extends CI_Controller{
	function index(){
		$admin = $this->session->userdata('admin');
		if(!isset($admin)){
			redirect('admin/home/login');die();
		}
		$this->load->view('admin/home');
	}
	function login(){
		$login_user = $this->session->userdata('session_user');
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

}
 ?>
