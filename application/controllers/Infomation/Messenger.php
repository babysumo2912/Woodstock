<?php 
/**
* 
*/
class Messenger extends CI_Controller
{
	
	function index(){
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
        $set_time = $this->Home_models->get('tb_set_timeout');
        foreach($set_time as $st){};
        $set_time_buy = $st->time_buy;
        $set_time_login = $st->time_login;
        if(isset($login_user)){
            if(time() - $time_out >=$set_time_login){
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
                $messenger = $this->User_models->messenger_idroom($login_user,'0');
                if($messenger){
                    $data['messenger'] = $messenger;
                }
                $this->load->view('fontend/messenger',$data);
            }
        }else{
            redirect('home');
        }
	}
    function room ($id_room){
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
        $set_time = $this->Home_models->get('tb_set_timeout');
        foreach($set_time as $st){};
        $set_time_buy = $st->time_buy;
        $set_time_login = $st->time_login;
        if(isset($login_user)){
            if(time() - $time_out >=$set_time_login){
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
                $messenger = $this->User_models->messenger_idroom($login_user,'0');
                if($messenger){
                    $data['messenger'] = $messenger;
                }
                $content_mess = $this->Home_models->getinfo('tb_chat_content','id_room',$id_room);
                if($content_mess){
                    $data['content_mess'] = $content_mess;
                }
                $this->load->view('fontend/messenger',$data);
            }
        }else{
            redirect('home');
        }
    }

    function add ($id_room,$oop){
        $login_user = $this->session->userdata('session_user');
        $content = $this->input->POST('content');
        if(isset($login_user) && $content!=''){
            $content = htmlentities($content);
            $add_messenger =array(
                'id_room' => $id_room,
                'oop' => $oop,
                'content' => $content,
                'id_user' => $login_user,
                'active' => '0,'
                );
            $add = $this->User_models->add_messenger($add_messenger);
        }
        redirect('infomation/messenger/room/'.$id_room);

    }
}



?>