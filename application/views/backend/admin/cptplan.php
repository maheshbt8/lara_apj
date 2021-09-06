<?php
$this->session->set_userdata('last_page',current_url());
?>
<!--cptplans-->
                    <div class="row">
                        <div class="col">
                                <section class="card">
                                     <div class="card-header">
                                        <a href="<?=base_url('plan_add/').$plan_id;?>" class="btn buttons-print btn-default text-sm-right pt-2" ><b>+ Add New Plan</b></a>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered table-striped mb-0" id="cptplans">
                                            <thead>
                                                <tr>
                                                    <th>SNo</th>
                                                    <th>Subject Name</th>
                                                    <th>Plan Name</th>
                                                    <th>Actual Price</th>
                                                    <th>Discount Price</th>
                                                    <th>Description</th>
                                                    <th>Actions</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i=0;
                                                foreach ($plans as $row) {
                                                ?>
                                                <tr>
                                                    <td><?=$i+1;?></td>
                                                    <td><?=$row['subject_name'];?></td>
                                                    <td><?=$this->crud_model->get_single_plan_info($row['plan_id'])['plan'];?></td>
                                                    <td><?=$row['actual_price'];?></td>
                                                    <td><?=$row['discount_price'];?></td>
                                                    <td><?php
                                                    $dec=explode(':@',$row['description']);
                                                    for($d=0;$d<count($dec);$d++){
                                                        if($dec[$d]!=''){
                                                        echo $dec[$d].'<br/>';
                                                        }
                                                    }
                                                    ?></td>
                                                    
                                                    
                                                    <td>
                                                       <a href="<?=base_url('edit_plan/').base64_encode($row['id']);?>" class=" mr-2  text-primary">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                        <a href="#" class="mr-2  text-danger" onclick="return delete_row('<?=base_url('set_row_status/').'packages/id/'.$row['id'].'/0';?>');">
                                                            <i class="far fa-trash-alt"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php  $i++;}?>
                                            </tbody>
                                        </table>
                                    </div>
                                </section>
                            </div>
                        </div>
                    