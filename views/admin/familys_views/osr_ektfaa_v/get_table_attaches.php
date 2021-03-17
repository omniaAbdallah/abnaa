<?php
                       if (isset($one_data) && !empty($one_data)){
                           $x=1;
                           $image =  array('gif','Gif','ico','ICO','jpg','JPG','jpeg','JPEG','BNG','png','PNG','bmp','BMP');
                         
                          
                               $folder ='uploads/family_attached/osr_ektfaa_mostndat';
                           
                           ?>
                       <table id="example888" class="table  table-bordered table-striped table-hover">
                           <thead>
                             <tr class="greentd">
                                 <th>م</th>
                               
                                 <th> الملف</th>
                                
                                 
                                 <th>الاجراء</th>
   
                             </tr>
                           </thead>
                           <tbody >
                           <?php
                           foreach ($one_data as $morfaq){
                               $ext = pathinfo($morfaq->file, PATHINFO_EXTENSION);
                              //  $Destination = 'uploads/archive/deals/1bec9894697603bd9a45630d73230be5.jpg';
   
                               $Destination = $folder .'/'.$morfaq->file;
                          
                               ?>
                               <tr>
                                   <td><?= $x++?></td>
                                   
                                  
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
                               }
                            else {
                               echo 'لا يوجد';
                           }
                           ?>
                                       <!--  -->
                                   </td>
                                   
                                   
                                   <td>
                                
                                       <i class="fa fa-trash" style="cursor: pointer"
                                          onclick="delete_morfq(<?= $morfaq->id ?>,<?= $morfaq->talb_id_fk ?>)"></i>
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




$('#example888').DataTable( {
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