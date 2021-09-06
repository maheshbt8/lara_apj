<?php
$this->session->set_userdata('last_page',current_url());
?>
<!--Trail Download-->
                    <div class="row">
                        <div class="col">
                                <section class="card">
                                    <div class="card-header">
                                       <form  method="post" action="<?=base_url('e_brochers');?>"enctype="multipart/form-data" novalidate="novalidate" id="form" class="form-inline">
                                            <div class="col-lg-11">
                                                <div class="row">
                                                    <div class="col-lg-4 form-group">
                                                        <select class="form-control w100" required="" name="course">
                                                            <option value="">---Select Type---</option>

                                <option value="CPT">CPT</option>
                                <option value="IPCC">IPCC</option>
                                <option value="FINAL">FINAL</option>
                                <option value="CPT(NEW)">CPT(NEW)</option>
                                <option value="IPCC(NEW)">IPCC(NEW)</option>
                                <option value="FINAL(NEW)">FINAL(NEW)</option>
                                <option value="Pass Guarantee Inter">Pass Guarantee Inter</option>
                                <option value="Pass Guarantee IPCC">Pass Guarantee IPCC</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-4 form-group">
                                                        <!-- <input type="text" name="" class="form-control w100" Placeholder="Enter start time"> -->
                                                        <div class="custom-file">
                                                            <label class="custom-file-label" for="sapaper">Choose File</label>
                                                        <input type="file" class="form-control custom-file-input" id="sapaper" name="brocher" required="">
                                                        
                                                  </div>
                                                  <?php 
                                                            if($this->session->flashdata('brocher_error')!=''){echo '
                                                            <div class="error">'.$this->session->flashdata('brocher_error').'</div>';}?>
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
                                                    <th>Notes</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                 <?php
                                        $e_brochers=$this->crud_model->get_e_brochers_info();
                                        $i=0;
                                        foreach ($e_brochers as $row) {
                                                ?>
                                                <tr>
                                                    <td><?=$i+1;?></td>
                                                    <td><?=$row['course'];?></td>
                                                    <td><?=$row['file_name'];?></td>
                                                    <td>
                                                        <a href="#" class="mr-2  text-danger" onclick="return delete_row('<?=base_url('set_row_status/').'e_brochers/id/'.$row['id'].'/0';?>');">
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