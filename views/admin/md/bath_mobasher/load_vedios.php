<!-- yara -->





				
                    <?php
                    if (isset($vedios) && !empty($vedios)){
                        $x=1;
                       
                        ?>
                    <table  id="example888" class="table example table-bordered table-striped table-hover">
                        <thead>
                          <tr class="greentd">
                              <th>م</th>
                            
                      
                              <th> الملف</th>
                            
                              <th>التاريخ</th>
                              <th>بواسطة</th>
                              <th>الاجراء</th>

                          </tr>
                        </thead>
                        <tbody >
                        <?php
                       // foreach ($vedio as $vedios){
                         
                            ?>
                            <tr>
                                <td><?= $x?></td>
                              
                  
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
                                                    <iframe width="800" height="500" src="https://www.youtube.com/embed/<?= $vedios->link;?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
                                       onclick="update_vedio(<?= $vedios->id ?>)"></i>
                                    <i class="fa fa-trash" style="cursor: pointer"
                                       onclick="delete_vedio(<?= $vedios->id ?>)"></i>
                                </td>
                            </tr>
                        <?php
                      //  }
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



<!-- yara -->