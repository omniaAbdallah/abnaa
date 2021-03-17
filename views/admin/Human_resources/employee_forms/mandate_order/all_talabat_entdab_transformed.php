<style type="text/css">
    .mystyle {
        width: 37%;
        height: 34px;
        padding: 6px 6px;
        font-size: 14px;
        line-height: 1.42857143;
        color: #555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
        -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    }
    .mystyle3 {
        width: 9%;
        height: 34px;
        padding: 6px 6px;
        font-size: 14px;
        line-height: 1.42857143;
        color: #555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
        -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    }
    .print_forma {
        /*border:1px solid #73b300;*/
        padding: 15px;
    }
    .piece-box {
        margin-bottom: 12px;
        border: 1px solid #09704e;
        display: inline-block;
        width: 100%;
    }
    .piece-heading {
        background-color: #09704e;
        display: inline-block;
        float: right;
        width: 100%;
        color: #fff;
        padding: 5px;
    }
    .piece-body {
        padding: 10px;
        width: 100%;
        float: right;
    }
    .bordered-bottom {
        border-bottom: 4px solid #9bbb59;
    }
    .piece-footer {
        display: inline-block;
        float: right;
        width: 100%;
        border-top: 1px solid #73b300;
    }
    .piece-heading h5 {
        margin: 4px 0;
    }
    .piece-body h5 {
        margin: 5px 0;
    }
    .piece-box table {
        /*  margin-bottom: 0*/
    }
    .piece-box table th,
    .piece-box table td {
        /*  padding: 2px 8px !important;*/
    }
    table.table_tb tbody td {
        padding: 0;
    }
    h6 {
        font-size: 16px;
        margin-bottom: 3px;
        margin-top: 3px;
    }
    .print_forma table th {
        text-align: right;
    }
    .print_forma table tr th {
        vertical-align: middle;
    }
    .no-padding {
        padding: 0;
    }
    .header p {
        margin: 0;
    }
    .header img {
        height: 120px;
        width: 100%
    }
    .main-title {
        display: table;
        text-align: center;
        position: relative;
        height: 120px;
        width: 100%;
    }
    .main-title h4 {
        display: table-cell;
        vertical-align: bottom;
        text-align: center;
        width: 100%;
    }
    .print_forma hr {
        border-top: 1px solid #73b300;
        margin-top: 7px;
        margin-bottom: 7px;
    }
    .no-border {
        border: 0 !important;
    }
    .gray_background {
        background-color: #eee;
    }
    @media print {
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    }
    .footer img {
        width: 100%;
        height: 120px;
    }
    @page {
        size: A4;
        margin: 20px 0 0;
    }
    .piece-box .table-bordered > thead > tr > th, .piece-box .table-bordered > tbody > tr > th,
    .piece-box .table-bordered > tfoot > tr > th, .piece-box .table-bordered > thead > tr > td,
    .piece-box .table-bordered > tbody > tr > td, .piece-box .table-bordered > tfoot > tr > td {
        border: 1px solid #09704e !important;
        background-color: #fff;
        border-radius: 0 !important;
    }
    .under-line {
        border-top: 1px solid #abc572;
        padding-left: 0;
        padding-right: 0;
    }
    span.valu {
        padding-right: 10px;
        font-weight: 600;
        font-family: sans-serif;
    }
    .under-line .col-sm-2,
    .under-line .col-sm-3,
    .under-line .col-sm-4,
    .under-line .col-sm-5,
    .under-line .col-sm-6,
    .under-line .col-sm-8 {
        border-left: 1px solid #abc572;
    }
    .managment-div-select .btn-group.bootstrap-select {
        width: 85%;
    }
    .help-block.form-error {
        position: absolute;
        top: 27px;
        left: 13%;
    }
    table .help-block.form-error {
        position: relative;
        top: auto;
        left: auto;
    }
    label {
        margin-bottom: 5px !important;
        color: #002542 !important;
        display: block !important;
        text-align: right !important;
        font-size: 16px !important;
        padding: 0 !important;
        height: auto;
    }
    .top-label {
        font-size: 14px;
        font-weight: 500;
        position: relative;
    }
    .green-bg {
        background-color: #09704e !important;
        color: #fff !important;
    }
