
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

          /*  background-image: url(<?php echo base_url()?>asisst/admin_asset/img/paper-bg.png);*/
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
            text-align: right;
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
                border: 1px solid #fff !important;
                background: #e8e8e8 !important;
            
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
             background: #e8e8e8 !important;
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
            border: 6px double #000;
            padding: 8px 10px;
            border-radius: 10px;
            box-shadow: 2px 2px 5px 2px #000;
            margin-left: 23px;
           
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
        
        .table-bordered > tbody > tr > th, .table-bordered > tbody > tr > td{
            background: none !important;
        }
    </style>


</head>
<div class="header-info">
         <div class="bond-header">
          <div class="col-xs-4 pad-2">
           <div class="right-img">
           <!-- <img src="<?php echo base_url() ?>asisst/admin_asset/img/pills/sympol1.png">-->
          </div>
        </div>
        <div class="col-xs-3 pad-2">
        </div>
        <div class="col-xs-5 pad-2">
         <div class="left-img">
         <!-- <img src="<?php echo base_url() ?>asisst/admin_asset/img/pills/sympol2.png">-->
        </div>
      </div>
      <div class="text-center">
       <h1 style="font-size: 20px !important;" class="title-fe span_font">  </h1>
     </div>
  </div>
</div>

<body id="printdiv">



<!--<body  onload="printDiv('printDiv')" id="printDiv">-->
 <?php //echo"<pre>"; print_r($result); echo"</pre>"; //die; ?>

 <section class="main-body">

			 <div class="container-fluid">

				 <div class="print_forma  col-xs-12">
					 <!--<div class="col-xs-12 no-padding" style="margin-top: 5px">
						 <div class="col-xs-3 text-center">

						 </div>
						 <div class="col-xs-5 text-center">
							 <h4 class="green-border"><span>نموذج طلب تحويل</span></h4>
						 </div>
						 <div class="col-xs-4 text-center">

						 </div>
					 </div>-->


					 <div class="piece-box" style="margin-top: 10px">
						<!-- <div class="col-xs-12">
							 <?php
		 					if(!empty($_POST['method_type'])){
		 									 if( $_POST['method_type']  ==1){ ?>
		 					<h5 class="text-center" style="text-align: center;">
		 						عن طريق المصرف /البنك
		 					</h5>
		 					<?php }elseif($_POST['method_type'] ==2){ ?>
		 					<h5 class="text-center" style="text-align: center;">
		 						عن طريق الأونلاين

		 					</h5>
		 					<?php }  } ?>
						 </div>-->
						 <div class="col-xs-11 col-xs-offset-1">
							 <h3 style="font-weight: bold;margin-top: 60px;margin-bottom: 20px;">
                                <?=$result->start_laqb_name?>
                                <?php echo'/'.$result->geha_name ?>
                                  <span style="margin-left: 60px;float: left;"> <?=$result->end_laqb_name?></span> </h3>
                                  
                                  
       
                                  
                                  
                                  
                                  
						 </div>
						 <div class="col-xs-12">
<?php 
/*
echo '<pre>';
print_r($result);*/

?>
<h5 style="text-align: center;    padding-bottom: 15px;font-weight: bold;" >
   السلام عليكم ورحمة الله وبركاته ،،وبعد،،،</h5>
