<style type="text/css">
                body,html{
            /*height: 100%;*/
            margin: 0;
            background: #7F7FD5;
           background: -webkit-linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5);
            background: linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5);
        }

        .chat{
            margin-top: auto;
            margin-bottom: auto;
        }
        .card{
            height: 500px;
            border-radius: 15px !important;
            background-color: rgba(0,0,0,0.4) !important;
        }
        .contacts_body{
            padding:  0.75rem 0 !important;
            overflow-y: auto;
            white-space: nowrap;
        }
        .msg_card_body{
            overflow-y: auto;
        }
        .card-header{
            border-radius: 15px 15px 0 0 !important;
            border-bottom: 0 !important;
        }
     .card-footer{
        border-radius: 0 0 15px 15px !important;
            border-top: 0 !important;
    }
        .container{
            align-content: center;
        }
        .search{
            border-radius: 15px 0 0 15px !important;
            background-color: rgba(0,0,0,0.3) !important;
            border:0 !important;
            /*color:white !important;*/
        }
        .search:focus{
             box-shadow:none !important;
           outline:0px !important;
        }
        .type_msg{
            background-color: rgba(202, 202, 202, 0.3) !important;
            border:0 !important;
            /*color:white !important;*/
            height: 60px !important;
            overflow-y: auto;
        }
            .type_msg:focus{
             box-shadow:none !important;
           outline:0px !important;
        }
        .attach_btn{
    border-radius: 15px 0 0 15px !important;
    background-color: rgba(0,0,0,0.3) !important;
            border:0 !important;
            /*color: white !important;*/
            cursor: pointer;
        }
        .send_btn{
    border-radius: 0 15px 15px 0 !important;
    background-color: rgba(0,0,0,0.3) !important;
            border:0 !important;
            /*color: white !important;*/
            cursor: pointer;
        }
        .search_btn{
            border-radius: 0 15px 15px 0 !important;
            background-color: rgba(0,0,0,0.3) !important;
            border:0 !important;
            /*color: white !important;*/
            cursor: pointer;
        }
        .contacts{
            list-style: none;
            padding: 0;
        }
        .contacts li{
            width: 100% !important;
            padding: 5px 10px;
            margin-bottom: 15px !important;
        }
    .active{
            background-color: rgba(0,0,0,0.3);
    }
        .user_img{
            height: 55px;
            width: 55px;
            border:1.5px solid #f5f6fa;
        
        }
        .user_img_msg{
            height: 40px;
            width: 40px;
            border:1.5px solid #f5f6fa;
        
        }
    .img_cont{
            position: relative;
            height: 70px;
            width: 70px;
    }
    .img_cont_msg{
            height: 20px;
            width: 20px;
    }
    .online_icon{
        position: absolute;
        height: 15px;
        width:15px;
        background-color: #4cd137;
        border-radius: 50%;
        bottom: 2.2em;
        right: 1.4em;
        border:1.5px solid white;
    }
    .offline{
        background-color: #c23616 !important;
    }
    .user_info{
        margin-top: auto;
        margin-bottom: auto;
        margin-left: 15px;
    }
    .user_info span{
        font-size: 20px;
        /*color: white;*/
    }
    .user_info p{
    font-size: 10px;
    /*color: rgba(255,255,255,0.6);*/
    }
    .video_cam{
        margin-left: 50px;
        margin-top: 5px;
    }
    .video_cam span{
        /*color: white;*/
        font-size: 20px;
        cursor: pointer;
        margin-right: 20px;
    }
    .msg_cotainer{
        margin-top: auto;
        margin-bottom: auto;
        margin-left: 30px;
        border-radius: 5px;
        background-color: #82ccdd;
        padding: 5px;
        position: relative;
        color: #084553;
        border: 1px solid #5ba9d0;

    }
    .msg_cotainer_send{
        margin-top: auto;
        margin-bottom: auto;
        margin-right: 10px;
        border-radius: 5px;
        background-color: #78e08f;
        padding: 5px 10px;
        position: relative;
        color: #002f0b;
        border: 1px solid #54b86a;
    }
    .msg_time{
        position: absolute;
        left: 0;
        bottom: -20px;
        color: #999;
        font-size: 10px;
        width: 400px;
        text-align: left;
    }
    .msg_time_send{
        position: absolute;
        right:0;
        bottom: -20px;
        color: #999;
        font-size: 10px;
        width: 400px;
        text-align: right;


    }
    .msg_head{
        position: relative;
    }
    #action_menu_btn{
        position: absolute;
        right: 10px;
        top: 10px;
        /*color: white;*/
        cursor: pointer;
        font-size: 20px;
        margin-right: 15px;
        margin-top: 13px;
    }
    .action_menu{
        z-index: 1;
        position: absolute;
        padding: 15px 0;
        background-color: rgba(0,0,0,0.5);
        /*color: white;*/
        border-radius: 15px;
        top: 30px;
        right: 15px;
        display: none;
    }
    .action_menu ul{
        list-style: none;
        padding: 0;
    margin: 0;
    }
    .action_menu ul li{
        width: 100%;
        padding: 10px 15px;
        margin-bottom: 5px;
    }
    .action_menu ul li i{
        padding-right: 10px;
    
    }
    .action_menu ul li:hover{
        cursor: pointer;
        background-color: rgba(0,0,0,0.2);
    }
    @media(max-width: 576px){
    .contacts_card{
        margin-bottom: 15px !important;
    }
    }
        </style>



