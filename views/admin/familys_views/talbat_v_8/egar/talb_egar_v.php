<div class="col-sm-12 no-padding">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
        <div class="panel-heading">
            <h3 class="panel-title"><?= $title ?></h3>
        </div>
        <div class="panel-body">
            <?php
            if (!empty($result)) {
                echo form_open_multipart('family_controllers/talbat/Talb_egar/update/' . $id, array('id' => 'myform'));
                $talab_date = $result['talab_date_ar'];
                $file_num = $result['file_num'];
                $mokadem_name = $result['mokadem_name'];
            } else {
                echo form_open_multipart('family_controllers/talbat/Talb_egar/insert', array('id' => 'myform'));
                $talab_date = date('Y-m-d');
                $file_num = "";
                $mokadem_name = "";
                $responsable_name = '';
            }
            ?>
            <div class="col-sm-12 form-group">
                <div class="col-sm-1  col-md-1 padding-4 ">
                    <label class="label  "> رقم الطلب </label>
                    <input type="text" name="" class="form-control" disabled="">
                </div>

                <div class="col-sm-3  col-md-2 padding-4 ">
                    <label class="label  "> تاريخ الطلب </label>
                    <input type="date" name="talab_date" class="form-control "
                           value="<?php echo $talab_date; ?>">
                </div>
                <div class="col-sm-3  col-md-2 padding-4 ">
                    <label class="label  ">رقم الملف </label>
                    <input type="text" name="file_num" id="file_num" value="<?php echo $file_num; ?>"
                           ondblclick="$('#myModal').modal();load_table()" data-validation="required"
                           readonly
                           style="width: 81%;float: right"
                           class="form-control " value="" onblur="GetFamilyNum($(this).val());">
                    <button type="button" data-toggle="modal" data-target="#myModal"
                            onclick="load_table()"
                            class="btn btn-success btn-next" style="float: left;">
                        <i class="fa fa-plus"></i></button>
                    <input type="hidden" name="mother_national_num" id="mother_national_num" value="">
                    <input type="hidden" name="father_card" id="father_card" value="">
                </div>
                <div class="col-sm-3  col-md-3 padding-4 ">
                    <label class="label  "> مقدم الطلب </label>
                    <input type="text" name="mokadem_name" id="mokadem_name" value="<?php echo $mokadem_name; ?>"
                           class="form-control ">
                </div>
            </div>
            <div class="col-md-12 " id="Details">
                <?php if (!empty($result)) { ?>

                    <div class="print_forma  no-border    col-xs-12 allpad-12">
                        <div class="col-xs-12">
                            <div class="personality">
                                <div class="col-xs-12 no-padding">
                                    <div class="form-group col-sm-12 col-xs-12">
                                        <table class="table table-bordered ">
                                            <thead>
                                            <tr>
                                                <th class="info">إسم الأسرة</th>
                                                <td class="text-center"><?php echo $result['osra_name'] ?></td>
                                                <th class="info">رقم الملف</th>
                                                <td class="text-center"><?php echo $result['file_num'] ?></td>
                                                <th class="info"> الفئة</th>
                                                <td class="text-center"><?php echo $result['fe2a_n'] ?></td>
                                            </tr>
                                            <tr>
                                                <th class="info"> الحي</th>
                                                <td class="text-center"><?php echo $result['hai_name'] ?></td>
                                                <th class="info">تاريخ التسجيل</th>
                                                <td class="text-center"><?php echo $result['tasgel_date'] ?></td>
                                                <th class="info">عدد أفراد الأسرة</th>
                                                <td class="text-center"><?php echo $result['num_afrad']; ?></td>
                                            </tr>
                                            <tr>
                                                <th class="info"> هاتف</th>
                                                <td class="text-center"><?php echo $result['contact_mob'] ?></td>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                        <input type="hidden" name="osra_name"
                                               value="<?php echo $result['osra_name'] ?>">
                                        <input type="hidden" name="fe2a_n"
                                               value="<?php echo $result['file_num'] ?>">
                                        <input type="hidden" name="hai_id" value="<?php echo $result['fe2a_n'] ?>">
                                        <input type="hidden" name="hai_name"
                                               value="<?php echo $result['hai_name'] ?>">
                                        <input type="hidden" name="tasgel_date"
                                               value="<?php echo $result['tasgel_date'] ?>">
                                        <input type="hidden" name="num_afrad"
                                               value="<?php echo $result['num_afrad']; ?>">
                                        <input type="hidden" name="contact_mob"
                                               value="<?php echo $result['contact_mob'] ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 form-group 4 text-center">
                            <input type="hidden" name="save" id="save" value="save">
                            <?php if (!empty($result)) {
                                $onclick = '';
                                $type = 'submit';
                            } else {
                                $type = 'button';
                                $onclick = 'add()';
                            } ?>
                            <button type="<?php echo $type; ?>" onclick="<?php echo $onclick; ?>"
                                    class="btn btn-labeled btn-success " name="save" value="save">
                                <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                            </button>
                        </div>
                    </div>

                <?php } ?>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>
