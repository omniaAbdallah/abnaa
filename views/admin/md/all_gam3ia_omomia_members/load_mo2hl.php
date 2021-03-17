<?php
                      //  echo '<pre>'; print_r($reasons_settings);
                        
                        if (!empty($science_qualification)) { ?>
                            <table id="example2" class=" example table table-bordered table-striped" role="table">
                                <thead>
                                <tr class="greentd">
                                    <th width="2%">#</th>
                                    <th class="text-center">المؤهل</th>
                                  
                                    <th class="text-center">الإجراء</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $x = 1;
                                foreach ($science_qualification as $value) {
                                    ?>
                                    <tr>
                                        <td style=" cursor: pointer;" data-title="<?= $value->id_setting ?>" onclick="getTitle_mo2hl('<?php echo $value->title_setting; ?>','<?php echo $value->id_setting; ?>');">
                                        <?=$x++;?></td>
                                        <td style=" cursor: pointer;" data-title="<?= $value->id_setting ?>" onclick="getTitle_mo2hl('<?php echo $value->title_setting; ?>','<?php echo $value->id_setting; ?>');">
                                            <?= $value->title_setting ?></td>
                                      
                                        <td>
                                          
                                          <a href="#" onclick="delete_mo2hl(<?= $value->id_setting ?>);"> <i class="fa fa-trash"> </i></a>

                                        <a href="#" onclick="update_mo2hl(<?= $value->id_setting ?>);"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>


                                        


                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>


                        <?php } else { ?>

                            <div class="alert alert-danger">لاتوجد بيانات !!</div>
                        <?php } ?>
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

