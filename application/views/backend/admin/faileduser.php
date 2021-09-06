  <?php
$this->session->set_userdata('last_page',current_url());
 ?>
 <div class="row">
                                <div class="col">
                                    <section class="card">

                                        <div class="card-body">
                                            <table class="table table-bordered table-striped mb-0" id="failed-users">
                                                <thead>
                                                    <tr>
                                                        <th>Sno</th>
                                                        <th>User ID</th>
                                                        <th>Name</th>
                                                        <th>Email ID</th>
                                                        <th>PhoneNo</th>
                                                        <!-- <th>Status</th> -->
                                                        <th>ICAI Reg No.</th>
                                                        <th>Plans</th>
                                                        <th>Change Status</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                $i=1;
                                                foreach ($faileduser_data as $row) {
                                                    
                                                ?>
                                                    <tr>
                                                        <td><?=$i?></td>
                                                        <td><?=$row['unique_id'];?></td>
                                                        <td><?=$row['first_name'];?></td>
                                                        <td><?=$row['email'];?></td>
                                                        <td><?=$row['mobile'];?></td>
                                                        <!-- <td><?=$row['row_status'];?></td> -->
                                                        <td><?=$row['icai_reg_no'];?></td>
                                                        <td>
                                                            <!-- <a href="#" class="mr-2 p-2 bg-primary text-white rounded">
                                                                <i class="fas fa-eye"></i>
                                                            </a> -->
                                                            <?php
$plans=$this->crud_model->select_results_info('users_plan_relation',array('user_id'=>$row['id']))->result_array();
                                                if(!empty($plans)){
                                                            ?>
                                                            <ul>
                                                        <?php
                                                        foreach ($plans as $p) {
                                                            $plan=$this->crud_model->get_type_name_by_where('plans','id',$p['plan_id'],'plan');
                                                            $package=$this->crud_model->get_type_name_by_where('packages','id',$p['package_id'],'subject_name');
                                                            
                                                            echo '<li>'.$plan .' - '. $package.'</li>';
                                                            
                                                        }
                                                        ?>
                                                    </ul>
                                                <?php }?>
                                                        </td>
                                                        <td>
                                                            <div class="switch switch-sm switch-success">
                          <button  onclick="return set_row_status('<?=base_url('set_row_status/').'users/id/'.$row['id'].'/1';?>');" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i>
                          </button>
                        
                                                           </div>
                                                        </td>

                                                    </tr>
                                                   <?php $i++;}?>
                                               </tbody>
                                            </table>
                                        </div>
                                    </section>
                                </div>
                            </div>