<style type="text/css">
    .print_forma {
        /*border:1px solid #73b300;*/
        padding: 15px;
    }
    .piece-box {
        margin-bottom: 12px;
        border: 1px solid #73b300;
        display: inline-block;
        width: 100%;
    }
    .piece-heading {
        background-color: #9bbb59;
        display: inline-block;
        float: right;
        width: 100%;
    }
    .piece-body {
        width: 100%;
        float: right;
    }
    .bordered-bottom {
        border-bottom: 4px solid #9bbb59 !important;
    }
    .piece-footer {
        display: inline-block;
        float: right;
        width: 100%;
        border-top: 1px solid #73b300;
    }
    .piece-heading h5 {
        margin: 4px 0;
    }
    .piece-box table {
        margin-bottom: 0
    }
    .piece-box table th,
    .piece-box table td {
        padding: 2px 2px !important;
    }
    h6 {
        font-size: 16px;
        margin-bottom: 3px;
        margin-top: 3px;
    }
    .print_forma table th {
        text-align: right;
    }
    .print_forma table tr th {
        vertical-align: middle;
    }
    .no-padding {
        padding: 0;
    }
    .header p {
        margin: 0;
    }
    .header img {
        height: 70px;
        width: 80px;
        margin: auto;
    }
    .main-title {
        /* display: table; */
        text-align: center;
        /* position: relative; */
        height: 120px;
        /* width: 40%; */
    }
    .main-title h4 {
        /* display: table-cell; */
        /* vertical-align: bottom; */
        text-align: center;
        width: 100%;
        margin: 0
    }
    .print_forma hr {
        border-top: 1px solid #73b300;
        margin-top: 7px;
        margin-bottom: 7px;
    }
    .no-border {
        border: 0 !important;
    }
    .gray_background {
        background-color: #eee;
    }
    @media print {
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    }
    .footer img {
        width: 100%;
        height: 120px;
    }
    @page {
        size: landscape;
        margin: 80px 0 0;
    }
    .open_green {
        background-color: #e6eed5;
    }
    .closed_green {
        background-color: #cdddac;
    }
    .table-bordered > thead > tr > th, .table-bordered > tbody > tr > th,
    .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td,
    .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > td {
        border: 1px solid #000000 !important;
        text-align: center;
        vertical-align: middle;
        font-size: 14px !important;
        padding: 2px;
    }
    .flip-mode {
        writing-mode: vertical-lr;
        text-orientation: mixed;
    }
    a {
        font-size: 14px;
        text-decoration: none !important;
        color: #000000 !important;
    }
