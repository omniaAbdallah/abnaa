<?php if ((isset($cat_service)) && (!empty($cat_service))) { ?>
    <div class="col-xs-12  ">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title2; ?></h3>
            </div>
            <div class="panel-body" >
                <table id="example_wasf" class="example table table-bordered">
                    <thead >
                    <tr class="info">
                    <th> م</th>
                        <th>نوع الخدمة</th>
                        <th>فئة الخدمة</th>
                        <th>وصف الفئة</th>
                        <th>الإجراء</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($cat_service as $key => $value) { ?>
                        <tr>
                            <td><?= ++$key ?></td>
                            <td><?= $value->khdma_name ?></td>
                            <td>
                            
                            <?php foreach ($f2att as $cat) { ?>
                              
                                    <?php if ($value->fe2a_khdma_id_fk  == $cat->id) echo $cat->wasf_fe2a_title; ?>
                                
                            <?php } ?>
                            
                           </td>
                            <td><?= $value->wasf_fe2a_title ?></td>
                            
                            <td>
                            <a onclick='swal({
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
                                                    edit_wasf(<?= $value->id ?>);
                                                    });'>
                                                <i class="fa fa-pencil"> </i></a>
                                            <a onclick='delete_f2a(<?= $value->id ?>)'>
                                                <i class="fa fa-trash"> </i></a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php } ?>

<script>




$('#example_wasf').DataTable( {
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
    colReorder: true
} );



</script>