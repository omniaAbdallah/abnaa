<?php if ((isset($result)) && (!empty($result))) { ?>
    <table id="example25" class="  table table-bordered my_table  responsive nowrap" cellspacing="0"
           width="100%">
        <thead>
        <th>م</th>
        <th>رقم الملف</th>
        <th style="text-align: center">إسم رب الأسرة</th>
        <th style="text-align: center">إسم المستفيد</th>
        <th style="text-align: center">الجنس</th>
        <th style="text-align: center">تاريخ الميلاد</th>
        <th style="text-align: center"> العمر</th>
        <th style="text-align: center"> التصنيف</th>
        <th style="text-align: center"> الحالة الدراسية</th>
        <th style="text-align: center"> المرحلة</th>
        <th style="text-align: center"> الصف</th>
        <th style="text-align: center"> إسم المدرسة</th>
        <th style="text-align: center"> حالة الفرد</th>
        </thead>
        <tbody>
        <?php
        $i = 1;
        foreach ($result as $val) {
            if ($val->member_gender == 2) {
                $gender_name = ' أنثي';
            } elseif ($val->member_gender == 1) {
                $gender_name = 'ذكر';
            } else {
                $gender_name = 'غير محدد';
            }
            if ($val->categoriey_member == 2) {
                $categoriey_name = 'يتيم';
            } elseif ($val->categoriey_member == 3) {
                $categoriey_name = 'مستفيد بالغ';
            } elseif ($val->categoriey_member == 4) {
                $categoriey_name = 'أخري';
            } else {
                $categoriey_name = 'غير محدد';
            }
            if ((is_numeric($val->member_study_case))) {
                if ($val->halet_drasa == 0) {
                    $halet_drasa_name = 'دون سن الدراسة';
                    $m_satge_name = 'دون سن الدراسة';
                    $m_class_name = 'دون سن الدراسة';
                    $m_school_name = ' دون سن الدراسة';
                    /*   $halet_drasa_name = $val->halet_drasa;
                       $m_satge_name = $val->stage_name;*/
                    /*  $m_class_name = $val->class_name;
                      $m_school_name = $val->school_name;*/
                } else {
                    //$halet_drasa_name = 'دون سن الدراسة';
                    /*    $m_satge_name = 'دون سن الدراسة';
                       $m_class_name = 'دون سن الدراسة';
                         $m_school_name = ' دون سن الدراسة';*/
                    $halet_drasa_name = $val->halet_drasa;
                    $m_satge_name = $val->stage_name;
                    $m_class_name = $val->class_name;
                    $m_school_name = $val->school_name;
                }
            } else {
                if ($val->halet_drasa == 'unlettered') {
                    $halet_drasa_name = 'امي';
                } elseif ($val->halet_drasa == 'graduate') {
                    $halet_drasa_name = 'متخرج';
                } elseif ($val->halet_drasa == 'read_write') {
                    $halet_drasa_name = ' يقرأو يكتب';
                }
                $m_satge_name = 'غير محدد';
                $m_class_name = 'غير محدد';
                $m_school_name = 'غير محدد';
            }
            ?>
            <tr>
                <td style="text-align: center"><?= ++$i; ?></td>
                <td style="text-align: center"><?= $val->file_num; ?></td>
                <td style="text-align: center"><?= $val->father_name ?></td>
                <td style="text-align: center"><?= $val->member_full_name ?></td>
                <td style="text-align: center"><?= $gender_name ?></td>
                <td style="text-align: center"><?= $val->member_birth_date_hijri ?></td>
                <td style="text-align: center"><?php echo(1440 - $val->member_birth_date_hijri_year); ?></td>
                <td style="text-align: center"><?= $categoriey_name ?></td>
                <td style="text-align: center"><?= $halet_drasa_name ?></td>
                <td style="text-align: center"><?= $val->stage ?></td>
                <td style="text-align: center"><?= $val->class ?></td>
                <td style="text-align: center"><?= $val->school ?></td>
                <td style="text-align: center"><?= $val->persons_status_name ?></td>
                <!--
        <td style="text-align: center"><?php
                if (isset($val->class_name) and $val->class_name != null) {
                    echo $val->class_name;
                } else {
                    echo 'غير محدد';
                }
                ?></td>-->
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>

    <?php
} else {
    ?>
    <div class="col-12 alert-danger">
        <h5>لا توجد بيانات ..................</h5>
    </div>
    <?Php
} ?>

<script>

    /*    $(document).ready(function () {
            var t = $('#example').DataTable({
                "columnDefs": [{
                    "searchable": false,
                    "orderable": false,
                    "targets": 0
                }],
                "order": [[1, 'asc']]
            });

            t.on('order.dt search.dt', function () {
                t.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
                    cell.innerHTML = i + 1;
                });
            }).draw();
        });*/

</script>

<script>
    var t = $('#example25').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'pageLength',
            'copy',
            'csv',
            'excelHtml5',
            {
                extend: "pdfHtml5",
                orientation: 'landscape'
            },
            {
                extend: 'print',
                autoPrint: true,
                // orientation: 'landscape'
            },
            'colvis'
        ],
        colReorder: true,
        "order": [[1, "asc"]],
        "scrollX": true,


    });
    /*  t.on('order.dt search.dt', function () {
          t.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
              cell.innerHTML = i + 1;
          });
      }).draw();*/
</script>
