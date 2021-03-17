<!--<link rel="stylesheet" href="--><?php //echo base_url()?><!--asisst/admin_asset/css/style22.css">-->


<link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/orgchart/css/jquery.orgchart.css">
<link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/orgchart/css/style.css">


<style>
    /*--- Content ---*/

    .content {
        width: 100%;
        display: inline-block;
        min-height: 50px;
        margin-right: auto;
        margin-left: auto;
        padding: 0 30px 10px;
        overflow: auto;
    }

</style>
<style type="text/css">

    .fa-print {
        padding: 6px 9px;
        font-size: 17px;
        /*margin: 3px;*/
        margin: -27px;
        margin-left: auto;
        line-height: 1.5;
        float: left;
        background-color: #b30dae;
        color: #fff;
        /* border-radius: 2px; */
        border-radius: 11px;
    }
</style>

<div class="col-xs-12 no-padding" >
    <div class="panel panel-default" style="height: 45px;">
        <!--<div class="panel-heading panel-title"><?=$title;?></div>-->
        <div class="panel-heading">
            <div class="panel-title">
                <h4> الإدارات</h4>
            </div>

            <a target="_blank" href="<?=base_url()?>human_resources/Structure/print_result_2/2"  >
                <i class="fa fa-print" aria-hidden="true"></i> </a>
            <!--            <a href="#" onclick="print_s();" >-->
            <!--                <i class="fa fa-print" aria-hidden="true"></i> </a>-->
        </div>
        <div class="panel-body"  >

<?php
//echo "??????????????????????<pre>";
//print_r($tree);
//echo "</pre>";
?>
            <div id="chart-container"></div>
        </div>
    </div>
</div>


<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>

<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/orgchart/js/jquery.orgchart.js"></script>
<script type="text/javascript">
    $(function() {

        console.log(<?=json_encode($tree)?>);
        var datascource = {
           'name': 'الجمعية العمومية',
            'title': 'الجمعية العمومية',
           'children':<?=json_encode($tree)?>
        };


        // var datascource = {
        //     'name': 'Lao Lao',
        //     'title': 'general manager',
        //     'children': [
        //         { 'name': 'Bo Miao', 'title': 'department manager', 'collapsed': true,
        //             'children': [
        //                 { 'name': 'Li Jing', 'title': 'senior engineer', 'className': 'slide-up' },
        //                 { 'name': 'Li Xin', 'title': 'senior engineer', 'collapsed': true, 'className': 'slide-up',
        //                     'children': [
        //                         { 'name': 'To To', 'title': 'engineer', 'className': 'slide-up' },
        //                         { 'name': 'Fei Fei', 'title': 'engineer', 'className': 'slide-up' },
        //                         { 'name': 'Xuan Xuan', 'title': 'engineer', 'className': 'slide-up' }
        //                     ]
        //                 }
        //             ]
        //         },
        //         { 'name': 'Su Miao', 'title': 'department manager',
        //             'children': [
        //                 { 'name': 'Pang Pang', 'title': 'senior engineer' },
        //                 { 'name': 'Hei Hei', 'title': 'senior engineer', 'collapsed': true,
        //                     'children': [
        //                         { 'name': 'Xiang Xiang', 'title': 'UE engineer', 'className': 'slide-up' },
        //                         { 'name': 'Dan Dan', 'title': 'engineer', 'className': 'slide-up' },
        //                         { 'name': 'Zai Zai', 'title': 'engineer', 'className': 'slide-up' }
        //                     ]
        //                 }
        //             ]
        //         }
        //     ]
        // };


        $('#chart-container').orgchart({
            'data' : datascource,
            'nodeContent': 'title'
        });

    });
</script>


