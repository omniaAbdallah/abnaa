<?php
$m3rfat = array(1 => 'نعم', 2 => 'لا');
?>
<table class="table table-bordered">
    <tbody>
    <tr>
        <td class="info">رقم الطلب</td>
        <td><?= $result['rkm_talab'] ?></td>
        <td class="info">تاريخ الطلب</td>
        <td><?= $result['talab_date_ar'] ?></td>
        <th class="info"> فئة الخدمة</th>
        <td><?php echo $result['f2a_service_name'] ?></td>
        <th class="info"> نوع الخدمة</th>
        <td><?php echo $result['type_sevice_name'] ?></td>
    </tr>

    </tbody>
</table>
<table class="table table-bordered ">
    <thead>
    <tr>
        <td class="info">رقم الملف</td>
        <td><?= $result['file_num'] ?></td>
        <th class="info">إسم الأسرة</th>
        <td style="width: 30% !important;"><?php echo $result['osra_name'] ?></td>
        <td class="info">مقدم الطلب</td>
        <td style="width: 30% !important;"><?= $result['mokadem_name'] ?></td>

    </tr>
    </thead>

</table>
<table class="table table-bordered ">
    <thead>
    <tr>
        <th class="info"> النوع </th>
        <td><?php echo $result['type_name'] ?></td>
        <th class="info"> ملكية السكن </th>
        <td><?php echo $result['house_owner_name'] ?></td>
        <th class="info"> نوع السكن </th>
        <td><?php echo $result['type_house_name'] ?></td>

    </tr>
    </thead>

</table>
<table class="table table-bordered ">
    <thead>
    <tr>
        <th class="info">حالة السكن </th>
        <td><?php echo $result['house_status_name'] ?>
        </td> <th class="info">عدد الغرف  </th>
        <td><?php echo $result['room_num'] ?></td>
        </td> <th class="info">مساحة البناء   </th>
        <td><?php echo $result['house_size'] ?></td>


    </tr>
    </thead>

</table>
<table class="table table-bordered ">
    <thead>
    <tr>
        <th class="info"> أماكن العمل</th>
        <td><?php echo $result['pleac_work_name'] ?></td>
        <th class="info">تفاصيل العمل المطلوب</th>
        <td><?php echo $result['pleac_work_detils'] ?></td>

    </tr>
    </thead>

</table>

<table class="table table-bordered ">
    <thead>
    <tr>
        <th class="info">حالة العداد</th>
        <td><?php if (key_exists($result['m3rfat_mokhtas'], $m3rfat)) {
                echo $m3rfat[$result['m3rfat_mokhtas']];
            } else {
                echo 'غير محدد';
            } ?></td>

        <th class="info"> مبررات الطلب</th>
        <td><?php echo $result['mobrerat_name'] ?></td>

    </tr>
    </thead>

</table>
