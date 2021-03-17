


<?php
if (isset($all_members) && !empty($all_members)){

?>
<div class="about-boxes" id="about-boxes">
    <div class="tabs-bord">
        <div class="row">
            <div class="col-md-12">
                <div class="tab" role="tabpanel">
                    <!-- Tab panes -->
                    <div class="tab-content tabs">
                        <div role="tabpanel" class="tab-pane fade in active" id="Section1">
                            <div class="row level1">
                                <div class="col-md-6 col-sm-6 centered">
                                    <div class="our-team fadeInDown animated delay-1s">
                                        <?php if(!empty($manager)){
                                            ?>

                                            <div class="pic">
                                                <img src="https://abnaa-sa.org/uploads/md/gam3ia_omomia_members/<?=$manager[0]->details_edow->mem_img?>"
                                                     onerror="this.src='<?=base_url()."asisst/web_asset/img/logo_default.png"?>'" alt="">
                                            </div>
                                            <div class="team-content">
                                                <h3 class="title"><?php echo $manager[0]->mansp_title; ?></h3>
                                                <h6><?= $manager[0]->details_edow->laqb_title?>  /  <?= $manager[0]->details_edow->name?></h6>

                                                <h6 class="dawra-style"><i class="fa fa-phone" aria-hidden="true"></i><?=$manager[0]->details_edow->jwal?></h6>
                                                <h6 class="dawra-style"><i class="fa fa-envelope"></i> <?=$manager[0]->details_edow->email?></h6>
                                                <div id="accordion" data-toggle="collapse">
                                                    <a class="b-scroll collapse" data-toggle="collapse" data-parent="#accordion" href="#collapseOne1">
                                                        <span class="fa fa-angle-down"></span>
                                                    </a>
                                                </div>
                                            </div>


                                        <?php }else{ ?>

                                            <div class="pic">
                                                <img title=""
                                                     onerror="this.src='<?=base_url()."asisst/web_asset/img/logo_default.png"?>'" alt="">
                                            </div>
                                            <div class="team-content">
                                                <h3 class="title">رئيس مجلس الإدارة</h3>
                                                <h6></h6>
                                                <h6 class="dawra-style"><i class="fa fa-phone" aria-hidden="true"></i></h6>
                                                <h6 class="dawra-style"><i class="fa fa-envelope"></i></h6>
                                                <div id="accordion" data-toggle="collapse">
                                                    <a class="b-scroll collapse" data-toggle="collapse" data-parent="#accordion" href="#collapseOne1">
                                                        <span class="fa fa-angle-down"></span>
                                                    </a>
                                                </div>
                                            </div>


                                        <?php } ?>


                                    </div>
                                </div>
                            </div>
                            <div id="collapseOne1" class="panel-collapse collapse">
                                <div class="row level2">
                                    <div class="col-md-6 col-sm-6 centered">
                                        <div class="our-team  fadeInDown animated delay-1s">
                                            <?php if(!empty($assistant_manager)){
                                                ?>

                                                <div class="pic">
                                                    <img src="https://abnaa-sa.org/uploads/md/gam3ia_omomia_members/<?=$assistant_manager[0]->details_edow->mem_img?>"
                                                         onerror="this.src='<?=base_url()."asisst/web_asset/img/logo_default.png"?>'" alt="">
                                                </div>
                                                <div class="team-content">
                                                    <h3 class="title"><?php echo $assistant_manager[0]->mansp_title; ?></h3>
                                                    <h6><?= $assistant_manager[0]->details_edow->laqb_title?>  /  <?= $assistant_manager[0]->details_edow->name?></h6>

                                                    <h6 class="dawra-style"><i class="fa fa-phone" ></i><?=$assistant_manager[0]->details_edow->jwal?></h6>
                                                    <h6 class="dawra-style"><i class="fa fa-envelope"></i> <?=$assistant_manager[0]->details_edow->email?></h6>

                                                    <div id="accordion2" data-toggle="collapse">
                                                        <a class="b-scroll collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapseOne2111">
                                                            <span class="fa fa-angle-down"></span>
                                                        </a>
                                                    </div>
                                                </div>

                                            <?php }else{ ?>

                                                <div class="pic">
                                                    <img title="" onerror="this.src='<?=base_url()."asisst/web_asset/img/logo_default.png"?>'"
                                                         alt="">
                                                </div>
                                                <div class="team-content">
                                                    <h3 class="title">نائب رئيس مجلس الإدارة</h3>
                                                    <h6></h6>
                                                    <h6 class="dawra-style"><i class="fa fa-phone" aria-hidden="true"></i></h6>
                                                    <h6 class="dawra-style"><i class="fa fa-envelope"></i></h6>
                                                    <div id="accordion2" data-toggle="collapse">
                                                        <a class="b-scroll collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapseOne2111">
                                                            <span class="fa fa-angle-down"></span>
                                                        </a>
                                                    </div>
                                                </div>


                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="collapseOne2111" class="panel-collapse collapse">
                                <div class="row">
                                    <div class="col-md-12 col-md-offset-0">
                                        <?php
                                        if (isset($all_members) && !empty($all_members)){

                                            foreach ($all_members as $record){

                                                ?>
                                                <div class="col-md-3 col-sm-6 ">
                                                    <div class="our-team fadeInDown animated delay-1s ">
                                                        <div class="pic">
                                                            <img src="https://abnaa-sa.org/uploads/md/gam3ia_omomia_members/<?=$record->details_edow->mem_img?>"
                                                                 onerror="this.src='<?=base_url()."asisst/web_asset/img/logo_default.png"?>'" alt="">
                                                        </div>
                                                        <div class="team-content">
                                                            <h3 class="title"><?=$record->mansp_title; ?></h3>
                                                            <h6><?= $record->details_edow->laqb_title?>  /  <?= $record->details_edow->name?></h6>
                                                            <h6 class="dawra-style"><i class="fa fa-phone" aria-hidden="true"></i><?=$record->details_edow->jwal?></h6>
                                                            <h6 class="dawra-style"><i class="fa fa-envelope"></i><?= $record->details_edow->email?></h6>

                                                        </div>

                                                    </div>
                                                </div>

                                            <?php }
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

<?php }else{ echo '<div class="alert alert-danger">لا توجد بيانات</div>';}?>




<!--
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
                           <p  style="font-weight:bold;float: left !important;line-height: 39px !important; ">
                           <a class="fade-icon droid" style="font-size: 18px;"> <i class="fa fa-envelope-o"></i> <?= $record->details_edow->email?></a>
                           </p>
                           
                       </div>
                   </div> 
               
           <?php 
           }
           }else{ echo '<div class="alert alert-danger">لا توجد بيانات</div>';}?>

           -->

     
