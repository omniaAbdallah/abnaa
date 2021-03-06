<script src="<?=base_url().'asisst/admin_asset/'?>sweet_alert/sweetalert.js"></script>
      <link rel="stylesheet" href="<?=base_url().'asisst/admin_asset/'?>sweet_alert/sweetalert.css">
<style type="text/css">
    .btn-group > .btn, .btn-group > .btn + .btn, .btn-group > .btn:first-child, .fc .fc-button-group > * {
        height: 34px !important;
        border-radius: 4px !important;
        margin: 0 !important;
    }
    .bootstrap-select.btn-group .dropdown-toggle .caret {
        right: 92% !important;
    }
    .btn-label {
        left: 12px;
    }
    input, select {
        font-weight: 600 !important;
        color: #002c52 !important;
        font-size: 16px !important;
    }
    .top-label {
        font-size: 13px;
        background-color: #428bca !important;
        border: 2px solid #428bca !important;
        text-shadow: none !important;
        font-weight: 500 !important;
    }
    .myspan {
        color: rgb(255, 0, 0);
        font-size: 12px;
        position: absolute;
        bottom: -16px;
        right: 20px;
    }
    .no-padding {
        padding-left: 0px !important;
        padding-right: 0px !important;
    }
    .print_forma {
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
    }
    .piece-box table {
        margin-bottom: 0
    }
    .piece-box table th,
    .piece-box table td {
        padding: 2px 8px !important;
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
        font-size: 18px;
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
    .open_green {
        background-color: #e6eed5;
    }
    .closed_green {
        background-color: #cdddac !important;
    }
    .table-bordered > thead > tr > th,
    .table-bordered > tbody > tr > th,
    .table-bordered > tfoot > tr > th,
    .table-bordered > thead > tr > td,
    .table-bordered > tbody > tr > td,
    .table-bordered > tfoot > tr > td {
        border: 1px solid #abc572;
    }
    .btn-close-model,
    .btn-close-model:hover,
    .btn-close-model:focus {
        background-color: #8a9e5f;
        color: #fff;
        margin-top: -20px;
    }
    .my_style {
        color: #222;
        font-size: 15px;
        font-weight: 500;
    }
    .one_three {
        width: 43% !important;
        float: right;
    }
    .two_three {
        width: 57% !important;
        float: right;
    }
    @media (min-width: 992px) {
        .col_md_10 {
            width: 10%;
            float: right;
        }
        .col_md_15 {
            width: 15%;
            float: right;
        }
        .col_md_20 {
            width: 20%;
            float: right;
        }
        .col_md_25 {
            width: 25%;
            float: right;
        }
        .col_md_30 {
            width: 30%;
            float: right;
        }
        .col_md_35 {
            width: 35%;
            float: right;
        }
        .col_md_40 {
            width: 40%;
            float: right;
        }
        .col_md_45 {
            width: 45%;
            float: right;
        }
        .col_md_50 {
            width: 50%;
            float: right;
        }
        .col_md_60 {
            width: 60%;
            float: right;
        }
        .col_md_70 {
            width: 70%;
            float: right;
        }
        .col_md_75 {
            width: 75%;
            float: right;
        }
        .col_md_80 {
            width: 80%;
            float: right;
        }
        .col_md_85 {
            width: 85%;
            float: right;
        }
        .col_md_90 {
            width: 90%;
            float: right;
        }
        .col_md_95 {
            width: 95%;
            float: right;
        }
        .col_md_100 {
            width: 100%;
            float: right;
        }
    }
    .label_title_2 {
        width: 100%;
        color: #222;
        font-weight: 600;
        background-color: #fcb632;
        border: 2px solid #fcb632;
        height: 34px;
        margin: 0;
        line-height: 32px;
        padding-right: 0px;
        font-size: 16px;
        margin-bottom: 5px;
        border-radius: 10px;
        text-align: center;
    }
    .input_style_2 {
        border-radius: 0px;
        border-right: transparent;
        width: 100%;
    }
    .label-blue {
        background-color: #003665;
        border: 1px solid #003665;
        height: 34px;
        line-height: 25px !important;
        font-size: 13px !important;
        font-weight: 500 !important;
        text-align: right !important;
    }
    .bond-header {
        height: 55px;
        margin-bottom: 15px;
    }
    .bond-header .right-img img,
    .bond-header .left-img img {
        width: 100%;
        height: 55px;
    }
    .border-box {
        padding: 5px 20px;
        border: 5px double #000 !important;
        border-radius: 29px;
        font-size: 14px !important;
        color: #002c57 !important;
        font-weight: bold !important;
    }
    .border-box-h {
        padding: 3px 20px;
        border: 2px solid #222;
        border-radius: 24px;
    }
    .main-bond-title {
        display: table;
        height: 55px;
        text-align: center;
        width: 100%;
    }
    .main-bond-title h3 {
        display: table-cell;
        vertical-align: bottom;
        font-size: 12px;
    }
    .bond-body {
        padding: 10px;
        border: 2px solid #222;
        display: inline-block;
        width: 100%;
        border-radius: 30px;
        background: url(<?php echo base_url() ?>asisst/admin_asset/img/pills/back2.jpg);
        background-position: center;
        background-size: 50% 100%;
        background-repeat: no-repeat;
    }
    .bond-body h6 {
        font-size: 11px !important;
        color: #002c57 !important;
        font-weight: bold !important;
        line-height: 17px;
    }
    .bond-body h6 span {
        color: darkred;
    }
    .pad-2 {
        padding-left: 2px;
        padding-right: 2px;
    }
    .bond-footer h6 {
        font-size: 13px !important;
        color: #002c57 !important;
        font-weight: bold !important;
        line-height: 17px;
    }
    #cheq, #eda3, #shabka, #mosatadem {
        padding-top: 5px !important;
        padding-bottom: 5px !important;
    }
    .table_style {
        font-size: 11px !important;
        color: darkred !important;
        font-weight: bold !important;
        line-height: 17px !important;
        margin: 1px;
    }
    button[type=submit] {
        padding: 0px 12px;
    }
    .btn-label {
        right: -14px;
    }
    .list::-webkit-calendar-picker-indicator {
        display: none;
    }
    input[type=date]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        display: none;
    }
    input[type=date]::-webkit-clear-button {
        display: none;
        -webkit-appearance: none;
    }
    .tree ul {
        margin-right: 10px;
        position: relative;
        margin-left: 0;
    }
    .tree ul li {
        padding-left: 0;
    }
    .tree ul ul {
        margin-left: 0;
    }
    ul span {
        display: inline !important;
    }
    .fa-plus.sspan {
        background-color: #5b69bc;
        padding: 3px 6px;
        color: #fff;
        border-radius: 5px;
    }
    #colspan4 {
        text-align: right;
        color: red
    }
    .forTd {
        color: black !important;
        font-family: tahoma !important;
        font-size: 15px !important;
        font-weight: 700 !important;
    }
    .tb-table th, .tb-table td {
        padding: 4px !important;
    }
    .tb-table td .form-control {
        width: 100% !important;
    }
    /********************************************/
    /*********************************************/
    .classtd {
        background-color: orange !important;
    }
    td .fa-trash {
        border-radius: 7px !important;
    }
    .fa-plus.sspan {
        border-radius: 7px !important;
        font-size: 15px !important;
    }
    .allpad-12 {
        padding: 20px 0 20px 0;
    }
    .fhelvetic {
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    }
    /*@page{
        margin: 20px 0px;
    }*/
    @page {
        size: A4;
        /*	margin: 180px 0 135px;*/
        margin: 60px 20px 200px 20px;
        border: none;
    }
    /***************************************************/
    .ahwal_style h5 {
        font-weight: bold;
    }
    .ahwal_signs label {
        display: inline-block;
        max-width: 100%;
        margin-bottom: 5px;
        font-weight: bold !important;
        font-size: 24px !important;
    }
    .ahwal_signs h5 {
        font-weight: bold;
        font-size: 24px !important;
    }
    .ahwal_signs {
        font-weight: bold;
        font-size: 20px !important;
    }
    /* .table-bordered > thead > tr > th,
     .table-bordered > tbody > tr > th,
     .table-bordered > tfoot > tr > th,
     .table-bordered > thead > tr > td,
     .table-bordered > tbody > tr > td,
     .table-bordered > tfoot > tr > td {
         border: 1px solid #000 !important;
     }
     */
    .justify {
        text-align: justify;
        text-justify: inter-word;
        line-height: 40px;
    }
    .justify_another {
        text-align: justify;
        text-justify: inter-word;
        line-height: 18px !important;
        margin: 0;
    }
    /*******************************************************************************************/
    .radio label, .checkbox label {
        font-size: 17px !important;
        font-weight: bold !important;
    }
    .final_table table > thead > tr > th,
    .table > tbody > tr > th,
    .table > tfoot > tr > th,
    .table > thead > tr > td,
    .table > tbody > tr > td,
    .table > tfoot > tr > td {
        padding: 4px !important;
    }
    .final_table_back_color {
        background-color: #cacaca !important;
        color: #000 !important;
    }
    .input-write {
        border: 0;
        background-color: transparent;
        box-shadow: none;
    }
    label.label-green {
        height: auto;
        line-height: unset;
        font-size: 18px !important;
        font-weight: 600 !important;
        text-align: right !important;
        margin-bottom: 0;
        background-color: transparent;
        color: #002542;
        border: none;
        padding-bottom: 0;
        font-weight: bold;
        float: right;
        display: block;
        width: 100%;
    }
    .half {
        width: 100% !important;
        float: right !important;
    }
    .input-style {
        border-radius: 0px;
        border-right: 1px solid #eee;
    }
    .form-group {
        margin-bottom: 0px;
    }
    .bootstrap-select > .btn {
        width: 100%;
        padding-right: 5px;
    }
    .bootstrap-select.btn-group .dropdown-toggle .caret {
        right: auto !important;
        left: 4px;
    }
    .bootstrap-select.btn-group .dropdown-toggle .filter-option {
        font-size: 15px;
    }
    /*	.form-control{
            font-size: 15px;
            color: #000;
            border-radius: 4px;
            border: 2px solid #b6d089 !important;
        }*/
    .form-control {
        font-size: 16px;
    }
    .form-control:focus {
        border: 2px solid #b6d089;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        box-shadow: 2px 2px 2px 1px #beffc3;
    }
    .has-success .form-control {
        border: 2px solid #b6d089;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
    }
    .has-success .form-control:focus {
        border: 2px solid #b6d089;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        box-shadow: 2px 2px 2px 1px #beffc3;
    }
    .tab-content {
        margin-top: 15px;
    }
    .btn-group .dropdown-menu > li > a {
        color: #0f0f0f;
        font-weight: 600;
        padding: 5px 5px;
    }
    .btn-group .dropdown-menu {
        left: 0;
        right: auto;
    }
    .table-bordered > thead > tr > th,
    .table-bordered > tbody > tr > th,
    .table-bordered > tfoot > tr > th,
    .table-bordered > thead > tr > td,
    .table-bordered > tbody > tr > td,
    .table-bordered > tfoot > tr > td {
        text-align: center !important;
    }
    .cke_toolbar_break {
        display: none;
        clear: left;
    }
    td input[type=radio] {
        height: 20px;
        width: 20px;
    }
