  <!--Add plan in plans menu-->
                    <div class="row">
                        <div class="col">
                                <section class="card">
                                    <div class="card-body">
                                        <form method="post" action="<?=base_url('plan_add/').$course_id;?>"enctype="multipart/form-data" novalidate="novalidate" class="form-horizontal" id="form">
                                            
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
                                                <label class="col-sm-4 control-label text-sm-right pt-2">Plan Type: </label>
                                                <div class="col-sm-6">
                                                    <select class="form-control w100" name="plan" id="plans_list" required="" name="plans">
                                        				<option value="">---Select Plan---</option>
            
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 control-label text-sm-right pt-2">Type: </label>
                                                <div class="col-sm-6">
                                                <div class="form-control">
                                                    <label><input type="radio" name="type" class="" placeholder="Plan name here" value="0" checked onclick="show_subjects(this.value);"> Individual</label>&nbsp;&nbsp;&nbsp;
                                                    <label><input type="radio" name="type" class="" placeholder="Plan name here" value="1" onclick="show_subjects(this.value);"> Group 1</label>&nbsp;&nbsp;&nbsp;
                                                    <label><input type="radio" name="type" class="" placeholder="Plan name here" value="2" onclick="show_subjects(this.value);"> Group 2</label>&nbsp;&nbsp;&nbsp;
                                                    <label><input type="radio" name="type" class="" placeholder="Plan name here" value="3" onclick="show_subjects(this.value);"> Both Groups</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row" id="subject_ids">
                                                    <label class="col-sm-4 control-label text-sm-right pt-2">Your Subject: </label>
                                                    <div class="col-sm-6">
                                                        <select class="form-control" id="subjects_list" name="subject_id" required >
                                                        </select>
                                                     </div>

                                                </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 control-label text-sm-right pt-2">Subject Name: </label>
                                                <div class="col-sm-6">
                                                    <input type="text" name="subject" class="form-control" placeholder="Plan name here" required="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 control-label text-sm-right pt-2" placeholder="">Actual Price: </label>
                                                <div class="col-sm-6">
                                                    <input type="text" name="actual_price" class="form-control" required="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 control-label text-sm-right pt-2" placeholder="">Discount Price: </label>
                                                <div class="col-sm-6">
                                                    <input type="text" name="discount_price" class="form-control" required="" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 control-label text-sm-right pt-2">Description Points:</label>
                                                <div class="col-sm-6">
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
<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script> -->
<script type="text/javascript">
    $(window).load(function(){ 
    	get_plan_options('<?=$course_id;?>');
    });
	
    function show_subjects(type_id){
				if(type_id == 0){
					$('#subject_ids').show()
					}else{
						$('#subject_ids').hide()
					}
   	}
</script>
