<!--Add notes in Main Exam Section-->
                            <div class="row">
                                <div class="col">
                                    <section class="card">
                                       
                                        <div class="card-body">
                                           
                                            <h3><b>+ </b>Add Notes</h3>
                                                
                                            <form method="post" action="<?=base_url('notes_add');?>" enctype="multipart/form-data" novalidate="novalidate" class="form-horizontal" id="form">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 control-label text-sm-right pt-2">Choose Couse: </label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control" onchange ="get_subject_options(this.value);" name="course" required="">
                                                        <option value="">-- Select Course --</option>
<?php
$course=$this->crud_model->get_active_courses();
foreach ($course as $row) {?>
        <option value="<?=$row['id'];?>"><?=$row['course'];?></option>
                            <?php }?>
                                                    </select>
                                                    <?php echo form_error('course', '<div class="error">', '</div>'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 control-label text-sm-right pt-2">Choose Subject: </label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control"  id="subjects_list" name="subject" required="">
                                                        <option value="">-- Select Subject --</option>
                                                    </select>
                                                    <?php echo form_error('subject', '<div class="error">', '</div>'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 control-label text-sm-right pt-2">Title: </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="title" class="form-control" required="">
                                                        <?php echo form_error('title', '<div class="error">', '</div>'); ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 control-label text-sm-right pt-2">Upload Notes: </label>
                                                    <div class="col-sm-8">
                                                        <div class="custom-file">
                                                            <input type="file" class="form-control custom-file-input" id="sapaper" name="notes" required="">
                                                            <label class="custom-file-label" for="sapaper">Choose file</label>
                                                            <?php 
                                                            if($this->session->flashdata('qp_error')!=''){echo '
                                                            <div class="error">'.$this->session->flashdata('qp_error').'</div>';}?>
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
                