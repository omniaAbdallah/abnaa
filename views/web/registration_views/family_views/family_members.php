<style>
    /**************************/
    /* 27-1-2019 */
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

    /* .form-control{
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
if (isset($result) && !empty($result)) {
//    echo "<pre>";
//    print_r($result);
//    echo "</pre>";
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
    //$education_problems=$result[0]->education_problems;
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
//var_dump($member_activity_type); die;
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
   // document.getElementById("health_other").removeAttribute("disabled", "disabled");
    //document.getElementById("health_other").setAttribute("data-validation", "required");
</script>';
    } else {
        echo '
<script>
    //document.getElementById("health_other").setAttribute("disabled", "disabled");</script>';
    }
    $member_health_type_other = $result[0]->member_health_type_other;
    $member_birth_card_img = $result[0]->member_birth_card_img;
    $member_photo = $result[0]->member_photo;
    $id = $result[0]->id;
    $member_sechool_img = $result[0]->member_sechool_img;
    // echo form_open_multipart('Web/update_family_members/'.$id);
    $button = 'update';
    /**************ahmed******/
    $member_birth_date_hijri_year = $result[0]->member_birth_date_hijri_year;
    $member_relationship = $result[0]->member_relationship;
    $member_card_source = $result[0]->member_card_source;
    $member_study_case = $result[0]->member_study_case;
    $member_academic_achievement_level = $result[0]->member_academic_achievement_level;
    $member_person_type = $result[0]->member_person_type;
    $member_education_level = $result[0]->member_education_level;
    $member_house_check = $result[0]->member_house_check;
    $member_house_id_fk = $result[0]->member_house_id_fk;
//======================
    $categoriey_member = $result[0]->categoriey_member;
    $guaranteed_member = $result[0]->guaranteed_member;
    $member_dar_markz_check = $result[0]->member_dar_markz_check;
    $member_dar_markz_id_fk = $result[0]->member_dar_markz_id_fk;
    $halt_elmostafid_member = $result[0]->persons_status;
    $member_gender = $result[0]->member_gender;
    /**************ahmed******/
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
    // $member_mob='';
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
    //$education_problems='';
    $courses_details = '';
    $personal_character_id_fk = "";
    $relation_with_family = "";
    //echo form_open_multipart('Web/family_members/' . $mother_national_num);
    $button = 'add';
    /**************ahmed******/
    $member_birth_date_hijri_year = '';
    $member_relationship = '';
    $member_card_source = '';
    $member_study_case = '';
    $member_academic_achievement_level = '';
    $member_person_type = '';
    $member_education_level = '';
//=================
    $categoriey_member = '';
    $guaranteed_member = '';
    $member_dar_markz_check = '';
    $member_dar_markz_id_fk = '';
    $member_specialization = "";
    $school_title = "";
    /**************ahmed******/
}
?>

<div class="col-sm-12">

    <div class="col-sm-12  ">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">


            </div>
            <div class="panel-body" style="width: 100% !important; overflow-x: auto !important;">

                <!----------------------- table----------->
                <?php if (isset($member_data) && $member_data != null) { ?>
                    <h3 class=" header_h5">بيانات أفراد الاسرة
                    </h3>
                    <table class="table table-bordered table-striped" style="width:100%">
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


                         
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        if (isset($mothers_data) && $mothers_data != null) { ?>
                            <tr>
                                <td>1</td>
                                <!--  <td><?php echo $mothers_data[0]->full_name; ?></td> -->
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
                                        //   $age= date('Y-m-d') - $mothers_data[0]->m_birth_date_year;
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
                                        // $age=date('Y-m-d')-$row->member_birth_date_year;
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


                          

                            </tr>

                            <?php $x++;
                        } ?>
                        </tbody>
                    </table>


                <?php } ?>
                <!------------------------table---------->


            </div>
        </div>
    </div>

</div>

