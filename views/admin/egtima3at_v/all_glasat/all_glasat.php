

<?php if($_SESSION['role_id_fk']==3){?>
<div id="show_edite">
<div class="col-xs-12 fadeInUp wow">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"> <?php echo $title;  ?> </h3>
        </div>

        <div class="panel-body">
            <?php
            if(isset($galsa_member)){?>
           
            <!-- <form action="<?php echo base_url();?>md/all_glasat/All_glasat/update_galsa/<?php echo $this->uri->segment(5);?>/
<?php echo $this->uri->segment(6);?>" method="post" id="form1"> -->
<?php echo form_open_multipart('md/all_glasat/All_glasat/update_galsa/'.$last_magls_update->id.'', array( 'class' => 'galsa_form')); ?>

                <?php } else{?>
                    <?php echo form_open_multipart('md/all_glasat/All_glasat', array( 'class' => 'galsa_form')); ?>
                <!-- <form action="<?php echo base_url();?>md/all_glasat/All_glasat" method="post" id="form1"> -->

                <?php   }  ?>
            <div class="col-sm-12">
                
                <div class="form-group col-sm-2">
                    <label class="label">رقم الجلسه</label>
                    <input type="text" class="form-control" data-validation="required" name="glsa_rkm_full" readonly value="<?php echo date("Y");?>/<?php echo $edara;?>/<?php echo $last_galsa;?>"/>
                    <input type="hidden" name="glsa_rkm" readonly value="<?php echo $last_galsa;?>"/>

                    <input type="hidden" name="glsa_edara" readonly value="<?php echo $edara;?>"/>
                </div>

                <div class="form-group col-md-2 col-sm-6 col-xs-12 padding-4">
                   
                        <label class="label"> تاريخ  الجلسة </label>
                        <input  type="date"  class="form-control"
                        onchange="check_day();"
                         data-validation="required" name="galsa_date" id="galsa_date"
                        value="<?=date('Y-m-d');?>"  />
                    
                </div>
                <div class="form-group col-md-1 col-sm-6 col-xs-12 padding-4">
                   
                        <label class="label">   الموافق </label>
                        <input  type="text"  class="form-control" data-validation="required" name="galsa_day" 
                        id="galsa_day"
                       readonly
                        value="<?php
                        // $t=date('d-m-Y');
                        // echo date("D",strtotime($t));
                        $find = array ("Sat", "Sun", "Mon", "Tue", "Wed" , "Thu", "Fri");
    $replace = array ("السبت", "الأحد", "الإثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة");
    $ar_day_format = date('D'); // The Current Day
    $ar_day = str_replace($find, $replace, $ar_day_format);
    echo $ar_day;
                        
                        ?>"  />
                    
                </div>
                <div class="form-group col-md-1 col-sm-6 col-xs-12 padding-4">
                   
                        <label class="label"> توقيت  الجلسة </label>
                        <!-- <input  type="date"  class="form-control" data-validation="required" name="galsa_time" 
                        value="<?=date('Y-m-d');?>"  /> -->

                        <input  id="m13h" 
                        
                        onchange="check_time();"
                        class="form-control" type="text" data-validation="required" name="galsa_time"
                      
                        value="<?=date('h:i:s');?>" 
                        >
                    
                </div>
              

                <div class="form-group col-md-4 col-sm-6 col-xs-12 padding-4">
                   
                   <label class="label"> عنوان  الجلسة </label>
                   <input  class="form-control" data-validation="required" name="enwan_galsa" 
                          value="<?php if(isset($last_magls_update))echo $last_magls_update->enwan_galsa;?> " type="text"   />
               
                  </div>
<div class="form-group col-md-2 col-sm-6 col-xs-12 padding-4">


        <label class="label">   أمين السر  </label>


<select id="suspender_emp_n" name="suspender_emp_n" data-validation="required"

title="    اختر أمين السر   "

class="form-control selectpicker"

data-show-subtext="true"

data-live-search="true">
<option value="" > اختر أمين السر  </option>
<?php

if (isset($all_Emps) && (!empty($all_Emps))) {

foreach ($all_Emps as $key) {

$select = '';

if (isset($last_magls_update) && (!empty($last_magls_update))) {

if ($key->employee == $last_magls_update->suspender_emp_n) {

$select = 'selected';

}

}

?>
<option value="<?php echo $key->employee; ?>" <?= $select ?>> <?php echo $key->employee; ?></option>
<?php }
} ?>
</select>
</div>
  
               
</div>


              

<div class="col-md-12 no-padding">

        <table id="table_anf" class="table-bordered table table-responsive tb-table">
            <thead>
            <tr class="greentd">
                <th >م</th>
                <th>كود الموظف</th>
                <th>اسم الموظف</th>
                <th > المسمي الوظيفي</th>
                <th >  الإدارة</th>
                <th > القسم</th>
                <th >  الوظيفة بالجلسة</th>
                <th>   </th>
            
            </tr>
            </thead>
            <tbody id="asnafe_table">
            <?php
            $total = 0;
            if ((isset($one_data['asnaf'])) && (!empty($one_data['asnaf'])) && ($one_data['asnaf'] != 0)) {
                $z = 1;
                foreach ($one_data['asnaf'] as $sanfe) {
                    ?>
                    <tr id="row_<?= $z ?>">
                        <td><?= $z ?></td>
                    
                        <td><input type="text" name="code[]" class="form-control testButton "
                                id="code<?= $z ?>"
                                value="<?= $sanfe->emp_code ?>"
                                ondblclick=" GetDiv_sanfe('myDiv_sanfe',<?= $z ?>,1)"
                                readonly/></td>
                        <td><input type="text" name="emp_n[]" class="form-control testButton "
                                id="emp_n<?= $z ?>"
                                value="<?= $sanfe->emp_n ?>" readonly/></td>
                        <td><input type="text" name="emp_mosama_wazifa_n[]" class="form-control testButton "
                                id="emp_mosama_wazifa_n<?= $z ?>"
                                value="<?= $sanfe->emp_mosama_wazifa_n ?>" readonly/>
                                <input type="hidden" name="emp_mosama_wazifa[]" id="emp_mosama_wazifa<?= $z ?>"   value="<?= $sanfe->emp_mosama_wazifa ?>"/>
                                </td>
                        <td><input type="text" name="emp_edara_n[]" class="form-control testButton "
                                id="emp_edara_n<?= $z ?>"
                                value="<?= $sanfe->emp_edara_n ?>" readonly/>
                                <input type="hidden" name="emp_edara[]" id="emp_edara<?= $z ?>"   value="<?= $sanfe->emp_edara ?>"/>
                                </td>
                    
                                <td><input type="text" name="emp_qsm_n[]" class="form-control testButton "
                                id="emp_qsm_n<?= $z ?>"
                                value="<?= $sanfe->emp_qsm_n ?>" readonly/>
                                <input type="hidden" name="emp_qsm[]" id="emp_qsm<?= $z ?>"   value="<?= $sanfe->emp_qsm ?>"/> 
                                </td>
                                <td> <select name="wazifa_in_galsa[]" id="wazifa_in_galsa<?= $z ?>" data-validation="required"
                                        class=" form-control "  disabled
                                        data-show-subtext="true" data-live-search="true"
                                
                                        aria-required="true">
                                    <option value="">اختر</option>
                                    <option value="1" <?php  if ($sanfe->wazifa_in_galsa==1) {
                                            $selected = 'selected';
                                        }?>>رئيس الجلسة</option>
                   
                    <option value="3"<?php  if ($sanfe->wazifa_in_galsa==3) {
                                            $selected = 'selected';
                                        }?>> عضو بالجلسة</option>
                                
                                </select></td>

                        <td><a id="1" onclick=" $(this).closest('tr').remove();"><i
                                        class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php
                    $total = $total + $sanfe->all_egmali;
                    $z++;
                }
            } else { ?>
                <tr id="row_1">
                    <td>1</td>
                    <td><input type="text" name="code[]" class="form-control testButton "
                            id="code1" value=""
                            data-validation="required"
                            ondblclick=" GetDiv_sanfe('myDiv_sanfe',1,1)"
                            readonly/>
                            <input type="hidden" name="type[]" id="type1" value=""/>  
                            
                            </td>
                            
                    <td><input type="text" data-validation="required" name="emp_n[]"
                            class="form-control testButton "
                            id="emp_n1" value="" readonly/>
                            
                            </td>
                    <td><input type="text"  name="emp_mosama_wazifa_n[]"
                            class="form-control testButton "
                            id="emp_mosama_wazifa_n1" value="" readonly/>
                            <input type="hidden" name="emp_mosama_wazifa[]" id="emp_mosama_wazifa1" value=""/>  
                            </td>
                    <td><input type="text"  name="emp_edara_n[]"
                            class="form-control testButton "
                            id="emp_edara_n1" value="" readonly/>
                            <input type="hidden" name="emp_edara[]" id="emp_edara1" value=""/> 
                            </td>
                    <td><input type="text"  name="emp_qsm_n[]"
                    readonly
                            class="form-control testButton "
                            id="emp_qsm_n1" value=""/>
                            <input type="hidden" name="emp_qsm[]" id="emp_qsm1" value=""/> 
                            </td>
                    <td> <select name="wazifa_in_galsa[]" id="wazifa_in_galsa1" data-validation="required"
                    class=" form-control "
                                        data-show-subtext="true" data-live-search="true"
                                
                                        aria-required="true">
                                    <option value="">اختر</option>
                                    <option value="1" >'رئيس الجلسة</option>
                              
                                    <option value="3"> عضو بالجلسة</option>
                                    
                                </select></td>
                
                

                    <td>
                    <!-- <a id="1" onclick=" $(this).closest('tr').remove();"><i
                                    class="fa fa-trash"></i></a> -->
                                    
                                    </td>
                </tr>
            <?php } ?>
            </tbody>
            <tfoot>


            <tr>
              
            
                <th colspan="6" class="text-center" style="background-color: #fff;">
                    <!--<button type="button" onclick="" class="btn-danger btn" style="font-size: 16px;"><i
                                class="fa fa-trash"></i> حذف صنف
                    </button>-->
                </th>
                <th colspan="2" class="text-center" style="background-color: #fff;">
                    <button type="button" onclick="add_row_sanfe();  " class="btn-success btn"
                            style="font-size: 16px;"><i class="fa fa-plus"></i> إضافة موظف
                    </button>
                </th>
            </tr>

            </tfoot>
        </table>
</div>

            </form>

            
 
            <div class="col-md-12 text-center">
                                <!--<button type="submit"
                                        class="btn btn-labeled btn-success " name="add" value="ADD" style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                </button>-->
                               <?php if ((isset($open_galesa)) && (!empty($open_galesa)) && ($open_galesa > 0)) {

                                            $span = '<span  class="label-danger"> عذرا...  لا يمكنك إضافة جلسة جديدة لوجود جلسة نشطة </span>';
                                            $disabled = 'disabled';
                                        } else {
                                            $span = '';
                                            $disabled = '';
                                        } ?>   

                   <?php if (isset($last_magls_update) && $last_magls_update != null):$input_name1 = 'update';
                                    $input_name2 = 'update_save';
                                    echo '<input type="hidden"  name="id"  id="id" value="' . $last_magls_update->id . '">';
                                    $onclick = "update();";
                                else: $input_name1 = 'add';
                                $onclick ="save()";
                                    $input_name2 = 'add_save'; endif; ?>

                    <button type="button" <?= $disabled ?> 
                            class="btn btn-labeled btn-success " onclick="<?=$onclick?>" name="<?=$input_name1?>"
                            value="ADD"
                            style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                                            <span class="btn-label"><i
                                                        class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                    </button>
                   <input type="hidden" name="add" value="ADD"/>
                     <?= $span ?>

            </div>
                       
       
    </div>
    </div> 
    </div> 
    
    </div> 
    <!-- modal -->
<div class="modal fade" id="myModal_emp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"> الموظفين </h4>
            </div>
            <div class="modal-body">
            <div class="form-group">
            <div class="radio-content">
                <input type="radio" checked id="esnad1" name="esnad_to"  class="sarf_types" value=""  onclick=" GetDiv_sanfe('myDiv_sanfe',$('#esnad1').val(),1)">
                <label for="esnad1" class="radio-label"> موظف</label>
            </div>
            <div class="radio-content">
                <input type="radio" id="esnad2" name="esnad_to"  class="sarf_types" value="" onclick="GetDiv_sanfe('myDiv_sanfe',$('#esnad2').val(),2)">
                <label for="esnad2" class="radio-label"> عضو جمعيه عمومية</label>
            </div>
            </div>
                <div id="myDiv_sanfe"></div>
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <button type="button" class="btn btn-danger"
                        style="float: left;" data-dismiss="modal">إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
    <!-- modal -->
<div id="show_details">
<div class="col-xs-12 fadeInUp wow">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"> <?php echo $title_t; ?> </h3>
        </div>

        <div class="panel-body">
    
    
    
   
        <?php if(isset($records)&&!empty($records)){?>
        <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
            <thead>
            <tr class="info">
                <th>مسلسل</th>
                <th>رقم الجلسة</th>
                <th>تاريخ  الجلسة</th>
                <th>عنوان  الجلسة</th>
                <th>معتمد  الجلسة</th>
                <th>حالة الجلسة</th>
                <th>الأعضاء </th>
                <th>الاجراء</th>
               
            </tr>
            </thead>
            <tbody>
<?php
$x=0;
foreach ($records as $row){
    $x++;
    
    if($row->finshed == 0){
      $Halet_galsa = 'جلسة نشطة'; 
      $Halet_galsa_color = '#98c73e'; 
    }elseif($row->finshed == 1){
        $Halet_galsa = 'جلسة إنتهت '; 
         $Halet_galsa_color = '#e65656';   
    }
    ?>
                <tr>
                    <td><?=$x?></td>
                    <td><?=$row->galsa_rkm?></td>
                    
                            <td><?= $row->galsa_date ?></td>
                            <td><?= $row->enwan_galsa ?></td>
                            <td><?= $row->suspender_emp_n ?></td>
                            
                    <td style="background-color:<?php echo $Halet_galsa_color;  ?>;">
                    <?php echo $Halet_galsa; ?>
                    </td>
                    <td>
                        <button type="button" class="btn btn-sm btn-add" onclick="get_memebers(<?=$row->galsa_rkm?>)" ><span class="fa fa-list"></span> <?=$row->hader_num?></button>
                    </td>
                    <td>
 
 <?php
     if($row->finshed == 0){ ?>
 


    <a onclick='swal({
                                                    title: "هل انت متأكد من التعديل ؟",
                                                    text: "",
                                                    type: "warning",
                                                    showCancelButton: true,
                                                    confirmButtonClass: "btn-warning",
                                                    confirmButtonText: "تعديل",
                                                    cancelButtonText: "إلغاء",
                                                    closeOnConfirm: true
                                                    },
                                                    function(){
                                                        update_galsa(<?= $row->galsa_rkm ?>);
                                                    });'>
                                                <i class="fa fa-pencil"> </i></a>
                                            <a onclick=' swal({
                                                    title: "هل انت متأكد من الحذف ؟",
                                                    text: "",
                                                    type: "warning",
                                                    showCancelButton: true,
                                                    confirmButtonClass: "btn-danger",
                                                    confirmButtonText: "حذف",
                                                    cancelButtonText: "إلغاء",
                                                    closeOnConfirm: true
                                                    },
                                                    function(){
                                                    setTimeout(function(){delete_galsa(<?= $row->galsa_rkm ?>);}, 500);
                                                    });'>
                                                <i class="fa fa-trash"> </i></a>

  <?php   }elseif($row->finshed == 1){ ?>
<span style="font-weight: normal !important;" class="label-danger label label-default">لايمكن التعديل والحذف</span>
  <?php   } ?>
  
  
        

        

 
 
 

 
                    
                       
                    </td>
                   




                </tr>
    <!----------------------------------------------------------------->
   
