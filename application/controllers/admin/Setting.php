<?php 
/**
* 
*/
class setting extends CI_Controller
{
	
	function index(){
		$data = array();
        $admin = $this->session->userdata('admin');
        $time_out = $this->session->userdata('time_out_login');
        if(isset($admin)){
        	$set_time = $this->Home_models->get('tb_set_timeout');
        	$data['set_time'] = $set_time;
        	$data['admin'] = $admin;
			$this->load->view('admin/setting',$data);
        }else{
        redirect('admin/home/login');die();
        }
	}
	function set_timeout(){
		$admin = $this->session->userdata('admin');
		if(!isset($admin)){
			redirect('admin/home');
			die();
		}
		$time_login = $this->input->post('time_login');
		$time_buy = $this->input->post('time_buy');
		$time_check = $this->input->post('time_check');
		if(isset($time_login) && isset($time_buy) && isset($time_check)){
			$data_tlg = $time_login*3600;
			$data_tb = $time_buy*60;
			$data_c = $time_check*3600;	
			$array = array(
				'time_login' => $data_tlg,
				'time_buy' => $data_tb,
				'time_check' => $data_c,
				);
			$this->Admin_models->set_timeout($array);
			redirect('admin/setting');
		}else redirect('admin/setting');
	}
}


 ?>