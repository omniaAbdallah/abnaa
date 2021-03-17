<style>
    .loader {
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid #3498db;
        width: 70px;
        height: 70px;
        -webkit-animation: spin 2s linear infinite; /* Safari */
        animation: spin 2s linear infinite;
    }
    /* Safari */
    @-webkit-keyframes spin {
        0% {
            -webkit-transform: rotate(0deg);
        }
        100% {
            -webkit-transform: rotate(360deg);
        }
    }
    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }
        .btn-abnaa{
    background-color: #95c11f;
    border-color: #95c11f;
    }
    .abnaa_class{
        font-size: 15px !important;
    padding: 1px 5px;
    line-height: 1.5;
    border-radius: 2px;
    }
    table.dataTable tbody th, table.dataTable tbody td {
    padding: 5px 0px !important;
    vertical-align: middle !important;
    text-align: center !important;
    font-size: 12px !important;
    font-weight: bold !important;
}
.modal table td input[type=radio] {
    height: 22px;
    width: 22px;
}
.twqeat-table td{
    padding: 0 !important;
    background-color: #fff;
    text-align: center;
}

</style>
<div class="col-xs-12 no-padding ">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title ?> </h3>
        </div>
        <div class="panel-body">
            <!------------------------------------------------------------------------------------>
            <!-- // yara_strart
            <?php
            /*
           echo '<pre>';
            print_r($all_data);*/

           
             if (isset($all_data) && !empty($all_data)) { ?>
               
            //yara_start -->

            <?php $x = 1;
                    foreach ($all_data as $record) { 
                        if($record->halet_sarf == 'yes'){
                           $title_halet_sarf = 'تم الصرف';
                           $class_halet_sarf = 'success';
                        }elseif($record->halet_sarf == 'no'){
                           $title_halet_sarf = 'قيد الصرف';
                           $class_halet_sarf = 'warning'; 
                        }else{
                           $title_halet_sarf = 'غير محدد';
                           $class_halet_sarf = 'default';    
                        }
                        $months = array("01" => "يناير", "02" => "فبراير", "03" => "مارس", "04" => "أبريل", "05" => "مايو",
                    "06" => "يونيو", "07" => "يوليو", "08" => "أغسطس", "09" => "سبتمبر", "10" => "أكتوبر",
                    "11" => "نوفمبر", "12" => "ديسمبر");
                    $orderdate = explode('-', $record->mosayer_date_ar);
                    $month = $orderdate[1];
                    $day   = $orderdate[2];
                    $year  = $orderdate[0];
                        ?>
<div id="accordion" class="panel panel-default">
  <div class="card panel-heading" >
    <div class="panel-title" id="headingOne<?php echo $record->id; ?>">
      
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne<?php echo $record->id; ?>" aria-expanded="true" aria-controls="collapseOne">
           شهر 
        <?php 
                             if(!empty($record->mosayer_date_ar))
                             {
                            if (isset($months[$month])) {
                                    echo $months[$month];
                                } }?>
        </button>
     
    </div>

    <div id="collapseOne<?php echo $record->id; ?>" class="collapse " aria-labelledby="headingOne<?php echo $record->id; ?>" data-parent="#accordion">
      <div class="card-body">
      <?php if($record->num_all_sheeks!=0){?>
      <table id="" class="example display table table-bordered   responsive nowrap" cellspacing="0">
                    <thead>
                    <tr class="info">
                        <th class="text-center">م</th>
                        <th class="text-center">رقم الصرف</th>
                        <th class="text-center">بند الصرف</th>
                        <th class="text-center">الـتاريـخ</th>
                        <th class="text-center">طريقة الصرف</th>
                        <th class="text-center">عبارة عن</th>
                        <th class="text-center"> شهر</th>
                         <th class="text-center"> عدد الموظفين</th>
                        <th class="text-center"> المبلغ</th>
                       <th class="text-center">التفاصيل</th>
                        <th class="text-center">تاريخ الصرف</th>
                         <!--<th class="text-center">الإجراء</th>-->
                           <th class="text-center">حالة الصرف</th>
                    </tr>
                    </thead>
                    <tbody>
                   
                        <tr class="">
                            <td><?php echo $x++ ?></td>
                            <td><?php echo 1 ; ?></td>
                            <td>رواتب الموظفين</td>
                            <td><?php echo $record->mosayer_date_ar; ?></td>
                            <td style="background-color: #3c990b; color: white;">شيك</td>
                            <td>
                            <?php
                            if(!empty($record->mosayer_date_ar))
                            {
                         
?>
                            رواتب الموظفين <?php if (isset($months[$month])) {
                                    echo $months[$month];
                                } ?>
                                <?php if (isset($year)) {
                                    echo $year;
                                } ?>
                                 م
                            <?php }?>
                            </td>
                            <td><?php 
                             if(!empty($record->mosayer_date_ar))
                             {
                            if (isset($months[$month])) {
                                    echo $months[$month];
                                } }?></td>
                            <td><?php echo $record->num_all_sheeks; ?></td>
                            <td><?php echo $record->sum_all_sheeks; ?></td>
                            <td>   
                                <a data-toggle="modal" data-target="#modal-sm-data" title="التفاصيل"
                                   onclick="get_details('<?= $record->mosayer_rkm ?>',1);"
                                   class="btn btn-xs btn-warning">
                                    <i class="fa fa-list-alt" aria-hidden="true"></i>
                                </a>
                                </td>
                              <td>
                                <a type="button" class="btn btn-abnaa btn-xs" data-toggle="modal"
                                   data-target="#myModal_____<?= $record->id ?>">
                                    <?php
                                    if (isset($record->due_date) and $record->due_date != null) {
                                        ?>
                                       <!-- <span style="color: red; font-weight: bold ">الإرسال <?php echo date('Y-m-d', $record->due_date) ?></span> -->
                                        <span style="color: #222221;font-weight: bold ">  <?php echo date('Y-m-d', $record->cashing_date) ?></span>
                                    <?php } else {
                                        ?>
                                      غير محدد
                                    <?php }
                                    ?>
                                </a>
                            </td>
  
   <td><span style="width: 100% !important;" class="label label-<?=$class_halet_sarf?>"><?=$title_halet_sarf?></span> </td>                     
                        </tr>
                  
                    </tbody>
                </table>
                                    <?php }?>
<?php if($record->num_all_tahwel!=0){?>
                <table id="examplex" class=" display table table-bordered   responsive nowrap" cellspacing="0">
                    <thead>
                    <tr class="info">
                        <th class="text-center">م</th>
                        <th class="text-center">رقم الصرف</th>
                        <th class="text-center">بند الصرف</th>
                        <th class="text-center">الـتاريـخ</th>
                        <th class="text-center">طريقة الصرف</th>
                        <th class="text-center">عبارة عن</th>
                        <th class="text-center"> شهر</th>
                         <th class="text-center"> عدد الموظفين</th>
                        <th class="text-center"> المبلغ</th>
                       <th class="text-center">التفاصيل</th>
                        <th class="text-center">تاريخ الصرف</th>
                         <!--<th class="text-center">الإجراء</th>-->
                           <th class="text-center">حالة الصرف</th>
                    </tr>
                    </thead>
                    <tbody>
                   
                        <tr class="">
                            <td><?php echo $x++ ?></td>
                            <td><?php echo 1 ; ?></td>
                            <td>رواتب الموظفين</td>
                            <td><?php echo $record->mosayer_date_ar; ?></td>
                            <td style="background-color: #3c990b; color: white;">تحويل</td>
                            <td>
                            <?php
                            if(!empty($record->mosayer_date_ar))
                            {
                         
?>
                            رواتب الموظفين <?php if (isset($months[$month])) {
                                    echo $months[$month];
                                } ?>
                                <?php if (isset($year)) {
                                    echo $year;
                                } ?>
                                 م
                            <?php }?>
                            </td>
                            <td><?php 
                             if(!empty($record->mosayer_date_ar))
                             {
                            if (isset($months[$month])) {
                                    echo $months[$month];
                                } }?></td>
                            <td><?php echo $record->num_all_tahwel; ?></td>
                            <td><?php echo $record->sum_all_tahwel; ?></td>
                            <td>   
                                <a data-toggle="modal" data-target="#modal-sm-data" title="التفاصيل"
                                   onclick="get_details('<?= $record->mosayer_rkm ?>',2);"
                                   class="btn btn-xs btn-warning">
                                    <i class="fa fa-list-alt" aria-hidden="true"></i>
                                </a>
                                </td>
                              <td>
                                <a type="button" class="btn btn-abnaa btn-xs" data-toggle="modal"
                                   data-target="#myModal_____<?= $record->id ?>">
                                    <?php
                                    if (isset($record->due_date) and $record->due_date != null) {
                                        ?>
                                       <!-- <span style="color: red; font-weight: bold ">الإرسال <?php echo date('Y-m-d', $record->due_date) ?></span> -->
                                        <span style="color: #222221;font-weight: bold ">  <?php echo date('Y-m-d', $record->cashing_date) ?></span>
                                    <?php } else {
                                        ?>
                                      غير محدد
                                    <?php }
                                    ?>
                                </a>
                            </td>
  
   <td><span style="width: 100% !important;" class="label label-<?=$class_halet_sarf?>"><?=$title_halet_sarf?></span> </td>                     
                        </tr>
                  
                    </tbody>
                </table>
                                    <?php }?>
      </div>
    </div>
  </div>
 
  
</div>
           
<?php } ?>      
                
            <?php } ?>
            <!------------------------------------------------------------------------------------>
        </div>
    </div>
