<div class="row">
<div class="col">
<section class="card form-wizard" id="w4">
<header class="card-header">
<div class="card-actions">
<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
</div>

<h2 class="card-title">Form Wizard</h2>
</header>
            <div class="card-body">
                <form class="form-horizontal p-3" id="myform" novalidate="novalidate">
                <div class="col-lg-4 form-group">
                    <select class="form-control w100" id="test" required="" name="test">
                    <option value="">---Select Test---</option>
                    <?php
                    for ($k=1; $k <= 10; $k++) { 
                        $test_check=$this->crud_model->count_records('mcq_type',array('course'=>$course,'test'=>'Test'.$k));
                        if($test_check==0){
                        echo '<option value="Test'.$k.'">Test'.$k.'</option>';
                        }
                    }
                    ?>
                    </select>
                    <input type="hidden" name="no_of_questions" id="no_of_questions" value="<?=$questions;?>">
                    <input type="hidden" name="course" value="<?=$course;?>">
                </div>
                <div class="col-lg-4 form-group">
                    <select class="form-control w100" id="course" required="" name="course" disabled="">
                    <option value="">---Select Type---</option>
                    <option value="CPT" <?php if($course == 'CPT'){echo "selected";}?>>CPT</option>
                    <option value="IPCC" <?php if($course == 'IPCC'){echo "selected";}?>>IPCC</option>
                    <option value="Final" <?php if($course == 'Final'){echo "selected";}?>>FINAL</option>
                    <!-- <option value="CPT-NEW">CPT-NEW</option>
                    <option value="IPCC-NEW">IPCC-NEW</option>
                    <option value="FINAL-NEW">FINAL-NEW</option> -->
                    </select>
                    
                </div>
                <div class="col-lg-6 form-group">
                    <textarea class="form-control w100" id="description" placeholder="Please Enter Any Information about this" rows="5" required=""></textarea>
                </div>
                <div class="wizard-progress">
                    <div class="steps-progress">
                        <div class="progress-indicator"></div>
                    </div>
                    <ul class="nav wizard-steps">
                        <?php
                        for ($i=0; $i < $questions; $i++) { 
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#q-tab<?=$i+1;?>" data-toggle="tab"><span><?=$i+1;?></span></a>
                        </li>
                    <?php }?>
                    </ul>
                </div>

                
                    <div class="tab-content">
                        <?php
                        for ($i=0; $i < $questions; $i++) { 
                        ?>
                        <div id="q-tab<?=$i+1;?>" class="tab-pane">
                            <div class="form-group row">
                                <label class="col-sm-3 control-label text-sm-right pt-1" for="question<?=$i+1;?>">Question <span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="question[]" id="question<?=$i+1;?>" required="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 control-label text-sm-right pt-1">Choice1 <span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="choice1[]" id="choice1<?=$i+1;?>" required="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 control-label text-sm-right pt-1">Choice2 <span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="choice2[]" id="choice2<?=$i+1;?>" required="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 control-label text-sm-right pt-1" for="choice3<?=$i+1;?>">Choice3 <span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="choice3[]" id="choice3<?=$i+1;?>" required="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 control-label text-sm-right pt-1" for="choice4<?=$i+1;?>">Choice4 <span class="required">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="choice4[]" id="choice4<?=$i+1;?>" required="">
                                </div>
                            </div>
                            <div class="form-group row">
                                            <label class="col-sm-3 control-label text-sm-right pt-2">Answer <span class="required">*</span></label>
                                            <div class="col-sm-9">
                                                <div class="radio-custom radio-primary">
                                                    <input id="choice1<?=$i+1;?>" name="answer[]" type="radio" value="1" required />
                                                    <label for="choice1<?=$i+1;?>">Choice1</label>
                                                </div>
                                                <div class="radio-custom radio-primary">
                                                    <input id="choice2<?=$i+1;?>" name="answer[]" type="radio" value="2" />
                                                    <label for="choice2<?=$i+1;?>">Choice2</label>
                                                </div>
                                                <div class="radio-custom radio-primary">
                                                    <input id="choice3<?=$i+1;?>" name="answer[]" type="radio" value="3" />
                                                    <label for="choice3<?=$i+1;?>">Choice3</label>
                                                </div>
                                                <div class="radio-custom radio-primary">
                                                    <input id="choice4<?=$i+1;?>" name="answer[]" type="radio" value="4" />
                                                    <label for="choice4<?=$i+1;?>">Choice4</label>
                                                </div>
                                                <label class="error" for="answer[]"></label>
                                            </div>
                                        </div>
                        </div>
                    <?php }?>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <ul class="pager">
                    <li class="previous disabled">
                        <a><i class="fas fa-angle-left"></i> Previous</a>
                    </li>
                    <li class="finish hidden float-right">
                        <a onclick="submit_mcq();">Finish</a>
                    </li>
                    <li class="next">
                        <a>Next <i class="fas fa-angle-right"></i></a>
                    </li>
                </ul>
            </div>
        </section>
    </div>
