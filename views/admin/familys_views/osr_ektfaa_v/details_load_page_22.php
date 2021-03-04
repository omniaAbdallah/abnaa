<div class="form-group col-sm-12 col-xs-12">
    <table class="table table-bordered ">
        <?php $gender_name = array('', 'ذكر', 'أنثى');
        $m_want_work_name = array(1=> 'لا يعمل',2=> 'يعمل'); ?>
        <tbody>
        <tr>
            <th colspan="2" class="info">إسم الام </th>
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
            <td><?php echo $file_num_data['area'] .' - '.$file_num_data['city'].' - '.$file_num_data['centers'].' - '.$file_num_data['village'].' - '.$file_num_data['h_street'] ?></td>

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
                } if ($file_num_data['m_want_work']==2){
                echo  ' - '.$file_num_data['m_job_name'];
                } ?></td>        </tr>

        </tbody>
    </table>

</div>
