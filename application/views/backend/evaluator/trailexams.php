<!--Trail Download-->
                    <div class="row">
                        <div class="col">
                                <section class="card">
                                    <div class="card-header">
                                       <form  method="post" action="<?=base_url('e_trailexams');?>"enctype="multipart/form-data" novalidate="novalidate" id="form" class="form-inline">
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
                                                    <th>User Id</th>
                                                    <th>User Name</th>
                                                    <th>Mobile</th>
                                                    <th>Question Paper</th>
                                                    <th>Marks</th>
                                                    <th>Out Of Marks</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                            	<?php foreach($trailexams as $td):
                                                    $course=$this->crud_model->get_s
                                                    ?>
                                                <tr>
                                                    <td><?php echo date('Y-m-d', strtotime($td['created_at']));?></td>
                                                    <td><?php echo $td['unique_id']; ?></td>
                                                    <td><?php echo $td['first_name'];?></td>
                                                    <td><?php echo $td['mobile'];?></td>
                                                    <td><!-- <button alt="download" onclick="download_file(<?php echo $td['id'];?>,'trail/questions','mahi')"><?=$td['exam'];?>-<?=$td['subject'];?>-Qustion-paper.pdf</button> -->
                                                      <!-- <button type="button" onclick="window.location.href='<?=base_url('common/filesdownload1/2/trail-questions/mehar/pdf');?>'" class="btn btn-success">Download</button> -->
                                                      <a href="<?=base_url('uploads/trail/questions/'.$td['exam_id'].'.pdf');?>" alt="download" class="btn btn-success" download="question-paper">Download</a>
                                                    </td>
                                                    <td><?php echo $td['marks'];?></td>
                                                    <td><?php echo $td['out_of'];?></td>
                                                    <td>
                                                        <?php
                                                    if($td['row_status']=='0'){echo "<span class='text-danger'>Deleted</span>";}elseif($td['row_status']=='1'){echo "<span class='text-primary'>User Downloaded</span>";}elseif($td['row_status']=='2'){echo "<span class='text-info'>Answers Uploaded By User</span>";}elseif($td['row_status']=='3'){echo "<span class='text-warning'>Evaluator Downloaded</span>";}elseif($td['row_status']=='4'){echo "<span class='text-success'>Resluts Issued</span>";}?></td>
                                                    <td>
                                                        <?php 
                                                        if($td['row_status']==4){?>
<a href="<?php base_url();?>common/papers?id=<?php echo $td['id'];?>" class=" mr-2  text-primary">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                        <?php }elseif($td['row_status']==3){?>
<form method="post" action="<?=base_url('e_trailexams');?>" enctype="multipart/form-data" class="form-horizontal" >
        <div class="form-group row">
            <label class="col-sm-4 control-label text-sm-right pt-2">Marks: </label>
            <div class="col-sm-8">
                <input type="text" name="marks" class="form-control" required="">
            </div>
            <?php echo form_error('subject', '<div class="error">', '</div>'); ?>
        </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 control-label text-sm-right pt-2">Out of Marks: </label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="out_of" class="form-control" required="" value="">
                                                </div>
                                                <?php echo form_error('subject', '<div class="error">', '</div>'); ?>
                                            </div>
        <div class="form-group row">
        <label class="col-sm-4 control-label text-sm-right pt-2">Upload Evaluated Paper: </label>
        <div class="col-sm-8">
        <div class="custom-file">
        <input type="file" class="form-control custom-file-input" id="sapaper" name="trail_answer" required="">
        <label class="custom-file-label" for="sapaper">Choose file(PDF)</label>
        <input type="hidden" class="form-control custom-file-input" id="download_id" name="download_id" value="<?php echo $td['id'];?>" >
        <input type="hidden" name="input_type" value="evaluated_answers">
        </div>
        
     <?php if($this->session->flashdata('error_message')!=''){
     echo '<div class="error">'.$thsssis->session->flashdata('error_message').'</div>';}?>
 </div>
 </div>
 <div class="form-group row">
     <div class="offset-4 col-sm-5">
      <input type="submit" class="btn btn-primary" Placeholder="Submit">
                                                                </div>
                                                            </div>
                                                            </form>
                                                            <!-- <a href="<?php base_url();?>common/papers?id=<?php echo $td['id'];?>" class=" mr-2  text-primary">
                                                                <i class="fas fa-eye"></i>
                                                            </a> -->
                                                        <?php }elseif($td['row_status']==2){?>
                											<a href="<?=base_url('uploads/trail/answers/'.$td['id'].'.pdf');?>" onclick="update_download_event(<?php echo $td['id'];?>, 3, 'trail_exam_downloads')" class="btn btn-success" download="mahi"><?=$td['exam'];?>-<?=$td['subject'];?>-Answer-paper.pdf</a>
                                                        <?php }?>
                                                        
                                                    </td>
                                                </tr>
                                                <?php endforeach;?>
                                            </tbody>
                                        </table>
                                    </div>
                                </section>
                            </div>
                        </div>