</style>
<div id="detail_edite_namozag">
<div class="col-sm-12 no-padding">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
        <div class="panel-heading">
            <h3 class="panel-title"><?= $title ?></h3>
        </div>
        <div class="panel-body">
            <?php
            if (!empty($result)) {
                echo form_open_multipart('maham_mowazf/talabat/namazegs/Namazeg/update', array('id' => 'myform'));
                $letter_rkm = $result['letter_rkm'];
                $letter_date = $result['letter_date_ar'];
                $start_laqb = $result['start_laqb'];
                $end_laqb = $result['end_laqb'];
                $geha_name = $result['geha_name'];
                // $file_num = $result['file_num'];
                // $father_name = $result['father_name'];
                //yara
                $emp_name = $result['emp_name'];
                $emp_id_fk = $result['emp_id'];
                $emp_code_fk = $result['emp_code'];
                $edara_id_fk = $result['edara_id_fk'];
                $edara_n = $result['edara_n'];
                $qsm_id_fk = $result['qsm_id_fk'];
               $card_num=$result['card_national_num'];
                $qsm_n = $result['qsm_n'];
                $start_work_date=$result['start_work_date'];
    //yara
    $mosma_wazefy_id = $result['mosma_wazefy_id'];
    $mosma_wazefy_n = $result['mosma_wazefy_n'];
                $namozag_type_fk = $result['namozag_type_fk'];
                $mawdo3 = $result['mawdo3'];
               // $responsable_name = $result['responsable_name'];//1-5-om
            } else {
                echo form_open_multipart('maham_mowazf/talabat/namazegs/Namazeg/insert', array('id' => 'myform'));
                $letter_rkm = $letter_number;
                $letter_date = date('Y-m-d');
                $start_laqb = "";
                $geha_name = "";
                $end_laqb = "";
                // $file_num = "";
                // $father_name = "";
            $emp_name = '';
            $card_num='';
            $emp_id_fk = '';
            $emp_code_fk = '';
            $edara_id_fk = '';
            $edara_n = '';
            $qsm_id_fk = '';
            $qsm_n = '';
            $start_work_date='';
//
$mosma_wazefy_id = '';
    $mosma_wazefy_n ='';
                $namozag_type_fk = "";
                $mawdo3 = "";
             //   $responsable_name = '';
            }
            ?>
            <div class="col-sm-12 form-group">
           
                <div class="col-sm-3  col-md-1 padding-4 ">
                
                    <label class="label label-green  ">رقم الخطاب</label>
                    <!-- <input type="text" name="letter_rkm" class="form-control input-style"
                         id="letter_rkm"   value="<?php echo $letter_rkm; ?>" readonly /> -->
                    <input type="text" name="letter_rkm_" class="form-control "
                           id="letter_rkm_" value="<?php //echo $letter_rkm; ?>" readonly>
                    <input type="hidden" name="letter_rkm" id="letter_rkm" value="<?php echo $letter_rkm; ?>"/>
                </div>
                <div class="col-sm-2  col-md-2 padding-4 ">
                    <label class="label label-green  "> التاريخ </label>
                    <input type="text" name="letter_date" class="form-control "
                           value="<?php echo $letter_date; ?>" readonly>
                </div>
                <div class="form-group col-md-4 col-sm-6 col-xs-6 padding-4">
                            <label class="label ">اسم الموظف</label>
                            <input name="emp_name" id="emp_name" class="form-control" style="width:89%; float: right;"
                                   readonly
                                   value="<?php if (!empty($emp_data->employee)) {
                                       echo $emp_data->employee;
                                   } else {
                                       echo $emp_name;
                                   } ?>">
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
<input type="hidden" id="card_num" name="card_national_num"
value="<?php if (!empty($emp_data->card_num)) {
    echo $emp_data->card_num;
} else {
    echo $card_num;
} ?>  ">
<input type="hidden" id="qsm_id_fk" name="qsm_id_fk"
value="<?php if (!empty($emp_data->department)) {
    echo $emp_data->department;
} else {
    echo $qsm_id_fk;
} ?>  ">
<input type="hidden" id="start_work_date" name="start_work_date"
value="<?php if (!empty($emp_data->start_work_date)) {
    echo $emp_data->start_work_date_m;
}
else{
    echo $start_work_date;
}  ?>  ">
<input type="hidden" id="mosma_wazefy_id" name="mosma_wazefy_id"
value="<?php if (!empty($emp_data->mosma_wazefy_id)) {
    echo $emp_data->mosma_wazefy_id;
}else{
    echo $mosma_wazefy_id;
}  ?>  ">
                            <button type="button" data-toggle="modal" data-target="#myModal_emps"
                                    class="btn btn-success btn-next" style="float: left;"
                                    onclick="GetDiv_emps('myDiv_emp')" <?php if (!empty($emp_data->employee)) {
                                echo 'disabled';
                            }else{
                                echo 'disabled';
                            } ?>>
                                <i class="fa fa-plus"></i></button>
                        </div>
                        <div class="form-group col-md-1 col-sm-6 col-xs-6 padding-4">
                            <label class="label "> الرقم الوظيفي</label>
                            <input name="emp_code_fk" id="emp_code" class="form-control"
                                   value="<?php if (!empty($emp_data->emp_code)) {
                                       echo $emp_data->emp_code;
                                   } else {
                                       echo $emp_code_fk;
                                   } ?>" readonly>
                        </div>
                        <div class="form-group col-md-2 col-sm-6 col-xs-6 padding-4">
                            <label class="label "> المسمى الوظيفي</label>
                            <input name="mosma_wazefy_n" id="job_title" class="form-control"
                                   value="<?php if (!empty($emp_data->mosma_wazefy_n)) {
                                       echo $emp_data->mosma_wazefy_n;
                                   }else{
                                       echo $mosma_wazefy_n;
                                   } ?>" readonly>
                        </div>
                        <div class="form-group col-md-2 col-sm-6 col-xs-6 padding-4">
                            <label class="label "> الأدارة </label>
                            <input name="edara_n" id="edara_n" class="form-control"
                                   value="<?php if (!empty($emp_data->edara_n)) {
                                       echo $emp_data->edara_n;
                                   } else {
                                       echo $edara_n;
                                   } ?>" readonly>
                        </div>
            </div>
            <div class="col-sm-12 form-group">
            <div class="form-group col-md-2 col-sm-6 col-xs-6 padding-4">
