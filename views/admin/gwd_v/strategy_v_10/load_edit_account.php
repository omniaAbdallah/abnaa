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
<!--<script>
    document.getElementById('add_editAccounDalel_title').innerText = '<? /*=$title*/ ?> ';
</script>-->
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title" id="add_editAccounDalel_title"><?= $title ?></h4>
</div>


<div class="modal-body">
    <div class="container-fluid">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-body">
                <div class="col-md-12 col-sm-12 col-xs-12 padding-4">
                    <?php
                    $readonly = '';
                    $disabled = '';
                    $required = 'required';
                    $submitEdit = 'button';
                    $submitSave = 'button';
                    if ($id != 0) {
                        $submitEdit = '';
                        echo form_open_multipart('gwd/Gawda_plans/update/' . $id, array('id' => 'MyFormDalil'));
                        if (isset($details)) {
                            if ($details['level'] == 1) {
                                $disabled = '';
                            }

                        }
                    } else {
                        $submitSave = '';
                        $display_markz_tklfa = "none";
                        $disabled_markz_tklfa = 'disabled';
                        echo form_open_multipart('gwd/Gawda_plans/addAccount', array('id' => 'MyFormDalil'));
                    }
                    $mainAccount = array(1 => 'الأصول', 2 => 'الخصومات', 3 => 'الإيرادات', 4 => 'المصروفات');
                    $types = array(1 => 'رئيسي', 2 => 'فرعي');
                    $nature = array('إختر', 'مدين', 'دائن');
                    $follow = array(1 => 'ميزانية', 2 => 'قائمة الأنشطة');
                    $markz_tklfa_arr = array(1 => 'نعم', 2 => 'لا'); ?>
                    <div class="form-group col-sm-12 col-xs-12 no-padding">

                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">

                            <div class="col-sm-4">
                                <label class=""> الهدف الإستراتيجي </label>
                            </div>
                            <div class="col-xs-8 r-input">

                                <input class="form-control " id="parent_name" name="parent_name" readonly
                                       data-validation="required"
                                       value="<?php if (isset($details)) echo $details['parent_name'] ?>"
                                    <?= $disabled ?> >
                                <input type="hidden" id="parent" name="parent"
                                       value="<?php if (isset($details)) echo $details['parent'] ?>">
                            </div>
                        </div>
                        <input type="hidden" id="plan_rkm" name="plan_rkm"
                               value="<?php echo $plan_rkm; ?>">

                        <!--yara  -->

                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">

                            <div class="col-sm-4">
                                <label class=""> السياسة </label>
                            </div>
                            <div class="col-xs-8 r-input">
                                <input
                                        type="text" id="name" name="name"
                                        value="<?php if (isset($details)) echo $details['name'] ?>"
                                        class="form-control " placeholder="السياسة"
                                        data-validation="required">

                            </div>

                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">

                            <div class="col-sm-4">
                                <label class=""> الترتيب </label>
                            </div>
                            <div class="col-xs-8 r-input">

                                <input
                                        type="number" id="code" name="code" onkeypress="validate_number(event)"
                                        value="<?php if (isset($details)) echo $details['code'] ?>"
                                        class="form-control" placeholder="الترتيب"
                                        oninput="Checkcode(2,<?php echo $plan_rkm; ?>);"
                                        data-validation="required" <?= $readonly ?> <?= $disabled ?>>
                            </div>

                        </div>
                        <!-- yara -->


                        <div class="col-xs-12 text-center"><br/>
                            <input type="hidden" name="level" id="level"
                                   value="<?php if (isset($details)) echo $details['level'] ?>"/>
                            <input type="hidden" name="id" id="id"
                                   value="<?php if ($id != 0) echo $id; else echo 0; ?>">
                            <input type="hidden" name="ttype" id="ttype"
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
                onclick="editAccounDalel_ajex(1,<?= $details['plan_rkm'] ?>)" name="save" value="حفظ"><span
                    class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>
            تعديل
        </button>
    <?php } ?>
    <?php if (isset($method) && ($method == 1)) { ?>

        <button type="button" class="btn btn-labeled btn-success" name="save" value="save" id="myBtn"
                onclick="save_account(1,<?php echo $plan_rkm; ?>)"><span class="btn-label"><i
                        class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
        </button>
        <button type="button" class="btn btn-labeled btn-success" name="save" value="save" id="myBtn"
                onclick="save_account(2,<?php echo $plan_rkm; ?>)"><span class="btn-label"><i
                        class="glyphicon glyphicon-floppy-disk"></i></span>حفظ واستمرار
        </button>
    <?php } ?>

    <span class=" label-danger" id="save_start_work_span" style="display: none;float: right">  </span>
    <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal"><span
                class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
    </button>
</div>

