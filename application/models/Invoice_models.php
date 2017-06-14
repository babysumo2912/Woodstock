<?php
class Invoice_models extends CI_Model{
    function get_buyer($id_user,$active){
        $this->db->where('id_user',$id_user);
        $this->db->where('active',$active);
        $this->db->Order_by('id_invoice','DESC');
        $query = $this->db->get('tb_invoice');
        if($query->num_rows() > 0){
            return $query->result();
        }else return false;
    }
    function get_invoice_detail($id_invoice){
        $this->db->where('id_invoice',$id_invoice);
        $query = $this->db->get('tb_invoice_detail');
        if($query->num_rows() > 0){
            return $query->result();
        }else return false;
    }
    function get_sale_invoice($id_user,$active){
        $this->db->group_by('id_invoice');
        $this->db->where('id_user',$id_user);
        if($active == "all"){
            $this->db->where('active>=',0);
        }else{
            $this->db->where('active',$active);
        }
        $query = $this->db->get('tb_invoice_detail');
        if($query->num_rows() > 0){
            return $query->result();
        }else return false;
    }
    function get_invoice_all($id_user,$active){
        $this->db->group_by('id_invoice');
        $this->db->where('id_user',$id_user);
        if($active == "all"){
            $this->db->where('active>=',0);
        }else{
            $this->db->where('active',$active);
        }
        $query = $this->db->get('tb_invoice_detail');
        if($query->num_rows() > 0){
            return $query->result();
        }else return false;
    }
    function get_invoice($id_invoice,$id_user,$active){
        $this->db->where('id_invoice',$id_invoice);
        $this->db->where('id_user',$id_user);
        if($active == "all"){
            $this->db->where('active>=',0);
        }else{
            $this->db->where('active',$active);
        }
        $query = $this->db->get('tb_invoice_detail');
        if($query->num_rows() > 0){
            return $query->result();
        }else return false;
    }
    function get_invoice_active($id_invoice,$id_user){
        $this->db->where('id_invoice',$id_invoice);
        $this->db->where('id_user',$id_user);
        $query = $this->db->get('tb_invoice_detail');
        if($query->num_rows() > 0){
            return $query->result();
        }else return false;
    }
    function get_invoice_sale($id_invoice){
        $this->db->where('id_invoice',$id_invoice);
        $query = $this->db->get('tb_invoice');
        if($query->num_rows() > 0){
            return $query->result();
        }else return false;
    }
    function click_active($id_invoice,$id_user,$data){
        $this->db->where('id_invoice',$id_invoice);
        $this->db->where('id_user',$id_user);
        $query = $this->db->update('tb_invoice_detail',$data);
        if($query){
            $this->db->where('id_invoice',$id_invoice);
            $query = $this->db->get('tb_invoice_detail');
            $check_active = $query->num_rows();
            $this->db->where('id_invoice',$id_invoice);
            $this->db->where('active',$data['active']);
            $query_2 = $this->db->get('tb_invoice_detail');
            $check_active_2 = $query_2->num_rows();
            if($check_active == $check_active_2){
                $this->db->where('id_invoice',$id_invoice);
                $active_invoice = $this->db->update('tb_invoice',$data);
            }
        }
        return true;
    }
    function invoice_admin($active){
        $this->db->where('active',$active);
        $query = $this->db->get('tb_invoice');
        if($query->num_rows() > 0){
            return $query->result();
        }else return false;
    }
    
}


?>