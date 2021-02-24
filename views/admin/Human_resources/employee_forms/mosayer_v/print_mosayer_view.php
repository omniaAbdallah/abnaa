<link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/bootstrap-arabic-theme.min.css"/>

<link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/bootstrap-arabic.min.css"/>

<link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/font-awesome.min.css">

<link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/style.css">

<style type="text/css">

    html {

        height: 100%; /* for the page to take full window height */

        box-sizing: border-box; /* to have the footer displayed at the bottom of the page without scrolling */

    }



    *,

    *:before,

    *:after {

        box-sizing: inherit; /* enable the "border-box effect" everywhere */

    }



    body {

        font-family: initial !important;

        font-weight: bold !important;

    }



    @media print {

        /*     #img-foot{

                 position: fixed;

                 bottom: 0;

             }*/

        .report-container td, p {

            page-break-inside: avoid;

        }



        .table-bordered th, .table-bordered td {

            border: 1px solid #000 !important

        }

    }



    .bond-qabd {

        /*  float: right;

          padding-bottom: 60px;*/

        /* height: 290mm;*/

    }



    .bond-header {

        /*   height: 55px;*/

        margin-bottom: 11px;

    }



    .bond-header .right-img img {

        width: 60%;

        height: 75px;

    } 



    .bond-header .left-img img {

        width: 60%;

        height: 75px;
float: left;
    }



    .border-box {

        border: 1px solid #999;

        background-color: #fff;

        border-radius: 5px;

        /* font-size: 18px;*/

        font-size: 14px;

        padding: 2px 6px;

        display: inline-block;

        min-width: 70px;

        height: 29px;

        line-height: 27px;

        text-align: center;

    }



    .border-box-h {

        padding: 3px 20px;

        border: 2px solid #222;

        border-radius: 29px;

    }



    .main-bond-title {

        display: table;

        height: 55px;

        text-align: center;

        width: 100%;

    }



    .main-bond-title h3 {

        display: table-cell;

        vertical-align: middle;

        font-size: 12px;

    }



    /*

    .bond-body {

     position: relative;

     display: inline-block;

     width: 100%;

     margin-top: 5px;

    }

    */

    .bond-body h6 {

        font-size: 11px;

    }



    .bond-footer {

    }



    .bond-footer h6 {

        font-size: 11px;

    }

.title-fe {
    display: inline-block;
    width: auto;
    position: relative;
    top: -27px;
    /* right: -14px; */
    /* border: 2px solid #555; */
    border: 5px #000;
    /* background-color: #eee; */
    font-size: 14px !important;
    height: 37px;
    /* line-height: 32px; */
    vertical-align: middle;
    /* box-shadow: 4px 3px; */
    /* padding: 4px; */
    padding: 11px 10px;
    border-radius: 10px;
    box-shadow: 2px 2px 5px 2px #5d5d5d;
}

   /* .title-fe {

      
      display: inline-block;
      width: auto;

        position: relative;

        top: -26px;

        right: -14px;

        border: 2px solid #555;

        background-color: #eee;


        font-size: 14px !important;

        height: 37px;

        line-height: 32px;

        vertical-align: middle;

        box-shadow: 4px 3px;

    }*/



    .table-bordered > thead > tr > th,

    .table-bordered > tbody > tr > th,

    .table-bordered > tfoot > tr > th,

    .table-bordered > thead > tr > td,

    .table-bordered > tbody > tr > td,

    .table-bordered > tfoot > tr > td {

        border: 1px solid #000;

        text-align: center;

        vertical-align: middle;

        font-size: 14px;

        padding: 4px 2px;

        border: 1px solid #020202 !important;

        background: #ffffff !important;

        border-radius: 0px !important;

        font-size: 11px !important;

        color: black !important;

        font-weight: bold !important;

    }



    @page {

        size: 210mm 297mm;

        margin: 10px 10px 0px 10px;

    }



    .span_font {

        font-weight: bold;

        /* font-size: 18px;*/

        font-size: 18px;

        margin: 3px;

    }



    .gray-background {

        background-color: #eee;

        display: inline-block;

        width: 100%;

    }



    table {

        page-break-after: auto

    }



    tr {

        page-break-inside: avoid;

        page-break-after: auto

    }



    td {

        page-break-inside: avoid;

        page-break-after: auto

    }



    table.report-content {

        page-break-after: always;

    }



    thead.report-header {

        display: table-header-group;

    }



    tfoot.report-footer {

        display: table-footer-group;

    }



    /*

    .report-container:after {

        display: block;

        content: "";

        margin-bottom: 178mm; // must be larger than largest paper size you support

      }*/

    #img-foot {

        /*  position: relative;

          bottom: 0;*/

    }



    .header-info, .header-space {

        /*  height: 192px;*/

       /* height: 170px;*/
height: 124px;
    }



    .footer-info, .footer-space {

        height: 70px;

    }



    .header-info {

        position: fixed;

        top: 0;

        width: 100%;

    }



    .footer-info {

        position: fixed;

        bottom: 0;

        width: 100%;

    }

