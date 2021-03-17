<section class="banner_page" style="background-color: #2d2b2b !important;">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>web">الرئيسية</a></li>
            <li><a href="<?php echo base_url(); ?>web/family_register">إنضمام مستفيد</a></li>

        </ol>
    </div>
</section>
<section class="main_content pbottom-30 ptop-30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2">
                <?php
                //                $data['id_page'] = $id_page;
                //                $data['name_page'] = $name_page;
                //                $this->load->view('web/family_profile/profile_sidebar', $data); ?>
                <div class="profile-sidebar">
                    <a href="<?php echo base_url() . 'Web/family_log_out' ?>"
                       class="btn btn-danger btn-block btn-compose-email"><i
                                class="fa fa-sign-out"></i> تسجيل الخروج </a>
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="sidebar-heading">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion"
                                       href="#collapseSide1" aria-expanded="true" aria-controls="collapseSide1">
                                      معلومات الملف
                                    </a>
                                </h4>
                            </div>

                            <div id="collapseSide1" class="panel-collapse collapse in " role="tabpanel"
                                 aria-labelledby="sidebar-heading">
                                <div class="panel-body">
                                    <ul class="nav nav-pills nav-stacked nav-email shadow mb-20">
        <li class="  " id="profile_family">
            <a onclick="get_data('profile_family');show_tab('profile_family')"
               href="#profile_family" role="tab" data-toggle="tab">
                <i class="fa fa-list"></i> بيانات أساسية<span
                        class="label pull-right"></span>
            </a>
        </li>
                                        <li class=" " id="father">
                                            <a onclick="get_data('father');show_tab('father')" href="#father" role="tab"
                                               data-toggle="tab">
                                                <i class="fa fa-list"></i> بيانات الأب <span
                                                        class="label pull-right"></span>
                                            </a>
                                        </li>

                                        <li class="">
                                            <a onclick="get_data('mother'); show_tab('mother')" href="#mother"
                                               role="tab" data-toggle="tab"
                                            >
                                                <i class="fa fa-list"></i> بيانات الأم
                                            </a>
                                        </li>
                                        <li class="">
                                            <a onclick="get_data('add_wakel');show_tab('add_wakel')" href="#add_wakel"
                                               role="tab" data-toggle="tab">
                                                <!--href="<?php //echo base_url().'Web/add_wakel' ?>"-->
                                                <i class="fa fa-list"></i> بيانات الوكيل
                                            </a>
                                        </li>

                                        <li class="">
                                            <a onclick="get_data('family_members');show_tab('family_members')"
                                               href="#family_members" role="tab" data-toggle="tab">
                                                <!--                                            <a href="-->
                                                <?php //echo base_url().'Web/family_members' ?><!--">-->
                                                <i class="fa fa-list"></i> بيانات افراد الاسرة
                                            </a>
                                        </li>
                                        <li class="">
                                            <a onclick="get_data('family_money');show_tab('family_money')"
                                               href="#family_money" role="tab" data-toggle="tab">
                                                <i class="fa fa-list"></i> مصادر الدخل والإلتزامات<span
                                                        class="label pull-right"></span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a onclick="get_data('add_responsible_account'); show_tab('add_responsible_account')"
                                               href="#add_responsible_account" role="tab" data-toggle="tab">
                                                <i class="fa fa-list"></i> بيانات الحساب البنكي
                                            </a>
                                        </li>
                                        <li class="">
                                            <a onclick="get_data('attach_files'); show_tab('attach_files')"
                                               href="#attach_files" role="tab" data-toggle="tab">
                                                <i class="fa fa-list"></i> رفع الوثائق
                                            </a>
                                        </li>


<li class="">
    <a onclick="get_data('account_setting'); show_tab('account_setting')"
       href="#attach_files" role="tab" data-toggle="tab">
        <i class="fa fa-cog"></i> إعدادات الحساب
    </a>

