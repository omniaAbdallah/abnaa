<style type="text/css">
    .reply-comment {
        display: inline-block;
        width: 100%;
        margin-bottom: 20px
    }
    .reply-img {
        width: 15%;
        float: right;
    }
    .reply-img img {
        width: 100%;
        max-width: 70px;
        height: 70px;
        border: 1px solid #eee;
    }
    .reply-comment {
        float: right;
        width: 85%;
    }
    .label-inverse {
        background-color: #888;
        color: #fff;
    }
    .reply-comment span.label {
        text-align: center;
        padding-right: 10px;
        display: inline-block;
        width: auto;
        font-size: 14px;
    }
    .reply-comment .name {
        color: #888;
        font-size: 15px;
    }
    .comments-sec .well {
        height: 100%;
    }
    .bubble-div img {
        width: 150px;
        max-width: 100%;
    }
    .btn-group > .btn, .btn-group > .btn + .btn, .btn-group > .btn:first-child, .fc .fc-button-group > * {
        margin: 0 0 0 0;
    }
</style>
<div class="col-sm-12 no-padding ">
    <div class="panel-body" style="min-height: 485px;">
        <div class="vertical-tabs">
            <div class="col-xs-12 no-padding">
                <div class="col-xs-4 no-padding">
                    <span class="label" style="color: #044dd4;"> رقـم الصادر</span>
                    <span class="label"
                          style="color: #940000;"><?= $get_all->year . '/' . $get_all->emp_depart_code . '/' . $get_all->sader_rkm ?></span>
                    <span class="label" style="color: #044dd4;"> تاريخ الصادر</span>
                    <span class="label" style="color: #940000;"><?= $get_all->tasgel_date ?></span>
                    <br/>
                    <span class="label" style="color: #044dd4;">الموضوع</span>
                    <span class="label" style="color: #940000;"><?= $get_all->mawdo3_name ?></span>
                    <span class="label" style="float: left;">
<img style="width: 50px; height: 50px; margin-top: -20px;"
     src="<?php echo base_url() ?>uploads/archive/barcode/br.png"/>
