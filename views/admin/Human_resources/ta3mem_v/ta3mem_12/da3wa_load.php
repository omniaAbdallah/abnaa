<!-- yaraaaaaaaaaaaaaaaaa -->
<!-- yaraaaa26-7-2020 -->
<!-- yaraaaaaaaaaaaaaaaaa -->
<!-- yaraaaa26-7-2020 -->

<?php
if (isset($da3wat) && !empty($da3wat)) {
    $hearder_text = '';
    $hint =false;


    if (isset($da3wat['t3mem']) && !empty($da3wat['t3mem'])) {
        $hearder_text = ' تعميم داخلي';
        $data = $da3wat['t3mem'];
        if (empty($hint)) {
            $hint = "يوجد تعميم داخلي الرجاء الذهاب الى الخدمات الذاتية ";
        }
    }
    if (isset($da3wat['adv']) && !empty($da3wat['adv'])) {
        $hearder_text = ' اعلان ';
        $data = $da3wat['adv'];
        if (empty($hint)) {
            $hint = "يوجد اعلان الرجاء الذهاب الى الخدمات الذاتية";
        }
    }
    if (!empty($hearder_text)) {
        ?>
        <div class="modal modal-startup fade" id="dawa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document" style="width: 90%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="myModalLabel">
                            <i class="fa fa-envelope-open-o" aria-hidden="true"></i> <?= $hearder_text ?>

                        </h6>
                        <p style="color: red; float: left;margin-top: -27px"> <?= $hint ?></p>
                    </div>
                    <div class="modal-body">
                        <div class="col-xs-12">
                            <h6 class=""
                                style="font-weight: bold !important;font-size: 15px !important; color: #a70000;">
                                الاستاذ/<?= $data->emp_name; ?>
                            </h6>
                            <h6 style="font-weight: bold !important; color: #09704e;text-align: center;">السلام عليكم
                                ورحمة الله وبركاتة ، وبعد :</h6>
                            <div class="form-group col-sm-12 col-xs-12">
                                <h6 style="line-height: 25px; color: black; font-weight: bold; ">
                                    <i style="color: red;" class="fa fa-quote-right" aria-hidden="true"></i>
                                    <?php if (isset($data->subject) && !empty($data->subject)) {
                                        echo $data->subject;
                                    }
                                    ?>
                                </h6>
                                <i style="color: red;" class="fa fa-quote-left" aria-hidden="true"></i>
                            </div>
                            <div class="form-group col-sm-12 col-xs-12">
                                <h6 style="line-height: 22px; color: #0068c1; font-weight: bold;text-align: center;">
                                    نسأل الله أن يتقبل طاعاتكم وصالح أعمالكم</h6>
                                <h6 style="line-height: 22px; color: #0068c1; font-weight: bold;text-align: center;">
                                    تقبلوا تحياتنا والله يحفظكم</h6>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <!-- yaraaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa -->
                        <div class="modal-footer">
                            <div class="col-xs-12">
                                <div class="col-md-12" id="actionn">
                                    <div class="col-md-4">
                                        <a onclick="confirm(<?= $data->id ?>,'accept')"
                                           class="btn btn-success btn-block"><b>تحديد كمقروء</b></a>
                                    </div>
                                    <div class="col-md-4">
                                        <a onclick="confirm(<?= $data->id ?>,'refuse')"
                                           class="btn btn-danger btn-block"><b>تحديد كغير مقروء</b></a>
                                    </div>
                                    <div class="col-md-4">
                                        <a onclick="confirm(<?= $data->id ?>,'wait')"
                                           class="btn btn-warning btn-block"><b> النظر لاحقا</b></a>
                                    </div>
                                </div>
                                <br/> <br/>
                            </div>
                            <div class=" col-xs-12 ">
                                <?php
                                $ext = pathinfo($data->file, PATHINFO_EXTENSION);
                                $image = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP');
                                $file = array('pdf', 'PDF', 'xls', 'xlsx', ',doc', 'docx', 'txt');
                                if (in_array($ext, $image)) {
                                    ?>
                                    <img src="<?= base_url() ?>uploads/human_resources/ta3mem/<?php if (isset($data->file) && !empty($data->file)) {
                                        echo $data->file;
                                    } ?>" style="width: 100%; height:  400px;"/>
                                <?php } else if (in_array($ext, $file)) { ?>
                                    <iframe src="<?= base_url() ?>human_resources/ta3mem/Ta3mem_c/read_file/<?php if (isset($data->file) && !empty($data->file)) {
                                        echo $data->file;
                                    } ?>" style="width: 100%; height:  400px;" frameborder="0">
                                    </iframe>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php }
} ?>
<!-- yaraaaaaaaaaaaaaaaaa -->
<!-- yaraaaa26-7-2020 -->
<!-- yaraaaaaaaaaaaaaaaaa -->
<!-- yaraaaa26-7-2020 -->
<script>
    function confirm(id, action) {
        if (action == 'refuse') {
            //  $('#refuse_d3wa').show();
            swal({
                    title: "هل انت متاكد من العملية?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "نعم",
                    cancelButtonText: "لا",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function (isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            type: 'post',
                            url: '<?php echo base_url() ?>human_resources/ta3mem/Ta3mem_c/reply_dawa',
                            data: {id: id, action: action},
                            dataType: 'html',
                            cache: false,
                            beforeSend: function () {
                                swal({
                                    title: "جاري  ... ",
                                    text: "",
                                    imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                                    showConfirmButton: false,
                                    allowOutsideClick: false
                                });
                            },
                            success: function (html) {
                                //   alert(html);
                                $('#dawa').modal('hide');
                                swal({
                                        title: "تم !",
                                    }
                                );
                            }
                        });
                    } else {
                        swal("تم الالغاء", "", "error");
                    }
                });
        } else {
            swal({
                    title: "هل انت متاكد من العملية?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "نعم",
                    cancelButtonText: "لا",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function (isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            type: 'post',
                            url: '<?php echo base_url() ?>human_resources/ta3mem/Ta3mem_c/reply_dawa',
                            data: {id: id, action: action},
                            dataType: 'html',
                            cache: false,
                            beforeSend: function () {
                                swal({
                                    title: "جاري  ... ",
                                    text: "",
                                    imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                                    showConfirmButton: false,
                                    allowOutsideClick: false
                                });
                            },
                            success: function (html) {
                                //   alert(html);
                                $('#dawa').modal('hide');
                                swal({
                                        title: "تم !",
                                    }
                                );
                            }
                        });
                    } else {
                        swal("تم الالغاء", "", "error");
                    }
                });
        }
    }
</script>