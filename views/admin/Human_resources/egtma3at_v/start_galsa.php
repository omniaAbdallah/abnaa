<style>

    label.label {

        margin-bottom: 0px !important;

        color: #002542 !important;

        display: block !important;

        text-align: right !important;

        font-size: 16px !important;

        padding: 0 !important;

        height: auto;

    }



    table .headtr > td, table .headtr > th {

        /* background-color: #c1ccaf !important;

         color: #222 ;*/

        color: #d00303 !important;

        background-color: white !important;

    }



    table .headtr2 > td, table .headtr2 > th {

        background-color: #ffa7a7 !important;

        color: #222;

    }



    table tr > td, table tr > th {

        border: 2px double #c7c7c7 !important;

    }



    .table-mehwer tr > td textarea {

        /* background-color: #dbecbd;*/

        background-color: #ffffff;

        color: green;

    }



    .table > tbody > tr > th, .table > tfoot > tr > th,

    .table > thead > tr > td, .table > tbody > tr > td,

    .table > tfoot > tr > td {

        padding: 5px !important;

    }



    #accordion .panel-default > .panel-heading {

        margin-bottom: 3px;

        background-color: #5f9007;

        border-color: #ddd;

        background-image: none;

        padding: 0px 0px;

        width: 99.8%;

        display: inline-block;

        width: 100%;

    }



    #accordion .panel-default > .panel-heading a {

        color: #fff;

    }



    #accordion .panel-default > .panel-heading .panel-title {

        line-height: 40px;

    }



    /* .more-less {

         float: right;

         color: #212121;

         padding: 0px;

         width: 40px;

         height: 40px;

         text-align: center;

         line-height: 40px;

         background-color: #96c73e;

         color: #fff;

         margin-top: -1px;

         border-bottom-left-radius: 10px;

         border-top-left-radius: 10px;

         margin-left: 5px;

     }*/

    .more-less {

        float: left;

        color: #212121;

        padding: 0px;

        width: 99px;

        height: 40px;

        text-align: center;

        line-height: 40px;

        background-color: #fcb632;

        color: #000;

        margin-top: -1px;

        border-bottom-left-radius: 10px;

        border-top-left-radius: 10px;

        margin-left: 1px;

    }





    table .left-headtr > td, table .left-headtr > th {

        background-color: #f2a516;

    }



    .left-headtr label.label {

        text-align: center !important;

        color: #000 !important;

    }



    h4.heading-fasel {

        /*  background-color: #f2a516;

          display: inline-block;

          padding: 10px 10px 10px 43px;

          font-size: 18px;

          border-bottom-left-radius: 30px;

          border-top-left-radius: 0px;*/

        color: #0c0c0c;

        background-color: #65c1b7;

        display: inline-block;

        padding: 10px 10px 10px 43px;

        font-size: 18px;

        border-bottom-left-radius: 30px;

        border-top-left-radius: 0px;

    }

</style>



<style>

    .box {

        position: relative;

        border-radius: 3px;

        background: #ffffff;

        border-top: 3px solid #d2d6de;

        margin-bottom: 20px;

        width: 100%;

        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);

    }



    .box-header {

        color: #444;

        display: block;

        padding: 10px;

        position: relative;

    }



    .box-header.with-border {

        border-bottom: 1px solid #f4f4f4;

    }



    .box-header > .fa, .box-header > .glyphicon, .box-header > .ion, .box-header .box-title {

        display: inline-block;

        font-size: 18px;

        margin: 0;

        line-height: 1;

    }



    .box-body {

        border-top-left-radius: 0;

        border-top-right-radius: 0;

        border-bottom-right-radius: 3px;

        border-bottom-left-radius: 3px;

        padding: 10px;

    }



    .box-footer {

        border-top-left-radius: 0;

        border-top-right-radius: 0;

        border-bottom-right-radius: 3px;

        border-bottom-left-radius: 3px;

        border-top: 1px solid #f4f4f4;

        padding: 10px;

        background-color: #fff;

    }



    .table-bordered {

        border: 1px solid #f4f4f4;

    }



    table {

        background-color: transparent;

    }



    .table {

        width: 100%;

        max-width: 100%;

        margin-bottom: 20px;

    }



    .table thead th {

        vertical-align: bottom;

        border-bottom: 2px solid #dee2e6;

    }



    .table-bordered thead td, .table-bordered thead th {

        border-bottom-width: 2px;

    }



    .table td, .table th {

        padding: .75rem;

        vertical-align: top;

        border-top: 1px solid #dee2e6;

    }



    .badge {

        display: inline-block;

        min-width: 10px;

        padding: 3px 7px;

        font-size: 12px;

        font-weight: 700;

        line-height: 1;

        color: #fff;

        text-align: center;

        white-space: nowrap;

        vertical-align: middle;

        background-color: #777;

        border-radius: 10px;

    }



    .bg-red, .callout.callout-danger, .alert-danger, .alert-error, .label-danger, .modal-danger .modal-body {

        background-color: #dd4b39 !important;

    }



    .bg-yellow, .callout.callout-warning, .alert-warning, .label-warning, .modal-warning .modal-body {

        background-color: #f39c12 !important;

    }



    .bg-light-blue, .label-primary, .modal-primary .modal-body {

        background-color: #3c8dbc !important;

    }



    .bg-green, .callout.callout-success, .alert-success, .label-success, .modal-success .modal-body {

        background-color: #00a65a !important;

    }



    .classnewa {

        font-size: 17px !important;

    }

