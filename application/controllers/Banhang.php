<?php 
class Banhang extends CI_Controller{
    function index(){
        $data = array();
        $login_user = $this->session->userdata('session_user');
        $time_out = $this->session->userdata('time_out_login');
        if(isset($login_user)){
            if(time() - $time_out >=30000000000000){
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
                $number_invoice = $this->Invoice_models->get_sale_invoice($login_user);
                if($number_invoice){
                    $data_number_invoice = count($number_invoice);
                }else $data_number_invoice = 0;
                $data['number_invoice'] = $data_number_invoice;
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