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
            $data['user'] = $login_user;
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
        $data['user'] = $login_user;
        if(!isset($login_user)){
            redirect('banhang');
            die();
        }
        $name = $this->input->post('name');
        $discribe = $this->input->post('discribe');
        $id_catalog = $this->input->post('id_catalog');
        $price = $this->input->post('price');
        $number = $this->input->post('number');
        $id_status = $this->input->post('id_status');
        if(isset($name) && isset($discribe) && isset($id_catalog) && isset($price) && isset($number) && isset($id_status)){
            $add = array(
                'id_user' => $login_user,
                'name' => $name,
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
            $data['catalog'] = $this->Home_models->get('tb_catalog');
            $data['status_product'] = $this->Home_models->get('tb_status_product');
            $this->load->view('fontend_bh/add_product',$data);
        }
    }
}

?>