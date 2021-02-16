<style type="text/css">
    .print_forma{
        /*border:1px solid #73b300;*/
        padding: 15px;
    }
    .piece-box {
        margin-bottom: 12px;
        border: 1px solid #73b300;
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
    .bordered-bottom{
        border-bottom: 4px solid #9bbb59 !important;
    }
    .piece-footer{
        display: inline-block;
        float: right;
        width: 100%;
        border-top: 1px solid #73b300;
    }
    .piece-heading h5 {
        margin: 4px 0;
    }
    .piece-box table{
        margin-bottom: 0
    }
    .piece-box table th,
    .piece-box table td
    {
        padding: 2px 2px !important;
    }
    h6 {
        font-size: 16px;
        margin-bottom: 3px;
        margin-top: 3px;
    }
    .print_forma table th{
        text-align: right;
    }
    .print_forma table tr th{
        vertical-align: middle;
    }
    .no-padding{
        padding: 0;
    }
    .header p{
        margin: 0;
    }
    .header img{
        height: 70px;
        width: 80px;
        margin: auto;
    }
    .main-title {
        /* display: table; */
        text-align: center;
        /* position: relative; */
        height: 120px;
        /* width: 40%; */
    }
    .main-title h4 {
        /* display: table-cell; */
        /* vertical-align: bottom; */
        text-align: center;
        width: 100%;
        margin: 0
    }
    .print_forma hr{
        border-top: 1px solid #73b300;
        margin-top: 7px;
        margin-bottom: 7px;
    }
    .no-border{
        border:0 !important;
    }
    .gray_background{
        background-color: #eee;
    }
    @media print{
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    }
    .footer img{
        width: 100%;
        height: 120px;
    }
    @page {
        size: landscape;
        margin: 80px 0 0;
    }
    .open_green{
        background-color: #e6eed5;
    }
    .closed_green{
        background-color: #cdddac;
    }
    .table-bordered>thead>tr>th, .table-bordered>tbody>tr>th,
    .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td,
    .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
        border: 1px solid #000000 !important;
        text-align: center;
        vertical-align: middle;
        font-size: 11px !important;
        padding: 2px;
    }
    .flip-mode{
        writing-mode: vertical-lr;
        text-orientation: mixed;
    }
