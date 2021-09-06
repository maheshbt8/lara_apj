                               <?php 
                 $this->session->set_userdata('last_page',current_url());
                 ?>
                 <?php
                 $date_search='';
                 $row_status_search='';
                 if(isset($_GET['date']) && !empty($_GET['date']))
                 {
                    $date_search=date('Y-m-d',strtotime($_GET['date']));
                 }
                 if(isset($_GET['row_status']) && !empty($_GET['row_status']))
                 {
                    if($_GET['row_status']=='Completed'){
                    $row_status_search=1;    
                    }elseif($_GET['row_status']=='Not-Completed'){
                        $row_status_search=2;
                    }
                    
                 }
                 ?>
                            <div class="row"> 
                                <div class="col">
                                    <section class="card">
                                        <div class="card-header">
                                             <form class="form-inline" method="get">
                                                <div class="col-lg-5 ">
                                                    <div class="input-group">
                                                        <span class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="fas fa-calendar-alt"></i>
                                                            </span>
                                                        </span>
                                                        <input type="text" data-plugin-datepicker="" class="form-control"  value="<?php if($date_search!=''){echo $_GET['date'];}?>" placeholder="---Select date---" name="date" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 form-group">
                                                    <select class="form-control w100" name="row_status">
                                                        <option value="">---Select status---</option>
                                                        <option value="Completed" <?php if($row_status_search==1){echo "selected";}?>>Completed</option>
                                                        <option value="Not-Completed" <?php if($row_status_search==2){echo "selected";}?>>Not-Completed</option>
                                                    </select>
                                                </div>

                                                <div class="col-lg-2 form-group">
                                                    <button type="submit" class="btn btn-primary">Search</button>
                                                </div>
                                            </form>
                                        </div>
                                        
                                        <div class="card-body">
                                            <table class="table table-bordered table-striped mb-0" id="feeling-formal">
                                                <thead>
                                                    <tr>
                                                        <th>Sno</th>
                                                        <th>Date/Time</th>
                                                        <th>Name</th>
                                                        <th>Email ID</th>
                                                        <th>Mobile Number</th>
                                                        <th>Description</th>
                                                        <th >Yes/No</th>
                                                        <th >Actions</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $feeling=$this->crud_model->get_feeling_formal_info();
                                                    $i=0;foreach ($feeling as $row) {
                                                    ?>
                                                    <tr>
                                                        <td><?=$i+1;?></td>
                                                        <td><?=date('M d,Y h:i A',strtotime($row['created_at']));?></td>
                                                        <td><?=ucwords($row['name']);?></td>
                                                        <td><?=$row['email']?></td>
                                                        <td><?=$row['mobile']?></td>
                                                        <td><?=$row['message']?></td>
                                                        <td>
                                                             <div class="switch switch-sm switch-success">
                                                               <?php if($row['row_status']==1){
                        ?><button  onclick="return set_row_status('<?=base_url('set_row_status/').'feeling_formal/id/'.$row['id'].'/2';?>');" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i></button>
                        <?php
                    }elseif($row['row_status']==2){?>
                        <button  onclick="return set_row_status('<?=base_url('set_row_status/').'feeling_formal/id/'.$row['id'].'/1';?>');" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></button>
                        <?php
                    }
                        ?>
                                                           </div>
                                                        </td>
                                                        <td>
                                                           <a href="#" class="mr-2  text-danger" onclick="return delete_row('<?=base_url('set_row_status/').'feeling_formal/id/'.$row['id'].'/0';?>');">
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