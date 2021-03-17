<?php
// $dayes = array('السبت','الأحد','الإثنين','الثلاثاء','الأربعاء','الخميس','الجمعة');
// $period = array('الصباح','المساء');
// $answer = array(1=>'نعم',2=>'لا');
$required1 = '';
$readonly1 = 'readonly';
$required2 = '';
$readonly2 = 'readonly';
$disabled = 'disabled';
if ($this->uri->segment(5) == "") {
    //echo form_open_multipart('Volunteers/Volunteers/new_volunteer'); 
} else {
//	echo form_open_multipart('Volunteers/Volunteers/edit_volunteer/'.$this->uri->segment(5)); 
    $disabled = '';
    if ($volunteer['another_charity'] == 1) {
        $required1 = 'required';
        $readonly1 = '';
    }
    if ($volunteer['having_disability'] == 1) {
        $required2 = 'required';
        $readonly2 = '';
    }
}
?>

            <div class="form-group col-sm-12 col-xs-12">
                <div class="form-group col-sm-2 col-xs-12 padding-4">
                    <label class="label">رقم الطلب</label>
                    <input type="number" name="talb_num" readonly
                           value="<?php if (isset($volunteer) && !empty($volunteer['talb_num'])) {
                               echo $volunteer['talb_num'];
                           } else {
                               echo $talb_num;
                           } ?>" placeholder="رقم الطلب" class="form-control " data-validation="required">
                    <input type="hidden" name="talb_f2a" value="1">
                    <input type="hidden" id="title_id">
                    <input type="hidden" id="title_text">
                </div>
                <div class="form-group col-sm-2 col-xs-12 padding-4">
                    <label class="label">تاريخ الطلب</label>
                    <input type="date" name="talb_date" value="<?= date('Y-m-d'); ?>" class="form-control "
                           data-validation="required">
                </div>
                <div class="form-group col-sm-2 col-xs-12 padding-4">
                    <label class="label "> نوع التطوع</label>
                    <select name="tato3_no3" class="form-control " id="tato3_no3" data-validation="required"
                    >
                        <option value="">اختر</option>
                        <?php
                        $tato3_no3 = array(1 => 'بدون أجر', 2 => 'بأجر');
                        foreach ($tato3_no3 as $key => $value) {
                            ?>
                            <option value="<?php echo $key; ?>" <?php if (isset($volunteer) && !empty($volunteer['tato3_no3'])) {
                                if ($key == $volunteer['tato3_no3']) {
                                    echo 'selected';
                                }
                            } ?>> <?php echo $value; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-sm-4 col-xs-12 padding-4">
                    <label class="label "> الإسم</label>
                    <input type="text" name="name" value="<?php if (isset($volunteer)) echo $volunteer['name'] ?>"
                           placeholder="الإسم" class="form-control " data-validation="required">
                </div>
                <div class="form-group col-sm-2 col-xs-12 padding-4">
                    <label class="label "> السجل المدني</label>
                    <input type="text" maxlength="10" name="id_card"
                           value="<?php if (isset($volunteer)) echo $volunteer['id_card'] ?>"
                           placeholder=" السجل المدني" class="form-control " data-validation="required"
                           onkeyup="return checkUnique($(this).val())" onkeypress="validate_number(event)">
                    <span id="checkUnique" style="color: #a94442"></span>
                </div>

                <div class="form-group col-md-2 col-sm-6 padding-4">
                    <label class="label"> المدينه</label>
                    <input type="text" name="city_name" id="city_name" data-validation="required"
                           value="<?php if (isset($volunteer)) echo $volunteer['city_name']; ?>"
                           class="form-control " data-validation-has-keyup-event="true" style="width: 77%;float: right;"
                           readonly>
                    <input type="hidden" name="city_id_fk" id="city_id_fk" data-validation="required"
                           value="<?php if (isset($volunteer)) echo $volunteer['city_id_fk']; ?>" class="form-control "
                           data-validation-has-keyup-event="true" readonly>
                    <button type="button" data-toggle="modal" data-target="#myModalInfo"
                            class="btn btn-success btn-next" onclick="GetDiv('myDiv')">
                        <i class="fa fa-plus"></i></button>
                </div>
                <div class="form-group col-md-2 col-sm-6 padding-4">
                    <label class="label"> الحي</label>
                    <input type="text" name="hai_name" id="hai_name" data-validation="required"
                           value="<?php if (isset($volunteer)) echo $volunteer['hai_name']; ?>"
                           class="form-control " data-validation-has-keyup-event="true" readonly>
                    <input type="hidden" name="hai_id_fk" id="hai_id_fk" data-validation="required"
                           value="<?php if (isset($volunteer)) echo $volunteer['hai_id_fk']; ?>" class="form-control "
                           data-validation-has-keyup-event="true"
                           readonly>
                </div>
                <div class="form-group col-sm-2 col-xs-12 padding-4">
                    <label class="label "> الهاتف أو الجوال</label>
                    <input type="text" maxlength="10"
                           onkeyup="check_length_num(this,10,'span_phone');"
                           name="mobile" id="mob" onkeypress="validate_number(event);"
                           value="<?php if (isset($volunteer)) echo $volunteer['mobile'] ?>" class="form-control "
                           data-validation="required">
                    <span id="span_phone" style="color: red;"></span>
                </div>
                <div class="form-group col-sm-4 col-xs-12 padding-4">
                    <label class="label "> البريد الإلكتروني</label>
                    <input type="email" name="email" value="<?php if (isset($volunteer)) echo $volunteer['email'] ?>"
                           placeholder="البريد الإلكتروني" class="form-control " data-validation="required">
                </div>
                <div class="form-group col-sm-2 col-xs-12 padding-4">
                    <label class="label ">الفرصة التطوعية</label>
                    <select id="current_forsa_fk" name="current_forsa_fk"  
                            class="form-control selectpicker" data-validation="required"
                            data-show-subtext="true" data-live-search="true">
                            <option >اختر</option>
                        <?php
                        if (isset($foras) && (!empty($foras))) {
                            foreach ($foras as $key) {
                                $select = '';
                                if (isset($volunteer['current_forsa_fk']) && (!empty($volunteer['current_forsa_fk']))) {
                                    if (in_array($key->id, $volunteer['current_forsa_fk'])) {
                                        $select = 'selected';
                                    }
                                }
                                ?>
                                <option value="<?php echo $key->id; ?>" <?= $select ?>> <?php echo $key->forsa_name; ?></option>
                            <?php }
                        } ?>
                    </select>                    
                </div>
                <div class="form-group col-sm-2 col-xs-12 padding-4">
                    <label class="label "> الخبرات والمهارات</label>
                    <select id="skills" name="skills[]" multiple title="يمكنك إختيار أكثر من مجال "
                            class="form-control selectpicker"
                            data-show-subtext="true" data-live-search="true">
                        <?php
                        if (isset($skills_arr) && (!empty($skills_arr))) {
                            foreach ($skills_arr as $key) {
                                $select = '';
                                if (isset($volunteer_work_type) && (!empty($volunteer_work_type))) {
                                    if (in_array($key->id, $volunteer_work_type)) {
                                        $select = 'selected';
                                    }
                                }
                                ?>
                                <option value="<?php echo $key->id; ?>" <?= $select ?>> <?php echo $key->title; ?></option>
                            <?php }
                        } ?>
                    </select>
                    <!-- <input type="text" name="skills" value="<?php if (isset($volunteer)) echo $volunteer['skills'] ?>"
                           placeholder="الخبرات والمهارات" class="form-control " data-validation="required">-->
                </div>
                <div class="form-group col-sm-2 col-xs-12 padding-4">
                    <label class="label "> الاهتمامات </label>
                    <select id="interests" name="interests[]" multiple title="يمكنك إختيار أكثر من مجال "
                            class="form-control selectpicker"
                            data-show-subtext="true" data-live-search="true">
                        <?php
                        if (isset($interests_arr) && (!empty($interests_arr))) {
                            foreach ($interests_arr as $key) {
                                $select = '';
                                if (isset($volunteer_work_type) && (!empty($volunteer_work_type))) {
                                    if (in_array($key->id, $volunteer_work_type)) {
                                        $select = 'selected';
                                    }
                                }
                                ?>
                                <option value="<?php echo $key->id; ?>" <?= $select ?>> <?php echo $key->title; ?></option>
                            <?php }
                        } ?>
                    </select>
                    <!-- <input type="text" name="skills" value="<?php if (isset($volunteer)) echo $volunteer['skills'] ?>"
                           placeholder="الخبرات والمهارات" class="form-control " data-validation="required">-->
                </div>
                <div class="form-group col-sm-2 col-xs-12 padding-4">
                    <label class="label ">المستوى الدراسي</label>
                    <select id="study_code_fk" name="study_code_fk" class="form-control selectpicker"
                            data-show-subtext="true" data-live-search="true">
                        <?php
                        if (isset($study_arr) && (!empty($study_arr))) {

                            foreach ($study_arr as $key) {
                                $select = '';
                                if (isset($volunteer_work_type) && (!empty($volunteer_work_type))) {
                                    if (in_array($key->code, $volunteer_work_type)) {
                                        $select = 'selected';
                                    }
                                }
                                ?>
                                <option value="<?php echo $key->id; ?>" <?= $select ?>> <?php echo $key->title; ?></option>
                            <?php }
                        } ?>
                    </select>
                    <!-- <input type="text" name="skills" value="<?php if (isset($volunteer)) echo $volunteer['skills'] ?>"
                           placeholder="الخبرات والمهارات" class="form-control " data-validation="required">-->
                </div>

                <div class=" form-group col-sm-2 padding-4" style="">
                    <label class=" label"> الجنسيه</label>
                    <input type="text" class="form-control " id="nationality_name" name="nationality_name"
                           style="width: 77%;float: right;" readonly
                           value="<?php if (isset($volunteer)) echo $volunteer['nationality_name']; ?>"/>
                    <input type="hidden" id="nationality_fk" name="nationality_fk"
                           value="<?php if (isset($volunteer)) echo $volunteer['nationality_fk']; ?>">
                    <button type="button" class="btn btn-success" onclick="$('#geha_input').hide();  $('#input_name').val('');
                                $('#title_text').val('nationality_name');
                                $('#title_id').val('nationality_fk');
                                $('#my_load_pop').modal('show');
                                show_pop(1,2,0,'الجنسيه')">
                        <i class="fa fa-plus"></i></button>
                </div>
                <div class="form-group col-sm-2 padding-4" style="">
                    <label class=" label">الحالة الاجتماعية </label>
                    <input type="text" class="form-control " id="social_status_name" name="social_status_name"
                           style="width: 77%;float: right;" readonly
                           value="<?php if (isset($volunteer)) echo $volunteer['social_status_name']; ?>"/>
                    <input type="hidden" name="social_status_id_fk" id="social_status_id_fk"
                           value="<?php if (isset($volunteer)) echo $volunteer['social_status_id_fk']; ?>">
                    <button type="button" class="btn btn-success" onclick="$('#geha_input').hide(); $('#input_name').val('');
                                $('#title_text').val('social_status_name');
                                $('#title_id').val('social_status_id_fk');
                                $('#my_load_pop').modal('show');show_pop(2,11,0,'الحالة الاجتماعية')"><i
                                class="fa fa-plus"></i></button>
                </div>
                <div class="form-group col-sm-2 padding-4 " style="">
                    <label class=" label">التخصص </label>
                    <input type="text" id="specialize_name" name="specialize_name" class="form-control"
                           style="width: 77%;float: right;" readonly
                           value="<?php if (isset($volunteer)) echo $volunteer['specialize_name']; ?>"/>
                    <input type="hidden" name="specialize_fk" id="specialize_fk_input"
                           value="<?php if (isset($volunteer)) echo $volunteer['specialize_fk']; ?>">
                    <button class="btn btn-success" type="button" id="specialize_fk" onclick="$('#geha_input').hide(); $('#input_name').val('');
                             $('#title_text').val('specialize_name');
                            $('#title_id').val('specialize_fk_input');
                            $('#my_load_pop').modal('show');show_pop(2,7,0,'التخصص ')"><i
                                class="fa fa-plus"></i></button>
                </div>
                <div class="form-group col-sm-2 padding-4 " style="">
                    <label class=" label"> الحياة العملية </label>
                    <select name="work_id_fk" class="form-control " id="work_id_fk"
                            onchange="change_work_status($(this).val())">
                        <option value="">اختر</option>
                        <?php
                        $works = array(1 => 'نعم', 2 => 'لا');
                        foreach ($works as $key => $value) {
                            ?>
                            <option value="<?php echo $key; ?>" <?php if (isset($volunteer) && !empty($volunteer['work_id_fk'])) {
                                if ($key == $volunteer['work_id_fk']) {
                                    echo 'selected';
                                }
                            } ?>> <?php echo $value; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-sm-2 padding-4 " style="">
                    <label class=" label"> المهنة </label>
                    <input type="text" class="form-control " id="job_name" name="job_name"
                           style="width: 77%;float: right;"
                           readonly value="<?php if (isset($volunteer)) echo $volunteer['job_name']; ?>"/>
                    <input type="hidden" name="job_fk" id="job_fk_input"
                           value="<?php if (isset($volunteer)) echo $volunteer['job_fk']; ?>">
                    <button class="btn btn-success" type="button" id="job_fk" onclick="$('#geha_input').hide(); $('#input_name').val('');
         $('#title_text').val('job_name');
        $('#title_id').val('job_fk_input');
        $('#my_load_pop').modal('show');show_pop(2,2,0,'المهنة ')"
                        <?php if (isset($volunteer) && $volunteer['work_id_fk'] == 2) {
                            echo ' disabled="disabled"';
                        } ?>><i
                                class="fa fa-plus"></i></button>
                </div>
                <div class="form-group col-sm-2 padding-4 company" style="">
                    <label class=" label"> جهة العمل </label>
                    <input type="text" name="job_place" <?php if (isset($volunteer) && $volunteer['work_id_fk'] == 2) {
                        echo ' disabled="disabled"';
                    } ?>
                           id="job_place" class="form-control " onchange="change_halet_kafel($(this).val())"
                           value="<?php if (isset($volunteer)) echo $volunteer['job_place']; ?>"
                           data-validation-has-keyup-event="true">
                </div>

                <div class="form-group col-sm-2 col-xs-12 padding-4">
                    <label class="label "> هل سبق لك التطوع لدى جهة خيرية ؟</label>
                    <?php
                    $answer = array(1 => 'نعم', 2 => 'لا');
                    foreach ($answer as $key => $value) {
                        $checked = '';
                        if (isset($volunteer) && $volunteer['another_charity'] == $key) {
                            $checked = 'checked';
                        }
                        ?>
                        <input type="radio" name="another_charity" value="<?= $key ?>" data-validation="required"
                               onclick="changeReadonly($(this).val(),'charity')"
                               style="margin-top: 10px" <?= $checked ?>> <label><h6><?= $value ?></h6></label>
                    <? } ?>
                </div>
                <div class="form-group col-sm-6 col-xs-12 padding-4">
                    <label class="label "> إذا كانت الإجابة <strong>بنعم </strong>الرجاء تحديد الانشطه التطوعيه التي
                        مارستها</label>
                    <input type="text" name="charity" id="charity"
                           value="<?php if (isset($volunteer)) echo $volunteer['charity'] ?>" class="form-control "
                           data-validation="<?= $required1 ?>" <?= $readonly1 ?>>
                </div>
            </div>
            <!-- <div class="form-group col-sm-12 col-xs-12">
		            <button type="submit" name="add" value="حفظ" class="btn btn-purple w-md m-b-5" <?= $disabled ?>><span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> حفظ </button>
				</div> -->

<!------------------------------------------------------------->
<!-- yara -->
<script>
    $('.selectpicker').selectpicker("refresh");
</script>
<script>

    /*function save_main_data(div_id) {
        // motato3_form
        // $('#registerForm').serialize(),
        // var url = $('#mother_form').attr('action');
        // console.warn('url :: ' + url);
        var tabs = ['step-1', 'step-2', 'step-3'];

        function checkAdult(tab) {
            return tab == div_id;
        }

        var tab_index = tabs.findIndex(checkAdult);
        console.warn('tab_index :: ' + tab_index);
        var all_inputs = $(' #' + div_id + ' [data-validation="required"]');
        var valid = 1;
        var text_valid = "";
        all_inputs.each(function (index, elem) {
            console.log(elem.id + $(elem).val());
            if ($(elem).val().length >= 1) {
                // valid=1;
                $(elem).css("border-color", "");
            } else {
                valid = 0;
                $(elem).css("border-color", "red");
            }
        });
        var url = $('#motato3_form').attr('action');
        console.warn("url ::" + url);
        $.ajax({
            type: 'post',
            url: url,
            data: $('#motato3_form').serialize(),
            cache: false,
            beforeSend: function (xhr) {
                if (valid == 0) {
                    swal({
                        title: 'من فضلك ادخل كل الحقول ',
                        text: text_valid,
                        type: 'error',
                        confirmButtonText: 'تم'
                    });
                    xhr.abort();
                } else if (valid == 1) {
                    swal({
                        title: "جاري الإرسال ... ",
                        text: "",
                        imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                        showConfirmButton: false,
                        allowOutsideClick: false
                    });
                }
            },
            success: function (html) {
                swal({
                    title: 'تم اضافة  ',
                    type: 'success',
                    confirmButtonText: 'تم'
                });
                if (tab_index <= 2) {
                    if (tab_index == 2) {
                        console.warn('show_tab :: ' + tabs[0]);
                        show_tab(tabs[0]);
                    } else {
                        console.warn('show_tab :: ' + tabs[(tab_index + 1)]);
                        show_tab(tabs[(tab_index + 1)]);
                    }
                }
            }
        });
    }*/
</script>
<script>
    function set_data(id, title) {
        var text_id = $('#title_text').val();
        var id_id = $('#title_id').val();
        $('#' + text_id).val(title);
        $('#' + id_id).val(id);
        $('#my_load_pop').modal('hide');
    }
</script>
<script>
    function show_pop(input_num, type, on_chang, text) {
        $('#my_load_popLabel').text(text);
        $('#input_label').text(text);
        $('#span_id').text(' اضافة ' + text);
        $('#input_num').val(input_num);
        $('#type').val(type);
        console.log('text :' + text + 'type:' + type, 'input_num:' + input_num);
        var f2a = $('option:selected', $('#fe2a_type')).attr("data-specialize");
        console.log('f2a : ' + f2a);
        console.log('on_chang : ' + on_chang);
        switch (on_chang) {
            case 1:
                console.log('on_chang : ' + on_chang);
                if (f2a == 2) {
                    type = 15;
                    input_num = 2;
                    $('#input_num').val(input_num);
                    $('#type').val(type);
                } else if (f2a == 1) {
                    type = 34;
                    input_num = 3;
                    $('#input_num').val(input_num);
                    $('#type').val(type);
                }
                break;
            default:
                break;
        }
        console.log('f2a : ' + f2a);
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>all_Finance_resource/sponsors/Sponsor/show_table',
            data: {
                input_num: input_num,
                type: type
            },
            beforeSend: function () {
                $('#my_load_table').html(
                    '<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>'
                );
            },
            success: function (html) {
                $('#my_load_table').html(html);
            }
        });
    }
