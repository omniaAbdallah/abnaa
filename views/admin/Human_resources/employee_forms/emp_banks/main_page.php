<?php if (!isset($_POST['from_profile'])) { ?>

<div class="col-sm-12 no-padding ">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"> طلب تغيير الحساب البنكي </h3>
        </div>
        <div class="panel-body">
            <?php } ?>
            <?php if (isset($allData) && !empty($allData) && ($_SESSION['role_id_fk'] == 3)) { ?>
                <div class="col-md-4 col-md-offset-4  btn btn-success  " style="margin-bottom: 15px;font-size: 18px;">
                    بيانات الحساب البنكي الحالى
                </div>
                <?php echo form_open_multipart('human_resources/employee_forms/emp_banks/Emp_banks_c/change_banks_employee/' . $allData->emp_code, array('class' => 'change_banks', 'id' => 'change_banks'));
                echo '<input type="hidden"  name="change"  id="add" value="add">'; ?>
                <?php $this->load->view('admin/Human_resources/employee_forms/emp_banks/past_pank_data'); ?>

                <div class="col-md-4 col-md-offset-4  btn btn-success  " style="margin-bottom: 15px;font-size: 18px;">
                    بيانات الحساب البنكي الجديد
                </div>
                <div id="bank_edite">
                    <?php $this->load->view('admin/Human_resources/employee_forms/emp_banks/edite_banks'); ?>
                </div>
                <?php echo form_close();
            } ?>
            <?php if (!isset($_POST['from_profile'])) { ?>

        </div>
    </div>
</div>

<?php } ?>
<div id="ezn_Modal_body_tabel">
    <?php $this->load->view('admin/Human_resources/employee_forms/emp_banks/load_details_banks'); ?>
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
<div class="modal fade" id="modal-img" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%;">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" onclick="$('#modal-img').modal('hide')"
                        aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <img id="image_view" src="<?php echo base_url(); ?>asisst/web_asset/img/logo.png"
                     width="100%" height="">
            </div>
        </div>
    </div>
</div>


<script>
    function show_img(src) {
        var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
        WinPrint.document.write('<img src="' + src + '" style="width: 100%; height:  100%;">');
        WinPrint.document.close();
        WinPrint.focus();
    }

    function checkLength(length) {
        var len = length.length;
        if (len < 24) {
            // alert(" رقم الحساب لابد الايقل عن 24 حرف او رقم");
            swal({
                title: " رقم الحساب لابد الايقل عن 24 حرف او رقم",
                type: 'error',
                confirmButtonText: 'تم'
            });
            document.getElementById("buttons").setAttribute("disabled", "disabled");

        }
        if (len > 24) {
            // alert(" رقم الحساب لابد ألا يزيد عن 24 حرف او رقم");
            swal({
                title: ' رقم الحساب لابد ألا يزيد عن 24 حرف او رقم ',
                type: 'error',
                confirmButtonText: 'تم'
            });
            document.getElementById("buttons").setAttribute("disabled", "disabled");

        }
        if (len == 24) {
            document.getElementById("buttons").removeAttribute("disabled", "disabled");
        }
    }
</script>
<script>
    function change_banks(emp_id) {
        // var all_inputs = $(' [estktat3 data-validation="required"]');
        var all_inputs = $(' #change_banks [data-validation="required"]');
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
        var len = $('#bank_account_num').val().length;
        if (len < 24) {
            text_valid += " رقم الحساب لابد الايقل عن 24 حرف او رقم";
            valid = 0;
            $('#bank_account_num').css("border-color", "red");

        }
        if (len > 24) {
            text_valid += ' رقم الحساب لابد ألا يزيد عن 24 حرف او رقم ';
            valid = 0;
            $('#bank_account_num').css("border-color", "red");

        }
        var form_data = new FormData();
        var files = $('#userfile')[0].files;
        form_data.append("userfile", files[0]);
        var serializedData = $('.change_banks').serializeArray();
        $.each(serializedData, function (key, item) {
            form_data.append(item.name, item.value);
        });
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>human_resources/employee_forms/emp_banks/Emp_banks_c/change_banks_employee',
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
                        title: "جاري الإرسال  الطلب ..... ",
                        text: "",
                        imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                        showConfirmButton: false,
                        allowOutsideClick: false
                    });
                }
            },
            success: function (html) {
                swal({
                    title: 'تم اضافة بنجاح ',
                    type: 'success',
                    confirmButtonText: 'تم'
                });
                var all_inputs_set = $('  .banks');
                all_inputs_set.each(function (index, elem) {
                    console.log(elem.id + $(elem).val());
                    $(elem).val('');
                    //get_add();
                });
                var date = new Date();
                order_date.value = date.getFullYear().toString() + '-' + (date.getMonth() + 1).toString().padStart(2, 0) +
                    '-' + date.getDate().toString().padStart(2, 0);
                // get_bank();
                get_details_banks(emp_id);

            }
        });
    }
</script>
<script>
    function edite_bank(id) {
        $.ajax({
            type: 'post',
            data: {id: id},
            url: "<?php echo base_url();?>human_resources/employee_forms/emp_banks/Emp_banks_c/edite_bank",
            beforeSend: function () {
                $('#bank_edite').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#bank_edite').html(d);
            }
        });
    }
