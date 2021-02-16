

 <link rel="stylesheet" href="<?php echo base_url()?>asisst/gam3ia_omomia_asset/css/style111.css"> 
 
 <section class="innerpages">
       
  <article class="page-article">
 <!--
                 <div class="pagetitle">
                     <div class="container">
                         <div class="row">
                             <h2 class="pagetitle"><?=$title;?></h2>
                         </div>
                     </div>
                 </div>-->
 <div class="container">
  
      
 
 <div class="profily">
     <div class="vertical-tabs">
         <ul class="nav nav-tabs nav-tabs-vertical" role="tablist" id="myTabs">
             <li class="nav-item active">
                 <a class="nav-link " data-toggle="tab" href="#pag1" role="tab" aria-controls="pag1">
                     <i class="fa fa-book test" aria-hidden="true"></i>  اللوائح</a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" data-toggle="tab" href="#pag2" role="tab" aria-controls="pag2">
                     
                             <i class="fa fa-clipboard test" aria-hidden="true"></i>   السياسات</a>
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
                                             title="اللوائح" data-toggle="tab" href="#system" role="tab"
                                             aria-controls="job_data">
                                         <i class="ace-icon fa fa-file-text faa-vertical animated"></i>  
                                         اللوائح
                                     </button>
                                  <button class="btn btn-default" 
                                  style="background-color: #009688;color: #fff;"
                                             title="السياسات" data-toggle="tab" href="#laws" role="tab"
                                             aria-controls="contract_data">
                                         <i class="ace-icon fa fa-file-o faa-shake animated"></i> السياسات
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
                                 <?php  if (isset($system) && !empty($system)){   foreach ($system as $record){ ?>
                                  
                                 
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
                              
           <!----------------------------------------------------الأنظمة----------------------------------------->
 
                               <div class="tab-pane active" id="system" role="tabpanel">
                                   <div id="regulationsContainer" class="row Rules-wrapper">
                                   <?php  if (isset($system) && !empty($system)){   foreach ($system as $record){ ?>
                                  
                                 
                                  <div class="tableItem col-md-4 col-sm-6 col-xs-12"><div class="rules-reg-card regulations">
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
 
               <div class="tab-pane" id="pag2" role="tabpanel">
                 <div id="user-profile-1" class="user-profile ">
 
                     <div class="col-md-12 col-sm-12" style="margin-bottom: 35px;margin-top: 25px;">
                          
                         <div class="col-md-6 col-sm-12">
                             <div class="servicefilter-Wrapper Aleft">
                                 
                                  <button class="btn btn-default" style="background-color: #00713e;color: #fff;"
                                         title="الكل" data-toggle="tab" href="#main_data2" role="tab"
                                         aria-controls="main_data">
                                     <i class="ace-icon fa fa-list faa-horizontal animated"></i> الكل
                                 </button>
                                 
                                     <button class="btn btn-default" style="background-color:#c84a3d;color: #fff;"
                                             title="اللوائح" data-toggle="tab" href="#system2" role="tab"
                                             aria-controls="job_data">
                                         <i class="ace-icon fa fa-file-text faa-vertical animated"></i>  
                                         اللوائح
                                     </button>
                                  <button class="btn btn-default" 
                                  style="background-color: #009688;color: #fff;"
                                             title="السياسات" data-toggle="tab" href="#laws2" role="tab"
                                             aria-controls="contract_data">
                                         <i class="ace-icon fa fa-file-o faa-shake animated"></i> السياسات
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
                                 <?php  if (isset($system) && !empty($system)){   foreach ($system as $record){ ?>
                                  
                                 
                                  <div class="tableItem col-md-4 col-sm-6 col-xs-12"><div class="rules-reg-card regulations">
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
 
 </div>
      
      
     </article>
 </section>
  

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