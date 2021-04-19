<style>
    .inner-heading {
        background-color: #9ed6f3;
        padding: 10px;
    }

    .pop-text {
        background-color: #009688;
        color: #fff;
        padding: 7px;
        font-size: 14px;
        margin-bottom: 3px;
        margin-top: 3px;
    }

    .pop-text1 {
        background-color: #eee;
        padding: 7px;
        font-size: 14px;
        margin-bottom: 3px;
        margin-top: 3px;
    }

    .pop-title-text {
        margin-top: 4px;
        margin-bottom: 4px;
        padding: 6px;
        background-color: #9ed6f3;
    }

    .span-validation {
        color: rgb(255, 0, 0);
        font-size: 12px;
        position: absolute;
        bottom: -10px;
        right: 50%;
    }

    .astric {
        color: red;
        font-size: 25px;
        position: absolute;
    }

    .top_radio {
        margin-bottom: 15px;
    }

    .top_radio input[type=radio] {
        height: 24px;
        width: 24px;
        line-height: 0px;
        vertical-align: middle;
        margin-right: -33px;
        top: -5px;
    }

    .top_radio .radio, .top_radio .radio {
        vertical-align: middle;
        font-size: 16px;
        padding: 10px;
        border-bottom: 2px solid #eee;
        border-radius: 8px;
        text-align: right;
    }

    .radio input[type="radio"] {
        opacity: 1;
    }
</style>
<style type="text/css">
    .btn-group.mega-btn .dropdown-menu {
        left: 50% !important;
        right: auto !important;
        text-align: center !important;
        transform: translate(-50%, 0) !important;
    }

    @media (max-width: 480px) {
        .btn-group.mega-btn .dropdown-menu {
            min-width: 350px;
        }
    }

    @media (min-width: 480px) and (max-width: 767px) {
        .btn-group.mega-btn .dropdown-menu {
            min-width: 470px;
        }
    }

    @media (min-width: 768px) and (max-width: 991px) {
        .btn-group.mega-btn .dropdown-menu {
            min-width: 750px;
        }
    }

    @media (min-width: 992px) (max-width:

    1150px

    ) {
        .btn-group.mega-btn .dropdown-menu {
            min-width: 900px;
        }
    }

    @media (min-width: 1151px) {
        .btn-group.mega-btn .dropdown-menu {
            min-width: 544px;
        }
    }

    .mega-col {
        width: 50%;
        float: right;
        list-style: none;
        text-align: right;
        padding-right: 5px;
    }

    .mega-col li {
    }

    li.mega-col-header {
        font-size: 18px;
        border-bottom: 3px double;
        margin-bottom: 8px;
        padding-left: 5px;
        padding-right: 0px;
    }

    .dropdown-menu li .mega-col:first-child {
        border-left: 2px dotted #eee;
        padding-left: 5px;
    }

    .progress-bar {
        box-shadow: none;
        font-size: 15px;
        font-weight: 600;
        line-height: 23px;
    }

    .btn-success:hover, .btn-success:focus, .btn-success:active {
        background-color: #50ab20 !important;
        border-color: #50ab20;
    }

    .panel-heading a {
        color: #fff;
    }

    div.disabled {
        pointer-events: none;

        /* for "disabled" effect */
        opacity: 0.5;
        background: #CCC;
    }
</style>


<?php
$this->load->model('familys_models/osr_crm/Osr_crm_m');

