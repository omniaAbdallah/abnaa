<?php
$suspend_title = array(0 => 'جاري', 1 => 'تم القبول', 2 => 'تم الرفض', 3 => "تم التحويل", 4 => "تم الاعتماد بالموافقة", 5 => "تم الإعتماد بالرفض");
$suspend_class = array(0 => 'warning', 1 => 'success', 2 => 'danger', 3 => 'info', 4 => 'success', 5 => 'danger');

$x = 1;
if (!empty($talabt_data)){
foreach ($talabt_data as $row) { ?>
    <tr>
        <td><?php echo $x; ?></td>
        <td><?php echo $row->talab_rkm; ?></td>
<!--        <td><?php /*echo $row->file_num; */?></td>
-->
        <td> <?= $fe2a_fatora_array[$row->fe2a_fatora] ?> </td>

        <td><?php echo $row->fatora_value; ?></td>
        <td><?php echo $row->fatora_date; ?></td>
        <td><?php echo $row->sanad_daf3_date; ?></td>
        <td><a data-toggle="modal" data-target="#myModal-img-<?= $row->id ?>">
                <i class="fa fa-eye" title=" قراءة"></i> </a>
            <!-- modal view -->
            <div class="modal fade" id="myModal-img-<?= $row->id ?>" tabindex="-1"
                 role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close"><span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">الصوره</h4>
                        </div>
                        <div class="modal-body">
                            <img src="<?= base_url().'uploads/osr/service_orders/fator2/'. $row->fatora_img?>"
                                 width="100%" alt="">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                إغلاق
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal view --></td>
        <td><span style="font-size: medium"
                  class="badge badge-<?php if (key_exists($row->suspend, $suspend_class)) {
                      echo $suspend_class[$row->suspend];
                  } else {
                      echo "Dark";
                  } ?>"><?php if (key_exists($row->suspend, $suspend_title)) {
                    echo $suspend_title[$row->suspend];
                } else {
                    echo "غير محدد";
                } ?></span></td>
        <td>
            <?php if($row->suspend == 0){ ?>
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
                        form_fator2(<?=$row->id?>);
                        $("#table_panal").hide();

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
                    delete_fator2(<?=$row->id?>);
                    });'>
                    <i class="fa fa-trash"> </i></a>
            <?php }else { ?>
                <span style="font-size: medium" class=" badge badge-info">لا يمكن التعديل او الحذف</span>
            <?php } ?>
        </td>
    </tr>
    <?php
    $x++;
     }
} else{ ?>
<div style="text-align: center; "> لا يوجد بيانات </div>

<?php } ?>



