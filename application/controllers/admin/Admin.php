<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_Model');

    }
  public function index(){

             $this->load->view('admin/admin_login');
    }
    public function login_action() { 
        $username = $this->input->post('email');
        $password = $this->input->post('password');       
        $res = $this->Admin_Model->validate_user_credentials($username, $password);
        if (!empty($res)) {
            $data = array(
                'admin_id' => $res->id,
                'user_email' => $res->email,
                'is_logged_in' => true
            );
            $this->session->set_userdata('admin', $data);
            redirect('dashboard');
            
        } else {
            $this->session->set_flashdata('error_msg', 'Your Enter Invalid Email/Password');
            redirect('admin', '');
        } 
        redirect('dashboard', '');
    }
    public function logout(){
        $this->session->unset_userdata("admin");
        redirect("admin");
    }
    
    public function dashboard(){
        $page_data['page_title'] = 'Dashboard';
        $page_data['page_name'] = 'dashboard';
       
        $this->load->view('layout/admin_layout/index', $page_data);
    }
     public function addplans(){
        $page_data['page_title'] = 'addplans';
        $page_data['page_name'] = 'addplans';
       
        $this->load->view('layout/admin_layout/index', $page_data);
    }
     public function faileduser(){
        $page_data['page_title'] = 'faileduser';
        $page_data['page_name'] = 'faileduser';
       
        $this->load->view('layout/admin_layout/index', $page_data);
    }
     public function feedback(){
        $page_data['page_title'] = 'feedback';
        $page_data['page_name'] = 'feedback';
       
        $this->load->view('layout/admin_layout/index', $page_data);
    }
     public function feelingformal(){
        $page_data['page_title'] = 'feelingformal';
        $page_data['page_name'] = 'feelingformal';
       
        $this->load->view('layout/admin_layout/index', $page_data);
    }
     public function maindownload(){
        $page_data['page_title'] = 'Main Download';
        $page_data['page_name'] = 'maindownload';
       
        $this->load->view('layout/admin_layout/index', $page_data);
    }
    public function mainupload(){
        $page_data['page_title'] = 'Main Upload';
        $page_data['page_name'] = 'mainupload';
       
        $this->load->view('layout/admin_layout/index', $page_data);
    }
    public function mainuser(){
        $page_data['page_title'] = 'Main User';
        $page_data['page_name'] = 'mainuser';
       
        $this->load->view('layout/admin_layout/index', $page_data);
    }
     public function trailuser(){
        $page_data['page_title'] = 'Trail User';
        $page_data['page_name'] = 'trailuser';
       
        $this->load->view('layout/admin_layout/index', $page_data);
    }
    function system_settings($param1 = '', $param2 = '', $param3 = '') {
        if ($param1 == 'do_update') {
            $this->crud_model->update_system_settings();
            $this->session->set_flashdata('message', get_phrase('settings_updated'));
            redirect(base_url() . 'main/system_settings/', 'refresh');
        }
        if ($param1 == 'upload_logo') {
            unlink('uploads/logo.png');
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/logo.png');
            $this->session->set_flashdata('message', get_phrase('settings_updated'));
            redirect(base_url() . 'main/system_settings/', 'refresh');
        }
        $page_data['page_name'] = 'system_settings';
        $page_data['page_title'] = get_phrase('system_settings');
        $page_data['settings'] = $this->db->get('settings')->result_array();
        $this->load->view('backend/index', $page_data);
    }





}
?>