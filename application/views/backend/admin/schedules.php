<!--Trail Download-->
                    <div class="row">
                        <div class="col">
                                <section class="card">
                                    <div class="card-header">
                                       <form  method="post" action="<?=base_url('schedules');?>"enctype="multipart/form-data" novalidate="novalidate" id="form" class="form-inline">
                                            <div class="col-lg-11">
                                                <div class="row">
                                                    <div class="col-lg-4 form-group">
                                                        <select class="form-control w100" onchange="get_plan_options(this.value);" required="" name="course">
                                                        <option value="">---Select Type---</option>
            <?php 
            $course=$this->crud_model->get_active_courses();
foreach ($course as $row) {
                                                            ?>
                                <option value="<?=$row['id'];?>" <?php if($course_id == $row['id']){echo "selected";}?>><?=$row['course'];?></option>
                            <?php }?>
                                                    </select>
                                                    </div>
                                                    <div class="col-lg-4 form-group">
                                                      <select class="form-control w100" name="plan" id="plans_list" required="" name="plans">
                                        <option value="">---Select Plan---</option>
            
                                                    </select>
                                                    </div>
                                                    <div class="col-lg-4 form-group">
                                                        <!-- <input type="text" name="" class="form-control w100" Placeholder="Enter start time"> -->
                                                        <div class="custom-file">
                                                            <label class="custom-file-label" for="sapaper">Choose File</label>
                                                        <input type="file" class="form-control custom-file-input" id="sapaper" name="schedule" required="">
                                                        
                                                  </div>
                                                  <?php 
                                                            if($this->session->flashdata('schedule_error')!=''){echo '
                                                            <div class="error">'.$this->session->flashdata('schedule_error').'</div>';}?>
                                                    </div>
                                                   
                                                </div>
                                            </div>  
                                            <div class="col-lg-1">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                           
                                        </form>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered table-striped mb-0" id="trail-download">
                                            <thead>
                                                <tr>
                                                    <th>Sno.</th>
                                                    <th>Course</th>
                                                    <th>Plan</th>
                                                    <th>Notes</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                 <?php
                                        $e_brochers=$this->crud_model->get_schedules_info();
                                        $i=0;
                                        foreach ($e_brochers as $row) {
                                            $course=$this->crud_model->get_type_name_by_where('courses', 'id', $row['course_id'], 'course');
                                            $plan=$this->crud_model->get_type_name_by_where('plans', 'id', $row['plan_id'], 'plan');
                                                ?>
                                                <tr>
                                                    <td><?=$i+1;?></td>
                                                    <td><?=$course;?></td>
                                                    <td><?=$plan;?></td>
                                                    <td><?=$row['file_name'];?></td>
                                                    <td>
                                                        <a href="#" class=" mr-2  text-primary">
                                                            <i class="fas fa-pencil-alt"></i>
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