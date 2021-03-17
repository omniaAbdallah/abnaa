
<link rel = "stylesheet" href = "<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic-theme.min.css" />
<link rel = "stylesheet" href = "<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic.min.css" />
<link rel = "stylesheet" href = "<?php echo base_url()?>asisst/admin_asset/css/font-awesome.min.css" >
<link rel = "stylesheet" href = "<?php echo base_url()?>asisst/admin_asset/css/style.css" >
<link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/style22.css">

<style type="text/css">
    .cover-page {
        min-height: 480px;
    }
    .print_forma{
        border:1px solid ;
        padding: 15px;
    }
    .print_forma table th{
        text-align: right;
    }
    .print_forma table tr th{
        vertical-align: middle;
    }
    .body_forma{
        margin-top: 40px;
    }
    .no-padding{
        padding: 0;
    }
    .heading{
        font-weight: bold;
        text-decoration: underline;
    }
    .print_forma hr{
        border-top: 1px solid #000;
        margin-top: 7px;
        margin-bottom: 7px;
    }

    .myinput.large{
        height:22px;
        width: 22px;
    }

    .myinput.large[type="checkbox"]:before{
        width: 20px;
        height: 20px;
    }
    .myinput.large[type="checkbox"]:after{
        top: -20px;
        width: 16px;
        height: 16px;
    }
    .checkbox-statement span{
        margin-right: 3px;
        position: absolute;
        margin-top: 5px;
    }
    .header p{
        margin: 0;
    }
    .header img{
        height: 90px;
    }
    .no-border{
        border:0 !important;
    }
    .table-devices tr td{
        width: 30%;
        min-height: 20px
    }
    .gray_background{
        background-color: #eee;

    }
    table.th-no-border th,
    table.th-no-border td
    {
        border-top: 0 !important;
    }

    @media all {
        .page-break	{ display: none; }
    }

    @media print {
        .page-break	{ display: block; page-break-before: always; }
    }
    th {
        background-color: #e6eed5;
        color: #333;
    }

    .title-top {
        padding: 8px;
        background-color: #1e65a2;
        color: #fff;
        border-radius: 5px;
        font-size: 18px;
    }
    .specific_style{

        background-color: #658e1a !important;
        color: white;
    }

    .specific_style_2{
        width: 280px;
        background-color: white;
        color: red;
        border: 1px solid #658e1a;
    }

</style>
<div id="printdiv">
    <div class="col-xs-12 no-padding" >
        <div class="panel panel-default" style="height: 45px;">
            <!--<div class="panel-heading panel-title"><?=$title;?></div>-->
            <div class="panel-heading">
                <div class="panel-title">
                    <h4> الموظفيين</h4>
                </div>
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
                                                                <div class="our-team fadeInDown animated delay-1s" >
                                                                    <?php  if (!empty($record->emp_Edara)){?>
                                                                        <div class="pic">
                                                                            <img src="<?=base_url().'uploads/human_resources/emp_photo/thumbs/'.$record->emp_Edara[0]->personal_photo?>"
                                                                                 onerror="this.src=<?=base_url().'asisst/web_asset/img/logo_default.png'?>" alt="">
                                                                        </div>
                                                                        <div class="team-content">
                                                                            <a  href="#" data-toggle="modal" data-target="#modal_employees"
                                                                                style="color: #1288cd;" onclick="get_all_employees(<?=$record->emp_Edara[0]->qsm_id?>);">
                                                                                <span class="fa fa-users"></span> أسماء الموظفيين
                                                                            </a>
                                                                            <h3 class="title"><?php  echo 'الأستاذ/ة' ." : ". $record->emp_Edara[0]->employee; ?>
                                                                            </h3>

                                                                            <h6 class="dawra-style"><i class="fa fa-tasks" aria-hidden="true"></i><?php echo $record->emp_Edara[0]->qsm_n; ?></h6>
                                                                            <h6 class="dawra-style"><i class="fa fa-phone" aria-hidden="true"></i><?=$record->emp_Edara[0]->tahwela_rkm?></h6>
                                                                            <h6 class="dawra-style"><i class="fa fa-envelope"></i> <?=$record->emp_Edara[0]->email?></h6>

                                                                            <?php if (isset($record->subs)) { ?>
                                                                                <div id="accordion" data-toggle="collapse">
                                                                                    <a class="b-scroll collapse" data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$record->code?>">
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

                                                                            <h3 class="title"> غير محدد</h3>
                                                                            <h6 class="dawra-style"><i class="fa fa-tasks" aria-hidden="true"></i><?=$record->name?></h6>
                                                                            <h6 class="dawra-style"><i class="fa fa-phone" aria-hidden="true"></i></h6>
                                                                            <h6 class="dawra-style"><i class="fa fa-envelope"></i></h6>
                                                                            <?php if (isset($record->subs)) { ?>
                                                                                <div id="accordion<?=$record->code?>" data-toggle="collapse">
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
                                                <div id="collapse<?=$code?>" class="panel-collapse collapse in active">
                                                    <div class="row">
                                                        <div class="col-md-12 col-md-offset-0">
                                                            <?php foreach ($tree as $record) { ?>
                                                                <div class="col-md-3 col-sm-6 ">
                                                                    <div class="our-team fadeInDown animated delay-1s ">
                                                                        <?php  if (!empty($record->emp_Edara)){?>
                                                                            <div class="pic">
                                                                                <img src="<?=base_url().'uploads/human_resources/emp_photo/thumbs/'.$record->emp_Edara[0]->personal_photo?>"
                                                                                     onerror="this.src=<?=base_url().'asisst/web_asset/img/logo_default.png'?>" alt="">
                                                                            </div>
                                                                            <div class="team-content">
                                                                                <a  href="#" data-toggle="modal" data-target="#modal_employees"
                                                                                    style="color: #1288cd;" onclick="get_all_employees(<?=$record->emp_Edara[0]->qsm_id?>);">
                                                                                    <span class="fa fa-users"></span> أسماء الموظفيين
                                                                                </a>
                                                                                <h3 class="title"><?php  echo 'الأستاذ/ة' ." : ". $record->emp_Edara[0]->employee; ?>
                                                                                </h3>

                                                                                <h6 class="dawra-style"><i class="fa fa-tasks" aria-hidden="true"></i><?php echo $record->emp_Edara[0]->qsm_n; ?></h6>
                                                                                <h6 class="dawra-style"><i class="fa fa-phone" aria-hidden="true"></i><?=$record->emp_Edara[0]->tahwela_rkm?></h6>
                                                                                <h6 class="dawra-style"><i class="fa fa-envelope"></i> <?=$record->emp_Edara[0]->email?></h6>

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

                                                                                <h3 class="title"> غير محدد</h3>
                                                                                <h6 class="dawra-style"><i class="fa fa-tasks" aria-hidden="true"></i><?=$record->name?></h6>
                                                                                <h6 class="dawra-style"><i class="fa fa-phone" aria-hidden="true"></i></h6>
                                                                                <h6 class="dawra-style"><i class="fa fa-envelope"></i></h6>
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
</div>



<script >
    var divElements = document . getElementById("printdiv") . innerHTML;
    var oldPage = document . body . innerHTML;
    document . body . innerHTML =
        "<html><head><title></title></head><body style='width: 29.7cm;height: 21cm;'><div id='printdiv'>" +
        divElements + "</div></body>";
    window .print();
</script >

