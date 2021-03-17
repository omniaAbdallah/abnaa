
<style>
.box-header>.box-tools [data-toggle="tooltip"] {
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
.mailbox-attachment-icon.has-img>img {
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
.btnFileOpen {margin-top: -50px; }

.direct-chat-warning .right>.direct-chat-text {
    background: #d2d6de;
    border-color: #d2d6de;
    color: #444;
	text-align: right;
}
.direct-chat-primary .right>.direct-chat-text {
    background: #3c8dbc;
    border-color: #3c8dbc;
    color: #fff;
	text-align: right;
}
.spiner{}
.spiner .fa-spin { font-size:24px;}
.attachmentImgCls{ width:450px; margin-left: -25px; cursor:pointer; }
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



</style>


<div class="mailbox-body">
   
                               
                           
                             
                                 <div class="inbox-avatar p-20 border-btm">
                                    <img src="https://abnaa-sa.org/uploads/human_resources/emp_photo/thumbs/ebdea1c2350df8ca89bf85387d8e8b61.jpg" class="border-green hidden-xs hidden-sm" alt="">
                                    <div class="inbox-avatar-text">
                                       <div class="avatar-name"><strong>من : </strong>
                                    <?php if (isset($message->email_from_n) && !empty($message->email_from_n)) {
                                    echo $message->email_from_n;
                                        } ?>
                                        
                                        
                                       </div>
                                       <div><small style="color: black;">Aug 21st, 11:30 PM</small></div>
                                       <div><small style="color: black;"><strong>عنوان الرسالة: </strong> 
                                        <?php if (isset($message->title) && !empty($message->title)) {
                                    echo $message->title;
                                        } ?>
                                       
                                       </small></div>
                                    </div>
                                    <div class="inbox-date text-right hidden-xs hidden-sm">
                                     
                                       <div class="col-xs-12">
                                 <div class="inbox-toolbar btn-toolbar">
                                    <div class="btn-group">
                                       <a href="mailbox.html" class="btn btn-default"><span class="fa fa-long-arrow-left"></span></a>
                                    </div>
                                    <div class="btn-group">
                                       <a href="compose.html" class="btn btn-add"><span class="fa fa-pencil-square-o"></span></a>
                                    </div>
                                    <div class="btn-group">
                                       <a href="#" class="btn btn-default"><span class="fa fa-reply"></span></a>
                                       <a href="#" class="hidden-xs hidden-sm btn btn-default"><span class="fa fa-reply-all"></span></a>
                                       <a href="#" class="btn btn-default"><span class="fa fa-share"></span></a>
                                    </div>
                                    <div class="btn-group">
                                       <button type="button" class="btn btn-default" onclick="myFunction()"><span class="fa fa-print"></span></button>
                                    </div>
                                    <div class="hidden-xs hidden-sm btn-group">
                                       <button type="button" class="text-center btn btn-danger"><span class="fa fa-exclamation"></span></button>
                                       <button type="button" class="btn btn-danger"><span class="fa fa-trash"></span></button>
                                    </div>
                                 </div>
                              </div>
                                      
                                      
                                    </div>
                                 </div>
                                 
    <!------------------------------------------------>
<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#mawdo3">الموضوع</a></li>
  <li><a data-toggle="tab" href="#all_attach">المرفقات</a></li>
  <li><a data-toggle="tab" href="#all_chats">الردود</a></li>
</ul>

<div class="tab-content">
  <div id="mawdo3" class="tab-pane fade in active">

            
                                 <div class="inbox-mail-details p-20">
                                    <p style="color: #f37020;"><strong>الموضوع</strong></p>
                                    <p style="color: #01454c;"><span>
                                        <?php 
                                
                                        
                                        if (isset($message->content) && !empty($message->content)) {
                                        //    echo $message->content;
                                        echo nl2br($message->content);
                                        } ?>
                                    
                                    </span></p>
                              
                            

            

                            
                                 </div>
                            
  </div>
  <div id="all_attach" class="tab-pane fade">
 <div class="inbox-mail-details p-20">
<h6 style="color: red;"> <i class="fa fa-paperclip"></i> المرفقات <span>(3)</span> </h6>
                                    
                                    
<div class="box-footer">
<ul class="mailbox-attachments clearfix">

   <?php

    foreach ($files as $files) { 
    
    
       if (!empty($files->file) || $files->file != 0) {
        
            $ext = pathinfo($files->file, PATHINFO_EXTENSION);
            $img = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP');
            // $file_exe = array('pdf', 'PDF', 'xls', 'xlsx', ',doc', 'docx', 'txt', 'gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP');
            $file_exe = array('pdf', 'PDF', 'xls', 'xlsx', ',doc', 'docx', 'txt', 'gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP','rar','tar.gz','zip');


   if (in_array($ext, $img)) { ?>

  <li>
<span class="mailbox-attachment-icon has-img">
<img 
src="<?php if (file_exists('uploads/emails/' . $files->email_rkm . '/' . $files->file)) {
         echo base_url() . 'uploads/emails/' . $files->email_rkm . '/' . $files->file;
     } ?> "
     alt="Attachment"/>
  
  </span>

  <div class="mailbox-attachment-info">
    <a href="#" class="mailbox-attachment-name"><i class="fa fa-camera"></i> photo2.png</a>
        <span class="mailbox-attachment-size">
          1.9 MB
          <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
        </span>
  </div>
</li>  


 <?php } elseif (in_array($ext, $file_exe)) { ?>
 
   
   
   <?php } ?>
   
   
     <li>
  <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>

  <div class="mailbox-attachment-info">
    <a href="<?= base_url() . "all_secretary/email/Emails/download_file/" . $files->email_rkm . '/' . $files->file ?>"
     class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> 
    مرفق 
     </a>
        <span class="mailbox-attachment-size">
          1,245 KB
          <a href="<?= base_url() . "all_secretary/email/Emails/download_file/" . $files->email_rkm . '/' . $files->file ?>" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
        </span>
  </div>
</li>
  
   
   <?php } 
   }
   ?>



<li>
  <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>

  <div class="mailbox-attachment-info">
    <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> Sep2014-report.pdf</a>
        <span class="mailbox-attachment-size">
          1,245 KB
          <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
        </span>
  </div>
</li>
<li>
  <span class="mailbox-attachment-icon"><i class="fa fa-file-word-o"></i></span>

  <div class="mailbox-attachment-info">
    <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> App Description.docx</a>
        <span class="mailbox-attachment-size">
          1,245 KB
          <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
        </span>
  </div>
</li>
<li>
  <span class="mailbox-attachment-icon has-img"><img src="https://abnaa-sa.org/asisst/admin_asset/img/avatar5.png" alt="Attachment"></span>

  <div class="mailbox-attachment-info">
    <a href="#" class="mailbox-attachment-name"><i class="fa fa-camera"></i> photo1.png</a>
        <span class="mailbox-attachment-size">
          2.67 MB
          <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
        </span>
  </div>
</li>
<li>
  <span class="mailbox-attachment-icon has-img"><img src="https://abnaa-sa.org/asisst/admin_asset/img/avatar5.png" alt="Attachment"></span>

  <div class="mailbox-attachment-info">
    <a href="#" class="mailbox-attachment-name"><i class="fa fa-camera"></i> photo2.png</a>
        <span class="mailbox-attachment-size">
          1.9 MB
          <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
        </span>
  </div>
</li>
</ul>
</div>                                   
        

</div>
  </div>
  <div id="all_chats" class="tab-pane fade">

 <div class="inbox-mail-details p-20">
<div class="col-md-8" id="chatSection">
              <!-- DIRECT CHAT -->
              <div class="box box-warning direct-chat direct-chat-primary">
                <div class="box-header with-border">
                  <h6 class="box-title" id="ReciverName_txt" style="margin-right: 60px;color: black;
    font-weight: 600;">
                  <?=$chatTitle;?></h6>
                          <img src="https://abnaa-sa.org/asisst/admin_asset/img/avatar5.png" alt="alatheer" title="alatheer" 
                       style="border-radius: 50%;height: 50px;width: 50px;margin-top: -70px;"/>
                  <div class="box-tools pull-right">
                    <span data-toggle="tooltip" title="Clear Chat" class="ClearChat"><i class="fa fa-comments"></i></span>
                 
                  </div>
                </div>
             <div class="box-body">
               <div class="direct-chat-messages" id="content">
                  <div id="dumppy"></div>
               </div>
             </div>
             <div class="box-footer">
                 <div class="input-group">
                
                     <input type="hidden" id="Sender_Name" value="<?=$_SESSION['user_name'];?>">
                     <input type="hidden" id="Sender_ProfilePic" value="<?php echo base_url() . 'uploads/human_resources/emp_photo/thumbs/' . $_SESSION['user_photo']; ?>">
                     <input type="hidden" id="ReciverId_txt">
                     <input type="hidden" id="email_rkm" value="<?php if (isset($message->email_rkm) && !empty($message->email_rkm)) {
         echo $message->email_rkm;
     } ?>">
                     <input type="text" name="message" placeholder="Type Message ..." class="form-control message">
                           <span class="input-group-btn">
                          <button type="button" class="btn btn-success btn-flat btnSend" id="nav_down">ارسال</button>

                       </span>
                 </div>
             </div>
             </div>
             </div>
                     
           
    

