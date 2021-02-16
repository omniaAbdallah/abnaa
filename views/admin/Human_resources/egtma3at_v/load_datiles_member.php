<?php if (isset($galsa_member) && !empty($galsa_member)) {
    ?>
    <div class="container col-md-12">
        <table id="memb_detalies" class=" display table table-bordered   responsive nowrap"
               cellspacing="0" width="100%">
            <thead>
            <tr>
                <th scope="col">م</th>
                <th scope="col">إسم الموظف</th>
                <th scope="col"> كود الموظف</th>
                <th scope="col"> الادارة</th>
                <th scope="col"> القسم</th>
            </tr>
            </thead>
            <tbody>
            <?php $x = 1;
            foreach ($galsa_member as $row) {
                ?>
                <tr>
                    <td><?php echo $x++; ?></td>
                    <td><?php echo $row->emp_name; ?></td>
                    <td><?php echo $row->emp_code; ?></td>
                    <td><?php echo $row->edara_n; ?></td>
                    <td><?php echo $row->qsm_n; ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    <?php
} else {
    ?>
    <div class="alert alert-danger col-lg-12"> لاتوجد اعضاء باللجنة</div>
    <?php
}
?>
<script>
    $('#memb_detalies').DataTable({
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
        colReorder: true,
        destroy: true
    });
</script>
