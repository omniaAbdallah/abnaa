<link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css1/bootstrap-rtl.min.css"> 
 <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css1/AdminLTE.min.css"> 
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
</style>
<style> 
    .pargraph{font-size:15px;color:black;margin-top: -9px;}
    .profile-activity {
    border-bottom: 1px dotted #D0D8E0;
    position: relative;
    border-left: 1px dotted #FFF;
    border-right: 1px dotted #FFF;
    padding: 0px 4px;
}
    input[type=date], input[type=time], input[type=datetime-local], input[type=month] {
    line-height: 15px;
    line-height: 1.42857143 \0;
    border: 0px;
}
</style>
  <style> 
/* ----  rules & regulations cards ---- */
.Rules-wrapper {
  padding-top: 20px;
}
.rules-reg-card {
  padding: 15px;
  width: 100%;
  height: 185px;
  background: #fff;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
  margin-bottom: 40px;
  overflow: hidden;
  /*cursor:pointer;*/
  position: relative;
  /*-o-transition:all .5s ease;-webkit-transition:all .5s ease;-moz-transition:all .5s ease;*/
  transition: all .5s ease;
}
.rules-reg-card:hover {
  box-shadow: 0px 5px 35px 0px rgba(0, 0, 0, 0.13);
  -webkit-transform: scale(1.05);
      -ms-transform: scale(1.05);
          transform: scale(1.05);
}
.rules-reg-card.rules {
  border-bottom: 5px #00afa9 solid;
}
.rules-reg-card.regulations {
  border-bottom: 5px #c84a3d solid;
}
.rules-reg-card .rule-clickable-part {
  display: block;
  height: 80%;
}
.rules-reg-card p {
  font: bold 1em/1.8 DroidArabicKufi-Bold, arial, sans-serif;
  text-align: center;
  height: calc(100% - 35px);
}
.rules-reg-card p .icon {
  display: block;
  padding-top: 10px;
  height: 70px;
}
.rules-reg-card p .icon img {
  max-height: 52px;
}
.date {
  display: block;
  font: 1em DroidArabicKufi, arial, sans-serif;
  color: #3e3939;
  margin: 10px 0;
} 
.card-actions {
    text-align: left;
    margin: 10px 0;
}
.card-actions a {
    display: inline-block;
    color: #009688;
    padding: 1px 4px;
    background: #f2f2f2;
    margin: 0 2px;
    border-radius: 4px;
    font-size: 14px;
}
.ZP-atdancehead .time-show-btn {
    font-size: 22px;
    font-family: "LatoWeb";
    height: 45px;
    position: absolute;
    border-radius: 4px;
    right: 25px;
    top: 6px;
    width: 145px;
    padding: 10px;
    padding-right: 5px;
    border: 0;
    box-shadow: 0px 0px 4px 0px #ccc;
}
.grn-bg {
   /* background: #00bd9e;*/
    background: #e15e6d;
}
.time-show-btn {
    color: #ffffff;
}
.PT12I {
    /*padding-top: 12px !important;*/
        padding: 11px !important;
    border: 1px solid white;
}
.dash-col .dash-body .ctim {
    text-align: center;
    margin: 30px 10px;
}
.user{
    color: black !important;
    font-weight: bold;
}
 <style>
.tabs-bord  .tab .nav-tabs{
    padding-left: 15px;
    border-bottom: 4px solid #f28d1e;
}
.tabs-bord  .tab .nav-tabs li a{
    color: #fff;
    font-weight: 600;
    padding: 15px 20px;
    margin-right: 5px;
    background: #1c2172;
    text-shadow: 1px 1px 2px #000;
    border: none;
    border-radius: 0;
    opacity: 0.5;
    position: relative;
    transition: all 0.3s ease 0s;
    border-radius: 8px 8px 0 0
}
.tabs-bord  .tab .nav-tabs li a:hover{
    background: #1c2172;
    opacity: 0.8;
}
.tabs-bord  .tab .nav-tabs li.active a{
    opacity: 1;
}
.tabs-bord  .tab .nav-tabs li.active a,
.tabs-bord  .tab .nav-tabs li.active a:hover,
.tabs-bord  .tab .nav-tabs li.active a:focus{
    color: #fff;
    background: #1c2172;
    border: none;
    border-radius: 8px 8px 0 0
}
.tabs-bord  .tab .nav-tabs li a:before,
.tabs-bord  .tab .nav-tabs li a:after{
    content: "";
    border-top: 42px solid transparent;
    position: absolute;
    top: -2px;
}
.tabs-bord .tab .nav-tabs li a i,
.tabs-bord .tab .nav-tabs li.active a i, .tabs-bord .tab .nav-tabs li a:hover i
{
    display: inline-block;
    padding-left: 10px;
    font-size: 15px;
    text-shadow: none;
}
.tabs-bord .tab .nav-tabs li a i{padding: 0}
.tabs-bord .tab .nav-tabs li a span{
    display: inline-block;
    font-size: 14px;
    letter-spacing: -9px;
    opacity: 0;
    transition: all 0.7s ease 0s;
}
.tabs-bord .tab .nav-tabs li a:hover span,
.tabs-bord .tab .nav-tabs li.active a span{
    letter-spacing: 1px;
    opacity: 1;
    transition: all 0.7s ease 0s;
}
.tabs-bord .tab .tab-content{
    padding: 10px;
    background: #fff;
    font-size: 16px;
    color: #171515;
    line-height: 25px;
    /* text-align: right; */
}
.tabs-bord .tab .tab-content h3{
    margin-top: 0;
}
@media only screen and (max-width: 479px){
   .tabs-bord  .tab .nav-tabs li{
        width: 100%;
        margin-bottom: 5px;
        text-align: center;
    }
   .tabs-bord  .tab .nav-tabs li a span{
        letter-spacing: 1px;
        opacity: 1;
    }
}
.tabs-bord  .centered{
      float: none;
     margin: 0 auto;
}
.tabs-bord .our-team{
    padding: 10px 0 10px;
    background: #f7f5ec;
    text-align: center;
    overflow: hidden;
    position: relative;
    border-radius: 8px;
    box-shadow:0px 0px 9px 0px rgba(0, 0, 0, 0.14);
    margin-bottom: 20px;
    border-bottom: 3px solid #81bc48;
    border-radius: 5% 0 5% 0;
}
.tabs-bord .arrow{
    padding: 10px 0 10px;
    background: none;
    text-align: center;
    overflow: hidden;
    position: relative;
    border-radius: 8px;
      box-shadow:none;
    margin-bottom: 20px;
     border-bottom:0;
    border-radius:0;
}
.our-team:before,
.our-team:after{
    content: '';
    background: #f28d1e;
    width: 5px;
    height: 30%;
    box-shadow: 15px 0 0 #f28d1e;
    transform: skewY(50deg);
    position: absolute;
    bottom: -100%;
    left: 5px;
    z-index: 1;
    transition: all 0.45s ease;
}
.our-team:after{
    box-shadow: -15px 0 0 #f28d1e;
    left:auto;
    right: 5px;
    bottom: auto;
    top: -100%;
}
.our-team:hover:before{ bottom: -10px; }
.our-team:hover:after{ top: -10px; }
.tabs-bord .our-team .pic{
    border-top: 5px solid #f28d1e;
    border-bottom: 5px solid #f28d1e;
    border-radius: 50% 50% 50% 0;
    overflow: hidden;
    transition: all 0.5s ease 0s;
    margin: 0 auto;
   /* width: 130px;
    height: 130px; */
    width:183px;
}
.tabs-bord .our-team:hover .pic{
    border-top-color: #81bc48;
    border-bottom-color: #81bc48;
    border-radius: 50% 0;
}
.tabs-bord .our-team .pic img{
    width: 100%;
    height: auto;
    transition: all 0.5s ease 0s;
}
.tabs-bord .our-team .team-content{
   /* margin-bottom: 10px;*/
    /*min-height: 92px;*/
   /* max-height: 170px;*/
    }
