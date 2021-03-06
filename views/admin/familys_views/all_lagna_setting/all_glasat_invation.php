<?php if (isset($all_current_invation) && !empty($all_current_invation)) { ?>

    <div class="col-sm-12  no-padding">
        <?php foreach ($all_current_invation as $item) { ?>
            <div class="col-md-1  no-padding"></div>
            <div class="col-md-10  no-padding">
                <div class="panel panel-default" style="border: solid 1px #f0f0f0">
                    <div class="panel-heading"> <?= $item['glsa_rkm_full'] ?> جلسة رقم</div>

                    <div class="panel-body">

                        <div class="col-xs-12"><h6 class=""
                                                   style="font-weight: bold !important;font-size: 15px !important; color: #a70000;">
                                الاستاذ/<?= $item['member_name']; ?>
                            </h6>
                            <h6 style="font-weight: bold !important; color: #09704e;text-align: center;">
                            </h6>
                            <div class="form-group col-sm-12 col-xs-12">
                                <h6 style="line-height: 25px; color: black; font-weight: bold; ">
                                    <i style="color: red;" class="fa fa-quote-right" aria-hidden="true"></i>
                                    لديك دعوة لحضور جلسة رقم <?= $item['glsa_rkm_full'] ?>
                                    يوم <?= date('Y-m-d', $item['date']) ?>
                                    <i style="color: red;" class="fa fa-quote-left" aria-hidden="true"></i>
                                </h6>
                            </div>
                            <div class="form-group col-sm-12 col-xs-12">
                                <div class="form-group col-sm-12 col-xs-12 ">
                                    <label for="note">ملاحظات</label>
                                    <textarea name="note" class="form-control" id="note" rows="2"> </textarea>
                                </div>
                            </div>
                        </div>

                        <div  style="float: left">
                            <button type="button" class="btn btn-labeled btn-success "
                                    onclick="do_replay(1,<?= $item['id'] ?>)" name="add" value="حفظ">
                                <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>تأكيد
                                الحضور
                            </button>
                            <button type="button" class="btn btn-labeled btn-danger "
                                    onclick="do_replay(2,<?= $item['id'] ?>)">
                                <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>الاعتذار عن
                                الحضور
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1  no-padding"></div>
            <div class="clearfix"></div>
<!--            <br>-->
        <?php } ?>
    </div>
<?php } ?>
<div class="clearfix"></div>
<div class="col-sm-12  no-padding">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-body">
            <?php if (isset($all_glasat_invation) && !empty($all_glasat_invation)) { ?>
                <table id="" class=" display table table-bordered   responsive nowrap example" cellspacing="0" width="100%">
                    <thead>
                    <tr class="blacktd">
                        <th>م</th>
                        <th>رقم الجلسة</th>
                        <th>تاريخ الجلسة</th>
                        <th>الاجراء</th>
                        <th>وقت الاجراء</th>
                        <th>تاريخ الاجراء</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $x = 1;
                    /*
                    echo '<pre>';
                    print_r($all_glasat_invation);*/
                    foreach ($all_glasat_invation as $record) {

                        switch ($record['replay_invitation']) {
                            case 1:
                                $replay_invitation = "تأكيد الحضور";
                                $color = '#67c285';
                                break;
                            case 2:
                                $replay_invitation = "اعتذار عن الحضور";
                                $color = '#e95467';
                                break;
                            default:
                                $replay_invitation = " لم يتم الرد ";
                                $color = '#55CCBE';
                                break;
                        }
                        ?>
                        <tr>
                            <td><?= $x++ ?></td>
                            <td><?= $record['glsa_rkm_full']; ?></td>
                            <td><?= date("Y-m-d", $record['date']) ?></td>
                            <td style="background-color: <?= $color ?>"><?= $replay_invitation ?> </td>
                            <td style="background-color: <?= $color ?>"><?= $record['replay_invitation_time'] ?> </td>
                            <td style="background-color: <?= $color ?>"><?= $record['replay_invitation_date_s'] ?> </td>

                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <?php
            } else {
                echo "<div class='alert alert-danger'>لا توجد بيانات</div>";
            }
            ?>
        </div>
    </div>
</div>

<script>

    function do_replay(replay, row_id) {
        var note = $('#note').val();
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>family_controllers/LagnaSetting/do_replay",
            data: {replay: replay, row_id: row_id, note: note},
            beforeSend: function () {
                notify = $.notify('<strong>جاري</strong>  الرد على الدعوة...', {
                    placement: {
                        from: "top",
                        align: "center"
                    },
                    offset: 20,
                    spacing: 10,
                    delay: 1000 * 15,
                    z_index: 1031,
                    allow_dismiss: false,
                    showProgressbar: true
                });
            },
            success: function (response) {
                notify.update({
                    'type': 'success',
                    'message': '<strong>تم </strong>  تم الرد على الدعوة',
                    'progress': 80
                });
                window.location.reload();
            }
        });

    }
</script>