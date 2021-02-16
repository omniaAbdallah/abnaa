<?php
$mada_syana = array(1 => 'أول مره ', 2 => 'أكثر من مرة', 3 => 'غير محدد');
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
        <td ><?php echo $result['osra_name'] ?></td>
        <td class="info">مقدم الطلب</td>
        <td ><?= $result['mokadem_name'] ?></td>

    </tr>
    </thead>

</table>
<table class="table table-bordered ">
    <thead>
    <tr>
        <th class="info"> النوع الجهاز</th>
        <td><?php echo $result['type_device_name'] ?></td>
        <th class="info"> الماركة</th>
        <td><?php echo $result['brand'] ?></td>
        <th class="info"> الموديل</th>
        <td><?php echo $result['model'] ?></td>
        <th class="info"> مدة استخدام الجهاز</th>
        <td><?php echo $result['num_year'] ?> سنه</td>


    </tr>
    </thead>

</table>
<table class="table table-bordered ">
    <thead>
    <tr>
        <th class="info" > مبررات الطلب</th>
        <td ><?php echo $result['mobrerat_name'] ?></td>
        <th class="info" > المواصفات</th>
        <td ><?php echo $result['mosfat'] ?></td>
    </tr>
    </thead>

</table>
<table class="table table-bordered ">
    <thead>
    <tr>
        <th class="info">حالة الجهاز</th>
        <td><?php echo $result['device_status_name'] ?></td>
        <th class="info" >وصف العطل</th>
        <td ><?php echo $result['wasf'] ?></td>
        <th class="info"> مدى حدوث العطل</th>
        <td><?php if (key_exists($result['mada_syana_device'], $mada_syana)) {
                echo $mada_syana[$result['mada_syana_device']];
            } else {
                echo 'غير محدد';
            } ?></td>


    </tr>
    </thead>

</table>
<table class="table table-bordered ">
    <thead>
    <tr>
        <th class="info" > بمعرفة مختص</th>
        <td><?php if (key_exists($result['m3rfat_mokhtas'], $m3rfat)) {
                echo $m3rfat[$result['m3rfat_mokhtas']];
            } else {
                echo 'غير محدد';
            } ?></td>
        <th class="info" > التكلفة التقديرية</th>
        <td><?php echo $result['taklfa'] ?></td>
    </tr>

    </thead>

</table>

