<div class="col-xs-12 padding-4">
                        <h5 class="title-style"><i class="fa fa-pencil"></i> إحصائيات إدارة الرعاية الإجتماعية</h5>
                    </div>

        <div class="boxat-sec col-xs-12 no-padding">
                        <div class="col-md-2 col-sm-2 col-xs-4 padding-4">
                            <div class="box-counter">
                                <i class="fa fa-users"></i>
                                <h5>عدد الأسر</h5>
                                <span class="badge"><?php echo $all_files; ?></span>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-4 padding-4">
                            <div class="box-counter">
                                <i class="fa fa-users"></i>
                                <h5>الأسر النشطة</h5>
                                <span class="badge badge-success"><?php echo $all_files_active; ?></span>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-4 padding-4">
                            <div class="box-counter">
                                <i class="fa fa-users"></i>
                                <h5> الأسر الموقوفة</h5>
                                <span class="badge badge-danger"><?php echo $all_files_non_active; ?></span>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-4 padding-4">
                            <div class="box-counter">
                                <i class="fa fa-users"></i>
                                <h5>عدد الطلبات</h5>
                                <span class="badge badge-warning"><?php echo $all_talabat; ?></span>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-4 padding-4">
                            <div class="box-counter">
                                <i class="fa fa-users"></i>
                                <h5>عدد الأيتام</h5>
                                <span class="badge"><?php echo $all_yatem; ?></span>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-4 padding-4">
                            <div class="box-counter">
                                <i class="fa fa-users"></i>
                                <h5>عدد الأرامل</h5>
                                <span class="badge"><?php echo $all_mother_num; ?></span>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-4 padding-4">
                            <div class="box-counter">
                                <i class="fa fa-users"></i>
                                <h5>عدد المستفيدين</h5>
                                <span class="badge"><?php echo $all_mostafed; ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-8 col-xs-12 no-padding">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <h4>إحصائية بإجمالى المساعدات المالية خلال العام الحالى 2019</h4>
                                </div>
                            </div>
                            <div class="panel-body">
                                <canvas id="barChart" height="200"></canvas>

                            </div>
                        </div>
                    </div>

 </div>
 <script type="text/javascript" src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/js/jquery-1.10.1.min.js"></script>
 <script src="<?php echo base_url() ?>asisst/gam3ia_omomia_asset/plugins/chartJs/Chart.min.js" type="text/javascript"></script>
 <script type="text/javascript">
    $(document).ready(function () {
        function chartlist_family() {
            "use strict"; // Start of use strict
        
             
            //bar chart
            var ctx = document.getElementById("barChart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["يناير", "فبراير", "مارس", "أبريل", "مايو", "يونيو", "يوليو", "أغسطس", "سبتمبر", "أكتوبر", "نوفمبر", "ديسمبر"],
                    datasets: [
                        {
                            label: "إجمالى المساعدات بالريال السعودى",
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