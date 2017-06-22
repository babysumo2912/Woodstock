<?php  
class product extends CI_Controller{
    public function index(){
        $number = 0;
        $data = array();
        $login_user = $this->session->userdata('session_user');
        $time_out = $this->session->userdata('time_out_login');
        $count = $this->session->userdata('count');
        $succ = $this->session->flashdata('succ');
        if($succ){
            $data['succ'] = $succ;
        }
        if(isset($count)){
            $data['count'] = $count;
        }else $data['count'] = 0;
        $set_time = $this->Home_models->get('tb_set_timeout');
        foreach($set_time as $st){};
        $set_time_buy = $st->time_buy;
        $set_time_login = $st->time_login;
        if(isset($login_user)){
            if(time() - $time_out >=$set_time_login){
                redirect('banhang');
            }else{
            $number_bicam = $this->Product_models->get_active($login_user,'2');
            if($number_bicam){
                $data['number_ban'] = count($number_bicam);
            }else $data['number_ban'] = 0;
            $number_hh = $this->Product_models->hethang($login_user);
            if($number_hh){
                $data['number_hh'] = count($number_hh);
            }else $data['number_hh'] = 0;
            $user = $this->User_models->getinfo($login_user);
                if($user){
                    foreach($user as $row){
                        $data['user'] = $row->name;
                        $data['avatar'] = $row->img;
                    }
                }
            $product = $this->Product_models->get($login_user);
            if($product != false){
                $data['product'] = $product;
                $number = count($product);

            }
            $data['active'] = 'all';
            $data['number'] = $number;
            $this->load->view('fontend_bh/product',$data);
            }
        }else{
        redirect('banhang');
        }
    }
    function active($active){
        $number = 0;
        $data = array();
        $login_user = $this->session->userdata('session_user');
        $time_out = $this->session->userdata('time_out_login');
        $count = $this->session->userdata('count');
        $succ = $this->session->flashdata('succ');
        if($succ){
            $data['succ'] = $succ;
        }
        if(isset($count)){
            $data['count'] = $count;
        }else $data['count'] = 0;
        $set_time = $this->Home_models->get('tb_set_timeout');
        foreach($set_time as $st){};
        $set_time_buy = $st->time_buy;
        $set_time_login = $st->time_login;
        if(isset($login_user)){
            if(time() - $time_out >=$set_time_login){
                $this->session->sess_destroy();
                redirect('banhang');
            }else{
            $number_bicam = $this->Product_models->get_active($login_user,'2');
            if($number_bicam){
                $data['number_ban'] = count($number_bicam);
            }else $data['number_ban'] = 0;
            $number_hh = $this->Product_models->hethang($login_user);
            if($number_hh){
                $data['number_hh'] = count($number_hh);
            }else $data['number_hh'] = 0;
            $user = $this->User_models->getinfo($login_user);
                if($user){
                    foreach($user as $row){
                        $data['user'] = $row->name;
                        $data['avatar'] = $row->img;
                    }
                }
            $product = $this->Product_models->get_active($login_user,$active);
            if($product != false){
                $data['product'] = $product;
                $number = count($product);

            }
            $data['number'] = $number;
            $data['active'] = $active;
            $this->load->view('fontend_bh/product',$data);
            }
        }else{
        redirect('banhang');
        }
    }
    function number(){
        $number = 0;
        $data = array();
        $login_user = $this->session->userdata('session_user');
        $time_out = $this->session->userdata('time_out_login');
        $count = $this->session->userdata('count');
        $succ = $this->session->flashdata('succ');
        if($succ){
            $data['succ'] = $succ;
        }
        if(isset($count)){
            $data['count'] = $count;
        }else $data['count'] = 0;
        $set_time = $this->Home_models->get('tb_set_timeout');
        foreach($set_time as $st){};
        $set_time_buy = $st->time_buy;
        $set_time_login = $st->time_login;
        if(isset($login_user)){
            if(time() - $time_out >=$set_time_login){
                $this->session->sess_destroy();
                redirect('banhang');
            }else{
            $number_bicam = $this->Product_models->get_active($login_user,'2');
            if($number_bicam){
                $data['number_ban'] = count($number_bicam);
            }else $data['number_ban'] = 0;
            $number_hh = $this->Product_models->hethang($login_user);
            if($number_hh){
                $data['number_hh'] = count($number_hh);
            }else $data['number_hh'] = 0;
            $user = $this->User_models->getinfo($login_user);
                if($user){
                    foreach($user as $row){
                        $data['user'] = $row->name;
                        $data['avatar'] = $row->img;
                    }
                }
            $product = $this->Product_models->hethang($login_user);
            if($product != false){
                $data['product'] = $product;
                $number = count($product);

            }
            $data['active'] = 'number';
            $data['number'] = $number;
            $this->load->view('fontend_bh/product',$data);
            }
        }else{
        redirect('banhang');
        }
    }
    function add_product(){
        $login_user = $this->session->userdata('session_user');
        $user = $this->User_models->getinfo($login_user);

        if($user){
            foreach($user as $row){
                $data['user'] = $row->name;
                $data['avatar'] = $row->img;
            }
        }
        if(!isset($login_user)){
            redirect('banhang');
            die();
        }
        $name = $this->input->post('name');
//        $img = $this->input->post('userfile');
        $discribe = $this->input->post('discribe');
        $id_catalog = $this->input->post('id_catalog');
        $price = $this->input->post('price');
        $number = $this->input->post('number');
        $id_status = $this->input->post('id_status');
//        echo $img; die();
        if(isset($name) && isset($discribe) && isset($id_catalog) && isset($price) && isset($number) && isset($id_status) && isset($_FILES['userfile']['name'])){
            $config['upload_path'] = './public/img/product/';
            $config['allowed_types'] = 'gif|png|jpg|jpeg';
            $this->load->library('upload',$config);
            if($this->upload->do_upload()) {
                $data['upload'] = $this->upload->data();
                $file_name = $data['upload']['file_name'];
                $add = array(
                'id_user' => $login_user,
                'name' => $name,
                'img' => $file_name,
                'discribe' => nl2br($discribe),
                'id_catalog' => $id_catalog,
                'price' =>  $price,
                'number' => $number,
                'id_status'   => $id_status,
                );
                $add_pro = $this->Product_models->add($add);
                if($add_pro){
                    redirect('product');
                }else{
                    $data['err']  = "Fail !";
                    $this->load->view('fontend_bh/add_product',$data);
                }
            }else{
                $data['err'] = $this->upload->display_errors();
                $this->load->view('addproduct', $data);
            }
        }else{
            $data['catalog'] = $this->Home_models->get('tb_catalog');
            $data['status_product'] = $this->Home_models->get('tb_status_product');
            $this->load->view('fontend_bh/add_product',$data);
        }
    }
    function update_product($id_product){
        $session_login = $this->session->userdata('session_user');
        $user = $this->User_models->getinfo($session_login);
        if($user){
            foreach($user as $row){
                $data['user'] = $row->name;
                $data['avatar'] = $row->img;
            }
        }
        if(!isset($session_login)){
            redirect('banhang');
        }
        $data['data_product'] = $this->Product_models->getinfo1($id_product,$session_login);
        if($data['data_product'] == false){
            $data['err'] = "Sản phẩm của bạn không được tìm thấy trong CSDL";
        };
        $data['catalog'] = $this->Home_models->get('tb_catalog');
        $data['status_product'] = $this->Home_models->get('tb_status_product');
        $this->load->view('fontend_bh/update',$data);
    }
    function delete($id_product){
        $session_login = $this->session->userdata('session_user');
        $user = $this->User_models->getinfo($session_login);
        if($user){
            foreach($user as $row){
                $data['user'] = $row->name;
                $data['avatar'] = $row->img;
            }
        }
        if(!isset($session_login)){
            redirect('banhang');
        }
        $data_delete = $this->Product_models->getinfo1($id_product,$session_login);
        if($data_delete== false){
            $data['err'] = "Sản phẩm của bạn không được tìm thấy trong CSDL";
        };
        if($data_delete){
            foreach ($data_delete as $key) {};
            $name_product = $key->name;
            $this->Product_models->delete_product($id_product);
            $succ = "Bạn vừa xóa thành công sản phẩm".$name_product;
            $this->session->set_flashdata('succ',$succ);
        }
        redirect('product');
    }
    function view($id_product){
        $buy = $this->session->flashdata('in');
        if(isset($buy)){
            $data['buy'] = $buy;
        }
        $err = $this->session->flashdata('err1');
        if(isset($err)){
            $data['err1'] = $err;
        }
        $login_user = $this->session->userdata('session_user');
        $user = $this->User_models->getinfo($login_user);
        $count = $this->session->userdata('count');
        if(isset($count)){
            $data['count'] = $count;
        }else $data['count'] = 0;
        $comment = $this->Home_models->getinfodesc('tb_comment','id_product',$id_product,'id_comment');
        if($comment){
            $data['comment'] = $comment;
        }
        if($user){
            foreach($user as $row){
                $data['user'] = $row->name;
                $data['avatar'] = $row->img;
            }
            $number_noti = $this->Home_models->get_noti($login_user,'2');
            if($number_noti){
                $data['number_noti'] = count($number_noti);
            }else $data['number_noti'] = 0;
        }
        $getinfo = $this->Product_models->getinfo($id_product);
        if($getinfo){
            foreach($getinfo as $row) {
                $id_catalog = $row->id_catalog;
                $id_user = $row->id_user;
            }
            $catalog = $this->Home_models->getinfo('tb_catalog','id_catalog',$id_catalog);
            $seller = $this->Home_models->getinfo('tb_user','id_user',$id_user);
            $number_product = 0;
            $number = $this->Home_models->getinfo('tb_product','id_user',$id_user);
            if($catalog){
                foreach($catalog as $key){
                    $data['catalog'] = $key->name;
                }
            }
            if($seller){
                foreach($seller as $title){
                    $data['seller'] = $title->name;
                    $data['img'] = $title->img;
                }
            }
            if($number){
                foreach($number as $item){
                    $number_product += $item->number;
                }
            }
            $data['number_product'] = $number_product;
            $data['product'] = $getinfo;
        }else $data['err'] = "Sản phẩm này không tồn tại";
        $this->load->view('fontend/view_product',$data);
    }
    function comment($id_product)
    {
        $id_user = $this->session->userdata('session_user');
        $content = $this->input->post('comment');
        if (isset($id_user) && isset($content)) {
            $data = array(
                'id_product' => $id_product,
                'id_user' => $id_user,
                'content' => $content,
            );
            $add_comment = $this->Product_models->commnent($data);
            if ($add_comment) {
                
                redirect('product/view/'.$id_product);
//                echo json_encode($data);
            }
        } else redirect('home');
    }
    public function update_number($id_product){
        $session_login = $this->session->userdata('session_user');
        $user = $this->User_models->getinfo($session_login);
        if($user){
            foreach($user as $row){
                $data['user'] = $row->name;
                $data['avatar'] = $row->img;
            }
        }
        if(!isset($session_login)){
            redirect('banhang');
        }
        $data['data_product'] = $this->Product_models->getinfo1($id_product,$session_login);
        if($data['data_product']){
            $name = $this->input->post('name');
            $discribe = $this->input->post('discribe');
            $id_catalog = $this->input->post('id_catalog');
            $price = $this->input->post('price');
            $id_status = $this->input->post('id_status');
            $number = $this->input->post('number');
            if(isset($name) && isset($discribe) && isset($id_catalog) && isset($price) && isset($number) && isset($id_status) && isset($_FILES['userfile']['name'])){
                $config['upload_path'] = './public/img/product/';
                $config['allowed_types'] = 'gif|png|jpg|jpeg';
                $this->load->library('upload',$config);
                if($this->upload->do_upload()) {
                    $data['upload'] = $this->upload->data();
                    $file_name = $data['upload']['file_name'];
                    $add = array(
                    'id_user' => $session_login,
                    'name' => $name,
                    'img' => $file_name,
                    'discribe' => nl2br($discribe),
                    'id_catalog' => $id_catalog,
                    'price' =>  $price,
                    'number' => $number,
                    'id_status'   => $id_status,
                    );
                    $add_pro = $this->Product_models->update($id_product,$add);
                    
                
                }else{
                     $add = array(
                    'id_user' => $session_login,
                    'name' => $name,
                    'discribe' => nl2br($discribe),
                    'id_catalog' => $id_catalog,
                    'price' =>  $price,
                    'number' => $number,
                    'id_status'   => $id_status,
                    );
                    $add_pro = $this->Product_models->update($id_product,$add);
                }
            }
            redirect('product');
        }else{
            $data['err'] = "Sản phẩm của bạn không được tìm thấy trong CSDL";
        };
        $data['catalog'] = $this->Home_models->get('tb_catalog');
        $data['status_product'] = $this->Home_models->get('tb_status_product');
        $this->load->view('fontend_bh/update',$data);

    }
    public function buy($id_product){
        $count = $this->session->userdata('count');
        if(isset($count)){
            $data['count'] = $count;
        }else $data['count'] = 0;
//        $this->load->library("cart");
        $login_user = $this->session->userdata('session_user');
        $time_out = $this->session->userdata('time_out_login');
        $qty = $this->input->post('number');
        if(isset($login_user)) {
            if (time() - $time_out >= 2000000000000) {
                $this->session->sess_destroy();
                redirect('home');
            } else {
                $content_product = $this->Home_models->getinfo('tb_product','id_product',$id_product);
                if(isset($qty)){
                    $number = $qty;
                }else $number = 1;
                if($content_product){
                    foreach ($content_product as $row){};
                    if($row->id_user == $login_user){
                        $err =  "Bạn không thể mua sản phẩm của chính mình";
                        $this->session->set_flashdata('err1',$err);
                        redirect('product/view/'.$id_product);
                    }else{
                        $cart_old = $this->cart->contents();
                        if(isset($cart_old)){
                            foreach ($cart_old as $item){
                                if($item['id'] == $id_product ){
                                    if($item['qty']+$number - $row->number>0){
                                        $err = "Sản phẩm trong kho đã hết! Bạn có thể liên hệ đến chủ shop để đặt mua thêm!";
                                        $this->session->set_flashdata('err1',$err);
                                        redirect('product/view/'.$id_product);
                                    }
                                }
                            }
                        }
                        $cart = array(
                            'id' => $id_product,
                            'name' => $row->name,
                            'id_user' => $row->id_user,
                            'price' => $row->price,
                            'qty' => $number,
                            'max' =>$row->number,
                            'img' => $row->img,
                            'discribe' => $row->discribe,
                            'id_catalog' => $row->id_catalog,
                            'id_status' => $row->id_status,
                        );
                        if($this->cart->insert($cart)){
                            $count+=$number;
                            $session_data = array(
                                'count' => $count,
                                'time_buy' => time(),
                            );
                            $this->session->set_userdata($session_data);
                            $buy = "Sản phẩm đã được thêm vào giỏ hàng";
                            $this->session->set_flashdata('in',$buy);
                            redirect('product/view/'.$id_product);
                        }else{
                            $err2 = "Vui lòng nhập số lượng khác 0!";
                            $this->session->set_flashdata('err1',$err2);
                            redirect('product/view/'.$id_product);
                        }
                    }
                }
                else echo "Khong ton tai sp nay";
            }
        }else{
            redirect('home/login/'.$id_product);
        }
    }
    
}

?>