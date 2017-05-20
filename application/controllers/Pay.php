<?php
class pay extends CI_Controller{
    public function index(){
        $data = array();
        $login_user = $this->session->userdata('session_user');
        $time_out = $this->session->userdata('time_out_login');
        $time_buy = $this->session->userdata('time_buy');
        if(isset($login_user)){
            if(time() - $time_out >=30000000000000000000000000){
                $this->session->sess_destroy();
                redirect('home');
            }else{
                if(time() - $time_buy >= 1000000000000000000000){
                    $err = "Phiên giao dịch của bạn đã hết hạn";
                    $this->session->set_flashdata('err',$err);
                    $this->cart->destroy();
                    redirect('cart');
                }
                $user = $this->User_models->getinfo($login_user);
                if($user){
                    foreach($user as $row){
                        $data['user'] = $row->name;
                        $data['avatar'] = $row->img;
                    }
                }
                $this->load->view('fontend/pay',$data);
            }
        }else{
            redirect('home');
        }
    }
}
?>