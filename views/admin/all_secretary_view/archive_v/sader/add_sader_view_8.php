<div class="col-sm-1 no-padding " >
</div>
<div class="col-sm-10 no-padding " >
<div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <!--<div class="panel-heading no-padding" style="margin-bottom: 0;">
            <h4 class="panel-title"><?php echo $title ; ?></h4>
        </div>-->
        <div class="panel-body">
            <?php
            $arr = array('1'=>'نعم','2'=>'لا');
            if (isset($get_sader) && !empty($get_sader)){
                
                echo form_open_multipart('all_secretary/archive/sader/Add_sader/update_sader/'.$get_sader->id);
                $ersal_date = $get_sader->ersal_date;
                $ersal_time = $get_sader->ersal_time;
                $geha_ekhtsas_n = $get_sader->geha_ekhtsas_n;
                $geha_ekhtsas_fk = $get_sader->geha_ekhtsas_fk;
                $sader_rkm = $get_sader->sader_rkm;
                $folder_path = $get_sader->folder_path;
                $folder_id_fk = $get_sader->folder_id_fk;
                $no3_khtab_n = $get_sader->no3_khtab_n;
                $no3_khtab_fk = $get_sader->no3_khtab_fk;
                $mawdo3_name = $get_sader->mawdo3_name;
                $title_id_fk=$get_sader->title_id_fk;
                $mawdo3_subject = $get_sader->mawdo3_subject;
                $tarekt_ersal_n = $get_sader->tarekt_ersal_n;
                $tarekt_ersal_fk = $get_sader->tarekt_ersal_fk;
                $is_secret = $get_sader->is_secret;
                $geha_morsel_n = $get_sader->geha_morsel_n;
                $geha_morsel_fk = $get_sader->geha_morsel_fk;
                $mostlem_name = $get_sader->mostlem_name;
                $awlawia_fk = $get_sader->awlawia_fk;
                $esthkak_date = $get_sader->esthkak_date;
                $esthkak_time = $get_sader->esthkak_time;
                $need_follow = $get_sader->need_follow;
                $notes = $get_sader->notes;
                $mo3mla_reply = $get_sader->mo3mla_reply;
                $sader_type = $get_sader->sader_type;
                $morfaq_num = $get_sader->morfaq_num;
                $folder_name=$get_sader->folder_name;
                $disabled='disabled';
                $color='';
          if($_SESSION['role_id_fk'] == 3){
   $emp_depart = $get_sader->emp_depart_code;

    
 }else{
      $emp_depart = 0;
   
 }
 if($_SESSION['emp_code'] == $get_sader->publisher ){
    $disabled_action = '';
    $sapn_action='';
 
     
  }else{
    $disabled_action = 'disabled';
    $sapn_action=' <span style="color:red;">لا يمكن التعديل الا من مقدم الطلب </span>';
    
  }
 
            } else{
                 echo form_open_multipart('all_secretary/archive/sader/Add_sader/add_sader',array('id'=>'sader_form','class'=>'sader_form')); 
               // echo form_open_multipart('all_secretary/archive/sader/Add_sader/add_sader');
                $sader_rkm = $rkm + 1;
                $ersal_date = date('Y-m-d');
                $ersal_time = date('H:i:s');
                $geha_ekhtsas_n ='';
                $geha_ekhtsas_fk ='';
                $folder_path = '';
                $folder_id_fk ='';
                $no3_khtab_n ='';
                $no3_khtab_fk ='';
                $mawdo3_name ='';
                $title_id_fk='';
                $mawdo3_subject ='';
                $tarekt_ersal_n ='';
                $tarekt_ersal_fk ='';
                $is_secret ='';
                $geha_morsel_n ='';
                $geha_morsel_fk ='';
                $mostlem_name ='';
                $awlawia_fk ='';
                $need_follow ='';
                $notes ='';
                $mo3mla_reply ='';
                $sader_type ='';
                $morfaq_num ='';
                $esthkak_date =date('Y-m-d');
                $esthkak_time =date('H:i:s');
   $folder_name='';
   $disabled='';
   $color='';

   
  //  $emp_depart_name = 0;  
  if($_SESSION['role_id_fk'] == 3){
    $emp_depart = $emp_dep['eddara'];
 
     
  }else{
       $emp_depart = 0;
    
  }
            }
            ?>
            <div class="col-xs-12 no-padding">
            <?php 
            /*echo '<pre>';
            print_r($emp_dep);*/
            ?>
            <input type="hidden" name="sader_rkm" value="<?= $sader_rkm?>" />
            <input type="hidden" name="emp_depart_code" value="<?= $emp_depart?>" />
                <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
                    <label class="label">  رقم الصادر  </label>
                    <input  type="text" name=""
                           value="<?php echo '2020'.'/'.$emp_depart.'/'.$sader_rkm?>"
                           class="form-control  " readonly  >
                </div>
                   <div class="form-group padding-1 col-md-2 col-xs-12 padding-4">
                    <label class="label ">    نوع الصادر</label>
                    <select  type="text" name="sader_type" id="sader_type" data-validation="required"
                             value="" <?=$disabled?>
                             class="form-control  ">
                        <option value="">اختر</option>
                        <?php
                        $sader_type_arr = array('1'=>'صادر داخلي','2'=>'صادر خارجي');
                        foreach ($sader_type_arr as $key=>$value){
                            ?>
                            <option value="<?= $key?>"
                                <?php
                                if ($sader_type==$key){
                                    echo 'selected';
                                }
                                ?>
                            ><?= $value ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group padding-4 col-md-2 col-xs-12 padding-4">
                    <label class="label ">      ردا علي معاملة </label>
                    <select  type="text" name="mo3mla_reply"
                             value=""
                             class="form-control  ">
                        <option value="">اختر</option>
                        <?php
                            foreach ($arr as $key=>$value){
                                ?>
                                <option value="<?= $key?>"
                                    <?php
                                    if ($mo3mla_reply==$key){
                                        echo 'selected';
                                    }
                                    ?>
                                ><?= $value ?></option>
                                <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-2 col-sm-2 col-xs-12 padding-4">
                    <label class="label"> تاريخ التسجيل  </label>
                    <input type="date" name="tasgel_date"
                           value="<?=date('Y-m-d');?>"
                           class="form-control  " readonly  >
                </div>
            <div class="form-group col-md-1 col-sm-2 col-xs-12 padding-4">
                    <label class="label">  وقت التسجيل  </label>
                    <!-- <input type="time-local" 
                    value="<?=date('TH:i:s');?>"
                           class="form-control  "   > -->
                           <input placeholder="من" id="m13h" class="form-control" type="text" data-validation="required"    value="<?=date('H:i:s');?>"
                            style="width: 100%; float: right;margin-left: 10px;    text-align: center;" >
                </div>
                <input type="hidden" name="ersal_date" value="<?= $ersal_date?>" />
                <div class="form-group col-md-2 col-sm-2 col-xs-12 padding-4">
                    <label class="label"> تاريخ الارسال  </label>
                    <input type="date" name="ersal_date"
                           value="<?= $ersal_date?>"
                           class="form-control  "   >
                </div>
                <input type="hidden" name="ersal_date" value="<?= $ersal_date?>" />
                <div class="form-group col-md-1 col-sm-2 col-xs-12 padding-4">
                    <label class="label"> وقت الارسال  </label>
                    <!-- <input type="time-local" name="ersal_time"
                           value="<?= $ersal_time?>"
                           class="form-control  "   > -->
                           <input  name="ersal_time" id="m12h" class="form-control" type="text" data-validation="required"     value="<?= $ersal_time?>"
                            style="width: 100%; float: right;margin-left: 10px;    text-align: center;" >
                </div>
                  </div>
                <div class="col-xs-12 no-padding">
                <!-- <div class="form-group padding-4 col-md-3 col-xs-12">
                    <label class="label ">   المجلد</label>
                    <input type="text" class="form-control  testButton inputclass"
                           name="folder_name" id="folder_name"
                           readonly="readonly"
                           onclick="$('#mogldModal').modal('show');"
                           ondblclick="$('#mogldModal').modal('show');"
                           style="cursor:pointer;border: white;color: black;width: 82%;float: right;"
                           value="<?php echo $folder_name?>">
                    <input type="hidden" name="folder_id_fk" id="folder_id_fk" value="<?= $folder_id_fk?>">
                    <input type="hidden" name="folder_path" id="folder_path" value="<?= $folder_path?>">
                    <button type="button"  onclick="$('#mogldModal').modal('show');" <?=$disabled?>
                            class="btn btn-success btn-next" >
                        <i class="fa fa-plus"></i></button>
                </div> -->
                <div class="form-group padding-4 col-md-3 col-xs-12">
    <label class="label ">   المجلد</label>
    <input type="text" class="form-control  testButton inputclass"
           name="folder_name" id="folder_name"
           readonly="readonly"
           onclick="get_folders()" <?=$disabled?>
           style="cursor:pointer;border: white;color: black;width: 82%;float: right;"
           value="<?php echo $folder_name?>">
    <input type="hidden" name="folder_id_fk" id="folder_id_fk" value="<?= $folder_id_fk?>">
    <input type="hidden" name="folder_path" id="folder_path" value="<?= $folder_path?>">
    <button type="button"   onclick="get_folders()" <?=$disabled?>
            class="btn btn-success btn-next" >
        <i class="fa fa-plus"></i></button>
</div>
                <!-- <div class="form-group padding-4 col-md-2 col-xs-12">
                    <label class="label ">    نوع الخطاب</label>
                    <input type="text" class="form-control  testButton inputclass"
                           name="no3_khtab_n" id="no3_khtab_n"
                           readonly="readonly"
                           onclick="$('#myModal').modal('show'); load_page(201);changePage('     نوع الخطاب','no3_khtab_fk', 'no3_khtab_n');"
                           ondblclick="$('#myModal').modal('show');load_page(201);changePage('     نوع الخطاب','no3_khtab_fk', 'no3_khtab_n');"
                           style="cursor:pointer;border: white;color: black;width: 80%;float: right;"
                           data-validation="required"
                           value="<?= $no3_khtab_n?>">
                    <input type="hidden" name="no3_khtab_fk" id="no3_khtab_fk" value="<?= $no3_khtab_fk?>">
                    <input type="hidden" id="page" data-id="" data-title="" data-typee="" data-colname="">
                    <button type="button"  onclick="$('#myModal').modal('show');load_page(201);changePage('     نوع الخطاب','no3_khtab_fk', 'no3_khtab_n');"
                            class="btn btn-success btn-next" >
                        <i class="fa fa-plus"></i></button>
                </div> -->
                <div class="form-group col-md-3 col-sm-6 padding-4" 
                     >
                    <label class="label  ">نوع الخطاب</label>
                    <input type="text" name="no3_khtab_n" id="no3_khtab_n" value="<?php echo $no3_khtab_n ?>"
                           class="form-control testButton inputclass" data-validation="required" 
                           style="cursor:pointer; width:85%;float: right;" autocomplete="off" 
                           ondblclick="$(this).attr('readonly','readonly'); $('#Modal_no3_khtab').modal('show');get_details_no3_khtab();"
                           onblur="$(this).attr('readonly','readonly')"
                           onkeypress="return isNumberKey(event);"
                           readonly>
                           <input type="hidden" name="no3_khtab_fk" id="no3_khtab_fk" 
                           value="<?php echo $no3_khtab_fk;?>" class="form-control "
                           data-validation-has-keyup-event="true" readonly>
                    <button type="button" data-toggle="modal" data-target="#Modal_no3_khtab" 
                    onclick="get_details_no3_khtab()"
                            class="btn btn-success btn-next">
                        <i class="fa fa-plus"></i></button>
                </div>
                <!-- <div class="form-group padding-4 col-md-2 col-xs-12">
                    <label class="label ">   عنوان الموضوع</label>
                    <input type="text" class="form-control  testButton inputclass"
                           name="mawdo3_name" id="mawdo3_name"
                           readonly="readonly"
                           onclick="$('#myModal').modal('show'); load_page(601);changePage('اسم الموضوع','', 'mawdo3_name');"
                           style="cursor:pointer;border: white;color: black;width: 80%;float: right;"
                           data-validation="required"
                           value="<?= $mawdo3_name?>">
                    <button type="button"
                            onclick="$('#myModal').modal('show'); load_page(601);changePage('اسم الموضوع','', 'mawdo3_name');"
                            class="btn btn-success btn-next" >
                        <i class="fa fa-plus"></i></button>
                </div> -->
<!--                 
                <div class="form-group col-md-2 col-sm-4 padding-4">
                      <label class="label">عنوان الموضوع</label>
                      <input type="text" class="form-control" placeholder="" name="mawdo3_name" value="<?= $mawdo3_name; ?>"
                      data-validation="required" 
                      />
                    </div> -->
                    <div class="form-group col-md-3 col-sm-4 padding-4" 
                     >
                    <label class="label  ">عنوان الموضوع </label>
                    <input type="text" name="mawdo3_name" id="mawdo3_name" value="<?php echo $mawdo3_name ?>"
                           class="form-control testButton inputclass"
                           style="cursor:pointer; width:85%;float: right;" autocomplete="off" 
                           ondblclick="$(this).attr('readonly','readonly'); $('#Modal_title').modal('show');get_details_title();"
                           onblur="$(this).attr('readonly','readonly')"
                           onkeypress="return isNumberKey(event);"
                           readonly>
                           <input type="hidden" name="title_id_fk" id="title_id_fk" 
                           value="<?php echo $title_id_fk;?>" class="form-control "
                           data-validation-has-keyup-event="true" readonly>
                    <button type="button" data-toggle="modal" data-target="#Modal_title" 
                    onclick="get_details_title()"
                            class="btn btn-success btn-next" style="">
                        <i class="fa fa-plus"></i></button>
                </div>
                <!-- <div class="form-group padding-4 col-md-2 col-xs-12">
                    <label class="label ">    طريقة الارسال</label>
                    <input type="text" class="form-control  testButton inputclass"
                           name="tarekt_ersal_n" id="tarekt_ersal_n"
                           readonly="readonly"
                           onclick="$('#myModal').modal('show'); load_page(401);changePage(' طريقة الارسال','tarekt_ersal_fk', 'tarekt_ersal_n');"
                           style="cursor:pointer;border: white;color: black;width: 80%;float: right;"
                           data-validation="required"
                           value="<?= $tarekt_ersal_n?>">
                    <input type="hidden" name="tarekt_ersal_fk" id="tarekt_ersal_fk" value="<?= $tarekt_ersal_fk?>">
                    <button type="button"
                            onclick="$('#myModal').modal('show'); load_page(401);changePage('طريقة الارسال','tarekt_ersal_fk', 'tarekt_ersal_n');"
                            class="btn btn-success btn-next" >
                        <i class="fa fa-plus"></i></button>
                </div> -->
                   <div class="form-group col-md-1 col-sm-4 col-xs-12 padding-4">
                    <label class="label">  عدد المرفقات </label>
                    <input type="number" name="morfaq_num"
                           value="<?= $morfaq_num?>"
                           onkeypress="validate_number(event)"
                           class="form-control  "   >
                </div>
                            <div class="form-group col-md-2 col-sm-6 padding-4" 
                     >
                    <label class="label  ">طريقه الارسال </label>
                    <input type="text" name="tarekt_ersal_n" id="tarekt_ersal_n"value="<?php if (!empty($tareket_estlam)) {
                foreach($tareket_estlam as $tareqa){
                   echo $tareqa->estlam_fk_name;
                   echo ',';
                }} else {
                     echo 'غير محدد';
                }
?>"
                           class="form-control testButton inputclass" data-validation="required" 
                           style="cursor:pointer; width:77%;float: right;" autocomplete="off" 
                           ondblclick="$(this).attr('readonly','readonly'); $('#Modal_estlam').modal('show'); get_details_estlam();"
                           onblur="$(this).attr('readonly','readonly')"
                           onkeypress="return isNumberKey(event);"
                           readonly>
                           <input type="hidden" name="tarekt_ersal_fk" id="tarekt_ersal_fk" 
                           value="" class="form-control "
                           data-validation-has-keyup-event="true" readonly>
                    <button type="button" data-toggle="modal" data-target="#Modal_estlam" 
                    onclick="get_details_estlam()"
                            class="btn btn-success btn-next">
                        <i class="fa fa-plus"></i></button>
                </div>
               <!-- <div class="form-group col-md-2 col-sm-6 padding-4" 
                     >
                    <label class="label  ">طريقه الارسال </label>
                    <input type="text" name="tarekt_ersal_n" id="tarekt_ersal_n" value="<?php echo $tarekt_ersal_n ?>"
                           class="form-control testButton inputclass" data-validation="required" 
                           style="cursor:pointer; width:80%;float: right;" autocomplete="off" 
                           ondblclick="$(this).attr('readonly','readonly'); $('#Modal_estlam').modal('show'); get_details_estlam();"
                           onblur="$(this).attr('readonly','readonly')"
                           onkeypress="return isNumberKey(event);"
                           readonly>
                           <input type="hidden" name="tarekt_ersal_fk" id="tarekt_ersal_fk" 
                           value="<?php echo $tarekt_ersal_fk;?>" class="form-control "
                           data-validation-has-keyup-event="true" readonly>
                    <button type="button" data-toggle="modal" data-target="#Modal_estlam" 
                    onclick="get_details_estlam()"
                            class="btn btn-success btn-next">
                        <i class="fa fa-plus"></i></button>
                </div>-->
                  </div>
                <div class="col-xs-12 no-padding">
                <div class="form-group padding-4 col-md-2 col-xs-12">
                    <label class="label ">     درجة السريه</label>
                    <select  type="text" name="is_secret" id="is_secret" data-validation="required"  
                             value="" 
                             class="form-control  ">
                        <option value="">اختر</option>
                        <?php
                        if (isset($secret) && !empty($secret)){
                        foreach ($secret as $row){
                            ?>
                            <option value="<?= $row->id?>" style="color:<?=$row->color?>" 
                                <?php
                                if ($is_secret==$row->id){
                                    echo 'selected';
                                }
                                ?>
                            ><?= $row->title?></option>
                        <?php
                        }}
                        ?>
                    </select>
                </div>
                <div class="form-group padding-4 col-md-4 col-xs-12">
                    <label class="label ">     الجهة المرسل اليها</label>
                    <input type="text" class="form-control  testButton inputclass"
                           name="geha_morsel_n" id="geha_morsel_n" data-validation="required" 
                           readonly="readonly"
                           onclick="$('#gehatModal').modal('show'); get_details_geha_type();"
                           style="cursor:pointer;border: white;color: black;width: 89%;float: right;"
                           value="<?= $geha_morsel_n?>">
                    <input type="hidden" name="geha_morsel_fk" id="geha_morsel_fk" value="<?= $geha_morsel_fk?>">
                    <button type="button"
                            onclick="$('#gehatModal').modal('show');get_details_geha_type();"
                            class="btn btn-success btn-next" >
                        <i class="fa fa-plus"></i></button>
                </div>
                 <!--start 12-2-2020 rehab.dev------------------------------------------>
                <!--onclick="$('#gehatModal').modal('show');changegeha('geha_ekhtsas_fk','geha_ekhtsas_n')"-->
                <div class="form-group padding-4 col-md-3 col-xs-12">
                    <label class="label "> جهة الاختصاص</label>
                    <input type="text" class="form-control  testButton inputclass"
                           name="geha_ekhtsas_n" id="geha_ekhtsas_n"
                           readonly="readonly"
                           onclick="load_geha_ektsas();"
                           style="cursor:pointer;border: white;color: black;width: 82%;float: right;"
                           value="<?= $geha_ekhtsas_n ?>">
                    <input type="hidden" name="geha_ekhtsas_fk" id="geha_ekhtsas_fk" value="<?= $geha_ekhtsas_fk ?>">
                    <input type="hidden" id="geha" data-id="" data-title="">
                    <button type="button"
                            onclick="load_geha_ektsas();"
                            class="btn btn-success btn-next">
                        <i class="fa fa-plus"></i></button>
                </div>
                <!-- end 12-2-2020 rehab.dev------------------------------------------>
                <div class="form-group padding-4 col-md-3 col-xs-12">
                    <label class="label ">    اسم المستلم</label>
                    <input type="text" class="form-control  testButton inputclass"
                           name="mostlem_name" id="mostlem_name"
                           readonly="readonly"
                           onclick="load_mostlem();"
                           style="cursor:pointer;border: white;color: black;width: 82%;float: right;"
                           value="<?= $mostlem_name?>">
                    <button type="button"  onclick="load_mostlem();"
                            class="btn btn-success btn-next" >
                        <i class="fa fa-plus"></i></button>
                </div>
                <div class="form-group padding-4 col-md-2 col-xs-12">
                    <label class="label ">     الأولوية</label>
                    <select  type="text" name="awlawia_fk"
                             value=""
                             class="form-control  "   data-validation="required">
                        <option value="">اختر</option>
                        <?php
                        $priority = array('1'=>'عادي','2'=>'هام','3'=>'هام جدا');
                        foreach ($priority as $key=>$value){
                            ?>
                            <option value="<?= $key?>"
                                <?php
                                if ($awlawia_fk==$key){
                                    echo 'selected';
                                }
                                ?>
                            ><?= $value?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group padding-4 col-md-1 col-xs-12">
                    <label class="label ">     يحتاج متابعة</label>
                    <select  type="text" name="need_follow" onchange="get_disable()" id="need_follow"
                             class="form-control  ">
                        <?php
                        foreach ($arr as $key=>$value){
                            ?>
                            <option value="<?= $key?>"
                                <?php
                                if ($need_follow==$key){
                                    echo 'selected';
                                }
                                ?>
                            ><?= $value?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-2 col-sm-2 col-xs-12 padding-4">
                    <label class="label"> تاريخ الاستحقاق  </label>
                    <input type="date" name="esthkak_date"  id="esthkak_dates"
                           value="<?= $esthkak_date ?>"
                           class="form-control  "   >
                </div>
                <div class="form-group col-md-1 col-sm-2 col-xs-12 padding-4">
                    <label class="label"> وقت الاستحقاق  </label>
                    <!-- <input type="time-local" name="esthkak_time"
                           value="<?= $esthkak_time ?>"
                           class="form-control  "   > -->
                           <input  name="esthkak_time" id="m14h" class="form-control" type="text" data-validation="required"    value="<?= $esthkak_time ?>"
                            style="width: 100%; float: right;margin-left: 10px;    text-align: center;" > 
                </div>
                <div class="form-group col-md-6 col-sm-4  padding-4">
                    <label class="label">  ملاحظات  </label>
                    <input type="text" name="notes"
                           value="<?= $notes?>"
                           class="form-control  "   >
                </div>
                <div class="form-group col-md-12 col-sm-4  padding-4">
                    <label class="label ">    الموضوع</label>
<!-- 
                    <input type="text" name="mawdo3_subject"
                           value="<?= $mawdo3_subject?>"
                           class="form-control  "   > -->
                           <textarea class="form-control" placeholder="" name="mawdo3_subject"
                         data-validation="required"
                         ><?= $mawdo3_subject; ?></textarea>
                </div>
                </div>
            <div class="  text-center col-xs-12">
            <input type="hidden" name="add" value="add"/>
           <?php if (isset($get_sader) && !empty($get_sader)){?>
                <button type="submit" <?=$disabled_action?> class="btn btn-labeled btn-success " name="add" value="add"   >
                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                </button> 
                <?=$sapn_action?>
           <?php }else{?>
         
                <button type="button" id="buttons" class="btn btn-labeled btn-success " onclick="save_sader()"
                                        name="add" value="add">
                                                    <span class="btn-label"><i
                                                                class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                </button>
                               
           <?php }?>
            </div>
            <?php
            echo form_close();
            ?>
        </div>
    </div>
</div>

<!-- new -->
<!-- new -->
<!--  -->
<div class="modal fade"  id="tahwelModal_mosalm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title title ">  اسناد الي</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                <div class="radio-content">
                    <input type="radio" id="esnad" name="esnad_to"  class="sarf_types" value="1" onclick="load_tahwel_emp()">
                    <label for="esnad" class="radio-label"> موظف</label>
                </div>
                <!-- <div class="radio-content">
                    <input type="radio" id="esnad2" name="esnad_to"  class="sarf_types" value="2" onclick="load_tahwel()">
                    <label for="esnad2" class="radio-label"> قسم</label>
                </div> -->
                </div>
                <div class="col-xs-12" id="tawel_result_mosalm" style="display: none;">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<!--  -->
<div class="modal fade" id="myModal_end" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal">&times;
                </button>
                <h4 class="modal-title"> انهاء المعامله :
                </h4>
            </div>
            <div class="modal-body">
            <div id="reason_show">
                    <div class="col-sm-12 form-group">
                        <div class="col-sm-12 form-group">
                            <div class="col-sm-3  col-md-3 padding-4 ">
                                <button type="button" class="btn btn-labeled btn-success "
                                        onclick="$('#geha_input6').show(); show_add()"
                                        style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                                    <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>اضافه سبب انهاء المعامله
                                </button>
                            </div>
                        </div>
                        <div class="col-sm-12 no-padding form-group">
                            <div id="geha_input6" style="display: none">
                                <div class="col-sm-3  col-md-5 padding-2 ">
                                    <label class="label   ">سبب انهاء المعامله </label>
                                    <input type="text" name="reason_setting" id="reason_setting" data-validation="required"
                                           value=""
                                           class="form-control ">
                                    <input type="hidden" class="form-control" id="s_id" value="">
                                </div>
                                <div class="col-sm-3  col-md-2 padding-4" id="div_add_reason_setting" style="display: block;">
                                    <button type="button" onclick="add_reason_setting($('#reason_setting').val())"
                                            style="    margin-top: 27px;"
                                            class="btn btn-labeled btn-success" name="save" value="save">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                    </button>
                                </div>
                                <div class="col-sm-3  col-md-3 padding-4" id="div_update_reason_setting" style="display: none;">
                                    <button type="button"
                                            class="btn btn-labeled btn-success " name="save" value="save" id="update_reason_setting">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>تعديل
                                    </button>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
            </div>
              <div id="end">
               </div>
             </div>
       </div>
   </div>
</div>
</div>
<!-- new -->
<!-- new -->
<!-- gehatModal  -->
<div class="modal fade" id="gehatModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title  "> الجهات </h4>
            </div>
            <div class="modal-body">
<div id="travel_type_show">
    <div class="col-sm-12 form-group">
        <div class="col-sm-12 form-group">
            <div class="col-sm-3  col-md-3 padding-4 ">
                <button type="button" class="btn btn-labeled btn-success "
                        onclick="$('#geha_input').show(); show_add()"
                        style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                    <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>
                 اضافه جهه اساسيه
                </button>
            </div>
        </div>
        <div class="col-sm-12 no-padding form-group">
            <div id="geha_input" style="display: none">
                <div class="col-sm-3  col-md-5 padding-2 ">
                    <label class="label   ">اضافه جهه اساسيه </label>
                    <input type="text" name="geha_name" id="geha_name" data-validation="required"
                           value=""
                           class="form-control ">
                    <input type="hidden" class="form-control" id="s_id" value="">
                </div>
                <div class="col-sm-3  col-md-2 padding-4" id="div_add_geha_type" style="display: block;">
                    <button type="button" onclick="add_geha_type($('#geha_name').val())"
                            style="    margin-top: 27px;"
                            class="btn btn-labeled btn-success" name="save" value="save">
                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                    </button>
                </div>
                <div class="col-sm-3  col-md-3 padding-4" id="div_update_geha_type" style="display: none;">
                    <button type="button"
                            class="btn btn-labeled btn-success " name="save" value="save" id="update_geha_type">
                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>تعديل
                    </button>
                </div>
            </div>
        </div>
        <br>
        <br>
    </div>
    <div id="myDiv_geha"><br><br>
    </div>
</div>
</div>
<div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
            </div>
            </div>
        </div>
    </div>
</div>
<!-- gehatModal  -->
<!-- gehatModal  -->
<div class="modal fade" id="mogldModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title  "> المجلد </h4>
            </div>
            <div class="modal-body" id="load_folders">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<!-- gehatModal  -->
<!-- myModal Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title title ">  </h4>
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
<div class="modal fade" id="mostlemModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title "> اسم المستلم </h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="col-sm-12 form-group">
                        <div class="col-sm-12 form-group">
                            <div class="col-sm-3  col-md-3 padding-4 ">
                                <button type="button" class="btn btn-labeled btn-success "
                                        onclick="$('#mostlm_input').show(); "
                                        style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                                    <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>
                                    اضافه مستلم
                                </button>
                            </div>
                        </div>
                        <div class="col-sm-12 no-padding form-group">
                            <div id="mostlm_input" style="display: none">
                                <div class="col-sm-3  col-md-5 padding-2 ">
                                    <label class="label   ">  إسم المسؤول </label>
                                    <input type="text" name="mostlm_name" id="mostlm_name" data-validation="required"
                                           value=""
                                           class="form-control ">
                                    <input type="hidden" class="form-control" id="mostlm_geha_id" value="">
                                </div>
                                <div class="form-group padding-4 col-md-3">
                                    <label class="label "> صفه المسؤول</label>
                                    <input type="text" name="safms2ol_name" id="safms2ol_name" value=""
                                           class="form-control" data-validation="required"
                                           style="cursor:pointer; width:80%;float: right;" autocomplete="off"
                                           onclick="$(this).attr('readonly','readonly'); $('#Modal_safms2ol').modal('show');get_details_safms2ol();"
                                           onblur="$(this).attr('readonly','readonly')"
                                           onkeypress="return isNumberKey(event);"
                                           readonly>
                                    <input type="hidden" name="safms2ol_fk" id="safms2ol_fk" value="" >
                                    <button type="button" data-toggle="modal" data-target="#Modal_safms2ol"
                                            onclick="get_details_safms2ol()"
                                            class="btn btn-success btn-next">
                                        <i class="fa fa-plus"></i></button>
                                </div>
                                <div class="col-sm-3  col-md-2 padding-4" id="div_add_mostlm" style="display: block;">
                                    <button type="button" onclick="add_mostlm()"
                                            style="margin-top: 27px;"
                                            class="btn btn-labeled btn-success" name="save" value="save">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                    </button>
                                </div>
                                <div class="col-sm-3  col-md-3 padding-4" id="div_update_mostlm" style="display: none;">
                                    <button type="button" style="margin-top: 27px;"
                                            class="btn btn-labeled btn-success " name="save" value="save" id="update_mostalm" >
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>تعديل
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12" id="output_mostlem">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<!-- yara -->
<!-- new -->
<div class="modal fade" id="Modal_estlam" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title ">  طريقه الارسال  </h4>
            </div>
            <div class="modal-body">
            <div id="estlam_show">
                    <div class="col-sm-12 form-group">
                        <div class="col-sm-12 form-group">
                            <div class="col-sm-3  col-md-3 padding-4 ">
                                <button type="button" class="btn btn-labeled btn-success "
                                        onclick="$('#geha_input1111').show(); show_add()"
                                        style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                                    <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>
                                    اضافه  طريقه الارسال
                                </button>
                            </div>
                        </div>
                        <div class="col-sm-12 no-padding form-group">
                            <div id="geha_input1111" style="display: none">
                                <div class="col-sm-3  col-md-5 padding-2 ">
                                    <label class="label   "> طريقه الارسال </label>
                                    <input type="text" name="estlam" id="estlam" data-validation="required"
                                           value=""
                                           class="form-control ">
                                    <input type="hidden" class="form-control" id="s_id" value="">
                                </div>
                                <div class="col-sm-3  col-md-2 padding-4" id="div_add_estlam" style="display: block;">
                                    <button type="button" onclick="add_estlam($('#estlam').val())"
                                            style="    margin-top: 27px;"
                                            class="btn btn-labeled btn-success" name="save" value="save">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                    </button>
                                </div>
                                <div class="col-sm-3  col-md-3 padding-4" id="div_update_estlam" style="display: none;">
                                    <button type="button"
                                            class="btn btn-labeled btn-success " name="save" value="save" id="update_estlam">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>تعديل
                                    </button>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                    </div>
                    <div id="myDiv"><br><br>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">اغلاق</button>
            </div>
        </div>
    </div>
</div>
</div>
<!-- detailsModal -->
<div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="text-align: center;">التفاصيل</h4>
            </div>
            <div class="modal-body" style="padding: 10px 0" id="result">
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%;">
                <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<!-- barcodeModal-->
<div class="modal fade" id="barcodeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="text-align: center;">نموذج الطباعة </h4>
            </div>
            <div class="modal-body" style="padding: 10px 0" id="result">
                <div class="col-sm-12">
                    <div id="div_print" ></div>
                </div>
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%;">
                <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>
                <!--
                <button type="button" onclick="printdiv('printableArea');" class="btn btn-success"  >طباعة</button>
               -->
                <button
                        type="button" onclick="printdiv('printableArea')"
                        class="btn btn-labeled btn-purple ">
                    <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعة
                </button>
            </div>
        </div>
    </div>
</div>
<!-- yara -->
<!-- new -->
<div class="modal fade" id="Modal_no3_khtab" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title ">   نوع الخطاب  </h4>
            </div>
            <div class="modal-body">
            <div id="no3_khtab_show">
                    <div class="col-sm-12 form-group">
                        <div class="col-sm-12 form-group">
                            <div class="col-sm-3  col-md-3 padding-4 ">
                                <button type="button" class="btn btn-labeled btn-success "
                                        onclick="$('#geha_input11112').show(); show_add()"
                                        style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                                    <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>
                                    اضافه   نوع الخطاب
                                </button>
                            </div>
                        </div>
                        <div class="col-sm-12 no-padding form-group">
                            <div id="geha_input11112" style="display: none">
                                <div class="col-sm-3  col-md-5 padding-2 ">
                                    <label class="label   ">  نوع الخطاب </label>
                                    <input type="text" name="no3_khtab" id="no3_khtab" data-validation="required"
                                           value=""
                                           class="form-control ">
                                    <input type="hidden" class="form-control" id="s_id" value="">
                                </div>
                                <div class="col-sm-3  col-md-2 padding-4" id="div_add_no3_khtab" style="display: block;">
                                    <button type="button" onclick="add_no3_khtab($('#no3_khtab').val())"
                                            style="    margin-top: 27px;"
                                            class="btn btn-labeled btn-success" name="save" value="save">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                    </button>
                                </div>
                                <div class="col-sm-3  col-md-3 padding-4" id="div_update_no3_khtab" style="display: none;">
                                    <button type="button"
                                            class="btn btn-labeled btn-success " name="save" value="save" id="update_no3_khtab">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>تعديل
                                    </button>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                    </div>
                    <div id="myDiv_no3_khtab"><br><br>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">اغلاق</button>
            </div>
        </div>
    </div>
</div>
</div>
<!-- new -->
<!-- yara -->
<div class="modal fade" id="Modal_title" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title ">   عنوان الموضوع </h4>
            </div>
            <div class="modal-body">
                <div id="title_show">
                    <div class="col-sm-12 form-group">
                        <div class="col-sm-12 form-group">
                            <div class="col-sm-3  col-md-3 padding-4 ">
                                <button type="button" class="btn btn-labeled btn-success "
                                        onclick="$('#input1111').show(); show_add()"
                                        style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                                    <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>
                                    اضافه عنوان الموضوع 
                                </button>
                            </div>
                        </div>
                        <div class="col-sm-12 no-padding form-group">
                            <div id="input1111" style="display: none">
                                <div class="col-sm-3  col-md-5 padding-2 ">
                                    <label class="label   "> عنوان الموضوع  </label>
                                    <input type="text" name="title" id="title" data-validation="required"
                                           value=""
                                           class="form-control ">
                                    <input type="hidden" class="form-control" id="s_id" value="">
                                </div>
                                <div class="col-sm-3  col-md-2 padding-4" id="div_add_title" style="display: block;">
                                    <button type="button" onclick="add_title($('#title').val())"
                                            style="    margin-top: 27px;"
                                            class="btn btn-labeled btn-success" name="save" value="save">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                    </button>
                                </div>
                                <div class="col-sm-3  col-md-3 padding-4" id="div_update_title" style="display: none;">
                                    <button type="button"
                                            class="btn btn-labeled btn-success " name="save" value="save" id="update_title">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>تعديل
                                    </button>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                    </div>
                    <div id="myDiv_title_sub"><br><br>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">اغلاق</button>
            </div>
        </div>
    </div>
</div>
<!--  start 12-2-2020 gehatektsasModal  -->
<div class="modal fade" id="gehatektsasModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title  "> الجهات الاختصاص </h4>
            </div>
            <div class="modal-body">
              <div class="container-fluid">
                <div id="geha_ektsas_show">
                    <div class="col-sm-12 form-group">
                            <div class="col-sm-3  col-md-3 padding-4 ">
                                <button type="button" class="btn btn-labeled btn-success "
                                        onclick="$('#geha_ektsas_input').show();"
                                        style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                                    <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>
                                    اضافه جهه اختصاص
                                </button>
                            </div>
                        <div class="col-sm-12 no-padding form-group">
                            <div id="geha_ektsas_input" style="display: none">
                                <div class="col-sm-3  col-md-5 padding-2 ">
                                    <label class="label   "> إسم جهه الاختصاص </label>
                                    <input type="text" name="name" id="name" data-validation="required"
                                           value=""
                                           class="form-control ">
                                    <input type="hidden" class="form-control" id="id" value="">
                                </div>
                                <div class="form-group col-md-4 padding-4">
                                    <div class="col-sm-3  col-md-2 padding-4" id="div_add_geha_ektsas"
                                         style="display: block;">
                                        <button type="button" onclick="add_geha_ektsas($('#geha_morsel_fk').val())"
                                                style="    margin-top: 27px;"
                                                class="btn btn-labeled btn-success" name="save" value="save">
                                            <span class="btn-label"><i
                                                        class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                        </button>
                                    </div>
                                    <div class="col-sm-3  col-md-3 padding-4" id="div_update_geha_ektsas"
                                         style="display: none;">
                                        <button type="button"
                                                class="btn btn-labeled btn-success " name="save" value="save"
                                                id="update_geha_ektsas">
                                            <span class="btn-label"><i
                                                        class="glyphicon glyphicon-floppy-disk"></i></span>تعديل
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br><br>
                    </div>
                    <div id="myDiv_geha_ektsas"><br><br></div>
                </div>
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="Modal_safms2ol" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title ">   صفه المسؤول </h4>
            </div>
            <div class="modal-body">
                <div id="mohema_n_show">
                    <div class="col-sm-12 form-group">
                        <div class="col-sm-12 form-group">
                            <div class="col-sm-3  col-md-3 padding-4 ">
                                <button type="button" class="btn btn-labeled btn-success "
                                        onclick="$('#safms2ol_input').show(); show_add()"
                                        style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                                    <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>
                                    اضافه صفه المسؤول
                                </button>
                            </div>
                        </div>
                        <div class="col-sm-12 no-padding ">
                            <div id="safms2ol_input" style="display: none">
                                <div class="col-sm-3  col-md-5 padding-2 ">
                                    <label class="label ">  صفه المسؤول </label>
                                    <input type="text" name="safms2ol" id="safms2ol" data-validation="required"
                                           value=""
                                           class="form-control ">
                                    <input type="hidden" class="form-control" id="s_id" value="">
                                </div>
                                <div class="col-sm-3  col-md-2 padding-4" id="div_add_safms2ol" style="display: block;">
                                    <button type="button" onclick="add_safms2ol($('#safms2ol').val())"
                                            style="    margin-top: 27px;"
                                            class="btn btn-labeled btn-success" name="save" value="save">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                    </button>
                                </div>
                                <div class="col-sm-3  col-md-3 padding-4" id="div_update_safms2ol" style="display: none;">
                                    <button type="button" style="margin-top: 27px;"
                                            class="btn btn-labeled btn-success " name="save" value="save" id="update_safms2ol">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>تعديل
                                    </button>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                    </div>
                </div>
                <div class="col-sm-12 no-padding ">
                    <div id="myDiv_safms2ol">
                        <br><br>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">اغلاق</button>
            </div>
        </div>
    </div>
</div>
<script>
    function GetgehaektsasName(id,name) {
        $('#geha_ekhtsas_fk').val(id);
        $('#geha_ekhtsas_n').val(name);
        $('#gehatektsasModal').modal('hide');
    }
</script>
<script>
    function load_geha_ektsas(geha) {
        // $('#pop_rkm').text(rkm);
        var geha_id = $('#geha_morsel_fk').val();
        console.log(geha_id);
        if (geha_id != '') {
            $('#gehatektsasModal').modal('show');
            //  console.log(geha_id);
            $.ajax({
                type: 'post',
                url: '<?php echo base_url()?>all_secretary/archive/sader/Add_sader/load_gehat_ektsas',
                data: {geha: geha_id},
                dataType: 'html',
                cache: false,
                beforeSend: function () {
                    $('#myDiv_geha_ektsas').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
                },
                success: function (html) {
                    $("#myDiv_geha_ektsas").html(html);
                    //get_details_geha_ektsas(geha_id);
                }
            });
        } else {
            swal({
                title: "من فضلك اختر الجهة المرسل اليها اولا ! ",
                type: "warning",
                confirmButtonClass: "btn-warning"
            });
        }
    }
</script>
<script>
    function add_geha_ektsas(id) {
        $('#div_update_geha_ektsas').hide();
        $('#div_add_geha_ektsas').show();
        //  alert(value);
        var name=$("#name").val();
        var geha=id;
        if (name != 0 && name != '') {
            var dataString = 'name=' + name+'&geha='+ id ;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>all_secretary/archive/gehat/Gehat/add_gehat_ektsas',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $('#name').val('');
                    swal({
                        title: "تم الحفظ بنجاح!",
                    });
                    load_geha_ektsas(geha);
                }
            });
        }
        else
        {
            swal({ title: "برجاء ادخال البيانات!", });
        }
    }
