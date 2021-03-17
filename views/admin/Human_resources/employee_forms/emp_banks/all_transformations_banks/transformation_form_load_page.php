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
<?php
/*1 => 'مدير الشئون الماليةو الإدارية',*/

$arr_select_lable = array(
    1 => 'مدير الموارد البشرية',
    2 => '  الموظف المختص'); 
    ?>
<div class="modal-body">
    <div class="col-sm-10 padding-4">
        <form enctype="multipart/form-data" method="post" id="form1"
              action="<?php echo base_url() ?>human_resources/employee_forms/emp_banks/All_transformations_banks/save_Transform">
            <?php if (isset($_POST['from_profile']) && ($_POST['from_profile'] == 1)) { ?>
                <input type="hidden" name="from_profile" id="from_profile" value="1">
            <?php } ?>
            <input type="hidden" name="banks_rkm_fk" id="banks_rkm_fk" value="<?= $talab_data->rkm ?>">
            <input type="hidden" name="banks_id_fk" id="banks_id_fk" value="<?= $talab_data->id ?>">
            <input type="hidden" name="from_user" id="from_user" value="<?= $talab_data->current_to_user_id ?>">
            <input type="hidden" name="emp_id_fk" id="emp_id_fk" value="<?= $talab_data->emp_id ?>">
            <input type="hidden" name="to_user_n" id="to_user_n" value="">
            <div class="col-sm-12 padding-4">
                <div class="col-xs-12 text-center">
                    <div class="piece-heading">
                        <h5>بيانات الموظف و الطلب</h5>
                    </div>
                </div>
                <div class="piece-box" style="margin-top: 20px">
                    <div class="piece-body">
                        <!-- <div class="col-xs-12"> -->
                        <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                            <tbody>
                            <tr class="rosasy-bg">
                                <td style="width: 120px">رقم الطلب</td>
                                <td class="white-bg"><?php echo $talab_data->rkm; ?></td>
                                <td style="width: 120px">تاريخ الطلب</td>
                                <td class="white-bg"><?php echo $talab_data->order_date; ?></td>
                            </tr>
                            </tbody>
                        </table>
                        <!-- </div> -->
                        <!-- <div class="col-xs-12"> -->
                        <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                            <tbody>
                            <tr class="rosasy-bg">
                                <td style="width: 70px">الإسم</td>
                                <td class="white-bg"><?php echo $bank_data->current_emp_bank_name; ?></td>
                                <td style="width: 120px">الرقم الوظيفي</td>
                                <td style="width: 100px" class="white-bg"><?php echo $bank_data->emp_code; ?></td>
                                <td style="width: 90px">الوظيفة</td>
                                <td class="white-bg"><?php echo $bank_data->mosma_wazefy_n; ?></td>
                            </tr>
                            </tbody>
                        </table>
                      
                    </div>
                </div>
            </div>
            <input type="hidden" name="level" id="level" value="<?= $talab_data->level + 1 ?>">
            <div class="col-sm-12 ">
                <?php if ($talab_data->current_to_user_id == $_SESSION['user_id'] && $talab_data->level == 1) { ?>
                    <table class="table table-bordered table-responsive">
                        <tbody>
                        <tr>
                            <td colspan="8" style="background-color:#e6eed5; border-color:#73b300">
                                <div class="radio-content">
                                    <input type="radio" onclick="$('#reason_action1').attr('disabled','TRUE');
                                    $('#current_to_id_DirectManger').removeAttr('disabled');
                                      $('#reason_action1').val('................');" id="tahod-1"
                                           name="action_moder_fr" value="1">
                                    <label class="radio-label" for="tahod-1">اوافق</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="8" style="background-color:#ffb3b7; border-color:#73b300">
                                <div class="radio-content">
                                    <input type="radio" name="action_moder_fr"
                                           onclick="$('#reason_action1').removeAttr('disabled');$('#current_to_id_DirectManger').attr('disabled', 'disabled');"
                                           id="tahod-2" value="2">
                                    <label class="radio-label" for="tahod-2">لا اوافق
                                        <input size="60" type="text" disabled name="reason_action" id="reason_action1"
                                               value=" ...................">
                                    </label>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                <?php } ?>
                <?php if ($talab_data->current_to_user_id == $_SESSION['user_id'] && ($talab_data->level == 2 )) { ?>
                    <table class="table table-bordered table-responsive">
                        <tbody>
                        <tr>
                            <td colspan="8" style="background-color:#e6eed5; border-color:#73b300">
                                <div class="radio-content">
                                    <input type="radio" onclick="$('#reason_action1').attr('disabled','TRUE');
                                    $('#current_to_id_DirectManger').removeAttr('disabled');
                                      $('#reason_action1').val('................');" id="tahod-1"
                                           name="action_moder_hr" value="1">
                                    <label class="radio-label" for="tahod-1">يعتمد</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="8" style="background-color:#ffb3b7; border-color:#73b300">
                                <div class="radio-content">
                                    <input type="radio" name="action_moder_hr"
                                           onclick="$('#reason_action1').removeAttr('disabled');$('#current_to_id_DirectManger').attr('disabled', 'disabled');"
                                           id="tahod-2" value="2">
                                    <label class="radio-label" for="tahod-2">لا يعتمد
                                        <input size="60" type="text" disabled name="reason_action" id="reason_action1"
                                               value=" ...................">
                                    </label>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                <?php } ?>
                <?php if ($talab_data->current_to_user_id == $_SESSION['user_id'] && ($talab_data->level == 3)) { ?>
                    <table class="table table-bordered table-responsive">
                        <tbody>
                        <tr>
                            <td colspan="8" style="background-color:#e6eed5; border-color:#73b300">
                                <div class="radio-content">
                                    <input type="radio" onclick="$('#reason_action1').attr('disabled','TRUE');
                                    $('#current_to_id_DirectManger').removeAttr('disabled');
                                      $('#reason_action1').val('................');" id="tahod-1"
                                           name="action_employee" value="1">
                                    <label class="radio-label" for="tahod-1">تنفيذ الطلب </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="8" style="background-color:#ffb3b7; border-color:#73b300">
                                <div class="radio-content">
                                    <input type="radio" name="action_employee"
                                           onclick="$('#reason_action1').removeAttr('disabled');$('#current_to_id_DirectManger').attr('disabled', 'disabled');"
                                           id="tahod-2" value="2">
                                    <label class="radio-label" for="tahod-2">إيقاف تنفيذ الطلب
                                        <input size="60" type="text" disabled name="reason_action" id="reason_action1"
                                               value=" ...................">
                                    </label>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                <?php } ?>
                <?php if (key_exists($talab_data->level, $arr_select_lable)) { ?>
                    <div class="form-group col-md-6 col-sm-6 padding-4">
                        <label class="label"><?php echo $arr_select_lable[$talab_data->level]; ?></label>
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
                                            data-name="<?= $row->person_name ?>" data-job="<?= $row->job_title_n ?>">
                                        <?= $row->person_name ?></option>
                                <?php }
                            } ?>
                        </select>
                    </div>
                <?php } ?>
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
                     src="<?php echo base_url() . "uploads/human_resources/emp_photo/thumbs/" . $talab_data->personal_photo ?>"
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
            <td id="name-emp" class="text-center"> <?php echo $talab_data->new_emp_bank_name ?></td>
        </tr>
        <tr class="greentd">
            <td class="text-center">الوظيفة</td>
        </tr>
        <tr>
            <td id="job-title" class="text-center"><?php echo $talab_data->mosma_wazefy_n ?></td>
        </tr>
        </tbody>
    </table>
