 <!-- PAGE DETAILS AREA START (about-details) -->
    <div class="ltn__login-area pb-110">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area text-center">
                        <h1 class="section-title" align="center">Please register your account here</h1>
                       
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-3">
                    <div class="account-login-inner">
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
                        <form action="<?php echo base_url('register');?>" method="post" class="ltn__form-box contact-form-box">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="first_name" placeholder="First Name" required="" value="<?php echo set_value('first_name');?>">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="last_name" placeholder="Last Name" required="" value="<?php echo set_value('last_name');?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Gender</label>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="radio" name="gender" value="male" required="" <?php echo (set_value('gender') == 'male')? 'checked' : 'checked';?>> Male
                                    <input type="radio" name="gender" value="female" required="" <?php echo (set_value('gender') == 'female')? 'checked' : '';?>> Female
                                    <input type="radio" name="gender" value="others" required="" <?php echo (set_value('gender') == 'others')? 'checked' : '';?>> Others
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Date of birth</label>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="date" name="dob" placeholder="Date of birth" class="form-control" required="" value="<?php echo set_value('dob');?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-10">
                                    <input type="text" name="email" placeholder="Email*" required="" value="<?php echo set_value('email');?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Academic/Company/Business</label>
                                </div>
                                <div class="col-md-6">
                                    <select name="org_type" class="form-control" required="">
                                        <option value="school" <?php echo (set_value('org_type') == 'school')? 'selected' : 'selected';?>>School</option>
                                        <option value="intermediate" <?php echo (set_value('org_type') == 'intermediate')? 'selected' : '';?>>Intermediate</option>
                                        <option value="university" <?php echo (set_value('org_type') == 'university')? 'selected' : '';?>>University</option>
                                        <option value="company" <?php echo (set_value('org_type') == 'company')? 'selected' : '';?>>Company</option>
                                        <option value="others" <?php echo (set_value('org_type') == 'others')? 'selected' : '';?>>Others</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Name of your School/College/Company</label>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" name="org" placeholder="School/College/Company" required="" value="<?php echo set_value('org');?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Name of the City/Town</label>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" name="city" placeholder="Name of the City/Town" required="" value="<?php echo set_value('city');?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Postal code/Pin code</label>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" name="postal" placeholder="Postal code/Pin code" required="" value="<?php echo set_value('postal');?>">
                                </div>
                            </div>
                            
                            <label class="checkbox-inline">
                                <input type="checkbox" value="" required="">
                                I consent to Herboil processing my personal data in order to send personalized marketing material in accordance with the consent form and the privacy policy.
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" value="" required="">
                                By clicking "create account", I consent to the privacy policy.
                            </label>
                            <div class="btn-wrapper">
                                <button class="theme-btn-1 btn reverse-color btn-block" type="submit">CREATE ACCOUNT</button>
                            </div>
                        </form>
                        <div class="by-agree text-center">
                            <p>By creating an account, you agree to our:</p>
                            <p><a href="#">TERMS OF CONDITIONS  &nbsp; &nbsp; | &nbsp; &nbsp;  PRIVACY POLICY</a></p>
                            <div class="go-to-btn mt-50">
                                <a href="login.html">ALREADY HAVE AN ACCOUNT ?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- PAGE DETAILS AREA END -->