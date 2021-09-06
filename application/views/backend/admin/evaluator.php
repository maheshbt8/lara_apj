 <?php
if($edit_data != ''){
    $form_url='evaluator_list/'.base64_encode($edit_data['id']);
}else{
    $this->session->set_userdata('last_page',current_url());
    $form_url='evaluator_list';
}
?>
 <!--Trailupload-->
                    <div class="row">
                        <div class="col">
                                <section class="card">
                                    <div class="card-header">
                                        <form method="post" action="<?=base_url().$form_url;?>" enctype="multipart/form-data" novalidate="novalidate" class="form-horizontal" id="form">
                                            <!-- <div class="form-group row">
                                                <label class="col-sm-4 control-label text-sm-right pt-2">Course Type: </label>
                                                <div class="col-sm-5">
                                                    <select class="form-control w100" onchange="get_subject_options(this.value);" required="" name="course">
                                                        <option value="">---Select Type---</option>
            <?php 
            $course=$this->crud_model->get_active_courses();
foreach ($course as $row) {
                                                            ?>
                                <option value="<?=$row['id'];?>" <?php if($course_id == $row['id']){echo "selected";}?>><?=$row['course'];?></option>
                            <?php }?>
                                                    </select>
                                                </div>
                                                <?php echo form_error('course', '<div class="error">', '</div>'); ?>
                                            </div> -->
                                            <div class="form-group row">
                                                <label class="col-sm-4 control-label text-sm-right pt-2">Name: </label>
                                                <div class="col-sm-5">
                                                    <input type="text" name="name" class="form-control" required="" value="<?php if($edit_data != ''){echo $edit_data['first_name'];}else{echo set_value('name');}?>">
                                                    <?php echo form_error('name', '<div class="error">', '</div>'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 control-label text-sm-right pt-2">Email: </label>
                                                <div class="col-sm-5">
                                                    <input type="email" name="email" class="form-control" required="" value="<?php if($edit_data != ''){echo $edit_data['email'];}else{echo set_value('email');}?>">
                                                    <?php echo form_error('email', '<div class="error">', '</div>'); ?>
                                                </div>
                                                
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 control-label text-sm-right pt-2">Mobile: </label>
                                                <div class="col-sm-5">
                                                    <input type="number" name="mobile" class="form-control" required=""  value="<?php if($edit_data != ''){echo $edit_data['mobile'];}else{echo set_value('mobile');}?>">
                                                    <?php echo form_error('mobile', '<div class="error">', '</div>'); ?>
                                                </div>
                                                
                                            </div>
                                            <?php if($edit_data == ''){?>
                                            <div class="form-group row">
                                                <label class="col-sm-4 control-label text-sm-right pt-2">Password: </label>
                                                <div class="col-sm-5">
                                                    <input type="password" name="pass" class="form-control" required="" value="<?=set_value('pass');?>">
                                                    <?php echo form_error('pass', '<div class="error">', '</div>'); ?>
                                                </div>
                                                
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 control-label text-sm-right pt-2">Confirm Password: </label>
                                                <div class="col-sm-5">
                                                    <input type="password" name="cpass" class="form-control" required="" value="<?=set_value('cpass');?>">
                                                    <?php echo form_error('cpass', '<div class="error">', '</div>'); ?>
                                                </div>
                                                
                                            </div>
                                        <?php }?>
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
                                    <div class="card-body">
                                        <h4>View details</h4>
                                        <table class="table table-bordered table-striped mb-0" id="main-users">
                                            <thead>
                                                <tr>
                                                    <th>Sno</th>
                                                    <th>User ID</th>
                                                    <th>Name</th>
                                                    <th>Email ID</th>
                                                    <th >PhoneNo</th>
                                                    <th >Date</th>
                                                    <th >Actions</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i=1;
                                                foreach ($evaluator_data as $row) {
                                                ?>
                                                <tr>
                                                    <td><?=$i?></td>
                                                    <td><?=$row['unique_id'];?></td>
                                                    <td><?=$row['first_name'];?></td>
                                                    <td><?=$row['email'];?></td>
                                                    <td><?=$row['mobile'];?></td>
                                                    <td><?=$row['created_at'];?></td>
                                                    <td>
                                                        <a href="<?=base_url('evaluator/').base64_encode($row['id']);?>" class=" mr-2  text-primary">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                        <a href="#" class="mr-2  text-danger" onclick="return delete_row('<?=base_url('set_row_status/').'users/id/'.$row['id'].'/0';?>');">
                                                            <i class="far fa-trash-alt"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php $i++;}?>
                                            </tbody>
                                        </table>
                                    </div>
                                </section>
                            </div>
                        </div>