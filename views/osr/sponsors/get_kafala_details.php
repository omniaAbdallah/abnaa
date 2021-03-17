
<?php


if(!empty($all_data)){ ?>

    <table class="table table-striped table-bordered  " style="table-layout: fixed;" >
        <thead>
        <tr class="info">
            <th style="text-align:center;">م</th>

            <th  style="text-align:center;">نوع الكفالة</th>
            <th  style="text-align:center;">قيمة الكفالة</th>
            <th  style="text-align:center;"> تاريخ بداية الكفالة</th>
            <th  style="text-align:center;"> تاريخ نهاية الكفالة</th>
            <th  style="text-align:center;"> مدة الكفالة</th>
            
            <th  style="text-align:center;">حالة الكفالة</th>
            <th  style="text-align:center;">طريقة التوريد</th>
            <th  style="text-align:center;">المدة المتبقية</th>
            <th  style="text-align:center;" >مدة السماح</th>
        </tr>
        </thead>

        <tbody>
        <?php
        $counter =1;
            foreach ($all_data as $row_detail){
                
                    if( $row_detail->first_status == 1){
                            $halet_kafala_first = 'منتظم' ;
                            $halet_kafala_color_first= '#00ff00' ;
                        }elseif( $row_detail->first_status == 2){
                          $halet_kafala_first = 'موقوف' ;   
                          $halet_kafala_color_first = '#ef2832' ;
                        }else{
                            $halet_kafala_first = 'غير محدد' ;  
                            $halet_kafala_color_first = '#e8e8e8' ; 
                        }
                if($row_detail->first_status == 1){
                    $kafala_color_row  = '';
                }elseif( $row_detail->first_status == 2){
                    $kafala_color_row  = '#fd4d4d';
                }else{
                    $kafala_color_row  = ' ';
                }
                
                
?>
                    <tr >
                        <td style="text-align:center;"><?php echo$counter?></td>


                        <td style="text-align:center;"><?php echo$row_detail->kafala_name;?></td>
                        <td style="text-align:center;"><?php echo$row_detail->first_value;?></td>
                        <td style="text-align:center;"><?php 
                           
                           $row_detail->first_date_from_ar = explode('/',$row_detail->first_date_from_ar)[2] . '/' . explode('/',$row_detail->first_date_from_ar)[0] . '/' . explode('/',$row_detail->first_date_from_ar)[1];
                            echo $row_detail->first_date_from_ar;
                            ?></td>
                        <td style="text-align:center;"><?php
                           $row_detail->first_date_to_ar= explode('/', $row_detail->first_date_to_ar)[2] . '/' . explode('/', $row_detail->first_date_to_ar)[0] . '/' . explode('/', $row_detail->first_date_to_ar)[1];

                            echo $row_detail->first_date_to_ar;
                            ?></td>
                        <td>
                            <?php
                            if (isset($row_detail->kafala_period) and $row_detail->kafala_period != null) {
                                echo $row_detail->kafala_period . 'شهر ';
                            }
                            ?>
                        </td>
                        <td style="text-align:center;background-color: <?php echo $halet_kafala_color_first;?>">
                        <?php echo $halet_kafala_first;?></td>
                        <td style="text-align:center;"><?php echo$row_detail->tawred_type;?></td>
                        <td style="background-color:<?php echo $kafala_color_row; ?>;">
                            <?php
                            $startDate = strtotime("now");
                            $endDate = $row_detail->first_date_to;
                            $seconds_left = ($endDate - $startDate);
                            $days_left = floor($seconds_left / 3600 / 24);
                            //echo $days_left;
                            if($days_left >= 0){
                                $class_days_left = 'success';
                            }elseif($days_left < 0){
                                $class_days_left = 'danger';
                            }


                            ?>


                            <?php
                            if($row_detail->first_status == 1){ ?>
                                <button style="padding: 0px 10px !important;" type="button" class="btn btn-sm btn-<?php echo $class_days_left; ?> btn-rounded">
                                    <i style="color: white;" class="fa fa-cog fa-spin"></i>
                                    <?php echo $days_left;
                                    ?> &nbsp;  أيام   </button>
                            <?php }elseif( $row_detail->first_status == 2){
                                echo 'الكفالة موقوفة';
                                ?>
                            <?php }else{

                            }
                            ?>





                        </td>
                        <!---------------------------------->
                        <td style="background-color:<?php echo $kafala_color_row; ?>;">

                            <?php if(!empty($row_detail->days_num)){
                                $days_num =   $row_detail->days_num;
                                $days_num_class = 'success';
                            }else{
                                $days_num =  0;
                                $days_num_class = 'danger';

                            } ?>




                            <?php
                            if($row_detail->first_status == 1){ ?>
                                <button style="padding: 0px 10px !important;" type="button" class="btn  btn-sm  btn-<?php echo $days_num_class;  ?> btn-rounded " id="days_button" data-toggle="modal" data-target="#myModals<?php echo $row_detail->id;?>">
                                    <i style="color: white;" class="fa fa-cog fa-spin"></i>
                                    <?php echo $days_num .' يوم '; ?>

                                </button>
                            <?php }elseif( $row_detail->first_status == 2){
                                echo 'الكفالة موقوفة';
                                ?>
                            <?php }else{

                            }
                            ?>



                        </td>

                    </tr>
                    <?php $counter++;  }
            if(isset($all_data_second) && !empty($all_data_second))
            {/*
                echo '<pre>';
             print_r($all_data_second);*/
                foreach ($all_data_second as $row_detail_2){
                    
                     if( $row_detail_2->first_status == 1){
                            $halet_kafala_second = 'منتظم' ;
                            $halet_kafala_color_second = '#00ff00' ;
                        }elseif( $row_detail_2->first_status == 2){
                          $halet_kafala_second = 'موقوف' ;   
                          $halet_kafala_color_second = '#ef2832' ;
                        }else{
                            $halet_kafala_second = 'غير محدد' ;  
                            $halet_kafala_color_second = '#e8e8e8' ; 
                        }
                        
                    
                    ?>
                    <tr >
                        <td style="text-align:center;"><?php echo$counter?></td>
                        <td style="text-align:center;"><?php echo $row_detail_2->kafala_name;?></td>
                        <td style="text-align:center;"><?php echo $row_detail_2->first_value;?></td>
                        <td style="text-align:center;"><?php

                            $row_detail_2->first_date_from_ar = explode('/',$row_detail_2->first_date_from_ar)[2] . '/' . explode('/',$row_detail_2->first_date_from_ar)[0] . '/' . explode('/',$row_detail_2->first_date_from_ar)[1];
                            echo $row_detail_2->first_date_from_ar;
                            ?></td>
                        <td style="text-align:center;"><?php
                            $row_detail_2->first_date_to_ar= explode('/', $row_detail_2->first_date_to_ar)[2] . '/' . explode('/', $row_detail_2->first_date_to_ar)[0] . '/' . explode('/', $row_detail_2->first_date_to_ar)[1];

                            echo $row_detail_2->first_date_to_ar;
                            ?></td>


                        <td>
                            <?php
                            if (isset($row_detail_2->kafala_period) and $row_detail_2->kafala_period != null) {
                                echo $row_detail_2->kafala_period . 'شهر ';
                            }
                            ?>
                        </td>
                        <td style="text-align:center;background-color: <?php echo $halet_kafala_color_second;?>;">
                        <?php echo $halet_kafala_second;?>
                        </td>

                        <td style="text-align:center;"><?php  echo $row_detail_2->tawred_type;;?></td>
                        <td style="background-color:<?php echo $kafala_color_row; ?>;">
                            <?php
                            $startDate = strtotime("now");
                            $endDate = $row_detail_2->first_date_to;
                            $seconds_left = ($endDate - $startDate);
                            $days_left = floor($seconds_left / 3600 / 24);
                            //echo $days_left;

                            if($days_left >= 0){
                                $class_days_left = 'success';
                            }elseif($days_left < 0){
                                $class_days_left = 'danger';
                            }


                            ?>


                            <?php
                            if($row_detail_2->first_status == 1){ ?>
                                <button style="padding: 0px 10px !important;" type="button" class="btn btn-sm btn-<?php echo $class_days_left; ?> btn-rounded">
                                    <i style="color: white;" class="fa fa-cog fa-spin"></i>
                                    <?php echo $days_left;
                                    ?> &nbsp;  أيام   </button>
                            <?php }elseif( $row_detail_2->first_status == 2){
                                echo 'الكفالة موقوفة';
                                ?>
                            <?php }else{

                            }
                            ?>


                        </td>
                        <!---------------------------------->
                        <td style="background-color:<?php echo $kafala_color_row; ?>;">

                            <?php if(!empty($row_detail_2->days_num)){
                                $days_num =   $row_detail_2->days_num;
                                $days_num_class = 'success';
                            }else{
                                $days_num =  0;
                                $days_num_class = 'danger';

                            } ?>




                            <?php
                            if($row_detail_2->first_status == 1){ ?>
                                <button style="padding: 0px 10px !important;" type="button" class="btn  btn-sm  btn-<?php echo $days_num_class;  ?> btn-rounded " id="days_button" data-toggle="modal" data-target="#myModals<?php echo $row_detail_2->id;?>">
                                    <i style="color: white;" class="fa fa-cog fa-spin"></i>
                                    <?php echo $days_num .' يوم '; ?>

                                </button>
                            <?php }elseif( $row_detail_2->first_status == 2){
                                echo 'الكفالة موقوفة';
                                ?>
                            <?php }else{

                            }
                            ?>



                        </td>

                    </tr>
                    <?php $counter++;  }
            }
            ?>

        </tbody>
    </table>

    <?php }else{ ?>
<div class="alert alert-danger"> لا توجد كفالات !!!!</div>

<?php } ?>




<script>

    var table2= $('.example').DataTable( {
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
        colReorder: true,
        retrieve: true
    } );
</script>