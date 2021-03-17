
<?php
if (isset($result) && !empty($result)) {
    $order_num = $result->order_num;
    $order_date = $result->order_date_ar;
    $emp_id_fk = $result->emp_id_fk;
    $emp_name = $result->emp_name;
    $emp_code = $result->emp_code_fk;
    $emp_national_num = $result->emp_national_num;
    $mosama_wazefy = $result->mosama_wazefy;
    $edara_id_fk = $result->edara_id_fk;
    $edara_n = $result->edara_n;
    $qsm_id_fk = $result->qsm_id_fk;
    $qsm_n = $result->qsm_n;
    $direct_manager_id_fk = $result->direct_manager_id_fk;
    $direct_manger_code = $result->direct_manger_code;
    $direct_manger_n = $result->direct_manger_n;
    $direct_manger_mosama_wazefy = $result->direct_manger_mosama_wazefy;
    $nazran_to = $result->nazran_to;
    $work_assigned_details = $result->work_assigned_details;
    $total_hours = 0;
    if (isset($result->details) && !empty($result->details)) {
        foreach ($result->details as $item) {
            $total_hours += $item->num_hours;
        }
    }
    // $total_hours= $result->total_hours;


    ///////////////////////////////////////////////


} else {


    $order_num = '';
    $emp_id_fk = '';
    $emp_name = '';
    $emp_code = '';
    $emp_national_num = '';
    $job_title_id_fk = '';
    $mosama_wazefy = '';
    $edara_id_fk = '';
    $edara_n = '';
    $qsm_id_fk = '';
    $qsm_n = '';
    $direct_manager_id_fk = '';
    $direct_manger_code = '';
    $direct_manger_n = '';
    $direct_manger_mosama_wazefy = '';
    $nazran_to = '';
    $work_assigned_details = '';
    $total_hours = '';
    $order_date = date('Y-m-d');

}
?>

<!--------------------------------------------------------modal------------------------------------>

