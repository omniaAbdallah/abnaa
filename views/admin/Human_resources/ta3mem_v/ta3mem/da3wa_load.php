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
if (isset($da3wat_t3mem) && !empty($da3wat_t3mem) || isset($da3wat_adv) && !empty($da3wat_adv)||isset($da3wat_msg) && !empty($da3wat_msg)) {
    $hearder_text = '';
    $hint =false;
    if (isset($da3wat_t3mem) && !empty($da3wat_t3mem)) {
        $hearder_text = ' تعميم داخلي';
        $data = $da3wat_t3mem;
        if (empty($hint)) {
            $hint = "يوجد تعميم داخلي الرجاء الذهاب الى الخدمات الذاتية ";
        }
    }
    if (isset($da3wat_adv) && !empty($da3wat_adv)) {
        $hearder_text = ' اعلان ';
        $data = $da3wat_adv;
        if (empty($hint)) {
            $hint = "يوجد اعلان الرجاء الذهاب الى الخدمات الذاتية";
        }
    }
    if (isset($da3wat_msg) && !empty($da3wat_msg)) {
        $hearder_text = ' رسالة ';
        $data = $da3wat_msg;
        if (empty($hint)) {
            $hint = "يوجد رسالة الرجاء الذهاب الى الخدمات الذاتية";
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
                                



                                <ul class="mailbox-attachments clearfix">
                    <?php
                    if (isset($data->attaches) && !empty($data->attaches)) {
                    $z = 1;
                    foreach ($data->attaches as $row) { ?>
                        <li id="row_<?= $z ?>" >
                            <?php
                            $ext = pathinfo($row->file, PATHINFO_EXTENSION);
                            $img = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP');
                            $file_exe = array('pdf', 'PDF', 'xls', 'xlsx', ',doc', 'docx', 'txt', 'gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP', 'rar', 'tar.gz', 'zip');
                            if (in_array($ext, $img)) {
                                ?>
                                <span class="mailbox-attachment-icon has-img" data-toggle="modal" data-target="#myModal-view-<?= $row->id ?>">
                                    <img
                                    style="width:200px"
                                            src="<?php if (file_exists('uploads/human_resources/ta3mem/'.$row->file)) {
                                                echo base_url() .'uploads/human_resources/ta3mem/'.$row->file;
                                            } ?> " alt="Attachment">
                                </span>
                                <div class="mailbox-attachment-info">
                                    <span class="mailbox-attachment-name">
                                        <?=$row->title?>
                                    </span>
                                    <span class="mailbox-attachment-size">
                                        
                                        <a data-toggle="modal" data-target="#myModal-view-<?= $row->id ?>" class="btn btn-default btn-xs pull-right">
                                        <i class=" fa fa-eye"></i></a>
                                        <!-- modal view -->
                                        <div class="modal fade" id="myModal-view-<?= $row->id ?>" tabindex="-1"
                                             role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close"><span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <h4 class="modal-title" id="myModalLabel">الصورة</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img src="<?= base_url().'uploads/human_resources/ta3mem/'.$row->file?>"
                                                          width="100%"
                                                            alt="">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">
                                                            إغلاق
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- modal view -->
                                        <a href="<?php echo base_url() . 'human_resources/ta3mem/Ta3mem_c/download_file/' . $row->file ?>"
                                           class="btn btn-default btn-xs pull-right" download>
                                            <i class=" fa fa-download"></i></a>
                                       
                                    </span>
                                </div>
                            <?php } elseif (in_array($ext, $file_exe)) {
                                $viewpdf = 0;
                                switch ($ext) {
                                    case 'doc':
                                    case 'docx':
                                        $extin = 'word';
                                        break;
                                    case 'xls':
                                    case 'xlsx':
                                        $extin = 'excel';
                                        break;
                                    case 'PDF':
                                    case 'pdf':
                                        $extin = 'pdf';
                                        $viewpdf = 1;
                                        break;
                                    case 'txt':
                                        $extin = 'text';
                                        break;
                                    case 'rar':
                                    case 'zip':
                                    case 'tar.gz':
                                    case 'gz':
                                        $extin = 'archive';
                                        break;
                                    default:
                                        $extin = '';
                                        break;
                                } ?>
                                <span class="mailbox-attachment-icon">
                                    <i class="fa fa-file-<?= $extin ?>-o"></i>
                                </span>
                                <div class="mailbox-attachment-info">
                                    <span class="mailbox-attachment-name">
                                        <?=$row->title?>
                                    </span>
                                    <span class="mailbox-attachment-size">
                                        <!--<a href="<?php echo base_url() . 'human_resources/ta3mem/Ta3mem_c/download_file/' . $row->id ?>"
                                           class="btn btn-default btn-xs pull-right" download>
                                            <i class="fa fa-cloud-download"></i></a>-->
                                        <?php if($viewpdf == 1){ ?>
                                            <a data-toggle="modal" data-target="#myModal-pdf-<?= $row->id ?>" class="btn btn-default btn-xs pull-right">
                                            <i class=" fa fa-eye"></i></a>
                                            <!-- start modal view pdf -->
                                            <div class="modal fade" id="myModal-pdf-<?= $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close"><span aria-hidden="true">&times;</span>
                                                            </button>
                                                            <h4 class="modal-title" id="myModalLabel">الملف</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <iframe src="<?php echo base_url() . 'human_resources/ta3mem/Ta3mem_c/read_file/' . $row->file ?>" style="width: 100%; height:  640px;" frameborder="0"> </iframe>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                                                إغلاق
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end modal view pdf -->
                                        <?php } ?>
                                        <a href="<?php echo base_url() . 'human_resources/ta3mem/Ta3mem_c/download_file/' . $row->file ?>"
                                           class="btn btn-default btn-xs pull-right" download>
                                            <i class=" fa fa-download"></i></a>
                                      
                                    </span>
                                </div>
                                <?php
                            } ?>
                        </li>
                    <?php $z++; } } ?>
                </ul>

                                <!-- yara -->



















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