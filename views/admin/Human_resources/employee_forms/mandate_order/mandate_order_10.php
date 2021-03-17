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
if (isset($row) && !empty($row)) {
    $id = $row->id;
    $emp_id_fk = $row->emp_id_fk;
    $edara_id_fk = $row->edara_id_fk;
    $qsm_id_fk = $row->qsm_id_fk;
    $job_title_id_fk = $row->job_title_id_fk;
    $mandate_type_fk = $row->mandate_type_fk;
    $mandate_direction = $row->mandate_direction;
    $mandate_distance = $row->mandate_distance;
    $from_date = $row->from_date;
    $to_date = $row->to_date;
    $num_days = $row->num_days;
    $bdal_count_method = $row->bdal_count_method;
    $bdal_value = $row->bdal_value;
    $bdal_total = $row->bdal_total;
    $date = $row->date;
    $mandate_purpose = $row->mandate_purpose;
    $times = $row->times;
    $emp_code = $row->emp_code;
    // $emp_code_fk = $item->emp_code_fk;
    $edara_id_fk = $row->edara_id_fk;
    //  $edara_n = $item->edara_n;
    $qsm_id_fk = $row->qsm_id_fk;
    // $qsm_n = $item->qsm_n;
    // $marad_name = $item->marad_name;
    $job_title = $row->job_title;
      //yara9-6-2020
      $mandate_id_fk=$row->mandate_id_fk;
      $mandate_name=$row->mandate_name;
      $geha_mandate_id_fk=$row->geha_mandate_id_fk;
      $geha_mandate_name=$row->geha_mandate_name;
    $action = base_url() . '/' . 'human_resources/employee_forms/Mandate_orders/edit_Mandate_order/' . $this->uri->segment(5);
} else {
    $emp_id_fk = '';
    $emp_name = '';
    $emp_code = '';
    $emp_id_fk = '';
    $qsm_id_fk = '';
    $edara_id_fk = '';
    $job_title_id_fk = '';
    $mandate_type_fk = '';
    $mandate_direction = '';
    $mandate_distance = '';
    $mandate_purpose = '';
    $from_date = '';
    $to_date = '';
    $num_days = '';
    $bdal_count_method = '';
    $bdal_value = '';
    $bdal_total = '';
    $id = '';
    $date = '';
    $times = '';
    $emp_code = '';
    $emp_id_fk = '';
    $emp_code_fk = '';
    $edara_id_fk = '';
    $edara_n = '';
    $qsm_id_fk = '';
    $qsm_n = '';
    $job_title = '';
    //yara9-6-2020
    $mandate_id_fk='';
    $mandate_name='';
    $geha_mandate_id_fk='';
    $geha_mandate_name='';
    $action = base_url() . '/' . 'human_resources/employee_forms/Mandate_orders';
}
?>
<div class="col-sm-12 no-padding ">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title; ?></h3>
        </div>
        <div class="panel-body">
            <form action="<?php echo $action; ?>" method="post">
                <?php if (isset($_POST['from_profile']) && (!empty($_POST['from_profile']))) { ?>
                    <input type="hidden" name="from_profile" value="1"/>
                <?php } ?>
                <input type="hidden" id="emp_id" name="emp_id_fk" value="<?php if (!empty($emp_data->id)) {
                    echo $emp_data->id;
                } else {
                    echo 0;
                } ?> ">
                <input type="hidden" id="administration" name="edara_id_fk"
                       value="<?php if (!empty($emp_data->administration)) {
                           echo $emp_data->administration;
                       } else {
                           echo 0;
                       } ?>  ">
                <input type="hidden" id="department" name="qsm_id_fk" value="<?php if (!empty($emp_data->department)) {
                    echo $emp_data->department;
                } else {
                    echo 0;
                } ?>  ">
                <input type="hidden" id="manger" name="direct_manager_id_fk"
                       value="<?php if (!empty($emp_data->manger)) {
                           echo $emp_data->manger;
                       } else {
                           echo 0;
                       } ?>  ">
                <div class="col-xs-12 no-padding">
                    <!--<div class="col-md-2 padding-4">
                        <label class="label ">رقم الطلب</label>
                        <input type="text" readonly value="<?php if (isset($last) && !empty($last)) {
                            echo $last->id + 1;
                        } else {
                            echo 1;
                        } ?>" data-validation="required" id="" name="order_id" class="form-control">
                    </div>-->
                    <div class="col-md-2 form-group padding-4">
                        <label class="label ">نوع الانتداب</label>
                        <?php $types = array(1 => 'داخلي', 2 => 'خارجي'); ?>
                        <select name="mandate_type_fk" id="employee_name"
                                data-validation="required" class="form-control bottom-input selectpicker"
                                data-show-subtext="true" data-live-search="true"
                                aria-required="true" onchange="get_emp_data($(this).val());">
                            <option value="">إختر نوع الانتداب</option>
                            <?php
                            if (isset($types) && !empty($types)) {
                                foreach ($types as $key => $value) {
                                    $select = '';
                                    if (!empty($mandate_type_fk == $key)) {
                                        $select = 'selected';
                                    }
                                    ?>
                                    <option value="<?php echo $key; ?>" <?php echo $select; ?> > <?php echo $value; ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-2 padding-4">
                        <label class="label "> التاريخ</label>
                        <input type="date" value="<?php echo date("Y-m-d"); ?>" data-validation="required" id=""
                               name="date" class="form-control">
                    </div>
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
                    <div class="form-group col-md-3 col-sm-6 col-xs-6 padding-4">
                        <label class="label ">اسم الموظف</label>
                        <input data-validation="required" name="" id="emp_name" class="form-control"
                               style="width:84%; float: right;" readonly
                               value="<?php if (!empty($emp_data->employee)) {
                                   echo $emp_data->employee;
                               } else {
                                   echo $emp_name;
                               } ?>">
                        <button type="button" data-toggle="modal" data-target="#myModal_emps"
                                class="btn btn-success btn-next" style="float: right;"
                                onclick="GetDiv_emps('myDiv_emp')" <?php if (!empty($emp_data->employee)) {
                            echo 'disabled';
                        } ?>><i class="fa fa-plus"></i></button>
                    </div>
                    <div class="form-group col-md-2 col-sm-6 col-xs-6 padding-4">
                        <label class="label "> الرقم الوظيفي</label>
                        <input data-validation="required" name="emp_code_fk" id="emp_code" class="form-control"
                               value="<?php if (!empty($emp_data->emp_code)) {
                                   echo $emp_data->emp_code;
                               } else {
                                   echo $emp_code_fk;
                               } ?>" readonly>
                    </div>
                    <div class="form-group col-md-3 col-sm-6 col-xs-6 padding-4">
                        <label class="label "> المسمى الوظيفي</label>
                        <input data-validation="required" name="job_title" id="job_title" class="form-control"
                               value="<?php if (!empty($emp_data->job_title)) {
                                   echo $emp_data->job_title;
                               } else {
                                   echo $job_title;
                               } ?>" readonly>
                    </div>
                    <div class="form-group col-md-3 col-sm-6 col-xs-6 padding-4">
                        <label class="label "> الأدارة </label>
                        <input data-validation="required" name="edara_n" id="edara_n" class="form-control"
                               value="<?php if (!empty($emp_data->administration_name)) {
                                   echo $emp_data->administration_name;
                               } else {
                                   echo $edara_n;
                               } ?>" readonly>
                    </div>
                    <div class="form-group col-md-3 col-sm-6 col-xs-6 padding-4">
                        <label class="label "> القسم</label>
                        <input name="qsm_n" id="qsm_n" class="form-control"
                               value="<?php if (!empty($emp_data->departments_name)) {
                                   echo $emp_data->departments_name;
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
                        <label class="label "> عدد مرات انتداب الموظف:</label>
                        <input name="times" id="times" class="form-control"
                               value="<?php if (!empty($emp_data->times)) {
                                   echo $emp_data->times;
                               } else {
                                   echo $times;
                               } ?>" readonly>
                    </div>
                    <!-- <div class="col-xs-4">
                    <h6>عدد مرات انتداب الموظف:<span class="valu"></span></h6>
                    <input type="text" disabled  name="times" id="times" value="<?php echo $times; ?>"   data-validation="required" class="form-control">
                </div> -->
                    <!-- <div class="col-md-3 form-group  padding-4">
                        <label class="label "> جهه الانتداب</label>
                        <select name="mandate_direction" id="destination" style="width: 85%;float: right;"
                                onchange="return lood(this.value);"
                                aria-required="true" data-validation="required" class="form-control">
                            <option value="">إختر</option>
                            <?php
                            if (!empty($dest)):
                                foreach ($dest as $record):
                                    $select = '';
                                    if (!empty($mandate_direction == $record->title_setting)) {
                                        $select = 'selected';
                                    }
                                    ?>
                                    <option
                                            value="<?php echo $record->title_setting; ?>"<?php echo $select; ?> ><?php echo $record->title_setting; ?></option>
                                <?php
                                endforeach;
                            endif;
                            ?>
                        </select>
                        <button type="button" class="btn btn-success but2" style="float: right;" title="إضافة جهه أخرى"
                                data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i></button>
                    </div> -->
                    <div class="form-group padding-3 col-md-4 col-xs-12">
                    <label class="label ">       جهه الانتداب</label>
                    <input type="text" class="form-control  testButton inputclass"
                           name="geha_mandate_name" id="geha_mandate_name" data-validation="required"
                           readonly="readonly"
                           onclick="$('#gehatModal').modal('show'); get_details_geha_type();"
                           style="cursor:pointer;border: white;color: black;width: 89%;float: right;"
                           value="<?= $geha_mandate_name?>">
                    <input type="hidden" name="geha_mandate_id_fk" id="geha_mandate_id_fk" value="<?= $geha_mandate_id_fk?>">
                    <button type="button"
                            onclick="$('#gehatModal').modal('show');get_details_geha_type();"
                            class="btn btn-success btn-next" >
                        <i class="fa fa-plus"></i></button>
                </div>
          <div class="form-group padding-4 col-md-3 col-xs-12">
                    <label class="label"> اسم المسئول  </label>
                    <input type="text" name="mandate_name" id="mandate_name" value="<?php echo $mandate_name ?>"
                           class="form-control testButton inputclass" 
                           style="cursor:pointer; width:84%;float: right;" autocomplete="off" 
                           ondblclick="$(this).attr('readonly','readonly'); $('#Modal_geha_morsel').modal('show');get_details_geha_mandate();"
                           onblur="$(this).attr('readonly','readonly')"
                           onkeypress="return isNumberKey(event);"
                           readonly>
                           <input type="hidden" name="mandate_id_fk" id="mandate_id_fk" 
                           value="<?php echo $mandate_id_fk;?>" class="form-control "
                           data-validation-has-keyup-event="true" readonly>
                    <button type="button"
                    onclick="get_details_geha_mandate()" data-toggle="modal" data-target="#Modal_geha_morsel" 
                            class="btn btn-success btn-next">
                        <i class="fa fa-plus"></i></button>
                </div>
                    <div class="col-md-2 form-group  padding-4">
                        <label class="label ">المسافه (كيلو متر):</label>
                        <input type="text" value="<?php echo $mandate_distance; ?> " data-validation="required"
                        onchange="get_type();"   onkeypress="validate_number()" class="form-control"  id="mandate_distance" name="mandate_distance">
                    </div>
                    <div class="col-md-4 form-group  padding-4">
                        <label class="label ">الغرض من الإنتداب</label>
                        <input class="form-control" data-validation="required" name="mandate_purpose"
                               value="<?php echo $mandate_purpose; ?>">
                    </div>
                    <div class="col-md-2 form-group  padding-4">
                        <label class="label ">فترة الإنتداب من تاريخ </label>
                        <input type="date" value="<?php echo date("Y-m-d"); ?>" data-validation="required"
                               id="from_date" onchange="get_peroid();" name="from_date" class="form-control">
                    </div>
                    <div class="col-md-2 form-group  padding-4">
                        <label class="label ">فترة الإنتداب الي تاريخ </label>
                        <input type="date" value="<?php echo date("Y-m-d", strtotime('tomorrow')); ?>"
                               data-validation="required" id="to_date" onchange="get_peroid();" name="to_date"
                               class="form-control">
                    </div>
                    <div class="col-md-2 form-group  padding-4">
                        <label class="label ">مدة الإنتداب بالأيام </label>
                        <input data-validation="required" type="text" value="<?php echo $num_days; ?>"
                               readonly="readonly" id="num_days" name="num_days" class="form-control">
                    </div>
                    <?php
                    $arr_badl = array(1 => 'جزئي', 2 => 'كلي');
                    ?>
                    <div class="col-md-3 form-group  padding-4">
                        <label class="label ">بدل الإنتداب<span class="valu"> </span></label>
                        <select name="bdal_count_method" id="bdal_count_method"
                                data-validation="required" class="form-control bottom-input selectpicker"
                                data-show-subtext="true" data-live-search="true"
                                aria-required="true" onchange="get_badl_value($(this).val());">
                            <option value="">إختر نوع البدل</option>
                            <?php
                            if (isset($arr_badl) && !empty($arr_badl)) {
                                foreach ($arr_badl as $key => $value) {
                                    if (!empty($bdal_count_method == $key . '-' . $key * 100)) {
                                        $select = 'selected';
                                    }
                                    ?>
                                    <option value="<?php echo $key; ?>-<?php echo $key * 100; ?>"<?php echo $select; ?> > <?php echo $value; ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-3 form-group  padding-4">
                        <label class="label ">قيمه البدل</label>
                        <input type="text" readonly value="<?php echo $bdal_value; ?>" data-validation="required"
                               id="pay_count" name="bdal_value" class="form-control">
                    </div>
                    <div class="col-md-1 form-group  padding-4">
                        <label class="label ">إجمالي </label>
                        <input type="text" value="<?php echo $bdal_total; ?>" data-validation="required" readonly
                               id="total" name="bdal_total" class="form-control">
                    </div>
                </div>
                <div class="col-xs-12 text-center" style="margin-top: 15px">
                    <input type="hidden" name="add" value="add">
                    <button type="submit"
                            class="btn btn-labeled btn-success " id="buttons" name="add" value="حفظ"
                            style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                    </button>
                    <button type="button" class="btn btn-labeled btn-danger ">
                        <span class="btn-label"><i class="glyphicon glyphicon-trash"></i></span>حذف
                    </button>
                    <button type="button" class="btn btn-labeled btn-purple ">
                        <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعة
                    </button>
                    <button type="button" class="btn btn-labeled btn-inverse " id="attach_button"
                            data-target="#myModal_search" data-toggle="modal">
                        <span class="btn-label"><i class="fa fa-search-plus"></i></span>بحث
                    </button>
                </div>
                <!-- <input type="submit" name="add" value="حفظ"> -->
            </form>
        </div>
    </div>
</div>
<!------------------------------------------------------------------------------------------------------------------------->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onclick="$('#myModal').modal('hide')" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">اضافه جهه انتداب</h4>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="col-xs-7 col-xs-offset-2">
                        <div class="form-group">
                            <h6>اسم الجهه:<span class=""></span></h6>
                            <input type="text" id="destin" name="dest" class="form-control"
                                   style="width: 80%;float: right">
                            <button type="button" id="save" onclick="add_option($('#destin').val());$('#myModal').modal('hide')"
                                    class="btn btn-danger" style="float: left" >حفظ
                            </button>
                        </div>
                        <div class="clearfix"></div>
                        <br>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="display: inline-block;width:100%;">
                <button type="button" class="btn btn-default" style="float: left" onclick="$('#myModal').modal('hide')">إغلاق</button>
            </div>
        </div>
    </div>
</div>
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
                 اضافه جهه انتداب
                </button>
            </div>
        </div>
        <div class="col-sm-12 no-padding form-group">
            <div id="geha_input" style="display: none">
                <div class="col-sm-3  col-md-5 padding-2 ">
                    <label class="label   ">اضافه جهه انتداب </label>
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
    <div id="myDiv_gehat"><br><br>
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
<div class="modal fade" id="Modal_geha_morsel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title ">   مسؤولين الجهه   </h4>
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
                                    اضافه مسؤول
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
                        <br>
                        <br>
                    </div>
                    <div class="col-sm-12" id="myDiv_gehaa">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">اغلاق</button>
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
                                    <button type="button"   style="    margin-top: 27px;"
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
<!------------------------------------------------------------------------------------------------------------------------------>
<?php
if (isset($records) && !empty($records)) {
    ?>
    <?php
    if (isset($records) && !empty($records)) {
        ?>
        <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
            <thead>
            <tr class="greentd visible-md visible-lg">
                <th>م</th>
                <th> رقم الطلب</th>
                <th>اسم الموظف</th>
                <th>جهه الانتداب</th>
                <th> مسؤول الجهه</th>
                <th> عدد ايام الانتداب</th>
                <th>الاجراء</th>
                <th>حاله الطلب</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $x = 1;
            foreach ($records as $row) {
                if (isset($_POST['from_profile']) && (!empty($_POST['from_profile']))) {
                    $link_update = 'edit_Mandate_order(' . $row->id . ')';
                    $link_delete = 1;
                } else {
                    $link_update = 'window.location="' . base_url() . 'human_resources/employee_forms/Mandate_orders/edit_Mandate_order/' . $row->id . '";';
                    $link_delete = 0;
                }
                ?>
                <tr>
                    <td><?php echo $x; ?></td>
                    <td><?php echo $row->rkm_talab; ?></td>
                    <td><?php echo $row->name; ?></td>
                    <td><?php echo $row->geha_mandate_name; ?></td>
                    <td><?php echo $row->mandate_name; ?></td>
                    <td><?php echo $row->num_days; ?></td>
                    <td>
                        <a data-toggle="modal" data-target="#details_Modal" class="btn btn-xs btn-info"
                           style="padding:1px 5px;" onclick="load_page(<?= $row->id ?>);">
                            <i class="fa fa-list "></i> </a>
                        <a onclick='swal({
                                title: "هل انت متأكد من التعديل ؟",
                                text: "",
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonClass: "btn-warning",
                                confirmButtonText: "تعديل",
                                cancelButtonText: "إلغاء",
                                closeOnConfirm: true
                                },
                                function(){
                        <?= $link_update ?>
                                });'><i
                                    class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                        <a onclick='swal({
                                title: "هل انت متأكد من الحذف ؟",
                                text: "",
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonClass: "btn-danger",
                                confirmButtonText: "حذف",
                                cancelButtonText: "إلغاء",
                                closeOnConfirm: true
                                },
                                function(){
                                swal("تم الحذف!", "", "success");
                                window.location="<?= base_url() . 'human_resources/employee_forms/Mandate_orders/delete_mandate_order/' . $row->id . '/' . $link_delete ?>";
                                });'><i class="fa fa-trash"
                                        aria-hidden="true"></i> </a>
                    </td>
                    <?php
                    if($row->suspend == 0){
                        $halet_eltalab = 'جاري متابعة الطلب ';
                        $halet_eltalab_class = 'warning';
                    }elseif($row->suspend == 1){
                        $halet_eltalab = 'تم قبول الطلب من '.$row->talab_in_title;
                        $halet_eltalab_class = 'success';
                    }elseif($row->suspend == 2){
                        $halet_eltalab = 'تم رفض الطلب من '.$row->talab_in_title;
                        $halet_eltalab_class = 'danger';
                    }elseif($row->suspend == 4){
                        $halet_eltalab = 'تم اعتماد الطلب بالموافقة  من '.$row->talab_in_title;
                        $halet_eltalab_class = 'success';
                    }elseif($row->suspend == 5){
                        $halet_eltalab = 'تم اعتماد الطلب بالرفض من  '.$row->talab_in_title;
                        $halet_eltalab_class = 'danger';
                    }else{
                        $halet_eltalab = 'غير محدد ';
                        $halet_eltalab_class = 'danger';
                    }
                    ?>
                    <td>
                        <span class="label label-<?php echo $halet_eltalab_class; ?>" style="min-width: 140px;">
                        <?php echo $halet_eltalab; ?>
                        </span>
                    </td>
                </tr>
                <?php
                $x++;
            }
            ?>
            </tbody>
        </table>
        <?php
    }
    ?>
