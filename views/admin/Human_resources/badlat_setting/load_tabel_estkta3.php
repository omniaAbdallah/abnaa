<?php
                if (isset($allData->badlat) && !empty($allData->badlat)) {
                    ?>
                    <table id="discu" class="  display table table-bordered responsive nowrap tb_table text-center" id="POITable2"
                    cellspacing="0" width="100%" style="table-layout: auto;">
                 <thead>
                 <tr class="greentd">
                 </tr>
                 <tr class="greentd">
                     <th >إسم البند</th>
                     <th > طريقه الحساب</th>
                     <th >القيمه</th>
                     <th >محدد المده</th>
                     <th >من تاريخ</th>
                     <th >الي تاريخ</th>
                     <th >الدليل</th>
                     <th >الاجراء</th>
                 </tr>
                 <tbody >
<?php
                    foreach ($allData->badlat as $record) {
                        if (isset($record->badalat) && !empty($record->badalat) && in_array($record->badalat->badl_discount_id_fk, $cuts_id)) {
                            ?>
                            <tr>
                                <!-- <td>
                                        <?php
                                        if (isset($discounts) && !empty($discounts)) {
                                            foreach ($discounts as $row) {
                                                ?>
                                         <?php if ($row->id == $record->badalat->badl_discount_id_fk) {
                                                    echo $row->title; 
                                                } ?>
                                            <?php }
                                        } ?>
                                    </select>
                                </td> -->
                                <td>
                                    <select disabled="disabled" class="form-control badl_setting2" name=""
                                            id="db_band_name<?php echo $record->badalat->badl_discount_id_fk; ?>"
                                            class="form-control"
                                            data-validation="required">
                                        <option value="0">اختر</option>
                                        <?php
                                        if (isset($discounts) && !empty($discounts)) {
                                            foreach ($discounts as $row) {
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
                                                echo  $value;
                                            } ?> 
                                        <?php } ?>
                                </td>
                                <td>
                                    <?php if ($record->badalat->specific_period == 1) {
                                               echo $record->badalat->date_from;
                                           }  else{echo 'غير محدد';} ?>
                                </td>
                                <td>
                                    <?php if ($record->badalat->specific_period == 1) {
                                               echo $record->badalat->date_to;
                                           } else{ echo  'غير محدد ' ;} ?>
                                </td>
                                <!--  Nagwa 20-6-->
                                <td>
                                   <?php if (isset($record->badalat->dalel_code) && !empty($record->badalat->dalel_code)) {
                                               echo $record->badalat->dalel_code;
                                           } else{echo 'لا يوجد';} ?>
                                    <?php if (isset($record->badalat->dalel_name) && !empty($record->badalat->dalel_name)) {
                                               echo $record->badalat->dalel_name;
                                           } else{echo 'لا يوجد';} ?>
                                </td>
                                <td>
                                    <a  onclick='delete_emp_finance_data(<?php echo $record->badalat->id; ?>,<?php echo $record->badalat->emp_id; ?>,<?php echo $record->badalat->value; ?>,2);
                                               '><i
                                                class="fa fa-trash" aria-hidden="true"></i> </a>
                                    <a data-toggle="modal" type="button" style="cursor: pointer"
                                       data-target="#modal_discut"
                                       onclick="
                                       get_discut(<?php echo $record->badalat->id; ?>);
                                       fill_modal_select(2,<?php echo $record->badalat->badl_discount_id_fk; ?>);">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                            <!------------------------- start_modal - الاستقطاعات------------------------------------------------------------------>
                            <!------------------------- end_modal - الاستقطاعات------------------------------------------------------------------>
                            <?php
                        }
                    }
                }
                ?>
                </tbody>
                <tfoot>
                <tr class="greentd" style="margin-bottom: 10px;">
                    <input type="hidden" name="db_value_cut"
                           value="<?php if (isset($allData->get_discut_value) && !empty($allData->get_discut_value)) {
                               echo $allData->get_discut_value;
                           } else {
                               echo 0;
                           } ?> " id="db_value_cut">
                    <input type="hidden"
                           value="<?php if (isset($allData->discut_tamin_value) && !empty($allData->discut_tamin_value)) {
                               echo $allData->discut_tamin_value;
                           } else {
                               echo 0;
                           } ?> " name="db_value_have2" id="db_value_tamin_discut">
                    <td colspan="2">إجمالي بنود الإستقطاعات</td>
                    <td><input type="text" readonly="readonly" class="form-control" name="discut_all_value"
                               value="<?php if (isset($allData->get_discut_value) && !empty($allData->get_discut_value)) {
                                   echo $allData->get_discut_value;
                               } else {
                                   echo 0;
                               } ?> " id="all_value2"></td>
                    <td colspan="4" style="text-align: center;">
                    </td>
                <td>
                    <!-- <button type="button" onclick="add_row(2,<?php echo count($discounts); ?>)" class="btn btn-success btn-next"
                            style="float: right;">
                        <i class="fa fa-plus"></i></button> -->
                </td>
                </tfoot>
                </tr>
            </table>
            <!-- discu -->
            <script>
$('#discu').DataTable( {
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