.tabs-bord .our-team .title{
    font-size: 19px;
    font-weight: 700;
    color: #81bc48;
    padding-bottom: 8px;
    margin: 15px 0 10px 0;
    position: relative;
    letter-spacing: 0;
    line-height: 1.6;
}
.tabs-bord .our-team .title:after{
    content: "";
    width: 35px;
    height: 3px;
    background: #f28d1e;
    margin: 0 auto;
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
}
.tabs-bord .level3 .our-team .title{
    font-size: 12px;
    font-weight: 700;
    color: #032b4a;
    padding-bottom: 8px;
    margin: 15px 0 10px 0;
    position: relative;
    letter-spacing: 0;
    line-height: 1.6; 
}
.tabs-bord .our-team .post{
    display: block;
    font-size: 15px;
    color: #4e5052;
    text-transform:capitalize;
}
@media only screen and (max-width: 990px){
   .tabs-bord .our-team{ margin-bottom: 30px; }
}
.tabs-bord a.b-scroll {
    display: block;
    position: absolute;
    left: 50%;
    bottom: 1%;
    z-index: 9;
    -webkit-transform: translateX(-50%);
            transform: translateX(-50%);
    -webkit-transition: all 0.5s ease 1.9s;
    transition: all 0.5s ease 1.9s;
    cursor: pointer;
}
.tabs-bord a.b-scroll span {
    display: inline-block;
    color: #474a4c;
    font-size: 25px;
    margin-top: 40px;
    -webkit-animation: scrooldown 2000ms linear 0s infinite;
    animation: scrooldown 2000ms linear 0s infinite;
}
.tabs-bord  .arrow a.b-scroll {
    display: block;
    position: absolute;
    left: 50%;
    bottom: 10%;
    z-index: 9;
    -webkit-transform: translateX(-50%);
            transform: translateX(-50%);
    -webkit-transition: all 0.5s ease 1.9s;
    transition: all 0.5s ease 1.9s;
    cursor: pointer;
}
.tabs-bord .arrow a.b-scroll span {
    display: inline-block;
    color: #032b4a;
    font-size: 40px;
    margin-top: 0px;
    -webkit-animation: scrooldown 2000ms linear 0s infinite;
    animation: scrooldown 2000ms linear 0s infinite;
}
.tabs-bord a.b-scroll span:hover{
    display: inline-block;
    color: #f28d1e;
    margin-top: 40px;
    -webkit-animation: scrooldown 2000ms linear 0s infinite;
    animation: scrooldown 2000ms linear 0s infinite;
}
@-webkit-keyframes scrooldown {
    0% {
        -webkit-transform: translateY(-5px);
        transform: translateY(-5px);
    }
    50% {
        -webkit-transform: translateY(5px);
        transform: translateY(5px);
    }
    100% {
        -webkit-transform: translateY(-5px);
        transform: translateY(-5px);
    }
}
@keyframes scrooldown {
    0% {
        -webkit-transform: translateY(-5px);
        transform: translateY(-5px);
    }
    50% {
        -webkit-transform: translateY(5px);
        transform: translateY(5px);
    }
    100% {
        -webkit-transform: translateY(-5px);
        transform: translateY(-5px);
    }
}
.level2 {}
.dawra-style i {
   width: 30px;
    height: 30px;
    background-color: #FF9800;
    color: #f9f9f9;
    font-size: 16px;
    text-align: center;
    line-height: 28px;
    border-radius: 50%;
}
a{
    color: #6f6f6f;
}
a,
a:active,
a:focus,
a:hover{
    outline:none;
    -webkit-transition: all 0.3s ease-in-out;
    -moz-transition: all 0.3s ease-in-out;
    -o-transition: all 0.3s ease-in-out;
    -ms-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}
a:hover{
    text-decoration:none;
}
h1, h2, h3, h4, h5, h6{
    margin:0 0 15px 0;
    letter-spacing: 0px;
    font-weight: bold;
}
h1{
    font-size:48px;
    line-height:52px;
}
h2{
    font-size:36px;
    line-height:48px;
}
h3{
    font-size:30px;
    line-height:36px;
}
h4{
    font-size:24px;
    line-height:30px;
}
h5{
    font-size:18px;
    line-height:24px;
}
h6{
    font-size:14px;
    line-height:18px;
    text-align: right;
}
p{
    margin-bottom: 20px;
}
.section{
    padding: 70px 0;
    position: relative;
}
</style>
  <style> 
.scene {
  width: 100%;
  height: auto;
  perspective: 600px;
}
.card {
  position: relative;
  width: 100%;
  height: 100%;
  cursor: pointer;
  transform-style: preserve-3d;
  transform-origin: center right;
  transition: transform 1s;
}
.card.is-flipped {
  transform: translateX(-100%) rotateY(-180deg);
}
.card__face {
  position: fixed;
  width: 100%;
  height: 100%;
  text-align: center;
  font-weight: bold;
  font-size: 40px;
  backface-visibility: hidden;
}
.card__face--front {
 /* background: red;*/
}
.card__face--back {
  transform: rotateY(180deg);
}
</style>          
</style> 
   <style>
.profile-user-img {
    margin: 0 auto;
    width: 100px;
    padding: 3px;
    border: 3px solid #d2d6de;
}
</style>
<?php 
  $this->load->view('admin/maham_mowazf_view/basic_data/nav_links'); 
?>
   <!-- Small boxes (Stat box) -->
 	<div class="col-md-12">
        <div class="col-xs-12 col-md-3" >
        <!--<div class="panel panel-default">
            <div class="panel-heading">Panel Heading</div>
            <div class="panel-body">
            -->
           <!--card-->
           <?php 
          // echo '<pre>';
          // print_r($my_employee_edara);
           ?>
<div class="scene scene--card">
<div style="margin-bottom: 5px !important;" class="card">
<div class="card__face card__face--front">   
<div class="tabs-bord">
<div class="our-team " style="height: 393px !important;">
<div class="pic">
<img src="<?=base_url()?>/uploads/human_resources/emp_photo/thumbs/<?php  echo $basic_data->personal_photo;?>" alt="">
</div>
<div class="team-content"><h3 class="title"><?php  echo $basic_data->employee;?></h3>
<h6 style="text-align: center;" class="dawra-style"><span><?php  echo $basic_data->mosma_wazefy_n;?>  </span> 
</h6>
<h6 style="text-align: center;" class="dawra-style"> 
<i class="fa fa-briefcase" title="<?php  echo $basic_data->edara_n;?>"></i>
<i class="fa fa-user-o" title="<?php  echo $basic_data->edara_n;?>"></i>
<i class="fa fa-phone" title="<?php  echo $basic_data->tahwela_rkm;?>"></i>
</h6>
</div>
</div>
</div>
</div>
<div class="card__face card__face--back">
<div class="tabs-bord">
<div class="our-team ">
<div class="team-content">
<h6 class="dawra-style"><i class="fa fa-credit-card "></i>  <span style="padding-right: 5px;"> الرقم الوظيفي	:<?php  echo $basic_data->emp_code;?></span>
</h6>
<h6 class="dawra-style"><i class="fa fa-phone" aria-hidden="true"></i> <span style="padding-right: 5px;"> 102 </span></h6>
<h6 class="dawra-style"> <i class="fa fa-mobile "></i><span style="padding-right: 5px;">رقم الجوال	:  <?php  echo $basic_data->phone;?></span>  
</h6>
<h6 class="dawra-style"> <i class="fa fa-credit-card "></i><span style="padding-right: 5px;"> رقم الهوية	:  <?php  echo $basic_data->card_num;?></span>
</h6> 
</div>
</div>
</div>
</div>
<!--
</div>
</div>
 -->
            <script>var card = document.querySelector('.card');
