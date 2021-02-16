<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.4/pagination.css"/>
<link rel="stylesheet" href="<?php echo base_url()?>asisst/gam3ia_omomia_asset/css/style111.css">
<style>
    body {
        font-family: 'Roboto', sans-serif;
        font-size: 14px;
        line-height: 18px;
        background: #009688;
    }
    .list-wrapper {
        padding: 15px;
        overflow: hidden;
    }
    .list-item {
        border: 1px solid #EEE;
        background: #FFF;
        margin-bottom: 10px;
        padding: 10px;
        box-shadow: 0px 0px 10px 0px #EEE;
    }
    .list-item h4 {
        color: #009688;
        font-size: 18px;
        margin: 0 0 5px;
    }
    .list-item p {
        margin: 0;
    }
    .simple-pagination ul {
        margin: 0 0 20px;
        padding: 0;
        list-style: none;
        text-align: center;
    }
    .simple-pagination li {
        display: inline-block;
        margin-right: 5px;
    }
    .simple-pagination li a,
    .simple-pagination li span {
        color: #666;
        padding: 5px 10px;
        text-decoration: none;
        border: 1px solid #EEE;
        background-color: #FFF;
        box-shadow: 0px 0px 10px 0px #EEE;
    }
    .simple-pagination .current {
        color: #FFF;
        background-color: #009688;
        border-color: #009688;
    }
    .simple-pagination .prev.current,
    .simple-pagination .next.current {
        background: #009688;
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
    font-size: 14px;
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
    position: relative;
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
    width:50%;
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
    width: 50%;
    flex: 0 1 50%;
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
    top: -5px;
    bottom: 0;
    right: 0;
    z-index: 1;
    height: 50px;
    pointer-events: none;
    width: 50%;
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
    right: 50%;
}

