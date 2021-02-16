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
        <td><?php echo $result['osra_name'] ?></td>
        <td class="info">مقدم الطلب</td>
        <td><?= $result['mokadem_name'] ?></td>
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
        <th class="info">تاريخ العقد</th>
        <td><?php echo $result['date_akd'] ?></td>
        <th class="info"> قيمة المهر</th>
        <td><?php echo $result['mahr_value'] ?></td>
    </tr>
    </thead>
</table>
<table class="table table-bordered ">
    <thead>
    <tr>
        <th class="info">جهة اصدار العقد</th>
        <td><?php echo $result['geha_esdar_akd'] ?></td>
        <th class="info"> الزواج لاول مرة</th>
        <td><?php if (key_exists($result['first_zawaj'], $m3rfat)) {
                echo $m3rfat[$result['first_zawaj']];
            } else {
                echo 'غير محدد';
            } ?></td>

    </tr>
    </thead>
</table>
<?php
/*echo '<pre>';
print_r($result);*/
if (isset($files) && !empty($files)) {
    $x = 1;
    $image = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP');
    $file = array('pdf', 'PDF', 'xls', 'xlsx', ',doc', 'docx', 'txt');
    $folder = 'uploads/family_attached/osr_talbat_marriage_help';
    ?>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th colspan="5" style="background: #2ba7b3; color: white;" colspan="4">المرفقات</th>
        </tr>
        <tr class="">
            <th>م</th>
            <th>نوع الملف</th>
            <th>اسم الملف</th>
            <th> الملف</th>
            <th>الحجم</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($files as $key => $value2) {
            if ($result[$value2]) {

                $ext = pathinfo($result[$value2], PATHINFO_EXTENSION);
                $Destination = $folder . '/' . $result[$value2];
                if (file_exists($Destination)) {
                    $bytes = filesize($Destination);
                } else {
                    $bytes = '';
                }
                $size = '';
                if ($bytes >= 1073741824) {
                    $size = number_format($bytes / 1073741824, 2) . ' GB';
                } elseif ($bytes >= 1048576) {
                    $size = number_format($bytes / 1048576, 2) . ' MB';
                } elseif ($bytes >= 1024) {
                    $size = number_format($bytes / 1024, 2) . ' KB';
                } elseif ($bytes > 1) {
                    $size = $bytes . ' bytes';
                } elseif ($bytes == 1) {
                    $size = $bytes . ' byte';
                } else {
                    $size = '0 bytes';
                }
                ?>
                <tr>
                    <td><?= $x++ ?></td>
                    <td>
                        <?php
                        if (in_array($ext, $image)) {
                            ?>
                            <i class="fa fa-picture-o" aria-hidden="true" style="color: #d93bff;"></i>
                        <?php } elseif (in_array($ext, $file)) { ?>
                            <i class="fa fa-file-pdf-o" aria-hidden="true" style="color: red;"></i>
                        <?php }
                        ?>
                    </td>
                    <td>
                        <?php
                        if (!empty($key)) {
                            echo $key;
                        } else {
                            echo 'لا يوجد ';
                        }
                        ?>
                    </td>
                    <td>
                        <!--  -->
                        <?php
                        if (in_array($ext, $image)) {
                            ?>
                            <?php if (!empty($result[$value2])) {
                                $url = base_url() . $folder . '/' . $result[$value2];
                            } else {
                                $url = base_url('asisst/fav/apple-icon-120x120.png');
                            } ?>
                            <a target="_blank" class="btn btn-sm btn-success" onclick="show_img('<?= $url ?>')">
                                <i class=" fa fa-eye"></i>
                            </a>
                            <?php
                        } elseif (in_array($ext, $file)) {
                            ?>
                            <?php if (!empty($result[$value2])) {
                                $url = base_url() . 'family_controllers/talbat/Talb_mariage_help/read_file/' . $result[$value2];
                            } else {
                                $url = base_url('asisst/fav/apple-icon-120x120.png');
                            } ?>
                            <a target="_blank" class="btn btn-sm btn-success" onclick="show_bdf('<?= $url ?>')">
                                <i class=" fa fa-eye"></i>
                            </a>
                            <!--<button class="btn btn-sm btn-success"  onclick="show_bdf('<?= $url ?>')" type="button">
        الاطلاع</button>-->
                            <?php
                        } else {
                            echo 'لا يوجد';
                        }
                        ?>
                        <!--  -->
                    </td>
                    <td>
                        <?= $size ?>
                    </td>
                </tr>
                <?php
            }
        }
        ?>
        </tbody>
    </table>
    <?php
}
?>
<script>

    function show_img(src) {

        var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
        WinPrint.document.write('<img src="' + src + '" style="width: 100%; height:  100%;">');
        WinPrint.document.close();
        WinPrint.focus();
    }
</script>