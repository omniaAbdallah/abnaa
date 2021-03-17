<?php
if (isset($allData)) {
        ?>
 <div class="col-sm-12 col-md-12 col-xs-12">
   <input type="hidden" value="<?php echo $allData->id; ?>" name="row_id" id="row_id">
<div class="col-sm-12">
                            
  
    <div class="form-group col-md-2 col-sm-4 padding-4">
                                <label class="label"> تاريخ الطلب  </label>
                            <input type="date" class="form-control" name="order_date" id="order_date" 
                            
                                 value="<?php 
 
            echo   $allData->order_date;
                ?>" />
                   </div>
        <div class="form-group col-md-4 col-sm-4 padding-4">
        <label class="label ">إسم البنك الجديد<strong
                class="astric">*</strong><strong></strong> </label>
                
        <select name="bank_id_fk" id="bank_id_fk"
            data-validation="required" aria-required="true"
       
            onchange="$('#bank_code1').val($(this).find('option:selected').attr('bank_code'))"
             class="form-control ">
        <option value="">إختر</option>
        <?php
        if (isset($banks) && $banks != null) {
            foreach ($banks as $bank) {
                $select = '';
                if ($bank->id == $allData->new_bank_id_fk) {
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
      <div class="form-group col-md-2 col-sm-4 padding-4">
                                <label class="label"> كود البنك الجديد  </label>
                                <input type="text" class="form-control  " name="bank_code"
                                       id="bank_code1" 
                                       value="<?php if (isset($banks) && $banks != null) {foreach ($banks as $bank) { if ($bank->id == $allData->new_bank_id_fk) {echo $bank->bank_code;}?><?php }}?>" readonly/>
                            </div>
                            <div class="form-group col-md-4 col-sm-4 padding-4">
                                <label class="label"> رقم الحساب الجديد<span style="color:red;"> (رقم الحساب لابد أن يكون 24  رقم)</span></label>
                                <input type="text" class="form-control  " maxlength="24" minlength="24"
                                       class="form-control bottom-input"name="bank_account_num" id="bank_account_num"  data-validation="required"
                                       onfocusout="checkLength($(this).val());"
                                       value="<?= $allData->new_bank_account_num ?>"/>
                            </div>
                        
                        <?php if ($allData->new_bank_image != '') {
                            $img_url = "uploads/human_resources/emp_banks/".$allData->new_bank_image;
                        } else {
                            $img_url = "asisst/web_asset/img/logo.png";
                        } ?>
                          <div class="form-group col-md-2 col-sm-4 padding-4">
                                <label class="label"> صوره الحساب الجديد</label>
                               
                                
                                <input type="file"  id="userfile"
                                       name="userfile" class="form-control"
                                      >
                                      <a target="_blank" onclick="show_img('<?php echo base_url().$img_url; ?>')">
                                    <i class=" fa fa-eye"></i>
                                </a>
                            </div>
 </div>       
 <div class="col-xs-12 text-center">
                                <button type="button" onclick="change_banks(<?= $allData->emp_id ?>)" id="buttons"
                                        name="add" value="add" class=" btn btn-success btn-labeled"><span
                                            class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span> حفظ
                                    حسابات البنك
                                </button>
                            </div>
                            <?php } ?>