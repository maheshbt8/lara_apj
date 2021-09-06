<!--Trail Download-->
                    <div class="row">
                        <div class="col">
                                <section class="card">
                                    
                                    <div class="card-body">
                                        <table class="table table-bordered table-striped mb-0" id="trail-download">
                                            <thead>
                                                <tr>
                                                    <th>Sno.</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Mobile</th>
                                                    <th>Course</th>
                                                    <th>Test</th>
                                                    <th>Marks</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                 <?php
                                        $e_brochers=$this->crud_model->select_results_info('mcq_results',array('row_status'=>1),"`id` DESC")->result_array();
                                        $i=0;
                                        foreach ($e_brochers as $row) {
                                            $mc=$this->crud_model->select_results_info('mcq_type',array('id'=>$row['type_id']))->row_array();
                                                ?>
                                                <tr>
                                                    <td><?=$i+1;?></td>
                                                    <td><?=$row['name'];?></td>
                                                    <td><?=$row['email'];?></td>
                                                    <td><?=$row['mobile'];?></td>
                                                    <td><?=$mc['course'];?></td>
                                                    <td><?=$mc['test'];?></td>
                                                    <td><?=$row['scored'].'/'.$row['total'];?></td>
                                                    <td>
                                                        <a href="<?=base_url('mcq_view/').$mc['id'];?>" class="mr-2  text-success" target="_blank">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <a href="#" class="mr-2  text-danger" onclick="return delete_row('<?=base_url('set_row_status/').'mcq_type/id/'.$row['id'].'/0';?>');">
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