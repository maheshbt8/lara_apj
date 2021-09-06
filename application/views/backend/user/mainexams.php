 <!--Trailupload-->
                    <div class="row">
                        <div class="col">
                                <section class="card">
                                  
                                    <div class="card-body">
                                        <h4>View details</h4>
                                        <table class="table table-bordered table-striped mb-0" id="Trailupload">
                                            <thead>
                                                <tr>
                                                    <th>Exam Type</th>
                                                    <th>Exam</th>
                                                    <th>Subject</th>
                                                    <th>Upload date</th>
                                                    <th>Plan</th>
                                                    <th>Timer</th>
                                                    <th>Actions</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i=1;foreach ($mainexams as $row) {?>
                                                <tr>
                                                    <td><?=$row['course'];?></td>
                                                    <td><?=$row['subject_code'];?></td>
                                                    <td><?=$row['subject'];?></td>
                                                    <td><?=$row['created_at'];?></td>
                                                    <td><?=$row['plan_type'];?></td>
                                                    <?php $downloads = $this->my_model->get_type_row_by_where('exam_downloads', 'exam_id', $row['id']);?>
                                                    <td>
                                                    	<?php if(!empty($downloads)){?>
                                                    		<div id="duration<?php echo $row['id']; ?>"></div>
                                                    	<?php }else{?>
                                                    	Not yet downloaded
                                                    	<?php }?>
                                                    </td>
                                                    <td>
                                                        
                                                       <?php if(!empty($downloads)){?>
                                                    		 <a href="<?php base_url();?>common/papers?id=<?php echo $downloads->id;?>" class=" mr-2  text-primary">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                        <?php }else{?>
                                                        	<?php if($row['plan_type'] === 'scheduled'){?>
                                                    			<div class="timer" id="timer<?php echo $row['id'];?>"></div>
                                                    			<a id="link<?php echo $row['id'];?>" href="<?=base_url('uploads/main/questions/'.$row['id'].'.pdf');?>" onclick="download_event(<?php echo $row['id'];?>, 1, 'exam_downloads')" class="btn btn-success" download="<?=$row['exam'];?>-<?=$row['subject'];?>-Question-paper"><?=$row['exam'];?>-<?=$row['subject'];?>-Question-paper.pdf</a>
                                                    		<?php }else{?>
                                                        		<a href="<?=base_url('uploads/main/questions/'.$row['id'].'.pdf');?>" onclick="download_event(<?php echo $row['id'];?>, 1, 'exam_downloads')" class="btn btn-success" download="<?=$row['exam'];?>-<?=$row['subject'];?>-Question-paper"><?=$row['exam'];?>-<?=$row['subject'];?>-Question-paper.pdf</a>
                                                        	<?php }?>
                                                        <?php }?>
                                                    </td>
                                                </tr>
                                            <?php }?>
                                            </tbody>
                                        </table>
                                    </div>
                                </section>
                            </div>
                        </div>