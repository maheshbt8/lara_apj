 <!--Trailupload-->
                    <div class="row">
                        <div class="col">
                                <section class="card">
                                    <div class="card-header">
                                        <form method="post" action="<?=base_url('trailupload');?>" enctype="multipart/form-data" novalidate="novalidate" class="form-horizontal" id="form">
                                            <!-- <div class="form-group row">
                                                <label class="col-sm-4 control-label text-sm-right pt-2"> </label>
                                                <div class="col-sm-5">
                                                    <div class="btn-group-toggle" data-toggle="buttons">
                                                        <label class="btn btn-secondary active">
                                                            <input type="checkbox" checked autocomplete="off"> CPT
                                                        </label>
                                                        <label class="btn btn-secondary active">
                                                            <input type="checkbox" checked autocomplete="off"> IPCC
                                                        </label>
                                                        <label class="btn btn-secondary active">
                                                            <input type="checkbox" checked autocomplete="off"> Final
                                                        </label>
                                                    </div>
                                                </div>
                                                
                                            </div> -->
                                            <div class="form-group row">
                                                <label class="col-sm-4 control-label text-sm-right pt-2">Course Type: </label>
                                                <div class="col-sm-5">
                                                    <select class="form-control w100" onchange="get_subject_options(this.value);" required="" name="course">
                                                        <option value="">---Select Type---</option>
            <?php 
            $course=$this->crud_model->get_active_courses();
foreach ($course as $row) {
                                                            ?>
                                <option value="<?=$row['id'];?>" <?php if($course_id == $row['id']){echo "selected";}?>><?=$row['course'];?></option>
                            <?php }?>
                                                    </select>
                                                </div>
                                                <?php echo form_error('course', '<div class="error">', '</div>'); ?>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 control-label text-sm-right pt-2">Exam: </label>
                                                <div class="col-sm-5">
                                                    <input type="text" name="exam" class="form-control" required="">
                                                </div>
                                                <?php echo form_error('exam', '<div class="error">', '</div>'); ?>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 control-label text-sm-right pt-2">Subject: </label>
                                                <div class="col-sm-5">
                                                    <input type="text" name="subject" class="form-control" required="">
                                                </div>
                                                <?php echo form_error('subject', '<div class="error">', '</div>'); ?>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 control-label text-sm-right pt-2">Q P: </label>
                                                <div class="col-sm-5">
                                                    <div class="custom-file">
                                                        <input type="file" class="form-control custom-file-input" id="sapaper" name="qp" required="">
                                                        <label class="custom-file-label" for="qpaper">Choose file</label>
                                                  </div>
                                                </div>
                                                <?php 
                                                            if($this->session->flashdata('qp_error')!=''){echo '
                                                            <div class="error">'.$this->session->flashdata('qp_error').'</div>';}?>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 control-label text-sm-right pt-2">S A: </label>
                                                <div class="col-sm-5">
                                                    <div class="custom-file">
                                                        <input type="file" class="form-control custom-file-input" id="sapaper" name="sa" required="">
                                                        <label class="custom-file-label" for="sapaper">Choose file</label>
                                                  </div>
                                                  <?php 
                                                            if($this->session->flashdata('sa_error')!=''){echo '
                                                            <div class="error">'.$this->session->flashdata('sa_error').'</div>';}?>
                                                </div>
                                                
                                            </div>
                                            

                                            <div class="form-group row">
                                                <label class="col-sm-4 control-label text-sm-right pt-2"> </label>
                                                <div class="col-sm-5">
                                                    <div class="custom-file">
                                                        <input type="submit" class="btn btn-primary" Placeholder="Submit">

                                                  </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-body">
                                        <h4>View details</h4>
                                        <table class="table table-bordered table-striped mb-0" id="Trailupload">
                                            <thead>
                                                <tr>
                                                    <th>Exam Type</th>
                                                    <th>Exam</th>
                                                    <th>Subject</th>
                                                    <th>TrailUpload</th>
                                                    <th>Suggested Answers</th>
                                                    <th>TrailUploadDate</th>
                                                    <th>Actions</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i=0;
                                                foreach ($trailupload as $row) {
                                                    ?>
                                                <tr>
                                                    <td><?=$row['course'];?></td>
                                                    <td><?=$row['exam'];?></td>
                                                    <td><?=$row['subject'];?></td>
                                                    <td><?=$row['exam'];?>-<?=$row['subject'];?>-Qustion-paper.pdf</td>
                                                    <td><?=$row['exam'];?>-<?=$row['subject'];?>-Answer-paper.pdf</td>
                                                    <td>09/07/2018/15:17:05</td>
                                                    
                                                    <td>
                                                        <a href="<?php echo base_url('trail_papers');?>?exam_type=trail&id=<?php echo $row['id']?>" class=" mr-2  text-primary">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <a href="#" class="mr-2  text-danger ">
                                                            <i class="far fa-trash-alt"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php }?>
                                            </tbody>
                                        </table>
                                    </div>
                                </section>
                            </div>
                        </div>