 <!-- yaraaaaaaaaaaaaaaaaaaaaa_start -->
 <div class="col-md-12">       
                    <div class="panel panel-default">
                        <div class="panel-body">
                  <div class="col-md-12 all_cont" style="margin-top: 15px;">
<div class="profily">
    <div class="vertical-tabs">
        <div class="tab-content tab-content-vertical">
             <div class="tab-pane active" id="pag2" role="tabpanel">
                <div id="user-profile-1" class="user-profile ">
                    <div class="col-md-12">
                        <div class="sidebar-shortcuts" id="sidebar-shortcuts">
                            <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                                    <button class="btn btn-default" style="background-color: #0088b1;color: #fff;" title="اللوائح" data-toggle="tab" href="#job_data1" role="tab" aria-controls="job_data">
                                        <i class="ace-icon fa fa-clipboard  faa-vertical animated"></i>  
                                        اللوائح
                                    </button>
                                    <button class="btn btn-default" style="background-color: #da9300;color: #fff;" title="السياسات" data-toggle="tab" href="#contract_data1" role="tab" aria-controls="contract_data">
                                        <i class="ace-icon fa fa-book faa-shake animated"></i>   السياسات
                                    </button>
                                    <button class="btn btn-default" style="background-color: #E5343D;color: #fff;" title=" الخطة التشغيلية" data-toggle="tab" href="#Finance_data1" role="tab" aria-controls="Finance_data">
                                        <i class="ace-icon fa fa-sitemap faa-passing animated"></i>   الخطة التشغيلية
                                    </button>
                                    <button class="btn btn-default" style="background-color: #50ab20;color: #fff;" title="   المهام الوظيفية" data-toggle="tab" href="#work_data1" role="tab" aria-controls="work_data">
                                        <i class="ace-icon fa fa-cogs  faa-burst animated"></i>   المهام الوظيفية
                                    </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="tab-content tab-content-vertical">
                                    <div class="tab-pane active" id="job_data1" role="tabpanel">
                                        <div class="col-md-12">
