<head>


    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/bootstrap-arabic-theme.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/bootstrap-arabic.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/admin_asset/css/style.css">

    <style type="text/css">
        .main-body {

          background-image: url(<?php echo base_url() ?>asisst/admin_asset/img/pills/paper-bg.png);
            background-position: 100% 100%;
            background-size: 100% 100%;
            background-repeat: no-repeat;
            -webkit-print-color-adjust: exact !important;
            height: 295mm;

        }

        .print_forma {
            padding: 100px 0 50px 0;
            /*border:1px solid #73b300;*/

        }

        .piece-box {
            /*margin-bottom: 12px;*/
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
            font-size: 17px;
        }

        .piece-box table th,
        .piece-box table td {


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


        @page {
            size: 210mm 297mm  ;
            margin: 0;

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

        .table-bordered.table-asnaf > thead > tr > th,
        .table-bordered.table-asnaf > thead > tr > td,
        .table-bordered.table-asnaf > tbody > tr > th,
        .table-bordered.table-asnaf > tbody > tr > td,
        .table-bordered.table-asnaf > tfoot > tr > th,
        .table-bordered.table-asnaf > tfoot > tr > td {
            border: 1px solid #000 !important;
            background: #fff !important;
            border-radius: 0px !important;
            font-size: 17px !important;
            color: black;
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
            font-size: 17px !important;
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
            /*
            border: 6px double #000;
            padding: 8px 25px;
            border-radius: 10px;
            box-shadow: 2px 2px 5px 2px #000;*/
            text-decoration: underline;
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
    </style>


</head>
<body id="printdiv">


<section class="main-body">


    <div class="print_forma  col-xs-12 ">
        <div class="col-xs-12 no-padding" style="margin-top: -29px;">
            <div class="col-xs-4 text-center">

            </div>
            <div class="col-xs-4 text-center">
                <h4 class="green-border"><span style="font-size: 24px;margin-left: 80px;">إذن صرف </span></h4>
            </div>
            <div class="col-xs-4 text-center">

            </div>
        </div>

        <div class="piece-box" style="margin-top: 20px">
            <div class="piece-body">
                <div class="col-xs-12">
                    <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                        <tbody>
                        <tr>
                            <td style="width: 100px" class="rosasy-bg">رقم الإذن</td>
                            <td style="width: 50px"> <?=$ezn_data->ezn_rkm ?></td>
                            <td style="width: 100px" class="rosasy-bg">تاريخ الإذن</td>
                            <td style="width: 150px"><?= $ezn_data->ezn_date_ar ?></td>
                            <td style="width: 100px" class="rosasy-bg">الإدارة</td>
                            <td style="width: 225px"><?= $ezn_data->edara_n ?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                
                <div class="col-xs-12 no-padding">
                    <div class="col-xs-1"></div>
                    <div class="col-xs-10 no-padding">
                        <h3 style="font-weight: bold;">سعادة مدير عام الجمعية     
                           <span style="float: left;">حفظه الله</span></h3>
                    </div>
                    <div class="col-xs-1"></div>
                </div>
                <div class="col-xs-12">
                    <h5 class="text-left" style="margin-right: 2%;">السلام عليكم ورحمة الله وبركاته ،،وبعد،،،</h5>
                </div>

                <div class="col-xs-10 " style="margin-right: 2%">
                    <h5>نرجو من سعادتكم التوجيه لمن يلزمه الأمر بعمل اللازم وفقاَ للبيان التالي :- </h5>
                </div>
              
              
              
                     <div class="piece-box no-border">
            <div class="piece-body">

                    <div class="col-xs-12">
                        <table class="table table-bordered  table-asnaf" style="table-layout: fixed;width: 95%;
    margin-right: 17px;">
                            <thead>
                            <th style="width: 110px; font-size: 18px !important; font-weight: bold !important;">المبلغ</th>
                            <th style="width: 250px; font-size: 18px !important; font-weight: bold !important;">اسم الجهة/المستفيد</th>
                            <th style="font-size: 18px !important; font-weight: bold !important;">البيان</th>
                            </thead>
                            <tbody>
               
                                <tr>
                                  
                                    <td><?= $ezn_data->value ?></td>
                                    <td><?= $ezn_data->geha_name ?></td>
                                    <td><?= $ezn_data->about ?></td>
                                </tr>
   
                            </tbody>
                            <tfoot>
                            <th style="font-size: 18px !important; font-weight: bold !important;" colspan="1">مبلغا وقدره</th>
                         
                            <th style="font-size: 18px !important; font-weight: bold !important;    text-align: right;" colspan="2"><?= $number_title ?></th>
                            </tfoot>
                        </table>
                    </div>



     <div class="col-xs-12 hl">
                    
                        <div class="col-xs-5 padding-4">
                            <h4>  <label style="font-weight: bold;">الاسم</label>   :<?php echo $ezn_data->emp_name ?> </h4>
                        </div>
                        <div class="col-xs-3 padding-4">
                            <h4> <label style="font-weight: bold;"> التوقيع: </label>  </h4>
                        </div>
                        <div class="col-xs-4 padding-4">
                            <h4> <label style="font-weight: bold;">  المدير المباشر :</label>   </h4>
                        </div>
                       <!-- <div class="col-xs-2 padding-4 text-right">
                            <h4><?=$ezn_data->action_moder_mobasher_date?>م </h4>
                        </div>-->
                    </div>
      
      
            <div class="col-xs-12 hl">
    <p   style="text-align: center;
    font-size: 20px;
    background: #eeeeee; font-weight: bold;">إفادة الشؤون المالية</p>                  
       
       </div> 
      

    <div class="col-xs-12 hl">
              
                   
                   
                
                  <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                        <tbody>
                
                        <tr>
                    
                              <td style="width: 200px;" class="rosasy-bg">حالة الرصيد</td>
                            <?php if($ezn_data->action_mohaseb == 'accept'){ 
                                $option= 'accept';
                                 $option_title = 'يسمح';
                                ?>
                            
                            
                            <?php }elseif($ezn_data->action_mohaseb == 'refuse'){
                                 $option= 'refuse';
                                 $option_title = 'لا يسمح';
                                ?>
                            
                            <?php }else{
                               $option_title = '';  
                            } ?>


      <td>
                        <input style="" type="checkbox" id="checkboxSuccesssas" value="1"  checked />
                        <label style="    margin-left: 400px;" for="checkboxSuccesssas"><?=$option_title?>
                        </label>
                        </td>  
                     
                        </tr>
                        </tbody>
                    </table>
                
                </div>
        


    <div class="col-xs-12 hl">
                    
                        <div class="col-xs-7 ">
                            <h4>  <label style="font-weight: bold;">المحاسب</label>   :     <?php 
         if(isset($mohaseb) and $mohaseb !=null){
        echo $mohaseb;
        }else{
        }
        ?></h4>
                        </div>
                        <div class="col-xs-3 ">
                            <h4> <label style="font-weight: bold;"> التوقيع: </label>  </h4>
                        </div>
 <div class="col-xs-2 padding-4 text-right">
      <h4><?=$ezn_data->action_mohaseb_date?>م </h4>
 </div>
   
                    </div>
                    
                    
        <div class="col-xs-12 hl">
                   
         

         
                
                  <table class="table table-bordered hl white-border" style="table-layout: fixed;">
                        <tbody>
          
                        <tr>
                         <td style="width: 200px;" class="rosasy-bg">طريقة الصرف</td>
                        <?php
                        if($ezn_data->sarf_method == 'naqdi_ohda'){
                            $sarf_method_name = 'نقدا من العهدة';
                        }elseif($ezn_data->sarf_method == 'from_bank'){
                          $sarf_method_name = 'إصدار شيك من البنك';  
                        }elseif( $ezn_data->sarf_method == 'tahwel_banki'){
                          $sarf_method_name = 'تحويل بنكي';    
                        }elseif($ezn_data->sarf_method == 'sadad_hkomi'){
                          $sarf_method_name = 'سداد مدفوعات حكومية';    
                        }elseif($ezn_data->sarf_method == 'sadad_fwater' ){
                         $sarf_method_name = 'سداد فواتير';   
                        }else{
                            $sarf_method_name = '';
                        }
                         ?>
                        
                           
                            
                       <td>
                        <input  style="" type="checkbox" id="checkboxSuccesssarf_method" value="1" name="sarf_method" checked />
                        <label style="    margin-left: 340px;" for="checkboxSuccesssarf_method"><?=$sarf_method_name?>
                        </label>
                        </td>     
                        
                        
                        
                        </tr>
                        </tbody>
                    </table>
                
                </div>                  
                    
    
    <div class="col-xs-12 hl">
                    
                        <div class="col-xs-7 ">
                            <h4>  <label style="font-weight: bold;">مدير الشئون المالية والإدارية </label>   :     <?php 
         if(isset($modeer_mali) and $modeer_mali !=null){
        echo $modeer_mali;
        }else{
        }
        ?></h4>
                        </div>
                       
                        <div class="col-xs-3 ">
                            <h4> <label style="font-weight: bold;"> التوقيع: </label>  </h4>
                        </div>

 <div class="col-xs-2 padding-4 text-right">
            <h4><?=$ezn_data->action_moder_mali_date?>م </h4>
 </div>
   
                    </div>                
                    
                    
      <div class="col-xs-12 hl">
    <p   style="text-align: center;
    font-size: 20px;
    background: #eeeeee; font-weight: bold;">توجيه المدير العام</p>                  
       
       </div> 
       
              <div class="col-xs-12">
                    <div class="col-xs-8 ">
                      <?php if($ezn_data->action_moder_3am == 'accept'){ 
                                $moder_3am_option= 'accept';
                                $moder_3am_option_name = 'يعتمد';
                                ?>
                            <?php }elseif($ezn_data->action_moder_3am == 'refuse'){
                                 $moder_3am_option= 'refuse';
                                 $moder_3am_option_name = 'لا يعتمد';
                                ?>
                            <?php }else{
                                $moder_3am_option= '';
                                 $moder_3am_option_name = ''; 
                            } ?>
                    
                     
                            <input style="    text-align: center;
    align-items: stretch;
    margin-right: 100px;" type="checkbox" id="checkboxSuccess<?=$moder_3am_option?>" value="1" name="<?=$moder_3am_option?>"
                               <?php if($ezn_data->action_mohaseb == $moder_3am_option ){echo 'checked';}else{  } ?>>
                        <label style="font-size: 16px;" for="checkboxSuccess<?=$moder_3am_option?>"><?=$moder_3am_option_name?>
                        </label>
                    </div>
                    <div class="col-xs-4 text-center">
                        <h5 style="font-weight: bold">مدير عام الجمعية</h5><br>
                        <h5 style="font-weight: bold"><?php 
         if(isset($modeer_3am) and $modeer_3am !=null){
        echo $modeer_3am;
        }else{
        }
        ?></h5>
                    </div>
          


                </div>
       
       
         <div class="col-xs-12 hl">
    <p   style="text-align: center;
    font-size: 20px;
    background: #eeeeee;">اعتماد المفوضين بالتوقيع </p>                  
       
       </div> 
       
       
            <div class="col-xs-12">
                 
       <?php
       if($ezn_data->manager_name !=null and $ezn_data->naeb_name == null ){
        $tawqe3_title = 'رئيس مجلس الإدارة';
        $tawqe3_person = $ezn_data->manager_name;
       }elseif($ezn_data->naeb_name !=null and $ezn_data->manager_name ==null ){
              $tawqe3_title = 'نائب رئيس مجلس الإدارة';
         $tawqe3_person = $ezn_data->naeb_name;
       }else{
       $tawqe3_title = '';
         $tawqe3_person = ''; 
       }
        ?>
                    <div class="col-xs-6 text-center">
                     <br>
                        <h5 style="font-weight: bold">أمين الصندوق</h5><br>
                        <h5 style="font-weight: bold"><?=$ezn_data->amin_name?></h5>
                    </div>
                    <div class="col-xs-6 text-center">
                        <br>
                        <h5 style="font-weight: bold"><?=$tawqe3_title?></h5><br>
                        <h5 style="font-weight: bold"><?=$tawqe3_person?></h5>
                    </div>


                </div>
       
       
 

            </div>
        </div>  


    
            </div>

        </div>

  

    </div>
      <div class="footer-info" >
<?PHP 
if($_SESSION['role_id_fk'] == 1){
   $person_print =$_SESSION['user_name'];  
}elseif($_SESSION['role_id_fk'] == 3){
  $person_print =$_SESSION['emp_name'];    
}else{
   $person_print = ''; 
}


?>
         <div class="col-xs-12 no-padding print-details-footer">
          <div class="col-xs-6">
          <p class=" text-center" style="margin-bottom: 10px;"> <small>
          تمت الطباعه بواسطة : 
          <?=$person_print?>
         	</small></p>

        </div>
      
        <div class="col-xs-4">

          <p class=" text-center" style="margin-bottom: 10px;"> <small>تاريخ الطباعة :   <?php echo  date('Y-m-d h:i:s');  ?></small></p>
        </div>
  <div class="col-xs-2">
       <!--   <p class=" text-center" style="margin-bottom: 0;">رقم الصفحة</p> -->
        </div>

      </div>

    </div>

</section>

</html>
<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/js/bootstrap-arabic.min.js"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/js/custom.js"></script>

<script>




    var divElements = document.getElementById("printdiv").innerHTML;


    var oldPage = document.body.innerHTML;


    document.body.innerHTML =


        "<html><head><title></title></head><body><div id='printdiv'>" +


        divElements + "</div></body>";


    window.print();


</script>
<script language="javascript" type="text/javascript">
/*
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


    }*/
</script>
</body>