</span>
                </div>
                <div class="col-xs-8 no-padding">
                </div>
                <ul class="nav nav-tabs nav-tabs-vertical" role="tablist">
                    <li class="nav-item active">
                        <a class="nav-link " data-toggle="tab" href="#pag1" role="tab" aria-controls="pag1"><i class="fa fa-2x fa-keyboard-o "></i> تفاصيل المعاملة</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link " data-toggle="tab" href="#pag6" role="tab" aria-controls="pag6"><i class="fa fa-2x fa-keyboard-o "></i> تعديل المعاملة</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#pag2" role="tab" aria-controls="pag2"><i class="fa fa-2x fa-paperclip"></i> المرفقات</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#pag3" role="tab" aria-controls="pag3"><i class="fa fa-2x fa-folder-open-o"></i> العلاقات</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#pag4" role="tab" aria-controls="pag4"><i class="fa fa-2x fa-reply-all"></i> التحويلات</a>
                    </li>
                    <li class="nav-item">
                      <!--  <a class="nav-link" data-toggle="tab" href="#pag5" role="tab" aria-controls="pag5"><i class="fa fa-2x fa-comment-o"></i> التوجيهات / التأشيرات</a>
                    -->
                      <a onclick="update_seen_sader_comments()" class="nav-link" data-toggle="tab" href="#pag5" role="tab" aria-controls="pag5"><i class="fa fa-2x fa-comment-o"></i> التوجيهات / التأشيرات</a>

                    </li>
                </ul>
            </div>
            <div class="tab-content tab-content-vertical">
                <div class="tab-pane active" id="pag1" role="tabpanel">
                    <div class="col-xs-12 no-padding">
                        <div class="col-sm-9 col-xs-12">
                            <?php
                            if (isset($get_all) && !empty($get_all)) {
                                ?>
                                <table class="table  table-striped table-bordered dt-responsive nowrap">
                                    <tbody>
                                    <tr>
                                        <th style="width: 125px"> رقم الصادر</th>
                                        <td style="width: 350px;"><?= $get_all->year . '/' . $get_all->emp_depart_code . '/' . $get_all->sader_rkm ?></td>
                                   
                                     <th style="width: 125px;">نوع الصادر</th>
                                        <td style="width: 350px;"><?php 
                                        if($get_all->sader_type == 1 ){
                                         echo 'صادر داخلي';  
                                        }elseif($get_all->sader_type == 2){
                                          echo 'صادر خارجي';  
                                        }else{
                                          echo 'غير محدد';  
                                        }
                                        
                                        ?></td>
                                      
                                   
                                    </tr>
                                    
                                    <tr>
                                      <th style="width: 125px;"> ردا علي معاملة</th>
                                        <td style="width: 350px;"><?php 
                                          if($get_all->mo3mla_reply == 1 ){
                                         echo 'نعم';  
                                        }elseif($get_all->mo3mla_reply == 2){
                                          echo 'لا';  
                                        }else{
                                          echo 'غير محدد';  
                                        }
                                        
                                        ?></td>
                                   
                                    
                                    
                                      <th style="width: 125px;">تاريخ التسجيل</th>
                                        <td style="width: 350px;"><?php if (!empty($get_all->tasgel_date)) {
                                                echo $get_all->tasgel_date;
                                            } else {
                                                echo 'غير محدد';
                                            }
                                            ?></td>
                                     </tr>
                                      <tr>
                                      
                                        <th style="width: 125px;">وقت تسجيل المعاملة</th>
                                        <td style="width: 350px;"><?php 
                                      //    echo $get_all->ersal_time;
                                           echo $time_in_12_hour_format  = date("g:i a", strtotime($get_all->ersal_time));
                                            ?></td>

 
                                        <th style="width: 125px;">تاريخ الارسال</th>
                                        <td style="width: 350px;"><?php if (!empty($get_all->ersal_date)) {
                                                echo $get_all->ersal_date;
                                            } else {
                                                echo 'غير محدد';
                                            }
                                            ?></td>
                                            </tr>
                                      <tr>
                                      
                                            <th style="width: 125px;">وقت الارسال</th>
                                        <td style="width: 350px;"><?php 
                                        if (!empty($get_all->ersal_time)) {
                                               // echo $get_all->ersal_time;
                                                echo $time_in_12_hour_format  = date("g:i a", strtotime($get_all->ersal_time)); 
                                            } else {
                                                echo 'غير محدد';
                                            }
                                        
                                            ?></td>
                                        
                                          <th style="width: 125px;">المجلد</th>
                                        <td style="width: 350px;"><?php if (!empty($get_all->folder_name)) {
                                                echo $get_all->folder_name;
                                            } else {
                                                echo 'غير محدد';
                                            }
                                            ?></td>
                                        
                                         
                                       
                                            
                                    </tr>
                                 
                                    
                                    <tr>
                                            <th style="width: 125px;"> نوع الخطاب</th>
                                        <td style="width: 350px;">
                                           <span class="label" style="background-color: #32e26b">
                                        <?php if (!empty($get_all->no3_khtab_n)) {
                                            echo $get_all->no3_khtab_n;
                                        } else {
                                            echo 'غير محدد';
                                        }
                                        ?>
                                           </span>
                                        </td>
                                        
                                            <th style="width: 125px;">عنوان الموضوع</th>
                                        <td style="width: 350px;">
                                         <span class="label" style="background-color: #ff8080">
                                        <?php if (!empty($get_all->mawdo3_name)) {
                                            echo $get_all->mawdo3_name;
                                        } else {
                                            echo 'غير محدد';
                                        }
                                        ?></span></td>
                                    
                                    </tr>
                                 <tr>
                                      <th style="width: 125px;">عدد المرفقات</th>
                                        <td style="width: 350px;">
                                         <span class="label" style="background-color: #ff8080">
                                        <?php 
                                        if (!empty($get_all->morfaq_num)) {
                                            echo $get_all->morfaq_num;
                                        } else {
                                            echo '0';
                                        }
                                        
                                        ?></span></td>
                                 
                                 
                                    <th style="width: 125px;">طريقة الارسال</th>
                                        <td style="width: 350px;"> <?php if (!empty($tareket_estlam)) {
                                                foreach ($tareket_estlam as $tareqa) {
                                                    echo $tareqa->estlam_fk_name;
                                                    echo ' , ';
                                                }
                                            } else {
                                                echo 'غير محدد';
                                            }
                                            ?></td>
                                 
                                 
                                 </tr>
                                 
                                 
                                 <tr>
                                             <th style="width: 125px;">درجه السريه</th>
                                        <td style="width: 350px;"><?php
                                            // $arr = (1 => 'نعم', 0 => 'لا');
                                            if (!empty($get_all->is_secret)) {
                                                foreach ($arr as $key) {
                                                    $select = '';
                                                    if ($get_all->is_secret != '') {
                                                        if ($key->id == $get_all->is_secret) {
                                                            echo $key->title;
                                                        }
                                                    }
                                                }
                                            } else {
                                                echo 'غير محدد';
                                            } ?></td>
                                            
                                            
                                            
                                  <th style="width: 125px;">الجهة المرسل اليها</th>
                                        <td style="width: 350px;"><?php if (!empty($get_all->geha_morsel_n)) {
                                                echo $get_all->geha_morsel_n;
                                            } else {
                                                echo 'غير محدد';
                                            }
                                            ?></td>
                                 
                                 </tr>
                                  
                                 
                                    <tr>
                                      
                                          
                                           <th style="width: 125px;"> جهة الاختصاص</th>
                                        <td style="width: 350px;"><?php if (!empty($get_all->geha_ekhtsas_n)) {
                                                echo $get_all->geha_ekhtsas_n;
                                            } else {
                                                echo 'غير محدد';
                                            }
                                            ?></td>
                                          
                                            
                                       
                                        
                                                
                                             <th style="width: 125px;">اسم المستلم</th>
                                        <td style="width: 350px;"><?php if (!empty($get_all->mostlem_name)) {
                                                echo $get_all->mostlem_name;
                                            } else {
                                                echo 'غير محدد';
                                            }
                                            ?></td>  
                                        
                                            
                                    </tr>
                                  
                                  
                                  
                                  
                                  
                                  
                                    <tr>
                                        <th style="width: 125px;">الأولوية</th>
                                        <td style="width: 350px;">
                                            <?php if (!empty($get_all->awlawia_n)) {
                                                echo $get_all->awlawia_n;
                                            } else {
                                                echo 'غير محدد';
                                            }
                                            ?>
                                        </td>
                                        
                                          <th style="width: 125px;"> يحتاج متابعة</th>
                                        <td style="width: 350px;"><?php if ($get_all->need_follow == 1) {
                                                echo 'نعم';
                                            } else if ($get_all->need_follow == 2) {
                                                echo 'لا';
                                            }
                                            ?></td>
                                      
                                        
                                    </tr>
                                 
                              
                                 
                                  
                                    <tr>
                                       
                                        
                                             <th style="width: 125px;">تاريخ الاستحقاق</th>
                                        <td style="width: 350px;"><?php if (!empty($get_all->esthkak_date)) {
                                                echo $get_all->esthkak_date;
                                            } else {
                                                echo 'غير محدد';
                                            }
                                            ?></td>
                                            
                                                   <th style="width: 125px;">وقت الاستحقاق</th>
                                        <td style="width: 350px;"><?php  
                                        if (!empty($get_all->esthkak_time)) {
                                              //  echo $get_all->esthkak_time;
                                         echo $time_in_12_hour_format  = date("g:i a", strtotime($get_all->esthkak_time)); 
                                            } else {
                                                echo 'غير محدد';
                                            }
                                            ?></td>
                                            
                                       
                                        
                                    </tr>
                                 
                                    <tr>
                                    
                                             <th style="width: 125px;">ملاحظات</th>
                                        <td colspan="3" ><?php if (!empty($get_all->notes)) {
                                                echo $get_all->notes;
                                            } else {
                                                echo 'غير محدد';
                                            }
                                            ?></td>
                                            
                                    
                                    
                                      
                                      
                                        
                                            
                                      
                                    </tr>
                                    
                                    <tr>
                                      <th style="width: 125px;">الموضوع</th>
                                        <td colspan="3"><?php if (!empty($get_all->mawdo3_subject)) {
                                                echo $get_all->mawdo3_subject;
                                            } else {
                                                echo 'غير محدد';
                                            }
                                            ?></td>
                                    
                                    </tr>
                                    
                                    </tbody>
                                </table>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="col-md-3">
                            <div class="left-archive-aside">
                                <!--<div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title">الوقت المستغرق</h5>
                                    </div>
                                    <div id="time_go">
                             
                                    </div>
                                </div>-->
                           <div class="panel panel-default">
    <div class="panel-heading">
        <h5 class="panel-title">الوقت المستغرق</h5>
    </div>
    <div class="panel-body">
        <div class="countup" id="countup1">
            <table class="table minutes-table">
                <tbody>
                <tr>
                    <?php

                    $then = $get_all->date_ar;
                    $now = $get_all->suspend_date_ar;
                    $then = new DateTime($then);
                    $now = new DateTime($now);
                    $sinceThen = $then->diff($now);
                    ?>
                    <td class="timeel seconds"><?= $sinceThen->s ?></td>
                    <td class="timeel minutes"><?= $sinceThen->i ?></td>
                    <td class="timeel hours"><?= $sinceThen->h ?></td>
                    <td class="timeel days"><?= $sinceThen->d ?></td>
                    <td class="timeel month"><?= $sinceThen->m ?></td>
                    <td class="timeel years"><?= $sinceThen->y ?></td>
                </tr>
                <tr>
                    <td>ثانية</td>
                    <td>دقيقة</td>
                    <td>ساعة</td>
                    <td>يوم</td>
                    <td>شهر</td>
                    <td>سنه</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title">تمت الإضافة بواسطة</h5>
                                    </div>
                                    <div class="panel-body">
                                        <h5>  <?= $get_all->publisher_name; ?> </h5>
                                        <p> التاريخ :</p>
                                        <p> <?= $get_all->ersal_date; ?>
                                        </p>
                                        <p> الوقت :
                                        </p>
                                        <p><?= $get_all->ersal_time; ?>
                                        </p>
                                       
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><i class="fa fa-folder-o"></i> حالة المعاملة </h5>
                                    </div>
                                    <div class="panel-body">
                                        <?php
                                if( $get_all->suspend==4){
                                $suspend_type= 'منتهية';
                                $class_suspend='danger';
                                }else{
                                $suspend_type= 'سارية';
                                $class_suspend='warning';
                                } ?>
                                
               <span  style="color: black !important;" class="label label-<?=$class_suspend?>"><?=$suspend_type?></span>                 
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        

                    </div>
                </div>
                <div class="tab-pane" id="pag2" role="tabpanel">
                    <div class="card card-body">
                        <div class="col-md-2 ">
                            <label class="label  ">اسم المرفق </label>
                            <input type="text" name="title[]" id="title"
                                   class="form-control testButton inputclass"
                                   style="cursor:pointer; width:79%;float: right;" autocomplete="off"
                                   onclick="$(this).attr('readonly','readonly'); $('#Modal_morfq').modal('show'); get_details_morfq();"
                                   onblur="$(this).attr('readonly','readonly')"
                                   onkeypress="return isNumberKey(event);"
                                   readonly>
                            <input type="hidden" id="page" data-id="" data-title="" data-typee="" data-colname="">
                            <button type="button" data-toggle="modal" data-target="#Modal_morfq"
                                    onclick="get_details_morfq()"
                                    class="btn btn-success btn-next">
                                <i class="fa fa-plus"></i></button>
                        </div>
                        <div class="form-group padding-4 col-md-2 col-xs-12">
                            <label class="label "> المرفق</label>
                            <input type="file" class="form-control   " name="morfaq[]" id="morfaq">
                        </div>
                        <div class="  col-md-2">
                            <?php if ($get_all->suspend != 4) { ?>
                                <button type="button" onclick="upload_img(<?= $this->uri->segment(6) ?>)"
                                        style="margin-top: 25px;" class="btn btn-labeled btn-success " name="add"
                                        value="add">
                                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                </button>
                            <?php } else { ?>
                                <button type="button"
                                        class="btn btn-labeled btn-success " disabled
                                        style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                </button>
                                <span class="label-danger"> عذرا...  لا يمكنك إضافة مرفقات نظرا لانتهاء المعامله         </span>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- </div>-->
                    <div class="clearfix"></div>
                    <br>
                    <div class="col-xs-12" id="morfaq_result">
                        <?php
                        if (isset($morfqat) && !empty($morfqat)) {
                            $x = 1;
                            $image = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP');
                            $file = array('pdf', 'PDF', 'xls', 'xlsx', ',doc', 'docx', 'txt');
                            if (isset($folder_path) && !empty($folder_path)) {
                                $folder = $folder_path;
                            } else {
                                $folder = '';
                            }
                            ?>
                            <table class="table example table-bordered table-striped table-hover">
                                <thead>
                                <tr class="greentd">
                                    <th>م</th>
                                    <th>نوع الملف</th>
                                    <th>اسم الملف</th>
                                    <th> الملف</th>
                                    <th>الحجم</th>
                                    <th>التاريخ</th>
                                    <th>بواسطة</th>
                                    <th>الاجراء</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($morfqat as $morfaq) {
                                    $ext = pathinfo($morfaq->morfaq, PATHINFO_EXTENSION);
                                    $Destination = $folder . '/' . $morfaq->morfaq;
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
                                    ?>
                                    <tr>
                                        <td><?= $x++ ?></td>
                                        <td>
                                            <?php
                                            if (in_array($ext, $image)) {
                                                ?>
                                                <i class="fa fa-picture-o" aria-hidden="true"
                                                   style="color: #d93bff;"></i>
                                                <?php
                                            } elseif (in_array($ext, $file)) {
                                                ?>
                                                <i class="fa fa-file-pdf-o" aria-hidden="true" style="color: red;"></i>
                                                <?php
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if (!empty($morfaq->title)) {
                                                echo $morfaq->title;
                                            } else {
                                                echo 'لا يوجد ';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if (in_array($ext, $image)) {
                                                ?>
                                                <a data-toggle="modal" data-target="#myModal-view-<?= $morfaq->id ?>">
                                                    <i class="fa fa-eye" title=" قراءة"></i> </a>
                                                <!-- modal view -->
                                                <div class="modal fade" id="myModal-view-<?= $morfaq->id ?>"
                                                     tabindex="-1"
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
                                                                <img src="<?= base_url() . $folder . '/' . $morfaq->morfaq ?>"
                                                                     width="100%" alt="">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default"
                                                                        data-dismiss="modal">
                                                                    إغلاق
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- modal view -->
                                                <?php
                                            } elseif (in_array($ext, $file)) {
                                                $file_n = 'uploads/archive/deals/';
                                                ?>
                                                <!-- <a target="_blank" href="<?= base_url() . "all_secretary/archive/sader/Add_sader/read_file/" . $morfaq->morfaq ?>">
                                            <i class="fa fa-eye" title=" قراءة"></i> </a> -->
                                                <a data-toggle="modal" data-target="#myModal-pdf-<?= $morfaq->id ?>">
                                                    <i class="fa fa-eye" title=" قراءة"></i> </a>
                                                <!-- modal view -->
                                                <div class="modal fade" id="myModal-pdf-<?= $morfaq->id ?>"
                                                     tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close"><span aria-hidden="true">&times;</span>
                                                                </button>
                                                                <h4 class="modal-title" id="myModalLabel">الملف</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <iframe src="<?= base_url() . "all_secretary/archive/sader/Add_sader/read_file/" . $morfaq->morfaq ?>"
                                                                        style="width: 100%; height:  640px;"
                                                                        frameborder="0"></iframe>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default"
                                                                        data-dismiss="modal">
                                                                    إغلاق
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?= $size ?>
                                        </td>
                                        <td>
                                            <?php
                                            if (!empty($morfaq->date_ar)) {
                                                echo $morfaq->date_ar;
                                            } else {
                                                echo 'غير محدد  ';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if (!empty($morfaq->publisher_name)) {
                                                echo $morfaq->publisher_name;
                                            } else {
                                                echo 'غير محدد  ';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <!-- <a href="<?= base_url() . $folder . '/' . $morfaq->morfaq ?>" download>  <i class="fa fa-download fa-2x" aria-hidden="true" ></i> </a> -->
                                            <!-- <a href="pdf_server.php?file=pdffilename">Download my eBook</a> -->
                                            <!--   <i class="fa fa-download fa-2x" aria-hidden="true"  download></i>-->
                                            <i class="fa fa-trash" style="cursor: pointer"
                                               onclick="delete_morfaq(<?= $morfaq->id ?>,<?= $morfaq->sader_id_fk ?>)"></i>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="tab-pane" id="pag3" role="tabpanel">
                    <div class="form-group padding-4 col-md-3 col-xs-12">
                        <label class="label "> ارفاق رقم المعاملة</label>
                        <input type="text" class="form-control  testButton inputclass"
                               name="mo3mla_rkm" id="mo3mla_rkm"
                               readonly="readonly"
                               onclick="$('#relationModal').modal('show'); "
                               style="cursor:pointer;border: white;color: black;width: 80%;float: right;"
                               value="">
                        <input type="hidden" name="type" id="type" value="">
                        <input type="hidden" name="realtion_id" id="realtion_id" value="">
                        <button type="button"
                                onclick="$('#relationModal').modal('show');"
                                class="btn btn-success btn-next">
                            <i class="fa fa-plus"></i></button>
                    </div>
                    <div class="col-md-4 text-center">
                        <?php if ($get_all->suspend != 4) { ?>
                            <button <?php if ($get_all->mo3mla_reply == 2) {
                                echo 'disabled';
                            } ?> style="margin-top: 25px;" class="btn btn-success btn-labeled" type="button" name="add"
                                 onclick="insert_realtion(<?= $this->uri->segment(6) ?>)" value="add"><span
                                        class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                            </button>
                        <?php } else { ?>
                            <button type="button"
                                    class="btn btn-labeled btn-success " disabled
                                    style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                                <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                            </button>
                            <span class="label-danger"> عذرا...  لا يمكنك إضافة علاقات نظرا لانتهاء المعامله         </span>
                        <?php } ?>
                    </div>
                    <div class="clearfix"></div>
                    <br>
                    <div id="relations">
                        <?php
                        if (isset($relations) && !empty($relations)) {
                            $x = 1;
                            ?>
                            <table class="table example table-bordered table-striped table-hover">
                                <thead>
                                <tr class="greentd">
                                    <th>م</th>
                                    <th> رقم المعاملة</th>
                                    <th>نوع المعاملة</th>
                                    <th>الاجراء</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($relations as $row) {
                                    ?>
                                    <tr>
                                        <td><?= $x++ ?></td>
                                        <td>
                                            <?php if (!empty($row->mo3mla_rkm)) {
                                                echo $row->mo3mla_rkm;
                                            } else {
                                                echo 'غير محدد';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php if ($row->type == 1) {
                                                echo 'وارد';
                                            } else if ($row->type == 2) {
                                                echo ' صادر';
                                            } else {
                                                echo 'غير محدد';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <i class="fa fa-trash" style="cursor: pointer"
                                               onclick="delete_relation(<?= $row->id ?>,<?= $row->sader_id_fk ?>)"></i>
                                            <i class="fa fa-pencil" style="cursor: pointer"
                                               onclick="get_relation(<?= $row->id ?>,<?= $row->mo3mla_rkm ?>,<?= $row->type ?>)"></i>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="tab-pane" id="pag4" role="tabpanel">
                    <div class="col-xs-9 no-padding">
                        <!--<div class="form-group padding-4 col-md-3 col-xs-12">
                            <label class="label ">    اسم المهمه</label>
                            <input type="text" name="mohema_n" id="mohema_n"
                                   value=""
                                   class="form-control  "   >
                        </div>-->
                        <!--start 6-2-2020 rehab.dev---------------------------------------->
                        <div class="form-group padding-4 col-md-3 col-xs-12">
                            <label class="label "> اسم المهمه</label>
                            <input type="text" name="mohema_n" id="mohema_n" value="" class="form-control" data-validation="required" style="cursor:pointer; width:80%;float: right;" autocomplete="off"
                                   onclick="$(this).attr('readonly','readonly'); $('#Modal_mohema_n').modal('show');get_details_mohema_n();" onblur="$(this).attr('readonly','readonly')" onkeypress="return isNumberKey(event);" readonly>
                            <input type="hidden" name="mohema_fk" id="mohema_fk" value="">
                            <button type="button" data-toggle="modal" data-target="#Modal_mohema_n" onclick="get_details_mohema_n()" class="btn btn-success btn-next">
                                <i class="fa fa-plus"></i></button>
                        </div>
                        <!--start Modal_mohema_n ----------------------------------------------->
                        <div class="modal fade" id="Modal_mohema_n" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document" style="width: 80%">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title "> اسم المهمه </h4>
                                    </div>
                                    <div class="modal-body">
                                        <div id="mohema_n_show">
                                            <div class="col-sm-12 form-group">
                                                <div class="col-sm-12 form-group">
                                                    <div class="col-sm-3  col-md-3 padding-4 ">
                                                        <button type="button" class="btn btn-labeled btn-success "
                                                                onclick="$('#mohema_n_input').show(); show_add()"
                                                                style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                                                            <span class="btn-label"><i
                                                                        class="glyphicon glyphicon-plus"></i></span>
                                                            اضافه أسم المهمه
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 no-padding form-group">
                                                    <div id="mohema_n_input" style="display: none">
                                                        <div class="col-sm-3  col-md-5 padding-2 ">
                                                            <label class="label   "> اسم المهمه </label>
                                                            <input type="text" name="mohema" id="mohema"
                                                                   data-validation="required"
                                                                   value=""
                                                                   class="form-control ">
                                                            <input type="hidden" class="form-control" id="s_id"
                                                                   value="">
                                                        </div>
                                                        <div class="col-sm-3  col-md-2 padding-4" id="div_add_mohema"
                                                             style="display: block;">
                                                            <button type="button"
                                                                    onclick="add_mohema($('#mohema').val())"
                                                                    style="    margin-top: 27px;"
                                                                    class="btn btn-labeled btn-success" name="save"
                                                                    value="save">
                                                                <span class="btn-label"><i
                                                                            class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                                            </button>
                                                        </div>
                                                        <div class="col-sm-3  col-md-3 padding-4" id="div_update_mohema"
                                                             style="display: none;">
                                                            <button type="button"
                                                                    class="btn btn-labeled btn-success " name="save"
                                                                    value="save" id="update_mohema">
                                                                <span class="btn-label"><i
                                                                            class="glyphicon glyphicon-floppy-disk"></i></span>تعديل
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <br>
                                            </div>
                                            <div id="myDiv_mohemat"><br><br>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">اغلاق
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end Modal_mohema_n-------------------------------------------------->
                        <!--end 6-2-2020----------------------------------------------->
                        <div class="col-md-3 col-sm-3 col-xs-6">
                            <label class="label">اسناد الي</label>
                            <input type="text" class="form-control" placeholder=" حدد الموظف" type="text" style="width: 78%;float: right;" name="to_user_n" id="to_user_n" readonly="readonly"
                                   onclick="$('#tahwelModal').modal('show'); "
                                   value="">
                            <input type="hidden" name="tahwel_type" id="tahwel_type" value="">
                            <input type="hidden" name="tawel_id" id="tawel_id" value="">
                            <button type="button"
                                    onclick="$('#tahwelModal').modal('show');load_tahwel()"
                                    class="btn btn-success btn-next">
                                <i class="fa fa-plus"></i></button>
                        </div>
                        <div class="form-group padding-4 col-md-1 col-xs-12">
                            <label class="label "> الأولوية</label>
                            <select type="text" name="awlawia_fk" id="awlawia_fk"
                                    class="form-control  ">
                                <option value="">اختر</option>
                                <?php
                                $priority = array('1' => 'عادي', '2' => 'هام', '3' => 'هام جدا');
                                foreach ($priority as $key => $value) {
                                    ?>
                                    <option value="<?= $key ?>"
                                    ><?= $value ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-2 col-sm-2 col-xs-12 padding-4">
                            <label class="label"> تاريخ الاستحقاق </label>
                            <input type="date" name="esthkak_date" id="esthkak_date"
                                   value="<?= date('Y-m-d') ?>"
                                   class="form-control  ">
                        </div>
                        <div class="form-group padding-4 col-md-5 col-xs-12">
                            <label class="label "> الإجراء</label>
                            <input type="text" name="subject" id="subject"
                                   value=""
                                   class="form-control  ">
                        </div>
                    </div>
                    <div class="col-xs-3 no-padding" style="height: 150px; overflow-y: scroll;">
                        <h5>قائمة المستلمين</h5>
                        <div class="recived-names">
                            <ol id="thwel_emp">
                            </ol>
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <?php if ($get_all->suspend != 4) { ?>
                            <button <?php if ($get_all->need_follow == 2) {
                                echo 'disabled';
                            } ?> class="btn btn-success btn-labeled" type="button" name="add"
                                 onclick="insert_tahwel(<?= $this->uri->segment(6) ?>)" value="add"><span
                                        class="btn-label"><i class="fa fa-reply"></i></span>اسناد المهمة
                            </button>
                        <?php } else { ?>
                            <button type="button"
                                    class="btn btn-labeled btn-success " disabled
                                    style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                                <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>اسناد
                                المهمة
                            </button>
                            <span class="label-danger"> عذرا...  لا يمكنك إضافة تحويلات نظرا لانتهاء المعامله         </span>
                        <?php } ?>
                    </div>
                    <div class="clearfix"></div>
                    <br>
                    <div id="tahwelat">
                        <?php
                        if (isset($tahwelat) && !empty($tahwelat)) {
                            $x = 1;
                            ?>
                            <table class="table example table-bordered table-striped table-hover">
                                <thead>
                                <tr class="greentd">
                                    <th> رقم المعاملة</th>
                                    <th>اسم المهمه</th>
                                    <th>الإجراء المطلوب</th>
                                    
                                    <th>تاريخ التحويل</th>
                                     <th>وقت التحويل</th>
                                    <th>محول من</th>
                                    <th>محول الي</th>
                                    <th>تاريخ الاستحقاق</th>
                                    <th>الاجراء</th>
                                    
                                </tr>
                                </thead>
                                <tbody id="">
                                <?php
                                foreach ($tahwelat as $row) {
                                    ?>
                                    <tr>
                                        <td><?= $x++ ?></td>
                                         <td>
                                            <?php if (!empty($row->mohema_n)) {
                                                echo $row->mohema_n;
                                            } else {
                                                echo 'غير محدد';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php if (!empty($row->subject)) {
                                                echo $row->subject;
                                            } else {
                                                echo 'غير محدد';
                                            }
                                            ?>
                                        </td>
                                       
                                        <td>
                                            <?php if (!empty($row->date_ar)) {
                                                echo $row->date_ar;
                                            } else {
                                                echo 'غير محدد';
                                            }
                                            ?>
                                        </td>
                                        <td>-</td>
                                        <td>
                                            <?php if (!empty($row->from_user_n)) {
                                                echo $row->from_user_n;
                                            } else {
                                                echo 'غير محدد';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php if (!empty($row->to_user_n)) {
                                                echo $row->to_user_n;
                                            } else {
                                                echo 'غير محدد';
                                            }
                                            ?>
                                        </td>
                                        <td>--</td>
                                        <td>
                                            <i class="fa fa-trash" style="cursor: pointer"
                                               onclick="delete_tahwel(<?= $row->id ?>,<?= $row->sader_id_fk ?>)"></i>
                                            <i class="fa fa-pencil" style="cursor: pointer"
                                               onclick="get_tahwel(<?= $row->id ?>)"></i>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="tab-pane" id="pag5" role="tabpanel">
                    <div class="comments-sec">
                        <div class="col-xs-12 no-padding">
                            <form action="#" enctype="multipart/form-data" method="post" accept-charset="utf-8"
                                  class="has-validation-callback">
                                <div class="col-md-2 form-group">
                                    <label class="label">اسناد الي</label>
                                    <!-- yara4-5 -->
                                    <!-- <input type="text" class="form-control"
                                    placeholder=" حدد المستخدم أو القسم" type="text" style="width: 78%;float: right;"
                                              name="to_twgeh_n" id="to_twgeh_n"  
                                              readonly="readonly"
                                              onclick="$('#twgehModal').modal('show');load_twgeh(); "
                                              value="">
                                       <button type="button" id="btn"
                                               onclick="$(twgehModal).modal('show');load_twgeh();"
                                               class="btn btn-success btn-next" >
                                           <i class="fa fa-plus"></i></button> -->
                                    <select id="to_twgeh_n" name="to_twgeh_n" data-validation="required"
                                            title=" اختر    "
                                            class="form-control selectpicker"
                                            data-show-subtext="true"
                                            data-live-search="true">
                                        <option value="">اختر</option>
                                        <?php
                                        if (isset($all_Emps_thwel) && (!empty($all_Emps_thwel))) {
                                            foreach ($all_Emps_thwel as $key) {
                                                $select = '';
                                                ?>
                                                <option value="<?php echo $key->to_user_n; ?>-<?php echo $key->to_user_id; ?>" <?= $select ?>> <?php echo $key->to_user_n; ?></option>
                                            <?php }
                                        } ?>
                                    </select>
                                    <!-- yara4-5 -->
                                </div>
                                <div class="col-xs-6 form-group">
                                    <label class="label ">إضافة</label>
                                    <input type="hidden" id="comment_id" value="">
                                    <textarea class="form-control" rows="1" name="comment" id="comment"></textarea>
                                </div>
                                <div class="col-md-2 form-group">
                                    <?php if ($get_all->suspend != 4) { ?>
                                        <button class="btn btn-success btn-labeled" style="    margin-top: 25px;"
                                                type="button" name="add"
                                                onclick="insert_comments(<?= $this->uri->segment(6) ?>)" value="add">
                                            <span class="btn-label"><i class="fa fa-reply"></i></span>إرسال
                                        </button>
                                    <?php } else { ?>
                                        <button class="btn btn-success btn-labeled" style="    margin-top: 25px;"
                                                type="button" name="add" disabled value="add"><span class="btn-label"><i
                                                        class="fa fa-reply"></i></span>إرسال
                                        </button>
                                        <span class="label-danger"> عذرا...  لا يمكنك إضافة تعليقات نظرا لانتهاء المعامله         </span>
                                    <?php } ?>
                                </div>
                            </form>
                        </div>
                        <div class="  col-xs-12 no-padding" id="comment_result">
                            <?php
                            if (isset($comments) && !empty($comments)) {
                                ?>
                                <div class=" well col-xs-12 no-padding">
                                    <?php
                                    foreach ($comments as $comment) {
                                        ?>
                                        <article class="reply-comment">
                                            <!--<div class="reply-img">
                                                <img src="<?php if (isset($_SESSION['user_login_image']) && $_SESSION['user_login_image'] != null) {
                                                    if ($_SESSION['role_id_fk'] == 3) {
                                                        echo base_url() . 'uploads/human_resources/emp_photo/thumbs/' . $_SESSION['user_login_image'];
                                                    } else {
                                                        echo base_url() . 'uploads/images/' . $_SESSION['user_login_image'];
                                                    }
                                                } else {
                                                    echo base_url() . 'asisst/admin_asset/img/avatar5.png';
                                                }
                                                ?>"
                                                     class="img-circle" width="45" height="45" alt="user">
                                            </div>-->
                                              <div class="reply-img">
                    <img src="<?php if (isset($comment->personal_photo) && $comment->personal_photo != null) {
                        if ($_SESSION['role_id_fk'] == 3) {
                            echo base_url() . 'uploads/human_resources/emp_photo/thumbs/' . $comment->personal_photo;
                        } else {
                            echo base_url() . 'uploads/images/' . $comment->personal_photo;
                        }
                    } else {
                        echo base_url() . 'asisst/admin_asset/img/avatar5.png';
                    }
                    ?>"
                         class="img-circle" width="45" height="45" alt="user">
                </div>
                                            <div class="reply-comment ">
                                                <h5 class="name"><span
                                                            class="label label-inverse"><?= $comment->publisher_name ?> </span> <?= $comment->date_ar ?>
                                                    <div class="btn-group" role="group" aria-label="..."
                                                         style="float:left;">
                                                        <?php
                                                        if ($_SESSION['role_id_fk'] == 1) {
                                                            ?>
                                                            <button type="button" class="btn btn-default"
                                                                    onclick="delete_comment(<?= $comment->id ?>,<?= $comment->sader_id_fk ?>)">
                                                                <i class="fa fa-trash"> </i></button>
                                                            <button type="button" class="btn btn-default"
                                                                    data-toggle="modal"
                                                                    data-target="#detailsModal_comm"
                                                                    onclick="load_page_comment(<?= $comment->id ?>);"><i
                                                                        class="fa fa-pencil"> </i></button>
                                                            <?php
                                                        } else {
                                                            if ($_SESSION['emp_code'] == $comment->publisher) {
                                                                ?>
                                                                <button type="button" class="btn btn-default"
                                                                        data-toggle="modal"
                                                                        data-target="#detailsModal_comm"
                                                                        onclick="load_page_comment(<?= $comment->id ?>);">
                                                                    <i class="fa fa-pencil"> </i></button>
                                                                <button type="button" class="btn btn-default"
                                                                        onclick="delete_comment(<?= $comment->id ?>,<?= $comment->sader_id_fk ?>)">
                                                                    <i class="fa fa-trash"> </i></button>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                </h5>
                                                <p> <?= $comment->comment ?>  </p>
                                            </div>
                                        </article>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="pag7" role="tabpanel">
                </div>
                <div class="tab-pane" id="pag6" role="tabpanel">
                    <?php if (isset($get_sader) && !empty($get_sader)) {
                        $data_load["get_sader"] = $get_sader;
                        $data_load["secret"] = $secret;
                        $data_load['emp_dep'] = $emp_dep;
                        $this->load->view('admin/all_secretary_view/archive_v/sader/add_sader_view', $data_load);
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- myModal Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title title "></h4>
            </div>
            <div class="modal-body">
                <div id="output">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<!-- myModal Modal -->
<!-- tahwelModal Modal -->
<div class="modal fade" id="tahwelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title title "> اسناد الي</h4>
            </div>
            <div class="modal-body">
               <!-- <div class="form-group">
                    <div class="radio-content">
                        <input type="radio" id="esnad3" name="esnad_to" class="sarf_types" value="3"
                               onclick="load_tahwel()">
                        <label for="esnad3" class="radio-label"> اداره</label>
                    </div>
                    <div class="radio-content">
                        <input type="radio" id="esnad2" name="esnad_to" class="sarf_types" value="2"
                               onclick="load_tahwel()">
                        <label for="esnad2" class="radio-label"> قسم</label>
                    </div>
                    <div class="radio-content">
                        <input type="radio" id="esnad1" name="esnad_to" class="sarf_types" value="1"
                               onclick="load_tahwel()">
                        <label for="esnad1" class="radio-label"> موظف</label>
                    </div>
                </div>-->
                <div class="col-xs-12" id="tawel_result" style="display: none;">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<!-- tahwelModal Modal -->
<!-- tahwelModal Modal -->
<div class="modal fade" id="relationModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title title "> رقم المعاملة</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="radio-content">
                        <input type="radio" id="type1" name="realtion_type" class="sarf_types" value="1"
                               onclick="load_realtion()">
                        <label for="type1" class="radio-label"> وارد</label>
                    </div>
                    <div class="radio-content">
                        <input type="radio" id="type2" name="realtion_type" class="sarf_types" value="2"
                               onclick="load_realtion()">
                        <label for="type2" class="radio-label"> صادر</label>
                    </div>
                </div>
                <div class="col-xs-12" id="realtion_result" style="display: none;">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<!-- tahwelModal Modal -->
<div class="modal fade" id="Modal_morfq" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title "> اسماء المرفقات </h4>
            </div>
            <div class="modal-body">
                <div id="morfq_show">
                    <div class="col-sm-12 form-group">
                        <div class="col-sm-12 form-group">
                            <div class="col-sm-3  col-md-3 padding-4 ">
                                <button type="button" class="btn btn-labeled btn-success "
                                        onclick="$('#geha_input11113').show(); show_add()"
                                        style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                                    <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>
                                    اضافه اسم المرفق
                                </button>
                            </div>
                        </div>
                        <div class="col-sm-12 no-padding form-group">
                            <div id="geha_input11113" style="display: none">
                                <div class="col-sm-3  col-md-5 padding-2 ">
                                    <label class="label   ">اسم المرفق </label>
                                    <input type="text" name="morfq" id="morfq" data-validation="required"
                                           value=""
                                           class="form-control ">
                                    <input type="hidden" class="form-control" id="s_id" value="">
                                </div>
                                <div class="col-sm-3  col-md-2 padding-4" id="div_add_morfq" style="display: block;">
                                    <button type="button" onclick="add_morfq($('#morfq').val())"
                                            style="    margin-top: 27px;"
                                            class="btn btn-labeled btn-success" name="save" value="save">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                    </button>
                                </div>
                                <div class="col-sm-3  col-md-3 padding-4" id="div_update_morfq" style="display: none;">
                                    <button type="button"
                                            class="btn btn-labeled btn-success " name="save" value="save"
                                            id="update_morfq">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>تعديل
                                    </button>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                    </div>
                    <div id="myDiv_morfq"><br><br>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">اغلاق</button>
            </div>
        </div>
    </div>
</div>
<!-- yara -->
<div class="modal fade" id="detailsModal_comm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"> التعليقات </h4>
            </div>
            <div class="modal-body" id="details_result">
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%;">
                <?php
                ?>
                <?php
                //   }
                ?>
                <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<!--  -->
<!-- yaraaaa13-9-2020 -->
<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script>
$( document ).ready(function() {
    time_go(); 
   setInterval(time_go, (1000 * 60 ));
  
//  setInterval(time_go, (1000 ));
});

</script>
<script>
    function time_go() {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_secretary/archive/sader/Add_sader/time_go",
            data:{row_id:<?=$get_all->id?>},
            success: function (d) {
                $('#time_go').html(d);
            }
        });
    }
</script>
<script>
    function changePage(text, id, title) {
        $('.title').text(text);
        $('#page').data('id', id);
        $('#page').data('title', title);
    }
</script>
<script>
    function GetName(id, name) {
        var title_fk = $('#page').data("id");
        var title_n = $('#page').data("title");
        $('#' + title_fk).val(name);
        $('#' + title_n).val(name);
        $('#myModal').modal('hide');
    }
</script>
<script>
    function load_page(type) {
        $.ajax({
            type: 'post',
            url: '<?php echo base_url()?>all_secretary/archive/sader/Add_sader/load_modal',
            data: {type: type},
            dataType: 'html',
            cache: false,
            success: function (html) {
                $("#output").html(html);
            }
        });
    }
</script>
<script>
    function load_page_comment(row_id) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_secretary/archive/sader/Add_sader/load_details_comment",
            data: {row_id: row_id},
            success: function (d) {
                $('#details_result').html(d);
            }
        });
    }
</script>
<script>
    function upload_img(row) {
        var files = $('#morfaq')[0].files;
        var title = $('#title').val();
        //var row = $('#row').val();
        var error = '';
        var form_data = new FormData();
        for (var count = 0; count < files.length; count++) {
            var name = files[count].name;
            var extension = name.split('.').pop().toLowerCase();
            if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'PNG', 'jpeg', 'pdf', 'PDF', 'xls', 'xlsx', ',doc', 'docx', 'txt']) == -1) {
                error += "Invalid " + count + " Image File"
            } else {
                form_data.append("files[]", files[count]);
                form_data.append("title", title);
                form_data.append("row", row);
            }
        }
        //
        if (title != '' && files != '') {
            if (error == '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>all_secretary/archive/sader/Add_sader/upload_morfaq", //base_url() return http://localhost/tutorial/codeigniter/
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
                        $('#morfaq_result').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
                    },
                    success: function (data) {
                        // alert(data);
                        //$('#images').show();
                        swal("تم الاضافه بنجاح !");
                        $('#title').val('');
                        $('#morfaq').val('');
                        $("input:radio").attr("checked", false);
                        $('#morfaq_result').html(data);
                    }
                });
            }
        } else {
            // alert('من فضلك تأكد الحقول الناقصه ! ');
            swal({
                title: "من فضلك تأكد من الحقول الناقصه ! ",
                type: "warning",
                confirmButtonClass: "btn-warning",
                confirmButtonText: "تم"
            });
        }
    }
</script>
<script>
    function delete_morfaq(row_id, sader_id) {
        // var deelete = 'delete';
        if (confirm('هل أنت متأكد من الحذف ؟ ')) {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url()?>all_secretary/archive/sader/Add_sader/delete_morfaq',
                data: {row_id: row_id, sader_id: sader_id},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    swal({
                            title: " تم الحذف بنجاح",
                        }
                    );
                    $('#morfaq_result').html(html);
                }
            });
        }
    }
</script>
<script>
    function insert_comments(sader_id) {
        var comment = $('#comment').val();
        var row_id = $('#comment_id').val();
        var to_user_name = $('#to_twgeh_n').val();
        ;
        if (comment != '' && to_user_name != '') {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url()?>all_secretary/archive/sader/Add_sader/insert_comments',
                data: {sader_id: sader_id, comment: comment, row_id: row_id, to_user_name: to_user_name},
                dataType: 'html',
                cache: false,
                beforeSend: function () {
                    swal({
                        title: "جاري الإرسال ... ",
                        text: "",
                        imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                        showConfirmButton: false,
                        allowOutsideClick: false
                    });
                },
                success: function (html) {
                    if (row_id != '') {
                        swal({
                                title: " تم التعديل بنجاح",
                            }
                        );
                    } else {
                        swal({
                                title: " تم الاضافه بنجاح",
                            }
                        );
                    }
                    $('#comment').val('');
                    $('#to_twgeh_n').val('');
                    $('#comment_result').html(html);
                }
            });
        } else {
            swal({
                title: "من فضلك تأكد من الحقول الناقصه ! ",
                type: "warning",
                confirmButtonClass: "btn-warning",
                confirmButtonText: "تم"
            });
        }
    }
</script>
<script>
    function delete_comment(row_id, sader_id) {
        swal({
                title: "هل أنت متأكد من الحذف ؟ ",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "نعم",
                cancelButtonText: "لا",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        type: 'post',
                        url: '<?php echo base_url()?>all_secretary/archive/sader/Add_sader/delete_comment',
                        data: {row_id: row_id, sader_id: sader_id},
                        dataType: 'html',
                        cache: false,
                        success: function (html) {
                            swal({
                                    title: " تم الحذف بنجاح",
                                }
                            );
                            $('#comment_result').html(html);
                        }
                    });
                } else {
                    swal("تم الالغاء", "", "error");
                }
            });
    }
</script>
<script>
    function get_comment(id, value, to_user_id, to_user_name) {
        $('#comment').val(value);
        $('#comment_id').val(id);
        $('#to_twgeh_n').hide();
        $('#to_twgeh_n').append("<input type='text'  data-validation='required' id='to_twgeh_user_fk_name" + to_user_id + "' name='to_twgeh_user_fk_name' value='" + to_user_name + "'/>");
        // document.getElementById("to_twgeh_n").setAttribute("disabled", "disabled");
        //document.getElementById("btn").setAttribute("disabled", "disabled");
    }
</script>
<!-- <script>
    function load_tahwel() {
        $('#tawel_result').show();
        var type = $('input[name=esnad_to]:checked').val();
      //  alert(type);
        $('#tahwel_type').val(type);
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>all_secretary/archive/sader/Add_sader/load_tahwel' ,
            data: {type:type},
            dataType: 'html',
            cache: false,
            success: function (html) {
                $("#tawel_result").html(html);
            }
        });
    }