<!----------------------------------------------------->
<?php } ?>


            </tbody>
        </table>
        <?php } else {
                        echo '<div class="alert alert-danger">لا توجد بيانات</div>';
                    }  ?>
                    </div>
        </div>
    </div>


    


    </div>
<?php }else{
     echo '<div class="alert alert-danger">    نظرا لانك ليس موظف.. لا يمكنك إقامة إجتماع مجلس </div>';

 }?>

<div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
        <div class="modal-dialog" role="document" style="width: 80%">
    
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">تفاصيل الأعضاء</h4>
                </div>
                <br>
                <div class="modal-body form-group col-sm-12 col-xs-12" id="show">
                    
                </div>
                <div class="modal-footer" style="border-top: 0;">
                    <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                </div>
            </div>
        </div>
</div>
<script>
    function save_galsa() {
        var members = [];
        $.each($("input[name='member_id[]']:checked"), function () {
            members.push($(this).val());
        });

        var members_num = document.getElementsByName('member_id[]').length;
        console.log('members : ' + members.length + '\n members_num : ' + members_num);

        if (members.length > 0) {
            $('#form1').submit();

        } else {
            swal({
                title: "من فضلك اختر اعضاء للجلسة ",
                type: 'warning',
                confirmButtonText: "تم"
            });

        }

    }

