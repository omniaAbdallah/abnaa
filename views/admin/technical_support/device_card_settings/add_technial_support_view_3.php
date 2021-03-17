<style type="text/css">
    .top-label {
        font-size: 14px;
        font-weight: 500;
    }
    .print_forma {
        /*border:1px solid #73b300;*/
        padding: 15px;
    }
    .piece-box {
        margin-bottom: 12px;
        border: 1px solid #73b300;
        display: inline-block;
        width: 100%;
    }
    .piece-heading {
        background-color: #9bbb59;
        display: inline-block;
        float: right;
        width: 100%;
    }
    .piece-body {
        width: 100%;
        float: right;
    }
    .bordered-bottom {
        border-bottom: 4px solid #9bbb59;
    }
    .piece-footer {
        display: inline-block;
        float: right;
        width: 100%;
        border-top: 1px solid #73b300;
    }
    .piece-heading h5 {
        margin: 4px 0;
        color: #fff;
    }
    .piece-box table {
        margin-bottom: 0
    }
    .piece-box table th,
    .piece-box table td {
        padding: 2px 8px !important;
    }
    .piece-box h6 {
        font-size: 16px;
        margin-bottom: 5px;
        margin-top: 5px;
    }
    .print_forma table th {
        text-align: right;
    }
    .print_forma table tr th {
        vertical-align: middle;
    }
    .no-padding {
        padding: 0;
    }
    .header p {
        margin: 0;
    }
    .header img {
        height: 120px;
        width: 100%
    }
    .main-title {
        display: table;
        text-align: center;
        position: relative;
        height: 120px;
        width: 100%;
    }
    .main-title h4 {
        display: table-cell;
        vertical-align: bottom;
        text-align: center;
        width: 100%;
    }
    .print_forma hr {
        border-top: 1px solid #73b300;
        margin-top: 7px;
        margin-bottom: 7px;
    }
    .no-border {
        border: 0 !important;
    }
    .gray_background {
        background-color: #eee;
    }
    @page {
        size: A4;
        margin: 20px 0 0;
    }
    .open_green {
        background-color: #e6eed5;
    }
    .closed_green {
        background-color: #cdddac;
    }
    .table-bordered > thead > tr > th, .table-bordered > tbody > tr > th,
    .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td,
    .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > td {
        border: 1px solid #abc572;
        vertical-align: middle;
    }
    .under-line {
        border-top: 1px solid #abc572;
        padding-left: 0;
        padding-right: 0;
    }
    span.valu {
        padding-right: 10px;
        font-weight: 600;
        font-family: sans-serif;
    }
    .under-line .col-xs-3,
    .under-line .col-xs-4,
    .under-line .col-xs-6,
    .under-line .col-xs-8 {
        border-left: 1px solid #abc572;
    }
    .nonactive {
        pointer-events: none;
        cursor: not-allowed;
    }
    label {
        margin-bottom: 5px !important;
        color: #002542 !important;
        display: block !important;
        text-align: right !important;
        font-size: 16px !important;
        padding: 0 !important;
        height: auto;
    }
    td input[type=radio] {
        height: 20px;
        width: 20px;
    }
    .tb-table tbody th, .tb-table tbody td {
        padding: 0px !important;
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
<div class="col-xs-12 no-padding">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title ?> </h3>
        </div>
        <div class="panel-body">
            <?php
                if (isset($get_card) && !empty($get_card)) {
                echo form_open_multipart('technical_support/device_card/Device_card_c/update_technial_support/' . $get_card->id);

                $rkm_talb=$get_card->rkm_talb;
                $talb_type=$get_card->talb_type;
                $talb_date=$get_card->talb_date;
                $device_code = $get_card->device_code;
                $device_rkm = $get_card->device_rkm;
                $wasf = $get_card->wasf;
                $mada_hdoth = $get_card->mada_hdoth;
                $emp_name=$get_card->emp_name;
                $emp_code=$get_card->emp_code;
                $emp_id_fk=$get_card->emp_id_fk;
                $job_title=$get_card->job_title;
                $edara_n=$get_card->edara_n;
                $qsm_n=$get_card->qsm_n;
                ////
             
                    } else {
                echo form_open_multipart('technical_support/device_card/Device_card_c/add_technial_support');

                $rkm_talb='';
                $talb_type='';
                $talb_date=date('Y-m-d');
                $device_rkm = '';
                $device_code = '';
                $wasf = '';
                $mada_hdoth='';
                $emp_name='';
                $emp_code='';
                $emp_id_fk='';
                $job_title='';
                $edara_n='';
                $qsm_n='';
                ///////
              
                    }
                    ?>
          
          <div class="col-md-8 form-group">
                    <!-- عهدة جهاز الكتروني -->
                <div class="form-group col-md-2  padding-4">
                    <label class="label">   رقم الطلب</label>
                    <input type="text" name="rkm_talb" id="rkm_talb" value=""
                    readonly
                           class="form-control "

                        >
                </div>
                <div class="form-group col-md-3  padding-4">
                    <label class="label">    تاريخ الطلب</label>
                    <input type="date" name="talb_date" id="talb_date" value="<?= $talb_date ?>"
                           class="form-control "
                           data-validation="required"
                        >
                </div>
                <div class="form-group col-md-3  padding-4">
                    <label class="label"> كود الجهاز</label>
                    <input type="text" name="device_code" id="device_code" value="<?= $device_code ?>"
                           class="form-control "
                           
                           data-validation="required"
                        >
                </div>
                <div class="form-group col-md-4  padding-4">
                    <label class="label">    الرقم التسلسلي للجهاز</label>
                    <input type="text" name="device_rkm" id="device_rkm" value="<?= $device_rkm ?>"
                           class="form-control "
                           
                           data-validation="required"
                        >
                </div>
                <div class="form-group col-md-4  padding-4">
                    <label class="label"> نوع الطلب  </label>
                    <select class="form-control " id="talb_type" name="talb_type" class="form-control"
                            data-validation="required" 
                            
                            >
                        <option value="">اختر</option>
                        <?php
                       
                        if (isset($talb_types) && !empty($talb_types)) {
                            foreach ($talb_types as $row) {
                                ?>
                                <option value="<?php echo $row->id?>"
                                    <?php
                                    if ($talb_type == $row->id) {
                                        echo 'selected';
                                    }
                                    ?>
                                ><?php echo $row->name; ?></option>
                            <?php }
                        } ?>
                    </select>
                </div>
                <div class="form-group col-md-4  padding-4">
                    <label class="label"> مدى الحدوث  </label>
                    <select class="form-control " id="mada_hdoth" name="mada_hdoth" class="form-control"
                            data-validation="required" 
                            
                            >
                        <option value="">اختر</option>
                        <?php
                        $mada_hdoth_types=array('first_time'=>' أول مره',
                        'more_than_one'=>' اكثر من مرة ',
                        'not_selected'=>' غير محدد '
                    );
                        if (isset($mada_hdoth_types) && !empty($mada_hdoth_types)) {
                            foreach ($mada_hdoth_types as $row=>$valuee) {
                                ?>
                                <option value="<?php echo $row?>"
                                    <?php
                                    if ($mada_hdoth == $row) {
                                        echo 'selected';
                                    }
                                    ?>
                                ><?php echo $valuee; ?></option>
                            <?php }
                        } ?>
                    </select>
                </div>
               
                  
              
                

                
            
                <div class="col-md-12 no-padding">
                <label class="label">
                وصف الدعم:
                </label>
                <textarea name="wasf" id="wasf" class="form-control"
                data-validation="required" 
                                    ><?=$wasf?></textarea>
            </div>


            
            
            <!-- مدى الحدوث  -->
            

                </div>
            <div class="col-md-4 form-group">
               
            <table class="table table-bordered ">
        <tbody>
        <tr>
            <td style="background-color: #e4e4e4 !important;" colspan="6">
                <i class="fa fa-info-circle" aria-hidden="true"></i>
                بيانات مقدم الطلب
            </td>
        </tr>
             
             <tr>
             <th class="info"><i class="fa fa-id-card-o" aria-hidden="true"></i>أسم الموظف  </th>
             <td class="infotd text-center">
                <input name="emp_name" id="emp_name" class="form-control"
                                   style="width:84%; float: right;" readonly
                                   data-validation="required"
                                   value="<?=$emp_name?>">
                                   <input name="emp_id_fk" id="emp_id_fk" class="form-control"
                                  type="hidden"
                                   value="<?=$emp_id_fk?>">
                            <button type="button" data-toggle="modal" data-target="#myModal_emps"
                                    class="btn btn-success btn-next" id="but"
                                    onclick="GetDiv_emps('myDiv_emp')" 
                            >
                                <i class="fa fa-plus"></i></button>
                </td>
            </tr>

            <tr>
            <th class="info">
                <i class="fa fa-file-o" aria-hidden="true"></i> الرقم الوظيفي   </th>
                <td class="infotd text-center">
                <input name="emp_code" id="emp_code" class="form-control"
                                   value="<?=$emp_code?>" readonly>
                </td>

        </tr>

               <tr>
               <th class="info">
                <i class="fa fa-file-o" aria-hidden="true"></i>المسمى الوظيفي</th>
                <td class="infotd text-center">
                <input name="job_title" id="job_title" class="form-control"
                                   value="<?=$job_title?> " readonly>
                </td>

                </tr>

                <tr>
                <th class="info">
                <i class="fa fa-file-o" aria-hidden="true"></i>الادارة </th>
                <td class="infotd text-center">
                <input name="edara_n" id="edara_n" class="form-control"
                                   value="<?=$edara_n?> " readonly>
                </td>
                </tr>

                <tr>
                <th class="info">
                <i class="fa fa-file-o" aria-hidden="true"></i>القسم</th>
                <td class="infotd text-center">
                <input name="qsm_n" id="qsm_n" class="form-control"
                                   value=" " readonly>
                </td>
                </tr>
              
                
                
               
              
                
               
              
                </tbody>
                </table>
            </div>

           
            
           
            


       
    
    <div class="col-xs-12 text-right">
            </br>
                <button type="submit" class="btn btn-labeled btn-success " name="add" value="add"
                        style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ 
                </button>
            </div>
            <?php
            echo form_close();
            ?>
            </div>
    </div>
    </div>
<?php
if (isset($all_technial_support) && !empty($all_technial_support)){
    $x=1;
    ?>
    <div class="col-xs-12 no-padding ">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
    <div class="panel-heading">
        <h3 class="panel-title">طلب دعم فني تقني </h3>
    </div>
    <div class="panel-body">
        <table class="table example table-striped table-bordered dt-responsive nowrap">
            <thead>
            <tr class="greentd">
                <th>م</th>
                <th> رقم الطلب</th>
                <th> تاريخ تقديم الطلب</th>
                <th> مقدم الطلب</th>
                <th>نوع الطلب</th>
                <th> كود الجهاز</th>
                <th>الإجراءات</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($all_technial_support as $record){
               
                ?>
                <tr>
                    <td><?= $x++?></td>
                    <td><?= $record->rkm_talb?></td>
                    <td><?= $record->talb_date?></td>
                    <td><?= $record->emp_name?></td>
                    <td><?= $record->no3_talb_n?></td>
                    <td><?= $record->device_code?></td>
                  
          

                    
                    <td>
                      
                      
                          
                        <a href="#" onclick='swal({
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
                            window.location="<?php echo base_url(); ?>technical_support/device_card/Device_card_c/update_technial_support/<?php echo $record->id; ?>";
                            });'>
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <a href="#" onclick='swal({
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
                            window.location="<?= base_url() . "technical_support/device_card/Device_card_c/delete_technial_support/" . $record->id ?>";
                            });'>
                            <i class="fa fa-trash"> </i></a>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
    </div>
    </div>
