
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

    <div  class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title">تفاصيل الخبر &nbsp;</h3>
            <button id="cornerExpand" class="btn btn-success   btn-sm progress-button ">
                <span class="">رقم الخبر</span>
            </button>
             <button class="btn btn-success  btn-sm progress-button ">
                <span class=""><?= $get_all->id ?> </span>
             </button>
             
             <!-- <button id="cornerExpand" class="btn btn-danger   btn-sm progress-button ">
                <span class="">تم الإنتهاء</span>
            </button> -->
         </div>
        <div class="panel-body" style="min-height: 485px;">
           <div class="vertical-tabs">
			<ul class="nav nav-tabs nav-tabs-vertical" role="tablist">
				<li class="nav-item active">
					<a class="nav-link " data-toggle="tab" href="#pag1" role="tab" aria-controls="pag1"><i class="fa fa-2x fa-keyboard-o "></i> تفاصيل الخبر</a>
				</li>
                <li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#pag4" role="tab" aria-controls="pag4"><i class="fa fa-2x fa-pencil"></i> تعديل الخبر </a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#pag2" role="tab" aria-controls="pag2"><i class="fa fa-2x fa-paperclip"></i> مكتبه الميديا </a>
				</li>
                <li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#pag3" role="tab" aria-controls="pag3"><i class="fa fa-2x fa-folder-open-o"></i>مكتبه الفيديوهات </a>
				</li>
                
               

			</ul>


			<div class="tab-content tab-content-vertical">
				<div class="tab-pane active" id="pag1" role="tabpanel">
				  
                   <div class="col-xs-12 no-padding">
                       <div class="col-sm-9 col-xs-12">
                       <table class="table  table-striped table-bordered dt-responsive nowrap">
                                <tbody>
                                <tr>
                                    <th style="width: 110px">رقم الخبر</th>
                                    <td><?= $get_all->id ?></td>
                    
                                </tr>
                                <tr>
                   
                    
                                </tr>
                                <tr>
                                    <th> تاريخ الخبر</th>
                                    <td><?= $get_all->news_date ?></td>
                    
                                </tr>
                                <tr>
                                    <th>عنوان الخبر</th>
                                    <td><?= $get_all->news_title ?></td>
                    
                                </tr>
                                <tr>
                                    <th> حاله الخبر</th>
                                    <td><span class="label" style="background-color: #32e26b"><?php if( $get_all->news_status==1){echo'نشط' ;}elseif($get_all->news_status==2){echo 'غير نشط';}else{echo 'غير محدد';}?></span></td> 
               
                   
                    
                                </tr>
                                <tr>
                                    <th>  كلمات افتتاحيه</th>
                                    <td> <?= $get_all->news_words ?></td>
                    
                                </tr>
                                <tr>
                                    <th>تفاصيل الخبر</th>
                                    <td> <?= $get_all->news_content ?></td>
                    
                    
                                </tr>
                               
                               
                                
                                
                              
                                  
                                   
                               
                                
                                 
                    
                                </tbody>
                            </table>
                            
                            
                   
                    </div>
                    <div class="col-md-3">
                        <div class="left-archive-aside">
                            
                            
                            
                         
                    
                    
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5 class="panel-title">تمت الإضافة بواسطة</h5>
                                </div>
                                <div class="panel-body">
                                    <h5>  <?= $get_all->publisher_name;?></h5>
                    
                                    <p><?= $get_all->date_ar;?>
                                    </p>
                                    <p>IP : 192.168.1.12</p>
                                </div>
                            </div>
                            
                            
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5 class="panel-title"><i class="fa fa-folder-o"></i> قصاصات </h5>
                                </div>
                                <div class="panel-body">
                                <?php
                                if (isset($morfqat) && !empty($morfqat)){
                                } else{?>
                               
                                    <p> لايوجد أى مستندات حتى الأن </p><?php }?>
                                    
                                </div>
                            </div>
                    
                    
                        </div>
                    
                    
                    </div>
                   </div>                  

				</div>

                
                <div class="tab-pane" id="pag4" role="tabpanel">

<!-- yara -->
<?php if (isset($item) && !empty($item) ) {
$data_load["item"]= $item;




$this->load->view('admin/md/news_v/edite_news', $data_load);
}?>
<!-- yara -->
</div>
				<div class="tab-pane" id="pag2" role="tabpanel">
				<p>

 
