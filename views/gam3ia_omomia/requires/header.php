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
    <script src="<?= base_url() . 'asisst/gam3ia_omomia_asset/' ?>sweet_alert/sweetalert.js"></script>
    <link rel="stylesheet" href="<?= base_url() . 'asisst/gam3ia_omomia_asset/' ?>sweet_alert/sweetalert.css">
    <!-------------------->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() . "asisst/fav/" ?>favicon-16x16.png">
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/css/bootstrap-arabic-theme.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/css/bootstrap-arabic.min.css"/>

    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/css/bootstrap-rtl.css"/>
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/css/bootstrap-select.min.css">
    <link href="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/plugins/bootstrap-toggle/bootstrap-toggle.min.css"
          rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/css/font-awesome.min.css">
    
    
    <!--
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/css/font-awesome-animation.min.css">
-->
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/css/pe-icon-7-stroke.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/css/lobipanel.min.css">
    <!---------------------------------------------------------->
    <link href="<?= base_url() . 'asisst/gam3ia_omomia_asset/' ?>plugins/icheck/skins/all.css" rel="stylesheet"
          type="text/css"/>
    <!----------------------------------------------------------->
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/plugins/fileinput/css/fileinput.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/css/datepicker.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/css/tables/jquery.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/css/tables/buttons.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/css/tables/responsive.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/css/tables/table.css">
    <link href="<?php echo base_url(); ?>asisst/gam3ia_omomia_asset/datepicker/css/bootstrap-datetimepicker.min.css" media="all"
          rel="stylesheet"/>

    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/css/calendar.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/css/modal.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/css/animate.css">

    <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
    <link rel="stylesheet"
          href="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/css/stylecrm.css?<?php echo date('l jS \of F Y h:i:s A'); ?>">
    
    <link rel="stylesheet"
          href="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/css/style.css?<?php echo date('l jS \of F Y h:i:s A'); ?>">
          <link rel="stylesheet"
          href="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/css/profile.css?<?php echo date('l jS \of F Y h:i:s A'); ?>">
    <link href="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/css/mdtimepicker.css" rel="stylesheet" type="text/css">
    <style>
        .name_of_charity {
            color: #0060b3;
            font-size: 16px;
            text-align: center;
            padding: 0px 0px;
            margin-top: 0px;
            border-radius: 5px
        }
        .name_of_charity img {
            float: right;
            height: 75px;
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
            margin-top: 16px;
            margin-left: 20px;
            width: 100px;
            overflow: hidden;
            padding: 0 !important;
            margin-right: 10px;
        }
        .navbar-nav > li > a.home-icon span {
            color: #fff;
            margin-right: -64px;
            transition: all 0.3s ease;
            -webkit-transition: all 0.3s ease;
            -moz-transition: all 0.3s ease;
        }
        .navbar-nav > li > a.home-icon i {
            border-radius: 0;
            font-weight: 500;
            color: #fff;
            background-color: #2d2b2b;
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
            background-image: none;
            padding: 17px 2px;
            font-size: 26px;
            line-height: 10px;
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
            color: #fff;
            font-size: 20px;
            font-family: Orbitron;
            font-weight: bold;
            padding: 5px;
            margin: 12px 20px 0 0;
            border-radius: 5px;
            border: 1px solid;
        }
        #MyClockDisplay {
            letter-spacing: 7px;
            margin-left: 14px;
            float: right;
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
        <nav class="navbar navbar-static-top" style="background-color:#2d2b2b !important ;">
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav col-sm-8 ">
                    <li><a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                            <!--<span class="sr-only">Toggle navigation</span>-->
                            <span class="fa fa-bars"></span>
                        </a></li>
                    <!--<li><a onclick="requestFullScreen()" class="full-screen"><i class="fa fa-arrows-alt"
                                                                                aria-hidden="true"></i></a></li>
                                                                                -->
                    <li><a href="<?php echo base_url() ?>gam3ia_omomia/Dash" class="home-icon">
                            <i class="fa fa-home" style=""></i>
                            <span>الرئيسية</span></a>
                    </li>
                   
                    
                    
                    <li class="name_of_charity">
                        <img src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/img/sympol2.png" alt="">
                    </li>
                    <li class="name_of_vision hidden-xs hidden-sm">
                        <img src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/img/Saudi_Vision_2030_logo.png" alt="">
                    </li>
                   <li>
                        <div class="clock">
                          
                            <span style="font-size: 16px !important;
    font-family: cursive !important;" id="session-name">
                            <i style="color: orange;" class="fa fa-spinner fa-spin"></i>
                            <i  style="color: orange;" class="fa fa-clock-o" aria-hidden="true"></i>

                                <?php 
                              //  echo  time_elapsed_string('2020-05-17 00:21:35');
                                echo 'الإجتماع إنتهي';
