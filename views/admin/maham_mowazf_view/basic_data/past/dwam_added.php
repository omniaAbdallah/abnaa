<style type="text/css">
    .inner-heading-green{
        background-color: #09704e;
        padding: 10px;
        color: #fff;
    }
    label {
        color: #002542 !important;
        font-size: 16px !important;
    }
    /* .top-label {
        font-size: 14px;
        font-weight: 500;
        position: relative;
    } */
    .top-label {
        font-size: 13px;
    }
    .i-check {
        margin: 5px 8px;
        width: auto;
    }
    .skin-square {
        text-align: center;
        display: flex;
    }
</style>
<?php
$disabled='';
$head='';
?>
<?php if(isset($all_links['printer_machin']) && $all_links['printer_machin']!=null){
    foreach($all_links['printer_machin'] as  $key=>$value){
        $result[$key]=$all_links['printer_machin'][$key];
    }
}else{
    foreach($all_field as $keys=>$value){
        $result[$all_field[$keys]]='';
    }
}
$work_days=array("1"=>"السبت","2"=>"الأحد","3"=>"الأثنين","4"=>"الثلاثاء","5"=>"الأربعاء","6"=>"الخميس","7"=>"الجمعة");
?>
<div class="col-sm-12  col-xs-12 no-padding" >
    <div class="panel  panel-default ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title?> </h3>
            <!-- <div class="pull-left">
                <?php $data_load["id"]=$this->uri->segment(4) ;
                $data_load["emp_code"]= $personal_data[0]->emp_code;
                $this->load->view('admin/Human_resources/drop_down_menu', $data_load);?>
            </div> -->
        </div>
        <div class="panel-body">
            <?=$head?>
            <?php echo form_open_multipart('maham_mowazf/basic_data/Maham/add_dwam',array("class"=>"dwam_details_form"));?>
            <div class="col-sm-12 col-xs-12 no-padding">
                <div class="form-group col-sm-2 col-xs-12 padding-4">
                    <label class="label">كود الموظف</label>
                    <input type="text" name="emp_code"  readonly=""  value="<?php if($employee_data != null){ echo $employee_data['emp_code'];  }else{}?>" class="form-control"  />
                    <input type="hidden" name="emp_id" value="<?php if($employee_data != null){ echo $employee_data['id'];  }else{}?>" class="form-control"  />
                </div>
                <div class="form-group col-sm-3 col-xs-12 padding-4">
                    <label class="label">إسم الموظف</label>
                    <input type="text" name="emp_name"  readonly=""  value="<?php if($employee_data != null){ echo $employee_data['employee'];  }else{}?>" class="form-control"  />
                </div>
                <div class="form-group col-sm-2 col-xs-12 padding-4">
                    <label class="label">إسم جهاز البصمة</label>
                    <select  disabled name="device_id_fk" <?=$disabled?> class="form-control" data-show-subtext="true" data-live-search="true"  data-validation="required"  aria-required="true"   >
                        <option value="">إختر جهاز البصمة </option>
                        <?php
                        foreach($printer_machine as $machine){
                            $selected = '';
                            if ($machine->id_setting == $result['device_id_fk']) {
                                $selected = 'selected';
                            } ?>
                            <option value="<?=$machine->id_setting?>"<?=$selected?>><?=$machine->title_setting?></option>
                        <?php }
                        ?>
                    </select>
                </div>
                <div class="form-group col-sm-3 col-xs-12 padding-4">
                    <label class="label">رقم الموظف بجهاز البصمة </label>
                    <input type="number" readonly name="num_in_device" id="num_in_device"   value="<?php  if($result['num_in_device'] != 0){ echo $result['num_in_device'];}?>" class="form-control" data-validation="required"  />
                </div>
                <!-- <div class="form-group col-sm-2 col-xs-12 padding-4">
                   
                    <button type="button" id="buttons" name="add" value="حفظ"
                            onclick="AddDwamDetails(<?=$this->uri->segment(4)?>);"
                            
                            class="btn btn-labeled btn-success " style="margin-top: 26px;">
                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span> حفظ
                    </button>
                </div> -->
            </div>
            <?php  echo form_close();?>
            <!----------------------------------------------------------------------->
            <!-- <div class="col-sm-12 no-padding">
                <h6 class="text-center inner-heading-green">بيانات الدوام </h6>
            </div>
            <div class="col-sm-12 col-xs-12 no-padding">
                <div class="form-group col-sm-3 col-xs-12">
                    <input type="hidden" id="period_id_fk" value="<?=$last_period_id_fk?>" />
                    <input type="hidden" id="emp_id" value="<?=$this->uri->segment(4);?>" />
                    <input type="hidden" id="emp_code" value="<?php if($employee_data != null){ echo $employee_data['emp_code'];  }else{}?>" />
                    <label class="label">فترات الدوام </label>
                    <select name="always_id_fk" id="always_id_fk"  class=" form-control" data-show-subtext="true" data-live-search="true"
                            data-validation="required"  aria-required="true"   >
                        <option value="">إختر فترات الدوام </option>
                        <?php
                        foreach($always_setting_data as $always){
                            $selected2 = '';
                            if ($always->id == $result['always_id_fk']) {
                                $selected2 = 'selected';
                            } ?>
                            <option value="<?=$always->id?>"<?=$selected2?>><?=$always->name?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-sm-7 col-xs-12">
                    <label class="label">أيام العمل </label>
                    <div class="skin-square">
                        <?php $arr_time =array(1=>'الفترة الأولي',2=>'الفترة الثانية',3=>'الفترة الثالثة',4=>'الفترة الرابعة',5=>'الفترة الخامسة')?>
                        <?php
                        $days_en =array("saturday","sunday","monday","tuesday","wednesday","thursday","friday");
                        $days_ar =array("السبت","الأحد","الإثنين","الثلاثاء","الأربعاء","الخميس","الجمعة");
                        for ($a=0;$a<sizeof($days_ar);$a++){ ?>
                            <div class="i-check">
                                <input tabindex="9" type="checkbox" id="<?php echo $days_en[$a];?>"  name="<?php echo $days_en[$a];?>"
                                       class="day checkbox_esal"  value="<?=$days_en[$a]?>">
                                <label for="<?php echo $days_en[$a];?>"><?php echo $days_ar[$a];?></label>
                            </div>
                        <?php }  ?>
                    </div>
                </div>
                <div class="form-group col-sm-2 col-xs-12">
                    <button type="button" value="عرض " id="buttons" onclick="add_row()" class="btn btn-success btn-labeled" style="margin-top: 26px;"><span class="btn-label"><i class="fa fa-plus"></i></span> عرض</button>
                </div>
            </div> -->
            <div class="col-md-12 text-center no-padding" >
                <table class="table table-striped table-bordered" width="100%" id="">
                    <thead>
                    <tr class="greentd">
                        <!-- <th  colspan="6" class="text-center">أيام العمل </th> -->
                        <!--  <td>وقت الحضور </td>
                          <th>وقت الإنصراف</th>
                          <th>بدايه تسجيل الدخول</th>
                          <th>نهايه تسجيل الدخول</th>
                          <th> بدايه تسجيل الخروج</th>
                          <th>نهايه تسجيل الخروج</th>
                          <th> من تاريخ</th>
                          <th>الى تاريخ</th>
                          <th>الإجراء</th> -->
                    </thead>
                    <tbody id="resultTable" >
                    <!-- <tr id="frist_row">
                         <td colspan="2" style="text-align: center;color: red"> لاتوجد بيانات</td>
                     </tr>-->
                    </tbody>
                </table>
            </div>
            <!--
            <div class="col-sm-12">
                <h6 class="text-center inner-heading">أيام العمل</h6>
            </div>
            <div class="col-sm-12 col-xs-12">
           </div>
     -->
            <br/>
            <br/>
        </div>
    </div>
    <!----------------------------------------------------------------------------------------------------------------->
    <div class="panel panel-default ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo "مواعيد العمل"?> </h3>
        </div>
        <div class="panel-body">
            <div id="dwam_table"> </div>
            <!------------------------------------------------------------------------------------->
            <div class="modal" id="modal-update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
            <div class="modal-dialog" role="document" style="width: 100%">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">التعديل</h4>
                    </div>
                    <div class="modal-body" id="myUpdateForm"></div>
                    <div class="modal-footer" style="display: inline-block;width: 100%">
                        <button type="button" style="float: left" class="btn btn-danger" data-dismiss="modal">إغلاق الشاشة</button>
                    </div>
                </div>
            </div>
        </div>
        <!------------------------------------------------------------------------------------->
        </div>
    </div>
    <!----------------------------------------------------------------------------------------------------------------->
</div>
<script>
    $('#examplee').DataTable( {
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
        colReorder: true,
        "bDestroy": true
    } );
</script>
<!--
<?php // $data_load["personal_data"]=$personal_data; $this->load->view('admin/Human_resources/sidebar_person_data',$data_load);?>
-->
<script type="text/javascript" src="<?php echo base_url() ?>/asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/plugins/icheck/icheck.min.js" type="text/javascript"></script>
<script>
    $('.skin-minimal .i-check input').iCheck({
        checkboxClass: 'icheckbox_minimal',
        radioClass: 'iradio_minimal',
        increaseArea: '20%'
    });
    $('.skin-square .i-check input').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green'
    });
    $('.skin-flat .i-check input').iCheck({
        checkboxClass: 'icheckbox_flat-red',
        radioClass: 'iradio_flat-red'
    });
    $('.skin-line .i-check input').each(function () {
        var self = $(this),
            label = self.next(),
            label_text = label.text();
        label.remove();
        self.iCheck({
            checkboxClass: 'icheckbox_line-blue',
            radioClass: 'iradio_line-blue',
            insert: '<div class="icheck_line-icon"></div>' + label_text
        });
    });