<div class="modal fade" id="myModalInfo_family" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">افراد الاسرة</h4>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <table class="table ">
                        <tbody id="family_member_body">
                        <tr>
                            <td><input type="radio" name="member" onclick="$('#responsable_name').val()"></td>
                            <td></td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <button type="button" class="btn btn-danger" style="float: left;" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<?php
/*
echo'<pre>';
print_r($records);*/
if (isset($records) && $records != null) { ?>
    <div class="col-sm-12 no-padding">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">
                <h3 class="panel-title"> طلبات سداد إيجار</h3>
            </div>
            <div class="panel-body">
                <table id="" class="example table table-bordered table-striped" role="table">
                    <thead>
                    <tr class="greentd">
                        <th width="2%">م</th>
                        <th class="text-center">رقم الطلب</th>
                        <th class="text-center"> تاريخ الطلب</th>
                        <th class="text-center">وقت الطلب</th>
                        <th class="text-center">رقم الملف</th>
                        <th class="text-center">إسم الأب</th>
                        <th class="text-center">الطلب مقدم بإسم</th>
                        <th class="text-center">مستقبل الطلب</th>
                        <th class="text-center">حالة الطلب</th>

                        <th class="text-center">الإجراء</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $x = 1;
                    foreach ($records as $value) {
                        if ($value->suspend == 1) {
                            $halet_talab = 'تم القبول ';
                            $halet_talab_color = '#75f5a2';
                            $halet_talab_icon = '<i style="font-size:17px" class="fa fa-check-circle-o" aria-hidden="true"></i>';
                        } elseif ($value->suspend == 2) {
                            $halet_talab = 'تم الرفض ';
                            $halet_talab_color = '#f15858';
                            $halet_talab_icon = '<i style="font-size:17px" class="fa fa-thumbs-o-down" aria-hidden="true"></i>';
                        } elseif ($value->suspend == 4) {
                            $halet_talab = 'تم الإعتماد ';
                            $halet_talab_color = '#6ec015';
                            $halet_talab_icon = '<i style="font-size:17px" class="fa fa-thumbs-o-up" aria-hidden="true"></i>';

                        } else {
                            $halet_talab = 'جاري';
                            $halet_talab_color = '#c2c4c5';
                            $halet_talab_icon = '<i style="font-size:17px" class="fa fa-circle-o-notch" aria-hidden="true"></i>';
                        }

                        ?>
                        <tr>
                            <td><?= $x++ ?></td>
                            <td><?= $value->rkm_talab ?></td>
                            <td><?= $value->talab_date_ar ?></td>
                            <td style="background: #e691b8;color: #000000;font-weight: bold;"><?= $value->talab_time ?></td>

                            <td style="background: #74b9b1;"><?= $value->file_num ?></td>
                            <td style="background: #74b9b1;"><?= $value->osra_name ?></td>

                            <td style="background: #74b9b1;"><?php echo $value->mokadem_name; ?></td>

                            <td style="background: khaki;"><?= $value->emp_add_n ?></td>
                            <td style="background:<?= $halet_talab_color ?>;"> <?= $halet_talab_icon ?> <?= $halet_talab ?></td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a type="button"
                                       class="btn btn-sm btn-info" data-toggle="modal"
                                       data-target="#detailsModal" onclick="GetTransferPage(<?= $value->id ?>)"
                                       style="padding: 3px 5px;line-height: 1;">
                                        <i class="glyphicon glyphicon-list"></i>
                                    </a>
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
                                            window.location="<?= base_url() . 'family_controllers/talbat/Talb_egar/edit/' . $value->id ?>";
                                            });'>
                                        <i class="fa fa-pencil"> </i></a>
                                    <?php if ($_SESSION['role_id_fk'] == 1) { ?>
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
                                                setTimeout(function(){window.location="<?= base_url() . 'family_controllers/talbat/Talb_egar/Delete/' . $value->id ?>";}, 500);
                                                });'>
                                            <i class="fa fa-trash"> </i></a>

                                    <?php } else { ?>
                                    <?php } ?>
                                    <a target="_blank" onclick="print_contrat(<?=$value->id?>)"
                                       title="طباعه"><i class="fa fa-print"></i></a>
                                    <!-- attached -->
                                    <a onclick="get_attach_data(<?= $value->id ?>);"
                                        data-toggle="modal" data-target="#myModal_attache">
                                        <i class="fa fa-cloud-upload"></i>
                                    </a>

                                    <!-- attached -->

                                </div>
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
<!-- myModal_attache -->
<div class="modal" id="myModal_attache" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     data-wow-duration="0.5s">
    <div class="modal-dialog" role="document" style="width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">
                    أضافة مرفقات
                </h4>
            </div>
            <div class="modal-body">
                <div id="result_attach"></div>
            </div>
            <div class="modal-footer" style="display: inline-block; width: 100%;">
                <button type="button" class="btn btn-danger btn-labeled" data-dismiss="modal"><span class="btn-label"><i
                                class="fa fa-remove"></i></span>إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<!-- myModal_attache -->
