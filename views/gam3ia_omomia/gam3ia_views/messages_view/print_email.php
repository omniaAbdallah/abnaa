<style>
    body {
        margin-top: 20px;
        background: #eee;
    }

    .senden-img {
        width: 50px;
        height: 50px;
    }

    .btn-compose-email {
        padding: 10px 0px;
        margin-bottom: 20px;
    }

    .btn-danger {
        background-color: #E9573F;
        border-color: #E9573F;
        color: white;
    }

    .panel-teal .panel-heading {
        background-color: #37BC9B;
        border: 1px solid #36b898;
        color: white;
    }

    .panel .panel-heading {
        padding: 5px;
        border-top-right-radius: 3px;
        border-top-left-radius: 3px;
        border-bottom: 1px solid #DDD;
        -moz-border-radius: 0px;
        -webkit-border-radius: 0px;
        border-radius: 0px;
    }

    .panel .panel-heading .panel-title {
        padding: 10px;
        font-size: 17px;
    }

    form .form-group {
        position: relative;
        margin-left: 0px !important;
        margin-right: 0px !important;
    }

    .inner-all {
        padding: 10px;
    }

    /* ========================================================================
     * MAIL
     * ======================================================================== */
    .nav-email > li:first-child + li:active {
        margin-top: 0px;
    }

    .nav-email > li + li {
        margin-top: 1px;
    }

    .nav-email li {
        background-color: white;
    }

    .nav-email li.active {
        background-color: transparent;
    }

    .nav-email li.active .label {
        background-color: white;
        color: black;
    }

    .nav-email li a {
        color: black;
        -moz-border-radius: 0px;
        -webkit-border-radius: 0px;
        border-radius: 0px;
    }

    .nav-email li a:hover {
        background-color: #EEEEEE;
    }

    .nav-email li a i {
        margin-right: 5px;
    }

    .nav-email li a .label {
        margin-top: -1px;
    }

    .table-email tr:first-child td {
        border-top: none;
    }

    .table-email tr td {
        vertical-align: top !important;
    }

    .table-email tr td:first-child, .table-email tr td:nth-child(2) {
        text-align: center;
        width: 35px;
    }

    .table-email tr.unread, .table-email tr.selected {
        background-color: #EEEEEE;
    }

    .table-email .media {
        margin: 0px;
        padding: 0px;
        position: relative;
    }

    .table-email .media h4 {
        margin: 0px;
        font-size: 14px;
        line-height: normal;
    }

    .table-email .media-object {
        width: 35px;
        -moz-border-radius: 2px;
        -webkit-border-radius: 2px;
        border-radius: 2px;
    }

    .table-email .media-meta, .table-email .media-attach {
        font-size: 11px;
        color: #999;
        position: absolute;
        right: 10px;
    }

    .table-email .media-meta {
        top: 0px;
    }

    .table-email .media-attach {
        bottom: 0px;
    }

    .table-email .media-attach i {
        margin-right: 10px;
    }

    .table-email .media-attach i:last-child {
        margin-right: 0px;
    }

    .table-email .email-summary {
        margin: 0px 110px 0px 0px;
    }

    .table-email .email-summary strong {
        color: #333;
    }

    .table-email .email-summary span {
        line-height: 1;
    }

    .table-email .email-summary span.label {
        padding: 1px 5px 2px;
    }

    .table-email .ckbox {
        line-height: 0px;
        margin-left: 8px;
    }

    .table-email .star {
        margin-left: 6px;
    }

    .table-email .star.star-checked i {
        color: goldenrod;
    }

    .nav-email-subtitle {
        font-size: 15px;
        text-transform: uppercase;
        color: #333;
        margin-bottom: 15px;
        margin-top: 30px;
    }

    .compose-mail {
        position: relative;
        padding: 15px;
    }

    .compose-mail textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #DDD;
    }

    .view-mail {
        padding: 10px;
        font-weight: 300;
    }

    .attachment-mail {
        padding: 10px;
        width: 100%;
        display: inline-block;
        margin: 20px 0px;
        border-top: 1px solid #EFF2F7;
    }

    .attachment-mail p {
        margin-bottom: 0px;
    }

    .attachment-mail a {
        color: #32323A;
    }

    .attachment-mail ul {
        padding: 0px;
    }

    .attachment-mail ul li {
        float: left;
        width: 200px;
        margin-right: 15px;
        margin-top: 15px;
        list-style: none;
    }

    .attachment-mail ul li a.atch-thumb img {
        width: 200px;
        margin-bottom: 10px;
    }

    .attachment-mail ul li a.name span {
        float: right;
        color: #767676;
    }

    @media (max-width: 640px) {
        .compose-mail-wrapper .compose-mail {
            padding: 0px;
        }
    }

    @media (max-width: 360px) {
        .mail-wrapper .panel-sub-heading {
            text-align: center;
        }

        .mail-wrapper .panel-sub-heading .pull-left, .mail-wrapper .panel-sub-heading .pull-right {
            float: none !important;
            display: block;
        }

        .mail-wrapper .panel-sub-heading .pull-right {
            margin-top: 10px;
        }

        .mail-wrapper .panel-sub-heading img {
            display: block;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 10px;
        }

        .mail-wrapper .panel-footer {
            text-align: center;
        }

        .mail-wrapper .panel-footer .pull-right {
            float: none !important;
            margin-left: auto;
            margin-right: auto;
        }

        .mail-wrapper .attachment-mail ul {
            padding: 0px;
        }

        .mail-wrapper .attachment-mail ul li {
            width: 100%;
        }

        .mail-wrapper .attachment-mail ul li a.atch-thumb img {
            width: 100% !important;
        }

        .mail-wrapper .attachment-mail ul li .links {
            margin-bottom: 20px;
        }

        .compose-mail-wrapper .search-mail input {
            width: 130px;
        }

        .compose-mail-wrapper .panel-sub-heading {
            padding: 10px 7px;
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
    }
</style>
<link rel="stylesheet" href="<?php echo base_url(); ?>asisst/admin_asset/css/bootstrap-arabic-theme.min.css"/>

<link rel="stylesheet" href="<?php echo base_url(); ?>asisst/admin_asset/css/bootstrap-arabic.min.css"/>

<link rel="stylesheet" href="<?php echo base_url(); ?>asisst/admin_asset/css/font-awesome.min.css">

<link rel="stylesheet" href="<?php echo base_url(); ?>asisst/admin_asset/css/style.css">

<body onload="printDiv('printDiv')" id="printDiv">

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

<div class="container">
    <div class="row">

        <div class="col-sm-12">
            <!-- Star form compose mail -->
            <form class="form-horizontal">
                <div class="panel mail-wrapper rounded shadow">

                    <!-- /.panel-sub-heading -->
                    <div class="panel-sub-heading inner-all">

                        <div class="row">
                            <div class="col-md-1 col-sm-1 ">
                                <img src="<?php echo base_url() . $message_data->from_img ?>"
                                     class="border-green hidden-xs hidden-sm" alt="">
                            </div>
                            <div class="col-md-10 col-sm-10 ">

                                <div class="avatar-name"><strong>من : </strong>
                                    <?php if (isset($message_data->from_name) && !empty($message_data->from_name)) {
                                        echo $message_data->from_name;
                                    } ?>
                                </div>
                                <div>
                                    <small style="color: black;"><?php echo date('H:i:s d/m/Y ', $message_data->date); ?></small>
                                </div>
                                <div><small style="color: black;"><strong>عنوان الرسالة: </strong>
                                        <?php if (isset($message_data->title) && !empty($message_data->title)) {
                                            echo $message_data->title;
                                        } ?>
                                    </small></div>

                            </div>

                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="view-mail">
                            <?php
                            if (isset($message_data->content) && !empty($message_data->content)) {
                                echo nl2br($message_data->content);
                            } ?>
                        </div>
                        <div class="attachment-mail">
                            <p>
                                <span><i class="fa fa-paperclip"></i> المرفقات  </span>
                            </p>
                            <ul class="mailbox-attachments clearfix">
                                <li>
                                    <?php if (!empty($message_data->file_attach_name)) {
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
                                <?php
                                    } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="clearfix"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
<script src="<?php echo base_url() ?>asisst/admin_asset/js/bootstrap-arabic.min.js"></script>
<script language="javascript" type="text/javascript">
    function printDiv(divID) {
        //Get the HTML of div
        var divElements = document.getElementById(divID).innerHTML;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;

        //Reset the page's HTML with div's HTML only
        document.body.innerHTML =
            "<html><head><title></title></head><body>" +
            divElements + "</body>";

        //Print Page
        window.print();
        // window.close();
        //Restore orignal HTML
        document.body.innerHTML = oldPage;


    }
</script> 