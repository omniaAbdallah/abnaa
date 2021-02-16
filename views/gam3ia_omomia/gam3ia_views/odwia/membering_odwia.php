<link rel="stylesheet" href="<?= base_url() . 'asisst/web_asset/' ?>css/bootstrap-arabic.min.css"/>
<style>

    img{
        max-width: 100%;
    }
    .no-padding{
        padding: 0;
    }
    .fade-icon i {
        width: 50px;
        height: 50px;
        background-color: #95c63d;
        color: #fff;
        font-size: 30px;
        text-align: center;
        line-height: 50px;
        border-radius: 50%;
    }
    .fade-icon i:after {
        pointer-events: none;
        position: absolute;
        width: 100%;
        height: 100%;
        border-radius: 50%;
        content: '';
        box-sizing: content-box;
        box-shadow: 0 0 0 3px #ffb61e;
        top: 0;
        left: 0;
        opacity: 0;
        transition: 300ms;
    }
    .fade-icon i:hover {
        background-color: #fff;
        color: #95c63d;
    }
    .fade-icon i:hover:after {
        opacity: 1;
        transform: scale(1.15);
    }
    .droid{
        font-family: 'Droid Arabic Kufi';
    }
    /* membering */
    .content_page .paragraph{
        padding: 0px 5px;
      
    }
    .paragraph{
         line-height: 30px;
         color: black;
         font-weight:600; 
    }
     .paragraph p{
        text-align: justify;
        font-size: 16px;
    }
    .content_page .paragraph ol li {
        text-align: justify;
        font-size: 14px;
    }
    .content_page #accordion .panel-default>.panel-heading {
        color: #fff;
        background-color: #eee;
        border-color: #ddd;
        background-image: none;
        padding: 0px 0px;
        width: 99.8%;
    }
    .content_page #accordion .panel-heading .panel-title a {
        font-size: 22px;
        font-weight: 600;
        color: #002542;
    }
    .more-less {
        /* float: right; */
        color: #212121;
        padding: 0px;
        width: 50px;
        height: 50px;
        text-align: center;
        line-height: 50px;
        background-color: #96c73e;
        color: #fff;
        margin-top: -1px;
        border-bottom-left-radius: 10px;
        border-top-left-radius: 10px;
    }
    .panel-heading a:hover {
        color: #fff;
        background-color: #d1d3dc;
    }
    
    
    
    
    .roundedBox {
    display: inline-block;
    width: 100%;
    padding: 10px;
    background-color: #fff;
    border-radius: 10px;
    border: 1px solid #eee;
    box-shadow: -2px 2px 8px #999;
}

.stepwizard-step p {
    margin-top: 0px;
    color: #666;
}

.stepwizard-row {
    display: table-row;
}

.stepwizard {
    display: table;
    width: 100%;
    position: relative;
    border: 0 !important;
    text-transform: uppercase;
    background-color: #585858;
    color: #FFFFFF !important;
    font-size: 14px;border-radius:10px;
}

.stepwizard-step button[disabled] {
    /*opacity: 1 !important;
    filter: alpha(opacity=100) !important;*/
}

.stepwizard .btn.disabled,
.stepwizard .btn[disabled],
.stepwizard fieldset[disabled] .btn {
    opacity: 1 !important;
}

.stepwizard .btn {
    font-size: 16px;
    text-shadow: none;
}

.stepwizard .btn,
.stepwizard .btn.disabled,
.stepwizard .btn[disabled] {
    color: #fff;
    background: transparent;
    border: 0;
    width: 100%;
    display: inline-block;
}

.stepwizard .btn.btn-warning,
.stepwizard .btn.btn-warning:hover,
.stepwizard .btn.btn-warning:focus {
    color: #fff;
    background-color: transparent !important;
    border: 0;
    width: 100%;
    display: inline-block;
}

.stepwizard .btn-default:hover,
.stepwizard .btn-default:focus,
.stepwizard .btn-default:active {
    background-color: transparent !important;
}

