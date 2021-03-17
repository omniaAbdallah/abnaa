<style type="text/css">
td .fa {
        background: none;
        color: black;
        padding: 2px 7px;
        font-size: 12px;
        line-height: 1.5
    }
    .pdd{
        margin: 0;padding: 0
        }
    .loader {
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid #3498db;
        width: 140px;
        height: 140px;
        -webkit-animation: spin 2s linear infinite; /* Safari */
        animation: spin 2s linear infinite;
    }
    /* Safari */
    @-webkit-keyframes spin {
        0% { -webkit-transform: rotate(0deg); }
        100% { -webkit-transform: rotate(360deg); }
    }
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    input[type=radio] {
        height: 20px;
        width: 20px;
    }
label.label-green {
    display: inline-block;
    width: 100%;
}
label.label-green {
    height: auto;
    line-height: unset;
    font-size: 16px !important;
    font-weight: 600 !important;
    text-align: right !important;
    margin-bottom: 0;
    background-color: transparent;
    color: #002542;
    border: none;
    padding-bottom: 0;
    font-weight: bold;
}
.half {
    width: 100% !important;
    float: right !important;
}
</style>
<style>
    .box-header > .box-tools [data-toggle="tooltip"] {
        position: relative;
    }
    .box-footer {
        float: right;
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
    .cke_toolbar_break {
        display: none;
        clear: left;
    }
    .info {
        width: 10% !important;
        background-color: #e4e4e4 !important;
    }
    .table > thead > tr > td.info,
    .table > tbody > tr > td.info,
    .table > tfoot > tr > td.info,
    .table > thead > tr > th.info,
    .table > tbody > tr > th.info,
    .table > tfoot > tr > th.info,
    .table > thead > tr.info > td,
    .table > tbody > tr.info > td,
    .table > tfoot > tr.info > td,
    .table > thead > tr.info > th,
    .table > tbody > tr.info > th,
    .table > tfoot > tr.info > th {
        border-top: 1px solid #ffffff !important;
        border-right: 1px solid #ffffff !important;
        background-color: #e4e4e4 !important;
        color: black !important;
        font-size: 15px !important;
    }
    .infotd {
        width: 27%;
        background: #f7f7f7 !important;
    }
    .table-bordered.bor >
    thead > tr > th,
    .table-bordered > tbody > tr > th,
    .table-bordered.bor > tfoot > tr > th,
    .table-bordered > thead > tr > td,
    .table-bordered.bor > tbody > tr > td,
    .table-bordered > tfoot > tr > td {
        border: none !important;
    }
</style>
<?php if($_SESSION['role_id_fk']==3){?>
<div class="col-xs-12 no-padding" >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title;?> </h3>
        </div>
        <div class="panel-body">
            <!-------------------------------------------------------------------------------------->
            <?php if(isset($crm_data)){
                  echo form_open_multipart("family_controllers/osr_crm/Osr_crm_zyraat_c/Update/".$crm_data["id"]);
                  $out["deisabled"]="disabled";
                  
                    
                  $out['input']='UPDATE';
                  $out['input_title']='تعديل ';
            }else{
                  echo form_open_multipart("family_controllers/osr_crm/Osr_crm_zyraat_c/add_crm");
                  $disp="none";
                  $out["deisabled"]="";
                  $out["deisabled_bank"]="disabled=''";
                  $out["readonly_bank"]="readonly=''";
                  $out['input']='ADD';
                  $out['input_title']='حفظ ';
            }?>
         
         <div class="col-sm-8 form-group">

              <div class="form-group col-md-4 col-xs-12 padding-4">
                      <label class="label  " style="">   أسم الباحث</label>
                       <input type="text"
                       readonly
                       value="<?php if(isset($crm_data["emp_name"])){if(!empty($crm_data["emp_name"])){echo $crm_data["emp_name"];} }else{echo $_SESSION['emp_name'];}?>"
                       id="emp_name"  name="emp_name" class=" form-control "  
                       />
                </div>
                <div class="form-group col-md-2 col-xs-12 padding-4">
                      <label class="label  " style=""> رقم الزيارة</label>
                       <input type="number"
                       readonly
                        
                       value="<?php if(isset($crm_data["rkm_visit"])){if(!empty($crm_data["rkm_visit"])){echo $crm_data["rkm_visit"];} }?>"
                       id="rkm_visit"  name="rkm_visit" class=" form-control "  
                     
                       />
                </div> 
                <div class="form-group col-md-3 col-xs-12 padding-4">
                      <label class="label  " style=""> تاريخ الزيارة</label>
                       <input type="date"
                       data-validation="required "  
                       value="<?php if(isset($crm_data["visit_date"])){if(!empty($crm_data["visit_date"])){echo $crm_data["visit_date"];} }?>"
                       id="visit_date"  name="visit_date" class=" form-control "  
                       onchange="check_date();"
                       />
                </div> 
                            <div class="form-group  col-md-3 padding-4 ">
                    <label class="label  ">رقم الطلب/الملف </label>
                    <input type="text" id="file_num" value="<?php if(isset($crm_data["file_num"])){if(!empty($crm_data["file_num"])){echo $crm_data["file_num"];} }?>"
                        ondblclick="$('#myModal').modal();load_table()" data-validation="required"
                        readonly style="width: 75%;float: right"
                        class="form-control " value="" onblur="GetFamilyNum($(this).val());">
                    <button type="button" data-toggle="modal" data-target="#myModal"
                            onclick="load_table()"
                            class="btn btn-success btn-next" style="width: 25%;float: left;">
                        <i class="fa fa-plus"></i></button>
                    <input type="hidden" name="mother_national_num" id="mother_national_num" value="<?php if(isset($crm_data["mother_national_num"])){if(!empty($crm_data["mother_national_num"])){echo $crm_data["mother_national_num"];} }?>">
                
                </div>

                <div class="form-group col-md-2 col-xs-12 padding-4">
                      <label class="label  " style="">  (من)موعد الزيارة</label>
                       <input type="time"   
                       data-validation="required "  
                       value="<?php if(isset($crm_data["visit_time_from"])){  if(!empty($crm_data["visit_time_from"])){echo $crm_data["visit_time_from"];} }?>"
                       onchange="check_date();" id="visit_time_from"  name="visit_time_from" class="  form-control "  />
                </div> 
                <div class="form-group col-md-2 col-xs-12 padding-4">
                      <label class="label  " style=""> (إلي)موعد الزيارة</label>
                       <input type="time"   
                       data-validation="required "  
                       value="<?php if(isset($crm_data["visit_time_to"])){  if(!empty($crm_data["visit_time_to"])){echo $crm_data["visit_time_to"];} }?>"
                       onchange="check_date();"   id="visit_time_to"  name="visit_time_to" class="  form-control "  />
                </div> 

                <div class="form-group  col-md-3 padding-4">
    <label class="label ">      نوع البحث </label>
    <select name="search_type" id="search_type" 
            class="form-control "    data-validation="required "  
           
             >
        <option value="">إختر</option>
        <?php 
        $search_type_arr=array(1=>'بحث جديد',
                               2=>'زيارة تتبعية',
                               3=>'زيارة طلب خدمة');
        foreach ($search_type_arr as $key=>$value){
            $selected="";
            if(isset($crm_data['search_type'])){
             
                if($crm_data['search_type']== $key ){$selected="selected";}
             
               
            }?>
            <option value="<?=$key?>" <?=$selected?>><?=$value?></option>
            <?php } ?>
    </select>
</div>  

<div class="form-group  col-md-5 padding-4">
    <label class="label ">     الغرض من   الزيارة </label>
    <select name="visit_reason" id="visit_reason"  data-validation="required " 
            class="form-control "  >
        <option value="">إختر</option>
        <?php foreach ($purpose_visit as $row){
            $selected="";
            if(isset($crm_data)){
             
                if($crm_data['visit_reason']== $row->conf_id ){$selected="selected";}
             
               
            }?>
            <option value="<?=$row->conf_id?>" <?=$selected?>><?=$row->title?></option>
            <?php } ?>
    </select>
</div>  


<div class="form-group  col-md-12 padding-4">
    <label class="label ">       متطلبات الزيارة </label>
   

            <textarea class="editor1"
                              data-validation="required"
                              id="editor1" name="visit_result" rows="2" style=""><?php if(isset($crm_data["visit_result"])){  if(!empty($crm_data["visit_result"])){echo $crm_data["visit_result"];} }?></textarea>
       
</div>  




                            <!-- <div class="form-horizontal" style="width: 550px">
                     
                       <div id="loca" style="width: 550px; height: 400px;"></div>
                        <div class="clearfix">&nbsp;</div>
                        <div class="m-t-small">
                            <label class="p-r-small col-sm-1 control-label"> (Lat):</label>
                            <div class="col-sm-3">
                                <input type="text" name="lat" class="form-control" style="width: 110px;font-family: arial" id="loca-lat" value="<?php if(isset($crm_data["lat"])){  if(!empty($crm_data["lat"])){echo $crm_data["lat"];} }else{ echo '26.37506589156855';}?>" />
                            </div>
                            <label class="p-r-small col-sm-2 control-label"> (Long):</label>
                            <div class="col-sm-3">
                                <input type="text" name="lng" class="form-control" style="width: 110px;font-family: arial" id="loca-lon"  value="<?php if(isset($crm_data["lng"])){  if(!empty($crm_data["lng"])){echo $crm_data["lng"];} }else{ echo '43.97146415710449';}?>"/>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>                     

</div> -->
<!--  -->
</div>
<div class="col-md-4 form-group" id="Details">
                <?php if (isset($load_details) && (!empty($load_details))) {
//                    $data['file_num_data']=$file_num_data;
                    $this->load->view($load_details);
                } else { ?>
                    <table class="table table-bordered ">
                        <tbody>
                        <tr>
                            <td style="background-color: #e4e4e4 !important;" colspan="6">
                                <i class="fa fa-info-circle" aria-hidden="true"></i>
                                بيانات الأسرة
                            </td>
                        </tr>
                        <tr>
                            <th class="info"><i class="fa fa-id-card-o" aria-hidden="true"></i> إسم الأسرة</th>
                            <td class="infotd text-center">
                                <input type="hidden" class="form-control" name="osra_name" value="">
                            </td>
                        </tr>
                        <tr>
                            <th class="info">
                                <i class="fa fa-file-o" aria-hidden="true"></i> رقم الملف
                            </th>
                            <td class="infotd text-center">
                                <!-- <input type="text" class="form-control" readonly  value=""> -->
                            </td>
                        </tr>
                        <tr>
                            <th class="info"><i class="fa fa-phone-square" aria-hidden="true"></i> جوال التواصل</th>
                            <td class="infotd text-center">
                                <!-- <input type="text" readonly class="form-control" name="contact_mob" value=""> -->
                            </td>
                        </tr>
                        <tr>
                            <th class="info"><i class="fa fa-file-o" aria-hidden="true"></i> الفئة</th>
                            <td class=" infotd text-center">
                            </td>
                        </tr>
                        <tr>
                            <th class="info"><i class="fa fa-calendar-o" aria-hidden="true"></i> تاريخ التسجيل</th>
                            <td class="infotd text-center">
                            </td>
                        </tr>
                        <tr>
                            <th class="info"><i class="fa fa-users" aria-hidden="true"></i> عدد أفراد الأسرة</th>
                            <td class="infotd text-center">
                            </td>
                        </tr>
                        </tbody>
                       
                    </table>
                <?php } ?>
            </div>
<!--  -->

 <!---------------------------------------->
 <div class="col-xs-12 text-center" style="margin-bottom: 10px;">
         
         <button  type="submit" name="<?php echo $out['input']?>" value="<?php echo $out['input']?>"  class="btn btn-success  btn-labeled" id="submit_but">
             <span class="btn-label"><i class="fa fa-floppy-o" aria-hidden="true"></i></span> <?php echo $out['input_title']?></button>
     </div>
     <!---------------------------------------->

     <?php  echo form_close()?>

            </div>
           
           
           
    </div>
</div>
</div>
            
            <?php  if(isset($all_data) && !empty($all_data)){ ?>
                <div class="col-xs-12 no-padding" >
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title;?> </h3>
        </div>
        <div class="panel-body">
                <table id="example" class=" display table table-bordered  table-striped responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr class="greentd">
                        <th class="text-center">م</th>
                        <th  class="text-center">رقم الزيارة </th>
                        <th  class="text-center">تاريخ الزيارة </th>
                        <th  class="text-center"> من الساعة </th>
                        <th  class="text-center"> إلي الساعة </th>
                                     <th class="text-center">الفئة </th>
                        <th class="text-center"> نوع البحث </th>
                        <th class="text-center"> الغرض من   الزيارة</th>
                        <th class="text-center"> القائم الزيارة </th>
                        <th class="text-center"> حالة الزيارة </th>
                        <th class="text-center">الاجراء</th>
                      
                    </tr>
                    </thead>
                    <tbody>
                <?php $x=1; foreach($all_data as $record){
                        if($record->search_type== 1){
                        $background_color = '#8ad099';
                    }elseif($record->search_type== 2){
                        $background_color =  '#8ac0d0';
                    }elseif($record->search_type== 3 ){
                        $background_color =  '#d08aa4';
                    }
                    
                     if($record->file_num > 0){
                        $fe2 = 'ملف أسرة';
                        $fe2_color = '#50ab20';
                    }elseif($record->file_num == null){
                         $fe2 = 'طلب أسرة';
                          $fe2_color = '#ff7700';
                    }
                    
                    if($record->visit_ended == 'yes'){
                       $visit_ended = 'الزيارة إنتهت';
                       $visit_ended_color = '#ff8f8f'; 
                    }elseif($record->visit_ended=='no'){
                         $visit_ended = 'الزيارة جارية'; 
                         $visit_ended_color = '#ffc049'; 
                    }
                    
                    ?>
                    
         
                    <tr class="">
    <td><?php echo $x++ ?></td>
    <td><?php echo $record->rkm_visit; ?></td>
    <td><?php echo $record->visit_date; ?></td>
    <td style="color: #c30000;font-weight: bold;"><?php echo date('h:i A', strtotime($record->visit_time_from)) ; ?></td>
    <td style="color: green;font-weight: bold;"><?php echo date('h:i A', strtotime($record->visit_time_to)) ; ?></td>
        <td style="background:<?=$fe2_color?>;"><?=$fe2?></td>
     <td style="background:<?=$background_color?>;"><?php
         $search_type_arr=array(1=>'بحث جديد',
                               2=>'زيارة تتبعية',
                               3=>'زيارة طلب خدمة');
    if (key_exists($record->search_type,$search_type_arr)){
            echo $search_type_arr[$record->search_type];
        } ?></td>

    <td style="background: #dcaff9;">
 <?=$record->visit_reason_title?>

    </td>
    <td style="color: blue;"><?php echo $record->emp_name; ?></td>
  <td style="background:<?=$visit_ended_color?>;"><?=$visit_ended?></td>
    <td>

        <div class="btn-group">
            <button type="button" class="btn btn-sm  btn-info">إجراءات
            </button>
            <button type="button" class="btn btn-sm btn-info dropdown-toggle"
                    data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu">
                <li>
                    <a onclick='swal({
                        title: "هل انت متأكد من التعديل ؟",
                        text: "",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "btn-warning",
                        confirmButtonText: "تعديل",
                        cancelButtonText: "إلغاء",
                        closeOnConfirm: false
                        },
                        function(){
                        window.location="<?= base_url() . 'family_controllers/osr_crm/Osr_crm_zyraat_c/Update/' . $record->id ?>";
                        });'>
                        <i class="fa fa-pencil"> </i> تعديل </a>
                </li>
                <li><a onclick=' swal({
                        title: "هل انت متأكد من الحذف ؟",
                        text: "",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "حذف",
                        cancelButtonText: "إلغاء",
                        closeOnConfirm: false
                        },
                        function(){
                        swal("تم الحذف!", "", "success");
                        setTimeout(function(){window.location="<?= base_url() . 'family_controllers/osr_crm/Osr_crm_zyraat_c/delete/' . $record->id ?>";}, 500);
                        });'>
                        <i class="fa fa-trash"> </i> حذف </a>
                </li>
                <li>
                    <a  data-toggle="modal" data-target="#myModal_details"
                        onclick="getDetails_zyraa(<?= $record->id ?>)"
                    >
                        <i class="fa fa-list"></i>
                        التفاصيل
                    </a>
                </li>
                <li>
                    <a  data-toggle="modal" data-target="#myModal_details" onclick="change_time_zyraa(<?= $record->id ?>)">
                        <i class="fa fa-clock-o"></i>
                        تغير الموعد
                    </a>
                </li>
                
                <?php if($record->visit_ended=='no'){?>
                <li>
                    <a onclick='swal({
                        title: "هل انت متأكد من  بدء الزيارة ؟",
                        text: "",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "btn-warning",
                        confirmButtonText: "بدء",
                        cancelButtonText: "إلغاء",
                        closeOnConfirm: false
                        },
                        function(){
                        window.location="<?= base_url() . 'family_controllers/osr_crm/Osr_crm_zyraat_c/start_zyraa/' . $record->id ?>";
                        });'>
                        <i class="fa fa-archive"> </i> بدء الزيارة </a>
                </li>
                <?php }?>


                <?php if($record->visit_ended=='yes'){?>
                <li>
                    <a onclick='swal({
                        title: "هل انت متأكد من  إستكمال بيانات الزيارة  ؟",
                        text: "",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "btn-warning",
                        confirmButtonText: "إستكمال",
                        cancelButtonText: "إلغاء",
                        closeOnConfirm: false
                        },
                        function(){
                        window.location="<?= base_url() . 'family_controllers/osr_crm/Osr_crm_zyraat_c/complete_zyraa_data/' . $record->id ?>";
                        });'>
                        <i class="fa fa-upload"> </i> إستكمال بيانات الزيارة  </a>
                </li>
                <?php }?>
                
                <?php if ($record->visit_ended == 'yes') {
    ?>
    <li>
        <a data-toggle="modal" data-target="#myModal_details"
           onclick="transformatiom_zyraa(<?= $record->id ?>)">
            <i class="fa fa-share"></i>
            تحويل الزيارة
        </a>
    </li>
    <?php
} ?>
    <li>
                    <a target="_blank" href="<?= base_url() . 'family_controllers/osr_crm/Osr_crm_c/add_crm_etsal/' . $record->id ?>"
                    >
                        <i class="fa fa-phone"> </i> إنشاء إتصال مع الاسرة   </a>
                </li>
                <li>
                    <a target="_blank"  href="<?= base_url() . 'family_controllers/osr_crm/Osr_crm_zyraat_c/crm_money/' . $record->id ?>"
                    >
                        <i class="fa fa-phone"> </i>   أضافة الحالة المالية    </a>
                </li>
