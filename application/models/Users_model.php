<?php

class Users_model extends CI_Model
{
    private $table = "users";
    public function __construct()
    {
        parent::__construct();
    }
    
    public function insert_user_details( $inputData){
        $this->db->insert($this->table, $inputData);
        return $insert_id = $this->db->insert_id();
    }







}
?>