 
<style>
 
.media{ padding: 30px 0}
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
    color: black;
    line-height: 28px;
    letter-spacing: 0px;
    border-radius: 0 0 5px 5px;
}
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
   .btn-default {
    color: #0c0c0c;
    background-color: #fff;
    border-color: #ccc;margin: 5px 10px;
} 
    
    .btn-label {
    position: relative;
    right: -14px;
    display: inline-block;
    padding: 6px 12px;
    background: rgb(239, 168, 34);
    border-radius: 2px 0 0 2px;color: #f3f3f3;
}
}
    
   
                .icons
                {
     
     padding:10px;
                }
               
                .test
                {
                        float: left;
    width: 35px;
    text-align: center;
    /* color: #002542; */
    height: 35px;
    font-size: 22px;
    font-weight: 600;
    border-radius: 4px;
    color: #1c1d1d;
    border-radius: 50%;
    background: #ffffff;
    float: left;
    padding-right: 3px;
    margin-top: 4px;
   /* padding-top: 5px;*/
               
                }
        /* Head banner team */
        .banner {
            text-align: center;
            width: ;
        }
         
        h1 {
            color: green;
        }
     
  .sidehoverbar a {
    background-color: #f1a922;
    position: absolute;
    font-size: 24px;
    text-decoration: none;
    Color: #fdfdfd;
    /* padding: 9px; */
    border-radius: 0px 25px 25px 0px;
    left: -191px;
    transition: 0.5s;
    /* opacity: 0.5; */
    border-left: 7px solid #FFC107;line-height: 40px;
}
     
   .sidehoverbar a:hover {
    left: 0px;
    /* opacity: 1; */
    background-color: #4f564f;
}
     
  .sidehoverbar i {
    float: right;
    margin-top: 7px;
    margin-right: 7px;
}
     
        /* definig position of each nav bar */
       .article {
    top: 13px;
    width: 229px;
    height: 43px;
}
         
        .Interview {
            top: 70px;
            width: 229px;
    height: 43px;
        }
         
        .Scripter {
            top: 128px;
            width: 229px;
    height: 43px;
        }
         
       
     
        /* content margin */
        .hoverable-topic {
            margin-left: 55px;
        }
               
               
               
                td
      {
          font-size: large
     
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
 
     
</style>

<div class="topnav">
  <a  href="<?=base_url()?>/Dashboard/pprofile"><h5 class="glyphicon glyphicon-home"></h5> الرئيسية</a>
  <a href="<?=base_url()?>/Dashboard/phome" ><h5 class="glyphicon glyphicon-user"></h5> الملف الشخصى</a>
  <a href="<?=base_url()?>/Dashboard/talabat"><h5 class="glyphicon glyphicon-list-alt"></h5> الطلبات</a>
    <a href="<?=base_url()?>/Dashboard/estalmat" class="active"><h5 class="glyphicon glyphicon-comment"></h5> الإستعلامات</a>
    <a href="#"><h5 class="glyphicon glyphicon-time"></h5> ادارة الوقت</a>
    <a href="#" ><h5 class="glyphicon glyphicon-tasks"></h5> المهام</a>
    <a href="#" ><h5 class="glyphicon glyphicon-send"></h5> التراسل </a>
    <a href="#" ><h5 class="glyphicon"><i class="fa fa-money" aria-hidden="true"></i></h5> الرواتب </a>
    <a href="#" ><h5 class="glyphicon"><i class="fa fa-area-chart" aria-hidden="true"></i></h5> التقييمات</a>
</div>

	<div class="col-xs-12 all_cont">

        <div class="col-lg-12 col-md-5 col-sm-8 col-xs-9 bhoechie-tab-container">
            
            <div class="col-lg-12 col-md-12   bhoechie-tab">
                      <!---------------------------------------الطلبات----------------------------------------->
                    
     	
    <div id="media" class="media">
    <div class="container-fluid">
        <div class="row">
     
<div class="col-md-12">
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        
        
        <!--------------------------------------------- الأجازات   -------------------------------------------->
       <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingfive">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
  <i class="fa fa-list" aria-hidden="true"></i>  الأجازات 
                                    </a>
                                    </h4>
                        </div>
                        

    
    <div id="collapsefive" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingfive">
             <!---------------------------------------الطلبات----------------------------------------->
                    <center>
     	<div class="col-xs-12">                  
      <div class="panel panel-default">
       <div class="panel-body"> 
          
          <div class="tab-pane" id="pag4" role="tabpanel">
 
          
          <div class="col-md-3   col-xs-12 padding-10">
                    <div class="panel panel-default" >
                         <div class="modal-header">
         
                            <h5 class="modal-title" style="text-align: center;">
                               الأجازات
                            </h5>
         
      </div>
                        <div class="modal-body" style=" height:200px;overflow: hidden;">
                           <!-- Side navigation Bar -->
    <div class="sidehoverbar">
        
            <a href="#" data-toggle="modal" onclick="get_agaza_tab('mine_1','طلباتي')"
                                       data-target="#ezn_Modal" class="article"> 
            <span  class="test">12 </span>
            <span style="font-size: 18px;"> طلباتى</span>  
            <i class="fa fa-edit icons"></i>  
        </a><h5>طلباتى</h5>
         
             <a href="#" data-toggle="modal" onclick="get_agaza_tab('follow_1','متابعة طلباتي')"
                                       data-target="#ezn_Modal" class="Interview">
             <span  class="test">12 </span>
            <span  style="font-size: 18px;"> متابعة طلباتي</span>  
            <i class="fa fa-file-o icons"></i>
        </a><h5 style="margin-top: 37px;">متابعة طلباتي</h5>
         
       
            <a href="#" data-toggle="modal" onclick="get_agaza_tab('comming_1','الوارد')"
                                       data-target="#ezn_Modal" class="Scripter">
             <span  class="test">12 </span>
             <span  style="font-size: 18px;"> الوارد</span>  
            <i class="fa fa-commenting icons"></i>
        </a><h5 style="margin-top: 39px;">الوارد</h5>
         
         
    </div>
                        </div>
                        
                    </div>
                </div>    
                       
          <div class="col-md-3   col-xs-12 padding-10">
                    <div class="panel panel-default" >
                         <div class="modal-header">
         
                            <h5 class="modal-title" style="text-align: center;">
                               الأجازات
                            </h5>
         
      </div>
                        <div class="modal-body" style=" height:200px;overflow: hidden;">
                           <!-- Side navigation Bar -->
    <div class="sidehoverbar">
        
            <a href="#" data-toggle="modal" onclick="get_agaza_tab('mine_1','طلباتي')"
                                       data-target="#ezn_Modal" class="article"> 
            <span  class="test">12 </span>
            <span style="font-size: 18px;"> طلباتى</span>  
            <i class="fa fa-edit icons"></i>  
        </a><h5>طلباتى</h5>
         
             <a href="#" data-toggle="modal" onclick="get_agaza_tab('follow_1','متابعة طلباتي')"
                                       data-target="#ezn_Modal" class="Interview">
             <span  class="test">12 </span>
            <span  style="font-size: 18px;"> متابعة طلباتي</span>  
            <i class="fa fa-file-o icons"></i>
        </a><h5 style="margin-top: 37px;">متابعة طلباتي</h5>
         
       
            <a href="#" data-toggle="modal" onclick="get_agaza_tab('comming_1','الوارد')"
                                       data-target="#ezn_Modal" class="Scripter">
             <span  class="test">12 </span>
             <span  style="font-size: 18px;"> الوارد</span>  
            <i class="fa fa-commenting icons"></i>
        </a><h5 style="margin-top: 39px;">الوارد</h5>
         
         
    </div>
                        </div>
                        
                    </div>
                </div>    
                        
          <div class="col-md-3   col-xs-12 padding-10">
                    <div class="panel panel-default" >
                         <div class="modal-header">
         
                            <h5 class="modal-title" style="text-align: center;">
                               الأجازات
                            </h5>
         
      </div>
                        <div class="modal-body" style=" height:200px;overflow: hidden;">
                           <!-- Side navigation Bar -->
    <div class="sidehoverbar">
        
            <a href="#" data-toggle="modal" onclick="get_agaza_tab('mine_1','طلباتي')"
                                       data-target="#ezn_Modal" class="article"> 
            <span  class="test">12 </span>
            <span style="font-size: 18px;"> طلباتى</span>  
            <i class="fa fa-edit icons"></i>  
        </a><h5>طلباتى</h5>
         
             <a href="#" data-toggle="modal" onclick="get_agaza_tab('follow_1','متابعة طلباتي')"
                                       data-target="#ezn_Modal" class="Interview">
             <span  class="test">12 </span>
            <span  style="font-size: 18px;"> متابعة طلباتي</span>  
            <i class="fa fa-file-o icons"></i>
        </a><h5 style="margin-top: 37px;">متابعة طلباتي</h5>
         
       
            <a href="#" data-toggle="modal" onclick="get_agaza_tab('comming_1','الوارد')"
                                       data-target="#ezn_Modal" class="Scripter">
             <span  class="test">12 </span>
             <span  style="font-size: 18px;"> الوارد</span>  
            <i class="fa fa-commenting icons"></i>
        </a><h5 style="margin-top: 39px;">الوارد</h5>
         
         
    </div>
                        </div>
                        
                    </div>
                </div>    
                      
          <div class="col-md-3   col-xs-12 padding-10">
                    <div class="panel panel-default" >
                         <div class="modal-header">
         
                            <h5 class="modal-title" style="text-align: center;">
                               الأجازات
                            </h5>
         
      </div>
                        <div class="modal-body" style=" height:200px;overflow: hidden;">
                           <!-- Side navigation Bar -->
    <div class="sidehoverbar">
        
            <a href="#" data-toggle="modal" onclick="get_agaza_tab('mine_1','طلباتي')"
                                       data-target="#ezn_Modal" class="article"> 
            <span  class="test">12 </span>
            <span style="font-size: 18px;"> طلباتى</span>  
            <i class="fa fa-edit icons"></i>  
        </a><h5>طلباتى</h5>
         
             <a href="#" data-toggle="modal" onclick="get_agaza_tab('follow_1','متابعة طلباتي')"
                                       data-target="#ezn_Modal" class="Interview">
             <span  class="test">12 </span>
            <span  style="font-size: 18px;"> متابعة طلباتي</span>  
            <i class="fa fa-file-o icons"></i>
        </a><h5 style="margin-top: 37px;">متابعة طلباتي</h5>
         
       
            <a href="#" data-toggle="modal" onclick="get_agaza_tab('comming_1','الوارد')"
                                       data-target="#ezn_Modal" class="Scripter">
             <span  class="test">12 </span>
             <span  style="font-size: 18px;"> الوارد</span>  
            <i class="fa fa-commenting icons"></i>
        </a><h5 style="margin-top: 39px;">الوارد</h5>
         
         
    </div>
                        </div>
                        
                    </div>
                </div>    
                 
           

            </div>
</div>
    </div>             
       </div>               
         
                     </center>

    </div>
        </div>

        <!---------------------------------------------    الأذونات-------------------------------------------->
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingfour">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"  href="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                        <i class="fa fa-list" aria-hidden="true"></i>    الأذونات
                    </a>
                </h4>
            </div>
             
<div id="collapsefour" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingfour">
           <center>
     	<div class="col-xs-12">                  
      <div class="panel panel-default">
       <div class="panel-body"> 
          
          <div class="tab-pane" id="pag4" role="tabpanel">
 
          
            <div class="col-md-3   col-xs-12 padding-10">
                    <div class="panel panel-default" >
                         <div class="modal-header">
         
                            <h5 class="modal-title" style="text-align: center;">
                               الأذونات
                            </h5>
         
      </div>
                        <div class="modal-body" style=" height:200px;overflow: hidden;">
                           <!-- Side navigation Bar -->
    <div class="sidehoverbar">
        
            <a href="#" data-toggle="modal" onclick="get_ezen_tab(1,'طلباتي')"
                                       data-target="#ezn_Modal" class="article"> 
            <span  class="test">12 </span>
            <span  style="font-size: 18px;"> طلباتى</span>  
            <i class="fa fa-edit icons"></i>
        </a><h5>طلباتى</h5>
         
             <a href="#" data-toggle="modal" onclick="get_ezen_tab(2,'متابعة طلباتي')"
                                       data-target="#ezn_Modal" class="Interview">
             <span  class="test">12 </span>
            <span  style="font-size: 18px;"> متابعة طلباتي</span>  
            <i class="fa fa-file-o icons"></i>
        </a><h5 style="margin-top: 37px;">متابعة طلباتي</h5>
         
       
            <a href="#" data-toggle="modal" onclick="get_ezen_tab(3,'الوارد')"
                                       data-target="#ezn_Modal" class="Scripter">
             <span  class="test">12 </span>
             <span  style="font-size: 18px;"> الوارد</span>  
            <i class="fa fa-commenting icons"></i>
        </a> <h5 style="margin-top: 39px;">الوارد</h5>
         
         
    </div>
                        </div>
                        
                    </div>
                </div>    
            
             <div class="col-md-3   col-xs-12 padding-10">
                    <div class="panel panel-default" >
                         <div class="modal-header">
         
                            <h5 class="modal-title" style="text-align: center;">
                               الأذونات
                            </h5>
         
      </div>
                        <div class="modal-body" style=" height:200px;overflow: hidden;">
                           <!-- Side navigation Bar -->
    <div class="sidehoverbar">
        
            <a href="#" data-toggle="modal" onclick="get_ezen_tab(1,'طلباتي')"
                                       data-target="#ezn_Modal" class="article"> 
            <span  class="test">12 </span>
            <span  style="font-size: 18px;"> طلباتى</span>  
            <i class="fa fa-edit icons"></i>
        </a><h5>طلباتى</h5>
         
             <a href="#" data-toggle="modal" onclick="get_ezen_tab(2,'متابعة طلباتي')"
                                       data-target="#ezn_Modal" class="Interview">
             <span  class="test">12 </span>
            <span  style="font-size: 18px;"> متابعة طلباتي</span>  
            <i class="fa fa-file-o icons"></i>
        </a><h5 style="margin-top: 37px;">متابعة طلباتي</h5>
         
       
            <a href="#" data-toggle="modal" onclick="get_ezen_tab(3,'الوارد')"
                                       data-target="#ezn_Modal" class="Scripter">
             <span  class="test">12 </span>
             <span  style="font-size: 18px;"> الوارد</span>  
            <i class="fa fa-commenting icons"></i>
        </a> <h5 style="margin-top: 39px;">الوارد</h5>
         
         
    </div>
                        </div>
                        
                    </div>
                </div>    
              
          <div class="col-md-3   col-xs-12 padding-10">
                    <div class="panel panel-default" >
                         <div class="modal-header">
         
                            <h5 class="modal-title" style="text-align: center;">
                               الأذونات
                            </h5>
         
      </div>
                        <div class="modal-body" style=" height:200px;overflow: hidden;">
                           <!-- Side navigation Bar -->
    <div class="sidehoverbar">
        
            <a href="#" data-toggle="modal" onclick="get_ezen_tab(1,'طلباتي')"
                                       data-target="#ezn_Modal" class="article"> 
            <span  class="test">12 </span>
            <span  style="font-size: 18px;"> طلباتى</span>  
            <i class="fa fa-edit icons"></i>
        </a><h5>طلباتى</h5>
         
             <a href="#" data-toggle="modal" onclick="get_ezen_tab(2,'متابعة طلباتي')"
                                       data-target="#ezn_Modal" class="Interview">
             <span  class="test">12 </span>
            <span  style="font-size: 18px;"> متابعة طلباتي</span>  
            <i class="fa fa-file-o icons"></i>
        </a><h5 style="margin-top: 37px;">متابعة طلباتي</h5>
         
       
            <a href="#" data-toggle="modal" onclick="get_ezen_tab(3,'الوارد')"
                                       data-target="#ezn_Modal" class="Scripter">
             <span  class="test">12 </span>
             <span  style="font-size: 18px;"> الوارد</span>  
            <i class="fa fa-commenting icons"></i>
        </a> <h5 style="margin-top: 39px;">الوارد</h5>
         
         
    </div>
                        </div>
                        
                    </div>
                </div>    
              
  <div class="col-md-3   col-xs-12 padding-10">
                    <div class="panel panel-default" >
                         <div class="modal-header">
         
                            <h5 class="modal-title" style="text-align: center;">
                               الأذونات
                            </h5>
         
      </div>
                        <div class="modal-body" style=" height:200px;overflow: hidden;">
                           <!-- Side navigation Bar -->
    <div class="sidehoverbar">
        
            <a href="#" data-toggle="modal" onclick="get_ezen_tab(1,'طلباتي')"
                                       data-target="#ezn_Modal" class="article"> 
            <span  class="test">12 </span>
            <span  style="font-size: 18px;"> طلباتى</span>  
            <i class="fa fa-edit icons"></i>
        </a><h5>طلباتى</h5>
         
             <a href="#" data-toggle="modal" onclick="get_ezen_tab(2,'متابعة طلباتي')"
                                       data-target="#ezn_Modal" class="Interview">
             <span  class="test">12 </span>
            <span  style="font-size: 18px;"> متابعة طلباتي</span>  
            <i class="fa fa-file-o icons"></i>
        </a><h5 style="margin-top: 37px;">متابعة طلباتي</h5>
         
       
            <a href="#" data-toggle="modal" onclick="get_ezen_tab(3,'الوارد')"
                                       data-target="#ezn_Modal" class="Scripter">
             <span  class="test">12 </span>
             <span  style="font-size: 18px;"> الوارد</span>  
            <i class="fa fa-commenting icons"></i>
        </a> <h5 style="margin-top: 39px;">الوارد</h5>
         
         
    </div>
                        </div>
                        
                    </div>
                </div>    
            

            </div>
</div>
    </div>             
       </div>               
         
                     </center>
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
    function get_agaza_tab(tab_id, text) {
        $('#modal_header').text(text);
        // $('#ezn_Modal_body').css();

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/all_agazat/all_transformations_f/All_transformations",
            data: {tab_id: tab_id},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $.validate({
                    validateHiddenInputs: true // for live search required
                });

                console.log('profile agaza agaza_tab ');
            }
        });
    }

    function get_ezen_tab(tab_id, text) {
        $('#modal_header').text(text);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/all_ozonat/Transformation/get_orders",
            data: {valu: tab_id},
            beforeSend: function () {
                $('#ezn_Modal_body').html('<div class="text-center"><img src="<?php echo base_url()?>asisst/admin_asset/img/loader.png" alt=""></div>');
            },
            success: function (d) {
                $('#ezn_Modal_body').html(d);
                $.validate({
                    validateHiddenInputs: true // for live search required
                });

                console.log('profile agaza agaza_tab ');
            }
        });
    }

</script>