</style>

<!------------------------------------------------------------------------------------------------------------------------------>
<?php
//if($_SESSION['user_id'] == 19 or $_SESSION['user_id'] == 61){
if (isset($records) && !empty($records)) {
    ?>
    <?php
    if (isset($records) && !empty($records)) {
        ?>
        <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0" width="100%">
            <thead>
            <tr class="greentd visible-md visible-lg">
                <th>م</th>
                <th> رقم الطلب</th>
                <th>اسم الموظف</th>
                <th>جهه الانتداب</th>
                <th> مسؤول الجهه</th>
                <th> عدد ايام الانتداب</th>

               
                  <th>إجراء الطلب</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $x = 1;
            foreach ($records as $row) {
      
                ?>
                <tr>
                    <td><?php echo $x; ?></td>
                    <td><?php echo $row->rkm_talab; ?></td>
                    <td><?php echo $row->emp_name; ?></td>
                    <td><?php echo $row->geha_mandate_name; ?></td>
                    <td><?php echo $row->mandate_name; ?></td>
                    <td><?php echo $row->num_days; ?></td>


                    
                    <td>   <a target="_blank" href="#" title="إجراء وتفاصيل علي الإذن" 
       data-toggle="modal" data-target="#transferModal"   data-backdrop="static" data-keyboard="false"
onclick="GetTransferPage(<?php echo $row->id;?>, <?=$row->level?>)"
   class="btn btn-purple"><i class="fa fa-list"></i></a></td>
                </tr>
                <?php
                $x++;
            }
            ?>
            </tbody>
        </table>
        <?php
    }
    ?>
<?php } 


?>




<div class="modal fade" id="transferModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width:91%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">تفاصيل التحويل</h4>
            </div>

            <form method="post" action="" id="saveAction">
                <div class="modal-body" id="optionearea2">

                </div>
               <div class="modal-footer" style="display: inline-block;width: 100%">

                  <!--   <button type="submit" class="btn btn-labeled btn-success" name="procedure_title_action" value="accept">
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

<!-- details_Modal -->
<div class="modal fade" id="details_Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 85%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onclick="$('#details_Modal').modal('hide')" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="text-align: center;">التفاصيل </h4>
            </div>
            <div class="modal-body" style="padding: 10px " id="result_page">
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%;">
                <button
                        type="button" onclick="print_order(document.getElementById('order_id').value)"
                        class="btn btn-labeled btn-purple">
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
<!-- settingModal  -->
<div class="modal fade" id="settingModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title title_setting "></h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid" id="">
                    <div class="col-sm-12 form-group">
                        <div class="col-sm-12 form-group">
                            <div class="col-sm-3  col-md-3 padding-4 ">
                                <button type="button" class="btn btn-labeled btn-success "
                                        onclick="$('#add_input').show(); "
                                        style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                                    <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>إضافة
                                </button>
                            </div>
                        </div>
                        <div class="col-sm-12 no-padding form-group">
                            <div id="add_input" style="display: none">
                                <div class="col-sm-3  col-md-5 padding-2 ">
                                    <label class="label title_setting  "> </label>
                                    <input type="text" onfocus="$('.add_title').hide();" name="name" id="add_title"
                                           value=""
                                           class="form-control">
                                    <input type="hidden" name="row_setting_id" id="row_setting_id" value="">
                                    <span class="add_title" style="color: red; display: none;">هذا الحقل مطلوب</span>
                                </div>
                                <div class="col-sm-3  col-md-2 padding-4" id="div_add">
                                    <button type="button"
                                            onclick="add_setting($('#add_title').val(),'add_title','output'); "
                                            style="    margin-top: 27px;"
                                            class="btn btn-labeled btn-success" name="save" value="save">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                    </button>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                    </div>
                    <div id="setting_output">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<!-- settingModal  -->
