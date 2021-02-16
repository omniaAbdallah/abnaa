<div class="col-sm-12 col-md-12 col-xs-12 ">

    <div class="panel panel-info">
        <div class="panel-heading panel-title">
            جدول البيانات

        </div>

        <div class="panel-body">
            <div class="form-group col-sm-12 col-xs-12 no-ing">
                <?php
                if (isset($records) && $records != null) {
                    $service_name = 'إصلاح و ترميم المنزل';
                    $type = array(1 => 'إصلاح المنزل', 2 => 'ترميم المنزل');
                    $suspend_title = array(0 => 'جاري', 1 => 'تم القبول', 2 => 'تم الرفض', 3 => "تم التحويل", 4 => "تم الاعتماد بالموافقة", 5 => "تم الإعتماد بالرفض");
                    $suspend_class = array(0 => 'warning', 1 => 'success', 2 => 'danger', 3 => 'info', 4 => 'success', 5 => 'danger');

                    ?>
                    <table id="example" class=" display table table-bordered responsive nowrap" cellspacing="0"
                           width="100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>رقم الطلب</th>
                            <th> نوع الفئة</th>
                            <th> المكان</th>
                            <th> نوع الاجراء</th>
                            <th> صورة</th>

                            <th> حاله الطلب</th>

                            <th>الإجراء</th>
                            <!-- <th>الطباعه</th> -->
                        </tr>
                        </thead>

                        <tbody>
                        <?php
                        $x = 1;
                        foreach ($records as $value) {
                            ?>
                            <tr>
                                <td><?= ($x++) ?></td>

                                <td><?= $value->talab_rkm ?></td>
                                <td><?= $type[$value->fe2a_type] ?></td>
                                <td><?= $value->elmkan ?></td>
                                <td><?= $value->title ?></td>
                                <td><a data-toggle="modal" data-target="#myModal-view_photo<?= $value->id ?>">
                                        <i class="fa fa-eye" title=" قراءة"></i> </a>
                                    <!-- modal view -->
                                    <div class="modal fade" id="myModal-view_photo<?= $value->id ?>" tabindex="-1"
                                         role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close"><span
                                                                aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h4 class="modal-title" id="myModalLabel">الصوره</h4>
                                                </div>
                                                <div class="modal-body">


                                                    <img src="<?= base_url() . 'uploads/osr/service_order/fix_manzl' . '/' . $value->img ?>"
                                                         width="50%" alt="">

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">
                                                        إغلاق
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td><span style="font-size: medium"
                                          class="badge badge-<?php if (key_exists($value->suspend, $suspend_class)) {
                                              echo $suspend_class[$value->suspend];
                                          } else {
                                              echo "Dark";
                                          } ?>"><?php if (key_exists($value->suspend, $suspend_title)) {
                                            echo $suspend_title[$value->suspend];
                                        } else {
                                            echo "غير محدد";
                                        } ?></span></td>

                                <td>
                                    <?php if ($value->suspend == 0) { ?>
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
                                                editManzl_fixOrders(<?= $value->id ?>);
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
                                                setTimeout(function(){deleteManzl_fix(<?= $value->id ?>);}, 500);
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

                    <?

                } else {
                    echo '<div class="alert alert-danger">لا توجد بيانات</div>';
                }
                ?>
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
        colReorder: true,
        destroy:true
    });


</script>