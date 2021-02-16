<div class="col-sm-12 col-md-12 col-xs-12 ">

    <div class="panel panel-info">
        <div class="panel-heading panel-title">
            طليات معالجة البطاقة الالكترونية

        </div>

        <div class="panel-body">
            <div class="form-group col-sm-12 col-xs-12 no-padding">
                <?php
                if (isset($records) && $records != null) {
                    $service_name = 'معالجة البطاقة الاكترونية';
                    $type = array(1 => 'تالف', 2 => 'مفقود', 3 => 'تجديد', 4 => 'تغيير رقم سري', 5 => 'إصدار');
                    $suspend_title = array(0 => 'جاري', 1 => 'تم القبول', 2 => 'تم الرفض', 3 => "تم التحويل", 4 => "تم الاعتماد بالموافقة", 5 => "تم الإعتماد بالرفض");
                    $suspend_class = array(0 => 'warning', 1 => 'success', 2 => 'danger', 3 => 'info', 4 => 'success', 5 => 'danger');


                    ?>
                    <table id="examplee" class="display table table-bordered responsive nowrap" cellspacing="0"
                           width="100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>رقم الطلب</th>
                            <th>الإسم</th>
                            <th>رقم الهوية</th>
                            <th>نوع خدمة البطاقة</th>
                            <th> ملاحظات</th>
                            <th> حالة الطلب</th>
                            <th>الإجراء</th>
                            <!-- <th>الطباعه</th> -->
                        </tr>
                        </thead>
                        </tr>
                        <tbody>
                        <?php
                        $x = 1;
                        foreach ($records as $value) {
                            ?>
                            <tr>
                                <td><?= ($x++) ?></td>
                                <td><?= $value->talab_rkm ?></td>
                                <td><?= $value->member_full_name ?></td>
                                <td><?= $value->national_id ?></td>
                                <td><?= $type[$value->card_service_type] ?></td>
                                <td><?= $value->notes ?></td>
                                <td><span style="font-size: medium" class="badge badge-<?php if (key_exists($value->approved, $suspend_class)) {
                                        echo $suspend_class[$value->approved];
                                    } else {
                                        echo "Dark";
                                    } ?>"><?php if (key_exists($value->approved, $suspend_title)) {
                                            echo $suspend_title[$value->approved];
                                        } else {
                                            echo "غير محدد";
                                        } ?></span></td>

                                <td>
                                    <?php if ($value->approved == 0) { ?>
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
                                                editElectronic_cardOrders(<?= $value->id ?>);
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
                                                setTimeout(function(){deleteElectronic_card(<?= $value->id ?>);}, 500);
                                                });'>
                                            <i class="fa fa-trash"> </i></a>

                                    <?php } else { ?>
                                        <span style="font-size: medium" class=" badge badge-info">لا يمكن التعديل او الحذف</span>
                                    <?php } ?>
                                </td>

                            </tr>
                        <? } ?>
                        </tbody>
                    </table>

                    <?php

                } else {
                    echo '<div class="alert alert-danger">لا توجد بيانات</div>';
                }
                ?>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    $('#examplee').DataTable({
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