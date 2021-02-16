<style>
    .form-group .help-block.form-error {
        display: block !important;
        color: #a94442 !important;
        font-size: unset !important;
        position: unset !important;
    }

</style>
<style>
    .radio label::before {
        content: none;
        display: inline-block;
        position: absolute;
        width: 20px;
        height: 20px;
        right: 0;
        margin-left: -20px;
        border: 1px solid #cccccc;
        border-radius: 50%;
        background-color: #fff;
        -webkit-transition: border 0.15s ease-in-out;
        transition: border 0.15s ease-in-out;
    }

    .radio input[type="radio"] {
        opacity: 1;
    }
</style>
<div class="col-sm-9 no-padding">
    <?php if (isset($load_details) && (!empty($load_details))) {
//                    $data['file_num_data']=$file_num_data;
        $this->load->view($load_details);
    }
    ?>
    <div class="clearfix"></div>

    <?php if (isset($visit_transformation_history) and $visit_transformation_history != null) { ?>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th colspan="7" style="background: #ffa6aa;" colspan="5">التحويلات التي تمت علي الطلب</th>
            </tr>
            <tr>
                <th scope="col">م</th>
                <th scope="col">من</th>
                <th scope="col">التوجيه</th>
                <th scope="col">الي</th>
                <th scope="col">بتاريخ</th>
                <th scope="col">التوقيت</th>
                <th scope="col">العملية</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if (isset($visit_transformation_history) and $visit_transformation_history != null) {
                $count = 1;
                ?>
                <?php if (($crm_data['current_to_user_id'] != null) || ($crm_data['action_to'] != null)) { ?>
                    <tr>
                        <td style="background: khaki;">1</td>
                        <td style="background: khaki;"><?= $crm_data['emp_name'] ?></td>
                        <td style="background: khaki;">تم رفع المستندات</td>
                        <td style="background: khaki;">-----</td>
                        <td style="background: khaki;"><?= $crm_data['date_added'] ?></td>
                        <td style="background: khaki;"><?= $crm_data['time_added'] ?></td>
                        <td style="background: khaki;">إعداد وتجهيز</td>
                    </tr>
                <?php } ?>
                <?php foreach ($visit_transformation_history as $hist) {
                    $count++;
                    if ($hist->option_choosed == 'accept') {
                        $option_choosed = 'تم القبول';
                    } elseif ($hist->option_choosed == 'refuse') {
                        $option_choosed = 'تم الرفض';
                    } else {
                        $option_choosed = '';
                    }

                    if (empty($hist->to_user_n)) {

                        switch ($hist->action_to) {
                            case 'to_lagna':
                                $to = 'تحويل الى اللجنة';
                                break;
                            default:
                                $to = $hist->to_user_n;
                                break;
                        }
                    } else {
                        $to = $hist->to_user_n;
                    }
                    ?>
                    <tr>
                        <td><?= $count ?></td>
                        <td><?= $hist->from_user_n ?></td>
                        <td><?= $hist->reason_action ?></td>
                        <td><?= $to ?></td>
                        <td><?= $hist->date_ar ?></td>
                        <td><?= $hist->ttime ?></td>
                        <td><?= $hist->process_title ?></td>
                    </tr>
                <?php }
            }
            ?>
            </tbody>
        </table>
    <?php } ?>