$basic_data_family = $this->Osr_crm_m->get_basic_mother_num($mother_num);
$person_account = $basic_data_family["person_account"];
$agent_bank_account = $basic_data_family["agent_bank_account"];
$file_num = $basic_data_family["file_num"];
$check_data = $this->Osr_crm_m->check_hdoor_bahth($mother_num);
$progress_width = 22;
$progress_num = 0;
$progress_class = 'danger';
$script = '';
if (empty($check_data)) {

    $check_data['taslem_mosdand'] = 'no';
    $check_data['start_bahth'] = 'no';
    $check_data['hdoor_osr_bahth'] = 'no';
    $check_data['review_to'] = 'no';
    $check_data['end_review'] = 'no';
    $check_data['bahth_to'] = 'no';
}
if ($check_data['start_bahth'] == 'yes') {
    $progress_width += 3;
    $progress_num += 25;
    $script = "$('#osr_connect_div').removeClass('disabled');";
}
if ($check_data['hdoor_osr_bahth'] == 'yes') {
    $progress_width += 25;
    $progress_num += 25;
    $script = "$('#osr_connect_div').addClass('disabled');";

}
if ($check_data['taslem_mosdand'] == 'yes') {
    $progress_width += 25;
    $progress_num += 25;
    $script = "$('#osr_connect_div').addClass('disabled');";

}
if ($check_data['end_review'] == 'yes') {
    $progress_width += 15;
    $progress_num += 15;
    $script = "$('#osr_connect_div').addClass('disabled');";

}
if ($check_data['bahth_to'] == 'yes') {
    $progress_width += 10;
    $progress_num += 10;
    $script = "$('#osr_connect_div').addClass('disabled');";

}
if ($progress_num >= 50) {
    $progress_class = 'success';
}
?>

