<?php
                                if (isset($message) && !empty($message)){
                                    $x=1;
                                    ?>
                                    <table id="exampleex" class="table example table-bordered table-striped table-hover">
                                        <thead>
                                        <tr class="greentd">
                                            <th>#</th>
                                            <th>   نوع الشكوي</th>
                                            <th>  الاجراء</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach ($message as $row ){
                                            ?>
                                            <tr>
                                            <td><?=$x;?> </td>
                                            <td style="cursor: pointer" data-title="<?=  $row->id  ?>" onclick="getTitle_shkwa_type(<?= $row->id ?>,'<?= $row->title?>')"  >
                                                <?= $row->title?>
                                            </td>
                                            <td>
                                         
                                            <a href="#" onclick="update_shkwa_type(<?= $row->id  ?>);"><i class="fa fa-pencil-square-o" aria-hidden="true"> </i></a>

                                            <a href="#" onclick="delete_shkwa_type(<?=  $row->id  ?>);"><i class="fa fa-trash"> </i></a>
                                  
                                            </td>
                                               

                                            </tr>
                                            <?php
                                       $x++; }
                                        ?>
                                        </tbody>

                                    </table>

                                    <?php
                                } else{
                                    ?>

                                    <?php
                                }
                                ?>


<script>




$('#exampleex').DataTable( {
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