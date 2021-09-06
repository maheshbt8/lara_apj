<!--managepromocodes-->
                    <div class="row">
                        <div class="col">
                                <section class="card">
                                    
                                    <div class="card-body">
                                        <table class="table table-bordered table-striped mb-0" id="managepromocodes">
                                            <thead>
                                                <tr>
                                                    <th>SNo</th>
                                                    <th>Promo Name</th>
                                                    <th>Promo Code</th>
                                                    <th>User id</th>
                                                    <th>Name</th>
                                                    <th>Phone</th>
                                                    <th>Disc Amount</th>
                                                    <th>Date / Time</th>
                                                    

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $pro=$this->crud_model->select_results_info('promo_discount',array('row_status'=>1),'`id` DESC')->result_array();
                                                $i=1;foreach ($pro as $pro) {
                                                    $p=$this->crud_model->select_results_info('promocodes',array('id'=>$pro['promo_id']))->row_array();
                                                    $u=$this->crud_model->select_results_info('users',array('id'=>$pro['user_id']))->row_array();
                                                ?>
                                                <tr>
                                                    <td><?=$i;?></td>
                                                    <td><?=$p['name']?></td>
                                                    <td><?=$p['code']?></td>
                                                    <td><?=$u['unique_id']?></td>
                                                    <td><?=$u['first_name']?></td>
                                                    <td><?=$u['mobile']?></td>
                                                    <td><?=$pro['discount']?></td>
                                                    <td><?=$pro['created_at']?></td>
                                                </tr>
                                            <?php $i++;}?>
                                            </tbody>
                                        </table>
                                    </div>
                                </section>
                            </div>
                        </div>