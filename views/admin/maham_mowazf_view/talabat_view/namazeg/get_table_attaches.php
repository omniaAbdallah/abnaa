
    <div class="col-xs-12 " id="result_files">
    


                     
    <input type="hidden" id="hidden_id" name="hidden_id" value="<?= $rkm; ?>">
     <input type="hidden" id="hidden_rkm" name="hidden_rkm" value="<?= $rkm; ?>">
                 
        
        <div class="col-md-4 col-sm-4 padding-4">
                          <label class="label"> المرفق</label>
         <input type="file" name="file[]" id="file"  class="form-control" data-validation="reuqired">
         </div>
         <!-- <button type="button" class="btn btn-success save"  style="padding: 6px 12px;"
                             onclick="upload_img(<?= $rkm; ?>)"
                              >حفظ
                     </button> -->
                     <div class="col-xs-2 text-center" style="margin-top: 29px;">
         
          <button type="button"
                        class="btn btn-labeled btn-success "  onclick="upload_img(<?= $rkm; ?>)"
                        style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                </button>
          
                </div>
                <br>
                <br>
    
    
                <?php
                        if (isset($one_data) && !empty($one_data)){
                            $x=1;
                            $image =  array('gif','Gif','ico','ICO','jpg','JPG','jpeg','JPEG','BNG','png','PNG','bmp','BMP');
                            $file= array('pdf','PDF','xls','xlsx',',doc','docx','txt');
                           
                                $folder ='uploads/human_resources/nmazg/nmazg_letter_attaches';
                            
                            ?>
                             <div class="col-xs-12 " >
                             <br>
                        <table id="" class="table  table-bordered table-striped table-hover">
                            <thead>
                              <tr class="greentd">
                                  <th>م</th>
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
                                   
                                
                                        
                                        <?php if (!empty($morfaq->file)) {
                                       // $url = base_url() . 'uploads/egtma3at/all_mehwr/' . $mehwar_morfaq;
                                       $url = base_url() . 'maham_mowazf/talabat/namazegs/Namazeg/read_file'.'/'. $morfaq->file;
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
                                  
                                        <i class="fa fa-trash" style="cursor: pointer"
                                           onclick="delete_morfq(<?= $morfaq->id ?>,<?= $morfaq->letter_rkm_fk ?>)"></i>
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
    
    <!-- yara -->
    
    <br>
    <!-- <div class="col-xs-12" >
    
    
                    
                        
                        </div> -->
               
<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>         
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
    
    
    
    
   
   