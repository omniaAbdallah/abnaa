<style>
td .fa-trash{
    background: none !important;
    padding: 0px !important;
} 
td .fa-pencil{
    background: none !important;
     padding: 0px !important;
}
td .fa-eye{
    background: none !important;
     padding: 0px !important; 
}
td .fa-print{
    background: none !important;
     padding: 0px !important;
}
</style>
<div class="col-md-12 " style="">



     <div class="float-right">
                    <a href="<?=site_url('finance_accounting/box/ezn_sarf/Ezn_sarf/addEzn')?>" class="btn btn-primary btn-flat">
                        <i class="fa fa-plus"></i> 
                        إضافة إذن صرف جديد </a>
      
                </div>
          



                        <?php if(!empty($records)){?>
                            <table id="example" class="table table-bordered" role="table">
                                <thead>
                                <tr class="info">
                                    <th width="2%">#</th>
                                    <th class="text-left">رقم الإذن</th>
                                    <th class="text-left">تاريخ الإذن</th>
                                    <th class="text-left">مقدم الإذن</th>
                                    <th class="text-left">الإدارة</th>
                                 
                                    <th class="text-left">المبلغ</th>
                                    <th class="text-left">الجهة / المستفيد</th>
                                   
                                    <th class="text-left">الإجراء</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if (isset($records) && $records != null) {
                                    $x = 1;
                                    foreach ($records as $value) {
                                        ?>
                                        <tr>
                                            <td><?=$x++?></td>
                                            <td><?=$value->ezn_rkm?></td>
                                            <td><?=$value->ezn_date_ar?></td>
                                            <td><?=$value->emp_name?></td>
                                            <td><?=$value->edara_n?></td>
                          
                                            <td><?=$value->value?></td>
                                            <td><?=$value->geha_name?></td>
                                            
                                          

                                            <td>
                                            <!--
<a href="<?=base_url()."finance_accounting/box/ezn_sarf/Ezn_sarf/addEzn/".$value->id?>" title="تعديل"><i class="fa fa-pencil"></i></a>
<a href="<?=base_url()."finance_accounting/box/ezn_sarf/Ezn_sarf/print_ezn/".$value->id?>" title="طباعه"><i class="fa fa-print"></i></a>


<a onclick="$('#adele').attr('href', '<?=base_url()."finance_accounting/box/ezn_sarf/Ezn_sarf/deleteEzanSarf/".$value->id?>');" data-toggle="modal" data-target="#modal-delete" title="حذف"><i class="fa fa-trash"></i></a>




<button title="تفاصيل الإذن" type="button" class="btn btn-labeled btn-info" data-toggle="modal" data-target="#searchModal" 
onclick="GetTable(<?php echo$value->id;?>)">
<span class="btn-label"><i class="glyphicon glyphicon-list"></i></span>
</button>

<button title="تحويل الإذن" type="button" class="btn btn-labeled btn-success" data-toggle="modal"
data-target="#transferModal"   data-backdrop="static" data-keyboard="false"
onclick="GetTransferPage(<?php echo$value->id;?>, <?=$value->level?>)">
<span class="btn-label"><i class="fa fa-undo"></i></span>
</button>
<a href="<?php echo base_url().'finance_accounting/box/ezn_sarf/Ezn_sarf/eznTransform/'.$value->id.'/'.$value->level ?>">
<button type="button" class="btn btn-labeled btn-warning "  style="color: #002342;">
<span class="btn-label"><i class="glyphicon glyphicon-pencil"></i></span>
</button></a>
-->


 
<div class="btn-group btn-group-sm">
        <a href="#" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
         <a href="#" class="btn btn-inverse"><i class="fa fa-print"></i></a>
        <a target="_blank" href="#" class="btn btn-purple"><i class="fa fa-list"></i></a>
        
    <a href="#" onclick="return confirm(\'Are You Sure To Delete? \')" 
    class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </a>
    
    
   <a target="_blank" href="#" 
       data-toggle="modal" data-target="#transferModal"   data-backdrop="static" data-keyboard="false"
onclick="GetTransferPage(<?php echo$value->id;?>, <?=$value->level?>)"
   class="btn btn-purple"><i class="fa fa-list"></i></a>
     
    <!--<button title="تحويل الإذن" type="button" class="btn btn-labeled btn-success" 
    data-toggle="modal" data-target="#transferModal"   data-backdrop="static" data-keyboard="false"
onclick="GetTransferPage(<?php echo$value->id;?>, <?=$value->level?>)" >
<span class="btn-label"><i class="fa fa-undo"></i></span>
</button>-->
      </div>
                    
                                            
                                            
                                            
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                                </tbody>
                            </table>
                        <?php  }  else { ?>
                            <div style="color: red; font-size: large;" class="col-sm-12">لم يتم  إضافة أذونات !!</div>

                        <?php } ?>



    <div class="panel panel-default">
        
        <div class="panel-body">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab1" data-toggle="tab">الأذونات الصادرة</a></li>
              
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade in active" id="tab1">
                    <div class="panel-body">

                    </div>
                </div>
                
                

            </div>

        </div>
    </div>
</div>





<div class="modal fade" id="modal-img" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">صورة المرفق</h4>
            </div>
            <div class="modal-body">
                <img  id="my_image" src="#" width="100%">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>




<div class="modal fade" id="myModal_attach" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 50%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">المرفقات</h4>
            </div>
            <?php    echo form_open_multipart('all_Finance_resource/all_pills/AllPills/add_attach');?>

            <div class="modal-body">
                <button type="button"  onclick="add_row()" class="btn btn-success btn-next"/>
                <i class="fa fa-plus"></i> إضافة </button><br><br>
                <div class="AttachTable">


                    <table   class="table table-striped table-bordered fixed-table mytable "
                             style="display: none; "  >
                        <thead>
                        <tr class="info">
                            <th  class="text-center" > إسم المرفق</th>
                            <th class="text-center" >المرفق</th>
                            <th class="text-center" > الإجراء</th>
                        </tr>
                        </thead>
                        <tbody class="resultTable"></tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <!--<input type="hidden" name="id" id="id" >-->
                <button type="button" class="btn btn-success" style="display: inline-block;padding: 6px 12px;" onclick="GetAttachTable()"
                        id="saves"  data-dismiss="modal">حفظ</button>
                <button type="button" class="btn btn-danger"
                        data-dismiss="modal">إغلاق</button>

            </div>
            <?php echo form_close();?>
        </div>
    </div>
</div>






<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width:70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">التفاصيل</h4>
            </div>
            <div class="modal-body" id="optionearea1">

            </div>
            <div class="modal-footer" >
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>

<!---------------------------------------------------------myModals------------------------------------>



<div class="modal fade" id="transferModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width:85%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">تفاصيل التحويل</h4>
            </div>

            <form method="post" action="" id="saveAction">
                <div class="modal-body" id="optionearea2">

                </div>
                <div class="modal-footer" style="display: inline-block;width: 100%">

                    <button type="submit" class="btn btn-labeled btn-success" name="procedure_title_action" value="accept">
                        <span class="btn-label"><i class="glyphicon glyphicon-ok"></i></span>أوافق
                    </button>

                    <button type="submit" name="procedure_title_action" id="procedure_title_action" value="refuse" class="btn btn-labeled btn-purple">
                        <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>لا أوافق
                    </button>




                </div>
                <?php //echo form_close();
                ?>
            </form>
        </div>
    </div>
</div>


<!----- end table ------>

<div class="modal fade" id="Accounts" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width:75%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">الدليل المحاسبي </h4>
            </div>
            <div class="modal-body">
                <table id="" class="table table-bordered example" role="table">
                    <thead>
                    <tr class="info">
                        <th width="2%">#</th>
                        <th class="text-left">رقم الحساب</th>
                        <th class="text-left">إسم الحساب</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (isset($tree) && $tree!=null) {
                        buildTreeTable($tree);
                    }
                    function buildTreeTable($tree, $count=1)
                    {
                        $types = array(1=>'رئيسي',2=>'فرعي');
                        $nature = array('','مدين','دائن');
                        $follow = array(1=>'ميزانية',2=>'قائمة الأنشطة');
                        $colorArray = array(1=>'#FFB61E', 2=>'#3c990b', 3=>'#5b69bc', 4=>'#E5343D', 5=>'#d9edf7');
                        foreach ($tree as $record) {
                            $onclick = "alert('ليس حساب فرعي');";
                            if ($record->hesab_no3 == 2) {
                                $onclick = "$('#account').val('".$record->code." ".$record->name."'); $('#band_name').val('".$record->name."'); $('#band_code').val('".$record->code."'); $('#Accounts').modal('hide');";
                            }
                            ?>
                            <tr style="background-color: <?=$colorArray[$record->level]?>; cursor: pointer;" onclick="<?=$onclick?>">
                                <td><?=$count++?></td>
                                <td><?=$record->code?></td>
                                <td><?=$record->name?></td>
                            </tr>
                            <?php
                            if (isset($record->subs)) {
                                $count = buildTreeTable($record->subs, $count++);
                            }
                        }
                        return $count;
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer" >
                <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>


<!------------------------------------------------------------->
<div class="modal fade" id="myModalInfo44" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">قائمة الاذونات</h4>
            </div>
            <div class="modal-body">

                <div  id="all_ezn"></div>
            </div>
            <div class="modal-footer"  style="display: inline-block;width: 100%" >
                <button type="button" class="btn btn-danger"
                        style="float: left;" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>

<!------------------------------------------------------------------------------------------------>

<script>
   function  checkInputs() {
  /*     var ay7aga =document.getElementsByClassName('inputclass').value
       var value = $('.inputclass').filter(function () {
           return this.value != '';
       });*/


  /* if ($('.inputclass').length > 0) {
       alert('some fields are empty!');
   }else {

       alert('some fields are empty!');
   }
*/
   }
</script>


<script>
    function add_row(){
        $(".mytable").show();
        //var x = document.getElementById('resultTable');
        var len = $(".resultTable").length +1;

        $(".resultTable").append('<tr id="'+ len +'"><td><input type="input" name="title[]" id="title"  class="form-control  " data-validation="reuqired"></td><td><input type="file" name="file[]" id="file"  class="form-control " data-validation="reuqired"></td><td><a href="#"  onclick="DeleteRow('+ len +')"> <i class="fa fa-trash" ></i> </a></td></tr>');
    }
    function DeleteRow(valu) {
        $('#' + valu).remove();
        // var x = document.getElementById('resultTable');
        var len = $(".resultTable").length ;
        if( len ==0){
            $(".mytable").hide();
        }
    }

</script>
<script>
    function validate_number(evt) {
        var theEvent = evt || window.event;
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode( key );
        var regex = /[0-9]|\./;
        if( !regex.test(key) ) {
            theEvent.returnValue = false;
            if(theEvent.preventDefault) theEvent.preventDefault();
        }
    }
</script>


<script>
    function get_length(len,span_id)
    {
        if(len.length < 10){
            document.getElementById("save").setAttribute("disabled", "disabled");
            document.getElementById(""+ span_id ).innerHTML = 'أقصي عدد 10 ارقام';
        }
        if(len.length >10){
            document.getElementById("save").setAttribute("disabled", "disabled");
            document.getElementById(""+ span_id ).innerHTML = 'أقصي عدد 10 ارقام';
        }
        if(len.length ==10){
            document.getElementById("save").removeAttribute("disabled", "disabled");
            document.getElementById(""+ span_id ).innerHTML = '';
        }
    }
</script>

<script>
    function chek_length(inp_id,len)
    {
        var inchek_id="#"+inp_id;
        var inchek =$(''+inchek_id).val();
        if(inchek.length < len){
            document.getElementById(""+ inp_id +"_span").style.color = '#F00';
            document.getElementById(""+ inp_id +"_span").innerHTML = 'أقصي عدد '+len+' ارقام';
            document.getElementById("save").setAttribute("disabled", "disabled");
            var inchek_out= inchek.substring(0,len);
            $(inchek_id).val(inchek_out);
        }
        if(inchek.length > len){
            document.getElementById(""+ inp_id +"_span").style.color = '#F00';
            document.getElementById(""+ inp_id +"_span").innerHTML = 'أقصي عدد '+len+' ارقام';
            document.getElementById("save").setAttribute("disabled", "disabled");
            var inchek_out= inchek.substring(0,len);
            $(inchek_id).val(inchek_out);
        }
        if(inchek.length == len){
            document.getElementById(""+ inp_id +"_span").innerHTML ='';
            document.getElementById("save").removeAttribute("disabled", "disabled");
        }
    }
</script>












<!------------------------------------start---------------------------->


<script>

    function GetF2aTypeArr(valu) {
        $('#js_table_members').show();
        var F2aType = valu;
        var oTable_usergroup = $('#js_table_members').DataTable({
            dom: 'Bfrtip',
            "ajax": '<?php echo base_url(); ?>all_Finance_resource/all_pills/AllPills/getConnection/' + F2aType,

            aoColumns:[
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true }
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
            destroy: true

        });

    }

</script>


<script>

    function GetDiv(div,valu) {

        if(valu ==1){
            var html =('<div class="col-md-12"><table id="js_table_members" class="table table-striped table-bordered dt-responsive nowrap " >' +
            '<thead><tr><th style="width: 50px;">#</th><th style="width: 50px;"> كود الموظف </th><th style="width: 170px;" >إسم الموظف </th><th style="width: 170px;" >الإدارة</th>' +
            '<th style="width: 170px;" >القسم</th></tr></thead><table><div id="dataMember"></div></div>');
            var Columns    = {aoColumns:[
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true }
            ]};

        } else if(valu ==2){
            var html =('<div class="col-md-12"><table id="js_table_members" class="table table-striped table-bordered dt-responsive nowrap " >' +
            '<thead><tr><th style="width: 50px;">#</th><th style="width: 50px;"> رقم الملف </th><th style="width: 170px;" >إسم رب الأسرة </th><th style="width: 170px;" >رقم هوية الاب</th> <th style="width: 170px;" >إسم مسئول الحساب البنكي</th> <th style="width: 170px;" >رقم هوية</th>' +
            '</tr></thead><table><div id="dataMember"></div></div>');
            var Columns    = {aoColumns:[
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true }
            ]};
        }  else if(valu ==3){
            var html =('<div class="col-md-12"><table id="js_table_members" class="table table-striped table-bordered dt-responsive nowrap " >' +
            '<thead><tr><th style="width: 10px;">#</th><th style="width: 50px;" > الإسم </th><th style="width: 50px;">رقم الهوية</th>' +
            '</tr></thead><table><div id="dataMember"></div></div>');
            var Columns    = {aoColumns:[
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true }
            ]};
        }  else if(valu ==4){
            var html =('<div class="col-md-12"><table id="js_table_members" class="table table-striped table-bordered dt-responsive nowrap " >' +
            '<thead><tr><th style="width: 10px;">#</th><th style="width: 50px;"> الإسم </th>' +
            '</tr></thead><table><div id="dataMember"></div></div>');
            var Columns    = {aoColumns:[
                { "bSortable": true },
                { "bSortable": true }
            ]};
        } else if(valu ==5){
            var html =('<div class="col-md-12"><table id="js_table_members" class="table table-striped table-bordered dt-responsive nowrap " >' +
            '<thead><tr><th style="width: 10px;">#</th><th style="width: 50px;"> الإسم </th>' +
            '</tr></thead><table><div id="dataMember"></div></div>');
            var Columns    = {aoColumns:[
                { "bSortable": true }
            ]};
        }


        $("#" + div).html(html);
        $('#type').val(valu);
        $('#js_table_members').show();
        var F2aType = valu;
        var oTable_usergroup = $('#js_table_members').DataTable({
            dom: 'Bfrtip',
            "ajax": '<?php echo base_url(); ?>finance_accounting/box/ezn_sarf/Ezn_sarf/getConnection/' + F2aType,
            Columns
            ,
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
            destroy: true

        });

    }
