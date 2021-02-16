<link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css1/bootstrap-rtl.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css1/AdminLTE.min.css">
<style>
    .row {
        margin-right: 0px;
        margin-left: 0px;
    }
    .all_cont {
        padding: 7px 0px;
    }
    .topnav {
        overflow: hidden;
        background-color: #333;
    }
    .topnav a {
        float: right;
        color: #f2f2f2;
        text-align: center;
        padding: 6px 14px;
        text-decoration: none;
        font-size: 15px;
    }
    .topnav a:hover {
        background-color: #0a0a0adb;
        color: #ece5e5;
    }
    .topnav a.active {
        background-color: #000000;
        color: white;
    }
    .table1 {
        width: 100%;
        max-width: 100%;
        margin-bottom: 20px;
    }
    .table1 tr, .table1 td {
        border: 1px solid #ddd;
        padding: 8px;
        color: black;
    }
    .table2 {
        width: 100%;
        max-width: 100%;
        margin-bottom: 20px;
    }
    .table2 th {
        padding-top: 5px;
        padding-bottom: 5px;
        text-align: center;
        background-color: #50ab20;
        color: white;
        font-weight: 800;
        font-size: 18px;
    }
    .table2 th {
        border: 1px solid #ddd;
    }
    .table2 td {
        border: 1px solid #ddd;
        padding: 8px;
        color: black;
        text-align: center;
    }
    .total {
        margin-top: -25px;
        border: 1px solid #ddd;
    }
    .panel .panel-heading h1, .panel .panel-heading h2, .panel .panel-heading h3, .panel .panel-heading h4, .panel .panel-heading h5, .panel .panel-heading h6 {
        color: #222;
        font-size: 16px;
        font-weight: 600;
    }
    .bg-aqua, .callout.callout-info, .alert-info, .label-info, .modal-info .modal-body {
        background-color: #00c0ef !important;
    }
    .small-box {
        border-radius: 2px;
        position: relative;
        display: block;
        margin-bottom: 20px;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
    }
    .small-box > .inner {
        padding: 10px;
    }
    .small-box h3 {
        font-size: 20px;
        font-weight: bold;
        margin: 4px 0px 12px 0;
        white-space: nowrap;
        padding: 0;
        color: aliceblue;
        text-align: right;
    }
    .small-box p {
        font-size: 17px;
        color: aliceblue;
        text-align: right;
    }
    .small-box > .inner {
        padding: 10px;
    }
    .small-box .icon {
        -webkit-transition: all .3s linear;
        -o-transition: all .3s linear;
        transition: all .3s linear;
        position: absolute;
        top: 6px;
        left: 10px;
        z-index: 0;
        font-size: 50px;
        color: rgba(255, 252, 252, 0.78);
    }
    .small-box > .small-box-footer {
        position: relative;
        text-align: center;
        padding: 3px 0;
        color: #fff;
        color: rgba(255, 255, 255, 0.8);
        display: block;
        z-index: 10;
        background: rgba(0, 0, 0, 0.1);
        text-decoration: none;
    }
    .small-box > .small-box-footer:hover {
        color: #fff;
        background: rgba(0, 0, 0, 0.15);
    }
    .small-box > .small-box-footer {
        position: relative;
        text-align: center;
        padding: 3px 0;
        color: #fff;
        color: rgba(255, 255, 255, 0.8);
        display: block;
        z-index: 10;
        background: rgba(0, 0, 0, 0.1);
        text-decoration: none;
    }
    a:hover, a:active, a:focus {
        outline: none;
        text-decoration: none;
        color: #72afd2;
    }
    .small-box:hover .icon {
        font-size: 57px;
    }
    .media {
        padding: 7px 0;
    }
    .media .panel {
        border: none;
        border-radius: 5px;
        box-shadow: none;
        margin-bottom: 1px;
    }
    .media .panel-heading {
        padding: 0;
        border: none;
        border-radius: 5px 5px 0 0;
    }
    .media .panel-title a {
        display: -webkit-box;
        padding: 15px 10px;
        background: #fff;
        font-size: 17px;
        font-weight: normal;
        color: #000000;
        letter-spacing: 0px;
        border: 1px solid #2b5c25;
        border-radius: 5px 5px 0 0;
        position: relative;
        font-weight: 600;
    }
    .media .panel-title a i {
        font-size: 22px;
        color: #f28d1e;
        margin-left: 5px
    }
    .media .panel-title a.collapsed {
        border-color: #2b5c2569;
        border-radius: 5px;
    }
    .media .panel-title a:before,
    .media .panel-title a.collapsed:before,
    .media .panel-title a:after,
    .media .panel-title a.collapsed:after {
        font-family: 'FontAwesome';
        content: "\f106";
        width: 30px;
        height: 30px;
        line-height: 30px;
        border-radius: 5px;
        background: #81BC48;
        font-size: 20px;
        color: #fff;
        text-align: center;
        position: absolute;
        left: 15px;
        opacity: 1;
        transform: scale(1);
        transition: all 0.3s ease 0s;
    }
    .media .panel-title a:after,
    .media .panel-title a.collapsed:after {
        font-family: 'FontAwesome';
        content: "\f107";
        background: transparent;
        color: #000;
        opacity: 0;
        transform: scale(0);
        margin-top: -25px;
    }
    .media .panel-title a.collapsed:before {
        opacity: 0;
        transform: scale(0);
    }
    .media .panel-title a.collapsed:after {
        opacity: 1;
        transform: scale(1);
    }
    .media .panel-body {
        /* padding: 10px 10px; */
        background: #e8e8e8;
        border-top: none;
        font-size: 15px;
        line-height: 28px;
        border-radius: 0 0 5px 5px;
    }
    .btn-label1 {
        position: relative;
        right: -14px;
        display: inline-block;
        padding: 9px 17px;
        background: rgb(239, 168, 34);
        border-radius: 2px 0 0 2px;
        color: #f3f3f3;
        font-size: 17px;
    }
    .btn-labeled {
        padding-top: 0;
        padding-bottom: 0;
        margin: 7px 9px;
    }
    .user-profile .sidebar-shortcuts-large > .btn {
        text-align: center;
        width: auto;
        line-height: 30px;
        padding: 3px 10px;
        border-radius: 10px;
    }
    .syst {
        text-align: center;
        padding: 20px 15px;
        background: #fff;
        -webkit-transition: all 0.3s ease 0s;
        transition: all 0.3s ease 0s;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
        margin-bottom: 15px;
        text-align: center;
        border: 1px solid #99999969;
        background-color: #fff;
        border-radius: 13px;
        box-shadow: 0px 2px 6px #736d6d;
    }
    .syst p {
        text-align: center;
        font-size: 18px;
    }
    .syst .download {
        text-align: center;
        padding: 8px 13px;
        background: #f28d1e;
        color: #fff;
        -webkit-transition: all 0.3s ease 0s;
        transition: all 0.3s ease 0s;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        border-radius: 6px;
    }
    .profile-activity a.user {
        font-weight: 700;
        color: #09704e;
        font-size: 16px;
        margin: 15px;
    }
    .profile-activity img {
        border: 2px solid #C9D6E5;
        border-radius: 100%;
        /* max-width: 40px; */
        margin-left: 10px;
        margin-right: 0;
        box-shadow: none;
        margin-bottom: 10px;
        margin-top: 10px;
    }
    .profile-feed {
        height: 250px;
        overflow-y: scroll;
    }
    .modal-footer .btn + .btn {
        margin-right: 5px;
        margin-bottom: 5px;
    }
    .attendance {
        border: 1px solid #dad6d6;
        border-radius: 6px;
        padding: 5px 6px;
        margin: 0px 5px;
        background: #03a9f4c7;
        color: white;
    }
    .container-fluid {
        padding-right: 0px;
        padding-left: 0px;
        margin-right: auto;
        margin-left: auto;
    }
