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


<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
    <div class="panel-heading">
        <div class="panel-title">
            <h4>إضافة حساب</h4>
        </div>
    </div>
    <div class="panel-body">

        <div class="col-md-12 col-sm-12 col-xs-12 padding-4">

            <?php
//            $id =;
            $readonly = '';
            $disabled = '';
            $required = 'required';
            $submitEdit = 'button';
            $submitSave = 'button';
            if ($id != 0) {
                $submitEdit = '';
                echo form_open_multipart('finance_accounting/dalel/Dalel/update/' . $id, array('id' => 'MyFormDalil'));
                if (isset($details)) {
                    if ($details['hesab_no3'] != 1) {
                        $readonly = 'readonly';
                        $display_markz_tklfa = "block";

                    } else {
                        $display_markz_tklfa = "none";

                    }
                    if ($details['branch'] != null) {
                        $disabled = 'disabled';
                    } elseif ($details['level'] == 1) {
                        $disabled = '';
                        $required = '';
                    }

                    if ($details['markz_tklfa'] == 1) {
                        $disabled_markz_tklfa = '';

                    } else {
                        $disabled_markz_tklfa = 'disabled';

                    }
                }
                } else {
                $submitSave = '';
                $display_markz_tklfa = "none";
                $disabled_markz_tklfa = 'disabled';
                echo form_open_multipart('finance_accounting/dalel/Dalel/addAccount', array('id' => 'MyFormDalil'));
            }

            $mainAccount = array(1 => 'الأصول', 2 => 'الخصومات', 3 => 'الإيرادات', 4 => 'المصروفات');
            $types = array(1 => 'رئيسي', 2 => 'فرعي');
            $nature = array('إختر', 'مدين', 'دائن');
            $follow = array(1 => 'ميزانية', 2 => 'قائمة الأنشطة');
            //14-1-om
            $markz_tklfa_arr = array(1 => 'نعم', 2 => 'لا');

            ?>
            <div class="form-group col-sm-12 col-xs-12 no-padding">

                <!--14-1-om-->
                <fieldset>
                    <legend> بيانات الحساب</legend>

                    <div class="col-md-5 col-sm-6 padding-4">


                        <h6 class="label_title_2 ">الحساب الرئيسي </h6>
                        <input class="form-control " id="parent_name" name="parent_name" readonly
                               data-validation="<?= $required ?>"
                               value="<?php if (isset($details)) echo $details['parent_code'] . '--' . $details['parent_name'] ?>"
                               onclick="$('#myModal').modal('show'); GetDiv_accounts('myDiv_account')"
                            <?= $disabled ?> >
                        <input type="hidden" id="parent" name="parent"
                               value="<?php if (isset($details)) echo $details['parent'] ?>">


                    </div>
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
                         aria-labelledby="myModalLabel">

                        <div class="modal-dialog" role="document" style="width: 70%">

                            <div class="modal-content">

                                <div class="modal-header">

                                    <button type="button" class="close"
                                            onclick="$('#myModal').modal('hide')">&times;
                                    </button>

                                    <h4 class="modal-title">الدليل المحاسبي </h4>

                                </div>
                                <div class="modal-body">
                                    <div id="myDiv_account"></div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger"
                                            onclick="$('#myModal').modal('hide')">إغلاق
                                    </button>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!--14-1-om-->

                    <div class="col-md-2 col-sm-6 padding-4">

                        <h6 class="label_title_2 ">رقم الحساب </h6>

                        <input type="text" id="code" name="code"
                               value="<?php if (isset($details)) echo $details['code'] ?>"
                               class="form-control input_style_2 input-style" placeholder="رقم الحساب"
                               data-validation="required" <?= $readonly ?> <?= $disabled ?>>

                    </div>

                    <div class="col-md-5 col-sm-6 padding-4">

                        <h6 class="label_title_2 ">إسم الحساب </h6>

                        <input type="text" id="name" name="name"
                               value="<?php if (isset($details)) echo $details['name'] ?>"
                               class="form-control input_style_2 input-style" placeholder="إسم الحساب"
                               data-validation="required">

                    </div>

                    <div class="col-md-4 col-sm-6 padding-4">

                        <h6 class="label_title_2 ">نوع الحساب </h6>

                        <?php
                        foreach ($types as $key => $value) {
                            $check = '';
                            if (isset($details) && $details['hesab_no3'] == $key) {
                                $check = 'checked';
                            }
                            ?>
                            <div class="radio-content">
                                <input type="radio" id="rsd<?= $key ?>" name="hesab_no3"
                                       class='hesab_no3'
                                       class="input_style_2"
                                       onclick="show_markz(this)"
                                       value="<?= $key ?>" data-validation="required" <?= $check ?> <?= $disabled ?>>
                                <label class="radio-label" for="rsd<?= $key ?>"><?= $value ?></label>
                            </div>
                            <?php
                        }
                        ?>
                    </div>

                    <div class="col-md-3 col-sm-6 padding-4">

                        <h6 class="label_title_2 ">طبيعة الحساب </h6>

                        <select name="hesab_tabe3a" id="hesab_tabe3a" class="form-control input_style_2"
                                data-validation="required" aria-required="true" tabindex="-1"
                                aria-hidden="true" <?= $disabled ?>>
                            <?php
                            foreach ($nature as $key => $value) {
                                $select = '';
                                if (isset($details) && $details['hesab_tabe3a'] == $key) {
                                    $select = 'selected';
                                }
                                ?>
                                <option value="<?= $key ?>" <?= $select ?>><?= $value ?></option>
                                <?php
                            }
                            ?>
                        </select>

                    </div>

                    <div class="col-md-5 col-sm-6 padding-4">

                        <h6 class="label_title_2 ">تبويب الحساب </h6>

                        <select name="hesab_report" id="hesab_report" class="form-control input_style_2"
                                data-validation="required" aria-required="true" tabindex="-1"
                                aria-hidden="true" <?= $disabled ?>>
                            <option value="">إختر</option>
                            <?php
                            foreach ($follow as $key => $value) {
                                $select = '';
                                if (isset($details) && $details['hesab_report'] == $key) {
                                    $select = 'selected';
                                }
                                ?>
                                <option value="<?= $key ?>" <?= $select ?>><?= $value ?></option>
                                <?php
                            }
                            ?>
                        </select>

                    </div>
                    <?php
                    if (isset($details) && (!empty($details))) {
                        ?>
                        <div class="col-xs-12 text-center">

                            <div class="col-md-9 col-sm-6 padding-4">
                            </div>
                            <div class="col-md-3 col-sm-6 padding-4">
                                <br>
                                <button type="button"
                                        class="btn btn-labeled btn-success " id="save_account_dalel"
                                        onclick="editAccounDalel_ajex(1)" name="add" value="حفظ">
                                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                    بيانات
                                    الحساب
                                </button>
                            </div>
                        </div>
                    <?php } ?>
                </fieldset>
                <!--14-1-om-->
                <fieldset id="markz_tklfa_div" style="margin-top: 20px; display: <?= $display_markz_tklfa ?>">
                    <legend> مراكز التكلفة</legend>

                    <div class="col-xs-12 ">

                        <div class="col-md-4 col-sm-6 padding-4">

                            <h6 class="label_title_2 ">مركز التكلفة </h6>

                            <?php
                            foreach ($markz_tklfa_arr as $key => $value) {
                                $check = '';
                                if (isset($details) && $details['markz_tklfa'] == $key) {
                                    $check = 'checked';
                                }
                                ?>
                                <div class="radio-content">
                                    <input type="radio" id="markz_tklfa<?= $key ?>" name="markz_tklfa"
                                           class='markz_tklfa'
                                           onclick="check_markz_tklfa(this)"
                                           class="input_style_2"
                                           value="<?= $key ?>"
                                           data-validation="required" <?= $check ?> >
                                    <label class="radio-label"
                                           for="markz_tklfa<?= $key ?>"><?= $value ?></label>
                                </div>
                                <?php
                            }
                            ?>
                        </div>

                        <div class="col-md-4 col-sm-3 col-xs-6">
                            <label class="label "> مركز التكلفه</label>
                            <select id="markz_tklfa_fk" name="markz_tklfa_fk[]" multiple
                                    title="يمكنك إختيار أكثر من مركز"
                                    class="form-control selectpicker" <?= $disabled_markz_tklfa ?>
                                    data-show-subtext="true"
                                    data-live-search="true">
                                <option value="">إختر</option>
                                <?php
                                foreach ($marakez as $key) {

                                    $select = '';
                                    if (isset($details['marakez']) && (!empty($details['marakez']))) {
                                        if (in_array($key->id, $details['marakez'])) {
                                            $select = 'selected';
                                        }
                                    }
                                    ?>
                                    <option value="<?php echo $key->id; ?>" <?= $select ?>> <?php echo $key->name; ?></option>
                                <?php } ?>
                            </select>
                            <span id="markz_tklfa_fk_span" class="error" style="display: none ;color: red"> هذا الحقل مطلوب</span>
                        </div>
                        <?php
                        if (isset($details) && (!empty($details))) {

                            ?>
                            <div class="col-xs-12 text-center">

                                <div class="col-md-9 col-sm-6 padding-4">
                                </div>
                                <div class="col-md-3 col-sm-6 padding-4">

                                    <button type="button"
                                            class="btn btn-labeled btn-success " id="save_account_dalel"
                                            onclick="editAccounDalel_ajex(2)" name="add" value="حفظ">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                        مراكز التكلفة
                                    </button>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                    <!--14-1-om-->
                </fieldset>

                <div class="col-xs-12 text-center">
                    <br/>
                    <input type="hidden" name="level" id="level"
                           value="<?php if (isset($details)) echo $details['level'] ?>"/>
                    <input type="hidden" name="id" id="id"
                           value="<?php if ($id != 0) echo $id; else echo 0; ?>">
                    <input type="hidden" name="ttype" id="ttype"
                           value="<?php if ($id != 0) echo $details['ttype']; ?>">
                    <input type="hidden" name="parent_code" id="parent_code"
                           value="<?php if ($id != 0) echo $details['parent_code']; ?>">
                    <?php if (isset($method) && ($method == 1)) { ?>

                        <button type="button" class="btn btn-labeled btn-success" name="save" value="save"
                                id="myBtn" onclick="save_account()">
                            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                        </button>

                    <?php } ?>

                </div>
                <?php echo form_close() ?>
            </div>


        </div>


    </div>
</div>