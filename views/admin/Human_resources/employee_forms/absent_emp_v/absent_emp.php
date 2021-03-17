<div class="col-sm-12 no-padding">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
        <div class="panel-heading">
            <h3 class="panel-title"><?= $title ?></h3>
        </div>
        <div class="panel-body">
            <?php

            if(isset($result)&&!empty($result))
            {
                echo form_open_multipart('human_resources/employee_forms/absent_emp/Absent_emp_c/update/'.$result->id, array('id' => 'myform'));
                $egra_date = $result->egra_date_ar;
                $emp_name =$result->emp_name;
                $num_days=$result->num_days;
               
                $emp_id_fk = $result->emp_id;
                $emp_code_fk = $result->emp_code;
                $edara_id_fk = $result->edara_id_fk;
                $edara_n = $result->edara_n;
                $qsm_id_fk = $result->qsm_id_fk;
                $qsm_n = $result->qsm_n;
                $mosma_wazefy_n=$result->mosma_wazefy_n;
                $mosma_wazefy_id=$result->mosma_wazefy_id;
                $details = $result->details;
                $absent_value=$result->absent_value;
                $start_absent_date=$result->start_absent_date;
                $end_absent_date=$result->end_absent_date;
                $remove_absent_value=$result->remove_absent_value;
            }else{

            
            //echo form_open_multipart('human_resources/employee_forms/absent_emp/Absent_emp_c/insert', array('id' => 'myform'));
           
            echo form_open_multipart('human_resources/employee_forms/absent_emp/Absent_emp_c/insert', array('id' => 'myform'));

         $num_days = 1;
            $start_absent_date = date('Y-m-d');
            $end_absent_date = date('Y-m-d');

            $egra_date = date('Y-m-d');
            $emp_name = '';
          //  $num_days='';
         
            $emp_id_fk = '';
            $emp_code_fk = '';
            $edara_id_fk = '';
            $edara_n = '';
            $qsm_id_fk = '';
            $qsm_n = '';
            $mosma_wazefy_n='';
            $mosma_wazefy_id='';
            $details = "";
            $absent_value='';
           // $start_absent_date='';
           // $end_absent_date='';
            $remove_absent_value='';
         
            }
            ?>
            <div class="col-sm-12 form-group">
            <div class="col-sm-6  col-md-2 padding-4 ">
                    <label class="label  ">تاريخ الاجراء </label>
                    <input type="date" value="<?= $egra_date;?>" name="egra_date" id="egra_date"
                    data-validation="required"
                           class="form-control ">
                </div>
                
                <div class="form-group col-md-4 col-sm-6 col-xs-6 padding-4">
                            <label class="label ">اسم الموظف</label>
                            <input name="emp_name" id="emp_name" class="form-control" style="width:89%; float: right;"
                                   readonly
                              
                                   data-validation="required"
                                   value="<?php if (!empty($emp_data->employee)) {
                                       echo $emp_data->employee;
                                   } else {
                                       echo $emp_name;
                                   } ?>">
                                   <input type="hidden" id="emp_id_fk" name="emp_id_fk"
value="<?php if (!empty($emp_data->id)) {
    echo $emp_data->id;
} else {
    echo $emp_id_fk;
} ?> ">
<input type="hidden" id="edara_id_fk" name="edara_id_fk"
value="<?php if (!empty($emp_data->edara_id)) {
    echo $emp_data->edara_id;
} else {
    echo $edara_id_fk;
} ?>  ">

