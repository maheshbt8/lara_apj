<?php
if(isset($_GET['plan'])){
    $get_plan=$_GET['plan'];
}else{
    $get_plan='';
}
if(isset($_GET['subject'])){
    $get_subject=$_GET['subject'];
}else{
    $get_subject='';
}
?>
<?php $this->session->set_userdata('last_page',current_url());?>
<div class="row">
                        <div class="col">
                                <section class="card">
                                    <div class="card-header">
                                       <form class="form-inline">
                                            <div class="col-lg-11">
                                                <div class="row">
                                                    <div class="col-lg-3 form-group">
                                                        <select class="form-control w100" name="course" onchange ="get_plan_options(this.value);">
                                                            <option value="">---Select Type---</option>
                                                            <?php
$course=$this->crud_model->get_active_courses();
foreach ($course as $row) {
                                                            ?>
                                <option value="<?=$row['id'];?>"><?=$row['course'];?></option>
                            <?php }?>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-3 form-group">
                                                        <select class="form-control w100" name="plan" id="plans_list">
                                                            <option value="">---Select Plan---</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-3 form-group ">
                                                        <select class="form-control w100" name="subject" id="subjects_list">
                                                            <option value="">---Select Subject---</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-3 form-group">
                                                        <div class="input-group">
                                                            <span class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    <i class="fas fa-calendar-alt"></i>
                                                                </span>
                                                            </span>
                                                            <input type="text" data-plugin-datepicker="" class="form-control" placeholder="---Select date---" name="date" autocomplete="off">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-1">
                                                <button type="submit" class="btn btn-primary">Search</button>
                                            </div>
                                        </form>
                                                    
                                    </div>
                                    <div class="card-body">