/*
 $rem = strtotime('2020-07-15 19:00:00') - time();

$day = floor($rem / 86400);
$hr  = floor(($rem % 86400) / 3600);
$min = floor(($rem % 3600) / 60);
$sec = ($rem % 60);
echo " متبقي علي الإجتماع ";
if($day) echo ($day) .' أيام ';
if($hr) echo "$hr ساعات ";
if($min) echo "$min دقائق ";
if($sec) echo "$sec ثانية ";
*/
 ?>
                         
                            </span>
                        </div>
                    </li>
                </ul>
                <style>
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
                        margin-left: 168px;
                        touch-action: manipulation;
                        -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
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
                    .openNotify {
                        transform: translateX(0) !important;
                    }
                    
  
                    #nav-content {
                        margin-top: 55px;
                        padding: 10px;
                        width: 360px;
                        max-width: 360px;
                        min-height: 100%;
                        position: absolute;
                        top: 0;
                        left: 0;
                        background-color: rgba(19, 19, 19, 0.8);
                        pointer-events: auto;
                        -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
                        transform: translateX(-100%);
                        transition: transform .3s;position: fixed;
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
                    .charity-sidebar {
    min-height: 900px;
    background: transparent;
}
.button-notify i {
    color: #fff;
    font-size: 41px;
}
.btnlog {
    background: #e00d0d;
    color: #fbfbfb !important;
    border: 0;
    border-radius: 34px;
    width: 52%;
    height: 42px;
    font-size: 21px;
    margin-top: 14px;
    outline: none;
    box-shadow: 2px 2px 1px;
    margin-right: 50px;
}
                    
                    
 