<script>

    function save_family_members(tab1) {
        // $('#registerForm').serialize(),
        var all_inputs = $(' #' + tab1 + ' [data-validation="required"]');
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

        var form_data = new FormData();
        var files = $('#member_photo')[0].files;

        form_data.append("member_photo", files[0]);
        //$('#family_members_form').serialize()
        var serializedData = $('.family_members_form').serializeArray();
        $.each(serializedData, function (key, item) {
            //console.log(item.name+': ' + item.value);
            form_data.append(item.name, item.value);
        });


        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>registration/Family/family_members',
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
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
                var all_inputs_set = $('.family_members_form .form-control');

                all_inputs_set.each(function (index, elem) {
                    console.log(elem.id + $(elem).val());
                    $(elem).val('');
                });

                if (html == 1) {
                    get_data('family_members');
                    show_tab('family_members');
                }

            }
        });
    }


    function update_family_members(id, div_id) {

        var tabs = ['tab1', 'contact-details-c', 'health-details-c', 'education-details-c', 'skills-details-c', 'tab4'];

        function checkAdult(tab) {
            return tab == div_id;
        }

        var tab_index = tabs.findIndex(checkAdult);
        console.warn('tab_index :: ' + tab_index);
        var all_inputs = $(' #' + div_id + ' [data-validation="required"]');

        //var all_inputs = $(' .family_members_form [data-validation="required"]');
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

        var form_data = new FormData();
        var files = $('#member_photo')[0].files;
        var file_school = $('#member_sechool_img')[0].files;


        form_data.append("member_photo", files[0]);
        form_data.append("member_sechool_img", file_school[0]);
        //$('#family_members_form').serialize()
        var serializedData = $('.family_members_form').serializeArray();
        $.each(serializedData, function (key, item) {
            //console.log(item.name+': ' + item.value);
            form_data.append(item.name, item.value);
        });


        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>registration/Family/update_family_members/' + id,
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
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
                /*var all_inputs_set = $('.family_members_form .form-control');

                all_inputs_set.each(function (index, elem) {
                    console.log(elem.id + $(elem).val());
                    $(elem).val('');
                });*/

                if (html == 1) {
                    //get_data('family_members');
                    //select_family_members(id);
                    //show_tab('family_members');

                    if (tab_index <= 5) {
                        if (tab_index == 5) {
                            console.warn('show_tab :: ' + tabs[0]);
                            show_tab(tabs[0]);
                        } else {
                            console.warn('show_tab :: ' + tabs[(tab_index + 1)]);
                            show_tab(tabs[(tab_index + 1)]);
                        }
                    }
                }


            }
        });
    }


    function select_family_members(id) {
        $.ajax({
            type: 'get',
            url: "<?php echo base_url();?>registration/Family/update_family_members/" + id,
            beforeSend: function () {
                $('#page_body').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#page_body').html(d);
                // $('.selectpicker').selectpicker("refresh");
                // reset_file_input('file');
            }
        });
    }


    function delete_family_members(id) {

        $.ajax({
            type: 'get',
            url: '<?php echo base_url() ?>registration/Family/delete_family_members/' + id,
            cache: false,
            contentType: false,
            processData: false,
            success: function (html) {


                if (html == 1) {
                    get_data('family_members');
                    show_tab('family_members');
                }

            }
        });
    }


</script>


<script>
    function validate_number(evt) {
        var theEvent = evt || window.event;
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode(key);
        var regex = /[0-9]|\./;
        if (!regex.test(key)) {
            theEvent.returnValue = false;
            if (theEvent.preventDefault) theEvent.preventDefault();
        }
    }

</script>

<script type="text/javascript">
    $('.btnNext').click(function () {
        $('.nav-tabs > .active').next('li').find('a').trigger('click');
    });

    $('.btnPrevious').click(function () {
        $('.nav-tabs > .active').prev('li').find('a').trigger('click');
    });
</script>

