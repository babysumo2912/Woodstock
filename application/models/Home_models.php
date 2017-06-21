<?php
class Home_models extends CI_Model{
    function get($table){
        $get = $this->db->get($table);
        if($get->num_rows() > 0){
            return $get->result();
        }else return false;
    }
    function getinfo($table,$key,$id){
        $this->db->where($key,$id);
        $getinfo = $this->db->get($table);
        if($getinfo->num_rows() > 0){
            return $getinfo->result();
        }else return false;
    }
    function getinfodesc($table,$key,$id,$desc){
        $this->db->where($key,$id);
        $this->db->order_by($desc,'DESC');
        $getinfo = $this->db->get($table);
        if($getinfo->num_rows() > 0){
            return $getinfo->result();
        }else return false;
    }
    function add_notification($data){
        $this->db->insert('tb_notification',$data);
        return true;
    }
}

?>