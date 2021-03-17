

<style>
    .box-header > .box-tools [data-toggle="tooltip"] {
        position: relative;
    }

    .inbox-toolbar {
        padding-top: 16.5px;
        float: right;
    }

    .box-footer {
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        border-bottom-right-radius: 3px;
        border-bottom-left-radius: 3px;
        border-top: 1px solid #f4f4f4;
        padding: 10px;
        background-color: #fff;
    }

    .mailbox-attachment-icon {
        text-align: center;
        font-size: 65px;
        color: #666;
        padding: 20px 10px;
    }

    .mailbox-attachment-icon, .mailbox-attachment-info, .mailbox-attachment-size {
        display: block;
    }

    .mailbox-attachment-info {
        padding: 10px;
        background: #f4f4f4;
    }

    .mailbox-attachments li {
        float: left;
        width: 200px;
        border: 1px solid #eee;
        margin-bottom: 10px;
        margin-right: 10px;
    }

    .avatar-name {
        color: #000000;
        font-weight: 600;
    }

    .mailbox-attachment-icon.has-img > img {
        max-width: 100%;
        height: 115px;
    }
</style>

<style>
    .fileDiv {
        position: relative;
        overflow: hidden;
    }

    .upload_attachmentfile {
        position: absolute;
        opacity: 0;
        right: 0;
        top: 0;
    }

    .btnFileOpen {
        margin-top: -50px;
    }

    .direct-chat-warning .right > .direct-chat-text {
        background: #d2d6de;
        border-color: #d2d6de;
        color: #444;
        text-align: right;
    }

    .direct-chat-primary .right > .direct-chat-text {
        background: #3c8dbc;
        border-color: #3c8dbc;
        color: #fff;
        text-align: right;
    }

    .spiner {
    }

    .spiner .fa-spin {
        font-size: 24px;
    }

    .attachmentImgCls {
        width: 450px;
        margin-left: -25px;
        cursor: pointer;
    }

    /*
     * Component: Direct Chat
     * ----------------------
     */
    .direct-chat .box-body {
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
        position: relative;
        overflow-x: hidden;
        padding: 0;
    }

    .direct-chat.chat-pane-open .direct-chat-contacts {
        -webkit-transform: translate(0, 0);
        -ms-transform: translate(0, 0);
        -o-transform: translate(0, 0);
        transform: translate(0, 0);
    }

    .direct-chat-messages {
        -webkit-transform: translate(0, 0);
        -ms-transform: translate(0, 0);
        -o-transform: translate(0, 0);
        transform: translate(0, 0);
        padding: 10px;
        height: 200px;
        overflow: auto;
        border: 1px solid #b5b5b5;
        border-radius: 5px;
    }

    .direct-chat-msg,
    .direct-chat-text {
        display: block;
    }

    .direct-chat-msg {
        margin-bottom: 10px;
    }

    .direct-chat-msg:before,
    .direct-chat-msg:after {
        content: " ";
        display: table;
    }

    .direct-chat-msg:after {
        clear: both;
    }

    .direct-chat-msg:before,
    .direct-chat-msg:after {
        content: " ";
        display: table;
    }

    .direct-chat-msg:after {
        clear: both;
    }

    .direct-chat-messages,
    .direct-chat-contacts {
        -webkit-transition: -webkit-transform 0.5s ease-in-out;
        -moz-transition: -moz-transform 0.5s ease-in-out;
        -o-transition: -o-transform 0.5s ease-in-out;
        transition: transform 0.5s ease-in-out;
    }

    .direct-chat-text {
        border-radius: 5px;
        position: relative;
        padding: 5px 10px;
        background: #d2d6de;
        border: 1px solid #d2d6de;
        margin: 5px 0 0 50px;
        color: #444444;
    }

    .direct-chat-text:after,
    .direct-chat-text:before {
        position: absolute;
        right: 100%;
        top: 15px;
        border: solid transparent;
        border-right-color: #d2d6de;
        content: ' ';
        height: 0;
        width: 0;
        pointer-events: none;
    }

    .direct-chat-text:after {
        border-width: 5px;
        margin-top: -5px;
    }

    .direct-chat-text:before {
        border-width: 6px;
        margin-top: -6px;
    }

    .right .direct-chat-text {
        margin-right: 50px;
        margin-left: 0;
    }

    .right .direct-chat-text:after,
    .right .direct-chat-text:before {
        right: auto;
        left: 100%;
        border-right-color: transparent;
        border-left-color: #d2d6de;
    }

    .direct-chat-img {
        border-radius: 50%;
        float: left;
        width: 40px;
        height: 40px;
    }

    .right .direct-chat-img {
        float: right;
    }

    .direct-chat-info {
        display: block;
        margin-bottom: 2px;
        font-size: 12px;
    }

    .direct-chat-name {
        font-weight: 600;
    }

    .direct-chat-timestamp {
        color: #999;
    }

    .direct-chat-contacts-open .direct-chat-contacts {
        -webkit-transform: translate(0, 0);
        -ms-transform: translate(0, 0);
        -o-transform: translate(0, 0);
        transform: translate(0, 0);
    }

    .direct-chat-contacts {
        -webkit-transform: translate(101%, 0);
        -ms-transform: translate(101%, 0);
        -o-transform: translate(101%, 0);
        transform: translate(101%, 0);
        position: absolute;
        top: 0;
        bottom: 0;
        height: 250px;
        width: 100%;
        background: #222d32;
        color: #fff;
        overflow: auto;
    }

    .contacts-list > li {
        border-bottom: 1px solid rgba(0, 0, 0, 0.2);
        padding: 10px;
        margin: 0;
    }

    .contacts-list > li:before,
    .contacts-list > li:after {
        content: " ";
        display: table;
    }

    .contacts-list > li:after {
        clear: both;
    }

    .contacts-list > li:before,
    .contacts-list > li:after {
        content: " ";
        display: table;
    }

    .contacts-list > li:after {
        clear: both;
    }

    .contacts-list > li:last-of-type {
        border-bottom: none;
    }

    .contacts-list-img {
        border-radius: 50%;
        width: 40px;
        float: left;
    }

    .contacts-list-info {
        margin-left: 45px;
        color: #fff;
    }

    .contacts-list-name,
    .contacts-list-status {
        display: block;
    }

    .contacts-list-name {
        font-weight: 600;
    }

    .contacts-list-status {
        font-size: 12px;
    }

    .contacts-list-date {
        color: #aaa;
        font-weight: normal;
    }

    .contacts-list-msg {
        color: #999;
    }

    .direct-chat-danger .right > .direct-chat-text {
        background: #dd4b39;
        border-color: #dd4b39;
        color: #ffffff;
    }

    .direct-chat-danger .right > .direct-chat-text:after,
    .direct-chat-danger .right > .direct-chat-text:before {
        border-left-color: #dd4b39;
    }

    .direct-chat-primary .right > .direct-chat-text {
        background: #3c8dbc;
        border-color: #3c8dbc;
        color: #ffffff;
    }

    .direct-chat-primary .right > .direct-chat-text:after,
    .direct-chat-primary .right > .direct-chat-text:before {
        border-left-color: #3c8dbc;
    }

    .direct-chat-warning .right > .direct-chat-text {
        background: #f39c12;
        border-color: #f39c12;
        color: #ffffff;
    }

    .direct-chat-warning .right > .direct-chat-text:after,
    .direct-chat-warning .right > .direct-chat-text:before {
        border-left-color: #f39c12;
    }

    .direct-chat-info .right > .direct-chat-text {
        background: #00c0ef;
        border-color: #00c0ef;
        color: #ffffff;
    }

    .direct-chat-info .right > .direct-chat-text:after,
    .direct-chat-info .right > .direct-chat-text:before {
        border-left-color: #00c0ef;
    }

    .direct-chat-success .right > .direct-chat-text {
        background: #00a65a;
        border-color: #00a65a;
        color: #ffffff;
    }

    .direct-chat-success .right > .direct-chat-text:after,
    .direct-chat-success .right > .direct-chat-text:before {
        border-left-color: #00a65a;
    }

    /*
     * Component: Users List
     * ---------------------
     */
    .users-list > li {
        width: 25%;
        float: left;
        padding: 0px;
        text-align: center;
    }

    .users-list > li img {
        border-radius: 50%;
        max-width: 100%;
        height: auto;
    }

    .users-list > li > a:hover,
    .users-list > li > a:hover .users-list-name {
        color: #999;
    }

    .users-list-name,
    .users-list-date {
        display: block;
    }

    .users-list-name {
        font-weight: 600;
        color: #444;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }

    .users-list-date {
        color: #999;
        font-size: 12px;
    }

    /*
     * Component: Carousel
     * -------------------
     */
    /*
     * Component: modal
     * ----------------
     */
    /*
     * Component: Social Widgets
     * -------------------------
     */
    /*
     * Page: Mailbox
     * -------------
     */
    .mailbox-messages > .table {
        margin: 0;
    }

    .mailbox-controls {
        padding: 5px;
    }

    .mailbox-controls.with-border {
        border-bottom: 1px solid #f4f4f4;
    }

    .mailbox-read-info {
        border-bottom: 1px solid #f4f4f4;
        padding: 10px;
    }

    .mailbox-read-info h3 {
        font-size: 20px;
        margin: 0;
    }

    .mailbox-read-info h5 {
        margin: 0;
        padding: 5px 0 0 0;
    }

    .mailbox-read-time {
        color: #999;
        font-size: 13px;
    }

    .mailbox-read-message {
        padding: 10px;
    }

    .mailbox-attachments li {
        float: left;
        width: 200px;
        border: 1px solid #eee;
        margin-bottom: 10px;
        margin-right: 10px;
    }

    .mailbox-attachment-name {
        font-weight: bold;
        color: #666;
    }

    .mailbox-attachment-info {
        padding: 10px;
        background: #f4f4f4;
    }

    .mailbox-attachment-size {
        color: #999;
        font-size: 12px;
    }

    /*
     * Page: Lock Screen
     * -----------------
     */
    /* ADD THIS CLASS TO THE <BODY> TAG */
    .lockscreen {
        background: #d2d6de;
    }

    .lockscreen-logo {
        font-size: 35px;
        text-align: center;
        margin-bottom: 25px;
        font-weight: 300;
    }

    .lockscreen-logo a {
        color: #444;
    }

    .lockscreen-wrapper {
        max-width: 400px;
        margin: 0 auto;
        margin-top: 10%;
    }

    /* User name [optional] */
    .lockscreen .lockscreen-name {
        text-align: center;
        font-weight: 600;
    }

    /* Will contain the image and the sign in form */
    .lockscreen-item {
        border-radius: 4px;
        padding: 0;
        background: #fff;
        position: relative;
        margin: 10px auto 30px auto;
        width: 290px;
    }

    /* User image */
    .lockscreen-image {
        border-radius: 50%;
        position: absolute;
        left: -10px;
        top: -25px;
        background: #fff;
        padding: 5px;
        z-index: 10;
    }

    .lockscreen-image > img {
        border-radius: 50%;
        width: 70px;
        height: 70px;
    }

    /* Contains the password input and the login button */
    .lockscreen-credentials {
        margin-left: 70px;
    }

    .lockscreen-credentials .form-control {
        border: 0;
    }

    .lockscreen-credentials .btn {
        background-color: #fff;
        border: 0;
        padding: 0 10px;
    }

    .lockscreen-footer {
        margin-top: 10px;
    }

    /*
     * Page: Login & Register
     * ----------------------
     */
    .login-logo,
    .register-logo {
        font-size: 35px;
        text-align: center;
        margin-bottom: 25px;
        font-weight: 300;
    }

    .login-logo a,
    .register-logo a {
        color: #444;
    }

    .login-page,
    .register-page {
        background: #d2d6de;
    }

    .login-box,
    .register-box {
        width: 360px;
        margin: 7% auto;
    }

    @media (max-width: 768px) {
        .login-box,
        .register-box {
            width: 90%;
            margin-top: 20px;
        }
    }

    .login-box-body,
    .register-box-body {
        background: #fff;
        padding: 20px;
        border-top: 0;
        color: #666;
    }

    .login-box-body .form-control-feedback,
    .register-box-body .form-control-feedback {
        color: #777;
    }

    .login-box-msg,
    .register-box-msg {
        margin: 0;
        text-align: center;
        padding: 0 20px 20px 20px;
    }

    .social-auth-links {
        margin: 10px 0;
    }

    /*
     * Page: 400 and 500 error pages
     * ------------------------------
     */
    .error-page {
        width: 600px;
        margin: 20px auto 0 auto;
    }

    @media (max-width: 991px) {
        .error-page {
            width: 100%;
        }
    }

    .error-page > .headline {
        float: left;
        font-size: 100px;
        font-weight: 300;
    }

    @media (max-width: 991px) {
        .error-page > .headline {
            float: none;
            text-align: center;
        }
    }

    .error-page > .error-content {
        margin-left: 190px;
        display: block;
    }

    @media (max-width: 991px) {
        .error-page > .error-content {
            margin-left: 0;
        }
    }

    .error-page > .error-content > h3 {
        font-weight: 300;
        font-size: 25px;
    }

    @media (max-width: 991px) {
        .error-page > .error-content > h3 {
            text-align: center;
        }
    }

    .inbox-started {
        color: orange;
    }
</style>

<div class="mailbox-body">
    <div class="inbox-avatar p-20 border-btm">
        <img src="<?php echo base_url() . $message_data->from_img ?>" class="border-green hidden-xs hidden-sm" alt="">
        <div class="inbox-avatar-text">
            <div class="avatar-name"><strong>من : </strong>
                <?php if (isset($message_data->from_name) && !empty($message_data->from_name)) {
                    echo $message_data->from_name;
                } ?>
            </div>
            <div>
                <i style="color: #6f0000;" class="fa fa-calendar" aria-hidden="true"></i>
                <strong style="color: black;">
                    <?= $message_data->time; ?></strong>
                <i style="color: #6f0000;" class="fa fa-clock-o" aria-hidden="true"></i>
                <strong style="color: black;">

                    <?php echo $message_data->date_ar ?>

                </strong>

            </div>

            <div><small style="color: black;"><strong>عنوان الرسالة: </strong>
                    <?php if (isset($message_data->title) && !empty($message_data->title)) {
                        echo $message_data->title;
                    } ?>
                </small></div>
        </div>
        <div class="inbox-date text-right hidden-xs hidden-sm">
            <div class="col-xs-12">
                <div class="inbox-toolbar btn-toolbar">
                    <div class="btn-group">
                        <?php
                   /*     if ($message_data->stared_to == 1 && $type == 1) {
                            $starred = $message_data->stared_to;
                        } elseif ($message_data->started_from == 1 && $type == 2) {
                            $starred = $message_data->started_from;

                        } else {
                            $starred = 0;
                        }*/
                        ?>
                        <a title="تحديد الرسالة كرسالة هامة"
                           onclick="make_star(<?= $message_data->id ?>,<?= $type ?>)"
                           class="btn btn-default"><i id="satr_<?= $message_data->id ?>"
                                                      class="fa fa-star <?php if ($message_data->stared_to == 1 && $type == 1) {
                                                          echo 'inbox-started';
                                                      } elseif ($message_data->started_from == 1 && $type == 2) {
                                                          echo 'inbox-started';
                                                      } else {
                                                          echo 'inbox-unstarted';
                                                      } ?>"></i>
                        </a>
                    </div>

                    <div class="btn-group">
                        <a data-toggle="modal" data-target="#add_emp_Modal" onclick=" $('#type_member1').attr('checked',true);
                get_members();" title="تحويل الرسالة " class="btn btn-default"><span class="fa fa-reply"></span></a>

                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default" title="طباعة الرسالة"
                                onclick="print_email(<?= $message_data->id ?>)"><span class="fa fa-print"></span></button>
                    </div>
                    <div class="hidden-xs hidden-sm btn-group">
                        <a class="btn btn-danger" title="تحويل الرسالة إلي سلة المحذوفات" onclick='swal({
                                title: "هل انت متاكد من تحويل الرساله الي المحذوفات ؟",
                                text: "",
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonClass: "btn-warning",
                                confirmButtonText: "تحويل",
                                cancelButtonText: "إلغاء",
                                closeOnConfirm: true
                                },
                                function(){
                                archive_message(<?= $message_data->id ?>,<?= $type ?>);
                                });'>
                            <span class="fa fa-trash"></span>

                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!------------------------------------------------>

    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#mawdo3">الموضوع</a></li>
        <li><a data-toggle="tab" href="#all_attach">المرفقات</a></li>
    </ul>
    <div class="tab-content">
        <div id="mawdo3" class="tab-pane fade in active">
            <div class="inbox-mail-details p-20">
                <p style="color: #f37020;"><strong>الموضوع</strong></p>
                <p style="color: #01454c;"><span>
                        <?php
                        if (isset($message_data->content) && !empty($message_data->content)) {
                            echo nl2br($message_data->content);
                        } ?>
                                    </span></p>
            </div>
        </div>
        <div id="all_attach" class="tab-pane fade">
            <div class="inbox-mail-details p-20">
                <h6 style="color: red;"><i class="fa fa-paperclip"></i> المرفقات <span></span></h6>

                <div class="box-footer">
                    <ul class="mailbox-attachments clearfix">
                            <li>
                                <?php if (!empty($message_data->file) || $message_data->file_attach_name != 0) {
                                    $ext = pathinfo($message_data->file_attach_name, PATHINFO_EXTENSION);
                                    $Destination = 'uploads/md/gam3ia_contact/contact_us/' . $message_data->file_attach_name;
                                    if (file_exists($Destination)) {
                                        $bytes = filesize($Destination);
                                    } else {
                                        $bytes = '';
                                    }
                                    $size = '';
                                    if ($bytes >= 1073741824) {
                                        $size = number_format($bytes / 1073741824, 2) . ' GB';
                                    } elseif ($bytes >= 1048576) {
                                        $size = number_format($bytes / 1048576, 2) . ' MB';
                                    } elseif ($bytes >= 1024) {
                                        $size = number_format($bytes / 1024, 2) . ' KB';
                                    } elseif ($bytes > 1) {
                                        $size = $bytes . ' bytes';
                                    } elseif ($bytes == 1) {
                                        $size = $bytes . ' byte';
                                    } else {
                                        $size = '0 bytes';
                                    }
                                }
                                $img = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP');
                                $file_exe = array('pdf', 'PDF', 'xls', 'xlsx', ',doc', 'docx', 'txt', 'gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP', 'rar', 'tar.gz', 'zip');
                                if (in_array($ext, $img)) {
                                    ?>
                                    <span class="mailbox-attachment-icon has-img"><img
                                                src="<?php if (file_exists('uploads/md/gam3ia_contact/contact_us/'  . $message_data->file_attach_name)) {
                                                    echo base_url() . 'uploads/md/gam3ia_contact/contact_us/'  . $message_data->file_attach_name;
                                                } ?> " alt="Attachment"></span>

                                    <div class="mailbox-attachment-info">
                                        <a onclick="$('#email_img').attr('src','<?= base_url() . 'uploads/md/gam3ia_contact/contact_us/'  . $message_data->file_attach_name ?>')"
                                           data-toggle="modal" data-target="#exampleModal"
                                           class="mailbox-attachment-name"><i class="fa fa-camera"></i>
                                            <!-- <?= $message_data->file_attach_name ?> -->
                                        </a>
                                        <span class="mailbox-attachment-size">
                                <?= $size ?>
                                <a href="<?= base_url() . "gam3ia_omomia/Messages_gam3ia/download_file/"  . $message_data->file_attach_name ?>"
                                   class="btn btn-default btn-xs pull-right" download><i
                                            class="fa fa-cloud-download"></i></a>
                                        </span>
                                    </div>
                                <?php } elseif (in_array($ext, $file_exe)) {
                                    switch ($ext) {
                                        case 'doc':
                                        case 'docx':
                                            $extin = 'word';
                                            break;
                                        case 'xls':
                                        case 'xlsx':
                                            $extin = 'excel';
                                            break;
                                        case 'PDF':
                                        case 'pdf':
                                            $extin = 'pdf';
                                            break;
                                        case 'txt':
                                            $extin = 'text';
                                            break;
                                        case 'rar':
                                        case 'zip':
                                        case 'tar.gz':
                                        case 'gz':
                                            $extin = 'archive';
                                            break;
                                        default:
                                            $extin = '';
                                            break;
                                    } ?>
                                    <span class="mailbox-attachment-icon"><i class="fa fa-file_attach_name-<?= $extin ?>-o"></i></span>
                                    <div class="mailbox-attachment-info">
                                        <a href="<?= base_url() . "gam3ia_omomia/Messages_gam3ia/download_file/"  . $message_data->file_attach_name ?>"
                                           class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>
                                        </a>
                                        <span class="mailbox-attachment-size">
                                <?= $size ?>
                                <a href="<?= base_url() . "gam3ia_omomia/Messages_gam3ia/download_file/"  . $message_data->file_attach_name ?>"
                                   class="btn btn-default btn-xs pull-right" download><i
                                            class="fa fa-cloud-download"></i></a>
                                            </span>
                                    </div>
                                    <?php
                                } ?>
                            </li>


                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="add_emp_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> تحويل إلي موظف </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <input type="hidden" name="email_rkm_emp" id="email_rkm_emp">
                    <div class="col-md-12" id="emps_div">

                        <div class="form-group col-xs-3 no-padding">
                            <label class="label">مستقبل الرساله  </label>
                            <div class="radio-content">
                                <input type="radio" id="type_member1" name="data[member_type_to]"  class="type_members" onclick="get_members()" value="1" >
                                <label for="type_member1" class="radio-label">  جمعية العمومية</label>
                            </div>

                            <div class="radio-content">
                                <input type="radio" id="type_member2" name="data[member_type_to]" onclick="get_members()"  class="type_members" value="2">
                                <label for="type_member2" class="radio-label"> ادارة التنفذية </label>
                            </div>

                        </div>
                        <div class="form-group col-xs-4 no-padding">
                            <label class="label "> الي</label>
                            <select class="form-control selectpicker" id="select_members" name="data[send_to_id_fk]" data-live-search="true" data-validation="required">

                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-labeled btn-success" onclick="add_emps_message(<?=$message_data->id?>)">
                        <span class="btn-label"><i class="fa fa-envelope-o"></i></span>
                        اضافة
                    </button>
                    <button type="button" class="btn btn-labeled btn-danger" data-dismiss="modal">
                        <span class="btn-label"><i class="fa fa-times-circle" aria-hidden="true"></i></span>
                        اغلاق
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function archive_message(id, type) {
        $.ajax({
            type: 'post',
            url: '<?php echo base_url()?>gam3ia_omomia/Messages_gam3ia/archive_message',
            data: {id: id, type: type},
            dataType: 'html',
            cache: false,
            success: function (html) {
                swal({
                    title: " تمت التحويل الي المحذوفات بنجاح ",
                    type: "success",
                    confirmButtonText: "تم",

                });
                get_my_emails('page_content', 'message_details',<?=$message_data->id?>,<?$type?>)
            }
        });
    }
</script>