</script>
<script>
    function update_geha_ektsas(id,geha) {
        var id = id;
        $('#div_add_geha_ektsas').hide();
        $('#div_update_geha_ektsas').show();
        $.ajax({
            url: "<?php echo base_url() ?>all_secretary/archive/gehat/Gehat/getById_gehat_ektsas",
            type: "Post",
            dataType: "html",
            data: {id: id},
            success: function (data) {
                var obj = JSON.parse(data);
                //console.log(obj);
                $('#name').val(obj.name);
                $('#id').val(obj.id);
            }
        });
        $('#update_geha_ektsas').on('click', function () {
            var id=$("#id").val();
            var name=$("#name").val();
            var dataString = 'id=' + id+'&name=' + name;
            $.ajax({
                url: "<?php echo base_url() ?>all_secretary/archive/gehat/Gehat/update_gehat_ektsas",
                type: "Post",
                dataType: "html",
                data: dataString,
                success: function (html) {
                    //  alert('hh');
                    $('#name').val('');
                    $('#div_update_geha_ektsas').hide();
                    $('#div_add_geha_ektsas').show();
                    swal({
                        title: "تم التعديل بنجاح!",
                    });
                    load_geha_ektsas(geha);
                }
            });
        });
    }
</script>
<script>
    function delete_geha_ektsas(id,geha) {
        var r = confirm('هل انت متاكد من الحذف ?');
        if (r == true) {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>all_secretary/archive/gehat/Gehat/delete_gehat_ektsas',
                data: {id: id},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    swal({
                        title: "تم الحذف بنجاح!",
                    });
                    load_geha_ektsas(geha);
                }
            });
        }
    }
