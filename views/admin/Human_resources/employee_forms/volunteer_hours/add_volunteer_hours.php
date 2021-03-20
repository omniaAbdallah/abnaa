<style type="text/css">
    .mystyle {
        width: 37%;
        height: 34px;
        padding: 6px 6px;
        font-size: 14px;
        line-height: 1.42857143;
        color: #555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
        -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    }
    .mystyle3 {
        width: 9%;
        height: 34px;
        padding: 6px 6px;
        font-size: 14px;
        line-height: 1.42857143;
        color: #555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
        -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    }
    .print_forma {
        /*border:1px solid #73b300;*/
        padding: 15px;
    }
    .piece-box {
        margin-bottom: 12px;
        border: 1px solid #09704e;
        display: inline-block;
        width: 100%;
    }
    .piece-heading {
        background-color: #09704e;
        display: inline-block;
        float: right;
        width: 100%;
        color: #fff;
        padding: 5px;
    }
    .piece-body {
        padding: 10px;
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
    }
    .piece-body h5 {
        margin: 5px 0;
    }
    .piece-box table {
        /*  margin-bottom: 0*/
    }
    .piece-box table th,
    .piece-box table td {
        /*  padding: 2px 8px !important;*/
    }
    table.table_tb tbody td {
        padding: 0;
    }
    h6 {
        font-size: 16px;
        margin-bottom: 3px;
        margin-top: 3px;
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
    @media print {
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    }
    .footer img {
        width: 100%;
        height: 120px;
    }
    @page {
        size: A4;
        margin: 20px 0 0;
    }
    .piece-box .table-bordered > thead > tr > th, .piece-box .table-bordered > tbody > tr > th,
    .piece-box .table-bordered > tfoot > tr > th, .piece-box .table-bordered > thead > tr > td,
    .piece-box .table-bordered > tbody > tr > td, .piece-box .table-bordered > tfoot > tr > td {
        border: 1px solid #09704e !important;
        background-color: #fff;
        border-radius: 0 !important;
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
    .under-line .col-sm-2,
    .under-line .col-sm-3,
    .under-line .col-sm-4,
    .under-line .col-sm-5,
    .under-line .col-sm-6,
    .under-line .col-sm-8 {
        border-left: 1px solid #abc572;
    }
    .managment-div-select .btn-group.bootstrap-select {
        width: 85%;
    }
    .help-block.form-error {
        position: absolute;
        top: 27px;
        left: 13%;
    }
    table .help-block.form-error {
        position: relative;
        top: auto;
        left: auto;
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
    .top-label {
        font-size: 14px;
        font-weight: 500;
        position: relative;
    }
    .green-bg {
        background-color: #09704e !important;
        color: #fff !important;
    }
</style>
<?php
if (isset($result) && !empty($result)) {
    $emp_id_fk = $result->emp_id_fk;
    $emp_code = $result->emp_code;
    $card_num = $result->card_num;
    $job_title_id_fk = $result->job_title_id_fk;
    $edara_id_fk = $result->edara_id_fk;
    $qsm_id_fk = $result->qsm_id_fk;
    $mostafed_type_fk = $result->mostafed_type_fk;
    $mostafed_edara_id = $result->mostafed_edara_id;
    $mostafed_direction_id = $result->mostafed_direction_id;
    $responsible = $result->responsible;
    $job = $result->job;
    $tele = $result->tele;
    $mob = $result->mob;
    $email = $result->email;
    $volunteer_date = date('Y-m-d', $result->volunteer_date);
    $to_time = $result->to_time;
    $from_time = $result->from_time;
    $num_hours = $result->num_hours;
    $place = $result->place;
    $place_id_fk = $result->place_id_fk;
    $activities = $result->activities;
    $volunteer_description = $result->volunteer_description;
    $volunteer_description_id_fk = $result->volunteer_description_id_fk;
    $emp_code = $result->emp_code;
    $job_title = $result->job_title;
    // $emp_code_fk = $result->emp_code_fk;
    $edara_id_fk = $result->edara_id_fk;
    $emp_name = $result->emp_name;
    $edara_n = $result->edara_name;
    $qsm_id_fk = $result->qsm_id_fk;
    $qsm_n = $result->qsm_name;
    $direct_manager_id_fk = $result->direct_manager_id_fk;

    // $marad_name = $item->marad_name;
} else {
    $emp_id_fk = '';
    $emp_code = '';
    $emp_name = '';
    $card_num = '';
    $job_title_id_fk = '';
    $edara_id_fk = '';
    $qsm_id_fk = '';
    $mostafed_type_fk = '';
    $mostafed_edara_id = '';
    $mostafed_direction_id = '';
    $responsible = '';
    $job = '';
    $tele = '';
    $mob = '';
    $email = '';
    $volunteer_date = date('Y-m-d');
    $to_time = '';
    $from_time = '';
    $num_hours = '';
    $place = '';
    $place_id_fk = '';
    $activities = '';
    $volunteer_description = '';
    $volunteer_description_id_fk = '';
    $emp_code = '';
    $emp_id_fk = '';
    $emp_code_fk = '';
    $edara_id_fk = '';
    $edara_n = '';
    $qsm_id_fk = '';
    $qsm_n = '';
    $job_title = '';
    $direct_manager_id_fk = '';

}
if (isset($forsa_data) && (!empty($forsa_data))) {
    $type_forsa = 1;
    $emp_name = $forsa_data->mokdm_talab;
    $qsm_id_fk = '';
    $edara_id_fk = '';
    $emp_id_fk = $forsa_data->mokdm_emp_id;
    $emp_code = '';
    $job_title = '';
    $edara_n = '';
    $qsm_n = '';
    $card_num = '';
    $mostafed_type_fk = 0;
    $mostafed_edara_id = $forsa_data->edara_id;
    $mostafed_direction_id = '';
    $responsible = $forsa_data->moshrf_name;
    $responsible_id = $forsa_data->moshrf_emp_id;
    $job = $forsa_data->moshrf_job;
    $tele = $forsa_data->moshrf_tele;
    $mob = $forsa_data->moshrf_jwal;
    $email = $forsa_data->moshrf_email;
    $volunteer_date = $forsa_data->from_date;
    $to_time = $forsa_data->to_time;
    $from_time = $forsa_data->from_time;
    $num_hours = $forsa_data->tataw3_hours;
    $place = $forsa_data->makan;
    $place_id_fk = '';
    $activities = $forsa_data->activities;
    $volunteer_description = $forsa_data->volunteer_description;
    $volunteer_description_id_fk = $forsa_data->volunteer_description_id_fk;
} else {
    $type_forsa = 2;
}
?>
<?php $role = $_SESSION['role_id_fk'];
$emp_id = $_SESSION['emp_code']; ?>
<style>
    input.type_forsa {
        margin: 8px;
    }
    /*input.disabled-radio {
        pointer-events:none;
        opacity:0.5;
    }
    .disabledinput {
        opacity: 0.4;
        filter: alpha(opacity=40); !* For IE8 and earlier *!
    }*/
</style>
<!--------------------------------------------------------modal------------------------------------>
<div class="col-sm-12 no-padding ">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title; ?></h3>
        </div>
        <div class="panel-body">
            <?php
            if (isset($result) && !empty($result)){ ?>
            <form action="<?php echo base_url(); ?>human_resources/employee_forms/Volunteer_hours/edit_volunteer_hours/<?php echo $this->uri->segment(5); ?>"
                  method="post">
                <?php } else{ ?>
                <form action="<?php echo base_url(); ?>human_resources/employee_forms/Volunteer_hours/add_volunteer_hours"
                      method="post">
                    <?php } ?>
                    <div class="col-xs-12 no-padding">
                        <?php if (isset($_POST['from_profile']) && (!empty($_POST['from_profile']))) { ?>
                            <input type="hidden" name="from_profile" value="1"/>
                        <?php } ?>
                        <input type="hidden" id="emp_id_fk" name="emp_id_fk"
                               value="<?php if (!empty($emp_data->id)) {
                                   echo $emp_data->id;
                               } else {
                                   echo $emp_id_fk;
                               } ?> ">
                        <input type="hidden" id="edara_id_fk" name="edara_id_fk"
                               value="<?php if (!empty($emp_data->administration)) {
                                   echo $emp_data->administration;
                               } else {
                                   echo $edara_id_fk;
                               } ?>  ">
                        <input type="hidden" id="qsm_id_fk" name="qsm_id_fk"
                               value="<?php if (!empty($emp_data->department)) {
                                   echo $emp_data->department;
                               } else {
                                   echo $qsm_id_fk;
                               } ?>  ">
                        <input type="hidden" id="direct_manager_id_fk" name="direct_manager_id_fk"
                               value="<?php if (!empty($emp_data->manger)) {
                                   echo $emp_data->manger;
                               } else {
                                   echo $direct_manager_id_fk;
                               } ?>  ">
                        <div class="form-group col-md-3 col-sm-6 col-xs-6 padding-4">
                            <label class="label"> احتساب من </label>
                            <div class="radio-content_1" style="display: flex; margin-left: 5px">
                                <input type="radio" id="type_forsa1" name="type_forsa" <?php if ($type_forsa == 1) {
                                    echo 'checked  ';
                                    $class = '';
                                } else {
                                    $class = 'disabled-radio  disabledinput';
                                    echo  ' disabled';
                                } ?> class="type_forsa <?= $class ?>" value="1">
                                <label for="type_forsa1" class="radio-label"> فرصة معلنة </label>
                                <!-- </div>
                                 <div class="radio-content_1">-->
                                <input type="radio" id="type_forsa2" name="type_forsa" <?php if ($type_forsa == 2) {
                                    echo 'checked  ';
                                    $class = '';
                                } else {
                                    echo  ' disabled';
                                    $class = 'disabled-radio  disabledinput';
                                } ?> class="type_forsa <?= $class ?>" value="2">
                                <label for="type_forsa2" class="radio-label">فرصة غير معلنة </label>
                            </div>
                        </div>
                        <div class="form-group col-md-4 col-sm-6 col-xs-6 padding-4">
                            <label class="label ">اسم الموظف</label>
                            <input data-validation="required" name="" id="emp_name" class="form-control"
                                   style="width:84%; float: right;"
                                   readonly
                                   value="<?php if (!empty($emp_data->employee)) {
                                       echo $emp_data->employee;
                                   } else {
                                       echo $emp_name;
                                   } ?>">
                            <button type="button" data-toggle="modal" data-target="#myModal_emps"
                                    class="btn btn-success btn-next" style="float: right;"
                                    onclick="GetDiv_emps('myDiv_emp')" <?php if (!empty($emp_data->employee)) {
                                echo 'disabled';
                            } ?>>
                                <i class="fa fa-plus"></i></button>
                        </div>
                        <div class="form-group col-md-2 col-sm-6 col-xs-6 padding-4">
                            <label class="label "> الرقم الوظيفي</label>
                            <input data-validation="required" name="emp_code_fk" id="emp_code" class="form-control"
                                   value="<?php if (!empty($emp_data->emp_code)) {
                                       echo $emp_data->emp_code;
                                   } else {
                                       echo $emp_code;
                                   } ?>" readonly>
                        </div>
                        <div class="form-group col-md-3 col-sm-6 col-xs-6 padding-4">
                            <label class="label "> المسمى الوظيفي</label>
                            <input data-validation="required" name="job_title" id="job_title" class="form-control"
                                   value="<?php if (!empty($emp_data->mosma_wazefy_n)) {
                                       echo $emp_data->mosma_wazefy_n;
                                   } else {
                                       echo $job_title;
                                   } ?>"
                                   readonly>
                        </div>
                        <div class="form-group col-md-3 col-sm-6 col-xs-6 padding-4">
                            <label class="label "> الأدارة </label>
                            <input data-validation="required" name="edara_n" id="edara_n" class="form-control"
                                   value="<?php if (!empty($emp_data->edara_n)) {
                                       echo $emp_data->edara_n;
                                   } else {
                                       echo $edara_n;
                                   } ?>" readonly>
                        </div>
                        <div class="form-group col-md-2 col-sm-6 col-xs-6 padding-4">
                            <label class="label "> القسم</label>
                            <input name="qsm_n" id="qsm_n" class="form-control"
                                   value="<?php if (!empty($emp_data->qsm_n)) {
                                       echo $emp_data->qsm_n;
                                   } else {
                                       echo $qsm_n;
                                   } ?>" readonly>
                        </div>
                        <div class="modal fade" id="myModal_emps" tabindex="-1" role="dialog"
                             aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document" style="width: 80%">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" onclick="$('#myModal_emps').modal('hide')"
                                                aria-label="Close"><span
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
                        <div class="form-group col-md-2 col-sm-6 col-xs-6 padding-4">
                            <label class="label "> رقم الهويه</label>
                            <input name="card_num" id="card_num" class="form-control"
                                   value="<?php if (!empty($emp_data->card_num)) {
                                       echo $emp_data->card_num;
                                   } else {
                                       echo $card_num;
                                   } ?>" readonly>
                        </div>
                        <div class="form-group col-md-2 col-sm-6 col-xs-6 padding-4">
                            <label class="label ">المستفيد من خدمة التطوع </label>
                            <?php $mostafed_type_arr = array(0 => 'داخلى', 1 => 'خارجى'); ?>
                            <?php for ($a = 0; $a < sizeof($mostafed_type_arr); $a++) { ?>
                                <div class="radio-content">
                                    <input type="radio" id="mostafed_type_fk<?php echo $a; ?>" name="mostafed_type_fk"
                                           onclick="GetMostafed_type(<?php echo $a; ?>)" value="<?php echo $a; ?>"
                                        <?php if ($mostafed_type_fk == $a) { ?>  checked <?php } ?>
                                    >
                                    <label class="radio-label"
                                           for="mostafed_type_fk<?php echo $a; ?>"><?php echo $mostafed_type_arr[$a]; ?></label>
                                </div>
                            <?php } ?>
                        </div>
                        <div id="edara_direction">
                            <div class="col-md-3  managment-div-select form-group padding-4">
                                <label class="label ">الجهة/الإدارة</label>
                                <?php if ($mostafed_type_fk == 0) { ?>
                                    <select name="mostafed_edara_id" id="mostafed_edara_id"
                                            onchange="get_responsible();"
                                            class="form-control  selectpicker"
                                            data-show-subtext="true" data-live-search="true"
                                            data-validation="required" aria-required="true">
                                        <option value="">إختر</option>
                                        <?php
                                        if (!empty($admin)):
                                            foreach ($admin as $record):
                                                $select = '';
                                                if ($mostafed_edara_id == $record->id) {
                                                    $select = 'selected';
                                                } ?>
                                                <option
                                                        value="<?php echo $record->id; ?>" <?= $select ?>>
                                                    <?php echo $record->title; ?></option>
                                            <?php
                                            endforeach;
                                        endif;
                                        ?>
                                    </select>
                                <?php } elseif ($mostafed_type_fk == 1) { ?>
                                    <select name="mostafed_direction_id" id="destination"
                                            class="form-control  selectpicker"
                                            data-show-subtext="true" data-live-search="true"
                                            data-validation="required" aria-required="true">
                                        <option value="">إختر</option>
                                        <?php
                                        if (!empty($ghat)):
                                            foreach ($ghat as $record):
                                                $select = '';
                                                if ($mostafed_direction_id == $record->id_setting) {
                                                    $select = 'selected';
                                                }
                                                ?>
                                                <option
                                                        value="<? echo $record->id_setting; ?>" <?= $select ?>>
                                                    <? echo $record->title_setting; ?></option>
                                            <?php
                                            endforeach;
                                        endif;
                                        ?>
                                    </select>
                                    <button type="button" id="button_append" class="btn btn-info btn-sm"
                                            title="إضافة جهه أخرى" data-toggle="modal" data-target="#myModal"><i
                                                class="fa fa-plus"></i></button>
                                    <!------------------------------------------------------------------------------------------------------------>
                                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
                                         aria-labelledby="myModalLabel">
                                        <div class="modal-dialog " role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close"
                                                            onclick="$('#myModal').modal('hide')"
                                                            aria-label="Close"><span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h4 class="modal-title" id="myModalLabel">اضافه جهه انتداب</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="col-md-12">
                                                        <div class="col-xs-7 col-xs-offset-2">
                                                            <div class="form-group">
                                                                <h6>اسم الجهه:<span class=""></span></h6>
                                                                <input type="text" id="destin" name="dest"
                                                                       class="form-control"
                                                                       style="width: 80%;float: right">
                                                                <button type="button" id="save"
                                                                        onclick="add_option($('#destin').val());$('#myModal').modal('hide')"
                                                                        class="btn btn-danger" style="float: left">حفظ
                                                                </button>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                            <br>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer" style="display: inline-block;width:100%;">
                                                    <button type="button" class="btn btn-default" style="float: left"
                                                            onclick="$('#myModal').modal('hide')">إغلاق
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!------------------------------------------------------------------------------------------------------------------------------>
                                <?php } ?>
                            </div>
                            <div class="col-md-3 form-group padding-4">
                                <label class="label ">المسئول </label>
                                <?php if ($mostafed_type_fk == 0) { ?>
                                    <select  id="responsible_load"
                                            class="form-control  "
                                            onchange="$('#responsible').val($('option:selected',this).text());get_ms2ol_data()"
                                            data-validation="required" aria-required="true">
                                        <option value="">إختر</option>
                                        <?php
                                        if (!empty($responsibles)):
                                            foreach ($responsibles as $record):
                                                $select = '';
                                                if ($responsible_id == $record->id) {
                                                    $select = 'selected';
                                                } ?>
                                                <option
                                                        value="<?php echo $record->id; ?>" <?= $select ?>>
                                                    <?php echo $record->employee; ?></option>
                                            <?php
                                            endforeach;
                                        endif;
                                        ?>
                                    </select>
                                    <input type="hidden" name="responsible" id="responsible" value="<?= $responsible ?>">
                                <?php } else { ?>
                                    <input type="text" id="responsible" name="responsible" value="<?= $responsible ?>"
                                           data-validation="required" class="form-control">
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-3 form-group padding-4">
                            <label class="label ">الوظيفة </label>
                            <input type="text" id="job" name="job" value="<?= $job ?>"
                                   readonly class="form-control">
                        </div>
                        <div class="col-md-2 form-group padding-4">
                            <label class="label ">الهاتف<span class="valu"
                                                              style="background-color: #fff;color: #ff0000;padding: 0 6px;border-radius: 7px;">  ( 10 ارقام فقط)</span></label>
                            <input type="text" id="tele" name="tele" maxlength="10" onkeyup="check_len($(this).val());"
                                   readonly value="<?= $tele ?>" onkeypress="validate_number(event)"
                                   class="form-control">
                        </div>
                        <div class="col-md-2 form-group padding-4">
                            <label class="label ">الجوال <span class="valu"
                                                               style="background-color: #fff;color: #ff0000;padding: 0 6px;border-radius: 7px;"
                                >  ( 10 ارقام فقط)</span></label>
                            <input type="text" id="mob" name="mob" maxlength="10" onkeyup="check_len($(this).val());"
                                   readonly value="<?= $mob ?>" onkeypress="validate_number(event)"
                                   class="form-control">
                        </div>
                        <div class="col-md-2 form-group padding-4">
                            <label class="label ">البريد الألكتروني </label>
                            <input type="email" id="email" name="email" readonly value="<?= $email ?>"
                                   class="form-control">
                        </div>
                        <div class="col-md-3 col-sm-6 padding-4 ">
                            <label class=" label kafel"> طبيعة العمل التطوعي </label>
                            <input type="hidden" id="type_setting" data-id="" data-title="" data-title_fk=""
                                   data-title_n="" data-fe2a_type="">
                            <input type="text" class="form-control  "
                                   name="volunteer_description" id="volunteer_description"
                                   readonly="readonly"
                                   onclick="change_type_setting(1102,'طبيعة العمل التطوعي ','volunteer_description_id_fk','volunteer_description');load_settigs();"
                                   style="cursor:pointer;border: white;color: black;width:100%;float: right;"
                                   data-validation="required"
                                   value="<?= $volunteer_description ?>">
                            <input type="hidden" name="volunteer_description_id_fk" id="volunteer_description_id_fk"
                                   value="
						<?= $volunteer_description_id_fk ?>">
                            <button type="button"
                                    onclick="change_type_setting(1102,'طبيعة العمل التطوعي ','volunteer_description_id_fk','volunteer_description');load_settigs();"
                                    class="btn btn-success btn-next">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                        <!-- yara_starttt -->
                        <div class="col-md-2 form-group padding-4">
                            <label class="label ">التاريخ </label>
                            <input type="date" class="form-control" value="<?= $volunteer_date ?>"
                                   name="volunteer_date" id="volunteer_date" data-validation="required">
                        </div>
                        <div class="col-md-2 form-group padding-4">
                            <label class="label ">من الساعة </label>
                            <input type="time" class="form-control" data-validation="required"
                                   name="from_time" id="from_time"
                                   onchange="get_time();"
                                   value="<?= $from_time ?>">
                        </div>
                        <div class="col-md-2 form-group padding-4">
                            <label class="label ">إلى الساعة </label>
                            <input type="time" data-validation="required" name="to_time" id="to_time"
                                   class="form-control"
                                   onchange="get_time();"
                                   value="<?= $to_time ?>">
                        </div>
                        <div class="col-md-2 form-group padding-4">
                            <label class="label ">المدة </label>
                            <input type="text" class="form-control" value="<?= $num_hours ?>"
                                   name="num_hours" id="num_hours" readonly>
                        </div>
                        <div class="col-md-3 col-sm-6 padding-4 ">
                            <label class=" label kafel"> المكان </label>
                            <input type="hidden" id="type_setting" data-id="" data-title="" data-title_fk=""
                                   data-title_n="" data-fe2a_type="">
                            <input type="text" class="form-control  "
                                   name="place" id="place"
                                   readonly="readonly"
                                   onclick="change_type_setting(1103,'المكان ','place_id_fk','place');load_settigs();"
                                   style="cursor:pointer;border: white;color: black;width:80%;float: right;"
                                   data-validation="required"
                                   value="<?= $place ?>">
                            <input type="hidden" name="place_id_fk" id="place_id_fk" value="
						<?= $place_id_fk ?>">
                            <button type="button"
                                    onclick="change_type_setting(1103,'المكان ','place_id_fk','place');load_settigs();"
                                    class="btn btn-success btn-next">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                        <div class="form-group col-sm-12 col-xs-12">
                            <label class="label ">النشاط/البرنامج/الفعاليات </label>
                            <textarea data-validation="required" name="activities"
                                      class="editor2" id="editor2"
                            ><?= $place ?></textarea>
                        </div>
                        <div class="col-xs-12 text-center" style="margin-top: 0px">
                            <input type="hidden" name="add" value="add">
                            <button type="submit"
                                    class="btn btn-labeled btn-success " id="save" name="add" value="حفظ"
                                    style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                                <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                            </button>
                            <span style="color: red" id="span_id"></span><br>
                        </div>
                </form>
        </div>
    </div>
</div>
<?php
if (isset($records) && !empty($records)) {
    ?>
    <div class="col-sm-12 no-padding ">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"> ساعات التطوع</h3>
            </div>
            <div class="panel-body">
                <!-----------------------------------------table------------------------------------->
                <table id="user_data" class=" display table table-bordered   responsive nowrap" cellspacing="0"
                       width="100%">
                    <thead>
                    <tr class="greentd visible-md visible-lg">
                        <th>مسلسل</th>
                        <th>الرقم الوظيفي</th>
                        <th>إسم الموظف</th>
                        <th>نوع المستفيد</th>
                        <th>الجهة/الإدارة</th>
                        <th> الاجراء</th>
                    </tr>
                    </thead>
                </table>
                <!--------------------------------------------table---------------------------------->
            </div>
        </div>
    </div>
<?php } ?>
<!-- details_Modal -->
<div class="modal fade" id="details_Modal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onclick="$('#details_Modal').modal('hide')" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="text-align: center;">التفاصيل </h4>
            </div>
            <div class="modal-body" id="result_page">
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <button
                        type="button" onclick="Print_details(document.getElementById('volunter_id').value)"
                        class="btn btn-labeled btn-purple ">
                    <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعة
                </button>
                <button type="button" class="btn btn-labeled btn-danger " onclick="$('#details_Modal').modal('hide')">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<?php
if (isset($_POST['from_profile']) && (!empty($_POST['from_profile']))) { ?>
    <script src="<?php echo base_url() ?>asisst/admin_asset/js/jquery.form-validator.js"></script>
    <script>
        $('#example').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'pageLength',
                'copy',
                'csv',
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
            colReorder: true
        });
    </script>
