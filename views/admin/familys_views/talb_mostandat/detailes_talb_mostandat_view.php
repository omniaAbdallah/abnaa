<?php if (isset($record) && !empty($record)) { ?>

    <table id="" class="table table-striped table-bordered dt-responsive nowrap table-pd" cellspacing="0"
           width="100%">
        <thead>
        <tr>
            <td>نوع الطلب</td>
            <td>حالة الطلب</td>
            <td>ملاحظات</td>
            <td>وقت التسليم</td>
            <td>تاريخ التسليم</td>
            <td> الموظف المستلم</td>
        </tr>
        </thead>
        <tbody>
        <?php $status = array('no' => 'تحت الطلب', 'yes' => 'تم التسلم');
        $y = 1;
        foreach ($record->required_files as $file_row) {
            ?>
            <tr>
                <td><?= $file_row['mostand_name'] ?></td>
                <td><?php if (key_exists($file_row['taslem'], $status)) {
                        echo $status[$file_row['taslem']];
                    } ?>
                </td>
                <td><?= $file_row['doc_notes'] ?></td>
                <td><?= $file_row['taslem_time'] ?></td>
                <td><?= $file_row['taslem_date'] ?></td>
                <td><?= $file_row['emp_taslem_name'] ?></td>
            </tr>
        <?php } ?>
        <tr>
        </tbody>
    </table>

<?php } ?>