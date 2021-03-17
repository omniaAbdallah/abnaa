<table class=" table table-bordered table-striped" style="table-layout: fixed">
    <thead>
    <tr class="open_green">
        <th colspan="3" class="text-center">من</th>
        <th colspan="3" class="text-center">الي</th>
    </tr>
    <tr>
        <th rowspan="2">اسم البنك</th>
        <th rowspan="2">كود البنك</th>
        <th rowspan="2">رقم الحساب</th>
        <th rowspan="2">اسم البنك</th>
        <th rowspan="2">كود البنك</th>
        <th rowspan="2"> الحساب</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <!-- total -->
        <!-- num1 -->
        <?php
        if (isset($allData)) {
            ?>
            <td>
                <select name="from_bank_id_fk" id="from_bank_id_fk"
                        data-validation="required" aria-required="true" disabled
                        class="form-control ">
                    <option value="">إختر</option>
                    <?php
                    if (isset($banks) && $banks != null) {
                        foreach ($banks as $bank) {
                            $select = '';
                            if ($bank->id == $allData->bank_id_fk) {
                                $select = 'selected';
                            }
                            ?>
                            <option bank_code='<?= $bank->bank_code ?>'
                                    value="<?= $bank->id ?>" <?= $select ?>><?= $bank->ar_name ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </td>
            <td>
                <input type="text" class="form-control  " name="from_bank_code"
                       id="from_bank_code" value="<?= $allData->bank_code ?>" readonly/>
            </td>
            <td>
                <input type="text" class="form-control  " maxlength="24" minlength="24"
                       class="form-control bottom-input" name="from_bank_account_num"
                       id="from_bank_account_num" data-validation="required"
                       readonly
                       value="<?= $allData->bank_account_num ?>"/>
            </td>
            <!-- num1 -->
        <?php } ?>
        <!-- num2 -->
        <td>
            <select name="to_bank_id_fk" id="to_bank_id_fk"
                    data-validation="required" aria-required="true"
                    onchange="$('#to_bank_code').val($(this).find('option:selected').attr('bank_code'));get_accountes(this.value)"
                    class="form-control ">
                <option value="">إختر</option>
                <?php
                if (isset($banks) && $banks != null) {
                    foreach ($banks as $bank) {
                        $select = '';
                        ?>
                        <option bank_code='<?= $bank->bank_code ?>'
                                value="<?= $bank->id ?>" <?= $select ?>><?= $bank->ar_name ?></option>
                        <?php
                    }
                }
                ?>
            </select>
        </td>
        <td>
            <input type="text" class="form-control  " name="to_bank_code"
                   id="to_bank_code" value="" readonly/>
        </td>
        <td>
     
            <select name="to_bank_account_num" id="to_bank_account_num" data-validation="required" aria-required="true"
                    class="form-control ">
                <option value="">إختر</option>

            </select>
        </td>
        <!-- num2 -->
    </tr>
    </tbody>
    <tfoot class="open_green">
    </tfoot>
</table>
                
       
