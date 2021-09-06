<!--Trail Download-->
                    <div class="row">
                        <div class="col">
                                <section class="card">
                                    <div class="card-header">
                                       <form  method="get" action="<?=base_url('add_mcq');?>"enctype="multipart/form-data" novalidate="novalidate" id="form" class="form-inline">
                                            <div class="col-lg-11">
                                                <div class="row">
                                                    <div class="col-lg-4 form-group">
                                                        <select class="form-control w100" id="course" required="" name="course">
                                                        <option value="">---Select Type---</option>
                                                        <option value="CPT">CPT</option>
                                                        <option value="IPCC">IPCC</option>
                                                        <option value="FINAL">FINAL</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-4 form-group">
                                                        <input type="number" name="questions" class="form-control w100" Placeholder="Enter No.of Question" required="">
                                                    </div>
                                                     <div class="col-lg-1">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                                </div>
                                            </div>
                                           
                                        </form>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered table-striped mb-0" id="trail-download">
                                            <thead>
                                                <tr>
                                                    <th>Sno.</th>
                                                    <th>Course</th>
                                                    <th>Test</th>
                                                    <th>No.of.Questions</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                 <?php
                                        $e_brochers=$this->crud_model->select_results_info('mcq_type',array('row_status'=>1))->result_array();
                                        $i=0;
                                        foreach ($e_brochers as $row) {
                                                ?>
                                                <tr>
                                                    <td><?=$i+1;?></td>
                                                    <td><?=$row['course'];?></td>
                                                    <td><?=$row['test'];?></td>
                                                    <td><?=$row['no_of_questions'];?></td>
                                                    <td>
                                                        <a href="<?=base_url('mcq_view/').$row['id'];?>" class="mr-2  text-success" target="_blank">
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