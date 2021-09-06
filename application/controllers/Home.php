<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller 
{
    private $system_name;
    private $login_id;
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');    
        error_reporting(0);  
$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

        $this->system_name = $this->db->get_where('settings', array('setting_type' => 'system_name'))->row()->description;
        $this->login_id = $this->session->userdata('login_id');
    }
    function index(){
    	$page_data['page_title']="Home";
        $page_data['page_name']="home";
        $this->load->view('front/index',$page_data);
    }
    function home(){
        $page_data['page_title']="Home";
        $page_data['page_name']="home";
        $this->load->view('front/index',$page_data);
    }
    function about(){
        $page_data['page_title']="About Us";
        $page_data['page_name']="about";
        $this->load->view('front/index',$page_data);
    }
    function contact(){
        if($this->input->post()){
            $input=$this->input->post();
            $inputData=array(
                'name'=>$input['name'],
                'email'=>$input['email'],
                'mobile'=>$input['phone'],
                'subject'=>$input['subject'],
                'message'=>$input['message']
            );
            $res=$this->crud_model->saving_insert_details('feeling_formal',$inputData);
            if($res>0){
                $this->session->set_flashdata('feeling_success','We Will Contact you soon...!');
            }else{
                $this->session->set_flashdata('feeling_error','Not Submited');
            }
            redirect($this->session->userdata('last_page'));
        }
        $page_data['page_title']="Contact Us";
        $page_data['page_name']="contact";
        $this->load->view('front/index',$page_data);
    }
    function our_exams(){
        $page_data['page_title']="Our-Exams";
        $page_data['page_name']="our_exams";
        $this->load->view('front/index',$page_data);
    }
    function faqs(){
        $page_data['page_title']="FAQ's";
        $page_data['page_name']="faqs";
        $page_data['faqs'] = $this->crud_model->get_faqs_info();
        $this->load->view('front/index',$page_data);
    }
    function blog(){
         //konfigurasi pagination
        $config['base_url'] = site_url('home-blog'); //site url
        $config['total_rows'] = count($this->crud_model->get_blog_info()); //total row
        $config['per_page'] = 9;  //show record per halaman
        $config["uri_segment"] = 2;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $page_data['page'] = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $page_data['data'] = $this->crud_model->get_blog_list($config["per_page"], $page_data['page']);
        $page_data['pagination'] = $this->pagination->create_links();

        $page_data['page_title']="Blog";
        $page_data['page_name']="blog";
        $this->load->view('front/index',$page_data);
    }
    function blog_details($id){
        $blog_id=base64_decode($id);
        $page_data['blog_details']=$this->crud_model->get_Single_blog_info($blog_id);
        $page_data['data'] = $this->crud_model->get_blog_list_not($blog_id,4,0);
        $page_data['page_name']='blog-individual';
        $page_data['page_title']='Blog';
        $this->load->view('front/index',$page_data);
    }
    function shop(){
         //konfigurasi pagination
        $config['base_url'] = site_url('home-shop'); //site url
        $config['total_rows'] = $this->crud_model->count_records('shopbooks',array('row_status'=>1)); //total row
        $config['per_page'] = 9;  //show record per halaman
        $config["uri_segment"] = 2;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $page_data['page'] = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $page_data['data'] = $this->crud_model->select_results_info('shopbooks',array('row_status'=>1),array(`id`=>'DESC'),$config["per_page"], $page_data['page'])->result_array();
        $page_data['pagination'] = $this->pagination->create_links();
        $page_data['page_title']="Shop";
        $page_data['page_name']="shop";
        $this->load->view('front/index',$page_data);
    }
    function register(){
        $page_data['page_title']="Registeration";
        $page_data['page_name']="register";

        if($this->input->post()){
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean|is_unique[users.email]', array(
            'is_unique' => 'This %s already exists.'
        ));
        /*$this->form_validation->set_rules('mobile', 'Mobile Number', 'trim|required|min_length[10]|max_length[10]|xss_clean|is_unique[users.mobile]', array(
            'is_unique' => 'This %s already exists.'
        ));*/
        /*$this->form_validation->set_rules('icai_reg_no', 'ICAI Number', 'trim|required|xss_clean|is_unique[users.icai_reg_no]');
        $this->form_validation->set_rules('exam_type', 'Exam Type', 'trim|required|xss_clean');*/
        if ($this->form_validation->run() == FALSE) {
            //echo validation_errors();print_r($_POST);die;
            $this->session->set_flashdata('reg_error', validation_errors());
            //$this->load->view('front/index',$page_data);
        } else {
            //print_r($_POST);die;
            $input = $this->input->post();
            $password=$otp='123456';//otp_generate();
            $inputData = array(
                "role_id" => 2,
                "first_name" => $input['first_name'],
                "last_name" => $input['last_name'],
                "email" => $input['email'],
                "gender" => $input['gender'],
                "dob" => $input['dob'],
                "org_type" => $input['org_type'],
                "org" => $input['org'],
                "city" => $input['city'],
                "postal" => $input['postal'],
                "password" => hash ("sha256",$password),
                "row_status" =>3,
                "created_at"=>date('Y-m-d H:i:s')
            );
          
           
            $insert_id = $this->crud_model->save_user_details($inputData);
           
            if ($insert_id['l_id'] > 0) {
                $message="Hi ".$inputData['first_name'].', Welcome to '.$this->system_name.'.<br/> User Id: '.$insert_id['unique_id'].'<br/> Password: '.$password.'.';
                $insert_id = $this->sms_model->send_sms($message,$inputData['mobile']);
                $this->session->set_flashdata('reg_success', 'Successfully Registered ! Login Details Sent to your Mobile number. SMS: '.$message);
                redirect(base_url('register'));
                }
             else {
                $this->session->set_flashdata('reg_error', 'Not Registered');
                redirect(base_url('register'));
            }
        }
        }
    	
    	$this->load->view('front/index',$page_data);
    }
    public function plan_data($id)
    {
        $page_data['page_title']="My Plans";
        $page_data['page_name']="cpt";
        $page_data['plan_data']=$this->crud_model->get_plan_prices_by_id($id);
        $page_data['plan_type']=$id;
        $this->load->view('front/index',$page_data);
    }
    public function passguarantee()
    {
        $page_data['page_title']="PassGuaranteePlan";
        $page_data['page_name']="passguarantee";
        $this->load->view('front/index',$page_data);
    }
    function trail_exams(){
        $page_data['page_title']="Trail Exams";
        $page_data['page_name']="trail_exams";
        $this->load->view('front/index',$page_data);
    }
    function e_brochers(){
        $page_data['page_title']="E-Brochers";
        $page_data['page_name']="e_brochers";
        $this->load->view('front/index',$page_data);
    }
    function schedules(){
        $page_data['page_title']="Schedules";
        $page_data['page_name']="schedules";
        $this->load->view('front/index',$page_data);
    }
    function cart(){
        $page_data['page_title']="Cart";
        $page_data['page_name']="cart";
        $page_data['cartItems'] = $this->cart->contents();
        $this->load->view('front/index',$page_data);   
    }
    function mcq(){
        $page_data['page_title']="MCQ's";
        $page_data['page_name']="mcq";
        $page_data['cartItems'] = $this->cart->contents();
        $this->load->view('front/index',$page_data);   
    }
    function mcq_test($value){
        $page_data['page_title']="MCQ's";
        $page_data['page_name']="mcq_test";
        $page_data['page_type']=$value;
        $page_data['test_data'] = $this->crud_model->select_results_info('mcq_type',array('course'=>$value,'row_status'=>1))->result_array();
        $this->load->view('front/index',$page_data);   
    }
    public function take_test($test_id)
    {
        $page_data['page_title']="MCQ Test";
        $page_data['page_name']="take_test";
        $page_data['test_type']=$test_id;
        $page_data['test']=$this->crud_model->select_results_info('mcq_type',array('id'=>$test_id,'row_status'=>1))->row_array();
        $test_res=$this->crud_model->select_results_info('mcq',array('type_id'=>$test_id,'row_status'=>1));
        $page_data['test_data']=$test_res->result_array();
        if($this->session->userdata('otp')==''){
$this->session->set_userdata('otp','');
                $this->session->set_userdata('test_start',0);
            }
        if($this->input->post()){

            if($this->session->userdata('otp')==''){
                $otp=otp_generate();
                $this->session->set_userdata('otp',$otp);
                $this->session->set_userdata('test_start',0);
                $this->session->set_flashdata('reg_success','OTP send to your Mobile Number'.$otp);   
                $message="Hi ".$this->input->post('first_name').', Welcome to '.$this->system_name.'.<br/> Your OTP for MCQ Test : '.$otp.' .';
                $insert_id = $this->sms_model->send_sms($message,$this->input->post('mobile'));
            }else{           

            if($this->session->userdata('otp') == $this->input->post('otp')){
                $this->session->set_userdata('test_start',1);
                if($this->session->userdata('test_start')==$this->input->post('test_start')){
            $input=$this->input->post();
            $count=0;
            $total=$page_data['test']['no_of_questions'];
            /*echo "<pre>";
            print_r($input);
            print_r($test_res->result_array());die;*/
            $i=1;foreach ($test_res->result_array() as $row) {
                if($row['answer']==$input['answer'.$i]){
                    $count++;
                }
                $answer_res[]=$input['answer'.$i];
            $i++;}
            $inputData['name']=$input['first_name'];
            $inputData['email']=$input['email'];
            $inputData['mobile']=$input['mobile'];
            $inputData['type_id']=$test_id;
            $inputData['total']=$total;
            $inputData['scored']=$count;
            $inputData['answers']=json_encode($answer_res);
            $res=$this->crud_model->saving_insert_details('mcq_results',$inputData);
            if($res>0){
                $this->session->set_userdata('otp','');
                $this->session->set_userdata('test_start',0);
                $this->session->set_flashdata('reg_success','Successfully Submited Exam');
            }else{
                $this->session->set_flashdata('reg_error','Not Submited Exam');
            }

            redirect(base_url('mcq_results/').$res);
}else{
    $this->session->set_flashdata('reg_success','Take Test Now');

}
        }else{
            $this->session->set_flashdata('reg_error','Incorrect OTP');
        }
        }
        }else{
            $this->session->set_userdata('otp','');
                $this->session->set_userdata('test_start',0);
        }
        
        $this->load->view('front/index',$page_data);      
    }
    function mcq_results($test_id){
        $page_data['page_title']="Results";
        $page_data['page_name']="mcq_results";
        $page_data['test_type']=$test_id;
        $page_data['result']=$result=$this->crud_model->select_results_info('mcq_results',array('id'=>$test_id,'row_status'=>1))->row_array();
        $page_data['test']=$this->crud_model->select_results_info('mcq_type',array('id'=>$result['type_id'],'row_status'=>1))->row_array();
        $test_res=$this->crud_model->select_results_info('mcq',array('type_id'=>$result['type_id'],'row_status'=>1));
        $page_data['test_data']=$test_res->result_array();
        /*echo "<pre>";
        print_r($page_data);die;*/
        $this->load->view('front/index',$page_data);   
    }
     public function conditions($type){
        if($type=='terms'){
            $title='Terms & Conditions';
        }elseif($type=='privacy'){
            $title='Privacy Policy';
        }
        $page_data['page_title'] = $title;
        $page_data['page_name'] = 'conditions';
        $page_data['condition'] = $this->db->get_where('settings', array('setting_type' => $type))->row()->description;
        $page_data['type'] = $type;
        $this->load->view('front/index', $page_data);
    }
     function plan(){
        $page_data['page_title']="plan";
        $page_data['page_name']="plan";
        $this->load->view('front/index',$page_data);
    }
}
