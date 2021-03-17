<div class="col-sm-12 no-padding">
<div class="col-sm-10 no-padding">
    <input type="hidden" value="<?php echo $allData->id; ?>" name="row_id">
    <div class="form-group col-md-2 col-sm-4 padding-4">
        <label class="label">إسم الموظف </label>
        <input type="text" class="form-control" name="emp_n" id="emp_n" readonly
               value="<?php
               if (isset($employee['employee']) && !empty($employee['employee'])) {
                   echo
                   $employee['employee'];
               } ?>"/>
        <input type="hidden" class="form-control" name="emp_id" id="emp_id"
               readonly
               value="<?php
               if (isset($employee['id']) && !empty($employee['id'])) {
                   echo
                   $employee['id'];
               } ?>"/>
    </div>
    <div class="form-group col-md-1 col-sm-4 padding-4">
        <label class="label">كود الموظف </label>
        <input type="text" class="form-control" name="emp_code" id="emp_code"
               readonly
               value="<?php
               if (isset($employee['emp_code']) && !empty($employee['emp_code'])) {
                   echo
                   $employee['emp_code'];
               } ?>"/>
    </div>

    <div class="form-group col-md-3 col-sm-4 padding-4">
        <label class="label"> المسمي الوظيفي </label>
        <input type="text" class="form-control" name="mosma_wazefy_n" id="mosma_wazefy_n"
               readonly
               value="<?php
               if (isset($employee['mosma_wazefy_n']) && !empty($employee['mosma_wazefy_n'])) {
                   echo
                   $employee['mosma_wazefy_n'];
               } ?>"/>
        <input type="hidden" name="mosma_wazefy_id" id="mosma_wazefy_id"
               value="<?php
               if (isset($employee['degree_id']) && !empty($employee['degree_id'])) {
                   echo
                   $employee['degree_id'];
               } ?>"/>
    </div>
    <div class="form-group col-md-3 col-sm-4 padding-4">
        <label class="label"> الاداره </label>
        <input type="text" class="form-control" name="edara_n" id="edara_n"
               readonly
               value=" <?php
               if (isset($employee['edara_n']) && !empty($employee['edara_n'])) {
                   echo
                   $employee['edara_n'];
               } ?>"/>
    </div>
    <div class="form-group col-md-3 col-sm-4 padding-4">
        <label class="label"> القسم </label>
        <input type="text" class="form-control" name="qsm_n" id="qsm_n"
               readonly
               value=" <?php
               if (isset($employee['qsm_n']) && !empty($employee['qsm_n'])) {
                   echo
                   $employee['qsm_n'];
               } ?>"/>
    </div>
    <div class="form-group col-sm-3  col-md-3  padding-4">
        <label class="label "> اسم البنك الحالي<strong class="astric">*</strong><strong></strong> </label>

        <?php
        if (isset($banks) && $banks != null) {
            foreach ($banks as $bank) {
                $select = '';
                if ($bank->id == $allData->bank_id_fk) {
                    $select = 'selected';
                    ?>
                    <input type="text" readonly value="<?= $bank->ar_name ?>"
                           data-validation="required" aria-required="true" class="form-control ">
                    <input type="hidden" readonly name="edit_bank_id_fk" id="edit_bank_id_fk" value="<?= $bank->id ?>"
                           class="form-control ">
                    <?php

                }
            }
        }
        ?>
    </div>
    <div class="form-group col-sm-2  padding-4">
        <label class="label ">كود البنك الحالي<strong
                    class="astric">*</strong><strong></strong> </label>
        <input type="text" class="form-control  " name="bank_code" readonly
               id="bank_code" value="<?= $allData->bank_code ?>" readonly/>
    </div>
    <div class="form-group  col-sm-4  padding-4">
        <label class="label ">رقم الحساب الحالي <strong
                    class="astric">*</strong><strong></strong> </label>
        <input type="text" readonly class="form-control  " maxlength="24" minlength="24"
               class="form-control bottom-input" name="edit_bank_account_num"
               id="edit_bank_account_num" data-validation="required"
               onfocusout="checkLength($(this).val());"
               value="<?= $allData->bank_account_num ?>"/>
    </div>
    </div>
    <div class="form-group col-md-2 col-sm-4 padding-4">
        <label class="label"> صوره الحساب الحالي</label>
        <?php if ($allData->bank_id_fk_image != '') {
            $img_url = "uploads/human_resources/emp_banks/" . $allData->bank_id_fk_image;

            if (!file_exists($img_url)) {
                $img_url = "asisst/web_asset/img/logo.png";
            }
        } else {
            $img_url = "asisst/web_asset/img/logo.png";
        } ?>
        <img data-toggle="modal" data-target="#modal-img"  onclick="$('#image_view').attr('src','<?=base_url() .$img_url?>')"
             src="<?php echo base_url() . $img_url; ?>"
             style="height: 100px;"
        >
        <!-- <i class=" fa fa-eye"></i> -->
    </div>
</div>
