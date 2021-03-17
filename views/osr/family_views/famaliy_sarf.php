<div class="col-sm-12 col-md-12 col-xs-12 fadeInUp wow" style="margin-top: 20px;">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">
                <?= $title ?>
            </div>
        </div>
        <div class="panel-body">
            <div class="col-md-12">
                <?php if (isset($family_sarf) && !empty($family_sarf)) { ?>
                    <table class=" example display table table-bordered table-striped table-hover compact">
                        <thead>
                        <tr>
                            <th>م</th>
                            <th>رقم الصرف</th>
                            <th>اسم بند المساعدة</th>
                            <th>بتاريخ</th>
                            <th>قيمة المساعدة</th>
                            <th>عدد الأفراد</th>
                            <th>خلال شهر</th>

                        </tr>

                        </thead>
                        <tbody>
                        <?php
                        $x = 1;
                        $total = 0;
                        foreach ($family_sarf as $row) {
                            $total += $row->value;
                            ?>
                            <tr>
                                <td><?= $x++; ?></td>
                                <td><?= $row->sarf_num_fk ?></td>
                                <td><?php
                                    if (!empty($row->band_name->title)) {
                                        echo $row->band_name->title;
                                    } else {
                                        echo 'غير محدد';
                                    }
                                    ?></td>
                                <td><?php if (!empty($row->sarf->sarf_date_ar)) {
                                        echo $row->sarf->sarf_date_ar;
                                    } else {
                                        echo 'غير محدد';
                                    } ?></td>
                                <td><?php
                                    if (!empty($row->value)) {
                                        echo $row->value;
                                    } else {
                                        echo 'غير محدد';
                                    } ?>

                                </td>
                                <td><?php
                                    if (!empty($row->mother_num)) {
                                        echo($row->mother_num + $row->young_num + $row->adult_num);
                                    } else {
                                        echo 'غير محدد';
                                    } ?>

                                </td>
                                <td>
                                    <?php
                                    if (!empty($row->sarf_month)) {
                                        echo $row->sarf_month;
                                    } else {
                                        echo 'غير محدد';
                                    }
                                    ?>
                                </td>

                            </tr>
                        <?php } ?>

                        </tbody>
                        <tfoot>
                        <th colspan="4" style="text-align: center">الاجمالي</th>
                        <th colspan="2" style="text-align: center"><?= $total ?></th>
                        </tfoot>


                    </table>
                <?php } else {
                    ?>
                    <div class="alert alert-danger">عفوا... لا يوجد بيانات !</div>
                    <?php
                } ?>

            </div>
        </div>
    </div>
</div>
