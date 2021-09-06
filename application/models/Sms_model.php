<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sms_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
function send_sms($message = '' , $numbers = '') {
  $username = $this->db->get_where('settings', array('setting_type' => 'sms_username'))->row()->description;
  $hash =$this->db->get_where('settings', array('setting_type' => 'sms_hash'))->row()->description; 
  $test = "0";
  $sender = $this->db->get_where('settings', array('setting_type' => 'sms_sender'))->row()->description;
  $message = urlencode($message);
  $data = "api_key=".$hash."&sender=".$sender."&numbers=".$numbers."&message=".$message;
  $ch = curl_init('http://api.textlocal.in/send/?');
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $result = curl_exec($ch); 
  //echo $result;
  curl_close($ch);
  return true;
        }
}
