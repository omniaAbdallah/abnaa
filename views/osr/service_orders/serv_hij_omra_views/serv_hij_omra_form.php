<div class="col-sm-12 col-md-12 col-xs-12 fadeInUp wow" id="page_panal">
    <div class="panel panel-default">
        <div class="panel-heading panel-title">
            <h4><?= $title ?></h4>
        </div>
        <div class="panel-body">
            <?php
            $fe2a_talab_title = array(1 => 'حج', 2 => 'عمرة');
            $first_hij_omra_title = array(1 => 'نعم', 2 => 'لا');
            $suspend_title = array(0 => 'جاري', 1 => 'تم القبول', 2 => 'تم الرفض', 3 => "تم التحويل", 4 => "تم الاعتماد بالموافقة", 5 => "تم الإعتماد بالرفض");
            $suspend_class = array(0 => 'warning', 1 => 'success', 2 => 'danger', 3 => 'info', 4 => 'success', 5 => 'danger');

            if (isset($talab_data) && (!empty($talab_data))) {
                $fe2a_talab = $talab_data->fe2a_talab;
                $talab_rkm = $talab_data->talab_rkm;
                $mhrem_name = $talab_data->mhrem_name;
                $mhrem_national_num = $talab_data->mhrem_national_num;
                $mhrem_birth_date = $talab_data->mhrem_birth_date;
                $first_hij_omra = $talab_data->first_hij_omra;
                $notes = $talab_data->notes;
                $mother_id = $talab_data->mother_id;
                $member_id = $talab_data->member_id;

                echo form_open_multipart('osr/service_orders/Serv_hij_omra/update_talab', array('id' => 'Serv_hij_omra', 'class' => 'Serv_hij_omra'));

            } else {
                echo form_open_multipart('osr/service_orders/Serv_hij_omra', array('id' => 'Serv_hij_omra', 'class' => 'Serv_hij_omra'));
                $fe2a_talab = 1;
                $talab_rkm = 1;
                $mhrem_name = '';
                $mhrem_national_num = '';
                $mhrem_birth_date = date('Y-m-d');
                $first_hij_omra = 1;
                $notes = '';
                $mother_id = '';
                $member_id = array();

            }


            ?>

            <div class="col-md-12">
                <?php if (isset($talab_id) && (!empty($talab_id))) { ?>
                    <input type="hidden" name="data[talab_id]" id="talab_id" value="<?= $talab_id ?>">
                <?php } ?>
                <input type="hidden" name="data[file_num]" value="<?= $_SESSION['file_num'] ?>">
                <input type="hidden" name="data[mother_national_num]" value="<?= $_SESSION['mother_national_num'] ?>">
                <input type="hidden" name="add" value="add">
                <div class="form-group col-md-1 col-sm-3 col-xs-12 padding-4">
                    <label class="label"> فئة الطلب </label>
                    <select name="data[fe2a_talab]" id="fe2a_talab" class="form-control" onchange="set_text()"
                            data-validation="required">
                        <?php foreach ($fe2a_talab_title as $key => $item) { ?>
                            <option value="<?= $key ?>>" <?php if ($fe2a_talab == $key) {
                                echo 'selected';
                            } ?>> <?= $item ?></option>
                            <?php
                        } ?>
                    </select>
                </div>
                <div class="form-group col-md-1 col-sm-3 col-xs-12 padding-4">
                    <label class="label"> رقم الطلب </label>
                    <input type="number" name="data[talab_rkm]" id="talab_rkm" class="form-control" readonly
                           value="<?= $talab_rkm ?>" data-validation="required">
                </div>
                <div class="form-group col-md-3 col-sm-3 col-xs-12 padding-4">
                    <label class="label"> إسم المحرم </label>
                    <input type="text" name="data[mhrem_name]" id="mhrem_name" class="form-control"
                           value="<?= $mhrem_name ?>" data-validation="required">
                </div>
                <div class="form-group col-md-3 col-sm-3 col-xs-12 padding-4">
                    <label class="label"> صلة المحرم </label>
                    <input type="text" name="data[mhrem_national_num]" id="mhrem_national_num" class="form-control"
                           value="<?= $mhrem_national_num ?>" data-validation="required">
                </div>
                <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
                    <label class="label"> تاريخ الميلاد </label>
                    <input type="date" name="data[mhrem_birth_date]" id="mhrem_birth_date" class="form-control"
                           value="<?= $mhrem_birth_date ?>" data-validation="required">
                </div>
                <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
                    <label class="label " id="first_hij_omra_lable"> <?=$fe2a_talab_title[$fe2a_talab]?> لأول مرة </label>
                    <?php foreach ($first_hij_omra_title as $key => $item) { ?>
                        <div class="radio-content">
                            <input type="radio" name="data[first_hij_omra]" id="choose<?= $key ?>" value="<?= $key ?>"
                                <?php if ($first_hij_omra == $key) {
                                    echo 'checked';
                                } ?> class="first_hij_omra">
                            <label for="choose<?= $key ?>" class="radio-label"><?= $item ?></label>
                        </div>
                    <?php } ?>


                </div>


                <div class="form-group col-md-3 col-sm-3 col-xs-12 padding-4">
                    <label class="label"> ملاحظات </label>
                    <input type="text" name="data[notes]" id="notes" class="form-control" value="<?= $notes ?>">
                </div>


            </div>
            <div class="form-group col-md-12 col-sm-3 col-xs-12 padding-4">
                <?php if (isset($member_data) && $member_data != null) { ?>
                    <table class=" example table table-bordered table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th>
                                <div class="check-style">
                                    <input type="checkbox" name="" class="checkbox" id="checkbox"
                                           onclick="select_all(this.checked)">
                                    <label for="checkbox"> تحديد الكل </label>
                                </div>
                            </th>
                            <th>الإسم</th>
                            <th>رقم الهوية</th>
                            <th>الصلة</th>

                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <div class="check-style">
                                    <input type="checkbox" name="data[mother_id]" class="checkbox"
                                           id="checkbox_m<?= $family_data->id ?>"
                                           value=" <?= $family_data->id ?>" <?php if ($mother_id == $family_data->id) {
                                        echo 'checked';
                                    } ?>>
                                    <label for="checkbox_m<?= $family_data->id ?>"> </label>
                                </div>
                            </td>
                            <td><?php echo $family_data->mother_name; ?></td>
                            <td><?php echo $family_data->mother_national_num_fk; ?></td>
                            <td><?php echo "أم"; ?></td>
                        </tr>
                        <?php
                        $x = 2;
                        foreach ($member_data as $row) { ?>
                            <tr>
                                <td>
                                    <div class="check-style">
                                        <input type="checkbox" name="data[member_id][]" class="checkbox"
                                               id="checkbox<?= $row->id ?>"
                                               value=" <?= $row->id ?>" <?php if (in_array($row->id, $member_id)) {
                                            echo 'checked';
                                        } ?>>
                                        <label for="checkbox<?= $row->id ?>"> </label>
                                    </div>
                                </td>
                                <td><?php echo $row->member_full_name; ?></td>
                                <td><?php echo $row->member_card_num; ?></td>
                                <td><?php echo $row->relation_name; ?></td>
                            </tr>
                            <?php $x++;
                        } ?>
                        </tbody>
                    </table>
                <?php } ?>
            </div>
            <div class="col-md-12 text-center">
                <button type="button" id="buttons" class="btn btn-labeled btn-success  " onclick="save_hij_omr()"
                        name="add" value="حفظ">
                    <span class="btn-label"><i class="fa fa-floppy-o"></i></span>حفظ
                </button>
                <span style="font-size: medium;display: none" class=" badge badge-danger" id="span_form">لا يمكن طلب جديد لان هنالك طلب جاري </span>

            </div>
            <?php echo form_close() ?>
        </div>

    </div>
    <?php if (!isset($talab_id) && (empty($talab_id))) {
        $panal_table_Display='';
    }else{
        $panal_table_Display='none';

    }?>

    <div class="panel panel-info" id="table_panal" style="display: <?=$panal_table_Display?>">
        <div class="panel-heading panel-title">
            طالبات الحج /العمرة
        </div>
        <div class="panel-body">
            <div class="col-md-12 text-center" id="table_div">
            </div>
        </div>
    </div>

</div>


<div class="modal" id="member_details_modal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" data-wow-duration="0.5s">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="myModalLabel"> التفاصيل</h4>
            </div>
            <div class="modal-body" id="load_member_div">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-defualt" data-dismiss="modal" aria-label="Close">إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
