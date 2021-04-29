<!DOCTYPE html>
<html>

<head>
<meta name="google-site-verification" content="QbCxI_kwwybT2rIwhSKDbmmAc7mIsVYUth9IaZMZ4pc" />

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title><?php if(isset($title) && $title !=null && !empty($title)){echo $title ; }else { 
        echo " نظام الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء";} ?></title>
    <meta name="description" content="نظام الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء" />
    <meta name="keywords" content="نظام الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء" />
    <meta name="author" content="نظام الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء" />
 
    
    <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url()."asisst/fav/"?>favicon-16x16.png">
     <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic.min.css" />

   
  
	 <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>asisst/admin_asset/plugins1/fontawesome-free/css/all.min.css">
   
    <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
     <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/style.css?<?php echo date('l jS \of F Y h:i:s A'); ?>">
 
     
	
	<?php date_default_timezone_set('Asia/Riyadh'); ?>
</head>



<body>
 
     
<div class="container" id="container">
	 
	<div class="form-container sign-in-container">
         <?php echo form_open('login/check_login',array('role'=>'form'))?>


		<form action="#">
             <?php if(isset($response)):?>
                                           
                                        <div class="alert " role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <strong>خطأ!</strong> <?php echo $response;?>
                                        </div>


                                    
                                            <?php endif?>
			<img src="<?php echo base_url()?>asisst/admin_asset/img/logo-abnaa.png" width="100%">
			 
			<input type="text" placeholder="البريد الالكترونى" value="" name="user_name"/>
			<input   type="password"  id="password"   value="" name="user_pass"     placeholder="كلمة السر" />
			  <i  class="fa fa-fw fa-eye eye_icon " onclick="myFunction()"></i> 
			<button type="submit" name="login" class="btn btn-block btn-primary"> تسجيل الدخول</button>
              <?php  echo form_close()?>
             
			 
	  
		</form>
        
    
       
	</div>
	<div class="overlay-container">
		<div class="overlay">
		 <div class="overlay-panel overlay-right">
				<h1>برنامج الأثير لإدارة الجمعيات</h1>
				<img src="<?php echo base_url()?>asisst/admin_asset/img/New.png" width="100%" >
				<h5>Copy Rights For AlatheerTech 2021</h5>
			</div>
		</div>
	</div>
</div>
    
  <div class="btns-sidebar1" dir="ltr">
        <ul>
            <li class="email">
                <a href="https://webmail1.hostinger.ae/?_task=mail&_mbox=INBOX" target="_blank">
                    <i class="fas fa-envelope"></i>
                    <span>الدخول إلى البريد الإلكتروني</span>
                </a>
            </li> 
             
        </ul>
    </div>
    <div class="btns-sidebar" dir="ltr">
        <ul>
            <li class="email">
                <a href="https://webmail1.hostinger.ae/?_task=mail&_mbox=INBOX" target="_blank">
                    <i class="fas fa-envelope"></i>
                    <span>الدخول إلى البريد الإلكتروني</span>
                </a>
            </li> 
             
        </ul>
    </div>
    
 
    
    
    
    
            <script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
            <script src="<?php echo base_url()?>asisst/admin_asset/js/bootstrap-arabic.min.js"></script>
            <script src="<?php echo base_url()?>asisst/admin_asset/js/custom.js"></script>
            <script src="<?php echo base_url()?>asisst/admin_asset/js/owl.carousel.min.js"></script>
            
            <script language="javascript">
                    function autoResizeDiv()
                    {
                        document.getElementById('login-page').style.height = window.innerHeight +'px';
                    }
                    function autoResizeDivMobile()
                    {
                        document.getElementById('login-page').style.height ='auto';
                    }
                   
                    
                    
                    
                    
                     var mq = window.matchMedia( "(min-width: 767px)" );
                    
                    if(mq.matches) {
                        // the width of browser is more then 767px
                        
                      window.onresize = autoResizeDiv;
                      autoResizeDiv();
                    } else {
                        // the width of browser is less then 767px
                        
                      window.onresize = autoResizeDivMobile;
                      autoResizeDivMobile();
                      }
                </script>
                
                <script>
                window.setTimeout(function() {
                    $(".alert").fadeTo(500, 0).slideUp(500, function(){
                        $(this).remove(); 
                    });
                }, 400);
                
                </script>
                <script>
                
                $(document).ready(function () {

                    "use strict";
                        
                    $(".input-stylish input").focus(function () {
                            
                     $(this).parent().find(".stylish").animate({width: "100%"}, 500);
                      $(this).parent().find("i").addClass("moveToRight");
                     
                             
                    });
                    $(".input-stylish input").blur(function () {
                            
                    $(this).parent().find(".stylish").css({width: "0%"});
                    $(this).parent().find("i").removeClass("moveToRight");
                            
                        });
                        
                        
                        
                      
                    
                    });
                    
                
                </script>
                
    
    
    <script>function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}</script>
    
    
    
        </body>

        </html>



   <style> 
        .btns-sidebar1 ul {
    list-style: none;
    margin: 0;
    padding: 0;
}
  .btns-sidebar1 ul li a span {
    display: inline-block;
    float: right;
    padding: 3px 0 0 0;
    font-size: 16px;
}
        .btns-sidebar1 ul li {
    position: relative;
    right: 0px;
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
    margin-top: -6px;
}
        .btns-sidebar1 ul li:hover {
    right: 180px;
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
}
  .btns-sidebar1 ul li a i {
    float: left;
    font-size: 25px;
    padding: 0px 0px 0 0px;
}  
   .btns-sidebar1 {
    position: fixed;
    right: -180px;
    top: 35%;
    z-index: 999;
} 
  .btns-sidebar {
    position: fixed;
    left: -180px;
    top: 35%;
    z-index: 999;
}        
        
    .btns-sidebar1 ul li.email a {
    background-color: #a1cc44;
}

