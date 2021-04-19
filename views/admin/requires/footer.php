<style>
    [data-notify="container"][class*="alert-pastel-"] {
        background-color: rgb(255, 255, 238);
        border-width: 0px;
        border-right: 15px solid rgb(255, 240, 106);
        border-radius: 0px;
        box-shadow: 0px 0px 5px rgba(51, 51, 51, 0.3);
        font-family: 'Old Standard TT', serif;
        letter-spacing: 1px;
        right: 150px !important;
        /*  top:87px !important;*/
    }

    .main-footer {
        background: #293949;
        border-top: 1px solid #dee2e6;
        color: #fbfbfb;
        padding: 10px;
    }

    [data-notify="container"].alert-pastel-info {
        border-right-color: rgb(255, 179, 40);
    }

    [data-notify="container"].alert-pastel-danger {
        border-right-color: rgb(255, 103, 76);
    }

    [data-notify="container"][class*="alert-pastel-"] > [data-notify="title"] {
        color: rgb(80, 80, 57);
        display: block;
        font-weight: 700;
        margin-bottom: 5px;
        font-size: 20px;
    }
    [data-notify="container"][class*="alert-pastel-"] > [data-notify="message"] {
        font-weight: 400;
    }
</style>
</div><!--row-->
</div><!--content-->
</div><!--content-wrapper-->
<footer class="main-footer col-xs-12">
    <div class="col-md-3"></div>
    <div class="col-md-6 text-center">
        <strong> جميع الحقوق &copy; محفوظة لدى شركة <a href="#">الأثير تك لتكنولوجيا المعلومات
                © <?php echo date("Y", time()) ?></a>.</strong>
    </div>
    <div class="col-md-3">
        <div class="footer_social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-youtube"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
        </div>
    </div>
</footer>
</div><!--wrapper-->
<a title="الوصول السريع" type="button" class="btn btn-rocket" data-toggle="modal" data-target="#rocket-panel">
    <i class="fa fa-rocket" aria-hidden="true"></i>
</a>
<div class="modal fade" id="rocket-panel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog  " role="document" style="width:75%">
        <div class="modal-content" style="display: inline-block;min-width: 270px;min-height:480px;">
            <div class="modal-body" style="padding: 2px;">
                <div class="rocket-links col-xs-12 no-padding ">
                    <?php
                    function createTreeView2($array)
                    {
                        echo '<ul  class="nav" >';
                        foreach ($array as $row) {
                            if (sizeof($row->sub) > 0) {
                                subLevels2($row->sub, $row->page_title, $row->page_icon_code, $row->page_id, $row->bg_color);
                            } else {
                                echo '<li><a href="' . base_url() . $row->page_link . '">' . $row->page_title . '</a></li>';
                            }
                        }
                        echo '</ul>';
                    }
                    function subLevels2($array, $page_title, $page_icon_code, $id, $bg_color, $level = false)
                    {
                        $link_to = base_url() . "Dash/mian_group/" . $id;
                        if (!empty($array)) {
                            if ($level > 0 && $array[0]->page_link == 2) {
                                $link_to = base_url() . "Dash/sub_sub_main/" . $id . '/' . $id;
                            }
                        }
                        echo '<li>
                          <a href="#"   >
                            <i class="' . $page_icon_code . '" style="color:' . $bg_color . '" ></i>
                
                            <span>' . $page_title . ' </span>
                
                          </a>';
                        if (sizeof($array) > 0 && !empty($array)) {
                            echo ' <ul>';
                            //$link_to=base_url()."Dash/sub_sub_main/".$id.'/'.$id ;
                            foreach ($array as $row) {
                                if (isset($row->sub) && sizeof($row->sub) > 0) {
                                    $level = 1;
                                    if (isset($row->sub[0]->sub) && sizeof($row->sub[0]->sub) > 0) {
                                        $level = false;
                                    }
                                    subLevels2($row->sub, $row->page_title, $row->page_icon_code, $row->page_id, $level);
                                } else {
                                    echo '<li><a href="' . base_url() . $row->page_link . '">' . $row->page_title . ' </a></li>';
                                }
                            }
                            echo '</ul>   ';
                        }
                        echo ' </li>';
                    }

                    ?>
                    <div class="sliding-submenu">
                        <div class="menu-wrapper ">
                            <?php $CI =& get_instance();
                            $CI->load->model('system_management/Model_user_permission');
                            $my_side_bar = $CI->Model_user_permission->get_my_page_permession($_SESSION["user_id"]); ?>
                            <?php if (isset($my_side_bar) && !empty($my_side_bar)) {
                                ?>
                                <?php createTreeView2($my_side_bar); ?>
                            <?php } else { ?>
                                <ul class="nav">
                                    <li class="active">
                                        <a href="<?php echo base_url() . "Dash" ?>">
                                            <i class="fa fa-tachometer"></i>
                                            <span>home</span>
                                        </a>
                                    </li>
                                    <?php if (isset($this->main_groups) && $this->main_groups != null && !empty($this->main_groups)) {
                                        foreach ($this->main_groups as $row) {
                                            ?>
                                            <?php if ($row->count_level > 0) {
                                                $link_to = "Dash/mian_group/" . $row->sub[0]->page_id;
                                            } else {
                                                $link_to = "Dash/sub_sub_main/" . $row->sub[0]->page_id . '/' . $row->sub[0]->page_id;
                                            } ?>
                                            <li>
                                                <a href="<?php echo base_url() . $link_to ?>">
                                                    <i class="<?php echo $row->sub[0]->page_icon_code ?>"></i>
                                                    <span><?php echo $row->sub[0]->page_title ?></span>
                                                </a>
                                                <?php if (!empty($row->sub_pages)) { ?>
                                                    <ul>
                                                        <?php
                                                        foreach ($row->sub_pages as $one_page) { ?>
                                                            <li>
                                                                <a href="<?php echo base_url() . $link_to ?>"><?php echo $one_page->page_title ?></a>
                                                            </li>
                                                        <?php } ?>
                                                    </ul>
                                                <?php } ?>
                                            </li>
                                        <?php }
                                    } ?>
                                </ul>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div><!-- modal-body -->
        </div>
    </div>
</div>
<a title="الوصول السريع" onclick="get_menu();"
   style="    margin-left: 54px;" type="button" class="btn btn-rocket" data-toggle="modal" data-target="#rocket-panel2">
    <i class="fa fa fa-bars" aria-hidden="true"></i>
</a>
<div class="modal" tabindex="-1" role="dialog" id="rocket-panel2">
    <div class="modal-dialog" role="document" style="width:80%">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">القائمة</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="height:800px;">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<script>
    function get_menu() {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>Dash/get_menu",
            success: function (d) {
                $('#rocket_x').html(d);
                //alert(d);
            }
        });
    }
</script>
<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-ui.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/js/bootstrap-arabic.min.js"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/js/bootstrap-select.min.js"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/plugins/bootstrap-toggle/bootstrap-toggle.min.js"
        type="text/javascript"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/js/custom.js"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/js/datepicker.js"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/simple-rating.js"></script>