<div class="panel-body">
    <table class="table table-bordered">
        <tr>
            <th colspan="7" scope="col">
                <!--success-->
                <div class="progress-bar progress-bar-<?= $progress_class ?> " role="progressbar" aria-valuenow="25"
                     aria-valuemin="0" aria-valuemax="100" style="width:<?= $progress_width ?>%">
                    تم إكتمال إجراءات التحديث بنسبة
                    <span id="progress_num"><?= $progress_num ?></span>
                    % (بنجاح)
                </div>
            </th>

        </tr>
        <tbody>
        <!--  <tr>
          <td colspan="5"></td>
          </tr>-->
        <tr>
            <td style="width: 10%;"><a class="btn btn-sm btn-success" style="margin: 2px;"
                                       onclick="start_hdoor(<?php echo $mother_num; ?>,<?php echo $file_num; ?>)">
                    بدء إجراءات التحديث </a></td>
            <td style="width: 10%;"><a target="_blank"
                                       class="btn btn-sm btn-success start_bahth <?= $check_data['start_bahth'] ?>"
                                       style="margin: 2px;"
                                       href="<?php echo base_url(); ?>family_controllers/osr_crm/Osr_crm_c/add_crm_osr/<?php echo $mother_num; ?>">
                    التواصل مع الاسرة </a></td>
            <td style="width: 10%;"><a style="margin: 2px;"
                                       class="btn btn-sm btn-success start_bahth <?= $check_data['start_bahth'] ?>"
                                       onclick="make_hdoor(<?php echo $mother_num; ?>,<?php echo $file_num; ?>)"

                >حضور الأسرة </a></td>
            <td style="width: 10%;">
                <div class="btn-group" style="    margin-top: 2px;">
                    <button type="button" class="btn btn-success">تسليم المعاملات</button>
                    <button type="button"
                            class="btn btn-success dropdown-toggle hdoor_osr_bahth <?= $check_data['hdoor_osr_bahth'] ?>"
                            data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul style="margin: 2px;" class="dropdown-menu" aria-labelledby="dropdownMenu3">
                        <li class="dropdown-header"> الخطابات</li>
                        <li><a target="_blank"
                               href="<?php echo base_url(); ?>family_controllers/Family_letter/Civil_Status/<?php echo $mother_num; ?>/<?php echo $file_num; ?>/1">خطاب
                                الاحوال المدنيه </a></li>
                        <li><a target="_blank"
                               href="<?php echo base_url(); ?>family_controllers/Family_letter/Passports/<?php echo $mother_num; ?>/<?php echo $file_num; ?>/1">خطاب
                                الجوازات </a></li>
                        <li><a target="_blank"
                               href="<?php echo base_url(); ?>family_controllers/Family_letter/Insurance_letter_father/<?php echo $mother_num; ?>/<?php echo $file_num; ?>/1">خطاب
                                تأمينات ( الأب ) </a></li>
                        <li><a target="_blank"
                               href="<?php echo base_url(); ?>family_controllers/Family_letter/Insurance_letter/<?php echo $mother_num; ?>/<?php echo $file_num; ?>/1">خطاب
                                تأمينات ( الأم ) </a></li>
                        <li><a target="_blank"
                               href="<?php echo base_url(); ?>family_controllers/Family_letter/Retirement_letter/<?php echo $mother_num; ?>/<?php echo $file_num; ?>/1">خطاب
                                التقاعد </a></li>
                        <li><a target="_blank"
                               href="<?php echo base_url(); ?>family_controllers/Family_letter/daman_letter/<?php echo $mother_num; ?>/<?php echo $file_num; ?>/1">خطاب
                                الضمان</a></li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header">المستندات</li>
                        <li><a target="_blank"
                               href="<?= base_url() ?>family_controllers/Family/talb_mostandat/<?= $mother_num ?>/1">
                                اضافه
                                المستندات
                            </a></li>
                        <li><a href="" onclick="print_prime_houe(<?= $mother_num ?>);">
                                طباعة كروكي المنزل
                            </a></li>

                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header">إنهاء إستلام وتسلم المعاملات</li>
                        <li style="background: red;"><a
                                    onclick="end_taslem(<?php echo $mother_num; ?>,<?php echo $file_num; ?>)">
                                إنهاء إستلام وتسلم المعاملات</a></li>

                    </ul>
                </div>
            </td>

            <td style="width: 10%;">
                <div class="btn-group" style="    margin-top: 2px;">
                    <button type="button" class="btn btn-success">تعديل بيانات الملف</button>
                    <button type="button"
                            class="btn btn-success dropdown-toggle taslem_mosdand <?= $check_data['taslem_mosdand'] ?>"
                            data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul style="margin: 2px;" class="dropdown-menu" aria-labelledby="dropdownMenu3">
                        <li>
                            <a href="<?php echo base_url(); ?>family_controllers/Family/father/<?php echo $mother_num; ?>/1">بيانات
                                الأب </a></li>
                        <li>
                            <a href="<?php echo base_url(); ?>family_controllers/Family/mother/<?php echo $mother_num; ?>/1">بيانات
                                الأم </a></li>
                        <li>
                            <a href="<?php echo base_url(); ?>family_controllers/Family/add_wakel/<?php echo $mother_num; ?>/1">بيانات
                                الوكيل </a></li>
                        <li>
                            <a href="<?php echo base_url(); ?>family_controllers/Family/family_members/<?php echo $mother_num; ?>/<?php echo $person_account; ?>/<?php echo $agent_bank_account; ?>/1">بيانات
                                أفراد الأسرة</a></li>
                        <li>
                            <a href="<?php echo base_url(); ?>family_controllers/Family/house/<?php echo $mother_num; ?>/1">بيانات
                                السكن</a></li>
                        <li>
                            <a href="<?php echo base_url(); ?>family_controllers/Family/devices/<?php echo $mother_num; ?>/1">محتويات
                                السكن </a></li>
                        <li>
                            <a href="<?php echo base_url(); ?>family_controllers/Family/home_needs/<?php echo $mother_num; ?>/1">
                                إحتياجات الأسرة </a></li>
                        <li>
                            <a href="<?php echo base_url(); ?>family_controllers/Family/money/<?php echo $mother_num; ?>/1">مصادر
                                الدخل والإلتزامات </a></li>
                        <li>
                            <a href="<?php echo base_url(); ?>family_controllers/Family/add_responsible_account/<?php echo $mother_num; ?>/1">
                                بيانات الحساب البنكي</a></li>
                        <li>
                            <a href="<?php echo base_url(); ?>family_controllers/Family/attach_files/<?php echo $mother_num; ?>/1">رفع
                                الوثائق </a></li>
                        <li>
                            <a href="<?php echo base_url(); ?>family_controllers/Family/family_account/<?php echo $mother_num; ?>/1">
                                بيانات حساب الأسرة </a></li>

                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header">ارسال للمراجعة</li>
                        <li style="background: darkgreen;"><a data-toggle="modal" data-target="#modal-process-procedure"
                                                              onclick="GetTransferPage(<?php echo $mother_num; ?>,1)">
                                ارسال للمراجعة</a></li>
                    </ul>

                </div>

            </td>

            <td style="width: 10%;">
                <div class="btn-group" style="    margin-top: 2px;">
                    <button type="button" class="btn btn-success">مراجعة البيانات</button>
                    <button type="button"
                            class="btn btn-success dropdown-toggle review_to <?= $check_data['review_to'] ?>"
                            data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul style="margin: 2px;" class="dropdown-menu" aria-labelledby="dropdownMenu3">
                        <li>
                            <a href="<?php echo base_url(); ?>family_controllers/Family/father/<?php echo $mother_num; ?>">بيانات
                                الأب </a></li>
                        <li>
                            <a href="<?php echo base_url(); ?>family_controllers/Family/mother/<?php echo $mother_num; ?>">بيانات
                                الأم </a></li>
                        <li>
                            <a href="<?php echo base_url(); ?>family_controllers/Family/add_wakel/<?php echo $mother_num; ?>">بيانات
                                الوكيل </a></li>
                        <li>
                            <a href="<?php echo base_url(); ?>family_controllers/Family/family_members/<?php echo $mother_num; ?>/<?php echo $person_account; ?>/<?php echo $agent_bank_account; ?>">بيانات
                                أفراد الأسرة</a></li>
                        <li>
                            <a href="<?php echo base_url(); ?>family_controllers/Family/house/<?php echo $mother_num; ?>">بيانات
                                السكن</a></li>
                        <li>
                            <a href="<?php echo base_url(); ?>family_controllers/Family/devices/<?php echo $mother_num; ?>">محتويات
                                السكن </a></li>
                        <li>
                            <a href="<?php echo base_url(); ?>family_controllers/Family/home_needs/<?php echo $mother_num; ?>">
                                إحتياجات الأسرة </a></li>
                        <li>
                            <a href="<?php echo base_url(); ?>family_controllers/Family/money/<?php echo $mother_num; ?>">مصادر
                                الدخل والإلتزامات </a></li>
                        <li>
                            <a href="<?php echo base_url(); ?>family_controllers/Family/add_responsible_account/<?php echo $mother_num; ?>">
                                بيانات الحساب البنكي</a></li>
                        <li>
                            <a href="<?php echo base_url(); ?>family_controllers/Family/attach_files/<?php echo $mother_num; ?>">رفع
                                الوثائق </a></li>
                        <li>
                            <a href="<?php echo base_url(); ?>family_controllers/Family/family_account/<?php echo $mother_num; ?>">
                                بيانات حساب الأسرة </a></li>

                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header">إنهاء المراجعة</li>
                        <li style="background: red;"><a
                                    onclick="end_review(<?php echo $mother_num; ?>,<?php echo $file_num; ?>)">
                                انهاء المراجعة</a></li>
                    </ul>

                </div>

            </td>

            <td style="width: 10%;">
                <a style="margin: 2px;" data-toggle="modal" data-target="#modal-process-procedure"
                   class="btn btn-sm btn-primary end_review <?= $check_data['end_review'] ?>"
                   onclick="GetTransferPage(<?php echo $mother_num; ?>,2)"> تحويل الي الباحث
                </a></td>

        </tr>

        </tbody>
    </table>
