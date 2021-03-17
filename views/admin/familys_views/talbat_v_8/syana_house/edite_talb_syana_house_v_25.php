<div class="col-md-12 col-sm-12 padding-4">
    <div class="form-group col-md-2 padding-4 ">
        <label class="label  ">رقم الملف </label>
        <input type="text" name="file_num" id="file_num" value=""
               ondblclick="$('#myModal').modal();load_table()" data-validation="required"
               readonly
               style="width: 75%;float: right"
               class="form-control " value="" onblur="GetFamilyNum($(this).val());">
        <button type="button" data-toggle="modal" data-target="#myModal"
                onclick="load_table()"
                class="btn btn-success btn-next" style="width:25%;float: left;">
            <i class="fa fa-plus"></i></button>
        <input type="hidden" name="mother_national_num" id="mother_national_num"
               value="">
        <input type="hidden" name="father_card" id="father_card" value="">
    </div>
    <div class="form-group  col-md-4 padding-4 ">
        <label class="label"> مقدم الطلب </label>
        <input type="text" name="mokadem_name" id="mokadem_name" list="cityname" data-validation="required"
               class="form-control " value="">
    </div>
    <div class="form-group  col-md-2 padding-4">
        <label class="label  "> النوع </label>
        <select type="text" class="form-control " name="type_id_fk"
                data-validation="required">
            <option value=""> إختر</option>
            <?php foreach ($type_syana as $type) { ?>
                <option value="<?= $type->id ?>"><?= $type->title ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group  col-md-2 padding-4">
        <label class="label  "> ملكية السكن </label>
        <select type="text" class="form-control " name="house_owner_id_fk"
                onchange="getRent()" data-validation="required">
            <option value=""> إختر</option>
            <?php foreach ($house_own as $row) { ?>
                <option value="<?php echo $row->id_setting; ?>"><?php echo $row->title_setting; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group col-md-2 padding-4 col-sm-4 col-xs-12">
        <label class="label ">تاريخ نهاية العقد</label>
        <input type="text" name="contract_end_date" id="contract_end_date" readonly
               class="form-control " data-validation-depends-on="house_owner_id_fk"
               data-validation-depends-on-value="104"/>
    </div>
    
    
    
    <div class="form-group  col-md-3 padding-4">
        <label class="label  "> نوع السكن </label>
        <select type="text" class="form-control " name="type_house_id_fk"
                data-validation="required">
            <option value=""> إختر</option>
            <?php
            foreach ($arr_type_house as $row) {
                ?>
                <option value="<?php echo $row->id_setting; ?>"><?php echo $row->title_setting; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group  col-md-2 padding-4">
        <label class="label  "> حالة السكن </label>
        <select type="text" class="form-control " name="house_status_id_fk"
                data-validation="required">
            <option value=""> إختر</option>
            <?php
            foreach ($house_state as $row) {
                ?>
                <option value="<?php echo $row->id_setting; ?>"><?php echo $row->title_setting; ?></option>
            <?php } ?>
        </select>
    </div>


    <div class="form-group  col-md-2 padding-4 ">
        <label class="label  "> عدد الغرف </label>
        <input type="number" name="room_num" id="room_num" data-validation="number"
               class="form-control " value="">
    </div>
    <div class="form-group col-md-2 padding-4 ">
        <label class="label  ">مساحة البناء </label>
        <input type="number" name="house_size" id="house_size" data-validation="number"
               class="form-control " value="">
    </div>
    <div class="form-group col-md-3  padding-4">
        <label class="label  "> أماكن العمل </label>
        <select type="text" class="form-control " name="pleac_work"
                data-validation="required">
            <option value=""> إختر</option>
            <?php foreach ($syana_place as $place) { ?>
                <option value="<?= $place->id ?>"><?= $place->title ?></option>
            <?php } ?>
        </select>
    </div>
    <!-- العنوان? -->

    <div class="form-group  col-md-5 padding-4">
        <label class="label  "> مبررات الطلب </label>
        <select type="text" class="form-control " name="mobrerat_id_fk"
                data-validation="required">
            <option value=""> إختر</option>
            <?php foreach ($mobrerat as $cat) { ?>
                <option value="<?= $cat->id ?>"><?= $cat->title ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group col-md-7 padding-4 ">
        <label class="label  "> تفاصيل العمل المطلوب </label>
        <input type="text" name="pleac_work_detils" id="pleac_work_detils" data-validation="required"
               class="form-control " value="">
    </div>
    <div class="form-group  col-md-2 padding-4">
        <label class="label  "> هل تم بمعرفة مختص</label>
        <select type="text" class="form-control " name="m3rfat_mokhtas"
                data-validation="required">
            <option value=""> إختر</option>
            <?php
            $m3rfat = array(1 => 'نعم', 2 => 'لا');
            foreach ($m3rfat as $key => $value) { ?>
                <option value="<?= $key ?>"><?= $value ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group col-md-3 padding-4 ">
        <label class="label  ">التكلفة التقديرية</label>
        <input type="number" name="taklfa" id="taklfa" data-validation="number"
               data-validation-depends-on="m3rfat_mokhtas"
               data-validation-depends-on-value="1"
               class="form-control " value="">
    </div>

    <!-- date -->
    <div id="get_osra_last_date">
        <?php if (isset($last_date_talb) && !empty($last_date_talb)) { ?>
            <div class="form-group col-md-3 padding-4 ">
                <label class="label  "> تاريخ أخر طلب </label>
                <input type="date" name="last_date_talb" id="last_date_talb" data-validation="required"
                       class="form-control " value="">
            </div>
        <?php } ?>
        <?php if (isset($last_date_sadad) && !empty($last_date_sadad)) { ?>
            <div class="form-group col-md-3 padding-4 " style="">
                <label class="label  "> تاريخ أخر سداد </label>
                <input type="date" name="last_date_sadad" id="last_date_sadad"
                       class="form-control " value="">
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
<script>
    <?php if (isset($result) && (!empty($result))){ ?>
    document.addEventListener('DOMContentLoaded', function () {

        $('input[name=file_num]').val('<?=$result['file_num']?>');
        $('input[name=mokadem_name]').val('<?=$result['mokadem_name']?>');
        $('input[name=mother_national_num]').val('<?=$result['mother_national_num']?>');
        $('select[name=house_status_id_fk]').val('<?=$result['house_status_id_fk']?>');
        $('select[name=type_house_id_fk]').val('<?=$result['type_house_id_fk']?>');
        $('select[name=type_id_fk]').val('<?=$result['type_id_fk']?>');
        $('input[name=room_num]').val('<?=$result['room_num']?>');
        $('input[name=house_size]').val('<?=$result['house_size']?>');
        $('select[name=pleac_work]').val('<?=$result['pleac_work']?>');
        $('input[name=pleac_work_detils]').val('<?=$result['pleac_work_detils']?>');
        $('select[name=mobrerat_id_fk]').val('<?=$result['mobrerat_id_fk']?>');
        $('select[name=m3rfat_mokhtas]').val('<?=$result['m3rfat_mokhtas']?>');
        $('input[name=taklfa]').val('<?=$result['taklfa']?>');
        $('input[name=last_date_talb]').val('<?=$result['last_date_talb']?>');
        $('input[name=last_date_sarf]').val('<?=$result['last_date_sarf']?>');
        $('input[name=sarf_date]').val('<?=$result['sarf_date']?>');
    });
    <?php } ?>
</script>
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


    function getRent() {
        $('#contract_end_date').val('');

        var house_owner_id_fk = $('select[name=house_owner_id_fk]').val();
        var mother_national_num = $('#mother_national_num').val();
        if (house_owner_id_fk == 104) {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>family_controllers/talbat/Talb_syana_house/getRent',
                data: {house_owner_id_fk: house_owner_id_fk, mother_national_num: mother_national_num},
                dataType: 'html',
                cache: false,
                success: function (resp) {
                    $('#contract_end_date').val(resp);
                }
            });
        }
    }

    function get_house_data() {
        var file_num = $('#file_num').val();
        var mother_national_num = $('#mother_national_num').val();
        if (file_num != 0 && file_num != '') {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>family_controllers/talbat/Talb_syana_house/get_house_data',
                data: {file_num: file_num, mother_national_num: mother_national_num},
                dataType: 'html',
                cache: false,
                success: function (resp) {
                    var house_data = JSON.parse(resp);
                    if (house_data.h_house_owner_id_fk === 'rent') {
                        $('select[name=house_owner_id_fk]').val(104);
                    } else {
                        $('select[name=house_owner_id_fk]').val(house_data.h_house_owner_id_fk);
                    }
                    $('select[name=house_status_id_fk]').val(house_data.h_house_status_id_fk);
                    $('select[name=type_house_id_fk]').val(house_data.h_house_type_id_fk);
                    $('input[name=room_num]').val(house_data.h_rooms_account);
                    $('input[name=house_size]').val(house_data.h_house_size);
                    $('#contract_end_date').val(house_data.contract_end_date);

                    // $('select[name=house_owner_id_fk]').trigger('change');
                }
            });
        }
    }
 /*   function getRent() {
        var house_owner_id_fk = $('select[name=house_owner_id_fk]').val();
        var mother_national_num = $('#mother_national_num').val();
        if (house_owner_id_fk == 104) {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>family_controllers/talbat/Talb_syana_house/getRent',
                data: {house_owner_id_fk: house_owner_id_fk, mother_national_num: mother_national_num},
                dataType: 'html',
                cache: false,
                success: function (resp) {
                    $('#contract_end_date').val(resp);
                }
            });
        }
    }
*/
   /* function get_house_data() {
        var file_num = $('#file_num').val();

        var mother_national_num = $('#mother_national_num').val();
        if (file_num != 0 && file_num != '') {

            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>family_controllers/talbat/Talb_syana_house/get_house_data',
                data: {file_num: file_num, mother_national_num: mother_national_num},
                dataType: 'html',
                cache: false,
                success: function (resp) {
                    var house_data = JSON.parse(resp);
                    if (house_data.h_house_owner_id_fk === 'rent') {
                        $('select[name=house_owner_id_fk]').val(104);
                    } else {
                        $('select[name=house_owner_id_fk]').val(house_data.h_house_owner_id_fk);

                    }
                    $('select[name=house_status_id_fk]').val(house_data.h_house_status_id_fk);
                    $('select[name=type_house_id_fk]').val(house_data.h_house_type_id_fk);
                    $('input[name=room_num]').val(house_data.h_rooms_account);
                    $('input[name=house_size]').val(house_data.h_house_size);
                    $('select').trigger('click');
                }
            });
        }
    }*/

</script>
