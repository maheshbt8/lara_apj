  <!--Add plan in plans menu-->
                    <div class="row">
                        <div class="col">
                                <section class="card">
                                    <div class="card-body">
                                        <form method="post" action="<?=base_url('add_subject');?>"enctype="multipart/form-data" novalidate="novalidate" class="form-horizontal" id="form">
                                            
                                            <div class="form-group row">
                                                <label class="col-sm-4 control-label text-sm-right pt-2">Course Type: </label>
                                                <div class="col-sm-6">
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
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 control-label text-sm-right pt-2">Type: </label>
                                                <div class="col-sm-6">
                                                <div class="form-control">
                                                    <label><input type="radio" name="type" class="" placeholder="Plan name here" value="0" checked> Individual</label>&nbsp;&nbsp;&nbsp;
                                                    <label><input type="radio" name="type" class="" placeholder="Plan name here" value="1"> Group 1</label>&nbsp;&nbsp;&nbsp;
                                                    <label><input type="radio" name="type" class="" placeholder="Plan name here" value="2"> Group 2</label>&nbsp;&nbsp;&nbsp;
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 control-label text-sm-right pt-2">Subject Name: </label>
                                                <div class="col-sm-6">
                                                    <input type="text" name="subject" class="form-control" placeholder="Plan name here" required="">
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
                                    
                                </section>
                            </div>
                        </div>

