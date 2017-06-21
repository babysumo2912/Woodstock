<?php 
class Banhang extends CI_Controller{ 
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
                $number_invoice = $this->Invoice_models->get_sale_invoice($login_user,'0');
                if($number_invoice){
                    $data_number = 0;
                    $data['invoice'] = $number_invoice;
                    foreach ($number_invoice as $nbi){
                        $data_number_invoice = $this->Invoice_models->get_invoice_sale($nbi->id_invoice,'0');
                        if($data_number_invoice){
                            $data_number ++;
                        }
                    }
                }else $data_number = 0;
                $data['number_invoice'] = $data_number;
                $number_noti = $this->Home_models->get_noti($login_user,'1');
                if($number_noti){
                    $data['number_noti'] = count($number_noti);
                }else $data['number_noti'] = 0;
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
                $check = array(
                    'account' => $account,
                );
                $get = $this->User_models->get($check);
                if($get!=false){
                    foreach ($get as $row){
                        $account = $row->id_user;
                        $session_data = array(
                            'session_user' => $account,
                            'time_out_login' => time(),
                        );
                        $this->session->set_userdata($session_data);
                    redirect('banhang');
                    }
                }
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