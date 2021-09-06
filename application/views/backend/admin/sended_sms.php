<?php
$this->session->set_userdata('last_page',current_url());
 ?>
<section class="content-with-menu mailbox">
                        <div class="content-with-menu-container" data-mailbox="" data-mailbox-view="folder">
                            <div class="inner-body mailbox-folder">
                                <!-- START: .mailbox-header -->
                                <header class="mailbox-header">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h1 class="mailbox-title font-weight-light m-0">
                                                <a id="mailboxToggleSidebar" class="sidebar-toggle-btn trigger-toggle-sidebar">
                                                    <span class="line"></span>
                                                    <span class="line"></span>
                                                    <span class="line"></span>
                                                    <span class="line line-angle1"></span>
                                                    <span class="line line-angle2"></span>
                                                </a>
                            
                                                Sent SMS
                                            </h1>
                                        </div>
                                        <div class="col-md-6">
                                            <!-- <div class="search">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="q" id="q" placeholder="Search...">
                                                    <span class="input-group-append">
                                                        <button class="btn btn-default" type="submit"><i class="fas fa-search"></i></button>
                                                    </span>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                </header>
                                <!-- END: .mailbox-header -->
                            
                                <!-- START: .mailbox-actions -->
                                <div class="mailbox-actions">
                                    <ul class="list-unstyled m-0 pt-3 pb-3">
                                        <!-- <li class="ib mr-2">
                                            <div class="btn-group">
                                                <a href="#" class="item-action fas fa-chevron-down" data-toggle="dropdown"></a>
                            
                                                <ul class="dropdown-menu" role="menu">
                                                    <li class="dropdown-item"><a class="dropdown-link" href="#">All</a></li>
                                                    <li class="dropdown-item"><a class="dropdown-link" href="#">None</a></li>
                                                    <li class="dropdown-item"><a class="dropdown-link" href="#">Read</a></li>
                                                    <li class="dropdown-item"><a class="dropdown-link" href="#">Unread</a></li>
                                                    <li class="dropdown-item"><a class="dropdown-link" href="#">Starred</a></li>
                                                    <li class="dropdown-item"><a class="dropdown-link" href="#">Unstarred</a></li>
                                                </ul>
                                            </div>
                                        </li> -->
                                        <!-- <li class="ib mr-2">
                                        <div class="checkbox-custom checkbox-text-primary ib">
                                        <input type="checkbox" id="all_sms"  onChange="check_all_sms()">
                                        <label for="mail1"></label>
                                        </div>
                                        </li> -->
                                        <!-- <li class="ib mr-2">
                                            <a class="item-action fas fa-tag" href="#"></a>
                                        </li> -->
                                        <li class="ib">
                                            <a class="text-primary" href="<?=base_url('sms')?>"><i class="fa fa-plus fa-2x"> Compose</i></a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- END: .mailbox-actions -->
                            
                                <div id="mailbox-email-list" class="mailbox-email-list">
                                    <div class="nano has-scrollbar">
                                        <div class="nano-content" tabindex="0" style="right: -17px;">
                <ul id="my_ajax_sms" class="list-unstyled">
                    <?php
$where="row_status = 1";
$sms=array_reverse($this->crud_model->select_results_info('sms',$where)->result_array());
        $l=0;foreach ($sms as $row) {
      $url="'".base_url('set_row_status/sms/id/').$row['id']."/0'";

echo '<li class="unread">
                    <a href="mailbox-email.html">
                            <div class="col-sender">
                                <div class="">
                                    <a onclick="return delete_row('.$url.')" class="text-danger ">
                                    <i class="far fa-trash-alt"></i>
                                    </a>
                                </div>
                                <p class="m-0 ib">'.$row['subject'].'</p>
                            </div>
                            <div class="col-mail">
                                <p class="m-0 mail-content">
                                    <span class="mail-partial">'.$row['sms'].'</span>
                                </p>
                                <p class="m-0 mail-date">'.$this->crud_model->time_elapsed_string($row['created_at']).'</p>

                            </div>
                        </a>
                    </li>';
               $l++; }?>
                                            </ul>
                                        </div>
                                    <div class="nano-pane" style="opacity: 1; visibility: visible;"><div class="nano-slider" style="height: 20px; transform: translate(0px, 0px);"></div></div></div>
                                </div>
                            </div>
                        </div>
                    </section>

<!-- <script type="text/javascript">

    function check_all_sms(){
    var status = $("#all_sms").attr("checked", status);
        $('.sms').each(function(){
            $(this).prop("checked", status[0].checked);
        });
    }
    function check_my_sms(id){
        var status = $("#sms"+id).attr("checked", status);
        if($('.sms').length == $('.sms:checked').length){
            $('#all_sms').prop("checked", true);
        } else{
            $('#all_sms').prop("checked", false);
        }
    }
</script> -->