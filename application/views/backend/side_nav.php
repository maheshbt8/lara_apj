 <aside id="sidebar-left" class="sidebar-left">
                
                    <div class="sidebar-header">
                        <div class="sidebar-title">
                            Navigation
                        </div>
                        <div class="sidebar-toggle d-none d-md-block" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
                            <i class="fas fa-bars" aria-label="Toggle sidebar"></i>
                        </div>
                    </div>
                
                    <div class="nano">
                        <div class="nano-content">
                            <nav id="menu" class="nav-main" role="navigation">
                            
                                <ul class="nav nav-main">
                                    
                                    <?php 
if($this->session->userdata('role_id')=='1'){
?>  
                                    <li class="<?php if($page_name=='dashboard'){echo 'nav-active';}?>">
                                        <a class="nav-link" href="<?=base_url('dashboard')?>">
                                            <i class="fas fa-home" aria-hidden="true"></i>
                                            <span>Dashboard</span>
                                        </a>                        
                                    </li>
                                    <li class="nav-parent <?php if($page_name=='mainuser' || $page_name=='faileduser' || $page_name=='addplans' || $page_name=='trailuser' || $page_name=='feelingformal' || $page_name=='feedback'){echo 'nav-expanded nav-active';}?>">
                                        <a class="nav-link" href="#">
                                            <i class="fas fa-columns" aria-hidden="true"></i>
                                            <span>Users</span>
                                        </a>
                                        <ul class="nav nav-children">
                                            <li class="<?php if($page_name=='mainuser'){echo 'nav-active';}?>">
                                                <a class="nav-link" href="<?=base_url('mainuser')?>">
                                                    Main User Details
                                                </a>
                                            </li>
                                            <li class="<?php if($page_name=='faileduser'){echo 'nav-active';}?>">
                                                <a class="nav-link" href="<?=base_url('faileduser')?>">
                                                    Failed Users(Failed)
                                                </a>
                                            </li>
                                            
                                            <li class="<?php if($page_name=='addplans'){echo 'nav-active';}?>">
                                                <a class="nav-link" href="<?=base_url('addplans')?>">
                                                    Add Plans/Subjects(Main USer)
                                                </a>
                                            </li>
                                            <li class="<?php if($page_name=='trailuser'){echo 'nav-active';}?>">
                                                <a class="nav-link" href="<?=base_url('trailuser')?>">
                                                    Trial User Details
                                                </a>
                                            </li>
                                            <li class="<?php if($page_name=='feelingformal'){echo 'nav-active';}?>">
                                                <a class="nav-link" href="<?=base_url('feelingformal')?>">
                                                   Feeling Formal
                                                </a>
                                            </li>
                                            
                                            <li class="<?php if($page_name=='feedback'){echo 'nav-active';}?>">
                                                <a class="nav-link" href="<?=base_url('feedback')?>">
                                                    Feed Back
                                                </a>
                                            </li>
                                    
                                        </ul>
                                    </li>
                                    <li class="nav-parent <?php if($page_name=='mainupload' || $page_name=='maindownload' || $page_name=='mainuploaddetails' || $page_name=='closedtabs' || $page_name=='notes' || $page_name=='videos_mainexam' || $page_name=='sugganswerrequest' || $page_name=='guidelines'){echo 'nav-expanded nav-active';}?>">
                                        <a class="nav-link" href="#">
                                            <i class="fas fa-copy" aria-hidden="true"></i>
                                            <span>Main Exam</span>
                                        </a>
                                        <ul class="nav nav-children">
                                            <li class="<?php if($page_name=='mainupload'){echo 'nav-active';}?>">
                                                <a class="nav-link" href="<?=base_url('mainupload')?>">
                                                    Main Upload
                                                </a>
                                            </li>
                                            <li class="<?php if($page_name=='maindownload'){echo 'nav-active';}?>">
                                                <a class="nav-link" href="<?=base_url('maindownload')?>">
                                                    Main Downlaod
                                                </a>
                                            </li>
                                            <li class="<?php if($page_name=='mainuploaddetails'){echo 'nav-active';}?>">
                                                <a class="nav-link" href="<?=base_url('mainuploaddetails')?>">
                                                    Main Upload Details
                                                </a>
                                            </li>
                                            <li class="<?php if($page_name=='closedtabs'){echo 'nav-active';}?>">
                                                <a class="nav-link" href="<?=base_url('closedtabs')?>">
                                                    Closed Tabs
                                                </a>
                                            </li>
                                            <li class="<?php if($page_name=='notes'){echo 'nav-active';}?>">
                                                <a class="nav-link" href="<?=base_url('notes')?>">
                                                    Notes
                                                </a>
                                            </li>
                                            <li class="<?php if($page_name=='videos_mainexam'){echo 'nav-active';}?>">
                                                <a class="nav-link" href="<?=base_url('videos_mainexam')?>">
                                                    Videos
                                                </a>
                                            </li>
                                            <li class="<?php if($page_name=='sugganswerrequest'){echo 'nav-active';}?>">
                                                <a class="nav-link" href="<?=base_url('sugganswerrequest')?>">
                                                    Sugg.Answer Requests
                                                </a>
                                            </li>
                                            <li class="<?php if($page_name=='guidelines'){echo 'nav-active';}?>">
                                                <a class="nav-link" href="<?=base_url('guidelines')?>">
                                                    GuideLines
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-parent  <?php if($page_name=='trailupload' || $page_name=='traildownload' || $page_name=='traildashboard'){echo 'nav-expanded nav-active';}?>">
                                        <a class="nav-link" href="#">
                                            <i class="fas fa-tasks" aria-hidden="true"></i>
                                            <span>Trial Exam</span>
                                        </a>
                                        <ul class="nav nav-children">
                                            <li class="<?php if($page_name=='trailupload'){echo 'nav-active';}?>">
                                                <a class="nav-link" href="<?=base_url('trailupload')?>">
                                                    Trial Upload
                                                </a>
                                            </li>
                                            <li class="<?php if($page_name=='traildownload'){echo 'nav-active';}?>">
                                                <a class="nav-link" href="<?=base_url('traildownload')?>">
                                                    Trial Download
                                                </a>
                                            </li>
                                            <li class="<?php if($page_name=='traildashboard'){echo 'nav-active';}?>">
                                                <a class="nav-link" href="<?=base_url('traildashboard')?>">
                                                    Trial DashBoard
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    
                                    <li class="<?php if($page_name=='results'){echo 'nav-active';}?>">
                                        <a class="nav-link" href="<?=base_url('results')?>">
                                            <i class="fas fa-external-link-alt" aria-hidden="true"></i>
                                            <span>Results</span>
                                        </a>                        
                                    </li>
                                    <li class="<?php if($page_name=='requestcallback'){echo 'nav-active';}?>">
                                        <a class="nav-link" href="<?=base_url('requestcallback')?>">
                                            <i class="fas fa-external-link-alt" aria-hidden="true"></i>
                                            <span>Request Call Back</span>
                                        </a>                        
                                    </li>
                                    <li class="nav-parent  <?php if($page_name=='promocodes' || $page_name=='managepromo'){echo 'nav-expanded nav-active';}?>">
                                        <a class="nav-link" href="#">
                                            <i class="fas fa-list-alt" aria-hidden="true"></i>
                                            <span>PromoCodes</span>
                                        </a>
                                        <ul class="nav nav-children">
                                            <li class="<?php if($page_name=='promocodes'){echo 'nav-active';}?>">
                                                <a class="nav-link" href="<?=base_url('promocodes')?>">
                                                    Promocodes
                                                </a>
                                            </li>
                                           
                                            <li class="<?php if($page_name=='managepromo'){echo 'nav-active';}?>">
                                                <a class="nav-link" href="<?=base_url('managepromo')?>">
                                                    Manage PromoCodes
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <!-- <li class="nav-parent">
                                        <a class="nav-link" href="#">
                                            <i class="fas fa-list-alt" aria-hidden="true"></i>
                                            <span>SMS</span>
                                        </a>
                                        <ul class="nav nav-children">
                                            <li>
                                                <a class="nav-link" href="<?=base_url('sms')?>">
                                                    Send SMS
                                                </a>
                                            </li>
                                            <li>
                                                <a class="nav-link" href="<?=base_url('sended_sms')?>">
                                                    Sended SMS
                                                </a>
                                            </li>
                                        </ul>
                                    </li> -->
                                    <li class="<?php if($page_name=='sms' || $page_name=='sended_sms'){echo 'nav-active';}?>">
                                        <a class="nav-link" href="<?=base_url('sms')?>">
                                            <i class="fas fa-external-link-alt" aria-hidden="true"></i>
                                            <span>SMS</span>
                                        </a>                        
                                    </li>
                                    <li class="<?php if($page_name=='support'){echo 'nav-active';}?>">
                                        <a class="nav-link" href="<?=base_url('support')?>">
                                            <i class="fas fa-external-link-alt" aria-hidden="true"></i>
                                            <span>Support</span>
                                        </a>                        
                                    </li>
                                    <li class="nav-parent  <?php if($page_name=='addplanbox' || $page_name=='cptplan'){echo 'nav-expanded nav-active';}?>">
                                        <a class="nav-link" href="#">
                                            <i class="fas fa-list-alt" aria-hidden="true"></i>
                                            <span>Plans</span>
                                        </a>
                                        <ul class="nav nav-children">
                                            <li class="<?php if($page_name=='addplanbox'){echo 'nav-active';}?>">
                                                <a class="nav-link" href="<?=base_url('addplanbox')?>">
                                                    Add Plan Box
                                                </a>
                                            </li>
                                            <!-- <li class="<?php if($page_name=='cptplan' && $plan_id==1){echo 'nav-active';}?>">
                                                <a class="nav-link" href="<?=base_url('cptplan')?>">
                                                    CPT
                                                </a>
                                            </li>
                                            <li class="<?php if($page_name=='cptplan' && $plan_id==2){echo 'nav-active';}?>">
                                                <a class="nav-link" href="<?=base_url('ipccplan')?>">
                                                    IPCC
                                                </a>
                                            </li>
                                            <li class="<?php if($page_name=='cptplan' && $plan_id==3){echo 'nav-active';}?>">
                                                <a class="nav-link" href="<?=base_url('finalplans')?>">
                                                    Final
                                                </a>
                                            </li>
                                            <li class="<?php if($page_name=='cptplan' && $plan_id==4){echo 'nav-active';}?>">
                                                <a class="nav-link" href="<?=base_url('cptnewplan')?>">
                                                    CPT(New)
                                                </a>
                                            </li>
                                            <li class="<?php if($page_name=='cptplan' && $plan_id==5){echo 'nav-active';}?>">
                                                <a class="nav-link" href="<?=base_url('ipccnewplan')?>">
                                                    IPCC(New)
                                                </a>
                                            </li>
                                            <li class="<?php if($page_name=='cptplan' && $plan_id==6){echo 'nav-active';}?>">
                                                <a class="nav-link" href="<?=base_url('finalnewplan')?>">
                                                    Final(New)
                                                </a>
                                            </li> -->
                                            
                                        </ul>
                                    </li>
                                    
                                    
                                    <li class="<?php if($page_name=='subjects' || $page_name=='add_subject'){echo 'nav-active';}?>">
                                        <a class="nav-link" href="<?=base_url('subjects')?>">
                                            <i class="fas fa-external-link-alt" aria-hidden="true"></i>
                                            <span>Subjects</span>
                                        </a>                        
                                    </li>
                                    <li class="<?php if($page_name=='evaluator'){echo 'nav-active';}?>">
                                        <a class="nav-link" href="<?=base_url('evaluator_list')?>">
                                            <i class="fas fa-external-link-alt" aria-hidden="true"></i>
                                            <span>Evaluator</span>
                                        </a>                        
                                    </li>
                                    <li class="nav-parent">
                                        <a class="nav-link" href="#">
                                            <i class="fas fa-table" aria-hidden="true"></i>
                                            <span>Shop</span>
                                        </a>
                                        <ul class="nav nav-children">
                                            <li>
                                                <a class="nav-link" href="<?=base_url('addshopitem')?>">
                                                    Add Items
                                                </a>
                                            </li>
                                            <li>
                                                <a class="nav-link" href="<?=base_url('viewbookings')?>">
                                                    View Bookings
                                                </a>
                                            </li>
                                            
                                        </ul>
                                    </li>
                                    <!-- <li class="nav-parent">
                                        <a class="nav-link" href="#">
                                            <i class="fas fa-table" aria-hidden="true"></i>
                                            <span>Articles</span>
                                        </a>
                                        <ul class="nav nav-children">
                                            <li>
                                                <a class="nav-link" href="<?=base_url('')?>">
                                                    Create Article
                                                </a>
                                            </li>
                                            <li>
                                                <a class="nav-link" href="<?=base_url('')?>">
                                                    Manage Articles
                                                </a>
                                            </li>
                                            
                                        </ul>
                                    </li> -->
                                    <li class="<?php if($page_name=='videos'){echo 'nav-active';}?>">
                                        <a class="nav-link" href="<?=base_url('videos')?>">
                                            <i class="fas fa-external-link-alt" aria-hidden="true"></i>
                                            <span>Videos</span>
                                        </a>                        
                                    </li>
                                    <!-- <li class="nav-parent">
                                        <a class="nav-link" href="#">
                                            <i class="fas fa-table" aria-hidden="true"></i>
                                            <span>Notifications</span>
                                        </a>
                                        <ul class="nav nav-children">
                                            <li>
                                                <a class="nav-link" href="<?=base_url('')?>">
                                                    Create Notification
                                                </a>
                                            </li>
                                            <li>
                                                <a class="nav-link" href="<?=base_url('')?>">
                                                    Manage Notification
                                                </a>
                                            </li>
                                            
                                        </ul>
                                    </li> -->
                                    <li>
                                        <a class="nav-link" href="<?=base_url('e_brochers')?>">
                                            <i class="fas fa-external-link-alt" aria-hidden="true"></i>
                                            <span>E-Brouchers</span>
                                        </a>                        
                                    </li>
                                    <li>
                                        <a class="nav-link" href="<?=base_url('schedules')?>">
                                            <i class="fas fa-external-link-alt" aria-hidden="true"></i>
                                            <span>Schedules</span>
                                        </a>                        
                                    </li>
                                    <!-- <li class="nav-parent">
                                        <a class="nav-link" href="<?=base_url('')?>">
                                            <i class="fas fa-table" aria-hidden="true"></i>
                                            <span>Ammendments</span>
                                        </a>
                                    </li> -->
                                    <li class="nav-parent  <?php if($page_name=='mcq' || $page_name=='add_mcq' || $page_name=='mcq_view'){echo 'nav-expanded nav-active';}?>">
                                        <a class="nav-link" href="#">
                                            <i class="fas fa-table" aria-hidden="true"></i>
                                            <span>MCQ</span>
                                        </a>
                                        <ul class="nav nav-children">
                                            <li class="<?php if($page_name=='mcq' || $page_name=='add_mcq' || $page_name=='mcq_view'){echo 'nav-active';}?>">
                                                <a class="nav-link" href="<?=base_url('mcq_list')?>">
                                                    MCQ
                                                </a>
                                            </li>
                                            <li class="<?php if($page_name=='mcq_results'){echo 'nav-active';}?>">
                                                <a class="nav-link" href="<?=base_url('mcq_test_users')?>">
                                                 MCQ Results
                                                </a>
                                            </li>
                                            
                                        </ul>
                                    </li>
                                    <li class="nav-parent <?php if($page_name=='settings' || $page_name=='faqs' || $page_name=='courses' || $page_name=='blog' || $page_name=='flash_image' || $page_title=='Terms & Conditions' || $page_title=='Privacy Policy'){echo 'nav-expanded nav-active';}?>">
                                        <a class="nav-link" href="#">
                                            <i class="fas fa-table" aria-hidden="true"></i>
                                            <span>Settings</span>
                                        </a>
                                        <ul class="nav nav-children">
                                            <li class="<?php if($page_name=='settings'){echo 'nav-active';}?>">
                                                <a class="nav-link" href="<?=base_url('settings')?>">
                                                    System Settings
                                                </a>
                                            </li>
                                            <li class="<?php if($page_name=='courses'){echo 'nav-active';}?>">
                                                <a class="nav-link" href="<?=base_url('courses')?>">
                                                    Groups
                                                </a>
                                            </li>
                                            <li class="<?php if($page_name=='faqs'){echo 'nav-active';}?>">
                                                <a class="nav-link" href="<?=base_url('faqs')?>">
                                                    FAQ's
                                                </a>
                                            </li>
                                            <li class="<?php if($page_name=='blog'){echo 'nav-active';}?>">
                                                <a class="nav-link" href="<?=base_url('blog')?>">
                                                    Blog
                                                </a>
                                            </li>
                                             <li class="<?php if($page_name=='flash_image'){echo 'nav-active';}?>">
                                                <a class="nav-link" href="<?=base_url('flash_image')?>">
                                                    Flash Image
                                                </a>
                                            </li>
                                            <li class="<?php if($page_title=='Terms & Conditions'){echo 'nav-active';}?>">
                                                <a class="nav-link" href="<?=base_url('terms')?>">
                                                    Terms & Conditions
                                                </a>
                                            </li>
                                            <li class="<?php if($page_title=='Privacy Policy'){echo 'nav-active';}?>">
                                                <a class="nav-link" href="<?=base_url('privacy')?>">
                                                    Privacy Policy
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                <?php }?>
                                <?php
                                if($this->session->userdata('role_id')==2){
                                ?>
                                <li class="<?php if($page_name=='dashboard'){echo 'nav-active';}?>">
                                        <a class="nav-link" href="<?=base_url('u_dashboard')?>">
                                            <i class="fas fa-home" aria-hidden="true"></i>
                                            <span>Dashboard</span>
                                        </a>                        
                                    </li>
                                 <?php 
                                    if($login_user_details['row_status']==1){?>
                                	<li class="nav-parent  <?php if($page_name=='mainexams' || $page_name=='maindownload'){echo 'nav-expanded nav-active';}?>">
                                            <a class="nav-link" href="#">
                                                <i class="fas fa-tasks" aria-hidden="true"></i>
                                                <span>Main Exams</span>
                                            </a>
                                            <ul class="nav nav-children">
                                                <!-- <li class="<?php if($page_name=='mainexams'){echo 'nav-active';}?>">
                                                    <a class="nav-link" href="<?=base_url('u_mainexams')?>">
                                                        Main Exams
                                                    </a>
                                                </li> -->
                                                <li class="<?php if($page_name=='maindownload'){echo 'nav-active';}?>">
                                                    <a class="nav-link" href="<?=base_url('u_maindownload')?>">
                                                        Main Download
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                <?php }
                                if($login_user_details['row_status']==1 || $login_user_details['row_status']==3){?>
                                    <li class="nav-parent  <?php if($page_name=='trailexams' || $page_name=='traildownload'){echo 'nav-expanded nav-active';}?>">
                                        <a class="nav-link" href="#">
                                            <i class="fas fa-tasks" aria-hidden="true"></i>
                                            <span>Trial Exams</span>
                                        </a>
                                        <ul class="nav nav-children">
                                            <li class="<?php if($page_name=='trailexams'){echo 'nav-active';}?>">
                                                <a class="nav-link" href="<?=base_url('u_trailexams')?>">
                                                    Trial Exams
                                                </a>
                                            </li>
                                            <li class="<?php if($page_name=='traildownload'){echo 'nav-active';}?>">
                                                <a class="nav-link" href="<?=base_url('u_traildownload')?>">
                                                    Trial Download
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    
                                <?php }?>
<!--                                 <li> 
                                        <a class="nav-link" href="<?php //base_url('u_myresults')?>">
                                             <i class="fas fa-external-link-alt" aria-hidden="true"></i> -->
<!--                                             <span>My Results</span> -->
<!--                                         </a>                         -->
<!--                                     </li> -->
                                    
                                    <li>
                                        <a class="nav-link" href="<?=base_url('u_performancereport')?>">
                                            <i class="fas fa-external-link-alt" aria-hidden="true"></i>
                                            <span>Performance Report</span>
                                        </a>                        
                                    </li>
                                <?php 
                                    if($login_user_details['row_status']==1){?>
                                    <li>
                                        <a class="nav-link" href="<?=base_url('u_uhistory')?>">
                                            <i class="fas fa-external-link-alt" aria-hidden="true"></i>
                                            <span>Upload History</span>
                                        </a>                        
                                    </li>
                                <?php }?>
                                    
                                    <?php 
                                    if($login_user_details['row_status']==1){?>
                                    <li class="<?php if($page_name=='feedback'){echo 'nav-active';}?>">
                                        <a class="nav-link" href="<?=base_url('u_feedback')?>">
                                            <i class="fas fa-external-link-alt" aria-hidden="true"></i>
                                            <span>Feedback</span>
                                        </a>                        
                                    </li>
                                    <!-- <li class="<?php if($page_name=='sms'){echo 'nav-active';}?>">
                                        <a class="nav-link" href="<?=base_url('received_sms')?>">
                                            <i class="fas fa-external-link-alt" aria-hidden="true"></i>
                                            <span>SMS</span>
                                        </a>                        
                                    </li> -->

                                    <li>
                                        <a class="nav-link" href="<?=base_url('u_notifications')?>">
                                            <i class="fas fa-external-link-alt" aria-hidden="true"></i>
                                            <span>Notifications</span>
                                        </a>                        
                                    </li>
                                    <li>
                                        <a class="nav-link" href="<?=base_url('u_support')?>">
                                            <i class="fas fa-external-link-alt" aria-hidden="true"></i>
                                            <span>Support</span>
                                        </a>                        
                                    </li>
                                    <li>
                                        <a class="nav-link" href="<?=base_url('u_notes')?>">
                                            <i class="fas fa-external-link-alt" aria-hidden="true"></i>
                                            <span>Notes</span>
                                        </a>                        
                                    </li>
                                    
                                    <li class="<?php if($page_name=='u_videos'){echo 'nav-active';}?>">
                                        <a class="nav-link" href="<?=base_url('u_videos')?>">
                                            <i class="fas fa-external-link-alt" aria-hidden="true"></i>
                                            <span>Videos</span>
                                        </a>                        
                                    </li>
                                <?php }?>
                                
                                    <li>
                                        <a class="nav-link" href="<?=base_url('u_guidelines')?>">
                                            <i class="fas fa-external-link-alt" aria-hidden="true"></i>
                                            <span>Guidelines</span>
                                        </a>                        
                                    </li>
                                    <?php }?>
                                    <?php
                                if($this->session->userdata('role_id')==3){
                                ?>
                                <li class="<?php if($page_name=='dashboard'){echo 'nav-active';}?>">
                                        <a class="nav-link" href="<?=base_url('e_dashboard')?>">
                                            <i class="fas fa-home" aria-hidden="true"></i>
                                            <span>Dashboard</span>
                                        </a>                        
                                    </li>
                                    <li class="<?php if($page_name=='mainexams'){echo 'nav-active';}?>">
                                        <a class="nav-link" href="<?=base_url('e_mainexams')?>">
                                            <i class="fas fa-external-link-alt" aria-hidden="true"></i>
                                            <span>Main Exams Assigned</span>
                                        </a>                        
                                    </li>
                                    <li class="<?php if($page_name=='trailexams'){echo 'nav-active';}?>">
                                        <a class="nav-link" href="<?=base_url('e_trailexams')?>">
                                            <i class="fas fa-external-link-alt" aria-hidden="true"></i>
                                            <span>Trail Exams Assigned</span>
                                        </a>                        
                                    </li>
                            <?php }?>
                                
                                </ul>
                            </nav>
                
                           <!-- <hr class="separator" />-->
                
                            
                
                
                            
                        </div>
                
                        <script>
                            // Maintain Scroll Position
                            if (typeof localStorage !== 'undefined') {
                                if (localStorage.getItem('sidebar-left-position') !== null) {
                                    var initialPosition = localStorage.getItem('sidebar-left-position'),
                                        sidebarLeft = document.querySelector('#sidebar-left .nano-content');
                                    
                                    sidebarLeft.scrollTop = initialPosition;
                                }
                            }
                        </script>
                        
                
                    </div>
                
                </aside>