</script> -->
<script>
        /*31-8-20-om*/

    function load_tahwel() {
        $('#tawel_result').show();
/* var type = $('input[name=esnad_to]:checked').val();*/
        var type = 1;
        $('#tahwel_type').val(type);
        $.ajax({
            type: 'post',
            url: '<?php echo base_url()?>all_secretary/archive/wared/Add_wared/load_tahwel',
            data: {type: type},
            dataType: 'html',
            cache: false,
            beforeSend: function () {
                $('#tawel_result').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (html) {
                $("#tawel_result").html(html);
            }
        });
    }
</script>
<script>
    function GettahwelName(id, name) {
        var checkBox = document.getElementById("myCheck" + id);
        var fieldHTML = '<div><input type="hidden" name="to_user_fk[]" value=""/></div>';
        if (checkBox.checked == true) {
            // $('#text111').hide();
            $("#thwel_emp").append("<li name='f' id='" + id + "'>" + name + "</li>");
            $('#to_user_n').append("<input type='hidden' id='to_user_fk" + id + "'  name='to_user_fk' value='" + id + "'/>" +
                "<input type='hidden'   id='to_user_fk_name" + id + "' name='to_user_fk_name' value='" + name + "'/>");
            //$('#to_user_fk').val(id);
            //  $('#to_user_n').append(name);
        } else {
            $("#to_user_fk" + id).remove();
            $("#to_user_fk_name" + id).remove();
            $("#" + id).remove();
            //  $('#to_user_id').val(id);
            //$('#to_user_n').val(name);
            // $('#tahwelModal').modal('hide');
        }
    }
</script>
<script>
    function delete_tahwel(row_id, sader_id) {
        if (confirm('هل أنت متأكد من الحذف ؟ ')) {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url()?>all_secretary/archive/sader/Add_sader/delete_tahwel',
                data: {row_id: row_id, sader_id: sader_id},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    swal({
                            title: " تم الحذف بنجاح",
                        }
                    );
                    $('#tahwelat').html(html);
                }
            });
        }
    }