<li>
    <a onclick="close_crm_zyraat(<?= $record->id ?>)">
        <i class="fa fa-close"></i>
        اغلاق الزيارة
    </a>
</li>
            </ul>
        </div>
    </td>
</tr>
                    <?php }?>
                    </tbody>
                </table>
                </div>
    </div>
</div>
</div>
            <?php } ?>
            <!-------------------------------------------------------------------------------------->
       
<!----------------------------------------------------------------->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 75%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">ملفات - طلبات الأسر </h4>
            </div>
            <div class="modal-body" style="    height: 578px;" >
            <div class="form-group col-sm-12 col-xs-12">


                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab1" onclick="load_table()" data-toggle="tab">  طلبات</a></li>
                    <li><a href="#tab2" data-toggle="tab" onclick="load_table_file()">   ملفات</a></li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade in active" id="tab1">
                        <div class="panel-body" id="json_table">


                          

                        </div>




                           

                        
                    </div>
                    <div class="tab-pane fade" id="tab2">
                        <div class="panel-body" id="json_table_file" >


                          


                        </div>
                    </div>
                </div>

            </div>
            </div>
            <div class="modal-footer" style="">
                <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal_details" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel"> تفاصيل </h4>
            </div>
            <div class="modal-body" id="details_table">
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<!-- yara -->
<!---------------------------------------------->

