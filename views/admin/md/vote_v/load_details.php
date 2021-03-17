<!-- yara -->





				
<?php
                    if (isset($get_all) && !empty($get_all)){
                        $x=1;
                       
                        ?>
                    <table  id="example888" class="table example table-bordered table-striped table-hover">
                        <thead>
                          <tr class="greentd">
                              <th>م</th>
                            
                              <th> العضو </th>
                              <th> التصويت</th>
                            
                              <th>التاريخ</th>
                           
                        

                          </tr>
                        </thead>
                        <tbody >
                        <?php
                        foreach ($get_all as $row){
                         
                            ?>
                            <tr>
                                <td><?= $x++?></td>
                              
                                <td>
                                    <?php
                                    if (!empty($row->mem_name)){
                                        echo $row->mem_name;
                                    } else{
                                        echo 'لا يوجد ' ;
                                    }
                                    ?>

                                </td>
                               
                               
                                <td>
                                    <?php
                                    if (!empty($row->answer)&& $row->answer==1){
                                        echo $options->vote_option1;
                                    } else if ($row->answer==2){
                                        echo $options->vote_option2;
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if (!empty($row->date_ar)){
                                        echo $row->date_ar;
                                    } else{
                                        echo 'غير محدد  ' ;
                                    }
                                    ?>
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




$('#example888').DataTable( {
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



<!-- yara -->