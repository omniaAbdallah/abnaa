<div class="col-xs-12 ">
    <div class="col-md-6 col-sm-4  ">
        <label class="label  ">اسم المرفق </label>
        <input type="text" name="title" id="title" class="form-control ">
        <input type="hidden" id="hidden_id" name="hidden_id" value="<?= $ezn_sarf_id_fk; ?>">
        <input type="hidden" id="hidden_rkm" name="hidden_rkm" value="<?= $ezn_sarf_id_fk; ?>">
    </div>
    <div class="col-md-2 col-sm-4 padding-4">
        <label class="label"> المرفق</label>
        <input type="file" name="file" id="file" class="form-control" data-validation="reuqired">
    </div>
    <!-- <button type="button" class="btn btn-success save"  style="padding: 6px 12px;"
                            onclick="upload_img(<?= $rkm; ?>)"
                             >حفظ
                    </button> -->
    <div class="col-xs-2 text-center" style="margin-top: 29px;">
        <button type="button" class="btn btn-labeled btn-success " onclick="upload_img(<?= $ezn_sarf_id_fk; ?>)"
                style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
        </button>
    </div>
    <br>
    <br>
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
    <script>
        function upload_img(row) {
            var files = $('#file')[0].files;
            var title = $('#title').val();
            //var row = $('#row').val();
            console.log(title);
            if (files.length == 0) {
                $('#file').css("border", "2px solid #ff0000");

                swal({
                    title: " برجاء ادخال  المرفق ! ",
                    type: "warning",
                    confirmButtonClass: "btn-warning",
                    closeOnConfirm: false
                });
            } else if (title == '') {
                $('#title').css("border", "2px solid #ff0000");
                $('#file').css("border", "2px solid #5cb85c");

                swal({
                    title: " برجاء ادخال   اسم المرفق ! ",
                    type: "warning",
                    confirmButtonClass: "btn-warning",
                    closeOnConfirm: false
                });
            } else {
                $('#title').css("border", "2px solid #5cb85c");
                $('#file').css("border", "2px solid #5cb85c");

                var error = '';
                var form_data = new FormData();
                for (var count = 0; count < files.length; count++) {
                    var name = files[count].name;
                    var extension = name.split('.').pop().toLowerCase();
                    if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg', 'png', 'pdf', 'PNG', 'PDF', 'xls', 'doc', 'docx', 'txt', 'rar']) == -1) {
                        error += "Invalid " + count + " Image File"
                        swal({
                            title: " برجاء التأكد من نوع  المرفق ! ",
                            text:'صورة او ملف pdf',
                            type: "error",
                            confirmButtonClass: "btn-danger",
                            closeOnConfirm: false
                        });
                    } else {
                        form_data.append("files", files[count]);
                        form_data.append("title", title);
                        form_data.append("row", row);
                    }
                }
                if (error == '') {
                    $.ajax({
                        url: "<?php echo base_url(); ?>finance_accounting/box/ezn_sarf/Ezn_sarf_request/add_morfaq", //base_url() return http://localhost/tutorial/codeigniter/
                        method: "POST",
                        data: form_data,
                        contentType: false,
                        cache: false,
                        processData: false,
                        beforeSend: function () {
                            swal({
                                title: "جاري رفع المرفق  ... ",
                                text: "",
                                imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                                showConfirmButton: false,
                                allowOutsideClick: false
                            });
                        },
                        success: function (data) {
                            put_value(row);
                            $('#title').val('');
                            $('#file').val('');
                            swal("تم الحفظ بنجاح !");
                        }
                    });
                }
            }
        }
    </script>
    <script>
        function put_value(rkm) {
            //     $('#hidden_rkm').val(rkm);
          //  alert('sss');
            $.ajax({
                type: 'post',
                data: {rkm: rkm},
                url: "<?php echo base_url();?>finance_accounting/box/ezn_sarf/Ezn_sarf_request/get_attaches",
                beforeSend: function () {
                    $('#result_files').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
                },
                success: function (html) {
                    $("#result_files").html(html);
                }
            });
        }
    </script>
    <script>
        function delete_morfq(id, row) {
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
                            url: '<?php echo base_url() ?>finance_accounting/box/ezn_sarf/Ezn_sarf_request/Delete_attach',
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
                                swal({
                                        title: "تم الحذف!",
                                    }
                                );
                                put_value(row);
                            }
                        });
                    } else {
                        swal("تم الالغاء", "", "error");
                    }
                });
        }
    </script>