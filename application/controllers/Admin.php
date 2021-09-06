<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller 
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
        if ($this->session->userdata('role_id') != 1){ 
            redirect(base_url() . 'auth', 'refresh');
        }
        if ($this->session->userdata('role_id') == 1){
            redirect(base_url() . 'dashboard', 'refresh');
        }
    }
    public function dashboard(){
        if($this->session->userdata('role_id')!=1){
        redirect('error_404');
        }
        $page_data['page_title'] = 'Dashboard';
        $page_data['page_name'] = 'dashboard';
        $this->load->view('backend/index', $page_data);
    }
    public function addplans(){
        if($this->session->userdata('role_id')!=1){
        redirect('error_404');
        }
        $page_data['page_title'] = 'Add Plans';
        $page_data['page_name'] = 'addplans';
        
        $this->load->view('backend/index', $page_data);
    }
    public function addplan_plans(){
        if($this->session->userdata('role_id')!=1){
        redirect('error_404');
        }
        $page_data['page_title'] = 'Add Plans';
        $page_data['page_name'] = 'addplan_plans';
        if($this->input->post()){
            $input=$this->input->post();
            $input_data=array(
                'course_id'=>$input['course'],
                'module'=>$input['module'],
                'plan_type'=>$input['plan_type'],
                'plan_code'=>$input['plan_code'],
                'plan'=>$input['plan_name'],
                'headerbox'=>$input['header_box'],
                'downbox'=>$input['down_box'],
                'description'=>implode(':@',$input['description']),
            );
            
            $res=$this->crud_model->save_add_plans_info($input_data);
            if($res>0){
                $this->session->set_flashdata('success_message','Uploaded Successfully');
            }else{
                $this->session->set_flashdata('error_message','Not Uploaded');
            }
            redirect('addplanbox');
        }
        $this->load->view('backend/index', $page_data);
    }
    public function edit_plans($id){
        if($this->session->userdata('role_id')!=1){
        redirect('error_404');
        }
        $page_data['id']=$id;
        $page_data['page_title'] = 'Edit Plans';
        $page_data['page_name'] = 'edit_plans';
        if($this->input->post()){
            $input=$this->input->post();
            $input_data=array(
                'course_id'=>$input['course'],
                'plan_type'=>$input['plan_type'],
                'plan_code'=>$input['plan_code'],
                'plan'=>$input['plan_name'],
                'headerbox'=>$input['header_box'],
                'description'=>implode(':@',$input['description']),
            );
            $id=base64_decode($id);
            $res=$this->crud_model->update_plans_info($id,$input_data);
            if($res>0){
                $this->session->set_flashdata('success_message','Uploaded Successfully');
            }else{
                $this->session->set_flashdata('error_message','Not Uploaded');
            }
            redirect('addplanbox');
        }
        $this->load->view('backend/index', $page_data);
    }
     public function faileduser(){
        if($this->session->userdata('role_id')!=1){
        redirect('error_404');
        }
        $page_data['faileduser_data']=$this->crud_model->get_failedusers_info();
        $page_data['page_title'] = 'failed user';
        $page_data['page_name'] = 'faileduser';
       
        $this->load->view('backend/index', $page_data);
    }
     public function feedback(){
        if($this->session->userdata('role_id')!=1){
        redirect('error_404');
        }
        $page_data['page_title'] = 'feedback';
        $page_data['page_name'] = 'feedback';
       
        $this->load->view('backend/index', $page_data);
    }
     public function feelingformal(){
        if($this->session->userdata('role_id')!=1){
        redirect('error_404');
        }
        $page_data['page_title'] = 'feeling formal';
        $page_data['page_name'] = 'feelingformal';
       
        $this->load->view('backend/index', $page_data);
    }
     public function maindownload(){
        if($this->session->userdata('role_id')!=1){
        redirect('error_404');
        }
        $page_data['evaluator_data']=$this->crud_model->get_evaluator_info();
        $page_data['page_title'] = 'Main Download';
        $page_data['page_name'] = 'maindownload';
       
        $this->load->view('backend/index', $page_data);
    }

    public function mainupload(){
        if($this->session->userdata('role_id')!=1){
        redirect('error_404');
        }
        $page_data['page_title'] = 'Main Upload';
        $page_data['page_name'] = 'mainupload';
        $page_data['coursers'] = $this->crud_model->get_active_courses();
        $page_data['plans'] = $this->crud_model->get_all_plans();

        if($this->input->post()){
            $this->form_validation->set_rules('course_id', 'Course', 'trim|required|xss_clean');
            $this->form_validation->set_rules('plans[]', 'Plans', 'trim|required|xss_clean');
            /*$this->form_validation->set_rules('scheduled_date', 'Scheduled Date', 'trim|required|xss_clean');
            $this->form_validation->set_rules('scheduled_time', 'Scheduled Time', 'trim|required|xss_clean');*/
            $this->form_validation->set_rules('subject_id', 'Subject', 'trim|required|xss_clean');
            $this->form_validation->set_rules('subject_code', 'Subject Code', 'trim|required|xss_clean|is_unique[exams.subject_code]');
            $this->form_validation->set_rules('syllabus', 'Syllabus', 'trim|required|xss_clean');
            $this->form_validation->set_rules('max_marks', 'Max Marks', 'trim|required|xss_clean');
            $this->form_validation->set_rules('time_out', 'Time Out', 'trim|required|xss_clean');    
        if ($this->form_validation->run() == TRUE) {
            if(isset($_FILES['qp']['name']) && $_FILES['qp']['name']!=""){
            if($mime = get_mime_by_extension($_FILES['qp']['name'])=='application/pdf'){
                if(isset($_FILES['sa']['name']) && $_FILES['sa']['name']!=""){
                if($mime = get_mime_by_extension($_FILES['sa']['name'])=='application/pdf'){

            $input=$this->input->post();
/*            $d = $input['scheduled_date'];
$t = $input['scheduled_time'];
$dt = $d . " " . $t;
$dt=date('Y-m-d H:i:s',strtotime($dt));*/
        $data=array();
        $data['course_id']=$input['course_id'];
        /*$data['plan_ids']=implode(',',$input['plans']);*/
        //$data['scheduled_date']=$dt;
        $data['subject_id']=$input['subject_id'];
        $data['subject_code']=$input['subject_code'];
        $data['syllabus']=$input['syllabus'];
        $data['max_marks']=$input['max_marks'];
        $data['time_out']=$input['time_out'];
            $res=$this->crud_model->save_main_exam_info($data);
            if($res>0){
            $res=$this->crud_model->save_exam_plan_relation_info($input['plans'],$input['scheduled_date'],$res);
                $this->session->set_flashdata('success_message','Uploaded Successfully');

                move_uploaded_file($_FILES["qp"]["tmp_name"], "uploads/main/questions/". $res.'.pdf');



                
                move_uploaded_file($_FILES["sa"]["tmp_name"], "uploads/main/solved_answers/". $res.'.pdf');

            }else{
                $this->session->set_flashdata('error_message','Not Uploaded');
            }
            redirect('mainuploaddetails');
            }else{
            $this->session->set_flashdata('sa_error', 'Please select only pdf file.');
            }
            }else{
            $this->session->set_flashdata('sa_error', 'Please select pdf file.');
            }
            }else{
            $this->session->set_flashdata('qp_error', 'Please select only pdf file.');
            }
}else{
            $this->session->set_flashdata('qp_error', 'Please select pdf file.');
            }
            }
        }
        
        $this->load->view('backend/index', $page_data);
    }

    public function check_mainupload_code($value='')
    {
        $validation=$this->crud_model->select_results_info('exams',array('id !='=>$_POST['id'],'subject_code'=>$value))->num_rows();
            if($validation != 0){
                $this->form_validation->set_message('check_mainupload_code','Subject Code Existed');
                return false;
            }
            return true;
    }

        public function edit_mainupload($id){
            $id=base64_decode($id);
        if($this->session->userdata('role_id')!=1){
        redirect('error_404');
        }
        $page_data['page_title'] = 'Main Upload';
        $page_data['page_name'] = 'edit_mainupload';
        $page_data['coursers'] = $this->crud_model->get_active_courses();
        $page_data['plans'] = $this->crud_model->get_all_plans();
        $page_data['edit_upload'] = $this->crud_model->get_single_upload_details_info($id);
            if($this->input->post()){
                $_POST['id']=$id;
            $this->form_validation->set_rules('course_id', 'Course', 'trim|required|xss_clean');
            $this->form_validation->set_rules('plans[]', 'Plans', 'trim|required|xss_clean');
            /*$this->form_validation->set_rules('scheduled_date', 'Scheduled Date', 'trim|required|xss_clean');
            $this->form_validation->set_rules('scheduled_time', 'Scheduled Time', 'trim|required|xss_clean');*/
            $this->form_validation->set_rules('subject_id', 'Subject', 'trim|required|xss_clean');
            $this->form_validation->set_rules('subject_code', 'Subject Code', 'trim|required|xss_clean|callback_check_mainupload_code');
            $this->form_validation->set_rules('syllabus', 'Syllabus', 'trim|required|xss_clean');
            $this->form_validation->set_rules('max_marks', 'Max Marks', 'trim|required|xss_clean');
            $this->form_validation->set_rules('time_out', 'Time Out', 'trim|required|xss_clean');    
        if ($this->form_validation->run() == TRUE) {
           /* if(isset($_FILES['qp']['name']) && $_FILES['qp']['name']!=""){
            if($mime = get_mime_by_extension($_FILES['qp']['name'])=='application/pdf'){
                if(isset($_FILES['qp']['name']) && $_FILES['qp']['name']!=""){
                if($mime = get_mime_by_extension($_FILES['sa']['name'])=='application/pdf'){*/

            $input=$this->input->post();
/*            $d = $input['scheduled_date'];
$t = $input['scheduled_time'];
$dt = $d . " " . $t;
$dt=date('Y-m-d H:i:s',strtotime($dt));*/
        $data=array();
        $data['course_id']=$input['course_id'];
        /*$data['plan_ids']=implode(',',$input['plans']);*/
        //$data['scheduled_date']=$dt;
        $data['subject_id']=$input['subject_id'];
        $data['subject_code']=$input['subject_code'];
        $data['syllabus']=$input['syllabus'];
        $data['max_marks']=$input['max_marks'];
        $data['time_out']=$input['time_out'];
            $res=$this->crud_model->update_operation($data,'exams',array('id'=>$id));
            if($res){
            $res=$this->crud_model->save_exam_plan_relation_info($input['plans'],$input['scheduled_date'],$res);
                $this->session->set_flashdata('success_message','Uploaded Successfully');
if(isset($_FILES['qp']['name']) && $_FILES['qp']['name']!=""){
                move_uploaded_file($_FILES["qp"]["tmp_name"], "uploads/main/questions/". $res.'.pdf');

}

                if(isset($_FILES['sa']['name']) && $_FILES['sa']['name']!=""){
                move_uploaded_file($_FILES["sa"]["tmp_name"], "uploads/main/solved_answers/". $res.'.pdf');
            }
            }else{
                $this->session->set_flashdata('error_message','Not Uploaded');
            }
            redirect('mainuploaddetails');
            /*}else{
            $this->session->set_flashdata('sa_error', 'Please select only pdf file.');
            }
            }else{
            $this->session->set_flashdata('sa_error', 'Please select pdf file.');
            }
            }else{
            $this->session->set_flashdata('qp_error', 'Please select only pdf file.');
            }
}else{
            $this->session->set_flashdata('qp_error', 'Please select pdf file.');
            }*/
            }
        }
        
        $this->load->view('backend/index', $page_data);
    }
    public function mainuploaddetails(){
        if($this->session->userdata('role_id')!=1){
        redirect('error_404');
        }
        $page_data['page_title'] = 'Main Upload Details';
        $page_data['page_name'] = 'mainuploaddetails';
       
        $this->load->view('backend/index', $page_data);
    }
    public function mainuser(){
        if($this->session->userdata('role_id')!=1){
        redirect('error_404');
        }
        $page_data['mainuser_data']=$this->crud_model->get_mainusers_info();
        $page_data['page_title'] = 'Main User';
        $page_data['page_name'] = 'mainuser';
       
        $this->load->view('backend/index', $page_data);
    }
    public function trailuser(){
        if($this->session->userdata('role_id')!=1){
        redirect('error_404');
        }
        $page_data['trailuser_data']=$this->crud_model->get_trailusers_info();
        $page_data['page_title'] = 'Trail User';
        $page_data['page_name'] = 'trailuser';
       
        $this->load->view('backend/index', $page_data);
    }


    public function view_user($user_type,$user_id)
    {
        if($this->session->userdata('role_id')!=1){
        redirect('error_404');
        }
        /*if($user_type=='trail'){

        }elseif($user_type=='main'){
            $userdata=
        }*/
        $userdata=$this->crud_model->select_results_info('users',array('id'=>$user_id))->row_array();
        $page_data['user_data']=$userdata;
        $page_data['user_type']=$user_type;
        /*$page_data['page_title'] = 'View User';
        $page_data['page_name'] = 'view_user';
        $this->load->view('backend/index', $page_data); */
        $this->load->view('backend/admin/view_user', $page_data);   
    }

    public function edit_user($value='')
    {
        $page_data['page_title'] = 'View User';
        $page_data['page_name'] = 'edit_user';
        $this->load->view('backend/index', $page_data); 
    }

   public function closedtabs(){
    if($this->session->userdata('role_id')!=1){
        redirect('error_404');
        }
        $page_data['page_title'] = 'Closed Tabs';
        $page_data['page_name'] = 'closedtabs';
       
        $this->load->view('backend/index', $page_data);
    }
    public function notes(){
        if($this->session->userdata('role_id')!=1){
        redirect('error_404');
        }
        $page_data['page_title'] = 'Notes';
        $page_data['page_name'] = 'notes';
       
        $this->load->view('backend/index', $page_data);
    }
    public function notes_add(){
        if($this->session->userdata('role_id')!=1){
        redirect('error_404');
        }
        $page_data['page_title'] = 'Add Notes';
        $page_data['page_name'] = 'notes_add';
       if($this->input->post()){
            $this->form_validation->set_rules('course', 'Course', 'trim|required|xss_clean');
            $this->form_validation->set_rules('subject', 'Subject', 'trim|required|xss_clean');
            $this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');    
        if ($this->form_validation->run() == TRUE) {
            if(isset($_FILES['notes']['name']) && $_FILES['notes']['name']!=""){
            if($mime = get_mime_by_extension($_FILES['notes']['name'])=='application/pdf'){
            $input=$this->input->post();
            $input_data=array(
                'course_id'=>$input['course'],
                'subject_id'=>$input['subject'],
                'title'=>$input['title']
            );
            $res=$this->crud_model->save_notes_info($input_data);
            if($res>0){
                $this->session->set_flashdata('success_message','Uploaded Successfully');
                move_uploaded_file($_FILES["notes"]["tmp_name"], "uploads/main/notes/". $res.'.pdf');

            }else{
                $this->session->set_flashdata('error_message','Not Uploaded');
            }
            redirect('notes');
            }else{
            $this->session->set_flashdata('notes_error', 'Please select only pdf file.');
            }
}else{
            $this->session->set_flashdata('notes_error', 'Please select pdf file.');
            }
            }
        }
        $this->load->view('backend/index', $page_data);
    }
    public function videos_mainexam(){
        if($this->session->userdata('role_id')!=1){
        redirect('error_404');
        }
        $page_data['page_title'] = 'Videos Mainexam';
        $page_data['page_name'] = 'videos_mainexam';
       
        $this->load->view('backend/index', $page_data);
    }
    public function videos_mainexam_add(){
        if($this->session->userdata('role_id')!=1){
        redirect('error_404');
        }
        $page_data['page_title'] = 'Add Mainexam Videos';
        $page_data['page_name'] = 'videos_mainexam_add';
        if($this->input->post()){
            $this->form_validation->set_rules('course', 'Course', 'trim|required|xss_clean');
            $this->form_validation->set_rules('subject', 'Subject', 'trim|required|xss_clean');
            $this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean'); 
            $this->form_validation->set_rules('url', 'Video Link', 'trim|required|xss_clean');    
        if ($this->form_validation->run() == TRUE) {
            $input=$this->input->post();
            $input_data=array(
                'course_id'=>$input['course'],
                'subject_id'=>$input['subject'],
                'title'=>$input['title'],
                'url'=>$input['url']
            );
            $res=$this->crud_model->save_mainvideo_info($input_data);
            if($res>0){
                $this->session->set_flashdata('success_message','Uploaded Successfully');
            }else{
                $this->session->set_flashdata('error_message','Not Uploaded');
            }
            redirect('videos_mainexam');
            }
        }
        $this->load->view('backend/index', $page_data);
    }
