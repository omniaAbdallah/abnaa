
<?php if(isset($all) &&!empty($all)){
    $title ='';
    $name ='';
    if ($type==1){
        $title = 'الاسم';
        $name = 'employee';
    } else if ($type==2){
        $title = 'القسم';
        $name = 'name';
    }
    else if ($type==3){
        $title = 'الاداره';
        $name = 'name';
    }


    ?>

    <br><br>

    <table id="tahwel" class="tahwel display table  table-bordered table-striped" role="table">
        <thead>
        <tr class="greentd">
        <th >
                                            <input type="checkbox" onclick="check_all(this,'tahwel')"  style="width: 90px;height: 20px;"/>

                                            </th>
            <th class="text-center"><?= $title?></th>

        </tr>
        </thead>
        <tbody>
        <?php
        $x = 1;
        foreach ($all as $row) {
            $row_n = $row->$name;
            ?>
            <tr>
            <!-- <input type="checkbox" id="myCheck"  onclick="myFunction()"> -->
                <td><input style="width: 90px;height: 20px;" type="checkbox" name="<?= $row->id ?>" id="myCheck<?= $row->id ?>"  data-id="<?= $row->id ?>"
                class="checkbox  radio"  value="<?= $row_n?>"       onchange="GettahwelName(<?= $row->id ?>,'<?= $row_n?>')"></td>

                <td><?= $row_n ?></td>

            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>


<?php } else{
    ?>
    <div class="alert-danger alert">عفوا... لا يوجد بيانات !</div>

    <?php
}
?>


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
  
   console.log(obj.value);
   var id= obj.name;
  var name= obj.value;
  if(obj.checked)
  {
  Gettahwel(id,name);
  }
  else{
    $("#"+id).remove();
    
    $("#to_user_fk"+id).remove();
    $("#to_user_fk_name"+id).remove();
  }

}



);
    }
</script>

<script>
    function Gettahwel(id,name) {
       
     
 
   // $('#text111').hide();
    
   $("#thwel_emp").append("<li  name=f id='"+id+"'>"+name+"</li>");
 $('#to_user_n').append("<input type='hidden' id='to_user_fk"+id+"'  name='to_user_fk' value='"+id+"'/><input type='hidden'  data-validation='required' id='to_user_fk_name"+id+"' name='to_user_fk_name' value='"+name+"'/>");


    }
</script>