<!--<style>-->
<!--    .table-bordered.table-details tbody > tr > td {-->
<!--        font-size: 13px !important;-->
<!--        white-space: pre-line;-->
<!--    }-->
<!--</style>-->


<?php
$person_data = $this->Gam3ia_omomia_model->get_by_member_id($_SESSION['id'], 'id', 'md_all_gam3ia_omomia_members');
$odwia_data = $this->Gam3ia_omomia_model->get_by_member_id($_SESSION['id'], 'member_id_fk', 'md_all_gam3ia_omomia_odwiat');
?>
<div class="col-md-12 no-padding emp_side">


    <div class="imagechange-3d image-hover hover">
        <div class="imagechange-3d-inner">
            <div class="imgchange-1" style="    height: fit-content;">
                <div class="person-card effect-shadow">
                    <div class="card-inner">
                        <div class="square" style="margin-top: 24px;">
                            <div class="pic">
                               <?php
                               if (isset($person_data->mem_img) && !empty($person_data->mem_img)) { ?>
                                <img  alt="<?php if (isset($person_data->name) && !empty($person_data->name)) {
                                    echo  $person_data->name;
                                } ?>"
                                      src="<?php echo base_url() ?>uploads/md/gam3ia_omomia_members/<?php echo $person_data->mem_img; ?>"
                                      onerror="this.src='<?php echo base_url() ?>/asisst/fav/apple-icon-120x120.png'" >
                                <?php } else { ?>
                                <img alt="<?php if (isset($person_data->name) && !empty($person_data->name)) {
                                    echo $person_data->laqb_title ."/". $person_data->name;
                                } ?>"
                                     src="<?php echo base_url() ?>asisst/admin_asset/img/avatar5.png ">
                                <?php }
                               ?>

                            </div>
                        </div>

                        <div class="card-name">
                            <h5 style="font-size: 17px !important ; font-weight: bold !important;">
                                <?php if (isset($person_data->name) && !empty($person_data->name)) {
                                    echo $person_data->laqb_title ."/". $person_data->name;
                                } ?>
                            </h5>
                            <h5 style="color: #382424 !important;" class="career">المسمي الوظيفي :
                                <?php if (isset($person_data->mehna_title) && !empty($person_data->mehna_title)) {
                                    echo $person_data->mehna_title;
                                } ?>
                            </h5>

                        </div>


                        <div class="card-details">
                            <h5 style="color:#10779e !important; font-weight: bold !important;"><span class="spnline"></span><strong></strong>
                                رقم العضوية :
                                <?php if (isset($odwia_data->rkm_odwia_full) && !empty($odwia_data->rkm_odwia_full)) {
                                    echo $odwia_data->rkm_odwia_full;
                                } ?>
                            </h5>
                            <h5 style="color:#10779e !important; font-weight: bold !important;"><span class="spnline"></span><strong></strong>
                                رقم الجوال :
                                <?php if (isset($person_data->jwal) && !empty($person_data->jwal)) {
                                    echo $person_data->jwal;
                                } ?>
                            </h5>
                            <h5 style="color:#10779e !important; font-weight: bold !important;"><span class="spnline"></span><strong></strong>
                                رقم الهوية :
                                <?php if (isset($person_data->card_num) && !empty($person_data->card_num)) {
                                    echo $person_data->card_num;
                                } ?>
                            </h5>

                            <!--<h5 style="color:#10779e !important; font-weight: bold !important;" >
                                <?php if (isset($personal_data)) {
                                    echo $personal_data[0]->depart_name;
                                } ?>
                            </h5>


                            <h5 style=" font-size:17px!important; color:#10779e !important; ">
                                <?php if (isset($personal_data)) {
                                    echo $personal_data[0]->manger_name;
                                } ?>
                            </h5>-->


                        </div>
                    </div>


                </div>
            </div>
            <div class="imgchange-2" style="    height: fit-content;">
                <div class="person-card back-card effect-shadow" style="    min-height: 288px;">
                    <!--<div class="back-body">
                       <!-- <h5 style=" font-size:14px!important; color:#10779e !important; font-weight: bold !important;"><span class="spnline">


                                        <i class="fa fa-id-card" aria-hidden="true"></i> </span>
                        </h5>
                        <h5 style=" font-size:14px!important; color:#10779e !important; font-weight: bold !important;"><span class="spnline">
                                        <i class="fa fa-calendar" aria-hidden="true"></i>


                                       </span>
                        </h5>
                        <h5 style=" font-size:14px!important; color:#10779e !important; font-weight: bold !important;"><span class="spnline">
                                        <i class="fa fa-calendar" aria-hidden="true"></i>


                                       </span>
                        </h5>

                        <h5 style=" font-size:14px!important; color:#10779e !important; font-weight: bold !important;"><span class="spnline">
                                       <i class="fa fa-map-marker" aria-hidden="true"></i>


                                       </span>
                        </h5>


                    </div>-->
                    <h6 style="color: #382424 !important;font-weight: bold !important;text-align: center;margin-top: 109px;">
                        تاريخ بداية الاشتراك :
                        <?php echo date('Y-m-d', $odwia_data->from_date); ?>
                    </h6>
                    <h6 style="color: #382424 !important;font-weight: bold !important;text-align: center;">
                        تاريخ نهاية الاشتراك :
                        <?php echo date('Y-m-d', $odwia_data->to_date); ?>
                    </h6>

                    <h6 style="color: #382424 !important;font-weight: bold !important;text-align: center;">
                        تاريخ التحديث :
                        <?php echo $odwia_data->update_date_m; ?>
                    </h6>
                    <!--
                    <div class="barcode">
                        <strong class="text-danger ">تاريخ بداية الاشتراك : </strong>
                        <br>
                        <?php echo date('Y-m-d', $odwia_data->from_date); ?>
                    </div>
                    <div class="barcode">
                        <strong class="text-danger "> تاريخ نهاية الاشتراك : </strong>
                        <br>
                        <?php echo date('Y-m-d', $odwia_data->to_date); ?>
                    </div>
                    <div class="back-footer">
                        <strong class="text-danger ">تاريخ التحديث : </strong>
                        <br>
                        <?php echo $odwia_data->update_date_m; ?>
                    </div>
                    -->
                </div>
            </div>
        </div>
    </div>


</div>