</style>





<div class="col-xs-12 fadeInUp wow">

    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">

        <div class="panel-heading">

            <h3 class="panel-title"> <?php echo $title; ?> </h3>

        </div>

        <?php

        if (isset($last_galsa) && !empty($last_galsa)) { ?>

            <div class="box_">

                <?php



                ?>

                <!-- /.box-header -->

                <div class="box-body no-padding">

                    <table class="table table-bordered center">

                        <thead style="background: #737373;color: white;">

                        <th class="text-center">رقم الجلسة</th>

                        <th class="text-center">تاريخ الجلسة</th>

                        <th class="text-center">توقيت الجلسة</th>

                        <th class="text-center">مكان الإنعقاد</th>

                        <th class="text-center">الأعضاء</th>

                        <th class="text-center">الاجراء</th>

                        </thead>

                        <tbody>

                        <tr>

                            <td><span class=" classnewa badge bg-green"> <?php if (isset($last_galsa_date->glsa_rkm_full) && !empty($last_galsa_date->glsa_rkm_full)) {

                                        echo $last_galsa_date->glsa_rkm_full;

                                    }

                                    ?></span>

                                <input type="hidden" id="galsa_rkm" value="<?= $last_galsa_date->glsa_rkm ?>">



                            </td>

                            <td><span class=" classnewa badge bg-red"><?php if (isset($last_galsa_date->glsa_date) && !empty($last_galsa_date->glsa_date)) {

                                        echo $time = date("Y-m-d ", $last_galsa_date->glsa_date);

                                    }

                                    ?></span></td>

                            <td><span class=" classnewa badge bg-light-blue"><?php if (isset($last_galsa_date->glsa_time) && !empty($last_galsa_date->glsa_time)) {

                                        echo $last_galsa_date->glsa_time;

                                    }

                                    ?></span></td>

                            <td>

                                <a data-toggle="modal" data-target="#myModal_location_">

                                <span style="font-size: 15px;" class=" badge bg-blue">

                               <?php if (isset($last_galsa_date->makn_en3qd_name) && !empty($last_galsa_date->makn_en3qd_name)) {

                                   echo $last_galsa_date->makn_en3qd_name;

                               }

                               ?>



                                </span>

                                </a>

                            </td>

                            <td>



                                <a class="btn btn-sm btn-success" data-toggle="modal"

                                   onclick="det_datiles_attend(<?php

                                   if (isset($last_galsa_date->glsa_rkm) && !empty($last_galsa_date->glsa_rkm)) echo $last_galsa_date->glsa_rkm ?>,1)"

                                   data-target="#myModal_1">

                                    <?php if (isset($last_galsa_date->glsa_members_accept) && !empty($last_galsa_date->glsa_members_accept)) {

                                        echo $last_galsa_date->glsa_members_accept;

                                    } else {

                                        echo '0';

                                    } ?> تأكيد حضور

                                </a>



                                <a class="btn btn-sm btn-danger" data-toggle="modal"

                                   onclick="det_datiles_attend(<?php if (isset($last_galsa_date->glsa_rkm) && !empty($last_galsa_date->glsa_rkm)) echo $last_galsa_date->glsa_rkm ?>,2)"

                                   data-target="#myModal_1">

                                    <?php if (isset($last_galsa_date->glsa_members_refuse) && !empty($last_galsa_date->glsa_members_refuse)) {

                                        echo $last_galsa_date->glsa_members_refuse;

                                    } else {

                                        echo '0';

                                    } ?>

                                    معتذر

                                </a>



                                <a class="btn btn-sm btn-warning" data-toggle="modal"

                                   onclick="det_datiles_attend(<?php if (isset($last_galsa_date->glsa_rkm) && !empty($last_galsa_date->glsa_rkm)) echo $last_galsa_date->glsa_rkm ?>,0)"

                                   data-target="#myModal_1">

                                    <?php if (isset($last_galsa_date->glsa_members_wait) && !empty($last_galsa_date->glsa_members_wait)) {

                                        echo $last_galsa_date->glsa_members_wait;

                                    } else {

                                        echo '0';

                                    } ?>

                                    أجل الرد

                                </a>



                                <a class="btn btn-sm btn-primary" data-toggle="modal"

                                   onclick="det_datiles_attend(<?php if (isset($last_galsa_date->glsa_rkm) && !empty($last_galsa_date->glsa_rkm)) echo $last_galsa_date->glsa_rkm ?>,5)"

                                   data-target="#myModal_1">

                                    <?php if (isset($last_galsa_date->glsa_members_no_action) && !empty($last_galsa_date->glsa_members_no_action)) {

                                        echo $last_galsa_date->glsa_members_no_action;

                                    } else {

                                        echo '0';

                                    } ?>

                                    جاري

                                </a>





                                <button class="btn btn-add btn-sm" data-toggle="modal" data-target="#myModal">تسجيل

                                    حضور الاعضاء

                                </button>

                                <a onclick="print_hdoor(<?= $last_galsa_date->glsa_rkm ?>)"><i class="fa fa-print"

                                                                                               aria-hidden="true"></i></a>

                            </td>



                            <td>





                                <?php



                                if ($last_galsa_date->time_start == NULL) { ?>



                                    <input type="hidden" name="glsa_rkm" id="glsa_rkm"

                                           value="<?= $last_galsa_date->glsa_rkm ?>"/>

                                    <button class="btn btn-primary btn-sm"

                                            onclick="startgalsa();"

                                        <?php if (isset($last_galsa_date->time_start) && (!empty($last_galsa_date->time_start))) {

                                            echo 'disabled';

                                        } ?> >

                                        <i class="fa fa-hand-pointer-o" aria-hidden="true"></i>

                                        إضغط هنا لبدء الجلسة

                                    </button>

                                <? } else { ?>



                                    <span class=" classnewa badge bg-green">

   تم بدء الجلسة الساعة

   <?= $last_galsa_date->time_start ?></span>



                                <?php }



                                ?>

                                <input type="hidden" name="glsa_rkm" id="glsa_rkm"

                                       value="<?= $last_galsa_date->glsa_rkm ?>"/>

                                <button class="btn btn-sm btn-danger btn-sm" onclick="end_galsa();"

                                        style=""> انهاء الجلسه

                                </button>



                            </td>

                        </tr>

                        </tbody>

                    </table>

                    <?php



                    //echo '<pre>';

                    // print_r($last_galsa_date);

                    ?>

                </div>

                <!-- /.box-body -->        </div>





            <div class="panel-body">



                <div class="col-sm-12">



                    <?php if ($last_galsa != 0) { ?>

                        <div class="col-sm-12 no-padding">

                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                                <?php

                                if (isset($mahawer) && !empty($mahawer)) {

                                    $r = 0;

                                    foreach ($mahawer as $row) {

                                        $r++;

                                        ?>

                                        <div class="col-md-12 table<?php echo $row->id; ?> no-padding">

                                            <div class="panel panel-default">

                                                <div style="background-color: #02776a !important;" class="panel-heading" role="tab"

                                                     id="headingOne<?php echo $row->id; ?>">

                                                    <h4 style="margin-right: 5px !important;" class="panel-title">

                                                        <a style="font-size: 16px;" role="button" data-toggle="collapse" data-parent="#accordion"

                                                           href="#collapseOne<?php echo $row->id; ?>"

                                                           aria-expanded="true" aria-controls="collapseOne<?php echo $row->id; ?>">

                                                            <?php echo $row->mehwar_rkm . '-'; ?><?php echo $row->mehwar_title; ?>

                                                            <i class="more-less glyphicon glyphicon-plus"><b style="font-family: sans-serif;font-size: 16px;"> إضافة القرار </b></i>

                                                        </a>

                                                    </h4>

                                                </div>

                                                <div id="collapseOne<?php echo $row->id; ?>"

                                                     class="panel-collapse collapse num_mahawer" role="tabpanel"

                                                     aria-labelledby="headingOne<?php echo $row->id; ?>">

                                                    <div class="panel-body">

                                                        <table class="table table-bordered table-striped table-mehwer"

                                                               style="table-layout: fixed">

                                                            <tbody>

                                                            <tr class="">

                                                                <td style="width: 90px">المحور





                                                                </td>

                                                                <td>

                                                                    <?php echo $row->mehwar_title; ?>









                                                                </td>

                                                                <td style="width: 100px">الإجراء</td>

                                                            </tr>



                                                            <tr>

                                                                <!-- yara 30-6-2020 -->

                                                                <td style="color: green;">القرار



                                                                    <input class="check_large" type="checkbox"

                                                                           id="gridCheck<?php echo $row->id; ?>"

                                                                           value="1"

                                                                           onchange="update_opened(<?php echo $row->id; ?>)"



                                                                    >





                                                                </td>

                                                                <!-- yara 30-6-2020 -->

                                                                <!--

<td><textarea style="border: 1px solid black !important; "  onfocus="$('.mehar<?php echo $row->id; ?>').hide();" id="mehar<?php echo $row->id; ?>" class="form-control" rows="2"></textarea></td>

-->

                                                                <td>

                                                                    <input onfocus="$('.mehar<?php echo $row->id; ?>').hide();"

                                                                           id="mehar<?php echo $row->id; ?>"

                                                                           class="form-control"/>

                                                                </td>

                                                                <td>

                                                                    <button class="btn btn-add"

                                                                            id="btn<?php echo $row->id; ?>"

                                                                            onclick="qrar_mehwar(<?php echo $row->id; ?>);">

                                                                        حفظ

                                                                    </button>

                                                                </td>

                                                            </tr>

                                                            </tbody>

                                                        </table>

                                                        <span style="color:red; margin-right: 50%; display: none;"

                                                              class="mehar<?php echo $row->id; ?>">هذا الحقل مطلوب</span>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    <?php }

                                } ?>

                                <h4 class="heading-fasel">البنود المنتهي مناقشتها</h4>

                                <div class="col-md-12 update">

                                    <?php

                                    if (isset($mahawer_end) && !empty($mahawer_end)) {

                                    foreach ($mahawer_end as $row) {

                                    ?>

                                    <div class="col-md-12 table<?php echo $row->id; ?> no-padding">

                                        <div class="panel panel-default">

                                            <div style="background-color: #424242 !important;"





                                                 class="panel-heading" role="tab"

                                                 id="headingOne<?php echo $row->id; ?>">

                                                <h4 class="panel-title">

                                                    <a style="margin-right: 5px; font-size: 16px;" role="button"

                                                       data-toggle="collapse"

                                                       data-parent="#accordion"

                                                       href="#collapseOne<?php echo $row->id; ?>"

                                                       aria-expanded="true"

                                                       aria-controls="collapseOne<?php echo $row->id; ?>">

                                                        <?php echo $row->mehwar_rkm . '-'; ?>

                                                        <?php echo $row->mehwar_title; ?>

                                                        <i class="more-less glyphicon glyphicon-plus"></i>

                                                    </a>

                                                </h4>

                                            </div>

                                            <div id="collapseOne<?php echo $row->id; ?>"

                                                 class="panel-collapse collapse " role="tabpanel"

                                                 aria-labelledby="headingOne<?php echo $row->id; ?>">

                                                <div class="panel-body">

                                                    <table class="table table-bordered table-striped table-mehwer"

                                                           style="table-layout: fixed">

                                                        <tbody>

                                                        <tr class="">

                                                            <td style="width: 160px">المحور

                                                            </td>

                                                            <td><?php echo $row->mehwar_title; ?></td>

                                                            <td style="width: 100px">الإجراء</td>

                                                        </tr>

                                                        <tr>

                                                            <td>القرار</td>

                                                            <td><textarea onfocus="$('.mehar<?php echo $row->id; ?>').hide();"

                                                                        onclick="make_not_read(<?php echo $row->id; ?>);"

                                                                        readonly id="mehar<?php echo $row->id; ?>"

                                                                        class="form-control col-md-12" rows="">

                                                                    <?php echo $row->elqrar; ?></textarea></td>

                                                            <td>

                                                                <button class="btn btn-add"

                                                                        id="btn<?php echo $row->id; ?>"

                                                                        onclick="qrar_mehwar_update(<?php echo $row->id; ?>);">

                                                                    تعديل

                                                                </button>

                                                            </td>

                                                        </tr>

                                                        </tbody>

                                                    </table>

                                                    <span style="color:red; margin-right: 50%; display: none;"

                                                          class="mehar<?php echo $row->id; ?>">هذا الحقل مطلوب</span>



                                                </div>

                                            </div>

                                        </div>

                                        <?php }

                                        } ?>

                                    </div>

                                </div>

                            </div>





                        </div>





                        <!--   <div class="col-sm-2">

                            <table class="table table-bordered">

                                <tbody>

                                <tr class="left-headtr">

                                    <th><label class="label">رقم الجلسه</label></th>

                                </tr>



                                <tr>

                                    <td class="text-center">

                                        <?php echo date("Y"); ?>/<?php echo $last_galsa - 1; ?>



                                        <input type="hidden" id="glsa_rkm" name="glsa_rkm" readonly value="<?php echo $last_galsa - 1; ?>"/></td>

                                </tr>

                                <tr class="left-headtr">

                                    <th><label class="label"> تاريخ بدء الجلسه م</label></th>

                                </tr>

                                <tr>

                                    <td class="text-center"><?php if (isset($last_galsa_date)) echo $last_galsa_date->glsa_date_m; ?></td>

                                </tr>

                                <tr class="left-headtr">

                                    <th> <label class="label">تاريخ بدء الجلسه هـ</label></th>

                                </tr>



                                <tr>

                                    <td class="text-center"> <?php if (isset($last_galsa_date)) echo $last_galsa_date->glsa_date_h; ?></td>

                                </tr>

                                <tr class="left-headtr">

                                    <th><label class="label">تسجيل حضور الاعضاء</label></th>

                                </tr>

                                <tr>

                                    <td class="text-center"><button class="btn btn-add" data-toggle="modal" data-target="#myModal">تسجيل حضور الاعضاء</button></td>

                                </tr>

                                <tr class="left-headtr">

                                    <th><label class="label">بدء الجلسه</label></th>

                                </tr>



                                <tr>

                                    <td class="text-center">

                                   <button class="btn btn-primary"

                                                onclick="startgalsa();" <?php if (isset($last_galsa_date->time_start) && (!empty($last_galsa_date->time_start))) {

                            echo 'disabled';

                        } ?> >بدء الجلسه

                                        </button>

                                    

                                    </td>

                                </tr>

                                <tr class="left-headtr">

                                    <th><label class="label">بدء الجلسه</label></th>

                                </tr>

                                <tr>

                                    <td id="tim"><?php if (isset($last_galsa_date->time_start) && (!empty($last_galsa_date->time_start))) {

                            echo $last_galsa_date->time_start;

                        } ?></td>

                                </tr>

                                <tr class="left-headtr">

                                    <th><label class="label">انهاء الجلسه</label></th>

                                </tr>

                                <tr>

                                    <td>

                                     <div class="col-sm-12">

                                            <button class="btn btn-sm btn-danger" onclick="end_galsa();"

                                                   style=""> انهاء الجلسه</button>

                                        </div>

                                        </td>

                                </tr>

                                </tbody>

                            </table>



                        </div>-->

                    <?php } else { ?>

                        <div class="alert alert-danger">عفوا!...لاتوجد جلسات مفتوحه</div>

                    <?php } ?>





                </div>





            </div>



        <?php } else {

            ?>

            <div class="alert alert-danger">عفوا !......لاتوجد جلسات مفتوحه</div>

        <?php } ?>







    </div>

