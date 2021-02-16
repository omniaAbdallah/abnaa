
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
 </style>
 <section class="innerpages">
       
  <article class="page-article">
 
                 <!--<div class="pagetitle">
                     <div class="container">
                         <div class="row">
                             <h2 class="pagetitle"><?=$title?></h2>
                         </div>
                     </div>
                 </div>-->
 <div class="container">

      
 
 <div class="profily">
     <div class="vertical-tabs">
         <ul class="nav nav-tabs nav-tabs-vertical" role="tablist" id="myTabs">
             <li class="nav-item active">
                 <a class="nav-link " data-toggle="tab" href="#pag1" role="tab" aria-controls="pag1">
                     <i class="fa fa-book test" aria-hidden="true"></i>   الخطط التشغلية  </a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" data-toggle="tab" href="#pag2" role="tab" aria-controls="pag2">
                             <i class="fa fa-book test" aria-hidden="true"></i>   <span style="float: left;">الخطط الاستراتيجية</span></a>
             </li>
            
         </ul>
 
 
         <div class="tab-content tab-content-vertical">
       <!----------------------------------------------------الأنظمة واللوائح----------------------------------------->
              <div class="tab-pane active" id="pag1" role="tabpanel">
                 <div id="user-profile-1" class="user-profile ">
 
                     <div class="col-md-12 col-sm-12" style="margin-bottom: 35px;margin-top: 25px;">
                          
                         <div class="col-md-6 col-sm-12">
                             <div class="servicefilter-Wrapper Aleft">
                                 
                                  <button class="btn btn-default" style="background-color: #00713e;color: #fff;"
                                         title="الكل" data-toggle="tab" href="#main_data" role="tab"
                                         aria-controls="main_data">
                                     <i class="ace-icon fa fa-list faa-horizontal animated"></i> الكل
                                 </button>
                                 
                                     <button class="btn btn-default" style="background-color:#c84a3d;color: #fff;"
                                             title=" الخطط التشغلية" data-toggle="tab" href="#system" role="tab" 
                                             aria-controls="job_data">
                                         <i class="ace-icon fa fa-file-text faa-vertical animated"></i>  
                                         الخطط التشغلية
                                     </button>
                                  <button class="btn btn-default" 
                                  style="background-color: #009688;color: #fff;"
                                             title=" الخطط الاستراتيجية" data-toggle="tab" href="#laws" role="tab"
                                             aria-controls="contract_data">
                                         <i class="ace-icon fa fa-file-o faa-shake animated"></i>  الخطط الاستراتيجية
                                     </button>
                                 
                             </div>
                             <div class="clearfix"></div>
                         </div>
                     </div>                      
                         
                     <div class="col-xs-12 col-sm-12">
 
                         <div class="tab-content tab-content-vertical">
                             
           <!----------------------------------------------------الكل----------------------------------------->
 
                             <div class="tab-pane " id="main_data" role="tabpanel">
                                 <div id="regulationsContainer" class="row Rules-wrapper">
                                 <?php  if (isset($plans) && !empty($plans)){   foreach ($plans as $row){ ?>
                                  
                                  <?php  if ( !empty($row->details)){   foreach ($row->details as $record){ ?>
        <div class="tableItem col-md-4 col-sm-6 col-xs-12"><div class="rules-reg-card regulations">
        <a class="rule-clickable-part" >
        <p><span class="icon"><img src="<?= base_url()?>asisst/gam3ia_omomia_asset/img/requlations-icon.png" alt="">
        </span><?=$record->title?></p></a><div class="row"><div class="col-sm-7">
        <span class="date"><i class="fa fa-calendar" aria-hidden="true"></i><?=$record->publishe_date?></span>
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
        </div></div></div></div>
        <?php
                                    }
                                    }
                                    ?>
                                <?php  } } ?>

                                <?php  if (isset($strategy_plans) && !empty($strategy_plans)){   foreach ($strategy_plans as $row){ ?>
                                  
                                  <?php  if ( !empty($row->details)){   foreach ($row->details as $record){ ?>
        <div class=" tableItem2 col-md-4 col-sm-6 col-xs-12"><div class="rules-reg-card rules">
        <a class="rule-clickable-part" >
        <p><span class="icon"><img src="<?= base_url()?>asisst/gam3ia_omomia_asset/img/requlations-icon.png" alt="">
        </span><?=$record->title?></p></a><div class="row"><div class="col-sm-7">
        <span class="date"><i class="fa fa-calendar" aria-hidden="true"></i><?=$record->publishe_date?></span>
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
        
        </div></div></div></div>
        <?php
                                    }
                                    }
                                    ?>
                                <?php  } } ?>
                  </div>

                  
                 <div class="row">
                         <div class="color-index">
                         <span class="index-label regulations-index">الخطط التشغلية  </span>
                             <span class="index-label rules-index"> الخطط الاستراتيجية </span>
                         </div>
                     </div>
                              </div>
                              

 
                               <div class="tab-pane active list-wrapper" id="system" role="tabpanel">
                                   <div id="regulationsContainer" class="row Rules-wrapper">
                                   <?php  if (isset($plans) && !empty($plans)){   foreach ($plans as $row){ ?>
                                  
                                  <?php  if ( !empty($row->details)){   foreach ($row->details as $record){ ?>
        <div class="list-item col-md-4 col-sm-6 col-xs-12"><div class="rules-reg-card regulations">
        <a class="rule-clickable-part" >
        <p><span class="icon"><img src="<?= base_url()?>asisst/gam3ia_omomia_asset/img/requlations-icon.png" alt="">
        </span><?=$record->title?></p></a><div class="row"><div class="col-sm-7">
        <span class="date"><i class="fa fa-calendar" aria-hidden="true"></i><?=$record->publishe_date?></span>
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
        </div></div></div></div>
        <?php
                                    }
                                    }
                                    ?>
                                <?php  } } ?>
                              
                   </div>
                             
         
                 
                 <!-- yaraaraaaaaaaaaaaaaaaaaaa -->
                <!-- <div id="pagination-container"></div>-->
                 <!-- yaraaaaaaaaaaaaaaaaaaaaaa -->
                 <div class="row">
                         <div class="color-index">
                        <span class="index-label regulations-index">الخطط التشغلية  </span>
                             <span class="index-label rules-index"> الخطط الاستراتيجية </span>
                         </div>
                     </div>
                             
                             
                             </div>
                                
  
                          
                                 <div class="tab-pane " id="laws" role="tabpanel">
                                        <div id="regulationsContainer" class="row Rules-wrapper">
                                        <?php  if (isset($strategy_plans) && !empty($strategy_plans)){   foreach ($strategy_plans as $row){ ?>
                                  
                                  <?php  if ( !empty($row->details)){   foreach ($row->details as $record){ ?>
        <div class=" tableItem2 col-md-4 col-sm-6 col-xs-12"><div class="rules-reg-card rules">
        <a class="rule-clickable-part" >
        <p><span class="icon"><img src="<?= base_url()?>asisst/gam3ia_omomia_asset/img/requlations-icon.png" alt="">
        </span><?=$record->title?></p></a><div class="row"><div class="col-sm-7">
        <span class="date"><i class="fa fa-calendar" aria-hidden="true"></i><?=$record->publishe_date?></span>
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
        </div></div></div></div>
        <?php
                                    }
                                    }
                                    ?>
                                <?php  } } ?>
                                     </div>
                             
                            
   
                 
                 <div class="row">
                         <div class="color-index">
                             <span class="index-label regulations-index">الخطط التشغلية  </span>
                             <span class="index-label rules-index"> الخطط الاستراتيجية </span>
                         </div>
                     </div>
                       
                                 </div>
                    
                         </div>
                     </div>
 
                   
                 </div>
             </div>
 
 
  
 
   
               <div class="tab-pane" id="pag2" role="tabpanel">
                 <div id="user-profile-1" class="user-profile ">
 
                     <div class="col-md-12 col-sm-12" style="margin-bottom: 35px;margin-top: 25px;">
                          
                         <div class="col-md-6 col-sm-12">
                             <div class="servicefilter-Wrapper Aleft">
                                 
                                  <button class="btn btn-default"  style="background-color: #00713e;color: #fff;"
                                         title="الكل" data-toggle="tab" href="#main_data2" role="tab"
                                         aria-controls="main_data">
                                     <i class="ace-icon fa fa-list faa-horizontal animated"></i> الكل
                                 </button>
                                 
                                     <button class="btn btn-default" 
                                     style="background-color:#c84a3d;color: #fff;"
                                    
                                             title=" الخطط التشغلية" data-toggle="tab" href="#system2" role="tab"
                                             aria-controls="job_data">
                                         <i class="ace-icon fa fa-file-text faa-vertical animated"></i>  
                                         الخطط التشغلية
                                     </button>
                                  <button class="btn btn-default" style="background-color: #009688;color: #fff;"
                                             title=" الخطط الاستراتيجية" data-toggle="tab" href="#laws2" role="tab"
                                             aria-controls="contract_data">
                                         <i class="ace-icon fa fa-file-o faa-shake animated"></i>  الخطط الاستراتيجية
                                     </button>

                                    
                                 
                             </div>
               
                             <div class="clearfix"></div>
                         </div>
                     </div>                      
                         
                     <div class="col-xs-12 col-sm-12">
 
                         <div class="tab-content tab-content-vertical">
                             
           <!----------------------------------------------------الكل2----------------------------------------->
 
                             <div class="tab-pane " id="main_data2" role="tabpanel">
                                 <div id="regulationsContainer" class="row Rules-wrapper">
                                 <?php  if (isset($plans) && !empty($plans)){   foreach ($plans as $row){ ?>
                                  
                                  <?php  if ( !empty($row->details)){   foreach ($row->details as $record){ ?>
        <div class="tableItem col-md-4 col-sm-6 col-xs-12"><div class="rules-reg-card regulations">
        <a class="rule-clickable-part" >
        <p><span class="icon"><img src="<?= base_url()?>asisst/gam3ia_omomia_asset/img/requlations-icon.png" alt="">
        </span><?=$record->title?></p></a><div class="row"><div class="col-sm-7">
        <span class="date"><i class="fa fa-calendar" aria-hidden="true"></i><?=$record->publishe_date?></span>
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
        </div></div></div></div>
        <?php
                                    }
                                    }
                                    ?>
                                <?php  } } ?>

                                <?php  if (isset($strategy_plans) && !empty($strategy_plans)){   foreach ($strategy_plans as $row){ ?>
                                  
                                  <?php  if ( !empty($row->details)){   foreach ($row->details as $record){ ?>
        <div class=" tableItem2 col-md-4 col-sm-6 col-xs-12"><div class="rules-reg-card rules">
        <a class="rule-clickable-part" >
        <p><span class="icon"><img src="<?= base_url()?>asisst/gam3ia_omomia_asset/img/requlations-icon.png" alt="">
        </span><?=$record->title?></p></a><div class="row"><div class="col-sm-7">
        <span class="date"><i class="fa fa-calendar" aria-hidden="true"></i><?=$record->publishe_date?></span>
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
        </div></div></div></div>
        <?php
                                    }
                                    }
                                    ?>
                                <?php  } } ?>
                  </div>
                                   
      
                  
                 <div class="row">
                 <div class="color-index">
                            <span class="index-label regulations-index">الخطط التشغلية  </span>
                             <span class="index-label rules-index"> الخطط الاستراتيجية </span>
                         </div>
                     </div>
                              </div>
                              

 
                               <div class="tab-pane " id="system2" role="tabpanel">
                                   <div id="regulationsContainer" class="row Rules-wrapper">
                                   <?php  if (isset($plans) && !empty($plans)){   foreach ($plans as $row){ ?>
                                  
                                  <?php  if ( !empty($row->details)){   foreach ($row->details as $record){ ?>
        <div class="tableItem col-md-4 col-sm-6 col-xs-12"><div class="rules-reg-card regulations">
        <a class="rule-clickable-part" >
        <p><span class="icon"><img src="<?= base_url()?>asisst/gam3ia_omomia_asset/img/requlations-icon.png" alt="">
        </span><?=$record->title?></p></a><div class="row"><div class="col-sm-7">
        <span class="date"><i class="fa fa-calendar" aria-hidden="true"></i><?=$record->publishe_date?></span>
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
        </div></div></div></div>
        <?php
                                    }
                                    }
                                    ?>
                                <?php  } } ?>
                   </div>
                             

                 
                 
                 <div class="row">
                         <div class="color-index">
                        <span class="index-label regulations-index">الخطط التشغلية  </span>
                             <span class="index-label rules-index"> الخطط الاستراتيجية </span>
                         </div>
                     </div>
                             
                             
                             </div>
                                
  
      <!----------------------------------------------------اللوائح2----------------------------------------->
                             
                                 <div class="tab-pane active" id="laws2" role="tabpanel">
                                        <div id="regulationsContainer" class="row Rules-wrapper">
                                        <?php  if (isset($strategy_plans) && !empty($strategy_plans)){   foreach ($strategy_plans as $row){ ?>
                                  
                                  <?php  if ( !empty($row->details)){   foreach ($row->details as $record){ ?>
        <div class=" tableItem2 col-md-4 col-sm-6 col-xs-12"><div class="rules-reg-card rules">
        <a class="rule-clickable-part" >
        <p><span class="icon"><img src="<?= base_url()?>asisst/gam3ia_omomia_asset/img/requlations-icon.png" alt="">
        </span><?=$record->title?></p></a><div class="row"><div class="col-sm-7">
        <span class="date"><i class="fa fa-calendar" aria-hidden="true"></i><?=$record->publishe_date?></span>
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
        <div class="modal fade" id="myModal-view-<?= $record->id ?>" tabindex="-1"
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
                                                                    <iframe src="<?= base_url().'gam3ia_omomia/Gam3ia_omomia/read_file_report' .'/'. $record->file?>"
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
                                    }
                                    }
                                    ?>
                                <?php  } } ?>
                                     </div>
                             
                            
       
                 
                 
                 <div class="row">
                         <div class="color-index">
                        <span class="index-label regulations-index">الخطط التشغلية  </span>
                             <span class="index-label rules-index"> الخطط الاستراتيجية </span>
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
      
      
     </article>
 </section>

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