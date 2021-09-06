 <div class="row">
                                <div class="col">
                                    <section class="card">
                                        
                                        <div class="card-body">
                                            <form method="post" action="<?=base_url('mainupload');?>" enctype="multipart/form-data" class="form-horizontal" novalidate="novalidate" id="form">
                                                 <div class="form-group row">
                                                    <!-- <div class="btn-group btn-group-toggle" data-toggle="buttons"> -->
                                                        <div class="" >
                                                        <?php 
                                                        foreach ($coursers as $row) {?>
                                                        <label class="btn btn-secondary" id="courses">
                                                            <input type="radio" name="course_id" id="option1" autocomplete="off" value="<?=$row['id'];?>" onclick="get_plans('<?=$row['id'];?>')" required=""> <?=ucwords($row['course']);?>
                                                        </label>
                                                        <?php 
                                                        }
                                                        ?> 
                                                    </div>
                                                    <label class="error" for="course_id">Course is required.</label>
                                                    <?php echo form_error('course_id', '<div class="error">', '</div>'); ?>
                                                </div>
                                                <div class="form-group row">
                                                    <div class=""  id="plans_list">
                                                        
                                                    </div>
                                                    <?php echo form_error('plans', '<div class="error">', '</div>'); ?>
                                                 </div>
                                                
                                                <!-- <div class="form-group row">
                                                    <label class="col-sm-4 control-label text-sm-right pt-2">Your Date/Time: </label>
                                                    <div class="col-sm-4">
                                        <input type="text" data-plugin-datepicker="" class="form-control" placeholder="---Select date---"  name="scheduled_date" value="<?=set_value('scheduled_date')?>">
                                        <?php echo form_error('scheduled_date', '<div class="error">', '</div>'); ?>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input type="time" name="scheduled_time" class="form-control" value="<?=set_value('scheduled_time')?>">
                                                        <?php echo form_error('scheduled_time', '<div class="error">', '</div>'); ?>
                                                    </div>
                                                    
                                                </div> -->
                                                <div class="form-group row">
                                                    <label class="col-sm-4 control-label text-sm-right pt-2">Your Subject: </label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control" id="subjects_list" name="subject_id" required="">
                                                        <option value="">Select Course First</option>
                                                    </select>
                                                    <?php echo form_error('subject_id', '<div class="error">', '</div>'); ?>
                                                    </div>

                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 control-label text-sm-right pt-2">Your Subject Code: </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="subject_code" class="form-control" value="<?=set_value('subject_code')?>" required="">
                                                        <?php echo form_error('subject_code', '<div class="error">', '</div>'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 control-label text-sm-right pt-2">Your Syllabus: </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="syllabus" class="form-control" value="<?=set_value('syllabus')?>" required="" >
                                                        <?php echo form_error('syllabus', '<div class="error">', '</div>'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 control-label text-sm-right pt-2">Your Max. Marks: </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="max_marks" class="form-control" value="<?=set_value('max_marks')?>" required="">
                                                        <?php echo form_error('max_marks', '<div class="error">', '</div>'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 control-label text-sm-right pt-2">Your Time Out Period(in mins): </label>
                                                    <div class="col-sm-8">
                                                        <input type="number" name="time_out" class="form-control" value="<?=set_value('time_out')?>"  onkeypress="return event.charCode >= 48" min="1" required="">
                                                        <?php echo form_error('time_out', '<div class="error">', '</div>'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 control-label text-sm-right pt-2"> Q.Paper (PDF only): </label>
                                                    <div class="col-sm-8">
                                                        <div class="custom-file">
                                                            <input type="file" class="form-control custom-file-input" id="qpaper" name="qp" required="">
                                                            <label class="custom-file-label" for="qpaper">Choose file</label>
                                                            <?php 
                                                            if($this->session->flashdata('qp_error')!=''){echo '
                                                            <div class="error">'.$this->session->flashdata('qp_error').'</div>';}?>
                                                            <?php echo form_error('qp', '<div class="error">', '</div>'); ?>
                                                      </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 control-label text-sm-right pt-2">SA Paper (PDF only): </label>
                                                    <div class="col-sm-8">
                                                        <div class="custom-file">
                                                            <input type="file" class="form-control custom-file-input" id="sapaper" name="sa" required="">
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