</script>
<script>
    function load_realtion() {
        $('#realtion_result').show();
        var type = $('input[name=realtion_type]:checked').val();
        //  alert(type);
        $('#type').val(type);
        $.ajax({
            type: 'post',
            url: '<?php echo base_url()?>all_secretary/archive/sader/Add_sader/load_realtion',
            data: {type: type},
            dataType: 'html',
            cache: false,
            success: function (html) {
                $("#realtion_result").html(html);
            }
        });
    }
</script>
<script>
    function GetrealtionName(rkm) {
        $('#mo3mla_rkm').val(rkm);
        $('#relationModal').modal('hide');
    }
</script>
<script>
    function insert_realtion(sader_id) {
        var mo3mla_rkm = $('#mo3mla_rkm').val();
        var type = $('#type').val();
        var row_id = $('#realtion_id').val();
        //  alert(mo3mla_rkm+'type'+type);
        if (mo3mla_rkm != '' && type != '') {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url()?>all_secretary/archive/sader/Add_sader/insert_realtion',
                data: {row_id: row_id, sader_id: sader_id, mo3mla_rkm: mo3mla_rkm, type: type},
                dataType: 'html',
                cache: false,
                beforeSend: function () {
                    swal({
                        title: "جاري الإرسال ... ",
                        text: "",
                        imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                        showConfirmButton: false,
                        allowOutsideClick: false
                    });
                },
                success: function (html) {
                    if (row_id != '') {
                        swal({
                                title: " تم التعديل بنجاح",
                            }
                        );
                    } else {
                        swal({
                                title: " تم الاضافه بنجاح",
                            }
                        );
                    }
                    $('#mo3mla_rkm').val('');
                    $('#type').val('');
                    $('#realtion_id').val('');
                    $('#relations').html(html);
                    $("input:radio").attr("checked", false);
                    $('#realtion_result').hide();
                }
            });
        } else {
            swal({
                title: "من فضلك تأكد من الحقول الناقصه ! ",
                type: "warning",
                confirmButtonClass: "btn-warning",
                confirmButtonText: "تم"
            });
        }
    }
