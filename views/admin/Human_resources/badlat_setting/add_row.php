<select class="form-control badl_setting<?=$type?>" onchange="get_rkm_hesab(<?= $type?>,this.value);get_option($(this).val(),<?=$type?>);" id="badl<?=$type?>1"  name="badl_discount_id_fk" class="form-control" data-validation="required">
    <option value="0">اختر</option>
    <?php
    if(isset($records)&&!empty($records)){
      foreach ($records as $row){
        ?>
        <option value="<?php echo $row->id;?>"><?php echo $row->title;?></option>
        <?php } } ?>
      </select>