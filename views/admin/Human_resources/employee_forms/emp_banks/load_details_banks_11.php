<div id="show_details_banks">
                    <?php
                        if (isset($allData_added)&&!empty($allData_added)) {
                
                    ?>
                    <table id="banks" class=" display table table-bordered responsive nowrap text-center" id="banktable"
                           cellspacing="0"
                           width="100%">
                        <thead>
                        <tr class="greentd">
                        </tr>
                        <tr class="greentd">
						
                            <th>م   </th>
                            <th>رقم الطلب </th>
                            <th> تاريخ الطلب </th>
                            <th>إسم الموظف </th>
							<th>المسمي الوظيفي</th>
							<th>الاداره </th>
							<th>القسم </th>
                            <th>صوره الحساب</th>
                                <th>الاجراء</th>
                          
                        </tr>
                        </thead>
                        <tbody>
                        <?php
						$x=0;
                        foreach ($allData_added as  $value) {
						$x++;
                            ?>
                            <tr><td>
                                    <?= $x ?>
                             </td>
                            
                                <td>
                               <?= $value->rkm ?>
                                </td>
                                <td>
                               <?= $value->order_date ?>
                                </td>
                                <td>
                                    <?= $value->new_emp_bank_name ?>
                                </td>
                                <td>
                                <?= $value->mosma_wazefy_n ?>
                                </td>
								<td>
                                <?= $value->edara_n ?>
                                </td>
								<td>
                                <?= $value->qsm_n ?>
                                </td>
								
								
                                <td>
                                    <a data-toggle="modal" type="button" style="cursor: pointer"
                                       data-target="#modal-img<?php echo $value->id; ?>">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <!--  -->
                                    <div class="modal fade" id="modal-img<?php echo $value->id; ?>" tabindex="-1"
                                         role="dialog"
                                         aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close"><span
                                                                aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel"></h4>
                                                </div>
                                                <div class="modal-body">
                                                    <?php if ($value->new_bank_image === 0) { ?>
                                                        <img src="<?php echo base_url(); ?>asisst/web_asset/img/logo.png"
                                                             width="100%" height="">
                                                    <?php } else { ?>
                                                        <img src="<?php echo base_url(); ?>uploads/human_resources/emp_banks/<?php echo $value->new_bank_image; ?>"
                                                             width="100%" height="">
                                                    <?php } ?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" style="float: left"
                                                            data-dismiss="modal">إغلاق
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--  -->
                                </td>
                               
                                <td>

                               
<!-- yarraa -->

                                
                                     

                                    <!-- <button data-toggle="modal" type="button" style="cursor: pointer"
                                       onclick="add_morfq(<?php echo $value->id; ?>);"
                                       data-target="#modal-morfq"
                                       class="btn btn-sm btn-info"
                                       >
                                         المرفق
                                    </button> -->
                                    
                                    <div id="send_all">
<?php if( $value->suspend==0){
    ?>
                                <!-- <button class="btn btn-info" 
                                   onclick="send_all( <?= $value->id; ?>,<?=$value->emp_id?>)">
                                   اعتماد الطلب </button> -->
<?php }else if( $value->suspend==4){?>
   <span style="font-size: medium;background: green;" class="badge badge-warning" >تم  الاعتماد </span>
 <?php } ?>
   

</div>
<a onclick="print_eqrar(<?= $value->id ?>)"><i
                                            class="fa fa-print"></i></a>
    <a data-toggle="modal" 
                                       onclick="edite_bank(<?php echo $value->id; ?>);"
                                       data-target="#modal-info"
                                     
                                       >
                                       <i class="fa fa-pencil"> </i></a>   
                                    
                                    <a onclick='deleteFinanceEmp(<?php echo $value->id; ?>,<?php echo $value->emp_id; ?>)
                                            '><i class="fa fa-trash"
                                                 aria-hidden="true"></i>
                                    </a>
                                
<!-- yarraaa -->

                                </td>
                            </tr>
							 <?php
                        }
                        }
                        ?>
                        </tbody>
                      
                    </table>
					<!-- yarraaaa -->
                </div>
                <script>




$('#banks').DataTable( {
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