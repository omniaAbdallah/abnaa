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
<script type="text/javascript" src="<?php echo base_url() ?>asisst/osr_asset/js/jquery-1.10.1.min.js"></script>
<script src="<?php echo base_url() ?>asisst/osr_asset/js/jquery-ui.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>asisst/osr_asset/js/bootstrap-arabic.min.js"></script>
<script src="<?php echo base_url() ?>asisst/osr_asset/js/bootstrap-select.min.js"></script>
<script src="<?php echo base_url() ?>asisst/osr_asset/plugins/bootstrap-toggle/bootstrap-toggle.min.js"
        type="text/javascript"></script>
<script src="<?php echo base_url() ?>asisst/osr_asset/js/custom.js"></script>
<script src="<?php echo base_url() ?>asisst/osr_asset/js/datepicker.js"></script>
<script src="<?php echo base_url() ?>asisst/osr_asset/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>asisst/osr_asset/js/simple-rating.js"></script>
<script src="<?php echo base_url() ?>asisst/osr_asset/plugins/fileinput/js/fileinput.js"></script>
<script src="<?php echo base_url() ?>asisst/osr_asset/js/menu.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>
<script src="<?php echo base_url() ?>asisst/osr_asset/js/wow.min.js"></script>
<script src="<?php echo base_url(); ?>asisst/osr_asset/js/mdtimepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>asisst/osr_asset/js/jquery.mask.min.js"></script>
<script src="<?php echo base_url() ?>asisst/osr_asset/plugins/bootstrap-notify-master/bootstrap-notify.js"></script>
<?php if ($_SESSION['mother_national_num']) { ?>
    <script>
        var min = 1;
        var list_count_id = ['chat_new'];
        var list_message = ['رسالة جديدة لديك الأن'];
        var list_message_2 = ['الرجاء الذهاب إلى الدردشة'];
        var list_action_id = ['a_chat_new'];
        var list_action = ['osr/ChatController'];
        var list_action_update = ["get_data_chat('ChatController')"];

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
            /*
                        console.warn("check_new_notifications ::");
            */
            $.ajax({
                type: 'get',
                url: "<?php echo base_url();?>Notifications/get_all_notification_web",
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
                                        url: "<?php echo base_url();?>" + list_action[i],
                                        target: "_self"
                                    }, {
                                        type: 'pastel-info',
                                        delay: 1000 * 40 * min,
                                        template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert" onclick="' + list_action_update[i] + '">' +
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
            /*
                        console.warn("check notifications :: ready");
            */
            get_all_notification();
            setInterval(get_all_notification, (1000 * 60 * min));
            var file_name = '';
            var res = [];
            $.ajaxSetup({
                beforeSend: function () {
                    /*
                                        console.log(' url1 : ' + this.url);
                    */
                    if (this.type.toUpperCase() == 'GET') {
                        res = this.url.split("/");
                        /*
                                                console.log(' url1 last : ' + res[res.length - 1]);
                        */
                        if (res.length > 0) {
                            res = res[res.length - 1].split(".js");
                            file_name = res[0];
                        }
                    }
                }, complete: function () {
                    /*
                                        console.log(' url1 check : ');
                    */
                    if (file_name.indexOf('jquery') > -1) {
                        /*
                                                console.log(' url1 check if : ');
                        */
                        $.ajax({
                            type: 'get',
                            url: "<?php echo base_url();?>asisst/osr_asset/plugin/bootstrap-notify-master/bootstrap-notify.js"
                        });
                    }
                }
            });
        });
    </script>
<?php } ?>
<?php
?>
<script>
</script>
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
<script src="<?php echo base_url() ?>asisst/osr_asset/js/js.js"></script>
<script src="<?php echo base_url() ?>asisst/osr_asset/js/dashboard.js"></script>
<script src="<?php echo base_url() ?>asisst/osr_asset/js/jquery.form-validator.js"></script>
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
<script src="<?php echo base_url() ?>asisst/osr_asset/js/tables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>asisst/osr_asset/js/tables/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url() ?>asisst/osr_asset/js/tables/buttons.flash.min.js"></script>
<script src="<?php echo base_url() ?>asisst/osr_asset/js/tables/jszip.min.js"></script>
<script src="<?php echo base_url() ?>asisst/osr_asset/js/tables/vfs_fonts.js"></script>
<script src="<?php echo base_url() ?>asisst/osr_asset/js/tables/buttons.html5.min.js"></script>
<script src="<?php echo base_url() ?>asisst/osr_asset/js/tables/buttons.print.min.js"></script>
<script src="<?php echo base_url() ?>asisst/osr_asset/js/tables/buttons.colVis.min.js"></script>
<script src="<?php echo base_url() ?>asisst/osr_asset/js/tables/dataTables.colReorder.min.js"></script>
<script src="<?php echo base_url() ?>asisst/osr_asset/js/tables/plugin.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>
<script src="<?php echo base_url() ?>asisst/osr_asset/plugins/tree-view/tree-view.min.js"
        type="text/javascript"></script>
<script type="text/javascript">
    $('.selectpicker').selectpicker("refresh");
