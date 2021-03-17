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
<section class="content">
    <!--<div class="panel panel-default">
        <div class="panel-body">
            <div class="main test1">
                <strong>أهلاً بك </strong> <?php if (isset($person_data->name) && !empty($person_data->name)) {
                    echo $person_data->laqb_title ."/". $person_data->name;
                } ?>
            </div>
        </div>
    </div>-->
    <br />
    <div class="col-md-12">

        <div class="col-md-3 padding-4">
            <div class="panel panel-default" style="height: 344px">
                <div class="panel-body">
                    <!-- Profile Image -->
                    <div class="box box-primary">
                        <div class="box box-widget widget-user">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header bg-aqua-active">
                               <!-- <h6 class="widget-user-username"><?php if (isset($person_data->name) && !empty($person_data->name)) {
                                        echo $person_data->laqb_title ."/". $person_data->name;
                                    } ?></h6>-->
                            </div>
                            <div class="widget-user-image">
                                <?php if (isset($person_data->mem_img) && !empty($person_data->mem_img)) { ?>
                                    <img class="img-circle" src="https://abnaa-sa.org/uploads/md/gam3ia_omomia_members/<?php echo $person_data->mem_img; ?>" alt="User Avatar">
                                <?php  }else{?>
                                    <img class="img-circle" src="https://abnaa-sa.org/asisst/admin_asset/img/avatar5.png" alt="User Avatar">
                                <?php }?>
                            </div>
                            
                            
                            
                            <div class="box-footer">
                                <div class="row">
                                        
                                    <h6 style="color: black;" class="widget-user-username"><?php if (isset($person_data->name) && !empty($person_data->name)) {
                                        echo $person_data->laqb_title ."/". $person_data->name;
                                    } ?></h6>
                                    <p class="text-muted text-center">
                                    
                                    
              <span class="label label-success"><?php if (isset($odwia_data->no3_odwia_title) && !empty($odwia_data->no3_odwia_title)) {
                      echo $odwia_data->no3_odwia_title;
                  } ?></span>
                                        <span class="label label-info"><?php if (isset($odwia_data->rkm_odwia_full) && !empty($odwia_data->rkm_odwia_full)) {
                                                echo $odwia_data->rkm_odwia_full;
                                            } ?></span></p>
                                            
                                    
                                    <ul class="list-group list-group-unbordered">
                                        <li class="list-group-item">
                                            <b> <i class="fa fa-calendar" aria-hidden="true"></i>
                                                بداية الإشتراك</b> <span class="pull-right label label-primary"><?php /*echo date('Y-m-d', $odwia_data->from_date);*/
                                                echo format_date($odwia_data->subs_from_date_m);
                                                 ?></span>
                                        </li>
                                        <li class="list-group-item">
                                            <b><i class="fa fa-calendar" aria-hidden="true"></i>
                                                نهاية الإشتراك</b> <span class="pull-right label label-danger">  <?php 
                                               // echo date('Y-m-d', $odwia_data->to_date);
                                                  echo format_date($odwia_data->subs_to_date_m);
                                                 ?></span>
                                        </li>
                                        <li class="list-group-item">
                                            <b><i class="fa fa-calendar" aria-hidden="true"></i>
                                                تاريخ التحديث</b> <span class="pull-right label label-success"> 
                                                <?php echo format_date($odwia_data->update_date_m); ?></span>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /.row -->
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                    <!-- About Me Box -->
                    <!-- /.box -->
                </div></div>
        </div>
        <!-- /.col -->
        <div class="col-md-3 padding-4">
            <div class="panel panel-default" style="height: 344px">
                <div class="panel-heading panel-title">إحصائية عامة جمعية العمومية</div>
                <div class="panel-body">
                    <!--<p class="text-center">
                      <strong>إحصائية عامة</strong>
                    </p>-->
                    <div class="progress-group">
                        <span class="progress-text"> <i class="fa fa-user-circle-o" aria-hidden="true"></i> عضو عامل </span>
                        <span class="progress-number"><b><?php if(isset($adow_3amel) &&!empty($adow_3amel)) echo $adow_3amel; ?></b>/<?php if(isset($gam3ia_omomia_odwiat) &&!empty($gam3ia_omomia_odwiat)) echo $gam3ia_omomia_odwiat; ?></span>
                        <div class="progress sm">
                            <div class="progress-bar progress-bar-aqua"
                                 style="width:<?if(isset($adow_3amel)&&isset($gam3ia_omomia_odwiat))echo ($adow_3amel/$gam3ia_omomia_odwiat)*100; else echo 0;?>%"
                            ></div>
                        </div>
                    </div>
             
                    <div class="progress-group">
                        <span class="progress-text"> <i class="fa fa-user-circle-o" aria-hidden="true"></i>عضو منتسب</span>
                        <span class="progress-number"><b><?php if(isset($adow_montsb) ) echo $adow_montsb; ?></b>/<?php if(isset($gam3ia_omomia_odwiat) &&!empty($gam3ia_omomia_odwiat)) echo $gam3ia_omomia_odwiat; ?></span>
                        <div class="progress sm">
                            <div class="progress-bar progress-bar-red"
                                 style="width:<?if(isset($adow_montsb)&&isset($gam3ia_omomia_odwiat))echo ($adow_montsb/$gam3ia_omomia_odwiat)*100; else echo 0;?>%"
                            ></div>
                        </div>
                    </div>
                   
                    <div class="progress-group">
                        <span class="progress-text"> <i class="fa fa-user-circle-o" aria-hidden="true"></i>عضو شرفي</span>
                        <span class="progress-number"><b><?php if(isset($adow_shraf) ) echo $adow_shraf; ?></b>/<?php if(isset($gam3ia_omomia_odwiat) &&!empty($gam3ia_omomia_odwiat)) echo $gam3ia_omomia_odwiat; ?></span>
                        <div class="progress sm">
                            <div class="progress-bar progress-bar-green"
                                 style="width:<?if(isset($adow_shraf)&&isset($gam3ia_omomia_odwiat))echo ($adow_shraf/$gam3ia_omomia_odwiat)*100; else echo 0;?>%"
                            ></div>
                        </div>
                    </div>
                   
                    <div class="progress-group">
                        <span class="progress-text"><i class="fa fa-user-circle-o" aria-hidden="true"></i> عضو فخري</span>
                        <span class="progress-number"><b><?php if(isset($adow_fakhry) ) echo $adow_fakhry; ?></b>/<?php if(isset($gam3ia_omomia_odwiat) &&!empty($gam3ia_omomia_odwiat)) echo $gam3ia_omomia_odwiat; ?></span>
                        <div class="progress sm">
                            <div class="progress-bar progress-bar-yellow"
                                 style="width:<?if(isset($adow_fakhry)&&isset($gam3ia_omomia_odwiat))echo ($adow_fakhry/$gam3ia_omomia_odwiat)*100; else echo 0;?>%"
                            ></div>
                        </div>
                    </div>
                    <div class="progress-group">
                        <span class="progress-text"> <i class="fa fa-user-circle-o" aria-hidden="true"></i>عضو نشط</span>
                        <span class="progress-number"><b><?php if(isset($adow_active) ) echo $adow_active; ?></b>/<?php if(isset($gam3ia_omomia_odwiat) &&!empty($gam3ia_omomia_odwiat)) echo $gam3ia_omomia_odwiat; ?></span>
                        <div class="progress sm">
                            <div class="progress-bar progress-bar-green"
                                 style="width:<?if(isset($adow_active)&&isset($gam3ia_omomia_odwiat))echo ($adow_active/$gam3ia_omomia_odwiat)*100; else echo 0;?>%"
                            ></div>
                        </div>
                    </div>
                    <div class="progress-group">
                        <span class="progress-text"> <i class="fa fa-user-times" aria-hidden="true"></i> عضو غير نشط</span>
                        <span class="progress-number"><b><?php if(isset($adow_nonactive) ) echo $adow_nonactive; ?></b>/<?php if(isset($gam3ia_omomia_odwiat) &&!empty($gam3ia_omomia_odwiat)) echo $gam3ia_omomia_odwiat; ?></span>
                        <div class="progress sm">
                            <div class="progress-bar progress-bar-red"
                                 style="width:<?if(isset($adow_nonactive)&&isset($gam3ia_omomia_odwiat))echo ($adow_nonactive/$gam3ia_omomia_odwiat)*100; else echo 0;?>%"
                            ></div>
                        </div>
                    </div>
                    
                    
                </div></div>
        </div>
        <div class="col-md-3 padding-4">
            <div class="panel panel-default" style="height: 344px">
                <div class="panel-heading panel-title">إحصائية عامة </div>
                <div class="panel-body">
                    <div class="box-footer no-padding">
                        <ul class="list-group">
                            
