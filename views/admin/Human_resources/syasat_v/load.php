<?php
                    if (isset($one_data) && !empty($one_data)){
                        $x=1;
                        $image =  array('gif','Gif','ico','ICO','jpg','JPG','jpeg','JPEG','BNG','png','PNG','bmp','BMP');
                        $file= array('pdf','PDF','xls','xlsx',',doc','docx','txt');
                       
                            $folder ='uploads/human_resources/syasat';
                        
                        ?>
                    <table id="example88" class=" table  table-bordered table-striped table-hover">
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
