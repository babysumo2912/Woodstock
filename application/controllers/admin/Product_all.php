<?php 
/**
* 
*/
class Product_all extends CI_Controller
{
	
	function index(){
		$data = array();

		$admin = $this->session->userdata('admin');
		if(!isset($admin)){
			redirect('admin/home/login');die();
		}

		$succ = $this->session->flashdata('succ');
		if(isset($succ)){
			$data['succ'] = $succ;
		}
		$product = $this->Product_models->getall();
		if($product){
			$data['product_all'] = $product;
		}
		
		$this->load->view('admin/product_all',$data);
	}
	function ban(){
		$data = $this->input->post('sanpham');
		if(isset($data)){
			// var_dump($data);die();
			foreach($data as $row => $item){
			// echo $item['id_product'];
			$update = array(
				'active' => '2',
				);
			$this->Admin_models->check_product($item['id_product'],$update);
			}
			$succ = "Sản phẩm đã được ẩn khỏi hệ thống thành công!";
			$this->session->set_flashdata('succ',$succ);
			redirect('admin/product_all');
		}
	}
}

 ?>