</li>


                                    </ul><!-- /.nav -->
                                </div>
                            </div>
                        </div>
                        <!--
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="sidebar-heading2">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                                       href="#collapseSide2" aria-expanded="false" aria-controls="collapseSide2">
                                        طلب خدمات
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseSide2"
                                 class="panel-collapse collapse "
                                 role="tabpanel"
                                 aria-labelledby="sidebar-heading2">
                                <div class="panel-body">
                                    <ul class="nav nav-pills nav-stacked nav-email mb-20 rounded shadow">
                                        <li class="">
                                            <a onclick="get_data('service_order')">
                                                <i class="fa fa-question"></i> طلب خدمة
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="#">
                                                <i class="fa fa-question"></i> طلب تغيير حساب
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="sidebar-heading3">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                                       href="#collapseSide3" aria-expanded="false" aria-controls="collapseSide3">
                                        الإستعلامات
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseSide3"
                                 class="panel-collapse collapse "
                                 role="tabpanel"
                                 aria-labelledby="sidebar-heading3">
                                <div class="panel-body">
                                    <ul class="nav nav-pills nav-stacked nav-email mb-20 rounded shadow">
                                        <li class="">
                                            <a href="<?php echo base_url() . 'Web/report_sarf' ?>"> <i
                                                        class="fa fa-file-o"></i> تقارير المساعدات</a></li>
                                        <li class="">
                                            <a href="#"> <i class="fa fa-file-o"></i> تقارير الأنشطة والبرامج</a>
                                        </li>


                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="sidebar-heading4">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                                       href="#collapseSide4" aria-expanded="false" aria-controls="collapseSide4">
                                        الإشعارات
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseSide4"
                                 class="panel-collapse collapse  "
                                 role="tabpanel"
                                 aria-labelledby="sidebar-heading4">
                                <div class="panel-body">
                                    <ul class="nav nav-pills nav-stacked nav-email mb-20 rounded shadow">
                                        <li class="">
                                            <a href="#"><i class="fa fa-bell"></i> إشعارات ملف <span
                                                        class="label label-info pull-right inbox-notification">5</span></a>
                                        </li>
                                        <li class="">
                                            <a href="#"><i class="fa fa-bell"></i> إشعارات المساعدات المالية <span
                                                        class="label label-info pull-right inbox-notification">5</span></a>
                                        </li>
                                        <li class="">
                                            <a href="#"><i class="fa fa-bell"></i> إشعارات المساعدات العينية <span
                                                        class="label label-info pull-right inbox-notification">5</span></a>
                                        </li>
                                        <li class="">
                                            <a href="#"><i class="fa fa-bell"></i> إشعارات الأنشطة والبرامج <span
                                                        class="label label-info pull-right inbox-notification">5</span></a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
-->
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="sidebar-heading5">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                                       href="#collapseSide5" aria-expanded="false" aria-controls="collapseSide5">
                                        تواصل معنا
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseSide5"
                                 class="panel-collapse collapse "
                                 role="tabpanel"
                                 aria-labelledby="sidebar-heading5">
                                <div class="panel-body">
                                    <ul class="nav nav-pills nav-stacked nav-email mb-20 rounded shadow">
<!--<li class="">
    <a href="#"><i class="fa fa-envelope-o"></i> الدردشة </a>
</li>-->
<!--
<li class="<?php  if (($id_page =='3')&&($name_page =='data' ) )echo  'active';else echo ''; ?>">
<a target="_blank" href="<?php echo base_url() . 'Web/gam3ia_contact' ?>">
    <i class="fa fa-envelope-o"></i>  أرسل للجمعية
</a>
</li>
-->
<li class="">
  <a  onclick="get_data('gam3ia_contact'); show_tab('gam3ia_contact')"
        href="#gam3ia_contact" role="tab" data-toggle="tab"
    >
        <i class="fa fa-envelope-o"></i> أرسل للجمعية
    </a>
    </li>


                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
            <div class="col-sm-10 " id="page_body">

<!--<img src="http://localhost/ABNAAv1/asisst/admin_asset/img/loader.png">-->
            </div>
        </div>
    </div>