card.addEventListener( 'click', function() {
  card.classList.toggle('is-flipped');
});</script>          
            <!-- end card --->
            </div>
        </div>
        </div>
        <div class="col-xs-12 col-md-3" >
        <div class="panel panel-default">
            <div class="panel-heading" style="    background-color: #15bfac !important;
    background-image: none !important;
    color: white;">الحضور اليوم </div>
            <div class="panel-body" style="height: 295px;overflow: hidden;">
        <center>
        <button style="width: 80% !important;" class="time-show-btn PT12I grn-bg" id="theButton" 
        onclick="Timetracker.timelogs.pauseclock();" title="Start Timer">
        <div class="FR ZPTymDrW" id="watch" style="font-size: 20px;">00:00:00
         <!-- <i style="float: left; font-size: 30px;" class="fa fa-clock-o" aria-hidden="true"></i>-->
          <img  style="float: left; font-size: 30px;"  src="https://abnaa-sa.org/uploads/human_resources/time/timelog3.png" />
        </div>
        </button>
         <div class="ctim">
      <h2 style="color: black !important;">00:03:37 ساعات</h2>
     <span class="label label-danger">متأخر مدة 14 دقيقة</span>
      </div>
         <button style="width: 80% !important; background: #00bd9e;" class="time-show-btn PT12I grn-bg" id="theButton" 
        onclick="Timetracker.timelogs.pauseclock();" title="Start Timer">
        <div class="FR ZPTymDrW" id="watch" style="font-size: 20px;">00:00:00
         <!-- <i style="float: left; font-size: 30px;" class="fa fa-clock-o" aria-hidden="true"></i>-->
        </div>
        </button>
          </center>  
            </div>
            <div class="panel-footer">
            <button type="button" class="btn btn-sm btn-primary btn-labeled " 
            style="float: left"><span class="btn-label">
            <i class="fa fa-ellipsis-h"></i></span>للتفاصيل أكثر
           </button>
          </div>
        </div>
        </div>
        <?php
        ?>
                <div class="col-xs-12 col-md-3" >
        <div class="panel panel-default">
            <div class="panel-heading" style="    background-color: #e15e6d !important;
    background-image: none !important;
    color: white;">إشعارات </div>
            <div class="panel-body" style="height: 295px;overflow: hidden;">
             <a class="btn btn-app">
                <i class="fa fa-edit"></i> الحساب
              </a>
              <a class="btn btn-app">
                <i class="fa fa-play"></i> Play
              </a>
              <a class="btn btn-app">
                <i class="fa fa-repeat"></i> Repeat
              </a>
              <a class="btn btn-app">
                <i class="fa fa-pause"></i> إدارة الوقت
              </a>
              <a class="btn btn-app">
                <i class="fa fa-save"></i> Save
              </a>
              <a class="btn btn-app">
                <span class="badge bg-yellow">3</span>
                <i class="fa fa-bullhorn"></i> طلبات
              </a>
              <a class="btn btn-app">
                <span class="badge bg-green">300</span>
                <i class="fa fa-barcode"></i> التعاميم
              </a>
              <a class="btn btn-app">
                <span class="badge bg-purple">891</span>
                <i class="fa fa-users"></i> دردشة
              </a>
              <a class="btn btn-app">
                <span class="badge bg-teal">67</span>
                <i class="fa fa-inbox"></i> مهام 
              </a>
              <a class="btn btn-app">
                <span class="badge bg-aqua">12</span>
                <i class="fa fa-envelope"></i> بريد
              </a>
              <a class="btn btn-app">
                <span class="badge bg-red">531</span>
                <i class="fa fa-heart-o"></i> مفضلة
              </a>
            </div>
            <div class="panel-footer"> 
              <button type="button" class="btn btn-sm btn-primary btn-labeled " 
            style="float: left"><span class="btn-label">
            <i class="fa fa-ellipsis-h"></i></span>للتفاصيل أكثر
           </button></div>
        </div>
        </div>
<div class="col-xs-12 col-md-3">
<div class="panel panel-default">
    <div class="panel-heading" style="    background-color: #00a65a !important;
    background-image: none !important;
    color: white;">الأجندة والملاحظات</div>
    <div class="panel-body" style="height: 295px;overflow: hidden;">
<div class="box box-solid bg-green-gradient">
            <div class="box-header ui-sortable-handle" style="cursor: move;">
              <i class="fa fa-calendar"></i>
              <h3 class="box-title">Calendar</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <!-- button with a dropdown -->
                <div class="btn-group">
                  <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bars"></i></button>
                  <ul class="dropdown-menu pull-right" role="menu">
                    <li><a href="#">Add new event</a></li>
                    <li><a href="#">Clear events</a></li>
                    <li class="divider"></li>
                    <li><a href="#">View calendar</a></li>
                  </ul>
                </div>
                <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <!--The calendar -->
              <div id="calendar" style="width: 100%"><div class="datepicker datepicker-inline"><div class="datepicker-days" style=""><table class="table-condensed"><thead><tr><th colspan="7" class="datepicker-title" style="display: none;"></th></tr><tr><th class="prev">«</th><th colspan="5" class="datepicker-switch">July 2020</th><th class="next">»</th></tr><tr><th class="dow">Su</th><th class="dow">Mo</th><th class="dow">Tu</th><th class="dow">We</th><th class="dow">Th</th><th class="dow">Fr</th><th class="dow">Sa</th></tr></thead><tbody><tr><td class="old day" data-date="1593302400000">28</td><td class="old day" data-date="1593388800000">29</td><td class="old day" data-date="1593475200000">30</td><td class="day" data-date="1593561600000">1</td><td class="day" data-date="1593648000000">2</td><td class="day" data-date="1593734400000">3</td><td class="day" data-date="1593820800000">4</td></tr><tr><td class="day" data-date="1593907200000">5</td><td class="day" data-date="1593993600000">6</td><td class="day" data-date="1594080000000">7</td><td class="day" data-date="1594166400000">8</td><td class="day" data-date="1594252800000">9</td><td class="day" data-date="1594339200000">10</td><td class="day" data-date="1594425600000">11</td></tr><tr><td class="day" data-date="1594512000000">12</td><td class="day" data-date="1594598400000">13</td><td class="day" data-date="1594684800000">14</td><td class="day" data-date="1594771200000">15</td><td class="day" data-date="1594857600000">16</td><td class="day" data-date="1594944000000">17</td><td class="day" data-date="1595030400000">18</td></tr><tr><td class="day" data-date="1595116800000">19</td><td class="day" data-date="1595203200000">20</td><td class="day" data-date="1595289600000">21</td><td class="day" data-date="1595376000000">22</td><td class="day" data-date="1595462400000">23</td><td class="day" data-date="1595548800000">24</td><td class="day" data-date="1595635200000">25</td></tr><tr><td class="day" data-date="1595721600000">26</td><td class="day" data-date="1595808000000">27</td><td class="day" data-date="1595894400000">28</td><td class="day" data-date="1595980800000">29</td><td class="day" data-date="1596067200000">30</td><td class="day" data-date="1596153600000">31</td><td class="new day" data-date="1596240000000">1</td></tr><tr><td class="new day" data-date="1596326400000">2</td><td class="new day" data-date="1596412800000">3</td><td class="new day" data-date="1596499200000">4</td><td class="new day" data-date="1596585600000">5</td><td class="new day" data-date="1596672000000">6</td><td class="new day" data-date="1596758400000">7</td><td class="new day" data-date="1596844800000">8</td></tr></tbody><tfoot><tr><th colspan="7" class="today" style="display: none;">Today</th></tr><tr><th colspan="7" class="clear" style="display: none;">Clear</th></tr></tfoot></table></div><div class="datepicker-months" style="display: none;"><table class="table-condensed"><thead><tr><th colspan="7" class="datepicker-title" style="display: none;"></th></tr><tr><th class="prev">«</th><th colspan="5" class="datepicker-switch">2020</th><th class="next">»</th></tr></thead><tbody><tr><td colspan="7"><span class="month">Jan</span><span class="month">Feb</span><span class="month">Mar</span><span class="month">Apr</span><span class="month">May</span><span class="month">Jun</span><span class="month focused">Jul</span><span class="month">Aug</span><span class="month">Sep</span><span class="month">Oct</span><span class="month">Nov</span><span class="month">Dec</span></td></tr></tbody><tfoot><tr><th colspan="7" class="today" style="display: none;">Today</th></tr><tr><th colspan="7" class="clear" style="display: none;">Clear</th></tr></tfoot></table></div><div class="datepicker-years" style="display: none;"><table class="table-condensed"><thead><tr><th colspan="7" class="datepicker-title" style="display: none;"></th></tr><tr><th class="prev">«</th><th colspan="5" class="datepicker-switch">2020-2029</th><th class="next">»</th></tr></thead><tbody><tr><td colspan="7"><span class="year old">2019</span><span class="year focused">2020</span><span class="year">2021</span><span class="year">2022</span><span class="year">2023</span><span class="year">2024</span><span class="year">2025</span><span class="year">2026</span><span class="year">2027</span><span class="year">2028</span><span class="year">2029</span><span class="year new">2030</span></td></tr></tbody><tfoot><tr><th colspan="7" class="today" style="display: none;">Today</th></tr><tr><th colspan="7" class="clear" style="display: none;">Clear</th></tr></tfoot></table></div><div class="datepicker-decades" style="display: none;"><table class="table-condensed"><thead><tr><th colspan="7" class="datepicker-title" style="display: none;"></th></tr><tr><th class="prev">«</th><th colspan="5" class="datepicker-switch">2000-2090</th><th class="next">»</th></tr></thead><tbody><tr><td colspan="7"><span class="decade old">1990</span><span class="decade">2000</span><span class="decade">2010</span><span class="decade focused">2020</span><span class="decade">2030</span><span class="decade">2040</span><span class="decade">2050</span><span class="decade">2060</span><span class="decade">2070</span><span class="decade">2080</span><span class="decade">2090</span><span class="decade new">2100</span></td></tr></tbody><tfoot><tr><th colspan="7" class="today" style="display: none;">Today</th></tr><tr><th colspan="7" class="clear" style="display: none;">Clear</th></tr></tfoot></table></div><div class="datepicker-centuries" style="display: none;"><table class="table-condensed"><thead><tr><th colspan="7" class="datepicker-title" style="display: none;"></th></tr><tr><th class="prev">«</th><th colspan="5" class="datepicker-switch">2000-2900</th><th class="next">»</th></tr></thead><tbody><tr><td colspan="7"><span class="century old">1900</span><span class="century focused">2000</span><span class="century">2100</span><span class="century">2200</span><span class="century">2300</span><span class="century">2400</span><span class="century">2500</span><span class="century">2600</span><span class="century">2700</span><span class="century">2800</span><span class="century">2900</span><span class="century new">3000</span></td></tr></tbody><tfoot><tr><th colspan="7" class="today" style="display: none;">Today</th></tr><tr><th colspan="7" class="clear" style="display: none;">Clear</th></tr></tfoot></table></div></div></div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-black">
              <div class="row">
                <div class="col-sm-6">
                  <!-- Progress bars -->
                  <div class="clearfix">
                    <span class="pull-left">Task #1</span>
                    <small class="pull-right">90%</small>
                  </div>
                  <div class="progress xs">
                    <div class="progress-bar progress-bar-green" style="width: 90%;"></div>
                  </div>
                  <div class="clearfix">
                    <span class="pull-left">Task #2</span>
                    <small class="pull-right">70%</small>
                  </div>
                  <div class="progress xs">
                    <div class="progress-bar progress-bar-green" style="width: 70%;"></div>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                  <div class="clearfix">
                    <span class="pull-left">Task #3</span>
                    <small class="pull-right">60%</small>
                  </div>
                  <div class="progress xs">
                    <div class="progress-bar progress-bar-green" style="width: 60%;"></div>
                  </div>
                  <div class="clearfix">
                    <span class="pull-left">Task #4</span>
                    <small class="pull-right">40%</small>
                  </div>
                  <div class="progress xs">
                    <div class="progress-bar progress-bar-green" style="width: 40%;"></div>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
    </div>
    <div class="panel-footer"><button type="button" class="btn btn-sm btn-primary btn-labeled " style="float: left"><span class="btn-label">
            <i class="fa fa-ellipsis-h"></i></span>للتفاصيل أكثر
           </button></div>
