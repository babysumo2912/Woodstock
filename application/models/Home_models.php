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
    function search($table,$key,$id){
        $this->db->like($key,$id);
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
    function getinfodesc_noti($table,$key,$id,$desc,$oop){
        $this->db->where($key,$id);
        $this->db->where('oop',$oop);
        $this->db->order_by($desc,'DESC');
        $getinfo = $this->db->get($table);
        if($getinfo->num_rows() > 0){
            return $getinfo->result();
        }else return false;
    }
    function active($table,$key,$id,$data){
        $this->db->where($key,$id);
        $query = $this->db->update($table,$data);
        if($query){
            return true;
        }else return false;

    }
    function add_notification($data){
        $this->db->insert('tb_notification',$data);
        return true;
    }
    function get_noti($id_user,$oop){
        $this->db->where('id_user',$id_user);
        $this->db->where('oop',$oop);
        $this->db->where('active','0');
        $this->db->order_by('id_tb','DESC');
        $query = $this->db->get('tb_notification');
        if($query->num_rows() > 0){
            return $query->result();
        }else return false;
    }
}

?>