<li class="list-group-item"> <i class="fa fa-users" aria-hidden="true"></i>  أعضاء مجلس الإدارة<span class="pull-right badge bg-blue">9</span></li>
<li class="list-group-item"> <i class="fa fa-user-circle-o" aria-hidden="true"></i> عضو نشط  <span class="pull-right badge bg-green">8</span></li>
<li class="list-group-item"> <i class="fa fa-user-times" aria-hidden="true"></i> عضو غير نشط  <span class="pull-right badge bg-red">1</span></li>
           
        
                            
                          <!--  
                            <li class="list-group-item"> <i class="fa fa-users" aria-hidden="true"></i>  أعضاء مجلس الإدارة<span class="pull-right badge bg-blue"><?php if(isset($mgles_edara)&&!empty($mgles_edara)) echo $mgles_edara ?></span></li>
                            <li class="list-group-item"> <i class="fa fa-user-circle-o" aria-hidden="true"></i> عضو نشط  <span class="pull-right badge bg-green"><?php if(isset($mgles_edara_active)&&!empty($mgles_edara_active)) echo $mgles_edara_active ?></span></li>
                            <li class="list-group-item"> <i class="fa fa-user-times" aria-hidden="true"></i> عضو غير نشط  <span class="pull-right badge bg-red"><?php if(isset($mgles_edara_nonative)&&!empty($mgles_edara_nonative)) echo $mgles_edara_nonative ?></span></li>
                           <li class="list-group-item"> <i class="fa fa-calendar-check-o" aria-hidden="true"></i> الإجتماعات  <span class="pull-right badge bg-blue"><?php if(isset($meetings)&&!empty($meetings)) echo $meetings ?></span></li>
                            <li class="list-group-item"> <i class="fa fa-list-alt" aria-hidden="true"></i> البنود   <span class="pull-right badge bg-blue"><?php if(isset($mehwer)&&!empty($mehwer)) echo $mehwer ?></span></li>
                            <li class="list-group-item"> <i class="fa fa-list-ol" aria-hidden="true"></i> القرارات   <span class="pull-right badge bg-blue"><?php if(isset($qrar)&&!empty($qrar)) echo $qrar ?></span></li>
                       -->
                        </ul>
                    </div>
                </div>
            </div>  </div>
            
                  <div class="col-md-3 padding-4">
            <div class="panel panel-default" style="height: 344px">
                <div class="panel-heading panel-title">منجزات مجلس الإدارة في دورته الثالثة</div>
                <div class="panel-body">
                    <iframe  height="250px" style="
