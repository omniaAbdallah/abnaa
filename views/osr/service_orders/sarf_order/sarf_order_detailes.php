<?php if (isset($talab_data) && (!empty($talab_data))) {
    $talab_rkm = $talab_data->talab_rkm;
    $talab_id = $talab_data->id;
    $talab_date_ar = $talab_data->talab_date_ar
    ?>
   <!-- <div class="col-md-12 no-padding">
        <table class="table table-responsive  " style="with=50%">
            <tbody>
            <tr>
                <th>رقم الطلب :</th>
                <td><?= $talab_rkm ?></td>

                <th>تاريخ الطلب :</th>
                <td><?= $talab_date_ar ?></td>
            </tr>
            <tr><td colspan="4"></td></tr>
            </tbody>
        </table>

    </div>-->
    <?php
    if (!empty($talab_data->details)) { ?>
        <div class="clearfix"></div>
        <div class="col-md-12 no-padding">
            <table class=" table table-bordered  table-hover ">
                <thead>

                <tr class="">
                    <th>م</th>
                    <th>اسم الصنف</th>
                    <th>كود الصنف</th>
                    <th> الوحدة</th>
                    <th> سعر الوحدة</th>
                    <th> ملاحظات</th>
                </tr>

                </thead>
                <tbody>
                <?php
                foreach ($talab_data->details as $key => $detail) { ?>

                    <tr>
                        <td><?= $key ?></td>
                        <td><?= $detail->sanf_name ?></td>
                        <td><?= $detail->sanf_code ?></td>
                        <td><?= $detail->sanf_whda ?>
                        </td>
                        <td><?= $detail->sanf_one_price ?></td>
                        <td><?= $detail->notes ?></td>
                    </tr>
                <? } ?>
                </tbody>
            </table>
        </div>
        <?php
    }
    ?>
<?php } ?>
