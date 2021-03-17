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
    width: 90px;
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
</style>




<section class="content">

            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="main test1">
                        <strong>أهلاً بك </strong> <?php if (isset($person_data->name) && !empty($person_data->name)) {
                            echo $person_data->laqb_title ."/". $person_data->name;
                        } ?>
       
                    </div>
                 
             </div>    
             </div>  
  



     <div class="col-md-12">
        <div class="col-md-3 padding-4">
      <div class="panel panel-default" style="height: 344px">
                                  
                                    <div class="panel-body">
          <!-- Profile Image -->
          <div class="box box-primary">
          
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
            
              <h6 class="widget-user-username">الأستاذ/سليمان بن عبدالعزيز الراضي</h6>
             
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="https://abnaa-sa.org/asisst/admin_asset/img/avatar5.png" alt="User Avatar">
            </div>
            <div class="box-footer">
              <div class="row">
       
                               <p class="text-muted text-center">
              <span class="label label-success">عضو عامل</span>
              <span class="label label-info">70/ع/463</span></p>
       
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b> <i class="fa fa-calendar" aria-hidden="true"></i>
بداية الإشتراك</b> <span class="pull-right label label-primary">01-01-2020</span>
                </li>
                <li class="list-group-item">
                  <b><i class="fa fa-calendar" aria-hidden="true"></i>
نهاية الإشتراك</b> <span class="pull-right label label-danger">01-01-2021</span>
                </li>
                <li class="list-group-item">
                  <b><i class="fa fa-calendar" aria-hidden="true"></i>
تاريخ التحديث</b> <span class="pull-right label label-success">01-01-2021</span>
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
                    <span class="progress-number"><b>70</b>/81</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-aqua" style="width: 80%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text"> <i class="fa fa-user-circle-o" aria-hidden="true"></i>عضو منتسب</span>
                    <span class="progress-number"><b>5</b>/81</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-red" style="width: 80%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text"> <i class="fa fa-user-circle-o" aria-hidden="true"></i>عضو شرفي</span>
                    <span class="progress-number"><b>5</b>/81</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-green" style="width: 80%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text"><i class="fa fa-user-circle-o" aria-hidden="true"></i> عضو فخري</span>
                    <span class="progress-number"><b>11</b>/81</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-yellow" style="width: 80%"></div>
                    </div>
                  </div>
                  
                  
                      <div class="progress-group">
                    <span class="progress-text"> <i class="fa fa-user-circle-o" aria-hidden="true"></i>عضو نشط</span>
                    <span class="progress-number"><b>11</b>/81</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-green" style="width: 80%"></div>
                    </div>
                  </div>
                  
                       <div class="progress-group">
                    <span class="progress-text"> <i class="fa fa-user-times" aria-hidden="true"></i> عضو غير نشط</span>
                    <span class="progress-number"><b>11</b>/81</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-red" style="width: 80%"></div>
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
  <li class="list-group-item"> <i class="fa fa-users" aria-hidden="true"></i>  أعضاء مجلس الإدارة<span class="pull-right badge bg-blue">31</span></li>
  <li class="list-group-item"> <i class="fa fa-user-circle-o" aria-hidden="true"></i> عضو نشط  <span class="pull-right badge bg-green">31</span></li>
  <li class="list-group-item"> <i class="fa fa-user-times" aria-hidden="true"></i> عضو غير نشط  <span class="pull-right badge bg-red">31</span></li>
  <li class="list-group-item"> <i class="fa fa-calendar-check-o" aria-hidden="true"></i> الإجتماعات  <span class="pull-right badge bg-blue">31</span></li>
  <li class="list-group-item"> <i class="fa fa-list-alt" aria-hidden="true"></i> البنود   <span class="pull-right badge bg-blue">31</span></li>
    <li class="list-group-item"> <i class="fa fa-list-ol" aria-hidden="true"></i> القرارات   <span class="pull-right badge bg-blue">31</span></li>
</ul>
          
         
            </div>
          </div>
  </div>  </div>


              
                
                
                
                
                
              <div class="col-md-3 padding-4">
      <div class="panel panel-default" style="height: 344px">
                                    <div class="panel-heading panel-title">استطلاع رأى</div>
                                    <div class="panel-body">
                                        <?php  if(isset($current_vote)&&!empty($current_vote)){?>
                                            <div class="form-group col-sm-12 col-xs-12  padding-4" >
                                            <p class="vote">
                                                <?php echo $current_vote->vote_title;?>
                                                </p>
                                                <br>
                                                <div class="form-group" id="vote" >
                                                    <div class="radio-content">
                                                        <input type="radio" id="esnad1" name="esnad_to"
                                                            <?php if(isset($get_voteing)&&!empty($get_voteing)&&($get_voteing ==1)){
                                                                echo "checked";
                                                            }
                                                            else
                                                            {
                                                                echo "checked";
                                                            }
                                                            ?>
                                                               class="f2a_types" value="1" >
                                                        <label for="esnad1" class="radio-label"> <?php echo $current_vote->vote_option1;?></label>
                                                    </div>
                                                    <div class="radio-content">
                                                        <input type="radio"
                                                            <?php if(isset($get_voteing)&&!empty($get_voteing)&&($get_voteing ==2)){
                                                                echo "checked";
                                                            }
                                                            ?>
                                                               id="esnad2" name="esnad_to"  class="f2a_types" value="2">
                                                        <label for="esnad2" class="radio-label"> <?php echo $current_vote->vote_option2;?></label>
                                                    </div>
                                                </div>
                                                <div class="form-group" id="result_vote" >
                                                </div>
                                                <div id="pollsButtons">
                                                    <?php if(isset($check_voteing)&&($check_voteing !=1)){?>
                                                        <div id="voteButton">
                                                            <input type="button"  value="التصويت" onclick="load_tahwel(<?php echo $current_vote->id;?>);">
                                                        </div>
                                                    <?php }?>
                                                    <div id="resultsButton">
                                                        <input type="button" value="النتائج" onclick="checkall11(<?php echo $current_vote->id;?>);">
                                                    </div>
                                                    <div id="backButton" style="display: none;">
                                                        <input type="button" value="الرجوع" onclick="fnBack();">
                                                    </div>
                                                </div>
                                            </div>
                                        <?php }?>
                                    </div>
                                </div>
                          
              </div>  
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
        </div>
        <!-- /.col -->



