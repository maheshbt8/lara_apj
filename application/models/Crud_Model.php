<?php

class Crud_Model extends CI_Model{
    protected $system_name;
    protected $login_id;
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');   
        $this->system_name = $this->db->get_where('settings', array('setting_type' => 'system_name'))->row()->description;
        $this->login_id = $this->session->userdata('login_id');
    }
    
    public function validate_user_credentials($username, $password){
        $where="( email ='".$username."' or unique_id ='".$username."' )";
    	return $this->db->where($where)->get_where("users", array("password" => hash ( "sha256",$password)))->row_array();
        //echo $this->db->last_query();die;
    }
    function login_details(){
    $users_data=$this->db->get_where('login_details',array('user_id'=>$this->login_id));
    if($users_data->num_rows()>0){
        $data['login_at']=date('Y-m-d H:i:s');
        return $this->db->where('user_id',$this->login_id)->update('login_details',$data);
    }else{
        $data['user_id']=$this->login_id;
        $data['login_at']=date('Y-m-d H:i:s');
        $yes=$this->db->insert('login_details',$data);
        if($yes){
            $notification['user_id']=$this->login_id;
            $notification['title']='Welcome To '.$this->system_name;
            $notification['notification']=$this->system_name.' Heartly Welcoming You.';
            return $this->db->insert('notifications',$notification);
        }
    }
}
function logout_details(){
        $data['logout_at']=date('Y-m-d H:i:s');
        return $this->db->where('user_id',$this->login_id)->update('login_details',$data);
}
function get_last_unique_id($course_id){
        return $this->db->get_where('courses', array('id' => $course_id))->row()->unique_id;
    }
    function update_last_unique_id($course_id,$unique_id){
        $data['unique_id'] = $unique_id;
        $this->db->where('id',$course_id);
        return $this->db->update('courses', $data);
    }
    function get_tables_code($course_id){
        return $this->db->get_where('courses', array('id' => $course_id))->row()->code;
    }
function generate_unique_id($lid,$course_id){
if($lid==1){
$num=100001;
}elseif($lid!=1){
$my=explode('_',$this->crud_model->get_last_unique_id($course_id));
/*$year=substr($my[0], -2);
if($year==date('y')){
$num=$my[1]+1;
}else{
$num=100001;
}*/
$num=$my[1]+1;
}
$code=$this->crud_model->get_tables_code($course_id);
/*$pid=$code.date('y').'_'.$num;*/
$pid=$code.'_'.$num;
$this->crud_model->update_last_unique_id($course_id,$pid);
return $pid;
    }
