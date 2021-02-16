<!-- <div class="row">
    <?php if (isset($result) && (!empty($result))) { ?>
        <table id="example" class="table table-striped table-bordered table-result">
            <thead>
            <tr>
                <th>م</th>
                <th>رقم المحور</th>
                <th>عبارة عن</th>
                
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
    function delete_mehwr_galsa(id) {
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>md/all_glasat/All_glasat/delete_mehwr_galsa',
            data: {id: id},
            dataType: 'html',
            cache: false, beforeSend:function(){
                swal({
                    title: "جاري الحذف ... ",
                    text: "",
                    imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                    showConfirmButton: false,
                    allowOutsideClick: false
                });
            },
            success: function (html) {
                swal({
                    title: 'تم الحذف بنجاح  ',
                    type: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'تم'
                });
                if (html == 1) {
                    get_table_mehwer(<?=$glsa_rkm?>);
                }
            }
        });
    }
</script> -->

<!--  -->
<div class="row">
    <?php if (isset($result) && (!empty($result))) { ?>
        <table id="example" class="display table table-bordered   responsive nowrap dataTable no-footer">
            <thead>
            <tr>
                <th>م</th>
                <th>رقم المحور</th>
                <th>عبارة عن</th>
                <th>مدة مناقشة المحور</th>
              <th>خاضع للتصويت</th>
                <th>المرفق</th>
                <th>الإجراء</th>
            </tr>
            </thead>
            <tbody>
            <?php $x = 1;
            foreach ($result as $row) { ?>
                <tr>
                    <td><?php echo $x; ?></td>
                    <td><?php echo $row->mehwar_rkm; ?></td>
                    <td><?php echo $row->mehwar_title; ?></td>
                    <td><?php echo $row->mehwar_duration; ?></td>
                    <td><?php if($row->mehwar_vote==1){
                        echo'نعم';
                    }else{
                        echo'لا';
                    }
                    ?>
                    </td>
                    <td>
                        <?php
                        $mehwar_morfaq = $row->mehwar_morfaq;
                        if (!empty($mehwar_morfaq)) {
                            ?>
                            
                            <?php
                            $type = pathinfo($mehwar_morfaq)['extension'];
                            $arry_images = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP', 'WMV', 'wmv');
                            $arr_doc = array('DOC', 'DOCX', 'HTML', 'HTM', 'ODT', 'PDF', 'XLS', 'XLSX', 'ODS', 'PPT', 'PPTX', 'TXT');
                            if (in_array($type, $arry_images)) {
                                ?>
                                <?php if (!empty($mehwar_morfaq)) {
                                    $url = base_url() . 'uploads/md/all_mehwr_magles_edara/' . $mehwar_morfaq;
                                } else {
                                    $url = base_url('asisst/fav/apple-icon-120x120.png');
                                } ?>
                                <a target="_blank" onclick="show_img('<?= $url ?>')">
                                    <i class=" fa fa-eye"></i>
                                </a>
                                <?php
                            } elseif (in_array(strtoupper($type), $arr_doc)) {
                                ?>
                               
                                <?php if (!empty($mehwar_morfaq)) {
                                    $url =base_url().'uploads/md/all_mehwr_magles_edara/'.$mehwar_morfaq;
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
            url: '<?php echo base_url() ?>md/all_glasat/All_glasat/delete_mehwr_galsa',
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