</style>

<style type="text/css" media="print">

    @page {

        size: landscape;

    }

</style>







<body onload="printDiv('printDiv')" id="printDiv">

<div class="first-part">

    <table class="report-container">

        <thead class="report-header">

        <tr>

            <th class="report-header-cell">

                <div class="header-space">&nbsp;</div>

            </th>

        </tr>

        </thead>

        <tbody class="report-content">

        <tr>

            <td class="report-content-cell">

                <div class="main">

                    <div class="bond-qabd">

                    

                

                        <div class="">

                            <!-- yaraaa -->

                            <div class="col-md-12">

                                <?php


                                if (isset($all_mosayer_data) && !empty($all_mosayer_data)) {

                                    $x = 1;

                                    ?>

                                    <table class="table table-bordered ">

                                        <thead>

                    <tr class="open_green">

                    <th rowspan="3" style="width: 20px;">م</th>

                    <th rowspan="3" style="width: 143px;">اســــــــــــــــــم الموظف</th>

                    <th rowspan="3" style="width: 127px;" ><span class="flip-mode">المسمي الوظيفى</span></th>

                    <th colspan="10" >الأستحقاقات</th>

                    <th rowspan="3"  style="width: 50px;" ><span class="flip-mode">إجمالي الأستحقاقات</span></th>

                    <th colspan="7" >الإستقطاعات	</th>

                    <th rowspan="3" ><span class="flip-mode"> إجمالي الإستقطاعات </span></th>

                    <th rowspan="3" ><span class="flip-mode">صافي المرتب </span></th>

                  

                </tr>

                                     <tr>

                    <th colspan="8" >الرواتب والأجور	</th>

                    <th colspan="2">مزايا وحوافز	</th>

                    <!--<th rowspan="2">أخرى </th>-->

                     <th rowspan="2">غياب	</th>

                     <th rowspan="2">إجازة بدون راتب</th>

                      <th rowspan="2">تأخير	</th>

                       <th rowspan="2">جزاءات	</th>

                     <th rowspan="2">التأمينات	</th>

                     <th rowspan="2">السلف	</th>

                  <th rowspan="2">أخرى </th>

                </tr>

                                        <tr>

                                            <th><span class="">راتب أساسي</span></th>

                                            <th><span class="">بدل سكن</span></th>

                                            <th><span class="">بدل مواصلات	</span></th>

                                            <th><span class="">بدل إتصال	</span></th>

                                            <th><span class="">بدل إعاشة	</span></th>

                                            <th><span class="">بدل طبيعة عمل	</span></th>

                                            <th><span class="">العمل الإضافي	</span></th>

                                            <th><span class="">بدل تكليف	</span></th>

                                            <th>مكافآت</th>

                                            <th>بدل الإنتداب</th>

                                        </thead>

                                        <tbody>

                                        <?php

                                        $egmali_rateb_asasy = $egmali_badal_sakn = $egmali_badal_mowaslat = $egmali_badal_etsal = $egmali_badal_e3asha = $egmali_badal_tabe3a_amal = $egmali_tot_edafi = $egmali_badal_taklef = $egmali_badal_taklef =

                                        $egmali_tot_entdab = $egmali_tot_okraa_esthkaq = $egmali_total_esthkak = $egmali_khasm_keyab = $egmali_agaza_bdon_rateb = $egmali_khasm_takher = $egmali_khasm_gezaa = $egmali_khasm_tamen = $egmali_khasm_solaf =

                                        $egmali_tot_okraa_khasm = $egmali_total_khsomat = $egmali_safi =$egmali_tot_mokafaa= 0;



                                        foreach ($all_mosayer_data as $emp) {

                                            $egmali_rateb_asasy += $emp->rateb_asasy;

                                            $egmali_badal_sakn += $emp->badal_sakn;

                                            $egmali_badal_mowaslat += $emp->badal_mowaslat;

                                            $egmali_badal_etsal += $emp->badal_etsal;

                                            $egmali_badal_e3asha += $emp->badal_e3asha;

                                            $egmali_badal_tabe3a_amal += $emp->badal_tabe3a_amal;

                                            $egmali_tot_edafi += $emp->tot_edafi;

                                            $egmali_badal_taklef += $emp->badal_taklef;

                                           // $egmali_badal_taklef += $emp->tot_mokafaa;

                                            $egmali_tot_entdab += $emp->tot_entdab;

                                            $egmali_tot_okraa_esthkaq += $emp->tot_okraa_esthkaq;

                                            $egmali_total_esthkak += $emp->total_esthkak;

                                            $egmali_khasm_keyab += $emp->khasm_keyab;

                                            $egmali_agaza_bdon_rateb += $emp->agaza_bdon_rateb;

                                            $egmali_khasm_takher += $emp->khasm_takher;

                                            $egmali_khasm_gezaa += $emp->khasm_gezaa;

                                            $egmali_khasm_tamen += $emp->khasm_tamen;

                                            $egmali_khasm_solaf += $emp->khasm_solaf;

                                            $egmali_tot_okraa_khasm += $emp->tot_okraa_khasm;

                                            $egmali_total_khsomat += $emp->total_khsomat;

                                            $egmali_safi += $emp->safi;

                                            $egmali_tot_mokafaa += $emp->tot_mokafaa;

                                            ?>

                                            <tr>

                                                <td><?= $x++; ?> </td>

                                                <!--<td><?= $emp->emp_name ?></td>-->

                                                <td><span style="font-size: 10px; float: right; color: black; font-weight: bold;  !important;"

                                                          data-toggle="tooltip" data-placement="bottom"

                                                          title="<?= $emp->emp_name ?>">

   <?=$emp->emp_name ?>

   </span></td>

                                                <!--  <td><?= $emp->mosma_wazefy_n ?></td>-->

<td><span style="font-size: 8px;float: right; color: black; font-weight: bold;  !important;"

data-toggle="tooltip" data-placement="bottom"

title="<?= $emp->mosma_wazefy_n ?>">

<?= ($emp->mosma_wazefy_n)?>

</span></td>

                                                <td>

                                                    <?= round($emp->rateb_asasy) ?>

                                                </td>

                                                <td><?= round($emp->badal_sakn) ?>

                                                </td>

                                                <td>

                                                    <?= round($emp->badal_mowaslat) ?></td>

                                                <td>

                                                    <?= round($emp->badal_etsal) ?>

                                                </td>

                                                <td>

                                                    <?= round($emp->badal_e3asha) ?></td>

                                                <td>

                                                    <?= round($emp->badal_tabe3a_amal) ?></td>

                                                <td>

                                                    <?= round($emp->tot_edafi) ?></td>

                                                <td>

                                                    <?= round($emp->badal_taklef) ?>

                                                </td>

                                                <td onclick="get_pop_detailes(905,<?= $emp->emp_id ?>)"><?= round($emp->tot_mokafaa) ?></td>

                                                <td><?= round($emp->tot_entdab) ?></td>

                                                <!--<td><?= $emp->tot_okraa_esthkaq ?></td>-->

                                                <td style="background: #e6eed5;"><?= round($emp->total_esthkak) ?></td>

                                                <td><?= round($emp->khasm_keyab) ?></td>

                                                <td><?= round($emp->agaza_bdon_rateb) ?></td>

                                                <td><?= round($emp->khasm_takher) ?></td>

                                                <td><?= round($emp->khasm_gezaa) ?></td>

                                                <td>

                                                    <?= round($emp->khasm_tamen) ?>

                                                </td>

                                                <td><?= round($emp->khasm_solaf) ?></td>

                                                <td><?= round($emp->tot_okraa_khasm) ?> </td>

                                                <td style="background: #e6eed5;"><?= round($emp->total_khsomat) ?></td>

                                                <td style="background: #e6eed5;"><?= round(($emp->safi)) ?> </td>

                                               

                                            </tr>

                                            <?php

                                        }

                                        ?>

                                        </tbody>

                                        <tfoot class="open_green">

                                        <tr>

                                            <th colspan="3">الإجمالى</th>

                                            <th><?= round($egmali_rateb_asasy) ?></th>

                                            <th><?= round($egmali_badal_sakn) ?></th>

                                            <th><?= round($egmali_badal_mowaslat) ?></th>

                                            <th><?= round($egmali_badal_etsal) ?></th>

                                            <th><?= round($egmali_badal_e3asha) ?></th>

                                            <th><?= round($egmali_badal_tabe3a_amal) ?></th>

                                            <th><?= round($egmali_tot_edafi) ?></th>

                                            <th><?= round($egmali_badal_taklef) ?></th>

                                            <th><?= round($egmali_tot_mokafaa) ?></th>

                                            <th><?= round($egmali_tot_entdab) ?></th>

                                           <!-- <th><?= round($egmali_tot_okraa_esthkaq) ?></th>-->

                                            <th><?= round($egmali_total_esthkak) ?></th>

                                            <th><?= round($egmali_khasm_keyab) ?></th>

                                            <th><?= round($egmali_agaza_bdon_rateb) ?></th>

                                            <th><?= round($egmali_khasm_takher) ?></th>

                                            <th><?= round($egmali_khasm_gezaa) ?></th>

                                            <th><?= round($egmali_khasm_tamen) ?></th>

                                            <th><?= round($egmali_khasm_solaf) ?></th>

                                            <th><?= round($egmali_tot_okraa_khasm) ?></th>

                                            <th><?= round($egmali_total_khsomat) ?></th>

                                            <th><?= round($egmali_safi) ?></th>

                                           

                                        </tr>

                                        </tfoot>

                                    </table>

                                    <?php

                                }

                                ?>

                            </div>



    

                            

                                      <div class="col-xs-12">  

                            	<div class="col-xs-3">

					<h5 style="padding-bottom: 27px;"  class="text-center">الموارد البشرية</h5>

					<h5 class="text-center"><?php 
                    if(isset($modeer_hr) and  $modeer_hr!=null){
                      echo $modeer_hr;  
                    }else{
                        
                    }
                    ?></h5>

				</div>



			                 

                 <div class="col-xs-3">

					<h5 style="padding-bottom: 27px;" class="text-center">المحاسب</h5>

					<h5 class="text-center"> <?php 
                    if(isset($mohaseb) and  $mohaseb!=null){
                      echo $mohaseb;  
                    }else{
                        
                    }
                    ?></h5>

				</div>





             

                            	<div class="col-xs-3">

					<h5 style="padding-bottom: 27px;" class="text-center">مدير الشؤون المالية والادارية</h5>

					<h5 class="text-center"> <?php 
                    if(isset($modeer_mali) and  $modeer_mali!=null){
                      echo $modeer_mali;  
                    }else{
                        
                    }
                    ?>	</h5>

				</div>

              		<div class="col-xs-3">

					<h5 style="padding-bottom: 27px;" class="text-center">مدير عام الجمعية</h5>

					<h5 class="text-center">
                    <?php 
                    if(isset($modeer_3am) and  $modeer_3am!=null){
                      echo $modeer_3am;  
                    }else{
                        
                    }
                    ?>
                    
                    </h5>

				</div>

              



                            

                            <!--  -->

                        </div>

                    </div>

                </div>

            </td>

        </tr>

        </tbody>



        <tfoot class="report-footer">

        <tr>

            <td class="report-footer-cell">

                <div class="footer-space">&nbsp;</div>

            </td>

        </tr>

        </tfoot>

    </table>