<?php
if (isset($_POST['from_profile']) && (!empty($_POST['from_profile']))) { ?>
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
<script>
    function get_value_badel() {
        var bdal_count_method = $('#bdal_count_method').val();
        var entdab_type = $('#entdab_type').val();
        var emp_id_fk = $('#emp_id_fk').val();
        var cat_manager_id_fk = $('#cat_manager_id_fk').val();
        if (cat_manager_id_fk && bdal_count_method && entdab_type) {
            $.ajax({
                type: 'post',
                url: "<?php echo base_url();?>human_resources/employee_forms/Mandate_orders/get_value_badel",
                data: {
                    bdal_count_method: bdal_count_method,
                    entdab_type: entdab_type,
                    emp_id_fk,
                    emp_id_fk,
                    cat_manager_id_fk: cat_manager_id_fk
                },
                beforeSend: function () {
                    notify = $.notify('<strong>جاري</strong> تحميل فيمة البدل ...', {
                        placement: {
                            from: "top",
                            align: "center"
                        },
                        offset: 20,
                        spacing: 10,
                        delay: 1000 * 15,
                        z_index: 1031,
                        allow_dismiss: false,
                        showProgressbar: true
                    });
                },
                success: function (response) {
                    var value = JSON.parse(response).value;
                    notify.update({
                        'type': 'success',
                        'message': '<strong>تم </strong> تحميل قيمة البدل',
                        'progress': 80
                    });
                    resp_value = parseFloat(value);
                    $('#pay_count').val(resp_value);
                    get_total_bdal_value();
                }
            });
        }
    }
    function get_total_bdal_value() {
        var num_days = $('#num_days').val();
        var pay_count = $('#pay_count').val();
        total = parseFloat(pay_count) * parseInt(num_days);
        $('#total').val(total);
    }
</script>
<script>
    function get_emp_data(valu) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/Vacation/get_emp_data",
            data: {valu: valu},
            success: function (d) {
                var obj = JSON.parse(d);
                $('#job_title_id_fk').val(obj.degree_id);
                $('#administration3').val(obj.edara_id);
                $('#department3').val(obj.qsm_id);
                $('#emp_id').val(obj.id);
                $('#edara_id').val(obj.edara_id);
                $('#qsm_id').val(obj.qsm_id);
                $('#manger').val(obj.manger);
                $('#num').val(obj.order);
                //   alert(d);
                $('#degree_id3').val(obj.degree_id);
                $('#manage').val(obj.edara_id);
                $('#depart').val(obj.qsm_id);
                $('#emp_rakm').val(obj.emp_code);
            }
        });
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/Vacation/get_load_page",
            data: {valu: valu},
            success: function (d) {
                $('#load3').html(d);
            }
        });
    }
</script>
<script>
    function add_option(valu) {
        var id = '<?php echo $last_id + 1;?>';
        var x = $('#destination').val();
        $('#destination').append('<option value=' + id + ' selected>' + valu + '</option>');
        $('.selectpicker').selectpicker('refresh');
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/Mandate_orders/add_option",
            data: {valu: valu},
            success: function (d) {
                $('.but2').attr('disabled', 'true');
            }
        });
    }
</script>
<script>
    function get_peroid() {
        var end_date = $('#to_date').val();
        var start_date = $('#from_date').val();
        var a = new Date(end_date);
        var x = new Date(start_date);
        if ($('#from_date').val() == '') {
            return;
        }
        if ($('#to_date').val() == '') {
            return;
        }
        if (start_date > end_date) {
            alert("يجب ان يكون تاريخ النهايه اكبر من البدايه");
            return;
        }
        // var weekday = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/Vacation/get_date",
            data: {start_date: start_date, end_date: end_date},
            success: function (d) {
                var obj = JSON.parse(d);
                $('#num_days').val(obj.day);
                $('#bdal_count_method').val()
                get_badl_value($('#bdal_count_method').val());
            }
        });
    }
