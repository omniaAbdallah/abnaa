<style>
    /**************************/
    /* 27-1-2019 */
    label. {
        height: auto;
        line-height: unset;
        font-size: 14px !important;
        font-weight: 600 !important;
        text-align: right !important;
        margin-bottom: 0;
        background-color: transparent;
        color: #002542;
        border: none;
        padding-bottom: 0;
        font-weight: bold;
        float: right;
        display: block;
        width: 100%;
    }

    . {
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

    .bootstrap-select > .btn {
        width: 100%;
        padding-right: 5px;
    }

    .bootstrap-select.btn-group .dropdown-toggle .caret {
        right: auto !important;
        left: 4px;
    }

    .bootstrap-select.btn-group .dropdown-toggle .filter-option {
        font-size: 15px;
    }

    /*	.form-control{
            font-size: 15px;
            color: #000;
            border-radius: 4px;
            border: 2px solid #b6d089 !important;
        }*/
    .form-control:focus {
        border: 2px solid #b6d089;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        box-shadow: 2px 2px 2px 1px #beffc3;
    }

    .has-success .form-control {
        border: 2px solid #b6d089;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
    }

    .has-success .form-control:focus {
        border: 2px solid #b6d089;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        box-shadow: 2px 2px 2px 1px #beffc3;
    }

    .nav-tabs > li > a {
        color: #222;
        font-weight: 500;
        background-color: #e6e6e6;
        font-size: 15px;
    }

    .tab-content {
        margin-top: 15px;
    }

    td {
        border-color: #999 !important;
    }

    tbody td {
        background-color: #fff;
    }

    #check_all_not {
        display: inline-block;
        width: 20px;
        height: 20px;
    }

    .check_all_not {
        display: inline-block;
        width: 20px;
        height: 20px;
    }

    label.checktitle {
        margin-top: -24px;
        display: block;
        margin-right: 24px;
    }
