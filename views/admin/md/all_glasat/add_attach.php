<style>
    label.label {
        margin-bottom: 0px !important;
        color: #002542 !important;
        display: block !important;
        text-align: right !important;
        font-size: 16px !important;
        padding: 0 !important;
        height: auto;
    }
</style>
<style>
    .box-header > .box-tools [data-toggle="tooltip"] {
        position: relative;
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
    .mailbox-attachment-icon.has-img > img {
        max-width: 100%;
        height: 115px;
        width: -webkit-fill-available;
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
    .mailbox-attachments li {
        float: left;
        width: 200px;
        border: 1px solid #eee;
        margin-bottom: 10px;
        margin-right: 10px;
        float: right;
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
        margin-bottom: 17px;
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
<div class="col-xs-12 fadeInUp wow">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"> <?php echo $title; ?> </h3>
        </div>
        <div class="panel-body">
            <div class="col-sm-12 load_morfaq" style="padding-bottom: 27px;">
                <div class="form-group col-sm-3 padding-4">
                    <label class="label">رقم الجلسه</label>
                    <input type="text" class="form-control" id="glsa_rkm_full" name="glsa_rkm_full"
                           readonly value="<?php echo $galsa->glsa_rkm_full; ?>"/>
                </div>
                <div class="form-group col-sm-3 padding-4">
                    <label class="label"> اسم المرفق </label>
                    <input type="text" class="form-control" name="title" id="title"
                           data-validation="required"
                           value=""/>
                    <!--                    <input type="hidden" name="activity_id" id="activity_id"-->
                    <!--                           value=--><?//= $record[0]->id ?><!--/>-->
                </div>
                <div class="form-group col-sm-3 padding-4">
                    <label class="label"> المرفق </label>
                    <input type="file" class="form-control" name="file" id="myfile"
                           data-validation="required" value=""/>
                </div>
            </div>
            <div class="col-xs-12 no-padding" style="padding: 10px;">
                <div class="text-center">
                    <button type="button" id="buttons"  onclick="add_morfaq(<?= $galsa->id ?>,'file');"
                            class="btn btn-labeled btn-success" id="save" name="save" value="save">
                        <span class="btn-label"><i class="fa fa-floppy-o"></i></span>حفظ
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xs-12 fadeInUp wow">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"> <?php echo $title_t; ?> </h3>
        </div>
        <div class="panel-body">
            <!--<div class="col-md-12">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                    <tr class="info">
                        <th style="text-align: center;">اسم المرفق</th>
                        <th style="text-align: center;">الاجراء</th>
                    </tr>
                    </thead>
                    <tbody id="morfq_table">
                    <?php
                    if (isset($records) && !empty($records)) {
                        $z = 1;
                        foreach ($records as $row) {
                            ?>
                            <tr id="row_<?= $z ?>">
                                <td style="width: 80%">
                                    <?= $row->title ?>
                                </td>
                                <td style="width: 10%">
                                    <a href="<?php echo base_url() . 'md/all_glasat/all_glasat/read_file/' . $row->id ?>"
                                       target="_blank">
                                        <i class=" fa fa-eye"></i></a>
                                    <a href="<?php echo base_url() . 'md/all_glasat/all_glasat/download_file/' . $row->id.'/3' ?>"
                                       target="_blank">
                                        <i class=" fa fa-download"></i></a>
                                    <a href="#" onclick='swal({
                                            title: "هل انت متأكد من الحذف ؟",
                                            text: "",
                                            type: "warning",
                                            showCancelButton: true,
                                            confirmButtonClass: "btn-danger",
                                            confirmButtonText: "حذف",
                                            cancelButtonText: "إلغاء",
                                            closeOnConfirm: true
                                            },
                                            function(){
                                            delete_my_morfaq($("#row_<?= $z ?>"),<?= $row->id ?>);
                                            });'>
                                        <i class="fa fa-trash"> </i></a>
                                </td>
                            </tr>
                            <?php
                            $z++;
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>-->
            <div class="box-footer">
                <ul class="mailbox-attachments clearfix">
                    <?php
                    if (isset($records) && !empty($records)) {
                    $z = 1;
                    foreach ($records as $row) { ?>
                        <li id="row_<?= $z ?>">
                            <?php
                            $ext = pathinfo($row->file, PATHINFO_EXTENSION);
                            $img = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP');
                            $file_exe = array('pdf', 'PDF', 'xls', 'xlsx', ',doc', 'docx', 'txt', 'gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP', 'rar', 'tar.gz', 'zip');
                            if (in_array($ext, $img)) {
                                ?>
                                <span class="mailbox-attachment-icon has-img" data-toggle="modal" data-target="#myModal-view-<?= $row->id ?>">
                                    <img
                                            src="<?php if (file_exists('uploads/md/md_all_glasat_attaches/'.$row->file)) {
                                                echo base_url() .'uploads/md/md_all_glasat_attaches/'.$row->file;
                                            } ?> " alt="Attachment">
                                </span>
                                <div class="mailbox-attachment-info">
                                    <span class="mailbox-attachment-name">
                                        <?=$row->title?>
                                    </span>
                                    <span class="mailbox-attachment-size">
                                        <!--<a href="<?php echo base_url() . 'md/all_glasat/all_glasat/download_file/'.$row->id.'/3'?>"
                                           class="btn btn-default btn-xs pull-right" download>
                                            <i class="fa fa-cloud-download"></i></a>-->
                                        <a data-toggle="modal" data-target="#myModal-view-<?= $row->id ?>" class="btn btn-default btn-xs pull-right">
                                        <i class=" fa fa-eye"></i></a>
                                        <!-- modal view -->
                                        <div class="modal fade" id="myModal-view-<?= $row->id ?>" tabindex="-1"
                                             role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close"><span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <h4 class="modal-title" id="myModalLabel">الصورة</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img src="<?= base_url().'uploads/md/md_all_glasat_attaches/'.$row->file?>"
                                                             width="100%" alt="">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">
                                                            إغلاق
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- modal view -->
                                        <a href="<?php echo base_url() . 'md/all_glasat/all_glasat/download_file/' . $row->id.'/3' ?>"
                                           class="btn btn-default btn-xs pull-right" download>
                                            <i class=" fa fa-download"></i></a>
                                        <a href="#" onclick='swal({
                                                title: "هل انت متأكد من الحذف ؟",
                                                text: "",
                                                type: "warning",
                                                showCancelButton: true,
                                                confirmButtonClass: "btn-danger",
                                                confirmButtonText: "حذف",
                                                cancelButtonText: "إلغاء",
                                                closeOnConfirm: true
                                                },
                                                function(){
                                                delete_my_morfaq($("#row_<?= $z ?>"),<?= $row->id ?>);
                                                });' class="btn btn-default btn-xs pull-right">
                                            <i class="fa fa-trash"> </i></a>
                                    </span>
                                </div>
                            <?php } elseif (in_array($ext, $file_exe)) {
                                $viewpdf = 0;
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
                                        $viewpdf = 1;
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
                                <span class="mailbox-attachment-icon">
                                    <i class="fa fa-file-<?= $extin ?>-o"></i>
                                </span>
                                <div class="mailbox-attachment-info">
                                    <span class="mailbox-attachment-name">
                                        <?=$row->title?>
                                    </span>
                                    <span class="mailbox-attachment-size">
                                        <!--<a href="<?php echo base_url() . 'md/all_glasat/all_glasat/download_file/' . $row->id.'/3'?>"
                                           class="btn btn-default btn-xs pull-right" download>
                                            <i class="fa fa-cloud-download"></i></a>-->
                                        <?php if($viewpdf == 1){ ?>
                                            <a data-toggle="modal" data-target="#myModal-pdf-<?= $row->id ?>" class="btn btn-default btn-xs pull-right">
                                            <i class=" fa fa-eye"></i></a>
                                            <!-- start modal view pdf -->
                                            <div class="modal fade" id="myModal-pdf-<?= $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close"><span aria-hidden="true">&times;</span>
                                                            </button>
                                                            <h4 class="modal-title" id="myModalLabel">الملف</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <iframe src="<?php echo base_url() . 'md/all_glasat/all_glasat/read_file/' . $row->id ?>" style="width: 100%; height:  640px;" frameborder="0"> </iframe>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                                                إغلاق
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end modal view pdf -->
                                        <?php } ?>
                                        <a href="<?php echo base_url() . 'md/all_glasat/all_glasat/download_file/' . $row->id.'/3' ?>"
                                           class="btn btn-default btn-xs pull-right" download>
                                            <i class=" fa fa-download"></i></a>
                                        <a href="#" onclick='swal({
                                                title: "هل انت متأكد من الحذف ؟",
                                                text: "",
                                                type: "warning",
                                                showCancelButton: true,
                                                confirmButtonClass: "btn-danger",
                                                confirmButtonText: "حذف",
                                                cancelButtonText: "إلغاء",
                                                closeOnConfirm: true
                                                },
                                                function(){
                                                delete_my_morfaq($("#row_<?=$z?>"),<?= $row->id ?>);
                                                });' class="btn btn-default btn-xs pull-right">
                                            <i class="fa fa-trash"> </i></a>
                                    </span>
                                </div>
                                <?php
                            } ?>
                        </li>
                    <?php  $z++; } } ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<script src='<?php echo base_url(); ?>asisst/admin_asset/js/hijri-date.js'></script>