</script>
<script>
    function delete_relation(row_id, sader_id) {
        if (confirm('هل أنت متأكد من الحذف ؟ ')) {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url()?>all_secretary/archive/sader/Add_sader/delete_relation',
                data: {row_id: row_id, sader_id: sader_id},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    swal({
                            title: " تم الحذف بنجاح",
                        }
                    );
                    $('#relations').html(html);
                }
            });
        }
    }
</script>
<script>
    function get_relation(id, rkm, type) {
        $('#mo3mla_rkm').val(rkm);
        $('#realtion_id').val(id);
        $('#type').val(type);
    }
</script>
<!-- yara -->
<script>
    function get_details_morfq() {
        // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_secretary/archive/wared/Add_wared/load_morfq",
            // beforeSend: function () {
            //     $('#myDiv_geha11').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            // },
            success: function (d) {
                $('#myDiv_morfq').html(d);
            }
        });
    }
</script>
<script>
    function getTitle_morfq(value, id) {
        //$('#travel_type_fk').val(id);
        $('#title').val(value);
        $('#Modal_morfq').modal('hide');
    }
</script>
<script>
    function add_morfq(value) {
        $('#div_update_morfq').hide();
        $('#div_add_morfq').show();
        //  alert(value);
        if (value != 0 && value != '') {
            var dataString = 'morfq=' + value;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/add_morfq',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    //  $('#reason').val(' ');
                    $('#morfq').val('');
                    //  $('#Modal_esdar').modal('hide');
                    swal({
                            title: "تمت الاضافه!",
                        }
                    );
                    get_details_morfq();
                }
            });
        } else {
            swal({
                title: "من فضلك تأكد من الحقول الناقصه ! ",
                type: "warning",
                confirmButtonClass: "btn-warning",
                confirmButtonText: "تم"
            });
        }
    }
