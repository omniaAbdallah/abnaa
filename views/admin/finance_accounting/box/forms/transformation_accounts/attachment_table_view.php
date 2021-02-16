



<?php
if($deport_status == 0){
    
}else{ ?>
    
  <style>
#form_attechment{
    display: none !important;
}
#save_start_work{
     display: none !important;
}
</style>
  
<? }


if (isset($transform_account_attechment) && !empty($transform_account_attechment)) {
    $x = 1;
    $image = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP');
    $file = array('pdf', 'PDF', 'xls', 'xlsx', ',doc', 'docx', 'txt');
    if (isset($folder_path) && !empty($folder_path)) {
        $folder = $folder_path;
    } else {
        $folder = '';
    }
    ?>
    <table id="example" class="table  table-bordered table-striped table-hover">
        <thead>
        <tr class="greentd">
            <th>م</th>
            <th>نوع الملف</th>
            <th>اسم الملف</th>
            <th> الملف</th>
            <th>الحجم</th>
            <th>الوقت</th>
            <th>التاريخ</th>
            <th>بواسطة</th>
            <th>الاجراء</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($transform_account_attechment as $morfaq) {
            $ext = pathinfo($morfaq->attechment, PATHINFO_EXTENSION);
            $Destination = $folder . '/' . $morfaq->attechment;
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
                        <?php
                    } elseif (in_array($ext, $file)) {
                        ?>
                        <i class="fa fa-file-pdf-o" aria-hidden="true" style="color: red;"></i>
                        <?php
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if (!empty($morfaq->title)) {
                        echo $morfaq->title;
                    } else {
                        echo 'لا يوجد ';
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if (in_array($ext, $image)) {
                        ?>
                        <a data-toggle="modal" data-target="#myModal-view"
                           onclick="$('#img_view').attr('src','<?= base_url() . $folder . "/" . $morfaq->attechment ?>')">
                            <i class="fa fa-eye" title=" قراءة"></i> </a>
                        <!-- modal view -->
                        <!-- modal view -->
                        <?php
                    } elseif (in_array($ext, $file)) {
                        ?>
                        <a data-toggle="modal" data-target="#myModal-pdf"
                           onclick="$('#pdf_iframe').attr('src','<?= base_url() . "finance_accounting/box/forms/transformation_accounts/Transformation_accounts/read_file_attechment/" . $morfaq->id ?>')">
                            <i class="fa fa-eye" title=" قراءة"></i> </a>
                        <!-- modal view -->
                        <?php
                    }
                    ?>
                </td>
                <td>
                    <?= $size ?>
                </td>
                <td>
                    <?php
                    if (!empty($morfaq->time_ar)) {
                        echo $morfaq->time_ar;
                    } else {
                        echo 'غير محدد  ';
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if (!empty($morfaq->date_ar)) {
                        echo $morfaq->date_ar;
                    } else {
                        echo 'غير محدد  ';
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if (!empty($morfaq->publisher_name)) {
                        echo $morfaq->publisher_name;
                    } else {
                        echo 'غير محدد  ';
                    }
                    ?>
                </td>
                <td><i class="fa fa-trash" style="cursor: pointer" onclick="delete_morfaq(<?= $morfaq->id ?>)"></i>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
    <?php
} else {
    ?>
    <div class="col-md-12 alert alert-danger">
        لا يوجد مرفقات ...........
    </div>
    <?php
}
?>
<script>
    $('#example').DataTable({
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