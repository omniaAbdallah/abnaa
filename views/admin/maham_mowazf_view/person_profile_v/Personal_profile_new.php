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

    .media .panel-title a:before, .media .panel-title a.collapsed:before, .media .panel-title a:after, .media .panel-title a.collapsed:after {
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

    .media .panel-title a:after, .media .panel-title a.collapsed:after {
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

    .media .panel-body { /* padding: 10px 10px; */
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
        font-size: 16px;
        margin: 15px;
    }

    .profile-activity img {
        border: 2px solid #C9D6E5;
        border-radius: 100%; /* max-width: 40px; */
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
    }</style>
<div class="col-xs-12 all_cont">
    <div class="col-lg-12 col-md-5 col-sm-8 col-xs-9 bhoechie-tab-container">
        <div class="col-lg-12 col-md-12   bhoechie-tab">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr class="table-active">
                        <th scope="col"> #</th>
                        <th scope="col"> تقديم طلب</th>
                        <th scope="col"> طلباتي</th>
                        <th scope="col"> متابعة الطلبات</th>
                        <th scope="col"> الطلباتى الواردة</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td scope="row"> الاجازة</td>
                        <td><a data-toggle="modal" onclick="get_agaza()" data-target="#ezn_Modal"
                               class="btn btn-default btn-labeled"><span class="btn-label1"><i
                                            class="fa fa-plus-square"></i></span>
                                تقديم طلب </a></td>
                        <td><a data-toggle="modal" onclick="get_agaza_tab('mine_1','طلباتي')" data-target="#ezn_Modal"
                               class="btn btn-default btn-labeled"><span
                                        class="btn-label1"><i class="fa fa-user"
                                                              aria-hidden="true"></i></span><?php if (!empty($user_orders)) {
                                    echo count($user_orders);
                                } else {
                                    echo 0;
                                } ?></a></td>
                        <td><a data-toggle="modal" onclick="get_agaza_tab('follow_1','متابعة طلباتي')"
                               data-target="#ezn_Modal" class="btn btn-default btn-labeled"><span class="btn-label1"><i
                                            class="fa fa-history"
                                            aria-hidden="true"></i></span><?php if (!empty($user_orders)) {
                                    echo count($user_orders);
                                } else {
                                    echo 0;
                                } ?></a></td>
                        <td><a data-toggle="modal" onclick="get_agaza_tab('comming_1','الوارد')"
                               data-target="#ezn_Modal" class="btn btn-default btn-labeled"><span class="btn-label1"><i
                                            class="fa fa-bell"
                                            aria-hidden="true"></i></span><?php if (!empty($coming_records)) {
                                    echo count($coming_records);
                                } else {
                                    echo 0;
                                } ?></a></td>
                    </tr>
                    <tr>
                        <td scope="row"> الاذن</td>
                        <td><a data-toggle="modal" onclick="get_ezn()" data-target="#ezn_Modal"
                               class="btn btn-default btn-labeled"><span class="btn-label1"><i
                                            class="fa fa-plus-square"></i></span>
                                تقديم طلب</a></td>
                        <td><a data-toggle="modal" onclick="get_ezen_tab(1,'طلباتي')" data-target="#ezn_Modal"
                               class="btn btn-default btn-labeled"><span
                                        class="btn-label1"><i class="fa fa-user"
                                                              aria-hidden="true"></i></span><?php if (!empty($ozonat_records)) {
                                    echo count($ozonat_records);
                                } else {
                                    echo 0;
                                } ?></a></td>
                        <td><a data-toggle="modal" onclick="get_ezen_tab(2,'متابعة طلباتي')"
                               data-target="#ezn_Modal" class="btn btn-default btn-labeled"><span class="btn-label1"><i
                                            class="fa fa-history"
                                            aria-hidden="true"></i></span><?php if (!empty($ozonat_records)) {
                                    echo count($ozonat_records);
                                } else {
                                    echo 0;
                                } ?></a></td>
                        <td><a data-toggle="modal" onclick="get_ezen_tab(3,'الوارد')"
                               data-target="#ezn_Modal" class="btn btn-default btn-labeled"><span class="btn-label1"><i
                                            class="fa fa-bell"
                                            aria-hidden="true"></i></span><?php if (!empty($ozonat_coming)) {
                                    echo count($ozonat_coming);
                                } else {
                                    echo 0;
                                } ?></a></td>
                    </tr>
                    <tr>
                        <td scope="row"> السلف</td>
                        <td><a data-toggle="modal" onclick="get_solaf()" data-target="#ezn_Modal"
                               class="btn btn-default btn-labeled"><span class="btn-label1"><i
                                            class="fa fa-plus-square"></i></span>
                                تقديم طلب</a></td>
                        <td><a data-toggle="modal" onclick="get_solaf_tab('mine_1','طلباتي')" data-target="#ezn_Modal"
                               class="btn btn-default btn-labeled"><span
                                        class="btn-label1"><i class="fa fa-user"
                                                              aria-hidden="true"></i></span><?php if (!empty($user_solaf_orders)) {
                                    echo count($user_solaf_orders);
                                } else {
                                    echo 0;
                                } ?></a></td>
                        <td><a data-toggle="modal" onclick="get_solaf_tab('follow_1','متابعة طلباتي')"
                               data-target="#ezn_Modal" class="btn btn-default btn-labeled"><span class="btn-label1"><i
                                            class="fa fa-history"
                                            aria-hidden="true"></i></span><?php if (!empty($user_solaf_orders)) {
                                    echo count($user_solaf_orders);
                                } else {
                                    echo 0;
                                } ?></a></td>
                        <td><a data-toggle="modal" onclick="get_solaf_tab('comming_1','الوارد')"
                               data-target="#ezn_Modal" class="btn btn-default btn-labeled"><span class="btn-label1"><i
                                            class="fa fa-bell"
                                            aria-hidden="true"></i></span><?php if (!empty($coming_solaf_records)) {
                                    echo count($coming_solaf_records);
                                } else {
                                    echo 0;
                                } ?></a></td>
                    </tr>
                    <tr>
                        <td scope="row"> تأجيل السلفة</td>
                        <td><a data-toggle="modal" onclick="tagel_solaf()" data-target="#ezn_Modal"
                               class="btn btn-default btn-labeled"><span class="btn-label1"><i
                                            class="fa fa-plus-square"></i></span>
                                تقديم طلب</a></td>
                        <td><a data-toggle="modal" onclick="get_solaf_tagel_tab('mine_1','طلباتي')"
                               data-target="#ezn_Modal"
                               class="btn btn-default btn-labeled"><span
                                        class="btn-label1"><i class="fa fa-user"
                                                              aria-hidden="true"></i></span><?php if (!empty($user_orders_tagel)) {
                                    echo count($user_orders_tagel);
                                } else {
                                    echo 0;
                                } ?></a></td>
                        <td><a data-toggle="modal" onclick="get_solaf_tagel_tab('follow_1','متابعة طلباتي')"
                               data-target="#ezn_Modal" class="btn btn-default btn-labeled"><span class="btn-label1"><i
                                            class="fa fa-history"
                                            aria-hidden="true"></i></span><?php if (!empty($user_orders_tagel)) {
                                    echo count($user_orders_tagel);
                                } else {
                                    echo 0;
                                } ?></a></td>
                        <td><a data-toggle="modal" onclick="get_solaf_tagel_tab('comming_1','الوارد')"
                               data-target="#ezn_Modal" class="btn btn-default btn-labeled"><span class="btn-label1"><i
                                            class="fa fa-bell"
                                            aria-hidden="true"></i></span><?php if (!empty($coming_records_tagel)) {
                                    echo count($coming_records_tagel);
                                } else {
                                    echo 0;
                                } ?></a></td>
                    </tr>
                    <tr>
                        <td scope="row"> تعجيل السلف</td>
                        <td><a data-toggle="modal" onclick="ta3gel_solaf()" data-target="#ezn_Modal"
                               class="btn btn-default btn-labeled"><span class="btn-label1"><i
                                            class="fa fa-plus-square"></i></span>
                                تقديم طلب</a></td>
                        <td><a data-toggle="modal" onclick="get_solaf_ta3gel_tab('mine_1','طلباتي')"
                               data-target="#ezn_Modal"
                               class="btn btn-default btn-labeled"><span
                                        class="btn-label1"><i class="fa fa-user"
                                                              aria-hidden="true"></i></span><?php if (!empty($user_orders_ta3gel)) {
                                    echo count($user_orders_ta3gel);
                                } else {
                                    echo 0;
                                } ?></a></td>
                        <td><a data-toggle="modal" onclick="get_solaf_ta3gel_tab('follow_1','متابعة طلباتي')"
                               data-target="#ezn_Modal" class="btn btn-default btn-labeled"><span class="btn-label1"><i
                                            class="fa fa-history"
                                            aria-hidden="true"></i></span><?php if (!empty($user_orders_ta3gel)) {
                                    echo count($user_orders_ta3gel);
                                } else {
                                    echo 0;
                                } ?></a></td>
                        <td><a data-toggle="modal" onclick="get_solaf_ta3gel_tab('comming_1','الوارد')"
                               data-target="#ezn_Modal" class="btn btn-default btn-labeled"><span class="btn-label1"><i
                                            class="fa fa-bell"
                                            aria-hidden="true"></i></span><?php if (!empty($coming_records_ta3gel)) {
                                    echo count($coming_records_ta3gel);
                                } else {
                                    echo 0;
                                } ?></a></td>
                    </tr>
                    <tr>
                        <td scope="row"> تغيير الحساب البنكي</td>
                        <td>


                            <a data-toggle="modal" onclick="make_change_bank()" data-target="#ezn_Modal"
                               class="btn btn-default btn-labeled"><span class="btn-label1"><i
                                            class="fa fa-plus-square"></i></span>
                                تقديم طلب</a>
                        </td>
                        <td>
                            <a href="#" data-toggle="modal"
                               onclick="get_banks_tab('mine_1','طلباتي')"
                               data-target="#ezn_Modal" class="btn btn-default btn-labeled">
<span
        class="btn-label1"><i class="fa fa-user" aria-hidden="true"></i></span><?php if (!empty($user_orders_banks)) {
                                    echo count($user_orders_banks);
                                } else {
                                    echo 0;
                                } ?>
                            </a>
                        </td>
                        <td></td>
                        <td>
                            <a href="#" data-toggle="modal"

                               onclick="get_banks_tab('comming_1','الوارد')"

                               data-target="#ezn_Modal"
                               class="btn btn-default btn-labeled"
                            >

                                <span class="btn-label1"><i class="fa fa-bell"
                                                            aria-hidden="true"></i></span><?php if (!empty($coming_records_banks)) {

                                    echo count($coming_records_banks);

                                } else {

                                    echo 0;

                                } ?>

                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td scope="row"> المسير</td>
                        <td></td>
                        <td>
                            <a href="#" data-toggle="modal"

                               onclick="get_salaries_tab('mine_1','طلباتي')"

                               data-target="#ezn_Modal" class="btn btn-default btn-labeled">

                                <span class="btn-label1"><i class="fa fa-user"
                                                            aria-hidden="true"></i></span><?php if (!empty($user_mosayer_orders)) {

                                    echo count($user_mosayer_orders);

                                } else {

                                    echo 0;

                                } ?>
                            </a>
                        </td>
                        <td>
                            <a href="#" data-toggle="modal"
                               onclick="get_salaries_tab('follow_1','متابعة طلباتي')"
                               data-target="#ezn_Modal"
                               class="btn btn-default btn-labeled">
                                <span class="btn-label1"><i class="fa fa-history"
                                                            aria-hidden="true"></i></span><?php if (!empty($user_mosayer_orders)) {

                                    echo count($user_mosayer_orders);

                                } else {

                                    echo 0;

                                } ?>
                            </a>

                        </td>
                        <td>
                            <a href="#" data-toggle="modal"

                               onclick="get_salaries_tab('comming_1','الوارد')"

                               data-target="#ezn_Modal"

                               class="btn btn-default btn-labeled">

                                <span class="btn-label1"><i class="fa fa-bell"
                                                            aria-hidden="true"></i></span><?php if (!empty($coming_mosayer_records)) {

                                    echo count($coming_mosayer_records);

                                } else {

                                    echo 0;

                                } ?>
                            </a></td>
                    </tr>
                    <!--  -->
                    <tr>
                        <td scope="row"> تحويلات الحسابات</td>
                        <td></td>
                        <td>
                            <a href="#" data-toggle="modal" onclick="get_accounts_tab('mine_1','طلباتي')"
                               data-target="#ezn_Modal" class="btn btn-default btn-labeled"> <span class="btn-label1"><i
                                            class="fa fa-user"
                                            aria-hidden="true"></i></span><?php if (!empty($user_accounts_orders)) {
                                    echo count($user_accounts_orders);
                                } else {
                                    echo 0;
                                } ?>
                            </a></td>
                        <td>

                        </td>
                        <td>
                            <a href="#" data-toggle="modal" onclick="get_accounts_tab('comming_1','الوارد')"
                               data-target="#ezn_Modal" class="btn btn-default btn-labeled"> <span class="btn-label1"><i
                                            class="fa fa-bell"
                                            aria-hidden="true"></i></span><?php if (!empty($coming_accounts_records)) {
                                    echo count($coming_accounts_records);
                                } else {
                                    echo 0;
                                } ?></a>
                        </td>
                    </tr>
                    <!--  -->
                    <tr>
                        <td scope="row"> ساعات التطوع</td>
                        <td><a data-toggle="modal" onclick="get_Volunteer_hours()" data-target="#ezn_Modal"
                               class="btn btn-default btn-labeled"><span class="btn-label1"><i
                                            class="fa fa-plus-square"></i></span>

                                تقديم طلب</a></td>
                        <td>
                            <a href="#" data-toggle="modal" onclick="get_volunteer_hours_tab('1','طلباتي')"
                               data-target="#ezn_Modal" class="btn btn-default btn-labeled"> <span class="btn-label1"><i
                                            class="fa fa-user"
                                            aria-hidden="true"></i></span><?php if (!empty($mandate_records)) {
                                    echo count($mandate_records);
                                } else {
                                    echo 0;
                                } ?>
                            </a></td>
                        <td>


                            <a href="#" data-toggle="modal" onclick="get_volunteer_hours_tab('2','متابعة طلباتي')"
                               data-target="#ezn_Modal" class="btn btn-default btn-labeled"> <span class="btn-label1"><i
                                            class="fa fa-history"
                                            aria-hidden="true"></i></span><?php if (!empty($mandate_records)) {
                                    echo count($mandate_records);
                                } else {
                                    echo 0;
                                } ?>
                            </a>
                        </td>
                        <td>
                            <a href="#" data-toggle="modal" onclick="get_volunteer_hours_tab('3','الوارد')"
                               data-target="#ezn_Modal" class="btn btn-default btn-labeled"> <span class="btn-label1"><i
                                            class="fa fa-bell"
                                            aria-hidden="true"></i></span><?php if (!empty($mandate_coming)) {
                                    echo count($mandate_coming);
                                } else {
                                    echo 0;
                                } ?></a>
                        </td>
                    </tr>
                    <!--  -->
                    <tr>
                        <td scope="row"> الشئون المالية</td>
                        <td></td>
                        <td>
                        </td>
                        <td>


                        </td>
                        <td>
                            <a href="#" data-toggle="modal" onclick="get_sadad_fatora(1,'طالبات تسديد فواتير')"
                               data-target="#ezn_Modal" class="btn btn-default btn-labeled"> <span class="btn-label1"><i
                                            class="fa fa-user"
                                            aria-hidden="true"></i></span><?php if (!empty($sadad_fatora)) {
                                    echo count($sadad_fatora);
                                } else {
                                    echo 0;
                                } ?>
                            </a>
                        </td>
                    </tr>
                    <!--  -->
                    <tr>
                        <td scope="row"> التكليف الاضافي</td>
                        <td><a data-toggle="modal" onclick="get_Overtime_hours_orders()" data-target="#ezn_Modal"
                               class="btn btn-default btn-labeled"><span class="btn-label1"><i
                                            class="fa fa-plus-square"></i></span>
                                تقديم طلب</a></td>
                        <td>
                        </td>
                        <td>


                        </td>
                        <td>
                            <a href="#" data-toggle="modal" onclick="get_over_time_emp(1,'طالبات  تكليف الاضافي')"
                               data-target="#ezn_Modal" class="btn btn-default btn-labeled"> <span class="btn-label1"><i
                                            class="fa fa-user"
                                            aria-hidden="true"></i></span><?php if (!empty($sadad_fatora)) {
                                    echo count($sadad_fatora);
                                } else {
                                    echo 0;
                                } ?>
                            </a>
                        </td>
                    </tr>
                    <!--  -->
                    <tr>
                        <td scope="row">طلب إحتياج وظيفة</td>
                        <td>
                            <a data-toggle="modal" onclick="get_Job_request()" data-target="#ezn_Modal"
                               class="btn btn-default btn-labeled"><span class="btn-label1"><i
                                            class="fa fa-plus-square"></i></span>
                                تقديم طلب</a></td>
                        <td>
                        </td>
                        <td>


                        </td>
                        <td>

                        </td>
                    </tr>
                    <!--  -->
                    <tr>
                        <td scope="row">إخلاء طرف</td>
                        <td>
                            <a data-toggle="modal" onclick="get_Disclaimer()" data-target="#ezn_Modal"
                               class="btn btn-default btn-labeled"><span class="btn-label1"><i
                                            class="fa fa-plus-square"></i></span>
                                تقديم طلب</a></td>
                        <td>
                        </td>
                        <td>


                        </td>
                        <td>

                        </td>
                    </tr>
                    <!--  -->
                    <tr>
                        <td scope="row">نموذج
                            تعريف موظف
                        </td>
                        <td>
                            <a data-toggle="modal" onclick=" get_details_namozag();" data-target="#ezn_Modal"
                               class="btn btn-default btn-labeled"><span class="btn-label1"><i
                                            class="fa fa-plus-square"></i></span>
                                تقديم طلب</a></td>
                        <td>
                        </td>
                        <td>


                        </td>
                        <td>

                        </td>
                    </tr>

                    <!--  -->
                    <tr>
                        <td scope="row"> طلب إنتداب</td>
                        <td>
                            <a href="<?= base_url() ?>/human_resources/employee_forms/Mandate_orders"
                               class="btn btn-default btn-labeled"><span class="btn-label1"><i
                                            class="fa fa-plus-square"></i></span>
                                تقديم طلب</a>
                        </td>
                        <td>


                            <a href="<?= base_url() ?>/human_resources/employee_forms/Mandate_orders/all_talabat_entdab"
                               class="btn btn-default btn-labeled"> <span class="btn-label1"><i
                                            class="fa fa-history"></i>
                              
                            </span>
                                متابعة طلبات الإنتداب </a>
                        </td>

                        <td>

                        </td>
                        <td>

                        </td>
                    </tr>
                    <!--  -->
                    <tr>
                        <td scope="row"> إذن صرف</td>
                        <td>
                            <a href="<?= base_url() ?>/finance_accounting/box/ezn_sarf/Ezn_sarf/addEzn"
                               class="btn btn-default btn-labeled"><span class="btn-label1"><i
                                            class="fa fa-plus-square"></i></span>
                                تقديم طلب</a>
                        </td>
                        <td>


                            <a href="<?= base_url() ?>/finance_accounting/box/ezn_sarf/Ezn_sarf/all_ozonat_sarf_transformed"
                               class="btn btn-default btn-labeled"><span class="btn-label1"><i
                                            class="fa fa-history"></i></span>
                                متابعة أذونات الصرف الواردة</a>
                        </td>

                        <td>

                        </td>
                        <td>

                        </td>
                    </tr>
                    <tr>
                        <td scope="row"> إضافة الصفحات المفضلة</td>
                        <td>
                            <a data-toggle="modal" onclick="get_fav_emp();" data-target="#ezn_Modal"
                               class="btn btn-default btn-labeled"><span class="btn-label1"><i class="fa fa-plus-square"></i></span>
                                إضافة الصفحات المفضلة</a></td>
                        <td>

                        </td>
                        <td>

                        </td>
                        <td>

                        </td>
                    </tr>
                    <!--  -->
                    </tbody>
                </table>
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
<script>
    function get_fav_emp() {
        $('#modal_header').text(' إضافة  الصفحات المفضلة');
        $.ajax({
            type: 'post',

            url: "<?php echo base_url();?>human_resources/fav_emp/Fav_emp_c/add_fav_page",
            data: {from_profile: 1},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $.validate({
                    validateHiddenInputs: true // for live search required
                });
            }
        });
    }
</script>
<script>
    function get_ezn() {
        $('#modal_header').text('طلب الأذن');
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/all_ozonat/Ezn_order",
            data: {from_profile: 1},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $.validate({validateHiddenInputs: true});
                /*  var oTable_usergroup = $('#js_table_ozonat').DataTable({                      dom: 'Bfrtip',                      ajax: {                          type: 'post',                          url: "<?php echo base_url(); ?>human_resources/employee_forms/all_ozonat/Ezn_order/display_data",                        data: {                            from_profile: 1                        }                    },                    aoColumns: [                        {"bSortable": true},                        {"bSortable": true},                        {"bSortable": true},                        {"bSortable": true},                        {"bSortable": true},                        {"bSortable": true},                        {"bSortable": true},                        {"bSortable": true},                        {"bSortable": true},                    ],                    buttons: [                        'pageLength',                        'copy',                        'excelHtml5',                        {                            extend: "pdfHtml5",                            orientation: 'landscape'                        },                        {                            extend: 'print',                            exportOptions: {columns: ':visible'},                            orientation: 'landscape'                        },                        'colvis'                    ],                    colReorder: true,                    scrollX: true                });*/
            }
        });
    }

    function set_time() {
        $('#from_time').mdtimepicker();
        $('#to_time').mdtimepicker();
    }

    function get_agaza() {
        $('#modal_header').text('طلب اجازة');
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/all_agazat/all_orders/Vacation/add_vacation",
            data: {from_profile: 1},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $.validate({validateHiddenInputs: true});
                console.log('profile agaza ezn_order ');
            }
        });
    }

    function get_solaf() {
        $('#modal_header').text('طلب سلفة');
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/solaf/Solaf/add_solaf",
            data: {from_profile: 1},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $.validate({validateHiddenInputs: true});
            }
        });
    }

    function edit_solaf(id) {
        $('#modal_header').text('تعديل طلب سلفة ');
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/solaf/Solaf/edit_solaf",
            data: {id: id, from_profile: 1},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $.validate({validateHiddenInputs: true});
            }
        });
    }

    function edite_agaza(id) {
        $('#modal_header').text('تعديل طلب الاجازة');
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/all_agazat/all_orders/Vacation/edit_vacation",
            data: {id: id, from_profile: 1},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $.validate({validateHiddenInputs: true});
            }
        });
    }

    function edite_ezn(id) {
        $('#modal_header').text('تعديل طلب الأذن');
        $.ajax({
            type: 'post',
            url: "<?php echo base_url(); ?>human_resources/employee_forms/all_ozonat/Ezn_order/Upadte_eznn",
            data: {id: id, from_profile: 1},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $.validate({validateHiddenInputs: true});
                var oTable_usergroup = $('#js_table_ozonat').DataTable({
                    dom: 'Bfrtip',
                    ajax: {
                        type: 'post',
                        url: "<?php echo base_url();?>human_resources/employee_forms/all_ozonat/Ezn_order/display_data",
                        data: {from_profile: 1}
                    },
                    aoColumns: [{"bSortable": true}, {"bSortable": true}, {"bSortable": true}, {"bSortable": true}, {"bSortable": true}, {"bSortable": true}, {"bSortable": true}],
                    buttons: ['pageLength', 'copy', 'excelHtml5', {
                        extend: "pdfHtml5",
                        orientation: 'landscape'
                    }, {extend: 'print', exportOptions: {columns: ':visible'}, orientation: 'landscape'}, 'colvis'],
                    colReorder: true
                });
                set_time();
            }
        });
    }

    /*15-9-20-om*/
    function tagel_solaf() {
        $('#modal_header').text('طلب تأجيل سلفة');
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/solaf/Solaf/tagel_solaf",
            data: {from_profile: 1},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $.validate({
                    validateHiddenInputs: true
                });
            }
        });
    }

    function edit_tagel_solaf(id) {
        $('#modal_header').text('تعديل طلب تأجيل سلفة ');
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/solaf/Solaf/edit_tagel_solaf",
            data: {id: id, from_profile: 1},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $.validate({validateHiddenInputs: true});
            }
        });
    }</script>
