

<?php
if (isset($result) && !empty($result)) {
    $id = $result[0]->id;
    $talab_rkm = $result[0]->talab_rkm;
    $file_num =$result[0]->file_num;
    $fe2a_fatora =$result[0]->fe2a_fatora;
    $fatora_value =$result[0]->fatora_value;
    $fatora_date =$result[0]->fatora_date;
    $sanad_daf3_date =$result[0]->sanad_daf3_date;
    $fatora_img =$result[0]->fatora_img;


} else {
    if (!empty($last_talab_rkm)) {
        $talab_rkm = $last_talab_rkm + 1;
    } else {
        $talab_rkm = 1001;
    }
    $file_num ='';
    $fe2a_fatora = '';
    $fatora_value = '';
    $fatora_date = date('Y-m-d');
    $sanad_daf3_date = date('Y-m-d');
    $fatora_img = '';
}

if (isset($result) && !empty($result)) {
    echo form_open_multipart('osr/service_orders/Fator2/update_fator2/' . $id , array('id' => 'fator2_form', 'class' => 'fator2_form'));
    $action = " تعديل ";
    $onclick ="update_fator2(".$id.");";
    echo '<input type="hidden"  name="update"  id="update" value="update">';
} else {
    $action = "حفظ";
    $onclick ="save_fator2();";
    echo form_open_multipart('osr/service_orders/Fator2/', array('id' => 'fator2_form', 'class' => 'fator2_form'));
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
        <select name="fe2a_fatora" id="fe2a_fatora" onchange="Check_fe2a(this.value)"
                class="form-control selectpicker " data-show-subtext="true" data-live-search="true">
            <option value="">اختر</option>
            <?php foreach ($fe2a_fatora_array as $key=>$value) {
                $select = '';
                if (!empty($fe2a_fatora)) {
                    $select = '';
                    if ($key == $fe2a_fatora) {
                        $select = 'selected';
                    }
                } ?>
                <option value="<?php echo $key; ?>"
                    <?php echo $select; ?> > <?php echo $value; ?></option>
            <?php } ?>
        </select>
    </div>

    <div class="form-group col-sm-1 padding-4">
        <label class="label">مبلغ الفاتورة</label>

        <input type="number"  value="<?=$fatora_value?>" class="form-control bottom-input"
               name="fatora_value" id="fatora_value" data-validation="required" />
    </div>

    <div class="form-group col-sm-2 padding-4">
        <label class="label">تاريخ الفاتورة</label>

        <input type="date"  value="<?=$fatora_date?>" class="form-control bottom-input"
               name="fatora_date" id="fatora_date" data-validation="required" />
    </div>

    <div class="form-group col-sm-2 padding-4">
        <label class="label">تاريخ سند الدفع</label>

        <input type="date"  value="<?=$sanad_daf3_date?>" class="form-control bottom-input"
               name="sanad_daf3_date" id="sanad_daf3_date" data-validation="required" />
    </div>



    <div class="form-group col-md-2 padding-4  col-sm-4">
        <label class="label">صورة الفاتورة </label>
        <input type="file" name="fatora_img" id="fatora_img" class="form-control "/>

            <?php if (!empty($fatora_img)) { ?>
                <table class="table table-bordered " width="10px">
                    <tr>
                        <td style="width: 30px; text-align: center">
                            <a href="<?php echo base_url() ?>uploads/osr/service_orders/fator2/<?php echo $fatora_img; ?>"
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
                                            <img src="<?php echo base_url() ?>uploads/osr/service_orders/fator2/<?php echo $fatora_img; ?>"
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
<div class="col-xs-12 no-padding" style="padding: 10px;">
<!--    <div class="panel-footer">
-->        <div class="text-center">
            <button type="button" id="buttons" onclick=<?=$onclick?>
                    name="add"    value="add" class="btn btn-labeled btn-success" >
                <span class="btn-label"><i class="fa fa-floppy-o"></i></span><?= $action ?>
            </button>
        </div>
<!--    </div>
--></div>

<?php echo form_close() ?>
