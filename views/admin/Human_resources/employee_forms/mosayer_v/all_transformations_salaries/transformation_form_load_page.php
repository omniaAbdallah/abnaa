<style>
    .nonactive {
        pointer-events: none;
        cursor: not-allowed;
    }
</style>
<?php $arr_select_lable = array(
    1 => 'المحاسب',
    2 => 'مدير الشئون الماليةو الإدارية',
    3 => 'مدير العام'); ?>

<div class="modal-body">
    <div class="col-sm-10 padding-4">

        <form enctype="multipart/form-data" method="post" id="form1"
              action="<?php echo base_url() ?>human_resources/employee_forms/Employee_salaries/save_Transform">
            <?php if (isset($_POST['from_profile']) && ($_POST['from_profile'] == 1)) { ?>
                <input type="hidden" name="from_profile" id="from_profile" value="1">
            <?php } ?>
            <input type="hidden" name="mosayer_rkm_fk" id="mosayer_rkm_fk" value="<?= $mosayer_data->mosayer_rkm ?>">
            <input type="hidden" name="mosayer_id_fk" id="mosayer_id_fk" value="<?= $mosayer_data->id ?>">
            <input type="hidden" name="from_user" id="from_user" value="<?= $mosayer_data->current_to_user_id ?>">
            <input type="hidden" name="real_from_user" id="real_from_user" value="<?= $mosayer_data->current_from_user_id ?>">
            <input type="hidden" name="emp_id_fk" id="emp_id_fk" value="<?= $mosayer_data->emp_id_fk ?>">

            <input type="hidden" name="to_user_n" id="to_user_n" value="">


            <div class="col-sm-12 ">

                <?php if ($mosayer_data->current_to_user_id == $_SESSION['user_id']) { ?>
                    <input type="hidden" name="level" id="level" value="<?= $mosayer_data->level + 1 ?>">
                    <table class="table table-bordered table-responsive">
                        <tbody>
                        <tr>
                            <td colspan="3" style="background-color:#e6eed5; border-color:#73b300">
                                <div class="radio-content">
                                    <input type="radio" onclick="$('#reason_action1').attr('disabled','TRUE');
                                     $('#current_to_id_DirectManger').removeAttr('disabled');
                                      $('#reason_action1').val('................');" id="tahod-1" name="action" value="1">
                                    <label class="radio-label" for="tahod-1">موافق</label>

                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="background-color:#ffb3b7; border-color:#73b300">
                                <div class="radio-content">
                                    <input type="radio" name="action" onclick="$('#reason_action1').removeAttr('disabled');$('#current_to_id_DirectManger').attr('disabled', 'disabled');"
                                           id="tahod-2" value="2">
                                    <label class="radio-label" for="tahod-2">لا أوافق بسبب
                                        <input size="60" type="text" disabled name="reason_action" id="reason_action1" value=" ...................">
                                    </label>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                <?php } ?>

                <?php if (key_exists($mosayer_data->level, $arr_select_lable)) { ?>
                    <div class="form-group col-md-6 col-sm-6 padding-4">
                        <label class="label"><?php echo $arr_select_lable[$mosayer_data->level]; ?></label>
                        <select name="current_to_id" id="current_to_id_DirectManger" class="form-control"
                                aria-required="true" onchange="
                                var link =$('#current_to_id_DirectManger :selected').attr('data-img');
                                var name =$('#current_to_id_DirectManger :selected').attr('data-name');
                                var job =$('#current_to_id_DirectManger :selected').attr('data-job');
                                $('#empImg').attr('src','<?php echo base_url() . 'uploads/human_resources/emp_photo/thumbs/'; ?>'+ link);
                                $('#name-emp').text(name);
                                $('#to_user_n').val(name);
                                $('#job-title').text(job);
                                ">
                            <option value="">إختر</option>
                            <?php if (isset($employees_data) && !empty($employees_data)) {
                                foreach ($employees_data as $row) { ?>
                                    <option value="<?= $row->person_id ?>" data-img="<?= $row->photo ?>"
                                            data-name="<?= $row->person_name ?>" data-job="<?= $row->job_title_n ?>">
                                        <?= $row->person_name ?></option>
                                <?php }
                            } ?>
                        </select>

                    </div>
                <?php } ?>
            </div>
    </div>
    </form>

