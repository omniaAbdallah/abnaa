<?php if (isset($data_table) && (!empty($data_table))) {
    if ($type == 1) {
        $text = "مجال";
    } else {
        $text = "نشاط";
    } ?>
    <table id="example" class="table table-bordered table-responsive">
        <thead>
        <th>اسم <?= $text ?></th>
        <?php if ($type == 2) { ?>
            <th> المجال</th>
        <?php } ?>
        <th>الاجراء</th>
        </thead>
        <tbody>
        <?php foreach ($data_table as $row) { ?>
            <tr>
                <td><?= $row->title ?></td>
                <?php if ($type == 2) { ?>
                    <td> <?= $row->from_data ?> </td>
                <?php } ?>
                <td><a onclick='swal({
                            title: "هل انت متأكد من التعديل ؟",
                            text: "",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonClass: "btn-warning",
                            confirmButtonText: "تعديل",
                            cancelButtonText: "إلغاء",
                            closeOnConfirm: true
                            },
                            function(){
                            set_data_form(<?= $row->id ?>,<?= $type ?>);
                            });'>
                        <i class="fa fa-pencil"> </i></a>
                    <a onclick=' swal({
                            title: "هل انت متأكد من الحذف ؟",
                            text: "",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonClass: "btn-danger",
                            confirmButtonText: "حذف",
                            cancelButtonText: "إلغاء"
                    <?php if ($type == 1 && ($row->from_data > 0)) { ?>
                            , closeOnConfirm: false
                    <?php } ?>
                            },
                            function(){
                    <?php if ($type == 1 && ($row->from_data > 0)) { ?>
                            swal({
                            title: "من فضلك قم بحذف الانشطة التابعة للمجال  ",
                            type: "warning",
                            confirmButtonText: "تم"
                            });
                    <?php } else { ?>
                            delete_data_form(<?= $row->id ?>,<?= $type ?>);
                    <?php } ?>
                            });'>
                        <i class="fa fa-trash"> </i></a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <script>
        $('#example').DataTable({
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

<?php } ?>
