                    <div class="row">
                        <div class="col-md-6">
                            <form id="form" action="<?=base_url('admin/system_settings')?>" class="form-horizontal" novalidate="novalidate" method="post"> 
                                <section class="card">
                                    <header class="card-header">
                                        <div class="card-actions">
                                            <a href="#" class="card-action card-action-toggle" data-card-toggle=""></a>
                                            <a href="#" class="card-action card-action-dismiss" data-card-dismiss=""></a>
                                        </div>
                                        <h2 class="card-title">System Settings</h2>
                                    </header>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label class="col-sm-3 control-label text-sm-right pt-2">System Name <span class="required">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" name="system_name" class="form-control" placeholder="System Name" required="" value="<?=$this->db->get_where('settings', array('setting_type' => 'system_name'))->row()->description; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 control-label text-sm-right pt-2">System Title <span class="required">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" name="system_title" class="form-control" placeholder="System Title" required="" value="<?=$this->db->get_where('settings', array('setting_type' => 'system_title'))->row()->description; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 control-label text-sm-right pt-2">System Email <span class="required">*</span></label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <span class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-envelope"></i>
                                                        </span>
                                                    </span>
                                                    <input type="email" name="system_email" class="form-control" placeholder="eg.: email@email.com" required="" value="<?=$this->db->get_where('settings', array('setting_type' => 'system_email'))->row()->description; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 control-label text-sm-right pt-2">Email Password <span class="required">*</span></label>
                                            <div class="col-sm-9">
                                                <div class="input-group">
                                                    <span class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-key"></i>
                                                        </span>
                                                    </span>
                                                    <input type="password" name="email_password" class="form-control" placeholder="eg.: ******" required="" value="<?=$this->db->get_where('settings', array('setting_type' => 'email_password'))->row()->description; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 control-label text-sm-right pt-2">Mobile Number<span class="required">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" name="mobile" class="form-control" placeholder="Mobile Number" required="" value="<?=$this->db->get_where('settings', array('setting_type' => 'mobile'))->row()->description; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 control-label text-sm-right pt-2">WhatsApp Number<span class="required">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" name="whatsapp_number" class="form-control" placeholder="WhatsApp Number" required="" value="<?=$this->db->get_where('settings', array('setting_type' => 'whatsapp_number'))->row()->description; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 control-label text-sm-right pt-2">Address <span class="required">*</span></label>
                                            <div class="col-sm-9">
                                                <textarea name="address" rows="5" class="form-control" placeholder="Enter Address" required=""><?=$this->db->get_where('settings', array('setting_type' => 'address'))->row()->description; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                <label class="col-sm-3 control-label text-sm-right pt-2">Facebook Link</label>
                                            <div class="col-sm-9">
                                                <input type="url" name="fb" class="form-control" placeholder="eg.: https://facebook.com" value="<?=$this->db->get_where('settings', array('setting_type' => 'facebook'))->row()->description; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 control-label text-sm-right pt-2">Twiter Link</label>
                                            <div class="col-sm-9">
                                                <input type="url" name="twiter" class="form-control" placeholder="eg.: https://twiter.com" value="<?=$this->db->get_where('settings', array('setting_type' => 'twiter'))->row()->description; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 control-label text-sm-right pt-2">Youtube Link</label>
                                            <div class="col-sm-9">
                                                <input type="url" name="youtube" class="form-control" placeholder="eg.: https://youtube.com" value="<?=$this->db->get_where('settings', array('setting_type' => 'youtube'))->row()->description; ?>">
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
                         <div class="col-md-6">
                            <form id="form" method="post" action="<?=base_url('admin/system_settings')?>" class="form-horizontal" novalidate="novalidate">
                                <!-- <script type="text/javascript">
                                    (function($) {alert('1');

    'use strict';
                                    $('#position11').click(function() {alert('2');
                                    ev.preventDefault();alert('3');
        /*var validated = $('#position11').valid();
        if ( validated ) {*/
            new PNotify({
                title: 'Congratulations',
                text: 'You completed the wizard form.',
                type: 'custom',
                addclass: 'notification-success',
                icon: 'fas fa-check'
            });
        /*}*/
    });
                                }).apply(this, [jQuery]);

                                </script> -->
                                <section class="card">
                                    <header class="card-header">
                                        <div class="card-actions">
                                            <a href="#" class="card-action card-action-toggle" data-card-toggle=""></a>
                                            <a href="#" class="card-action card-action-dismiss" data-card-dismiss=""></a>
                                        </div>

                                        <h2 class="card-title">SMS Settings</h2>
                                    </header>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label class="col-sm-3 control-label text-sm-right pt-2">Username <span class="required">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" name="sms_username" class="form-control" placeholder="System Name" required="" value="<?=$this->db->get_where('settings', array('setting_type' => 'sms_username'))->row()->description; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 control-label text-sm-right pt-2">Sender <span class="required">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" name="sms_sender" class="form-control" placeholder="System Title" required="" value="<?=$this->db->get_where('settings', array('setting_type' => 'sms_sender'))->row()->description; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 control-label text-sm-right pt-2">Hash Key <span class="required">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" name="sms_hash" class="form-control" placeholder="System Title" required="" value="<?=$this->db->get_where('settings', array('setting_type' => 'sms_hash'))->row()->description; ?>">
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
                            <br/><br/>
                             <form id="form" method="post" action="<?=base_url('admin/system_settings')?>" class="form-horizontal" novalidate="novalidate">
                                <section class="card">
                                    <header class="card-header">
                                        <div class="card-actions">
                                            <a href="#" class="card-action card-action-toggle" data-card-toggle=""></a>
                                            <a href="#" class="card-action card-action-dismiss" data-card-dismiss=""></a>
                                        </div>

                                        <h2 class="card-title">Past Students Stat</h2>
                                    </header>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label class="col-sm-3 control-label text-sm-right pt-2">Students Opted Till date <span class="required">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" name="students_opted" class="form-control" placeholder="Students Opted Till date" required="" value="<?=$this->db->get_where('settings', array('setting_type' => 'students_opted'))->row()->description; ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, ',').replace(/(\..*)\./g, '$1');">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 control-label text-sm-right pt-2">Qualified Students <span class="required">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" name="qualified_students" class="form-control" placeholder="Qualified Students" required="" value="<?=$this->db->get_where('settings', array('setting_type' => 'qualified_students'))->row()->description; ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, ',').replace(/(\..*)\./g, '$1');">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 control-label text-sm-right pt-2">5 Star rated <span class="required">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" name="5_star_rated" class="form-control" placeholder="5 Star rated" required="" value="<?=$this->db->get_where('settings', array('setting_type' => '5_star_rated'))->row()->description; ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, ',').replace(/(\..*)\./g, '$1');">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 control-label text-sm-right pt-2">Exemptions Scored <span class="required">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" name="exemptions_scored" class="form-control" placeholder="Exemptions Scored" required="" value="<?=$this->db->get_where('settings', array('setting_type' => 'exemptions_scored'))->row()->description; ?>"  oninput="this.value = this.value.replace(/[^0-9.]/g, ',').replace(/(\..*)\./g, '$1');">
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