</script>
<script>
    function sumit_pop() {
        var btun_val = $("#btn_pop").val();
        console.log('btn_pop :' + btun_val);
        var input_num = $('#input_num').val();
        var input_name = $('#input_name').val();
        var input_id = $('#input_id').val();
        var type = $('#type').val();
        if (btun_val == '1') {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>all_Finance_resource/sponsors/Sponsor/show_table',
                data: {
                    input_num: input_num,
                    input_name: input_name,
                    type: type,
                    add: 'add'
                },
                beforeSend: function () {
                    swal({
                        title: "جاري الحفظ ",
                        text: "",
                        imageUrl: "<?php echo base_url() . 'asisst/admin_asset/img/loader.gif' ?>",
                        confirmButtonText: "تم"
                    });
                    $('#my_load_table').html(
                        '<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>'
                    );
                },
                success: function (html) {
                    swal({
                        title: "تم الحفظ ",
                        text: "",
                        type: "success",
                        confirmButtonText: "تم",
                    });
                    $('#input_name').val();
                    $('#input_id').val();
                    $("#btn_pop").val(1);
                    $("#btn_pop_span").text("حفظ");
                    $('#my_load_table').html(html);
                    // show_pop(input_num,type,$('#my_load_popLabel').text(text));
                }
            });
        } else {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>all_Finance_resource/sponsors/Sponsor/show_table',
                data: {
                    input_num: input_num,
                    type: type,
                    input_name: input_name,
                    input_id: input_id,
                    update: 'update'
                },
                beforeSend: function () {
                    swal({
                        title: "جاري الحفظ ",
                        text: "",
                        imageUrl: "<?php echo base_url() . 'asisst/admin_asset/img/loader.gif' ?>",
                        confirmButtonText: "تم"
                    });
                    $('#my_load_table').html(
                        '<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>'
                    );
                },
                success: function (html) {
                    swal({
                        title: "تم الحفظ ",
                        text: "",
                        type: "success",
                        confirmButtonText: "تم",
                    });
                    $('#input_name').val();
                    $('#input_id').val();
                    $("#btn_pop").val(1);
                    $("#btn_pop_span").text("حفظ");
                    $('#my_load_table').html(html);
                    // show_pop(input_num,type,$('#my_load_popLabel').text(text));
                }
            });
        }
    }

    function delete_pop(id) {
        var input_num = $('#input_num').val();
        var type = $('#type').val();
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>all_Finance_resource/sponsors/Sponsor/show_table',
            data: {
                input_num: input_num,
                input_id: id,
                type: type,
                delete: 'delete'
            },
            beforeSend: function () {
                swal({
                    title: "جاري الحذف ",
                    text: "",
                    imageUrl: "<?php echo base_url() . 'asisst/admin_asset/img/loader.gif' ?>",
                    confirmButtonText: "تم"
                });
                $('#my_load_table').html(
                    '<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>'
                );
            },
            success: function (html) {
                swal({
                    title: "تم الحذف ",
                    text: "",
                    type: "success",
                    confirmButtonText: "تم",
                });
                $('#input_name').val();
                $('#input_id').val();
                $("#btn_pop").val(1);
                $("#btn_pop_span").text("حفظ");
                $('#my_load_table').html(html);
                // show_pop(input_num,type,$('#my_load_popLabel').text(text));
            }
        });
    }
