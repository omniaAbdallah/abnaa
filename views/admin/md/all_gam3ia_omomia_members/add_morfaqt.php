<div class="col-sm-12 col-md-12 col-xs-12 fadeInUp wow ">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title">  <?=$title?></h3>
            <div class="pull-left">
                <?php if (isset($result) && !empty($result)) {

                    $data_load["id"] = $result->id;
                    $this->load->view('admin/md/all_gam3ia_omomia_members/drop_down_menu', $data_load);

                } ?>
            </div>
        </div>
        <div class="panel-body" >
            <!-- form -->
            <div class="col-md-12 padding-4">
                <div class="col-md-4 ">
                    <?php
                    $id=$this->uri->segment(5);
                    ?>
                    <input type="hidden" name="row" id="row" value="<?=$id?>">
                    <label class="label ">اسم المرفق </label>
                    <input type="text"   name="title[]" id="title"
                           class="form-control "
                    >
                </div>
                <div class="col-md-4 col-sm-4 padding-4">
                    <label class="label"> المرفق</label>
                    <input type="file" name="file[]" id="file"  class="form-control" data-validation="reuqired">
                </div>

            </div>
            <div class="col-md-12 col-xs-12 text-center" style="margin-top: 29px;">
                <button type="button"
                        class="btn btn-labeled  btn-success "  onclick="upload_img()"
                        style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                    <span class="btn-label"><i class="fa fa-floppy-o"></i></span>حفظ المرفق
                </button>
            </div>
            <!-- form -->
            <!-- tabel -->
            <div class="clearfix"></div><br>
            <br>
            <br>
            <div class="col-xs-12" id="morfaq_result">
                <?php
                if (isset($morfqat) && !empty($morfqat)){
                    $x=1;
                    $image =  array('gif','Gif','ico','ICO','jpg','JPG','jpeg','JPEG','BNG','png','PNG','bmp','BMP');
                    $file= array('pdf','PDF','xls','xlsx',',doc','docx','txt');
                    ?>
                    <table class="table example table-bordered table-striped table-hover">
                        <thead>
                        <tr class="greentd">
                            <th>م</th>
                            <th>نوع الملف</th>
                            <th>اسم الملف</th>
                            <th> الملف</th>
                            <th>الحجم</th>
                            <th>التاريخ</th>
                            <th>بواسطة</th>
                            <th>الاجراء</th>
                        </tr>
                        </thead>
                        <tbody >
                        <?php
                        foreach ($morfqat as $morfaq){
                            $ext = pathinfo($morfaq->file, PATHINFO_EXTENSION);
                            //  $Destination = 'uploads/archive/deals/1bec9894697603bd9a45630d73230be5.jpg';
                            $Destination = 'uploads/md/gam3ia_omomia_attach/'.$morfaq->file;
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
                                <td>
                                    <?php
                                    if (!empty($morfaq->title)){
                                        echo $morfaq->title;
                                    } else{
                                        echo 'لا يوجد ' ;
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if (in_array($ext,$image)){
                                        ?>
                                        <a data-toggle="modal" data-target="#myModal-view-<?= $morfaq->id ?>">
                                            <i class="fa fa-eye" title=" قراءة"></i> </a>
                                        <!-- modal view -->
                                        <div class="modal fade" id="myModal-view-<?= $morfaq->id ?>" tabindex="-1"
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
                                                        <img src="<?= base_url().'uploads/md/gam3ia_omomia_attach/'.$morfaq->file?>"
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
                                        <?php
                                    } elseif (in_array($ext,$file)){
                                        ?>
                                        <a data-toggle="modal" data-target="#myModal-pdf-<?= $morfaq->id ?>">
                                            <i class="fa fa-eye" title=" قراءة"></i> </a>
                                        <!-- modal view -->
                                        <div class="modal fade" id="myModal-pdf-<?= $morfaq->id ?>" tabindex="-1"
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
                                                        <iframe src="<?=base_url()."md/all_gam3ia_omomia_members/Gam3ia_omomia_members/read_file/".$morfaq->file?>" style="width: 100%; height:  640px;" frameborder="0"></iframe>
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
                                    if (!empty($morfaq->date_ar)){
                                        echo $morfaq->date_ar;
                                    } else{
                                        echo 'غير محدد  ' ;
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if (!empty($morfaq->publisher_name)){
                                        echo $morfaq->publisher_name;
                                    } else{
                                        echo 'غير محدد  ' ;
                                    }
                                    ?>
                                </td>
                                <td>
                                    <!-- <a href="<?= base_url().$folder.'/'.$morfaq->file?>" download>  <i class="fa fa-download fa-2x" aria-hidden="true" ></i> </a> -->
                                    <i class="fa fa-trash" style="cursor: pointer"
                                       onclick="delete_morfq(<?= $morfaq->id ?>,<?= $morfaq->mem_id_fk ?>)"></i>
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
            </div>
            <!-- tabel -->
        </div>
    </div>
</div>
<!-- yara -->
<!--  -->
<script>
    function  upload_img()
    {
        var files = $('#file')[0].files;
        var title = $('#title').val();
        var row = $('#row').val();
        console.log(title);
        if(files.length==0)
        {
            swal({
                title: " برجاء ادخال  المرفق ! ",
                type: "warning",
                confirmButtonClass: "btn-warning",
                closeOnConfirm: false
            });
        }
        else if(title==''){
            swal({
                title: " برجاء ادخال   اسم المرفق ! ",
                type: "warning",
                confirmButtonClass: "btn-warning",
                closeOnConfirm: false
            });
        }
        else{
            var error = '';
            var form_data = new FormData();
            for(var count = 0; count<files.length; count++)
            {
                var name = files[count].name;
                var extension = name.split('.').pop().toLowerCase();
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg','png','pdf','PNG','PDF','xls','doc','docx','txt','rar']) == -1)
                {
                    error += "Invalid " + count + " Image File"
                }
                else
                {
                    form_data.append("files[]", files[count]);
                    form_data.append("title",title );
                    form_data.append("row",row );
                }
            }
            if(error == '') {
                $.ajax({
                    url:"<?php echo base_url(); ?>md/all_gam3ia_omomia_members/Gam3ia_omomia_members/upload_img", //base_url() return http://localhost/tutorial/codeigniter/
                    method:"POST",
                    data:form_data,
                    contentType:false,
                    cache:false,
                    processData:false,
                    beforeSend:function()
                    {
                        swal({
                            title: "جاري الإرسال ... ",
                            text: "",
                            imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                            showConfirmButton: false,
                            allowOutsideClick: false
                        });
                        $('#morfaq_result').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
                    },
                    success:function(data)
                    {
                        // alert(data);
                        //$('#images').show();
                        swal("تم الحفظ بنجاح !");
                        $('#title').val('');
                        $('#file').val('');
                        get_details(row);
                    }
                });
            }
        }
    }
</script>
<script>
    function delete_morfq(id,row) {
        swal({
                title: "هل انت متاكد من الحذف?",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "نعم",
                cancelButtonText: "لا",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        type: 'post',
                        url: '<?php echo base_url() ?>md/all_gam3ia_omomia_members/Gam3ia_omomia_members/delete_morfq',
                        data: {id: id,row:row},
                        dataType: 'html',
                        cache: false,
                        success: function (html) {
                            //   alert(html);
                            // $('#Modal_esdar').modal('hide');
                            swal({
                                    title: "تم الحذف بنجاح!",
                                }
                            );
                            console.log(row);
                            get_details(row);
                        }
                    });
                } else {
                    swal("تم الالغاء","", "error");
                }
            });
    }
</script>
<script>
    function get_details(row) {
        // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            data:{row:row},
            url: "<?php echo base_url();?>md/all_gam3ia_omomia_members/Gam3ia_omomia_members/load",
            beforeSend: function () {
                $('#morfaq_result').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#morfaq_result').html(d);
            }
        });
    }
</script>