public function sugganswerrequest(){
    if($this->session->userdata('role_id')!=1){
        redirect('error_404');
        }
        $page_data['page_title'] = 'Suggest Answer Request';
        $page_data['page_name'] = 'sugganswerrequest';
       
        $this->load->view('backend/index', $page_data);
    }
    public function guidelines(){
        if($this->session->userdata('role_id')!=1){
        redirect('error_404');
        }
        $page_data['page_title'] = 'Guidelines';
        $page_data['page_name'] = 'guidelines';
        if($_FILES){

        if(isset($_FILES['guidelines']['name']) && $_FILES['guidelines']['name']!=""){
        if($mime = get_mime_by_extension($_FILES['guidelines']['name'])=='application/pdf'){
                $this->session->set_flashdata('success_message','Uploaded Successfully');
                move_uploaded_file($_FILES["guidelines"]["tmp_name"], "uploads/main/guidelines.pdf");
            redirect('guidelines');
            }else{
            $this->session->set_flashdata('guidelines_error', 'Please select only pdf file.');
            }
            }else{
            $this->session->set_flashdata('guidelines_error', 'Please select pdf file.');
            }
        }
        $this->load->view('backend/index', $page_data);
    }
    public function flash_image(){
        if($this->session->userdata('role_id')!=1){
        redirect('error_404');
        }
        $page_data['page_title'] = 'Flash Image';
        $page_data['page_name'] = 'flash_image';
        if($_FILES){
        if(isset($_FILES['flash_image']['name']) && $_FILES['flash_image']['name']!=""){
        if($mime = (get_mime_by_extension($_FILES['flash_image']['name'])=='image/jpg' || get_mime_by_extension($_FILES['flash_image']['name'])=='image/jpeg')){
                $this->session->set_flashdata('success_message','Uploaded Successfully');
                move_uploaded_file($_FILES["flash_image"]["tmp_name"], "uploads/flash_image.jpg");
            redirect('flash_image');
            }else{
            $this->session->set_flashdata('flash_image_error', 'Please select only JPG file.');
            }
            }else{
            $this->session->set_flashdata('flash_image_error', 'Please select JPG file.');
            }
        }
        $this->load->view('backend/index', $page_data);
    }
    public function trailupload(){
        if($this->session->userdata('role_id')!=1){
        redirect('error_404');
        }
        $page_data['page_title'] = 'Trail Upload';
        $page_data['page_name'] = 'trailupload';
        $page_data['trailupload'] = $this->crud_model->get_trailupload_info();
        if($this->input->post()){
            $this->form_validation->set_rules('course', 'Course', 'trim|required|xss_clean');
            $this->form_validation->set_rules('exam', 'Time Out', 'trim|required|xss_clean');    
            $this->form_validation->set_rules('subject', 'Subject', 'trim|required|xss_clean');
            
        if ($this->form_validation->run() == TRUE) {
            if(isset($_FILES['qp']['name']) && $_FILES['qp']['name']!=""){
            if($mime = get_mime_by_extension($_FILES['qp']['name'])=='application/pdf'){
                if(isset($_FILES['qp']['name']) && $_FILES['qp']['name']!=""){
                if($mime = get_mime_by_extension($_FILES['sa']['name'])=='application/pdf'){

            $input=$this->input->post();
            $input_data=array(
                'course'=>$input['course'],
                'exam'=>$input['exam'],
                'subject'=>$input['subject']
            );
            $res=$this->crud_model->save_trail_exam_info($input_data);
            if($res>0){
                $this->session->set_flashdata('success_message','Uploaded Successfully');
                move_uploaded_file($_FILES["qp"]["tmp_name"], "uploads/trail/questions/". $res.'.pdf');
                move_uploaded_file($_FILES["sa"]["tmp_name"], "uploads/trail/solved_answers/". $res.'.pdf');

            }else{
                $this->session->set_flashdata('error_message','Not Uploaded');
            }
            redirect('trailupload');
            }else{
            $this->session->set_flashdata('sa_error', 'Please select only pdf file.');
            }
            }else{
            $this->session->set_flashdata('sa_error', 'Please select pdf file.');
            }
            }else{
            $this->session->set_flashdata('qp_error', 'Please select only pdf file.');
            }
}else{
            $this->session->set_flashdata('qp_error', 'Please select pdf file.');
            }
            }
        }
        $this->load->view('backend/index', $page_data);
    }
    public function traildownload(){
        if($this->session->userdata('role_id')!=1){
        redirect('error_404');
        }
        if(isset($_POST['exam_type']) && isset($_POST['start_date']) && isset($_POST['end_date']) )
              $page_data['trail_download'] = $this->crud_model->fetch_trail_exam_downloaded_list($this->input->post('exam_type'), $this->input->post('start_date'), $this->input->post('end_date'));
        else 
              $page_data['trail_download'] = $this->crud_model->fetch_trail_exam_downloaded_list();

        $page_data['evaluator_data']=$this->crud_model->get_evaluator_info();
        $page_data['page_title'] = 'Trail Download';
        $page_data['page_name'] = 'traildownload';
       
        $this->load->view('backend/index', $page_data);
    }
    public function traildashboard($id=''){
        if($id!=''){
            $id=base64_decode($id);
            $page_data['edit_data']=$this->crud_model->get_single_traildashboard_info($id);
        }else{
            $page_data['edit_data']='';
        }
        if($this->session->userdata('role_id')!=1){
        redirect('error_404');
        }
        $page_data['page_title'] = 'Trail Dashboard';
        $page_data['page_name'] = 'traildashboard';

        if($this->input->post()){
            $input=$this->input->post();
            $input_data=array(
                'course'=>$input['course'],
                'url'=>implode(':@',$input['url']),
                'instructions'=>implode(':@',$input['instructions']),
            );
            if($id!=''){
            $res=$this->crud_model->update_trail_dashboard_info($id,$input_data);
            if($res){
                $this->session->set_flashdata('success_message','Updated Successfully');
            }else{
                $this->session->set_flashdata('error_message','Not Updated');
            }
        }else{
            $res=$this->crud_model->save_trail_dashboard_info($input_data);
            if($res>0){
                $this->session->set_flashdata('success_message','Uploaded Successfully');
            }else{
                $this->session->set_flashdata('error_message','Not Uploaded');
            }
        }

            redirect($this->session->userdata('last_page'));
        }
        $this->load->view('backend/index', $page_data);
    }
    public function assign_evaluator(){
        if($this->session->userdata('role_id')!=1){
        redirect('error_404');
        }
        if($this->input->post()){
            $input=$this->input->post();
            if($input['type']=='trail'){
                $table='trail_exam_downloads';
            }elseif($input['type']=='main'){
                $table='exam_downloads';
            }
            $input_data['download']=$input['download'];
            $input_data['evaluator']=$input['evaluator'];
            $res=$this->crud_model->assign_evaluator_info($table,$input_data);   
            $this->session->set_flashdata('success_message','Evaluator Assigned Successfully');
            redirect($this->session->userdata('last_page'));
        }
    }
    public function results(){
        if($this->session->userdata('role_id')!=1){
        redirect('error_404');
        }
        $page_data['page_title'] = 'Results';
        $page_data['page_name'] = 'results';
       
        $this->load->view('backend/index', $page_data);
    }
    public function requestcallback(){
        if($this->session->userdata('role_id')!=1){
        redirect('error_404');
        }
        $page_data['page_title'] = 'Request Callback';
        $page_data['page_name'] = 'requestcallback';
       
        $this->load->view('backend/index', $page_data);
    }
    public function createpromo($type){
        if($this->session->userdata('role_id')!=1){
        redirect('error_404');
        }
        if($type=='promocodes'){
            $page_data['page_url']='createpromo';
        }elseif($type=='passguarantee'){
            $page_data['page_url']='passguaranteepromo';
        }
        $page_data['page_title'] = 'Create Promo';
        $page_data['page_name'] = 'createpromo';
        $page_data['promo_type'] = $type;
        if($this->input->post()){
            $input=$this->input->post();
            $input_data=array(
                'type'=>$type,
                'name'=>$input['name'],
                'code'=>$input['code'],
                'discount'=>$input['discount'],
                'valid_from'=>date('Y-m-d',strtotime($input['valid_from'])),
                'valid_to'=>date('Y-m-d',strtotime($input['valid_to'])),
            );
            $res=$this->crud_model->save_promocodes_info($input_data);
            if($res){
                $this->session->set_flashdata('success_message','Uploaded Successfully');
            }else{
                $this->session->set_flashdata('error_message','Uploaded Successfully');
            }
            redirect(base_url($page_data['page_url']));
        }
        $this->load->view('backend/index', $page_data);
    }
    public function promocodes(){
        if($this->session->userdata('role_id')!=1){
        redirect('error_404');
        }
        $page_data['page_title'] = 'Promocodes';
        $page_data['page_name'] = 'promocodes';
        $this->load->view('backend/index', $page_data);
    }
    public function add_promocode(){
        if($this->session->userdata('role_id')!=1){
        redirect('error_404');
        }
        $page_data['page_title'] = 'Add Promocode';
        $page_data['page_name'] = 'add_promocode';
        if($this->input->post()){
            $input=$this->input->post();
            $input_data=array(
                'course_id'=>$input['course'],
                'plan_id'=>$input['plan'],
                'name'=>$input['name'],
                'code'=>$input['code'],
                'discount'=>$input['discount'],
                'valid_from'=>date('Y-m-d',strtotime($input['valid_from'])),
                'valid_to'=>date('Y-m-d',strtotime($input['valid_to'])),
            );
            $res=$this->crud_model->save_promocodes_info($input_data);
            if($res){
                $this->session->set_flashdata('success_message','Uploaded Successfully');
            }else{
                $this->session->set_flashdata('error_message','Uploaded Successfully');
            }
            redirect(base_url('promocodes'));
        }
        $this->load->view('backend/index', $page_data);
    }
    public function edit_promocode($id){

        if($this->session->userdata('role_id')!=1){
        redirect('error_404');
        }
        $page_data['id'] =$id;
        $page_data['page_title'] = 'Edit Promocode';
        $page_data['page_name'] = 'edit_promocode';
        if($this->input->post()){
            $input=$this->input->post();
            $input_data=array(
                'course_id'=>$input['course'],
                'plan_id'=>$input['plan'],
                'name'=>$input['name'],
                'code'=>$input['code'],
                'discount'=>$input['discount'],
                'valid_from'=>date('Y-m-d',strtotime($input['valid_from'])),
                'valid_to'=>date('Y-m-d',strtotime($input['valid_to'])),
            );
            $id=base64_decode($id);
            $res=$this->crud_model->update_promocodes_info($id,$input_data);
            if($res){
                $this->session->set_flashdata('success_message','Uploaded Successfully');
            }else{
                $this->session->set_flashdata('error_message','Uploaded Successfully');
            }
            redirect(base_url('promocodes'));
        }
        $this->load->view('backend/index', $page_data);
    }
    /*public function createpromo(){
        $page_data['page_title'] = 'Create Promo';
        $page_data['page_name'] = 'createpromo';
       
        $this->load->view('backend/index', $page_data);
    }*/
    /*public function passguaranteepromo(){
        $page_data['page_title'] = 'Pass Guarantee Promo';
        $page_data['page_name'] = 'passguaranteepromo';
       
        $this->load->view('backend/index', $page_data);
    }*/
    public function managepromo(){
        if($this->session->userdata('role_id')!=1){
        redirect('error_404');
        }
        $page_data['page_title'] = 'Manage Promo';
        $page_data['page_name'] = 'managepromo';
       
        $this->load->view('backend/index', $page_data);
    }
    public function sms(){
        if($this->session->userdata('role_id')!=1){
        redirect('error_404');
        }
        if($this->input->post()){
            $input=$this->input->post();
            /*$input_data=array(
                'sms'=>$input['message'],
                'subject'=>$input['subject'],
                'plan_ids'=>json_encode($input['plans'])
            );
            $res=$this->crud_model->save_sms_info($input_data,$input['plans']);*/

            $this->load->model('sms_model');
            $message=$input['subject'].'<br/>'.$input['message'];
            for ($i=0; $i < count($input['plans']); $i++) { 
                if($i==0){
                    $where='plan_id='.$input['plans'][$i];
                }elseif($i>0){
                    $where=$where.' OR plan_id='.$input['plans'][$i];
                }
            }
            $num=$this->crud_model->select_results_info('users_plan_relation',$where)->result_array();
            $users=array_unique(array_column($num, 'user_id'));
            $users= array_keys(array_count_values($users));

            for ($i=0; $i < count($users); $i++) { 
                if($i==0){
                    $where1='(row_status= 1) AND id='.$users[$i];
                }elseif($i>0){
                    $where1=$where1.' OR id='.$users[$i];
                }
            }
            $num1=$this->crud_model->select_results_info('users',$where1)->result_array();
            $numbers=array_column($num1, 'mobile');
            $numbers=implode(',',$numbers);
            $res=$this->sms_model->send_sms($message,$numbers);
            if(!empty($res)){
                $this->session->set_flashdata('success_message','SMS Sent Successfully');
            }else{
                $this->session->set_flashdata('error_message','SMS Not Sent');
            }
            redirect('sms');
        }
        $page_data['page_title'] = 'SMS';
        $page_data['page_name'] = 'sms';
       
        $this->load->view('backend/index', $page_data);
    }
    public function sended_sms(){
        if($this->session->userdata('role_id')!=1){
        redirect('error_404');
        }
        $page_data['page_title'] = 'Sended SMS';
        $page_data['page_name'] = 'sended_sms';
       
        $this->load->view('backend/index', $page_data);
    }
    public function support(){
        if($this->session->userdata('role_id')!=1){
        redirect('error_404');
        }
        $page_data['page_title'] = 'Support';
        $page_data['page_name'] = 'support';
       
        $this->load->view('backend/index', $page_data);
    }
    public function addplanbox(){
        if($this->session->userdata('role_id')!=1){
        redirect('error_404');
        }
        $page_data['page_title'] = 'Add Plan Box';
        $page_data['page_name'] = 'addplanbox';
       
        $this->load->view('backend/index', $page_data);
    }
    public function cptplan($plan_id){
        if($this->session->userdata('role_id')!=1){
        redirect('error_404');
        }
        $course=$this->crud_model->get_single_course_info($plan_id);
        $page_data['page_title'] = $course['course'].' Plan';
        $page_data['page_name'] = 'cptplan';
        $page_data['plan_id'] = $plan_id;
        $page_data['plans']=$this->crud_model->get_plan_prices_by_id($plan_id);
        $this->load->view('backend/index', $page_data);
    }
    public function plan_add($id){
        if($this->session->userdata('role_id')!=1){
        redirect('error_404');
        }
        $page_data['page_title'] = 'Add Plan';
        $page_data['page_name'] = 'plan_add';
        $page_data['course_id'] = $id;
        if($this->input->post()){
            $input=$this->input->post();
            if($input['type']==0){
                $subject_id=$input['subject_id'];
            }else{
                $subject_id='';
            }
            $input_data=array(
                'course_id'=>$input['course'],
                'plan_id'=>$input['plan'],
                'type'=>$input['type'],
                'subject_id'=>$subject_id,
                'subject_name'=>$input['subject'],
                'actual_price'=>$input['actual_price'],
                'discount_price'=>$input['discount_price'],
                'description'=>implode(':@',$input['description']),
            );
            
            $res=$this->crud_model->save_plan_prices_info($input_data);
            if($res>0){
                $this->session->set_flashdata('success_message','Uploaded Successfully');
            }else{
                $this->session->set_flashdata('error_message','Not Uploaded');
            }
            redirect($this->session->userdata('last_page'));
        }
        $this->load->view('backend/index', $page_data);
    }
    public function edit_plan($id){
        if($this->session->userdata('role_id')!=1){
        redirect('error_404');
        }
        $page_data['page_title'] = 'Edit Plan';
        $page_data['page_name'] = 'edit_plan';
        $page_data['id'] = $id;
        if($this->input->post()){
            $input=$this->input->post();
            if($input['type']==0){
                $subject_id=$input['subject_id'];
            }else{
                $subject_id=NULL;
            }
            $input_data=array(
                'course_id'=>$input['course'],
                'plan_id'=>$input['plan'],
                'type'=>$input['type'],
                'subject_id'=>$subject_id,
                'subject_name'=>$input['subject'],
                'actual_price'=>$input['actual_price'],
                'discount_price'=>$input['discount_price'],
                'description'=>implode(':@',$input['description']),
            );
            $id=base64_decode($id);
            $res=$this->crud_model->update_plan_prices_info($id,$input_data);
            if($res>0){
                $this->session->set_flashdata('success_message','Updated Successfully');
            }else{
                $this->session->set_flashdata('error_message','Not Updated');
            }
            redirect($this->session->userdata('last_page'));
        }
        $this->load->view('backend/index', $page_data);
    }
    public function cptplan_add(){
        if($this->session->userdata('role_id')!=1){
        redirect('error_404');
        }
        $page_data['page_title'] = 'Add CPT Plan';
        $page_data['page_name'] = 'cptplan_add';
       
        $this->load->view('backend/index', $page_data);
    }
    public function ipccplan_add(){
        if($this->session->userdata('role_id')!=1){
        redirect('error_404');
        }
        $page_data['page_title'] = 'Add IPCC Plan';
        $page_data['page_name'] = 'ipccplan_add';
       
        $this->load->view('backend/index', $page_data);
    }
    public function ipccplan(){
        if($this->session->userdata('role_id')!=1){
        redirect('error_404');
        }
        $page_data['page_title'] = 'IPCC Plan';
        $page_data['page_name'] = 'ipccplan';
       
        $this->load->view('backend/index', $page_data);
    }
    public function finalplans(){
        if($this->session->userdata('role_id')!=1){
        redirect('error_404');
        }
        $page_data['page_title'] = 'Final Plans';
        $page_data['page_name'] = 'finalplans';
       
        $this->load->view('backend/index', $page_data);
    }
    public function cptnewplan(){
        if($this->session->userdata('role_id')!=1){
        redirect('error_404');
        }   
        $page_data['page_title'] = 'CPT New Plan';
        $page_data['page_name'] = 'cptnewplan';
       
        $this->load->view('backend/index', $page_data);
    }
    public function ipccnewplan(){
        if($this->session->userdata('role_id')!=1){
        redirect('error_404');
    }
        $page_data['page_title'] = 'IPCC New Plan';
        $page_data['page_name'] = 'ipccnewplan';
       
        $this->load->view('backend/index', $page_data);
    }
     public function subjects(){
        if($this->session->userdata('role_id')!=1){
        redirect('error_404');
    }
        $page_data['page_title'] = 'Subjects';
        $page_data['page_name'] = 'subjects';
        $this->load->view('backend/index', $page_data);
    }
    public function add_subject(){
        if($this->session->userdata('role_id')!=1){
        redirect('error_404');
    }
        $page_data['page_title'] = 'Add Subject';
        $page_data['page_name'] = 'add_subject';
        if($this->input->post()){
            $input=$this->input->post();
            $input_data=array(
                'course_id'=>$input['course'],
                'type'=>$input['type'],
                'subject'=>$input['subject']
            );
            $res=$this->crud_model->saving_insert_details('subjects',$input_data);
            if($res>0){
                $this->session->set_flashdata('success_message','Uploaded Successfully');
            }else{
                $this->session->set_flashdata('error_message','Not Uploaded');
            }
            redirect('subjects');
        }
        $this->load->view('backend/index', $page_data);
    }
    public function addshopitem(){
        if($this->session->userdata('role_id')!=1){
        redirect('error_404');
    }
        $page_data['page_title'] = 'Add Shop Items';
        $page_data['page_name'] = 'addshopitem';
        $this->load->view('backend/index', $page_data);
    }
 public function viewbookings(){
    if($this->session->userdata('role_id')!=1){
        redirect('error_404');
    }
        $page_data['page_title'] = 'View Bookings';
        $page_data['page_name'] = 'viewbookings';
        $this->load->view('backend/index', $page_data);
    }
    public function add_book(){
        if($this->session->userdata('role_id')!=1){
        redirect('error_404');
    }
        $page_data['page_title'] = 'Add Book';
        $page_data['page_name'] = 'addbook';
        if($this->input->post()){
            $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('author', 'Author Name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('pages', 'No.Of Pages', 'trim|required|xss_clean');
            $this->form_validation->set_rules('actual_price', 'Actual Price', 'trim|required|xss_clean');
            $this->form_validation->set_rules('discount_price', 'Discount Price', 'trim|required|xss_clean');
            $this->form_validation->set_rules('type', 'Type', 'trim|required|xss_clean');
        if ($this->form_validation->run() == TRUE) {
            if(isset($_FILES['img']['name']) && $_FILES['img']['name']!=""){
            if($mime = (get_mime_by_extension($_FILES['img']['name'])=='image/jpg' || get_mime_by_extension($_FILES['img']['name'])=='image/jpeg')){
                if((isset($_FILES['book']['name']) && $_FILES['book']['name']!="") || ($this->input->post('book_type') == 'hardcopy')){
                if(($mime = get_mime_by_extension($_FILES['book']['name'])=='application/pdf') || ($this->input->post('book_type') == 'hardcopy')){

            $input=$this->input->post();
        $data=array(
            'name'=>$input['name'],
            'author'=>$input['author'],
            'pages'=>$input['pages'],
            'actual_price'=>$input['actual_price'],
            'discount_price'=>$input['discount_price'],
            'type'=>$input['type'],
            'book_type'=>$input['book_type']
        );
        
            $res=$this->crud_model->saving_insert_details('shopbooks',$data);
            if($res>0){
                $this->session->set_flashdata('success_message','Uploaded Successfully');
                move_uploaded_file($_FILES["img"]["tmp_name"], "uploads/shop/images/". $res.'.jpg');
                if($this->input->post('book_type') == 'softcopy'){
                move_uploaded_file($_FILES["book"]["tmp_name"], "uploads/shop/books/". $res.'.pdf');
                }

            }else{
                $this->session->set_flashdata('error_message','Not Uploaded');
            }
            redirect('addshopitem');
            }else{
            $this->session->set_flashdata('book_error', 'Please select only pdf file.');
            }
            }else{
            $this->session->set_flashdata('book_error', 'Please select pdf file.');
            }
            }else{
            $this->session->set_flashdata('img_error', 'Please select only jpg file.');
            }
}else{
            $this->session->set_flashdata('img_error', 'Please select jpg file.');
            }
            }
        }
        
        $this->load->view('backend/index', $page_data);
    }
    function e_brochers(){
        if($this->session->userdata('role_id')!=1){
        redirect('error_404');
        }
        $page_data['page_name'] = 'e_brochers';
        $page_data['page_title'] = 'E-Brouchers';
        $page_data['settings'] = $this->db->get('e_brochers')->result_array();
        if($this->input->post()){
            $this->form_validation->set_rules('course', 'Course', 'trim|required|xss_clean');
        if ($this->form_validation->run() == TRUE) {
                if(isset($_FILES['brocher']['name']) && $_FILES['brocher']['name']!=""){
                if($mime = get_mime_by_extension($_FILES['brocher']['name'])=='application/pdf'){

            $input=$this->input->post();
            $r_d=$this->crud_model->select_results_info('e_brochers',array('course'=>$input['course']))->row_array();
            $data=array(
                'course'=>$input['course'],
                'file_name'=>$input['course'].'-'.date('Y-m-d').'.pdf'
            );
            if(empty($r_d)){
                $res=$this->crud_model->saving_insert_details('e_brochers',$data);
            }else{
                $res=$this->crud_model->update_operation($data,'e_brochers',$r_d['id']);
                $res=$r_d['id'];
            }
            
            if($res>0){
                $this->session->set_flashdata('success_message','Uploaded Successfully');
                move_uploaded_file($_FILES["brocher"]["tmp_name"], "uploads/e-brochers/". $data['file_name']);
            }else{
                $this->session->set_flashdata('error_message','Not Uploaded');
            }
            redirect('e_brochers');
            }else{
            $this->session->set_flashdata('brocher_error', 'Please select only pdf file.');
            }
            }else{
            $this->session->set_flashdata('brocher_error', 'Please select pdf file.');
            }
            }
        }
        $this->load->view('backend/index', $page_data);
    }
        function schedules(){
        if($this->session->userdata('role_id')!=1){
        redirect('error_404');
        }
        $page_data['page_name'] = 'schedules';
        $page_data['page_title'] = 'Schedules';
        $page_data['settings'] = $this->db->get('schedules')->result_array();
        if($this->input->post()){
            $this->form_validation->set_rules('course', 'Course', 'trim|required|xss_clean');
            $this->form_validation->set_rules('plan', 'Course', 'trim|required|xss_clean');
        if ($this->form_validation->run() == TRUE) {
                if(isset($_FILES['schedule']['name']) && $_FILES['schedule']['name']!=""){
                if($mime = get_mime_by_extension($_FILES['schedule']['name'])=='application/pdf'){

            $input=$this->input->post();
             /*'file_name'=>$this->crud_model->get_type_name_by_where('courses', 'id', $input['course'], 'course').'-'.$this->crud_model->get_type_name_by_where('plans', 'id', $input['plan'], 'plan').'-'.date('Y-m-d').'.pdf',*/
        $data=array(
            'course_id'=>$input['course'],
            'plan_id'=>$input['plan'],
            'file_name'=>$_FILES["schedule"]["name"],
        );
        
            $res=$this->crud_model->save_schedule_info($data);
            if($res>0){
                $this->session->set_flashdata('success_message','Uploaded Successfully');
                move_uploaded_file($_FILES["schedule"]["tmp_name"], "uploads/schedules/". $data['file_name']);
            }else{
                $this->session->set_flashdata('error_message','Not Uploaded');
            }
            redirect('schedules');
            }else{
            $this->session->set_flashdata('schedule_error', 'Please select only pdf file.');
            }
            }else{
            $this->session->set_flashdata('schedule_error', 'Please select pdf file.');
            }
            }
        }
        $this->load->view('backend/index', $page_data);
    }
    function videos(){
        if($this->session->userdata('role_id')!=1){
        redirect('error_404');
        }
        $page_data['page_name'] = 'videos';
        $page_data['page_title'] = 'Videos';
        if($this->input->post()){
         /*   if($this->input->post('video_type')=='pages'){
            $this->form_validation->set_rules('course', 'Course', 'trim|required|xss_clean');
            $this->form_validation->set_rules('page_name', 'Page', 'trim|required|xss_clean');
            $this->form_validation->set_rules('url', 'Video URL', 'trim|required|xss_clean');
        if ($this->form_validation->run() == TRUE) {
            $input=$this->input->post();
        $data=array(
            'page_name'=>$input['page_name'],
            'course_id'=>$input['course'],
            'url'=>$input['url']
        );
            $res=$this->crud_model->save_video_info($data);
            if($res>0){
                $this->session->set_flashdata('success_message','Uploaded Successfully');
            }else{
                $this->session->set_flashdata('error_message','Not Uploaded');
            }
            redirect('videos');
            }
        }*/
        if($this->input->post('video_type')!=''){
            if($this->input->post('video_type')=='pages'){
            $this->form_validation->set_rules('course', 'Course', 'trim|required|xss_clean');
            $this->form_validation->set_rules('page_name', 'Page', 'trim|required|xss_clean');
            $this->form_validation->set_rules('url', 'Video URL', 'trim|required|xss_clean');
        }
         if($this->input->post('video_type')=='students'){
            $this->form_validation->set_rules('students_url', 'Video URL', 'trim|required|xss_clean');
        }
             if ($this->form_validation->run() == TRUE) {
                $input=$this->input->post();
                if($this->input->post('video_type')=='pages'){
        $data=array(
            'page_name'=>$input['page_name'],
            'course_id'=>$input['course'],
            'url'=>$input['url']
        );
        $table_name='videos';
    }
     if($this->input->post('video_type')=='students'){
        $data=array(
            'url'=>$input['students_url']
        );
        $table_name='student_videos';
    }
   $res= $this->crud_model->insert_operation($data,$table_name);
    if($res>0){
                $this->session->set_flashdata('success_message','Uploaded Successfully');
            }else{
                $this->session->set_flashdata('error_message','Not Uploaded');
            }
            redirect('videos');
             }
        }
        }
        $this->load->view('backend/index', $page_data);
    }
    public function evaluator($id=''){
        if($id!=''){
            $id=base64_decode($id);
            $page_data['edit_data']=$this->crud_model->get_user_details($id);
        }else{
            $page_data['edit_data']='';
        }
        if($this->session->userdata('role_id')!=1){
        redirect('error_404');
        }
        $page_data['page_title'] = 'Evaluators';
        $page_data['page_name'] = 'evaluator';
        $page_data['evaluator_data']=$this->crud_model->get_evaluator_info();
        if($this->input->post()){
            $this->form_validation->set_rules('name', 'Evaluator Name', 'trim|required|xss_clean');
            if($id != ''){
            $this->form_validation->set_rules('email', 'Email', 'callback_isEmailExist|trim|required|xss_clean');
            $this->form_validation->set_rules('mobile', 'Mobile Number', 'callback_isMobileExist|trim|required|xss_clean');
        }
            if($id == ''){
            $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|is_unique[users.email]', array(
            'is_unique' => 'This %s already exists.'
        ));
        $this->form_validation->set_rules('mobile', 'Mobile Number', 'trim|required|xss_clean|is_unique[users.mobile]', array(
            'is_unique' => 'This %s already exists.'
        ));                
            $this->form_validation->set_rules('pass', 'Password', 'required|min_length[6]');
            $this->form_validation->set_rules('cpass', 'Password Confirmation', 'required|matches[pass]');
            }
            if ($this->form_validation->run() == TRUE) {
            $input=$this->input->post();
            if($id!=''){
                $input_data=array(
                'first_name'=>$input['name'],
                'email'=>$input['email'],
                'mobile'=>$input['mobile']
            );
            $res=$this->crud_model->update_evakuator_info($id,$input_data);
            if($res){
                $this->session->set_flashdata('success_message','Updated Successfully');
            }else{
                $this->session->set_flashdata('error_message','Not Updated');
            }
        }else{
            $input_data=array(
                'first_name'=>$input['name'],
                'email'=>$input['email'],
                'mobile'=>$input['mobile'],
                'password'=>hash ( "sha256",$input['pass']),
                'role_id'=>3,
                'row_status'=>1
            );
            $res=$this->crud_model->save_evakuator_info($input_data);
            if($res>0){
                $this->session->set_flashdata('success_message','Saved Successfully');
            }else{
                $this->session->set_flashdata('error_message','Not Saved');
            }
        }

            redirect($this->session->userdata('last_page'));
        }
    }
        $this->load->view('backend/index', $page_data);
    }
