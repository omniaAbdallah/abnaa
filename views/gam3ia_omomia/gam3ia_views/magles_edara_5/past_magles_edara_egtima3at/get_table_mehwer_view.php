<div class="row">
    <?php if (isset($result) && (!empty($result))) { ?>
        <table id="mehwer" class="table table-striped table-bordered table-result">
            <thead>
            <tr>
                <th>م</th>
                <th>المحور</th>
            
            </tr>
            </thead>
            <tbody>
            <?php $x = 1;
            foreach ($result as $row) { ?>
                <tr>
                    <td><?php echo $x; ?></td>
                    <td><?php echo $row->mehwar_title; ?></td>
                   
                </tr>
                <?php
                $x++;
            }
            ?>
            </tbody>
        </table>


    <?php } ?>
</div>


<script>


    $('#mehwer').DataTable({
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