</div>
<?php if (isset($all_data) && !empty($all_data)) { ?>
    <div class="modal fade " id="modal-sm-data" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-success modal-lg " role="document" style="width: 90%">
            <div class="modal-content ">
                <div class="modal-header ">
                    <h1 class="modal-title">تفاصيل المسير  </h1>
                </div>
                <div class="modal-body row">
                    <div id="option_details">
                    </div>
                </div>
                <div class="modal-footer ">
                    <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div >
        <!-- /.modal-dialog -->
    </div>
    <?php foreach ($all_data as $record): ?>
    <!------------------------------------------------------------------------------------>
            <div class="modal fade" id="myModal<?= $record->id ?>" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document" style="width: 90%;">
                <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                            <h4 class="modal-title">إعدادات بيانات ملف ونموذج البنك</h4>
                        </div>
                        <div class="modal-body">
                            <div>
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active">
                                        <a href="#home<?= $record->id ?>" aria-controls="home<?= $record->id ?>"
                                           role="tab" data-toggle="tab">اعتماد
                                            الصرف</a></li>
                                    <li role="presentation">
                                        <a href="#profile<?= $record->id ?>" aria-controls="profile<?= $record->id ?>" role="tab"
                                           data-toggle="tab">التوقيعات</a></li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="home<?= $record->id ?>">
                                              <?php echo form_open_multipart(base_url() . "human_resources/employee_forms/Employee_salaries/updateSarfToAproved/" . $record->id) ?>
                                            <div class="row" style="padding: 20px">
                                                <div class=" col-sm-12 col-xs-12">
                                                    <div class="form-group col-sm-4 col-xs-12">
                                                        <label class="label ">تاريخ الإستحقاق (تاريح
                                                            الإرسال) </label>
                                                        <input type="date" name="due_date"
                                                               value="<?php if ($record->due_date != 0) {
                                                                   echo date("Y-m-d", $record->due_date);
                                                                   // echo $record->due_date;
                                                               } ?>" class="form-control "
                                                               placeholder="/ ---/--- /--"
                                                               data-validation="required">
                                                    </div>
                                                    <div class="form-group col-sm-4 col-xs-12">
                                                        <label class="label ">تاريخ الصرف </label>
                                                        <input type="date" name="cashing_date"
                                                               value="<?php if ($record->cashing_date != 0) {
                                                                   echo date("Y-m-d", $record->cashing_date);
                                                                   //   echo  $record->cashing_date;
                                                               } ?>" class="form-control "
                                                               placeholder="/ ---/--- /--"
                                                               data-validation="required">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 text-center">
                                                    <button type="submit" name="make_approve" value="add"
                                                            class="btn btn-success">حفظ
                                                    </button>
                                                </div>
                                            </div>
                                            <?php echo form_close() ?>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="profile<?= $record->id ?>">
                                        <?php echo form_open_multipart(base_url() . "human_resources/employee_forms/Employee_salaries/update_amin_manager/" . $record->id) ?>
                                        <div class="col-md-12">
                                            <table class="table table-bordered twqeat-table">
                                                <tbody>
                                                <tr>
                                                    <td style="width: 60px;"></td>
                                                    <td style="background-color: #3c990b; color: white;">أمين صندوق</td>
                                                    <td><input type="text" name="amin_name"
                                                               id="d_name<?php echo $record->id; ?>"
                                                               style="color: #000;font-size: 18px;"
                                                               value="<?php echo $amin_name; ?>"
                                                               class="form-control bottom-input"
                                                               data-validation="required"
                                                               data-validation-has-keyup-event="true"></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="radio" name="toggle"
                                                               id="toggleElement<?php echo $record->id; ?>"
                                                               onchange="toggleStatus(<?php echo $record->id; ?>)"
                                                               style=""></td>
                                                    <td style="background-color: #3c990b; color: white;">رئيس مجلس
                                                        الإدارة
                                                    </td>
                                                    <td><input type="text" name="manager_name"
                                                               id="manager_name<?php echo $record->id; ?>"
                                                               value="<?php echo $manager_name ?>"
                                                               style="color: #000;font-size: 18px;"
                                                               class="form-control bottom-input"
                                                        ></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="radio" name="toggle"
                                                               id="toggleElement1<?php echo $record->id; ?>"
                                                               onchange="toggleStatus(<?php echo $record->id; ?>)"
                                                               style=""></td>
                                                    <td style="background-color: #3c990b; color: white;">نائب رئيس مجلس
                                                        الإدارة
                                                    </td>
                                                    <td><input type="text" name="naeb_name"
                                                               id="naeb_name<?php echo $record->id; ?>"
                                                               value="<?php echo $naeb_name ?>"
                                                               style="color: #000;font-size: 18px;"
                                                               class="form-control bottom-input"
                                                            <?php if (empty($naeb_name)) ?>></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-12 text-center">
                                            <button type="submit" class="btn btn-primary  " name="update"
                                                    style="float: right;">حفظ
                                            </button>
                                        </div>
                                        <?php echo form_close() ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                        </div>
                </div>
            </div>
        </div>
	<!-- تحميل الملف -->
    <!-- Modal -->
   <div id="modal_file<?=$record->mosayer_rkm?>" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"> تحميل ملف</h4>
                </div>
                <div class="modal-body">
                    <?php echo form_open_multipart('human_resources/employee_forms/Employee_salaries/add_sarf_file/'.$record->mosayer_rkm); ?>
                        <div class="col-sm-8">
                            <label class="label label-green  half" style="width: 25%!important;">المرفق </label>
                            <input type="file" name="file_downloded" data-validation="required"   class="form-control half input-style"  style="width: 75%!important;">
                        </div>
                        <div class="col-sm-4">
                            <input type="submit" id="buttons" name="ADD"
                                   class="btn btn-blue btn-close" value="حفظ"/>
                        </div>
                    <?php echo form_close(); ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
                </div>
            </div>
        </div>
    </div>
    <!-- تحميل الملف -->     