</script>
<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script>


function add_row_sanfe() {

$check_select=$('#wazifa_in_galsa1').val();
if($check_select == 0)
{

    swal({
                        title: 'من فضلك ادخل كل الحقول ',
                        type: 'error',
                        confirmButtonText: 'تم'
                    });
}
else{
  
    var table = document.getElementById('asnafe_table');
        console.log(" lenth :" + table.rows.length);
        var len = table.rows.length;
      //  document.getElementById("wazifa_in_galsa"+len).setAttribute("disabled", "disabled");
        var m=len+1;
///


          //  y.remove(x.selectedIndex);
///

      
       
        //
        var row = ' <tr id="row_1" >\n' +
                                                                                         
            '                        <td>' + (len + 1) + '</td>\n' +
            '                        <td> <input type="text"  data-validation="required" class="form-control testButton " name="code[]" id="code' + (len + 1) + '" value=""  ondblclick=" GetDiv_sanfe(\'myDiv_sanfe\',' + (len + 1) + ',1)" readonly/></td>\n' +
            //'                        <td> <input type="text" class="form-control testButton " name="sanf_coade_br[]" id="sanf_coade_br' + (len + 1) + '" value="" readonly/></td>\n' +
            '                        <td> <input type="text"  data-validation="required" class="form-control testButton " name="emp_n[]" id="emp_n' + (len + 1) + '" value="" readonly/><input type="hidden" name="type[]" id="type' + (len + 1) + '" value=""/> </td>\n' +
            '                        <td> <input type="text"   class="form-control testButton " name="emp_mosama_wazifa_n[]" id="emp_mosama_wazifa_n' + (len + 1) + '" value="" readonly/><input type="hidden" name="emp_mosama_wazifa[]" id="emp_mosama_wazifa' + (len + 1) + '" value=""/></td>\n' +
            '                        <td> <input type="text"   class="form-control testButton " name="emp_edara_n[]" id="emp_edara_n' + (len + 1) + '" value="" readonly /><input type="hidden" name="emp_edara[]" id="emp_edara' + (len + 1) + '" value=""/></td>\n' +
            '                        <td> <input type="text"   class="form-control testButton " name="emp_qsm_n[]"   id="emp_qsm_n' + (len + 1) + '" value="" readonly /><input type="hidden" name="emp_qsm[]" id="emp_qsm' + (len + 1) + '" value=""/></td>\n' +                        
            '                        <td><select  name="wazifa_in_galsa[]" id="wazifa_in_galsa' + (len + 1) + '" data-validation="required" class=" form-control "data-show-subtext="true" data-live-search="true" aria-required="true"><option value="">اختر</option><option value="1" >رئيس الجلسة</option><option value="3"> عضو بالجلسة</option></select></td>\n' +'\n' +
            '                        <td><a id="1" onclick=" $(this).closest(\'tr\').remove(); set_sum();"><i class="fa fa-trash"></i></a></td>\n' +
            '                    </tr>';

        var new_row = table.insertRow(table.rows.length);
        new_row.innerHTML = row;
        new_row.id = 'row_' + (table.rows.length);


    
       

            var wazifa_in_galsa = [];     
           $("select[name='wazifa_in_galsa[]']").each(function(){
            wazifa_in_galsa.push(this.value);
    });
       console.log(" wazifa_in_galsa :"+wazifa_in_galsa);

 var n = wazifa_in_galsa.includes("1");
console.log(n);
       if(wazifa_in_galsa.includes("1"))
       {
        $('#wazifa_in_galsa'+(m)).find('option').remove().end().append('<option  value="3">عضو بالجلسة</option>') ;
       }
      
       if(wazifa_in_galsa.includes("3"))
       {
        $('#wazifa_in_galsa'+(m)).find('option').remove().end().append('<option selected value="1">  رئيس الجلسة</option><option  value="3">عضو بالجلسة</option>') ;
       }
       if(wazifa_in_galsa.includes("1") && wazifa_in_galsa.includes("3") )
       {
        $('#wazifa_in_galsa'+(m)).find('option').remove().end().append('<option selected value="3">عضو بالجلسة</option>') ; 
       }
       

}  
        // 
    }
