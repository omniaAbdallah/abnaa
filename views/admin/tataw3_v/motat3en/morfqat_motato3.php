<style type="text/css">
.reply-comment{
    display: inline-block;
    width: 100%;
    margin-bottom: 20px
}
.reply-img{
    width: 15%;	
    float: right;
}
.reply-img img{
    width: 100%;
    max-width: 70px;
    height: 70px;
    border:1px solid #eee;
}
.reply-comment{
    float: right;
    width: 85%;
}
.label-inverse{
    background-color: #888;
    color: #fff;
}
.reply-comment  span.label{
    text-align: center;
    padding-right: 10px;
    display: inline-block;
    width: auto;
    font-size:14px;
}
.reply-comment .name{
    color: #888;
    font-size:15px;
}
.comments-sec .well{
    height: 100%;
}
.bubble-div img{
    width: 150px;
    max-width: 100%;
}
.btn-group>.btn, .btn-group>.btn+.btn, .btn-group>.btn:first-child, .fc .fc-button-group>* {
    margin: 0 0 0 0;
}
</style>
<div class="col-sm-12 no-padding " >
<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4> المرفقات</h4>
                </div>
            </div>   
    <div class="panel-body" style="min-height: 485px;">
       <div class="vertical-tabs">
       <div class="col-xs-12 no-padding">
<div class="col-xs-12 no-padding">
<?php if($volunteer['suspend']==4)
{?>
    <span class="label" style="color: #044dd4;"> رقـم الملف</span>
    <span class="label"style="color: #940000;"><?=$volunteer['file_num']?></span>
<?php }else{?>
<span class="label" style="color: #044dd4;"> رقـم التطوع</span>
<span class="label"style="color: #940000;"><?=$volunteer['id']?></span>
<?php }?>

<span class="label" style="color: #044dd4;"> اسم المتطوع</span>
<span class="label"style="color: #940000;"><?=$volunteer['name']?></span>
<span class="label" style="color: #044dd4;"> رقم السجل المتطوع</span>
<span class="label"style="color: #940000;"><?=$volunteer['id_card']?></span>
<span class="label" style="color: #044dd4;"> تاريخ التطوع</span>
<span class="label"style="color: #940000;"><?=$volunteer['talb_date']?></span>
<br />
<span class="label" style="color: #044dd4;">فئه التطوع</span>
<span class="label" style="color: #940000;"><?php
            
                               
            if (isset($volunteer['f2a_talab'])&&($volunteer['f2a_talab']==1)){echo 'فرد';}elseif ($volunteer['f2a_talab']==2){echo 'جهه';}
                              
                           ?></span>
<span class="label" style="color: #044dd4;">نوع التطوع</span>
<span class="label" style="color: #940000;"><?php
            
                               
            if (isset($volunteer['tato3_no3'])&&($volunteer['tato3_no3']==1)){echo 'بدون اجر';}elseif ($volunteer['tato3_no3']==2){echo 'بأجر';}
                              
                           ?></span>

</div>

</div>

</div>
<!--  -->


<div class="col-xs-12 ">
<div class="col-xs-1 ">
</div>
<div class="col-xs-12 ">


<div >
           
<div class="panel-body">
<input type="hidden" id="row" name="row" value="<?= $volunteer['id']; ?>">
<div class="col-md-4 ">
                        <label class="label  ">عنوان المرفق </label>
                        <input type="text"   name="title[]" id="title"
                               class="form-control "
                               style=" width:79%;float: right;"
                               > 
                    </div>
<div class="col-md-4 col-sm-4 padding-4">
                          <label class="label"> المرفق</label>
         <input type="file" name="file[]" id="file"  class="form-control" data-validation="reuqired">
         </div>
                     <div class="col-xs-2 text-center" style="margin-top: 29px;">
         
          <button type="button"
                        class="btn btn-labeled btn-sm btn-success "  onclick="upload_img(<?= $volunteer['id']; ?>)"
                        style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ المرفق
                </button>

                </div>
</div>
        <div class="col-xs-1 ">
        </div>
</div>
</div>

<!-- yara -->
<div class="clearfix"></div><br>
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
                        $Destination ='uploads/tato3/morfqat/'.$morfaq->file;
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
                                                    <img src="<?= base_url().'uploads/tato3/morfqat/'.$morfaq->file?>"
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
                                                    <iframe src="<?=base_url()."tataw3/Tataw3_c/read_morfq/".$morfaq->file?>" style="width: 100%; height:  640px;" frameborder="0"></iframe>
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
                        
                                <i class="fa fa-trash" style="cursor: pointer"
                                   onclick="delete_morfq(<?= $morfaq->id ?>,<?= $morfaq->tat_id_fk ?>)"></i>
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

















<!--  -->

</div>
</div>
</div>




<script>
function  upload_img(row)
{
    var files = $('#file')[0].files;
    var title = $('#title').val();
    //var row = $('#row').val();
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
            url:"<?php echo base_url(); ?>tataw3/Tataw3_c/upload_img", //base_url() return http://localhost/tutorial/codeigniter/
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
function get_details(id) {
   // $('#pop_rkm').text(rkm);
    $.ajax({
        type: 'post',
        data: {id: id},
        url: "<?php echo base_url();?>tataw3/Tataw3_c/load",
        beforeSend: function () {
            $('#morfaq_result').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
        },
        success: function (d) {
            $('#morfaq_result').html(d);
        }
    });
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
                url: '<?php echo base_url() ?>tataw3/Tataw3_c/delete_morfq',
                data: {id: id,row:row},
                dataType: 'html',
                cache: false,
               
                success: function (html) {
                 
                  
                  
                    swal({
                        title: "تم الحذف!",
  
  
        }
        );
        get_details(row);

                }
            });
  } else {
    swal("تم الالغاء","", "error");
  }
});
    }
</script>