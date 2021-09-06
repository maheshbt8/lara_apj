<!DOCTYPE html>
<html class="fixed">
	
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<!-- Basic -->
		<meta charset="UTF-8">

		<meta name="keywords" content="Admin- CA Exam Series" />
		<meta name="description" content="Admin- CA Exam Series">
		<meta name="author" content="okler.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/animate/animate.css">

		<link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/font-awesome/css/all.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/theme.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/custom.css">

		<!-- Head Libs -->
		<script src="<?php echo base_url();?>assets/vendor/modernizr/modernizr.js"></script>		
        <script src="<?php echo base_url();?>assets/master/style-switcher/style.switcher.localstorage.js"></script>
<style type="text/css">
	.face a {
    padding-right: 10px;
}
.face {
    margin-top: 2%;
}
.face a img {
    width: 3%;
}
</style>
	</head>
<body>
		<!-- start: page -->
		<section class="body-sign  mt-5">
			<div class="row">
				<!--sign-in-start--->
				<div class="col-lg-6" >
					<div class="center-sign">
							<!-- <a href="" class="logo float-left">
								<img src="<?php echo base_url();?>assets/uploads/logo.png" height="80" alt="Admin- CA Exam Series" />
							</a> -->

							<div class="panel card-sign">
								<!-- <div class="card-title-sign mt-3 text-right">
									<h2 class="title text-uppercase font-weight-bold m-0"><i class="fas fa-user mr-1"></i> Admin</h2>
			       <?php if(!empty($_SESSION['error_msg'])){ ?>
					<div class="alert alert-danger"><?php echo $_SESSION['error_msg'];?></div>
					<?php }?>
								</div> -->
								
								<div class="card-body">
									
										<form action="<?=base_url();?>login" method="post">
											<div class="form-group mb-3 text-center">
												<a href="" class="logo">
								<img src="<?php echo base_url();?>assets/uploads/logo.png" height="80" alt="Admin- CA Exam Series" />
							</a>	
							<?php
											if($this->session->flashdata('error_msg')!=''){?>
												<div class="alert alert-danger" role="alert">
							  <?=$this->session->flashdata('error_msg');?>
							</div><?php 
											}
											?>
											</div>
										<div class="form-group mb-3">
											<label>Username</label>
											<div class="input-group">
												<input name="email" type="text" class="form-control form-control-lg" />
												<span class="input-group-append">
													<span class="input-group-text">
														<i class="fas fa-user"></i>
													</span>
												</span>
											</div>
										</div>

										<div class="form-group mb-4">
											<div class="clearfix">
												<label class="float-left">Password</label>
												<a href="" class="float-right">Lost Password?</a>
											</div>
											<div class="input-group">
												<input name="password" type="password" class="form-control form-control-lg" />
												<span class="input-group-append">
													<span class="input-group-text">
														<i class="fas fa-lock"></i>
													</span>
												</span>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-8">
												<div class="checkbox-custom checkbox-default">
													<input id="RememberMe" name="rememberme" type="checkbox"/>
													<label for="RememberMe">Remember Me</label>
												</div>
											</div>
											<div class="col-sm-4 text-right">
												<button type="submit" class="btn btn-primary mt-2">Sign In</button>
											</div>
										</div>

										

									</form>
								<br/>
								<a href="<?=base_url()?>"><b>Back to Home <i class="fa fa-home"></i></b></a>
								<a href="<?=base_url('register')?>" class="pull-right"><b>Creat New User <i class="fa fa-user"></i></b></a>
								</div>


							</div>

							<!-- <p class="text-center text-muted mt-3 mb-3">&copy; Copyright 2019. All Rights Reserved.</p> -->
						</div>
				</div>
				<!--sign-in-end-->
				<!--sign-up-start--->
						<div class="col-lg-6">
							<div class="center-sign">

								<div class="panel card-sign">
									<div class="card-body">

							    <!--  <div class=""> -->
					                        <div class="signup-form" style="margin-top: -4%;">
					                            <h3>Create your Account</h3>
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
		                            <form action="<?php echo base_url();?>register" method="post" >
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="text" name="first_name" class="form-control" placeholder="Enter your Name *" value="<?=set_value('first_name');?>" autocomplete="off" ><label class="error"><?php echo form_error('first_name'); ?></label>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" placeholder="Enter Valid Email ID *" value="<?=set_value('email');?>" autocomplete="off"><label class="error"><?php echo form_error('email'); ?></label>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="tel" name="mobile" class="form-control" placeholder="Enter Valid Mobile Number *" value="<?=set_value('mobile');?>" autocomplete="off"><label class="error"><?php echo form_error('mobile'); ?></label>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="number" name="icai_reg_no" class="form-control" placeholder="Enter Valid ICAI Regd no" value="<?=set_value('icai_reg_no');?>" autocomplete="off">
                                            <label class="error"><?php echo form_error('icai_reg_no'); ?></label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <select class="form-control" name="exam_type">
                                                <option value="">--Select your Exam type</option>
                                                <?php
                                                $courses=$this->crud_model->get_active_courses();
                                                foreach ($courses as $row) {
                                                ?>
                                                <option value="<?=$row['id'];?>" <?php if(set_value('exam_type')==$row['id']){echo 'selected';}?>><?=$row['course'];?></option>
                                            <?php }?>
                                            </select>
                                            <label class="error"><?php echo form_error('exam_type'); ?></label>
                                        </div>
                                    </div>
                                    

                                    <!-- <div class="col-lg-12">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="checkme">
                                            <label class="form-check-label" for="checkme">Keep me Login</label>
                                        </div>
                                    </div> -->

                                    <div class="col-lg-12">
                                        <button type="submit" name="register" class="btn btn-primary">Signup Now!</button>
                                        
                                        <span>Already a registered user? <a href="">Login!</a></span>
                                    </div>
                                </div>
                            </form>
                        </div>
                   <!--  </div> -->
                </div>
            </div>
        </div>
	</div>
	<!--sign-up-end-->
