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
                <h4> الموظفيين</h4>
            </div>

            <a target="_blank" href="<?=base_url()?>human_resources/Structure/print_result_2/1"  >
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

        $('#chart-container').orgchart({
            'data' : datascource,
            'nodeContent': 'title',
            'visibleLevel': 2
        });

        //$('#chart-container').orgchart({
        //    'data' : datascource,
        //    'visibleLevel': 2,
        //    // 'nodeContent': 'title',
        //    // 'nodeID': 'id',
        //    'createNode': function($node, data) {
        //        var secondMenuIcon = $('<i>', {
        //            'class': 'oci oci-info-circle second-menu-icon',
        //            click: function() {
        //                $(this).siblings('.second-menu').toggle();
        //            }
        //        });
        //
        //        // var secondMenu = '<div class="second-menu"><img class="avatar" src="img/avatar/' + data.id + '.jpg"></div>';
        //        var path = <?//=base_url().'uploads/human_resources/emp_photo/thumbs/'?>//;
        //        var secondMenu = '<div class="second-menu"><img class="avatar" src="'+path+data.img+'"></div>';
        //        $node.append(secondMenuIcon).append(secondMenu);
        //    }
        //});

    });
</script>


