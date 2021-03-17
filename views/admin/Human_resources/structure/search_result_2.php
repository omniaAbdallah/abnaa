<link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/style22.css">

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

            <a target="_blank" href="<?=base_url()?>human_resources/Structure/print_result/2"  >
                <i class="fa fa-print" aria-hidden="true"></i> </a>
        </div>

        <div class="panel-body"  >
            <div class="about-boxes" id="about-boxes">
                <div class="tabs-bord">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tab" role="tabpanel">
                                <!-- Tab panes -->
                                <div class="tab-content tabs">
                                    <div role="tabpanel" class="tab-pane fade in active" id="Section1">
                                        <?php
                                        if (isset($tree) && $tree != null) {
                                            //echo "???????<pre>";
                                            //print_r($tree);
                                            //echo "???????</pre>";
                                            buildTree($tree);
                                        }
                                        ?>
                                        <?php
                                        function buildTree($tree)
                                        {
                                            ?>
                                            <div class="row centered">
                                                <div class="col-md-12 col-md-offset-0">
                                                    <?php foreach ($tree as $record) { ?>
                                                        <div class="col-md-3 col-sm-3 "><!--centered-->
                                                            <div class="our-team fadeInDown animated delay-1s">
                                                                <?php  if (!empty($record->name)){?>

                                                                    <div class="team-content">
                                                                        <h6 class="dawra-style"><i class="fa fa-tasks" aria-hidden="true"></i><?php echo $record->name; ?></h6>

                                                                        <?php if (isset($record->subs)) { ?>
                                                                            <div id="accordion" data-toggle="collapse">
                                                                                <a class="b-scroll collapse" data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$record->code?>">
                                                                                    <span class="fa fa-angle-down"></span>
                                                                                </a>
                                                                            </div>
                                                                        <?php } ?>
                                                                    </div>
                                                                <?php }else{ ?>
                                                                    <div class="team-content">

                                                                        <h3 class="title"> غير محدد</h3>
                                                                        <?php if (isset($record->subs)) { ?>
                                                                            <div id="accordion" data-toggle="collapse">
                                                                                <a class="b-scroll collapse" data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$record->code?>">
                                                                                    <span class="fa fa-angle-down"></span>
                                                                                </a>
                                                                            </div>
                                                                        <?php } ?>
                                                                    </div>
                                                                <?php } ?>

                                                            </div>
                                                        </div>
                                                        <?php
                                                        if (isset($record->subs)) {
                                                            sub_buildTree($record->code, $record->subs);
                                                            // buildTree($record->subs);
                                                        }
                                                        ?>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>


                                        <?php
                                        function sub_buildTree($code,$tree)
                                        {
                                            ?>
                                            <div id="collapse<?=$code?>" class="panel-collapse collapse">
                                                <div class="row">
                                                    <div class="col-md-12 col-md-offset-0">
                                                        <?php foreach ($tree as $record) { ?>
                                                            <div class="col-md-3 col-sm-6 ">
                                                                <div class="our-team fadeInDown animated delay-1s ">
                                                                    <?php  if (!empty($record->name)){?>

                                                                        <div class="team-content">
                                                                            <h6 class="dawra-style"><i class="fa fa-tasks" aria-hidden="true"></i><?php echo $record->name; ?></h6>

                                                                            <?php if (isset($record->subs)) { ?>
                                                                                <div id="accordion<?=$record->code?>" data-toggle="collapse">
                                                                                    <a class="b-scroll collapse" data-toggle="collapse" data-parent="#accordion<?=$code?>" href="#collapse<?=$record->code?>">
                                                                                        <span class="fa fa-angle-down"></span>
                                                                                    </a>
                                                                                </div>
                                                                            <?php } ?>
                                                                        </div>

                                                                    <?php }else{ ?>
                                                                        <div class="pic">
                                                                            <img title="" src="https://abnaa-sa.org/asisst/admin_asset/img/avatar5.png" alt="">
                                                                        </div>
                                                                        <div class="team-content">

                                                                            <h3 class="dawra-style"> غير محدد</h3>
                                                                            <?php if (isset($record->subs)) { ?>
                                                                                <div id="accordion<?=$record->code?>" data-toggle="collapse">
                                                                                    <a class="b-scroll collapse" data-toggle="collapse" data-parent="#accordion<?=$code?>" href="#collapse<?=$record->code?>">
                                                                                        <span class="fa fa-angle-down"></span>
                                                                                    </a>
                                                                                </div>
                                                                            <?php } ?>
                                                                        </div>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                            <?php
                                                            if (isset($record->subs)) {
                                                                sub_buildTree($record->code, $record->subs);
                                                                // buildTree($record->subs);
                                                            }
                                                            ?>
                                                            <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
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