</div>
<div class="modal fade" id="modal-process-procedure" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 85%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">التفاصيل</h4>
            </div>
            <div class="modal-body col-sm-12" id="detail_div">
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <button type="button" class="btn btn-danger" style="float: left;"
                        data-dismiss="modal">إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<script>

    document.addEventListener('DOMContentLoaded', function () {
        $('.no').attr('disabled', 'disabled');
        $('.yes').removeAttr('disabled');

        <?php if ($basic_data_family['current_to_emp_user_id'] != $_SESSION['user_id']){ ?>
        setTimeout(function () {
            $('.review_to').attr('disabled', 'disabled');
            $('.end_review').attr('disabled', 'disabled');
        }, 500);
        <?php } ?>

        <?=$script?>
    });

</script>
<script>

    function GetTransferPage(value, page) {
        if (value != 0 && value != '') {
            var dataString = 'id=' + value;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>family_controllers/Family_transformation/GetTransferPage_drob_dwon',
                data: {value: value, page: page},
                dataType: 'html',
                cache: false,
                beforeSend: function () {
                    $('#detail_div').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
                },
                success: function (html) {
                    $("#detail_div").html(html);
                }
            });
        }
    }

    function get_emp(id_depart) {
        //   alert(id_depart);
        if (id_depart != 0 && id_depart != "") {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>family_controllers/Family_transformation/GetDepart_emps',
                data: {id_depart: id_depart},
                dataType: 'html',
                cache: false,
                success: function (resp) {
                    var obj = JSON.parse(resp);
                    var options = '<option value="">اختر</option>';
                    if (obj.mowazf == 0) {
                        $("#user_to-7").html(options);
                        // $("#user_to-7").selectpicker("refresh");
                    } else {
                        for (var i = 0; i < obj.mowazf.length; i++) {
                            var option = '<option value="' + obj.mowazf[i].person_id + '"> ' + obj.mowazf[i].person_name + '</option>';
                            options += option;
                        }
                        $("#user_to-7").html(options);
                        // $("#user_to-7").selectpicker("refresh");
                    }
                }
            });
        }
    }

    var text_show, type_show;


    function make_hdoor(mother_num, file_num) {
        swal({
                title: "هل تريد تسجيل حضور الاسرة ؟",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-warning",
                confirmButtonText: "نعم",
                cancelButtonText: "لا",
                closeOnConfirm: true
            },
            function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        type: 'post',
                        url: '<?php echo base_url() ?>family_controllers/osr_crm/Osr_crm_c/make_hdoor',
                        cache: false,
                        data: {mother_num: mother_num, file_num: file_num},
                        beforeSend: function () {
                            swal({
                                title: "جاري تسجيل الحضور ... ",
                                text: "",
                                imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                                showConfirmButton: false,
                                allowOutsideClick: false
                            });
                        },
                        success: function (resp) {
                            swal({
                                title: "جاري تسجيل الحضور ... ",
                                text: "",
                                imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                                showConfirmButton: false,
                                allowOutsideClick: false
                            });
                            console.log('resp :: ' + resp);
                            if (resp == 1) {

                                console.log('تم تسجيل الحضور  بنجاح :: ' + resp);
                                text_show = 'تم تسجيل الحضور  بنجاح';
                                type_show = 'success';
                                $('.hdoor_osr_bahth').removeAttr('disabled');
                                $('.progress-bar').css('width', '50%');
                                $('#progress_num').html('50');
                                $('.progress-bar').addClass("progress-bar-striped");
                                $('.progress-bar').removeClass("progress-bar-danger");
                                $('.progress-bar').addClass("progress-bar-success");
                                $('#osr_connect_div').addClass('disabled');

                            } else {
                                console.log('من فضلك قم  ببدء إجراءات التحديث اولاً :: ' + resp);
                                text_show = 'من فضلك قم  ببدء إجراءات التحديث اولاً';
                                type_show = 'warning';

                            }
                            swal({
                                title: text_show,
                                type: type_show,
                                confirmButtonClass: "btn-" + type_show,
                                confirmButtonText: 'تم'
                            });
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            console.error(xhr.responseText);
                            console.error(thrownError);
                            swal.close();
                        }
                    });
                }
            });
    }

    function start_hdoor(mother_num, file_num) {
        swal({
                title: "هل تريد بدء إجراءات التحديث  ؟",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-warning",
                confirmButtonText: "نعم",
                cancelButtonText: "لا",
                closeOnConfirm: true
            },
            function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        type: 'post',
                        url: '<?php echo base_url() ?>family_controllers/osr_crm/Osr_crm_c/start_hdoor',
                        cache: false,
                        data: {mother_num: mother_num, file_num: file_num},
                        beforeSend: function () {
                            swal({
                                title: "جاري بدء إجراءات التحديث  ... ",
                                text: "",
                                imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                                showConfirmButton: false,
                                allowOutsideClick: false
                            });
                        },
                        success: function (resp) {
                            if (resp == 1) {
                                swal({
                                    title: 'تم بدء إجراءات التحديث   بنجاح',
                                    type: 'success',
                                    confirmButtonText: 'تم'
                                });
                                $('.start_bahth').removeAttr('disabled');
                                $('.progress-bar').css('width', '25%');
                                $('#progress_num').html('25');
                                $('.progress-bar').addClass("progress-bar-striped");
                                $('#osr_connect_div').removeClass('disabled');
                            } else {
                                swal({
                                    title: 'تم بدء إجراءات التحديث   من قبل ',
                                    type: 'warning',
                                    confirmButtonText: 'تم'
                                });
                            }

                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            console.error(xhr.responseText);
                            console.error(thrownError);
                            swal.close();
                        }
                    });
                } else {
                    swal.close();
                }
            });
    }

    function end_taslem(mother_num, file_num) {
        swal({
                title: "هل تريد إنهاء إستلام وتسلم المعاملات  ؟",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-warning",
                confirmButtonText: "نعم",
                cancelButtonText: "لا",
                closeOnConfirm: true
            },
            function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        type: 'post',
                        url: '<?php echo base_url() ?>family_controllers/osr_crm/Osr_crm_c/end_taslem',
                        cache: false,
                        data: {mother_num: mother_num, file_num: file_num},
                        beforeSend: function () {
                            swal({
                                title: "جاري إنهاء إستلام وتسلم المعاملات  ... ",
                                text: "",
                                imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                                showConfirmButton: false,
                                allowOutsideClick: false
                            });
                        },
                        success: function (resp) {
                            if (resp == 1) {

                                swal({
                                    title: 'تم إنهاء إستلام وتسلم المعاملات بنجاح',
                                    type: 'success',
                                    confirmButtonText: 'تم'
                                });
                                $('.taslem_mosdand').removeAttr('disabled');
                                $('.progress-bar').css('width', '75%');
                                $('#progress_num').html('75');
                                $('.progress-bar').removeClass("progress-bar-danger");
                                $('.progress-bar').addClass("progress-bar-success");
                            } else {
                                swal({
                                    title: 'تم إنهاء إستلام وتسلم المعاملات من قبل ',
                                    type: 'warning',
                                    confirmButtonText: 'تم'
                                });
                            }
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            console.error(xhr.responseText);
                            console.error(thrownError);
                            swal.close();
                        }
                    });
                } else {
                    swal.close();
                }
            });
    }

    function end_review(mother_num, file_num) {
        swal({
                title: "هل تريد إنهاء إستلام وتسلم المعاملات  ؟",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-warning",
                confirmButtonText: "نعم",
                cancelButtonText: "لا",
                closeOnConfirm: true
            },
            function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        type: 'post',
                        url: '<?php echo base_url() ?>family_controllers/osr_crm/Osr_crm_c/end_review',
                        cache: false,
                        data: {mother_num: mother_num, file_num: file_num},
                        beforeSend: function () {
                            swal({
                                title: "جاري إنهاء المراجعة  ... ",
                                text: "",
                                imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                                showConfirmButton: false,
                                allowOutsideClick: false
                            });
                        },
                        success: function (resp) {
                            swal({
                                title: 'تم إنهاء المراجعة بنجاح',
                                type: 'success',
                                confirmButtonText: 'تم'
                            });
                            $('.end_review ').removeAttr('disabled');
                            $('.progress-bar').css('width', '90%');
                            $('#progress_num').html('90');
                            $('.progress-bar').removeClass("progress-bar-danger");
                            $('.progress-bar').addClass("progress-bar-success");
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            console.error(xhr.responseText);
                            console.error(thrownError);
                            swal.close();
                        }
                    });
                } else {
                    swal.close();
                }
            });
    }