.btns-sidebar1 ul li a {
    background-color: #000;
    color: #fff;
    display: inline-block;
    padding: 10px 10px 10px 10px;
    text-decoration: none;
    width: 225px;
    border-bottom-left-radius: 20px;
    border-top-left-radius: 20px;
}    
        
    </style>   
           
    
<style>
  
* {
	box-sizing: border-box;
}

body {
	background: #f6f5f7;
	display: flex;
	justify-content: center;
	align-items: center;
	flex-direction: column;
	 
	height: 100vh;
	margin: -20px 0 50px;
}

h1 {
	font-weight: bold;
	margin: 0;
}

h2 {
	text-align: center;
}

p {
	font-size: 14px;
	font-weight: 100;
	line-height: 20px;
	letter-spacing: 0.5px;
	margin: 20px 0 30px;
}

span {
	font-size: 12px;
}

a {
    color: #3a3938;
    font-size: 16px;
    text-decoration: none;
    margin: 10px 0;
}

.eye_icon {
    position: absolute;
    top: 69%;
    left: 50px;
    transform: translate(-45%, 50%);
    color: green;
}
 
.btn-primary {
    color: #fff!important;
    background-color: #a1cc44!important;
    border-color: #a1cc44!important;
    box-shadow: none;
}
    .alert {
    padding: 15px;
    margin-bottom: 20px;
    border: 1px solid transparent;
    border-radius: 4px;
    color: red;
}
    
