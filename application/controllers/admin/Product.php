<?php 
/**
* 
*/
class Product extends CI_Controller
{
	
	function index(){
		$query = $this->Product_models->getall_active();
		if($query){
			$data['product'] = $query;
		}
		$this->load->view('admin/product',$data);
	}
}

 ?>