<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Common extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Kolkata');
        //error_reporting(0);
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

        if ($this->session->userdata('login_id') == '') {
            redirect('admin');
        }
    }

    function change_password()
    {
        if ($this->input->post()) {
            $this->form_validation->set_rules('old_password', 'Password', 'required|callback_check_old_pass');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
            $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');
            if ($this->form_validation->run() == TRUE) {
                $user_id = $this->session->userdata('login_id');
                $password = $this->input->post('password');
                $res = $this->crud_model->update_user_password($password, $user_id);
                if ($res) {
                    $this->session->set_flashdata('success_message', 'Password Updated');
                } else {
                    $this->session->set_flashdata('error_message', 'Password Not Updated');
                }
                redirect(base_url() . 'change_password', 'refresh');
            }
        }
        $page_data['page_name'] = 'change_password';
        $page_data['page_title'] = 'Change Password';
        $this->load->view('backend/index', $page_data);
    }

    public function check_old_pass($old_pass='')
    {
        
        $passw=hash("sha256",$old_pass);
        $validation=$this->crud_model->select_results_info('users',array('password'=>$passw,'id'=>$this->session->userdata('login_id')))->num_rows();
            if($validation == 0){
                $this->form_validation->set_message('check_old_pass','Old Password Not Matched');
                return false;
            }
            return true;
    }

    public function set_row_status($table, $type, $where, $status=0)
    {
        $ret = $this->crud_model->set_row_status($table, $type, $where, $status);
        if ($ret) {
            $this->session->set_flashdata('success_message', 'Action Completed Successfully');
        } else {
            $this->session->set_flashdata('error_message', 'Action Not Completed');
        }
        redirect($this->session->userdata('last_page'));
    }
    public function update_operation($inputdata,$table, $where)
    {
        $ret = $this->crud_model->update_operation($inputdata,$table, $where);
        if ($ret) {
            $this->session->set_flashdata('success_message', 'Updated Successfully');
        }else{
            $this->session->set_flashdata('error_message', 'Not Updated');
        }
        redirect($this->session->userdata('last_page'));
    }
    function error_404()
    {
        $page_data['page_title'] = 'Error 404';
        $page_data['page_name'] = 'error_404';

        $this->load->view('backend/index', $page_data);
    }

    public function filesdownload()
    {
        $file_id=$this->input->post('file_id');
        $path=$this->input->post('path');
        $name=$this->input->post('name');
        $ext=$this->input->post('ext');
        $image_url = 'uploads/' . $path.'/'.$file_id . '.' . $ext;
        if (file_exists($image_url)) {
            $file_name = $name .'.' . $ext;
            $this->load->helper('download');
            $data = file_get_contents($image_url);
            force_download($file_name, $data);
        }
        return TRUE;
    }
     public function filesdownload1($file_id,$path,$name,$ext)
    {
        $path=str_replace("-","/",$path);
       /*$file_id=$this->input->post('file_id');
        $path=$this->input->post('path');
        $name=$this->input->post('name');
        $ext=$this->input->post('ext');*/
        $image_url = 'uploads/' . $path.'/'.$file_id . '.' . $ext;
        if (file_exists($image_url)) {
            $file_name = $name .'.' . $ext;
            $this->load->helper('download');
            $data = file_get_contents($image_url);
            force_download($file_name, $data);
        }
        return TRUE;
    }

    public function papers()
    {
        if ($this->session->userdata('login_id') == '') {
            redirect('auth');
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
                    redirect('u_traildownload', 'refresh');
                }
            }
        }
        }
        $page_data['page_title'] = 'Papers';
        $page_data['page_name'] = 'paper_view';
        $this->load->view('backend/index', $page_data);
    }
    public function main_paper()
    {
        if ($this->session->userdata('login_id') == '') {
            redirect('auth');
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
                    redirect('u_traildownload', 'refresh');
                }
            }
        }
        }
        $page_data['page_title'] = 'Papers';
        $page_data['page_name'] = 'paper_view';
        $this->load->view('backend/index', $page_data);
    }
    public function trail_papers()
    {
        if ($this->session->userdata('login_id') == '') {
            redirect('auth');
        }
        $page_data['page_title'] = 'Papers';
        $page_data['page_name'] = 'trail_paper_exam';
        $this->load->view('backend/index', $page_data);
    }
    public function isEmailExist($email){
        $data = $this->db->get_where();
        if($data->num_rows() == 1){
            return TRUE;
        }else {
            $this->form_validation->set_message('email', 'Email already exist');
            return FALSE;
        }
    }

    public function notes_view($note_id='')
    {
        $page_data['page_title'] = 'Notes View';
        $page_data['page_name'] = 'notes_view';
        $page_data['note_id']=$note_id;
        $page_data['note']=$this->my_model->get_single_note_info($note_id);
        $this->load->view('backend/index', $page_data);   
    }
}
?>