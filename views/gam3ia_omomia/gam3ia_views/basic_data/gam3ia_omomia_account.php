
   <div class="col-sm-12 col-md-12 col-xs-12 fadeInUp wow ">
    <div class="panel panel-default">
        <div class="panel-heading panel-title">
         بيانات حسابى

        </div>
        <div class="panel-body" >

                                <?php
                              // echo '<pre>'; print_r($result);
                                if (isset($result) && !empty($result)) {
                                   
                                    // yara
                                    $user_name=$result->memb_user_name;
                                    $user_password=$result->memb_password;
                                    $suspend=$result->suspend;
                                   
                                  //  echo '<input type="hidden"  name="id"  id="id" value="' . $result->id . '">';
                                    //echo form_open_multipart('gam3ia_omomia/Gam3ia_omomia/update_gam3ia_member/' . $result->id . '', array('class' => 'Electronic_form'));
                                  //  $out['form'] = 'gam3ia_omomia/Gam3ia_omomia/update_gam3ia_member/' . $result->id;                            

                                } else {
                                    $user_name='';
                                    $user_password='';
                                    $suspend='';
                                    echo form_open_multipart('gam3ia_omomia/Gam3ia_omomia/update_gam3ia_member', array('class' => 'Electronic_form'));
                                    //$out['form'] = 'gam3ia_omomia/Gam3ia_omomia/update_gam3ia_member';
                                }
                                ?>

                                    
                                    
                        <!-- yara -->
                        <div class="col-md-12 ">
                        <div class="form-group  col-md-3  padding-4">
                    <label class="label   ">إسم المستخدم </label>
                    <input type="text" name="user_name" class="form-control  "   data-validation="required" placeholder="أدخل البيانات" value="<?= $user_name;?>" >
                </div>
                                   
                <div class="form-group col-md-3 padding-4">
                    <label class="label   ">كلمة المرور  </label>
                    <input type="password" name="user_password"   data-validation="required" onkeyup="valid_pass_length();" 
                    id="user_password" class="form-control  " value="" />
                    <span id="validate_length" class="span-validation"> </span>
                </div>
                <div class="form-group col-md-3 padding-4">
                    <label class="label   ">تاكيد كلمة المرور <strong></strong> </label>
                    <input type="password" id="user_password_copy"   data-validation="required" 
                     onkeyup="return valid_pass_copy();" class="form-control  " >
                    <span id="validate_copy" class="span-validation"> </span>
                </div>
                <!-- <?php $arr = array(1 => 'نشط', 0 => 'غير نشط'); ?>
                                    <div class="form-group col-md-3 col-sm-6 padding-4">
                                        <label class="label "> الحالة</label>
                                        <select id="suspend" name="suspend"   data-validation="required"
                                                class="form-control">
                                            <option value="">إختر</option>
                                            <?php
                                            foreach ($arr as $key => $value) {
                                                $select = '';
                                                if ($suspend != '') {
                                                    if ($key == $suspend) {
                                                        $select = 'selected';
                                                    }
                                                } ?>
                                                <option
                                                        value="<?php echo $key; ?>" <?= $select ?>> <?php echo $value; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div> -->

                                        </div>  
            <div class="col-xs-12 no-padding" style="padding: 10px;">
              
                    <div class="text-center">
                        
                       
                        <button type="button" id="buttons"  onclick="update_Electronic(<?=$result->id ?>);"
                                            class="btn btn-labeled btn-warning" id="save" name="save" value="save"><span
                                                class="btn-label"><i class="fa fa-floppy-o"></i></span>تعديل
                                                <input type="hidden"  name="id"  id="id" value="<?=$result->id ?>">
                                    
                                    </button>
                    </div>
                
            </div>


                                <?php echo form_close() ?>

 </div>
                </div>
            </div>

        


<!-- Modal -->

<script>
    function valid_pass_length()
    {
        if($("#user_password").val().length < 4){
            document.getElementById('validate_length').style.color = '#F00';
            document.getElementById('validate_length').innerHTML = 'كلمة المرور اكثر من اربع حروف';
           // $('button[type="submit"]').attr("disabled","disabled");
        }else if($("#user_password").val().length > 4 &&  $("#user_password").val().length < 10){
            document.getElementById('validate_length').style.color = '#F00';
            document.getElementById('validate_length').innerHTML = 'كلمة المرور ضعيفة';
           // $('button[type="submit"]').attr("disabled","disabled");
        }else if($("#user_password").val().length > 10){
            document.getElementById('validate_length').style.color = '#00FF00';
            document.getElementById('validate_length').innerHTML = 'كلمة المرور قوية';
           // $('button[type="submit"]').removeAttr("disabled");
        }
    }
    function valid_pass_copy()
    {
        if($("#user_password").val() == $("#user_password_copy").val()){
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


        //

       
        //
        var serializedData = $('.Electronic_form').serializeArray();
        $.each(serializedData, function (key, item) {
            form_data.append(item.name, item.value);
        });
        $.ajax({
            type: 'post',
            
            url: '<?php echo base_url() ?>gam3ia_omomia/Gam3ia_omomia/update_gam3ia_account',
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

                    //get_data('family_members');
                    // show_tab('family_members');
                }
            }
        });
    }
</script>


