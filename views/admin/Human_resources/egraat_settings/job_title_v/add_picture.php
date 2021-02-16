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


            <h3 class="panel-title"><?=$title?></h3>


             <!-- <button id="cornerExpand" class="btn btn-danger   btn-sm progress-button ">


                <span class="">تم الإنتهاء</span>


            </button> -->


         </div>


         <!--  -->


         <div class="panel ">


        <div class="panel-heading">


            <h3 class="panel-title"><?php //echo $title?>  </h3>


            <button id="cornerExpand" class="btn btn-success   btn-sm progress-button ">


<span class=""> المسمي الوظيفي</span>


</button>


<button class="btn btn-success  btn-sm progress-button ">


<span class=""><?= $get_all->title ?> </span>


</button>


<button id="cornerExpand" class="btn btn-warning   btn-sm progress-button ">


<span class=""> كود المسمي الوظيفي</span>


</button>


<button class="btn btn-warning  btn-sm progress-button ">


<span class=""><?= $get_all->code ?> </span>


</button>


            <div class="btn-group">


<button type="button" class="btn btn-sm  btn-info">اضافه - تعديل -استكمال </button>


<button type="button" class="btn btn-sm btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">


<span class="caret"></span>


<span class="sr-only">Toggle Dropdown</span>


</button>


<ul class="dropdown-menu">

<li><a  href="<?php echo base_url();?>/human_resources/egraat_settings/Jobtitle/add_edara_qsm/<?php echo $get_all->id;?>"><i class="fa fa-archive" aria-hidden="true"></i>     ربط المسمي الوظيفي الاداره والقسم</a></li>
<li><a  href="<?php echo base_url();?>/human_resources/egraat_settings/Jobtitle/add_picture/<?php echo $get_all->id;?>"><i class="fa fa-commenting-o" aria-hidden="true"></i>   إضافة مهام وظيفية</a></li>


<li><a onclick="get_details_title(<?= $get_all->id ?>)"


aria-hidden="true"


data-toggle="modal"


data-target="#myModal_det"><i class="fa fa-search" aria-hidden="true"></i>التفاصيل</a></li>


<li>


<a onclick='swal({


title: "هل انت متأكد من التعديل ؟",


text: "",


type: "warning",


showCancelButton: true,


confirmButtonClass: "btn-warning",


confirmButtonText: "تعديل",


cancelButtonText: "إلغاء",


closeOnConfirm: false


},


function(){


window.location="<?= base_url() . 'human_resources/egraat_settings/Jobtitle/update/' .$get_all->id  ?>";


});'>


<i class="fa fa-pencil"> </i>تعديل</a>


</li>


<li>


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


swal("تم الحذف!", "", "success");


setTimeout(function(){window.location="<?= base_url() . 'human_resources/egraat_settings/Jobtitle/delete/' . $get_all->id ?>";}, 500);


});'>


<i class="fa fa-trash"> </i>حذف</a>


</li>


</ul>


</div>


</div>


</div>


            <!--  -->


        <div class="panel-body" style="min-height: 485px;">


           <div class="vertical-tabs">


			<!-- <ul class="nav nav-tabs nav-tabs-vertical" role="tablist">


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


			</ul> -->


				<p>


</p>