<div class="col-sm-12 no-padding ">

    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title; ?></h3>
        </div>
        <div class="panel-body">
            <?php
            if (isset($result) && !empty($result)){ ?>
            <form action="<?php echo base_url(); ?>human_resources/employee_forms/overtime_hours/Overtime_hours_orders/edit_overtime_hours_orders/<?php echo $result->id; ?>"
                  method="post">
                <?php } else{ ?>
                <form action="<?php echo base_url(); ?>human_resources/employee_forms/overtime_hours/Overtime_hours_orders/add_overtime_hours_orders"
                      method="post">
                    <?php } ?>

                    <?php if (isset($_POST['from_profile']) && (!empty($_POST['from_profile']))) { ?>
                        <input type="hidden" name="from_profile" value="1"/>
                    <?php } ?>

                    <input type="hidden" name="order_num" value="<?= $order_num ?>">

                    <input type="hidden" id="edara_id_fk" name="edara_id_fk"
                           value="<?= $edara_id_fk ?> ">

                    <input type="hidden" id="qsm_id_fk" name="qsm_id_fk"
                           value="<?= $qsm_id_fk ?> ">

                           <input type="hidden"  class="form-control" name="direct_manager_id_fk"
                                               id="direct_manager_id_fk" value="<?= $direct_manger_n ?>"/>


                           

                           <input type="hidden" id="direct_manger_mosama_wazefy" name="direct_manger_mosama_wazefy"
                           value="<?= $direct_manger_mosama_wazefy ?> ">
                           
                    <div class="print_forma  col-xs-12 no-padding">
                        <!-------------------------------------------------------------------------------->

                        <div>
                   

                                    <div class="col-xs-12 no-padding ">

    <div class="form-group col-md-1 col-sm-6 col-xs-6 padding-4">
        <label class="label">رقم الطلب </label>
        <input type="text" name="rkm_talab"value=""class="form-control" readonly="readonly" />
    </div>     
 
  <div class="form-group col-md-2 col-sm-6 col-xs-6 padding-4">
    <label class="label">تاريخ الطلب </label>
           <input type="date" id="date" name="order_date" class="form-control"
                                                   value="<?php echo $order_date; ?>">
  </div>     
 


    <div class="form-group col-md-3  col-sm-6 col-xs-6 padding-4">

        <label class="label ">اسم الموظف</label>
        <input name="" id="emp_name" class="form-control"
               style="width:88%; float: right;"
               readonly
               data-validation="required"

               value="<?= $emp_name ?>">
        <button type="button" data-toggle="modal" data-target="#myModal_emps"
                class="btn btn-success btn-next" style="float: left;"
                onclick="GetDiv_emps('myDiv_emp')" <?php if (!empty($emp_data->employee)) {
            echo 'disabled';
        } ?>>
            <i class="fa fa-plus"></i></button>

    </div>
                                        <div class="form-group col-md-1 col-sm-6 col-xs-6 padding-4">
                                            <label class="label "> الرقم الوظيفي</label>
                                            <input name="emp_code_fk" id="emp_code" class="form-control"
                                                   value="<?= $emp_code ?>" readonly data-validation="required">
                                        </div>
                                        <div class="form-group col-md-2 col-sm-6 col-xs-6 padding-4">
                                            <label class="label "> المسمى الوظيفي</label>
                                            <input name="mosama_wazefy" id="job_title" class="form-control"
                                                   value="<?= $mosama_wazefy ?>" readonly>
                                        </div>
                                        <div class="form-group col-md-3 col-sm-6 col-xs-6 padding-4">
                                            <label class="label "> الأدارة </label>
                                            <input name="edara_n" id="edara_n" class="form-control"
                                                   value="<?= $edara_n ?>" readonly>
                                        </div>
                                        
                                        
                                        </div>
                                     <div class="col-xs-12 no-padding ">            
                                        <div class="form-group col-md-2 col-sm-6 col-xs-6 padding-4">
                                            <label class="label "> القسم</label>
                                            <input name="qsm_n" id="qsm_n" class="form-control"
                                                   value="<?= $qsm_n ?>" readonly>
                                        </div>

                                        <div class="modal fade" id="myModal_emps" tabindex="-1" role="dialog"
                                             aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document" style="width: 80%">
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
                                                                style="float: left;"
                                                                onclick="$('#myModal_emps').modal('hide')">إغلاق
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--  -->

                                        <!--                                        <div class="form-group col-md-3 col-sm-6 padding-4">
                                            <label class="label"> التاريخ</label>
                                                <input type="text" id="date"   name="order_date"  readonly class="form-control" value="<?php echo $order_date; ?>" >
                                            </div>

-->

   <div class="form-group col-md-10  col-xs-12 padding-4">
                                        <label class="label"> نظراً لـ</label>
                                        <input type="text" class="form-control" name="nazran_to"
                                               value="<?= $nazran_to ?>"/>
                                    </div>
                                    </div>
      





 <div class="col-xs-12 no-padding ">     
<div class="form-group col-md-12 col-sm-3 col-xs-12 padding-4">
    <label class="label"> فقد تم تكليفكم بإنجاز العمل التالي</label>
  <textarea class="form-control editor2" id="editor2"
              name="work_assigned_details"><?= $work_assigned_details ?></textarea>
              
   <!--
<input type="text" class="form-control"  name="work_assigned_details[]" value="<?= $work_assigned_details ?>"  />

-->


</div>