<label class="label "> القسم</label>
<input name="qsm_n" id="qsm_n" class="form-control"
       value="<?php if (!empty($emp_data->qsm_n)) {
           echo $emp_data->qsm_n;
       } else {
           echo $qsm_n;
       } ?>" readonly>
</div>
            <div class="col-sm-2  col-md-2 padding-4 ">
                    <label class="label label-green  ">اللقب </label>
                    <select name="start_laqb" id="start_laqb"
                            class="selectpicker no-padding form-control  form-control "
                            data-show-subtext="true" data-live-search="true" aria-required="true">
                        <option value="">اختر</option>
                        <?php if (!empty($titles)) {
                            foreach ($titles as $title) { ?>
                                <option data-title="<?= $title->title_setting ?>" value="<?= $title->id_setting ?>"
                                    <?php
                                    if (!empty($start_laqb)) {
                                        if ($start_laqb == $title->id_setting) {
                                            echo 'selected';
                                        }
                                    }
                                    ?>
                                > <?= $title->title_setting ?> </option>
                            <?php }
                        } ?>
                    </select>
                </div>
                <div class="col-sm-3  col-md-5 padding-4 ">
                    <label class="label label-green  ">الجهة </label>
                    <input type="text" name="geha_name" id="geha_name" readonly value="<?php echo $geha_name; ?>"
                           class="form-control input-style" style="width: 90%;float: right">
                    <button type="button" data-toggle="modal"
                            data-target="#myModalInfo" class="btn btn-success btn-next"
                            style="float: right;">
                        <i class="fa fa-plus"></i></button>
                </div>
                <div class="col-sm-3  col-md-2 padding-4 ">
                    <label class="label label-green  ">نهاية اللقب </label>
                    <select name="end_laqb" id="end_laqb"
                            class="selectpicker no-padding form-control  form-control "
                            data-show-subtext="true" data-live-search="true" aria-required="true">
                        <option value="">اختر</option>
                        <?php if (!empty($greetings)) {
                            foreach ($greetings as $greeting) { ?>
                                <option data-title="<?= $greeting->title_setting ?>"
                                        value="<?= $greeting->id_setting ?>"
                                    <?php if (!empty($end_laqb)) {
                                        if ($end_laqb == $greeting->id_setting) {
                                            echo 'selected';
                                        }
                                    } ?>
                                > <?= $greeting->title_setting ?> </option>
                            <?php }
                        } ?>
                    </select>
                </div>
                <div class="col-sm-3  col-md-2 padding-4 ">
                    <label class="label label-green  ">النماذج </label>
                    <select name="namozag_type_fk" id="namozag_type_fk" data-validation="required"
                            class="selectpicker no-padding form-control  form-control "
                            data-show-subtext="true" data-live-search="true" aria-required="true">
                        <option value="">اختر</option>
                        <?php foreach ($letters_type_arr as $value) { ?>
                            <option value="<?php echo $value->id; ?>"
                                <?php if (!empty($namozag_type_fk)) {
                                    if ($namozag_type_fk == $value->id) {
                                        echo 'selected';
                                    }
                                } ?>
                            ><?= $value->letter_name ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-sm-3  col-md-8 padding-4 ">
                    <label class="label label-green  ">الموضوع </label>
                    <input type="text" value="<?php echo $mawdo3; ?>" name="mawdo3" id="mawdo3"
                           class="form-control input-style">
                </div>
                <div class="col-sm-3  col-md-1 padding-4 ">
                    <label class="label label-green  "><i class="fa fa-eye" aria-hidden="true"></i>
                    </label>
                    <button type="button" onclick="GetNamozegDiv($('#namozag_type_fk').val())"
                            class="btn btn-labeled btn-warning " name="action" value="action">
                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>عرض
                    </button>
                </div>
            </div>
            <div class="col-md-12 " id="Details">
                <?php if (!empty($result)) { ?>
                    <div class="container">
                        <div class="print_forma  no-border    col-xs-12 allpad-12">
                            <div class="col-xs-12">
                                <div class="personality">
                                    <div class="col-xs-1"></div>
                                    <div class="col-xs-7 ahwal_style">
                                        <h4 class=""
                                            style="font-weight: bold !important;font-size: 20px !important;"><?php if (!empty($titles_edit[$result['start_laqb']])) {
                                                echo $titles_edit[$result['start_laqb']]['title_setting'];
                                            } ?>/<?php echo $result['geha_name']; ?>  </h4>
                                    </div>
                                    <div class="col-xs-3">
                                        <h4 class=""
                                            style="font-weight: bold !important;font-size: 20px !important;"><?php if (!empty($greetings_edit[$result['end_laqb']])) {
                                                echo $greetings_edit[$result['end_laqb']]['title_setting'];
                                            } ?> </h4>
                                    </div>
                                    <div class="col-xs-11 col-xs-offset-1 ahwal_style">
                                        <br>
                                        <h5 style="font-weight: normal !important;"><input type="text"
                                                                                           class="form-control input-write"
                                                                                           name="header_name"
                                                                                           id="header_name"
                                                                                           value="<?php echo $result['header_name'] ?>">
                                        </h5>
                                    </div>
                                    <div class="col-xs-12 no-padding">
                                        <div class="form-group col-sm-12 col-xs-12">
                                        <textarea class="editor1" id="editor1" name="namozg_head"
                                                  rows="2"><?php echo $result['namozg_head']; ?></textarea>
                                        </div>
                                        <!--  -->
                                        <?php if ($result['namozag_type_fk'] == 1) {?>
                    <div class="form-group col-sm-12 col-xs-12">
                        <table class="table table-bordered ">
                            <thead>
                            <tr class="greentd">
                                <th class="text-center">الاسم</th>
                                <th class="text-center">السجل المدني</th>
                                <th class="text-center">الوظيفة</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="text-center"><?php echo $result['emp_name'] ?></td>
                                <td class="text-center"><?php echo $result['card_national_num'] ?></td>
                                <td class="text-center"><?php echo $result['mosma_wazefy_n'] ?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <?php }else if ($result['namozag_type_fk']== 2) {?>
                    <div class="form-group col-sm-12 col-xs-12">
                        <table class="table table-bordered ">
                            <thead>
                            <tr class="">
                                <th class="text-center">اسم الموظف</th>
                                <td class="text-center"><?php echo $result['emp_name'] ?></td>
                                <th class="text-center">رقم السجل المدني </th>
                                <td class="text-center"><?php echo $result['card_national_num'] ?></td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                            <th class="text-center">بداية العمل  </th>
                               <td class="text-center"><?php echo $result['start_work_date'] ?></td>
                            <th class="text-center">المسمى الوظيفي </th>
                                <td class="text-center"><?php echo $result['mosma_wazefy_n'] ?></td>
                            </tr>
                            <tr>
<th class="text-center">الراتب الأساسي</th>
   <td class="text-center">0</td>
<th class="text-center">البدلات</th>
    <td class="text-center">0</td>
</tr>
                            </tbody>
                        </table>
                    </div>
                    <?php }else if ($result['namozag_type_fk'] == 3) {?>
                    <div class="form-group col-sm-12 col-xs-12">
                        <table class="table table-bordered ">
                            <thead>
                            <tr class="greentd">
                                <th class="text-center">الاسم</th>
                                <th class="text-center">السجل المدني</th>
                                <th class="text-center">يوم وتاريخ الغياب</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="text-center"><?php echo $result['emp_name'] ?></td>
                                <td class="text-center"><?php echo $result['card_national_num'] ?></td>
                                <td class="text-center"></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <?php }?>
                                        <!--  -->
                                        <div class="form-group col-sm-12 col-xs-12">
                                        <textarea class="editor2" id="editor2"
                                                  name="namozg_footer"><?php echo $result['namozg_footer']; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 form-group 4 text-center">
                                <input type="hidden" name="save" id="save" value="save">
                                <?php if (!empty($result)) {
                                    $onclick = '';
                                    $type = 'submit';
                                } else {
                                    $type = 'button';
                                    $onclick = 'add()';
                                } ?>
                                <button type="<?php echo $type; ?>" onclick="<?php echo $onclick; ?>"
                                        class="btn btn-labeled btn-success " name="save" value="save">
                                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                </button>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>
</div>
<?php if (isset($records) && $records != null) { ?>
    <div class="col-sm-12 no-padding">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">
                <h3 class="panel-title"> الخطابات</h3>
            </div>
            <div class="panel-body">
                <table id="example" class=" table table-bordered table-striped" role="table">
                    <thead>
                    <tr class="greentd">
                        <th width="2%">م</th>
                        <th class="text-center">رقم الخطاب</th>
                        <th class="text-center">التاريخ</th>
                        <th class="text-center">الجهة</th>
                        <th class="text-center">
الرقم الوظيفي</th>
                        <th class="text-center">اسم الموظف</th>
                        <th class="text-center">الموضوع</th>
                        <th class="text-left">القائم بالإضافة</th>
                        <th class="text-center">الإجراء</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $x = 1;
                    foreach ($records as $value) {
                        ?>
                        <tr>
                            <td><?= $x++ ?></td>
                            <td><?= $value->letter_rkm_full ?></td>
                            <td><?= $value->letter_date_ar ?></td>
                            <td><?= $value->geha_name ?></td>
                            <td><?= $value->emp_code ?></td>
                            <td><?= $value->emp_name ?></td>
                            <td><?php if (isset($value->mawdo3) and $value->mawdo3 != null) {
                                    echo $value->mawdo3;
                                } ?></td>
                            <td>
                         <span style="font-size: 12px; color: white !important; font-weight: normal;width: 141px;"
                               class="badge badge-add"><?php echo $value->publisher_name; ?></span>
                            </td>
                            <td>
                                <a type="button"
                                   class="btn btn-sm btn-info" data-toggle="modal"
                                   data-target="#detailsModal" onclick="details(<?= $value->letter_rkm ?>)"
                                   style="padding: 3px 5px;line-height: 1;">
                                    <i class="glyphicon glyphicon-list"></i>
                                </a>
                                <!-- <a 
                                onclick="edit(<?=$value->letter_rkm ?>)"
                                href="<?php echo base_url() . 'maham_mowazf/talabat/namazegs/Namazeg/edit/' . $value->letter_rkm ?>"
                                   title="تعديل"><i class="fa fa-pencil"></i></a> -->
                                   <a 
                                onclick="edite(<?=$value->letter_rkm ?>)"
                             
                                   title="تعديل"><i class="fa fa-pencil"></i></a>
                                <?php if ($_SESSION['role_id_fk'] == 1) { ?>
                                    <a onclick="Delete_namozeg(<?= $value->letter_rkm ?>)" title="حذف"><i
                                                class="fa fa-trash"></i></a>
                                <?php } else { ?>
                                <?php } ?>
                                <a href="<?php echo base_url() . 'maham_mowazf/talabat/namazegs/Namazeg/printNamazeg/' . $value->letter_rkm ?>"
                                   title="طباعه"><i class="fa fa-print"></i></a>
                                <button type="button" class="btn btm-sm btn-labeled btn-inverse " id="attach_button"
                                        onclick="put_value(<?php echo $value->id; ?>,<?php echo $value->letter_rkm; ?>)"
                                        data-toggle="modal" data-target="#myModal_attach">
                                    <span class="btn-label" style="padding: 1px 7px;"><i
                                                class="glyphicon glyphicon-cloud-upload"></i></span>
                                    اضافة مرفق
                                </button>
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
<?php } ?>
<div class="modal fade" id="myModalInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal_2" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">الجهة</h4>
            </div>
            <div class="modal-body">
                <div class="col-sm-12 form-group">
                    <div class="col-sm-12 form-group">
                        <div class="col-sm-3  col-md-3 padding-4 ">
                            <button type="button" class="btn btn-labeled btn-success "
                                    onclick="$('#geha_input').show(); show_add()"
                                    style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                                <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>إضافة جهة
                            </button>
                        </div>
                    </div>
                    <div class="col-sm-12 no-padding form-group">
                        <div id="geha_input" style="display: none">
                            <div class="col-sm-3  col-md-5 padding-2 ">
                                <label class="label label-green  ">إسم الجهة </label>
                                <input type="text" name="geha_title" id="geha_title"
                                       value=""
                                       class="form-control input-style">
                                <input type="hidden" class="form-control" id="s_id" value="">
                            </div>
                            <div class="col-sm-3  col-md-2 padding-4 ">
                                <label class="label label-green  ">رقم الجوال </label>
                                <input type="text" name="mob" id="mob"
                                       value=""
                                       class="form-control input-style">
                            </div>
                            <div class="col-sm-3  col-md-3  ">
                                <label class="label label-green  ">العنوان </label>
                                <input type="text" name="address" id="address"
                                       value=""
                                       class="form-control input-style">
                            </div>
                            <div class="col-sm-3  col-md-2 padding-4" id="div_add" style="display: none;">
                                <button type="button" onclick="add_geha($('#geha_title').val())"
                                        style="    margin-top: 27px;"
                                        class="btn btn-labeled btn-success" name="save" value="save">
                                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                </button>
                            </div>
                            <div class="col-sm-3  col-md-3 padding-4" id="div_update" style="display: none;">
                                <button type="button"
                                        class="btn btn-labeled btn-success " name="save" value="save" id="update">
                                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                </button>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                </div>
                <br> <br> <br>
                <div id="myDiv_geha"><br><br>
                    <?php if (!empty($geha_table)) { ?>
                        <table id="" class=" example table table-bordered table-striped" role="table">
                            <thead>
                            <tr class="greentd">
                                <th width="2%">#</th>
                                <th class="text-center">الجهة</th>
                                <th class="text-center">رقم الجوال</th>
                                <th class="text-center">العنوان</th>
                                <th class="text-center">الإجراء</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $x = 1;
                            foreach ($geha_table as $value) {
                                ?>
                                <tr>
                                    <td><input type="radio" name="radio" data-title="<?= $value->title ?>"
                                               id="radio" ondblclick="getTitle($(this).attr('data-title'))"></td>
                                    <td><?= $value->title ?></td>
                                    <td><?= $value->mob ?></td>
                                    <td><?= $value->address ?></td>
                                    <td>
                                        <!--
                                          <a href="#" onclick="delte_geha(<?= $value->id ?>);"> <i class="fa fa-trash"> </i></a>
                                        <a href="#" onclick="update_geha(<?= $value->id ?>);"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
-->
                                        <a href="#" onclick="delte_geha(<?= $value->id ?>);"> <i
                                                    class="fa fa-trash"> </i></a>
                                        <a href="#" onclick="update_geha(<?= $value->id ?>);"><i
                                                    class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    <?php } else { ?>
                        <div class="alert alert-danger">لاتوجد بيانات !!</div>
                    <?php } ?>
                </div>
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <button type="button" class="btn btn-danger" style="float: left;" data-dismiss="modal_2">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">التفاصيل</h4>
            </div>
            <div class="modal-body col-sm-12" id="detail_div_namozag">
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <button type="button" class="btn btn-danger" style="float: left;" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
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
<link href="<?php echo base_url()?>asisst/admin_asset/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/jquery-ui.js" type="text/javascript"></script>


<script>
    function add_geha(value) {
        $('#div_update').hide();
        $('#div_add').show();
        //  alert(value);
        var mob = $('#mob').val();
        var address = $('#address').val();
        if (value != 0 && value != '' && mob != ' ' && address != ' ') {
            var dataString = 'title=' + value + '&mob=' + mob + '&address=' + address;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>maham_mowazf/talabat/namazegs/Namazeg/insert_geha_ajax',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $('#geha_title').val(' ');
                    $('#address').val(' ');
                    $('#mob').val(' ');
                    $("#myDiv_geha").html(html);
                }
            });
        }
    }
</script>
<script>
    function getTitle(value) {
        if (value != '') {
            $('#geha_name').val(value);
            $('#geha_name').removeAttr('readonly');
           // $('#myModalInfo').modal('hide');
            $("#myModalInfo .hide").click();
        }
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>
<script>
    function Delete_namozeg(value) {
        var title = "هل تريد   حفظ الحذف ؟";
        var confirm = "نعم, قم بالحذف";
        var text2 = "";
        Swal.fire({
            title: title,
            text: text2,
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'لا',
            confirmButtonText: confirm
        }).then((result) => {
            if (result.value) {
                window.location.href = "<?php echo base_url();?>maham_mowazf/talabat/namazegs/Namazeg/Delete_namozeg/" + value;
            }
        });
    }
</script>
<script>
    function details(value) {
        if (value != 0 && value != '') {
            var dataString = 'rkm=' + value;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>maham_mowazf/talabat/namazegs/Namazeg/getDetailsDiv',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $("#detail_div_namozag").html(html);
                }
            });
        }
    }
    
