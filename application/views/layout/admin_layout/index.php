<!doctype html>
<html class="fixed sidebar-left-sm" data-style-switcher-options="{'sidebarSize': 'sm'}">
<?php 
if(!$this->session->userdata('admin')){
    redirect('admin');    
}
?>
<?php $folder = $this->router->fetch_class();?>
<head>

        <!-- Basic -->
        <meta charset="UTF-8">

        <title>Admin- CA Exam Series</title>
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

            <!-- start: header -->
            <?php include_once('header.php');?>
            <!-- end: header -->

            <div class="inner-wrapper">
                <!-- start: sidebar -->
               <?php include_once('side_nav.php');?>
                <!-- end: sidebar -->

                <section role="main" class="content-body">
                    <header class="page-header">
                        <h2><?php echo $page_title;?>-Admin</h2>
                    
                        <div class="right-wrapper text-right mr-3">
                            <ol class="breadcrumbs">
                                <li>
                                    <a href="">
                                        <i class="fas fa-home"></i>
                                    </a>
                                </li>
                                <!--<li><span>Layouts</span></li>
                                <li><span>Sidebar Size SM</span></li>-->
                            </ol>
                    
                            
                        </div>
                    </header>

                    <!-- start: page -->
                    
<?php include 'ca-app/mypages/'.strtolower($folder).'/'.$page_name.'.php';?>

                    <!-- end: page -->
                </section>
            </div>

            

        </section>
        
        
       
        

       <?php include_once('scripts.php');?>

    </body>
 
</html>