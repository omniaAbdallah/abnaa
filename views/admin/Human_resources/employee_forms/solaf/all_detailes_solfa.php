<style>
    fieldset {
        border: 1px solid #ddd !important;
        margin: 0;
        xmin-width: 0;
        padding: 10px;
        position: relative;
        border-radius: 4px;
        background-color: #f5f5f5;
        padding-left: 10px !important;
    }

    legend {
        font-size: 14px;
        font-weight: bold;
        margin-bottom: 0px;
        width: 35%;
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 5px 5px 5px 10px;
        background-color: #ffffff;
    }
</style>
<style type="text/css">
    @import url(<?php echo base_url()?> asisst/admin_asset/fonts/ht/HacenTunisia.css);
    @import url(<?php echo base_url()?> asisst/admin_asset/fonts/hl/HacenLinerScreen.css);
    @import url(<?php echo base_url()?> asisst/admin_asset/fonts/ge/ge.css);

    body {
        font-family: 'hl';
    }

    .main-body {
        background-image: url(<?php echo base_url()?>asisst/admin_asset/img/paper-bg.png);
        background-position: 100% 100%;
        background-size: 100% 100%;
        background-repeat: no-repeat;
        -webkit-print-color-adjust: exact !important;
        height: 295mm;
    }

    .print_forma {
        padding: 100px 0 50px 0;
        /*border:1px solid #73b300;*/
    }

    .piece-box {
        /*margin-bottom: 12px;*/
        display: inline-block;
        width: 100%;
    }

    .piece-heading {
        background-color: #c3c3c3;
        display: inline-block;
        float: right;
        width: 100%;
    }

    .piece-heading h5 {
        color: #000;
        padding: 2px 0;
        font-family: 'hl';
        font-size: 20px;
    }

    .piece-body {
        width: 100%;
        float: right;
    }

    .bordered-bottom {
        border-bottom: 4px solid #9bbb59;
    }

    .piece-footer {
        display: inline-block;
        float: right;
        width: 100%;
        border-top: 1px solid #73b300;
    }

    .piece-heading h5 {
        margin: 4px 0;
    }

    .piece-box table {
        margin-bottom: 6px;
        font-size: 17px;
    }

    .piece-box table th,
    .piece-box table td {
        /*padding: 2px 8px !important;*/
    }

    .piece-box .table > thead > tr > th,
    .piece-box .table > tbody > tr > th,
    .piece-box .table > tfoot > tr > th,
    .piece-box .table > thead > tr > td,
    .piece-box .table > tbody > tr > td,
    .piece-box .table > tfoot > tr > td {
        text-align: center;
    }

    h6 {
        font-size: 16px;
        margin-bottom: 3px;
        margin-top: 3px;
    }

    .print_forma table th {
        text-align: right;
    }

    .print_forma table tr th {
        vertical-align: middle;
    }

    .no-padding {
        padding: 0;
    }

    .main-title {
        display: table;
        text-align: center;
        position: relative;
        height: 120px;
        width: 100%;
    }

    .main-title h4 {
        display: table-cell;
        vertical-align: bottom;
        text-align: center;
        width: 100%;
    }

    .print_forma hr {
        border-top: 1px solid #73b300;
        margin-top: 7px;
        margin-bottom: 7px;
    }

    .no-border {
        border: 0 !important;
    }

    .gray_background {
        background-color: #eee;
    }

    @media print {
        .table-bordered.double > thead > tr > th,
        .table-bordered.double > tbody > tr > th,
        .table-bordered.double > tfoot > tr > th,
        .table-bordered.double > thead > tr > td,
        .table-bordered.double > tbody > tr > td,
        .table-bordered.double > tfoot > tr > td {
            border: 2px solid #000 !important;
        }

        .table-bordered.white-border th,
        .table-bordered.white-border td {
            border: 1px solid #fff !important
        }
    }

    @page {
        size: 210mm 297mm;
        margin: 0;
    }

    .open_green {
        background-color: #e6eed5;
    }

    .closed_green {
        background-color: #cdddac;
    }

    .table-bordered.double {
        border: 5px double #000;
    }

    .table-bordered > thead > tr > th,
    .table-bordered > tbody > tr > th,
    .table-bordered > tfoot > tr > th,
    .table-bordered > thead > tr > td,
    .table-bordered > tbody > tr > td,
    .table-bordered > tfoot > tr > td {
        border: 2px solid #000;
    }

    .under-line {
        border-top: 1px solid #abc572;
        padding-left: 0;
        padding-right: 0;
    }

    span.valu {
        padding-right: 10px;
        font-weight: 600;
        font-family: sans-serif;
    }

    .under-line .col-xs-3,
    .under-line .col-xs-4,
    .under-line .col-xs-6,
    .under-line .col-xs-8 {
        border-left: 1px solid #abc572;
    }

    .bond-header {
        height: 100px;
        margin-bottom: 30px;
    }

    .bond-header .right-img img,
    .bond-header .left-img img {
        width: 100%;
        height: 100px;
    }

    .main-bond-title {
        display: table;
        height: 100px;
        text-align: center;
        width: 100%;
    }

    .main-bond-title h3 {
        display: table-cell;
        vertical-align: bottom;
        color: #d89529;
    }

    .main-bond-title h3 span {
        border-bottom: 2px solid #006a3a;
    }

    .green-border span {
        border: 6px double #000;
        padding: 8px 25px;
        border-radius: 10px;
        box-shadow: 2px 2px 5px 2px #000;
    }

    .table-bordered > tbody > tr.rosasy-bg td {
        background-color: #eee !important;
        border: 1px solid #eee !important;
        padding: 4px 2px;
    }

    .hl {
        font-family: 'hl';
    }

    .footer-info {
        position: absolute;
        width: 100%;
        bottom: 70px;
    }

    .table-bordered > tbody > tr > td.white-bg {
        background-color: #fff !important;
        border: 1px solid #eee !important
    }

    .signatures h5 {
        margin: 2px 0;
    }