<div class="col-md-12">
<div class="col-md-9 padding-4">

      <div class="panel panel-default" style="">
                                    <div class="panel-heading panel-title">الموظفين</div>
                                    <div class="panel-body">
<div class="timeline-item">
    <div class="timeline-body">
        <img  class="img_emp"  src="https://abnaa-sa.org/uploads/human_resources/emp_photo/thumbs/590a606edff2d311b9300429acc71130.png" alt="..." class="margin">
        <img  class="img_emp"  src="https://abnaa-sa.org/uploads/human_resources/emp_photo/thumbs/f30f9b576faf67300f4406ea7ffcdc98.png"alt="..." class="margin">
        <img class="img_emp" src="https://abnaa-sa.org/uploads/human_resources/emp_photo/thumbs/f99b0dd6f845fc13acc362f876f97212.jpg" alt="..." class="margin">
        <img  class="img_emp" src="https://abnaa-sa.org/uploads/human_resources/emp_photo/thumbs/2cf7044ad03c48e295b535d2a85eb7b5.png" alt="..." class="margin">
        <img  class="img_emp" src="https://abnaa-sa.org/uploads/human_resources/emp_photo/thumbs/d4cc4754f08955780d7bb98663b8c283.jpg" alt="..." class="margin">
        <img  class="img_emp" src="https://abnaa-sa.org/uploads/human_resources/emp_photo/thumbs/8fc59cb185594d0c3b124a683158cf0f.png" alt="..." class="margin">
        <img  class="img_emp" src="https://abnaa-sa.org/uploads/human_resources/emp_photo/thumbs/60f8f97420910db30496585b0f39c231.png" alt="..." class="margin">
        <img  class="img_emp" src="https://abnaa-sa.org/uploads/human_resources/emp_photo/thumbs/acf7f9db22b671c7ee6f0a0b037f8715.jpg" alt="..." class="margin">
        <img  class="img_emp" src="https://abnaa-sa.org/uploads/human_resources/emp_photo/thumbs/1c51b93eed3092bd13b12d6b8ee8b3db.png" alt="..." class="margin"> 
        <img  class="img_emp" src="https://abnaa-sa.org/uploads/human_resources/emp_photo/thumbs/20a7c38be795564f824c9ff847715c60.jpg" alt="..." class="margin"> 
        <img  class="img_emp" src="https://abnaa-sa.org/uploads/human_resources/emp_photo/thumbs/c56f48f56f777acfe1ff22a435f56cbd.jpg" alt="..." class="margin"> 
  <img  class="img_emp" src="https://abnaa-sa.org/uploads/human_resources/emp_photo/thumbs/29380a1a34aee017be03515d71b5de0f.png" alt="..." class="margin"> 
  <img  class="img_emp" src="https://abnaa-sa.org/uploads/human_resources/emp_photo/thumbs/a5e6c6c577e25a082e6bea6b6ed3bcd6.png" alt="..." class="margin"> 



  <img  class="img_emp" src="https://abnaa-sa.org/uploads/human_resources/emp_photo/thumbs/0fcee96d1110e386bc182d2e88643ca6.png"alt="..." class="margin"> 
 <img  class="img_emp" src="https://abnaa-sa.org/uploads/human_resources/emp_photo/thumbs/71c4f51010bccd04e05fc445880e8af3.png" alt="..." class="margin"> 


</div>

</div>
</div>
</div>
</div>
<div class="col-md-3 padding-4">
    <div class="panel panel-default" style="height: 344px">
        <div class="panel-heading panel-title">بث مباشر وقف رعاية يتيم</div>
        <div class="panel-body">
            <iframe  height="250px" style="
width: 100%;
" src="https://www.youtube.com/embed/UV_0YPyrz2c" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        
        
   
        </div>
    </div>
</div>

</div>
      <!-- /.row -->

    </section>



        
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
                        $('#voteButton').hide();
                        //$("#tawel_result").html(html);
                    }
                });
            }
            function checkall11(quest)
            {
                $('#vote').hide();
                $('#resultsButton').hide();
                $('#result_vote').show();
                $('#backButton').show();
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