<script>
    function get_out_age(value_id) {
        //  education_type  stage_id_fk
        // class_id_fk  school_id_fk member_academic_achievement_level
        //  school_cost stage_id_fk   member_education_level  special
        // unlettered    graduate
        if (value_id == 0 || value_id == "unlettered" || value_id == "read_write" || value_id == "no_study") {
            document.getElementById("education_type").setAttribute("disabled", "disabled");
            //  document.getElementById("education_type").removeAttribute("data-validation", "required");
            document.getElementById("stage_id_fk").setAttribute("disabled", "disabled");
            //  document.getElementById("stage_id_fk").removeAttribute("data-validation", "required");
            document.getElementById("class_id_fk").setAttribute("disabled", "disabled");
            // document.getElementById("class_id_fk").removeAttribute("data-validation", "required");
            document.getElementById("school_id_fk").setAttribute("disabled", "disabled");
            //  document.getElementById("school_id_fk").removeAttribute("data-validation", "required");
            document.getElementById("member_academic_achievement_level").setAttribute("disabled", "disabled");
            // document.getElementById("member_academic_achievement_level").removeAttribute("data-validation", "required");
            document.getElementById("school_cost").setAttribute("disabled", "disabled");
            document.getElementById("school_cost").removeAttribute("data-validation", "required");
            document.getElementById("member_education_level").setAttribute("disabled", "disabled");
            // document.getElementById("member_education_level").removeAttribute("data-validation", "required");
            document.getElementById("special").setAttribute("disabled", "disabled");
            // document.getElementById("special").removeAttribute("data-validation", "required");
        } else if (value_id == "graduate") {
            document.getElementById("education_type").setAttribute("disabled", "disabled");
            //  document.getElementById("education_type").removeAttribute("data-validation", "required");
            document.getElementById("stage_id_fk").setAttribute("disabled", "disabled");
            //   document.getElementById("stage_id_fk").removeAttribute("data-validation", "required");
            document.getElementById("class_id_fk").setAttribute("disabled", "disabled");
            // document.getElementById("class_id_fk").removeAttribute("data-validation", "required");
            document.getElementById("school_id_fk").removeAttribute("disabled", "disabled");
            // document.getElementById("school_id_fk").setAttribute("data-validation", "required");
            document.getElementById("member_academic_achievement_level").setAttribute("disabled", "disabled");
            // document.getElementById("member_academic_achievement_level").removeAttribute("data-validation", "required");
            document.getElementById("school_cost").setAttribute("disabled", "disabled");
            // document.getElementById("school_cost").removeAttribute("data-validation", "required");
            document.getElementById("member_education_level").setAttribute("disabled", "disabled");
            // document.getElementById("member_education_level").removeAttribute("data-validation", "required");
            $('#school_id_fk').selectpicker('refresh');
            document.getElementById("special").removeAttribute("disabled", "disabled");
            //   document.getElementById("special").setAttribute("data-validation", "required");
        } else {
            // education_type  stage_id_fk  school_id_fk
            document.getElementById("member_academic_achievement_level").removeAttribute("disabled", "disabled");
            //  document.getElementById("member_academic_achievement_level").setAttribute("data-validation", "required");
            document.getElementById("education_type").removeAttribute("disabled", "disabled");
            //  document.getElementById("education_type").setAttribute("data-validation", "required");
            document.getElementById("stage_id_fk").removeAttribute("disabled", "disabled");
            // document.getElementById("stage_id_fk").setAttribute("data-validation", "required");
            document.getElementById("class_id_fk").removeAttribute("disabled", "disabled");
            // document.getElementById("class_id_fk").setAttribute("data-validation", "required");
            document.getElementById("school_id_fk").removeAttribute("disabled", "disabled");
            // document.getElementById("school_id_fk").setAttribute("data-validation", "required");
            document.getElementById("member_education_level").removeAttribute("disabled", "disabled");
            // document.getElementById("member_education_level").setAttribute("data-validation", "required");
            document.getElementById("school_cost").removeAttribute("disabled", "disabled");
            // document.getElementById("school_cost").setAttribute("data-validation", "required");
            $('#education_type').selectpicker('refresh');
            $('#stage_id_fk').selectpicker('refresh');
            $('#school_id_fk').selectpicker('refresh');
            document.getElementById("special").removeAttribute("disabled", "disabled");
            // document.getElementById("special").setAttribute("data-validation", "required");
        }
    }
</script>

<script>
    function get_stage_class(num) {
        // alert(num)
        if (num > 0 && num != '') {
            var id = num;
            var dataString = 'main_stage=' + id;
            $.ajax({
                type: 'get',
                url: '<?php echo base_url() ?>registration/Family/family_members',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $("#class_id_fk").html(html);
                }
            });
        }
    }
</script>
<script>
    document.getElementById("member_nationality").onchange = function () {
        if (this.value == 0) {
            document.getElementById("nationality_other").removeAttribute("disabled", "disabled");
            document.getElementById("nationality_other").setAttribute("data-validation", "required");
        } else {
            document.getElementById("nationality_other").setAttribute("disabled", "disabled");
            $("#nationality_other").val("");
        }
    };
    document.getElementById("activity_type").onchange = function () {
        console.log(this.value);
        if (this.value == '0') {
            document.getElementById("activity_type_other").removeAttribute("disabled", "disabled");
            document.getElementById("activity_type_other").setAttribute("data-validation", "required");
        } else {
            document.getElementById("activity_type_other").setAttribute("disabled", "disabled");
            document.getElementById("activity_type_other").removeAttribute("data-validation");
        }
    };
</script>

<script>
    function getAge() {
        var nowYear = (new Date()).getFullYear();
        var myAge = (nowYear - $('#CYear').val());
        $('#myage').val(myAge)
    }

