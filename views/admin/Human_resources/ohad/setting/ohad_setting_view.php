<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $title ?></h3>
    </div>
    <div class="panel-body">
        <div class="col-xs-12 col-sm-12 col-md-12 m-b-20">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="active" onclick="get_data_table(1)"><a href="#Mgalat" data-toggle="tab">الفئه </a></li>
                <li onclick="get_data_table(2)"><a href="#activety" data-toggle="tab">الوصف</a></li>
            </ul>
            <!-- Tab panels -->

            <div class="tab-content">
                <div class="tab-pane fade in active" id="Mgalat">
                    <div class=" col-md-12 col-sm-12  col-xs-12 Mgalat_form ">
                        <?php echo form_open(base_url() . 'human_resources/ohad/Ohad_work/add_custody_devices', array('id' => 'Mgalat_form')) ?>
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group col-sm-4 col-xs-12 padding-4">
                                <label class="label "> الفئه  :</label>
                                <input type="text" name="title" value="" id="title_magal"
                                       placeholder="الإسم" class="form-control " data-validation="required">
                            </div>
                           
                            <input type="hidden" name="form_save" value="1">
                            <input type="hidden" name="id" id="magal_id" value="0">
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="button" class="btn btn-labeled btn-success btn-sm"
                                    onclick="save_form('Mgalat_form')">
                                <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                            </button>
                        </div>
                        <?php echo form_close() ?>
                    </div>
                </div>
                <div class="tab-pane fade " id="activety">
                    <div class=" col-md-12 col-sm-12  col-xs-12 active_form">
                        <?php echo form_open(base_url() . 'human_resources/ohad/Ohad_work/add_custody_devices', array('id' => 'active_form')) ?>
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group col-md-3 col-sm-3 col-xs-12 padding-4">
                                <label class="label "> الفئه :</label>
                                <select name="from_code" class="form-control" id="from_code" data-validation="required">
                                    <option value="">اختر</option>
                                    <?php foreach ($mgalat as $value) { ?>
                                        <option value="<?php echo $value->code; ?>"> <?php echo $value->title; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-4 col-xs-12 padding-4">
                                <label class="label ">  الوصف :</label>
                                <input type="text" name="title" value="" id="title_active"
                                       placeholder="الإسم" class="form-control " data-validation="required">
                            </div>

                            <input type="hidden" name="form_save" value="2">
                            <input type="hidden" name="id" id="active_id"  value="0">
                        </div>

                        <div class="col-md-12 text-center">
                            <button type="button" class="btn btn-labeled btn-success btn-sm"
                                    onclick="save_form('active_form')">
                                <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                            </button>
                        </div>
                        <?php echo form_close() ?>
                    </div>

                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12 m-b-20" id="data_table">
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>

<script>
    $(document).ready(function () {

        get_data_table(1);
    });

    function get_select_data() {
        console.log('get select data');
        $.ajax({
            type: 'get',
            url: '<?php echo base_url() ?>human_resources/ohad/Ohad_work//get_select_data',
            data: {},
            cache: false,
            success: function (resp) {
                var obj = JSON.parse(resp);
                var options = '<option value="">اختر</option>';
                console.log("obj.mgalat.length" + obj.mgalat.length)
                for (var i = 0; i < obj.mgalat.length; i++) {
                    var row = obj.mgalat[i];
                    var option = '<option value="' + row.code + '"> ' + row.title + '</option>';
                    options += option;
                }
                $('#from_code').html(options);
            }
        });

    }

    function get_data_table(type) {
        console.log('get table data');
        $.ajax({
            type: 'get',
            url: '<?php echo base_url() ?>human_resources/ohad/Ohad_work/get_data_table/' + type,
            data: {},
            cache: false,
            beforeSend: function () {
                $('#data_table').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (resp) {

                $('#data_table').html(resp);
            }
        });

    }

</script>
<script>
    function save_form(select_div) {
        // $('#registerForm').serialize(),
        var all_inputs = $('.' + select_div + ' [data-validation="required"]');
        var valid = 1;
        var text_valid = "";
        all_inputs.each(function (index, elem) {
            console.log(elem.id + $(elem).val() + "::" + $(elem).val().length);
            if ($(elem).val().length > 1) {
                $(elem).css("border-color", "");
            } else {
                valid = 0;
                $(elem).css("border-color", "red");
            }
        });

        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>human_resources/ohad/Ohad_work/add_custody_devices',
            data: $('#' + select_div).serialize(),
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
                        title: " ",
                        text: "جاري الحفظ ......",
                        imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                        showConfirmButton: false,
                        allowOutsideClick: false
                    });
                }
            },
            success: function (html) {
                swal({
                    title: 'تم اضافة  بنجاح',
                    type: 'success',
                    confirmButtonText: 'تم'
                });
                var all_inputs_set = $('.' + select_div + ' .form-control');
                all_inputs_set.each(function (index, elem) {
                    console.log(elem.id + $(elem).val());
                    $(elem).val('');
                });
                get_select_data();
               var type= $("input[name='form_save']").val();
                get_data_table(type);
                $('#reg').removeAttr("disabled");


            }
        });
    }
</script>

<script>
    function delete_data_form(id, type) {
        $.ajax({
            type: 'get',
            url: '<?php echo base_url() ?>human_resources/ohad/Ohad_work//delete_data/' + id,
            data: {},
            cache: false,
            beforeSend: function () {
                swal({
                    title: " ",
                    text: "جاري الحذف ......",
                    imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                    showConfirmButton: false,
                    allowOutsideClick: false
                });

            },
            success: function (resp) {
                swal({
                    title: 'تم الحذف  ',
                    type: 'success',
                    confirmButtonText: 'تم'
                });
                get_data_table(type);
            }
        });
    }

    function set_data_form(id, type) {
        $.ajax({
            type: 'get',
            url: '<?php echo base_url() ?>human_resources/ohad/Ohad_work/set_data_form/' + id,
            data: {},
            cache: false,
            beforeSend: function () {
                swal({
                    title: " ",
                    text: " ",
                    imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                    showConfirmButton: false,
                    allowOutsideClick: false
                });
            },
            success: function (resp) {
                var obj = JSON.parse(resp);
                var data = obj.data;
                if (type == 1) {
                    $('#title_magal').val(data.title);
                    $('#magal_id').val(data.id);
                    $("input[name='has_active'][value='" + data.has_active + "']").prop('checked', true);
                } else {
                    $('#title_active').val(data.title);
                    $('#active_id').val(data.id);
                    $('#from_code').attr("disabled", 'disabled');
                    $('#from_code').val(data.from_code);

                }
            }
        });

    }
</script>