<?php }else{?>
    <div class="alert alert-danger"> <strong>لا  يمكنك اضافة بيانات الزيارة !</strong> .
    <?php } ?>


    <script>
    function check_new_date() {
        var visit_date_new = $('#visit_date_new').val();
        var visit_time_from_new = $('#visit_time_from_new').val();
        var visit_time_to_new = $('#visit_time_to_new').val();
        if (visit_date_new != "" && visit_time_from_new != "" && visit_time_to_new != "") {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>family_controllers/osr_crm/Osr_crm_zyraat_c/check_date',
                data: {visit_date: visit_date_new, visit_time_from: visit_time_from_new, visit_time_to: visit_time_to_new},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    if (html == "1") {
                        $("#visit_date_new").val('');
                        $("#visit_time_from_new").val('');
                        $("#visit_time_to_new").val('');
                        swal(" يوجد زياره في نفس الميعاد", "", "error");
                    }
                }
            });
        }
    }
</script>

<script>
    function check_date() {
        var visit_date = $('#visit_date').val();
        var visit_time_from = $('#visit_time_from').val();
        var visit_time_to = $('#visit_time_to').val();
        if (visit_date != "" && visit_time_from != "" && visit_time_to != "") {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>family_controllers/osr_crm/Osr_crm_zyraat_c/check_date',
                data: {visit_date: visit_date, visit_time_from: visit_time_from, visit_time_to: visit_time_to},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    if (html == "1") {
                        $("#visit_date").val('');
                        $("#visit_time_from").val('');
                        $("#visit_time_to").val('');
                        swal(" يوجد زياره في نفس الميعاد", "", "error");
                    }
                }
            });
        }
    }