</script>
<script>
    function GetFileConidtion(basic_id) {
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>family_controllers/Family/GetFileConidtion',
            data: {basic_id: basic_id},
            dataType: 'html',
            cache: false,
            success: function (html) {
                $("#FileConidtion").html(html);
            }
        });
    }
</script>
<script>
    function GetFileUpdate(basic_id) {
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>family_controllers/Family/GetFileUpdate',
            data: {basic_id: basic_id},
            dataType: 'html',
            cache: false,
            success: function (html) {
                $("#FileUpdate").html(html);
            }
        });
    }
</script>
<script>
    function GetFileTracking(basic_id) {
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>family_controllers/Family/GetFileTracking',
            data: {basic_id: basic_id},
            dataType: 'html',
            cache: false,
            success: function (html) {
                $("#FileTracking").html(html);
            }
        });
    }
</script>
<script>
    function change_file_status(process_id, title, mom) {
        var reason_ids = [];
        $(".check" + mom + ':radio:checked').each(function () {
            reason_ids.push($(this).val());
        })
        if (reason_ids.length == 0) {
            alert("من فضلك اختر السبب اولا");
            return;
        }
        var reason = $(".check" + mom + ':radio:checked').val();
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>family_controllers/Family/change_file_status",
            data: {process_id: process_id, title: title, mom: mom, reason: reason},
            success: function (d) {
                alert("تم تغيير حاله الملف");
                location.reload();
            }
        });
    }
