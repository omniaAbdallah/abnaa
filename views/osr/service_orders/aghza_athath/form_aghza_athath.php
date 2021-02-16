

<?php
if (isset($result) && !empty($result)) {
    $id = $result[0]->id;
    $talab_rkm = $result[0]->talab_rkm;
    $file_num =$result[0]->file_num;
    $fe2a_talab =$result[0]->fe2a_talab;
    $no3 =$result[0]->no3;
    $num =$result[0]->num;
    $img =$result[0]->img;
    $notes =$result[0]->notes;


} else {
    if (!empty($last_talab_rkm)) {
        $talab_rkm = $last_talab_rkm + 1;
    } else {
        $talab_rkm = 1001;
    }
    $file_num ='';
    $fe2a_talab ='';
    $no3 ='';
    $num ='';
    $img ='';
    $notes ='';
}

if (isset($result) && !empty($result)) {
    echo form_open_multipart('osr/service_orders/Aghza_athath/update_aghza_athath/' . $id , array('id' => 'aghza_athath_form', 'class' => 'aghza_athath_form'));
    $action = " تعديل ";
    $onclick ="update_aghza_athath(".$id.");";
    echo '<input type="hidden"  name="update"  id="update" value="update">';
} else {
    $action = "حفظ";
    $onclick ="save_aghza_athath();";
    echo form_open_multipart('osr/service_orders/Aghza_athath/', array('id' => 'aghza_athath_form', 'class' => 'aghza_athath_form'));
    echo '<input type="hidden"  name="add"  id="add" value="add">';
}
?>
<div class="col-sm-12 col-xs-12">
    <div class="form-group col-md-1 col-sm-6 padding-4">
        <label class="label">رقم الطلب</label>
        <input type="text" name="talab_rkm" id="talab_rkm" value="<?php echo $talab_rkm; ?>"
               class="form-control "
            <?php if (!empty($talab_rkm)) {
                echo 'readonly';
            } else {
                echo 'data-validation="required"';
            } ?>
               data-validation-has-keyup-event="true">
    </div>
    <div class="form-group col-md-2 padding-4  col-sm-4 col-xs-12">
        <label class="label"> رقم السجل المدني للأم <strong
                    class="astric">*</strong>
        </label>
        <input type="number" class="form-control"
               value="<?php if (!empty($mother_national_num)) {
                   echo $mother_national_num;
               } ?>" readonly="readonly"/>
    </div>


    <div class="form-group col-md-3 padding-4 col-sm-4">
        <label class="label">الفئة<strong
                    class="astric">*</strong>
        </label>
        <select name="fe2a_talab" id="fe2a_talab" onchange="Check_fe2a(this.value)"
                class="form-control selectpicker " data-show-subtext="true" data-live-search="true">
            <option value="">اختر</option>
            <?php foreach ($fe2a_talab_array as $key=>$value) {
                $select = '';
                if (!empty($fe2a_talab)) {
                    $select = '';
                    if ($key == $fe2a_talab) {
                        $select = 'selected';
                    }
                } ?>
                <option value="<?php echo $key; ?>"
                    <?php echo $select; ?> > <?php echo $value; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group col-sm-3 padding-4">
        <label class="label">النوع</label>

        <select id="no3" name="no3" value="<?=$no3?>" class="form-control bottom-input"
                data-validation="required"  aria-required="true"  >
            <option value=""> إختر</option>
            <?php
            if (!empty($no3)){
                foreach ($sub_fe2a_talab_no3 as $sub) {
                    $select = '';
                    if ($sub->id == $no3) {
                        $select = 'selected';
                    }
                    ?>
                    <option value="<?php echo $sub->id; ?>"
                        <?php echo $select; ?> > <?php echo $sub->name; ?></option>
                <?php } }  ?>
        </select>


    </div>

    <div class="form-group col-sm-1 padding-4">
        <label class="label">العدد</label>

        <input type="number"  value="<?=$num?>" class="form-control bottom-input"
               name="num" id="num" data-validation="required" />
    </div>

    <div class="form-group col-sm-4 padding-4">
        <label class="label">ملاحظات</label>

        <textarea id="notes" name="notes"  class="form-control bottom-input"
                  data-validation="required"  aria-required="true"  >
                        <?=$notes?>
                        </textarea>
    </div>

    <div class="form-group col-md-2 padding-4  col-sm-4">
        <label class="label">الصورة </label>
        <input type="file" name="img" id="img" class="form-control "/>

            <?php if (!empty($img)) { ?>
                <table class="table table-bordered " width="10px">
                    <tr>
                        <td style="width: 30px; text-align: center">
                            <a href="<?php echo base_url() ?>uploads/osr/service_orders/aghza_athath/<?php echo $img; ?>"
                               download> <i class="fa fa-download"></i> </a>
                        </td>
                        <td style="width: 30px; text-align: center">

                            <a href="#" data-toggle="modal"
                               data-target="#myModal-member_photo-<?php echo $id; ?>"> <i
                                        class="fa fa-eye"></i> </a>
                            <div class="modal fade" id="myModal-member_photo-<?php echo $id; ?>"
                                 tabindex="-1"
                                 role="dialog"
                                 aria-labelledby="myModalLabel">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close"><span
                                                        aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">الصورة</h4>
                                        </div>
                                        <div class="modal-body">
                                            <img src="<?php echo base_url() ?>uploads/osr/service_orders/aghza_athath/<?php echo $img; ?>"
                                                 width="100%">
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
                        </td>
                    </tr>
                </table>


            <?php }else{ ?>
        <small class="small" style="bottom:-13px;">
                برجاء إرفاق صورة
        </small>
            <?php } ?>

    </div>

</div>
<!--<div class="col-xs-12 no-padding" style="padding: 10px;">
    <div class="panel-footer">-->
        <div class="col-md-12 text-center">
            <button type="button" id="buttons" onclick=<?=$onclick?>
                    name="add" value="add" class="btn btn-labeled btn-success" >
                <span class="btn-label"><i class="fa fa-floppy-o"></i></span><?= $action ?>
            </button>
        </div>
   <!-- </div>
</div>-->

<?php echo form_close() ?>
