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
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title" id="myModalLabel_header"><?=$title?></h4></div>


<div class="modal-body">
    <div class="container-fluid">
        <div class="col-md-12 col-sm-12 col-xs-12 padding-4">
            <?php
            $readonly = '';
            $disabled = '';
            $required = 'required';
            $submitEdit = 'button';
            $submitSave = 'button';
            if ($id != 0) {
                $submitEdit = '';
                echo form_open_multipart('finance_accounting/markz_tklfa/Markz_tklfaa_order/update/' . $id, array('id' => 'MyForm_markz_tklfaa'));
                if (isset($details)) {
                    if ($details['markz_no3'] != 1) {
                        $readonly = 'readonly';
                    } else {
                    }
                    if ($details['branch'] != null) {
                        $disabled = 'disabled';
                    } elseif ($details['level'] == 1) {
                        $disabled = '';
                        $required = '';
                    }

                }
            } else {
                $submitSave = '';
                echo form_open_multipart('finance_accounting/markz_tklfa/Markz_tklfaa_order/add_markz_tklfaa', array('id' => 'MyForm_markz_tklfaa'));
            }
            $types = array(1 => 'رئيسي', 2 => 'فرعي');
            ?>
            <div class="form-group col-sm-12 col-xs-12 no-padding">
                <fieldset>                    <?php if (!empty($parent['name'])) { ?>
                        <legend style="float: left;margin-top: -46px;"> مركز التكلفة
                            العام: <?= $parent['name'] ?></legend>                    <?php } ?>
                    <legend> بيانات مركز التكلفة</legend>
                    <div class="col-md-5 col-sm-6 padding-4">
                        <h6 class="label_title_2 ">مركز التكلفة الرئيسي </h6><input
                            class="form-control " id="parent_name" name="parent_name" readonly data-validation="<?= $required ?>"
                            value="<?php if (isset($details)) echo $details['parent_code'] . '--' . $details['parent_name'] ?>"<?= $disabled ?> >
                        <input type="hidden" id="parent" name="parent"
                               value="<?php if (isset($details)) echo $details['parent'] ?>"></div>
                    <div class="col-md-2 col-sm-6 padding-4">
                        <h6 class="label_title_2 ">رقم مركز التكلفة </h6>
                        <input type="text" id="code" name="code" value="<?php if (isset($details)) echo $details['code'] ?>" class="form-control input_style_2 input-style" placeholder="رقم مركز التكلفة" data-validation="required" <?= $readonly ?> <?= $disabled ?>>
                    </div>
                    <div class="col-md-5 col-sm-6 padding-4"><h6 class="label_title_2 ">إسم مركز التكلفة </h6>
                        <input type="text" id="name" name="name" value="<?php if (isset($details)) echo $details['name'] ?>" class="form-control input_style_2 input-style" placeholder="إسم مركز التكلفة" data-validation="required">
                    </div>
                    <div class="col-md-4 col-sm-6 padding-4"><h6 class="label_title_2 ">نوع مركز التكلفة </h6> <?php foreach ($types as $key => $value) {
                            $check = '';
                            if (isset($details) && $details['markz_no3'] == $key) {
                                $check = 'checked';
                            } ?>
                            <div class="radio-content">
                                <input type="radio" id="rsd<?= $key ?>" name="markz_no3" class='markz_no3' class="input_style_2" value="<?= $key ?>" data-validation="required" <?= $check ?> <?= $disabled ?>>
                                <label class="radio-label" for="rsd<?= $key ?>"><?= $value ?></label>
                            </div>                            <?php } ?>                    </div>

                                   </fieldset>
                <div class="col-xs-12 text-center"><br/>
                    <input type="hidden" name="level" id="level" value="<?php if (isset($details)) echo $details['level'] ?>"/>
                    <input type="hidden" name="id" id="id" value="<?php if ($id != 0) echo $id; else echo 0; ?>">
                    <input type="hidden" name="ttype" id="ttype" value="<?php if ($id != 0) echo $details['ttype']; ?>">
                    <input type="hidden" name="parent_code" id="parent_code" value="<?php if ($id != 0) echo $details['parent_code']; ?>">
                    <?php /*if (isset($method) && ($method == 1)) { ?>
                        <button type="button" class="btn btn-labeled btn-success" name="save" value="save" id="myBtn"
                                onclick="save_markz_tklfaa(1)"><span class="btn-label"><i
                                    class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                        </button>
                        <button type="button" class="btn btn-labeled btn-success" name="save" value="save" id="myBtn"
                                onclick="save_markz_tklfaa(2)"><span class="btn-label"><i
                                    class="glyphicon glyphicon-floppy-disk"></i></span>حفظ واستمرار
                        </button>                    <?php } */?>
                </div> <?php echo form_close() ?></div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <?php if (isset($method) && ($method == 1)) { ?>
        <button type="button" class="btn btn-labeled btn-success" name="save" value="save" id="myBtn"
                onclick="save_markz_tklfaa(1)"><span class="btn-label"><i
                    class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
        </button>
        <button type="button" class="btn btn-labeled btn-success" name="save" value="save" id="myBtn"
                onclick="save_markz_tklfaa(2)"><span class="btn-label"><i
                    class="glyphicon glyphicon-floppy-disk"></i></span>حفظ واستمرار
        </button>                    <?php } ?>
    <?php if (isset($details) && (!empty($details))) { ?>
       <!-- <div class="col-xs-12 text-center">
            <div class="col-md-9 col-sm-6 padding-4"></div>
            <div class="col-md-3 col-sm-6 padding-4"><br>-->
                <button type="button" class="btn btn-labeled btn-success " id="save_markz_tklfaa"
                        onclick="edit_markz_tklfaa_ajex()" name="add" value="حفظ"><span
                        class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ بيانات مركز التكلفة
                </button>
            <!--</div>
        </div> -->                   <?php } ?>
    <span class=" label-danger" id="save_start_work_span" style="display: none;float: right">  </span>
    <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal"><span
            class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
    </button>
</div>