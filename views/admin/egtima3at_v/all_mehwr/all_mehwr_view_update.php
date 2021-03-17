
<div class="col-sm-12 no-padding ">
    <div class="col-sm-12 ">
        <div class="panel panel-bd lobidisable lobipanel  lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title ?></h3>
            </div>
            <div class="panel-body">
                <?php if(!empty($last_galsa)){ ?>
                    <?php

                    echo form_open_multipart(base_url().' egtima3at/all_mehwr/All_mehwr_galsa/update/'.$last_galsa->galsa_rkm, array('class' => 'myform'));

                    ?>

                    <div class="col-sm-12">
                        <table class="table table-bordered">
                            <thead>
                            <tr class="left-headtr">

<th class="text-center">رقم الجلسة</th>
<th class="text-center">تاريخ الجلسة</th>
<th class="text-center">عنوان  الجلسة</th>
<th class="text-center">معتمد  الجلسة</th>
<th class="text-center">أعضاء الجلسة</th>
</tr>
</thead>
<tbody>
<tr class="text-center">

<td><?= $last_galsa->galsa_rkm ?></td>


<td>
                                    <?=$last_galsa->galsa_date;?>

</td>
<td><?= $last_galsa->enwan_galsa ?></td>
<td><?= $last_galsa->suspender_emp_n ?></td>
<td>
    <button type="button" class="btn btn-info " data-toggle="modal"
            onclick="det_datiles(<?= $last_galsa->galsa_rkm ?>,'تفاصيل الأعضاء')"
            data-target="#myModal">أعضاء الجلسة
    </button>
</td>
</tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-12">

                        <table class="table table-striped table-bordered table-result"  id="mytable">
                            <thead>
                            <tr class="info">
                                <th>رقم المحور</th>
                                <th>عبارة عن</th>
                                <th> المرفق</th>
                                <th>الإجراء</th>
                            </tr>
                            </thead>
                            <tbody id="resultTable">
                            <?php if(!empty($result_details)){
                                $s=1;
                                foreach ($result_details as $row){ ?>

                                    <tr id="<?php echo$s;?>">
                                        <td style="width: 100px;"> <input type="text" name="mehwar_rkm[]" class="form-control text-center" value="<?php echo$row->mehwar_rkm;?>"></td>
                                        <td>
                                            <input type="text"  name="mehwar_title[]" data-validation="required"  class="form-control text-center" value="<?php echo$row->mehwar_title;?>" >
                                        </td>
                                        <td>

                                         <input type="file"   id="mehwar_morfaq<?php echo$s;?>" name="mehwar_morfaq[]"   class="form-control" >
                                            <input type="hidden" name="images[]" value="<?= $row->mehwar_morfaq ?>">

                                            <?php

                                            if (!empty($row->mehwar_morfaq) || $row->mehwar_morfaq!= 0 ) {
                                                $ext = pathinfo($row->mehwar_morfaq, PATHINFO_EXTENSION);
                                                $image =  array('gif','Gif','ico','ICO','jpg','JPG','jpeg','JPEG','BNG','png','PNG','bmp','BMP');
                                                $file= array('pdf','PDF','xls','xlsx',',doc','docx','txt');
                                                if (in_array($ext,$image)){
                                                    ?>
                                                    <a data-toggle="modal" data-target="#myModal-view-<?= $row->id ?>">
                                                        <i class="fa fa-eye" title=" قراءة"></i> </a>
                                                    <?php
                                                } elseif (in_array($ext,$file)){
                                                    ?>
                                                    <a target="_blank" href="<?=base_url()."egtima3at/all_mehwr/All_mehwr_galsa/read_file/".$row->mehwar_morfaq?>">
                                                        <i class="fa fa-eye" title=" قراءة"></i> </a>
                                                    <?php
                                                }
                                                ?>

                                                <a href="<?=base_url()."egtima3at/all_mehwr/All_mehwr_galsa/download_file/".$row->mehwar_morfaq?>" download>
                                                    <i class="fa fa-download " aria-hidden="true"></i> </a>

                                                <?php

                                            }
                                            ?>
                                            <!-- modal view -->
                                            <div class="modal fade" id="myModal-view-<?= $row->id ?>" tabindex="-1"
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
                                                            <img  src="<?= base_url()."uploads/egtma3at/all_mehwr/".$row->mehwar_morfaq ?>"
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
                                            <!-- modal view -->

                                        </td>
                                        <td>
                                            <?php if($s ==sizeof($result_details)) { ?>
                                                <a href="#" onclick="add_row();$(this).remove();"><i class="fa fa-plus sspan"></i></a>
                                            <?php } ?>
                                         

                                        <a onclick=' swal({
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
                                                      delete_row(<?=$row->id ?>,<?=$row->galsa_rkm ?>);
                                                        });'>
                                                    <i class="fa fa-trash"> </i></a>
                                                
                                                </td>
                                    </tr>

                                    <?php $s++;} }?>
                                     

                            </tbody>
                            <tfoot>
                            <td colspan="4">
                            <input type="hidden" name="length"  id="length_update" value="<?php echo($s-1);?>">
                            <input type="hidden" id="id" name="id" value="<?=$last_galsa->galsa_rkm?>"/>
                                <button type="button" onclick="update_mehwer()" style="float: left;margin-left: 60px" class="btn-success btn-labeled btn" name="btn" value="1">
                                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                </button>
                            </tfoot></td>

                        </table>
                       
                    </div>



                    <?php echo form_close() ?>
                <?php } else {
                    echo'<div class="alert alert-danger"> لا توجد جلسات !!</div>';

                } ?>
            </div>

            
        </div>
    </div>
</div>