</div>



<!----------------- start_modal -----------------------------------------                    ------>

<div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

    <div class="modal-dialog" role="document" style="width: 85%">

        <div class="modal-content">

            <div class="modal-header col-md-12">

                <div class="col-md-4">

                    <h4 class="modal-title">تفاصيل الأعضاء</h4>

                </div>

                <div class="col-md-8">

                    <a class="btn btn-sm btn-success">

                           <span id="glsa_members_hdoor_num"><?php if (isset($last_galsa_date->glsa_members_hdoor_num) && !empty($last_galsa_date->glsa_members_hdoor_num)) {

                                   echo $last_galsa_date->glsa_members_hdoor_num;

                               } else {

                                   echo '0';

                               } ?></span>

                        تأكيد حضور



                    </a>



                    <a class="btn btn-sm btn-danger" >

                           <span id="glsa_members_absent_num"> <?php if (isset($last_galsa_date->glsa_members_absent_num) && !empty($last_galsa_date->glsa_members_absent_num)) {

                                   echo $last_galsa_date->glsa_members_absent_num;

                               } else {

                                   echo '0';

                               } ?></span>

                        لم يحضر

                    </a>



                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>



            </div>

            <br>

            <div class="modal-body form-group col-sm-12 col-xs-12">



                <?php if (isset($members) && !empty($members)) {

                    ?>

                    <div class="container col-md-12">

                        <table id="mem" class="  display table table-bordered   responsive nowrap"

                               cellspacing="0" width="100%">

                            <thead>

                            <tr>

                                <th scope="col">م</th>

                                <th scope="col">رقم العضوية</th>

                                <th scope="col">إسم العضو</th>

                                <th scope="col">نهاية الاشتراك</th>

                                <th scope="col">حالة الحضور</th>

                                <th scope="col">طبيعة الحضور</th>

                                <th scope="col">النائب</th>

                                <th scope="col">الإجراء</th>

                            </tr>

                            </thead>

                            <tbody>

                            <?php $x = 1;

                            foreach ($members as $row) {

                                if (isset($row->odwiat_data) && (!empty($row->odwiat_data))) {

                                    $rkm_odwia_full = $row->odwiat_data->rkm_odwia_full;



                                    if (!empty($row->odwiat_data->subs_to_date_m)) {

                                        $subs_to_date_m = explode('/', $row->odwiat_data->subs_to_date_m)[2] . '/' . explode('/', $row->odwiat_data->subs_to_date_m)[0] . '/' . explode('/', $row->odwiat_data->subs_to_date_m)[1];

                                    } else {

                                        $subs_to_date_m = 'غير محدد';

                                    }



                                } else {

                                    $rkm_odwia_full = 'غير محدد';

                                    $subs_to_date_m = 'غير محدد';

                                }

                                ?>

                                <tr id="member_row<?php echo $row->id; ?>">

                                    <td><?php echo $x++; ?></td>

                                    <td><?php echo $rkm_odwia_full; ?></td>

                                    <td><?php echo $row->member_data->laqb_title . '/' . $row->member_data->name; ?></td>

                                    <td><?php echo $subs_to_date_m; ?></td>

                                    <input type="hidden" class="mem_id_fk"

                                           name="mem_id_fk<?php echo $row->mem_id_fk; ?>"

                                           id="mem_id_fk<?php echo $row->mem_id_fk; ?>"

                                           value="<?php echo $row->id; ?> "/>

                                    <td><input type="radio" <?php if ($row->hdoor_satus == 1) echo 'checked'; ?>

                                               class="attend" name="hdoor_satus<?php echo $row->mem_id_fk; ?>"

                                               onclick="$('input[name=\'hodoor_status<?php echo $row->mem_id_fk; ?>\']').removeAttr('disabled')"

                                               value="1">حضر

                                        <input type="radio" <?php if ($row->hdoor_satus == 0) echo 'checked'; ?>

                                               class="attend" name="hdoor_satus<?php echo $row->mem_id_fk; ?>"

                                               onclick="$('input[name=\'hodoor_status<?php echo $row->mem_id_fk; ?>\']').attr('disabled','disabled')"

                                               value="0">لم يحضر

                                    </td>

                                    <td>

                                        <input type="radio" <?php if ($row->hodoor_status == 'himself') echo 'checked'; ?>

                                               class="attend" name="hodoor_status<?php echo $row->mem_id_fk; ?>"

                                               onclick="$('#member_id<?php echo $row->mem_id_fk; ?>').attr('disabled','disabled');

                                                       $('.selectpicker').selectpicker('refresh'); "

                                               value="himself" disabled>بنفسه

                                        <input type="radio" <?php if ($row->hodoor_status == 'naeb') echo 'checked'; ?>

                                               class="attend" disabled

                                               name="hodoor_status<?php echo $row->mem_id_fk; ?>"

                                               onclick="$('#member_id<?php echo $row->mem_id_fk; ?>').removeAttr('disabled');

                                                       $('.selectpicker').selectpicker('refresh'); "

                                               value="naeb">

                                        نائب عنه

                                    </td>

                                    <td><select name="member_id<?php echo $row->mem_id_fk; ?>" disabled

                                                class="form-control selectpicker" data-show-subtext="true"

                                                data-live-search="true"

                                                onclick="$('#member_name<?php echo $row->mem_id_fk; ?>').val($('option:selected',this).text())"

                                                id="member_id<?php echo $row->mem_id_fk; ?>">

                                            <option value=""> - اختر -</option>

                                            <?php foreach ($members as $member) {

                                                if ($member->mem_id_fk == $row->mem_id_fk) {

                                                    continue;

                                                } ?>

                                                <option value="<?= $member->mem_id_fk  ?>" <?php if ($member->mem_id_fk == $row->member_id) echo 'selected'; ?> >

                                                    <?php echo $member->member_data->laqb_title . '/' . $member->member_data->name; ?> </option>

                                            <?php } ?>

                                        </select>

                                        <input type="hidden" value="" name="member_name"

                                               id="member_name<?php echo $row->mem_id_fk; ?>">





                                    </td>

                                    <td>

                                        <button type="button"

                                                class="btn btn-success btn-sm" <?php if ($row->hdoor_satus == 1) echo 'disabled'; ?>

                                                onclick="save_member(<?php echo $row->id; ?>,<?php echo $row->mem_id_fk; ?>)"

                                                value=""> حفظ

                                        </button>

                                    </td>

                                </tr>

                            <?php } ?>

                            </tbody>

                        </table>

                    </div>

                    <?php

                } else {

                    ?>

                    <div class="alert alert-danger col-lg-12"> لاتوجد اعضاء</div>

                    <?php

                }

                ?>



            </div>

            <div class="modal-footer" style="border-top: 0;">





            </div>

        </div>

    </div>