</script>
<script>
    function update_morfq(id) {
        var id = id;
        $('#geha_input11113').show();
        $('#div_add_morfq').hide();
        $('#div_update_morfq').show();
        $.ajax({
            url: "<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/getById_morfq",
            type: "Post",
            dataType: "html",
            data: {id: id},
            success: function (data) {
                var obj = JSON.parse(data);
                //console.log(obj);
                console.log(obj.title);
                $('#morfq').val(obj.title);
            }
        });
        $('#update_morfq').on('click', function () {
            var morfq = $('#morfq').val();
            $.ajax({
                url: "<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/update_morfq",
                type: "Post",
                dataType: "html",
                data: {morfq: morfq, id: id},
                success: function (html) {
                    //  alert('hh');
                    $('#morfq').val('');
                    $('#div_update_morfq').hide();
                    $('#div_add_morfq').show();
                    // $('#Modal_esdar').modal('hide');
                    swal({
                            title: "تم التعديل!",
                        }
                    );
                    get_details_morfq();
                }
            });
        });
    }
</script>
<script>
    function delete_morfqqq(id) {
        //  confirm('?? ??? ????? ?? ????? ????? ?');
        var r = confirm('هل انت متاكد من الحذف ?');
        if (r == true) {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/delete_no3_khtab',
                data: {id: id},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    //   alert(html);
                    $('#morfq').val('');
                    // $('#Modal_esdar').modal('hide');
                    swal({
                            title: "تم الحذف!",
                        }
                    );
                    get_details_morfq();
                }
            });
        }
    }
