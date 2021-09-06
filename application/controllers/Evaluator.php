<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Evaluator extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Kolkata');    
        error_reporting(0);  
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

        if($this->session->userdata('login_id')==''){
            redirect('auth');
        }
    }
  public function index() {
        if ($this->session->userdata('role_id') != 3){ 
            redirect(base_url() . 'auth', 'refresh');
        }
        if ($this->session->userdata('role_id') == 3){
            redirect(base_url() . 'e_dashboard', 'refresh');
        }
    }
    public function dashboard(){
        if($this->session->userdata('role_id')!=3){
        redirect('error_404');
        }
        $page_data['page_title'] = 'Dashboard';
        $page_data['page_name'] = 'dashboard';
        $this->load->view('backend/index', $page_data);
    }
    public function trailexams(){
        if($this->session->userdata('role_id')!=3){
        redirect('error_404');
        }
        if($this->input->post()){
        if($this->input->post('input_type')=='evaluated_answers'){
            $this->form_validation->set_rules('download_id', 'Download id', 'trim|required|xss_clean');
            if ($this->form_validation->run() == TRUE) {
                $input=$this->input->post();
                if(isset($_FILES['trail_answer']['name']) && $_FILES['trail_answer']['name']!="" && $mime = get_mime_by_extension($_FILES['trail_answer']['name'])=='application/pdf'){
                    $input_data=array(
                        'marks'=>$input['marks'],
                        'out_of'=>$input['out_of'],
                        'row_status'=> 4
                    );
                    $res = $this->crud_model->update_operation($input_data,'trail_exam_downloads', ['id' => $input['download_id']]);
                    if($res){
                        $this->session->set_flashdata('success_message','Uploaded Successfully');
                        move_uploaded_file($_FILES["trail_answer"]["tmp_name"], "uploads/trail/evaluated_answers/". $input['download_id'].'.pdf');
                        redirect('e_trailexams', 'refresh');
                    }else{
                        $this->session->set_flashdata('error_message','Not Uploaded');
                        redirect('e_trailexams', 'refresh');
                    }
                }
                else{
                    $this->session->set_flashdata('error_message','Please upload only pdf files');
                    redirect('e_trailexams', 'refresh');
                }
            }
        }
        }
        if(isset($_POST['exam_type']) && isset($_POST['start_date']) && isset($_POST['end_date']) )
              $page_data['trailexams'] = $this->crud_model->fetch_trail_exam_downloaded_list($this->input->post('exam_type'), $this->input->post('start_date'), $this->input->post('end_date'));
        else 
              $page_data['trailexams'] = $this->crud_model->fetch_trail_exam_downloaded_list();
        $page_data['page_title'] = 'Trail Exams';
        $page_data['page_name'] = 'trailexams';
       
        $this->load->view('backend/index', $page_data);
    }
    public function mainexams(){
        if($this->session->userdata('role_id')!=3){
        redirect('error_404');
        }
        if($this->input->post()){
        if($this->input->post('input_type')=='evaluated_answers'){
            $this->form_validation->set_rules('download_id', 'Download id', 'trim|required|xss_clean');
            if ($this->form_validation->run() == TRUE) {
                $input=$this->input->post();
                if(isset($_FILES['main_answer']['name']) && $_FILES['main_answer']['name']!="" && $mime = get_mime_by_extension($_FILES['main_answer']['name'])=='application/pdf'){
                    $input_data=array(
                        'marks'=>$input['marks'],
                        'out_of'=>$input['out_of'],
                        'row_status'=> 4
                    );
                    $res = $this->crud_model->update_operation($input_data,'exam_downloads', ['id' => $input['download_id']]);
                    if($res){
                        $this->session->set_flashdata('success_message','Uploaded Successfully');
                        move_uploaded_file($_FILES["main_answer"]["tmp_name"], "uploads/main/evaluated_answers/". $input['download_id'].'.pdf');
                        redirect('e_mainexams', 'refresh');
                    }else{
                        $this->session->set_flashdata('error_message','Not Uploaded');
                        redirect('e_mainexams', 'refresh');
                    }
                }
                else{
                    $this->session->set_flashdata('error_message','Please upload only pdf files');
                    redirect('e_mainexams', 'refresh');
                }
            }
        }
        }

        if(isset($_POST['exam_type']) && isset($_POST['start_date']) && isset($_POST['end_date']) )
              $page_data['main_download'] = $this->crud_model->fetch_main_exam_downloaded_list($this->input->post('exam_type'), $this->input->post('start_date'), $this->input->post('end_date'));
        else 
              $page_data['main_download'] = $this->crud_model->fetch_main_exam_downloaded_list();
        $page_data['page_title'] = 'Main Exams';
        $page_data['page_name'] = 'mainexams';
       
        $this->load->view('backend/index', $page_data);
    }
}