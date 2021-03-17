
<style type="text/css">



    .no-padding {
        padding-left: 0px !important;
        padding-right: 0px !important;
    }
    .piece-heading h5 {
        margin: 4px 0;
    }

    .piece-box table {
        margin-bottom: 0
    }

    .piece-box table th,
    .piece-box table td {
        padding: 2px 8px !important;
    }

    h6 {
        font-size: 16px;
        margin-bottom: 3px;
        margin-top: 3px;
    }

    .print_forma table th {
        text-align: right;
    }

    .print_forma table tr th {
        vertical-align: middle;
    }

    .no-padding {
        padding: 0;
    }

    .header p {
        margin: 0;
    }

    .header img {
        height: 120px;
        width: 100%
    }

    .main-title h4 {
        display: table-cell;
        vertical-align: bottom;
        text-align: center;
        width: 100%;
    }

    .print_forma hr {
        border-top: 1px solid #73b300;
        margin-top: 7px;
        margin-bottom: 7px;
    }

    @media print {
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    }

    .footer img {
        width: 100%;
        height: 120px;
    }

    @page {
        size: A4;
        margin: 20px 0 0;
    }



    .table-bordered > thead > tr > th,
    .table-bordered > tbody > tr > th,
    .table-bordered > tfoot > tr > th,
    .table-bordered > thead > tr > td,
    .table-bordered > tbody > tr > td,
    .table-bordered > tfoot > tr > td {
        border: 1px solid #abc572;
    }

    /***/

    .btn-close-model,
    btn-close-model:hover,
    btn-close-model:focus {
        background-color: #8a9e5f;
        color: #fff;
        margin-top: -20px;
    }


</style>
<style type="text/css">


    .piece-heading h5 {
        margin: 4px 0;
        color: #fff;
    }

    .piece-box table {
        margin-bottom: 0
    }

    .piece-box table th,
    .piece-box table td {
        padding: 2px 8px !important;
    }

    .piece-box h6 {
        font-size: 16px;
        margin-bottom: 5px;
        margin-top: 5px;
    }

    .print_forma table th {
        text-align: right;
    }

    .print_forma table tr th {
        vertical-align: middle;
    }

    .no-padding {
        padding: 0;
    }

    .header p {
        margin: 0;
    }

    .header img {
        height: 120px;
        width: 100%
    }

    .main-title {
        display: table;
        text-align: center;
        position: relative;
        height: 120px;
        width: 100%;
    }

    .main-title h4 {
        display: table-cell;
        vertical-align: bottom;
        text-align: center;
        width: 100%;
    }

    .print_forma hr {
        border-top: 1px solid #73b300;
        margin-top: 7px;
        margin-bottom: 7px;
    }

    .no-border {
        border: 0 !important;
    }

    .gray_background {
        background-color: #eee;

    }

    @page {
        size: A4;
        margin: 20px 0 0;
    }

    .open_green {
        background-color: #e6eed5;
    }

    .closed_green {
        background-color: #cdddac;
    }

    .table-bordered > thead > tr > th, .table-bordered > tbody > tr > th,
    .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td,
    .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > td {
        border: 1px solid #abc572;
        vertical-align: middle;
    }

    .under-line {
        border-top: 1px solid #abc572;
        padding-left: 0;
        padding-right: 0;
    }

    span.valu {
        padding-right: 10px;
        font-weight: 600;
        font-family: sans-serif;
    }

    .under-line .col-xs-3,
    .under-line .col-xs-4,
    .under-line .col-xs-6,
    .under-line .col-xs-8 {
        border-left: 1px solid #abc572;
    }


    .nonactive {
        pointer-events: none;
        cursor: not-allowed;
    }


    label {
        margin-bottom: 5px !important;
        color: #002542 !important;
        display: block !important;
        text-align: right !important;
        font-size: 16px !important;
        padding: 0 !important;
        height: auto;
    }

    .btn-group .dropdown-menu {
        min-width: 106px;
    }

    .btn-group .dropdown-menu > li > a {
        padding: 5px 2px 5px 0;
    }

</style>