.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;margin-right: 16px;
}

.stepwizard-step span {
    position: relative;
    z-index: 2;
}

.setup-container {
    display: inline-block;
    width: 100%;
    margin-bottom: 10px;
}

.setup-content {
    display: none;
}

.setup-content .setup-head {
    /*  height: 290px;*/
    height: 326px;
    overflow: auto;
}

.setup-content .setup-foot {
    height: 30px;
}

.setup-container .setup-content:first-child {
    display: block;
}

.stepwizard-row .moving-tab {
    width:20%;
    height: 42px;
    position: absolute;
    text-align: center;
    padding: 12px;
    font-size: 12px;
    text-transform: uppercase;
    -webkit-font-smoothing: subpixel-antialiased;
    top: -4px;
    right: 0px;
    border-radius: 4px;
    color: #FFFFFF;
    cursor: pointer;
    font-weight: 500;
    background-color: #fcb632;
    box-shadow: 0 9px 7px -10px rgba(244, 221, 54, 0.56), 0 4px 10px 0px rgba(0, 0, 0, 0.12), 0 4px 6px -5px rgba(244, 221, 54, 0.2);
    transition: all 0.5s cubic-bezier(0.29, 1.42, 0.79, 1);
}

.stepwizard-row .btn .badge {
    position: absolute;
    top: -10px;
    right: -30px;
    z-index: 6;
    font-size: 15px;
    color: #fff;
    background-color: transparent;
    border-radius: 50%;
    padding: 4px 8px;
    border: 1px solid #fff;
}

.stepwizard-row .active .badge {
    color: #fff !important;
}

.itab-2 .stepwizard-row {
    position: relative;
    border-radius: .5em;
}

.tabs .stepwizard-row {
    display: flex;
    flex-wrap: nowrap;
    justify-content: space-around;
    width: 100%;
}

.tabs .tab {
    display: block;
    width: 20%;
    flex: 0 1 20%;
    position: relative;
    text-align: center;
    line-height: 2;
    z-index: 1;
}

.itab-2 .tab a {
    position: relative;
    padding: 10px 8px;
}

.tabs a {
    color: #fff;
    text-decoration: none;
    display: block;
}

.itab-2 .stepwizard-row:after {
    content: '';
    position: absolute;
    top: -1px;
    bottom: 0;
    right: 0;
    z-index: 1;
    height: 42px;
    pointer-events: none;
    width: 18%;
    /* background-color: rgba(252, 218, 5, 0.5);*/
    border-radius: .5em;
    -webkit-font-smoothing: subpixel-antialiased;
    background-color: #fcb632;
    box-shadow: 0 9px 7px -10px rgba(244, 221, 54, 0.56), 0 4px 10px 0px rgba(0, 0, 0, 0.12), 0 4px 6px -5px rgba(244, 221, 54, 0.2);
    transition: all 0.5s cubic-bezier(0.29, 1.42, 0.79, 1);
    
    
}

.itab-2 .stepwizard-row[data-active="1"]:after {
    right: 0%;
    
}

.itab-2 .stepwizard-row[data-active="2"]:after {
    right: 20%;
}

.itab-2 .stepwizard-row[data-active="3"]:after {
    right: 37%;
}
    
    .itab-2 .stepwizard-row[data-active="4"]:after {
    right: 53%;
}
    
    .itab-2 .stepwizard-row[data-active="5"]:after {
    right: 72%;
}