</div>

<!------------------------- end_modal ----------------------------->







<div class="modal" id="myModal_1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

    <div class="modal-dialog" role="document" style="width: 85%">

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <h4 class="modal-title">تفاصيل </h4>

            </div>

            <br>

            <div class="modal-body form-group col-sm-12 col-xs-12">

                <div id="members_data"></div>

            </div>

            <div class="modal-footer" style="border-top: 0;">

                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق

                </button>

            </div>

        </div>

    </div>

</div>



<script>

    function make_datatable(table_id) {

        $('#' + table_id).DataTable({

            dom: 'Bfrtip',

            "columnDefs": [

                {"searchable": false, "targets": 6}

            ],

            buttons: [

                'pageLength',

                'copy',

                'csv',

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

</script>



<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>



<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>

<script>

    $(document).ready(function () {

        make_datatable('mem');



        setInterval(get_count_hdoor,(1000 * 60 * 1));

    });

</script>



<script>



    function save_member(row_id, memb_id) {



        console.log('data hodoor ');

        console.log('data hodoor ::' + row_id);

        console.log('data hodoor ::' + memb_id);

        var hdoor_satus = $("input[name='hdoor_satus" + memb_id + "']:checked").val();

        var hodoor_status = $("input[name='hodoor_status" + memb_id + "']:checked").val();

        var member_id = $('#member_id' + memb_id).val();

        var member_name = $('#member_name' + memb_id).val();

        var mem_id_fk = $('#mem_id_fk' + memb_id).val();

        if (hdoor_satus == 1) {

            console.log('if 1 ');



            if (!hodoor_status) {

                console.log('if 2 ');



                Swal.fire({

                    title: 'من فضلك حدد طبيعة الحضور  ',

                    icon: 'warning',

                    confirmButtonText: 'تم'

                });

                return 0;

            } else if (hodoor_status === 'naeb') {

                if (!member_id) {

                    console.log('if 3 ');



                    Swal.fire({

                        title: 'من فضلك حدد نائب  ',

                        icon: 'warning',

                        confirmButtonText: 'تم'

                    });

                    return 0;

                }

            }

        }



        $.ajax({

            type: 'post',

            url: '<?php echo base_url() ?>md/all_glasat/Start_galsa/save_member',

            data: {

                hodoor_status: hodoor_status,

                hdoor_satus: hdoor_satus,

                mem_id_fk: memb_id,

                member_id: member_id,

                member_name: member_name,

                row_id: row_id

            },

            cache: false,

            beforeSend: function () {

                Swal.fire({

                    title: "جاري تسجيل  ... ",

                    text: "",

                    imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',

                    showConfirmButton: false,

                    allowOutsideClick: false



                });

            },

            success: function (resp) {

                Swal.fire({

                    title: 'تم تسجيل الحضور   ',

                    icon: 'success',

                    confirmButtonText: 'تم'

                });



                $('#member_row' + row_id + ' button').attr('disabled', 'disabled');

                get_count_hdoor();

            }

        });





    }



</script>



<script>

    function qrar_mehwar(valu) {

        var mehar = $('#mehar' + valu).val();

        if ($('#mehar' + valu).val() == '') {

            $('.mehar' + valu).show();

            return;



        }



        $.ajax({

            type: 'post',

            url: "<?php echo base_url();?>md/all_glasat/Start_galsa/update_qrar",

            data: {valu: valu, mehar: mehar},

            beforeSend: function (xhr) {

                Swal.fire({

                    title: "جاري الحفظ ... ",

                    text: "",

                    imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',

                    showConfirmButton: false,

                    allowOutsideClick: false

                });

            },

            success: function (d) {

                Swal.fire({

                    // position: 'top-end',

                    type: 'success',

                    title: 'تم حفظ القرار بنجاح ',

                    showConfirmButton: false,

                    timer: 2000

                })



                var app = $('.table' + valu);

                $('.table' + valu).show();

                $('.update').append($('.table' + valu));

                //$('.num_mahawer')

                $('#collapseOne' + valu).removeClass("num_mahawer");



                $('#btn' + valu).text('تعديل');





            }



        });

    }

</script>



<script>

    function qrar_mehwar_update(valu) {

        var mehar = $('#mehar' + valu).val();

        if ($('#mehar' + valu).val() == '') {

            $('.mehar' + valu).show();

            return;



        }



        $.ajax({

            type: 'post',

            url: "<?php echo base_url();?>md/all_glasat/Start_galsa/update_qrar",

            data: {valu: valu, mehar: mehar},

            beforeSend: function (xhr) {

                Swal.fire({

                    title: "جاري الحفظ ... ",

                    text: "",

                    imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',

                    showConfirmButton: false,

                    allowOutsideClick: false

                });

            },

            success: function (d) {

                Swal.fire({

                    // position: 'top-end',

                    type: 'success',

                    title: 'تم تعديل القرار بنجاح',

                    showConfirmButton: false,

                    timer: 2000

                })





            }



        });

    }

</script>

<script>

    function attend_member(valu) {

        var attend = [];

        var mem_id_fk = [];



        $(".attend:radio:checked").each(function () {

            attend.push($(this).val());

        })

        $(".mem_id_fk").each(function () {

            mem_id_fk.push($(this).val());

        })

        if (mem_id_fk.length !== attend.length) {

            alert("من فضلك ادخل البيانات كامله");

            return;

        }

        $.ajax({

            type: 'post',

            url: "<?php echo base_url();?>md/all_glasat/Start_galsa/update_member_hdoor",

            data: {mem_id_fk: mem_id_fk, attend: attend},





            success: function (d) {

                Swal.fire({

                    // position: 'top-end',

                    type: 'success',

                    title: 'تم تسجيل الحضور بنجاح',

                    showConfirmButton: false,

                    timer: 1000

                })

            }



        });



    }

</script>

<script>

    function make_not_read(valu) {

        $('#mehar' + valu).prop('readonly', false);

    }

</script>

<script>

    function startgalsa() {

        var glsa_rkm = $('#glsa_rkm').val();



        $.ajax({

            type: 'post',

            url: "<?php echo base_url();?>md/all_glasat/Start_galsa/start_galsa_time",

            data: {glsa_rkm: glsa_rkm},

            success: function (d) {

                $('#tim').text(d);

            }



        });

    }



</script>

<script>

    function end_galsa3() {



        var glsa_rkm = $('#glsa_rkm').val();



        $.ajax({

            type: 'post',

            url: "<?php echo base_url();?>md/all_glasat/Start_galsa/end_galsa",

            data: {glsa_rkm: glsa_rkm},

            success: function (d) {

                // $('#tim').text(d);

                alert(d);

            }



        });



    }

</script>

<script>

    function end_galsa() {



        var numItems = $('.num_mahawer').length;

        if (numItems != 0) {

            Swal.fire(

                'تحذير!',

                'قم بانهاء جميع المحاور اولا قبل انهاء الجلسه .',

            );

            return;

        }

        var title = "هل انت متأكد من انهاء الجلسه؟";

        var confirm = "نعم, قم بالانهاء";

        var text2 = "عند الضغط علي نعم سيتم انهاء  الجلسه";

        Swal.fire({

            title: title,

            text: text2,

            type: 'warning',

            showCancelButton: true,

            confirmButtonColor: '#3085d6',

            cancelButtonColor: '#d33',

            cancelButtonText: 'ليس الان',

            confirmButtonText: confirm

        }).then((result) => {

                if (result.value) {

                    var glsa_rkm = $('#glsa_rkm').val();



                    Swal.fire({

                        title: 'هل تريد طباعة المحضر ؟',

                        type: 'warning',



                        showCancelButton: true,

                        confirmButtonColor: '#3085d6',

                        cancelButtonColor: '#d33',

                        cancelButtonText: 'لا',

                        confirmButtonText: 'نعم'

                    }).then((result) => {

                        $.ajax({

                            type: 'post',

                            url: "<?php echo base_url();?>md/all_glasat/Start_galsa/end_galsa",

                            data: {glsa_rkm: glsa_rkm},

                            success: function (d) {

                                Swal.fire(

                                    'نجاح!',

                                    'تم انهاء الجلسه .',

                                )

                            }

                        });

                        if (result.value) {

                            window.location.href = "<?php echo base_url();?>human_resources/egtma3at/Egtma3at_c/print_mahdr/<?php

                                if ($last_galsa == 0) {

                                    echo $last_galsa_num = '';

                                } elseif ($last_galsa != 0) {

                                    echo $last_galsa_num = ($last_galsa - 1);

                                } ?>";

                        } else {

                            window.location.href = "<?php echo base_url();?>md/all_glasat/Start_galsa";

                        }

                    });





                }

            }

        )

    }

</script>







<script>

    function det_datiles_accept(glsa_rkm) {

        $.ajax({

            type: 'post',

            url: "<?=base_url() . 'md/all_glasat/Start_galsa/det_datiles_accept'?>",

            data: {

                glsa_rkm: glsa_rkm

            }, beforeSend: function () {

                $('#members_data').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');

            }, success: function (d) {



                $('#members_data').html(d);



            }

        });

    }

</script>

<script>



    function det_datiles_attend(glsa_rkm, attend) {

        $.ajax({

            type: 'post',

            url: "<?=base_url() . 'md/all_glasat/Start_galsa/det_datiles_hdoor'?>",

            data: {

                glsa_rkm: glsa_rkm,

                attend: attend

            }, beforeSend: function () {

                $('#members_data').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');

            }, success: function (d) {



                $('#members_data').html(d);





            }



        });



    }



</script>





<script>



    function print_hdoor(galsa_rkm) {



        var request = $.ajax({

            // print_resrv -- print_contract

            url: "<?=base_url() . 'md/all_glasat/Start_galsa/print_hdoor'?>",

            type: "POST",



            data: {galsa_rkm: galsa_rkm}

        });

        request.done(function (msg) {

            //this code for print

            var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0, orientation=landscape');

            WinPrint.document.write(msg);



            // WinPrint.document.close();

            //  WinPrint.focus();

            // WinPrint.print();

            //WinPrint.close();

            //    end code

        });

        request.fail(function (jqXHR, textStatus) {

            console.log("Request failed: " + textStatus);

        });



    }

</script>





<script>



    function get_count_hdoor() {

        var galsa_rkm = $('#galsa_rkm').val();

        var request = $.ajax({

            url: "<?=base_url() . 'md/all_glasat/Start_galsa/get_hdoor_num'?>",

            type: "POST",

            data: {galsa_rkm: galsa_rkm}

        });

        request.done(function (msg) {



            var data_num=JSON.parse(msg);

            $('#glsa_members_accept').html(data_num.glsa_members_accept);

            $('#glsa_members_refuse').html(data_num.glsa_members_refuse);

            $('#glsa_members_wait').html(data_num.glsa_members_wait);

            $('#glsa_members_no_action').html(data_num.glsa_members_no_action);

            $('#glsa_members_absent_num').html(data_num.glsa_members_absent_num);

            $('#glsa_members_hdoor_num').html(data_num.glsa_members_hdoor_num);



        });

        request.fail(function (jqXHR, textStatus) {

            console.log("Request failed: " + textStatus);

        });



    }

</script>



<script>

    function update_opened(id) {

        $.ajax({

            type: 'post',

            url: "<?php echo base_url();?>md/all_glasat/Start_galsa/change_status",

            data: {id: id},

            success: function (msg) {

                $('#gridCheck' + id).checked();



            }

        });

    }

</script>