</div>


                            <div class="piece-box">
    
                               <!-- <div class="piece-body" style="padding-top: 10px">
                                    <div class="form-group col-md-3 col-sm-3 col-xs-12 padding-4">
                                        <label class="label"> الأستاذ المحترم/</label>
                                        <input type="text" readonly class="form-control" name="direct_manager_id_fk"
                                               id="direct_manager_id_fk" value="<?= $direct_manger_n ?>"/>
                                    </div>
                                    <div class="form-group col-md-3 col-sm-3 col-xs-12 padding-4">
                                        <label class="label"> مسمى الوظيفة :</label>
                                        <input type="text" readonly name="direct_manger_mosama_wazefy"
                                               id="direct_manager_job_title_fk"
                                               value="<?= $direct_manger_mosama_wazefy ?>" class="form-control"/>

                                    </div>

                                </div>
                                <div class="col-xs-12 no-padding text-center" style="margin: 10px 0;">


                                </div>-->
                                <!-- <div class="col-xs-12 no-padding">
                                    <table class="table table-bordered table_tb" id="mytable">
                                        <thead>
                                        <tr class="greentd">
                                            <th style="width: 170px;">التاريخ</th>
                                            <th style="width: 170px;">من الساعة</th>
                                            <th style="width: 170px;">إلى الساعة</th>
                                            <th style="width: 100px;">المدة</th>
                                            <th style="width: 170px;">البدل الأضافي</th>
                                            <th style="width: 500px;">العمل المكلف بإنجازه</th>
                                            <th></th>
                                        </tr>
                                        </thead>

                                        <tbody id="result_pageTable">
                                        <?php
                                        if (isset($result->details) && !empty($result->details)) {
                                            $z = 1;
                                            foreach ($result->details as $item) {
                                                if (isset($_POST['from_profile']) && (!empty($_POST['from_profile']))) {
                                                    $link_delete = 1;
                                                } else {
                                                    $link_delete = 0;
                                                }
                                                $z++;
                                                ?>
                                                <tr class="open_green" id="tr<?= $z ?>">
                                                    <td><input type="date" class="form-control" name="date[]"
                                                               id="date<?= $z ?>" data-validation="required"
                                                               value="<?= $item->date_ar ?>"></td>
                                                    <td>
                                               
                                                    
                            <input type="time" class="form-control" data-validation="required"
                              name="from_hour[]" id="from_time"   value="<?= $item->from_hour ?>"
                               onchange="count(<?= $z ?>)"
                             >
                                                    </td>
                                                    <td><input type="text" class="form-control "
                                                        data-validation="required" value="<?= $item->to_hour ?>"
                                                        name="to_hour[]" id="m13h<?= $z ?>"
                                                        onchange="count(<?= $z ?>)" >
                                                    </td>
                                                    <td><input type="time" class="num_hours calc form-control"
                                                               name="num_hours[]" id="num_hours<?= $z ?>"
                                                               value="<?= $item->num_hours ?>" readonly
                                                              >
                                                        <input type="hidden" class="minutes" name=""
                                                               id="minutes<?= $z ?>" readonly style="width: 107px">
                                                    </td>
                                                    <td><select name="bdal_type_fk[]" id="bdal_type<?= $z ?>"
                                                                class="form-control " data-validation="required"
                                                                aria-required="true">
                                                            <option value="">إختر</option>
                                                            <?php $bdal_type_arr = array(0 => 'بدل نقدي', 1 => 'بدل أيام الراحة'); ?>
                                                            <?php for ($a = 0; $a < sizeof($bdal_type_arr); $a++) { ?>
                                                                <option value="<?= $a ?>" <?php if ($a == $item->bdal_type_fk) {
                                                                    echo 'selected';
                                                                } ?>><?= $bdal_type_arr[$a] ?></option>
                                                            <?php } ?>
                                                        </select></td>
                                                    <td>
                                                    
                                                    <input type="text" class="form-control"  name="work_assigned[]"  
                                                     data-validation="required" value="<?= $item->work_assigned ?>"
                                                     />
                                                   
                                                                  </td>
                                                    <td class="text-center">

                                                        <a href="#" onclick='swal({
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
                                                                window.location="<?= base_url() . "human_resources/employee_forms/overtime_hours/Overtime_hours_orders/delete_item/" . $item->id . '/' . $item->order_id_fk . '/' . $link_delete ?>";
                                                                });count(<?= $z ?>);'>
                                                            <i class="fa fa-trash"> </i></a>
                                                    </td>
                                                </tr>

                                                <?php
                                            }
                                        } else {
                                            ?>
                                            <tr class="open_green" id="tr1">
                                                <td><input type="date" class="form-control" name="date[]" id="date"
                                                           data-validation="required"
                                                           value="<?php echo date("Y-m-d"); ?>"></td>
                                                <td>
                                                
                                              
                                                    
                                                         <input type="time" class="form-control" data-validation="required"
                              name="from_hour[]" id="from_hour"
                              onchange="count(1)" 
                             />                                                                                                       
                                                </td>
                                                <td>
                                          
                                                    
                         <input type="time" class="form-control" data-validation="required"
                              name="to_hour[]" id="to_hour"
                              onchange="count(1)" 
                             />   
                                                    
                                                </td>
                                                <td><input type="text" class="num_hours calc form-control"
                                                           name="num_hours[]" id="num_hours1" readonly
                                                          >
                                                    <input type="hidden" class="minutes" name="" id="minutes1" readonly
                                                           style="width: 107px">
                                                </td>
                                                <td><select name="bdal_type_fk[]" id="bdal_type" class="form-control "
                                                            data-validation="required" aria-required="true">
                                                        <option value="">إختر</option>
                                                        <?php $bdal_type_arr = array(0 => 'بدل نقدي', 1 => 'بدل أيام الراحة'); ?>
                                                        <?php for ($a = 0; $a < sizeof($bdal_type_arr); $a++) { ?>
                                                            <option value="<?= $a ?>"><?= $bdal_type_arr[$a] ?></option>
                                                        <?php } ?>
                                                    </select></td>
                                                <td>
                                                  <input type="text" class="form-control"  name="work_assigned[]"  
                                                     data-validation="required" 
                                                     />
                                              
                                                              </td>
                                                <td class="text-center">

                                                    <a href="#"
                                                    ><i class="fa fa-trash"
                                                        aria-hidden="true"></i> </a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>

                                        </tbody>

                                        <tfoot>
                                        <tr>
                                            <th colspan="6" style="background-color: #fff;">
                                                <input type="hidden" readonly name="total_hours" id="total_hours"
                                                       value="<?= $total_hours ?>">
                                                <input type="hidden" class="" name="" id="total_minutes" readonly
                                                       style="width: 107px">
                                            </th>

                                            <th colspan="1" class="text-center" style="background-color: #fff;">
                                                <button type="button" onclick="add_row()" class="btn-success btn"
                                                        style="font-size: 16px;"><i class="fa fa-plus"></i>
                                                </button>
                                            </th>


                                        </tr>

                                        </tfoot>
                                    </table> -->


                                <!-- </div> -->

                            </div>

                        </div>


                        <!-------------------------------------------------------------------------------->


                    </div>

                    <div class="col-xs-12 text-center">
                        <input type="hidden" name="add" value="add">
                        <button type="submit"
                                class="btn btn-labeled btn-success " id="buttons" name="add" value="حفظ"
                                style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                        </button>






                    </div>
                    <br/>
                    <br/>
                    <!-- </div> -->
                </form>
        </div>
    </div>
</div>


<?php
if (isset($records) && !empty($records)) {
    ?>
    <div class="col-sm-12 no-padding ">

        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"> بيانات التكليف الإضافى</h3>
            </div>
            <div class="panel-body">

                <!-----------------------------------------table------------------------------------->

                <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0"
                       width="100%">
                    <thead>
                    <tr class="greentd visible-md visible-lg">
                        <th>م</th>
                        <th>رقم الطلب</th>
                        <th>تاريخ الطلب</th>
                        <th>الإدارة</th> 
                        <th>الرقم الوظيفي</th>
                        <th>إسم الموظف</th>
                        <th>المدير المباشر</th>
                         <!-- <th>عدد الساعات</th> -->
                        <th> الاجراء</th>
                      
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $x = 1;
                    foreach ($records as $row) {
                        if (isset($_POST['from_profile']) && (!empty($_POST['from_profile']))) {
                            $link_update = 'edit_Overtime_hours_orders(' . $row->id . ')';
                            $link_delete = 1;
                        } else {
                            $link_update = 'window.location="' . base_url() . 'human_resources/employee_forms/overtime_hours/Overtime_hours_orders/edit_overtime_hours_orders/' . $row->id . '";';
                            $link_delete = 0;
                        }
                        ?>
                        <tr>
                            <td><?php echo $x; ?></td>
                            <td><?php echo $row->order_num; ?></td>
                             <td><?php echo $row->order_date_ar; ?></td>
                             <td><?php echo $row->edara_n; ?></td>
                            
                            <td><?php echo $row->emp_code_fk; ?></td>
                            <td><?php echo $row->emp_name; ?></td>
                            <td><?php echo $row->direct_manger_n; ?></td>
                          
                            <td>
                               


                         
                          

                          <!-- yara -->
                          <div class="btn-group">
<button type="button" class="btn btn-primary">إجراءات</button>
<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
 <span class="caret"></span>
 <span class="sr-only">Toggle Dropdown</span>
</button>
<ul class="dropdown-menu">
<li><a  href="<?php echo base_url();?>/human_resources/employee_forms/overtime_hours/Overtime_hours_orders/compelete_details/<?=$row->id?>"><i class="fa fa-commenting-o" aria-hidden="true"></i> استكمال البيانات</a></li>
<li>  <a data-toggle="modal" data-target="#details_Modal" 
                                onclick="load_page(<?= $row->id ?>);">
                                    <i class="fa fa-list " aria-hidden="true"></i>تفاصيل </a></li>
     <li>
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
                                <?= $link_update ?>
                                        });'>
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>تعديل</a>
                                      </li>
                                             <li>
           
                                             <a onclick='swal({
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
                                        swal("تم الحذف!", "", "success");
                                        window.location="<?php echo base_url(); ?>human_resources/employee_forms/overtime_hours/Overtime_hours_orders/delete_overtime_hours_orders/<?php echo $row->id . '/' . $link_delete; ?>";
                                        });'>
                                    <i class="fa fa-trash"> </i>حذف</a></li>
              
                                                        </ul>
                         </div> 
                         <td>
                          <!-- yara -->
                        </tr>
                        <?php $x++;
                    } ?>
                    </tbody>
                </table>


                <!--------------------------------------------table---------------------------------->


            </div>
        </div>

    </div>
