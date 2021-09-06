		<!-- Vendor -->
		<script src="<?php echo base_url();?>assets/vendor/jquery/jquery.js"></script>		
        <script src="<?php echo base_url();?>assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>		
        <script src="<?php echo base_url();?>assets/vendor/jquery-cookie/jquery.cookie.js"></script>		
        <script src="<?php echo base_url();?>assets/master/style-switcher/style.switcher.js"></script>		
        <script src="<?php echo base_url();?>assets/vendor/popper/umd/popper.min.js"></script>		
        <script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.js"></script>		
        <script src="<?php echo base_url();?>assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>		
        <script src="<?php echo base_url();?>assets/vendor/common/common.js"></script>		
        <script src="<?php echo base_url();?>assets/vendor/nanoscroller/nanoscroller.js"></script>		
        <script src="<?php echo base_url();?>assets/vendor/magnific-popup/jquery.magnific-popup.js"></script>		
        <script src="<?php echo base_url();?>assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
		<!-- Specific Page Vendor -->		
        <script src="<?php echo base_url();?>assets/vendor/jquery-ui/jquery-ui.js"></script>		
        <script src="<?php echo base_url();?>assets/vendor/jqueryui-touch-punch/jquery.ui.touch-punch.js"></script>		
        <script src="<?php echo base_url();?>assets/vendor/jquery-appear/jquery.appear.js"></script>		
        
        <!-- <script src="<?php echo base_url();?>assets/vendor/summernote/summernote-bs4.js"></script> -->
        <!-- <script src="<?php echo base_url();?>assets/vendor/bootstrap-markdown/js/markdown.js"></script>
        <script src="<?php echo base_url();?>assets/vendor/bootstrap-markdown/js/to-markdown.js"></script>
        <script src="<?php echo base_url();?>assets/vendor/bootstrap-markdown/js/bootstrap-markdown.js"></script>   -->

        
        <!-- Specific css for this page --> 
        <script src="<?php echo base_url();?>assets/vendor/datatables/media/js/jquery.dataTables.min.js"></script>		
        <script src="<?php echo base_url();?>assets/vendor/datatables/media/js/dataTables.bootstrap4.min.js"></script>		
        <script src="<?php echo base_url();?>assets/vendor/datatables/extras/TableTools/Buttons-1.4.2/js/dataTables.buttons.min.js"></script>	
        <script src="<?php echo base_url();?>assets/vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.bootstrap4.min.js"></script>	<script src="<?php echo base_url();?>assets/vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.html5.min.js"></script>		
        <script src="<?php echo base_url();?>assets/vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.print.min.js"></script>		
        <script src="<?php echo base_url();?>assets/vendor/datatables/extras/TableTools/JSZip-2.5.0/jszip.min.js"></script>		
        <script src="<?php echo base_url();?>assets/vendor/datatables/extras/TableTools/pdfmake-0.1.32/pdfmake.min.js"></script>		
        <script src="<?php echo base_url();?>assets/vendor/datatables/extras/TableTools/pdfmake-0.1.32/vfs_fonts.js"></script>
        
        <script src="<?php echo base_url();?>assets/vendor/ios7-switch/ios7-switch.js"></script>
      
  
		
		<!-- Theme Base, Components and Settings -->
		<script src="<?php echo base_url();?>assets/js/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="<?php echo base_url();?>assets/js/custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="<?php echo base_url();?>assets/js/theme.init.js"></script>
		
        
        <!-- Examples -->
		<script src="<?php echo base_url();?>assets/js/examples/examples.datatables.tabletools.js"></script>
        <script src="<?php echo base_url();?>assets/js/examples/examples.datatables.editable.js"></script>
		<script src="<?php echo base_url();?>assets/vendor/pnotify/pnotify.custom.js"></script>
                
        <!-- Validation -->
        <script src="<?php echo base_url();?>assets/vendor/jquery-validation/jquery.validate.js"></script>
        <script src="<?php echo base_url();?>assets/js/examples/examples.validation.js"></script>

<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script> -->

<!-- <script src="<?php echo base_url();?>assets/js/examples/examples.notifications.js"></script> -->
<script src="<?php echo base_url();?>assets/vendor/pnotify/pnotify.custom.js"></script>

<script src="<?php echo base_url();?>assets/vendor/bootstrap-wizard/jquery.bootstrap.wizard.js"></script>
        <script src="<?php echo base_url();?>assets/js/examples/examples.wizard.js"></script>
        
