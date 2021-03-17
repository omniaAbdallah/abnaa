<?php if(!empty($my_always) && isset($my_always)){ ?>
<table id="examplee"  class="table table-striped table-bordered "   >
    <thead>
    <tr class="info">
        <th class="text-center" >م </th>
        <th class="text-center" > إسم الدوام</th>
        <th class="text-center" >وقت الحضور </th>
        <th class="text-center" > وقت الانصراف </th>
        <th class="text-center" >من تاريخ </th>
        <th class="text-center" > الى تاريخ </th>
        <!-- <th class="text-center" > الإجراء</th> -->
    </tr>
    </thead>
    <tbody>
    <?php $count=1; foreach($my_always as $record){ ?>
        <tr>
        <td style="text-align: center" rowspan="<?php echo sizeof($record->period_num); ?>"><?php echo $count++; ?></td>
        <td style="text-align: center" rowspan="<?php echo sizeof($record->period_num); ?>"><?php echo $record->name; ?></td>
        <?php if(!empty($record->period_num)){
            $a=1; foreach ($record->period_num as $row){ ?>
                <td style="text-align: center" ><?=$row->attend_time?></td>
                <td style="text-align: center" ><?=$row->leave_time?></td>
                <td style="text-align: center" ><?=$row->from_date_ar?></td>
                <td style="text-align: center" ><?=$row->to_date_ar?></td>
                <!-- <td style="text-align: center">
                    <a href="#"  data-toggle="modal" data-target="#modal-update" onclick="getUpdateForm(<?php echo $row->id;?>)">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                    <a href="#" onclick='swal({
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
                            DeleteEmpDwam(<?=$row->id?>,<?=$row->emp_id?>);
                            });'>
                        <i class="fa fa-trash"> </i></a>
                </td> -->
                </tr>
                <?php  $a++;} } ?>
    <?php } ?>
    </tbody>
</table>
<?php } ?>
<script>
    function DeleteEmpDwam(id,emp_id) {
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>human_resources/Dwam_settings/DeleteEmpDwam/'+id,
            data: {id: id},
            dataType: 'html',
            cache: false,
            success: function (html) {
                swal({
                    title: "تم الحذف ",
                });
                load_dwam_table(emp_id);
            }
        });
    }
</script>
<script>
    $('#examplee').DataTable( {
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
        colReorder: true,
        "bDestroy": true
    } );
</script>