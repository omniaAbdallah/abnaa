<div class="col-xs-12 no-padding">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
           <h3 class="panel-title"><?php echo $title ?> </h3>
        </div>
        <div class="panel-body">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="active"><a href="#details"  data-toggle="tab"><i class="fa fa-list  fa-2x" style="display: block;text-align: center"></i>تعريف البرنامح</a></li>
                <li><a href="#morfqat" data-toggle="tab"><i class="fa fa-paperclip  fa-2x" style="display:block;text-align: center"></i> المستندات المطلوبة </a></li>



            </ul>
            <!-- Tab panels -->
            <div class="tab-content">
                <div class="tab-pane fade in active" id="details">
               <?php
               if(isset($t3ref_data)&&!empty($t3ref_data))
               {
$title_brnamg=$t3ref_data->title;
$t3ref_brnamg=$t3ref_data->t3ref_brnamg;
$baramg_ektfaa=$t3ref_data->baramg_ektfaa;
$ahdaf_brnamg=$t3ref_data->ahdaf_brnamg;
$mosthdaf=$t3ref_data->mosthdaf;
$rules=$t3ref_data->rules;
$t3ref_logo=$t3ref_data->logo;
               }else
               {
                $title_brnamg='';
                $t3ref_brnamg='';
                $baramg_ektfaa='';
                $ahdaf_brnamg='';
                $mosthdaf='';
                $rules='';
                $t3ref_logo='';
               }

               ?>
                  <?php  echo form_open_multipart(base_url().'family_controllers/osr_ektfaa/Osr_ektfaa_t3ref/upload_data');?>
               <!-- start_form -->
<div class="col-xs-9 padding-4">
<div class="col-md-6 col-sm-4  ">
                <label class="label  ">   اسم البرنامج </label>
                <input type="text"   name="title_brnamg" id="title_brnamg" 
                data-validation="required"
                       class="form-control " value="<?=$title_brnamg?>">
            </div>
<div class="col-md-4 col-sm-4 padding-4">
                  <label class="label"> اللوجو</label>
 <input type="file" name="file_logo" id="file_logo"  class="form-control" 
 data-view="image_view"
 accept=".jpeg,.jpg,.png,.gif"
 onchange='RevieImage(this);'
 >
 

 </div>

 <div class="form-group col-md-6 col-sm-6 ">
                                <label class="label">تعريف البرنامج</label>
                                <textarea class="form-control editor_1" name="t3ref_brnamg"
                                data-validation="required"
                                    id="t3ref_brnamg"><?= $t3ref_brnamg ?></textarea>
</div>
<div class="form-group col-md-6 col-sm-6 ">
                                <label class="label"> برامج اكتفاء</label>
                                <textarea class="form-control editor_2" name="baramg_ektfaa"
                                data-validation="required"
                                    id="baramg_ektfaa"><?= $baramg_ektfaa ?></textarea>
</div>
<div class="form-group col-md-6 col-sm-6 ">
                                <label class="label">  اهداف البرنامج</label>
                                <textarea class="form-control editor_3" name="ahdaf_brnamg"
                                data-validation="required"
                                    id="ahdaf_brnamg"><?= $ahdaf_brnamg ?></textarea>
</div>

<div class="form-group col-md-6 col-sm-6 ">
                                <label class="label">   المستهدف</label>
                                <textarea class="form-control editor_4" name="mosthdaf"
                                data-validation="required"
                                    id="mosthdaf"><?= $mosthdaf ?></textarea>
</div>
<div class="form-group col-md-6 col-sm-6 ">
                                <label class="label">   الشروط</label>
                                <textarea class="form-control editor_5" name="rules"
                                data-validation="required"
                                    id="rules"><?= $rules ?></textarea>
</div>

 <div class="col-xs-2 text-center" style="margin-top: 29px;">
  <button type="submit"
                class="btn btn-labeled btn-success "  
                style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
        </button>
</div>
</form>

                 
 </div>

 <div class="col-xs-3 padding-4">
 <img id="image_view"
                                    src="<?php echo base_url(); ?>uploads/family_attached/osr_ektfaa_mostndat/<?php echo $t3ref_logo; ?>"
                                    height="200px" width="250px" alt="" />

 </div>
<!-- end_form -->
            </div>
<!--  -->
                <div class="tab-pane fade " id="morfqat">
                    

                <div class="col-md-12 no-padding">

<div class="col-md-12 col-sm-11 no-padding">
<div class="col-xs-12 padding-4">


       <div class="vertical-tabs">
        
            <p>
</p>
<div class="row" style="    height: 40px;">
<div class="col-xs-12 ">
<div class="row" style="    height: 120px;">
<div class="col-md-6 col-sm-4  ">
                <label class="label  ">   اسم المستند </label>
                <input type="text"   name="title[]" id="title" 
                       class="form-control ">
            </div>