<div id="regulationsContainer" >
<?php  if (isset($sysa) && !empty($sysa)){   foreach ($sysa as $record){ ?>
                                                <div class=" tableItem2 col-md-4 col-sm-6 col-xs-12" ><div class="rules-reg-card rules">
                                                        <a class="rule-clickable-part" >
                                                            <p><span class="icon"><img src="<?= base_url()?>asisst/gam3ia_omomia_asset/img/requlations-icon.png" alt="">
                                  </span> <?=$record->title?></p></a><div class="row"><div class="col-sm-7">
                                                                <span class="date"><i class="fa fa-calendar" aria-hidden="true"></i> <?=$record->publishe_date?></span>
                                                            </div><div class="col-sm-5 card-actions">
                                                                <a href="<?= base_url()."maham_mowazf/basic_data/Maham/downloads/".$record->file?>"
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
                                                                        <?php if (!empty($mehwar_morfaq)) {
                                                                            $url =base_url().'maham_mowazf/basic_data/Maham/read_file_report/'.$mehwar_morfaq;
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
                                        </div>
                            </div>
                                <div class="tab-pane " id="contract_data1" role="tabpanel">
                                        <div class="col-md-12">
<div id="regulationsContainer" >
<?php  if (isset($system) && !empty($system)){   foreach ($system as $record){ ?>
                                                <div class="tableItem col-md-4 col-sm-6 col-xs-12"><div class="rules-reg-card regulations">
                                                        <a class="rule-clickable-part" >
                                                            <p><span class="icon"><img src="<?= base_url()?>asisst/gam3ia_omomia_asset/img/requlations-icon.png" alt="">
                                  </span><?=$record->title?></p></a><div class="row"><div class="col-sm-7">
                                                                <span class="date"><i class="fa fa-calendar" aria-hidden="true"></i> <?=$record->publishe_date?></span>
                                                            </div><div class="col-sm-5 card-actions">
                                                                <a href="<?= base_url()."maham_mowazf/basic_data/Maham/downloads/".$record->file?>"
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
                                                                        <?php if (!empty($mehwar_morfaq)) {
                                                                            // $url = base_url() . 'uploads/egtma3at/all_mehwr/' . $mehwar_morfaq;
                                                                            $url =base_url().'maham_mowazf/basic_data/Maham/read_file_report/'.$mehwar_morfaq;
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
                                        </div>
                                </div>
                                <div class="tab-pane " id="Finance_data1" role="tabpanel">
                                        <div class="col-md-12 center">
                                 
                                 
                                 <div class="syst">
<p><i class="fa fa-file-pdf-o" style="color: #B1090A;font-size: 26px;"></i>  الخطة التشغيلية لعام 2021م </p>

<a class="download"  href="<?= base_url()."maham_mowazf/basic_data/Maham/downloads_maham/EmplyeePlan_2021.pdf"?>"
   class="" title="تحميل "> 
 <i class="fa fa-download" aria-hidden="true"></i>
  
   </a>
&nbsp;&nbsp;&nbsp;


        
        <? $url =base_url().'maham_mowazf/basic_data/Maham/read_file_maham/EmplyeePlan_2021.pdf';?>
        <a class="btn btn-primary" target="_blank" onclick="show_bdf('<?= $url ?>')">
            <i class=" fa fa-eye"></i>
        </a>
      
</div>
                                 
                                 
                                        </div>
                                </div>
                                <div class="tab-pane" id="work_data1" role="tabpanel">
                                    <div class="col-md-12 text-center" style="margin-top: 30px;">
                                            <?php if(isset($mahma_wazefya)&&!empty($mahma_wazefya))
                                            {?>
                                            <div class="col-md-3 ">
                                <div class="syst">
                                    <p><i class="fa fa-file-pdf-o" style="color: #B1090A;font-size: 26px;"></i>  <?php echo $mahma_wazefya[0]->title?> </p>
        <!-- <a class="download" href="pdf/1.pdf" download=""><i class="fa fa-download"></i> تحميل  </a> -->
        <a class="download"  href="<?= base_url()."maham_mowazf/basic_data/Maham/downloads_maham/".$mahma_wazefya[0]->file?>"
                                                                   class="fa fa-download" title="تحميل "> 
                                                                   تحميل
                                                                   </a>
                                    &nbsp;&nbsp;&nbsp;
 <?php
                                                                $mehwar_morfaq = $mahma_wazefya[0]->file;
                                                                if (!empty($mehwar_morfaq)) {
                                                                    ?>
                                                                    <?php
                                                                    $type = pathinfo($mehwar_morfaq)['extension'];
                                                                    $arry_images = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP', 'WMV', 'wmv');
                                                                    $arr_doc = array('DOC', 'DOCX', 'HTML', 'HTM', 'ODT', 'PDF', 'XLS', 'XLSX', 'ODS', 'PPT', 'PPTX', 'TXT');
                                                                    if (in_array($type, $arry_images)) {
                                                                        ?>
                                                                        <?php if (!empty($mehwar_morfaq)) {
                                                                            $url = base_url() . 'uploads/human_resources/job_title/' . $mehwar_morfaq;
                                                                        } else {
                                                                            $url = base_url('asisst/fav/apple-icon-120x120.png');
                                                                        } ?>
                                                                        <a target="_blank" onclick="show_img('<?= $url ?>')">
                                                                            <i class=" fa fa-eye"></i>
                                                                        </a>
                                                                        <?php
                                                                    } elseif (in_array(strtoupper($type), $arr_doc)) {
                                                                        ?>
                                                                        <?php if (!empty($mehwar_morfaq)) {
                                                                            $url =base_url().'maham_mowazf/basic_data/Maham/read_file_maham/'.$mehwar_morfaq;
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
                                </div>
                            </div>
                            <?php }?>      
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
                    </div>
                </div>
</div>