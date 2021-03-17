<?php
if (isset($allData) && !empty($allData)){
    $x = 1;
    ?>
    <table class="example table table-bordered responsive nowrap" cellspacing="0" width="100%">
        <thead>
        <tr class="info">
            <th class="text-center"> م</th>
            <th class="text-center">إسم المرفق</th>
            <th class="text-center">  المستند</th>
            <th class="text-center">  الاجراء</th>



        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($allData as $data){
            ?>
            <tr>
                <td><?= $x++?></td>
                <td><?php
                    if (!empty($data->title)){ echo $data->title;}?></td>
                <td>
                    <?php
                    $image =  array('gif','Gif','ico','ICO','jpg','JPG','jpeg','JPEG','BNG','png','PNG','bmp','BMP');
                    $file= array('pdf','PDF','xls','xlsx',',doc','docx','txt');
                    $ext = pathinfo($data->file_attached, PATHINFO_EXTENSION);
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
                        <a target="_blank" href="<?=base_url()."gwd/strategy/Strategy/read_strategy_file/".$data->file_attached?>">
                            <i class="fa fa-eye" title=" قراءة"></i> </a>

                        <?php
                    }
                    ?>

                    <a href="<?=base_url()."gwd/strategy/Strategy/downloads/".$data->file_attached?>" download>
                        <i class="fa fa-download" title="تحميل"></i>
                    </a>

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
