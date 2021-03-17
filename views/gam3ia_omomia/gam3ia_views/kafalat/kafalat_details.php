<style>
    /*************/

.medaliat .counter {
    text-align: center;
    position: relative;
    color: #fff;
}

.medaliat .counter-inner {
    position: relative;
    z-index: 1;
    /*padding: 30px 10px 70px;*/
    /* padding: 10px 10px 50px;
    -webkit-clip-path: polygon(100% 0, 100% 75%, 50% 100%, 0% 75%, 0 0);
    clip-path: polygon(100% 0, 100% 75%, 50% 100%, 0% 75%, 0 0); */
    background: #22a69b;
}

.medaliat .counter.yellow .counter-inner,
.medaliat .counter.yellow .counter-icon {
    background: #f0b938;
}

.medaliat .counter.pink .counter-inner,
.medaliat .counter.pink .counter-icon {
    background: #fe5969;
}

.medaliat .counter.green .counter-inner,
.medaliat .counter.green .counter-icon {
    background: #6fd580;
}

.medaliat .counter.labni .counter-inner,
.medaliat .counter.labni .counter-icon {
    background: #7ed2b0;
}

.medaliat .counter-inner:before,
.medaliat .counter-icon:before {
    content: "";
    position: absolute;
    top: 0;
    right: 0;
    width: 50%;
    height: 100%;
    background: rgba(0, 0, 0, 0.15);
    z-index: -1;
}

.medaliat .counter-value {
    display: inline-block;
    border: 5px solid #fff;
    width: 100px;
    height: 100px;
    line-height: 90px;
    background: #22a69b;
    border-radius: 50%;
    color: #fff;
    font-size: 30px;
    font-weight: 700;
    position: relative;
    box-shadow: inset 0 0 15px rgba(0, 0, 0, 0.3);
    text-shadow: 2px 4px 3px rgba(0, 0, 0, 0.3);
    margin-bottom: 9px;
}

.medaliat .counter.yellow .counter-value {
    background: #f0b938;
}

.medaliat .counter.pink .counter-value {
    background: #fe5969;
}

.medaliat .counter.green .counter-value {
    background: #6fd580;
}

.medaliat .counter.labni .counter-value {
    background: #7ed2b0;
}

.medaliat .counter h3 {
    margin: 0;
    font-size: 20px;
    font-weight: 600;
    text-transform: uppercase;
}

.medaliat .counter-icon {
    display: inline-block;
    width: 70px;
    height: 70px;
    line-height: 70px;
    background: #22a69b;
    border-radius: 0 15px 0 15px;
    font-size: 30px;
    position: relative;
    overflow: hidden;
    z-index: 1;
}

.medaliat .counter-icon:after {
    content: "";
    position: absolute;
    top: 7px;
    left: 7px;
    right: 7px;
    bottom: 7px;
    border: 5px solid #fff;
    border-radius: 0 15px 0 15px;
    box-shadow: inset 0 0 15px rgba(0, 0, 0, 0.3);
}

@media screen and (max-width:990px) {
    .medaliat .counter {
        margin-bottom: 30px;
    }
}

.medaliat .yellow {
    background: transparent;
    border-left-width: 0px;
    -webkit-transform: rotate(0deg);
    -moz-transform: rotate(0deg);
    -o-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    transform: rotate(0deg);
}

.highcharts-container {
    /*width: 100% !important;*/
    min-width: 1000px !important;
}

@media screen and (min-width:990px) {
    .esalat-chart {
        width: 1000px !important;
    }
}

.esalat-stc .cicleat-sec .circle-arrow h5 span.name {
    width: auto;
    min-width: 62%;
}

.bottom-hr {
    display: inline-block;
    width: 100%;
    border-bottom: 1px solid #999;
}


/*****************/
    </style>
