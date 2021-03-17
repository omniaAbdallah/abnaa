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



 
<div class="btn-group btn-group-sm">

    

<?php if( $value->suspend != 4 ){ ?>
               <a target="_blank" href="<?= base_url() . "finance_accounting/box/ezn_sarf/Ezn_sarf/editeEzn/" . $value->id ?>"
           class="btn btn-warning"><i class="fa fa-pencil"></i>تعديل</a> 
<?php } ?>
     

<?php //if( $value->suspend != 4 ){
    ?>
    
    <?php  if($value->level == 6 and $value->suspend == 4 ){
          $egraa_label = 'تفاصيل';
        ?>
  
    <?php }else{
         $egraa_label = 'الإجراء';
    }?>
    
    
   <a target="_blank" href="#" 
       data-toggle="modal" data-target="#transferModal"   data-backdrop="static" data-keyboard="false"
onclick="GetTransferPage(<?php echo$value->id;?>, <?=$value->level?>)"
   class="btn btn-success"><i class="fa fa-list"></i> <?=$egraa_label?> </a>

<?php 
//} 
?>


   
   
   
<?php if($value->amin_name == null and $value->suspend == 4 ){ ?>
            <a class="btn btn-warning"

               onclick="get_emplyee(<?php echo $value->id ?>,<?php echo $value->id ?>)"

               title="المفوضين بالتوقيع"><i class="fa fa-user"></i>المفوضين بالتوقيع</a>
    
   <?php } ?> 
   

   
   
  <?php
 // echo $value->suspend;
  if($value->amin_name != null and $value->suspend == 4 ){ 
   ?>  
    <a target="_blank"  href="<?=base_url()."finance_accounting/box/ezn_sarf/Ezn_sarf/print_namozag_ezn/".$value->id?>" class="btn btn-inverse"><i class="fa fa-print"></i>طباعة</a>
        
    <a target="_blank" href="<?= base_url() . "finance_accounting/box/ezn_sarf/Ezn_sarf/morfqat_ezn/" . $value->id ?>" class="btn btn-success"><i class="fa fa-cloud-upload"></i>مرفقات</a>
        

  
        <?php } ?>
             

  <?php
 // echo $value->suspend;
  if($value->level == 6 and $value->suspend == 4 and $value->qed_num ==null ){ 
  // echo 'asdasdasd';
   ?> 
     <a class="btn btn-warning btn-sm"  title=" تنفيذ الصرف"
           href="<?= base_url() . 'finance_accounting/box/ezn_sarf/Ezn_sarf/make_sand_sarf/' . $value->id ?>"
           title=""><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
 </a>
   
   
   <?php }elseif($value->level == 6 and $value->suspend == 4 and $value->qed_num !=null ){  ?>
       <span style="    height: 31px;
    border-radius: unset;" title="تم التنفيذ برقم قيد <?=$value->qed_num?> وسند صرف رقم <?=$value->rqm_sanad?>" class="label label-success"><i class="fa fa-check-circle" aria-hidden="true"></i>
</span>
<?php } ?>

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



    <!--<div class="panel panel-default">
        
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
    -->
</div>





<div class="modal fade" id="myModal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document" style="width: 60%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">المفوضين بالتوقيع</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <?php echo form_open(base_url() . "finance_accounting/box/ezn_sarf/Ezn_sarf_request/update_amin_manager", array('id' => 'emplyee_form')) ?>
                    <div class="col-md-12">
                        <input type="hidden" name="process_rkm" value="0" id="process_rkm_for_emp">
                        <table class="table table-bordered twqeat-table">
                            <tbody>
                            <tr>
                               <td style="width: 60px;"></td>
                                <td style="background-color: #3c990b; color: white;">أمين الصندوق</td>
                                <td><input type="text" name="amin_name"
                                           id="d_name"
                                           style="color: #000;font-size: 18px;"
                                          value="<?php echo $amin_name; ?>"
                                           class="form-control bottom-input"
                                           data-validation="required"
                                           data-validation-has-keyup-event="true"></td>
                            </tr>
                            <tr>
                                <td><input type="radio" name="toggle"
                                           id="toggleElement" value="1"
                                           onchange="toggleStatus()"
                                           style=""></td>
                                <td style="background-color: #3c990b; color: white;">رئيس مجلس الإدارة
                                </td>
                                <td><input type="text" name="manager_name"
                                           id="manager_name"value="<?php echo $manager_name ?>"
                                           style="color: #000;font-size: 18px;"
                                           class="form-control bottom-input"></td>
                            </tr>
                            <tr>
                                <td><input type="radio" name="toggle"
                                           id="toggleElement1" value="2"
                                           onchange="toggleStatus()"
                                           style=""></td>
                                <td style="background-color: #3c990b; color: white;">نائب رئيس مجلس الإدارة
                                </td>
                                <td><input type="text" name="naeb_name"
                                           id="naeb_name"
                                              value="<?php echo $naeb_name ?>"
                                           style="color: #000;font-size: 18px;"
                                           class="form-control bottom-input"
                                        <?php if (empty($naeb_name)) ?>></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                        
                      <button style="float: left;" type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>
                  <button style="float: left;margin-left: 3px;" type="submit" class="btn btn-labeled btn-success " name="save" value="save">
                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ 
                    </button>
                    <?php echo form_close() ?>
                </div>
            </div>
           <!-- <div class="modal-footer">
                <button type="button" class="btn btn-labeled btn-success " onclick="update_amin_manager()"
                        id="save_start_workss"
                        name="add"
                        value="حفظ">
                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                </button>
                <span class=" label-danger" id="save_start_work_span" style="display: none;float: right">  </span>
                <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>
            </div>-->
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

                  <!--    <button type="submit" class="btn btn-labeled btn-success" name="procedure_title_action" value="accept">
                        <span class="btn-label"><i class="glyphicon glyphicon-ok"></i></span>أوافق
                    </button>

                    <button type="submit" name="procedure_title_action" id="procedure_title_action" value="refuse" class="btn btn-labeled btn-purple">
                        <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>لا أوافق
                    </button>
