 <!--addplans-->
                    <div class="row">
                        <div class="col">
                                <section class="card">
                                    <div class="card-header">
                                        <a href="<?=base_url('addplan_plans');?>" class="btn buttons-print btn-default text-sm-right pt-2" ><b>+ Add New Plan</b></a>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered table-striped mb-0" id="addplans">
                                            <thead>
                                                <tr>
                                                    <th>SNo</th>
                                                    <th>Course</th>
                                                    <th>Plan</th>
                                                    <th>Plan Code</th>
                                                    <th>HeaderBox</th>
                                                    <th>Description</th>
                                                    
                                                     <th>Actions</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
$plans=$this->crud_model->get_all_plans();
$i=0;foreach ($plans as $row) {
    $course=$this->crud_model->get_single_course_info($row['course_id']);
                                                ?>
                                                <tr>
                                                    <td><?=$i+1;?></td>
                                                    <td><?=$course['course']?></td>
                                                    <td><?=$row['plan']?></td>
                                                    <td><?=$row['plan_code']?></td>
                                                    <td><?=$row['headerbox']?></td>
                                                    <td><?php
                                                    $dec=explode(':@',$row['description']);
                                                    for($d=0;$d<count($dec);$d++){
                                                        if($dec[$d]!=''){
                                                        echo $dec[$d].'<br/>';
                                                        }
                                                    }
                                                    ?>
                                                    </td>
                                                    <td>
                                                       <a href="<?=base_url('edit_plans/').base64_encode($row['id']);?>" class=" mr-2  text-primary">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                        <a href="#" class="mr-2  text-danger" onclick="return delete_row('<?=base_url('set_row_status/').'plans/id/'.$row['id'].'/0';?>');">
                                                            <i class="far fa-trash-alt"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php $i++;}?>
                                            </tbody>
                                        </table>
                                    </div>
                                </section>
                            </div>
                        </div>
                    