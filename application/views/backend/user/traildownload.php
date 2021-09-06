<!--Trail Download-->
                    <div class="row">
                        <div class="col">
                                <section class="card">
                                    <div class="card-header">
                                       <form  method="post" action="<?=base_url('user/traildownload');?>"enctype="multipart/form-data" novalidate="novalidate" id="form" class="form-inline">
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
                                        <table class="table table-bordered table-striped mb-0" id="trail-download">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Question Paper</th>
                                                    <th>Key Paper</th>
                                                    <th>Answer Paper</th>
                                                    <th>Evaluated Paper</th>
                                                    <th>Marks</th>
                                                    <th>Out Of Marks</th>
                                                    <!-- <th>Actions</th> -->

                                                </tr>
                                            </thead>
                                            <tbody>
                                            	<?php foreach($trail_download as $td):
                                                    $where=array('exam_id'=>$td['id']);
                                                $download_data=$this->crud_model->select_results_info('trail_exam_downloads',$where)->row_array();
                                                    ?>
                                                <tr>
                                                    <td><?php echo date('Y-m-d', strtotime($td['created_at']));?></td>
                                                    <td>
                                                    <?php 
                                                        if(!empty($download_data)){?>
                                                            <a href="<?=base_url('uploads/trail/questions/'.$td['id'].'.pdf');?>" download="<?=$td['exam'];?>-<?=$td['subject'];?>-Question" class="alink"><?=$td['exam'];?>-<?=$td['subject'];?>-Question-paper.pdf</a>
                                                    <?php }?>
                                                    </td>
                                                    <td>
                                                    <?php 
                                                        if(!empty($download_data) && ($download_data['row_status'] >= 2)){?>
                                                            <a href="<?=base_url('uploads/trail/solved_answers/'.$td['id'].'.pdf');?>" download="<?=$td['exam'];?>-<?=$td['subject'];?>-Solved Answer" class="alink"><?=$td['exam'];?>-<?=$td['subject'];?>-Solved Answer.pdf</a>
                                                    <?php }else{?>
                                                        <p class="error-explanation text-center">We wont show solved answer paper until you upload your answer paper .</p>
                                                    <?php }?>
                                                    </td>
                                                    <td>
                                                    <?php 
                                                        if(!empty($download_data) && ($download_data['row_status'] >= 2)){?>
                                                            <a href="<?=base_url('uploads/trail/answers/'.$td['id'].'.pdf');?>" download="<?=$td['exam'];?>-<?=$td['subject'];?>-Answer Paper" class="alink"><?=$td['exam'];?>-<?=$td['subject'];?>-Answer Paper.pdf</a>
                                                    <?php }elseif(!empty($download_data)){?>
                                                    <form method="post" action="<?=base_url('u_trailexams');?>" enctype="multipart/form-data"class="form-horizontal">
        <div class="form-group row">
        <label class="col-sm-12 control-label pt-2">Upload Answer Paper: </label>
        <div class="col-sm-10">
        <div class="custom-file">
        <input type="file" class="form-control custom-file-input" id="sapaper" name="trail_answer" required="">
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
                                                    </td>
                                                    <td>
                                                    <?php 
                                                if(!empty($download_data) && ($download_data['row_status'] == 4)){?>
                                                            <a href="<?=base_url('uploads/trail/evaluated_answers/'.$td['id'].'.pdf');?>" download="<?=$td['exam'];?>-<?=$td['subject'];?>-Evaluation Paper" class="alink"><?=$td['exam'];?>-<?=$td['subject'];?>-Evaluation Paper.pdf</a>
                                                    <?php }elseif(!empty($download_data)){?>
                                                        <p class="error-explanation text-center">Waiting for Evaluated paper .</p>
                                                    <?php }?>
                                                    </td>
                                                    <td><?php echo $td['marks'];?></td>
                                                    <td><?php echo $td['out_of'];?></td>
                                                    <!-- <td>
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