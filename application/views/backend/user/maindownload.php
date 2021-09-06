<!--Trail Download-->
                    <div class="row">
                        <div class="col">
                                <section class="card">
                                    <div class="card-header">
                                       <form  method="post" action="#"enctype="multipart/form-data" novalidate="novalidate" id="form" class="form-inline">
                                            <div class="col-lg-11">
                                                <div class="row">
                                                    <div class="col-lg-4 form-group">
                                                        <select class="form-control w100" required="" name="exam_type">
                                                            <option value="">---Select Type---</option>
                                                            <?php 
                                                            $course=$this->crud_model->get_active_courses();
                                                            foreach ($course as $row) {?>
                                                            	<option value="<?=$row['id'];?>" <?php if($course_id == $row['id']){echo "selected";}?>><?=$row['course'];?></option>
                                                        	<?php }?>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-4 form-group">
                                                        <input type="text" name="start_date" data-plugin-datepicker="" autocomplete="off" class="form-control w100" Placeholder="Enter start time">
                                                    </div>
                                                    <div class="col-lg-4 form-group ">
                                                        <input type="text" name="end_date" data-plugin-datepicker="" autocomplete="off" class="form-control w100" Placeholder="Enter End time">
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-lg-1">
                                                <button type="submit" class="btn btn-primary search">Search</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-body">
                                    <?php if($this->session->flashdata('error_message')!=''){
                                        echo '<div class="alert alert-danger">'.$this->session->flashdata('error_message').'</div>';
                                    }elseif($this->session->flashdata('success_message')!=''){
                                        echo '<div class="alert alert-success">'.$this->session->flashdata('success_message').'</div>';
                                    }?>
                                        <table class="table table-bordered table-striped mb-0" id="trail-download">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                   <!--                  <?php
                                if($this->session->userdata('role_id')==1 || $this->session->userdata('role_id')==3){
                                ?><th>User Id</th>
                                                    <th>User Name</th>
                                                    <th>Mobile</th><?php }?> -->
                                                    <th>Question</th>
                                                    <th>Key</th>
                                                    <th>Answer</th>
                                                    <th>Evaluate</th>
                                                    <th>Marks</th>
                                                    <th>Out Of Marks</th>
                                                    <!-- <th>Actions</th> -->

                                                </tr>
                                            </thead>
                                            <tbody>
                                            	<?php foreach($main_download as $td):
                                                    ?>
                                                <tr>
                                                    <td><?php echo date('Y-m-d', strtotime($td['created_at']));?></td>
                                <!--                     <?php
                                if($this->session->userdata('role_id')==1 || $this->session->userdata('role_id')==3){
                                ?><td><?php echo $td['unique_id']; ?></td>
                                                    <td><?php echo $td['first_name'];?></td>
                                                    <td><?php echo $td['mobile'];?></td><?php }?> -->
                                                    <td>
                                                        <a href="<?=base_url('uploads/main/questions/').$td['id'].'.pdf';?>" class="alink" download="<?=$td['subject_code'].'- Question.pdf';?>"><?=$td['subject_code'].'- Question.pdf';?></a>
                                                    </td>
                                                    <td>
                                                        <?php 
                                                        if($td['row_status'] >= 2 && $td['row_status'] != 5){?>
                                                            <a href="<?=base_url('uploads/main/solved_answers/'.$td['id'].'.pdf');?>" download="<?=$td['subject_code'];?>-Solved Answer" class="alink"><?=$td['subject_code'];?>-Solved Answer.pdf</a>
                                                    <?php }else{?>
                                                        <p class="error-explanation text-center">We wont show solved answer paper until you upload your answer paper .</p>
                                                    <?php }?>
                                                        <!-- <a href="<?=base_url('uploads/main/solved_answers/').$td['id'].'.pdf';?>" class="alink" download="<?=$td['subject_code'].'- Solved Answer.pdf';?>"><?=$td['subject_code'].'- Solved Answer.pdf';?></a> -->
                                                    </td>
                                                    <td>
                                                        <?php 
                                                        if($td['row_status'] >= 2 && $td['row_status'] != 5){?>
                                                            <a href="<?=base_url('uploads/main/answers/'.$td['id'].'.pdf');?>" download="<?=$td['subject_code'];?>-Answer Paper" class="alink"><?=$td['subject_code'];?>-Answer Paper.pdf</a>
                                                    <?php }elseif($td['row_status'] == 5){?>
                                                        <p class="error-explanation text-center">Exam Closed.</p>
                                                    <?php }else{
$time_out = date('Y-m-d H:i:s',strtotime('+'.$td['time_out'].' minutes',strtotime($td['created_at'])));
        $da ='<span id="q'.$td['exam_id'].'"></span><script>exam_download_timer("'.$time_out.'",'.$td['exam_id'].','.$td['id'].');</script>';

                                                        ?>
            <span id="q<?=$td['exam_id'];?>"></span>
            <script type="text/javascript">
                $(window).bind("load", function() {
exam_download_timer('<?=$time_out;?>','<?=$td['exam_id'];?>','<?=$td['id'];?>');
});
            </script>
        <form method="post" action="<?=base_url('u_maindownload');?>" enctype="multipart/form-data" class="form-horizontal" >
        <div class="form-group row">
        <label class="col-sm-12 control-label pt-2">Upload Answer Paper: </label>
        <div class="col-sm-10">
        <div class="custom-file">
        <input type="file" class="form-control custom-file-input" id="sapaper" name="main_answer" required="">
        <label class="custom-file-label" for="sapaper">Choose file</label>
        <input type="hidden" class="form-control custom-file-input" id="download_id" name="download_id" value="<?php echo $td['id'];?>">
        <input type="hidden" name="input_type" value="answers">
        </div>
        
     <?php if($this->session->flashdata('error_message')!=''){
     echo '<div class="error">'.$thsssis->session->flashdata('error_message').'</div>';}?>
      <input type="submit" class="btn btn-primary btn-sm" Placeholder="Submit">
                                                                </div></div>
                                                            </form>
                                                    <?php }?>
                                                        <!-- <a href="<?=base_url('uploads/main/answers/').$td['id'].'.pdf';?>" class="alink" download="<?=$td['subject_code'].'- Answer.pdf';?>"><?=$td['subject_code'].'- Answer.pdf';?></a> -->
                                                    </td>
                                                    <td>
                                                        <?php 
                                                if($td['row_status'] == 4){?>
                                                            <a href="<?=base_url('uploads/main/evaluated_answers/'.$td['id'].'.pdf');?>" download="<?=$td['subject_code'];?>-Evaluation Paper" class="alink"><?=$td['subject_code'];?>-Evaluation Paper.pdf</a>
                                                    <?php }else{?>
                                                        <p class="error-explanation text-center">Waiting for Evaluated paper .</p>
                                                    <?php }?>
                                                        <!-- <a href="<?=base_url('uploads/main/evaluated_answers/').$td['id'].'.pdf';?>" class="alink" download="<?=$td['subject_code'].'- Evaluated Answers.pdf';?>"><?=$td['subject_code'].'- Evaluated Answers.pdf';?></a> -->
                                                    </td>
                                                    <td><?php echo $td['marks'];?></td>
                                                    <td><?php echo $td['max_marks'];?></td>
                                                   <!--  <td>
                                                        <a href="<?php echo base_url('papers');?>?id=<?php echo $td['id']?>" class=" mr-2  text-primary">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        
                                                    </td> -->
                                                </tr>
                                                <?php endforeach;?>
                                            </tbody>
                                        </table>
                                    </div>
                                </section>
                            </div>
                        </div>

                        <script type="text/javascript">
                            function exp_r(argument) {
                                ale(argument);
                            }
                        </script>