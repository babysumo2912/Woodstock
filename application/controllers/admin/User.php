<?php 
/**
* 
*/
class User extends CI_Controller
{
	
	function index(){
		$data = array();
		$user = $this->User_models->getall();
		if($user){
			$data['user'] = $user;
		}
		$this->load->view('admin/user',$data);
	}
}


 ?>