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
        <th class="info"> العدد</th>
        <td><?php echo $result['num'] ?></td>
        <th class="info" colspan="1"> مبررات الطلب</th>
        <td ><?php echo $result['mobrerat_name'] ?></td>

    </tr>
    </thead>

</table>
<table class="table table-bordered ">
    <thead>
    <tr>
        <th class="info" colspan="1"> الوصف</th>
        <td ><?php echo $result['wasf'] ?></td>
    </tr>
    </thead>

</table>

