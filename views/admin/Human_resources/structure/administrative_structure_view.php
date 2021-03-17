<style>
    fieldset {
        border: 1px solid #ddd !important;
        margin: 0;
        xmin-width: 0;
        padding: 10px;
        position: relative;
        border-radius: 4px;
        background-color: #f5f5f5;
        padding-left: 10px !important;
    }

    legend {
        font-size: 14px;
        font-weight: bold;
        margin-bottom: 0px;
        width: 35%;
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 5px 5px 5px 10px;
        background-color: #ffffff;
    }
</style>


<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
    <div class="panel-heading">
       
    </div>
    <div class="panel-body">
        <div class="col-md-12">
            <div class="col-md-7">
                <?php

              // $types = array(1 => 'رئيس', 2 => 'ادارة', 3 => 'قسم', 4 => 'قطاع/فرع', 5 => 'وحدة');
                
              $types = array(1 => 'مدير تنفيذي', 2 => 'مدير إدارة', 3 => 'رئيس قسم', 4 => 'موظف');  
                
                ?>
                <div class="form-group col-sm-12 col-xs-12 no-padding">
                    <!--14-1-om-->
                    <fieldset id="administrative_structure">
                        <?php echo form_open_multipart('human_resources/Structure/add_structure', array('id' => 'MyFormStructure')); ?>
                        <?php /*if (!empty($parent['name'])) { ?>
                            <legend style="float: left;margin-top: -46px;"> الحساب
                                العام: <?= $parent['name'] ?></legend>
                        <?php }*/ ?>
                        <legend> الهيكل الإداري</legend>
                        <div class="form-group col-md-5 col-sm-6 padding-4">
                            <label class=" "> المسمى </label>
                            <input type="text" class="form-control " id="name" name="name" data-validation="required"
                                   value="">
                        </div>
                        <div class="form-group col-md-3 col-sm-6 padding-4">
                            <label class=" "> النوع </label>
                            <select name="main_type" id="main_type" class="form-control label"
                                    data-validation="required" aria-required="true" tabindex="-1"
                                    aria-hidden="true">
                                <option value=""> - إختر -</option>
                                <?php
                                foreach ($types as $key => $value) {
                                    ?>
                                    <option value="<?= $key ?>"><?= $value ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-3 col-sm-6 padding-4">
                            <label class=" "> تابع لي </label>
                            <select name="from_id" onchange="$('#from_code').val($('option:selected',this).data('from_code'));
                            $('#admin_struct_manger_id_fk').val($('option:selected',this).val());
                            $('#level').val($('option:selected',this).data('level')+1);"
                                    class="form-control selectpicker" data-show-subtext="true" data-live-search="true"
                                    id="from_id">
                                <option value="0" data-from_id="0" data-from_name="" data-from_code="0"
                                        data-main_type="" data-level="1"> - إختر -
                                </option>
                                <?php foreach ($records as $key => $record) { ?>
                                    <option value="<?= $record->id ?>" data-from_id="<?= $record->id ?>"
                                            data-from_name="<?= $record->name ?>"
                                            data-from_code="<?= $record->code ?>"
                                            data-main_type="<?= $record->main_type ?>"
                                            data-level="<?= $record->level ?>"><?= $record->name ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-xs-12 text-center">
                            <input type="hidden" name="from_code" id="from_code" value="0">
                            <input type="hidden" name="level" id="level" value="1"/>
                            <input type="hidden" name="from_id_old" id="from_id_old" value="0">
                            <input type="hidden" name="id" id="id" value="0">
                            <br>
                            <button type="button" class="btn btn-labeled btn-success "
                                    onclick="save_structure_ajex()" name="add" value="حفظ">
                                <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                            </button>
                            <button type="button" style="display: none" class="btn btn-labeled btn-danger form_btn "
                                    onclick="delete_structure_ajex()" name="add" value="حفظ">
                                <span class="btn-label"><i class="glyphicon glyphicon-floppy-remove"></i></span>حذف
                            </button>
                            <button type="button" style="display: none" class="btn btn-labeled btn-info form_btn "
                                    onclick="add_structure_new()" name="add" value="">
                                <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>اضافة جديد
                            </button>
                            <button type="button" style="display: none" class="btn btn-labeled btn-warning form_btn "
                                    onclick="add_structure_new_from()" name="add" value="">
                                <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>اضافة تابع جديد
                            </button>
                        </div>
                        <?php echo form_close() ?>

                    </fieldset>

                    <!--14-1-om-->
                    <fieldset id="job_div" style="margin-top: 20px; display: none">
                        <?php echo form_open_multipart('human_resources/Structure/add_structure_job', array('id' => 'MyFormStructure_job')); ?>
                        <input type="hidden" name="administrative_structure_id_fk" id="administrative_structure_id_fk"
                               value="">
                        <input type="hidden" name="admin_struct_manger_id_fk" id="admin_struct_manger_id_fk" value="">
                        <input type="hidden" name="id" id="job_id" value="0">
                        <legend> الوظائف</legend>
                        <div class="col-xs-12 ">
                            <div class="form-group col-md-4 col-sm-3 col-xs-6">
                                <label class="label "> الوظيفة </label>
                                <select id="job_id_fk" name="job_id_fk" class="form-control selectpicker"
                                        data-validation="required"
                                        data-show-subtext="true" data-live-search="true">
                                    <option value="">إختر</option>
                                    <?php
                                    foreach ($jobs as $key) { ?>
                                        <option value="<?php echo $key->id; ?>"> <?php echo $key->title; ?></option>
                                    <?php } ?>
                                </select>
                                <span id="job_id_fk_span" class="error" style="display: none ;color: red"> هذا الحقل مطلوب</span>
                            </div>
                            <div class="form-group col-md-3 col-sm-6 padding-4">
                                <label class=" "> عدد الوظائف </label>
                                <input type="number" class="form-control " min="1" id="emp_num" name="emp_num"
                                       data-validation="required" value="">
                            </div>
                            <div class="form-group col-md-3 col-sm-6 padding-4">
                                <label class=" "> </label>

                                <div class="check-style">
                                    <input type="checkbox" name="is_manger" id="is_manger" value="1">
                                    <label for="is_manger"> رئيس </label>
                                </div>
                            </div>

                            <div class="col-xs-12 text-center">
                                <div class="col-md-9 col-sm-6 padding-4">
                                </div>
                                <div class="col-md-3 col-sm-6 padding-4">
                                    <button type="button"
                                            class="btn btn-labeled btn-success " id="save_account_dalel"
                                            onclick="save_structure_job_ajex()" name="add" value="حفظ">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>اضافة

                                    </button>
                                </div>
                            </div>

                        </div>
                        <!--14-1-om-->
                        <?php echo form_close() ?>

                    </fieldset>
                </div>
                <div class="col-md-12 col-sm-12 " id="Div_jobs">

                </div>
            </div>
            <div class="col-md-5">

                <div class="col-sm-12 col-xs-12 no-padding" id="Div_tree">
                    <?php
                    function buildTree($tree)
                    {
                        ?>
                        <ul id="tree3">
                            <?php foreach ($tree as $record) { ?>
                                <li>
                                    <a onclick="GetDiv_jobs(<?= $record->id ?>); load_data_structre(<?= $record->id ?>,this)"
                                       data-from_id="<?= $record->from_id ?>"
                                       data-name="<?= $record->name ?>" data-id="<?= $record->id ?>"
                                       data-main_type="<?= $record->main_type ?>"
                                       data-from_code="<?= $record->from_code ?>"
                                       data-level="<?= $record->level ?>"><?= $record->name ?></a>
                                    <?php
                                    if (isset($record->subs)) {
                                        buildTree($record->subs);
                                    }
                                    ?>
                                </li>
                            <?php } ?>
                        </ul>
                        <?php
                    }

                    if (isset($tree) && $tree != null) {
                        buildTree($tree);
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function add_structure_new() {

        $.ajax({
            type: 'get',
            url: '<?php echo base_url() ?>human_resources/Structure/load_data_structre/',
            cache: false,
            success: function (response) {
                var recodes = JSON.parse(response);
                if (recodes.length > 0) {
                    var options = ' <option value="0" data-from_id="0" data-from_name="" data-from_code="0" data-main_type="" data-level="1"> - إختر -</option>';
                    for (var i = 0; i < recodes.length; i++) {

                        options += '<option value="' + recodes[i].id + '" data-from_id="' + recodes[i].id + '" data-from_name="' + recodes[i].name + '"\n' +
                            '  data-from_code="' + recodes[i].code + '" data-main_type="' + recodes[i].main_type + '" data-level="' + recodes[i].level + '">' + recodes[i].name + '</option>';
                    }
                    $('#from_id').html(options);
                    $('.selectpicker').selectpicker("refresh");

                }
            }
        });


        $('#name').val('');
        $('#from_code').val(0);
        $('#level').val(1);
        $('#main_type').val('');
        $('#from_id').val(0);
        $('#id').val(0);
        $('#administrative_structure_id_fk').val(0);
        $('#admin_struct_manger_id_fk').val(0);
        $('#from_id').removeAttr('disabled', 'disabled');
        $('.selectpicker').selectpicker("refresh");

        $('#job_id_fk').val(0);
        $('#emp_num').val(0);
        $('#is_manger').attr('checked',false);
        $('.selectpicker').selectpicker("refresh");

        $('#job_div').hide('slow');
        $('.form_btn').hide('slow');
        $('#Div_jobs').hide('slow');

    }

    function add_structure_new_from() {
        $.ajax({
            type: 'get',
            url: '<?php echo base_url() ?>human_resources/Structure/load_data_structre/',
            cache: false,
            success: function (response) {
                var recodes = JSON.parse(response);
                if (recodes.length > 0) {
                    var options = ' <option value="0" data-from_id="0" data-from_name="" data-from_code="0" data-main_type="" data-level="1"> - إختر -</option>';
                    for (var i = 0; i < recodes.length; i++) {

                        options += '<option value="' + recodes[i].id + '" data-from_id="' + recodes[i].id + '" data-from_name="' + recodes[i].name + '"\n' +
                            '  data-from_code="' + recodes[i].code + '" data-main_type="' + recodes[i].main_type + '" data-level="' + recodes[i].level + '">' + recodes[i].name + '</option>';
                    }
                    $('#from_id').html(options);
                    console.log('id' + $('#id').val());
                    $('#from_id').val($('#id').val());
                    $('#from_id').removeAttr('disabled', 'disabled');
                    $('.selectpicker').selectpicker("refresh");
                    $('#name').val('');
                    $('#from_code').val($('option:selected',$('#from_id')).data('from_code'));
                    $('#level').val($('option:selected',$('#from_id')).data('level')+1);
                    $('#main_type').val('');
                    $('#id').val(0);
                    $('#administrative_structure_id_fk').val(0);
                    $('#admin_struct_manger_id_fk').val($('#id').val());
                    $('#job_id_fk').val(0);
                    $('#emp_num').val(0);
                    $('#is_manger').attr('checked',false);
                    $('.selectpicker').selectpicker("refresh");

                    $('#job_div').hide('slow');
                    $('.form_btn').hide('slow');
                    $('#Div_jobs').hide('slow');
                }
            }
        });


    }

    function GetDiv_tree() {

        $.ajax({
            type: 'get',
            url: '<?php echo base_url() ?>human_resources/Structure/load_tree',
            cache: false,
            beforeSend: function () {
                $("#Div_tree").html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (html) {
                $("#Div_tree").html(html);
                $('#tree3').treed({
                    openedClass: 'fa-minus',
                    closedClass: 'fa-plus'
                });
            }
        });


    }
</script>
<script>

    function GetDiv_jobs(administrative_structure_id_fk) {
        $('#Div_jobs').show('slow');

        $.ajax({
            type: 'get',
            url: '<?php echo base_url() ?>human_resources/Structure/load_jobs/' + administrative_structure_id_fk,
            cache: false,
            beforeSend: function () {
                $("#Div_jobs").html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (html) {
                $("#Div_jobs").html(html);
            }
        });


    }

    function load_data_structre(id, elem) {
        $('#job_div').show('slow');
        $('.form_btn').show('slow');
        $('#name').val(elem.dataset.name);
        $('#from_code').val(elem.dataset.from_code);
        $('#level').val(elem.dataset.level);
        $('#main_type').val(elem.dataset.main_type);
        $('#from_id').val(elem.dataset.from_id);
        $('#from_id_old').val(elem.dataset.from_id);
        $('#id').val(elem.dataset.id);
        $('#administrative_structure_id_fk').val(elem.dataset.id);
        $('#admin_struct_manger_id_fk').val(elem.dataset.from_id);
        /*$('#from_id').attr('disabled', 'disabled');*/
        $('.selectpicker').selectpicker("refresh");

        /* $.ajax({
             type: 'get',
             url: '<?php echo base_url() ?>human_resources/Structure/load_data_structre/' + id,
            cache: false,
            success: function (response) {
                
            }
        });*/
    }

    function load_job_data(id) {
        $('#job_div').show('slow');
        $('#Div_jobs').hide('slow');
        $('.form_btn').show('slow');
        var elem = document.getElementById('a_' + id);
        /*      $('#administrative_structure_id_fk').val(elem.dataset.administrative_structure_id_fk);
              $('#admin_struct_manger_id_fk').val(elem.dataset.admin_struct_manger_id_fk);*/
        $('#job_id_fk').val(elem.dataset.job_id_fk);
        $('#emp_num').val(elem.dataset.emp_num);
        if (elem.dataset.is_manger === 1) {
            $('#elem').prop('checked', true);
        } else {
            $('#elem').prop('checked', false);

        }
        $('#job_id').val(elem.dataset.id);
        $('.selectpicker').selectpicker("refresh");

    }

    function delete_job_data(id) {

        $.ajax({
            type: 'get',
            url: '<?php echo base_url() ?>human_resources/Structure/delete_job_data/' + id,
            cache: false,
            beforeSend: function () {
                swal({
                    title: "جاري الحذف ... ",
                    text: "",
                    imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                    showConfirmButton: false,
                    allowOutsideClick: false

                });
            },
            success: function (response) {

                GetDiv_jobs($('#administrative_structure_id_fk').val());
                swal({
                    title: 'تم الحذف بنجاح  ',
                    type: 'success',
                    confirmButtonText: 'تم'
                });

            }
        });
    }
</script>


<script>
    function save_structure_ajex() {

        var all_inputs = $('#administrative_structure [data-validation="required"]');
        var valid = 1;
        var text_valid = "";
        all_inputs.each(function (index, elem) {
            console.log(elem.id + $(elem).val());
            if (($(elem).val()) && $(elem).val().length >= 1) {
                // valid=1;
                $(elem).css("border-color", "#5cb85c");
            } else {
                valid = 0;
                $(elem).css("border-color", "red");
            }
        });

        $.ajax({
            type: 'post',
            url: $('#MyFormStructure').attr('action'),
            data: $('#MyFormStructure').serialize(),
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
                        title: "جاري الحفظ ... ",
                        text: "",
                        imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                        showConfirmButton: false,
                        allowOutsideClick: false

                    });
                }
            },
            success: function (response) {
                if (!isNaN(response)) {
                    swal({
                        title: 'تم اضافة  بنجاح',
                        type: 'success',
                        confirmButtonText: 'تم'
                    });
                    $('#job_div').show('slow');
                    $('.form_btn').show('slow');
                    $('#id').val(response);
                    $('#administrative_structure_id_fk').val(response);
                    GetDiv_tree();
                } else {
                    swal({
                        title: ' لم يتم اضافة  بنجاح',
                        type: 'danger',
                        confirmButtonText: 'تم'
                    });
                }


            }
        });

    }
</script>
<script>
    function save_structure_job_ajex() {

        var all_inputs = $('#job_div [data-validation="required"]');
        var valid = 1;
        var text_valid = "";
        all_inputs.each(function (index, elem) {
            console.log(elem.id + $(elem).val());
            if (($(elem).val()) && $(elem).val().length >= 1) {
                // valid=1;
                $(elem).css("border-color", "#5cb85c");
            } else {
                valid = 0;
                $(elem).css("border-color", "red");
            }
        });

        $.ajax({
            type: 'post',
            url: $('#MyFormStructure_job').attr('action'),
            data: $('#MyFormStructure_job').serialize(),
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
                        title: "جاري الحفظ ... ",
                        text: "",
                        imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                        showConfirmButton: false,
                        allowOutsideClick: false

                    });
                }
            },
            success: function (response) {
                if (!isNaN(response)) {
                    swal({
                        title: 'تم اضافة  بنجاح',
                        type: 'success',
                        confirmButtonText: 'تم'
                    });
                    $('#job_id_fk').val(0);
                    $('#emp_num').val(0);
                    $('#is_manger').attr('checked',false);
                    $('.selectpicker').selectpicker("refresh");

                    GetDiv_jobs($('#administrative_structure_id_fk').val());
                } else {
                    swal({
                        title: ' لم يتم اضافة  بنجاح',
                        type: 'danger',
                        confirmButtonText: 'تم'
                    });
                }


            }
        });

    }
</script>