.itab-2 .stepwizard-row[data-active="3"]:after {
    right: 50%;
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
</style>
<section class="innerpages">
    <article class="page-article">
        <div class="roundedBox">
            <div class="col-xs-12 no-padding">
                <div class="stepwizard itab-2">
                    <div class="stepwizard-row setup-panel" data-active="1">
                        <div class="tab tab-1 stepwizard-step col-xs-6 no-padding active ">
                            <a href="#pag1" type="button" class="btn obj-tablink btn-default btn-warning">
                                <span>
                                    <i class="fa fa-book test" aria-hidden="true"></i>   الخطط التشغلية
                                    </span></a>
                        </div>
                        <div class="tab tab-2  stepwizard-step col-xs-6 no-padding ">
                            <a href="#pag2" type="button" class="btn btn-default obj-tablink">
                                <span>
                                     <i class="fa fa-book test" aria-hidden="true"></i>الخطط الاستراتيجية
                                    </span></a>
                        </div>
                    </div>
                </div>
                <div class="setup-container">
                    <div class="setup-content" id="pag1">
                
                    <div class="tab-pane active list-wrapper" id="system" role="tabpanel">

<div id="regulationsContainer" class="row Rules-wrapper">

<?php 

 if (isset($plans) && !empty($plans)){  
    foreach ($plans as $row){ ?>

<?php  
    ?>

<div class="list-item col-md-4 col-sm-6 col-xs-12"><div class="rules-reg-card regulations">

<a class="rule-clickable-part" >

<p><span class="icon"><img src="<?= base_url()?>asisst/gam3ia_omomia_asset/img/requlations-icon.png" alt="">

</span><?=$row->title?></p></a><div class="row"><div class="col-sm-7">

<span class="date"><i class="fa fa-calendar" aria-hidden="true"></i><?=$row->publishe_date?></span>

</div><div class="col-sm-5 card-actions">

<a href="<?= base_url()."gam3ia_omomia/Gam3ia_omomia/downloads/".$row->file?>"

class="fa fa-download" title="تحميل المرفقات"></a>

<!-- <a   target="_blank" href="<?= base_url().'gam3ia_omomia/Gam3ia_omomia/read_file_report' .'/'. $row->file?>"

class="fa fa-paperclip" title=" مشاهده المرفقات"></a> -->

<?php

$mehwar_morfaq = $row->file;

if (!empty($mehwar_morfaq)) {

?>

<?php

$type = pathinfo($mehwar_morfaq)['extension'];

$arry_images = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP', 'WMV', 'wmv');

$arr_doc = array('DOC', 'DOCX', 'HTML', 'HTM', 'ODT', 'PDF', 'XLS', 'XLSX', 'ODS', 'PPT', 'PPTX', 'TXT');

if (in_array($type, $arry_images)) {

    ?>

    <?php if (!empty($mehwar_morfaq)) {

        $url = base_url() . 'uploads/files/' . $mehwar_morfaq;

    } else {

        $url = base_url('asisst/fav/apple-icon-120x120.png');

    } ?>

    <a target="_blank" onclick="show_img('<?= $url ?>')">

        <i class=" fa fa-eye"></i>

    </a>

    <?php

} elseif (in_array(strtoupper($type), $arr_doc)) {

    ?>

    <!-- <a href="<?php echo base_url() . 'gam3ia_omomia/Gam3ia_omomia/read_file_report/' . $mehwar_morfaq ?>"

target="_blank">

<i class=" fa fa-eye"></i></a> -->

    <?php if (!empty($mehwar_morfaq)) {

        // $url = base_url() . 'uploads/egtma3at/all_mehwr/' . $mehwar_morfaq;

        $url =base_url().'gam3ia_omomia/Gam3ia_omomia/read_file_report/'.$mehwar_morfaq;

    } else {

        $url = base_url('asisst/fav/apple-icon-120x120.png');

    } ?>

    <a target="_blank" onclick="show_bdf('<?= $url ?>')">

        <i class=" fa fa-eye"></i>

    </a>

    <?php

}

} else {

echo 'لا يوجد';

}

?>

</div></div></div></div>

<?php



?>

<?php  } } ?>

</div>



                                    </div>
                
                
                
                
                    </div>
                    <div class="setup-content" id="pag2">
<div class="tab-pane active" id="laws2" role="tabpanel">

<div id="regulationsContainer" class="row Rules-wrapper">

<?php  if (isset($strategy_plans) && !empty($strategy_plans)){  
    
    foreach ($strategy_plans as $row){ ?>


<div class=" tableItem2 col-md-4 col-sm-6 col-xs-12"><div class="rules-reg-card rules">

<a class="rule-clickable-part" >

<p><span class="icon"><img src="<?= base_url()?>asisst/gam3ia_omomia_asset/img/requlations-icon.png" alt="">

</span><?=$row->title?></p></a><div class="row"><div class="col-sm-7">

<span class="date"><i class="fa fa-calendar" aria-hidden="true"></i><?=$row->publishe_date?></span>

</div><div class="col-sm-5 card-actions">

<a href="<?= base_url()."gam3ia_omomia/Gam3ia_omomia/downloads/".$row->file?>"

class="fa fa-download" title="تحميل المرفقات"></a>

<!-- <a   target="_blank" href="<?= base_url().'gam3ia_omomia/Gam3ia_omomia/read_file_report' .'/'. $row->file?>"

class="fa fa-paperclip" title=" مشاهده المرفقات"></a> -->

<?php

$mehwar_morfaq = $row->file;

if (!empty($mehwar_morfaq)) {

?>

<?php

$type = pathinfo($mehwar_morfaq)['extension'];

$arry_images = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP', 'WMV', 'wmv');

$arr_doc = array('DOC', 'DOCX', 'HTML', 'HTM', 'ODT', 'PDF', 'XLS', 'XLSX', 'ODS', 'PPT', 'PPTX', 'TXT');

if (in_array($type, $arry_images)) {

?>

<?php if (!empty($mehwar_morfaq)) {

$url = base_url() . 'uploads/files/' . $mehwar_morfaq;

} else {

$url = base_url('asisst/fav/apple-icon-120x120.png');

} ?>

<a target="_blank" onclick="show_img('<?= $url ?>')">

<i class=" fa fa-eye"></i>

</a>

<?php

} elseif (in_array(strtoupper($type), $arr_doc)) {

?>

<!-- <a href="<?php echo base_url() . 'gam3ia_omomia/Gam3ia_omomia/read_file_report/' . $mehwar_morfaq ?>"

target="_blank">

<i class=" fa fa-eye"></i></a> -->

<?php if (!empty($mehwar_morfaq)) {

// $url = base_url() . 'uploads/egtma3at/all_mehwr/' . $mehwar_morfaq;

$url =base_url().'gam3ia_omomia/Gam3ia_omomia/read_file_report/'.$mehwar_morfaq;

} else {

$url = base_url('asisst/fav/apple-icon-120x120.png');

} ?>

<a target="_blank" onclick="show_bdf('<?= $url ?>')">

<i class=" fa fa-eye"></i>

</a>

<?php

}

} else {

echo 'لا يوجد';

}

?>

<!-- modal view -->

<div class="modal fade" id="myModal-view-<?= $row->id ?>" tabindex="-1"

role="dialog" aria-labelledby="myModalLabel">

<div class="modal-dialog modal-lg" role="document">

<div class="modal-content">

<div class="modal-header">

<button type="button" class="close" data-dismiss="modal"

aria-label="Close"><span aria-hidden="true">&times;</span>

</button>

<h4 class="modal-title" id="myModalLabel">معاينة</h4>

</div>

<div class="modal-body">

<iframe src="<?= base_url().'gam3ia_omomia/Gam3ia_omomia/read_file_report' .'/'. $row->file?>"

style="width: 100%; height:  640px;"

frameborder="0">

</iframe>

<!--                                                                    <img src="--><?//= base_url().'uploads/images' .'/'. $row->main_image?><!--"-->

<!--                                                                         width="100%" alt="">-->

</div>

<div class="modal-footer">

<button type="button" class="btn btn-default" data-dismiss="modal">

إغلاق

</button>

</div>

</div>

</div>

</div>

<!-- modal view -->

</div></div></div></div>

<?php


?>

<?php  } } ?>

</div>


</div> 
            
            
            
            
            
            
            
            
            
            
            
            
            
                    </div>

                </div>
            </div>
        </div>
    </article>
</section>

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
                if (datactive < 2) {
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
                if (datactive <= 2) {
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.js"></script>
<!--  <script src=" https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.5/pagination.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<script type="text/javascript" >
    var items = $(".list-wrapper .list-item");
    var numItems = items.length;
    var perPage = 6;
    items.slice(perPage).hide();
    $('#pagination-container').pagination({
        items: numItems,
        itemsOnPage: perPage,
        prevText: "&laquo;",
        nextText: "&raquo;",
        onPageClick: function (pageNumber) {
            var showFrom = perPage * (pageNumber - 1);
            var showTo = showFrom + perPage;
            items.hide().slice(showFrom, showTo).show();
        }
    });
</script>
<script>
    function show_img(src) {
        var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
        WinPrint.document.write('<img src="' + src + '" style="width: 100%; height:  100%;">');
        WinPrint.document.close();
        WinPrint.focus();
    }
</script>
<script>
    function show_bdf(src) {
        var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
        WinPrint.document.write('<iframe src="' + src + '" style="width: 100%; height:  100%;" frameborder="0"></iframe>');
        WinPrint.document.close();
        WinPrint.focus();
    }
</script>