</div>



	<div class="row">
		<div class="col-md-12 text-center ">
			<div class="face">
				<!-- Sign up to:- -->
				 <span class="text-center text-muted mt-3 mb-3">&copy; Copyright 2019. All Rights Reserved.</span>
			<a href="#">
				<img src="http://localhost/ca/assets/front-end/img/facebook.png" alt="image">
			
				<a href=""><img src="http://localhost/ca/assets/front-end/img/google.png" alt="image">
				</a>
			</div>
		</div>
		</div>
	</section>

       <!-- Vendor -->
<script src="<?php echo base_url();?>assets/vendor/jquery/jquery.js"></script>		
<script src="<?php echo base_url();?>assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>		<script src="<?php echo base_url();?>assets/vendor/jquery-cookie/jquery.cookie.js"></script>
<script src="<?php echo base_url();?>assets/master/style-switcher/style.switcher.js"></script>				
<script src="<?php echo base_url();?>assets/vendor/popper/umd/popper.min.js"></script>
<script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.js"></script>		
<script src="<?php echo base_url();?>assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>		
<script src="<?php echo base_url();?>assets/vendor/common/common.js"></script>		
<script src="<?php echo base_url();?>assets/vendor/nanoscroller/nanoscroller.js"></script>		
<script src="<?php echo base_url();?>assets/vendor/magnific-popup/jquery.magnific-popup.js"></script>		
<script src="<?php echo base_url();?>assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		<!-- Theme Base, Components and Settings -->
<script src="<?php echo base_url();?>assets/js/theme.js"></script>
		
		<!-- Theme Custom -->
<script src="<?php echo base_url();?>assets/js/custom.js"></script>
		
		<!-- Theme Initialization Files -->
<script src="<?php echo base_url();?>assets/js/theme.init.js"></script>
		<!-- Analytics to Track Preview Website -->		
	</body>

</html>