<!-- lobipanel
<script src="<?php echo base_url() ?>asisst/admin_asset/js/lobipanel.min.js" type="text/javascript"></script>
-->
<script src="<?php echo base_url() ?>asisst/admin_asset/plugins/fileinput/js/fileinput.js"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/js/menu.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/js/wow.min.js"></script>
<script src="<?php echo base_url(); ?>asisst/admin_asset/js/mdtimepicker.js"></script>
<!--- nnot -------------------------->
<script src="<?php echo base_url() ?>asisst/admin_asset/plugins/bootstrap-notify-master/bootstrap-notify.js"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/plugins/chart.js/Chart.min.js"></script>
<?php
if ($_SESSION['role_id_fk'] == 3) { ?>
    <script>
        var min = 1;
        var url = '#';
        var list_count_id = ['agazat_new', 'ozonat_new', 'solaf_new', 'tot-prod_notes', 'tot-prod_sader', 'tot-prod_wared', 'tot-prod_email', 'tot-prod_sader_comments', 'tot-prod_wared_comments', '0', 'pr_contact', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'];
        var list_message = ['اشعار طلب اجازة',
            'اشعار* طلب اذن',
            'اشعار طلب سلفة',
            'اشعار ملاحظة او حدث',
            'اشعار طلب صادر',
            'اشعار طلب وارد',
            'اشعار رسالة بريد ',
            'اشعار صادر:',
            'اشعار وارد:',
            'رسالة جديدة لديك الأن',
            'رسالة جديدة في نقطة تواصل الأسر بالرعاية الإجتماعية',
            'رسالة جديدة في الدردشة',
            'اشعار طلب انتداب',
            'اشعار صرف المسير ',
            'اشعار تحويلات الحساب'
            , "اشعار تحويل طلب تجيل قسط سلفة ",
            "اشعار طلب تعجيل اقساط سلفة ",
            "اشعار طلب تغير حساب بنكي",
            'اشعار طلب تعريف موظف',
            'اشعار طلب التعريف',
            'اشعار طلب تطوع',
            'اشعار   طلب احتياج فرصة تطوعية',
            'اشعار فرصة التطوعية',
            'اشعار فرصة التطوعية',
            'لديك إشعار خاص بإذن الصرف',
            'تم إعتماد طلبكم يرجي طباعة إذن الصرف وإرفاق المستندات وتسليمها للإدارة المالية',
            'تم إعتماد طلب السلفة يرجى طباعة النماذج والتوقيع عليها وإرسالها للموارد البشرية',
            'طلب زيارة اسرة',
            '  لجنة الاسر',
            'لجنة الاسر',
            'اشعار تحويل طلب الاسرة',
            "اسناد الى موظف",
            'اشعار تحويل طلب الاسرة',
            'مهمة جديدة'];
        var list_message_2 = ['', '', '', '', 'لديك ملاحظة جديدة ',
            '', ' ',
            ' تاشيرات والتوجيهات  جديد لك',
            'تاشيرات والتوجيهات  جديد لك',
            'الرجاء الذهاب إلى الدردشة',
            'هناك رسالة تواصل جديدة الأن بالرعاية الإجتماعية ',
            'الرجاء الذهاب إلى الدردشة مع الاسر ',
            '', '', '', '', '', '', '', 'تم الموافقة على طلبك ', '', '', '', '', '', '',
            '', '', 'دعوة لحضور جلسة لجنة الاسر',
            'انتهت جلسة لجنة الاسر الرجاء الاعتماد',
            '',
            'ملفات تحتاج الى اعا,دة بحث',
            '', ''];
        var list_action_id = ['a_agazat_new', 'a_ozonat_new', 'a_solaf_new', 'a_notes_new', 'a_sader_new', 'a_wared_new', 'a_email_new', 'a_sader_comments_new', 'a_wared_comments_new', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'];
        var list_action = ['maham_mowazf/person_profile/Personal_profile/estalmat',
            'maham_mowazf/person_profile/Personal_profile/estalmat',
            'maham_mowazf/person_profile/Personal_profile/estalmat',
            '0',
            'maham_mowazf/archive/main/Main/tnbehat_gdeda',
            'maham_mowazf/archive/main/Main/tnbehat_gdeda',
            'all_secretary/email/Emails/inbox',
            'all_secretary/archive/sader/Add_sader/all_sader',
            'all_secretary/archive/wared/all_wared',
            'all_secretary/chat/s/ChatController',
            'public_relations/gam3ia_contact/Contact/messages_wared',
            'public_relations/family_chat/ChatController',
            'human_resources/employee_forms/Mandate_orders/all_talabat_entdab',
            'maham_mowazf/person_profile/Personal_profile/estalmat',
            'maham_mowazf/person_profile/Personal_profile/estalmat',
            'maham_mowazf/person_profile/Personal_profile/estalmat',
            'maham_mowazf/person_profile/Personal_profile/estalmat',
            'maham_mowazf/person_profile/Personal_profile/estalmat',
            'human_resources/employee_forms/namazegs/Namazeg/all_talabat',
            'human_resources/employee_forms/namazegs/Namazeg/all_talabat',
            'maham_mowazf/person_profile/Personal_profile/estalmat',
            'human_resources/tataw3/Emptatw3/all_talab_moder_tatw3',
            'maham_mowazf/basic_data/Maham/hr_data',
            'human_resources/tataw3/Emptatw3/all_talab_ward',
            'finance_accounting/box/ezn_sarf/Ezn_sarf/all_ozonat_sarf_transformed',
            'finance_accounting/box/ezn_sarf/Ezn_sarf/all_ozonat_sarf_transformed',
            'maham_mowazf/basic_data/Maham/all_solaf',
            'family_controllers/osr_crm/Osr_crm_zyraat_c/all_transformed',
            'family_controllers/LagnaSetting/all_glasat_invation',
            'family_controllers/LagnaSetting/all_glasat_decision',
            'family_controllers/PersonProfile/person_profile',
            'family_controllers/files_need_update/File_research/all_re_files_accep',
            'family_controllers/PersonProfile/person_profile',
            'human_resources/mohma/Mohma_c/all_new_mohma'
        ];
        var list_action_update = ['update_agaza_notification()',
            'update_ezn_notification()',
            'update_solaf_notification()',
            'update_seen_notes()',
            'update_seen_sader()',
            'update_seen_wared()',
            'update_seen_email()',
            'update_seen_sader_comments()',
            'update_seen_wared_comments()',
            '0',
            '0',
            '0',
            'update_seen_entdab()',
            'update_seen_mosayer()',
            'update_seen_accounts()',
            'update_seen_solaf_tagel()',
            'update_seen_solaf_ta3gel()',
            'update_seen_hesabat_banks_orders()',
            'update_seen_order()',
            'update_seen_emp()',
            '0',
            'update_seen_tatw3()',
            '0',
            '0',
            'update_seen_eznsarf()',
            'update_seen_eznsarf()',
            'update_solaf_notification()',
            'update_seen_crm_zyraat()',
            'update_seen_glasat_invation()',
            'update_seen_glasat_decision()',
            'update_seen_basic_transform()',
            'update_seen_esnad_emp()',
            'update_seen_transform()',
            'update_seen_mohma()'];

        function set_count() {
            var count_notify = 0;
            $.each($('.ui-li-count'), function (i, v) {
                if (!isNaN($(this).html())) {
                    count_notify += parseInt($(this).html());
                }
            });
            $('#count_notify').text((count_notify))
        }

        function get_all_notification() {
            console.warn("check_new_notifications ::");
            $.ajax({
                type: 'post',
                url: "<?php echo base_url();?>Notifications/get_all_notification",
                success: function (d) {
                    if (d !== 'null') {
                        var data = JSON.parse(d);
                        var notification = data.notification;
                        for (var i = 0; i < data.notification.length; i++) {
                            url = '#';
                            if (list_action[i] != "#") {
                                url = "<?php echo base_url();?>" + list_action[i];
                            }
                            if (parseInt(notification[i]) > 0) {
                                if (list_message[i]) {
                                    $.notify({
                                        title: list_message[i],
                                        message: list_message_2[i],
                                        url: url,
                                        target: "_self"
                                    }, {
                                        type: 'pastel-info',
                                        delay: 1000 * 40 * min,
                                        template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                                            '<button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="float:left">×</button>' +
                                            '<span data-notify="title">{1}</span>' +
                                            '<span data-notify="message">{2}</span>' +
                                            '<a href="{3}" onclick="' + list_action_update[i] + '"  target="{4}" data-notify="url"></a>' +
                                            '</div>',
                                        offset: {
                                            x: 50,
                                            y: 75
                                        },
                                        animate: {
                                            enter: 'animated rollIn',
                                            exit: 'animated rollOut'
                                        }, onShow: get_sound()
                                    });
                                }
                            }
                        }
                        set_count();
                    } else {
                    }
                }
            });
        }

        function get_sound() {
            var audio = new Audio('https://notificationsounds.com/soundfiles/2d6cc4b2d139a53512fb8cbb3086ae2e/file-sounds-942-what-friends-are-for.mp3');
            audio.play();
        }

        $(document).ready(function () {
            console.warn("check notifications :: ready");
            get_all_notification();
            /*  setInterval(get_all_notification, (1000 * 60 * min));
              get_all_notification_email();
              setInterval(get_all_notification_email, (1000 * 60 * min));*/
            var file_name = '';
            var res = [];
            $.ajaxSetup({
                beforeSend: function () {
                    console.log(' url1 : ' + this.url);
                    if (this.type == 'get') {
                        res = this.url.split("asisst/admin_asset/js/");
                        if (res.length > 0) {
                            res = res[1].split(".js");
                            file_name = res[0];
                        }
                    }
                }, complete: function () {
                    if (file_name === 'jquery-1.10.1.min') {
                        $.ajax({
                            type: 'get',
                            url: "<?php echo base_url();?>asisst/admin_asset/plugins/bootstrap-notify-master/bootstrap-notify.js"
                        });
                    }
                }
            });
        });

        function get_all_notification_email() {
            console.warn("get_all_notification_email ::");
            $.ajax({
                type: 'post',
                url: "<?php echo base_url();?>Notifications/get_all_notification_email",
                success: function (d) {
                    if (d !== 'null') {
                        var data = JSON.parse(d);
                        var notification = data.replay_email;
                        if (parseInt(notification.length) > 0) {
                            for (var i = 0; i < notification.length; i++) {
                                $.notify({
                                    title: 'اشعار رسالة بريد: ',
                                    message: 'لديك رد علي رساله جديد من ' + notification[i].emp_data,
                                    url: "<?php echo base_url() . 'all_secretary/email/Emails/inbox/'?>" + notification[i].email_id_fk,
                                    target: "_self"
                                }, {
                                    type: 'pastel-info',
                                    delay: 1000 * 40 * min,
                                    template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                                        '<button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="float:left">×</button>' +
                                        '<span data-notify="title">{1}</span>' +
                                        '<span data-notify="message">{2}</span>' +
                                        '<a href="{3}" onclick=""  target="{4}" data-notify="url"></a>' +
                                        '</div>',
                                    offset: {
                                        x: 50,
                                        y: 75
                                    },
                                    animate: {
                                        enter: 'animated rollIn',
                                        exit: 'animated rollOut'
                                    }, onShow: get_sound()
                                });
                            }
                        }
                        set_count();
                    } else {
                    }
                }
            });
        }

        function update_seen_basic_transform() {
            $.ajax({
                type: 'get',
                url: '<?php echo base_url() ?>family_controllers/Family_transformation/update_seen_basic_transform',
                dataType: 'html',
                cache: false,
            });
        }

        function update_seen_transform() {
            $.ajax({
                type: 'get',
                url: '<?php echo base_url() ?>family_controllers/Family_transformation/update_seen_transform',
                dataType: 'html',
                cache: false,
            });
        }

        function update_seen_esnad_emp() {
            $.ajax({
                type: 'get',
                url: '<?php echo base_url() ?>family_controllers/Family_transformation/update_seen_esnad_emp',
                dataType: 'html',
                cache: false,
            });
        }
        function update_seen_glasat_decision() {
            $.ajax({
                type: 'get',
                url: '<?php echo base_url() ?>family_controllers/LagnaSetting/update_seen_glasat_decision',
                dataType: 'html',
                cache: false,
            });
        }
        function update_seen_glasat_invation() {
            $.ajax({
                type: 'get',
                url: '<?php echo base_url() ?>family_controllers/LagnaSetting/update_seen_glasat_invation',
                dataType: 'html',
                cache: false,
            });
        }

        function update_seen_crm_zyraat() {
            $.ajax({
                type: 'get',
                url: '<?php echo base_url() ?>family_controllers/osr_crm/Osr_crm_zyraat_c/update_seen_crm_zyraat',
                dataType: 'html',
                cache: false,
            });
        }

        // update_seen_mohma
        function update_seen_mohma() {
            $.ajax({
                type: 'get',
                url: '<?php echo base_url() ?>human_resources/mohma/Mohma_c/update_seen_mohma',
                dataType: 'html',
                cache: false,
            });
        }

        function update_seen_eznsarf() {
            $.ajax({
                type: 'get',
                url: '<?php echo base_url() ?>finance_accounting/box/ezn_sarf/Ezn_sarf/update_seen_eznsarf',
                dataType: 'html',
                cache: false,
            });
        }

        function update_seen_tatw3() {
            $.ajax({
                type: 'get',
                url: '<?php echo base_url() ?>human_resources/tataw3/Emptatw3/update_seen_tatw3',
                dataType: 'html',
                cache: false,
            });
        }
        function update_seen_emp() {
            $.ajax({
                type: 'get',
                url: '<?php echo base_url() ?>human_resources/employee_forms/namazegs/Namazeg/update_seen_emp',
                dataType: 'html',
                cache: false,
            });
        }
        function update_seen_order() {
            $.ajax({
                type: 'get',
                url: '<?php echo base_url() ?>human_resources/employee_forms/namazegs/Namazeg/update_seen_order',
                dataType: 'html',
                cache: false,
            });
        }
        function update_seen_accounts() {
            $.ajax({
                type: 'get',
                url: '<?php echo base_url() ?>finance_accounting/box/forms/transformation_accounts/Transformation_accounts/update_seen_accounts',
                dataType: 'html',
                cache: false,
            });
        }
        function update_seen_hesabat_banks_orders() {
            $.ajax({
                type: 'get',
                url: '<?php echo base_url() ?>human_resources/employee_forms/emp_banks/Emp_banks_c/update_seen_hesabat_banks_orders',
                dataType: 'html',
                cache: false,
            });
        }
        function update_seen_mosayer() {
            $.ajax({
                type: 'get',
                url: '<?php echo base_url() ?>human_resources/employee_forms/Employee_salaries/update_seen_mosayer',
                dataType: 'html',
                cache: false,
            });
        }
        function update_seen_entdab() {
            $.ajax({
                type: 'get',
                url: '<?php echo base_url() ?>human_resources/employee_forms/Mandate_orders/update_seen_entdab',
                dataType: 'html',
                cache: false,
            });
        }
        <?PHP   ?>
        function update_agaza_notification() {
            $.ajax({
                type: 'get',
                url: "<?php echo base_url();?>human_resources/employee_forms/all_agazat/all_orders/Vacation/update_agaza_notification",
                // data: {agaza_rkm: agaza_rkm},
                success: function (d) {
                    $("#agazat_new").html(0);
                    set_count();
                    // check_agaza_notifications();
                }
            });
        }
        function update_seen_solaf_tagel() {
            $.ajax({
                type: 'get',
                url: '<?php echo base_url() ?>human_resources/employee_forms/solaf/Solaf/update_seen_solaf_tagel',
                dataType: 'html',
                cache: false,
            });
        }
        function update_seen_solaf_ta3gel() {
            $.ajax({
                type: 'get',
                url: '<?php echo base_url() ?>human_resources/employee_forms/solaf/Solaf/update_seen_solaf_ta3gel',
                dataType: 'html',
                cache: false,
            });
        }
        function update_ezn_notification() {
            $.ajax({
                type: 'get',
                url: "<?php echo base_url();?>/human_resources/employee_forms/all_ozonat/Ezn_order/update_ezn_notification",
                success: function (d) {
                    $("#ozonat_new").html(0);
                    set_count();
                    // check_ezn_notifications();
                }
            });
        }
        function update_solaf_notification() {
            $.ajax({
                type: 'get',
                url: "<?php echo base_url();?>/human_resources/employee_forms/solaf/Solaf/update_solaf_notification",
                success: function (d) {
                    $("#solaf_new").html(0);
                    set_count();
                    // check_solaf_notifications();
                }
            });
        }
        function update_seen_sader_comments() {
            console.warn(" count :: " + $("#tot-prod_sader").html());
            // var count = $("#tot-prod_sader_comments").html();
            //if (count > 0) {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>all_secretary/archive/sader/Add_sader/update_seen_sader_comments',
                data: {},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $("#tot-prod_sader_comments").html(0);
                    set_count();
                }
            });
            //}
        }
        function update_seen_wared_comments() {
            //  var count = $("#tot-prod_wared_comments").html();
            //if (count > 0) {
            $.ajax({
                type: 'get',
                url: '<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/update_seen_wared_comments',
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $("#tot-prod_wared_comments").html(0);
                    set_count();
                }
            });
            // }
        }
        function update_seen_wared() {
            console.warn(" count :: " + $("#tot-prod_wared").html());
            var count = $("#tot-prod_wared").html();
            if (count > 0) {
                $.ajax({
                    type: 'get',
                    url: '<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/update_seen_wared',
                    dataType: 'html',
                    cache: false,
                    success: function (html) {
                        $("#tot-prod_wared").html(0);
                        set_count();
                    }
                });
            }
        }
        function update_seen_sader() {
            console.warn(" count :: " + $("#tot-prod_sader").html());
            var count = $("#tot-prod_sader").html();
            if (count > 0) {
                $.ajax({
                    type: 'get',
                    url: '<?php echo base_url() ?>all_secretary/archive/sader/Add_sader/update_seen_sader',
                    dataType: 'html',
                    cache: false,
                    success: function (html) {
                        $("#tot-prod_sader").html(0);
                        set_count();
                    }
                });
            }
        }
        function update_seen_email() {
            console.warn(" count :: " + $("#tot-prod_email").html());
            var count = $("#tot-prod_email").html();
            if (count > 0) {
                $.ajax({
                    type: 'get',
                    url: '<?php echo base_url() ?>all_secretary/email/Emails/update_seen_email',
                    dataType: 'html',
                    cache: false,
                    success: function (html) {
                        $("#tot-prod_email").html(0);
                        set_count();
                    }
                });
            }
        }
        function update_seen_notes() {
            console.warn(" count :: " + $("#tot-prod_notes").html());
            var count = $("#tot-prod_notes").html();
            if (count > 0) {
                $.ajax({
                    type: 'get',
                    url: '<?php echo base_url() ?>all_secretary/archive/notes/Notes/update_seen_notes',
                    dataType: 'html',
                    cache: false,
                    success: function (html) {
                        $("#tot-prod_notes").html(0);
                        set_count();
                    }
                });
            }
        }
    </script>
    <!-------------------------------------------------------------->
    <script>
        $(document).ready(function () {
            <?php  $url_con = $this->uri->segment(1);
            if ($url_con == 'maham_mowazf'){  ?>
            /* check_notification();
             check_notification_estlam();
             check_notification_end();*/
            <?php } ?>
        });
    </script>
    <script>
        /*
               $(document).ready(function(){
                   check_notification();
                   check_notification_estlam();
                   check_notification_end();
               });*/
    </script>
    <script>
        function check_notification() {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>maham_mowazf/archive/main/Main/check_notification',
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $("#check_notification").html(html);
                }
            });
        }
        function check_notification_estlam() {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>maham_mowazf/archive/main/Main/check_notification_estlam',
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $("#check_notification_estlam").html(html);
                }
            });
        }
        function check_notification_end() {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>maham_mowazf/archive/main/Main/check_notification_end',
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $("#check_notification_end").html(html);
                }
            });
        }
    </script>
