






    <?php if (isset($records) && $records != null) { ?>
                <table id="examplex" class=" table table-bordered table-striped" >
                    <thead>
                    <tr class="greentd">
                        <th>م</th>
                        <th class="text-center">كود الموظف</th>
                        <th class="text-center">اسم الموظف</th>
                        <th class="text-center">المشاهدة </th>
                        <th class="text-center">وقت المشاهدة </th>
                        <th class="text-center">تاريخ المشاهدة </th>
                        <th class="text-center">رأى مدير المباشر</th>
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
                            <td>                           
<?php if($value->seen ==1)
{
    echo "
    <span style='
    background-color: green;
'>
    تمت الموافقة <i class='fa fa-wrong'> </i></span>";
}
else if($value->seen ==2)
{
    echo "
    <span style='
    background-color: green;
'>
    تم  الرفض <i class='fa fa-wrong'> </i></span>";
}
else{
    echo " <span style='
    background-color: red;
'>لم تتم المشاهدة</span>";
}
?></td>
  <td><?php
  if(!empty($value->seen_date))
  {
  echo $value->seen_date;
  }else{
      echo 'غير محدد';
  } ?></td>
  <td>
  <?php
  if(!empty($value->seen_time))
  {
    echo $value->seen_time;
  }else{
      echo 'غير محدد';
  } ?></td>
  
  <td>
    <?php if ($value->current_to_action == 1) {
        echo "<span style=' background-color: green;'>  تمت الموافقة <i class='fa fa-wrong'> </i></span>";
    } else if ($value->current_to_action == 2) {
        echo " <span style='background-color: red;'> تم  الرفض <i class='fa fa-wrong'> </i></span>";
    } else {
        echo " <span style='background-color: #efc10a;'>لم تتم المشاهدة</span>";
    }
    ?></td>
                        </tr>
                        <?php
                   $x++; }
                    ?>
                    </tbody>
                </table>
<?php } ?>


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