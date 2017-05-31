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
                }else{
                    $cart = $this->cart->contents();
                    $user = $this->User_models->getinfo($login_user);
                    $address = $this->User_models->get_address_default($login_user);
                    if($user){
                        foreach($user as $row){
                            $data['user'] = $row->name;
                            $data['avatar'] = $row->img;
                        }
                    }
                    if($cart){
                        $data['cart'] = $cart;
                    }
                    if($address){
                        $data['address'] = $address;
                    }
                }
                $this->load->view('fontend/pay',$data);
            }
        }else{
            redirect('home');
        }
    }
    public function address(){
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
                    $err = "Phiên giao dịch của bạn đã hết hạn";
                    $this->session->set_flashdata('err', $err);
                    $this->cart->destroy();
                    redirect('cart');
                } else {
                    $user = $this->User_models->getinfo($login_user);
                    $address = $this->User_models->getaddress($login_user);
                    if($user){
                        foreach($user as $row){
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
                }
            }
        }
        else{
            redirect('home');
        }
        $this->load->view('fontend/address',$data);
    }
    public function add_address(){
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
                            redirect('pay/address');
                        }
                    }
                }
            }
        }else{
            redirect('home');
        }
        $this->load->view('fontend/add_address',$data);
    }
    public function add_new_address(){
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
                            redirect('pay/address');
                        }
                    }
                    if($user){
                        foreach($user as $row){
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
                                redirect('pay/address');
                            }
                        }
                    }else{
                        $err = "Vui lòng kiểm tra thông tin Tỉnh / Thành và Quận / Huyện";
                        $this->session->set_flashdata('err',$err);
                        redirect('pay/add_address');
                    }
                }
            }
        }else{
            redirect('home/login');
        }
        $this->load->view('fontend/add_address',$data);
    }
    public function select_address(){
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
                            redirect('pay/address');
                        }
                    }
                    if($user){
                        foreach($user as $row){
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
                            redirect('pay');
                        }
                    }
                }
            }
        }else{
            redirect('home/login');
        }
        $this->load->view('fontend/address',$data);
    }
    public function save()
    {
//        $data = array();
        $login_user = $this->session->userdata('session_user');
        $time_out = $this->session->userdata('time_out_login');
        $time_buy = $this->session->userdata('time_buy');
        if (isset($login_user)) {
            if (time() - $time_out >= 30000000000000000000000000) {
                $this->session->sess_destroy();
                redirect('home');
            } else {
                if (time() - $time_buy >= 1000000000000000000000) {
                    $err = "Phiên giao dịch của bạn đã hết hạn";
                    $this->session->set_flashdata('err', $err);
                    $this->cart->destroy();
                    redirect('cart');
                } else {
                    $address = $this->User_models->get_address_default($login_user);
                    if($address){
                        foreach ($address as $dc){}
                    }
                    $data_district = $this->Home_models->getinfo('tb_district','id_district',$dc->id_district);
                    if($data_district){
                        foreach ($data_district as $distr){}
                    }
                    $data_city = $this->Home_models->getinfo('tb_city','id_city',$dc->id_city);
                    if($data_city){
                        foreach ($data_city as $tp){}
                    }
                    $note = $this->input->post('note');
                    if(isset($note)){
                        $data_note = $note;
                    }else $data_note = "";
                    $data_cart = $this->cart->contents();
                    if($data_cart){
                        $money = 0;
                        foreach($data_cart as $cart){
                            $money+=$cart['subtotal'];
                        }
                    }
                    $add_invoice = array(
                        'id_user'=>$login_user,
                        'name'=>$dc->name,
                        'phone'=>$dc->phone,
                        'address'=>$dc->address,
                        'district'=>$distr->district,
                        'city'=>$tp->city,
                        'note'=>$data_note,
                        'money'=>$money,
                        'note' => $note,
                        'active'=>0,
                    );
                    $add_invoice = $this->User_models->add_invoice($add_invoice);
                    if($add_invoice!=false){
                        foreach ($add_invoice as $data_invoice){};
                        $id_invoice = $data_invoice->id_invoice;
                        $data_cart = $this->cart->contents();
                        if($data_cart){
                            foreach ($data_cart as $cart){
                                $id_user  = $cart['id_user'];
                                $id_product  =$cart['id'];
                                $name_product = $cart['name'];
                                $qty = $cart['qty'];
                                $price = $cart['price'];
                                $subtotal = $cart['subtotal'];
                                $data_invoice_detail = array(
                                    'id_user' => $id_user,
                                    'id_invoice'=>$id_invoice,
                                    'id_product'=>$id_product,
                                    'name'=>$name_product,
                                    'qty'=>$qty,
                                    'price' => $price,
                                    'subtotal' => $subtotal,
                                    'active' => '0',
                                );
                                $add_invoice_detail = $this->User_models->add_invoice_detail($data_invoice_detail);
                            }

                        }
                        redirect('home');
                    }
                }
            }
        }
    }
}
?>