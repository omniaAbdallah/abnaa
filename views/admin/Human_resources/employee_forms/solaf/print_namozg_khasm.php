    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic-theme.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>css/admin/stylecrm.css">
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/style.css">
    <style type="text/css">
        @import url(<?php echo base_url()?>asisst/admin_asset/fonts/ht/HacenTunisia.css);
        @import url(<?php echo base_url()?>asisst/admin_asset/fonts/hl/HacenLinerScreen.css);
        @import url(<?php echo base_url()?>asisst/admin_asset/fonts/ge/ge.css);
        body {
            font-family: 'hl';
        }
        .main-body {
            background-image: url(<?php echo base_url()?>asisst/admin_asset/img/paper-bg.png);
            background-position: 100% 100%;
            background-size: 100% 100%;
            background-repeat: no-repeat;
            -webkit-print-color-adjust: exact !important;
            height: 295mm;
        }
        .print_forma {
            padding: 130px 0 50px 0;
            /*border:1px solid #73b300;*/
        }
        .piece-box {
            /*margin-bottom: 12px;*/
            display: inline-block;
            width: 100%;
        }
        .piece-heading {
            background-color: #c3c3c3;
            display: inline-block;
            float: right;
            width: 100%;
        }
        .piece-heading h5 {
            color: #000;
            padding: 2px 0;
            font-family: 'hl';
            font-size: 20px;
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
            margin-bottom: 6px;
            font-size: 17px;
        }
        .piece-box table th,
        .piece-box table td {
            /*padding: 2px 8px !important;*/
        }
        .piece-box .table>thead>tr>th,
        .piece-box .table>tbody>tr>th,
        .piece-box .table>tfoot>tr>th,
        .piece-box .table>thead>tr>td,
        .piece-box .table>tbody>tr>td,
        .piece-box .table>tfoot>tr>td {
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
            .table-bordered.double>thead>tr>th,
            .table-bordered.double>tbody>tr>th,
            .table-bordered.double>tfoot>tr>th,
            .table-bordered.double>thead>tr>td,
            .table-bordered.double>tbody>tr>td,
            .table-bordered.double>tfoot>tr>td {
                border: 2px solid #000 !important;
            }
            .table-bordered.white-border th,
            .table-bordered.white-border td {
                border: 1px solid #fff !important
            }
              .table-bordered.rmady-border th,
            .table-bordered.rmady-border td {
                border: 1px solid #bbbbbb !important
            }
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
        .table-bordered>thead>tr>th,
        .table-bordered>tbody>tr>th,
        .table-bordered>tfoot>tr>th,
        .table-bordered>thead>tr>td,
        .table-bordered>tbody>tr>td,
        .table-bordered>tfoot>tr>td {
            border: 2px solid #000;
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
        .bond-header .right-img img,
        .bond-header .left-img img {
            width: 100%;
            height: 100px;
        }
        .main-bond-title {
            display: table;
            height: 100px;
            text-align: center;
            width: 100%;
        }
        .main-bond-title h3 {
            display: table-cell;
            vertical-align: bottom;
            color: #d89529;
        }
        .main-bond-title h3 span {
            border-bottom: 2px solid #006a3a;
        }
        .green-border span {
           /* border: 6px double #000;
            padding: 8px 10px;
            border-radius: 10px;
            box-shadow: 2px 2px 5px 2px #000;*/
            
                border: 5px #000;
    padding: 11px 10px;
    border-radius: 10px;
    box-shadow: 2px 2px 5px 2px #5d5d5d;
            
        }
        .table-bordered>tbody>tr.rosasy-bg td {
            background-color: #eee !important;
            border: 1px solid #eee !important;
            padding: 4px 2px;
        }
        .hl {
            font-family: 'hl';
        }
        .footer-info {
            position: absolute;
            width: 100%;
            bottom: 70px;
        }
        .table-bordered>tbody>tr>td.white-bg {
            background-color: #fff !important;
            border: 1px solid #eee !important
        }
        .signatures h5 {
            margin: 2px 0;
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
/*@page {
    size: 210mm 297mm;
  margin: 5px 10px 0px 10px;
}*/
    @page {
            size: 210mm 297mm;
            margin: 0;
        }
    </style>
</head>
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
       <h1 style="font-size: 20px !important;" class="title-fe span_font">  </h1>
     </div>
  </div>
</div>
<body id="printdiv">
<?php if(isset($talab_emp_data) and $talab_emp_data != null){ ?>
    <section class="main-body">
        <?php 
   //   echo '<pre>';
     //   print_r($talab_emp_data); 
        ?>
        <div class="print_forma  col-xs-12 ">
            <div class="col-xs-12 no-padding">
                <div class="col-xs-4 text-center">
                </div>
                <div class="col-xs-4 text-center">
                    <h4 class="green-border"><span>نموذج الخصم من الراتب</span></h4>
                </div>
                <div class="col-xs-4 text-center">
                </div>
            </div>
            <div class="piece-box" style="margin-top: 44px">
                <div class="piece-body">
                    <div class="col-xs-12">
                        <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                            <tbody>
                                <tr class="rosasy-bg">
                                    <td style="width: 150px;">الإسم </td>
                                    <td style="width: 43%;" class="white-bg"><?php echo $talab_emp_data->emp_name; ?></td>
                                    <td style="">رقم الهوية</td>
                                    <td style="" class="white-bg"><?php echo $talab_emp_data->card_num; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                      <div class="col-xs-12">
                        <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                            <tbody>
                                <tr class="rosasy-bg">
                                    <td style="width: 150px">الرقم الوظيفي</td>
                                    <td style="" class="white-bg"><?php echo $talab_emp_data->emp_code_fk; ?></td>
                                    <td style="width: 150px">المسمى الوظيفي</td>
                                    <td class="white-bg"><?php echo $talab_emp_data->mosma_wazefy_n; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                         <div class="col-xs-12">
                        <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                            <tbody>
                                <tr class="rosasy-bg">
                                    <td style="width: 150px">الإدراة </td>
                                    <td class="white-bg"><?php echo $talab_emp_data->edara_n; ?></td>
                                    <td style="width: 150px">القسم</td>
                                    <td class="white-bg"><?php echo $talab_emp_data->qsm_n; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-xs-12">
                        <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                            <tbody>
                                <tr class="rosasy-bg">
                                    <td style="width: 150px">نوع الخصم</td>
                                    <td class="white-bg"><?php if($talab_emp_data->sadad_solfa==1){echo 'دفع نقدا';}elseif($talab_emp_data->sadad_solfa==2){echo ' تخصم مره واحده علي الراتب';}
                                        elseif($talab_emp_data->sadad_solfa==3){echo 'تخصم شهريا من الراتب';}
                                        ?></td>
                                    <td style="width: 150px">مبلغ الخصم الشهري</td>
                                    <td class="white-bg"><?php echo $talab_emp_data->qemt_qst; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-xs-12">
                        <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                            <tbody>
                                <tr class="rosasy-bg">
                                    <td style="width: 150px">تاريخ بداية الخصم</td>
                                    <td class="white-bg"><?php echo $talab_emp_data->khsm_form_date_m; ?></td>
                                    <td style="width: 150px">تاريخ نهاية الخصم</td>
                                    <td class="white-bg"><?php echo $talab_emp_data->khsm_to_date_m; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
<div class="second-part" style="margin-top: 100px;">
 <div class="col-xs-12 no-padding" id="img-foot">
  <div class="col-xs-12 no-padding">
        <div class="col-xs-12">
          <p style="margin-bottom: 0;padding: 10px;border-radius: 5px;font-size: 16px; font-weight: bold;    margin: 17px 13px 27px;">
 نعم أنا الموظف الموقع أدناه أقر بمعرفتي على إجراء الخصم المذكور بأعلاه وبكامل تفاصيله وعلى ذلك جرى التوقيع .
            </p>
             <table class="table table-bordered hl rmady-border" style="table-layout: fixed;">
    <thead>
      <tr>
        <th style="width: 50%">اسم الموظف</th>
        <th>التاريخ</th>
        <th>التوقيع</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td style="height: 39px;background: white;"><?php echo $talab_emp_data->emp_name; ?></td>
        <td style="height: 39px;background: white;"></td>
        <td style="height: 39px;background: white;"></td>
      </tr>
    </tbody>
  </table>
        </div>
   </div>
  </div>
</div>
    <div class="col-xs-12" style="    margin-top: 23px !important;">
    <div class="col-xs-4 padding-4">
        <h4 style="font-weight: 600; font-size: 20px; margin-bottom: 55px; text-align: center;">الموارد البشرية</h4>
         <h4 style=" font-size: 20px; text-align: center;"> 
         <?php 
         if(isset($modeer_hr) and $modeer_hr !=null){
        echo $modeer_hr;
        }else{
        }
        ?>
         </h4>
    </div>
    <div class="col-xs-4 padding-4 text-center">
         <h4 style="font-weight: 600; font-size: 20px; margin-bottom: 55px;"> الشؤون المالية والإدارية</h4>
         <h4 style=" font-size: 20px"> 
          <?php 
         if(isset($modeer_mali) and $modeer_mali !=null){
        echo $modeer_mali;
        }else{
        }
        ?>
         </h4>
    </div>
    <div class="col-xs-4 padding-4 text-center">
        <h4 style="font-weight: 600; font-size: 20px; margin-bottom: 55px;">مدير عام الجمعية  </h4>
        <h4 style="font-size: 20px">
        <?php 
         if(isset($modeer_3am) and $modeer_3am !=null){
        echo $modeer_3am;
        }else{
        }
        ?> </h4>
    </div>
</div>
            </div>
        </div>
    </section>
<? } ?>
    <script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
    <script src="<?php echo base_url()?>asisst/admin_asset/js/bootstrap-arabic.min.js"></script>
    <script src="<?php echo base_url()?>asisst/admin_asset/js/custom.js"></script>
</body>
<div class="footer-info" >
         <div class="col-xs-12 no-padding print-details-footer">
        <div class="col-xs-6">
        </div>
        <div class="col-xs-2">
        </div>
        <div class="col-xs-4">
        </div>
     <div class="col-xs-12 no-padding">
             <img src="<?php echo base_url() ?>asisst/admin_asset/img/pills/page-footer.jpg" width="100%" style="">
       </div>
      </div>
    </div>
</html>
<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/bootstrap-arabic.min.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/custom.js"></script>
<script>
/*
    var divElements = document.getElementById("printdiv").innerHTML;
    var oldPage = document.body.innerHTML;
    document.body.innerHTML =
        "<html><head><title></title></head><body><div id='printdiv'>" +
        divElements + "</div></body>";
    window.print();
</script>