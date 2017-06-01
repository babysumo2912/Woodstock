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
        if(isset($login_user)){
            if(time() - $time_out >=30000000000000){
                $this->session->sess_destroy();
                redirect('home');
            }else{
                if(time() - $time_buy >= 10000000000000000000){
                    $this->session->unset_userdata('count');
                    $cart = $this->cart->contents();
                    if(isset($cart)){
                        foreach($cart as $row){
                            $id_product = $row['id'];
                            $number = $row['qty'];
                            $data_product = $this->Product_models->getinfo($id_product);
                            if($data_product){
                                foreach ($data_product as $item){};
                                $number_old = $item->number += $number;
                                $data_number_old = array('number'=>$number_old);
                                $this->Product_models->update($id_product,$data_number_old);
                            }else{
                                $add_product = array(
                                    'id_user' => $row['id_user'],
                                    'name' => $row['name'],
                                    'img' => $row['img'],
                                    'discribe' => $row['discribe'],
                                    'id_catalog' => $row['id_catalog'],
                                    'price' => $row['price'],
                                    'id_status' => $row['id_status'],
                                    'number' => $row['qty'],
                                    'like' => 0,
                                    'active' => 1,
                                );
                                $this->Product_models->add($add_product);
                            }
                        }
                    }
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