<!-- start: page -->
                        <section class="card">
                            <header class="card-header">
                                <div class="card-actions">
                                    <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                                 
                                </div>
                                <form  method="post" action="<?=base_url('guidelines');?>" enctype="multipart/form-data" novalidate="novalidate" id="form" class="">
                                <div class="form-group row">
                                    <label class="col-sm-2 control-label text-sm-right pt-2">guidelines PDF: </label>
                                    <div class="col-sm-8">
                                        <div class="custom-file">
                                            <input type="file" class="form-control custom-file-input" id="upload_guidelines" name="guidelines" required="">
                                            <label class="custom-file-label" for="upload_guidelines">Choose file</label>
                                        </div>
                                        <?php 
            if($this->session->flashdata('guidelines_error')!=''){
                echo '<div class="error">'.$this->session->flashdata('guidelines_error').'</div>';
            }
            ?>
                                    </div>
                                    <div class="col-sm-1">
                                        <div class="custom-file">
                                            <input type="submit" class="btn btn-primary" Placeholder="Update">
                                        </div>
                                    </div>
                                </div>
                        </form>
                               <!-- <h2 class="card-title">Guidelines</h2>-->
                            </header>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        
                                    </div>
                                    <div class="col-md-12 mb-3">
                                                            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="<?=base_url('uploads/main/guidelines.pdf');?>"></iframe>
                                                            </div>
                                                        </div>
                                </div>
                                
                            </div>
                        </section>
                    <!-- end: page -->



