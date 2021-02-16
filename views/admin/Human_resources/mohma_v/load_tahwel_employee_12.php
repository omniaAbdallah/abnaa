<?php if (isset($all) && !empty($all)) { ?>
    <br><br>
    <table id="tahwel" class="tahwel display table  table-bordered table-striped" role="table">
        <thead>
        <tr class="greentd">
            <th>
#
            </th>
            <th class="text-center"><?= 'اسم الموظف' ?></th>
            <th class="text-center"><?= 'المسمي الوظيفي' ?></th>
            <th class="text-center"><?= 'الاداره' ?></th>
            <th class="text-center"><?= 'القسم' ?></th>
        </tr>
        </thead>
        <tbody>
        <?php
        $x = 1;
        foreach ($all as $row) { ?>
            <tr>
                <!-- <input type="checkbox" id="myCheck"  onclick="myFunction()"> -->
                <td><input style="width: 90px;height: 20px;" type="radio" name="<?= $row->id ?>"
                           id="myCheck<?= $row->id ?>" data-id="<?= $row->id ?>" data-name="<?= $row->employee ?>"
                           class="checkbox  radio" value="<?= $row->employee ?>"
                           onchange="Get_emp_Name(<?= $row->id ?>,'<?= $row->employee ?>',2)"></td>
                <td><?= $row->employee ?></td>
                <td><?= $row->mosma_wazefy_n ?></td>
                <td><?= $row->edara_n ?></td>
                <td><?= $row->qsm_n ?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
<?php } else {
    ?>
    <div class="alert-danger alert">عفوا... لا يوجد بيانات !</div>
    <?php
}
?>
<script>
    $('#tahwel').DataTable({
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
                exportOptions: {columns: ':visible'},
                orientation: 'landscape'
            },
            'colvis'
        ],
        colReorder: true
    });
</script>