</script>




<!-- getDetails_zyraa -->
<script>
    function getDetails_zyraa(value) {
        if (value != 0 && value != '') {
            var dataString = 'id=' + value;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>family_controllers/osr_crm/Osr_crm_zyraat_c/getDetails_zyraa',
                data: dataString,
                dataType: 'html',
                cache: false,
               beforeSend: function () {
                $('#details_table').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
                success: function (html) {
                    $("#details_table").html(html);
                }
            });
        }
    }
</script>
<script>
    function GetNamozegDiv() {
        var mother_national_num = $('#mother_national_num').val();
        if (mother_national_num != 0 && mother_national_num != '') {
            var dataString = 'mother_national_num=' + mother_national_num;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>family_controllers/osr_crm/Osr_crm_zyraat_c/getDetails',
                data: $('#myform').serialize() + "&" + dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $("#Details").html(html);
                }
            });
        }
    }
</script>
<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src='https://maps.google.com/maps/api/js?key=AIzaSyC4l5QxL27z4w0uuD_5X3g0IRhaUdvb0Q4&?sensor=false&libraries=places'></script>
<script src="<?= base_url() . 'asisst/web_asset/' ?>js/locationpicker.jquery.js"></script>
<script>
var latit=$('#loca-lat').val();
        var longit=$('#loca-lon').val();
    $('#loca').locationpicker({
        mapTypeId: google.maps.MapTypeId.HYBRID,
        location: {
            latitude:latit,
            longitude: longit
        },
        radius: 300,
        zoom: 12,
        inputBinding: {
            latitudeInput: $('#loca-lat'),
            longitudeInput: $('#loca-lon'),

        },
        enableAutocomplete: true,
        onchanged: function (currentLocation, radius, isMarkerDropped) {
            // Uncomment line below to show alert on each Location Changed event
            //alert("Location changed. New location (" + currentLocation.latitude + ", " + currentLocation.longitude + ")");
        }
    });
