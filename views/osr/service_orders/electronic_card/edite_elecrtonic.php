<!-- <?php
if (isset($record)) {
    echo form_open_multipart('osr/service_orders/Electronic_card/editElectronic_cardOrders/' . $record['id']);
} else {
    echo form_open_multipart('osr/service_orders/Electronic_card');
} ?> -->
<?php

$type = array(1 => 'تالف', 2 => 'مفقود', 3 => 'تجديد', 4 => 'تغيير رقم سري', 5 => 'إصدار');

if (isset($record) && !empty($record)) {
    echo form_open_multipart('osr/service_orders/Electronic_card/editElectronic_cardOrders/' . $record['id'] . '/tab1', array('class' => 'Electronic_form'));
    $action = " تعديل    ";
    echo '<input type="hidden"  name="update"  id="update" value="update">';
    echo '<input type="hidden"  name="id"  id="id" value="' . $record['id'] . '">';
} else {
    $action = "حفظ";

    echo form_open_multipart('osr/service_orders/Electronic_card', array('class' => 'Electronic_form'));
    echo '<input type="hidden"  name="add"  id="add" value="add">';
}
?>
<div class="form-group col-sm-12 col-xs-12 no-padding no-margin">
    <div class="form-group col-sm-1 col-xs-12 ">
        <label class="label "> رقم الطلب</label>
        <input type="text" id="talab_rkm" name="talab_rkm" class="form-control  " value="<?php if (isset($record)) {
            echo $record['talab_rkm'];
        } else {
            echo $last_rkm;
        } ?>" readonly data-validation="required">
    </div>
    <div class="form-group col-sm-4 col-xs-12 padd">
        <label class="label "> الاسم</label>
        <select name="child_id_fk" id="child_id_fk" onchange="get_national_id();" class="form-control "
                data-validation="required">
            <option value="">إختر</option>
            <?php
            if (isset($children) && $children != null) {
                foreach ($children as $value) {
                    $select = '';
                    if (isset($record) && $record['person_id_fk'] == $value->id) {
                        $select = 'selected';
                    }
                    ?>
                    <option value="<?= $value->id ?>" <?= $select ?>><?= $value->member_full_name ?></option>
                    <?
                }
            }
            ?>
        </select>
    </div>

    <div class="form-group col-sm-3 col-xs-12 padd">
        <label class="label "> رقم الهوية</label>
        <input type="text" id="national_id" name="national_id" readonly placeholder="رقم الهوية" class="form-control  "
               value="<?php if (isset($record)) echo $record['national_id'] ?>" onkeypress="return isNumberKey(event)"
               data-validation="required">
    </div>

    <div class="form-group col-sm-4 col-xs-12 padd">
        <label class="label "> نوع خدمة البطاقة</label>
        <select name="card_service_type" id="card_service_type" class="form-control " data-validation="required">
            <option value="">إختر</option>
            <?php
            foreach ($type as $key => $value) {
                $select = '';
                if (isset($record) && $record['card_service_type'] == $key) {
                    $select = 'selected';
                }
                ?>
                <option value="<?= $key ?>" <?= $select ?>><?= $value ?></option>
                <?
            }
            ?>
        </select>
    </div>
    <div class="form-group col-sm-4 col-xs-12 padd">
        <label class="label "> ملاحظات</label>
        <textarea id="notes" name="notes" class="form-control  " data-validation="required">
		<?php if (isset($record)) echo $record['notes'] ?>
		</textarea>
    </div>
</div>
<?php
if (isset($record)) {
    $action = "تعديل";
    $button = 'update';
    $onclick = "update_Electronic(" . $record['id'] . ");";
} else {
    $action = "حفظ";
    $button = 'add';
    $onclick = "save_Electronic();";
} ?>
<!-- <div class="form-group col-sm-12 col-xs-12 padd">
<?php
echo $last_record;
if (isset($last_record) && $last_record != 4) {
    $disabled = "disabled";
    $span="                <span style=\"font-size: medium;display: none\" class=\" badge badge-danger\" id=\"span_form\">لا يمكن طلب جديد لان هنالك طلب جاري </span>";
  
} else {

    $disabled = "";
    $span = "";

} ?>
    <button type="submit" name="add_electronic_card" value="حفظ" class="btn btn-purple w-md m-b-5"><span><i class="fa fa-floppy-o" aria-hidden="true"></i></span>  <?= $action ?>  </button>
</div> -->


<div class="col-xs-12 no-padding" style="padding: 10px;">
    <div class="">
        <div class="text-center">
            <input type="hidden" name="max" id="max"/>
            <button type="button" id="buttons"
                    class="btn btn-labeled btn-success
                                            "
                    onclick="<?= $onclick ?>" <?= $disabled ?>
                    name="<?php echo $button; ?>"
                    value="<?php echo $button; ?>">
                                            <span class="btn-label"><i
                                                        class="fa fa-floppy-o"></i></span><?= $action ?>
            </button>
            <?= $span ?>
        </div>
    </div>
</div>
<?php echo form_close(); ?>