<div class="col-md-4" style="overflow-y: scroll; height: 450px;     margin-top: 30px;">
            
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h6 class="box-title"><?=$strTitle;?></h6>

                 <!-- <div class="box-tools pull-right">
                    <span class="label label-danger"> <?=$strsubTitle;?></span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>-->
                </div>
               
                <div class="box-body no-padding">
                  <ul style="list-style: none;" class="users-list clearfix">
                  
                    <?php if(!empty($vendorslist)){
						foreach($vendorslist as $v):
						?>
                        <li style="float: none;"  class="selectVendor" id="<?=$v['user_id'];?>"
                         value="<?=$v['picture_url'];?>" name="<?=$v['user_id'];?>"  title="<?=$v['user_name'];?>">
                                     
                           <span id="tot-prod_reply<?=$v['user_id_notifiy'];?>" class="badge ui-li" style="color: white;
    background-color: #e60f45;
    font-size: 10px;
    border-radius: 5px;
    padding: 6px 7px;
    position: absolute;
    /* left: 0; */
    /* top: 0;"></span>
                         <p style="width: 215px;margin-right: 70px;text-align: right;color: black;
    font-weight: 600;" class="" href="#"><?=$v['user_name'];?></p>
                          <img src="<?=$v['picture_url'];?>" alt="<?=$v['user_name'];?>"
                          style="border-radius: 50%;height: 50px;width: 50px;margin-top: -50px;"
                           title="<?=$v['user_name'];?>"/>
                           

 
                      
                         
                        </li>
                    <?php endforeach;?>
                    
                  

                   
                   <?php }?>
                    <?php if(!empty($vendorslist1)){
						foreach($vendorslist1 as $v):
						?>
                        <li style="float: none;"  class="selectVendor" id="<?=$v['user_id'];?>"
                         value="<?=$v['picture_url'];?>" name="<?=$v['user_id_notifiy'];?>"  title="<?=$v['user_name'];?>">
                                       
                           <span id="tot-prod_reply<?=$v['user_id_notifiy'];?>" class="badge ui-li" style="color: white;
    background-color: #e60f45;
    font-size: 10px;
    border-radius: 5px;
    padding: 6px 7px;
    position: absolute;
    /* left: 0; */
    /* top: 0;"></span>
                         <p style="width: 215px;margin-right: 70px;text-align: right;color: black;
    font-weight: 600;" class="" href="#"><?=$v['user_name'];?></p>
                          <img src="<?=$v['picture_url'];?>" alt="<?=$v['user_name'];?>"
                          style="border-radius: 50%;height: 50px;width: 50px;margin-top: -50px;"
                           title="<?=$v['user_name'];?>"/>
                           

 
                      
 
                        </li>
                    <?php endforeach;?>
                    
                    <?php }?>
                   
                   	<li>


                    
                    
                    
                  </ul>
               
                </div>

              </div>
             
            </div> 
  
                  
           </div>                    
      



  </div>
</div>
                  
    <!------------------------------------------------>
    
    
    
                                 
                     
      

                        
                        </div>
                        
                        
 
    
                        
                  
                        
     





<?php //if ($load == 0){
//
//$this->load->view('admin/all_secretary_view/email/main_tabs');
//?>
<!--<div class="col-md-10 padding-4">-->
<!--    --><?php //} ?>
<!--
<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-plus-square"></i> تفاصيل الرساله </h3>
    </div>
    <div class="panel-body " style="background-color: #fff;">
    -->


<?php /*
 ?>
    
<div class="col-xs-12 inbox-mail">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="inbox-avatar p-20 border-btm" style=" padding: 0 0 0 0;">
                <img src="<?php echo base_url() ?>asisst/admin_asset/img/avatar5.png"
                     class="border-green hidden-xs hidden-sm" alt="">
                <div class="inbox-avatar-text">
                            <span style="background-color: green;" class="bg-green badge avatar-text">
      <i class="fa fa-paper-plane" aria-hidden="true"></i>
      المرسل  </span>
                    <span style="color: black !important;">
      <?php if (isset($message->email_from_n) && !empty($message->email_from_n)) {
          echo $message->email_from_n;
      } ?>
      </span>
                    <span style="background-color: #009688;" class="bg-green badge avatar-text">
        </span>
                    <span style="color: black !important;">
      <?php if (isset($message->title) && !empty($message->title)) {
          echo $message->title;
      } ?>
</span>


   <span style="background-color: #fcb632;color: black;" class="bg-green badge avatar-text">
        <i class="fa fa-align-justify" aria-hidden="true"></i>
      الموضوع  </span>
                    <span style="background-color: #462542; font-weight: normal;font-size: 13px;" class="bg-green badge avatar-text">
       <i class="fa fa-comments-o" aria-hidden="true"></i>
     <?php if (isset($message->content) && !empty($message->content)) {
         //    echo $message->content;
         echo nl2br($message->content);
     } ?>
     </span>

                </div>
                <div class="inbox-date text-right hidden-xs hidden-sm">
                            <span class="bg-green badge avatar-text" style="float: left">
      <i class="fa fa-calendar" aria-hidden="true"></i>
                                <?php if (isset($message->date_ar) && !empty($message->date_ar)) {
                                    echo $message->date_ar;
                                } ?>    </span>
                </div>
            </div>
        </div>

        <div class="col-xs-8 inbox-mail">
        <div class="panel-body" style="background: #fff;">
  
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active in" id="answers-tab" data-toggle="tab" href="#answers" role="tab"
                       aria-controls="answers" aria-selected="true">
                        <i class="fa fa-comments-o" aria-hidden="true"></i>
                        الردود 222</a>
                </li>
                <li class="nav-item active" >
                    <a class="nav-link" id="morfaq-tab" data-toggle="tab" href="#morfaq<?= $message->email_rkm ?>"
                       role="tab"
                       aria-controls="morfaq" aria-selected="false">
                        <i class="fa fa-paperclip" aria-hidden="true"></i>
                        المرفقات</a>
                </li>
               



            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade " id="answers" role="tabpanel" aria-labelledby="answers-tab">
                    <div class="panel panel-success" >
                    <!-- yara -->
                    <div class="col-md-12" id="chatSection">
              <!-- DIRECT CHAT -->
              <div class="box box-warning direct-chat direct-chat-primary">
                <div class="box-header with-border">
                  <h6 class="box-title" id="ReciverName_txt" style="margin-right: 60px;color: black;
    font-weight: 600;">
                  <?=$chatTitle;?></h6>
                          <img src="https://abnaa-sa.org/asisst/admin_asset/img/avatar5.png" alt="alatheer" title="alatheer" 
                       style="border-radius: 50%;height: 50px;width: 50px;margin-top: -70px;"/>
                  <div class="box-tools pull-right">
                    <span data-toggle="tooltip" title="Clear Chat" class="ClearChat"><i class="fa fa-comments"></i></span>
                 
                  </div>
                </div>
             <div class="box-body">
               <div class="direct-chat-messages" id="content">
                  <div id="dumppy"></div>
               </div>
             </div>
             <div class="box-footer">
                 <div class="input-group">
                
                     <input type="hidden" id="Sender_Name" value="<?=$_SESSION['user_name'];?>">
                     <input type="hidden" id="Sender_ProfilePic" value="<?php echo base_url() . 'uploads/human_resources/emp_photo/thumbs/' . $_SESSION['user_photo']; ?>">
                     <input type="hidden" id="ReciverId_txt">
                     <input type="hidden" id="email_rkm" value="<?php if (isset($message->email_rkm) && !empty($message->email_rkm)) {
         echo $message->email_rkm;
     } ?>">
                     <input type="text" name="message" placeholder="Type Message ..." class="form-control message">
                           <span class="input-group-btn">
                          <button type="button" class="btn btn-success btn-flat btnSend" id="nav_down">ارسال</button>

                       </span>
                 </div>
             </div>
             </div>
             </div>
                     
                    </div>
                </div>
                <div class="tab-pane fade  in active" id="morfaq<?= $message->email_rkm ?>" role="tabpanel" aria-labelledby="morfaq-tab">
                    <div class="col-md-12 ">
                        <h4><i class="fa fa-paperclip"></i> المرفقات</h4>
                        <div class="row">
                            <?php foreach ($files as $files) { ?>
                                <div class="  col-sm-2 col-xs-4">
                                    <div class="card">
                                        <?php
                                        if (!empty($files->file) || $files->file != 0) {
                                            $ext = pathinfo($files->file, PATHINFO_EXTENSION);
                                            $img = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP');
                                           // $file_exe = array('pdf', 'PDF', 'xls', 'xlsx', ',doc', 'docx', 'txt', 'gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP');
                                            $file_exe = array('pdf', 'PDF', 'xls', 'xlsx', ',doc', 'docx', 'txt', 'gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP','rar','tar.gz','zip');

                                            if (in_array($ext, $img)) {
                                                ?>
                                                <img class="img-thumbnail img-responsive card-img-top" alt="attachment"
                                                     style="width: 100px;height: 100px;"
                                                     src="<?php if (file_exists('uploads/emails/' . $files->email_rkm . '/' . $files->file)) {
                                                         echo base_url() . 'uploads/emails/' . $files->email_rkm . '/' . $files->file;
                                                     } ?> ">
                                            <?php } elseif (in_array($ext, $file_exe)) {
                                                ?>
                                                <img class="img-thumbnail img-responsive card-img-top" alt="attachment"
                                                     style="width: 100px;height: 100px;"
                                                     src="<?php //if (file_exists('uploads/emails/' . $files->email_rkm . '/' . $files->file)) {
                                                     echo base_url() . 'uploads/emails/file_img.png';
                                                     // }
                                                     ?> ">
                                                <div class="overlay">
                                                    <a class="icon" title="User Profile">
                                                        <?php switch ($ext) {
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
                                                        <i class="fa fa-file-<?= $extin ?>-o"></i> </a>
                                                </div>
                                            <?php } ?>
                                            <div class="card-footer ">
                                                <div class="col-md-12">
                                                    <?php
                                                    if (!empty($files->file) || $files->file != 0) {
                                                        $ext = pathinfo($files->file, PATHINFO_EXTENSION);
                                                        $img = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP');
                                                        $file = array('pdf', 'PDF', 'xls', 'xlsx', ',doc', 'docx', 'txt', 'gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP');
                                                        if (in_array($ext, $img)) {
                                                            ?>
                                                            <div class="col-md-2">
                                                                <a onclick="$('#email_img').attr('src','<?= base_url() . 'uploads/emails/' . $files->email_rkm . '/' . $files->file ?>')"
                                                                   data-toggle="modal" data-target="#exampleModal"
                                                                   class="btn btn-info btn-xs">
                                                                    <i class="fa fa-eye" title=" قراءة"></i> </a>
                                                            </div>
                                                            <?php
                                                        }
                                                        ?>
                                                        <div class="col-md-2">
                                                            <a href="<?= base_url() . "all_secretary/email/Emails/download_file/" . $files->email_rkm . '/' . $files->file ?>"
                                                               class="btn btn-info btn-xs" download>
                                                                <i class="fa fa-download " aria-hidden="true"></i>
                                                            </a>
                                                        </div>
                                                        <?php
                                                    } ?>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

<div class="col-md-4" style="overflow-y: scroll; height: 450px;">
            
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h6 class="box-title"><?=$strTitle;?></h6>

          
                </div>
               
                <div class="box-body no-padding">
                  <ul style="list-style: none;" class="users-list clearfix">
                  
                    <?php if(!empty($vendorslist)){
						foreach($vendorslist as $v):
						?>
                        <li style="float: none;"  class="selectVendor" id="<?=$v['user_id'];?>"
                         value="<?=$v['picture_url'];?>" name="<?=$v['user_id'];?>"  title="<?=$v['user_name'];?>">
                                     
                           <span id="tot-prod_reply<?=$v['user_id_notifiy'];?>" class="badge ui-li" style="color: white;
    background-color: #e60f45;
    font-size: 10px;
    border-radius: 5px;
    padding: 6px 7px;
    position: absolute;
    /* left: 0; */
    /* top: 0;"></span>
                         <p style="width: 215px;margin-right: 70px;text-align: right;color: black;
    font-weight: 600;" class="" href="#"><?=$v['user_name'];?></p>
                          <img src="<?=$v['picture_url'];?>" alt="<?=$v['user_name'];?>"
                          style="border-radius: 50%;height: 50px;width: 50px;margin-top: -50px;"
                           title="<?=$v['user_name'];?>"/>
                           

 
                      
                         
                        </li>
                    <?php endforeach;?>
                    
                  

                   
                   <?php }?>
                    <?php if(!empty($vendorslist1)){
						foreach($vendorslist1 as $v):
						?>
                        <li style="float: none;"  class="selectVendor" id="<?=$v['user_id'];?>"
                         value="<?=$v['picture_url'];?>" name="<?=$v['user_id_notifiy'];?>"  title="<?=$v['user_name'];?>">
                                       
                           <span id="tot-prod_reply<?=$v['user_id_notifiy'];?>" class="badge ui-li" style="color: white;
    background-color: #e60f45;
    font-size: 10px;
    border-radius: 5px;
    padding: 6px 7px;
    position: absolute;
  "></span>
                         <p style="width: 215px;margin-right: 70px;text-align: right;color: black;
    font-weight: 600;" class="" href="#"><?=$v['user_name'];?></p>
                          <img src="<?=$v['picture_url'];?>" alt="<?=$v['user_name'];?>"
                          style="border-radius: 50%;height: 50px;width: 50px;margin-top: -50px;"
                           title="<?=$v['user_name'];?>"/>
                           

 
                      
 
                        </li>
                    <?php endforeach;?>
                    
                    <?php }?>
                   
                   	<li>


                    
                    
                    
                  </ul>
               
                </div>

              </div>
             
            </div>
                
          </div>
    


        <?php if (isset($message->need_replay) && !empty($message->need_replay) && $message->need_replay == 1) { ?>
        
        <div class="panel-footer" id="myTabs">

    <div class="col-md-12 ">
        <div class="col-md-7"></div>
        <div class="col-md-5" >
            <?php if (($message->email_from_id == $_SESSION['emp_code'])||($message->email_from_id == $_SESSION['user_id'])) { ?>

                <a data-toggle="modal" data-target="#add_emp_Modal" class="btn btn-success "
                   onclick="get_emps(<?= $message->email_rkm ?>)">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    اضافة شخص </a>
            <?php  }?>
            <?php if (isset($message->need_replay) && !empty($message->need_replay) && $message->need_replay == 1) { ?>
                <a data-toggle="modal" data-target="#replay_Modal" class="btn btn-info ">
                    <i class="fa fa-retweet" aria-hidden="true"></i>
                    تحميل مرفقات </a>
                <a class="btn btn-success "
                   href="<?= base_url() . "all_secretary/email/Emails/reply_message/" . $message->id ?>">
                    <i class="fa fa-share-square-o" aria-hidden="true"></i>
                    التحويل </a>
                <button type="button" class="btn btn-danger"
                        onclick='swal({
                                title: "هل انت متاكد من تحويل الرساله الي الارشيف ؟",
                                text: "",
                                type: "danger",
                                showCancelButton: true,
                                confirmButtonClass: "btn-danger",
                                confirmButtonText: "تحويل",
                                cancelButtonText: "إلغاء",
                                closeOnConfirm: false
                                },
                                function(){
                                archive_message(<?= $message->id ?>);
                                });'>
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                    أرشفة
                </button>
            <?php } ?>
        </div>
    </div>
</div>
         
        <?php } ?>
    </div>
    
    <?php */ ?>
    <hr>
    <br>
    <br>

</div>

<?php //if ($load == 0) {
//    ?>

<?php //} ?>

<div class="modal fade" id="add_emp_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> أضافة شخص </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <input type="hidden" name="email_rkm_emp" id="email_rkm_emp">
                    <div class="col-md-12" id="emps_div">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success"  onclick="add_emps_email()">
                        <i class="fa fa-times-circle" aria-hidden="true"></i>
                        اضافة
                    </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <i class="fa fa-times-circle" aria-hidden="true"></i>
                        اغلاق
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        style="font-size: xx-large;">
                    <span aria-hidden="true">&times;</span>
                </button>
                <img src="" id="email_img" style="width: 100%">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="replay_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">رد نصي  </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <!-- <div class="col-md-12">
                        <textarea class="form-control" id="replay_pop"></textarea>
                    </div> -->
                    <div class="col-md-12">
                        <label class="label"> رفع الوسائط</label>
                        <div>
                            <div class="file-loading">
                                <input name="file[]" id="file" type="file" multiple>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick="make_replay()" data-dismiss="modal">
                        <i class="fa fa-paper-plane" aria-hidden="true"></i>
                        إرسال</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <i class="fa fa-times-circle" aria-hidden="true"></i>
                        اغلاق</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/plugins/fileinput/js/fileinput.js"></script>

<script>
    reset_file_input('file');
</script>

<script>
    function get_emps(email_rkm) {
        $('#email_rkm_emp').val(email_rkm);

        $.ajax({
            type: 'get',
            url: "<?php echo base_url();?>all_secretary/email/Emails/get_emps/" + email_rkm,
            beforeSend: function () {
                $('#emps_div').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#emps_div').html(d);
            }
        });
    }
</script>
<script>
    function add_emps_email() {
        var email_rkm = $('#email_rkm_emp').val();
        var members = [];
        var oTable = $('.add_emp').dataTable();
        var rowcollection = oTable.$(".checkbox:checked", {"page": "all"});
        rowcollection.each(function (index, elem) {
            members.push($(elem).data('id'));
        });
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_secretary/email/Emails/add_emps_email",
            data: {emp_ids:members,email_rkm: email_rkm},
            beforeSend: function () {
                swal({
                    title: "جاري الإرسال ... ",
                    text: "",
                    imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                    showConfirmButton: false,
                    allowOutsideClick: false

                });
            },
            success: function (d) {
                swal({
                    title: 'تم اضافة  بنجاح',
                    type: 'success',
                    confirmButtonText: 'تم'
                });
                $("#add_emp_Modal .close").click();
                get_my_emails('page_content','message_details',<?= $message->id ?>)

            }
        });
    }

