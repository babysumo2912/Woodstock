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
    function get_sale_invoice($id_user){
        $this->db->group_by('id_invoice');
        $this->db->where('id_user',$id_user);
        $query = $this->db->get('tb_invoice_detail');
        return $query->result();

    }
}


?>