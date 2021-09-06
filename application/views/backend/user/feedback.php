<?php
$this->session->set_userdata('last_page',current_url());
 ?>
<div class="row">
                        <div class="col">
                                <section class="card">
                                    <div class="card-header">
                                        <form method="post" action="<?=base_url('u_feedback');?>" enctype="multipart/form-data" novalidate="novalidate" class="form-horizontal" id="form">
                                            <div class="form-group row">
                                            <label class="col-lg-2 control-label text-lg-right pt-2" for="message">Feedback</label>
                                            <div class="col-lg-10">
                                            <textarea class="form-control" rows="3" id="message" autocomplete="off" required="" name="message"></textarea>
                                            </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 control-label text-sm-right pt-2"> </label>
                                                <div class="col-sm-5">
                                                    <div class="custom-file">
                                                        <input type="submit" class="btn btn-primary" placeholder="Submit">

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
                                                    <th>Feedback</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i=0;
                                                $videos=array_reverse($this->crud_model->select_results_info('feedback',array('row_status !='=>0,'user_id'=>$this->session->userdata('login_id')))->result_array());
                                                foreach ($videos as $row) {
                                                    ?>
                                                <tr>
                                                    <td><?=$i+1;;?></td>
                                                    <td><?=$row['message'];?></td>
                                                </tr>
                                            <?php $i++;}?>
                                            </tbody>
                                        </table>
                                        
                                    </div>
                                </section>
                            </div>
                        </div>