<style>
    .label-green {
        border: none !important;
    }
    label.label-green {
        height: auto;
        line-height: unset;
        text-align: right !important;
        margin-bottom: 0;
        background-color: transparent;
        /*  color: #2b2929;
         font-weight: 600 !important;
        font-size: 14px !important;
        */
        color: black !important;
        font-weight: 600 !important;
        font-size: 18px !important;
        border: none;
        padding-bottom: 0;
        font-weight: bold;
    }
    .half {
        width: 100% !important;
        float: right !important;
    }
    .input-style {
        border-radius: 0px;
        border-right: 1px solid #eee;
    }
    .inner-heading {
        background-color: #9ed6f3;
        padding: 10px;
    }
    .pop-text {
        background-color: #009688;
        color: #fff;
        padding: 7px;
        font-size: 14px;
        margin-bottom: 3px;
        margin-top: 3px;
    }
    .pop-text1 {
        background-color: #eee;
        padding: 7px;
        font-size: 14px;
        margin-bottom: 3px;
        margin-top: 3px;
    }
    .pop-title-text {
        margin-top: 4px;
        margin-bottom: 4px;
        padding: 6px;
        background-color: #9ed6f3;
    }
    .span-validation {
        color: rgb(255, 0, 0);
        font-size: 12px;
        position: absolute;
        bottom: -10px;
        right: 50%;
    }
    .astric {
        color: red;
        font-size: 25px;
        position: absolute;
    }
    .help-block.form-error {
        color: #a94442 !important;
        font-size: 11px !important;
        position: absolute !important;
        bottom: -23px !important;
        right: 50% !important;
    }
    .title-top {
        padding: 8px !important;
        /*/  background-color: rgb(156, 207, 27);
          color: #000;*/
        background: #00713e !important;
        color: white;
        font-size: 18px !important;
        border-radius: 5px !important;
        /* border-radius: 5px; */
        font-size: 18px;
    }
    table td {
        padding: 2px !important;
    }
    .label-green label {
        font-size: 16px;
        color: black !important;
    }
    .table-bordered > tbody > tr > th, .table-bordered > tbody > tr > td {
        background: #0aaf79 !important;
        border-radius: 7px !important;
        font-size: 17px !important;
        color: black !important;
    }
</style>

<?php if($_SESSION['hidden_action']){ ?>
    <style>
        input,select {
            pointer-events:none;
            color:#AAA;
            background:#F5F5F5;
        }

    </style>
<?php } ?>
<?php echo form_open_multipart("osr/Family/family_money") ?>
   
