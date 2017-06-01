<?php
class buyer extends CI_Controller{
    public function index(){
        $data = array();
        $login_user = $this->session->userdata('session_user');
        $time_out = $this->session->userdata('time_out_login');
        $count = $this->session->userdata('count');
        if(isset($count)){
            $data['count'] = $count;
        }else $data['count'] = 0;
        $err = $this->session->flashdata('err');
        if(isset($err)){
            $data['err'] = $err;
        }
        if(isset($login_user)){
            if(time() - $time_out >=30000000000000000000000000){
                $this->session->sess_destroy();
                redirect('home');
            }else{
                $user = $this->User_models->getinfo($login_user);
                if($user){
                    $data['account'] = $user;
                    foreach($user as $row){
                        $data['id_user'] = $row->id_user;
                        $data['user'] = $row->name;
                        $data['avatar'] = $row->img;
                    }
                }
                $this->load->view('fontend/user',$data);
            }
        }else{
            $this->load->view('fontend/user',$data);
        }
    }
}

?>