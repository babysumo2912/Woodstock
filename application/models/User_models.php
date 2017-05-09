<?php 
class User_models extends CI_Model{
    function get($data){
        $this->db->where('account',$data['account']);
        $get = $this->db->get('tb_user');
        if($get->num_rows() > 0){
            return $get->result();
        }else return false;
    }
    function register($data){
        $this->db->where('account',$data['account']);
        $check = $this->db->get('tb_user');
        if($check->num_rows() > 0){
            return false;
        }else{
            $register = $this->db->insert('tb_user', $data);
        }
        if(isset($register)){
            return true;
        }else return false;
    }
    function login($data){
        $this->db->where('account',$data['account']);
        $check = $this->db->get('tb_user');
        if($check->num_rows() > 0){
            $this->db->where('account',$data['account']);
            $this->db->where('password',$data['password']);
            $login = $this->db->get('tb_user');
            if($login->num_rows() > 0){
                return 0;
            }else return 1;
        }else return 2;
    }
}
?>