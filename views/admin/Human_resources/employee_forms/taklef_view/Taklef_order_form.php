<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
    <div class="panel-heading">
        <h3 class="panel-title">تكليف </h3>
    </div>
    <div class="panel-body">
        <?php
        $type_to_arr = array('emp' => "الموظف", 'job' => "المسمى الوظيفي");
        if ((isset($one_data)) && (!empty($one_data))) {
            $rkm = $one_data['rkm'];
            $date_ar = $one_data['date_ar'];
            $type_to = $one_data['type_to'];
            $from_emp_name = $one_data['from_data']['employee'];
            $from_emp_id = $one_data['from_data']['id'];
            $from_edara_n = $one_data['from_data']['edara_n'];
            $from_qsm_n = $one_data['from_data']['qsm_n'];
            $from_mosma_wazefy_n = $one_data['from_data']['mosma_wazefy_n'];

            $from_date = date('Y-m-d', $one_data['from_date']);
            $to_date = date('Y-m-d', $one_data['to_date']);
            $start_date = date('Y-m-d', $one_data['start_date']);
            $other = $one_data['other'];
            $need_mony = $one_data['need_mony'];
            $value = $one_data['value'];
            $job_descib = base_url() . 'uploads/human_resources/employee_forms/taklef_orders/' . $one_data['job_descib'];
            echo form_open_multipart(base_url() . 'human_resources/employee_forms/taklef/Taklef_order/update_order/' . $one_data['id']);


        } else {

            $rkm = $last_rkm;
            $date_ar = date('Y-m-d');
            $type_to = '';
            $from_emp_name = '';
            $from_emp_id = '';
            $from_edara_n = '';
            $from_qsm_n = '';
            $from_mosma_wazefy_n = '';
            $from_date = date('Y-m-d');
            $to_date = date('Y-m-d');
            $start_date = date('Y-m-d');
            $other = ' ';
            $need_mony = ' ';
            $value = 0;
            $job_descib = '';
            $to_emp_name = '';
            $to_emp_id = '';
            $to_edara_n = '';
            $to_qsm_n = '';
            $to_mosma_wazefy_n = '';
            $to_job_id = '';

            echo form_open_multipart(base_url() . 'human_resources/employee_forms/taklef/Taklef_order');

        } ?>

        <div class="col-md-12">
            <div class="form-group col-md-1 col-sm-6 col-xs-12 padding-4">
                <label>رقم القرار </label>
                <input type="number" name="rkm" class="form-control " id="rkm" readonly value="<?= $rkm ?>"/>
            </div>
            <div class="form-group col-md-2 col-sm-6 col-xs-12 padding-4">
                <label>تاريخ القرار</label>
                <input type="date" name="date_ar" class="form-control " data-validation="required" id="date_ar"
                       value="<?= $date_ar ?>"/>
            </div>
            <div class="form-group col-md-3 col-sm-6 col-xs-6 padding-4">
                <label>اسم الموظف</label>
                <input name="emp_name" id="emp_name1" class="form-control"
                       style="width:88%; float: right;" readonly value="<?= $from_emp_name ?>">
                <input type="hidden" name="from_emp_id" id="emp_id_fk1" value="<?= $from_emp_id ?>">
                <button type="button" data-toggle="modal" data-target="#myModal_emps"
                        class="btn btn-success btn-next" style="float: left;" onclick="GetDiv_emps('myDiv_emp',1)">
                    <i class="fa fa-plus"></i></button>
            </div>

            <div class="form-group col-md-3 col-sm-6 col-xs-6 padding-4">
                <label> الأدارة </label>
                <input name="edara_n" id="edara_n1" class="form-control"
                       value="<?= $from_edara_n ?>" readonly>
            </div>
            <div class="form-group col-md-3 col-sm-6 col-xs-6 padding-4">
                <label> القسم</label>
                <input name="qsm_n" id="qsm_n1" class="form-control"
                       value="<?= $from_qsm_n ?>" readonly>
            </div>
            <div class="form-group col-md-3 col-sm-6 col-xs-6 padding-4">
                <label> المسمى الوظيفي</label>
                <input name="job_title" id="job_title1" class="form-control"
                       value="<?= $from_mosma_wazefy_n ?>" readonly>
            </div>
            <div class="form-group col-md-2 col-sm-6 col-xs-12 padding-4">

                <label> الفئة </label>
                <select name="type_to" class="form-control " data-validation="required" id="type_to"
                        onchange="set_data(this.value)">
                    <option value=" "> اختر</option>
                    <?php foreach ($type_to_arr as $key => $item) { ?>
                        <option value="<?= $key ?>" <?php if ($key == $type_to) {
                            echo 'selected';
                        } ?>> <?= $item ?></option>
                    <?php } ?>
                    <!-- <option value="emp"> الموظف</option>
                     <option value="job"> مسمى وظيفي</option>-->
                </select>
            </div>
            
                  <?php
            $display_emp = 'none';
            $display_job = 'none';
            $data_required_emp = '';
            $data_required_job = '';
            if (isset($one_data) && (!empty($one_data))) {
                switch ($one_data['type_to']) {
                    case 'emp':
                        $display_emp = 'block';
                        $display_job = 'none';
                        $data_required_emp = 'data-validation="required"';
                        $data_required_job = '';

                        $to_emp_name = $one_data['to_data']['employee'];
                        $to_emp_id = $one_data['to_data']['id'];
                        $to_edara_n = $one_data['to_data']['edara_n'];
                        $to_qsm_n = $one_data['to_data']['qsm_n'];
                        $to_mosma_wazefy_n = $one_data['to_data']['mosma_wazefy_n'];

                        $to_job_id = '';

                        break;
                    case 'job':
                        $display_emp = 'none';
                        $display_job = 'block';
                        $data_required_emp = '';
                        $data_required_job = 'data-validation="required"';
                        $to_emp_name = '';
                        $to_emp_id = '';
                        $to_edara_n = '';
                        $to_qsm_n = '';
                        $to_mosma_wazefy_n = '';

                        $to_job_id = $one_data['to_data']['id'];

                        break;
                    default:
                        break;
                }
            }
            ?>
            <div id="type_to_emp" style="display:<?= $display_emp ?>;">
                <div class="form-group col-md-4 col-sm-6 col-xs-6 padding-4">
                    <label>اسم الموظف</label>
                    <input name="to_emp_name" id="emp_name2" class="form-control"
                           style="width:90%; float: right;" readonly
                           value="<?= $to_emp_name ?>" <?= $data_required_emp ?>>
                    <input type="hidden" name="to_emp_id" id="emp_id_fk2" value="<?= $to_emp_id ?>">
                    <button type="button" data-toggle="modal" data-target="#myModal_emps"
                            class="btn btn-success btn-next" style="float: left;" onclick="GetDiv_emps('myDiv_emp',2)">
                        <i class="fa fa-plus"></i></button>
                </div>
                <div class="form-group col-md-3 col-sm-6 col-xs-6 padding-4">
                    <label> الأدارة </label>
                    <input name="to_edara_n" id="edara_n2" class="form-control"
                           value="<?= $to_edara_n ?>" readonly>
                </div>
                <div class="form-group col-md-4 col-sm-6 col-xs-6 padding-4">
                    <label> القسم</label>
                    <input name="to_qsm_n" id="qsm_n2" class="form-control"
                           value="<?= $to_qsm_n ?>" readonly>
                </div>
                <div class="form-group col-md-4 col-sm-6 col-xs-6 padding-4">
                    <label> المسمى الوظيفي</label>
                    <input name="to_mosma_wazefy_n" id="job_title2" class="form-control"
                           value="<?= $to_mosma_wazefy_n ?>" readonly>
                </div>
            </div>
            <div id="type_to_job" style="display:<?= $display_job ?>;">
                <div class="form-group col-md-3 col-sm-6 col-xs-12">
                    <label> المسمى الوظيفي </label>
                    <select name="to_job" class="form-control selectpicker"
                        <?= $data_required_job ?> id="to_job"
                            data-show-subtext="true" data-live-search="true">
                        <?php if (isset($jobs_title) && (!empty($jobs_title))) {
                            foreach ($jobs_title as $one_job) { ?>
                                <option value="<?= $one_job['id'] ?>" <?php if ($one_job['id'] == $to_job_id) {
                                    echo 'selected';
                                } ?>> <?= $one_job['title'] ?></option>
                            <?php }
                        } ?>

                    </select>
                </div>
            </div>
            
            
            
            <div class="form-group col-md-2 col-sm-6 col-xs-12 padding-4">
                <label> من تاريخ </label>
                <input type="date" name="from_date" class="form-control " data-validation="required" id="from_date"
                       value="<?= $from_date ?>"/>
            </div>
            <div class="form-group col-md-2 col-sm-6 col-xs-12 padding-4">
                <label> الى تاريخ </label>
                <input type="date" name="to_date" class="form-control " data-validation="required" id="to_date"
                       value="<?= $to_date ?>"/>
            </div>
           
            <div class="form-group col-md-2 col-sm-6 col-xs-12 padding-4">
                <label> يترتب على ذلك لإستحقاقات مالية </label>
                <select name="need_mony" class="form-control " data-validation="required" id="need_mony"
                        onchange="if (this.value == 'yes'){
                            $('#value').removeAttr('disabled');$('#value').removeAttr('data-validation');}else {
                         $('#value').attr('disabled','disabled');$('#value').attr('data-validation','required');
                        }">
                    <option value=" "> اختر</option>
                    <option value="yes" <?php
                    $value_constran = 'disabled data-validation="required"';
                    if ($need_mony == 'yes') {
                        echo "selected";
                        $value_constran = 'data-validation="required" ';
                    } ?>> نعم
                    </option>
                    <option value="no" <?php if ($need_mony == 'no') {
                        echo "selected";
                        $value_constran = 'disabled  ';
                    } ?>>لا
                    </option>
                </select>
            </div>
            <div class="form-group col-md-1 col-sm-6 col-xs-12 padding-4">
                <label>القيمة </label>
                <input type="number" name="value" class="form-control " <?= $value_constran ?> id="value"
                       value="<?= $value ?>"/>
            </div>
            <div class="form-group col-md-2 col-sm-6 col-xs-12 padding-4">
                <label>إعتبار من تاريخ </label>
                <input type="date" name="start_date" class="form-control " data-validation="required" id="start_date"
                       value="<?= $start_date ?>"/>
            </div>

       <div class="form-group col-md-2 col-sm-6 col-xs-12 padding-4">
                <label> الوصف الوظيفي (المهام) </label>
               <input type="hidden" name="job_descib" class="form-control "  id="job_descib"
                       style="width: 85%;float: right"/>
                <button style="width:100%" type="button" data-toggle="modal" data-target="#myModal_file"
                        class="btn btn-success btn-next" style="float: left;"
                        onclick="set_file_url('<?= $job_descib ?>')">
                    <i class="fa fa-eye"></i> إضغط للعرض</button>
            </div>
            <div class="form-group col-md-5 col-sm-6 col-xs-12 padding-4">
                <label> مهام اخرى </label>
                <input type="text" name="other" class="form-control "  id="other"
                       value="<?= $other ?>"/>
            </div>

            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-labeled btn-success" id="save" name="order_save" value="save">
                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                </button>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>
