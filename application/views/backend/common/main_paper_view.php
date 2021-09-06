<?php $exam_id =  (int)$this->crud_model->get_type_name_by_id('trail_exam_downloads', $_GET['id'], 'exam_id');?>
<div class="row">
                        <div class="col">
                            
                                <section class="card">
                                    
                                    <div class="card-body">
                                        <div class="col-lg-12">
                                            <div class="tabs">
                                                <ul class="nav nav-tabs">
                                                    <li class="nav-item active">
                                                        <a class="nav-link active" href="#subject1" data-toggle="tab">Qustion Paper</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link " href="#subject2" data-toggle="tab">Solved Answers</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="#subject3" data-toggle="tab">Upload Answers</a>
                                                    </li>
                                                    <li class="nav-item ">
                                                        <a class="nav-link " href="#subject4" data-toggle="tab">Evaluated Paper</a>
                                                    </li>
                                                 </ul>
                                                <div class="tab-content">
                                                    <div id="subject1" class="tab-pane active">
                                                        
                                                        <div class="col-md-12 mb-3">
                                                            <div class="embed-responsive embed-responsive-16by9">
                                                                <iframe class="embed-responsive-item" src="<?php echo base_url();?>uploads/main/questions/<?php echo $exam_id;?>.pdf"></iframe>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div id="subject2" class="tab-pane ">
                                                    	<?php $row_status =  (int)$this->crud_model->get_type_name_by_id('main_exam_downloads', $_GET['id'], 'row_status');
                                                    	if($this->session->userdata('role_id') != 2 || ($this->session->userdata('role_id') == 2 && $row_status >= 2)){?>
                                                        	<div class="col-md-12 mb-3">
                                                                <div class="embed-responsive embed-responsive-16by9">
                                                                    <iframe class="embed-responsive-item" src="<?php echo base_url();?>uploads/trail/solved_answers/<?php echo $exam_id;?>.pdf"></iframe>
                                                                </div>
                                                            </div>
                                                    	<?php } else {?>
                                                        	<div class="col-lg-12 h-400">
                                                                <div class="main-error mb-3 pt-135">
                                                                    <h2 class="error-code text-dark text-center font-weight-semibold m-0">Key<i class="fas fa-file"></i></h2>
                                                                    <p class="error-explanation text-center">We wont show solved answer paper until you upload your answer paper .</p>
                                                                </div>
                                                            </div>
                                                    	<?php }?>
                                                    </div>
                                                    
                                                    <div id="subject3" class="tab-pane ">
                                                        <?php if(($this->session->userdata('role_id') == 2 && $row_status < 2)){?>
                                                        	<form method="post" action="<?=base_url('papers');?>" enctype="multipart/form-data" novalidate="novalidate" class="form-horizontal" id="form">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-4 control-label text-sm-right pt-2">Upload Answer Paper: </label>
                                                                    <div class="col-sm-5">
                                                                        <div class="custom-file">
                                                                            <input type="file" class="form-control custom-file-input" id="sapaper" name="trail_answer" required="">
                                                                            <label class="custom-file-label" for="sapaper">Choose file</label>
                                                                            <input type="hidden" class="form-control custom-file-input" id="download_id" name="download_id" value="<?php echo $_GET['id'];?>">
                                                                      </div>
                                                                    </div>
                                                                    <?php if($this->session->flashdata('error_message')!=''){
                                                                        echo '<div class="error">'.$thsssis->session->flashdata('error_message').'</div>';}?>
                                                                <input type="submit" class="btn btn-primary" Placeholder="Submit">
                                                                </div>
                                                            </form>
                                                        <?php } else {?>
                                                        	<div class="col-md-12 mb-3">
                                                                <div class="embed-responsive embed-responsive-16by9">
                                                                    <iframe class="embed-responsive-item" src="<?php echo base_url();?>uploads/trail/answers/<?php echo $_GET['id'];?>.pdf"></iframe>
                                                                </div>
                                                            </div>
                                                        <?php }?>
                                                    </div>
                                                    
                                                    <div id="subject4" class="tab-pane ">
                                                        <?php if(($this->session->userdata('role_id') == 2 && $row_status >= 3)){?>
                                                        	<div class="col-md-12 mb-3">
                                                                <div class="embed-responsive embed-responsive-16by9">
                                                                    <iframe class="embed-responsive-item" src="<?php echo base_url();?>uploads/trail/evaluated_answers/<?php echo $_GET['id'];?>.pdf"></iframe>
                                                                </div>
                                                            </div>
                                                        <?php }else{?>
                                                        	<div class="col-lg-12 h-400">
                                                                <div class="main-error mb-3 pt-135">
   <h2 class="error-code text-dark text-center font-weight-semibold m-0"><?php echo($row_status <= 1) ? 'Please upload your Answer paper..!' : 'Evalutaion is in progress';?><i class="fas fa-file"></i></h2>
<!--<p class="error-explanation text-center">We wont show solved answer paper until you upload your answer paper .</p> -->
                                                                </div>
                                                            </div>
                                                        <?php }?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>

                    <script type="text/javascript">
                        function save_file(){
                            alert($('#test input').val());
                            
                        }
                    </script>