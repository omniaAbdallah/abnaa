<?php 
   if(isset($data_table) && !empty($data_table) && $data_table!=null){?>
    <table id="example2" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
        <tr class="greentd">
            <th class="text-center">م</th>
            <?php if($member_type==3)
            { ?>
                 <th class="text-center">رقم الطلب</th>
            <?php }else{?>
            <th class="text-center">رقم الملف</th>
            <?php }?>
            <th class="text-center">إسم العائلة </th>
            <th class="text-center">إسم الام </th>
            <th class="text-center">رقم الهوية </th>
        
            <th class="text-center"> رقم الجوال </th>
        </tr>
        </thead> 
        <tbody class="text-center">
        <?php 
        $x=1; foreach ($data_table as $row){
           ?>
            <tr>
                <td class="text-center"><?=$x++?></td>
                
             
                <td class="text-center"><?=$row->file_num?> </td>
      
                <td class="text-center"><?=$row->father_name?> </td>
                <td class="text-center"><?=$row->mother_name?> </td>
                <td class="text-center"><?=$row->mother_national_num?> </td>
               
                <td class="text-center">
                    <?php echo (!empty($row->contact_mob))? $row->contact_mob : "غير محدد"; ?>
                </td>
                
              
                <?php }?>
            </tr>
        <?php }?>
        </tbody>
        </table>
        <script>
$('#example2').DataTable( {
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