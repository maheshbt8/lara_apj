  <!--Request Call Back-->
                    <div class="row">
                        <div class="col">
                                <section class="card">
                                    <div class="card-header">
                                            <form class="form-inline">
                                                <div class="col-lg-5 ">
                                                    <div class="input-group">
														<span class="input-group-prepend">
															<span class="input-group-text">
																<i class="fas fa-calendar-alt"></i>
															</span>
														</span>
														<input type="text" data-plugin-datepicker="" class="form-control" placeholder="---Select date---">
													</div>
                                                </div>
                                                <div class="col-lg-5 form-group">
                                                    <select class="form-control w100">
                                                        <option value="0">---Select status---</option>
                                                        <option value="">Option 1</option>
                                                        <option value="">Option 2</option>
                                                        <option value="">Option 3</option>
                                                    </select>
                                                </div>

                                                <div class="col-lg-2 form-group">
                                                    <button type="submit" class="btn btn-primary w100">Search</button>
                                                </div>
                                            </form>
                                        </div>
                                    <div class="card-body">
                                        <table class="table table-bordered table-striped mb-0" id="viewrequests">
                                            <thead>
                                                <tr>
                                                    <th>SNo</th>
                                                    <th>Date / Time</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Reason</th>
                                                    <th>Yes / No</th>
                                                    <th>Actions</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                $request=$this->crud_model->get_requestcallback_info();
                                $i=0;
                                foreach ($request as $row) {
                                                ?>
                                                <tr>
                                                    <td><?=$i+1;?></td>
                                                    <td><?=date('d m Y,h:i A',strtotime($row['created_at']));?></td>
                                                    <td><?=$row['name'];?></td>
                                                    <td><?=$row['email'];?></td>
                                                    <td><?=$row['mobile'];?></td>
                                                    <td><?=$row['reason'];?></td>
                                                    <td>
                                                        <div class="switch switch-sm switch-success">
                                                                <input type="checkbox" name="switch" data-plugin-ios-switch checked="checked" />
                                                           </div>
                                                    </td>
                                                    
                                                    <td>
                                                        <a href="#" class=" mr-2  text-primary">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                        <a href="#" class="mr-2  text-danger ">
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