.btn {
    display: inline-block;
    font-weight: 400;
    color: #212529;
    text-align: center;
    vertical-align: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-color: transparent;
    border: 1px solid transparent;
    padding: .75rem .75rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: .25rem;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    width: 100% !important;
    border-radius: 14px !important;margin: 8px 0;font-size: 16px !important;
}
           
     .btn:hover{background: #ffb61e!important;}
            
           
           
           .mr-2, .mx-2 {
    margin-right: .5rem!important;
}
 
.button {
    border-radius: 20px !important;
    border: 1px solid #96c63d !important;
    background-color: #96c63d !important;
    color: #FFFFFF !important;
    font-size: 12px;
    font-weight: bold;
    padding: 12px 45px;
    letter-spacing: 1px;
    text-transform: uppercase;
    transition: transform 80ms ease-in;
    margin-top: 1em;
}
    
   .button:hover{background: #ffb61e!important;}
    
 .icon_email {
    background: #9fcb43;
    width: 30px;
    height: 30px;
    line-height: 30px;
    text-align: center;
    border-radius: 50%;
    font-size: 16px;
    color: aliceblue;
}

form {
	background-color: #FFFFFF;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	padding: 0 30px;
	height: 100%;
	text-align: center;
}

input {
    background-color: #eee;
    border: none;
    padding: 12px 15px;
    margin: 8px 0;
    width: 100%;
    text-align: right;
}

.container {
	background-color: #fff;
	border-radius: 10px;
  	box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
			0 10px 10px rgba(0,0,0,0.22);
	position: relative;
	overflow: hidden;
	width: 768px;
	max-width: 100%;
	min-height: 480px;direction: ltr;
}

.form-container {
	position: absolute;
	top: 0;
	height: 100%;
	transition: all 0.6s ease-in-out;
}

.sign-in-container {
	left: 0;
	width: 50%;
	z-index: 2;
}

.container.right-panel-active .sign-in-container {
	transform: translateX(100%);
}

.sign-up-container {
	left: 0;
	width: 50%;
	opacity: 0;
	z-index: 1;
}

.container.right-panel-active .sign-up-container {
	transform: translateX(100%);
	opacity: 1;
	z-index: 5;
	animation: show 0.6s;
}

@keyframes show {
	0%, 49.99% {
		opacity: 0;
		z-index: 1;
	}
	
	50%, 100% {
		opacity: 1;
		z-index: 5;
	}
}

.overlay-container {
	position: absolute;
	top: 0;
	left: 50%;
	width: 50%;
	height: 100%;
	overflow: hidden;
	transition: transform 0.6s ease-in-out;
	z-index: 100;
}

.container.right-panel-active .overlay-container{
	transform: translateX(-100%);
}

.overlay {
    background: #FF416C;
    background: -webkit-linear-gradient(to right, #FF4B2B, #FF416C);
    background: linear-gradient(to right, #727dee, #a8d2ff);
    background-repeat: no-repeat;
    background-size: cover;
    background-position: 0 0;
    color: #FFFFFF;
    position: relative;
    left: -100%;
    height: 100%;
    width: 200%;
    transform: translateX(0);
    transition: transform 0.6s ease-in-out;
}

.container.right-panel-active .overlay {
  	transform: translateX(50%);
}

.overlay-panel {
	position: absolute;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	padding: 0 30px;
	text-align: center;
	top: 0;
	height: 100%;
	width: 50%;
	transform: translateX(0);
	transition: transform 0.6s ease-in-out;
}

.overlay-left {
	transform: translateX(-20%);
}

.container.right-panel-active .overlay-left {
	transform: translateX(0);
}

.overlay-right {
	right: 0;
	transform: translateX(0);
}

.container.right-panel-active .overlay-right {
	transform: translateX(20%);
}

.social-container {
	margin: 20px 0;
}

.social-container a {
	border: 1px solid #DDDDDD;
	border-radius: 50%;
	display: inline-flex;
	justify-content: center;
	align-items: center;
	margin: 0 5px;
	height: 40px;
	width: 40px;
}

footer {
    background-color: #222;
    color: #fff;
    font-size: 14px;
    bottom: 0;
    position: fixed;
    left: 0;
    right: 0;
    text-align: center;
    z-index: 999;
}

footer p {
    margin: 10px 0;
}

footer i {
    color: red;
}

footer a {
    color: #3c97bf;
    text-decoration: none;
}


@media only screen and (max-width: 1139px){
.eye_icon {
    position: absolute;
    top: 59%;
    left: 23px;
    transform: translate(-45%, 50%);
    color: green;
}form {
    background-color: #FFFFFF;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    padding: 0 8px;
    height: 100%;
    text-align: center;
} 
    .btns-sidebar1 {
    position: fixed;
    right: -180px;
    top: 12%;
    z-index: 999;
}
    
    .btns-sidebar {
    position: fixed;
    left: -180px;
    top: 12%;
    z-index: 999;
}
   .overlay-panel {
    position: absolute;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    padding: 0 8px;
    text-align: center;
    top: 0;
    height: 100%;
    width: 50%;
    transform: translateX(0);
    transition: transform 0.6s ease-in-out;
} 
    }

</style>



