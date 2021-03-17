<style>

    /**************************/

    /* 27-1-2019 */

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

    .form-group col-md-2 padding-4  {

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

    /*   .form-control{

           font-size: 15px;

           color: #000;

           border-radius: 4px;

           border: 2px solid #b6d089 !important;

       }*/

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

    .nav-tabs>li>a {

        color: #222;

        font-weight: 500;

        background-color: #e6e6e6;

        font-size: 15px;

    }

    .tab-content {

        margin-top: 15px;

    }

    /**************************/

    .inner-heading {

        background-color: #9ed6f3;

        padding: 10px;

    }

    .pop-text{

        background-color: #009688;

        color: #fff;

        padding: 7px;

        font-size: 14px;

        margin-bottom: 3px;

        margin-top: 3px;

    }

    .pop-text1{

        background-color:#eee;

        padding: 7px;

        font-size: 14px;

        margin-bottom: 3px;

        margin-top: 3px;

    }

    .pop-title-text{

        margin-top: 4px;

        margin-bottom: 4px;

        padding: 6px;

        background-color: #9ed6f3;

    }

    .span-validation{

        color: rgb(255, 0, 0);

        font-size: 12px;

        position: absolute;

        bottom: -10px;

        right: 50%;

    }

    .astric{

        color: red;

        font-size: 25px;

        position: absolute;

    }

    .help-block.form-error{

        color: #a94442  !important;

        font-size: 15px !important;

        position: absolute !important;

        bottom: -23px !important ;

        right: 50% !important ;

    }

</style>





<?php
/*
$this->load->model("familys_models/Register");

$data_load["basic_data_family"] = $basic_data_family;

$data_load["mother_num"] = $this->uri->segment(4);

$data_load["person_account"] = $basic_data_family["person_account"];

$data_load['FamilyOperationsPermissions'] = $this->Register->getFamilyOperationsPermissions()[0];

$data_load["agent_bank_account"] = $basic_data_family["agent_bank_account"];

$data_load["file_num"] = $basic_data_family["file_num"];

$data_load["employees"] = $employees;

$this->load->view('admin/familys_views/drop_down_button', $data_load);

*/

 ?>
 <?php if (!empty($from_page)) {
    $data_load["basic_data_family"] = $basic_data_family;
    $data_load["mother_num"] = $basic_data_family['mother_national_num'];
    $data_load["file_num"] = $basic_data_family["file_num"];
    $this->load->view('admin/familys_views/drop_down_bahth', $data_load);
}else {
    $this->load->model("familys_models/Register");
    $data_load["basic_data_family"] = $basic_data_family;
    $data_load["mother_num"] = $this->uri->segment(4);
    $data_load["person_account"] = $basic_data_family["person_account"];
    $data_load['FamilyOperationsPermissions'] = $this->Register->getFamilyOperationsPermissions()[0];
    $data_load["agent_bank_account"] = $basic_data_family["agent_bank_account"];
    $data_load["file_num"] = $basic_data_family["file_num"];
    $data_load["employees"] = $employees;
    $this->load->view('admin/familys_views/drop_down_button', $data_load);
} ?>

<div class="col-sm-12">

    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">

        <div class="panel-heading">

            <h3 class="panel-title"><?php echo $title; ?>

            </h3>



        </div>

        <?php ?>



        <div class="panel-body">



            <?php

            if (empty($table) && $table == null){



                 if (isset($result) && !empty($result)){

                     $required ='';

                     $user_name = $result->user_name;

                     $suspend_account = $result->account_status;

                     echo form_open('family_controllers/Family/update_family_account/'.$result->mother_national_num );



                 } else{

                     $required ='data-validation="required"';

                     $user_name = '';

                     $suspend_account = '';

                     echo form_open('family_controllers/Family/family_account/'.$mother_national_num);

                 }



                ?>



            <div class="col-xs-12">



            <div class="col-md-3 padding-4">

                <label class="label label-green  ">إسم المستخدم </label>

                <input type="text" name="user_name" class="form-control  input-style" placeholder="أدخل البيانات"

                       value="<?php echo $user_name;?>"   data-validation="required">

            </div>

            <div class=" col-md-3 padding-4">

                <label class="label label-green  ">كلمة المرور  </label>

                <input type="password" name="user_password" onkeyup="valid_pass_length();" id="user_password" class="form-control  input-style" <?php echo $required?> />

                <span  id="validate_length" class="span-validation"> </span>

            </div>

            <div class=" col-md-3 padding-4">

                <label class="label label-green  ">تأكيد كلمة المرور <strong></strong> </label>

                <input type="password"   id="user_password_copy" onkeyup="return valid_pass_copy();" class="form-control  input-style"    <?php echo $required?> />

                <span  id="validate_copy" class="span-validation"> </span>

            </div>

            <div class="   col-md-3 padding-4">

                <label class="label label-green  "> حالة الأكونت </label>

                <select class="form-control" name="suspend_account"  data-validation="required">

                    <?php  $suspend_arr = array('1' =>' مفعل' , '2' => 'غير مفعل') ; ?>

                    <option value=""> اختر</option>

                    <?php

                    foreach ($suspend_arr as $key=>$value){

                        ?>

                        <option value="<?= $key?>" <?php

                        if ($key == $suspend_account) { echo 'selected';}?>><?= $value?></option>

                    <?php

                    }

                    ?>



                </select>



            </div>

            <div class="clearfix"></div><br>

            <div class="col-md-12 col-xs-12 text-center ">



                <button type="submit" id="buttons" class="btn btn-labeled btn-success " name="add" value="حفظ">

                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ

                </button>







            </div>



            </div>

                <?php

                echo form_close();

            }

            ?>

            <?php

            if (isset($table) && !empty($table)){

                ?>

                <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

                    <thead>

                    <tr>

                        <th class="text-center">إسم المستخدم</th>

                        <th class="text-center">الاجراء</th>

                    </tr>

                    </thead>

                    <tbody class="text-center">



                    <tr>

                        <td><?= $table->user_name?></td>

                        <td>

                            <a href="<?= base_url().'family_controllers/Family/update_family_account/'.$table->mother_national_num?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>

                        </td>



                    </tr>

                    </tbody>

                </table>



                <?php



            }

            ?>

        </div>

        <?php //echo form_close()?>

    </div>



</div>







<script>

    function valid_pass_length()

    {

        if($("#user_password").val().length < 4){

            document.getElementById('validate_length').style.color = '#F00';

            document.getElementById('validate_length').innerHTML = 'كلمة المرور اكثر من اربع حروف';

            $('button[type="submit"]').attr("disabled","disabled");

        }else if($("#user_password").val().length > 4 &&  $("#user_password").val().length < 10){

            document.getElementById('validate_length').style.color = '#F00';

            document.getElementById('validate_length').innerHTML = 'كلمة المرور ضعيفة';

            $('button[type="submit"]').attr("disabled","disabled");

        }else if($("#user_password").val().length > 10){

            document.getElementById('validate_length').style.color = '#00FF00';

            document.getElementById('validate_length').innerHTML = 'كلمة المرور قوية';

            $('button[type="submit"]').removeAttr("disabled");

        }

    }

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