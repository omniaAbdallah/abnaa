<div class="scene scene--card">
    <div style="margin-bottom: 5px !important;" class="card">
        <div class="card__face card__face--front">
            <div class="tabs-bord">
                <div class="our-team " style="height: 393px !important;">
                    <div class="pic">
                        <img src="<?= base_url() ?>/uploads/human_resources/emp_photo/thumbs/<?php echo $basic_data->personal_photo; ?>"
                             alt="">
                    </div>
                     <h6 style="text-align: center;" class="dawra-style">
                           
    <i class="fa fa-phone" title="<?php echo $basic_data->tahwela_rkm; ?>"></i>
<!--                          add after  -->
    <i class="fa fa-edit" title="تعديل البروفيل"  onclick="window.location='<?= base_url()."maham_mowazf/basic_data/Maham/edit_profile"?>'"></i>
</h6>
                    <div class="team-content"><h3 class="title"><?php echo $basic_data->employee; ?></h3>
                        <h6 style="text-align: center;" class="dawra-style">
                            <span><?php echo $basic_data->mosma_wazefy_n; ?>  </span>
                        </h6>
                        <h6 style="text-align: center;" class="dawra-style">
                            <i class="fa fa-briefcase" title="<?php echo $basic_data->edara_n; ?>"></i>
                            <i class="fa fa-user-o" title="<?php echo $basic_data->edara_n; ?>"></i>
                            <i class="fa fa-phone" title="<?php echo $basic_data->tahwela_rkm; ?>"></i>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="card__face card__face--back">
            <div class="tabs-bord">
                <div class="our-team ">
                    <div class="team-content">
                        <h6 class="dawra-style"><i class="fa fa-credit-card "></i> <span
                                style="padding-right: 5px;"> الرقم الوظيفي	:<?php echo $basic_data->emp_code; ?></span>
                        </h6>
                        <h6 class="dawra-style"><i class="fa fa-phone" aria-hidden="true"></i> <span
                                style="padding-right: 5px;"> 102 </span></h6>
                        <h6 class="dawra-style"><i class="fa fa-mobile "></i><span style="padding-right: 5px;">رقم الجوال	:  <?php echo $basic_data->phone; ?></span>
                        </h6>
                        <h6 class="dawra-style"><i class="fa fa-credit-card "></i><span
                                style="padding-right: 5px;"> رقم الهوية	:  <?php echo $basic_data->card_num; ?></span>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
        <!--
        </div>
        </div>
         -->
        <script>var card = document.querySelector('.card');
            card.addEventListener('click', function () {
                card.classList.toggle('is-flipped');
            });</script>
        <!-- end card --->
    </div>
</div>