</script>
<!--=----------------ahmed-->
<script>
    document.getElementById('eldar').onchange = function () {
        var x = $(this).val();
        if (x == 1) {
            document.getElementById("member_house_id_fk").removeAttribute("disabled", "disabled");
            document.getElementById("member_house_id_fk").setAttribute("data-validation", "required");
        } else {
            document.getElementById("member_house_id_fk").value = '';
            document.getElementById("member_house_id_fk").setAttribute("disabled", "disabled");
            document.getElementById("member_house_id_fk").removeAttribute("data-validation", "required");
            ;
        }
    }

    function not_work(value_id) {     // member_job_place  activity_type   activity_type_other member_month_money
        if (value_id == 0) {
            document.getElementById("member_month_money").setAttribute("disabled", "disabled");
            document.getElementById("member_month_money").removeAttribute("data-validation", "required");
            document.getElementById("member_job_place").setAttribute("disabled", "disabled");
            document.getElementById("member_job_place").removeAttribute("data-validation", "required");
            document.getElementById("activity_type").setAttribute("disabled", "disabled");
            document.getElementById("activity_type").removeAttribute("data-validation", "required");
            document.getElementById("activity_type_other").setAttribute("disabled", "disabled");
            document.getElementById("activity_type_other").removeAttribute("data-validation", "required");
            //  $('.selectpicker').selectpicker('refresh');
        } else {
            document.getElementById("member_month_money").removeAttribute("disabled", "disabled");
            document.getElementById("member_month_money").setAttribute("data-validation", "required");
            document.getElementById("member_job_place").removeAttribute("disabled", "disabled");
            document.getElementById("member_job_place").setAttribute("data-validation", "required");
            document.getElementById("activity_type").removeAttribute("disabled", "disabled");
            document.getElementById("activity_type").setAttribute("data-validation", "required");
            document.getElementById("activity_type_other").removeAttribute("disabled", "disabled");
            document.getElementById("activity_type_other").setAttribute("data-validation", "required");
            //  $('.selectpicker').selectpicker('refresh');
        }
    }
</script>
<script>
    // document.getElementById("health_other").setAttribute("disabled", "disabled");
    function check() {
        var type = $('#health_state').val();
        if (type === 'disease') {   //  removeAttribute      setAttribute
//            document.getElementById("member_dis_date_ar").removeAttribute("disabled", "disabled");
//            document.getElementById("member_dis_reason").removeAttribute("disabled", "disabled");
            document.getElementById("member_dis_response_status").removeAttribute("disabled", "disabled");
            document.getElementById("member_dis_status").removeAttribute("disabled", "disabled");
            document.getElementById("member_disease_id_fk").removeAttribute("disabled", "disabled");
            document.getElementById("member_disability_id_fk").setAttribute("disabled", "disabled");
            //     document.getElementById("member_dis_date_ar").setAttribute("data-validation", "required");
//            document.getElementById("member_dis_reason").setAttribute("data-validation", "required");
            document.getElementById("member_dis_response_status").setAttribute("data-validation", "required");
            document.getElementById("member_dis_status").setAttribute("data-validation", "required");
            document.getElementById("member_disease_id_fk").setAttribute("data-validation", "required");
            document.getElementById("member_disability_id_fk").removeAttribute("data-validation", "required");
        } else if (type === 'disability') { //  removeAttribute      setAttribute
//            document.getElementById("member_dis_date_ar").removeAttribute("disabled", "disabled");
//            document.getElementById("member_dis_reason").removeAttribute("disabled", "disabled");
            document.getElementById("member_dis_response_status").removeAttribute("disabled", "disabled");
            document.getElementById("member_dis_status").removeAttribute("disabled", "disabled");
            document.getElementById("member_disease_id_fk").setAttribute("disabled", "disabled");
            document.getElementById("member_disability_id_fk").removeAttribute("disabled", "disabled");
//            document.getElementById("member_dis_date_ar").setAttribute("data-validation", "required");
//            document.getElementById("member_dis_reason").setAttribute("data-validation", "required");
            document.getElementById("member_dis_response_status").setAttribute("data-validation", "required");
            document.getElementById("member_dis_status").setAttribute("data-validation", "required");
            document.getElementById("member_disease_id_fk").removeAttribute("data-validation", "required");
            document.getElementById("member_disability_id_fk").setAttribute("data-validation", "required");
        } else if (type === 'good') {
//            document.getElementById("member_dis_date_ar").setAttribute("disabled", "disabled");
//            document.getElementById("member_dis_reason").setAttribute("disabled", "disabled");
            document.getElementById("member_dis_response_status").setAttribute("disabled", "disabled");
            document.getElementById("member_dis_status").setAttribute("disabled", "disabled");
            document.getElementById("member_disease_id_fk").setAttribute("disabled", "disabled");
            document.getElementById("member_disability_id_fk").setAttribute("disabled", "disabled");
//            document.getElementById("member_dis_date_ar").removeAttribute("data-validation", "required");
//            document.getElementById("member_dis_reason").removeAttribute("data-validation", "required");
            document.getElementById("member_dis_response_status").removeAttribute("data-validation", "required");
            document.getElementById("member_dis_status").removeAttribute("data-validation", "required");
            document.getElementById("member_disease_id_fk").removeAttribute("data-validation", "required");
            document.getElementById("member_disability_id_fk").removeAttribute("data-validation", "required");
        } else if (type == 0) {
            // document.getElementById("health_other").removeAttribute("disabled", "disabled");
            // document.getElementById("health_other").setAttribute("data-validation", "required");
        }
    }