</script>
<script>
    function edite(value) {
        if (value != 0 && value != '') {
            var dataString = 'rkm=' + value;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>maham_mowazf/talabat/namazegs/Namazeg/edit',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $("#detail_edite_namozag").html(html);
                }
            });
        }
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
<!-- New-->
<script>
    function update_geha(id) {
        var id = id;
        $('#geha_input').show();
        $('#div_add').hide();
        $('#div_update').show();
        $.ajax({
            url: "<?php echo base_url() ?>maham_mowazf/talabat/namazegs/Namazeg/getById",
            type: "Post",
            dataType: "html",
            data: {id: id},
            success: function (data) {
                var obj = JSON.parse(data);
                $('#geha_title').val(obj.title);
                $('#mob').val(obj.mob);
                $('#address').val(obj.address);
                $('#s_id').val(obj.id);
            }
        });
        $('#update').on('click', function () {
            var geha_title = $('#geha_title').val();
            var address = $('#address').val();
            var mob = $('#mob').val();
            var s_id = $('#s_id').val();
            $.ajax({
                url: "<?php echo base_url() ?>maham_mowazf/talabat/namazegs/Namazeg/update_geha",
                type: "Post",
                dataType: "html",
                data: {geha_title: geha_title, address: address, mob: mob, id: s_id},
                success: function (html) {
                    //  alert('hh');
                    $('#geha_title').val(' ');
                    $('#address').val(' ');
                    $('#mob').val(' ');
                    $("#myDiv_geha").html(html);
                    $('#geha_input').hide();
                }
            });
        });
    }
