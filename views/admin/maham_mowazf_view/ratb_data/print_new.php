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

    .greentd td, .greentd th {
    color: #fff !important;
    font-size: 16px !important;
    background-color: #6d6f6e  !important;
    border-radius: 3px !important;
}

.table>thead>tr>td.info, .table>tbody>tr>td.info,
 .table>tfoot>tr>td.info, .table>thead>tr>th.info, 
 .table>tbody>tr>th.info, .table>tfoot>tr>th.info,
  .table>thead>tr.info>td, .table>tbody>tr.info>td, 
  .table>tfoot>tr.info>td, .table>thead>tr.info>th,
  .table>tbody>tr.info>th, .table>tfoot>tr.info>th {
    border-top: 1px solid #ffffff !important;
    border-right: 1px solid #ffffff !important;
    background-color: #6d6f6e  !important;
    color: white !important;
    font-size: 15px !important;
    /* border-radius: 3px !important; */
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
          <div class="col-xs-12 no-padding">
                   <div class="col-sm-12 col-xs-12">
                        <table class="table  table-striped table-bordered dt-responsive nowrap">
                            <tbody>
                            <tr class="">
               <th class="info" style="width: 110px; background-color: #6d6f6e !important;">إسم الموظف</th>
                                <td>
               <?php 
 if (isset($employee['employee']) && !empty($employee['employee'])) { 
            echo   
               $employee['employee'];} ?>
               </td>
               <th class="info" style="width: 110px; background-color: #6d6f6e !important;">كود الموظف </th>
                                <td>
               <?php 
 if (isset($employee['emp_code']) && !empty($employee['emp_code'])) { 
            echo    
               $employee['emp_code'];} ?>
               </td>
            </tr>
            <tr >
                           <th class="info" style="width: 110px; background-color: #6d6f6e !important;"> المسمي الوظيفي </th>
                                            <td>
                           <?php 
 if (isset($employee['mosma_wazefy_n']) && !empty($employee['mosma_wazefy_n'])) { 
            echo   
                           $employee['mosma_wazefy_n'];} ?>
                           </td>
                           <th class="info" style="width: 110px; background-color: #6d6f6e !important;">الاداره- القسم </th>
                                            <td> 
                                            <?php 
 if (isset($employee['edara_n']) && !empty($employee['edara_n'])) { 
            echo   
                                            $employee['edara_n'];} ?>-
                                            <?php 
 if (isset($employee['qsm_n']) && !empty($employee['qsm_n'])) { 
            echo   
                                            $employee['qsm_n'];} ?>
                           </td>
                        </tr>
            </tbody>
                        </table>
                </div>
	</div>
        </div>
        <div class="clearfix"></div>
        <br>
        <!-- Nav tabs -->
        <div class="tab-content">
            <div >
                <div id="show_details">
                    <?php
                    if (isset($allData->badlatt) && !empty($allData->badlatt)) {
                    ?>
                    <table class="table table-bordered" style="table-layout: fixed"
                           >
                        <thead>
                   
                        <tr class="info">
                        <th>المبلغ</th>
                        <th>بيان الاستحقاق </th>
                        <th>المبلغ</th>
                             <th>بيان الاستقطاع  </th>
                            <!-- <th>الاجراء</th> -->
                        </tr>
                        <tbody>
                        <?php
                        foreach ($allData->badlatt as $record) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $record->badalat->value; ?>
                                    </td>
                                    <td>
                                            <?php
                                            if (isset($badalat) && !empty($badalat)) {
                                                foreach ($badalat as $row) {
                                                    ?>
                                                           <?php if ($row->id == $record->badalat->badl_discount_id_fk) {
                                                        echo $row->title; ;
                                                    } ?>
                                                <?php }
                                            } ?>
                                    </td>
                                        <?php }?>
                                        <?php
                                        
                                        
 if(isset($allData->discun) and $allData->discun != null){                                        
                        foreach ($allData->discunt as $record) {
                                ?>
                                    <td>
<?php echo $record->discunt->value; ?>
</td>
<td>   
<?php
if (isset($discounts) && !empty($discounts)) {
    foreach ($discounts as $row) {
        ?>
<?php if ($row->id == $record->discunt->badl_discount_id_fk) {
            echo $row->title; ;
        } ?>
    <?php }
} ?>
</td>
<?php }
}
?>                 
                                </tr>
                                <!------------------------- start_modal - الاستحقاقات------------------------------------------------------------------>
                                <!------------------------- end_modal - الاستحقاقات------------------------------------------------------------------>
                                <?php
                        }
                        ?>
                        </tbody>
                        <tr >
                        <td><?php if (isset($allData->get_having_value) && !empty($allData->get_having_value)) {
                                           echo $allData->get_having_value;
                                       } else {
                                           echo 0;
                                       } ?> 
                            <td class="info" colspan="1"> جملة الإستحقاق </td>
                            <td><?php if (isset($allData->get_discut_value) && !empty($allData->get_discut_value)) {
    echo $allData->get_discut_value;
} else {
    echo 0;
} ?> </td>
                            <td class="info" colspan="1">جملة الاستقطاع   </td>
                        </tr>
                        <tr class="">
                        <td class="info" colspan="2"> الصافي  </td>
                        <td colspan="2"> 
                        <?php 
 if (isset($allData->get_discut_value) && !empty($allData->get_discut_value)) {
    if (isset($allData->get_having_value) && !empty($allData->get_having_value)) {
    echo $allData->get_having_value-$allData->get_discut_value;
}} else {
    echo '0';
}
                        ?>
                        ريال فقط لا غير
                          </td>
                        </tr>
                    </table>
                </div>
            </div>
            <!------------------------------------------------------------------------------------->
    </div>
</div>
                </div>
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
       <h1 style="font-size: 18px !important;margin-top: 28px;" class="title-fe span_font"> بيان مفردات - راتب موظف  </h1>
     </div>
    
    <div class="col-xs-12" style="margin-top: -16px;"> 
      <div class=" gray-background">

      </div>
    </div>
  </div>
</div>
<div class="footer-info" >
         <div class="col-xs-12 no-padding print-details-footer">
        <div class="col-xs-2">

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