<div class="row" style="    height: 40px;">


    <div class="col-xs-12 ">


    <div class="row" style="    height: 120px;">


 <input type="hidden" id="row" name="row" value="<?= $get_all->id; ?>">


 <div class="col-md-6 col-sm-4  ">


                    <label class="label  ">   اسم المرفق </label>


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


                              <th> اسم المرفق </th>


                              <th> الملف</th>


                              <th>الحجم</th>


                              <th>التاريخ</th>


                              <th>الوقت</th>


                              <th>بواسطة</th>


                              <th> الحالة</th>


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


                                        <!-- <a target="_blank" href="<?=base_url()."human_resources/egraat_settings/Jobtitle/read_file/".$morfaq->file?>">


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


                                             <iframe src="<?=base_url()."human_resources/egraat_settings/Jobtitle/read_file/".$morfaq->file?>" style="width: 100%; height:  640px;" frameborder="0">


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


                                <div class="col-sm-12">


                                    <?php


                                    if ($morfaq->status == 0) {


                                        $status = 1;


                                        $class = ' btn btn-danger';


                                        $word = 'غير نشط';


                                    } elseif ($morfaq->status == 1) {


                                        $status = 0;


                                        $class = 'btn btn-success';


                                        $word = ' نشط';


                                    }


                                    ?>


                                    <button class="<?php echo $class; ?>" type="button"


                                            row_id="<?php echo $morfaq->id; ?>"><?php echo $word; ?></button>


                                    <button type="button" class=" btn btn-danger" row_id="<?php echo $morfaq->id; ?>"


                                            onclick="change_status2(<?php echo $morfaq->id; ?>,<?= $morfaq->job_title_id_fk ?>,<?php echo $status; ?>);">


                                        <i class=" fa fas fa-undo"></i></button>


                                </div>


                            </td>


                                <td>


                                <a href="<?= base_url().$folder.'/'.$morfaq->file?>" download>  <i class="fa fa-download fa-2x" aria-hidden="true" ></i> </a>


                                    <i class="fa fa-trash" style="cursor: pointer"


                                       onclick="delete_morfq(<?= $morfaq->id ?>,<?= $morfaq->job_title_id_fk ?>)"></i>


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


                url:"<?php echo base_url(); ?>human_resources/egraat_settings/Jobtitle/upload_img", //base_url() return http://localhost/tutorial/codeigniter/


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


  confirmButtonText: "نعم!",


  cancelButtonText: "لا!",


  closeOnConfirm: false,


  closeOnCancel: false


},


function(isConfirm) {


  if (isConfirm) {


      $.ajax({


          type: 'post',


          url: '<?php echo base_url() ?>human_resources/egraat_settings/Jobtitle/delete_morfq',


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


    } else {


    swal("تم الالغاء","", "error");


  }


});


  }


</script>


<script>


    function get_details(id) {


       // $('#pop_rkm').text(rkm);


        $.ajax({


            type: 'post',


            data: {id: id},


            url: "<?php echo base_url();?>human_resources/egraat_settings/Jobtitle/load",


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


            url: "<?php echo base_url();?>human_resources/egraat_settings/Jobtitle/get_fatora_attach",


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


<div class="modal fade" id="myModal_det" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">


    <div class="modal-dialog" role="document" style="width: 80%">


        <div class="modal-content">


            <div class="modal-header">


                <button type="button" class="close"


                        data-dismiss="modal">&times;


                </button>


                <h4 class="modal-title"> التفاصيل :


                    <span id="pop_rkm"></span>


                </h4>


            </div>


            <div class="modal-body">


                <div id="details"></div>


            </div>


            <div class="modal-footer" style=" display: inline-block;width: 100%;">


                <button type="button" class="btn btn-danger"


                        data-dismiss="modal">إغلاق


                </button>


            </div>


        </div>


    </div>


</div>


<script>


    function get_details_title(row_id) {


        // $('#pop_rkm').text(rkm);


        $.ajax({


            type: 'post',


            url: "<?php echo base_url();?>human_resources/egraat_settings/Jobtitle/load_details",


            data: {row_id: row_id},


            beforeSend: function () {


                $('#details').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');


            },


            success: function (d) {


                $('#details').html(d);


            }


        });


    }


</script>


<script>


    function change_status2(row, emp_code, approved) {


        $.ajax({


            type: 'post',


            url: "<?php echo base_url();?>human_resources/egraat_settings/Jobtitle/change_status",


            data: {row: row, emp_code: emp_code, approved: approved},


            success: function (d) {


                swal({


                    type:"success",


                    title:d ,


                    confirmButtonText: "تم"


                });


                get_details(emp_code);


               // get_details_banks(emp_code);


               // location.reload();


            }


        });


    }


</script>