</script>
<script>
    function suspend_bank(id) {
        $.ajax({
            type: 'post',
            data: {id: id,from_suspend:1},
            url: "<?php echo base_url();?>human_resources/employee_forms/emp_banks/Emp_banks_c/edite_bank",
            beforeSend: function () {
                $('#bank_edite').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#bank_edite').html(d);
            }
        });
    }
</script>
<script>
    function edite_banks(emp_id) {
        // var all_inputs = $(' [estktat3 data-validation="required"]');
        var all_inputs = $(' #change_banks [data-validation="required"]');
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
        var files = $('#userfile')[0].files;
        form_data.append("userfile", files[0]);
        var serializedData = $('.change_banks').serializeArray();
        $.each(serializedData, function (key, item) {
            form_data.append(item.name, item.value);
        });
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>human_resources/employee_forms/emp_banks/Emp_banks_c/edite_banks_employee',
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
                        title: "جاري تعديل الطلب ..... ",
                        text: "",
                        imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                        showConfirmButton: false,
                        allowOutsideClick: false
                    });
                }
            },
            success: function (html) {
                swal({
                    title: 'تم التعديل بنجاح  ',
                    type: 'success',
                    confirmButtonText: 'تم'
                });
                $('#bank_edite').html(html);

                /*  var all_inputs_set = $(' .banks ');
                  all_inputs_set.each(function (index, elem) {
                      console.log(elem.id + $(elem).val());
                      $(elem).val('');
                      //get_add();
                  });
                  var order_date = document.querySelector('#order_date');
                  var date = new Date();
                  order_date.value = date.getFullYear().toString() + '-' + (date.getMonth() + 1).toString().padStart(2, 0) +
                      '-' + date.getDate().toString().padStart(2, 0);*/
                get_details_banks(emp_id);
                // get_bank();

            }
        });
    }
</script>
<script>
    function get_code_bank(id) {
        var valu = $("#bank_id_fk" + id).find('option:selected').attr('bank_code');
        $('#bank_code2' + id).val(valu);
    }
</script>
<script>
    function deleteFinanceEmp(id, emp_id) {
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
                        url: '<?php echo base_url() ?>human_resources/employee_forms/emp_banks/Emp_banks_c/deleteFinanceEmp',
                        data: {id: id, emp_id: emp_id},
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
                            get_details_banks(emp_id);
                        }
                    });
                } else {
                    swal("تم الالغاء", "", "error");
                }
            });
    }
</script>
<script>
    function get_bank() {
        $('#modal_header').text('طلب تغيير الحساب البنكي');
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/emp_banks/Emp_banks_c/change_bank_form",
            data: {from_profile: 1},
            beforeSend: function () {
                $('#Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#Modal_body').html(d);
                $.validate({
                    validateHiddenInputs: true // for live search required
                });
            }
        });
    }
</script>
<script>
    function get_details_banks(emp_id) {
        //  $('#show_details_estktat3').show();
        $.ajax({
            type: 'post',
            data: {emp_id: emp_id},
            url: "<?php echo base_url();?>human_resources/employee_forms/emp_banks/Emp_banks_c/load_details_banks",
            beforeSend: function () {
                $('#ezn_Modal_body_tabel').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body_tabel').html(d);
            }
        });
    }
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
            "ajax": '<?php echo base_url(); ?>human_resources/employee_forms/emp_banks/Emp_banks_c/getConnection_emp/',
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
        var qsm_id = obj.dataset.qsm_id;
        var qsm_n = obj.dataset.qsm_n;
        document.getElementById('emp_n').value = name;
        document.getElementById('emp_id').value = obj.value;
        document.getElementById('emp_code').value = emp_code;
        $('#emp_id_fk').val(obj.value);
        document.getElementById('edara_n').value = edara_n;
        document.getElementById('mosma_wazefy_n').value = job_title;
        document.getElementById('qsm_n').value = qsm_n;
        // $("#myModal_emps")modal.('hide');
        $("#myModal_emps .close").click();
        get_emp_bank(obj.value);
    }
</script>
<script>
    function get_emp_bank(emp_id) {
        $('#modal_header').text('طلب تغيير الحساب البنكي');
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/emp_banks/Emp_banks_c/get_bank_form",
            data: {emp_id: emp_id},
            beforeSend: function () {
                $('#Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#Modal_body').html(d);
                $.validate({
                    validateHiddenInputs: true // for live search required
                });
            }
        });
    }
</script>
<!-- send_all -->
<!-- send_al -->
<script>
    function send_all(id, emp_id) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/emp_banks/Emp_banks_c/send_all",
            data: {id: id, emp_id: emp_id},
            success: function (msg) {
                $('#send_all').html('  <span style="font-size: medium;background: green;" class=" badge badge-success">تم  الاعتماد</span>');
                //$('#send_all').html('<span style="color:green;">تم  الاعتماد</span>');
            }
        });
    }
</script>
<script>
    function print_eqrar(id) {
        var request = $.ajax({
            // print_resrv -- print_contract
            url: "<?=base_url() . 'human_resources/employee_forms/emp_banks/Emp_banks_c/print_eqrar'?>",
            type: "POST",
            data: {id: id},
        });
        request.done(function (msg) {
            var WinPrint = window.open('', '', 'width=1800,height=1100,toolbar=0,scrollbars=0,status=0');
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