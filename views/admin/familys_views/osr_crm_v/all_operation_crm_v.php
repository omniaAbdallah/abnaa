<?php if (isset($all_data) && (!empty($all_data))) {
    ?>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th colspan="7" style="background: #ffa6aa;" colspan="5">العمليات التي تمت علي الطلب</th>
        </tr>
        <tr>
            <th scope="col">م</th>
            <th scope="col">الاجراء</th>
            <th scope="col">التاريخ</th>
            <th scope="col">التوقيت</th>
            <th scope="col">القائم بالاجراء</th>

        </tr>
        </thead>
        <tbody>
        <?php
        $count = 1;
        ?>

        <?php foreach ($all_data as $one_data) {
            $count++;
            ?>
            <?php if ($one_data['start_bahth'] == 'yes') { ?>
                <tr>
                    <td><?= $count++ ?></td>
                    <td>بدء إجراءات التحديث</td>
                    <td><?=$one_data['start_bahth_date']?></td>
                    <td><?=$one_data['start_bahth_time']?></td>
                    <td><?=$one_data['start_bahth_emp_n']?></td>
                </tr>
            <?php } ?>

            <?php if ($one_data['hdoor_osr_bahth'] == 'yes') { ?>
                <tr>
                    <td><?= $count++ ?></td>
                    <td>تسجيل حضور الاسرة</td>
                    <td><?=$one_data['hdoor_osr_bahth_date']?></td>
                    <td><?=$one_data['hdoor_osr_bahth_time']?></td>
                    <td><?=$one_data['hdoor_osr_bahth_emp_n']?></td>
                </tr>
            <?php } ?>

            <?php if ($one_data['taslem_mosdand'] == 'yes') { ?>
                <tr>
                    <td><?= $count++ ?></td>
                    <td>إنهاء إستلام وتسلم المعاملات</td>
                    <td><?=$one_data['taslem_mosdand_date']?></td>
                    <td><?=$one_data['taslem_mosdand_time']?></td>
                    <td><?=$one_data['taslem_mosdand_emp_n']?></td>
                </tr>
            <?php } ?>


            <?php if ($one_data['review_to'] == 'yes') { ?>
                <tr>
                    <td><?= $count++ ?></td>
                    <td> ارسال للمراجعة</td>
                    <td><?=$one_data['review_to_date']?></td>
                    <td><?=$one_data['review_to_time']?></td>
                    <td><?=$one_data['review_to_emp_n']?></td>
                </tr>
            <?php } ?>



            <?php if ($one_data['end_review'] == 'yes') { ?>
                <tr>
                    <td><?= $count++ ?></td>
                    <td> انهاء المراجعة</td>
                    <td><?=$one_data['end_review_date']?></td>
                    <td><?=$one_data['end_review_time']?></td>
                    <td><?=$one_data['end_review_emp_n']?></td>
                </tr>
            <?php } ?>


            <?php if ($one_data['bahth_to'] == 'yes') { ?>
                <tr>
                    <td><?= $count++ ?></td>
                    <td>تحويل للباحث</td>
                    <td><?=$one_data['bahth_to_date']?></td>
                    <td><?=$one_data['bahth_to_time']?></td>
                    <td><?=$one_data['bahth_to_emp_n']?></td>
                </tr>
            <?php } ?>
        <?php } ?>
        </tbody>
    </table>


<?php }else{
?>
    <div class="col-md-12 alert alert-danger">لا يوجد عمليات على الملف ........ </div>
<?php
} ?>
