<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index(){
        if($this->session->userdata('login_id')==''){
            redirect('auth/login');
        }else{
            $this->crud_model->login_details();
            if($this->session->userdata('role_id')==1){
                redirect('admin');
            }elseif($this->session->userdata('role_id')==2){
                redirect('user');
            }elseif($this->session->userdata('role_id')==3){
                redirect('evaluator');
            }
        }
    }
    public function login(){
        if($this->input->post()){
        $username = $this->input->post('email');
        $password = $this->input->post('password');       
        if(!empty($username) && !empty($password)) {
        $res = $this->crud_model->validate_user_credentials($username, $password);
        if (!empty($res)) {
            $this->session->set_userdata('login_id', $res['id']);
            $this->session->set_userdata('role_id', $res['role_id']);
            redirect('auth', '');
        }else{
            $this->session->set_flashdata('error_msg', 'You Entered Invalid Email/Password');
        } 
        }else{
          $this->session->set_flashdata('error_msg', 'Username and Password Required');  
        }
        redirect('login', '');
        }
        $this->load->view('backend/admin_login');           
    }
    public function login_action() {
        $username = $this->input->post('email');
        $password = $this->input->post('password');       
        $res = $this->crud_model->validate_user_credentials($username, $password);
        if (!empty($res)) {
            $this->session->set_userdata('login_id', $res['id']);
            $this->session->set_userdata('role_id', $res['role_id']);
        }else{
            $this->session->set_flashdata('error_msg', 'Your Enter Invalid Email/Password');
        } 
        redirect('auth', '');
       // redirect('dashboard', '');
    }

    
/*
     public function register() {
       
        $page_data['page_name'] = 'register';
        $page_data['page_title'] = 'Registration';
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean|is_unique[users.email]', array(
            'is_unique' => 'This %s already exists.'
        ));
        $this->form_validation->set_rules('mobile', 'Mobile Number', 'trim|required|min_length[10]|max_length[10]|xss_clean|is_unique[users.mobile]', array(
            'is_unique' => 'This %s already exists.'
        ));       
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout/master_layout/index', $page_data);
        } else {
            $input = $this->input->post();

            $inputData = array(
                "role_id" => 2,
                "first_name" => $input['first_name'],
                "email" => $input['email'],
                "mobile" => $input['mobile'],
                "icai_reg_no" => $input['icai_reg_no'],
                "exam_type" => $input['exam_type']
            );
          
           
            $insert_id = $this->Users_model->insert_user_details($inputData);
           $insert_id = $this->sms_model->insert_user_details($inputData);
            if ($insert_id > 0) {
                $this->session->set_flashdata('reg_status', 'Successfully Registered');
                redirect(base_url());
                }
             else {
                redirect('none.html');
            }
        }
        
       
    }*/
public function logout(){
     if ($this->session->userdata('login_id') != '')
        {
            $this->crud_model->logout_details();
        }
        session_destroy();
        redirect("auth");
    }
}
?>