<?php } ?>
<script>
    //10-7-om
    document.addEventListener('DOMContentLoaded', function () {
        var roles =<?php echo $role;?>;
        var emp_id =<?php echo $emp_id;?>;
        <?php if (!empty($emp_id_fk)){?>
        var emp_id_fk =<?php echo $emp_id_fk;?>;
        <?php }else{
        ?>
        var emp_id_fk = '';
        <?php
        }?>
        if (roles == 3) {
            get_emp_data(emp_id);
            $("#emp_id_fk").attr('readonly', true);
        } else {
            $("#emp_id_fk").attr('readonly', false);
        }
        if (emp_id_fk) {
            get_emp_data(emp_id_fk);
        }

        <?php if (!empty($mostafed_edara_id)){ ?>
        get_responsible();
        <?php } ?>
    });
</script>
<script>
    function GetMostafed_type(valu) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/Volunteer_hours_ajax/GetMostafed_type",
            data: {valu: valu},
            success: function (d) {
                $('#edara_direction').html(d);
                if (valu == 1) {
                    $('#job').val('');
                    $('#tele').val('');
                    $('#mob').val('');
                    $('#email').val('');
                    document.getElementById("job").removeAttribute("readonly", "readonly");
                    document.getElementById("mob").removeAttribute("readonly", "readonly");
                    document.getElementById("tele").removeAttribute("readonly", "readonly");
                    document.getElementById("email").removeAttribute("readonly", "readonly");
                } else {
                    document.getElementById("job").setAttribute("readonly", "readonly");
                    document.getElementById("mob").setAttribute("readonly", "readonly");
                    document.getElementById("tele").setAttribute("readonly", "readonly");
                    document.getElementById("email").setAttribute("readonly", "readonly");
                }
            }
        });
    }