-->



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


    function toggleStatus() {

        if ($('#toggleElement').is(':checked')) {

            $('#manager_name').removeAttr('disabled');

            $('#manager_name').attr("data-validation", "required");

            $('#naeb_name').attr('disabled', 'disabled');

        } else if ($('#toggleElement1').is(':checked')) {

            $('#naeb_name').removeAttr('disabled');

            $('#naeb_name').attr("data-validation", "required");

            $('#manager_name').attr('disabled', 'disabled');

        } else {

        }

    }
    
  function get_emplyee(process_rkm, emp_tawfed) {

        $('#myModal').modal('show');

        $('#process_rkm_for_emp').val(process_rkm);

        if (emp_tawfed) {

            $('input:radio[name=toggle]').val([emp_tawfed]);

            toggleStatus();

        }

    }



    function update_amin_manager() {

        var all_inputs = $(' #emplyee_form [data-validation="required"]');

        var valid = 1;

        var text_valid = "";

        all_inputs.each(function (index, elem) {

            console.log(elem.id + $(elem).val());

            if ($(elem).val().length >= 1) {

                // valid=1;

                $(elem).css("border", "2px solid #5cb85c");

            } else {

                valid = 0;

                $(elem).css("border", "2px solid #ff0000");

            }

        });

        var radioValue = $("input[name='toggle']:checked").val();

        if (!radioValue) {

            valid = 0;

            text_valid += 'حدد احد الموظفين ';

        }

        $.ajax({

            type: 'post',

            url: $('#emplyee_form').attr('action'),

            method: "POST",

            data: $('#emplyee_form').serialize(),

            beforeSend: function (xhr) {

                if (valid == 0) {

                    Swal.fire({

                        title: 'من فضلك ادخل كل الحقول ',

                        text: text_valid,

                        icon: 'error',

                        confirmButtonText: 'تم'

                    });

                    xhr.abort();

                } else if (valid == 1) {

                    Swal.fire({

                        title: "جاري الحفظ ... ",

                        text: "",

                        imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',

                        showConfirmButton: false,

                        allowOutsideClick: false

                    });

                }

            },

            success: function (html) {

                Swal.fire({

                    title: 'تم  الحفظ  بنجاح',

                    icon: 'success',

                    confirmButtonText: 'تم'

                });

                location.reload();

            }

        });

    }

    
    
    


</script>
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
            /*        if (level == 0) {
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
        }*/
            if (valu != 0 && valu != '') {
                var dataString = 'id=' + valu;
                $.ajax({
                    type: 'post',
                    url: '<?php echo base_url() ?>finance_accounting/box/ezn_sarf/Ezn_sarf_request/GetTransferPage',
                    data: dataString,
                    dataType: 'html',
                    cache: false,
                    success: function (html) {
                        $("#optionearea2").html(html);
                    }
                });
            }
        }
    /*function GetTransferPage(valu, level) {
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
*/
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
    <div id="result_files">
    </div>
    <!-- yara -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            put_value(<?= $ezn_sarf_id_fk; ?>)
        });
    </script>
    <script>
        function show_img(src) {
            var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write('<img src="' + src + '" style="width: 100%; height:  100%;">');
            WinPrint.document.close();
            WinPrint.focus();
        }
    </script>
    <script>
        function show_bdf(src) {
            var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write('<iframe src="' + src + '" style="width: 100%; height:  100%;" frameborder="0"></iframe>');
            WinPrint.document.close();
            WinPrint.focus();
        }
    </script>