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
<div class="col-xs-12 no-padding">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title ?> </h3>
        </div>
        <div class="panel-body">
            <?php
            if (isset($get_card) && !empty($get_card)) {
                echo form_open_multipart('technical_support/device_card/Device_card_c/update_card/' . $get_card->id);
                $no3_device = $get_card->no3_device;
                $device_code = $get_card->device_code;
                $device_rkm = $get_card->device_rkm;
                $addition_device = $get_card->addition_device;
                $brand_id_fk = $get_card->brand_id_fk;
                $model_id_fk = $get_card->model_id_fk;
                $describe = $get_card->describe;
                $device_exist = $get_card->device_exist;
                $geha_morda = $get_card->geha_morda;
                $daman_duration = $get_card->daman_duration;
                $nsbet_ehlak = $get_card->nsbet_ehlak;
                $value = $get_card->value;
                $estbdal_date=$get_card->estbdal_date;
            } else {
                echo form_open_multipart('technical_support/device_card/Device_card_c/add_card');
                $no3_device = '';
                $device_code = '';
                $device_rkm = '';
                $addition_device = '';
                $brand_id_fk = '';
                $model_id_fk = '';
                $describe = '';
                $device_exist = '';
                $geha_morda = '';
                $daman_duration = '';
                $value='';
                $nsbet_ehlak='';
                $estbdal_date=date('Y-m-d');
            }
            ?>
            <div class="col-xs-12">

            <div class="form-group col-md-2  padding-4">
                    <label class="label">  كود الجهاز</label>
                    <input type="text" name="device_code" id="device_code" value="<?= $device_code ?>"
                           class="form-control "
                           data-validation="required"
                        >
                </div>

                <div class="form-group col-md-2  padding-4">
                    <label class="label">   الرقم التسلسلي</label>
                    <input type="number" name="device_rkm" id="device_rkm" value="<?= $device_rkm ?>"
                           class="form-control "
                           data-validation="required"
                        >
                </div>
                <div class="form-group col-md-2  padding-4">
                    <label class="label"> نوع الجهاز</label>
                    <select class="form-control " id="no3_device" name="no3_device" class="form-control"
                            data-validation="required" >
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
                <div class="form-group col-md-4  padding-4">
                    <label class="label">  ملحقات الجهاز</label>
                    <input type="text" name="addition_device" id="addition_device" value="<?= $addition_device ?>"
                           class="form-control "
                           data-validation="required"
                        >
                </div>
                <div class="form-group col-md-2  padding-4">
                    <label class="label">  الماركة</label>
                    <select class="form-control " id="brand_id_fk" name="brand_id_fk" class="form-control"
                            data-validation="required" 
                            onchange="get_model()"
                            >
                        <option value="">اختر</option>
                        <?php
                        if (isset($brands) && !empty($brands)) {
                            foreach ($brands as $row) {
                                ?>
                                <option value="<?php echo $row->id; ?>"
                                    <?php
                                    if ($brand_id_fk == $row->id) {
                                        echo 'selected';
                                    }
                                    ?>
                                ><?php echo $row->name; ?></option>
                            <?php }
                        } ?>
                    </select>
                </div>
                <div class="form-group col-md-2  padding-4">
                    <label class="label">  الموديل</label>
                    <select class="form-control " id="model_id_fk" name="model_id_fk" class="form-control"
                            data-validation="required" 
                            
                            >
                        <option value="">اختر</option>
                        <?php
                        if (isset($models) && !empty($models)) {
                            foreach ($models as $row) {
                                ?>
                                <option value="<?php echo $row->id; ?>"
                                    <?php
                                    if ($model_id_fk == $row->id) {
                                        echo 'selected';
                                    }
                                    ?>
                                ><?php echo $row->name; ?></option>
                            <?php }
                        } ?>
                    </select>
                </div>
                <div class="form-group col-md-2  padding-4">
                    <label class="label">  ألية توافر الجهاز</label>
                    <select class="form-control " id="device_exist" name="device_exist" class="form-control"
                            data-validation="required" 
                            
                            >
                        <option value="">اختر</option>
                        <?php
                        $device_exis=array(1=>'شراء'
                        ,2=>'تبرع');
                        if (isset($device_exis) && !empty($device_exis)) {
                            foreach ($device_exis as $row=>$valuee) {
                                ?>
                                <option value="<?php echo $row?>"
                                    <?php
                                    if ($device_exist == $row) {
                                        echo 'selected';
                                    }
                                    ?>
                                ><?php echo $valuee; ?></option>
                            <?php }
                        } ?>
                    </select>
                </div>
                <div class="form-group col-md-4  padding-4">
                    <label class="label">   المواصفات</label>
                    <input type="text" name="describe" id="describe" value="<?= $describe ?>"
                           class="form-control "
                           data-validation="required"
                        >
                </div>
                <div class="form-group col-md-4  padding-4">
                    <label class="label">  الجهة الموردة</label>
                    <input name="geha_morda" id="geha_morda"
                    type="text"
                           class="form-control "
                           value="<?= $geha_morda?>"
                           data-validation="required"
                    >
                </div>

                <div class="form-group col-md-2  padding-4">
                    <label class="label">   مدة الضمان</label>
                  
                    <input name="daman_duration" id="daman_duration"
                           class="form-control "
                           type="number"
                           value="<?= $daman_duration?>"
                           data-validation="required"
                    >
                    شهر
                </div>
                <div class="form-group col-md-2  padding-4">
                    <label class="label">    القيمة</label>
                  
                    <input name="value" id="value"
                    type="number"
                           class="form-control "
                           value="<?=$value?>"
                           data-validation="required"
                    >
                    
                </div>
                <div class="form-group col-md-2  padding-4">
                    <label class="label">    نسبة الاهلاك</label>
                  
                    <input name="nsbet_ehlak" id="nsbet_ehlak"
                    type="number"
                           class="form-control "
                           value="<?= $nsbet_ehlak?>"
                           data-validation="required"
                    >
                    %
                    
                </div>
                <div class="form-group col-md-2  padding-4">
                    <label class="label">    تاريخ الاستبدال المتوقع </label>
                  
                    <input name="estbdal_date" id="estbdal_date"
                    type="date"
                           class="form-control "
                           value="<?= $estbdal_date?>"
                           data-validation="required"
                    >
                   
                    
                </div>
            </div>
            
            <div class="col-xs-12 text-center">
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
if (isset($all_card) && !empty($all_card)){
    $x=1;
    ?>
    <div class="col-xs-12 no-padding ">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
    <div class="panel-heading">
        <h3 class="panel-title">بطاقة جهاز </h3>
    </div>
    <div class="panel-body">
        <table class="table example table-striped table-bordered dt-responsive nowrap">
            <thead>
            <tr class="greentd">
                <th>م</th>
                <th>كود الجهاز</th>
                <th>  الرقم التسلسلي </th>
                <th>  نوع الجهاز</th>
                <th> الماركة</th>
                <th>الموديل</th>
                <th>المواصفات</th>
                <th>الجهة الموردة</th>
              
               
                <th>الإجراءات</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($all_card as $record){
               
                ?>
                <tr>
                    <td><?= $x++?></td>
                    <td><?= $record->device_code?></td>
                    <td><?= $record->device_rkm?></td>
                    <td><?= $record->no3_device_n?></td>
                    <td><?= $record->brand_n?></td>
                    <td><?= $record->model_n?></td>
                    <td><?= $record->describe?></td>
                    <td><?= $record->geha_morda?></td>

                    
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
                            window.location="<?php echo base_url(); ?>technical_support/device_card/Device_card_c/update_card/<?php echo $record->id; ?>";
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
                            window.location="<?= base_url() . "technical_support/device_card/Device_card_c/delete_card/" . $record->id ?>";
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