<!-- <div class="container-fluid h-100"> -->

       <!--  </div> -->

<div class="row">
<!-- <div class="col-md-4 col-xl-3 chat">
                    <div class="card mb-sm-3 mb-md-0 contacts_card">
                    <div class="card-header">
                        <div class="input-group">
                            <input type="text" placeholder="Search..." name="" class="form-control search">
                            <div class="input-group-prepend">
                                <span class="input-group-text search_btn"><i class="fas fa-search"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body contacts_body">
                        <ui class="contacts" id="my_support_list">
                        </ui>
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div> -->
            <div class="col-md-8 col-xl-6 chat">
                    <div class="card " id="user_chat_support">
                        <div class="card-header msg_head ">
                            <div class="d-flex bd-highlight ">
                                    <img src="<?=base_url('assets/uploads/logo.png');?>" class="" width="40%" height="100%">
                            </div>
                        </div>
                        <div class="card-body msg_card_body" id="chat_body_content1">

                        </div>
                        <div class="card-footer ">
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>
                                </div>
                                <textarea name="" class="form-control type_msg" placeholder="Type your message..." id="my_chat_sms"></textarea>
                                <div class="input-group-append">
                                    <span class="input-group-text send_btn" onclick="send_chat_sms();"><i class="fas fa-location-arrow"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    <!-- <section class="card">
        <div class="card-header">

        </div>
        <div class="card-body">

        </div>
    </section> -->

</div>
<script type="text/javascript">
    var chat_body_u_id=1;
    chat_body_content(chat_body_u_id);
    /*$('#chat_body_content1').html('<img src="<?=base_url('assets/uploads/')?>fidget-spinner-loading.gif" width="100%" />');
    setTimeout(function(){ chat_body_content(chat_body_u_id); }, 2000);*/
/*get_user_list();
function get_user_list() {
        $.ajax({
            url         : '<?php echo base_url();?>ajax/get_support_chat',
            type        : 'POST', // form submit method get/post
            success: function(data) {
                $('#my_support_list').html(data);
                if(chat_body_u_id!=''){
                 update_sms_read_tick(chat_body_u_id);
                 set_active();
                }
                //location.reload();
            }
        });    
}*/
function update_sms_read_tick(id) {
     $.ajax({
            url         : '<?php echo base_url();?>ajax/update_sms_read_tick/'+id,
            type        : 'GET', // form submit method get/post
            success: function(data) {
                /*$('#chat_body_content'+id).html(data);*/
            }
        });
}
/*setInterval("get_user_list()", 1000);*/

/*function user_chat_support(id) {
    chat_body_u_id=id;
    set_active();
     $.ajax({
            url         : '<?php echo base_url();?>ajax/get_support_chat_box/'+id,
            type        : 'POST', // form submit method get/post
            success: function(data) {
                $('#user_chat_support').html(data);
                $('#chat_body_content'+id).html('<img src="<?=base_url('assets/uploads/')?>fidget-spinner-loading.gif" width="100%" />');
                setTimeout(function(){ chat_body_content(id); }, 2000);
                update_sms_read_tick(chat_body_u_id);
            }
        });
}*/
function chat_body_content(id) {
     $.ajax({
            url         : '<?php echo base_url();?>ajax/chat_body_content/'+id,
            type        : 'POST', // form submit method get/post
            success: function(data) {
                $('#chat_body_content'+id).html(data);
                
                //
            }
        });
}
setInterval("chat_body_content(chat_body_u_id)", 5000);

function send_chat_sms() {
    var sms=$('#my_chat_sms').val();
    if(sms !=''){
        $.ajax({
            url         : '<?php echo base_url();?>ajax/send_chat_sms/',
            type        : 'POST', // form submit method get/post
            data        : {'message':sms,'to_id':chat_body_u_id},
            success: function(data) {
                chat_body_content(chat_body_u_id);
                //$('#my_chat_sms').value('');
                document.getElementById('my_chat_sms').value = "";
                /*document.getElementById("my_chat_sms").reset();*/
                //$('#chat_body_content'+id).html(data);
            }
        });
    }
}
function set_active() {
    $('#active_chat_user'+chat_body_u_id).attr('class','active');
}
</script>

