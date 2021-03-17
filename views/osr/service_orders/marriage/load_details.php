<div class="col-sm-12 col-md-12 col-xs-12 " id="show_details">
    <div class="panel panel-info">
        <div class="panel-heading panel-title">
طلبات مساعده زواج
        </div>

        <div class="panel-body">
            <div class="form-group col-sm-12 col-xs-12 no-padding">
                <?php
                if (isset($records) && $records != null) {
                    $answer = array(1 => 'نعم', 2 => 'لا');
                    $type = array(1 => 'هوية وطنية', 2 => 'إقامة', 3 => 'وثيقة', 4 => 'جواز سفر');
                    $service_name = 'مساعدة زواج';
                    $files = array('بطاقة العائلة	' => 'family_card_img', 'عقد النكاح	' => 'nekah_akd_img', 'صورة الهوية	' => 'hawia_img', 'الصورة الشخصية	' => 'person_img', 'عقد القاعة	' => 'akd_qa3a_img', 'تعريف بالراتب	' => 'ta3ref_ratb_img', 'تزكية الامام	' => 'tazkia_emam_img');
                    // $files = array('بطاقة العائلة '=>'family_card','عقد النكاح  '=>'identity_img','صورة الهوية  '=>'marriage_contract','الصورة الشخصية  '=>'personal_picture','عقد القاعة '=>'hall_contract','تعريف بالراتب '=>'salary_definition','تزكية الامام  '=>'imam_recommendation');
                    $suspend_title = array(0 => 'جاري', 1 => 'تم القبول', 2 => 'تم الرفض', 3 => "تم التحويل", 4 => "تم الاعتماد بالموافقة", 5 => "تم الإعتماد بالرفض");
                    $suspend_class = array(0 => 'warning', 1 => 'success', 2 => 'danger', 3 => 'info', 4 => 'success', 5 => 'danger');

                    ?>

                    <table id="example4" class="example display table table-bordered responsive nowrap" cellspacing="0"
                           width="100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>رقم الطلب</th>
                            <th>الإسم</th>
                            <th>رقم الجوال</th>
                            <th>مكان الزواج</th>
                            <th>تاريخ الزواج</th>
                            <th>رقم العقد</th>
                            <th>تاريخ العقد</th>
                            <th>قيمة المهر</th>
                            <th>التفاصيل</th>
                            <th>حالة الطلب </th>
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
                                <td><?= $value->person_name ?></td>
                                <td><?= $value->jwal ?></td>


                                <td><?= $value->makan_zawaj ?></td>

                                <td><?= $value->date_zawaj ?></td>
                                <td><?= $value->rkm_akd ?></td>

                                <td><?= $value->date_akd ?></td>
                                <td><?= $value->mahr_value ?></td>


                                <td>
                                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal"
                                            data-target="#myModal<?= $value->id ?>"><span class="fa fa-list"></span>
                                        المرفقات
                                    </button>
                                </td>
                                <td><span style="font-size: medium" class="badge badge-<?php if (key_exists($value->suspend, $suspend_class)) {
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
                                                editMarriageOrders(<?= $value->id ?>);
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
                                                setTimeout(function(){delete_marrage(<?= $value->id ?>);}, 500);
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
                    <?php foreach ($records as $value) { ?>
                        <div class="modal" id="myModal<?= $value->id ?>" tabindex="-1" role="dialog"
                             aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                            <div class="modal-dialog" role="document" style="width: 90%">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">تفاصيل المرفقات</h4>
                                    </div>
                                    <br>
                                    <div class="modal-body no-padding no-margin form-group col-sm-12 col-xs-12">
                                        <div class="form-group col-sm-12 col-xs-12">
                                            <table class="table table-bordered table-devices">
                                                <tbody>
                                                <?php
                                                $x = 1;
                                                foreach ($files as $key => $value2) {
                                                    if ($x % 1 != 0) {
                                                        echo '</tr>';
                                                    }
                                                    ?>
                                                    <?php if ($value->$value2) { ?>
                                                    <th class="gray_background" style="width: 25%;"><?= $key ?></th>
                                                    <td>
                                                        
                                                            <a href="<?= base_url() . 'osr/service_orders/Marriage_orders/download/' . $value->$value2 ?>"><span><i
                                                                            class="fa fa-download"></i></span></a>


                                                            <a data-toggle="modal"
                                                               data-target="#myview<?= $value->id ?>">
                                                                <i class="fa fa-eye" title=" قراءة"></i> </a>

                                                            <div class="modal fade" id="myview<?= $value->id ?>"
                                                                 tabindex="-1"  tabindex="-1" 
                                                                 role="dialog" aria-labelledby="myModalLabel"
                                                                 style="width:80%">
                                                                <div class="" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close"
                                                                                    data-dismiss="modal"
                                                                                    aria-label="Close"><span
                                                                                        aria-hidden="true">&times;</span>
                                                                            </button>
                                                                            <h4 class="modal-title" id="myModal">
                                                                                الصوره</h4>
                                                                        </div>
                                                                        <div class="modal-body">


                                                                            <img src="<?= base_url() . 'uploads/osr/service_order/marriage_orders' . '/' . $value->$value2 ?>"
                                                                                 width="100%" alt="">

                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                    class="btn btn-default"
                                                                                    data-dismiss="modal">
                                                                                إغلاق
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                     
                                                    </td>
                                                    <? } ?>
                                                    <?php
                                                    if ($x % 1 == 0) {
                                                        echo '</tr>';
                                                    }
                                                    $x++;
                                                }
                                                ?>
                                                </tbody>
                                            </table>
                                        </div>


                                    </div>
                                    <div class="modal-footer" style="border-top: 0;">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?
                    }
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
    $('#example4').DataTable({
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