width: 100%;
" src="https://www.youtube.com/embed/<?=$vedios?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                
                </div>
            </div>
        </div>
   
    </div>
    <!-- /.col -->
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/gam3ia_omomia_asset/css/style22.css">


    <div class="col-md-12 padding-4">
       
            <div class="panel panel-default" style="">
                <div style="    color: #09704e;
    text-align: center;
    font-size: 20px;
    font-weight: bold;"
                
                 class="panel-heading panel-title"> البث المباشر لاجتماع أعضاء الجمعية العمومية 2020

                  </div>
                <div class="panel-body">
                     <iframe  height="417px" style="
width: 100%;
" src="https://www.youtube.com/embed/rR85CtSy5R8" frameborder="0" 
          allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  
                </div>
            </div>
        </div>
       






    <div class="col-md-12">
        <div class="col-md-6 padding-4">
            <div class="panel panel-default" style="">
                <div class="panel-heading panel-title"> البث المباشر من وقف رعاية يتيم
                  </div>
                <div class="panel-body">
                     <iframe  height="417px" style="
width: 100%;
" src="https://www.youtube.com/embed/<?= $vvv[0]->video_link?>" frameborder="0" 
          allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  
                </div>
            </div>
        </div>
        
        
        
            <div class="col-md-6 padding-4">
            <div class="panel panel-default" style="">
                <div class="panel-heading panel-title">المشاريع</div>
                <div class="panel-body">
 
 
