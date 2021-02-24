<?php
if (!empty($result)) {
    $talab_id=$result['id'];
    $talab_date = $result['talab_date_ar'];
    $file_num = $result['file_num'];
    $mokadem_name = $result['mokadem_name'];
    $mother_national_num = $result['mother_national_num'];
    $type_device_id_fk = $result['type_device_id_fk'];
    $brand = $result['brand'];
    $model = $result['model'];
    $mosfat = $result['mosfat'];
    $num_year = $result['num_year'];
    $device_status_id_fk = $result['device_status_id_fk'];
    $wasf = $result['wasf'];
    $mobrerat_id_fk = $result['mobrerat_id_fk'];
    $mada_syana_device = $result['mada_syana_device'];
    $m3rfat_mokhtas = $result['m3rfat_mokhtas'];
    $taklfa = $result['taklfa'];
    $last_date_talb = $result['last_date_talb'];
    $last_date_sarf = $result['last_date_sarf'];
} else {
    $talab_id=0;
    $talab_date = date('Y-m-d');
    $file_num = "";
    $mother_national_num = "";
    $mokadem_name = "";
    $type_device_id_fk = "";
    $brand = "";
    $model = "";
    $mosfat = "";
    $num_year = "";
    $device_status_id_fk = "";
    $wasf = "";
    $mobrerat_id_fk = "";
    $mada_syana_device = "";
    $m3rfat_mokhtas = "";
    $taklfa = "";
    $last_date_talb = "";
    $last_date_sarf = "";
}
?>
<div class="col-sm-12 form-group padding-4">
    <input type="hidden" name="talab_id" value="<?=$talab_id; ?>">
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
        <!-- <input type="text" name="mokadem_name" id="mokadem_name" value="<?php echo $mokadem_name; ?>"
                           class="form-control "> -->
        <input type="text" name="mokadem_name" id="mokadem_name" list="cityname" data-validation="required"
               class="form-control " value="<?php echo $mokadem_name; ?>">
    </div>
    <div class="form-group col-sm-2 col-md-3 padding-4">
        <label class="label  "> النوع </label>
        <select type="text" class="form-control " name="type_device_id_fk"
                data-validation="required">
            <option value=""> إختر</option>
            <?php foreach ($type_device as $cat) { ?>
                <option value="<?= $cat->id ?>"
                    <?php if ($type_device_id_fk == $cat->id) echo 'selected' ?>
                ><?= $cat->title ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group  col-md-2 padding-4 ">
        <label class="label  "> الماركة </label>
        <input type="text" name="brand" id="brand" data-validation="required"
               class="form-control " value="<?php echo $brand; ?>">
    </div>
    <div class="form-group  col-md-3 padding-4 ">
        <label class="label  "> الموديل </label>
        <input type="text" name="model" id="model" data-validation="required"
               class="form-control " value="<?php echo $model; ?>">
    </div>
    <div class="form-group  col-md-7 padding-4 ">
        <label class="label  "> المواصفات </label>
        <input type="text" name="mosfat" id="mosfat" data-validation="required"
               class="form-control " value="<?php echo $mosfat; ?>">
    </div>
    <div class="form-group  col-md-2 padding-4 ">
        <label class="label  "> مدة استخدام الجهاز  <small style="color: red"> سنه </small></label>
        <input type="num" name="num_year" id="num_year" data-validation="required" class="form-control " value="<?php echo $num_year; ?>">
    </div>
    <div class="form-group col-sm-2  padding-4">
        <label class="label  "> حالة الجهاز </label>
        <select type="text" class="form-control " name="device_status_id_fk"
                data-validation="required">
            <option value=""> إختر</option>
            <?php foreach ($device_status as $cat) { ?>
                <option value="<?= $cat->id ?>"
                    <?php if ($device_status_id_fk == $cat->id) echo 'selected' ?>
                ><?= $cat->title ?></option>
            <?php } ?>
        </select>
    </div>
    <!-- date -->
    <div class="form-group  col-md-8 padding-4 ">
        <label class="label  "> وصف العطل </label>
        <input type="text" name="wasf" id="wasf" data-validation="required"
               class="form-control " value="<?php echo $wasf; ?>">
    </div>
    <div class="form-group  col-md-2 padding-4">
        <label class="label  "> مدى حدوث العطل </label>
        <select type="text" class="form-control " name="mada_syana_device"
                data-validation="required">
            <option value=""> إختر</option>
            <?php
            $mada_syana = array(1 => 'أول مره ',
                2 => 'أكثر من مرة',
                3 => 'غير محدد');
            foreach ($mada_syana as $key => $value) { ?>
                <option value="<?= $key ?>"
                    <?php if ($mada_syana_device == $key) echo 'selected' ?>
                ><?= $value ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group  col-md-2 padding-4">
        <label class="label  "> هل تم بمعرفة مختص</label>
        <select type="text" class="form-control " name="m3rfat_mokhtas"
                data-validation="required">
            <option value=""> إختر</option>
            <?php
            $m3rfat = array(1 => 'نعم',
                2 => 'لا');
            foreach ($m3rfat as $key => $value) { ?>
                <option value="<?= $key ?>"
                    <?php if ($m3rfat_mokhtas == $key) echo 'selected' ?>
                ><?= $value ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group  col-md-4 padding-4">
        <label class="label  "> مبررات الطلب </label>
        <select type="text" class="form-control " name="mobrerat_id_fk"
                data-validation="required">
            <option value=""> إختر</option>
            <?php foreach ($mobrerat as $cat) { ?>
                <option value="<?= $cat->id ?>"
                    <?php if ($mobrerat_id_fk == $cat->id) echo 'selected' ?>
                ><?= $cat->title ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group col-md-3 padding-4 ">
        <label class="label  ">التكلفة التقديرية</label>
        <input type="num" name="taklfa" id="taklfa" data-validation="required"
               class="form-control " value="<?php echo $taklfa; ?>">
    </div>
    <!-- date -->
    <div id="get_osra_last_date">
        <?php if (isset($last_date_talb) && !empty($last_date_talb)) { ?>
            <div class="form-group col-md-3 padding-4 ">
                <label class="label  "> تاريخ أخر طلب </label>
                <input type="date" name="last_date_talb" id="last_date_talb" data-validation="required"
                       class="form-control " value="<?php echo $last_date_talb; ?>">
            </div>
        <?php } ?>
        <?php if (isset($last_date_sarf) && !empty($last_date_sarf)) { ?>
            <div class="form-group col-md-3 padding-4 " style="
">
                <label class="label  "> تاريخ أخر صرف </label>
                <input type="date" name="last_date_sarf" id="last_date_sarf"
                       class="form-control " value="<?php echo $last_date_sarf; ?>">
            </div>
        <?php } ?>
    </div>
</div>
<div class=" form-group col-md-12 col-sm-12 padding-4">
    <label class="label"> المرفقات</label>
    <input type="file" name="file[]" id="file" multiple="" class="form-control">
    <span class="label label-danger">يمكنك رفع هنا أكثر من مرفق </span>
</div>
<div class="clearfix"></div>
<div class="col-md-12 form-group 4 text-center">

    <button type="submit" class="btn btn-labeled btn-success " name="save" value="save">
        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
    </button>
</div>

<!-- get_osra_last_date -->
<script>
    function get_osra_last_date() {
        var file_num = $('#file_num').val();
        if (file_num != 0 && file_num != '') {
            var dataString = 'file_num=' + file_num;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>family_controllers/talbat/Talb_syana_electric_device/get_osra_last_date',
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



