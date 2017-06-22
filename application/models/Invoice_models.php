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
     function get_invoice1($id_invoice,$id_user){
        $this->db->where('id_invoice',$id_invoice);
        $this->db->where('id_user',$id_user);
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
        $this->db->where('active','0');
        $query = $this->db->update('tb_invoice_detail',$data);
        if($query){
            $this->db->where('id_invoice',$id_invoice);
            $query = $this->db->get('tb_invoice_detail');
            $check_active = $query->num_rows();

            $this->db->where('id_invoice',$id_invoice);
            $this->db->where('active',$data['active']);
            $query_2 = $this->db->get('tb_invoice_detail');
            $check_active_2 = $query_2->num_rows();

            $this->db->where('id_invoice',$id_invoice);
            $this->db->where('active','4');
            $query_3 = $this->db->get('tb_invoice_detail');
            $check_active_3 = $query_3->num_rows();

            if($check_active <= ($check_active_2 + $check_active_3)){
                $this->db->where('id_invoice',$id_invoice);
                $active_invoice = $this->db->update('tb_invoice',$data);
            }
            return true;
        }
        return false;
    }
    function invoice_admin($active){
        $this->db->where('active',$active);
        $query = $this->db->get('tb_invoice');
        if($query->num_rows() > 0){
            return $query->result();
        }else return false;
    }

    function invoice_detail_admin($active){
        $this->db->where('active',$active);
        $query = $this->db->get('tb_invoice_detail');
        if($query->num_rows() > 0){
            return $query->result();
        }else return false;
    }

    function ban_invoice($id_detail,$data){
        $this->db->where('id_detail',$id_detail);
        $query = $this->db->update('tb_invoice_detail',$data);
        if($query){
            $this->db->where('id_invoice', $data['id_invoice']);
            $hd = $this->db->get('tb_invoice_detail');
            $num_hd = $hd->num_rows();

            $this->db->where('id_invoice', $data['id_invoice']);
            $this->db->where('active','1');
            $hd = $this->db->get('tb_invoice_detail');
            $num_hd_1 = $hd->num_rows();

            $this->db->where('id_invoice',$data['id_invoice']);
            $this->db->where('active',$data['active']);
            $cthd = $this->db->get('tb_invoice_detail');
            $num_cthd = $cthd->num_rows();
            if($num_hd <= $num_cthd){
                $this->db->where('id_invoice',$data['id_invoice']);
                $active_invoice = $this->db->update('tb_invoice',$data);
            }else{
                if($num_hd <= ($num_cthd + $num_hd_1)){
                $this->db->where('id_invoice',$data['id_invoice']);
                $data_array = array(
                    'active' => '1',
                    );
                $active_invoice = $this->db->update('tb_invoice',$data_array);
                }
            }
            return true;
        }else return false;
    }

    function get_money($id_user){
        $this->db->where('id_user',$id_user);
        $this->db->where('active',3);
        $query = $this->db->get('tb_invoice_detail');
        if($query->num_rows() > 0){
            return $query->result();
        }else return false;
    }
    function list_date($day_begin,$day_end,$id_invoice){
        $this->db->where('date>=',$day_begin);
        $this->db->where('date<=',$day_end);
        $this->db->where('id_invoice',$id_invoice);
        $query = $this->db->get('tb_invoice');
        if($query->num_rows() > 0){
            return $query->result();
        }else return false;
    }
    function click_active_admin($id_invoice,$active){
        $this->db->where('id_invoice',$id_invoice);
        $update = $this->db->update('tb_invoice',$active);
        if($update){
            $this->db->where('id_invoice',$id_invoice);
            $get = $this->db->get('tb_invoice_detail');
            if($get->num_rows() > 0){
                return $get->result();
            }
        }else return false;

    }
    function active_detail_admin($id_invoice,$active){
        $this->db->where('id_invoice',$id_invoice);
        $this->db->where('active!=','4');
        $update = $this->db->update('tb_invoice_detail',$active);
        if($update){
            return true;
        }else return false;
    }
    function buyer_getinfo($id_detail){
        $this->db->where('id_detail',$id_detail);
        // $this->db->
    }
    function get_invoice_replay($id_invoice){
        $this->db->where('id_invoice',$id_invoice);
        $this->db->where('active!=','4');
        $query = $this->db->get('tb_invoice_detail');
        if($query->num_rows() > 0){
            return $query->result();
        }else return false;
    }
    
}


?>