<?php } ?>


<!-- details_Modal -->


<div class="modal fade" id="details_Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 85%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onclick="$('#details_Modal').modal('hide')" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="text-align: center;">التفاصيل </h4>
            </div>
            <div class="modal-body" style="padding: 10px" id="result_page">

            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%;">

                <button
                        type="button" onclick="print_order(document.getElementById('order_id').value)"
                        class="btn btn-labeled btn-purple ">
                    <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعة
                </button>

                <button type="button" class="btn btn-labeled btn-danger " onclick="$('#details_Modal').modal('hide')">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>

            </div>

        </div>
    </div>
</div>

<!-- details_Modal -->


<!--------------------------------------------------------------->
<!--
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->

<script>
    function RemoveMe(valu) {
        $('#' + valu).remove();
        count(1);
    }

</script>

<script>


    function add_row() {

        var a = 1;
        //  var hours =$('#max_hours').val();
        //  if(hours >0 && hours !=''){
        $("#mytable").show();
        var x = document.getElementById('result_pageTable');
        var y = document.getElementById('mytable');
        var len = a++;
        var table_max = y.rows.length;

        var dataString = 'lenth=' + len + '& table_max=' + table_max;

        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>human_resources/employee_forms/overtime_hours/Overtime_hours_orders/add_overtime_hours_work',
            data: dataString,
            dataType: 'html',
            cache: false,
            success: function (html) {
                $("#result_pageTable").append(html);
                // $('#saves').show();
              //  $('#m12hu'+table_max).mdtimepicker();


            }
        });
    }