<script>
    function ta3gel_solaf() {
        $('#modal_header').text('طلب تعجيل سلفة');
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/solaf/Solaf/ta3gel_solaf",
            data: {from_profile: 1},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $.validate({
                    validateHiddenInputs: true
                });
            }
        });
    }

    function edit_ta3gel_solaf(id) {
        $('#modal_header').text('تعديل طلب تعجيل سلفة ');
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/solaf/Solaf/edit_ta3gel_solaf",
            data: {id: id, from_profile: 1},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $.validate({
                    validateHiddenInputs: true
                });
            }
        });
    }
</script>
<script>


    function get_lft_tab(tab_id, text) {
        $('#modal_header').text(text);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/lft_nzr_emp/Transformation/get_orders",
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


    function get_gezza_tab(tab_id, text) {
        $('#modal_header').text(text);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/gezaat_emp/Transformation/get_orders",
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


    function get_ohad_tab(tab_id, text) {
        $('#modal_header').text(text);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/ohda_emp/Transformation/get_orders",
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
    function make_change_bank() {
        $('#modal_header').text('طلب تغير حساب البنكي');
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/emp_banks/Emp_banks_c/make_change_bank",
            data: {from_profile: 1},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $.validate({
                    validateHiddenInputs: true // for live search required
                });
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

    function get_Overtime_hours_orders() {
        $('#modal_header').text('طلب تكليف إضافى');
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/overtime_hours/Overtime_hours_orders/add_overtime_hours_orders",
            data: {from_profile: 1},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $.validate({
                    validateHiddenInputs: true // for live search required
                });
            }
        });
    }

    function get_Volunteer_hours() {
        $('#modal_header').text('طلب ساعات التطوع');
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/Volunteer_hours/add_volunteer_hours",
            data: {from_profile: 1},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $.validate({
                    validateHiddenInputs: true // for live search required
                });
            }
        });
    }

    function get_Job_request() {
        $('#modal_header').text('طلب احتياج وظيفة');
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/job_requests/Job_request",
            data: {from_profile: 1},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $.validate({
                    validateHiddenInputs: true // for live search required
                });
                var oTable_usergroup = $('#js_table').DataTable({
                    dom: 'Bfrtip',
                    ajax: {
                        type: 'post',
                        url: "<?php echo base_url(); ?>human_resources/employee_forms/job_requests/Job_request/display_data",
                        data: {from_profile: 1}
                    },
                    aoColumns: [
                        {"bSortable": true},
                        {"bSortable": true},
                        {"bSortable": true},
                        {"bSortable": true},
                        {"bSortable": true}
                    ],
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
                            exportOptions: {columns: ':visible'},
                            orientation: 'landscape'
                        },
                        'colvis'
                    ],
                    colReorder: true
                });
            }
        });
    }

    function get_Disclaimer() {
        $('#modal_header').text('إخلاء طرف');
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/Disclaimer/addDisclaimer",
            data: {from_profile: 1},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $.validate({
                    validateHiddenInputs: true // for live search required
                });
//console.log('profile get_Job_request');
            }
        });
    }
</script>
<script>
    function get_details_namozag() {
        $('#modal_header').text('نموذج تعريف موظف');
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>maham_mowazf/talabat/namazegs/Namazeg/change_namozag",
            data: {from_profile: 1},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $.validate({
                    validateHiddenInputs: true // for live search required
                });
            }
        });
    }
</script>