</script>
<!-- end 12-2-2020 gehatektsasModal  -->
<script>
    function load_details(row_id) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_secretary/archive/sader/Add_sader/load_details",
            data: {row_id:row_id},
            success: function (d) {
                $('#result').html(d);
            }
        });
    }
</script>
<script>
    function changePage(text,id,title) {
        $('.title').text(text);
        $('#page').data('id', id);
        $('#page').data('title', title);
    }
</script>
<script>
    function load_page(type) {
        $.ajax({
            type: 'post',
            url: '<?php echo base_url()?>all_secretary/archive/sader/Add_sader/load_modal' ,
            data: {type:type},
            dataType: 'html',
            cache: false,
            success: function (html) {
                $("#output").html(html);
            }
        });
    }
</script>
<script>
    function GetName(id, name) {
        var title_fk = $('#page').data("id");
        var title_n = $('#page').data("title");
        $('#' + title_fk).val(id);
        $('#' + title_n).val(name);
        $('#myModal').modal('hide');
    }
</script>
<script>
    function load_mostlem() {
        var geha_id = $('#geha_morsel_fk').val();
        if (geha_id !=''){
            $('#mostlemModal').modal('show');
          //  console.log(geha_id);
            $.ajax({
                type: 'post',
                url: '<?php echo base_url()?>all_secretary/archive/sader/Add_sader/load_modal',
                data: {geha_id:geha_id},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $("#output_mostlem").html(html);
                }
            });
        }  else{
            swal({
                     title: "من فضلك اختر الجهة المرسل اليها اولا ! ",
                     type: "warning",
                     confirmButtonClass: "btn-warning"
                });
        }
    }
