<!DOCTYPE html>
<html>
<head>
    <meta name="google-site-verification" content="QbCxI_kwwybT2rIwhSKDbmmAc7mIsVYUth9IaZMZ4pc"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title><?php if (isset($title) && $title != null && !empty($title)) {
            echo $title;
        } else {
            echo " نظام الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء";
        } ?></title>
    <meta name="description" content="نظام الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء"/>
    <meta name="keywords" content="نظام الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء"/>
    <meta name="author" content="نظام الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء"/>
    <?php if (isset($maps)) { ?>
        <script type="text/javascript">
            var centreGot = false;
        </script>
        <?php echo $maps['js']; ?>
    <?php } ?>
    <!----- nas --->
    <script src="<?= base_url() . 'asisst/admin_asset/' ?>sweet_alert/sweetalert.js"></script>
    <link rel="stylesheet" href="<?= base_url() . 'asisst/admin_asset/' ?>sweet_alert/sweetalert.css">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() . "asisst/fav/" ?>favicon-16x16.png">
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/bootstrap-arabic-theme.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/bootstrap-arabic.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/bootstrap-select.min.css">
    <!-- <link href="<?php echo base_url() ?>asisst/admin_asset/plugins/bootstrap-toggle/bootstrap-toggle.min.css"
      rel="stylesheet" type="text/css"/>-->
    <link href="<?php echo base_url() ?>asisst/admin_asset/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>asisst/admin_asset/plugins1/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/font-awesome-animation.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/pe-icon-7-stroke.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/lobipanel.min.css">
    <!---------------------------------------------------------->
    <link href="<?= base_url() . 'asisst/admin_asset/' ?>plugins/icheck/skins/all.css" rel="stylesheet"
          type="text/css"/>
    <!----------------------------------------------------------->
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/plugins/fileinput/css/fileinput.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/datepicker.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/ckeditor/samples/css/samples.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/tables/jquery.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/tables/buttons.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/tables/responsive.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/tables/table.css">
    <link href="<?php echo base_url(); ?>asisst/admin_asset/datepicker/css/bootstrap-datetimepicker.min.css" media="all"
          rel="stylesheet"/>
    <!--------------------------------------------- calander -------------------------------------------------------------->
    <?php if (isset($footer_calender)) { ?>
        <link rel="stylesheet"
              href="<?= base_url() . 'asisst/admin_asset/' ?>plugins/calendar/css/jquery-ui.custom.min.css"/>
        <link rel="stylesheet"
              href="<?= base_url() . 'asisst/admin_asset/' ?>plugins/calendar/css/fullcalendar.min.css"/>
    <?php } ?>
    <!--------------------------------------------- calander -------------------------------------------------------------->
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/calendar.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/modal.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/animate.css">
    <!--
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asisst/admin_asset/datepicker/css/jquery.calendars.picker.css" />
    -->
    <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
    <link rel="stylesheet"
          href="<?php echo base_url() ?>asisst/admin_asset/css/stylecrm.css?<?php echo date('l jS \of F Y h:i:s A'); ?>">
    <link rel="stylesheet"
          href="<?php echo base_url() ?>asisst/admin_asset/css/style.css?<?php echo date('l jS \of F Y h:i:s A'); ?>">
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/responsive.css">
    <link type="text/css" rel="stylesheet" media="all" href="..." id="test-css"/>
    <link href="<?php echo base_url() ?>asisst/admin_asset/css/mdtimepicker.css" rel="stylesheet" type="text/css">
    <!---------------------------------------------_new---------------------------->
    <link rel="stylesheet"
          href="<?= base_url() ?>asisst/admin_asset/plugins1/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet"
          href="<?= base_url() ?>asisst/admin_asset/plugins1/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
          href="<?= base_url() ?>asisst/admin_asset/plugins1/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet"
          href="<?= base_url() ?>asisst/admin_asset/plugins1/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url() ?>asisst/admin_asset/plugins1/select2/css/select2.min.css">
    <link rel="stylesheet"
          href="<?= base_url() ?>asisst/admin_asset/plugins1/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet"
          href="<?= base_url() ?>asisst/admin_asset/plugins1/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet"
          href="<?= base_url() ?>asisst/admin_asset/plugins1/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style	-->
    <link rel="stylesheet" href="<?= base_url() ?>asisst/admin_asset/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>asisst/admin_asset/plugins1/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>asisst/admin_asset/dist/css/custom.css">
    <style>
        .content-wrapper {
            margin-top: 42px !important;
            /* background: url(../img/logo-bg2.png); */
        }

        .name_of_charity {
            color: #0060b3;
            font-size: 16px;
            text-align: center;
            /*line-height: 25px;*/
            padding: 0px 0px;
            margin-top: 0px;
            border-radius: 5px
        }

        .name_of_charity img {
            float: right;
            /* height: 70px;*/
            width: 200px;
            height: 45px;
        }

        .name_of_vision img {
            float: right;
            height: 60px;
            margin-top: 3px;
            margin-right: 20px;
            border-right: 1px solid #fff;
            padding-right: 20px;
        }

        .name_of_charity p {
            float: right;
            margin-bottom: 0;
            font-size: 16px;
        }

        .navbar .nav-tabs > li.active > a,
        .navbar .nav-tabs > li.active > a:hover,
        .navbar .nav-tabs > li.active > a:focus,
        .navbar .nav > li > a:hover, .navbar .nav > li > a:focus {
            background-color: transparent;
            color: #002542;
            border-bottom-color: transparent;
        }

        .navbar-nav.navbar-right button {
            background-color: transparent;
            border: 0;
            color: #002542;
            font-size: 16px;
        }

        .navbar-nav.navbar-right button a {
            font-size: 16px;
        }

        .navbar-nav > li > a.home-icon {
            margin-top: 5px;
            margin-left: 20px;
            width: 100px;
            overflow: hidden;
            padding: 0 !important;
            margin-right: 10px;
        }

        .navbar-nav > li > a.home-icon span {
            color: #fff;
            margin-right: -48px;
            transition: all 0.3s ease;
            -webkit-transition: all 0.3s ease;
            -moz-transition: all 0.3s ease;
        }

        .navbar-nav > li > a.home-icon i {
            border-radius: 0;
            font-weight: 500;
            color: #fff;
            font-size: 23px;
            background-color: #293949;
        }

        .navbar-nav > li > a.home-icon:hover span,
        .navbar-nav > li > a.home-icon:focus span {
            margin-right: 0px;
        }

        .dropdown-menu > li > a.sign-out-btn:hover,
        .dropdown-menu > li > a.sign-out-btn:focus {
            background-image: none;
            background-color: #e7575e;
            border-color: #BF2D35;
        }

        .main-header .full-screen {
            position: relative;
            /* left: 0px; */
            background-image: none;
            padding: 17px 2px;
            font-size: 26px;
            line-height: 10px;
            /* margin-right: 7px; */
            color: #002542;
            cursor: pointer;
        }

        .main-header .full-screen i {
            background-color: transparent;
            border-radius: 0;
            font-size: 24px;
            font-weight: 500;
        }
    </style>
    <style>
        .clock {
            display: inline-block;
            color: #373636;
            font-size: 15px;
            font-family: Orbitron;
            font-weight: bold;
            background-color: #f2f4f6;
            padding: 5px;
            margin: 3px 10px 0 0;
            border-radius: 5px;
            /* box-shadow: -2px 2px 3px #fff; */
            border: 1px solid;
        }

        #MyClockDisplay {
            letter-spacing: 2px;
            margin-left: 14px;
            /*float: right;*/
        }

        .pray {
            border-radius: 5px !important;
            padding: 4px 6px 0 6px !important;
            margin-left: 15px;
            position: absolute !important;
            top: -15px;
        }

        .pray a {
            color: #fff !important;
            font-weight: 500;
        }

        .pray a i {
            display: block;
            font-weight: 500 !important;
            margin: auto;
            background-color: transparent !important;
            color: #fff;
        }

        .w3-teal h3 {
            font-size: 16px;
        }

        .btn-email {
            position: fixed;
            bottom: 45px;
            left: 54px;
            z-index: 999;
            background-color: #097580;
            color: #fff;
            padding: 5px 10px;
            border-radius: 50%;
            font-size: 20px;
            cursor: pointer;
        }
    </style>
    <?php date_default_timezone_set('Asia/Riyadh'); ?>
