<div class="row">
     <form  method="post" action="<?=base_url('sms');?>"enctype="multipart/form-data" novalidate="novalidate" id="form">
    <div class="col-md-12">
        <div class="form-group row">
            <label class="col-lg-2 control-label text-lg-right pt-2" for="subject"> Subject</label>
            <div class="col-lg-10">
                <input type="text" class="form-control" id="subject" required="" autocomplete="off" name="subject">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-2 control-label text-lg-right pt-2" for="message">Message Text</label>
            <div class="col-lg-10">
                <textarea class="form-control" rows="3" id="message" autocomplete="off" required="" name="message"></textarea>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="row pt-3">
            <?php 
            $courses=$this->crud_model->get_active_courses();
            foreach ($courses as $course) {
            ?>
            <div class="col-md-2 ">
                <div class="card"> 
                    <div class="card-header"> 
                        <div class="checkbox-custom checkbox-success">
                            <input type="checkbox" onChange="check_my_course('<?=$course['id'];?>')" id="course<?=$course['id'];?>" value="<?=$course['id'];?>">
                            <label for="course<?=$course['id'];?>"><?=$course['course'];?></label>
                        </div>
                    </div>
                    <div class="card-body"> 
                        <?php 
            $plans=$this->crud_model->get_plans_by_id($course['id']);
            foreach ($plans as $plan) {
            ?>
                        <div class="checkbox-custom checkbox-success">
                            <input type="checkbox" name="plans[]" id="plan<?=$plan['id'];?>" class="plan<?=$course['id'];?>" value="<?=$plan['id'];?>"  onChange="check_my_plan('<?=$plan['id'];?>', '<?=$course['id'];?>')">
                            <label for="plan<?=$plan['id'];?>"><?=$plan['plan'];?></label>
                        </div>
                    <?php }?>
                    </div>
                </div>
            </div>
        <?php }?>
        </div>
    </div>
    <div class="col-md-12 pt-3">
        <button type="button" class="btn btn-success text-center text--center" onclick="form_submit()" >Submit</button>
    </div>
</form>
</div>
<script type="text/javascript">

    function check_my_course(type){
    var status = $("#course"+type).attr("checked", status);
        $('.plan'+type).each(function(){
            $(this).prop("checked", status[0].checked);
        });
    }
    function check_my_plan(id, type){
        var status = $("#plan"+id).attr("checked", status);
        if($('.plan'+type).length == $('.plan'+type+':checked').length){
            $('#course'+type).prop("checked", true);
        } else{
            $('#course'+type).prop("checked", false);
        }
    }

function form_submit() {
    if ($("input[type='checkbox']:checked").length > '0'){
        $( "#form" ).submit();
    }else{
        alert('Please Select alert one checkbox');
    }
}
</script>