</script>


<script>

    function GetDiv_emps(div) {
        html = '<div class="col-md-12 no-padding"><table id="js_table_members2" class="table table-striped table-bordered dt-responsive nowrap " >' +
            '<thead><tr class="greentd"><th style="width: 50px;">#</th><th style="width: 50px;"> كود الموظف  </th><th style="width: 50px;"> أسم الموظف  </th>' +
            '<th style="width: 170px;" >الأدارة   </th>' +
            '<th style="width: 170px;" >القسم</th>' +
            '</tr></thead><table><div id="dataMember"></div></div>';
        $("#" + div).html(html);
        $('#js_table_members2').show();
        var oTable_usergroup = $('#js_table_members2').DataTable({
            dom: 'Bfrtip',
            "ajax": '<?php echo base_url(); ?>human_resources/employee_forms/overtime_hours/Overtime_hours_orders/getConnection_emp/',

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


    function Get_emp_Name(obj) {

        console.log(' obj :' + obj.dataset.name + ': ');
        var name = obj.dataset.name;
        var emp_code = obj.dataset.emp_code;
        var edara_id = obj.dataset.edara_id;
        var edara_n = obj.dataset.edara_n;
        var job_title = obj.dataset.job_title;
        var qsm_id = obj.dataset.qsm_id;
        var qsm_n = obj.dataset.qsm_n;
        var adress = obj.dataset.adress;
        var emp_phone = obj.dataset.phone;
        var direct_manager_id_fk = obj.dataset.direct_manager_id_fk;
        var direct_manager_job_title_fk = obj.dataset.direct_manager_job_title_fk;

        document.getElementById('emp_name').value = name;
        //document.getElementById('emp_id_fk').value = obj.value;
        document.getElementById('emp_code').value = emp_code;
        document.getElementById('edara_n').value = edara_n;
        document.getElementById('edara_id_fk').value = edara_id;
        document.getElementById('job_title').value = job_title;
        document.getElementById('qsm_n').value = qsm_n;
        document.getElementById('qsm_id_fk').value = qsm_id;
        if(direct_manager_id_fk!='')
        {
        document.getElementById('direct_manager_id_fk').value = direct_manager_id_fk;
        }
        if(direct_manager_job_title_fk!='')
        {
        document.getElementById('direct_manger_mosama_wazefy').value = direct_manager_job_title_fk;
        }

        $('#myModal_emps').modal('hide')
        // $("#myModal_emps .close").click();


    }

</script>

<script>
    function get_emp_data(valu) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/overtime_hours/Overtime_hours_orders/get_emp_data",
            data: {valu: valu},
            success: function (d) {


                var obj = JSON.parse(d);

                $('#job_title_id_fk').val(obj.degree_id);
                $('#administration3').val(obj.administration);
                $('#department3').val(obj.department);
                $('#emp_id').val(obj.id);
                $('#administration').val(obj.administration);
                $('#department').val(obj.department);
                $('#manger').val(obj.manger);

            }


        });


        $.ajax({
            type: 'post',

            url: "<?php echo base_url();?>human_resources/employee_forms/overtime_hours/Overtime_hours_orders/get_load_page",
            data: {valu: valu},
            success: function (d) {

                $('#load3').html(d);


            }


        });
    }


