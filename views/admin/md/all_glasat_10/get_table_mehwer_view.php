<div class="row">
    <?php if (isset($result) && (!empty($result))) { ?>
        <table id="example" class="table table-striped table-bordered table-result">
            <thead>
            <tr>
                <th>م</th>
                <th>المحور</th>
                <th>الإجراء</th>
            </tr>
            </thead>
            <tbody>
            <?php $x = 1;
            foreach ($result as $row) { ?>
                <tr>
                    <td><?php echo $x; ?></td>
                    <td><?php echo $row->mehwar_title; ?></td>
                    <td>
                        <a href="#" onclick='swal({
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
                            delete_mehwr_galsa(<?=$row->id?>);
                            });'>
                            <i class="fa fa-trash"> </i></a>
                    </td>
                </tr>
                <?php
                $x++;
            }
            ?>
            </tbody>
        </table>


    <?php } ?>
</div>


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
        colReorder: true
    });


</script>

<script>
    function delete_mehwr_galsa(id) {
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>md/all_glasat/All_glasat/delete_mehwr_galsa',
            data: {id: id},
            dataType: 'html',
            cache: false, beforeSend:function(){
                swal({
                    title: "جاري الحذف ... ",
                    text: "",
                    imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                    showConfirmButton: false,
                    allowOutsideClick: false

                });
            },
            success: function (html) {
                swal({
                    title: 'تم الحذف بنجاح  ',
                    type: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'تم'
                });
                if (html == 1) {
                    get_table_mehwer(<?=$glsa_rkm?>);
                }
            }
        });
    }
</script>