</style>
<div class="col-xs-12 ">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title ?> </h3>
        </div>
        <div class="panel-body">
            <?php if (!empty($record)){ ?>
            <form action="<?php echo base_url(); ?>family_controllers/Family/update_talb_mostandat/<?php echo $mother_num; ?>"
                  method="post">
                <?php }else{ ?>
                <form action="<?php echo base_url(); ?>family_controllers/Family/talb_mostandat/<?php echo $mother_num; ?>"
                      autocomplete="off" method="post">
                    <?php } ?>
                    <input type="hidden" name="file_num" value="<?= $basic_family['file_num'] ?>">
                    <input type="hidden" name="mother_national_num" value="<?= $basic_family['mother_national_num'] ?>">
                    <input type="hidden" name="osra_id_fk" value="<?= $basic_family['id'] ?>">
                    <div class="form-group col-md-1 padding-4">
                        <label class="label"> رقم المستند </label>
                        <input type="text" name="" data-validation="required" readonly="readonly"
                               class="form-control  " value="<?php if (!empty($record)) {
                            echo $record->talb_mostand_id;
                        } else {
                            echo $last_id;
                        } ?>"/>
                    </div>
                    <div class="form-group col-md-2 padding-4">
                        <label class="label"> تاريخ المستند </label>
                        <input type="date" name="talb_date" data-validation="required" class="form-control  "
                               value="<?= date('Y-m-d') ?>"/>
                    </div>
                    <div class="form-group col-md-5 padding-4">
                        <label class="label"> عنوان المستند </label>
                        <input type="text" name="talb_title" data-validation="required" class="form-control  "
                               value=""/>
                    </div>
                    <div class="form-group col-md-2 padding-4">
                        <label class="label"> اخر معاد لتسليم </label>
                        <input type="date" name="last_date_taslem" data-validation="required" class="form-control  "
                               value="<?= date('Y-m-d') ?>"/>
                    </div>
                    <div class="form-group col-md-2 padding-4">
                        <label class="label"> جوال التواصل </label>
                        <input type="text" name="osra_contact_mob" data-validation="number" class="form-control  "
                               value="<?= $basic_family['contact_mob'] ?>"/>
                    </div>
                    <div class="col-sm-3  col-md-5 padding-4 ">
                        <label class="label"> اسم المندوب </label>
                        <input type="text" name="osra_mandob" id="mokadem_name" list="cityname"
                               data-validation="required" class="form-control " value="">
                        <datalist id="cityname">
                            <?php if (isset($mother) && !empty($mother) && $mother != null){
                            foreach ($mother

                            as $mother_row){ ?>
                            <option value="<?= $mother_row->full_name ?>">
                                <?php }
                                }   if (isset($member) && !empty($member) && $member != null){
                                foreach ($member

                                as $member_row){ ?>
                            <option value="<?= $member_row->member_full_name ?>">
                                <?php }
                                } ?>
                        </datalist>
                    </div>
        </div>
        <div class="clearfix"></div>
        <div class="form-group col-xs-12 text-center">
            <!-- yara -->
            <?php if (isset($main_attach_files) && !empty($main_attach_files)) { ?>
                <table id="" class="table table-striped table-bordered dt-responsive nowrap table-pd" cellspacing="0"
                       width="100%">
                    <thead>
                    <tr>
                        <td>
                            <div class="check-style">

                                <input class="check_all_not" id="check_all_not<?php echo $mother_num; ?>"
                                       type="checkbox" onclick="check_all(<?php echo $mother_num; ?>);">
                                <label for="check_all_not<?php echo $mother_num; ?>"> تحديد الكل/إلغاء </label>
                            </div>
                        </td>
                        <td>نوع الطلب</td>
                        <td>حالة الطلب</td>
                        <td>ملاحظات</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $status = array('no' => 'تحت الطلب', 'yes' => 'تم التسلم');
                    $y = 1;
                    foreach ($main_attach_files as $file_row) {
                        ?>
                        <tr>
                            <td>
                                <div class="check-style">
                                    <input class=" check_large<?php echo $mother_num; ?> "
                                           id="check_large<?php echo $file_row->id_setting; ?>"
                                           type="checkbox" name="mostand_id[]" value="<?= $file_row->id_setting ?>"/>
                                    <label for="check_large<?php echo $file_row->id_setting; ?>"> </label>

                                </div>
                            </td>
                            <td><?= $file_row->title_setting ?></td>
                            <td>
                                <select name="taslem[]" class=" no-padding form-control" aria-required="true">
                                    <?php foreach ($status as $key => $value) { ?>
                                        <option value="<?= $key ?>"><?= $value ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td>
                                <input type="text" value="" name="doc_notes[]" class="form-control "/>
                            </td>
                        </tr>
                    <?php } ?>
                    <tr>
                    </tbody>
                </table>
            <?php } ?>
            <!-- yara -->
            <button type="submit" id="saveBtn" class="btn btn-labeled btn-success " name="submit" value="حفظ">
                <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
            </button>
        </div>
        </form>
        <div class="clearfix"></div>
        <?php
        if (isset($talbat_mostandats) && !empty($talbat_mostandats)) {
            ?>
            <br/>
            <table id="example" class="table table-bordered table-devices">
                <thead>
                <tr class="greentd">
                    <th class="">رقم الطلب</th>
                    <th class="">تاريخ المستند</th>
                    <th class="">عنوان المستند</th>
                    <th class=""> القائم بالاضافة</th>
                    <th class="">عدد المستندات المطلوبة</th>
                    <th class="">عدد تحت الطلب</th>
                    <th class="">عدد تم التسليم</th>
                    <th class="">الإجراء</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($talbat_mostandats as $row) {
                    ?>
                    <tr>
                        <td><?php echo $row['talb_mostand_id']; ?>  </td>
                        <td><?php echo $row['talb_date']; ?>  </td>
                        <td><?php echo $row['talb_title']; ?>  </td>
                        <td> <?php echo $row['emp_name']; ?></td>
                        <td> <?php echo $row['taslem_yes'] + $row['taslem_no']; ?></td>
                        <td> <?php echo $row['taslem_no']; ?></td>
                        <td> <?php echo $row['taslem_yes']; ?></td>
                        <td>
                            <a onclick="make_print(<?= $row['talb_mostand_id'] ?>)" > <i class="fa fa-print"></i>  </a>
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
                                    edite_files(<?= $row['talb_mostand_id'] ?>);
                                    });'>
                                <i class="fa fa-pencil"> </i></a>
                            <a onclick=' swal({
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
                                    setTimeout(function(){window.location="<?php echo base_url() . 'family_controllers/Family/delete_talb_mostandat/' . $row['talb_mostand_id'] . '/' . $basic_family['mother_national_num'] ?>";}, 500);
                                    });'>
                                <i class="fa fa-trash"> </i></a>
                            <!-- yara -->
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        <?php } ?>
    </div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel"> المستندات المطلوبة </h4>
            </div>
            <div class="modal-body container-fluid" id="result_attach">
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <button type="button" class="btn btn-labeled btn-success " id="save_start_work"
                        onclick="save_edite_file()" name="add" value="حفظ">
                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                </button>


                <button type="button"
                        class="btn btn-labeled btn-danger " data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    function check_all(id) {
        var inputs = document.querySelectorAll('.check_large' + id);
        var input = document.getElementById('check_all_not' + id).checked;
        for (var i = 0; i < inputs.length; i++) {
            inputs[i].checked = input;
        }
    }
</script>

<script>
    function edite_files(mostand_id) {
        $('#myModal').modal('show');

        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>family_controllers/Family/update_talb_mostandat',
            data: {mostand_id: mostand_id},
            dataType: 'html',
            cache: false,
            beforeSend: function () {
                $('#result_attach').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (html) {
                $("#result_attach").html(html);
            }
        });

    }

    function save_edite_file() {

        $.ajax({
            type: 'post',
            url: $('#edite_file_form').attr('action'),
            data: $('#edite_file_form').serialize(),
            cache: false,
            beforeSend: function (xhr) {

                swal({
                    title: "جاري التعديل ... ",
                    text: "",
                    imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                    showConfirmButton: false,
                    allowOutsideClick: false
                });
            },
            success: function (html) {
                swal({
                    title: 'تم التعديل  بنجاح',
                    type: 'success',
                    confirmButtonText: 'تم'
                });
                $('#myModal').modal('hide');
                window.location.reload();
            }
        });
    }

    function make_print(mostand_id) {
        var request = $.ajax({
            url: '<?php echo base_url() ?>family_controllers/Family/print_talb_mostandat',
            type: "POST",
            data: {mostand_id: mostand_id},
        });
        request.done(function (msg) {
            var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(msg);
            WinPrint.document.close();
            WinPrint.onafterprint = function () {
                WinPrint.close();
                console.log("Printing completed...");
            }
        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });
    }
</script>
