 <!--User dashboard-->
                    <div class="row">
                        <div class="col">
                           
                            
                                <section class="card">
                                    
                                    <div class="card-body">
                                        <table class="table table-bordered table-striped mb-0 user_datatable" id="">
                                            <thead>
                                                <tr>
                                                    <th>S.No.</th>
                                                    <th>Plan</th>
                                                    <th>Subject</th>
                                                    <th>Code</th>
                                                    <th>Total Marks</th>
                                                    <th>Marks obtained</th>
                                                    <th>Evaluated Answers</th>

                                                </tr>
                                            </thead>
                                            <tbody>
												<?php $count = 1; foreach ($results as $r):?>
                                                <tr>
                                                    <td><?php echo $count++;?></td>
                                                    <td>Trail</td>
                                                    <td><?php echo $r['subject'];?></td>
                                                    <td><?php echo $r['exam'];?></td>
                                                    <td><?php echo $r['out_of'];?></td>
                                                    <td><?php echo $r['marks'];?></td>
                                                    
                                                    <td>
                                                        <a href="" class="btn buttons-print btn-default text-sm-right pt-2" >Download</a>
                                                    </td>
                                                </tr>
												<?php endforeach;?>
                                            </tbody>
                                        </table>                                      

                                    </div>
                                </section>
                              
                            </div>
                        </div>