</script>
<script>
    function get_badl_value(valu) {
        alert(valu);
        /*     alert(val(res[1]));
         var badal_valuess =  $('#badal_value_part_in').val();
             alert(badal_valuess);
             */
        if (valu == 1) {
            $('#pay_count').val($('#badal_value_part_in').val());
            $('#total').val($('#badal_value_part_in').val());
        } else if (valu == 2) {
            $('#pay_count').val($('#badal_value_full_in').val());
            $('#total').val($('#badal_value_full_in').val());
        }
        /* var badal_valuess =  $('#badal_value_part_in').val();
         alert(badal_valuess);
         if ($('#num_days').val() == '') {
             alert("من فضلك ادخل مده الانتداب");
             return;
         }
         var res = valu.split("-");
         var num_day = $('#num_days').val();
         $('#pay_count').val(res[1]);
         $('#total').val(res[1] * num_day);
         */
    }
</script>
<script>
    function get_type() {
        if ($('#entdab_type').val() == '') {
            swal("من فضلك ادخل  نوع الانتداب", '', 'error');
            $('#mandate_distance').val('');
            return;
        } else {
            if ($('#mandate_distance').val() < 70 && $('#entdab_type').val() == 1) {
                swal("من فضلك ادخل   قيمه أكبر من 70 كيلو", '', 'error');
                $('#mandate_distance').val('');
            } else if ($('#mandate_distance').val() > 70 && $('#entdab_type').val() == 2) {
                swal("من فضلك ادخل   قيمه اكبر من 70", '', 'error');
                $('#mandate_distance').val('');
            }
        }
    }
</script>
<!-- uuu -->
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
            "ajax": '<?php echo base_url(); ?>human_resources/employee_forms/Mandate_orders/getConnection_emp',
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
        /*10-11-20-om*/
        var cat_manager_id_fk = obj.dataset.cat_manager_id_fk;
        document.getElementById('cat_manager_id_fk').value = cat_manager_id_fk;
        var manger = obj.dataset.manger;
        document.getElementById('manger').value = manger;
        var adress = obj.dataset.adress;
        var emp_phone = obj.dataset.phone;
        var times = obj.dataset.times;
        var badal_value_part_in = obj.dataset.badal_value_part_in;
        var badal_value_full_in = obj.dataset.badal_value_full_in;
        document.getElementById('emp_name').value = name;
        document.getElementById('emp_id_fk').value = obj.value;
        document.getElementById('emp_code').value = emp_code;
        document.getElementById('edara_n').value = edara_n;
        document.getElementById('edara_id_fk').value = edara_id;
        document.getElementById('job_title').value = job_title;
        document.getElementById('qsm_n').value = qsm_n;
        document.getElementById('qsm_id_fk').value = qsm_id;
        document.getElementById('times').value = times;
        document.getElementById('badal_value_part_in').value = badal_value_part_in;
        document.getElementById('badal_value_full_in').value = badal_value_full_in;
        $("#myModal_emps .close").click();
        get_value_badel();
    }
</script>
<script>
    function load_page(row_id) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/Mandate_orders/load_details",
            data: {row_id: row_id},
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
            url: "<?=base_url() . 'human_resources/employee_forms/Mandate_orders/Print_order'?>",
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
<!--  -->
<script>
    function get_details_geha_type() {
        // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/Mandate_orders/load_geha",
            beforeSend: function () {
                $('#myDiv_gehat').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#myDiv_gehat').html(d);
            }
        });
    }
</script>
<script>
    function getTitle_geha_type(value, id) {
        $('#geha_mandate_id_fk').val(id);
        $('#geha_mandate_name').val(value);
        $('#gehatModal').modal('hide');
    }