<?php } ?>
<!-- details_Modal -->
<div class="modal fade" id="details_Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 85%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onclick="$('#details_Modal').modal('hide')" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="text-align: center;">التفاصيل </h4>
            </div>
            <div class="modal-body" style="padding: 10px " id="result_page">
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%;">
                <button
                        type="button" onclick="print_order(document.getElementById('order_id').value)"
                        class="btn btn-labeled btn-purple">
                    <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعة
                </button>
                <button type="button" class="btn btn-labeled btn-danger " onclick="$('#details_Modal').modal('hide')">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<!-- details_Modal -->
<?php
if (isset($_POST['from_profile']) && (!empty($_POST['from_profile']))) { ?>
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
    function get_emp_data(valu) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/Vacation/get_emp_data",
            data: {valu: valu},
            success: function (d) {
                var obj = JSON.parse(d);
                $('#job_title_id_fk').val(obj.degree_id);
                $('#administration3').val(obj.administration);
                $('#department3').val(obj.department);
                $('#emp_id').val(obj.id);
                $('#administration').val(obj.administration);
                $('#department').val(obj.department);
                $('#manger').val(obj.manger);
                $('#num').val(obj.order);
                //   alert(d);
                $('#degree_id3').val(obj.degree_id);
                $('#manage').val(obj.administration);
                $('#depart').val(obj.department);
                $('#emp_rakm').val(obj.emp_code);
            }
        });
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/Vacation/get_load_page",
            data: {valu: valu},
            success: function (d) {
                $('#load3').html(d);
            }
        });
    }
