  
<?php
if(isset($_GET['course'])){
    $get_course=$_GET['course'];
}else{
    $get_course='';
}
if(isset($_GET['subject'])){
    $get_subject=$_GET['subject'];
}else{
    $get_subject='';
}
?>
  <!--Notes page content--> 
                    <div class="row">
                        <div class="col">
                                <section class="card">
                                    <div class="card-header">
                                       <div class="row">
                                           <div class=" col-lg-10 ">
                                                <form class="form-inline">
                                                    <div class="col-lg-4 ">
                                                        <select class=" form-control w-100" onchange ="get_subject_options(this.value);" name="course">
                                            <option value="">--Select Course--</option>
                                                               <?php
$course=$this->crud_model->get_active_courses();
foreach ($course as $row) {?>
        <option value="<?=$row['id'];?>"><?=$row['course'];?></option>
                            <?php }?>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-4 ">
                                                        <select class=" form-control w-100" id="subjects_list" name="subject">
                                                                <option value="">--Select Subject--</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-2 ">
                                                        <button type="submit" class="btn btn-success w-100">Search</button>
                                                    </div>


                                                 </form>
                                            </div>
                                            <div class="col-lg-2 ">
                                                <a href="<?=base_url('notes_add')?>" class="btn btn-info w-100" alt="Add new notes"><b>+ </b>Add</a>
                                            </div>    
                                        </div>    
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered table-striped mb-0" id="notes">
                                            <thead>
                                                <tr>
                                                    <th>Sno</th>
                                                    <th>Course</th>
                                                    <th>Subject</th>
                                                    <th>Tittle</th>
                                                    <th>Notes</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
if($get_course!='' || $get_subject!=''){
    if($get_course!=''){
        $where['course_id']=$get_course;
    }
    if($get_subject!=''){
        $where['subject_id']=$get_subject;
    }
    $notes=$this->crud_model->get_notes_where_info($where);
}else{
    $notes=$this->crud_model->get_notes_info();
}
$i=0;foreach ($notes as $row) {
    $subject=$this->crud_model->get_single_subject_info($row['subject_id']);
    $course=$this->crud_model->get_single_course_info($subject['course_id']);
                                                ?>
                                                <tr>
                                                    <td><?=$i+1;?></td>
                                                    <td><?=$course['course'];?></td>
                                                    <td><?=$subject['subject'];?></td>
                                                    <td><?=$row['title'];?></td>
                                                    <td><?=$row['title']?>.pdf</td>
                                                    <td>
                                                        <!-- <a href="#" class=" mr-2  text-primary">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a> -->
                                                        <a href="<?=base_url('notes_view/').$row['id'];?>" class="mr-2  text-success" target="_blank">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <a href="#" class="mr-2  text-danger" onclick="return delete_row('<?=base_url('set_row_status/').'notes/id/'.$row['id'].'/0';?>');">
                                                            <i class="far fa-trash-alt"></i>
                                                        </a>
                                                        <!-- <a href="#" class="mr-2  text-danger ">
                                                            <i class="far fa-trash-alt"></i>
                                                        </a> -->
                                                    </td>
                                                </tr>
                                            <?php }?>
                                            </tbody>
                                        </table>
                                    </div>
                                </section>
                            </div>
                        </div>