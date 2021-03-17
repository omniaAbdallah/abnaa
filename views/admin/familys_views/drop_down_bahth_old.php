<a target="_blank" class="btn btn-sm btn-success"
   href="<?php echo base_url(); ?>family_controllers/osr_crm/Osr_crm_c/add_crm_osr/<?php echo $mother_num; ?>">
    التواصل مع الاسرة </a>
<a onclick="make_hdoor(<?php echo $mother_num; ?>,<?php echo $file_num; ?>)" class="btn btn-sm btn-success">
    حضور الأسرة </a>
<div class="btn-group ">
    <button type="button" class="btn btn-success">تسليم المعاملات</button>
    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenu3">
        <li class="dropdown-header"> الخطابات</li>
        <li><a target="_blank"
               href="<?php echo base_url(); ?>family_controllers/Family_letter/Civil_Status/<?php echo $mother_num; ?>/<?php echo $file_num; ?>">خطاب
                الاحوال المدنيه </a></li>
        <li><a target="_blank"
               href="<?php echo base_url(); ?>family_controllers/Family_letter/Passports/<?php echo $mother_num; ?>/<?php echo $file_num; ?>">خطاب
                الجوازات </a></li>
        <li><a target="_blank"
               href="<?php echo base_url(); ?>family_controllers/Family_letter/Insurance_letter_father/<?php echo $mother_num; ?>/<?php echo $file_num; ?>">خطاب
                تأمينات ( الأب ) </a></li>
        <li><a target="_blank"
               href="<?php echo base_url(); ?>family_controllers/Family_letter/Insurance_letter/<?php echo $mother_num; ?>/<?php echo $file_num; ?>">خطاب
                تأمينات ( الأم ) </a></li>
        <li><a target="_blank"
               href="<?php echo base_url(); ?>family_controllers/Family_letter/Retirement_letter/<?php echo $mother_num; ?>/<?php echo $file_num; ?>">خطاب
                التقاعد </a></li>
        <li><a target="_blank"
               href="<?php echo base_url(); ?>family_controllers/Family_letter/daman_letter/<?php echo $mother_num; ?>/<?php echo $file_num; ?>">خطاب
                الضمان</a></li>
        <li role="separator" class="divider"></li>
        <li class="dropdown-header">المستندات</li>
        <li><a target="_blank"
               href="<?= base_url() ?>family_controllers/Family/talb_mostandat/<?= $mother_num ?>"> اضافه
                المستندات
            </a></li>
        <li><a href="" onclick="print_prime_houe(<?= $mother_num ?>);">
                طباعة كروكي المنزل
            </a></li>
    </ul>
</div>

<a data-toggle="modal" data-target="#modal-process-procedure"
   class="btn btn-sm btn-primary"
   onclick="GetTransferPage(<?php echo $mother_num; ?>)"> تحويل الي الباحث
</a>

<div class="btn-group ">

    <button type="button" class="btn btn-danger"> إجراءات تحديث الملف
    </button>
    <button type="button"
            class="btn btn-danger dropdown-toggle"
            data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <ul class="dropdown-menu">
        <li><a target="_blank"
               href="<?php echo base_url(); ?>family_controllers/osr_crm/Osr_crm_c/add_crm_osr/<?php echo $mother_num; ?>">
                التواصل مع الاسرة </a></li>
        <li><a onclick="make_hdoor(<?php echo $mother_num; ?>,<?php echo $file_num; ?>)" >
                حضور الأسرة </a></li>
        <li><a target="_blank"
               href="<?= base_url() ?>family_controllers/Family/talb_mostandat/<?= $mother_num ?>/1">
                تسليم المعاملات
            </a></li>
        <li><a data-toggle="modal" data-target="#modal-process-procedure"
               onclick="GetTransferPage(<?php echo $mother_num; ?>)"> تحويل الي الباحث
            </a></li>
        <li><a target="_blank"
               href="<?= base_url(); ?>family_controllers/osr_crm/Osr_crm_zyraat_c/add_crm/<?= $mother_num ?>">
                إنشاء
                موعد زيارة
            </a></li>
    </ul>
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
    function GetTransferPage(value) {
        if (value != 0 && value != '') {
            var dataString = 'id=' + value;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>family_controllers/Family_transformation/GetTransferPage_drob_dwon',
                data: {value: value},
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
                        url: '<?php echo base_url() ?>family_controllers/Family/make_hdoor',
                        cache: false,
                        data:{mother_num:mother_num,file_num:file_num},
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
                                title: 'تم تسجيل الحضور  بنجاح',
                                type: 'success',
                                confirmButtonText: 'تم'
                            });
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