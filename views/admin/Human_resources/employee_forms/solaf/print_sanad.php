    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/bootstrap-arabic-theme.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/bootstrap-arabic.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/style.css">
    <style type="text/css">
        .main-body {
            /* background-image: url(<?php echo base_url() ?>asisst/admin_asset/img/pills/paper-bg.png);*/
            background-position: 100% 100%;
            background-size: 100% 100%;
            background-repeat: no-repeat;
            -webkit-print-color-adjust: exact !important;
            height: 295mm;
        }
        .print_forma {
            padding: 100px 0 50px 0;
            /border:1px solid #73b300;/
        }
        .piece-box {
            /margin-bottom: 12px;/
            display: inline-block;
            width: 100%;
        }
        .piece-heading {
            background-color: #9bbb59;
            display: inline-block;
            float: right;
            width: 100%;
        }
        .header-info, .header-space{
    height: 192px;
}
.header-info {
  position: fixed;
  top: 0;
  width: 100%;
}
        .piece-body {
            width: 100%;
            float: right;
        }
        .bordered-bottom {
            border-bottom: 4px solid #9bbb59;
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
            margin-bottom: 0;
            font-size: 19px;
        }
        .piece-box table th,
        .piece-box table td {
            /padding: 2px 8px !important;/
        }
        .piece-box .table > thead > tr > th, .piece-box .table > tbody > tr > th,
        .piece-box .table > tfoot > tr > th, .piece-box .table > thead > tr > td,
        .piece-box .table > tbody > tr > td, .piece-box .table > tfoot > tr > td {
            text-align: center;
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
        .main-title {
            display: table;
            text-align: center;
            position: relative;
            height: 120px;
            width: 100%;
        }
        .main-title h4 {
            display: table-cell;
            vertical-align: bottom;
            text-align: center;
            width: 100%;
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
            .table-bordered.double > thead > tr > th, .table-bordered.double > tbody > tr > th,
            .table-bordered.double > tfoot > tr > th, .table-bordered.double > thead > tr > td,
            .table-bordered.double > tbody > tr > td, .table-bordered.double > tfoot > tr > td {
                border: 2px solid #000 !important;
            }
            .table-bordered.white-border th, .table-bordered.white-border td {
                border: 1px solid #fff !important
            }
        }
       /* @page {
            size: 210mm 297mm  ;
            margin: 0;
        }*/
         @page {
        size: portrait;
    }
        .open_green {
            background-color: #e6eed5;
        }
        .closed_green {
            background-color: #cdddac;
        }
        .table-bordered.double {
            border: 5px double #000;
        }
        .table-bordered.white-border {
            margin-bottom: 3px;
        }
   .table>thead>tr>th,
 .table>tbody>tr>th,
 .table>tfoot>tr>th,
  .table>thead>tr>td,
  .table>tbody>tr>td,
  .table>tfoot>tr>td
{
  border: 1px solid #b9b2b2a8;
  text-align: center;
  vertical-align: middle;
   font-size: 14px;
  padding: 11px 2px;
  border-left: 2px solid #020202ba !important;
    background: #ffffff !important;
    border-radius: 0px !important;
    font-size: 15px !important;
    color: black !important;
}
        .table-bordered > thead > tr > th, .table-bordered > tbody > tr > th,
        .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td,
        .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > td {
            border: 2px solid #000;
        }
        .table-bordered.white-border > tbody > tr > th, .table-bordered.white-border > tbody > tr > td {
            border: 1px solid #eee !important;
            background: #fff;
            border-radius: 0px !important;
            font-size: 19px !important;
            color: black;
        }
        .under-line {
            border-top: 1px solid #abc572;
            padding-left: 0;
            padding-right: 0;
        }
        span.valu {
            padding-right: 10px;
            font-weight: 600;
            font-family: sans-serif;
        }
        .under-line .col-xs-3,
        .under-line .col-xs-4,
        .under-line .col-xs-6,
        .under-line .col-xs-8 {
            border-left: 1px solid #abc572;
        }
        .bond-header {
            height: 100px;
            margin-bottom: 30px;
        }
         .right-img img
       {
           /* width: 100%;*/
            height: 100px;margin-top: 7px;    margin-bottom: 12px;
        }
         .left-img img {
            /width: 100%;/
            height: 100px;margin-top: 7px;
        }
        .main-bond-title {
            display: table;
            height: 100px;
            text-align: center;
            width: 100%;
            margin-top: 150px !important;
        }
        .main-bond-title h3 {
            display: table-cell;
            vertical-align: top;
            color: #d89529;
        }
        .main-bond-title h3 span {
          /* border-bottom: 2px solid #141514;*/
        }
        .green-border span {
            border: 6px double #000;
            padding: 8px 25px;
            border-radius: 10px;
            box-shadow: 2px 2px 5px 2px #000;
        }
        .table-bordered > tbody > tr td.rosasy-bg {
            background-color: #eee;
            border: 1px solid #fff;
        }
        .hl {
            font-family: 'hl';
        }
        .footer-info {
            position: absolute;
            width: 100%;
            bottom: 70px;
        }
 p {
    margin: 0 0 25px;
    font-size: 19px !important;
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
@page {
    size: 210mm 297mm;
  margin: 10px 10px 0px 10px;
}
    </style>
</head>

         <?php 
      //  echo $rkm;
        /*
        echo '<pre>';
        print_r($sanad_details);*/
         $num_quest_not_paids;
        if($num_quest_not_paids == 0){
          $display = 'none';  
        }else{
            $display = '';    
        }
        ?>
<div class="header-info" style="display: <?=$display?>;">
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
       <h1 style="font-size: 20px !important;" class="title-fe span_font">  </h1>
     </div>
  </div>
</div>
<body onload="printDiv('printDiv')" id="printDiv">
  <div class="first-part" style="height: 52vh;">
  <table class="report-container">
  <thead class="report-header">
     <tr>
     </tr>
    </thead>
<tbody class="report-content">
  <tr>
   <td class="report-content-cell">
    <div class="main">

          <div class="col-xs-12 no-padding" >
        <div class="main-bond-title">
            <h3 class="text-center" style="color: black;font-size: 26px;font-weight: 800;
                 text-align:center;
                 display: <?=$display?>;"><span class="">       سند الأمر </span> </h3>
        </div>
        </div>
   
        
      <div class="bond-qabd" style="margin: 0px 10px ;">
        <div class="second-part " style="display:<?=$display?>;">
              <div class="col-xs-12  no-padding" style="line-height:15px">
              <div class="col-xs-4  pad-2">
            <p ><strong style="font-size: 20px;color: black;">حرر فى: </strong><span><?= format_date_new($sanad_details->t_rkm_date_m)?>  </span>
                  </p>
                  </div>
                  <div class="col-xs-4 pad-2">
            <p >
               <strong style="font-size: 20px;color: black;">مكان التحرير:</strong><span> بريدة </span>
                  </p>
                  </div>
                    <div class="col-xs-4 pad-2">
            <p >
                <strong style="font-size: 20px;color: black;">المبلغ:</strong><span> <?= $sanad_details->qemt_solaf?>  </span> ريال سعودى
                  </p>
                  </div>
        </div>
             <div class="col-xs-12  no-padding" style="line-height:15px">
              <div class="col-xs-5  pad-2">
            <p ><strong style="font-size: 20px;color: black;">أتعهد أنا: </strong><span>  <?= $sanad_details->emp_name?>  </span>
                  </p>
                  </div>
                  <div class="col-xs-3 pad-2">
            <p >
               <strong style="font-size: 20px;color: black;">الجنسية:</strong><span> <?= $sanad_details->gensia?> </span>
                  </p>
                  </div>
                    <div class="col-xs-4 pad-2">
            <p >
                <strong style="font-size: 20px;color: black;">هوية رقم:</strong>(<span> <?= $sanad_details->card_num?></span>)
                  </p>
                  </div>
        </div>
                <div class="col-xs-12 no-padding " style="line-height:15px">
              <div class="col-xs-12  pad-2">
            <p style="    line-height: 47px;     text-align: justify;" ><strong style="font-size: 20px;color: black;">بأن أدفع لأمر السادة: </strong><span>
                    <!--<?= $sanad_details->direct_manager_n?> -->
                    الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء
                      </span>
                      
                      <strong style="font-size: 20px;color: black;">مبلغ وقدره: </strong><span>   ( <?= $sanad_details->arabic_qemt_solaf?>  
            ريال فقط لا غير
            )  </span>
            
            <strong style="font-size: 20px;color: black;">دون أى قيد أو شرط فى تاريخ الأستحقاق وهو: 
            <?php 

            
            ?>
            </strong><span> 
             <?= format_date_new($sanad_details->khsm_to_date_m)?>   </span>
            
            <strong style="font-size: 20px;color: black;">علما أن </strong>
            <span>
            لحامل هذا السند حق الرجوع بلا مصروفات ودون اخطار أو عمل احتجاج لعدم الوفاء ، وهذا السند واجب الدفع بدون تعطيل بموجب قرار مجلس الوزراء رقم 692 بتاريخ 
           
             <?
           
            echo '1383/09/26هـ';
             ?>
             المتوج بالمرسوم الملكي الكريم رقم 37 بتاريخ 
            <?
          
            echo '1383/10/11هـ';
             ?>
             بنظام الأوراق التجارية .


            </span>
            
            
                  </p>
                  </div>
        </div>
        
        <!--
                <div class="col-xs-12 no-padding " style="line-height:15px">
              <div class="col-xs-6  pad-2">
            <p ><strong style="font-size: 20px;color: black;">المبلغ كتابة: </strong><span>   ( <?= $sanad_details->arabic_qemt_solaf?>  
            ريال فقط لا غير
            )  </span>
                  </p>
                  </div>
        </div>
                 <div class="col-xs-12 no-padding " style="line-height:15px">
              <div class="col-xs-12  pad-2">
            <p ><strong style="font-size: 20px;color: black;">دون أى قيد أو شرط فى تاريخ الأستحقاق وهو: </strong><span>  <?= $sanad_details->khsm_to_date_m?>   </span>
                  </p>
                  </div>
        </div>
        -->
              <div class="clearfix"></div>
              <br>
               <p class=" text-center" style="margin-bottom: 0;"> <strong style="color: #121312;font-size: large;">والله خير الشاهدين </strong> </p>
               <div class="clearfix"></div>
                <br>
               <p style="padding-right: 10px; "> <strong style="color: #121312;font-size: large;">توقيع المتعهد بالسداد </strong> 
               </p>
               <div class="clearfix"></div>
               
        </div>
         <div class="second-part" style="display:<?=$display?>;">
 <div class="col-xs-12 no-padding"  >
          <div class="col-xs-12 pad-2">
          <p   style="margin-bottom: 0; line-height: 40px;"> <strong style="color: #121312;font-size: large;">  الإســم / </strong> <span><?= $sanad_details->emp_name?> </span> </p>
         </div>
      <div class="col-xs-12 pad-2">
          <p  style="margin-bottom: 0; line-height: 40px;"> <strong style="color: #121312;font-size: large;">  العنوان / </strong> <span> </span> </p>
         </div>
      <div class="col-xs-12 pad-2">
          <p  style="margin-bottom: 0; line-height: 40px;"> <strong style="color: #121312;font-size: large;">  التوقيع / 
        <!--   <img src="<?php echo base_url();?>uploads/human_resources/emp_sign/2.png" style="width: 131px;"/>
          -->
          </strong> <span>  </span> </p>
         </div>
  </div>
</div>

<?php if($num_quest_not_paids == 0){  ?>

         <div class="second-part" style="margin-top: 550px;
    margin-right: 250px;">
 <div class="col-xs-12 no-padding"  >
  <div class="col-xs-6 no-padding"  >
 <img style="    height: 140px;
    width: 300px;
    float: left;
    margin-left: -100px; margin-top: -350px;
    
     " src="<?=base_url()?>/asisst/admin_asset/img/pills/cancel.png">
 </div>
   <div class="col-xs-6 no-padding"  >
  <img style="height: 150px; width: 350px; margin-left: -100px; " src="<?=base_url()?>/asisst/admin_asset/img/pills/sanad_amr.png">

  </div>
 
 </div>
 </div>
 
 <?php } ?>
 


    </div>
  </div>
</td>
</tr>
</tbody>
</table>
</div>
<!--<div class="second-part" style="margin-top: 100px;">
 <div class="col-xs-12 no-padding" id="img-foot">
  <div class="col-xs-12 no-padding">
        <div class="col-xs-12">
          <p style="margin-bottom: 0;border: 1px solid black;padding: 10px;border-radius: 5px;font-size: 16px;">
   لحامل هذا السند حق الرجوع بلا مصروفات ودون اخطار أو عمل احتجاج لعدم  الوفاء ، وهذا السند واجب الدفع بدون تعطيل بموجب قرار مجلس الوزراء رقم 692 بتاريخ 26/09/1383هـ المتوج بالمرسوم الملكي الكريم رقم 37 بتاريخ 11/10/1383هـ بنظام الأوراق التجارية .
            </p>
        </div>
   </div>
  </div>
</div>-->
</body>
<div class="footer-info" style="display: <?=$display?>;">
         <div class="col-xs-12 no-padding print-details-footer">
        <div class="col-xs-6">
        </div>
        <div class="col-xs-2">
       <!--   <p class=" text-center" style="margin-bottom: 0;">رقم الصفحة</p> -->
        </div>
        <div class="col-xs-4">
        </div>
     <div class="col-xs-12 no-padding">
             <img src="<?php echo base_url() ?>asisst/admin_asset/img/pills/page-footer.jpg" width="100%" style="">
       </div>
      </div>
    </div>
<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/bootstrap-arabic.min.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/custom.js"></script>
<script>

    var divElements = document.getElementById("printdiv").innerHTML;
    var oldPage = document.body.innerHTML;
    document.body.innerHTML =
        "<html><head><title></title></head><body><div id='printdiv'>" +
        divElements + "</div></body>";
    window.print();
    
</script>