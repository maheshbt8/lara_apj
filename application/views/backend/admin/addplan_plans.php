 <!--Add plan in plans menu-->
                    <div class="row">
                        <div class="col">
                                <section class="card">
                                    <div class="card-body">
                                        <form method="post" action="<?=base_url('addplan_plans');?>" enctype="multipart/form-data" novalidate="novalidate" class="form-horizontal" id="form">
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
                                                <label class="col-sm-4 control-label text-sm-right pt-2">Course: </label>
                                                <div class="col-sm-8">
                                                   <select class="form-control w100" name="course" onchange ="get_plan_options(this.value);" required="">
                                                            <option value="">---Select Type---</option>
                                                            <?php
$course=$this->crud_model->get_active_courses();
foreach ($course as $row) {
                                                            ?>
                                <option value="<?=$row['id'];?>"><?=$row['course'];?></option>
                            <?php }?>
                                                        </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 control-label text-sm-right pt-2">Module: </label>
                        <div class="col-sm-8">
                        <select class="form-control w100" name="module" required="">
                                <option value="1">Chapter</option>
                                <option value="2">Section</option>
                                <option value="3">Unit</option>
                                                        </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 control-label text-sm-right pt-2">Plan Type: </label>
                                                <div class="col-sm-8">
                                                    <div class="form-control">
                                                    <label><input type="radio" name="plan_type" required="" value="scheduled"  >Scheduled</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <label>
                                                    <input type="radio" name="plan_type" required="" value="unscheduled" checked="">Unscheduled
                                                    </label>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 control-label text-sm-right pt-2">New Plan Name: </label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="plan_name" class="form-control" placeholder="Subject Name" required="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 control-label text-sm-right pt-2">Plan Code: </label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="plan_code" class="form-control" placeholder="Plan Code here" required="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 control-label text-sm-right pt-2" placeholder="">Header Box: </label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="header_box" class="form-control" required="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 control-label text-sm-right pt-2" placeholder="">Plan Down Description: </label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="down_box" class="form-control" required="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 control-label text-sm-right pt-2">Description Points:</label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="description[]" class="form-control mb-2" required="">
                                                    <input type="text" name="description[]" class="form-control mb-2">
                                                    <input type="text" name="description[]" class="form-control mb-2">
                                                    <input type="text" name="description[]" class="form-control mb-2">
                                                    <input type="text" name="description[]" class="form-control mb-2">
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