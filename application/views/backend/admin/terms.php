                        <?php
                        $this->session->set_userdata('last_page',current_url());
                        ?>
                        <div class="row">
                            <div class="col">
                                <section class="card">
                                    <header class="card-header">
                                        <div class="card-actions">
                                            <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                                            <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                                        </div>
                        
                                        <h2 class="card-title"><?=$page_title;?></h2>
                                    </header>
                                    <div class="card-body">
                                        <form class="form-horizontal form-bordered" action="<?=base_url().$type;?>" method="post">
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                <textarea type="text" class="form-control" name="message" value=""><?php echo $condition;?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label text-sm-right pt-2"> </label>
                                                <div class="col-sm-5">
                                                    <div class="custom-file">
                                                        <input type="submit" class="btn btn-primary" Placeholder="Submit" value="Submit">

                                                  </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </section>
                            </div>
                        </div>

                        
<script type="text/javascript" src="<?php echo base_url();?>/assets/vendor/ckeditor/ckeditor.js"></script> 


<script>
    CKEDITOR.replace( 'message' );
</script>