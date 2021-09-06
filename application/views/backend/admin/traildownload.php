<?php $this->session->set_userdata('last_page',current_url());?>
<!--Trail Download-->
                    <div class="row">
                        <div class="col">
                                <section class="card">
                                    <div class="card-header">
                                       <form  method="post" action="<?=base_url('traildownload');?>"enctype="multipart/form-data" novalidate="novalidate" id="form" class="form-inline">
                                            <div class="col-lg-11">
                                                <div class="row">
                                                    <div class="col-lg-4 form-group">
                                                        <select class="form-control w100" required="" name="exam_type">
                                                            <option value="">---Select Type---</option>
                                                            <?php 
                                                            $course=$this->crud_model->get_active_courses();
                                                            foreach ($course as $row) {?>
                                                                <option value="<?=$row['id'];?>" <?php if($course_id == $row['id']){echo "selected";}?>><?=$row['course'];?></option>
                                                            <?php }?>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-4 form-group">
                                                        <input type="text" name="start_date" data-plugin-datepicker="" autocomplete="off" class="form-control w100" Placeholder="Enter start time">
                                                    </div>
                                                    <div class="col-lg-4 form-group ">
                                                        <input type="text" name="end_date" data-plugin-datepicker="" autocomplete="off" class="form-control w100" Placeholder="Enter End time">
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-lg-1">
                                                <button type="submit" class="btn btn-primary search">Search</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-body">
                                    
 <form  method="post" action="<?=base_url('assign_evaluator');?>"enctype="multipart/form-data" novalidate="novalidate" id="form1">
                                        <table class="table table-bordered table-striped mb-0" id="trail-download">
                                            <thead>
                                                <tr>
                                                    <th><input type="checkbox" id="select_all_down"/></th>
                                                    <th>Date</th>
                                                    <th>User Id</th>
                                                    <th>User Name</th>
                                                    <th>Mobile</th>
                                                    <!-- <th>Download File</th>
                                                    <th>Evaluate</th> -->
                                                    <th>Marks</th>
                                                    <th>Out Of Marks</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($trail_download as $td):
                                                    ?>
                                                <tr>
                                                    <td><?php if($td['evaluator_id']==0){?><input type="checkbox" name="download[]"  class="trail_download" value="<?=$td['id'];?>" ><?php }else{echo "Assigned - <span class='text-success'><b>".$this->crud_model->get_type_name_by_where('users', 'id', $td['evaluator_id'], 'first_name')."</b></span>";}?></td>
                                                    <td><?php echo date('Y-m-d', strtotime($td['created_at']));?></td>
                                                    <td><?php echo $td['unique_id']; ?></td>
                                                    <td><?php echo $td['first_name'];?></td>
                                                    <td><?php echo $td['mobile'];?></td>
                                                    <!-- <td>IPCC200322.pdf</td>
                                                    <td>IPCC200322.pdf</td> -->
                                                    <td><?php echo $td['marks'];?></td>
                                                    <td><?php echo $td['out_of'];?></td>
                                                    <td>
                                                        <?php
                                                    if($td['row_status']=='0'){echo "<span class='text-danger'>Deleted</span>";}elseif($td['row_status']=='1'){echo "<span class='text-primary'>User Downloaded</span>";}elseif($td['row_status']=='2'){echo "<span class='text-info'>Answers Uploaded By User</span>";}elseif($td['row_status']=='3'){echo "<span class='text-warning'>Evaluator Downloaded</span>";}elseif($td['row_status']=='4'){echo "<span class='text-success'>Resluts Issued</span>";}?></td>
                                                    <td>
                                                        <a href="<?php echo base_url('papers');?>?id=<?php echo $td['id']?>" class=" mr-2  text-primary">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        
                                                    </td>
                                                </tr>
                                                <?php endforeach;?>
                                            </tbody>
                                        </table>
                                        <div class="col-lg-10">
                                                <div class="row">
                                                    <div class="col-lg-4 form-group">
                                                        <select class="form-control w100" required="" name="evaluator" id="evaluator">
                                                            <option value="">---Select Evaluator---</option>
                                                            <?php
                                                            foreach ($evaluator_data as $row) {?>
                                                                <option value="<?=$row['id'];?>"><?=ucwords($row['first_name']);?></option>
                                                            <?php }?>
                                                        </select>
                                                        <input type="hidden" name="type" value="trail">
                                                    </div>
                                                    <div class="col-lg-4 form-group">
                                                        <button type="button" class="btn btn-primary search" onclick="form_submit()" >Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                    </form>
                                    </div>
                                </section>
                            </div>
                        </div>

<script type="text/javascript">
    //select all checkboxes
$("#select_all_down").change(function(){  //"select all" change 
    var status = this.checked; // "select all" checked status
    $('.trail_download').each(function(){ //iterate all listed checkbox items
        this.checked = status; //change ".checkbox" checked status
    });
});

$('.trail_download').change(function(){ //".checkbox" change 
    //uncheck "select all", if one of the listed checkbox item is unchecked
    if(this.checked == false){ //if this item is unchecked
        $("#select_all_down")[0].checked = false; //change "select all" checked status to false
    }
    
    //check "select all" if all checkbox items are checked
    if ($('.trail_download:checked').length == $('.trail_download').length ){ 
        $("#select_all_down")[0].checked = true; //change "select all" checked status to true
    }
});

function form_submit() {
    if ($(".trail_download:checked").length > '0'){
        var evaluator=$('#evaluator').val();
        if(evaluator!=''){
$( "#form1" ).submit();
        }else{
            alert('Please Assign Evaluator for this records');    
        }
    }else{
        alert('Please Select alert one checkbox');
    }
}
</script>