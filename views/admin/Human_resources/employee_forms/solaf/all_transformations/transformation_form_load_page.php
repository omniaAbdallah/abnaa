<style>
    .nonactive {
        pointer-events: none;
        cursor: not-allowed;
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

<?php $arr = array(1 => 'دفع نقدا', 2 => 'تخصم مره واحده علي الراتب', 3 => ' تخصم شهريا علي الراتب'); ?>
<?php $arr_select_lable = array(1 => 'الموظف المختص في الشئون الإدارية:',
    2 => 'مدير الموارد البشرية',
    3 => 'المحاسب',
    4 => 'مدير الشئون الماليةو الإدارية',
    5 => 'مدير العام'); ?>

<div class="modal-body">
    <div class="col-sm-10 padding-4">


        <form enctype="multipart/form-data" method="post" id="form1"
              action="<?php echo base_url() ?>human_resources/employee_forms/solaf/All_transformations/save_Transform">
            <?php if (isset($_POST['from_profile']) && ($_POST['from_profile'] == 1)) { ?>
                <input type="hidden" name="from_profile" id="from_profile" value="1">
            <?php } ?>
            <input type="hidden" name="solaf_rkm_fk" id="solaf_rkm_fk" value="<?= $solaf_data->t_rkm ?>">
            <input type="hidden" name="solaf_id_fk" id="solaf_id_fk" value="<?= $solaf_data->id ?>">
            <input type="hidden" name="from_user" id="from_user" value="<?= $solaf_data->current_to_user_id ?>">
            <input type="hidden" name="emp_id_fk" id="emp_id_fk" value="<?= $solaf_data->emp_id_fk ?>">

            <input type="hidden" name="to_user_n" id="to_user_n" value="">


            <div class="piece-box" style="margin-top: 20px">
                <div class="piece-body">
                    <?php if ($solaf_data->current_to_user_id == $_SESSION['user_id'] && $solaf_data->level == 1) { ?>
                        <input type="hidden" name="level" id="level" value="2">

                        <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                            <tbody>
                            <tr>
                                <td>الإسم</td>
                                <td colspan="2"><?= $solaf_data->emp_name ?></td>
                                <td>الرقم الوظيفي</td>
                                <td><?= $solaf_data->emp_code_fk ?></td>
                                <td>الوظيفة</td>
                                <td colspan="2"><?= $solaf_data->job_title ?></td>

                            </tr>
                            <tr>
                                <td>مبلغ السلفة</td>
                                <td colspan="2"><?= $solaf_data->qemt_solaf ?></td>
                                <td>طريقة السداد</td>
                                <td colspan="4"><?php if (key_exists($solaf_data->sadad_solfa, $arr)) {
                                        echo $arr[$solaf_data->sadad_solfa];
                                    } else {
                                        echo "غير محدد";
                                    } ?></td>

                            </tr>
                            <tr>
                                <td>عدد الاقساط</td>
                                <td><?= $solaf_data->qst_num ?></td>
                                <td>قيمة القسط</td>
                                <td><?= $solaf_data->qemt_solaf / $solaf_data->qst_num ?></td>
                                <td>تاريخ اول قسط</td>
                                <td><?= $solaf_data->khsm_form_date_m ?></td>
                                <td>تاريخ اخر قسط</td>
                                <td><?= $solaf_data->khsm_to_date_m ?></td>

                            </tr>
                            <tr>
                                <td>الغرض من السلفة</td>
                                <td colspan="7"><?= $solaf_data->solaf_reason ?></td>
                            </tr>
                            <tr>
                                <td>تقيم الموظف</td>
                                <td colspan="7">
                                    <div class="radio-content">
                                        <input type="radio" id="taqeem-1" name="taqeem" value="1">
                                        <label class="radio-label" for="taqeem-1">ممتاز</label></div>
                                    <div class="radio-content">
                                        <input type="radio" id="taqeem-2" name="taqeem" value="2">
                                        <label class="radio-label" for="taqeem-2">جيد جداً</label></div>
                                    <div class="radio-content">
                                        <input type="radio" id="taqeem-3" name="taqeem" value="3">
                                        <label class="radio-label" for="taqeem-3">جيد</label></div>
                                    <div class="radio-content">
                                        <input type="radio" id="taqeem-4" name="taqeem" value="4">
                                        <label class="radio-label" for="taqeem-4">مقبول</label></div>
                                    <div class="radio-content">
                                        <input type="radio" id="taqeem-5" name="taqeem" value="5">
                                        <label class="radio-label" for="taqeem-5">سيئ</label></div>
                                </td>
                            </tr>
                            <tr>
                                <td> يوصي بالصرف:</td>
                                <td colspan="2">
                                    <div class="radio-content">
                                        <input type="radio" onclick="$('#reason_action1').attr('disabled','TRUE');
                        $('#reason_action1').val('');" id="tahod-1" name="action" value="1">
                                        <label class="radio-label" for="tahod-1">يوصي</label>

                                    </div>
                                </td>
                                <td colspan="5">
                                    <div class="radio-content">
                                        <input type="radio" name="action"
                                               onclick="$('#reason_action1').removeAttr('readonly');" id="tahod-2"
                                               value="2">
                                        <label class="radio-label" for="tahod-2">لا اوصي
                                            <input size="60" type="text" readonly name="reason_action"
                                                   id="reason_action1"
                                                   placeholder=" ...................">
                                        </label>
                                    </div>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    <?php } ?>
                    <?php if ($solaf_data->current_to_user_id == $_SESSION['user_id'] && ($solaf_data->level == 2 || $solaf_data->level == 3)) { ?>
                        <input type="hidden" name="level" id="level" value="<?= $solaf_data->level + 1 ?>">

                        <div class="col-xs-12">
                            <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                                <tbody>
                                <tr class="rosasy-bg">
                                    <td style="width: 120px">الراتب الأساسي</td>
                                    <td class="white-bg"><?php if (isset($emp_data->finance_Data) && !empty($emp_data->finance_Data)) {
                                            echo $emp_data->finance_Data['rateb_asasy']->value;
                                        } ?></td>
                                    <td style="width: 120px">+ البدلات الثابتة</td>
                                    <td class="white-bg"><?php if (isset($emp_data->finance_Data) && !empty($emp_data->finance_Data)) {
                                            echo $emp_data->finance_Data['get_having_value'] - $emp_data->finance_Data['rateb_asasy']->value;
                                        } ?></td>
                                    <td style="width: 100px">= إجمالي</td>
                                    <td class="white-bg"><?php if (isset($emp_data->finance_Data) && !empty($emp_data->finance_Data)) {
                                            echo $emp_data->finance_Data['get_having_value'];
                                        } ?></td>
                                    <td style="width: 100px">صافي المرتب</td>
                                    <td class="white-bg"> <?php if (isset($emp_data->finance_Data) && !empty($emp_data->finance_Data)) {
                                            echo $emp_data->finance_Data['get_having_value'] - $emp_data->finance_Data['get_discut_value'];
                                        } ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-xs-12">
                            <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                                <tbody>
                                <tr class="rosasy-bg">
                                    <td style="width: 110px">حد السلفة</td>
                                    <td class="white-bg"><?php echo $solaf_data->hd_solfa; ?></td>
                                    <td style="width: 110px">تاريخ التعيين</td>
                                    <td class="white-bg"><?php if (isset($emp_data->start_work_date_m) && !empty($emp_data->start_work_date_m)) {
                                            echo $emp_data->start_work_date_m;
                                        } ?></td>
                                    <td style="width: 160px">مستحقات نهاية الخدمة</td>
                                    <td class="white-bg"><?php if (isset($emp_data->reward_end_work) && !empty($emp_data->reward_end_work)) {
                                            if ($emp_data->reward_end_work == 1) {
                                                echo "نعم";
                                            } elseif ($solaf_data->reward_end_work == 2) {
                                                echo "لا";

                                            }
                                        } ?></td>

                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="col-xs-12">
                            <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                                <tbody>
                                <tr class="rosasy-bg">
                                    <td>هل توجد على الموظف سلفة قائمة ؟</td>
                                    <td style="width: 110px" class="white-bg">
                                        <?php if ($solaf_data->solaf_qaema != 0) {
                                            if ($solaf_data->solaf_qaema == 1) {
                                                echo "نعم";
                                            } elseif ($solaf_data->solaf_qaema == 2) {
                                                echo "لا";
                                            }
                                        } else { ?>
                                            <div class="radio-content">
                                                <input type="radio" id="solaf_qaema-1" name="solaf_qaema" value="1">
                                                <label class="radio-label" for="solaf_qaema-1">نعم</label></div>
                                            <div class="radio-content">
                                                <input type="radio" id="solaf_qaema-2" name="solaf_qaema" value="2">
                                                <label class="radio-label" for="solaf_qaema-2">لا</label></div>
                                        <?php } ?>

                                    </td>
                                    <td>هل توجد على الموظف أية مطالبات ؟</td>
                                    <td style="width: 110px"
                                        class="white-bg"> <?php if ($solaf_data->emp_motalbat != 0) {
                                            if ($solaf_data->emp_motalbat == 1) {
                                                echo "نعم";
                                            } elseif ($solaf_data->emp_motalbat == 2) {
                                                echo "لا";
                                            }
                                        } else { ?>
                                            <div class="radio-content">
                                                <input type="radio" id="emp_motalbat-1" name="emp_motalbat" value="1">
                                                <label class="radio-label" for="emp_motalbat-1">نعم</label></div>
                                            <div class="radio-content">
                                                <input type="radio" id="emp_motalbat-2" name="emp_motalbat" value="2">
                                                <label class="radio-label" for="emp_motalbat-2">لا</label></div>
                                        <?php } ?>

                                    </td>

                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="col-xs-12">
                            <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                                <tbody>
                                <tr class="rosasy-bg">
                                    <td>عدد مرات السلف السابقة</td>
                                    <td class="white-bg"><?php echo $solaf_data->num_previous_requests; ?></td>
                                    <td style="width: 150px">تاريخ أخر سلفة</td>
                                    <td class="white-bg"><?php if ($solaf_data->num_previous_requests == 0) {
                                            echo " ";
                                        } else {
                                            echo $solaf_data->previous_request_date_m;
                                        } ?></td>

                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                            <tbody>


                            <?php if ($solaf_data->level == 3) { ?>
                                <tr>
                                    <td colspan="3" style="background-color:#e6eed5; border-color:#73b300">
                                        <div class="radio-content">
                                            <input type="radio" onclick="$('#reason_action1').attr('disabled','TRUE');
                                     $('#current_to_id_DirectManger').removeAttr('disabled');

                  $('#reason_action1').val('................');" id="tahod-1" name="action" value="1">
                                            <label class="radio-label" for="tahod-1">موافق</label>

                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="3" style="background-color:#ffb3b7; border-color:#73b300">

                                        <div class="radio-content">
                                            <input type="radio" name="action"
                                                   onclick="$('#reason_action1').removeAttr('disabled');$('#current_to_id_DirectManger').attr('disabled', 'disabled');"
                                                   id="tahod-2" value="2">
                                            <label class="radio-label" for="tahod-2">لا أوافق بسبب
                                                <input size="60" type="text" disabled name="reason_action"
                                                       id="reason_action1" value=" ...................">
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    <?php } ?>
                    <?php if ($solaf_data->current_to_user_id == $_SESSION['user_id'] && ($solaf_data->level == 4 || $solaf_data->level == 5)) { ?>
                        <input type="hidden" name="level" id="level" value="<?= $solaf_data->level + 1 ?>">

                        <div class="col-xs-12">
                            <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                                <tbody>
                                <tr class="rosasy-bg">
                                    <td style="width: 120px">حالة الرصيد</td>
                                    <td class="white-bg" colspan="2">
                                        <?php if ($solaf_data->rased_yasmah != 0) {
                                            $diabled_rased_yasmah = 'disabled';
                                        } else {
                                            $diabled_rased_yasmah = '';
                                        } ?>

                                        <div class="radio-content">
                                            <input type="radio" id="rased_yasmah-1" name="rased_yasmah"
                                                   value="1" <?= $diabled_rased_yasmah ?>>
                                            <label class="radio-label" for="rased_yasmah-1">يسمح</label></div>
                                        <div class="radio-content">
                                            <input type="radio" id="rased_yasmah-2" name="rased_yasmah"
                                                   value="2" <?= $diabled_rased_yasmah ?>>
                                            <label class="radio-label" for="rased_yasmah-2">لا يسمح </label></div>
                                        <?php if ($solaf_data->rased_yasmah != 0) { ?>
                                            <script>
                                                console.log("rased_yasmah-<?=$solaf_data->rased_yasmah?>");
                                                $("#rased_yasmah-<?=$solaf_data->rased_yasmah?>").attr("checked", "checked");
                                            </script>
                                        <?php } ?></td>
                                    <td style="width: 150px">تاريخ توفر الرصيد:</td>
                                    <?php if (!empty($solaf_data->rased_motah)) {
                                        $date = "$solaf_data->rased_motah";
                                        $read = 'readonly';
                                    } else {
                                        $date = date('Y-m-d');
                                        $read = '';
                                        if ($solaf_data->level == 5) {
                                            $read = 'readonly';
                                        }

                                    } ?>
                                    <td class="white-bg">
                                        <input type="date" class="form-control " name="rased_motah"
                                               value="<?php echo "$date"; ?>" <?= $read ?>>
                                    </td>

                                </tr>
                                </tbody>
                            </table>
                        </div>


                        <?php if ($solaf_data->level == 5) { ?>
                            <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                                <tbody>
                                <tr class="rosasy-bg">
                                    <td>رأى مدير الشئون المالية</td>
                                    <td class="white-bg" colspan="4">
                                        <div class="radio-content">
                                            <input type="radio" id="moder_mali_option-1" name="moder_mali_option"
                                                   value="1">
                                            <label class="radio-label" for="moder_mali_option-1">لا مانع من صرف
                                                السلفة</label>
                                        </div>
                                        <div class="radio-content">
                                            <input type="radio" id="moder_mali_option-2" name="moder_mali_option"
                                                   value="2">
                                            <label class="radio-label" for="moder_mali_option-2">يعتذر عن صرف
                                                السلفة</label>
                                        </div>
                                        <div class="radio-content">
                                            <input type="radio" id="moder_mali_option-3" name="moder_mali_option"
                                                   value="3">
                                            <label class="radio-label" for="moder_mali_option-3">يؤجل صرف السلفة</label>
                                        </div>

                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        <?php } ?>

                    <?php } ?>
                    <?php if ($solaf_data->current_to_user_id == $_SESSION['user_id'] && $solaf_data->level == 6) { ?>
                        <input type="hidden" name="level" id="level" value="<?= $solaf_data->level + 1 ?>">
                        <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                            <tbody>
                            <tr class="rosasy-bg">
                                <td style="width: 70px">الإسم</td>
                                <td class="white-bg"><?php echo $solaf_data->emp_name; ?></td>
                                <td style="width: 120px">الرقم الوظيفي</td>
                                <td style="width: 100px" class="white-bg"><?php echo $solaf_data->emp_code_fk; ?></td>
                                <td style="width: 90px">الوظيفة</td>
                                <td class="white-bg"><?php echo $solaf_data->job_title; ?></td>

                            </tr>
                            </tbody>
                        </table>
                        <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                            <tbody>

                            <tr>
                                <td colspan="8" style="background-color:#e6eed5; border-color:#73b300">
                                    <div class="radio-content">
                                        <input type="radio" onclick="$('#reason_action1').attr('disabled','TRUE');
                                    $('#current_to_id_DirectManger').removeAttr('disabled');
                                      $('#reason_action1').val('................');" id="tahod-1"
                                               name="action_moder_final" value="4">
                                        <label class="radio-label" for="tahod-1">يعتمد</label>

                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="8" style="background-color:#ffb3b7; border-color:#73b300">

                                    <div class="radio-content">
                                        <input type="radio" name="action_moder_final"
                                               onclick="$('#reason_action1').removeAttr('disabled');$('#current_to_id_DirectManger').attr('disabled', 'disabled');"
                                               id="tahod-2" value="5">


                                        <label class="radio-label" for="tahod-2">لا يعتمد

                                            <input size="60" type="text" disabled name="reason_action"
                                                   id="reason_action1"
                                                   value=" ...................">
                                        </label>
                                    </div>


                                </td>
                            </tr>

                            </tbody>
                        </table>
                    <?php } ?>
                    <?php if (key_exists($solaf_data->level, $arr_select_lable)) { ?>
                        <div class="form-group col-md-6 col-sm-6 padding-4">
                            <label class="label"><?php echo $arr_select_lable[$solaf_data->level]; ?></label>
                            <select name="current_to_id" id="current_to_id_DirectManger" class="form-control"
                                    aria-required="true" onchange="
                                    var link =$('#current_to_id_DirectManger :selected').attr('data-img');
                                    var name =$('#current_to_id_DirectManger :selected').attr('data-name');
                                    var job =$('#current_to_id_DirectManger :selected').attr('data-job');
                                    $('#empImg').attr('src','<?php echo base_url() . 'uploads/human_resources/emp_photo/thumbs/'; ?>'+ link);
                                    $('#name-emp').text(name);
                                    $('#to_user_n').val(name);
                                    $('#job-title').text(job);
                                    ">
                                <option value="">إختر</option>
                                <?php if (isset($employees_data) && !empty($employees_data)) {
                                    foreach ($employees_data as $row) { ?>
                                        <option value="<?= $row->person_id ?>" data-img="<?= $row->photo ?>"
                                                data-name="<?= $row->person_name ?>"
                                                data-job="<?= $row->job_title_n ?>">
                                            <?= $row->person_name ?></option>
                                    <?php }
                                } ?>
                            </select>

                        </div>
                    <?php } ?>
                </div>
            </div>
    </div>
    </form>

</div>
<div class="col-sm-2 padding-4">
    <table class="table table-bordered" style="">
        <thead>
        <tr>
            <td colspan="2">
                <img id="empImg"
                     src="<?php echo base_url() . "uploads/human_resources/emp_photo/thumbs/" . $solaf_data->personal_photo ?>"
                     \
                     onerror='this.src="<?php echo base_url(); ?>/asisst/admin_asset/img/user.png"'
                     class="center-block img-responsive" style="width: 180px; height: 150px">
            </td>
        </tr>
        </thead>
        <tbody>
        <tr class="greentd">
            <td class="text-center">الإسم</td>
        </tr>
        <tr>
            <td id="name-emp" class="text-center"> <?php echo $solaf_data->emp_name ?></td>
        </tr>
        <tr class="greentd">
            <td class="text-center">الوظيفة</td>
        </tr>
        <tr>
            <td id="job-title" class="text-center"><?php echo $solaf_data->job_title ?></td>
        </tr>
        </tbody>
    </table>
</div>

</div>
<div class="modal-footer" style="display: inline-block;width: 100%;">
    <?php if ($solaf_data->current_to_user_id == $_SESSION['user_id'] && (in_array($solaf_data->level, array(1, 2, 3, 4, 5, 6)))) { ?>
        <button type="button" style="float: right;"
                onclick="make_transformRequest_sumit(<?php echo $solaf_data->level; ?>)"
                class="btn btn-success btn-labeled">
            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
        </button>
    <?php } ?>
    <button type="button" class="btn btn-danger btn-labeled" onclick="$('#transform').modal('hide')"><span
                class="btn-label"><i class="glyphicon glyphicon-remove"></i></span> إغلاق
    </button>
</div>


<script>

    function make_transformRequest_sumit(level) {
        var text_sweet = '';
        var submit_val = 1;
        var emp = $('#current_to_id_DirectManger').val();

        switch (level) {
            case 1:
                //
                var taqeem = $("input[name='taqeem']:checked");
                var action = $("input[name='action']:checked");
                if (taqeem.length == 0) {
                    text_sweet += 'تقيم الموظف ';
                    submit_val = 0;
                }
                if (action.length == 0) {
                    text_sweet += '- يوصي بالصرف ';
                    submit_val = 0;
                }
                if ($('#current_to_id_DirectManger').is(':enabled')) {
                    if (!emp) {
                        text_sweet += '- اختيار الموظف ';
                        submit_val = 0;
                    }
                }

                console.log('taqeem ::' + taqeem.length + 'action :: ' + action.length);
                // text:'تقيم موظف - يوصي بالصرف - اختيار الموظف'


                break;
            case 2:
                //
                var solaf_qaema = $("input[name='solaf_qaema']:checked");
                var emp_motalbat = $("input[name='emp_motalbat']:checked");
                if (solaf_qaema.length == 0) {
                    text_sweet += ' سلف قائمة';
                    submit_val = 0;
                }
                if (emp_motalbat.length == 0) {
                    text_sweet += '- متطلبات الموظف ';
                    submit_val = 0;
                }
                if ($('#current_to_id_DirectManger').is(':enabled')) {
                    if (!emp) {
                        text_sweet += '- اختيار الموظف ';
                        submit_val = 0;
                    }
                }
                console.log('solaf_qaema ::' + solaf_qaema.length + 'emp_motalbat :: ' + emp_motalbat.length);
                // text:'تقيم موظف - يوصي بالصرف - اختيار الموظف'


                break;
            case 3:
                //
                var action = $("input[name='action']:checked");
                if (action.length == 0) {
                    text_sweet += 'الرد على طلب ';
                    submit_val = 0;
                }

                if ($('#current_to_id_DirectManger').is(':enabled')) {
                    if (!emp) {
                        text_sweet += '- اختيار الموظف ';
                        submit_val = 0;
                    }
                }
                console.log('action ::' + action.length);
                // text:'تقيم موظف - يوصي بالصرف - اختيار الموظف'


                break;
            case 4:
                //
                var rased_yasmah = $("input[name='rased_yasmah']:checked");
                if (rased_yasmah.length == 0) {
                    text_sweet += 'حالة الطلب ';
                    submit_val = 0;
                }

                if ($('#current_to_id_DirectManger').is(':enabled')) {
                    if (!emp) {
                        text_sweet += '- اختيار الموظف ';
                        submit_val = 0;
                    }
                }
                console.log('rased_yasmah ::' + rased_yasmah.length);
                // text:'تقيم موظف - يوصي بالصرف - اختيار الموظف'


                break;
            case 5:
                //
                var moder_mali_option = $("input[name='moder_mali_option']:checked");
                if (moder_mali_option.length == 0) {
                    text_sweet += 'رأى مدير الشؤون المالية  ';
                    submit_val = 0;
                }

                if ($('#current_to_id_DirectManger').is(':enabled')) {
                    if (!emp) {
                        text_sweet += '- اختيار الموظف ';
                        submit_val = 0;
                    }
                }
                console.log('moder_mali_option ::' + moder_mali_option.length);
                // text:'تقيم موظف - يوصي بالصرف - اختيار الموظف'


                break;
            case 6:
                //
                var action_moder_final = $("input[name='action_moder_final']:checked");
                if (action_moder_final.length == 0) {
                    text_sweet += 'رأى مدير العام  ';
                    submit_val = 0;
                }


                console.log('action_moder_final ::' + action_moder_final.length);
                // text:'تقيم موظف - يوصي بالصرف - اختيار الموظف'


                break;

            default:

        }
        if (submit_val == 0) {
            swal({
                title: 'من فضلك ادخل  كل الحقول ',
                text: text_sweet,
                type: 'warning',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'تم'
            });
        } else {
            $('#form1').submit();

        }

    }

</script>
