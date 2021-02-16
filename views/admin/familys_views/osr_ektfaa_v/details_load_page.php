<div class="form-group col-sm-12 col-xs-12">
    <table class="table table-bordered ">
        <?php $gender_name = array('', 'ذكر', 'أنثى');
        $m_want_work_name = array(1 => 'لا يعمل', 2 => 'يعمل'); ?>
        <tbody>
        <tr>
            <th colspan="2">إسم</th>
            <th>رقم الهوية</th>
            <th> الجنس</th>
            <th> الجنسية</th>
            <th> العنوان</th>

        </tr>
        <tr>
            <td colspan="2" id="mokadem_talb_td"><?php if (isset($file_num_data['full_name'])) {
                    echo $file_num_data['full_name'];
                } elseif (isset($file_num_data['mokadem_talb'])) {
                    echo $file_num_data['mokadem_talb'];
                } ?></td>
            <td><input class="form-control" name="national_card" value="<?php echo $file_num_data['national_card'] ?>">
            </td>
            <td>
                <select class="form-control" name="gender" data-validation="required">
                    <option value="">اختر</option>
                    <?php foreach ($gender_name as $key => $value):
                        $selected = '';
                        if ($key == $file_num_data['gender']) {
                            $selected = 'selected';
                        } ?>
                        <option value="<?php echo $key; ?>" <?php echo $selected ?> ><?php echo $value; ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
            <td>
                <!--<input class="form-control" name="" value="<?php /*echo $file_num_data['m_nationality_name'] */ ?> ">-->
                <select class="form-control" name="nationality" data-validation="required">
                    <option value="">اختر</option>
                    <?php
                    foreach ($nationalities as $row):
                        $selected = '';
                        if ($row['id_setting'] == $file_num_data['nationality']) {
                            $selected = 'selected';
                        } ?>
                        <option value="<?php echo $row['id_setting']; ?>" <?php echo $selected ?> ><?php echo $row['title_setting']; ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
            <td><input class="form-control" name="address" value="<?php if (isset($file_num_data['area'])) {
                    echo $file_num_data['area'] . ' - ' . $file_num_data['city'] . ' - ' . $file_num_data['centers'] . ' - ' . $file_num_data['village'] . ' - ' . $file_num_data['h_street'];
                } else {
                    echo $file_num_data['address'];
                } ?> ">
            </td>

        </tr>
        <tr>
            <th>تاريخ الميلاد</th>
            <th>عدد أفراد الأسرة</th>
            <th>عدد الذكور</th>
            <th> الحالة الاجتماعية</th>
            <th> صلة القرابة</th>
            <th> المؤهل العلمي</th>

        </tr>
        <tr>
            <td><input type="date" class="form-control" name="birth_date"
                       value="<?php echo $file_num_data['birth_date'] ?> "></td>
            <td><input type="number" class="form-control" name="member_num"
                       value="<?php echo $file_num_data['member_num'] ?>"></td>
            <td><input type="number" class="form-control" name="male_num"
                       value="<?php echo $file_num_data['male_num'] ?>"></td>
            <td>
                <!--<input class="form-control" name="" value="<?php /*echo $file_num_data['m_marital_status_name'] */ ?> ">-->
                <select class="form-control" name="marital_status_id_fk" data-validation="required">
                    <option value="">اختر</option>
                    <?php
                    foreach ($marital_status_array as $row):
                        $selected = '';
                        if ($row['id_setting'] == $file_num_data['marital_status_id_fk']) {
                            $selected = 'selected';
                        } ?>
                        <option value="<?php echo $row['id_setting']; ?>" <?php echo $selected ?> ><?php echo $row['title_setting']; ?></option>
                    <?php endforeach; ?>
                </select>
            </td>


            <td>
                <!--<input class="form-control" name="" value="<?php /*echo $file_num_data['m_relationship_name'] */ ?> ">-->
                <select class="form-control" name="relationship" data-validation="required">
                    <option value="">اختر</option>
                    <?php
                    foreach ($relationships as $row):
                        $selected = '';
                        if ($row['id_setting'] == $file_num_data['relationship']) {
                            $selected = 'selected';
                        } ?>
                        <option value="<?php echo $row['id_setting']; ?>" <?php echo $selected ?> ><?php echo $row['title_setting']; ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
            <td>
                <!--<input class="form-control" name="" value="<?php /*echo $file_num_data['m_education_level_name'] */ ?> ">-->
                <select class="form-control" name="education_level_id_fk" data-validation="required">
                    <option value="">اختر</option>
                    <?php
                    foreach ($education_level_array as $row):
                        $selected = '';
                        if ($row['id_setting'] == $file_num_data['education_level_id_fk']) {
                            $selected = 'selected';
                        } ?>
                        <option value="<?php echo $row['id_setting']; ?>" <?php echo $selected ?> ><?php echo $row['title_setting']; ?></option>
                    <?php endforeach; ?>
                </select>

            </td>

        </tr>
        <tr>
            <th> هاتف التواصل</th>
            <th> الجوال</th>
            <th> الجوال اخر</th>
            <th> نوع السكن</th>
            <th> تصنيف السكن</th>
            <th> الحياة العملية</th>
        </tr>
        <tr>
            <td><input type="text" class="form-control" name="contact_mob"
                       value="<?php echo $file_num_data['contact_mob'] ?>"></td>
            <td><input type="text" class="form-control" name="mob" value="<?php echo $file_num_data['mob'] ?> "></td>
            <td><input type="text" class="form-control" name="another_mob"
                       value="<?php echo $file_num_data['another_mob'] ?> "></td>
            <td>
                <!--<input class="form-control" name="house_owner" value="<?php /*echo $file_num_data['h_house_owner_name'] */ ?> ">-->
                <select class="form-control" name="h_house_owner_id_fk" data-validation="required">
                    <option value="">اختر</option>
                    <?php
                    foreach ($house_own as $row):
                        $selected = '';
                        if ($row['id_setting'] == $file_num_data['h_house_owner_id_fk']) {
                            $selected = 'selected';
                        } ?>
                        <option value="<?php echo $row['id_setting']; ?>" <?php echo $selected ?> ><?php echo $row['title_setting']; ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
            <td><select class="form-control" name="h_house_type_id_fk" data-validation="required">
                    <option value="">اختر</option>
                    <?php
                    foreach ($arr_type_house as $row):
                        $selected = '';
                        if ($row['id_setting'] == $file_num_data['h_house_type_id_fk']) {
                            $selected = 'selected';
                        } ?>
                        <option value="<?php echo $row['id_setting']; ?>" <?php echo $selected ?> ><?php echo $row['title_setting']; ?></option>
                    <?php endforeach; ?>
                </select></td>
            <td>
                <select name="job_id_fk" id="job_id_fk" class="  form-control  " aria-required="true">
                    <option value="">اختر</option>
                    <option value="0">لا يعمل</option>
                    <?php
                    foreach ($job_titles as $job):
                        $selected = '';
                        if ($job['id_setting'] == $file_num_data['job_id_fk']) {
                            $selected = 'selected';
                        } ?>
                        <option value="<?php echo $job['id_setting']; ?>" <?php echo $selected ?> ><?php echo $job['title_setting']; ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>

        </tbody>
    </table>

</div>
<script>
    $('#mokadem_talb_td').text($('#mokadem_talb_input').val());
</script>
