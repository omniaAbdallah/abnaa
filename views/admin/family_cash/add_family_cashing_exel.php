<style>

    .form-group .help-block.form-error {
        display: block !important;
        position: unset !important;

    }
    td .fa {
        background-color: unset;
        padding: unset;
    }
</style>

<style>
    .loader {
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid #3498db;
        width: 140px;
        height: 140px;
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


    input[type=radio] {
        height: 20px;
        width: 20px;
    }

    label.label-green {
        height: auto;
        line-height: unset;
        font-size: 16px !important;
        font-weight: 600 !important;
        text-align: right !important;
        margin-bottom: 0;
        background-color: transparent;
        color: #002542;
        border: none;
        padding-bottom: 0;
        font-weight: bold;
    }

    .half {
        width: 100% !important;
        float: right !important;
    }

    .input-style {
        border-radius: 0px;
        border-right: 1px solid #eee;
    }

    .form-group {
        margin-bottom: 0px;
    }

    .i-check {
        margin: 5px 5px;
        display: inline-block;
    }

    td .fa-list {
        padding: 2px 7px;
        font-size: 12px;
        line-height: 1.5;
        background-color: green;
        color: #fff;
        border-radius: 2px;
    }

    td .fa-paperclip {
        padding: 2px 7px;
        font-size: 12px;
        line-height: 1.5;
        background-color: #0966c5;
        color: #fff;
        border-radius: 2px;
    }

    span.label-success {
        color: white;
        background-color: #308204;
        border: 0;
        padding: 2px 4px;
    }

</style>

<div class="col-xs-12">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title; ?> </h3>
        </div>
        <div class="panel-body">
            <!-------------------------------------------------------------------------------------->
            <?php if (isset($sarf_data)) {
                echo form_open_multipart("FamilyCashing/import_file/" . $sarf_data["sarf_num"],array('id','import_form'));
                $out["deisabled"] = "disabled";
                if ($sarf_data["method_type"] == 3) {
                    $out["deisabled_bank"] = "disabled=''";
                    $out["readonly_bank"] = "readonly=''";
                } else {
                    $out["deisabled_bank"] = "";
                    $out["readonly_bank"] = "";
                }
                $out['input'] = 'UPDATE';
                $out['input_title'] = 'تعديل ';
            } else {
                echo form_open_multipart("FamilyCashing/import_file",array('id','import_form'));
                $out["deisabled"] = "";
                $out["deisabled_bank"] = "disabled=''";
                $out["readonly_bank"] = "readonly=''";
                $out['input'] = 'ADD';
                $out['input_title'] = 'حفظ ';
            } ?>
            <div class="col-xs-12">
                <div class="form-group col-md-1 col-sm-4 padding-4">
                    <label class="label ">رقم الصرف </label>
                    <input type="text" name="sarf_num" id="sarf_num" value="<?php if (isset($sarf_data)) {
                        echo $sarf_data["sarf_num"];
                    } else {
                        echo $last_sarf + 1;
                    } ?>" class="form-control  " placeholder="ادخل البيانات " readonly="">
                </div>
                <div class="form-group col-md-2 col-sm-4 padding-4">
                    <label class="label ">تاريخ الصرف </label>
                    <input type="date" name="sarf_date" value="<?php if (isset($sarf_data)) {
                        echo $sarf_data["sarf_date_ar"];
                    } else {
                        echo date("Y-m-d", time());
                    } ?>" class="form-control   " data-validation="required">
                </div>
                <div class="form-group col-md-2 col-sm-4 padding-4">
                    <label class="label ">طريقة الصرف </label>
                    <select name="method_type" id="method_type"
                            class="form-control " data-validation="required" aria-required="true" tabindex="-1"
                            aria-hidden="true">
                        <?php // $method_type=array("1"=>"بنكى","2"=>"شيك","3"=>"نقدى","4"=>"تحويله بنكية")?>
                        <?php $method_type = array("2" => "شيك", "4" => "تحويل") ?>
                        <option value="">إختر</option>
                        <?php $x = 1;
                        foreach ($method_type as $key => $value) {
                            $selected = "";
                            if (isset($sarf_data)) {
                                if ($key == $sarf_data["method_type"]) {
                                    $selected = "selected";
                                }
                            } ?>
                            <option value="<?= $key ?>" <?= $selected ?> ><?= $value ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group col-md-3 col-sm-4 padding-4">
                    <label class="label ">بند المساعدة </label>
                    <select name="bnod_help_id_fk" class="form-control " data-validation="required"
                            aria-required="true" tabindex="-1" aria-hidden="true">
                        <option value="">إختر</option>
                        <?php $x = 1;
                        foreach ($bnod_help as $row) {
                            $selected = "";
                            if (isset($sarf_data)) {
                                if ($row->id == $sarf_data["bnod_help_fk"]) {
                                    $selected = "selected";
                                }
                            } ?>
                            <option value="<?= $row->id ?>" <?= $selected ?>><?= $row->title ?></option>
                            <?php $x++;
                        } ?>
                    </select>
                </div>


                <div class="form-group col-md-3 col-sm-4 padding-4">
                    <label class="label ">عبارة عن </label>
                    <input type="text" id="about" name="about" class="form-control "/>
                </div>


                <?php $months = array("1" => "يناير", "2" => "فبراير", "3" => "مارس", "4" => "أبريل", "5" => "مايو",
                    "6" => "يونيو", "7" => "يوليو", "8" => "أغسطس", "9" => "سبتمبر", "10" => "أكتوبر",
                    "11" => "نوفمبر", "12" => "ديسمبر"); ?>
                <div class="form-group  col-md-1 col-sm-4 padding-4 col-xs-12">
                    <label class="label ">خلال شهر</label>
                    <select name="mon_melady" class="selectpicker form-control "
                            data-show-subtext="true" data-live-search="true" data-validation="required"
                            aria-required="true">
                        <option value="">اختر</option>
                        <?php foreach ($months as $key => $value) {
                            $selected = "";
                            if (isset($sarf_data)) {
                                if ($key == $sarf_data["mon_melady"]) {
                                    $selected = "selected";
                                }
                            } ?>
                            <option value="<?php echo $key; ?>" <?= $selected ?> ><?php echo $value; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-md-3 col-sm-4 padding-4">
                    <label class="label "> الملف </label>
                    <input type="file" data-validation="required,extension" data-validation-allowing="xls,xlsx"
                           accept=".xls,.xlsx" id="file_exel" name="file_exel"
                           class="form-control form-control "/>
                </div>
            </div>

            <?php if (isset($sarf_details) && !empty($sarf_details)) { ?>
                <div class="col-sm-12">
                    <table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                           width="100%">
                        <thead>
                        <tr class="greentd">
                            <th class="text-center">م</th>
                            <th class="text-center">رقم ملف الاسرة</th>
                            <th class="text-center">رقم السجل المدنى</th>
                            <th class="text-center">الأسرة</th>
                            <th class="text-center">عدد الأفراد</th>
                            <th class="text-center">أرملة</th>
                            <th class="text-center">يتيم</th>
                            <th class="text-center">مستفيد</th>
                            <th class="text-center">إجمالى</th>
                            <th class="text-center">الإجراء</th>
                        </tr>
                        </thead>
                        <tbody class="text-center" id="tbody_update">
                        <?php $x = 1;
                        foreach ($sarf_details as $row) { ?>
                            <tr>
                                <td><?= $x++; ?></td>
                                <td><?= $row->file_num ?></td>
                                <td><?= $row->mother_national_num_fk ?></td>
                                <td><?= $row->mother_name ?></td>
                                <td><?= $row->all_num ?></td>
                                <td><?= $row->mother_num ?></td>
                                <td><?= $row->young_num ?></td>
                                <td><?= $row->adult_num ?></td>
                                <td><?= $row->value ?></td>
                                <td><a class="btn btn-danger btn-sm" onclick="delete_row(this,'<?= $row->id ?>');">
                                        <i class="fa fa-trash" aria-hidden="true"></i></a></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php } ?>
            <div class="col-xs-12 text-center ">
                <button type="submit" class="btn btn-labeled btn-success " name="<?php echo $out['input'] ?>"
                        value="<?php echo $out['input'] ?>" id="submit_but">
                    <span class="btn-label"><i
                                class="glyphicon glyphicon-floppy-disk"></i></span><?php echo $out['input_title'] ?>
                </button>

            </div>
            <!---------------------------------------->
            <?php echo form_close() ?>

            <div class="col-md-12">
                <table id="user_data" class="table table-bordered table-striped">
                    <thead>
                    <tr class="greentd">
                        <th class="text-center">م</th>
                        <th class="text-center">رقم الصرف</th>
                        <th class="text-center">بند المساعدة</th>
                        <th class="text-center">تاريخ الصرف</th>
                        <th class="text-center">ألية الصرف</th>
                        <th class="text-center">عبارة عن</th>
                        <th class="text-center">خلال شهر</th>
                        <th class="text-center">الإجمالي</th>
                        <th class="text-center">التفاصيل</th>


                        <th class="text-center">الاجراء</th>


                        <th class="text-center">حالة الصرف</th>

                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade " id="modal-sm-data" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-success modal-lg " role="document" style="width:95%;">
        <div class="modal-content ">
            <div class="modal-header ">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="opacity: 0.9;">
                    <span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">تفاصيل الصرف </h3>
            </div>
            <div class="modal-body ">
                <div id="option_details">

                </div>
            </div>
            <div class="modal-footer " style="display: inline-block; width: 100%;">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>

    </div>

</div>
<div class="modal fade " id="modal-attach-data" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-success modal-lg " role="document">
        <div class="modal-content ">
            <div class="modal-header ">
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span></button>-->
                <h1 class="modal-title">المرفقات </h1>
            </div>
            <div class="modal-body ">
                <div id="option_attach">

                </div>
            </div>
            <div class="modal-footer " style="display: inline-block; width: 100%;">

                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>

    var dataTable;
    document.addEventListener('DOMContentLoaded', function () {
        // $.noConflict();

        dataTable = $('#user_data').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                url: "<?php echo base_url() . 'FamilyCashing/fetch_all_data'; ?>",
                type: "POST"
            },
            "columnDefs": [
                {
                    "targets": [0, 8,9,10],
                    "orderable": false,
                },
            ],
            "buttons": [
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
            "dom": 'Bfrtip'
        });

        $('#import_form').on('submit', function (event) {
            event.preventDefault();
            $.ajax({
                url: $('#import_form').attr('action'),
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend:function () {
                    swal({
                        title: "جاري رفع الملف  ..... ",
                        text: "",
                        imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                        showConfirmButton: false,
                        allowOutsideClick: false

                    });
                },
                success: function (data) {
                    $('#file_exel').val('');
                    dataTable.ajax.reload();

                }
            })
        });
    });

</script>

<script>
    function complete_sarf(sarf_num_fk) {
        var dataString = "sarf_num_fk=" + sarf_num_fk;
        $("#option_details").html('<div class="col-sm-offset-6"> <div class="loader "></div>');
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>FamilyCashing/complete_sarf',
            data: dataString,
            dataType: 'html',
            cache: false,
            beforeSend:function () {
                swal({
                    title: "جاري استكمال تهية الصرف ..... ",
                    text: "",
                    imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                    showConfirmButton: false,
                    allowOutsideClick: false

                });
            },
            success: function (html) {
                swal({
                    title: 'تم استكمال تهية الصرف',
                    type: 'success',
                    confirmButtonText: 'تم'
                });
                dataTable.ajax.reload();

            }, error: function (html) {
                swal({
                    title: 'حدث خطأ',
                    text:'الرجاء المحاولة لاحقا ',
                    type: 'warning',
                    confirmButtonText: 'تم'
                });
            }
        });
    }
function get_details(sarf_num_fk) {
        var dataString = "sarf_num_fk=" + sarf_num_fk;
        $("#option_details").html('<div class="col-sm-offset-6"> <div class="loader "></div>');
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>FamilyCashing/LoadPage',
            data: dataString,
            dataType: 'html',
            cache: false,
            success: function (html) {
                $("#option_details").html(html);
            }
        });
    }

    //---------------------------------------------------
    //18-6-om
    function get_attach(sarf_num_fk, presence_number) {
        var dataString = "sarf_num_fk_attach=" + sarf_num_fk + "&presence_number=" + presence_number;
        $("#option_details").html('<div class="col-sm-offset-6"> <div class="loader "></div>');
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>FamilyCashing/LoadPage',
            data: dataString,
            dataType: 'html',
            cache: false,
            success: function (html) {
                $("#option_attach").html(html);
            }
        });
    }
</script>
