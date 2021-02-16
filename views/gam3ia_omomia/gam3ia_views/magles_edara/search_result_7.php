<?php
           
           if (isset($all_members) && !empty($all_members)){ 
                          foreach ($all_members as $record){
               ?>
               
                 <div class="managment_member col-sm-6 col-xs-12 padding-4">
                       <div class="col-sm-4 text-center col-xs-12 no-padding">
           
                           <img  style="
               width: 162px;
           " src="https://abnaa-sa.org/uploads/md/gam3ia_omomia_members/<?=$record->details_edow->mem_img?>" onerror="this.src='<?=base_url()."asisst/web_asset/img/logo_default.png"?>'"  class="img-circle">
                       </div>
                       <div class="col-sm-8 col-xs-12 padding-4">
                       
                       
                           <h4 style="color: #053498 !important;" class="text-center">
                           
                            <?php
                               echo $record->mansp_title;
                            
                               ?>
                          
                              
                           </h4>
                           <h4 style="font-weight: 600; color: #002542;font-size: 15px;"> <?= $record->details_edow->laqb_title?>  /  <?= $record->details_edow->name?> </h4>
           <!--
                           <p class="droid"> <i style="font-size: 38px !important;" class="fa fa-mobile"></i> <?= $record->details_edow->jwal?></p>
                           -->
                           <p  style="font-weight:bold;float: left !important;line-height: 39px !important; ">
                           <a class="fade-icon droid" style="font-size: 18px;"> <i class="fa fa-envelope-o"></i> <?= $record->details_edow->email?></a>
                           </p>
                           
                       </div>
                   </div> 
               
           <?php 
           }
           }else{ echo '<div class="alert alert-danger">لا توجد بيانات</div>';}?>

     
