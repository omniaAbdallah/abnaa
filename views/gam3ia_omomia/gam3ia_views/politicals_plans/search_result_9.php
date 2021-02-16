<section class="main_content pbottom-30 ptop-30">
    <div class="container-fluid">

   
   
                
                
        
        
        
         <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                
                     <?php
                        if (isset($reports) && !empty($reports)){
                            $x=1;
                              $i= 0;
                        foreach ($reports as $row){
                             $in='';
                            if($i==0){
                                $in='in';
                            }
                            $i++;
                
                        ?>

                         <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading<?=$row->id?>">
              <div class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $x;?>" aria-expanded="true" aria-controls="collapse<?php echo $x;?>">
                 <i class="more-less glyphicon glyphicon-plus"></i>
                  تقارير عام  <?php echo $row->year;?> م
                </a>
              </div>
            </div>
            <div id="collapse<?php echo $x;?>" class="panel-collapse collapse <?php  echo $in; ?>" role="tabpanel" aria-labelledby="heading<?=$row->id?>">
              <div class="panel-body">
               <?php
                    if (isset($row->details) && !empty($row->details)){
                        foreach ($row->details as $record){ ?>

                            <div class="col-md-4 mbottom-20">
                                <div class="report_item">
                                    <div class="top_icon_name">
                                        <i class="<?= $record->icon?> "></i>
                                        <p><?= $record->title?></p>
                                    </div>
                                
<div class="download-btn-text">
<a   href="<?= base_url()."gam3ia_omomia/Gam3ia_omomia/download_report/".$record->file.'/'.$record->id.'/2'?>" class="pull-left" download><i class="fa fa-download"></i> التحميل</a>


<!-- <a  target="_blank" href="<?= base_url()."gam3ia_omomia/Gam3ia_omomia/read_file_report/".$record->file.'/'.$record->id.'/2'?>"  class="pull-right"><i class="fa fa-eye"></i> معاينة</a> -->

 <!-- modal view -->
 <a   class="pull-right" data-toggle="modal" data-target="#myModal-view_vedio-<?= $row->id ?>">
                                            <i class="fa fa-eye" title=" قراءة"></i> معاينة</a>
 <div class="modal fade" id="myModal-view_vedio-<?= $row->id ?>" tabindex="-1"
                                             role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close"><span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <h4 class="modal-title" id="myModalLabel">الملف</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                    <iframe width="100%" height="500" src="<?= base_url()."gam3ia_omomia/Gam3ia_omomia/read_file_report/".$record->file.'/'.$record->id.'/2'?>" frameborder="0" allowfullscreen></iframe>
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
</div>
  
                                    
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
               </div>
            </div>
          </div>
                        
                        <?php
                        $x++;
                            }
                            }else{ echo '<div class="alert alert-danger">لا توجد بيانات</div>';}
                            ?>

                     
                             </div>



               

        



    </div>
</section> 