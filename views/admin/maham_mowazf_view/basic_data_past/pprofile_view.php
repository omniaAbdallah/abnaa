 
<style>
div.bhoechie-tab-container{
  z-index: 10;
  background-color: #ffffff;
  padding: 0 !important;
  border-radius: 4px;
  -moz-border-radius: 4px;
  border:1px solid #ddd;
  margin-top: 0px;
  margin-left: 0px;
  -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
  box-shadow: 0 6px 12px rgba(0,0,0,.175);
  -moz-box-shadow: 0 6px 12px rgba(0,0,0,.175);
  background-clip: padding-box;
  opacity: 0.97;
  filter: alpha(opacity=97);
}
div.bhoechie-tab-menu{
  padding-right: 0;
  padding-left: 0;
  padding-bottom: 0;
}
div.bhoechie-tab-menu div.list-group{
  margin-bottom: 0;
}
div.bhoechie-tab-menu div.list-group>a{
  margin-bottom: 0;
}
div.bhoechie-tab-menu div.list-group>a .glyphicon,
div.bhoechie-tab-menu div.list-group>a .fa {
  color: #f2f1f7;
}
div.bhoechie-tab-menu div.list-group>a:first-child{
  border-top-right-radius: 0;
  -moz-border-top-right-radius: 0;
}
div.bhoechie-tab-menu div.list-group>a:last-child{
  border-bottom-right-radius: 0;
  -moz-border-bottom-right-radius: 0;
}
div.bhoechie-tab-menu div.list-group>a.active,
div.bhoechie-tab-menu div.list-group>a.active .glyphicon,
div.bhoechie-tab-menu div.list-group>a.active .fa{
   
  background-image: #5A55A3;
  color: #ffffff;
}
div.bhoechie-tab-menu div.list-group>a.active:after{
     content: '';
    position: absolute;
    right: 100%;
    top: 50%;
    margin-top: -13px;
    border-left: 0;
    border-bottom: 13px solid transparent;
    border-top: 13px solid transparent;
    border-right: 10px solid #FF9800;
}

 a.list-group-item:hover, a.list-group-item:focus {
    color: #eae5e5;
    text-decoration: none;
    background-color: #080808;
}
    
    .list-group-item.active, .list-group-item.active:hover, .list-group-item.active:focus {
    text-shadow: 0 -1px 0 #3071a9;
    background-image: -webkit-linear-gradient(top,#428bca 0,#3278b3 100%);
    background-image: -o-linear-gradient(top,#428bca 0,#3278b3 100%);
    background-image: -webkit-gradient(linear,left top,left bottom,from(#428bca),to(#3278b3));
    background: radial-gradient(#000000cc, transparent);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff428bca', endColorstr='#ff3278b3', GradientType=0);
    background-repeat: repeat-x;
    border-color: #3278b3;
}
 
 
a.list-group-item {
    color: #f5ebeb;
}   
.list-group-item {
    position: relative;
    display: block;
    padding: 2px 1px;
    margin-bottom: -1px;
    background-color: #292727;
    border-bottom: 1px solid #ddd;
}    
    
 .list-group-item.active, .list-group-item.active:hover, .list-group-item.active:focus {
    z-index: 2;
    color: #fff;
    background-color: #131415;
    border-color: #ddd;
}   
    
 .btn-link {
    font-weight: 600;
    color: #212223;
    cursor: pointer;
    border-radius: 0;
}   
    
 i.orange {
    color: #FF9800;
} 
    
    .btn-link:hover, .btn-link:focus {
    color: #FF9800;
    text-decoration: underline;
    background-color: transparent;
    }
    
div.bhoechie-tab-content{
  background-color: #ffffff;
  /* border: 1px solid #eeeeee; */
  padding-left: 20px;
  padding-top: 10px;
}

div.bhoechie-tab div.bhoechie-tab-content:not(.active){
  display: none;
}
.all_cont{
    padding:7px 0px;
}
    
    .panel-default>.panel-heading {
    color: #424141;
    background-color: #f5f5f5;
    border-color: #ddd;

    /* text-align: right; */
}
   
 

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: right;
  color: #f2f2f2;
  text-align: center;
  padding: 8px 14px;
  text-decoration: none;
  font-size: 17px;
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
    font-size: 16px;
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
    border-radius: 4px;
    padding: 9px 6px;
    margin: 0px 5px;
}   
</style>
<style>
    
    
   .back .profile-contact-info img {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    border: 3px solid #adb5bd;
    margin: 0 auto;
    padding: 3px;

}
 .front .profile-contact-info img {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    border: 3px solid #adb5bd;
    margin: 0 auto;
    padding: 3px;

}  
 
label {
    -webkit-perspective: 1000px;
    perspective: 1000px;
    -webkit-transform-style: preserve-3d;
    transform-style: preserve-3d;
    display: inline;
    /* width: 300px; */
    /* height: 200px; */
    /* position: absolute; */
    /* left: 50%; */
    /* top: 50%; */
    -webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    cursor: pointer;
}

.card {
    position: relative;
     
    width: 100%;
    -webkit-transform-style: preserve-3d;
    transform-style: preserve-3d;
    -webkit-transition: all 600ms;
    transition: all 600ms;
    z-index: 20;
      margin-bottom:0px; 
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);

}

    .card div {
        position: fixed;
        height: 100%;
        width: 100%;
        background: #FFF;
        text-align: center;
        line-height: 2px;
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
        border-radius: 2px;
    }

    .card .back  {
        background: #222;
        color: #FFF;
        -webkit-transform: rotatey(180deg);
        transform: rotatey(180deg);
    }

label:hover .card {
    -webkit-transform: rotatey(20deg);
    transform: rotatey(20deg);
    box-shadow: 0 20px 20px rgba(50,50,50,.2);
}

 

:checked + .card {
    transform: rotatey(180deg);
    -webkit-transform: rotatey(180deg);
}

label:hover :checked + .card {
    transform: rotatey(160deg);
    -webkit-transform: rotatey(160deg);
    box-shadow: 0 20px 20px rgba(255,255,255,.2);
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
}</style> 
   

<div class="topnav">
  <a class="active" href="<?=base_url()?>/Dashboard/pprofile"><h5 class="glyphicon glyphicon-home"></h5> الرئيسية</a>
  <a href="<?=base_url()?>/Dashboard/phome" ><h5 class="glyphicon glyphicon-user"></h5> الملف الشخصى</a>
  <a href="<?=base_url()?>/Dashboard/talabat"><h5 class="glyphicon glyphicon-list-alt"></h5> الطلبات</a>
    <a href="<?=base_url()?>/Dashboard/estalmat"><h5 class="glyphicon glyphicon-comment"></h5> الإستعلامات</a>
    <a href="#"><h5 class="glyphicon glyphicon-time"></h5> ادارة الوقت</a>
    <a href="#" ><h5 class="glyphicon glyphicon-tasks"></h5> المهام</a>
    <a href="#" ><h5 class="glyphicon glyphicon-send"></h5> التراسل </a>
    <a href="#" ><h5 class="glyphicon"><i class="fa fa-money" aria-hidden="true"></i></h5> الرواتب </a>
    <a href="#" ><h5 class="glyphicon"><i class="fa fa-area-chart" aria-hidden="true"></i></h5> التقييمات</a>
</div>
   <!-- Small boxes (Stat box) -->


 
	<div class="col-xs-12 all_cont">
     	<div class="col-md-12">
           
                        
            <div class="col-xs-12 col-md-3">

 <label>
    <input type="checkbox"  style="display: none;"/>
    <div class="card">
        <div class="front">
                                                
                                    
 <div class="profile-contact-info">
     
     <p><img class=" img-fluid" src="https://abnaa-sa.org/uploads/human_resources/emp_photo/thumbs/f99b0dd6f845fc13acc362f876f97212.jpg" alt="card image"></p>
                            <div class="profile-contact-links align-right">


                               <a class="btn btn-link">
                                            <i class="ace-icon fa fa-user-circle bigger-120 green"></i> 
                                
                               الأسم	: <span> مسعد السيد عبدالعزيز أحمد</span></a>
                                       
                                
                                
                                 <a href="#" class="btn btn-link">
                                            <i class="ace-icon fa fa-group	 bigger-120 green"></i>
                                             الإدارة: <span>  وحدة التقنية والدعم الفني</span> 
                                         
                                </a>
                                        <a href="#" class="btn btn-link">
                                            <i class="ace-icon fa fa-map-o	 bigger-120 green"></i>
                                           الوظيفة: <span>  مسؤول التقنية والدعم الفني</span> 
                                                                                    </a>
                                        
                                            <a href="#" class="btn btn-link">
                                                <i class="ace-iconfa fa-address-book-o bigger-120 green"></i>
                                              المدير المباشر: <span>  مسعد السيد عبدالعزيز أحمد</span> 
                                                                                         </a>
                                
                                
                                
                                
                                 <a class="btn btn-link">
                                            <i class="ace-icon fa fa-user-o  bigger-120 green"></i>
                                          الدور على النظام	: <span> موظف علي النظام</span>                                        </a>
                                
                                 
                            </div>


                        </div>

                                
        </div>

        
        <div class="back">
                       
 <div class="profile-contact-info">
     
       <p><img class=" img-fluid" src="https://abnaa-sa.org/uploads/human_resources/emp_photo/thumbs/f99b0dd6f845fc13acc362f876f97212.jpg" alt="card image"></p>
                       
                            <div class="profile-contact-links align-right">
 
                                 <a class="btn btn-link">
                                            <i class="ace-icon fa fa-credit-card bigger-120 green"></i> 
                                
                                الرقم الوظيفي	: <span> 10001</span></a>
                                  <a class="btn btn-link">
                                            <i class="ace-icon fa fa-mobile bigger-120 green"></i>
                                           رقم الجوال	: <span> 0594600015</span>                                        </a>
                                
                                 <a class="btn btn-link">
                                            <i class="ace-icon fa fa-credit-card  bigger-120 green"></i>
                                           رقم الهوية	: <span> 2197254184</span>                                        </a>
                                
                                    
                                
                                
 
                            </div>


                        </div>
</div>
    </div>
</label>
</div>

                    <div class="col-xs-12 col-md-9  ">
                            <center>
                       <div class="col-md-12 col-md-12  ">
                             
                                    
                          <div class="col-md-6">
                             <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h5 class="panel-title" style="text-align:center"> الحضور</h5>
                                                        
                                                        
                                                    </div>
                                <div class="panel-body">
  <div class="vertical-tabs">
       

        <div class="tab-content tab-content-vertical">
 
 
 
             <div class="tab-pane active" id="pag2" role="tabpanel">
                <div id="user-profile-1" class="user-profile ">

                    <div class="col-md-12">
                        <div class="sidebar-shortcuts" id="sidebar-shortcuts">
                            <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                                
                                
                                    
                                <a   title="بيانات الوظفية" data-toggle="tab" href="#time" role="tab" aria-controls="time"><img src="<?php echo base_url()?>asisst/admin_asset/img/calendar.png"></a>
                                

                                    <a   title="بيانات الوظفية" data-toggle="tab" href="#week" role="tab" aria-controls="week"><img src="<?php echo base_url()?>asisst/admin_asset/img/timeline.png"></a>
                                
                                   
                            </div>


                        </div>
                    </div>

                    
                    <div class="col-md-12">

                        <div class="tab-content tab-content-vertical">
                            
                                    <div class="tab-pane active" id="time" role="tabpanel">
                                                            
               <a href="#"><input type="text" placeholder="   اضافة ملاحظات" class="attendance"> <span style="font-size:17px ;color:gray">ايداع </span><i class="fa fa-clock-o" aria-hidden="true"  style="font-size:17px"></i> 
                          <span id="MyClockDisplay" style="font-size:17px"></span>  </a>                     
                        <br> <br>
                                    <h1> <span> ساعات </span> 00:00 </h1>
                                    <p style="font-size:16px">20 2020</p>
                                    <p style="font-size:16px">بعد تسجيل الوصول</p>
   
 
    
    <!-- Start Navigation -->
<script>function showTime(){
    var date = new Date();
    var h = date.getHours(); // 0 - 23
    var m = date.getMinutes(); // 0 - 59
    var s = date.getSeconds(); // 0 - 59
    var session = "AM";
    
    if(h == 0){
        h = 12;
    }
    
    if(h > 12){
        h = h - 12;
        session = "PM";
    }
    
    h = (h < 10) ? "0" + h : h;
    m = (m < 10) ? "0" + m : m;
    s = (s < 10) ? "0" + s : s;
    
    var time = h + ":" + m + ":" + s + " " + session;
    document.getElementById("MyClockDisplay").innerText = time;
    document.getElementById("MyClockDisplay").textContent = time;
    
    setTimeout(showTime, 1000);
    
}

showTime();</script>                          
                            </div>
                                <div class="tab-pane " id="week" role="tabpanel">
                                      <table class="table table-bordered no-margin">
									 
									<tbody>
										<tr>
											<td>الأحد</td>
											<td>19/7/2020</td>
											<td> </td>
											<td>عطلة نهاية الأسبوع</td>
 										</tr>
                                        <tr>
											<td>الأثنين</td>
											<td>20/7/2020</td>
 											<td>-16:40	</td>
											<td>04:40 PM - 04:42 PM	</td> 
										</tr>
                                        <tr>
											<td>الأثنين</td>
											<td>21/7/2020</td>
											<td></td>
											<td> </td>
 										</tr>
                                                                                <tr>
											<td>الثلاثاء</td>
											<td>22/7/2020</td>
											<td></td>
											<td> </td>
 										</tr>
                                        
                                                                                <tr>
											<td>الأربعاء</td>
											<td>23/7/2020</td>
											<td></td>
											<td> </td>
 										</tr>
                                        
                                                                                <tr>
											<td>الخميس</td>
											<td>24/7/2020</td>
											<td></td>
											<td> </td>
 										</tr>
                                        
                                                                                <tr>
											<td>الجمعة</td>
											<td>25/7/2020</td>
											<td></td>
											<td> </td>
 										</tr>
                                        
                                                                                <tr>
											<td>السبت</td>
											<td>26/7/2020</td>
											<td></td>
											<td> </td>
 										</tr>
									</tbody>
                                    </table> 
                                </div>

                                             
                        </div>
                    </div>


                </div>
            </div>

 

        </div>
    </div>

              
 
    
                                 </div >
                              </div> </div>
                        <div class="col-xs-12 col-md-6">
		<div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h5 class="panel-title" style="text-align:center"> الأجازات خلال اليوم <input type="date">
                                                            </h5>
                                                    </div>
                                <div class="panel-body">
                                  
 
		<div class="widget-box transparent">
		 
			<div class="widget-body">
				<div class="widget-main padding-8">
					<div id="profile-feed-1" class="profile-feed">
						<div class="profile-activity clearfix">
							<div style="float:right">
								<img class="pull-left" alt="Alex Doe's avatar" src="https://abnaa-sa.org/asisst/admin_asset/img/avatars/avatar5.png">
								<a class="user" href="#" >  احمد محمود السيد حسن</a>
								 <p style="font-size:15px">  مسؤول التقنية والدعم الفني</p>
<p style="font-size:15px;color:black"><i class="fa fa-phone" aria-hidden="true"></i> 125 
								&nbsp;&nbsp;&nbsp;
<i class="fa fa-mobile" aria-hidden="true"></i>
 01234785641								</p>
								 
                                
                                
							</div>
 
						</div>
						<div class="profile-activity clearfix">
							<div style="float:right">
								<img class="pull-left" alt="Alex Doe's avatar" src="https://abnaa-sa.org/asisst/admin_asset/img/avatars/avatar5.png">
								<a class="user" href="#" >  احمد محمود السيد حسن</a>
								 <p style="font-size:15px">  مسؤول التقنية والدعم الفني</p>
<p style="font-size:15px;color:black"><i class="fa fa-phone" aria-hidden="true"></i> 125 
								&nbsp;&nbsp;&nbsp;
<i class="fa fa-mobile" aria-hidden="true"></i>
 01234785641								</p>
								 
                                
                                
							</div>
 
						</div>
                        
                        						<div class="profile-activity clearfix">
							<div style="float:right">
								<img class="pull-left" alt="Alex Doe's avatar" src="https://abnaa-sa.org/asisst/admin_asset/img/avatars/avatar5.png">
								<a class="user" href="#" >  احمد محمود السيد حسن</a>
								 <p style="font-size:15px">  مسؤول التقنية والدعم الفني</p>
<p style="font-size:15px;color:black"><i class="fa fa-phone" aria-hidden="true"></i> 125 
								&nbsp;&nbsp;&nbsp;
<i class="fa fa-mobile" aria-hidden="true"></i>
 01234785641								</p>
								 
                                
                                
							</div>
 
						</div>
                        
                        						<div class="profile-activity clearfix">
							<div style="float:right">
								<img class="pull-left" alt="Alex Doe's avatar" src="https://abnaa-sa.org/asisst/admin_asset/img/avatars/avatar5.png">
								<a class="user" href="#" >  احمد محمود السيد حسن</a>
								 <p style="font-size:15px">  مسؤول التقنية والدعم الفني</p>
<p style="font-size:15px;color:black"><i class="fa fa-phone" aria-hidden="true"></i> 125 
								&nbsp;&nbsp;&nbsp;
<i class="fa fa-mobile" aria-hidden="true"></i>
 01234785641								</p>
								 
                                
                                
							</div>
 
						</div>
                        
                        						<div class="profile-activity clearfix">
							<div style="float:right">
								<img class="pull-left" alt="Alex Doe's avatar" src="https://abnaa-sa.org/asisst/admin_asset/img/avatars/avatar5.png">
								<a class="user" href="#" >  احمد محمود السيد حسن</a>
								 <p style="font-size:15px">  مسؤول التقنية والدعم الفني</p>
<p style="font-size:15px;color:black"><i class="fa fa-phone" aria-hidden="true"></i> 125 
								&nbsp;&nbsp;&nbsp;
<i class="fa fa-mobile" aria-hidden="true"></i>
 01234785641								</p>
								 
                                
                                
							</div>
 
						</div>
                        
                        						<div class="profile-activity clearfix">
							<div style="float:right">
								<img class="pull-left" alt="Alex Doe's avatar" src="https://abnaa-sa.org/asisst/admin_asset/img/avatars/avatar5.png">
								<a class="user" href="#" >  احمد محمود السيد حسن</a>
								 <p style="font-size:15px">  مسؤول التقنية والدعم الفني</p>
<p style="font-size:15px;color:black"><i class="fa fa-phone" aria-hidden="true"></i> 125 
								&nbsp;&nbsp;&nbsp;
<i class="fa fa-mobile" aria-hidden="true"></i>
 01234785641								</p>
								 
                                
                                
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
                           
                           
                           </center> </div> 
                            
                            
                            
         
                         
                        </div>         
 
</div>
      
<div class="col-md-12 all_cont" style="margin-top: 15px;">
<div class="profily">
    <div class="vertical-tabs">
       

        <div class="tab-content tab-content-vertical">
 
 
 
             <div class="tab-pane active" id="pag2" role="tabpanel">
                <div id="user-profile-1" class="user-profile ">

                    <div class="col-md-12">
                        <div class="sidebar-shortcuts" id="sidebar-shortcuts">
                            <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                                
                                
                                    <button class="btn btn-default" style="background-color: #0088b1;color: #fff;" title="بيانات الوظفية" data-toggle="tab" href="#job_data" role="tab" aria-controls="job_data">
                                        <i class="ace-icon fa fa-clipboard  faa-vertical animated"></i>  
                                        اللوائح
                                    </button>

                                    <button class="btn btn-default" style="background-color: #da9300;color: #fff;" title="بيانات التعاقد" data-toggle="tab" href="#contract_data" role="tab" aria-controls="contract_data">
                                        
                                        <i class="ace-icon fa fa-book faa-shake animated"></i>   السياسات
                                    </button>

                                    <button class="btn btn-default" style="background-color: #E5343D;color: #fff;" title="بيانات المالية " data-toggle="tab" href="#Finance_data" role="tab" aria-controls="Finance_data">
                                        <i class="ace-icon fa fa-sitemap faa-passing animated"></i>   الهيكل التنظيمى
                                    </button>
                                    <button class="btn btn-default" style="background-color: #50ab20;color: #fff;" title="بيانات الدوام " data-toggle="tab" href="#work_data" role="tab" aria-controls="work_data">
                                        <i class="ace-icon fa fa-cogs  faa-burst animated"></i>   المهام الوظيفية
                                    </button>
                                    
                            </div>


                        </div>
                    </div>

                    
                    <div class="col-md-12">

                        <div class="tab-content tab-content-vertical">
                            
                                    <div class="tab-pane active" id="job_data" role="tabpanel">
                                    
                                        <div class="col-md-12">
<div id="regulationsContainer" class="row Rules-wrapper">
               <div class=" tableItem2 col-md-4 col-sm-6 col-xs-12">
<div class="rules-reg-card rules">
           <a class="rule-clickable-part">
            <p><span class="icon"><img src="https://abnaa-sa.org/asisst/gam3ia_omomia_asset/img/requlations-icon.png" alt="">
                                  </span>لائحة وسياسات تنمية الموارد المالية</p></a><div class="row"><div class="col-sm-7">
                 <span class="date"><i class="fa fa-calendar" aria-hidden="true"></i> 2020-07-15 12:40:14</span>
                      </div><div class="col-sm-5 card-actions">
                   <a href="https://abnaa-sa.org/gam3ia_omomia/Gam3ia_omomia/downloads/a8ea523b32d86e72c4153e5711d9400a.pdf" class="fa fa-download" title="تحميل المرفقات"></a>
 <a target="_blank" onclick="#">
                                                                            <i class=" fa fa-eye"></i>
                                                                        </a>
 
               </div>
			   </div>
			   </div>
			   </div>
    
    <div class=" tableItem2 col-md-4 col-sm-6 col-xs-12">
<div class="rules-reg-card rules">
           <a class="rule-clickable-part">
            <p><span class="icon"><img src="https://abnaa-sa.org/asisst/gam3ia_omomia_asset/img/requlations-icon.png" alt="">
                                  </span>لائحة وسياسات تنمية الموارد المالية</p></a><div class="row"><div class="col-sm-7">
                 <span class="date"><i class="fa fa-calendar" aria-hidden="true"></i> 2020-07-15 12:40:14</span>
                      </div><div class="col-sm-5 card-actions">
                   <a href="https://abnaa-sa.org/gam3ia_omomia/Gam3ia_omomia/downloads/a8ea523b32d86e72c4153e5711d9400a.pdf" class="fa fa-download" title="تحميل المرفقات"></a>
 <a target="_blank" onclick="#">
                                                                            <i class=" fa fa-eye"></i>
                                                                        </a>
 
               </div>
			   </div>
			   </div>
			   </div>
    
    <div class=" tableItem2 col-md-4 col-sm-6 col-xs-12">
<div class="rules-reg-card rules">
           <a class="rule-clickable-part">
            <p><span class="icon"><img src="https://abnaa-sa.org/asisst/gam3ia_omomia_asset/img/requlations-icon.png" alt="">
                                  </span>لائحة وسياسات تنمية الموارد المالية</p></a><div class="row"><div class="col-sm-7">
                 <span class="date"><i class="fa fa-calendar" aria-hidden="true"></i> 2020-07-15 12:40:14</span>
                      </div><div class="col-sm-5 card-actions">
                   <a href="https://abnaa-sa.org/gam3ia_omomia/Gam3ia_omomia/downloads/a8ea523b32d86e72c4153e5711d9400a.pdf" class="fa fa-download" title="تحميل المرفقات"></a>
 <a target="_blank" onclick="#">
                                                                            <i class=" fa fa-eye"></i>
                                                                        </a>
 
               </div>
			   </div>
			   </div>
			   </div>
                   
                                           </div>

                                        </div>
                                                                    
                            </div>
                                <div class="tab-pane " id="contract_data" role="tabpanel">

                                        <div class="col-md-12">
<div id="regulationsContainer" class="row Rules-wrapper">
                  <div class="tableItem col-md-4 col-sm-6 col-xs-12">
<div class="rules-reg-card regulations">
                             <a class="rule-clickable-part">
       <p><span class="icon"><img src="https://abnaa-sa.org/asisst/gam3ia_omomia_asset/img/requlations-icon.png" alt="">
                                  </span>&rlm;&rlm;مؤشرات الاشتباه بعمليات غسل الأموال وجرائم تمويل الإرهاب</p></a><div class="row"><div class="col-sm-7">
                                                                <span class="date"><i class="fa fa-calendar" aria-hidden="true"></i> 2020-06-29 15:46:46</span>
                                                            </div><div class="col-sm-5 card-actions">
              <a href="https://abnaa-sa.org/gam3ia_omomia/Gam3ia_omomia/downloads/e86a9daa8a98e96115a532a53ad5c4c4.pdf" class="fa fa-download" title="تحميل المرفقات"></a>
       <a target="_blank" onclick="#">
                                                                            <i class=" fa fa-eye"></i>
                                                                        </a>
                                                                             
                                                            </div></div></div></div>											
															
															
		<div class="tableItem col-md-4 col-sm-6 col-xs-12"><div class="rules-reg-card regulations">
                  <a class="rule-clickable-part">
                 <p><span class="icon"><img src="https://abnaa-sa.org/asisst/gam3ia_omomia_asset/img/requlations-icon.png" alt="">
                                  </span>السياسة العامة للتطوع في الجمعية</p></a><div class="row"><div class="col-sm-7">
                  <span class="date"><i class="fa fa-calendar" aria-hidden="true"></i> 2020-07-15 12:40:49</span>
                                                            </div><div class="col-sm-5 card-actions">
                   <a href="https://abnaa-sa.org/gam3ia_omomia/Gam3ia_omomia/downloads/23a7b6f80a9293597ec7aa92818a08ff.pdf"
				   class="fa fa-download" title="تحميل المرفقات"></a>
<a target="_blank" onclick="#">
                                      <i class=" fa fa-eye"></i>
                                                                        </a>
                                                        
                                                            </div>
															</div>
															</div>
															</div>
											 
		<div class="tableItem col-md-4 col-sm-6 col-xs-12">
		<div class="rules-reg-card regulations">
                                      <a class="rule-clickable-part">
              <p><span class="icon">
			  <img src="https://abnaa-sa.org/asisst/gam3ia_omomia_asset/img/requlations-icon.png" alt="">
                                  </span>سياسة الإبلاغ عن المخالفات</p></a><div class="row"><div class="col-sm-7">
                   <span class="date"><i class="fa fa-calendar" aria-hidden="true"></i> 2020-06-29 15:35:37</span>
                  </div><div class="col-sm-5 card-actions">
             <a href="https://abnaa-sa.org/gam3ia_omomia/Gam3ia_omomia/downloads/620ab2eaaaeda6f15224795d44d86fd8.pdf"
			 class="fa fa-download" title="تحميل المرفقات"></a>
                                              
         <a target="_blank" onclick="#">
                <i class=" fa fa-eye"></i>
                                                                        </a> 
                                                            </div></div></div></div>
															
                   
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
                                            <div class="col-md-3 ">
                                <div class="syst">
                                    <p><i class="fa fa-file-pdf-o" style="color: #B1090A;font-size: 26px;"></i>  أبناء بالأرقام 2018م  </p>
        <a class="download" href="pdf/1.pdf"  download><i class="fa fa-download"></i> تحميل  </a>
                                    &nbsp;&nbsp;&nbsp;
                                    
 <a class="download" href="pdf/1.pdf" target="_blank" ><i class="fa fa-eye" aria-hidden="true"></i> معاينة  </a>
                                </div>
                            </div>
                                        
                                        
<div class="col-md-3 ">                                <div class="syst">
                                    <p><i class="fa fa-file-pdf-o" style="color: #B1090A;font-size: 26px;"></i>  التقرير السنوي 2018
  </p>
        <a class="download" href="pdf/2018.pdf"  download><i class="fa fa-download"></i> تحميل  </a>
                                    &nbsp;&nbsp;&nbsp;
 <a class="download" href="pdf/2018.pdf" target="_blank" ><i class="fa fa-eye" aria-hidden="true"></i> معاينة  </a>
                                </div>
                            </div>

<div class="col-md-3 ">                                <div class="syst">
                                    <p><i class="fa fa-file-pdf-o" style="color: #B1090A;font-size: 26px;"></i>  التقرير المالي - الربع 1-2018م    </p>
        <a class="download" href="pdf/1.pdf"  download><i class="fa fa-download"></i> تحميل  </a>
                                    &nbsp;&nbsp;&nbsp;
 <a class="download" href="pdf/1.pdf" target="_blank" ><i class="fa fa-eye" aria-hidden="true"></i> معاينة  </a>
                                </div>
                            </div>
                    
<div class="col-md-3 ">                                <div class="syst">
                                    <p><i class="fa fa-file-pdf-o" style="color: #B1090A;font-size: 26px;"></i>  التقرير المالي - الربع 1-2018م    </p>
        <a class="download" href="pdf/1.pdf"  download><i class="fa fa-download"></i> تحميل  </a>
                                    &nbsp;&nbsp;&nbsp;
 <a class="download" href="pdf/1.pdf" target="_blank" ><i class="fa fa-eye" aria-hidden="true"></i> معاينة  </a>
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

 
<div class="modal fade" id="ezn_Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 90%;height: 90%;overflow: auto">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="modal_header"></h4>
            </div>
            <div class="modal-body" id="ezn_Modal_body">

            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%;">

                <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>

            </div>
        </div>
    </div>
</div>


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

