</script>
<script>
    function AddDwamDetails(emp_id) {
        var all_inputs = $('.dwam_details_form [data-validation="required"]');
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
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>human_resources/Dwam_settings/add_dwam/'+emp_id,
            data: $('.dwam_details_form').serialize()+'&add=1',
            dataType: 'text',
            cache: false,
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
                        title: "جاري الحفظ ... ",
                        text: "",
                        imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                        showConfirmButton: false,
                        allowOutsideClick: false
                    });
                }
            },
            success: function (html) {
                swal({
                    title: 'تم الحفظ  ',
                    type: 'success',
                    confirmButtonText: 'تم'
                });
            }
        });
    }
</script>
<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script>
    $(document).ready(function () {
        load_dwam_table(<?=$_SESSION['emp_code']?>);
    });
</script>
<script>
    function load_dwam_table(emp_id) {
        $.ajax({
            type: 'post',
            url: '<?php echo base_url()?>maham_mowazf/basic_data/Maham/dwam_table/'+emp_id,
            data: {},
            dataType: 'html',
            cache: false,
            beforeSend: function () {
                $('#dwam_table').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (html) {
                $("#dwam_table").html(html);
            }
        });
    }
</script>
<script>
    function add_row(){
        var period_id_fk =  $("#period_id_fk").val();
        var always_id_fk =  $("#always_id_fk").val();
        var x = document.getElementById('resultTable');
        var len = x.rows.length;
        if(always_id_fk != ""){
            var dataString   =  "period_id_fk=" + period_id_fk +"&len="+len +"&always_id_fk="+always_id_fk;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>human_resources/Dwam_settings/get_machin_employee_row',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#frist_row").remove();
                    $("#resultTable").append(html);
                    //$("#period_id_fk option[value='"+option_value+"']").remove();
                    //$('.selectpicker').selectpicker("refresh");
                }
            });
        }else {
            //  alert('إختر نوع الدوام  ');
            swal({
                type: 'error',
                title:"اختر نوع الدوام  !!" ,
                confirmButtonText: "تم"
            });
        }
    }
    //-----------------------------------------------
    function SendForm(len){
        var days=[];
        $(".day:checkbox:checked").each(function () {
            days.push($(this).val());
        });
        var emp_id= $("#emp_id").val();
        var emp_code= $("#emp_code").val();
        var form_validate= 0;
        var cbs = document.getElementsByClassName(".class-row-"+len);
        for (var i = 0; i < cbs.length; i++) {
            if(cbs[i].value == ""){
                form_validate =1;
                break;
            }
        }
        if(days !='' && emp_id!="" && form_validate == 0){
            var dataString = $(".class-row-"+len).serialize() +'&days='+ days +"&emp_id="+emp_id+"&emp_code="+emp_code;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>human_resources/Dwam_settings/AddEmpDwam',
                data:dataString,
                cache:false,
                success: function(json_data){
                    //  alert('تمت الإضافة بنجاح');
                    swal({
                        type: 'success',
                        title:"تمت الاضافه بنجاح" ,
                        confirmButtonText: "تم"
                    });
                    $(".day").prop("checked", false);
                    //$(".day").attr('checked', false);
                    $("#always_id_fk").val("");
                    $("#resultTable").html("");
                    load_dwam_table(emp_id);
                    //location.reload();
                }
            });
        }else {
            //  alert('تأكد من إدخال البيانات !!');
            swal({
                type: 'error',
                title:"تأكد من إدخال البيانات !!" ,
                confirmButtonText: "تم"
            });
        }
    }
