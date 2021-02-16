<style>
    label.label {
        margin-bottom: 0px !important;
        color: #002542 !important;
        display: block !important;
        text-align: right !important;
        font-size: 16px !important;
        padding: 0 !important;
        height: auto;
    }
    table .headtr > td, table .headtr > th {
        /* background-color: #c1ccaf !important;
         color: #222 ;*/
        color: #d00303 !important;
        background-color: white !important;
    }
    table .headtr2 > td, table .headtr2 > th {
        background-color: #ffa7a7 !important;
        color: #222;
    }
    table tr > td, table tr > th {
        border: 2px double #000 !important;
    }
    .table-mehwer tr > td textarea {
        /* background-color: #dbecbd;*/
        background-color: #ffffff;
        color: green;
    }
    .table > tbody > tr > th, .table > tfoot > tr > th,
    .table > thead > tr > td, .table > tbody > tr > td,
    .table > tfoot > tr > td {
        padding: 5px !important;
    }
    #accordion .panel-default > .panel-heading {
        margin-bottom: 3px;
        background-color: #5f9007;
        border-color: #ddd;
        background-image: none;
        padding: 0px 0px;
        width: 99.8%;
        display: inline-block;
        width: 100%;
    }
    #accordion .panel-default > .panel-heading a {
        color: #fff;
    }
    #accordion .panel-default > .panel-heading .panel-title {
        line-height: 40px;
    }
    .more-less {
        float: right;
        color: #212121;
        padding: 0px;
        width: 40px;
        height: 40px;
        text-align: center;
        line-height: 40px;
        background-color: #96c73e;
        color: #fff;
        margin-top: -1px;
        border-bottom-left-radius: 10px;
        border-top-left-radius: 10px;
        margin-left: 5px;
    }
    table .left-headtr > td, table .left-headtr > th {
        background-color: #f2a516;
    }
    .left-headtr label.label {
        text-align: center !important;
        color: #000 !important;
    }
    h4.heading-fasel {
        background-color: #f2a516;
        display: inline-block;
        padding: 10px 10px 10px 43px;
        font-size: 18px;
        border-bottom-left-radius: 30px;
        border-top-left-radius: 0px;
    }
