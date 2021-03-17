

<div class="col-sm-12 col-md-12 col-xs-12 fadeInUp wow ">

    <div class="panel panel-default">

        <div class="panel-heading panel-title">

            بيانات العضوية

        </div>

        <div class="panel-body" id="show_last_edite">

            <div class="col-xs-12 padding-4">



                <div class="col-md-12">

                    <?php  echo form_open_multipart('gam3ia_omomia/Gam3ia_omomia/update_gam3ia_odwiat/' . $result->id . '', array('class' => 'odwia_form'));?>

                    <div class="form-group col-md-2 col-sm-4 padding-4">

                        <label class="label ">نوع العضوية </label>

                        <input type="text" name="no3_odwia_title" id="no3_odwia_title"

                               value="<?php  if(!empty($result->odwiat->no3_odwia_title)){ echo $result->odwiat->no3_odwia_title; }?>"

                               class="form-control " readonly>

                        <input type="hidden" name="no3_odwia_fk" id="no3_odwia_fk"

                               value="<?php  if(!empty($result->odwiat->no3_odwia_fk)){ echo $result->odwiat->no3_odwia_fk; }?>">





                    </div>

                    <div class="form-group col-md-1 col-sm-4 padding-4">

                        <label class="label ">رقم العضوية</label>

                        <input type="text" name="rkm_odwia_full" id="rkm_odwia_full"

                               value="<?php  if(!empty($result->odwiat->rkm_odwia_full)){ echo $result->odwiat->rkm_odwia_full; }?>"

                               class="form-control " readonly>

                    </div>

                    <div class="form-group col-md-1 col-sm-6 padding-4">

                        <label class="label "> رقم القرار </label>

                        <input type="text" name="qrar_rkm" id="qrar_num" onkeypress="validate_number(event)"

                               value="<?php  if(!empty($result->odwiat->qrar_rkm)){ echo $result->odwiat->qrar_rkm; } ?>"

                               class="form-control "  >

                    </div>



<div class="form-group col-sm-2 col-xs-12 padding-4">



       <label class="label ">تاريخ الإنضمام  (تاريخ القرار)</label>



                        <input type="date"  id="qrar_date" name="qrar_date" class="form-control bottom-input  "

   value="<?php  if(!empty($result->odwiat->qrar_date_m)){

                                   $str = strtotime($result->odwiat->qrar_date_m);

                                   echo date('Y-m-d',$str); }else{

                                     echo date('Y-m-d');

                                   }?>"

                               style=" width: 100%;float: right"

                               data-validation="required"  data-validation-has-keyup-event="true" />





</div>

                    <div class="form-group col-md-2 col-sm-6 padding-4">

                        <label class="label ">مبلغ الإشتراك السنوي </label>

                        <input type="text" name="subs_value" id="subs_year_value" onkeypress="validate_number(event)"

                               value="<?php if(!empty($result->odwiat->subs_value)){ echo $result->odwiat->subs_value; } ?>"

                               class="form-control " data-validation="required"  data-validation-has-keyup-event="true"   >

                    </div>

                    <div class="form-group col-md-2 col-sm-6 padding-4">

                        <label class="label ">تاريخ أخر إشتراك</label>



                        <input type="date"  id="subs_from_date_m" name="subs_from_date_m" class="form-control bottom-input  "

                               value="<?php  if(!empty($result->odwiat->subs_from_date_m)){

                                   $str = strtotime($result->odwiat->subs_from_date_m);

                                   echo date('Y-m-d',$str); }else{

                                     echo date('Y-m-d');

                                   }?>"

                               style=" width: 100%;float: right"

                               data-validation="required"  data-validation-has-keyup-event="true"  />



                    </div>

                    <div class="form-group col-md-2 col-sm-6 padding-4">

                        <label class="label ">تاريخ نهاية الإشتراك</label>



                        <input type="date"  id="subs_to_date_m" name="subs_to_date_m" class="form-control bottom-input  "



                               value="<?php  if(!empty($result->odwiat->subs_to_date_m)){

                                   $str = strtotime($result->odwiat->subs_to_date_m);

                                   echo date('Y-m-d',$str); }else{

                                     echo date('Y-m-d');

                                   }

                                   ?>"