</script>
<script src="<?php echo base_url() ?>asisst/osr_asset/datepicker/js/jquery.calendars.min.js"></script>
<script src="<?php echo base_url() ?>asisst/osr_asset/datepicker/js/jquery.calendars.ummalqura.min.js"></script>
<script src="<?php echo base_url() ?>asisst/osr_asset/datepicker/js/jquery.calendars.ummalqura-ar.js"></script>
<script src="<?php echo base_url() ?>asisst/osr_asset/datepicker/js/bootstrap-calendars.min.js"></script>
<script src="<?php echo base_url() ?>asisst/osr_asset/datepicker/js/bootstrap-datetimepicker.min.js"></script>
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
<script src="<?php echo base_url() ?>asisst/osr_asset/js/hijri_converter.js"></script>
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
<script src="<?= base_url() . 'asisst/osr_asset/' ?>js/locationpicker.jquery.js"></script>
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
</script>
<script>
    function get_data_chat(method) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>registration/" + method,
            cache: true,
            beforeSend: function () {
                $('#page_body').html('<div class="text-center"> <img scr="<?php echo base_url();?>asisst/osr_asset/img/loader.png"></div>');
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
<?php
if (isset($file_script) && (!empty($file_script))) {
    switch ($file_script) {
        case 'father':
            ?>
            <script>
                function save_father() {
                    // $('#registerForm').serialize(),
                    var all_inputs = $(' .father_form [data-validation="required"]');
                    var valid = 1;
                    var text_valid = "";
                    all_inputs.each(function (index, elem) {
                        console.log(elem.id + $(elem).val());
                        if ($(elem).val().length >= 1) {
                            // valid=1;
                            $(elem).css("border-color", "");
                        } else {
                            valid = 0;
                            $(elem).css("border-color", "red");
                        }
                    });
                    $.ajax({
                        type: 'post',
                        url: '<?php echo base_url() ?>osr/Family/father',
                        data: $('.father_form').serialize(),
                        cache: false,
                        beforeSend: function (xhr) {
                            if (valid == 0) {
                                swal({
                                    title: 'من فضلك ادخل كل الحقول ',
                                    text: text_valid,
                                    type: 'error',
                                    confirmButtonText: 'تم'
                                });
                                xhr.abort();
                            } else if (valid == 1) {
                                swal({
                                    title: "جاري الإرسال ... ",
                                    text: "",
                                    imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                                    showConfirmButton: false,
                                    allowOutsideClick: false
                                });
                            }
                        },
                        success: function (html) {
                            swal({
                                title: 'تم اضافة  ',
                                type: 'success',
                                confirmButtonText: 'تم'
                            });
                            /* var all_inputs_set = $('.father_form .form-control');
                             all_inputs_set.each(function (index, elem) {
                                 console.log(elem.id + $(elem).val());
                                 $(elem).val('');
                             });*/
                            if (html == 1) {
                                show_tab('general-detailsfa');
                            }
                        }
                    });
                }
            </script>
            <script>
                function getFamilyNumber() {
                    if ($('#male_number').val() > 0) {
                        var males = parseInt($('#male_number').val());
                    } else {
                        var males = 0;
                    }
                    if ($('#female_number').val() > 0) {
                        var females = parseInt($('#female_number').val());
                    } else {
                        var females = 0;
                    }
                    var all = males + females;
                    $('#family_members_number').val(all);
                }
            </script>
            <script type="text/javascript">
                get_date_mask();
            </script>
            <script>
                $(document).ready(function () {
                    $("#f_job").change(function () {
                        var color = $(this).val();
                        if (color == "1") {
                            $(".box").not(".1").hide();
                            $(".red").show();
                        } else if (color == "2") {
                            $(".box").not(".2").hide();
                            $(".red").show();
                        } else {
                            $(".box").hide();
                        }
                    });
                });
            </script>
            <script>
                function admSelectCheck(nameSelect) {
                    if ($(nameSelect).val() == 0) {
                        document.getElementById("f_death_reason_fk").removeAttribute("disabled", "disabled");
                    } else {
                        document.getElementById("f_death_reason_fk").setAttribute("disabled", "disabled");
                    }
                }
            </script>
            <script>
                function valid() {
                    if ($("#f_national_id").val().length > 10) {
                        document.getElementById('validate1').style.color = '#00FF00';
                        document.getElementById('validate1').innerHTML = '';
                    } else {
                        document.getElementById('validate1').style.color = '#F00';
                        document.getElementById('validate1').innerHTML = 'رقم الهوية من عشر أرقام';
                    }
                }
            </script>
            <script>
                document.getElementById('f_nationality_id_fk').onchange = function () {
                    var x = $(this).val();
                    if (x == 0) {
                        document.getElementById("nationality_other").removeAttribute("disabled", "disabled");
                    } else {
                        document.getElementById("nationality_other").setAttribute("disabled", "disabled");
                    }
                }
            </script>
            <script>
                document.getElementById('wife').onkeyup = function () {
                    var x = $(this).val();
                    if (x < 1) {
                        alert("الادخال خاطىء");
                        $(this).val(" ");
                    }
                }
            </script>
            <script>
                function cal_age() {
                    var valu = $('#date0').val();
                    var str = valu;
                    var res = str.split("/");
                    var HYear = $('#HYear').val();
                    var cou = res[2] - HYear;
                    console.log("cou :: " + cou);
                    if (parseFloat(cou)) {
                        $('#myage').val(cou);
                    } else {
                        $('#myage').val(0);
                    }
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
            <?php
            break;
        case 'mother':
            ?>
            <script>
                function save_mother(div_id) {
                    var tabs = ['main-detailsa', 'contact-details', 'health-details', 'education-details', 'skills-details', 'other'];

                    function checkAdult(tab) {
                        return tab == div_id;
                    }

                    var tab_index = tabs.findIndex(checkAdult);
                    console.warn('tab_index :: ' + tab_index);
                    var all_inputs = $(' #' + div_id + ' [data-validation="required"]');
                    var valid = 1;
                    var text_valid = "";
                    all_inputs.each(function (index, elem) {
                        console.log(elem.id + $(elem).val());
                        if ($(elem).val().length >= 1) {
                            $(elem).css("border-color", "");
                        } else {
                            valid = 0;
                            $(elem).css("border-color", "red");
                        }
                    });
                    $.ajax({
                        type: 'post',
                        url: '<?php echo base_url() ?>osr/Family/mother',
                        data: $('.mother_form').serialize(),
                        cache: false,
                        beforeSend: function (xhr) {
                            if (valid == 0) {
                                swal({
                                    title: 'من فضلك ادخل كل الحقول ',
                                    text: text_valid,
                                    type: 'error',
                                    confirmButtonText: 'تم'
                                });
                                xhr.abort();
                            } else if (valid == 1) {
                                swal({
                                    title: "جاري الإرسال ... ",
                                    text: "",
                                    imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                                    showConfirmButton: false,
                                    allowOutsideClick: false
                                });
                            }
                        },
                        success: function (html) {
                            swal({
                                title: 'تم اضافة  ',
                                type: 'success',
                                confirmButtonText: 'تم'
                            });
                            if (tab_index <= 5) {
                                if (tab_index == 5) {
                                    console.warn('show_tab :: ' + tabs[0]);
                                    show_tab(tabs[0]);
                                } else {
                                    console.warn('show_tab :: ' + tabs[(tab_index + 1)]);
                                    show_tab(tabs[(tab_index + 1)]);
                                }
                            }
                        }
                    });
                }
            </script>
            <script language="javascript" type="text/javascript">
                function moveOnMax(field, nextFieldID) {
                    if (field.value.length >= field.maxLength) {
                        nextFieldID.focus();
                    }
                } </script>
            <script>
                function GetHij_Status(valu) {
                    if (valu == 1) {
                        document.getElementById("m_haj_geha").removeAttribute("disabled", "disabled");
                        document.getElementById("m_haj_geha").setAttribute("data-validation", "required");
                        document.getElementById("last_haj_year").removeAttribute("disabled", "disabled");
                        document.getElementById("last_haj_year").setAttribute("data-validation", "required");
                    } else {
                        document.getElementById("m_haj_geha").setAttribute("disabled", "disabled");
                        document.getElementById("m_haj_geha").setAttribute("data-validation", "");
                        document.getElementById("last_haj_year").setAttribute("disabled", "disabled");
                        document.getElementById("last_haj_year").setAttribute("data-validation", "");
                        $('#last_haj_year').val('');
                        $('#period').val('');
                        $('#m_haj_geha').val('');
                    }
                }

                function GetOmra_Status(valu) {
                    if (valu == 1) {
                        document.getElementById("m_omra_geha").removeAttribute("disabled", "disabled");
                        document.getElementById("m_last_omra_date").removeAttribute("disabled", "disabled");
                        document.getElementById("m_omra_geha").setAttribute("data-validation", "");
                        document.getElementById("m_last_omra_date").setAttribute("data-validation", "");
                    } else {
                        document.getElementById("m_omra_geha").setAttribute("disabled", "disabled");
                        document.getElementById("m_last_omra_date").setAttribute("disabled", "disabled");
                        $('#m_omra_geha').val('');
                        $('#m_last_omra_date').val('');
                    }
                }
            </script>
            <script>
                function getPeriod() {
                    var last_haj_year = $('#last_haj_year').val();
                    var current_year_hijri = '<?= $current_year?>';
                    var period = current_year_hijri - last_haj_year;
                    $('#period').val(period);
                }
            </script>
            <script>
                document.getElementById("m_nationality").onchange = function () {
                    if (this.value == 20)
                        document.getElementById("nationality_other").removeAttribute("disabled", "disabled");
                    else {
                        document.getElementById("nationality_other").setAttribute("disabled", "disabled");
                        $("#nationality_other").val("");
                    }
                };
            </script>
            <script>
                document.getElementById("educate").onchange = function () {
                    if (this.value >= 5)
                        document.getElementById("special").removeAttribute("disabled", "disabled");
                    else {
                        document.getElementById("special").setAttribute("disabled", "disabled");
                        $("#special").val("");
                    }
                };
            </script>
            <script>
                function get_spestil(val_pass) {
                    if (val_pass == "unlettered" || val_pass == "0" || val_pass == "read_write") {
                        document.getElementById("special").setAttribute("disabled", "disabled");
                        document.getElementById("special").removeAttribute("data-validation", "required");
                        document.getElementById("educate").setAttribute("disabled", "disabled");
                        document.getElementById("educate").removeAttribute("data-validation", "required");
                    } else {
                        document.getElementById("special").removeAttribute("disabled", "disabled");
                        document.getElementById("special").setAttribute("data-validation", "required");
                        document.getElementById("educate").removeAttribute("disabled", "disabled");
                        document.getElementById("educate").setAttribute("data-validation", "required");
                        $('#educate').selectpicker("refresh");
                    }
                }
            </script>
            <script>
                document.getElementById("eldar").onchange = function () {
                    if (this.value == 1)
                        document.getElementById("m_female_house_id_fk").removeAttribute("disabled", "disabled");
                    else {
                        document.getElementById("m_female_house_id_fk").setAttribute("disabled", "disabled");
                        $("#dar-name").val("");
                    }
                };
            </script>
            <script>
                document.getElementById("living_place_id").onchange = function () {
                    if (this.value == 0)
                        document.getElementById("living-place").removeAttribute("disabled", "disabled");
                    else {
                        document.getElementById("living-place").setAttribute("disabled", "disabled");
                        $("#living-place").val("");
                    }
                };
            </script>
            <script>
                function check() {
                    var type = $('#health_state').val();
                    if (type === 'disease') {
                        document.getElementById("dis_status").removeAttribute("disabled", "disabled");
                        document.getElementById("dis_response_status").removeAttribute("disabled", "disabled");
                        document.getElementById("dis_reason").removeAttribute("disabled", "disabled");
                        document.getElementById("disease_id_fk").removeAttribute("disabled", "disabled");
                        document.getElementById("disability_id_fk").setAttribute("disabled", "disabled");
                        document.getElementById("dis_status").setAttribute("data-validation", "");
                        document.getElementById("dis_response_status").setAttribute("data-validation", "");
                        document.getElementById("dis_reason").setAttribute("data-validation", "");
                        document.getElementById("disease_id_fk").setAttribute("data-validation", "");
                        document.getElementById("disability_id_fk").removeAttribute("data-validation", "");
                    } else if (type === 'disability') {
                        document.getElementById("m_comprehensive_rehabilitation").removeAttribute("disabled", "disabled");
                        document.getElementById("dis_status").removeAttribute("disabled", "disabled");
                        document.getElementById("dis_response_status").removeAttribute("disabled", "disabled");
                        document.getElementById("dis_reason").removeAttribute("disabled", "disabled");
                        document.getElementById("disease_id_fk").setAttribute("disabled", "disabled");
                        document.getElementById("disability_id_fk").removeAttribute("disabled", "disabled");
                        document.getElementById("dis_status").setAttribute("data-validation", "");
                        document.getElementById("dis_response_status").setAttribute("data-validation", "");
                        document.getElementById("dis_reason").setAttribute("data-validation", "");
                        document.getElementById("disease_id_fk").removeAttribute("data-validation", "");
                        document.getElementById("disability_id_fk").setAttribute("data-validation", "");
                    } else if (type === 'good') {
                        document.getElementById("dis_status").setAttribute("disabled", "disabled");
                        document.getElementById("dis_response_status").setAttribute("disabled", "disabled");
                        document.getElementById("dis_reason").setAttribute("disabled", "disabled");
                        document.getElementById("disease_id_fk").setAttribute("disabled", "disabled");
                        document.getElementById("disability_id_fk").setAttribute("disabled", "disabled");
                        document.getElementById("dis_status").removeAttribute("data-validation", "");
                        document.getElementById("dis_response_status").removeAttribute("data-validation", "");
                        document.getElementById("dis_reason").removeAttribute("data-validation", "");
                        document.getElementById("disease_id_fk").removeAttribute("data-validation", "");
                        document.getElementById("disability_id_fk").removeAttribute("data-validation", "");
                    }
                }
            </script>
            <script>
                document.getElementById('m_nationality').onchange = function () {
                    var x = $(this).val();
                    if (x == 0) {
                        document.getElementById("nationality_other").removeAttribute("disabled", "disabled");
                        document.getElementById("nationality_other").setAttribute("data-validation", "");
                    } else {
                        document.getElementById("nationality_other").setAttribute("disabled", "disabled");
                        document.getElementById("nationality_other").removeAttribute("data-validation", "");
                    }
                }
            </script>
            <script>
                document.getElementById('living_place_id').onchange = function () {
                    var x = $(this).val();
                    if (x == 0) {
                        document.getElementById("m_living_place").removeAttribute("disabled", "disabled");
                        document.getElementById("m_living_place").setAttribute("data-validation", "");
                    } else {
                        document.getElementById("m_living_place").setAttribute("disabled", "disabled");
                        document.getElementById("m_living_place").removeAttribute("data-validation", "");
                    }
                }
            </script>
            <script>
                document.getElementById('eldar').onchange = function () {
                    var x = $(this).val();
                    if (x == 1) {
                        document.getElementById("m_female_house_id_fk").removeAttribute("disabled", "disabled");
                        document.getElementById("m_female_house_id_fk").setAttribute("data-validation", "");
                        ;
                    } else {
                        document.getElementById("m_female_house_id_fk").value = '';
                        document.getElementById("m_female_house_id_fk").setAttribute("disabled", "disabled");
                        document.getElementById("m_female_house_id_fk").removeAttribute("data-validation", "");
                        ;
                    }
                }
            </script>
            <script>
                function getWork() {
                    var work = $('#m_want_work').val();
                    if (work == 1) {
                        document.getElementById("ability_work").removeAttribute("disabled", "disabled");
                        document.getElementById("work_type_id_fk").removeAttribute("disabled", "disabled");
                        document.getElementById("m_job_id_fk").setAttribute("disabled", "disabled");
                        document.getElementById("mo-income").setAttribute("disabled", "disabled");
                        document.getElementById("m_place_work").setAttribute("disabled", "disabled");
                        document.getElementById("m_place_mob").setAttribute("disabled", "disabled");
                        document.getElementById("m_job_id_fk").value = "";
                        document.getElementById("m_place_work").value = "";
                        document.getElementById("m_place_mob").value = "";
                        document.getElementById("ability_work").value = "";
                        document.getElementById("work_type_id_fk").value = "";
                    }
                    if (work == 2) {
                        document.getElementById("m_job_id_fk").removeAttribute("disabled", "disabled");
                        document.getElementById("mo-income").removeAttribute("disabled", "disabled");
                        document.getElementById("m_place_work").removeAttribute("disabled", "disabled");
                        document.getElementById("m_place_mob").removeAttribute("disabled", "disabled");
                        document.getElementById("ability_work").setAttribute("disabled", "disabled");
                        document.getElementById("work_type_id_fk").setAttribute("disabled", "disabled");
                        document.getElementById("m_job_id_fk").setAttribute("data-validation", "");
                        document.getElementById("mo-income").setAttribute("data-validation", "");
                        document.getElementById("m_place_work").setAttribute("data-validation", "");
                        document.getElementById("m_place_mob").setAttribute("data-validation", "");
                        document.getElementById("ability_work").value = "";
                        document.getElementById("work_type_id_fk").value = "";
                    }
                }
            </script>
            <script>
                function get_work(value) {
                    if (value == 0) {
                        document.getElementById("work_type_id_fk").setAttribute("disabled", "disabled");
                    } else if (value == 1) {
                        document.getElementById("work_type_id_fk").removeAttribute("disabled", "disabled");
                        document.getElementById("work_type_id_fk").setAttribute("data-validation", "");
                        document.getElementById("work_type_id_fk").value = "";
                    }
                }
            </script>
            <script>
                function check_rehabilitation(valu) {
                    if (valu == 1) {
                        document.getElementById("m_rehabilitation_value").removeAttribute("disabled", "disabled");
                    } else {
                        $('#m_rehabilitation_value').val('');
                        document.getElementById("m_rehabilitation_value").setAttribute("disabled", "disabled");
                    }
                }
            </script>
            <script>
                function check_commercial_project(valu) {
                    if (valu == 1) {
                        document.getElementById("m_project_name").removeAttribute("disabled", "disabled");
                        document.getElementById("m_project_status").removeAttribute("disabled", "disabled");
                    } else {
                        document.getElementById("m_project_name").setAttribute("disabled", "disabled");
                        document.getElementById("m_project_status").setAttribute("disabled", "disabled");
                        $('#m_project_name').val('');
                        $('#m_project_status').val('');
                    }
                }
            </script>
            <?php
            break;
        case 'wakel':
            ?>
            <script>
                function delete_image_wakel(id) {
                    $.ajax({
                        type: 'get',
                        url: '<?php echo base_url() ?>osr/Family/delete_image_wakel/' + id,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (html) {
                            swal({
                                title: 'تم حذف صوره الهويه  ',
                                type: 'success',
                                confirmButtonText: 'تم'
                            });
                            show_tab('add_wakel');
                            $("#full_img").css("display", "none");
                            $("#empty_img").css("display", "block");
                        }
                    });
                }

                function save_wakel() {
                    var all_inputs = $(' .wakel_form [data-validation="required"]');
                    var valid = 1;
                    var text_valid = "";
                    all_inputs.each(function (index, elem) {
                        console.log(elem.id + $(elem).val());
                        if ($(elem).val().length >= 1) {
                            // valid=1;
                            $(elem).css("border-color", "");
                        } else {
                            valid = 0;
                            $(elem).css("border-color", "red");
                        }
                    });
                    var form_data = new FormData();
                    var files = $('#w_national_img')[0].files;
                    form_data.append("w_national_img", files[0]);
                    //$('#family_members_form').serialize()
                    var serializedData = $('#wakel_form').serializeArray();
                    $.each(serializedData, function (key, item) {
                        //console.log(item.name+': ' + item.value);
                        form_data.append(item.name, item.value);
                    });
                    $.ajax({
                        type: 'post',
                        url: '<?php echo base_url() ?>osr/Family/add_wakel',
                        data: form_data,
                        cache: false,
                        contentType: false,
                        processData: false,
                        beforeSend: function (xhr) {
                            if (valid == 0) {
                                swal({
                                    title: 'من فضلك ادخل كل الحقول ',
                                    text: text_valid,
                                    type: 'error',
                                    confirmButtonText: 'تم'
                                });
                                xhr.abort();
                            } else if (valid == 1) {
                                swal({
                                    title: "جاري الإرسال ... ",
                                    text: "",
                                    imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                                    showConfirmButton: false,
                                    allowOutsideClick: false
                                });
                            }
                        },
                        success: function (html) {
                            swal({
                                title: 'تم اضافة  ',
                                type: 'success',
                                confirmButtonText: 'تم'
                            });
                            /* var all_inputs_set = $('.wakel_form .form-control');
                            all_inputs_set.each(function (index, elem) {
                                console.log(elem.id + $(elem).val());
                                $(elem).val('');
                            });
                            */
                            if (html == 1) {
                                show_tab('add_wakel');
                                window.location.reload(); //osr/Family/DeleteImage/';
                            }
                        }
                    });
                }
            </script>
            <script>
                function checkJob(valux) {
                    if (valux == 1) {
                        document.getElementById("employer").removeAttribute("disabled", "disabled");
                        document.getElementById("w_job_id_fk").removeAttribute("disabled", "disabled");
                        document.getElementById("job_place").removeAttribute("disabled", "disabled");
                        document.getElementById("job_mob").removeAttribute("disabled", "disabled");
                        document.getElementById("salary").removeAttribute("disabled", "disabled");
                        document.getElementById("employer").setAttribute("data-validation", "required");
                        document.getElementById("w_job_id_fk").setAttribute("data-validation", "required");
                        document.getElementById("job_place").setAttribute("data-validation", "required");
                        document.getElementById("job_mob").setAttribute("data-validation", "required");
                        document.getElementById("salary").setAttribute("data-validation", "required");
                    } else {
                        document.getElementById("employer").setAttribute("disabled", "disabled");
                        document.getElementById("w_job_id_fk").setAttribute("disabled", "disabled");
                        document.getElementById("job_place").setAttribute("disabled", "disabled");
                        document.getElementById("job_mob").setAttribute("disabled", "disabled");
                        document.getElementById("salary").setAttribute("disabled", "disabled");
                        document.getElementById("employer").value = '';
                        document.getElementById("job_place").value = '';
                        document.getElementById("job_mob").value = '';
                        document.getElementById("salary").value = '';
                        document.getElementById("employer").removeAttribute("data-validation", "required");
                        document.getElementById("w_job_id_fk").removeAttribute("data-validation", "required");
                        document.getElementById("job_place").removeAttribute("data-validation", "required");
                        document.getElementById("job_mob").removeAttribute("data-validation", "required");
                        document.getElementById("salary").removeAttribute("data-validation", "required");
                    }
                }

                function checkGuaranted(valux) {
                    if (valux == 0) {
                        document.getElementById("persons_num").setAttribute("disabled", "disabled");
                        document.getElementById("persons_num").setAttribute("data-validation", "required");
                        document.getElementById("persons_num").value = '';
                    } else {
                        document.getElementById("persons_num").removeAttribute("disabled", "disabled");
                        document.getElementById("persons_num").removeAttribute("data-validation", "required");
                    }
                }
            </script>
            <script>
                function getGuaranted(valux) {
                    var ids = '';
                    if (valux == 4) {
                        ids = 0;
                        $("select#guaranted").val(0);
                    } else {
                        ids = 1;
                        $("select#guaranted").val(1);
                    }
                    checkGuaranted(ids);
                }
            </script>
            <?php
            break;
        case 'family_members':
            ?>
            <script>
                function save_family_members(tab1) {
                    var all_inputs = $(' #' + tab1 + ' [data-validation="required"]');
                    var valid = 1;
                    var text_valid = "";
                    all_inputs.each(function (index, elem) {
                        console.log(elem.id + $(elem).val());
                        if ($(elem).val().length >= 1) {
                            $(elem).css("border-color", "");
                        } else {
                            valid = 0;
                            $(elem).css("border-color", "red");
                        }
                    });
                    var form_data = new FormData();
                    var files = $('#member_photo')[0].files;
                    form_data.append("member_photo", files[0]);
                    var serializedData = $('.family_members_form').serializeArray();
                    $.each(serializedData, function (key, item) {
                        form_data.append(item.name, item.value);
                    });
                    $.ajax({
                        type: 'post',
                        url: '<?php echo base_url() ?>osr/Family/family_members',
                        data: form_data,
                        cache: false,
                        contentType: false,
                        processData: false,
                        beforeSend: function (xhr) {
                            if (valid == 0) {
                                swal({
                                    title: 'من فضلك ادخل كل الحقول ',
                                    text: text_valid,
                                    type: 'error',
                                    confirmButtonText: 'تم'
                                });
                                xhr.abort();
                            } else if (valid == 1) {
                                swal({
                                    title: "جاري الإرسال ... ",
                                    text: "",
                                    imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                                    showConfirmButton: false,
                                    allowOutsideClick: false
                                });
                            }
                        },
                        success: function (html) {
                            swal({
                                title: 'تم اضافة  ',
                                type: 'success',
                                confirmButtonText: 'تم'
                            });
                            var all_inputs_set = $('.family_members_form .form-control');
                            all_inputs_set.each(function (index, elem) {
                                console.log(elem.id + $(elem).val());
                                $(elem).val('');
                            });
                            if (html == 1) {
                                get_data('family_members');
                                show_tab('family_members');
                            }
                        }
                    });
                }

                function update_family_members(id, div_id) {
                    var tabs = ['tab1', 'contact-details-c', 'health-details-c', 'education-details-c', 'skills-details-c', 'tab4'];

                    function checkAdult(tab) {
                        return tab == div_id;
                    }

                    var tab_index = tabs.findIndex(checkAdult);
                    console.warn('tab_index :: ' + tab_index);
                    var all_inputs = $(' #' + div_id + ' [data-validation="required"]');
                    var valid = 1;
                    var text_valid = "";
                    all_inputs.each(function (index, elem) {
                        console.log(elem.id + $(elem).val());
                        if ($(elem).val().length >= 1) {
                            $(elem).css("border-color", "");
                        } else {
                            valid = 0;
                            $(elem).css("border-color", "red");
                        }
                    });
                    var form_data = new FormData();
                    var files = $('#member_photo')[0].files;
                    var file_school = $('#member_sechool_img')[0].files;
                    form_data.append("member_photo", files[0]);
                    form_data.append("member_sechool_img", file_school[0]);
                    var serializedData = $('.family_members_form').serializeArray();
                    $.each(serializedData, function (key, item) {
                        form_data.append(item.name, item.value);
                    });
                    $.ajax({
                        type: 'post',
                        url: '<?php echo base_url() ?>osr/Family/update_family_members/' + id,
                        data: form_data,
                        cache: false,
                        contentType: false,
                        processData: false,
                        beforeSend: function (xhr) {
                            if (valid == 0) {
                                swal({
                                    title: 'من فضلك ادخل كل الحقول ',
                                    text: text_valid,
                                    type: 'error',
                                    confirmButtonText: 'تم'
                                });
                                xhr.abort();
                            } else if (valid == 1) {
                                swal({
                                    title: "جاري الإرسال ... ",
                                    text: "",
                                    imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                                    showConfirmButton: false,
                                    allowOutsideClick: false
                                });
                            }
                        },
                        success: function (html) {
                            swal({
                                title: 'تم اضافة  ',
                                type: 'success',
                                confirmButtonText: 'تم'
                            });
                            if (html == 1) {
                                if (tab_index <= 5) {
                                    if (tab_index == 5) {
                                        console.warn('show_tab :: ' + tabs[0]);
                                        show_tab(tabs[0]);
                                    } else {
                                        console.warn('show_tab :: ' + tabs[(tab_index + 1)]);
                                        show_tab(tabs[(tab_index + 1)]);
                                    }
                                }
                            }
                        }
                    });
                }

                function select_family_members(id) {
                    $.ajax({
                        type: 'get',
                        url: "<?php echo base_url();?>osr/Family/update_family_members/" + id,
                        beforeSend: function () {
                            $('#page_body').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
                        },
                        success: function (d) {
                            $('#page_body').html(d);
                        }
                    });
                }

                function delete_family_members(id) {
                    $.ajax({
                        type: 'get',
                        url: '<?php echo base_url() ?>osr/Family/delete_family_members/' + id,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (html) {
                            if (html == 1) {
                                get_data('family_members');
                                show_tab('family_members');
                            }
                        }
                    });
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
                function get_out_age(value_id) {
                    if (value_id == 0 || value_id == "unlettered" || value_id == "read_write" || value_id == "no_study") {
                        document.getElementById("education_type").setAttribute("disabled", "disabled");
                        document.getElementById("stage_id_fk").setAttribute("disabled", "disabled");
                        document.getElementById("class_id_fk").setAttribute("disabled", "disabled");
                        document.getElementById("school_id_fk").setAttribute("disabled", "disabled");
                        document.getElementById("member_academic_achievement_level").setAttribute("disabled", "disabled");
                        document.getElementById("school_cost").setAttribute("disabled", "disabled");
                        document.getElementById("school_cost").removeAttribute("data-validation", "required");
                        document.getElementById("member_education_level").setAttribute("disabled", "disabled");
                        document.getElementById("special").setAttribute("disabled", "disabled");
                    } else if (value_id == "graduate") {
                        document.getElementById("education_type").setAttribute("disabled", "disabled");
                        document.getElementById("stage_id_fk").setAttribute("disabled", "disabled");
                        document.getElementById("class_id_fk").setAttribute("disabled", "disabled");
                        document.getElementById("school_id_fk").removeAttribute("disabled", "disabled");
                        document.getElementById("member_academic_achievement_level").setAttribute("disabled", "disabled");
                        document.getElementById("school_cost").setAttribute("disabled", "disabled");
                        document.getElementById("member_education_level").setAttribute("disabled", "disabled");
                        $('#school_id_fk').selectpicker('refresh');
                        document.getElementById("special").removeAttribute("disabled", "disabled");
                    } else {
                        document.getElementById("member_academic_achievement_level").removeAttribute("disabled", "disabled");
                        document.getElementById("education_type").removeAttribute("disabled", "disabled");
                        document.getElementById("stage_id_fk").removeAttribute("disabled", "disabled");
                        document.getElementById("class_id_fk").removeAttribute("disabled", "disabled");
                        document.getElementById("school_id_fk").removeAttribute("disabled", "disabled");
                        document.getElementById("member_education_level").removeAttribute("disabled", "disabled");
                        document.getElementById("school_cost").removeAttribute("disabled", "disabled");
                        $('#education_type').selectpicker('refresh');
                        $('#stage_id_fk').selectpicker('refresh');
                        $('#school_id_fk').selectpicker('refresh');
                        document.getElementById("special").removeAttribute("disabled", "disabled");
                    }
                }
            </script>
            <script>
                function get_stage_class(num) {
                    if (num > 0 && num != '') {
                        var id = num;
                        var dataString = 'main_stage=' + id;
                        $.ajax({
                            type: 'get',
                            url: '<?php echo base_url() ?>osr/Family/family_members',
                            data: dataString,
                            dataType: 'html',
                            cache: false,
                            success: function (html) {
                                $("#class_id_fk").html(html);
                            }
                        });
                    }
                }
            </script>
            <script>
                document.getElementById("member_nationality").onchange = function () {
                    if (this.value == 0) {
                        document.getElementById("nationality_other").removeAttribute("disabled", "disabled");
                        document.getElementById("nationality_other").setAttribute("data-validation", "required");
                    } else {
                        document.getElementById("nationality_other").setAttribute("disabled", "disabled");
                        $("#nationality_other").val("");
                    }
                };
                document.getElementById("activity_type").onchange = function () {
                    console.log(this.value);
                    if (this.value == '0') {
                        document.getElementById("activity_type_other").removeAttribute("disabled", "disabled");
                        document.getElementById("activity_type_other").setAttribute("data-validation", "required");
                    } else {
                        document.getElementById("activity_type_other").setAttribute("disabled", "disabled");
                        document.getElementById("activity_type_other").removeAttribute("data-validation");
                    }
                };
            </script>
            <script>
                function getAge() {
                    var nowYear = (new Date()).getFullYear();
                    var myAge = (nowYear - $('#CYear').val());
                    $('#myage').val(myAge)
                }
            </script>
            <script>
                document.getElementById('eldar').onchange = function () {
                    var x = $(this).val();
                    if (x == 1) {
                        document.getElementById("member_house_id_fk").removeAttribute("disabled", "disabled");
                        document.getElementById("member_house_id_fk").setAttribute("data-validation", "required");
                    } else {
                        document.getElementById("member_house_id_fk").value = '';
                        document.getElementById("member_house_id_fk").setAttribute("disabled", "disabled");
                        document.getElementById("member_house_id_fk").removeAttribute("data-validation", "required");
                    }
                }

                function not_work(value_id) {
                    if (value_id == 0) {
                        document.getElementById("member_month_money").setAttribute("disabled", "disabled");
                        document.getElementById("member_month_money").removeAttribute("data-validation", "required");
                        document.getElementById("member_job_place").setAttribute("disabled", "disabled");
                        document.getElementById("member_job_place").removeAttribute("data-validation", "required");
                        document.getElementById("activity_type").setAttribute("disabled", "disabled");
                        document.getElementById("activity_type").removeAttribute("data-validation", "required");
                        document.getElementById("activity_type_other").setAttribute("disabled", "disabled");
                        document.getElementById("activity_type_other").removeAttribute("data-validation", "required");
                    } else {
                        document.getElementById("member_month_money").removeAttribute("disabled", "disabled");
                        document.getElementById("member_month_money").setAttribute("data-validation", "required");
                        document.getElementById("member_job_place").removeAttribute("disabled", "disabled");
                        document.getElementById("member_job_place").setAttribute("data-validation", "required");
                        document.getElementById("activity_type").removeAttribute("disabled", "disabled");
                        document.getElementById("activity_type").setAttribute("data-validation", "required");
                        document.getElementById("activity_type_other").removeAttribute("disabled", "disabled");
                        document.getElementById("activity_type_other").setAttribute("data-validation", "required");
                    }
                }
            </script>
            <script>
                function check() {
                    var type = $('#health_state').val();
                    if (type === 'disease') {
                        document.getElementById("member_dis_response_status").removeAttribute("disabled", "disabled");
                        document.getElementById("member_dis_status").removeAttribute("disabled", "disabled");
                        document.getElementById("member_disease_id_fk").removeAttribute("disabled", "disabled");
                        document.getElementById("member_disability_id_fk").setAttribute("disabled", "disabled");
                        document.getElementById("member_dis_response_status").setAttribute("data-validation", "required");
                        document.getElementById("member_dis_status").setAttribute("data-validation", "required");
                        document.getElementById("member_disease_id_fk").setAttribute("data-validation", "required");
                        document.getElementById("member_disability_id_fk").removeAttribute("data-validation", "required");
                    } else if (type === 'disability') {
                        document.getElementById("member_dis_response_status").removeAttribute("disabled", "disabled");
                        document.getElementById("member_dis_status").removeAttribute("disabled", "disabled");
                        document.getElementById("member_disease_id_fk").setAttribute("disabled", "disabled");
                        document.getElementById("member_disability_id_fk").removeAttribute("disabled", "disabled");
                        document.getElementById("member_dis_response_status").setAttribute("data-validation", "required");
                        document.getElementById("member_dis_status").setAttribute("data-validation", "required");
                        document.getElementById("member_disease_id_fk").removeAttribute("data-validation", "required");
                        document.getElementById("member_disability_id_fk").setAttribute("data-validation", "required");
                    } else if (type === 'good') {
                        document.getElementById("member_dis_response_status").setAttribute("disabled", "disabled");
                        document.getElementById("member_dis_status").setAttribute("disabled", "disabled");
                        document.getElementById("member_disease_id_fk").setAttribute("disabled", "disabled");
                        document.getElementById("member_disability_id_fk").setAttribute("disabled", "disabled");
                        document.getElementById("member_dis_response_status").removeAttribute("data-validation", "required");
                        document.getElementById("member_dis_status").removeAttribute("data-validation", "required");
                        document.getElementById("member_disease_id_fk").removeAttribute("data-validation", "required");
                        document.getElementById("member_disability_id_fk").removeAttribute("data-validation", "required");
                    } else if (type == 0) {
                    }
                }
            </script>
            <script>
                function get_dar(valu) {
                    if (valu == 2) {
                        document.getElementById("member_dar_markz_id_fk").setAttribute("disabled", "disabled");
                        document.getElementById("member_dar_markz_id_fk").setAttribute("disabled", "disabled");
                        $('#member_dar_markz_id_fk').val('');
                    }
                    if (valu == 1) {
                        document.getElementById("member_dar_markz_id_fk").removeAttribute("disabled", "disabled");
                        document.getElementById("member_dar_markz_id_fk").removeAttribute("disabled", "disabled");
                    }
                    if (valu == '') {
                        document.getElementById("member_dar_markz_id_fk").setAttribute("disabled", "disabled");
                        document.getElementById("member_dar_markz_id_fk").setAttribute("disabled", "disabled");
                    }
                }
            </script>
            <script>
                function GetHij_Status(valu) {
                    if (valu == 1) {
                        document.getElementById("member_last_hij_date").removeAttribute("disabled", "disabled");
                        document.getElementById("member_last_hij_date").setAttribute("data-validation", "required");
                    } else {
                        document.getElementById("member_last_hij_date").setAttribute("disabled", "disabled");
                        $('#member_last_hij_date').val('');
                    }
                }

                function GetOmra_Status(valu) {
                    if (valu == 1) {
                        document.getElementById("member_last_omra_date").removeAttribute("disabled", "disabled");
                        document.getElementById("member_last_omra_date").setAttribute("data-validation", "required");
                    } else {
                        document.getElementById("member_last_omra_date").setAttribute("disabled", "disabled");
                        $('#member_last_omra_date').val('');
                    }
                }
            </script>
            <script>
                function check_rehabilitation(valu) {
                    if (valu == 1) {
                        document.getElementById("member_rehabilitation_value").removeAttribute("disabled", "disabled");
                    } else {
                        $('#member_rehabilitation_value').val('');
                        document.getElementById("member_rehabilitation_value").setAttribute("disabled", "disabled");
                    }
                }

                function other_skill_function() {
                    if ($('#check_button').attr('data-click-state') == 1) {
                        $('#check_button').attr('data-click-state', 0);
                        document.getElementById("member_other_skill").removeAttribute("disabled", "disabled");
                    } else if ($('#check_button').attr('data-click-state') == 0) {
                        $('#check_button').attr('data-click-state', 1);
                        document.getElementById("member_other_skill").setAttribute("disabled", "disabled");
                        $('#member_other_skill').val('');
                    }
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
            <?php
            break;
        case 'family_money':
            ?>
            <script>
                function save_money() {
                    // $('#registerForm').serialize(),
                    var all_inputs = $(' .money_form [data-validation="required"]');
                    var valid = 1;
                    var text_valid = "";
                    all_inputs.each(function (index, elem) {
                        console.log(elem.id + $(elem).val());
                        if ($(elem).val().length >= 1) {
                            // valid=1;
                            $(elem).css("border-color", "");
                        } else {
                            valid = 0;
                            $(elem).css("border-color", "red");
                        }
                    });
                    $.ajax({
                        type: 'post',
                        url: '<?php echo base_url() ?>registration/Family/family_money',
                        data: $('#money_form').serialize(),
                        cache: false,
                        beforeSend: function (xhr) {
                            if (valid == 0) {
                                swal({
                                    title: 'من فضلك ادخل كل الحقول ',
                                    text: text_valid,
                                    type: 'error',
                                    confirmButtonText: 'تم'
                                });
                                xhr.abort();
                            } else if (valid == 1) {
                                swal({
                                    title: "جاري الإرسال ... ",
                                    text: "",
                                    imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                                    showConfirmButton: false,
                                    allowOutsideClick: false
                                });
                            }
                        },
                        success: function (html) {
                            swal({
                                title: 'تم اضافة  ',
                                type: 'success',
                                confirmButtonText: 'تم'
                            });
                            get_data('family_money');
                            if (html == 1) {
                                show_tab('general-detailsfa');
                            }
                        }
                    });
                }
            </script>
            <?php
            break;
        case 'attach_files':
            ?>
            <script>
                function save_attatch(input_id, div_id) {
                    var form_data = new FormData();
                    var files = $('#' + input_id)[0].files;
                    for (var count = 0; count < files.length; count++) {
                        form_data.append(input_id + "[]", files[count]);
                    }
                    var tabs = ['tab1', 'tab2'];

                    function checkAdult(tab) {
                        return tab == div_id;
                    }

                    var tab_index = tabs.findIndex(checkAdult);
                    console.warn('tab_index :: ' + tab_index);
                    var all_inputs = $(' #' + div_id + ' [data-validation="required"]');
                    form_data.append($(' #' + div_id + ' [name="add"]').val(), 'add');
                    var valid = 1;
                    var text_valid = "";
                    all_inputs.each(function (index, elem) {
                        console.log(elem.id + $(elem).val());
                        console.log(elem.name + $(elem).val());
                        if ($(elem).val().length >= 1) {
                            form_data.append(elem.name, $(elem).val());
                            $(elem).css("border-color", "");
                        } else {
                            valid = 0;
                            $(elem).css("border-color", "red");
                        }
                    });
                    $.ajax({
                        type: 'post',
                        url: '<?php echo base_url() ?>osr/Family/attach_files',
                        data: form_data,
                        dataType: 'text',
                        cache: false,
                        contentType: false,
                        processData: false,
                        beforeSend: function (xhr) {
                            if (valid == 0) {
                                swal({
                                    title: 'من فضلك ادخل كل الحقول ',
                                    text: text_valid,
                                    type: 'error',
                                    confirmButtonText: 'تم'
                                });
                                xhr.abort();
                            } else if (valid == 1) {
                                swal({
                                    title: "جاري الإرسال ... ",
                                    text: "",
                                    imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                                    showConfirmButton: false,
                                    allowOutsideClick: false
                                });
                            }
                        },
                        success: function (html) {
                            if (html == 1) {
                                swal({
                                    title: 'تم اضافة  ',
                                    type: 'success',
                                    confirmButtonText: 'تم'
                                });
                                get_data('attach_files');
                                show_tab('attach_files');
                                if (tab_index <= 1) {
                                    if (tab_index == 1) {
                                        console.warn('show_tab :: ' + tabs[0]);
                                        show_tab(tabs[0]);
                                    } else {
                                        console.warn('show_tab :: ' + tabs[(tab_index + 1)]);
                                        show_tab(tabs[(tab_index + 1)]);
                                    }
                                }
                            } else {
                                swal({
                                    title: 'لم تم اضافة  ',
                                    type: 'success',
                                    confirmButtonText: 'تم'
                                });
                            }
                        }
                    });
                }

                function DeleteFileAttach(id, method) {
                    $.ajax({
                        type: 'get',
                        url: '<?php echo base_url() ?>osr/Family/' + method + '/' + id,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (html) {
                            if (html == 1) {
                                get_data('attach_files');
                                show_tab('attach_files');
                            }
                        }
                    });
                }
            </script>
            <?php
            break;
        case 'account_setting':
            ?>
            <script>
                function valid_pass_length() {
                    if ($("#user_password").val().length < 4) {
                        document.getElementById('validate_length').style.color = '#F00';
                        document.getElementById('validate_length').innerHTML = 'كلمة المرور اكثر من اربع حروف';
                        $('button[type="submit"]').attr("disabled", "disabled");
                    } else if ($("#user_password").val().length > 4 && $("#user_password").val().length < 10) {
                        document.getElementById('validate_length').style.color = '#F00';
                        document.getElementById('validate_length').innerHTML = 'كلمة المرور ضعيفة';
                        $('button[type="submit"]').attr("disabled", "disabled");
                    } else if ($("#user_password").val().length > 10) {
                        document.getElementById('validate_length').style.color = '#00FF00';
                        document.getElementById('validate_length').innerHTML = 'كلمة المرور قوية';
                        $('button[type="submit"]').removeAttr("disabled");
                    }
                }

                function valid_pass_copy() {
                    if ($("#user_password").val() == $("#user_password_copy").val()) {
                        document.getElementById('validate_copy').style.color = '#00FF00';
                        document.getElementById('validate_copy').innerHTML = 'كلمة المرور متطابقة';
                        $('button[type="button"]').removeAttr("disabled");
                    } else {
                        document.getElementById('validate_copy').style.color = '#F00';
                        document.getElementById('validate_copy').innerHTML = 'كلمة المرور غير متطابقة';
                        $('button[type="button"]').attr("disabled", "disabled");
                    }
                }

                function save_account() {
                    var all_inputs = $(' .account_setting_form [data-validation="required"]');
                    var valid = 1;
                    var text_valid = "";
                    all_inputs.each(function (index, elem) {
                        console.log(elem.id + $(elem).val());
                        if ($(elem).val().length >= 1) {
                            $(elem).css("border-color", "");
                        } else {
                            valid = 0;
                            $(elem).css("border-color", "red");
                        }
                    });
                    var form_data = new FormData();
                    var files = $('#account_img')[0].files;
                    form_data.append("account_img", files[0]);
                    form_data.append('add', 'add');
                    var serializedData = $('#account_setting_form').serializeArray();
                    $.each(serializedData, function (key, item) {
                        form_data.append(item.name, item.value);
                    });

                    $.ajax({
                        type: 'post',
                        url: '<?php echo base_url() ?>osr/Family/account_setting',
                        data: form_data,
                        cache: false,
                        contentType: false,
                        processData: false,
                        beforeSend: function (xhr) {
                            if (valid == 0) {
                                swal({
                                    title: 'من فضلك ادخل كل الحقول ',
                                    text: text_valid,
                                    type: 'error',
                                    confirmButtonText: 'تم'
                                });
                                xhr.abort();
                            } else if (valid == 1) {
                                swal({
                                    title: "جاري الإرسال ... ",
                                    text: "",
                                    imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                                    showConfirmButton: false,
                                    allowOutsideClick: false
                                });
                            }
                        },
                        success: function (html) {
                            swal({
                                title: 'تم اضافة  ',
                                type: 'success',
                                confirmButtonText: 'تم'
                            });
                            // $('button[type="button"]').attr("disabled","disabled");
                            $('#user_password_copy').val('');
                            $('#user_password').val('');
                            $('#validate_copy').hide();
                            $('#add').val('');
                            if (html == 1) {
                                show_tab('account_setting');
                                window.location.reload();
                            }
                        }
                    });
                }

                function delete_image_account(id) {
                    $.ajax({
                        type: 'get',
                        url: '<?php echo base_url() ?>osr/Family/delete_image_account/' + id,
                        cache: false,
                        success: function (html) {
                            swal({
                                title: 'تم حذف الصوره  ',
                                type: 'success',
                                confirmButtonText: 'تم'
                            });
                            $("#full_img").css("display", "none");
                            $("#empty_img").css("display", "block");
                        }
                    });
                }
            </script>
            <script>
                function valid_pass_copy() {
                    if ($("#user_password").val() == $("#user_password_copy").val()) {
                        document.getElementById('validate_copy').style.color = '#00FF00';
                        document.getElementById('validate_copy').innerHTML = 'كلمة المرور متطابقة';
                        $('button[type="button"]').removeAttr("disabled");
                    } else {
                        document.getElementById('validate_copy').style.color = '#F00';
                        document.getElementById('validate_copy').innerHTML = 'كلمة المرور غير متطابقة';
                        $('button[type="button"]').attr("disabled", "disabled");
                    }
                }
            </script>
            <?php
            ?>
        <?php
        case 'sponsor_details' :
            ?>
            <script>
                function LoadTable(value) {
                    var id = value;
                    if (id != '') {
                        var dataString = 'id=' + id;
                        $.ajax({
                            type: 'post',
                            url: '<?php echo base_url() ?>osr/Sponsor/get_kafala_details',
                            data: dataString,
                            dataType: 'html',
                            cache: false,
                            beforeSend: function () {
                                $('#load_kafala_div').html(
                                    '<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>'
                                );
                            },
                            success: function (html) {
                                $("#load_kafala_div").html(html);
                            }
                        });
                    }
                }
            </script>
            <?php
            break;
        case 'contact_messages' :
            ?>
            <script>
                function load_message(row_id) {
                    $.ajax({
                        type: 'post',
                        url: "<?php echo base_url();?>osr/Family/load_contact_message",
                        data: {row_id: row_id},
                        beforeSend: function () {
                            $('#result').html(
                                '<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
                        },
                        success: function (d) {
                            $('#result').html(d);
                        }
                    });
                }
            </script>
            <?php
            break;
            ?>
            
            
            
    // in switch
<?php
break;
case 'Sarf_order':
?>
<script>

    get_data_table('osr/service_orders/Sarf_order/get_data_table', 'table_div');
    family_data_load();
    var options_select = [];

    function add_row_sanfe() {
        var table = document.getElementById('asnafe_table');
        console.log(" lenth :" + table.rows.length);
        var len = table.rows.length;
        var asnaf = $('#sanf_select1').html();

        var row = ' <tr id="row_1" >\n' +
            '  <td>' + (len + 1) + '</td>\n' +
            '  <td> <select     data-validation="required" class="form-control  " name="data[details][sanf_code][]"   id="sanf_select' + (len + 1) + '" onchange="get_sanf_data(this.value,' + (len + 1) + ')" > ' + asnaf + '</select> ' +
            '  <input type="hidden"    class="form-control  " name="data[details][sanf_name][]]" id="sanf_name' + (len + 1) + '" value="" readonly/>\n' +
            ' <input type="hidden"    class="form-control  " name="data[details][sanf_coade_br][]]" id="sanf_coade_br' + (len + 1) + '" value="" readonly/>\n' +
            '</td>\n' +
            '  <td> <input type="text"     data-validation="required" class="form-control  "  id="sanf_code' + (len + 1) + '" value=""  readonly/></td>\n' +
            ' <td> <input type="text"   data-validation="required" class="form-control  " name="data[details][sanf_whda][]" id="sanf_whda' + (len + 1) + '" value="" readonly/></td>\n' +
            /* ' <td> <input type="text"   data-validation="required" class="form-control  " name="sanf_amount[]" id="sanf_amount' +(len + 1) + '" value=""  /></td>\n' +*/
            ' <td> <input type="text"    class="form-control  " name="data[details][sanf_one_price][]" id="sanf_one_price' + (len + 1) + '" value="" readonly/> </td>\n' +
            '  <td> <input type="text"   class="form-control  " name="data[details][notes][]"  id="notes' + (len + 1) + '" value="" /></td>\n' +
            '  <input type="hidden"    class="form-control  " name="all_egmali[]" id="all_egmali' + (len + 1) + '" value="" readonly/>\n' +
            '  <input readonly type="hidden" class="form-control  " name="sanf_salahia_date[]" id="sanf_salahia_date' + (len + 1) + '" value="" />\n' +
            ' <input type="hidden"    class="form-control  " name="lot[]" id="lot' + (len + 1) + '" value="" />\n' +
            ' <td><a id="1" onclick=" $(this).closest(\'tr\').remove();"><i class="fas fa-trash"></i></a></td>\n' +
            '  </tr>';

        var new_row = table.insertRow(table.rows.length);
        new_row.innerHTML = row;
        new_row.id = 'row_' + (table.rows.length);
        // remove_option("sanf_select" + (len + 1));
    }
</script>
<script>
    function remove_option(select_id) {
        console.log("select_id :: " + select_id);
        console.log("options_select :: " + options_select);
        for (var i = 0; i < options_select.length; i++) {
            console.log("options_select  remove:: " + "option[value='" + options_select[i] + "']");

            // $('#'+select_id + 'option[value="'+options_select[i]+'"]').remove();
            $('#sanf_select2 option[value="1021"]').remove();
        }

    }

    function get_sanf_data(value, id) {
        options_select.push(value);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>osr/service_orders/Sarf_order/get_asnaf_data",
            data: {sanf_code: value},
            success: function (d) {
                var obj = JSON.parse(d);
                $('#sanf_name' + id).val(obj.name);
                $('#sanf_code' + id).val(obj.code);
                $('#sanf_whda' + id).val(obj.whda_name);
                $('#sanf_one_price' + id).val(obj.price);
            }

        });

    }
</script>
<script>
    function save_sarf_order() {

        var all_inputs = $(' #Serv_sarf_order [data-validation="required"]');
        var valid = 1;
        var text_valid = "";
        all_inputs.each(function (index, elem) {
            console.log(elem.id);
            console.log($(elem).val());
            if ($(elem).val()) {
                if ($(elem).val().length >= 1) {
                    $(elem).css("border-color", "");
                } else {
                    valid = 0;
                    $(elem).css("border-color", "red");
                }
            } else {
                valid = 0;
                $(elem).css("border-color", "red");
            }

        });

        $.ajax({
            type: 'post',
            url: $('#Serv_sarf_order').attr('action'),
            data: $('#Serv_sarf_order').serialize(),
            beforeSend: function (xhr) {
                if (valid == 0) {
                    swal({
                        title: 'من فضلك ادخل كل الحقول ',
                        text: text_valid,
                        type: 'error',
                        confirmButtonText: 'تم'
                    });
                    xhr.abort();
                } else if (valid == 1) {
                    swal({
                        title: "جاري الإرسال ... ",
                        text: "",
                        imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                        showConfirmButton: false,
                        allowOutsideClick: false
                    });
                }
            },
            success: function (html) {
                if (html == 1) {
                    swal({
                        title: 'تم اضافة  ',
                        type: 'success',
                        confirmButtonText: 'تم'
                    });
                    var all_inputs_set = $('.Serv_sarf_order .form-control');
                    all_inputs_set.each(function (index, elem) {
                        console.log(elem.id + $(elem).val());
                        $(elem).val('');
                    });
                    // $('#table_panal').show();
                    get_data_table('osr/service_orders/Sarf_order/get_data_table', 'table_div');

                } else if (html == 2) {
                    swal({
                        title: 'تم التعديل  ',
                        type: 'success',
                        confirmButtonText: 'تم'
                    });
                    load_page_sarf();
                }
            }
        });
    }

    function load_page_sarf() {
        $.ajax({
            type: 'get',
            url: "<?php echo base_url();?>osr/service_orders/Sarf_order",
            data: {load: 1},
            success: function (d) {
                $('#page_panal').html(d);
                get_data_table('osr/service_orders/Sarf_order/get_data_table', 'table_div');

            }
        });
    }

    function make_delete_talab(talab_id) {
        $.ajax({
            type: 'get',
            url: "<?php echo base_url();?>osr/service_orders/Sarf_order/make_delete_talab",
            data: {talab_id: talab_id},
            success: function (d) {
                swal({
                    title: 'تم الحذف  ',
                    type: 'success',
                    confirmButtonText: 'تم'
                });
                get_data_table('osr/service_orders/Sarf_order/get_data_table', 'table_div');

            }
        });
    }

    function make_update_talab(talab_id) {
        $.ajax({
            type: 'get',
            url: "<?php echo base_url();?>osr/service_orders/Sarf_order/update_talab",
            data: {talab_id: talab_id},
            success: function (d) {
                $('#page_panal').html(d);
                $('#table_div').hide();

            }
        });
    }

    function get_details_sarf(talab_id) {
        $.ajax({
            type: 'get',
            url: "<?php echo base_url();?>osr/service_orders/Sarf_order/get_details_sarf",
            data: {talab_id: talab_id},
            success: function (d) {
                $('#load_detailes_div').html(d);

            }
        });
    }
</script>
<?php
break; ?>
        
            
            
            
            
            
            
            
        <?php
        default:
            break;
    }
} ?>

<script>
    function family_data_load() {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>osr/Dash/family_data_load",
            beforeSend: function () {
                $('#family_data_load').html(
                    '<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#family_data_load').html(d);
            }
        });
    }
</script>



// -------------------------------------------
<script>
    $(document).ready(function () {
        console.log("ready!  any case");
        family_data_load();
    });

</script>
</body>
</html>