<!----------------------------------------------------------------------->        
    <?php endforeach; ?>
<?php } ?>
<script>
       function get_details(mosayer_rkm,f2a) {
      
        $("#option_details").html('<div class="col-sm-offset-6"> <div class="loader "></div>');
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>human_resources/employee_forms/Employee_salaries/LoadPage',
            data: {mosayer_rkm:mosayer_rkm,f2a:f2a},
            dataType: 'html',
            cache: false,
            success: function (html) {
                $("#option_details").html(html);
            }
        });
    }
</script>
<script>
    function download_check(valu)
    {
        $.ajax({
            type:'post',
            url:"<?php echo base_url();?>family_controllers/Exchange/to_word",
            data:{valu:valu},
            success:function(d){
              alert(d);
            }
        });
    }
</script>
<script>
    function toggleStatus(id) {
        if ($('#toggleElement' + id).is(':checked')) {
            $('#manager_name' + id).removeAttr('disabled');
            $('#manager_name' + id).attr("data-validation", "required");
            $('#naeb_name' + id).attr('disabled', 'disabled');
        } else if ($('#toggleElement1' + id).is(':checked')) {
            $('#naeb_name' + id).removeAttr('disabled');
            $('#naeb_name' + id).attr("data-validation", "required");
            $('#manager_name' + id).attr('disabled', 'disabled');
        } else {
        }
    }
</script>
<script>




$('#examplex').DataTable( {
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

