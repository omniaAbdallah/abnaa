
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
          <div class="col-xs-12 no-padding" style="margin-top: 0px;" > 

                                    <table id="page" class="table table-bordered" style="table-layout: fixed">
                                        <thead>
                                        <tr class="info">
                                            <th colspan="8" class="text-center"> نموذج الشكوي والتظلم</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th   colspan="2" class="info"> اسم المتطوع:</th>
                                            <th  colspan="6" class="text-center">
                                           
                                                          
                                            <?php
                                            
                                            if(isset($volunteer)&&!empty($volunteer))
                                            {
                                                echo $volunteer['motatw3_name'];
                                            }
                                            
                                            ?>
                                            </th>

                                        </tr>
                                          <tr class="info">
                                            <th class="text-center"  colspan="3" >مسمي  الفرصة التطوعية</th>
                                            <th class="text-center" colspan="1">  القسم</th>
                                            <th  class="text-center" colspan="2">  رقم الجوال</th>
                                            <th  class="text-center" colspan="2" >   تاريخ بدء التطوع</th>
                                            </tr>
                                            <tr>
                                            <td  class="text-center" colspan="2">
                                            <input type="hidden" name="forsa_id_fk"
                                                           value="<?php echo $volunteer['forsa_name']; ?>">
                                                           <?php
                                            
                                            if(isset($volunteer['forsa_name'])&&!empty($volunteer['forsa_name']))
                                            {
                                                echo $volunteer['forsa_name'];
                                            }
                                            
                                            ?>
                                            </td>
                                           
                                            <td class="text-center" colspan="2">
                                            
                                                           <?php
                                            
                                            if(isset($volunteer['qsm_n'])&&!empty($volunteer['qsm_n']))
                                            {
                                                echo $volunteer['qsm_n'];
                                            }
                                            
                                            ?>
                                            </td>
                                          
                                            <td class="text-center" colspan="2">
                                            
                                                           <?php
                                            
                                            if(isset($volunteer['jwal'])&&!empty($volunteer['jwal']))
                                            {
                                                echo $volunteer['jwal'];
                                            }
                                            
                                            ?>
                                            </td>
                                          
                                            <td  class="text-center" colspan="2">
                                            
                                                           <?php
                                            
                                            if(isset($volunteer['motatw3_date'])&&!empty($volunteer['motatw3_date']))
                                            {
                                                echo $volunteer['motatw3_date'];
                                            }
                                            
                                            ?>
                                            </td>
                                            </tr>
                                            <tr class="info">
                                            <th class="text-center" colspan="4" >   تاريخ  المشكلة</th>
                                            <th  class="text-center"colspan="4" >نوع المشكلة</th>
                                            </tr>
                                            <tr>
                                            <td  class="text-center"colspan="4">
                                            
                                                           <?php
                                            
                                            if(isset($volunteer['problem_date'])&&!empty($volunteer['problem_date']))
                                            {
                                                echo $volunteer['problem_date'];
                                            }
                                            
                                            ?>
                                            </td>
                                           
                                            
                                            <?php
                                     
                                     $period = array(1=>'شكوي',2 => ' تظلم');
                 foreach ($period as $key => $value) {
                     $checked = '';
                     if (isset($volunteer['complaint_type'])&&($volunteer['complaint_type']!='')) {
                         $allPeriods = $volunteer['complaint_type'];
                         if ($key==$allPeriods) {
                             $checked = 'checked';
                         }
                     }
                     
                     ?>
                   <td class="text-center" colspan="2" >
                     <div class="radio-content">

                         <input type="radio"   data-validation="required" disabled
                         class="form-control"
                                                        name="complaint_type"
                                                        id="gridcv<?=$key?>"
                                                        value="<?=$key?>"
                                                         width="10px;" <?= $checked ?>
                                                       
                                                        >
                         <label     class="radio-label" for="gridcv<?= $key ?>"> <?= $value ?></label>
                     </div>
                     </td>
                 <? } ?>
                                                         
                                         
                                            </tr>
                                            <tr >
                                            <th  class=" info text-center" colspan="2" >   وصف  المشكلة</th>
                                            <td class="text-center"  colspan="6"> 
                                            <?php
                                            
                                            if(isset($volunteer['problem_wasf'])&&!empty($volunteer['problem_wasf']))
                                            {
                                                echo $volunteer['problem_wasf'];
                                            }
                                            
                                            ?>
                                            
                                            
                                             </td>

                                            </tr>
                                         
                                            <tr class="info">
                                            <th class="text-center" colspan="8"    class="text-center" > من يحق له الاطلاع علي الشكوي أو التظلم</th>
                                            </tr>

                                            <tr class="info">
                                            <th  class="text-center" colspan="2" class="info">المدير المباشر</th>
                                            <th class="text-center"  colspan="2" class="info">مدير التطوع</th>
                                            <th class="text-center" colspan="2" class="info">  المدير التنفيذي</th>
                                            <th class="text-center"  colspan="2" class="info"></th>
                                            </tr>
                                            <tr >
                                            
                                            <?php
                                     
                                     $allowed = array(1=>' مدير التطوع',2 => ' المدير المباشر',3=>'المدير التنفيذي ');
                 foreach ($allowed as $key => $value) {
                     $checked = '';
                     if (isset($volunteer['who_allowed'])&&($volunteer['who_allowed']!='')) {
                         $allallowed = $volunteer['who_allowed'];
                         if ($key==$allallowed) {
                             $checked = 'checked';
                         }
                     }
                     
                     ?>
                    <td class="text-center" colspan="2">
                     
                         <input type="radio"   disabled
                                                        
                                                        name="who_allowed"
                                                        id="grid<?= $key ?>"
                                                        value="<?=$key?>"
                                                         width="10px;" <?= $checked ?>
                                                        >
                         
                     
                     </td>  
                 <? } ?>
                 <td  class="text-center" colspan="2" >
                                            </td >
                 
                
                                            </tr>

                                            <tr class="info">
                                            <th class="text-center" colspan="8" class="text-center">خاص بمن ينظر في المشكلة</th>
                                            </tr>


                                            <tr class="info">
                                            <th  class="text-center" colspan="2" class="info">      اسم من نظر في المشكلة  </th>
                                            <th  class="text-center" colspan="2" class="info">         تاريخ النظر في المشكلة   </th>
                                            <th  class="text-center" colspan="4" class="info">         التوقيع   </th>
                                            </tr>

                                            <tr>
                                            <td class="text-center" colspan="2" >    <?php
                                            
                                            if(isset($volunteer['last_check_problem'])&&!empty($volunteer['last_check_problem']))
                                            {
                                                echo $volunteer['last_check_problem'];
                                            }
                                            
                                            ?> </td>
                                            <td class="text-center" colspan="2" >         <?php
                                            
                                            if(isset($volunteer['last_check_problem_date'])&&!empty($volunteer['last_check_problem_date']))
                                            {
                                                echo $volunteer['last_check_problem_date'];
                                            }
                                            
                                            ?>   </td>
                                            <td class="text-center" colspan="4" >         </td>
                                            </tr>
                                            <tr >
                                            <th  class="info text-center" colspan="2"  >     التوجيه:</th>
                                            <td class="text-center"  colspan="6" > 
                                            <?php
                                            
                                            if(isset($volunteer['twgeh'])&&!empty($volunteer['twgeh']))
                                            {
                                                echo $volunteer['twgeh'];
                                            }
                                            
                                            ?>
                                            
                                            
                                             </td>

                                            </tr>
                                            <tr>
                                            <th  class="info text-center" colspan="2" >     تنفيذ التوجيه:</th>
                                            
                                            <?php
                                     
                                     $twgeh = array(1=>'تم',2=>'لم يتم');
                 foreach ($twgeh as $key => $value) {
                     $checked = '';
                     if (isset($volunteer['tnfez_twgeh'])&&($volunteer['tnfez_twgeh']!='')) {
                         $alltwgeh = $volunteer['tnfez_twgeh'];
                         if ($key==$alltwgeh) {
                             $checked = 'checked';
                         }
                     }
                     
                     ?>
                  
                    <td class="text-center" colspan="3">
                     <div class="radio-content">

                         <input type="radio"   
                         
                         data-validation="required" disabled
                         class="form-control"
                                                        name="tnfez_twgeh"
                                                        id="gri<?= $key ?>"
                                                        value="<?= $key ?>"
                                                         width="10px;" <?= $checked ?>
                                                       
                                                        >
                         <label   class="radio-label" for="gri<?= $key ?>">             <?= $value ?>         </label>
                     </div>
                     <?php if($key==2 &&$alltwgeh==2){
                        
                                            
                           if(isset($volunteer['reason'])&&!empty($volunteer['reason']))
                           {
                               echo ' السبب:';
                               echo $volunteer['reason'];
                           }
                        }
                           ?> 
                     
                     </td>
                     
                 <? } ?>            
                                            
                                            

                                            </tr>
                                            <tr class="info">
                                            <th class="text-center" colspan="8" class="text-center">إغلاق الشكوي</th>
                                            </tr>


                                            <tr class="info">
                                            <th class="text-center" colspan="2" class="info">      اسم من إغلق  الشكوي  </th>
                                            <th class="text-center" colspan="2" class="info">         تاريخ  إغلاق الشكوي    </th>
                                            <th  class="text-center" colspan="4" class="info">         التوقيع   </th>
                                            </tr>

                                            <tr>
                                            <td  class="text-center" colspan="2" >    <?php
                                            
                                            if(isset($volunteer['close_problem_n'])&&!empty($volunteer['close_problem_n']))
                                            {
                                                echo $volunteer['close_problem_n'];
                                            }
                                            
                                            ?> </td>
                                            <td  class="text-center" colspan="2" >         <?php
                                            
                                            if(isset($volunteer['close_problem_date'])&&!empty($volunteer['close_problem_date']))
                                            {
                                                echo $volunteer['close_problem_date'];
                                            }
                                            
                                            ?>   </td>
                                            <td  class="text-center" colspan="4" >         </td>
                                            </tr>
                                        </table>
                               
              
                                
             
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
       <h1 style="font-size: 18px !important;margin-top: 28px;" class="title-fe span_font">نموذج الشكوي والتظلم  </h1>
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