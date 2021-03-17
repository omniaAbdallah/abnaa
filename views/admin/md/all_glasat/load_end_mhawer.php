<?php

if (isset($mahawer_end) && !empty($mahawer_end)) {

foreach ($mahawer_end as $row) {

?>

<div class="col-md-12 table<?php echo $row->id; ?> no-padding">

    <div class="panel panel-default">

        <div style="background-color: #424242 !important;" class="panel-heading" role="tab"

             id="headingOne<?php echo $row->id; ?>">

            <h4 class="panel-title">

                <a style="margin-right: 5px; font-size: 16px;" role="button" data-toggle="collapse"

                   data-parent="#accordion" href="#collapseOne<?php echo $row->id; ?>" aria-expanded="true"

                   aria-controls="collapseOne<?php echo $row->id; ?>">

                    <?php echo $row->mehwar_rkm . '-'; ?>

                    <?php echo $row->mehwar_title; ?>

                    <i class="more-less glyphicon glyphicon-plus"></i>

                </a>

            </h4>

        </div>

        <div id="collapseOne<?php echo $row->id; ?>" class="panel-collapse collapse " role="tabpanel"

             aria-labelledby="headingOne<?php echo $row->id; ?>">

            <div class="panel-body">

                <table class="table table-bordered table-striped table-mehwer"

                       style="table-layout: fixed">

                    <tbody>

                    <tr class="">

                        <td style="width: 160px">المحور

                            <?php

                            if ($row->mehwar_morfaq !== 0) {

                                $ext = pathinfo($row->mehwar_morfaq, PATHINFO_EXTENSION);

                                $image = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP');

                                $file = array('pdf', 'PDF', 'xls', 'xlsx', ',doc', 'docx', 'txt');

                                ?>

                                <?php

                                if (in_array($ext, $image)) {

                                    ?>

                                    <button class="btn btn-warning" data-toggle="modal"

                                            data-target="#myModal-view-<?= $row->id ?>">عرض المرفق

                                    </button>

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

                                                    <img src="<?= base_url() . "uploads/md/all_mehwr_magles_edara/" . $row->mehwar_morfaq ?>"

                                                         width="100%">

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

                                } elseif (in_array($ext, $file)) {

                                    ?>

                                    <a data-toggle="modal" data-target="#myModal-view-pdf-<?= $row->id ?>">

                                        <i class="fa fa-eye" title=" قراءة"></i>

                                    </a>



                                    <div class="modal fade" id="myModal-view-pdf-<?= $row->id ?>" tabindex="-1"

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

                                                    <iframe src="<?= base_url() . "uploads/md/all_mehwr_magles_edara/" . $row->mehwar_morfaq ?>"

                                                            style="width: 100%; height:  640px;"

                                                            frameborder="0"></iframe>

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

                                }

                                ?>





                                <?php

                            }

                            ?>

                        </td>

                        <td><?php echo $row->mehwar_title; ?></td>

                        <td style="width: 100px">الإجراء</td>

                    </tr>

                    <tr>

                        <td>القرار</td>

                        <td><textarea onfocus="$('.mehar<?php echo $row->id; ?>').hide();"

                                      onclick="make_not_read(<?php echo $row->id; ?>);" readonly

                                      id="mehar<?php echo $row->id; ?>" class="form-control col-md-12" rows="">

<?php echo $row->elqrar; ?>

</textarea></td>

                        <td>

                            <button class="btn btn-add"

                                    id="btn<?php echo $row->id; ?>"

                                    onclick="qrar_mehwar_update(<?php echo $row->id; ?>);">

                                تعديل

                            </button>

                        </td>

                    </tr>

                    </tbody>

                </table>

                <span style="color:red; margin-right: 50%; display: none;"

                      class="mehar<?php echo $row->id; ?>">هذا الحقل مطلوب</span>



            </div>

        </div>

    </div>

    <?php }

    } ?>

</div>