</script>
<script>
    function add_option(valu) {
        var id = '<?php echo $last_id + 1;?>';
        var x = $('#destination').val();
        $('#destination').append('<option value=' + id + ' selected>' + valu + '</option>');
        $('.selectpicker').selectpicker('refresh');
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/Mandate_orders/add_option",
            data: {valu: valu},
            success: function (d) {
                $('.but2').attr('disabled', 'true');
            }
        });
    }
</script>
<script>
    function get_peroid() {
        var end_date = $('#to_date').val();
        var start_date = $('#from_date').val();
        var a = new Date(end_date);
        var x = new Date(start_date);
        if ($('#from_date').val() == '') {
            return;
        }
        if ($('#to_date').val() == '') {
            return;
        }
        if (start_date > end_date) {
            alert("يجب ان يكون تاريخ النهايه اكبر من البدايه");
            return;
        }
        // var weekday = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/Vacation/get_date",
            data: {start_date: start_date, end_date: end_date},
            success: function (d) {
                var obj = JSON.parse(d);
                $('#num_days').val(obj.day);
                $('#bdal_count_method').val()
                get_badl_value($('#bdal_count_method').val());
            }
        });
    }
</script>
<script>
    function get_badl_value(valu) {
        if ($('#num_days').val() == '') {
            alert("من فضلك ادخل مده الانتداب");
            return;
        }
        var res = valu.split("-");
        var num_day = $('#num_days').val();
        $('#pay_count').val(res[1]);
        $('#total').val(res[1] * num_day);
    }