</style>
<div class="clearfix"></div>

<?php 
/*echo '<pre>';
print_r($solfa_data);
*/
$emp_data_show = 0;
if (isset($solfa_data) && (!empty($solfa_data))) {
    $solfa_data = $solfa_data[0];
    $emp_data_show = 1;
    ?>
    <div class="col-xs-12 ">
        <div class="piece-heading">
            <h5> بيانات السلفة</h5>
        </div>
    </div>
    <div class="piece-box" style="margin-top: 20px">
        <div class="piece-body">



            <!-- <div class="col-xs-12"> -->
            <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                <tbody>
                <tr class="rosasy-bg">
                    <td style=""><strong>رقم الطلب </strong></td>
                    <td class="white-bg"><?php echo $solfa_data->t_rkm; ?></td>
                    <td style="width: 135px;"><strong> تاريخ الطلب</strong></td>
                    <td class="white-bg"><?php echo $solfa_data->t_rkm_date_m; ?></td>
                    <td><strong>الرقم الوظيفي </strong></td>
                    <td class="white-bg"><?php echo $solfa_data->emp_code_fk; ?></td>
                    <td style="width: 150px;"><strong>اسم الموظف</strong></td>
                    <td class="white-bg"><?php echo $solfa_data->emp_name; ?></td>
                </tr>
                       </tbody>
            </table>
                      <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                <tbody>
                
                    <tr class="rosasy-bg">
                    <td><strong>المسمى الوظيفي </strong></td>
                    <td class="white-bg"><?php echo $solfa_data->job_title; ?></td>
                    <td><strong>الأدارة </strong></td>
                    <td class="white-bg"><?= $solfa_data->edara_n; ?></td>
                    <td><strong> القسم </strong></td>
                    <td class="white-bg"><?php echo $solfa_data->qsm_n; ?></td>
                    <td><strong> حد السلفة</strong></td>
                    <td class="white-bg"><?php echo $solfa_data->hd_solfa; ?></td>
                </tr>
                </tbody>
            </table>
            <!-- </div> -->
            <!-- <div class="col-xs-12"> -->
  
            <!-- </div> -->
            <!-- <div class="col-xs-12"> -->
            <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                <tbody>
                <tr class="rosasy-bg">

                    <td><strong>قيمه السلفه </strong></td>
                    <td class="white-bg"><?php echo $solfa_data->qemt_solaf; ?></td>
                    <td><strong> عدد الاقساط </strong></td>
                    <td class="white-bg"><?php echo $solfa_data->qst_num; ?></td>
                    <td><strong>قيمه القسط </strong></td>
                    <td class="white-bg"><?php echo $solfa_data->qemt_solaf / $solfa_data->qst_num; ?></td>
                    <td><strong> تاريخ بدايه الخصم</strong></td>
                    <td class="white-bg"><?php echo $solfa_data->khsm_form_date_m; ?></td>

                </tr>
                </tbody>
            </table>
            <!-- </div> -->
            <!-- <div class="col-xs-12"> -->
    
            <!-- </div> -->
            <!-- <div class="col-xs-12"> -->
            <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                <tbody>
                <tr class="rosasy-bg">
                                     <td><strong> تاريخ نهاية الخصم</strong></td>
                    <td class="white-bg"><?php echo $solfa_data->khsm_to_date_m; ?></td>
                    <td><strong> طريقه سداد السلفه </strong></td>
                    <td class="white-bg"><?php if ($solfa_data->sadad_solfa == 1) {
                            echo 'دفع نقدا';
                        } elseif ($solfa_data->sadad_solfa == 2) {
                            echo ' تخصم مره واحده علي الراتب';
                        } elseif ($solfa_data->sadad_solfa == 3) {
                            echo 'تخصم شهريا علي الراتب';
                        }
                        ?>
                    </td>
                    <td><strong> تاريخ اخر سلفه</strong></td>
                    <td class="white-bg"><?php echo $solfa_data->previous_request_date_m; ?></td>
                    <td><strong>سبب السلفه</strong></td>
                    <td class="white-bg"><?php echo $solfa_data->solaf_reason; ?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
<?php } ?>