</div>
<div class="col-sm-2 padding-4">
    <table class="table table-bordered" style="">
        <thead>
        <tr>
            <td colspan="2">
                <img id="empImg"
                     src="<?php echo base_url() . "uploads/human_resources/emp_photo/thumbs/" . $mosayer_data->personal_photo ?>"
                     onerror='this.src="<?php echo base_url(); ?>/asisst/admin_asset/img/user.png"'
                     class="center-block img-responsive" style="width: 180px; height: 150px">
            </td>
        </tr>
        </thead>
        <tbody>
        <tr class="greentd">
            <td class="text-center">الإسم</td>
        </tr>
        <tr>
            <td id="name-emp" class="text-center"> <?php echo $mosayer_data->employee ?></td>
        </tr>
        <tr class="greentd">
            <td class="text-center">الوظيفة</td>
        </tr>
        <tr>
            <td id="job-title" class="text-center"><?php echo $mosayer_data->job_title ?></td>
        </tr>
        </tbody>
    </table>
</div>

</div>
<div class="modal-footer" style="display: inline-block;width: 100%;">
    <?php if ($mosayer_data->current_to_user_id == $_SESSION['user_id'] && (in_array($mosayer_data->level, array(1, 2, 3, 4, 5, 6)))) { ?>
        <button type="button" style="float: right;"
                onclick="make_transformRequest_sumit(<?php echo $mosayer_data->level; ?>)"
                class="btn btn-success btn-labeled">
            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
        </button>
    <?php } ?>
    <button type="button" class="btn btn-danger btn-labeled" onclick="$('#transform').modal('hide')"><span
                class="btn-label"><i class="glyphicon glyphicon-remove"></i></span> إغلاق
    </button>
</div>


<script>

    function make_transformRequest_sumit(level) {
        var text_sweet = '';
        var submit_val = 1;
        var emp = $('#current_to_id_DirectManger').val();

        switch (level) {
            case 1:

                var action = $("input[name='action']:checked");
                if (action.length == 0) {
                    text_sweet += 'الرد على طلب ';
                    submit_val = 0;
                }
                if ($('#current_to_id_DirectManger').is(':enabled')) {
                    if (!emp) {
                        text_sweet += '- اختيار الموظف ';
                        submit_val = 0;
                    }
                }

                break;
            case 2:
                var action = $("input[name='action']:checked");
                if (action.length == 0) {
                    text_sweet += 'الرد على طلب ';
                    submit_val = 0;
                }
                if ($('#current_to_id_DirectManger').is(':enabled')) {
                    if (!emp) {
                        text_sweet += '- اختيار الموظف ';
                        submit_val = 0;
                    }
                }

                break;
            case 3:

                var action = $("input[name='action']:checked");
                if (action.length == 0) {
                    text_sweet += 'الرد على طلب ';
                    submit_val = 0;
                }

                if ($('#current_to_id_DirectManger').is(':enabled')) {
                    if (!emp) {
                        text_sweet += '- اختيار الموظف ';
                        submit_val = 0;
                    }
                }
                console.log('action ::' + action.length);

                break;
            case 4:

                var action = $("input[name='action']:checked");
                if (action.length == 0) {
                    text_sweet += 'الرد على طلب ';
                    submit_val = 0;
                }
                if ($('#current_to_id_DirectManger').is(':enabled')) {
                    if (!emp) {
                        text_sweet += '- اختيار الموظف ';
                        submit_val = 0;
                    }
                }
                break;
            case 5:
                var action = $("input[name='action']:checked");
                if (action.length == 0) {
                    text_sweet += 'الرد على طلب ';
                    submit_val = 0;
                }
                if ($('#current_to_id_DirectManger').is(':enabled')) {
                    if (!emp) {
                        text_sweet += '- اختيار الموظف ';
                        submit_val = 0;
                    }
                }

                break;
            case 6:
                var action_moder_final = $("input[name='action_moder_final']:checked");
                if (action_moder_final.length == 0) {
                    text_sweet += 'رأى مدير العام  ';
                    submit_val = 0;
                }
                break;

            default:

        }
        if (submit_val == 0) {
            swal({
                title: 'من فضلك ادخل  كل الحقول ',
                text: text_sweet,
                type: 'warning',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'تم'
            });
        } else {
            $('#form1').submit();

        }

    }

</script>
