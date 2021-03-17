<!-- yaraaaaaaaaaaaaaaaaa -->
<!-- yaraaaa26-7-2020 -->
<!-- yaraaaaaaaaaaaaaaaaa -->
<!-- yaraaaa26-7-2020 -->
<style>
 .mailbox-messages > .table {
        margin: 0;
    }
    .mailbox-controls {
        padding: 5px;
    }
    .mailbox-controls.with-border {
        border-bottom: 1px solid #f4f4f4;
    }
    .mailbox-read-info {
        border-bottom: 1px solid #f4f4f4;
        padding: 10px;
    }
    .mailbox-read-info h3 {
        font-size: 20px;
        margin: 0;
    }
    .mailbox-read-info h5 {
        margin: 0;
        padding: 5px 0 0 0;
    }
    .mailbox-read-time {
        color: #999;
        font-size: 13px;
    }
    .mailbox-attachments li {
        float: left;
        width: 200px;
        border: 1px solid #eee;
        margin-bottom: 10px;
        margin-right: 10px;
        float: right;
    }
    .mailbox-attachment-name {
        font-weight: bold;
        color: #666;
    }
    .mailbox-attachment-info {
        padding: 10px;
        background: #f4f4f4;
    }
    .mailbox-attachment-size {
        color: #999;
        font-size: 12px;
        margin-bottom: 17px;
    }
</style>
<?php
if (isset($da3wat_tataw3) && !empty($da3wat_tataw3) ) {

    
    $data = $da3wat_tataw3;
        ?>
        <div class="modal modal-startup_tataw3 fade" id="tataw3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document" style="width: 90%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="myModalLabel">
                            <i class="fa fa-envelope-open-o" aria-hidden="true">احتياج فرصة تطوعية</i> 
                        </h6>
                        <p style="color: red; float: left;margin-top: -27px"> </p>
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
                                    <?php if (isset($data->wasf) && !empty($data->wasf)) {
                                        echo $data->wasf;
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
                                    <div class="col-md-6">
                                        <a onclick="confirm(<?= $data->id ?>,'accept')"
                                           class="btn btn-success btn-block"><b> قبول</b></a>
                                    </div>
                                    <div class="col-md-6">
                                        <a onclick="confirm(<?= $data->id ?>,'refuse')"
                                           class="btn btn-danger btn-block"><b>  رفض</b></a>
                                    </div>
                                    
                                </div>
                                <br/> <br/>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php }
 ?>
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
                            url: '<?php echo base_url() ?>human_resources/tataw3/Emptatw3/reply_dawa',
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
                                $('#tataw3').modal('hide');
                                swal({
                                        title: "تم !",
                                    }
                                );
                                location.reload();
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
                            url: '<?php echo base_url() ?>human_resources/tataw3/Emptatw3/reply_dawa',
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
                                $('#tataw3').modal('hide');
                                swal({
                                        title: "تم !",
                                    }
                                );
                                location.reload();
                            }
                        });
                    } else {
                        swal("تم الالغاء", "", "error");
                    }
                });
        }
    }
</script>