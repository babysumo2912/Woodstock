<?php 
/**
*  
*/
class Shop extends CI_Controller
{
	
	public function view($id_user){
		$data = array();
        $user1 = $this->User_models->getinfo($id_user);
        if($user1){
            $data['account'] = $user1;
            foreach($user1 as $row){
                $data['id_user'] = $row->id_user;
                $data['user1'] = $row->name;
                $data['avatar1'] = $row->img;
            }
        }else{
        $data['err']="Không tìm thấy dữ liệu";
            }
     	$product = $this->Product_models->get_home($id_user);
        if($product != false){
        	$number_product = 0;
        	$number_product = count($product);
        	$data['number_product'] = $number_product;
            $data['product'] = $product;
        }
        $login_user = $this->session->userdata('session_user');
        $time_out = $this->session->userdata('time_out_login');
        $set_time = $this->Home_models->get('tb_set_timeout');
        foreach($set_time as $st){};
        $set_time_buy = $st->time_buy;
        $set_time_login = $st->time_login;
        if(isset($login_user)){
            if(time() - $time_out >=$set_time_login){
                $this->session->sess_destroy();
                redirect('home');
            }else{
                $number_noti = $this->Home_models->get_noti($login_user,'2');
                if($number_noti){
                    $data['number_noti'] = count($number_noti);
                }else $data['number_noti'] = 0;
                $user = $this->User_models->getinfo($login_user);
                if($user){
                    foreach($user as $row){
                        $data['user'] = $row->name;
                        $data['avatar'] = $row->img;
                    }
                }
            }
        }
        $this->load->view('fontend/shop',$data);
        
   }
   public function order_by($order_by,$desc,$id_user){
        $data = array();
        $user1 = $this->User_models->getinfo($id_user);
        if($user1){
            $data['account'] = $user1;
            foreach($user1 as $row){
                $data['id_user'] = $row->id_user;
                $data['user1'] = $row->name;
                $data['avatar1'] = $row->img;
            }
        }else{
        $data['err']="Không tìm thấy dữ liệu";
            }
        $product = $this->Product_models->get_shop_pro($id_user,$order_by,$desc);
        if($product != false){
            $number_product = 0;
            $number_product = count($product);
            $data['number_product'] = $number_product;
            $data['product'] = $product;
        }
        $login_user = $this->session->userdata('session_user');
        $time_out = $this->session->userdata('time_out_login');
        $set_time = $this->Home_models->get('tb_set_timeout');
        foreach($set_time as $st){};
        $set_time_buy = $st->time_buy;
        $set_time_login = $st->time_login;
        if(isset($login_user)){
            if(time() - $time_out >=$set_time_login){
                $this->session->sess_destroy();
                redirect('home');
            }else{
                $number_noti = $this->Home_models->get_noti($login_user,'2');
                if($number_noti){
                    $data['number_noti'] = count($number_noti);
                }else $data['number_noti'] = 0;
                $user = $this->User_models->getinfo($login_user);
                if($user){
                    foreach($user as $row){
                        $data['user'] = $row->name;
                        $data['avatar'] = $row->img;
                    }
                }
            }
        }
        $this->load->view('fontend/shop',$data);
        
   }
}

 ?>