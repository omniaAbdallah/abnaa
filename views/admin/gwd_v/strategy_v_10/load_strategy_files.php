<?php
if (isset($allData) && !empty($allData)){
    $x = 1;
    ?>
    <table id="example88" class=" table table-bordered responsive nowrap" cellspacing="0" width="100%">
        
        <thead>

                          <tr class="greentd">

                              <th>م</th>

                              <th>نوع الملف</th>

                              <th>إسم الملف</th>

                              <th> الملف</th>

                              <th>الحجم</th>

                              <th>التاريخ</th>

                              <th>بواسطة</th>

                              <th>الاجراء</th>

                          </tr>

                        </thead>
        <tbody>
        <?php
        foreach ($allData as $data){
            
                    $image =  array('gif','Gif','ico','ICO','jpg','JPG','jpeg','JPEG','BNG','png','PNG','bmp','BMP');
                    $file= array('pdf','PDF','xls','xlsx',',doc','docx','txt');
                    $ext = pathinfo($data->file_attached, PATHINFO_EXTENSION);
                    $Destination ='uploads/gwd/strategy_pln_file/'.$data->file_attached;

                    if (file_exists($Destination)){

                        $bytes=  filesize($Destination) ;

                    } else{

                        $bytes ='';

                    }

                     $size = '';

                    if ($bytes >= 1073741824)

                    {

                        $size = number_format($bytes / 1073741824, 2) . ' GB';

                    }

                    elseif ($bytes >= 1048576)

                    {

                        $size = number_format($bytes / 1048576, 2) . ' MB';

                    }

                    elseif ($bytes >= 1024)

                    {

                        $size = number_format($bytes / 1024, 2) . ' KB';

                    }

                    elseif ($bytes > 1)

                    {

                        $size = $bytes . ' bytes';

                    }

                    elseif ($bytes == 1)

                    {

                        $size = $bytes . ' byte';

                    }

                    else

                    {

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

                <td><?php
                    if (!empty($data->title)){ echo $data->title;}?></td>
                <td>
                    <?php

                    if (in_array($ext,$image)){
                        ?>
                        <a data-toggle="modal" data-target="#myModal-view-<?= $data->id ?>">
                            <i class="fa fa-eye" title=" قراءة"></i> </a>
                        <div class="modal fade" id="myModal-view-<?= $data->id ?>" tabindex="-1"
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
                                        <img src="<?= base_url()."uploads/gwd/strategy_pln_file/".$data->file_attached ?>"
                                             width="100%">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">
                                            إغلاق
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <?php
                    }elseif (in_array($ext,$file)){
                        ?>
                        <a data-toggle="modal" data-target="#myModal-pdf-<?= $data->id ?>">

<i class="fa fa-eye" title=" قراءة"></i> </a>

<!-- modal view -->

<div class="modal fade" id="myModal-pdf-<?= $data->id ?>" tabindex="-1"

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

        <iframe src="<?=base_url()."gwd/strategy/Strategy/read_strategy_file/".$data->file_attached?>" style="width: 100%; height:  640px;" frameborder="0"></iframe>

        </div>

        <div class="modal-footer">

            <button type="button" class="btn btn-default" data-dismiss="modal">

                إغلاق

            </button>

        </div>

    </div>

</div>

</div>


                        <?php
                    }
                    ?>

                    

                </td>
                <td>

<?= $size?>

</td>

<td>

<?php

if (!empty($data->date_ar)){

    echo $data->date_ar;

} else{

    echo 'غير محدد  ' ;

}

?>

</td>

<td>

<?php

if (!empty($data->publisher_name)){

    echo $data->publisher_name;

} else{

    echo 'غير محدد  ' ;

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
                        closeOnConfirm: false
                        },
                        function(){
                        swal("تم الحذف!", "", "success");
                        delete_strategy_file(<?=$data->id?>);
                        });'
                        >
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
<?php if (isset($allData) && $allData != null) {
    foreach ($allData as $key => $value) { ?>
    <?php }
}
?>
                  <script>

$('#example88').DataTable( {

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