</script>

<!-- yara14-2-2021 -->
<script>
    function load_table() {
        var html;
        html = '<div class="col-md-12"><table id="my_table" class="table table-striped table-bordered dt-responsive nowrap " >' +
            '<thead><tr><th style="width: 30px;">م</th><th style="width: 50px;"> رقم الطلب   </th><th style="width: 80px;"> إسم رب الأسرة </th><th style="width: 50px;" >رقم الهوية</th>' +
            '<th style="width: 80px;"> إسم الأم </th><th style="width: 50px;"> رقم الهوية </th></tr></thead><table><div id="dataMember"></div></div>';
        $("#json_table").html(html);
        $('#my_table').show();
        var oTable_usergroup = $('#my_table').DataTable({
            dom: 'Bfrtip',
            "ajax": '<?php echo base_url(); ?>family_controllers/osr_crm/Osr_crm_zyraat_c/getFamilyTable',
            aoColumns: [
                {"bSortable": true},
                {"bSortable": true},
                {"bSortable": true},
                {"bSortable": true},
                {"bSortable": true},
                {"bSortable": true}
          
            ],
            buttons: [
                'pageLength',
                'copy',
                'excelHtml5',
                {
                    extend: "pdfHtml5",
                    orientation: 'landscape'
                },
                {
                    extend: 'print',
                    exportOptions: {columns: ':visible'},
                    orientation: 'landscape'
                },
                'colvis'
            ],
            colReorder: true,
            destroy: true
        });
    }
