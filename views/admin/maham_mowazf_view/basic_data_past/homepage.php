 
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
    padding: 0 !important;
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
    
    .user-profile .sidebar-shortcuts-large>.btn {
    text-align: center;
    width: auto;
    line-height: 30px;
    padding: 3px 10px;
 }
 .user-profile .btn.btn-link {
    background: 0 0!important;
    color: black;
    line-height: 20px!important;
    padding: 4px 12px!important;
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

                   <!-- <div class="col-xs-12 col-sm-3 center">
                        <div>
                        									<span class="profile-picture">

    <img id="profile-img-tag" class=" img-responsive" alt="" src="https://abnaa-sa.org/uploads/human_resources/emp_photo/thumbs/f99b0dd6f845fc13acc362f876f97212.jpg">




									</span>
 

                            <div class="space-4"></div>
                            <a href="#" class="btn btn-sm btn-block btn-success">
                                <i class="ace-icon fa fa-user-circle bigger-120"></i>
                                <span class="bigger-110">
     مسعد السيد عبدالعزيز أحمد    </span>
                            </a>
                        </div>

                        <div class="space-6"></div>

                        <div class="profile-contact-info">
                            <div class="profile-contact-links align-right">


 
                                        <a class="btn btn-link">
                                            <i class="ace-icon fa fa-group	 bigger-120 green"></i>
                                            الإدارة : وحدة التقنية والدعم الفني                                        </a>
                                        <a class="btn btn-link">
                                            <i class="ace-icon fa fa-user-o bigger-120 green"></i>
                                            القسم :                                         </a>

                                        <a class="btn btn-link">
                                            <i class="ace-iconfa fa-address-book-o bigger-120 green"></i>
                                            المدير المباشر : سلطان محمد سليمان الجاسر                                        </a>
                                        <a class="btn btn-link">
                                            <i class="ace-icon fa fa-map-o	 bigger-120 green"></i>
                                            مسؤول التقنية والدعم الفني                                        </a>
                                    

                                                                    <a class="btn btn-link">
                                                                        <i class="ace-icon fa fa-user-o bigger-120 green"></i>
                                    الدور على النظام : موظف علي النظام                                </a>
                            </div>


                        </div>


                        <div class="space-6"></div>

                        <div class="profile-contact-info">
                            <div class="profile-contact-links align-right">
                                <a class="btn btn-link" data-toggle="modal" data-target="#modal-data">
                                    <i class="ace-icon fa fa-plus-circle bigger-120 green"></i>
                                    تعديل بيانات حسابى
                                </a>


                            </div>

                            <div class="space-6"></div>

                            
                                    <div class="profile-social-links align-center">

                                                                                
                                    </div>
                                                        </div>


                    </div>-->

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
                                
                                  <a class="btn btn-link" data-toggle="modal" data-target="#modal-data" style="color:#229225">
                                    <i class="ace-icon fa fa-plus-circle bigger-120  "></i>
                                    تعديل بيانات حسابى
                                </a>
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
   
                    
                    
                    
                    
                    
                    
                    <div class="col-xs-12 col-sm-9">

                        <div class="tab-content tab-content-vertical">
                            
                                    <div class="tab-pane active" id="job_data" role="tabpanel">
                                    
                                        <div class="col-md-8 ">

                                           <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h5 class="panel-title center">بيانات الوظيفة</h5>
                                                    </div>
                                                    <div class="panel-body">
                                <table class="table1  " id="finance_Data_1" style="">
                                                             
                                                            <tbody>
                                                            
                                                                        <tr> <td>حاله الموظف	</td>
                                                                        <td> نشط</td>
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
                                    
                                        <div class="col-md-8 ">

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
                        
                        <input type="file" name="user_photo" class="form-control">
                        <small class="small" style="bottom:-13px;">
                                                            برجاء إرفاق صورة
                                                    </small>
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