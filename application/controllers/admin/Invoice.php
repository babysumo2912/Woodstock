<?php 
class invoice extends CI_Controller{
	public function view($active){
		$data = array();
        $admin = $this->session->userdata('admin');
        $time_out = $this->session->userdata('time_out_login');
        if(isset($admin)){
        	$data['admin'] = $admin;
            $data = array();
			$invoice = $this->Invoice_models->invoice_admin($active);
			if($invoice){
				$data['invoice'] = $invoice;
			}
			$data['active'] = $active;
			$this->load->view('admin/invoice',$data);
        
        }else{
        redirect('admin/home/login');die();
        }
	}
    public function click_active($id_invoice,$active){
        $data = array();
        $admin = $this->session->userdata('admin');
        $time_out = $this->session->userdata('time_out_login');
        if(isset($admin)){
            $data['admin'] = $admin;
            $data = array();
            $data_active = array(
                'active' => $active,
                );
            if($active == '5'){
                $shipping = $this->Invoice_models->get_invoice_sale($id_invoice);
                if($shipping){
                    foreach ($shipping as $sp) {};
                    $shippingcode = $sp->shipping_code;
                }
                $invoice_detail = $this->Invoice_models->get_invoice_replay($id_invoice);
                if($invoice_detail){
                    foreach($invoice_detail as $row){
                        $content = 'Đơn hàng <b>'.$shippingcode.'</b> đã bị hoàn về';
                        $add_notification = array(
                            'id_user' => $row->id_user,
                            'content' => $content,
                            'oop' => '1',
                            );
                        $this->Home_models->add_notification($add_notification);
                        $product = $this->Home_models->getinfo('tb_product','id_product',$row->id_product);
                        if($product){
                            foreach ($product as $item) {};
                            $soluong = $item->number + $row->qty;
                            $data_update_product = array(
                                'number' => $soluong,
                                );
                            $update_num = $this->Product_models->update($row->id_product,$data_update_product);
                        }else{
                            $data_add_product = array(
                                'id_product' => $row->id_product,
                                'id_user' => $row->id_user,
                                'name' => $row->name,
                                'img' => $row->img,
                                'id_catalog' => '11',
                                'price' => $row->price,
                                'number'=>$row->qty,
                                'id_status' => '1',
                                'active' => '1',
                            );
                            $add = $this->Product_models->add($data_add_product);
                        }
                    }
                }
            }
            $invoice = $this->Invoice_models->click_active_admin($id_invoice,$data_active);
            if($invoice){
            // var_dump($invoice);die();
                foreach ($invoice as $key) {
                    $invoice_dt = $this->Invoice_models->active_detail_admin($id_invoice,$data_active);
                }
            }
            // die();
            if($active != 4){
                redirect('admin/invoice/view/'.$active);
            }else{
                redirect('admin/invoice/view/'.$active);
            }
        
        }else{
        redirect('admin/home/login');die();
        }
    }
}

 ?>