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
                echo form_open_multipart('technical_support/device_card/Device_card_c/update_ohda/' . $get_card->id);

                $ohda_rkm=$get_card->ohda_rkm;
                $ohda_type=$get_card->ohda_type;
                $ohda_date=$get_card->ohda_date;
                $rkm = $get_card->rkm;

                ///////////////////////
                $no3_device = $get_card->no3_device;
              //  $device_code = $get_card->device_code;
                $device_rkm = $get_card->device_rkm;
                $addition_device = $get_card->addition_device;
                $brand_id_fk = $get_card->brand_id_fk;
                $model_id_fk = $get_card->model_id_fk;
                $describe = $get_card->describe;
                $nsbet_ehlak = $get_card->nsbet_ehlak;
                $value = $get_card->value;
                $estbdal_date=$get_card->estbdal_date;
                $date_added=$get_card->date_added;
                /////////////
                $emp_name=$get_card->emp_name;
                $emp_code=$get_card->emp_code;
                $emp_id_fk=$get_card->emp_id_fk;
                $job_title=$get_card->job_title;
                $edara_n=$get_card->edara_n;
                $qsm_n=$get_card->qsm_n;
                ////
                $notes=$get_card->notes;




                    } else {
                echo form_open_multipart('technical_support/device_card/Device_card_c/add_ohda');

                $ohda_rkm='';
                $ohda_type='';
                $ohda_date=date('Y-m-d');
                $rkm = '';
                /////////////
                $no3_device = '';
                $device_rkm = '';
                $addition_device = '';
                $brand_id_fk = '';
                $model_id_fk = '';
                $describe = '';
                $value='';
                $nsbet_ehlak='';
                $estbdal_date='';
                $date_added='';
                ////////////

                $emp_name='';
                $emp_code='';
                $emp_id_fk='';
                $job_title='';
                $edara_n='';
                $qsm_n='';
                ///////
                $notes='';
                    }
                    ?>
          
          <div class="col-md-8 form-group">
                    <!-- عهدة جهاز الكتروني -->
                <div class="form-group col-md-2  padding-4">
                    <label class="label">   الرقم</label>
                    <input type="text" name="ohda_rkm" id="ohda_rkm" value="<?= $ohda_rkm ?>"
                           class="form-control "
                           data-validation="required"
                        >
                </div>


                <div class="form-group col-md-2  padding-4">
                    <label class="label"> نوع العهدة  </label>
                    <select class="form-control " id="ohda_type" name="ohda_type" class="form-control"
                            data-validation="required" 
                            
                            >
                        <option value="">اختر</option>
                        <?php
                        $ohda_types=array(1=>'عهدة مؤقتة '
                        ,2=>'عهدة مستديمة ');
                        if (isset($ohda_types) && !empty($ohda_types)) {
                            foreach ($ohda_types as $row=>$valuee) {
                                ?>
                                <option value="<?php echo $row?>"
                                    <?php
                                    if ($ohda_type == $row) {
                                        echo 'selected';
                                    }
                                    ?>
                                ><?php echo $valuee; ?></option>
                            <?php }
                        } ?>
                    </select>
                </div>

                <div class="form-group col-md-2  padding-4">
                    <label class="label">   التاريخ</label>
                    <input type="date" name="ohda_date" id="ohda_date" value="<?= $ohda_date ?>"
                           class="form-control "
                           data-validation="required"
                        >
                </div>
                    <!-- بيانات الجهاز -->

                <div class="form-group col-md-2  padding-4">
                    <label class="label"> نوع الجهاز</label>
                    <select class="form-control " id="no3_device" name="no3_device" class="form-control"
                            data-validation="required" 
                            onchange="get_devices();"
                            >
                        <option value="">اختر</option>
                        <?php
                        if (isset($device_type) && !empty($device_type)) {
                            foreach ($device_type as $row) {
                                ?>
                                <option value="<?php echo $row->id; ?>"
                                    <?php
                                    if ($no3_device == $row->id) {
                                        echo 'selected';
                                    }
                                    ?>
                                ><?php echo $row->name; ?></option>
                            <?php }
                        } ?>
                    </select>
                </div>

                <div class="form-group col-md-2  padding-4">
                    <label class="label">  رقم الجهاز</label>
                    <!-- <input type="text" name="devices_rkm" id="devices_rkm" value="<?= $devices_rkm ?>"
                           class="form-control "
                           data-validation="required"
                        > -->

                        <select class="form-control " id="rkm" name="rkm" class="form-control"
                            data-validation="required" 
                            onchange="get_devices_details();"
                            >
                        <option value="">اختر</option>
                        <?php
                        if (isset($devices_rkm_fk) && !empty($devices_rkm_fk)) {
                            foreach ($devices_rkm_fk as $row) {
                                ?>
                                <option value="<?php echo $row->id; ?>"
                                    <?php
                                    if ($rkm == $row->id) {
                                        echo 'selected';
                                    }
                                    ?>
                                ><?php echo $row->id; ?></option>
                            <?php }
                        } ?>
                    </select>
                </div>

                <div class="form-group col-md-2  padding-4">
                    <label class="label">   الرقم التسلسلي</label>
                    <input type="number" name="device_rkm" id="device_rkm" value="<?= $device_rkm ?>"
                           class="form-control "
                           readonly
                           data-validation="required"
                        >
                </div>
               
                <div class="form-group col-md-4  padding-4">
                    <label class="label">  ملحقات الجهاز</label>
                    <input type="text" name="addition_device" id="addition_device" value="<?= $addition_device ?>"
                    readonly
                           class="form-control "
                           data-validation="required"
                        >
                </div>
                <div class="form-group col-md-2  padding-4">
                    <label class="label">  الماركة</label>
                 

                            <input class="form-control " id="brand_id_fk" name="brand_id_fk" class="form-control"
                            data-validation="required" 
                            value="<?=$brand_id_fk?>"
                            readonly
                           />
                       
                </div>
                <div class="form-group col-md-2  padding-4">
                    <label class="label">  الموديل</label>
                    <input class="form-control " id="model_id_fk" name="model_id_fk" class="form-control"
                            data-validation="required" 
                            value="<?=$model_id_fk?>"
                            readonly
                           />
                       
                </div>
               
                <div class="form-group col-md-4  padding-4">
                    <label class="label">   المواصفات</label>
                    <input type="text" name="describe" id="describe" value="<?= $describe ?>"
                           class="form-control " readonly
                           data-validation="required"
                        >
                </div>
               
                <div class="form-group col-md-2  padding-4">
                    <label class="label">    القيمة</label>
                  
                    <input name="value" id="value" readonly
                    type="number"
                           class="form-control "
                           value="<?=$value?>"
                           data-validation="required"
                    >
                    
                </div>
                <div class="form-group col-md-3  padding-4">
                    <label class="label">    تاريخ الاضافة </label>
                  
                    <input name="date_added" id="date_added" readonly
                    type="date"
                           class="form-control "
                           value="<?= $date_added?>"
                           data-validation="required"
                    >
                   
                    
                </div>
                <div class="form-group col-md-2  padding-4">
                    <label class="label">    نسبة الاهلاك</label>
                  
                    <input name="nsbet_ehlak" id="nsbet_ehlak" readonly
                    type="number"
                           class="form-control "
                           value="<?= $nsbet_ehlak?>"
                           data-validation="required"
                    >
                    %
                    
                </div>
                <div class="form-group col-md-3  padding-4">
                    <label class="label">    تاريخ الاستبدال المتوقع </label>
                  
                    <input name="estbdal_date" id="estbdal_date"
                    type="date" class="form-control " readonly
                           value="<?= $estbdal_date?>"
                           data-validation="required" >  
                </div>
            
                <div class="col-md-12 no-padding">
                <label class="label">
                ملاحظات:
                </label>
                <textarea name="notes" id="notes" class="form-control"
                                    ><?=$notes?></textarea>
            </div>
            
            

                </div>
            <div class="col-md-4 form-group">
               
            <table class="table table-bordered ">
        <tbody>
        <tr>
            <td style="background-color: #e4e4e4 !important;" colspan="6">
                <i class="fa fa-info-circle" aria-hidden="true"></i>
                بيانات المستلم
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
if (isset($all_ohda) && !empty($all_ohda)){
    $x=1;
    ?>
    <div class="col-xs-12 no-padding ">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
    <div class="panel-heading">
        <h3 class="panel-title">عهدة جهاز الكتروني </h3>
    </div>
    <div class="panel-body">
        <table class="table example table-striped table-bordered dt-responsive nowrap">
            <thead>
            <tr class="greentd">
                <th>م</th>
                <th>  اسم المستلم  </th>
           
                <th>نوع العهدة</th>
                <th>  نوع الجهاز</th>
                <th> الماركة</th>
                <th>الموديل</th>
                <th>المواصفات</th>
               
              
               
                <th>الإجراءات</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($all_ohda as $record){
               
                ?>
                <tr>
                    <td><?= $x++?></td>
                    <td><?= $record->emp_name?></td>
                    <td><?php 
                    if($record->ohda_type==1)
                    {
                        echo  'عهدة مؤقتة';
                    }
                    elseif ($record->ohda_type==2)
                    {
                        echo  'عهدة مستديمة';    
                    }?></td>
                    <td><?= $record->no3_device_n?></td>
                    <td><?= $record->brand_id_fk?></td>
                    <td><?= $record->model_id_fk?></td>
                    <td><?= $record->describe?></td>
          

                    
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
                            window.location="<?php echo base_url(); ?>technical_support/device_card/Device_card_c/update_ohda/<?php echo $record->id; ?>";
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
                            window.location="<?= base_url() . "technical_support/device_card/Device_card_c/delete_ohda/" . $record->id ?>";
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
    function get_model() {
        var brand_id_fk=$('#brand_id_fk').val();
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>technical_support/device_card/Device_card_c/get_models",
            data: {from_code: brand_id_fk},
            success: function (d) {
                $('#model_id_fk').html(d);
            }
        });
    }
