
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




    <section class="main-body">
        <?php 
        /*
        echo '<pre>';
        print_r($rows[0]);*/
        $row=$rows[0]; 
         ?>

        <div class="print_forma  col-xs-12 ">
            <div class="col-xs-12 no-padding">
                <div class="col-xs-4 text-center">

                </div>
                <div class="col-xs-4 text-center">
                    <h4 class="green-border"><span>طلب تعجيل سداد سلفة </span></h4>
                </div>
                <div class="col-xs-4 text-center">

                </div>
            </div>

            <div class="piece-box" style="margin-top: 20px">
                <div class="piece-body">
                    <div class="col-xs-12">
                        <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                            <tbody>
                                <tr class="rosasy-bg">
                                    <td style="width: 120px">رقم الطلب</td>
                                    <td class="white-bg"><?php echo $row->t_rkm; ?></td>

                                    <td style="width: 120px">تاريخ الطلب</td>
                                    <td class="white-bg"><?php echo $row->t_rkm_date_m; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-xs-12">
                        <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                            <tbody>
                                <tr class="rosasy-bg">
                                    <td style="width: 70px">الإسم </td>
                                    <td class="white-bg"><?php echo $row->emp_name; ?></td>
                                    <td style="width: 120px">الرقم الوظيفي</td>
                                    <td style="width: 100px" class="white-bg"><?php echo $row->emp_code_fk; ?></td>
                                    <td style="width: 90px">الوظيفة</td>
                                    <td class="white-bg"><?php echo $row->job_title; ?></td>

                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-xs-12">
                        <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                            <tbody>
                                <tr class="rosasy-bg">
                                    <td style="width: 80px">مبلغ السلفة</td>
                                    <td style="width: 100px" class="white-bg"><?php echo $row->qemt_solaf; ?></td>
                                         <td style="width: 100px">عدد الأقساط</td>
                                    <td style="width: 70px" class="white-bg"><?php echo $row->qst_num; ?></td>
                                    <td style="width: 90px">قيمة القسط</td>
                                    <td style="width: 70px" class="white-bg">
                                        <?php echo $row->qemt_qst ; ?></td>

                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-xs-12">
                        <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                            <tbody>
                                <tr class="rosasy-bg">
                          
                                    <td style="width: 120px">تاريخ أول قسط</td>
                                    <td class="white-bg"><?php echo $row->khsm_form_date_m; ?></td>
                                    <td style="width: 120px">تاريخ أخر قسط</td>
                                    <td class="white-bg"><?php echo $row->khsm_to_date_m; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-xs-12">
                        <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                            <tbody>
                                <tr class="rosasy-bg">
                                    <td style="width: 130px">عن شهر</td>
                                    <td style="width: 100%;text-align: right;" class="white-bg">
                                      <?php 
                                if(isset($row->ta3gel_months) and $row->ta3gel_months != null){
                                    
                                    foreach($row->ta3gel_months as $month){
                                        
                                        echo $month->for_month .'/'.$month->for_year .'-';
                                    }
                                }
                                 if($row->fe2a_ta3gel==1){
                                          echo 'نقدي';
                                          }elseif($row->fe2a_ta3gel==2){
                                             echo ' تحويل';
                                             }elseif($row->fe2a_ta3gel==3){
                                                echo ' خصم من راتب الشهر الحالي ';
                                                }
                                       
                                ?>
                                    
                                    </td>
                                
                        
                                   
                                 
                                </tr>
                            </tbody>
                        </table>
                    </div>

            <div class="col-xs-12">
                        <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                            <tbody>
                                <tr class="rosasy-bg">
                                        
                                    <td style="width: 65px">القيمة</td>
                                    <td class="white-bg"> <?=$row->qemt_ta3gel_value?></td>
                                    
                                    <td style="width: 65px">السبب</td>
                                    <td style="width: 355px;" class="white-bg"><?php echo $row->ta3gel_reason; ?></td>
                                    <td style="width: 65px">التوقيع</td>
                                    <td class="white-bg"> </td>
                                    
                                    
                                    
          </tr>
                            </tbody>
                        </table>
                    </div>


                </div>

            </div>
            <?php  if ($row->level > 2 || $row->level > 3  || $row->suspend != 0 ) {   ?>
            <div class="piece-box" style="margin-top: 0px">
                <div class="col-xs-12 text-center" style="position: unset !important;">
                    <div class="piece-heading">

                        <h5>إفادة الموارد البشرية</h5>
                    </div>

                </div>
                <div class="piece-body">
 
                <div class="col-xs-12" style="position: unset !important;">
                        <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                            <tbody>
                                <tr class="rosasy-bg">
                                    <?php if (!empty($row->action_moder_hr)) {
                                                if ($row->action_moder_hr == 1) {
                                                    $check1='check-';
                                                    $check2='';
                                                    $check3='';
                                                }elseif ($row->action_moder_hr == 2) {
                                                    $check1='';
                                                    $check2='check-';
                                                    $check3='';  }
                                                elseif ($row->action_moder_hr == 3) {
                                                    $check1='';
                                                    $check2='';
                                                    $check3='check-';
                                                    }
                                            }else {
                                                    $check1='';
                                                    $check2='';
                                                    $check3='';
                                                } ?>
                                    <td>
                                        <i class="fa fa-<?=$check1?>square-o"></i> تم التأكد من صحة البيانات  
                                        </td>
                                    <td>
                                        <i class="fa fa-<?=$check2?>square-o"></i> لم يتم التأكد من صحة البيانات  
                                    </td>
                
                                </tr>
                            </tbody>
                        </table>
                    </div>
 

               

            

                    <div class="col-xs-12">
                        <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                            <tbody>
                                <tr class="rosasy-bg">
                                    <td style="width: 130px">ملاحظات</td>
                                    <td class="white-bg"></td>


                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-xs-12 signatures" style="padding-top: 10px;padding-bottom: 10px;">
                        <div class="col-xs-6 padding-4">
                            <h6 >مدير الموارد البشرية /   <?php 
                    if(isset($modeer_hr) and $modeer_hr !=null){
                        echo $modeer_hr;
                    }else{
                        
                    }
                    ?></h6>
                        
                     
                        </div>
                        <div class="col-xs-3 padding-4">
                            <h6  >التوقيع : 
 <!--<img src="<?php echo base_url();?>uploads/human_resources/emp_sign/2.png" 
 style="width: 131px; position: absolute;bottom: -23px;left: 11px;"/>-->
                            </h6>

                        </div>
                        <div class="col-xs-3 padding-4">
                          <h6  >التاريخ : 
                            
                            </h6>

                        </div>

                    </div>



                </div>

            </div>
            <?php }?>
            <?php  if ($row->level > 4 || $row->level > 5 ||$row->suspend != 0 ) {   ?>

            <div class="piece-box" style="margin-top: 0px">
                <div class="col-xs-12 text-center" style="position: unset !important;">
                    <div class="piece-heading">

                        <h5>الشئون المالية والإدارية</h5>
                    </div>

                </div>
                <div class="piece-body">
                  
                  
                           <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                            <tbody>
                                <tr class="rosasy-bg">
                                    <?php if (!empty($row->action_mohaseb)) {
                                                if ($row->action_mohaseb == 1) {
                                                    $check_action_mohaseb1='check-';
                                                    $check_action_mohaseb2='';
                                                    $check_action_mohaseb3='';
                                                }elseif ($row->action_mohaseb == 2) {
                                                    $check_action_mohaseb1='';
                                                    $check_action_mohaseb2='check-';
                                                    $check_action_mohaseb3='';  }
                                                elseif ($row->action_mohaseb == 3) {
                                                    $check_action_mohaseb1='';
                                                    $check_action_mohaseb2='';
                                                    $check_action_mohaseb3='check-';
                                                    }
                                            }else {
                                                    $check_action_mohaseb1='';
                                                    $check_action_mohaseb2='';
                                                    $check_action_mohaseb3='';
                                                } ?>
                                    <td>
                                        <i class="fa fa-<?=$check_action_mohaseb1?>square-o"></i> الرصيد مطابق  
                                        </td>
                                    <td>
                                        <i class="fa fa-<?=$check_action_mohaseb2?>square-o"></i> الرصيد غير مطابق  
                                    </td>
                
                                </tr>
                            </tbody>
                        </table>
                  
                    <div class="col-xs-12">
                        <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                            <tbody>
                                <tr class="rosasy-bg">
                                    <td style="width: 130px">ملاحظات</td>
                                    <td class="white-bg"></td>


                                </tr>
                            </tbody>
                        </table>
                    </div>
                  
                  
                  
                    <div class="col-xs-12 signatures" style="padding-top: 10px;padding-bottom: 10px;">
                        <div class="col-xs-6 padding-4">
                                  <h6 >المحاسب /   <?php 
                    if(isset($mohaseb) and $mohaseb !=null){
                        echo $mohaseb;
                    }else{
                        
                    }
                    ?></h6>

                        </div>
                        <div class="col-xs-3 padding-4">
                            <h6>التوقيع : </h6>

                        </div>
                        <div class="col-xs-3 padding-4">
                            <h6>التاريخ : </h6>

                        </div>

                    </div>
                
                </div>
            </div>
            <?php }?>


            <?php  if ($row->level > 6  ||$row->suspend != 0 ) {   ?>

            <div class="piece-box" style="margin-top: 0px">
                <div class="col-xs-12 text-center" style="position: unset !important;">
                    <div class="piece-heading">

                        <h5>إعتماد مدير الشئون المالية والإدارية </h5>
                    </div>

                </div>
                <div class="piece-body">
                    <div class="col-xs-12">
                        <?php if (!empty($row->action_moder_final)) {
                                        if ($row->action_moder_final == 4) {
                                            $check1='check-';
                                            $check2='';


                                        }elseif ($row->action_moder_final == 5) {
                                            $check1='';
                                            $check2='check-';
                                         }
                                } ?>
                         <div class="col-xs-6">       
                        <h5><i class="fa fa-<?=$check1?>square-o"></i>&nbsp يعتمد &nbsp
                        </h5>
                        </div>
                        <div class="col-xs-6"> 
                        <h5><i class="fa fa-<?=$check2?>square-o"></i>&nbsp لا يعتمد &nbsp
                            </h5>
                  
                            </div>
                    </div>
                      <div class="col-xs-12">
                      <?php 
                         if($row->fe2a_ta3gel==1){
                          $title_edara =  'لأمين الصندوق';
                          }elseif($row->fe2a_ta3gel==2){
                             $title_edara =  ' الحسابات';
                             }elseif($row->fe2a_ta3gel==3){
                                $title_edara =  'إدارة الموارد البشرية';
                                }
                      
                      ?>
                      
                      
                      
         <h6 style="font-size: 11px;"> -  <?=$title_edara?> لإتخاذ اللازم</h6> 
</div>
                    <div class="col-xs-12">
                        <div class="col-xs-7 padding-4">


                        </div>
                        <div class="col-xs-5 padding-4 text-center">
                            <h4 style="font-weight: 600; font-size: 20px; margin-bottom: 40px;">مدير الشئون المالية والإدارية
                            </h4>
                            
                            <h4 style="font-weight: 600; font-size: 20px">
                             <?php 
                     if(isset($modeer_mali) and $modeer_mali !=null){
                        echo $modeer_mali;
                    }else{
                        
                    }
                             ?> </h4>

                        </div>


                    </div>

                </div>
            </div>
            <?php }?>

        </div>


 
    </section>


    <script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
    <script src="<?php echo base_url()?>asisst/admin_asset/js/bootstrap-arabic.min.js"></script>
    <script src="<?php echo base_url()?>asisst/admin_asset/js/custom.js"></script>


</body>
<div class="footer-info" >
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
