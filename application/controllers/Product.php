<?php 
class product extends CI_Controller{
    public function index(){
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
                        $data['user'] = $row->account;
                    }
                }
            $product = $this->Product_models->get($login_user);
            if($product != false){
                $data['product'] = $product;
            }
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
                $data['user'] = $row->account;
            }
        }
        if(!isset($login_user)){
            redirect('banhang');
            die();
        }
        $name = $this->input->post('name');
        $img = $this->input->post('userfile');
        $discribe = $this->input->post('discribe');
        $id_catalog = $this->input->post('id_catalog');
        $price = $this->input->post('price');
        $number = $this->input->post('number');
        $id_status = $this->input->post('id_status');
        if(isset($name) && isset($discribe) && isset($id_catalog) && isset($price) && isset($number) && isset($id_status)){
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
                $add = $this->Product_models->add($add);
                if($add = true){
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
}

?>