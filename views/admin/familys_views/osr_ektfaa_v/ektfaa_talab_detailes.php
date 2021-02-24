<div class="form-group col-sm-12 col-xs-12">
    <table class="table table-bordered ">
        <?php $gender_name = array('', 'ذكر', 'أنثى');
        $m_want_work_name = array(1 => 'لا يعمل', 2 => 'يعمل');
        $chose_name = array('no' => 'لا ', 'yes' => 'نعم');

        ?>
        <tbody>
        <tr>
            <th colspan="2" class="info">تاريخ الطلب</th>
            <th class="info">رقم الملف</th>
            <th colspan="3" class="info"></th>

        </tr>
        <tr>
            <td colspan="2"><?php echo $one_data['date_ar'] ?></td>
            <td><?php echo $one_data['file_num'] ?></td>
            <td colspan="3"></td>
        </tr>
        <tr>
            <th colspan="2" class="info">إسم الام</th>
            <th class="info">رقم الهوية</th>
            <th class="info"> الجنس</th>
            <th class="info"> الجنسية</th>
            <th class="info"> العنوان</th>

        </tr>
        <tr>
            <td colspan="2"><?php echo $file_num_data['mother_name'] ?></td>
            <td><?php echo $file_num_data['mother_new_card'] ?></td>
            <td><?php if (key_exists($file_num_data['m_gender'], $gender_name)) {
                    echo $gender_name[$file_num_data['m_gender']];
                } ?></td>
            <td><?php echo $file_num_data['m_nationality_name'] ?></td>
            <td><?php echo $file_num_data['area'] . ' - ' . $file_num_data['city'] . ' - ' . $file_num_data['centers'] . ' - ' . $file_num_data['village'] . ' - ' . $file_num_data['h_street'] ?></td>

        </tr>
        <tr>
            <th class="info">تاريخ الميلاد</th>
            <th class="info">عدد أفراد الأسرة</th>
            <th class="info">عدد الذكور</th>
            <th class="info"> الحالة الاجتماعية</th>
            <th class="info"> صلة القرابة</th>
            <th class="info"> المؤهل العلمي</th>

        </tr>
        <tr>
            <td><?php echo $file_num_data['m_birth_date'] ?></td>
            <td><?php echo $file_num_data['member_num'] ?></td>
            <td><?php echo $file_num_data['male_num'] ?></td>
            <td><?php echo $file_num_data['m_marital_status_name'] ?></td>
            <td><?php echo $file_num_data['m_relationship_name'] ?></td>
            <td><?php echo $file_num_data['m_education_level_name'] ?></td>

        </tr>
        <tr>
            <th class="info"> هاتف التواصل</th>
            <th class="info"> الجوال</th>
            <th class="info"> الجوال اخر</th>
            <th class="info"> نوع السكن</th>
            <th class="info"> تصنيف السكن</th>
            <th class="info"> الحياة العملية</th>
        </tr>
        <tr>
            <td><?php echo $file_num_data['contact_mob'] ?></td>
            <td><?php echo $file_num_data['m_mob'] ?></td>
            <td><?php echo $file_num_data['m_another_mob'] ?></td>
            <td><?php echo $file_num_data['h_house_owner_name'] ?></td>
            <td><?php echo $file_num_data['h_house_type_name'] ?></td>
            <td><?php if (key_exists($file_num_data['m_want_work'], $m_want_work_name)) {
                    echo $m_want_work_name[$file_num_data['m_want_work']];
                }
                if ($file_num_data['m_want_work'] == 2) {
                    echo ' - ' . $file_num_data['m_job_name'];
                } ?></td>
        </tr>
        <tr>
            <th colspan="" class="info">هل عليكم ديون</th>
            <th class="info">مقدار الدين</th>
            <th colspan="2" class="info">صاحب الدين</th>
            <th colspan="2" class="info">هل عليكم ديون متعثرة او قضايا بالمحكمة</th>

        </tr>
        <tr>
            <td><?php if (key_exists($one_data['have_debt'], $chose_name)) {
                    echo $chose_name[$one_data['have_debt']];
                } ?></td>
            <td><?php echo $one_data['debt'] ?></td>
            <td colspan="2"><?php echo $one_data['debt_name'] ?></td>
            <td colspan="2"><?php if (key_exists($one_data['have_other_debt'], $chose_name)) {
                    echo $chose_name[$one_data['have_other_debt']];
                }
                echo '. ' . $one_data['other_debt_name'] ?></td>
        </tr>
        <tr>
            <th colspan="" class="info"> نوع المشروع</th>
            <th colspan="2" class="info">وصف المشروع</th>
            <th class="info">حالة المشروع</th>
            <th class="info">هل يوجد رخصة</th>
            <th class="info"> سبق الاستفادة من التمويل</th>

        </tr>
        <tr>
            <td><?php echo $one_data['type_project_name']; ?></td>
            <td colspan="2"><?php echo $one_data['project_describ']; ?></td>
            <td><?php echo $one_data['project_states_name']; ?></td>
            <td><?php if (key_exists($one_data['have_lincense'], $chose_name)) {
                    echo $chose_name[$one_data['have_lincense']];
                }
                if (!empty($one_data['lincense_project']))
                    echo '. ' . $one_data['lincense_project'] ?></td>
            <td><?php if (key_exists($one_data['have_tamwil'], $chose_name)) {
                    echo $chose_name[$one_data['have_tamwil']];
                }
                if (!empty($one_data['tamwil_num']) && ($one_data['tamwil_num'] > 0))
                    echo '. ' . $one_data['tamwil_num'] ?></td>
        </tr>
        <tr>
            <th class="info"> العاملين داخل الاسرة</th>
            <th class="info"> العاملين خارج الاسرة</th>
            <th class="info">ارباح المشروع السنة الماضية</th>
            <th colspan="3" class="info"> الرغبة في تطوير</th>

        </tr>
        <tr>
            <td><?php echo $one_data['mun_in']; ?></td>
            <td ><?php echo $one_data['num_out']; ?></td>

            <td><?php if (key_exists($one_data['project_profit'], $chose_name)) {
                    echo $chose_name[$one_data['project_profit']];
                }
                if (!empty($one_data['profit_num']) && ($one_data['profit_num'] > 0))
                    echo '. ' . $one_data['profit_num'] ?></td>

            <td colspan="3"><?php if (key_exists($one_data['need_tranning'], $chose_name)) {
                    echo $chose_name[$one_data['need_tranning']];
                }
                if (!empty($one_data['tranning_type_name']))
                    echo '. ' . $one_data['tranning_type_name']
                ?></td>
        </tr>
        </tbody>
    </table>

</div>