<?php }
?>
<script>
    /*
        function get_my_emails(div_id,method) {
            $.ajax({
                type: 'post',
                url: "<?php echo base_url();?>all_secretary/email/Emails/"+method,
            beforeSend: function () {
                $('#'+div_id).html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#'+div_id).html(d);
                // $('.selectpicker').selectpicker("refresh");
                // reset_file_input('file');
            }
        });
    }
*/
</script>
<!-- neww -->
<script>
    $('.popoverOption').popover();
    $('#popoverOption').popover({trigger: "hover"});
</script>
<script>
    $('.sidebar-toggle').click(function () {
        var sp = $(this).find('span');
        if (sp.hasClass('fa-bars')) {
            sp.removeClass('fa-bars').addClass('fa-times');
        } else {
            sp.removeClass('fa-times').addClass('fa-bars');
        }
    });
</script>
<script id="rendered-js">
    var searchTerm, panelContainerId;
    $('#accordion_search_bar').on('change keyup', function () {
        searchTerm = $(this).val();
        $('#accordion .panel').each(function () {
            panelContainerId = '#' + $(this).attr('id');
            //   alert(panelContainerId);
            // Makes search to be case insesitive
            $.extend($.expr[':'], {
                'contains': function (elem, i, match, array) {
                    return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
                }
            });
            // END Makes search to be case insesitive
            // Show and Hide Triggers
            $(panelContainerId + ':not(:contains(' + searchTerm + '))').hide(); //Hide the rows that done contain the search query.
            $(panelContainerId + ':contains(' + searchTerm + ')').show(); //Show the rows that do!
            // $(panelContainerId + ':contains(' + searchTerm + ')' + ' .collapse').collapse();
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        slidingMenu();
        function slidingMenu() {
            $nav = $(".sliding-submenu .nav");
            $nav_item = $nav.find("li");
            $dropdown = $nav_item.has("ul").addClass("dropdown");
            $back_btn = $nav.find("ul").prepend("<li class='js-back'>رجوع</li>");
            // open sub-level
            $dropdown.on("click", function (e) {
                console.debug('$dropdown.on("click")');
                e.stopPropagation();
                //e.preventDefault();
                $(this).addClass("is-open");
                $(this)
                    .parent()
                    .addClass("slide-out");
            });
            // go back
            $back_btn.on("click", ".js-back", function (e) {
                console.debug('$back_btn.on("click")');
                e.stopPropagation();
                $(this)
                    .parents(".is-open")
                    .first()
                    .removeClass("is-open");
                $(this)
                    .parents(".slide-out")
                    .first()
                    .removeClass("slide-out");
            });
        }
    });
</script>
<script type="text/javascript">
    new WOW().init();
    $(document).ready(function () {
        $("#respMenu").aceResponsiveMenu({
            resizeWidth: '768', // Set the same in Media query
            animationSpeed: 'slow', //slow, medium, fast
            accoridonExpAll: false //Expands all the accordion menu on click
        });
    });
</script>
<script>
    if (!RegExp.escape) {
        RegExp.escape = function (value) {
            return value.replace(/[\-\[\]{}()*+?.,\\\^$|#\s]/g, "\\$&")
        };
    }
    var $medias = $('.block-link'),
        $h4s = $medias.find('h5');
    $('#filter').keyup(function () {
        var filter = this.value,
            regex;
        if (filter) {
            regex = new RegExp(RegExp.escape(this.value), 'i')
            var $found = $h4s.filter(function () {
                return regex.test($(this).text())
            }).closest('.block-link').show();
            $medias.not($found).hide()
        } else {
            $medias.show();
        }
    });
</script>
<script>
    $('.button-notify').click(function () {
        $('#nav-content').toggleClass("openNotify");
    });
</script>
<script>
    function toggleIcon(e) {
        $(e.target)
            .prev('.panel-heading')
            .find(".more-less")
            .toggleClass('glyphicon-plus glyphicon-minus');
    }
    $('.panel-group').on('hidden.bs.collapse', toggleIcon);
    $('.panel-group').on('shown.bs.collapse', toggleIcon);
    /**************/
    var searchTerm, panelContainerId;
    // Create a new contains that is case insensitive
    $.expr[":"].containsCaseInsensitive = function (n, i, m) {
        return (
            jQuery(n).text().toUpperCase().indexOf(m[3].toUpperCase()) >= 0);
    };
    $("#accordion_search_bar").on("change keyup paste click", function () {
        searchTerm = $(this).val();
        $("#accordion > .panel").each(function () {
            panelContainerId = "#" + $(this).attr("id");
            $(
                panelContainerId + ":not(:containsCaseInsensitive(" + searchTerm + "))").hide();
            $(
                panelContainerId + ":containsCaseInsensitive(" + searchTerm + ")").show();
        });
    });
</script>
<script src="<?php echo base_url() ?>asisst/admin_asset/js/js.js"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/js/dashboard.js"></script>
<!--
<script src="<?php echo base_url() ?>asisst/admin_asset/js/jquery.form-validator.js"></script>
<script>
    $(function() {
        // setup validate
        $.validate({
            validateHiddenInputs: true // for live search required
        });
    });
</script>
-->
<script src="<?php echo base_url() ?>asisst/admin_asset/js/form-validator/jquery.form-validator.js"></script>
<script>
    $(function () {
        // setup validate
        $.validate({
            modules: 'logic',
            /*// for live search required*/
            validateHiddenInputs: true
            , lang: 'ar'
        });
    });
</script>
<!---------------------------   required validation  -------------------------------->
<script>
    $(".panel-bd").find(".panel-heading").append("<span class='upChevron clickable'><i class='glyphicon glyphicon-chevron-up'></i></span>  ");
    $(document).on('click', '.panel-heading span.clickable', function (e) {
        var $this = $(this);
        if (!$this.hasClass('panel-collapsed')) {
            $this.parents('.panel').find('.panel-body').slideUp();
            $this.addClass('panel-collapsed');
            $this.find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
        } else {
            $this.parents('.panel').find('.panel-body').slideDown();
            $this.removeClass('panel-collapsed');
            $this.find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
        }
    })
</script>
<script>
    /*function get_emails(div_id, page_load) {
         $.ajax({
             type: 'post',
             url: "<?php echo base_url();?>all_secretary/email/Requestes/load_email_rocket",
            beforeSend: function () {
                $('#' + div_id).html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#' + div_id).html(d);
                $('#input_from_rokect').val(page_load);
                // $('.selectpicker').selectpicker("refresh");
                // reset_file_input('file');
            }
        });
    }*/
    function get_emails(div_id, page_load) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_secretary/email/Emails/load_email_rocket",
            beforeSend: function () {
                $('#' + div_id).html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#' + div_id).html(d);
                $('#input_from_rokect').val(page_load);
                // $('.selectpicker').selectpicker("refresh");
                // reset_file_input('file');
            }
        });
    }
    /*  function reset_file_input(file_id) {
  var url1 = '',
      url2 = '';
  $("#"+file_id).fileinput({
      initialPreview: [],
      initialPreviewAsData: true,
      initialPreviewConfig: [],
      deleteUrl: "",
      overwriteInitial: true,
      maxFileSize: 2000,
      initialCaption: " اختر ملف"
  });
  }
  */
    //29-3-om
    function reset_file_input(file_id) {
        var url1 = '',
            url2 = '';
        $("#" + file_id).fileinput({
            initialPreview: [],
            initialPreviewAsData: true,
            initialPreviewConfig: [],
            deleteUrl: "",
            overwriteInitial: true,
            maxFileSize: 80000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000,
            initialCaption: " اختر ملف"
        });
    }
</script>
<!-- ***************************************************** -->
<script>
    function get_details_mostlma() {
        // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_secretary/archive/main/Main/load_mostlma",
            beforeSend: function () {
                $('#myDiv').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#myDiv').html(d);
            }
        });
    }