</script>
<script>
    function load_table_file() {
        var html;
        html = '<div class="col-md-12"><table id="my_table_file" class="table table-striped table-bordered dt-responsive nowrap " >' +
            '<thead><tr><th style="width: 30px;">م</th><th style="width: 50px;">   رقم الملف </th><th style="width: 80px;"> إسم رب الأسرة </th><th style="width: 50px;" >رقم الهوية</th>' +
            '<th style="width: 80px;"> إسم الأم </th><th style="width: 50px;"> رقم الهوية </th></tr></thead><table><div id="dataMember"></div></div>';
        $("#json_table_file").html(html);
        $('#my_table_file').show();
        var oTable_usergroup = $('#my_table_file').DataTable({
            dom: 'Bfrtip',
            "ajax": '<?php echo base_url(); ?>family_controllers/osr_crm/Osr_crm_zyraat_c/getFamilyTable_file',
            aoColumns: [
                {"bSortable": true},
                {"bSortable": true},
                {"bSortable": true},
                {"bSortable": true},
                {"bSortable": true},
                {"bSortable": true}
               
            ],
            buttons: [
                'pageLength',
                'copy',
                'excelHtml5',
                {
                    extend: "pdfHtml5",
                    orientation: 'landscape'
                },
                {
                    extend: 'print',
                    exportOptions: {columns: ':visible'},
                    orientation: 'landscape'
                },
                'colvis'
            ],
            colReorder: true,
            destroy: true
        });
    }
