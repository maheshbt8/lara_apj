 <?php
$this->session->set_userdata('last_page',current_url());
 ?>
 <div class="row">
                                <div class="col">
                                    <section class="card">
                                    
                                        <div class="card-body">
                                            <table class="table table-bordered table-striped mb-0" id="trial-users">
                                                <thead>
                                                    <tr>
                                                        <th>Sno</th>
                                                        <th>User ID</th>
                                                        <th>Name</th>
                                                        <th>Email ID</th>
                                                        <th >PhoneNo</th>
                                                        <th >Type</th>
                                                        <!-- <th >User ID</th>
                                                        <th >Password</th> -->
                                                        <th >ICAI No</th>
                                                        <th >Create Date</th>
                                                        <th >Actions</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                       <?php
                                                $i=1;
                                                foreach ($trailuser_data as $row) {
                                                    
                                                ?>
                                                <tr>
                                                    <td><?=$i?></td>
                                                    <td><?=$row['unique_id'];?></td>
                                                    <td><?=$row['first_name'];?></td>
                                                    <td><?=$row['email'];?></td>
                                                    <td><?=$row['mobile'];?></td>
                                                    <td><?=$this->crud_model->get_single_course_info($row['exam_type'])['course'];?></td>
                                                    <!-- <td>123456</td>
                                                    <td>password</td> -->
                                                    <td><?=$row['icai_reg_no'];?></td>
                                                    <td><?=$row['created_at'];?></td>
                                                    <td>
                                                        <a href="#" class="mr-2  text-success" onclick="return showAjaxModal('<?=base_url('admin/view_user/trail/').$row['id'];?>');">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <a href="#" class="mr-2  text-danger" onclick="return delete_row('<?=base_url('set_row_status/').'users/id/'.$row['id'].'/0';?>');">
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