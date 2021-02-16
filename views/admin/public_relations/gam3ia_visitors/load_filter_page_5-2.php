<?php

 ?>
<input type="hidden" id="from_date" value="<?= $from_date?>">
<input type="hidden" id="to_date" value="<?= $to_date ?>">
<input type="hidden" id="degree_id" value="<?= $degree_id ?>">
<table class="table table-striped table-bordered dt-responsive nowrap" id="js_table_load">
    <thead>
    <tr class="greentd">
        <th>م</th>
        <th>التاريخ</th>
        <th>وقت وصول الزائر</th>
        <th>اسم الزائر </th>
        <th>رقم الجوال </th>
        <th>الفئه </th>
        <th>الغرض من الزيارة </th>
        <th>يرغب بالتواصل </th>
        <th>وقت انتهاء الزيارة</th>
        <th>الوقت المستغرق</th>
        <th>الاجراء</th>
        <th>مستقبل الزيارة</th>

    </tr>
    </thead>

</table>
<script>
    var date_from = $('#from_date').val() ;

    var date_to = $('#to_date').val() ;

     var degree_id = $('#degree_id').val();


    var oTable_usergroup = $('#js_table_load').DataTable({
        dom: 'Bfrtip',
        "ajax": {
            "url" :'<?php echo base_url(); ?>Public_relation/visitors_data' ,
            "type" : "POST",
            "data" : {
               "date_from":date_from,
                "date_to":date_to,
                "degree_id":degree_id
            },

        } ,

        aoColumns:[
            { "bSortable": true },
            { "bSortable": true },
            { "bSortable": true },
            { "bSortable": true },
            { "bSortable": true },
            { "bSortable": true },
            { "bSortable": true },
            { "bSortable": true },
            { "bSortable": true },
            { "bSortable": true },
            { "bSortable": true },
            { "bSortable": true },

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
                exportOptions: { columns: ':visible'},
                orientation: 'landscape'
            },
            'colvis'
        ],
        colReorder: true,
        "bDestroy": true



    });
</script>


