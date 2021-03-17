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
<?php /*if($_SESSION['hidden_action']){ ?>
<style>
    input,select {
        pointer-events:none;
        color:#AAA;
        background:#F5F5F5;
    }

</style>
<?php } */?>

<?php
if (isset($result) && $result != null) {
    $user_name = $result[0]->user_name;
    $status = $result[0]->account_status;
    $id =$result[0]->id;
    $account_img=$result[0]->account_img;

} else{
    $user_name = '';
    $status = '';
    $account_img = '';

}
?>

<!--<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">-->
<div class="col-sm-12 col-md-12 col-xs-12 fadeInUp wow">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">
                <h4><?=$title?></h4>
            </div>
        </div>
        <?php echo form_open_multipart('osr/Family/account_setting',array('id'=>'account_setting_form','class'=>'account_setting_form')); ?>

        <div class="panel-body" >
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

                <div class="form-group col-md-2 col-sm-4 col-xs-12 padding-4">
                    <label class="label label-green">رفع صورة </label>
                    <input type="file" name="account_img" id="account_img" class="form-control"/>
                    <?php if (!empty($account_img)) { ?>
                        <small class="small" style="bottom:-13px; display: none;" id="empty_img">برجاء إرفاق صورة</small>
                        <div id="full_img">
                            <table class="table table-bordered " width="10px">
                                <tr>
                                    <td style="width: 30px;">
                                        <?php $mother_num = $_SESSION['mother_national_num']; ?>
                                        <?php if($_SESSION['hidden_action']){ ?>
                                        <a onclick=' swal({
                                                title: "هل انت متأكد من الحذف ؟",
                                                text: "",
                                                type: "warning",
                                                showCancelButton: true,
                                                confirmButtonClass: "btn-danger",
                                                confirmButtonText: "حذف",
                                                cancelButtonText: "إلغاء",
                                                closeOnConfirm: false
                                                },
                                                function(){
                                                swal("تم الحذف!", "", "success");
                                                delete_image_account(<?= $id ?>);
                                                });'>
                                            <i class="fa fa-trash"> </i></a>
                                        <?php }else{  echo "لا يمكن الحذف"; } ?>
                                    </td>
                                    <td style="width: 30px; text-align: center">
                                        <a href="<?php echo base_url() ?>uploads/images/<?php echo $account_img; ?>"
                                           download> <i class="fa fa-download"></i> </a>
                                    </td>
                                    <td style="width: 30px; text-align: center">
                                        <a href="#" data-toggle="modal"
                                           data-target="#myModal-view<?php echo $id; ?>"> <i
                                                    class="fa fa-eye"></i> </a></td>
                                </tr>
                            </table>
                        </div>

                        <div class="modal fade" id="myModal-view<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                    aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">صورة </h4>
                                    </div>
                                    <div class="modal-body">
                                        <img src="<?php echo base_url() ?>uploads/images/<?php echo $account_img; ?>"
                                             width="100%">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } else { ?>
                        <small class="small" style="bottom:-13px;" id="empty_img">برجاء إرفاق صورة</small>
                    <?php } ?>
                </div>

                <?php
                /*if ($status == 1) {
                    $status_checked= "checked";
                }else {
                    $status_checked="";
                }*/
                ?>


            </div>


            <?php if($_SESSION['hidden_action']){?>
            <div class="col-xs-12 no-padding" style="padding: 10px;">
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

                        <button type="button" id="buttons" class="btn btn-labeled btn-success " onclick="save_account()"
                                name="add" value="حفظ" >
                            <span class="btn-label"><i class="fa fa-floppy-o"></i></span>حفظ
                        </button>

                    </div>
                </div>
            </div>

        </div>
        <?php } ?>

        <?php echo form_close() ?>
    </div>
</div>






