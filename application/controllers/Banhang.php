<?php 
class Banhang extends CI_Controller{
    function index(){
        $login_user = $this->session->userdata('session_user');
        $time_out = $this->session->userdata('time_out_login');
        if(isset($login_user)){
            if(time() - $time_out >=30000000000000){
                $this->session->sess_destroy();
                redirect('banhang');
            }else{
            $data['user'] = $login_user;
            $this->load->view('fontend_bh/banhang',$data);
            }
        }else{
        $this->load->view('fontend_bh/login');
        }
    }

    function login(){
        $login_user = $this->session->userdata('session_user');
        if(isset($login_user)){
            redirect('banhang');
            die();
        }
        $account = $this->input->post('account');
        $password = $this->input->post('password');
        if(isset($account) && isset($password)){
            $data = array(
                'account' => $account,
                'password' => md5($password),
            );
            $login = $this->User_models->login($data);
            if($login == 1){
                $data['account'] = $account;
                $data['err'] = "Mật khẩu không chính xác";
                $this->load->view('fontend_bh/login',$data);
            }
            if($login == 2){
                $err['err'] = "Tài khoản chưa được đăng kí";
                $this->load->view('fontend_bh/login',$err);
            }
            if($login == 0){
                $session_data = array(
                    'session_user' => $account,
                    'time_out_login' => time(),
                );
                $this->session->set_userdata($session_data);
                redirect('banhang');
            }
        }else{
            $this->load->view('fontend_bh/login');
        }
    }
    function logout(){
        $this->session->sess_destroy();
        redirect('banhang');
    }
}
?>