<style>
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

    /**************************/
    /* 27-1-2019 */
    /**************************/
    /* 27-1-2019 */
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

    /*  .form-control{
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

    .tab-content {
        margin-top: 15px;
    }

    .nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus {
        color: #ff0303;
        cursor: default;
        background-color: #fff;
        border: 1px solid #ddd;
        border-bottom-color: transparent;
    }


</style>
<style>
input,select {
    pointer-events:none;
    color:#AAA;
    background:#F5F5F5;
}
</style>
<?php

if (isset($father) && $father != null) {
    $fullname = $father->full_name;
    $father_national_id = $father->f_national_id;
    $disable = "disable";
    $f_national_id = $father->f_national_id;
    $f_national_id_type = $father->f_national_id_type;//
    $f_job = $father->f_job;//
    $f_death_id_fk = $father->f_death_id_fk;//
    $f_nationality_id_fk = $father->f_nationality_id_fk;//
    $nationality_other = $father->nationality_other;
    $f_death_date = $father->f_death_date;
    $f_job_place = $father->f_job_place;
    $f_death_reason_fk = $father->f_death_reason_fk;
    $f_wive_count = $father->f_wive_count;//
    /*ahmed*/
    $f_birth_date = $father->f_birth_date;
    $f_birth_date_hijri = $father->f_birth_date_hijri;
    $f_birth_date_year = $father->f_birth_date_year;
    $f_birth_date_hijri_year = $father->f_birth_date_hijri_year;
    $f_card_source = $father->f_card_source;
    $f_child_num = $father->f_child_num;
    $f_female_num = $father->f_female_num;
    $family_members_number = $f_child_num + $f_female_num;
    /*ahmed*/
} else {
    $fullname = "";
    $father_national_id = "";
    $disable = "";
    $f_national_id_type = '';//
    $f_national_id = '';
    $f_birth_date = '';
    $f_job = "";//
    $f_death_id_fk = '';//
    if (isset($basic_data_family["male_number"])) {
        $f_child_num = $basic_data_family["male_number"];
    } else {
        $f_child_num = '';
    }   // $f_female_num ="";   $family_members_number='';
    if (isset($basic_data_family["female_number"])) {
        $f_female_num = $basic_data_family["female_number"];
    } else {
        $f_female_num = '';
    }
    if (isset($basic_data_family["family_members_number"])) {
        $family_members_number = $basic_data_family["family_members_number"];
    } else {
        $family_members_number = '';
    }
    $f_nationality_id_fk = '';//
    $nationality_other = '';
    $f_death_date = '';
    $f_job_place = '';
    $f_death_reason_fk = '';
    $f_wive_count = '';//
    /*ahmed*/
    $f_birth_date = '';
    $f_birth_date_hijri = '';
    $f_birth_date_year = '';
    $f_birth_date_hijri_year = '';
    $f_card_source = '';
    /*ahmed*/
}
?>