</script>
<script>
    function GetgehaName(id, name) {
        var title_fk = $('#geha').data("id");
        var title_n = $('#geha').data("title");
        $('#' + title_fk).val(id);
        $('#' + title_n).val(name);
        $('#gehatModal').modal('hide');
        //
        $('#gehat'+id).prop('checked', false);
    }
</script>
<script>
    function changegeha(id,title) {
      //  $('.title').text(text);
        $('#geha').data('id', id);
        $('#geha').data('title', title);
    }
</script>
<script>
    function Getmostlem( name) {
        $('#mostlem_name').val(name);
        $('#mostlemModal').modal('hide');
    }
</script>
<script>
    function GetfolderName(id, name,path) {
        $('#folder_id_fk').val(id);
        $('#folder_name').val(name);
        $('#folder_path').val(path);
        $('#mogldModal').modal('hide');
    }
</script>
<script>
  function add_reason(id) {
var id=id;
    var value=$('#reason_id_fk').val();
    var name=$('#reason_name').val();
    var to_user_n=$('#to_user_n').val();
    var to_user_id=$('#to_user_id').val();
    var from_user_n=$('#from_user_n').val();
    var date_end=$('#date_end').val();
    var num_end=$('#num_end').val();
      if (value != 0 && value != '' && name != 0 && name != '' && to_user_n != 0 && to_user_n != '' && from_user_n != 0 && from_user_n && num_end != 0 && num_end  ) {
          $.ajax({
              type: 'post',
              url: '<?php echo base_url() ?>all_secretary/archive/sader/Add_sader/add_reason_end',
              data: {id:id,value:value,name:name,to_user_n:to_user_n,to_user_id:to_user_id,from_user_n:from_user_n,date_end:date_end,num_end:num_end},
              dataType: 'html',
              cache: false,
              success: function (html) {
                $('#myModal_end').modal('hide');
                  swal({
                      title: "تم انهاء المعامله بنجاح!",
      }
      );
      window.location.reload();
// $('#update_reason').hide();
// $('#span_reason').append("<span class='label label-success' style='min-width: 140px;''>تم انهاءالمعامله </span>");
              }
          });
      }
      else
      {
        swal({
                      title: "برجاء ادخال البيانات!",
      }
      );
      }
  }
