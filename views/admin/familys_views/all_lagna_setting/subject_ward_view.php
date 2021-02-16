<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $title ?></h3>
    </div>
    <div class="panel-body">

        <?php if (!empty($all_orders)) { ?>
            <table class="table example table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th class="text-center"> م</th>
                    <th class="text-center"> المحور</th>
                    <th class="text-center">رقم الملف</th>
                    <th class="text-center">إسم الأب</th>
                    <th class="text-center">رقم هوية الأب</th>
                    <th class="text-center"> التفاصيل</th>
                    <th class="text-center"> الإجراء</th>
                </tr>
                </thead>
                <tbody>
                <?php $m = 1;
                /* echo '<pre>';
                 print_r($all_orders);*/
                foreach ($all_orders as $record) {
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $m; ?></td>
                        <td class="text-center"><?php echo $record->title; ?></td>

                        <td class="text-center"><?php echo $record->file_num; ?></td>
                        <td class="text-center"><?php if (!empty($record->full_name)) {
                                echo $record->full_name;
                            } else {
                                echo 'غير محدد';
                            } ?></td>
                        <td class="text-center"><?php if (!empty($record->f_national_id)) {
                                echo $record->f_national_id;
                            } else {
                                echo 'غير محدد';
                            } ?></td>
                        <td class="text-center">
                            <button type="button" class="btn btn-info btn-xs"
                                    data-toggle="modal"
                                    onclick="GetModalData(<?php echo $record->mother_national_num; ?>)"
                                    data-target="#myModal">التفاصيل<i
                                        class="fa fa-list btn-info"></i></button>
                        </td>
                        <td>
                            <div class="check-style">
                                <input type="checkbox" name="" id="choose-<?= $record->id ?>" value="<?= $record->id ?>"
                                       class="checkbox_esal">
                                <label for="choose-<?= $record->id ?>"></label>
                            </div>
                        </td>
                        <!--<td>

                            <button type="button" class="btn btn-success  btn-xs "
                                    title="قبول البند "
                                    onclick="getApproved(1,<?php /*echo $record->id; */ ?>,<?php /*echo $session_num['id']; */ ?>)">
                                <i class="glyphicon glyphicon-ok"></i> قبول البند
                            </button>
                            <button type="button" class="btn btn-danger  btn-xs "
                                    title="رفض البند "
                                    onclick="getApproved(2,<?php /*echo $record->id; */ ?>,<?php /*echo $session_num['id']; */ ?>)">
                                <i class="glyphicon glyphicon-remove"></i> رفض البند
                            </button>

                        </td>-->
                    </tr>
                    <?php $m++;
                } ?>
                </tbody>
            </table>
            <?php if (isset($session_num) && (!empty($session_num))) { ?>
                <div class="col-md-12" style="margin-top: 25px;">
                    <button type="button" class="btn btn-warning btn-labeled" onclick="get_esalt()"
                            style="float: left;    font-family: 'hl';">
                        <span class="btn-label"><i class="fa fa-share"></i></span> تحويل الجلسة
                        رقم <?= $session_num['glsa_rkm_full'] ?>
                    </button>
                </div>
            <?php } ?>
        <?php } else { ?>
            <div class="col-lg-12 alert alert-danger"> لا يوجد بنود واردة</div>
        <?php } ?>
    </div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog " style="width: 90%" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"></h4>
                <h5 class="line-text" style="color:red"></h5>
                <h5 class="line-text" style="font-size: 15px">تفاصيل الاسره </h5>
                <h5 class="line-text" style="color:red"></h5>
            </div>
            <div class="modal-body">
                <div id="ModalDataDiv"></div>
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<script>
    function get_esalt() {
        var checkbox_value = [];
        var oTable = $('.example').dataTable();
        var rowcollection = oTable.$(".checkbox_esal:checked", {"page": "all"});
        rowcollection.each(function (index, elem) {
            checkbox_value.push($(elem).val());
        });
        console.log("checkbox_value : " + checkbox_value);
        if (checkbox_value == "") {
            swal({
                title: "من فضلك اختر احد البنود لتحوليها ",
                type: "warning",
                confirmButtonText: "تم"
            });
        } else {
            swal({
                    title: "هل تريد  تحويل  إلى  الجلسة ؟",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-warning",
                    confirmButtonText: "نعم",
                    cancelButtonText: "لا ",
                    closeOnConfirm: true,
                    closeOnCancel: false,
                    showLoaderOnConfirm: true
                },
                function (isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            type: 'post',
                            url: "<?php echo base_url();?>family_controllers/LagnaSetting/update_deport_subject_ward",
                            data: {
                                checkbox_id: checkbox_value,
                                session_num_id: <?=$session_num['session_number']?>
                            },
                            success: function (d) {
                                console.log(" تمت العمليه بنجاح" );
                                if (d == 1) {
                                    swal({
                                        title: "تم التحويل بنجاح.",
                                        type: "warning",
                                        confirmButtonText: "تم",
                                        closeOnConfirm: true
                                    });
                                    location.reload();
                                } else {
                                    swal({
                                        title: "حدث خطأ...  لم يتم التحويل.",
                                        text: "من فضلك اختر احد البنود لتحوليها ",
                                        type: "warning",
                                        confirmButtonText: "تم"
                                    });
                                }
                            }
                        });
                    }
                });
        }
    }
</script>
<script>
    function GetModalData(mother_num) {
        if (mother_num > 0 && mother_num != '') {
            var dataString = 'mother_num=' + mother_num;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>family_controllers/LagnaSetting/details_family_files',
                data: dataString,
                dataType: 'html',
                cache: false,
                beforeSend: function () {
                    $('#ModalDataDiv').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
                },
                success: function (html) {
                    $("#ModalDataDiv").html(html);
                }
            });
        }
    }
</script>