  <?php
  $promo=$this->crud_model->get_single_promocode_info(base64_decode($id));
  ?>
  <!--Add plan in plans menu-->
                    <div class="row">
                        <div class="col">
                                <section class="card">
                                    <div class="card-body">
                                        <form method="post" action="<?=base_url('edit_promocode/').$id;?>"enctype="multipart/form-data" novalidate="novalidate" class="form-horizontal" id="form">
                                            
                                            <div class="form-group row">
                                                <label class="col-sm-4 control-label text-sm-right pt-2">Course Type: </label>
                                                <div class="col-sm-6">
                                                    <select class="form-control w100" onchange="get_plan_options(this.value);" required="" name="course">
                                                        <option value="">---Select Type---</option>
            <?php 
            $course=$this->crud_model->get_active_courses();
foreach ($course as $row) {
                                                            ?>
                                <option value="<?=$row['id'];?>" <?php if($promo['course_id'] == $row['id']){echo "selected";}?>><?=$row['course'];?></option>
                            <?php }?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 control-label text-sm-right pt-2">Plan Type: </label>
                                                <div class="col-sm-6">
                                                    <select class="form-control w100" name="plan" id="plans_list" required="" name="plans">
                                        <option value="">---Select Plan---</option>
            <?php 
            $plans=$this->crud_model->get_plans_by_id($promo['course_id']);
foreach ($plans as $row) {
                                                            ?>
                                <option value="<?=$row['id'];?>" <?php if($promo['plan_id'] == $row['id']){echo "selected";}?>><?=$row['plan_type'];?></option>
                            <?php }?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 control-label text-sm-right pt-2">Promo Name: </label>
                                                <div class="col-sm-6">
                                                   <input type="text" name="name" class="form-control w100" Placeholder="Promo Name" required="" autocomplete="off" value="<?=$promo['name']?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 control-label text-sm-right pt-2">Promo Code: </label>
                                                <div class="col-sm-6">
                                                   <input type="text" name="code" class="form-control w100" Placeholder="Promo Code" required="" autocomplete="off" value="<?=$promo['code']?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 control-label text-sm-right pt-2">Discount: </label>
                                                <div class="col-sm-6">
                                                   <input type="text" name="discount" class="form-control w100" Placeholder="Discount" required="" autocomplete="off" value="<?=$promo['discount']?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 control-label text-sm-right pt-2">Valid From: </label>
                                                <div class="col-sm-6">
                                                    <span class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    <i class="fas fa-calendar-alt"></i>
                                                                </span>
                                                            
                                                   <input type="text" data-plugin-datepicker=""  name="valid_from" class="form-control w100" Placeholder="Valid From" required="" autocomplete="off"  value="<?=date('m/d/Y',strtotime($promo['valid_from']));?>"></span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 control-label text-sm-right pt-2">Valid To: </label>
                                                <div class="col-sm-6">
                                                    <span class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    <i class="fas fa-calendar-alt"></i>
                                                                </span>
                                                            
                                                   <input type="text" data-plugin-datepicker="" name="valid_to" class="form-control w100" Placeholder="Valid To" required="" autocomplete="off" value="<?=date('m/d/Y',strtotime($promo['valid_to']));?>"><br/></span>
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