</script>
<script>
    function put_researcher_id() {
        var dataString = $(".form_researcher_id").serialize();
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() . 'family_controllers/Family/AddRelations_in/' . $basic_data_family['mother_national_num'] ?>',
            data: dataString,
            dataType: 'html',
            cache: false,
            success: function (html) {
                alert("تم ربط الاسرة ");
                location.reload();
            }
        });
        return false;
    }
</script>
<script>
    /* function print_prime_houe(mother_num) {
         var request = $.ajax({
      
             url: "<?=base_url() . '/family_controllers/Family/print_prime_houe'?>",
            type: "POST",
            data: {mother_num: mother_num},
        });
        request.done(function (msg) {
            var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(msg);
            WinPrint.document.close();
            WinPrint.focus();
  
        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });
    }*/
</script>
<script>
    function check_all(id) {
        var inputs = document.querySelectorAll('.check_large' + id);
        var input = document.getElementById('check_all_not' + id).checked;
        for (var i = 0; i < inputs.length; i++) {
            inputs[i].checked = input;
        }
    }

    function check_length_num(this_input, max_lenth, span_id) {
        if ($(this_input).val().length != max_lenth) {
            $(this_input).css("border-color", "red");
            $("#" + span_id).html("الرقم مكون من" + max_lenth + "أرقام");
            // $('button[type="submit"]').attr("disabled","disabled");
        } else {
            $(this_input).css("border-color", "green");
            $("#" + span_id).html("");
            //$('button[type="submit"]').removeAttr("disabled");
        }
    }

    function print_prime_houe(mother_num) {
        var request = $.ajax({
            // print_resrv -- print_contract
            url: "<?=base_url() . '/family_controllers/Family/print_prime_houe'?>",
            type: "POST",
            data: {mother_num: mother_num},
        });
        request.done(function (msg) {
            //this code for print
            var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(msg);
            WinPrint.document.close();
            WinPrint.focus();
            /* WinPrint.print();
        WinPrint.close();*/
            //    end code
        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });
    }
</script>
