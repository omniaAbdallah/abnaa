
<div class="panel panel-info" id="table_panal" >
    <div class="panel-heading panel-title">
  <?= $title?>
    </div>
    <div class="panel-body">
        <div class="col-md-12 text-center" >
            <?php if (isset($talbat) && (!empty($talbat))) {
                $suspend_title = array(0 => 'جاري', 1 => 'تم القبول', 2 => 'تم الرفض', 3 => "تم التحويل", 4 => "تم الاعتماد بالموافقة", 5 => "تم الإعتماد بالرفض");
                $suspend_class = array(0 => 'warning', 1 => 'success', 2 => 'danger', 3 => 'info', 4 => 'success', 5 => 'danger');
                ?>
                <table id="example" class="table table-bordered ">
                    <thead>
                    <tr>
                        <th>م</th>
                        <th>رقم الطلب</th>
                        <th>تاريخ الطلب</th>
                        <th>تفاصيل الطلب</th>
                        <th>حالة الطلب</th>
                        <th> الإجراء</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    foreach ($talbat as $key => $talab) { ?>
                        <tr>
                            <td> <?= $key ?></td>
                            <td><?= $talab->talab_rkm ?></td>
                            <td><?= $talab->talab_date_ar ?></td>
                            <td>
                                <button type="button" class="btn btn-info btn-labeled" onclick="get_details_sarf(<?= $talab->id ?>)"  data-toggle="modal"
                                        data-target="#details_modal"> <span class="btn-label"><i class="fa fa-list"></i></span> الأصناف </button></td>
                            <td><span style="font-size: medium" class="badge badge-<?php if (key_exists($talab->suspend, $suspend_class)) {
                                    echo $suspend_class[$talab->suspend];
                                } else {
                                    echo "Dark";
                                } ?>"><?php if (key_exists($talab->suspend, $suspend_title)) {
                                        echo $suspend_title[$talab->suspend];
                                    } else {
                                        echo "غير محدد";
                                    } ?></span></td>
                            <td>
                                <?php if ($talab->suspend == 0) { ?>
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
                                            make_update_talab(<?= $talab->id ?>);
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
                                            setTimeout(function(){make_delete_talab(<?= $talab->id ?>);}, 500);
                                            });'>
                                        <i class="fas fa-trash"> </i></a>
                                <?php } else { ?>
                                    <span style="font-size: medium" class=" badge badge-info">لا يمكن التعديل او الحذف</span>
                                <?php } ?>
                            </td>

                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            <?php } else {
                ?>
                <div class=" alert alert-danger"> لا يوجد بيانات</div>
                <?php
            } ?>
        </div>
    </div>
</div>

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
        colReorder: true,
        destroy: true
    });


</script>

