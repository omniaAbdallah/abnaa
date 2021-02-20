<div class="col-sm-12  no-padding">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?= $title ?></h3>
        </div>
        <div class="panel-body">
            <?php
            if (isset($records) && !empty($records) && $records != null) {
                ?>
                <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0"
                       width="100%">
                    <thead>
                    <tr class="visible-md visible-lg info">
                        <th>مسلسل</th>
                        <th>رقم الجلسه</th>
                        <th>تاريخ الجلسه</th>
                        <th>حاله الجلسه</th>
                        <th> تفاصيل</th>
                        <th>الاعتمادات</th>
                        <th>حفظ</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $options = array(1 => 'معتمد', 2 => 'معتمد مع التحفظ', 3 => 'معتذر');
                    $x = 1;
                    if (isset($records) && !empty($records)) {
                        foreach ($records as $row) {
                            $suspend = "جلسة منتهية ";
                            $btn = 'background-color: #e8a50d; color: white;';
                            if ($row->finished == 1) {
                                $suspend = "جلسة منتهية ";
                                $btn = 'background-color: #e8a50d; color: white;';
                            } elseif ($row->finished == 0) {
                                if ($row->suspend == 1) {
                                    $suspend = "جلسة نشطة";
                                    $btn = 'background-color: #3c990b; color: white;';
                                } elseif ($row->suspend == 0) {
                                    $suspend = "جلسة غير نشطة";
                                    $btn = 'background-color: #e5343d; color: white;';
                                }
                            } ?>
                            <tr>
                                <td><?php echo $x; ?></td>
                                <!--  <td><?php echo $row->year; ?>/<?php echo $row->session_number; ?></td> -->
                                <td><?php echo $row->glsa_rkm_full; ?></td>
                                <td><?php echo date('Y-m-d', $row->date); ?></td>

                                <td style="<?= $btn ?>"><?= $suspend ?></td>
                                <td>
                                    <button type="button"
                                            onclick="get_sessin_data('<?php echo $row->session_number; ?>','<?php echo $row->year; ?>');"
                                            class="btn btn-sm btn-add" data-toggle="modal" data-target="#myModal">
                                        <span class="fa fa-list"></span>تفاصيل الجلسة
                                    </button>

                                </td>
                                <td>
                                    <?php $is_disable = "disabled";
                                    if ($row->member_id = $_SESSION["emp_code"]) {
                                        if ($row->do_action == 0 && $row->session_active == 0) {
                                            $is_disable = '';
                                        } elseif ($row->do_action == 0 && $row->session_active == 1) {
                                            $is_disable = 'disabled';
                                        } elseif ($row->do_action == 1 && $row->session_active == 1) {
                                            $is_disable = '';
                                        } elseif ($row->do_action == 1 && $row->session_active == 0) {
                                            $is_disable = '';
                                        }
                                        $dif = time() - $row->finished_date_s;
                                        if ($dif >= (3600 * 15)) {
                                            $is_disable = '';
                                        }
                                    }
                                    ?>
                                    <?php foreach ($options as $key => $value) { ?>
                                        <div class="radio-content">
                                            <input type="radio"
                                                   class="check<?php echo $row->session_number; ?>" <?= $is_disable ?>
                                                   name="<?php echo $row->session_number; ?>" value="<?= $key ?>"

                                                <?php if (isset($row->member_decision) && $row->member_decision == $key) {
                                                    echo 'checked';
                                                } ?> id="sign<?= $key . '-' . $row->session_number ?>">
                                            <label class="radio-label"
                                                   for="sign<?= $key . '-' . $row->session_number ?>"> <?= $value ?></label>
                                        </div>
                                    <?php } ?>
                                </td>
                                <td>
                                    <button class="btn btn-save btn-success"
                                            onclick="get_member_decision(<?php echo $row->member_id; ?>,<?php echo $row->lagna_number; ?>,<?php echo $row->session_number; ?>);">
                                        حفظ
                                    </button>
                                </td>
                            </tr>
                            <?php
                            $x++;
                        }
                    }
                    ?>
                    </tbody>
                </table>
            <?php } else { ?>
                <div class="alert alert-danger">لا توجد جلسات لهذا المستخدم</div>
            <?php } ?>
        </div>
    </div>
</div>

<div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-wow-duration="0.5s">
    <div class="modal-dialog" role="document" style="width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">
                    <strong id="result_head"></strong>
                </h4>
            </div>
            <div class="modal-body">
                <div id="result_model"></div>
            </div>
            <div class="modal-footer" style="display: inline-block; width: 100%;">
                <button type="button" class="btn btn-danger btn-labeled" data-dismiss="modal"><span class="btn-label"><i
                                class="fa fa-remove"></i></span>إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    function get_sessin_data(session_num, session_year) {
        var dataString = "session_num=" + session_num;
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>family_controllers/LagnaSetting/load_galsa_detailes',
            data: dataString,
            dataType: 'html',
            cache: false,
            beforeSend: function () {
                $('#result_model').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (html) {
                $("#result_head").html('محضر اجتماع لجنة الرعاية الإجتماعية رقم (' + session_year + '/' + session_num + ') ');
                $("#result_model").html(html);
            }
        });
    }
</script>
<script>
    function get_member_decision(member_id, lagna_id, session_id) {
        var option = $(".check" + session_id + ':radio:checked').val();
        var radioValue = $("input[name='" + session_id + "']:checked").val();

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>family_controllers/LagnaSetting/make_member_decision",
            data: {member_id: member_id, lagna_id: lagna_id, session_id: session_id, valu: radioValue},
            beforeSend: function () {
                swal({
                    title: "جاري اتخاذ القرار ... ",
                    text: "",
                    imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                    showConfirmButton: false,
                    allowOutsideClick: false
                });
            },
            success: function (response) {
                swal({
                    title: 'تم اتخاذ القرار بنجاح',
                    type: 'success',
                    confirmButtonText: 'تم'
                });
            }
        });
    }
</script>