<?php 
/**
*  
*/
class Shop extends CI_Controller
{
	
	public function view($id_user){
		$data = array();
        
        $user = $this->User_models->getinfo($id_user);
        if($user){
            $data['account'] = $user;
            foreach($user as $row){
                $data['id_user'] = $row->id_user;
                $data['user'] = $row->name;
                $data['avatar'] = $row->img;
            }
        }else{
        $data['err']="Không tìm thấy dữ liệu";
            }
 	$product = $this->Product_models->get_home($id_user);
    if($product != false){
    	$number_product = 0;
    	$number_product = count($product);
    	$data['number_product'] = $number_product;
        $data['product'] = $product;
    }
    $this->load->view('fontend/shop',$data);
    }
       
}

 ?>