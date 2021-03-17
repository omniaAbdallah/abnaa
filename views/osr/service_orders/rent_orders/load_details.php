<div class="col-sm-12 col-md-12 col-xs-12 " >
    <div class="panel panel-default">
        <div class="panel-heading panel-title">
طلبات  ايجارات المنازل
        </div>

        <div class="panel-body">
            <div class="form-group col-sm-12 col-xs-12 no-padding">
                <?php
                if (isset($records) && $records != null) {
                  
                   
                    // $files = array('بطاقة العائلة '=>'family_card','عقد النكاح  '=>'identity_img','صورة الهوية  '=>'marriage_contract','الصورة الشخصية  '=>'personal_picture','عقد القاعة '=>'hall_contract','تعريف بالراتب '=>'salary_definition','تزكية الامام  '=>'imam_recommendation');
                    $suspend_title = array(0 => 'جاري', 1 => 'تم القبول', 2 => 'تم الرفض', 3 => "تم التحويل", 4 => "تم الاعتماد بالموافقة", 5 => "تم الإعتماد بالرفض");
                    $suspend_class = array(0 => 'warning', 1 => 'success', 2 => 'danger', 3 => 'info', 4 => 'success', 5 => 'danger');

                    ?>

                    <table id="example1" class=" display table table-bordered responsive nowrap" cellspacing="0"
                           width="100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>رقم الطلب</th>
                            <th>رقم سجل العقد الأساس</th>
                            <th> رقم سجل العقد</th>
                            <th> نوع العقد</th>
                            <th> تاريخ إبرام العقد</th>
                            <th> مكان إبرام العقد</th>
                            
                            <th>تاريخ بداية مدة الايجار</th>
                            <th> تاريخ نهايه مدة الايجار</th>
                           
                            <th>حالة الطلب </th>
                            
                            <th>التفاصيل</th>
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
                                <td><?= $value->talb_rkm ?></td>
                                <td><?= $value->sgl_rkm_asas ?></td>
                                <td><?= $value->sgl_rkm ?></td>


                                <td><?php if($value->no3_3akd==1){echo 'جديد';}elseif($value->no3_3akd==2){echo 'مجدد';}  ?></td>

                                <td><?= $value->aakd_date ?></td>
                                <td><?= $value->aakd_place ?></td>

                                <td><?= $value->start_rent_date ?></td>
                                <td><?= $value->end_rent_date ?></td>


                                
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
                                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal"
                                     onclick="get_order_details(<?= $value->id ?>)"       data-target="#myModal"><span class="fa fa-list"></span>
                                        التفاصيل
                                    </button>
                                </td>
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
                                        <a onclick="delete_marrage(<?= $value->id?>)" >
                                            <i class="fa fa-trash"> </i></a>

                                    <?php } else { ?>
                                        <span style="font-size: medium" class=" badge badge-info">لا يمكن التعديل او الحذف</span>
                                    <?php } ?>
                                </td>

                            </tr>
                        <? } ?>
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
</div>
<script>




$('#example1').DataTable( {
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