<script type="text/javascript">
<?php
    if($this->session->flashdata('success_message')!=''){
?>
  $('#position-3-success').trigger('click');
<?php }?>
<?php
       if($this->session->flashdata('error_message')!=''){
        ?>
  $('#position-3-error').trigger('click');
<?php }?>
</script>



                <script type="text/javascript">
    function get_plan_options(course_id){ 
	$.ajax({
            url: '<?php echo base_url();?>ajax/get_plan_options_by_id/' + course_id ,
            success: function(response)
            {
                jQuery('#plans_list').html(response);
                get_subject_options(course_id);
            }
    });
    }
    function get_subject_options(course_id){
    $.ajax({
            url: '<?php echo base_url();?>ajax/get_subjects_by_id/' + course_id ,
            success: function(response)
            {
                jQuery('#subjects_list').html(response);
            }
    });    
    }
    function download_event(id, status, table){
        var base_url = "<?php echo base_url();?>";
       $.ajax({
            url 		: base_url+'ajax/exam_download_action',
    		type 		: 'POST', // form submit method get/post
    		data 		: {exam_id: id, status : status, table: table}, // serialize form data 
            beforeSend: function() {},
            success: function(data) {
                location.reload();
            },
            error: function(e) {
                console.log(e)
            }
        });

    }
    function update_download_event(id, status, table){
    	alert(id+'-'+status+'-'+table);
        var base_url = "<?php echo base_url();?>";
       $.ajax({
            url         : base_url+'ajax/exam_update_download_action',
            type        : 'POST', // form submit method get/post
            data        : {exam_id: id, status : status, table: table}, // serialize form data 
            beforeSend: function() {},
            success: function(data) {
                  /*  alert('session started..!');
                    var link=document.createElement('a');
                    link.href= $(this).attr(base_url+'uploads/'+path+'/'+p_download);
                    alert(link.href);
                    link.download=name+".pdf";
                    link.click();*/
                location.reload();
            },
            error: function(e) {
                console.log(e)
            }
        });
    }  

    $(document).ready(function(){
    	var exams = '<?= (isset($mainexams))? json_encode($mainexams):''; ?>';
    	setInterval(function() {
        	$.each(JSON.parse(exams), function(key, val){
            	if(val.downloaded_time == null)
        		 	makeTimer(val.id, val.scheduled_date); 
            	else
            		makeTimer(val.id, val.downloaded_time, 'duration', val.time_out); 

            });
    	}, 1000);
   	});
   	
    	
	function makeTimer(id, date, type = '',duration = 0) {
		$("#link"+id).hide();
		var base_url = "<?=base_url();?>";
		var src = base_url+"uploads/main/questions/"+id+".pdf";
		var endTime = new Date(date);
		if(type == '')		
			endTime = (Date.parse(endTime) / 1000);	
		else
			endTime = ((endTime.getTime()+ (duration * 60 * 1000)) / 1000);	
		
		var now = new Date();
		now = (Date.parse(now) / 1000);

		var timeLeft = endTime - now;

		var days = Math.floor(timeLeft / 86400); 
		var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
		var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600 )) / 60);
		var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));

		if (hours < "10") { hours = "0" + hours; }
		if (minutes < "10") { minutes = "0" + minutes; }
		if (seconds < "10") { seconds = "0" + seconds; }
		if(type == ''){
    		$("#timer"+id).html('<ul class="ul-timer"><li>'+days+'D</li><li>'+hours+'H</li><li>'+minutes+'M</li><li>'+seconds+'S</li></ul>');
    		if (timeLeft < 0) {
    			$("#timer"+id).empty();
    			$("#link"+id).show();
        	    /* $("#timer"+id).html('<a href="'+src+'" onclick="download_event('+id+', 1, "exam_downloads")" class="btn btn-success" download="'+id+'-Question-paper">'+id+'-Question-paper.pdf</a>'); */
        	}
    	}else{
    		$("#duration"+id).html('<ul class="ul-timer"><li>'+days+'D</li><li>'+hours+'H</li><li>'+minutes+'M</li><li>'+seconds+'S</li></ul>');
    		if (timeLeft < 0) {
    			$("#duration"+id).empty();
        	}
    	}
	}

   function download_file(id,path,name){
    alert(id+'-'+path+'-'+name);
        $.ajax({
            url         : '<?php echo base_url();?>common/filesdownload',
            type        : 'POST', // form submit method get/post
            data        : {file_id : id, path : path, name : name, ext : 'pdf'},
            success: function(data) {
                //alert(data);
                //location.reload();
            }
        });
    }

    function download_main_exam(id,status,plan_id,table='exam_downloads') {
        /*download_event(id,status,table);*/
        var base_url = "<?php echo base_url();?>";
       $.ajax({
            url         : base_url+'ajax/exam_download_action',
            type        : 'POST', // form submit method get/post
            data        : {exam_id: id, status : status, plan_id : plan_id, table: table}, // serialize form data 
            beforeSend: function() {},
            success: function(data) {
                /*location.reload();*/

                alert('Exam Downloaded Successfully');
                location.reload();
            },
            error: function(e) {
                console.log(e)
            }
        });
    }
    function exam_download_timer(time_out,exam_id,exam_d_id) {
        var countDownDate = new Date(time_out).getTime();
var x = setInterval(function() {
  var now = new Date().getTime();
  var distance = countDownDate - now;
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
  document.getElementById("q"+exam_id).innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
  if (distance < 0) {
    alert('Exam Time Out');
    clearInterval(x);
    close_exam(exam_d_id,5,'exam_downloads');
   location.reload();
  }
}, 1000);
    }
    function close_exam(id, status, table){
        //alert(id+'-'+status+'-'+table);
        var base_url = "<?php echo base_url();?>";
       $.ajax({
            url         : base_url+'ajax/exam_update_download_action',
            type        : 'POST', // form submit method get/post
            data        : {exam_id: id, status : status, table: table}, // serialize form data 
            beforeSend: function() {},
            success: function(data) {
                location.reload();
            },
            error: function(e) {
                console.log(e)
            }
        });
    }  
