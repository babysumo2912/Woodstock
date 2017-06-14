<?php 
/**
* 
*/
class revenue extends CI_Controller
{
	
	function index(){
		$data = array();
        $login_user = $this->session->userdata('session_user');
        $time_out = $this->session->userdata('time_out_login');
        $err = $this->session->flashdata('err_hoadon');
        if(isset($err)){
        	$data['err_hoadon'] = $err;
        }
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
                $product_last = $this->Product_models->buy_max($login_user);
                if($product_last){
                	$data['product_last'] = $product_last;
                }
                $product_ban = $this->Product_models->product_ban($login_user);
                if($product_ban){
                	$data['product_ban'] = $product_ban;
                }
                $datamoney = $this->Invoice_models->get_money($login_user);
                if($datamoney){
                	$money = 0;
                	foreach ($datamoney as $key) {
                		$money+=$key->subtotal;
                	}
                }else $money = 0;
                $data['money'] = $money;
                $this->load->view('fontend_bh/revenue',$data);
            }
        }else{
            $this->load->view('fontend_bh/login');
        }
	}
	function hoadon(){
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
                $day_begin = $this->input->post('begin');
                $day_end = $this->input->post('end');
                if(isset($day_begin) && isset($day_end)){
                	if($day_end < $day_begin){
                		$err = "Ngày kết thúc phải lớn hơn ngày bắt đầu";
                		$this->session->set_flashdata('err_hoadon',$err);

                	}
                }
                redirect('sale/revenue');
                // $this->load->view('fontend_bh/revenue',$data);
            }
        }else{
            $this->load->view('fontend_bh/login');
        }
	}
}

 ?>