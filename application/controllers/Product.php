<?php 
class product extends CI_Controller{
    public function index(){
        $login_user = $this->session->userdata('session_user');
        $time_out = $this->session->userdata('time_out_login');
        if(isset($login_user)){
            if(time() - $time_out >=30000000000000){
                $this->session->sess_destroy();
                redirect('banhang');
            }else{
            $data['user'] = $login_user;
            $this->load->view('fontend_bh/product',$data);
            }
        }else{
        redirect('banhang');
        }
    }
    function add_product(){
        $login_user = $this->session->userdata('session_user');
        $data['user'] = $login_user;
        if(!isset($login_user)){
            redirect('banhang');
            die();
        }else{
            $this->load->view('fontend_bh/add_product',$data);
        }
        
    }
}

?>