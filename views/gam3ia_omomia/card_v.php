<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title> <?php if (isset($title) && $title != null && !empty($title)) {
            echo $title;
        } else {
            echo " نظام الجمعية الخيرية لرعاية الأيتام ببريدة - أبناء ";
        } ?> </title>
    <meta name="description" content="Examples for creative website header animations using Canvas and JavaScript"/>
    <meta name="keywords" content="header, canvas, animated, creative, inspiration, javascript"/>
    <meta name="author" content="Codrops"/>
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/css/bootstrap-arabic-theme.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/css/bootstrap-arabic.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/css/pe-icon-7-stroke.css">
    <link rel="stylesheet"
          href="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/css/style.css?<?php echo date('l jS \of F Y h:i:s A'); ?>">
    <link rel="stylesheet"
          href="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/css/responsive.css?<?php echo date('l jS \of F Y h:i:s A'); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() . "asisst/fav/" ?>favicon-16x16.png">
    <style>
        .small {
            position: relative;
            bottom: auto;
            left: auto;
            font-size: 10px;
        }
        .alert-danger {
            color: white;
            background-color: #E5343D !important;
            border-color: #BD000A !important;
        }
        .alert {
            color: white;
            background-color: #E5343D !important;
            border-color: #BD000A !important;
            border-radius: 5px;
        }
        .alert-dismissible .close {
            font-size: 16px;
            top: -14px;
            right: -31px;
            text-shadow: none;
            opacity: 1;
        }
        .watni {
            position: absolute;
            top: 50%;
            left: 50%;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            z-index: 0;
            -ms-transform: translateX(-50%) translateY(-50%);
            -moz-transform: translateX(-50%) translateY(-50%);
            -webkit-transform: translateX(-50%) translateY(-50%);
            transform: translateX(-50%) translateY(-50%);
        }
        .vp-controls-wrapper {
            display: none !important;
        }
    </style>
</head>
<body id="page-top" data-spy="scroll" data-target="" class="flexcroll">

<section id="login-page">
    <div class="login-wrapper">
       
        <div class="clearfix"></div>
        <div class="container-center ">
    
            <div class="wow bounceInDown" data-wow-delay="0.4s">
                <div class="login-area  ">
                    <div class="panel panel-bd panel-custom" style="margin-top: -60px !important; ">
                        <div class="panel-body">
                            <img src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/img/logo-abnaa.png" width="100%">
                            <h5 class="text-green text-center"></h5>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript" src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/js/jquery-1.10.1.min.js"></script>
<script src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/js/bootstrap-arabic.min.js"></script>
<script src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/js/custom.js"></script>
<script src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/js/owl.carousel.min.js"></script>
<script language="javascript">
    function autoResizeDiv() {
        document.getElementById('login-page').style.height = window.innerHeight + 'px';
    }
    function autoResizeDivMobile() {
        document.getElementById('login-page').style.height = 'auto';
    }
    var mq = window.matchMedia("(min-width: 767px)");
    if (mq.matches) {
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
    window.setTimeout(function () {
        $(".alert").fadeTo(500, 0).slideUp(500, function () {
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
</body>
</html>