</script>
<script>
    function get_details_travel_type() {
        // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_secretary/archive/main/Main/load_travel_type",
            beforeSend: function () {
                $('#myDiv_geha1111').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                get_details_mostlma();
                //update_seen_wared();
                $('#myDiv_geha1111').html(d);
            }
        });
    }
</script>
<!--------------------------------------------- calander -------------------------------------------------------------->
<?php if (isset($footer_calender)) { ?>
    <script src="<?= base_url() ?>asisst/admin_asset/plugins/calendar/js/jquery-ui.custom.min.js"></script>
    <script src="<?= base_url() ?>asisst/admin_asset/plugins/calendar/js/jquery.ui.touch-punch.min.js"></script>
    <script src="<?= base_url() ?>asisst/admin_asset/plugins/calendar/js/moment.min.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>asisst/admin_asset/plugins/calendar/js/fullcalendar.min.js"
            type="text/javascript"></script>
    <script src="<?= base_url() ?>asisst/admin_asset/plugins/calendar/js/bootbox.js"></script>
    <?php $this->load->view($footer_calender); ?>
<?php } ?>
<!--------------------------------------------- calander -------------------------------------------------------------->
<!-- datatables-->
<script src="<?php echo base_url() ?>asisst/admin_asset/js/tables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/js/tables/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/js/tables/buttons.flash.min.js"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/js/tables/jszip.min.js"></script>
<!--
<script src="<?php echo base_url() ?>asisst/admin_asset/js/tables/pdfmake.min.js"></script>
-->
<script src="<?php echo base_url() ?>asisst/admin_asset/js/tables/vfs_fonts.js"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/js/tables/buttons.html5.min.js"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/js/tables/buttons.print.min.js"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/js/tables/buttons.colVis.min.js"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/js/tables/dataTables.colReorder.min.js"></script>
<!--
<script src="<?php echo base_url() ?>asisst/admin_asset/js/tables/dataTables.responsive.min.js" id="responsive-dt"></script>
-->
<script src="<?php echo base_url() ?>asisst/admin_asset/js/tables/plugin.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>
<!--
<script src="<?php echo base_url() ?>asisst/admin_asset/js/themeschange.js"></script>
-->
<script type="text/javascript">
    $("#mother_national_num").bind('input', function (e) {
        $(e.target).keyup();
    });
