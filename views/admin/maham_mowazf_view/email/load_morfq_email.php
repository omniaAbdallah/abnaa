

            <div class="inbox-mail-details p-20">

                <h6 style="color: red;"><i class="fa fa-paperclip"></i> المرفقات <span></span></h6>

                

                <div class="box-footer">

                    <ul class="mailbox-attachments clearfix">





                    <?php foreach ($files as $files) {

                       

                ?>

                        <li>

                   <?php     if (!empty($files->file) || $files->file != 0) {

                    $ext = pathinfo($files->file, PATHINFO_EXTENSION);

                    $Destination = 'uploads/emails/' . $files->email_rkm .'/'.$files->file;

                    if (file_exists($Destination)){

                        $bytes=  filesize($Destination) ;

                    } else{

                        $bytes ='';

                    }

                     $size = '';

                    if ($bytes >= 1073741824)

                    {

                        $size = number_format($bytes / 1073741824, 2) . ' GB';

                    }

                    elseif ($bytes >= 1048576)

                    {

                        $size = number_format($bytes / 1048576, 2) . ' MB';

                    }

                    elseif ($bytes >= 1024)

                    {

                        $size = number_format($bytes / 1024, 2) . ' KB';

                    }

                    elseif ($bytes > 1)

                    {

                        $size = $bytes . ' bytes';

                    }

                    elseif ($bytes == 1)

                    {

                        $size = $bytes . ' byte';

                    }

                    else

                    {

                        $size = '0 bytes';

                    }

                }

                    $img = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP');

                    // $file_exe = array('pdf', 'PDF', 'xls', 'xlsx', ',doc', 'docx', 'txt', 'gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP');

                    $file_exe = array('pdf', 'PDF', 'xls', 'xlsx', ',doc', 'docx', 'txt', 'gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP', 'rar', 'tar.gz', 'zip');

                    if (in_array($ext, $img)) {

                                                    ?>

                                                    <span class="mailbox-attachment-icon has-img"><img

                                        src="<?php if (file_exists('uploads/emails/' . $files->email_rkm . '/' . $files->file)) {

                                                             echo base_url() . 'uploads/emails/' . $files->email_rkm . '/' . $files->file;

                                                         } ?> " alt="Attachment"></span>

                          

                                        <div class="mailbox-attachment-info">

                                <a onclick="$('#email_img').attr('src','<?= base_url() . 'uploads/emails/' . $files->email_rkm . '/' . $files->file ?>')"

                                                                       data-toggle="modal" data-target="#exampleModal" class="mailbox-attachment-name"><i class="fa fa-camera"></i>

                                                                        <!-- <?=$files->file?> -->

                                                                        </a>

                                <span class="mailbox-attachment-size">

                                <?= $size?>

                                <a href="<?= base_url() . "maham_mowazf/email/Emails/download_file/" . $files->email_rkm . '/' . $files->file ?>" class="btn btn-default btn-xs pull-right" download><i class="fa fa-cloud-download"></i></a>

         

        </span>

                            </div>

                    <?php }elseif (in_array($ext, $file_exe)) {

                        if($ext=='pdf'){

                        ?>

                        <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>

                            <div class="mailbox-attachment-info">

                                <a href="<?= base_url() . "maham_mowazf/email/Emails/download_file/" . $files->email_rkm . '/' . $files->file ?>" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>

                                <!-- <?=$files->file?> -->

                                </a>

                                <span class="mailbox-attachment-size">

                                <?= $size?>

                                <a href="<?= base_url() . "maham_mowazf/email/Emails/download_file/" . $files->email_rkm . '/' . $files->file ?>" class="btn btn-default btn-xs pull-right" download><i class="fa fa-cloud-download"></i></a>



        </span>

                            </div>

                    <?php }elseif($ext=='doc'){?>

                        <span class="mailbox-attachment-icon"><i class="fa fa-file-word-o"></i></span>

                            <div class="mailbox-attachment-info">

                                <a href="<?= base_url() . "maham_mowazf/email/Emails/download_file/" . $files->email_rkm . '/' . $files->file ?>" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> 

                                <!-- <?=$files->file?> -->

                                </a>

                                <span class="mailbox-attachment-size">

                                <?= $size?>

          <a href="<?= base_url() . "maham_mowazf/email/Emails/download_file/" . $files->email_rkm . '/' . $files->file ?>" class="btn btn-default btn-xs pull-right" download><i class="fa fa-cloud-download"></i></a>



          

        </span>

                            </div>

              <?php } }?>

                        </li>

                       

                       

                        <?php } ?>

                    </ul>

                </div>

            </div>

      