<?php 
class admin extends CI_Controller{
	function index(){
		$this->load->view('admin/home');
	}
	function login(){
		$this->load->view('admin/login');
	}

}
 ?>
