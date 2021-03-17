<?php
if (isset($allData)) {
        ?>
 <div class="col-sm-12 col-md-12 col-xs-12">
   <input type="hidden" value="<?php echo $allData->id; ?>" name="row_id">
<div class="col-sm-8">
                            <input type="hidden" value="<?php echo $allData->id; ?>" name="row_id">
    <div class="form-group col-md-8 col-sm-4 padding-4">
        <label class="label">إسم الموظف لدي البنك</label>
    <input type="text" class="form-control" name="emp_bank_name" 
         value="<?= $allData->emp_bank_name ?>" />
    </div>
        <div class="form-group col-md-8 col-sm-4 padding-4">
        <label class="label ">اسم البنك<strong
                class="astric">*</strong><strong></strong> </label>
                <input type="hidden" name="emp_code" id="emp_code" class="form-control half" data-validation="required"
        value="<?=$allData->emp_code;?>" >
        <select name="edit_bank_id_fk" id="bank_id_fk"
            data-validation="required" aria-required="true"
            onchange="$('#bank_code').val($(this).find('option:selected').attr('bank_code'))"
            class="form-control ">
        <option value="">إختر</option>
        <?php
        if (isset($banks) && $banks != null) {
            foreach ($banks as $bank) {
                $select = '';
                if ($bank->id == $allData->bank_id_fk) {
                    $select = 'selected';
                }
                ?>
                <option bank_code='<?= $bank->bank_code ?>'
                        value="<?= $bank->id ?>" <?= $select ?>><?= $bank->ar_name ?></option>
                <?php
            }
        }
        ?>
        </select>
      </div>
                            <div class="form-group col-md-8 col-sm-4 padding-4">
                                <label class="label ">كود البنك<strong
                                            class="astric">*</strong><strong></strong> </label>
                                <input type="text" class="form-control  " name="bank_codey"
                                       id="bank_code" value="<?= $allData->bank_code ?>" readonly/>
                            </div>
                            <div class="form-group col-md-8 col-sm-4 padding-4">
                                <label class="label ">رقم الحساب <strong
                                            class="astric">*</strong><strong></strong> </label>
                                <input type="text" class="form-control  " maxlength="24" minlength="24"
                                       class="form-control bottom-input" name="edit_bank_account_num"
                                       id="bank_account_num" data-validation="required"
                                       onfocusout="checkLength($(this).val());"
                                       value="<?= $allData->bank_account_num ?>"/>
                            </div>
                        </div>
                        <?php if ($allData->bank_id_fk_image != 0) {
                            $img_url = "uploads/human_resources/emp_banks/".$allData->bank_id_fk_image;
                        } else {
                            $img_url = "asisst/web_asset/img/logo.png";
                        } ?>
                            <div class="col-sm-4 ">
                                <div class="form-group col-xs-12" style="padding-right: 0">
                                    <div class="form-group">
                                        <div id="post_img" class="imgContent" style="min-height: 120px; ">
                                            <img id="blah<?php echo $allData->id; ?>" style="width: 150px;"
                                                 src="<?php echo base_url().$img_url; ?>">
                                        </div>
                                    </div>
                                </div>
                                <input type="file" id="bank_image" name="bank_image" class="form-control"
                                       onchange="loadFile(event,<?php echo $allData->id; ?>);">
                            </div>
 </div>       
                            <?php } ?>