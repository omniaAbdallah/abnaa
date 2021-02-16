 
  <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css1/bootstrap-rtl.min.css"> 
 <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css1/AdminLTE.min.css"> 
 
<style>
    
    .row {
     margin-right:0px; 
     margin-left: 0px; 
}
 .all_cont {
    padding: 7px 0px;
}
   
 

.topnav {
  overflow: hidden;
  background-color: #333;
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
    .modal-footer .btn+.btn {
    margin-right: 5px;
    margin-bottom: 5px;
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
  .barcode {
    padding: 0px 30px;
    text-align: center;
}
        .barcode img {
    height: 30px;
    max-width: 85%;
    margin-top: 65px;
}
           .back-footer img {
    /* width: 85%; */
    margin-top: 87px;
    height: 130px;
}
           
 
           
           .profile-contact-links {
    border: 0px solid #E0E2E5;
     background-color: #f8fafc00; 
    padding: 4px 2px 5px;
}
           
                                       
            .img-fluid{ 
        width: 110px;
    height: 110px;
    border-radius: 50%;
    border: 4px solid #628c9e;
    margin: 0 auto;
    padding: 3px;
    margin-top: 15px;
}
 
   .back .profile-contact-info img {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    border: 3px solid #adb5bd;
    margin: 0 auto;
    padding: 3px;

}
  .label {
    width: 100%;
    color: #000;
    height: auto;
    margin: 0;
    font-family: 'hl';
    padding-right: 0px;
    font-size: 15px;
     display: inline; 
    text-align: right;
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
         
        width: 100%;
       
        text-align: center;
        line-height: 2px;
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
        border-radius: 2px;
    }

    .card .back  {
        
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
                 
  
<div class="topnav">
  <a  href="<?=base_url()?>/Dashboard/pprofile"><h5 class="glyphicon glyphicon-home"></h5> الرئيسية</a>
  <a href="<?=base_url()?>/Dashboard/phome" class="active"><h5 class="glyphicon glyphicon-user"></h5> الملف الشخصى</a>
  <a href="<?=base_url()?>/Dashboard/talabat"><h5 class="glyphicon glyphicon-list-alt"></h5> الطلبات</a>
    <a href="<?=base_url()?>/Dashboard/estalmat"><h5 class="glyphicon glyphicon-comment"></h5> الإستعلامات</a>
    <a href="#"><h5 class="glyphicon glyphicon-time"></h5> ادارة الوقت</a>
    <a href="#" ><h5 class="glyphicon glyphicon-tasks"></h5> المهام</a>
    <a href="#" ><h5 class="glyphicon glyphicon-send"></h5> التراسل </a>
    <a href="#" ><h5 class="glyphicon"><i class="fa fa-money" aria-hidden="true"></i></h5> الرواتب </a>
    <a href="#" ><h5 class="glyphicon"><i class="fa fa-area-chart" aria-hidden="true"></i></h5> التقييمات</a>
</div>
 


<div class="profily" style="margin-top: 20px;">
    <div class="vertical-tabs">
       

        <div class="tab-content tab-content-vertical">
            

            <!--------------------------------------------------------------->
 
 
 
             <div class="tab-pane active" id="pag2" role="tabpanel">
                <div id="user-profile-1" class="user-profile ">

                    <div class="col-xs-12">
                        <div class="sidebar-shortcuts" id="sidebar-shortcuts">
                            <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                                
                                
                                    <button class="btn btn-default" style="background-color: #0088b1;color: #fff;" title="بيانات الوظفية" data-toggle="tab" href="#job_data" role="tab" aria-controls="job_data">
                                        <i class="ace-icon fa fa-address-card-o faa-vertical animated"></i> بيانات
                                        الوظفية
                                    </button>

                                    <button class="btn btn-default" style="background-color: #da9300;color: #fff;" title="بيانات التعاقد" data-toggle="tab" href="#contract_data" role="tab" aria-controls="contract_data">
                                        <i class="ace-icon fa fa-clipboard faa-shake animated"></i> بيانات التعاقد
                                    </button>

                                    <button class="btn btn-default" style="background-color: #E5343D;color: #fff;" title="بيانات المالية " data-toggle="tab" href="#Finance_data" role="tab" aria-controls="Finance_data">
                                        <i class="ace-icon fa fa-money faa-passing animated"></i> بيانات المالية
                                    </button>
                                    <button class="btn btn-default" style="background-color: #d54c7e;color: #fff;" title="بيانات الدوام " data-toggle="tab" href="#work_data" role="tab" aria-controls="work_data">
                                        <i class="ace-icon fa fa-tasks faa-burst animated"></i> بيانات الدوام
                                    </button>
                                    <button class="btn btn-default" style="background-color: #3F51B5 ;color: #fff;" title="بيانات المستندات  " data-toggle="tab" href="#files_data" role="tab" aria-controls="work_data">
                                        <i class="ace-icon fa fa-book faa-burst animated"></i> بيانات المستندات
                                    </button>
                                
                            </div>


                        </div>
                    </div>

                  
                   
                  
                    
                    
                    
                    
                    <div class="col-xs-12 col-sm-12">

                        <div class="tab-content tab-content-vertical">
                            
                                    <div class="tab-pane active" id="job_data" role="tabpanel">
                                         
                    <div class="col-xs-12 col-md-3" >

 <label>
    <input type="checkbox"  style="display: none;"/>
    <div class="card ">
        <div class="front tttgf1 ">
                                                
                                    
 <div class="profile-contact-info ">
   
      <img src="https://abnaa-sa.org//asisst/admin_asset/img/profile/thumbnail-(3).png" style="height: 58px;
    margin-top: 11px;">
     
     
     
                            <div class="profile-contact-links align-right">

<p style="text-align:center"><img class=" img-fluid " src="https://abnaa-sa.org/uploads/human_resources/emp_photo/thumbs/f99b0dd6f845fc13acc362f876f97212.jpg" alt="card image" ></p>
     
                   
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
                                
                                
                                 <a class="btn btn-link" data-toggle="modal" data-target="#modal-data" style="color:#229225">
                                    <i class="ace-icon fa fa-plus-circle bigger-120  "></i>
                                    تعديل بيانات حسابى
                                </a>
                                
                              <p class="tttgf2"></p>
                            </div>


                        </div>
 
                                
        </div>

        
               <div class="back tttgf">
                                                
                                    
 <div class="  ">
    
     
                            <div class=" align-right" style="margin-top: 45px;">

 <a class="btn btn-link">
                                            <i class="ace-icon fa fa-credit-card bigger-120 green"></i> 
                                
                                الرقم الوظيفي	: <span> 10001</span></a>
                                  <a class="btn btn-link">
                                            <i class="ace-icon fa fa-mobile bigger-120 green"></i>
                                           رقم الجوال	: <span> 0594600015</span>                                        </a>
                                
                                 <a class="btn btn-link">
                                            <i class="ace-icon fa fa-credit-card  bigger-120 green"></i>
                                           رقم الهوية	: <span> 2197254184</span>                                        </a>
                                
 <div class="barcode1">
    								<img style="height: 55px !important;" src="https://abnaa-sa.org//asisst/admin_asset/img/profile/qrcode.png">
    							</div>
    							<div class="barcode">
    								<img src="https://abnaa-sa.org//asisst/admin_asset/img/profile/barcode.png">
    							</div>
                                
                                <div class="back-footer">
    								<img src="https://abnaa-sa.org//asisst/admin_asset/img/profile/thumbnail.png">
    							</div>
                            </div>


                        </div>

                                
        </div>

  
        
        
        
        
        
        
        
       
     </div>
</label>
</div>
            
                                    
                                        <div class="col-md-9 ">

                                           <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h5 class="panel-title center">بيانات الوظيفة</h5>
                                                    </div>
                                                    <div class="panel-body">
                                <table class="table1  " id="finance_Data_1" style="">
                                                             
                                                            <tbody>
                                                            
                                                                        <tr> <td>حاله الموظف	</td>
                                                                        <td style="color:#50ab20"> نشط</td>
                                                                    </tr>
                                                                      
                                                                        <tr> <td>الدرجه العلميه	</td>
                                                                        <td>الجامعية </td>
                                                                    </tr>
                                                         
                                                                        <tr> <td>المؤهل العلمي	 </td>
                                                                        <td> بكالوريوس محاسبة	</td>
                                                                    </tr>
                                                                    
                                                                         <tr> <td> الفئه الوظيفيه	</td>
                                                                        <td> الإدارة الوسطي
                                                                       </td>
                                                                    </tr>
                                                                   <tr> <td> الاداره</td>
                                                                        <td>وحدة التقنية والدعم الفني	 </td>
                                                                    </tr>
                                                                
                                                                   <tr> <td> المسمي الوظيفي	</td>
                                                                        <td> مسؤول التقنية والدعم الفني	</td>
                                                                    </tr>
                                                                   <tr> <td> المدير المباشر	</td>
                                                                        <td>سلطان محمد سليمان الجاسر
 </td>
                                                                    </tr>
                                                                   
                                                                                                                             
                                                           
                                                        </table>

                                                        
                                                    </div>
                                                </div>
                                           

                                        </div>
                                        
                                        
                                        
                                        
                                        
                                        
                                                                    </div>
                                <div class="tab-pane " id="contract_data" role="tabpanel">
                                    
                                        <div class="col-md-12 ">

                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h5 class="panel-title center">بيانات التعاقد</h5>
                                                </div>
                                                <div class="panel-body">
                                                 <table class="table1  " id="finance_Data_1" style="">
                                                             
                                                            <tbody>
                                                            
                                                                        <tr> <th>طبيعة العقد</th>
                                                                        <td> عقد عمل كامل الوقت</td>
                                                                    </tr>
                                                                      
                                                                        <tr> <th>طبيعة العمل</th>
                                                                        <td>- </td>
                                                                    </tr>
                                                         
                                                                        <tr> <th>أيام العمل خلال الشهر</th>
                                                                        <td> 30	</td>
                                                                    </tr>
                                                                    
                                                                         <tr> <th>ساعات العمل</th>
                                                                        <td> 8
                                                                       </td>
                                                                    </tr>
                                                                   <tr> <th>أجر الساعة</th>
                                                                        <td>9	 </td>
                                                                    </tr>
                                                                
                                                                   <tr> <th>فترات العمل</th>
                                                                        <td> فترة </td>
                                                                    </tr>
                                                                   <tr> <th>الأجازة السنوية</th>
                                                                        <td>30
                                                                               </td>
                                                                    </tr>
                                                                   
                                                                
                                                                <tr> <th>الأجازة الاضطرارية</th>
                                                                        <td>5
                                                                               </td>
                                                                    </tr>
                                                                
                                                                <tr>  <th>رصيد الاجازة السنوية السابقة</th>
                                                                        <td>30
                                                                               </td>
                                                                    </tr>
                                                                
                                                                <tr> <th>طريقة دفع الراتب</th>
                                                                        <td>تحويل بنكي
                                                                               </td>
                                                                    </tr>
                                                            
                                                                
                                                                                                                             
                                                           
                                                        </table>   
                                                    
                                                    
                                                    
                                                    
                                                    
                                              
                                                </div>

                                            </div>


                                        </div>
                                    
                                </div>

                                <div class="tab-pane " id="Finance_data" role="tabpanel">
                                    
                                        <div class="col-md-12 center">
                                                              
              <div class="panel panel-default">
             <div class="panel-heading">
                                                        <h5 class="panel-title">البيانات المالية</h5>
                                                    </div> </div>
                                            <div class="col-md-6">
<div class="panel panel-default">
                                                
                                                    <div class="panel-heading">
                                                        <h5 class="panel-title">بيانات الاستحقاقات</h5>
                                                    </div>
                                                    <div class="panel-body">
                                                        <table class="table2" id="finance_Data_1" style="">
                                                            <thead>
                                                            <tr>
                                                                <th >إسم
                                                                    البند
                                                                </th>
                                                                <th  >القيمه
                                                                </th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                                                                                                <tr>
                                                                        <td>راتب أساسي</td>
                                                                        <td>4520</td>
                                                                    </tr>
                                                                                                                                    <tr>
                                                                        <td>بدل سكن</td>
                                                                        <td>1130</td>
                                                                    </tr>
                                                                                                                                    <tr>
                                                                        <td>بدل مواصلات</td>
                                                                        <td>400</td>
                                                                    </tr>
                                                                                                                                    <tr>
                                                                        <td>بدل تكليف</td>
                                                                        <td>2000</td>
                                                                    </tr>
                                                                                                                                    <tr>
                                                                        <td>بدل إستخدام جوال</td>
                                                                        <td>300</td>
                                                                    </tr>
                                                                                                                            </tbody>
                                                            <tfoot>
                                                            <tr>
                                                                <td  >إجمالي</td>
                                                                <td  >8350</td>
                                                            </tr>
                                                            </tfoot>
                                                        </table>

                                                        <div class="alert alert-danger" id="no_data_1" style="display: none">
                                                            <h4>لا يوجد بيانات </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">

                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h5 class="panel-title">بيانات الاستقطاعات</h5>
                                                    </div>
                                                    <div class="panel-body">
                                                        <table class="table2 " id="finance_Data_2" style="display: none">
                                                            <thead>
                                                            <tr>
                                                                <th >إسم
                                                                    البند
                                                                </th>
                                                                <th >القيمه
                                                                </th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                           
                                                            <tfoot>
                                                            <tr>
                                                                <th  >إجمالي</th>
                                                                <td  ></td>
                                                            </tr>
                                                            </tfoot>
                                                        </table>
                                                        <div class="alert alert-danger" id="no_data_2" style="">
                                                            <h4>لا يوجد بيانات </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12 total">
                                                <h4>صافي المرتب :
                                                    <span>8350 </span>
                                                </h4>

                                            </div>
                                        </div>
         
                                     
                                </div>

                                <div class="tab-pane" id="work_data" role="tabpanel">
                                    <div class="col-md-12 text-center">

                                                                            
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h5 class="panel-title">بيانات الدوام</h5>
                                                    </div>
                                                    <div class="panel-body">
                                                        <table class="table2" id="finance_Data_1" style="">
                                                            <thead>
                                                            <tr>
                                                                <th >م	</th>
                                                                 <th >  إسم الدوام			</th>
                                                                <th >  وقت الحضور			</th>
                                                                <th >  وقت الانصراف			</th>
                                                                <th >  من تاريخ			</th>
                                                                <th >  الى تاريخ		</th>
                                                                
                                                                 
                                                            </tr>
                                                            </thead>
                                                            <tbody >
                                                                <tr>
                                                                <td>1	 </td>   
                                                                <td>صباحي 	 </td>  
                                                                 <td> 08:00	</td>  
                                                                 <td>12:00	 </td> 
                                                                 <td>2019-05-05	 </td>  
                                                                 <td> 2019-04-06</td>  
                                                                 </tr> 
                                                                 <tr>
                                                                <td>2	 </td>   
                                                                <td>صباحي 5:9	 </td>  
                                                                 <td> 09:00	</td>  
                                                                 <td>17:00	 </td> 
                                                                 <td>2019-01-01		 </td>  
                                                                 <td> 2019-12-31
</td>  
                                                                 </tr>
                                                                 
                                                        </table>

                                                       
                                                    </div>
                                                </div>
                                            
                                                                            </div>

                                </div>
                                <div class="tab-pane" id="files_data" role="tabpanel">
                                    <div class="col-md-12 text-center">

                                                                                 
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h5 class="panel-title">بيانات المستندات</h5>
                                                    </div>
                                                    <div class="panel-body">
                                                        <table class="table2" id="finance_Data_1" style="">
                                                            <thead>
                                                            <tr>
                                                                <th >م	</th>
                                                                 <th >  إسم المرفق				</th>
                                                                <th >  المستند				</th>
                                                                <th >  هل يوجد تاريخ			</th>
                                                                <th >  من تاريخ			</th>
                                                                <th >  الى تاريخ		</th>
                                                                
                                                                 
                                                            </tr>
                                                            </thead>
                                                            <tbody >
                                                                <tr>
                                                                <td>1	 </td>   
                                                                <td>صورة الإقامة	 	 </td>  
                                                                 <td> لا	</td>  
                                                                 <td> 	 </td> 
                                                                 <td>2019-05-05	 </td>  
                                                                 <td> 2019-04-06</td>  
                                                                 </tr> 
                                                                 <tr>
                                                                <td>2	 </td>   
                                                                <td>   	 </td>  
                                                                 <td> نعم	</td>  
                                                                 <td> <a data-toggle="modal" onclick="$('#img_pop_view').attr('src', 'https://abnaa-sa.org/uploads/human_resources/emp_mostnad_files/ce8cc95503e45b77c46d770d6f79e30f.png');" data-target="#myModal-view">
                                                                            <i class="fa fa-eye" title=" قراءة"></i>
                                                                        </a>	 </td> 
                                                                 <td>2019-01-01		 </td>  
                                                                 <td> 2019-12-31</td>  
                                                                 </tr>
                                                                 <tr>
                                                                <td>3	 </td>   
                                                                <td>   	 </td>  
                                                                 <td> نعم	</td>  
                                                                 <td> 	 </td> 
                                                                 <td>2019-01-01		 </td>  
                                                                 <td> 2019-12-31</td>  
                                                                 </tr>
                                                                 
                                                        </table>

                                                       
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



 
 
 <div class="content" id="Main-content" style="height: 474.111px;">
 <div class="row">
  <div id="preloading"></div><!--loading will be showen here-->


  <div class="modal fade" id="myModal-view" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                            <h4 class="modal-title" id="myModalLabel"> عرض
                                                                المستند </h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <img id="img_pop_view" src="https://abnaa-sa.org/asisst/fav/apple-icon-120x120.png" onerror="this.src='https://abnaa-sa.org/asisst/fav/apple-icon-120x120.png'" width="100%">

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
 


<div class="modal fade " id="modal-data" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-success modal-lg " role="document">
        <div class="modal-content ">
            <div class="modal-header ">

                <h1 class="modal-title">تعديل البيانات الشخصية </h1>
            </div>
            <div class="modal-body row">
                <form action="https://abnaa-sa.org/maham_mowazf/person_profile/Personal_profile/update_users/78" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="has-validation-callback">
                <!--------------------------------------------------------------->

                <div class="col-sm-12 col-xs-12">

                    <div class="col-sm-10 col-xs-12">
                        <div class="form-group col-sm-4 col-xs-12">
                            <label class="label ">إسم المستخدم </label>
                            <input type="text" class="form-control" id="user_name" name="user_name" data-validation="required" value="mosad">
                        </div>
                        <!--<div class="form-group col-sm-4 col-xs-12">
                            <label class="label ">رقم الجوال </label>
                            <input type="number" class="form-control    " name="user_phone"
                                   placeholder=" رقم الجوال" value=""
                                   data-validation="required">
                        </div>

                        <div class="form-group col-sm-4 col-xs-12">
                            <label class="label ">رقم الهوية </label>
                            <input type="number" name="id_number" id="id_number" data-validation="required"
                                   value=""
                                   class="form-control  " placeholder=" رقم الهوية"/>
                        </div>-->

                        <div class="form-group col-sm-4 col-xs-12">
                            <label class="label "> كلمة المرور <strong></strong> </label>
                            <input type="password" id="user_pass" class="form-control" name="user_pass" onkeyup="return valid('validate1','user_pass','button_update');" autocomplete="off" placeholder=" كلمه المرور ">
                            <span id="validate1" class="span-validation"></span>
                        </div>
                        <div class="form-group col-sm-4 col-xs-12">
                            <label class="label ">تاكيد كلمة المرور <strong></strong> </label>
                            <input type="password" id="user_pass_validate" class="form-control" placeholder="تأكيد كلمة المرور" onkeyup="return valid2('validate','user_pass_validate','button_update','user_pass');">
                            <span id="validate" class="span-validation"> </span>
                        </div>
                    </div>

                    <div class="col-sm-2 col-xs-12">
                        
                        <input type="file" name="user_photo" class="form-control" style="margin-top: 25px;">
                       
                    </div>
                </div>


                <!--------------------------------------------------------------->
            </form></div>

            <div class="modal-footer ">
                <input type="hidden" name="role_id_fk" value="1">
                <button type="submit" name="ADD" value="ADD" id="button_update" class="btn btn-labeled btn-success " style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span> حفظ
                </button>
                                <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>
                <!--                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>-->

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="ezn_Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 90%;height: 90%;overflow: auto">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
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

<script type="text/javascript" src="https://abnaa-sa.org/asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="https://abnaa-sa.org/asisst/admin_asset/js/analogue-time-picker.js"></script>
<script src="https://abnaa-sa.org/asisst/admin_asset/js/mdtimepicker.js"></script>

<!--  14-7-om -->
    
        <script>
            $(document).ready(function () {
                console.log("ready!");
                $('#no_data_2').show();

            });
        </script>
                    <script>
            $(document).ready(function () {
                console.log("ready!");
                $('#finance_Data_1').show();

            });
        </script>
    
<script type="text/javascript">
    var loadFile = function (event, input_id) {
        var output = document.getElementById(input_id);
        output.src = URL.createObjectURL(event.target.files[0]);
        console.log('file :' + output.src);
        console.log('file :' + event.target.files[0].name);
        upload_img(event.target.files[0]);

    };
</script>

<script>

    function upload_img(obj) {


        var files = obj;
        var error = '';
        var form_data = new FormData();
        // for(var count = 0; count<files.length; count++)
        // {
        var name = files.name;


        var extension = name.split('.').pop().toLowerCase();
        if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
            error += "Invalid   Image File"
        } else {
            form_data.append("files", files);
            form_data.append("id", '78');
        }
        // }
        if (error == '') {

            $.ajax({
                url: "https://abnaa-sa.org/person_profile/Personal_profile/upload_img", //base_url() return http://localhost/tutorial/codeigniter/
                method: "POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function () {
                    $('#images').html('<img src="https://abnaa-sa.org/asisst/web_asisst/img/material-loader.gif">');
                },
                success: function (data) {
                    // alert(data);

                    //$('#images').show();
                    $('#images').html(data);


                }
            })

        }


    }


</script>

<script>
    function valid(div1, div2, button) {
        if ($("#" + div2).val().length < 4) {
            document.getElementById(div1).style.color = '#F00';
            document.getElementById(div1).innerHTML = 'كلمة المرور اكثر من اربع حروف';
            document.getElementById(button).setAttribute("disabled", "disabled");
        }
        if ($("#" + div2).val().length > 4 && $("#user_pass").val().length < 10) {
            document.getElementById(div1).style.color = '#F00';
            document.getElementById(div1).innerHTML = 'كلمة المرور ضعيفة';
            document.getElementById(button).removeAttribute("disabled", "disabled");
        }
        if ($("#" + div2).val().length > 10) {
            document.getElementById(div1).style.color = '#00FF00';
            document.getElementById(div1).innerHTML = 'كلمة المرور قوية';
            document.getElementById(button).removeAttribute("disabled", "disabled");
        }
    }

    function valid2(div2, div3, button, input) {
        if ($("#" + input).val() == $("#" + div3).val()) {
            document.getElementById(div2).style.color = '#00FF00';
            document.getElementById(div2).innerHTML = 'كلمة المرور متطابقة';
            document.getElementById(button).removeAttribute("disabled", "disabled");
        } else {
            document.getElementById(div2).style.color = '#F00';
            document.getElementById(div2).innerHTML = 'كلمة المرور غير متطابقة';
            document.getElementById(button).setAttribute("disabled", "disabled");
        }
    }

</script>


<script>
    // $('').click(function (e) {
    //     e.preventDefault();
    function show_tab(id) {
        $('a[href="#' + id + '"]').tab('show');
    }

    // });
</script>
 

 <style>
    [data-notify="container"][class*="alert-pastel-"] {
        background-color: rgb(255, 255, 238);
        border-width: 0px;
        border-right: 15px solid rgb(255, 240, 106);
        border-radius: 0px;
        box-shadow: 0px 0px 5px rgba(51, 51, 51, 0.3);
        font-family: 'Old Standard TT', serif;
        letter-spacing: 1px;
    }
    [data-notify="container"].alert-pastel-info {
        border-right-color: rgb(255, 179, 40);
    }
    [data-notify="container"].alert-pastel-danger {
        border-right-color: rgb(255, 103, 76);
    }
    [data-notify="container"][class*="alert-pastel-"] > [data-notify="title"] {
        color: rgb(80, 80, 57);
        display: block;
        font-weight: 700;
        margin-bottom: 5px;
        font-size:20px ;
    }
    [data-notify="container"][class*="alert-pastel-"] > [data-notify="message"] {
        font-weight: 400;
    }
</style>

  
</div><!--row-->
</div>