</p>
<div class="row" style="    height: 40px;">

    
      
   
    <div class="col-xs-12 ">
    <div class="row" style="    height: 120px;">
 <input type="hidden" id="row" name="row" value="<?= $get_all->id; ?>">
    
 <div class="col-md-6 col-sm-4  ">
                    <label class="label  ">اسم المرفق </label>
                    <input type="text"   name="title[]" id="title" 
                           class="form-control ">
 
                </div>
    
    <div class="col-md-2 col-sm-4 padding-4">
                      <label class="label"> المرفق</label>
     <input type="file" name="file[]" id="file"  class="form-control" data-validation="reuqired">
     </div>
     <!-- <button type="button" class="btn btn-success save"  style="padding: 6px 12px;"
                         onclick="upload_img(<?= $get_all->id; ?>)"
                          >حفظ
                 </button> -->
                 <div class="col-xs-2 text-center" style="margin-top: 29px;">
     
      <button type="button"
                    class="btn btn-labeled btn-success "  onclick="upload_img(<?= $get_all->id; ?>)"
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
                                        <a target="_blank" href="<?=base_url()."md/new/News/read_file/".$folder.'/'.$morfaq->file?>">
                                            <i class="fa fa-upload" title=" قراءة"></i> </a>
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
                                <a href="<?= base_url().$folder.'/'.$morfaq->file?>" download>  <i class="fa fa-download fa-2x" aria-hidden="true" ></i> </a>
                                    <i class="fa fa-trash" style="cursor: pointer"
                                       onclick="delete_morfq(<?= $morfaq->id ?>,<?= $morfaq->news_id_fk ?>)"></i>
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



                <div class="tab-pane" id="pag3" role="tabpanel">
				
                <div class="col-sm-12 no-padding form-group">


    <div class="col-sm-3  col-md-3 padding-2 ">
        <label class="label   ">عنوان الفيديو </label>
        <input type="text" name="vedio_title" id="vedio_title" 
               value=""
               class="form-control ">
        
    </div>
    <div class="col-sm-3  col-md-5 padding-2 ">
        <label class="label   ">رابط الفيديو </label>
        <input type="text" name="vedio_link" id="vedio_link" 
               value=""
               class="form-control ">

    </div>


    <div class="col-sm-3  col-md-2 padding-4" id="div_add_vedio" style="display: block;">
        <button type="button" onclick="add_vedio(<?=$get_all->id?>)"
                style="    margin-top: 27px;"
                class="btn btn-labeled btn-success" name="save" value="save">
            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
        </button>
    </div>
    <div class="col-sm-3  col-md-3 padding-4" id="div_update_vedio" style="display: none;">
        <button type="button"
                class="btn btn-labeled btn-success " name="save" value="save" id="update_vedio">
            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>تعديل
        </button>
    </div>


</div>
<br>
<br>
<div id="myDiv_geha1111"><br><br>
<?php
                    if (isset($vedio) && !empty($vedio)){
                        $x=1;
                       
                        ?>
                    <table  id="" class="table example table-bordered table-striped table-hover">
                        <thead>
                          <tr class="greentd">
                              <th>م</th>
                            
                              <th>عنوان الفيديو</th>
                              <th> الملف</th>
                            
                              <th>التاريخ</th>
                              <th>بواسطة</th>
                              <th>الاجراء</th>

                          </tr>
                        </thead>
                        <tbody >
                        <?php
                        foreach ($vedio as $vedios){
                         
                            ?>
                            <tr>
                                <td><?= $x++?></td>
                              
                                <td>
                                    <?php
                                    if (!empty($vedios->title)){
                                        echo $vedios->title;
                                    } else{
                                        echo 'لا يوجد ' ;
                                    }
                                    ?>

                                </td>
                                <td>
                                
                                        <a data-toggle="modal" data-target="#myModal-view_vedio-<?= $vedios->id ?>">
                                            <i class="fa fa-eye" title=" قراءة"></i> </a>
                                        <!-- modal view -->
                                        <div class="modal fade" id="myModal-view_vedio-<?= $vedios->id ?>" tabindex="-1"
                                             role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close"><span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <h4 class="modal-title" id="myModalLabel">الفيديو</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                    <iframe width="800" height="500" src="<?= $vedios->file?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
                                    <?php
                                    if (!empty($vedios->date_ar)){
                                        echo $vedios->date_ar;
                                    } else{
                                        echo 'غير محدد  ' ;
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if (!empty($vedios->publisher_name)){
                                        echo $vedios->publisher_name;
                                    } else{
                                        echo 'غير محدد  ' ;
                                    }
                                    ?>
                                </td>
                                <td>
                                <i class="fa fa-pencil" style="cursor: pointer"
                                       onclick="update_vedio(<?= $vedios->id ?>,<?= $vedios->news_id_fk ?>)"></i>
                                    <i class="fa fa-trash" style="cursor: pointer"
                                       onclick="delete_vedio(<?= $vedios->id ?>,<?= $vedios->news_id_fk ?>)"></i>
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


                   
                   </div>

				</div>


























			


				
 
             
              



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

<!-- myModal Modal -->









<!--  -->
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
                url:"<?php echo base_url(); ?>md/new/News/upload_img", //base_url() return http://localhost/tutorial/codeigniter/
                method:"POST",
                data:form_data,
              
                contentType:false,
                cache:false,
                processData:false,
                beforeSend:function()
                {
                  
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
  //  confirm('?? ??? ????? ?? ????? ????? ?');
       var r = confirm('هل تريد حذف المرفق?');
  if (r == true) {
      $.ajax({
          type: 'post',
          url: '<?php echo base_url() ?>md/new/News/delete_morfq',
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
  console.log(row);
  get_details(row);
  
          }
      });
  }

}
</script>
<script>
    function get_details(id) {
       // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            data: {id: id},
            url: "<?php echo base_url();?>md/new/News/load",
            
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
    function val_id(val_id)
    {
        $('#row_id').val(val_id);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>md/new/News/get_fatora_attach",
            data: {
                val_id: val_id,

            },
            success: function (d) {


                $(".attachimage").html(d);

            }

        });
    }


</script>

<!-- links -->
<script>
    function get_details_vedio(id) {
       // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            data:{id:id},
            url: "<?php echo base_url();?>md/new/News/load_vedio",
            
            // beforeSend: function () {
            //     $('#myDiv_geha11').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            // },
            success: function (d) {
                $('#myDiv_geha1111').html(d);

            }

        });
    }