</script>
<script>
    function get_emp_data(valu) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/Volunteer_hours_ajax/get_emp_data",
            data: {valu: valu},
            success: function (d) {
                var obj = JSON.parse(d);
                $('#job_title_id_fk').val(obj.degree_id);
                $('#national_id').val(obj.card_num);
                $('#employ_code').val(obj.emp_code);
                $('#emp_id').val(obj.id);
                $('#administration').val(obj.administration);
                $('#department').val(obj.department);
                $("#job_title").attr('disabled', true);
                $('#edara_name').val(obj.administration);
                $('#edara_name_hidden').val(obj.administration);
                $("#edara_name").attr('disabled', true);
                $('#qsm_name').val(obj.department);
                $('#qsm_name_hidden').val(obj.department);
                $("#qsm_name").attr('disabled', true);
            }
        });
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/Volunteer_hours_ajax/get_load_page",
            data: {valu: valu},
            success: function (d) {
                $('#load3').html(d);
            }
        });
    }
</script>
<script>
    function count(mydate) {
        var from_time = $("#from_time").val();
        var to_time = $("#to_time").val();
        myfrom_time = mydate + ' ' + from_time;
        myto_time = mydate + ' ' + to_time;
        var dataString = 'from_time=' + myfrom_time + '&to_time=' + myto_time;
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/Volunteer_hours_ajax/GetNum_hours",
            data: dataString,
            cache: false,
            success: function (json_data) {
                var JSONObject = JSON.parse(json_data);
                console.log(JSONObject);
                $('#num_hours').val(JSONObject['hours'] + ':' + JSONObject['minutes']);
            }
        });
    }
