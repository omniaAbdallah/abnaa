<?php
//echo '<pre>'; print_r($volunteer_detail_field);
if (isset($fields) && $fields != null) {
    foreach ($fields as $field) {
        $checked = '';
        if (isset($volunteer_detail_field) && in_array($field->id, $volunteer_detail_field)) {
            $checked = 'checked';
        }
        ?>
        <div class="col-xs-3 check-style">
            <input class="check_large" type="checkbox" id="gridCheck<?= $field->id; ?>"
                   name="fields[]" value="<?= $field->id ?>"
                   data-validation="validate_checkbox_group"
                   data-validation-qty="1-<?= sizeof($fields) ?>" <?= $checked ?>>
            <label class="form-check-label"
                   for="gridCheck<?= $field->id; ?>"><?= $field->title ?></label>
        </div>
        <?php
    }
}

//echo '<pre>'; print_r($volunteer_detail_reason);
elseif (isset($reasons) && $reasons != null) {
    foreach ($reasons as $reason) {
        $checked = '';
        if (isset($volunteer_detail_reason) && in_array($reason->id, $volunteer_detail_reason)) {
            $checked = 'checked';
        }
        ?>
        <div class="col-xs-3 check-style">
            <input class="check_large" type="checkbox" id="grid<?= $reason->id; ?>"
                   name="reasons[]" value="<?= $reason->id ?>"
                   data-validation="validate_checkbox_group"
                   data-validation-qty="1-<?= sizeof($reasons) ?>" <?= $checked ?>>
            <label class="form-check-label"
                   for="grid<?= $reason->id; ?>"><?= $reason->title ?></label>
        </div>
        <?php
    }
}
?>