<div class="clearfix"></div>

<?php if (isset($tageel_data) && (!empty($tageel_data))) { ?>
    <div class="col-xs-12 text-center">
        <div class="piece-heading">
            <h5> بيانات طلب التأجيل</h5>
        </div>
    </div>
    <div class="col-md-12">
        <div class="piece-box" style="margin-top: 20px">
            <div class="piece-body">
                <!-- <div class="col-xs-12"> -->
                <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                    <tbody>
                    <tr class="rosasy-bg">
                        <td style="width: 120px">رقم الطلب</td>
                        <td class="white-bg"><?php echo $tageel_data->t_rkm; ?></td>
                        <td style="width: 120px">تاريخ الطلب</td>
                        <td class="white-bg"><?php echo $tageel_data->t_rkm_date_m; ?></td>
                    </tr>
                    </tbody>
                </table>
                <?php if ($emp_data_show == 0) { ?>
                    <!-- <div class="col-xs-12"> -->
                    <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                        <tbody>
                        <tr class="rosasy-bg">
                            <td style="width: 150px;"><strong>اسم الموظف</strong></td>
                            <td class="white-bg"><?php echo $tageel_data->emp_name; ?></td>
                            <td><strong>الرقم الوظيفي </strong></td>
                            <td class="white-bg"><?php echo $tageel_data->emp_code_fk; ?></td>
                            <td><strong>المسمى الوظيفي </strong></td>
                            <td class="white-bg"><?php echo $tageel_data->mosma_wazefy_n; ?></td>
                        </tr>
                        </tbody>
                    </table>
                    <!-- </div> -->
                    <!-- <div class="col-xs-12"> -->
                    <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                        <tbody>
                        <tr class="rosasy-bg">
                            <td><strong>الأدارة </strong></td>
                            <td class="white-bg"><?= $tageel_data->edara_n; ?></td>
                            <td><strong> القسم </strong></td>
                            <td class="white-bg"><?php echo $tageel_data->qsm_n; ?></td>
                        </tr>
                        </tbody>
                    </table>

                <?php } ?>
                <!-- </div> -->
                <!-- <div class="col-xs-12"> -->
                <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                    <tbody>
                    <tr class="rosasy-bg">
                        <td style="width: 110px">التأجيل لشهر</td>
                        <td class="white-bg"><?php echo $tageel_data->for_month; ?></td>
                        <td style="width: 110px"> فئه التأجيل</td>
                        <td class="white-bg"><?php if ($tageel_data->fe2a_tagel == 1) {
                                echo ' أضافة للشهر القادم ';
                            } elseif ($tageel_data->fe2a_tagel == 2) {
                                echo '  أضافة لاخر شهر';
                            } elseif ($tageel_data->fe2a_tagel == 3) {
                                echo 'اعادة الجدوله علي الاشهر المتبقية';
                            } elseif ($tageel_data->fe2a_tagel == 4) {
                                echo 'زيادة شهر جديد';
                            }
                            ?></td>
                    </tr>
                    </tbody>
                </table>
                <!-- </div> -->
                <!-- <div class="col-xs-12"> -->
                <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                    <tbody>
                    <tr class="rosasy-bg">
                        <td style="width: 130px"> سبب التأجيل</td>
                        <td class="white-bg"><?php echo $tageel_data->tagel_reason; ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php } ?>

