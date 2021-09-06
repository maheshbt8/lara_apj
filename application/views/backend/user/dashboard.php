<style type="text/css">
    html .toggle-primary .toggle label {
    color: #0088CC;
    border-left-color: #0088CC;
    border-right-color: #0088CC;
}

</style>

<div class="row">
                        <div class="col-lg-12">
                            <h2 class="text-center">Welcome to CA Exam Series</h2>
                            <?php 
                        if($login_user_details['row_status']==1){

                    $res=$this->crud_model->get_main_user_dashboard_list();
                    /*echo "<pre>";
                    print_r($res);*/
                    foreach ($res as $r) {
                         ?>
                            <h4 class="text-center"> <b><?=$r['plan'];?></b></h4>
                            <?php 
                            foreach ($r['result'] as $p) {
                                if($p['package_type']==0){
                                    $where=array('id'=>$p['subject_id']);
                                }else if($p['package_type']==1){
                                    $where=array('course_id'=>$p['course_id'],'type'=>$p['package_type']);
                                }else if($p['package_type']==2){
                                    $where=array('course_id'=>$p['course_id'],'type'=>$p['package_type']);
                                }else if($p['package_type']==3){
                                    $where=array('course_id'=>$p['course_id']);
                                }
                                $subjects=$this->crud_model->select_results_info('subjects',$where)->result_array();
                               foreach ($subjects as $sub) {
                                $ex_count=$this->crud_model->get_user_exams_by_sub($sub['id'],$p['plan_id'])->num_rows();
                                /*$ex_count=$this->crud_model->select_results_info('exams',array('subject_id'=>$sub['id'],'row_status'=>1))->num_rows();*/
                            ?>
                            <div class="toggle toggle-primary" data-plugin-toggle="">
                                <section class="toggle">
                                    <label onclick="get_my_exams(<?=$sub['id'];?>,<?=$p['plan_id'];?>);"><i class="fas fa-plus"></i><i class="fas fa-minus"></i><?=ucwords($sub['subject']);?> <span class="badge badge-pill badge-success"><?=$ex_count;?></span> </label>
                                    <div class="toggle-content" style="display: none;" id="exams_<?=$sub['id']?>">
                                      
                                    </div>
                                </section>
                            </div>
                        <?php }}?>
                       <?php }} ?>
                       <?php 
                                    if($login_user_details['row_status']==3){?>
                            <h4 class="text-center"> <b>Trail Exams</b></h4>
                                <section class="card">
                                    <div class="card-header">
                                        <h4 > Trail Videos</h4>
                                    </div>
                                    <div class="card-body">
                                         <div class="row">
                                             <?php
                                        $dashboard=$this->crud_model->get_traildashboard_by_course($login_user_details['exam_type']);
                                        $urls=explode(':@',$dashboard['url']);
                                        for($i=0;$i<count($urls);$i++) {
                                        ?>
                                          
                                    <div class="col-sm-4">
                                        <div class="embed-responsive embed-responsive-4by3">
                                            <iframe src="<?=$urls[$i];?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                        </div>
                                    </div>
   
                                        <?php }?>
                                         </div>
                                              
                                    </div>
                                </section>
                                <section class="card">
                                    <div class="card-header">
                                        <h4 > Instructions</h4>
                                    </div>
                                    <div class="card-body">
                                           
                                         <div class="timeline timeline-simple mt-3 mb-3">
                                                <div class="tm-body">
                                                    <ol class="tm-items">
                                                          <?php
                                        $dashboard=$this->crud_model->get_traildashboard_by_course($login_user_details['exam_type']);
                                        $inst=explode(':@',$dashboard['instructions']);
                                        for($i=0;$i<count($inst);$i++) {
                                        ?>
                                        <li>
                                                            <div class="tm-box">
                                                                   <?=$inst[$i];?>
                                                            </div>
                                                        </li>
                                                        <?php }?>
                                                    </ol>
                                                </div>
                                            </div>
                                    </div>
                                </section>
                                <?php }?>
                        </div>
                    </div>


<script type="text/javascript">
    function get_my_exams(sub_id,plan_id) {
        /*alert(sub_id);
        alert(plan_id);*/
        $.ajax({
            type: "GET",
            url: "<?=base_url('ajax/get_user_exams_by_sub/');?>"+sub_id+'/'+plan_id,
            dataType: "json",
            success: function(result){
                /*if(response.status==1){}*/
                $('#exams_'+sub_id).html(result.mess);
            }
        });
    }
</script>
<script>
 function exam_timer(dtime,exam_id) {
var countDownDate = new Date(dtime).getTime();
var x = setInterval(function() {
  var now = new Date().getTime();
  var distance = countDownDate - now;
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
  document.getElementById("d"+exam_id).innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
  if (distance < 0) {
    clearInterval(x);
   location.reload();
  }
}, 1000);
}
</script>