</script>

<!-- get_model_name -->
<!-- get_card -->
<script>
    function get_brand_name(model_id_fk) {
      
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>technical_support/device_card/Device_card_c/get_model_name",
            data: {from_code: model_id_fk},
            success: function (d) {
                $('#brand_id_fk').val(d);
            }
        });
    }
</script>
<script>
    function get_model_name(model_id_fk) {
      
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>technical_support/device_card/Device_card_c/get_model_name",
            data: {from_code: model_id_fk},
            success: function (d) {
                $('#model_id_fk').val(d);
            }
        });
    }
</script>
<!-- get_devices -->
<script>
    function get_devices() {
        var no3_device=$('#no3_device').val();
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>technical_support/device_card/Device_card_c/get_devices",
            data: {from_code: no3_device},
            success: function (d) {
                $('#rkm').html(d);
            }
        });
    }
</script>

<!-- get_devices_details -->

<script>
    function get_devices_details() {
      var rkm=$('#rkm').val();
      $.ajax({
            url: "<?php echo base_url() ?>technical_support/device_card/Device_card_c/get_devices_details",
            type: "Post",
            dataType: "html",
            data: {rkm: rkm},
            success: function (data) {

                var obj = JSON.parse(data);
                console.log(obj);
               console.log(obj.title_setting);

                $('#device_rkm').val(obj.device_rkm);
                $('#addition_device').val(obj.addition_device);
              //  $('#brand_id_fk').val(obj.brand_id_fk);
          get_model_name(obj.model_id_fk);
           get_brand_name(obj.brand_id_fk);
              
                $('#describe').val(obj.describe);
                $('#value').val(obj.value);
                $('#date_added').val(obj.date_added);
                $('#nsbet_ehlak').val(obj.nsbet_ehlak);
                $('#estbdal_date').val(obj.estbdal_date);
                
            }

        });
    }
</script>

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
          
            // get_emp_sidebar();
           
            document.getElementById('job_title').value = job_title;

            document.getElementById('edara_n').value = edara_n;
           
          //  document.getElementById('no3_dawam').value = no3_dawam;
            document.getElementById('qsm_n').value = qsm_n;
            // document.getElementById('qsm_n').value = qsm_n;
            // document.getElementById('qsm_id_fk').value = qsm_id;

            $("#myModal_emps .close").click();
        }
    </script>