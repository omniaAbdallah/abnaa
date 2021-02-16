<?php if (isset($family_data) && (!empty($family_data))) { ?>
    <div class="panel panel-default" style="height: 520px">
        <div class="panel-heading panel-title">بيانات الأساسية</div>
        <div class="panel-body">
        </div>
        <ul class="list-group list-group-flush">
            <?php if ($family_data->final_suspend == 4) {
                $text = "رقم الملف";
                $num = $family_data->file_num;
            } else {
                $text = "رقم الطلب";
                $num = $family_data->order_num;
            } ?>
            <li class="list-group-item"><strong> <i class="fa fa-id-card-o"></i>&nbsp<?= $text ?> :</strong> <?= $num ?></li>
            <li class="list-group-item"><strong><i class="fa fa-user-circle-o"></i>&nbsp أسم الأب
                    :</strong><?= $family_data->father_name ?></li>
            <li class="list-group-item"><strong><i class="fa fa-info-circle"></i>&nbsp رقم الهوية
                    :</strong><?= $family_data->f_national_id ?></li>
            <li class="list-group-item"><strong><i class="fa fa-user-circle-o"></i> &nbsp أسم الأم
                    :</strong><?= $family_data->mother_name ?></li>
            <li class="list-group-item"><strong><i class="fa fa-info-circle"></i>&nbsp رقم الهوية
                    :</strong><?= $family_data->mother_national_num_fk ?></li>
            <li class="list-group-item"><strong><i class="fa fa-group"></i>&nbsp عدد الأفراد
                    :</strong><?= $count_members ?> </li>
            <li class="list-group-item"><strong><i class="fa fa-info-circle"></i>&nbsp فئة الأسرة
                    :</strong><?= $family_data->osara_fe2a ?></li>
            <!--</a><li class="list-group-item"><strong><i class="fa fa-money"></i>&nbsp نصيب الفرد
                    :</strong><?= $family_data->person_value ?></li>-->
            <li class="list-group-item"><strong><i class="fa fa-map-marker"></i>&nbspالعنوان
                    :</strong><?= $h_street ?></li>
            <li class="list-group-item"><strong><i class="fa fa-map-marker"></i>&nbspالحي
                    :</strong><?= $h_village ?></li>
            <li class="list-group-item"><strong><i class="fa fa-group"></i>&nbsp عدد النشيطين كليا
                    :</strong>
                <button class="btn btn-success btn-sm"><?= $count_halt_active ?> نشط كليا</button>
            </li>
        </ul>
    </div>
<?php } ?>
