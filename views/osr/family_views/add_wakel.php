<style>
    label.label-green {
        height: auto;
        line-height: unset;
        font-size: 14px !important;
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
    .nav-tabs > li > a {
        color: #222;
        font-weight: 500;
        background-color: #e6e6e6;
        font-size: 15px;
    }
    .tab-content {
        margin-top: 15px;
    }
    /******/
    .inner-heading {
        background-color: #9ed6f3;
        padding: 10px;
    }
    .pop-text {
        background-color: #009688;
        color: #fff;
        padding: 7px;
        font-size: 14px;
        margin-bottom: 3px;
        margin-top: 3px;
    }
    .pop-text1 {
        background-color: #eee;
        padding: 7px;
        font-size: 14px;
        margin-bottom: 3px;
        margin-top: 3px;
    }
    .pop-title-text {
        margin-top: 4px;
        margin-bottom: 4px;
        padding: 6px;
        background-color: #9ed6f3;
    }
    .span-validation {
        color: rgb(255, 0, 0);
        font-size: 12px;
        position: absolute;
        bottom: -10px;
        right: 50%;
    }
    .astric {
        color: red;
        font-size: 25px;
        position: absolute;
    }
    .help-block.form-error {
        color: #a94442 !important;
        font-size: 11px !important;
        position: absolute !important;
        bottom: -23px !important;
        right: 50% !important;
    }
</style>

<?php if($_SESSION['hidden_action']){ ?>
    <style>
        input,select {
            pointer-events:none;
            color:#AAA;
            background:#F5F5F5;
        }

    </style>
<?php } ?>

<?php
if (isset($result) && $result != null) {
    $w_name = $result[0]->w_name;
    $relationship_id_fk = $result[0]->relationship_id_fk;
    $w_mob = $result[0]->w_mob;
    $w_national_id_type = $result[0]->w_national_id_type;
    $w_card_source = $result[0]->w_card_source;
    $w_national_id = $result[0]->w_national_id;
    $w_birth_date = $result[0]->w_birth_date;
    $w_birth_date_hijri = $result[0]->w_birth_date_hijri;
    $w_birth_date_hijri_year = $result[0]->w_birth_date_hijri_year;
    $w_birth_date_year = $result[0]->w_birth_date_year;
    $w_want_work = $result[0]->w_want_work;
    $w_job_id_fk = $result[0]->w_job_id_fk;
    $job_place = $result[0]->job_place;
    $employer = $result[0]->employer;
    $job_mob = $result[0]->job_mob;
    $salary = $result[0]->salary;
    $guaranted = $result[0]->guaranted;
    $persons_num = $result[0]->persons_num;
    $w_national_img = $result[0]->w_national_img;
    $id = $result[0]->id;
    $w_marital_status_id_fk = $result[0]->w_marital_status_id_fk;
} else {
    $w_name = "";
    $relationship_id_fk = "";
    $w_mob = "";
    $w_national_id_type = "";
    $w_card_source = "";
    $w_national_id = "";
    $w_birth_date = "";
    $w_birth_date_hijri = "";
    $w_birth_date_hijri_year = "";
    $w_birth_date_year = "";
    $w_want_work = '';
    $w_job_id_fk = "";
    $job_place = "";
    $employer = "";
    $job_mob = "";
    $salary = "";
    $guaranted = "";
    $persons_num = "";
    $w_national_img = '';
    $w_marital_status_id_fk = '';
    $id = '';
}
?>
<!--<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">-->
<div class="col-sm-12 col-md-12 col-xs-12 fadeInUp wow">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">
                <h4><?= $title ?></h4>
            </div>
        </div>
        <?php echo form_open_multipart('osr/Family/add_wakel', array('id' => 'wakel_form', 'class' => 'wakel_form')); ?>
        <div class="panel-body" style="height: 330px;">
            <div class="col-sm-12 col-xs-12">
                <div class="form-group col-md-2 col-sm-4 col-xs-12 padding-4">
                    <label class="label label-green  half"> رقم السجل المدني للاب </label>
                    <input type="text"
                           disabled class="form-control half input-style"
                           value="<?php if (!empty($father->f_national_id)) {
                               echo $father->f_national_id;
                           } ?>"/>
                </div>
                <div class="form-group col-md-2 col-sm-4 col-xs-12 padding-4">
                    <label class="label label-green  half"> اسم الاب الرباعي </label>
                    <input type="text"
                           disabled class="form-control half input-style"
                           value="<?php if (!empty($father->full_name)) {
                               echo $father->full_name;
                           } ?>"/>
                </div>
                <div class="form-group col-md-2 col-sm-4 col-xs-12 padding-4">
                    <label class="label label-green  half"> إسم الوكيل رباعي <strong
                                class="astric">*</strong><strong></strong></label>
                    <input type="text" name="w_name"
                           data-validation="required" class="form-control half input-style"
                           value="<?php echo $w_name; ?>"/>
                </div>
                <div class="form-group col-md-2 col-sm-4 col-xs-12 padding-4">
                    <label class="label label-green  half">رقم الهوية<strong
                                class="astric">*</strong><strong></strong> </label>
                    <input type="text" name="w_national_id" maxlength="10"
                           id="w_national_id" data-validation="required"
                           onkeyup="check_length_num(this,10,'w_national_id_span');"
                           value="<?php echo $w_national_id; ?>" onkeypress="validate_number(event)"
                           class="form-control half input-style"/>
                    <span id="w_national_id_span" class="span-validation"> </span>
                </div>
                <div class="form-group col-md-2 col-sm-4 col-xs-12 padding-4">
                    <label class="label label-green  half">نوع الهوية<strong
                                class="astric">*</strong><strong></strong> </label>
                    <select name="w_national_id_type"
                            class="selectpicker no-padding form-control choose-date form-control half"
                            data-show-subtext="true" data-live-search="true" data-validation="required"
                            aria-required="true">
                        <?php if (isset($national_id_array) && $national_id_array != null && !empty($national_id_array)) { ?>
                            <option value="">اختر</option>
                            <?php
                            foreach ($national_id_array as $row2):
                                $selected = '';
                                if ($row2->id_setting == $w_national_id_type) {
                                    $selected = 'selected';
                                } ?>
                                <option value="<?php echo $row2->id_setting; ?>" <?php echo $selected ?> ><?php echo $row2->title_setting; ?></option>
                            <?php endforeach; ?>
                        <?php } else { ?>
                            <option value="" selected>اختر</option>
                            <option value="<?php echo $row2->id_setting; ?>" <?php echo $selected ?> ><?php echo $row2->title_setting; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-2 col-sm-4 col-xs-12 padding-4">
                    <label class="label label-green  half">مصدر الهوية<strong
                                class="astric">*</strong><strong></strong> </label>
                    <select name="w_card_source" id="w_card_source"
                            class="selectpicker no-padding form-control choose-date form-control half"
                            data-show-subtext="true" data-live-search="true" data-validation="required"
                            aria-required="true">
                        <option value="">إختر</option>
                        <?php if (!empty($id_source)) {
                            foreach ($id_source as $record) {
                                $select = '';
                                if ($w_card_source == $record->id_setting) {
                                    $select = 'selected';
                                }
                                ?>
                                <option value="<?php echo $record->id_setting; ?>"
                                    <?php echo $select; ?>><?php echo $record->title_setting; ?></option>
                            <?php }
                        } ?>
                    </select>
                </div>
            </div>
            <div class="col-sm-12 col-xs-12">
                <div class="form-group col-md-2 col-sm-4 col-xs-12 padding-4">
                    <?php if (!empty($w_birth_date_hijri)) {
                        $hijri_date = explode('/', $w_birth_date_hijri);
                    } ?>
                    <label class="label label-green  half">تاريخ الميلاد هجرى<strong
                                class="astric">*</strong> </label>
                    <input class="textbox form-control" type="text" name="HDay" pattern="\d*"
                           onkeypress="return isNumberKey(event)"
                           onkeyup="moveOnMax(this,document.getElementById('Hmonth'))"
                           value="<?php if (!empty($hijri_date[0])) {
                               echo $hijri_date[0];
                           } ?>"
                           placeholder="يوم" id="HDay" size="20" maxlength="2"
                           style="width: 33.33%;float: right;"/>
                    <input class="textbox form-control" type="text" name="HMonth" pattern="\d*"
                           onkeypress="return isNumberKey(event)"
                           onkeyup="moveOnMax(this,document.getElementById('HYear'))"
                           value="<?php if (!empty($hijri_date[1])) {
                               echo $hijri_date[1];
                           } ?>" placeholder="شهر"
                           id="Hmonth" size="20" maxlength="2" style="width: 33.33%;float: right;"/>
                    <input class="textbox4 form-control" type="text" name="HYear" pattern="\d*"
                           onkeypress="return isNumberKey(event)"
                           onkeyup="islToChr(this.form);getAge();chech_year(); "
                           value="<?php if (!empty($hijri_date[2])) {
                               echo $hijri_date[2];
                           } ?>" placeholder="سنة"
                           id="HYear" size="20" maxlength="4" style="width: 33.33%;float: right;"/>
                </div>
                <div class="form-group col-md-2 col-sm-4 col-xs-12 padding-4">
                    <?php
                    if (!empty($w_birth_date)) {
                        $gregorian_date = explode('/', $w_birth_date);
                    } ?>
                    <label class="label label-green  half">تاريخ الميلاد<strong class="astric">*</strong>
                    </label>
                    <input class="textbox form-control" type="text" name="CDay" pattern="\d*"
                           onkeypress="return isNumberKey(event)"
                           onkeyup="moveOnMax(this,document.getElementById('CMonth'))"
                           placeholder="يوم" id="CDay" size="20" maxlength="2" autofocus
                           style="width: 33.33%;float: right;"
                           value="<?php if (!empty($gregorian_date[0])) {
                               echo $gregorian_date[0];
                           } ?>"/>
                    <input class="textbox form-control" type="text" name="CMonth" pattern="\d*"
                           onkeypress="return isNumberKey(event)"
                           onkeyup="moveOnMax(this,document.getElementById('CYear'))"
                           placeholder="شهر" id="CMonth" size="20" maxlength="2"
                           style="width: 33.33%;float: right;"
                           value="<?php if (!empty($gregorian_date[1])) {
                               echo $gregorian_date[1];
                           } ?>"/>
                    <input class="textbox4 form-control" type="text" name="CYear" id="CYear" pattern="\d*"
                           onkeypress="return isNumberKey(event)" onkeyup="chrToIsl(this.form);getAge();"
                           placeholder="سنة" id="CYear" size="20" maxlength="4"
                           style="width: 33.33%;float: right;"
                           value="<?php if (!empty($gregorian_date[2])) {
                               echo $gregorian_date[2];
                           } ?>"/>
                </div>
                <div class="form-group col-md-2 col-sm-4 col-xs-12 padding-4">
                    <label class="label label-green  half">العمر<strong
                                class="astric">*</strong><strong></strong> </label>
                    <input class="textbox2 form-control half " type="text" name="age" id="myage" id="wd"
                           value="<?php
                           if (!empty($current_year) && !empty($w_birth_date_hijri_year)) {
                               echo $current_year - $w_birth_date_hijri_year;
                           } ?>" readonly/>
                    <input class="textbox2 form-control half hidden" type="number" name="wd" size="60"
                           id="wd" readonly/>
                    <input class="textbox2 hidden" type="text" name="JD" size="60" id="JD" readonly/>
                </div>
                <div class="form-group col-md-2 col-sm-4 col-xs-12 padding-4">
                    <label class="label label-green  half">الصلة<strong
                                class="astric">*</strong><strong></strong> </label>
                    <select name="relationship_id_fk" id="relationship_id_fk" data-validation="required"
                            aria-required="true"
                            class="selectpicker no-padding form-control choose-date form-control half">
                        <option value="">إختر</option>
                        <?php if (!empty($relationships)) {
                            foreach ($relationships as $record) {
                                $select = '';
                                if ($relationship_id_fk == $record->id_setting) {
                                    $select = 'selected';
                                }
                                ?>
                                <option value="<?php echo $record->id_setting; ?>" <?php echo $select; ?>><?php echo $record->title_setting; ?></option>
                            <?php }
                        } ?>
                    </select>
                </div>
                <div class="form-group col-md-2 col-sm-4 col-xs-12 padding-4">
                    <label class="label label-green  half">الحالة الإجتماعية<strong
                                class="astric">*</strong><strong></strong> </label>
                    <select name="w_marital_status_id_fk" id="w_marital_status_id_fk"
                            data-validation="required" aria-required="true"
                            onchange="getGuaranted(this.value)"
                            class="selectpicker no-padding form-control choose-date form-control half">
                        <option value="">إختر</option>
                        <?php foreach ($marital_status_array as $row6):
                            $selected = '';
                            if ($row6->id_setting == $w_marital_status_id_fk) {
                                $selected = 'selected';
                            } ?>
                            <option value="<?php echo $row6->id_setting; ?>" <?php echo $selected ?> ><?php echo $row6->title_setting; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-md-2 col-sm-4 col-xs-12 padding-4">
                    <label class="label label-green  half">رقم الجوال <strong
                                class="astric">*</strong><strong></strong> </label>
                    <input type="text" onkeypress="validate_number(event)" maxlength="10" name="w_mob"
                           value="<?php echo $w_mob; ?>" id="w_mob"
                           class="form-control half input-style" data-validation="required"
                           onkeyup="check_length_num(this,10,'w_mob_span');"/>
                    <span id="w_mob_span" class="span-validation"> </span>
                </div>
            </div>
            <div class="col-sm-12 col-xs-12">
                <div class="form-group col-md-2 col-sm-4 col-xs-12 padding-4">
                    <label class="label label-green  half">الحياة العملية<strong
                                class="astric">*</strong><strong></strong> </label>
                    <select id="w_want_work" name="w_want_work"
                            class=" no-padding form-control choose-date form-control half"
                            onchange="checkJob(this.value)"
                            data-show-subtext="true" data-live-search="true" data-validation="required"
                            aria-required="true">
                        <?php $arr_job = array(1 => 'يعمل', 0 => 'لا يعمل'); ?>
                        <option value="">اختر</option>
                        <?php for ($a = 0; $a < sizeof($arr_job); $a++) {
                            $selected = "";
                            if ($w_want_work != '') {
                                if ($a == $w_want_work) {
                                    $selected = "selected";
                                }
                            } ?>
                            <option value="<?php echo $a; ?>" <?php echo $selected ?> ><?php echo $arr_job[$a]; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-md-2 col-sm-4 col-xs-12 padding-4">
                    <label class="label label-green  half"> المهنة <strong
                                class="astric">*</strong><strong></strong></label>
                    <select name="w_job_id_fk" id="w_job_id_fk"
                            class=" no-padding form-control choose-date form-control half "
                            aria-required="true" <?php if ($w_want_work != 1) { ?> disabled="disabled" <?php } ?> >
                        <option value="">اختر</option>
                        <?php
                        foreach ($job_titles as $value):
                            $selected = '';
                            if (!empty($w_job_id_fk)) {
                                if ($value->id_setting == $w_job_id_fk) {
                                    $selected = 'selected';
                                }
                            } ?>
                            <option value="<?php echo $value->id_setting; ?>" <?php echo $selected ?> ><?php echo $value->title_setting; ?></option>
                        <?php endforeach; ?>
                        <option value="0">أخري</option>
                    </select>
                </div>
                <div class="form-group col-md-2 col-sm-4 col-xs-12 padding-4">
                    <label class="label label-green  half"> إسم جهة العمل <strong
                                class="astric">*</strong><strong></strong></label>
                    <input type="text" name="employer" <?php if ($w_want_work != 1) {
                        echo 'disabled';
                    } ?> id="employer"
                           class="form-control half input-style" value="<?php echo $employer; ?>"/>
                </div>
                <div class="form-group col-md-2 col-sm-4 col-xs-12 padding-4">
                    <label class="label label-green  half"> مكان العمل <strong
                                class="astric">*</strong><strong></strong></label>
                    <input type="text" name="job_place" <?php if ($w_want_work != 1) {
                        echo 'disabled';
                    } ?> id="job_place"
                           class="form-control half input-style" value="<?php echo $job_place; ?>"/>
                </div>
                <div class="form-group col-md-2 col-sm-4 col-xs-12 padding-4">
                    <label class="label label-green  half"> هاتف العمل <strong
                                class="astric">*</strong><strong></strong></label>
                    <input type="text" name="job_mob" id="job_mob" <?php if ($w_want_work != 1) {
                        echo 'disabled';
                    } ?> onkeypress="validate_number(event)"
                           onkeyup="check_length_num(this,10,'job_mob_span');" maxlength="10"
                           class="form-control half input-style" value="<?php echo $job_mob; ?>"/>
                    <span id="job_mob_span" class="span-validation"> </span>
                </div>
                <div class="form-group col-md-2 col-sm-4 col-xs-12 padding-4">
                    <label class="label label-green  half"> الدخل الشهري <strong
                                class="astric">*</strong><strong></strong></label>
                    <input type="text" name="salary" id="salary" <?php if ($w_want_work != 1) {
                        echo 'disabled';
                    } ?> onkeypress="validate_number(event)"
                           class="form-control half input-style" value="<?php echo $salary; ?>"/>
                </div>
            </div>
            <div class="col-sm-12 col-xs-12">
                <div class="form-group col-md-2 col-sm-4 col-xs-12 padding-4">
                    <label class="label label-green  half">هل يعول<strong
                                class="astric">*</strong><strong></strong> </label>
                    <select id="guaranted" name="guaranted"
                            class=" no-padding form-control choose-date form-control half"
                            onchange="checkGuaranted(this.value)"
                            data-show-subtext="true" data-live-search="true" data-validation="required"
                            aria-required="true">
                        <?php $arr_guaranted = array(1 => 'نعم', 0 => 'لا'); ?>
                        <option value="">اختر</option>
                        <?php for ($a = 0; $a < sizeof($arr_guaranted); $a++) {
                            $selected = "";
                            if ($guaranted != '') {
                                if ($a == $guaranted) {
                                    $selected = "selected";
                                }
                            } ?>
                            <option value="<?php echo $a; ?>" <?php echo $selected ?> ><?php echo $arr_guaranted[$a]; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-md-2 col-sm-4 col-xs-12 padding-4">
                    <label class="label label-green  half">عدد الأفراد<strong
                                class="astric">*</strong><strong></strong> </label>
                    <input type="text" name="persons_num" id="persons_num"
                           onkeypress="validate_number(event)"
                        <?php if ($guaranted != 1) {
                            echo 'disabled';
                        } ?> value="<?php echo $persons_num; ?>" class="form-control half input-style"/>
                </div>
                <div class="form-group col-md-2 col-sm-4 col-xs-12 padding-4">
                    <label class="label label-green  half">صورة الهوية </label>
                    <input type="file" name="w_national_img" id="w_national_img" class="form-control half"/>
                    <?php if (!empty($w_national_img)) { ?>
                        <small class="small" style="bottom:-13px; display: none;" id="empty_img">برجاء إرفاق صورة</small>
                        <div id="full_img">
                            <table class="table table-bordered " width="10px">
                                <tr>
                                    <td style="width: 30px;">
                                        <?php $mother_num = $_SESSION['mother_national_num']; ?>
                                        <?php if(!$_SESSION['hidden_action']){ ?>
                                        <a onclick=' swal({
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
                                                delete_image_wakel(<?= $id ?>);
                                                //setTimeout(function(){window.location="<?= base_url() . 'osr/Family/DeleteImage/' . $id . '/' . $mother_num ?>";}, 500);
                                                });'>
                                            <i class="fa fa-trash"> </i></a>
                                        <?php }else{  echo "لا يمكن الحذف"; } ?>
                                    </td>
                                    <td style="width: 30px; text-align: center">
                                        <a href="<?php echo base_url() ?>uploads/images/<?php echo $w_national_img; ?>"
                                           download> <i class="fa fa-download"></i> </a>
                                    </td>
                                    <td style="width: 30px; text-align: center">
                                        <a href="#" data-toggle="modal"
                                           data-target="#myModal-view<?php echo $id; ?>"> <i
                                                    class="fa fa-eye"></i> </a></td>
                                </tr>
                            </table>
                        </div>
                    <?php } else { ?>
                        <small class="small" style="bottom:-13px;" id="empty_img">برجاء إرفاق صورة</small>
                    <?php } ?>
                </div>
                <div class="modal fade" id="myModal-view<?php echo $id; ?>" tabindex="-1" role="dialog"
                     aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">صورة الهوية</h4>
                            </div>
                            <div class="modal-body">
                                <img src="<?php echo base_url() ?>uploads/images/<?php echo $w_national_img; ?>"
                                     width="100%">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if(!$_SESSION['hidden_action']){ ?>
        <input type="hidden" name="add" value="حفظ">
        <div class="col-xs-12 no-padding">
            <div class="panel-footer">
                <div class="text-center">
                    <?php if (isset($result) && $result != null) {
                        $input_name1 = 'update';
                        $input_name2 = 'update_save';
                    } else {
                        $input_name1 = 'add';
                        $input_name2 = 'add_save';
                    }
                    ?>
                    <button type="button" id="buttons" class="btn btn-labeled btn-success " onclick="save_wakel()"
                            name="add" value="حفظ">
                        <span class="btn-label"><i class="fa fa-floppy-o"></i></span>حفظ
                    </button>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php echo form_close() ?>
    </div>
</div>