</div>
</div>
    </div> <!--end of first div-->
  <div class="col-md-12">
<div class="col-xs-12 col-md-4">
<div class="panel panel-default">
    <div class="panel-heading" 
     style="background-color: #00bd9e !important;background-image: none !important; color: white;">إحصائيات الطلبات</div>
    <div class="panel-body" style="height: 350px;overflow: hidden;">
    <div class="row">
          <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>150</h3>
              <p>الطلبات المقدمة</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">للتفاصيل<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
       <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>44</h3>
              <p>الطلبات المعلقة</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">للتفاصيل <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
           <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>44</h3>
              <p>الطلبات المقبولة</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">للتفاصيل <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <!-- ./col -->
        <!-- ./col -->
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>
                <p>الطلبات المرفوضة</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">للتفاصيل <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
    </div>
    <div class="panel-footer"><button type="button" class="btn btn-sm btn-primary btn-labeled " style="float: left"><span class="btn-label">
            <i class="fa fa-ellipsis-h"></i></span>للتفاصيل أكثر
           </button></div>
</div>
</div>
<div class="col-xs-12 col-md-4">
<div class="panel panel-default">
    <div class="panel-heading" style="background-color: #c4628b  !important;background-image: none !important; color: white;">
        أرصدة الأجازات</div>
    <div class="panel-body" style="height: 295px;overflow: hidden;">
  <div id="piechart"></div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);
// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Task', 'Hours per Day'],
  ['أجازة سنوية', 8],
  ['أجازة اضطرارية', 2],
  ['مرضية قصيرة	', 4],
  ['مرضية طويلة	', 2],
  ['إجمالي', 8]
]);
  // Optional; add a title and set the width and height of the chart
  var options = {'title':'رصيد الأجازات', 'height':400};
  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>
  </div>       
  </div> 
   </div>
 <div class="col-xs-12 col-md-4" >
 <div class="panel panel-default">
    <div class="panel-heading" style="background-color: #006d88   !important;background-image: none !important; color: white;">
      الرواتب</div>
    <div class="panel-body" style="height: 295px;overflow: hidden;">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
      var didWait = false;
      docraptorJavaScriptFinished = function() {
        return didWait;
      }
      google.charts.load('current', {packages: ['corechart', 'bar']});
      google.charts.setOnLoadCallback(drawBasic);
      function drawBasic() {
        var data = google.visualization.arrayToDataTable([
            ['يناير ,Jan', '2010 Population',],
            ['فبراير, Feb', 8175000],
            ['مارس, Mar', 3792000],
            ['إبريل, Apr', 2695000],
            ['مايو, May', 2099000],
            ['يونيه, June', 1526000],
            ['يوليو, July', 1526000],
            ['أغسطس, Aug', 1526000],
            ['سبتمبر, Sept', 1526000],
            ['أكتوبر, Oct', 1526000],
            ['نوفمبر, Nov', 1526000],
            ['ديسمبر, Dec', 1526000]
        ]);
        var options = {
          title: 'الراتب خلال الأشهر السابقة ',
          chartArea: {width: '50%'},
          hAxis: {
            title: 'Total Population',
            minValue: 0
          },
          vAxis: {
            title: 'City'
          }
        };
        var chart = new google.visualization.BarChart(document.getElementById('chart'));
        google.visualization.events.addListener(chart, 'ready', function(){
          didWait = true;
        });
        chart.draw(data, options);
      }
    </script>
    <div id="chart" style="width: 500px; height: 400px;"></div>
 </div>  
    </div>   </div>  
</div>
  <div class="col-md-12">
          <div class="col-xs-12 col-md-3" >
        <div class="panel panel-default">
            <div class="panel-heading" style="background: #7e55d2;
    color: white;
    background-image: none;">فريق العمل </div>
            <div class="panel-body" style="height: 295px;overflow: hidden;">
            <div class="box-body">
     <div class="widget-box transparent">
<div class="widget-body">
<div class="widget-main padding-8">
<div id="profile-feed-1" class="profile-feed">
<?php 
if(isset($my_employee_edara) and $my_employee_edara != null){
    foreach($my_employee_edara as $my_emp_edara){
    ?>
<div class="profile-activity clearfix">
<div style="">
<img class="pull-left" src="<?=base_url()?>/uploads/human_resources/emp_photo/thumbs/<?=$my_emp_edara->personal_photo?>">
<p class="user" href="#" >  <?=$my_emp_edara->employee?></p>
<p class="pargraph">
<small style="color: #0705a2;font-weight: bold;font-size: 11px;"><?=$my_emp_edara->edara_n?></small>  </p>
<p  style="color: #840404;" class="pargraph"><i class="fa fa-phone" aria-hidden="true"></i> <?=$my_emp_edara->tahwela_rkm?> 
&nbsp;&nbsp;&nbsp;
<i class="fa fa-mobile" aria-hidden="true"></i>
<?=$my_emp_edara->phone?></p>
</div>
</div>   
<?php 
 }
}
?>
</div>
</div>
</div>
</div>
            </div>
            </div>
            <div class="panel-footer">
               <button type="button" class="btn btn-sm btn-primary btn-labeled " 
            style="float: left"><span class="btn-label">
            <i class="fa fa-ellipsis-h"></i></span>للتفاصيل أكثر
           </button>
            </div>
        </div>
        </div>
         <div class="col-xs-12 col-md-3" >
        <div class="panel panel-default">
            <div class="panel-heading" style="background: #15c0ad;
    color: white;
    background-image: none;"> موظفي الجمعية </div>
            <div class="panel-body" style="height: 295px;overflow: hidden;">
            <div class="box-body">
     <div class="widget-box transparent">
