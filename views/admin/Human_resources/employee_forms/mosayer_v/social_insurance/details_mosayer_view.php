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
        font-size: 11px !important;
        padding: 2px;
    }
    .flip-mode{
        writing-mode: vertical-lr;
        text-orientation: mixed;
    }
</style>
<div class="col-sm-12 no-padding">
    <div  class="panel default">
        <div class="panel-body">
     <?php 
     ?>
<div id="result">
<button class="btn btn-warning" onclick="print_card(<?=$f2a?>,<?=$mosayer_rkm?>)" title="طباعة"><i
                                         style="    margin-top: 0px;
    float: left;
    "   class="fa fa-print"></i> طباعة كشف التأمينات الاجتماعية</button>
            <?php 
            if (isset($all_mosayer_data) && !empty($all_mosayer_data)){ 
                $x=1;
                ?> 
            <table class="table table-bordered table-striped" style="table-layout: fixed">
                <thead>
             <tr class="open_green">
                    <!-- <th rowspan="3" style="width: 20px;">م</th> -->
                    <th colspan="5" >بيانات الموظف	</th>
                    <!-- <th rowspan="3" style="width: 140px;">اســــــــــــــــــم الموظف</th>
                    <th rowspan="3" style="width: 100px;" ><span class="flip-mode">الوظيفة</span></th>
                    <th rowspan="3" style="width: 100px;" ><span class="flip-mode">الجنسية</span></th> -->
                    <th colspan="6" >تفاصيل الراتب	</th>
                  
                    <th colspan="4" >التأمينات الأجتماعية	</th>
                    <th rowspan="3" ><span class="flip-mode">  إجمالي التأمينات المستحقة </span></th>
                    <!-- <th rowspan="3" ><span class="flip-mode">صافي المرتب </span></th> -->
                </tr>
                <tr>
                <th rowspan="2" > م	</th>
                <th rowspan="2" >مركز التكلفة	</th>
                <th rowspan="2" >اســــم الموظف	</th>
                <th rowspan="2" >الوظيفة	</th>
                <th rowspan="2" >الجنسية	</th>


                <th rowspan="2" >راتب أساسي	</th>
                    <th colspan="2" >بدل	</th>
                    <th colspan="2"> حوافز	</th>
                    <th rowspan="2" >اجمالي الراتب
	</th>
                   <!-- <th rowspan="2">أخرى </th>-->
                 
                     <th rowspan="2">حصة الموظف من التأمينات
	</th>
                     <th colspan="3">حصة الجمعية من التأمينات		</th>
                     
                   
                  <!--   <th rowspan="2">أخرى </th>-->
                </tr>
                <tr>
           
                <th > <span class="">بدل سكن</span></th>
                <th > <span class="">بدل مواصلات	</span></th>
                
                    <th>ثابت </th>
                    <th>اخرى </th>


                    
                <th> <span class="">أخطار مهنية</span></th>
                <th > <span class=""> ساند	</span></th>
                <th > <span class=""> معاشات	</span></th>
                
                </thead>
                <tbody>
                <?php
                   $egmali_rateb_asasy = $egmali_badal_sakn = $egmali_badal_mowaslat = $egmali_badal_etsal = $egmali_badal_e3asha = $egmali_badal_tabe3a_amal = $egmali_tot_edafi = $egmali_badal_taklef = $egmali_badal_taklef =
                                        $egmali_tot_entdab = $egmali_tot_okraa_esthkaq = $egmali_total_esthkak = $egmali_khasm_keyab = $egmali_agaza_bdon_rateb = $egmali_khasm_takher = $egmali_khasm_gezaa = $egmali_khasm_tamen = $egmali_khasm_solaf =
                                    $egmali_rateb_total=  $egmali_badal_thabet=$egmali_badal_other=  $egmali_tot_okraa_khasm = $egmali_total_khsomat = $egmali_safi =$egmali_tot_mokafaa= 0;
 
 
                                        foreach ($all_mosayer_data as $emp){
     if(!empty($emp->finance_data)&&($emp->finance_data!='')){
     $egmali_rateb_asasy += $emp->rateb_asasy;
     $egmali_badal_sakn += $emp->badal_sakn;
     $egmali_badal_mowaslat += $emp->badal_mowaslat;
     $egmali_badal_thabet+=0;
     $egmali_badal_other+=0;
     $egmali_rateb_total+=$egmali_rateb_asasy+$egmali_badal_sakn+$egmali_badal_mowaslat+$egmali_badal_thabet+$egmali_badal_other;



                                            // $egmali_badal_sakn += $emp->badal_sakn;
                                            // $egmali_badal_mowaslat += $emp->badal_mowaslat;
                                            // $egmali_badal_etsal += $emp->badal_etsal;
                                            // $egmali_badal_e3asha += $emp->badal_e3asha;
                                            // $egmali_badal_tabe3a_amal += $emp->badal_tabe3a_amal;
                                            // $egmali_tot_edafi += $emp->tot_edafi;
                                            // $egmali_badal_taklef += $emp->badal_taklef;
                                            // $egmali_badal_taklef += $emp->tot_mokafaa;
                                            // $egmali_tot_entdab += $emp->tot_entdab;
                                            // $egmali_badal_thabet+=0;
                                            // $egmali_badal_other+=0;
                                            // $egmali_tot_okraa_esthkaq += $emp->tot_okraa_esthkaq;
                                            // $egmali_total_esthkak += $emp->total_esthkak;
                                            // $egmali_khasm_keyab += $emp->khasm_keyab;
                                            // $egmali_agaza_bdon_rateb += $emp->agaza_bdon_rateb;
                                            // $egmali_khasm_takher += $emp->khasm_takher;
                                            // $egmali_khasm_gezaa += $emp->khasm_gezaa;
                                            // $egmali_khasm_tamen += $emp->khasm_tamen;
                                            // $egmali_khasm_solaf += $emp->khasm_solaf;
                                            // $egmali_tot_okraa_khasm += $emp->tot_okraa_khasm;
                                            // $egmali_total_khsomat += $emp->total_khsomat;
                                            // $egmali_safi += $emp->safi;
                                            // $egmali_tot_mokafaa += $emp->tot_mokafaa;
   ?>
        <tr>
                <td><?= $x++;?> </td>
                <!--<td><?= $emp->emp_name?></td>-->
                <td><span  style="font-size: 11px; color: black; font-weight: bold;  !important;"  
                data-toggle="tooltip" data-placement="bottom" title="<?= $emp->markz_name ?>">
               <?=character_limiter($emp->markz_name,18)?>
               </span></td>
                <td><span  style="font-size: 11px; color: black; font-weight: bold;  !important;"  
                data-toggle="tooltip" data-placement="bottom" title="<?= $emp->emp_name ?>">
               <?=character_limiter($emp->emp_name,18)?>
               </span></td>
              <!--  <td><?= $emp->mosma_wazefy_n?></td>-->
                <td><span  style="font-size: 11px; color: black; font-weight: bold;  !important;"  
                data-toggle="tooltip" data-placement="bottom" title="<?= $emp->mosma_wazefy_n ?>">
               <?=character_limiter($emp->mosma_wazefy_n,12)?>
               </span></td>
               <td><span  style="font-size: 11px; color: black; font-weight: bold;  !important;"  
                data-toggle="tooltip" data-placement="bottom" title="<?= $emp->nationality ?>">
               <?php
               foreach($nationality as $na)
               {
                  
                   if(!empty($emp->nationality)&&($emp->nationality ==$na->id_setting))
                   {
                       $nation=$na->title_setting;
                   }
               }
               ?>
              <?= character_limiter($nation,12)?>
               </span></td>
                <td><?= $emp->rateb_asasy?></td>
                <td><?= $emp->badal_sakn?></td>
                <td><?= $emp->badal_mowaslat?></td>
                <td>
              <?php  $thabet=0;
echo $thabet;
              ?>
                </td>
                <td><?php  $other=0;
echo $other;
              ?></td>
                 
                <td style="background: #e6eed5;"><?php
                $egmali_rateb=$emp->rateb_asasy+$emp->badal_sakn+$emp->badal_mowaslat+$thabet+$other;
                echo $egmali_rateb?></td>
                 <td><?php $haest_mozaf=$egmali_rateb*0.1;
                 echo  $haest_mozaf;
                 
                 ?>
                 
                 
                 </td>
                 <td><?php $danger=$egmali_rateb*0.02;
                 echo  $danger;
                 
                 ?></td>
                 <td><?php $thand=$egmali_rateb*0.01;
                 echo  $thand;
                 
                 ?></td>
                  <td><?php $m3a4at=$egmali_rateb*0.09;
                 echo  $m3a4at;
                 
                 ?></td>
              <td><?php $total=$m3a4at+$thand+$danger+$haest_mozaf;
                 echo  $total;
                 
                 ?></td>
               
</tr>
                <?php
             } }
                ?>
                </tbody>
                <tfoot class="open_green">
                 <tr>
                                            <th colspan="5">الإجمالى</th>
                                            <th><?= $egmali_rateb_asasy ?></th>
                                            <th><?= $egmali_badal_sakn ?></th>
                                            <th><?= $egmali_badal_mowaslat ?></th>
                                            <th><?= $egmali_badal_thabet?></th>
                                            <th><?= $egmali_badal_other ?></th>
                                          
                                            <th><?= $egmali_rateb_total ?></th>
                                            <th><?= $egmali_rateb_total *0.1 ?></th>
                                            <th><?= $egmali_rateb_total *0.02 ?></th>
                                            <th><?= $egmali_rateb_total *0.01 ?></th>
                                            <th><?= $egmali_rateb_total *0.09 ?></th>
                                            <th><?= $egmali_rateb_total *0.1+$egmali_rateb_total *0.02+$egmali_rateb_total *0.01+$egmali_rateb_total *0.09 ?></th>
                                           
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

<script>
    function print_card(f2a,mosayer_rkm) {
        var request = $.ajax({
            // print_resrv -- print_contract
            url: "<?=base_url() . 'human_resources/employee_forms/Employee_salaries/print_mosayar_details'?>",
            type: "POST", 
            data:{f2a:f2a,
                mosayer_rkm:mosayer_rkm}
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