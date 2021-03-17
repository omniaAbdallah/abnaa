<style>
    [data-notify="container"][class*="alert-pastel-"] {
        background-color: rgb(255, 255, 238);
        border-width: 0px;
        border-right: 15px solid rgb(255, 240, 106);
        border-radius: 0px;
        box-shadow: 0px 0px 5px rgba(51, 51, 51, 0.3);
        font-family: 'Old Standard TT', serif;
        letter-spacing: 1px;
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
</div>
</div>
</div>
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
</div>
<!--
<a title="الوصول السريع" type="button" class="btn btn-rocket" data-toggle="modal" data-target="#rocket-panel">
    <i class="fa fa-rocket" aria-hidden="true"></i>
</a>-->
<div class="modal fade" id="rocket-panel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog  " role="document" style="width:22%">
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
                        $link_to = base_url() . "osr/Dash/mian_group/" . $id;
                        if (!empty($array)) {
                            if ($level > 0 && $array[0]->page_link == 2) {
                                $link_to = base_url() . "osr/Dash/sub_sub_main/" . $id . '/' . $id;
                            }
                        }
                        echo '<li>
                          <a href="#"   >
                            <i class="' . $page_icon_code . '" style="color:' . $bg_color . '" ></i>
                
                            <span>' . $page_title . ' </span>
                
                          </a>';
                        if (sizeof($array) > 0 && !empty($array)) {
                            echo ' <ul>';
                            foreach ($array as $row) {
                                if (isset($row->sub) && sizeof($row->sub) > 0) {
                                    $level = 1;
                                    if (isset($row->sub[0]->sub) && sizeof($row->sub[0]->sub) > 0) {
                                        $level = false;
                                    }
                                    subLevels2($row->sub, $row->page_title, $row->page_icon_code, $row->page_id, $level);
                                }
                                
                                
                                
                                else {
                                    
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
                            <?php if (isset($this->my_side_bar) && !empty($this->my_side_bar)) {
                                ?>
                                <?php createTreeView2($this->my_side_bar); ?>
                            <?php } else { ?>
                                <ul class="nav">
                                    <li class="active">
                                        <a href="<?php echo base_url() . "osr/Dash" ?>">
                                            <i class="fa fa-tachometer"></i>
                                            <span>home</span>
                                        </a>
                                    </li>
                                    <?php if (isset($this->main_groups) && $this->main_groups != null && !empty($this->main_groups)) {
                                        foreach ($this->main_groups as $row) {
                                            ?>
                                            <?php if ($row->count_level > 0) {
                                                $link_to = "osr/Dash/mian_group/" . $row->sub[0]->page_id;
                                            } else {
                                                $link_to = "osr/Dash/sub_sub_main/" . $row->sub[0]->page_id . '/' . $row->sub[0]->page_id;
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
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/js/jquery-1.10.1.min.js"></script>
<script src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/js/jquery-ui.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/js/bootstrap-arabic.min.js"></script>
<script src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/js/bootstrap-select.min.js"></script>
<script src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/plugins/bootstrap-toggle/bootstrap-toggle.min.js"
        type="text/javascript"></script>
<script src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/js/custom.js"></script>
<script src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/js/datepicker.js"></script>
<script src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/js/simple-rating.js"></script>
<script src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/plugins/fileinput/js/fileinput.js"></script>
<script src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/js/menu.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>
<script src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/js/wow.min.js"></script>
<script src="<?php echo base_url(); ?>asisst/gam3ia_omomia_asset/js/mdtimepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/js/jquery.mask.min.js"></script>
<script src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/plugins/bootstrap-notify-master/bootstrap-notify.js"></script>


<?php if ($this->session->userdata('is_gam3ia_omomia_logged_in') == 1) { ?>
    <script>
        var min = 1;

        var list_count_id =['0'];
        var list_message =[' رسالة جديدة'];
        var list_message_2 =['لديك رسالة تراسل '];
        var list_action_id =['0'];
        var list_action =['gam3ia_omomia/Gam3ia_omomia/gam3ia_contact_messages/1'];
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
            url: "<?php echo base_url();?>gam3ia_omomia/Notifications/get_all_notification",
            success: function (d) {
                if (d !== 'null') {
                    var data = JSON.parse(d);
                    var notification = data.notification;
                    for (var i = 0; i < list_count_id.length; i++) {
                        /*30-6-om start*/
                        <?php if ($this->uri->segment(3) == 'gam3ia_contact_messages') {?>
                        if (notification[0] > 0) {
                            get_all_count();
                        }
                        <?php } ?>
                        /*30-6-om end*/
                        if (list_count_id[i] != "0") {
                            $('#' + list_count_id[i]).html(notification[i]);
                        }
                        if (list_action_id[i] != "0") {
                            $('#' + list_action_id[i]).attr("href", "<?php echo base_url();?>" + list_action[i]);
                        }
                        if (parseInt(notification[i]) > 0) {
                            if (list_message[i] != " ") {
                                $.notify({
                                    title: list_message[i],
                                    message: list_message_2[i],
                                    url: "<?php echo base_url();?>" + list_action[i],
                                    target: "_self"
                                }, {
                                    type: 'pastel-info',
                                    delay: 1000 * 40 * min,
                                    template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                                        '<button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="float:left">×</button>' +
                                        '<span data-notify="title">{1}</span>' +
                                        '<span data-notify="message">{2}</span>' +
                                        '<a href="{3}"   target="{4}" data-notify="url"></a>' +
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
       /* function get_all_notification() {
            console.warn("check_new_notifications ::");
            $.ajax({
                type: 'post',
                url: "<?php echo base_url();?>gam3ia_omomia/Notifications/get_all_notification",
                success: function (d) {
                    if (d !== 'null') {
                        var data = JSON.parse(d);
                        var notification = data.notification;
                        for (var i = 0; i < list_count_id.length; i++) {
                            if (list_count_id[i] != "0") {
                                $('#' + list_count_id[i]).html(notification[i]);
                            }
                            if (list_action_id[i] != "0") {
                                $('#' + list_action_id[i]).attr("href", "<?php echo base_url();?>" + list_action[i]);
                            }
                            if (parseInt(notification[i]) > 0) {
                                if (list_message[i] != " ") {
                                    $.notify({
                                        title: list_message[i],
                                        message: list_message_2[i],
                                        url:"<?php echo base_url();?>" + list_action[i],
                                        target: "_self"
                                    }, {
                                        type: 'pastel-info',
                                        delay: 1000 * 40 * min,
                                        template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                                            '<button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="float:left">×</button>' +
                                            '<span data-notify="title">{1}</span>' +
                                            '<span data-notify="message">{2}</span>' +
                                            '<a href="{3}"   target="{4}" data-notify="url"></a>' +
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
        }*/


        function get_sound() {

            //    var audio = new Audio('http://www.soundjay.com/misc/sounds/bell-ringing-01.mp3');


            var audio = new Audio('https://notificationsounds.com/soundfiles/2d6cc4b2d139a53512fb8cbb3086ae2e/file-sounds-942-what-friends-are-for.mp3');
            audio.play();
        }

        $(document).ready(function () {
            console.warn("check notifications :: ready");
            get_all_notification();
            setInterval(get_all_notification, (1000 * 60 * min));

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

            var count = $("#tot-prod_sader_comments").html();
            if (count > 0) {

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
            }
        }

        function update_seen_wared_comments() {

            var count = $("#tot-prod_wared_comments").html();
            if (count > 0) {

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
            }
        }

        function update_seen_wared() {
            console.warn(" count :: "+ $("#tot-prod_wared").html());

            var count=$("#tot-prod_wared").html();
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
            console.warn(" count :: "+ $("#tot-prod_sader").html());

            var count=$("#tot-prod_sader").html();
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
            console.warn(" count :: "+ $("#tot-prod_email").html());

            var count=$("#tot-prod_email").html();
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
            console.warn(" count :: "+ $("#tot-prod_notes").html());

            var count=$("#tot-prod_notes").html();
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


<?php } ?>


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
            $.extend($.expr[':'], {
                'contains': function (elem, i, match, array) {
                    return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
                }
            });
            $(panelContainerId + ':not(:contains(' + searchTerm + '))').hide();
            $(panelContainerId + ':contains(' + searchTerm + ')').show();
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
            $dropdown.on("click", function (e) {
                /*
                                console.debug('$dropdown.on("click")');
                */
                e.stopPropagation();
                $(this).addClass("is-open");
                $(this)
                    .parent()
                    .addClass("slide-out");
            });
            $back_btn.on("click", ".js-back", function (e) {
                /*
                                console.debug('$back_btn.on("click")');
                */
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
            resizeWidth: '768',
            animationSpeed: 'slow',
            accoridonExpAll: false
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
    var searchTerm, panelContainerId;
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
<script src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/js/js.js"></script>
<script src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/js/dashboard.js"></script>
<script src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/js/jquery.form-validator.js"></script>
<script>
    $(function () {
        $.validate({
            validateHiddenInputs: true
        });
    });
</script>
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
<script src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/js/tables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/js/tables/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/js/tables/buttons.flash.min.js"></script>
<script src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/js/tables/jszip.min.js"></script>
<script src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/js/tables/vfs_fonts.js"></script>
<script src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/js/tables/buttons.html5.min.js"></script>
<script src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/js/tables/buttons.print.min.js"></script>
<script src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/js/tables/buttons.colVis.min.js"></script>
<script src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/js/tables/dataTables.colReorder.min.js"></script>
<script src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/js/tables/plugin.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>
<script src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/plugins/tree-view/tree-view.min.js"
        type="text/javascript"></script>
<script type="text/javascript">
    $('.selectpicker').selectpicker("refresh");
</script>
<script src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/datepicker/js/jquery.calendars.min.js"></script>
<script src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/datepicker/js/jquery.calendars.ummalqura.min.js"></script>
<script src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/datepicker/js/jquery.calendars.ummalqura-ar.js"></script>
<script src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/datepicker/js/bootstrap-calendars.min.js"></script>
<script src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/datepicker/js/bootstrap-datetimepicker.min.js"></script>
<!-- yara -->
<script>
    $(".modal-startup").modal('show');

</script>
<!-- ChartJs JavaScript -->
<script src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/plugins/chartJs/Chart.min.js" type="text/javascript"></script>
<!-- End Page Lavel Plugins
=====================================================================-->
<script type="text/javascript">
    $(document).ready(function () {
        function chartlist() {
            "use strict"; // Start of use strict
            var ctx3 = document.getElementById("barChart-income");
            var myChart3 = new Chart(ctx3, {
                type: 'bar',
                data: {
                    labels: ["يناير", "فبراير", "مارس", "أبريل", "مايو", "يونيو", "يوليو", "أغسطس", "سبتمبر", "أكتوبر", "نوفمبر", "ديسمبر"],
                    datasets: [
                        {
                            label: "إجمالى الإيرادات ",
                            data: [14200, 25000, 63000, 410000, 52777, 105000, 827850, 117850, 327850, 542000, 574200, 554650],
                            borderColor: "rgba(124, 177, 0, 0.76)",
                            borderWidth: "0",
                            //backgroundColor: "rgba(99, 142, 0, 0.76)"
                            backgroundColor: "rgba(99, 142, 0, 0.76)",
                        },
                        {
                            label: "إجمالى المصروفات",
                            data: [574200, 541250, 547850, 554650, 572350, 572850, 579850, 827850, 747850, 327850, 657850, 117850],
                            borderColor: "#e72c2d",
                            borderWidth: "0",
                            //backgroundColor: "rgba(99, 142, 0, 0.76)"
                            backgroundColor: "rgb(244, 91, 91)",
                        }

                    ]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });

          
            //bar chart
            
            
    
          
            


          


        }

        chartlist();

    });
</script>

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
        $('.docs-date').datetimepicker({
            locale: {calender: 'ummalqura', lang: 'ar'},
            format: 'DD/MM/YYYY'
        });
    });
</script>
<script src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/js/hijri_converter.js"></script>
<script language="javascript" type="text/javascript"> function moveOnMax(field, nextFieldID) {
        if (field.value.length >= field.maxLength) {
            nextFieldID.focus();
        }
    } </script>
<script language=Javascript>
    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>
<script type="text/javascript"
        src='https://maps.google.com/maps/api/js?key=AIzaSyC4l5QxL27z4w0uuD_5X3g0IRhaUdvb0Q4&?sensor=false&libraries=places'></script>
<script src="<?= base_url() . 'asisst/gam3ia_omomia_asset/' ?>js/locationpicker.jquery.js"></script>
<script>
    var lat = $('#us3-lat').val();
    var lang = $('#us3-lon').val();
    var radius = $('#us3-radius').val();
    if (!lat) {
        lat = '27.517571447136426';
    }
    if (!lang) {
        lang = '41.71273613027347';
    }
    if (!radius) {
        radius = 100;
    }
    $('#us3').locationpicker({
        mapTypeId: google.maps.MapTypeId.HYBRID,
        location: {
            latitude: lat,
            longitude: lang
        },
        radius: radius,
        zoom: 12,
        inputBinding: {
            latitudeInput: $('#us3-lat'),
            longitudeInput: $('#us3-lon'),
            radiusInput: $('#us3-radius'),
            locationNameInput: $('#us3-address')
        },
        enableAutocomplete: true,
        onchanged: function (currentLocation, radius, isMarkerDropped) {
        }
    });
</script>
<script>
    function del(valu) {
        $('.tr' + valu).remove();
    }
</script>
<?php
if ($this->router->fetch_method() != 'index' && $this->router->fetch_class() != 'osr/Dash') {
    ?>
    <script language="javascript">
        function autoResizeDiv() {
            var bodyheight = window.innerHeight;
            var header_height = $(".main-header").height();
            var footer_height = $(".main-footer").height();
            var neg = header_height + footer_height + 80;
            var fixed_height = bodyheight - neg;
            $(".content").css('height', fixed_height);
        }

        function autoResizeDivMobile() {
            $('.content').style.height = 'auto';
        }

        var mq = window.matchMedia("(min-width: 767px)");
        if (mq.matches) {
            window.onresize = autoResizeDiv;
            autoResizeDiv();
        } else {
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
            window.onresize = autoResizeDiv;
            autoResizeDiv();
        } else {
            window.onresize = autoResizeDivMobile;
            autoResizeDivMobile();
        }
    </script>
    <?php
}
?>
<script type="text/javascript">
    function requestFullScreen() {
        if (!document.fullscreenElement &&
            !document.mozFullScreenElement && !document.webkitFullscreenElement && !document.msFullscreenElement) {
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
        var h = date.getHours();
        var m = date.getMinutes();
        var s = date.getSeconds();
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
<script>
    function show_tab(id) {
        $('a[href="#' + id + '"]').tab('show');
    }

    function get_data(method) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>osr/Family/" + method,
            data: {load_files: 1},
            cache: true,
            beforeSend: function () {
                $('#load_files').html('<div class="text-center"> <img scr="<?php echo base_url();?>asisst/admin_asset/img/loader.png"></div>');
            },
            success: function (d) {
                $('#load_files').html(d);
            }
        });
    }

    function get_data_table(method, div_id) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>" + method,
            data: {load_files: 1},
            cache: true,
            beforeSend: function () {
                $('#' + div_id).html('<div class="text-center"> <img scr="<?php echo base_url();?>asisst/admin_asset/img/loader.png"></div>');
            },
            success: function (d) {
                $('#' + div_id).html(d);
            }
        });
    }
</script>
<script>
    function get_data_chat(method) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>registration/" + method,
            cache: true,
            beforeSend: function () {
                $('#page_body').html('<div class="text-center"> <img scr="<?php echo base_url();?>asisst/gam3ia_omomia_asset/img/loader.png"></div>');
            },
            success: function (d) {
                $('#page_body').html(d);
            }
        });
    }

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
    <?php  if (isset($current_year) && (!empty($current_year))){?>
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
    <?php  } ?>
</script>




</body>
</html>