function generateUniqueUserId($course_id) {
    $num = mt_rand(1000, 9999); // better than rand()
    $code=$this->crud_model->select_results_info('courses',array('id'=>$course_id))->row()->main_code;
    $number=$code.''.$num;
    $check=$this->crud_model->select_results_info('users',array('unique_id'=>$number))->num_rows();
    // call the same function if the barcode exists already
    if ($check>0) {
        return $this->generateUniqueUserId($course_id);
    }
    // otherwise, it's valid and can be used
    return $number;
}

    function get_image_url($id = '') {
         if (file_exists('assets/uploads/users/'. $id . '.jpg')){
            $image_url ='assets/uploads/users/'. $id . '.jpg';
        }else{
            $image_url ='assets/uploads/user.jpg';
        }
        return $image_url;
    }
    public function save_user_details( $inputData){
        $this->db->insert('users', $inputData);
        $lid = $this->db->insert_id();
        $pid=$this->crud_model->generate_unique_id($lid,1);
        $this->db->where('id',$lid)->update('users',array('unique_id'=>$pid,'modified_at'=>date('Y-m-d H:i:s')));
        $data['l_id']=$lid;
        $data['unique_id']=$pid;
        return $data;
    }
    function saving_insert_details($table,$inputdata){
        $res=$this->db->insert($table,$inputdata);
        if($res){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }
    function get_user_details($id = '') {
  		return $this->db->get_where('users',array('id'=>$id))->row_array();
    }
    function get_role_details($id = '') {
  		return $this->db->get_where('roles',array('id'=>$id))->row_array();
    }
    function get_failedusers_info(){
        return $this->db->get_where('users',array('role_id'=>2,'row_status'=>4))->result_array();
    }
    function get_mainusers_info(){
        return $this->db->get_where('users',array('role_id'=>2,'row_status'=>1))->result_array();
    }
    function get_evaluator_info(){
        return $this->db->get_where('users',array('role_id'=>3,'row_status'=>1))->result_array();
    }
    function get_trailusers_info(){
        return $this->db->get_where('users',array('role_id'=>2,'row_status'=>3))->result_array();
    }
    public function assign_evaluator_info($table,$data)
    {
        $input_data['evaluator_id']=$data['evaluator'];
        for ($i=0; $i < count($data['download']); $i++) { 
            $this->db->where('id', $data['download'][$i]);
        $this->db->update($table, $input_data);
        }
    }
    function update_system_settings() {
        if(!empty($this->input->post('system_name'))){
        $data['description'] = $this->input->post('system_name');
        $this->db->where('setting_type', 'system_name');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('system_title'))){
        $data['description'] = $this->input->post('system_title');
        $this->db->where('setting_type', 'system_title');
        $this->db->update('settings', $data);
        }   
        if(!empty($this->input->post('address'))){
        $data['description'] = $this->input->post('address');
        $this->db->where('setting_type', 'address');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('mobile'))){   
        $data['description'] = $this->input->post('mobile');
        $this->db->where('setting_type', 'mobile');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('whatsapp_number'))){   
        $data['description'] = $this->input->post('whatsapp_number');
        $this->db->where('setting_type', 'whatsapp_number');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('system_email'))){
        $data['description'] = $this->input->post('system_email');
        $this->db->where('setting_type', 'system_email');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('email_password'))){
        $data['description'] = $this->input->post('email_password');
        $this->db->where('setting_type', 'email_password');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('fb'))){
        $data['description'] = $this->input->post('fb');
        $this->db->where('setting_type', 'facebook');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('twiter'))){
        $data['description'] = $this->input->post('twiter');
        $this->db->where('setting_type', 'twiter');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('youtube'))){
        $data['description'] = $this->input->post('youtube');
        $this->db->where('setting_type', 'youtube');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('sms_username'))){
        $data['description'] = $this->input->post('sms_username');
        $this->db->where('setting_type', 'sms_username');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('sms_sender'))){
        $data['description'] = $this->input->post('sms_sender');
        $this->db->where('setting_type', 'sms_sender');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('sms_hash'))){
        $data['description'] = $this->input->post('sms_hash');
        $this->db->where('setting_type', 'sms_hash');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('students_opted'))){
        $data['description'] = $this->input->post('students_opted');
        $this->db->where('setting_type', 'students_opted');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('qualified_students'))){
        $data['description'] = $this->input->post('qualified_students');
        $this->db->where('setting_type', 'qualified_students');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('5_star_rated'))){
        $data['description'] = $this->input->post('5_star_rated');
        $this->db->where('setting_type', '5_star_rated');
        $this->db->update('settings', $data);
        }
        if(!empty($this->input->post('exemptions_scored'))){
        $data['description'] = $this->input->post('exemptions_scored');
        $this->db->where('setting_type', 'exemptions_scored');
        $this->db->update('settings', $data);
        }
        return true;
    }
    
    // SMS settings.
    function update_sms_settings() {
        
        $data['description'] = $this->input->post('sms_username');
        $this->db->where('setting_type', 'sms_username');
        $this->db->update('settings', $data);
        
        $data['description'] = $this->input->post('sms_sender');
        $this->db->where('setting_type', 'sms_sender');
        $this->db->update('settings', $data);
        
        $data['description'] = $this->input->post('sms_hash');
        $this->db->where('setting_type', 'sms_hash');
        $this->db->update('settings', $data);
    }
    function update_user_password($password,$user_id){
        $password=hash ( "sha256",$password);
        $data['password'] = $password;
        $this->db->where('id', $user_id);
        return $this->db->update('users', $data);
    }
    function get_active_courses(){
        return $this->db->get_where('courses',array('row_status'=>1))->result_array();
    }
    function get_single_course_info($id){
        return $this->db->get_where('courses',array('id'=>$id))->row_array();
    }
    function get_all_plans(){
        return $this->db->get_where('plans',array('row_status !='=>0))->result_array();
    }
    function get_plans_by_id($id){
        return $this->db->get_where('plans',array('course_id'=>$id,'row_status'=>1))->result_array();
    }
    function get_single_plan_info($id){
        return $this->db->get_where('plans',array('id'=>$id))->row_array();
    }
    
     function get_subjects_by_id($id){
        return $this->db->get_where('subjects',array('course_id'=>$id,'row_status'=>1))->result_array();
    }
    function get_single_subject_info($id){
        return $this->db->get_where('subjects',array('id'=>$id))->row_array();
    }
    function save_subject_info($input_data){
        $res=$this->db->insert('subjects',$input_data);
        if($res){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }
    function get_feeling_formal_info($date='', $status=''){
        if($date!=''){
            $this->db->where('fb.created_at >= ',$date.' 00:00:01');
            $this->db->where('fb.created_at <= ',$date.' 23:23:59');
        }
        if($status!=''){
            $this->db->where('fb.row_status',$status);
        }
        return $this->db->order_by('id','DESC')->get_where('feeling_formal',array('row_status !='=>0))->result_array();
    }
    function get_feedback_info($date = '', $status=''){
        if($date!=''){
            $this->db->where('fb.created_at >= ',$date.' 00:00:01');
            $this->db->where('fb.created_at <= ',$date.' 23:23:59');
        }
        if($status!=''){
            $this->db->where('fb.row_status',$status);
        }
        $this->db->select('fb.*,u.first_name,u.unique_id,u.email,u.mobile');
        $this->db->from('feedback as fb')->join('users as u','u.id = fb.user_id');
        return $this->db->order_by('fb.id','DESC')->where('fb.row_status !=',0)->get()->result_array();
    }
    function save_main_exam_info($data){
        $insert=$this->db->insert('exams',$data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }
    function save_exam_plan_relation_info($plans,$date,$data){
        $exam['exam_id']=$data;
        for ($i=0; $i < count($plans); $i++) {
            if($date[$plans[$i]]!=''){
                $da=date('Y-m-d',strtotime($date[$plans[$i]]));
            }else{
                $da=NULL;
            }
            $exam['plan_id']=$plans[$i];
            $exam['scheduled_date']=$da;
            $insert=$this->db->insert('exam_plan_relation',$exam);    
        }
        return true;
    }
    function get_upload_details_info(){
        return $this->db->order_by('id','DESC')->get_where('exams',array('row_status !='=>0))->result_array();
    }
    function get_single_upload_details_info($id){
        return $this->db->get_where('exams',array('id'=>$id))->row_array();
    }
    function get_upload_details_where_info($where){
       return $this->db->order_by('id','DESC')->where($where)->get_where('exams',array('row_status !='=>0))->result_array();
        //echo $this->db->last_query();die;
    }
    function get_exam_downloads_info(){
        return $this->db->order_by('id','DESC')->get_where('exam_downloads',array('row_status !='=>0))->result_array();
    }
    function get_exam_downloads_where_info($where){
        return $this->db->order_by('id','DESC')->where($where)->get_where('exam_downloads',array('row_status !='=>0))->result_array();
    }
    function get_single_exam_info($id){
        return $this->db->get_where('exams',array('id'=>$id))->row_array();
    }
    function save_promocodes_info($input_data){
        return $this->db->insert('promocodes',$input_data);
    }
    function save_sms_info($input_data,$plans){
        $res=$this->db->insert('sms',$input_data);
        
        if($res){
            $l_id=$this->db->insert_id();
            return $l_id;
        }else{
            return false;
        }
    }
    function update_promocodes_info($id,$input_data){
        $res=$this->db->where('id',$id)->update('promocodes',$input_data);
        if($res){
            return true;
        }else{
            return false;
        }
    }
    function get_promocodes_info(){
        return $this->db->order_by('id','DESC')->get_where('promocodes',array('row_status !='=>0))->result_array();   
    }
    function get_single_promocode_info($id){
        return $this->db->get_where('promocodes',array('id'=>$id))->row_array();   
    }
    function save_notes_info($input_data){
        $res=$this->db->insert('notes',$input_data);
        if($res){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }
    function get_notes_info(){
        return $this->db->order_by('id','DESC')->get_where('notes',array('row_status !='=>0))->result_array();
    }
    function get_notes_where_info($where){
        return $this->db->order_by('id','DESC')->where($where)->get_where('notes',array('row_status !='=>0))->result_array();
    }
    function save_mainvideo_info($input_data){
        $res=$this->db->insert('main_videos',$input_data);
        if($res){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }
    function get_mainvideos_info(){
        return $this->db->order_by('id','DESC')->get_where('main_videos',array('row_status !='=>0))->result_array();
    }
    function get_mainvideos_where_info($where){
        return $this->db->order_by('id','DESC')->where($where)->get_where('main_videos',array('row_status !='=>0))->result_array();
    }
    function save_add_plans_info($input_data){
        $res=$this->db->insert('plans',$input_data);
        if($res){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }
    function update_plans_info($id,$input_data){
        $res=$this->db->where('id',$id)->update('plans',$input_data);
        if($res){
            return true;
        }else{
            return false;
        }
    }
    function save_plan_prices_info($input_data){
        $res=$this->db->insert('packages',$input_data);
        if($res){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }
    function update_plan_prices_info($id,$input_data){
        $res=$this->db->where('id',$id)->update('packages',$input_data);
        if($res){
            return true;
        }else{
            return false;
        }
    }
    function get_plan_prices_by_id($id){
        return $this->db->get_where('packages',array('course_id'=>$id,'row_status'=>1))->result_array();
    }
    function get_single_plan_price_info($id){
        return $this->db->get_where('packages',array('id'=>$id))->row_array();
    }
    function save_trail_dashboard_info($input_data){
        $res=$this->db->insert('trail_dashboard',$input_data);
        if($res){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }
    function update_trail_dashboard_info($id,$input_data){
        $res=$this->db->where('id',$id)->update('trail_dashboard',$input_data);
        if($res){
            return true;
        }else{
            return false;
        }
    }
    function save_trail_exam_info($input_data){
        $res=$this->db->insert('trail_exams',$input_data);
        if($res){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }
    
    function get_trailupload_info(){
        return $this->db->order_by('id','DESC')->get_where('trail_exams',array('row_status !='=>0))->result_array();
    }
    function get_traildashboard_info(){
        return $this->db->order_by('id','DESC')->get_where('trail_dashboard',array('row_status !='=>0))->result_array();
    }
    function get_single_traildashboard_info($id){
        return $this->db->get_where('trail_dashboard',array('id'=>$id))->row_array();
    }
    function get_traildashboard_by_course($course){
        return $this->db->order_by('id','DESC')->get_where('trail_dashboard',array('course'=>$course,'row_status !='=>0))->row_array();
    }
    function get_e_brochers_info(){
        return $this->db->order_by('id','DESC')->get_where('e_brochers',array('row_status !='=>0))->result_array();
    }
    function get_faqs_info(){
        return $this->db->order_by('id','DESC')->get_where('faqs',array('row_status'=>1))->result_array();
    }

    function get_single_faq_info($id){
        return $this->db->get_where('faqs',array('id'=>$id))->row_array();
    }
    function get_blog_info(){
        return $this->db->order_by('id','DESC')->get_where('blog',array('row_status'=>1))->result_array();
    }
    function get_blog_list($limit, $start){
        $query = $this->db->order_by('id','DESC')->where('row_status',1)->get('blog', $limit, $start);
        return $query;
    }
    function get_blog_list_not($id,$limit, $start){
        $query = $this->db->order_by('id','DESC')->where('id !=',$id)->where('row_status',1)->get('blog', $limit, $start);
        return $query;
    }
    function get_single_blog_info($id){
        return $this->db->get_where('blog',array('id'=>$id))->row_array();
    }
    /*function save_shopbook_info($input_data){
        $res=$this->db->insert('shopbooks',$input_data);
        if($res){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }*/
    /*function save_e_brochers_info($input_data){
        $res=$this->db->insert('e_brochers',$input_data);
        if($res){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }*/
    function save_schedule_info($input_data){
        $res=$this->db->insert('schedules',$input_data);
        if($res){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }
    function get_schedules_info($id=''){
        if($id!=''){
            $this->db->where('course_id',$id);
        }
        return $this->db->order_by('id','DESC')->get_where('schedules',array('row_status !='=>0))->result_array();
    }
    function get_shopbooks_info(){
        return $this->db->order_by('id','DESC')->get_where('shopbooks',array('row_status !='=>0))->result_array();
    }
    function save_video_info($input_data){
        $res=$this->db->insert('videos',$input_data);
        if($res){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }
    function get_videos_info(){
        return $this->db->order_by('id','DESC')->get_where('videos',array('row_status !='=>0))->result_array();
    }
    function set_row_status($table,$type,$where,$status=0){
        $data['row_status']=$status;
        $data['modified_at']=date('Y-m-d H:i:s');
        return $this->db->where($type,$where)->update($table,$data);
    }
    function get_requestcallback_info(){
        return $this->db->order_by('id','DESC')->get_where('requestcallback',array('row_status !='=>0))->result_array();
    }
    
    /*
     * Common Operations
     * ********************************************************************************************************************
     */
    
    function insert_operation($inputdata, $table)
    {
        $result  = $this->db->insert($table,$inputdata);
        return $this->db->insert_id();
    }
function update_operation($inputdata,$table, $where)
    {
        return $this->db->where($where)->update($table,$inputdata);
    }
    /*function update_operation( $inputdata, $table, $where ){
        $result  = $this->db->update($table,$inputdata, $where);
        return $result;
    }*/
    /////////GET NAME BY TABLE NAME AND ID/////////////
    function get_type_name_by_id($type, $type_id = '', $field = 'name')
    {
        if ($type_id != '') {
            $l = $this->db->get_where($type, array(
                'id' => $type_id
            ));
            $n = $l->num_rows();
            if ($n > 0) {
                return $l->row()->$field;
            }else{
                return FALSE;
            }
        }
    }
    
    /////////GET NAME BY TABLE NAME AND ID/////////////
    function get_type_name_by_where($type, $where_column = 'id', $type_id = '', $field = 'name')
    {
        if ($type_id != '') {
            $l = $this->db->get_where($type, array($where_column => $type_id));
            $n = $l->num_rows();
            if ($n > 0) {
                return $l->row()->$field;
            }else{
                return FALSE;
            }
        }
    }
    
    
    function count_records( $table, $condition = '' ){
        if( !(empty($condition)) )
            $this->db->where( $condition );
            $this->db->from($table);
            $reocrds = $this->db->count_all_results();
            //echo $this->db->last_query();
            return $reocrds;
    }
    
    
    /*
     * trail user crud
     * *************************************************************************************************************************
     */
    function get_trailexams_info(){
        $user_details=$this->get_user_details($this->login_id);
        $this->db->select('courses.course,trail_exams.id, trail_exams.exam,  trail_exams.subject,  trail_exams.created_at')->from('trail_exams')->join('courses', 'courses.id = trail_exams.course')->where(array('trail_exams.row_status !=' => 0, 'trail_exams.course'=>$user_details['exam_type']));
        return $this->db->order_by('trail_exams.id','DESC')->get()->result_array();
    }
    
    function fetch_trail_exam_downloaded_list($exam_type = '', $start_time = '2019-08-29', $end_time = ''){
        $this->db->select('tes.id, tes.exam_id,te.exam,te.subject,tes.evaluator_id, tes.created_at, u.unique_id, u.first_name, u.mobile, tes.marks, tes.out_of, tes.row_status');
        $this->db->from('trail_exam_downloads tes');
        $this->db->join('users u', 'u.id = tes.user_id');
        //$this->db->join('trail_results tr', 'tr.trail_exam_downloads_id = tes.id', 'left');
        $this->db->join('trail_exams te', 'te.id = tes.exam_id');
        if($exam_type != '')
            $this->db->where(['te.course' => $exam_type, 'tes.created_at >=' => date('Y-m-d H:i:s', strtotime($start_time)), 'tes.created_at <=' => date('Y-m-d H:i:s', strtotime(($end_time == '') ? date('Y-m-d'): $end_time))]);
        
        if($this->session->userdata('role_id')==2){
            $this->db->where(['tes.user_id' =>$this->session->userdata('login_id')]);
        }
        if($this->session->userdata('role_id')==3){
            $this->db->where(['tes.evaluator_id' =>$this->session->userdata('login_id')]);
        }
        $this->db->order_by('tes.id', 'DESC');
        $query = $this->db->get();
        if($query->num_rows() != 0)
            return $query->result_array();
        else 
            return FALSE;
            
    }
    
    function fetch_tail_exam_results(){
        $this->db->select('te.subject, te.exam, tes.marks, tes.out_of');
        $this->db->from('trail_exam_downloads tes');
        $this->db->join('trail_exams te', 'te.id = tes.exam_id');
        //$this->db->join('trail_results tr', 'tr.trail_exam_downloads_id = tes.id');
        $this->db->where(['tes.user_id' =>$this->session->userdata('login_id'), 'tes.row_status' => 4]);
        $this->db->order_by('tes.id', 'DESC');
        $query = $this->db->get();
        //print_r($this->db->last_query());
        if($query->num_rows() != 0)
            return $query->result_array();
        else
            return FALSE;
    }
    


    function get_common_data_by_where($type, $where)
    {
        if ($type != '') {
            $l = $this->db->where($where)->get($type);
            $n = $l->num_rows();
            if ($n > 0) {
                return $l->result_array();
            }
        }
    }
/**
     *@author Mahesh
     *@param table string
     *@param where Array
     *@param order_by Array
     *@desc To fetch data from respective table with given condition and order
     */
    public function select_results_info($table, $where='', $order_by='',$limit='',$data_start='')
    {
        if($where != ''){
            $this->db->where($where);
        }
        if($order_by!=''){
            $this->db->order_by($order_by);
        }
        if($limit!=''){
            $this->db->limit($limit,$data_start);
        }
        $query = $this->db->get($table);
        //echo $this->db->last_query();die;
            return $query;
    }
    function save_evakuator_info($input_data){
        $res=$this->db->insert('users',$input_data);
        if($res){
        $lid = $this->db->insert_id();
        $eva=$this->db->get_where('roles',array('role'=>'Evaluator'))->row_array();
        
        if($eva['unique_id']==''){
$num=100001;
}elseif($eva['unique_id']!=''){
$my=explode('_',$eva['unique_id']);
$num=$my[1]+1;
}
        $pid=$eva['code'].'_'.$num;
        $d_list=array('unique_id'=>$pid,'modified_at'=>date('Y-m-d H:i:s'));
        $this->db->where('id',$lid)->update('users',$d_list);

        $data['unique_id'] = $pid;
        $this->db->where('role','Evaluator');
        $this->db->update('roles', $data);
            return $lid;
        }else{
            return false;
        }
    }
    function update_evakuator_info($id,$input_data){
        $res=$this->db->where('id',$id)->update('users',$input_data);
        if($res){
            return true;
        }else{
            return false;
        }
    }
   /*******rating of a product*******/
    function get_sum_of_product( $table, $where = '', $type_col = ''){
$rating=0;
        if($table!=''){
        if($where != ''){
            $this->db->where($where);
        }
$rating = $this->db->select("sum(".$table.".".$type_col.") as ".$type_col)->get($table)->row()->$type_col;
}
return $rating;
    }
    function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}
    
    function get_main_user_dashboard_list(){
        $this->db->select('upr.id, upr.user_id, upr.package_id,pk.plan_id,pk.course_id, pk.type as package_type,pk.subject_id,plans.plan');
        $this->db->from('users_plan_relation upr');
        $this->db->join('users u', 'u.id = upr.user_id');
        $this->db->join('packages pk', 'pk.id = upr.package_id');
        $this->db->join('plans', 'plans.id = pk.plan_id');
        $this->db->where(['upr.user_id' =>$this->session->userdata('login_id')]);
        $this->db->where('upr.row_status',1);
        $this->db->order_by('upr.id', 'DESC');
        $query = $this->db->get();
        if($query->num_rows() != 0){
            $r=$query->result_array();
            foreach ($r as $p) {
                $ar[$p['plan']]['plan']=$p['plan'];
                $ar[$p['plan']]['result'][]=$p;
            }
            
            return $ar;
        }
        else {
            return FALSE;
        }
            
    }
    function fetch_main_exam_downloaded_list($exam_type = '', $start_time = '2019-08-29', $end_time = ''){
        $this->db->select('es.id, es.exam_id,e.syllabus,es.evaluator_id, es.created_at, u.unique_id, u.first_name, u.mobile, es.marks, es.out_of, es.row_status, e.max_marks');
        $this->db->from('exam_downloads es');
        $this->db->join('users u', 'u.id = es.user_id');
        //$this->db->join('trail_results tr', 'tr.trail_exam_downloads_id = tes.id', 'left');
        $this->db->join('exams e', 'e.id = es.exam_id');
        if($exam_type != '')
            $this->db->where(['e.course' => $exam_type, 'es.created_at >=' => date('Y-m-d H:i:s', strtotime($start_time)), 'es.created_at <=' => date('Y-m-d H:i:s', strtotime(($end_time == '') ? date('Y-m-d'): $end_time))]);
        
        if($this->session->userdata('role_id')==2){
            $this->db->where(['es.user_id' =>$this->session->userdata('login_id')]);
        }
        if($this->session->userdata('role_id')==3){
            $this->db->where(['es.evaluator_id' =>$this->session->userdata('login_id')]);
        }
        $this->db->order_by('es.id', 'DESC');
        $query = $this->db->get();
        if($query->num_rows() != 0)
            return $query->result_array();
        else 
            return FALSE;
            
    }
    function get_user_exams_by_sub($sub_id,$plan_id){
        $this->db->select('ex.id, ex.course_id, su.subject, ex.subject_code,ex.syllabus,ex.max_marks, ex.time_out');
        $this->db->distinct('ex.id');
        $this->db->from('exams ex');
        $this->db->join('subjects su', 'su.id = ex.subject_id');
        $this->db->join('exam_plan_relation epr', 'epr.plan_id ='.$plan_id);
        $this->db->where('ex.subject_id',$sub_id);
        $this->db->where('ex.row_status',1);
        $this->db->order_by('ex.id', 'DESC');
        return $query = $this->db->get();
        /*if($query->num_rows() > 0){*/
            /*$r=$query->result_array();
            foreach ($r as $p) {
                $ar[$p['plan']]['plan']=$p['plan'];
                $ar[$p['plan']]['result'][]=$p;
            }*/
            
            /*return $query;
        }
        else {
            return FALSE;
        }*/
            
    }
    function get_user_exams_plan_rel($exam_id,$plan_id){
        /*return $exam_id.'/'.$plan_id;*/
        $this->db->select('epr.id, epr.plan_id, epr.scheduled_date,p.plan_code,p.plan_type');
        $this->db->from('exam_plan_relation epr');
        $this->db->join('plans p', 'p.id = epr.plan_id');
        $this->db->where('epr.exam_id',$exam_id);
        $this->db->where('epr.plan_id',$plan_id);
        $this->db->where('epr.row_status',1);
        $this->db->order_by('epr.id', 'DESC');
        return $query = $this->db->get();
            
    }
    function get_support_chat(){
        $this->db->select('s.id, s.from_id,s.to_id,s.message,s.read_status,s.created_at');
        $this->db->from('support s');
/*        $this->db->join('users u', 'from.id = epr.plan_id');*/
        $this->db->where('s.from_id',$this->login_id);
        $this->db->or_where('s.to_id',$this->login_id);
        $this->db->where('s.row_status',1);
        $this->db->order_by('s.id', 'DESC');
        return $query = $this->db->get();
            
    }
    function get_support_chat_box($u_id){
        $array1=array('s.from_id'=>$this->login_id,'s.to_id'=>$u_id);
        $array2=array('s.to_id'=>$this->login_id,'s.from_id'=>$u_id);
        $where='(s.from_id ='.$this->login_id .' AND '.'s.to_id = '.$u_id.') OR (s.to_id = '.$this->login_id.' AND s.from_id = '.$u_id.')';
        $this->db->select('s.id, s.from_id,s.to_id,s.message,s.read_status,s.created_at');
        $this->db->from('support s');
        /*$this->db->join('users u', 'u.id = '.$u_id);*/
        /*$this->db->where($array1);
        $this->db->or_where($array2);*/
        $this->db->where($where);
        $this->db->where('s.row_status',1);
        $this->db->order_by('s.id', 'DESC');
        return $query = $this->db->get();            
    }
    function get_support_chat_unread_c($id){
        /*$this->db->select('s.id, s.from_id,s.to_id,s.message,s.read_status,s.created_at');
        $this->db->from('support s');*/
/*        $this->db->join('users u', 'from.id = epr.plan_id');*/
        $this->db->where('to_id',$this->login_id);
        $this->db->where('from_id',$id);
        $this->db->where('read_status',2);
        return $query = $this->db->get('support')->num_rows();
       /* $query = $this->db->get('support');*/
        /*echo $this->db->last_query();die;*/
            
    }
}

?>