</script>

<script>
    function get_type() {
        if ($('#employee_name').val() == '') {
            swal("من فضلك ادخل  نوع الانتداب",'','error');
            $('#mandate_distance').val('');
            return;
        }
        else{
            if ($('#mandate_distance').val() >70 && $('#employee_name').val() == 1) 
                {
                    swal("من فضلك ادخل   قيمه اقل من 70",'','error');
                    $('#mandate_distance').val('');
                }
                else if($('#mandate_distance').val() <70 && $('#employee_name').val() == 2) 
                {
                    swal("من فضلك ادخل   قيمه اكبر من 70",'','error');
                    $('#mandate_distance').val('');
                }
                

        }
       
    }
</script>
<!-- uuu -->
<script>
    function GetDiv_emps(div) {
        html = '<div class="col-md-12 no-padding"><table id="js_table_members2" class="table table-striped table-bordered dt-responsive nowrap " >' +
                    '<thead><tr class="info"><th style="width: 50px;">#</th><th style="width: 50px;"> كود الموظف  </th><th style="width: 50px;"> أسم الموظف  </th>' +
                    '<th style="width: 170px;" >الأدارة   </th>' +
                    '<th style="width: 170px;" >القسم</th>' +
                    '</tr></thead><table><div id="dataMember"></div></div>';
        $("#" + div).html(html);
        $('#js_table_members2').show();
        var oTable_usergroup = $('#js_table_members2').DataTable({
            dom: 'Bfrtip',
            "ajax": '<?php echo base_url(); ?>human_resources/employee_forms/Mandate_orders/getConnection_emp/',
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
        var times = obj.dataset.times;
        document.getElementById('emp_name').value = name;
        document.getElementById('emp_id_fk').value = obj.value;
        document.getElementById('emp_code').value = emp_code;
        document.getElementById('edara_n').value = edara_n;
        document.getElementById('edara_id_fk').value = edara_id;
        document.getElementById('job_title').value = job_title;
        document.getElementById('qsm_n').value = qsm_n;
        document.getElementById('qsm_id_fk').value = qsm_id;
        document.getElementById('times').value = times;
        $("#myModal_emps .close").click();
    }
</script>
<script>
    function load_page(row_id) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/Mandate_orders/load_details",
            data: {row_id: row_id},
            success: function (d) {
                $('#result_page').html(d);
            }
        });
    }
