<?php if (isset($one_data) && (!empty($one_data))) {
    $type_to_arr = array('emp' => "الموظف", 'job' => "المسمى الوظيفي");
    $need_mony_arr = array('yes' => "نعم", 'no' => "لا ");
    ?>
    <table class="table table-responsive">
        <tbody>
        <tr>
            <th > رقم الطلب :</th>
            <td>  <?= $one_data['rkm'] ?></td>
            <th colspan="2"> تاريخ الطلب :</th>
            <td colspan="2">  <?= $one_data['date_ar'] ?></td>

            <th> الفئة الطلب :</th>
            <td>  <?php if (key_exists($one_data['type_to'], $type_to_arr)) {
                    echo $type_to_arr[$one_data['type_to']];
                } else {
                    echo 'غير محدد';
                } ?></td>
        </tr>

        <tr>
            <?php $from_emp_name = $one_data['from_data']['employee'];
            $from_emp_id = $one_data['from_data']['id'];
            $from_edara_n = $one_data['from_data']['edara_n'];
            $from_qsm_n = $one_data['from_data']['qsm_n'];
            $from_mosma_wazefy_n = $one_data['from_data']['mosma_wazefy_n']; ?>
            <th> اسم الموظف :</th>
            <td>  <?= $from_emp_name ?></td>
            <th> الادارة :</th>
            <td>  <?= $from_edara_n ?></td>
            <th> القسم :</th>
            <td><?= $from_qsm_n ?>  </td>
            <th> المسمى الوظيفي :</th>
            <td><?= $from_mosma_wazefy_n ?>  </td>
        </tr>
        <tr>
            <th> من تاريخ :</th>
            <td><?= date('Y-m-d', $one_data['from_date']) ?></td>
            <th> الى تاريخ :</th>
            <td><?= date('Y-m-d', $one_data['to_date']) ?></td>
            <th colspan="3"> يترتب على ذالك لإستحقاقات مالية :</th>
            <td>
                <?php if (key_exists($one_data['need_mony'], $need_mony_arr)) {
                    echo $need_mony_arr[$one_data['need_mony']];
                } else {
                    echo 'غير محدد';
                } ?>
            </td>

        </tr>
        <tr>
            <th> القيمة :</th>
            <td> <?= $one_data['value'] ?></td>

            <th> مهام اخرى :</th>
            <td colspan="3"> <?= $one_data['other'] ?></td>
            <th> الوصف الوظيفي (المهام) :</th>
            <td> <?php if (!empty($one_data['job_descib'])) {
                    $job_descib = base_url() . 'uploads/human_resources/taklef_orders/' . $one_data['job_descib'];
                    ?>
                    <button type="button" data-toggle="modal" data-target="#myModal_file"
                            class="btn btn-success btn-next" style="float: left;"
                            onclick="set_file_url('<?= $job_descib ?>')">
                        <i class="fa fa-eye"></i></button>
                <?php } else {
                    echo 'غير محدد';
                } ?></td>
        </tr>
        <?php

        if (isset($one_data) && (!empty($one_data))) {
            switch ($one_data['type_to']) {
                case 'emp':


                    $to_emp_name = $one_data['to_data']['employee'];
                    $to_emp_id = $one_data['to_data']['id'];
                    $to_edara_n = $one_data['to_data']['edara_n'];
                    $to_qsm_n = $one_data['to_data']['qsm_n'];
                    $to_mosma_wazefy_n = $one_data['to_data']['mosma_wazefy_n'];

                    $to_job_id = '';
                    $to_job_name = '';

                    break;
                case 'job':

                    $to_emp_name = '';
                    $to_emp_id = '';
                    $to_edara_n = '';
                    $to_qsm_n = '';
                    $to_mosma_wazefy_n = '';

                    $to_job_id = $one_data['to_data']['id'];
                    $to_job_name = $one_data['to_data']['title'];

                    break;
                default:
                    break;
            }
        }
        ?>
        <?php if ($one_data['type_to'] == 'emp') { ?>
            <tr>
                <th> اسم الموظف :</th>
                <td>  <?= $to_emp_name ?></td>
                <th> الادارة :</th>
                <td>  <?= $to_edara_n ?></td>
                <th> القسم :</th>
                <td><?= $to_qsm_n ?>  </td>
                <th> المسمى الوظيفي :</th>
                <td><?= $to_mosma_wazefy_n ?>  </td>
            </tr>
        <?php } elseif ($one_data['type_to'] == 'job') { ?>
            <tr>

                <th> المسمى الوظيفي :</th>
                <td><?= $to_job_name ?>  </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <?php

} ?>
<div class="modal fade" id="myModal_file" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onclick="$('#myModal_file').modal('hide')" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body">
                <div id="myDiv_file">

                    <iframe id="frame_pdf" src="" style="width: 100%; height:  640px;" frameborder="0">
                    </iframe>
                </div>
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <button type="button" class="btn btn-danger"
                        style="float: left;" onclick="$('#myModal_file').modal('hide')">
                    إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    function set_file_url(file_url) {
        $('#frame_pdf').attr('src', file_url);
    }
</script>