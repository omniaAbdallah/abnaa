

<span class="title" style="width: 120px " >
    <h3><?php echo $card_title;?> </h3>
</span>
<?php

if (isset($results_card) && !empty($results_card)) {
    $z = 1;

    ?>

    <table class="table table-bordered table-striped table-hover">
        <thead>
        <tr class="info">
            <th style="text-align: center;"> البنك</th>
            <th style="text-align: center;"> الحساب</th>
            <th style="text-align: center;"> رقم الحساب</th>
            <th style="text-align: center;"> الحالة</th>

        </tr>

        </thead>
        <tbody id="result_table">

        <?php

        foreach ($results_card as $row) {
            ?>
            <tr id="row_<?= $z ?>">

                <td><?=$row->bank_name?></td>
                <td><?=$row->account_name?></td>
                <td><?=$row->account_number?></td>
                <td><?=($row->card_status?"نشط":"غيرنشط")?></td>


            </tr>
            <?php
            $z++;

        }

        ?>

        </tbody>

    </table>

    <?php
} else {
    echo '<div class="alert alert-danger">لا توجد بيانات</div>';
}
?>
