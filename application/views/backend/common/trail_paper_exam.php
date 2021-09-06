<?php /*$exam_id =  (int)$this->crud_model->get_type_name_by_id('trail_exams', $_GET['id'], 'id');*/
$exam_id=$_GET['id'];
$exam_type=$_GET['exam_type'];
?>
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
                                                </ul>
                                                <div class="tab-content">
                                                    <div id="subject1" class="tab-pane active">
                                                        <div class="col-md-12 mb-3">
                                                            <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item" src="<?php echo base_url();?>uploads/<?=$exam_type;?>/questions/<?php echo $exam_id;?>.pdf"></iframe>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div id="subject2" class="tab-pane ">
                                                    	<?php 

                                                        $row_status =  (int)$this->crud_model->get_common_data_by_where('trail_exam_downloads',array('user_id'=>$this->session->userdata('login_id'),'exam_id'=>$exam_id))[0]['row_status'];
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