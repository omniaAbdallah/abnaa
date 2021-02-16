<style>    fieldset {
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
    }</style>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title" id="add_editAccounDalel_title"><?= $title ?></h4>
</div>
<div class="modal-body">
    <div class="container-fluid">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-body">
                <div class="col-md-12 col-sm-12 col-xs-12 padding-4">            <?php
                    $readonly = '';
                    $disabled = '';
                    $required = 'required';
                    $submitEdit = 'button';
                    $submitSave = 'button';
                    if ($id != 0) {
                        $submitEdit = '';
                        echo form_open_multipart('gwd/Gawda_plans/update_mo24er/' . $id, array('id' => 'MyFormmo24er'));
                        if (isset($details)) {
                            if ($details['level'] == 1) {
                                $disabled = '';
                            }

                        }
                    } else {
                        $submitSave = '';
                        $display_markz_tklfa = "none";
                        $disabled_markz_tklfa = 'disabled';
                        echo form_open_multipart('gwd/Gawda_plans/addAccount_mo24er', array('id' => 'MyFormmo24er'));
                    }
                    $types_ways = array(1 => 'تجميعي', 2 => 'متوسط', 3 => 'اعلي رقم', 4 => 'اقل رقم');
                    $types = array(1 => 'رقم', 2 => 'نسبة');
                    $nature = array('إختر', 'مدين', 'دائن');
                    $follow = array(1 => 'ميزانية', 2 => 'قائمة الأنشطة');            //14-1-om
                    $markz_tklfa_arr = array(1 => 'نعم', 2 => 'لا'); ?>
                    <div class="form-group col-sm-12 col-xs-12 no-padding">                <!--14-1-om-->


                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-sm-4">
                                <label class=""> السياسة</label>
                            </div>
                            <div class="col-xs-8 r-input">

                                <input
                                        class="form-control " id="parent_name" name="parent_name" readonly

                                        value="<?php if (isset($details)) echo $details['parent_name'] ?>"
                                    <?= $disabled ?> >
                                <input type="hidden" id="parent" name="parent"
                                       value="<?php if (isset($details)) echo $details['parent'] ?>">

                            </div>
                        </div>

                        <input type="hidden" id="plan_rkm" name="plan_rkm"
                               value="<?php echo $plan_rkm; ?>">


                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-sm-4">
                                <label class=""> المؤشر</label>
                            </div>
                            <div class="col-xs-8 r-input">
                  
                                <textarea class="form-control" style="margin: 0px 0px 0px -1.21528px;
    
    height: 59px;" id="name" name="name" placeholder="المؤشر" data-validation="required"><?php if (isset($details)) echo $details['name'] ?>     </textarea>

                            </div>
                        </div>


                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-sm-4">
                                <label class=""> وحدة القياس </label>
                            </div>
                            <div class="col-xs-8 r-input">
                                <input
                                        type="text" id="wehda_quas" name="wehda_quas"
                                        value="<?php if (isset($details)) echo $details['wehda_quas'] ?>"
                                        class="form-control " placeholder="وحدة القياس"
                                        data-validation="required">
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-sm-4">
                                <label class=""> نوع الوحدة </label>
                            </div>
                            <div class="col-xs-8 r-input">
                                <?php foreach ($types as $key => $value) {
                                    $check = '';
                                    if (isset($details) && $details['no3_wehda_quas'] == $key) {
                                        $check = 'checked';
                                    } ?>
                                    <div class="radio-content"><input type="radio" id="rsd<?= $key ?>"
                                                                      name="no3_wehda_quas"
                                                                      class='no3_wehda_quas' class="input_style_2"
                                                                      value="<?= $key ?>"
                                                                      data-validation="required" <?= $check ?> <?= $disabled ?>>
                                        <label class="radio-label" for="rsd<?= $key ?>"><?= $value ?></label>
                                    </div>                            <?php } ?>
                            </div>
                        </div>


                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-sm-4">
                                <label class=""> القيمة السابقة </label>
                            </div>
                            <div class="col-xs-8 r-input">
                                <input
                                        type="text" id="last_value" name="last_value"
                                        onkeypress="validate_number(event)"
                                        value="<?php if (isset($details)) echo $details['last_value'] ?>"
                                        class="form-control " placeholder="القيمة السابقة"
                                        data-validation="required">
                            </div>
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-sm-4">
                                <label class=""> القيمة المستهدفة </label>
                            </div>
                            <div class="col-xs-8 r-input">

                                <input
                                        type="text" id="want_value" name="want_value"
                                        onkeypress="validate_number(event)"
                                        value="<?php if (isset($details)) echo $details['want_value'] ?>"
                                        class="form-control " placeholder="القيمة المستهدفة"
                                        data-validation="required">
                            </div>
                        </div>


                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-sm-4">
                                <label class=""> طريقة الإحتساب </label>
                            </div>
                            <div class="col-xs-8 r-input">
                                <?php foreach ($types_ways as $key => $value) {
                                    $check = '';
                                    if (isset($details) && $details['tareket_hesab'] == $key) {
                                        $check = 'checked';
                                    } ?>
                                    <div class="radio-content"><input type="radio" id="hesab<?= $key ?>"
                                                                      name="tareket_hesab"
                                                                      class='tareket_hesab' class="input_style_2"
                                                                      value="<?= $key ?>"
                                                                      data-validation="required" <?= $check ?> <?= $disabled ?>>
                                        <label class="radio-label" for="hesab<?= $key ?>"><?= $value ?></label>
                                    </div>                            <?php } ?>                    </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-sm-4">
                                <label class=""> الترتيب</label>
                            </div>
                            <div class="col-xs-8 r-input">
                                <input
                                        type="text" id="code" name="code"
                                        onchange="Checkcode(3,<?php echo $plan_rkm; ?>);"
                                        value="<?php if (isset($details)) echo $details['code'] ?>"
                                        class="form-control " placeholder="الترتيب" onkeypress="validate_number(event)"
                                        data-validation="required" <?= $readonly ?> <?= $disabled ?>>
                            </div>
                        </div>

                        <div class="col-xs-12 text-center"><br/> <input type="hidden" name="level" id="level"
                                                                        value="<?php if (isset($details)) echo $details['level'] ?>"/>
                            <input type="hidden" name="id" id="id"
                                   value="<?php if ($id != 0) echo $id; else echo 0; ?>"> <input
                                    type="hidden" name="ttype" id="ttype"
                                    value="<?php if ($id != 0) echo $details['ttype']; ?>">
                            <input type="hidden" name="parent_code" id="parent_code"
                                   value="<?php if ($id != 0) echo $details['parent_code']; ?>">

                        </div> <?php echo form_close() ?></div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="modal-footer">
    <?php if (isset($details) && (!empty($details))) { ?>
        <button type="button" class="btn btn-labeled btn-warning " id="save_account_dalel"
                onclick="editAccounDalel_ajex(2,<?= $details['plan_rkm'] ?>)" name="save"
                value="حفظ"><span
                    class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>
            تعديل
        </button>
    <?php } ?>
    <?php if (isset($method) && ($method == 1)) { ?>
        <button type="button" class="btn btn-labeled btn-success" name="save" value="save"
                id="myBtn"
                onclick="save_account_mo24er(1,<?php echo $plan_rkm; ?>)"><span
                    class="btn-label"><i
                        class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
        </button>
        <button type="button" class="btn btn-labeled btn-success" name="save" value="save" id="myBtn"
                onclick="save_account_mo24er(2,<?php echo $plan_rkm; ?>)"><span class="btn-label"><i
                        class="glyphicon glyphicon-floppy-disk"></i></span>حفظ واستمرار
        </button>
    <?php } ?>

    <span class=" label-danger" id="save_start_work_span" style="display: none;float: right">  </span>
    <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal"><span
                class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
    </button>
</div>
