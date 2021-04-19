<style>
    /*  .top-left {
position: absolute;
top: 8px;
left: 16px;
margin-top: 1em;
}*/
    .img-size {
        width: 150px
    }

    .top-left {
        position: initial;
        top: 8px;
        left: 16px;
        margin: 0 auto;
        display: block;
        margin-top: 1em;
    }

    .padding-4 {
        padding-right: 4px;
        padding-left: 4px;
        padding-bottom: 6px;
    }
</style>
<?php if ($_SESSION['role_id_fk'] == 3) { ?>
    <div class="col-xs-8">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">بيانات الموظف </h3>
            </div>
            <div class="panel-body">
                <!-- open panel-body-->
                <div class="details-resorce">
                    <div class="col-xs-9 r-inner-details">
                        <?php

                        if (isset($result)) {
                            $id = $result['user_id'];
                            $required = '';
                            if ($result['role_id_fk'] == 3) {
                                $style_div = 'style="display: none"';
                                $emp_div = 'style="display: block"';
                                $magls_div = 'style="display: none"';
                            }
                            $style_div = "";
                            $disabled = 'disabled="disabled"';
                        }

                        ?>
                        <?php
                        echo form_open_multipart('User/update_emp/' . $result_emp['id'] . '', array('class' => "myform"));
                        ?>
                        <div>
                            <div class="col-md-12  col-sm-12 col-xs-12 inner-side r-data">


                                <div class="col-xs-12  padding-4" id="emp_div" <?= $emp_div ?> >
                                    <div class="col-sm-6 col-xs-4">
                                        <label class="label"> إسم الموظف </label>
                                    </div>
                                    <div class="col-sm-6 ">

                                        <?php
                                        if (isset($result_emp) && $result_emp != null) {

                                            ?>
                                            <input type="text" name="emp_name" class="form-control"
                                                   value="<?= $result_emp['employee'] ?>"
                                                   data-validation="required"
                                                   placeholder="  إسم الموظف "
                                            />

                                            <?php
                                        } else {
                                            ?><input type="text" name="emp_name" value="" class="form-control"
                                                     data-validation="required"
                                                     placeholder="  إسم الموظف "
                                            />


                                        <?php } ?>


                                    </div>
                                </div>
                                <div class="col-xs-12  padding-4">
                                    <div class="col-sm-6 col-xs-4">
                                        <label class="label"> رقم الهوية </label>
                                    </div>
                                    <div class="col-sm-6 ">
                                        <input type="number" class="form-control" name="card_num"
                                               placeholder="   رقم الهوية   " value="<?php

                                        if (isset($result_emp)) echo $result_emp['card_num'] ?>"
                                               data-validation="required">
                                    </div>
                                </div>
                                <div class="col-xs-12  padding-4">
                                    <div class="col-sm-6 col-xs-4">
                                        <label class="label"> رقم الجوال </label>
                                    </div>
                                    <div class="col-sm-6 ">
                                        <input type="number" class="form-control" name="phone"
                                               placeholder="      رقم الجوال    "
                                               value="<?php if (isset($result_emp)) echo $result_emp['phone'] ?>"
                                               data-validation="required">
                                    </div>
                                </div>

                                <div class="col-xs-12  padding-4">
                                    <div class="col-sm-6 col-xs-4">
                                        <label class="label"> رقم الجوال الارضي </label>
                                    </div>
                                    <div class="col-sm-6 ">
                                        <input type="number" class="form-control" name="another_phone"
                                               placeholder="  رقم الجوال الارضي    "
                                               value="<?php if (isset($result_emp)) echo $result_emp['another_phone'] ?>"
                                               data-validation="required">
                                    </div>
                                </div>
                                <div class="col-xs-12 padding-4">
                                    <div class="col-sm-6 col-xs-4">
                                        <label class="label"> البريد الالكتروني </label>
                                    </div>
                                    <div class="col-sm-6 ">
                                        <input type="email" class="form-control" name="email"
                                               placeholder=" البريد الالكتروني "
                                               value="<?php if (isset($result_emp)) echo $result_emp['email'] ?>"
                                               data-validation="required">
                                    </div>
                                </div>


                                <div class="col-xs-12 padding-4">
                                    <div class="col-sm-6 col-xs-4">
                                        <label class="label"> الصوره الشخصية </label>
                                    </div>
                                    <div class="col-sm-6 ">
                                        <input type="file" class="form-control"
                                               name="user_photo" <?php echo($required) ?> />

                                    </div>
                                </div>


                                <div class="col-xs-12 padding-4">
                                    <div class="col-sm-6 col-xs-4">
                                        <label class="label"> صوره التوقيع </label>
                                    </div>
                                    <div class="col-sm-6 ">
                                        <input type="file" class="form-control"
                                               name="users_signatures" <?php echo($required) ?> />
                                        <span style="FONT-WEIGHT: NORMAL;" class="badge badge-danger">تأكد أن  التوقيع بامتداد png  وتكون الصورة مفرغه والحجم الخاص بها يكون 1000*550</span>

                                    </div>
                                </div>

                            </div>


                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="form-group col-md-12 ">
                            <label class="label  text-center">الصوره الشخصية </label>
                            <?php if (isset($result_emp) && !empty($result_emp['personal_photo'])) { ?>
                                <img src="<?php if (isset($result_emp)) echo(base_url() . 'uploads/human_resources/emp_photo/thumbs/' . $result_emp['personal_photo']) ?>"
                                     class="top-left img-size"></br>

                            <?php } else { ?>
                                <img src="<?php echo base_url() ?>asisst/admin_asset/img/avatar5.png" alt="User Avatar"
                                     class="top-left img-size">

                            <?php } ?>


                        </div>
                        <div class="form-group col-md-12 ">

                            <label class="label  text-center">صوره التوقيع</label>

                            <?php if (isset($result_emp) && !empty($result_emp['users_signatures'])) { ?>
                                <img src="<?php if (isset($result_emp['users_signatures'])) echo(base_url() . 'uploads/human_resources/emp_photo/thumbs/' . $result_emp['users_signatures']) ?>"
                                     class="top-left img-size"></br>

                            <?php } else { ?>
                                <img src="<?php echo base_url() ?>asisst/admin_asset/img/avatar5.png" alt="User Avatar"
                                     class="top-left img-size">

                            <?php } ?>


                        </div>
                    </div>


                </div>

                <div class="col-xs-12 text-right">

                    <button type="submit" id="save" name="add" value="add" class="btn btn-labeled btn-success "
                            style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">

                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span> حفظ

                    </button>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!--  -->
<div class="col-xs-4">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title">بيانات الحساب </h3>
        </div>
        <div class="panel-body">
            <!-- open panel-body-->
            <?php
            echo form_open_multipart('User/update_users/' . $result_emp['id'] . '', array('class' => "myform"));
            ?>

            <div class="col-xs-12 r-inner-details">
                <div class="col-xs-12 padding-4">
                    <div class="col-sm-6 col-xs-4">
                        <label class="label"> إسم المستخدم </label>
                    </div>
                    <div class="col-sm-6 ">
                        <input type="text" class="form-control" name="user_username" placeholder="إسم المستخدم"
                               value="<?php if (isset($result)) echo $result['user_username'] ?>"
                               data-validation="required">
                        <?php echo form_error('user_username'); ?>

                    </div>
                </div>
                <div class="col-xs-12 padding-4">
                    <div class="col-sm-6 col-xs-4">
                        <label class="label"> كلمه المرور </label>
                    </div>
                    <div class="col-sm-6 ">
                        <input type="password" class="form-control" name="user_pass"
                               onkeyup="return check_pass($('#user_pass').val(),$('#user_pass_validate').val())"
                               id="user_pass" placeholder=" كلمه المرور " autocomplete="off" value=""
                               data-validation="required">
                        <?php echo form_error('user_pass'); ?>
                    </div>
                </div>
                <div class="col-xs-12 padding-4">
                    <div class="col-sm-6 col-xs-4">
                        <label class="label"> تأكيد كلمه المرور </label>
                    </div>
                    <div class="col-sm-6 ">
                        <input type="password" class="form-control"
                               onkeyup="return check_pass($('#user_pass').val(),$('#user_pass_validate').val())"
                               name="user_pass_validate" id="user_pass_validate" placeholder=" كلمه المرور " value=""
                               data-validation="required">
                        <p style="color:red;" id="span_pass"></p>
                        <?php echo form_error('user_pass_validate'); ?>
                    </div>
                </div>


                <div class="col-xs-12 text-center">
                    <br>

                    <button type="submit" id="pass" name="add" value="add" class="btn btn-labeled btn-success "
                            style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">

                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span> حفظ

                    </button>
                    <?php echo form_close() ?>
                </div>

            </div>
        </div>
    </div>
</div>


<script>
    function check_pass(pass1, pass2) {
        if (pass1 != pass2) {
            document.getElementById("user_pass").style.color = "#E34234";
            document.getElementById("user_pass_validate").style.color = "#E34234";
            $("#span_pass").html("كلمه المرور غير متطابقة");
            document.getElementById("pass").setAttribute("disabled", "disabled");
        } else {
            document.getElementById("user_pass").style.color = "#000";
            document.getElementById("user_pass_validate").style.color = "#000";
            $("#span_pass").html("");
            document.getElementById("pass").removeAttribute("disabled", "disabled");
        }
    }

    function check_username(username) {
        if (username) {
            var dataString = 'username=' + username;
            $.ajax({
                type: "post",
                url: "<?php echo base_url(); ?>User/check",
                data: dataString,
                success: function (response) {
                    // alert(response);
                    /* if (response === 0 ) {}
                     else
                         alert('يوجد مستخدم بهذا الإسم .. برجاء تغييره'); */
                }
            });
            return false;
        }
    }


</script>