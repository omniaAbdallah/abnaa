<div class="col-sm-12 col-md-12 col-xs-12 fadeInUp wow" id="page_panal">
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading panel-title">
                <h4><?= $title ?></h4>
            </div>
            <!--<pre>
                <?php /*print_r($talab_data) */?>
            </pre>-->
            <div class="panel-body">
                <?php
                $suspend_title = array(0 => 'جاري', 1 => 'تم القبول', 2 => 'تم الرفض', 3 => "تم التحويل", 4 => "تم الاعتماد بالموافقة", 5 => "تم الإعتماد بالرفض");
                $suspend_class = array(0 => 'warning', 1 => 'success', 2 => 'danger', 3 => 'info', 4 => 'success', 5 => 'danger');
                if (isset($talab_data) && (!empty($talab_data))) {
                    $talab_rkm = $talab_data->talab_rkm;
                    $talab_id = $talab_data->id;
                    $talab_date_ar = $talab_data->talab_date_ar;

                    echo form_open_multipart('osr/service_orders/Sarf_order/update_talab', array('id' => 'Serv_sarf_order', 'class' => 'Serv_sarf_order'));
                } else {
                    echo form_open_multipart('osr/service_orders/Sarf_order', array('id' => 'Serv_sarf_order', 'class' => 'Serv_sarf_order'));
                    $talab_rkm = $last_talb;
                    $talab_id = '';
                    $talab_date_ar = date('Y-m-d');
                }
                ?>
                <div class="col-md-12">
                    <?php if (isset($talab_id) && (!empty($talab_id))) { ?>
                        <input type="hidden" name="data[talab_id]" id="talab_id" value="<?= $talab_id ?>">
                    <?php } ?>
                    <input type="hidden" name="data[file_num]" value="<?= $_SESSION['file_num'] ?>">
                    <input type="hidden" name="data[mother_national_num]"
                           value="<?= $_SESSION['mother_national_num'] ?>">
                    <input type="hidden" name="add" value="add">

                    <div class="form-group col-md-1 col-sm-3 col-xs-12 padding-4">
                        <label class="label"> رقم الطلب </label>
                        <input type="number" name="data[talab_rkm]" id="talab_rkm" class="form-control" readonly
                               value="<?= $talab_rkm ?>" data-validation="required"/>
                    </div>
                    <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
                        <label class="label"> تاريخ الطلب </label>
                        <input type="date" name="data[talab_date_ar]" id="talab_date_ar" class="form-control" readonly
                               value="<?= $talab_date_ar ?>" data-validation="required"/>
                    </div>
                    <div class="form-group col-md-7 col-sm-3 col-xs-12 padding-4"></div>
                    <div class="form-group col-md-2 col-sm-3 col-xs-12 no-padding text-left">
                        <label class="label"> </label>
                        <button type="button" onclick="add_row_sanfe()" class="btn-info btn-labeled btn"
                                style="font-size: 16px;"><span class="btn-label"><i
                                        class="fa fa-plus"></i> </span> إضافة صنف
                        </button>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-12 no-padding">

                    <table id="table_anf" class="table-bordered table table-responsive tb-table">
                        <thead>

                        <tr class="">
                            <th>م</th>
                            <th>اسم الصنف</th>
                            <th>كود الصنف</th>
                            <th> الوحدة</th>
                            <th style="width:100px"> سعر الوحدة</th>
                            <!--                            <th> الكمية</th>-->
                            <th> ملاحظات</th>
                            <th>الإجراء</th>
                        </tr>

                        </thead>
                        <tbody id="asnafe_table">
                        <?php if (isset($talab_data) && (!empty($talab_data))) {
                            if (!empty($talab_data->details)) {
                                foreach ($talab_data->details as $key => $detail) { ?>

                                    <tr id="row_<?= ++$key ?>">
                                        <td><?= $key ?></td>
                                        <td>
                                            <select name="data[details][sanf_code][]" id="sanf_select<?= $key ?>"
                                                    class="form-control  " data-validation="required"
                                                    onchange="get_sanf_data(this.value,<?= $key ?>)">
                                                <option value="">اختر</option>
                                                <?php
                                                if (isset($asnaf) && !empty($asnaf)) {
                                                    foreach ($asnaf as $item) {
                                                        ?>
                                                        <option value="<?= $item->code ?>" <?php if ($detail->sanf_code == $item->code) {
                                                            echo "selected";
                                                        } ?>> <?= $item->name ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <input type="hidden" class="form-control  "
                                                   name="data[details][sanf_name][]"
                                                   id="sanf_name<?= $key ?>" value="<?=$detail->sanf_name?>" readonly/>
                                            <input type="hidden" class="form-control  "
                                                   name="data[details][sanf_coade_br][]"
                                                   id="sanf_coade_br<?= $key ?>" value="<?=$detail->sanf_coade_br?>" readonly/>
                                        </td>
                                        <td><input type="text" class="form-control  "
                                                   id="sanf_code<?= $key ?>" value="<?=$detail->sanf_code?>" data-validation="required"
                                                   readonly/></td>
                                        <td><input type="text" data-validation="required"
                                                   name="data[details][sanf_whda][]"
                                                   class="form-control  " id="sanf_whda<?= $key ?>" value="<?=$detail->sanf_whda?>" readonly/>
                                        </td>
                                        <td><input type="text" name="data[details][sanf_one_price][]"
                                                   class="form-control  " id="sanf_one_price<?= $key ?>"
                                                   value="<?=$detail->sanf_one_price?>" readonly/></td>
                                        <td><input type="text" name="data[details][notes][]" class="form-control  "
                                                   id="notes<?= $key ?>" value="<?=$detail->notes?>"/></td>
                                        <td><a id="<?= $key ?>" onclick=" $(this).closest('tr').remove();"><i
                                                        class="fas fa-trash"></i></a></td>
                                    </tr>
                                <? }
                            }
                        } else { ?>
                            <tr id="row_1">
                                <td>1</td>
                                <td>
                                    <select name="data[details][sanf_code][]" id="sanf_select1"
                                            class="form-control  " data-validation="required"
                                            onchange="get_sanf_data(this.value,1)">
                                        <option value="">اختر</option>
                                        <?php
                                        if (isset($asnaf) && !empty($asnaf)) {
                                            foreach ($asnaf as $item) {
                                                ?>
                                                <option value="<?= $item->code ?>"> <?= $item->name ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                    <input type="hidden" class="form-control  " name="data[details][sanf_name][]]"
                                           id="sanf_name1" value="" readonly/>
                                    <input type="hidden" class="form-control  " name="data[details][sanf_coade_br][]]"
                                           id="sanf_coade_br1" value="" readonly/>
                                </td>
                                <td><input type="text" class="form-control  "
                                           id="sanf_code1" value="" data-validation="required" readonly/></td>
                                <td><input type="text" data-validation="required" name="data[details][sanf_whda][]"
                                           class="form-control  " id="sanf_whda1" value="" readonly/>
                                </td>
                                <td><input type="text" name="data[details][sanf_one_price][]"
                                           class="form-control  " id="sanf_one_price1"
                                           value="" readonly/></td>
                                <td><input type="text" name="data[details][notes][]" class="form-control  "
                                           id="notes1" value=""/></td>
                                <td><a id="1" onclick=" $(this).closest('tr').remove();set_sum();"><i
                                                class="fas fa-trash"></i></a></td>
                            </tr>
                        <?php } ?>
                        </tbody>

                    </table>
                </div>
                <div class="clearfix"></div>
                <?php if (isset($current_talbat)&&(!empty($current_talbat))){
                    if ($current_talbat > 0){
                        $display_span='';
                        $btn_disapled='disabled';
                    }else{
                        $display_span='none';
                        $btn_disapled='';
                    }
                }else{
                    $display_span='none';
                    $btn_disapled='';
                }?>
                <div class="col-md-12 text-center">
                    <button type="button" id="buttons" class="btn btn-labeled btn-success  " onclick="save_sarf_order()"
                            name="add" value="حفظ" <?=$btn_disapled?> >
                        <span class="btn-label"><i class="fa fa-floppy-o"></i></span>حفظ
                    </button>
                    <span style="font-size: medium;display: <?=$display_span?>" class=" badge badge-danger" id="span_form">لا يمكن طلب جديد لان هنالك طلب جاري </span>

                </div>
                <?php echo form_close() ?>

            </div>
        </div>

    </div>
    <div class="col-md-3 padding-4" id="family_data_load">
    </div>

    <div id="table_div" class="col-md-12" >


    </div>
</div>


<div class="modal" id="details_modal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" data-wow-duration="0.5s">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="myModalLabel"> الأصناف </h4>
            </div>
            <div class="modal-body" >
                <div class="container-fluid" id="load_detailes_div"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger btn-labeled" data-dismiss="modal" aria-label="Close">
                    <span class="btn-label"><i class="fa fa-remove"></i></span>
                    إغلاق
                </button>
            </div>
        </div>
    </div>
</div>