</script>
<script>

    function GetMemberName(valu) {
        var id = valu;
        var name = $("#member" + valu).data('name');
        var mob = $("#member" + valu).data('mob');
        var mother_num = $("#member" + valu).data('mother_num');
        var type = $("#member" + valu).data('type');
        $('#person_name').val(name);
        $('#person_name_div').html(name);
        $('#person_span').html(name);
        $('#person_mob').val(mob);
        if(mother_num  !=''){
            $('#mother_national_num').val(mother_num);
        }
        if(type  !=''){
            $('#type').val(type);
        }
        $("#myModalInfo .close").click();


    }

</script>







<script>

    function GetArabicNum(valu) {


        if (valu !=0 &&   valu!='') {
            var dataString = 'number=' + valu ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>all_Finance_resource/all_pills/AllPills/GetArabicNum',
                data:dataString,
                cache:false,
                success: function(json_data){
                    var JSONObject = JSON.parse(json_data);
                    $('.arabic_number').val(JSONObject['title']);
                    $('.arabic_number2').html(JSONObject['value']);
                    $('#arabic_number_span').html(JSONObject['title']);
                }
            });

        }
    }

</script>










<script>
    function GetDate2(valu) {
        $('#day_date_span').html(valu);
    }
</script>



<script>

    function GetTable(valu) {
        if (valu !=0 &&   valu!='') {
            var dataString = 'id=' + valu ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>finance_accounting/box/ezn_sarf/Ezn_sarf/GetTable',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#optionearea1").html(html);
                }
            });

        }

    }

    function GetTransferPage(valu, level) {
        $('#procedure_title_action').removeAttr('disabled');
        if (level == 0) {
            $('#saveAction').attr('action','<?=base_url()?>finance_accounting/box/ezn_sarf/Ezn_sarf/addEmpAction');
            $('#procedure_title_action').attr('disabled','disabled');
        }
        if (level == 1) {
            $('#saveAction').attr('action','<?=base_url()?>finance_accounting/box/ezn_sarf/Ezn_sarf/addModeerAction');
        }
        if (level == 2) {
            $('#saveAction').attr('action','<?=base_url()?>finance_accounting/box/ezn_sarf/Ezn_sarf/addMohasebAction');
        }
        if(level == 3){
            $('#saveAction').attr('action','<?=base_url()?>finance_accounting/box/ezn_sarf/Ezn_sarf/Transformation_process');

        }
        if(level == 4){
            $('#saveAction').attr('action','<?=base_url()?>finance_accounting/box/ezn_sarf/Ezn_sarf/Manager_Transformation');
        }
        if (valu !=0 &&   valu!='') {
            var dataString = 'id=' + valu ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>finance_accounting/box/ezn_sarf/Ezn_sarf/GetTransferPage',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#optionearea2").html(html);
                }
            });

        }

    }

    /*
     function GetTransferPage(valu) {
     if (valu !=0 &&   valu!='') {
     var dataString = 'id=' + valu ;
     $.ajax({
     type:'post',
     url: '<?php echo base_url() ?>finance_accounting/box/ezn_sarf/Ezn_sarf/GetTransferPage',
     data:dataString,
     dataType: 'html',
     cache:false,
     success: function(html){
     $("#optionearea2").html(html);
     }
     });

     }

     }*/
