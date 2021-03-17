<?php
                if (isset($allData->badlat) && !empty($allData->badlat)) {
?>
                    <table id="having" class=" display table table-bordered responsive nowrap tb_table text-center" id="POITable"
                    cellspacing="0" width="100%" style="table-layout: auto;">
                 <thead>
                 <tr class="greentd">
                    <!-- <th colspan="9" class="text-center">بيانات الاستحقاقات</th> -->
                 </tr>
                 <tr class="greentd">
                     <th >إسم البند</th>
                     <th > طريقه الحساب</th>
                     <th >القيمه</th>
                     <th >محدد المده</th>
                     <th >من تاريخ</th>
                     <th>الي تاريخ</th>
                     <th >يخضع للتأمينات</th>
                     <th >الدليل</th>
                     <th >الاجراء</th>
                 </tr>
                 <tbody >
                 <?php
                    foreach ($allData->badlat as $record) {
                        if (in_array($record->badalat->badl_discount_id_fk, $bdalat_id)) {
                            ?>
                            <tr>
                                <!-- <td>
                                        <?php
                                        if (isset($badalat) && !empty($badalat)) {
                                            foreach ($badalat as $row) {
                                                ?>
                                                        <?php if ($row->id == $record->badalat->badl_discount_id_fk) {
                                                    echo  $row->title; ;
                                                } ?>
                                            <?php }
                                        } ?>
                                </td> -->
                                <td>
                                    <select disabled="disabled" class="badl_setting1 form-control"
                                            data-validation="required"
                                            id="db_band_name<?php echo $record->badalat->badl_discount_id_fk; ?>">
                                        <option value="0">اختر</option>
                                        <?php
                                        if (isset($badalat) && !empty($badalat)) {
                                            foreach ($badalat as $row) {
                                                ?>
                                                <option
                                                        value="<?php echo $row->id; ?>"<?php if ($row->id == $record->badalat->badl_discount_id_fk) {
                                                    echo 'selected';
                                                } ?>><?php echo $row->title; ?></option>
                                            <?php }
                                        } ?>
                                    </select>
                                </td>
                                <td>
                                      <?php if ($record->badalat->method_to_count == 1) {
                                            echo 'قيمه';
                                        } ?>
                                        <?php if ($record->badalat->method_to_count == 2) {
                                            echo 'نسبه';
                                        } ?>
                                </td>
                                <td>
                                    <?php echo $record->badalat->value; ?>
                                </td>
                                <?php
                                $yes_no = array(1 => 'نعم', 2 => 'لا');
                                ?>
                                <td>
                                        <?php
                                        foreach ($yes_no as $key => $value) {
                                            ?>
                                   <?php if ($key == $record->badalat->specific_period) {
                                                echo $value;
                                            } ?> 
                                        <?php } ?>
                                </td>
                                <td>
                                   <?php if ($record->badalat->specific_period == 1) {
                                               echo $record->badalat->date_from;
                                           } else{echo 'غير محدد';} ?>
                                </td>
                                <td>
                                    <?php if ($record->badalat->specific_period == 1) {
                                               echo $record->badalat->date_to;
                                           } else{echo 'غير محدد';}?>
                                </td>
                                <td>
                                    <div class="skin-square">
                                        <div class="i-check">
                                            <input class="" disabled="disabled" type="checkbox" money="0"
                                                   class="check_value"
                                                   value="1"<?php if ($record->badalat->insurance_affect == 1) {
                                                echo 'checked';
                                            } ?>>
                                        </div>
                                    </div>
                                </td>
                            
                                <td>
                                    <?php if (isset($record->badalat->dalel_code) && !empty($record->badalat->dalel_code)) {
                                               echo $record->badalat->dalel_code;
                                           } else{echo 'لا يوجد';} ?>
                                    - <?php if (isset($record->badalat->dalel_name) && !empty($record->badalat->dalel_name)) {
                                               echo $record->badalat->dalel_name;
                                           } else{echo 'لا يوجد';} ?>
                                </td>
                         
                                <td>
                                <a  onclick='delete_emp_finance_data(<?php echo $record->badalat->id; ?>,<?php echo $record->badalat->emp_id; ?>,<?php echo $record->badalat->value; ?>,1);
                                               '><i
                                                class="fa fa-trash" aria-hidden="true"></i> </a>
                                    <a data-toggle="modal" type="button" style="cursor: pointer"
                                       data-target="#modal_having_esthakak"
                                       onclick="
                                       get_edite(<?php echo $record->badalat->id; ?>);
                                       fill_modal_select(1,<?php echo $record->badalat->badl_discount_id_fk; ?>);">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                            <!------------------------- start_modal - الاستحقاقات------------------------------------------------------------------>
                            <!------------------------- end_modal - الاستحقاقات------------------------------------------------------------------>
                            <?php
                        }
                    }
                }
                ?>
                </tbody>
                <tr class="greentd">
                    <input type="hidden"
                           value="<?php if (isset($allData->get_having_value) && !empty($allData->get_having_value)) {
                               echo $allData->get_having_value;
                           } else {
                               echo 0;
                           } ?> " name="db_value_have" id="db_value">
                    <input type="hidden"
                           value="<?php if (isset($allData->tamin_value) && !empty($allData->tamin_value)) {
                               echo $allData->tamin_value;
                           } else {
                               echo 0;
                           } ?> " name="db_value_have2" id="db_value_tamin">
                    <td colspan="2">إجمالي بنود الإستحقاقات</td>
                    <td><input type="text" readonly="readonly" name="having_all_value" class="form-control"
                               value="<?php if (isset($allData->get_having_value) && !empty($allData->get_having_value)) {
                                   echo $allData->get_having_value;
                               } else {
                                   echo 0;
                               } ?> " id="all_value1"></td>
                    <td colspan="3">اجمالي البنود الخاضعه للتأمينات</td>
                    <td><input type="text" readonly="readonly" name="having_tamin_value" class="form-control"
                               value="<?php if (isset($allData->tamin_value) && !empty($allData->tamin_value)) {
                                   echo $allData->tamin_value;
                               } else {
                                   echo 0;
                               } ?>" id="checked_value1"></td>
                    <td></td>
                   <td>
                        <!-- <button type="button" onclick="add_row(1,<?php echo count($badalat); ?>)" class="btn btn-success btn-next"
                                style="float: right;">
                            <i class="fa fa-plus"></i></button> -->
                    </td> 
                </tr>
                <!-- </tbody> -->
            </table>
            <!-- having -->
            <script>
$('#having').DataTable( {
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
            exportOptions: { columns: ':visible'},
            orientation: 'landscape'
        },
        'colvis'
    ],
    colReorder: true
} );
</script>