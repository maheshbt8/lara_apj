<?php
if($edit_data!=''){
    $my_urls=explode(':@',$edit_data['url']);
    $my_instructions=explode(':@',$edit_data['instructions']);
    $form_url='traildashboard/'.base64_encode($edit_data['id']);
}else{
    $this->session->set_userdata('last_page',current_url());
    $form_url='traildashboard';
}
?>
  <!--Trail Dashboard-->
                    <div class="row">
                        <div class="col">
                                <section class="card">
                                    <div class="card-body">
                                            <form method="post" action="<?=base_url().$form_url;?>"enctype="multipart/form-data" novalidate="novalidate" class="form-horizontal" id="form">
                                                <div class="form-group row">
                                                    <label class="col-sm-2 control-label text-sm-left pt-2">Select Type: </label>
                                                    <div class="col-sm-4">
                                                        <select class="form-control w100" onchange="get_plan_options(this.value);" required="" name="course">
                                                        <option value="">---Select Type---</option>
            <?php 
            $course=$this->crud_model->get_active_courses();
foreach ($course as $row) {
                                                            ?>
                                <option value="<?=$row['id'];?>" <?php if($edit_data['course'] == $row['id']){echo "selected";}?>><?=$row['course'];?></option>
                            <?php }?>
                                                    </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-6">
                                                        <label class="col-sm-12 control-label text-sm-left pt-2">Videos:  </label>
                                                        <div class="col-sm-12 from-group">
                                                            <input type="text" name="url[]" class="form-control mb-2" placeholder="video1" required="" value="<?=$my_urls['0'];?>">
                                                            <input type="text" name="url[]" class="form-control mb-2" placeholder="video2" value="<?=$my_urls['1'];?>">
                                                            <input type="text" name="url[]" class="form-control mb-2" placeholder="video3" value="<?=$my_urls['2'];?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="col-sm-12 control-label text-sm-left pt-2">Instructions:  </label>
                                                        <div class="col-sm-12 from-group">
                                                            <input type="text" name="instructions[]" class="form-control mb-2" placeholder="Instruction1" required="" value="<?=$my_instructions['0'];?>">
                                                            <input type="text" name="instructions[]" class="form-control mb-2" placeholder="Instruction2" value="<?=$my_instructions['1'];?>">
                                                            <input type="text" name="instructions[]" class="form-control mb-2" placeholder="Instruction3" value="<?=$my_instructions['2'];?>">
                                                            <input type="text" name="instructions[]" class="form-control mb-2" placeholder="Instruction4" value="<?=$my_instructions['3'];?>">
                                                            <input type="text" name="instructions[]" class="form-control mb-2" placeholder="Instruction5" value="<?=$my_instructions['4'];?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label class="col-sm-5 control-label text-sm-right pt-2"> </label>
                                                    <div class="col-sm-7">
                                                        <div class="custom-file">
                                                            <input type="submit" class="btn btn-primary" Placeholder="Submit">
                                                            
                                                      </div>
                                                    </div>
                                                </div>
                                                
                                            </form>
                                        </div>
                                    
                                    <div class="card-body">
                                        <table class="table table-bordered table-striped mb-0" id="trail-dashboard">
                                            <thead>
                                                <tr>
                                                    <th>Type</th>
                                                    <th>Videos</th>
                                                    <th>Instructions</th>
                                                    <th>Actions</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $dashboard=$this->crud_model->get_traildashboard_info();
                                                foreach ($dashboard as $row) {
                                                    $urls=explode(':@',$row['url']);
                                        $instructions=explode(':@',$row['instructions']);
                                        $course=$this->crud_model->get_single_course_info($row['course']);
                                                ?>
                                                <tr>
                                                    <td><?=$course['course'];?></td>
                                                    <td><?php
                                                    for($i1=0;$i1<count($urls);$i1++) {
                                                        echo ($i1+1).'.'.' '.$urls[$i1].'<br/>';
                                                        }
                                                    ?></td>
                                                    <td><?php
                                                    for($i1=0;$i1<count($instructions);$i1++) {
                                                        echo ($i1+1).'.'.' '.$instructions[$i1].'<br/>';
                                                        }
                                                    ?>
                                                    </td>
                                                    
                                                    <td>
                                                        <a href="<?=base_url('traildashboard/').base64_encode($row['id']);?>" class=" mr-2  text-primary">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                        <a href="<?=base_url('common_delete_details/').'id/'.$row['id'].'/trail_dashboard';?>" class="mr-2  text-danger ">
                                                            <i class="far fa-trash-alt"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php }?>
                                            </tbody>
                                        </table>
                                    </div>
                                </section>
                            </div>
                        </div>