 <!--Trailupload-->
 <?php
if($edit_data!=''){
    $title=$edit_data['title'];
    $description=$edit_data['description'];
    $form_url='blog/'.base64_encode($edit_data['id']);
}else{
    $this->session->set_userdata('last_page',current_url());
    $form_url='blog';
}
?>
                    <div class="row">
                        <div class="col">
                                <section class="card">
                                    <div class="card-header">
                                        <form method="post" action="<?=base_url().$form_url;?>" enctype="multipart/form-data" novalidate="novalidate" class="form-horizontal" id="form">
                                            <div class="form-group row">
                                                <label class="col-sm-2 control-label text-sm-right pt-2">Title: </label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="title" class="form-control" required="" value="<?=$title;?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 control-label text-sm-right pt-2">Description: </label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" rows="3" id="description" autocomplete="off" required="" name="description"><?=$description;?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 control-label text-sm-right pt-2">Blog-Image: </label>
                                                <div class="col-sm-10">
                                                    <div class="custom-file">
                                                        <input type="file" class="form-control custom-file-input" id="sapaper" name="blog" required="">
                                                        <label class="custom-file-label" for="sapaper">Choose file</label>
                                                  </div>
                                                  <?php 
                                if($this->session->flashdata('blog_error')!=''){echo '<div class="error">'.$this->session->flashdata('blog_error').'</div>';}?>
                                                </div>
                                                
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 control-label text-sm-right pt-2"> </label>
                                                <div class="col-sm-5">
                                                    <div class="custom-file">
                                                        <input type="submit" class="btn btn-primary" Placeholder="Submit">

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
                                                    <th>Sl.No</th>
                                                    <th>Question</th>
                                                    <th>Answer</th>
                                                    <th>Actions</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i=0;
                                                foreach ($blog as $row) {
                                                    ?>
                                                <tr>
                                                    <td><?=$i+1;?></td>
                                                    <td><?=$row['title'];?></td>
                                                    <td><?=$row['description'];?></td>
                                                    <td>
                                                       <a href="<?=base_url('blog/').base64_encode($row['id']);?>" class=" mr-2  text-primary">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                        <a href="#" class="mr-2  text-danger" onclick="return delete_row('<?=base_url('set_row_status/').'blog/id/'.$row['id'].'/0';?>');">
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

<script type="text/javascript" src="<?php echo base_url();?>/assets/vendor/ckeditor/ckeditor.js"></script> 


<script>
    CKEDITOR.replace( 'description' );
</script>