<script src='<?php echo base_url(); ?>asisst/admin_asset/js/calendar.js'></script>
<script>
    var cal1 = new Calendar(),
        cal2 = new Calendar(true, 0, true, true),
        date1 = document.getElementById('date-Miladi'),
        date2 = document.getElementById('date-Hijri'),
        cal1Mode = cal1.isHijriMode(),
        cal2Mode = cal2.isHijriMode();
    /*	date1.setAttribute("value",cal1.getDate().getDateString());
     date2.setAttribute("value",cal2.getDate().getDateString());*/
    document.getElementById('cal-1').appendChild(cal1.getElement());
    document.getElementById('cal-2').appendChild(cal2.getElement());
    cal1.show();
    cal2.show();
    //	setDateFields1();
    cal1.callback = function () {
        if (cal1Mode !== cal1.isHijriMode()) {
            cal2.disableCallback(true);
            cal2.changeDateMode();
            cal2.disableCallback(false);
            cal1Mode = cal1.isHijriMode();
            cal2Mode = cal2.isHijriMode();
        } else
            cal2.setTime(cal1.getTime());
        setDateFields1();
    };
    cal2.callback = function () {
        if (cal2Mode !== cal2.isHijriMode()) {
            cal1.disableCallback(true);
            cal1.changeDateMode();
            cal1.disableCallback(false);
            cal1Mode = cal1.isHijriMode();
            cal2Mode = cal2.isHijriMode();
        } else
            cal1.setTime(cal2.getTime());
        setDateFields1();
    };
    cal1.onHide = function () {
        cal1.show(); // prevent the widget from being closed
    };
    cal2.onHide = function () {
        cal2.show(); // prevent the widget from being closed
    };
    function setDateFields1() {
        /*	date1.value = cal1.getDate().getDateString();
         date2.value = cal2.getDate().getDateString();*/
        date1.setAttribute("value", cal1.getDate().getDateString());
        date2.setAttribute("value", cal2.getDate().getDateString());
    }
    function showCal1() {
        if (cal1.isHidden())
            cal1.show();
        else
            cal1.hide();
    }
    function showCal2() {
        if (cal2.isHidden())
            cal2.show();
        else
            cal2.hide();
    }
