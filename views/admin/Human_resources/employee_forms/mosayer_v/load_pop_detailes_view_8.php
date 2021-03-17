<div class="col-md-12">
    <?php echo form_open(base_url() . 'human_resources/employee_forms/Employee_salaries/save_egrat', array('id' => 'pop_form')) ?>
    <div class="form-group col-md-2 col-sm-6 col-xs-6 padding-4">
        <input type="hidden" value="<?= $mosayer_data->ayam_amal ?>" id="ayam_amal">
        <input type="hidden" value="<?= $mosayer_data->sa3at_amal ?>" id="sa3at_amal">
        <input type="hidden" value="<?= $mosayer_data->emp_id ?>" name="emp_id">
        <input type="hidden" value="<?= $mosayer_data->mosayer_rkm_fk ?>" name="mosayer_rkm_fk">
        <input type="hidden" value="<?= $mosayer_data->mosayer_rkm_fk ?>" name="add">
        <input type="hidden" name="total_bdlat" id="total_bdlat"
               value="<?= ($mosayer_data->rateb_asasy + $mosayer_data->badal_sakn + $mosayer_data->badal_mowaslat + $mosayer_data->badal_etsal + $mosayer_data->badal_e3asha + $mosayer_data->badal_tabe3a_amal + $mosayer_data->tot_edafi + $mosayer_data->badal_taklef) ?>">

        <label class="label ">تاريخ الاجراء</label>
        <input type="date" name="egraa_date" id="egraa_date" class="form-control"
               value="">
    </div>
    <div class="form-group col-md-4 col-sm-6 col-xs-6 padding-4">
        <label class="label ">اسم الموظف</label>
        <input name="emp_name" id="emp_name" class="form-control" readonly
               value="<?php if (!empty($mosayer_data->emp_name)) {
                   echo $mosayer_data->emp_name;
               } ?>">
    </div>
    <div class="form-group col-md-2 col-sm-6 col-xs-6 padding-4">
        <label class="label "> الرقم الوظيفي</label>
        <input name="emp_code" id="emp_code" class="form-control"
               value="<?php if (!empty($mosayer_data->emp_code)) {
                   echo $mosayer_data->emp_code;
               } ?>" readonly>
    </div>
    <div class="form-group col-md-4 col-sm-6 col-xs-6 padding-4">
        <label class="label "> المسمى الوظيفي</label>
        <input name="mosma_wazefy_n" id="mosma_wazefy_n" class="form-control"
               value="<?php if (!empty($mosayer_data->mosma_wazefy_n)) {
                   echo $mosayer_data->mosma_wazefy_n;
               } ?>" readonly>
    </div>
    <?php switch ($code) {
        case 901:
            $badal_text = 'غياب' ?>
            <input type="hidden" value="<?= $code ?>" name="badal_code">
            <input type="hidden" value="<?= $badal_text ?>" name="badal_n">

            <div class="form-group col-md-2 col-sm-6 col-xs-6 padding-4">
                <label class="label ">عدد الايام</label>
                <input name="num" id="num" class="form-control"
                       oninput="$('#new_value').val(($('#total_bdlat').val() * this.value)/$('#ayam_amal').val() )"
                       data-validation="required"   value="">
            </div>
            <div class="form-group col-md-2 col-sm-6 col-xs-6 padding-4">
                <label class="label ">الاجمالي </label>
                <input name="new_value" id="new_value" class="form-control" value="" readonly>
            </div>
            <?php break;
        case 902:
            $badal_text = 'إجازة بدون راتب'; ?>
            <input type="hidden" value="<?= $code ?>" name="badal_code">
            <input type="hidden" value="<?= $badal_text ?>" name="badal_n">

            <div class="form-group col-md-2 col-sm-6 col-xs-6 padding-4">
                <label class="label ">عدد الايام</label>
                <input name="num" id="num" class="form-control"
                       oninput="$('#new_value').val(($('#total_bdlat').val() * this.value)/$('#ayam_amal').val() )"
                       data-validation="required"    value="">
            </div>
            <div class="form-group col-md-2 col-sm-6 col-xs-6 padding-4">
                <label class="label ">الاجمالي </label>
                <input name="new_value" id="new_value" class="form-control" value="" readonly>
            </div>
            <?php
            break;
        case 903:
            $badal_text = 'تأخير'; ?>
            <input type="hidden" value="<?= $code ?>" name="badal_code">
            <input type="hidden" value="<?= $badal_text ?>" name="badal_n">

            <div class="form-group col-md-2 col-sm-6 col-xs-6 padding-4">
                <label class="label ">عدد الدقايق</label>
                <input name="num" id="num" class="form-control"
                       oninput="$('#new_value').val(($('#total_bdlat').val() * this.value)/($('#ayam_amal').val()*$('#sa3at_amal').val() * 60) )"
                       data-validation="required"  value="">
            </div>
            <div class="form-group col-md-2 col-sm-6 col-xs-6 padding-4">
                <label class="label ">الاجمالي </label>
                <input name="new_value" id="new_value" class="form-control" value="" readonly>
            </div>
            <?php
            break;
        case 904:
            $badal_text = 'جزاءات'; ?>
            <input type="hidden" value="0" name="num">
            <input type="hidden" value="<?= $code ?>" name="badal_code">
            <input type="hidden" value="<?= $badal_text ?>" name="badal_n">

            <div class="form-group col-md-2 col-sm-6 col-xs-6 padding-4">
                <label class="label ">قيمة الجزاء </label>
                <input name="new_value" id="new_value" data-validation="required" class="form-control" value="">
            </div>
            <?php
            break;
        case 905:
            $badal_text = 'مكافآت'; ?>
            <input type="hidden" value="0" name="num">
            <input type="hidden" value="<?= $code ?>" name="badal_code">
            <input type="hidden" value="<?= $badal_text ?>" name="badal_n">

            <div class="form-group col-md-2 col-sm-6 col-xs-6 padding-4">
                <label class="label ">قيمة المكافئة </label>
                <input name="new_value" id="new_value" data-validation="required" class="form-control" value="">
            </div>
            <?php
            break;
        default:
            break;
    } ?>
    <div class="form-group col-md-4 col-sm-6 col-xs-6 padding-4">
        <label class="label ">السبب</label>
        <textarea name="reason" id="reason" class="form-control"></textarea>
    </div>
    <?php echo form_close(); ?>