</script>
<script>
    function getTitle_reason(id,value) {
        $('#reason_id_fk').val(id);
        $('#reason_name').val(value);
        $('#myModal_end').modal('hide');
    }
</script>
<script>
    function get_reason_end() {
        // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_secretary/archive/wared/Add_wared/load_reason",
            beforeSend: function () {
                $('#end').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#end').html(d);
            }
        });
    }
</script>

<!-- yaraa -->
<script>
    function get_details_estlam() {
       // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_secretary/archive/wared/Add_wared/load_estlam",
            beforeSend: function () {
                $('#myDiv').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#myDiv').html(d);
            }
        });
    }
</script>
<script>
    function getTitle_estlam(value,id) {
        $('#tarekt_ersal_fk').val(id);
        $('#tarekt_ersal_n').val(value);
        $('#Modal_estlam').modal('hide');
    }
</script>
<script>
  function add_estlam(value) {
      $('#div_update_estlam').hide();
      $('#div_add_estlam').show();
      //  alert(value);
      if (value != 0 && value != '' ) {
          var dataString = 'estlam=' + value ;
          $.ajax({
              type: 'post',
              url: '<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/add_estlam',
              data: dataString,
              dataType: 'html',
              cache: false,
              success: function (html) {
                //  $('#reason').val(' ');
                $('#estlam').val('');
              //  $('#Modal_esdar').modal('hide');
                  swal({
                      title: "تم الحفظ!",
      }
      );
      get_details_estlam();
              }
          });
      }
  }
