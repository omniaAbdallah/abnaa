
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
            <div class="col-md-12">
                <?php

                $out['form'] = 'md/all_gam3ia_omomia_odwiat/Gam3ia_omomia_odwiat/add_last_odwiat_data/' . $result->id;
                ?>
                <?php echo form_open_multipart($out['form'], array("class"=>"last_odwia_form")); ?>

                <div class="form-group col-md-2 col-sm-4 padding-4">
                    <label class="label ">المبلغ </label>
                    <input type="number" name="value" id="value" onkeypress="validate_number(event)"
                           value="<?php  if(!empty($result->last_odwiat->value)){ echo $result->last_odwiat->value; }?>" data-validation="required"
                           class="form-control " >
                </div>
                <div class="form-group col-md-2 col-sm-4 padding-4">
                    <label class="label ">رقم الإيصال </label>
                    <input type="number" name="rkm_esal" id="rkm_esal"
                           value="<?php  if(!empty($result->last_odwiat->rkm_esal)){ echo $result->last_odwiat->rkm_esal; }?>"
                           class="form-control " >
                </div>
                <div class="form-group col-md-2 col-sm-4 padding-4">
                    <label class="label"> تاريخ السداد </label>
                    <input type="date"  id="pay_date" name="pay_date" class="form-control bottom-input  "
                           value="<?php  if(!empty($result->last_odwiat->pay_date)){ echo $result->last_odwiat->pay_date; }?>"
                           style=" width: 100%;float: right"  />
                </div>


                <div class="form-group col-md-2 col-sm-6 padding-4">
                    <label class="label ">طريقة السداد</label>
                    <select id="pay_method_fk"  class="form-control " name="pay_method_fk" >
                        <option value="">إختر</option>
                        <?php
                        $pay_arr =array('إختر',1=>'نقدي',2=>'شيك',3=>'شبكة',4=>'إيداع نقدي',5=>'إيداع شيك',6=>'تحويل',7=>'أمر مستديم');

                        for($s=1;$s<sizeof($pay_arr);$s++){
                            ?>
                            <option value="<?php echo $s;?>"
                                <?php  if(!empty($result->last_odwiat->pay_method_fk)){ if($s == $result->last_odwiat->pay_method_fk){ echo 'selected'; } }
                                ?>> <?php echo$pay_arr[$s];?></option >
                            <?php
                        }
                        ?>
                    </select>
                </div>

        <div class="form-group col-md-2 col-sm-6 padding-4">
                        <label class="label "> الإشتراك من عام إلي عام</label>
      
                            <!--<input  type="text" name="full_name" class="form-control  input-style" placeholder="أدخل البيانات"
                                    data-validation="required">-->

                            <input type="number" name="from_y"  value="<?php  if(!empty($result->last_odwiat->from_y)){
                                echo $result->last_odwiat->from_y;
                                 }else{
                                    echo date('Y');
                                 }?>" class="form-control  input-style error" placeholder="من عام"
                        style="float: right; width: 50%; border-color: rgb(185, 74, 72);"/>

                  <input type="number" name="to_y" value="<?php  if(!empty($result->last_odwiat->to_y)){
                                echo $result->last_odwiat->to_y;
                                 }else{
                                    echo date('Y');
                                 }?>" class="form-control  input-style error" placeholder="إلي عام"
                        style="float: left; width: 50%; border-color: rgb(185, 74, 72);"/> 

                    </div>
                <!--<div class="form-group col-md-2 col-sm-6 padding-4">
                    <label class="label "> الأشتراك لأعوام</label>
                    <select id="eshtrak_years"  name="eshtrak_years[]" multiple
                            title="يمكنك إختيار أكثر من عام" data-show-subtext="true"
                            class=" no-padding form-control   selectpicker  " data-live-search="true"
                            data-actions-box="true" >
                        <?php
                        $yearArray = range(2000, 2050);

                        $eshtrak_years_array = $result->last_odwiat->eshtrak_years['eshtrak_years'];
                        if(!empty($eshtrak_years_array)) {
                            $array_values = array_values($eshtrak_years_array);
                        }

                        foreach ($yearArray as $year) {
                            // if you want to select a particular year
                            if(!empty($eshtrak_years_array)) {
                                if(in_array($year,$array_values)){
                                    $selected='selected';
                                }else{ $selected='';}
                            }else{ $selected='';}

                            echo '<option '.$selected.' value="'.$year.'">'.$year.'</option>';
                        }
                        ?>
                    </select>
                </div>-->


                <div class="col-xs-12 no-padding" style="padding: 10px;">

                <div class="text-center">

                    <button type="button" id="buttons"  onclick="update_last_odwiat(<?=$result->id ?>);"
                            class="btn btn-labeled btn-success" id="add" name="add" value="add"><span
                                class="btn-label"><i class="fa fa-floppy-o"></i></span>حفظ
                    </button>
                </div>

            </div>
            </div>
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

    function update_last_odwiat(id) {

        var all_inputs = $(' .last_odwia_form [data-validation="required"]');
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
        form_data.append('member_id_fk', id);
        form_data.append('add', 1);
        var serializedData = $('.last_odwia_form').serializeArray();
        $.each(serializedData, function (key, item) {
            form_data.append(item.name, item.value);
        });
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>md/all_gam3ia_omomia_odwiat/Gam3ia_omomia_odwiat/add_last_odwiat_data/'+id,
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
                        title: "جاري الحفظ ... ",
                        text: "",
                        imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                        showConfirmButton: false,
                        allowOutsideClick: false
                    });
                }
            },
            success: function (html) {
                swal({
                    title: 'تم الحفظ  ',
                    type: 'success',
                    confirmButtonText: 'تم'
                });
                var all_inputs_set = $('.last_odwia_form .form-control');
                all_inputs_set.each(function (index, elem) {
                    console.log(elem.id + $(elem).val());
                });
            }
        });
    }

</script>

