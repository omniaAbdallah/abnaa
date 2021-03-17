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
                        <th>  المرسل </th>
                        <th>  الاداره</th>
                        <th>  القسم</th>
                    
                        <th>  الاجراء</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $x=1;
                    foreach($records as $row){
                  
                        ?>
                    <tr>
                    <td><?=$x?></td>
                    <td>
                    <?=$row->type_n?>
                    </td>
                    <td><?=$row->send_date_ar?></td>
                    <td><?=$row->send_time?></td>
                    <td><?=$row->content?></td>
                    <td><?=$row->sender_name?></td>
                    <td><?=$row->sender_edara_n?></td>
                    <td><?=$row->sender_qsm_n?></td>
                     <td>
                    <a onclick="load_details(<?=$row->id?>);"
       aria-hidden="true"
          data-toggle="modal"
          data-target="#detailsModal"><i     class="fa fa-search-plus" aria-hidden="true"></i>  </a>
         <?php if( $row->readed !=0){
                            $suspend_type= 'تم الاستلام';
                            $class_suspend='danger';
                            ?>
                               <span style="width: 50%;color: black !important;" class="label label-<?=$class_suspend?>"><?=$suspend_type?></span>
                           <?php }else{
                           
                        ?>
          <button  onclick='swal({
title: "هل انت متأكد من الاستلام ؟",
text: "",
type: "warning",
showCancelButton: true,
confirmButtonClass: "btn-warning",
confirmButtonText: "استلام",
cancelButtonText: "إلغاء",
closeOnConfirm: false
},
function(){
swal("تم الاستلام!", "", "success");
window.location="<?=base_url()?>maham_mowazf/shkawi/Shkawi/read_shakwa/<?= $row->id?>";
});' class="btn btn-warning">
<i class="fa fa-archive">استلام الشكوي </i></button>

<?php }?>
                    </td>
                    </tr>
                    <?php 
                   $x++; }?>
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
<div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="text-align: center;">التفاصيل</h4>
            </div>
            <div class="modal-body" style="padding: 10px 0" id="result">
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%;">
                <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>
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
<script>
    function load_details(row_id) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>maham_mowazf/shkawi/Shkawi/load_details",
            data: {row_id:row_id},
            success: function (d) {
                $('#result').html(d);
            }
        });
    }
</script>