</script>

<!-- <script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script> -->


<script>
    function get_dar(valu) {
        if (valu == 2) {
            document.getElementById("member_dar_markz_id_fk").setAttribute("disabled", "disabled");
            document.getElementById("member_dar_markz_id_fk").setAttribute("disabled", "disabled");
            $('#member_dar_markz_id_fk').val('');
        }
        if (valu == 1) {
            document.getElementById("member_dar_markz_id_fk").removeAttribute("disabled", "disabled");
            document.getElementById("member_dar_markz_id_fk").removeAttribute("disabled", "disabled");
        }
        if (valu == '') {
            document.getElementById("member_dar_markz_id_fk").setAttribute("disabled", "disabled");
            document.getElementById("member_dar_markz_id_fk").setAttribute("disabled", "disabled");
        }
    }
</script>


<script>
    function check_length_num(this_input, max_lenth, span_id) {
        if ($(this_input).val().length != max_lenth) {
            $(this_input).css("border-color", "red");
            $("#" + span_id).html("الرقم مكون من" + max_lenth + "أرقام");
            $('button[type="submit"]').attr("disabled", "disabled");
        } else {
            $(this_input).css("border-color", "green");
            $("#" + span_id).html("");
            $('button[type="submit"]').removeAttr("disabled");
        }
    }
</script>


<script>
    function GetHij_Status(valu) {
        if (valu == 1) {
            // document.getElementById("member_haj_geha").removeAttribute("disabled", "disabled");
            document.getElementById("member_last_hij_date").removeAttribute("disabled", "disabled");
            // document.getElementById("member_haj_geha").setAttribute("data-validation", "required");
            document.getElementById("member_last_hij_date").setAttribute("data-validation", "required");


        } else {

            // document.getElementById("member_haj_geha").setAttribute("disabled", "disabled");
            document.getElementById("member_last_hij_date").setAttribute("disabled", "disabled");
            // $('#member_haj_geha').val('');
            $('#member_last_hij_date').val('');


        }


    }


    function GetOmra_Status(valu) {


        if (valu == 1) {
            // document.getElementById("member_omra_geha").removeAttribute("disabled", "disabled");
            document.getElementById("member_last_omra_date").removeAttribute("disabled", "disabled");
            // document.getElementById("member_omra_geha").setAttribute("data-validation", "required");
            document.getElementById("member_last_omra_date").setAttribute("data-validation", "required");
        } else {
            // document.getElementById("member_omra_geha").setAttribute("disabled", "disabled");
            document.getElementById("member_last_omra_date").setAttribute("disabled", "disabled");
            // $('#member_omra_geha').val('');
            $('#member_last_omra_date').val('');
        }
    }


</script>


<script>


    function check_rehabilitation(valu) {

        if (valu == 1) {
            document.getElementById("member_rehabilitation_value").removeAttribute("disabled", "disabled");

        } else {
            $('#member_rehabilitation_value').val('');
            document.getElementById("member_rehabilitation_value").setAttribute("disabled", "disabled");

        }


    }


    function other_skill_function() {
        if ($('#check_button').attr('data-click-state') == 1) {
            $('#check_button').attr('data-click-state', 0);

            document.getElementById("member_other_skill").removeAttribute("disabled", "disabled");
        } else if ($('#check_button').attr('data-click-state') == 0) {
            $('#check_button').attr('data-click-state', 1);

            document.getElementById("member_other_skill").setAttribute("disabled", "disabled");
            $('#member_other_skill').val('');
        }

    }

</script>


<!-- yara -->
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


<!-- /***************************************************footer script **********************************************************/ -->

<!--<script src="--><?php //echo base_url() ?><!--asisst/admin_asset/js/hijri_converter.js"></script>-->


<script language=Javascript>
    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>
<script language="javascript" type="text/javascript">
    function moveOnMax(field, nextFieldID) {
        if (field.value.length >= field.maxLength) {
            nextFieldID.focus();
        }
    }
</script>


<!-- /***************************************************footer script **********************************************************/ -->
