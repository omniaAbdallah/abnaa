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
           /* border: 2px solid #000 !important;*/
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
      /*  border: 2px solid #000;*/
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

<div class="col-sm-12 padding-4">
    <div class="col-sm-9 padding-4">
        <div class="col-xs-12 text-center">
            <div class="piece-heading">

                <h5>بيانات الموظف و الطلب</h5>
            </div>
<?php 
/*
echo '<pre>';
print_r($talab_data);*/
?>
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
            

   <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                    <tbody>
                    <tr>
                     <td style="background: #c4c0ff;" colspan="4">الحساب الحالي</td>
                    </tr>
                    <tr class="_rosasy-bg">
                        <td   style="width: 50px;background: #c4c0ff;">إسم المصرف</td>
                        <td style="width: 100px" class="white-bg"><?php 
                        echo $talab_data->current_bank_name ;?></td>
                    
                        <td  style="width: 50px;background: #c4c0ff;">رقم الحساب</td>
                        <td style="width: 100px" class="white-bg"><?php 
                        echo $talab_data->current_bank_account_num ;
                         ?></td>
                    </tr>
         
                    
                          <tr>
                     <td style="background: #93e093;" colspan="4">الحساب الجديد</td>
                    </tr>
                    <tr class="-bg">
                        <td  style="width: 50px;background: #93e093;">إسم المصرف</td>
                        <td style="width: 100px;" class="white-bg"><?php 
                        echo $talab_data->new_bank_name ;?></td>
                    
                        <td style="width: 50px;background: #93e093;">رقم الحساب</td>
                        <td style="width: 100px;" class="white-bg"><?php 
                        echo $talab_data->new_bank_account_num ;
                         ?></td>
                    </tr>
                                   </tbody>
                </table>
            






            </div>

        </div>


    </div>
    <div class="col-sm-3">
        <table class="table table-bordered" style="">
            <thead>
            <tr>
                <td colspan="2">
                    <img id="empImg_1"
                         src="<?php echo base_url() ?>uploads/human_resources/emp_photo/thumbs/<?php echo $talab_data->personal_photo ?>"
                         onerror="this.src='<?php echo base_url() ?>/asisst/admin_asset/img/user.png';"
                         class="center-block img-responsive" style="width: 180px; height: 150px">
                </td>
            </tr>
                  <tr>
                <td colspan="2">
                    <img id="empImg_1"
                       src="<?=base_url()?>/uploads/human_resources/emp_banks/<?=$talab_data->current_bank_image?>" 
                         onerror="this.src='<?php echo base_url() ?>/asisst/admin_asset/img/user.png';"
                         class="center-block img-responsive" style="width: 180px; height: 150px">
                </td>
            </tr>
            
                 <tr>
                <td colspan="2">
                    <img id="empImg_1"
                       src="<?=base_url()?>/uploads/human_resources/emp_banks/<?=$talab_data->new_bank_image?>" 
                         onerror="this.src='<?php echo base_url() ?>/asisst/admin_asset/img/user.png';"
                         class="center-block img-responsive" style="width: 180px; height: 150px">
                </td>
            </tr>
            </thead>
        </table>
    </div>
</div>


<div class="col-sm-12 padding-4">
    <?php if ($talab_data->level >= 1 || $talab_data->suspend == 4) {
        if (isset($level_1data) && !empty($level_1data)) {
            ?>
            <div class="col-sm-9 padding-4">

                <div class="piece-box" style="margin-top: 0px">
                    <div class="col-xs-12 text-center">
                        <div class="piece-heading">

                            <h5>إفادة الشؤن المالية</h5>
                        </div>

                    </div>
                    <div class="piece-body">
                        <div class="col-xs-12">
                            <table class="table table-bordered" border="1" cellpadding="3" cellspacing="0"
                                   style="width:100%">
                                <tbody>
                                <tr>
                                    <td>اسم الموظف :<?= $level_1data->from_user_n ?></td>
                                    <td>التوقيع :<?= $level_1data->from_user_n ?> </td>
                                    <td>التاريخ:<?= date('d-m-Y') ?></td>
                                </tr>
                                <?php if ($talab_data->action_moder_fr == 1) {
                                    ?>
                                    <tr>
                                        <td colspan="4" style="background-color:#e6eed5; border-color:#73b300">
                                            <div class="radio-content">
                                                <input type="radio" id="tahod-1" data-validation="required"
                                                       name="action1" value="1" checked>
                                                <label class="radio-label" for="tahod-1"> اوافق على طلب  تغيير الحساب البنكي </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                } elseif ($talab_data->action_moder_fr == 2) {
                                    ?>
                                    <tr>
                                        <td colspan="4" style="background-color:#ffb3b7; border-color:#73b300">
                                            <div class="radio-content">
                                                <input type="radio" name="action1" checked
                                                       onclick="change_photo(2);$('#reason_action1').removeAttr('disabled');"
                                                       id="tahod-2" data-validation="required"
                                                       value="2">
                                                <label class="radio-label" for="tahod-2">لا أوافق بسبب
                                                    <?php echo $level_1data->reason_action; ?>
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                } ?>
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>


            </div>
            <div class="col-sm-3">
                <table class="table table-bordered" style="">
                    <thead>
                    <tr>
                        <td colspan="2">
                            <img id="empImg_1"
                                 src="<?php echo base_url() ?>uploads/human_resources/emp_photo/thumbs/<?php echo $level_1data->from_user_photo ?>"
                                 onerror="this.src='<?php echo base_url() ?>/asisst/admin_asset/img/user.png';"
                                 class="center-block img-responsive" style="width: 180px; height: 150px">

                        </td>
                    </tr>
                    </thead>
                </table>
            </div>
            <?php
        }
    } ?>
