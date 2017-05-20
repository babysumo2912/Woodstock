<?php
class Cart extends CI_Controller{
    public function index(){
        $data['money'] = 0;
        $login_user = $this->session->userdata('session_user');
        $time_out = $this->session->userdata('time_out_login');
        $err = $this->session->flashdata('err');
        if(isset($err)){
            $data['err'] = $err;
        }
        $cart = $this->cart->contents();
        $data['cart'] = $cart;
        foreach ($cart as $row){
            $data['money'] += $row['subtotal'];
        }
        if(isset($login_user)){
            if(time() - $time_out >=30000000000000){
                $this->session->sess_destroy();
                redirect('home');
            }else{

                $user = $this->User_models->getinfo($login_user);
                if($user){
                    foreach($user as $row){
                        $data['user'] = $row->name;
                        $data['avatar'] = $row->img;
                    }
                }
                $this->load->view('fontend/cart',$data);
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
        $data = array(
            'rowid' => $rowid,
            'qty' => 0
        );
        $this->cart->update($data);
        redirect('cart');
    }
    function delete_all(){
        $this->cart->destroy();
        redirect('cart');
    }
}
?>