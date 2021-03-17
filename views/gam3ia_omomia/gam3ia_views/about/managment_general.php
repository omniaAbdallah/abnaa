    <link rel="stylesheet" href="<?php echo base_url()?>asisst/gam3ia_omomia_asset/css/style22.css">
<div class="col-xs-12 no-padding" >
    <div class="panel panel-default" style="height: 45px;">
        <!--<div class="panel-heading panel-title"><?=$title;?></div>-->
        <div class="panel-body" >

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
                                                            <img src="<?=base_url().'uploads/human_resources/emp_photo/thumbs/'.$manager[0]->emp->personal_photo?>"

                                                                 onerror="this.src=<?=base_url().'asisst/web_asset/img/logo_default.png'?>" alt="">
                                                        </div>
                                                        <div class="team-content">
                                                            <h3 class="title"><?php echo $manager[0]->job_title_name; ?></h3>
                                                            <h6><?php if(isset($manager[0]->laqab) and $manager[0]->laqab !=null){
                                                                    echo $manager[0]->laqab;
                                                                }else{ echo 'الأستاذ/ة'; } ?> / <?php echo $manager[0]->emp_name; ?>
                                                            </h6>
                                                            <h6 class="dawra-style"><i class="fa fa-phone" aria-hidden="true"></i><?=$manager[0]->emp->tahwela_rkm?></h6>
                                                            <h6 class="dawra-style"><i class="fa fa-envelope"></i> <?=$manager[0]->emp->email?></h6>
                                                            <div id="accordion" data-toggle="collapse">
                                                                <a class="b-scroll collapse" data-toggle="collapse" data-parent="#accordion" href="#collapseOne1">
                                                                    <span class="fa fa-angle-down"></span>
                                                                </a>
                                                            </div>
                                                        </div>


                                                    <?php }else{ ?>

                                                        <div class="pic">
                                                            <img title=""
                                                                 src="https://abnaa-sa.org/asisst/admin_asset/img/avatar5.png" alt="">
                                                        </div>
                                                        <div class="team-content">
                                                            <h3 class="title">المدير العام</h3>
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
                                                                <img src="<?=base_url().'uploads/human_resources/emp_photo/thumbs/'.$assistant_manager[0]->emp->personal_photo?>"
                                                                     onerror="this.src=<?=base_url().'asisst/web_asset/img/logo_default.png'?>" alt="">
                                                            </div>
                                                            <div class="team-content">
                                                                <h3 class="title"><?php echo $assistant_manager[0]->job_title_name; ?></h3>
                                                                <h6><?php if(isset($assistant_manager[0]->laqab) and $assistant_manager[0]->laqab !=null){
                                                                        echo $assistant_manager[0]->laqab;
                                                                    }else{ echo 'الأستاذ/ة'; } ?> / <?php echo $assistant_manager[0]->emp_name; ?>
                                                                </h6>
                                                                <h6 class="dawra-style"><i class="fa fa-phone" ></i><?=$assistant_manager[0]->emp->tahwela_rkm?></h6>
                                                                <h6 class="dawra-style"><i class="fa fa-envelope"></i> <?=$assistant_manager[0]->emp->email?></h6>

                                                                <div id="accordion2" data-toggle="collapse">
                                                                    <a class="b-scroll collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapseOne2111">
                                                                        <span class="fa fa-angle-down"></span>
                                                                    </a>
                                                                </div>
                                                            </div>

                                                        <?php }else{ ?>

                                                            <div class="pic">
                                                                <img title=""
                                                                     src="https://abnaa-sa.org/asisst/admin_asset/img/avatar5.png" alt="">
                                                            </div>
                                                            <div class="team-content">
                                                                <h3 class="title"> مساعد المدير العام</h3>
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
                                                    if (isset($all) && !empty($all)){

                                                        foreach ($all as $member){

                                                            ?>
                                                            <div class="col-md-3 col-sm-6 ">
                                                                <div class="our-team fadeInDown animated delay-1s ">
                                                                    <div class="pic">
                                                                        <img src="<?=base_url().'uploads/human_resources/emp_photo/thumbs/'.$member->emp->personal_photo?>"

                                                                             onerror="this.src=<?=base_url().'asisst/web_asset/img/logo_default.png'?>" alt="">
                                                                    </div>
                                                                    <div class="team-content">
                                                                        <h3 class="title"><?php echo $member->job_title_name; ?></h3>
                                                                        <h6><?php if(isset($member->laqab) and $member->laqab !=null){
                                                                                echo $member->laqab;
                                                                            }else{ echo 'الأستاذ/ة'; } ?> / <?php echo $member->emp_name; ?>
                                                                        </h6>
                                                                        <h6 class="dawra-style"><i class="fa fa-phone" aria-hidden="true"></i><?=$member->emp->tahwela_rkm?></h6>
                                                                        <h6 class="dawra-style"><i class="fa fa-envelope"></i> <?=$member->emp->email?></h6>

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

            <!--
            <section class="main_content pbottom-30 ptop-30 " >
                <div class="container-fluid">
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-12 " id="secondDiv">
                        <?php
                        /*echo '<pre>';
                         print_r($all);
                         */
                        if (isset($all) && !empty($all)){
                            ?>
                            <div class="background-white content_page">
                                <?php
                                /*
                                echo '<pre>';
                                print_r($all);*/
                                if (isset($all) && !empty($all)){
                                    foreach ($all as $member){
                                        ?>
                                        <div class="managment_member col-sm-6 col-xs-12">
                                            <div class="col-sm-4 text-center col-xs-12 no-padding">
                                                <img src="<?=base_url().'uploads/human_resources/emp_photo/thumbs/'.$member->emp->personal_photo?>"
                                                     onerror="this.src=<?=base_url().'asisst/web_asset/img/logo_default.png'?>"
                                                     class="img-circle">
                                            </div>
                                            <div class="col-sm-8 col-xs-12 padding-4">
                                                <h4 style="font-size: 17px;font-weight: bold;" class="text-center"><?php echo $member->job_title_name; ?> </h4>
                                                <h4 style="font-size: 17px;font-weight: bold;"  class="text-center" style="font-weight: 600; color: #002542;font-size: 16px;">
                                                    <?php if(isset($member->laqab) and $member->laqab !=null){
                                                        echo $member->laqab;
                                                    }else{
                                                        echo 'الأستاذ/ة';
                                                    } ?>
                                                    / <?php echo $member->emp_name; ?></h4>
                                                <p style="font-size: 17px;font-weight: bold;"  class="inline-block" style="text-align: left;">
                                                    <!--<a class="fade-icon droid" style="float: left;line-height: 40px;font-size: 20px;"><i title="جوال رقم " class="fa fa-mobile"></i><?php echo $member->emp->phone; ?> &nbsp</a>
        --
                                                    <a class="fade-icon droid" style="float: left;line-height: 40px;font-size: 20px;"><i title="تحويلة رقم" class="fa fa-volume-control-phone"></i> <?php echo $member->emp->tahwela_rkm; ?></a>
                                                </p>
                                                <p style="font-size: 17px;font-weight: bold;"   class="inline-block" style="text-align: left;"><a class="fade-icon droid" style="float: left;line-height: 40px;font-size: 18px;"><i title="البريد الإلكتروني" class="fa fa-envelope-o"></i>    <?php echo $member->emp->email; ?></a></p>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </section>

            -->
        </div>
    </div>
</div>