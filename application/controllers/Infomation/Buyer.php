<?php
class buyer extends CI_Controller{
    public function index(){
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
                $invoice = $this->Invoice_models->get_buyer($login_user,'0');
                if($invoice){
                    $data['invoice'] = $invoice;
                }
                $this->load->view('fontend/user',$data);
            }
        }else{
            redirect('home');
        }
    }
    public function active($active){
        $data = array();
        $login_user = $this->session->userdata('session_user');
        $time_out = $this->session->userdata('time_out_login');
        $count = $this->session->userdata('count');
        if(isset($count)){
            $data['count'] = $count;
        }else $data['count'] = 0;
        // $err = $this->session->flashdata('err');
        // if(isset($err)){
        //     $data['err'] = $err;
        // }
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
                $invoice = $this->Invoice_models->get_buyer($login_user,$active);
                if($invoice){
                    $data['active'] = $active;
                    $data['invoice'] = $invoice;
                }
                $this->load->view('fontend/user',$data);
            }
        }else{
            redirect('home');
        }
    }
    public function remove_invoice($id_detail){
        $data = array();
        $login_user = $this->session->userdata('session_user');
        $time_out = $this->session->userdata('time_out_login');
        $count = $this->session->userdata('count');
        if(isset($count)){
            $data['count'] = $count;
        }else $data['count'] = 0;
        // $err = $this->session->flashdata('err');
        // if(isset($err)){
        //     $data['err'] = $err;
        // }
        $set_time = $this->Home_models->get('tb_set_timeout');
        foreach($set_time as $st){};
        $set_time_buy = $st->time_buy;
        $set_time_login = $st->time_login;
        if(isset($login_user)){
            if(time() - $time_out >=$set_time_login){
                $this->session->sess_destroy();
                redirect('home');
            }else{
                $invoice_detail = $this->Home_models->getinfo('tb_invoice_detail','id_detail',$id_detail);
                if($invoice_detail){
                    foreach ($invoice_detail as $cthd) {};
                    $id_invoice = $cthd->id_invoice;
                    $id_user = $cthd->id_user;
                    if($cthd->active != '0'){
                        $err = "Thao tác vừa rồi không được hệ thống xử lý!";
                        $this->session->set_flashdata('err',$err);
                        redirect('infomation/buyer');
                    }
                }else{
                    $err = "Thao tác vừa rồi không được hệ thống xử lý!";
                    $this->session->set_flashdata('err',$err);
                    redirect('infomation/buyer');
                }
                $invoice = $this->Home_models->getinfo('tb_invoice','id_invoice',$id_invoice);
                if($invoice){
                    foreach ($invoice as $value) {};
                    $id_buyer = $value->id_user;
                    $buyer = $this->Home_models->getinfo('tb_user','id_user',$id_buyer);
                    if($buyer){
                        foreach ($buyer as $bb) {};
                        $buy = $bb->name;
                    };
                    $shipping_code = $value->shipping_code;
                }else{
                    $err = "Thao tác vừa rồi không được hệ thống xử lý!";
                    $this->session->set_flashdata('err',$err);
                    redirect('infomation/buyer');
                }
                if($id_buyer != $login_user){
                    $err = "Thao tác vừa rồi không được hệ thống xử lý!";
                    $this->session->set_flashdata('err',$err);
                    redirect('infomation/buyer');
                }
                $delete = array(
                    'id_invoice' => $id_invoice,
                    'active' => '4'
                    );
                $delete = $this->Invoice_models->ban_invoice($id_detail,$delete);
                if($delete){
                    $content = '<a href="'.base_url().'/sale/invoice/view/'.$shipping_code.'">Đơn hàng <b>'.$shipping_code.'</b> đã bị  hủy bởi tài khoản '.$buy.'</a>';
                        $add_notification = array(
                            'id_user' => $cthd->id_user,
                            'content' => $content,
                            'oop' => '1',
                            );
                        $this->Home_models->add_notification($add_notification);
                        $product = $this->Product_models->getinfo($cthd->id_product);
                        if($product){
                            foreach ($product as $key) {};
                            $soluong = $key->number + $cthd->qty;
                            $data_update_product = array(
                                'number' => $soluong,
                                );
                            $update_num = $this->Product_models->update($cthd->id_product,$data_update_product);
                        }else{
                            $data_add_product = array(
                                'id_product' => $cthd->id_product,
                                'id_user' => $cthd->id_user,
                                'name' => $cthd->name,
                                'img' => $cthd->img,
                                'id_catalog' => '11',
                                'price' => $cthd->price,
                                'number'=>$cthd->qty,
                                'id_status' => '1',
                                'active' => '1',
                            );
                            $add = $this->Product_models->add($data_add_product);
                        }
                redirect('infomation/buyer');
                }
            }
        }else{
            redirect('home');
        }
    }
}
?>