</script>
<script>
    function GetDiv_sanfe(div,row_id,type) {
      
            $('#myModal_emp').modal('show');
            $("input[name='esnad_to']").val(row_id);
            var to_user_id = [];     
           $("input[name='code[]']").each(function(){
    to_user_id.push(this.value);
    });
           console.log(to_user_id);
           // }

           if(type==1)
           {
            html = '<div class="col-md-12 no-padding"><table id="js_table_members2" class="table table-striped table-bordered dt-responsive nowrap " >' +
                '<thead><tr class="greentd"><th style="width: 50px;">#</th><th style="width: 50px;"> كود الموظف</th><th style="width: 170px;" >اسم الموظف </th><th style="width: 170px;" >المسمي الوظيفي</th><th style="width: 170px;" > الإدارة</th><th style="width: 170px;" > القسم</th>' +
                '</tr></thead><table><div id="dataMember"></div></div>';
            $("#" + div).html(html);
            $('#js_table_members2').show();
            var oTable_usergroup = $('#js_table_members2').DataTable({
                dom: 'Bfrtip',

               // "ajax": '<?php echo base_url(); ?>egtima3at/add_glasa/Add_glasat/getConnection2/' + row_id,
                "ajax": {
                    "url" :'<?php echo base_url(); ?>egtima3at/add_glasa/Add_glasat/getConnection2' ,
                    "type" : "POST",
                    "data" : {
                        "type":type,
                    "row_id":row_id,
                        "to_user_id":to_user_id,
                           },

                } ,
                aoColumns: [
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
        }else if(type==2)
        {
            html = '<div class="col-md-12 no-padding"><table id="js_table_members2" class="table table-striped table-bordered dt-responsive nowrap " >' +
                '<thead><tr class="greentd"><th style="width: 50px;">  م</th><th style="width: 170px;" > رقم الهويه</th><th style="width: 170px;" >اسم العضو </th><th style="width: 170px;" > رقم الجوال</th>' +
                '</tr></thead><table><div id="dataMember"></div></div>';
            $("#" + div).html(html);
            $('#js_table_members2').show();
            var oTable_usergroup = $('#js_table_members2').DataTable({
                dom: 'Bfrtip',

               // "ajax": '<?php echo base_url(); ?>egtima3at/add_glasa/Add_glasat/getConnection2/' + row_id,
                "ajax": {
                    "url" :'<?php echo base_url(); ?>egtima3at/add_glasa/Add_glasat/getConnection2' ,
                    "type" : "POST",
                    "data" : {
                        "type":type,
                    "row_id":row_id,
                        "to_user_id":to_user_id,
                           },

                } ,
                aoColumns: [
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
        }
        
    }

    function Get_sanfe_Name(obj, id,type) {

        if(type==1)
        {
console.log(' obj :' + id + ': ');
var type = obj.dataset.type;
var emp_n = obj.dataset.emp_n;
var code = obj.dataset.code;
var emp_edara = obj.dataset.emp_edara;
var emp_edara_n = obj.dataset.emp_edara_n;
var emp_qsm = obj.dataset.emp_qsm;
var emp_qsm_n = obj.dataset.emp_qsm_n;
var emp_mosama_wazifa = obj.dataset.emp_mosama_wazifa;
var emp_mosama_wazifa_n = obj.dataset.emp_mosama_wazifa_n;

document.getElementById('type' + id).value = type;
document.getElementById('emp_n' + id).value = emp_n;
document.getElementById('code' + id).value = code;
// document.getElementById('sanf_coade_br' + id).value = code_br;
document.getElementById('emp_edara' + id).value = emp_edara;
document.getElementById('emp_edara_n' + id).value = emp_edara_n;
document.getElementById('emp_qsm' + id).value = emp_qsm;
document.getElementById('emp_qsm_n' + id).value = emp_qsm_n;
document.getElementById('emp_mosama_wazifa' + id).value = emp_mosama_wazifa;
document.getElementById('emp_mosama_wazifa_n' + id).value = emp_mosama_wazifa_n;
        }
        else if(type==2)
        {
            var type = obj.dataset.type;
var emp_n = obj.dataset.emp_n;
var code = obj.dataset.code;
document.getElementById('type' + id).value = type;
document.getElementById('emp_n' + id).value = emp_n;
document.getElementById('code' + id).value = code;

        }
$("#myModal_emp .close").click();

}
</script>

<script>
    function save() {
        var all_inputs = $(' [data-validation="required"]');
        var valid = 1;
        var text_valid = "";
        all_inputs.each(function (index, elem) {
            console.log(elem.id + $(elem).val());
            if ($(elem).val().length >= 1) {
                $(elem).css("border-color", "");
            } else {
                valid = 0;
                $(elem).css("border-color", "red");
            }
        });
        var form_data = new FormData();


        var serializedData = $('.galsa_form').serializeArray();
        $.each(serializedData, function (key, item) {
            form_data.append(item.name, item.value);
        });
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>egtima3at/add_glasa/Add_glasat/add_galsa',
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function (xhr) {
                if (valid == 0) {
                    swal({
                        title: 'من فضلك ادخل كل الحقول ',
                        text: text_valid,
                        type: 'error',
                        confirmButtonText: 'تم'
                    });
                    xhr.abort();
                } else if (valid == 1) {
                    swal({
                        title: "جاري الحفظ... ",
                        text: "",
                        imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                        showConfirmButton: false,
                        allowOutsideClick: false
                    });
                }
            },
            success: function (html) {
                swal({
                    title: 'تم اضافة  ',
                    type: 'success',
                    confirmButtonText: 'تم'
                });
                var all_inputs_set = $('.galsa_form .form-control');
                all_inputs_set.each(function (index, elem) {
                    console.log(elem.id + $(elem).val());
                    $(elem).val('');
                   // get_details();
                   // get_add();
                });
                get_details();
                 get_add();
                if (html == 1) {

                    //get_data('manzel');
                    // show_tab('manzel');
                }
            }
        });
    }
</script>


<script>

    function update(id) {

        var all_inputs = $(' [data-validation="required"]');
        var valid = 1;
        var text_valid = "";
        all_inputs.each(function (index, elem) {
            console.log(elem.id + $(elem).val());
            if ($(elem).val().length >= 1) {
                $(elem).css("border-color", "");
            } else {
                valid = 0;
                $(elem).css("border-color", "red");
            }
        });
        var form_data = new FormData();

        var serializedData = $('.galsa_form').serializeArray();
        $.each(serializedData, function (key, item) {
            form_data.append(item.name, item.value);
        });
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>egtima3at/add_glasa/Add_glasat/edite',
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function (xhr) {
                if (valid == 0) {
                    swal({
                        title: 'من فضلك ادخل كل الحقول ',
                        text: text_valid,
                        type: 'error',
                        confirmButtonText: 'تم'
                    });
                    xhr.abort();
                } else if (valid == 1) {
                    swal({
                        title: "جاري الحفظ... ",
                        text: "",
                        imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                        showConfirmButton: false,
                        allowOutsideClick: false
                    });
                }
            },
            success: function (html) {
                swal({
                    title: 'تم تعديل  ',
                    type: 'success',
                    confirmButtonText: 'تم'
                });
                var all_inputs_set = $('.galsa_form .form-control');
                all_inputs_set.each(function (index, elem) {
                    console.log(elem.id + $(elem).val());
                    $(elem).val('');

                    //get_details();
                   // get_add();
                });
                get_details();
                get_add();
                if (html == 1) {

                    //get_data('manzel');
                    // show_tab('manzel');
                }
            }
        });
    }
</script>


<script>
    function get_details() {
        $('#show_details').show();
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>egtima3at/add_glasa/Add_glasat/load_details",
            beforeSend: function () {
                $('#show_details').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#show_details').html(d);

            }

        });
    }
