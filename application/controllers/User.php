<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Kolkata');    
        error_reporting(1);  
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

        if($this->session->userdata('login_id')==''){
            redirect('auth');
        }
    }
  public function index() {
        if ($this->session->userdata('role_id') != 2){ 
            redirect(base_url() . 'auth', 'refresh');
        }
        if ($this->session->userdata('role_id') == 2){
            redirect(base_url() . 'u_dashboard', 'refresh');
        }
    }
    public function dashboard(){
        if($this->session->userdata('role_id')!=2){
        redirect('error_404');
        }
        $page_data['page_title'] = 'Dashboard';
        $page_data['page_name'] = 'dashboard';
        $this->load->view('backend/index', $page_data);
    }
    public function trailexams(){
        if($this->session->userdata('role_id')!=2){
        redirect('error_404');
        }
        if($this->input->post()){
            if($this->input->post('input_type')=='answers'){
            $this->form_validation->set_rules('download_id', 'Download id', 'trim|required|xss_clean');
            if ($this->form_validation->run() == TRUE) {
                $input=$this->input->post();
                if(isset($_FILES['trail_answer']['name']) && $_FILES['trail_answer']['name']!="" && $mime = get_mime_by_extension($_FILES['trail_answer']['name'])=='application/pdf'){
                    $input_data=array(
                        'row_status'=> 2
                    );
                    $res = $this->crud_model->update_operation($input_data,'trail_exam_downloads', ['id' => $input['download_id']]);
                    if($res){
                        $this->session->set_flashdata('success_message','Uploaded Successfully');
                        move_uploaded_file($_FILES["trail_answer"]["tmp_name"], "uploads/trail/answers/". $input['download_id'].'.pdf');
                        redirect('u_traildownload', 'refresh');
                    }else{
                        $this->session->set_flashdata('error_message','Not Uploaded');
                        redirect('u_traildownload', 'refresh');
                    }
                }else{
                    $this->session->set_flashdata('error_message','Please upload only pdf files');
                    redirect('u_traildownload', 'refresh');
                }
            }
        }
        }
        $page_data['page_title'] = 'Trail Exams';
        $page_data['page_name'] = 'trailexams';
        $page_data['trailexams'] = $this->crud_model->get_trailexams_info();
        $this->load->view('backend/index', $page_data);
    }
    
    public function traildownload(){
        if($this->session->userdata('role_id')!=2){
        redirect('error_404');
        }
        if(isset($_POST['exam_type']) && isset($_POST['start_date']) && isset($_POST['end_date']) )
              $page_data['trail_download'] = $this->crud_model->fetch_trail_exam_downloaded_list($this->input->post('exam_type'), $this->input->post('start_date'), $this->input->post('end_date'));
        else 
              $page_data['trail_download'] = $this->crud_model->fetch_trail_exam_downloaded_list();
       $page_data['page_title'] = 'Trail Download';
       $page_data['page_name'] = 'traildownload';
       $this->load->view('backend/index', $page_data);
    }
    
    public function mainexams(){
        if($this->session->userdata('role_id')!=2){
            redirect('error_404');
        }
        $page_data['page_title'] = 'Main Exams';
        $page_data['page_name'] = 'mainexams';
        $page_data['mainexams'] = $this->my_model->get_mainexams_info();
        $this->load->view('backend/index', $page_data);
    }
    
    public function maindownload(){
        if($this->session->userdata('role_id')!=2){
            redirect('error_404');
        }
        if($this->input->post()){
            if($this->input->post('input_type')=='answers'){
            $this->form_validation->set_rules('download_id', 'Download id', 'trim|required|xss_clean');
            if ($this->form_validation->run() == TRUE) {
                $input=$this->input->post();
                if(isset($_FILES['main_answer']['name']) && $_FILES['main_answer']['name']!="" && $mime = get_mime_by_extension($_FILES['main_answer']['name'])=='application/pdf'){
                    $input_data=array(
                        'row_status'=> 2
                    );
                    $res = $this->crud_model->update_operation($input_data,'exam_downloads', ['id' => $input['download_id']]);
                    if($res){
                        $this->session->set_flashdata('success_message','Uploaded Successfully');
                        move_uploaded_file($_FILES["main_answer"]["tmp_name"], "uploads/main/answers/". $input['download_id'].'.pdf');
                        redirect('u_maindownload', 'refresh');
                    }else{
                        $this->session->set_flashdata('error_message','Not Uploaded');
                        redirect('u_maindownload', 'refresh');
                    }
                }else{
                    $this->session->set_flashdata('error_message','Please upload only pdf files');
                    redirect('u_maindownload', 'refresh');
                }
            }
        }
        }
        if(isset($_POST['exam_type']) && isset($_POST['start_date']) && isset($_POST['end_date']) )
            $page_data['main_download'] = $this->crud_model->fetch_main_exam_downloaded_list($this->input->post('exam_type'), $this->input->post('start_date'), $this->input->post('end_date'));
            else
                $page_data['main_download'] = $this->my_model->fetch_main_exam_downloaded_list();
                $page_data['page_title'] = 'Main Download';
                $page_data['page_name'] = 'maindownload';
                $this->load->view('backend/index', $page_data);
    }
    
    public function myresults(){
        if($this->session->userdata('role_id')!=2){
        redirect('error_404');
        }
        $page_data['page_title'] = 'My Results';
        $page_data['page_name'] = 'myresults';
        $page_data['results'] = $this->crud_model->fetch_tail_exam_results();
        $this->load->view('backend/index', $page_data);
    }
    public function performancereport(){
        if($this->session->userdata('role_id')!=2){
        redirect('error_404');
        }
        $page_data['page_title'] = 'Performance Report';
        $page_data['page_name'] = 'performancereport';
       
        $this->load->view('backend/index', $page_data);
    }
    public function uploadhistory(){
        if($this->session->userdata('role_id')!=2){
        redirect('error_404');
        }
        $page_data['page_title'] = 'Upload History';
        $page_data['page_name'] = 'uploadhistory';
       
        $this->load->view('backend/index', $page_data);
    }
    public function notifications(){
        if($this->session->userdata('role_id')!=2){
        redirect('error_404');
        }
        $page_data['page_title'] = 'Notifications';
        $page_data['page_name'] = 'notifications';
       
        $this->load->view('backend/index', $page_data);
    }
    public function support(){
        if($this->session->userdata('role_id')!=2){
        redirect('error_404');
        }
        $page_data['page_title'] = 'Support';
        $page_data['page_name'] = 'support';
       
        $this->load->view('backend/index', $page_data);
    }
    public function notes(){
        if($this->session->userdata('role_id')!=2){
        redirect('error_404');
        }
        $page_data['page_title'] = 'Notes';
        $page_data['page_name'] = 'notes';
        $page_data['notes'] = $this->my_model->get_user_notes_info();
        $this->load->view('backend/index', $page_data);
    }
    public function videos(){
        if($this->session->userdata('role_id')!=2){
        redirect('error_404');
        }
        $page_data['page_title'] = 'Videos';
        $page_data['page_name'] = 'videos';
        $page_data['videos'] = $this->my_model->get_user_main_videos_info();
        $this->load->view('backend/index', $page_data);
    }
    public function guidelines(){
        if($this->session->userdata('role_id')!=2){
        redirect('error_404');
        }
        $page_data['page_title'] = 'Guidelines';
        $page_data['page_name'] = 'guidelines';
       
        $this->load->view('backend/index', $page_data);
    }
      
    function change_password() {
      if($this->input->post()){
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');
if ($this->form_validation->run() == TRUE) {
    $user_id=$this->session->userdata('login_id');
    $password=$this->input->post('password');
            $res=$this->crud_model->update_user_password($password,$user_id);
            if($res){
                $this->session->set_flashdata('success_message', 'Password Updated');
            }else{
                $this->session->set_flashdata('error_message', 'Password Not Updated');
            }
            redirect(base_url() . 'change_password', 'refresh');
        }
    }
        $page_data['page_name'] = 'change_password';
        $page_data['page_title'] = 'Change Password';
        $this->load->view('backend/index', $page_data);
        }
   public function received_sms(){
        if($this->session->userdata('role_id')!=2){
        redirect('error_404');
        }
        $page_data['page_title'] = 'Received SMS';
        $page_data['page_name'] = 'received_sms';
       
        $this->load->view('backend/index', $page_data);
    }
    public function feedback(){
        if($this->session->userdata('role_id')!=2){
        redirect('error_404');
        }
        if($this->input->post()){
            $input=$this->input->post();
            $inputData=array(
                'user_id'=>$this->session->userdata('login_id'),
                'message'=>$input['message'],
            );
            $res=$this->crud_model->saving_insert_details('feedback',$inputData);
            if($res>0){
                $this->session->set_flashdata('success_message',"Feedback Sent Successfully");
            }else{
                $this->session->set_flashdata('error_message',"Feedback Not Sent");
            }
            redirect($this->session->userdata('last_page'));
        }
        $page_data['page_title'] = 'Feedback';
        $page_data['page_name'] = 'feedback';
       
        $this->load->view('backend/index', $page_data);
    }
    public function common_delete_details($type,$where,$table){
        $ret=$this->crud_model->common_delete_details($type,$where,$table);
        if($ret){
                $this->session->set_flashdata('success_message', 'Deleted Successfully');
            }else{
                $this->session->set_flashdata('error_message', 'Not Deleted');
            }
            redirect($this->session->userdata('last_page'));
    }
    function error_404(){
        $page_data['page_title'] = 'Error 404';
        $page_data['page_name'] = 'error_404';
       
        $this->load->view('backend/index', $page_data);
    }

}
?>