<?php
$status = array(1 => 'حاليا يعمل  ', 2 => 'لا يعمل');
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
        <th class="info"> اسم المشترك</th>
        <td><?php echo $result['moshtrk_name'] ?></td>
        <th class="info"> رقم الحساب</th>
        <td><?php echo $result['rkm_hesab'] ?></td>

    </tr>
    </thead>

</table>
<table class="table table-bordered ">
    <thead>
    <tr>
        <th class="info"> رقم العداد </th>
        <td><?php echo $result['type_name'] ?></td>
        <th class="info">حالة العداد</th>
        <td><?php if (key_exists($result['status_3dad'], $status)) {
                echo $status[$result['status_3dad']];
            } else {
                echo 'غير محدد';
            } ?></td>
        <th class="info"> العنوان</th>
        <td><?php echo $result['address'] ?></td>


    </tr>
    </thead>

</table>
<table class="table table-bordered ">
    <thead>
    <tr>
        <th class="info"> مبررات الطلب</th>
        <td><?php echo $result['mobrerat_name'] ?></td>
        <th class="info"> رقم الفاتورة</th>
        <td><?php echo $result['rkm_fatora'] ?></td>
    </tr>
    </thead>

</table>
<table class="table table-bordered ">
    <thead>
    <tr>
        <th class="info"> تاريخ الفاتورة</th>
        <td><?php echo $result['fatora_date'] ?></td>
        <th class="info"> بداية الفترة</th>
        <td><?php echo $result['from_fatra'] ?></td>
        <th class="info"> نهاية الفترة</th>
        <td><?php echo $result['to_fatra'] ?></td>
    </tr>
    </thead>

</table>

<table class="table table-bordered ">
    <thead>
    <tr>
        <th class="info" style="width: 20% !important;" > المبلغ المطلوب سداده </th>
        <td><?php echo $result['money_sadad'] ?></td>
        <th class="info"> أخر موعد للسداد </th>
        <td><?php echo $result['last_sadad_date'] ?></td>
    </tr>
    </thead>

</table>
