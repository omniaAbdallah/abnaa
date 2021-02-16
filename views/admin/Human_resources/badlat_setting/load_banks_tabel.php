<?php
                if (isset($allData->Banks)) {
                    ?>
                     <table id="bank" class=" display table table-bordered responsive nowrap text-center" id="banktable" cellspacing="0"
                   width="100%">
                <thead>
                <tr class="greentd">
                 <!--   <th colspan="6" class="text-center">بيانات الحسابات البنكية</th> -->
                </tr>
                <tr class="greentd">
                    <th>إسم الموظف لدي البنك</th>
                    <th>إسم البنك</th>
                    <th>كود البنك</th>
                    <th>رقم الحساب</th>
                    <th>صوره الحساب</th>
                     <th>حالة الحساب</th>
                    <?php if (isset($allData->Banks)) { ?>
                        <th>الإجراء</th>
                    <?php } ?>
                </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($allData->Banks as $key => $value) {
                        ?>
                        <tr>
                         <td>
                                    <?= $value->emp_bank_name ?>
                             </td>
                            <td>
                                <!-- <select name="" disabled="disabled" class="form-control bottom-input"
                                        data-validation="required"
                                        onchange="$('#bank_code<?= $key ?>').val($(this).find('option:selected').attr('bank_code'))">
                                    <option value="">إختر</option> -->
                                    <?php
                                    if (isset($banks) && $banks != null) {
                                        foreach ($banks as $bank) {
                                            if ($bank->id == $value->bank_id_fk) {
                                            echo   $bank->ar_name;
                                            }
                                            ?>
                                            <!-- <option bank_code='<?= $bank->bank_code ?>'
                                                    value="<?= $bank->id ?>" <?= $select ?>> -->
                                                    <!-- </option> -->
                                            <?php
                                        }
                                    }
                                    ?>
                                <!-- </select> -->
                            </td>
                            <td>
                                <!-- <input type="text" disabled="disabled" class="form-control bottom-input" name=""
                                       id="bank_code<?= $key ?>" value=" -->
                                       <?= $value->bank_code ?>
                                       <!-- " readonly/> -->
                            </td>
                            <td>
                                <!-- <input type="text" disabled="disabled" maxlength="24" minlength="24"
                                       class="form-control bottom-input" name="" id="bank_account_num<?= $key ?>"
                                       data-validation="required" onfocusout="checkLength($(this).val());"
                                       value=" -->
                                       <?= $value->bank_account_num ?>
                                       <!-- "/> -->
                            </td>
                            <td>
                                <a data-toggle="modal" type="button" style="cursor: pointer"
                                   data-target="#modal-img<?php echo $value->id; ?>">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <!--  -->
                                <div class="modal fade" id="modal-img<?php echo $value->id; ?>" tabindex="-1"
                                         role="dialog"
                                         aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close"><span
                                                                aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel"></h4>
                                                </div>
                                                <div class="modal-body">
                                                    <?php if ($value->bank_id_fk_image === 0) { ?>
                                                        <img src="<?php echo base_url(); ?>asisst/web_asset/img/logo.png"
                                                             width="100%" height="">
                                                    <?php } else { ?>
                                                        <img src="<?php echo base_url(); ?>uploads/human_resources/emp_banks/<?php echo $value->bank_id_fk_image; ?>"
                                                             width="100%" height="">
                                                    <?php } ?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" style="float: left"
                                                            data-dismiss="modal">إغلاق
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--  -->
                            </td>
                            <td>
                                <div class="col-sm-12">
                                    <?php
                                    if ($value->approved_for_sarf == 0) {
                                        $approved_for_sarf = 1;
                                        $class = ' btn btn-danger';
                                        $word = 'غير نشط';
                                    } elseif ($value->approved_for_sarf == 1) {
                                        $approved_for_sarf = 0;
                                        $class = 'btn btn-success';
                                        $word = ' نشط';
                                    }
                                    ?>
                                    <button class="<?php echo $class; ?>" type="button"
                                            row_id="<?php echo $value->id; ?>"><?php echo $word; ?></button>
                                    <button type="button" class=" btn btn-danger" row_id="<?php echo $value->id; ?>"
                                            onclick="change_status2(<?php echo $value->id; ?>,<?php echo $value->emp_code; ?>,<?php echo $approved_for_sarf; ?>);">
                                        <i class=" fa fas fa-undo"></i></button>
                                </div>
                            </td>
                            <td>
                                <a  onclick='deleteFinanceEmp(<?php echo $value->id; ?>,<?php echo $value->emp_code; ?>)
                                           '><i class="fa fa-trash"
                                                                                                 aria-hidden="true"></i>
                                </a>
                                <a data-toggle="modal" type="button" style="cursor: pointer"
                                onclick="edite_bank(<?php echo $value->id; ?>);"
                                   data-target="#modal-info">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                        <?php
                    }
                }
                ?>
                </tbody>
               
            </table>
            <script>
$('#bank').DataTable( {
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