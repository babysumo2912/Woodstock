<?php 
/**
* 
*/
class notification extends CI_Controller
{
	
	function index(){
		$data = array();
        $login_user = $this->session->userdata('session_user');
        $time_out = $this->session->userdata('time_out_login');
        $set_time = $this->Home_models->get('tb_set_timeout');
        foreach($set_time as $st){};
        $set_time_buy = $st->time_buy;
        $set_time_login = $st->time_login;
        if(isset($login_user)){
            if(time() - $time_out >=$set_time_login){
                $this->session->sess_destroy();
                redirect('banhang');
            }else{
                $user = $this->User_models->getinfo($login_user);
                if($user){
                    foreach($user as $row){
                        $data['user'] = $row->name;
                        $data['avatar'] = $row->img;
                    }
                }
                $notification = $this->Home_models->get_noti($login_user,'1');
                if($notification){
                	// $data['noti'] = $notification;
                	$data['number_noti'] = count($notification);
                }
                $data_notification = $this->Home_models->getinfodesc_noti('tb_notification','id_user',$login_user,'id_tb','1');
                if($data_notification){
                    $data['noti'] = $data_notification;
                    // $data['number_noti'] = count($notification);
                }
                $this->load->view('fontend_bh/notification',$data);
            }
        }else{
            $this->load->view('fontend_bh/login');
        }
	}
	function read_all(){
		$data = array();
        $login_user = $this->session->userdata('session_user');
        $time_out = $this->session->userdata('time_out_login');
        $set_time = $this->Home_models->get('tb_set_timeout');
        foreach($set_time as $st){};
        $set_time_buy = $st->time_buy;
        $set_time_login = $st->time_login;
        if(isset($login_user)){
            if(time() - $time_out >=$set_time_login){
                $this->session->sess_destroy();
                redirect('banhang');
            }else{
            	$data_read = array(
            		'active' => '1',
                    'oop' => '1',
            		);
                $read_all = $this->Home_models->active('tb_notification','id_user',$login_user,$data_read);
                if($read_all){
                	redirect('banhang');
                }
            }
        }else{
            $this->load->view('fontend_bh/login');
        }	
	}
}


?>