</style>
<style>
 .all_cont {
    padding: 7px 0px;
}
  .row {
     margin-right:0px; 
     margin-left: 0px; 
} 
.topnav {
  overflow: hidden;
  background-color: #333;
  margin-bottom: 5px;
}
.topnav a {
  float: right;
  color: #f2f2f2;
  text-align: center;
  padding: 6px 14px;
  text-decoration: none;
  font-size: 15px;
}
.topnav a:hover {
 background-color: #0a0a0adb;
    color: #ece5e5;
}
.topnav a.active {
  background-color: #000000;
  color: white;
}
.table1 {
    width: 100%;
    max-width: 100%;
    margin-bottom: 20px;
} 
    .table1 tr,.table1 td
    { 
        border: 1px solid #ddd;
  padding: 8px;color: black;}
    .table2 {
    width: 100%;
    max-width: 100%;
    margin-bottom: 20px;
} 
    .table2 th {
    padding-top: 5px;
    padding-bottom: 5px;
    text-align: center;
    background-color: #50ab20;
    color: white;
    font-weight: 800;
    font-size: 18px;
}
      .table2 th
    { 
        border: 1px solid #ddd;
    }
     .table2 td
    { 
        border: 1px solid #ddd;
  padding: 8px;color: black;text-align: center;}
    .total{margin-top: -25px;
    border: 1px solid #ddd;}
      .panel .panel-heading h1, .panel .panel-heading h2, .panel .panel-heading h3, .panel .panel-heading h4, .panel .panel-heading h5, .panel .panel-heading h6
    {
        color: #222;
    font-size: 16px;
    font-weight: 600;
    }
  .bg-aqua, .callout.callout-info, .alert-info, .label-info, .modal-info .modal-body {
    background-color: #00c0ef !important;
}  
.small-box {
    border-radius: 2px;
    position: relative;
    display: block;
    margin-bottom: 20px;
    box-shadow: 0 1px 1px rgba(0,0,0,0.1);
}   
 .small-box>.inner {
    padding: 10px;
}
.small-box h3 {
    font-size: 20px;
    font-weight: bold;
    margin: 4px 0px 12px 0;
    white-space: nowrap;
    padding: 0;
    color: aliceblue;
    text-align: right;
}   
.small-box p {
    font-size: 17px;
    color: aliceblue;text-align: right;
}
    .small-box>.inner {
    padding: 10px;
}
.small-box .icon {
    -webkit-transition: all .3s linear;
    -o-transition: all .3s linear;
    transition: all .3s linear;
    position: absolute;
    top: 6px;
    left: 10px;
    z-index: 0;
    font-size: 50px;
    color: rgba(255, 252, 252, 0.78);
}   
 .small-box>.small-box-footer {
    position: relative;
    text-align: center;
    padding: 3px 0;
    color: #fff;
    color: rgba(255,255,255,0.8);
    display: block;
    z-index: 10;
    background: rgba(0,0,0,0.1);
    text-decoration: none;
}   
 .small-box>.small-box-footer:hover {
    color: #fff;
    background: rgba(0,0,0,0.15);
}
.small-box>.small-box-footer {
    position: relative;
    text-align: center;
    padding: 3px 0;
    color: #fff;
    color: rgba(255,255,255,0.8);
    display: block;
    z-index: 10;
    background: rgba(0,0,0,0.1);
    text-decoration: none;
}
a:hover, a:active, a:focus {
    outline: none;
    text-decoration: none;
    color: #72afd2;
}
    .small-box:hover .icon {
    font-size: 57px;
}
.media .panel{
    border: none;
    border-radius: 5px;
    box-shadow: none;
    margin-bottom: 14px;
}
.media .panel-heading{
    padding: 0;
    border: none;
    border-radius: 5px 5px 0 0;
}
.media .panel-title a{
   display: -webkit-box;
    padding: 15px 10px;
    background: #fff;
    font-size: 17px;
    font-weight: normal;
    color: #000000;
    letter-spacing: 0px;
    border: 1px solid #2b5c25;
    border-radius: 5px 5px 0 0;
    position: relative;
}
.media .panel-title a i{
    font-size: 22px;
    color: #f28d1e;
    margin-left: 5px
}
.media .panel-title a.collapsed{
    border-color: #2b5c2569;
    border-radius: 5px;
}
.media .panel-title a:before,
.media .panel-title a.collapsed:before,
.media .panel-title a:after,
.media .panel-title a.collapsed:after{
    font-family: 'FontAwesome';
    content:"\f106";
    width: 30px;
    height: 30px;
    line-height: 30px;
    border-radius: 5px;
    background: #81BC48;
    font-size: 20px;
    color: #fff;
    text-align: center;
    position: absolute;
    left: 15px;
    opacity: 1;
    transform: scale(1);
    transition: all 0.3s ease 0s;
}
.media .panel-title a:after,
.media .panel-title a.collapsed:after{
    font-family: 'FontAwesome';
    content: "\f107";
    background: transparent;
    color: #000;
    opacity: 0;
    transform: scale(0);margin-top: -25px;
}
.media .panel-title a.collapsed:before{
    opacity: 0;
    transform: scale(0);
}
.media .panel-title a.collapsed:after{
    opacity: 1;
    transform: scale(1);
}
.media .panel-body{
    /* padding: 10px 10px; */
    background: #e8e8e8;
    border-top: none;
    font-size: 15px;
    color: #fff;
    line-height: 28px;
    letter-spacing: 1px;
    border-radius: 0 0 5px 5px;
}
.btn-label1 {
    position: relative;
    right: -14px;
    display: inline-block;
    padding: 9px 17px;
    background: rgb(239, 168, 34);
    border-radius: 2px 0 0 2px;
    color: #f3f3f3;
    font-size: 17px;
}
 .btn-labeled {
    padding-top: 0;
    padding-bottom: 0;
    margin: 7px 9px;
}   
    .user-profile .sidebar-shortcuts-large>.btn {
    text-align: center;
    width: auto;
    line-height: 30px;
    padding: 3px 10px;border-radius: 10px;
}
    .syst {
    text-align: center;
    padding: 20px 15px;
    background: #fff;
    -webkit-transition: all 0.3s ease 0s;
    transition: all 0.3s ease 0s;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
    margin-bottom: 15px;
    text-align: center;
    border: 1px solid #99999969;
    background-color: #fff;
    border-radius: 13px;
    box-shadow: 0px 2px 6px #736d6d;
}.syst p {
    text-align: center;
    font-size: 18px;
}.syst .download {
    text-align: center;
    padding: 8px 13px;
    background: #f28d1e;
    color: #fff;
    -webkit-transition: all 0.3s ease 0s;
    transition: all 0.3s ease 0s;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    border-radius: 6px;
}
    .profile-activity a.user {
    font-weight: 700;
    color: #09704e;
    font-size: 15px;
    margin: 15px;
}
    .profile-activity img {
    border: 2px solid #C9D6E5;
    border-radius: 100%;
    /* max-width: 40px; */
    margin-left: 10px;
    margin-right: 0;
    box-shadow: none;
    margin-bottom: 10px;
    margin-top: 10px;
}
  .profile-feed {
    height: 250px;
    overflow-y: scroll;
}  
    .attendance{
    border: 1px solid #dad6d6;
    border-radius: 6px;
    padding: 5px 6px;
    margin: 0px 5px;
    background: #03a9f4c7;
    color: white;
}
    .btn-link {
    font-weight: 400;
    color: #2196F3;
    cursor: pointer;
    border-radius: 0;
}
.table-bordered>thead>tr>th, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
    border: 1px solid #000000 !important;
    text-align: center;
    vertical-align: middle;
    font-size: 15px !important;
    padding: 2px;
}
.new_table{
    border: 1px solid #ababab !important;
    text-align: center;
    vertical-align: middle;
    font-size: 15px !important;
    background: none;
    padding: 5px;
    }
    .new_table>thead>tr>th, 
    .new_table>tbody>tr>th, 
    .new_table>tfoot>tr>th,
     .new_table>thead>tr>td, 
     .new_table>tbody>tr>td,
      .new_table>tfoot>tr>td{
         border: 1px solid #ababab !important;
    text-align: center;
    vertical-align: middle;
    font-size: 15px !important;
    background: none;
    padding: 5px;   
      }
