<style>
    .list-group-flush .list-group-item:first-child {
        border-top-width: 0;
    }
    .list-group-flush:last-child .list-group-item:last-child {
        border-bottom-width: 0;
    }
    .list-group-flush .list-group-item {
        border-right-width: 0;
        border-left-width: 0;
        border-radius: 0;
    }
    a {
        font-size: 19px;
        text-decoration: none !important;
        color: #f2f3f3;
    }
    .radio-content {
        display: block;
        width: auto;
        margin-left: 10px;
    }
    #pollsButtons {
        text-align: center;
        height: 33px;
        padding-bottom: 30px;
        /* width: 360px; */
    }
    #voteButton, #resultsButton {
        height: 33px;
        display: inline-block;
    }
    #voteButton input, #backButton input {
        font-family: "Droid Arabic Kufi";
        display: inline-blocl;
        background: #df2829;
        border: medium none;
        color: transparent;
        cursor: pointer;
        color: #FFF;
        padding: 5px 10px;
    }
    #resultsButton input, #voteButton input, #backButton input {
        font-family: "Droid Arabic Kufi";
        display: inline-blocl;
        background: #df2829;
        border: medium none;
        color: transparent;
        cursor: pointer;
        color: #FFF;
        padding: 5px 10px;
    }
    .bar {
        background: rgba(0, 0, 0, 0) url(https://img.youm7.com/images/general/pollMeterBg.gif?1) repeat-x scroll 0 0;
        border: 1px solid #ce2020;
        font-size: 0;
        height: 10px;
        line-height: 0;
        margin: 4px 0 0 70px;
    }
    .bar-percentage {
        display: inline;
        float: left;
        font-family: "Trebuchet MS";
        font-size: 14px;
        font-weight: 700;
        margin: -4px 5px 0;
        padding: 0;
    }
    .bar-main-container {
        text-align: right;
    }
    .bar-main-container {
        padding-right: 14px;
    }
    .bar-main-container div:first-child {
        width: 50px;
    }
    .bar-main-container div {
        display: inline-block;
        padding: 0px 5px;
    }
    /* WRAPPER */
    .tickerv-wrap {
        background: #6d6969;
        box-sizing: content-box;
        height: 20px; /* Take note of this */
        overflow: hidden; /* Hide scrollbars */
        /*padding: 10px;*/
    }
    /* TICKER ANIMATION */
    @keyframes tickerv {
        0%   {margin-top: 0;}
        /* Quite literally -ve height of wrapper */
        25%  {margin-top: -20px;} /* 1 X 25 px */
        50%  {margin-top: -52px;} /* 2 X 25 px */
        75%  {margin-top: -78px;} /* 3 X 25 px */
        100% {margin-top: 0;} /* Back to first line */
    }
    .tickerv-wrap ul {
        padding: 0;
        margin: 0;
        list-style-type: none;
        animation-name: tickerv; /* Loop through items */
        animation-duration: 10s;
        animation-iteration-count: infinite;
        animation-timing-function: cubic-bezier(1, 0, .5, 0);
    }
    .tickerv-wrap ul:hover {
        /* Pause on mouse hover */
        animation-play-state: paused;
    }
    /* ITEMS */
    .tickerv-wrap ul li {
        font-size: 15px;
        line-height: 20px /* Same as wrapper height */
    }
    .main {
        padding: 8px;
        margin-bottom: -22px;
        /* border: 1px solid transparent; */
        border-radius: 4px;
    }
    .profile-user-img {
        margin: 0 auto;
        width: 100px;
        padding: 3px;
        border: 3px solid #d2d6de;
    }
    .label {
        display: inline;
        padding: .2em .6em .3em;
        font-size: 75%;
        font-weight: 700;
        line-height: 1;
        color: #fff;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: .25em;
    }
    .bg-aqua, .callout.callout-info, .alert-info, .label-info, .modal-info .modal-body {
        background-color: #00c0ef !important;
    }
    .label-info {
        color: white !important;
        background-color: #53d4fa;
        border: none;
    }
    .box.box-primary {
        border-top-color: #3c8dbc;
    }
    .box {
        position: relative;
        border-radius: 3px;
        background: #ffffff;
        /*  border-top: 3px solid #d2d6de;*/
        margin-bottom: 20px;
        width: 100%;
        box-shadow: 0 1px 1px rgba(0,0,0,0.1);
    }
    .content {
        width: 100%;
        display: inline-block;
        min-height: 250px;
        margin-right: auto;
        margin-left: auto;
        padding: 27px 30px 10px;
        overflow: auto;
    }
    .progress-bar {
        background-image: none !important;
    }
    .progress-bar-red, .progress-bar-danger {
        background-color: #dd4b39;
    }
    .progress-bar-aqua, .progress-bar-info {
        background-color: #00c0ef;
    }
    .progress-bar-green, .progress-bar-success {
        background-color: #00a65a;
    }
    .progress-bar-yellow, .progress-bar-warning {
        background-color: #f39c12;
    }
    .progress-text{
        font-size: 13px !important;
        font-weight: bold;
        color: black;
    }
    .vote{
        font-size: 14px;
        font-weight: bold;
        color: red;
        line-height: 27px;
    }
    .box-widget {
        border: none;
        position: relative;
    }
    .widget-user .widget-user-image>img {
        width: 127px !important;
        height: auto;
        border: 3px solid #fff;
    }
    .bg-aqua-active, .modal-info .modal-header, .modal-info .modal-footer {
        /* background-color: #00a7d0 !important; */
        background-color: #2d2b2b !important;
    }
    .widget-user .widget-user-header {
        padding: 20px;
        height: 120px;
        border-top-right-radius: 3px;
        border-top-left-radius: 3px;
    }
    .widget-user .widget-user-image {
        position: absolute;
        top: 65px;
        left: 50%;
        margin-left: -45px;
    }
    .widget-user .widget-user-username {
        text-align: center;
        color: white;
        margin-top: 0;
        font-size: 18px;
        text-shadow: 0 1px 1px rgba(0,0,0,0.2);
    }
    .description-block>.description-header {
        margin: 0;
        padding: 0;
        font-weight: 600;
        font-size: 16px;
    }
    .description-block {
        display: block;
        margin: 10px 0;
        text-align: center;
    }
    .description-block>.description-text {
        text-transform: uppercase;
    }
    .box .border-right {
        border-right: 1px solid #f4f4f4;
    }
    .widget-user .box-footer {
        padding-top: 30px;
    }
    .box-footer {
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        border-bottom-right-radius: 3px;
        border-bottom-left-radius: 3px;
        border-top: 1px solid #f4f4f4;
        padding: 10px;
        background-color: #fff;
    }
    .box .nav-stacked>li {
        border-bottom: 1px solid #f4f4f4;
        margin: 0;
        padding: 10px 15px;
    }
    .nav-stacked>li {
        float: none;
    }
    .nav>li {
        position: relative;
        display: block;
    }
    .nav-stacked>li>a {
        border-radius: 0;
        border-top: 0;
        border-left: 3px solid transparent;
        color: #444;
    }
    .nav>li>a {
        position: relative;
        display: block;
        padding: 10px 15px;
    }
    .badge {
        display: inline-block;
        min-width: 10px;
        padding: 3px 7px;
        font-size: 12px;
        font-weight: 700;
        line-height: 1;
        color: #fff;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        background-color: #777;
        border-radius: 10px;
    }
    .bg-blue {
        background-color: #0073b7 !important;
    }
    .bg-green, .callout.callout-success, .alert-success, .label-success, .modal-success .modal-body {
        background-color: #00a65a !important;
    }
    .bg-red, .callout.callout-danger, .alert-danger, .alert-error, .label-danger, .modal-danger .modal-body {
        background-color: #dd4b39 !important;
    }
    .list-group-item {
        position: relative;
        display: block;
        padding: 9px 15px;
        font-weight: bold;
        margin-bottom: -1px;
        background-color: #fff;
        color: black;
        border: 1px solid #ddd;
    }
    .list-unstyled, .chart-legend, .contacts-list, .users-list, .mailbox-attachments {
        list-style: none;
        margin: 0;
        padding: 0;
    }
    .timeline>li>.timeline-item {
        -webkit-box-shadow: 0 1px 1px rgba(0,0,0,0.1);
        box-shadow: 0 1px 1px rgba(0,0,0,0.1);
        border-radius: 3px;
        margin-top: 0;
        background: #fff;
        color: #444;
        margin-left: 60px;
        margin-right: 15px;
        padding: 0;
        position: relative;
    }
    .timeline>li>.timeline-item>.time {
        color: #999;
        float: right;
        padding: 10px;
        font-size: 12px;
    }
    .timeline>li>.timeline-item>.timeline-header {
        margin: 0;
        color: #555;
        border-bottom: 1px solid #f4f4f4;
        padding: 10px;
        font-size: 16px;
        line-height: 1.1;
    }
    .timeline>li>.timeline-item>.timeline-body, .timeline>li>.timeline-item>.timeline-footer {
        padding: 10px;
    }
    .margin {
        margin: 10px;
    }
    .img_emp {
        width: 100px;
        height: 100px;
    }
    .content {
        width: 100%;
        display: inline-block;
        min-height: 246px;
        margin-right: auto;
        margin-left: auto;
        padding: 1px 30px 10px;
        overflow: auto;
    }
    
   
   .img-circle {
    border-radius: 18%;
}

.widget-user .widget-user-image {
    position: absolute;
    top: 17px;
    left: 40%;
    margin-left: -45px;
} 
.widget-user .widget-user-image>img {
    width: 151px;
    height: auto;
    border: 3px solid #fff;
}
    .table-bordered, .table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th {
    border: 1px solid #ddd;
    text-align: center;
    padding: 12px;
    font-weight: 600;
    font-size: 12px;
    vertical-align: middle;
}
   
   
   @media screen and (min-width: 768px)
.carousel-indicators {
    bottom: -15px !important;
} 
.carousel-indicators li {
    display: inline-block;
    width: 10px;
    height: 10px;
    background: #e9b51c;
    margin: 1px;
    text-indent: -999px;
    cursor: pointer;
    background-color: #e9b51c #0073b7 !important;
    border: 1px solid #fff;
    border-radius: 10px;
}
</style>

<?php
/*
echo '<pre>';
print_r($da3wat);*/

 ?>
 
 

    <br />
    <div class="col-md-12">
    
    
    
        <div class="col-md-12 padding-4">
              <div class="panel panel-default" style="">
                <div class="panel-heading panel-title">  <i class="fa fa-envelope-open-o" aria-hidden="true"></i>
دعوة لحضور إجتماع الجمعية العمومية
                  </div>
                <div class="panel-body">

<?php

echo '<pre>';
print_r($da3wat);
 if(isset($da3wat) && !empty($da3wat) ){
 //if($da3wat->action_dawa ==Null ||$da3wat->action_dawa =='' ){ 
    ?>


        <div class="" style="width: 100%;">
         
            <div class="">
              
<div class="box box-primary">
<div class="box-body box-profile">
 <table class="table">
    <tbody>
      <tr>
        <td style="background: #d9534f; color: white;" >رقم الدعوة  <span class="badge bg-green"><?php if(isset($da3wat->da3wa_rkm)&&!empty($da3wat->da3wa_rkm))
      {echo $da3wat->da3wa_rkm;} 
      ?>
      </span> </td>
         <td style="background: #d9534f; color: white;">تاريخ الدعوة   <span class="badge bg-green">
         <?php if(isset($da3wat->da3wa_date_ar)&&!empty($da3wat->da3wa_date_ar))
      {echo $da3wat->da3wa_date_ar;} 
      ?>
      </span></td>
           <td style="background: #d9534f; color: white;">الموضوع <span class="badge bg-blue"><?php if(isset($da3wat->mawdo3)&&!empty($da3wat->mawdo3))

       {

echo $da3wat->mawdo3;

       } 

      ?></span> </td>
    </tr>

     
    </tbody>
  </table>


</div>
<!-- yarara -->
<div class="">
    <div class="print_forma  no-border    col-xs-12 allpad-12">
        <div class="col-xs-12">
            <div class="personality" style="margin-top: 28px;">

              <!--  <div class="col-xs-1"></div>-->
                <div class="col-xs-8 ahwal_style">
                    <h6 class="" style="font-weight: bold !important;font-size: 15px !important; color: #a70000;">
                        <?php echo $person_data->laqb_title . '/'. $da3wat->mem_name; ?>
                    </h6>
                </div>
                <div class="col-xs-3">
                    <h6 class=""
                        style="font-weight: bold !important;font-size: 15px !important; color: #a70000;">
                        <?php echo $da3wat->end_laqb_title; ?>
                    </h6>
                </div>


                <div class="col-xs-11 col-xs-offset-1 ahwal_style">
                  

                    <h6 style="font-weight: bold !important; color: #09704e;"><?php echo $da3wat->salam ; ?></h6>
                </div>


                <div class="col-xs-12 no-padding">

                    <div class="form-group col-sm-12 col-xs-12">
                        <h6 style="line-height: 20px; color: black; font-weight: bold; font-family: sans-serif;">
                        <i style="color: red;" class="fa fa-quote-right" aria-hidden="true"></i>
                        <?php echo $da3wat->cont_header; ?>
                      

                        </h6>

                    </div>
                         <div class="form-group col-sm-12 col-xs-12">            
                  <table class="table  table-bordered">
  <thead>
    <tr>
      <th style="color: white;background: #fcb632;">م</th>
      <th style="color: white;background: #fcb632;">إسم المحور</th>
    </tr>
  </thead>
  <tbody>
  <?php
  if(isset($mahwrs) and $mahwrs != null){ 
   foreach($mahwrs as $mehwar) { ?>
      <tr>
      <td style="color: blue; text-align: right; font-size: 14px !important;"><?=$mehwar->mehwar_rkm?></td>
      <td style="color: blue; text-align: right; font-size: 14px !important;"><?=$mehwar->mehwar_title?></td>
    </tr>
  <?php  
     }
 }
   ?>


  </tbody>
</table>
 </div>  
  <i  style="color: red;" class="fa fa-quote-left" aria-hidden="true"></i>                
                  
                    <div class="form-group col-sm-12 col-xs-12">
                        <h6 style="line-height: 22px; color: #0068c1; font-weight: bold;"><?php echo $da3wat->cont_footer; ?></h6>

                    </div>

                </div>
                
                
                
                
             <div class="col-xs-12 no-padding">
                     <?php 

?>




             
             </div>    
                

        
                
                
                
                
            </div>

            <div class="special col-xs-12 ">

<?php 
if($da3wat->action_dawa == 'wait' ){
 $action_dawa = 'تم تأجيل النظر في الدعوة';   
}elseif($da3wat->action_dawa == 'accept'){
   $action_dawa = 'تمت الموافقة علي الدعوة';   
}elseif($da3wat->action_dawa == 'refuse'){
   $action_dawa = 'تم رفض الدعوة';   
}else{
   $action_dawa = 'جاري';   
}

?>
<h6 style="color: red;text-align: center;"><?=$action_dawa?></h6>


                <div class="col-xs-4 text-center">

                </div>
                <div class="col-xs-3 text-center">

                </div>
                <div class="col-xs-5 text-center ">

                </div>
               

            </div>
        </div>


    </div>
</div>
<!-- /.box-body -->

</div>
<!-- yaraaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa -->
<div class="modarl-footer">
<div class="col-xs-12">
<div class="col-md-12" id="refuse_d3wa" style="display:none; padding-bottom: 16px; ">
<span style="
    float: right;
">سبب رفض الدعوة</span>
<input type="text" id="reason"  class="form-control" name="reason">
</div>

<div class="col-md-12" id="actionn">

<div class="col-md-4">

<a  onclick="confirm(<?=$da3wat->id?>,'accept')" class="btn btn-success btn-block"><b>قبول الدعوة</b></a>

</div>

 <div class="col-md-4">

<a onclick="confirm(<?=$da3wat->id?>,'refuse')" class="btn btn-danger btn-block"><b>رفض الدعوة</b></a>


  </div>
  <div class="col-md-4">

<a onclick="confirm(<?=$da3wat->id?>,'wait')" class="btn btn-warning btn-block"><b>تأجيل النظر في الدعوة</b></a>

  </div>

</div>
   
    </div>
                    </div>
            </div>

        </div>
  

<?php //} 

}?>



                </div>
            </div>
        
         </div>
    
    
    
    <!--
         <div class="col-md-6 padding-4">
                   <div class="panel panel-default" style="">
                <div class="panel-heading panel-title">  دعوة لحضور إجتماع الجمعية العمومية

                  </div>
                <div class="panel-body">
22222
                </div>
            </div>
        
         </div>-->
    </div>
    
