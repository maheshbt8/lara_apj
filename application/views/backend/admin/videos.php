 <?php
$this->session->set_userdata('last_page',current_url());

$url=base_url('videos?video_type='.$_GET['video_type'].'&video_id=').$_GET['video_id'];
if(!empty($_GET['video_type']) && !empty($_GET['video_id'])){
    $url=base_url('videos?video_type='.$_GET['video_type'].'&video_id=').$_GET['video_id'];
}
if($_GET['video_type']=='pages'){
    $page_data=$this->crud_model->select_results_info('videos',array('id'=>$_GET['video_id']))->row_array();
}elseif($_GET['video_type']=='students'){
    $student_data=$this->crud_model->select_results_info('student_videos',array('id'=>$_GET['video_id']))->row_array();
}
 ?>
 <!--Trailupload-->
                    <div class="row">
                        <div class="col">
                                <section class="card">
                                    <div class="card-header">
                                        <form method="post" action="<?=$url;?>" enctype="multipart/form-data" novalidate="novalidate" class="form-horizontal" id="form">
                                            <div class="form-group row">
                                                <label class="col-sm-4 control-label text-sm-right pt-2"> </label>
                                                <div class="col-sm-5">
                                                    <div class="" data-toggle="buttons">
                                                        <label class="btn btn-secondary active">
                                                            <input type="radio"  autocomplete="off" value="Download" name="page_name" required="" <?=((!empty($page_data) && ($page_data['page_name']=='Download'))? 'checked': '' ) ?>> Download
                                                        </label>
                                                        <label class="btn btn-secondary active">
                                                            <input type="radio"  autocomplete="off" value="Contact Us" name="page_name" required="" <?=((!empty($page_data) && ($page_data['page_name']=='Contact Us'))? 'checked': '' )?>> Conttact Us
                                                        </label>
                                                        <label class="btn btn-secondary active">
                                                            <input type="radio"  autocomplete="off" value="Blog" name="page_name" required="" <?=((!empty($page_data) && ($page_data['page_name']=='Blog'))? 'checked' : '' ) ?>> Blog
                                                        </label>
                                                    </div>
                                                    <?php echo form_error('page_name', '<div class="error">', '</div>'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 control-label text-sm-right pt-2">Course Type: </label>
                                                <div class="col-sm-5">
                                                    <select class="form-control w100" onchange="get_subject_options(this.value);"  name="course" required="">
                                                        <option value="">---Select Type---</option>
            <?php 
            $course=$this->crud_model->get_active_courses();
foreach ($course as $row) {
                                                            ?>
                                <option value="<?=$row['id'];?>" <?=((!empty($page_data) && ($page_data['course_id']==$row['id']))? 'selected' : '' ) ?>><?=$row['course'];?></option>
                            <?php }?>
                                                    </select>
                                                    <?php echo form_error('course', '<div class="error">', '</div>'); ?>
                                                </div>
                                                
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 control-label text-sm-right pt-2">Video URL: </label>
                                                <div class="col-sm-5">
                                                    <input type="hidden" name="video_type" value="pages">
                                                    <input type="text" name="url" class="form-control" required="" value="<?=((!empty($page_data) && ($page_data['url'] != ''))? $page_data['url'] : '' ) ?>">
                                                    <?php echo form_error('url', '<div class="error">', '</div>'); ?>
                                                </div>
                                                
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 control-label text-sm-right pt-2"> </label>
                                                <div class="col-sm-5">
                                                    <div class="custom-file">
                                                        <input type="submit" class="btn btn-primary" Placeholder="Submit">

                                                  </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-body">
                                        <h4>View details</h4>
                                        <table class="table table-bordered table-striped mb-0" id="Trailupload">
                                            <thead>
                                                <tr>
                                                    <th>Sno</th>
                                                    <th>Page Type</th>
                                                    <th>Course</th>
                                                    <th>Video URL</th>
                                                    <th>Video</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i=0;
                                                $videos=$this->crud_model->get_videos_info();
                                                foreach ($videos as $row) {
                                                    ?>
                                                <tr>
                                                    <td><?=$i+1;;?></td>
                                                    <td><?=$row['page_name'];?></td>
                                                    <td><?=$this->crud_model->get_single_course_info($row['course_id'])['course'];?></td>
                                                    <td><?=$row['url'];?></td>
                                                    <td><iframe src="<?=$row['url'];?>"></iframe></td>
                                                    <td>
                                                        <a href="<?=base_url('videos?video_type=pages&video_id=').$row['id'];?>" class=" mr-2  text-primary">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                        <a href="#" class="mr-2  text-danger" onclick="return delete_row('<?=base_url('set_row_status/').'videos/id/'.$row['id'].'/0';?>');">
                                                            <i class="far fa-trash-alt"></i>
                                                        </a>
                                                        <!-- <a href="<?=base_url('set_row_status/').'id/'.$row['id'].'/videos';?>" class="mr-2  text-danger ">
                                                            <i class="far fa-trash-alt"></i>
                                                        </a> -->
                                                    </td>
                                                </tr>
                                            <?php $i++;}?>
                                            </tbody>
                                        </table>
                                    </div>
                                </section>
                            </div>
                        </div>



                        <div class="row">
                        <div class="col">
                                <section class="card">
                                    <div class="card-header">
                                        <form method="post" action="<?=base_url('videos');?>" enctype="multipart/form-data" novalidate="novalidate" class="form-horizontal" id="form">
                                            <div class="form-group row">
                                                <label class="col-sm-4 control-label text-sm-right pt-2">Video URL: </label>
                                                <div class="col-sm-5">
                                                    <input type="hidden" name="video_type" value="students">
                                                    <input type="text" name="students_url" class="form-control" required="" value="<?=((!empty($student_data) && ($student_data['url'] != ''))? $student_data['url'] : '' ) ?>">
                                                    <?php echo form_error('students_url', '<div class="error">', '</div>'); ?>
                                                </div>
                                                
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 control-label text-sm-right pt-2"> </label>
                                                <div class="col-sm-5">
                                                    <div class="custom-file">
                                                        <input type="submit" class="btn btn-primary" Placeholder="Submit">

                                                  </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-body">
                                        <h4>View details</h4>
                                        <table class="table table-bordered table-striped mb-0" id="Trailupload">
                                            <thead>
                                                <tr>
                                                    <th>Sno</th>
                                                    <th>Video URL</th>
                                                    <th>Video</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i=0;
                                                $videos=$this->crud_model->select_results_info('student_videos',array('row_status'=>1))->result_array();
                                                foreach ($videos as $row) {
                                                    ?>
                                                <tr>
                                                    <td><?=$i+1;;?></td>
                                                    <td><?=$row['url'];?></td>
                                                    <td><iframe src="<?=$row['url'];?>"></iframe></td>
                                                    <td>
                                                        <a href="<?=base_url('videos?video_type=students&video_id=').$row['id'];?>" class=" mr-2  text-primary">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                        <a href="#" class="mr-2  text-danger" onclick="return delete_row('<?=base_url('set_row_status/').'student_videos/id/'.$row['id'].'/0';?>');">
                                                            <i class="far fa-trash-alt"></i>
                                                        </a>
                                                        <!-- <a href="<?=base_url('set_row_status/').'id/'.$row['id'].'/videos';?>" class="mr-2  text-danger ">
                                                            <i class="far fa-trash-alt"></i>
                                                        </a> -->
                                                    </td>
                                                </tr>
                                            <?php $i++;}?>
                                            </tbody>
                                        </table>
                                    </div>
                                </section>
                            </div>
                        </div>