<div class="widget-body">
<div class="widget-main padding-8">
<div id="profile-feed-1" class="profile-feed">
<?php 
if(isset($all_employees) and $all_employees != null){
    foreach($all_employees as $one_emp){
    ?>
<div class="profile-activity clearfix">
<div style="">
<img class="pull-left" src="<?=base_url()?>/uploads/human_resources/emp_photo/thumbs/<?=$one_emp->personal_photo?>">
<p class="user" href="#" >  <?=$one_emp->employee?></p>
<p class="pargraph">
<small style="color: #0705a2;font-weight: bold;font-size: 11px;"><?=$one_emp->edara_n?></small>  </p>
<p  style="color: #840404;" class="pargraph"><i class="fa fa-phone" aria-hidden="true"></i> <?=$one_emp->tahwela_rkm?> 
&nbsp;&nbsp;&nbsp;
<i class="fa fa-mobile" aria-hidden="true"></i>
<?=$one_emp->phone?></p>
</div>
</div>   
<?php 
 }
}
?>
</div>
</div>
</div>
</div>
            </div>
            </div>
            <div class="panel-footer">
               <button type="button" class="btn btn-sm btn-primary btn-labeled " 
            style="float: left"><span class="btn-label">
            <i class="fa fa-ellipsis-h"></i></span>للتفاصيل أكثر
           </button>
            </div>
        </div>
        </div>
    <div class="col-xs-12 col-md-3" >
        <div class="panel panel-default">
        <div class="panel-heading" style="    background: #e15e6d;
    color: white;
    background-image: none;"
        >التعينات الجديدة </div>
            <div class="panel-body" style="height: 295px;overflow: hidden;">
                 <div class="widget-box transparent">
<div class="widget-body">
<div class="widget-main padding-8">
<div id="profile-feed-1" class="profile-feed">
    <div class="profile-activity clearfix">
        <div style="">
        <img class="pull-left" src="https://abnaa-sa.org/asisst/admin_asset/img/avatar5.png">
        <p class="user" href="#" >محمد علي محمد</p>
        <p class="pargraph">
        <small style="color: #0705a2;font-weight: bold;font-size: 11px;">الموارد البشرية</small>  
        <span class="badge bg-green">إرسال رسالة ترحيب</span>
        </p>
        <p  style="color: #840404;" class="pargraph"><i class="fa fa-phone" aria-hidden="true"></i> 250 
        &nbsp;&nbsp;&nbsp;
        <i class="fa fa-mobile" aria-hidden="true"></i>
        0566658448</p>
        </div>
    </div>   
        <div class="profile-activity clearfix">
        <div style="">
        <img class="pull-left" src="https://abnaa-sa.org/asisst/admin_asset/img/avatar5.png">
        <p class="user" href="#" >أحمد بن علي </p>
        <p class="pargraph">
        <small style="color: #0705a2;font-weight: bold;font-size: 11px;">تنمية الموارد</small>  
         <span class="badge bg-green">إرسال رسالة ترحيب</span>
        </p>
        <p  style="color: #840404;" class="pargraph"><i class="fa fa-phone" aria-hidden="true"></i> 250 
        &nbsp;&nbsp;&nbsp;
        <i class="fa fa-mobile" aria-hidden="true"></i>
        0566658448</p>
        </div>
    </div> 
</div>
</div>
</div>
</div>
        </div>
    </div>
</div>  
 <div class="col-xs-12 col-md-3" >
         <div class="panel panel-default">
            <div class="panel-heading" style="    background: #4d9c8a;
    color: white;
    background-image: none;">المغادرون</div>
            <div class="panel-body" style="height: 295px;overflow: hidden;">
 <table class="table table-hover">
                <tbody><tr>
                  <th>م</th>
                  <th>إسم الموظف</th>
                  <th>السبب</th>
                </tr>
                <tr>
                  <td>1</td>
                  <td>مسعد السيد عبدالعزيز </td>
                  <td><span class="label label-success">أجازة سنوية</span></td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>سامي نايف عبدالمحسن الحربي</td>
                  <td><span class="label label-warning">إذن شخصي</span></td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>أحمد عبدالله سليمان المهوس</td>
                  <td><span class="label label-primary">إنتداب</span></td>
                </tr>
              </tbody></table>
  </div> </div>
 </div>
 </div>
<div class="col-md-12">
 <div class="col-xs-12 col-md-4" >
          <!-- Profile Image -->
                  <div class="panel panel-default">
            <div style="background-color: #00bd9e !important;background-image: none !important; color: white;" class="panel-heading">الموظف المثالي لهذا الشهر</div>
            <div class="panel-body" style="height: 400px;overflow: hidden;">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" 
             src="https://abnaa-sa.org//uploads/human_resources/emp_photo/thumbs/8fc59cb185594d0c3b124a683158cf0f.png"
               alt="User profile picture">
              <h6 class="profile-username text-center">أحمد عبدالله سليمان المهوس</h6>
              <p class="text-muted text-center">تنمية الموارد</p>
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>عدد المرات السابقة </b> <a class="pull-right"><span class="badge bg-teal">67</span></a>
                </li>
                <li class="list-group-item">
                  <b>اخر تاريخ حصل علي اللقب </b> <a class="pull-right"><span class="badge bg-purple">04-04-2020</span></a>
                </li>
              </ul>
              <a href="#" class="btn btn-success btn-block"><b>إرسال تهنئة</b></a>
            </div>
          </div>
        </div>
</div> 
 </div>
 <!-- yaraaaaaaaaaaaaaaaaaaaaa_start -->
 <div class="col-md-12">       
       <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingfour">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"  href="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                        <i class="fa fa-list" aria-hidden="true"></i> اللوائح والسياسات
                    </a>
                </h4>
            </div>
<div id="collapsefour" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingfour">
    <div class="col-md-12 col-sm-12 col-xs-12 padding-10">
                    <div class="panel panel-default">
                        <div class="panel-body">
                  <div class="col-md-12 all_cont" style="margin-top: 15px;">
<div class="profily">
    <div class="vertical-tabs">
        <div class="tab-content tab-content-vertical">
             <div class="tab-pane active" id="pag2" role="tabpanel">
                <div id="user-profile-1" class="user-profile ">
                    <div class="col-md-12">
                        <div class="sidebar-shortcuts" id="sidebar-shortcuts">
                            <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                                    <button class="btn btn-default" style="background-color: #0088b1;color: #fff;" title="اللوائح" data-toggle="tab" href="#job_data" role="tab" aria-controls="job_data">
                                        <i class="ace-icon fa fa-clipboard  faa-vertical animated"></i>  
                                        اللوائح
                                    </button>
                                    <button class="btn btn-default" style="background-color: #da9300;color: #fff;" title="السياسات" data-toggle="tab" href="#contract_data" role="tab" aria-controls="contract_data">
                                        <i class="ace-icon fa fa-book faa-shake animated"></i>   السياسات
                                    </button>
                                    <button class="btn btn-default" style="background-color: #E5343D;color: #fff;" title=" الهيكل التنظيمى" data-toggle="tab" href="#Finance_data" role="tab" aria-controls="Finance_data">
                                        <i class="ace-icon fa fa-sitemap faa-passing animated"></i>   الهيكل التنظيمى
                                    </button>
                                    <button class="btn btn-default" style="background-color: #50ab20;color: #fff;" title="   المهام الوظيفية" data-toggle="tab" href="#work_data" role="tab" aria-controls="work_data">
                                        <i class="ace-icon fa fa-cogs  faa-burst animated"></i>   المهام الوظيفية
                                    </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="tab-content tab-content-vertical">
                                    <div class="tab-pane active" id="job_data" role="tabpanel">
                                        <div class="col-md-12">
<div id="regulationsContainer" >
<?php  if (isset($sysa) && !empty($sysa)){   foreach ($sysa as $record){ ?>
                                                <div class=" tableItem2 col-md-4 col-sm-6 col-xs-12" ><div class="rules-reg-card rules">
                                                        <a class="rule-clickable-part" >
                                                            <p><span class="icon"><img src="<?= base_url()?>asisst/gam3ia_omomia_asset/img/requlations-icon.png" alt="">
                                  </span> <?=$record->title?></p></a><div class="row"><div class="col-sm-7">
                                                                <span class="date"><i class="fa fa-calendar" aria-hidden="true"></i> <?=$record->publishe_date?></span>
                                                            </div><div class="col-sm-5 card-actions">
                                                                <a href="<?= base_url()."maham_mowazf/basic_data/Maham/downloads/".$record->file?>"
                                                                   class="fa fa-download" title="تحميل المرفقات"></a>
                                                                <?php
                                                                $mehwar_morfaq = $record->file;
                                                                if (!empty($mehwar_morfaq)) {
                                                                    ?>
                                                                    <?php
                                                                    $type = pathinfo($mehwar_morfaq)['extension'];
                                                                    $arry_images = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP', 'WMV', 'wmv');
                                                                    $arr_doc = array('DOC', 'DOCX', 'HTML', 'HTM', 'ODT', 'PDF', 'XLS', 'XLSX', 'ODS', 'PPT', 'PPTX', 'TXT');
                                                                    if (in_array($type, $arry_images)) {
                                                                        ?>
                                                                        <?php if (!empty($mehwar_morfaq)) {
                                                                            $url = base_url() . 'uploads/files/' . $mehwar_morfaq;
                                                                        } else {
                                                                            $url = base_url('asisst/fav/apple-icon-120x120.png');
                                                                        } ?>
                                                                        <a target="_blank" onclick="show_img('<?= $url ?>')">
                                                                            <i class=" fa fa-eye"></i>
                                                                        </a>
                                                                        <?php
                                                                    } elseif (in_array(strtoupper($type), $arr_doc)) {
                                                                        ?>
                                                                        <?php if (!empty($mehwar_morfaq)) {
                                                                            $url =base_url().'maham_mowazf/basic_data/Maham/read_file_report/'.$mehwar_morfaq;
                                                                        } else {
                                                                            $url = base_url('asisst/fav/apple-icon-120x120.png');
                                                                        } ?>
                                                                        <a target="_blank" onclick="show_bdf('<?= $url ?>')">
                                                                            <i class=" fa fa-eye"></i>
                                                                        </a>
                                                                        <?php
                                                                    }
                                                                } else {
                                                                    echo 'لا يوجد';
                                                                }
                                                                ?>
                                                                <!-- modal view -->
                                                                <!-- modal view -->
                                                            </div></div></div></div>
                                            <?php  } } ?>
                                           </div>
                                        </div>
                            </div>
                                <div class="tab-pane " id="contract_data" role="tabpanel">
                                        <div class="col-md-12">