<?php
}
?>

<div class="modal fade" id="myModal_emps" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document" style="width: 80%">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </div>
                <div class="modal-body">
                    <div id="myDiv_emp"></div>
                </div>
                <div class="modal-footer" style="display: inline-block;width: 100%">
                    <button type="button" class="btn btn-danger"
                            style="float: left;" onclick="$('#myModal_emps').modal('hide')">إغلاق
                    </button>
                </div>
            </div>
        </div>
</div>


    <script>
        function GetDiv_emps(div) {
            html = '<div class="col-md-12 no-padding"><table id="js_table_members2" class="table table-striped table-bordered dt-responsive nowrap " >' +
                '<thead><tr class="info"><th style="width: 50px;">#</th><th style="width: 50px;"> أسم الموظف  </th>' +
                '<th style="width: 170px;" >الأدارة   </th>' +
                '<th style="width: 170px;" >القسم</th>' +
                '</tr></thead><table><div id="dataMember"></div></div>';
            $("#" + div).html(html);
            $('#js_table_members2').show();
            var oTable_usergroup = $('#js_table_members2').DataTable({
                dom: 'Bfrtip',
                "ajax": '<?php echo base_url(); ?>technical_support/device_card/Device_card_c/getConnection_emp/',
                aoColumns: [
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

  
        function Get_emp_Name(obj) {
            console.log(' obj :' + obj.dataset.job_title + ': ');
            var name = obj.dataset.name;
            var emp_code = obj.dataset.emp_code;
            var edara_id = obj.dataset.edara_id;
            var edara_n = obj.dataset.edara_n;
            var job_title = obj.dataset.job_title;
             var qsm_n = obj.dataset.qsm_n;
            document.getElementById('emp_name').value = name;
            document.getElementById('emp_id_fk').value = obj.value;
            document.getElementById('emp_code').value = emp_code;
            document.getElementById('job_title').value = job_title;
            document.getElementById('edara_n').value = edara_n;
            document.getElementById('qsm_n').value = qsm_n;
            $("#myModal_emps .close").click();
        }
    </script>