onchange="get_day();"
                               style=" width: 100%;float: right"

                               data-validation="required"  data-validation-has-keyup-event="true" />





                    </div>

                    <div class="form-group col-md-2 col-sm-6 padding-4">

                        <label class="label ">طريقة السداد</label>

                        <select id="pay_method_id_fk" data-validation="required" class="form-control "

                                name="pay_method_fk" onchange="GetPayType(this.value)">

                            <option value="">إختر</option>

                            <?php

                            //  $pay_arr =array('','نقدي','تحويل','شيك','بنك');

                            $pay_arr =array('إختر',1=>'نقدي',2=>'شيك',3=>'شبكة',4=>'إيداع نقدي',5=>'إيداع شيك',6=>'تحويل',7=>'أمر مستديم');





                            for($s=1;$s<sizeof($pay_arr);$s++){

                                if(!empty($result->odwiat->pay_method_fk)) {

                                    if($s == $result->odwiat->pay_method_fk){

                                        $selected='selected';

                                    }else{ $selected='';}

                                }else{ $selected='';}



                                ?>

                                <option value="<?php echo $s;?>"  <?=$selected?> > <?php echo$pay_arr[$s];?></option >

                                <?php

                            }

                            ?>

                        </select>

                    </div>





                    <div class="form-group col-md-2 col-sm-6 padding-4">

                        <label class="label ">إسم البنك</label>

                        <select name="bank_id_fk" id="bank_id_fk" class="form-control"

                            <?php

                            $pay_method_fk = $result->odwiat->pay_method_fk;

                            if($pay_method_fk!=2 && $pay_method_fk !=4){ ?> disabled="disabled" <?php }?> aria-required="true">

                            <?php $yes_no = array('لا', 'نعم'); ?>

                            <option value="">إختر</option>

                            <?php



                            $bank_id_fk = $result->odwiat->bank_id_fk;

                            if (!empty($banks)) {

                                foreach ($banks as $bank) {

                                    $select = '';



                                    if(!empty($bank_id_fk)){

                                        if($bank_id_fk ==$bank->id){

                                            $select = 'selected';

                                        }

                                    }

                                    ?>

                                    <option value="<?php echo $bank->id; ?>"

                                        <?php echo $select; ?>><?php echo $bank->ar_name; ?></option>

                                <?php }

                            } ?>

                        </select>

                    </div>



                    <div class="form-group col-sm-4 col-xs-12 padding-4">

                        <label class="label ">رقم الحساب <small style="color: red;;">رقم الحساب لابد أن يكون 24 رقم</small></label>

                        <input type="text" name="rkm_hesab" id="bank_account_num"

                        <?php

                        if($pay_method_fk !=2 && $pay_method_fk !=4){ ?> disabled="disabled" <?php }?>   onkeyup="length_hesab_om($(this).val());"

                               value="<?php if(!empty($result->odwiat->rkm_hesab)){ echo $result->odwiat->rkm_hesab; }?>"

                               class="form-control  "

                               data-validation-has-keyup-event="true" >





                    </div>







<div class="form-group col-sm-2 col-xs-12 padding-4">



       <label class="label ">تاريخ التحديث </label>



                        <input type="text" readonly  id="update_date_m" name="update_date_m" class="form-control bottom-input  "



   value="<?php  if(!empty($result->odwiat->update_date_m)){

                                   $str = strtotime($result->odwiat->update_date_m);

                                   echo date('Y-m-d',$str); }else{

                                     //echo date('Y-m-d');
                                     echo   date("Y-m-d", strtotime(date("Y-m-d") . ' + 1 days'));

                                   }?>"

                               style=" width: 100%;float: right"

                               data-validation="required"  data-validation-has-keyup-event="true" />





