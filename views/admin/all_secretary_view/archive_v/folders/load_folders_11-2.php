<?php if (isset($records) && !empty($records)) { ?>
    <div class="col-xs-12">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title ?> </h3>
            </div>
            <div class="panel-body">
                <?php if (isset($records) && (!empty($records))) { ?>
                    <table class="example table table-responsive table-bordered">

                        <thead>
                        <tr>
                            <th>م</th>
                            <th> اسم المجلد</th>
                            <th> التصنيف الرئيسي</th>
<!--                            <th>  المسار</th>-->
                            <th> الاجراء</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $x=1;
                        foreach ($records as $row) {
                            ?>
                            <tr>
                                <td><?= $x ?></td>
                                <td><?= $row->ar_title ?></td>
                                <td>
                                    <?php
                                    if(isset($row->main_folder_name)&& !empty($row->main_folder_name)){
                                        echo $row->main_folder_name;
                                    }else{
                                        echo "تصنيف رئيسي";
                                    }
                                    ?>

                                </td>
<!--                                <td>--><?//= $row->path ?><!--</td>-->

                                <td>


                                    <!-- <a onclick='swal({
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
                                        window.location="<?= base_url() . 'all_secretary/archeive/Archieve/update_archeive/' . base64_encode($row->id) ?>";
                                        });'>
                                        <i class="fa fa-pencil"> </i> </a> -->
                                    <?php if($row->type!=0){?>

                                        <a onclick='swal({
                                            title: "هل انت متأكد من الحذف ؟",
                                            text: " الملف رئيسي ويوجد به ملفات داخليه اذا قمت بالحذف ستحذف جميع الملفات الداخليه",
                                            type: "warning",
                                            showCancelButton: true,
                                            confirmButtonClass: "btn-warning",
                                            confirmButtonText: "حذف",
                                            cancelButtonText: "إلغاء",
                                            closeOnConfirm: true
                                            },
                                            function(){
                                            window.location="<?= base_url() . 'all_secretary/archive/folders/Folder/delete_folder/' . base64_encode($row->id) ?>";
                                            });'>
                                            <i class="fa fa-trash"> </i> </a>
                                    <?php } else{ ?>
                                        <a onclick='swal({
                                            title: "هل انت متأكد من الحذف ؟",
                                            text: " الملف رئيسي ويوجد به ملفات داخليه اذا قمت بالحذف ستحذف جميع الملفات الداخليه",
                                            type: "warning",
                                            showCancelButton: true,
                                            confirmButtonClass: "btn-warning",
                                            confirmButtonText: "حذف",
                                            cancelButtonText: "إلغاء",
                                            closeOnConfirm: true
                                            },
                                            function(){
                                            window.location="<?= base_url() . 'all_secretary/archive/folders/Folder/delete_folder/' . base64_encode($row->id) ?>";
                                            });'>
                                            <i class="fa fa-trash"> </i> </a>

                                    <?php } ?>

                                </td>

                            </tr>
                            <?php
                            $x++;
                        } ?>
                        </tbody>
                    </table>
                <?php } else {
                    ?>
                    <div class="alert-danger col-md-12 text-center ">

                        <h4> لا توجد بيانات ......</h4>
                    </div>
                    <?php
                } ?>
            </div>
        </div>
    </div>
<?php } ?>
<script>

    var table= $('.example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'pageLength',

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