</script>
<!---6-2-2020 rehab.dev mohema_n scripts ---------------------------------------------------->
<script>
    function get_details_mohema_n() {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_secretary/archive/sader/Add_sader/load_mohemat",
            beforeSend: function () {
                $('#myDiv_mohemat').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#myDiv_mohemat').html(d);
            }
        });
    }
</script>
<script>
    function getTitle_mohema(value, id) {
        $('#mohema_fk').val(id);
        $('#mohema_n').val(value);
        $('#Modal_mohema_n').modal('hide');
    }
</script>
<script>
    function add_mohema(value) {
        $('#div_update_mohema').hide();
        $('#div_add_mohema').show();
        //  alert(value);
        if (value != 0 && value != '') {
            var dataString = 'mohema_n=' + value;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>all_secretary/archive/sader/Add_sader/add_mohema_n',
                data: dataString,
                dataType: 'html',
                cache: false,
                beforeSend: function () {
                    swal({
                        title: "جاري الإرسال ... ",
                        text: "",
                        imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                        showConfirmButton: false,
                        allowOutsideClick: false
                    });
                },
                success: function (html) {
                    //  $('#reason').val(' ');
                    $('#mohema').val('');
                    //  $('#Modal_esdar').modal('hide');
                    swal({
                            title: "تم الحفظ!",
                        }
                    );
                    get_details_mohema_n();
                }
            });
        }
    }
</script>
<script>
    function update_mohema(id) {
        var id = id;
        $('#mohema_n_input').show();
        $('#div_add_mohema').hide();
        $('#div_update_mohema').show();
        $.ajax({
            url: "<?php echo base_url() ?>all_secretary/archive/sader/Add_sader/getById_mohema_n",
            type: "Post",
            dataType: "html",
            data: {id: id},
            success: function (data) {
                var obj = JSON.parse(data);
                //console.log(obj);
                console.log(obj.title);
                $('#mohema').val(obj.title);
            }
        });
        $('#update_mohema').on('click', function () {
            var mohema_n = $('#mohema').val();
            $.ajax({
                url: "<?php echo base_url() ?>all_secretary/archive/sader/Add_sader/update_mohema",
                type: "Post",
                dataType: "html",
                data: {mohema_n: mohema_n, id: id},
                beforeSend: function () {
                    swal({
                        title: "جاري الإرسال ... ",
                        text: "",
                        imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                        showConfirmButton: false,
                        allowOutsideClick: false
                    });
                },
                success: function (html) {
                    //  alert('hh');
                    $('#mohema').val('');
                    $('#div_update_mohema').hide();
                    $('#div_add_mohema').show();
                    // $('#Modal_esdar').modal('hide');
                    swal({
                            title: "تم التعديل!",
                        }
                    );
                    get_details_mohema_n();
                }
            });
        });
    }