.test1 {
    color: #856404;
    background-color: #ffeaa8;
    border-color: #ffeeba;
}
.test {
    margin-left: 5px;
    margin-bottom: -21px;
}
    
    .middle-navbar ul {
    padding: 15px 0px;
    /* background-color: #f7fafc; */
}
    
      @media only screen and (max-width: 768px){ 
        .itab-2 .stepwizard-row:after {
    content: '';
    position: absolute;
    top: -1px;
    bottom: 0;
    right: 0;
    z-index: 1;
    height: 42px;
    pointer-events: none;
    width: 100%;
    /* background-color: rgba(252, 218, 5, 0.5);*/
    border-radius: .5em;
    -webkit-font-smoothing: subpixel-antialiased;
    background-color: #fcb632;
    box-shadow: 0 9px 7px -10px rgba(244, 221, 54, 0.56), 0 4px 10px 0px rgba(0, 0, 0, 0.12), 0 4px 6px -5px rgba(244, 221, 54, 0.2);
    transition: all 0.5s cubic-bezier(0.29, 1.42, 0.79, 1);
    
    
}
.itab-2 .stepwizard-row[data-active="1"]:after {
    top: 0%; 
    
}

.itab-2 .stepwizard-row[data-active="2"]:after {
    top: 20%;right: 0%;
}

.itab-2 .stepwizard-row[data-active="3"]:after {
    top: 40%;right: 0%;
}
    
    .itab-2 .stepwizard-row[data-active="4"]:after {
    top: 60%;right: 0%;
}
    
    .itab-2 .stepwizard-row[data-active="5"]:after {
    top: 80%;right: 0%;
}
         
        .stepwizard-step {
    display: contents;
    text-align: center;
    position: relative;
    margin-right: -7px;
        }}
</style>

<div class="col-xs-12 no-padding" >
    <div class="panel panel-default_" style="height: 45px;">
        <!--<div class="panel-heading panel-title"><?=$title;?></div>-->
        <div class="panel-body" style="/*min-height: 300px;*/">

            <div class="roundedBox">
                <div class="col-xs-12 no-padding">
                    <div class="stepwizard itab-2">

                        <div class="stepwizard-row setup-panel" data-active="1">
                            <?php
                            if (isset($membring) && !empty($membring)){
                            $x=1;
                            foreach ($membring as $row){
                                if($x == 1){
                            ?>
                                <div class="tab tab-<?=$x?>  stepwizard-step col-xs-2 no-padding active">
                                    <a href="#step-<?=$x?>" type="button" class="btn obj-tablink btn-default btn-warning">
                                        <span> <?=$row->title?> </span></a>

                                </div>
                                <?php }else{ ?>

                                <div class="tab tab-<?=$x?>  stepwizard-step col-xs-2 no-padding ">
                                    <a href="#step-<?=$x?>" type="button" class="btn btn-default obj-tablink">
                                        <span> <?=$row->title?> </span></a>

                                </div>

                                <?php
                                }
                                $x++;
                            }

                            }
                            ?>


                        </div>
                    </div>

                    <div class="setup-container">
                        <?php
                        if (isset($membring) && !empty($membring)){
                        $x=1;
                        foreach ($membring as $row){

                        ?>

                        <div class="setup-content" id="step-<?=$x?>">
                            <div class="panel-body">
                                <div class="paragraph">
                                    <p>
                                        <?= nl2br($row->details)?>
                                    </p>
                                </div>
                            </div>
                        </div>

                            <?php
                            $x++;
                        }

                        }
                        ?>


                        <!------------------------------------------------------------->
                    </div>
                </div>
            </div>

            <?php
                    /*
            if (isset($membring) && !empty($membring)){
                $x=1;
                ?>
                <section class="main_content pbottom-30 ptop-30">
                    <div class="container">
                        <div class="col-md-1"></div>
                        <div class="col-md-10 col-sm-8 col-xs-12 ">
                            <div class="background-white content_page">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <?php
                                    $i= 0;
                                    foreach ($membring as $row){
                                        $in='';
                                        if($i==0){
                                            $in='in';
                                        }
                                        $i++;
                                        ?>
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="heading<?=$row->id?>">
                                                <h4 class="panel-title">
                                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $x;?>" aria-expanded="true" aria-controls="collapse<?php echo $x;?>">
                                                        <i class="more-less glyphicon glyphicon-plus"></i>
                                                        <?= $x?>. <?=$row->title?>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse<?php echo $x;?>" class="panel-collapse collapse <?php // echo $in; ?>" role="tabpanel" aria-labelledby="heading<?=$row->id?>">
                                                <div class="panel-body">
                                                    <div class="paragraph">
                                                        <p>
                                                            <?= nl2br($row->details)?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        $x++;
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                </section>
                <?php
            }

            */
            ?>
        </div>
    </div>
