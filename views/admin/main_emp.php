<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/newstyle.css">
<section class="categories-icon   section-padding   content">
    <div class="container-fluid">
        <div class="row">
            <?php if (isset($fav_pages) && !empty($fav_pages)) { ?>
                <div class="col-md-12">
                    <!-- Profile Image -->
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Application buttons -->
                            <div class="card">
                                <div class="card-header bg-maroon">

                                    <h3 class="card-title"><i class="fas fa-heart"></i> الصفحات المفضلة</h3>
                                </div>
                                <div class="card-body">
                                    <?php if (isset($fav_pages) && !empty($fav_pages)) {
                                        foreach ($fav_pages as $row) {
                                            ?>
                                            <a class="btn btn-app " style="min-width: 80px; background-color:<?= $row->bg_color ?>"
                                               href="<?= base_url() . $row->page_link ?>">

                                                <i class="<?= $row->page_icon ?>"></i>
                                                <?= $row->page_title ?>
                                            </a>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <?php
            }
            ?>
            <div class="col-md-12 paddingg">
                <div class="card">
                    <!------------------------------------------------تعديل ----->
                    <div class="card-header border-transparent" style="padding: .0rem 1.25rem;">
                        <div style="width: 100%;">
                            <!------------------------------------------------تعديل ----->
                            <marquee scrollamount="8" direction="right" style="font-size: 16px;padding-top: 8px;">
                                <?php
                                /*print_r($all_da3wat_t3mem);*/
                                if (isset($all_da3wat_t3mem) && !empty($all_da3wat_t3mem)) {
                                    foreach ($all_da3wat_t3mem as $row) {
                                        ?>
                                        &nbsp; &nbsp; &nbsp;
                                        <?php if (!empty($row->basic_data)) echo $row->basic_data->ta3mem_title ;
                                        else
                                            echo ' ';
                                        ?>
                                        &nbsp; &nbsp; &nbsp;
                                    <?php }
                                } ?>
                            </marquee>
                            <span class="span_marquee "> تعميم  </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                     src="<?= base_url() ?>/uploads/human_resources/emp_photo/thumbs/<?php echo $basic_data->personal_photo; ?>"
                                     alt="User profile picture">
                            </div>
                            <h3 class="profile-username text-center"><?php echo $basic_data->employee; ?></h3>
                            <p class="text-muted text-center"><?php echo $basic_data->mosma_wazefy_n; ?></p>
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>راتب الشهري الحالي</b> <a
                                            class="float-right" data-toggle="modal" data-target="#myModal"
                                            onclick="get_ratb()"><?= ($basic_data->get_having_value - $basic_data->get_discut_value) ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>تفاصيل الرواتب</b> <a class="float-right" data-toggle="modal"
                                                             data-target="#myModal" onclick="get_tafsel_ratb()">اضغط
                                        هنا</a>
                                </li>
                                <li class="list-group-item">
                                    <b>السلف</b> <a class="float-right" data-toggle="modal" data-target="#myModal"
                                                    onclick="get_all_solaf()">اضغط هنا</a>
                                </li>
                            </ul>
                            <a href="<?= base_url() . "User/update_user" ?>"
                               class="btn btn-success btn-block"><b>تعديل البيانات الشخصية</b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-lg-4 col-6">
                            <!-- small card -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3 id="all_tlabat_gary">0<sup style="font-size: 20px">%</sup></h3>
                                    <!--                        <p> المهام الجارية </p>-->
                                    <p>الطلبات المعلقة</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-tasks" aria-hidden="true"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    معاينة التفاصيل <i class="fas fa-arrow-circle-left"></i>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-4 col-6">
                            <!-- small card -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <!-- <h3>44</h3>
                                     <p> الرسائل الجديدة </p>-->
                                    <h3 id="all_tlabat_accept">0</h3>
                                    <p>الطلبات المقبولة</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    معاينة التفاصيل <i class="fas fa-arrow-circle-left"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-6">
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3 id="all_tlabat_refuce">0</h3>
                                    <p>الطلبات المرفوضة</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-bell " aria-hidden="true"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    معاينة التفاصيل <i class="fas fa-arrow-circle-left"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 paddingg">
                            <div class="card card-widget widget-user">
                                <div class="widget-user-header bg-maroon">
                                    <h3 class="widget-user-username">الحضور اليوم</h3>
                                </div>
                                <div class="card-footer" style="background-color:#fff">
                                    <div class="row">
                                        <div class="col-sm-6 border-right">
                                            <div class="description-block">
                                                <h5 class="description-header" style="color: #206dfb;"> تاريخ اليوم</h5>
                                                <span class="description-text"> <p class=" m-0"
                                                                                   style="font-size: 15px;color:#5a5959"> <i
                                                                class="fa fa-calendar"></i>
<span id="today">19/04/2021 م</span> </p></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 border-right">
                                            <div class="description-block">
                                                <h5 class="description-header" style="color: #206dfb;"> الوقت الان</h5>
                                                <span class="description-text"><p class="m-0"
                                                                                  style="font-size: 15px;color:#5a5959"><i
                                                                class="fas fa-clock" aria-hidden="true"></i>
<span id="MyClockDisplay">12:56:55  </span> </p></span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12  ">
                                            <div class="description-block">
                                                <span class="label label-danger">متأخر مدة 14 دقيقة</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 paddingg">
                            <div class="card card-widget widget-user">
                                <div class="widget-user-header bg-maroon">
                                    <h3 class="widget-user-username">أرصدة الموطف</h3>
                                </div>
                                <div id="agzat_id">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <!-- Profile Image -->
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Application buttons -->
                            <div class="card">
                                <div class="card-header bg-maroon">
                                    <h3 class="card-title">جميع الطلبات الواردة</h3>
                                </div>
                                <div class="card-body">
                                    <a href="<?=base_url().'maham_mowazf/person_profile/Personal_profile'?>" class="btn btn-app bg-success">
                                        <span class="badge bg-danger" id="agazat_new">300</span>
                                        <i class="fas fa-barcode"></i> الأجازات
                                    </a>
                                    <a href="<?=base_url().'maham_mowazf/person_profile/Personal_profile'?>" class="btn btn-app bg-info">
                                        <span class="badge bg-purple" id="ozonat_new">891</span>
                                        <i class="fas fa-align-justify"></i> الأذونات
                                    </a>
                                    <a href="<?=base_url().'maham_mowazf/person_profile/Personal_profile'?>" class="btn btn-app bg-danger">
                                        <span class="badge bg-teal" id="solaf_new">67</span>
                                        <i class="far fa-money-bill-alt"></i> السلف
                                    </a>
                                    <a href="<?=base_url().'all_secretary/email/Emails/inbox'?>" class="btn btn-app bg-warning">
                                        <span class="badge bg-info" id="tot-prod_email">12</span>
                                        <i class="fas fa-envelope"></i> البريد
                                    </a>
                                    <a href="<?=base_url().'human_resources/mohma/Mohma_c/all_new_mohma'?>" class="btn btn-app bg-maroon">
                                        <span class="badge bg-success" id="mohma">531</span>
                                        <i class="fas fa-inbox"></i> المهام
                                    </a>
                                    <a href="<?=base_url().'human_resources/employee_forms/namazegs/Namazeg/all_talabat'?>" class="btn btn-app bg-primary">
                                        <span class="badge bg-danger" id="namazegs">531</span>
                                        <i class="far fa-file-alt"></i> خطاب تعريف
                                    </a>
                                    <a href="<?=base_url().'finance_accounting/box/ezn_sarf/Ezn_sarf/all_ozonat_sarf_transformed'?>" class="btn btn-app bg-info">
                                        <span class="badge bg-danger" id="ezn_sarf">531</span>
                                        <i class="fas fa-heart"></i> إذن صرف
                                    </a>
                                    <a href="<?=base_url().'family_controllers/LagnaSetting/all_glasat_invation'?>" class="btn btn-app bg-success">
                                        <span class="badge bg-danger" id="glasat_invation">0</span>
                                        <i class="fas fa-heart"></i>دعوة لجنة أسر
                                    </a>
                                    <a href="<?=base_url().'human_resources/ta3mem/Ta3mem_c'?>" class="btn btn-app bg-warning">
                                        <span class="badge bg-danger" id="ta3mem">0</span>
                                        <i class="fas fa-inbox"></i>تعاميم
                                    </a>
                                    <a href="<?=base_url().'human_resources/ta3mem/Ta3mem_msg_c'?>" class="btn btn-app bg-info">
                                        <span class="badge bg-danger" id="msg_c">0</span>
                                        <i class="fas fa-envelope"></i>رسائل
                                    </a>
                                    <a href="<?=base_url().'human_resources/ta3mem/Ta3mem_adv_c'?>" class="btn btn-app bg-maroon">
                                        <span class="badge bg-info" id="adv_c">0</span>
                                        <i class="fas fa-inbox"></i>إعلانات
                                    </a>
                                    <a href="<?=base_url().'maham_mowazf/person_profile/Personal_profile'?>" class="btn btn-app bg-secondary">
                                        <span class="badge bg-info" id="ratb">0</span>
                                        <i class="fas fa-inbox"></i>صرف الراتب
                                    </a>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="card">
                            <div class="card-header bg-info">
                                <h3 class="card-title">مهام الموظفين</h3>
                            </div>
                            <div class="card-body">
                                <div class="col-lg-3 col-6">
                                    <!-- small card -->
                                    <div class="small-box bg-success">
                                        <div class="inner">
                                            <h3 id=""><?= $new_mohma ?><sup
                                                        style="font-size: 20px"></sup></h3>
                                            <p> المهام الجديدة</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-tasks" aria-hidden="true"></i>
                                        </div>
                                        <a href="<?= base_url() ?>human_resources/mohma/Mohma_c/all_new_mohma"
                                           class="small-box-footer">
                                            معاينة التفاصيل <i class="fas fa-arrow-circle-left"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-3 col-6">
                                    <!-- small card -->
                                    <div class="small-box bg-warning">
                                        <div class="inner">
                                            <h3 id=""><?= $current_mohma ?></h3>
                                            <p> المهام الجارية</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                        </div>
                                        <a href="<?= base_url() ?>human_resources/mohma/Mohma_c/all_current_mohma"
                                           class="small-box-footer">
                                            معاينة التفاصيل <i class="fas fa-arrow-circle-left"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <div class="small-box bg-danger">
                                        <div class="inner">
                                            <h3 id=""><?= $mot3sra_mohma ?></h3>
                                            <p> المهام المتعثرة</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-bell " aria-hidden="true"></i>
                                        </div>
                                        <a href="<?= base_url() ?>human_resources/mohma/Mohma_c/all_current_mohma"
                                           class="small-box-footer">
                                            معاينة التفاصيل <i class="fas fa-arrow-circle-left"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <!-- small card -->
                                    <div class="small-box bg-success">
                                        <div class="inner">
                                            <h3 id=""><?= $end_mohma ?></h3>
                                            <p> المهام المنجزة</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                        </div>
                                        <a href="<?= base_url() ?>human_resources/mohma/Mohma_c/all_end_mohma"
                                           class="small-box-footer">
                                            معاينة التفاصيل <i class="fas fa-arrow-circle-left"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="card">
                            <div class="card-header bg-info">
                                <h3 class="card-title">البريد الصادر والوارد</h3>
                            </div>
                            <div class="card-body">
                                <div class="col-lg-3 col-6">
                                    <!-- small card -->
                                    <div class="small-box bg-success">
                                        <div class="inner">
                                            <h3 id="all_tlabat_sadr">0<sup style="font-size: 20px">%</sup></h3>
                                            <!--                        <p> المهام الجارية </p>-->
                                            <p>المعاملات الصادرة</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-tasks" aria-hidden="true"></i>
                                        </div>
                                        <a href="<?= base_url() ?>maham_mowazf/archive/main/Main/tnbehat_gdeda"
                                           class="small-box-footer">
                                            معاينة التفاصيل <i class="fas fa-arrow-circle-left"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-3 col-6">
                                    <!-- small card -->
                                    <div class="small-box bg-warning">
                                        <div class="inner">
                                            <!-- <h3>44</h3>
                                             <p> الرسائل الجديدة </p>-->
                                            <h3 id="">0</h3>
                                            <p>اضافة بريد وارد</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                        </div>
                                        <a href="<?= base_url() ?>all_secretary/email/Emails/inbox"
                                           class="small-box-footer">
                                            معاينة التفاصيل <i class="fas fa-arrow-circle-left"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <div class="small-box bg-danger">
                                        <div class="inner">
                                            <h3 id="all_tlabat_ward">0</h3>
                                            <p>المعاملات الواردة</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-bell " aria-hidden="true"></i>
                                        </div>
                                        <a href="<?= base_url() ?>maham_mowazf/archive/main/Main/tnbehat_gdeda"
                                           class="small-box-footer">
                                            معاينة التفاصيل <i class="fas fa-arrow-circle-left"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <!-- small card -->
                                    <div class="small-box bg-success">
                                        <div class="inner">
                                            <!-- <h3>44</h3>
                                             <p> الرسائل الجديدة </p>-->
                                            <h3 id="">0</h3>
                                            <p>الأرشيف</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                        </div>
                                        <a href="#" class="small-box-footer">
                                            معاينة التفاصيل <i class="fas fa-arrow-circle-left"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-default">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-exclamation-triangle"></i>
                                        إحصائية عامة
                                    </h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="col-md-12">
                                        <div class="card card-danger">
                                            <div class="card-body">
                                                <div class="chartjs-size-monitor">
                                                    <div class="chartjs-size-monitor-expand">
                                                        <div class=""></div>
                                                    </div>
                                                    <div class="chartjs-size-monitor-shrink">
                                                        <div class=""></div>
                                                    </div>
                                                </div>
                                                <div class="chartjs-size-monitor">
                                                    <div class="chartjs-size-monitor-expand">
                                                        <div class=""></div>
                                                    </div>
                                                    <div class="chartjs-size-monitor-shrink">
                                                        <div class=""></div>
                                                    </div>
                                                </div>
                                                <canvas id="donutChart"
                                                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 524px;"
                                                        width="524" height="250"
                                                        class="chartjs-render-monitor"></canvas>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-default">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-exclamation-triangle"></i>
                                        أحدث تعاميم - رسائل - إعلانات
                                    </h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <?php if (isset($da3wat_t3mem->basic_data) && !empty($da3wat_t3mem->basic_data)) { ?>
                                        <div class="alert alert-danger alert-dismissible">
                                            <h5><i class="icon fas fa-ban"></i>
                                                تعميم !
                                                <?= $da3wat_t3mem->basic_data->ta3mem_date ?>     </h5>
<!--                                            --><?//= $da3wat_t3mem->basic_data->ta3mem_title ?>
                                        </div>
                                    <?php } ?>
                                    <?php if (isset($da3wat_msg->basic_data) && !empty($da3wat_msg->basic_data)) { ?>
                                        <div class="alert alert-info alert-dismissible">
                                            <h5><i class="icon fas fa-info"></i> رسائل!
                                                <?= $da3wat_msg->basic_data->msg_title ?>    </h5>
<!--                                            --><?//= $da3wat_msg->basic_data->subject ?>
                                        </div>
                                    <?php } ?>
                                    <?php if (isset($da3wat_adv->basic_data) && !empty($da3wat_adv->basic_data)) { ?>
                                        <div class="alert alert-warning alert-dismissible">
                                            <h5><i class="icon fas fa-exclamation-triangle"></i> إعلانات!
                                                <?= $da3wat_adv->basic_data->ta3mem_title ?></h5>
<!--                                            --><?//= $da3wat_adv->basic_data->subject ?>
                                        </div>
                                    <?php } ?>
                                </div>                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 paddingg ">
                    <div class="card card-outline1">
                        <div class="card-header">
                            <h3 class="card-title"><strong>الموظف المثالي لهذا الشهر </strong></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body " style="" id="emp_methali">
                            <div class="timeline timeline-inverse">
                                <div>
                                    <img src="<?= base_url() ?>/asisst/admin_asset/img/avatar5.png" alt=" "
                                         class="img-size-50 img-circle employee">
                                    <div class="timeline-item">
                                        <h3 class="timeline-header"><a href="#">سامي سليمان عبدالله العرف</a></h3>
                                        <h3 class="timeline-position">مسؤول شؤون الموظفين</h3>
                                        <div class="timeline-body">
                                            <ul class="products-list product-list-in-card pl-2 pr-2">
                                                <li>
                                                    <div>
                                                        <a href="#" class="product-title">
                                                            عدد المرات السابقة
                                                            <span class="badge badge-success float-right">1 </span></a>
                                                    </div>
                                                    <div>
                                                        <a href="#" class="product-title">
                                                            اخر تاريخ حصل علي اللقب
                                                            <span class="badge2 badge-success float-right">25-10-2021 </span></a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="timeline-footer">
                                            <a href="#" class="btnn" style="padding: .175rem .5rem;font-size: 13px;">
                                                إرسال تهنئة</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 paddingg">
                    <div class="card card-outline1">
                        <div class="card-header border-transparent">
                            <h3 class="card-title"><strong>إحصائيات الطلبات</strong></h3>
                        </div>
                        <div class="card-body">
                            <div class="progress-group">
                                طلبات جديدة
                                <span class="float-right"><b>26</b>/30</span>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-maroon" style="width:calc(26/30*100%) "></div>
                                </div>
                            </div>
                            <!-- /.progress-group -->
                            <div class="progress-group">
                                طلبات قيد التنفيذ
                                <span class="float-right"><b>0</b>/30</span>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-maroon" style="width: 0%"></div>
                                </div>
                            </div>
                            <!-- /.progress-group -->
                            <div class="progress-group">
                                طلبات مكتملة
                                <span class="float-right"><b>3</b>/30</span>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-success" style="width: 10%"></div>
                                </div>
                            </div>
                            <!-- /.progress-group -->
                            <!-- /.progress-group -->
                            <div class="progress-group">
                                <span class="progress-text">طلبات ملغاه</span>
                                <span class="float-right"><b>1</b>/30</span>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-danger" style="width: 3.3333333333333%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 paddingg ">
                    <div class="card  card-outline1">
                        <div class="card-header">
                            <h3 class="card-title"><strong>المغادرون </strong></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="" style="overflow-y:scroll;height: 212px;" id="all_leave">
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer text-center">
                            <a href="#" class="uppercase">مشاهدة المغادرون </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 paddingg">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title"><strong> التعينات الجديدة </strong></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="" style="overflow-y:scroll;height: 212px;" id="new_emp">
                                <ul class="products-list product-list-in-card pl-2 pr-2">
                                    <li class="item">
                                        <div class="product-img">
                                            <img src="<?= base_url() ?>/asisst/admin_asset/img/avatar5.png"
                                                 alt=" " class="img-size-50 img-circle">
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-title">
                                                محمد علي محمد
                                                <span class="badge1 badge-success float-right">إرسال رسالة ترحيب </span></a>
                                            <span class="product-description">
                       الموارد البشرية
                      </span>
                                            <p class="pargraph job"><i class="fa fa-phone" aria-hidden="true"></i> 250
                                                &nbsp;&nbsp; <i class="fa fa-mobile" aria-hidden="true"></i> 0566658448
                                            </p>
                                        </div>
                                    </li>
                                    <li class="item">
                                        <div class="product-img">
                                            <img src="<?= base_url() ?>/asisst/admin_asset/img/avatar5.png"
                                                 alt=" " class="img-size-50 img-circle">
                                        </div>
                                        <div class="product-info">
                                            <a href="#" class="product-title">
                                                محمد علي محمد
                                                <span class="badge1 badge-success float-right">إرسال رسالة ترحيب </span></a>
                                            <span class="product-description">
                       الموارد البشرية
                      </span>
                                            <p class="pargraph job"><i class="fa fa-phone" aria-hidden="true"></i> 250
                                                &nbsp;&nbsp; <i class="fa fa-mobile" aria-hidden="true"></i> 0566658448
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer text-center">
                            <a href="#" class="uppercase">مشاهدة جميع التعينات </a>
                        </div>
                        <!-- /.card-footer -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel"> تفاصيل</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid" id="modal_data_div">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
            </div>
        </div>
    </div>
</div>
<div id="result">
</div>
<!--<script src="--><?php //echo base_url() ?><!--asisst/admin_asset/plugins/jquery/jquery.min.js"></script>-->
<!-- ChartJS -->
<!--<script src="--><?php //echo base_url() ?><!--asisst/admin_asset/plugins/chart.js/Chart.min.js"></script>-->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        console.warn("check check_msg :: ready");
        check_msg();
        setInterval(check_msg, (1000 * 60 * min));
    });
    function check_msg() {
        $.ajax({
            type: 'post',
            url: "<?=base_url() . 'human_resources/ta3mem/Ta3mem_msg_c/check_d3wa'?>",
            success: function (data) {
                if (data != '') {
                    $('.modal-backdrop').remove() // removes the grey overlay.
                    $("#result").html(data);
                    $(".modal-startup").modal('show');
                    $('#MymodalPreventScript').modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                }
            }
        });
    }