</script>
<script>
    $(document).ready(function () {
        $('#all').on('click', function () {
            var inputs = $(".tt");
            var error = $(".form-error");
            if (this.checked) {
                $('.cc').each(function () {
                    this.checked = true;
                });
                for (var i = 0; i < inputs.length; i++) {
                    $(inputs[i]).attr("readonly", false);
                    $(inputs[i]).attr("data-validation", "required");
                }
            } else {
                $('.cc').each(function () {
                    this.checked = false;
                });
                for (var i = 0; i < inputs.length; i++) {
                    $(inputs[i]).attr("readonly", "readonly");
                    $(inputs[i]).val("");
                    $(inputs[i]).attr("data-validation", "");
                }
                for (var i = 0; i < error.length; i++) {
                    $(error[i]).html("");
                }
            }
        });
        $('.cc').on('click', function () {
            if ($('.cc:checked').length == $('.cc').length) {
                $('#all').prop('checked', true);
            } else {
                $('#all').prop('checked', false);
            }
        });
    });
</script>
<!-------------------------------------------------------------------------------------------->
<script src="<?php echo base_url() ?>asisst/admin_asset/plugins/tree-view/tree-view.min.js"
        type="text/javascript"></script>
<script type="text/javascript">
    $('.selectpicker').selectpicker("refresh");
</script>
<script src="<?php echo base_url() ?>asisst/admin_asset/datepicker/js/jquery.calendars.min.js"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/datepicker/js/jquery.calendars.ummalqura.min.js"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/datepicker/js/jquery.calendars.ummalqura-ar.js"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/datepicker/js/bootstrap-calendars.min.js"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/datepicker/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">
    $(function () {
        $('#datetimepicker1').datetimepicker({
            format: 'DD/MM/YYYY'
        });
        $('.date_melady').datetimepicker({
            format: 'DD/MM/YYYY'
        });
        $('#popupDatepicker').datetimepicker({
            locale: {calender: 'ummalqura', lang: 'ar'}
        });
        $('#popupDatepicker2').datetimepicker({
            locale: {calender: 'ummalqura', lang: 'ar'}
        });
        $('#inlineDatepicker').datetimepicker({
            locale: {calender: 'ummalqura', lang: 'ar'}
        });
        // Umm ALqura Calendar
        $('.docs-date').datetimepicker({
            locale: {calender: 'ummalqura', lang: 'ar'},
            format: 'DD/MM/YYYY'
        });
    });
</script>
<script src="<?php echo base_url() ?>asisst/admin_asset/js/js.js"></script>
<!--
<script src="<?php echo base_url() ?>asisst/admin_asset/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/ckeditor/samples/js/sample.js"></script>
<script>
    initSample();
    CKEDITOR.replaceClass = 'ckeditor';
</script>
-->
<script>
    $.fn.fileUploader = function (filesToUpload, sectionIdentifier) {
        var fileIdCounter = 0;
        this.closest(".files").change(function (evt) {
            var output = [];
            for (var i = 0; i < evt.target.files.length; i++) {
                fileIdCounter++;
                var file = evt.target.files[i];
                var fileId = sectionIdentifier + fileIdCounter;
                filesToUpload.push({
                    id: fileId,
                    file: file
                });
                var removeLink = "<img src='" + URL.createObjectURL(file) + "' style='width:100%;'/><span class=\"removeFile closebtn\" style='cursor: pointer' data-fileid=\"" + fileId + "\"><h6>x</h6></span>";
                output.push('<li class="ui-state-default" data-order=0 data-id="' + file.lastModified + '">' + removeLink + '</li> ');
            }

            $(this).children(".fileList")
                .append(output.join(""));
            //reset the input to null - nice little chrome bug!
            evt.target.value = null;
        });
        $(this).on("click", ".removeFile", function (e) {
            e.preventDefault();
            var fileId = $(this).parent().children("span").data("fileid");
            // loop through the files array and check if the name of that file matches FileName
            // and get the index of the match
            for (var i = 0; i < filesToUpload.length; ++i) {
                if (filesToUpload[i].id === fileId)
                    filesToUpload.splice(i, 1);
            }
            $(this).parent().remove();
        });
        this.clear = function () {
            for (var i = 0; i < filesToUpload.length; ++i) {
                if (filesToUpload[i].id.indexOf(sectionIdentifier) >= 0)
                    filesToUpload.splice(i, 1);
            }
            $(this).children(".fileList").empty();
        }
        return this;
    };
    (function () {
        var filesToUpload = [];
        var files1Uploader = $("#files1").fileUploader(filesToUpload, "files1");
        $("#uploadBtn").click(function (e) {
            e.preventDefault();
            var dataString = new FormData();
            for (var i = 0, len = filesToUpload.length; i < len; i++) {
                dataString.append("files[]", filesToUpload[i].file);
            }
            //for sending texteara data
            for (instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }
            var other_data = $('form').serializeArray();
            $.each(other_data, function (key, input) {
                dataString.append(input.name, input.value);
            });
            $.ajax({
                url: '<?php echo base_url() ?>' + $("#page_name").val() + '/inbox/' + $("#page_type").val() + '/' + $("#page_id").val(),
                data: dataString,
                processData: false,
                contentType: false,
                type: "POST",
                success: function (data) {
                    //location.reload();
                    window.location = "<?php echo base_url() ?>" + $("#page_name").val() + "/inbox/new/0";
                    console.log("hi");
                    console.log(data);
                    files1Uploader.clear();
                    $("#email_to").val('').selectpicker('refresh');

                    $('#title').val('');
                    CKEDITOR.instances[instance].setData('');
                    $('#images').val('');
                },
                error: function (data) {
                    console.log("shit");
                    console.log(data);
                    //alert("ERROR - " + data.responseText);
                }
            });
        });
    })()
</script>
<script>
    $(document).ready(function () {
        $('#all').on('click', function () {
            if (this.checked) {
                $('.cc').each(function () {
                    this.checked = true;
                    document.getElementById('delet').style.display = "inline";
                });
            } else {
                $('.cc').each(function () {
                    this.checked = false;
                    document.getElementById('delet').style.display = "none";
                });
            }
        });
        $('.cc').on('click', function () {
            if ($('.cc:checked').length == $('.cc').length) {
                $('#all').prop('checked', true);
            } else {
                $('#all').prop('checked', false);
            }
            if ($('.cc:checked').length != 0)
                document.getElementById('delet').style.display = "inline";
            else {
                if ($('.cc:checked').length == 0)
                    document.getElementById('delet').style.display = "none";
            }
        });
    });
</script>
<!--Purchases-->
<script type="text/javascript">
    $('.pricePurchases').keyup(function () {
        var sum_big = parseFloat($("#all_cost_buy").val()) / parseFloat($("#amount_buy").val());
        $('#one_buy_cost').val(sum_big);
    });
</script>
<script type="text/javascript">
    $("#barcodePurchases").on('input', function () {
        if ($('#barcodePurchases').val()) {
            var dataString = 'barcode=' + $('#barcodePurchases').val();
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>Storage/Purchases/Get_item',
                data: dataString,
                cache: false,
                success: function (result) {
                    var obj = JSON.parse(result);
                    console.log(obj);
                    if (obj != '') {
                        $("#product_code").val(obj[0].id);
                        $("#product_code").selectpicker('refresh');
                        $('#product_name').val($("#product_code").find("option:selected").text());
                        $('#unit_id_fk').val($("#product_code").find("option:selected").attr("unitid"));
                        $('#unit_name').val($("#product_code").find("option:selected").attr("unitname"));
                        $('#barcodePurchases').val('');
                    } else {
                        $("#product_code").val('');
                        $("#product_code").selectpicker('refresh');
                        $('#barcodePurchases').val('');
                        $('#unit_name').val('');
                    }
                }
            });
        }
        return false;
    });
