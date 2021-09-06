	<!-- Start Sidebar Modal -->
		<div class="sidebar-modal">  
			<div class="modal right fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="icofont-close"></i></span></button>

							<h2 class="modal-title" id="myModalLabel2"><a href="index.html"><img src="<?php echo base_url()?>front-end/img/logo.png" alt="logo"></a></h2>
						</div>

						<div class="modal-body">
							<div class="sidebar-modal-widget">
								<h3 class="title">Additional Links</h3>

								<ul>
									<li><a href="#">Login</a></li>
									<li><a href="#">Register</a></li>
									<li><a href="#">FAQ</a></li>
									<li><a href="#">Logout</a></li>
								</ul>
							</div>
							
							<div class="sidebar-modal-widget">
								<h3 class="title">Contact Info</h3>

								<ul class="contact-info">
									<li>
										<i class="icofont-google-map"></i>
										Address
										<span>1660 Travis Street Miramar, FL 33025, California</span>
									</li>
									<li>
										<i class="icofont-email"></i>
										Email
										<span>admin@crake.com</span>
									</li>
									<li>
										<i class="icofont-phone"></i>
										Phone
										<span>+123 456 7890</span>
									</li>
								</ul>
							</div>

							<div class="sidebar-modal-widget">
								<h3 class="title">Connect With Us</h3>

								<ul class="social-list">
									<li><a href="#"><i class="icofont-facebook"></i></a></li>
									<li><a href="#"><i class="icofont-twitter"></i></a></li>
									<li><a href="#"><i class="icofont-instagram"></i></a></li>
									<li><a href="#"><i class="icofont-linkedin"></i></a></li>
								</ul>
							</div>
						</div>
					</div><!-- modal-content -->
				</div><!-- modal-dialog -->
			</div><!-- modal -->
		</div>
		<!-- End Sidebar Modal -->

		<!-- Start Search Box -->
		<div id="header-search" class="header-search">
			<button type="button" class="close">×</button>
			<form class="header-search-form">
				<input type="search" value="" placeholder="Type here........" />
				<button type="submit" class="btn btn-primary">Search</button>
			</form>
		</div>
		<!-- End Search Box -->

        <!-- Start Page Title Area -->
        <section class="page-title-banner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Signup</h2>
                    </div>
                </div>
            </div>

            <div class="shape1"><img src="<?php echo base_url()?>front-end/img/shape1.png" alt="img"></div>
			<div class="shape2"><img src="<?php echo base_url()?>front-end/img/shape2.png" alt="img"></div>
			<div class="shape3"><img src="<?php echo base_url()?>front-end/img/shape3.png" alt="img"></div>
			<div class="shape6"><img src="<?php echo base_url()?>front-end/img/shape6.png" alt="img"></div>
			<div class="shape8 rotateme"><img src="<?php echo base_url()?>front-end/img/shape8.svg" alt="shape"></div>
            <div class="shape9"><img src="<?php echo base_url()?>front-end/img/shape9.svg" alt="shape"></div>

        </section>
		<!-- End Page Title Area -->
        
        <!-- Start Signup Area -->
		<section class="signup-area ptb-100">
            <div class="container">
                <div class="row h-100 justify-content-center align-items-center">
                    <div class="col-lg-6 col-md-12">
                        <div class="signup-image">
                            <img src="<?php echo base_url()?>front-end/img/marketing.png" alt="image">
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="signup-form">
                            <h3>Create your Account</h3>
                            <form action="<?php echo base_url();?>register" method="post" >
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="text" name="first_name" class="form-control" placeholder="Enter your Name"><label class="error" id="demo" ><?php echo form_error('first_name'); ?></label>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" placeholder="Enter Valid Email ID"><label class="error" id="demo" ><?php echo form_error('email'); ?></label>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="tel" name="mobile" class="form-control" placeholder="Enter Valid Mobile no."><label class="error" id="demo" ><?php echo form_error('mobile'); ?></label>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="number" name="icai_reg_no" class="form-control" placeholder="Enter Valid ICAI Regd no">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <select class="form-control" name="exam_type">
                                                <option>--Select your Exam type</option>
                                                <option value="CPT">CPT</option>
                                                <option value="IPCC">IPCC</option>
                                                <option value="FINAL">FINAL</option>
                                            
                                            
                                            </select>
                                        </div>
                                    </div>
                                    

                                    <div class="col-lg-12">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="checkme">
                                            <label class="form-check-label" for="checkme">Keep me Login</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <button type="submit" name="register" class="btn btn-primary">Signup Now!</button>
                                        <br>
                                        <span>Already a registered user? <a href="">Login!</a></span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		<!-- End Signup Area -->