</script>
<script>
    function add_geha_type(value) {
        $('#div_update_geha_type').hide();
        $('#div_add_geha_type').show();
        //  alert(value);
        if (value != 0 && value != '') {
            var dataString = 'geha_type=' + value;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>human_resources/employee_forms/Mandate_orders/add_geha_type',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    //  $('#reason').val(' ');
                    $('#geha_name').val('');
                    //  $('#Modal_esdar').modal('hide');
                    swal({
                            title: "تم الاضافه بنجاح!",
                        }
                    );
                    get_details_geha_type();
                }
            });
        } else {
            swal({
                    title: "برجاء ادخال البيانات!",
                }
            );
        }
    }
</script>
<script>
    function update_geha_type(id) {
        var id = id;
        $('#geha_input').show();
        $('#div_add_geha_type').hide();
        $('#div_update_geha_type').show();
        $.ajax({
            url: "<?php echo base_url() ?>human_resources/employee_forms/Mandate_orders/getById_geha_type",
            type: "Post",
            dataType: "html",
            data: {id: id},
            success: function (data) {
                var obj = JSON.parse(data);
                //console.log(obj);
                console.log(obj.name);
                $('#geha_name').val(obj.name);
            }
        });
        $('#update_geha_type').on('click', function () {
            var geha_name = $('#geha_name').val();
            $.ajax({
                url: "<?php echo base_url() ?>human_resources/employee_forms/Mandate_orders/update_geha_type",
                type: "Post",
                dataType: "html",
                data: {geha_name: geha_name, id: id},
                success: function (html) {
                    //  alert('hh');
                    $('#geha_name').val('');
                    $('#div_update_geha_type').hide();
                    $('#div_add_geha_type').show();
                    // $('#Modal_esdar').modal('hide');
                    swal({
                            title: "تم التعديل بنجاح!",
                        }
                    );
                    get_details_geha_type();
                }
            });
        });
    }
</script>
<script>
    function delete_geha_type(id) {
        swal({
                title: "هل انت متاكد من الحذف ؟",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "نعم",
                cancelButtonText: "لا",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        type: 'post',
                        url: '<?php echo base_url() ?>human_resources/employee_forms/Mandate_orders/delete_geha_type',
                        data: {id: id},
                        dataType: 'html',
                        cache: false,
                        success: function (html) {
                            swal({
                                    title: "تم الحذف بنجاح!",
                                }
                            );
                            get_details_geha_type();
                        }
                    });
                } else {
                    swal("تم الالغاء", "", "error");
                }
            });
    }
</script>
<script>
    function get_details_geha_mandate() {
        // $('#pop_rkm').text(rkm);
        var id = $('#geha_mandate_id_fk').val();
        console.log(id);
        if (id == '') {
            $('#Modal_geha_morsel').modal('hide');
            swal({
                title: "من فضلك اختر الجهه اولا ",
                type: "warning",
                confirmButtonClass: "btn-warning",
                closeOnConfirm: false
            });
        } else {
            $.ajax({
                type: 'post',
                url: "<?php echo base_url();?>human_resources/employee_forms/Mandate_orders/load_morsel",
                data: {id: id},
                beforeSend: function () {
                    $('#myDiv_gehaa').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
                },
                success: function (d) {
                    $('#myDiv_gehaa').html(d);
                }
            });
        }
    }
</script>
<script>
    function getTitle_geha_morsel(id, value) {
        $('#mandate_id_fk').val(id);
        $('#mandate_name').val(value);
        $('#Modal_geha_morsel').modal('hide');
    }
</script>
<script>
    function get_details_safms2ol() {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/mandate_setting/Gehat/load_safms2ol",
            beforeSend: function () {
                $('#myDiv_safms2ol').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#myDiv_safms2ol').html(d);
            }
        });
    }
