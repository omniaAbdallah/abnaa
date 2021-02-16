
<div class="box-footer">
                <ul class="mailbox-attachments clearfix">
                    <?php
                    if (isset($morfqat) && !empty($morfqat)) {
                    $z = 1;
                    foreach ($morfqat as $row) { ?>
                        <li id="row_<?= $z ?>" >
                            <?php
                            $ext = pathinfo($row->file, PATHINFO_EXTENSION);
                            $img = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP');
                            $file_exe = array('pdf', 'PDF', 'xls', 'xlsx', ',doc', 'docx', 'txt', 'gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP', 'rar', 'tar.gz', 'zip');
                            if (in_array($ext, $img)) {
                                ?>
                                <span class="mailbox-attachment-icon has-img" data-toggle="modal" data-target="#myModal-view-<?= $row->id ?>">
                                    <img
                                            src="<?php if (file_exists('uploads/family_attached/osr_talbat_electric_device_files/'.$row->file)) {
                                                echo base_url() .'uploads/family_attached/osr_talbat_electric_device_files/'.$row->file;
                                            } ?> " alt="Attachment">
                                </span>
                                <div class="mailbox-attachment-info">
                                   
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
                                                        <img src="<?= base_url().'uploads/family_attached/osr_talbat_electric_device_files/'.$row->file?>"
                                                             width="100%" alt="">
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
                                        <a href="<?php echo base_url() . 'family_controllers/talbat/Talb_electric_device/download_file/' . $row->file.'/3' ?>"
                                           class="btn btn-default btn-xs pull-right" download>
                                            <i class=" fa fa-download"></i></a>
                                            <a href="#" onclick='
                                                    delete_morfq(<?= $row->id ?>,<?= $row->talab_rkm_fk ?>);' class="btn btn-default btn-xs pull-right">
                                            <i class="fa fa-trash"> </i></a>
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
                                   
                                    <span class="mailbox-attachment-size">
                                       
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
                                                            <iframe src="<?php echo base_url() . 'family_controllers/talbat/Talb_electric_device/read_file/' . $row->file ?>" style="width: 100%; height:  640px;" frameborder="0"> </iframe>
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
                                        <a href="<?php echo base_url() . 'family_controllers/talbat/Talb_electric_device/download_file/' . $row->file.'/3' ?>"
                                           class="btn btn-default btn-xs pull-right" download>
                                            <i class=" fa fa-download"></i></a>
                                        <a href="#" onclick='
                                                    delete_morfq(<?= $row->id ?>,<?= $row->talab_rkm_fk ?>);' class="btn btn-default btn-xs pull-right">
                                            <i class="fa fa-trash"> </i></a>
                                    </span>
                                </div>
                                <?php
                            } ?>
                        </li>
                    <?php $z++; } } ?>
                </ul>
            </div>

            