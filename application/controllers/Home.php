<?php 
class home extends CI_Controller{
    function index(){
        $data = array();
        $login_user = $this->session->userdata('session_user');
        $time_out = $this->session->userdata('time_out_login');
        $count = $this->session->userdata('count');
        if(isset($count)){
            $data['count'] = $count;
        }else $data['count'] = 0;
        $product = $this->Product_models->getall();
        $err = $this->session->flashdata('err');
        if(isset($err)){
            $data['err'] = $err;
        }
        $catalog = $this->Home_models->get('tb_catalog');
        if($product){
            $data['product'] = $product;
            // $this->load->view('fontend/home',$data);
        }

        if($catalog){
            $data['catalog'] = $catalog;
            // $this->load->view('fontend/home',$data);
        }
        $set_time = $this->Home_models->get('tb_set_timeout');
        foreach($set_time as $st){};
        $set_time_buy = $st->time_buy;
        $set_time_login = $st->time_login;
        if(isset($login_user)){
            if(time() - $time_out >=$set_time_login){
                $this->session->sess_destroy();
                redirect('home');
            }else{
                $user = $this->User_models->getinfo($login_user);
                if($user){
                    foreach($user as $row){
                        $data['id_user'] = $row->id_user;
                        $data['user'] = $row->name;
                        $data['avatar'] = $row->img;
                    }
                }
                $number_noti = $this->Home_models->get_noti($login_user,'2');
                if($number_noti){
                    $data['number_noti'] = count($number_noti);
                }else $data['number_noti'] = 0;
                $this->load->view('fontend/home',$data);
            }
        }else{
        $this->load->view('fontend/home',$data);
        }
    }

