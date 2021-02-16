<style>
    .header_h5 {
        text-align: center;
        background-color: #5f9007;
        padding: 10px;
        color: #fff;
    }
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
    .form-group col-md-2 padding-4 {
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
if (isset($result) && !empty($result)) {
    $member_full_name = $result[0]->member_full_name;
    $member_status = $result[0]->member_status;
    $member_birth_date = $result[0]->member_birth_date;
    $member_birth_date_hijri = $result[0]->member_birth_date_hijri;
    $member_gender = $result[0]->member_gender;
    $member_card_num = $result[0]->member_card_num;
    $member_card_type = $result[0]->member_card_type;
    $school_id_fk = $result[0]->school_id_fk;
    $member_skill = $result[0]->member_skill;
    $education_type_result = $result[0]->education_type;
    $member_email = $result[0]->member_email;
    $stage_id_fk = $result[0]->stage_id_fk;
    $class_id_fk = $result[0]->class_id_fk;
    $school_cost = $result[0]->school_cost;
    $member_mob = $result[0]->member_mob;
    $member_distracted_mother = $result[0]->member_distracted_mother;
    $member_hij = $result[0]->member_hij;
    $member_omra = $result[0]->member_omra;
    $member_home_type = $result[0]->member_home_type;
    $member_month_money = $result[0]->member_month_money;
    $member_job = $result[0]->member_job;
    $member_job_place = $result[0]->member_job_place;
    $member_activity_type = $result[0]->member_activity_type;
    $member_account = $result[0]->member_account;
    $member_account_id = $result[0]->member_account_id;
    $courses_details = $result[0]->courses_details;
    $personal_character_id_fk = $result[0]->personal_character_id_fk;
    $relation_with_family = $result[0]->relation_with_family;
    $bank_account_num = $result[0]->bank_account_num;
    $member_disease_id_fk = $result[0]->member_disease_id_fk;
    $member_disability_id_fk = $result[0]->member_disability_id_fk;
    $member_dis_date_ar = $result[0]->member_dis_date_ar;
    $member_dis_response_status = $result[0]->member_dis_response_status;
    $member_dis_status = $result[0]->member_dis_status;
    $member_dis_reason = $result[0]->member_dis_reason;
    $member_specialization = $result[0]->member_specialization;
    $school_title = $result[0]->school_title;
    if ($member_activity_type == 0) {
        echo '
<script>
    document.getElementById("activity_type_other").removeAttribute("disabled", "disabled");
    document.getElementById("activity_type_other").setAttribute("data-validation", "required");
</script>';
    } else {
        echo '
<script>
    document.getElementById("activity_type_other").setAttribute("disabled", "disabled");
</script>';
    }
    $member_activity_type_other = $result[0]->member_activity_type_other;
    $member_nationality = $result[0]->member_nationality;
    if ($member_nationality == 0) {
        echo '
<script>
    document.getElementById("nationality_other").removeAttribute("disabled", "disabled");
    document.getElementById("nationality_other").setAttribute("data-validation", "required");
</script>';
    } else {
        echo '
<script>
    document.getElementById("nationality_other").setAttribute("disabled", "disabled");
</script>';
    }
    $nationality_other = $result[0]->nationality_other;
    $member_health_type = $result[0]->member_health_type;
    if ($member_health_type == 0) {
        echo '
<script>
  
   
</script>';
    } else {
        echo '
<script>
   
    </script>';
    }
    $member_health_type_other = $result[0]->member_health_type_other;
    $member_birth_card_img = $result[0]->member_birth_card_img;
    $member_photo = $result[0]->member_photo;
    $id = $result[0]->id;
    $member_sechool_img = $result[0]->member_sechool_img;
    $button = 'update';
    $member_birth_date_hijri_year = $result[0]->member_birth_date_hijri_year;
    $member_relationship = $result[0]->member_relationship;
    $member_card_source = $result[0]->member_card_source;
    $member_study_case = $result[0]->member_study_case;
    $member_academic_achievement_level = $result[0]->member_academic_achievement_level;
    $member_person_type = $result[0]->member_person_type;
    $member_education_level = $result[0]->member_education_level;
    $member_house_check = $result[0]->member_house_check;
    $member_house_id_fk = $result[0]->member_house_id_fk;
    $categoriey_member = $result[0]->categoriey_member;
    $guaranteed_member = $result[0]->guaranteed_member;
    $member_dar_markz_check = $result[0]->member_dar_markz_check;
    $member_dar_markz_id_fk = $result[0]->member_dar_markz_id_fk;
    $halt_elmostafid_member = $result[0]->persons_status;
    $member_gender = $result[0]->member_gender;
} else {
    $member_house_check = '';
    $member_gender = "";
    $member_house_id_fk = '';
    $member_full_name = '';
    $member_status = '';
    $member_birth_date = '';
    $member_birth_date_hijri = '';
    $member_card_num = '';
    $member_card_type = '';
    $school_id_fk = '';
    $member_skill = '';
    $education_type_result = '';
    $member_email = '';
    $stage_id_fk = '';
    $class_id_fk = '';
    $member_job = "";
    $school_cost = '';
    if (isset($mothers_data[0]->m_mob) and $mothers_data[0]->m_mob != null) {
        $member_mob = $mothers_data[0]->m_mob;
    } else {
        $member_mob = '';
    }
    $member_distracted_mother = '';
    $member_hij = '';
    $member_omra = '';
    $member_home_type = '';
    $member_month_money = 0;
    $member_job_place = '';
    $member_activity_type = '';
    $member_activity_type_other = '';
    $member_nationality = '';
    $nationality_other = '';
    $member_health_type = '';
    $member_health_type_other = '';
    $member_birth_card_img = '';
    $id = '';
    $member_sechool_img = '';
    $member_account = '';
    $member_account_id = '';
    $member_photo = "";
    $bank_account_num = '';
    $member_disease_id_fk = '';
    $member_disability_id_fk = '';
    $member_dis_date_ar = '';
    $member_dis_response_status = '';
    $member_dis_status = '';
    $member_dis_reason = '';
    $halt_elmostafid_member = '';
    $courses_details = '';
    $personal_character_id_fk = "";
    $relation_with_family = "";
    $button = 'add';
    $member_birth_date_hijri_year = '';
    $member_relationship = '';
    $member_card_source = '';
    $member_study_case = '';
    $member_academic_achievement_level = '';
    $member_person_type = '';
    $member_education_level = '';
    $categoriey_member = '';
    $guaranteed_member = '';
    $member_dar_markz_check = '';
    $member_dar_markz_id_fk = '';
    $member_specialization = "";
    $school_title = "";
}
?>

<div class="col-sm-12">
<!--    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">-->
    <?php if(!$_SESSION['hidden_action']){ ?>
     <div class="col-sm-12 col-md-12 col-xs-12 fadeInUp wow">
         <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    اضافه افراد الاسره
                </h3>
            </div>
            <div class="panel-body">
            <?php $yes_no = array('', 'نعم', 'لا'); ?>
            
            <div class="custom-tabs">
                <?php
                if ($this->uri->segment(4) == "tab1") {
                    $class = "";
                    $class1 = "active";
                    $class2 = "";
                    $class3 = "";
                    $class4 = "";
                    $class5 = "";
                } else if ($this->uri->segment(4) == "contact-details-c") {
                    $class = "";
                    $class1 = "";
                    $class2 = "active";
                    $class3 = "";
                    $class4 = "";
                    $class5 = "";
                } else if ($this->uri->segment(4) == "health-details-c") {
                    $class = "";
                    $class1 = "";
                    $class2 = "";
                    $class3 = "active";
                    $class4 = "";
                    $class5 = "";
                } else if ($this->uri->segment(4) == "education-details-c") {
                    $class = "";
                    $class1 = "";
                    $class2 = "";
                    $class3 = "";
                    $class4 = "active";
                    $class5 = "";
                } else if ($this->uri->segment(4) == "skills-details-c") {
                    $class = "";
                    $class1 = "";
                    $class2 = "";
                    $class3 = "";
                    $class4 = "";
                    $class5 = "active";
                } else {
                    $class = "active";
                    $class1 = "";
                    $class2 = "";
                    $class3 = "";
                    $class4 = "";
                    $class5 = "";
                }
                ?>
                <ul class="nav nav-tabs">
                    <li class="<?= $class ?>"><a href="#tab1" data-toggle="tab">البيانات الشخصية</a></li>
                    <?php
                    if (isset($result) && !empty($result)) { ?>
                        <li class="<?= $class1 ?>"><a href="#contact-details-c" data-toggle="tab">بيانات
                                التواصل</a></li>
                        <li class="<?= $class2 ?>"><a href="#health-details-c" data-toggle="tab">البيانات
                                الصحية</a></li>
                        <li class="<?= $class3 ?>"><a href="#education-details-c" data-toggle="tab">البيانات
                                العلمية والعملية</a></li>
                        <li class="<?= $class4 ?>"><a href="#skills-details-c" data-toggle="tab">الدورات
                                والمهارات</a></li>
                        <li class="<?= $class5 ?>"><a href="#tab4" data-toggle="tab">بيانات أخري</a></li>
                    <?php } ?>
                </ul>
                
                <div class="tab-content">
                    <div class="tab-pane fade in <?= $class ?>" id="tab1">
                        <?php
                        if (isset($result) && !empty($result)) {
                            echo form_open_multipart('osr/Family/update_family_members/' . $id . '/tab1');
                            $action = " تعديل والانتقال الي الشاشه الاخري";
                            echo '<input type="hidden"  name="update"  id="update" value="update">';
                        } else {
                            $action = "حفظ";
                            $onclick = "save_family_members('tab1');";
                            echo form_open_multipart('osr/Family/family_members/' . $mother_national_num);
                            echo '<input type="hidden"  name="add"  id="add" value="add">';
                        }
                        ?>
                        <div class="panel-body">
                            <div class="col-sm-12 col-xs-12">
                                <div class="form-group col-md-2 padding-4  col-sm-4 col-xs-12">
                                    <label class="label label-green  half"> رقم السجل المدني للأب <strong
                                                class="astric">*</strong>
                                    </label>
                                    <input type="number" class="form-control half input-style"
                                           value="<?php if (!empty($father_national_card)) {
                                               echo $father_national_card;
                                           } ?>" readonly="readonly"/>
                                </div>
                                <div class="form-group col-md-3 padding-4  col-sm-4">
                                    <label class="label label-green  half"> إسم الأب <strong class="astric">*</strong>
                                    </label>
                                    <input type="text" name="father_name"
                                           class="form-control half input-style"
                                           value="       <?php if (isset($father_table[0]->full_name) && $father_table[0]->full_name != null) {
                                               echo $father_table[0]->full_name;
                                           } ?>" readonly="readonly"/>
                                </div>
                                <div class="form-group col-md-2 padding-4  col-sm-4">
                                    <label class="label label-green  half">الاسم <strong
                                                class="astric">*</strong>
                                    </label>
                                    <input type="text" class=" some_class_2 form-control half input-style"
                                           name="member_full_name"
                                           data-validation="required"
                                           value="<?php echo $member_full_name; ?>">
                                </div>
                                <div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12">
                                    <label class="label label-green  half">رقم الهوية<strong
                                                class="astric">*</strong><strong></strong>
                                    </label>
                                    <input type="text" name="member_card_num" id="member_card_num"
                                           data-validation="required"
                                           onkeyup="check_length_num(this,'10','member_card_num_span')"
                                           maxlength="10"
                                           value="<?php echo $member_card_num ?>"
                                           onkeypress="validate_number(event)"
                                           class="form-control half input-style"/>
                                    <span id="member_card_num_span" class="span-validation"> </span>
                                </div>
                                <div class="form-group col-md-2 padding-4 col-sm-4">
                                    <label class="label label-green  half"> نوع الهوية<strong
                                                class="astric">*</strong>
                                    </label>
                                    <select name="member_card_type" class="form-control half selectpicker "
                                            data-show-subtext="true"
                                            data-live-search="true">
                                        <option value="">اختر</option>
                                        <?php foreach ($national_num_type as $one) {
                                            $select = '';
                                            if (!empty($member_card_type)) {
                                                $select = '';
                                                if ($one->id_setting == $member_card_type) {
                                                    $select = 'selected';
                                                }
                                            } ?>
                                            <option value="<?php echo $one->id_setting; ?>"
                                                <?php echo $select; ?> > <?php echo $one->title_setting; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-1 padding-4 col-sm-4 col-xs-12">
                                    <label class="label label-green  half">مصدر الهوية<strong
                                                class="astric">*</strong><strong></strong>
                                    </label>
                                    <select name="member_card_source" id="member_card_source"
                                            class="selectpicker no-padding form-control choose-date form-control half"
                                            data-show-subtext="true" data-live-search="true"
                                            data-validation="required"
                                            aria-required="true">
                                        <option value="">إختر</option>
                                        <?php if (!empty($id_source)) {
                                            foreach ($id_source as $record) {
                                                $select = '';
                                                if ($member_card_source == $record->id_setting) {
                                                    $select = 'selected';
                                                }
                                                ?>
                                                <option value="<?php echo $record->id_setting; ?>"
                                                    <?php echo $select; ?>><?php echo $record->title_setting; ?></option>
                                            <?php }
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-2 padding-4  col-sm-4 col-xs-12">
                                    <?php if (!empty($member_birth_date_hijri)) {
                                        $hijri_date = explode('/', $member_birth_date_hijri);
                                    } ?>
                                    <label class="label label-green  half">تاريخ الميلاد هجرى<strong
                                                class="astric">*</strong> </label>
                                    <input class="textbox form-control" type="text" name="HDay"
                                           pattern="\d*"
                                           onkeypress="return isNumberKey(event)"
                                           onkeyup="moveOnMax(this,document.getElementById('Hmonth'))"
                                           value="<?php if (!empty($hijri_date[0])) {
                                               echo $hijri_date[0];
                                           } ?>" placeholder="يوم" id="HDay"
                                           size="20" maxlength="2" style="width: 33.33%;float: right;"/>
                                    <input class="textbox form-control" type="text" name="HMonth"
                                           pattern="\d*"
                                           onkeypress="return isNumberKey(event)"
                                           onkeyup="moveOnMax(this,document.getElementById('HYear'))"
                                           value="<?php if (!empty($hijri_date[1])) {
                                               echo $hijri_date[1];
                                           } ?>" placeholder="شهر"
                                           id="Hmonth" size="20" maxlength="2"
                                           style="width: 33.33%;float: right;"/>
                                    <input class="textbox4 form-control" type="text" name="HYear"
                                           pattern="\d*"
                                           onkeypress="return isNumberKey(event)" onkeyup="islToChr(this.form);
   getAge();chech_year();"
                                           value="<?php if (!empty($hijri_date[2])) {
                                               echo $hijri_date[2];
                                           } ?>" placeholder="سنة"
                                           id="HYear" size="20" maxlength="4"
                                           style="width: 33.33%;float: right;"/>
                                </div>
                                <div class="form-group col-md-2 padding-4  col-sm-4 col-xs-12">
                                    <?php if (!empty($member_birth_date)) {
                                        $gregorian_date = explode('/', $member_birth_date);
                                    } ?>
                                    <label class="label label-green  half">تاريخ الميلاد<strong
                                                class="astric">*</strong> </label>
                                    <input class="textbox form-control" type="text" name="CDay"
                                           pattern="\d*"
                                           onkeypress="return isNumberKey(event)"
                                           onkeyup="moveOnMax(this,document.getElementById('CMonth'))"
                                           placeholder="يوم"
                                           id="CDay"
                                           size="20" maxlength="2" autofocus
                                           style="width: 33.33%;float: right;"
                                           value="<?php if (!empty($gregorian_date[0])) {
                                               echo $gregorian_date[0];
                                           } ?>"/>
                                    <input class="textbox form-control" type="text" name="CMonth"
                                           pattern="\d*"
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
                                <div class="form-group col-md-1 padding-4  col-sm-4 col-xs-12">
                                    <label class="label label-green  half">العمر<strong
                                                class="astric">*</strong><strong></strong>
                                    </label>
                                    <input class="textbox2 form-control half " type="text" name="age"
                                           id="myage" size="60" id="wd" readonly
                                           value="<?php if (!empty($hijri_date)) {
                                               echo($my_current_hjri_year - $hijri_date[2]);
                                           } ?>"/>
                                    <input class="textbox2 form-control half hidden" type="number" name="wd"
                                           size="60"
                                           id="wd"
                                           readonly/>
                                    <input class="textbox2 hidden" type="text" name="JD" size="60" id="JD"
                                           readonly/>
                                </div>
                                <div class="form-group col-md-1 padding-4  col-sm-4 col-xs-12">
                                    <label class="label label-green  half">الصلة<strong
                                                class="astric">*</strong><strong></strong>
                                    </label>
                                    <select name="member_relationship" id="member_relationship"
                                            data-validation="required"
                                            aria-required="true"
                                            class="selectpicker no-padding form-control choose-date form-control half">
                                        <option value="">إختر</option>
                                        <?php if (!empty($relationships)) {
                                            foreach ($relationships as $record) {
                                                $select = '';
                                                if ($member_relationship == $record->id_setting) {
                                                    $select = 'selected';
                                                }
                                                ?>
                                                <option value="<?php echo $record->id_setting; ?>"
                                                    <?php echo $select; ?>><?php echo $record->title_setting; ?></option>
                                            <?php }
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-2 padding-4  col-sm-4">
                                    <label class="label label-green  half">الحالة الإجتماعية <strong
                                                class="astric">*</strong> </label>
                                    <select name="member_status" class="form-control half selectpicker "
                                            data-show-subtext="true"
                                            data-live-search="true">
                                        <option value="">اختر</option>
                                        <?php ?>
                                        <?php foreach ($scocial as $row_sco): $select = '';
                                            if (!empty($member_status)) {
                                                if ($member_status == $row_sco->
                                                    id_setting) {
                                                    $select = 'selected';
                                                }
                                            } ?>
                                            <option value="<?php echo $row_sco->id_setting ?>"
                                                <?php echo $select; ?>><?php echo $row_sco->title_setting; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-1 padding-4  col-sm-4">
                                    <label class="label label-green  half"> الجنس <strong
                                                class="astric">*</strong>
                                    </label>
                                    <select name="member_gender" class="form-control half selectpicker "
                                            data-show-subtext="true"
                                            data-live-search="true" data-validation="required"
                                            aria-required="true">
                                        <?php $gender_arr = array('', 'ذكر', 'أنثى'); ?>
                                        <option value="">اختر</option>
                                        <?php for ($a = 1; $a < sizeof($gender_arr); $a++) {
                                            $select = '';
                                            if ($a == $member_gender) {
                                                $select = 'selected';
                                            } ?>
                                            <option value="<?php echo $a; ?>"
                                                <?php echo $select; ?>><?php echo $gender_arr[$a]; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-1 padding-4  col-sm-4">
                                    <label class="label label-green  half">الجنسية <strong
                                                class="astric">*</strong></label>
                                    <select class="form-control half selectpicker " data-show-subtext="true"
                                            data-live-search="true"
                                            name="member_nationality" id="member_nationality">
                                        <option value="">اختر</option>
                                        <?php if (isset($nationalities) && $nationalities != null):
                                            foreach ($nationalities as $one_nationality):
                                                $select = '';
                                                if (!empty($member_nationality)) {
                                                    if ($one_nationality->id_setting ==
                                                        $member_nationality) {
                                                        $select = 'selected';
                                                    }
                                                }
                                                ?>
                                                <option value="<?php echo $one_nationality->id_setting; ?>"
                                                    <?php echo $select; ?>><?php echo $one_nationality->title_setting; ?> </option>
                                            <?php endforeach;endif; ?>
                                        <?php if ($member_nationality != '' && !empty($member_nationality)) {
                                            if ($member_nationality == 0) { ?>
                                                <option value="0" selected>أخري</option>
                                            <?php } else { ?>
                                                <option value="0">أخري</option>
                                            <?php }
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-2 padding-4  col-sm-4">
                                    <label class="label label-green  half"> جنسيةأخري<strong class="astric">*</strong>
                                    </label>
                                    <input type="text" name="nationality_other" class="form-control half"
                                           placeholder="أخري"
                                           id="nationality_other"
                                           value="<?php echo $nationality_other; ?>"/>
                                </div>
                            </div>
                            <div class="col-sm-12 col-xs-12">
                                <div class="form-group col-md-2 padding-4  col-sm-4">
                                    <label class="label label-green  half">السكن <strong
                                                class="astric">*</strong></label>
                                    <select class="form-control half selectpicker " data-show-subtext="true"
                                            data-live-search="true"
                                            name="member_home_type">
                                        <option value="">اختر</option>
                                        <?php
                                        foreach ($member_home_type_arr as $a) {
                                            $select = '';
                                            if (!empty($member_home_type)) {
                                                if ($a->
                                                    id_setting == $member_home_type) {
                                                    $select = 'selected';
                                                }
                                            } ?>
                                            <option value="<?php echo $a->id_setting; ?>"
                                                <?php echo $select; ?>><?php echo $a->title_setting; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-2 padding-4  col-sm-4 col-xs-12">
                                    <label class="label label-green  half">طبيعة الفرد<strong
                                                class="astric">*</strong><strong></strong>
                                    </label>
                                    <select name="member_person_type"
                                            class="selectpicker no-padding form-control choose-date form-control half"
                                            data-show-subtext="true" data-live-search="true"
                                            aria-required="true">
                                        <option value="">اختر</option>
                                        <?php
                                        foreach ($person_type as $row2):
                                            $selected = '';
                                            if ($row2->id_setting == $member_person_type) {
                                                $selected = 'selected';
                                            } ?>
                                            <option
                                                    value="<?php echo $row2->id_setting; ?>"
                                                <?php echo $selected ?> ><?php echo $row2->title_setting; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-2 padding-4  col-sm-4 col-xs-12">
                                    <label class="label label-green  half">التصنيف<strong
                                                class="astric">*</strong><strong></strong>
                                    </label>
                                    <select name="categoriey_member"
                                            class="selectpicker no-padding form-control choose-date form-control half"
                                            data-show-subtext="true" data-live-search="true"
                                            aria-required="true">
                                        <?php $categories = array(2 => 'يتيم', 3 => 'مستفيد بالغ ', 4 => "إخرى"); ?>
                                        <option value="">إختر</option>
                                        <?php foreach ($categories as $key => $value) {
                                            $select = '';
                                            if ($categoriey_member == $key) {
                                                $select = 'selected';
                                            } ?>
                                            <option value="<?php echo $key; ?>"
                                                <?php echo $select; ?>><?php echo $value; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-2 padding-4  col-sm-4">
                                    <label class="label label-green  half">الصورة الشخصية </label>
                                    <input type="file" name="member_photo" id="member_photo" class="form-control half"/>
                                    <small class="small" style="bottom:-13px;">
                                        <?php if (!empty($member_photo)) { ?>
                                            <a href="<?php echo base_url() ?>uploads/images/<?php echo $member_photo; ?>"
                                               download> <i class="fa fa-download"></i> </a>
                                            <a href="#" data-toggle="modal"
                                               data-target="#myModal-member_photo-<?php echo $id; ?>"> <i
                                                        class="fa fa-eye"></i> </a>
                                        <?php } ?>
                                        برجاء إرفاق صورة
                                    </small>
                                </div>
                                <div class="modal fade" id="myModal-member_photo-<?php echo $id; ?>"
                                     tabindex="-1"
                                     role="dialog"
                                     aria-labelledby="myModalLabel">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close"><span
                                                            aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">الصورة
                                                    الشخصية</h4>
                                            </div>
                                            <div class="modal-body">
                                                <img src="<?php echo base_url() ?>uploads/images/<?php echo $member_photo; ?>"
                                                     width="100%">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default"
                                                        data-dismiss="modal">
                                                    إغلاق
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="myModal-view<?php echo $id; ?>" tabindex="-1"
                                     role="dialog"
                                     aria-labelledby="myModalLabel">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close"><span
                                                            aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">شهادة الميلاد</h4>
                                            </div>
                                            <div class="modal-body">
                                                <img src="<?php echo base_url() ?>uploads/images/<?php echo $member_birth_card_img; ?>"
                                                     width="100%">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default"
                                                        data-dismiss="modal">
                                                    إغلاق
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 no-padding" style="padding: 10px;">
                                    <div class="panel-footer">
                                        <div class="text-center">
                                            <input type="hidden" name="max" id="max"/>
                                            <button type="submit" id="buttons"
                                                    class="btn btn-labeled btn-success
                                            "
                                                    name="<?php echo $button; ?>"
                                                    value="<?php echo $button; ?>">
                                            <span class="btn-label"><i
                                                        class="fa fa-floppy-o"></i></span><?= $action ?>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <?php echo form_close() ?>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade in <?= $class1 ?>" id="contact-details-c">
                        <?php
                        if (isset($result) && !empty($result)) {
                            echo form_open_multipart('osr/Family/update_family_members/' . $id . '/contact-details-c', array('class' => 'family_members_form'));
                            $span = "";
                            $disabel = "";
                            $onclick = "update_family_members(" . $id . ",'contact-details-c');";
                        } else {
                            $disabel = "disabled";
                            echo form_open_multipart('osr/Family/family_members/' . $mother_national_num, array('class' => 'family_members_form'));
                            $span = "<span  class='label-danger'> عذرا...  لا يمكنك إضافة البيانات   قبل البيانات الشخصية</span>";
                        }
                        ?>
                        <div class="form-group col-md-2 padding-4  col-sm-4">
                            <label class="label label-green  half">رقم الجوال <strong
                                        class="astric">*</strong></label>
                            <input type="text" name="member_mob" id="member_mob"
                                   onkeyup="check_length_num(this,'10','member_mob_span')" maxlength="10"
                                   onkeypress="validate_number(event);"
                                   class="form-control half input-style"
                                   placeholder="رقم الجوال " value="<?php echo $member_mob; ?>"/>
                            <span id="member_mob_span" class="span-validation"> </span>
                        </div>
                        <div class="form-group col-md-2 padding-4  col-sm-4">
                            <label class="label label-green  half">البريد الإلكترونى </label>
                            <input type="email" name="member_email" class="form-control half input-style"
                                   placeholder="البريد الإلكترونى"
                                   value="<?php echo $member_email; ?>"/>
                        </div>
                        <div class="col-xs-12 no-padding" style="padding: 10px;">
                            <div class="panel-footer">
                                <div class="text-center">
                                    <input type="hidden" name="max" id="max"/>
                                    <button type="button" id="buttons"
                                            class="btn btn-labeled btn-success " <?= $disabel ?>
                                            name="<?php echo $button; ?>"
                                            value="<?php echo $button; ?>" onclick=<?= $onclick ?>>
                                            <span class="btn-label">
                                                <i class="fa fa-floppy-o"></i>
                                            </span>حفظ والانتقال الي الشاشه الاخري
                                    </button>
                                    <?= $span ?>
                                </div>
                            </div>
                        </div>
                        <?php echo form_close() ?>
                    </div>
                    <div class="tab-pane fade in <?= $class2 ?>" id="health-details-c">
                        <?php
                        if (isset($result) && !empty($result)) {
                            echo form_open_multipart('Weosr/Familyb/update_family_members/' . $id . '/health-details-c', array('class' => 'family_members_form'));
                            $disabel = "";
                            $span = "";
                            $onclick = "update_family_members(" . $id . ",'health-details-c');";
                        } else {
                            $disabel = "disabled";
                            echo form_open_multipart('osr/Family/family_members/' . $mother_national_num, array('class' => 'family_members_form'));
                            $span = "<span  class='label-danger'> عذرا...  لا يمكنك إضافة البيانات   قبل البيانات الشخصية</span>";
                        }
                        ?>
                        <div class="panel-body">
                            <div class="col-sm-12 col-xs-12">
                                <div class="form-group col-md-2 padding-4  col-sm-4">
                                    <label class="label label-green  half">الحالة الصحية<strong
                                                class="astric">*</strong><strong></strong> </label>
                                    <select name="member_health_type" id="health_state" onchange="check()"
                                            class=" no-padding form-control choose-date form-control half">
                                        <option value="">اختر</option>
                                        <option value="disease"
                                                <?php if ($member_health_type == 'disease'){ ?>selected <?php } ?> >
                                            مريض
                                        </option>
                                        <option value="disability"
                                                <?php if ($member_health_type == 'disability'){ ?>selected <?php } ?>>
                                            معاق
                                        </option>
                                        <option value="good"
                                                <?php if ($member_health_type == 'good'){ ?>selected <?php } ?> >
                                            (سليم)
                                        </option>
                                        <?php
                                        foreach ($health_status_array as $row3):
                                            $selected = '';
                                            if ($row3->id_setting == $member_health_type) {
                                                $selected = 'selected';
                                            } ?>
                                            <option value="<?php echo $row3->id_setting; ?>"
                                                <?php echo $selected ?> ><?php echo $row3->title_setting; ?></option>
                                        <?php endforeach; ?>
                                        
                                    </select>
                                </div>
                                <div class="form-group col-md-2 padding-4  col-sm-4 col-xs-12">
                                    <label class="label label-green  half">نوع المرض<strong
                                                class="astric">*</strong><strong></strong>
                                    </label>
                                    <select name="member_disease_id_fk" id="member_disease_id_fk"
                                            class=" no-padding form-control choose-date form-control half"
                                            aria-required="true" <?php if ($member_health_type != 'disease') {
                                        echo 'disabled=""';
                                    } ?> >
                                        <option value="">اختر</option>
                                        <?php
                                        foreach ($diseases as $row3):
                                            $selected = '';
                                            if ($row3->id_setting == $member_disease_id_fk) {
                                                $selected = 'selected';
                                            } ?>
                                            <option value="<?php echo $row3->id_setting; ?>"
                                                <?php echo $selected ?> >
                                                <?php echo $row3->title_setting; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-2 padding-4  col-sm-4 col-xs-12">
                                    <label class="label label-green  half">نوع الإعاقة<strong
                                                class="astric">*</strong><strong></strong>
                                    </label>
                                    <select name="member_disability_id_fk" id="member_disability_id_fk"
                                            class=" no-padding form-control choose-date form-control half"
                                            aria-required="true"
                                        <?php if ($member_health_type != 'disability') {
                                            echo 'disabled="disabled"';
                                        } ?> >
                                        <option value="">اختر</option>
                                        <?php
                                        foreach ($diseases as $row3):
                                            $selected = '';
                                            if ($row3->id_setting == $member_disability_id_fk) {
                                                $selected = 'selected';
                                            } ?>
                                            <option value="<?php echo $row3->id_setting; ?>"
                                                <?php echo $selected ?> ><?php echo $row3->title_setting; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-3 padding-4  col-sm-4 col-xs-12">
                                    <label class="label label-green  half">جهة المتابعة المرض/الإعاقة
                                        <strong
                                                class="astric">*</strong><strong></strong> </label>
                                    <select name="member_dis_response_status"
                                            id="member_dis_response_status"
                                            class=" no-padding form-control choose-date form-control half"
                                        <?php if ($member_health_type == 'good') {
                                            echo 'disabled="disabled"';
                                        } ?>>
                                        <option value="">اختر</option>
                                        <?php
                                        foreach ($responses as $row3):
                                            $selected = '';
                                            if ($row3->id_setting == $member_dis_response_status) {
                                                $selected = 'selected';
                                            } ?>
                                            <option value="<?php echo $row3->id_setting; ?>"
                                                <?php echo $selected ?> >
                                                <?php echo $row3->title_setting; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-3 padding-4  col-sm-4 col-xs-12">
                                    <label class="label label-green  half">وضع الحالة المرض/الإعاقة <strong
                                                class="astric">*</strong><strong></strong> </label>
                                    <select name="member_dis_status" id="member_dis_status"
                                            class=" no-padding form-control choose-date form-control half"
                                        <?php if ($member_health_type == 'good') {
                                            echo 'disabled="disabled"';
                                        } ?>
                                    >
                                        <option value="">اختر</option>
                                        <?php
                                        foreach ($diseases_status as $row3):
                                            $selected = '';
                                            if ($row3->id_setting == $member_dis_status) {
                                                $selected = 'selected';
                                            } ?>
                                            <option value="<?php echo $row3->id_setting; ?>"
                                                <?php echo $selected ?> ><?php echo $row3->title_setting; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-3 padding-4 col-sm-4 col-xs-12">
                                    <label class="label label-green  half">مستفيد من التأهيل الشامل <strong
                                                class="astric">*</strong><strong></strong> </label>
                                    <select name="member_comprehensive_rehabilitation"
                                            id="member_comprehensive_rehabilitation"
                                            class=" no-padding form-control choose-date form-control half"
                                            aria-required="true"
                                            onchange="check_rehabilitation($(this).val())">
                                        <?php $comprehensive_rehabilitation_arr = array(1 => 'نعم', 2 => 'لا'); ?>
                                        <option value="">اختر</option>
                                        <?php foreach ($comprehensive_rehabilitation_arr as $key => $value) { ?>
                                            <option value="<?php echo $key; ?>"
                                                <?php if (!empty($result[0]->member_comprehensive_rehabilitation)) {
                                                    if ($result[0]->member_comprehensive_rehabilitation == $key) {
                                                        echo 'selected';
                                                    }
                                                } ?>
                                            ><?php echo $value; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-3 padding-4 col-sm-4 col-xs-12">
                                    <label class="label label-green  half">المبلغ<strong
                                                class="astric">*</strong>
                                    </label>
                                    <input type="text"
                                        <?php if (!empty($result['member_comprehensive_rehabilitation'])) {
                                            if (($result['member_comprehensive_rehabilitation'] == 1)) {
                                            } elseif ($result['member_comprehensive_rehabilitation'] == 2) {
                                                echo 'disabled="disabled"';
                                            }
                                        } else {
                                            echo 'disabled="disabled"';
                                        } ?>
                                           name="member_rehabilitation_value"
                                           id="member_rehabilitation_value"
                                           value="<?php if (!empty($result[0]->member_rehabilitation_value)) {
                                               echo $result[0]->member_rehabilitation_value;
                                           } ?>" class="form-control half input-style"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 no-padding" style="padding: 10px;">
                            <div class="panel-footer">
                                <div class="text-center">
                                    <input type="hidden" name="max" id="max"/>
                                    <button type="button" id="buttons"
                                            class="btn btn-labeled btn-success " <?= $disabel ?>
                                            name="<?php echo $button; ?>"
                                            value="<?php echo $button; ?>" onclick=<?= $onclick ?>>
                                            <span class="btn-label"><i
                                                        class="fa fa-floppy-o"></i></span> حفظ
                                        والانتقال الي الشاشه الاخري
                                    </button>
                                    <?= $span ?>
                                </div>
                            </div>
                        </div>
                        <?php echo form_close() ?>
                    </div>
                    <div class="tab-pane fade in <?= $class3 ?>" id="education-details-c">
                        <?php
                        if (isset($result) && !empty($result)) {
                            echo form_open_multipart('osr/Family/update_family_members/' . $id . '/education-details-c', array('class' => 'family_members_form'));
                            $disabel = "";
                            $span = "";
                            $onclick = "update_family_members(" . $id . ",'education-details-c');";
                        } else {
                            $disabel = "disabled";
                            echo form_open_multipart('osr/Family/family_members/' . $mother_national_num, array('class' => 'family_members_form'));
                            $span = "<span  class='label-danger'> عذرا...  لا يمكنك إضافة البيانات   قبل البيانات الشخصية</span>";
                        }
                        ?>
                        <div class="panel-body">
                            <div class="col-sm-12 col-xs-12 no-padding">
                                <div class="form-group col-md-2 padding-4  col-sm-4 col-xs-12">
                                    <label class="label label-green  half">الحالة الدراسية<strong
                                                class="astric">*</strong><strong></strong> </label>
                                    <select name="member_study_case" id="member_study_case"
                                            onchange="get_out_age(this.value);"
                                            class="form-control half">
                                        <option value="">إختر</option>
                                        <option value="0"
                                            <?php if ($member_study_case == "0") {
                                                echo 'selected';
                                            } ?>>( دون سن الدراسة )
                                        </option>
                                        <option value="unlettered"
                                            <?php if ($member_study_case == "unlettered") {
                                                echo 'selected';
                                            } ?>>( امى )
                                        </option>
                                        <option value="graduate"
                                            <?php if ($member_study_case == "graduate") {
                                                echo 'selected';
                                            } ?>>( متخرج )
                                        </option>
                                        <option value="read_write" <?php if ($member_study_case == "read_write") {
                                            echo 'selected';
                                        } ?>>
                                            ( يقرأو يكتب )
                                        </option>
                                        <option value="no_study"
                                            <?php if ($member_study_case == "no_study") {
                                                echo 'selected';
                                            } ?>>( لا يدرس )
                                        </option>
                                        <?php if (!empty($stude_case)) {
                                            foreach ($stude_case as $record) {
                                                $select = '';
                                                if ($member_study_case == $record->id_setting) {
                                                    $select = 'selected';
                                                }
                                                ?>
                                                <option value="<?php echo $record->id_setting; ?>"
                                                    <?php echo $select; ?>><?php echo $record->title_setting; ?></option>
                                            <?php }
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-2 padding-4  col-sm-4 col-xs-12">
                                    <label class="label label-green  half">المستوي التعليمي<strong
                                                class="astric">*</strong><strong></strong> </label>
                                    <select name="member_education_level" id="member_education_level"
                                            class="form-control half"
                                        <?php if ($member_study_case == 0) {
                                            echo 'disabled=""';
                                        } ?> >
                                        <option value="">إختر</option>
                                        <?php if (!empty($education_level)) {
                                            foreach ($education_level as $record) {
                                                $select = '';
                                                if ($member_education_level == $record->id_setting) {
                                                    $select = 'selected';
                                                }
                                                ?>
                                                <option value="<?php echo $record->id_setting; ?>"
                                                    <?php echo $select; ?>><?php echo $record->title_setting; ?></option>
                                            <?php }
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-2 padding-4  col-sm-4">
                                    <label class="label label-green  half">نوع التعليم <strong
                                                class="astric">*</strong></label>
                                    <select name="education_type" id="education_type"
                                            class="form-control half selectpicker "
                                            data-show-subtext="true"
                                            data-live-search="true" <?php if ($member_study_case == 0) {
                                        echo 'disabled=""';
                                    } ?>>
                                        <option value="">اختر</option>
                                        <?php foreach ($education_type as $row_ed) {
                                            $select = '';
                                            if (!empty($education_type_result)) {
                                                if ($row_ed->
                                                    id_setting == $education_type_result) {
                                                    $select = 'selected';
                                                }
                                            } ?>
                                            <option value="<?php echo $row_ed->id_setting; ?>"
                                                <?php echo $select; ?>><?php echo $row_ed->title_setting; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-2 padding-4  col-sm-4">
                                    <label class="label label-green  half">المرحلة <strong
                                                class="astric">*</strong></label>
                                    <select name="stage_id_fk" id="stage_id_fk"
                                            onchange="get_stage_class($('#stage_id_fk').val());"
                                            class="form-control half selectpicker " data-show-subtext="true"
                                            data-live-search="true"
                                        <?php if ($member_study_case == 0) {
                                            echo 'disabled=""';
                                        } ?>>
                                        <option value="">إختر المرحلة</option>
                                        <?php foreach ($all_stages as $stage) {
                                            $select = '';
                                            if (!empty($stage_id_fk)) {
                                                if ($stage->id == $stage_id_fk) {
                                                    $select = 'selected';
                                                }
                                            }
                                            ?>
                                            <option value="<?php echo $stage->id ?>"
                                                <?php echo $select; ?>><?php echo $stage->name ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-2 padding-4  col-sm-4">
                                    <label class="label label-green  half">الصف<strong
                                                class="astric">*</strong></label>
                                    <select name="class_id_fk" id="class_id_fk" class="form-control half  "
                                            data-show-subtext="true"
                                            data-live-search="true" <?php if ($member_study_case == 0) {
                                        echo 'disabled=""';
                                    } ?>>
                                        <?php if (isset($all_classroom) && !empty($all_classroom) && $all_classroom != null) { ?>
                                            <option value="">إختر الصف</option>
                                            <?php foreach ($all_classroom as $one_class) {
                                                $select = '';
                                                if (!empty($class_id_fk)) {
                                                    if ($one_class->id ==
                                                        $class_id_fk) {
                                                        $select = 'selected';
                                                    }
                                                }
                                                ?>
                                                <option value="<?php echo $one_class->id ?>"
                                                    <?php echo $select; ?>><?php echo $one_class->name ?> </option>
                                            <?php }
                                        } else { ?>
                                            <option>لا يوجد صفوف للمرحلة</option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-2 padding-4  col-sm-4" id="options_school">
                                    <label class="label label-green  half"> المدرسة - الكلية <strong
                                                class="astric">*</strong></label>
                                    <select name="school_id_fk" id="school_id_fk"
                                            class="form-control half selectpicker "
                                            data-show-subtext="true"
                                            data-live-search="true" <?php if ($member_study_case == "0") {
                                        echo 'disabled=""';
                                    } ?> >
                                        <option value="">إختر</option>
                                        <?php foreach ($schools as $row) {
                                            $select = '';
                                            if (!empty($school_id_fk)) {
                                                if ($row->id_setting ==
                                                    $school_id_fk) {
                                                    $select = 'selected';
                                                }
                                            }
                                            ?>
                                            <option value="<?php echo $row->id_setting; ?>"
                                                <?php echo $select ?>><?php echo $row->title_setting; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-xs-12 no-padding">
                                <div class="form-group col-md-2 padding-4  col-sm-4 col-xs-12">
                                    <label class="label label-green  half">مستوى التحصيل الدراسي<strong
                                                class="astric">*</strong><strong></strong> </label>
                                    <select name="member_academic_achievement_level"
                                            id="member_academic_achievement_level"
                                            class="form-control half" <?php if ($member_study_case == 0) {
                                        echo 'disabled=""';
                                    } ?>>
                                        <option value="">إختر</option>
                                        <?php if (!empty($academic_achievement_level)) {
                                            foreach ($academic_achievement_level as $record) {
                                                $select = '';
                                                if ($member_academic_achievement_level == $record->id_setting) {
                                                    $select = 'selected';
                                                }
                                                ?>
                                                <option value="<?php echo $record->id_setting; ?>"
                                                    <?php echo $select; ?>><?php echo $record->title_setting; ?></option>
                                            <?php }
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-2 padding-4  col-sm-4">
                                    <label class="label label-green  half">تكاليف الدراسة <strong
                                                class="astric">*</strong></label>
                                    <input type="text" name="school_cost" id="school_cost"
                                           onkeypress="validate_number(event);"
                                           class="form-control half input-style"
                                           placeholder="تكاليف الدراسة"
                                           value="<?php echo $school_cost; ?>" <?php if ($member_study_case == 0) {
                                        echo 'disabled=""';
                                    } ?>
                                    />
                                </div>
                                <div class="form-group col-md-2 padding-4  col-sm-4 col-xs-12">
                                    <label class="label label-green  half">التخصص </label>
                                    <select name="member_specialization" id="special"
                                            class="no-padding form-control half">
                                        <option value="">اختر</option>
                                        <?php foreach ($specialties as $specialty) {
                                            $selected = '';
                                            if ($specialty->id_setting == $member_specialization) {
                                                $selected = 'selected';
                                            }
                                            ?>
                                            <option value="<?php echo $specialty->id_setting; ?>"
                                                <?php echo $selected ?> ><?php echo $specialty->title_setting; ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="modal fade" id="myModal-view2<?php echo $id; ?>" tabindex="-1"
                                     role="dialog"
                                     aria-labelledby="myModalLabel">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close"><span
                                                            aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel"> تعريف
                                                    المدرسة</h4>
                                            </div>
                                            <div class="modal-body">
                                                <img src="<?php echo base_url() ?>uploads/images/<?php echo $member_sechool_img; ?>"
                                                     width="100%">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default"
                                                        data-dismiss="modal">
                                                    إغلاق
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-2 padding-4  col-sm-4 col-xs-12">
                                    <label class="label label-green  half">ملتحق بدار أو مراكز الجمعيه
                                        <strong
                                                class="astric">*</strong><strong></strong>
                                    </label>
                                    <select name="member_dar_markz_check" onchange="get_dar($(this).val());"
                                            id="member_dar_markz_check"
                                            class=" no-padding form-control choose-date form-control half ">
                                        <option value="">اختر</option>
                                        <?php
                                        $arr_yes_no = array('', 'نعم', 'لا');
                                        for ($r = 1; $r < sizeof($arr_yes_no); $r++) {
                                            $selected = '';
                                            if ($r == $member_dar_markz_check) {
                                                $selected = 'selected';
                                            }
                                            ?>
                                            <option value="<?php echo $r; ?>"
                                                <?php echo $selected ?> ><?php echo $arr_yes_no[$r]; ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-2 padding-4  col-sm-4 col-xs-12">
                                    <label class="label label-green  half">اسم الدار - مركز الجمعيه<strong
                                                class="astric">*</strong><strong></strong> </label>
                                    <select class=" form-control half" name="member_dar_markz_id_fk"
                                            id="member_dar_markz_id_fk" <?php if ($member_dar_markz_id_fk == 1 || $member_dar_markz_id_fk == '') { ?>
                                        disabled=""<?php } ?>>
                                        <option value="">اختر</option>
                                        <?php
                                        foreach ($data_door_mrakz as $row7):
                                            $selected = '';
                                            if ($row7->id_setting == $member_dar_markz_id_fk) {
                                                $selected = 'selected';
                                            } ?>
                                            <option value="<?php echo $row7->id_setting; ?>"
                                                <?php echo $selected ?> ><?php echo $row7->title_setting; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-2 padding-4  col-sm-4 col-xs-12">
                                    <label class="label label-green  half">ملتحق بدار تابعه لجهات
                                        اخري<strong
                                                class="astric">*</strong><strong></strong> </label>
                                    <select name="member_house_check" id="eldar"
                                            class=" no-padding form-control choose-date form-control half ">
                                        <option value="">اختر</option>
                                        <?php
                                        $arr_yes_no = array('', 'نعم', 'لا');
                                        for ($r = 1; $r < sizeof($arr_yes_no); $r++) {
                                            $selected = '';
                                            if ($r == $member_house_check) {
                                                $selected = 'selected';
                                            }
                                            ?>
                                            <option value="<?php echo $r; ?>"
                                                <?php echo $selected ?> ><?php echo $arr_yes_no[$r]; ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-xs-12 no-padding">
                                <div class="form-group col-md-2 padding-4  col-sm-4 col-xs-12">
                                    <label class="label label-green  half">اسم الدار - المركز<strong
                                                class="astric">*</strong><strong></strong> </label>
                                    <select class=" form-control half" name="member_house_id_fk"
                                            id="member_house_id_fk" <?php if ($member_house_id_fk == "") { ?> disabled=""<?php } ?>>
                                        <option value="">اختر</option>
                                        <?php
                                        foreach ($women_houses as $row4):
                                            $selected = '';
                                            if ($row4->id_setting == $member_house_id_fk) {
                                                $selected = 'selected';
                                            } ?>
                                            <option value="<?php echo $row4->id_setting; ?>"
                                                <?php echo $selected ?> ><?php echo $row4->title_setting; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-2 padding-4  col-sm-4">
                                    <label class="label label-green  half"> المهنة<strong
                                                class="astric">*</strong>
                                    </label>
                                    <select class="form-control half selectpicker"
                                            onchange="not_work($(this).val());"
                                            data-show-subtext="true" data-live-search="true"
                                            name="member_job" id="work"
                                            aria-required="true">
                                        <option value="">اختر</option>
                                        <option value="0"
                                            <?php if ($member_job == 0) {
                                                echo 'selected';
                                            } ?> >لا يعمل
                                        </option>
                                        <?php foreach ($job as $one_row) {
                                            $select = '';
                                            if (!empty($member_job)) {
                                                if ($one_row->id_setting
                                                    == $member_job) {
                                                    $select = 'selected';
                                                }
                                            } ?>
                                            <option value="<?php echo $one_row->id_setting; ?>"
                                                <?php echo $select; ?>><?php echo $one_row->title_setting; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-2 padding-4  col-sm-4">
                                    <label class="label label-green  half">الدخل الشهرى <strong
                                                class="astric">*</strong></label>
                                    <input type="text" name="member_month_money" id="member_month_money"
                                           class="form-control half"
                                           onkeypress="validate_number(event);" id="profession"
                                           value="<?php echo $member_month_money; ?>"
                                        <?php if ($member_job == 0) {
                                            echo 'disabled=""';
                                        } ?> />
                                </div>
                                <div class="form-group col-md-2 padding-4  col-sm-4">
                                    <label class="label label-green  half"> مكان العمل<strong
                                                class="astric">*</strong>
                                    </label>
                                    <input type="text" name="member_job_place" id="member_job_place"
                                           class="form-control half"
                                           placeholder="مكان العمل" id="member_job_place"
                                           value="<?php echo $member_job_place; ?>" <?php if ($member_job == 0) {
                                        echo 'disabled=""';
                                    } ?> />
                                </div>
                                <div class="form-group col-md-2 padding-4  col-sm-4">
                                    <label class="label label-green  half"> النشاط<strong
                                                class="astric">*</strong>
                                    </label>
                                    <select class="form-control half selectpicker " data-show-subtext="true"
                                            data-live-search="true"
                                            name="member_activity_type"
                                            id="activity_type" <?php if ($member_job == 0) {
                                        echo 'disabled=""';
                                    } ?>
                                            aria-required="true">
                                        <option value="">اختر</option>
                                        <?php foreach ($member_activity_type_arr as $row) {
                                            $select = '';
                                            if (!empty($member_activity_type)) {
                                                if ($row->id_setting ==
                                                    $member_activity_type) {
                                                    $select = 'selected';
                                                }
                                            }
                                            ?>
                                            <option value="<?php echo $row->id_setting; ?>"
                                                <?php echo $select ?>><?php echo $row->title_setting; ?></option>
                                        <?php } ?>
                                        <?php if ($member_activity_type_arr != '' && !empty($member_activity_type_arr)) {
                                            if ($member_activity_type == 0) { ?>
                                                <option value="0" selected>نشاط أخر</option>
                                            <?php } else { ?>
                                                <option value="0">نشاط أخر</option>
                                            <?php }
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-2 padding-4  col-sm-4">
                                    <label class="label label-green  half">نشاط أخر<strong
                                                class="astric">*</strong>
                                    </label>
                                    <input type="text" name="member_activity_type_other"
                                           class="form-control half"
                                           placeholder="أخري"
                                           id="activity_type_other" <?php if ($member_job == 0) {
                                        echo 'disabled=""';
                                    } ?>
                                           value="<?php echo $member_activity_type_other; ?>"/>
                                </div>
                            </div>
                            <div class="col-sm-12 col-xs-12 no-padding">
                                <div class="form-group col-md-2 padding-4  col-sm-4">
                                    <label class="label label-green  half">هل يصرف على أمه <strong
                                                class="astric">*</strong></label>
                                    <select class="form-control half  "
                                            name="member_distracted_mother">
                                        
                                        <?php for ($a = 0; $a < sizeof($yes_no); $a++) {
                                            $select = '';
                                            if (!empty($member_distracted_mother)) {
                                                if ($a == $member_distracted_mother) {
                                                    $select = 'selected';
                                                }
                                            }
                                            ?>
                                            <option value="<?php echo $a; ?>"
                                                <?php echo $select; ?>><?php echo $yes_no[$a]; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-2 padding-4  col-sm-4">
                                    <label class="label label-green  half">تعريف المدرسة <strong
                                                class="astric">*</strong></label>
                                    <input type="file" name="member_sechool_img" id="member_sechool_img"
                                           class="form-control half"/>
                                    <small class="small" style="bottom:-13px;">
                                        <?php if (!empty($member_sechool_img)) { ?>
                                            <a href="<?php echo base_url() ?>uploads/images/<?php echo $member_sechool_img; ?>"
                                               download> <i
                                                        class="fa fa-download"></i> </a>
                                            <a href="#" data-toggle="modal"
                                               data-target="#myModal-view2<?php echo $id; ?>"> <i
                                                        class="fa fa-eye"></i> </a>
                                        <?php } ?>
                                        برجاء إرفاق صورة
                                    </small>
                                </div>
                            </div>
                            <div class="col-xs-12 no-padding" style="padding: 10px;">

                                <div class="panel-footer">
                                    <div class="text-center">
                                        <input type="hidden" name="max" id="max"/>
                                        <button type="button" id="buttons"
                                                class="btn btn-labeled btn-success " <?= $disabel ?>
                                                name="<?php echo $button; ?>"
                                                value="<?php echo $button; ?>" onclick=<?= $onclick ?>>
                                                <span class="btn-label"><i
                                                            class="fa fa-floppy-o"></i></span>
                                            حفظ والانتقال الي الشاشه الاخري
                                        </button>
                                        <?= $span ?>
                                    </div>
                                </div>
                                <?php echo form_close() ?>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade in <?= $class4 ?>" id="skills-details-c">
                        <?php
                        if (isset($result) && !empty($result)) {
                            echo form_open_multipart('osr/Family/update_family_members/' . $id . '/skills-details-c', array('class' => 'family_members_form'));
                            $disabel = "";
                            $span = "";
                            $onclick = "update_family_members(" . $id . ",'skills-details-c');";
                        } else {
                            $disabel = "disabled";
                            echo form_open_multipart('osr/Family/family_members/' . $mother_national_num, array('class' => 'family_members_form'));
                            $span = "<span  class='label-danger'> عذرا...  لا يمكنك إضافة البيانات   قبل البيانات الشخصية</span>";
                        }
                        ?>
                        <div class="col-xs-12 no-padding">
                            <div class="col-md-6">
                                <?php if (!empty($dwrat)) { ?>
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr class="info">
                                            <th>م</th>
                                            <th>اختر</th>
                                            <th>الدورات التدريبية التى يحتاجها المستفيد</th>
                                            <th>الحالة</th>
                                        </thead>
                                        </tr>
                                        <tbody
                                                $result_courses
                                        <?php $x = 1;
                                        foreach ($dwrat as $row) { ?>
                                            <tr>
                                                <td><?php echo $x; ?></td>
                                                <td><input type="checkbox" <?php if (!empty($courses_arr)) {
                                                        if (in_array($row->id_setting, $courses_arr)) { ?>  checked <?php }
                                                    } ?> name="courses[]"
                                                           value="<?php echo $row->id_setting; ?>"></td>
                                                <td><?php echo $row->title_setting; ?></td>
                                                <td>
                                                    <?php if (!empty($result_courses[$row->id_setting])) {
                                                        if ($result_courses[$row->id_setting]->approved == 1) {
                                                            ?>
                                                            
                                                            <button type="button" class="btn btn-success">
                                                                تم التنفيذ
                                                            </button>
                                                        <?php } else { ?>
                                                            
                                                            <button type="button" class="btn btn-warning">
                                                                قيد التنفيذ
                                                            </button>
                                                        <?php } ?>
                                                    <?php } else { ?>
                                                        <button type="button" class="btn btn-warning">قيد التنفيذ
                                                        </button>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <?php $x++;
                                        } ?>
                                        </tbody>
                                    </table>
                                <?php } ?>
                            </div>
                            <div class="col-md-6">
                                <?php if (!empty($skills)) { ?>
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr class="info">
                                            <th>م</th>
                                            <th>اختر</th>
                                            <th>المهارات والدورات والمواهب التي لدي المستفيد</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $x = 1;
                                        foreach ($skills as $row) { ?>
                                            <tr>
                                                <td><?php echo $x; ?></td>
                                                <td>
                                                    <input type="checkbox" <?php if (!empty($result_skills)) {
                                                        if (in_array($row->id_setting, $result_skills)) { ?> checked <?php }
                                                    } ?> name="skills[]"
                                                           value="<?php echo $row->id_setting; ?>"></td>
                                                <td><?php echo $row->title_setting; ?></td>
                                            </tr>
                                            <?php $x++;
                                        } ?>
                                        </tbody>
                                    </table>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group col-sm-6 col-xs-12">
                        </div>
                        <div class="form-group col-sm-4 col-xs-12">
                            <input type="checkbox" <?php if (!empty($result[0]->member_other_skill)) {
                                $click_state = 0;
                                echo 'checked';
                            } else {
                                $click_state = 1;
                            } ?> data-click-state="<?php echo $click_state; ?>" name="check_button"
                                   id="check_button"
                                   onclick="other_skill_function()">
                            <label class="label label-green  "> أخري</label>
                            <input type="text" id="member_other_skill" name="member_other_skill"
                                   value="<?php if (!empty($result['m_other_skill'])) {
                                       echo $result[0]->member_other_skill;
                                   } ?>"
                                   <?php if (empty($result[0]->member_other_skill)){ ?>disabled="disabled" <?php } ?>
                                   class="form-control half input-style"/>
                        </div>
                        <div class="col-xs-12 no-padding" style="padding: 10px;">
                            <div class="panel-footer">
                                <div class="text-center">
                                    <input type="hidden" name="max" id="max"/>
                                    <button type="submit" id="buttons"
                                            class="btn btn-labeled btn-success " <?= $disabel ?>
                                            name="<?php echo $button; ?>"
                                            value="<?php echo $button; ?>">
                                            <span class="btn-label"><i
                                                        class="fa fa-floppy-o"></i></span>حفظ
                                        والانتقال الي الشاشه الاخري
                                    </button> <?= $span ?>
                                </div>
                            </div>
                        </div>
                        <?php echo form_close() ?>
                    </div>
                    <div class="tab-pane fade in <?= $class5 ?>" id="tab4">
                        <?php
                        if (isset($result) && !empty($result)) {
                            echo form_open_multipart('osr/Family/update_family_members/' . $id . '/tab4', array('class' => 'family_members_form'));
                            $disabel = "";
                            $span = "";
                            $onclick = "update_family_members(" . $id . ",'tab4');";
                        } else {
                            $disabel = "disabled";
                            echo form_open_multipart('osr/Family/family_members/' . $mother_national_num, array('class' => 'family_members_form'));
                            $span = "<span  class='label-danger'> عذرا...  لا يمكنك إضافة البيانات   قبل البيانات الشخصية</span>";
                        }
                        ?>
                        <div class="panel-body"
                        <div class="col-xs-12 no-padding" style="padding: 10px;">
                            <div class="panel-footer">
                                <div class="text-center">
                                    <input type="hidden" name="max" id="max"/>
                                    <button type="submit" id="buttons"
                                            class="btn btn-labeled btn-success " <?= $disabel ?>
                                            name="<?php echo $button; ?>"
                                            value="<?php echo $button; ?>">
                                        <span class="btn-label"><i class="fa fa-floppy-o"></i></span>حفظ
                                        والانتقال الي الشاشه الاخري
                                    </button>
                                    <?= $span ?>
                                </div>
                            </div>
                        </div>
                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
            
        </div>
         </div>
    </div>
    <?php } ?>

    <div class="col-sm-12 no-padding ">
<!--        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">-->
         <div class="col-sm-12 col-md-12 col-xs-12 fadeInUp wow">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                       <?=$title?>
                    </h3>
                </div>
                <div class="panel-body" style="width: 100% !important; overflow-x: auto !important;">
                
                <?php if (isset($member_data) && $member_data != null) { ?>
                    <table id="example" class=" table table-bordered table-striped" style="width:100%">
                        <thead>
                        <tr class="greentd">
                            <th>م</th>
                            <th>الإسم</th>
                            <th>رقم الهوية</th>
                            <th>الصلة</th>
                            <th>الجنس</th>
                            <th>تاريخ الميلاد هجري</th>
                            <th>العمر</th>
                            <th>التصنيف</th>
                            <th>طبيعة الفرد</th>
                            <th> الإجراء</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (isset($mothers_data) && $mothers_data != null) { ?>
                            <tr>
                                <td>1</td>
                                
                                <td><?php echo $mothers_data[0]->full_name; ?></td>
                                <td><?php echo $mothers_data[0]->mother_national_num_fk; ?></td>
                                <td><?php echo $mothers_data[0]->relation_name; ?> </td>
                                <td><?php if ($mothers_data[0]->m_gender == 1) {
                                        echo 'ذكر';
                                    } else {
                                        echo 'انثى';
                                    } ?></td>
                                <td><?php echo $mothers_data[0]->m_birth_date_hijri; ?> </td>
                                <td>
                                    <?php $age = '';
                                    if (isset($mothers_data[0]->m_birth_date_year) && !empty($mothers_data[0]->m_birth_date_year)
                                        && isset($current_year) && !empty($current_year)) {
                                        $age = $current_year - $mothers_data[0]->m_birth_date_hijri_year;
                                    }
                                    echo $age . " عام";
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($mothers_data[0]->categoriey_m == 1) {
                                        $categoriey_m_name = 'أرملة ';
                                    } elseif ($mothers_data[0]->categoriey_m == 2) {
                                        $categoriey_m_name = 'يتيم ';
                                    } elseif ($mothers_data[0]->categoriey_m == 3) {
                                        $categoriey_m_name = 'مستفيد بالغ  ';
                                    } else {
                                        $categoriey_m_name = 'غير محدد  ';
                                    }
                                    echo $categoriey_m_name;
                                    ?>
                                </td>
                                <td><?= $mothers_data[0]->person_type_name ?></td>
                                <td></td>
                            </tr>
                        <?php } ?>
                        <?php
                        $x = 2;
                        foreach ($member_data as $row) { ?>
                            <tr>
                                <td><?php echo $x; ?></td>
                                <td><?php echo $row->member_full_name; ?></td>
                                <td><?php echo $row->member_card_num; ?></td>
                                <td><?php echo $row->relation_name; ?></td>
                                <td><?php if ($row->member_gender == 1) {
                                        echo 'ذكر';
                                    } else {
                                        echo 'انثى';
                                    } ?></td>
                                <td><?php echo $row->member_birth_date_hijri; ?></td>
                                <td>
                                    <?php
                                    $age = '';
                                    if (isset($row->member_birth_date_hijri) && !empty($row->member_birth_date_hijri) &&
                                        isset($current_year) && !empty($current_year)) {
                                        $age = $current_year - $row->member_birth_date_hijri_year;
                                    }
                                    echo $age . " عام";
                                    ?>
                                </td>
                                <td><?php
                                    if ($row->categoriey_member == 1) {
                                        $categoriey_member = 'أرملة ';
                                    } elseif ($row->categoriey_member == 2) {
                                        $categoriey_member = 'يتيم ';
                                    } elseif ($row->categoriey_member == 3) {
                                        $categoriey_member = 'مستفيد بالغ ';
                                    } else {
                                        $categoriey_member = 'غير محدد  ';
                                    }
                                    echo $categoriey_member;
                                    ?>
                                </td>
                                <td> <?= $row->member_person_type_name ?> </td>
                                <td>
                                    <?php if(!$_SESSION['hidden_action']){ ?>
                                    <input type="hidden" value="<?= $row->id ?>" name="id" id="id">
                                    <a href="#" onclick='swal({
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
                                            window.location="<?php echo base_url() . 'osr/Family/update_family_members/' . $row->id ?>";
                                            });'>
                                        <i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    <a href="#" onclick='swal({
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
                                            window.location="<?php echo base_url() . 'osr/Family/delete_family_members/' . $row->id ?>";
                                            });'>
                                        <i class="fa fa-trash"> </i></a>
                                    <?php }else{ echo 'لا يمكن الحذف او التعديل'; } ?>
                                </td>
                            </tr>
                            <?php $x++;
                        } ?>
                        </tbody>
                    </table>
                <?php } ?>
                
            </div>
            </div>
        </div>
    </div>
</div>