public function isEmailExist($email){
        $data = $this->db->get_where('users',array('email'=>$email));
        if($data->num_rows() == 1){
            return TRUE;
        }else {
            $this->form_validation->set_message('email', 'Email already exist');
            return FALSE;
        }
    }
    public function isMobileExist($mobile){
        $data = $this->db->get_where('users',array('mobile'=>$mobile));
        if($data->num_rows() == 1){
            return TRUE;
        }else {
            $this->form_validation->set_message('mobile', 'Mobile already exist');
            return FALSE;
        }
    }
function system_settings($param1 = '') {
    if($this->session->userdata('role_id')!=1){
        redirect('error_404');
    }
    if($this->input->post()){
            $res=$this->crud_model->update_system_settings();
            if($res){
                $this->session->set_flashdata('success_message', 'Settings Updated');
            }else{
                $this->session->set_flashdata('error_message', 'Settings Not Updated');
            }
            redirect(base_url() . 'settings', 'refresh');
        }
        $page_data['page_name'] = 'settings';
        $page_data['page_title'] = 'system settings';
        $page_data['settings'] = $this->db->get('settings')->result_array();
        $this->load->view('backend/index', $page_data);
        }
              public function courses($id=''){
        if($this->session->userdata('role_id')!=1){
        redirect('error_404');
    }
    if($id!=''){
            $id=base64_decode($id);
            $page_data['edit_data']=$this->crud_model->select_results_info('courses',array('id'=>$id))->row_array();
        }else{
            $page_data['edit_data']='';
        }
        $page_data['page_title'] = "Courses";
        $page_data['page_name'] = 'courses';
        $page_data['courses'] = $this->crud_model->select_results_info('courses',array('row_status'=>1))->result_array();

        if($this->input->post()){
            if(isset($_FILES['group']['name']) && $_FILES['group']['name']!=""){
            if($mime = (get_mime_by_extension($_FILES['group']['name'])=='image/jpg' || get_mime_by_extension($_FILES['group']['name'])=='image/jpeg')){
            $input=$this->input->post();
            $input_data=array(
                'course'=>$input['course'],
                //'code'=>$input['code'],
                //'main_code'=>$input['main_code']
            );
           if($id==''){
            $res=$this->crud_model->saving_insert_details('courses',$input_data);
            if($res>0){
                $this->session->set_flashdata('success_message',"Group Saved Successfully");
                move_uploaded_file($_FILES["group"]["tmp_name"], "uploads/groups/". $res.'.jpg');
            }else{
                $this->session->set_flashdata('error_message',"Blog Not Saved");
            }
        }elseif($id!=''){
                $where['id']=$id;
                $res=$this->crud_model->update_operation($input_data,'courses',$where);
            if($res>0){
                $this->session->set_flashdata('success_message',"Group Updated Successfully");
                move_uploaded_file($_FILES["group"]["tmp_name"], "uploads/groups/". $id.'.jpg');
            }else{
                $this->session->set_flashdata('error_message',"Group Not Updated");
            }
            }
            redirect('courses');
            }else{
            $this->session->set_flashdata('error_message', 'Please select only JPG file.');
            }
}else{
            $this->session->set_flashdata('error_message', 'Please select JPG file.');
            }
        }
        //echo main_user_unique_id();die;
       /*echo $this->crud_model->generateUniqueUserId(1);die;*/
        $this->load->view('backend/index', $page_data);
    }
        public function faqs($id=''){
        if($this->session->userdata('role_id')!=1){
        redirect('error_404');
    }
    if($id!=''){
            $id=base64_decode($id);
            $page_data['edit_data']=$this->crud_model->get_single_faq_info($id);
        }else{
            $page_data['edit_data']='';
        }
        $page_data['page_title'] = "FAQ's";
        $page_data['page_name'] = 'faqs';
        $page_data['faqs'] = $this->crud_model->get_faqs_info();
        if($this->input->post()){
            $input=$this->input->post();
            $input_data=array(
                'question'=>$input['question'],
                'answer'=>$input['answer']
            );
           if($id==''){
            $res=$this->crud_model->saving_insert_details('faqs',$input_data);
            if($res>0){
                $this->session->set_flashdata('success_message',"FAQ's Saved Successfully");
            }else{
                $this->session->set_flashdata('error_message',"FAQ's Not Saved");
            }
        }elseif($id!=''){
                $where['id']=$id;
                $res=$this->crud_model->update_operation($input_data,'faqs',$where);
            if($res>0){
                $this->session->set_flashdata('success_message',"FAQ's Updated Successfully");
            }else{
                $this->session->set_flashdata('error_message',"FAQ's Not Updated");
            }
            }
            redirect('faqs');
        }
        $this->load->view('backend/index', $page_data);
    }
     public function blog($id=''){
        if($this->session->userdata('role_id')!=1){
        redirect('error_404');
    }
    if($id!=''){
        $id=base64_decode($id);
            $page_data['edit_data']=$this->crud_model->get_single_blog_info($id);
        }else{
            $page_data['edit_data']='';
        }
        $page_data['page_title'] = "Blog";
        $page_data['page_name'] = 'blog';
        $page_data['blog'] = $this->crud_model->get_blog_info();
        if($this->input->post()){
            if(isset($_FILES['blog']['name']) && $_FILES['blog']['name']!=""){
            if($mime = (get_mime_by_extension($_FILES['blog']['name'])=='image/jpg' || get_mime_by_extension($_FILES['blog']['name'])=='image/jpeg')){
            $input=$this->input->post();
            $input_data=array(
                'title'=>$input['title'],
                'description'=>$input['description']
            );
           if($id==''){
            $res=$this->crud_model->saving_insert_details('blog',$input_data);
            if($res>0){
                $this->session->set_flashdata('success_message',"Blog Saved Successfully");
                move_uploaded_file($_FILES["blog"]["tmp_name"], "uploads/blog/". $res.'.jpg');
            }else{
                $this->session->set_flashdata('error_message',"Blog Not Saved");
            }
        }elseif($id!=''){
                $where['id']=$id;
                $res=$this->crud_model->update_operation($input_data,'blog',$where);
            if($res>0){
                $this->session->set_flashdata('success_message',"Blog Updated Successfully");
                move_uploaded_file($_FILES["blog"]["tmp_name"], "uploads/blog/". $id.'.jpg');
            }else{
                $this->session->set_flashdata('error_message',"Blog Not Updated");
            }
            }
            redirect('blog');
            }else{
            $this->session->set_flashdata('blog_error', 'Please select only JPG file.');
            }
}else{
            $this->session->set_flashdata('blog_error', 'Please select JPG file.');
            }
        }
        $this->load->view('backend/index', $page_data);
    }
     public function conditions($type){
        if($this->session->userdata('role_id')!=1){
        redirect('error_404');
        }
        if($type=='terms'){
            $title='Terms & Conditions';
        }elseif($type=='privacy'){
            $title='Privacy Policy';
        }
        if($this->input->post()){
        $data['description'] = $this->input->post('message');
        $this->db->where('setting_type', $type);
        $res=$this->db->update('settings', $data);
        if($res){
                $this->session->set_flashdata('success_message',$title." Updated Successfully");
            }else{
                $this->session->set_flashdata('error_message',$title." Not Updated");
            }
            redirect($this->session->userdata('last_page'));
        }
        
        $page_data['page_title'] = $title;
        $page_data['page_name'] = 'terms';
        $page_data['condition'] = $this->db->get_where('settings', array('setting_type' => $type))->row()->description;
        $page_data['type'] = $type;
        $this->load->view('backend/index', $page_data);
    }

    public function add_mcq($value='')
    {
        $page_data['page_title'] = 'Add MCQ';
        $page_data['page_name'] = 'add_mcq';
        $page_data['questions'] = $_GET['questions'];
        $page_data['course'] = $_GET['course'];
        $this->load->view('backend/index', $page_data);   
    }
    public function mcq_list($value='')
    {
        $page_data['page_title'] = 'MCQ List';
        $page_data['page_name'] = 'mcq';
        $this->load->view('backend/index', $page_data);   
    }
    public function mcq_test_users($value='')
    {
        $page_data['page_title'] = 'MCQ Results';
        $page_data['page_name'] = 'mcq_results';
        $this->load->view('backend/index', $page_data);   
    }
    public function mcq_view($test_id='')
    {
        $page_data['page_title'] = 'MCQ View';
        $page_data['page_name'] = 'mcq_view';
        $page_data['test_type']=$test_id;

 /*       $page_data['result']=$result=$this->crud_model->select_results_info('mcq_results',array('id'=>$test_id,'row_status'=>1))->row_array();*/
        $page_data['test']=$this->crud_model->select_results_info('mcq_type',array('id'=>$test_id,'row_status'=>1))->row_array();
        $test_res=$this->crud_model->select_results_info('mcq',array('type_id'=>$test_id,'row_status'=>1));
        $page_data['test_data']=$test_res->result_array();

        $this->load->view('backend/index', $page_data);   
    }
    
}
?>