<?php
class User_models extends CI_Model{
    // function get($data){
    //     $this->db->where('id_user',$data);
    //     $get = $this->db->get('tb_user');
    //     if($get->num_rows() > 0){
    //         return $get->result();
    //     }else return false;
    // }
    function getall(){
        $query = $this->db->get('tb_user');
        if($query->num_rows() > 0){
            return $query->result();
        }else return false;
    }
    function getinfo($data){
        $this->db->where('id_user',$data);
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
            $this->db->where('active','0');
            $ban = $this->db->get('tb_user');
            if($ban->num_rows() > 0){
                $this->db->where('account',$data['account']);
                $this->db->where('password',$data['password']);
                $login = $this->db->get('tb_user');
                if($login->num_rows() > 0){
                    return $login->result();
                }else return 1;
            }else return 3;
        }else return 2;
    }
    function getaddress($id_user){
        $this->db->where('id_user',$id_user);
        $address = $this->db->get('tb_infomation_user');
        if($address->num_rows()>0){
            return $address->result();
        }else return false;
    }
    function get_address_default($id_user){
        $this->db->where('id_user',$id_user);
        $this->db->where('default',1);
        $address = $this->db->get('tb_infomation_user');
        if($address->num_rows()>0){
            return $address->result();
        }else return false;
    }
    function get_max_num_address($id_user){
        $this->db->where('id_user',$id_user);
        $query = $this->db->get('tb_infomation_user');
        if($query->num_rows() > 0){
            return $query->num_rows();
        }else return false;
    }
    function default_address($id_user,$data){
        $this->db->where('id_user',$id_user);
        $query = $this->db->update('tb_infomation_user',$data);
        if($query){
            return true;
        }else return false;
    }
    function checked_address($id_user,$id_infomation,$data){
        $this->db->where('id_user',$id_user);
        $this->db->where('id_infomation',$id_infomation);
        $query = $this->db->update('tb_infomation_user',$data);
        if($query){
            return true;
        }else return false;
    }
    function add_address($data){
        $query = $this->db->insert('tb_infomation_user',$data);
        if($query){
            return true;
        }else return false;
    }
    function getmax_id_invoice(){
        $this->db->select_max('id_invoice');
        $id_invoice = $this->db->get('tb_invoice');
        if($id_invoice->num_rows() > 0){
            return  $id_invoice->result();
        }else return false;
    }
    function add_invoice($data){
        $query = $this->db->insert('tb_invoice',$data);
        if(isset($query)){
            $this->db->select_max('id_invoice');
            $id_invoice = $this->db->get('tb_invoice');
            if($id_invoice->num_rows() > 0){
                return  $id_invoice->result();
            }
        }else return false;
    }
    function add_invoice_detail($data){
        $query = $this->db->insert('tb_invoice_detail',$data);
        if(isset($query)){
            return true;
        }
        else{
            return false;
        }

    }
    function update($id_user,$data){
        $this->db->where('id_user',$id_user);
        $query = $this->db->update('tb_user',$data);
        return true;
    }

    function messenger_idroom($id_user,$oop){
        $this->db->group_by('id_room');
        $this->db->where('id_user',$id_user);
        $this->db->where('oop',$oop);
        $get = $this->db->get('tb_chat_content');
        if($get->num_rows() > 0){
            return $get->result();
        }else return false;

    }
    function messenger_iduser($id_room){
        $this->db->group_by('id_user');
        $this->db->where('id_room',$id_room);
        $get = $this->db->get('tb_chat_content');
        if($get->num_rows() > 0){
            return $get->result();
        }else return false;
    }
    function add_messenger($data){
        $add = $this->db->insert('tb_chat_content',$data);
        if($add){
            return true;
        }else return false;
    }
}
?>