</style>
<div class="col-xs-12 fadeInUp wow">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"> <?php echo $title; ?> </h3>
        </div>
        <?php
        if (isset($last_galsa_date) && !empty($last_galsa_date)) { ?>
            <div class="panel-body">
                <div class="col-sm-12">
                    <?php if ($last_galsa_date != '') { ?>
                        <div class="col-sm-10 no-padding">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <?php
                                if (isset($mahawer) && !empty($mahawer)) {
                                    foreach ($mahawer as $row) {
                                        ?>
                                        <div class="col-md-12 table<?php echo $row->id; ?> no-padding">
                                            <div class="panel panel-default">
                                                <div class="panel-heading" role="tab"
                                                     id="headingOne<?php echo $row->id; ?>">
                                                    <h4 class="panel-title">
                                                        <a role="button" data-toggle="collapse" data-parent="#accordion"
                                                           href="#collapseOne<?php echo $row->id; ?>"
                                                           aria-expanded="true"
                                                           aria-controls="collapseOne<?php echo $row->id; ?>">
                                                            <?php echo $row->mehwar_title; ?>
                                                            <i class="more-less glyphicon glyphicon-plus"></i>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseOne<?php echo $row->id; ?>"
                                                     class="panel-collapse collapse num_mahawer" role="tabpanel"
                                                     aria-labelledby="headingOne<?php echo $row->id; ?>">
                                                    <div class="panel-body">
                                                        <table class="table table-bordered table-striped table-mehwer"
                                                               style="table-layout: fixed">
                                                            <tbody>
                                                            <tr class="">
                                                                <td><?php echo $row->mehwar_title; ?></td>
                                                                <td style="width: 100px">الإجراء</td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input onfocus="$('.mehar<?php echo $row->id; ?>').hide();"
                                                                           id="mehar<?php echo $row->id; ?>"
                                                                           class="form-control"/>
                                                                </td>
                                                                <td>
                                                                    <button class="btn btn-add"
                                                                            id="btn<?php echo $row->id; ?>"
                                                                            onclick="qrar_mehwar(<?php echo $row->id; ?>);">
                                                                        حفظ
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                        <span style="color:red; margin-right: 50%; display: none;"
                                                              class="mehar<?php echo $row->id; ?>">هذا الحقل مطلوب</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }
                                } ?>
                                <h4 class="heading-fasel">البنود المنتهي مناقشتها</h4>
                                <div class="col-md-12 update">
                                    <?php
                                    if (isset($mahawer_end) && !empty($mahawer_end)) {
                                        foreach ($mahawer_end as $row) {
                                            ?>
                                            <div class="col-md-12 table<?php echo $row->id; ?> no-padding">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading" role="tab"
                                                         id="headingOne<?php echo $row->id; ?>">
                                                        <h4 class="panel-title">
                                                            <a role="button" data-toggle="collapse"
                                                               data-parent="#accordion"
                                                               href="#collapseOne<?php echo $row->id; ?>"
                                                               aria-expanded="true"
                                                               aria-controls="collapseOne<?php echo $row->id; ?>">
                                                                <?php echo $row->mehwar_title; ?>
                                                                <i class="more-less glyphicon glyphicon-plus"></i>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="collapseOne<?php echo $row->id; ?>"
                                                         class="panel-collapse collapse " role="tabpanel"
                                                         aria-labelledby="headingOne<?php echo $row->id; ?>">
                                                        <div class="panel-body">
                                                            <table class="table table-bordered table-striped table-mehwer"
                                                                   style="table-layout: fixed">
                                                                <tbody>
                                                                <tr class="">
                                                                    <td><?php echo $row->mehwar_title; ?></td>
                                                                    <td style="width: 100px">الإجراء</td>
                                                                </tr>
                                                                <tr>
                                                                    <td><textarea
                                                                                onfocus="$('.mehar<?php echo $row->id; ?>').hide();"
                                                                                onclick="make_not_read(<?php echo $row->id; ?>);"
                                                                                readonly
                                                                                id="mehar<?php echo $row->id; ?>"
                                                                                class="form-control col-md-12" rows="">
                                                <?php echo $row->elqrar; ?>
                                            </textarea></td>
                                                                    <td>
                                                                        <button class="btn btn-add"
                                                                                id="btn<?php echo $row->id; ?>"
                                                                                onclick="qrar_mehwar_update(<?php echo $row->id; ?>);">
                                                                            تعديل
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                            <span style="color:red; margin-right: 50%; display: none;"
                                                                  class="mehar<?php echo $row->id; ?>">هذا الحقل مطلوب</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php }
                                    } ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <table class="table table-bordered">
                                <tbody>
                                <tr class="left-headtr">
                                    <th><label class="label">رقم الجلسه</label></th>
                                </tr>
                                <tr>
                                    <td class="text-center">
                                        <?php if (isset($last_galsa_date->glsa_rkm_full)) echo $last_galsa_date->glsa_rkm_full; ?>
                                        <input type="hidden" id="glsa_rkm" name="glsa_rkm" readonly
                                               value="<?php if (isset($last_galsa_date)) echo $last_galsa_date->glsa_rkm; ?>"/>
                                    </td>
                                </tr>
                                <tr class="left-headtr">
                                    <th><label class="label"> تاريخ بدء الجلسه </label></th>
                                </tr>
                                <tr>
                                    <td class="text-center"><?php if (isset($last_galsa_date)) echo $last_galsa_date->glsa_date_m; ?></td>
                                </tr>
                             
                                <tr class="left-headtr">
                                    <th><label class="label">تسجيل حضور الاعضاء</label></th>
                                </tr>
                                <tr>
                                    <td class="text-center">
                                        <button class="btn btn-add" data-toggle="modal" data-target="#myModal">تسجيل
                                            حضور الاعضاء
                                        </button>
                                    </td>
                                </tr>
                                <tr class="left-headtr">
                                    <th><label class="label">بدء الجلسه</label></th>
                                </tr>
                                <tr>
                                    <td class="text-center">
                                        <button class="btn btn-primary"
                                                onclick="startgalsa();" <?php if (isset($last_galsa_date->time_start) && (!empty($last_galsa_date->time_start))) {
                                            echo 'disabled';
                                        } ?> >بدء الجلسه
                                        </button>
                                    </td>
                                </tr>
                                <tr class="left-headtr">
                                    <th><label class="label">بدء الجلسه</label></th>
                                </tr>
                                <tr>
                                    <td id="tim"><?php if (isset($last_galsa_date->time_start) && (!empty($last_galsa_date->time_start))) {
                                            echo $last_galsa_date->time_start;
                                        } ?></td>
                                </tr>
                                <?php /*if (isset($last_galsa_date->glsa_finshed) && ($last_galsa_date->glsa_finshed != 1)) {*/ ?>
                                    <tr class="left-headtr">
                                        <th><label class="label">انهاء الجلسه</label></th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="col-sm-12">
                                                <button class="btn btn-sm btn-danger" onclick="end_galsa();"
                                                        style=""> انهاء الجلسه
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php /*}*/ ?>
                                </tbody>
                            </table>
                        </div>
                    <?php } else { ?>
                        <div class="alert alert-danger">عفوا!...لاتوجد جلسات مفتوحه</div>
                    <?php } ?>
                </div>
            </div>
        <?php } else {
            ?>
            <div class="alert alert-danger">عفوا !......لاتوجد جلسات مفتوحه</div>
        <?php } ?>
        <!----------------- start_modal -----------------------------------------                    ------>
        <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">تفاصيل الأعضاء</h4>
                    </div>
                    <br>
                    <div class="modal-body form-group col-sm-12 col-xs-12">
                        <?php if (isset($members) && !empty($members)) { ?>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">إسم العضو</th>
                                    <th scope="col">الحضور</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $types = array(1 => "رئيس مجلس الإدارة ", 2 => "نائب رئيس مجلس الإدارة ", 3 => "عضو");
                                $x = 0;
                                foreach ($members as $row) {
                                    $x++;
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $x++; ?>
                                        </td>
                                        <td><?php echo $row->emp_name; ?></td>
                                        <input type="hidden" class="emp_id_fk" value="<?php echo $row->id; ?> "/>
                                        <td><input type="radio" <?php if ($row->hdoor_satus == 1) echo 'checked'; ?>
                                                   class="attend" name="<?php echo $row->emp_id_fk; ?>" value="1">حضر
                                            <input type="radio" <?php if ($row->hdoor_satus == 0) echo 'checked'; ?>
                                                   class="attend" name="<?php echo $row->emp_id_fk; ?>" value="0">لم
                                            يحضر
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                            <?php
                        } else {
                            ?>
                            <div class="alert alert-danger">لايوجد بيانات</div>
                        <?php } ?>
                    </div>
                    <div class="modal-footer" style="border-top: 0;">
                        <button type="button" class="btn btn-success" data-dismiss="modal"
                                onclick="attend_member(<?php echo $row->glsa_rkm; ?>);">حفظ
                        </button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                    </div>
                </div>
            </div>
        </div>
        <!------------------------- end_modal ----------------------------->
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>
<script>
    function qrar_mehwar(valu) {
        var mehar = $('#mehar' + valu).val();
        if ($('#mehar' + valu).val() == '') {
            $('.mehar' + valu).show();
            return;
        }
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/egtma3at/Egtma3at_c/update_qrar",
            data: {valu: valu, mehar: mehar},
            beforeSend: function (xhr) {
                Swal.fire({
                    title: "جاري الحفظ ... ",
                    text: "",
                    imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                    showConfirmButton: false,
                    allowOutsideClick: false
                });
            },
            success: function (d) {
                Swal.fire({
                    // position: 'top-end',
                    type: 'success',
                    title: 'تم حفظ القرار بنجاح ',
                    showConfirmButton: false,
                    timer: 2000
                })
                var app = $('.table' + valu);
                $('.table' + valu).show();
                $('.update').append($('.table' + valu));
                //$('.num_mahawer')
                $('#collapseOne' + valu).removeClass("num_mahawer");
                $('#btn' + valu).text('تعديل');
            }
        });
    }
