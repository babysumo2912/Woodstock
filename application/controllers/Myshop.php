<?php 
/**
* 
*/
class Myshop extends CI_Controller
{
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
                    $data['account'] = $user;
                    foreach($user as $row){
                        $data['id_user'] = $row->id_user;
                        $data['user'] = $row->name;
                        $data['avatar'] = $row->img;
                    }
                    $address = $this->User_models->get_address_default($login_user);
                    if($address){
                        $data['address'] = $address;
                    }
                }
                
                $this->load->view('fontend_bh/myshop',$data);
            }
        }else{
         	redirect('banhang');
        }
	}
	function add_infomation(){
        $data = array();
        $login_user = $this->session->userdata('session_user');
        $time_out = $this->session->userdata('time_out_login');
        if(isset($login_user)){
            if(time() - $time_out >=30000000000000){
                $this->session->sess_destroy();
                redirect('banhang');
            }else{
	        	$data_user = $this->User_models->getinfo($login_user);
	        	if($data_user){
	        		$name = $this->input->post('name');
	        		$discribe = $this->input->post('content');
	        		if(isset($name) && isset($discribe) && isset($_FILES['userfile']['name'])){
		        		$config['upload_path'] = './public/img/user/avatar';
			            $config['allowed_types'] = 'gif|png|jpg|jpeg';
			            $this->load->library('upload',$config);
			            if($this->upload->do_upload()) {
			                $data['upload'] = $this->upload->data();
			                $file_name = $data['upload']['file_name'];
			                $update = array(
			                'name' => $name,
			                'img' => $file_name,
			                'discribe' => nl2br($discribe),
			                );
			                $add_pro = $this->User_models->update($login_user,$update);
			            }else{
			            	$update = array(
			                'name' => $name,
			                'discribe' => nl2br($discribe),
			                );
			                $add_pro = $this->User_models->update($login_user,$update);
			            }
		        	}
	        	redirect('myshop');
		        }
        	}
        }else{
        $this->load->view('fontend_bh/login');
        }
    }
    public function address(){
        $count = $this->session->userdata('count');
        if(isset($count)){
            $data['count'] = $count;
        }else $data['count'] = 0;
        $data = array();
        $login_user = $this->session->userdata('session_user');
        $time_out = $this->session->userdata('time_out_login');
        $time_buy = $this->session->userdata('time_buy');
        if(isset($login_user)) {
            if (time() - $time_out >= 30000000000000000000000000) {
                $this->session->sess_destroy();
                redirect('home');
            } else {
                if (time() - $time_buy >= 200000000000000000) {
                    $this->session->unset_userdata('count');
                    $err = "Phiên giao dịch của bạn đã hết hạn";
                    $this->session->set_flashdata('err', $err);
                    $this->cart->destroy();
                    redirect('cart');
                } else {
                    $user = $this->User_models->getinfo($login_user);
                    $address = $this->User_models->getaddress($login_user);
                    if($user){
                        foreach($user as $row){
                            $data['id_user'] = $row->id_user;
                            $data['user'] = $row->name;
                            $data['avatar'] = $row->img;
                        }
                    }
                    if($address){
                        $data['address'] = $address;
                    }
                    $max_num = $this->User_models->get_max_num_address($login_user);
                    if($max_num){
                       $data['max_num'] = $max_num;
                    }
                    $data['active'] = 1;
                }
            }
        } else{
            redirect('home');
        }
        $this->load->view('fontend_bh/address',$data);
    }
    public function select_address(){
        $count = $this->session->userdata('count');
        if(isset($count)){
            $data['count'] = $count;
        }else $data['count'] = 0;
        $data = array();
        $login_user = $this->session->userdata('session_user');
        $time_out = $this->session->userdata('time_out_login');
        $time_buy = $this->session->userdata('time_buy');
        if(isset($login_user)) {
            if (time() - $time_out >= 30000000000000000000000000) {
                $this->session->sess_destroy();
                redirect('home');
            } else {
                if (time() - $time_buy >= 1000000000000000000000) {
                    $this->session->unset_userdata('count');
                    $err = "Phiên giao dịch của bạn đã hết hạn";
                    $this->session->set_flashdata('err', $err);
                    $this->cart->destroy();
                    redirect('cart');
                } else {
                    $user = $this->User_models->getinfo($login_user);
                    $address = $this->User_models->getaddress($login_user);
                    $city_data = $this->Home_models->get('tb_city');
                    $district_data = $this->Home_models->get('tb_district');
                    $max_num = $this->User_models->get_max_num_address($login_user);
                    if($max_num){
                        if($max_num >= 5){
                            $data['err'] = "Bạn chỉ có thể tạo 5 địa chỉ nhận hàng, cảm ơn!";
                            redirect('myshop/address');
                        }
                    }
                    if($user){
                        foreach($user as $row){
                            $data['id_user'] = $row->id_user;
                            $data['user'] = $row->name;
                            $data['avatar'] = $row->img;
                        }
                    }
                    if($address){
                        $data['address'] = $address;
                    }
                    if($city_data){
                        $data['city'] = $city_data;
                    }
                    if($district_data){
                        $data['district'] = $district_data;
                    }
                    $update = array('default'=>'0');
                    $default = $this->User_models->default_address($login_user,$update);
                    if($default){
                        $id_infomation =  $this->input->post('address');
                        $checked = array(
                            'default' => '1',
                        );
                        $check = $this->User_models->checked_address($login_user,$id_infomation,$checked);
                        if($check){
                            redirect('myshop');
                        }
                    }
                }
            }
        }else{
            redirect('home/login');
        }
        $this->load->view('fontend_bh/address',$data);
    }
    public function add_address(){
        $count = $this->session->userdata('count');
        if(isset($count)){
            $data['count'] = $count;
        }else $data['count'] = 0;
        $data = array();
        $err = $this->session->flashdata('err');
        if(isset($err)){
            $data['err'] = $err;
        }
        $login_user = $this->session->userdata('session_user');
        $time_out = $this->session->userdata('time_out_login');
        $time_buy = $this->session->userdata('time_buy');
        if(isset($login_user)) {
            if (time() - $time_out >= 30000000000000000000000000) {
                $this->session->sess_destroy();
                redirect('home');
            } else {
                if (time() - $time_buy >= 1000000000000000000000) {
                    $this->session->unset_userdata('count');
                    $err = "Phiên giao dịch của bạn đã hết hạn";
                    $this->session->set_flashdata('err', $err);
                    $this->cart->destroy();
                    redirect('cart');
                } else {
                    $user = $this->User_models->getinfo($login_user);
                    $address = $this->User_models->getaddress($login_user);
                    $city_data = $this->Home_models->get('tb_city');
                    $district_data = $this->Home_models->get('tb_district');
                    if($user){
                        foreach($user as $row){
                            $data['id_user'] = $row->id_user;
                            $data['user'] = $row->name;
                            $data['avatar'] = $row->img;
                        }
                    }
                    if($address){
                        $data['address'] = $address;
                    }
                    if($city_data){
                        $data['city'] = $city_data;
                    }
                    if($district_data){
                        $data['district'] = $district_data;
                    }
                    if($address){
                        $data['address'] = $address;
                    }
                    $max_num = $this->User_models->get_max_num_address($login_user);
                    if($max_num){
                        if($max_num >= 5){
                            $data['err'] = "Bạn chỉ có thể tạo 5 địa chỉ nhận hàng, cảm ơn!";
                            redirect('myshop/address');
                        }
                    }
                }
            }
        }else{
            redirect('home');
        }
        $this->load->view('fontend_bh/add_address',$data);
    }
    public function add_new_address(){
        $count = $this->session->userdata('count');
        if(isset($count)){
            $data['count'] = $count;
        }else $data['count'] = 0;
        $data = array();
        $login_user = $this->session->userdata('session_user');
        $time_out = $this->session->userdata('time_out_login');
        $time_buy = $this->session->userdata('time_buy');
        if(isset($login_user)) {
            if (time() - $time_out >= 30000000000000000000000000) {
                $this->session->sess_destroy();
                redirect('home');
            } else {
                if (time() - $time_buy >= 1000000000000000000000) {
                    $this->session->unset_userdata('count');
                    $err = "Phiên giao dịch của bạn đã hết hạn";
                    $this->session->set_flashdata('err', $err);
                    $this->cart->destroy();
                    redirect('cart');
                } else {
                    $user = $this->User_models->getinfo($login_user);
                    $address = $this->User_models->getaddress($login_user);
                    $city_data = $this->Home_models->get('tb_city');
                    $district_data = $this->Home_models->get('tb_district');
                    $max_num = $this->User_models->get_max_num_address($login_user);
                    if($max_num){
                        if($max_num >= 5){
                            $data['err'] = "Bạn chỉ có thể tạo 5 địa chỉ nhận hàng, cảm ơn!";
                            redirect('myshop/address');
                        }
                    }
                    if($user){
                        foreach($user as $row){
                            $data['id_user'] = $row->id_user;
                            $data['user'] = $row->name;
                            $data['avatar'] = $row->img;
                        }
                    }
                    if($address){
                        $data['address'] = $address;
                    }
                    if($city_data){
                        $data['city'] = $city_data;
                    }
                    if($district_data){
                        $data['district'] = $district_data;
                    }
                    $name = $this->input->post('name');
                    $phone = $this->input->post('phone');
                    $city = $this->input->post('city');
                    $district = $this->input->post('district');
                    $address = $this->input->post('address');
                    if(isset($name)
                        && isset($phone)
                        &&isset($address)
                        && $city!="0"
                        && $district!="0"
                    ){
                        $update = array('default'=>'0');
                        $default = $this->User_models->default_address($login_user,$update);
                        if($default){
                            $add_address = array(
                                'id_user'=>$login_user,
                                'name'=>$name,
                                'phone'=>$phone,
                                'address'=>$address,
                                'id_district'=>$district,
                                'id_city'=>$city,
                                'default'=>'1',
                            );
                            $add_address = $this->User_models->add_address($add_address);
                            if($add_address){
                                redirect('myshop/address');
                            }
                        }
                    }else{
                        $err = "Vui lòng kiểm tra thông tin Tỉnh / Thành và Quận / Huyện";
                        $this->session->set_flashdata('err',$err);
                        redirect('myshop/add_address');
                    }
                }
            }
        }else{
            redirect('home/login');
        }
        $this->load->view('fontend_bh/add_address',$data);
    }
}

 ?>