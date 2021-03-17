<script type="text/javascript">
    function get_date_esalat_tarhil() {
        var date_from = $('#from_date').val();
        var date_to = $('#to_date').val();
        var user_id = $('#user_id').val();

        var date1 = new Date(date_from);
        var date2 = new Date(date_to);

       if (date1 <= date2) {
           var oTable_usergroup = $('#js_table_customer').DataTable({
               dom: 'Bfrtip',
               "ajax": {
                   "url": '<?php echo base_url(); ?>all_Finance_resource/all_pills/AllPills/data',
                   "type": "POST",
                   "data": {
                       "date_from": date_from,
                       "date_to": date_to,
                       "user_id": user_id
                   },
               },
               "initComplete": function (settings, json) {
                   check_toggle();
               },
               aoColumns: [
                   {"bSortable": true},
                   {"bSortable": true},
                   {"bSortable": true},
                   {"bSortable": true},
                   {"bSortable": true},
                   {"bSortable": true},
                   {"bSortable": true},
                   {"bSortable": true},
                   {"bSortable": true},
                   {"bSortable": true},
                   {"bSortable": true},
                   {"bSortable": true},
                   {"bSortable": true}
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
               colReorder: true,
               destroy: true


           });
       }else {
           swal({
               title: "التأكد من ادخال فترة  صحيح ",
               type: 'warning',
               confirmButtonColor: '#3085d6',
               confirmButtonText: "تم"
           });
       }
    }

    $(document).ready(function () {


        get_date_esalat_tarhil();
        function check_toggle() {
            var rowcollection = oTable_usergroup.$(".checkbox_toggle", {"page": "all"});
            rowcollection.each(function (index, obj) {
                $(this).bootstrapToggle({
                    on: 'نشط',
                    off: 'غير نشط'
                });


            });
        }

    });
</script>

