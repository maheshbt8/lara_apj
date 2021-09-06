

                    <div class="row">
                        <div class="col-md-12">
                            <form id="form" action="<?=base_url('change_password')?>" class="form-horizontal" novalidate="novalidate" method="post"> 
                                <section class="card">
                                    <header class="card-header">
                                        <div class="card-actions">
                                            <a href="#" class="card-action card-action-toggle" data-card-toggle=""></a>
                                            <a href="#" class="card-action card-action-dismiss" data-card-dismiss=""></a>
                                        </div>
                                        <h2 class="card-title">Change Password</h2>
                                    </header>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label class="col-sm-3 control-label text-sm-right pt-2">Old Password <span class="required">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="password" name="old_password" class="form-control" placeholder="Old Password" required="" value="">
                                                <?php echo form_error('old_password', '<div class="error">', '</div>'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 control-label text-sm-right pt-2">Password <span class="required">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="password" name="password" class="form-control" placeholder="Password" required="" value="">
                                                <?php echo form_error('password', '<div class="error">', '</div>'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 control-label text-sm-right pt-2">Password Confirm <span class="required">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="password" name="passconf" class="form-control" placeholder="Password Confirm" required="" value="">
                                                <?php echo form_error('passconf', '<div class="error">', '</div>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <footer class="card-footer">
                                        <div class="row justify-content-end">
                                            <div class="col-sm-9">
                                                <button class="btn btn-primary">Submit</button>
                                                <button type="reset" class="btn btn-default">Reset</button>
                                            </div>
                                        </div>
                                    </footer>
                                </section>
                            </form>
                        </div>
                         
                    </div>