</script>
<script>
    function change_work_status(value) {
        if (value == 2) {
            document.getElementById("job_fk").setAttribute("disabled", "disabled");
            document.getElementById("job_fk_input").value = '';
            document.getElementById("job_name").value = '';
            document.getElementById("job_place").setAttribute("disabled", "disabled");
            document.getElementById("job_place").value = '';
        } else {
            document.getElementById("job_fk").removeAttribute("disabled", "disabled");
            document.getElementById("job_place").removeAttribute("disabled", "disabled");
        }
    }
</script>
<script>
    function GetMemberName(obj) {
        console.log(' obj :' + obj.dataset.name);
        var hai_name = obj.dataset.hai_name;
        var hai_id = obj.dataset.hai_id;
        var city_name = obj.dataset.city_name;
        var city_id = obj.dataset.city_id;
        document.getElementById('city_id_fk').value = city_id;
        document.getElementById('city_name').value = city_name;
        document.getElementById('hai_id_fk').value = hai_id;
        document.getElementById('hai_name').value = hai_name;
        $("#myModalInfo .close").click();
    }

    function GetDiv(div) {
        html = '<div class="col-md-12 no-padding"><table id="js_table_members" class="table table-striped table-bordered dt-responsive nowrap " >' +
            '<thead><tr class="greentd"><th style="width: 50px;">#</th><th style="width: 50px;"> المدينه </th><th style="width: 170px;" >الحي </th>' +
            '</tr></thead><table><div id="dataMember"></div></div>';
        $("#" + div).html(html);
        $('#js_table_members').show();
        var oTable_usergroup = $('#js_table_members').DataTable({
            dom: 'Bfrtip',
            "ajax": '<?php echo base_url(); ?>human_resources/Human_resources/getConnection',
            aoColumns: [
                {"bSortable": true},
                {"bSortable": true},
                {"bSortable": true}
            ],
            buttons: [
                'pageLength',
                'copy',
                'excelHtml5',
                {
                    extend: "pdfHtml5",
                    orientation: 'landscape'
                },
                {
                    extend: 'print',
                    exportOptions: {columns: ':visible'},
                    orientation: 'landscape'
                },
                'colvis'
            ],
            colReorder: true,
            destroy: true
        });
    }
</script>