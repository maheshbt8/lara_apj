<?php
$login_image_url=$this->crud_model->get_image_url($this->session->userdata('login_id'));
$login_user_details=$this->crud_model->get_user_details($this->session->userdata('login_id'));
$login_role_details=$this->crud_model->get_role_details($this->session->userdata('role_id'));
$system_name    = $this->db->get_where('settings', array('setting_type' => 'system_name'))->row()->description;
$system_email    = $this->db->get_where('settings', array('setting_type' => 'system_email'))->row()->description;
$system_mobile    = $this->db->get_where('settings', array('setting_type' => 'mobile'))->row()->description;
$system_title   = $this->db->get_where('settings', array('setting_type' => 'system_title'))->row()->description;

?>
<!doctype html>
<html lang="en">
<?php $folder = $this->router->fetch_class();?>
<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
      <?php include_once('topcss.php');?>
		
		<title><?php echo $page_title.' - '.$system_name;?></title>

		<link rel="icon" type="image/png" href="<?php echo base_url();?>assets/front-end/img/favicon.png">
<style type="text/css">
	/*#main-body{
        padding-top: 150px
    }*/
    .main{
/*     border:2px solid #ff00ff;*/
     margin-top: 130px;
     min-height: 162px;
     display: block;
 }
</style>
	</head>
	
	<body>
		<div class="body-wrapper">
		<!-- Start Preloader Area -->
       <!--  <div class="preloader-area">
            <div class="lds-hourglass"></div>
        </div> -->
        <!-- End Preloader Area -->

<?php include_once('header.php');?>
<!-- <div class="container-fluid main"> -->
	<?php include $page_name.'.php';?>
	<!-- <div class="clearfix"></div>
</div> -->
<?php include_once('footer.php');?>
</div>
		<!-- Back Top top -->
        <!-- <div class="back-to-top">Top</div> -->
        <!-- End Back Top top -->
         
<?php include_once('scripts.php');?>
	</body>
</html>