</script>
<script>
    function check_len(length) {
        var len = length.length;
        if (len < 10) {
            document.getElementById("buttons").setAttribute("disabled", "disabled");
        }
        if (len > 10) {
            document.getElementById("buttons").setAttribute("disabled", "disabled");
        }
        if (len == 10) {
            document.getElementById("buttons").removeAttribute("disabled", "disabled");
        }
    }
</script>
<!--10-7-om-->
<script>
    <?php if ($mostafed_type_fk == 1) { ?>
    function add_option(valu) {
        var id = '<?php echo $last_id + 1;?>';
        var x = $('#destination').val();
        $('#destination').append('<option value=' + id + ' selected>' + valu + '</option>');
        $('.selectpicker').selectpicker('refresh');
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/Volunteer_hours_ajax/add_option",
            data: {valu: valu},
            success: function (d) {
                document.getElementById("button_append").setAttribute("disabled", "disabled");
            }
        });
    }
    <?php }?>
</script>
<script>
    function GetDiv_emps(div) {
        html = '<div class="col-md-12"><table id="js_table_members2" class="table table-striped table-bordered dt-responsive nowrap "   >' +
            '<thead><tr><th style="width: 50px;">#</th><th style="width: 50px;"> كود الموظف  </th><th style="width: 50px;"> أسم الموظف  </th>' +
            '<th style="width: 170px;" >الأدارة   </th>' +
            '<th style="width: 170px;" >القسم</th>' +
            '</tr></thead><table><div id="dataMember"></div></div>';
        $("#" + div).html(html);
        $('#js_table_members2').show();
        var oTable_usergroup = $('#js_table_members2').DataTable({
            dom: 'Bfrtip',
            "ajax": '<?php echo base_url(); ?>human_resources/employee_forms/Volunteer_hours_ajax/getConnection_emp/',
            aoColumns: [
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
            destroy: true,
            "order": [[1, "asc"]]
        });
    }
    function Get_emp_Name(obj) {
        console.log(' obj :' + obj.dataset.name + ': ');
        var name = obj.dataset.name;
        var emp_code = obj.dataset.emp_code;
        var edara_id = obj.dataset.edara_id;
        var edara_n = obj.dataset.edara_n;
        var job_title = obj.dataset.job_title;
        var qsm_id = obj.dataset.qsm_id;
        var qsm_n = obj.dataset.qsm_n;
        var adress = obj.dataset.adress;
        var emp_phone = obj.dataset.phone;
        var card_num = obj.dataset.card_num;
        var manger = obj.dataset.manger;

        document.getElementById('direct_manager_id_fk').value = manger;

        document.getElementById('emp_name').value = name;
        document.getElementById('emp_id_fk').value = obj.value;
        document.getElementById('emp_code').value = emp_code;
        document.getElementById('edara_n').value = edara_n;
        document.getElementById('edara_id_fk').value = edara_id;
        document.getElementById('job_title').value = job_title;
        document.getElementById('qsm_n').value = qsm_n;
        document.getElementById('qsm_id_fk').value = qsm_id;
        document.getElementById('card_num').value = card_num;
        $("#myModal_emps .close").click();
    }
</script>
<script>
    function load_page(row_id) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/Volunteer_hours_ajax/load_details",
            data: {row_id: row_id},
            success: function (d) {
                $('#result_page').html(d);
            }
        });
    }