<div class="col-sm-12  no-padding">
<!--    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">-->
    <div class="col-sm-12 col-md-12 col-xs-12 fadeInUp wow">
        <div class="panel panel-default">
            <div class="panel-heading ">
                <h3 class="panel-title">
                   <?=$title?>
                </h3>
            </div>
                <?php if (isset($all_links['financial']) && $all_links['financial'] != null) {
                    foreach ($all_links['financial'] as $key => $value) {
                        $result[$key] = $all_links['financial'][$key];
                    }
                } else {

                }
                $arr_yes_no = array('', 'نعم', 'لا');
                ?>
            <div class="panel-body">
                <div class="col-sm-12 col-xs-12">
                    <div class="form-group col-sm-3 col-xs-12 padding-4">
                        <label class="label label-green  half"> رقم السجل المدني للأب </label>
                        <input type="number" class="form-control half input-style"
                               value="<?php if (!empty($father_national_card)) {
                                   echo $father_national_card;
                               } ?>" readonly="readonly"/>
                    </div>
                    <div class="form-group col-sm-5 col-xs-12 padding-4">
                        <label class="label label-green  half"> إسم الأب </label>
                        <input type="text" class="form-control half input-style"
                               value="<?php if (!empty($father_name)) {
                                   echo $father_name;
                               } ?>" readonly="readonly"/>
                    </div>
                    <div class="col-sm-6 col-xs-12 padding-4">
                        <div class="col-xs-12" style=" padding: 0">
                            <table class="table table-striped" style="margin-bottom:  0">
                                <thead>
                                <tr>
                                    <td colspan="3" class="title-top">
                                        <i style="color: white; " class="fa fa-money" aria-hidden="true"></i>
                                        مصادر الدخل
                                    </td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $affect_arr = array(0 => 'لا تؤثر', 1 => 'تؤثر');
                                if (!empty($income_sources)) {
                                    for ($a = 0; $a < sizeof($income_sources); $a++) { ?>
                                        <tr>
                                            <td width="30%" class="label-green">
                                                <label class="label "><?php echo $income_sources[$a]->title_setting ?></label>
                                            </td>
                                            <td style="width: 25%;">
                                                <input type="hidden"
                                                       name="finance_income_type_id_income<?php echo $a; ?>"
                                                       value="<?php echo $income_sources[$a]->id_setting; ?>">
                                                <input type="text" name="value_income<?php echo $a; ?>"
                                                       id="value_income<?php echo $a; ?>"
                                                       style="font-size: 18px;"
                                                       data-validation="required" value="<?php
                                                if (!empty($all_records[$income_sources[$a]->id_setting])) {
                                                    echo $all_records[$income_sources[$a]->id_setting]->value;
                                                } else {
                                                    if ($income_sources[$a]->id_setting == 66) {
                                                        echo $basic_data_family["retirement"];
                                                    } elseif ($income_sources[$a]->id_setting == 71) {
                                                        echo $basic_data_family["guarantee"];
                                                    } elseif ($income_sources[$a]->id_setting == 67) {
                                                        echo $basic_data_family["insurance"];
                                                    } else {
                                                        echo 0;
                                                    }
                                                }
                                                ?>" onkeypress="validate_number(event);"
                                                       class="form-control value_money"
                                                />
                                            </td>
                                        </tr>
                                    <?php }
                                } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <div class="col-xs-12" style=" padding: 0">
                            <table class="table table-striped" style="margin-bottom:  0">
                                <thead>
                                <tr>
                                    <td colspan="3" class="title-top">الالتزامات الشهرية</td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if (!empty($monthly_duties)) {
                                    for ($s = 0; $s < sizeof($monthly_duties); $s++) { ?>
                                        <tr>
                                            <td width="40%" class="label-green">
                                                <label class="label "><?php echo $monthly_duties[$s]->title_setting ?></label>
                                            </td>
                                            <td style="width: 25%;">
                                                <input type="hidden"
                                                       name="finance_income_type_id_duty<?php echo $s; ?>"
                                                       value="<?php echo $monthly_duties[$s]->id_setting; ?>">
                                                <input type="text" name="value_duty<?php echo $s; ?>"
                                                       data-validation="required" style="font-size: 18px;"
                                                       value="<?php
                                                       if (!empty($all_records[$monthly_duties[$s]->id_setting])) {
                                                           echo $all_records[$monthly_duties[$s]->id_setting]->value;
                                                       } else {
                                                           echo 0;
                                                       }
                                                       ?>" onkeypress="validate_number(event);"
                                                       class="form-control  duties_money"
                                                />
                                            </td>
                                        </tr>
                                    <?php }
                                } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!---------------------------------------table1------------------------------>
                <style>
                    .specific_style {
                        background-color: #658e1a !important;
                        color: white;
                    }
                    .specific_style_2 {
                        width: 280px;
                        background-color: white;
                        color: red;
                        border: 1px solid #658e1a;
                    }
                </style>
                <div class="clearfix"></div>
                <hr/>
                <input type="hidden" id="myval" class="form-control">
                <input type="hidden" name="naseb" id="naseb">
                <input type="hidden" name="family_cat_n" id="family_cat">
                <input type="hidden" name="family_cat_id" id="family_cat_id">
                <!---------------------------------------table1------------------------------>
                <!------------------------------------>
                <?php if(!$_SESSION['hidden_action']){ ?>
                <div class="col-xs-12 text-center">
                    <?php if (isset($all_records) && $all_records != null):
                        $input_name1 = 'update';
                    else: $input_name1 = 'add'; endif; ?>
                    <input type="hidden" name="income_max" value="<?php echo sizeof($income_sources); ?>">
                    <input type="hidden" name="duty_max" value="<?php echo sizeof($monthly_duties); ?>">
                    <br/>
                    <button type="submit" class="btn btn-labeled btn-success " name="<?php echo $input_name1 ?>"
                            value="حفظ">
                        <span class="btn-label"><i class="fa fa-floppy-o"></i></span>حفظ
                    </button>
                    <input type="hidden" name="<?php echo $input_name1 ?>" value="حفظ"/>

                </div>
                <?php } ?>
                <br/>
                <br/>
            </div>
        </div>
    </div>
</div>
</div>
<!-- resume -->
</div>
<?php echo form_close() ?>