</style>
<style>
    .btn-link {
        font-weight: 600;
        color: #212223;
        cursor: pointer;
        border-radius: 0;
    }
    i.orange {
        color: #FF9800;
    }
    .btn-link:hover, .btn-link:focus {
        color: #FF9800;
        text-decoration: underline;
        background-color: transparent;
    }
    div.bhoechie-tab-content {
        background-color: #ffffff;
        /* border: 1px solid #eeeeee; */
        padding-left: 20px;
        padding-top: 10px;
    }
    div.bhoechie-tab div.bhoechie-tab-content:not(.active) {
        display: none;
    }
    .all_cont {
        padding: 0 !important;
    }
    .panel-default > .panel-heading {
        color: #424141;
        background-color: #f5f5f5;
        border-color: #ddd;
        /* text-align: right; */
    }
    .btn-default {
        color: #0c0c0c;
        background-color: #fff;
        border-color: #ccc;
        margin: 5px 10px;
    }
    .btn-label {
        position: relative;
        right: -14px;
        display: inline-block;
        padding: 6px 12px;
        background: rgb(239, 168, 34);
        border-radius: 2px 0 0 2px;
        color: #f3f3f3;
    }
    }
    .icons {
        padding: 10px;
    }
    .test {
        float: left;
        width: 35px;
        text-align: center;
        /* color: #002542; */
        height: 35px;
        font-size: 22px;
        font-weight: 600;
        border-radius: 4px;
        color: #1c1d1d;
        border-radius: 50%;
        background: #ffffff;
        float: left;
        padding-right: 3px;
        margin-top: 4px;
        /* padding-top: 5px;*/
    }
    /* Head banner team */
    .banner {
        text-align: center;
        width: ;
    }
    h1 {
        color: green;
    }
    .sidehoverbar a {
        background-color: #f1a922;
        position: absolute;
        font-size: 24px;
        text-decoration: none;
        Color: #fdfdfd;
        /* padding: 9px; */
        border-radius: 0px 25px 25px 0px;
        left: -191px;
        transition: 0.5s;
        /* opacity: 0.5; */
        border-left: 7px solid #FFC107;
        line-height: 40px;
    }
    .sidehoverbar a:hover {
        left: 0px;
        /* opacity: 1; */
        background-color: #4f564f;
    }
    .sidehoverbar i {
        float: right;
        margin-top: 7px;
        margin-right: 7px;
    }
    /* definig position of each nav bar */
    .article {
        top: 13px;
        width: 229px;
        height: 43px;
    }
    .Interview {
        top: 70px;
        width: 229px;
        height: 43px;
    }
    .Scripter {
        top: 128px;
        width: 229px;
        height: 43px;
    }
    /* content margin */
    .hoverable-topic {
        margin-left: 55px;
    }
    td {
        font-size: large
    }
</style>
<style>
    .count {
        line-height: 3px;
        padding: 10px 5px;
        border-radius: 50em;
        height: 25px;
        width: 25px;
        border: 1px solid #fff;
        float: right;
    }
</style>
<?php $this->load->view('admin/maham_mowazf_view/basic_data/nav_links') ?>
<!--<div class="topnav">
    <a href="<?/*= base_url() */?>/maham_mowazf/basic_data/Maham/hr_data"><h5 class="glyphicon glyphicon-home"></h5>الرئيسية</a>
    <a href="<?/*= base_url() */?>/Dashboard/phome"><h5 class="glyphicon glyphicon-user"></h5> الملف الشخصى</a>
    <a href="<?/*= base_url() */?>/maham_mowazf/person_profile/Personal_profile/talabat"><h5 class="glyphicon glyphicon-list-alt"></h5> الطلبات</a>
    <a href="<?/*= base_url() */?>/maham_mowazf/person_profile/Personal_profile/estalmat" class="active"><h5 class="glyphicon glyphicon-comment"></h5> الإستعلامات</a>
    <a href="#"><h5 class="glyphicon glyphicon-time"></h5> ادارة الوقت</a>
    <a href="#"><h5 class="glyphicon glyphicon-tasks"></h5> المهام</a>
    <a href="#"><h5 class="glyphicon glyphicon-send"></h5> التراسل </a>
    <a href="#"><h5 class="glyphicon"><i class="fa fa-money" aria-hidden="true"></i></h5> الرواتب </a>
    <a href="#"><h5 class="glyphicon"><i class="fa fa-area-chart" aria-hidden="true"></i></h5> التقييمات</a>
