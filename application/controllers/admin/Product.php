<?php 
/**
* 
*/
class Product extends CI_Controller
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
		$query = $this->Product_models->getall_active();
		if($query){
			$data['product'] = $query;
		}
		$this->load->view('admin/product',$data);
	}
	function check(){
		$data = $this->input->post('sanpham');
		if(isset($data)){
			// var_dump($data);die();
			foreach($data as $row => $item){
			// echo $item['id_product'];
			$update = array(
				'active' => '1',
				);
			$this->Admin_models->check_product($item['id_product'],$update);
			}
			$succ = "Sản phẩm đã được đẩy lên hệ thống thành công!";
			$this->session->set_flashdata('succ',$succ);
			redirect('admin/product');
		}
	}
}

 ?>