</div>







                    <div class="col-xs-12 no-padding" style="padding: 10px;">



                        <div class="text-center">



                            <input type="hidden"  name="id"  id="id" value="<?php echo $result->id; ?>">

                            <button style="float: left;" type="button" id="buttons"  onclick="update_odwiat(<?=$result->id ?>);"

                                    class="btn btn-labeled btn-success" id="save" name="save" value="save"><span

                                        class="btn-label"><i class="fa fa-floppy-o"></i></span>حفظ البيانات

                            </button>

                        </div>



                    </div>

                    <?php echo form_close() ?>



                </div>





            </div>



        </div>

    </div>

</div>





<div class="col-sm-12 col-md-12 col-xs-12 fadeInUp wow ">

    <div class="panel panel-default">

        <div class="panel-heading panel-title">

            بيانات إشتراك آخر عضوية



        </div>

        <div class="panel-body" id="show_last_edite">

            <div class="col-xs-12 padding-4">



                <div class="col-md-12">

                    <?php  echo form_open_multipart('gam3ia_omomia/Gam3ia_omomia/update_gam3ia_last_odwiat/' . $result->id . '', array('class' => 'last_odwia_form'));?>

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

                               value="<?php  if(!empty($result->last_odwiat->pay_date)){

                                echo $result->last_odwiat->pay_date;

                                 }else{

                                    echo date('Y-m-d');

                                 }?>"

                                 style=" width: 100%;float: right"  />

                    </div>





                    <div class="form-group col-md-2 col-sm-6 padding-4">

                        <label class="label ">طريقة السداد</label>

                        <select id="pay_method_fk"  class="form-control " name="pay_method_fk" >

                            <option value="">إختر</option>

                            <?php

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



                      

                       <!-- <select id="eshtrak_years"  name="eshtrak_years[]" multiple

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

                        </select>-->

                    </div>





                        <div class="col-xs-12 no-padding" style="padding: 10px;">



                        <div class="text-center">



                            <button style="float: left;" type="button" id="buttons"  onclick="update_last_odwiat(<?=$result->id ?>);"

                                    class="btn btn-labeled btn-success" id="add" name="add" value="add"><span

                                        class="btn-label"><i class="fa fa-floppy-o"></i></span>حفظ البيانات

                            </button>

                        </div>



                    </div>

                    <?php echo form_close() ?>



                </div>





            </div>



        </div>

    </div>

</div>



<!--

<div class="col-sm-12 col-md-12 col-xs-12 fadeInUp wow ">

    <div class="panel panel-default">

        <div class="panel-heading panel-title">

            الملاحظات



        </div>

        <div class="panel-body" id="show_edite">

            <div class="col-md-12">

                <?php  echo form_open_multipart('gam3ia_omomia/Gam3ia_omomia/update_gam3ia_member/' . $result->id . '', array('class' => 'Electronic_form'));?>

                <div class="form-group col-md-5 col-sm-6 padding-4">

                    <label class="label">ملاحظات</label>

                    <textarea type="text" name="note" id="note"

                              class="form-control "

                    ><?php echo $result->note; ?></textarea>

                    <input type="hidden"  name="id"  id="id" value="<?php echo $result->id; ?>">

                    <input type="hidden"  name="note_save"  id="note_save" value="">



                </div>

                <div class="col-xs-12 no-padding" style="padding: 10px;">



                    <div class="text-center">

                        <button type="button" id="buttons"  onclick="  update_Electronic(<?=$result->id ?>);"

                                class="btn btn-labeled btn-success" id="save" name="note_save" value="save"><span

                                    class="btn-label"><i class="fa fa-floppy-o"></i></span>إرسال

                        </button>

                    </div>



                </div>

                <?php echo form_close() ?>



            </div>





        </div>

    </div>

