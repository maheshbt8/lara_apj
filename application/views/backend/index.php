<?php
$login_image_url=$this->crud_model->get_image_url($this->session->userdata('login_id'));
$login_user_details=$this->crud_model->get_user_details($this->session->userdata('login_id'));
$login_role_details=$this->crud_model->get_role_details($this->session->userdata('role_id'));
$system_name    = $this->db->get_where('settings', array('setting_type' => 'system_name'))->row()->description;
$system_title   = $this->db->get_where('settings', array('setting_type' => 'system_title'))->row()->description;

?>
<?php $folder = $this->router->fetch_class();
//echo $folder;die;
?>
<!doctype html>
<html class="fixed sidebar-left-sm" data-style-switcher-options="{'sidebarSize': 'sm'}">
<head>

        <!-- Basic -->
        <meta charset="UTF-8">

        <title><?=ucwords($page_title);?>-<?=$system_name;?></title>
        <meta name="keywords" content="HTML5 Admin Template" />
        <meta name="description" content="CA Exam series">
        <meta name="author" content="">

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <!-- Web Fonts  -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

          <?php 
          include_once('topcss.php');
          ?>
           <style>
                    input[type=date]::-webkit-inner-spin-button, 
                    input[type=date]::-webkit-outer-spin-button
                    { 
                        -webkit-appearance: none; 
                        margin: 0; 
                      }
                    input[type=time]::-webkit-inner-spin-button, 
                    input[type=time]::-webkit-outer-spin-button 
                    { 
                        -webkit-appearance: none; 
                        margin: 0; 
                    }
     </style>   
    </head>
    <body>
        <section class="body">
<button id="position-3-success" class="mt-3 mb-3 ws-normal btn btn-success" hidden="">Bottom Right. Moves up, then left. Pushes to stack bottom.</button>
            <!-- start: header -->
            <?php include_once('header.php');?>
            <!-- end: header -->

            <div class="inner-wrapper">
                <!-- start: sidebar -->
               <?php include_once('side_nav.php');?>
                <!-- end: sidebar -->

                <section role="main" class="content-body">
                    <header class="page-header">
                        <h2><?=ucwords($page_title);?></h2>
                    
                        <div class="right-wrapper text-right mr-3">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="<?=base_url();?>" target="_blank">
                                        <i class="fas fa-home"></i>
                                    </a>
                                </li>
                                <!--<li><span>Layouts</span></li>
                                <li><span>Sidebar Size SM</span></li>-->
                            </ol>
                    
                            
                        </div>
                    </header>

                    <!-- start: page -->
                    <?php if($this->session->flashdata('error_message')!=''){
                                        echo '<div class="alert alert-danger alert_message">'.$this->session->flashdata('error_message').'</div>';
                                    }elseif($this->session->flashdata('success_message')!=''){
                                        echo '<div class="alert alert-success alert_message">'.$this->session->flashdata('success_message').'</div>';
                                    }?>
                    <?php 
                    include $folder.'/'.$page_name.'.php';
                    ?>

                    <!-- end: page -->
                </section>
            </div>

            

        </section>
        
        
       
     <script>
         $(document).ready(function()  {
<?php if($this->session->flashdata('error_message')!='' || $this->session->flashdata('success_message')!=''){?>
   setTimeout(function() {
       $(".alert_message").fadeOut(1500);
   },1500);
 <?php }?>
       });
       </script>

       <?php include_once('scripts.php');?>

    </body>
 
</html>