</script>
<script>
    function add_row() {
        $(".mytable").show();
        //var x = document.getElementById('resultTable');
        var len = $(".attachTable").length + 1;
        // alert(len);
        $(".attachTable").append('<tr class="' + len + '">'
            + '</td><td><input type="input" name="title[]" id="title"  class="form-control" data-validation="reuqired"></td><td><input type="file" name="file[]" id="file"  class="form-control " data-validation="reuqired"></td><td><a href="#"  onclick="DeleteRowImg(' + len + ')"> <i class="fa fa-trash" ></i> </a></td></tr>');
    }
    function DeleteRowImg(valu) {
        $('.' + valu).remove();
        // var x = document.getElementById('resultTable');
        var len = $(".attachTable").length;
        if (len == 0) {
            $(".mytable").hide();
        }
    }
</script>
<script>
    function put_value(id, rkm) {
        $('#hidden_id').val(id);
        $('#hidden_rkm').val(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>maham_mowazf/talabat/namazegs/Namazeg/get_attaches",
            data: {rkm: rkm},
            success: function (d) {
                $('.tbody').html(d);
                // alert(d);
            }
        });
    }
</script>

<script>
    function delte_geha(id) {
        //  confirm('هل انت متأكد من عملية الحذف ؟');
        var r = confirm('هل انت متأكد من عملية الحذف ؟');
        if (r == true) {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>maham_mowazf/talabat/namazegs/Namazeg/delete_geha',
                data: {id: id},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    //   alert(html);
                    $("#myDiv_geha").html(html);
                }
            });
        }
    }