</style>
<?php
/*
echo '<pre>';
print_r($all_emps);*/
 ?>
 <!--
<div class="col-sm-12 no-padding">
<div class="col-xs-12 col-md-12">
<div class="panel panel-default">
    <div class="panel-body" style="overflow: hidden;">   
    <div class="alert alert-danger" role="alert">
   <strong>تنبيه هام !</strong> يوجد عدد من الطلبات المعلقة خلال هذا الشهر 
</div> 
    <div class="row">
          <div class="col-lg-3 col-xs-3">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>150</h3>
              <p>إجمالي الطلبات المقدمة </p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
        
          </div>
        </div>
       <div class="col-lg-3 col-xs-3">
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>44</h3>
              <p>إجمالي الطلبات المعلقة </p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
          </div>
        </div>
           <div class="col-lg-3 col-xs-3">
         
          <div class="small-box bg-green">
            <div class="inner">
              <h3>44</h3>
              <p>إجمالي الطلبات المقبولة</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-xs-3">
    
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>
                <p>إجمالي الطلبات المرفوضة</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
</div>
<div class="col-xs-12 col-md-12">
<div class="col-xs-6 col-md-6">
<table class="table table-bordered new_table">
                <tbody>
                <tr>
                <th style="background: khaki;" colspan="6">طلبات الأجازات</th>
                </tr>
                <tr>
                  <th style="width: 10px">م</th>
                  <th>تاريخ الطلب</th>
                  <th>كود الموظف</th>
                  <th>صورة الموظف</th>
                  <th>إسم الموظف</th>
                  <th style="width: 40px">نوع الأجازة</th>
                </tr>
                <tr>
                  <td>1.</td>
                  <td>10-8-2020</td>
                  <td>10001</td>
                  <td><img src="https://abnaa-sa.org//uploads/human_resources/emp_photo/thumbs/f99b0dd6f845fc13acc362f876f97212.jpg" class="img-circle" width="35" height="35" alt="user"></td>
                  <td>مسعد السيد عبدالعزيز السيد</td>
                  <td><span class="label label-success">أجازة سنوية</span></td>
                </tr>
                <tr>
                  <td>2.</td>
                <td>10-8-2020</td>
                <td>10002</td>
                <td><img src="https://abnaa-sa.org//uploads/human_resources/emp_photo/thumbs/590a606edff2d311b9300429acc71130.png" class="img-circle" width="35" height="35" alt="user"></td>
                <td>سلطان محمد سليمان الجاسر	</td>
                  <td><span class="label label-success">أجازة سنوية</span></td>
                </tr>
                <tr>
                  <td>3.</td>
                  <td>10-8-2020</td>
                  <td>10003</td>
                  <td><img src="https://abnaa-sa.org//uploads/human_resources/emp_photo/thumbs/f30f9b576faf67300f4406ea7ffcdc98.png" class="img-circle" width="35" height="35" alt="user"></td>
                 <td>سليمان عبدالعزيز سليمان الراضي	</td>
                  <td><span class="label label-success">أجازة سنوية</span></td>
                </tr>
                <tr>
                  <td>4.</td>
                  <td>10-8-2020</td>
                  <td>10004</td>
                  <td><img src="https://abnaa-sa.org//uploads/human_resources/emp_photo/thumbs/2cf7044ad03c48e295b535d2a85eb7b5.png" class="img-circle" width="35" height="35" alt="user"></td>
                  <td>سامي نايف عبدالمحسن الحربي</td>
                  <td><span class="label label-success">أجازة سنوية</span></td>
                </tr>
              </tbody></table>