</script>
<script>
    function delete_mohema(id) {
        var r = confirm('هل انت متاكد من الحذف ?');
        if (r == true) {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>all_secretary/archive/sader/Add_sader/delete_mohema',
                data: {id: id},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    //   alert(html);
                    $('#mohema').val('');
                    // $('#Modal_esdar').modal('hide');
                    swal({
                            title: "تم الحذف!",
                        }
                    );
                    get_details_mohema_n();
                }
            });
        }
    }
</script>
<script>
    function get_tahwel(row_id) {
        $.ajax({
            type: 'post',
            url: '<?php echo base_url()?>all_secretary/archive/sader/Add_sader/update_tahwel',
            data: {row_id: row_id},
            dataType: 'html',
            cache: false,
            success: function (html) {
                $('li[name=f]').remove();
                var obj = JSON.parse(html);
                $('#tawel_id').val(obj.id);
                $('#mohema_fk').val(obj.mohema_fk);
                $('#mohema_n').val(obj.mohema_n);
                $('#from_user_id').val(obj.from_user_id);
                $('#from_user_n').val(obj.from_user_n);
                $('#tahwel_type').val(obj.tahwel_type);
                //   $('#to_user_id').val(obj.to_user_id);
                // $('#to_user_n').val(obj.to_user_n);
                $('#awlawia_fk').val(obj.awlawia_fk);
                $('#awlawia_n').val(obj.awlawia_n);
                $('#esthkak_date').val(obj.esthkak_date);
                $('#subject').val(obj.subject);
                $("ol").append("<li name='f' id='" + obj.to_user_id + "'>" + obj.to_user_n + "</li>");
                $('#to_user_n').append("<input type='hidden' id='to_user_fk" + obj.to_user_id + "'  name='to_user_fk' value='" + obj.to_user_id + "'/><input type='hidden'  data-validation='required' id='to_user_fk_name" + obj.to_user_id + "' name='to_user_fk_name' value='" + obj.to_user_n + "'/>");
            }
        });
    }
</script>
<script>
    function insert_tahwel(sader_id) {
        var mohema_fk = $('#mohema_fk').val();
        var mohema_n = $('#mohema_n').val();
        //   var to_user_n = $('#to_user_n').val();
        //  var to_user_id = $('#to_user_id').val();
        var tahwel_type = $('#tahwel_type').val();
        var awlawia_fk = $('#awlawia_fk').val();
        var esthkak_date = $('#esthkak_date').val();
        var subject = $('#subject').val();
        var row_id = $('#tawel_id').val();
        var to_user_n = [];
        $("input[name='to_user_fk_name']").each(function () {
            to_user_n.push(this.value);
        });
        var to_user_id = [];
        $("input[name='to_user_fk']").each(function () {
            to_user_id.push(this.value);
        });
        console.log(to_user_n);
        console.log(to_user_id);
        if (mohema_n != '' && to_user_n != '' && tahwel_type != '' && esthkak_date != '' && awlawia_fk != '') {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url()?>all_secretary/archive/sader/Add_sader/insert_tahwel',
                data: {
                    row_id: row_id,
                    sader_id: sader_id,
                    mohema_n: mohema_n,
                    mohema_fk: mohema_fk,
                    to_user_n: to_user_n,
                    to_user_id: to_user_id,
                    tahwel_type: tahwel_type,
                    awlawia_fk: awlawia_fk,
                    esthkak_date: esthkak_date,
                    subject: subject
                },
                dataType: 'html',
                cache: false,
                beforeSend: function () {
                    swal({
                        title: "جاري الإرسال ... ",
                        text: "",
                        imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                        showConfirmButton: false,
                        allowOutsideClick: false
                    });
                },
                success: function (html) {
                    if (row_id != '') {
                        swal({
                                title: " تم التعديل بنجاح",
                            }
                        );
                    } else {
                        swal({
                                title: " تم الاضافه بنجاح",
                            }
                        );
                    }
                    $("#" + to_user_id).remove();
                    $('#mohema_n').val('');
                    $('#mohema_fk').val('');
                    $('#to_user_n').val('');
                    $('#to_user_id').val('');
                    $('#tahwel_type').val('');
                    $('#awlawia_fk').val('');
                    $('#esthkak_date').val('<?= date('Y-m-d')?>');
                    $('#subject').val('');
                    $('#tawel_id').val('');
                    $('#tahwelat').html(html);
                    $("input:radio").attr("checked", false);
                    $('#tawel_result').hide();
                    $("#" + to_user_id).remove();
                    $('li[name=f]').remove();
                    $("#to_user_fk" + to_user_id).remove();
                    $("#to_user_fk_name" + to_user_id).remove();
                }
            });
        } else {
            swal({
                title: "من فضلك تأكد من الحقول الناقصه ! ",
                type: "warning",
                confirmButtonClass: "btn-warning",
                confirmButtonText: "تم"
            });
        }
    }
</script>
<!--end 6-2-2020---------------------------------------------------------------------->
<script>
    function load_twgeh() {
        $('#twgeh_result').show();
        //  alert(type);
        $.ajax({
            type: 'post',
            url: '<?php echo base_url()?>all_secretary/archive/wared/Add_wared/load_twgeh',
            dataType: 'html',
            cache: false,
            success: function (html) {
                $("#twgeh_result").html(html);
            }
        });
    }
</script>
<script>
    function GettwgehName(id, name) {
        var checkBox = document.getElementById("myCheck" + id);
        if (checkBox.checked == true) {
            // $('#text111').hide();
            $("#twgeh").append("<li  name='twgeh' id='" + id + "'>" + name + "</li>");
            $('#to_twgeh_n').append("<input type='hidden' id='to_twgeh_user_fk" + id + "'  name='to_twgeh_user_fk' value='" + id + "'/><input type='hidden'  data-validation='required' id='to_twgeh_user_fk_name" + id + "' name='to_twgeh_user_fk_name' value='" + name + "'/>");
            //$('#to_user_fk').val(id);
            //  $('#to_user_n').append(name);
        } else {
            $("#" + id).remove();
            $("#to_twgeh_user_fk" + id).remove();
            $("#to_twgeh_user_fk_name" + id).remove();
            //  $('#to_user_id').val(id);
            //$('#to_user_n').val(name);
            // $('#twgehModal').modal('hide');
        }
    }
</script>
<div class="modal fade" id="twgehModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title title "> اسناد الي</h4>
            </div>
            <div class="modal-body">
                <div class="col-xs-12" id="twgeh_result" style="display: none;">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<!--  -->


<script>
    <?php  if ($get_all->suspend !=4){
    ?>
    document.addEventListener('DOMContentLoaded', function () {
        countUpFromTime("<?=$get_all->date_ar?>", 'countup1'); // ****** Change this line!
    });
    <?php } ?>
    function countUpFromTime(countFrom, id) {
        countFrom = new Date(countFrom).getTime();
        var now = new Date(),
            countFrom = new Date(countFrom),
            timeDifference = (now - countFrom);

        var secondsInADay = 60 * 60 * 1000 * 24,
            secondsInAHour = 60 * 60 * 1000;

        days = Math.floor(timeDifference / (secondsInADay) * 1);
        years = Math.floor(days / 365);
        if (years > 1) {
            days = days - (years * 365)
        }
        month = Math.floor(days / 30);
        if (month > 1) {
            days = days - (month * 30)
        }

        hours = Math.floor((timeDifference % (secondsInADay)) / (secondsInAHour) * 1);
        mins = Math.floor(((timeDifference % (secondsInADay)) % (secondsInAHour)) / (60 * 1000) * 1);
        secs = Math.floor((((timeDifference % (secondsInADay)) % (secondsInAHour)) % (60 * 1000)) / 1000 * 1);

        var idEl = document.getElementById(id);
        idEl.getElementsByClassName('years')[0].innerHTML = years;
        idEl.getElementsByClassName('month')[0].innerHTML = month;
        idEl.getElementsByClassName('days')[0].innerHTML = days;
        idEl.getElementsByClassName('hours')[0].innerHTML = hours;
        idEl.getElementsByClassName('minutes')[0].innerHTML = mins;
        idEl.getElementsByClassName('seconds')[0].innerHTML = secs;

        clearTimeout(countUpFromTime.interval);
        countUpFromTime.interval = setTimeout(function () {
            countUpFromTime(countFrom, id);
        }, 1000);
    }

</script>