</div>
<span id="response"></span>
<script type="text/javascript">
    function submit_mcq() {
        var items=[];
        var ques = document.getElementsByName('question[]');
        var cho1 = document.getElementsByName('choice1[]');
        var cho2 = document.getElementsByName('choice2[]');
        var cho3 = document.getElementsByName('choice3[]');
        var cho4 = document.getElementsByName('choice4[]');
        var ans = document.getElementsByName('answer[]');
        var course = $('#course').val();
        var test = $('#test').val();
        var no_of_questions = $('#no_of_questions').val();
        var description = $('#description').val();
        for (var i = 0; i <ques.length; i++) {
            var que=ques[i];
            var choi1=cho1[i];
            var choi2=cho2[i];
            var choi3=cho3[i];
            var choi4=cho4[i];
            var answ=ans[i];
            var item ={
                question: que.value,
                choice1: choi1.value,
                choice2: choi2.value,
                choice3: choi3.value,
                choice4: choi4.value,
                answer: answ.value
            };
            items.push(item);
        }
        var ordre1={ items: items, course: course, test: test, no_of_questions: no_of_questions, description: description};
 $.ajax({
                    url:'<?php echo base_url();?>ajax/submit_mcq/',
                    type:'POST',
                    data: ordre1,
                    success:function(result){
                        location.reload(); // then reload the page.(3)
                       // $("#response").html(result);
                    }
            });
        /*var items=[];    // This common array will get all info for each item.
var ordre_column1 = $('.name_list').sortable('toArray');
for (var i in ordre_column1){    //create an array for a single item
var item ={id: ordre_column1[i],
           column_id: 1,
           sort_no: i
};
items.push(item);   // put the single item array in common array
}
var ordre1={ items: items };
alert(ordre1);
$.post('<?=base_url('ajax/submit_mcq');?>','data='+$.toJSON(ordre1));  //post the data to JSON format*/

        //var cartplans=$("#name_list1").val();
        /*var cart_plans = $(".name_list").map(function() {
            return this.value;
            }).get();
            var cartplans=cart_plans.join(",");*/
            /*var values = $("input[name='username[]']").map(function(){return $(this).val();}).get().join("/");*/
 /*             var inps = document.getElementsByName('username[]');
for (var i = 0; i <inps.length; i++) {
var inp=inps[i];
    alert("pname["+i+"].value="+inp.value);
}
      */      /*alert(cartplans);*/
        //alert(event);
       /* event.preventDefault();
        $.ajax({
                    url:'<?php echo base_url();?>ajax/submit_mcq/',
                    type:'POST',
                    data:$('#myform').serialize(),
                    success:function(result){
                        $("#response").html(result);

                    }

            });*/
        /*var toid = $("#toid").val();
        var newmsg = $("#newmsg").val();

        $.ajax({
            type: "POST",
            url: "insert.php",
            data: "toid=" + content + "&newmsg=" + newmsg,
            success: function(){alert('success');}
        });*/
    }
</script>