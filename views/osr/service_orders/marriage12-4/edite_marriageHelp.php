<?php
$answer = array(1 => 'نعم', 2 => 'لا');
$type = array(1 => 'هوية وطنية', 2 => 'إقامة', 3 => 'وثيقة', 4 => 'جواز سفر');
$files = array('بطاقة العائلة	' => 'family_card_img', 'عقد النكاح	' => 'nekah_akd_img', 'صورة الهوية	' => 'hawia_img', 'الصورة الشخصية	' => 'person_img', 'عقد القاعة	' => 'akd_qa3a_img', 'تعريف بالراتب	' => 'ta3ref_ratb_img', 'تزكية الامام	' => 'tazkia_emam_img');
?>
<div class="col-sm-6 col-md-6 col-xs-6 fadeInUp wow ">
    <div class="panel panel-default">
        <div class="panel-heading panel-title">
            مساعده زواج

        </div>
        <div class="panel-body">

            <div class="form-group col-sm-12 col-xs-12 no-padding no-margin">
                <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
                    <label class="label "> رقم الطلب</label>
                    <input type="text" id="talab_rkm" name="talab_rkm" class="form-control  "
                           value="<?php if (isset($record)) {
                               echo $record['talab_rkm'];
                           } else {
                               echo $last_rkm;
                           } ?>" readonly data-validation="required">
                </div>
                <div class="form-group col-md-4 col-sm-3 col-xs-12 padding-4 ">
                    <label class="label "> الاسم</label>
                    <select name="person_id_fk" id="person_id_fk" class="form-control " data-validation="required">
                        <option value="">إختر</option>
                        <?php
                        if (isset($children) && $children != null) {
                            foreach ($children as $value) {
                                $select = '';
                                if (isset($record) && $record['person_id_fk'] == $value->id) {
                                    $select = 'selected';
                                }
                                ?>
                                <option value="<?= $value->id ?>-<?= $value->member_full_name ?>" <?= $select ?>><?= $value->member_full_name ?></option>
                                <?
                            }
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
                    <label class="label "> رقم الجوال </label>
                    <input type="text" id="jwal" name="jwal" placeholder="رقم الجوال " class="form-control "
                           value="<?php if (isset($record)) echo $record['jwal'] ?>" data-validation="required"
                           onkeypress="return isNumberKey(event)">
                </div>

                <div class="form-group col-md-4 col-sm-3 col-xs-12 padding-4">
                    <label class="label "> مكان الزواج</label>
                    <input type="text" id="makan_zawaj" name="makan_zawaj" placeholder="مكان الزواج"
                           class="form-control " value="<?php if (isset($record)) echo $record['makan_zawaj'] ?>"
                           data-validation="required">
                </div>

                <div class="form-group col-md-4 col-sm-3 col-xs-12 padding-4">
                    <label class="label "> تاريخ الزواج</label>
                    <input type="date" id="date_zawaj" name="date_zawaj" placeholder="تاريخ الزواج"
                           class="form-control  " data-validation="required"
                           value="<?php if (isset($record)) echo $record['date_zawaj'] ?>" autocomplete="off">
                </div>

                <div class="form-group col-md-4 col-sm-3 col-xs-12 padding-4">
                    <label class="label "> رقم العقد</label>
                    <input type="text" id="rkm_akd" name="rkm_akd" placeholder="رقم العقد" class="form-control "
                           value="<?php if (isset($record)) echo $record['rkm_akd'] ?>" data-validation="required"
                           onkeypress="return isNumberKey(event)">
                </div>

                <div class="form-group col-md-4 col-sm-3 col-xs-12 padding-4">
                    <label class="label "> تاريخ العقد</label>
                    <input type="date" id="date_akd" name="date_akd" placeholder="تاريخ العقد"
                           class="form-control " data-validation="required"
                           value="<?php if (isset($record)) echo $record['date_akd'] ?>" autocomplete="off">
                </div>

                <div class="form-group col-md-3 col-sm-3 col-xs-12 padding-4">
                    <label class="label "> جهة اصدار العقد</label>
                    <input type="text" id="geha_esdar_akd" name="geha_esdar_akd" placeholder="جهة اصدار العقد"
                           class="form-control " value="<?php if (isset($record)) echo $record['geha_esdar_akd'] ?>"
                           data-validation="required">
                </div>

                <div class="form-group col-md-3 col-sm-3 col-xs-12 padding-4">
                    <label class="label "> قيمة المهر</label>
                    <input type="text" id="mahr_value" name="mahr_value" placeholder="قيمة المهر" class="form-control "
                           value="<?php if (isset($record)) echo $record['mahr_value'] ?>" data-validation="required"
                           onkeypress="return isNumberKey(event)">
                </div>

                <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
                    <label class="label "> جنسية الزوجة</label>
                    <select name="gensia_husband" id="gensia_husband" class="form-control " data-validation="required">
                        <option value="">إختر</option>
                        <?php
                        if (isset($nationality) && $nationality != null) {
                            foreach ($nationality as $value) {
                                $select = '';
                                if (isset($record) && $record['gensia_husband'] == $value->id_setting) {
                                    $select = 'selected';
                                }
                                ?>
                                <option value="<?= $value->id_setting ?>" <?= $select ?>><?= $value->title_setting ?></option>
                                <?
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-4 col-sm-3 col-xs-12 padding-4">
                    <label class="label "> الزواج لاول مرة</label>
                    <?php
                    foreach ($answer as $key => $value) {
                        $select = '';
                        if (isset($record) && $record['first_zawaj'] == $key) {
                            $select = 'checked';
                        }
                        ?>
                        <input type="radio" name="first_zawaj" value="<?= $key ?>"
                               data-validation="required" <?= $select ?>> <?= $value ?>&nbsp;&nbsp;&nbsp;
                        <?
                    }
                    ?>
                </div>

            </div>


        </div>
    </div>
</div>


<div class="col-sm-6 col-md-6 col-xs-6 fadeInUp wow ">
    <div class="panel panel-default">
        <div class="panel-heading panel-title">
            مرفقات

        </div>
        <div class="panel-body">
            <?php
            $x = 1;
            foreach ($files as $key => $value) {
                ?>
                <div class="form-group col-md-4 col-sm-3 col-xs-12 padding-4">
                    <label class="label "><?= $key ?> </label>
                    <input type="file" id="<?= $value ?>" name="<?= $value ?>" accept="image/*" class="form-control">
                    <?php if (isset($record) && $record[$value] != null) { ?>
                        <a download
                           href="<?= base_url() . 'osr/service_orders/Marriage_orders/download/' . $record[$value] ?>">
                            <i class="fa fa-download" title=" تحميل"></i> </a>


                        <a data-toggle="modal" data-target="#myModal-view_photo<?= $value ?>">
                            <i class="fa fa-eye" title=" قراءة"></i> </a>
                        <!-- modal view -->
                        <div class="modal fade" id="myModal-view_photo<?= $value ?>" tabindex="-1"
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


                                        <img src="<?= base_url() . 'uploads/images' . '/' . $record[$value] ?>"
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
                    } ?>

                </div>
            <? } ?>
        </div>
    </div>
</div>
<!--  -->
<div class="col-xs-12 no-padding" style="padding: 10px;">
    <div class="">
        <div class="text-center">
            <?php
            if (isset($record)) {

                $button = 'update';
                $onclick = "update_family_zwag(" . $record['id'] . ");";
                $action = " تعديل    ";
                echo '<input type="hidden"  name="id"  id="id" value="' . $record['id'] . '">';
            } else {
                $action = "حفظ";
                $button = 'add';
                $onclick = "save_family_zwag();";
            } ?>


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