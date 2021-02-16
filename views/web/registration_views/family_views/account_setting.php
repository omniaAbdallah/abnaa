<style>
    label.label-green {
        height: auto;
        line-height: unset;
        font-size: 14px !important;
        font-weight: 600 !important;
        text-align: right !important;
        margin-bottom: 0;
        background-color: transparent;
        color: #002542;
        border: none;
        padding-bottom: 0;
        font-weight: bold;
    }

    .half {
        width: 100% !important;
        float: right !important;
    }

    .input-style {
        border-radius: 0px;
        border-right: 1px solid #eee;
    }

    .form-group {
        margin-bottom: 0px;
    }

    .bootstrap-select > .btn {
        width: 100%;
        padding-right: 5px;
    }

    .bootstrap-select.btn-group .dropdown-toggle .caret {
        right: auto !important;
        left: 4px;
    }

    .bootstrap-select.btn-group .dropdown-toggle .filter-option {
        font-size: 15px;
    }

    /*	.form-control{
            font-size: 15px;
            color: #000;
            border-radius: 4px;
            border: 2px solid #b6d089 !important;
        }*/
    .form-control:focus {
        border: 2px solid #b6d089;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        box-shadow: 2px 2px 2px 1px #beffc3;
    }

    .has-success .form-control {
        border: 2px solid #b6d089;

        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
    }

    .has-success .form-control:focus {
        border: 2px solid #b6d089;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        box-shadow: 2px 2px 2px 1px #beffc3;
    }

    .nav-tabs > li > a {
        color: #222;
        font-weight: 500;
        background-color: #e6e6e6;
        font-size: 15px;
    }

    .tab-content {
        margin-top: 15px;
    }

    /******/
    .inner-heading {
        background-color: #9ed6f3;
        padding: 10px;
    }

    .pop-text {
        background-color: #009688;
        color: #fff;
        padding: 7px;
        font-size: 14px;
        margin-bottom: 3px;
        margin-top: 3px;
    }

    .pop-text1 {
        background-color: #eee;
        padding: 7px;
        font-size: 14px;
        margin-bottom: 3px;
        margin-top: 3px;
    }

    .pop-title-text {
        margin-top: 4px;
        margin-bottom: 4px;
        padding: 6px;
        background-color: #9ed6f3;
    }

    .span-validation {
        color: rgb(255, 0, 0);
        font-size: 12px;
        position: absolute;
        bottom: -10px;
        right: 50%;
    }

    .astric {
        color: red;
        font-size: 25px;
        position: absolute;
    }

    .help-block.form-error {
        color: #a94442 !important;
        font-size: 11px !important;
        position: absolute !important;
        bottom: -23px !important;
        right: 50% !important;
    }
</style>

<?php
if (isset($result) && $result != null) {
    $user_name = $result[0]->user_name;
    $status = $result[0]->account_status;

} else{
    $user_name = '';
    $status = '';

}
?>

<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
    <div class="panel-heading">
        <h3 class="panel-title"></h3>
    </div>
    <?php echo form_open_multipart('registration/Family/account_setting',array('id'=>'account_setting_form','class'=>'account_setting_form')); ?>

    <div class="panel-body" style="height: 100px;">
        <div class="col-sm-12 col-xs-12">

            <div class=" form-group col-md-3 col-sm-3 padding-4">
                <label class="label label-green  ">إسم المستخدم </label>
                <input type="text" name="user_name" id="user_name" class="form-control " placeholder="أدخل البيانات"
                       value="<?=$user_name?>"   data-validation="required">
            </div>
            <div class=" form-group col-md-2 col-sm-2 padding-4">
                <label class="label label-green  ">كلمة المرور  </label>
                <input type="password" name="user_password" onkeyup="valid_pass_length();" id="user_password" class="form-control"  />
                <span  id="validate_length" class="span-validation"> </span>
            </div>
            <div class=" form-group col-md-2 col-sm-2 padding-4">
                <label class="label label-green  ">تأكيد كلمة المرور <strong></strong> </label>
                <input type="password"   id="user_password_copy" onkeyup="return valid_pass_copy();" class="form-control"  />
                <span  id="validate_copy" class="span-validation"> </span>
            </div>

            <?php
            /*if ($status == 1) {
                $status_checked= "checked";
            }else {
                $status_checked="";
            }*/
            ?>
            <!--<div class="form-group col-md-2 col-sm-4 col-xs-12 padding-4">
                <label class="label ">الحاله</label>
                <div class="toggle-example">
                    <input type="hidden" id="status_hidden"  value="<?=$status?>"/>
                    <input id="checkbox_toggle" class="checkbox_toggle" type="checkbox" <?=$status_checked?> data-toggle="toggle"
                           onchange="change_status_account($('#status_hidden').val(),<?=$result[0]->id?>)"
                           data-onstyle="success" data-offstyle="danger" data-size="mini"
                           style="height: 31px; width: 30px;">
                </div>
            </div>-->


        </div>
    </div>

