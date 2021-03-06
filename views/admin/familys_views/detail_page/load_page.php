<style>
    .load-tabs .nav-tabs li {
        border-bottom: 4px solid #fcb632;
        background-color: #fff;
        margin-bottom: 8px;
        box-shadow: 2px 3px 8px;
    }

    .load-tabs .nav-tabs {
        border-bottom: none !important;
        background-color: unset !important;
        margin-bottom: 8px;
        box-shadow: 2px 3px 8px;
    }
</style>
<div class="col-xs-12 col-sm-12 ">
    <div class="col-md-2 col-sm-3 load-tabs ">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-stacked">
            <li class="active"><a href="#father" data-toggle="tab">بيانات الاب</a></li>
            <li><a href="#mother" data-toggle="tab">بيانات الام </a></li>

            <li><a href="#wakeel" data-toggle="tab">بيانات الوكيل </a></li>
            <li><a href="#sons" data-toggle="tab">بيانات أفراد الأسرة </a></li>
            <li><a href="#house" data-toggle="tab">بيانات السكن</a></li>
            <li><a href="#devices" data-toggle="tab">محتويات السكن </a></li>
            <li><a href="#home_needs" data-toggle="tab">إحتياجات الأسرة</a></li>
            <li><a href="#attach_files" data-toggle="tab">رفع الوثائق</a></li>
            <li><a href="#money" data-toggle="tab">مصادر الدخل والإلتزامات</a></li>
            <!-------------------- 774 ----------------------------------->
            <li><a href="#research" data-toggle="tab">رأى الباحث </a></li>


            <li><a href="#bank_account" data-toggle="tab">بيانات الحساب البنكي</a></li>
            <li><a href="#history_files" data-toggle="tab">عمليات على الملف </a></li>
            <!-------------------- 774 ----------------------------------->
        </ul>
    </div>
    <!-- Tab panels -->
    <div class="tab-content col-md-10">
        <!------------------------------------------------------------------------------------------------>
        <!------------------------------------------------------------------------------------------------>
        <div class="tab-pane fade in active" id="father">
            <div>
                <?php if ($family_data['father'] != '' && $family_data['father'] != null && !empty($family_data['father'])) { ?>
                    <div class="personality">

                        <div class="col-xs-12 no-padding">

                            <table class="table table-devices" style="table-layout: fixed">
                                <tbody>
                                <tr>
                                    <th colspan="6" style="text-align: center">بيانات الاب</th>
                                </tr>
                                <tr>

                                    <th style="width: 14%;">الاسم رباعي</th>
                                    <td><?php echo $family_data['father']->full_name; ?></td>

                                    <th style="width: 14%;">رقم الهوية</th>
                                    <td><?php echo $family_data['father']->f_national_id; ?></td>
                                    <th style="width: 14%;">نوع الهوية</th>
                                    <td><?php if (!empty($family_data['father']->f_national_type_n)) {
                                            echo $family_data['father']->f_national_type_n;
                                        } ?></td>

                                </tr>
                                <tr>

                                    <th> مصدر الهوية</th>
                                    <td><?php if (!empty($family_data['father']->f_card_source_n)):
                                            echo $family_data['father']->f_card_source_n;endif; ?></td>
                                    <th>تاريخ الميلاد</th>
                                    <td><?php echo $family_data['father']->f_birth_date; ?></td>

                                    <th>تاريخ الميلاد الهجري</th>
                                    <td><?php echo $family_data['father']->f_birth_date_hijri; ?></td>
                                </tr>
                                <tr>
                                    <th>العمر</th>
                                    <td><?php if ($family_data['father']->f_birth_date_year > 0) {
                                            echo date('Y') - $family_data['father']->f_birth_date_year;
                                        } else {
                                            echo 0;
                                        } ?></td>


                                    <!--                                osama-->
                                    <th>عدد الذكور</th>
                                    <td><?php if ($family_data['father']->f_female_num) {
                                            echo $family_data['father']->f_female_num;
                                        } ?></td>

                                    <th>عدد الإناث</th>
                                    <td><?php if ($family_data['father']->f_child_num) {
                                            echo $family_data['father']->f_female_num;
                                        } ?></td>
                                </tr>
                                <tr>

                                    <th>الجنسية</th>
                                    <td><?php if (!empty($family_data['father']->f_nationality_n)) {
                                            echo $family_data['father']->f_nationality_n;
                                        } ?></td>
                                    <th>اضافه جنسيه اخري</th>
                                    <td> <?php echo $family_data['father']->nationality_other; ?></td>

                                    <th> المهنة</th>
                                    <td><?php echo $family_data['father']->f_job; ?> </td>
                                </tr>
                                <tr>

                                    <th>سبب الوفاة</th>
                                    <td><?php echo $family_data['father']->f_death_reason; ?> </td>

                                    <th>السبب</th>
                                    <td><?php echo $family_data['father']->f_death_reason_fk; ?></td>

                                    <th>تاريخ الوفاة</th>
                                    <td><?php echo $family_data['father']->f_death_date; ?></td>
                                </tr>
                                <tr>
                                    <th>عدد الأبناء</th>
                                    <td><?php echo $family_data['father']->f_child_num; ?></td>
                                    <th>عدد الزوجات</th>
                                    <td><?php echo $family_data['father']->f_wive_count; ?></td>


                                    <th>عدد أفراد الاسرة</th>
                                    <td><?php echo $family_data['father']->family_members_number; ?></td>
                                </tr>


                                </tbody>
                            </table>

                        </div>
                    </div>

                <?php } else if ($family_data['father'] == '' && $family_data['father'] == null) { ?>
                    <div class="col-lg-12 alert alert-danger">لا توجد بيانات للاب</div>
                <?php } ?>
            </div>
        </div>
        <!------------------------------------------------------------------------------------------------>
        <!------------------------------------------------------------------------------------------------>
        <div class="tab-pane fade  " id="mother">
            <div>

                <?php if ($family_data['mother'] != '' && $family_data['mother'] != null && !empty($family_data['mother'])) { ?>

                    <div class="personality">

                        <div class="col-xs-12 no-padding">

                            <table class="table table-devices" style="table-layout: fixed">
                                <tbody>
                                <tr>
                                    <th colspan="6" style="text-align: center">بيانات الام</th>
                                </tr>
                                <tr>
                                    <th>رقم السجل المدني للأم</th>
                                    <td><?php echo $family_data['mother']->mother_national_num_fk; ?> </td>
                                    <th>رقم الهوية</th>
                                    <td><?php echo $family_data['mother']->m_national_id; ?></td>

                                    <th>الاسم الرباعي</th>
                                    <td><?php echo $family_data['mother']->full_name; ?> </td>
                                </tr>
                                <tr>
                                    <th>تاريخ الميلاد</th>
                                    <td><?php echo $family_data['mother']->m_birth_date_hijri; ?> </td>

                                    <th>العمر</th>
                                    <td><?php if ($family_data['mother']->m_birth_date_year > 0) {
                                            echo date('Y') - $family_data['mother']->m_birth_date_year;
                                        } else {
                                            echo 0;
                                        } ?></td>
                                    <th>صلة القرابة</th>
                                    <td><?php if (!empty($family_data['mother']->m_relationship_n)):
                                            echo $family_data['mother']->m_relationship_n;
                                        endif; ?></td>
                                </tr>
                                <tr>
                                    <th> الحالة الإجتماعية</th>
                                    <td><?php echo $family_data['mother']->m_marital_status_n; ?> </td>
                                    <th>الجنسية</th>
                                    <td><?php if (!empty($family_data['mother']->m_nationality_n)) {
                                            echo $family_data['mother']->m_nationality_n;
                                        } ?></td>

                                    <th> جنسيه اخري</th>
                                    <td><?php echo $family_data['mother']->nationality_other; ?> </td>
                                </tr>
                                <tr>
                                    <th>السكن</th>
                                    <td><?php echo $family_data['mother']->m_living_place_id_fk; ?> </td>

                                    <th> محل سكن</th>
                                    <td><?php echo $family_data['mother']->m_living_place; ?> </td>
                                    <th>نوع الهوية</th>
                                    <td><?php if (!empty($family_data['mother']->m_national_type_n)) {
                                            echo $family_data['mother']->m_national_type_n;
                                        } ?></td>
                                </tr>


                                <tr>
                                    <th>الحالة الصحية</th>
                                    <td><?php

                                        if ($family_data['mother']->m_health_status_id_fk === 'disease') {
                                            echo 'مريض';
                                        } elseif ($family_data['mother']->m_health_status_id_fk === 'disability') {
                                            echo 'معاق';
                                        } else {
                                            if (!empty($family_data['mother']->m_health_status_id_fk)):
                                                echo $family_data['mother']->m_health_status_id_fk;
                                            endif;
                                        } ?> </td>
                                    <th>
                                        <?php if ($family_data['mother']->m_health_status_id_fk === 'disease') {
                                            echo 'نوع المرض';
                                        } elseif ($family_data['mother']->m_health_status_id_fk === 'disability') {
                                            echo 'نوع الإعاقة';
                                        } ?>
                                    </th>
                                    <td><?php if ($family_data['mother']->m_health_status_id_fk === 'disease') {

                                            if (!empty($family_data['mother']->disease_n)):
                                                echo $family_data['mother']->disease_n;
                                            endif;
                                        } elseif ($family_data['mother']->m_health_status_id_fk === 'disability') {
                                            if (!empty($family_data['mother']->disability_n)):
                                                echo $family_data['mother']->disability_n;
                                            endif;
                                        } ?> </td>

                                    <th>سبب المرض/الإعاقة</th>
                                    <td><?php echo $family_data['mother']->dis_reason; ?> </td>
                                </tr>
                                <tr>
                                    <th>جهة المتابعة المرض/الإعاقة</th>
                                    <td><?php
                                        if (!empty($family_data['mother']->dis_response_status_n)):
                                            echo $family_data['mother']->dis_response_status_n;
                                        endif; ?> </td>

                                    <th>وضع الحالة المرض/الإعاقة</th>
                                    <td><?php if (!empty($family_data['mother']->dis_status_n)):
                                            echo $family_data['mother']->dis_status_n;
                                        endif; ?> </td>
                                    <th>المهارة</th>
                                    <td><?php echo $family_data['mother']->m_skill_name; ?> </td>
                                </tr>
                                <tr>
                                    <th>الحياة العملية</th>
                                    <td><?php
                                        $arr_work = array('', 'لا يعمل', 'يعمل');
                                        if (!empty($family_data['mother']->m_want_work)) {
                                            echo $family_data['mother']->m_want_work;
                                        } ?></td>
                                    <th> طبيعة الفرد</th>
                                    <td><?php if (!empty($family_data['mother']->person_type_n)) {
                                            echo $family_data['mother']->person_type_n;
                                        } ?></td>

                                    <th>المهنة</th>
                                    <td><?php
                                        if (!empty($family_data['mother']->m_job_n)) {
                                            echo $family_data['mother']->m_job_n;
                                        } ?>
                                    </td>
                                </tr>

                                <tr>
                                    <th>الدخل الشهرى</th>
                                    <td><?php echo $family_data['mother']->m_monthly_income; ?> </td>

                                    <th>المستوى التعليمى</th>
                                    <td><?php echo $family_data['mother']->m_education_level_n; ?> </td>
                                    <th>التخصص</th>
                                    <td><?php echo $family_data['mother']->m_specialization_n; ?> </td>
                                </tr>
                                <tr>
                                    <th>الحالة الدراسية</th>
                                    <td><?php echo $family_data['mother']->m_education_status_id_fk; ?> </td>
                                    <th>ملتحقة بدار نسائية</th>
                                    <td><?php if (!empty($family_data['mother']->m_female_house_check)) {
                                            echo $family_data['mother']->m_female_house_check;
                                        } ?></td>
                                    <th>إسم الدار</th>
                                    <td><?php if (!empty($family_data['mother']->m_female_house_n)):
                                            echo $family_data['mother']->m_female_house_n;
                                        endif; ?> </td>
                                </tr>
                                <tr>
                                    <th>أداء فريضة الحج</th>
                                    <td><?php if (!empty($family_data['mother']->m_hijri)) {
                                            echo $family_data['mother']->m_hijri;
                                        } ?></td>


                                    <th>أداء فريضة العمرة</th>
                                    <td><?php if (!empty($family_data['mother']->m_ommra)) {
                                            echo $family_data['mother']->m_ommra;
                                        } ?></td>
                                    <th>رقم الجوال</th>
                                    <td><?php echo $family_data['mother']->m_mob; ?> </td>
                                </tr>
                                <tr>

                                    <th>رقم جوال أخر</th>
                                    <td><?php echo $family_data['mother']->m_another_mob; ?> </td>

                                    <th>البريد الإلكترونى</th>
                                    <td><?php echo $family_data['mother']->m_email; ?> </td>

                                    <th>القدرة علي العمل</th>
                                    <td><?php
                                        if (!empty($family_data['mother']->ability_work)) {
                                            echo $family_data['mother']->ability_work;
                                        } ?> </td>
                                </tr>
                                <tr>
                                    <th>نوع العمل</th>
                                    <td><?php
                                        if (!empty($family_data['mother']->work_type_n)) {
                                            echo $family_data['mother']->work_type_n;
                                        } ?></td>

                                    <th>طبيعة الشخصية</th>
                                    <td><?php
                                        if (isset($family_data['mother']->personal_character_n)) {
                                            echo $family_data['mother']->personal_character_n;
                                        } ?></td>
                                    <th>العلاقة بالأسرة</th>
                                    <td><?php
                                        if (isset($family_data['mother']->relation_with_family_n)) {
                                            echo $family_data['mother']->relation_with_family_n;
                                        } ?> </td>
                                </tr>


                                <tr>

                                    <th> مكفول</th>
                                    <td><?php if (!empty($family_data['mother']->guaranteed_m)) {
                                            echo $family_data['mother']->guaranteed_m;
                                        } ?></td>
                                    <th>هاتف العمل</th>
                                    <td><?php if (!empty($family_data['mother']->m_place_mob)) {
                                            echo $family_data['mother']->m_place_mob;
                                        } ?> </td>


                                    <th> طبيعة الفرد</th>
                                    <td><?php if (!empty($family_data['mother']->person_type_n)) {
                                            echo $family_data['mother']->person_type_n;
                                        } ?></td>
                                </tr>
                                <tr>
                                    <th>التصنيف</th>
                                    <td><?php if (!empty($family_data['mother']->categoriey_m)) {
                                            echo $family_data['mother']->categoriey_m;
                                        } ?> </td>


                                    <th> حاله المستفيد</th>
                                    <td><?php if (!empty($family_data['mother']->halt_elmostafid_m_n)) {
                                            echo $family_data['mother']->halt_elmostafid_m_n;
                                        } ?></td>
                                    <th>الجنس</th>
                                    <?php $gender_arr = array('', 'ذكر', 'أنثى'); ?>
                                    <td><?php if (!empty($family_data['mother']->m_gender)) {
                                            echo $family_data['mother']->m_gender;
                                        } ?> </td>
                                </tr>

                                <?php /*if( $family_data['mother']->m_account == 1){?>
                                    <tr>

                                        <th   >مسئول الحساب</th>
                                        <td><?php  if(!empty([$family_data['mother']->m_account])){ echo  $family_data['mother']->m_account];  }?></td>
                                    </tr>
                                    <tr>
                                        <th  >إسم الحساب</th>
                                        <td><?php  if(!empty([$family_data['mother']->m_account_id])){ echo  $family_data['mother']->m_account_id];  }?></td>
                                    </tr>

                                <?php }*/ ?>


                                </tbody>
                            </table>

                        </div>
                    </div>


                <?php } else { ?>
                    <div class="col-lg-12 alert alert-danger">لا توجد بيانات للام</div>

                <?php } ?>
            </div>
        </div>

        <!------------------ بيانات الوكيل ------------------------------------->
        <div class="tab-pane fade  " id="wakeel">
            <div>

                <?php if ($family_data['wakel'] == '' && $family_data['wakel'] == null) {
                    ?>
                    <div class="col-lg-12 alert alert-danger">لا توجد بيانات للوكيل</div>
                <?php } else { ?>
                    <table class="table table-devices" style="table-layout: fixed">
                        <tbody>
                        <tr>
                            <th colspan="6" style="text-align: center">بيانات الوكيل</th>
                        </tr>
                        <tr>
                            <th>رقم السجل المدني للاب</th>
                            <td><?php if (!empty($family_data['father']->f_national_id)) {
                                    echo $family_data['father']->f_national_id;
                                } ?></td>
                            <th>اسم الاب الرباعي</th>
                            <td><?php if (!empty($family_data['father']->full_name)) {
                                    echo $family_data['father']->full_name;
                                } ?></td>
                            <th>إسم الوكيل رباعي</th>
                            <td><?php echo $family_data['wakel']->w_name; ?></td>
                        </tr>
                        <tr>
                            <th>رقم الهوية</th>
                            <td><?php echo $family_data['wakel']->w_national_id; ?></td>
                            <th>نوع الهوية</th>
                            <td><?php echo $family_data['wakel']->w_national_type_n; ?></td>

                            <th>مصدر الهوية</th>
                            <td><?php echo $family_data['wakel']->w_card_source_n; ?></td>
                        </tr>
                        <tr>
                            <th> تاريخ الميلاد هجرى</th>
                            <td><?php if (!empty($family_data['wakel']->w_birth_date_hijri)) {
                                    echo $family_data['wakel']->w_birth_date_hijri;
                                } ?></td>
                            <th> تاريخ الميلاد</th>
                            <td><?php if (!empty($family_data['wakel']->w_birth_date)) {
                                    echo $family_data['wakel']->w_birth_date;
                                } ?></td>
                            <th> العمر</th>
                            <td>
                                <?php
                                if (!empty($current_year) && !empty($w_birth_date_hijri_year)) {
                                    echo $current_year - $family_data['wakel']->w_birth_date_hijri_year;
                                } ?>
                            </td>
                        </tr>
                        <tr>
                            <th>الصلة</th>
                            <td><?php echo $family_data['wakel']->relationship_id_fk_n; ?></td>
                            <th>الحالة الإجتماعية</th>
                            <td><?php echo $family_data['wakel']->w_marital_status_n; ?></td>
                            <th>رقم الجوال</th>
                            <td><?php if (!empty($w_mob)) {
                                    echo $w_mob;
                                } ?></td>
                        </tr>
                        <tr>
                            <th>الحياة العملية</th>
                            <td><?php echo $family_data['wakel']->w_want_work; ?></td>

                            <th>المهنة</th>
                            <td><?php echo $family_data['wakel']->w_job_n; ?></td>
                            <th>إسم جهة العمل</th>
                            <td><?php if (!empty($family_data['wakel']->employer)) {
                                    echo $family_data['wakel']->employer;
                                } ?></td>
                        </tr>
                        <tr>
                            <th>مكان العمل</th>
                            <td><?php if (!empty($family_data['wakel']->job_place)) {
                                    echo $family_data['wakel']->job_place;
                                } ?></td>
                            <th>هاتف العمل</th>
                            <td><?php if (!empty($family_data['wakel']->job_mob)) {
                                    echo $family_data['wakel']->job_mob;
                                } ?></td>
                            <th>الدخل الشهري</th>
                            <td><?php if (!empty($family_data['wakel']->salary)) {
                                    echo $family_data['wakel']->salary;
                                } ?></td>
                        </tr>
                        <tr>
                            <th>هل يعول</th>
                            <td><?php echo $family_data['wakel']->guaranted; ?></td>
                            <th>عدد الأفراد</th>
                            <td><?php if (!empty($family_data['wakel']->persons_num)) {
                                    echo $family_data['wakel']->persons_num;
                                } ?></td>
                            <th>صورة الهوية</th>
                            <td><?php if (!empty($family_data['wakel']->w_national_img)) { ?>
                                    <a href="<?php echo base_url() ?>uploads/images/<?php echo $family_data['wakel']->w_national_img; ?>"
                                       download> <i
                                                class="fa fa-download"></i> </a>
                                    <a href="#" data-toggle="modal"
                                       data-target="#myModal-view<?php echo $family_data['wakel']->id; ?>"> <i
                                                class="fa fa-eye"></i> </a>
                                    <div class="modal fade" id="myModal-view<?php echo $family_data['wakel']->id; ?>"
                                         tabindex="-1"
                                         role="dialog"
                                         aria-labelledby="myModalLabel">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close"><span
                                                                aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">صورة الهوية</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <img src="<?php echo base_url() ?>uploads/images/<?php echo $family_data['wakel']->w_national_img; ?>"
                                                         width="100%">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                                        إغلاق
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } else {
                                    echo "لاتوجد صورة مرفقة";
                                } ?></td>
                        </tr>
                        </tbody>
                    </table>
                <?php } ?>
            </div>
        </div>
        <div class="tab-pane fade" id="sons">
            <div>
                <?php if (isset($family_data['member']) && $family_data['member'] != null) { ?>
                    <table class="table table-striped" style="width:100%;table-layout: fixed">
                        <thead>
                        <tr>
                            <th colspan="6" style="text-align: center">بيانات الافراد</th>
                        </tr>
                        <tr class="greentd">
                            <th style="width: 25px;">م</th>
                            <th style="width: 17%;">الإسم</th>
                            <th>رقم الهوية</th>
                            <th>الصلة</th>
                            <th>الجنس</th>
                            <th>تاريخ الميلاد هجري</th>
                            <th>العمر</th>
                            <th>التصنيف</th>
                            <th>حالة الكفالة</th>
                            <th>حالة الفرد</th>
                            <th> السبب</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $x = 2;
                        foreach ($family_data['member'] as $row) { ?>
                            <tr>
                                <td><?php echo $x; ?></td>
                                <td><?php echo $row->member_full_name; ?></td>
                                <td><?php echo $row->member_card_num; ?></td>
                                <td><?php echo $row->relation_name; ?></td>
                                <!--
                            <td><?php if (isset($mothers_data[0]->full_name)) {
                                    echo $mothers_data[0]->full_name;
                                } ?></td>
                           -->
                                <td><?php if ($row->member_gender == 1) {
                                        echo 'ذكر';
                                    } else {
                                        echo 'انثى';
                                    } ?></td>
                                <td><?php echo $row->member_birth_date_hijri; ?></td>
                                <td>
                                    <?php
                                    echo $row->age ;
                                    ?>
                                </td>
                                <td><?php //echo $row->halet_member_name;
                                    if ($row->categoriey_member == 1) {
                                        $categoriey_member = 'أرمل ';
                                    } elseif ($row->categoriey_member == 2) {
                                        $categoriey_member = 'يتيم ';
                                    } elseif ($row->categoriey_member == 3) {
                                        $categoriey_member = 'مستفيد ';
                                    } else {
                                        $categoriey_member = 'غير محدد  ';
                                    }
                                    echo $categoriey_member;
                                    ?>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-info"
                                        <?php if ($row->first_k_id != 0) {
                                            ?> onclick="LoadTable(<?php echo $row->id;
                                            ?>)" data-toggle="modal" data-target="#kafala_details_modal" <?php } ?>>
                                        <?php if ($row->first_k_id != 0) {
                                            echo 'مكفول';
                                        } else {
                                            echo 'غير مكفول';
                                        }
                                        ?>
                                    </button>
                                </td>
                                <td style="background-color: <?= $row->color ?>"> <?php echo $row->halet_member_name; ?></td>
                                <td><?php
                                    if ($row->persons_process_reason == 0) {
                                        $persons_process_reason = 'غير محدد ';
                                    } else {
                                        $persons_process_reason = $row->reason;
                                    }
                                    echo $persons_process_reason;
                                    //   echo $row->reason;
                                    ?> </td>
                            </tr>
                            <?php $x++;
                        } ?>
                        </tbody>
                    </table>
                <?php } else { ?>
                    <div class="col-lg-12 alert alert-danger"> لا يوجد أبناء للأسرة</div>
                <?php } ?>
            </div>
        </div>
        <div class="tab-pane fade" id="house">
            <div>
                <?php if ($family_data['houses'] != '' && $family_data['houses'] != null && !empty($family_data['houses'])) { ?>
                    <table class="table table-devices" style="table-layout: fixed">
                        <tbody>
                        <tr>
                            <th colspan="6" style="text-align: center">بيانات السكن</th>
                        </tr>
                        <tr>
                            <th>رقم حساب فاتورة الكهرباء</th>
                            <td><?php echo $family_data['houses']->h_electricity_account; ?></td>
                            <th>رقم حساب عداد المياه</th>
                            <td><?php echo $family_data['houses']->h_water_account; ?></td>
                            <th>المنطقة</th>
                            <td>
                                <?php if (!empty([$family_data['houses']->h_area_name])) {
                                    echo $family_data['houses']->h_area_name;
                                } ?></td>
                        </tr>
                        <tr>
                            <th>المدينة</th>
                            <td><?php if (!empty([$family_data['houses']->h_city_name])) {
                                    echo $family_data['houses']->h_city_name;
                                } ?></td>
                            <th>الحى</th>
                            <td><?php if (!empty([$family_data['houses']->h_village_name])) {
                                    echo $family_data['houses']->h_village_name;
                                } ?></td>
                            <!-- <td><?php echo $family_data['houses']->hai_name; ?></td> -->
                            <th>الشارع</th>
                            <td><?php echo $family_data['houses']->h_street; ?></td>
                        </tr>
                        <tr>
                            <th>أقرب مدرسة</th>
                            <td><?php echo $family_data['houses']->h_nearest_school; ?></td>
                            <th>أقرب معلم</th>
                            <td><?php echo $family_data['houses']->h_nearest_teacher; ?></td>
                            <th>أقرب مسجد</th>
                            <td><?php echo $family_data['houses']->h_mosque; ?></td>
                        </tr>
                        <tr>
                            <th>نوع السكن</th>
                            <td><?php if (!empty([$family_data['houses']->h_house_type_tilte])) {
                                    echo $family_data['houses']->h_house_type_tilte;
                                } ?></td>
                            <th>لون المنزل</th>
                            <td><?php echo $family_data['houses']->h_house_color; ?></td>
                            <th>اتجاه المنزل</th>
                            <td><?php if (!empty([$family_data['houses']->h_house_direction_tilte])) {
                                    echo $family_data['houses']->h_house_direction_tilte;
                                } ?></td>
                        </tr>
                        <tr>
                            <th>الحالة</th>
                            <td><?php if (!empty([$family_data['houses']->h_house_status_tilte])) {
                                    echo $family_data['houses']->h_house_status_tilte;
                                } ?></td>
                            <th>عدد الغرف</th>
                            <td><?php echo $family_data['houses']->h_rooms_account; ?></td>
                            <th>مقترض من البنك العقارى</th>
                            <td><?php echo $family_data['houses']->h_borrow_from_bank; ?></td>
                        </tr>
                        <tr>
                            <th>القيمة</th>
                            <td><?php echo $family_data['houses']->h_borrow_remain; ?></td>
                            <th>ملكية السكن</th>
                            <td><?php if (!empty([$family_data['houses']->h_house_owner_tilte])) {
                                    echo $family_data['houses']->h_house_owner_tilte;
                                } ?></td>
                            <th>مقدار الإيجار السنوى</th>
                            <td><?php echo $family_data['houses']->h_rent_amount; ?></td>
                        </tr>
                        <tr>
                            <th>عدد دورات المياه</th>
                            <td><?php echo $family_data['houses']->h_bath_rooms_account; ?></td>
                            <th>مساحة البناء</th>
                            <td><?php echo $family_data['houses']->h_house_size; ?></td>
                            <th>قرض ترميم من بنك التسليف</th>
                            <td><?php echo $family_data['houses']->h_loan_restoration; ?></td>
                        </tr>
                        <tr>
                            <th>القيمة المتبقية</th>
                            <td><?php echo $family_data['houses']->h_loan_restoration_remain; ?></td>
                            <th>الرقم الصحى</th>
                            <td><?php echo $family_data['houses']->h_health_number; ?></td>
                            <?php if ($family_data['houses']->h_house_owner_id_fk === 'rent'){ ?>
                            <th>إسم المؤجر</th>
                            <td><?php echo $family_data['houses']->h_renter_name; ?></td>
                        </tr>
                        <tr>
                            <th>رقم الجوال</th>
                            <td><?php echo $family_data['houses']->h_renter_mob; ?></td>
                            <th>تاريخ بداية العقد</th>
                            <td><?php echo $family_data['houses']->contract_start_date; ?></td>
                            <th>تاريخ نهاية العقد</th>
                            <td><?php echo $family_data['houses']->contract_end_date; ?></td>
                        </tr>
                        <?php } else { ?>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                <?php } else { ?>
                    <div class="col-lg-12 alert alert-danger">لا توجد بيانات</div>
                <?php } ?>
            </div>
        </div>
        <div class="tab-pane fade" id="devices">
            <div>
                <?php if (isset($family_data['devices']) && $family_data['devices'] != null): ?>
                    <table class="table table-striped" id="tab_logic" style="table-layout: fixed">
                        <thead>
                        <tr>
                            <th colspan="6" style="text-align: center">بيانات محتويات السكن</th>
                        </tr>
                        <tr class="greentd">
                            <th>م</th>
                            <th style="text-align: center">النوع</th>
                            <th style="text-align: center">الوصف</th>
                            <th style="text-align: center">العدد</th>
                            <th style="text-align: center">الحالة</th>
                            <th style="text-align: center">ملاحظات</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $house_device_status = array('إختر', 'جيد', 'متوسط', 'غير جيد', 'يحتاج');
                        $a = 1;
                        foreach ($family_data['devices'] as $row): ?>
                            <tr>
                                <td><?php echo $a; ?></td>
                                <!-- <td><?php echo $row->title_setting; ?> </td>-->
                                <td><?php echo $row->main_name; ?> </td>
                                <td><?php echo $row->name; ?> </td>
                                <td><?php echo $row->d_count ?></td>
                                <td><?php echo $row->d_house_device_status_name ?></td>
                                <td><?php echo $row->d_note ?></td>
                            </tr>
                            <?php $a++; endforeach ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <div class="col-lg-12 alert alert-danger"> لاتوجد أجهزة</div>
                <?php endif; ?>
            </div>
        </div>
        <div class="tab-pane fade" id="home_needs">
            <div>
                <?php if (isset($family_data['home_needs']) && $family_data['home_needs'] != null): ?>
                    <table class="table table-striped" id="tab_logic">
                        <thead>
                        <tr>
                            <th colspan="5" style="text-align: center">بيانات احتياجات الاسرة</th>
                        </tr>
                        <tr class="greentd">
                            <th>م</th>
                            <th style="text-align: center">النوع</th>
                            <th style="text-align: center">الوصف</th>
                            <th style="text-align: center">العدد</th>
                            <th style="text-align: center">ملاحظات</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $a = 1;
                        foreach ($family_data['home_needs'] as $row): ?>
                            <tr>
                                <td><?php echo $a; ?></td>
                                <td><?php echo $row->main_name; ?> </td>
                                <td><?php echo $row->name; ?> </td>
                                <td><?php echo $row->h_count ?></td>
                                <td><?php echo $row->h_note ?></td>
                            </tr>
                            <?php $a++; endforeach ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <div class="col-lg-12 alert alert-danger"> لاتوجد إحتياجات للأسرة</div>
                <?php endif; ?>
            </div>
        </div>
        <div class="tab-pane fade" id="attach_files">
            <div>
                <?php if ($family_data['family_attach_files'] != '' && isset($family_data['family_attach_files'])) { ?>
                    <div class="col-xs-12 no-padding">
                        <table class="table table-devices table-striped" style="table-layout: fixed">
                            <thead>
                            <tr>
                                <th colspan="4" style="text-align: center">بيانات الوثائق</th>
                            </tr>
                            <tr class="greentd">
                                <th style="width: 70px;">م</th>
                                <th>إسم المستند</th>
                                <th style="width: 150px;">حالة المستند</th>
                                <th style="width: 150px;">صورة المستند</th>
                            </tr>
                            </thead>
                            <?php
                            if (isset($family_data['family_attach_files']) && !empty($family_data['family_attach_files'])) {
                                $x = 1;

                                $image_type = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP');
                                $files_type = array('pdf', 'PDF', 'xls', 'xlsx', ',doc', 'docx', 'txt');

                                foreach ($family_data['family_attach_files'] as $row) {
                                    $filename = $row->file_attach_name;
                                    $ext = pathinfo($filename, PATHINFO_EXTENSION);
                                    $folder = 'uploads/family_attached';

                                    $url = base_url() . $folder . '/' . $row->file_attach_name;
                                    /*if (($row->file_attach_id_fk == 'مرفقات السكن')) {
                                        $folder = 'uploads/family_attached';

                                        $url = base_url() . $folder . '/' . $row->file_attach_name;
                                    } else {
                                        $folder = 'uploads/family_attached';

                                        $url = base_url() . $folder . '/' . $row->file_attach_name;
                                    }*/
                                    ?>


                                    <tr>
                                        <td> <?php echo $x; ?> </td>
                                        <td><?php echo $row->morfaq_name; ?> </td>
                                        <td>
                                            <?php if (!empty($row->file_attach_name)) {
                                                echo "<label class='label label-success'>تم الرفع </label>";
                                            } else {
                                                echo " <label class='label label-danger'>لم يتم الرفع </label>";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                    <?php

                                    if (in_array($ext, $image_type)) { ?>
                                        <a target="_blank" onclick="show_img('<?= $url ?>')">
                                            <i class=" fa fa-eye"></i>
                                        </a>

                                    <?php } elseif (in_array($ext, $files_type)) { ?>

                                        <a target="_blank" onclick="show_bdf('<?= $url ?>')">
                                            <i class=" fa fa-eye"></i>
                                        </a>
                                    <?php } ?>
                                        </td>
                                    </tr>
                                    <?php
                                    $x++;
                                }
                            } ?>
                            <?php
                            if (isset($family_data['family_attach_files_other']) && !empty($family_data['family_attach_files_other'])) {
                                $x = 1;

                                $image_type = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP');
                                $files_type = array('pdf', 'PDF', 'xls', 'xlsx', ',doc', 'docx', 'txt');

                                foreach ($family_data['family_attach_files_other'] as $row) {
                                    $filename = $row->file_attach_name;
                                    $ext = pathinfo($filename, PATHINFO_EXTENSION);
                                    $folder = 'uploads/family_attached';

                                    $url = base_url() . $folder . '/' . $row->file_attach_name;
                                    /*if (($row->file_attach_id_fk == 'مرفقات السكن')) {
                                        $folder = 'uploads/family_attached/house';

                                        $url = base_url() . $folder . '/' . $row->file_attach_name;
                                    } else {
                                        $folder = 'uploads/family_attached';

                                        $url = base_url() . $folder . '/' . $row->file_attach_name;
                                    }*/
                                    ?>

                                    <tr>
                                        <td> <?php echo $x; ?> </td>
                                        <td><?php echo $row->file_attach_id_fk; ?> </td>
                                        <td>
                                            <?php if (!empty($row->file_attach_name)) {
                                                echo "<label class='label label-success'>تم الرفع </label>";
                                            } else {
                                                echo " <label class='label label-danger'>لم يتم الرفع </label>";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                           <a href="<?php echo base_url() . 'family_controllers/Family/downloads_new/' . $row->file_attach_name ?>"
                                               download>
                                                <i class="fa fa-download" title="تحميل"></i> </a>
                                            <?php

                                            if (in_array($ext, $image_type)) { ?>
                                                <a target="_blank" onclick="show_img('<?= $url ?>')">
                                                    <i class=" fa fa-eye"></i>
                                                </a>

                                            <?php } elseif (in_array($ext, $files_type)) { ?>

                                                <a target="_blank" onclick="show_bdf('<?php echo base_url() . "family_controllers/Family/read_attached_file/" . $row->file_attach_name  ?>')">
                                                    <i class=" fa fa-eye"></i>
                                                </a>

                                              <!--  <a href="<?php /*echo base_url() . 'family_controllers/Family/read_attached_file/' . $row->file_attach_name */?>"
                                                   target="_blank">
                                                    <i class="fa fa-eye" title=" قراءة"></i> </a>-->
                                            <?php } ?></td>
                                    </tr>
                                    <?php
                                    $x++;
                                }
                            } ?>
                        </table>
                    </div>
                <?php } else { // end main if ?>
                    <div class="alert alert-danger">
                        <strong>لا يوجد ملفات مرفقة !</strong> .
                    </div>
                <?php } // end main if ?>
            </div>
        </div>
        <!------------- بيانات ماليه -------------->
        <div class="tab-pane fade" id="money">
            <div>
                <div class="col-xs-12 no-padding">
                    <?php if (!empty($family_data['income_sources'])) { ?>
                        <div class="col-sm-6 col-xs-12">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <td colspan="4" class="title-top">مصادر الدخل</td>
                                </tr>
                                <tr class="greentd">
                                    <th>م</th>
                                    <th>الإسم</th>
                                    <th>القيمة</th>
                                    <th>الحالة</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $affect_arr = array('لا تؤثر', 'تؤثر');
                                $d = 1;
                                $total = 0;
                                for ($a = 0; $a < sizeof($family_data['income_sources']); $a++) {
                                    ?>
                                    <tr>
                                        <td><?php echo $d; ?></td>
                                        <td><?php echo $family_data['income_sources'][$a]->title_setting ?></td>
                                        <td><?php
                                            if (isset($family_data['family_income_duties'][$family_data['income_sources'][$a]->id_setting])) {
                                                echo $family_data['family_income_duties'][$family_data['income_sources'][$a]->id_setting]->value;
                                            } else {
                                                echo 0;
                                            }
                                            ?></td>
                                        <td><?php if (isset($family_data['family_income_duties'][$family_data['income_sources'][$a]->id_setting])) {
                                                echo $affect_arr[$family_data['family_income_duties'][$family_data['income_sources'][$a]->id_setting]->affect];
                                            } else {
                                                echo "لا تؤثر";
                                            } ?></td>
                                    </tr>
                                    <?php $d++;
                                    $total += (isset($family_data['family_income_duties'][$family_data['income_sources'][$a]->id_setting])) ? $family_data['family_income_duties'][$family_data['income_sources'][$a]->id_setting]->value : 0;
                                } ?>
                                <tr>
                                    <td width="40%" colspan="2"><label class="label "
                                                                       style="font-size:18px; font-weight: 100;color: #000;">
                                            الإجمالي </label></td>
                                    <td><?= $total ?></td>
                                    <input id="total_fa" type="hidden" value="<?= $total ?>">
                                    <td></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    <?php } ?>
                    <?php if (!empty($family_data['monthly_duties'])) { ?>
                        <div class="col-sm-6 col-xs-12">
                            <table class="table  table-striped">
                                <thead>
                                <tr>
                                    <td colspan="4" class="title-top">الالتزامات الشهرية</td>
                                </tr>
                                <tr class="greentd">
                                    <th>م</th>
                                    <th>الإسم</th>
                                    <th>القيمة</th>
                                    <th>الحالة</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $affect_arr = array('لا تؤثر', 'تؤثر');
                                $d = 1;
                                $total1 = 0;
                                for ($a = 0; $a < sizeof($family_data['monthly_duties']); $a++) {
                                    ?>
                                    <tr>
                                        <td><?php echo $d; ?></td>
                                        <td><?php echo $family_data['monthly_duties'][$a]->title_setting ?></td>
                                        <td><?php
                                            if (isset($family_data['family_income_duties'][$family_data['monthly_duties'][$a]->id_setting])) {
                                                echo $family_data['family_income_duties'][$family_data['monthly_duties'][$a]->id_setting]->value;
                                            } else {
                                                echo "0";
                                            }
                                            ?></td>
                                        <td><?php if (isset($family_data['family_income_duties'][$family_data['monthly_duties'][$a]->id_setting])) {
                                                echo $affect_arr[$family_data['family_income_duties'][$family_data['monthly_duties'][$a]->id_setting]->affect];
                                            } else {
                                                echo "لا تؤثر";
                                            } ?></td>
                                    </tr>
                                    <?php $d++;
                                    $total1 += (isset($family_data['family_income_duties'][$family_data['monthly_duties'][$a]->id_setting])) ? $family_data['family_income_duties'][$family_data['monthly_duties'][$a]->id_setting]->value : 0;
                                } ?>
                                <tr>
                                    <td width="40%" colspan="2"><label class="label "
                                                                       style="font-size:18px; font-weight: 100;color: #000;">
                                            الإجمالي </label></td>
                                    <td><?= $total1 ?></td>
                                    <input id="total_fa1" type="hidden" value="<?= $total1 ?>">
                                    <td></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="clearfix"></div>
                        <hr/>
                        <?php
                        /*
                        echo
                        print_r($main_family_data);
                        */
                        $one_have = 0;
                        $total_mostafdens = $family_data['basic']->all_mostafed_mother + $family_data['basic']->all_mostafed_member;
                        if ($total_mostafdens == 0) {
                            $total_mostafden = 1;
                        } elseif ($total_mostafdens > 0) {
                            $total_mostafden = $total_mostafdens;
                        }
                        $one_have = (($family_data['basic']->all_mother_income - $family_data['basic']->all_mother_masrof) / ($total_mostafden));
                        ?>
                        <div class="text-center">
                            <table class="table table-bordereds  " style="width: 50%; margin: auto;">
                                <tr>
                                    <td class="specific_style"
                                        style="width: 280px;font-size: 20px !important;border-top-right-radius: 50px;border-top: 0;">
                                        نصيب الفرد
                                    </td>
                                    <td class="specific_style_2"
                                        style="    width: 280px;font-size: 22px !important;background-color: #fcb632; border: 1px solid #fff;"
                                        id="naseeb">
                                        <?php echo round($one_have); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="specific_style" style="width: 280px;font-size: 18px !important;">فئة
                                        الأسرة
                                    </td>
                                    <td class="specific_style_2"
                                        style="    width: 280px;font-size: 22px !important;border-bottom-left-radius: 50px;background-color: #fcb632;border: 1px solid #fff;"
                                        id="f2a">
                                        <?php echo $family_data['basic']->category->title; ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    <?php } else { ?>
                        <div class="col-lg-12 alert alert-danger">لا توجد بيانات ماليه</div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <!---------------- نهاية البيانات المالية ---------->
        <!-------------------- راي الباحث ----------------------------------->
        <div class="tab-pane fade" id="research">
            <div>


                <div class="personality">
                    <div class="col-xs-12 no-padding">
                        <?php if ((isset($family_data['researcher_opinion'])) && !empty($family_data['researcher_opinion'])) { ?>
                            <table class="table table-devices" style="table-layout: fixed">
                                <tbody>
                                <tr>
                                    <th>إسم الام</th>
                                    <td><?php echo $family_data['mother']->full_name; ?></td>
                                    <th>رقم السجل المدنى</th>
                                    <td><?php echo $family_data['mother']->mother_national_num_fk; ?></td>
                                </tr>
                                <tr>
                                    <th>هل الام متواجدة</th>
                                    <td> <?= $family_data['researcher_opinion']->present ?></td>

                                    <th>إنطباع الام عن الزيارة</th>
                                    <td> <?= $family_data['researcher_opinion']->impression ?></td>

                                </tr>
                                <tr>
                                    <th> الاهتمام بنظافة المنزل</th>
                                    <td> <?= $family_data['researcher_opinion']->home_cleaning ?></td>

                                    <th>الاهتمام بنظافة الابناء</th>
                                    <td> <?= $family_data['researcher_opinion']->child_cleanliness ?></td>

                                </tr>
                                <tr>
                                    <th> فئة الاسرة</th>
                                    <td> <?= $family_data['basic']->category->title ?></td>

                                    <th>نصيب الفرد</th>
                                    <td><?php echo round($one_have); ?></td>
                                </tr>
                                <tr>
                                    <th rowspan="2"> مرئيات الباحث</th>
                                    <td rowspan="2">
                                        <?php if (isset($family_data['researcher_opinion']->videos_researcher) && $family_data['researcher_opinion']->videos_researcher != null) {
                                            echo $family_data['researcher_opinion']->videos_researcher;
                                        } ?>
                                    </td>
                                    <th rowspan="2">مرئيات رئيس قسم شؤون الاسر</th>
                                    <td rowspan="2">
                                        <?php if (isset($family_data['researcher_opinion']->video_family_leader) && $family_data['researcher_opinion']->video_family_leader != null) {
                                            echo $family_data['researcher_opinion']->video_family_leader;
                                        } ?>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        <?php } else { ?>
                            <div class="col-lg-12 alert alert-danger">لا توجد بيانات .......</div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <!-------------------- 774 ----------------------------------->
        <!-------------------- بيانات الحساب البنكي ----------------------------------->
        <div class="tab-pane fade" id="bank_account">
            <div>
                <?php if (isset($family_data['responsible_account']) && $family_data['responsible_account'] != null) { ?>
                    <table class=" display table   responsive nowrap" cellspacing="0" width="100%">
                        <header>
                            <tr>
                                <th colspan="9" style="text-align: center">بيانات الحساب البنكي</th>
                            </tr>
                            <tr class="visible-md visible-lg">
                                <th>م</th>
                                <th>اسم المسئول الحساب البنكي</th>
                                <th>رقم الهويه</th>
                                <th> رقم الجوال</th>
                                <th>اسم البنك</th>
                                <th>رمز البنك</th>
                                <th>رقم الحساب</th>
                                <th>صورة الحساب</th>
                                <th>حاله الحساب</th>
                            </tr>
                        </header>
                        <tbody>
                        <?php
                        $x = 1;
                        foreach ($family_data['responsible_account'] as $row) { ?>
                            <td><?php echo $x; ?></td>
                            <td><?php echo $row->person; ?></td>
                            <td><?php echo $row->person_national_card; ?></td>
                            <td><?php echo $row->person_mob; ?></td>
                            <td><?php echo $row->bank_name; ?></td>
                            <td><?php echo $row->bank_code; ?></td>
                            <td> <?php echo $row->bank_account_num; ?> </td>
                            <?php if (!empty($row->bank_image)) {
                                $img_url = "uploads/images/" . $row->bank_image;
                            } else {
                                $img_url = "asisst/web_asset/img/logo.png";
                            } ?>
                            <td><a data-toggle="modal" type="button" style="cursor: pointer"
                                   data-target="#modal-img"
                                   onclick="$('#my_image').attr('src','<?php echo base_url() . $img_url ?>');">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </td>
                            <td>
                                <button class=" btn btn-success btn-sm " value="<?php echo $row->active; ?>">نشط
                                </button>
                            </td>
                            </tr>
                            <?php $x++; ?>
                            <div class="modal fade" id="modal-img" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel"></h4>
                                        </div>
                                        <div class="modal-body">
                                            <img id="my_image" src="" width="100%" height="">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" style="float: left"
                                                    data-dismiss="modal">إغلاق
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <? } ?>
                        </tbody>
                    </table>
                <?php } else { ?>
                    <div class="col-lg-12 alert alert-danger"> لا يوجد بيانات الحساب البنكي</div>
                <?php } ?>
            </div>
        </div>

        <div class="tab-pane fade" id="history_files">
            <?php if (isset($family_data['history_files']) && (!empty($family_data['history_files']))) { ?>
                <table class="table table-bordered table-responsive">
                    <thead>
                    <tr>
                        <th>م</th>
                        <th>اجراء</th>
                        <th>القائم بالاجراء</th>
                        <th>وقت الاجراء</th>
                        <th>تاريخ الاجراء</th>

                    </tr>
                    </thead>
                    <tbody>

                    <?php $x = 1;
                    foreach ($family_data['history_files'] as $datum) { ?>
                        <tr>
                        <td><?= $x++ ?> </td>
                        <td><?= $datum->action_name ?> </td>
                        <td><?= $datum->publisher_name ?> </td>
                        <td><?= $datum->time_action ?> </td>
                        <td><?= $datum->date_action ?> </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            <?php } else { ?>
                <div class="col-lg-12 alert alert-danger"> لا يوجد بيانات.......</div>
            <?php } ?>
        </div>
    </div>
    <!------------------------------------>
    <br/>
    <br/>
    <!---------------- family operation ------------------->

    <!----------------------------------------------------->
</div>
<!---------------------------------------------------------------------->

<script>

    function show_img(src) {

        var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
        WinPrint.document.write('<img src="' + src + '" style="width: 100%; height:  100%;">');
        WinPrint.document.close();
        WinPrint.focus();
    }
</script>
<script>

    function show_bdf(src) {

        var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
        WinPrint.document.write('<iframe src="' + src + '" style="width: 100%; height:  100%;" frameborder="0"></iframe>');
        WinPrint.document.close();
        WinPrint.focus();
    }
</script>