    function login($id_product){
//        $data['id_product'] = $id_product;
        if($id_product != 0){
            $data['succ'] = "Bạn phải đăng nhập để thực hiện chức năng này!";
        }
        $login_user = $this->session->userdata('session_user');
        if(isset($login_user)){
            redirect('home');
            die();
        }
        $account = $this->input->post('account');
        $password = $this->input->post('password');
        if(isset($account) && isset($password)){
            $data['id_product'] = $id_product;
            $data = array(
                'account' => $account,
                'password' => md5($password),
            );
            $login = $this->User_models->login($data);
            if($login == 1){
                $data['id_product'] = $id_product;
                $data['account'] = $account;
                $data['err'] = "Mật khẩu không chính xác";
                $this->load->view('fontend/login',$data);
            }else{
                if($login == 2){
                    $err['id_product'] = $id_product;
                    $err['err'] = "Tài khoản chưa được đăng kí";
                    $this->load->view('fontend/login',$err);
                }else{
                    if($login == 3){
                        $err['id_product'] = $id_product;
                        $err['err'] = "Tài khoản đã bị cấm bởi những hành vi không đúng với điều lệ sử dụng hệ thống";
                        $this->load->view('fontend/login',$err);
                    }else{
                        if($login == 0){
                            $check = array(
                                'account' => $account,
                            );
                            $get = $this->User_models->get($check);
                            if($get!=false){
                                foreach ($get as $row){
                                    $account = $row->id_user;
                                    $session_data = array(
                                        'session_user' => $account,
                                        'time_out_login' => time(),
                                    );
                                    $this->session->set_userdata($session_data);
                                    if($id_product == 0){
                                        redirect('home');
                                    }else{
                                        redirect('product/view/'.$id_product);
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }else{
            $data['id_product'] = $id_product;
            $this->load->view('fontend/login',$data);
        }
    }
    function verty(){
        $phone = $this->input->post('phone');
        if(isset($phone)){
            $verty = rand(100000,999999);
            $session = array(
                'verty' => $verty,
                'phone' => $phone,
                );
            $this->session->set_userdata($session);
            $APIKey="44CB7DA1835ADF3785E3DD69FD1E4B";
            $SecretKey="6C47C73FE98DCF7A31D2A90B625347";
            $YourPhone=$phone;
            $Content='Mã xác nhận tài khoản của bạn là: '.$verty;
            
            $SendContent=urlencode($Content);
            $data="http://rest.esms.vn/MainService.svc/json/SendMultipleMessage_V4_get?Phone=$YourPhone&ApiKey=$APIKey&SecretKey=$SecretKey&Content=$SendContent&SmsType=4";
            
            $curl = curl_init($data); 
            curl_setopt($curl, CURLOPT_FAILONERROR, true); 
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true); 
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
            $result = curl_exec($curl); 
                
            $obj = json_decode($result,true);
            if($obj['CodeResult']!=100)
            {
            
                print "ErrorMessage:".$obj['ErrorMessage'];
            }else redirect('home/register');
        }
    }
    function register(){
        $login_user = $this->session->userdata('session_user');
        $session_captcha = $this->session->userdata('captcha');
        $session_verty = $this->session->userdata('verty');
        $session_phone = $this->session->userdata('phone');
        if(isset($login_user)){
            redirect('home');
            die();
        }
        $account = $this->input->post('account');
        $password = $this->input->post('password');
        $re_password = $this->input->post('re_password');
        $captcha = $this->input->post('captcha');
        // $verty = $this->input->post('verty');
        if(isset($account) && isset($password) && isset($re_password)&&isset($captcha) && isset($verty)){
            if($verty!=$session_verty){
                $err['err'] = "Mã kích hoạt không chính xác!";
                $this->load->view('fontend/register',$err);
            }
            $word = substr(md5(rand(0,99)),15,5);
            $vals = array(
            'word' => $word,
            'img_path' => './public/captcha/',
            'img_url' => base_url('public/captcha/'),
            'font_path' => '../../public/style/fonts/fontawesome-webfont.ttf/',
            'img_width' => '100',
            'img_height' => '30',
            'expiration' => '60',
            'colors' => array(
                'background' => array(119, 119, 119),
                'border' => array(110, 110, 110),
                'text' => array(0, 0, 0),
                'grid' => array(77, 77, 77))
            );
            $data = create_captcha($vals);
            $session_data = array(
                'captcha' => $data['word'],
            );
            $this->session->set_userdata($session_data);
            if($password == $re_password){
                if($captcha == $session_captcha){
                    $data = array(
                        'account' => $account,
                        'name' => $account,
                        'password' => md5($password),
                        'img' => 'default.jpg',
                        'phone' => $session_phone,
                    );
                    $register = $this->User_models->register($data); 
                    if($register == false){
                        $word = substr(md5(rand(0,99)),15,5);
                        $vals = array(
                            'word' => $word,
                            'img_path' => './public/captcha/',
                            'img_url' => base_url('public/captcha/'),
                            'font_path' => '../../public/style/fonts/fontawesome-webfont.ttf/',
                            'img_width' => '100',
                            'img_height' => '30',
                            'expiration' => '60',
                            'colors' => array(
                                'background' => array(119, 119, 119),
                                'border' => array(110, 110, 110),
                                'text' => array(0, 0, 0),
                                'grid' => array(77, 77, 77))
                        );
                        $data = create_captcha($vals);
                        $session_data = array(
                            'captcha' => $data['word'],
                        );
                        $this->session->set_userdata($session_data);
                        $data['err'] = "Tài khoản đã tồn tại, vui lòng nhập lại !";
                        $this->load->view('fontend/register', $data);
                    }else{
                        $word = substr(md5(rand(0,99)),15,5);
                        $vals = array(
                            'word' => $word,
                            'img_path' => './public/captcha/',
                            'img_url' => base_url('public/captcha/'),
                            'font_path' => '../../public/style/fonts/fontawesome-webfont.ttf/',
                            'img_width' => '100',
                            'img_height' => '30',
                            'expiration' => '60',
                            'colors' => array(
                                'background' => array(119, 119, 119),
                                'border' => array(110, 110, 110),
                                'text' => array(0, 0, 0),
                                'grid' => array(77, 77, 77))
                        );
                        $data = create_captcha($vals);
                        $session_data = array(
                            'captcha' => $data['word'],
                        );
                        $this->session->set_userdata($session_data);
                        $data['succ'] = "Bạn đã đăng kí thành công! Đăng nhập ngay!";
                        $this->load->view('fontend/register', $data);
//                        $session_data = array(
//                            'session_user' => $account,
//                            'time_out_login' => time(),
//                        );
//                        $this->session->set_userdata($session_data);
//                        redirect('home');
                    }
                }else{
                    $data['err'] = "Mã xác nhận không chính xác!";
                    $this->load->view('fontend/register',$data);
                }
            }else{
                $data['err'] = "Xác nhận mật khẩu không chính xác!";
                $this->load->view('fontend/register',$data);
            }
        }
        else{
        // $this->load->helper('captcha');
        $word = substr(md5(rand(0,99)),15,5);
        $vals = array(
        'word' => $word,
        'img_path' => './public/captcha/',
        'img_url' => base_url('public/captcha/'),
        'font_path' => '../../public/style/fonts/fontawesome-webfont.ttf/',
        'img_width' => '100',
        'img_height' => '30',
        'expiration' => '6',
        'colors' => array(
        'background' => array(119, 119, 119),
        'border' => array(110, 110, 110),
        'text' => array(0, 0, 0),
        'grid' => array(77, 77, 77))
        );
        $cap = create_captcha($vals);
        $session_data = array(
            'captcha' => $cap['word'],
        );
        $this->session->set_userdata($session_data);
        $this->load->view('fontend/register',$cap);
        }
    }
    function logout(){
        $this->session->sess_destroy();
        redirect('home');
    }
}
?>