<div class="panel panel-default ">
    <div class="panel-heading">
        <h3 class="panel-title"> طلبات التكليف </h3>
    </div>
    <div class="panel-body">

        <?php if (isset($all_data) && (!empty($all_data))) { ?>
            <table class="table table-bordered example table-responsive">
                <thead>
                <tr>
                    <th> م</th>
                    <th> رقم القرار</th>
                    <th> تاريخ القرار</th>
                    <th>اسم الموظف</th>
                    <th>الوظيفة المكلف بها</th>
                  
                    <th> من تاريخ</th>
                    <th> إلي تاريخ</th>
                    <th>إستحقاقات مالية</th>
                    <th> الإجراء</th>
                     <th>الحالة</th>
                </tr>
                </thead>
                <tbody>
                <?php $x = 1;
                foreach ($all_data as $datum) { ?>
                    <tr>
                        <td><?= $x++; ?></td>
                        <td><?= $datum['rkm'] ?></td>
                        <td><?= $datum['date_ar'] ?></td>
                       <!-- <td><?php if (key_exists($datum['type_to'], $type_to_arr)) {
                                echo $type_to_arr[$datum['type_to']];
                            } else {
                                echo 'غير محدد';
                            } ?></td>-->
                            <td></td>
                        <td><?= date('Y-m-d', $datum['from_date']) ?></td>
                        <td><?= date('Y-m-d', $datum['to_date']) ?></td>
                        <td>--</td>
                            <td>--</td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-warning">إجراءات</button>
                                <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#"><i class="fa fa-print" aria-hidden="true"></i> طباعة القرار </a></li>
                                    
                                    
                                    <li>
                                        <a href="<?php echo base_url(); ?>/human_resources/employee_forms/taklef/Taklef_order/add_filles/<?php echo $datum['id']; ?>">
                                            <i class="fa fa-commenting-o" aria-hidden="true"></i> إضافة مرفقات
                                            </a></li>
                                    <li><a onclick="get_details(<?= $datum['id'] ?>)" aria-hidden="true"
                                           data-toggle="modal" data-target="#myModal_det">
                                            <i class="fa fa-search" aria-hidden="true"></i>التفاصيل</a></li>
                                    <li>
                                        <a onclick='swal({
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
                                                window.location="<?= base_url() . 'human_resources/employee_forms/taklef/Taklef_order/update_order/' . $datum['id'] ?>";
                                                });'>
                                            <i class="fa fa-pencil"> </i>تعديل</a>
                                    </li>
                                    <li>
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
                                                window.location="<?= base_url() . 'human_resources/employee_forms/taklef/Taklef_order/delete_order/' . $datum['id'] ?>";
                                                });'>
                                            <i class="fa fa-trash"> </i>حذف</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                        <td>
                        <span class="label label-success">تم الإعتماد</span>
                    <span class="label label-success">جاري</span>
                     </td>
                    </tr>

                <?php } ?>
                </tbody>

                </thead></table>
        <?php } ?>
    </div>
