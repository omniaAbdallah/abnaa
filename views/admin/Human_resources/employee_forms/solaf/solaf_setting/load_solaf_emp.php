<table id="example" class="table table-bordered table-responsive">

    <thead>
    <tr class="greentd">
        <th>م</th>
        <th>كود الموظف</th>
        <th>إسم الموظف</th>
        <th>رقم الحساب</th>
        <th>إسم الحساب</th>
        <th> الإجراء</th>
    </tr>
    </thead>
    <tbody  >
    <?php
    $x = 1;
    if (!empty($results)){
        foreach ($results as $row) { ?>
            <tr >
                <td><?php echo $x; ?></td>
                <td><?php echo $row->emp_code; ?></td>
                <td><?php echo $row->emp_name; ?></td>
                <td><?php echo $row->rkm_hesab; ?></td>
                <td><?php echo $row->hesab_name; ?></td>


                <td>
                    <input type="hidden" value="<?= $row->id ?>" name="id" id="id">
                    <!-- <a href="#" onclick='swal({
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
                        select_solaf_emp(<?=$row->id?>,<?=$row->emp_id?>,<?=$row->emp_code?>,<?=$row->emp_name?>,<?=$row->rkm_hesab?>,<?=$row->hesab_name?>);
                        // $("#table_panal").hide();

                        });'>
                        <i class="fa fa-pencil" aria-hidden="true"></i></a> -->


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
                      
                            select_solaf_emp(<?=$row->id?>,<?=$row->emp_id?>,<?=$row->emp_code?>,"<?=$row->emp_name?>",<?=$row->rkm_hesab?>,"<?=$row->hesab_name?>");
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
                        delete_solaf_emp(<?=$row->id?>);
                        });'>
                        <i class="fa fa-trash"> </i></a>
                </td>
            </tr>
            <?php
            $x++;
        }
    } else{ ?>
        <tr ><td colspan="6" style="text-align: center; ">لا يوجد بيانات </td></tr>
        <!--<div style="text-align: center; "> لا يوجد بيانات </div>-->

    <?php } ?>


    </tbody>
</table>


<script>




    $('#example').DataTable( {
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