</script>
<script>
    function get_add() {
        // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>egtima3at/add_glasa/Add_glasat/get_add",


            success: function (d) {
                $('#show_edite').html(d);

            }

        });
    }
</script>


<script>
    function update_galsa(id) {
        // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            data: {id: id},
            url: "<?php echo base_url();?>egtima3at/add_glasa/Add_glasat/update_galsa",

            beforeSend: function () {
                $('#show_edite').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#show_edite').html(d);
                $('#show_details').hide();

            }

        });
    }
</script>

<script>


    function delete_galsa(id) {
        swal({
                title: "هل انت متاكد من الحذف?",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "نعم!",
                cancelButtonText: "لا!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        type: 'post',
                        url: '<?php echo base_url() ?>egtima3at/add_glasa/Add_glasat/delete_galsa',
                        data: {id: id},
                        dataType: 'html',
                        cache: false,
                        beforeSend: function () {
                            swal({
                                title: "جاري الحذف ... ",
                                text: "",
                                imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                                showConfirmButton: false,
                                allowOutsideClick: false
                            });
                        },
                        success: function (html) {
                            //   alert(html);

                            // $('#Modal_esdar').modal('hide');

                            swal({
                                    title: "تم الحذف!",


                                }
                            );
                            get_details();
                            get_add();
                        }
                    });
                } else {
                    swal("تم الالغاء", "", "error");
                }
            });


    }
