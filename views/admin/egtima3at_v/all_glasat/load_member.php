

<table id="exampleey" class="table-bordered table table-responsive tb-table">
    <thead>
    <tr >
        <th >م</th>
        <th >النوع</th>
        <th>كود الموظف</th>
        <th>اسم الموظف</th>
        <th > المسمي الوظيفي</th>
        <th >  الإدارة</th>
        <th > القسم</th>
        <th >  الوظيفة بالجلسة</th>
        <th >   الحضور</th>
       
    </tr>
    </thead>
    <tbody >
    <?php
   
    if ((isset($galsa_member)) && (!empty($galsa_member)) && ($galsa_member != 0)) {
        $z = 1;
        foreach ($galsa_member as $sanfe) {
            ?>
            <tr id="row_<?= $z ?>">
                <td><?= $z ?></td>
                <td><?php
                if($sanfe->type==1)
                {
                    echo "موظف";
                }
                else  if($sanfe->type==2)
                {
                    echo "عضو جمعيه عمومية";
                }
                
                
                ?></td>
               
                <td><?= $sanfe->emp_code ?>
                           </td>
                <td><?= $sanfe->emp_n ?></td>
                <td><?= $sanfe->emp_mosama_wazifa_n ?>
                           </td>
                <td><?= $sanfe->emp_edara_n ?>
                         
                           </td>
               
                           <td><?= $sanfe->emp_qsm_n ?>
                           
                           </td>
                           <td> 
                             <?php  if ($sanfe->wazifa_in_galsa==1) {
                                    echo 'رئيس الجلسة';
                                }?>
<?php  if ($sanfe->wazifa_in_galsa==2) {
                                   echo  ' أمين سر الجلسة';
                                }?> 
           <?php  if ($sanfe->wazifa_in_galsa==3) {
                                    echo  'عضو بالجلسة';
                                }?>
                           
                        </select></td>
                        <td>
                        <?php if($sanfe->hdoor_satus==1)
                        {
                            echo "<i class='fa fa-check' style='color: green;'></i>";

                    }
                        else{
                            echo "<i class='fa fa-remove' style='color: red;'></i>";
                        }?>
                        </td>

              
            </tr>
                            <?php }} else {
                        echo '<div class="alert alert-danger">لا توجد بيانات</div>';
                    }?>
            </tbody>
            </tabel>
            <script>




$('#exampleey').DataTable( {
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