<?php if($one_data->file==''){
    ?>
    <?php
                    echo form_open_multipart('maham_mowazf/talabat/namazegs/Namazeg/add_morfaq/'.$one_data->id);
                    ?>
    <div class="col-xs-12 ">
                    <input type="hidden" name="hidden_id" id="hidden_id">
                    <input type="hidden" name="hidden_rkm" id="hidden_rkm">
                    <div class="col-md-6 col-sm-4 padding-4">
            <label> المرفق</label>
           <input type="file" name="file[]" id="file"  class="form-control " data-validation="reuqired">
           </div>
                <div class="col-xs-2 text-center" style="margin-top: 29px;">
                <button type="submit" class="btn btn-success btn-labeled" style="display: inline-block;float: right;"
                        onclick="GetAttachTable()"
                        name="add_attach" id="saves" data-dismiss="modal"><span class="btn-label"><i
                                class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                </button>
            </div>
            </div>   
                <?php
                echo form_close();
                ?>
<?php   }else{
            ?>
            <?php $x=1;
                $image =  array('gif','Gif','ico','ICO','jpg','JPG','jpeg','JPEG','BNG','png','PNG','bmp','BMP');
                $file= array('pdf','PDF','xls','xlsx',',doc','docx','txt');
        $ext = pathinfo($one_data->file, PATHINFO_EXTENSION);
        ?>
           <table class="table table-striped table-bordered fixed-table mytable ">
                    <thead>
                    <tr class="info">
                        <!-- <th class="text-center"> إسم المرفق</th> -->
                        <th class="text-center">المرفق</th>
                        <th class="text-center"> الإجراء</th>
                    </tr>
                    </thead>
        <tr class="<?=$x?>">
            <!-- <td><?=$one_data->title?> </td> -->
            <!-- <td>
                <?php
                if (in_array($ext,$image)){
                    ?>
                    <img id="img_view<?=$x?>" src="<?php  echo base_url().'uploads/human_resources/nmazg/nmazg_letter_attaches/'.$one_data->file?>"  width="150px" height="150px" />
                    <?php
                } else if (in_array($ext,$file)){
                    ?>
                    <a target="_blank" href="<?=base_url()."family_controllers/namazegs/Namazeg/read_file/".$one_data->file?>">
                        <i class="fa fa-eye" title=" قراءة"></i> </a>
                    <?php
                }
                ?>
            </td> -->
            <td>
                                    <!--  -->
                                    <?php
                                    if (in_array($ext,$image)){
                                ?>
                                <?php if (!empty($one_data->file)) {
                                    $url = base_url() . 'uploads/human_resources/nmazg/nmazg_letter_attaches/'. $one_data->file;
                                } else {
                                    $url = base_url('asisst/fav/apple-icon-120x120.png');
                                } ?>
                                <a target="_blank" onclick="show_img('<?= $url ?>')">
                                    <i class=" fa fa-eye"></i>
                                </a> 
                                <?php
                            }  elseif (in_array($ext,$file)){
                                ?>
                                    <?php if (!empty($one_data->file)) {
                                   // $url = base_url() . 'uploads/egtma3at/all_mehwr/' . $mehwar_one_data;
                                   $url = base_url() .'maham_mowazf/talabat/namazegs/Namazeg/read_file/'. $one_data->file;
                                } else {
                                    $url = base_url('asisst/fav/apple-icon-120x120.png');
                                } ?>
                                <a target="_blank" onclick="show_bdf('<?= $url ?>')">
                                    <i class=" fa fa-eye"></i>
                                </a> 
                                <?php
                            }
                         else {
                            echo 'لا يوجد';
                        }
                        ?>
                                    <!--  -->
                                </td>
            <td>
                <a href="<?php echo  base_url().'maham_mowazf/talabat/namazegs/Namazeg/Delete_attach/'.$one_data->id?>" > <i class="fa fa-trash" ></i> </a></td>
        </tr>
</table>
     <?php   }
    ?>
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