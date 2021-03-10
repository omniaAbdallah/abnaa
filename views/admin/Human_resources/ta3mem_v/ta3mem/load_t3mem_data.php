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
        width: 28%;
        border: 1px solid #eee;
        margin-bottom: 10px;
        margin-right: 10px;
        float: right;
        height: 193px;
        position: relative;
    }

    .mailbox-attachment-name {
        font-weight: bold;
        color: #666;
    }

    .mailbox-attachment-info {

        padding: 10px;
        background: #f4f4f4;
        position: ;
        position: absolute;
        /* margin-top: auto; */
        bottom: 0px;
        /* top: 78%; */
        /* left: 50%; */
        /* transform: translate(0%, -52%); */
        width: 218px;
        }

        .mailbox-attachment-size {
            color: #999;
            font-size: 12px;
            margin-bottom: 17px;
        }

        ul, ol {
            margin-top: 0;
            margin-bottom: 10px;
            /* border: dotted; */
        list-style: none;
    }

    .image_style {
        width: 160px;
        height: 144px;
    }

    .icone-cus {
        position: absolute;
        transform: translate(-50%, -50%);
        font-size: 25px;
        top: 50%;
        left: 50%;
    }
</style>

<?php
if (isset($t3mem_data) && !empty($t3mem_data)) {
    ?>
    <div class="panel panel-default" style="border: solid 1px #f0f0f0">
        <div class="panel-heading"> التعميمات</div>
        <div class="panel-body">
            <h6 class=""
                style="font-weight: bold !important;font-size: 15px !important; color: #a70000;">
                الاستاذ/<?= $t3mem_data->emp_name; ?></h6>
            <h6 style="font-weight: bold !important; color: #09704e;text-align: center;">
                السلام
                عليكم ورحمة
                الله وبركاتة ، وبعد :</h6>
            <div class="form-group col-sm-12 col-xs-12">
                <h6 style="line-height: 25px; color: black; font-weight: bold; ">
                    <i style="color: red;" class="fa fa-quote-right"
                       aria-hidden="true"></i>
                    <?php if (isset($t3mem_data->basic_data->subject) && !empty($t3mem_data->basic_data->subject)) {
                        echo $t3mem_data->basic_data->subject;
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

            <!-- /.box-body -->
            <!-- yaraaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa -->
            <div>
                <?php if ($t3mem_data->seen == 0) { ?>

                    <div class="col-xs-12">
                        <div class="col-md-12" id="actionn">
                            <div class="col-md-4">
                                <a onclick="confirm_t3mem(<?= $t3mem_data->id ?>,'accept')"
                                   class="btn btn-success btn-block"><b> موافقة</b></a>
                            </div>
                            <div class="col-md-4">
                                <a onclick="confirm_t3mem(<?= $t3mem_data->id ?>,'refuse')"
                                   class="btn btn-danger btn-block"><b> رفض</b></a>
                            </div>
                            <div class="col-md-4">
                                <a onclick="confirm_t3mem(<?= $t3mem_data->id ?>,'wait')"
                                   class="btn btn-warning btn-block"><b> النظر لاحقا</b></a>
                            </div>
                        </div>
                        <br/> <br/>
                    </div>
                <?php } ?>
                <div class=" col-xs-12 ">
                    <ul class="mailbox-attachments clearfix">
                        <?php
                        if (isset($t3mem_data->attach_data) && !empty($t3mem_data->attach_data)) {
                            $z = 1;
                            foreach ($t3mem_data->attach_data as $row) { ?>
                                <li id="row_<?= $z ?>">
                                    <?php
                                    $ext = pathinfo($row->file, PATHINFO_EXTENSION);
                                    $img = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP');
                                    $file_exe = array('pdf', 'PDF', 'xls', 'xlsx', ',doc', 'docx', 'txt', 'gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP', 'rar', 'tar.gz', 'zip');
                                    if (in_array($ext, $img)) {
                                        ?>
                                        <div class="">

                                        <span class="mailbox-attachment-icon has-img"
                                              data-toggle="modal"
                                              data-target="#myModal-view-<?= $row->id ?>">
                                    <img

                                            class="image_style"

                                            src="<?php if (file_exists('uploads/human_resources/ta3mem/' . $row->file)) {
                                                echo base_url() . 'uploads/human_resources/ta3mem/' . $row->file;
                                            } ?> " alt="Attachment">
                                </span>
                                        </div>
                                        <div class="mailbox-attachment-info">
                                    <span class="mailbox-attachment-name">
                                        <?= $row->title ?>
                                    </span>
                                            <span class="mailbox-attachment-size">
                                        <a data-toggle="modal" data-target="#myModal-view-<?= $row->id ?>"
                                           class="btn btn-default btn-xs pull-right">
                                        <i class=" fa fa-eye"></i></a>
                                                <!-- modal view -->
                                        <div class="modal fade" id="myModal-view-<?= $row->id ?>" tabindex="-1"
                                             role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                      
                                                        <h4 class="modal-title" id="myModalLabel">الصورة</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img


                                                                src="<?= base_url() . 'uploads/human_resources/ta3mem/' . $row->file ?>"
                                                                width="100%"
                                                                alt="">
                                                    </div>
                                                    <div class="modal-footer">
                                                        
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
                                        <div class="">

                                        <span class="mailbox-attachment-icon icone-cus"><i class="fa fa-file-<?= $extin ?>-o"></i></span>
                                        </div>
                                        <div class="mailbox-attachment-info">
                                    <span class="mailbox-attachment-name">
                                        <?= $row->title ?>
                                    </span>
                                            <span class="mailbox-attachment-size">
                                        <!--<a href="<?php echo base_url() . 'human_resources/ta3mem/Ta3mem_c/download_file/' . $row->id ?>"
                                           class="btn btn-default btn-xs pull-right" download>
                                            <i class="fa fa-cloud-download"></i></a>-->
                                        <?php if ($viewpdf == 1) { ?>
                                            <a data-toggle="modal" data-target="#myModal-pdf-<?= $row->id ?>"
                                               class="btn btn-default btn-xs pull-right">
                                            <i class=" fa fa-eye"></i></a>
                                            <!-- start modal view pdf -->








                                            <div class="modal fade" id="myModal-pdf-<?= $row->id ?>" tabindex="-1"
                                                 role="dialog" aria-labelledby="myModalLabel">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close"><span
                                                                        aria-hidden="true">&times;</span>
                                                            </button>
                                                            <h4 class="modal-title" id="myModalLabel">الملف</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <iframe src="<?php echo base_url() . 'human_resources/ta3mem/Ta3mem_c/read_file/' . $row->file ?>"
                                                                    style="width: 100%; height:  640px;"
                                                                    frameborder="0"> </iframe>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default"
                                                                    data-dismiss="modal">
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
                                <?php $z++;
                            }
                        } ?>
                    </ul>
                    <!-- yara -->
                </div>
            </div>
        </div>
    </div>
    <?php
} ?>