<div id="actions_slider" class="carousel slide" data-ride="carousel">
<!-- Indicators -->
<ol class="carousel-indicators">
<li data-target="#actions_slider" data-slide-to="0" class="active"></li>
<li data-target="#actions_slider" data-slide-to="1"></li>
<li data-target="#actions_slider" data-slide-to="2"></li>
<li data-target="#actions_slider" data-slide-to="3"></li>
<li data-target="#actions_slider" data-slide-to="4"></li>
<li data-target="#actions_slider" data-slide-to="5"></li>
<li data-target="#actions_slider" data-slide-to="6"></li>
<li data-target="#actions_slider" data-slide-to="7"></li>
</ol>
<div class="carousel-inner" role="listbox">
<?php
    if (isset($projects) && $projects!= null ){
        $x= 0;
        foreach ($projects as $row){
        $active='';
            if($x==0){
            $active='active';
            }
        $x++;
        ?>
            <div class="item <?php echo $active; ?>">
            <img style="height: 417px !important; width: 100% !important;" src="<?= base_url()."uploads/images/".$row->img ?>"/>
            </div>
            <?php
        }
    }
?>
</div>
<!-- Controls -->
<a class="left carousel-control" href="#actions_slider" role="button" data-slide="prev">
<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
<span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#actions_slider" role="button" data-slide="next">
<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
<span class="sr-only">Next</span>
</a>

</div>

              <!--<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carousel-example-generic" data-slide-to="0" class=""></li>
                  <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                  <li data-target="#carousel-example-generic" data-slide-to="2" class="active"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="item">
                    <img style="height: 300px !important;" src="https://abnaa-sa.org/uploads/md/gam3ia_omomia_members/4f92cb7870d1da68d31c4bc315fdfd18.png" alt="First slide">

                    <div class="carousel-caption">
                      First Slide
                    </div>
                  </div>
                  <div class="item">
                    <img style="height: 300px !important;" src="https://abnaa-sa.org/uploads/md/gam3ia_omomia_members/4f92cb7870d1da68d31c4bc315fdfd18.png" alt="Second slide">

                    <div class="carousel-caption">
                      Second Slide
                    </div>
                  </div>
                  <div class="item active">
                    <img style="height: 300px !important;" src="https://abnaa-sa.org/uploads/md/gam3ia_omomia_members/4f92cb7870d1da68d31c4bc315fdfd18.png" alt="Third slide">

                    <div class="carousel-caption">
                      Third Slide
                    </div>
                  </div>
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                  <span class="fa fa-angle-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                  <span class="fa fa-angle-right"></span>
                </a>
              </div>-->

                </div>
            </div>
        </div>
        
        
    </div>

</section>

<?php
 if(isset($da3wat) && !empty($da3wat) ){
 if($da3wat->action_dawa ==Null ||$da3wat->action_dawa =='' ){?>
<div class="modal modal-startup fade" id="dawa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="
    width: 100%;
">
            <div class="modal-header">

                <h6 class="modal-title" id="myModalLabel">
                 <i class="fa fa-envelope-open-o" aria-hidden="true"></i>
دعوة لحضور إجتماع الجمعية العمومية</h6>
            </div>
            <div class="modal-body">
                
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
<div class="modal-footer">
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
    </div>
</div>
<?php } }?>
<!-- yaraaaaaaaaaaaaaaaaa -->
  <!-- yaraaaa23-6-2020 -->

<!-- yaraaaaaaaaaaaaaaaaa -->
  <!-- yaraaaa23-6-2020 -->
  <?php

