<link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/bootstrap-arabic-theme.min.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/bootstrap-arabic.min.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/style.css">
<style type="text/css">
html {
    height: 100%;              /* for the page to take full window height */
    box-sizing: border-box;    /* to have the footer displayed at the bottom of the page without scrolling */
}
*,
*:before,
*:after {
    box-sizing: inherit;       /* enable the "border-box effect" everywhere */
}
body{
        font-family: initial !important; 
        font-weight: bold !important;
}
  @media print{
   /*     #img-foot{
            position: fixed;
            bottom: 0;
        }*/
        .report-container td, p {
            page-break-inside: avoid;
          }
    .table-bordered th,.table-bordered td{
      border:1px solid #000!important
    }
  }
  .bond-qabd{
  /*  float: right;
    padding-bottom: 60px;*/
  /* height: 290mm;*/
  }
  .bond-header{
   /*   height: 55px;*/
   margin-bottom: 15px;
 }
 .bond-header .right-img img{
   width: 100%;
   height: 90px;
 }
 .bond-header .left-img img{
  width: 100%;
  height: 90px;
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
.border-box-h{
  padding: 3px 20px;
  border: 2px solid #222;
  border-radius: 29px;
}
.main-bond-title{
  display: table;
  height: 55px;
  text-align: center;
  width: 100%;
}
.main-bond-title h3{
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
.pad-2{
  padding-left: 2px;
  padding-right: 2px;
}
.bond-footer{
}
.bond-footer h6{
  font-size: 11px;
}
.title-fe {
 display: inline-block;
 width: auto;
 position: relative;
  top: -26px; 
 right: -14px;
 border: 2px solid #555;
 background-color: #eee;
/* font-size: 19px !important;*/
 font-size: 14px !important;
 padding: 3px 34px;
 height: 37px;
 line-height: 32px;
 vertical-align: middle;
 box-shadow: 4px 3px;
}
.table-bordered>thead>tr>th,
 .table-bordered>tbody>tr>th, 
 .table-bordered>tfoot>tr>th,
  .table-bordered>thead>tr>td, 
  .table-bordered>tbody>tr>td, 
  .table-bordered>tfoot>tr>td
{
  border: 1px solid #000;
  text-align: center;
  vertical-align: middle;
   font-size: 14px;
  padding: 4px 2px;
    border: 1px solid #020202 !important;
    background: #ffffff !important;
    border-radius: 0px !important;
    font-size: 15px !important;
    color: black !important;
}
@page {
    size: 210mm 297mm;
  margin: 10px 10px 0px 10px;
}
.span_font{
  font-weight: bold;
 /* font-size: 18px;*/
 font-size: 18px;
  margin: 3px;
}
.gray-background{
  background-color: #eee;
  display: inline-block;
  width: 100%;
}
 table { page-break-after:auto }
  tr    { page-break-inside:avoid; page-break-after:auto }
  td    { page-break-inside:avoid; page-break-after:auto }
table.report-content {
  page-break-after:always;
}
thead.report-header {
  display:table-header-group;
}
tfoot.report-footer {
  display:table-footer-group;
} 
/*
.report-container:after {
    display: block;
    content: "";
    margin-bottom: 178mm; // must be larger than largest paper size you support 
  }*/
#img-foot{
  /*  position: relative;
    bottom: 0;*/
}
.header-info, .header-space{
  /*  height: 192px;*/
  height: 170px;
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
.loader {
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid #3498db;
        width: 70px;
        height: 70px;
        -webkit-animation: spin 2s linear infinite; /* Safari */
        animation: spin 2s linear infinite;
    }
    /* Safari */
    @-webkit-keyframes spin {
        0% {
            -webkit-transform: rotate(0deg);
        }
        100% {
            -webkit-transform: rotate(360deg);
        }
    }
    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }
        .btn-abnaa{
    background-color: #95c11f;
    border-color: #95c11f;
    }
    .abnaa_class{
        font-size: 15px !important;
    padding: 1px 5px;
    line-height: 1.5;
    border-radius: 2px;
    }
    table.dataTable tbody th, table.dataTable tbody td {
    padding: 5px 0px !important;
    vertical-align: middle !important;
    text-align: center !important;
    font-size: 12px !important;
    font-weight: bold !important;
}
.modal table td input[type=radio] {
    height: 22px;
    width: 22px;
}
.twqeat-table td{
    padding: 0 !important;
    background-color: #fff;
    text-align: center;
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
        <div class="container-fluid">
          <div class="bond-body">
          <!--  <div class="col-xs-12 no-padding" style="margin-top: 10px;" > -->
         
				<!-- yaraaa -->
        <?php 
            if (isset($all_mosayer_data) && !empty($all_mosayer_data)){ 
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
                    <th rowspan="2" >اجمالي الراتب
	</th>
               
                 
                     <th rowspan="2">حصة الموظف من التأمينات
	</th>
                     <th colspan="3">حصة الجمعية من التأمينات		</th>
                     
                   
          
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
				<!-- yaraa -->
							
<!--  -->
                <!--  -->
                                         <!--  -->
                                         <div class="col-md-12">
                                <div class="piece-box">
                                    <table class="table table-bordered" style="table-layout: fixed">
									<tr>
                                            <th class="info">   الموارد البشرية:</th>
                                            <td width="15%"></td>
                                            <th class="info">  المحاسب:</th>
                                            <th width="20%"></th>
                                        </tr>
                                        <tr>
                                            <th class="info">  مدير الشؤون المالية والإدارية:</th>
                                            <td width="15%"></td>
                                            <th class="info">  مدير عام الجمعية	:</th>
                                            <th width="20%"></th>
                                        </tr>
                                        </table>
                                </div>
                </div> 
                <!--  -->
                <!--  -->
                </body>
                </div>
        </div>
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
       <h1 style="font-size: 18px !important;margin-top: 28px;" class="title-fe span_font">كشف التأمينات الاجتماعية </h1>
     </div>
    <!-- <div class="col-xs-12" style="margin-top: 5px;"> -->
    <div class="col-xs-12" style="margin-top: -16px;"> 
      <div class=" gray-background">
        <!-- <div class="col-xs-4 no-padding">
          <h5 class="span_font" style="margin-right: 20px; padding: 2px 0;">نـــوع القيد : <span class="border-box span_font"><?php echo $result->no3_qued_name ;?></span></h5>
        </div>
        <div class="col-xs-4 text-center">
          <h5 class="span_font">رقـــم القيد : &nbsp&nbsp<span class="border-box span_font" style="font-size:18px"><?php echo $result->rkm ;?></span></h5>
        </div>
        <div class="col-xs-4 text-center">
          <h5 class="span_font">تــاريخ القيد : &nbsp&nbsp<span class="border-box span_font"><?php echo date("Y-m-d",$result->qued_date)  ;?></span></h5>
        </div> -->
      </div>
    </div>
  </div>
</div>
<div class="footer-info" >
         <div class="col-xs-12 no-padding print-details-footer">
        <div class="col-xs-2">
       <!--   <p class=" text-center" style="margin-bottom: 0;">رقم الصفحة</p> -->
        </div>
        <div class="col-xs-4">
          <p class=" text-center" style="margin-bottom: 0;"> <small>تاريخ الطباعة :   <?php echo  date('Y-m-d h:i:s');  ?></small></p>
        </div>
     <div class="col-xs-12 no-padding">
             <img src="<?php echo base_url() ?>asisst/admin_asset/img/pills/page-footer.jpg" width="100%" style="">
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
        //Restore orignal HTML
        document.body.innerHTML = oldPage;
    }
</script> 