</script>
<script>
    function getUpdateForm(update_id) {
        if( update_id !='' ){
            var dataString = 'update_id=' + update_id ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>human_resources/Dwam_settings/UpdateEmpDwam',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#myUpdateForm").html(html);
                }
            });
        }
    }
    //-----------------------------------------------
    function UpdateForm(class_name,emp_id){
        var days=[];
        $(".day-update:checkbox:checked").each(function () {
            days.push($(this).val());
        });
        var update_id= $("#update_id").val();
        var form_validate= 0;
        var cbs = document.getElementsByClassName(class_name);
        for (var i = 0; i < cbs.length; i++) {
            if(cbs[i].value == ""){
                form_validate =1;
                break;
            }
        }
        if(days !='' && update_id!="" && form_validate == 0){
            var dataString = $("."+class_name).serialize() +'&days_update='+ days +"&id_update="+update_id;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>human_resources/Dwam_settings/UpdateEmpDwam',
                data:dataString,
                cache:false,
                success: function(json_data){
                    // alert('تم التعديل بنجاح');
                    swal({
                        type: 'success',
                        title:"   تم التعديل بنجاح !!" ,
                        confirmButtonText: "تم"
                    });
                    $('#modal-update').modal('hide');
                    load_dwam_table(emp_id);
                    //$(".day").prop("checked", false);
                    //location.reload();
                }
            });
        }else {
            //    alert('تأكد من إدخال البيانات !!');
            swal({
                type: 'error',
                title:"تأكد من إدخال البيانات !!" ,
                confirmButtonText: "تم"
            });
        }
    }