if(isset($da3wa_magls_edara) && !empty($da3wa_magls_edara) ) {
    if (!empty($da3wa_magls_edara->da3wa_member)) {?>
<div class="col-md-12">
        <div class="modal modal-startup fade" id="da3wa_magls_edara" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="width: 100%;">
                    <div class="modal-header">
                        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                        </button> -->
                        <h6 class="modal-title" id="myModalLabel">
                            <i class="fa fa-envelope-open-o" aria-hidden="true"></i>
                            دعوة لحضور إجتماع مجلس الإدراة </h6>
                    </div>
                    <div class="modal-body">
                            <div class="">
                                <div class="print_forma  no-border    col-xs-12 allpad-12">
                                    <div class="col-xs-12">
                                        <div class="personality" style="margin-top: 28px;">
                                            <div class="col-xs-12 no-padding">
                                                <div class="form-group col-sm-12 col-xs-12">
                                                    <h6 style="line-height: 26px; color: black; font-weight: bold;">
                                                        <i style="color: red;" class="fa fa-quote-right" aria-hidden="true"></i>
                                                        <p>
                                                        هل تريد قبول دعوة مجلس الادارة بتاريخ : <?=$da3wa_magls_edara->glsa_date_ar?>
                                                        الموافق يوم  <?=$da3wa_magls_edara->glsa_day?>
                                                        رقم جلسة :  <?=$da3wa_magls_edara->glsa_rkm ?>
                                                        </p>
                                                        <i  style="color: red;" class="fa fa-quote-left" aria-hidden="true"></i>
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="col-md-12" id="refuse_d3wa_magls_edara" style="display:none; padding-bottom: 16px; ">
                                <span style="float: right;">سبب رفض الدعوة</span>
                                <input type="text" id="reason_magls_edara"  class="form-control" name="reason_magls_edara">
                            </div>
                            <div class="col-md-12" id="actionn">
                                <div class="col-md-6">
                                    <a  onclick="confirm_magls_edara(<?=$da3wa_magls_edara->da3wa_member->id?>,'accept')" class="btn btn-success btn-block"><b>قبول الدعوة</b></a>
                                </div>
                                <div class="col-md-6">
                                    <a onclick="confirm_magls_edara(<?=$da3wa_magls_edara->da3wa_member->id?>,'refuse')" class="btn btn-danger btn-block"><b>رفض الدعوة</b></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    <?php } }?>


  
  
  
  
  
  <script>

  

    

function confirm(id,action) {


    if(action=='refuse')
    {
        $('#refuse_d3wa').show();

        var reason=$('#reason').val();

        if(reason !='')
        {

        swal({

title: "هل انت متاكد من العملية?",

type: "warning",

showCancelButton: true,

confirmButtonClass: "btn-danger",

confirmButtonText: "نعم",

cancelButtonText: "لا",

closeOnConfirm: false,

closeOnCancel: false

},

function(isConfirm) {

if (isConfirm) {

$.ajax({

      type: 'post',

      url: '<?php echo base_url() ?>gam3ia_omomia/Gam3ia_omomia/reply_dawa',

      data: {id: id,action:action,reason:reason},

      dataType: 'html',

      cache: false,

      beforeSend: function()

      {

          swal({

title: "جاري  ... ",

text: "",

imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',

showConfirmButton: false,

allowOutsideClick: false

});

      },

      success: function (html) {

          //   alert(html);

         

          $('#dawa').modal('hide');

        

          swal({

              title: "تم !",





}

);





      }

  });

} else {

swal("تم الالغاء","", "error");

}

});
    }else{
        swal(" برجاء ادخال سبب الرفض","", "error");  
    }
    
    }else{

swal({

title: "هل انت متاكد من العملية?",

type: "warning",

showCancelButton: true,

confirmButtonClass: "btn-danger",

confirmButtonText: "نعم",

cancelButtonText: "لا",

closeOnConfirm: false,

closeOnCancel: false

},

function(isConfirm) {

if (isConfirm) {

$.ajax({

        type: 'post',

        url: '<?php echo base_url() ?>gam3ia_omomia/Gam3ia_omomia/reply_dawa',

        data: {id: id,action:action},

        dataType: 'html',

        cache: false,

        beforeSend: function()

        {

            swal({

title: "جاري  ... ",

text: "",

imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',

showConfirmButton: false,

allowOutsideClick: false

});

        },

        success: function (html) {

            //   alert(html);

           

            $('#dawa').modal('hide');

          

            swal({

                title: "تم !",





}

);





        }

    });

} else {

swal("تم الالغاء","", "error");

}

});














    }






}

</script>
<!-- yaraa -->
<script>
    function get_details(row_id) {
        // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>gam3ia_omomia/Gam3ia_omomia/news_details",
            data: {row_id: row_id},
            beforeSend: function () {
                $('#details').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#details').html(d);
            }
        });
    }
