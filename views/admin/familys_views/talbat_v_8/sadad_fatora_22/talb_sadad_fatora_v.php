<?php
if (!empty($result)) {
    $talab_date = $result['talab_date_ar'];
    $file_num = $result['file_num'];
    $mokadem_name = $result['mokadem_name'];
    $mother_national_num = $result['mother_national_num'];
    $type_id_fk = $result['type_id_fk'];
    $moshtrk_name = $result['moshtrk_name'];
    $rkm_hesab = $result['rkm_hesab'];
    $rkm_3dad = $result['rkm_3dad'];
    $status_3dad = $result['status_3dad'];
    $address = $result['address'];
    $rkm_fatora = $result['rkm_fatora'];
    $fatora_date = $result['fatora_date'];
    $from_fatra = $result['from_fatra'];
    $mobrerat_id_fk = $result['mobrerat_id_fk'];
    $to_fatra = $result['to_fatra'];
    $money_sadad = $result['money_sadad'];
    $last_sadad_date = $result['last_sadad_date'];
    $last_date_talb = $result['last_date_talb'];
    $last_date_sadad = $result['last_date_sadad'];
} else {
    $talab_date = date('Y-m-d');
    $file_num = "";
    $mother_national_num = "";
    $mokadem_name = "";
    $type_id_fk = "";
    $moshtrk_name = "";
    $rkm_hesab = "";
    $rkm_3dad = "";
    $status_3dad = "";
    $address = "";
    $rkm_fatora = "";
    $fatora_date = date('Y-m-d');
    $from_fatra = date('Y-m-d');
    $mobrerat_id_fk = "";
    $to_fatra = date('Y-m-d');
    $money_sadad = "";
    $last_sadad_date = date('Y-m-d');
    $last_date_talb = "";
    $last_date_sadad = "";
}
?>
<div class="col-md-12 col-sm-12 padding-4">
    <div class="form-group col-md-2 padding-4 ">
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
    <div class="form-group  col-md-4 padding-4 ">
        <label class="label  "> مقدم الطلب </label>
        <input type="text" name="mokadem_name" id="mokadem_name" list="cityname" data-validation="required"
               class="form-control " value="<?php echo $mokadem_name; ?>">
    </div>
    <div class="form-group  col-md-2 padding-4">
        <label class="label  "> النوع </label>
        <select type="text" class="form-control " name="type_id_fk"
                data-validation="required">
            <option value=""> إختر</option>
            <?php foreach ($type_fatora as $cat) { ?>
                <option value="<?= $cat->id ?>"
                    <?php if ($type_id_fk == $cat->id) echo 'selected' ?>
                ><?= $cat->title ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group  col-md-4 padding-4 ">
        <label class="label  "> اسم المشترك </label>
        <input type="text" name="moshtrk_name" id="moshtrk_name" data-validation="required"
               class="form-control " value="<?php echo $moshtrk_name; ?>">
    </div>
    <div class="form-group  col-md-3 padding-4 ">
        <label class="label  "> رقم الحساب </label>
        <input type="number" name="rkm_hesab" id="rkm_hesab" data-validation="required"
               class="form-control " value="<?php echo $rkm_hesab; ?>">
    </div>
    <div class="form-group col-md-2 padding-4 ">
        <label class="label  "> رقم العداد </label>
        <input type="number" name="rkm_3dad" id="rkm_3dad" data-validation="required"
               class="form-control " value="<?php echo $rkm_3dad; ?>">
    </div>
    <div class="form-group col-md-2  padding-4">
        <label class="label  "> حالة العداد </label>
        <select type="text" class="form-control " name="status_3dad"
                data-validation="required">
            <option value=""> إختر</option>
            <?php
            $status = array(1 => 'حاليا يعمل  ',
                2 => 'لا يعمل');
            foreach ($status as $key => $value) { ?>
                <option value="<?= $key ?>"
                    <?php if ($status_3dad == $key) echo 'selected' ?>
                ><?= $value ?></option>
            <?php } ?>
        </select>
    </div>
    <!-- العنوان? -->
    <div class="form-group col-md-5 padding-4 ">
        <label class="label  "> العنوان </label>
        <input type="text" name="address" id="address" data-validation="required"
               class="form-control " value="<?php echo $address; ?>">
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
    <div class="form-group col-md-2 padding-4 ">
        <label class="label  "> رقم الفاتورة </label>
        <input type="text" name=" rkm_fatora" id=" rkm_fatora" data-validation="required"
               class="form-control " value="<?php echo $rkm_fatora; ?>">
    </div>
    <div class="form-group col-md-3 padding-4 ">
        <label class="label  "> تاريخ الفاتورة </label>
        <input type="date" name=" fatora_date" id=" fatora_date" data-validation="required"
               class="form-control " value="<?php echo $fatora_date; ?>">
    </div>
    <div class="form-group  col-md-3 padding-4 ">
        <label class="label  "> بداية الفترة </label>
        <input type="date" name="from_fatra" id="from_fatra" data-validation="required"
               class="form-control " value="<?php echo $from_fatra; ?>">
    </div>
    <div class="form-group col-md-3 padding-4 ">
        <label class="label  "> نهاية الفترة </label>
        <input type="date" name="to_fatra" id="to_fatra" data-validation="required"
               class="form-control " value="<?php echo $to_fatra; ?>">
    </div>
    <div class="form-group  col-md-2 padding-4 ">
        <label class="label  ">المبلغ المطلوب سداده</label>
        <input type="num" name="money_sadad" id="money_sadad" data-validation="required"
               class="form-control " value="<?php echo $money_sadad; ?>">
    </div>
    <div class="form-group  col-md-3 padding-4 ">
        <label class="label  "> أخر موعد للسداد </label>
        <input type="date" name="last_sadad_date" id="last_sadad_date" data-validation="required"
               class="form-control " value="<?php echo $last_sadad_date; ?>">
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
        <?php if (isset($last_date_sadad) && !empty($last_date_sadad)) { ?>
            <div class="form-group col-md-3 padding-4 " style="">
                <label class="label  "> تاريخ أخر سداد </label>
                <input type="date" name="last_date_sadad" id="last_date_sadad"
                       class="form-control " value="<?php echo $last_date_sadad; ?>">
            </div>
        <?php } ?>
    </div>
</div>
<div class="col-md-12 col-sm-12 padding-4">
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
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">ملفات الأسر </h4>
            </div>
            <div class="modal-body" id="json_table">
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<!-- get_osra_last_date -->
<script>
    function get_osra_last_date() {
        var file_num = $('#file_num').val();
        if (file_num != 0 && file_num != '') {
            var dataString = 'file_num=' + file_num;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>family_controllers/talbat/Talb_sadad_fatora/get_osra_last_date',
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