</head>
<body class="hold-transition sidebar-mini  sidebar-collapse sidebar-open pace-done">
<div class="wrapper">
    <header class="main-header">
        <!--      <a href="<?php echo base_url() ?>dash" class="logo">
     <span class="logo-mini">
  
                    	  <?php $img = '';
        if (isset($_SESSION['main_data_info']->logo)) {
            $img = $_SESSION['main_data_info']->logo;
        } ?>
	<img src="<?php echo base_url() . "uploads/images/" . $img ?>"
		 onerror="this.src='<?php echo base_url() . "asisst/admin_asset/img/logo-atheer.png" ?>'"
		 alt="" class="center-block" />
       </span>
     
       
   </a>
-->
        <nav class="navbar navbar-static-top" style="background-color:#293949 !important ;">
            <!--<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
             <span class="sr-only">Toggle navigation</span>
             <span class="pe-7s-angle-left-circle"></span>
            </a>-->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav col-sm-6" style="margin-top: 7px;">
                    <li><a href="javascript:void(0)" onclick="get_menu();" class="sidebar-toggle"
                           data-toggle="offcanvas" role="button">
                            <!--<span class="sr-only">Toggle navigation</span>-->
                            <span class="fa fa-bars"></span>
                        </a></li>
                    <li><a onclick="requestFullScreen()" class="full-screen"><i class="fa fa-arrows-alt"
                                                                                aria-hidden="true"></i></a></li>
                    <li><a href="<?php echo base_url() ?>dash" class="home-icon">
                            <i class="fa fa-home" style=""></i>
                            <span>الرئيسية</span></a>
                    </li>

                    <li>
                        <!-- <div class="clock">
                              <div id="MyClockDisplay"  onload="showTime()"> </div><span id="session-name"></span>
                         </div>-->
                    </li>
                </ul>
                <style>
                    body, html {
                        margin: 0;
                        padding: 0;
                        font: 14px / 1.8 Arial, 'Helvetica Neue', Helvetica, sans-serif;
                        font-weight: 300;
                        color: #575757;
                    }

                    .navbar-nav > li > a > i {
                        padding: 4px 3px;
                        width: 35px;
                        text-align: center;
                        color: #002542;
                        background-color: #ff729d00;
                        height: 35px;
                        font-size: 21px;
                        font-weight: 500;
                        border-radius: 4px;
                        color: #fff;
                        border-radius: 50%;
                        list-style: none;
                    }

                    #nav-container {
                        position: relative;
                    }

                    #nav-container .bg {
                        position: absolute;
                        top: 70px;
                        left: 0;
                        width: 100%;
                        height: calc(100% - 70px);
                        visibility: hidden;
                        opacity: 0;
                        transition: .3s;
                        background: #000;
                    }

                    #nav-container:focus-within .bg {
                        visibility: visible;
                        opacity: .6;
                    }

                    #nav-container * {
                        visibility: visible;
                    }

                    .button-notify {
                        position: relative;
                        outline: none;
                        z-index: 1;
                        -webkit-appearance: none;
                        border: 0;
                        background: transparent;
                        border-radius: 0;
                        height: auto;
                        width: 30px;
                        cursor: pointer;
                        pointer-events: auto;
                        margin-right: 25px;
                        touch-action: manipulation;
                        -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
                        margin-top: 6px;
                    }

                    .button-notify i {
                        color: #fff;
                        font-size: 25px;
                    }

                    .icon-bar {
                        display: block;
                        width: 100%;
                        height: 3px;
                        background: #aaa;
                        transition: .3s;
                    }

                    .icon-bar + .icon-bar {
                        margin-top: 5px;
                    }

                    /*#nav-container:focus-within .button-notify {
                      pointer-events: none;
                    }*/
                    .openNotify {
                        transform: translateX(0) !important;
                    }

                    #nav-content {
                        margin-top: 55px;
                        padding: 10px;
                        width: 300px;
                        max-width: 300px;
                        /*height: 600px;*/
                        min-height: 100%;
                        position: absolute;
                        top: 0;
                        /*left: 0;*/
                        right: -211px;
                        /* height: calc(100% - 70px); */
                        background-color: rgba(19, 19, 19, 0.8);
                        pointer-events: auto;
                        -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
                        transform: translateX(-100%);
                        transition: transform .3s;
                        /* will-change: transform;
                         contain: paint;*/
                    }

                    #nav-content ul {
                        height: 100%;
                    }

                    #nav-content li {
                        width: 33.3%;
                        float: right;
                        text-align: center;
                    }

                    #nav-content li a i {
                        color: #fff;
                        display: block;
                        margin-bottom: 7px;
                        font-size: 25px;
                        -webkit-transition: 0.5s all ease-in;
                        transition: 0.5s all ease-in;
                    }

                    #nav-content li a {
                        position: relative;
                        color: #fff;
                        font-size: 12px;
                        padding: 10px 5px;
                        display: block;
                        text-transform: uppercase;
                        transition: color .1s;
                        background-color: #222;
                        margin: 2px;
                    }

                    #nav-content li a:hover {
                        color: #fff;
                        background-color: #0b5961;
                    }

                    #nav-content li a:hover i {
                        -webkit-transform: rotate(360deg);
                        transform: rotate(360deg);
                    }

                    #nav-content li a .badge {
                        position: absolute;
                        left: 0;
                        top: 0;
                        border-radius: 50%;
                        background-color: #E5343D;
                        font-weight: 500;
                    }

                    /*
                    #nav-container:focus-within #nav-content {
                      transform: none;
                    }*/
                    #nav-container ul {
                        padding: 0;
                        list-style: none;
                    }

                    .count_notify {
                        position: absolute;
                        left: 0;
                        top: 0;
                        border-radius: 50%;
                        background-color: #E5343D;
                        font-weight: 500
                    }

                    .margin_notifaction {
                        float: left !important;
                    }
                </style>
                <ul class="navbar-nav col-sm-1" style="margin-top: 7px;">
                    <!-- Messages Dropdown Menu -->
                    <li class="nav-item dropdown margin_notifaction" style="list-style: none;">
                        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                            <i class="far fa-comments"></i>
                            <span class="badge badge-danger navbar-badge">3</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right"
                             style="left: inherit; right: 0px;">
                            <a href="#" class="dropdown-item">
                                <!-- Message Start -->
                                <div class="media">
                                    <img src="<?php echo base_url() ?>asisst/admin_asset/img/avatar5.png"
                                         alt="User Avatar" class="img-size-50 mr-3 img-circle">
                                    <div class="media-body">
                                        <h3 class="dropdown-item-title">
                                            اسم الشخص
                                            <span class="float-right text-sm text-danger"><i
                                                        class="fas fa-star"></i></span>
                                        </h3>
                                        <p class="text-sm">من فضلك اترك رسالتك</p>
                                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> منذ 4 ساعات</p>
                                    </div>
                                </div>
                                <!-- Message End -->
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <!-- Message Start -->
                                <div class="media">
                                    <img src="<?php echo base_url() ?>asisst/admin_asset/img/avatar5.png"
                                         alt="User Avatar" class="img-size-50 img-circle mr-3">
                                    <div class="media-body">
                                        <h3 class="dropdown-item-title">
                                            اسم الشخص
                                            <span class="float-right text-sm text-muted"><i
                                                        class="fas fa-star"></i></span>
                                        </h3>
                                        <p class="text-sm">من فضلك اترك رسالتك</p>
                                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> منذ 4 ساعات</p>
                                    </div>
                                </div>
                                <!-- Message End -->
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <!-- Message Start -->
                                <div class="media">
                                    <img src="<?php echo base_url() ?>asisst/admin_asset/img/avatar5.png"
                                         alt="User Avatar" class="img-size-50 img-circle mr-3">
                                    <div class="media-body">
                                        <h3 class="dropdown-item-title">
                                            اسم الشخص
                                            <span class="float-right text-sm text-warning"><i
                                                        class="fas fa-star"></i></span>
                                        </h3>
                                        <p class="text-sm">اسم الرسالة </p>
                                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> منذ 4 ساعات</p>
                                    </div>
                                </div>
                                <!-- Message End -->
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item dropdown-footer">عرض كل الرسائل</a>
                        </div>
                    </li>
                    <!-- Notifications Dropdown Menu -->
                    <li class="nav-item dropdown margin_notifaction" style="list-style: none;">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="far fa-bell"></i>
                            <span class="badge badge-warning navbar-badge">15</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <span class="dropdown-item dropdown-header">15 تنبيه</span>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-envelope mr-2"></i> 4 رسائل جديدة
                                <span class="float-right text-muted text-sm">3 دقائق</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-users mr-2"></i> 8 طلبات صداقة
                                <span class="float-right text-muted text-sm">12 ساعة</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-file mr-2"></i>3 تقارير
                                <span class="float-right text-muted text-sm">يومين</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item dropdown-footer">عرض كل التنبيهات</a>
                        </div>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right col-sm-3" style=" margin-top:10px;">
                    <?php
                    $out_title = "  نظام الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء";
                    $out_link = "Dash/home";
                    $out_font_awesome = 'fa fa-home';
                    if (isset($this->groups_title) && !empty($this->groups_title)) {
                        $out_title = $this->groups_title['title'];
                        $out_link = $this->groups_title['link']; //font_awesome
                        //   $out_font_awesome=$this->groups_title['font_awesome']; 
                    } elseif (isset($title_name) && !empty($title_name)) {
                        $out_title = $title_name['title'];
                        $out_link = $title_name['link'];
                        // $out_font_awesome=$title_name['font_awesome'];   
                    } ?>
                    <?php ?>


                    <!--------------------------------------- New Style --------------------------------------->
                    <style>
                        .main-header {
                            position: fixed;
                            max-height: 45px;
                            z-index: 1030;
                            box-shadow: 0px 0px 0px;
                            width: 100%;
                        }

                        .sidebar-mini.sidebar-collapse .main-header .navbar {
                            margin-left: 0px !important;
                            height: 46px;
                        }

                        .main-header .navbar {
                            -webkit-transition: margin-right 0.3s ease-in-out;
                            transition: margin-right 0.3s ease-in-out;
                            margin-bottom: 0;
                            margin-right: 0px;
                            border: none;
                            height: 46px;
                            border-radius: 0;
                            background-color: #fff;
                            border-bottom: 1px solid #dee2e6;
                            /* background: url(../img/logo-bg2.png); */
                        }

                        .main-header .sidebar-toggle {
                            position: relative;
                            /* left: 0px; */
                            background-image: none;
                            padding: 5px 2px;
                            font-size: 24px;
                            line-height: 10px;
                            /* margin-right: 7px; */
                            color: #002542;
                        }

                        .main-header .full-screen {
                            position: relative;
                            /* left: 0px; */
                            background-image: none;
                            padding: 8px 2px;
                            font-size: 24px;
                            line-height: 10px;
                            margin-right: 7px;
                            color: #002542;
                            cursor: pointer;
                        }

                        .main-header .full-screen i {
                            background-color: transparent;
                            border-radius: 0;
                            font-size: 19px;
                            font-weight: 500;
                        }

                        .navbar-nav > li > a.home-icon i {
                            border-radius: 0;
                            font-weight: 500;
                            color: #fff;
                            background-color: #293949;
                            font-size: 23px;
                        }

                        .main-header .sidebar-toggle span {
                            color: #fff;
                            font-weight: 500;
                            background-color: transparent;
                            /* width: 35px; */
                            /* height: 35px; */
                            width: 35px;
                            height: 35px;
                            vertical-align: middle;
                            line-height: 35px;
                            text-align: center;
                            border-radius: 4px;
                            font-size: 21px;
                        }

                        .nav > li > a {
                            position: relative;
                            display: block;
                            padding: 11px 0px;
                        }

                        .navbar-nav > li > a.home-icon {
                            margin-top: 5px;
                            margin-left: 20px;
                            width: 100px;
                            overflow: hidden;
                            padding: 0 !important;
                            margin-right: 10px;
                        }

                        .icondown {
                            padding: 4px 3px;
                            width: 35px !important;
                            text-align: center;
                            /* color: #002542; */
                            background-color: #54606e03 !important;
                            height: 35px !important;
                            font-size: 16px !important;
                            font-weight: 600;
                            border-radius: 4px;
                            color: #fff;
                            border-radius: 50%;
                        }

                        .navbar-nav > li > a:visited {
                            background-color: #222;
                            background: #222;
                            color: #009688;
                        }

                        .navbar-nav > li > a {
                            /* padding: 4px 9px; */
                            padding: 1px 2px;
                            position: relative;
                            color: #009688;
                            word-spacing: 2px;
                        }

                        @media (min-width: 768px)
                            .navbar-nav > li > a {
                                padding-top: 15px;
                                padding-bottom: 15px;
                            }

                            .navbar-nav > li > a {
                                padding-top: 10px;
                                padding-bottom: 10px;
                                line-height: 20px;
                            }

                            .navbar-brand, .navbar-nav > li > a {
                                text-shadow: 0 1px 0 rgba(255, 255, 255, .25);
                            }

                            a:link, button, button:hover {
                                -webkit-transition: all 0.5s ease;
                                -moz-transition: all 0.5s ease;
                                -o-transition: all 0.5s ease;
                                transition: all 0.5s ease;
                            }

                            .backgroundmenu {
                                background: #556071 !important;
                                color: aliceblue !important;
                                font-size: 15px;
                                padding-top: 4px !important;
                                /* margin-top: -10px;*/
                                border-radius: 5px;
                                margin-left: 20px;
                                height: 35px;
                            }

                            .logoname {
                                font-size: 16px !important;
                                color: aliceblue;
                                margin-top: 8px;
                            }

                            .dropdown-menu > li > a {
                                color: #0f0f0f;
                                font-weight: 600;
                                padding: 10px 21px;
                                font-size: 14px !important;
                            }

                            .dropdown-menu {
                                position: absolute;
                                top: 100%;
                                right: 0;
                                z-index: 1000;
                                display: none;
                                float: right;
                                /*min-width: 160px;*/
                                padding: 11px 3px;
                                margin: 2px 0 0;
                                font-size: 14px !important;
                                text-align: right;
                                list-style: none;
                                background-color: #fff;
                                -webkit-background-clip: padding-box;
                                background-clip: padding-box;
                                border: 1px solid #ccc;
                                border: 1px solid rgba(0, 0, 0, .15);
                                border-radius: 4px;
                                -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
                                box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
                            }

                            .messages-menu > .dropdown-menu > li.header {
                                border-top-left-radius: 4px;
                                border-top-right-radius: 4px;
                                border-bottom-right-radius: 0;
                                border-bottom-left-radius: 0;
                                background-color: #ffffff;
                                padding: 7px 10px;
                                border-bottom: 1px solid #e1e6ef;
                                color: #444444;
                                font-size: 16px;
                                font-weight: 600;
                            }

                            .messages-menu > .dropdown-menu > li .menu > li > a {
                                margin: 0;
                                padding: 10px 10px;
                            }

                            .pull-right {
                                float: right !important;
                            }

                            .messages-menu > .dropdown-menu > li .menu > li > a > div > img {
                                margin: auto auto auto 10px !important;
                                width: 40px;
                                height: 40px;
                                border: 1px solid #908c8c;
                            }

                            .img-circle {
                                border-radius: 50%;
                            }

                            .messages-menu > .dropdown-menu > li .menu > li > a > h4 {
                                padding: 0;
                                margin: 0 45px 0 0px !important;
                                color: #222;
                                font-size: 14px;
                                position: relative;
                                font-weight: 700;
                            }

                            .navbar-nav > .messages-menu > .dropdown-menu > li .menu > li > a > h4 > small {
                                color: #2196F3;
                                font-size: 11px;
                                position: absolute;
                                top: 0;
                                left: 0;
                                right: auto;
                            }

                            .messages-menu > .dropdown-menu > li .menu > li > a > p {
                                margin: 0 0 0 45px;
                                font-size: 12px;
                                color: #888888;
                            }

                            .dropdown-help {
                                text-align: right !important;
                            }
                    </style>

                    <!-- Notifications Dropdown Menu -->

                    <li class="nav-item dropdown user user-menu ">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                            <img src="<?php if (isset($_SESSION['user_login_image']) && $_SESSION['user_login_image'] != null) {
                                echo base_url() . 'uploads/images/' . $_SESSION['user_login_image'];
                            } else {
                                echo base_url() . 'asisst/admin_asset/img/avatar5.png';
                            }
                            ?>"
                                 class="user-image img-circle elevation-2" alt="user">
                            <span class="hidden-xs"
                                  style="color: #fff;"><?php if (isset($_SESSION['user_login_name']) && $_SESSION['user_login_name'] != null) {
                                    echo $_SESSION['user_login_name'];
                                } else {
                                    echo $_SESSION['user_name'];
                                } ?> </span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right "
                            style="left: inherit; right: -125px;">
                            <!-- User image -->
                            <li class="user-header bg-primary">
                                <img src="<?php if (isset($_SESSION['user_login_image']) && $_SESSION['user_login_image'] != null) {
                                    echo base_url() . 'uploads/images/' . $_SESSION['user_login_image'];
                                } else {
                                    echo base_url() . 'asisst/admin_asset/img/avatar5.png';
                                }
                                ?>"
                                     class="img-circle elevation-2" alt="user">
                                <p class="text-center"> <?php if (isset($_SESSION['user_login_name']) && $_SESSION['user_login_name'] != null) {
                                        echo $_SESSION['user_login_name'];
                                    } else {
                                        echo $_SESSION['user_name'];
                                    } ?>  </p>
                                <p class="text-center"> اخر دخول
                                    : <?php echo date("Y-m-d", $_SESSION['last_login']) ?> </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-right">
                                    <a href="#" class="btn btn-default btn-flat">تعديل الملف الشخصى</a>
                                </div>
                                <div class="pull-left">
                                    <a href="<?php echo base_url() ?>Login/logout" class="btn btn-danger btn-flat">تسجيل
                                        الخروج</a>
                                </div>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </nav>
    </header>
    <div id="rocket_x"></div>
    <!--    --><?php //$this->load->view('admin/requires/sidebar'); ?>

    <div class="content-wrapper">
        <div class="modal" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             data-wow-duration="0.5s">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"> تنبيه</h4>
                    </div>
                    <div class="modal-body">
                        <p id="text">هل أنت متأكد من الحذف؟</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">تراجع</button>
                        <a id="adele" href="">
                            <button type="button" name="save" value="save" class="btn btn-danger remove">نعم</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="pop-panel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog  " role="document">
                <div class="modal-content" style="display: inline-block;width: 100%;">
                    <div class="modal-body" style="padding: 2px;">
                        <!-- Content Wrapper. Contains page content -->
                        <section class="categories-icon" style="padding:6px;">
                            <div class="row">
                                <!-- left column -->
                                <div class="col-md-12">
                                    <!-- general form elements -->
                                    <div class="card card-outline">
                                        <div class="card-header">
                                            <div class="col-md-7">
                                                <h3 class="card-title cardd1">التنبيهات الرئيسية</h3>
                                            </div>
                                            <div class="col-md-5">
                                                <form class="position-relative filtter searcchh" method="post">
                                                    <input class="form-control" id="myInput" type="text" name="txt"
                                                           placeholder="بحث">
                                                    <button type="submit"><i class="fa fa-search"
                                                                             aria-hidden="true"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- /.card-header -->
                                        <!-- form start -->
                                        <div class="card-body" id="myTable">
                                            <div class="col-md-12">
                                                <div class="col-md-4 col-sm-6 col-xs-12 paddingg">
                                                    <div class="notifaction1">
                                                        <a class="nav-link icoo" href="#">
                                                            <i class="fa fa-bell iconn bg-danger2"></i>
                                                            <span class="badgee badge-danger small_notf">3</span>
                                                        </a>
                                                    </div>
                                                    <div class="icon-box small-box bg-danger1">
                                                        <div class="iconn">
                                                            <i class="fa fa-tasks bg-danger1" aria-hidden="true"></i>
                                                        </div>
                                                        <a href="#" class="small-box-footer">اسم الادارة الفرعية </a>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-6 col-xs-12 paddingg">
                                                    <div class="notifaction1">
                                                        <a class="nav-link icoo" href="#">
                                                            <i class="fa fa-bell iconn bg-danger2"></i>
                                                            <span class="badgee badge-warning  small_notf">3</span>
                                                        </a>
                                                    </div>
                                                    <div class="icon-box small-box bg-danger2">
                                                        <div class="iconn">
                                                            <i class="fa fa-tasks bg-danger2" aria-hidden="true"></i>
                                                        </div>
                                                        <a href="#" class="small-box-footer">اسم الادارة الفرعية </a>
                                                    </div>
                                                </div>
                                                <div class=" col-md-4 col-sm-6 col-xs-12 paddingg">
                                                    <div class="notifaction1">
                                                        <a class="nav-link icoo" href="#">
                                                            <i class="fa fa-bell iconn bg-danger2"></i>
                                                            <span class="badgee badge-danger small_notf">3</span>
                                                        </a>
                                                    </div>
                                                    <div class="icon-box small-box bg-danger3">
                                                        <div class="iconn">
                                                            <i class="fa fa-envelope-o bg-danger3"
                                                               aria-hidden="true"></i>
                                                        </div>
                                                        <a href="#" class="small-box-footer">اسم الادارة الفرعية </a>
                                                    </div>
                                                </div>
                                                <div class=" col-md-4 col-sm-6 col-xs-12 paddingg">
                                                    <div class="notifaction1">
                                                        <a class="nav-link icoo" href="#">
                                                            <i class="fa fa-bell iconn bg-danger2"></i>
                                                            <span class="badgee badge-warning  small_notf">3</span>
                                                        </a>
                                                    </div>
                                                    <div class="icon-box small-box bg-danger4">
                                                        <div class="iconn">
                                                            <i class="fa fa-bell bg-danger4" aria-hidden="true"></i>
                                                        </div>
                                                        <a href="#" class="small-box-footer">اسم الادارة الفرعية </a>
                                                    </div>
                                                </div>
                                                <div class=" col-md-4 col-sm-6 col-xs-12 paddingg">
                                                    <div class="notifaction1">
                                                        <a class="nav-link icoo" href="#">
                                                            <i class="fa fa-bell iconn bg-danger2"></i>
                                                            <span class="badgee badge-warning  small_notf">3</span>
                                                        </a>
                                                    </div>
                                                    <div class="icon-box small-box bg-danger5">
                                                        <div class="iconn">
                                                            <i class="fa fa-users bg-danger5" aria-hidden="true"></i>
                                                        </div>
                                                        <a href="#" class="small-box-footer">اسم الادارة الفرعية </a>
                                                    </div>
                                                </div>
                                                <div class="  col-md-4 col-sm-6 col-xs-12 paddingg">
                                                    <div class="notifaction1">
                                                        <a class="nav-link icoo" href="#">
                                                            <i class="fa fa-bell iconn bg-danger2"></i>
                                                            <span class="badgee badge-warning  small_notf">3</span>
                                                        </a>
                                                    </div>
                                                    <div class="icon-box small-box bg-danger6">
                                                        <div class="iconn">
                                                            <i class="fa fa-address-book bg-danger6"
                                                               aria-hidden="true"></i>
                                                        </div>
                                                        <a href="#" class="small-box-footer">اسم الادارة الفرعية </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                                <!--/.col (left) -->
                            </div>
                        </section>
                    </div><!-- modal-body -->
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            $(document).ready(function () {
                $("#myInput").on("keyup", function () {
                    var value = $(this).val().toLowerCase();
                    $("#myTable .col-lg-3").filter(function () {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });
        </script>
        <!----------------------------------------------------التنبيهات---------------------------------->
        <style>
            .notifaction1 {
                position: absolute;
                top: 19px;
                right: 9px;
                z-index: 9999;
            }

            .notifaction .icoo i:hover {
                background: #007bff !important;
            }

            .notifaction1 .icoo i:hover {
                background: #007bff !important;
            }

            .notifaction1 .iconn {
                display: inline-block;
                color: #fffdfd;
                font-size: 15px;
                -webkit-transition: all .3s ease-out;
                -moz-transition: all .3s ease-out;
                -o-transition: all .3s ease-out;
                transition: all .3s ease-out;
                border-radius: 50%;
                height: 30px;
                width: 30px;
                text-align: center;
                border: 1px solid white;
                line-height: 30px;
                margin-top: -30px;
                background: #33485d !important;
            }

            .bg-danger2 {
                background-color: #33485d !important;
            }

            .bg-danger1 {
                background-color: #8f44ab !important;
            }

            .categories-icon .icon-box {
                text-align: center;
                padding: 0px;
                /* margin-bottom: 30px; */
                background: #fff;
                border-radius: 4px;
                -webkit-transition: all .3s ease-out;
                -moz-transition: all .3s ease-out;
                -o-transition: all .3s ease-out;
                transition: all .3s ease-out;
                box-shadow: 0 2px 15px -5px #dadada;
                margin-top: 30px;
            }

            .categories-icon .icon-box .iconn {
                margin-bottom: 4px;
                transform: translate(-32%, -22%);
            }

            .categories-icon .icon-box .iconn i {
                display: inline-block;
                color: #fffdfd;
                font-size: 24px;
                -webkit-transition: all .3s ease-out;
                -moz-transition: all .3s ease-out;
                -o-transition: all .3s ease-out;
                transition: all .3s ease-out;
                border-radius: 50%;
                height: 50px;
                width: 50px;
                text-align: center;
                border: 1px solid white;
                line-height: 50px;
                margin-top: -30px;
            }

            .small-box > .small-box-footer {
                background: rgba(0, 0, 0, .1);
                color: rgba(255, 255, 255, .8);
                display: block;
                padding: 5px 0;
                position: relative;
                text-align: center;
                text-decoration: none;
                z-index: 10;
                font-size: 15px;
            }

            .bg-danger2 {
                background-color: #33485d !important;
            }

            .bg-danger3 {
                background-color: #2a80b9 !important;
            }

            .bg-danger4 {
                background-color: #149e84 !important;
            }

            .bg-danger5 {
                background-color: #f09b1a !important;
            }

            .bg-danger6 {
                background-color: #e74b3c !important;
            }

            .small_notf {
                font-size: .6rem;
                font-weight: 300;
                padding: 3px 5px;
                position: absolute;
                right: 0px;
                top: -9px;
            }

            .searcchh input[type=text] {
                width: 100%;
                box-sizing: border-box;
                font-size: 16px;
                background-position: 10px 10px;
                background-repeat: no-repeat;
                /* padding: 12px 20px 12px 40px; */
                -webkit-transition: width 0.4s ease-in-out;
                transition: width 0.4s ease-in-out;
                height: calc(2.3rem + 2px);
                padding: 0.375rem 0.75rem;
                line-height: 1.5;
                color: #495057;
                background-color: #007bff0f;
                background-clip: padding-box;
                border: 1px solid #434546;
                border-radius: 1.25rem;
                transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            }

            .position-relative {
                position: relative !important;
            }

            .filtter button {
                border: 0;
                background: none;
                position: absolute;
                top: 5px;
                left: 5px;
                cursor: pointer;
                font-size: 18px;
                color: black !important;
            }

            .badgee {
                display: inline-block;
                padding: .25em .4em;
                font-size: 80%;
                font-weight: 700;
                line-height: 1;
                text-align: center;
                white-space: nowrap;
                vertical-align: baseline;
                border-radius: .25rem;
                transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
            }

            .card-outline {
                border-top: 3px solid #007bff;
            }

            .cardd1 {
                margin-top: 8px;
                color: black;
            }
        </style>
  