</style>
<div class="col-sm-12 no-padding">
<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
             <div class="panel-heading">
                  <div class="panel-title"><h4> <?=$title?></h4></div>
              </div>
            <div class="panel-body">
        
            <?php
            ?>
            <?php
            //if (isset($all_data) && !empty($all_data)) {
                $x = 1;
                ?>
                <table class=" table table-bordered table-striped" style="table-layout: fixed">
                    <thead>
                    <tr class="open_green">
                    <th rowspan="3" style="width: 20px;">م</th>
                    <th rowspan="4" style="width: 140px;"> الهدف الاستراتيجي </th>
                    <th rowspan="3" style="width: 100px;" >فترة القياس</th>
                    
                    <th rowspan="3" style="width: 100px;" >مؤشرات الاداء الرئيسية  </th>
                    <th colspan="3" >إجمالي الخطة 2020		</th>
                    <th colspan="3" >الربع الأول 		</th>
                    <th colspan="3" >الربع الثاني			</th>
                    <th colspan="3" >  الربع الثالث</th>
                    <th colspan="3" >الربع الرابع</th>
                  
                </tr>
                    <tr>
                        
                       <!-- <th rowspan="2">أخرى</th>-->
                        <th rowspan="2">المستهدف</th>
                        <th rowspan="2">المحقق</th>
                        <th rowspan="2">نسبة التحقيق</th>
                        
                    
                        
                       <!-- <th rowspan="2">أخرى</th>-->
                        <th rowspan="2">المستهدف</th>
                        <th rowspan="2">المحقق</th>
                        <th rowspan="2">نسبة التحقيق</th>
                        
                  
                        
                       <!-- <th rowspan="2">أخرى</th>-->
                        <th rowspan="2">المستهدف</th>
                        <th rowspan="2">المحقق</th>
                        <th rowspan="2">نسبة التحقيق</th>
                        
                   
                        
                       <!-- <th rowspan="2">أخرى</th>-->
                        <th rowspan="2">المستهدف</th>
                        <th rowspan="2">المحقق</th>
                        <th rowspan="2">نسبة التحقيق</th>

                        <th rowspan="2">المستهدف</th>
                        <th rowspan="2">المحقق</th>
                        <th rowspan="2">نسبة التحقيق</th>
                        
                    </tr>
                   
                    
                    </thead>
                    <tbody>
                    <?php
                    foreach ($all_data->gwd_hdf_pln as $row) {
                        ?>
                        <tr>
                            <td><?= $x++; ?> </td>
                            <td><?= $all_data->gwd_strategy->name; ?> </td>
                            <td><?php
                            if(!empty($all_data->gwd_strategy->ftra_qyas)&&$all_data->gwd_strategy->ftra_qyas==1)
                            {
echo'ربع سنوي';
                            }
                            else  if(!empty($all_data->gwd_strategy->ftra_qyas)&&$all_data->gwd_strategy->ftra_qyas==2)
                            {
echo'نصف سنوي';
                            }
                            else  if(!empty($all_data->gwd_strategy->ftra_qyas)&&$all_data->gwd_strategy->ftra_qyas==3)
                            {
echo' سنوي';
                            }
                             
                             
                             ?> </td>
                             <td>
                             <?=$row->name;?>
                             </td>
<!-- total -->
<?php if(!empty($all_data->gwd_strategy->ftra_qyas)&&($all_data->gwd_strategy->ftra_qyas==1)&&!empty($all_data->gwd_programs)){?>
                             <td>
                             <?=$all_data->gwd_programs->total;?>
                             </td>
                             <td>
                             <?=$all_data->gwd_programs->total_achived;?>
                             </td>
                             <td>
                             <?php echo  round(($all_data->gwd_programs->total_achived/$all_data->gwd_programs->total)*100);?>
                            %
                             </td>
                             <?php }elseif(!empty($all_data->gwd_strategy->ftra_qyas)&&($all_data->gwd_strategy->ftra_qyas==2)&&!empty($all_data->gwd_programs)){?>
                                <td>
                             <?=$all_data->gwd_programs->part2+$all_data->gwd_programs->part4;?>
                             </td>
                             <td>
                             <?=$all_data->gwd_programs->part2_achived+$all_data->gwd_programs->part4_achived;?>
                             </td>
                             <td>
                             <?php echo  round(($all_data->gwd_programs->part2_achived+$all_data->gwd_programs->part4_achived/$all_data->gwd_programs->part2+$all_data->gwd_programs->part4)*100);?>
                            %
                             </td>
                             <?php }elseif(!empty($all_data->gwd_strategy->ftra_qyas)&&($all_data->gwd_strategy->ftra_qyas==3)&&!empty($all_data->gwd_programs)){?>
                                <td>
                             <?=$all_data->gwd_programs->part4;?>
                             </td>
                             <td>
                             <?=$all_data->gwd_programs->part4_achived;?>
                             </td>
                             <td>
                             <?php echo  round(($all_data->gwd_programs->part4_achived/$all_data->gwd_programs->part4)*100);?>
                            %
                             </td>
                             <?php }else{?>
                             <td>
                             </td>
                             <td>
                             </td>
                             <td>
                             </td>

                             <?php }?>

<!-- total -->
              <!-- num1 -->
              <td>
                             <?php
                             if(!empty( $all_data->gwd_programs->part1))
                             
                          echo   $all_data->gwd_programs->part1;?>
                             </td>
                             <td>
                             <?php
                             if(!empty( $all_data->gwd_programs->part1_achived))
                           echo  $all_data->gwd_programs->part1_achived;?>
                             </td>
                             <td>
                             <?php
                                if(!empty( $all_data->gwd_programs))
                             echo  round(($all_data->gwd_programs->part1_achived/$all_data->gwd_programs->part1)*100);?>
                           %
                             </td>
<!-- num1 -->   

              <!-- num2 -->
              <td>
                             <?php
                             if(!empty( $all_data->gwd_programs->part2))
                             echo $all_data->gwd_programs->part2;?>
                             </td>
                             <td>
                             <?php
                             if(!empty( $all_data->gwd_programs->part2_achived))
                             echo
                             
                             $all_data->gwd_programs->part2_achived;?>
                             </td>
                             <td>
                             
                             <?php 
                                if(!empty( $all_data->gwd_programs))
                             echo  round(($all_data->gwd_programs->part2_achived/$all_data->gwd_programs->part2)*100);?>
                             %
                             </td>
<!-- num2 -->  

    <!-- num3 -->
    <td>
                             <?php
                             if(!empty( $all_data->gwd_programs->part3))
                             echo
                             $all_data->gwd_programs->part3;?>
                             </td>
                             <td>
                             <?php
                              if(!empty( $all_data->gwd_programs->part3_achived))
                              echo
                             $all_data->gwd_programs->part3_achived;?>
                             </td>
                             <td>
                             <?php
                                if(!empty( $all_data->gwd_programs))
                             echo  round(($all_data->gwd_programs->part3_achived/$all_data->gwd_programs->part3)*100);?>
                             %
                            
                             </td>
<!-- num3 -->  

<!-- num4 -->
<td>
                             <?php
                              if(!empty( $all_data->gwd_programs->part4))
                              echo $all_data->gwd_programs->part4;?>
                             </td>
                             <td>
                             <?php if(!empty( $all_data->gwd_programs->part4_achived))
                             
                             echo $all_data->gwd_programs->part4_achived;?>
                             </td>
                             <td>
                             <?php 
                             if(!empty( $all_data->gwd_programs))
                             echo  round(($all_data->gwd_programs->part4_achived/$all_data->gwd_programs->part4)*100);?>
                             % </td>
<!-- num4 -->
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                    <tfoot class="open_green">
                   
                    </tfoot>
                </table>
                <?php
            //}
            ?>
        </div>
    </div>
</div>