</div>

<!--  -->

<div class="header-info">

    <div class="bond-header">

        <div class="col-xs-4 pad-2">

            <div class="right-img">

                <img src="<?php echo base_url() ?>asisst/admin_asset/img/pills/sympol1.png">

            </div>

        </div>

        <div class="col-xs-3 pad-2">

        </div>

        <div class="col-xs-5 pad-2">

            <div class="left-img">

                <img src="<?php echo base_url() ?>asisst/admin_asset/img/pills/sympol2.png">

            </div>

        </div>

        <div class="text-center">

        <h1 style="font-size: 18px !important;margin-top: -25px;" class="title-fe span_font">

                مسير رواتب الموظفين </h1>

                

          <div class="col-xs-12">

          

            <div class="col-xs-4">

            <span style="text-align: center;">فئة المسير : </span>

            <?php 

           // echo $this->input->post('mosayer_fe2at')[0];

            $mosayer_fe2at = $this->input->post('mosayer_fe2at');

            if(isset($mosayer_fe2at) and $mosayer_fe2at !=null){

              if($this->input->post('mosayer_fe2at')[0] == 1){

                            echo 'موظفى الإدارة العامة';

                          }elseif($this->input->post('mosayer_fe2at')[0]==2){

                             echo 'موظفى الرعاية والبرامج التنموية';

                          }elseif($this->input->post('mosayer_fe2at')[0]==3){

                             echo 'موظفى اكاديمية طموح بنين';

                          }elseif($this->input->post('mosayer_fe2at')[0]==4){

                             echo 'موظفى تنمية الموارد المالية';

                          }elseif($this->input->post('mosayer_fe2at')[0]==5){

                             echo 'موظفى الأوقاف';

                          }elseif($this->input->post('mosayer_fe2at')[0]==6){

                             echo 'موظفى تمكين';

                          }elseif($this->input->post('mosayer_fe2at')[0]==7){

                             echo 'موظفى الحوكمة';

                          }elseif($this->input->post('mosayer_fe2at')[0] == ''){

                           echo ''; 

                          }else{

                             echo '';

                          }  

            }else{

               echo 'غير محدد';  

            }


            ?>

            </div>

           <div class="col-xs-4">


            <span  style="text-align: center;"> كشف رواتب ومكافئات شهر فبراير
            
            <?php 
            $months = array("01" => "يناير", "02" => "فبراير", "03" => "مارس", "04" => "أبريل", "05" => "مايو",
                    "06" => "يونيو", "07" => "يوليو", "08" => "أغسطس", "09" => "سبتمبر", "10" => "أكتوبر",
                    "11" => "نوفمبر", "12" => "ديسمبر");
                    
                  if (isset($months[$main_mosayer->mosayer_month])) {
                                    echo $months[$main_mosayer->mosayer_month];
                                } 

            
            ?> لعام 
          <?=$main_mosayer->mosayer_year?>
            
            </span>

           </div>

           <div class="col-xs-4">

            <span style="text-align: center;">طريقة الصرف : </span>

            <?php 

             $pay_method_id_fk = $this->input->post('pay_method_id_fk');

              if(isset($pay_method_id_fk) and $pay_method_id_fk !=null){

                  if($this->input->post('pay_method_id_fk')[0] == 2){

                      echo ' شيك ';

                    }elseif($this->input->post('pay_method_id_fk')[0]==3){

                     echo ' تحويل ';    

                    }else{

                        

                    }

              }else{

                echo 'غير محدد';   

              }

            

            ?>

            </div>

          </div>

            

          

        </div>

        <!-- <div class="col-xs-12" style="margin-top: 5px;"> -->

        <div class="col-xs-12" style="margin-top: -16px;">

            <div class=" gray-background">



            </div>

        </div>

    </div>