<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
    <div class="panel-heading">
        <h3 class="panel-title"></h3>
    </div>
    <!-- <?php echo form_open_multipart('Web/father'); ?> -->

    <div class="panel-body" style="height: 400px;">
        <div class="custom-tabs">
            <!-- Nav tabs -->
            <?php
            if ($this->uri->segment(3) == "general-detailsfa") {
                $class = "";
                $disclass = "active";

            } else {
                $class = "active";
                $disclass = "";


            }

            ?>
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="<?= $class ?>"><a href="#main-detailsfa" aria-controls="main-detailsfa"
                                                                 role="tab" data-toggle="tab">البيانات الأساسية</a></li>
                <li role="presentation" class="<?= $disclass ?>"><a href="#general-detailsfa"
                                                                    aria-controls="general-detailsfa" role="tab"
                                                                    data-toggle="tab">بيانات عامة</a></li>

            </ul>

            <!-- Tab panes -->
            <div class="tab-content">

                <div role="tabpanel" class="tab-pane fade in <?= $class ?>" id="main-detailsfa">
                    <?php echo form_open_multipart('registration/Family/father', array('id' => 'father_form', 'class' => 'father_form')); ?>
                    <div class="col-sm-12 col-xs-12">
                        <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
                            <label class="label label-green  half"> رقم السجل المدني للأب </label>
                            <input type="text" name="mother_national" data-validation="required"
                                   disabled class="form-control half input-style"
                                   value="<?php echo $father_national_id; //echo $this->uri->segment(4);  ?>"/>
                        </div>
                        <div class="form-group col-md-4 col-sm-5 col-xs-12 padding-4">
                            <label class="label label-green  half"> الاسم رباعي </label>
                            <input type="text" name="full_name"
                                   data-validation="required" class="form-control half input-style"
                                   value="<?php echo $fullname; ?>"/>
                        </div>


                        <div class="form-group col-md-2  col-sm-4 col-xs-12 padding-4">
                            <label class="label label-green  half">رقم الهوية
                            </label>
                            <input type="text" name="f_national_id" id="f_national_id"
                                   data-validation="required"
                                   onkeyup="chek_length('f_national_id')"
                                   value="<?php echo $f_national_id ?>"
                                   onkeypress="validate_number(event)"
                                   class="form-control half input-style"/>
                            <span id="f_national_id_span" class="span-validation"> </span>
                        </div>
                        <div class="form-group col-md-2  col-sm-4 col-xs-12 padding-4">
                            <label class="label label-green  half">نوع الهوية
                            </label>
                            <select name="f_national_id_type"
                                    class="selectpicker no-padding form-control choose-date form-control half"
                                    data-show-subtext="true" data-live-search="true"
                                    data-validation="required"
                                    aria-required="true">
                                <?php if (isset($nationality) && $nationality != null && !empty($nationality)) { ?>
                                    <option value="">اختر</option>
                                    <?php
                                    foreach ($national_id_array as $row2):
                                        $selected = '';
                                        if ($row2->id_setting == $f_national_id_type) {
                                            $selected = 'selected';
                                        } ?>
                                        <option
                                                value="<?php echo $row2->id_setting; ?>" <?php echo $selected ?> ><?php echo $row2->title_setting; ?></option>
                                    <?php endforeach; ?>
                                <?php } else { ?>
                                    <option value="" selected>اختر</option>
                                    <option
                                            value="<?php echo $row2->id_setting; ?>" <?php echo $selected ?> ><?php echo $row2->title_setting; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <!--ahmed-->
                        <div class="form-group col-md-2  col-sm-4 col-xs-12 padding-4">
                            <label class="label label-green  half">مصدر الهوية
                            </label>
                            <select name="f_card_source" id="f_card_source"
                                    class="selectpicker no-padding form-control choose-date form-control half"
                                    data-show-subtext="true" data-live-search="true"
                                    aria-required="true">
                                <option value="">إختر</option>
                                <?php if (!empty($id_source)) {
                                    foreach ($id_source as $record) {
                                        $select = '';
                                        if ($f_card_source == $record->id_setting) {
                                            $select = 'selected';
                                        }
                                        ?>
                                        <option
                                                value="<?php echo $record->id_setting; ?>" <?php echo $select; ?>><?php echo $record->title_setting; ?></option>
                                    <?php }
                                } ?>
                            </select>
                        </div>
                        <!--ahmed-->
                        <!--ahmed-->


                    </div>
                    <div class="col-sm-12 col-xs-12">


                        <div class="form-group col-md-2  col-sm-4 col-xs-12 padding-4">
                            <?php if (!empty($f_birth_date_hijri)) {
                                $hijri_date = explode('/', $f_birth_date_hijri);
                            } ?>
                            <label class="label label-green  half">تاريخ الميلاد هجرى </label>
                            <input class="textbox form-control" type="text" name="HDay" pattern="\d*"
                                   onkeypress="return isNumberKey(event)"
                                   onkeyup="moveOnMax(this,document.getElementById('Hmonth'))"
                                   value="<?php if (!empty($hijri_date[0])) {
                                       echo $hijri_date[0];
                                   } ?>" placeholder="يوم" id="HDay" size="20" maxlength="2"
                                   style="width: 33.33%;float: right;"/>
                            <input class="textbox form-control" type="text" name="HMonth" pattern="\d*"
                                   onkeypress="return isNumberKey(event)"
                                   onkeyup="moveOnMax(this,document.getElementById('HYear'))"
                                   value="<?php if (!empty($hijri_date[1])) {
                                       echo $hijri_date[1];
                                   } ?>" placeholder="شهر" id="Hmonth" size="20" maxlength="2"
                                   style="width: 33.33%;float: right;"/>
                            <!-- NagwA 7-7 -->
                            <input class="textbox4 form-control" type="text" name="HYear" id="HYear"
                                   pattern="\d*"
                                   onkeypress="return isNumberKey(event)"
                                   onkeyup="islToChr(this.form);getAge(); chech_year();"
                                   value="<?php if (!empty($hijri_date[2])) {
                                       echo $hijri_date[2];
                                   } ?>" placeholder="سنة" id="HYear" size="20" maxlength="4"
                                   style="width: 33.33%;float: right;"/>
                        </div>
                        <div class="form-group col-md-2  col-sm-4 col-xs-12 padding-4">
                            <?php
                            if (!empty($f_birth_date)) {
                                $gregorian_date = explode('/', $f_birth_date);
                            } ?>
                            <label class="label label-green  half">تاريخ الميلاد </label>
                            <input class="textbox form-control" type="text" name="CDay" pattern="\d*"
                                   onkeypress="return isNumberKey(event)"
                                   onkeyup="moveOnMax(this,document.getElementById('CMonth'))"
                                   placeholder="يوم" id="CDay"
                                   size="20" maxlength="2" autofocus style="width: 33.33%;float: right;"
                                   value="<?php if (!empty($gregorian_date[0])) {
                                       echo $gregorian_date[0];
                                   } ?>"/>
                            <input class="textbox form-control" type="text" name="CMonth" pattern="\d*"
                                   onkeypress="return isNumberKey(event)"
                                   onkeyup="moveOnMax(this,document.getElementById('CYear'))"
                                   placeholder="شهر" id="CMonth"
                                   size="20" maxlength="2" style="width: 33.33%;float: right;"
                                   value="<?php if (!empty($gregorian_date[1])) {
                                       echo $gregorian_date[1];
                                   } ?>"/>
                            <input class="textbox4 form-control" type="text" name="CYear" id="CYear"
                                   pattern="\d*"
                                   onkeypress="return isNumberKey(event)"
                                   onkeyup="chrToIsl(this.form);getAge();"
                                   placeholder="سنة" id="CYear" size="20" maxlength="4"
                                   style="width: 33.33%;float: right;"
                                   value="<?php if (!empty($gregorian_date[2])) {
                                       echo $gregorian_date[2];
                                   } ?>"/>
                        </div>
                        <div class="form-group col-md-2 col-sm-4 col-xs-12 padding-4">
                            <label class="label label-green  half">الجنسية
                            </label>
                            <select name="f_nationality_id_fk" id="f_nationality_id_fk"
                                    class="selectpicker no-padding form-control choose-date form-control half"
                                    data-show-subtext="true" data-live-search="true"
                                    data-validation="required"
                                    aria-required="true">
                                <?php if (isset($nationality) && $nationality != null && !empty($nationality)) { ?>
                                    <option value=" " style="display: none;" selected="selected">اختر
                                    </option>
                                    <?php if (isset($nationality) && $nationality != null && !empty($nationality)):
                                        foreach ($nationality as $one_nationality):
                                            $selected = '';
                                            if ($one_nationality->id_setting == $f_nationality_id_fk) {
                                                $selected = "selected";
                                            } ?>
                                            <option
                                                    value="<?php echo $one_nationality->id_setting ?>" <?php echo $selected ?> ><?php echo $one_nationality->title_setting; ?></option>
                                        <?php endforeach;endif; ?>
                                    <option value="0"<?php if ($f_nationality_id_fk == 0) echo "selected"; ?> >
                                        اخري
                                    </option>
                                <?php } else { ?>
                                    <option value=" " selected="selected">اختر</option>
                                    <option value="0"<?php if ($f_nationality_id_fk == 0) echo "selected"; ?> >
                                        اخري
                                    </option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-2 col-sm-4 col-xs-12 padding-4">
                            <label class="label label-green  half">اضافه جنسيه اخري</label>
                            <input type="text" name="nationality_other" id="nationality_other"
                                   value="<?php echo $nationality_other ?>"
                                   class="form-control half input-style"
                                   data-validation=""<?php if ($nationality_other == "") { ?> disabled=""<?php } ?> />
                        </div>

                        <div class="form-group col-md-4 col-sm-4 col-xs-12 padding-4">
                            <label class="label label-green  half">المهنة</label>
                            <select id="f_job" name="f_job"
                                    class="selectpicker no-padding form-control choose-date form-control half"
                                    data-show-subtext="true" data-live-search="true"
                                    aria-required="true">
                                <?php //$arr_gob=array('اختر','موظف حكومي','موظف قطاع خاص','اعمال حره','لا يعمل'); ?>
                                <option value="">اختر</option>
                                <?php foreach ($job_titles as $row) {
                                    $selected = "";
                                    if ($row->id_setting == $f_job) {
                                        $selected = "selected";
                                    } ?>
                                    <option
                                            value="<?php echo $row->id_setting; ?>" <?php echo $selected ?> ><?php echo $row->title_setting; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <!--ahmed-->
                        <div class="form-group col-md-2 col-sm-4 col-xs-12 red box"
                             style="display: none">
                            <label class="label label-green  half ">مكان العمل
                            </label>
                            <input type="text" class="form-control half input-style"
                                   value="<?php echo $f_job_place ?>"
                                   name="f_job_place"/>
                        </div>

                        <div class="form-group col-md-2 col-sm-4 col-xs-12 padding-4">
                            <label class="label label-green  half">تاريخ الوفاة هجري </label>
                            <!--
                 <input type="text" name="f_death_date"   class="form-control half input-style docs-date" value="<?php echo $f_death_date ?>" data-validation="required"   />
             -->
                           <!-- <input id="date0" name="f_death_date" type="text" size="10" maxlength="10"
                                   style="width: 80px;"
                                   class="form-control half input-style"
                                   value="<?php echo $f_death_date ?>"

                            />-->
                            <input type="text" id="date0" name="f_death_date"  id="placeholder"  class="form-control placeholder"
                                   value="<?php echo $f_death_date ?>"  placeholder="__/__/____" maxlength="10">
                        </div>

                        <div class="form-group col-md-2 col-sm-4 col-xs-12 padding-4">
                            <label class="label label-green  half">العمر عند الوفاة </label>
                            <input class="textbox2 form-control half " type="text" name="age" id="myage"
                                   id="wd"
                                   value="<?php
                                   if (!empty($current_year) && !empty($f_birth_date_hijri_year)) {
                                       echo $current_year - $f_birth_date_hijri_year;
                                   }
                                   // if(!empty($gregorian_date[2])){ echo (date('Y-m-d')-$gregorian_date[2]); }
                                   ?>" readonly/>
                            <input class="textbox2 form-control half hidden" type="number" name="wd"
                                   size="60"
                                   id="wd" readonly/>
                            <input class="textbox2 hidden" type="text" name="JD" size="60" id="JD"
                                   readonly/>
                        </div>
                        <div class="form-group col-md-2 col-sm-4 col-xs-12 padding-4">
                            <label class="label label-green  half">سبب الوفاة</label>
                            <select onchange="admSelectCheck(this);" name="f_death_id_fk"
                                    class="selectpicker no-padding form-control choose-date form-control half"
                                    data-show-subtext="" data-live-search="true">
                                <?php if (isset($arr_deth) && !empty($arr_deth)) { ?>
                                    <?php foreach ($arr_deth as $row) {
                                        $selected = "";
                                        if ($row->id_setting == $f_death_id_fk) {
                                            $selected = "selected";
                                        } ?>
                                        <option
                                                value="<?php echo $row->id_setting ?>" <?php echo $selected ?> ><?php echo $row->title_setting; ?></option>
                                    <?php }
                                ; ?>
                                    <option value="0"<?php if ($f_death_id_fk == 0) echo "selected"; ?> >
                                        اخري
                                    </option>
                                    <?php
                                } else { ?>
                                    <option value="" selected> اختر</option>
                                    <option value="0"<?php if ($f_death_id_fk == 0) echo "selected"; ?> >
                                        اخري
                                    </option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4 col-sm-4 col-xs-12 padding-4" id="admDivCheck"
                             style="display:block;">
                            <label class="label label-green  half">السبب</label>
                            <input type="text" class="form-control half input-style"
                                   value="<?php echo $f_death_reason_fk ?>" name="f_death_reason_fk"
                                   id="f_death_reason_fk" <?php if ($f_death_reason_fk == "") { ?> disabled=""<?php } ?>
                            />
                        </div>
                        <div class="form-group col-md-2 col-sm-4 col-xs-12 padding-4">
                            <label class="label label-green  half"> جوال التواصل ( الرسائل ) </label>
                            <input type="text" name="mob"
                                   readonly="readonly" class="form-control half input-style"
                                   value="<?php echo $basic_data_family["contact_mob"]; ?> خاص بـ <?php echo $basic_data_family["title_setting"]; ?> "/>
                        </div>


                    </div>
                    <div class="col-sm-12 col-xs-12">
                        <div class="form-group col-md-2 col-sm-4 col-xs-12 padding-4">
                            <label class="label label-green  half">عدد الزوجات
                            </label>

                            <input type="number" id="wife" class="form-control half input-style"
                                   value="<?php echo $f_wive_count ?>" name="f_wive_count"/>
                        </div>
                        <div class="form-group col-md-2 col-sm-4 col-xs-12 padding-4">
                            <label class="label label-green  half">عدد الذكور
                            </label>
                            <input type="text" name="male_number" id="male_number"
                                   onkeypress="validate_number(event)"
                                   onkeyup="getFamilyNumber();"
                                   value="<?php echo $f_child_num; ?>"
                                   class="form-control half input-style"/>
                        </div>
                        <div class="form-group col-md-2 col-sm-4 col-xs-12 padding-4">
                            <label class="label label-green  half">عدد الإناث
                            </label>
                            <input type="text" name="female_number" id="female_number"
                                   onkeypress="validate_number(event)"
                                   onkeyup="getFamilyNumber();"
                                   value="<?php echo $f_female_num; ?>"
                                   class="form-control half input-style"/>
                        </div>
                        <div class="form-group col-md-2 col-sm-4 col-xs-12 padding-4">
                            <label class="label label-green  half">عدد أفراد الاسرة </label>
                            <input type="text" name="family_members_number" id="family_members_number"
                                   onkeypress="validate_number(event)"
                                   readonly value="<?php echo $family_members_number; ?>"
                                   class="form-control half input-style"/>
                        </div>
                        <!--ahmed-->


                    </div>
                    <input type="hidden" name="add" value="حفظ">


                    <div class="col-xs-12 no-padding">
                        <div class="panel-footer">
                            <div class="text-center">
                                <?php if (isset($father) && $father != null) {
                                    $input_name1 = 'update';
                                    $input_name2 = 'update_save';
                                } else {
                                    $input_name1 = 'add';
                                    $input_name2 = 'add_save';
                                }
                                ?>
                                <!--
                                <button type="button" id="buttons" class="btn btn-labeled btn-success "
                                        onclick="save_father()"
                                        name="add" value="حفظ">
                                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                    والانتقال الي الشاشه الاخري
                                </button>
-->
                            </div>
                        </div>
                    </div>
                    <?php echo form_close() ?>
                </div>
                <!--onchange="Employment_check_function($(this).val())" -->
                <?php $arr_yes_no = array(1 => 'نعم', 2 => 'لا'); ?>
                <div role="tabpanel" class="tab-pane fade in <?= $disclass ?>" id="general-detailsfa">
                    <?php echo form_open_multipart('Web/father'); ?>
                    <div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12">
                        <label class="label label-green  half">هل يوجد عمالة</label>
                        <select name="f_employment_check" data-validation="required"
                                class=" no-padding form-control  form-control half"
                                data-show-subtext="true" data-live-search="true"
                        >
                            <option value="">اختر</option>
                            <?php foreach ($arr_yes_no as $key => $value) { ?>
                                <option value="<?php echo $key; ?>"

                                    <?php if (!empty($father->f_employment_check)) {
                                        if ($father->f_employment_check == $key) {
                                            echo 'selected';
                                        }
                                    } ?>


                                ><?php echo $value; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <!-- onchange="Employees_sons_check_function($(this).val())" -->
                    <div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12">
                        <label class="label label-green  half">هل يوجد أبناء موظفين </label>
                        <select name="f_employees_sons_check"
                                class=" no-padding form-control  form-control half"
                                data-show-subtext="true" data-live-search="true"
                        >
                            <option value="">اختر</option>
                            <?php foreach ($arr_yes_no as $key => $value) { ?>
                                <option value="<?php echo $key; ?>"
                                    <?php if (!empty($father->f_employees_sons_check)) {
                                        if ($father->f_employees_sons_check == $key) {
                                            echo 'selected';
                                        }
                                    } ?>><?php echo $value; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <!--  onchange="Special_needs_sons_check_function($(this).val())" -->
                    <div class="form-group col-md-3 padding-4 col-sm-4 col-xs-12">
                        <label class="label label-green  half">هل يوجد أبناء ذوى احتياجات خاصة </label>
                        <select name="f_special_needs_sons_check"
                                class=" no-padding form-control  form-control half"

                        >
                            <option value="">اختر</option>
                            <?php foreach ($arr_yes_no as $key => $value) { ?>
                                <option value="<?php echo $key; ?>"
                                    <?php if (!empty($father->f_special_needs_sons_check)) {
                                        if ($father->f_special_needs_sons_check == $key) {
                                            echo 'selected';
                                        }
                                    } ?>
                                ><?php echo $value; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-3 padding-4 col-sm-4 col-xs-12">
                        <label class="label label-green  half">هل الأسرة تستفيد من جمعيات آخرى </label>
                        <select name="f_other_associations_check"
                                class=" no-padding form-control  form-control half"
                                onchange="Other_associations_check_function($(this).val())">
                            <option value="">اختر</option>
                            <?php foreach ($arr_yes_no as $key => $value) { ?>
                                <option value="<?php echo $key; ?>"

                                    <?php if (!empty($father->f_other_associations_check)) {
                                        if ($father->f_other_associations_check == $key) {
                                            echo 'selected';
                                        }
                                    } ?>
                                ><?php echo $value; ?></option>
                            <?php } ?>
                        </select>
                    </div>


                    <div class="col-xs-12 no-padding">
                        <!-------------------------end------------------>
                        <div class="panel-footer">
                            <?php if (isset($father) && $father != null) {
                                $input_name1 = 'update';
                                $input_name2 = 'update_save';
                            } else {
                                $input_name1 = 'add';
                                $input_name2 = 'add_save';
                            }
                            ?>
                            <div class="text-center">
                                
                                <!--
                                <button type="button" id="buttons" class="btn btn-labeled btn-success "
                                        onclick="save_father()"
                                        name="add" value="حفظ">
                                                    <span class="btn-label"><i
                                                                class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                </button>-->

                            </div>
                        </div>


                    </div>

                    <?php echo form_close() ?>
                </div>
            </div>
        </div>

        <!------------------------------------>


        <br/>
        <br/>
    </div>


</div>


<script>

    function save_father() {
        // $('#registerForm').serialize(),
        var all_inputs = $(' .father_form [data-validation="required"]');
        var valid = 1;
        var text_valid = "";
        all_inputs.each(function (index, elem) {
            console.log(elem.id + $(elem).val());
            if ($(elem).val().length >= 1) {
                // valid=1;
                $(elem).css("border-color", "");
            } else {
                valid = 0;
                $(elem).css("border-color", "red");
            }
        });

        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>registration/Family/father',
            data: $('#father_form').serialize(),
            cache: false,
            beforeSend: function (xhr) {
                if (valid == 0) {
                    swal({
                        title: 'من فضلك ادخل كل الحقول ',
                        text: text_valid,
                        type: 'error',
                        confirmButtonText: 'تم'
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
                swal({
                    title: 'تم اضافة  ',
                    type: 'success',
                    confirmButtonText: 'تم'
                });
                /* var all_inputs_set = $('.father_form .form-control');

                 all_inputs_set.each(function (index, elem) {
                     console.log(elem.id + $(elem).val());
                     $(elem).val('');
                 });*/

                if (html == 1) {
                    show_tab('general-detailsfa');
                }

            }
        });
    }


</script>

<script>

    /**************ahemd*/

    function getFamilyNumber() {
        if ($('#male_number').val() > 0) {
            var males = parseInt($('#male_number').val());
        } else {
            var males = 0;
        }
        if ($('#female_number').val() > 0) {
            var females = parseInt($('#female_number').val());
        } else {
            var females = 0;
        }
        var all = males + females;
        $('#family_members_number').val(all);
    }

</script>
<!--<script type="text/javascript" src="--><?php //echo base_url() ?><!--asisst/web_asset/js/jquery-1.10.1.min.js"></script>-->
<!--<script type="text/javascript" src="--><?php //echo base_url() ?><!--asisst/web_asset/js/jquery.mask.min.js"></script>-->

<script type="text/javascript">
    // $(document).ready(function () {
    get_date_mask();
        // $("#date0").mask("99/99/9999");
        // $("#date1").mask("99/99/9999", {placeholder: 'dd/mm/yyyy'});
    // });
</script>

<script>
    $(document).ready(function () {
        $("#f_job").change(function () {
            var color = $(this).val();
            if (color == "1") {
                $(".box").not(".1").hide();
                $(".red").show();
            } else if (color == "2") {
                $(".box").not(".2").hide();
                $(".red").show();
            } else {
                $(".box").hide();
            }
        });
    });
</script>
<script>
    function admSelectCheck(nameSelect) {
        //alert($(nameSelect).val());
        if ($(nameSelect).val() == 0) {
            document.getElementById("f_death_reason_fk").removeAttribute("disabled", "disabled");
        } else {
            document.getElementById("f_death_reason_fk").setAttribute("disabled", "disabled");
        }
    }

   /* document.getElementById("fww_nationality_id_fk").onchange = function () {
        if (this.value > 0)
            document.getElementById("nationality_other").removeAttribute("disabled", "disabled");
        else {
            document.getElementById("nationality_other").setAttribute("disabled", "disabled");
            $("#nationality_other").val("");
        }
    };*/
</script>
<script>
    function valid() {
        if ($("#f_national_id").val().length > 10) {
            document.getElementById('validate1').style.color = '#00FF00';
            document.getElementById('validate1').innerHTML = '';
        } else {
            document.getElementById('validate1').style.color = '#F00';
            document.getElementById('validate1').innerHTML = 'رقم الهوية من عشر أرقام';
        }
    }
</script>
<script>
    document.getElementById('f_nationality_id_fk').onchange = function () {
        var x = $(this).val();
        if (x == 0) {
            document.getElementById("nationality_other").removeAttribute("disabled", "disabled");
        } else {
            document.getElementById("nationality_other").setAttribute("disabled", "disabled");
        }
    }
</script>
<script>
   /* document.getElementById('f_death_id_fk').onchange = function () {
        var x = $(this).val();
        if (x == 0) {
            document.getElementById("f_death_reason_fk").removeAttribute("disabled", "disabled");
        } else {
            document.getElementById("f_death_reason_fk").setAttribute("disabled", "disabled");
        }
    }*/
</script>
<script>
    document.getElementById('wife').onkeyup = function () {
        var x = $(this).val();
        if (x < 1) {
            alert("الادخال خاطىء");
            $(this).val(" ");
        }
    }
</script>


<script>


/*    setInterval(function () {


        var valu = $('#date0').val();

        var str = valu;
        var res = str.split("/");
        var HYear = $('#HYear').val();
        var cou = res[2] - HYear;
        $('#myage').val(cou);
    }, 1000);*/
</script>


<script>


    function Other_associations_check_function(valu) {

        if (valu == 1) {

            // $('#other_associations').show();

            // document.getElementById("other_associations_fieldset").removeAttribute("disabled", "disabled");

        } else {
            // document.getElementById("other_associations_fieldset").setAttribute("disabled", "disabled");

            // $('#other_associations').hide();

        }

    }


</script>


<script>
    function chech_year() {

        var year = $('#HYear').val();
        var nowyear =<?php echo $current_year; ?>;
        if (year >= nowyear) {
            $('#HYear').val('');
            $('#CYear').val('');
            $('#HMonth').val('');
            $('#CMonth').val('');
            $('#HDay').val('');
            $('#CDay').val('');
            // alret('تاريح اليوم اكبر من تاريخ الميلاد!!')
        }
    }
</script>