</script>
<script>
    function add_morfaq(glsa_id_fk,type) {
        var title = $('#title').val();
        var file = $('#myfile').prop('files')[0];
        var all_inputs = $('.load_morfaq [data-validation="required"]');
        var form_data = new FormData();
        form_data.append('file', file);
        form_data.append('title', title);
        form_data.append('save', 1);
        var valid = 1;
        var text_valid = "";
        all_inputs.each(function (index, elem) {
            console.log(elem.id + $(elem).val());
            if ($(elem).val() != '') {
                // valid=1;
                $(elem).css("border-color", "");
            } else {
                valid = 0;
                $(elem).css("border-color", "red");
            }
        });
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>md/all_glasat/all_glasat/add_attach/'.glsa_id_fk,
            data: form_data,
            dataType: 'text',  // what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function (xhr) {
                if (valid == 0) {
                    swal({
                        title: 'من فضلك ادخل كل الحقول ',
                        text: text_valid,
                        type: 'error',
                        confirmButtonText: 'تم'
                    });
                    xhr.abort();
                } else if (valid == 1) {
                    swal({
                        title: 'جاري الحفظ  ',
                        type: 'success',
                        confirmButtonText: 'تم'
                    });
                }
            },
            success: function (html) {
                swal({
                    title: 'تم الحفظ ',
                    type: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'تم'
                });
                window.location.reload();
                //load_add_morfaq(galsa_id);
            }
        });
    }
    function delete_my_morfaq(elem, attach) {
        //$(elem).closest("tr").remove();
        $(elem).remove();
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>md/all_glasat/all_glasat/delete_attach',
            data: {attach: attach,type:3},
            dataType: 'html',
            cache: false,
            success: function (html) {
                swal("تم الحذف!", "", "success");
                //window.location.reload();
            }
        });
    }
</script>