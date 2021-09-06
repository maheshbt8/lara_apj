<?php

class Admin_Model extends CI_Model{
    
    public function validate_user_credentials($username, $password){
        $data = $this->db->get_where("admin", ["email" => $username])->row();
        if ($data) {
            if ($data->password == md5($password)) {
                return $data;
            }
        }
    }
    
    
}

?>