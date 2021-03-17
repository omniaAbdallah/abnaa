











<div class="col-sm-12 no-padding">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
        <div class="panel-heading">
            <h3 class="panel-title"><?= $title ?></h3>
        </div>
        <div class="panel-body">


        <div class="col-xs-12 padding-4">


<table class="table " style="table-layout: fixed">
    <tbody>
    <tr >
        <td style="width: 105px;">
            <strong> أسم المهمة</strong>
        </td>
        <td style="width: 10px;"><strong>:</strong></td>
        <td> <?php
        if (!empty($ghat)):
            foreach ($ghat as $record):
                if ($get_all->mohma_name == $record->id_setting) {
                    echo $record->title_setting;
                }
                ?>
               
                <?php
            endforeach;
        endif;
        ?></td>
        <td style="width: 135px;"><strong> تاريخ الانشاء </strong></td>
        <td style="width: 10px;"><strong>:</strong></td>
        <td><?php if (!empty($get_all->mohma_date)) {
                echo  $get_all->mohma_date;
            } else{
                echo 'غير محدد' ;
            }
            ?>

    
        <td style="width: 105px;">
            <strong>   ارسال الي </strong>
        </td>
        <td style="width: 10px;"><strong>:</strong></td>
        <td><?php if (!empty($get_all->emp_n)) {
                echo  $get_all->emp_n;
            } else{
                echo 'غير محدد' ;
            }
            ?></td>

       
       

    </tr>

    <tr >
        <td style="width: 105px;">
            <strong>     
درجة الاهمية </strong>
        </td>
        <td style="width: 10px;"><strong>:</strong></td>
        <td> <?php
                            $arr = array(
                             1 => 'مهم',
                             2 => 'عاجل',
                             3 => 'غير مهم',
                             4 => 'غير عاجل'
                            );
                            foreach ($arr as $key => $value) {
                                $select = '';
                                if ($get_all->important != '') {
                                    if ($key == $get_all->important) {
                                        echo $value; 
                                    }
                                } ?>
                                
                                <?php
                            }
                            ?></td>

        <td style="width: 135px;"><strong>  تفاصيل المهمه </strong></td>
        <td style="width: 10px;"><strong>:</strong></td>
        <td><?php if (!empty($get_all->mohma_details)) {
                echo  $get_all->mohma_details;
            } else{
                echo 'غير محدد' ;
            }
            ?></td>
        <td style="width: 150px;"><strong>   من تاريخ</strong></td>
        <td style="width: 10px;"><strong>:</strong></td>
           <td><?php if (!empty($get_all->from_date)) {
          
                echo $get_all->from_date;
            } else{
                echo 'غير محدد' ;
            }
            ?></td>

    </tr>
    <tr >
    <td style="width: 150px;"><strong>   الي تاريخ</strong></td>
        <td style="width: 10px;"><strong>:</strong></td>
           <td><?php if (!empty($get_all->to_date)) {
          
                echo $get_all->to_date;
            } else{
                echo 'غير محدد' ;
            }
            ?></td>

        <td style="width: 135px;"><strong> الوقت المقدر</strong></td>
        <td style="width: 10px;"><strong>:</strong></td>
        <td><?php if (!empty($get_all->num_days)) {
                echo  $get_all->num_days;
            } else{
                echo 'غير محدد' ;
            }
            ?>
            يوم
            </td>
        <td style="width: 150px;"><strong>مرتبطة بمهمه اخري</strong></td>
        <td style="width: 10px;"><strong>:</strong></td>
        <td>
        
        <?php
                            $arry = array('1' => 'نعم', '2' => 'لا');
                            foreach ($arry as $key => $value) {
                                ?>
                               
                                    <?php
                                    if ($get_all->another_mohma == $key) {
                                        echo $value;
                                    }
                                    ?>
                               
                                <?php
                            }
                            ?>
        </td>

    </tr>
  
   



    </tbody>
</table>


