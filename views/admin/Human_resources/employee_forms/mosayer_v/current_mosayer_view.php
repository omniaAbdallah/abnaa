<style type="text/css">
  .print_forma{
       
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

        text-align: center;

        height: 120px;
 
    }
    .main-title h4 {

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
        font-size: 11px !important;
        padding: 2px;
    }
    .flip-mode{
        writing-mode: vertical-lr;
        text-orientation: mixed;
    }
    
</style>




<div class="col-md-12">
            <div class="panel with-nav-tabs panel-default">
                <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1default" data-toggle="tab">مسير موظفي تبادل</a></li>
                            <li><a href="#tab2default" data-toggle="tab">مسير موظفي الشيكات</a></li>
                
                        
                        </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1default">
                        
                                    <?php 
            if (isset($all_mosayer_data_tabadol) && !empty($all_mosayer_data_tabadol)){ 
                $x=1;
                ?> 
            <table class="table table-bordered table-striped" style="table-layout: fixed">
                <thead>
                <tr class="open_green">
                    <th rowspan="3" style="width: 20px;">م</th>
                    <th rowspan="3" style="width: 140px;">اســــــــــــــــــم الموظف</th>
                    <th rowspan="3" style="width: 100px;" ><span class="flip-mode">الوظيفة</span></th>
                    <th colspan="11" >الأستحقاقات</th>
                    <th rowspan="3" ><span class="flip-mode">إجمالي الأستحقاقات</span></th>
                    <th colspan="7" >الإستقطاعات	</th>
                    <th rowspan="3" ><span class="flip-mode">الإستقطاعات إجمالي </span></th>
                    <th rowspan="3" ><span class="flip-mode">المرتب صافى </span></th>
                    <th rowspan="3" >ملاحظات</th>
                </tr>
                <tr>
                    <th colspan="8" >الرواتب والأجور	</th>
                    <th colspan="2">مزايا وحوافز	</th>
                    <th rowspan="2">أخرى </th>
                     <th rowspan="2">غياب	</th>
                     <th rowspan="2">إجازة بدون راتب</th>
                      <th rowspan="2">تأخير	</th>
                       <th rowspan="2">جزاءات	</th>
                     <th rowspan="2">التأمينات	</th>
                     <th rowspan="2">السلف	</th>
                    <th rowspan="2">أخرى </th>
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
  foreach ($all_mosayer_data_tabadol as $tbadol_emp){
   ?>
        <tr>
                <td><?= $x++;?> </td>
                <!--<td><?= $tbadol_emp->emp_name?></td>-->
                <td><span  style="font-size: 11px; color: black; font-weight: bold;  !important;"  
                data-toggle="tooltip" data-placement="bottom" title="<?= $tbadol_emp->emp_name ?>">
               <?=character_limiter($tbadol_emp->emp_name,18)?>
               </span></td>
              <!--  <td><?= $tbadol_emp->mosma_wazefy_n?></td>-->
                <td><span  style="font-size: 11px; color: black; font-weight: bold;  !important;"  
                data-toggle="tooltip" data-placement="bottom" title="<?= $tbadol_emp->mosma_wazefy_n ?>">
               <?=character_limiter($tbadol_emp->mosma_wazefy_n,12)?>
               </span></td>
                <td><?= $tbadol_emp->rateb_asasy?></td>
                <td><?= $tbadol_emp->badal_sakn?></td>
                <td><?= $tbadol_emp->badal_mowaslat?></td>
                 <td><?= $tbadol_emp->badal_etsal?></td>
                <td><?= $tbadol_emp->badal_e3asha?></td>
                <td><?= $tbadol_emp->badal_tabe3a_amal?></td>
                 <td><?= $tbadol_emp->tot_edafi?></td>
                <td><?= $tbadol_emp->badal_taklef?></td>
                <td><?= $tbadol_emp->tot_mokafaa?></td>
                <td><?= $tbadol_emp->tot_entdab?></td>
                <td><?= $tbadol_emp->tot_okraa_esthkaq?></td>
                <td style="background: #e6eed5;"><?= $tbadol_emp->total_esthkak?></td>
                 <td><?= $tbadol_emp->khasm_keyab?></td>
                 <td><?= $tbadol_emp->agaza_bdon_rateb?></td>
                  <td><?= $tbadol_emp->khasm_takher?></td>
                  <td><?= $tbadol_emp->khasm_gezaa?></td>
                <td><?= $tbadol_emp->khasm_tamen?></td>
                <td><?= $tbadol_emp->khasm_solaf?></td>
                <td><?= $tbadol_emp->tot_okraa_khasm?> </td>
                <td style="background: #e6eed5;"><?= $tbadol_emp->total_khsomat?></td>
                <td style="background: #e6eed5;"><?= ($tbadol_emp->safi)?> </td>
                <td>notes </td>
</tr>
                <?php
                }
                ?>
                </tbody>
                <tfoot class="open_green">
                <tr>
                    <th colspan="3">الإجمالى</th>
                      <th>0</th>
                     <th>0</th>
                      <th>0</th>
                       <th>0</th>
                     <th>0</th>
                     <th>0</th>
                     <th>0</th>
                 <th>0</th>
                     <th>0</th>
                <th>0</th>
                    <th>0</th>
             <th>0</th>
                   <th>0</th>
                   <th>0</th>
                    <th>0</th>
                    <th>0</th>
                     <th>0</th>
                   <th>0</th>
                    <th>0</th>
                    <th>0</th>
                    <th>0</th>
                     <th>--</th>
                </tr>
                </tfoot>
            </table>
                <?php
            }
            ?>
                        
                        
                        
                        </div>
                        <div class="tab-pane fade" id="tab2default">
                        
                        
                              
                                            <?php 
                                            
                                        //    print_r($all_mosayer_data_sheeks);
            if (isset($all_mosayer_data_sheeks) && !empty($all_mosayer_data_sheeks)){ 
                $x=1;
                ?> 
            <table class="table table-bordered table-striped" style="table-layout: fixed">
                <thead>
                <tr class="open_green">
                    <th rowspan="3" style="width: 20px;">م</th>
                    <th rowspan="3" style="width: 140px;">اســــــــــــــــــم الموظف</th>
                    <th rowspan="3" style="width: 100px;" ><span class="flip-mode">الوظيفة</span></th>
                    <th colspan="11" >الأستحقاقات</th>
                    <th rowspan="3" ><span class="flip-mode">إجمالي الأستحقاقات</span></th>
                    <th colspan="7" >الإستقطاعات	</th>
                    <th rowspan="3" ><span class="flip-mode">الإستقطاعات إجمالي </span></th>
                    <th rowspan="3" ><span class="flip-mode">المرتب صافى </span></th>
                    <th rowspan="3" >ملاحظات</th>
                </tr>
                <tr>
                    <th colspan="8" >الرواتب والأجور	</th>
                    <th colspan="2">مزايا وحوافز	</th>
                    <th rowspan="2">أخرى </th>
                     <th rowspan="2">غياب	</th>
                     <th rowspan="2">إجازة بدون راتب</th>
                      <th rowspan="2">تأخير	</th>
                       <th rowspan="2">جزاءات	</th>
                     <th rowspan="2">التأمينات	</th>
                     <th rowspan="2">السلف	</th>
                    <th rowspan="2">أخرى </th>
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
  foreach ($all_mosayer_data_sheeks as $sheek_emp){
   ?>
        <tr>
                <td><?= $x++;?> </td>
                <!--<td><?= $sheek_emp->emp_name?></td>-->
                <td><span  style="font-size: 11px; color: black; font-weight: bold;  !important;"  
                data-toggle="tooltip" data-placement="bottom" title="<?= $sheek_emp->emp_name ?>">
               <?=character_limiter($sheek_emp->emp_name,18)?>
               </span></td>
              <!--  <td><?= $sheek_emp->mosma_wazefy_n?></td>-->
                <td><span  style="font-size: 11px; color: black; font-weight: bold;  !important;"  
                data-toggle="tooltip" data-placement="bottom" title="<?= $sheek_emp->mosma_wazefy_n ?>">
               <?=character_limiter($sheek_emp->mosma_wazefy_n,12)?>
               </span></td>
                <td><?= $sheek_emp->rateb_asasy?></td>
                <td><?= $sheek_emp->badal_sakn?></td>
                <td><?= $sheek_emp->badal_mowaslat?></td>
                 <td><?= $sheek_emp->badal_etsal?></td>
                <td><?= $sheek_emp->badal_e3asha?></td>
                <td><?= $sheek_emp->badal_tabe3a_amal?></td>
                 <td><?= $sheek_emp->tot_edafi?></td>
                <td><?= $sheek_emp->badal_taklef?></td>
                <td><?= $sheek_emp->tot_mokafaa?></td>
                <td><?= $sheek_emp->tot_entdab?></td>
                <td><?= $sheek_emp->tot_okraa_esthkaq?></td>
                <td style="background: #e6eed5;"><?= $sheek_emp->total_esthkak?></td>
                 <td><?= $sheek_emp->khasm_keyab?></td>
                 <td><?= $sheek_emp->agaza_bdon_rateb?></td>
                  <td><?= $sheek_emp->khasm_takher?></td>
                  <td><?= $sheek_emp->khasm_gezaa?></td>
                <td><?= $sheek_emp->khasm_tamen?></td>
                <td><?= $sheek_emp->khasm_solaf?></td>
                <td><?= $sheek_emp->tot_okraa_khasm?> </td>
                <td style="background: #e6eed5;"><?= $sheek_emp->total_khsomat?></td>
                <td style="background: #e6eed5;"><?= ($sheek_emp->safi)?> </td>
                <td>notes </td>
</tr>
                <?php
                }
                ?>
                </tbody>
                <tfoot class="open_green">
                <tr>
                    <th colspan="3">الإجمالى</th>
                      <th>0</th>
                     <th>0</th>
                      <th>0</th>
                       <th>0</th>
                     <th>0</th>
                     <th>0</th>
                     <th>0</th>
                 <th>0</th>
                     <th>0</th>
                <th>0</th>
                    <th>0</th>
             <th>0</th>
                   <th>0</th>
                   <th>0</th>
                    <th>0</th>
                    <th>0</th>
                     <th>0</th>
                   <th>0</th>
                    <th>0</th>
                    <th>0</th>
                    <th>0</th>
                     <th>--</th>
                </tr>
                </tfoot>
            </table>
                <?php
            }
            ?>
               
                        
                        
                        </div>
        
        
  
        
        
        
                    </div>
                </div>
            </div>
        



</div>
