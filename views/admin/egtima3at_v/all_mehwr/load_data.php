<?php
/*
echo '<pre/>';
print_r($all_data);*/

if (isset($all_data) && $all_data != null) { ?>
    <div class="col-sm-12  ">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">بيانات محاور الجلسات</h3>
            </div>
            <div class="panel-body">

                <div class="col-xs-12">
                    <div class="panel-body">
                        <div class="fade in active">
                            
                                <table id="example10" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
            <thead>
            <tr class="info">
                                    <th class="text-center">م</th>
                                    <th class="text-center">رقم الجلسة</th>
                                    <th class="text-center">تاريخ الجلسة</th>
                                    <th class="text-center"> المحاور</th>
                                    <th class="text-center">أعضاء الجلسة</th>
                                    <th class="text-center">الاجراء</th>
                                </tr>
                                </thead>
                                <tbody class="text-center">
                                <?php $a = 1;
                                foreach ($all_data as $row) {
                                  
                                    ?>
                                    <tr>
                                        <td><?php echo $a ?> </td>
                                        <td><?php echo $row->galsa_rkm; ?></td>
                                        <td >
                                               <?php echo $row->galsa_date; ?>
                                        </td>

                                        <td data-toggle="modal" data-target="#myModal"
                                            onclick="get_table_mehwer(<?= $row->galsa_rkm ?>,'تفاصيل المحاور')"><i
                                                    class="fa fa-search-plus"></i></td>

                                        <td>
                                            <i class="fa fa-search-plus" aria-hidden="true" data-toggle="modal"
                                               onclick="det_datiles(<?= $row->galsa_rkm ?>,'تفاصيل الأعضاء')"
                                               data-target="#myModal"></i>
                                        </td>

                                        <td class="text-center">


                                            <?php
                                            if ($row->finshed == 0) { ?>
    <?php if(isset($result)&&!empty($result)){?>

                                                
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
                                                    update(<?=$row->galsa_rkm?>);
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
                                                        closeOnConfirm: false
                                                        },
                                                        function(){
                                                      delete_mehwer(<?=$row->galsa_rkm ?>);
                                                        });'>
                                                    <i class="fa fa-trash"> </i></a>
                                                    <?php }?>
                                                <!--  <button type="button" class="btn btn-success btn-xs"> إرسال المحاور لرئيس المجلس</button>
      -->


                                            <?php } elseif ($row->galsa_finish == 1) { ?>
                                                <span style="font-weight: normal !important;"
                                                      class="label-danger label label-default">لايمكن التعديل والحذف</span>
                                            <?php } ?>


                                        </td>
                                    </tr>


                                    <?php $a++;
                                } ?>


                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php } ?>
<script>


    $('#example10').DataTable({
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