</script>
<script type="text/javascript">
    function check_validation() {
        var require = false;
        $(".condimentForm").each(function () {
            if ($(this).attr('class') != 'btn-group bootstrap-select form-control condimentForm') {
                if (!$(this).val()) {
                    require = true;
                }
            }
        });
        if (require == true) {
            alert('يوجد بعض الحقول التي يجب عليك ملئها');
        } else {
            $('#fatora_date').removeAttr('disabled');
            $('#supplier_code').removeAttr('disabled');
            $('#paid_type').removeAttr('disabled');
            $('#box_name').removeAttr('disabled');
            var dataString = $("#formPurchases").serialize();
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>Storage/Purchases/PurchasesSession',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $("#result").html(html);
                }
            });
        }
        return false;
    }
</script>
<script type="text/javascript">
    $("select#product_code").change(function () {
        $('#product_name').val($(this).find("option:selected").text());
        $('#unit_id_fk').val($(this).find("option:selected").attr("unitid"));
        $('#unit_name').val($(this).find("option:selected").attr("unitname"));
    });
</script>
<script type="text/javascript">
    $("#result").on('click', 'span.off', function (e) {
        e.preventDefault();
        var pcode = $(this).attr("data-code");
        var comment = $(this).parent();
        var commentContainer = comment.parent();
        commentContainer.fadeOut();
        var remove_code = 'remove_code=' + pcode;
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>Storage/Purchases/PurchasesSession',
            data: remove_code,
            dataType: 'html',
            cache: false,
            success: function (html) {
                $('#result').html(html);
            }
        });
        e.preventDefault();
    });
</script>
<!--ahmed-->
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
<script src="<?php echo base_url() ?>asisst/admin_asset/js/hijri_converter.js"></script>
<script language="javascript" type="text/javascript"> function moveOnMax(field, nextFieldID) {
        if (field.value.length >= field.maxLength) {
            nextFieldID.focus();
        }
    } </script>
<!------------------------------------------------>
<!-- 
-->
<!-- Counter js -->
<script src="<?php echo base_url() ?>asisst/admin_asset/js/counterup/waypoints.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/js/counterup/jquery.counterup.min.js"
        type="text/javascript"></script>
<script src="<?= base_url() . 'asisst/admin_asset/' ?>js/cheque.js"></script>
<script src="<?= base_url() . 'asisst/admin_asset/' ?>js/jscolor.js"></script>
<script src="<?= base_url() . 'asisst/admin_asset/' ?>js/jQuery.print.js"></script>
<script type="text/javascript">
    //counter
    $('.count-number').counterUp({
        delay: 15,
        time: 3000
    });
</script>
<script type="text/javascript">
    $("input[name=hesab_no3]").click(function () {
        if ($(this).val() == 1) {
            $('#code').removeAttr('readonly');
        } else {
            $('#code').attr('readonly', 'readonly');
        }
    });
</script>
<script type="text/javascript">
    $('#MyFormDalil').submit(function () {
        if ($('#code').val()) {
            var dataString = 'code=' + $('#code').val() + '&id=' + $('#id').val();
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>finance_accounting/dalel/Dalel/checkValidate',
                data: dataString,
                cache: false,
                success: function (result) {
                    var obj = JSON.parse(result);
                    console.log(obj);
                    if (obj != null) {
                        alert("تم إستخدام هذا الكود من قبل");
                        return false;
                    }
                }
            });
        }
    });
</script>
<script type="text/javascript">
</script>
<script type="text/javascript">
    function getSum() {
        var total = 0;
        $(".accountValue").each(function () {
            if ($(this).val()) {
                total += parseFloat($(this).val());
            }
        });
        $('.total').val(total);
        var split = total.toString().split('.');
        $('.rial').html(split[0]);
        $('.halalah').html(split[1]);
        var arabicNumber = '';
        for (var i = 0; i <= split.length - 1; i++) {
            var dataString = 'number=' + split[i];
            $.ajax({
                type: 'post',
                url: '<?=base_url()?>finance_accounting/box/vouch_qbd/Vouch_qbd/getValueArabic',
                data: dataString,
                cache: false,
                success: function (result) {
                    arabicNumber += 'مبلغا وقدره : ' + result;
                    if (i > 1) {
                        $("#valueArabic").val(arabicNumber + ' هلله فقط لا غير');
                        $(".viewArabicValue").html(arabicNumber + ' هلله فقط لا غير');
                    } else {
                        $("#valueArabic").val(arabicNumber + ' ريال فقط لا غير.');
                        $(".viewArabicValue").html(arabicNumber + ' ريال فقط لا غير.');
                    }
                    arabicNumber += ' و ';
                }
            });
        }
        var x = document.getElementById('resultTable');
        if (x.rows.length == 1) {
            $('#deleteRow' + $("#resultTable tr:last").attr('id') + '').css({display: 'none'});
        }
    }
    function addRow() {
        //alert(person_name);
        /********************/
        var id = parseFloat($("#resultTable tr:last").attr('id')) + 1;
        var last_id = parseFloat($("#resultTable tr:last").attr('id'));
        var html = `<tr id="` + id + `">\
    <td>\
        <input type="text" onkeypress="return validate_number(event);" class="form-control accountValue" step="any" id="value` + (len + 1) + `" name="value[]" data-validation="required" aria-required="true" onkeyup="getSum(); $('#view-count-value` + id + `').html($(this).val());" onfocusout="check_val_sheek(this,` + (len + 1) + `)" >\
    </td>\
    <td>\
        <input type="text" class="form-control testButton" name="rqm_hesab[]" id="account_num` + id + `" data-validation="required" aria-required="true" readonly="" onclick="$('#modalID').val(` + id + `); $(this).removeAttr('readonly');" ondblclick="$(this).attr('readonly','readonly'); $('#myModal').modal('show');" style="cursor:pointer;" autocomplete="off" onkeypress="return isNumberKey(event);" onblur="$(this).attr('readonly','readonly')" onkeyup="getAccountName($(this).val(),` + id + `);">\
    </td>\
    <td>\
        <input type="text" class="form-control" name="name_hesab[]" id="account` + id + `" data-validation="required" aria-required="true" readonly="" >\
    </td>\
    <td>\
        <input type="text" class="form-control byan_title" id="byan` + id + `"   name="byan[]" data-validation="required" aria-required="true" value="` + last_about + `">\
    </td>\
    <td id="TD` + id + `">\
        <a href="#" onclick="GetByanByAppend(` + id + `);addRow(); get_select_sheeks('sheek_num[]'); $(this).remove(); $('#deleteRow` + id + `').show();"><i class="fa fa-plus sspan"></i></a>\
        <a class="pull-right" id="deleteRow` + id + `" href="#" onclick="addPlusButton(` + id + `); getSum();"> <i class="fa fa-trash" aria-hidden="true"></i>
        </a>\
    </td>\
</tr>`;
        $("#resultTable").append(html);
        var len = $('#resultTable tr').length;
        var pay_method_sarf = $('input[name=pay_method_sarf]:checked').val();
        //var  last_about = $("#byan1").val();
        if (pay_method_sarf == 3 || pay_method_sarf == 4 || pay_method_sarf == 2) {
            //$('#byan'+id).val(last_about);
            // last_about = $("#resultTable tr:last td input.byan_title").val();
            // alert(id);
            // alert(last_id);
            //var x= id+1;
            var last_about = $('#byan' + last_id).val();
            //$('.byan_title').val(last_about);
            $('#byan' + id).val(last_about);
            //alert(last_about);
        } else {
            //$('.byan_title').val(' ');
            $('#byan' + x).val(' ');
        }
        var pay_method = $('#pay_method_value').val();
        if (pay_method == 2) {
            var len = $('#resultTable tr').length;
            var dataString = 'id=' + len;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>finance_accounting/box/vouch_sarf/vouch_sarf/get_pay_method_page',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $("#sandok_sheek_div").append(html);
                }
            });
        }
        var viewTable = `<tr id="view` + id + `">\
    <td id="view-count-num` + id + `"></td>\
    <td id="view-count-name` + id + `"></td>\
    <td id="view-count-value` + id + `"></td>\
</tr>`;
        $('#sarfViewTable').append(viewTable);
    }
    function addPlusButton(id) {
        if (parseFloat($("#resultTable tr:last").attr('id')) == id) {
            $('#' + id).remove();
            $('#trcheque' + id).remove();
            var last = $("#resultTable tr:last").attr('id');
            $('#TD' + $("#resultTable tr:last").attr('id')).append(`<a href="#" onclick="addRow(); $(this).remove(); $('#deleteRow` + last + `').show();"><i class="fa fa-plus sspan"></i></a>`);
        } else {
            $('#' + id).remove();
            $('#trcheque' + id).remove();
        }
        $('#view' + id).remove();
    }
    $("input[name=pay_method_sarf]").click(function () {
        var val = $(this).val();
        if ($(this).val() == 2) {
            $('.divBank').show();
            $("#sheek_num1").attr('data-validation', 'required');
            $('.bank_dd').hide();
            $('.hesab_bo').show();
        }
        if ($(this).val() == 1) {
            $('.divBank').hide();
            $('.bank_dd').hide();
            $('.hesab_bo').show();
        }
        if ($(this).val() == 3) {
            $('.divBank').hide();
            $('.bank_dd').show();
            $('.hesab_bo').hide();
        }
        if ($(this).val() != 3) {
            var postdata = 'hesab=' + val;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>finance_accounting/box/vouch_sarf/Vouch_sarf/get_hesab_data',
                data: postdata,
                cache: false,
                success: function (json_data) {
                    if (json_data) {
                        var JSONObject = JSON.parse(json_data);
                        $('#rqm_hesab').val(JSONObject['rqm_hesab']);
                        $("#name_hesab").val(JSONObject['name_hesab']);
                    }
                }
            });
        }
    });
    $('#fromVouchSarf').on('change keyup paste blur click', ':input[name=person_name]', function (e) {
        $('.data-person-name').html($('#person_name').val());
    });
    $('#fromVouchSarf').on('change keyup paste blur click', ':input[name=about]', function (e) {
        $('.Sarf-about').html($('#about').val());
    });
    $('#myModalInfo').on('hidden.bs.modal', function () {
        $('.data-person-name').html($('#person_name').val());
    });
    $("input[name=pay_method]").click(function () {
        var val = $(this).val();
        if ($(this).val() == 2) {
            $('.divBank').show();
            $('.bank').removeAttr('disabled');
            $('.bank').attr('data-validation', 'required');
            var number = document.getElementById("all_S").value;
            $('#rased').val(number);
        } else if ($(this).val() == 1) {
            $('.divBank').hide();
            $('.bank').removeAttr('data-validation');
            $('.bank').attr('disabled', 'disabled');
            var number = document.getElementById("all_N").value;
            $('#rased').val(number);
            //  alert(number);
        }
        var postdata = 'hesab=' + val;
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>finance_accounting/box/vouch_qbd/Vouch_qbd/get_hesab_data',
            data: postdata,
            cache: false,
            success: function (json_data) {
                if (json_data) {
                    var JSONObject = JSON.parse(json_data);
                    $('#box_rqm_hesab_id').val(JSONObject['rqm_hesab']);
                    $("#box_name_id").val(JSONObject['name_hesab']);
                    $('#all_q').val(JSONObject['rqm_hesab']);
                }
            }
        });
    });
    $("input[name=searchType]").click(function () {
        if ($(this).val() == 2) {
            $('.divDate').show();
            $('.dateSearch').removeAttr('disabled');
            $('.dateSearch').attr('data-validation', 'required');
        } else {
            $('.divDate').hide();
            $('.dateSearch').removeAttr('data-validation');
            $('.dateSearch').attr('disabled', 'disabled');
        }
    });