<div class="clearfix"></div>

<?php if (isset($ta3geel_data) && (!empty($ta3geel_data))) { ?>
    <div class="col-xs-12">
        <div class="piece-heading">
            <h5> بيانات طلب التعجيل</h5>
        </div>
    </div>
    <div class="col-md-12">
        <div class="piece-box" style="margin-top: 20px">
            <div class="piece-body">


                <!-- <div class="col-xs-12"> -->
                <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                    <tbody>
                    <tr class="rosasy-bg">
                        <td style="width: 120px">رقم الطلب</td>
                        <td class="white-bg"><?php echo $ta3geel_data->t_rkm; ?></td>
                        <td style="width: 120px">تاريخ الطلب</td>
                        <td class="white-bg"><?php echo $ta3geel_data->t_rkm_date_m; ?></td>
                    </tr>
                    </tbody>
                </table>
                <?php if ($emp_data_show == 0) { ?>
                    <!-- <div class="col-xs-12"> -->
                    <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                        <tbody>
                        <tr class="rosasy-bg">
                            <td style="width: 150px;"><strong>اسم الموظف</strong></td>
                            <td class="white-bg"><?php echo $ta3geel_data->emp_name; ?></td>
                            <td><strong>الرقم الوظيفي </strong></td>
                            <td class="white-bg"><?php echo $ta3geel_data->emp_code_fk; ?></td>
                            <td><strong>المسمى الوظيفي </strong></td>
                            <td class="white-bg"><?php echo $ta3geel_data->job_title; ?></td>
                        </tr>
                        </tbody>
                    </table>
                    <!-- </div> -->
                    <!-- <div class="col-xs-12"> -->
                    <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                        <tbody>
                        <tr class="rosasy-bg">
                            <td><strong>الأدارة </strong></td>
                            <td class="white-bg"><?= $ta3geel_data->edara_n; ?></td>
                            <td><strong> القسم </strong></td>
                            <td class="white-bg"><?php echo $ta3geel_data->qsm_n; ?></td>
                        </tr>
                        </tbody>
                    </table>

                <?php } ?>
                <!-- </div> -->
                <!-- <div class="col-xs-12"> -->
                <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                    <tbody>
                    <tr class="rosasy-bg">
                        <td style="width: 110px">السداد لشهر</td>
                        <td class="white-bg"> <?php
                            if (isset($solfa_quests) && (!empty($solfa_quests))) {
                                foreach ($solfa_quests as $key) {
                                    $allFields = unserialize($ta3geel_data->for_month);
                                    if (isset($allFields) && (!empty($allFields))) {
                                        if (in_array($key['id'], $allFields)) {
                                            echo $key['year'] . '-' . $key['month'];
                                            echo ',';
                                        }
                                    }
                                }
                            }
                            ?></td>
                        <td style="width: 110px"> فئه السداد</td>
                        <td class="white-bg">
                            <?php if ($ta3geel_data->fe2a_ta3gel == 1) {
                                echo ' نقدي ';
                            } elseif ($ta3geel_data->fe2a_ta3gel == 2) {
                                echo '  تحويل';
                            } elseif ($ta3geel_data->fe2a_ta3gel == 3) {
                                echo 'خصم من الراتب';
                            }
                            ?>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <!-- </div> -->
                <!-- <div class="col-xs-12"> -->
                <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                    <tbody>
                    <tr class="rosasy-bg">
                        <td style="width: 130px"> سبب السداد</td>
                        <td class="white-bg"><?php echo $ta3geel_data->ta3gel_reason; ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php } ?>

