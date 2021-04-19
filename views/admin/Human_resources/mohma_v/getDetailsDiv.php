<style>

    .label-inverse {
        width: 100%;
        color: white;
        height: auto;
        margin: 0;
        font-family: 'hl';
        padding-right: 0px;
        font-size: 15px;
        display: inline-block;
        text-align: right;
    }
</style>
<style>
    .info_detailes {
        width: unset !important;
        border-top: 1px solid #ffffff !important;
        border-right: 1px solid #ffffff !important;
        background-color: #e4e4e4 !important;
        color: black !important;
        font-size: 15px !important;
    }
</style>
<div class="col-xs-12 padding-4">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th class="info_detailes"
            ">
            أسم المهمة
            </th>

            <td> <?php
                if (!empty($get_all->mohma_name)):
                    echo   $get_all->mohma_name;
                endif;
                ?></td>
            <th class="info_detailes"> تاريخ الانشاء</th>

            <td><?php if (!empty($get_all->mohma_date)) {
                    echo  $get_all->mohma_date;
                } else{
                    echo 'غير محدد' ;
                }
                ?>
            <th class="info_detailes">
                ارسال الي
            </th>

            <td><?php if (!empty($get_all->emp_n)) {
                    echo  $get_all->emp_n;
                } else{
                    echo 'غير محدد' ;
                }
                ?></td>
        </tr>
        <tr>
            <th class="info_detailes">
                درجة الاهمية
            </th>

            <td> <?php
                $arr = array(
                    1 => 'مهم',
                    2 => 'عاجل',
                    3 => 'غير مهم',
                    4 => 'غير عاجل'
                );
                foreach ($arr as $key => $value) {
                    $select = '';
                    if ($get_all->important != '') {
                        if ($key == $get_all->important) {
                            echo $value;
                        }
                    } ?>
                    <?php
                }
                ?></td>
            <th class="info_detailes"> تفاصيل المهمة</th>

            <td><?php if (!empty($get_all->mohma_details)) {
                    echo  $get_all->mohma_details;
                } else{
                    echo 'غير محدد' ;
                }
                ?></td>
            <th class="info_detailes"> من تاريخ</th>

            <td><?php if (!empty($get_all->from_date)) {
                    echo $get_all->from_date;
                } else{
                    echo 'غير محدد' ;
                }
                ?></td>
        </tr>
        <tr>
            <th class="info_detailes"> الي تاريخ</th>

            <td><?php if (!empty($get_all->to_date)) {
                    echo $get_all->to_date;
                } else{
                    echo 'غير محدد' ;
                }
                ?></td>
            <th class="info_detailes">الوقت المقدر</th>

            <td><?php if (!empty($get_all->num_days)) {
                    echo  $get_all->num_days;
                } else{
                    echo 'غير محدد' ;
                }
                ?>
                يوم
            </td>
            <th class="info_detailes">مرتبطة بمهمه اخري</th>

            <td>
                <?php
                $arry = array('1' => 'نعم', '2' => 'لا');
                foreach ($arry as $key => $value) {
                    ?>
                    <?php
                    if ($get_all->another_mohma == $key) {
                        echo $value;
                    }
                    ?>
                    <?php
                }
                ?>
            </td>
        </tr>

        <tr>
            <th class="info_detailes"> مشاهده المهمة</th>

            <td><?php if (!empty($get_all->seen) && $get_all->seen == 1) {
                    echo '<span style="color:green">تم مشاهده المهمة</span>';
                } else {
                    echo '<span style="color:red">   لم يتم مشاهده المهمة </span>';
                }
                ?></td>
            <th class="info_detailes">وقت مشاهده المهمة</th>

            <td><?php if (!empty($get_all->seen_time)) {
                    echo $get_all->seen_time;
                } else {
                    echo 'غير محدد';
                }
                ?>

            </td>
            <th class="info_detailes">تاريخ مشاهده المهمة</th>

            <td><?php if (!empty($get_all->seen_date)) {
                    echo $get_all->seen_date;
                } else {
                    echo 'غير محدد';
                }
                ?>

            </td>
        </tr>
        <tr>
            <th class="info_detailes"> استلام المهمة</th>

            <td><?php if (!empty($get_all->estlam_mohma) && $get_all->estlam_mohma == 1) {
                    echo '<span style="color:green">تم استلام المهمة</span>';
                } else {
                    echo '<span style="color:red">   لم يتم استلام المهمة </span>';
                }
                ?></td>
            <th class="info_detailes">وقت استلام المهمة</th>

            <td><?php if (!empty($get_all->estlam_mohma_time)) {
                    echo $get_all->estlam_mohma_time;
                } else {
                    echo 'غير محدد';
                }
                ?>

            </td>
            <th class="info_detailes">تاريخ استلام المهمة</th>

            <td><?php if (!empty($get_all->estlam_mohma_date)) {
                    echo $get_all->estlam_mohma_date;
                } else {
                    echo 'غير محدد';
                }
                ?>

            </td>
        </tr>
        <tr>
            <th class="info_detailes"> تنفيذ المهمة</th>

            <td><?php if (!empty($get_all->suspend) && $get_all->suspend == 4) {
                    echo '<span style="color:green">تم تنفيذ المهمة</span>';
                } else {
                    echo '<span style="color:red">   لم يتم تنفيذ المهمة </span>';
                }
                ?></td>
            <th class="info_detailes">وقت تنفيذ المهمة</th>

            <td><?php if (!empty($get_all->suspend_time)) {
                    echo $get_all->suspend_time;
                } else {
                    echo 'غير محدد';
                }
                ?>

            </td>
            <th class="info_detailes">تاريخ تنفيذ المهمة</th>

            <td><?php if (!empty($get_all->suspend_date)) {
                    echo $get_all->suspend_date;
                } else {
                    echo 'غير محدد';
                }
                ?>

            </td>
        </tr>
        </thead>
    </table>
