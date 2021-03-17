<style>
    .box-header > .box-tools [data-toggle="tooltip"] {
        position: relative;
    }
    .box-footer {
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        border-bottom-right-radius: 3px;
        border-bottom-left-radius: 3px;
        border-top: 1px solid #f4f4f4;
        padding: 10px;
        background-color: #fff;
    }
    .mailbox-attachment-icon {
        text-align: center;
        font-size: 65px;
        color: #666;
        padding: 20px 10px;
    }
    .mailbox-attachment-icon, .mailbox-attachment-info, .mailbox-attachment-size {
        display: block;
    }
    .mailbox-attachment-info {
        padding: 10px;
        background: #f4f4f4;
    }
    .mailbox-attachments li {
        float: left;
        width: 200px;
        border: 1px solid #eee;
        margin-bottom: 10px;
        margin-right: 10px;
    }
    .mailbox-attachment-icon.has-img > img {
        max-width: 100%;
        height: 115px;
        width: -webkit-fill-available;
    }
</style>


                       <!-- new_design -->

                       <div class="box-footer" style="
    float: right;
">
                <ul class="mailbox-attachments clearfix">
                    <?php
                    if (isset($one_data) && !empty($one_data)) {
                      
                        $image =  array('gif','Gif','ico','ICO','jpg','JPG','jpeg','JPEG','BNG','png','PNG','bmp','BMP');
                        $file= array('pdf','PDF','xls','xlsx',',doc','docx','txt');
                       
                            $folder ='uploads/family_attached/';
                    $z = 1;
                    foreach ($one_data as $row) { ?>
                        <li id="row_<?= $z ?>">
                            <?php
                            $ext = pathinfo($row->file_attach_name, PATHINFO_EXTENSION);
                           
                            if (in_array($ext, $image)) {
                                ?>
                                <span class="mailbox-attachment-icon has-img" data-toggle="modal" data-target="#myModal-view-<?= $row->id ?>">
                                    <img
                                            src="<?php if (file_exists('uploads/family_attached/'.$row->file_attach_name)) {
                                                echo base_url() .'uploads/family_attached/'.$row->file_attach_name;
                                            } ?> " alt="Attachment">
                                </span>
                                <div class="mailbox-attachment-info">
                                    <span class="mailbox-attachment-name">
                                        <?=$row->file_attach_id_fk?>
                                    </span>
                                    <span class="mailbox-attachment-size">
                                      
                                    <?php if (!empty($row->file_attach_name)) {
                                       $url = base_url() . $folder .'/'. $row->file_attach_name;
                                   } else {
                                       $url = base_url('asisst/fav/apple-icon-120x120.png');
                                   } ?>
   
                                   <a target="_blank" onclick="show_img('<?= $url ?>')">
                                       <i class=" fa fa-eye"></i>
                                   </a> 
                                        <!-- modal view -->
                                       
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
                                                    delete_morfq(<?=$row->id?>,"<?=$row->mother_national_num_fk?>");
                                               
                                                });' class="btn btn-default btn-xs pull-right">
                                            <i class="fa fa-trash"> </i></a>
                                    </span>
                                </div>
                            <?php }  ?>
                                
                        </li>
                    <?php  $z++; } } ?>
                </ul>
            </div>
        