<div class="col-sm-12 no-padding ">

    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title; ?></h3>
            <div class="pull-left">
                <?php if (isset($result) && !empty($result)) {

                    $data_load["id"] = $result->id;
                    $this->load->view('admin/md/all_gam3ia_omomia_members/drop_down_menu', $data_load);

                } ?>
            </div>
        </div>
        <div class="panel-body">
            <?php

            $out['form'] = 'md/all_gam3ia_omomia_members/Gam3ia_omomia_members/add_account_data/' . $result->id;
            ?>
                <?php echo form_open_multipart($out['form'], array("class"=>"account_form")); ?>

                <div class="col-md-12">
                    <div class="form-group  col-md-3  padding-4">
                        <label class="label   ">إسم المستخدم </label>
                        <input type="text" id="memb_user_name" name="memb_user_name" class="form-control"   data-validation="required"
                               placeholder="أدخل البيانات"
                               value="<?= $result->memb_user_name;?>" >
                    </div>

                    <div class="form-group col-md-3 padding-4">
                        <label class="label   ">كلمة المرور  </label>
                        <input type="password" name="memb_password" id="memb_password"   data-validation="required" onkeyup="valid_pass_length();"
                               class="form-control  "  >
                        <span id="validate_length" class="span-validation"> </span>
                    </div>
                    <div class="form-group col-md-3 padding-4">
                        <label class="label   ">تاكيد كلمة المرور <strong></strong> </label>
                        <input type="password" id="memb_password_copy"   data-validation="required"  onkeyup="return valid_pass_copy();"
                               class="form-control  " >
                        <span id="validate_copy" class="span-validation"> </span>
                    </div>
                        <?php
                        $status = $result->suspend;
                        if ($status == 1) {
                            $status_checked= "checked";
                        }else {
                            $status_checked="";
                        }
                        ?>
                        <div class="form-group col-md-2 col-sm-4 col-xs-12 padding-4">
                            <label class="label ">الحاله</label>
                            <div class="toggle-example">
                                <input type="hidden" id="suspend" name="suspend" value="<?=$status?>"/>
                                <input id="checkbox_toggle" class="checkbox_toggle" type="checkbox" <?=$status_checked?> data-toggle="toggle"
                                       onchange="change_status_account($('#suspend').val(),<?=$result->id?>)"
                                       data-onstyle="success" data-offstyle="danger" data-size="mini"
                                       style="height: 31px; width: 30px;">
                            </div>
                        </div>

                    </div>

                    <div class="form-group col-md-12 col-sm-12 padding-4">
<!--                        <button type="button"-->
<!--                                class="btn btn-labeled btn-success " id="save" name="save" value="save"-->
<!--                                style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">-->
<!--                            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ-->
<!--                        </button>-->
                        <div class="text-center">
                            <button type="button" id="buttons"  onclick="  update_account_status(<?=$result->id ?>);"
                                    class="btn btn-labeled btn-warning" id="save" name="save" value="save"><span
                                        class="btn-label"><i class="fa fa-floppy-o"></i></span>تعديل
                                <input type="hidden"  name="id"  id="id" value="<?=$result->id ?>">
                            </button>
                        </div>

                    </div>
                    <div class="form-group col-md-4 col-sm-6 padding-4"></div>
                </div>
                <?php echo form_close() ?>
        </div>


    </div>
</div>


<script>
    function valid_pass_length()
    {
        if($("#memb_password").val().length < 4){
            document.getElementById('validate_length').style.color = '#F00';
            document.getElementById('validate_length').innerHTML = 'كلمة المرور اكثر من اربع حروف';
            // $('button[type="submit"]').attr("disabled","disabled");
        }else if($("#memb_password").val().length > 4 &&  $("#memb_password").val().length < 10){
            document.getElementById('validate_length').style.color = '#F00';
            document.getElementById('validate_length').innerHTML = 'كلمة المرور ضعيفة';
            // $('button[type="submit"]').attr("disabled","disabled");
        }else if($("#memb_password").val().length > 10){
            document.getElementById('validate_length').style.color = '#00FF00';
            document.getElementById('validate_length').innerHTML = 'كلمة المرور قوية';
            // $('button[type="submit"]').removeAttr("disabled");
        }
    }
    function valid_pass_copy()
    {
        if($("#memb_password").val() == $("#memb_password_copy").val()){
            document.getElementById('validate_copy').style.color = '#00FF00';
            document.getElementById('validate_copy').innerHTML = 'كلمة المرور متطابقة';
            // $('button[type="submit"]').removeAttr("disabled");
        }else{
            document.getElementById('validate_copy').style.color = '#F00';
            document.getElementById('validate_copy').innerHTML = 'كلمة المرور غير متطابقة';
            //$('button[type="submit"]').attr("disabled","disabled");
        }
    }
</script>


<script>

    function update_account_status(id) {

        var all_inputs = $('.account_form [data-validation="required"]');
        var valid = 1;
        var text_valid = "";
        all_inputs.each(function (index, elem) {
            console.log(elem.id + $(elem).val());
            if ($(elem).val().length >= 1) {
                $(elem).css("border-color", "");
            } else {
                valid = 0;
                $(elem).css("border-color", "red");
            }
        });
        var form_data = new FormData();
        form_data.append("save", 1);
        var serializedData = $('.account_form').serializeArray();
        $.each(serializedData, function (key, item) {
            form_data.append(item.name, item.value);
        });
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>md/all_gam3ia_omomia_members/Gam3ia_omomia_members/add_account_data/'+id,
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
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
                        title: "جاري التعديل ... ",
                        text: "",
                        imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                        showConfirmButton: false,
                        allowOutsideClick: false
                    });
                }
            },
            success: function (html) {
                swal({
                    title: 'تم تعديل  ',
                    type: 'success',
                    confirmButtonText: 'تم'
                });
                /*var all_inputs_set = $('.account_form .form-control');
                all_inputs_set.each(function (index, elem) {
                    console.log(elem.id + $(elem).val());
                });*/
            }
        });
    }
</script>

<script>
    function change_status_account(valu, id) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>md/all_gam3ia_omomia_members/Gam3ia_omomia_members/change_status_account",
            data: {valu: valu, id: id},
            success: function (msg) {
                var obj = JSON.parse(msg);
                var status = obj.status;
                console.log('status  ::'+status);
                $('#suspend').val(status);

            }

        });
    }
</script>
