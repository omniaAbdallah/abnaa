<style type="text/css">
    .print_forma{
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
    .bordered-bottom{
        border-bottom: 4px solid #9bbb59 !important;
    }
    .piece-footer{
        display: inline-block;
        float: right;
        width: 100%;
        border-top: 1px solid #73b300;
    }
    .piece-heading h5 {
        margin: 4px 0;
    }
    .piece-box table{
        margin-bottom: 0
    }
    .piece-box table th,
    .piece-box table td
    {
        padding: 2px 2px !important;
    }
    h6 {
        font-size: 16px;
        margin-bottom: 3px;
        margin-top: 3px;
    }
    .print_forma table th{
        text-align: right;
    }
    .print_forma table tr th{
        vertical-align: middle;
    }
    .no-padding{
        padding: 0;
    }
    .header p{
        margin: 0;
    }
    .header img{
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
    .print_forma hr{
        border-top: 1px solid #73b300;
        margin-top: 7px;
        margin-bottom: 7px;
    }
    .no-border{
        border:0 !important;
    }
    .gray_background{
        background-color: #eee;
    }
    @media print{
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    }
    .footer img{
        width: 100%;
        height: 120px;
    }
    @page {
        size: landscape;
        margin: 80px 0 0;
    }
    .open_green{
        background-color: #e6eed5;
    }
    .closed_green{
        background-color: #cdddac;
    }
    .table-bordered>thead>tr>th, .table-bordered>tbody>tr>th,
    .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td,
    .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
        border: 1px solid #000000 !important;
        text-align: center;
        vertical-align: middle;
        font-size: 14px !important;
        padding: 2px;
    }
    .flip-mode{
        writing-mode: vertical-lr;
        text-orientation: mixed;
    }
</style>
            <?php 
            if (isset($all_mosayer_data) && !empty($all_mosayer_data)){ 
                $x=1;
                ?> 
            <table class="table table-bordered table-striped" style="table-layout: fixed">
                <thead>
                <tr class="open_green">
                    <th rowspan="3" style="width: 20px;">م</th>
                    <th rowspan="3" style="width: 140px;">اســــــــــــــــــم الموظف</th>
                    <th rowspan="3" style="width: 100px;" ><span class="flip-mode">الوظيفة</span></th>
                    <th colspan="10" >الأستحقاقات</th>
                    <th rowspan="3" ><span class="flip-mode">إجمالي الأستحقاقات</span></th>
                    <th colspan="6" >الإستقطاعات	</th>
                    <th rowspan="3" ><span class="flip-mode"> إجمالي الإستقطاعات </span></th>
                    <th rowspan="3" ><span class="flip-mode">صافي المرتب </span></th>
                  
                </tr>
                <tr>
                    <th colspan="8" >الرواتب والأجور	</th>
                    <th colspan="2">مزايا وحوافز	</th>
                   <!-- <th rowspan="2">أخرى </th>-->
                     <th rowspan="2">غياب	</th>
                     <th rowspan="2">إجازة بدون راتب</th>
                      <th rowspan="2">تأخير	</th>
                       <th rowspan="2">جزاءات	</th>
                     <th rowspan="2">التأمينات	</th>
                     <th rowspan="2">السلف	</th>
                     <!-- <th rowspan="2">أخرى </th>-->
                </tr>
                <tr>
                <th> <span class="">راتب أساسي</span></th>
                <th> <span class="">بدل سكن</span></th>
                <th> <span class="">بدل مواصلات	</span></th>
                 <th> <span class="">بدل إتصال	</span></th>
                   <th> <span class="">بدل إعاشة	</span></th>
                <th> <span class="">بدل طبيعة عمل	</span></th>
                <th> <span class="">العمل الإضافي	</span></th>
                <th> <span class="">بدل تكليف	</span></th>
                    <th>مكافآت </th>
                    <th>بدل الإنتداب</th>
                </thead>
                <tbody>
                <?php
  foreach ($all_mosayer_data as $emp){
   ?>
        <tr>
                <td><?= $x++;?> </td>
                <!--<td><?= $emp->emp_name?></td>-->
                <td><span  style="font-size: 14px; color: black; font-weight: bold;  !important;"  
                data-toggle="tooltip" data-placement="bottom" title="<?= $emp->emp_name ?>">
               <?=character_limiter($emp->emp_name,14)?>
               </span></td>
              <!--  <td><?= $emp->mosma_wazefy_n?></td>-->
                <td><span  style="font-size: 14px; color: black; font-weight: bold;  !important;"  
                data-toggle="tooltip" data-placement="bottom" title="<?= $emp->mosma_wazefy_n ?>">
               <?=character_limiter($emp->mosma_wazefy_n,6)?>
               </span></td>
                <td><?= $emp->rateb_asasy?></td>
                <td><?= $emp->badal_sakn?></td>
                <td><?= $emp->badal_mowaslat?></td>
                 <td><?= $emp->badal_etsal?></td>
                <td><?= $emp->badal_e3asha?></td>
                <td><?= $emp->badal_tabe3a_amal?></td>
                 <td><?= $emp->tot_edafi?></td>
                <td><?= $emp->badal_taklef?></td>
                <td><?= $emp->tot_mokafaa?></td>
                <td><?= $emp->tot_entdab?></td>
                <!--  <td><?= $emp->tot_okraa_esthkaq?></td>-->
                <td style="background: #e6eed5;"><?= $emp->total_esthkak?></td>
                 <td><?= $emp->khasm_keyab?></td>
                 <td><?= $emp->agaza_bdon_rateb?></td>
                  <td><?= $emp->khasm_takher?></td>
                  <td><?= $emp->khasm_gezaa?></td>
                <td><?= $emp->khasm_tamen?></td>
                <td><?= $emp->khasm_solaf?></td>
                <!-- <td><?= $emp->tot_okraa_khasm?> </td>-->
                <td style="background: #e6eed5;"><?= $emp->total_khsomat?></td>
                <td style="background: #e6eed5;"><?= ($emp->safi)?> </td>
              
</tr>
                <?php
                }
                ?>
                </tbody>
            </table>
                <?php
            }
            ?>