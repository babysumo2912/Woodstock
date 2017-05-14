<?php
class User extends CI_Controller{
    function getinfo($id_user){
        $user_account = $this->User_models->getinfo($id_user);

    }
}

?>