</div>-->
<div class="col-xs-12 all_cont">
    <div class="col-lg-12 col-md-5 col-sm-8 col-xs-9 bhoechie-tab-container">
        <div class="col-lg-12 col-md-12   bhoechie-tab">
            <!---------------------------------------الطلبات----------------------------------------->
            <div id="media" class="media">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <!--------------------------------------------- الأجازات   -------------------------------------------->
                                <div class=" col-md-3   col-xs-12 panel panel-default">
                                    <div class="panel-heading" role="tab" id="heading1">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse"
                                               data-parent="#accordion" href="#collapse1" aria-expanded="false"
                                               aria-controls="collapse1">
                                                <i class="fa fa-list" aria-hidden="true"></i> الأجازات
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse1" class="panel-collapse collapse " role="tabpanel"
                                         aria-labelledby="heading1">
                                        <!---------------------------------------الطلبات----------------------------------------->
                                        <center>
                                            <div class="col-xs-12">
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <div class="tab-pane" id="pag4" role="tabpanel">
                                                            <div class="padding-10">
                                                                <div class="panel panel-default">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            style="text-align: center;">
                                                                            الأجازات
                                                                        </h5>
                                                                    </div>
                                                                    <div class="modal-body"
                                                                         style=" height:200px;overflow: hidden;">
                                                                        <!-- Side navigation Bar -->
                                                                        <div class="sidehoverbar">
                                                                            <a href="#" data-toggle="modal"
                                                                               onclick="get_agaza_tab('mine_1','طلباتي')"
                                                                               data-target="#ezn_Modal" class="article">
                                                                                <span class="test"><?php if (!empty($user_orders)) {
                                                                                        echo count($user_orders);
                                                                                    } else {
                                                                                        echo 0;
                                                                                    } ?> </span>
                                                                                <span style="font-size: 18px;"> طلباتى</span>
                                                                                <i class="fa fa-edit icons"></i>
                                                                            </a> <span id="test"
                                                                                       class=" label-danger count">
                                                                                <?php if (!empty($user_orders)) {
                                                                                    echo count($user_orders);
                                                                                } else {
                                                                                    echo 0;
                                                                                } ?>
                                                                            </span>  <h5>طلباتى</h5>
                                                                            <a href="#" data-toggle="modal"
                                                                               onclick="get_agaza_tab('follow_1','متابعة طلباتي')"
                                                                               data-target="#ezn_Modal"
                                                                               class="Interview">
                                                                                <span class="test"><?php if (!empty($user_orders)) {
                                                                                        echo count($user_orders);
                                                                                    } else {
                                                                                        echo 0;
                                                                                    } ?> </span>
                                                                                <span style="font-size: 18px;"> متابعة طلباتي</span>
                                                                                <i class="fa fa-file-o icons"></i>
                                                                            </a><span id="test"
                                                                                      class=" label-danger count"
                                                                                      style="margin-top: 28px;">
                                                                                <?php if (!empty($user_orders)) {
                                                                                    echo count($user_orders);
                                                                                } else {
                                                                                    echo 0;
                                                                                } ?>
                                                                            </span><h5 style="margin-top: 37px;">متابعة
                                                                                طلباتي</h5>
                                                                            <a href="#" data-toggle="modal"
                                                                               onclick="get_agaza_tab('comming_1','الوارد')"
                                                                               data-target="#ezn_Modal"
                                                                               class="Scripter">
                                                                                <span class="test"><?php if (!empty($coming_records)) {
                                                                                        echo count($coming_records);
                                                                                    } else {
                                                                                        echo 0;
                                                                                    } ?> </span>
                                                                                <span style="font-size: 18px;"> الوارد</span>
                                                                                <i class="fa fa-commenting icons"></i>
                                                                            </a><span id="test"
                                                                                      class=" label-danger count"
                                                                                      style="margin-top: 32px;">
                                                                                <?php if (!empty($coming_records)) {
                                                                                    echo count($coming_records);
                                                                                } else {
                                                                                    echo 0;
                                                                                } ?> </span><h5
                                                                                    style="margin-top: 39px;">
                                                                                الوارد</h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </center>
                                    </div>
                                </div>
                                <!---------------------------------------------    الأذونات-------------------------------------------->
                                <div class=" col-md-3   col-xs-12 panel panel-default">
 <div class="panel-heading" role="tab" id="heading2">
        <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse"
               data-parent="#accordion" href="#collapse2" aria-expanded="false"
               aria-controls="collapse2">
                <i class="fa fa-list" aria-hidden="true"></i> الأذونات
            </a>
        </h4>
    </div>
                                    <div id="collapse2" class="panel-collapse collapse " role="tabpanel"
                                         aria-labelledby="heading2">
                                        <!---------------------------------------الطلبات----------------------------------------->


        <center>
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="tab-pane" id="pag4" role="tabpanel">
                            <div class="padding-10">
                                <div class="panel panel-default">
                                    <div class="modal-header">
                                        <h5 class="modal-title"
                                            style="text-align: center;">
                                            الأذونات
                                        </h5>
                                    </div>
                                    <div class="modal-body"
                                         style=" height:200px;overflow: hidden;">
                                        <!-- Side navigation Bar -->
                                        <div class="sidehoverbar">
                                            <a href="#" data-toggle="modal"
                                               onclick="get_ezen_tab(1,'طلباتي')"
                                               data-target="#ezn_Modal" class="article">
                                                                                <span class="test"><?php if (!empty($ozonat_records)) {
                                                                                        echo count($ozonat_records);
                                                                                    } else {
                                                                                        echo 0;
                                                                                    } ?> </span>
                                                <span style="font-size: 18px;"> طلباتى</span>
                                                <i class="fa fa-edit icons"></i>
                                            </a> <span id="test"
                                                       class=" label-danger count">
                                                                                <?php if (!empty($ozonat_records)) {
                                                                                    echo count($ozonat_records);
                                                                                } else {
                                                                                    echo 0;
                                                                                } ?>
                                                                            </span><h5>طلباتى</h5>
                                            <a href="#" data-toggle="modal"
                                               onclick="get_ezen_tab(2,'متابعة طلباتي')"
                                               data-target="#ezn_Modal"
                                               class="Interview">
                                                                                <span class="test"><?php if (!empty($ozonat_records)) {
                                                                                        echo count($ozonat_records);
                                                                                    } else {
                                                                                        echo 0;
                                                                                    } ?> </span>
                                                <span style="font-size: 18px;"> متابعة طلباتي</span>
                                                <i class="fa fa-file-o icons"></i>
                                            </a><span id="test"
                                                      class=" label-danger count"
                                                      style="margin-top: 28px;">
                                                                                <?php if (!empty($ozonat_records)) {
                                                                                    echo count($ozonat_records);
                                                                                } else {
                                                                                    echo 0;
                                                                                } ?>
                                                                            </span><h5 style="margin-top: 37px;">متابعة
                                                طلباتي</h5>
                                            <a href="#" data-toggle="modal"
                                               onclick="get_ezen_tab(3,'الوارد')"
                                               data-target="#ezn_Modal"
                                               class="Scripter">
                                                                                <span class="test"><?php if (!empty($ozonat_coming)) {
                                                                                        echo count($ozonat_coming);
                                                                                    } else {
                                                                                        echo 0;
                                                                                    } ?> </span>
                                                <span style="font-size: 18px;"> الوارد</span>
                                                <i class="fa fa-commenting icons"></i>
                                            </a><span id="test"
                                                      class=" label-danger count"
                                                      style="margin-top: 32px;">
                                                                                <?php if (!empty($ozonat_coming)) {
                                                                                    echo count($ozonat_coming);
                                                                                } else {
                                                                                    echo 0;
                                                                                } ?> </span><h5
                                                style="margin-top: 39px;">
                                                الوارد</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </center>
<!--<center>
<div class="col-xs-12">
<div class="panel panel-default">
<div class="panel-body">
<div class="tab-pane" id="pag4" role="tabpanel">
<div class="padding-10">
<div class="panel panel-default">
<div class="modal-header">
<h5 class="modal-title"
style="text-align: center;">
الأذونات
</h5>
</div>
<div class="modal-body"
style=" height:200px;overflow: hidden;">
<div class="sidehoverbar">
<a href="#" data-toggle="modal"
onclick="get_ezen_tab(1,'طلباتي')"
data-target="#ezn_Modal" class="article">
<span class="test"><?php if (!empty($ozonat_records)) {
echo count($ozonat_records);
} else {
echo 0;
} ?> </span>
<span style="font-size: 18px;"> طلباتى</span>
<i class="fa fa-edit icons"></i>
</a> <span id="test"
class=" label-danger count">
<?php if (!empty($ozonat_records)) {
echo count($ozonat_records);
} else {
echo 0;
} ?>
</span><h5>طلباتى</h5>
<a href="#" data-toggle="modal"
onclick="get_ezen_tab(1,'طلباتي')"
data-target="#ezn_Modal"
class="Interview">
<span class="test"><?php if (!empty($ozonat_records)) {
echo count($ozonat_records);
} else {
echo 0;
} ?> </span>
<span style="font-size: 18px;"> متابعة طلباتي</span>
<i class="fa fa-file-o icons"></i>
</a><span id="test"
class=" label-danger count"
style="margin-top: 28px;">
<?php if (!empty($ozonat_records)) {
echo count($ozonat_records);
} else {
echo 0;
} ?>
</span><h5 style="margin-top: 37px;">متابعة
طلباتي</h5>
<a href="#" data-toggle="modal"
onclick="get_ezen_tab(1,'طلباتي')"
data-target="#ezn_Modal"
class="Scripter">
<span class="test"><?php if (!empty($coming_records)) {
echo count($coming_records);
} else {
echo 0;
} ?> </span>
<span style="font-size: 18px;"> الوارد</span>
<i class="fa fa-commenting icons"></i>
</a><span id="test"
class=" label-danger count"
style="margin-top: 32px;">
<?php if (!empty($coming_records)) {
echo count($coming_records);
} else {
echo 0;
} ?> </span><h5
style="margin-top: 39px;">
الوارد</h5>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</center>
-->