</div>
<?php

if (isset($one_data) && !empty($one_data)) {
    $x = 1;
    $image = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP');
    $file = array('pdf', 'PDF', 'xls', 'xlsx', ',doc', 'docx', 'txt');
    $folder = 'uploads/human_resources/mohma';
    ?>
    <span>المرفقات </span>
    <table id="example88" class="table  table-bordered table-striped table-hover">

        <thead>
        <tr class="greentd">
            <th>م</th>
            <th>نوع الملف</th>
            <th>اسم الملف</th>
            <th> الملف</th>
            <th>الحجم</th>

        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($one_data as $morfaq){
            $ext = pathinfo($morfaq->file, PATHINFO_EXTENSION);
            //  $Destination = 'uploads/archive/deals/1bec9894697603bd9a45630d73230be5.jpg';
            $Destination = $folder .'/'.$morfaq->file;
            if (file_exists($Destination)){
                $bytes=  filesize($Destination) ;
            } else{
                $bytes ='';
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
                <td><?= $x++?></td>
                <td>
                    <?php
                    if (in_array($ext,$image)){?>
                        <i class="fa fa-picture-o" aria-hidden="true" style="color: #d93bff;"></i>
                    <?php } elseif (in_array($ext,$file)){?>
                        <i class="fa fa-file-pdf-o" aria-hidden="true" style="color: red;"></i>
                    <?php  }
                    ?>
                </td>
                <td>
                    <?php
                    if (!empty($morfaq->title)){
                        echo $morfaq->title;
                    } else{
                        echo 'لا يوجد ' ;
                    }
                    ?>
                </td>
                <td>
                    <!--  -->
                    <?php
                    if (in_array($ext,$image)){
                        ?>
                        <?php if (!empty($morfaq->file)) {
                            $url = base_url() . $folder .'/'. $morfaq->file;
                        } else {
                            $url = base_url('asisst/fav/apple-icon-120x120.png');
                        } ?>
                        <a target="_blank" onclick="show_img('<?= $url ?>')">
                            <i class=" fa fa-eye"></i>
                        </a>
                        <?php
                    }  elseif (in_array($ext,$file)){
                        ?>
                        <!-- <a href="<?php echo base_url() . 'human_resources/mohma/Mohma_c/read_file/' . $mehwar_morfaq ?>"
                                      target="_blank">
                                       <i class=" fa fa-eye"></i></a> -->
                        <?php if (!empty($morfaq->file)) {
                            // $url = base_url() . 'uploads/egtma3at/all_mehwr/' . $mehwar_morfaq;
                            $url = base_url() .'human_resources/mohma/Mohma_c/read_file/'. $morfaq->file;
                        } else {
                            $url = base_url('asisst/fav/apple-icon-120x120.png');
                        } ?>
                        <a target="_blank" onclick="show_bdf('<?= $url ?>')">
                            <i class=" fa fa-eye"></i>
                        </a>
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
        ?>
        </tbody>
    </table>
    <?php
}
?>

<?php
if (isset($result) && !empty($result)) {
    ?>
    <h5>الردود</h5>
    <table id="example888" class="table  table-bordered table-striped table-hover">

        <thead>
        <tr class="greentd">
            <th>م</th>
            <th>بواسطة</th>
            <th>الرد</th>
            <th>الوقت</th>


        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($result as $row) {
            $x = 1;
            ?>

            <tr>
                <td><?= $x; ?></td>
                <td><?= $row->publisher_name; ?></td>
                <td><?= $row->comment; ?></td>
                <td><?= $row->date_ar; ?></td>

            </tr>
            <?php $x++;
        } ?>
        </tbody>
    </table>
<?php } ?>

<script>
    $('#example88').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'pageLength',
            'copy',
            'csv',
            'excelHtml5',
            {
                extend: "pdfHtml5",
                orientation: 'landscape'
            },
            {
                extend: 'print',
                exportOptions: {columns: ':visible'},
                orientation: 'landscape'
            },
            'colvis'
        ],
        colReorder: true
    });
</script>
<script>
    $('#example888').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'pageLength',
            'copy',
            'csv',
            'excelHtml5',
            {
                extend: "pdfHtml5",
                orientation: 'landscape'
            },
            {
                extend: 'print',
                exportOptions: { columns: ':visible'},
                orientation: 'landscape'
            },
            'colvis'
        ],
        colReorder: true
} );
</script>
<script>
    function show_img(src) {
        var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
        WinPrint.document.write('<img src="' + src + '" style="width: 100%; height:  100%;">');
        WinPrint.document.close();
        WinPrint.focus();
    }
</script>
<script>
    function show_bdf(src) {
        var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
        WinPrint.document.write('<iframe src="' + src + '" style="width: 100%; height:  100%;" frameborder="0"></iframe>');
        WinPrint.document.close();
        WinPrint.focus();
    }
</script>