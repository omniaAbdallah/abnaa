<link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css1/bootstrap-rtl.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css1/AdminLTE.min.css">
<style>
    .all_cont {
        padding: 7px 0px;
    }

    .row {
        margin-right: 0px;
        margin-left: 0px;
    }

    .topnav {
        overflow: hidden;
        background-color: #333;
        margin-bottom: 5px;
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
        font-size: 30px;
        font-weight: bold;
        /* margin: 4px 0px 12px 0;*/
        white-space: nowrap;
        padding: 0;
        color: aliceblue;
        text-align: right;
    }

    .small-box p {
        font-size: 15px;
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

    .media .panel {
        border: none;
        border-radius: 5px;
        box-shadow: none;
        margin-bottom: 14px;
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
        color: #fff;
        line-height: 28px;
        letter-spacing: 1px;
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
        font-size: 15px;
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

    .attendance {
        border: 1px solid #dad6d6;
        border-radius: 6px;
        padding: 5px 6px;
        margin: 0px 5px;
        background: #03a9f4c7;
        color: white;
    }

    .btn-link {
        font-weight: 400;
        color: #2196F3;
        cursor: pointer;
        border-radius: 0;
    }
</style>
<style>
    .pargraph {
        font-size: 15px;
        color: black;
        margin-top: -9px;
    }

    .profile-activity {
        border-bottom: 1px dotted #D0D8E0;
        position: relative;
        border-left: 1px dotted #FFF;
        border-right: 1px dotted #FFF;
        padding: 0px 4px;
    }

    input[type=date], input[type=time], input[type=datetime-local], input[type=month] {
        line-height: 15px;
        line-height: 1.42857143 \0;
        border: 0px;
    }
</style>
<style>
    /* ----  rules & regulations cards ---- */
    .Rules-wrapper {
        padding-top: 20px;
    }

    .rules-reg-card {
        padding: 15px;
        width: 100%;
        height: 185px;
        background: #fff;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        margin-bottom: 40px;
        overflow: hidden;
        /*cursor:pointer;*/
        position: relative;
        /*-o-transition:all .5s ease;-webkit-transition:all .5s ease;-moz-transition:all .5s ease;*/
        transition: all .5s ease;
    }

    .rules-reg-card:hover {
        box-shadow: 0px 5px 35px 0px rgba(0, 0, 0, 0.13);
        -webkit-transform: scale(1.05);
        -ms-transform: scale(1.05);
        transform: scale(1.05);
    }

    .rules-reg-card.rules {
        border-bottom: 5px #00afa9 solid;
    }

    .rules-reg-card.regulations {
        border-bottom: 5px #c84a3d solid;
    }

    .rules-reg-card .rule-clickable-part {
        display: block;
        height: 80%;
    }

    .rules-reg-card p {
        font: bold 1em/1.8 DroidArabicKufi-Bold, arial, sans-serif;
        text-align: center;
        height: calc(100% - 35px);
    }

    .rules-reg-card p .icon {
        display: block;
        padding-top: 10px;
        height: 70px;
    }

    .rules-reg-card p .icon img {
        max-height: 52px;
    }

    .date {
        display: block;
        font: 1em DroidArabicKufi, arial, sans-serif;
        color: #3e3939;
        margin: 10px 0;
    }

    .card-actions {
        text-align: left;
        margin: 10px 0;
    }

    .card-actions a {
        display: inline-block;
        color: #009688;
        padding: 1px 4px;
        background: #f2f2f2;
        margin: 0 2px;
        border-radius: 4px;
        font-size: 14px;
    }

    .ZP-atdancehead .time-show-btn {
        font-size: 22px;
        font-family: "LatoWeb";
        height: 45px;
        position: absolute;
        border-radius: 4px;
        right: 25px;
        top: 6px;
        width: 145px;
        padding: 10px;
        padding-right: 5px;
        border: 0;
        box-shadow: 0px 0px 4px 0px #ccc;
    }

    .grn-bg {
        /* background: #00bd9e;*/
        background: #e15e6d;
    }

    .time-show-btn {
        color: #ffffff;
    }

    .PT12I {
        /*padding-top: 12px !important;*/
        padding: 11px !important;
        border: 1px solid white;
    }

    .dash-col .dash-body .ctim {
        text-align: center;
        margin: 30px 10px;
    }

    .user {
        color: black !important;
        font-weight: bold;
    }

    <
    style >
    .tabs-bord .tab .nav-tabs {
        padding-left: 15px;
        border-bottom: 4px solid #f28d1e;
    }

    .tabs-bord .tab .nav-tabs li a {
        color: #fff;
        font-weight: 600;
        padding: 15px 20px;
        margin-right: 5px;
        background: #1c2172;
        text-shadow: 1px 1px 2px #000;
        border: none;
        border-radius: 0;
        opacity: 0.5;
        position: relative;
        transition: all 0.3s ease 0s;
        border-radius: 8px 8px 0 0
    }

    .tabs-bord .tab .nav-tabs li a:hover {
        background: #1c2172;
        opacity: 0.8;
    }

    .tabs-bord .tab .nav-tabs li.active a {
        opacity: 1;
    }

    .tabs-bord .tab .nav-tabs li.active a,
    .tabs-bord .tab .nav-tabs li.active a:hover,
    .tabs-bord .tab .nav-tabs li.active a:focus {
        color: #fff;
        background: #1c2172;
        border: none;
        border-radius: 8px 8px 0 0
    }

    .tabs-bord .tab .nav-tabs li a:before,
    .tabs-bord .tab .nav-tabs li a:after {
        content: "";
        border-top: 42px solid transparent;
        position: absolute;
        top: -2px;
    }

    .tabs-bord .tab .nav-tabs li a i,
    .tabs-bord .tab .nav-tabs li.active a i, .tabs-bord .tab .nav-tabs li a:hover i {
        display: inline-block;
        padding-left: 10px;
        font-size: 15px;
        text-shadow: none;
    }

    .tabs-bord .tab .nav-tabs li a i {
        padding: 0
    }

    .tabs-bord .tab .nav-tabs li a span {
        display: inline-block;
        font-size: 14px;
        letter-spacing: -9px;
        opacity: 0;
        transition: all 0.7s ease 0s;
    }

    .tabs-bord .tab .nav-tabs li a:hover span,
    .tabs-bord .tab .nav-tabs li.active a span {
        letter-spacing: 1px;
        opacity: 1;
        transition: all 0.7s ease 0s;
    }

    .tabs-bord .tab .tab-content {
        padding: 10px;
        background: #fff;
        font-size: 16px;
        color: #171515;
        line-height: 25px;
        /* text-align: right; */
    }

    .tabs-bord .tab .tab-content h3 {
        margin-top: 0;
    }

    @media only screen and (max-width: 479px) {
        .tabs-bord .tab .nav-tabs li {
            width: 100%;
            margin-bottom: 5px;
            text-align: center;
        }

        .tabs-bord .tab .nav-tabs li a span {
            letter-spacing: 1px;
            opacity: 1;
        }
    }

    .tabs-bord .centered {
        float: none;
        margin: 0 auto;
    }

    .tabs-bord .our-team {
        padding: 10px 0 10px;
        background: #f7f5ec;
        text-align: center;
        overflow: hidden;
        position: relative;
        border-radius: 8px;
        box-shadow: 0px 0px 9px 0px rgba(0, 0, 0, 0.14);
        margin-bottom: 20px;
        border-bottom: 3px solid #81bc48;
        border-radius: 5% 0 5% 0;
    }

    .tabs-bord .arrow {
        padding: 10px 0 10px;
        background: none;
        text-align: center;
        overflow: hidden;
        position: relative;
        border-radius: 8px;
        box-shadow: none;
        margin-bottom: 20px;
        border-bottom: 0;
        border-radius: 0;
    }

    .our-team:before,
    .our-team:after {
        content: '';
        background: #f28d1e;
        width: 5px;
        height: 30%;
        box-shadow: 15px 0 0 #f28d1e;
        transform: skewY(50deg);
        position: absolute;
        bottom: -100%;
        left: 5px;
        z-index: 1;
        transition: all 0.45s ease;
    }

    .our-team:after {
        box-shadow: -15px 0 0 #f28d1e;
        left: auto;
        right: 5px;
        bottom: auto;
        top: -100%;
    }

    .our-team:hover:before {
        bottom: -10px;
    }

    .our-team:hover:after {
        top: -10px;
    }

    .tabs-bord .our-team .pic {
        border-top: 5px solid #f28d1e;
        border-bottom: 5px solid #f28d1e;
        border-radius: 50% 50% 50% 0;
        overflow: hidden;
        transition: all 0.5s ease 0s;
        margin: 0 auto;
        /* width: 130px;
         height: 130px; */
        width: 183px;
    }

    .tabs-bord .our-team:hover .pic {
        border-top-color: #81bc48;
        border-bottom-color: #81bc48;
        border-radius: 50% 0;
    }

    .tabs-bord .our-team .pic img {
        width: 100%;
        height: auto;
        transition: all 0.5s ease 0s;
    }

    .tabs-bord .our-team .team-content {
        /* margin-bottom: 10px;*/
        /*min-height: 92px;*/
        /* max-height: 170px;*/
    }

    .tabs-bord .our-team .title {
        font-size: 19px;
        font-weight: 700;
        color: #81bc48;
        padding-bottom: 8px;
        margin: 15px 0 10px 0;
        position: relative;
        letter-spacing: 0;
        line-height: 1.6;
    }

    .tabs-bord .our-team .title:after {
        content: "";
        width: 35px;
        height: 3px;
        background: #f28d1e;
        margin: 0 auto;
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
    }

    .tabs-bord .level3 .our-team .title {
        font-size: 12px;
        font-weight: 700;
        color: #032b4a;
        padding-bottom: 8px;
        margin: 15px 0 10px 0;
        position: relative;
        letter-spacing: 0;
        line-height: 1.6;
    }

    .tabs-bord .our-team .post {
        display: block;
        font-size: 15px;
        color: #4e5052;
        text-transform: capitalize;
    }

    @media only screen and (max-width: 990px) {
        .tabs-bord .our-team {
            margin-bottom: 30px;
        }
    }

    .tabs-bord a.b-scroll {
        display: block;
        position: absolute;
        left: 50%;
        bottom: 1%;
        z-index: 9;
        -webkit-transform: translateX(-50%);
        transform: translateX(-50%);
        -webkit-transition: all 0.5s ease 1.9s;
        transition: all 0.5s ease 1.9s;
        cursor: pointer;
    }

    .tabs-bord a.b-scroll span {
        display: inline-block;
        color: #474a4c;
        font-size: 25px;
        margin-top: 40px;
        -webkit-animation: scrooldown 2000ms linear 0s infinite;
        animation: scrooldown 2000ms linear 0s infinite;
    }

    .tabs-bord .arrow a.b-scroll {
        display: block;
        position: absolute;
        left: 50%;
        bottom: 10%;
        z-index: 9;
        -webkit-transform: translateX(-50%);
        transform: translateX(-50%);
        -webkit-transition: all 0.5s ease 1.9s;
        transition: all 0.5s ease 1.9s;
        cursor: pointer;
    }

    .tabs-bord .arrow a.b-scroll span {
        display: inline-block;
        color: #032b4a;
        font-size: 40px;
        margin-top: 0px;
        -webkit-animation: scrooldown 2000ms linear 0s infinite;
        animation: scrooldown 2000ms linear 0s infinite;
    }

    .tabs-bord a.b-scroll span:hover {
        display: inline-block;
        color: #f28d1e;
        margin-top: 40px;
        -webkit-animation: scrooldown 2000ms linear 0s infinite;
        animation: scrooldown 2000ms linear 0s infinite;
    }

    @-webkit-keyframes scrooldown {
        0% {
            -webkit-transform: translateY(-5px);
            transform: translateY(-5px);
        }
        50% {
            -webkit-transform: translateY(5px);
            transform: translateY(5px);
        }
        100% {
            -webkit-transform: translateY(-5px);
            transform: translateY(-5px);
        }
    }

    @keyframes scrooldown {
        0% {
            -webkit-transform: translateY(-5px);
            transform: translateY(-5px);
        }
        50% {
            -webkit-transform: translateY(5px);
            transform: translateY(5px);
        }
        100% {
            -webkit-transform: translateY(-5px);
            transform: translateY(-5px);
        }
    }

    .level2 {
    }

    .dawra-style i {
        width: 30px;
        height: 30px;
        background-color: #FF9800;
        color: #f9f9f9;
        font-size: 16px;
        text-align: center;
        line-height: 28px;
        border-radius: 50%;
    }

    a {
        color: #6f6f6f;
    }

    a,
    a:active,
    a:focus,
    a:hover {
        outline: none;
        -webkit-transition: all 0.3s ease-in-out;
        -moz-transition: all 0.3s ease-in-out;
        -o-transition: all 0.3s ease-in-out;
        -ms-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out;
    }

    a:hover {
        text-decoration: none;
    }

    h1, h2, h3, h4, h5, h6 {
        margin: 0 0 15px 0;
        letter-spacing: 0px;
        font-weight: bold;
    }

    h1 {
        font-size: 48px;
        line-height: 52px;
    }

    h2 {
        font-size: 36px;
        line-height: 48px;
    }

    h3 {
        font-size: 30px;
        line-height: 36px;
    }

    h4 {
        font-size: 24px;
        line-height: 30px;
    }

    h5 {
        font-size: 18px;
        line-height: 24px;
    }

    h6 {
        font-size: 14px;
        line-height: 18px;
        text-align: right;
    }

    p {
        margin-bottom: 20px;
    }

    .section {
        padding: 70px 0;
        position: relative;
    }
</style>
<style>
    .scene {
        width: 100%;
        height: auto;
        perspective: 600px;
    }

    .card {
        position: relative;
        width: 100%;
        height: 100%;
        cursor: pointer;
        transform-style: preserve-3d;
        transform-origin: center right;
        transition: transform 1s;
    }

    .card.is-flipped {
        transform: translateX(-100%) rotateY(-180deg);
    }

    .card__face {
        position: fixed;
        width: 100%;
        height: 100%;
        text-align: center;
        font-weight: bold;
        font-size: 40px;
        backface-visibility: hidden;
    }

    .card__face--front {
        /* background: red;*/
    }

    .card__face--back {
        transform: rotateY(180deg);
    }
</style>
<style>
    .profile-user-img {
        margin: 0 auto;
        width: 100px;
        padding: 3px;
        border: 3px solid #d2d6de;
    }
</style>

<?php
$this->load->view('admin/maham_mowazf_view/basic_data/nav_links');
?>

<div class="col-sm-12 no-padding ">
    <div class="panel panel-default ">
        <div class="panel-heading">
            <h4> تعديل البروفيل </h4>
        </div>
        <div class="panel-body">
            <?php echo form_open_multipart(base_url() . 'maham_mowazf/basic_data/Maham/edit_profile') ?>
            <div class="col-md-9 padding-4">
                <div class="form-group col-md-3 col-sm-6 padding-4">
                    <label class="label">اسم المستخدم </label>
                    <input type="text" name="user_username" id="user_username"
                           value="<?php echo $user_data['user_username']; ?>"
                           class="form-control "  data-validation-has-keyup-event="true">
                </div>
                <div class="form-group col-md-3 col-sm-6 padding-4">
                    <label class="label">صورة المستخدم </label>
                    <input type="file" accept="image/*" name="emp_photo" id="emp_photo"
                           value="<?php echo $user_data['emp_photo']; ?>"
                           style="width: 80%;float: right"
                           class="form-control "  data-validation-has-keyup-event="true">
                    <?php if (!empty($user_data['emp_photo'])) { ?>
                        <button type="button" data-toggle="modal" data-target="#Modal_user"
                                onclick="set_image('<?php echo base_url() . "uploads/human_resources/emp_photo/" . $user_data['emp_photo'] ?>')"
                                class="btn btn-success btn-next" style="float: left;">
                            <i class="fa fa-eye"></i></button>
                    <?php } ?>
                </div>
                <div class="form-group col-md-3 col-sm-6 padding-4">
                    <label class="label">صورة التوقيع </label>
                    <input type="file" accept="image/*" name="emp_sign" id="emp_sign"
                           value="<?php echo $user_data['emp_sign']; ?>"
                           style="width: 80%;float: right "
                           class="form-control "  data-validation-has-keyup-event="true">
                    <?php if (!empty($user_data['emp_sign'])) { ?>
                        <button type="button" data-toggle="modal" data-target="#Modal_user"
                                onclick="set_image('<?php echo base_url() . "uploads/human_resources/emp_sign/" . $user_data['emp_sign'] ?>')"
                                class="btn btn-success btn-next" style="float: left;">
                            <i class="fa fa-eye"></i></button>
                    <?php } ?>
                </div>


                <div class="form-group col-md-3 col-sm-4 col-xs-12"><label class="label "> كلمة المرور
                        <strong></strong> </label>
                    <input type="password" id="user_pass" class="form-control " name="user_pass"
                           onkeyup="return valid('validate1','user_pass','save_btn');"
                           autocomplete="off" placeholder=" كلمه المرور "/>
                    <span id="validate1" class="span-validation"></span>
                </div>
                <div class="form-group col-md-3 col-sm-4 col-xs-12"><label class="label ">تاكيد كلمة المرور
                        <strong></strong> </label>
                    <input type="password" id="user_pass_validate" class="form-control " placeholder="تأكيد كلمة المرور"
                           onkeyup="return valid2('validate','user_pass_validate','save_btn','user_pass');"/>
                    <span id="validate" class="span-validation"> </span></div>


                <div class="col-md-12  text-center">
                    <button type="submit" class="btn btn-labeled btn-success " id="save_btn" name="add"
                            value="حفظ">
                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                    </button>
                </div>
            </div>
            <?php echo form_close() ?>

            <div class="col-md-3 padding-4">
                <?php $this->load->view('admin/maham_mowazf_view/basic_data/profile_parts/card') ?>

            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="Modal_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog " style="width: 80%" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel_header"></h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="  col-xs-12 no-padding">

                        <img id="user_img" src="">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function valid(div1, div2, button) {
        if ($("#" + div2).val().length < 4) {
            document.getElementById(div1).style.color = '#F00';
            document.getElementById(div1).innerHTML = 'كلمة المرور اكثر من اربع حروف';
            document.getElementById(button).setAttribute("disabled", "disabled");
        }
        if ($("#" + div2).val().length > 4 && $("#user_pass").val().length < 10) {
            document.getElementById(div1).style.color = '#F00';
            document.getElementById(div1).innerHTML = 'كلمة المرور ضعيفة';
            document.getElementById(button).removeAttribute("disabled", "disabled");
        }
        if ($("#" + div2).val().length > 10) {
            document.getElementById(div1).style.color = '#00FF00';
            document.getElementById(div1).innerHTML = 'كلمة المرور قوية';
            document.getElementById(button).removeAttribute("disabled", "disabled");
        }
    }

    function valid2(div2, div3, button, input) {
        if ($("#" + input).val() == $("#" + div3).val()) {
            document.getElementById(div2).style.color = '#00FF00';
            document.getElementById(div2).innerHTML = 'كلمة المرور متطابقة';
            document.getElementById(button).removeAttribute("disabled", "disabled");
        } else {
            document.getElementById(div2).style.color = '#F00';
            document.getElementById(div2).innerHTML = 'كلمة المرور غير متطابقة';
            document.getElementById(button).setAttribute("disabled", "disabled");
        }
    }
</script>
<script>
    function set_image(img_src) {
        $('#user_img').attr('src', img_src);
    }

</script>