<div id="regulationsContainer" >
<?php  if (isset($system) && !empty($system)){   foreach ($system as $record){ ?>
                                                <div class="tableItem col-md-4 col-sm-6 col-xs-12"><div class="rules-reg-card regulations">
                                                        <a class="rule-clickable-part" >
                                                            <p><span class="icon"><img src="<?= base_url()?>asisst/gam3ia_omomia_asset/img/requlations-icon.png" alt="">
                                  </span><?=$record->title?></p></a><div class="row"><div class="col-sm-7">
                                                                <span class="date"><i class="fa fa-calendar" aria-hidden="true"></i> <?=$record->publishe_date?></span>
                                                            </div><div class="col-sm-5 card-actions">
                                                                <a href="<?= base_url()."maham_mowazf/basic_data/Maham/downloads/".$record->file?>"
                                                                   class="fa fa-download" title="تحميل المرفقات"></a>
                                                                <?php
                                                                $mehwar_morfaq = $record->file;
                                                                if (!empty($mehwar_morfaq)) {
                                                                    ?>
                                                                    <?php
                                                                    $type = pathinfo($mehwar_morfaq)['extension'];
                                                                    $arry_images = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP', 'WMV', 'wmv');
                                                                    $arr_doc = array('DOC', 'DOCX', 'HTML', 'HTM', 'ODT', 'PDF', 'XLS', 'XLSX', 'ODS', 'PPT', 'PPTX', 'TXT');
                                                                    if (in_array($type, $arry_images)) {
                                                                        ?>
                                                                        <?php if (!empty($mehwar_morfaq)) {
                                                                            $url = base_url() . 'uploads/files/' . $mehwar_morfaq;
                                                                        } else {
                                                                            $url = base_url('asisst/fav/apple-icon-120x120.png');
                                                                        } ?>
                                                                        <a target="_blank" onclick="show_img('<?= $url ?>')">
                                                                            <i class=" fa fa-eye"></i>
                                                                        </a>
                                                                        <?php
                                                                    } elseif (in_array(strtoupper($type), $arr_doc)) {
                                                                        ?>
                                                                        <?php if (!empty($mehwar_morfaq)) {
                                                                            // $url = base_url() . 'uploads/egtma3at/all_mehwr/' . $mehwar_morfaq;
                                                                            $url =base_url().'maham_mowazf/basic_data/Maham/read_file_report/'.$mehwar_morfaq;
                                                                        } else {
                                                                            $url = base_url('asisst/fav/apple-icon-120x120.png');
                                                                        } ?>
                                                                        <a target="_blank" onclick="show_bdf('<?= $url ?>')">
                                                                            <i class=" fa fa-eye"></i>
                                                                        </a>
                                                                        <?php
                                                                    }
                                                                } else {
                                                                    echo 'لا يوجد';
                                                                }
                                                                ?>
                                                                <!-- modal view -->
                                                                <!-- modal view -->
                                                            </div></div></div></div>
                                            <?php  } } ?>
                                           </div>
                                        </div>
                                </div>
                                <div class="tab-pane " id="Finance_data" role="tabpanel">
                                        <div class="col-md-12 center">
                                    <h2>لهيكل التنظيمى</h2>
                                        </div>
                                </div>
                                <div class="tab-pane" id="work_data" role="tabpanel">
                                    <div class="col-md-12 text-center" style="margin-top: 30px;">
                                            <?php if(isset($mahma_wazefya)&&!empty($mahma_wazefya))
                                            {?>
                                            <div class="col-md-3 ">
                                <div class="syst">
                                    <p><i class="fa fa-file-pdf-o" style="color: #B1090A;font-size: 26px;"></i>  <?php echo $mahma_wazefya[0]->title?> </p>
        <!-- <a class="download" href="pdf/1.pdf" download=""><i class="fa fa-download"></i> تحميل  </a> -->
        <a class="download"  href="<?= base_url()."maham_mowazf/basic_data/Maham/downloads_maham/".$mahma_wazefya[0]->file?>"
                                                                   class="fa fa-download" title="تحميل "> 
                                                                   تحميل
                                                                   </a>
                                    &nbsp;&nbsp;&nbsp;
 <?php
                                                                $mehwar_morfaq = $mahma_wazefya[0]->file;
                                                                if (!empty($mehwar_morfaq)) {
                                                                    ?>
                                                                    <?php
                                                                    $type = pathinfo($mehwar_morfaq)['extension'];
                                                                    $arry_images = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP', 'WMV', 'wmv');
                                                                    $arr_doc = array('DOC', 'DOCX', 'HTML', 'HTM', 'ODT', 'PDF', 'XLS', 'XLSX', 'ODS', 'PPT', 'PPTX', 'TXT');
                                                                    if (in_array($type, $arry_images)) {
                                                                        ?>
                                                                        <?php if (!empty($mehwar_morfaq)) {
                                                                            $url = base_url() . 'uploads/human_resources/job_title/' . $mehwar_morfaq;
                                                                        } else {
                                                                            $url = base_url('asisst/fav/apple-icon-120x120.png');
                                                                        } ?>
                                                                        <a target="_blank" onclick="show_img('<?= $url ?>')">
                                                                            <i class=" fa fa-eye"></i>
                                                                        </a>
                                                                        <?php
                                                                    } elseif (in_array(strtoupper($type), $arr_doc)) {
                                                                        ?>
                                                                        <?php if (!empty($mehwar_morfaq)) {
                                                                            $url =base_url().'maham_mowazf/basic_data/Maham/read_file_maham/'.$mehwar_morfaq;
                                                                        } else {
                                                                            $url = base_url('asisst/fav/apple-icon-120x120.png');
                                                                        } ?>
                                                                        <a target="_blank" onclick="show_bdf('<?= $url ?>')">
                                                                            <i class=" fa fa-eye"></i>
                                                                        </a>
                                                                        <?php
                                                                    }
                                                                } else {
                                                                    echo 'لا يوجد';
                                                                }
                                                                ?>       
                                </div>
                            </div>
                            <?php }?>      
                                       </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
                        </div>
                    </div>
                </div>
</div>
        </div>       
 </div>       
 </div>
 <!-- modall -->
 <div class="modal fade" id="Modal_sysa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title ">  اللوائح والسياسات</h4>
            </div>
            <div class="modal-body"
            style="
    height: 1200px;
"
            >

 <!-- yaraaaaaaaaaaaaaaaaaaaaa_start -->
 <div class="col-md-12">       
  
                    <div class="panel panel-default">
                        <div class="panel-body">
                  <div class="col-md-12 all_cont" style="margin-top: 15px;">
