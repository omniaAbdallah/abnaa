<style>
body{margin-top:20px;
background:#eee;
}

.senden-img{
    width:50px;
    height:50px;
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
<link rel="stylesheet" href="<?php echo base_url();?>asisst/admin_asset/css/bootstrap-arabic-theme.min.css" />

<link rel="stylesheet" href="<?php echo base_url();?>asisst/admin_asset/css/bootstrap-arabic.min.css" />

<link rel="stylesheet" href="<?php echo base_url();?>asisst/admin_asset/css/font-awesome.min.css">

<link rel="stylesheet" href="<?php echo base_url();?>asisst/admin_asset/css/style.css">

<body onload="printDiv('printDiv')" id="printDiv">

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
                        <img src="https://abnaa-sa.org/uploads/human_resources/emp_photo/thumbs/<?=$message->employee_photo?>" alt="..." class="img-circle senden-img">
                        </div>
                        <div class="col-md-10 col-sm-10 ">
                          
                            <div class="avatar-name"><strong>من : </strong>
                <?php if (isset($message->email_from_n) && !empty($message->email_from_n)) {
                    echo $message->email_from_n;
                } ?>
            </div>
            <div><small style="color: black;"><?php echo date('H:i:s d/m/Y ', $message->date); ?></small></div>
            <div><small style="color: black;"><strong>عنوان الرسالة: </strong>
                    <?php if (isset($message->title) && !empty($message->title)) {
                        echo $message->title;
                    } ?>
                </small></div>
                          
                        </div>
                       
                    </div>
                </div><!-- /.panel-sub-heading -->
                <div class="panel-body">
                    <div class="view-mail">
                    <?php
                                        if (isset($message->content) && !empty($message->content)) {
                                            //    echo $message->content;
                                            echo nl2br($message->content);
                                        } ?>
                    </div><!-- /.view-mail -->
                    <div class="attachment-mail">
                        <p>
                            <span><i class="fa fa-paperclip"></i> المرفقات  </span>
                            
                        </p>
                        <ul   class="mailbox-attachments clearfix">
                        <?php foreach ($files as $files) {
                       
                       ?>
                               <li>
                          <?php     if (!empty($files->file) || $files->file != 0) {
                           $ext = pathinfo($files->file, PATHINFO_EXTENSION);
                           $Destination = 'uploads/emails/' . $files->email_rkm .'/'.$files->file;
                           if (file_exists($Destination)){
                               $bytes=  filesize($Destination) ;
                           } else{
                               $bytes ='';
                           }
                            $size = '';
                           if ($bytes >= 1073741824)
                           {
                               $size = number_format($bytes / 1073741824, 2) . ' GB';
                           }
                           elseif ($bytes >= 1048576)
                           {
                               $size = number_format($bytes / 1048576, 2) . ' MB';
                           }
                           elseif ($bytes >= 1024)
                           {
                               $size = number_format($bytes / 1024, 2) . ' KB';
                           }
                           elseif ($bytes > 1)
                           {
                               $size = $bytes . ' bytes';
                           }
                           elseif ($bytes == 1)
                           {
                               $size = $bytes . ' byte';
                           }
                           else
                           {
                               $size = '0 bytes';
                           }
                       }
                           $img = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP');
                           // $file_exe = array('pdf', 'PDF', 'xls', 'xlsx', ',doc', 'docx', 'txt', 'gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP');
                           $file_exe = array('pdf', 'PDF', 'xls', 'xlsx', ',doc', 'docx', 'txt', 'gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP', 'rar', 'tar.gz', 'zip');
                           if (in_array($ext, $img)) {
                                                           ?>
                                                           <span class="mailbox-attachment-icon has-img"><img style="width: 142px;height: 139px;"
                                               src="<?php if (file_exists('uploads/emails/' . $files->email_rkm . '/' . $files->file)) {
                                                                    echo base_url() . 'uploads/emails/' . $files->email_rkm . '/' . $files->file;
                                                                } ?> " alt="Attachment"></span>
                                 
                                               <div class="mailbox-attachment-info">
                                       <a href=""
                                                                              data-toggle="modal" data-target="#exampleModal" class="mailbox-attachment-name"><i class="fa fa-camera"></i>
                                                                               <!-- <?=$files->file?> -->
                                                                               </a>
                                       <span class="mailbox-attachment-size">
                                       <?= $size?>
                                      
                
               </span>
                                   </div>
                           <?php }elseif (in_array($ext, $file_exe)) {
                               if($ext=='pdf'){
                               ?>
                               <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>
                                   <div class="mailbox-attachment-info">
                                       <a href="" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>
                                       <!-- <?=$files->file?> -->
                                       </a>
                                       <span class="mailbox-attachment-size">
                                       <?= $size?>
                                       
       
               </span>
                                   </div>
                           <?php }elseif($ext=='doc'){?>
                               <span class="mailbox-attachment-icon"><i class="fa fa-file-word-o"></i></span>
                                   <div class="mailbox-attachment-info">
                                       <a href="" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> 
                                       <!-- <?=$files->file?> -->
                                       </a>
                                       <span class="mailbox-attachment-size">
                                       <?= $size?>
             
       
                 
               </span>
                                   </div>
                     <?php } }?>
                               </li>
                               <?php } ?>
                        </ul>
                    </div><!-- /.attachment mail -->
                </div><!-- /.panel-body -->
                <div class="panel-footer">
                    <div class="clearfix"></div>
                </div><!-- /.panel-footer -->
            </div><!-- /.panel -->
        </form>
        <!--/ End form compose mail -->
    </div>
</div>
</div>
</body>
<script src="<?php echo base_url()?>asisst/admin_asset/js/bootstrap-arabic.min.js"></script>
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