<?php
$suspend_title = array(0 => 'جاري', 1 => 'تم القبول', 2 => 'تم الرفض', 3 => "تم التحويل", 4 => "تم الاعتماد بالموافقة", 5 => "تم الإعتماد بالرفض");
$suspend_class = array(0 => 'warning', 1 => 'success', 2 => 'danger', 3 => 'info', 4 => 'success', 5 => 'danger');

$x = 1;
if (!empty($records)) {
    foreach ($records as $row) { ?>
        <tr>
            <td><?php echo $x; ?></td>
            <td><?php echo $row->talab_rkm; ?></td>
            <td><?php echo $row->member_full_name; ?></td>
            <td><?php echo $row->member_card_num; ?></td>
            <td><?php echo $row->title_disease_type; ?></td>
            <td><?php echo $row->notes; ?></td>
            <td><span style="font-size: medium"
                      class="badge badge-<?php if (key_exists($row->approved, $suspend_class)) {
                          echo $suspend_class[$row->approved];
                      } else {
                          echo "Dark";
                      } ?>"><?php if (key_exists($row->approved, $suspend_title)) {
                        echo $suspend_title[$row->approved];
                    } else {
                        echo "غير محدد";
                    } ?></span></td>

            <td>
                <?php if ($row->approved == 0) { ?>
                    <input type="hidden" value="<?= $row->id ?>" name="id" id="id">
                    <a href="#" onclick='swal({
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
                            form_medical_center(<?= $row->id ?>);
                            });'>
                        <i class="fa fa-pencil" aria-hidden="true"></i></a>
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
                            swal("تم الحذف!", "", "success");
                            delete_medical_center(<?= $row->id ?>);
                            });'>
                        <i class="fa fa-trash"> </i></a>
                <?php } else { ?>
                    <span style="font-size: medium" class=" badge badge-info">لا يمكن التعديل او الحذف</span>
                <?php } ?>
            </td>
        </tr>
        <?php
        $x++;
    }
} else { ?>
    <div style="text-align: center; "> لا يوجد بيانات</div>

<?php } ?>



