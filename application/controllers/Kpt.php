<?php
//class OpenSslEncrypt {
defined('BASEPATH') OR exit('No direct script access allowed');
class kpt extends CI_Controller 
{

private static $instance = null;
private $secret = 'fa72077c78dsfsdfuuasdaawlomcvla';
private function __construct($secret, $iv) {
	echo "string";die;
if($secret) $this->secret = $secret;
if($iv) $this->iv = $iv;
}
public static function getInstance($secret = null, $iv = null){
if(self::$instance == null){
self::$instance = new OpenSslEncrypt($secret, $iv);
}
return self::$instance;
}
public function setSecret($secret){
$this->secret = $secret;
return $this;
}
public function getSecret(){
return $this->secret;
}
public function getNewIv($length = 16){
return openssl_random_pseudo_bytes((int)$length);
}
public function encrypt($string, $method = "AES-256-CBC"){
$key = hash('sha256', $this->secret, true);
$iv = openssl_random_pseudo_bytes(16);
$ciphertext = openssl_encrypt($string, $method, $key, OPENSSL_RAW_DATA, $iv);
$hash = hash_hmac('sha256', $ciphertext . $iv, $key, true);
return bin2hex($iv . $hash . $ciphertext);
}
public function decrypt($encrypted_string, $method = "AES-256-CBC"){
$iv_hash_cipher_text = hex2bin($encrypted_string);
$iv = substr($iv_hash_cipher_text, 0, 16);
$hash = substr($iv_hash_cipher_text, 16, 32);
$ciphertext = substr($iv_hash_cipher_text, 48);
$key = hash('sha256', $this->secret, true);
if (!hash_equals(hash_hmac('sha256', $ciphertext . $iv, $key, true), $hash)) return null;
return openssl_decrypt($ciphertext, $method, $key, OPENSSL_RAW_DATA, $iv);
}
}
?>