</div>



<script type="text/javascript" src="<?php echo base_url(); ?>/asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script src="<?php echo base_url(); ?>/asisst/admin_asset/plugins/icheck/icheck.min.js" type="text/javascript"></script>


<script>
    $(document).ready(function () {
        /*********/
        var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn'),
            allPreviousBtn = $('.previousBtn'),
            SaveBtn = $('.save-btn');
        allWells.hide();

         navListItems.click(function (e) {
            e.preventDefault();
            var $target = $($(this).attr('href')),
                $item = $(this);
            if (!$item.hasClass('disabled')) {
                navListItems.removeClass('btn-warning').addClass('btn-default');
                $item.addClass('btn-warning');
                allWells.hide();
                $target.show();
                $target.find('input:eq(0)').focus();
            }
        });
        /*var $target = $('#step-4'),
            $item = $('a[href="#step-4"]');
        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-warning').addClass('btn-default');
            $item.addClass('btn-warning');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
            $('.stepwizard-row ').attr('data-active', 4);
        }*/
        allNextBtn.click(function () {
            var curStep = $(this).closest(".setup-content"),
                curStepBtn = curStep.attr("id"),
                nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                curInputs = curStep.find("input[type='text'],input[type='url'],select,input[type='number'],input[type='password']"),
                isValid = true;
            var datactive = $('.stepwizard-row ').attr('data-active');
            /*$(".form-group").removeClass("has-error");
            for (var i = 0; i < curInputs.length; i++) {
                if (!curInputs[i].validity.valid) {
                    isValid = false;
                    $(curInputs[i]).closest(".form-group").addClass("has-error");
                }
            }*/
            if (isValid) {
                nextStepWizard.removeAttr('disabled').trigger('click');
                if (datactive < 5) {
                    datactive++;
                    $('.stepwizard-row ').attr('data-active', datactive);
                } else {
                    $('.stepwizard-row ').attr('data-active', 1);
                }
            }
            //$(".stepwizard-row").append($moving_div);
        });
        allPreviousBtn.click(function () {
            var curStep = $(this).closest(".setup-content"),
                curStepBtn = curStep.attr("id"),
                previousStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().prev().children("a"),
                isValid = true;
            var datactive = $('.stepwizard-row ').attr('data-active');
            if (isValid) {
                previousStepWizard.removeAttr('disabled').trigger('click');
                if (datactive <= 5) {
                    datactive--;
                    $('.stepwizard-row ').attr('data-active', datactive);
                } else {
                    $('.stepwizard-row ').attr('data-active', 1);
                }
            }
        });
        $(".setup-content input,.setup-content select").bind("keyup change", function (e) {
            var curStep = $(this).closest(".setup-content"),
                curInputs = curStep.find("input,input[type='text'],input[type='url'],select,input[type='number'],input[type='password']");
            if ($(this).val() != '') {
                $(this).parent().removeClass("has-error");
            } else {
                $(this).parent().addClass("has-error");
            }
        });
        $('div.setup-panel div a.btn-warning').trigger('click');
    });
</script>
<script>
    $(".itab-2").on("click mouseover mouseout", ".tab a", function (e) {
        switch (e.type) {
            case "mouseover": // -----------
                $(this).parent().addClass("hover");
                break;
            case "mouseout": // -----------
                $(this).parent().removeClass("hover");
                break;
            case "click": // -----------
                $(this).parent().addClass("active")
                    .siblings().removeClass("active");
                $(this).parent().parent().attr(
                    "data-active",
                    $(this).parent().index() + 1
                );
                break;
            default: // -----------
                break;
        }
    });
</script>
