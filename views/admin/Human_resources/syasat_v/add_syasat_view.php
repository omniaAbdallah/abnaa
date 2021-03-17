<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $title ?> </h3>
       
    </div>
    <div class="panel-body">
    <div class="col-xs-12 ">
    <div class="col-md-2 col-sm-4  padding-4">
                    <label class="label  "> الفئة </label>

                           <select name="f2a[]" id="f2a"  class="form-control">

                                        <option value="">إختر</option>

                                        <?php $arrx = array(1 => 'السياسات', 2 => 'اللوائح',3=>'إجراءت الجودة');
                                        foreach ($arrx as $key => $value) {
                                            $select = '';
 ?>

                                            <option value="<?php echo $key; ?>" <?= $select ?>> <?php echo $value; ?></option>

                                        <?php } ?>

                                    </select>
                </div>

                <div class="col-md-4 col-sm-4  padding-4">
                    <label class="label  "> الإدارة </label>

                           <select name="edara_id_fk[]" id="edara_id_fk"  class="form-control  ">

                                        <option value="">إختر</option>

                                        <?php
                                        foreach ($edarat as  $value) {
                                            $select = '';
 ?>

                                            <option value="<?php echo $value->id; ?>" <?= $select ?>> <?php echo $value->title; ?></option>

                                        <?php } ?>

                                    </select>
                </div>

 <div class="col-md-4 col-sm-4  padding-4">
                    <label class="label  "> عنوان الملف </label>
                    <input type="text"   name="title[]" id="title" 
                           class="form-control ">
                </div>
    
    <div class="col-md-2 col-sm-4 padding-4">
                      <label class="label"> الملف</label>
     <input type="file" name="file[]" id="file"  class="form-control " data-validation="reuqired">
     </div>
    
                 <div class="col-xs-12 text-center" style="margin-top: 29px;">
     
      <button type="button"
                    class="btn btn-labeled btn-success "  onclick="upload_img()"
                    style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
            </button>
      
            </div>
            <br>
            <br>

<div id="result_files">
            <?php
                    if (isset($one_data) && !empty($one_data)){
                        $x=1;
                        $image =  array('gif','Gif','ico','ICO','jpg','JPG','jpeg','JPEG','BNG','png','PNG','bmp','BMP');
                        $file= array('pdf','PDF','xls','xlsx',',doc','docx','txt');
                       
                            $folder ='uploads/human_resources/syasat';
                        
                        ?>
                    <table id="" class="example table  table-bordered table-striped table-hover">
                        <thead>
                          <tr class="greentd">
                              <th>م</th>
                              <th>الفئة</th>
                              <th>الادارة</th>
                              <th>عنوان الملف</th>
                              <th>نوع الملف</th>
                             
                              <th> الملف</th>
                              <th>الحجم</th>
                              
                              <th>الاجراء</th>

                          </tr>
                        </thead>
                        <tbody >
                        <?php
                        foreach ($one_data as $morfaq){
                            $ext = pathinfo($morfaq->file, PATHINFO_EXTENSION);
                           

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
                                <td> <?php $arrx = array(1 => 'السياسات', 2 => 'اللوائح',3=>'إجراءت الجودة');
                                        foreach ($arrx as $key => $value) {
                                          if($morfaq->f2a==$key)
                                          {
                                              echo $value;
                                          }
                                        }?>

                                            </td>
                                <td><?php 
                                        foreach ($edarat as $valuee) {
                                          if($morfaq->edara_id_fk==$valuee->id)
                                          {
                                              echo $valuee->title;
                                          }
                                        }?></td>

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
                                    if (in_array($ext,$image)){?>
                                    <i class="fa fa-picture-o" aria-hidden="true" style="color: #d93bff;"></i>
                                   <?php } elseif (in_array($ext,$file)&&($ext=='pdf'||$ext=='PDF')){?>
                                    <i class="fa fa-file-pdf-o" aria-hidden="true" style="color: red;"></i>

<?php } elseif (in_array($ext,$file)&&($ext=='doc'||$ext=='docx')){?>
    <i class="fa fa-file-word-o" aria-hidden="true" style="color: blue;"></i>
                                  <?php  }
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
                               
                             
                                    
                                    <?php if (!empty($morfaq->file) &&($ext=='pdf'||$ext=='PDF')) {
                                 
                                   $url = base_url() .  'human_resources/syasat_c/Sysat/read_file/'. $morfaq->file;
                                   ?>
                                    <a target="_blank" onclick="show_bdf('<?= $url ?>')">
                                    <i class=" fa fa-eye"></i>
                                </a>
                                   <?php
                                }else {
                                    $url = base_url('asisst/fav/apple-icon-120x120.png');
                                } ?>

                                

<?php
 if(!empty($morfaq->file) &&($ext=='doc'||$ext=='docx')){?>
    <a href="<?= base_url().'human_resources/syasat_c/Sysat/download_file'.'/'.$morfaq->id?>" >  <i class="fa fa-download fa-2x" aria-hidden="true" ></i> </a>
<?php }
?>
                                   
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
 
  
  
</div>

    </div>
</div>


<script>




$('#example88').DataTable( {
    dom: 'Bfrtip',
    buttons: [
        'pageLength',
        'copy',
        'csv',
        'excelHtml5',
        {
            extend: "pdfHtml5",
            orientation: 'landscape'
        },

        {
            extend: 'print',
            exportOptions: { columns: ':visible'},
            orientation: 'landscape'
        },
        'colvis'
    ],
    colReorder: true
} );



</script>

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

    function  upload_img()
    {


        var files = $('#file')[0].files;
        var title = $('#title').val();
        var f2a = $('#f2a').val();
        var edara_id_fk = $('#edara_id_fk').val();
      
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
        else if(title==''&&f2a==''&&edara_id_fk==''){
            swal({
    title: " برجاء ادخال    البيانات ! ",
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
                form_data.append("f2a",f2a );
                form_data.append("edara_id_fk",edara_id_fk );
      
            }
        }
        if(error == '') {




            $.ajax({
                url:"<?php echo base_url(); ?>human_resources/syasat_c/Sysat/add_morfaq", //base_url() return http://localhost/tutorial/codeigniter/
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
                
                     put_value();
                     $('#title').val('');
                     $('#f2a').val('');
                     $('#edara_id_fk').val('');
                     $('#file').val('');
                     swal("تم الحفظ بنجاح !");
                    
                    
                     
                      
                 }
             });
             

        }

    }
    }


</script>

<script>
    function put_value() {
        $.ajax({
            type: 'post',
           
            url: "<?php echo base_url();?>human_resources/syasat_c/Sysat/get_attaches",
           
            
            success: function (html) {
                    $("#result_files").html(html);
                }

        });
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
                url: '<?php echo base_url() ?>human_resources/syasat_c/Sysat/Delete_attach',
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
        put_value();

                }
            });
  } else {
    swal("تم الالغاء","", "error");
  }
});










    }
</script>