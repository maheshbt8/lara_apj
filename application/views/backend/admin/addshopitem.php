 <!--add books here-->
                    <div class="row">
                        <div class="col">
                                <section class="card">
                                    <div class="card-header">
                                        <a href="<?=base_url('add_book')?>" class="btn buttons-print btn-default text-sm-right pt-2" ><b>+ Add Book</b></a>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered table-striped mb-0" id="addbookshere">
                                            <thead>
                                                <tr>
                                                    <th>SNo</th>
                                                    <th>Image</th>
                                                    <th>Name</th>
                                                    <th>Author</th>
                                                    <th>No.of pages</th>
                                                    <th>Actual Price</th>
                                                     <th>Discount Price</th>
                                                     <th>Type</th>
                                                     <th>Book Copy</th>
                                                     <th>Actions</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                        $shop=$this->crud_model->get_shopbooks_info();
                                        $i=0;
                                        foreach ($shop as $row) {
                                                ?>
                                                <tr>
                                                    <td><?=$i+1;?></td>
                                                    <td><?=$row['id'].'jpg';?></td>
                                                    <td><?=$row['name'];?></td>
                                                    <td><?=$row['author'];?></td>
                                                    <td><?=$row['pages'];?></td>
                                                    <td><?=$row['actual_price'];?></td>
                                                    <td><?=$row['discount_price'];?></td>
                                                    <td><?=$row['type'];?></td>
                                                    <td><?=$row['name'].'pdf';?></td>
                                                    <td>
                                                        <a href="#" class="mr-2  text-danger" onclick="return delete_row('<?=base_url('set_row_status/').'shopbooks/id/'.$row['id'].'/0';?>');">
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
                    