</script>
<script>
    function qrar_mehwar_update(valu) {
        var mehar = $('#mehar' + valu).val();
        if ($('#mehar' + valu).val() == '') {
            $('.mehar' + valu).show();
            return;
        }
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/egtma3at/Egtma3at_c/update_qrar",
            data: {valu: valu, mehar: mehar},
            beforeSend: function (xhr) {
                Swal.fire({
                    title: "جاري الحفظ ... ",
                    text: "",
                    imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                    showConfirmButton: false,
                    allowOutsideClick: false
                });
            },
            success: function (d) {
                Swal.fire({
                    // position: 'top-end',
                    type: 'success',
                    title: 'تم تعديل القرار بنجاح',
                    showConfirmButton: false,
                    timer: 2000
                })
            }
        });
    }
</script>
<script>
    function attend_member(valu) {
        var attend = [];
        var emp_id_fk = [];
        $(".attend:radio:checked").each(function () {
            attend.push($(this).val());
        })
        $(".emp_id_fk").each(function () {
            emp_id_fk.push($(this).val());
        })
        if (emp_id_fk.length !== attend.length) {
            alert("من فضلك ادخل البيانات كامله");
            return;
        }
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/egtma3at/Egtma3at_c/update_member_hdoor",
            data: {emp_id_fk: emp_id_fk, attend: attend},
            beforeSend: function (xhr) {
                Swal.fire({
                    title: "جاري الحفظ ... ",
                    text: "",
                    imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                    showConfirmButton: false,
                    allowOutsideClick: false
                });
            },
            success: function (d) {
                Swal.fire({
                    // position: 'top-end',
                    type: 'success',
                    title: 'تم تسجيل الحضور بنجاح',
                    showConfirmButton: false,
                    timer: 1000
                })
            }
        });
    }