</div>


<div class="col-md-12">
    <?php if (isset($mosayer_egraat_data) && (!empty($mosayer_egraat_data))) { ?>
        <table id="table_data" class="table table-responsive table-striped">
            <thead>
            <tr>
                <th>م</th>
                <th>تاريخ الاجراء</th>
                <th>اسم البدل</th>
                <th> عدد ايام <?= $badal_text ?></th>
                <th>اجمالي</th>
                <th>الاجراء</th>
            </tr>
            </thead>
            <tbody>
            <?php $x = 1;
            foreach ($mosayer_egraat_data as $egraat_datum) {
                ?>
                <tr>
                    <td><?= $x++; ?></td>
                    <td><?= $egraat_datum->egraa_date ?></td>
                    <td><?= $egraat_datum->badal_n ?></td>
                    <td><?= $egraat_datum->num ?></td>
                    <td><?= $egraat_datum->new_value ?></td>
                    <td id="td_<?= $egraat_datum->id ?>"><a onclick=' swal({
                                title: "هل انت متأكد من الحذف ؟",
                                text: "",
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonClass: "btn-danger",
                                confirmButtonText: "حذف",
                                cancelButtonText: "إلغاء",
                                closeOnConfirm: false
                                },
                                function(){ delete_egraa(<?= $egraat_datum->id ?>,"td_<?= $egraat_datum->id ?>"); });'>
                            <i class="fa fa-trash"> </i></a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>


        <script>
            $('#table_data').DataTable({
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
                        exportOptions: {columns: ':visible'},
                        orientation: 'landscape'
                    },
                    'colvis'
                ],
                colReorder: true,
                destroy: true
            });


        </script>
    <?php }

    ?>

</div>