<form  method="post" action="<?=base_url('assign_evaluator');?>"enctype="multipart/form-data" novalidate="novalidate" id="form1">                                        
                                        <table class="table table-bordered table-striped mb-0" id="main-download">
                                            <thead>
                                                <tr>
                                                    <th><input type="checkbox" id="select_all_down"/></th>
                                                    <th>Sno</th>
                                                    <th>Date/Time</th>
                                                    <th>UserID</th>
                                                    <th>Type</th>
                                                    <th>Plan</th>
                                                    <th>Subject</th>
                                                    <th>Code</th>
                                                    <th>Answer Paper</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                $feeling=array();
                                if(isset($_GET['course'])!='' || isset($_GET['plan'])!='' || isset($_GET['subject'])!='' || isset($_GET['date'])!=''){
                                                    $where=array();
                                                    
                                                    if($_GET['date']!=''){
                                                        $shd=date('Y-m-d 00:00:00',strtotime($_GET['date']));
                                                        $eshd=date('Y-m-d 23:59:59',strtotime($_GET['date']));
                                                        $where['created_at >=']=$shd;
                                                         $where['created_at <=']=$eshd;
                                                    }
                                                    if($_GET['plan'] != ''){
                                                        $where['plan_id'] =$_GET['plan'];
                                                    }

$feeling=$this->crud_model->get_exam_downloads_where_info($where);
/*echo $this->db->last_query();die;*/
                                                }else{
$feeling=$this->crud_model->get_exam_downloads_info();
}
                    $i=0;foreach ($feeling as $row) {
                    $exam=$this->crud_model->get_single_exam_info($row['exam_id']);

        if (isset($_GET['course'])==FALSE || ((isset($_GET['course'])==TRUE) && ($exam['course_id'] == $_GET['course'])))
        {
          /*  $plan_ids=explode(',',$exam['plan_ids']);
            
        if ($get_plan=='' || ($get_plan!='' && in_array($get_plan,$plan_ids)))
        {*/
    if ($get_subject=='' || ($get_subject!='' && ($exam['subject_id'] == $get_subject)))
        {
                            
                        $user=$this->crud_model->get_user_details($row['user_id']);
                        $course=$this->crud_model->get_single_course_info($exam['course_id']);
                for($c=0;$c<count($plan_ids);$c++){
                $plan=$this->crud_model->get_single_plan_info($plan_ids[$c]);
                $plans[]=$plan['plan'];
                }
                $subject=$this->crud_model->get_single_subject_info($exam['subject_id']);
                                                ?>
                                                <tr>
                                                    <td><?php if($row['evaluator_id']==0){?><input type="checkbox" name="download[]"  class="trail_download" value="<?=$row['id'];?>" ><?php }else{echo "Assigned - <span class='text-success'><b>".$this->crud_model->get_type_name_by_where('users', 'id', $row['evaluator_id'], 'first_name')."</b></span>";}?></td>
                                                    <td><?=$i+1;?></td>
                                                    <td><?=$row['created_at'];?></td>
                                                    <td><?=$user['unique_id'];?></td>
                                                    <td><?=$course['course'];?></td>
                                                    <td><?=$this->crud_model->get_type_name_by_where('plans', 'id', $row['plan_id'], 'plan');?></td>
                                                    <td><?=$subject['subject'];?></td>
                                                    <td><?=$exam['subject_code'];?></td>
                                                    <td><?=$this->crud_model->get_type_name_by_where('plans', 'id', $row['plan_id'], 'plan_code').'_'.$exam['subject_code'].'-'.$user['unique_id'];?>.pdf</td>
                                                    <td>
                                                        <?php
                                                    if($row['row_status']=='0'){echo "<span class='text-danger'>Deleted</span>";}elseif($row['row_status']=='1'){echo "<span class='text-primary'>User Downloaded</span>";}elseif($row['row_status']=='2'){echo "<span class='text-info'>Answers Uploaded By User</span>";}elseif($row['row_status']=='3'){echo "<span class='text-warning'>Evaluator Downloaded</span>";}elseif($row['row_status']=='3'){echo "<span class='text-success'>Resluts Issued</span>";}?></td>
                                                    <td>
                                                       <a href="<?=base_url('common_delete_details/').'id/'.$row['id'].'/exam_downloads';?>" class="mr-2  text-danger ">
                                                                <i class="far fa-trash-alt"></i>
                                                            </a>
                                                    </td>
                                                </tr>
                                                <?php $i++;}/*}*/ }} ?>
                                            </tbody>
                                        </table>
                                         <div class="col-lg-10">
                                                <div class="row">
                                                    <div class="col-lg-4 form-group">
                                                        <select class="form-control w100" required="" name="evaluator" id="evaluator">
                                                            <option value="">---Select Evaluator---</option>
                                                            <?php
                                                            foreach ($evaluator_data as $row) {?>
                                                                <option value="<?=$row['id'];?>"><?=ucwords($row['first_name']);?></option>
                                                            <?php }?>
                                                        </select>
                                                        <input type="hidden" name="type" value="main">
                                                    </div>
                                                    <div class="col-lg-4 form-group">
                                                        <button type="button" class="btn btn-primary search" onclick="form_submit()" >Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </section>
                            </div>
                        </div>
  <script type="text/javascript">
    //select all checkboxes
$("#select_all_down").change(function(){  //"select all" change 
    var status = this.checked; // "select all" checked status
    $('.trail_download').each(function(){ //iterate all listed checkbox items
        this.checked = status; //change ".checkbox" checked status
    });
});

$('.trail_download').change(function(){ //".checkbox" change 
    //uncheck "select all", if one of the listed checkbox item is unchecked
    if(this.checked == false){ //if this item is unchecked
        $("#select_all_down")[0].checked = false; //change "select all" checked status to false
    }
    
    //check "select all" if all checkbox items are checked
    if ($('.trail_download:checked').length == $('.trail_download').length ){ 
        $("#select_all_down")[0].checked = true; //change "select all" checked status to true
    }
});

function form_submit() {
    if ($(".trail_download:checked").length > '0'){
        var evaluator=$('#evaluator').val();
        if(evaluator!=''){
$( "#form1" ).submit();
        }else{
            alert('Please Assign Evaluator for this records');    
        }
    }else{
        alert('Please Select alert one checkbox');
    }
}
</script>