</script>

<!-- <script src="<?php echo base_url();?>assets/js/examples/examples.datatables.editable.js"></script> -->


<script type="text/javascript">
    function delete_row(delete_url) {
        jQuery('#delete-model').modal('show', {backdrop: 'static'});
        document.getElementById('delete_link').setAttribute('href' , delete_url);
    }
    function set_row_status(delete_url) {
        jQuery('#row_status-model').modal('show', {backdrop: 'static'});
        document.getElementById('row_status_link').setAttribute('href' , delete_url);
    }
</script>
<div class="modal fade" id="delete-model">
    <div class="modal-dialog">
        <div class="modal-content" style="margin-top:100px;">
            <header class="card-header">
                                            <h2 class="card-title">Are you sure?</h2>
                                        </header>
                                        <div class="card-body">
                                            <div class="modal-wrapper">
                                                <div class="modal-icon">
                                                    <i class="fas fa-question-circle"></i>
                                                </div>
                                                <div class="modal-text">
                                                    <h4>Are you sure want to delete this information.?</h4>
                                                </div>
                                            </div>
                                        </div>
            <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                <a href="#" class="btn btn-danger" id="delete_link"><?php echo 'Delete';?></a>
                <button type="button" class="btn btn-info" data-dismiss="modal"><?php echo 'Cancel';?></button>
            </div>
        </div>
    </div>
</div>
    <div class="modal fade" id="row_status-model">
        <div class="modal-dialog">
            <div class="modal-content" style="margin-top:100px;">
                <header class="card-header">
                                                <h2 class="card-title">Are you sure?</h2>
                                            </header>
                                            <div class="card-body">
                                                <div class="modal-wrapper">
                                                    <div class="modal-icon">
                                                        <i class="fas fa-question-circle"></i>
                                                    </div>
                                                    <div class="modal-text">
                                                        <h4>Are you sure want to Update this information.?</h4>
                                                    </div>
                                                </div>
                                            </div>
                <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                    <a href="#" class="btn btn-success" id="row_status_link"><?php echo 'Confirm';?></a>
                    <button type="button" class="btn btn-info" data-dismiss="modal"><?php echo 'Cancel';?></button>
                </div>
            </div>
        </div>
    </div>



    <script type="text/javascript">
    function showAjaxModal(url)
    {
        // SHOWING AJAX PRELOADER IMAGE
        jQuery('#modal_ajax .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="assets/images/preloader.gif" style="height:25px;" /></div>');
        
        // LOADING THE AJAX MODAL
        jQuery('#modal_ajax').modal('show', {backdrop: 'true'});
        
        // SHOW AJAX RESPONSE ON REQUEST SUCCESS
        $.ajax({
            url: url,
            success: function(response)
            {
                jQuery('#modal_ajax .modal-body').html(response);
            }
        });
    }
    </script>
    
    <!-- (Ajax Modal)-->

    <div class="modal fade" id="modal_ajax">
        <div class="modal-dialog">
            <div class="modal-content" style="margin-top:100px;">
                <header class="card-header">
                                                <h2 class="card-title"><?php echo $system_name;?><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button></h2>
                                            </header>
                                            <div class="card-body">
                                                <div class="modal-body" style="height:400px; overflow:auto;">
                                                </div>
                                                <!-- <div class="modal-wrapper">
                                                    <div class="modal-icon">
                                                        <i class="fas fa-question-circle"></i>
                                                    </div>
                                                    <div class="modal-text">
                                                        <h4>Are you sure want to Update this information.?</h4>
                                                    </div>
                                                </div> -->
                                            </div>
                <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                    <button type="button" class="btn btn-info" data-dismiss="modal"><?php echo 'Cancel';?></button>
                </div>
            </div>
        </div>
    </div>