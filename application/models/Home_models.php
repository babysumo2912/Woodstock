<?php
class Home_models extends CI_Model{
    function get($table){
        $get = $this->db->get($table);
        if($get->num_rows() > 0){
            return $get->result();
        }else return false;
    }
}

?>