<input type="hidden" id="qsm_id_fk" name="qsm_id_fk"
value="<?php if (!empty($emp_data->qsm_id)) {
    echo $emp_data->qsm_id;
} else {
    echo $qsm_id_fk;
} ?>  ">
<input type="hidden" id="mosma_wazefy_id" name="mosma_wazefy_id"
value="<?php if (!empty($emp_data->mosma_wazefy_id)) {
    echo $emp_data->mosma_wazefy_id;
}else{
    echo $mosma_wazefy_id;
}  ?>  ">
                            <button type="button" data-toggle="modal" data-target="#myModal_emps"
                                    class="btn btn-success btn-next" style="float: left;"
                                    onclick="GetDiv_emps('myDiv_emp')" <?php if (!empty($emp_data->employee)) {
                                echo 'disabled';
                            } ?>>
                                <i class="fa fa-plus"></i></button>
                        </div>
                        <div class="form-group col-md-2 col-sm-6 col-xs-6 padding-4">
                            <label class="label ">  كود الموظف</label>
                            <input name="emp_code_fk" id="emp_code" class="form-control"
                            data-validation="required"
                                   value="<?php if (!empty($emp_data->emp_code)) {
                                       echo $emp_data->emp_code;
                                   } else {
                                       echo $emp_code_fk;
                                   } ?>" readonly>
                        </div>
                        <div class="form-group col-md-2 col-sm-6 col-xs-6 padding-4">
                            <label class="label "> المسمى الوظيفي</label>
                            <input name="mosma_wazefy_n" id="job_title" class="form-control"
                                   value="<?php if (!empty($emp_data->mosma_wazefy_n)) {
                                       echo $emp_data->mosma_wazefy_n;
                                   }else{
                                       echo $mosma_wazefy_n;
                                   } ?>" readonly>
                        </div>
                        <div class="form-group col-md-2 col-sm-6 col-xs-6 padding-4">
                            <label class="label "> الأدارة </label>
                            <input name="edara_n" id="edara_n" class="form-control"
                                   value="<?php if (!empty($emp_data->edara_n)) {
                                       echo $emp_data->edara_n;
                                   } else {
                                       echo $edara_n;
                                   } ?>" readonly>
                        </div>
                        <div class="form-group col-md-2 col-sm-6 col-xs-6 padding-4">
<label class="label "> القسم</label>
<input name="qsm_n" id="qsm_n" class="form-control"
       value="<?php if (!empty($emp_data->qsm_n)) {
           echo $emp_data->qsm_n;
       } else {
           echo $qsm_n;
       } ?>" readonly>
</div>


<div class="col-sm-2  col-md-2 padding-4 ">
                    <label class="label  ">  تاريخ ابتداء الغياب </label>
                    <input type="date" value="<?= $start_absent_date;?>" name="start_absent_date" id="start_absent_date"
                    data-validation="required"
                    onchange="get_num_days();get_value();"
                           class="form-control ">
                </div>
                <div class="col-sm-2  col-md-2 padding-4 ">
                    <label class="label  ">تاريخ انتهاء الغياب </label>
                    <input type="date" value="<?= $end_absent_date;?>" name="end_absent_date" id="end_absent_date"
                    data-validation="required"
                    onchange="get_num_days();get_value();"
                           class="form-control ">
                </div>


<div class="col-sm-2  col-md-1 padding-4 ">
                    <label class="label  "> عدد الايام </label>
                    <input type="number" value="<?= $num_days;?>"
                    readonly
                     name="num_days" id="num"
                    
                    
                    data-validation="required"
                           class="form-control ">
                           <div id="load_pop_detailes">
                           </div>
                </div>


<div class="col-sm-2  col-md-1 padding-4 ">
                    <label class="label  ">قيمة الخصم </label>
                    <input type="number" value="<?= $absent_value;?>" name="absent_value" id="new_value"
                readonly
                    data-validation="required"
                           class="form-control ">
                </div>
                <div class="form-group col-sm-1 col-xs-12">
                                        <label class="label ">  رفع الخصم</label>
                                        <input  name="remove_absent_value" type="checkbox" money="0"
                                        class="form-control"
                                                       

                                                       value="1"<?php if (!empty($remove_absent_value) && $remove_absent_value == 1) {

                                                    echo 'checked';

                                                } ?>>
                                       
                                    </div>
                <div class="col-sm-4  col-md-3 padding-4 ">
                    <label class="label  ">سبب التغيب </label>
                    <input type="text" value="<?= $details;?>" name="details" id="details"
                           class="form-control ">
                </div>
            </div>
            
            <div class="col-sm-12 form-group">
              
            </div>
            <br>
                            <div class="col-sm-12 form-group 4 text-center">
                                <button type="submit" 
                                        class="btn btn-labeled btn-success " name="save" value="save">
                                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                </button>
                            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>
