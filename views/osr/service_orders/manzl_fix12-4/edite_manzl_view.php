<?php
$type = array(1 => 'إصلاح المنزل', 2 => 'ترميم المنزل');
if (isset($record) && !empty($record)) {
    echo form_open_multipart('osr/service_orders/Manzl_fix/editManzl_fixOrders/' . $record['id'] . '/tab1', array('class' => 'manzel_form'));


    echo '<input type="hidden"  name="id"  id="id" value="' . $record['id'] . '">';
} else {


    echo form_open_multipart('osr/service_orders/Manzl_fix', array('class' => 'manzel_form'));
    echo '<input type="hidden"  name="add"  id="add" value="add">';
}
?>
<div class="form-group col-sm-12 col-xs-12 no-ing no-margin">


    <div class="form-group col-sm-1 col-xs-12 ">
        <label class="label "> رقم الطلب</label>
        <input type="text" id="talab_rkm" name="talab_rkm" class="form-control  " value="<?php if (isset($record)) {
            echo $record['talab_rkm'];
        } else {
            echo $last_rkm;
        } ?>" readonly data-validation="required">
    </div>

    <div class="form-group col-sm-2 col-xs-12 ">
        <label class="label "> نوع الفئة</label>
        <select name="fe2a_type" id="fe2a_type" class="form-control " onchange="GetF2a(this)"
                data-validation="required">
            <option value="">إختر</option>
            <?php
            foreach ($type as $key => $value) {
                $select = '';
                if (isset($record) && $record['fe2a_type'] == $key) {
                    $select = 'selected';
                }
                ?>
                <option value="<?= $key ?>" data-specialize="<?= $key ?>" <?= $select ?>><?= $value ?></option>
                <?
            }
            ?>
        </select>
    </div>
    <div id="fix" style="<?php if (isset($record['fe2a_type']) && ($record['fe2a_type'] == 1)) {
        echo '';
    } else {
        echo 'display:none';
    } ?>">
        <div class="form-group col-sm-3 col-xs-12 ">
            <label class="label "> مكان الاصلاح</label>
            <input type="text" id="elmkan" name="elmkan_eslah"
                   value="<?php if (isset($record) && ($record['fe2a_type'] == 1)) echo $record['elmkan'] ?>"
                   class="form-control  "
                   data-validation="<?php if (isset($record['fe2a_type']) && ($record['fe2a_type'] == 2)) {
                       echo '';
                   } else {
                       echo 'required';
                   } ?>"/>
        </div>


        <div class="form-group col-sm-2 col-xs-12 ">
            <label class="label "> نوع الاصلاح</label>
            <select name="no3_eslah" id="no3_eslah" class="form-control "
                    data-validation="<?php if (isset($record['fe2a_type']) && ($record['fe2a_type'] == 2)) {
                        echo '';
                    } else {
                        echo 'required';
                    } ?>">
                <option value="">إختر</option>
                <?php
                if (isset($no3_eslah) && $no3_eslah != null) {
                    foreach ($no3_eslah as $value) {
                        $select = '';
                        if (isset($record) && $record['no3_eslah'] == $value->id && ($record['fe2a_type'] == 1)) {
                            $select = 'selected';
                        }
                        ?>
                        <option value="<?= $value->id ?>" <?= $select ?>><?= $value->title ?></option>
                        <?
                    }
                }
                ?>
            </select>
        </div>
        <div class="form-group col-sm-3 col-xs-12 ">
            <label class="label "> صورة مكان الاصلاح</label>
            <input type="file" id="img" name="img" value="" class="form-control  "/>
            <?php if (isset($record) && ($record['fe2a_type'] == 1)) { ?>
                <a data-toggle="modal" data-target="#myModal-view_photo">
                    <i class="fa fa-eye" title=" قراءة"></i> </a>
                <!-- modal view -->
                <div class="modal fade" id="myModal-view_photo" tabindex="-1"
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


                                <img src="<?= base_url() . 'uploads/osr/service_order/fix_manzl' . '/' . $record['img'] ?>"
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
            <?php } ?>
            <!-- modal view -->
        </div>

    </div>
    <div id="trmem" style="<?php if (isset($record['fe2a_type']) && ($record['fe2a_type'] == 2)) {
        echo '';
    } else {
        echo 'display:none';
    } ?>">
        <div class="form-group col-sm-3 col-xs-12 ">
            <label class="label "> مكان الترميم</label>
            <input type="text" id="elmkan_trmem" name="elmkan_trmem"
                   value="<?php if (isset($record) && ($record['fe2a_type'] == 2)) echo $record['elmkan'] ?>"
                   class="form-control  "
                   data-validation="<?php if (isset($record['fe2a_type']) && ($record['fe2a_type'] == 1)) {
                       echo '';
                   } else {
                       echo 'required';
                   } ?>"/>
        </div>

        <div class="form-group col-sm-2 col-xs-12 ">
            <label class="label "> نوع الترميم</label>
            <select name="no3_trmem" id="no3_trmem" class="form-control "
                    data-validation="<?php if (isset($record['fe2a_type']) && ($record['fe2a_type'] == 1)) {
                        echo '';
                    } else {
                        echo 'required';
                    } ?>">
                <option value="">إختر</option>
                <?php
                if (isset($no3_trmem) && $no3_trmem != null) {
                    foreach ($no3_trmem as $value) {
                        $select = '';
                        if (isset($record) && $record['no3_eslah'] == $value->id && ($record['fe2a_type'] == 2)) {
                            $select = 'selected';
                        }
                        ?>
                        <option value="<?= $value->id ?>" <?= $select ?>><?= $value->title ?></option>
                        <?
                    }
                }
                ?>
            </select>
        </div>
        <div class="form-group col-sm-3 col-xs-12 ">
            <label class="label "> صورة مكان الترميم</label>
            <input type="file" id="img_trmem" name="img_trmem" class="form-control  "/>
            <?php if (isset($record) && ($record['fe2a_type'] == 2)) { ?>
                <a data-toggle="modal" data-target="#myModal-view_photo">
                    <i class="fa fa-eye" title=" قراءة"></i> </a>
                <!-- modal view -->
                <div class="modal fade" id="myModal-view_photo" tabindex="-1"
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


                                <img src="<?= base_url() . 'uploads/osr/service_order/fix_manzl' . '/' . $record['img'] ?>"
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
            <?php } ?>

        </div>

    </div>
    <div class="form-group col-sm-4 col-xs-12 ">
        <label class="label "> ملاحظات</label>
        <textarea id="notes" name="notes" class="form-control  " data-validation="required">
		<?php if (isset($record)) echo $record['notes'] ?>
		</textarea>
    </div>
</div>
<!-- <div class="form-group col-sm-12 col-xs-12 ">
<?php
if (isset($record)) {
    $action = " تعديل    ";
    $button = 'update';
    $onclick = "update_manzel(" . $record['id'] . ");";
} else {
    $action = "حفظ";
    $button = 'add';
    $onclick = "save_manzel();";
} ?>
    <button type="submit" name="add_Manzl_fix" value="حفظ" class="btn btn-purple w-md m-b-5"><span><i class="fa fa-floppy-o" aria-hidden="true"></i></span>  <?= $action ?>  </button>
</div> -->
<div class="col-xs-12 no-padding" style="padding: 10px;">
    <div class="">
        <div class="text-center">
            <input type="hidden" name="max" id="max"/>
            <button type="button" id="buttons"
                    class="btn btn-labeled btn-success
                                            "
                    onclick="<?= $onclick ?>"
                    name="<?php echo $button; ?>"
                    value="<?php echo $button; ?>">
                                            <span class="btn-label"><i
                                                        class="fa fa-floppy-o"></i></span><?= $action ?>
            </button>
        </div>
    </div>
</div>


<?php echo form_close(); ?>
</div>
</div>