</script>
<script>
    function Print_details(row_id) {
        var request = $.ajax({
            url: "<?=base_url() . 'human_resources/employee_forms/Volunteer_hours_ajax/Print_details'?>",
            type: "POST",
            data: {row_id: row_id},
        });
        request.done(function (msg) {
            var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(msg);
            WinPrint.document.close();
            WinPrint.focus();
            /*  WinPrint.print();
              WinPrint.close();*/
        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });
    }
</script>
<!-- get_responsible -->
<script>
    function get_responsible() {
        var row_id = $('#mostafed_edara_id').val();
        console.log(row_id);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/Volunteer_hours_ajax/load_responsible",
            data: {row_id: row_id},
            success: function (d) {
                $('#responsible_load').html(d);

                <?php if (!empty($responsible_id)){ ?>
                $('#responsible_load').val('<?=$responsible_id?>');
                // get_ms2ol_data();
                <?php } ?>
            }
        });
    }
</script>
<!-- get_ms2ol_data -->
<script>
    function get_ms2ol_data() {
        var id = $('#responsible_load').val();
        $.ajax({
            url: "<?php echo base_url() ?>human_resources/employee_forms/Volunteer_hours_ajax/get_ms2ol_data",
            type: "Post",
            dataType: "html",
            data: {id: id},
            success: function (data) {
                var obj = JSON.parse(data);
                //console.log(obj);
                console.log(obj.mosma_wazefy_n);
                console.log(obj.phone);
                console.log(obj.another_phone);
                console.log(obj.email);
                $('#job').val(obj.mosma_wazefy_n);
                $('#tele').val(obj.another_phone);
                $('#mob').val(obj.phone);
                $('#email').val(obj.email);
            }
        });
    }