<div id="result">
<?php if (isset($records) && $records != null) { ?>
    <div class="col-sm-12 no-padding">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">
                <h3 class="panel-title"> <?= $title ?></h3>
            </div>
            <div class="panel-body">
                <table id="" class="example table table-bordered table-striped" role="table">
                    <thead>
                    <tr class="greentd">
                        <th>م</th>
                        <th class="text-center"> عدد الايام</th>
                        <th class="text-center">قيمة الاجراء </th>
                        <th class="text-center">كود الموظف</th>
                        <th class="text-center">اسم الموظف</th>
                        <th class="text-center"> الأدارة</th>
                        <th class="text-center">القسم</th>
                        <th class="text-center">المسمى الوظيفي</th>
                     
                        <th class="text-center">الإجراء</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $x = 1;
                    foreach ($records as $value) {
                        ?>
                        <tr>
                            <td><?= $x++ ?></td>
                            <td>
                            <?php 
                            if(isset($value->num_days)&&!empty($value->num_days)) 
                            echo $value->num_days ;
                            else echo 'غير محدد';
                            ?>
                            </td>
                            
                            <td>
                            <?php 
                            if(isset($value->absent_value)&&!empty($value->absent_value)) 
                            echo $value->absent_value ;
                            else echo 'غير محدد';
                            ?>
                             </td>
                            <td><?= $value->emp_code ?></td>
                            <td><?= $value->emp_name ?></td>
                            <td><?php 
                            if(isset($value->edara_n)&&!empty($value->edara_n)) 
                            echo $value->edara_n ;
                            else echo 'غير محدد';
                            ?></td>
                            <td>
                            <?php 
                            if(isset($value->qsm_n)&&!empty($value->qsm_n)) 
                            echo $value->qsm_n ;
                            else echo 'غير محدد';
                            ?>
                            </td>
                            <td>
                            <?php 
                            if(isset($value->mosma_wazefy_n)&&!empty($value->mosma_wazefy_n)) 
                            echo $value->mosma_wazefy_n ;
                            else echo 'غير محدد';
                            ?>
                            </td>
                           
                             <td>  
                                    <!-- <a onclick="Delete_namozeg(<?= $value->id ?>)" title="حذف"><i
                                                class="fa fa-trash"></i></a> -->
                                                <a onclick=' swal({
        title: "هل انت متأكد من الحذف ؟",
        text: "",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "حذف",
        cancelButtonText: "إلغاء",
        closeOnConfirm: false
        },
        function(){
        swal("تم الحذف!", "", "success");
        setTimeout(function(){window.location="<?= base_url() . 'human_resources/employee_forms/absent_emp/Absent_emp_c/Delete_namozeg/' . $value->id ?>";}, 500);
        });'>
    <i class="fa fa-trash"> </i></a> 
    <a onclick=' swal({
        title: "هل انت متأكد من التعديل ؟",
        text: "",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-warning",
        confirmButtonText: "تعديل",
        cancelButtonText: "إلغاء",
        closeOnConfirm: false
        },
        function(){
      
        window.location="<?= base_url() . 'human_resources/employee_forms/absent_emp/Absent_emp_c/update_gezaa/' . $value->id ?>";
        });'>
    <i class="fa fa-pencil-square-o"> </i></a> 
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php } ?>
</div>
<div class="modal fade" id="myModal_emps" tabindex="-1" role="dialog"
aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document" style="width: 90%">
   <div class="modal-content">
       <div class="modal-header">
           <button type="button" class="close" onclick="$('#myModal_emps').modal('hide')"
                   aria-label="Close"><span
                       aria-hidden="true">&times;</span></button>
           <h4 class="modal-title" id="myModalLabel"></h4>
       </div>
       <div class="modal-body">
           <div id="myDiv_emp"></div>
       </div>
       <div class="modal-footer" style="display: inline-block;width: 100%">
           <button type="button" class="btn btn-danger"
                   style="float: left;" onclick="$('#myModal_emps').modal('hide')">إغلاق
           </button>
       </div>
   </div>
</div>
</div>

<script>

    document.addEventListener('DOMContentLoaded', function () {
        <?php if (!empty($emp_data->employee)) { ?>
        var emp_id= document.getElementById('emp_id_fk');
        get_pop_detailes(emp_id);
        <?php } ?>
    });
