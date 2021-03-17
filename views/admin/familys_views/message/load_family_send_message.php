<?php 
   if(isset($data_table) && !empty($data_table) && $data_table!=null){?>
   <table id="tahwel" class="tahwel display table  table-bordered table-striped" role="table">
        <thead>
        <tr class="greentd">
        <th>
                <input type="checkbox" onclick="check_all(this,'tahwel')" style="width: 90px;height: 20px;"/>
            </th>
            
            <th class="text-center">رقم الملف</th>
          
            <th class="text-center">إسم العائلة </th>
            <th class="text-center">إسم الام </th>
            <th class="text-center">رقم الهوية </th>
     
            <th class="text-center"> رقم الجوال </th>
        </tr>
        </thead> 
        <tbody class="text-center">
        <?php 
        $x=1; foreach ($data_table as $row){
           ?>
            <tr>
                <!-- <td class="text-center"><?=$x++?></td> -->
                <td><input style="width: 90px;height: 20px;" type="checkbox" name="<?= $row->file_num ?>"
                           id="myCheck<?= $row->file_num ?>" data-id="<?= $row->file_num ?>" data-name="<?=$row->father_full_name?>"
                           class="checkbox  radio" value="<?= $row->mother_national_num ?>"
                           onchange="Get_emp_Name(<?= $row->file_num ?>)"></td>
               
                <td class="text-center"><?=$row->file_num?> </td>

                <td class="text-center"><?=$row->father_full_name?> </td>
                <td class="text-center"><?=$row->full_name?> </td>
                <td class="text-center"><?=$row->mother_national_num?> </td>
               

                <td class="text-center">
                    <?php echo (!empty($row->contact_mob))? $row->contact_mob : "غير محدد"; ?>
                </td>
                
              
                <?php }?>
            </tr>
        <?php }?>
        </tbody>
        </table>

        <script>
    $('#tahwel').DataTable({
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
    function check_all(elem, table_id) {
        var oTable = $('.' + table_id).dataTable();
        var rowcollection = oTable.$(".checkbox", {"page": "all"});
        rowcollection.each(function (index, obj) {
                obj.checked = elem.checked;
                console.log(obj.value);
                var id = obj.name;
            
                if (obj.checked) {
                    Gettahwel(id);
                } else {
                    $("#file_num" + id).remove();
           
                }
            }
        );
    }
</script>
<script>
    function Gettahwel(file_num) {
        // $('#text111').hide();
        $('#message_date').append("<input type='hidden' id='file_num" + file_num + "'  name='file_num[]' value='" + file_num + "'/>" );
        document.getElementById("submit_but").removeAttribute("disabled", "disabled");
          
            console.log(file_num);
        
    }
</script>