<!--    <input type="hidden"  name="add" id="add" value="add">-->
    <div class="col-xs-12 no-padding">
        <div class="panel-footer">
            <div class="text-center">
                <?php if (isset($result) && $result != null) {
                    $input_name1 = 'update';
                    $input_name2 = 'update_save';
                } else {
                    $input_name1 = 'add';
                    $input_name2 = 'add_save';
                }
                ?>
                <!-- <button type="button" class="btnPrevious btn btn-labeled btn-warning" style="font-size: 16px;"><span class="btn-label"><i class="fa fa-chevron-right"></i></span>السابق  </button>
                <button type="button" class="btnNext  btn btn-labeled btn-warning" style="font-size: 16px;">التالى <span class="btn-label" style="right: auto;left: -14px;"><i class="fa fa-chevron-left"></i></span> </button> -->

                <button type="button" id="buttons" class="btn btn-labeled btn-success " onclick="save_account()"
                        name="add" value="حفظ" disabled="disabled">
                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                </button>

            </div>
        </div>
    </div>

    <?php echo form_close() ?>

</div>


<script>

    function save_account() {
        // $('#registerForm').serialize(),
        var all_inputs = $(' .account_setting_form [data-validation="required"]');
        var valid = 1;
        var text_valid = "";
        all_inputs.each(function (index, elem) {
            console.log(elem.id + $(elem).val());
            if ($(elem).val().length >= 1 ) {
                // valid=1;
                $(elem).css("border-color", "");
            } else {
                valid = 0;
                $(elem).css("border-color", "red");
            }
        });

        //$('#account_setting_form').serialize()
        var form_data = new FormData();
        form_data.append('add', 'add');
       var serializedData = $('#account_setting_form').serializeArray();
        $.each(serializedData, function (key, item) {
            //console.log(item.name+': ' + item.value);
            form_data.append(item.name, item.value);

        });


        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>registration/Family/account_setting',
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
                $('button[type="button"]').attr("disabled","disabled");
                $('#user_password_copy').val('');
                /* var all_inputs_set = $('.wakel_form .form-control');

                all_inputs_set.each(function (index, elem) {
                    console.log(elem.id + $(elem).val());
                    $(elem).val('');
                });
                */
                $('#add').val('');
                if (html == 1){
                    show_tab('account_setting');
                }

            }
        });
    }


</script>

<script>
    /*
    function change_status_account(valu, id) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>registration/Family/change_status_account",
            data: {valu: valu, id: id},
            success: function (msg) {
                var obj = JSON.parse(msg);
                var status = obj.status;
                console.log('status  ::'+status);
                $('#status_hidden').val(status);

            }

        });
    }
*/
</script>

<script>
    function valid_pass_copy()
    {
        if($("#user_password").val() == $("#user_password_copy").val()){
            document.getElementById('validate_copy').style.color = '#00FF00';
            document.getElementById('validate_copy').innerHTML = 'كلمة المرور متطابقة';
            $('button[type="button"]').removeAttr("disabled");
        }else{
            document.getElementById('validate_copy').style.color = '#F00';
            document.getElementById('validate_copy').innerHTML = 'كلمة المرور غير متطابقة';
            $('button[type="button"]').attr("disabled","disabled");
        }
    }
</script>



