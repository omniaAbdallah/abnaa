<?php if (isset($talbat) && (!empty($talbat))) {
    $fe2a_talab_title = array(1 => 'حج', 2 => 'عمرة');
    $first_hij_omra = array(1 => 'نعم', 2 => 'لا');
    $suspend_title = array(0 => 'جاري', 1 => 'تم القبول', 2 => 'تم الرفض', 3 => "تم التحويل", 4 => "تم الاعتماد بالموافقة", 5 => "تم الإعتماد بالرفض");
    $suspend_class = array(0 => 'warning', 1 => 'success', 2 => 'danger', 3 => 'info', 4 => 'success', 5 => 'danger');
    ?>
    <table id="example" class="table table-bordered ">
        <thead>
        <tr>
            <th>م</th>
            <th>رقم الطلب</th>
            <th>فئة الطلب</th>
            <th>إسم المحرم</th>
            <th>صلة المحرم</th>
            <th>الافراد</th>
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
                <td><?php if (key_exists($talab->fe2a_talab, $fe2a_talab_title)) {
                        echo $fe2a_talab_title[$talab->fe2a_talab];
                    } else {
                        echo "غير محدد";
                    } ?></td>
                <td><?= $talab->mhrem_name ?></td>
                <td><?= $talab->mhrem_national_num ?></td>
                <td>
                    <button type="button" class="btn btn-info" onclick="get_member(<?= $talab->id ?>)"  data-toggle="modal"
                            data-target="#member_details_modal"> تفاصيل </button></td>
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
                            <i class="fa fa-trash"> </i></a>

                    <?php } else { ?>
                        <span style="font-size: medium" class=" badge badge-info">لا يمكن التعديل او الحذف</span>
                    <?php } ?>
                </td>

            </tr>
        <?php } ?>
        </tbody>
    </table>


    <?php } else if (isset($member_data) && $member_data != null) { ?>
        <table id="example" class="  table table-bordered table-striped" style="width:100%">
            <thead>
            <tr>
                <th>م</th>
                <th>الإسم</th>
                <th>رقم الهوية</th>
                <th>الصلة</th>

            </tr>
            </thead>
            <tbody>
            <?php
            $x = 1;
            foreach ($member_data as $row) { ?>
                <tr>
                    <td><?=$x?></td>
                    <td><?php echo $row->member_full_name; ?></td>
                    <td><?php echo $row->member_card_num; ?></td>
                    <td><?php echo $row->relation_name; ?></td>
                </tr>
                <?php $x++;
            } ?>
            </tbody>
        </table>
    <?php } else {
    ?>
    <div class=" alert alert-danger"> لا يوجد بيانات</div>
    <?php
} ?>

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