</script>
<script language=Javascript>
    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>
<script type="text/javascript">
    function getAccountName(code, id) {
        var dataString = 'code=' + code;
        $.ajax({
            type: 'post',
            url: '<?=base_url()?>finance_accounting/box/vouch_qbd/Vouch_qbd/getAccountName',
            data: dataString,
            cache: false,
            success: function (result) {
                $('#account' + id).val(result);
            }
        });
    }
</script>
<!------------------------------------------------------>
<script type="text/javascript">
    function chooseBank(sel) {
        if (sel.value == 1) {
            $("#chick-width").val(16);
            $("#chick-height").val(9);
            setWidHigh();
        } else if (sel.value == 10) {
            $("#chick-width").val(27);
            $("#chick-height").val(9);
            setWidHigh();
        } else if (sel.value == 19) {
            $("#chick-width").val(27);
            $("#chick-height").val(9);
            setWidHigh();
        }
    }
    function setWidHigh() {
        var chickwidth = $("#chick-width").val();
        var chickheight = $("#chick-height").val();
        $("#cheque").css("width", chickwidth + "cm");
        $("#cheque").css("height", chickheight + "cm");
        if (chickwidth <= 20) {
            $(".elbelad").css("width", chickwidth + "cm");
        } else {
            $(".elbelad").css("width", 20.4 + "cm");
        }
    }
    function changeWidth(value) {
        $("#cheque").css("width", value + "cm");
        if (value <= 20) {
            $(".elbelad").css("width", value + "cm");
        }
    }
    function changeHeight(value) {
        $("#cheque").css("height", value + "cm");
    }
</script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $("#cheque").css('background', 'url(' + e.target.result + ')');
                $("#cheque").attr("data-src", e.target.result)
                imgData = e.target.result;
                localStorage.setItem("imgData", imgData);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#fileupload").change(function () {
        readURL(this);
    });
</script>
<?php if (isset($recordSheek) && $recordSheek != null) { ?>
    <script type="text/javascript">
        $("#cheque").css('background', 'url(<?=base_url() . "uploads/images/sheek/" . $recordSheek["img"]?>)');
    </script>
    <?php
} else {
    ?>
    <script type="text/javascript">
        function checkEdits() {
            var dataImage = localStorage.getItem('imgData');
            $("#cheque").css('background', 'url(' + dataImage + ')');
            $('#img').val(dataImage);
        }
    </script>
<?php } ?>
<script type="text/javascript">
    $(".fzincrease").click(function () {
        var fontSize = parseInt($(".line").css("font-size"));
        fontSize = fontSize + 1 + "px";
        $('#quant').text(fontSize);
        $('#font').val(fontSize);
        $('.line').css({'font-size': fontSize});
    });
    $(".fzdecrease").click(function () {
        var fontSize = parseInt($(".line").css("font-size"));
        fontSize = fontSize - 1 + "px";
        $('#quant').text(fontSize);
        $('#font').val(fontSize);
        $('.line').css({'font-size': fontSize});
    });
    $(".fzbold").click(function () {
        $('.line').toggleClass("boldWeight");
        if ($('#bold').val() == 0) {
            $('#bold').val(1);
        } else {
            $('#bold').val(0);
        }
    });
</script>
<?php if (isset($recordSheek) && $recordSheek != null && $recordSheek['bold'] == 1) { ?>
    <script type="text/javascript">
        $(".fzbold").trigger("click");
        $('#bold').val(<?=$recordSheek['bold']?>);
    </script>
<?php } ?>
<?php if (isset($recordSheek) && $recordSheek != null) { ?>
    <script type="text/javascript">
        $('.line').css({'font-size': `<?=$recordSheek['font']?>`});
        $('.line').css({'color': `#<?=$recordSheek['color']?>`});
    </script>
<?php } ?>
<script type="text/javascript">
    $('#checkbox-Kaab').on('click', function () {
        if (this.checked) {
            $('.cc').each(function () {
                this.checked = true;
            });
            $('#type').val(1);
        } else {
            $('.cc').each(function () {
                this.checked = false;
            });
            $('#type').val(2);
        }
    });
    $('.cc').on('click', function () {
        if ($('.cc:checked').length == $('.cc').length) {
            $('#checkbox-Kaab').prop('checked', true);
        } else {
            $('#checkbox-Kaab').prop('checked', false);
        }
        if ($('.cc:checked').length) {
            $('#type').val(1);
        } else {
            $('#type').val(2);
        }
    });
</script>
<script type="text/javascript"
        src='https://maps.google.com/maps/api/js?key=AIzaSyC4l5QxL27z4w0uuD_5X3g0IRhaUdvb0Q4&?sensor=false&libraries=places'></script>
<script src="<?= base_url() . 'asisst/web_asset/' ?>js/locationpicker.jquery.js"></script>
<script>
    $('#us3').locationpicker({
        mapTypeId: google.maps.MapTypeId.HYBRID,
        location: {
            latitude: 26.37506589156855,
            longitude: 43.97146415710449
        },
        radius: 300,
        zoom: 12,
        inputBinding: {
            latitudeInput: $('#us3-lat'),
            longitudeInput: $('#us3-lon'),
            radiusInput: $('#us3-radius'),
            locationNameInput: $('#us3-address')
        },
        enableAutocomplete: true,
        onchanged: function (currentLocation, radius, isMarkerDropped) {
            // Uncomment line below to show alert on each Location Changed event
            //alert("Location changed. New location (" + currentLocation.latitude + ", " + currentLocation.longitude + ")");
        }
    });
</script>
<script>
    function del(valu) {
        $('.tr' + valu).remove();
//alert(valu);
    }
