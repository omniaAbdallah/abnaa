<?php
/*
print_r($one_data);*/

if (isset($one_data) && !empty($one_data)) {
    $x = 1;
    $image = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP');
    $file = array('pdf', 'PDF', 'xls', 'xlsx', ',doc', 'docx', 'txt');
    $folder = 'uploads/files/sarf_attaches';
    ?>
    <table id="example88" class="table  table-bordered table-striped table-hover">
        <thead>
        <tr class="greentd">
            <th>م</th>
            <th>نوع الملف</th>
            <th>اسم الملف</th>
            <th> الملف</th>
            <th>الحجم</th>
            <th>الاجراء</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($one_data as $morfaq) {
            $ext = pathinfo($morfaq->file, PATHINFO_EXTENSION);
            $Destination = $folder . '/' . $morfaq->file;
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
                    if (!empty($morfaq->title)) {
                        echo $morfaq->title;
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
                        <?php if (!empty($morfaq->file)) {
                            $url = base_url() . $folder . '/' . $morfaq->file;
                        } else {
                            $url = base_url('asisst/fav/apple-icon-120x120.png');
                        } ?>
                        <a target="_blank" onclick="show_img('<?= $url ?>')">
                            <i class=" fa fa-eye"></i>
                        </a>
                        <?php
                    } elseif (in_array($ext, $file)) {
                        ?>

                        <?php if (!empty($morfaq->file)) {
                            $url = base_url() . 'finance_accounting/box/ezn_sarf/Ezn_sarf/read_file/' . $morfaq->file;
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
                <td>
                    <i class="fa fa-trash" style="cursor: pointer"
                       onclick="delete_morfq(<?= $morfaq->id ?>,<?= $morfaq->ezn_sarf_id_fk ?>)"></i>
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
