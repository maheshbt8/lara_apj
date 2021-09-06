 <!--Trailupload-->
                    <div class="row">
                        <div class="col">
                                <section class="card">
                                  
                                    <div class="card-body">
                                        <h4>View details</h4>
                                        <table class="table table-bordered table-striped mb-0" id="Trailupload">
                                            <thead>
                                                <tr>
                                                    <th>Exam Type</th>
                                                    <th>Exam</th>
                                                    <th>Subject</th>
                                                    <th>Question Paper</th>
                                                    <th>Key Paper</th>
                                                    <th>TrailUploadDate</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i=0; 
                                                foreach ($trailexams as $row) {
                                                $where=array('exam_id'=>$row['id']);
                                                $download_data=$this->crud_model->select_results_info('trail_exam_downloads',$where)->row_array();
                                                /*$download_id = $this->crud_model->get_type_name_by_where('trail_exam_downloads', 'exam_id', $row['id'], 'id');*/
                                                    ?>
                                                <tr>
                                                    <td><?=$row['course'];?></td>
                                                    <td><?=$row['exam'];?></td>
                                                    <td><?=$row['subject'];?></td>
                                                    <td>
                                                    <?php 
                                                        if(!empty($download_data)){?>
                                                            <a href="<?=base_url('uploads/trail/questions/'.$row['id'].'.pdf');?>" download="<?=$row['exam'];?>-<?=$row['subject'];?>-Question" class="alink"><?=$row['exam'];?>-<?=$row['subject'];?>-Question-paper.pdf</a>
                                                    <?php }else{?>
                                                        <a href="<?=base_url('uploads/trail/questions/'.$row['id'].'.pdf');?>" onclick="download_event(<?php echo $row['id'];?>, 1, 'trail_exam_downloads')" class="btn btn-success btn-sm" download="<?=$row['exam'];?>-<?=$row['subject'];?>-Question-paper"><?=$row['exam'];?>-<?=$row['subject'];?>-Question.pdf</a>
                                                    <?php }?>
                                                    </td>
                                                    <td>
                                                    <?php 
                                                        if(!empty($download_data) && ($download_data['row_status'] >= 2)){?>
                                                            <a href="<?=base_url('uploads/trail/solved_answers/'.$row['id'].'.pdf');?>" download="<?=$row['exam'];?>-<?=$row['subject'];?>-Solved Answer" class="alink"><?=$row['exam'];?>-<?=$row['subject'];?>-Solved Answer.pdf</a>
                                                    <?php }else{?>
                                                        <p class="error-explanation text-center">We wont show solved answer paper until you upload your answer paper .</p>
                                                    <?php }?>
                                                    </td>
                                                    <td><?=$row['created_at'];?></td>
                                                    
                                                    <td>

                                                    	<?php 
                                                    	if(!empty($download_data) && ($download_data['row_status'] == 1)){?>
                                                            <!-- <a href="<?php base_url();?>common/papers?id=<?php echo $download_id;?>" class="mr-2  text-primary">
                                                                <i class="fas fa-eye"></i>
                                                            </a> -->
            <form method="post" action="<?=base_url('u_trailexams');?>" enctype="multipart/form-data" novalidate="novalidate" class="form-horizontal" id="form">
        <div class="form-group row">
        <label class="col-sm-12 control-label pt-2">Upload Answer Paper: </label>
        <div class="col-sm-10">
        <div class="custom-file">
        <input type="file" class="form-control custom-file-input" id="sapaper" name="trail_answer" required="">
        <label class="custom-file-label" for="sapaper">Choose file</label>
        <input type="hidden" class="form-control custom-file-input" id="download_id" name="download_id" value="<?php echo $row['id'];?>">
        <input type="hidden" name="input_type" value="answers">
        </div>
        
     <?php if($this->session->flashdata('error_message')!=''){
     echo '<div class="error">'.$thsssis->session->flashdata('error_message').'</div>';}?>
      <input type="submit" class="btn btn-primary btn-sm" Placeholder="Submit">
                                                                </div></div>
                                                            </form>
                                                        <?php }else{?>
                                                        	<!-- <a href="<?=base_url('uploads/trail/questions/'.$row['id'].'.pdf');?>" onclick="download_event(<?php echo $row['id'];?>, 1, 'trail_exam_downloads')" class="btn btn-success" download="<?=$row['exam'];?>-<?=$row['subject'];?>-Question-paper"><?=$row['exam'];?>-<?=$row['subject'];?>-Question-paper.pdf</a> -->
                                                        <?php }?>

                                                    </td>
                                                </tr>
                                            <?php }?>
                                            </tbody>
                                        </table>
                                    </div>
                                </section>
                            </div>
                        </div>