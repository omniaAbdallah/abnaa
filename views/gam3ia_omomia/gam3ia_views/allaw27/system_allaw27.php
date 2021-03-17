<link rel="stylesheet" href="<?php echo base_url()?>asisst/gam3ia_omomia_asset/css/style111.css">
<style>
    
    .row {
    margin-right: -15px;
    margin-left: -15px;
    margin-top: -12px;
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
                                <span><i class="fa fa-book test" aria-hidden="true"></i>السياسات
                                   </span></a>
                        </div>
                        <div class="tab tab-2  stepwizard-step col-xs-6 no-padding ">
                            <a href="#pag2" type="button" class="btn btn-default obj-tablink">
                                <span><i class="fa fa-clipboard test" aria-hidden="true"></i> اللوائح
                                   </span></a>
                        </div>
                    </div>
                </div>
                <div class="setup-container">
                    <!----------------------------------------------------الأنظمة واللوائح----------------------------------------->
                    <div class="setup-content" id="pag1">
                        <div id="user-profile-1" class="user-profile ">
                            <!--<div class="col-md-12 col-sm-12" style="margin-bottom: 35px;margin-top: 25px;">
                                <div class="col-md-6 col-sm-12">
                                    <div class="servicefilter-Wrapper Aleft">
                                        <button class="btn btn-default" style="background-color: #00713e;color: #fff;"
                                                title="الكل" data-toggle="tab" href="#main_data" role="tab"
                                                aria-controls="main_data">
                                            <i class="ace-icon fa fa-list faa-horizontal animated"></i> الكل
                                        </button>
                                        
                                        <button class="btn btn-default" style="background-color:#c84a3d;color: #fff;"
                                                title="السياسات" data-toggle="tab" href="#system" role="tab"
                                                aria-controls="job_data">
                                            <i class="ace-icon fa fa-file-text faa-vertical animated"></i>
                                            السياسات
                                        </button>
                                        <button class="btn btn-default"
                                                style="background-color: #009688;color: #fff;"
                                                title="اللوائح" data-toggle="tab" href="#laws" role="tab"
                                                aria-controls="contract_data">
                                            <i class="ace-icon fa fa-file-o faa-shake animated"></i> اللوائح
                                        </button>
                                  
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>-->
                            <div class="col-xs-12 col-sm-12">
                                <div class="tab-content tab-content-vertical">
                                    <!----------------------------------------------------الكل----------------------------------------->
                                    <div class="tab-pane " id="main_data" role="tabpanel">
                                        <div id="regulationsContainer" class="row Rules-wrapper">
                                            <?php  if (isset($system) && !empty($system)){   foreach ($system as $record){ ?>
                                                <div class="tableItem col-md-4 col-sm-6 col-xs-12"><div class="rules-reg-card regulations">
                                                        <a class="rule-clickable-part" >
                                                            <p><span class="icon"><img src="<?= base_url()?>asisst/gam3ia_omomia_asset/img/requlations-icon.png" alt="">
                                  </span><?=$record->title?></p></a><div class="row"><div class="col-sm-7">
                                                                <span class="date"><i class="fa fa-calendar" aria-hidden="true"></i> <?=$record->publishe_date?></span>
                                                            </div><div class="col-sm-5 card-actions">
                                                                <a href="<?= base_url()."gam3ia_omomia/Gam3ia_omomia/downloads/".$record->file?>"
                                                                   class="fa fa-download" title="تحميل المرفقات"></a>
                                                                <!-- <a   target="_blank" href="<?= base_url().'gam3ia_omomia/Gam3ia_omomia/read_file_report' .'/'. $record->file?>"
                                  class="fa fa-paperclip" title=" مشاهده المرفقات"></a> -->
                                                                <?php
                                                                $mehwar_morfaq = $record->file;
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
                                                                <!-- modal view -->
                                                            </div></div></div></div>
                                            <?php  } } ?>
                                            <?php  if (isset($sysa) && !empty($sysa)){   foreach ($sysa as $record){ ?>
                                                <div class=" tableItem2 col-md-4 col-sm-6 col-xs-12" ><div class="rules-reg-card rules">
                                                        <a class="rule-clickable-part" >
                                                            <p><span class="icon"><img src="<?= base_url()?>asisst/gam3ia_omomia_asset/img/requlations-icon.png" alt="">
                                  </span><?=$record->title?></p></a><div class="row"><div class="col-sm-7">
                                                                <span class="date"><i class="fa fa-calendar" aria-hidden="true"></i> <?=$record->publishe_date?></span>
                                                            </div><div class="col-sm-5 card-actions">
                                                                <a href="<?= base_url()."gam3ia_omomia/Gam3ia_omomia/downloads/".$record->file?>"
                                                                   class="fa fa-download" title="تحميل المرفقات"></a>
                                                                <?php
                                                                $mehwar_morfaq = $record->file;
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
                                                                <!-- modal view -->
                                                            </div></div></div></div>
                                            <?php  } } ?>
                                        </div>
                                        <!--<nav id="pagerContainer" class="Acenter">
                         <ul class="pagination">
                             <li class="first  disabled"><a href="#">
                                 <i class="fa fa-angle-right" aria-hidden="true"></i>
                                 </a>
                             </li>
                             <li class="active">
                                 <a pagenum="1" href="#">1</a>
                             </li>
                             <li>
                                 <a pagenum="2" href="#">2</a>
                             </li>
                             <li>
                                 <a pagenum="3" href="#">3</a>
                             </li>
                             <li class="last "><a href=" #">
 <i class="fa fa-angle-left" aria-hidden="true"></i>
                                 </a>
                             </li>
                     </ul>
                         <div class="pagingInfo">إظهار 1  إلى 20 من  أصل <?=$count_all?></div>
                     </nav>-->
                                        <div class="row">
                                            <div class="color-index">
                                                <span class="index-label regulations-index">لائحة </span>
                                                <span class="index-label rules-index">سياسة </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!----------------------------------------------------الأنظمة----------------------------------------->
                                    <div class="tab-pane active" id="system" role="tabpanel">
                                        <div id="regulationsContainer" class="row Rules-wrapper">
                                            <?php  if (isset($system) && !empty($system)){   foreach ($system as $record){ ?>
                                                <div class="tableItem col-md-4 col-sm-6 col-xs-12"><div class="rules-reg-card regulations">
                                                        <a class="rule-clickable-part" >
                                                            <p><span class="icon"><img src="<?= base_url()?>asisst/gam3ia_omomia_asset/img/requlations-icon.png" alt="">
                                  </span><?=$record->title?></p></a><div class="row"><div class="col-sm-7">
                                                                <span class="date"><i class="fa fa-calendar" aria-hidden="true"></i> <?=$record->publishe_date?></span>
                                                            </div><div class="col-sm-5 card-actions">
                                                                <a href="<?= base_url()."gam3ia_omomia/Gam3ia_omomia/downloads/".$record->file?>"
                                                                   class="fa fa-download" title="تحميل المرفقات"></a>
                                                                <?php
                                                                $mehwar_morfaq = $record->file;
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
                                                                <!-- modal view -->
                                                            </div></div></div></div>
                                            <?php  } } ?>
                                        </div>
                                        <!-- <nav id="pagerContainer" class="Acenter">
                         <ul class="pagination">
                             <li class="first  disabled"><a href="#">
                                 <i class="fa fa-angle-right" aria-hidden="true"></i>
                                 </a>
                             </li>
                             <li class="active">
                                 <a pagenum="1" href="#">1</a>
                             </li>
                             <li>
                                 <a pagenum="2" href="#">2</a>
                             </li>
                             <li>
                                 <a pagenum="3" href="#">3</a>
                             </li>
                             <li class="last "><a href=" #">
 <i class="fa fa-angle-left" aria-hidden="true"></i>
                                 </a>
                             </li>
                     </ul>
                         <div class="pagingInfo">إظهار 1  إلى 20 من  أصل <?=$count_system?></div>
                     </nav> -->
                                        <div class="row">
                                            <div class="color-index">
                                                <span class="index-label regulations-index">لائحة </span>
                                                <span class="index-label rules-index">سياسة </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!----------------------------------------------------اللوائح----------------------------------------->
                                    <div class="tab-pane " id="laws" role="tabpanel">
                                        <div id="regulationsContainer" class="row Rules-wrapper">
                                            <?php  if (isset($sysa) && !empty($sysa)){   foreach ($sysa as $record){ ?>
                                                <div class=" tableItem2 col-md-4 col-sm-6 col-xs-12" ><div class="rules-reg-card rules">
                                                        <a class="rule-clickable-part" >
                                                            <p><span class="icon"><img src="<?= base_url()?>asisst/gam3ia_omomia_asset/img/requlations-icon.png" alt="">
                                  </span> <?=$record->title?></p></a><div class="row"><div class="col-sm-7">
                                                                <span class="date"><i class="fa fa-calendar" aria-hidden="true"></i> <?=$record->publishe_date?></span>
                                                            </div><div class="col-sm-5 card-actions">
                                                                <a href="<?= base_url()."gam3ia_omomia/Gam3ia_omomia/downloads/".$record->file?>"
                                                                   class="fa fa-download" title="تحميل المرفقات"></a>
                                                                <?php
                                                                $mehwar_morfaq = $record->file;
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
                                                                <!-- modal view -->
                                                            </div></div></div></div>
                                            <?php  } } ?>
                                        </div>
                                        <!-- <nav id="pagerContainer" class="Acenter">
                         <ul class="pagination">
                             <li class="first  disabled"><a href="#">
                                 <i class="fa fa-angle-right" aria-hidden="true"></i>
                                 </a>
                             </li>
                             <li class="active">
                                 <a pagenum="1" href="#">1</a>
                             </li>
                             <li>
                                 <a pagenum="2" href="#">2</a>
                             </li>
                             <li>
                                 <a pagenum="3" href="#">3</a>
                             </li>
                             <li class="last "><a href=" #">
 <i class="fa fa-angle-left" aria-hidden="true"></i>
                                 </a>
                             </li>
                     </ul>
                         <div class="pagingInfo">إظهار 1  إلى 20 من  أصل <?=$count_sysa?></div>
                     </nav> -->
                                        <div class="row">
                                            <div class="color-index">
                                                <span class="index-label regulations-index">لائحة </span>
                                                <span class="index-label rules-index">سياسة </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!----------------------------------------------------استطلاع الرأى----------------------------------------->
                    <div class="setup-content" id="pag2">
                        <div id="user-profile-1" class="user-profile ">
                           <!-- <div class="col-md-12 col-sm-12" style="margin-bottom: 35px;margin-top: 25px;">
                                <div class="col-md-6 col-sm-12">
                                    <div class="servicefilter-Wrapper Aleft">
                                        <button class="btn btn-default" style="background-color: #00713e;color: #fff;"
                                                title="الكل" data-toggle="tab" href="#main_data2" role="tab"
                                                aria-controls="main_data">
                                            <i class="ace-icon fa fa-list faa-horizontal animated"></i> الكل
                                        </button>
                                             <button class="btn btn-default" style="background-color:#c84a3d;color: #fff;"
                                                title="السياسات" data-toggle="tab" href="#system2" role="tab"
                                                aria-controls="job_data">
                                            <i class="ace-icon fa fa-file-text faa-vertical animated"></i>
                                            السياسات
                                        </button>
                                        <button class="btn btn-default"
                                                style="background-color: #009688;color: #fff;"
                                                title="اللوائح" data-toggle="tab" href="#laws2" role="tab"
                                                aria-controls="contract_data">
                                            <i class="ace-icon fa fa-file-o faa-shake animated"></i> اللوائح
                                        </button>
                                
                                        
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>-->
                            <div class="col-xs-12 col-sm-12">
                                <div class="tab-content tab-content-vertical">
                                    <!----------------------------------------------------الكل2----------------------------------------->
                                    <div class="tab-pane " id="main_data2" role="tabpanel">
                                        <div id="regulationsContainer" class="row Rules-wrapper">
                                            <?php  if (isset($system) && !empty($system)){   foreach ($system as $record){ ?>
                                                <div class="tableItem col-md-4 col-sm-6 col-xs-12"><div class="rules-reg-card regulations">
                                                        <a class="rule-clickable-part" >
                                                            <p><span class="icon"><img src="<?= base_url()?>asisst/gam3ia_omomia_asset/img/requlations-icon.png" alt="">
                                  </span><?=$record->title?></p></a><div class="row"><div class="col-sm-7">
                                                                <span class="date"><i class="fa fa-calendar" aria-hidden="true"></i> <?=$record->publishe_date?></span>
                                                            </div><div class="col-sm-5 card-actions">
                                                                <a href="<?= base_url()."gam3ia_omomia/Gam3ia_omomia/downloads/".$record->file?>"
                                                                   class="fa fa-download" title="تحميل المرفقات"></a>
                                                                <?php
                                                                $mehwar_morfaq = $record->file;
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
                                                                <!-- modal view -->
                                                            </div></div></div></div>
                                            <?php  } } ?>
                                            <?php  if (isset($sysa) && !empty($sysa)){   foreach ($sysa as $record){ ?>
                                                <div class=" tableItem2 col-md-4 col-sm-6 col-xs-12" ><div class="rules-reg-card rules">
                                                        <a class="rule-clickable-part" >
                                                            <p><span class="icon"><img src="<?= base_url()?>asisst/gam3ia_omomia_asset/img/requlations-icon.png" alt="">
                                  </span><?=$record->title?></p></a><div class="row"><div class="col-sm-7">
                                                                <span class="date"><i class="fa fa-calendar" aria-hidden="true"></i><?=$record->publishe_date?></span>
                                                            </div><div class="col-sm-5 card-actions">
                                                                <a href="<?= base_url()."gam3ia_omomia/Gam3ia_omomia/downloads/".$record->file?>"
                                                                   class="fa fa-download" title="تحميل المرفقات"></a>
                                                                <?php
                                                                $mehwar_morfaq = $record->file;
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
                                                                <!-- modal view -->
                                                            </div></div></div></div>
                                            <?php  } } ?>
                                        </div>
                                        <!--<nav id="pagerContainer" class="Acenter">
                         <ul class="pagination">
                             <li class="first  disabled"><a href="#">
                                 <i class="fa fa-angle-right" aria-hidden="true"></i>
                                 </a>
                             </li>
                             <li class="active">
                                 <a pagenum="1" href="#">1</a>
                             </li>
                             <li>
                                 <a pagenum="2" href="#">2</a>
                             </li>
                             <li>
                                 <a pagenum="3" href="#">3</a>
                             </li>
                             <li class="last "><a href=" #">
 <i class="fa fa-angle-left" aria-hidden="true"></i>
                                 </a>
                             </li>
                     </ul>
                         <div class="pagingInfo">إظهار 1  إلى 20 من  أصل <?=$count_all?></div>
                     </nav>-->
                                        <div class="row">
                                            <div class="color-index">
                                                <span class="index-label regulations-index">لائحة </span>
                                                <span class="index-label rules-index">سياسة </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!----------------------------------------------------الأنظمة2----------------------------------------->
                                    <div class="tab-pane " id="system2" role="tabpanel">
                                        <div id="regulationsContainer" class="row Rules-wrapper">
                                            <?php  if (isset($system) && !empty($system)){   foreach ($system as $record){ ?>
                                                <div class="tableItem col-md-4 col-sm-6 col-xs-12"><div class="rules-reg-card regulations">
                                                        <a class="rule-clickable-part" >
                                                            <p><span class="icon"><img src="<?= base_url()?>asisst/gam3ia_omomia_asset/img/requlations-icon.png" alt="">
                                  </span><?=$record->title?></p></a><div class="row"><div class="col-sm-7">
                                                                <span class="date"><i class="fa fa-calendar" aria-hidden="true"></i> <?=$record->publishe_date?></span>
                                                            </div><div class="col-sm-5 card-actions">
                                                                <a href="<?= base_url()."gam3ia_omomia/Gam3ia_omomia/downloads/".$record->file?>"
                                                                   class="fa fa-download" title="تحميل المرفقات"></a>
                                                                <?php
                                                                $mehwar_morfaq = $record->file;
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
                                                                <!-- modal view -->
                                                            </div></div></div></div>
                                            <?php  } } ?>
                                        </div>
                                        <!-- <nav id="pagerContainer" class="Acenter">
                         <ul class="pagination">
                             <li class="first  disabled"><a href="#">
                                 <i class="fa fa-angle-right" aria-hidden="true"></i>
                                 </a>
                             </li>
                             <li class="active">
                                 <a pagenum="1" href="#">1</a>
                             </li>
                             <li>
                                 <a pagenum="2" href="#">2</a>
                             </li>
                             <li>
                                 <a pagenum="3" href="#">3</a>
                             </li>
                             <li class="last "><a href=" #">
 <i class="fa fa-angle-left" aria-hidden="true"></i>
                                 </a>
                             </li>
                     </ul>
                         <div class="pagingInfo">إظهار 1  إلى 20 من  أصل <?=$count_system?></div>
                     </nav> -->
                                        <div class="row">
                                            <div class="color-index">
                                                <span class="index-label regulations-index">لائحة </span>
                                                <span class="index-label rules-index">سياسة </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!----------------------------------------------------اللوائح2----------------------------------------->
                                    <div class="tab-pane active" id="laws2" role="tabpanel">
                                        <div id="regulationsContainer" class="row Rules-wrapper">
                                            <?php  if (isset($sysa) && !empty($sysa)){   foreach ($sysa as $record){ ?>
                                                <div class=" tableItem2 col-md-4 col-sm-6 col-xs-12" ><div class="rules-reg-card rules">
                                                        <a class="rule-clickable-part" >
                                                            <p><span class="icon"><img src="<?= base_url()?>asisst/gam3ia_omomia_asset/img/requlations-icon.png" alt="">
                                  </span><?=$record->title?></p></a><div class="row"><div class="col-sm-7">
                                                                <span class="date"><i class="fa fa-calendar" aria-hidden="true"></i> <?=$record->publishe_date?></span>
                                                            </div><div class="col-sm-5 card-actions">
                                                                <a href="<?= base_url()."gam3ia_omomia/Gam3ia_omomia/downloads/".$record->file?>"
                                                                   class="fa fa-download" title="تحميل المرفقات"></a>
                                                                <?php
                                                                $mehwar_morfaq = $record->file;
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
                                                                <!-- modal view -->
                                                            </div></div></div></div>
                                            <?php  } } ?>
                                        </div>
                                        <!-- <nav id="pagerContainer" class="Acenter">
                         <ul class="pagination">
                             <li class="first  disabled"><a href="#">
                                 <i class="fa fa-angle-right" aria-hidden="true"></i>
                                 </a>
                             </li>
                             <li class="active">
                                 <a pagenum="1" href="#">1</a>
                             </li>
                             <li>
                                 <a pagenum="2" href="#">2</a>
                             </li>
                             <li>
                                 <a pagenum="3" href="#">3</a>
                             </li>
                             <li class="last "><a href=" #">
 <i class="fa fa-angle-left" aria-hidden="true"></i>
                                 </a>
                             </li>
                     </ul>
                         <div class="pagingInfo">إظهار 1  إلى 20 من  أصل <?=$count_sysa?></div>
                     </nav> -->
                                        <div class="row">
                                            <div class="color-index">
                                                <span class="index-label regulations-index">لائحة </span>
                                                <span class="index-label rules-index">سياسة </span>
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
                if (datactive < 3) {
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
                if (datactive <= 3) {
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