</div>

<div class="modal fade" id="myModal_emps" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        onclick="$('#myModal_emps').modal('hide')"
                        aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body">
                <div id="myDiv_emp"></div>
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <button type="button" class="btn btn-danger"
                        style="float: left;" onclick="$('#myModal_emps').modal('hide')">
                    إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal_file" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onclick="$('#myModal_file').modal('hide')" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body">
                <div id="myDiv_file">

                    <iframe id="frame_pdf" src="" style="width: 100%; height:  640px;" frameborder="0">
                    </iframe>
                </div>
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <button type="button" class="btn btn-danger"
                        style="float: left;" onclick="$('#myModal_file').modal('hide')">
                    إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal_det" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 90%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;
                </button>
                <h4 class="modal-title"> التفاصيل :<span id="pop_rkm"></span></h4>
            </div>
            <div class="modal-body">
                <div id="details"></div>
            </div>
            <div class="modal-footer" style=" display: inline-block;width: 100%;">
                <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>

<script>
    function GetDiv_emps(div, from) {
        html = '<div class="col-md-12 no-padding"><table id="js_table_members2" class="table table-striped table-bordered dt-responsive nowrap " >' +
            '<thead><tr class="info"><th style="width: 50px;">#</th><th style="width: 50px;"> كود الموظف  </th><th style="width: 50px;"> أسم الموظف  </th>' +
            '<th style="width: 170px;" >الأدارة   </th>' +
            '<th style="width: 170px;" >القسم</th>' +
            '</tr></thead><table><div id="dataMember"></div></div>';
        $("#" + div).html(html);
        $('#js_table_members2').show();
        if (from == 1) {
            var from_id = 0;
        } else {
            var from_id = $("#from_emp_id1").val();
        }
        console.log("from_id ::" + from_id);
        /* "ajax": '<?php echo base_url(); ?>human_resources/employee_forms/taklef/Taklef_order/getConnection_emp/',*/
        var oTable_usergroup = $('#js_table_members2').DataTable({
            dom: 'Bfrtip',
            "ajax": {
                "url": '<?php echo base_url(); ?>human_resources/employee_forms/taklef/Taklef_order/getConnection_emp/',
                "type": "POST",
                "data": {
                    "from_id": from_id,
                    "from": from
                },

            },

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
    function Get_emp_Name(obj, from) {
        console.log(' obj :' + obj.dataset.name + ': ');
        var name = obj.dataset.name;
        var emp_code = obj.dataset.emp_code;
        var edara_id = obj.dataset.edara_id;
        var edara_n = obj.dataset.edara_n;
        var job_title = obj.dataset.job_title;
        var qsm_id = obj.dataset.qsm_id;
        var qsm_n = obj.dataset.qsm_n;
        document.getElementById('emp_name' + from).value = name;
        document.getElementById('emp_id_fk' + from).value = obj.value;
        // document.getElementById('emp_code').value = emp_code;
        document.getElementById('edara_n' + from).value = edara_n;
        // document.getElementById('edara_id_fk').value = edara_id;
        document.getElementById('job_title' + from).value = job_title;
        document.getElementById('qsm_n' + from).value = qsm_n;
        //document.getElementById('qsm_id_fk').value = qsm_id;
        // $("#myModal_emps")modal.('hide');
        $("#myModal_emps .close").click();
    }
</script>

<script>

    function set_data(value) {

        if (value == 'emp') {
            $('#type_to_emp').show();
            $('#type_to_job').hide();
            $('#emp_name2').attr('data-validation', 'required');
            $('#to_job').removeAttr('data-validation');
        } else if (value == 'job') {
            $('#type_to_emp').hide();
            $('#type_to_job').show();
            get_jobs_title();
            $('#to_job').attr('data-validation', 'required');
            $('#emp_name2').removeAttr('data-validation');

        }

    }

    function get_jobs_title() {
        var notify;
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/taklef/Taklef_order/get_jobs_title",
            beforeSend: function () {
                notify = $.notify('<strong>جاري</strong> تحميل المسميات الوظفية...', {
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
                notify.update({
                    'type': 'success',
                    'message': '<strong>تم </strong> تحميل المسميات الوظفية',
                    'progress': 80
                });
                var data = JSON.parse(response);
                var options = '';

                for (var i = 0; i < data.length; i++) {
                    var select = '';
                     if (data[i].id === '<?=$to_job_id?>') {
                        select = 'selected';
                    }
                    var option = ' <option value="' + data[i].id + '" ' + select + '> ' + data[i].title + '</option>';
                    options += option;
                }
                $('#to_job').html(options);
                $('.selectpicker').selectpicker("refresh");

            }
        });
    }
</script>

<script>
    function get_details(row_id) {
        // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/taklef/Taklef_order/load_details",
            data: {row_id: row_id},
            beforeSend: function () {
                $('#details').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#details').html(d);
            }
        });
    }
</script>

<script>
    function set_file_url(file_url) {
        $('#frame_pdf').attr('src', file_url);
    }
</script>