</script>
<script>
    function make_not_read(valu) {
        $('#mehar' + valu).prop('readonly', false);
    }
</script>
<script>
    function startgalsa() {
        var glsa_rkm = $('#glsa_rkm').val();
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/egtma3at/Egtma3at_c/start_galsa_time",
            data: {glsa_rkm: glsa_rkm},
            success: function (d) {
                $('#tim').text(d);
            }
        });
    }
</script>
<script>
    function end_galsa() {
        var numItems = $('.num_mahawer').length;
        if (numItems != 0) {
            Swal.fire(
                'تحذير!',
                'قم بانهاء جميع المحاور اولا قبل انهاء الجلسه .',
            );
            return;
        }
        var title = "هل انت متأكد من انهاء الجلسه؟";
        var confirm = "نعم, قم بالانهاء";
        var text2 = "عند الضغط علي نعم سيتم انهاء  الجلسه";
        Swal.fire({
            title: title,
            text: text2,
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'ليس الان',
            confirmButtonText: confirm
        }).then((result) => {
                if (result.value) {
                    var glsa_rkm = $('#glsa_rkm').val();
                    Swal.fire({
                        title: 'هل تريد طباعة المحضر ؟',
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        cancelButtonText: 'لا',
                        confirmButtonText: 'نعم'
                    }).then((result) => {
                        $.ajax({
                            type: 'post',
                            url: "<?php echo base_url();?>human_resources/egtma3at/Egtma3at_c/end_galsa",
                            data: {glsa_rkm: glsa_rkm},
                            success: function (d) {
                                Swal.fire(
                                    'نجاح!',
                                    'تم انهاء الجلسه .',
                                );
                                if (result.value) {
                                    window.location.href = "<?php echo base_url();?>human_resources/egtma3at/Egtma3at_c/print_mahdr/" + glsa_rkm;
                                } else {
                                    window.location.href = "<?php echo base_url();?>human_resources/egtma3at/Egtma3at_c/add_galsat_mon24a/" + glsa_rkm;
                                }
                            }
                        });
                    });
                }
            }
        )
    }
</script>