</div>
</div>
                                <!---------------------------------------------    السلف-------------------------------------------->
                                <div class=" col-md-3   col-xs-12 panel panel-default">
                                  <div class="panel-heading" role="tab" id="heading3">
        <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse"
               data-parent="#accordion" href="#collapse3" aria-expanded="false"
               aria-controls="collapsefive">
                <i class="fa fa-list" aria-hidden="true"></i> السلف
            </a>
        </h4>
    </div>
    <div id="collapse3" class="panel-collapse collapse " role="tabpanel"
         aria-labelledby="heading3">
        <!---------------------------------------الطلبات----------------------------------------->
        <center>
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="tab-pane" id="pag4" role="tabpanel">
                            <div class="padding-10">
                                <div class="panel panel-default">
                                    <div class="modal-header">
                                        <h5 class="modal-title"
                                            style="text-align: center;">
                                            السلف
                                        </h5>
                                    </div>
                                    <div class="modal-body"
                                         style=" height:200px;overflow: hidden;">
                                        <!-- Side navigation Bar -->
                                        <div class="sidehoverbar">
                                            <a href="#" data-toggle="modal"
                                               onclick="get_solaf_tab('mine_1','طلباتي')"
                                               data-target="#ezn_Modal" class="article">
                                                                                <span class="test"><?php if (!empty($user_solaf_orders)) {
                                                                                        echo count($user_solaf_orders);
                                                                                    } else {
                                                                                        echo 0;
                                                                                    } ?> </span>
                                                <span style="font-size: 18px;"> طلباتى</span>
                                                <i class="fa fa-edit icons"></i>
                                            </a> <span id="test"
                                                       class=" label-danger count">
                                                                                <?php if (!empty($user_solaf_orders)) {
                                                                                    echo count($user_solaf_orders);
                                                                                } else {
                                                                                    echo 0;
                                                                                } ?>
                                                                            </span><h5>طلباتى</h5>
                                            <a href="#" data-toggle="modal"
                                               onclick="get_solaf_tab('follow_1','متابعة طلباتي')"
                                               data-target="#ezn_Modal"
                                               class="Interview">
                                                                                <span class="test"><?php if (!empty($user_solaf_orders)) {
                                                                                        echo count($user_solaf_orders);
                                                                                    } else {
                                                                                        echo 0;
                                                                                    } ?> </span>
                                                <span style="font-size: 18px;"> متابعة طلباتي</span>
                                                <i class="fa fa-file-o icons"></i>
                                            </a><span id="test"
                                                      class=" label-danger count"
                                                      style="margin-top: 28px;">
                                                                                <?php if (!empty($user_solaf_orders)) {
                                                                                    echo count($user_solaf_orders);
                                                                                } else {
                                                                                    echo 0;
                                                                                } ?>
                                                                            </span><h5 style="margin-top: 37px;">متابعة
                                                طلباتي</h5>
                                            <a href="#" data-toggle="modal"
                                               onclick="get_solaf_tab('comming_1','الوارد')"
                                               data-target="#ezn_Modal"
                                               class="Scripter">
                                                                                <span class="test"><?php if (!empty($coming_solaf_records)) {
                                                                                        echo count($coming_solaf_records);
                                                                                    } else {
                                                                                        echo 0;
                                                                                    } ?> </span>
                                                <span style="font-size: 18px;"> الوارد</span>
                                                <i class="fa fa-commenting icons"></i>
                                            </a><span id="test"
                                                      class=" label-danger count"
                                                      style="margin-top: 32px;">
                                                                                <?php if (!empty($coming_solaf_records)) {
                                                                                    echo count($coming_solaf_records);
                                                                                } else {
                                                                                    echo 0;
                                                                                } ?> </span><h5
                                                style="margin-top: 39px;">
                                                الوارد</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </center>
    </div>
                                </div>
                                
                                
 <!---------------------------------------------->
 <div class=" col-md-3   col-xs-12 panel panel-default">
    <div class="panel-heading" role="tab" id="heading3">
        <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse"
               data-parent="#accordion" href="#collapse7" aria-expanded="false"
               aria-controls="collapsefive">
                <i class="fa fa-list" aria-hidden="true"></i> تأجيل السلف
            </a>
        </h4>
    </div>
    <div id="collapse7" class="panel-collapse collapse " role="tabpanel"
         aria-labelledby="heading7">
        <!---------------------------------------الطلبات----------------------------------------->
        <center>
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="tab-pane" id="pag4" role="tabpanel">
                            <div class="padding-10">
                                <div class="panel panel-default">
                                    <div class="modal-header">
                                        <h5 class="modal-title"
                                            style="text-align: center;">
                                            تأجيل السلفة
                                        </h5>
                                    </div>
                                    <div class="modal-body"
                                         style=" height:200px;overflow: hidden;">
                                        <!-- Side navigation Bar -->
                                        <div class="sidehoverbar">
                                            <a href="#" data-toggle="modal"
                                               onclick="get_solaf_tagel_tab('mine_1','طلباتي')"
                                               data-target="#ezn_Modal" class="article">
                                                                                <span class="test"><?php if (!empty($user_orders_tagel)) {
                                                                                        echo count($user_orders_tagel);
                                                                                    } else {
                                                                                        echo 0;
                                                                                    } ?> </span>
                                                <span style="font-size: 18px;"> طلباتى</span>
                                                <i class="fa fa-edit icons"></i>
                                            </a> <span id="test"
                                                       class=" label-danger count">
                                                                                <?php if (!empty($user_orders_tagel)) {
                                                                                    echo count($user_orders_tagel);
                                                                                } else {
                                                                                    echo 0;
                                                                                } ?>
                                                                            </span><h5>طلباتى</h5>
                                            <!-- <a href="#" data-toggle="modal"
                                                                               onclick="get_solaf_tab('follow_1','متابعة طلباتي')"
                                                                               data-target="#ezn_Modal"
                                                                               class="Interview">
                                                                                <span class="test"><?php if (!empty($user_orders_tagel)) {
                                                echo count($user_orders_tagel);
                                            } else {
                                                echo 0;
                                            } ?> </span>
                                                                                <span style="font-size: 18px;"> متابعة طلباتي</span>
                                                                                <i class="fa fa-file-o icons"></i>
                                                                            </a><span id="test"
                                                                                      class=" label-danger count"
                                                                                      style="margin-top: 28px;">
                                                                                <?php if (!empty($user_orders_tagel)) {
                                                echo count($user_orders_tagel);
                                            } else {
                                                echo 0;
                                            } ?>
                                                                            </span><h5 style="margin-top: 37px;">متابعة
                                                                                طلباتي</h5>-->
                                            <a href="#" data-toggle="modal"
                                               onclick="get_solaf_tagel_tab('comming_1','الوارد')"
                                               data-target="#ezn_Modal"
                                               class="Scripter">
                                                                                <span class="test"><?php if (!empty($coming_records_tagel)) {
                                                                                        echo count($coming_records_tagel);
                                                                                    } else {
                                                                                        echo 0;
                                                                                    } ?> </span>
                                                <span style="font-size: 18px;"> الوارد</span>
                                                <i class="fa fa-commenting icons"></i>
                                            </a><span id="test"
                                                      class=" label-danger count"
                                                      style="margin-top: 32px;">
                                                                                <?php if (!empty($coming_records_tagel)) {
                                                                                    echo count($coming_records_tagel);
                                                                                } else {
                                                                                    echo 0;
                                                                                } ?> </span><h5
                                                    style="margin-top: 39px;">
                                                الوارد</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </center>
    </div>
