<?php

class Ajax extends CI_Controller{
    protected $system_name;
    protected $login_id;
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');   
        $this->system_name = $this->db->get_where('settings', array('setting_type' => 'system_name'))->row()->description;
        $this->login_id = $this->session->userdata('login_id');
    }
    function get_plans_by_id($id){
    	$plans=$this->crud_model->get_plans_by_id($id);
    foreach ($plans as $row) {
echo '<label class="btn btn-secondary active"><input type="checkbox" autocomplete="off" name="plans[]" value="'.$row['id'].'" required=""> '.ucwords($row['plan']).'</label>';
echo ($row['plan_type']=='scheduled')? '<div class="form-group row"><label class="col-sm-12 control-label">Your Date: </label><div class="col-sm-12">
<input type="date" data-plugin-datepicker="" class="form-control" placeholder="---Select date---"  name="scheduled_date['.$row['id'].']" value=""></div></div>' : '<br/><input type="hidden" value="" name"scheduled_date['.$row['id'].']"/>';
	}
echo '<label class="error" for="plans[]">Plan is required.</label>';                                                 
    }
    function get_plan_options_by_id($id){
    	$plans=$this->crud_model->get_plans_by_id($id);
    	echo '<option value="">-- Select Plan --</option>';
    foreach ($plans as $row) {
    echo '<option name="plan" value="'.$row['id'].'">'.ucwords($row['plan']).'</option>';
	}
                                                        
    }
    function get_subjects_by_id($id){
    	$plans=$this->crud_model->get_subjects_by_id($id);
    	echo '<option value="">Select Subject</option>';
    foreach ($plans as $row) {
    echo '<option value="'.$row['id'].'">'.$row['subject'].'</option>';
	}
                                                        
    }
    
    function exam_download_action(){
        echo $plans=$this->crud_model->insert_operation(
            [
                'user_id' =>$this->session->userdata('login_id'),
                'exam_id' => $this->input->post('exam_id'),
                'plan_id' => $this->input->post('plan_id'),
                'created_at' => date('Y-m-d H:i:s'),
                'row_status' => $this->input->post('status')
            ],
            $this->input->post('table')
            );
        $this->session->set_flashdata('success_message','Successfully Downloaded..!');
    }
       function exam_update_download_action(){
        echo $plans=$this->crud_model->update_operation(
            [
                'modified_at' => date('Y-m-d H:i:s'),
                'row_status' => $this->input->post('status')
            ],
            $this->input->post('table'),
            [
                'id' => $this->input->post('exam_id')
            ]
            );
        $this->session->set_flashdata('success_message','Successfully Downloaded..!');
    }
    function update_faqs(){
        $input=$this->input->post();
        $input_data=array(
                'question'=>$input['question'],
                'answer'=>$input['answer']
            );
        $where['id']=$input['faq_id'];
        $this->crud_model->update_operation($input_data,'faqs',$where);
        echo 's';
    }
    public function get_package_price($value='',$price='')
    {
        echo $this->crud_model->get_type_name_by_where('packages','id',$value,$price);
    }
    public function get_received_sms($value='')
    {
        $where="row_status = 1";

        $res=$this->crud_model->select_results_info('users_plan_relation',array('row_status'=>1,'user_id'=>$this->login_id))->result_array();
        $plan_ids='';
        $l=0;foreach ($res as $plans) {
            if($l==0){
                $plan_ids = " plan_ids LIKE '%".$plans['plan_id']."%' ";
                }else{
                $plan_ids = $plan_ids ." OR plan_ids LIKE '%".$plans['plan_id']."%' ";
                }
        $l++;}
        $where=$where .' and ('. $plan_ids.')';
        $sms=array_reverse($this->crud_model->select_results_info('sms',$where)->result_array());
        foreach ($sms as $row) {
                    echo '<li class="unread">
                    <a href="mailbox-email.html">
                            <div class="col-sender">
                                <div class="checkbox-custom checkbox-text-primary ib">
                                    <input type="checkbox" id="mail1">
                                    <label for="mail1"></label>
                                </div>
                                <p class="m-0 ib">'.$row['subject'].'</p>
                            </div>
                            <div class="col-mail">
                                <p class="m-0 mail-content">
                                    <span class="mail-partial">'.$row['sms'].'</span>
                                </p>
                                <p class="m-0 mail-date">'.$this->crud_model->time_elapsed_string($row['created_at']).'</p>
                            </div>
                        </a>
                    </li>';
        }
    }
    function addToCart(){
        $packages=explode(',',$_POST['packages']);
        for($i=0;$i<count($packages);$i++){
            $product = $this->crud_model->select_results_info('packages',array('id'=>$packages[$i]))->row_array();    
            // Add product to the cart
        $data = array(
            'id'    => $product['id'],
            'qty'    => 1,
            'price'    => $product['discount_price'],
            'name'    => $product['subject_name']
        );
        $res=$this->cart->insert($data);
        }
        return true;
    }
    public function get_cart_data($value='')
    {
        $cart=$this->cart->contents();
        foreach ($cart as $row) {
            $product = $this->crud_model->select_results_info('packages',array('id'=>$row['id']))->row_array();
            $course=$this->crud_model->get_type_name_by_where('courses','id',$product['course_id'],'course');
            $plan=$this->crud_model->get_type_name_by_where('plans','id',$product['plan_id'],'plan');  
            $url="'".base_url('cart/removeItem/').$row['rowid']."'";
            echo '<tr>
                        <td class="product-thumbnail">'.$course.'<input type="hidden" class="cart_courses" value="'.$product['course_id'].'"/></td>
                        <td class="product-name">'.$plan.'<input type="hidden" class="cart_plans" value="'.$product['plan_id'].'"/><input type="hidden" class="cart_packages" value="'.$product['id'].'"/></td>
                        <td class="product-price">
                        <span class="unit-amount">'.$row['name'].'</span>
                        </td>
                        <td class="product-subtotal">
                        <span class="subtotal-amount"><i class="fa fa-inr" aria-hidden="true"></i>&nbsp;'.$product['actual_price'].'<input type="hidden" class="subtotal_amount" value="'.$product['discount_price'].'"/><input type="hidden" class="actual_price" value="'.$product['actual_price'].'"/></span>
                        </td>
                        <td class="product-remove">
                        <a  onclick="return delete_row('.$url.')"><i class="icofont-ui-delete"></i></a>
                        </td>
                        </tr>';
        }
    }
    public function checkCoupon($value='')
    {
        $cartplans=explode(',',$_POST['cartplans']);
        $my_coupon=$_POST['my_coupon'];
        $where='row_status = 1 AND code = "'.$my_coupon. '" AND valid_from <= "'.date('Y-m-d').'" AND valid_to >= "'.date('Y-m-d').'"';
        for($i=0;$i<count($cartplans);$i++) {
            if($i==0){
                $plan_ids = "plan_id LIKE '%".$cartplans[$i]."%' ";
                }else{
                $plan_ids = $plan_ids ." OR plan_id LIKE '%".$cartplans[$i]."%' ";
                }
        }   
        $where .= ' AND ('.$plan_ids.')';
        /*$promocodes=$this->db->where($where)->get('promocodes');*/
        $promocodes=$this->crud_model->select_results_info('promocodes',$where);
        if($promocodes->num_rows()>0){
            $row=$promocodes->row_array();
            echo '<span class="text-success">Coupon Applied Successfully<input type="hidden" id="coupon_discount" value="'.$row['discount'].'"/><input type="hidden" id="coupon_id" value="'.$row['id'].'"/></span>';
        }else{
            echo '<span class="text-danger">Promocode Not Available<input type="hidden" id="coupon_discount" value="0"/></span>';
        }
    }
    public function updating_conditions($value='')
    {
        $data['description'] = $_POST['message'];
        $type = $_POST['type'];
        $this->db->where('setting_type', $type);
        $res=$this->db->update('settings', $data);
        /*if($res){
                $this->session->set_flashdata('success_message',$title." Updated Successfully");
            }else{
                $this->session->set_flashdata('error_message',$title." Not Updated");
            }*/
            echo "Updated Successfully";
        
    }
    public function cart_count_update()
    {
        $cart=$this->cart->contents();
        echo count($cart);
    }
    public function users_plan_relation()
    {
if($this->session->userdata('role_id')=='2'){

        $input=$this->input->post();
        $inputData['track_id']=$input['track_id'];
        $inputData['cart_packages']=$input['cart_packages'];
        $inputData['subtotal']=$input['subtotal'];
        $inputData['discount']=$input['discount'];
        $inputData['grand_total']=$input['grand_total'];
        $inputData['discount_id']=$input['discount_id'];
        $inputData['user_id']=$this->login_id;
        $res=$this->crud_model->saving_insert_details('package_purchase',$inputData);
        if($res){
            if($input['discount_id']!=0){
            $dis=array( 
                'user_id'=>$this->login_id,
                'promo_id'=>$input['discount_id'],
                'discount'=>$input['discount'],
            );
            $this->crud_model->saving_insert_details('promo_discount',$dis);
            }
            $exam_type=$this->crud_model->select_results_info('users',array('id'=>$this->login_id))->row()->exam_type;
            $code=$this->crud_model->generateUniqueUserId($exam_type);
            $this->crud_model->update_operation(array('row_status'=>1,'unique_id'=>$code),'users',array('id'=>$this->login_id));
            $package=explode(',',$input['cart_packages']);
            for($p=0;$p<count($package);$p++){
                $is='';
                $plan_id=$this->crud_model->get_type_name_by_id('packages',$package[$p],'plan_id');
                $is=array(
                    'user_id'=>$this->login_id,
                    'package_id'=>$package[$p],
                    'plan_id'=>$plan_id,
                );
                $this->crud_model->saving_insert_details('users_plan_relation',$is);
                $this->cart->destroy();
            }
            echo "Purchased Successfully";
        }else{
            echo "Not Purchased";
        }
        }else{
            echo "You are not a USER";
        }
    }
    public function submit_mcq()
    {
        $data['course']=$_POST['course'];
        $data['test']=$_POST['test'];
        $data['no_of_questions']=$_POST['no_of_questions'];
        $data['description']=$_POST['description'];
        $res=$this->crud_model->insert_operation($data,'mcq_type');
        if($res>0){
        $items=$_POST['items'];
        $bulk_array=array();
        for ($i=0; $i < count($items); $i++) {
            $inputData=array();
            $inputData['type_id']=$res;
            $inputData['question']=$items[$i]['question'];
            $inputData['choice1']=$items[$i]['choice1'];
            $inputData['choice2']=$items[$i]['choice2'];
            $inputData['choice3']=$items[$i]['choice3'];
            $inputData['choice4']=$items[$i]['choice4'];
            $inputData['answer']=$items[$i]['choice'.$items[$i]['answer']];
            array_push($bulk_array, $inputData);
        }
        //print_r($bulk_array);
        $insert=$this->db->insert_batch('mcq',$bulk_array);
        if($insert){
            $this->session->set_flashdata('success_message',"Successfully Added");
        }else{
            $this->session->set_flashdata('error_message',"Not Added");
        }
        }else{
            $this->session->set_flashdata('error_message',"Not Added");
        }
    }

    public function get_user_exams_by_sub($sub_id,$plan_id)
    {

        //$exams=$this->crud_model->select_results_info('exams',array('subject_id'=>$sub_id,'row_status'=>1));
        $exams=$this->crud_model->get_user_exams_by_sub($sub_id,$plan_id);
        $res['status']=0;
        if($exams->num_rows()>0){
            $exams=$exams->result_array();
            $res['status']=1;
  /*          $res['mess']=json_encode($exams);*/
            /*$res['mess']=$this->db->last_query();*/
            $res['mess']='<div class="card">
                    <div class="card-body">';
                    $da='<table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Exam Code</th>
                                        <th>Subject</th>
                                        <th>Syllabus</th>
                                        <th>Marks</th>
                                        <th>Questtion Paper</th>
                                    </tr>
                                    <thead>
                                    <tbody>';
                        $i=1;foreach ($exams as $ex) {
                            $plan=$u_d=$ud='';
                            $plan=$this->crud_model->get_user_exams_plan_rel($ex['id'],$plan_id)->row_array();
                            $u_d=$this->crud_model->select_results_info('exam_downloads',array('row_status !='=> 0,'user_id'=>$this->login_id, 'exam_id'=>$ex['id']));
                            $ud=$u_d->row_array();
    $da .='<tr>
            <td>'.$plan['plan_code'].'_'.$ex['subject_code'].'</td>
            <td>'.$ex['subject'].'</td>
            <td>'.$ex['syllabus'].'</td>
            <td>'.$ex['max_marks'].'</td>';
    $da .='<td>';
     if(($plan['plan_type'] =='unscheduled' && $ud==0) || ($plan['plan_type'] =='scheduled' && date('Y-m-d',strtotime($plan['scheduled_date']))==date('Y-m-d') && $u_d->num_rows() == 0))
    {                                 
    $da .='<span id="q'.$ex['id'].'"><a href="'.base_url('uploads/main/questions/').$ex['id'].'.pdf" class="alink"  id="link'.$ex['id'].'"  onclick="download_main_exam('.$ex['id'].', 1,'.$plan_id.')" download="'.$plan['plan_code'].'_'.$ex['subject_code'].'.pdf">'.$plan['plan_code'].'_'.$ex['subject_code'].'.pdf</a></span>';
    }elseif($u_d->num_rows() != 0 && ($ud['row_status']=='1')){
        $time_out = date('Y-m-d H:i:s',strtotime('+'.$ex['time_out'].' minutes',strtotime($ud['created_at'])));
        $da .='<span id="q'.$ex['id'].'"></span><script>exam_download_timer("'.$time_out.'",'.$ex['id'].','.$ud['id'].');</script>';
        $da .='<form method="post" action="'.base_url('u_maindownload').'" enctype="multipart/form-data" class="form-horizontal">
        <div class="form-group row">
        <label class="col-sm-4 control-label text-sm-right pt-2">Upload Answer Paper: </label>
        <div class="col-sm-5">
        <div class="custom-file">
        <input type="file" class="form-control custom-file-input" id="sapaper" name="main_answer" required="">
        <label class="custom-file-label" for="sapaper">Choose file</label>
        <input type="hidden" class="form-control custom-file-input" id="download_id" name="download_id" value="'.$ud['id'].'">
        <input type="hidden" name="input_type" value="answers">
        </div>
        </div>
      <input type="submit" class="btn btn-primary" Placeholder="Submit">
                                                                </div>
                                                            </form>';

    }elseif($ud['row_status'] == 5){
        $da .='<span id="">Exam Closed</span>';
    }elseif($ud['row_status'] == 2){
        $da .='<span id="">Exam Completed</span>';
    }else{
    $da .='<span id="d'.$ex['id'].'"></span><script>exam_timer("'.$plan['scheduled_date'].'",'.$ex['id'].');</script>';
    }
    $da .='</td>';
                 $i++;   }
                    $da .='</tbody>
                           </table>';
                    $res['mess'] .=$da.'</div></div>';
        }else{
            $res['mess']='<div class="card">
                    <div class="card-body">
                        <p>No Exams Found</p>
                    </div>
                  </div>';
        }

         echo json_encode($res);
    }
     /*  public function get_exam_time_out($ex_id)
    {
        $ex=$this->crud_model->select_results_info('exams',array('exam_id'=>$ex_id))->row_array();
        $u_d=$this->crud_model->select_results_info('exam_downloads',array('row_status !='=> 0,'user_id'=>$this->login_id, 'exam_id'=>$ex_id));
                            $ud=$u_d->row_array();
        $time_out = date('Y-m-d H:i:s',strtotime('+'.$ex['time_out'].' minutes',strtotime($ud['created_at'])));
        return $time_out;
    }*/
    public function get_support_chat()
    {//echo "string";die;
    $mer=array();
        $support=$this->crud_model->get_support_chat()->result_array();
        //print_r($support);
    $from_u=array_column($support, 'from_id');
    $to_u=array_column($support, 'to_id');
    $mer=array_unique(array_merge($from_u,$to_u));
$mer= array_keys(array_count_values($mer));

//print_r($mer);die;

/*print_r(array_unique($mer));die;*/
$j=1;
for ($i=0; $i <count($mer) ; $i++) {
    if($mer[$i] != $this->login_id){$c='';
            $c=$this->crud_model->get_support_chat_unread_c($mer[$i]);
            echo '<li class="" onclick="user_chat_support('.$mer[$i].')" id="active_chat_user'.$mer[$i].'">
                            <div class="d-flex bd-highlight">
                                <div class="img_cont">
                                    <img src="'.base_url($this->crud_model->get_image_url($mer[$i])).'" class="rounded-circle user_img">'. (($c != 0)? '<span class="online_icon badge badge-light">'.$c.'</span>' : "") .'
                                    
                                </div>
                                <div class="user_info">
                                    <span>'.ucwords($this->crud_model->get_type_name_by_where('users','id',$mer[$i],'first_name')).'</span>
                                    <p>'.ucwords($this->crud_model->get_type_name_by_where('users','id',$mer[$i],'unique_id')).'</p>
                                </div>
                            </div>
                </li>';
        $j++;}
    }
    }



     public function get_support_chat_box($u_id)
    {
        $support=$this->crud_model->get_support_chat_box($u_id)->result_array();
        $data='<div class="card">
                        <div class="card-header msg_head">
                            <div class="d-flex bd-highlight">
                                <div class="img_cont">
                                    <img src="'.base_url($this->crud_model->get_image_url($u_id)).'" class="rounded-circle user_img">
                                </div>
                                <div class="user_info">
                                    <span>'.ucwords($this->crud_model->get_type_name_by_where('users','id',$u_id,'first_name')).'</span>
                                    <p>'.ucwords($this->crud_model->get_type_name_by_where('users','id',$u_id,'unique_id')).'</p>
                                </div>
                                <div class="video_cam">
                                    <span><i class="fas fa-video"></i></span>
                                    <span><i class="fas fa-phone"></i></span>
                                </div>
                            </div>
                            <span id="action_menu_btn"><i class="fas fa-ellipsis-v"></i></span>
                            <div class="action_menu">
                                <ul>
                                    <li><i class="fas fa-user-circle"></i> View profile</li>
                                    <li><i class="fas fa-users"></i> Add to close friends</li>
                                    <li><i class="fas fa-plus"></i> Add to group</li>
                                    <li><i class="fas fa-ban"></i> Block</li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body msg_card_body" id="chat_body_content'.$u_id.'">
                            

                        </div>
                        <div class="card-footer">
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>
                                </div>
                                <textarea name="" class="form-control type_msg" placeholder="Type your message..." id="my_chat_sms"></textarea>
                                <div class="input-group-append">
                                    <span class="input-group-text send_btn" onclick="send_chat_sms();"><i class="fas fa-location-arrow"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>';
                    echo $data;
    }

 public function chat_body_content($u_id)
    {
        $support=$this->crud_model->get_support_chat_box($u_id)->result_array();

        foreach ($support as $su) {
            if($su['from_id']==$this->login_id){
                echo '<div class="d-flex justify-content-end mb-4">
                                <div class="msg_cotainer_send">'.$su['message'].'<span class="msg_time_send"><br/>'.date('h:i A, d-D-Y',strtotime($su['created_at'])).'</span>
                                </div>
                                <div class="img_cont_msg">
                        <img src="'.base_url($this->crud_model->get_image_url($su['from_id'])).'" class="rounded-circle user_img_msg">
                                </div>
                            </div>';
            }else{
                echo '<div class="d-flex justify-content-start mb-4">
                                <div class="img_cont_msg">
                                    <img src="'.base_url($this->crud_model->get_image_url($su['to_id'])).'" class="rounded-circle user_img_msg">
                                </div>
                                <div class="msg_cotainer">'.$su['message'].'<span class="msg_time">'.date('h:i A, d-D-Y',strtotime($su['created_at'])).'</span>
                                </div>
                            </div>';
            }
        }
        /*$data=' <div class="d-flex justify-content-start mb-4">
                                <div class="img_cont_msg">
                                    <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img_msg">
                                </div>
                                <div class="msg_cotainer">
                                    Bye, see you
                                    <span class="msg_time">9:12 AM, Today</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mb-4">
                                <div class="msg_cotainer_send">
                                    Ok, thank you have a good day
                                    <span class="msg_time_send">9:10 AM, Today</span>
                                </div>
                                <div class="img_cont_msg">
                        <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img_msg">
                                </div>
                            </div>';
                    echo $data;*/
    }

    public function send_chat_sms()
    {
        $input=$this->input->post();
        $arr=array(
            'message'=>$input['message'],
            'from_id'=>$this->login_id,
            'to_id'=>$input['to_id']
        );
        $this->crud_model->saving_insert_details('support',$arr);
    }
    public function update_sms_read_tick($to_id)
    {
        $arr=array(
            'read_status'=>1,
        );
        $where=array(
            'to_id'=>$this->login_id,
            'from_id'=>$to_id
        );
        $this->crud_model->update_operation($arr,'support',$where);
    }
}