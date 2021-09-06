<form method="post" action="<?=base_url('contact-us');?>" novalidate="novalidate" class="form-horizontal" id="form">
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
                        </form>