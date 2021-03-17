
<?php

if (isset($cards) && !empty($cards)) {
$z = 1;
?>

<table class="table table-bordered table-striped table-hover">
    <thead>
    <tr class="info">
        <th style="text-align: center;">أسم البطاقة</th>
        <th style="text-align: center;">التفاصيل</th>
        <th style="text-align: center;">الاجراء</th>

    </tr>

    </thead>
    <tbody id="question_table">

    <?php

        foreach ($cards as $row) {
            ?>
            <tr id="row_q<?= $z ?>">

                <td style="width: 50%">

                    <?= $row->title?>

                </td>

               <td style="width: 10%">

                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal"
                            data-target="#myModal"  onclick="load_details(<?=$row->id?>);">
                           <i class="fa fa-list"></i> التفاصيل
                    </button>
                </td>


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
                        delete_card($("#row_q<?= $z ?>"),<?= $row->id ?>);
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