</script>
<script>
    function print_order(row_id) {
        var request = $.ajax({
            // print_resrv -- print_contract
            url: "<?=base_url() . 'human_resources/employee_forms/Mandate_orders/Print_order'?>",
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
<!--  -->
<script>
    function get_details_geha_type() {
       // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/Mandate_orders/load_geha",
            beforeSend: function () {
                $('#myDiv_gehat').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#myDiv_gehat').html(d);
            }
        });
    }
</script>
<script>
    function getTitle_geha_type(value,id) {
        $('#geha_mandate_id_fk').val(id);
        $('#geha_mandate_name').val(value);
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
              url: '<?php echo base_url() ?>human_resources/employee_forms/Mandate_orders/add_geha_type',
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
            url: "<?php echo base_url() ?>human_resources/employee_forms/Mandate_orders/getById_geha_type",
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
                url: "<?php echo base_url() ?>human_resources/employee_forms/Mandate_orders/update_geha_type",
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
                url: '<?php echo base_url() ?>human_resources/employee_forms/Mandate_orders/delete_geha_type',
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
    function get_details_geha_mandate() {
       // $('#pop_rkm').text(rkm);
    var id=$('#geha_mandate_id_fk').val();
    console.log(id);
    if(id=='')
    {
      $('#Modal_geha_morsel').modal('hide');
swal({
    title: "من فضلك اختر الجهه اولا ",
    type: "warning",
    confirmButtonClass: "btn-warning",
    closeOnConfirm: false
});
    }
    else{
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/Mandate_orders/load_morsel",
            data:{id:id},
            beforeSend: function () {
                $('#myDiv_gehaa').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#myDiv_gehaa').html(d);
            }
        });
       }
    }
