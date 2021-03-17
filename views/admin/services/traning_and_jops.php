<div class="col-sm-11 col-xs-12">
    <!--  -->
    <?php //$this->load->view('admin/family/main_tabs'); ?>
    <!--  -->
    <div class="details-resorce">
        <?php $this->load->view('admin/services/serv_tabs'); ?>
        <div class="col-xs-12 r-inner-details">
            <?
            $sub_service='';
            $main_service='';
            $mother_national_id_fk='';
            if(!empty($_POST['sub_service'])):
                $sub_service = $_POST['sub_service'];
            endif;
            if(!empty($_POST['main_service'])):
                $main_service = $_POST['main_service'];
            endif;
            if(!empty($_POST['mother_national_id_fk'])):
                $mother_national_id_fk = $_POST['mother_national_id_fk'];
            endif;
            ?>
            <?php  echo form_open('Family/insert_services/'.$mother_national_id_fk.'/'.$main_service.'/'.$sub_service)?>
            <div class="col-xs-12">
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4">  نوع الخدمة </h4>
                        </div>
                        <div class="col-xs-6 ">
                            <form class="r-block">
                                <input type="radio" class="radio2" name="course_employment_id_fk" checked="checked" id="r-train"> الدورات التدريبية
                                <input type="radio" class="radio2" name="course_employment_id_fk" id="r-jop"> توظيف
                            </form>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> اخر درجة تعليمية  </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <input type="text" class="r-inner-h4 " name="course_employment_last_education_degree">
                        </div>
                    </div>
                    <div class="col-xs-12 r-type">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> نوع الدورة </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <select name="course_employment_course_type_id_fk">
                                <option> - اختر - </option>
                                <? foreach ($courses as $course):?>
                                <option value="<? echo $course->id;?>"> <? echo $course->title;?> </option>
                                <? endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 r-jop-name">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> اسم الوظيفة  </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <input type="text" class="r-inner-h4 " name="course_employment_job">
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> رقم الجوال </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <input type="text" class="r-inner-h4 " name="course_employment_mob">
                        </div>
                    </div>
                </div>
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4">   الاسم  </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <select name="course_employment_family_id_fk">
                                <option> - اختر - </option>
                                <? if(!empty($get_mother[$_POST['mother_national_id_fk']])):?>
                                    <option value="<? echo $get_mother[$_POST['mother_national_id_fk']]->mother_national_num_fk; ?>"><? echo $get_mother[$_POST['mother_national_id_fk']]->m_first_name; ?></option>
                                <? endif;?>
                                <? if (!empty($get_family_members[$_POST['mother_national_id_fk']])):
                                    foreach ($get_family_members[$_POST['mother_national_id_fk']] as $member):?>
                                        <option value="<? echo $member->id; ?>"><? echo $member->member_name; ?></option>
                                    <? endforeach; endif;?>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> المرحلة التعليمية </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <input type="text" class="r-inner-h4 " name="course_employment_education_level">
                        </div>
                    </div>
                    <div class="col-xs-12 r-times">
                        <div class="col-xs-6">
                            <h4 class="r-h4"> مدة الدورة </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <select name="course_employment_course_period">
                                <option> - اختر - </option>
                                <option value="1"> شهر </option>
                                <option value="2"> ثلاثة شهور </option>
                                <option value="3"> ستة شهور </option>
                                <option value="4"> سنة </option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 r-top">
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data ">
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4">  السيرة الذاتية </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <div class="field">
                                <input type="text" name="new_file" value="" size="40" class="file_input_replacement" placeholder=" اضغط للتحميل ">
                                <input type="file" name="course_employment_cv_file" class="file_input_with_replacement">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6  col-sm-12 col-xs-12 inner-side r-data">
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                            <h4 class="r-h4">  المؤهلات  </h4>
                        </div>
                        <div class="col-xs-6 r-input">
                            <div class="field">
                                <input type="text" name="new_file" value="" size="40" class="file_input_replacement" placeholder=" اضغط للتحميل ">
                                <input type="file" name="course_employment_qualification_file" class="file_input_with_replacement">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-xs-12 r-inner-btn r-new-button">
            <div class="col-xs-3" style="margin-right: 250px">
                <input type="submit" role="button" name="add" class="btn pull-right"  value="حفظ">
            </div>
            <?php  echo form_close()?>
            <div class="col-xs-6">
                <a href="<?php echo base_url()?>family/family_services"><button class="btn pull-left" > عودة </button></a>
            </div>
        </div>
    </div>

    <!--------------------------------------------------->