<div class="col-md-2 col-sm-4 padding-4">
                  <label class="label"> المرفق</label>
 <input type="file" name="file[]" id="file"  class="form-control" data-validation="reuqired">
 
 </div>
 
             <div class="col-xs-2 text-center" style="margin-top: 29px;">
  <button type="button"
                class="btn btn-labeled btn-success "  onclick="upload_img()"
                style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
        </button>
        </div>
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
                    if (isset($folder_path) && !empty($folder_path)){
                        $folder= $folder_path;
                    } else{
                        $folder ='';
                    }
                    ?>
                <table  id="" class="example table  table-bordered table-striped table-hover">
                    <thead>
                      <tr class="greentd">
                          <th>م</th>
                          <th>نوع الملف</th>
                          <th> اسم المستند </th>
                          <th> الملف</th>
                          <th>الحجم</th>
                          <th>التاريخ</th>
                          <th>الوقت</th>
                          <th>بواسطة</th>
                 
                          <th>الاجراء</th>
                      </tr>
                    </thead>
                    <tbody >
                    <?php
                    foreach ($morfqat as $morfaq){
                        $ext = pathinfo($morfaq->file, PATHINFO_EXTENSION);
                       //  $Destination = 'uploads/archive/deals/1bec9894697603bd9a45630d73230be5.jpg';
                        $Destination = $folder .'/'.$morfaq->file;
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
                                                    <img src="<?= base_url().$folder .'/'.$morfaq->file?>"
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
                                    <!-- <a target="_blank" href="<?=base_url()."family_controllers/osr_ektfaa/Osr_ektfaa_t3ref/read_file/".$morfaq->file?>">
                                        <i class="fa fa-upload" title=" قراءة"></i> </a> -->
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
                                         <iframe src="<?=base_url()."family_controllers/osr_ektfaa/Osr_ektfaa_t3ref/read_file/".$morfaq->file?>" style="width: 100%; height:  640px;" frameborder="0">
                                           </iframe>
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
if (!empty($morfaq->time)){
echo $morfaq->time;
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
                                   onclick="delete_morfq(<?= $morfaq->id ?>)"></i>
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
<!-- yara -->
            </div>
               </div>
            </div>
        
</div>
</div>
<div class="modal fade" id="modal_image" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
<div class="modal-dialog" role="document" style="width: 80%">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">عرض الملف </h4>
        </div>
        <div class="modal-body" > 
        <div class="attachimage">
               </div>
        </div>
    </div>
</div>
</div>
<!-- myModal Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document" style="width: 80%">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title title ">  </h4>
        </div>
        <div class="modal-body">
            <div id="output">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
        </div>
    </div>
</div>
</div>
                </div>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/23.1.0/classic/ckeditor.js"></script>


<script>
    function  upload_img()
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
              
            }
        }
        if(error == '') {
            $.ajax({
                url:"<?php echo base_url(); ?>family_controllers/osr_ektfaa/Osr_ektfaa_t3ref/upload_img", //base_url() return http://localhost/tutorial/codeigniter/
                method:"POST",
                data:form_data,
                contentType:false,
                cache:false,
                processData:false,
                beforeSend: function (data) {
                    swal({
                        title: "جاري الحفظ ... ",
                        text: "",
                        imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                        showConfirmButton: false,
                        allowOutsideClick: false
                    });
            },
                success:function(data)
                {
                   // alert(data);
                     //$('#images').show();
                     swal("تم الحفظ بنجاح !");
                     $('#title').val('');
                     $('#file').val('');
                        get_details();
                 }
             });
        }
    }
    }
</script>
<script>
  function delete_morfq(id) {
    swal({
  title: "هل انت متاكد من الحذف?",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "نعم!",
  cancelButtonText: "لا!",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm) {
  if (isConfirm) {
      $.ajax({
          type: 'post',
          url: '<?php echo base_url() ?>family_controllers/osr_ektfaa/Osr_ektfaa_t3ref/delete_morfq',
          data: {id: id},
          dataType: 'html',
          cache: false,
          success: function (html) {
              //   alert(html);
             // $('#Modal_esdar').modal('hide');
              swal({
                  title: "تم الحذف بنجاح!",
  }
  );

  get_details();
          }
      });
    } else {
    swal("تم الالغاء","", "error");
  }
});
  }
</script>
<script>
    function get_details() {
       // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>family_controllers/osr_ektfaa/Osr_ektfaa_t3ref/load",
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
ClassicEditor
    .create(document.querySelector('.editor_1'))
    .catch(error => {
        console.error(error);
    });
    ClassicEditor
    .create(document.querySelector('.editor_2'))
    .catch(error => {
        console.error(error);
    });
    ClassicEditor
    .create(document.querySelector('.editor_3'))
    .catch(error => {
        console.error(error);
    });
    ClassicEditor
    .create(document.querySelector('.editor_4'))
    .catch(error => {
        console.error(error);
    });
    ClassicEditor
    .create(document.querySelector('.editor_5'))
    .catch(error => {
        console.error(error);
    });
</script>
<script>
function RevieImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#' + $(input).attr("data-view")).attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}
</script>