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
        $err_list_hoadon = $this->session->flashdata('err_list_hoadon');
        if(isset($err_list_hoadon)){
        	$data['err_list_hoadon'] = $err_list_hoadon;
        }
        $err = $this->session->flashdata('err_hoadon');
        if(isset($err)){
        	$data['err_hoadon'] = $err;
        }
        $day_begin = $this->session->flashdata('day_begin');
        if(isset($day_begin)){
        	$data['day_begin'] = $day_begin;
        }
        $day_end = $this->session->flashdata('day_end');
        if(isset($day_end)){
        	$data['day_end'] = $day_end;
        }
        $get_all = $this->session->flashdata('get_all');
        if(isset($get_all)){
        	$data['all_invoice'] = $get_all;
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

                	}else{
                		$get_all = $this->Invoice_models->get_invoice_all($login_user,'all');
                		if($get_all){
                			$flash_session = array(
                				'day_begin' => $day_begin,
                				'day_end' => $day_end,
                				'get_all' => $get_all,
                				);
                			$this->session->set_flashdata($flash_session);
                		}else{
                			$err_list_hoadon = "Không tìm thấy hóa đơn của bạn trong CSDL!";
							$this->session->set_flashdata('err_list_hoadon',$err_list_hoadon);                			
                		}																										
                	}
                }
                redirect('sale/revenue');
                // $this->load->view('fontend_bh/revenue',$data);
            }
        }else{
            $this->load->view('fontend_bh/login');
        }
	}
	function report($day_begin,$day_end){
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
                	$address = $this->User_models->get_address_default($login_user);
                	if($address){
                		foreach ($address as $add ) {
            				$data['address'] = $add->address;
	            			$district = $this->Home_models->getinfo('tb_district','id_district',$add->id_district);
	                        $city = $this->Home_models->getinfo('tb_city','id_city',$add->id_city);
	                        if($district){
	                            foreach ($district as $dtr){
	                            	$data['district'] = $dtr->district;
	                            };
	                        }
	                        if($city){
	                            foreach ($city as $tp){
	                            	$data['city'] = $tp->city;
	                            };
	                        }
                		}
                	}
                    foreach($user as $row){
                        $data['user'] = $row->name;
                        $data['avatar'] = $row->img;
                    }
                }
                $get_all = $this->Invoice_models->get_invoice_all($login_user,'all');
        		if($get_all){
        			$data['all_invoice'] = $get_all;
        			$data['day_begin'] = $day_begin;
        			$data['day_end'] = $day_end;
        			
        		}
                $this->load->library('Pdf');
                $this->load->view('fontend_bh/report',$data);
                // $this->load->view('fontend_bh/revenue',$data);
            }
        }else{
            $this->load->view('fontend_bh/login');
        }
	}
}

 ?>