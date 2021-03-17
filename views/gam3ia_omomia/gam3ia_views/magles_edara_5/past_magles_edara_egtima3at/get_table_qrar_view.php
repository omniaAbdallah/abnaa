<div class="row">
    <?php if (isset($result) && (!empty($result))) { ?>
        <table id="example" class="table table-striped table-bordered table-result">
            <thead>
            <tr>
                <th>م</th>
              
                <th>القرار</th>
                <th>المحور</th>
               
            </tr>
            </thead>
            <tbody>
            <?php $x = 1;
            foreach ($result as $row) { ?>
                <tr>
                    <td><?php echo $x; ?></td>
                    <td><?php echo $row->elqrar; ?></td>
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


    $('#example').DataTable({
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
<script>

    function show_img(src) {

        var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
        WinPrint.document.write('<img src="' + src + '">');
        WinPrint.document.close();
        WinPrint.focus();
    }
</script>
