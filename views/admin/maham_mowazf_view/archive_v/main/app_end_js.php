<script type="text/javascript">
    $(document).ready(function () {
        var oTable_usergroup = $('#js_table_end').DataTable({
            dom: 'Bfrtip',
            "ajax": '<?php echo base_url(); ?>maham_mowazf/archive/main/Main/end_data',
            aoColumns: [
                {"bSortable": true},
                {"bSortable": true},
                {"bSortable": true},
                {"bSortable": true},
                {"bSortable": true},
                {"bSortable": true},/*2-9-20-om*/
                {"bSortable": true},
            ],
            buttons: [
                'pageLength',
                'copy',
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
    });
</script>
