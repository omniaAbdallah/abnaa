
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
                  echo form_open_multipart("family_controllers/osr_crm/Osr_crm_c/Update_crm_etsal/".$crm_data["id"]."/".$crm_data["zyraa_id_fk"]);
                  $out["deisabled"]="disabled";
                 
                    
                  $out['input']='UPDATE';
                  $out['input_title']='تعديل ';
            }else{
                  echo form_open_multipart("family_controllers/osr_crm/Osr_crm_c/add_crm_etsal/".$zyraa_data["id"]);
                  $disp="none";
                  $out["deisabled"]="";
                  $out["deisabled_bank"]="disabled=''";
                  $out["readonly_bank"]="readonly=''";
                  $out['input']='ADD';
                  $out['input_title']='حفظ ';
            }?>
        
        <div class="col-md-12 no-padding">
           <div class="col-xs-8 no-padding">

           <div class="form-group col-sm-2 col-xs-12 padding-4">
                      <label class="label  " style=""> تاريخ الاتصال</label>
                       <input type="date"
                      readonly
                       value="<?php if(isset($crm_data["contact_date"])){  if(!empty($crm_data["contact_date"])){echo $crm_data["contact_date"];} }else{echo date('Y-m-d');}?>"
                       id="contact_date"  name="contact_date" class=" form-control "  />
                      
                </div> 
           
                <!-- <div class="form-group col-sm-2 col-xs-12 padding-4">
                      <label class="label  " style=""> وقت الاتصال</label>
                       <input type="time"
                       readonly
                       value="<?php if(isset($crm_data["contact_time"])){  if(!empty($crm_data["contact_time"])){echo $crm_data["contact_time"];} }else{echo date('H:i');}?>"
                       id="contact_time"  name="contact_time" class=" form-control "  />
                </div>  -->

                <div class="form-group  col-md-3 padding-4 ">
                    <label class="label  ">رقم الطلب/الملف </label>
                    <input type="text" id="file_num" value="<?php if(isset($zyraa_data["file_num"])){if(!empty($zyraa_data["file_num"])){echo $zyraa_data["file_num"];} }else{
                        if(!empty($crm_data["file_num"])){echo $crm_data["file_num"];}
                        }?>"
                        ondblclick="$('#myModal').modal();load_table()" data-validation="required"
                        readonly style="width: 75%;float: right"
                        class="form-control " value="" onblur="GetFamilyNum($(this).val());">
                    <button type="button" data-toggle="modal" data-target="#myModal"
                            onclick="load_table()"
                            disabled
                            class="btn btn-success btn-next" style="width: 25%;float: left;">
                        <i class="fa fa-plus"></i></button>
                    <input type="hidden" name="mother_national_num" id="mother_national_num" value="<?php if(isset($zyraa_data["mother_national_num"])){if(!empty($zyraa_data["mother_national_num"])){echo $zyraa_data["mother_national_num"];} }else{
                        if(!empty($crm_data["mother_national_num"])){echo $crm_data["mother_national_num"];}
                        }?>">
                
                </div>
              
                                  <div class="form-group  col-sm-4 padding-4">
    <label class="label ">  وسيلة الاتصال </label>
    <select name="wasela_etsal" id="wasela_etsal"   data-validation="required "
            class="form-control "  >
        <option value="">إختر</option>
        <?php foreach ($method_etsal as $row){
            $selected="";
            if(isset($crm_data)){
             
                if($crm_data['wasela_etsal']== $row->conf_id ){$selected="selected";}
             
               
            }?>
            <option value="<?=$row->conf_id?>" <?=$selected?>><?=$row->title?></option>
            <?php } ?>
    </select>
</div>  

<div class="form-group  col-sm-3 padding-4">
    <label class="label ">   نتيجة المكالمة </label>
    <select name="contact_result" id="contact_result"   data-validation="required "
            class="form-control "  >
        <option value="">إختر</option>
        <?php foreach ($natega_etsal as $row){
            $selected="";
            if(isset($crm_data)){
             
                if($crm_data['contact_result']== $row->conf_id ){$selected="selected";}
             
               
            }?>
            <option value="<?=$row->conf_id?>" <?=$selected?>><?=$row->title?></option>
            <?php } ?>
    </select>