</script>
<script>
    function update_estlam(id) {
        var id = id;
        $('#geha_input1111').show();
        $('#div_add_estlam').hide();
        $('#div_update_estlam').show();
        $.ajax({
            url: "<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/getById_estlam",
            type: "Post",
            dataType: "html",
            data: {id: id},
            success: function (data) {
                var obj = JSON.parse(data);
                //console.log(obj);
               console.log(obj.title);
                $('#estlam').val(obj.title);
            }
        });
        $('#update_estlam').on('click', function () {
            var estlam = $('#estlam').val();
            $.ajax({
                url: "<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/update_estlam",
                type: "Post",
                dataType: "html",
                data: {estlam: estlam,id: id},
                success: function (html) {
                    //  alert('hh');
                    $('#estlam').val('');
                    $('#div_update_estlam').hide();
                    $('#div_add_estlam').show();
                   // $('#Modal_esdar').modal('hide');
                    swal({
                        title: "تم التعديل!",
        }
        );
        get_details_estlam();    
                }
            });
        });
    }
</script>
<script>
        function delete_estlam(id) {
        //  confirm('?? ??? ????? ?? ????? ????? ?');
             var r = confirm('هل انت متاكد من الحذف ?');
        if (r == true) {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/delete_estlam',
                data: {id: id},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    //   alert(html);
                    $('#estlam').val('');
                   // $('#Modal_esdar').modal('hide');
                    swal({
                        title: "تم الحذف!",
        }
        );
        get_details_estlam();
                }
            });
        }
    }
</script>
<script>
    function get_details_no3_khtab() {
       // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_secretary/archive/wared/Add_wared/load_no3_khtab",
            beforeSend: function () {
                $('#myDiv_no3_khtab').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#myDiv_no3_khtab').html(d);
            }
        });
    }
</script>
<script>
    function getTitle_no3_khtab(value,id) {
        $('#no3_khtab_fk').val(id);
        $('#no3_khtab_n').val(value);
        $('#Modal_no3_khtab').modal('hide');
    }
</script>
<script>
  function add_no3_khtab(value) {
      $('#div_update_no3_khtab').hide();
      $('#div_add_no3_khtab').show();
      //  alert(value);
      if (value != 0 && value != '' ) {
          var dataString = 'no3_khtab=' + value ;
          $.ajax({
              type: 'post',
              url: '<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/add_no3_khtab',
              data: dataString,
              dataType: 'html',
              cache: false,
              success: function (html) {
                //  $('#reason').val(' ');
                $('#no3_khtab').val('');
              //  $('#Modal_esdar').modal('hide');
                  swal({
                      title: "تم الحفظ!",
      }
      );
      get_details_no3_khtab();
              }
          });
      }
  }
</script>
<script>
    function update_no3_khtab(id) {
        var id = id;
        $('#geha_input11112').show();
        $('#div_add_no3_khtab').hide();
        $('#div_update_no3_khtab').show();
        $.ajax({
            url: "<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/getById_no3_khtab",
            type: "Post",
            dataType: "html",
            data: {id: id},
            success: function (data) {
                var obj = JSON.parse(data);
                //console.log(obj);
               console.log(obj.title);
                $('#no3_khtab').val(obj.title);
            }
        });
        $('#update_no3_khtab').on('click', function () {
            var no3_khtab = $('#no3_khtab').val();
            $.ajax({
                url: "<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/update_no3_khtab",
                type: "Post",
                dataType: "html",
                data: {no3_khtab: no3_khtab,id: id},
                success: function (html) {
                    //  alert('hh');
                    $('#no3_khtab').val('');
                    $('#div_update_no3_khtab').hide();
                    $('#div_add_no3_khtab').show();
                   // $('#Modal_esdar').modal('hide');
                    swal({
                        title: "تم التعديل!",
        }
        );
        get_details_no3_khtab();    
                }
            });
        });
    }
</script>
<script>
        function delete_no3_khtab(id) {
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
                    $('#no3_khtab').val('');
                   // $('#Modal_esdar').modal('hide');
                    swal({
                        title: "تم الحذف!",
        }
        );
        get_details_no3_khtab();
                }
            });
        }
    }
</script>
<script>
  function add_reason_setting(value) {
      $('#div_update_reason_setting').hide();
      $('#div_add_reason_setting').show();
      //  alert(value);
      if (value != 0 && value != '' ) {
          var dataString = 'reason_setting=' + value ;
          $.ajax({
              type: 'post',
              url: '<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/add_reason_setting',
              data: dataString,
              dataType: 'html',
              cache: false,
              success: function (html) {
                //  $('#reason').val(' ');
                $('#reason_setting').val('');
              //  $('#Modal_esdar').modal('hide');
                  swal({
                      title: "تمت الاضافه بنجاح!",
      }
      );
      get_reason_end();
              }
          });
      }
  }