</div>
<div class="col-xs-6 col-md-6">
<table class="table table-bordered new_table">
                <tbody>
                <tr>
                <th style="background: peachpuff;" colspan="6">طلبات الإنتدابات</th>
                </tr>
                <tr>
                  <th style="width: 10px">م</th>
                  <th>تاريخ الطلب</th>
                  <th>كود الموظف</th>
                  <th>صورة الموظف</th>
                  <th>إسم الموظف</th>
                  <th style="width: 100px">جهه الانتداب</th>
                </tr>
                <tr>
                  <td>1.</td>
                  <td>10-8-2020</td>
                  <td>10005</td>
                  <td><img src="https://abnaa-sa.org//uploads/human_resources/emp_photo/thumbs/d4cc4754f08955780d7bb98663b8c283.jpg" class="img-circle" width="35" height="35" alt="user"></td>
                  <td>تركي شايع إبراهيم الشايع	</td>
                  <td><span class="label label-success">جدة</span></td>
                </tr>
                <tr>
                  <td>2.</td>
                <td>10-8-2020</td>
                <td>10006</td>
                <td><img src="https://abnaa-sa.org//uploads/human_resources/emp_photo/thumbs/8fc59cb185594d0c3b124a683158cf0f.png" class="img-circle" width="35" height="35" alt="user"></td>
                <td>أحمد عبدالله سليمان المهوس		</td>
                  <td><span class="label label-success">حائل</span></td>
                </tr>
                <tr>
                  <td>3.</td>
                  <td>10-8-2020</td>
                  <td>10007</td>
                  <td><img src="https://abnaa-sa.org//uploads/human_resources/emp_photo/thumbs/60f8f97420910db30496585b0f39c231.png" class="img-circle" width="35" height="35" alt="user"></td>
                 <td>عبدالرحمن محمد عبدالرحمن العجلان	</td>
                  <td><span class="label label-success">الرياض</span></td>
                </tr>
                <tr>
                  <td>4.</td>
                  <td>10-8-2020</td>
                  <td>10009</td>
                  <td><img src="https://abnaa-sa.org//uploads/human_resources/emp_photo/thumbs/acf7f9db22b671c7ee6f0a0b037f8715.jpg" class="img-circle" width="35" height="35" alt="user"></td>
                  <td>محمد بن سمير القعدان	</td>
                  <td><span class="label label-success">الدمام</span></td>
                </tr>
              </tbody></table>
</div>
</div>