</script>


<script>

    function count(valu) {

//alert('in');
      //  var start = $('#m12h'+valu).val();
       // var end = $('#m13h'+valu).val();
        //  alert(start);
        //  return;
    var start = $('#from_hour'+valu).val();
        var end = $('#to_hour'+valu).val();
        if (start != '' && end != '') {

            s = start.split(':');
            e = end.split(':');
            var ss = s[s.length - 1].split(' ');
            var ee = e[e.length - 1].split(' ');

            if (ss[ss.length - 1] === 'PM') {
                if (parseInt(s[0]) === 12) {

                } else {
                    s[0] = parseInt(s[0]) + 12;
                }
            }
            if (ee[ee.length - 1] === 'PM') {
                if (parseInt(e[0]) === 12) {
                } else {
                    e[0] = parseInt(e[0]) + 12;
                }
            }
            min = parseInt(e[1]) - parseInt(s[1]);
            console.log('min :' + min + " e[1] :" + e[1] + " s[1] :" + s[1]);
            hour_carry = 0;
            if (min < 0) {
                min += 60;
                hour_carry += 1;
            }
            console.log('min :' + min);
            hour = e[0] - s[0] - hour_carry;
            diff = hour + "." + min;
            console.log('min :' + min + " hours :" + hour + " diff :" + diff);
            $('#num_hours'+valu).val(diff);
            if (diff <= 0) {
                $('#num_hours'+valu).val(0);
            } else {

            }
        }
        var inputs = document.getElementsByClassName('calc'),
            result_page = document.getElementById('total_hours'),
            sum = 0;
        for (var i = 0; i < inputs.length; i++) {
            var ip = inputs[i];
            sum += parseFloat(ip.value) || 0;

        }
        result_page.value = sum;




    }
