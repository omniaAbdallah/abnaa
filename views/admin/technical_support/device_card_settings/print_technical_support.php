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
.table>thead>tr>td.info, .table>tbody>tr>td.info, .table>tfoot>tr>td.info, .table>thead>tr>th.info, .table>tbody>tr>th.info, .table>tfoot>tr>th.info, .table>thead>tr.info>td, .table>tbody>tr.info>td, .table>tfoot>tr.info>td, .table>thead>tr.info>th, .table>tbody>tr.info>th, .table>tfoot>tr.info>th {
    background-color: #c3c3c3 !important ;
    color: black !important;
    font-size: 15px !important;
    border-radius: 3px !important;
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
                                    <table class="table table-bordered" style="table-layout: fixed">
                                      
                                        <tbody>
                                          <tr class="info">
                                            <th colspan="3" >رقم الطلب::</th>
                                            <td colspan="3" width="15%">
                                                           <?php
                                            if(isset($record->rkm_talb)&&!empty($record->rkm_talb))
                                            {
                                                echo $record->rkm_talb;
                                            }
                                            ?>
                                            </td>

                                            <th colspan="3" >تاريخ تقديم الطلب   :</th>
                                            <td colspan="3" width="15%">
                                            <?php 
                   if(isset($record->talb_date)&&!empty($record->talb_date))
                    {
                        echo $record->talb_date;
                    }
                   ?>
                                            </td>

                                            <th colspan="3">وقت تقديم الطلب:   :</th>
                                            <td colspan="3" width="15%">
                                                           <?php
                                            if(isset($record->time_added)&&!empty($record->time_added))
                                            {
                                                echo $record->time_added;
                                            }
                                            ?>
                                            </td>
                                           
                                        </tr>
                                        </tbody>
                                        </table>


                                        <div class="col-md-12">
                                <table class="table table-bordered ">
        <tbody>
       
             
             <tr>
             <th >مقدم الطلب  </th>
             <td class="infotd text-center">
               <?=$record->emp_name?>
                </td>
           
           
                <th   colspan="1">
               الادارة </th>
                <td class="infotd text-center" colspan="2">
               <?=$record->edara_n?>
                </td>
              
                <th  colspan="1">
               القسم</th>
                <td class="infotd text-center" colspan="2">
               <?=$record->qsm_n?>
                </td>
                </tr>
              
              
                </tbody>
                </table>
                                </div>




                                <div class="piece-box">
                                    <table class="table table-bordered" style="table-layout: fixed">
                                        <thead>
                                        <tr class="info">
                                            <th colspan="12" class="text-center">تفاصيل الطلب</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <th colspan="3" > كود الجهاز:</th>
                                            <td colspan="3" width="15%">
                                            <?php
                        if (isset($record->device_code) && !empty($record->device_code)) {
                            
                                        echo $record->device_code;
                                    }
                         ?>
                                            </td>

                                            <th colspan="3" > الرقم التسلسلي للجهاز:</th>
                                            <td colspan="3" width="20%">
                                            <?php
                                            if(isset($record->device_rkm)&&!empty($record->device_rkm))
                                            {
                                                echo $record->device_rkm;
                                            }
                                            ?>
                                            </td>
                                           
                                        </tr>
										<tr class="info">
                                        

                                            <th colspan="3" >نوع الطلب: </th>
                                            <td colspan="9" width="15%">
											
                                            
                                            <?php
                       
                        if (isset($talb_types) && !empty($talb_types)) {
                            foreach ($talb_types as $row) {
                                ?>
                                    <?php
                                    if ($record->talb_type == $row->id) {
                                      echo $row->name; 
                                    }
                                    ?>
                                
                            <?php }
                        } ?>
                                            </td>
                                            
											
                                        </tr>
										<tr>
                                            <th colspan="3" >وصف الدعم:</th>
                                            <td colspan="9" width="15%">
											<?php
                                            if(isset($record->wasf)&&!empty($record->wasf))
                                            {
                                                echo $record->wasf;
                                            }
                                            ?>
                                            </td>
                                           
                                        </tr>
                                        <tr class="info">
                                            <th colspan="3" > مدى الحدوث :</th>
                                            <td colspan="9" width="15%">
                                            <?php
                        $mada_hdoth_types=array('first_time'=>' أول مره',
                        'more_than_one'=>' اكثر من مرة ',
                        'not_selected'=>' غير محدد '
                    );
                        if (isset($mada_hdoth_types) && !empty($mada_hdoth_types)) {
                            foreach ($mada_hdoth_types as $row=>$valuee) {
                                ?>
                                
                                    <?php
                                    if ($record->mada_hdoth == $row) {
                                      echo $valuee;
                                    }
                                    ?>
                             
                            <?php }
                        } ?>
                                             </td>

                                            
                                           
                                           
                                        </tr>
                                     
                                        <tr>
                                            <th colspan="3">التوقيع :</th>
                                            <td colspan="3" width="15%">
									
                                            </td>
                                            <th colspan="3" >توقيع المدير المباشر :</th>
                                            <td colspan="3" width="15%">
										
                                            </td>
                                           
                                        </tr>
                                      
                                        </tbody>
                                        </table>
                                </div>
       
                <!--  -->
                </body>
                </div>
            </div>
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
 
      <div class="text-center">
       <h1 style="font-size: 18px !important;margin-top: 100px;" class="title-fe span_font">طلب دعم فني تقني</h1>
     </div>
   
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