</script>
<script>
            function GetDiv_emps(div) {
                html = '<div class="col-md-12 no-padding"><table id="js_table_members2" class="table table-striped table-bordered dt-responsive nowrap " >' +
                    '<thead><tr class="info"><th style="width: 50px;">#</th><th style="width: 50px;"> كود الموظف  </th><th style="width: 50px;"> أسم الموظف  </th>' +
                    '<th style="width: 170px;" >الأدارة   </th>' +
                    '<th style="width: 170px;" >القسم</th>' +
                    '</tr></thead><table><div id="dataMember"></div></div>';
                $("#" + div).html(html);
                $('#js_table_members2').show();
                var oTable_usergroup = $('#js_table_members2').DataTable({
                    dom: 'Bfrtip',
                    "ajax": '<?php echo base_url(); ?>human_resources/employee_forms/absent_emp/Absent_emp_c/getConnection_emp/',
                    aoColumns: [
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
                    destroy: true,
                    "order": [[1, "asc"]]
                });
            }
            //8-6-om
            function Get_emp_Name(obj) {
                console.log(' obj :' + obj.dataset.name + ': ');
                var name = obj.dataset.name;
                var emp_code = obj.dataset.emp_code;
                var edara_id = obj.dataset.edara_id;
                var edara_n = obj.dataset.edara_n;
                var job_title = obj.dataset.job_title;
                var job_id = obj.dataset.job_id;
                var qsm_id = obj.dataset.qsm_id;
                var qsm_n = obj.dataset.qsm_n;
                var start_work_date = obj.dataset.start_work_date;
                var card_num = obj.dataset.card_num;
                document.getElementById('emp_name').value = name;
                document.getElementById('emp_id_fk').value = obj.value;
                document.getElementById('emp_code').value = emp_code;
                //6-7-om
                $('#emp_id_fk').val(obj.value);
                //    check_vacation(obj.value);
                document.getElementById('edara_n').value = edara_n;
                document.getElementById('edara_id_fk').value = edara_id;
                document.getElementById('job_title').value = job_title;
                document.getElementById('mosma_wazefy_id').value = job_id;
                document.getElementById('qsm_n').value = qsm_n;
                document.getElementById('qsm_id_fk').value = qsm_id;
                // $("#myModal_emps")modal.('hide');
                $("#myModal_emps .close").click();
            }
        </script>
<script src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/plugins/bootstrap-toggle/bootstrap-toggle.min.js"
        type="text/javascript"></script>
<script>
$('.checkbox_toggle').bootstrapToggle({
  on: 'نشط',
  off: 'غير نشط'
});
</script>
<script>
    function change_status(valu, id) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/absent_emp/Absent_emp_c/change_status",
            data: {valu: valu, id: id},
            success: function (msg) {
                var obj = JSON.parse(msg);
                var status = obj.status;
                console.log('status  ::'+status);
                $('#status_hidden'+id).val(status);
                get_all_data();
            }
        });
    }
</script>
<script>
function get_all_data()
{
    $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/absent_emp/Absent_emp_c/get_all_data",
            beforeSend: function () {
                $('#result').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (msg) {
                $('#result').html(msg);
            }
        });
}
</script>
<script>
function get_num_days()
{
    
    var start_absent_date=$('#start_absent_date').val();
    var end_absent_date=$('#end_absent_date').val();
    if(end_absent_date !='' && start_absent_date !='')
    {
    console.log(start_absent_date);
    console.log(end_absent_date);
    if(start_absent_date == end_absent_date)
    {
        $('#num').val(1);
    }
    else if(start_absent_date < end_absent_date)
    {
        var date1=new Date($('#start_absent_date').val());
    var date2=new Date($('#end_absent_date').val());
        var Difference_In_Time =date2.getTime() - date1.getTime();
        var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);
        $('#num').val(Difference_In_Days+1);
    }
    else{
        swal("لا يمكن ان يكون تاريخ البدايه بعد  تاريخ النهاية","","error");
        $('#end_absent_date').val('');
        $('#start_absent_date').val('');
    }
    }

}

function get_pop_detailes(emp_id) {
    var emp_id=emp_id.value;
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>human_resources/employee_forms/absent_emp/Absent_emp_c/get_pop_detailes',
            data: {emp_id: emp_id},
            cache: false,
           
            success: function (resp) {
                $('#load_pop_detailes').html(resp);
                get_value();
            }
        });
    }
    
       function get_value() {

        var num = $('#num').val();
        if (num) {
            var total_bdlat = $('#total_bdlat').val();
            var ayam_amal = $('#ayam_amal').val();
            if (total_bdlat) {
                var result = (total_bdlat * num) / ayam_amal;
                $('#new_value').val(Math.round(result));
            } else {
                swal("برجاء اختيار موظف", "", "error");
            }
        } else {
            swal("برجاء  ادخال تاريخ البداية والنهاية ", "", "error");
        }
    }
   /* function get_value()
    {
       
       var num= $('#num').val();
        if( num !='')
        {
       var total_bdlat= $('#total_bdlat').val();
       var ayam_amal= $('#ayam_amal').val();
       if(total_bdlat !='' ){
       var result=(total_bdlat*num)/ayam_amal;
       $('#new_value').val(result);
        }else{
            swal("برجاء اختيار موظف","","error");
        }
        }
        else{
            swal("برجاء  ادخال تاريخ البداية والنهاية ","","error");
        }

    }*/

</script>