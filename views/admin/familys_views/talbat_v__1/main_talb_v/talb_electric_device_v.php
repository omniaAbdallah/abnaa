<?php
if (!empty($result)) {
    $talab_id=$result['id'];

    $talab_date = $result['talab_date_ar'];
    $file_num = $result['file_num'];
    $mokadem_name = $result['mokadem_name'];
    $type_device_id_fk = $result['type_device_id_fk'];
    $mobrerat_id_fk = $result['mobrerat_id_fk'];
    $num = $result['num'];
    $wasf = $result['wasf'];
} else {
    $talab_id=0;

    $talab_date = date('Y-m-d');
    $file_num = "";
    $mokadem_name = "";
    $type_device_id_fk = "";
    $mobrerat_id_fk = "";
    $num = "";
    $wasf = "";
}
?>
<div class="col-sm-12 padding-4">
    <input type="hidden" name="talab_id" value="<?=$talab_id; ?>">
    <div class="col-sm-3  col-md-2 padding-4 ">
        <label class="label  ">رقم الملف </label>
        <input type="text" name="file_num" id="file_num" value="<?php echo $file_num; ?>"
               ondblclick="$('#myModal').modal();load_table()" data-validation="required"
               readonly style="width: 75%;float: right"
               class="form-control " value="" onblur="GetFamilyNum($(this).val());">
        <button type="button" data-toggle="modal" data-target="#myModal"
                onclick="load_table()"
                class="btn btn-success btn-next" style="width: 25%;float: left;">
            <i class="fa fa-plus"></i></button>
        <input type="hidden" name="mother_national_num" id="mother_national_num" value="">
        <input type="hidden" name="father_card" id="father_card" value="">
    </div>
    <div class="col-sm-3  col-md-5 padding-4 ">
        <label class="label  "> مقدم الطلب </label>
        <!-- <input type="text" name="mokadem_name" id="mokadem_name" value="<?php echo $mokadem_name; ?>"
                           class="form-control "> -->
        <input type="text" name="mokadem_name" id="mokadem_name" list="cityname"
               data-validation="required"
               class="form-control " value="<?php echo $mokadem_name; ?>">
    </div>
    <div class="col-sm-2 col-md-3 padding-4">
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
    <div class="col-sm-3  col-md-2 padding-4 ">
        <label class="label  "> العدد </label>
        <input type="number" name="num" id="num" data-validation="required"
               class="form-control " value="<?php echo $num; ?>">
    </div>
    <div class="col-sm-3  col-md-8 padding-4 ">
        <label class="label  "> الوصف </label>
        <input type="text" name="wasf" id="wasf" data-validation="required"
               class="form-control " value="<?php echo $wasf; ?>">
    </div>
    <div class=" col-sm-4 col-md-4 padding-4">
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
    <!-- date -->
    <div id="get_osra_last_date">
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





<!-- get_osra_last_date -->
<script>
    function get_osra_last_date() {
        var file_num = $('#file_num').val();
        if (file_num != 0 && file_num != '') {
            var dataString = 'file_num=' + file_num;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>family_controllers/talbat/Talb_electric_device/get_osra_last_date',
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


<script>
    function GetFamilyNum(code) {
        var dataString = 'file_num=' + code;
        if (code != '') {
            $.ajax({
                type: 'post',
                url: '<?=base_url()?>family_controllers/namazegs/Namazeg/getFamilyNum',
                data: dataString,
                cache: false,
                success: function (json_data) {
                    var JSONObject = JSON.parse(json_data);
                    console.log(JSONObject['final_suspend']);
                    /* if( parseInt(JSONObject['final_suspend'])!== 4  &&
                         parseInt(JSONObject['file_status'])!== 1&&
                         parseInt(JSONObject['final_suspend']) !==' '){*/
                    //  setTimeout(function(){
                    if (
                        code != ' ' &&
                        parseInt(JSONObject['file_status']) == 4
                    ) {
                        Swal.fire({
                            type: 'error',
                            title: 'عفواً',
                            text: 'هذا الملف غير نشط !!',
                            footer: ''
                        }).then((result) => {
                            if (result.value) {
                                $('#father_name').val("");
                                $('#file_num').val("");
                                $('#mother_national_num').val("");
                                $('#father_card').val("");
                            }
                        });
                    } else {
                        $('#father_name').val(JSONObject['father_full_name']);
                        $('#mother_national_num').val(JSONObject['mother_national_num']);
                        $('#father_card').val(JSONObject['father_national_num']);
                    }
                    // }, 100);
                }
            });
        }
    }
</script>
