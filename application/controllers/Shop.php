<?php 
/**
*  
*/
class Shop extends CI_Controller
{
	
	public function view($id_user){
		$data = array();
        $login_user = $this->session->userdata('session_user');
        $time_out = $this->session->userdata('time_out_login');
        if(isset($login_user)){
            if(time() - $time_out >=30000000000000){
                $this->session->sess_destroy();
                redirect('banhang');
            }else{
                $user = $this->User_models->getinfo($id_user);
                if($user){
                    $data['account'] = $user;
                    foreach($user as $row){
                        $data['id_user'] = $row->id_user;
                        $data['user'] = $row->name;
                        $data['avatar'] = $row->img;
                    }
                }else{
                $data['err']="Không tìm thấy dữ liệu";
                    }
         	$product = $this->Product_models->get_home($id_user);
            if($product != false){
            	$number_product = 0;
            	foreach ($product as $key) {
            		$number_product+=$key->number;
            	}
            	$data['number_product'] = $number_product;
                $data['product'] = $product;
            }
            $this->load->view('fontend/shop',$data);
            }
        }else{
         	redirect('banhang');
        }
	}
}

 ?>