</script>
<script>
    function make_replay() {
        var files = $('#file')[0].files;
        var replay = $('#replay_pop').val();
        if ((files != '') ) {
            var error = '';
            var form_data = new FormData();
            form_data.append("replay", replay);
            form_data.append("id", <?=$message->email_rkm?>);
            for (var count = 0; count < files.length; count++) {
                var name = files[count].name;
                var extension = name.split('.').pop().toLowerCase();
                if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg', 'png', 'pdf', 'PNG', 'PDF', 'xls', 'doc', 'docx', 'txt', 'rar']) == -1) {
                    error += "Invalid " + count + " Image File";
                } else {
                    form_data.append("files[]", files[count]);
                }
            }
            if (error == '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>all_secretary/email/Emails/make_replay/", //base_url() return http://localhost/tutorial/codeigniter/
                    method: "POST",
                    data: form_data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function () {
                        swal({
                            title: "جاري الإرسال ... ",
                            text: "",
                            imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                            showConfirmButton: false,
                            allowOutsideClick: false
                        });
                    },
                    success: function (data) {
                        swal("تم ' الإرسال الرد بنجاح !");
                        $('#replay_pop').val('');
                        get_email_replay(<?=$message->email_rkm?>);
                        get_email_morfq(<?=$message->email_rkm?>);
                        $('#file').val('');
                        reset_file_input('file');
                    }
                });
            }
        } else {
            swal({
                title: " برجاء ادخال    البيانات ! ",
                type: "warning",
                confirmButtonClass: "btn-warning",
                closeOnConfirm: false
            });
        }
    }
    
  
