<?php 
/**
* 
*/
class Admin_models extends CI_Model
{
	
	function login($data){
		$this->db->where('name',$data['name']);
		$this->db->where('password',$data['password']);
		$check = $this->db->get('tb_admin');
		if($check->num_rows() > 0){
			return true;
		}else return false;
	}
	function check_product($id_product,$data){
		$this->db->where('id_product',$id_product);
		$this->db->update('tb_product',$data);
		return true;
	}
}


 ?>