</div>
       
 <!-- ta3gel -->
<!---------------------------------------------   تعجيل السلف-------------------------------------------->
<div class=" col-md-3   col-xs-12 panel panel-default">
    <div class="panel-heading" role="tab" id="heading3">
        <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse"
               data-parent="#accordion" href="#collapse8" aria-expanded="false"
               aria-controls="collapsefive">
                <i class="fa fa-list" aria-hidden="true"></i> تعجيل السلف
            </a>
        </h4>
    </div>
    <div id="collapse8" class="panel-collapse collapse " role="tabpanel"
         aria-labelledby="heading7">
        <!---------------------------------------الطلبات----------------------------------------->
        <center>
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="tab-pane" id="pag4" role="tabpanel">
                            <div class="padding-10">
                                <div class="panel panel-default">
                                    <div class="modal-header">
                                        <h5 class="modal-title"
                                            style="text-align: center;">
                                            تعجيل السلفة
                                        </h5>
                                    </div>
                                    <div class="modal-body"
                                         style=" height:200px;overflow: hidden;">
                                        <!-- Side navigation Bar -->
                                        <div class="sidehoverbar">
                                            <a href="#" data-toggle="modal"
                                               onclick="get_solaf_ta3gel_tab('mine_1','طلباتي')"
                                               data-target="#ezn_Modal" class="article">
                                                                                <span class="test"><?php if (!empty($user_orders_ta3gel)) {
                                                                                        echo count($user_orders_ta3gel);
                                                                                    } else {
                                                                                        echo 0;
                                                                                    } ?> </span>
                                                <span style="font-size: 18px;"> طلباتى</span>
                                                <i class="fa fa-edit icons"></i>
                                            </a> <span id="test"
                                                       class=" label-danger count">
                                                                                <?php if (!empty($user_orders_ta3gel)) {
                                                                                    echo count($user_orders_ta3gel);
                                                                                } else {
                                                                                    echo 0;
                                                                                } ?>
                                                                            </span><h5>طلباتى</h5>
                                        
                                            <a href="#" data-toggle="modal"
                                               onclick="get_solaf_ta3gel_tab('comming_1','الوارد')"
                                               data-target="#ezn_Modal"
                                               class="Scripter">
                                                                                <span class="test"><?php if (!empty($coming_records_ta3gel)) {
                                                                                        echo count($coming_records_ta3gel);
                                                                                    } else {
                                                                                        echo 0;
                                                                                    } ?> </span>
                                                <span style="font-size: 18px;"> الوارد</span>
                                                <i class="fa fa-commenting icons"></i>
                                            </a><span id="test"
                                                      class=" label-danger count"
                                                      style="margin-top: 32px;">
                                                                                <?php if (!empty($coming_records_ta3gel)) {
                                                                                    echo count($coming_records_ta3gel);
                                                                                } else {
                                                                                    echo 0;
                                                                                } ?> </span><h5
                                                    style="margin-top: 39px;">
                                                الوارد</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </center>
    </div>
</div>
<!-- ta3gel -->
<!---------------------------------------------  تغيير الحساب البنكي-------------------------------------------->
<div class=" col-md-3   col-xs-12 panel panel-default">
    <div class="panel-heading" role="tab" id="heading3">
        <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse"
               data-parent="#accordion" href="#collapse9" aria-expanded="false"
               aria-controls="collapsefive">
                <i class="fa fa-list" aria-hidden="true"></i> تغيير الحساب البنكي
            </a>
        </h4>
    </div>
    <div id="collapse9" class="panel-collapse collapse " role="tabpanel"
         aria-labelledby="heading7">
        <!---------------------------------------الطلبات----------------------------------------->
        
        <center>
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="tab-pane" id="pag4" role="tabpanel">
                            <div class="padding-10">
                                <div class="panel panel-default">
                                    <div class="modal-header">
                                        <h5 class="modal-title"
                                            style="text-align: center;">
                                            تغيير الحساب البنكي
                                        </h5>
                                    </div>
                                    <div class="modal-body"
                                         style=" height:200px;overflow: hidden;">
                                        <!-- Side navigation Bar -->
                                        <div class="sidehoverbar">
                                            <a href="#" data-toggle="modal"
                                               onclick="get_banks_tab('mine_1','طلباتي')"
                                               data-target="#ezn_Modal" class="article">
                                                                                <span class="test"><?php if (!empty($user_orders_banks)) {
                                                                                        echo count($user_orders_banks);
                                                                                    } else {
                                                                                        echo 0;
                                                                                    } ?> </span>
                                                <span style="font-size: 18px;"> طلباتى</span>
                                                <i class="fa fa-edit icons"></i>
                                            </a> <span id="test"
                                                       class=" label-danger count">
                                                                                <?php if (!empty($user_orders_banks)) {
                                                                                    echo count($user_orders_banks);
                                                                                } else {
                                                                                    echo 0;
                                                                                } ?>
                                                                            </span><h5>طلباتى</h5>
                                        
                                            <a href="#" data-toggle="modal"
                                               onclick="get_banks_tab('comming_1','الوارد')"
                                               data-target="#ezn_Modal"
                                               class="Scripter">
                                                                                <span class="test"><?php if (!empty($coming_records_banks)) {
                                                                                        echo count($coming_records_banks);
                                                                                    } else {
                                                                                        echo 0;
                                                                                    } ?> </span>
                                                <span style="font-size: 18px;"> الوارد</span>
                                                <i class="fa fa-commenting icons"></i>
                                            </a><span id="test"
                                                      class=" label-danger count"
                                                      style="margin-top: 32px;">
                                                                                <?php if (!empty($coming_records_banks)) {
                                                                                    echo count($coming_records_banks);
                                                                                } else {
                                                                                    echo 0;
                                                                                } ?> </span><h5
                                                    style="margin-top: 39px;">
                                                الوارد</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </center>
    </div>