</script>
<script>
 function get_memebers(id){
    $('#myModal').modal('show');
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>egtima3at/add_glasa/Add_glasat/load_mem_details",
            data:{id:id},
            beforeSend: function () {
                $('#show').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#show').html(d);

            }

        });
 }
 

</script>
<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/analogue-time-picker.js"></script>
<script>
    timePickerInput({
        inputElement: document.getElementById("m13h"),
        mode: 12,
        // time: new Date()
    });
</script>
<script>
function check_day()
{
    var value=$('#galsa_date').val();
  

    var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyy = today.getFullYear();

today = yyyy +'-'+ mm + '-' + dd ;

    
    console.log(value);
    console.log(today);
    if(value>today || value==today)
    {
var days =["اﻷحد","اﻷثنين","الثلاثاء","اﻷربعاء","الخميس","الجمعة","السبت"];
var date = new Date();
var d = new Date(value);
console.log(d);
console.log("The current day is " + days[d.getDay()]);
  
       $('#galsa_day').val(days[d.getDay()]);                 
                        

    }
    else{
        $('#galsa_date').val('');
        $('#galsa_day').val('');    
        swal("لا يمكن ان يكون التاريخ  قبل تاريخ اليوم", "", "error");

    }

}

function check_time()
{
    var value=$('#m13h').val();
  

    var today = new Date();
var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();

    
    console.log(value);
    console.log(time);
    if(value>time || value==time)
    {
              
                        

    }
    else{
        $('#m13h').val('');
        
        swal("لا يمكن ان يكون الوقت  قبل الوقت الحالي", "", "error");

    }

}
</script>
<!-- غشقش\ -->
<script>
function load_tahwel() {
    $('#tawel_result').show();
    var type = $('input[name=esnad_to]:checked').val();
  //  alert(type);
    $('#tahwel_type').val(type);
    $.ajax({
        type: 'post',
        url: '<?php echo base_url()?>all_secretary/archive/wared/Add_wared/load_tahwel' ,
        data: {type:type},
        dataType: 'html',
        cache: false,
        success: function (html) {
            $("#tawel_result").html(html);
        }
    });
}
</script>