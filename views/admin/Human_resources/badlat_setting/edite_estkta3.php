<?php
if (isset($badalat) && !empty($badalat)) {
    
        
            ?>

<input type="hidden" name="having_row_id" value="<?php echo $badalat->id; ?>">
                            <input type="hidden" name="emp_code" id="emp_code" class="form-control half" 
               value="<?php echo $badalat->emp_code; ?>" >
               <input type="hidden" name="type" id="type" class="form-control half" 
               value="2" >
               <input type="hidden" name="emp_id" id="emp_code" class="form-control half" 
               value="<?php echo $badalat->emp_code; ?>" >
                                <div class="col-md-2 padding-4">
                                    <label class="label ">اسم البند</label>
                                    <select class="form-control " data-validation="required" aria-required="true"
                                            tabindex="-1" aria-hidden="true"
                                            id="band_name<?php echo $badalat->badl_discount_id_fk; ?>"
                                            name="have_badl_discount_id_fk"
                                            onchange="update_rkm_esab(2,this.value,<?= $badalat->id?>)"
                                    >
                                        <option value="0">اختر</option>
                                        <?php
                                        if (isset($discounts) && !empty($discounts)) {
                                            foreach ($discounts as $row) {
                                                ?>
                                                <option
                                                        value="<?php echo $row->id; ?>"<?php if ($row->id == $badalat->badl_discount_id_fk) {
                                                    echo 'selected';
                                                } ?>><?php echo $row->title; ?></option>
                                            <?php }
                                        } ?>
                                        <select>
                                </div>
                                <div class="col-md-2 padding-4">
                                    <label class="label   ">طريقه الحساب </label>
                                    <select class="form-control " id=""
                                            onchange="get_value_modal($(this).val(),<?php echo $badalat->badl_discount_id_fk ?>);"
                                            data-validation="required" aria-required="true" tabindex="-1"
                                            aria-hidden="true" name="have_method_to_count">
                                        <option>اختر</option>
                                        <option value="1"<?php if ($badalat->method_to_count == 1) {
                                            echo 'selected';
                                        } ?>>قيمه
                                        </option>
                                        <option value="2"<?php if ($badalat->method_to_count == 2) {
                                            echo 'selected';
                                        } ?>>نسبه
                                        </option>
                                        <select>
                                </div>
                                <div class="col-md-2 padding-4">
                                    <label class="label   ">القيمه </label>
                                    <input class="form-control  value<?php echo $badalat->badl_discount_id_fk ?>"
                                           id="edit_val<?php echo $badalat->badl_discount_id_fk ?>"
                                           name="have_value" type="text" data-validation="required"
                                           value="<?php echo $badalat->value; ?>">
                                </div>
                                <div class="col-md-2 padding-4">
                                    <label class="label ">
محدد المده </label>
                                    <select class="form-control " data-validation="required" aria-required="true"
                                            onchange="limit_peroid($(this).val(),<?php echo $badalat->id; ?>);"
                                            tabindex="-1" aria-hidden="true" name="have_specific_period">
                                        <option value="0">اختر</option>
                                        <?php
                                        $yes_no=array(1=>'نعم',2=>'لا');
                                        foreach ($yes_no as $key => $value) {
                                            ?>
                                            <option value="<?= $key ?>"<?php if ($key == $badalat->specific_period) {
                                                echo 'selected';
                                            } ?> ><?= $value ?></option>
                                        <?php } ?>
                                        <select>
                                </div>
                                <div class="col-md-2 padding-4">
                                    <label class="label ">من تاريخ </label>
                                    <input class="form-control "
                                           id="have_date_from<?php echo $badalat->id; ?>" name="have_date_from"
                                           type="date" <?php if ($badalat->specific_period != 1) {
                                        echo 'disabled';
                                    } ?> value="<?php if ($badalat->specific_period == 1) {
                                        echo $badalat->date_from;
                                    } ?>" class="form-control"  >
                                </div>
                                <div class="col-md-2 padding-4">
                                    <label class="label ">الي تاريخ </label>
                                    <input class="form-control "
                                           id="have_date_to<?php echo $badalat->id; ?>" type="date"
                                           name="have_date_to" <?php if ($badalat->specific_period != 1) {
                                        echo 'disabled';
                                    } ?> value="<?php if ($badalat->specific_period == 1) {
                                        echo $badalat->date_to;
                                    } ?>" class="form-control" >
                                </div>
                                <div class="col-md-4 padding-4">
                                    <label class="label  ">الدليل</label>
                                    <input name="have_dalel_code" id="have_dalel_code2<?php echo $badalat->id;?>" class="form-control half"
                                           value="<?php if (!empty($badalat->dalel_code)){echo $badalat->dalel_code;} else{echo 'لا يوجد';} ?>" readonly>
                                    <input name="have_dalel_name" id="have_dalel_name2<?php echo $badalat->id;?>" class="form-control half"
                                           value="<?php if (!empty($badalat->dalel_name)){echo $badalat->dalel_name;} else{echo 'لا يوجد';} ?>" readonly>
                                </div>
                                <?php }
    
?>