<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
<script src="https://rawgit.com/bguzmanrio/maskjs/master/js/mask.js"></script>
<style>

    .nonactive{
        pointer-events: none;
        cursor: not-allowed;
    }

    .form-group {
        margin-bottom: 0px !important;
    }
    .modal-header {
        padding: 5px 15px;
    }

    table .form-control {
        padding: 0px 0px;
        /* height: 26px; */
        font-size: 18px;
    }
    .bootstrap-select.btn-group:not(.input-group-btn), .bootstrap-select.btn-group[class*=col-] {
        width: 100%;
    }


    #check_all_not {
        display: inline-block;
        width: 20px;
        height: 20px;
    }

    .check_all_not {
        display: inline-block;
        width: 20px;
        height: 20px;
    }



    .check_large2{
        width: 18px;
        height: 18px;
    }
    .check_large{
        width: 18px;
        height: 18px;
    }
    label.checktitle {
        margin-top: -24px;
        display: block;
        margin-right: 24px;
    }


    .table-pd,
    .table-pd>tbody>tr>td,
    .table-pd>tbody>tr>th,
    .table-pd>tfoot>tr>td,
    .table-pd>tfoot>tr>th,
    .table-pd>thead>tr>td,
    .table-pd>thead>tr>th {
        border: 1px solid #ddd;
        padding: 2px 8px;

    }
    .table > thead > tr > th,
    .table > tfoot > tr > th,
    .table > thead > tr > td,
    .table > tfoot > tr > td {
        font-size: 18px ;
        font-weight: bold ;
    }
    .table > tbody > tr > th,
    .table > tbody > tr > td{

        font-size: 16px ;

    }


    @media (min-width: 768px){
        .modal-dialog {

            margin: 10% auto;
        }

        .col_md_15{
            width: 15%;
            float:right;
        }
        .col_md_20{
            width: 20%;
            float:right;
        }
        .col_md_25{
            width: 25%;
            float:right;
        }
        .col_md_30{
            width: 30%;
            float:right;
        }
        .col_md_32{
            width: 32%;
            float:right;
        }
        .col_md_35{
            width: 35%;
            float:right;
        }
        .col_md_40{
            width: 40%;
            float:right;
        }
        .col_md_45{
            width: 45%;
            float:right;
        }
        .col_md_50{
            width: 50%;
            float:right;
        }
        .col_md_55{
            width: 55%;
            float:right;
        }
        .col_md_60{
            width: 60%;
            float:right;
        }
        .col_md_65{
            width: 65%;
            float:right;
        }
        .col_md_68{
            width: 68%;
            float:right;
        }
        .col_md_70{
            width: 70%;
            float:right;
        }

        .col_md_75{
            width: 75%;
            float:right;
        }

        .col_md_80{
            width: 80%;
            float:right;
        }

        .col_md_85{
            width: 85%;
            float:right;
        }
        .col_md_90{
            width: 90%;
            float:right;
        }
        .col_md_95{
            width: 95%;
            float:right;
        }
        .col_md_100{
            width: 100%;
            float:right;
        }
    }

    .modal-body {
        position: relative;
        padding: 5px 15px;
    }
    .modal-footer {
        padding: 5px 15px;
    }

    .fixed-table {
        table-layout: fixed;
    }
    /**************************/
    /* 27-1-2019 */
    label.label-green {
        height: auto;
        line-height: unset;
        font-size: 18px !important;
        font-weight: 600 !important;
        text-align: right !important;
        margin-bottom: 0;
        background-color: transparent;
        color: #002542;
        border: none;
        padding-bottom: 0;
        font-weight: bold;
        float: right;
        display: block;
        width: 100%;
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
    .bootstrap-select>.btn {
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
    .form-control{
        font-size: 16px;
    }
    .form-control:focus {
        border: 2px solid #b6d089;
        -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
        box-shadow: 2px 2px 2px 1px #beffc3;
    }
    .has-success .form-control {
        border: 2px solid #b6d089;

        -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    }
    .has-success  .form-control:focus {
        border: 2px solid #b6d089;
        -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
        box-shadow: 2px 2px 2px 1px #beffc3;
    }

    .tab-content {
        margin-top: 15px;
    }
    .btn-group .dropdown-menu > li > a {
        color: #0f0f0f;
        font-weight: 600;
        padding: 5px 5px;
    }
    .btn-group .dropdown-menu {
        left: 0;
        right: auto;
    }


</style>

<?php
if (isset($main_data) && !empty($main_data)){

    echo form_open_multipart('family_controllers/Family/update_account_data/'.$main_data->mother_national_num);

    $user_name = $main_data->user_name;
    $status = $main_data->account_status;

} else{
    $user_name = '';
    $status = '';

}
?>
<?php
$this->load->model("familys_models/Register");
$data_load["basic_data_family"] = $basic_data_family;
$data_load["mother_num"] = $this->uri->segment(4);
$data_load["person_account"] = $basic_data_family["person_account"];
$data_load['FamilyOperationsPermissions'] = $this->Register->getFamilyOperationsPermissions()[0];
$data_load["agent_bank_account"] = $basic_data_family["agent_bank_account"];
$data_load["file_num"] = $basic_data_family["file_num"];
$data_load["employees"] = $employees;
$this->load->view('admin/familys_views/drop_down_button', $data_load); ?>
<div class="col-xs-12 ">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title ?> </h3>
        </div>
        <div class="panel-body">
            <div class="col-md-12">
<!--                <div class="sidebar" style="padding: 10px">-->
                    <!--<div class=" form-group padding-4 text-center">
                        <img src="<?php echo base_url()?>asisst/admin_asset/img/logo.png" style="width: 150px;height: 150px;margin: auto">
                    </div>-->
                    <div class=" form-group col-md-3 col-sm-3 padding-4">
                        <label class="label label-green  ">إسم المستخدم </label>
                        <input type="text" name="user_name" class="form-control " placeholder="أدخل البيانات"
                               value="<?= $user_name?>"   data-validation="required">
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
                    if ($status == 1) {
                        $status_checked= "checked";
                    }else {
                        $status_checked="";
                    }
                    ?>
                    <div class="form-group col-sm-2 col-xs-12">
                        <label class="label ">الحاله</label>
                        <div class="toggle-example">
                            <input type="hidden" id="status_hidden"  value="<?=$status?>"/>
                            <input id="checkbox_toggle" class="checkbox_toggle" type="checkbox" <?=$status_checked?> data-toggle="toggle"
                                   onchange="change_status_account($('#status_hidden').val(),<?=$main_data->id?>)"
                                   data-onstyle="success" data-offstyle="danger" data-size="mini">
                        </div>
                    </div>

                </div>

                <div class="col-md-12">
                    <div class=" form-group padding-4 text-center">
                        <br>
                        <button type="submit"  class="btn btn-labeled btn-success " name="edit_user" value="edit_user"   style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                        </button>
                    </div>
                </div>


<!--            </div>-->


        </div>
    </div>
</div>


<?php
echo  form_close();
?>

<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/analogue-time-picker.js"></script>


<script>
    function change_status_account(valu, id) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>family_controllers/Family/change_status_account",
            data: {valu: valu, id: id},
            success: function (msg) {
                var obj = JSON.parse(msg);
                var status = obj.status;
                console.log('status  ::'+status);
                $('#status_hidden').val(status);

            }

        });
    }

</script>

<script>
    timePickerInput({
        inputElement: document.getElementById("m12h"),
        mode: 12,
        // time: new Date()
    });
</script>

<script>
    timePickerInput({
        inputElement: document.getElementById("m13h"),
        mode: 12,
        // time: new Date()
    });
</script>
<script>
    function valid_pass_copy()
    {
        if($("#user_password").val() == $("#user_password_copy").val()){
            document.getElementById('validate_copy').style.color = '#00FF00';
            document.getElementById('validate_copy').innerHTML = 'كلمة المرور متطابقة';
            $('button[type="submit"]').removeAttr("disabled");
        }else{
            document.getElementById('validate_copy').style.color = '#F00';
            document.getElementById('validate_copy').innerHTML = 'كلمة المرور غير متطابقة';
            $('button[type="submit"]').attr("disabled","disabled");
        }
    }
</script>