</script>

<script>
    function load_page(row_id) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/overtime_hours/Overtime_hours_orders/load_details",
            data: {row_id: row_id},
            beforeSend: function () {
                $('#result_page').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#result_page').html(d);
            }
        });
    }
</script>

<script>
    function print_order(row_id) {
        var request = $.ajax({
            // print_resrv -- print_contract
            url: "<?=base_url() . 'human_resources/employee_forms/overtime_hours/Overtime_hours_orders/Print_order'?>",
            type: "POST",
            data: {row_id: row_id},
        });
        request.done(function (msg) {
            var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(msg);
            WinPrint.document.close();
            WinPrint.focus();
            /*  WinPrint.print();
              WinPrint.close();*/
        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });
    }
</script>
<?php if (!isset($_POST['from_profile'])) { ?>

<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>

<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/analogue-time-picker.js"></script>
<script src="<?php echo base_url(); ?>asisst/admin_asset/js/mdtimepicker.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/jquery.form-validator.js"></script>
<?php }?>


<script>
<?php if (!isset($_POST['from_profile'])) { ?>

    $(document).ready(function(){
        //Initializes the time picker
    <?php } ?>
        <?php
        if (isset($result->details) && !empty($result->details)){

        $z = 1;
        ?>
        <?php
        foreach ($result->details as $item){
        $z++;
        ?>
        var  id = '<?= $z ; ?>';
        $('#m12h'+id).mdtimepicker();
       // alert(id);

        <?php
        }

        } else{
            ?>
        $('#m12h1').mdtimepicker();

    <?php
    }
        ?>
      //  alert(id);
      <?php if (!isset($_POST['from_profile'])) { ?>

    });
    <?php } ?>

</script>

<script>
<?php if (!isset($_POST['from_profile'])) { ?>

    $(document).ready(function(){
<?php } ?>


        <?php
        if (isset($result->details) && !empty($result->details)){
        $z = 1;
        foreach ($result->details as $item){
        $z++;
        ?>
        var  id_to = '<?= $z ; ?>';
        $('#m13h'+id_to).mdtimepicker();

        <?php
        }

        } else{
        ?>
        $('#m13h1').mdtimepicker(); //Initializes the time picker

        <?php
        }
        ?>
        <?php if (!isset($_POST['from_profile'])) { ?>

    });
    <?php } ?>

</script>



<?php
if (isset($_POST['from_profile']) && (!empty($_POST['from_profile']))) { ?>
<!-- <script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script> -->
    <script src="<?php echo base_url(); ?>asisst/admin_asset/js/mdtimepicker.js"></script>

    <script src="<?php echo base_url() ?>asisst/admin_asset/js/jquery.form-validator.js"></script>
    <?php         if (!isset($result->details) ){?>

    <script>
        $('#example').DataTable({
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
<?php } ?>
<?php } ?>


<script src="<?php echo base_url() ?>asisst/admin_asset/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/ckeditor/samples/js/sample.js"></script>
<script>
    initSample();
    CKEDITOR.replaceClass = 'ckeditor';
</script>

<script type="text/javascript">
    CKEDITOR.replace('editor2');
    CKEDITOR.add;
    CKEDITOR.config.toolbar = [
        ['Styles', 'Format', 'Font', 'FontSize'],
        '/',
        ['NumberedList', 'BulletedList', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
        ['Image', 'Table', '-', 'Link', 'Flash', 'Smiley', 'TextColor', 'BGColor', 'Source']
    ];
</script>