<div class="profily">
    <div class="vertical-tabs">
        <div class="tab-content tab-content-vertical">
             <div class="tab-pane active" id="pag2" role="tabpanel">
                <div id="user-profile-1" class="user-profile ">
                    <div class="col-md-12">
                        <div class="sidebar-shortcuts" id="sidebar-shortcuts">
                            <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                                    <button class="btn btn-default" style="background-color: #0088b1;color: #fff;" title="اللوائح" data-toggle="tab" href="#job_data1" role="tab" aria-controls="job_data">
                                        <i class="ace-icon fa fa-clipboard  faa-vertical animated"></i>  
                                        اللوائح
                                    </button>
                                    <button class="btn btn-default" style="background-color: #da9300;color: #fff;" title="السياسات" data-toggle="tab" href="#contract_data1" role="tab" aria-controls="contract_data">
                                        <i class="ace-icon fa fa-book faa-shake animated"></i>   السياسات
                                    </button>
                                    <button class="btn btn-default" style="background-color: #E5343D;color: #fff;" title=" الهيكل التنظيمى" data-toggle="tab" href="#Finance_data1" role="tab" aria-controls="Finance_data">
                                        <i class="ace-icon fa fa-sitemap faa-passing animated"></i>   الهيكل التنظيمى
                                    </button>
                                    <button class="btn btn-default" style="background-color: #50ab20;color: #fff;" title="   المهام الوظيفية" data-toggle="tab" href="#work_data1" role="tab" aria-controls="work_data">
                                        <i class="ace-icon fa fa-cogs  faa-burst animated"></i>   المهام الوظيفية
                                    </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="tab-content tab-content-vertical">
                                    <div class="tab-pane active" id="job_data1" role="tabpanel">
                                        <div class="col-md-12">
<div id="regulationsContainer" >
<?php  if (isset($sysa) && !empty($sysa)){   foreach ($sysa as $record){ ?>
                                                <div class=" tableItem2 col-md-4 col-sm-6 col-xs-12" ><div class="rules-reg-card rules">
                                                        <a class="rule-clickable-part" >
                                                            <p><span class="icon"><img src="<?= base_url()?>asisst/gam3ia_omomia_asset/img/requlations-icon.png" alt="">
                                  </span> <?=$record->title?></p></a><div class="row"><div class="col-sm-7">
                                                                <span class="date"><i class="fa fa-calendar" aria-hidden="true"></i> <?=$record->publishe_date?></span>
                                                            </div><div class="col-sm-5 card-actions">
                                                                <a href="<?= base_url()."maham_mowazf/basic_data/Maham/downloads/".$record->file?>"
                                                                   class="fa fa-download" title="تحميل المرفقات"></a>
                                                                <?php
                                                                $mehwar_morfaq = $record->file;
                                                                if (!empty($mehwar_morfaq)) {
                                                                    ?>
                                                                    <?php
                                                                    $type = pathinfo($mehwar_morfaq)['extension'];
                                                                    $arry_images = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP', 'WMV', 'wmv');
                                                                    $arr_doc = array('DOC', 'DOCX', 'HTML', 'HTM', 'ODT', 'PDF', 'XLS', 'XLSX', 'ODS', 'PPT', 'PPTX', 'TXT');
                                                                    if (in_array($type, $arry_images)) {
                                                                        ?>
                                                                        <?php if (!empty($mehwar_morfaq)) {
                                                                            $url = base_url() . 'uploads/files/' . $mehwar_morfaq;
                                                                        } else {
                                                                            $url = base_url('asisst/fav/apple-icon-120x120.png');
                                                                        } ?>
                                                                        <a target="_blank" onclick="show_img('<?= $url ?>')">
                                                                            <i class=" fa fa-eye"></i>
                                                                        </a>
                                                                        <?php
                                                                    } elseif (in_array(strtoupper($type), $arr_doc)) {
                                                                        ?>
                                                                        <?php if (!empty($mehwar_morfaq)) {
                                                                            $url =base_url().'maham_mowazf/basic_data/Maham/read_file_report/'.$mehwar_morfaq;
                                                                        } else {
                                                                            $url = base_url('asisst/fav/apple-icon-120x120.png');
                                                                        } ?>
                                                                        <a target="_blank" onclick="show_bdf('<?= $url ?>')">
                                                                            <i class=" fa fa-eye"></i>
                                                                        </a>
                                                                        <?php
                                                                    }
                                                                } else {
                                                                    echo 'لا يوجد';
                                                                }
                                                                ?>
                                                                <!-- modal view -->
                                                                <!-- modal view -->
                                                            </div></div></div></div>
                                            <?php  } } ?>
                                           </div>
                                        </div>
                            </div>
                                <div class="tab-pane " id="contract_data1" role="tabpanel">
                                        <div class="col-md-12">
<div id="regulationsContainer" >
<?php  if (isset($system) && !empty($system)){   foreach ($system as $record){ ?>
                                                <div class="tableItem col-md-4 col-sm-6 col-xs-12"><div class="rules-reg-card regulations">
                                                        <a class="rule-clickable-part" >
                                                            <p><span class="icon"><img src="<?= base_url()?>asisst/gam3ia_omomia_asset/img/requlations-icon.png" alt="">
                                  </span><?=$record->title?></p></a><div class="row"><div class="col-sm-7">
                                                                <span class="date"><i class="fa fa-calendar" aria-hidden="true"></i> <?=$record->publishe_date?></span>
                                                            </div><div class="col-sm-5 card-actions">
                                                                <a href="<?= base_url()."maham_mowazf/basic_data/Maham/downloads/".$record->file?>"
                                                                   class="fa fa-download" title="تحميل المرفقات"></a>
                                                                <?php
                                                                $mehwar_morfaq = $record->file;
                                                                if (!empty($mehwar_morfaq)) {
                                                                    ?>
                                                                    <?php
                                                                    $type = pathinfo($mehwar_morfaq)['extension'];
                                                                    $arry_images = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP', 'WMV', 'wmv');
                                                                    $arr_doc = array('DOC', 'DOCX', 'HTML', 'HTM', 'ODT', 'PDF', 'XLS', 'XLSX', 'ODS', 'PPT', 'PPTX', 'TXT');
                                                                    if (in_array($type, $arry_images)) {
                                                                        ?>
                                                                        <?php if (!empty($mehwar_morfaq)) {
                                                                            $url = base_url() . 'uploads/files/' . $mehwar_morfaq;
                                                                        } else {
                                                                            $url = base_url('asisst/fav/apple-icon-120x120.png');
                                                                        } ?>
                                                                        <a target="_blank" onclick="show_img('<?= $url ?>')">
                                                                            <i class=" fa fa-eye"></i>
                                                                        </a>
                                                                        <?php
                                                                    } elseif (in_array(strtoupper($type), $arr_doc)) {
                                                                        ?>
                                                                        <?php if (!empty($mehwar_morfaq)) {
                                                                            // $url = base_url() . 'uploads/egtma3at/all_mehwr/' . $mehwar_morfaq;
                                                                            $url =base_url().'maham_mowazf/basic_data/Maham/read_file_report/'.$mehwar_morfaq;
                                                                        } else {
                                                                            $url = base_url('asisst/fav/apple-icon-120x120.png');
                                                                        } ?>
                                                                        <a target="_blank" onclick="show_bdf('<?= $url ?>')">
                                                                            <i class=" fa fa-eye"></i>
                                                                        </a>
                                                                        <?php
                                                                    }
                                                                } else {
                                                                    echo 'لا يوجد';
                                                                }
                                                                ?>
                                                                <!-- modal view -->
                                                                <!-- modal view -->
                                                            </div></div></div></div>
                                            <?php  } } ?>
                                           </div>
                                        </div>
                                </div>
                                <div class="tab-pane " id="Finance_data1" role="tabpanel">
                                        <div class="col-md-12 center">
                                    <h2>لهيكل التنظيمى</h2>
                                        </div>
                                </div>
                                <div class="tab-pane" id="work_data1" role="tabpanel">
                                    <div class="col-md-12 text-center" style="margin-top: 30px;">
                                            <?php if(isset($mahma_wazefya)&&!empty($mahma_wazefya))
                                            {?>
                                            <div class="col-md-3 ">
                                <div class="syst">
                                    <p><i class="fa fa-file-pdf-o" style="color: #B1090A;font-size: 26px;"></i>  <?php echo $mahma_wazefya[0]->title?> </p>
        <!-- <a class="download" href="pdf/1.pdf" download=""><i class="fa fa-download"></i> تحميل  </a> -->
        <a class="download"  href="<?= base_url()."maham_mowazf/basic_data/Maham/downloads_maham/".$mahma_wazefya[0]->file?>"
                                                                   class="fa fa-download" title="تحميل "> 
                                                                   تحميل
                                                                   </a>
                                    &nbsp;&nbsp;&nbsp;
 <?php
                                                                $mehwar_morfaq = $mahma_wazefya[0]->file;
                                                                if (!empty($mehwar_morfaq)) {
                                                                    ?>
                                                                    <?php
                                                                    $type = pathinfo($mehwar_morfaq)['extension'];
                                                                    $arry_images = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP', 'WMV', 'wmv');
                                                                    $arr_doc = array('DOC', 'DOCX', 'HTML', 'HTM', 'ODT', 'PDF', 'XLS', 'XLSX', 'ODS', 'PPT', 'PPTX', 'TXT');
                                                                    if (in_array($type, $arry_images)) {
                                                                        ?>
                                                                        <?php if (!empty($mehwar_morfaq)) {
                                                                            $url = base_url() . 'uploads/human_resources/job_title/' . $mehwar_morfaq;
                                                                        } else {
                                                                            $url = base_url('asisst/fav/apple-icon-120x120.png');
                                                                        } ?>
                                                                        <a target="_blank" onclick="show_img('<?= $url ?>')">
                                                                            <i class=" fa fa-eye"></i>
                                                                        </a>
                                                                        <?php
                                                                    } elseif (in_array(strtoupper($type), $arr_doc)) {
                                                                        ?>
                                                                        <?php if (!empty($mehwar_morfaq)) {
                                                                            $url =base_url().'maham_mowazf/basic_data/Maham/read_file_maham/'.$mehwar_morfaq;
                                                                        } else {
                                                                            $url = base_url('asisst/fav/apple-icon-120x120.png');
                                                                        } ?>
                                                                        <a target="_blank" onclick="show_bdf('<?= $url ?>')">
                                                                            <i class=" fa fa-eye"></i>
                                                                        </a>
                                                                        <?php
                                                                    }
                                                                } else {
                                                                    echo 'لا يوجد';
                                                                }
                                                                ?>       
                                </div>
                            </div>
                            <?php }?>      
                                       </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
                        </div>
                    </div>
                </div>
