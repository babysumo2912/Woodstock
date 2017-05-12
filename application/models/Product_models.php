<?php 
class Product_models extends CI_Model{
    function get($login_user){
        $this->db->where('id_user',$login_user);
        $get = $this->db->get('tb_product');
        if($get->num_rows() > 0){
            return $get->result();
        }else return false;
    }
    function getinfo($id_product){
        $this->db->where('id_product',$id_product);
        $get = $this->db->get('tb_product');
        if($get->num_rows() > 0){
            return $get->result();
        }else return false;
    }
    function add($data){
        $add_pro = $this->db->insert('tb_product', $data);
        if(isset($add_pro)){
            return true;
        }else return false;
    }
}
?>