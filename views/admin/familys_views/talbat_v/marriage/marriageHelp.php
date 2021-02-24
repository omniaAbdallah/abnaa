<?php
$answer = array(1 => 'نعم', 2 => 'لا');
$type = array(1 => 'هوية وطنية', 2 => 'إقامة', 3 => 'وثيقة', 4 => 'جواز سفر');
$files = array('بطاقة العائلة	' => 'family_card_img', 'عقد النكاح	' => 'nekah_akd_img', 'صورة الهوية	' => 'hawia_img', 'الصورة الشخصية	' => 'person_img', 'عقد القاعة	' => 'akd_qa3a_img', 'تعريف بالراتب	' => 'ta3ref_ratb_img', 'تزكية الامام	' => 'tazkia_emam_img');
?>
<?php
if (!empty($result)) {
    $talab_id = $result['id'];
    $talab_date = $result['talab_date_ar'];
    $file_num = $result['file_num'];
    $mokadem_name = $result['mokadem_name'];
    $mother_national_num = $result['mother_national_num'];
    $jwal = $result['jwal'];
    $city = $result['city'];
    $makan_zawaj = $result['makan_zawaj'];
    $date_zawaj = $result['date_zawaj'];
    $rkm_akd = $result['rkm_akd'];
    $date_akd = $result['date_akd'];
    $geha_esdar_akd = $result['geha_esdar_akd'];
    $mahr_value = $result['mahr_value'];
    $gensia_husband = $result['gensia_husband'];
    $first_zawaj = $result['first_zawaj'];
    $national_typee = $result['national_type'];
    $national_id = $result['national_id'];
    $last_date_talb = $result['last_date_talb'];
    $last_date_sarf = $result['last_date_sarf'];
} else {
    $talab_id = 0;
    $talab_date = date('Y-m-d');
    $file_num = "";
    $mother_national_num = "";
    $mokadem_name = "";
    $jwal = "";
    $city = "";
    $makan_zawaj = "";
    $date_zawaj = date('Y-m-d');
    $rkm_akd = "";
    $national_typee = "";
    $national_id = "";
    $date_akd = date('Y-m-d');
    $geha_esdar_akd = "";
    $mahr_value = "";
    $gensia_husband = "";
    $first_zawaj = "";
    $last_date_talb = "";
    $last_date_sarf = "";
}
?>
<div class="form-group col-sm-12 col-xs-12 no-padding">
    <input type="hidden" name="talab_id" value="<?= $talab_id; ?>">
    <div class="form-group  col-md-2 padding-4 ">
        <label class="label  ">رقم الملف </label>
        <input type="text" name="file_num" id="file_num" value="<?php echo $file_num; ?>"
               ondblclick="$('#myModal').modal();load_table()" data-validation="required"
               readonly
               style="width: 75%;float: right"
               class="form-control " value="" onblur="GetFamilyNum($(this).val());">
        <button type="button" data-toggle="modal" data-target="#myModal"
                onclick="load_table()"
                class="btn btn-success btn-next" style="width:25%;float: left;">
            <i class="fa fa-plus"></i></button>
        <input type="hidden" name="mother_national_num" id="mother_national_num"
               value="<?php echo $mother_national_num; ?>">
        <input type="hidden" name="father_card" id="father_card" value="">
    </div>
    <div class="form-group  col-md-5 padding-4 ">
        <label class="label  "> مقدم الطلب </label>
        <!-- <input type="text" name="mokadem_name" id="mokadem_name" value="<?php echo $mokadem_name; ?>"
                       class="form-control "> -->
        <input type="text" name="mokadem_name" id="mokadem_name" list="cityname" data-validation="required"
               class="form-control " value="<?php echo $mokadem_name; ?>">
    </div>
    <div class="form-group col-md-3 col-sm-3 col-xs-12 padding-4 ">
        <label class="label "> رقم الجوال </label>
        <input type="text" id="jwal" name="jwal" placeholder="رقم الجوال " class="form-control "
               value="<?php echo $jwal ?>" data-validation="required"
               onkeypress="return isNumberKey(event)">
    </div>
    <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
        <label class="label "> المدينة </label>
        <select name="city" id="city" class="form-control "
                data-validation="required">
            <option value="">إختر</option>
            <?php
            if (isset($areas) && $areas != null) {
                foreach ($areas as $value) {
                    $select = '';
                    if (isset($city) && $city == $value->id_setting) {
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
        <label class="label "> مكان الزواج</label>
        <input type="text" id="makan_zawaj" name="makan_zawaj" placeholder="مكان الزواج"
               class="form-control " value="<?php echo $makan_zawaj ?>"
               data-validation="required">
    </div>
    <div class="form-group col-md-4 col-sm-3 col-xs-12 padding-4">
        <label class="label "> تاريخ الزواج</label>
        <input type="date" id="date_zawaj" name="date_zawaj" placeholder="تاريخ الزواج"
               class="form-control " data-validation="required"
               value="<?php echo $date_zawaj; ?>" autocomplete="off">
    </div>
    <div class="form-group col-md-4 col-sm-3 col-xs-12 padding-4">
        <label class="label "> رقم العقد</label>
        <input type="text" id="rkm_akd" name="rkm_akd" placeholder="رقم العقد" class="form-control "
               value="<?php echo $rkm_akd ?>" data-validation="required"
               onkeypress="return isNumberKey(event)">
    </div>
    <div class="form-group col-md-4 col-sm-3 col-xs-12 padding-4">
        <label class="label "> تاريخ العقد</label>
        <input type="date" id="date_akd" name="date_akd" placeholder="تاريخ العقد"
               class="form-control  " data-validation="required"
               value="<?php echo $date_akd ?>" autocomplete="off">
    </div>
    <div class="form-group col-md-3 col-sm-3 col-xs-12 padding-4">
        <label class="label "> جهة اصدار العقد</label>
        <input type="text" id="geha_esdar_akd" name="geha_esdar_akd" placeholder="جهة اصدار العقد"
               class="form-control " value="<?php echo $geha_esdar_akd ?>"
               data-validation="required">
    </div>
    <div class="form-group col-md-3 col-sm-3 col-xs-12 padding-4">
        <label class="label "> قيمة المهر</label>
        <input type="text" id="mahr_value" name="mahr_value" placeholder="قيمة المهر"
               class="form-control " value="<?php echo $mahr_value ?>"
               data-validation="required" onkeypress="return isNumberKey(event)">
    </div>
    <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
        <label class="label "> جنسية الزوجة</label>
        <select name="gensia_husband" id="gensia_husband" class="form-control "
                data-validation="required">
            <option value="">إختر</option>
            <?php
            if (isset($nationality) && $nationality != null) {
                foreach ($nationality as $value) {
                    $select = '';
                    if (isset($gensia_husband) && $gensia_husband == $value->id_setting) {
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
    <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
        <label class="label "> رقم هوية الزوجة</label>
        <input type="text" id="national_id" name="national_id" placeholder="رقم هوية الزوجة"
               class="form-control " value="<?php echo $national_id ?>"
               data-validation="required">
    </div>
    <div class="form-group col-sm-4 col-xs-12  padding-4">
        <label class="label "> نوع هوية الزوجة</label>
        <select name="national_type" id="national_type" class="form-control " data-validation="required">
            <option value="">إختر</option>
            <?php
            if (isset($national_type) && $national_type != null) {
                foreach ($national_type as $value) {
                    $select = '';
                    if (isset($national_typee) && $national_typee == $value->id_setting) {
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
            if (isset($first_zawaj) && $first_zawaj == $key) {
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
<div class="clearfix"></div>
<div class="col-md-12 col-sm-12 padding-4">
    <?php
    $x = 1;
    foreach ($files as $key => $value) {
        ?>
        <div class="form-group col-md-4 col-sm-3 col-xs-12 padding-4 ">
            <label class="label "><?= $key ?> </label>
            <input type="file" id="<?= $value ?>" name="<?= $value ?>" accept="image/*"
                   class="form-control">
            <?php if (isset($result) && $result[$value] != null) { ?>
                <a download
                   href="<?= base_url() . 'family_controllers/talbat/Talb_main/download/' . $result[$value] ?>">
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
                                <img src="<?= base_url() . 'uploads/family_attached/osr_talbat_marriage_help' . '/' . $result[$value] ?>"
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
   
<!--  -->
<div class="clearfix"></div>
<div class="col-md-12 form-group 4 text-center">
    <button type="submit" class="btn btn-labeled btn-success " name="save" value="save">
        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
    </button>
</div>
<div class="clearfix"></div>
<!--  -->
<!--  -->
<script type="text/javascript">

    function readURL(input, val) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#blah' + val)
                    .attr('src', e.target.result)
                    .width(50)
                    .height(50);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<script>
    function get_osra_last_date() {
        var file_num = $('#file_num').val();
        if (file_num != 0 && file_num != '') {
            var dataString = 'file_num=' + file_num;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>family_controllers/talbat/Talb_mariage_help/get_osra_last_date',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    console.log(html);
                    //$("#mokadem_name").html(html);
                    $('#get_osra_last_date').html(html);
                }
            });
        }
    }
</script>