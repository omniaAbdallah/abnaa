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

<?php
/*
echo '<pre>';
print_r($last_galsa);*/
?>
<?php if ($last_galsa != 0) { ?>
<div class="col-xs-12">


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
                            ?></span></td>
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
                        <input type="hidden" name="glsa_rkm" id="glsa_rkm" value="<?= $last_galsa_date->glsa_rkm ?>"/>
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
    <?php
    if (isset($last_galsa) && !empty($last_galsa)) { ?>
    <div class="panel-body">
        <div class="col-sm-12">

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
                                            <a style="font-size: 16px;" role="button" data-toggle="collapse"
                                               data-parent="#accordion"
                                               href="#collapseOne<?php echo $row->id; ?>"
                                               aria-expanded="true"
                                               aria-controls="collapseOne<?php echo $row->id; ?>">
                                                <?php echo $row->mehwar_rkm . '-'; ?>

                                                <?php echo $row->mehwar_title; ?>
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
                                                    <td style="width: 90px">عرض المرفق
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if ($row->mehwar_morfaq !== 0) {
                                                            $ext = pathinfo($row->mehwar_morfaq, PATHINFO_EXTENSION);
                                                            $image = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP');
                                                            $file = array('pdf', 'PDF', 'xls', 'xlsx', ',doc', 'docx', 'txt');
                                                            ?>
                                                            <?php
                                                            if (in_array($ext, $image)) {
                                                                ?>
                                                                <button class="btn btn-warning" data-toggle="modal" data-target="#myModal-view-<?= $row->id ?>">عرض المرفق</button>
                                                                <div class="modal fade" id="myModal-view-<?= $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                                    <div class="modal-dialog modal-lg" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                                <h4 class="modal-title" id="myModalLabel">الصورة</h4>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <img src="<?= base_url() . "uploads/md/all_mehwr_gam3ia_omomia/" . $row->mehwar_morfaq ?>" width="100%">
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                            } elseif (in_array($ext, $file)) {
                                                                ?>
                                                                <a data-toggle="modal" data-target="#myModal-view-pdf-<?= $row->id ?>">
                                                                    <i class="fa fa-eye" title=" قراءة"></i>
                                                                </a>

                                                                <div class="modal fade" id="myModal-view-pdf-<?= $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                                    <div class="modal-dialog modal-lg" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                                <h4 class="modal-title" id="myModalLabel">الصورة</h4>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <iframe src="<?= base_url() . "md/all_mehwr_gam3ia_omomia/All_mehwr_gam3ia_omomia/read_file/" . $row->mehwar_morfaq ?>" style="width: 100%; height:  640px;" frameborder="0"></iframe>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>


                                                            <?php
                                                        }
                                                        ?>


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
<!--                     <h4 class="heading-fasel col-md-3">البنود المنتهي مناقشتها</h4>
-->
                    <div class="col-md-12">
                        <h4 class="heading-fasel col-md-3">البنود المنتهي مناقشتها</h4>
                        <div class="col-md-3"></div>


                        <div class="col-md-3"></div>
                        <h4  class="heading-fasel col-md-3" data-toggle="modal" data-target="#exampleModal"  onclick="load_add_mehwar(<?=$last_galsa?>)" >اضافة محور </h4>

                    </div>
                    <div class="col-md-12 update" id="mahawer_end">
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
                                                    <?php
                                                    if ($row->mehwar_morfaq !== 0) {
                                                        $ext = pathinfo($row->mehwar_morfaq, PATHINFO_EXTENSION);
                                                        $image = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP');
                                                        $file = array('pdf', 'PDF', 'xls', 'xlsx', ',doc', 'docx', 'txt');
                                                        ?>
                                                        <!--    <td style="width: 100px">المرفق</td> -->
                                                        <?php
                                                        if (in_array($ext, $image)) {
                                                            ?>
                                                            <button class="btn btn-warning"
                                                                    data-toggle="modal"
                                                                    data-target="#myModal-view-<?= $row->id ?>">
                                                                عرض المرفق
                                                            </button>
                                                            <?php
                                                        } elseif (in_array($ext, $file)) {
                                                            ?>
                                                            <a target="_blank"
                                                               href="<?= base_url() . "md/all_mehwr_gam3ia_omomia/All_mehwr_gam3ia_omomia/read_file/" . $row->mehwar_morfaq ?>">
                                                                <i class="fa fa-eye"
                                                                   title=" قراءة"></i>عرض المرفق
                                                            </a>
                                                            <?php
                                                        }
                                                        ?>
                                                        <div class="modal fade"
                                                             id="myModal-view-<?= $row->id ?>"
                                                             tabindex="-1"
                                                             role="dialog"
                                                             aria-labelledby="myModalLabel">
                                                            <div class="modal-dialog modal-lg"
                                                                 role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button"
                                                                                class="close"
                                                                                data-dismiss="modal"
                                                                                aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                        <h4 class="modal-title"
                                                                            id="myModalLabel">
                                                                            الصورة</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <img src="<?= base_url() . "uploads/md/all_mehwr_gam3ia_omomia/" . $row->mehwar_morfaq ?>"
                                                                             width="100%">
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                                class="btn btn-default"
                                                                                data-dismiss="modal">
                                                                            إغلاق
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                </td>
                                                <td><?php echo $row->mehwar_title; ?></td>
                                                <td style="width: 100px">الإجراء</td>
                                            </tr>
                                            <tr>
                                                <td>القرار</td>
                                                <td><textarea
                                                            onfocus="$('.mehar<?php echo $row->id; ?>').hide();"
                                                            onclick="make_not_read(<?php echo $row->id; ?>);"
                                                            readonly
                                                            id="mehar<?php echo $row->id; ?>"
                                                            class="form-control col-md-12" rows="">
<?php echo $row->elqrar; ?>
</textarea></td>
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

                <?php } else { ?>
                    <div class="alert alert-danger">عفوا!...لاتوجد جلسات مفتوحه</div>
                <?php } ?>
            </div>
        </div>
        </div>
             </div>
        <?php } else {
            ?>
            <div class="alert alert-danger">عفوا !......لاتوجد جلسات مفتوحه</div>
        <?php } ?>

        <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document" style="width: 85%">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">تفاصيل الأعضاء</h4>
                    </div>
                    <br>
                    <div class="modal-body form-group col-sm-12 col-xs-12" id="load_members">

                        <?php if (isset($members) && !empty($members)) {
                            ?>
                            <div class="container col-md-12">
                                <table id="mem" class="  display table table-bordered   responsive nowrap"
                                       cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th scope="col">م</th>
                                        <th scope="col">إسم العضو</th>
                                        <th scope="col">المنصب الإداري</th>
                                        <th scope="col">حالة الحضور</th>
                                        <th scope="col">طبيعة الحضور</th>
                                        <th scope="col">النائب</th>
                                        <th scope="col">الإجراء</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $x = 1;
                                    foreach ($members as $row) {
                                        ?>
                                        <tr id="member_row<?php echo $row->id; ?>">
                                            <td><?php echo $x++; ?></td>
                                            <td><?php echo $row->mem_name;; ?></td>
                                            <td><?php echo  $row->mansp_title; ?></td>
                                            <input type="hidden" class="mem_id_fk"
                                                   name="mem_id_fk<?php echo $row->mem_id_fk; ?>"
                                                   id="mem_id_fk<?php echo $row->mem_id_fk; ?>"
                                                   value="<?php echo $row->mem_id_fk; ?> "/>
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
                                            <td>
                                                <select name="member_id<?php echo $row->mem_id_fk; ?>" disabled
                                                        class="form-control selectpicker" data-show-subtext="true"
                                                        data-live-search="true"
                                                        onclick="$('#member_name<?php echo $row->mem_id_fk; ?>').val($('option:selected',$('#member_id<?php echo $row->mem_id_fk; ?>')).text())"
                                                        id="member_id<?php echo $row->mem_id_fk; ?>">
                                                    <option value=""> - اختر -</option>
                                                    <?php foreach ($members as $member) {
                                                        if ($member->mem_id_fk == $row->mem_id_fk) {
                                                            continue;
                                                        } ?>
                                                        <option value="<?= $member->mem_id_fk ?>" <?php if ($member->mem_id_fk == $row->mem_id_fk) echo 'selected'; ?> ><?php echo  $member->mem_name; ?> </option>
                                                    <?php } ?>
                                                </select>
                                                <input type="hidden" value="" name="member_name<?php echo $row->mem_id_fk; ?>"
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


        <div class="modal" id="myModal_1" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document" style="width: 80%">
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
        <div class="modal" id="exampleModal" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document" style="width: 80%">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title" >اضافة محور</h5>
                    </div>
                    <br>
                    <div class="modal-body container-fluid" id="load_add_mehwar">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-labeled btn-danger" data-dismiss="modal">
                            <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>اغلاق
                        </button>
                        <button type="button" class="btn btn-labeled btn-success"
                                onclick="add_mehwer(<?= $last_galsa ?>)"
                                id="save" name="note_save" value="save">
                            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>اضافة
                        </button>
                    </div>
                </div>
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
        setInterval(get_count_hdoor, (1000 * 60 * 1));
        load_end_mehwar(<?=$last_galsa?>);
       /* load_members(<?=$last_galsa?>);*/
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
        var member_name =  $('option:selected',$('#member_id'+memb_id)).text();
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
    function make_not_read(valu) {
        $('#mehar' + valu).prop('readonly', false);
    }
</script>
<script>
    function startgalsa() {

        var glsa_rkm = $('#glsa_rkm').val();
        //   alert(glsa_rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>md/all_glasat/Start_galsa/start_galsa_time",
            data: {glsa_rkm: glsa_rkm},
            success: function (d) {
                $('#tim').text(d);
                window.location.reload();
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
        var title = "هل انت متأكد من انهاء الجلسة";
        var confirm = "نعم, قم بالانهاء";
        var text2 = "عند الضغط علي نعم سيتم انهاء  الجلسة";
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
                            window.location.href = "<?php echo base_url();?>md/all_glasat/Start_galsa/print_mahdr/<?php
                                if ($last_galsa == 0) {
                                    echo $last_galsa_num = '';
                                } elseif ($last_galsa != 0) {
                                    echo $last_galsa_num = ($last_galsa);
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
<!-- yara 30-6-2020 -->
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
<!-- yara 30-6-2020 -->


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

    function load_add_mehwar(glsa_rkm) {
        $.ajax({
            type: 'post',
            url: "<?=base_url() . 'md/all_glasat/Start_galsa/load_add_mehwar'?>",
            data: {
                glsa_rkm: glsa_rkm
            }, beforeSend: function () {
                $('#load_add_mehwar').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            }, success: function (d) {

                $('#load_add_mehwar').html(d);

            }
        });
    }
    function load_end_mehwar(glsa_rkm) {
        $.ajax({
            type: 'post',
            url: "<?=base_url() . 'md/all_glasat/Start_galsa/load_end_mhawer'?>",
            data: {
                glsa_rkm: glsa_rkm
            }, beforeSend: function () {
                $('#mahawer_end').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            }, success: function (d) {

                $('#mahawer_end').html(d);

            }
        });
    }   function load_members(glsa_rkm) {
        $.ajax({
            type: 'post',
            url: "<?=base_url() . 'md/all_glasat/Start_galsa/load_members'?>",
            data: {
                glsa_rkm: glsa_rkm
            }, beforeSend: function () {
                $('#load_members').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            }, success: function (d) {

                $('#load_members').html(d);

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
            url: "<?=base_url() . 'md/all_glasat/Start_galsa/print_hdoor'?>",
            type: "POST",

            data: {galsa_rkm: galsa_rkm}
        });
        request.done(function (msg) {
            var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0, orientation=landscape');
            WinPrint.document.write(msg);

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

            var data_num = JSON.parse(msg);

            $('#glsa_members_accept').html(data_num.glsa_members_accept);
            $('#glsa_members_refuse').html(data_num.glsa_members_refuse);
            $('#glsa_members_wait').html(data_num.glsa_members_wait);
            $('#glsa_members_no_action').html(data_num.glsa_members_no_action);

        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });

    }
</script>



<script>
    function add_mehwer(galsa_rkm) {

        <?php $count = 0;

        if (!empty($mahawer)) {
            $count += count($mahawer);
        } else {
            $count += 0;
        }
        if (!empty($mahawer_end)) {
            $count += count($mahawer_end);
        } else {
            $count += 0;
        } ?>

        var all_inputs = $(' #myform_mehwr_glsa [data-validation="required"]');
        var valid = 1;
        var text_valid ='';
        all_inputs.each(function (index, elem) {
            console.log(elem.id + $(elem).val());
            console.log("lenthe" + $(elem).val().length);
            if ($(elem).val().length >= 1) {
                $(elem).css("border-color", "green");
            } else {
                valid = 0;
                $(elem).css("border-color", "red");
            }
        });
        var mehwar_vote = $("input[name='mehwar_vote']:checked").val();
        var vote_type = $("input[name='vote_type']:checked").val();
        if (!mehwar_vote) {
            valid = 0;
            text_valid += "- خاضع للتصويت ";
        } else if (mehwar_vote == 1) {
            if (!vote_type) {
                valid = 0;
                text_valid += "-نوع التصويت ";
            }
        }
        var files = $('#mehwar_morfaq')[0].files;
        var x = $("#myform_mehwr_glsa").serializeArray();
        var form_data = new FormData();
        form_data.append("mehwar_morfaq", files[0]);
        $.each(x, function(i, field) {
            form_data.append(field.name, field.value);
        });

        $.ajax({
            type: 'post',
            url: '<?php echo base_url() . 'md/all_glasat/Start_galsa/insert_mehwor_qrar/'?>'+galsa_rkm,
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function (xhr) {
                if (valid == 0) {
                    Swal.fire({
                        title: 'من فضلك ادخل كل الحقول ',
                        text:text_valid,
                        icon: 'error',
                        timer: 2000

                    });
                    xhr.abort();
                } else if (valid == 1) {
                    Swal.fire({
                        title: "جاري الحفظ ... ",
                        text: "",
                        imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                        showConfirmButton: false,
                        allowOutsideClick: false
                    });
                }
            },

            success: function (d) {
                $('#mahawer_end').html(d);
                Swal.fire({
                    type: 'success',
                    title: 'تم حفظ القرار بنجاح ',
                    showConfirmButton: false,
                    timer: 2000
                });
                $('#exampleModal').modal('hide');
            }

        });

    }
</script>