<div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">التفاصيل</h4>
            </div>
            <div class="modal-body col-sm-12" id="detail_div">
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <button type="button" class="btn btn-danger" style="float: left;" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">ملفات الأسر </h4>
            </div>
            <div class="modal-body" id="json_table">
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<script>
    function load_table() {
        var html;
        html = '<div class="col-md-12"><table id="my_table" class="table table-striped table-bordered dt-responsive nowrap " >' +
            '<thead><tr><th style="width: 30px;">م</th><th style="width: 50px;"> رقم الملف </th><th style="width: 80px;"> إسم رب الأسرة </th><th style="width: 50px;" >رقم الهوية</th>' +
            '<th style="width: 80px;"> إسم الأم </th><th style="width: 50px;"> رقم الهوية </th></tr></thead><table><div id="dataMember"></div></div>';
        $("#json_table").html(html);
        $('#my_table').show();
        var oTable_usergroup = $('#my_table').DataTable({
            dom: 'Bfrtip',
            "ajax": '<?php echo base_url(); ?>family_controllers/talbat/Talb_egar/getFamilyTable',
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
    }
</script>
<script>
    function getFile_num(value) {
        $('#file_num').val(value);
        console.log($('#radio' + value).attr('data-father'));
        $('#mokadem_name').val($('#radio' + value).attr('data-father'));
        $('#mother_national_num').val($('#radio' + value).attr('data-mother'));
        $('#father_card').val($('#radio' + value).attr('data-father-card'));
        $('#myModal').modal('hide');
        GetNamozegDiv();
    }
</script>
<script>
    function GetNamozegDiv() {
        var file_num = $('#file_num').val();
        if (file_num != 0 && file_num != '') {
            var dataString = 'file_num=' + file_num;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>family_controllers/talbat/Talb_egar/getDetails',
                data: $('#myform').serialize() + "&" + dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $("#Details").html(html);
                    /* function replaceMulti(haystack, needle, replacement)
                      {
                          return haystack.split(needle).join(replacement);
                      }
                      someString = $('.content_view').text();
                    //  console.log(replaceMulti(someString, 'أبنـاء', 'dog'));
                      $('.content_view').text(replaceMulti($('.content_view').text(), 'X', $('#father_name').val()));
                      $('.content_view').text(replaceMulti($('.content_view').text(), 'B', $('#file_num').val()));
                       $('.content_view').text( replaceMulti($('.content_view').text(), 'C', $('#father_card').val()));
  */
                }
            });
        }
    }
</script>
<script>
    function GetFamilyNum(code) {
        var dataString = 'file_num=' + code;
        if (code != '') {
            $.ajax({
                type: 'post',
                url: '<?=base_url()?>family_controllers/namazegs/Namazeg/getFamilyNum',
                data: dataString,
                cache: false,
                success: function (json_data) {
                    var JSONObject = JSON.parse(json_data);
                    console.log(JSONObject['final_suspend']);
                    /* if( parseInt(JSONObject['final_suspend'])!== 4  &&
                         parseInt(JSONObject['file_status'])!== 1&&
                         parseInt(JSONObject['final_suspend']) !==' '){*/
                    //  setTimeout(function(){
                    if (
                        code != ' ' &&
                        parseInt(JSONObject['file_status']) == 4
                    ) {
                        Swal.fire({
                            type: 'error',
                            title: 'عفواً',
                            text: 'هذا الملف غير نشط !!',
                            footer: ''
                        }).then((result) => {
                            if (result.value) {
                                $('#father_name').val("");
                                $('#file_num').val("");
                                $('#mother_national_num').val("");
                                $('#father_card').val("");
                            }
                        });
                    } else {
                        $('#father_name').val(JSONObject['father_full_name']);
                        $('#mother_national_num').val(JSONObject['mother_national_num']);
                        $('#father_card').val(JSONObject['father_national_num']);
                    }
                    // }, 100);
                }
            });
        }
    }
</script>
<script>
    function details(value) {
        if (value != 0 && value != '') {
            var dataString = 'rkm=' + value;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>family_controllers/talbat/Talb_egar/getDetailsDiv',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $("#detail_div").html(html);
                }
            });
        }
    }
</script>
<!-- myModal_attache -->
<script>
    function get_attach_data(id) {
        var dataString = "id=" + id;
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>family_controllers/talbat/Talb_egar/add_picture',
            data: dataString,
            dataType: 'html',
            cache: false,
            success: function (html) {
                $("#result_attach").html(html);
            }
        });
    }
</script>
<script>
    function GetTransferPage(value) {
        if (value != 0 && value != '') {
            var dataString = 'id=' + value;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>family_controllers/talbat/Talb_egar/GetTransferPage',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $("#detail_div").html(html);
                }
            });
        }
    }
</script>
<script>
    function print_contrat(id) {
        var request = $.ajax({
            // print_resrv -- print_contract
            url: "<?=base_url() . 'family_controllers/talbat/Talb_egar/print/'?>" + id,
            type: "get",
        });
        request.done(function (msg) {
            var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(msg);
            WinPrint.focus();

        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });
    }
</script>