</script>
<script>
    function update_reason_setting(id) {
        var id = id;
        $('#geha_input6').show();
        $('#div_add_reason_setting').hide();
        $('#div_update_reason_setting').show();
        $.ajax({
            url: "<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/getById_reason_setting",
            type: "Post",
            dataType: "html",
            data: {id: id},
            success: function (data) {
                var obj = JSON.parse(data);
                //console.log(obj);
               console.log(obj.title);
                $('#reason_setting').val(obj.title);
            }
        });
        $('#update_reason_setting').on('click', function () {
            var reason_setting = $('#reason_setting').val();
            $.ajax({
                url: "<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/update_reason_setting",
                type: "Post",
                dataType: "html",
                data: {reason_setting: reason_setting,id: id},
                success: function (html) {
                    //  alert('hh');
                    $('#reason_setting').val('');
                    $('#div_update_reason_setting').hide();
                    $('#div_add_reason_setting').show();
                   // $('#Modal_esdar').modal('hide');
                    swal({
                        title: "تم التعديل!",
        }
        );
        get_reason_end();    
                }
            });
        });
    }
</script>
<script>
  function delete_reason_setting(id) {
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
              $('#reason_setting').val('');
             // $('#Modal_esdar').modal('hide');
              swal({
                  title: "تم الحذف!",
  }
  );
  get_reason_end();
          }
      });
  }
}
</script>
<script>
    function get_details_title() {
       // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_secretary/archive/wared/Add_wared/load_title",
            beforeSend: function () {
                $('#myDiv_title_sub').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#myDiv_title_sub').html(d);
            }
        });
    }
</script>
<script>
    function getTitle(value,id) {
        $('#title_id_fk').val(id);
        $('#mawdo3_name').val(value);
        $('#Modal_title').modal('hide');
    }
</script>
<script>
  function add_title(value) {
      $('#div_update_title').hide();
      $('#div_add_title').show();
      //  alert(value);
      if (value != 0 && value != '' ) {
          var dataString = 'title=' + value ;
          $.ajax({
              type: 'post',
              url: '<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/add_title',
              data: dataString,
              dataType: 'html',
              cache: false,
              success: function (html) {
                //  $('#reason').val(' ');
                $('#title').val('');
              //  $('#Modal_esdar').modal('hide');
                  swal({
                      title: "تم الحفظ!",
      }
      );
      get_details_title();
              }
          });
      }
  }
</script>
<script>
    function update_title(id) {
        var id = id;
        $('#input1111').show();
        $('#div_add_title').hide();
        $('#div_update_title').show();
        $.ajax({
            url: "<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/getById_title",
            type: "Post",
            dataType: "html",
            data: {id: id},
            success: function (data) {
                var obj = JSON.parse(data);
                //console.log(obj);
               console.log(obj.title);
                $('#title').val(obj.title);
            }
        });
        $('#update_title').on('click', function () {
            var title = $('#title').val();
            $.ajax({
                url: "<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/update_title",
                type: "Post",
                dataType: "html",
                data: {title: title,id: id},
                success: function (html) {
                    //  alert('hh');
                    $('#title').val('');
                    $('#div_update_title').hide();
                    $('#div_add_title').show();
                   // $('#Modal_esdar').modal('hide');
                    swal({
                        title: "تم التعديل!",
        }
        );
        get_details_title();    
                }
            });
        });
    }
</script>
<script>
        function delete_title(id) {
        //  confirm('?? ??? ????? ?? ????? ????? ?');
             var r = confirm('هل انت متاكد من الحذف ?');
        if (r == true) {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/delete_title',
                data: {id: id},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    //   alert(html);
                    $('#title').val('');
                   // $('#Modal_esdar').modal('hide');
                    swal({
                        title: "تم الحذف!",
        }
        );
        get_details_title();
                }
            });
        }
    }
</script>
<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/analogue-time-picker.js"></script>       
<script>
	timePickerInput({
    inputElement: document.getElementById("m12h"),
    mode: 12,
   // time: new Date()
});
	</script>
    				<script>
    timePickerInput({
        inputElement: document.getElementById("m13h"),
        mode: 12,
      // time: new Date()
    });
</script>
<script>
    timePickerInput({
        inputElement: document.getElementById("m14h"),
        mode: 12,
      // time: new Date()
    });
</script>
<script>
function get_color()
{
    document.getElementById("is_secret").setAttribute("style", "color: red;");
}
</script>
<script>
    function load_tahwel_emp() {
        $('#tawel_result_mosalm').show();
        var type = $('input[name=esnad_to]:checked').val();
      //  alert(type);
        $('#tahwel_type').val(type);
        $.ajax({
            type: 'post',
            url: '<?php echo base_url()?>all_secretary/archive/wared/Add_wared/load_tahwel_emp' ,
            data: {type:type},
            dataType: 'html',
            cache: false,
            success: function (html) {
                $("#tawel_result_mosalm").html(html);
            }
        });
    }
</script>
<script>
    function GettahwelName(id,name) {
        var checkBox = document.getElementById("myCheck"+id);
        var fieldHTML = '<div><input type="hidden" name="to_user_fk[]" value=""/></div>';
 //$('#to_user_n').append("<input type='hidden' id='to_user_fk"+id+"'  name='to_user_fk' value='"+id+"'/><input type='hidden'  data-validation='required' id='to_user_fk_name"+id+"' name='to_user_fk_name' value='"+name+"'/>");
        $('#to_user_id').val(id);
        $('#to_user_n').val(name);
        $('#tahwelModal_mosalm').modal('hide');
    }
</script>
<!-- اضافه جهه اساسيه -->
<!-- yara -->
<script>
    function get_details_geha_type() {
       // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_secretary/archive/wared/Add_wared/load_geha",
            beforeSend: function () {
                $('#myDiv_geha').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#myDiv_geha').html(d);
            }
        });
    }
</script>
<script>
    function getTitle_geha_type(value,id) {
        $('#geha_morsel_fk').val(id);
        $('#geha_morsel_n').val(value);
        $('#gehatModal').modal('hide');
    }
</script>
<script>
  function add_geha_type(value) {
      $('#div_update_geha_type').hide();
      $('#div_add_geha_type').show();
      //  alert(value);
      if (value != 0 && value != '' ) {
          var dataString = 'geha_type=' + value ;
          $.ajax({
              type: 'post',
              url: '<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/add_geha_type',
              data: dataString,
              dataType: 'html',
              cache: false,
              success: function (html) {
                //  $('#reason').val(' ');
                $('#geha_name').val('');
              //  $('#Modal_esdar').modal('hide');
                  swal({
                      title: "تم الاضافه بنجاح!",
      }
      );
      get_details_geha_type();
              }
          });
      }else
      {
        swal({
                        title: "برجاء ادخال البيانات!",
        }
        );
      }
  }
</script>
<script>
    function update_geha_type(id) {
        var id = id;
        $('#geha_input').show();
        $('#div_add_geha_type').hide();
        $('#div_update_geha_type').show();
        $.ajax({
            url: "<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/getById_geha_type",
            type: "Post",
            dataType: "html",
            data: {id: id},
            success: function (data) {
                var obj = JSON.parse(data);
                //console.log(obj);
               console.log(obj.name);
                $('#geha_name').val(obj.name);
            }
        });
        $('#update_geha_type').on('click', function () {
            var geha_name = $('#geha_name').val();
            $.ajax({
                url: "<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/update_geha_type",
                type: "Post",
                dataType: "html",
                data: {geha_name: geha_name,id: id},
                success: function (html) {
                    //  alert('hh');
                    $('#geha_name').val('');
                    $('#div_update_geha_type').hide();
                    $('#div_add_geha_type').show();
                   // $('#Modal_esdar').modal('hide');
                    swal({
                        title: "تم التعديل بنجاح!",
        }
        );
        get_details_geha_type();    
                }
            });
        });
    }
</script>
<script>
        function delete_geha_type(id) {
        swal({
  title: "هل انت متاكد من الحذف ؟",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "نعم",
  cancelButtonText: "لا",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm) {
  if (isConfirm) {
    $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/delete_geha_type',
                data: {id: id},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    swal({
                        title: "تم الحذف بنجاح!",
        }
        );
        get_details_geha_type();
                }
            });
  } else {
    swal("تم الالغاء", "", "error");
  }
});
    }
</script>
<script>
    function get_folders() {
        var sader_type=$('#sader_type').val();
        console.warn('sader_type:'+sader_type);
        if (sader_type){
            if (sader_type  == 1) {
                sader_type=6;
            }else if (sader_type  == 2) {
                sader_type=5;
            }
            $('#mogldModal').modal('show');
            $.ajax({
                type: 'post',
                url: "<?php echo base_url();?>all_secretary/archive/sader/Add_sader/get_folders",
                data: {type:sader_type},
                beforeSend: function () {
                    $('#load_folders').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
                },
                success: function (d) {
                    $('#load_folders').html(d);
                }
            });}else {
            swal({
                title: "من فضلك اختر نوع الصادر ",
                type: "warning",
                confirmButtonText: "تم"
            });
        }
    }