</section>
<script type="text/javascript" src="<?php echo base_url() ?>asisst/web_asset/js/jquery-1.10.1.min.js"></script>
<!--<script src="--><?//= base_url() . 'asisst/web_asset/'?><!--js/bootstrap-arabic.min.js"></script>-->
<!--<script src="--><?//= base_url() . 'asisst/web_asset/'?><!--js/bootstrap-select.min.js"></script>-->
<!--<script type="text/javascript" src="--><?php //echo base_url() ?><!--asisst/web_asset/js/hijri_converter.js"></script>-->
<!--<script type="text/javascript" src="--><?php //echo base_url() ?><!--asisst/web_asset/js/jquery.mask.min.js"></script>-->

<script>
    $(document).ready(function () {
        get_data('profile_family');
        show_tab('profile_family');
    });

    function show_tab(id) {
        $('a[href="#' + id + '"]').tab('show');
    }

    function get_data(method) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>registration/Family/" + method,
            cache: true,
            beforeSend: function () {
                // $('#page_body').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
                $('#page_body').html('<div class="text-center"> <img scr="<?php echo base_url();?>asisst/admin_asset/img/loader.png"></div>');
            },
            success: function (d) {
                $('#page_body').html(d);
                // $('.placeholder').mask("00/00/0000", {placeholder: "__/__/____"});

                // $('.selectpicker').selectpicker("refresh");
                // reset_file_input('file');
            }
        });
    }

    // get_data('profile_family');

    function get_date_mask() {

        $('.placeholder').mask("00/00/0000", {placeholder: "__/__/____"});

    }

</script>

<script>
    function validate_number(evt) {
        var theEvent = evt || window.event;
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode(key);
        var regex = /[0-9]|\./;
        if (!regex.test(key)) {
            theEvent.returnValue = false;
            if (theEvent.preventDefault) theEvent.preventDefault();
        }
    }

</script>

<script language=Javascript>
    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>
<script>
    function check_length_num(this_input, max_lenth, span_id) {
        if ($(this_input).val().length != max_lenth) {
            $(this_input).css("border-color", "red");
            $("#" + span_id).html("الرقم مكون من" + max_lenth + "أرقام");
            $('button[type="button"]').attr("disabled", "disabled");
        } else {
            $(this_input).css("border-color", "green");
            $("#" + span_id).html("");
            $('button[type="button"]').removeAttr("disabled");
        }
    }
</script>
<script>
    function chek_length(inp_id) {
        var inchek_id = "#" + inp_id;
        var inchek = $(inchek_id).val();
        if (inchek.length < 10) {
            document.getElementById("" + inp_id + "_span").style.color = '#F00';
            document.getElementById("" + inp_id + "_span").innerHTML = 'أقصي عدد 10 ارقام';
            document.getElementById("buttons").setAttribute("disabled", "disabled");
        }
        if (inchek.length > 10) {
            document.getElementById("" + inp_id + "_span").style.color = '#F00';
            document.getElementById("" + inp_id + "_span").innerHTML = 'أقصي عدد 10 ارقام';
            document.getElementById("buttons").setAttribute("disabled", "disabled");
        }
        if (inchek.length == 10) {
            document.getElementById("buttons").removeAttribute("disabled", "disabled");
        }
    }
</script>
<script type="text/javascript">
    $('.btnNext').click(function () {
        $('.nav-tabs > .active').next('li').find('a').trigger('click');
    });
    $('.btnPrevious').click(function () {
        $('.nav-tabs > .active').prev('li').find('a').trigger('click');
    });
</script>

<script>
    function getAge() {
        var nowYear = (new Date()).getFullYear();
        var myAge = (nowYear - $('#CYear').val());
        $('#myage').val(myAge)
    }
</script>
<script>
    function chech_year() {
        var year = $('#HYear').val();
        var nowyear =<?php echo $current_year; ?>;
        if (year >= nowyear) {
            $('#HYear').val('');
            $('#CYear').val('');
            $('#HMonth').val('');
            $('#CMonth').val('');
            $('#HDay').val('');
            $('#CDay').val('');
        }
    }
</script>
