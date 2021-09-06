  <!--Ceate Promo Codes-->
                    <div class="row">
                        <div class="col">
                                <section class="card">
                                    <div class="card-header">

                                        <div class="pull-right">
                                                <a href="<?=base_url('add_promocode');?>"><button type="button" class="btn btn-primary w100">Add New Promo</button></a>
                                            </div>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered table-striped mb-0" id="promocodes">
                                            <thead>
                                                <tr>
                                                    <th>SNo</th>
                                                    <th>Course</th>
                                                    <th>Plan</th>
                                                    <th>Name</th>
                                                    <th>Code</th>
                                                    <th>Discount</th>
                                                    <th>Valid From</th>
                                                    <th>Valid To</th>
                                                    <th>Actions</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                $promocodes=$this->crud_model->get_promocodes_info();
                $i=0;
                foreach ($promocodes as $row) {
                                                ?>
                                                <tr>
                                                    <td><?=$i+1;?></td>
                                                    <td><?=$this->crud_model->get_single_course_info($row['course_id'])['course'];?></td>
                                                    <td><?=$this->crud_model->get_single_plan_info($row['plan_id'])['plan'];?></td>
                                                    <td><?=$row['name'];?></td>
                                                    <td><?=$row['code'];?></td>
                                                    <td><?=$row['discount'];?></td>
                                                    <td><?=$row['valid_from'];?></td>
                                                    <td><?=$row['valid_to'];?></td>
                                                    <td>
                                                        <a href="<?=base_url('edit_promocode/').base64_encode($row['id']);?>" class=" mr-2  text-primary">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                        <a href="<?=base_url('common_delete_details/').'id/'.$row['id'].'/promocodes';?>" class="mr-2  text-danger ">
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