</script>
<script>
    function add_mostlm() {
        $('#div_update_mostlm').hide();
        $('#div_add_mostlm').show();
        var geha_id = $('#geha_mandate_id_fk').val();
        var mostlm_name = $('#mostlm_name').val();
        var safms2ol_name = $('#safms2ol_name').val();
        var safms2ol_fk = $('#safms2ol_fk').val();
        if (geha_id != 0 && geha_id != '' && mostlm_name != '' && safms2ol_fk != '') {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>human_resources/employee_forms/Mandate_orders/add_ms2ol',
                data: {
                    geha_id: geha_id,
                    mostlm_name: mostlm_name,
                    safms2ol_name: safms2ol_name,
                    safms2ol_fk: safms2ol_fk
                },
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $('#mostlm_name').val('');
                    $('#safms2ol_name').val('');
                    $('#safms2ol_fk').val('');
                    swal({
                            title: "تم الاضافه بنجاح!",
                        }
                    );
                    $('#myDiv_gehaa').html(html);
                }
            });
        } else {
            swal({
                    title: "برجاء ادخال البيانات!",
                }
            );
        }
    }
</script>
<script>
    function update_mostlm(id) {
        var id = id;
        $('#update_mostalm').prop("onclick", null).off("click");
        $('#mostlm_input').show();
        $('#div_add_mostlm').hide();
        $('#div_update_mostlm').show();
        $.ajax({
            url: "<?php echo base_url() ?>human_resources/employee_forms/Mandate_orders/getById_mostlm",
            type: "Post",
            dataType: "html",
            data: {id: id},
            success: function (data) {
                var obj = JSON.parse(data);
                // console.log(obj.name);
                $('#mostlm_name').val(obj.name);
                $('#safms2ol_name').val(obj.safms2ol_name);
                $('#safms2ol_fk').val(obj.safms2ol_fk);
            }
        });
        $('#update_mostalm').on('click', function () {
            var geha_id = $('#geha_mandate_id_fk').val();
            var mostlm_name = $('#mostlm_name').val();
            var safms2ol_name = $('#safms2ol_name').val();
            var safms2ol_fk = $('#safms2ol_fk').val();
            $.ajax({
                url: "<?php echo base_url() ?>human_resources/employee_forms/Mandate_orders/update_ms2ol",
                type: "Post",
                dataType: "html",
                data: {
                    row_id: id,
                    geha_id: geha_id,
                    mostlm_name: mostlm_name,
                    safms2ol_name: safms2ol_name,
                    safms2ol_fk: safms2ol_fk
                },
                success: function (html) {
                    $('#mostlm_name').val('');
                    $('#safms2ol_name').val('');
                    $('#safms2ol_fk').val('');
                    $('#div_update_mostlm').hide();
                    $('#div_add_mostlm').show();
                    // $('#Modal_esdar').modal('hide');
                    $('#update_mostalm').prop("onclick", null).off("click");
                    swal({
                            title: "تم التعديل بنجاح!",
                        }
                    );
                    $('#myDiv_gehaa').html(html);
                }
            });
        });
    }
</script>
<script>
    function delete_mostlm(row_id, geha_id) {
        swal({
                title: "هل انت متاكد من الحذف ؟",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "نعم",
                cancelButtonText: "لا",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: "<?php echo base_url() ?>human_resources/employee_forms/Mandate_orders/delete_mostlm",
                        type: "Post",
                        dataType: "html",
                        data: {row_id: row_id, geha_id: geha_id},
                        success: function (html) {
                            $('#myDiv_gehaa').html(html);
                            swal({
                                    title: "تم الحذف بنجاح!",
                                }
                            );
                        }
                    });
                } else {
                    swal("تم الالغاء", "", "error");
                }
            });
    }
</script>
<!-- yaraaa -->
<script>
    function change_type_setting(id, title, title_fk, title_n) {
        var edara_n = $('#edara_n').val();
        $('.title_setting').text(title);
        $('#type_setting').data('id', id);
        $('#type_setting').data('title', title);
        $('#type_setting').data('title_fk', title_fk);
        $('#type_setting').data('title_n', title_n);
        $('#type_setting').data('edara_n', edara_n);
    }
