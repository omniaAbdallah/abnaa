<div class="row">
    <?php if (isset($result) && (!empty($result))) { ?>
        <table id="mehwer" class="table table-striped table-bordered table-result">
            <thead>
            <tr>
                <th>م</th>
                <th>المحور</th>
                <th>المرفق</th>
            </tr>
            </thead>
            <tbody>
            <?php $x = 1;
            foreach ($result as $row) { ?>
                <tr>
                    <td><?php echo $x; ?></td>
                    <td><?php echo $row->mehwar_title; ?></td>
                    <td>
                        <?php
                        $mehwar_morfaq = $row->mehwar_morfaq;

                        if (!empty($mehwar_morfaq)) {
                            ?>
                            <?php
                            $type = pathinfo($mehwar_morfaq)['extension'];
                            $arry_images = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP', 'WMV', 'wmv');
                            $arr_doc = array('DOC', 'DOCX', 'HTML', 'HTM', 'ODT', 'PDF', 'XLS', 'XLSX', 'ODS', 'PPT', 'PPTX', 'TXT');
                            if (in_array($type, $arry_images)) {
                                ?>
                                <?php if (!empty($mehwar_morfaq)) {
                                    $url = base_url() . 'uploads/md/all_mehwr_gam3ia_omomia/' . $mehwar_morfaq;
                                } else {
                                    $url = base_url('asisst/fav/apple-icon-120x120.png');
                                } ?>

                                <!-- <a target="_blank" onclick="show_img('<?= $url ?>')">
                                    <i class=" fa fa-eye"></i>
                                </a> -->
                                <a data-toggle="modal" data-target="#myModal-view_photo-<?= $row->id ?>">
                                    <i class="fa fa-eye" title=" قراءة"></i> </a>
                                      <!-- modal view -->
                                <div class="modal fade" id="myModal-view_photo-<?= $row->id ?>" tabindex="-1"
                                     role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close"><span aria-hidden="true">&times;</span>
                                                </button>
                                                <h4 class="modal-title" id="myModalLabel">الصوره</h4>
                                            </div>
                                            <div class="modal-body">
                                           
                                           
                                            <img src="<?= base_url().'uploads/md/all_mehwr_gam3ia_omomia' .'/'. $mehwar_morfaq?>"
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
                                <?php
                            } elseif (in_array(strtoupper($type), $arr_doc)) {
                                ?>
                                <!-- <a target="_blank"
                                   href="https://docs.google.com/gview?url=<?= base_url() . 'uploads/md/all_mehwr_gam3ia_omomia/' . $mehwar_morfaq ?>&embedded=true">
                                    <i class=" fa fa-eye"></i></a>
                                <a href="<?php echo base_url() . 'md/all_mehwr_gam3ia_omomia/All_mehwr_gam3ia_omomia/read_file/' . $mehwar_morfaq ?>"
                                   target="_blank">
                                    <i class=" fa fa-download"></i></a> -->
                                    <a data-toggle="modal" data-target="#myModal-view_doc-<?= $row->id ?>">
                                    <i class="fa fa-eye" title=" قراءة"></i> </a>
                                      <!-- modal view -->
                                <div class="modal fade" id="myModal-view_doc-<?= $row->id ?>" tabindex="-1"
                                     role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close"><span aria-hidden="true">&times;</span>
                                                </button>
                                                <h4 class="modal-title" id="myModalLabel">الملف</h4>
                                            </div>
                                            <div class="modal-body">
                                           
                                           
                                          
                                                             <iframe src="<?php echo base_url(); ?>gam3ia_omomia/Gam3ia_omomia/read_file_gam3ia/<?=$mehwar_morfaq;?>" style="width: 100%; height:  640px;" frameborder="0">
        </iframe>
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
                                <?php
                            }
                        } else {
                            echo 'لا يوجد';
                        }
                        ?>

                    </td>
                </tr>
                <?php
                $x++;
            }
            ?>
            </tbody>
        </table>


    <?php } ?>
</div>


<script>


    $('#mehwer').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'pageLength',
            'copy',
            'csv',
            'excelHtml5',
            {
                extend: "pdfHtml5",
                orientation: 'landscape'
            },

            {
                extend: 'print',
                exportOptions: {columns: ':visible'},
                orientation: 'landscape'
            },
            'colvis'
        ],
        colReorder: true
    });


</script>
<script>

    function show_img(src) {

        var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
        WinPrint.document.write('<img src="' + src + '">');
        WinPrint.document.close();
        WinPrint.focus();
    }
</script>
