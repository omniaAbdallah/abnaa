<div class="col-sm-12 no-padding">
    <div  class="panel default">
        <div class="panel-body">
     <?php 
     ?>
<div id="result">
<!--
<button class="btn btn-warning" onclick="print_card(<?=$f2a?>,<?=$mosayer_rkm?>)" title="طباعة"><i
                                         style="    margin-top: 0px;
    float: left;
    "   class="fa fa-print"></i> طباعة كشف التأمينات الاجتماعية</button>-->
    
            <?php 
            /*
            echo '<pre>';
            print_r($all_emps_insurance);*/
            if (isset($all_emps_insurance) && !empty($all_emps_insurance)){ 
                $x=1;
                ?> 
            <table class="table table-bordered table-striped" style="table-layout: fixed">
                <thead>
             <tr class="open_green">
                    <th colspan="5" >بيانات الموظف	</th>
                    <th colspan="6" >تفاصيل الراتب	</th>
                    <th colspan="4" >التأمينات الأجتماعية	</th>
                    <th rowspan="3" ><span class="flip-mode">  إجمالي التأمينات المستحقة </span></th>
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
                    <th rowspan="2" >اجمالي الراتب</th>
                     <th rowspan="2">حصة الموظف من التأمينات</th>
                     <th colspan="3">حصة الجمعية من التأمينات</th>
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
 
 
          foreach ($all_emps_insurance as $emp){
     if(!empty($emp->finance_data)&&($emp->finance_data!='')){
     $egmali_rateb_asasy += $emp->rateb_asasy;
     $egmali_badal_sakn += $emp->badal_sakn;
     $egmali_badal_mowaslat += $emp->badal_mowaslat;
     $egmali_badal_thabet+=0;
     $egmali_badal_other+=0;
     $egmali_rateb_total+=$egmali_rateb_asasy+$egmali_badal_sakn+$egmali_badal_mowaslat+$egmali_badal_thabet+$egmali_badal_other;
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
               <td><span  style="font-size: 11px; color: black; font-weight: bold;  !important;">
               nationality
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