</script>
<script>
    function getTitle_geha_morsel(id,value) {
        $('#mandate_id_fk').val(id);
        $('#mandate_name').val(value);
        $('#Modal_geha_morsel').modal('hide');
    }
</script>
<script>
    function get_details_safms2ol() {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/mandate_setting/Gehat/load_safms2ol",
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
        var geha_id =  $('#geha_mandate_id_fk').val();
        var mostlm_name =  $('#mostlm_name').val();
        var safms2ol_name =  $('#safms2ol_name').val();
        var safms2ol_fk =  $('#safms2ol_fk').val();
        if (geha_id != 0 && geha_id != '' && mostlm_name !='' && safms2ol_fk !='' ) {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>human_resources/employee_forms/Mandate_orders/add_ms2ol',
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
                    $('#myDiv_gehaa').html(html) ;
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
            url: "<?php echo base_url() ?>human_resources/employee_forms/Mandate_orders/getById_mostlm",
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
            var geha_id =  $('#geha_mandate_id_fk').val();
            var mostlm_name =  $('#mostlm_name').val();
            var safms2ol_name =  $('#safms2ol_name').val();
            var safms2ol_fk =  $('#safms2ol_fk').val();
            $.ajax({
                url: "<?php echo base_url() ?>human_resources/employee_forms/Mandate_orders/update_ms2ol",
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
                    $('#myDiv_gehaa').html(html) ;
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
                        url: "<?php echo base_url() ?>human_resources/employee_forms/Mandate_orders/delete_mostlm",
                        type: "Post",
                        dataType: "html",
                        data: {row_id: row_id,geha_id:geha_id},
                        success: function (html) {
                            $('#myDiv_gehaa').html(html) ;
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