</div>
        

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
</div>
</div>
 <!-- modall -->
 <!-- yaraaaaaaaaaaaaaaaaaaaaa_end -->
 <!-- yara_start -->
<script>
    function show_img(src) {
        var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
        WinPrint.document.write('<img src="' + src + '" style="width: 100%; height:  100%;">');
        WinPrint.document.close();
        WinPrint.focus();
    }
</script>
<script>
    function show_bdf(src) {
        var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
        WinPrint.document.write('<iframe src="' + src + '" style="width: 100%; height:  100%;" frameborder="0"></iframe>');
        WinPrint.document.close();
        WinPrint.focus();
    }
</script>
<!-- yara_end -->
<script>
$(document).ready(function() {
    $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
    });
});
</script>
<script>
    function get_ezn() {
        $('#modal_header').text('طلب الأذن');
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>maham_mowazf/talabat/all_ozonat/Ezn_order",
            data: {from_profile: 1},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $('#from_time').mdtimepicker(); //Initializes the time picker
                $('#to_time').mdtimepicker(); //Initializes the time picker
                console.log('profile agaza ezn_order ');
            }
        });
    }
    function get_agaza() {
        $('#modal_header').text('طلب اجازة');
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>maham_mowazf/talabat/agazat/Vacation/add_vacation",
            data: {from_profile: 1},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                console.log('profile agaza ezn_order ');
            }
        });
    }
    function get_Job_request() {
        $('#modal_header').text('طلب احتياج وظيفة');
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/job_requests/Job_request",
            data: {from_profile: 1},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $.validate({
                    validateHiddenInputs: true // for live search required
                });
                var oTable_usergroup = $('#js_table').DataTable({
                    dom: 'Bfrtip',
                    ajax: {
                        type: 'post',
                        url: "<?php echo base_url(); ?>human_resources/employee_forms/job_requests/Job_request/display_data",
                        data: {from_profile: 1}
                    },
                    aoColumns: [
                        {"bSortable": true},
                        {"bSortable": true},
                        {"bSortable": true},
                        {"bSortable": true},
                        {"bSortable": true}
                    ],
                    buttons: [
                        'pageLength',
                        'copy',
                        'excelHtml5',
                        {
                            extend: "pdfHtml5",
                            orientation: 'landscape'
                        },
                        {
                            extend: 'print',
                            exportOptions: {columns: ':visible'},
                            orientation: 'landscape'
                        },
                        'colvis'
                    ],
                    colReorder: true
                });
//console.log('profile get_Job_request');
            }
        });
    }
    function get_Disclaimer() {
        $('#modal_header').text('إخلاء طرف');
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/Disclaimer/addDisclaimer",
            data: {from_profile: 1},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $.validate({
                    validateHiddenInputs: true // for live search required
                });
//console.log('profile get_Job_request');
            }
        });
    }
    function get_Mandate_order() {
        $('#modal_header').text('طلب انتداب');
        //"ajax": '<?php //echo base_url(); ?>//human_resources/employee_forms/job_requests/Job_request/display_data',
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/Mandate_orders",
            data: {from_profile: 1},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $.validate({
                    validateHiddenInputs: true // for live search required
                });
//console.log('profile get_Job_request');
            }
        });
    }
    function get_Overtime_hours_orders() {
        $('#modal_header').text('طلب تكليف إضافى');
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/overtime_hours/Overtime_hours_orders/add_overtime_hours_orders",
            data: {from_profile: 1},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $.validate({
                    validateHiddenInputs: true // for live search required
                });
            }
        });
    }
    function get_Volunteer_hours() {
        $('#modal_header').text('طلب ساعات التطوع');
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/Volunteer_hours/add_volunteer_hours",
            data: {from_profile: 1},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $.validate({
                    validateHiddenInputs: true // for live search required
                });
            }
        });
    }
</script>
<script>
    function edite_Job_request(id) {
        $('#modal_header').text('تعديل طلب الوظيفة');
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/job_requests/Job_request/Update_requset",
            data: {id: id, from_profile: 1},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $.validate({
                    validateHiddenInputs: true // for live search required
                });
                var oTable_usergroup = $('#js_table').DataTable({
                    dom: 'Bfrtip',
                    ajax: {
                        type: 'post',
                        url: "<?php echo base_url();?>human_resources/employee_forms/job_requests/Job_request/display_data",
                        data: {from_profile: 1}
                    },
                    aoColumns: [
                        {"bSortable": true},
                        //  { "bSortable": true },
                        {"bSortable": true},
                        {"bSortable": true},
                        {"bSortable": true},
                        {"bSortable": true}
                    ],
                    buttons: [
                        'pageLength',
                        'copy',
                        'excelHtml5',
                        {
                            extend: "pdfHtml5",
                            orientation: 'landscape'
                        },
                        {
                            extend: 'print',
                            exportOptions: {columns: ':visible'},
                            orientation: 'landscape'
                        },
                        'colvis'
                    ],
                    colReorder: true
                });
                console.log('profile agaza ');
            }
        });
    }
    function edite_Disclaimer(id) {
        $('#modal_header').text('تعديل طلب إخلاء طرف ');
        //"ajax": '<?php //echo base_url(); ?>//human_resources/employee_forms/job_requests/Job_request/display_data',
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/Disclaimer/updateDisclaimer",
            data: {id: id, from_profile: 1},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $.validate({
                    validateHiddenInputs: true // for live search required
                });
//console.log('profile get_Job_request');
            }
        });
    }
    function edit_Mandate_order(id) {
        $('#modal_header').text('تعديل طلب  انتداب ');
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/Mandate_orders/edit_Mandate_order",
            data: {id: id, from_profile: 1},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $.validate({
                    validateHiddenInputs: true // for live search required
                });
            }
        });
    }
    function edit_Overtime_hours_orders(id) {
        $('#modal_header').text('تعديل طلب  تكليف إضافى ');
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/overtime_hours/Overtime_hours_orders/edit_overtime_hours_orders",
            data: {id: id, from_profile: 1},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $.validate({
                    validateHiddenInputs: true // for live search required
                });
            }
        });
    }
    function edit_Volunteer_hours(id) {
        $('#modal_header').text('تعديل طلب  ساعات التطوع ');
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/Volunteer_hours/edit_volunteer_hours",
            data: {id: id, from_profile: 1},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $.validate({
                    validateHiddenInputs: true // for live search required
                });
            }
        });
    }
    function edite_agaza(id) {
        $('#modal_header').text('تعديل طلب الاجازة');
        $.ajax({
            type: 'post',
            url: "<?php echo base_url(); ?>maham_mowazf/talabat/agazat/Vacation/edit_vacation",
            data: {id: id},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                console.log('profile agaza ');
            }
        });
    }
    function edite_ezn(id) {
        $('#modal_header').text('تعديل طلب الأذن');
        $.ajax({
            type: 'post',
            url: "<?php echo base_url(); ?>maham_mowazf/talabat/all_ozonat/Ezn_order/Upadte_ezn",
            data: {id: id},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $('#from_time').mdtimepicker(); //Initializes the time picker
                $('#to_time').mdtimepicker(); //Initializes the time picker
                console.log('profile agaza ');
            }
        });
    }
</script>