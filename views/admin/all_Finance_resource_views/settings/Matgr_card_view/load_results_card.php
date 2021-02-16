

<?php

if (isset($results_card) && !empty($results_card)) {
    $z = 1;

?>

<table class="table table-bordered table-striped table-hover">
<thead>
<tr class="info">
    <th style="text-align: center;"> أسم البطاقه</th>
    <th style="text-align: center;"> البنك</th>
    <th style="text-align: center;"> الحساب</th>
    <th style="text-align: center;"> رقم الحساب</th>
    <th style="text-align: center;"> الحالة</th>
    <th style="text-align: center;">الاجراء</th>

</tr>

</thead>
<tbody id="result_table">

<?php

    foreach ($results_card as $row) {
        ?>
        <tr id="row_<?= $z ?>">

            <td>
                <?= $allcards[$row->card_id_fk] ?>
            </td>

            <td><?=$row->bank_name?></td>
            <td><?=$row->account_name?></td>
            <td><?=$row->account_number?></td>
            <td><?=($row->card_status?"نشط":"غيرنشط")?></td>


            <td style="width: 10%">

                <a href="#" onclick='swal({
                        title: "هل انت متأكد من الحذف ؟",
                        text: "",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "حذف",
                        cancelButtonText: "إلغاء",
                        closeOnConfirm: true
                        },
                        function(){
                        delete_card($("#row_<?= $z ?>"),<?= $row->id ?>);
                        });'>
                    <i class="fa fa-trash"> </i></a>

            </td>

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