</script>
<script type="text/javascript" src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/js/jquery-1.10.1.min.js"></script>
<script src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/plugins/chartJs/Chart.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        function chartlist_family() {
            "use strict"; // Start of use strict
            //bar chart
            var ctx = document.getElementById("barChart10");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["يناير", "فبراير", "مارس", "أبريل", "مايو", "يونيو", "يوليو", "أغسطس", "سبتمبر", "أكتوبر", "نوفمبر", "ديسمبر"],
                    datasets: [
                        {
                            label: "إجمالى إيصالات بالريال السعودى",
                            data: [<?php echo $orders[0];?>, <?php echo $orders[1];?>, <?php echo $orders[2];?>, <?php echo $orders[3];?>, <?php echo $orders[4];?>, <?php echo $orders[5];?>, <?php echo $orders[6];?>, <?php echo $orders[7];?>, <?php echo $orders[8];?>, <?php echo $orders[9];?>, <?php echo $orders[10];?>, <?php echo $orders[11];?>],
                            borderColor: "rgba(124, 177, 0, 0.76)",
                            borderWidth: "0",
                            //backgroundColor: "rgba(99, 142, 0, 0.76)"
                            backgroundColor: ["rgb(149, 206, 255)", "rgba(99, 142, 0, 0.76)", "rgb(67, 67, 72)", "rgb(247, 163, 92)", "rgb(128, 133, 233)", "rgb(241, 92, 128)", "rgb(228, 211, 84)", "rgb(43, 144, 143)", "rgb(244, 91, 91)", "rgb(145, 232, 225)", "rgb(124, 181, 236)", "rgb(67, 67, 72)"],
                        }
                    ]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }
        chartlist_family();
    });
</script>
<script>
    function load_tahwel(quest) {
        $('#tawel_result').show();
        var answer = $('input[name=esnad_to]:checked').val();
        //  alert(type);
        $.ajax({
            type: 'post',
            url: '<?php echo base_url()?>gam3ia_omomia/Gam3ia_omomia/add_vote',
            data: {quest:quest,answer: answer},
            dataType: 'html',
            cache: false,
            success: function (html) {
                swal({
                        title: "تم  التصويت بنجاح!",
                    }
                );
                $('#pollsButtons').hide();
                checkall11(quest);
                //$("#tawel_result").html(html);
            }
        });
    }
    function checkall11(quest)
    {
        $('#vote').hide();
        $('#resultsButton').hide();
        $('#result_vote').show();
        // $('#backButton').show();
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>gam3ia_omomia/Gam3ia_omomia/load_result",
            data: {quest: quest},
            beforeSend: function () {
                $('#result_vote').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#result_vote').html(d);
            }
        });
    }
    function fnBack()
    {
        $('#vote').show();
        $('#resultsButton').show();
        $('#result_vote').hide();
        $('#backButton').hide();
    }
</script>



<script>
    function confirm_magls_edara(id,action) {
        if(action=='refuse')
        {
            $('#refuse_d3wa_magls_edara').show();
            var reason=$('#reason_magls_edara').val();
            if(reason !='')
            {
                swal({
                        title: "هل انت متاكد من العملية?",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "نعم",
                        cancelButtonText: "لا",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    },
                    function(isConfirm) {
                        if (isConfirm) {
                            $.ajax({
                                type: 'post',
                                url: '<?php echo base_url() ?>gam3ia_omomia/Dash/reply_da3wa_magls_edara',
                                data: {id: id,action:action,reason:reason},
                                dataType: 'html',
                                cache: false,
                                beforeSend: function()
                                {
                                    swal({
                                        title: "جاري  ... ",
                                        text: "",
                                        imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                                        showConfirmButton: false,
                                        allowOutsideClick: false
                                    });
                                },
                                success: function (html) {
                                    //   alert(html);
                                    $('#da3wa_magls_edara').modal('hide');
                                    swal({
                                            title: "تم !",
                                        }
                                    );
                                }
                            });
                        } else {
                            swal("تم الالغاء","", "error");
                        }
                    });
            }else{
                swal(" برجاء ادخال سبب الرفض","", "error");
            }
        }else{
            swal({
                    title: "هل انت متاكد من العملية?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "نعم",
                    cancelButtonText: "لا",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            type: 'post',
                            url: '<?php echo base_url() ?>gam3ia_omomia/Dash/reply_da3wa_magls_edara',
                            data: {id: id,action:action},
                            dataType: 'html',
                            cache: false,
                            beforeSend: function()
                            {
                                swal({
                                    title: "جاري  ... ",
                                    text: "",
                                    imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                                    showConfirmButton: false,
                                    allowOutsideClick: false
                                });
                            },
                            success: function (html) {
                                //   alert(html);
                                $('#da3wa_magls_edara').modal('hide');
                                swal({title: "تم !",});
                            }
                        });
                    } else {
                        swal("تم الالغاء","", "error");
                    }
                });
        }
    }
</script>