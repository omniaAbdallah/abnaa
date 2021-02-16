
<?php 
  $this->load->view('admin/maham_mowazf_view/basic_data/nav_links'); 
?>

<div class="col-xs-12 no-padding" >
<div class="panel panel-default ">
        <div class="panel-heading no-padding" style="margin-bottom: 0;">
            <h4 class="panel-title"><?php echo $title ; ?></h4>
        </div>
        <div class="panel-body" >
            <div class="col-xs-12 no-padding">
                <?php
                 if (isset($records) && !empty($records)){
                     ?>
                <table id="example" class="  table table-bordered responsive nowrap text-center">
                    <thead>
                    <tr class="greentd">
                        <th>م</th>
                        <th>نوع الرساله</th>
                        <th> تاريخ الارسال</th>
                        <th> وقت الارسال</th>
                        <th>  نص الرساله</th>
                        <th>  المرسل</th>
                        <th>  الاداره</th>
                        <th>  القسم</th>
                  
                        
                    </tr>
                    </thead>
                    <tbody>
                   
                    <?php
                    $x=1;
                    foreach($records as $row){
                        if(!empty($row->main_data)){
                        ?>

                    <tr>
                    <td><?=$x?></td>
                    <td>
                    <?=$row->main_data->type_n?>
 
                    </td>
                    <td><?=$row->main_data->send_date_ar?></td>
                    <td><?=$row->main_data->send_time?></td>
                    <td><?=$row->main_data->content?></td>
                    <td><?=$row->main_data->sender_name?></td>
                    <td><?=$row->main_data->sender_edara_n?></td>
                    <td><?=$row->main_data->sender_qsm_n?></td>
                    
                    
                    </tr>
                    <?php 
                   $x++; }}?>
                   </tbody>
                    
                </table>
                <?php
                 } else{
                     ?>
                     <div class="alert-danger alert">عفوا... لا يوجد بيانات !</div>
                <?php
                 }
                ?>
            </div>
        </div>
    </div>
</div>
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