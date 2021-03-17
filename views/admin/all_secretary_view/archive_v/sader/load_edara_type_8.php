<?php
switch ($type) {
    case 1:
        ?>
        <table id="examplee"  class="table table-responsive table-bordered">
            <thead>
            <tr>
                <td> م</td>
                <td> الادارة</td>
            </tr>
            </thead>
            <tbody>
            <?php $x = 1;
            foreach ($all_data as $datum) { ?>
                <tr>
                    <td><?= $x++ ?></td>
                    <td style="cursor: pointer" data-title="<?= $datum->id ?>" onclick="get_edara_typ_title('<?php echo $datum->name; ?>','<?php echo $datum->id; ?>',<?=$type?>)"><?= $datum->name ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <script>
            $('#examplee').DataTable( {
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
                        exportOptions: { columns: ':visible'},
                        orientation: 'landscape'
                    },
                    'colvis'
                ],
                colReorder: true,
                destroy:true
            } );
        </script>
        <?php
        break;
    case 2:
        ?>
        <table id="examplee"  class="table table-responsive table-bordered">
            <thead>
            <tr>
                <td> م</td>
                <td> القسم</td>
            </tr>
            </thead>
            <tbody>
            <?php $x = 1;
            foreach ($all_data as $datum) { ?>
                <tr>
                    <td><?= $x++ ?></td>
                    <td style="cursor: pointer" data-title="<?= $datum->id ?>" onclick="get_edara_typ_title('<?php echo $datum->name; ?>','<?php echo $datum->id; ?>',<?=$type?>)"><?= $datum->name ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <script>
            $('#examplee').DataTable( {
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
                        exportOptions: { columns: ':visible'},
                        orientation: 'landscape'
                    },
                    'colvis'
                ],
                colReorder: true,
                destroy:true
            } );
        </script>
        <?php
        break;
    case 3:
        ?>
        <table id="examplee" class="table table-responsive table-bordered">
            <thead>
            <tr>
                <td> م</td>
                <td> الموظف</td>
            </tr>
            </thead>
            <tbody>
            <?php $x = 1;
            foreach ($all_data as $datum) { ?>
                <tr>
                    <td><?= $x++ ?></td>
                    <td style="cursor: pointer" data-title="<?= $datum->id ?>" onclick="get_edara_typ_title('<?php echo $datum->employee; ?>',0,<?=$type?>)"><?= $datum->employee ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    <script>
        $('#examplee').DataTable( {
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
                    exportOptions: { columns: ':visible'},
                    orientation: 'landscape'
                },
                'colvis'
            ],
            colReorder: true,
            destroy:true
        } );
    </script>
        <?php
        break;
    default:
        break;
}
?>