</script>

<script>
  
  function add_vedio(id) {

      $('#div_update_vedio').hide();
      $('#div_add_vedio').show();
      //  alert(value);
var title=$('#vedio_title').val();
var link=$('#vedio_link').val();

     
      if (title != 0 && title != '' && link != 0 && link != '' ) {
        
          $.ajax({
              type: 'post',
              url: '<?php echo base_url() ?>md/new/News/add_vedio',
              data: {id:id,title:title,link:link},
              dataType: 'html',
              cache: false,
              success: function (html) {

                //  $('#reason').val(' ');
                $('#vedio_title').val('');
                $('#vedio_link').val('');
              //  $('#Modal_esdar').modal('hide');
                  swal({
                      title: "تم الحفظ!",


      }
      );
      get_details_vedio(id);

              }
          });
      }
      else{
        swal({
    title: " برجاء ادخال البيانات! ",
    type: "warning",
    confirmButtonClass: "btn-warning",
    closeOnConfirm: false
});

      }

  }


</script>
<script>
    function update_vedio(id,news_id) {
        var id = id;
     
        $('#div_add_vedio').hide();
        $('#div_update_vedio').show();


        $.ajax({
            url: "<?php echo base_url() ?>md/new/News/getById_vedio",
            type: "Post",
            dataType: "html",
            data: {id: id},
            success: function (data) {

                var obj = JSON.parse(data);
                //console.log(obj);
               console.log(obj.title);
               console.log(obj.file);
                $('#vedio_title').val(obj.title);
                $('#vedio_link').val(obj.file);

            }

        });

        $('#update_vedio').on('click', function () {
            var title=$('#vedio_title').val();
var link=$('#vedio_link').val();
         

            $.ajax({
                url: "<?php echo base_url() ?>md/new/News/update_vedio",
                type: "Post",
                dataType: "html",
                data: {id:id,title:title,link:link,news_id:news_id},
                success: function (html) {
                    //  alert('hh');
                    $('#vedio_title').val('');
                $('#vedio_link').val('');
                    $('#div_update_vedio').hide();
                    $('#div_add_vedio').show();
                   // $('#Modal_esdar').modal('hide');
                    swal({
                        title: "تم التعديل!",
  
  
        }
        );
        get_details_vedio(news_id);    

                }

            });

        });

    }

  
</script>
<script>
  
    
        function delete_vedio(id,news_id) {
        //  confirm('?? ??? ????? ?? ????? ????? ?');
             var r = confirm('هل تريد الحذف؟');
        if (r == true) {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>md/new/News/delete_vedio',
                data: {id: id,news_id:news_id},
                dataType: 'html',
                cache: false,
                success: function (html) {
                 
                
                  
                    swal({
                        title: "تم الحذف !",
  
  
        }
        );
        get_details_vedio(news_id);

                }
            });
        }

    }
</script>