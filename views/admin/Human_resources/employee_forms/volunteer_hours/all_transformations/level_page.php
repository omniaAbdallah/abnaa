<input type="hidden" id="current_from_id" value="<?php echo $row->current_to_user_id; ?>"><input type="hidden" id="emp_user_id_fk" value="<?php echo $row->emp_id_fk; ?>"><!--<input type="hidden" id="emp_user_id_fk" value="--><?php //echo $row->emp_user_id; ?><!--">--><input type="hidden" id="current_from_user_name" value="<?php echo $row->current_to_user_name; ?>"><!--<input type="hidden" id="last_from_id" value="--><?php //echo $row->emp_user_id; ?><!--">--><input type="hidden" id="message_accept" value="<?php echo $mess->msg_accept; ?>"><input type="hidden" id="message_refuse" value="<?php echo $mess->msg_refuse; ?>"><!--<input type="hidden" id="emp_name" value="--><?php //echo $row->emp; ?><!--">--><!--<input type="hidden" id="emp_job" value="--><?php //echo $row->emp_job; ?><!--">--><!--<input type="hidden" id="emp_img" value="--><?php //echo $row->personal_emp_img; ?><!--">--><input type="hidden" id="level" value="<?php echo $row->level; ?>"><input type="hidden" id="order_rkm_id" value="<?php echo $row->id; ?>"><!--<input type="hidden" id="order_rkm_fk" value="--><?php //echo $row->rkm_talab; ?><!--">--><?php if ($level == 1) { ?>    <div class="col-md-8">        <table class="table table-bordered" border="1" cellpadding="3" cellspacing="0" style="width:100%">            <tbody>            <tr>                <td colspan="3" style="background-color:#e6eed5; border-color:#73b300">                    <div class="radio-content"><input type="radio" id="accept-1" name="radio" class="decision"                                                      onchange="show_hide($(this).val()); $('#reason_action1').attr('disabled','TRUE');$('#reason_action1').val('');"                                                      value="1"> <label class="radio-label"                                                                        for="accept-1">موافق </label></div>                </td>            </tr>            <tr>                <td colspan="3" style="background-color:#ffb3b7; border-color:#73b300">                    <div class="radio-content"><input type="radio" id="accept-2" name="radio" class="decision"                                                      onchange="show_hide($(this).val()); $('#reason_action1').removeAttr('disabled');"                                                      value="2"> <label class="radio-label" for="accept-2"> لا                            أوافق </label> <input size="60" type="text" disabled name="reason_action"                                                  id="reason_action1" value=" ..................."></div>                </td>            </tr>            <tr>                <td>الإسم/ <?php echo $row->current_from_user_name; ?></td>                <td>التوقيع/ <?php echo $row->current_from_user_name; ?></td>                <td>التاريخ/<?php echo $row->date_ar; ?></td>            </tr>            </tbody>        </table>        </br>        <div class="form-group col-md-6 col-sm-6 padding-4 has-success accept"><label class="label"> مسؤول                التطوع</label>            <select name="gender" onchange="get_emp_data($(this).val());" id="employee_id" data-validation="required"                    class="form-control valid" aria-required="true">                <option value=""> اختر</option> <?php if (isset($employee) && !empty($employee)) {                    foreach ($employee as $item) { ?>                        <option value="<?php echo $item->person_id; ?>"> <?php echo $item->person_name; ?></option>                    <?php }                } ?>            </select></div>    </div>    <div class="col-md-4 ">        <div class="col-md-12 profile">            <table class="table table-bordered s col-md-12" style="">                <thead>                <tr>                    <td colspan="2">                        <?php if ((isset($row->personal_emp_img)) && (!empty($row->personal_emp_img)) && (file_exists('uploads/human_resources/emp_photo/thumbs/' . $row->personal_emp_img))) { ?>                            <img id="empImg"                                 src="<?php echo base_url(); ?>uploads/human_resources/emp_photo/thumbs/<?php echo $row->personal_emp_img; ?>"                                 alt="">                        <?php } else { ?>                            <img id="empImg" src="<?php echo base_url(); ?>asisst/admin_asset/img/user.png"                                 alt="">                        <?php } ?>                    </td>                </tr>                </thead>                <tbody>                <tr class="greentd">                    <td class="text-center">الإسم</td>                </tr>                <tr>                    <td id="name-emp" class="text-center">                        <?php if ((isset($row->emp_name)) && (!empty($row->emp_name))) echo $row->emp_name; ?>                    </td>                </tr>                <tr class="greentd">                    <td class="text-center">الوظيفة</td>                </tr>                <tr>                    <td id="job-title" class="text-center">                        <?php if ((isset($row->job_title)) && (!empty($row->job_title))) echo $row->job_title; ?>                    </td>                </tr>                </tbody>            </table>        </div>    </div><?php }if ($level == 2) { ?>    <div class="col-md-12">        <div class="col-md-8">            <table class="table table-bordered" border="1" cellpadding="3" cellspacing="0" style="width:100%">                <tbody>                <tr>                    <td colspan="3" style="background-color:#e6eed5; border-color:#73b300">                        <div class="radio-content"><input type="radio" id="accept-1" name="radio" class="decision"                                                          onchange="show_hide($(this).val());                        $('#reason_action1').attr('disabled','TRUE');                       $('#reason_action1').val('');"                                                          value="1"> <label class="radio-label"                                                                            for="accept-1">موافق </label></div>                    </td>                </tr>                <tr>                    <td colspan="3" style="background-color:#ffb3b7; border-color:#73b300">                        <div class="radio-content"><input type="radio" id="accept-2" name="radio" class="decision"                                                          onchange="show_hide($(this).val());                        $('#reason_action1').removeAttr('disabled');"                                                          value="2"> <label class="radio-label" for="accept-2"> لا                                أوافق </label> <input size="60" type="text" disabled name="reason_action"                                                      id="reason_action1" value=" ..................."></div>                    </td>                </tr>                </tbody>            </table>        </div>        <div class="col-md-4">            <div class="col-md-12 profile">                <table class="table table-bordered s col-md-12" style="">                    <thead>                    <tr>                        <td colspan="2">                            <?php if ((isset($row->personal_emp_img)) && (!empty($row->personal_emp_img)) && (file_exists('uploads/human_resources/emp_photo/thumbs/' . $row->personal_emp_img))) { ?>                                <img id="empImg"                                     src="<?php echo base_url(); ?>uploads/human_resources/emp_photo/thumbs/<?php echo $row->personal_emp_img; ?>"                                     alt="">                            <?php } else { ?><img id="empImg"                                                                                              src="<?php echo base_url(); ?>asisst/admin_asset/img/user.png"                                                                                              alt="">                            <?php } ?>                        </td>                    </tr>                    </thead>                    <tbody>                    <tr class="greentd">                        <td class="text-center">الإسم</td>                    </tr>                    <tr>                        <td id="name-emp"                            class="text-center"><?php if ((isset($row->emp_name)) && (!empty($row->emp_name))) echo $row->emp_name; ?></td>                    </tr>                    <tr class="greentd">                        <td class="text-center">الوظيفة</td>                    </tr>                    <tr>                        <td id="job-title"                            class="text-center"> <?php if ((isset($row->job_title)) && (!empty($row->job_title))) echo $row->job_title; ?></td>                    </tr>                    </tbody>                </table>            </div>        </div>    </div><?php } ?><script>    function show_hide(valu) {        if (valu == 2) {            $('.accept').hide();            var emp_id = $('#emp_user_id_fk').val();        } else {            $('.accept').show();            var emp_id = $('#current_from_id').val();        }        $.ajax({            type: 'post',            url: "<?php echo base_url();?>human_resources/employee_forms/Volunteer_hours/get_emp_data",            data: {emp_id: emp_id, valu: valu},            success: function (d) {                $('.profile').html(d);            }        });    }</script><script>    function make_suspend() {        var valid = 1;        var text_valid = '';        valu = $(".decision:radio:checked").val();        if (valu != 1 && valu != 2) {            text_valid += 'من فضلك حدد قراراك سواء القبول او الرفض';            valid = 0;        }        if (valu == 1) {            var level_check = parseInt($('#level').val());            if (level_check == 1 || level_check == 2) {                if ($('#employee_id').val() == '') {                    text_valid += 'من فضلك قم باختيار  مسؤول التطوع';                    valid = 0;                }            }            var current_from_id = $('#current_from_id').val();            var current_from_user_name = $('#current_from_user_name').val();            var current_to_id = $('#employee_id').val();            var current_to_user_name = $('#employee_id').val() + 'name';            var current_procedure = valu;            var current_process_title = 'موافق';            var level = parseInt($('#level').val()) + 1;            var order_rkm_id = $('#order_rkm_id').val();            var order_rkm_fk = $('#order_rkm_fk').val();            var message_accept = $('#message_accept').val();            var message_refuse = $('#message_refuse').val();            var reason_action = $('#reason_action').val();            $.ajax({                type: 'post',                url: "<?php echo base_url();?>human_resources/employee_forms/Volunteer_hours/make_suspend",                data: {                    current_from_id: current_from_id,                    current_from_user_name: current_from_user_name,                    current_to_id: current_to_id,                    current_to_user_name: current_to_user_name,                    current_procedure: current_procedure,                    current_process_title: current_process_title,                    level: level,                    order_rkm_id: order_rkm_id,                    order_rkm_fk: order_rkm_fk,                    valu: valu,                    reason_action: reason_action                }, beforeSend: function (xhr) {                    if (valid == 0) {                        swal({                            title: 'من فضلك ادخل كل الحقول ',                            text: text_valid,                            type: 'error',                            confirmButtonText: 'تم'                        });                        xhr.abort();                    } else if (valid == 1) {                        swal({                            title: "جاري الحفظ ... ",                            text: "",                            imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',                            showConfirmButton: false,                            allowOutsideClick: false                        });                    }                },                success: function (d) {                    swal('بنجاح!', message_accept);                    $('#ezn_table').hide();                    $('#detailsModal2').modal('hide');                    location.reload();                }            });        }        if (valu == 2) {            //غير موافق            var current_from_id = $('#current_from_id').val();            var current_from_user_name = $('#current_from_user_name').val();            var current_to_id = $('#last_from_id').val();            var current_to_user_name = $('#last_from_user_name').val();            var current_procedure = valu;            var current_process_title = 'غير موافق';            var level = parseInt($('#level').val()) + 1;            var order_rkm_id = $('#order_rkm_id').val();            var order_rkm_fk = $('#order_rkm_fk').val();            var reason_action = $('#reason_action1').val();            console.log("reason_action :: " + reason_action);            console.log("current_from_user_name :: " + current_from_user_name);            $.ajax({                type: 'post',                url: "<?php echo base_url();?>human_resources/employee_forms/Volunteer_hours/make_suspend",                data: {                    current_from_id: current_from_id,                    current_from_user_name: current_from_user_name,                    current_to_id: current_to_id,                    current_to_user_name: current_to_user_name,                    current_procedure: current_procedure,                    current_process_title: current_process_title,                    level: level,                    order_rkm_id: order_rkm_id,                    order_rkm_fk: order_rkm_fk,                    valu: valu,                    reason_action: reason_action                },                beforeSend: function (xhr) {                    if (valid == 0) {                        swal({                            title: 'من فضلك ادخل كل الحقول ',                            text: text_valid,                            type: 'error',                            confirmButtonText: 'تم'                        });                        xhr.abort();                    } else if (valid == 1) {                        swal({                            title: "جاري الإرسال ... ",                            text: "",                            imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',                            showConfirmButton: false,                            allowOutsideClick: false                        });                    }                },                success: function (d) {                    swal('بنجاح!', 'تم رفض الطلب وتحويله الي مدير الشؤون المالية والادارية  مقدم الطلب');                    $('#detailsModal2').modal('hide');                    $('#ezn_table').hide();                    location.reload();                }            });        }    }</script><script>    function get_emp_data(emp_id) {        if (emp_id) {            $.ajax({                type: 'post',                url: "<?php echo base_url();?>human_resources/employee_forms/Volunteer_hours/get_emp_data",                data: {emp_id: emp_id},                success: function (d) {                    $('.profile').html(d);                }            });        }    }</script>