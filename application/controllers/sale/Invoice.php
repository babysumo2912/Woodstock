<?php
/**
 * Created by PhpStorm.
 * User: Ann
 * Date: 03/06/2017
 * Time: 4:41 AM
 */
class invoice extends CI_Controller{
    public function index(){
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
                    foreach($user as $row){
                        $data['user'] = $row->name;
                        $data['avatar'] = $row->img;
                    }
                }
                $number_invoice = $this->Invoice_models->get_sale_invoice($login_user,'0');
                $invoice = $this->Invoice_models->get_invoice_all($login_user,'all');
                if($invoice){
                    $data['detail_invoice'] = $invoice;
                }
                if($number_invoice){
                    $data_number = 0;
                    foreach ($number_invoice as $nbi){
                        $data_number_invoice = $this->Invoice_models->get_invoice_sale($nbi->id_invoice,'0');
                        if($data_number_invoice){
                            $data_number ++;
                        }
                    }
                }else $data_number = 0;
                $data['number_invoice'] = $data_number;
                $this->load->view('fontend_bh/invoice',$data);
            }
        }else{
            $this->load->view('fontend_bh/login');
        }
    }
    public function active($active){
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
                    foreach($user as $row){
                        $data['user'] = $row->name;
                        $data['avatar'] = $row->img;
                    }
                }
                $number_invoice = $this->Invoice_models->get_sale_invoice($login_user,'0');
                $invoice = $this->Invoice_models->get_invoice_all($login_user,$active);
                if($invoice){
                    $data['detail_invoice'] = $invoice;
                }
                if($number_invoice){
                    $data_number = 0;
                    foreach ($number_invoice as $nbi){
                        $data_number_invoice = $this->Invoice_models->get_invoice_sale($nbi->id_invoice,'0');
                        if($data_number_invoice){
                            $data_number ++;
                        }
                    }
                }else $data_number = 0;
                $data['number_invoice'] = $data_number;
                $data['active'] = $active;
                $this->load->view('fontend_bh/invoice',$data);
            }
        }else{
            $this->load->view('fontend_bh/login');
        }
    }
}
?>