</div>             
       
       
       
       
                               
                                
                                
          <div class=" col-md-3   col-xs-12 panel panel-default">
                                    <div class="panel-heading" role="tab" id="heading7">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse"
                                               data-parent="#accordion" href="#collapse88" aria-expanded="false"
                                               aria-controls="collapse88">
                                                <i class="fa fa-list" aria-hidden="true"></i> المسير
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse88" class="panel-collapse collapse " role="tabpanel"
                                         aria-labelledby="heading7">
                                        <!---------------------------------------الطلبات----------------------------------------->
                                        <center>
                                            <div class="col-xs-12">
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <div class="tab-pane" id="pag4" role="tabpanel">
                                                            <div class="padding-10">
                                                                <div class="panel panel-default">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            style="text-align: center;">
                                                                            المسير
                                                                        </h5>
                                                                    </div>
                                                                    <div class="modal-body"
                                                                         style=" height:200px;overflow: hidden;">
                                                                        <!-- Side navigation Bar -->
                                                                        <div class="sidehoverbar">
                                                                            <a href="#" data-toggle="modal"
                                                                               onclick="get_salaries_tab('mine_1','طلباتي')"
                                                                               data-target="#ezn_Modal" class="article">
                                                                                <span class="test"><?php if (!empty($user_mosayer_orders)) {
                                                                                        echo count($user_mosayer_orders);
                                                                                    } else {
                                                                                        echo 0;
                                                                                    } ?> </span>
                                                                                <span style="font-size: 18px;"> طلباتى</span>
                                                                                <i class="fa fa-edit icons"></i>
                                                                            </a> <span id="test"
                                                                                       class=" label-danger count">
                                                                                <?php if (!empty($user_mosayer_orders)) {
                                                                                    echo count($user_mosayer_orders);
                                                                                } else {
                                                                                    echo 0;
                                                                                } ?>
                                                                            </span><h5>طلباتى</h5>
                                                                            <a href="#" data-toggle="modal"
                                                                               onclick="get_salaries_tab('follow_1','متابعة طلباتي')"
                                                                               data-target="#ezn_Modal"
                                                                               class="Interview">
                                                                                <span class="test"><?php if (!empty($user_mosayer_orders)) {
                                                                                        echo count($user_mosayer_orders);
                                                                                    } else {
                                                                                        echo 0;
                                                                                    } ?> </span>
                                                                                <span style="font-size: 18px;"> متابعة طلباتي</span>
                                                                                <i class="fa fa-file-o icons"></i>
                                                                            </a><span id="test"
                                                                                      class=" label-danger count"
                                                                                      style="margin-top: 28px;">
                                                                                <?php if (!empty($user_mosayer_orders)) {
                                                                                    echo count($user_mosayer_orders);
                                                                                } else {
                                                                                    echo 0;
                                                                                } ?>
                                                                            </span><h5 style="margin-top: 37px;">متابعة طلباتي</h5>
                                                                            <a href="#" data-toggle="modal"
                                                                               onclick="get_salaries_tab('comming_1','الوارد')"
                                                                               data-target="#ezn_Modal"
                                                                               class="Scripter">
                                                                                <span class="test"><?php if (!empty($coming_mosayer_records)) {
                                                                                        echo count($coming_mosayer_records);
                                                                                    } else {
                                                                                        echo 0;
                                                                                    } ?> </span>
                                                                                <span style="font-size: 18px;"> الوارد</span>
                                                                                <i class="fa fa-commenting icons"></i>
                                                                            </a><span id="test"
                                                                                      class=" label-danger count"
                                                                                      style="margin-top: 32px;">
                                                                                <?php if (!empty($coming_mosayer_records)) {
                                                                                    echo count($coming_mosayer_records);
                                                                                } else {
                                                                                    echo 0;
                                                                                } ?> </span><h5 style="margin-top: 39px;">الوارد</h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </center>
                                    </div>
                                </div>                               
                                
                                
                                
                                
                                
    <!--------------------------------------------- تحويلات الحسابات   -------------------------------------------->
                                <div class=" col-md-3   col-xs-12 panel panel-default">
                                    <div class="panel-heading" role="tab" id="heading1">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse"
                                               data-parent="#accordion" href="#collapse10" aria-expanded="false"
                                               aria-controls="collapse10">
                                                <i class="fa fa-list" aria-hidden="true"></i> تحويلات الحسابات
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse10" class="panel-collapse collapse " role="tabpanel"
                                         aria-labelledby="heading1">
                                        <!---------------------------------------الطلبات----------------------------------------->
                                        <center>
                                            <div class="col-xs-12">
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <div class="tab-pane" id="pag4" role="tabpanel">
                                                            <div class="padding-10">
                                                                <div class="panel panel-default">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            style="text-align: center;">
                                                                            تحويلات الحسابات
                                                                        </h5>
                                                                    </div>
                                                                    <div class="modal-body"
                                                                         style=" height:200px;overflow: hidden;">
                                                                        <!-- Side navigation Bar -->
                                                                        <div class="sidehoverbar">
                                                                            <a href="#" data-toggle="modal"
                                                                               onclick="get_accounts_tab('mine_1','طلباتي')"
                                                                               data-target="#ezn_Modal" class="article">
                                                                                <span class="test"><?php if (!empty($user_accounts_orders)) {
                                                                                        echo count($user_accounts_orders);
                                                                                    } else {
                                                                                        echo 0;
                                                                                    } ?> </span>
                                                                                <span style="font-size: 18px;"> طلباتى</span>
                                                                                <i class="fa fa-edit icons"></i>
                                                                            </a> <span id="test"
                                                                                       class=" label-danger count">
                                                                                <?php if (!empty($user_accounts_orders)) {
                                                                                    echo count($user_accounts_orders);
                                                                                } else {
                                                                                    echo 0;
                                                                                } ?>
                                                                            </span>  <h5>طلباتى</h5>
                                                                          <!--  <a href="#" data-toggle="modal"
                                                                               onclick="get_accounts_tab('follow_1','متابعة طلباتي')"
                                                                               data-target="#ezn_Modal" class="Interview">
                                                                                <span class="test"><?php if (!empty($user_accounts_orders)) {
                                                                                        echo count($user_accounts_orders);
                                                                                    } else {
                                                                                        echo 0;
                                                                                    } ?> </span>
                                                                                <span style="font-size: 18px;"> متابعة طلباتي</span>
                                                                                <i class="fa fa-edit icons"></i>
                                                                            </a> <span id="test"
                                                                                       class=" label-danger count">
                                                                                <?php if (!empty($user_accounts_orders)) {
                                                                                    echo count($user_accounts_orders);
                                                                                } else {
                                                                                    echo 0;
                                                                                } ?>
                                                                            </span>  <h5>متابعة طلباتي</h5>