</script>
<script src="<?php echo base_url() ?>asisst/admin_asset/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/ckeditor/samples/js/sample.js"></script>
<script>
    initSample();
    CKEDITOR.replaceClass = 'ckeditor';
</script>
<script type="text/javascript">
    CKEDITOR.replace('editor2');
    CKEDITOR.add;
    CKEDITOR.config.toolbar = [
        ['Styles', 'Format', 'Font', 'FontSize'],
        '/',
        ['NumberedList', 'BulletedList', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
        ['Image', 'Table', '-', 'Link', 'Flash', 'Smiley', 'TextColor', 'BGColor', 'Source']
    ];
</script>
<!-- yara -->
<!-- settingModal  -->
<div class="modal fade" id="settingModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title title_setting "></h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid" id="">
                    <div class="col-sm-12 form-group">
                        <div class="col-sm-12 form-group">
                            <div class="col-sm-3  col-md-3 padding-4 ">
                                <button type="button" class="btn btn-labeled btn-success "
                                        onclick="$('#add_input').show(); "
                                        style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                                    <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>إضافة
                                </button>
                            </div>
                        </div>
                        <div class="col-sm-12 no-padding form-group">
                            <div id="add_input" style="display: none">
                                <div class="col-sm-3  col-md-5 padding-2 ">
                                    <label class="label title_setting  "> </label>
                                    <input type="text" onfocus="$('.add_title').hide();" name="name" id="add_title"
                                           value=""
                                           class="form-control">
                                    <input type="hidden" name="row_setting_id" id="row_setting_id" value="">
                                    <span class="add_title" style="color: red; display: none;">هذا الحقل مطلوب</span>
                                </div>
                                <div class="col-sm-3  col-md-2 padding-4" id="div_add">
                                    <button type="button"
                                            onclick="add_setting($('#add_title').val(),'add_title','output'); "
                                            style="    margin-top: 27px;"
                                            class="btn btn-labeled btn-success" name="save" value="save">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                    </button>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                    </div>
                    <div id="setting_output">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<!-- settingModal  -->
<script>
    function change_type_setting(id, title, title_fk, title_n) {
        $('.title_setting').text(title);
        $('#type_setting').data('id', id);
        $('#type_setting').data('title', title);
        $('#type_setting').data('title_fk', title_fk);
        $('#type_setting').data('title_n', title_n);
    }
</script>
<script>
    function add_setting(value, title, div) {
        var type = $('#type_setting').data("id");
        var type_name = $('#type_setting').data("title");
        var row_id = $('#row_setting_id').val();
        if (value != 0 && value != '') {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url()?>human_resources/employee_forms/Volunteer_hours_ajax/add_setting',
                data: {value: value, type: type, type_name: type_name, row_id: row_id},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $('#' + title).val(' ');
                    $('#row_setting_id').val('');
                    $('#setting_output').html(html);
                    load_settigs();
                }
            });
        } else {
            swal({
                title: 'من فضلك تأكد من الحقول الناقصه !',
                type: 'warning',
                confirmButtonText: 'تم'
            });
        }
    }
