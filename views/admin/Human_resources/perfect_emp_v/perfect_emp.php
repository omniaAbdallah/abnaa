
<div class="col-sm-12 no-padding">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
        <div class="panel-heading">
            <h3 class="panel-title"><?= $title ?></h3>
        </div>
        <div class="panel-body">
            <?php
           
                echo form_open_multipart('human_resources/perfect_emp/Perfect_emp_c/insert', array('id' => 'myform'));
               
                $date = date('Y-m-d');
                
                // $file_num = "";
                // $father_name = "";
            $emp_name = '';
            $card_num='';
            $emp_id_fk = '';
            $emp_code_fk = '';
            $edara_id_fk = '';
            $edara_n = '';
            $qsm_id_fk = '';
            $qsm_n = '';
            $mosma_wazefy_n='';
            $mosma_wazefy_id='';
            
                $details = "";
             //   $responsable_name = '';
            
            ?>
            <div class="col-sm-12 form-group">
               
              
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
<input type="hidden" id="card_num" name="card_national_num"
value="<?php if (!empty($emp_data->card_num)) {
    echo $emp_data->card_num;
} else {
    echo $card_num;
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
                        <div class="form-group col-md-1 col-sm-6 col-xs-6 padding-4">
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
            </div>
            <div class="col-sm-12 form-group">
                <div class="col-sm-6  col-md-4 padding-4 ">
                    <label class="label  ">التفاصيل </label>
                    <input type="text" value="" name="details" id="details"
                           class="form-control ">
                </div>
                
            </div>
            <br>
                            <div class="col-sm-12 form-group 4 text-center">
                             
                                
                                <button type="submit" 
                                        class="btn btn-labeled btn-success " name="save" value="save">
                                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>تعين موظف مثالي لهذا الشهر
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
                <h3 class="panel-title"> الموظف المثالي</h3>
            </div>
            <div class="panel-body">
                <table id="" class="example table table-bordered table-striped" role="table">
                    <thead>
                    <tr class="greentd">
                        <th>م</th>
                        <th class="text-center">كود الموظف</th>
                        <th class="text-center">اسم الموظف</th>
                        <th class="text-center"> الأدارة</th>
                        <th class="text-center">القسم</th>
                        <th class="text-center">المسمى الوظيفي</th>
                        <th class="text-center">خلال شهر</th>
                        <th class="text-center">الحالة </th>
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
                            <?php         
$months = array("Jan" => "يناير", "Feb" => "فبراير", "Mar" => "مارس", "Apr" => "أبريل", "May" => "مايو", "Jun" => "يونيو", "Jul" => "يوليو", "Aug" => "أغسطس", "Sep" => "سبتمبر", "Oct" => "أكتوبر", "Nov" => "نوفمبر", "Dec" => "ديسمبر");
    $your_date = $value->date_ar; // The Current Date
    $en_month = date("M", strtotime($your_date));
    foreach ($months as $en => $ar) {
        if ($en == $en_month) { 
            echo $ar; 
        }
    }

                            ?>
                            </td>
                            <td>
                            <?php
 if ($value->status == 1) {
    $status_checked= "checked";
  }else {
    $status_checked="";
  }
                      ?>
                      
  <div class="toggle-example">
         <input id="status_hidden<?php echo $value->id;?>" type="hidden" value="<?php echo $value->status;?>"/>
         <input id="checkbox_toggle" class="checkbox_toggle" type="checkbox" <?=$status_checked?> data-toggle="toggle"
          onchange="change_status($('#status_hidden<?php echo $value->id;?>').val(),<?php echo $value->id;?>)"
                 data-onstyle="success" data-offstyle="danger" data-size="mini">
                 </div>
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
        setTimeout(function(){window.location="<?= base_url() . 'human_resources/perfect_emp/Perfect_emp_c/Delete_namozeg/' . $value->id ?>";}, 500);
        });'>
    <i class="fa fa-trash"> </i></a> 
                                
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
                    "ajax": '<?php echo base_url(); ?>human_resources/perfect_emp/Perfect_emp_c/getConnection_emp/',
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
            url: "<?php echo base_url();?>human_resources/perfect_emp/Perfect_emp_c/change_status",
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
            url: "<?php echo base_url();?>human_resources/perfect_emp/Perfect_emp_c/get_all_data",
            beforeSend: function () {
                $('#result').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (msg) {
                $('#result').html(msg);
            }

        });
}
</script>

