<style>
td .fa-eye {
    padding: 2px 6px !important;
    /* font-size: 12px; */
    line-height: 1.5;
    background-color: #00af0d;
    /* color: #fff; */
    /* border-radius: 2px; */
    border-radius: 11px;
}
</style>
<?php
$mada_syana = array(1 => 'أول مره ', 2 => 'أكثر من مرة', 3 => 'غير محدد');
$m3rfat = array(1 => 'نعم', 2 => 'لا');
$files = array('بطاقة العائلة	' => 'family_card_img', 'عقد النكاح	' => 'nekah_akd_img', 'صورة الهوية	' => 'hawia_img', 'الصورة الشخصية	' => 'person_img', 'عقد القاعة	' => 'akd_qa3a_img', 'تعريف بالراتب	' => 'ta3ref_ratb_img', 'تزكية الامام	' => 'tazkia_emam_img');
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
        <th class="info"> رقم الجوال</th>
        <td><?php echo $result['jwal'] ?></td>
        <th class="info"> مكان الزواج</th>
        <td><?php echo $result['makan_zawaj'] ?></td>
        <th class="info"> تاريخ الزواج</th>
        <td><?php echo $result['date_zawaj'] ?></td>
        <th class="info"> رقم العقد</th>
        <td><?php echo $result['rkm_akd'] ?> </td>
    </tr>
    </thead>
</table>
<table class="table table-bordered ">
    <thead>
    <tr>
        <th class="info" >تاريخ العقد</th>
        <td ><?php echo $result['date_akd'] ?></td>
        <th class="info" > قيمة المهر</th>
        <td ><?php echo $result['mahr_value'] ?></td>
    </tr>
    </thead>
</table>
<table class="table table-bordered ">
    <thead>
    <tr>
        <th class="info">جهة اصدار العقد </th>
        <td><?php echo $result['geha_esdar_akd'] ?></td>
        <th class="info" > الزواج لاول مرة</th>
        <td><?php if (key_exists($result['first_zawaj'], $m3rfat)) {
                echo $m3rfat[$result['first_zawaj']];
            } else {
                echo 'غير محدد';
            } ?></td>
       
    </tr>
    </thead>
</table>
<table class="table table-bordered table-devices">
                                                <tbody>
                                                <?php
                                                $x = 1;
                                                foreach ($files as $key => $value2) {
                                                    if ($x % 1 != 0) {
                                                        echo '</tr>';
                                                    }
                                                    ?>
                                                    <?php if ($result[$value2]) { ?>
                                                    <th class="gray_background" style="width: 25%;"><?= $key ?></th>
                                                    <td>
                                                            <a href="<?= base_url() . 'family_controllers/talbat/Talb_main/download/' . $result[$value2] ?>"><span><i
                                                                            class="fa fa-download" style="
    color: blue;
"></i></span></a>
                                                        
                                                                            <a target="_blank" onclick="show_img('<?= base_url() . 'uploads/family_attached/osr_talbat_marriage_help' . '/' .$result[$value2]?>')">
                                    <i class=" fa fa-eye" style="
    color: green;
"></i>
                                </a> 
                                                           
                                                    </td>
                                                    <? } ?>
                                                    <?php
                                                    if ($x % 1 == 0) {
                                                        echo '</tr>';
                                                    }
                                                    $x++;
                                                }
                                                ?>
                                                </tbody>
                                            </table>
                                            <script>

    function show_img(src) {

        var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
        WinPrint.document.write('<img src="' + src + '" style="width: 100%; height:  100%;">');
        WinPrint.document.close();
        WinPrint.focus();
    }
</script>