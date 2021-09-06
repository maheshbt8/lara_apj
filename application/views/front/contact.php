<!--Contact us page start-->

     <!-- Start Contact Info Area -->
		<section class="contact-info-area ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="contact-info-box">
                            <div class="icon">
                                <i class="icofont-email"></i>
                            </div>
                            <h3>Mail Here</h3>
                            <p><a href="#"><?=$system_email;?></a></p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="contact-info-box">
                            <div class="icon">
                                <i class="icofont-google-map"></i>
                            </div>
                            <h3>Whatsapp</h3>
                            <p><?=$this->db->get_where('settings', array('setting_type' => 'whatsapp_number'))->row()->description;?></p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3">
                        <div class="contact-info-box">
                            <div class="icon">
                                <i class="icofont-phone"></i>
                            </div>
                            <h3>Call Here</h3>
                            <p><?=$system_mobile;?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Contact Info Area -->
        
        <!-- Start Contact Area -->
        <section class="contact-area ptb-100 pt--100">
            <div class="container">
                <div class="section-title text-center">
                    <h2>Get In Touch With Us</h2>
                    <div class="bar"></div>
                    <p>Anything On your Mind. We’ll Be Glad To Assist You!</p>
                </div>

                <div class="row h-100 justify-content-center align-items-center">
                    <div class="col-lg-6 col-md-12 mb-4">
                     <img src="<?=base_url();?>assets/front-end/img/marketing.png" alt="image">
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <?php
$this->load->view('front/questions_ask');
?>
                        <!-- <form method="post" action="<?=base_url('contact-us');?>" novalidate="novalidate" class="form-horizontal" id="form">
                            <div class="row">
                                <?php
                if($this->session->flashdata('feeling_error')!=''){?>
                    <div class="alert alert-danger" role="alert">
  <?=$this->session->flashdata('feeling_error');?>
</div><?php 
                }
                if($this->session->flashdata('feeling_success')!=''){?>
                    <div class="alert alert-success" role="alert">
  <?=$this->session->flashdata('feeling_success');?>
</div><?php 
                }
                ?>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" required title="Please enter your name" placeholder="Name" name="name">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <input type="email" class="form-control" required title="Please enter your email" placeholder="Email" name="email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Phone" name="phone">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" required title="Please enter subject"placeholder="Subject" name="subject">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <textarea name="message" class="form-control" id="message" cols="30" rows="5" required title="Write your message" placeholder="Your Message"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <button type="submit" class="btn btn-primary">Send Message</button>
                                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </form> -->
                    </div>
<!-- 
<div class="col-lg-6 col-md-12">
                        <form id="contactForm" method="post" action="">
                            <div class="row">
                                
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" required data-error="Please enter your name" placeholder="Name" name="name">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <input type="email" class="form-control" required data-error="Please enter your email" placeholder="Email" name="email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Phone" name="phone">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" required data-error="Please enter subject"placeholder="Subject" name="subject">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <textarea name="message" class="form-control" id="message" cols="30" rows="5" required data-error="Write your message" placeholder="Your Message"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <button type="submit" class="btn btn-primary">Send Message</button>
                                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </form>
                    </div> -->




                </div>
            </div>
        </section>
        <!-- End Contact Area -->
<!--Contact us page end