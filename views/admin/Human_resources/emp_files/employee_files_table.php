<?php
if (isset($allData) && !empty($allData)){
    $x = 1;
    ?>
    <table id="examplee" class="display table table-bordered responsive nowrap" cellspacing="0" width="100%">
        <thead>
        <tr class="info">
            <th class="text-center"> م</th>
            <th class="text-center">إسم المرفق</th>
            <th class="text-center">  المستند</th>
            <th class="text-center">هل يوجد تاريخ</th>
            <th class="text-center">من تاريخ</th>
            <th class="text-center">إلي تاريخ</th>
            <th class="text-center">هل يوجد تنبيه</th>
            <th class="text-center">  المدة</th>
            <th class="text-center">  الاجراء</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($allData as $data){
            ?>
            <tr id="row_<?=$data->id?>">
                <td><?= $x++?></td>
                <td><?php
                    if (!empty($data->title)){ echo $data->title;}?></td>
                <td>
                    <?php
                    $image = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP');
                    $file = array('pdf', 'PDF', 'xls', 'xlsx', ',doc', 'docx', 'txt');
                    $ext = pathinfo($data->emp_file, PATHINFO_EXTENSION);
                    if (in_array($ext, $image)) {
                        ?>
                        <a onclick="get_image('<?= $data->emp_file ?>');" data-toggle="modal" data-target="#myModal-view">
                            <i class="fa fa-eye" title=" قراءة"></i> </a>
                        <?php
                    } elseif (in_array($ext, $file)) {
                        ?>
                        <a onclick="get_pdf('<?= $data->emp_file ?>');" data-toggle="modal" data-target="#myModal-pdf">
                            <i class="fa fa-eye" title=" قراءة"></i> </a>
                        <?php
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if ($data->have_date==1){
                        echo "نعم";
                    } elseif ($data->have_date==2){
                        echo "لا";
                    } else{
                        echo 'غير محدد' ;
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if (!empty($data->from_date ) ){
                        echo $data->from_date ;
                    }
                    else{ echo 'غير محدد';}
                    ?>
                </td>
                <td>
                    <?php
                    if (!empty($data->to_date ) ){
                        echo $data->to_date;
                    }
                    else{ echo 'غير محدد';}
                    ?>
                </td>
                <td>
                    <?php
                    if ($data->tanbih_fk==1){
                        echo "نعم";
                    } elseif ($data->tanbih_fk==2){
                        echo "لا";
                    } else{
                        echo 'غير محدد' ;
                    }
                    ?>
                </td>
                <td>
                    <?php if (!empty($data->period) && $data->period !=0){
                        $period_arr= array('1'=>'يوم','7'=>'اسبوع','15'=>'اسبوعين','30'=>'شهر');
                        echo $period_arr[$data->period];
                    } else{
                        echo 'غير محدد' ;
                    } ?>
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
                            closeOnConfirm: false
                            },
                            function(){
                            delete_files(<?=$data->id?>);
                            //window.location="<?//= base_url()."human_resources/Human_resources/delete_files/".$data->id.'/'.$data->emp_code?>//";
                            });'>
                        <i class="fa fa-trash"> </i></a>
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
<!-- modal view -->
<div class="modal fade" id="myModal-view" tabindex="-1"
     role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">الصورة</h4>
            </div>
            <div class="modal-body">
                <img id="imagee" src=""
                     width="100%" alt="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<!-- modal view -->
<div class="modal fade" id="myModal-pdf" tabindex="-1"
     role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">الملف</h4>
            </div>
            <div class="modal-body">
                <iframe id="m_pdf" src="" style="width: 100%; height:  640px;" frameborder="0"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    إغلاق
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function get_image(url) {
        var path = "<?= base_url() . 'uploads/human_resources/emp_mostnad_files/'?>" + url;
        $('#imagee').attr('src', path);
    }
</script>
<script>
    function get_pdf(url) {
        var path = "<?= base_url() . 'uploads/human_resources/emp_mostnad_files/'?>" + url;
        $('#m_pdf').attr('src', path);
    }
</script>

<script>
    function delete_files(id) {
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>human_resources/Human_resources/delete_files',
            data: {id: id},
            dataType: 'html',
            cache: false,
            success: function (html) {
                swal({
                    title: "تم الحذف ",
                });
                $('#row_'+id).remove();
            }
        });
    }
</script>
<script>
    $('#examplee').DataTable( {
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
        colReorder: true,
        "bDestroy": true
    } );
</script>