</script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js'></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // get_employees();
        /* get_decuments();*/
        // all_holidays();
        get_all_tlabat();
        get_emp_methali();
        get_all_leave();
        all_holidays();
        get_new_emp();
        /*13-9-20-om*/
        // get_all_rateb();
    });
    function get_ratb() {
        $.ajax({
            type: 'get',
            url: "<?php echo base_url();?>maham_mowazf/basic_data/Profile_parts/get_ratb",
            beforeSend: function () {
                $('#modal_data_div').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (response) {
                $('#modal_data_div').html(response);
            }
        });
    }
    function get_tafsel_ratb() {
        $.ajax({
            type: 'get',
            url: "<?php echo base_url();?>maham_mowazf/basic_data/Profile_parts/get_tafsel_ratb",
            beforeSend: function () {
                $('#modal_data_div').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (response) {
                $('#modal_data_div').html(response);
            }
        });
    }
    function get_all_solaf() {
        $.ajax({
            type: 'get',
            url: "<?php echo base_url();?>maham_mowazf/basic_data/Profile_parts/get_all_solaf",
            beforeSend: function () {
                $('#modal_data_div').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (response) {
                $('#modal_data_div').html(response);
            }
        });
    }
    function get_all_tlabat() {
        $.ajax({
            type: 'get',
            url: "<?php echo base_url();?>maham_mowazf/basic_data/Profile_parts/get_all_tlabat",
            success: function (response) {
                var all_count = JSON.parse(response);
                $('#all_tlabat_refuce').html(all_count.count_all_refuce);
                $('#all_tlabat_accept').html(all_count.count_all_accept);
                $('#all_tlabat_gary').html(all_count.count_all_talabat);
                $('#adv_c').html(all_count.count_all_ta3mem_adv);
                $('#msg_c').html(all_count.count_all_ta3mem_msg);
                $('#ta3mem').html(all_count.count_all_ta3mem);
                $('#all_tlabat').html((all_count.count_all_refuce + all_count.count_all_accept + all_count.count_all_talabat));
                var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
                var donutOptions = {
                    maintainAspectRatio: false,
                    responsive: true,
                }
                var donutData = {
                    labels: [
                        'المهام الجديدة',
                        'المهام الجارية',
                        'المهام المتعثرة',
                        'المهام المنجزة',
                        'المعاملات الصادرة',
                        'المعاملات الواردة',
                    ],
                    datasets: [
                        {
                            data: [<?=$new_mohma?>, <?=$current_mohma?>, <?=$mot3sra_mohma?>, <?=$end_mohma?>, $('#all_tlabat_sadr').text(), $('#all_tlabat_ward').text()],
                            backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
                        }
                    ]
                }
                new Chart(donutChartCanvas, {
                    type: 'doughnut',
                    data: donutData,
                    options: donutOptions
                })
            }
        });
    }
    function get_all_leave() {
        $.ajax({
            type: 'get',
            url: "<?php echo base_url();?>maham_mowazf/basic_data/Profile_parts/get_all_leave",
            beforeSend: function () {
                $('#all_leave').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (response) {
                $('#all_leave').html(response);
            }
        });
    }
    function get_emp_methali() {
        $.ajax({
            type: 'get',
            url: "<?php echo base_url();?>maham_mowazf/basic_data/Profile_parts/get_emp_methali",
            beforeSend: function () {
                $('#emp_methali').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (response) {
                $('#emp_methali').html(response);
            }
        });
    }
    function get_new_emp() {
        $.ajax({
            type: 'get',
            url: "<?php echo base_url();?>maham_mowazf/basic_data/Profile_parts/get_new_emp",
            beforeSend: function () {
                $('#new_emp').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (response) {
                $('#new_emp').html(response);
            }
        });
    }
    function all_holidays() {
        $.ajax({
            type: 'get',
            url: "<?php echo base_url();?>maham_mowazf/basic_data/Profile_parts/all_holidays",
            beforeSend: function () {
                $('#agzat_id').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (response) {
                $('#agzat_id').html(response);
            }
        });
    }
</script>
<script>
    /*   var hijriDate = new Intl.DateTimeFormat('ar-TN-u-ca-islamic', {
           day: 'numeric',
           month: 'long',
           year: 'numeric'
       }).format(Date.now());
       var ex = hijriDate.includes('هـ');
       if (ex) {
           document.getElementById('date').innerHTML = hijriDate;
       } else {
           document.getElementById('date').innerHTML = hijriDate + ' هـ';
       }*/
</script>
<script>
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();
    var session = "م";
    today = dd + '/' + mm + '/' + yyyy + " " + session;
    document.getElementById('today').innerHTML = today;
</script>
<!-- Start Navigation -->
<script>
    function showTime() {
        var date = new Date();
        var h = date.getHours(); // 0 - 23
        var m = date.getMinutes(); // 0 - 59
        var s = date.getSeconds(); // 0 - 59
        var session = "AM";
        if (h == 0) {
            h = 12;
        }
        if (h > 12) {
            h = h - 12;
            session = "PM";
        }
        h = (h < 10) ? "0" + h : h;
        m = (m < 10) ? "0" + m : m;
        s = (s < 10) ? "0" + s : s;
        var time = h + ":" + m + ":" + s + " " + session;
        document.getElementById("MyClockDisplay").innerText = time;
        document.getElementById("MyClockDisplay").textContent = time;
        setTimeout(showTime, 1000);
    }
    // showTime();
</script>
<style>.modal-dialog {
        position: relative;
        width: auto;
        margin: 0 auto !important;
    }</style>