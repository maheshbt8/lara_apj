<?php
$this->session->set_userdata('last_page',current_url());
?>
<!--main upload details page content-->
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
                                        <table class="table table-bordered table-striped mb-0" id="main-upload-details">
                                            <thead>
                                                <tr>
                                                    <th>Sno</th>
                                                    <th>Course</th>
                                                    <th>Plans - Scheduled Date</th>
                                                    <th>Code</th>
                                                    <th>Subject</th>
                                                    <th>Syllabus</th>
                                                    <!-- <th>Scheduled Date</th> -->
                                                    <th>QP</th>
                                                    <th>SA</th>
                                                    <th>Marks</th>
                                                    <th>Time</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $feeling=array();
                                                if(isset($_GET['course'])!='' || isset($_GET['plan'])!='' || isset($_GET['subject'])!='' || isset($_GET['date'])!=''){
                                                    $where=array();
                                                    if($_GET['course']!=''){
                                                        $where['course_id']=$_GET['course'];
                                                    }
                                                    if($_GET['subject']!=''){
                                                        $where['subject_id']=$_GET['subject'];
                                                    }
                                                    if($_GET['date']!=''){
                                                        $shd=date('Y-m-d 00:00:00',strtotime($_GET['date']));
                                                        $eshd=date('Y-m-d 23:59:59',strtotime($_GET['date']));
                                                        $where['scheduled_date >=']=$shd;
                                                         $where['scheduled_date <=']=$eshd;
                                                    }
                                                    //print_r($where);die;
                                            $fe=$this->crud_model->get_upload_details_where_info($where);
                                            if($_GET['plan']!=''){
foreach ($fe as $rs) {
    //$os=explode(',',$rs['plan_ids']);
    $os=$this->crud_model->select_results_info('exam_plan_relation',array('exam_id'=>$rs['id']))->result_array();
    if(in_array($_GET['plan'], array_column($os, 'plan_id')))
    {
    $feeling[]=$rs;
    }
}
}else{
    $feeling=$fe;
}
                                                }else{
                                $feeling=$this->crud_model->get_upload_details_info();
                                                }
                                                    $i=0;foreach ($feeling as $row) {
                $plan_ids=$this->crud_model->select_results_info('exam_plan_relation',array('exam_id'=>$row['id']))->result_array();
                //$plan_ids=array_column($plan_ids,'plan_id');
                $course=$this->crud_model->get_single_course_info($row['course_id']);
                /*$plan_ids=explode(',',$plan_ids);*/
                for($c=0;$c<count($plan_ids);$c++){
                $plan=$this->crud_model->get_single_plan_info($plan_ids[$c]['plan_id']);
                $plans[]=$plan['plan'].' - '. (($plan_ids[$c]['scheduled_date'] !='')? $plan_ids[$c]['scheduled_date'] : 'N/A' );
                }
                $subject=$this->crud_model->get_single_subject_info($row['subject_id']);
                                                    ?>
                                                <tr>
                                                    <td><?=$i+1;?></td>
                                                    <td><?=$course['course'];?></td>
                                                    <td><?=implode(' ,<br/>',$plans);?></td>
                                                    <td><?=$row['subject_code'];?></td>
                                                    <td><?=$subject['subject'].'- Key';?></td>
                                                    <td><?=$row['syllabus'];?></td>
                                                    <!-- <td><?php if($row['scheduled_date']==NULL){echo "N/A";}else{echo date('M d,Y h:i A',strtotime($row['scheduled_date']));}?></td> -->
                                                    <td>
                                                        <a href="<?=base_url('uploads/main/questions/').$row['id'].'.pdf';?>" class="alink" download="<?=$row['subject_code'].'- Question.pdf';?>"><?=$row['subject_code'].'- Question.pdf';?></a>
                                                    <td>
                                                        <a href="<?=base_url('uploads/main/solved_answers/'.$row['id'].'.pdf');?>" download="<?=$row['subject_code'];?>-Solved Answer" class="alink"><?=$row['subject_code'];?>-Solved Answer.pdf</a>
                                                    </td>
                                                    <td><?=$row['max_marks'];?></td>
                                                    <td><?=$row['time_out'];?></td>
                                                    <td>
                                                        <a href="<?=base_url('edit_mainupload/').base64_encode($row['id']);?>" class=" mr-2  text-primary">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                        <a href="<?=base_url('common_delete_details/').'id/'.$row['id'].'/exams';?>" class="mr-2  text-danger ">
                                                                <i class="far fa-trash-alt"></i>
                                                            </a>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php $i++;}?>
                                            </tbody>
                                        </table>
                                    </div>
                                </section>
                            </div>
                        </div>