</script>
<script>
    function getFile_num(value) {
      
       
        $('#mother_national_num').val($('#radio' + value).attr('data-mother'));
        $('#file_num').val(value);
        $('#myModal').modal('hide');
        GetNamozegDiv();
    }
</script>
<script src="<?php echo base_url() ?>asisst/admin_asset/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/ckeditor/samples/js/sample.js"></script>
<script>
    initSample();
    CKEDITOR.replaceClass = 'ckeditor';
</script>
<script type="text/javascript">
    CKEDITOR.replace('editor1');
    CKEDITOR.add;
    CKEDITOR.config.toolbar = [
        ['Styles', 'Format', 'Font', 'FontSize'],
        '/',
        ['NumberedList', 'BulletedList', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
        ['Image', 'Table', '-', 'Link', 'Flash', 'Smiley', 'TextColor', 'BGColor', 'Source']
    ];
</script>
<script>
        function change_time_zyraa(value) {
            if (value != 0 && value != '') {
                var dataString = 'id=' + value;
                $.ajax({
                    type: 'post',
                    url: '<?php echo base_url() ?>family_controllers/osr_crm/Osr_crm_zyraat_c/change_time_zyraa',
                    data: dataString,
                    dataType: 'html',
                    cache: false,
                    beforeSend: function () {
                        $('#details_table').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
                    },
                    success: function (html) {
                        $("#details_table").html(html);
                    }
                });
            }
        }
    </script>
    
    
    <script>
    function transformatiom_zyraa(value) {
        if (value != 0 && value != '') {
            var dataString = 'id=' + value;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>family_controllers/osr_crm/Osr_crm_zyraat_c/transformatiom_zyraa',
                data: dataString,
                dataType: 'html',
                cache: false,
                beforeSend: function () {
                    $('#details_table').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
                },
                success: function (html) {
                    $("#details_table").html(html);
                }
            });
        }
    }
</script>
<script>
    function GetTransferType(valu, mother_num) {
        //procedure_id_fk
        var data = "type=" + valu;
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>family_controllers/Family_details/GetProcedure',
            data: data,
            cache: false,
            success: function (json_data) {
                var JSONObject = JSON.parse(json_data);
                //console.log(JSONObject);
                var html = '<option value="">إختر </option>';
                for (i = 0; i < JSONObject.length; i++) {
                    html += '<option value=" ' + JSONObject[i].id + '-' + JSONObject[i].title + '"> ' + JSONObject[i].title + '</option>';
                }
                $("#procedure_id_fk").html(html);
            }
        });
        if (valu == 2) {
            var dataString = "mother_num=" + mother_num;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>family_controllers/Family_details/GetTransferType',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $("#option_transfer_type").html(html);
                }
            });
        } else {
            $("#option_transfer_type").html('');
        }
    }
</script>
<script>
    function close_crm_zyraat(value) {
        if (value != 0 && value != '') {
            var dataString = 'id=' + value;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>family_controllers/osr_crm/Osr_crm_zyraat_c/close_crm_zyraat',
                data: dataString,
                dataType: 'html',
                cache: false,
                beforeSend: function () {
                    swal({
                        title: "جاري اغلاق الزيارة ... ",
                        text: "",
                        imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                        showConfirmButton: false,
                        allowOutsideClick: false

                    });                    },
                success: function (html) {
                    swal({
                        title: 'تم اضافة اغلاق الزيارة بنجاح',
                        type: 'success',
                        confirmButtonText: 'تم'
                    });                    }
            });
        }
    }
</script>