</div>  





 


<div class="form-group  col-sm-12 padding-4">
    <label class="label ">       تفاصيل </label>
  

            <textarea class="editor1"
                              data-validation="required"
                              id="editor1" name="visit_result" rows="2" style=""><?php if(isset($crm_data["details"])){  if(!empty($crm_data["details"])){echo $crm_data["details"];} }?></textarea>
       
</div>  
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



    


           
            
            <!---------------------------------------->
            <div class="col-xs-12 text-center" style="margin-bottom: 10px;">
            <br>
                <button  type="submit" name="<?php echo $out['input']?>" value="<?php echo $out['input']?>"  class="btn btn-success  btn-labeled" id="submit_but">
                    <span class="btn-label"><i class="fa fa-floppy-o" aria-hidden="true"></i></span> <?php echo $out['input_title']?></button>
            </div>
            <!---------------------------------------->
            <?php  echo form_close()?>
            </div>
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

                        <th  class="text-center">تاريخ الاتصال </th>
                        <th  class="text-center">وقت الاتصال </th>
                        <th class="text-center"> القائم بالاتصال </th>
                        <th   class="text-center"> وسيلة الاتصال </th>
                        <th class="text-center">نتيجة المكالمة</th>
                   
                      
                        <th class="text-center">الاجراء</th>
                      
                    </tr>
                    </thead>
                    <tbody>
                <?php $x=1; foreach($all_data as $record){ ?>
                <tr class="">
                <td><?php echo $x++ ?></td>
                
                <td><?php echo $record->contact_date; ?></td>
                <td><?php echo $record->contact_time; ?></td>
                <td><?php echo $record->emp_name; ?></td>
                
                <td><?php echo $record->method_etsal_name ?>
         </td>
         <td><?php echo $record->natega_etsal_name ?>
         </td>
              
        
         <td>
<!-- yara -->
<div class="btn-group btn-group-sm">


      
            <a href="<?= base_url() . 'family_controllers/osr_crm/Osr_crm_c/Update_crm_etsal/' . $record->id .'/'.$record->zyraa_id_fk ?>" class="btn btn-warning"><i class="fa fa-pencil"></i>تعديل</a>
        <a href="<?= base_url() . 'family_controllers/osr_crm/Osr_crm_c/delete_crm_etsal/' . $record->id.'/'.$record->zyraa_id_fk  ?>" onclick="return confirm(\'Are You Sure To Delete? \')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> حذف </a>
    
       
        
        

    
    
   <a  data-toggle="modal" data-target="#myModal_details"
                        onclick="getDetails_crm(<?= $record->id ?>)" data-backdrop="static" data-keyboard="false"  class="btn btn-purple"><i class="fa fa-list"></i>تفاصيل</a>
     
 
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

<!---------------------------------------------->

<!----------------------------------------------------------------->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">ملفات الأسر </h4>
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
<?php }else{?>
    <div class="alert alert-danger"> <strong>لا  يمكنك اضافة بيانات الزيارة !</strong> .
    <?php } ?>
<!-- yara14-2-2021 -->
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
    function check_date() {
        var visit_date=$('#visit_date').val();
        var visit_time_from=$('#visit_time_from').val();
        var visit_time_to=$('#visit_time_to').val();
        if(visit_date!="" && visit_time_from!="" && visit_time_to!=""){
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>family_controllers/osr_crm/Osr_crm_c/check_date',
            data: {visit_date:visit_date,visit_time_from:visit_time_from,visit_time_to:visit_time_to},
            dataType: 'html',
            cache: false,
            success: function (html) {
                if (html == "1") {
                    $("#visit_date").val('');
                    $("#visit_time_from").val('');
                    $("#visit_time_to").val('');
                 swal(" يوجد زياره في نفس الميعاد","", "error");
                } else {
                    swal(" تم تحديد ميعاد الزيارة","", "success"); 
                  
                }
            }
        });
        }
    }
</script>


<!-- getDetails_zyraa -->
<script>
    function getDetails_crm(value) {
        if (value != 0 && value != '') {
            var dataString = 'id=' + value;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>family_controllers/osr_crm/Osr_crm_c/getDetails_crm',
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