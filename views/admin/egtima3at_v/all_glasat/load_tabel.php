<div class="col-xs-12 fadeInUp wow">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"> <?php echo $title_t; ?> </h3>
        </div>

        <div class="panel-body">
    
    
    
   
        <?php if(isset($records)&&!empty($records)){?>
        <table id="examplee" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
            <thead>
            <tr class="info">
                <th>مسلسل</th>
                <th>رقم الجلسة</th>
                <th>تاريخ  الجلسة</th>
                <th>عنوان  الجلسة</th>
                <th>معتمد  الجلسة</th>
                <th>حالة الجلسة</th>
                <th>الأعضاء </th>
                <th>الاجراء</th>
               
            </tr>
            </thead>
            <tbody>
<?php
$x=0;
foreach ($records as $row){
    $x++;
    
    if($row->finshed == 0){
      $Halet_galsa = 'جلسة نشطة'; 
      $Halet_galsa_color = '#98c73e'; 
    }elseif($row->finshed == 1){
        $Halet_galsa = 'جلسة إنتهت '; 
         $Halet_galsa_color = '#e65656';   
    }
    ?>
                <tr>
                    <td><?=$x?></td>
                    <td><?=$row->galsa_rkm?></td>
                    
                            <td><?= $row->galsa_date ?></td>
                            <td><?= $row->enwan_galsa ?></td>
                            <td><?= $row->suspender_emp_n ?></td>
                            
                    <td style="background-color:<?php echo $Halet_galsa_color;  ?>;">
                    <?php echo $Halet_galsa; ?>
                    </td>
                    
                    <td>
                        <button type="button" class="btn btn-sm btn-add" onclick="get_memebers(<?=$row->galsa_rkm?>)" ><span class="fa fa-list"></span> <?=$row->hader_num?></button>
                    </td>
                    <td>
 
 <?php
     if($row->finshed == 0){ ?>
 


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
                                                        update_galsa(<?= $row->galsa_rkm ?>);
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
                                                    setTimeout(function(){delete_galsa(<?= $row->galsa_rkm ?>);}, 500);
                                                    });'>
                                                <i class="fa fa-trash"> </i></a>

  <?php   }elseif($row->finshed == 1){ ?>
<span style="font-weight: normal !important;" class="label-danger label label-default">لايمكن التعديل والحذف</span>
  <?php   } ?>
  
  
        

        

 
 
 

 
                    
                       
                    </td>
                   




                </tr>
    <!----------------------------------------------------------------->
 
<!----------------------------------------------------->
<?php } ?>


            </tbody>
        </table>
                <?php } else {
                        echo '<div class="alert alert-danger">لا توجد بيانات</div>';
                    }  ?>


    </div>
        </div>
    </div>

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
    colReorder: true
} );



</script>