</div>

<div class="footer-info">

    <div class="col-xs-12 no-padding print-details-footer">

        <div class="col-xs-4">
          <p class=" text-center" style="margin-bottom: 0;"> <small>حالة المسير
          : 
          <?php
          if($main_mosayer->suspend_moder_3am == 'yes'){
           echo 'تم الإعتماد';   
          }else{
             echo 'قيد الإعتماد'; 
          }
          ?>
          </small></p>

        </div>

        <div class="col-xs-4">

            <p class=" text-center" style="margin-bottom: 0;"><small>تاريخ الطباعة

                    : <?php echo date('Y-m-d h:i:s'); ?></small></p>

        </div>

        <div class="col-xs-12 no-padding">

            <img src="<?php echo base_url() ?>asisst/admin_asset/img/pills/page-footer.jpg" width="90%" style="height: 30px;
    margin-right: 76px;">

        </div>

    </div>

</div>

</div>

<?php

//echo die;

?>

<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>

<script src="<?php echo base_url() ?>asisst/admin_asset/js/bootstrap-arabic.min.js"></script>

<script src="<?php echo base_url() ?>asisst/admin_asset/js/bootstrap-select.min.js"></script>

<script src="<?php echo base_url() ?>asisst/admin_asset/js/jquery.datetimepicker.full.js"></script>

<script src="<?php echo base_url() ?>asisst/admin_asset/js/jquery.easing.min.js"></script>

<script src="<?php echo base_url() ?>asisst/admin_asset/js/owl.carousel.min.js"></script>

<script src="<?php echo base_url() ?>asisst/admin_asset/js/custom.js"></script>

<script src="<?php echo base_url() ?>asisst/admin_asset/js/wow.min.js"></script>

<script>



    new WOW().init();

    $('.some_class').datetimepicker();

</script>

<script language="javascript" type="text/javascript">
 


    function printDiv(divID) {
/*
        //Get the HTML of div

        var divElements = document.getElementById(divID).innerHTML;

        //Get the HTML of whole page

        var oldPage = document.body.innerHTML;

        //Reset the page's HTML with div's HTML only

        document.body.innerHTML =

            "<html><head><title></title></head><body>" +

            divElements + "</body>";

        //Print Page

        window.print();

        window.close();

    }*/

</script> 