<div class="clearfix"></div>


<?php if (isset($solfa_quests) && (!empty($solfa_quests))) { ?>
    <fieldset>
        <legend> أقساط السلفة</legend>
        <div class="col-md-12">
            <table id="all_data" class="table table-striped table-bordered dt-responsive nowrap example"
                   cellspacing="0"
                   width="100%">
                <thead>
                <tr class="greentd">
                    <th class="text-center">رقم القسط</th>
                    <th class="text-center">تاريخ القسط</th>
                    <th class="text-center">قيمه القسط</th>
                    <th class="text-center">خلال شهر</th>
                    <th class="text-center">خلال عام</th>
                    <th class="text-center">الإجراء</th>
                </tr>
                </thead>
                <tbody class="text-center">
                <?php
                $total_solfa = 0;
                $total_paid = 0;
                $x = 0;
                foreach ($solfa_quests as $record) {
                    $total_solfa += $record['value_of_qst'];
                    if ($record['paid'] == 'yes') {
                        $total_paid += $record['value_of_qst'];
                    }
                    ?>
                    <tr>
                        <td class="white-bg"><?php echo($x + 1); ?></td>
                        <td class="white-bg"><?php echo $record['qst_date_ar']; ?> </td>
                        <td class="white-bg"><?php echo $record['value_of_qst']; ?> </td>
                        <td class="white-bg"><?php echo $record['month']; ?></td>
                        <td class="white-bg"><?php echo $record['year']; ?></td>
                        <td class="white-bg">
                            <?php if ($record['paid'] == 'no') { ?>
                                <button class="btn btn-primary btn-sm">غير مسدد</button>
                            <?php } else { ?>
                                <button class="btn btn-success btn-sm"> تم السداد
                                </button>
                            <?php } ?>
                        </td>
                    </tr>
                    <?php $x++;
                } ?>
                </tbody>
                <tfoot>
                <tr>
                    <td  style="text-align: center;font-size: 20px;">اجمالي السلفه</td>
                    <td class="white-bg" style="background-color: #086bbf;color: white;text-align: center;font-size: 20px;"><?= $total_solfa ?></td>
                    <td style="text-align: center;font-size: 20px;"> المسدد</td>
                    <td class="white-bg" style="background-color: #0aa942;color: white;text-align: center;font-size: 20px;"><?= $total_paid ?></td>
                    <td style="text-align: center;font-size: 20px;"> المتبقي</td>
                    <td class="white-bg" style="background-color: #d44b4b;color: white;text-align: center;font-size: 20px;"><?= $total_solfa - $total_paid ?></td>
                </tr>
                </tfoot>
            </table>
        </div>
    </fieldset>
    <script>
        $('#all_data').DataTable({
            dom: 'Bfrtip',
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
            colReorder: true,
            destroy: true
        });
    </script>
<?php } ?>


