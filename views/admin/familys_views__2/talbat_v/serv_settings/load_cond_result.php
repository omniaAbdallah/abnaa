<?php
 if (isset($result) && !empty($result)){
     $x=1;
     if ($type==1){
         $name = 'خطوات تنفيذ الخدمة';
     } elseif ($type==2){
         $name = ' المستندات المطلوبة';
     } else{
         $name= '' ;
     }
     ?>
    <table id="" class="table exampleee  table-bordered table-striped table-hover">
        <thead>
        <tr class="greentd">
            <th>م</th>
            <th class=""><?= $name?> </th>
            <th >  الاجراء</th>
        </tr>
        </thead>
        <tbody>
        <?php
          foreach ($result  as $row){
              ?>
              <tr>
                  <td><?= $x++?></td>
                  <td><?= $row->title?></td>
                  <td>
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
                              load_edit(<?= $row->id ?>,"<?= $row->title?>",<?= $row->khdma_id_fk ?>,<?= $row->type ?>);
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
                              delete_setting(<?= $row->id ?>,<?= $row->khdma_id_fk ?>,<?= $row->type ?>)
                              });'>
                          <i class="fa fa-trash"> </i></a>
                     
                  </td>
              </tr>
        <?php
          }
        ?>
        </tbody>
    </table>
    <?php
 }
 ?>
<script>
    $('.exampleee').DataTable( {
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