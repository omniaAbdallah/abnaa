


<?php
if (isset($result) && !empty($result)) {
    $id = $result[0]->id;
    $talab_rkm = $result[0]->talab_rkm;
    $person_id_fk = $result[0]->person_id_fk;
    $person_card_num = $member_card_num;
    $disease_type = $result[0]->disease_type;
    $file_num =$result[0]->file_num;
    $notes =$result[0]->notes;




} else {
    if (!empty($last_talab_rkm)) {
        $talab_rkm = $last_talab_rkm + 1;
    } else {
        $talab_rkm = 1;
    }
    $file_num ='';
    $person_id_fk='';
    $disease_type='';
    $notes='';
}
if (isset($result) && !empty($result)) {
    echo form_open_multipart('osr/service_orders/Medical_center/update_medical_center/' . $id , array('id' => 'medical_center_form', 'class' => 'medical_center_form'));
    $action = " تعديل ";
    $onclick ="update_medical_center(".$id.");";
    echo '<input type="hidden"  name="update"  id="update" value="update">';
} else {
    $action = "حفظ";
    $onclick ="save_medical_center();";
    echo form_open_multipart('osr/service_orders/Medical_center/', array('id' => 'medical_center_form', 'class' => 'medical_center_form'));
    echo '<input type="hidden"  name="add"  id="add" value="add">';
}
?>
<div class="form-group col-sm-12 col-xs-12 no-padding no-margin">
    <div class="form-group col-md-1 col-sm-6 padding-4">
        <label class="label">رقم الطلب</label>
        <input type="text" name="talab_rkm" id="talab_rkm" value="<?php echo $talab_rkm; ?>"
               class="form-control "
            <?php if (!empty($talab_rkm)) {
                echo 'readonly';
            } else {
                echo 'data-validation="required"';
            } ?>
               data-validation-has-keyup-event="true">
    </div>
    <div class="form-group col-md-2 padding-4  col-sm-4 col-xs-12">
        <label class="label"> رقم السجل المدني للأم </label>
        <input type="number" class="form-control"
               value="<?php if (!empty($mother_national_num)) {
                   echo $mother_national_num;
               } ?>" readonly="readonly"/>
    </div>
    <div class="form-group col-sm-3 col-xs-12 padding-4">
        <label class="label "> الاسم</label>
        <select name="person_id_fk" id="person_id_fk"
                onChange="member_card_num();"
                class="form-control " data-validation="required">
            <option value="">إختر</option>
            <?php
            if (isset($children) && $children != null) {
                foreach ($children as $value) {
                    $select = '';
                    if (isset($result) && $person_id_fk == $value->id) {
                        $select = 'selected';
                    }
                    ?>
                    <option data-member_card="<?=$value->member_card_num?>" value="<?= $value->id ?>" <?= $select ?>><?= $value->member_full_name ?></option>
                    <?
                }
            }
            ?>
        </select>
    </div>
    <div class="form-group col-md-2 col-sm-4 col-xs-12 padding-4">
        <label class="label"> رقم الهويه </label>
        <input type="number" class="form-control" id="person_card_num" name="person_card_num"
               value="<?php if (!empty($person_card_num)) {
                   echo $person_card_num;
               } ?>" readonly="readonly"/>
    </div>

    <div class="form-group col-sm-3 col-xs-12 padding-4">
        <label class="label "> نوع المرض</label>
        <select id="disease_type" name="disease_type" placeholder="نوع المرض"
                class="form-control" data-validation="required" >
            <option value="">اختر</option>
            <?php
            foreach ($all_disease_type as $row3):
                $selected = '';
                if ($row3->id_setting == $disease_type) {
                    $selected = 'selected';
                } ?>
                <option value="<?php echo $row3->id_setting; ?>" <?php echo $selected ?> >
                    <?php echo $row3->title_setting; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group col-sm-4 col-xs-12 padding-4">
        <label class="label "> ملاحظات</label>
        <textarea id="notes" name="notes" class="form-control  " data-validation="required">
		               <?= $notes ?>
		            </textarea>
    </div>
</div>

<!--            <div class="form-group col-sm-12 col-xs-12">-->
<!--                --><?php
//                if (isset($record)) {
//                    $action = "تعديل";
//                } else {
//                    $action = "حفظ";
//                } ?>
<!--                <button type="submit" name="add_medical" value="حفظ" class="btn btn-purple w-md m-b-5"><span><i-->
<!--                                class="fa fa-floppy-o" aria-hidden="true"></i></span> --><?//= $action ?><!-- </button>-->
<!--            </div>-->
<!--<div class="col-xs-12 no-padding" style="padding: 10px;">
    <div class="panel-footer">-->
        <div class="col-md-12 text-center">
            <button type="button" id="buttons" onclick=<?=$onclick?>
            name="add" value="add" class="btn btn-labeled btn-success" >
                <span class="btn-label"><i class="fa fa-floppy-o"></i></span><?= $action ?>
            </button>
        </div>
   <!-- </div>
</div>-->
<?php echo form_close() ?>