</script>
<script>
    function archive_message(id) {
        $.ajax({
            type: 'post',
            url: '<?php echo base_url()?>all_secretary/email/Emails/archive_message',
            data: {id: id},
            dataType: 'html',
            cache: false,
            success: function (html) {
                // get_details_message(id);
                swal({
                    title: " تمت التحويل الي الارشيف بنجاح ",
                    type: "success",
                    confirmButtonClass: "btn-warning",
                    closeOnConfirm: false
                });
                get_my_emails('page_content','message_details',<?=$message->id?>)
            }
        });
    }
</script>
<!-- yaraaaaaaaaaaaaaaaaaaaaaaa -->
<script>
    function get_email_morfq(email_rkm) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_secretary/email/Emails/get_email_morfqat/" + email_rkm,
            success: function (d) {
                $('#morfaq<?=$message->email_rkm?>').html(d);
            }
        });
    }
    setInterval(function () {
        if ($('#dive_replays<?=$message->email_rkm?>').length) {
            get_email_morfq(<?=$message->email_rkm?>);
        }
    }, (1000 * 60 * .5));
    // var min = 1;
    // setInterval(get_email_morfq, (1000 * 60*min));
</script>



<!-- chatttttttttttttttttttttttttttt -->
<script src="<?=base_url('public')?>/components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url('public')?>/components/bootstrap/dist/js/bootstrap.min.js"></script>
 <?php if($this->uri->segment(1) != 'chat'){?>
<script src="<?=base_url('public')?>/components/PACE/pace.min.js"></script>
 <?php }?>
<!-- SlimScroll -->
<script src="<?=base_url('public')?>/components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?=base_url('public')?>/components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('public')?>/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url('public')?>/dist/js/demo.js"></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
  <?php if($this->uri->segment(1) != 'chat'){?>
  $(document).ajaxStart(function () {
    Pace.restart();
  });
  <?php }?>
</script>
<script src="<?=base_url('public/replay/replay.js');?>"></script> 