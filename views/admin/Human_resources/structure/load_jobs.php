<?php if (isset($records) && (!empty($records))) { ?>
    <table class="table table-bordered  " id="example">
        <thead>
        <tr>
            <th>م</th>
            <th>الوظيفة</th>
            <th>عدد الوظائف</th>
            <th> رئيس</th>
            <th> الإجراء</th>

        </tr>
        </thead>
        <tbody>
        <?php $x = 1;
        foreach ($records as $record) { ?>
            <tr>
                <td><?= $x++ ?></td>
                <td><?= $record->job_title ?></td>
                <td><?= $record->emp_num ?></td>
                <?php if ($record->is_manger == 1) {
                    $mark = '&#10004;';
                } else {
                    $mark = '&#10006;';
                } ?>
                <td><i class="" aria-hidden="true"><?= $mark ?></i></td>
                <td><a id="a_<?=$record->id?>" data-administrative_structure_id_fk="<?= $record->administrative_structure_id_fk ?>"
                        data-admin_struct_manger_id_fk="<?=$record->admin_struct_manger_id_fk ?>"  data-id="<?=$record->id ?>"
                        data-job_id_fk="<?= $record->job_id_fk ?>" data-emp_num="<?= $record->emp_num ?>"
                        data-is_manger="<?= $record->is_manger ?>" onclick='swal({
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
                                load_job_data(<?=$record->id?>)
                            });'>
                        <i class="fa fa-pencil"> </i></a>
                    <a onclick=' swal({
                            title: "هل انت متأكد من الحذف ؟",
                            text: "",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonClass: "btn-danger",
                            confirmButtonText: "حذف",
                            cancelButtonText: "إلغاء",
                            closeOnConfirm: true
                            },
                            function(){
                            delete_job_data(<?=$record->id?>)
                            });'>
                        <i class="fa fa-trash"> </i></a></td>
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
                    exportOptions: {
                        columns: ':visible'
                    },
                    orientation: 'landscape'
                },
                'colvis'
            ],
            colReorder: true,
            destroy:true
        });
    </script>

<?php }else{ ?>

<div class="col-md-12 alert alert-danger">
    لا يوجد وظائف ...
</div>
<?php } ?>