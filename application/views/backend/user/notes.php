 <!--User notes page-->

  <!--Notes page content--> 
                    <div class="row">
                        <div class="col">
                                <section class="card">
                                    
                                    <div class="card-body">
                                        <table class="table table-bordered table-striped mb-0" id="notes">
                                            <thead>
                                                <tr>
                                                    <th>Sno</th>
                                                    <th>Course</th>
                                                    <th>Subject</th>
                                                    <th>Tittle</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
<?php
$i=0;foreach ($notes as $row) {
                                                ?>
                                                <tr>
                                                    <td><?=$i+1;?></td>
                                                    <td><?=$row['course'];?></td>
                                                    <td><?=$row['subject'];?></td>
                                                    <td><?=$row['title'];?></td>
                                                    <td>
                                                        <a href="<?=base_url('notes_view/').$row['id'];?>" class="mr-2  text-success" target="_blank">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <a class="btn btn-sm btn-info" href="<?=base_url('notes_view/').$row['id'];?>" class="alink" download="<?=$row['course'].$row['subject'].$row['title'].'.pdf';?>">Download</a>
                                                        <!-- <a href="#" class=" mr-2  text-primary">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a> -->
                                                        <!-- <a href="#" class="mr-2  text-danger" onclick="return delete_row('<?=base_url('set_row_status/').'notes/id/'.$row['id'].'/0';?>');">
                                                            <i class="far fa-trash-alt"></i>
                                                        </a> -->
                                                    </td>
                                                </tr>
                                            <?php }?>
                                            </tbody>
                                        </table>
                                    </div>
                                </section>
                            </div>
                        </div>