<div class="row">
    <?php if (isset($result) && (!empty($result))) { ?>
        <table id="example" class="table table-striped table-bordered table-result">
            <thead>
            <tr>
                <th>م</th>
                <th>المحور</th>
                <th>المرفق</th>
                <th>الإجراء</th>
            </tr>
            </thead>
            <tbody>
            <?php $x = 1;
            foreach ($result as $row) { ?>
                <tr>
                    <td><?php echo $x; ?></td>
                    <td><?php echo $row->mehwar_title; ?></td>
                    <td>
                        <?php
                        $mehwar_morfaq = $row->mehwar_morfaq;

                        if (!empty($mehwar_morfaq)) {
                            ?>

                            <a   href="<?= base_url()."md/all_mehwr_gam3ia_omomia/All_mehwr_gam3ia_omomia/download_file/".$mehwar_morfaq?>"
                                 class="fa fa-download" title="تحميل المرفق" download></a>
                            <?php
                            $type = pathinfo($mehwar_morfaq)['extension'];
                            $arry_images = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP', 'WMV', 'wmv');
                            $arr_doc = array('DOC', 'DOCX', 'HTML', 'HTM', 'ODT', 'PDF', 'XLS', 'XLSX', 'ODS', 'PPT', 'PPTX', 'TXT');
                            if (in_array($type, $arry_images)) {
                                ?>
                                <?php if (!empty($mehwar_morfaq)) {
                                    $url = base_url() . 'uploads/md/all_mehwr_gam3ia_omomia/' . $mehwar_morfaq;
                                } else {
                                    $url = base_url('asisst/fav/apple-icon-120x120.png');
                                } ?>

                                <a target="_blank" onclick="show_img('<?= $url ?>')">
                                    <i class=" fa fa-eye"></i>
                                </a>
                                <?php
                            } elseif (in_array(strtoupper($type), $arr_doc)) {
                                ?>
                                <!--<a href="<?php echo base_url() . 'md/all_mehwr_gam3ia_omomia/All_mehwr_gam3ia_omomia/read_file/' . $mehwar_morfaq ?>"
                                   target="_blank">
                                    <i class=" fa fa-eye"></i></a>
                                <a target="_blank"
                                   href="<?= base_url() . 'uploads/md/all_mehwr_gam3ia_omomia/download_file/' . $mehwar_morfaq ?>" download>
                                    <i class=" fa fa-download"></i></a>-->

                                <?php if (!empty($mehwar_morfaq)) {
                                    $url =base_url().'uploads/md/all_mehwr_gam3ia_omomia/'.$mehwar_morfaq;
                                } else {
                                    $url = base_url('asisst/fav/apple-icon-120x120.png');
                                } ?>
                                <a target="_blank" onclick="show_bdf('<?= $url ?>')">
                                    <i class=" fa fa-eye"></i>
                                </a>

                                <?php
                            }

                        } else {
                            echo 'لا يوجد';
                        }
                        ?>

                    </td>
                    <td>
                        <a href="#" onclick='swal({
                            title: "هل انت متأكد من الحذف ؟",
                            text: "",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonClass: "btn-danger",
                            confirmButtonText: "حذف",
                            cancelButtonText: "إلغاء",
                            closeOnConfirm: true
                            },
                            function(){
                            swal("تم الحذف!", "", "success");
                            delete_mehwr_galsa(<?=$row->id?>);
                            });'>
                            <i class="fa fa-trash"> </i></a>
                    </td>
                </tr>
                <?php
                $x++;
            }
            ?>
            </tbody>
        </table>


    <?php } ?>
</div>


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
<script>

    function show_img(src) {

        var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
        WinPrint.document.write('<img src="' + src + '">');
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
<script>
    function delete_mehwr_galsa(id) {
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>md/all_glasat_gam3ia_omomia/All_glasat_gam3ia_omomia/delete_mehwr_galsa',
            data: {id: id},
            dataType: 'html',
            cache: false,
            success: function (html) {
                if (html == 1) {
                    get_table_mehwer(<?=$glsa_rkm?>);
                }
            }
        });
    }
</script>