</script>
<script>
    $('.scrollingtable').DataTable({
        dom: 'Bfrtip',
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
                orientation: 'landscape',
                customize: function (win) {
                    $(win.document.body).append("<style> body{  background-color: #fff;} @page{size:landscape}</style>")
                    $(win.document.body)
                        .css('font-size', '14pt')
                        .prepend(
                            '<img src="<?php echo base_url();  ?>/asisst/admin_asset/img/pills/back2.png" style="position:absolute; top:0; left:0;    width: 500px;" />'
                        );
                    $(win.document.body).find('table')
                        .addClass('compact')
                        .css('table-layout', 'fixed');
                    $(win.document.body).find('thead th:nth-child(1)').css("width", "50px");
                    $(win.document.body).find('thead th:nth-child(6)').css("width", "200px");
                },
                exportOptions: {
                    modifier: {
                        page: 'current'
                    }
                },
                autoPrint: false,
            },
            'colvis'
        ],
        scrollY: '50vh',
        scrollCollapse: true,
        paging: false,
        info: false,
        colReorder: true
    });
</script>
<?php
if ($this->router->fetch_method() != 'index' && $this->router->fetch_class() != 'Dash') {
    ?>
    <script language="javascript">
        function autoResizeDiv() {
            var bodyheight = window.innerHeight;
            var header_height = $(".main-header").height();
            var footer_height = $(".main-footer").height();
            var neg = header_height + footer_height + 80;
            // alert(neg);
            var fixed_height = bodyheight - neg;
            //  alert(fixed_height);
            //  $('.content-wrapper').style.height = window.innerHeight +'px';
            // $('.content-wrapper').style.height = bodyheight +'px';
            $(".content").css('height', fixed_height);
        }
        function autoResizeDivMobile() {
            $('.content').style.height = 'auto';
        }
        var mq = window.matchMedia("(min-width: 767px)");
        if (mq.matches) {
            // the width of browser is more then 767px
            window.onresize = autoResizeDiv;
            autoResizeDiv();
        } else {
            // the width of browser is less then 767px
            window.onresize = autoResizeDivMobile;
            autoResizeDivMobile();
        }
    </script>
<?php } else {
    ?>
    <script language="javascript">
        function autoResizeDiv() {
            var bodyheight = window.innerHeight;
            var header_height = $(".main-header").height();
            var footer_height = $(".main-footer").height();
            var neg = header_height + footer_height;
            var fixed_height = bodyheight - neg - 20;
            $(".content").css('height', fixed_height);
        }
        function autoResizeDivMobile() {
            $('.content').style.height = 'auto';
        }
        var mq = window.matchMedia("(min-width: 767px)");
        if (mq.matches) {
            // the width of browser is more then 767px
            window.onresize = autoResizeDiv;
            autoResizeDiv();
        } else {
            // the width of browser is less then 767px
            window.onresize = autoResizeDivMobile;
            autoResizeDivMobile();
        }
    </script>
    <?php
}
?>
<script type="text/javascript">
    function requestFullScreen() {
        if (!document.fullscreenElement &&    // alternative standard method
            !document.mozFullScreenElement && !document.webkitFullscreenElement && !document.msFullscreenElement) {  // current working methods
            if (document.documentElement.requestFullscreen) {
                document.documentElement.requestFullscreen();
            } else if (document.documentElement.msRequestFullscreen) {
                document.documentElement.msRequestFullscreen();
            } else if (document.documentElement.mozRequestFullScreen) {
                document.documentElement.mozRequestFullScreen();
            } else if (document.documentElement.webkitRequestFullscreen) {
                document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
            }
        } else {
            if (document.exitFullscreen) {
                document.exitFullscreen();
            } else if (document.msExitFullscreen) {
                document.msExitFullscreen();
            } else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
            } else if (document.webkitExitFullscreen) {
                document.webkitExitFullscreen();
            }
        }
    }
</script>
<script>
    function showTime() {
        var date = new Date();
        var h = date.getHours(); // 0 - 23
        var m = date.getMinutes(); // 0 - 59
        var s = date.getSeconds(); // 0 - 59
        var session = "   صباحــــاَ  ";
        if (h == 0) {
            h = 12;
        }
        if (h > 12) {
            h = h - 12;
            session = "   مســــاءَ   ";
        }
        h = (h < 10) ? "0" + h : h;
        m = (m < 10) ? "0" + m : m;
        s = (s < 10) ? "0" + s : s;
        var time = h + ":" + m + ":" + s + "  ";
        document.getElementById("MyClockDisplay").innerText = time;
        document.getElementById("MyClockDisplay").textContent = time;
        document.getElementById("session-name").innerText = session;
        document.getElementById("session-name").textContent = session;
        setTimeout(showTime, 1000);
    }
    showTime();
</script>
<?php /*
 ?>
<script src="<?=base_url().'asisst/admin_asset/js/'?>jquery.canvasjs.min.js"></script>
<script type="text/javascript">
  window.onload = function () {
    var options1 = {
      title: {
        text: "الحضور والإنصراف",
        fontWeight: "bolder",
        fontColor: "#008B8B",
        fontfamily: "hl",        
        fontSize: 25,
        padding: 10
      },
      subtitles: [{
        text: "تقرير احصائى"
      }],
      animationEnabled: true,
      data: [{
        type: "pie",
        startAngle: 40,
        toolTipContent: "<b>{label}</b>: {y}%",
        showInLegend: "true",
        legendText: "{label}",
        indexLabelFontSize: 16,
        indexLabel: "{label} - {y}%",
        dataPoints: [
        { y: 77, label: "حاضر" ,backgroundColor:"red" },
        { y: 23, label: "غائب" }
        ]
      }]
    };
    $("#chartContainer1").CanvasJSChart(options1);
     var options2 = {
       animationEnabled: true,
  title:{
    text: "إستثناءات الحضور و الإنصراف"
  },
  axisX: {
    valueFormatString: "DD MMM,YY"
  },
  axisY: {
    title: "عدد الموظفين",
  },
  legend:{
    cursor: "pointer",
    fontSize: 16,
    itemclick: toggleDataSeries
  },
  toolTip:{
    shared: true
  },
  data: [{
    name: "غائب",
    type: "spline",
    yValueFormatString: "#0.## ",
    showInLegend: true,
    dataPoints: [
      { x: new Date(2019,6,24), y: 1 },
      { x: new Date(2019,6,25), y: 31 },
      { x: new Date(2019,6,26), y: 10 },
      { x: new Date(2019,6,27), y: 29 },
      { x: new Date(2019,6,28), y: 31 },
      { x: new Date(2019,6,29), y: 5 },
      { x: new Date(2019,6,30), y: 29 }
    ]
  },
  {
    name: "المغادرة مبكراَ",
    type: "spline",
    yValueFormatString: "#0.## ",
    showInLegend: true,
    dataPoints: [
      { x: new Date(2019,6,24), y: 20 },
      { x: new Date(2019,6,25), y: 2 },
      { x: new Date(2019,6,26), y: 25 },
      { x: new Date(2019,6,27), y: 12 },
      { x: new Date(2019,6,28), y: 5 },
      { x: new Date(2019,6,29), y: 10 },
      { x: new Date(2019,6,30), y: 25 }
    ]
  },
  {
    name: "متأخر",
    type: "spline",
    yValueFormatString: "#0.## ",
    showInLegend: true,
    dataPoints: [
      { x: new Date(2019,6,24), y: 5 },
      { x: new Date(2019,6,25), y: 19 },
      { x: new Date(2019,6,26), y: 1 },
      { x: new Date(2019,6,27), y: 30 },
      { x: new Date(2019,6,28), y: 12 },
      { x: new Date(2019,6,29), y: 6 },
      { x: new Date(2019,6,30), y: 23 }
    ]
  }]
}
$("#chartContainer2").CanvasJSChart(options2);
    var options3 = {
      title:{
        text: "متابعة بالوقت الحقيقي"
      },   
      data: [{        
        type: "column",
        dataPoints: [
        { x: new Date(2019, 1, 18), y: 171 },
        { x: new Date(2019, 1, 19), y: 155},
        { x: new Date(2019, 1, 20), y: 150 },
        { x: new Date(2019, 1, 21), y: 165 },
        { x: new Date(2019, 1, 22), y: 195 },
        { x: new Date(2019, 1, 23), y: 168 },
        { x: new Date(2019, 1, 24), y: 128 }
        ]
      },
      {        
        type: "column",
        dataPoints: [
        { x: new Date(2019, 1, 18), y: 71 },
        { x: new Date(2019, 1, 19), y: 55},
        { x: new Date(2019, 1, 20), y: 50 },
        { x: new Date(2019, 1, 21), y: 65 },
        { x: new Date(2019, 1, 22), y: 95 },
        { x: new Date(2019, 1, 23), y: 68 },
        { x: new Date(2019, 1, 24), y: 28 }
        ]
      }        
      ]
    };
    $("#chartContainer3").CanvasJSChart(options3);
     
  }
function toggleDataSeries(e){
  if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
    e.dataSeries.visible = false;
  }
  else{
    e.dataSeries.visible = true;
  }
  chart.render();
}
</script>
<?php
*/
?>
<script>
</script>
</body>
</html>