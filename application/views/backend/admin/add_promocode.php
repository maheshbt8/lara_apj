  <!--Add plan in plans menu-->
                    <div class="row">
                        <div class="col">
                                <section class="card">
                                    <div class="card-body">
                                        <form method="post" action="<?=base_url('add_promocode');?>"enctype="multipart/form-data" novalidate="novalidate" class="form-horizontal" id="form">
                                            
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
                                                <label class="col-sm-4 control-label text-sm-right pt-2">Promo Name: </label>
                                                <div class="col-sm-6">
                                                   <input type="text" name="name" class="form-control w100" Placeholder="Promo Name" required="" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 control-label text-sm-right pt-2">Promo Code: </label>
                                                <div class="col-sm-6">
                                                   <input type="text" name="code" class="form-control w100" Placeholder="Promo Code" required="" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 control-label text-sm-right pt-2">Discount: </label>
                                                <div class="col-sm-6">
                                                   <input type="text" name="discount" class="form-control w100" Placeholder="Discount" required="" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 control-label text-sm-right pt-2">Valid From: </label>
                                                <div class="col-sm-6">
                                                    <span class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    <i class="fas fa-calendar-alt"></i>
                                                                </span>
                                                            
                                                   <input type="text" data-plugin-datepicker=""  name="valid_from" class="form-control w100" Placeholder="Valid From" required="" autocomplete="off"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 control-label text-sm-right pt-2">Valid To: </label>
                                                <div class="col-sm-6">
                                                    <span class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    <i class="fas fa-calendar-alt"></i>
                                                                </span>
                                                            
                                                   <input type="text" data-plugin-datepicker="" name="valid_to" class="form-control w100" Placeholder="Valid To" required="" autocomplete="off"><br/></span>
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
    $(document).ready(function(){
        get_plan_options('<?=$course_id;?>');   
    });
</script>