<div class="col-xs-12 padding-4">
                        <h5 class="title-style"><i class="fa fa-star"></i> إحصائيات الكفالات </h5>
                    </div>


                 <div class="boxat-sec col-xs-12 no-padding ">
                        <div class="col-md-2 col-sm-3 col-xs-6">
                            <div class="box-counter">
                                
                                <div class="counter-icon">
                                    <i class="fa fa-user"></i>
                                    <div class="counter-inner">
                                    
                                    <h3>كفالة أيتام</h3>
                                </div>
                                    <div class="counter-value">
                                        <span class="value">3456</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2 col-sm-3 col-xs-6">
                            <div class="box-counter">
                                
                                <div class="counter-icon">
                                    <i class="fa fa-user"></i>
                                    <div class="counter-inner">
                                    <h3>كفالة الزكاة</h3>
                                    <div class="counter-value">
                                        <span class="value">1673</span>
                                    </div>
                                  
                                </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-2 col-sm-3 col-xs-6">
                            <div class="box-counter labni">
                               
                                <div class="counter-icon">
                                    <i class="fa fa-user"></i>
                                    <div class="counter-inner">
                                    <h3>كفالة أوقاف</h3>
                                    <div class="counter-value">
                                        <span class="value">3456</span>
                                    </div>
                                   
                                </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2 col-sm-3 col-xs-6">
                            <div class="box-counter yellow">
                                
                                <div class="counter-icon">
                                    <i class="fa fa-user"></i>
                                    <div class="counter-inner">
                                    <h3>عدد الكفلاء</h3>
                                    <div class="counter-value">
                                        <span class="value"><?= $sponsor_count ?></span>
                                    </div>
                                    
                                </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2 col-sm-3 col-xs-6">
                            <div class="box-counter">
                                <div class="counter-inner">
                                    
                                </div>
                                <div class="counter-icon">
                                    <i class="fa fa-user"></i>
                                    <h3>عدد المتبرعين</h3>
                                    <div class="counter-value">
                                        <span class="value"><?= $donor_count ?></span>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>

                 
                    <div class="col-xs-12 no-padding esalat-stc">
                        <h5 class="title-style"><i class="fa fa-star"></i>إحصائيةالإيرادات والتبرعات</h5>
                        <div class="col-md-7 padding-4">
                            <canvas id="barChart-esalat" height="200"></canvas>
                        </div>
                        <div class="col-md-5 cicleat-sec">
                            <div class="bottom-hr">
                                <h5 class="text-center">عدد الأيتام : <?php if (!empty($GetAll['aytam'])) {
                                        echo $GetAll['aytam']['num'];
                                    } ?></h5>
                                <div class="col-xs-6 padding-4">
                                    <div class="circle-arrow green-circle">
                                        <h5><i class="fa fa-users"></i> <span class="name"> المكفول <strong
                                                        class="badge"><?php if (!empty($GetAll['aytam'])) {
                                                        echo $GetAll['aytam']['guaranteed'];
                                                    } ?></strong></span></h5>
                                    </div>
                                </div>
                                <div class="col-xs-6 padding-4">
                                    <div class="circle-arrow red-circle">
                                        <h5><i class="fa fa-users"></i> <span class="name"> غير مكفول <strong
                                                        class="badge"><?php if (!empty($GetAll['aytam'])) {
                                                        echo $GetAll['aytam']['not_guaranteed'];
                                                    } ?></strong></span></h5>
                                    </div>
                                </div>
                            </div>

                            <div class="bottom-hr">

                                <h5 class="text-center">عدد الأرامل : <?php if (!empty($GetAll['armal'])) {
                                        echo $GetAll['armal']['num'];
                                    } ?></h5>
                                <div class="col-xs-6 padding-4">
                                    <div class="circle-arrow green-circle">
                                        <h5><i class="fa fa-users"></i> <span class="name"> المكفول <strong
                                                        class="badge"><?php if (!empty($GetAll['armal'])) {
                                                        echo $GetAll['armal']['guaranteed'];
                                                    } ?></strong></span></h5>
                                    </div>
                                </div>
                                <div class="col-xs-6 padding-4">
                                    <div class="circle-arrow red-circle">
                                        <h5><i class="fa fa-users"></i> <span class="name"> غير مكفول <strong
                                                        class="badge"><?php if (!empty($GetAll['armal'])) {
                                                        echo $GetAll['armal']['not_guaranteed'];
                                                    } ?></strong></span></h5>
                                    </div>
                                </div>
                            </div>

                            <div class="bottom-hr">
                                <h5 class="text-center">عدد المستفيدين : <?php if (!empty($GetAll['mostafed'])) {
                                        echo $GetAll['mostafed']['num'];
                                    } ?></h5>
                                <div class="col-xs-6 padding-4">
                                    <div class="circle-arrow green-circle">
                                        <h5><i class="fa fa-users"></i> <span class="name"> المكفول <strong
                                                        class="badge"><?php if (!empty($GetAll['mostafed'])) {
                                                        echo $GetAll['mostafed']['guaranteed'];
                                                    } ?></strong></span></h5>
                                    </div>
                                </div>
                                <div class="col-xs-6 padding-4">
                                    <div class="circle-arrow red-circle">
                                        <h5><i class="fa fa-users"></i> <span class="name"> غير مكفول <strong
                                                        class="badge"><?php if (!empty($GetAll['mostafed'])) {
                                                        echo $GetAll['mostafed']['not_guaranteed'];
                                                    } ?></strong></span></h5>
                                    </div>
                                </div>
                            </div>
                     </div>

                </div>
                <script type="text/javascript" src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/js/jquery-1.10.1.min.js"></script>
                <script src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/plugins/chartJs/Chart.min.js" type="text/javascript"></script>
<!-- End Page Lavel Plugins
=====================================================================-->
<script type="text/javascript">
    $(document).ready(function () {
        function chartlist_kafala() {
            "use strict"; // Start of use strict
            

            //
            var ctx2 = document.getElementById("barChart-esalat");
            var myChart2 = new Chart(ctx2, {
                type: 'bar',
                data: {
                    labels: ["يناير", "فبراير", "مارس", "أبريل", "مايو", "يونيو", "يوليو", "أغسطس", "سبتمبر", "أكتوبر", "نوفمبر", "ديسمبر"],
                    datasets: [
                        {
                            label: "إجمالى الإيصالات",
                            data: [574200, 541250, 547850, 554650, 572350, 572850, 579850, 827850, 747850, 327850, 657850, 117850],
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

        chartlist_kafala();

    });
</script>