-->
                                                                            <a href="#" data-toggle="modal"
                                                                               onclick="get_accounts_tab('comming_1','الوارد')"
                                                                               data-target="#ezn_Modal"
                                                                               class="Interview">
                                                                                <span class="test"><?php if (!empty($coming_accounts_records)) {
                                                                                        echo count($coming_accounts_records);
                                                                                    } else {
                                                                                        echo 0;
                                                                                    } ?> </span>
                                                                                <span style="font-size: 18px;"> الوارد</span>
                                                                                <i class="fa fa-commenting icons"></i>
                                                                            </a><span id="test"
                                                                                      class=" label-danger count"
                                                                                      style="margin-top: 32px;">
                                                                                <?php if (!empty($coming_accounts_records)) {
                                                                                    echo count($coming_accounts_records);
                                                                                } else {
                                                                                    echo 0;
                                                                                } ?> </span><h5
                                                                                    style="margin-top: 39px;">
                                                                                الوارد</h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </center>
                                    </div>
                                </div>                              
                                
                                
                                
                                
                                
                                
                                <!---------------------------------------------    إنتدابات-------------------------------------------->
                                <div class=" col-md-3   col-xs-12 panel panel-default">
                                    <div class="panel-heading" role="tab" id="heading6">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse"
                                               data-parent="#accordion" href="#collapse6" aria-expanded="false"
                                               aria-controls="collapse6">
                                                <i class="fa fa-list" aria-hidden="true"></i> إنتدابات
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse6" class="panel-collapse collapse " role="tabpanel"
                                         aria-labelledby="heading6">
                                        <!---------------------------------------الطلبات----------------------------------------->
                                        <center>
                                            <div class="col-xs-12">
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <div class="tab-pane" id="pag4" role="tabpanel">
                                                            <div class="padding-10">
                                                                <div class="panel panel-default">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            style="text-align: center;">
                                                                            إنتدابات
                                                                        </h5>
                                                                    </div>
                                                                    <div class="modal-body"
                                                                         style=" height:200px;overflow: hidden;">
                                                                        <!-- Side navigation Bar -->
                                                                        <div class="sidehoverbar">
                                                                            <a href="#" data-toggle="modal"
                                                                               onclick="get_mandate_tab('1','طلباتي')"
                                                                               data-target="#ezn_Modal" class="article">
                                                                                <span class="test"><?php if (!empty($mandate_records)) {
                                                                                        echo count($mandate_records);
                                                                                    } else {
                                                                                        echo 0;
                                                                                    } ?> </span>
                                                                                <span style="font-size: 18px;"> طلباتى</span>
                                                                                <i class="fa fa-edit icons"></i>
                                                                            </a> <span id="test"
                                                                                       class=" label-danger count">
                                                                                <?php if (!empty($mandate_records)) {
                                                                                    echo count($mandate_records);
                                                                                } else {
                                                                                    echo 0;
                                                                                } ?>
                                                                            </span><h5>طلباتى</h5>
                                                                            <a href="#" data-toggle="modal"
                                                                               onclick="get_mandate_tab('2','متابعة طلباتي')"
                                                                               data-target="#ezn_Modal"
                                                                               class="Interview">
                                                                                <span class="test"><?php if (!empty($mandate_records)) {
                                                                                        echo count($mandate_records);
                                                                                    } else {
                                                                                        echo 0;
                                                                                    } ?> </span>
                                                                                <span style="font-size: 18px;"> متابعة طلباتي</span>
                                                                                <i class="fa fa-file-o icons"></i>
                                                                            </a><span id="test"
                                                                                      class=" label-danger count"
                                                                                      style="margin-top: 28px;">
                                                                                <?php if (!empty($mandate_records)) {
                                                                                    echo count($mandate_records);
                                                                                } else {
                                                                                    echo 0;
                                                                                } ?>
                                                                            </span><h5 style="margin-top: 37px;">متابعة
                                                                                طلباتي</h5>
                                                                            <a href="#" data-toggle="modal"
                                                                               onclick="get_mandate_tab('3','الوارد')"
                                                                               data-target="#ezn_Modal"
                                                                               class="Scripter">
                                                                                <span class="test"><?php if (!empty($mandate_coming)) {
                                                                                        echo count($mandate_coming);
                                                                                    } else {
                                                                                        echo 0;
                                                                                    } ?> </span>
                                                                                <span style="font-size: 18px;"> الوارد</span>
                                                                                <i class="fa fa-commenting icons"></i>
                                                                            </a><span id="test"
                                                                                      class=" label-danger count"
                                                                                      style="margin-top: 32px;">
                                                                                <?php if (!empty($mandate_coming)) {
                                                                                    echo count($mandate_coming);
                                                                                } else {
                                                                                    echo 0;
                                                                                } ?> </span><h5
                                                                                    style="margin-top: 39px;">
                                                                                الوارد</h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </center>
                                    </div>
                                </div>





<div class=" col-md-3   col-xs-12 panel panel-default">
    <div class="panel-heading" role="tab" id="heading6">
        <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse"
               data-parent="#accordion" href="#collapse16" aria-expanded="false"
               aria-controls="collapse16">
                <i class="fa fa-list" aria-hidden="true"></i> ساعات التطوع
            </a>
        </h4>
    </div>
    <div id="collapse16" class="panel-collapse collapse " role="tabpanel"
         aria-labelledby="heading6">
        <!---------------------------------------الطلبات----------------------------------------->
        <center>
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="tab-pane" id="pag4" role="tabpanel">
                            <div class="padding-10">
                                <div class="panel panel-default">
                                    <div class="modal-header">
                                        <h5 class="modal-title"
                                            style="text-align: center;">
                                            ساعات التطوع
                                        </h5>
                                    </div>
                                    <div class="modal-body"
                                         style=" height:200px;overflow: hidden;">
                                        <!-- Side navigation Bar -->
                                        <div class="sidehoverbar">
                                            <a href="#" data-toggle="modal"
                                               onclick="get_volunteer_hours_tab('1','طلباتي')"
                                               data-target="#ezn_Modal" class="article">
                                                                                <span class="test"><?php if (!empty($mandate_records)) {
                                                                                        echo count($mandate_records);
                                                                                    } else {
                                                                                        echo 0;
                                                                                    } ?> </span>
                                                <span style="font-size: 18px;"> طلباتى</span>
                                                <i class="fa fa-edit icons"></i>
                                            </a> <span id="test"
                                                       class=" label-danger count">
                                                                                <?php if (!empty($mandate_records)) {
                                                                                    echo count($mandate_records);
                                                                                } else {
                                                                                    echo 0;
                                                                                } ?>
                                                                            </span><h5>طلباتى</h5>
                                            <a href="#" data-toggle="modal"
                                               onclick="get_volunteer_hours_tab('2','متابعة طلباتي')"
                                               data-target="#ezn_Modal"
                                               class="Interview">
                                                                                <span class="test"><?php if (!empty($mandate_records)) {
                                                                                        echo count($mandate_records);
                                                                                    } else {
                                                                                        echo 0;
                                                                                    } ?> </span>
                                                <span style="font-size: 18px;"> متابعة طلباتي</span>
                                                <i class="fa fa-file-o icons"></i>
                                            </a><span id="test"
                                                      class=" label-danger count"
                                                      style="margin-top: 28px;">
                                                                                <?php if (!empty($mandate_records)) {
                                                                                    echo count($mandate_records);
                                                                                } else {
                                                                                    echo 0;
                                                                                } ?>
                                                                            </span><h5 style="margin-top: 37px;">متابعة
                                                طلباتي</h5>
                                            <a href="#" data-toggle="modal"
                                               onclick="get_volunteer_hours_tab('3','الوارد')"
                                               data-target="#ezn_Modal"
                                               class="Scripter">
                                                                                <span class="test"><?php if (!empty($mandate_coming)) {
                                                                                        echo count($mandate_coming);
                                                                                    } else {
                                                                                        echo 0;
                                                                                    } ?> </span>
                                                <span style="font-size: 18px;"> الوارد</span>
                                                <i class="fa fa-commenting icons"></i>
                                            </a><span id="test"
                                                      class=" label-danger count"
                                                      style="margin-top: 32px;">
                                                                                <?php if (!empty($mandate_coming)) {
                                                                                    echo count($mandate_coming);
                                                                                } else {
                                                                                    echo 0;
                                                                                } ?> </span><h5
                                                    style="margin-top: 39px;">
                                                الوارد</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </center>
    </div>