</div>
<div class="col-md-3 no-padding" id="Details">
    <?php
    if ($crm_data['level'] == 0 and $crm_data['current_to_user_id'] == null) { ?>
        <form action="<?= site_url('family_controllers/osr_crm/Osr_crm_zyraat_c/process_transform_to_moder_edara') ?>"
              method="post" id="transform_form">
            <input type="hidden" name="save" value="save">
            <input type="hidden" name="id_visit" value="<?= $crm_data['id'] ?>"/>
            <input type="hidden" name="current_from_user_id" value="<?= $crm_data['current_from_user_id'] ?>"/>
            <input type="hidden" name="current_from_user_name" value="<?= $crm_data['current_from_user_name'] ?>"/>
            <input type="hidden" name="level" id="level" value="<?= $crm_data['level'] ?>"/>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">الموظف</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">الإجراء المتخذ</label>
                            <div class="radio">
                                <label style="color: green;">
                                    <input type="radio" value="accept" data-validation="check_radio"
                                           onclick="//$('.accept_required').attr('data-validation','required')"
                                           name="option_choosed">تم تجهيز المستندات
                                </label>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">المبررات</label>
                            <textarea class="form-control accept_required" id="exampleFormControlTextarea1" name="notes"
                                      rows="3"></textarea>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">تحويل إلي المدير ادارة
                                الرعاية</label>
                            <select class="form-control accept_required form-control-sm" name="to_person_id"
                                    data-validation-depends-on="option_choosed"
                                    data-validation-depends-on-value="accept"
                                    id="to_person_id">
                                <?php foreach ($moder_edara as $item) { ?>
                                    <option value="<?= $item->person_id ?>"><?= $item->person_name ?> </option>
                                <?php } ?>
                            </select>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="submit" onclick="//check_befor_submit()"
                                class="btn btn-labeled btn-success " name="save" value="save">
                                            <span class="btn-label"><i
                                                        class="glyphicon glyphicon-floppy-disk"></i></span>إرسال
                        </button>
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
    <?php } elseif ($crm_data['level'] == 1 and $crm_data['current_to_user_id'] == $_SESSION['user_id']) { ?>
        <form action="<?= site_url('family_controllers/osr_crm/Osr_crm_zyraat_c/process_action_from_moder_edara') ?>"
              method="post" id="transform_form">
            <input type="hidden" name="save" value="save">
            <input type="hidden" name="id_visit" value="<?= $crm_data['id'] ?>"/>
            <input type="hidden" name="mother_national_num" value="<?= $crm_data['mother_national_num'] ?>"/>
            <input type="hidden" name="current_from_user_id" value="<?= $crm_data['current_to_user_id'] ?>"/>
            <input type="hidden" name="current_from_user_name" value="<?= $crm_data['current_to_user_name'] ?>"/>
            <input type="hidden" name="level" id="level" value="<?= $crm_data['level'] ?>"/>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col"> المدير ادارة الرعاية</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">الإجراء المتخذ</label>
                            <div class="radio">
                                <label style="color: green;"><input type="radio" value="accept"
                                                                    data-validation="check_radio"
                                                                    onclick="//$('.accept_required').attr('data-validation','required')"
                                                                    name="option_choosed">موافق</label>
                            </div>
                            <div class="radio">
                                <label style="color: red;"><input type="radio" value="refuse"
                                                                  data-validation="check_radio"
                                                                  onclick="//$('.accept_required').removeAttr('data-validation')"
                                                                  name="option_choosed">غير
                                    موافق</label>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">المرئيات وإبداء الرأي</label>
                            <textarea class="form-control accept_required " id="exampleFormControlTextarea1"
                                      name="notes"
                                      data-validation-depends-on="option_choosed"
                                      data-validation-depends-on-value="accept" rows="3"></textarea>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">الاجراء المتخذ </label>
                            <select class="form-control accept_required form-control-sm" data-validation-event="change"
                                    data-validation="check_show,required"
                                    name="action_to"
                                    data-validation-depends-on="option_choosed"
                                    data-validation-depends-on-value="accept"
                                    id="action_to">
                                <option value="">- اختر-</option>
                                <option value="to_lagna" data-class_id="to_lagna">تحويل الى لجنة الاسر</option>
                            </select>
                        </div>
                    </td>
                </tr>
                <tr class="to_lagna all_hide">
                    <td>
                        <div class="form-group">
                            <label class="label "> الى اللجنة </label>
                            <select class="form-control " data-validation="required"
                                    data-validation-depends-on="action_to"
                                    data-validation-depends-on-value="to_lagna" name="add_to_lagna_id_fk">
                                <?php if (isset($all_lagna_to) && $all_lagna_to != null && !empty($all_lagna_to)):
                                    foreach ($all_lagna_to as $one_lagna): ?>
                                        <option
                                                value="<?php echo $one_lagna->id_lagna; ?>"><?php echo $one_lagna->lagna_name; ?></option>
                                    <?php endforeach; endif; ?>
                            </select>
                        </div>
                    </td>
                </tr>
                <tr class="to_lagna all_hide">
                    <td>
                        <div class="form-group">
                            <label class="label "> طبيعة التحويل </label>
                            <select class="form-control  " name="transfer_type_id_fk" id="transfer_type_id_fk"
                                    data-validation="required" data-validation-depends-on="action_to"
                                    data-validation-depends-on-value="to_lagna"
                                    aria-required="true"
                                    onchange="GetTransferType($(this).val(),<?php echo $this->uri->segment(4); ?>)">
                                <option value="">اختر</option>
                                <?php $transfer_type_arr = array(1 => 'الأسر', 2 => 'الأفراد');
                                for ($a = 1; $a <= sizeof($transfer_type_arr); $a++) {
                                    ?>
                                    <option value="<?= $a ?>"><?= $transfer_type_arr[$a] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </td>
                </tr>
                <tr class="to_lagna all_hide">
                    <td>
                        <div class="form-group">
                            <label class="label "> التوصية </label>
                            <select class="form-control  " name="procedure_id_fk" id="procedure_id_fk"
                                    data-validation="required" data-validation-depends-on="action_to"
                                    data-validation-depends-on-value="to_lagna"
                                    aria-required="true">
                                <option value="">اختر</option>
                            </select>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="submit" onclick="//check_befor_submit()" id="transform_btn"
                                class="btn btn-labeled btn-success " name="save" value="save">
                            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>إرسال
                        </button>
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
    <?php } ?>

</div>
<script type="text/javascript">
    $('.all_hide').hide();

    // Add validator
    $.formUtils.addValidator({
        name: 'check_show',
        validatorFunction: function (value, $el, config, language, $form) {
            $('.all_hide').hide();
            // console.log('class : '+$('option:selected',$el).data('class_id'));
            $('.' + $('option:selected', $el).data('class_id')).show();

            if ($el.val()) {
                return true;
            } else {
                return false;
            }
        },
        errorMessage: '',
        errorMessageKey: ''
    });
    $.validate({
        modules: 'logic',
        /*// for live search required*/
        validateHiddenInputs: true
        , lang: 'ar'
    });
    $('#transform_form').on('submit', function (e) {
        var isValid = $(e.target).parents('form').isValid();
        if (!isValid) {
            console.error('not valid');
            e.preventDefault(); //prevent the default action
            // return false;
        }
        if (isValid) {
            console.log('valid')
            check_befor_submit();
            return false;
        }
        // return false;
    });
</script>
<script>
    function check_befor_submit() {
        $.ajax({
            type: 'post',
            url: $('#transform_form').attr('action'),
            data: $('#transform_form').serialize(),
            cache: false,
            beforeSend: function (xhr) {

                swal({
                    title: "جاري التحويل ... ",
                    text: "",
                    imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                    showConfirmButton: false,
                    allowOutsideClick: false
                });
            },
            success: function (html) {
                swal({
                    title: 'تم التحويل بنجاح',
                    type: 'success',
                    confirmButtonText: 'تم'
                });
                location.reload();
            }
        });
    }
</script>