</script>
<script>
    function show_add() {
        $('#div_update').hide();
        $('#div_add').show();
    }
</script>
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
                    "ajax": '<?php echo base_url(); ?>maham_mowazf/talabat/namazegs/Namazeg/getConnection_emp/',
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
            //8-6-om
            function Get_emp_Name(obj) {
                console.log(' obj :' + obj.dataset.name + ': ');
                var name = obj.dataset.name;
                var emp_code = obj.dataset.emp_code;
                var edara_id = obj.dataset.edara_id;
                var edara_n = obj.dataset.edara_n;
                var job_title = obj.dataset.job_title;
                var job_id = obj.dataset.job_id;
                var qsm_id = obj.dataset.qsm_id;
                var qsm_n = obj.dataset.qsm_n;
                var start_work_date = obj.dataset.start_work_date;
                var card_num = obj.dataset.card_num;
                document.getElementById('emp_name').value = name;
                document.getElementById('emp_id_fk').value = obj.value;
                document.getElementById('emp_code').value = emp_code;
                //6-7-om
                $('#emp_id_fk').val(obj.value);
                //    check_vacation(obj.value);
                document.getElementById('card_num').value = card_num;
                document.getElementById('edara_n').value = edara_n;
                document.getElementById('edara_id_fk').value = edara_id;
                document.getElementById('job_title').value = job_title;
                document.getElementById('mosma_wazefy_id').value = job_id;
                document.getElementById('qsm_n').value = qsm_n;
                document.getElementById('qsm_id_fk').value = qsm_id;
                document.getElementById('start_work_date').value = start_work_date;
                // $("#myModal_emps")modal.('hide');
                $("#myModal_emps .close").click();
            }
        </script>
        <script>
