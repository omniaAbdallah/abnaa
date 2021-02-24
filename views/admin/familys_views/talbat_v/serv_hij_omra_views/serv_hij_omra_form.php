<?php
$fe2a_talab_title = array(1 => 'حج', 2 => 'عمرة');
$first_hij_omra_title = array(1 => 'نعم', 2 => 'لا');
if (isset($result) && (!empty($result))) {
    $talab_id = $result['id'];
    $talab_date = $result['talab_date_ar'];
    $file_num = $result['file_num'];
    $mokadem_name = $result['mokadem_name'];
    $mother_national_num = $result['mother_national_num'];
    $fe2a_talab = $result['fe2a_talab'];
    $mhrem_name = $result['mhrem_name'];
    $mhrem_national_num = $result['mhrem_national_num'];
    $mhrem_birth_date = $result['mhrem_birth_date'];
    $first_hij_omra = $result['first_hij_omra'];
    $notes = $result['notes'];
} else {
    $talab_id = 0;
    $talab_date = date('Y-m-d');
    $file_num = "";
    $mother_national_num = "";
    $mokadem_name = "";
    $fe2a_talab = 1;
    $mhrem_name = '';
    $mhrem_national_num = '';
    $mhrem_birth_date = date('Y-m-d');
    $first_hij_omra = 1;
    $notes = '';
}
?>
<div class="form-group col-sm-12 col-xs-12 no-padding">
    <input type="hidden" name="talab_id" value="<?= $talab_id; ?>">
    <div class="form-group  col-md-2 padding-4 ">
        <label class="label  ">رقم الملف </label>
        <input type="text" name="file_num" id="file_num" value="<?php echo $file_num; ?>"
               ondblclick="$('#myModal').modal();load_table()" data-validation="required"
               readonly
               style="width: 75%;float: right"
               class="form-control " value="" onblur="GetFamilyNum($(this).val());">
        <button type="button" data-toggle="modal" data-target="#myModal"
                onclick="load_table()"
                class="btn btn-success btn-next" style="width:25%;float: left;">
            <i class="fa fa-plus"></i></button>
        <input type="hidden" name="mother_national_num" id="mother_national_num"
               value="<?php echo $mother_national_num; ?>">
        <input type="hidden" name="father_card" id="father_card" value="">
    </div>
    <div class="form-group  col-md-5 padding-4 ">
        <label class="label  "> مقدم الطلب </label>
        <input type="text" name="mokadem_name" id="mokadem_name" list="cityname" data-validation="required"
               class="form-control " value="<?php echo $mokadem_name; ?>">
    </div>
    <div class="form-group col-md-2 padding-4">
        <label class="label"> فئة الطلب </label>
        <select name="fe2a_talab" id="fe2a_talab" class="form-control" onchange="set_text()"
                data-validation="required">
            <?php foreach ($fe2a_talab_title as $key => $item) { ?>
                <option value="<?= $key ?>>" <?php if ($fe2a_talab == $key) {
                    echo 'selected';
                } ?>> <?= $item ?></option>
                <?php
            } ?>
        </select>
    </div>
    <div class="form-group col-md-3 padding-4">
        <label class="label"> إسم المحرم </label>
        <input type="text" name="mhrem_name" id="mhrem_name" class="form-control"
               value="<?= $mhrem_name ?>" data-validation="required">
    </div>
    <div class="form-group col-md-3 padding-4">
        <label class="label"> صلة المحرم </label>
        <input type="text" name="mhrem_national_num" id="mhrem_national_num" class="form-control"
               value="<?= $mhrem_national_num ?>" data-validation="required">
    </div>
    <div class="form-group col-md-3 padding-4">
        <label class="label"> تاريخ الميلاد </label>
        <input type="date" name="mhrem_birth_date" id="mhrem_birth_date" class="form-control"
               value="<?= $mhrem_birth_date ?>" data-validation="required">
    </div>
    <div class="form-group col-md-2 padding-4">
        <label class="label " id="first_hij_omra_lable"> <?= $fe2a_talab_title[$fe2a_talab] ?> لأول مرة </label>
        <?php foreach ($first_hij_omra_title as $key => $item) { ?>
            <div class="radio-content">
                <input type="radio" name="first_hij_omra" id="choose<?= $key ?>" value="<?= $key ?>"
                    <?php if ($first_hij_omra == $key) {
                        echo 'checked';
                    } ?> class="first_hij_omra">
                <label for="choose<?= $key ?>" class="radio-label"><?= $item ?></label>
            </div>
        <?php } ?>
    </div>
    <div class="form-group col-md-4 padding-4">
        <label class="label"> ملاحظات </label>
        <input type="text" name="notes" id="notes" class="form-control" value="<?= $notes ?>">
    </div>
    <div class="form-group col-md-12 padding-4" id="mem_data">
        <?php if (isset($member_data) && $member_data != null) { ?>
            <table class="  table table-bordered table-striped" style="width:100%">
                <thead>
                <tr>
                    <th>
                        #
                    </th>
                    <th>الإسم</th>
                    <th>رقم الهوية</th>
                    <th>الصلة</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <div class="check-style">
                            <input type="checkbox" name="mother_id" class="checkbox"
                                   id="checkbox_m<?= $family_data->id ?>"
                                   value=" <?= $family_data->id ?>" <?php if (!empty($mother_id) && $mother_id == $family_data->id) {
                                echo 'checked';
                            } ?>>
                            <label for="checkbox_m<?= $family_data->id ?>"> </label>
                        </div>
                    </td>
                    <td><?php echo $family_data->mother_name; ?></td>
                    <td><?php echo $family_data->mother_national_num_fk; ?></td>
                    <td><?php echo "أم"; ?></td>
                </tr>
                <?php
                $x = 2;
                foreach ($member_data as $row) { ?>
                    <tr>
                        <td>
                            <div class="check-style">
                                <input type="checkbox" name="member_id[]" class="checkbox"
                                       id="checkbox<?= $row->id ?>"
                                       value=" <?= $row->id ?>" <?php if (!empty($member_id) && in_array($row->id, $member_id)) {
                                    echo 'checked';
                                } ?>>
                                <label for="checkbox<?= $row->id ?>"> </label>
                            </div>
                        </td>
                        <td><?php echo $row->member_full_name; ?></td>
                        <td><?php echo $row->member_card_num; ?></td>
                        <td><?php echo $row->relation_name; ?></td>
                    </tr>
                    <?php $x++;
                } ?>
                </tbody>
            </table>
        <?php } ?>
    </div>
    <!-- <div class="col-md-12 text-center">
        <button type="button" id="buttons" class="btn btn-labeled btn-success  " onclick="save_hij_omr()"
                name="add" value="حفظ">
            <span class="btn-label"><i class="fa fa-floppy-o"></i></span>حفظ
        </button>
        <span style="font-size: medium;display: none" class=" badge badge-danger" id="span_form">لا يمكن طلب جديد لان هنالك طلب جاري </span>
    </div> -->
    <div class="col-md-12 text-center">
        <button type="submit" class="btn btn-labeled btn-success " name="save" value="save">
            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
        </button>
    </div>
    <!-- </div>
</div> -->
</div>
<script>
    function get_osra_last_date() {
        var file_num = $('#file_num').val();
        if (file_num != 0 && file_num != '') {
            var dataString = 'file_num=' + file_num;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>family_controllers/talbat/Talb_hij_omra/get_osra_last_date',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    console.log(html);
                    //$("#mokadem_name").html(html);
                    $('#get_osra_last_date').html(html);
                }
            });
        }
    }
</script>
<!-- get_member_data -->
<script>
    function get_member_data() {
        var mother_national_num = $('#mother_national_num').val();
        if (mother_national_num != 0 && mother_national_num != '') {
            var dataString = 'mother_national_num=' + mother_national_num;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>family_controllers/talbat/Talb_hij_omra/getDetails',
                data: $('#myform').serialize() + "&" + dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $("#mem_data").html(html);
                }
            });
        }
    }
</script>
