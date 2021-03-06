<?php
class Cart extends CI_Controller{
    public function index(){
        $count = $this->session->userdata('count');
        if(isset($count)){
            $data['count'] = $count;
        }else $data['count'] = 0;
        $data['money'] = 0;
        $login_user = $this->session->userdata('session_user');
        $time_out = $this->session->userdata('time_out_login');
        $err = $this->session->flashdata('err');
        $time_buy = $this->session->userdata('time_buy');
        if(isset($err)){
            $data['err'] = $err;
        }
        $cart = $this->cart->contents();
        $data['cart'] = $cart;
        foreach ($cart as $row){
            $data['money'] += $row['subtotal'];
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
                if(time() - $time_buy >= $set_time_buy){
                    $this->session->unset_userdata('count');
                    $err = "Phiên giao dịch của bạn đã hết hạn";
                    $this->session->set_flashdata('err',$err);
                    $this->cart->destroy();
                    redirect('home');
                }else{

                $user = $this->User_models->getinfo($login_user);
                if($user){
                    foreach($user as $row){
                        $data['id_user'] = $row->id_user;
                        $data['user'] = $row->name;
                        $data['avatar'] = $row->img;
                    }
                }
                $number_noti = $this->Home_models->get_noti($login_user,'2');
                if($number_noti){
                    $data['number_noti'] = count($number_noti);
                }else $data['number_noti'] = 0;
                $this->load->view('fontend/cart',$data);

                }
            }
        }else{
            redirect('home/login/0');
        }
    }
    public function update()
    {
        $cart_info = $_POST['cart'] ;
        foreach( $cart_info as $id => $cart)
        {
            $rowid = $cart['rowid'];
            // $name = $cart['name'];
            $price = $cart['price'];
            $amount = $price * $cart['qty'];
            $qty = $cart['qty'];
            $data = array(
                'rowid' => $rowid,
                'price' => $price,
                'amount' => $amount,
                'qty' => $qty
            );
            $this->cart->update($data);
        }
        redirect('cart');
    }
    function delete($rowid){
        $cart = $this->cart->get_item($rowid);
        $count = $this->session->userdata('count') - $cart['qty'];
        $this->session->set_userdata('count',$count);
        $data = array(
            'rowid' => $rowid,
            'qty' => 0
        );
        $this->cart->update($data);
        redirect('cart');
    }
    function delete_all(){
        $this->session->unset_userdata('count');
        $this->cart->destroy();
        redirect('cart');
    }
}
?>