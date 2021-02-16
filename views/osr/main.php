<style>

    .list-group-flush .list-group-item:first-child {
        border-top-width: 0;
    }

    .list-group-flush:last-child .list-group-item:last-child {

        border-bottom-width: 0;

    }

    .list-group-flush .list-group-item {
        border-right-width: 0;
        border-left-width: 0;
        border-radius: 0;
    }
</style>
<div class="content" id="Main-content">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-xs-12 fadeInUp wow" style="margin-top: 20px;">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="main test1">
                        <strong>أهلاً بك </strong> <?= $family_data->mother_name ?>
                    </div>

                   <div class="main1 test2 col-md-12">
                        <div class="  col-md-1" style=" background: #232424;margin-right: -14px;height:42px;">
                            <h2 style="margin-top: 6px;"> </h2>
                        </div>
                        <div class="col-md-11">
                            <marquee direction="right" style="margin-top: 9px;font-size: 16px;"> يسر جمعية أبناء أن تكون دائما علي تواصل معكم
                            </marquee>
                        </div>
                    </div>

                    <div class="col-md-12">


                        <div class="col-md-12">
                            <div class="col-md-4">
                                <?php if (isset($family_data) && (!empty($family_data))) { ?>
                                    <div class="panel panel-default" style="height: 325px">
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
                                            <li class="list-group-item"><strong><?= $text ?> :</strong> <?= $num ?></li>
                                            <li class="list-group-item"><strong>أسم الأب
                                                    :</strong><?= $family_data->father_name ?></li>
                                            <li class="list-group-item"><strong>رقم الهوية
                                                    :</strong><?= $family_data->f_national_id ?></li>
                                            <li class="list-group-item"><strong>أسم الأم
                                                    :</strong><?= $family_data->mother_name ?></li>
                                            <li class="list-group-item"><strong>رقم الهوية
                                                    :</strong><?= $family_data->mother_national_num_fk ?></li>

                                        </ul>
                                    </div>
                                <?php } ?>
                            </div>


                            <div class="col-md-4">
                                <div class="panel panel-default" style="height: 325px">
                                    <div class="panel-heading panel-title">الإحصائيات</div>
                                    <div class="panel-body">

                                        <canvas id="chartjs-4" class="chartjs"></canvas>

                                    </div>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="panel panel-default" style="height: 325px">
                                    <div class="panel-heading panel-title">نحن أبناء</div>
                                    <div class="panel-body">

                                      <iframe width="400" height="260" 
                                      src="https://www.youtube.com/embed/i4WVQELrQ9c"
                                       frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen>
                                      </iframe>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-12">

                            <div class="panel panel-default">
                                <div class="panel-heading panel-title">أفراد الأسرة</div>
                                <div class="panel-body">
                                </div>

                                <?php if (isset($member_data) && $member_data != null) { ?>
                                    <table id="example" class=" table table-bordered table-striped" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th>م</th>
                                            <th>الإسم</th>
                                            <th>رقم الهوية</th>
                                            <th>الصلة</th>
                                            <th>الجنس</th>
                                            <th>تاريخ الميلاد هجري</th>
                                            <th>العمر</th>
                                            <th>التصنيف</th>
                                            <th>طبيعة الفرد</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                        $x = 1;
                                        foreach ($member_data as $row) { ?>
                                            <tr>
                                                <td><?php echo $x; ?></td>
                                                <td><?php echo $row->member_full_name; ?></td>
                                                <td><?php echo $row->member_card_num; ?></td>
                                                <td><?php echo $row->relation_name; ?></td>
                                                <td><?php if ($row->member_gender == 1) {
                                                        echo 'ذكر';
                                                    } else {
                                                        echo 'انثى';
                                                    } ?></td>
                                                <td><?php echo $row->member_birth_date_hijri; ?></td>
                                                <td>
                                                    <?php
                                                    $age = '';
                                                    if (isset($row->member_birth_date_hijri) && !empty($row->member_birth_date_hijri) &&
                                                        isset($current_year) && !empty($current_year)) {
                                                        $age = $current_year - $row->member_birth_date_hijri_year;
                                                    }
                                                    echo $age . " عام";
                                                    ?>
                                                </td>
                                                <td><?php
                                                    if ($row->categoriey_member == 1) {
                                                        $categoriey_member = 'أرملة ';
                                                    } elseif ($row->categoriey_member == 2) {
                                                        $categoriey_member = 'يتيم ';
                                                    } elseif ($row->categoriey_member == 3) {
                                                        $categoriey_member = 'مستفيد بالغ ';
                                                    } else {
                                                        $categoriey_member = 'غير محدد  ';
                                                    }
                                                    echo $categoriey_member;
                                                    ?>
                                                </td>
                                                <td> <?= $row->member_person_type_name ?> </td>
                                            </tr>
                                            <?php $x++;
                                        } ?>
                                        </tbody>
                                    </table>
                                <?php } ?>
                            </div>

                        </div>
                        <div class="col-md-12">

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title">
                                        بيان صرف المساعدات للأسرة
                                    </div>
                                </div>
                                <div class="panel-body">

                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <div class="panel panel-default" style="height: 325px">
                                                <div class="panel-heading panel-title"> الإحصائيات بأسم بند المساعده </div>
                                                <div class="panel-body">
                                                    <?php
                                                    if (empty($family_sarf_bands)){
                                                        ?>
                                                        <div class="alert alert-danger">لا يوجد بيانات  </div>
                                                        <?php
                                                    }
                                                    ?>
                                                    <canvas id="chartjs-6" class="chartjs"></canvas>

                                                </div>
                                            </div>
                                        </div>



                                        <div class="col-md-6">
                                            <div class="panel panel-default" style="height: 325px">
                                                <div class="panel-heading panel-title"> الإحصائيات بالشهور </div>
                                                <div class="panel-body">
                                                    <?php
                                                    if (empty($family_sarf_months)){
                                                        ?>
                                                        <div class="alert alert-danger">لا يوجد بيانات  </div>
                                                        <?php
                                                    }
                                                    ?>
                                                    <canvas id="chartjs-5" class="chartjs"></canvas>

                                                </div>
                                            </div>
                                        </div>



                                    </div>

                                    <?php /*if (isset($family_sarf) && !empty($family_sarf)) { ?>
                                        <table class=" example display table table-bordered table-striped table-hover compact">
                                            <thead>
                                            <tr>
                                                <th>م</th>
                                                <th>رقم الصرف</th>
                                                <th>اسم بند المساعدة</th>
                                                <th>بتاريخ</th>
                                                <th>قيمة المساعدة</th>
                                                <th>عدد الأفراد</th>
                                                <th>خلال شهر</th>

                                            </tr>

                                            </thead>
                                            <tbody>
                                            <?php
                                            $x = 1;
                                            $total = 0;
                                            foreach ($family_sarf as $row) {
                                                $total += $row->value;
                                                ?>
                                                <tr>
                                                    <td><?= $x++; ?></td>
                                                    <td><?= $row->sarf_num_fk ?></td>
                                                    <td><?php
                                                        if (!empty($row->band_name->title)) {
                                                            echo $row->band_name->title;
                                                        } else {
                                                            echo 'غير محدد';
                                                        }
                                                        ?></td>
                                                    <td><?php if (!empty($row->sarf->sarf_date_ar)) {
                                                            echo $row->sarf->sarf_date_ar;
                                                        } else {
                                                            echo 'غير محدد';
                                                        } ?></td>
                                                    <td><?php
                                                        if (!empty($row->value)) {
                                                            echo $row->value;
                                                        } else {
                                                            echo 'غير محدد';
                                                        } ?>

                                                    </td>
                                                    <td><?php
                                                        if (!empty($row->mother_num)) {
                                                            echo($row->mother_num + $row->young_num + $row->adult_num);
                                                        } else {
                                                            echo 'غير محدد';
                                                        } ?>

                                                    </td>
                                                    <td>
                                                        <?php
                                                        if (!empty($row->sarf_month)) {
                                                            echo $row->sarf_month;
                                                        } else {
                                                            echo 'غير محدد';
                                                        }
                                                        ?>
                                                    </td>

                                                </tr>
                                            <?php } ?>

                                            </tbody>
                                            <tfoot>
                                            <th colspan="4" style="text-align: center">الاجمالي</th>
                                            <th colspan="2" style="text-align: center"><?= $total ?></th>
                                            </tfoot>


                                        </table>
                                    <?php } else {
                                        ?>
                                        <div class="alert alert-danger">عفوا... لا يوجد بيانات !</div>
                                        <?php
                                    } */?>

                                </div>

                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src='<?= base_url() ?>asisst/osr_asset/plugins/chartJs/Chart.min.js'></script>
        <script src='<?= base_url() ?>asisst/osr_asset/plugins/chartJs/chart.js'></script>


        <script>
            var labels = ['ارملة', 'بتيم', 'مستفيد'];
            var labels_2 = ['ارملة نشط ', 'بتيم نشط ', 'مستفيد نشط'];
            var data = [<?=$chart_data['mothers']?>, <?=$chart_data['aytam']?>, <?=$chart_data['mosdafed']?>];
            var data2 = [<?=$chart_data['mothers']?>, <?=$chart_data['aytam'] - 2?>, <?=$chart_data['mosdafed'] + 1?>];
            var backgroundColor = ["rgb(255, 99, 132)", "rgb(54, 162, 235)", "rgb(255, 205, 86)"];

            var chart = new Chart(document.getElementById("chartjs-4"), {
                type: "doughnut",
                data: {
                    labels: labels,
                    datasets: [{
                        data: data,
                        backgroundColor: backgroundColor
                    }]
                }
            });

            // eslint-disable-next-line no-unused-vars
            function addDataset() {
                chart.data.datasets.push({
                    data: data2,
                    backgroundColor: backgroundColor
                });
                chart.data.labels.push(labels_2);
                // chart.data.labels=labels_2;
                chart.update();
            }
        </script>
        <script>
            var labels = <?=$family_sarf_months['labels']?>; //['ارملة', 'بتيم', 'مستفيد'];
            var data = <?=$family_sarf_months['data']?>;
            var backgroundColor = <?=$family_sarf_months['backgroundColor']?>; //["rgb(255, 99, 132)", "rgb(54, 162, 235)", "rgb(255, 205, 86)"];

            var chart = new Chart(document.getElementById("chartjs-5"), {
                type: "bar",
                data: {
                    labels: labels,
                    datasets: [{
                        label: " مجموعة بياناتي الأولى",
                        data: data,
                        backgroundColor: backgroundColor
                    }]
                }
            });
        </script>

        <script>
            var labels = <?=$family_sarf_bands['labels']?>; //['ارملة', 'بتيم', 'مستفيد'];
            var data = <?=$family_sarf_bands['data']?>;
            var backgroundColor = <?=$family_sarf_bands['backgroundColor']?>; //["rgb(255, 99, 132)", "rgb(54, 162, 235)", "rgb(255, 205, 86)"];

            var chart = new Chart(document.getElementById("chartjs-6"), {
                type: "bar",
                data: {
                    labels: labels,
                    datasets: [{
                        label: " مجموعة بياناتي الأولى",
                        data: data,
                        backgroundColor: backgroundColor
                    }]
                }
            });

        </script>


