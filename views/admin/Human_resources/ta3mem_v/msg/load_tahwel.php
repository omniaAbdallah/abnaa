
    <table id="tahwel" class="tahwel display table  table-bordered table-striped" role="table">
        <thead>
        <tr class="greentd">
        <th >
                                            <input type="checkbox" onclick="check_all(this,'tahwel')"  style="width: 90px;height: 20px;"/>

                                            </th>
            <th class="text-center">الاداره</th>

        </tr>
        </thead>
        <tbody>
        <?php
        $x = 1;
        foreach ($all as $row) {
            $row_n = $row->title;
            ?>
            <tr>
            <!-- <input type="checkbox" id="myCheck"  onclick="myFunction()"> -->
                <td><input style="width: 90px;height: 20px;" type="checkbox" name="<?= $row->id ?>" id="myCheck<?=$row->id?>"  data-id="<?= $row->id ?>"
                class="checkbox  radio"  value="<?= $row_n?>"       onchange="Get_emp_Name(<?= $row->id ?>,'<?= $row_n?>',1)"></td>

                <td><?= $row_n ?></td>

            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>





<script>

    $('#tahwel').DataTable( {
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



<script>
    function check_all(elem,table_id) {
        var oTable = $('.'+table_id).dataTable();
var rowcollection = oTable.$(".checkbox", {"page": "all"});
rowcollection.each(function (index, obj) {
    obj.checked = elem.checked;
  
   
    var id= obj.name;
  var name= obj.value;
  if(obj.checked)
  {
    Get_emp_Name(id,name,1);
  }
  else{
   
    
    $("#edara_id_fk" + id).remove();
            $("#edara_fk_name" + id).remove();
  }

}

);
    }
</script>