</div>
<div class="col-sm-12 padding-4">
    <?php if ($talab_data->level >= 2  ||  $talab_data->action_moder_hr == 1) {
    if (isset($level_2data) && !empty($level_2data)) {

        ?>
        <div class="col-sm-9 padding-4">

            <div class="piece-box" style="margin-top: 0px">
                <div class="col-xs-12 text-center">
                    <div class="piece-heading">

                        <h5>إفادة الموارد البشرية</h5>
                    </div>

                </div>
                <div class="piece-body">
                    <div class="col-xs-12">
                        <table class="table table-bordered" border="1" cellpadding="3" cellspacing="0"
                               style="width:100%">
                            <tbody>
                            <tr>
                                <td>اسم الموظف :<?= $level_2data->from_user_n ?></td>
                                <td>التوقيع :<?= $level_2data->from_user_n ?> </td>
                                <td>التاريخ:<?= date('d-m-Y') ?></td>
                            </tr>
                            <?php if ($talab_data->action_moder_hr == 1) {
                                ?>
                                <tr>
                                    <td colspan="4" style="background-color:#e6eed5; border-color:#73b300">
                                        <div class="radio-content">
                                            <input type="radio" id="tahod-1" data-validation="required"
                                                   name="action1" value="1" checked>
                                            <label class="radio-label" for="tahod-1"> اوافق على طلب تغيير الحساب البنكي </label>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                            } elseif ($talab_data->action_moder_hr == 2) {
                                ?>
                                <tr>
                                    <td colspan="4" style="background-color:#ffb3b7; border-color:#73b300">
                                        <div class="radio-content">
                                            <input type="radio" name="action1" checked
                                                   onclick="change_photo(2);$('#reason_action1').removeAttr('disabled');"
                                                   id="tahod-3" data-validation="required"
                                                   value="2">
                                            <label class="radio-label" for="tahod-3">لا أوافق بسبب
                                                <?php echo $level_2data->reason_action; ?>
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                            } ?>
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>


        </div>
        <div class="col-sm-3">
            <table class="table table-bordered" style="">
                <thead>
                <tr>
                    <td colspan="2">
                        <img id="empImg_1"
                             src="<?php echo base_url() ?>uploads/human_resources/emp_photo/thumbs/<?php echo $level_2data->from_user_photo ?>"
                             onerror="this.src='<?php echo base_url() ?>/asisst/admin_asset/img/user.png';"
                             class="center-block img-responsive" style="width: 180px; height: 150px">

                    </td>
                </tr>
                </thead>
            </table>
        </div>
            <?php
        }
    } ?>
</div>




<div class="col-sm-12 padding-4">
    <?php if (($talab_data->level >= 2 || $talab_data->suspend == 4) && $talab_data->action_employee == 1) {
    if (isset($level_3data) && !empty($level_3data)) {

        ?>
        <div class="col-sm-9 padding-4">

            <div class="piece-box" style="margin-top: 0px">
                <div class="col-xs-12 text-center">
                    <div class="piece-heading">

                        <h5>إفادة  الموظف المختص</h5>
                    </div>

                </div>
                <div class="piece-body">
                    <div class="col-xs-12">
                        <table class="table table-bordered" border="1" cellpadding="3" cellspacing="0"
                               style="width:100%">
                            <tbody>
                            <tr>
                                <td>اسم الموظف :<?= $level_3data->from_user_n ?></td>
                                <td>التوقيع :<?= $level_3data->from_user_n ?> </td>
                                <td>التاريخ:<?= date('d-m-Y') ?></td>
                            </tr>
                            <?php if ($talab_data->action_employee == 1) {
                                ?>
                                <tr>
                                    <td colspan="4" style="background-color:#e6eed5; border-color:#73b300">
                                        <div class="radio-content">
                                            <input type="radio" id="tahod-1" data-validation="required"
                                                   name="action1" value="1" checked>
                                            <label class="radio-label" for="tahod-1"> اوافق على طلب تغيير الحساب البنكي </label>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                            } elseif ($talab_data->action_employee == 2) {
                                ?>
                                <tr>
                                    <td colspan="4" style="background-color:#ffb3b7; border-color:#73b300">
                                        <div class="radio-content">
                                            <input type="radio" name="action1" checked
                                                   onclick="change_photo(2);$('#reason_action1').removeAttr('disabled');"
                                                   id="tahod-3" data-validation="required"
                                                   value="2">
                                            <label class="radio-label" for="tahod-3">لا أوافق بسبب
                                                <?php echo $level_2data->reason_action; ?>
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                            } ?>
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>


        </div>
        <div class="col-sm-3">
            <table class="table table-bordered" style="">
                <thead>
                <tr>
                    <td colspan="2">
                        <img id="empImg_1"
                             src="<?php echo base_url() ?>uploads/human_resources/emp_photo/thumbs/<?php echo $level_3data->from_user_photo ?>"
                             onerror="this.src='<?php echo base_url() ?>/asisst/admin_asset/img/user.png';"
                             class="center-block img-responsive" style="width: 180px; height: 150px">

                    </td>
                </tr>
                </thead>
            </table>
        </div>
            <?php
        }
    } ?>
</div>