</div>

    <div class="col-xs-12 ">
    

    <div class="col-md-6 col-sm-4  ">
                       <label class="label  ">اسم المرفق </label>
                       <input type="text"   name="title[]" id="title" 
                              class="form-control ">
   <input type="hidden" id="hidden_id" name="hidden_id" value="<?= $mohma_id_fk; ?>">
    <input type="hidden" id="hidden_rkm" name="hidden_rkm" value="<?= $mohma_id_fk; ?>">
                   </div>
       
       <div class="col-md-2 col-sm-4 padding-4">
                         <label class="label"> المرفق</label>
        <input type="file" name="file[]" id="file"  class="form-control" data-validation="reuqired">
        </div>
        <!-- <button type="button" class="btn btn-success save"  style="padding: 6px 12px;"
                            onclick="upload_img(<?= $rkm; ?>)"
                             >حفظ
                    </button> -->
                    <div class="col-xs-2 text-center" style="margin-top: 29px;">
        
         <button type="button"
                       class="btn btn-labeled btn-success "  onclick="upload_img(<?= $mohma_id_fk; ?>)"
                       style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                   <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
               </button>
         
               </div>
               
               </div>
   <div id="result_files">
   
               <?php
                       if (isset($one_data) && !empty($one_data)){
                           $x=1;
                           $image =  array('gif','Gif','ico','ICO','jpg','JPG','jpeg','JPEG','BNG','png','PNG','bmp','BMP');
                           $file= array('pdf','PDF','xls','xlsx',',doc','docx','txt');
                          
                               $folder ='uploads/human_resources/mohma';
                           
                           ?>
                           <br>
               <br>
                       <table id="" class="example table  table-bordered table-striped table-hover">
                           <thead>
                             <tr class="greentd">
                                 <th>م</th>
                                 <th>نوع الملف</th>
                                 <th>اسم الملف</th>
                                 <th> الملف</th>
                                 <th>الحجم</th>
                                 
                                 <th>الاجراء</th>
   
                             </tr>
                           </thead>
                           <tbody >
                           <?php
                           foreach ($one_data as $morfaq){
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
                                       
   
                                       <!--  -->
                                       <?php
                                       if (in_array($ext,$image)){
                                   ?>
                                   <?php if (!empty($morfaq->file)) {
                                       $url = base_url() . $folder .'/'. $morfaq->file;
                                   } else {
                                       $url = base_url('asisst/fav/apple-icon-120x120.png');
                                   } ?>
   
                                   <a target="_blank" onclick="show_img('<?= $url ?>')">
                                       <i class=" fa fa-eye"></i>
                                   </a> 
                               
                                   <?php
                               }  elseif (in_array($ext,$file)){
                                   ?>
                                  
                                   <!-- <a href="<?php echo base_url() . 'human_resources/mohma/Mohma_c/read_file/' . $mehwar_morfaq ?>"
                                      target="_blank">
                                       <i class=" fa fa-eye"></i></a> -->
                                       
                                       <?php if (!empty($morfaq->file)) {
                                      // $url = base_url() . 'uploads/egtma3at/all_mehwr/' . $mehwar_morfaq;
                                      $url = base_url() .'human_resources/mohma/Mohma_c/read_file/'. $morfaq->file;
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
                                       <?= $size?>
                                   </td>
                                   
                                   <td>
                                   <!-- <a href="<?= base_url().$folder.'/'.$morfaq->file?>" download>  <i class="fa fa-download fa-2x" aria-hidden="true" ></i> </a> -->
                                       <i class="fa fa-trash" style="cursor: pointer"
                                          onclick="delete_morfq(<?= $morfaq->id ?>,<?= $morfaq->mohma_id_fk ?>)"></i>
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
                url:"<?php echo base_url(); ?>human_resources/mohma/Mohma_c/add_morfaq", //base_url() return http://localhost/tutorial/codeigniter/
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
                     put_value(row);
                     $('#title').val('');
                     $('#file').val('');
                     swal("تم الحفظ بنجاح !");
                    
                    
                      //  get_details(row);
                      
                 }
             });
             

        }

    }
    }


</script>

<script>
    function put_value(rkm) {
        
   //     $('#hidden_rkm').val(rkm);
        $.ajax({
            type: 'post',
            data: {rkm: rkm},
            url: "<?php echo base_url();?>human_resources/mohma/Mohma_c/get_attaches",
           
            
            success: function (html) {
                    $("#result_files").html(html);
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
  confirmButtonText: "نعم!",
  cancelButtonText: "لا!",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm) {
  if (isConfirm) {
    $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>human_resources/mohma/Mohma_c/Delete_attach',
                data: {id: id},
                dataType: 'html',
                cache: false,
                beforeSend: function()
                {
                    swal({
    title: "جاري الحذف ... ",
    text: "",
    imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
    showConfirmButton: false,
    allowOutsideClick: false
});
                },
                success: function (html) {

                  
                    swal({
                        title: "تم الحذف!",
  
  
        }
        );
        put_value(row);

                }
            });
  } else {
    swal("تم الالغاء","", "error");
  }
});










    }
</script>