</script>
<script>
    /*
    function load_price(){
       var salary = $('#emp_salary').val();
       var num_days_in_month = $('#num_days_in_month').val();
       var hours_work = $('#hours_work').val();
       if(salary !='' && num_days_in_month !='' && hours_work!=''){
        var hour_value = ((parseFloat(salary)/parseFloat(num_days_in_month))/parseFloat(hours_work));
       var hour_value_f = parseFloat(hour_value).toFixed(2);
        $('#hour_value').val(hour_value_f);
       }
    } */
</script>
<script>
    /*
    function get_all(valu){
            if(valu == 1){
                $("#bank_id_fk").attr('disabled', 'disabled');
                 $("#bank_id_fk option:selected").each(function () {
                               $(this).removeAttr('selected');
                               });
                 $("#bank_id_fk").selectpicker('refresh');
                $("#bank_account_num").prop("readonly", true);
                $("#bank_id_fk").removeAttr('data-validation');
                $("#bank_account_num").removeAttr('data-validation');
                $("#bank_account_num").val('');
                $("#bank_code").val('');
            }else{
                $("#bank_id_fk").attr({'data-validation':"required"});
                $("#bank_account_num").attr({'data-validation':"required"});
                $("#bank_id_fk").removeAttr('disabled');
                $("#bank_id_fk").selectpicker('refresh');
                $("#bank_account_num").prop("readonly", false);
            }
    }*/
</script>
<script>
    /*
    function get_all_ticket(valu){
        if(valu == 2){
             $("#travel_type_fk").attr('disabled', 'disabled');
             $("#travel_type_fk option:selected").each(function () {
                           $(this).removeAttr('selected');
                           });
            $("#travel_type_fk").selectpicker('refresh');
            $("#travel_period").prop("readonly", true);
            $("#travel_period").removeAttr('data-validation');
            $("#travel_type_fk").removeAttr('data-validation');
            $("#travel_type_fk").val('');
            $("#travel_period").val('');
        }else{
            $("#travel_period").attr({'data-validation':"required"});
            $("#travel_type_fk").attr({'data-validation':"required"});
            $("#travel_type_fk").removeAttr('disabled');
            $("#travel_type_fk").selectpicker('refresh');
            $("#travel_period").prop("readonly", false);
        }
    } */
</script>
<script> /*
    function get_banck_code(valu)
    {
        var valu=valu.split("-");
        $('#bank_code').val(valu[1]);
    } */
</script>
<script>
    /*
      function length_hesab_wakeel(length) {
            var len=length.length;
            if(len<24){
                alert(" رقم الحساب  لابد الايقل عن 24 حرف او رقم");
            }
            if(len>24){
                alert(" رقم الحساب لابد ألا يزيد عن 24 حرف او رقم");
                //  document.getElementById('register').setAttribute("disabled", "disabled");
            }
            if(len==24){
                document.getElementById('register').removeAttribute("disabled", "disabled");
            }
        } */
</script>