.btn1 {
    
    padding: 10px 12px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: 400;
    
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;
}
.career{
    color: white !important;
}                  
  .name{
    color: orange !important;
}                  
  
  
                    
                    
                    
                    
                    
                </style>
                <ul class="nav navbar-nav navbar-right col-sm-4"
                
                 style="     margin-top: 16px;">
                    <li class=" " >
                        <div id="nav-container">
                            <div class="bg"></div>
                            <div class="button-notify" tabindex="0">
                                <!-- <i class="fa fa-users"></i> -->
                                <!-- <i class="fa fa-user-circle "></i> -->
                                <a href="#" class="dropdown-toggle pull-left" data-toggle="dropdown">
                        <img src="<?php if(isset($_SESSION['mem_img'])&&!empty($_SESSION['mem_img']))
                                    {
                                        echo base_url().'uploads/md/gam3ia_omomia_members/'.$_SESSION['mem_img']; 
                                        
                                    }else{
                                        echo base_url() . 'asisst/gam3ia_omomia_asset/img/avatar5.png';
                                    }?>"
                                 class="img-circle" width="45" height="45" alt="user">
                        </a>
                            </div>
                            <div id="nav-content" tabindex="0">
                                <ul>
                                <div class="charity-sidebar">
                                <?php 
  $person_data = $this->Gam3ia_omomia_model->get_by_member_id($_SESSION['id'], 'id', 'md_all_gam3ia_omomia_members');
  $odwia_data = $this->Gam3ia_omomia_model->get_by_member_id($_SESSION['id'], 'member_id_fk', 'md_all_gam3ia_omomia_odwiat');
                                ?>
    <div class="charity-sidebar-photo">
    
        <?php if (isset($person_data->mem_img) && !empty($person_data->mem_img)) { ?>
            <img src="<?php echo base_url() ?>uploads/md/gam3ia_omomia_members/<?php echo $person_data->mem_img; ?> ">

        <?php } else { ?>

            <img src="<?php echo base_url() ?>asisst/admin_asset/img/avatar5.png ">
        <?php } ?>
        
        
        
        
        
        
        

        
        
        
        <!-- yara -->
       <?php // echo '<pre>'; print_r($odwia_data);?>
        <h5 class="name"><?php if (isset($person_data->name) && !empty($person_data->name)) {
                echo $person_data->laqb_title ."/". $person_data->name;
            } ?>    </h5>
             <h5 class="career">
             <i style="color: orange;" class="fa fa-id-card-o" aria-hidden="true"></i>
             <?php if (isset($person_data->card_num) && !empty($person_data->card_num)) {
                echo $person_data->card_num;
            } ?>    </h5>
        <h5 class="career"><?php if (isset($odwia_data->no3_odwia_title) && !empty($odwia_data->no3_odwia_title)) {
                echo $odwia_data->no3_odwia_title;
            }
            echo ' - ';
             if (isset($odwia_data->rkm_odwia_full) && !empty($odwia_data->rkm_odwia_full)) {
                 echo  $odwia_data->rkm_odwia_full;
            } ?> 
            
                </h5>
         
              
             <?php if (isset($person_data->jwal) && !empty($person_data->jwal)) { ?>
                <h5 class="career"><i  style="color: orange;" class="fa fa-phone"></i> <?php echo $person_data->jwal; ?>  </h5>
                <?php } ?>
           
             <?php /*if (isset($person_data->enwan_watni) && !empty($person_data->enwan_watni)) { ?>
                    <h5 class="career"><i class="fa fa-map-marker"></i> <?php echo $person_data->enwan_watni; ?> </h5>
                <?php }*/ ?>


                <?php if (isset($person_data->email) && !empty($person_data->email)) { ?>
                    <h5 class="career"><i class="fa fa-envelope"></i> <?php echo $person_data->email; ?>  </h5>
                <?php } ?>

               
                            
              <a style="background-color: red !important; color: white;" class="btn1 btn-danger " href="<?php echo base_url() ?>gam3ia_omomia/Login_gam3ia_omomia/logout"
                                   style="color: #fff;">
                                   
                                    <span class=""><i class="fa fa-sign-out"></i></span> تسجيل الخروج</a>


                         
                           
                        
    </div>

    
</div>
                               
                                </ul>
                            </div>
                        </div>
                    </li>

                    <?php
                    $out_title = "  نظام الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء";
                    $out_link = "gam3ia_omomia/Dash/home";
                    $out_font_awesome = 'fa fa-home';
                    if (isset($this->groups_title) && !empty($this->groups_title)) {
                        $out_title = $this->groups_title['title'];
                        $out_link = $this->groups_title['link'];
                    } elseif (isset($title_name) && !empty($title_name)) {
                        $out_title = $title_name['title'];
                        $out_link = $title_name['link'];
                    } ?>
                    <?php ?>
                    <!----------------------------------------------------------------------------->
                   <!-- <li class="dropdown dropdown-help prays hidden-xs">
                        <span style="color: white !important; text-align: center !important;"> مرحبا بك </span>
                        <br/>
                        <span style="color: #d92222 !important;"> <?=$_SESSION['name']  ?></span>
                    </li>
                    <li class="dropdown dropdown-help pray hidden-xs">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-clock-o"></i>
                            مواقيت الصلاة</a>
                        <ul class="dropdown-menu" style="width:300px">
                            <li>
                                <iframe src="https://timesprayer.com/widgets.php?frame=1&amp;lang=ar&amp;name=buraydah&amp;sound=true&amp;avachang=true"
                                        style="border: none; overflow: hidden; width: 100%; height: 200px;"></iframe>
                            </li>
                        </ul>
                    </li>
                    -->
                </ul>
            </div>
        </nav>
    </header>
    <?php $this->load->view('gam3ia_omomia/requires/sidebar'); ?>
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