</script>







<!-----------------------------------------table attach---------------------->
<script>

    function GetAttachTable() {
        $('#AttachTableDiv').html('');
        $(".AttachTable").clone().appendTo('#AttachTableDiv')
        $("#myModal_attach .close").click();
    }

</script>

<script>

    function get_all_ezn(div,valu) {


        $("#" + div).html('<div class="col-md-12"><table id="js_table_members" class="table table-striped table-bordered dt-responsive nowrap " >' +
            '<thead><tr><th style="width: 50px;">#</th><th style="width: 50px;"> رقم الاذن </th><th style="width: 170px;" >تاريخ الاذن </th><th style="width: 170px;" >المبلغ</th><th style="width: 170px;" >الجهه/المستفيد </th><th style="width: 170px;" >رقم الجوال </th>' +
            '</tr></thead><table><div id="dataMember"></div></div>');


        $('#js_table_members').show();

        var oTable_usergroup = $('#js_table_members').DataTable({
            dom: 'Bfrtip',
            "ajax": '<?php echo base_url(); ?>finance_accounting/box/ezn_sarf/Ezn_sarf/get_all_ezn/',

            aoColumns:[
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true },
                { "bSortable": true }
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
            destroy: true

        });

    }
</script>

<script>
    function get_detail(id,level)
    {

        window.location.href = "<?php echo base_url();?>finance_accounting/box/ezn_sarf/Ezn_sarf/eznTransform/"+id+"/"+level;
    }


</script>