function GetNamozegDiv(value) {
    var start_laqb = $('option:selected', $('#start_laqb')).attr('data-title');
    var header_tahia = $('#header_tahia').val();
    var end_laqb = $('option:selected', $('#end_laqb')).attr('data-title');
    var mawdo3 = $('#mawdo3').val();
    var geha_name = $('#geha_name').val();
    var emp_id = $('#emp_id').val();
    var letter_rkm = $('#letter_rkm').val();
    var emp_name = $('#emp_name').val();
    var job_title = $('#job_title').val();
    var card_num = $('#card_num').val();
    var start_work_date = $('#start_work_date').val();
    if (value != 0 && value != '') {
        var dataString = 'id=' + value + '&start_laqb=' + start_laqb + '&header_tahia=' +
            header_tahia + '&end_laqb=' + end_laqb + '&mawdo3=' + mawdo3 + '&geha_name=' + geha_name + '&emp_id=' + emp_id + '&letter_rkm=' + letter_rkm + '&emp_name=' + emp_name+ '&card_num=' + card_num+ '&job_title=' + job_title+ '&start_work_date=' + start_work_date;
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>maham_mowazf/talabat/namazegs/Namazeg/getNamozegDetails',
            data: $('#myform').serialize() + "&" + dataString,
            dataType: 'html',
            cache: false,
            success: function (html) {
                $("#Details").html(html);
                /* function replaceMulti(haystack, needle, replacement)
                  {
                      return haystack.split(needle).join(replacement);
                  }
                  someString = $('.content_view').text();
                //  console.log(replaceMulti(someString, 'أبنـاء', 'dog'));
                  $('.content_view').text(replaceMulti($('.content_view').text(), 'X', $('#father_name').val()));
                  $('.content_view').text(replaceMulti($('.content_view').text(), 'B', $('#file_num').val()));
                   $('.content_view').text( replaceMulti($('.content_view').text(), 'C', $('#father_card').val()));
*/
            }
        });
    }
}
</script>