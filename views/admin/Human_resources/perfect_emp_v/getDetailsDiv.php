
<?php if (isset($records) && $records != null) { ?>
    <div class="col-sm-12 no-padding">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">
                <h3 class="panel-title"> الموظف المثالي</h3>
            </div>
            <div class="panel-body">
                <table id="examplex" class=" table table-bordered table-striped" role="table">
                    <thead>
                    <tr class="greentd">
                        <th>م</th>

                        <th class="text-center">
                        كود الموظف</th>
                        <th class="text-center">اسم الموظف</th>
                        <th class="text-center"> الأدارة</th>
                        <th class="text-center">القسم</th>
                        <th class="text-center">المسمى الوظيفي</th>
                        <th class="text-center">خلال شهر</th>
                        <th class="text-center">الحالة </th>
                        <th class="text-center">الإجراء</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $x = 1;
                    foreach ($records as $value) {
                        ?>
                        <tr>
                            <td><?= $x++ ?></td>
                        
                            
                        
                            <td><?= $value->emp_code ?></td>
                            <td><?= $value->emp_name ?></td>
                            <td><?php 
                            if(isset($value->edara_n)&&!empty($value->edara_n)) 
                            echo $value->edara_n ;
                            else echo 'غير محدد';
                            ?></td>
                            <td>
                            <?php 
                            if(isset($value->qsm_n)&&!empty($value->qsm_n)) 
                            echo $value->qsm_n ;
                            else echo 'غير محدد';
                            ?>
                            
                            </td>
                            <td>
                            <?php 
                            if(isset($value->mosma_wazefy_n)&&!empty($value->mosma_wazefy_n)) 
                            echo $value->mosma_wazefy_n ;
                            else echo 'غير محدد';
                            ?>
                            
                            </td>

                            <td>
                            
                            <?php
                       

$months = array("Jan" => "يناير", "Feb" => "فبراير", "Mar" => "مارس", "Apr" => "أبريل", "May" => "مايو", "Jun" => "يونيو", "Jul" => "يوليو", "Aug" => "أغسطس", "Sep" => "سبتمبر", "Oct" => "أكتوبر", "Nov" => "نوفمبر", "Dec" => "ديسمبر");
    $your_date = $value->date_ar; // The Current Date
    $en_month = date("M", strtotime($your_date));
    foreach ($months as $en => $ar) {
        if ($en == $en_month) { 
            
            echo $ar; 
        
        }
    }

                            ?>
                            </td>
                            
                            <td>
                            <?php
 if ($value->status == 1) {

    $status_checked= "checked";

   

  }else {

    $status_checked="";

   



  }
                      ?>
                      
  <div class="toggle-example">
         <input id="status_hidden<?php echo $value->id;?>" type="hidden" value="<?php echo $value->status;?>"/>
         <input id="checkbox_toggle" class="checkbox_toggle" type="checkbox" <?=$status_checked?> data-toggle="toggle"
          onchange="change_status($('#status_hidden<?php echo $value->id;?>').val(),<?php echo $value->id;?>)"
                 data-onstyle="success" data-offstyle="danger" data-size="mini">
                 </div>
                             </td>
                             <td>  
                         
                                    <!-- <a onclick="Delete_namozeg(<?= $value->id ?>)" title="حذف"><i
                                                class="fa fa-trash"></i></a> -->
                              
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
        swal("تم الحذف!", "", "success");
        setTimeout(function(){window.location="<?= base_url() . 'human_resources/perfect_emp/Perfect_emp_c/Delete_namozeg/' . $value->id ?>";}, 500);
        });'>
    <i class="fa fa-trash"> </i></a> 
                                
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php } ?>

<script src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js" type="text/javascript"></script>

<script src="<?php echo base_url() ?>asisst/admin_asset/plugins/bootstrap-toggle/bootstrap-toggle.min.js"
        type="text/javascript"></script>
<script>
$('.checkbox_toggle').bootstrapToggle({
  on: 'نشط',
  off: 'غير نشط'
});
</script>
<script>
$('#examplex').DataTable( {
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