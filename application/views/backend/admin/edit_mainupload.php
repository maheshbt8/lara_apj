
 <div class="row">
                                <div class="col">
                                    <section class="card">
                                        
                                        <div class="card-body">
                                            <form method="post" action="<?=base_url('edit_mainupload/').base64_encode($edit_upload['id']);?>" enctype="multipart/form-data" class="form-horizontal" novalidate="novalidate" id="form">
                                                <input type="hidden" name="id" value="<?=$edit_upload['id'];?>">
                                                 <div class="form-group row">
                                                    <!-- <div class="btn-group btn-group-toggle" data-toggle="buttons"> -->
                                                        <div class="btn-group " >
                                                        <?php 
                                                        foreach ($coursers as $row) {?>
                                                        <label class="btn btn-secondary ">
                                                            <input type="radio" name="course_id" id="option1" autocomplete="off" value="<?=$row['id'];?>" onclick="get_plans('<?=$row['id'];?>')" <?=($row['id']==$edit_upload['course_id'])? 'checked' : '';?> required=""> <?=ucwords($row['course']);?>
                                                        </label>
                                                        <?php 
                                                        }
                                                        ?>
                                                    <label class="error" for="course_id">Course is required.</label>
                                                        
                                                    </div>
                                                    <?php echo form_error('course_id', '<div class="error">', '</div>'); ?>
                                                </div>
                                                <div class="form-group row">
                                                    <div class=""  id="plans_list">
                                                        <?php
     $plans=$this->crud_model->get_plans_by_id($edit_upload['course_id']);
    foreach ($plans as $row) {
        $p=$this->crud_model->select_results_info('exam_plan_relation',array('exam_id'=>$edit_upload['id'],'plan_id'=>$row['id']))->row_array();
echo '<label class="btn btn-secondary active"><input type="checkbox" autocomplete="off" name="plans[]" value="'.$row['id'].'"' .  (($row['id']== $p['plan_id'])? "checked" : "") . '  required="" > '.ucwords($row['plan']).'</label>';
echo ($row['plan_type']=='scheduled')? '<div class="form-group row"><label class="col-sm-12 control-label">Your Date: </label><div class="col-sm-12">
<input type="date" data-plugin-datepicker="" class="form-control" placeholder="---Select date---"  name="scheduled_date['.$row['id'].']" value="' .  (($row['id'] == $p['plan_id'] && $p['scheduled_date']!= '')? $p['scheduled_date'] : "") . '"></div></div>' : '<br/><input type="hidden" value="" name"scheduled_date['.$row['id'].']"/>';
    }
    echo '<label class="error" for="plans[]">Plan is required.</label>';
                                                        ?>
                                                    </div>
                                                    <?php echo form_error('plans', '<div class="error">', '</div>'); ?>
                                                 </div>
                                                
                                                
                                                <div class="form-group row">
                                                    <label class="col-sm-4 control-label text-sm-right pt-2">Your Subject: </label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control" id="subjects_list" name="subject_id" required="">
                                                       <?php
    $pl=$this->crud_model->get_subjects_by_id($edit_upload['course_id']);
        echo '<option value="">Select Subject</option>';
    foreach ($pl as $row) {
    echo '<option value="'.$row['id'].'"' .  (($row['id']== $edit_upload['subject_id'])? "selected" : "") . '>'.$row['subject'].'</option>';
    }
    ?>

                                                    </select>
                                                    <?php echo form_error('subject_id', '<div class="error">', '</div>'); ?>
                                                    </div>

                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 control-label text-sm-right pt-2">Your Subject Code: </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="subject_code" class="form-control" value="<?=((!empty(set_value('subject_code')))? set_value('subject_code') : $edit_upload['subject_code'] );?>" required="">
                                                        <?php echo form_error('subject_code', '<div class="error">', '</div>'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 control-label text-sm-right pt-2">Your Syllabus: </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="syllabus" class="form-control" value="<?=((!empty(set_value('syllabus')))? set_value('syllabus') : $edit_upload['syllabus'] );?>" required="">
                                                        <?php echo form_error('syllabus', '<div class="error">', '</div>'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 control-label text-sm-right pt-2">Your Max. Marks: </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="max_marks" class="form-control" value="<?=((!empty(set_value('max_marks')))? set_value('max_marks') : $edit_upload['max_marks'] );?><?=set_value('max_marks')?>" required="">
                                                        <?php echo form_error('max_marks', '<div class="error">', '</div>'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 control-label text-sm-right pt-2">Your Time Out Period(in mins): </label>
                                                    <div class="col-sm-8">
                                                        <input type="number" name="time_out" class="form-control" value="<?=((!empty(set_value('time_out')))? set_value('time_out') : $edit_upload['time_out'] );?><?=set_value('time_out')?>" required="">
                                                        <?php echo form_error('time_out', '<div class="error">', '</div>'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 control-label text-sm-right pt-2"> Q.Paper: </label>
                                                    <div class="col-sm-8">
                                                        <div class="custom-file">
                                                            <input type="file" class="form-control custom-file-input" id="qpaper" name="qp">
                                                            <label class="custom-file-label" for="qpaper">Choose file</label>
                                                            <?php 
                                                            if($this->session->flashdata('qp_error')!=''){echo '
                                                            <div class="error">'.$this->session->flashdata('qp_error').'</div>';}?>
                                                            <?php echo form_error('qp', '<div class="error">', '</div>'); ?>
                                                      </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 control-label text-sm-right pt-2">SA Paper: </label>
                                                    <div class="col-sm-8">
                                                        <div class="custom-file">
                                                            <input type="file" class="form-control custom-file-input" id="sapaper" name="sa">
                                                            <label class="custom-file-label" for="sapaper">Choose file</label>
                                                            <?php 
                                                            if($this->session->flashdata('sa_error')!=''){echo '
                                                            <div class="error">'.$this->session->flashdata('sa_error').'</div>';}?>
                                                            <?php echo form_error('sa', '<div class="error">', '</div>'); ?>
                                                      </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 control-label text-sm-right pt-2"> </label>
                                                    <div class="col-sm-8">
                                                        <div class="custom-file">
                                                            <input type="submit" class="btn btn-primary" Placeholder="Submit">
                                                      </div>
                                                    </div>
                                                </div>
                                                
                                            </form>
                                        </div>
                                    </section>
                                </div>
                            </div>
<script type="text/javascript">
  
function get_plans(course_id) {
    $.ajax({
            url: '<?php echo base_url();?>ajax/get_plans_by_id/' + course_id ,
            success: function(response)
            {
                jQuery('#plans_list').html(response);
                get_subjects(course_id);
            }
    });

}
function get_subjects(course_id){
    $.ajax({
            url: '<?php echo base_url();?>ajax/get_subjects_by_id/' + course_id ,
            success: function(response)
            {
                jQuery('#subjects_list').html(response);
            }
    });    
}
</script>