</script>
<script>
    function add_setting(value, title, div) {
        var type = $('#type_setting').data("id");
        var type_name = $('#type_setting').data("title");
        var row_id = $('#row_setting_id').val();
        if (value != 0 && value != '') {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url()?>human_resources/employee_forms/Mandate_orders/add_setting',
                data: {value: value, type: type, type_name: type_name, row_id: row_id},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $('#' + title).val(' ');
                    $('#row_setting_id').val('');
                    $('#setting_output').html(html);
                    load_settigs();
                }
            });
        } else {
            swal({
                title: 'من فضلك تأكد من الحقول الناقصه !',
                type: 'warning',
                confirmButtonText: 'تم'
            });
        }
    }
</script>
<script>
    function load_settigs() {
        var type = $('#type_setting').data("id");
        var type_name = $('#type_setting').data("title");
        if (type_name != '') {
            $('#settingModal').modal('show');
            $.ajax({
                type: 'post',
                url: '<?php echo base_url()?>human_resources/employee_forms/Mandate_orders/load_settigs',
                data: {type: type, type_name: type_name},
                dataType: 'html',
                cache: false,
                beforeSend: function () {
                    $('#setting_output').html(
                        '<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>'
                    );
                },
                success: function (html) {
                    $('#setting_output').html(html);
                }
            });
        } else {
            swal({
                title: 'من فضلك حدد  اولا !',
                type: 'warning',
                confirmButtonText: 'تم'
            });
        }
    }
</script>
<script>
    function GetName(id, name) {
        var title_fk = $('#type_setting').data("title_fk");
        var title_n = $('#type_setting').data("title_n");
        /// id title function
        $('#' + title_fk).val(id);
        $('#' + title_n).val(name);
        $('#settingModal').modal('hide');
    }
</script>
<script type="text/javascript">
    Date.prototype.addDays = function (days) {
        var date = new Date(this.valueOf());
        time1 = Math.abs(date.getTime());
        time2 = 1000 * 3600 * 24 * days;
        total = time1 + time2;
        date = new Date(total);
        return date;
    }
</script>
<script>
    function get_date() {
        if ($('#end_date').val() == '' || $('#start_date').val() == '') {
            return 1;
        }
        var a = new Date($('#end_date').val());
        var x = new Date($('#start_date').val());
        diffDays = '';
        if (a >= x) {
            var timeDiff = Math.abs(a.getTime() - x.getTime());
            diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
            var date = new Date(document.getElementById("end_date").value);
            day = date.addDays(1).getDate();
            month = date.addDays(1).getMonth() + 1;
            year = date.addDays(1).getFullYear();
            document.getElementById("num_days").value = diffDays + 1;
            get_total_bdal_value();
            return diffDays + 1;
        } else {
            swal({
                title: 'لا يجب أن يسبق تاريخ نهاية الإجازة تاريخ بدايته!',
                type: 'warning',
                confirmButtonText: 'تم'
            });
            document.getElementById("end_date").value = '';
            document.getElementById("num_days").value = '';
            document.getElementById("num_days").value = diffDays;
            return diffDays;
        }
    }
</script>
<!-- yara19-11 -->
<!-- get_makan_distance -->
<script>
    function get_makan_distance() {
        var valu = $("#makan_id_fk").find('option:selected').attr('distance_value');
        $('#mandate_distance').val(valu);
    }
</script>
<!-- yara19-11 -->



<script>

        function GetTransferPage(valu, level) {

            if (valu != 0 && valu != '') {
                var dataString = 'id=' + valu;
                $.ajax({
                    type: 'post',
                    url: '<?php echo base_url() ?>human_resources/employee_forms/Mandate_order_request/GetTransferPage',
                    data: dataString,
                    dataType: 'html',
                    cache: false,
                    success: function (html) {
                        $("#optionearea2").html(html);
                    }
                });
            }
        }

</script>