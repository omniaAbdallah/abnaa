





                                
                                                    <?php if (!empty($all_data)){ ?>
                                                        <table id="example_mem" class="table table-striped table-bordered table-result"  >
                                                            <thead>
                                                            <tr class="">
                                                                <th>م</th>
                                                                <th>إسم العضو</th>
                                                                <th>المنصب</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                        <?php $x =1;
                                                        foreach ($all_data as $row){ ?>
                                                            <tr>
                                                                <td><?php echo $x; ?></td>
                                                                <td><?php echo $row->mem_name; ?></td>
                                                                <td><?php echo $row->mansp_title; ?></td>
                                                            </tr>
                                                            <?php
                                                            $x++;}
                                                            ?>
                                                            </tbody>
                                                        </table>


                                                            <?php  } ?>
                                                

                                
<script>


    $('#example_mem').DataTable({
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
                exportOptions: {columns: ':visible'},
                orientation: 'landscape'
            },
            'colvis'
        ],
        colReorder: true
    });


</script>
