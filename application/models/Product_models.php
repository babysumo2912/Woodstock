<?php 
class Product_models extends CI_Model{
    function getall(){
        $this->db->where('active', 0);
        $this->db->where('number>',0);
        $get = $this->db->get('tb_product');
        if($get->num_rows() > 0){
            return $get->result();
        }else return false;
    }
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
    function commnent($data){
        $add_comment = $this->db->insert('tb_comment', $data);
        if(isset($add_comment)){
            return true;
        }else return false;
    }
    function update($id_product,$data){
        $this->db->where('id_product',$id_product);
        $update = $this->db->update('tb_product',$data);
        if(isset($update)){
            return true;
        }else return false;
    }
}
?>