</script>
<script>
    function load_settigs() {
        var type = $('#type_setting').data("id");
        var type_name = $('#type_setting').data("title");
        $('#settingModal').modal('show');
        $.ajax({
            type: 'post',
            url: '<?php echo base_url()?>human_resources/employee_forms/Volunteer_hours_ajax/load_settigs',
            data: {type: type, type_name: type_name},
            dataType: 'html',
            cache: false,
            beforeSend: function () {
                $('#setting_output').html(
                    '<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>'
                );
            },
            success: function (html) {
                $('#setting_output').html(html);
            }
        });
    }
</script>
<script>
    function GetName(id, name) {
        var title_fk = $('#type_setting').data("title_fk");
        var title_n = $('#type_setting').data("title_n");
        /// id title function
        $('#' + title_fk).val(id);
        $('#' + title_n).val(name);
        $('#settingModal').modal('hide');
    }
</script>
<!-- yara25-10-2020 -->
<script>
    function get_time() {
        var start = $('#from_time').val();
        var end = $('#to_time').val();
        //  alert(start);
        //  return;
        if (start != '' && end != '') {
            s = start.split(':');
            e = end.split(':');
            var ss = s[s.length - 1].split(' ');
            var ee = e[e.length - 1].split(' ');
            if (ss[ss.length - 1] === 'PM') {
                if (parseInt(s[0]) === 12) {
                } else {
                    s[0] = parseInt(s[0]) + 12;
                }
            }
            if (ee[ee.length - 1] === 'PM') {
                if (parseInt(e[0]) === 12) {
                } else {
                    e[0] = parseInt(e[0]) + 12;
                }
            }
            min = parseInt(e[1]) - parseInt(s[1]);
            console.log('min :' + min + " e[1] :" + e[1] + " s[1] :" + s[1]);
            hour_carry = 0;
            if (min < 0) {
                min += 60;
                hour_carry += 1;
            }
            console.log('min :' + min);
            hour = e[0] - s[0] - hour_carry;
            diff = hour + "." + min;
            console.log('min :' + min + " hours :" + hour + " diff :" + diff);
            diff_munites = (diff * 60);
            $('#num_hours').val(diff_munites);
            if (diff_munites <= 0) {
                $('#num_hours').val(0);
                document.getElementById("save").disabled = true;
                document.getElementById("span_id").style.display = 'block';
                document.getElementById("span_id").innerText = 'من فضلك ادخل فترة زمنية صحيحة';
            } else {
                document.getElementById("save").disabled = false;
                document.getElementById("span_id").style.display = 'none';
            }
        }
    }
</script>
<script>
    var dataTable;
    document.addEventListener('DOMContentLoaded', function () {
        // $.noConflict();
        dataTable = $('#user_data').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                url: "<?php echo base_url() . 'human_resources/employee_forms/Volunteer_hours_ajax/fetch_all_data'; ?>",
                type: "POST"
            },
            "columnDefs": [
                {
                    "targets": [0, 5],
                    "orderable": false,
                },
            ],
        });
    });
</script>