</div>

-->



<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>

<script>



    function update_odwiat(id) {



        var all_inputs = $(' .odwia_form [data-validation="required"]');

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

        var serializedData = $('.odwia_form').serializeArray();

        $.each(serializedData, function (key, item) {

            form_data.append(item.name, item.value);

        });

        $.ajax({

            type: 'post',

            url: '<?php echo base_url() ?>gam3ia_omomia/Gam3ia_omomia/update_gam3ia_odwiat',

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

                var all_inputs_set = $('.odwia_form .form-control');

                all_inputs_set.each(function (index, elem) {

                    console.log(elem.id + $(elem).val());

                });

            }

        });

    }





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

        var serializedData = $('.last_odwia_form').serializeArray();

        $.each(serializedData, function (key, item) {

            form_data.append(item.name, item.value);

        });

        $.ajax({

            type: 'post',

            url: '<?php echo base_url() ?>gam3ia_omomia/Gam3ia_omomia/update_gam3ia_last_odwiat',

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



    function update_Electronic(id) {



        var all_inputs = $(' [data-validation="required"]');

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



        var serializedData = $('.Electronic_form').serializeArray();

        $.each(serializedData, function (key, item) {

            form_data.append(item.name, item.value);

        });

        $.ajax({

            type: 'post',

            url: '<?php echo base_url() ?>gam3ia_omomia/Gam3ia_omomia/update_odowia_details',

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

                    title: 'تم تعديل  ',

                    type: 'success',

                    confirmButtonText: 'تم'

                });

                var all_inputs_set = $('.Electronic_form .form-control');

                all_inputs_set.each(function (index, elem) {

                    console.log(elem.id + $(elem).val());

                    // $(elem).val('');



                    // get_details();

                    // get_add();

                });

                if (html == 1) {



                    //get_data('manzel');

                    // show_tab('manzel');

                }

            }

        });

    }

</script>







<script>

    function GetPayType(valu) {

        if(valu ==6 || valu ==7 ){

            document.getElementById("bank_id_fk").removeAttribute("disabled", "disabled");

            document.getElementById("bank_id_fk").setAttribute("data-validation", "required");

            document.getElementById("bank_account_num").removeAttribute("disabled", "disabled");

            document.getElementById("bank_account_num").setAttribute("data-validation", "required");

        } else {

            document.getElementById("bank_id_fk").value='';

            document.getElementById("bank_account_num").value='';

            document.getElementById("bank_id_fk").setAttribute("disabled", "disabled");

            document.getElementById("bank_id_fk").removeAttribute("data-validation", "required");

            document.getElementById("bank_account_num").setAttribute("disabled", "disabled");

            document.getElementById("bank_account_num").removeAttribute("data-validation", "required");



        }



    }

</script>



<script>

    function length_hesab_om(length) {

        var len = length.length;



        if (len < 24) {

            document.getElementById("save").setAttribute("disabled", "disabled");

        }

        else if (len > 24) {

            document.getElementById("save").setAttribute("disabled", "disabled");

        }

        else  if (len == 24) {

            document.getElementById("save").removeAttribute("disabled", "disabled");

        }

    }

</script>

<script>

function get_day() {



var date = new Date(document.getElementById("subs_to_date_m").value);
                day = date.addDays(1).getDate();
                month = date.addDays(1).getMonth() + 1;
                year = date.addDays(1).getFullYear();
                document.getElementById("update_date_m").value = month + '/' + day + '/' +year  ;

}
</script>
<script type="text/javascript">
        Date.prototype.addDays = function (days) {
            var date = new Date(this.valueOf());

            time1 = Math.abs(date.getTime());

            time2 = 1000 * 3600 * 24 * days;

            total = time1 + time2;

            date = new Date(total);

            return date;
        }
    </script>
        <!-- echo   date("m/d/Y", strtotime(date("m/d/Y") . ' + 1 days')); -->