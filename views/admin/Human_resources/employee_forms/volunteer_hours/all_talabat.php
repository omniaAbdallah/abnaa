<?php 
/*
echo '<pre>';
print_r($records);*/
?>

<?php
if (isset($records) && !empty($records)) {
    ?>
    <div class="col-sm-12 no-padding ">

        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"> ساعات التطوع</h3>
            </div>
            <div class="panel-body">

                <!-----------------------------------------table------------------------------------->

                <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0"
                       width="100%">
                    <thead>
                    <tr class="greentd visible-md visible-lg">
                    <th>رقم الطلب</th>
                    <th>الرقم الوظيفي</th>
                    <th>إسم الموظف</th>
                    <th>نوع التطوع</th>
                    <th>الجهة/الإدارة</th>
                    <th>المسئول</th>
                    <th>طبيعه العمل التطوعى</th>
                    <th>المكان</th>
                    <th>من الساعة</th>
                    <th>إلي الساعة</th>
                    <th>المدة</th>
                        <th> الاجراء</th>
                     
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                    
                    
                   // $mostafed_type_arr = array(0 => 'داخلى', 1 => 'خارجى'); ?>

                    <?php
                    $x = 1;
                    foreach ($records as $row) {
                        
                        if($row->mostafed_type_fk == 0){
                         $mostafed_type_title = 'داخلى';
                         $mostafed_type_color = '#ffbf57';
                            
                        }elseif($row->mostafed_type_fk == 1){
                         $mostafed_type_title = 'خارجى';
                          $mostafed_type_color = '#ffa6a6';     
                        }else{
                           $mostafed_type_title = ''; 
                            $mostafed_type_color = '';  
                        }

                        if (isset($_POST['from_profile']) && (!empty($_POST['from_profile']))) {
                            $link_update = 'edit_Volunteer_hours(' . $row->id . ')';
                            $link_delete = 1;
                        } else {
                            $link_update = 'window.location="' . base_url() . 'human_resources/employee_forms/Volunteer_hours/edit_volunteer_hours/' . $row->id . '";';
                            $link_delete = 0;
                        }

                        if ($row->mostafed_type_fk == 1) {
                            $edara_geha = $row->title_setting;
                        } elseif ($row->mostafed_type_fk == 0) {
                            $edara_geha = $row->department_name;
                        }
                        ?>
                        <tr>
                            <td><?php echo $x; ?></td>
                            <td><?php echo $row->emp_code; ?></td>
                            <td><?php echo $row->employee; ?></td>
                            <td style="background: <?=$mostafed_type_color?>;"><?php echo $mostafed_type_title ?></td>
                            <td><?php echo $edara_geha; ?></td>
                           <td><?=$row->responsible?></td>
                            <td><?=$row->volunteer_description?></td>  
                       <td><?=$row->place?></td>
                        
                         
                           <td style="color: green;font-weight: bold;">
                         <?php 
                             $currentDateTime =$row->from_time;
                            $newDateTime = date('h:i A', strtotime($currentDateTime));
                            
                            
                            echo  $newDateTime; ?>
                        
                         
                         </td>
                         
                           <td style="color: red;font-weight: bold;">
                         <?php 
                             $tocurrentDateTime =$row->to_time;
                            $toDateTime = date('h:i A', strtotime($tocurrentDateTime));
                            
                            
                            echo  $toDateTime; ?>
                        
                         
                         </td>
                         <td style="background: #e691b8 !important;"><?php 
                            $to_time = strtotime("$row->from_time");
                            $from_time = strtotime("$row->to_time");
                            echo $time_diff =  round(abs($to_time - $from_time) / 60,2). " دقيقة ";
                                                        
                             ?></td>
                            <td>
                                <a data-toggle="modal" data-target="#details_Modal" class="btn btn-xs btn-info"
                                   style="padding:1px 5px;" onclick="load_page(<?= $row->id ?>);">
                                    <i class="fa fa-list "></i> </a>


                            
                            </td>
                         
                        </tr>
                        <?php $x++;
                    } ?>
                    </tbody>
                </table>


                <!--------------------------------------------table---------------------------------->


            </div>
        </div>

    </div>


<?php }else{ ?>
  <div class="alert alert-danger" role="alert">
 لا يوجد طلبات ساعات تطوع
</div>  
    
<?php } ?>

<!-- details_Modal -->

<div class="modal fade" id="details_Modal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onclick="$('#details_Modal').modal('hide')" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="text-align: center;">التفاصيل </h4>
            </div>
            <div class="modal-body" id="result_page">

            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">

                <button
                        type="button" onclick="Print_details(document.getElementById('volunter_id').value)"
                        class="btn btn-labeled btn-purple ">
                    <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعة
                </button>

                <button type="button" class="btn btn-labeled btn-danger " onclick="$('#details_Modal').modal('hide')">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>

            </div>

        </div>
    </div>
</div>


<!-- details_Modal -->


<!--------------------------------------------------------------->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->

<?php
if (isset($_POST['from_profile']) && (!empty($_POST['from_profile']))) { ?>
    <script src="<?php echo base_url() ?>asisst/admin_asset/js/jquery.form-validator.js"></script>
    <script>
        $('#example').DataTable({
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
                    exportOptions: {columns: ':visible'},
                    orientation: 'landscape'
                },
                'colvis'
            ],
            colReorder: true
        });
    </script>
<?php } ?>

<script>
    function load_page(row_id) {

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/Volunteer_hours/load_details",
            data: {row_id: row_id},
            success: function (d) {
                $('#result_page').html(d);

            }

        });

    }
</script>

<script>
    function Print_details(row_id) {
        var request = $.ajax({
            // print_resrv -- print_contract
            url: "<?=base_url() . 'human_resources/employee_forms/Volunteer_hours/Print_details'?>",
            type: "POST",
            data: {row_id: row_id},
        });
        request.done(function (msg) {
            var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(msg);
            WinPrint.document.close();
            WinPrint.focus();
            /*  WinPrint.print();
              WinPrint.close();*/
        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });
    }
</script>






