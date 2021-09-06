
		<!-- Start Overview Area -->
		<section class="saas-tools ptb-100 bg-gray">
            <div class="container">
                <div class="section-title text-center">
                    <h2><?=$test['course'].' - '.$test['test'];?></h2>
                    <div class="bar"></div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="tab">
                            <div class="tab_content">
                               <div class="tabs_item">
                                    <div class="row  justify-content-center align-items-center">
                                        <div class="col-lg-12 col-md-12">
                                            <p><h3>Number of Questions:</h3> <b><?=$test['no_of_questions'];?></b></p>
                                            <h3>Description</h3>
                                            <p><?=$test['description'];?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr/>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="tab">
                            <div class="tab_content">
                               <div class="tabs_item">
                                    <div class="row  justify-content-center align-items-center">
                                    	<div class="col-lg-12 col-md-12">
                                            <?php if($this->session->flashdata('reg_success')!=''){?>
                            <div class="alert alert-success" role="alert">
  <?=$this->session->flashdata('reg_success');?>
</div>
<?php }
if($this->session->flashdata('reg_error')!=''){?>
                            <div class="alert alert-danger" role="alert">
  <?=$this->session->flashdata('reg_error');?>
</div>
<?php }?>
                        <form action="<?php echo base_url('take_test/').$test_type;?>" method="post"  novalidate="novalidate" class="form-horizontal" id="form">
                            <div class="row">
                            <div class="col-lg-3">
                                        <div class="form-group">
                                            <input type="text" name="first_name" class="form-control" placeholder="Enter your Name *" value="<?=set_value('first_name');?>" autocomplete="off" required="" <?php 
                                    if($this->session->userdata('otp')!=''){echo "readonly";}?>><label class="error"><?php echo form_error('first_name'); ?></label>
                                    <input type="hidden" name="test_start" value="<?=$this->session->userdata('test_start');?>">
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" placeholder="Enter Valid Email ID *" value="<?=set_value('email');?>" autocomplete="off" required="" <?php 
                                    if($this->session->userdata('otp')!=''){echo "readonly";}?>><label class="error"><?php echo form_error('email'); ?></label>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <input type="tel" name="mobile" class="form-control" placeholder="Enter Valid Mobile Number *" value="<?=set_value('mobile');?>" autocomplete="off" required="" <?php 
                                    if($this->session->userdata('otp')!=''){echo "readonly";}?>><label class="error"><?php echo form_error('mobile'); ?></label>
                                        </div>
                                    </div>
                                    <?php 
                                    if($this->session->userdata('otp')!=''){
                                    ?>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <input type="number" name="otp" class="form-control" placeholder="Enter your OTP *" value="<?=set_value('otp');?>" autocomplete="off" required=""  <?php 
                                    if($this->session->userdata('test_start')==1){echo "readonly";}?>><label class="error"><?php echo form_error('otp'); ?></label>
                                        </div>
                                    </div>
                                <?php }?>
                                </div>
                            <?php
                            if($this->session->userdata('test_start')==1){
                            $i=1;foreach ($test_data as $row) {
                            ?>
                                <div class="row card">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                        <p><h5><?=$i.' ). '. $row['question'];?></h5></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-check">
                                            <input type="radio" class="form-radio-input" id="choice1<?=$i;?>" name="answer<?=$i;?>" required="" value="<?=$row['choice1'];?>">
                                            <label class="form-radio-label" for="choice1<?=$i;?>"><?=$row['choice1'];?></label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="form-radio-input" id="choice2<?=$i;?>" name="answer<?=$i;?>" value="<?=$row['choice2'];?>">
                                            <label class="form-radio-label" for="choice2<?=$i;?>"><?=$row['choice2'];?></label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="form-radio-input" id="choice3<?=$i;?>" name="answer<?=$i;?>" value="<?=$row['choice3'];?>">
                                            <label class="form-radio-label" for="choice3<?=$i;?>"><?=$row['choice3'];?></label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="form-radio-input" id="choice4<?=$i;?>" name="answer<?=$i;?>" value="<?=$row['choice4'];?>">
                                            <label class="form-radio-label" for="choice4<?=$i;?>"><?=$row['choice4'];?></label>

                                        </div>
                                        <label class="error" for="answer<?=$i;?>"></label>
                                    </div>
                                </div>
                                <br/>
                            <?php $i++;}}?>
                                <div class="col-lg-12">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                            </form>
                                    	</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>