</script>

<script>
    function get_details_safms2ol() {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_secretary/archive/gehat/Gehat/load_safms2ol",
            beforeSend: function () {
                $('#myDiv_safms2ol').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#myDiv_safms2ol').html(d);
            }
        });
    }
</script>
<script>
    function add_mostlm() {
        $('#div_update_mostlm').hide();
        $('#div_add_mostlm').show();
       var geha_id =  $('#geha_morsel_fk').val();
       var mostlm_name =  $('#mostlm_name').val();
       var safms2ol_name =  $('#safms2ol_name').val();
       var safms2ol_fk =  $('#safms2ol_fk').val();
        if (geha_id != 0 && geha_id != '' && mostlm_name !='' && safms2ol_fk !='' ) {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>all_secretary/archive/sader/Add_sader/add_ms2ol',
                data: {geha_id:geha_id,mostlm_name:mostlm_name,safms2ol_name:safms2ol_name,safms2ol_fk:safms2ol_fk},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $('#mostlm_name').val('');
                    $('#safms2ol_name').val('');
                    $('#safms2ol_fk').val('');
                    swal({
                            title: "تم الاضافه بنجاح!",
                        }
                    );
                  $('#output_mostlem').html(html) ;
                }
            });
        }
        else
        {
            swal({
                    title: "برجاء ادخال البيانات!",
                }
            );
        }
    }
</script>
<script>
    function update_mostlm(id) {
        var id = id ;
        $('#update_mostalm').prop("onclick", null).off("click");
        $('#mostlm_input').show();
        $('#div_add_mostlm').hide();
        $('#div_update_mostlm').show();
        $.ajax({
            url: "<?php echo base_url() ?>all_secretary/archive/sader/Add_sader/getById_mostlm",
            type: "Post",
            dataType: "html",
            data: {id: id},
            success: function (data) {
                var obj = JSON.parse(data);
               // console.log(obj.name);
                $('#mostlm_name').val(obj.name);
                $('#safms2ol_name').val(obj.safms2ol_name);
                $('#safms2ol_fk').val(obj.safms2ol_fk);
            }
        });
        $('#update_mostalm').on('click', function () {
            var geha_id =  $('#geha_morsel_fk').val();
            var mostlm_name =  $('#mostlm_name').val();
            var safms2ol_name =  $('#safms2ol_name').val();
            var safms2ol_fk =  $('#safms2ol_fk').val();
            $.ajax({
                url: "<?php echo base_url() ?>all_secretary/archive/sader/Add_sader/update_ms2ol",
                type: "Post",
                dataType: "html",
                data: {row_id:id,geha_id:geha_id,mostlm_name:mostlm_name,safms2ol_name:safms2ol_name,safms2ol_fk:safms2ol_fk},
                success: function (html) {
                    $('#mostlm_name').val('');
                    $('#safms2ol_name').val('');
                    $('#safms2ol_fk').val('');
                    $('#div_update_mostlm').hide();
                    $('#div_add_mostlm').show();
                    // $('#Modal_esdar').modal('hide');
                    $('#update_mostalm').prop("onclick", null).off("click");
                    swal({
                            title: "تم التعديل بنجاح!",
                        }
                    );
                    $('#output_mostlem').html(html) ;
                }
            });
        });
    }
</script>
<script>
    function delete_mostlm(row_id,geha_id) {
            swal({
                    title: "هل انت متاكد من الحذف ؟",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "نعم",
                    cancelButtonText: "لا",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            url: "<?php echo base_url() ?>all_secretary/archive/sader/Add_sader/delete_mostlm",
                            type: "Post",
                            dataType: "html",
                            data: {row_id: row_id,geha_id:geha_id},
                            success: function (html) {
                                $('#output_mostlem').html(html) ;
                                swal({
                                        title: "تم الحذف بنجاح!",
                                    }
                                );
                            }
                        });
                    } else {
                        swal("تم الالغاء", "", "error");
                    }
                });
    }
</script>
<script>
function get_disable()
{
val=$('#need_follow').val();
//console.log(val);
if(val==2)
{
    $('#esthkak_dates').attr("disabled","disabled");    
    $('#m14h').attr("disabled","disabled"); 
}
else
{
    $('#esthkak_dates').removeAttr("disabled","disabled");    
    $('#m14h').removeAttr("disabled","disabled"); 
}
}
</script>
<!-- yara -->
<script>
    function GetestlamName(id,name) {
        var checkBox = document.getElementById("myCheck"+id);
  if (checkBox.checked == true){  
 $('#tarekt_ersal_n').append("<input type='hidden' id='estlam_fk"+id+"'  name='estlam_fk' value='"+id+"'/><input type='hidden'  data-validation='required' id='estlam_fk_name"+id+"' name='estlam_fk_name' value='"+name+"'/>");
 var estlam_name = [];
$("input[name='estlam_fk_name']").each(function(){
    estlam_name.push(this.value);
    });
var estlam_fk = [];    
$("input[name='estlam_fk']").each(function(){
estlam_fk.push(this.value);
});
 $('#tarekt_ersal_n').val(estlam_name);
 $('#tarekt_ersal_fk').val(estlam_fk);
      } else {
    $("#estlam_fk"+id).remove();
    $("#estlam_fk_name"+id).remove();
    }
    }
</script>


<!-- yara18-3 -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>

    function save_sader() {
        // $('#registerForm').serialize(),
      
        var all_inputs = $(' .sader_form [data-validation="required"]');
        var valid = 1;
        var text_valid = "";
        all_inputs.each(function (index, elem) {
            console.log(elem.id + $(elem).val());
            if ($(elem).val().length >= 1 ) {
                // valid=1;
                $(elem).css("border-color", "");
            } else {
                valid = 0;
                $(elem).css("border-color", "red");
            }
        });

        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>all_secretary/archive/sader/Add_sader/add_sader',
            data: $('#sader_form').serialize(),
            cache: false,
            beforeSend: function (xhr) {
                if (valid == 0) {
                    swal({
                        title: 'من فضلك ادخل كل الحقول ',
                        text: text_valid,
                        type: 'error',
                        confirmButtonText: 'تم',
                       
                    });
                    xhr.abort();
                } else if (valid == 1) {
                    swal({
                        title: "جاري الإرسال ... ",
                        text: "",
                        imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                        showConfirmButton: false,
                        allowOutsideClick: false
                    });
                }
            },
            success: function (html) {
                var all_inputs_set = $('.sader_form .form-control');

                all_inputs_set.each(function (index, elem) {
                    console.log(elem.id + $(elem).val());
                    $(elem).val('');
                });
swal("تم الحفظ بنجاح", {
                    buttons: {
                      cancel: "الغاء",
                      catch: {
                        text: "طباعه الباركود",
                        value: "catch",
                      },
                      defeat:{
                        text: " طباعه الترويثه",
                        value: "defeat",
                        },
                    },
                  })
                    .then((value) => {
                      switch (value) {
                        case "defeat":
                            make_print(html);
                         //   location.href = '<?php echo base_url() ?>all_secretary/archive/sader/Add_sader/add_deal/'+html; 
                          break;
                        case "catch":
                            $('#barcodeModal').modal('show');
                            get_print(html);
                            //location.href = '<?php echo base_url() ?>all_secretary/archive/sader/Add_sader/add_deal/'+html; 
                   //$('#barcodeModal').modal('show');
                          break;
                        default:
                          swal("تم الالغاء");
                          location.href = '<?php echo base_url() ?>all_secretary/archive/sader/Add_sader/add_deal/'+html; 
                      }
                    });
               
//   
                

                // if (html == 1){

                //    // show_tab('general-detailsfa');
                // }

            }
        });
    }


</script>
<!-- yara18-3 -->
<script>

</script>

<script>
    function get_print(id){
       // var print_id=id;
      //  var date_export=date;
       // var num_post =num ;
       // var dataString = 'id=' + print_id + '&type=' + 2 +  "&num="+num_post+"&date="+date_export ;
       var request =   $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>all_secretary/archive/sader/Add_sader/PrintCode',
            data:{id:id},
            dataType: 'html',
            cache:false,
            success: function(html){
                //   alert(html);
                $("#div_print").html(html);
            }
        });
        return false;
    }
</script>
<script>
    function make_print(row_id) {
        var request = $.ajax({
            // print_resrv -- print_contract
            url: "<?=base_url() . 'all_secretary/archive/sader/Add_sader/print_tawresa'?>" ,
            type: "POST",
            data: {row_id: row_id},
        });
        request.done(function (msg) {
            var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(msg);
            WinPrint.document.close();
            WinPrint.focus();
            WinPrint.print();
            // WinPrint.close();
        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });
    }
</script>