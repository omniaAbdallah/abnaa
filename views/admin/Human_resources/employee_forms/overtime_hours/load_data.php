<?php
                                        if (isset($result->details) && !empty($result->details)) {
                                            ?>
                    <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0"
                       width="100%">
                                        <thead>
                                        <tr class="greentd">
                                        <th >م</th>
                                            <th >التاريخ</th>
                                            <th >من الساعة</th>
                                            <th >إلى الساعة</th>
                                            <th >المدة</th>
                                            <th >البدل الأضافي</th>
                                            <th >العمل المكلف بإنجازه</th>
                                            <th>الاجراء</th>
                                        </tr>
                                        </thead>

                                        <tbody id="result_pageTable">
                                        <?php
                                   //     if (isset($result->details) && !empty($result->details)) {
                                            $z = 0;
                                            foreach ($result->details as $item) {
                                                if (isset($_POST['from_profile']) && (!empty($_POST['from_profile']))) {
                                                    $link_delete = 1;
                                                } else {
                                                    $link_delete = 0;
                                                }
                                                $z++;
                                                ?>
                                                <tr class="open_green" id="tr<?= $z ?>">
                                                <td><?= $z ?></td>
                                                    <td><?= $item->date_ar ?></td>
                                                    <td>
                                               
                                                    
                          <?= $item->from_hour ?>
                                                    </td>
                                                    <td><?= $item->to_hour ?>
                                                    </td>
                                                    <td><?= $item->num_hours ?>
                                                        
                                                    </td>
                                                    <td>
                                                           
                                                                  
                                                                  <?php  echo  $item->dbal_type_name;?>
                                                                
                                                          
                                                       </td>
                                                    <td>
                                                    
                                                    <?= $item->work_assigned ?>
                                                   
                                                                  </td>
                                                    <td class="text-center">
                                                    <a onclick="update(<?= $item->id  ?>,<?= $item->order_id_fk  ?>)"
                                        >
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                        <a 
                                                                
                                                                onclick="delete_item(<?= $item->id  ?>,<?= $item->order_id_fk  ?>)"
                                                                >
                                                            <i class="fa fa-trash"> </i></a>
                                                    </td>
                                                </tr>

                                                <?php
                                            }
                                        
                                            ?>
                                           

                                        </tbody>

                                       
                                    </table>

                                    <?php }?>

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