<h5 style=" padding-bottom: 10px;    margin-right: 20px;">
نرجو 
 من سعادتكم إجراء التحويلات التالية :-</h5>

					 </div>
						 <div class="col-xs-12">
							 <table class="table table-bordered">
								 <thead >
									 <tr class="graytd">
										 <th class="text-center" style="text-align: center;">
											 المبلغ
										 </th>
										 <th class="text-center" style="text-align: center;">
											 الحساب المحول منه

										 </th>
										 <th class="text-center" style="text-align: center;">
											 الحساب المحول إليه

										 </th>
									 </tr>
								 </thead>
								 <tbody>
									 <?php if(!empty($result_details)){
										 foreach ($result_details as   $value) {




									 ?>	
									 <tr>	
										 <td><?php echo number_format($value->value,2).' '.convertNumber($value->value).'  ريال فقط لا غير' ;?></td>
										 <!--<td><?php echo $value->from_ayban_rkm_full.'-'.$value->from_general_hesab_name;?></td>-->
                                         <td><?php 
                                         echo $firstStringfrom  = substr("$value->from_ayban_rkm_full", 9, -1);
                                         echo $secondStringfrom = substr("$value->from_ayban_rkm_full", 23, 23);
                                        //  echo ' فرع '; 
                                        // echo $thirdStringfrom  = substr("$value->from_ayban_rkm_full", 9, -12);
                                         
                                         
                                         ?></td>
                                         
                                         
                                         
										 <td><?php
                                          echo $firstStringto  = substr("$value->to_ayban_rkm_full", 9, -1);
                                         echo $thirdStringto = substr("$value->to_ayban_rkm_full", 23, 23);
                                         
                                         // echo $value->to_ayban_rkm_full.'-'.$value->to_general_hesab_name;
                                         
                                       /*   echo $firstStringto  = substr("$value->to_ayban_rkm_full", 18, 23);
                                          echo ' فرع '; 
                                         echo $thirdStringto  = substr("$value->from_ayban_rkm_full", 9, -12);
                                         */
                                         
                                         ?>
                                         
                                         
                                         
                                         
                                         </td>
									 </tr>
								 <?php }  } ?>







								 </tbody>
								 <!--<tfoot>
									 <th >الغرض من التحويل</th>
									 <th style="text-align: right;" colspan="2"><?php if(!empty( $result->reason)){ echo $result->reason;}?></th>
								 </tfoot>-->
							 </table>
						 </div>
						 <div class="col-xs-12">

							 <h5 style="padding-top: 10px;line-height: 34px; margin-right: 20px;">   يفوض مندوب الجمعية الموظف  /
                            <span style="font-weight: bold;"> <?php if(!empty($result->emp_name)){ echo $result->emp_name;}?> 
                               </span>
                                رقم الهوية
                                <span style="font-weight: bold;"> 
                                 <?php if(!empty($result->emp_card_num)){ 
                                    echo '(' . $result->emp_card_num .')';
                                    }?> 
                                     </span>
                                    لإجراء عملية التحويل
                                    <!--
                                    التوقيع/-------- التاريخ/<?php if(!empty($result->process_date)){ echo date('d-m-Y',$result->process_date);}?> م
                                    -->
                                    
                                    </h5>
						 </div>
                         
                         
                         
 <h4 style="text-align: center;    padding-bottom: 15px;font-weight: bold;" >
  شاكرين تعاونكم والله يحفظكم ويرعاكم,,, </h4>
                         
                         
					 </div>
                   
					 <div class="piece-box" style="margin-top: 0px">



				
                
                

						 <div class="col-xs-12">
							 <div class="col-xs-6 text-center">
								 <h3 style="font-weight: bold;padding-bottom: 50px;">أمين الصندوق </h3>
								 <h4><?=  $result->amin_name?></h4>
							 </div>
                             <?php 
                             if($result->manager_name == null and  $result->naeb_name == null){
                                $manseb = '';
                                $person_name = '' ;
                             }elseif($result->manager_name != null and  $result->naeb_name == null){
                                $manseb = 'رئيس مجلس الإدارة';
                                $person_name =$result->manager_name;
                             }elseif($result->manager_name == null and  $result->naeb_name != null){
                                 $manseb = 'نائب رئيس مجلس الإدارة';
                                $person_name = $result->naeb_name; 
                             }
                             
                             ?>
                             
                             
							 <div class="col-xs-6 text-center">
								 <h3 style="font-weight: bold;padding-bottom: 50px;"><?=$manseb?></h3>
								 <h4><?=$person_name?></h4>
							 </div>
						 </div>

  


					 </div>
                   




				 </div>
			 </div>


			 <!--<div class="col-xs-12 no-padding print-details-footer">
				 <div class="col-xs-6">
					 <p class=" text-center" style="margin-bottom: 0;">
						 <small> (بواسطة: <?php if(!empty($result->publisher_name)){ echo $result->publisher_name; } ?>)</small>
					 </p>

				 </div>
				 <div class="col-xs-2">
				 </div>
				 <div class="col-xs-4">

					 <p class=" text-center" style="margin-bottom: 0;">
						 <small>تاريخ الطباعة : <?php echo date('d-m-Y');?></small>
					 </p>
				 </div>


			 </div>-->


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
          <!--   <img src="<?php echo base_url() ?>asisst/admin_asset/img/pills/page-footer.jpg" width="100%" style="">-->
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


    }
</script>