<div class="col-xs-12 col-md-12">
  <div class="panel-group">
    <div class="panel panel-default" >
      <div class="panel-heading" style="background-image: none; background-color: #05ad9a;">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse1"> تفاصيل المسير خلال الشهر الحالي
          <i class="fa fa-spinner" aria-hidden="true"></i>
          </a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">
            <div  class="panel default">
        <div class="panel-body">    
            <?php
            if (isset($all_emps) && !empty($all_emps)){ 
                $x=1;
                ?> 
            <table class="table table-bordered table-striped" style="table-layout: fixed">
                <thead>
                <tr class="open_green">
                    <th rowspan="3" style="width: 20px;">م</th>
                    <th rowspan="3" style="width: 140px;">اســــــــــــــــــم الموظف</th>
                    <th rowspan="3" style="width: 100px;" ><span class="flip-mode">الوظيفة</span></th>
                    <th colspan="11" >الأستحقاقات</th>
                    <th rowspan="3" ><span class="flip-mode">إجمالي الأستحقاقات</span></th>
                    <th colspan="7" >الإستقطاعات	</th>
                    <th rowspan="3" ><span class="flip-mode">الإستقطاعات إجمالي </span></th>
                    <th rowspan="3" ><span class="flip-mode">المرتب صافى </span></th>
                    <th rowspan="3" >ملاحظات</th>
                </tr>
                <tr>
                 
                    <th colspan="8" >الرواتب والأجور	</th>
                    <th colspan="2">مزايا وحوافز	</th>
                    <th rowspan="2">أخرى </th>
                     <th rowspan="2">غياب	</th>
                     <th rowspan="2">إجازة بدون راتب</th>
                      <th rowspan="2">تأخير	</th>
                       <th rowspan="2">جزاءات	</th>
                     <th rowspan="2">التأمينات	</th>
                     <th rowspan="2">السلف	</th>
                    <th rowspan="2">أخرى </th>
                </tr>
                <tr>
                <th> <span class="">راتب أساسي</span></th>
                <th> <span class="">بدل سكن</span></th>
                <th> <span class="">بدل مواصلات	</span></th>
                 <th> <span class="">بدل إتصال	</span></th>
                   <th> <span class="">بدل إعاشة	</span></th>
                <th> <span class="">بدل طبيعة عمل	</span></th>
                <th> <span class="">العمل الإضافي	</span></th>
                <th> <span class="">بدل تكليف	</span></th>
                    <th>مكافآت </th>
                    <th>بدل الإنتداب</th>
                </thead>
                <tbody>
                <?php
            $egmali_rateb_asasy       = 0;
           $egmali_badal_sakn         = 0;
           $egmali_badal_mowaslat     = 0;
            $egmali_badal_etsal        = 0;
             $egmali_badal_e3asha       = 0;
           $egmali_badal_tabe3a_amal  = 0;
            $egmali_tot_edafi          = 0;
           $egmali_badal_taklef       = 0;
           $egmali_tot_mokafaa       = 0;
           $egmali_tot_entdab       = 0;
           $egmali_tot_okraa_esthkaq = 0;
           $egmali_total_esthkak   = 0;
         $egmali_khasm_keyab        = 0;
         $egmali_agaza_bdon_rateb   = 0;
          $egmali_khasm_takher       = 0;
           $egmali_khasm_gezaa        = 0;
         $egmali_khasm_tamen        = 0;
         $egmali_khasm_solaf        = 0;
          $egmali_tot_okraa_khasm = 0;
         $egmali_total_khsomat  = 0;        
            $egmali_safi = 0;
  foreach ($all_emps as $emp){
           $rateb_asasy       = $emp->rateb_asasy;
           $badal_sakn        = $emp->badal_sakn;
           $badal_mowaslat    = $emp->badal_mowaslat;
            $badal_etsal       = $emp->badal_etsal;  
            $badal_e3asha      = $emp->badal_e3asha;  
           $badal_tabe3a_amal = $emp->badal_tabe3a_amal;
             $tot_edafi         = 0;
           $badal_taklef      = $emp->badal_taklef;
           $tot_mokafaa       =  $emp->current_month_mokfaa;;
           $tot_entdab       = 0;
           $tot_okraa_esthkaq   = 0;
           $total_esthkak = ($rateb_asasy + $badal_sakn + $badal_mowaslat + $badal_tabe3a_amal + $badal_taklef +
                              $badal_etsal + $badal_e3asha + $tot_mokafaa + $tot_entdab +  $tot_edafi + $tot_okraa_esthkaq  );
          $khasm_keyab        = 0;
           $agaza_bdon_rateb   = 0;
            $khasm_takher       = 0; 
              $khasm_gezaa        = 0; 
         $khasm_tamen        = $emp->khasm_tamen;
         $khasm_solaf        = $emp->current_month_solaf;
       $tot_okraa_khasm = 0;
       $total_khsomat = ($khasm_tamen + $agaza_bdon_rateb + $khasm_keyab + $khasm_solaf + $khasm_gezaa + $khasm_takher +$tot_okraa_khasm );         
  $safi = ($total_esthkak - $total_khsomat);

           $egmali_rateb_asasy       += $emp->rateb_asasy;
           $egmali_badal_sakn        += $emp->badal_sakn;
           $egmali_badal_mowaslat    += $emp->badal_mowaslat;
            $egmali_badal_etsal       += $emp->badal_etsal;  
            $egmali_badal_e3asha      += $emp->badal_e3asha;  
           $egmali_badal_tabe3a_amal += $emp->badal_tabe3a_amal;
             $egmali_tot_edafi         += 0;
           $egmali_badal_taklef      += $emp->badal_taklef;
           $egmali_tot_mokafaa       +=  $emp->current_month_mokfaa;;
           $egmali_tot_entdab         +=0;
           $egmali_tot_okraa_esthkaq +=0;
           $egmali_total_esthkak += ($rateb_asasy + $badal_sakn + $badal_mowaslat + $badal_tabe3a_amal + $badal_taklef +
                              $badal_etsal + $badal_e3asha + $tot_mokafaa + $tot_entdab + $tot_okraa_esthkaq +   $tot_edafi  );
         $egmali_khasm_keyab        = 0;
         $egmali_agaza_bdon_rateb   = 0;
          $egmali_khasm_takher       = 0;
           $egmali_khasm_gezaa        = 0;
         $egmali_khasm_tamen        += $emp->khasm_tamen;
         $egmali_khasm_solaf        += $emp->current_month_solaf;;
        $egmali_tot_okraa_khasm    +=0;
         $egmali_total_khsomat += ($khasm_tamen + $agaza_bdon_rateb + $khasm_keyab + $khasm_solaf + $khasm_gezaa + $khasm_takher + $egmali_tot_okraa_khasm );         
  $egmali_safi += ($total_esthkak - $total_khsomat);

   ?>
        <tr>
                <td><?= $x++;?> </td>
                <td><span  style="font-size: 11px; color: black; font-weight: bold;  !important;"  
                data-toggle="tooltip" data-placement="bottom" title="<?= $emp->emp_name ?>">
               <?=character_limiter($emp->emp_name,18)?>
               </span></td>
                <td><span  style="font-size: 11px; color: black; font-weight: bold;  !important;"  
                data-toggle="tooltip" data-placement="bottom" title="<?= $emp->mosma_wazefy_n ?>">
               <?=character_limiter($emp->mosma_wazefy_n,12)?>
               </span></td>
                <td><?= $rateb_asasy?></td>
                <td><?= $badal_sakn?></td>
                <td><?= $badal_mowaslat?></td>
                 <td><?= $badal_etsal?></td>
                <td><?= $badal_e3asha?></td>
                <td><?= $badal_tabe3a_amal?></td>
                 <td><?= $tot_edafi?></td>
                <td><?= $badal_taklef?></td>
                <td><?= $tot_mokafaa?></td>
                <td><?= $tot_entdab?></td>
                <td><?= $tot_okraa_esthkaq?></td>
                <td style="background: #e6eed5;"><?= $total_esthkak?></td>
                 <td><?= $khasm_keyab?></td>
                 <td><?= $agaza_bdon_rateb?></td>
                  <td><?= $khasm_takher?></td>
                  <td><?= $khasm_gezaa?></td>
                <td><?= $khasm_tamen?></td>
                <td><?= $khasm_solaf?></td>
                <td><?= $tot_okraa_khasm?> </td>
                <td style="background: #e6eed5;"><?= $total_khsomat?></td>
                <td style="background: #e6eed5;"><?= ($safi)?> </td>
                <td>notes </td>
</tr>
                <?php
                }
                ?>
                </tbody>
                <tfoot class="open_green">
                <tr>
                    <th colspan="3">الإجمالى</th>
                     <th><?=$egmali_rateb_asasy?></th>
                     <th><?=$egmali_badal_sakn?></th>
                     <th><?=$egmali_badal_mowaslat?></th>
                      <th><?=$egmali_badal_etsal?></th>
                     <th><?=$egmali_badal_e3asha?></th>
                     <th><?=$egmali_badal_tabe3a_amal?></th>
                     <th><?=$egmali_tot_edafi?></th>
                     <th><?=$egmali_badal_taklef?></th>
                     <th><?=$egmali_tot_mokafaa?></th>
                   <th><?=$egmali_tot_entdab?></th>
                    <th><?=$egmali_tot_okraa_esthkaq?></th>
                    <th><?=$egmali_total_esthkak?></th>
                    <th><?=$egmali_khasm_keyab?></th>
                    <th><?=$egmali_agaza_bdon_rateb?></th>
                    <th><?=$egmali_khasm_takher?></th>
                    <th><?=$egmali_khasm_gezaa?></th>
                    <th><?=$egmali_khasm_tamen?></th>
                    <th><?=$egmali_khasm_solaf?></th>
                     <th><?=$egmali_tot_okraa_khasm?></th>
                    <th><?=$egmali_total_khsomat?></th>
                    <th><?=$egmali_safi?></th>
                     <th>--</th>
                </tr>
                </tfoot>
            </table>
                <?php
            }
            ?>
        </div>
    </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
-->