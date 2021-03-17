
<style>
.table-bordered > tbody > tr > th, .table-bordered > tbody > tr > td{
    background: white !important;
   
    border: 1px solid #101010 !important;
}

</style>
<?php if ((isset($all_holidays)) && (!empty($all_holidays))) { ?>
    <div id="table">
        <table style="background: #c4628b;color: white;" class="table table-bordered table-responsive">
            <thead>
            <tr>
                <th>نوع الاجازة</th>
                <th>الإجمالي</th>
                <th>مستنفذ</th>
                 <th>متبقي</th>
            </tr>
            </thead>
            <tbody>
            <?php $x=1; 
                      foreach ($all_holidays as $holiday) { ?>
                <tr>
                    <td style="background: #f9cc8e !important;"><?= $holiday->name ?></td>
                    <td><span class="label label-primary"><?= $holiday->agzat->num_days ?></span></td>
                    <td><span class="label label-danger"><?= $holiday->agzat->vDays ?></span></td>
<!--                    <td><span class="label label-success">--><?//= ($holiday->agzat->num_days - $holiday->agzat->vDays) ?><!--</span>-->
                    <td><span class="label label-success"><?= ($holiday->agzat->ava_days ) ?></span>
                    </td>
                </tr>
            <?php } ?>
         <?php    /* foreach ($all_holidays as $holiday){ ?>
                <tr>
                    <td style="background: #f9cc8e !important;"><?=$holiday->name?></td>
                    <td><span class="label label-primary"><?=$holiday->num_days?></span></td>
                    <td><span class="label label-danger"><?=$holiday->agzat->vDays?></span></td>
                    <td><span class="label label-success"><?=($holiday->num_days - $holiday->agzat->vDays)?></span>
</td>
                </tr>
            <?php } 
            */
             ?>

            </tbody>
        </table>
    </div>
    <?php }  ?>
<!--<div id="piechart"></div>-->

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    // Load google charts
    google.charts.load('current', {'packages': ['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    // Draw the chart and set the chart values
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            <?php if ((isset($all_holidays)) && (!empty($all_holidays))){
            foreach ($all_holidays as $holiday){
            ?>
            ['<?=$holiday->name?>', <?=$holiday->agzat->vDays?>/<?=$holiday->num_days?>],
                <?php }
                } ?>
            ]);
        // Optional; add a title and set the width and height of the chart
        var options = {'title': 'رصيد الأجازات', 'height': 400};
        // Display the chart inside the <div> element with id="piechart"
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
    }
</script>