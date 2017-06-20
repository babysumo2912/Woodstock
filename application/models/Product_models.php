<?php 
class Product_models extends CI_Model{
    function getall(){
        $this->db->where('active', 1);
        $this->db->where('number>',0);
        $get = $this->db->get('tb_product');
        if($get->num_rows() > 0){
            return $get->result();
        }else return false;
    }
    function getall_active(){
        $this->db->where('active', 0);
        $this->db->where('number>',0);
        $get = $this->db->get('tb_product');
        if($get->num_rows() > 0){
            return $get->result();
        }else return false;
    }
    function delete_product($id_product){
        $this->db->where('id_product',$id_product);
        $query = $this->db->delete('tb_product');
        return true;
    }
    function get_home($id_user){
        $this->db->where('active', 1);
        $this->db->where('number>',0);
        $this->db->where('id_user',$id_user);
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
    function get_active($login_user,$active){
        $this->db->where('id_user',$login_user);
        $this->db->where('active',$active);
        $get = $this->db->get('tb_product');
        if($get->num_rows() > 0){
            return $get->result();
        }else return false;
    }
    function hethang($login_user){
        $this->db->where('id_user',$login_user);
        $this->db->where('number<=',0);
        $get = $this->db->get('tb_product');
        if($get->num_rows() > 0){
            return $get-result();
        }else return false;
    }
    function getinfo1($id_product,$id_user){
        $this->db->where('id_user',$id_user);
        $this->db->where('id_product',$id_product);
        $get = $this->db->get('tb_product');
        if($get->num_rows() > 0){
            return $get->result();
        }else return false;
    }
     function getinfo($id_product){
        $this->db->where('active', 1);
        $this->db->where('number>',0);
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
    function buy_max($id_user){
        $this->db->Order_by('like','DESC');
        $this->db->where('like>',0);
        $this->db->where('id_user',$id_user);
        $this->db->limit('4');
        $query = $this->db->get('tb_product');
        if($query->num_rows() > 0){
            return $query->result();
        }else return false;
    }
    function product_ban($id_user)
    {
        $this->db->where('active',2);
        $this->db->where('id_user',$id_user);
        $query = $this->db->get('tb_product');
        if($query->num_rows() > 0){
            return $query->result();
        }else return false;
    }
}
?>