</div>                                
                                
                                <!---------------------------------------------    السلف-------------------------------------------->
                                <div class=" col-md-3   col-xs-12 panel panel-default">
                                    <div class="panel-heading" role="tab" id="heading4">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse"
                                               data-parent="#accordion" href="#collapse4" aria-expanded="false"
                                               aria-controls="collapsefive">
                                                <i class="fa fa-list" aria-hidden="true"></i> الشئون المالية
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse4" class="panel-collapse collapse " role="tabpanel"
                                         aria-labelledby="heading4">
                                        <!---------------------------------------الطلبات----------------------------------------->
                                        <center>
                                            <div class="col-xs-12">
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <div class="tab-pane" id="pag4" role="tabpanel">
                                                            <div class="padding-10">
                                                                <div class="panel panel-default">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            style="text-align: center;">
                                                                            الشئون المالية
                                                                        </h5>
                                                                    </div>
                                                                    <div class="modal-body"
                                                                         style=" height:200px;overflow: hidden;">
                                                                        <!-- Side navigation Bar -->
                                                                        <div class="sidehoverbar">
                                                                            <a href="#" data-toggle="modal"
                                                                               onclick="get_sadad_fatora(1,'طالبات تسديد فواتير')"
                                                                               data-target="#ezn_Modal" class="article">
                                                                                <span class="test"><?php if (!empty($sadad_fatora)) {
                                                                                        echo count($sadad_fatora);
                                                                                    } else {
                                                                                        echo 0;
                                                                                    } ?> </span>
                                                                                <span style="font-size: 18px;">  طالبات تسديد فواتير</span>
                                                                                <i class="fa fa-edit icons"></i>
                                                                            </a> <span id="test"
                                                                                       class=" label-danger count">
                                                                                <?php if (!empty($sadad_fatora)) {
                                                                                    echo count($sadad_fatora);
                                                                                } else {
                                                                                    echo 0;
                                                                                } ?>
                                                                            </span><h5> طالبات تسديد فواتير</h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </center>
                                    </div>
                                </div>
                                <!---------------------------------------------    التكليف الاضافي-------------------------------------------->
                                <div class=" col-md-3   col-xs-12 panel panel-default">
                                    <div class="panel-heading" role="tab" id="heading4">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse"
                                               data-parent="#accordion" href="#collapse5" aria-expanded="false"
                                               aria-controls="collapse5">
                                                <i class="fa fa-list" aria-hidden="true"></i> التكليف الاضافي
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse5" class="panel-collapse collapse " role="tabpanel"
                                         aria-labelledby="heading5">
                                        <!---------------------------------------الطلبات----------------------------------------->
                                        <center>
                                            <div class="col-xs-12">
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <div class="tab-pane" id="pag4" role="tabpanel">
                                                            <div class="padding-10">
                                                                <div class="panel panel-default">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            style="text-align: center;">
                                                                            التكليف الاضافي
                                                                        </h5>
                                                                    </div>
                                                                    <div class="modal-body"
                                                                         style=" height:200px;overflow: hidden;">
                                                                        <!-- Side navigation Bar -->
                                                                        <div class="sidehoverbar">
                                                                            <a href="#" data-toggle="modal"
                                                                               onclick="get_over_time_emp(1,'طالبات  تكليف الاضافي')"
                                                                               data-target="#ezn_Modal" class="article">
                                                                                <span class="test"><?php if (!empty($sadad_fatora)) {
                                                                                        echo count($sadad_fatora);
                                                                                    } else {
                                                                                        echo 0;
                                                                                    } ?> </span>
                                                                                <span style="font-size: 18px;"> طالبات تكليف الاضافي</span>
                                                                                <i class="fa fa-edit icons"></i>
                                                                            </a> <span id="test"
                                                                                       class=" label-danger count">
                                                                                <?php if (!empty($sadad_fatora)) {
                                                                                    echo count($sadad_fatora);
                                                                                } else {
                                                                                    echo 0;
                                                                                } ?>
                                                                            </span><h5> طالبات تكليف الاضافي</h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ezn_Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 90%;height: 90%;overflow: auto">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="modal_header"></h4>
            </div>
            <div class="modal-body" id="ezn_Modal_body">
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%;">
                <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script>
    $(document).ready(function () {
        $("div.bhoechie-tab-menu>div.list-group>a").click(function (e) {
            e.preventDefault();
            $(this).siblings('a.active').removeClass("active");
            $(this).addClass("active");
            var index = $(this).index();
            $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
            $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
        });
    });
</script>
<script>
    function get_agaza_tab(tab_id, text) {
        $('#modal_header').text(text);
        // $('#ezn_Modal_body').css();
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/all_agazat/all_transformations_f/All_transformations",
            data: {tab_id: tab_id},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $.validate({
                    validateHiddenInputs: true // for live search required
                });
                console.log('profile agaza agaza_tab ');
            }
        });
    }
    function get_ezen_tab(tab_id, text) {
        $('#modal_header').text(text);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/all_ozonat/Transformation/get_orders",
            data: {valu: tab_id},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $.validate({
                    validateHiddenInputs: true // for live search required
                });
                console.log('profile agaza agaza_tab ');
            }
        });
    }
</script>
<script>
    function get_sadad_fatora(tab_id, text) {
        $('#modal_header').text(text);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>maham_mowazf/person_profile/Personal_profile/get_sadad_fatora",
            data: {valu: tab_id},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                console.log('profile agaza agaza_tab ');
            }
        });
    }
    function get_solaf_tab(tab_id, text) {
        $('#modal_header').text(text);
        // $('#ezn_Modal_body').css();
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/solaf/All_transformations",
            data: {tab_id: tab_id},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $.validate({
                    validateHiddenInputs: true // for live search required
                });
                console.log('profile agaza agaza_tab ');
            }
        });
    }
    function get_over_time_emp(tab_id, text) {
        $('#modal_header').text(text);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/overtime_hours/Overtime_hours_orders/my_over_time_emp",
            data: {
                valu: tab_id,
                from_profile: 1
            },
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                console.log('profile agaza agaza_tab ');
            }
        });
    }
    function get_mandate_tab(tab_id, text) {
        $('#modal_header').text(text);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/mandate_order/Mandate_transformation/get_orders",
            data: {valu: tab_id},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $.validate({
                    validateHiddenInputs: true // for live search required
                });
                console.log('profile mandate_tab ');
            }
        });
    }
</script>

<script>

    function get_solaf_tagel_tab(tab_id, text) {
        $('#modal_header').text(text);
        // $('#ezn_Modal_body').css();
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/solaf/All_transformations_tagel",
            data: {tab_id: tab_id},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $.validate({
                    validateHiddenInputs: true // for live search required
                });
                console.log('profile agaza agaza_tab ');
            }
        });
    }

</script>

<script>
   /*12-8-20-om*/
    function get_salaries_tab(tab_id, text) {
        $('#modal_header').text(text);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/Employee_salaries/employee_salaries_transformations",
            data: {tab_id: tab_id},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $.validate({
                    validateHiddenInputs: true // for live search required
                });
                console.log('profile agaza agaza_tab ');
            }
        });
    }

</script>

<script>

    function get_accounts_tab(tab_id, text) {
        $('#modal_header').text(text);
        // $('#ezn_Modal_body').css();
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>finance_accounting/box/forms/transformation_accounts/Transformation_accounts/all_transformation_accounts",
            data: {tab_id: tab_id},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $.validate({
                    validateHiddenInputs: true // for live search required
                });
                console.log('profile agaza agaza_tab ');
            }
        });
    }
</script>

<script>

    function get_solaf_ta3gel_tab(tab_id, text) {
        $('#modal_header').text(text);
        // $('#ezn_Modal_body').css();
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/solaf/All_transformations_ta3gel",
            data: {tab_id: tab_id},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $.validate({
                    validateHiddenInputs: true // for live search required
                });
                console.log('profile agaza agaza_tab ');
            }
        });
    }

</script>


<script>

    function get_banks_tab(tab_id, text) {
        $('#modal_header').text(text);
        // $('#ezn_Modal_body').css();
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/emp_banks/All_transformations_banks",
            data: {tab_id: tab_id},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $.validate({
                    validateHiddenInputs: true // for live search required
                });
                console.log('profile agaza agaza_tab ');
            }
        });
    }

</script>
<script>
    /*23-11-20-om*/
    function get_volunteer_hours_tab(tab_id, text) {
        $('#modal_header').text(text);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/Volunteer_hours/get_orders",
            data: {valu: tab_id},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $.validate({
                    validateHiddenInputs: true // for live search required
                });
                console.log('profile mandate_tab ');
            }
        });
    }

</script>