</div>
</div>
<div class="modal-footer" style="display: inline-block;width: 100%;">
    <?php if ($talab_data->current_to_user_id == $_SESSION['user_id'] && (in_array($talab_data->level, array(1,2,3)))) { ?>
        <button type="button" style="float: right;"
                onclick="make_transformRequest_sumit(<?php echo $talab_data->level; ?>)"
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

                var action_moder_fr = $("input[name='action_moder_fr']:checked");
                if (action_moder_fr.length == 0) {
                    text_sweet += 'رأى مدير الشؤن مالية  ';
                    submit_val = 0;
                }
                console.log('action_moder_fr ::' + action_moder_fr.length);
                break;
            case 2:
                var action_moder_hr = $("input[name='action_moder_hr']:checked");
                if (action_moder_hr.length == 0) {
                    text_sweet += 'رأى مدير موارد البشرية  ';
                    submit_val = 0;
                }
                console.log('action_moder_hr ::' + action_moder_hr.length);
                break;
          
        

        case 3:
                var action_employee = $("input[name='action_employee']:checked");
                if (action_employee.length == 0) {
                    text_sweet += 'رأى   الموظف المختص  ';
                    submit_val = 0;
                }
                console.log('action_employee ::' + action_employee.length);
                break;
            default:
        }
        if ($('#current_to_id_DirectManger').is(':enabled')) {
            if (!emp) {
                text_sweet+='- اختيار الموظف ';
                submit_val=0;
            }
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
