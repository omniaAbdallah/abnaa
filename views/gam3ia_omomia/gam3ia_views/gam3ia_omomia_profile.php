
   <div class="col-sm-12 col-md-12 col-xs-12 fadeInUp wow ">
    <div class="panel panel-default">
        <div class="panel-heading panel-title">
        تعديل بيانات حسابى

        </div>
        <div class="panel-body" >
          
                                     
                                
                                
                                
                                <?php
                             //   echo '<pre>'; print_r($result);
                                if (isset($result) && !empty($result)) {
                                    $name = $result->name;
                                    $memb_id = $result->id;
                                    $card_num = $result->card_num;
                                    $gns = $result->gns;
                                    $laqb_fk = $result->laqb_fk;
                                    $gnsia_fk = $result->gnsia_fk;
                                    $hala_egtma3ia_fk = $result->hala_egtma3ia_fk;
                                    $geha_esdar_fk = $result->geha_esdar_fk;
                                    $birth_date_m = $result->birth_date_m;
                                    $jwal = $result->jwal;
                                    $jwal_another = $result->jwal_another;
                                    $madina_fk = $result->madina_fk;
                                    $hai_fk = $result->hai_fk;
                                    $street_name = $result->street_name;
                                    $enwan_watni = $result->enwan_watni;
                                    $email = $result->email;
                                    $daraga_3elmia_fk = $result->daraga_3elmia_fk;
                                    $moahel_3elmi_fk = $result->moahel_3elmi_fk;
                                    $hya_3elmia_fk = $result->hya_3elmia_fk;
                                    $mehna_fk = $result->mehna_fk;
                                    $geha_amal = $result->geha_amal;
                                    $enwan_amal = $result->enwan_amal;
                                    $hatf_amal = $result->hatf_amal;
                                    $map_google_lng = $result->map_google_lng;
                                    $map_google_lat = $result->map_google_lat;
                                    $mem_img = $result->mem_img;
                                    $esdar_date_h = $result->esdar_date_h;
                                    $birth_date_h = $result->birth_date_h;
                                    $note = $result->note;
                                    // yara
                                    $mehna_title= $result->mehna_title;
                                    $moahel_3elmi_title= $result->moahel_3elmi_title;
                                    $geha_esdar_title= $result->geha_esdar_title;
                                    $madina_title= $result->madina_title;
                                    $hai_title= $result->hai_title;
                                    

                                    $array_date = explode("/", $birth_date_h);
                                    if (isset($array_date[2])) {
                                        $age = $current_hijry_year - $array_date[2] . " سنة ";
                                    } else {
                                        $age = "0 سنة";
                                    }
                                    echo '<input type="hidden"  name="id"  id="id" value="' . $result->id . '">';
                                    echo form_open_multipart('gam3ia_omomia/Gam3ia_omomia/update_gam3ia_member/' . $result->id . '', array('class' => 'Electronic_form'));
                                  //  $out['form'] = 'gam3ia_omomia/Gam3ia_omomia/update_gam3ia_member/' . $result->id;
                                    $card_img = $result->card_img;
                                    $morfaqs = array($result->morfaq1, $result->morfaq2, $result->morfaq3, $result->morfaq4);


                                } else {

                                    $name = '';
                                    $memb_id = '';
                                    $card_num = '';
                                    $gns = '';
                                    $laqb_fk = '';
                                    $gnsia_fk = '';
                                    $hala_egtma3ia_fk = '';
                                    $geha_esdar_fk = '';
                                    $birth_date_m = '';
                                    $jwal = '';
                                    $jwal_another = '';
                                    $madina_fk = '';
                                    $hai_fk = '';
                                    $street_name = '';
                                    $enwan_watni = '';
                                    $email = '';
                                    $daraga_3elmia_fk = '';
                                    $moahel_3elmi_fk = '';
                                    $hya_3elmia_fk = '';
                                    $mehna_fk = '';
                                    $geha_amal = '';
                                    $enwan_amal = '';
                                    $hatf_amal = '';
                                    $map_google_lng = '';
                                    $map_google_lat = '';
                                    $mem_img = '';
                                    $esdar_date_h = '';
                                    $birth_date_h = '';
                                    $age = '';
                                    $note = '';
                                    // yara
                                    $mehna_title= '';
                                    $moahel_3elmi_title= '';
                                    $geha_esdar_title= '';
                                    $madina_title= '';
                                    $hai_title= '';
                                    echo form_open_multipart('gam3ia_omomia/Gam3ia_omomia/update_gam3ia_member', array('class' => 'Electronic_form'));
                                    //$out['form'] = 'gam3ia_omomia/Gam3ia_omomia/update_gam3ia_member';
                                }
                                ?>
                              

                               
                              <div class="col-md-12">
                                    <div class="form-group col-md-5 col-sm-6 padding-4">
                                        <label class="label">إسم العضو</label>
                                        <input type="text" name="name" id="name" value="<?php echo $name; ?>"
                                               class="form-control "
                                               data-validation="required"
                                               data-validation-has-keyup-event="true">
                                        <input type="hidden" id="memb_id" name="memb_id"
                                               value="<?php
                                               echo $memb_id;
                                               ?> ">
                                    </div>
                                    <div class="form-group col-md-2 col-sm-6 padding-4">
                                        <label class="label ">الجنس </label>
                                        <select name="gns" id="gender_id_fk"
                                                class="form-control "
                                                aria-required="true">
                                            <option value="">إختر</option>
                                            <?php
                                            if (isset($gender_data) && !empty($gender_data)) {
                                                foreach ($gender_data as $row) {
                                                    ?>

                                                    <option value="<?php echo $row->id_setting; ?>"
                                                        <?php if (!empty($gns)) {
                                                            if ($row->id_setting == $gns) {
                                                                echo 'selected';
                                                            }
                                                        } ?>> <?php echo $row->title_setting; ?></option>

                                                    <?php

                                                }
                                            }
                                            ?>
                                        </select>


                                    </div>

                                    <div class="form-group col-md-2 col-sm-6 padding-4">
                                        <label class="label ">الجنسيه</label>
                                        <select id="nationality_id_fk" class="form-control "
                                                name="gnsia_fk">
                                            <option value="">إختر</option>
                                            <?php
                                            foreach ($nationality as $row) {
                                                ?>
                                                <option value="<?php echo $row->id_setting; ?>"
                                                    <?php if (!empty($gnsia_fk)) {
                                                        if ($row->id_setting == $gnsia_fk) {
                                                            echo 'selected';
                                                        }
                                                    } ?>> <?php echo $row->title_setting; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6 padding-4">
                                        <label class="label ">اللقب</label>
                                        <select name="laqb_fk" class="form-control " id="surname">
                                            <option value="">اختر</option>
                                            <?php
                                            if (isset($surname_arr) && !empty($surname_arr)) {
                                                foreach ($surname_arr as $row) {
                                                    ?>
                                                    <option value="<?php echo $row->id_setting; ?>"
                                                        <?php if (!empty($hala_egtma3ia_fk)) {
                                                            if ($row->id_setting == $laqb_fk) {
                                                                echo 'selected';
                                                            }
                                                        } ?>> <?php echo $row->title_setting; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="form-group col-md-2 col-sm-6 padding-4">
                                        <label class="label ">الحاله الاجتماعيه </label>
                                        <select name="hala_egtma3ia_fk" class="form-control " id="social_status_id_fk">
                                            <option value="">اختر</option>
                                            <?php
                                            if (isset($social_status) && !empty($social_status)) {
                                                foreach ($social_status as $row) {
                                                    ?>
                                                    <option value="<?php echo $row->id_setting; ?>/<?= $row->title_setting ?>"
                                                        <?php if (!empty($hala_egtma3ia_fk)) {
                                                            if ($row->id_setting == $hala_egtma3ia_fk) {
                                                                echo 'selected';
                                                            }
                                                        } ?>> <?php echo $row->title_setting; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2 col-sm-6 padding-4">
                                        <label class="label "> رقم الهويه <span
                                                    class="span-allow"> (10ارقام) </span></label>
                                        <input type="text" name="card_num" id="card_num"
                                               onkeyup="get_length($(this).val(),'hint');"
                                               maxlength="10" data-validation="required"
                                               value="<?php echo $card_num; ?>"
                                               class="form-control"
                                               data-validation-has-keyup-event="true"
                                               onkeypress="validate_number(event);">
                                        <small id="hint" class="myspan" style="color: red;"></small>
                                    </div>
                                    <!-- <div class="form-group col-md-2 col-sm-6 padding-4">
                                        <label class="label ">جهه الاصدار </label>
                                        <select id="esdar_card_fk" name="geha_esdar_fk" class="form-control ">
                                            <option value="">إختر</option>
                                            <?php
                                            if (isset($dest_card) && !empty($dest_card)) {
                                                foreach ($dest_card as $row) {
                                                    ?>
                                                    <option value="<?php echo $row->id_setting; ?>/<?php echo $row->title_setting; ?>"
                                                        <?php if (!empty($geha_esdar_fk)) {
                                                            if ($row->id_setting == $geha_esdar_fk) {
                                                                echo 'selected';
                                                            }
                                                        } ?>> <?php echo $row->title_setting; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div> -->
                                    <div class="form-group col-md-2 col-sm-6 padding-4" 
                     >
                    <label class="label  ">جهه الاصدار</label>
                    <input type="text" name="geha_esdar_name" id="geha_esdar_name" value="<?php echo $geha_esdar_title ?>"
                           class="form-control testButton inputclass"
                           style="cursor:pointer; width:79%;float: right;" autocomplete="off"
                           ondblclick="$(this).attr('readonly','readonly'); $('#Modal_esdar').modal('show');"
                           onblur="$(this).attr('readonly','readonly')"
                           onkeypress="return isNumberKey(event);"
                           
                           readonly>
                           <input type="hidden" name="geha_esdar_fk" id="geha_esdar_fk" 
                           value="<?php echo $geha_esdar_fk ?>" >

                    <button type="button" data-toggle="modal" data-target="#Modal_esdar" id="geha_esdar_fk"
                    onclick="get_details_esdar()"
                            class="btn btn-success btn-next" >
                        <i class="fa fa-plus"></i></button>
                </div>

                                    <div class="form-group col-md-3 col-sm-6 padding-4">
                                        <label class="label" style="text-align: center !important;">
                                            <img style="width: 18px;float: right;"
                                                 src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png"/>
                                            تاريخ الاصدار
                                            <img style="width: 18px;float: left;"
                                                 src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png"/>
                                        </label>
                                        <div id="cal-2" style="width: 50%;float: right;">
                                            <input id="date-Hijri" name="esdar_date_h" class="form-control "
                                                   type="text" onfocus="showCal2();"
                                                   value="<?php if (!empty($result->esdar_date_h)) {
                                                       echo $result->esdar_date_h;
                                                   } ?>"
                                                   style=" width: 100%;float: right"/>
                                        </div>
                                        <div id="cal-1" style="width: 50%;float: left;">
                                            <input id="date-Miladi" name="esdar_date_m" class="form-control  "
                                                   value="<?php if (!empty($result->esdar_date_m)) {
                                                       echo $result->esdar_date_m;
                                                   } ?>"
                                                   type="text" onfocus="showCal1();" style=" width: 100%;float: right"/>
                                        </div>

                                    </div>


                                    <div class="form-group col-md-3 col-sm-6 padding-4">

                                        <label class="label " style="text-align: center !important;">
                                            <img style="width: 18px;float: right;"
                                                 src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon3.png"/>
                                            تاريخ الميلاد
                                            <img style="width: 18px;float: left;"
                                                 src="<?php echo base_url() ?>asisst/admin_asset/img/f_date/icon6.png"/>
                                        </label>

                                        <div id="cal-end-2" style="width: 50%;float: right;">
                                            <input id="date-Hijri-end" name="birth_date_h" class="form-control "
                                                   type="text"
                                                   onfocus="showCalEnd2();"
                                                   value="<?php if (!empty($result->birth_date_h)) {
                                                       echo $result->birth_date_h;
                                                   } ?>" onblur="getAge($(this).val());"
                                                   style=" width: 100%;float: right"/>
                                        </div>
                                        <div id="cal-end-1" style="width: 50%;float: left;">
                                            <input id="date-Miladi-end" name="birth_date_m"
                                                   value="<?php if (!empty($result->birth_date_m)) {
                                                       echo $result->birth_date_m;
                                                   } ?>" class="form-control  birth_date"
                                                   type="text" onfocus="showCalEnd1();"
                                                   style=" width: 100%;float: right"/>
                                        </div>

                                    </div>


                                    <div class="form-group col-md-1 col-sm-6 padding-4">
                                        <label class="label ">العمر</label>
                                        <input type="text" name="age" id="age" value="<?php echo $age; ?>"
                                               class="form-control "
                                               data-validation-has-keyup-event="true" readonly>
                                    </div>


                                    <div class="form-group col-md-2 col-sm-6 padding-4">
                                        <label class="label ""> الجوال <span
                                                class="span-allow"> (10ارقام) </span></label>
                                        <input type="text" name="jwal" maxlength="10"
                                               onkeyup="get_length($(this).val(),'tel');"
                                               data-validation="required" id="phone3" value="<?php echo $jwal; ?>"
                                               class="form-control "
                                               data-validation-has-keyup-event="true"
                                               onkeypress="validate_number(event);">
                                        <small id="tel" class="myspan" style="color: red;"></small>
                                    </div>


                                    <div class="form-group col-md-2 col-sm-6 padding-4">
                                        <label class="label "> جوال أخر </label>
                                        <input type="text" maxlength="10" name="jwal_another"
                                               onkeypress="validate_number(event)"
                                               onkeyup="get_length($(this).val(),'tel_another');"
                                               value="<?php echo $jwal_another; ?>"
                                               class="form-control " data-validation-has-keyup-event="true">
                                        <small id="tel_another" class="myspan" style="color: red;"></small>
                                    </div>

                                    <div class="form-group col-md-2 col-sm-6 padding-4">
                                        <label class="label " title="برجاء الضغط مرتين لتعديل الحي">المدينة</label>
                                        <select id="city_id_fk" name="madina_fk" onchange="getAhai($(this).val());"
                                                ondblclick="getAhai($(this).val());" class="form-control">
                                            <option value="">إختر</option>
                                            <?php
                                            if (isset($cities) && !empty($cities)) {
                                                foreach ($cities as $key => $value) {
                                                    ?>
                                                    <option value="<?php echo $key; ?>/<?php echo $value; ?>"
                                                        <?php if ($key == $madina_fk) {
                                                            echo 'selected';
                                                        } ?>> <?php echo $value; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                        <?php if (isset($cities) && !empty($cities)) { ?>
                                            <small id="" class="" style="color: red;display: none;">برجاء الضغط مرتين
                                                لتعديل الحي
                                            </small>
                                        <?php }
                                        ?>
                                    </div>

                                    <div class="form-group col-md-2 col-sm-6 padding-4 ">
                                        <label class="label ">الحي</label>
                                        <select id="hai_id_fk" name="hai_fk" class="form-control  nonactive">
                                            <option value="">إختر</option>
                                            <?php if (isset($hai_fk) && !empty($hai_fk)) {
                                                foreach ($ahais as $hay) {
                                                    $select = '';
                                                    if ($hay->id == $hai_fk) {
                                                        $select = 'selected';
                                                    } ?>
                                                    <option <?= $select ?>
                                                            value="<?= $hay->id ?>"> <?= $hay->name ?></option>
                                                <?php }
                                            } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6 padding-4">
                                        <label class="label ">اسم الشارع</label>
                                        <input type="text" name="street_name" value="<?php echo $street_name; ?>"
                                               class="form-control "
                                               data-validation-has-keyup-event="true">
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6 padding-4">
                                        <label class="label ">العنوان الوطني</label>
                                        <input type="text" name="enwan_watni" id="national_address"
                                               onkeypress="validate_number(event);"
                                               value=" <?php echo $enwan_watni; ?>" class="form-control ">
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6 padding-4">
                                        <label class="label ">البريد الإلكتروني</label>
                                        <input type="email" name="email" id="email" value="<?php echo $email; ?>"
                                               class="form-control "
                                               data-validation-has-keyup-event="true">
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6 padding-4">
                                        <label class="label ">الدرجة العلمية </label>
                                        <select id="scientific_degree_fk" name="daraga_3elmia_fk"
                                                class="form-control ">
                                            <option value="">إختر</option>
                                            <?php
                                            if (isset($Degree) && !empty($Degree)) {
                                                foreach ($Degree as $value) {
                                                    $select = '';
                                                    if ($value->id_setting == $daraga_3elmia_fk) {
                                                        $select = 'selected';
                                                    } ?>
                                                    ?>
                                                    <option value="<?php echo $value->id_setting; ?>/<?php echo $value->title_setting; ?>" <?= $select ?>>
                                                        <?php echo $value->title_setting; ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6 padding-4" 
                     >
                    <label class="label  ">المؤهلات العلمية</label>
                    <input type="text" name="moahel_3elmi_name" id="moahel_3elmi_name" value="<?php echo $moahel_3elmi_title ?>"
                           class="form-control testButton inputclass"
                           style="cursor:pointer; width:79%;float: right;" autocomplete="off"
                           ondblclick="$(this).attr('readonly','readonly'); $('#Modal_mo2hl').modal('show');"
                           onblur="$(this).attr('readonly','readonly')"
                           onkeypress="return isNumberKey(event);"
                           
                           readonly>
                           <input type="hidden" name="moahel_3elmi_fk" id="moahel_3elmi_fk" 
                           value="<?php echo $moahel_3elmi_fk ?>" >

                    <button type="button" data-toggle="modal" data-target="#Modal_mo2hl" id="moahel_3elmi_fk"
                    onclick="get_details_mo2hl()"
                            class="btn btn-success btn-next" >
                        <i class="fa fa-plus"></i></button>
                </div>
                                </div>
                                <div class="col-md-12">

                                    <?php $arr = array(1 => 'نعم', 0 => 'لا'); ?>
                                    <div class="form-group col-md-3 col-sm-6 padding-4">
                                        <label class="label ">الحياة العملية</label>
                                        <select id="working_life" name="hya_3elmia_fk" onchange="GetType(this.value)"
                                                class="form-control">
                                            <option value="">إختر</option>
                                            <?php
                                            foreach ($arr as $key => $value) {
                                                $select = '';
                                                if ($hya_3elmia_fk != '') {
                                                    if ($key == $hya_3elmia_fk) {
                                                        $select = 'selected';
                                                    }
                                                } ?>
                                                <option
                                                        value="<?php echo $key; ?>" <?= $select ?>> <?php echo $value; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6 padding-4" 
                     >
                    <label class="label  ">المهنة</label>
                    <input type="text" name="mehna_name" id="mehna_name"  value="<?php echo $mehna_title ?>"
                           class="form-control testButton inputclass"
                           style="cursor:pointer; width:79%;float: right;" autocomplete="off"
                           ondblclick="$(this).attr('readonly','readonly'); $('#Modal_family').modal('show');"
                           onblur="$(this).attr('readonly','readonly')"
                           onkeypress="return isNumberKey(event);"
                           
                           readonly>
                           <input type="hidden" name="mehna_fk" id="mehna_fk" 
                           value="<?php echo $mehna_fk ?>" 
                          >

                    <button type="button" data-toggle="modal" data-target="#Modal_family" id="job_name_fk"
                    onclick="get_details_mhna()"
                            class="btn btn-success btn-next" >
                        <i class="fa fa-plus"></i></button>
                </div>


                                    <div class="form-group col-md-3 col-sm-6 padding-4">
                                        <label class="label ">جهة العمل </label>

                                        <input name="geha_amal" id="job_place_name" style="padding: 0;"
                                               <?php if ($hya_3elmia_fk != 1){ ?>disabled="disabled"
                                               <?php } ?>value="<?= $geha_amal ?>"
                                               class=" form-control " type="text">
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6 padding-4">
                                        <label class="label " style="width: 100%"> عنوان العمل</label>
                                        <input id="job_address" name="enwan_amal" style="padding: 0;"
                                               <?php if ($hya_3elmia_fk != 1){ ?>disabled="disabled" <?php } ?>
                                               value="<?= $enwan_amal ?>"
                                               class=" form-control" type="text">
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6 padding-4">
                                        <label class="label " style="width: 100%"> هاتف العمل</label>
                                        <input id="job_mob" name="hatf_amal" maxlength="10"
                                               onkeyup="get_length($(this).val(),'work_mobile_span');"
                                            <?php if ($hya_3elmia_fk != 1) { ?> disabled="disabled"
                                               <?php } ?>value="<?= $hatf_amal ?>"
                                               class="  form-control " type="text"
                                               onkeypress="validate_number(event)">
                                        <small id="work_mobile_span" class="myspan" style="color: red;"></small>
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6 padding-4">
                                        <label class="label " style="width: 100%">الصوره الشخصيه </label>
                                        <input id="member_img" onchange="readURL(this);" name="mem_img"
                                               style="padding: 0;"
                                               class=" form-control" type="file">
                                        <?php if (!empty($mem_img)) { ?>
                                            <a data-toggle="modal" data-target="#myModal-view" type="button"
                                               style="cursor: pointer"
                                               onclick="$('#my_image').attr('src','<?php echo base_url(); ?>uploads/md/gam3ia_omomia_members/<?php echo $mem_img; ?>');">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        <?php } ?>
                                    </div>
                                    <div class="form-group col-md-3 col-sm-6 padding-4">
                                        <label class="label " style="width: 100%">صورة الهوية </label>
                                        <input id="card_img" onchange="readURL(this);" name="card_img"
                                               style="padding: 0;"
                                               class=" form-control" type="file">
                                        <?php if (!empty($card_img)) { ?>
                                            <a data-toggle="modal" data-target="#myModal-view" type="button"
                                               style="cursor: pointer"
                                               onclick="$('#my_image').attr('src','<?php echo base_url(); ?>uploads/md/gam3ia_omomia_members/<?php echo $card_img; ?>');">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        <?php } ?>
                                    </div>
                                  
                                    </div>
                                    
                         
            <div class="col-xs-12 no-padding" style="padding: 10px;">
              
                    <div class="text-center">
                        
                       
                        <button type="button" id="buttons"  onclick="  update_Electronic(<?=$result->id ?>);"
                                            class="btn btn-labeled btn-warning" id="save" name="save" value="save"><span
                                                class="btn-label"><i class="fa fa-floppy-o"></i></span>تعديل
                                    </button>
                    </div>
                
            </div>


                                <?php echo form_close() ?>

 </div>
                </div>
            </div>

                                <div class="modal fade" id="myModal-view" tabindex="-1" role="dialog"
                                     aria-labelledby="myModalLabel">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close"><span
                                                            aria-hidden="true">&times;</span>
                                                </button>
                                                <h4 class="modal-title" id="myModalLabel">الصورة</h4>
                                            </div>
                                            <div class="modal-body">
                                                <img src="" id="my_image" width="100%">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                                    إغلاق
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
        


<!-- Modal -->

<div class="modal fade" id="dawa_reply" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document" style="width: 85%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>

            <div class="modal-body" id="replay_data">


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
            </div>

        </div>
    </div>
</div>

<!-- yara -->
<div class="modal fade" id="Modal_family" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title "> اضافه مهن </h4>
            </div>
            <div class="modal-body">


                <div id="geha_show">
                    <div class="col-sm-12 form-group">
                        <div class="col-sm-12 form-group">
                            <div class="col-sm-3  col-md-3 padding-4 ">

                                <button type="button" class="btn btn-labeled btn-success "
                                        onclick="$('#geha_input').show(); show_add()"
                                        style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                                    <span class="btn-label"><i class="fa fa-floppy-o"></i></span>إضافة 
                                     مهنه
                                </button>

                            </div>
                        </div>
                        <div class="col-sm-12 no-padding form-group">

                            <div id="geha_input" style="display: none">
                                <div class="col-sm-3  col-md-5 padding-2 ">
                                    <label class="label   ">المهنه </label>
                                    <input type="text" name="mhna" id="mhna" 
                                           value=""
                                           class="form-control ">
                                    <input type="hidden" class="form-control" id="s_id" value="">
                                </div>


                                <div class="col-sm-3  col-md-2 padding-4" id="div_add" style="display: block;">
                                    <button type="button" onclick="add_geha($('#mhna').val())"
                                            style="    margin-top: 27px;"
                                            class="btn btn-labeled btn-success" name="save" value="save">
                                        <span class="btn-label"><i class="fa fa-floppy-o"></i></span>حفظ
                                    </button>
                                </div>
                                <div class="col-sm-3  col-md-3 padding-4" id="div_update" style="display: none;">
                                    <button type="button"
                                            class="btn btn-labeled btn-success " name="save" value="save" id="update">
                                        <span class="btn-label"><i class="fa fa-floppy-o"></i></span>حفظ
                                    </button>
                                </div>
                            </div>

                        </div>
                        <br>
                        <br>
                    </div>

                    <div id="myDiv_geha"><br><br>
                  
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<!-- yara -->
<!-- yara -->
<div class="modal fade" id="Modal_mo2hl" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title ">  المؤهلات العلميه </h4>
            </div>
            <div class="modal-body">


                <div id="mo2hl_show">
                    <div class="col-sm-12 form-group">
                        <div class="col-sm-12 form-group">
                            <div class="col-sm-3  col-md-3 padding-4 ">

                                <button type="button" class="btn btn-labeled btn-success "
                                        onclick="$('#geha_input1').show(); show_add()"
                                        style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                                    <span class="btn-label"><i class="fa fa-floppy-o"></i></span>إضافة 
                                     مؤهل
                                </button>

                            </div>
                        </div>
                        <div class="col-sm-12 no-padding form-group">

                            <div id="geha_input1" style="display: none">
                                <div class="col-sm-3  col-md-5 padding-2 ">
                                    <label class="label   ">المؤهل </label>
                                    <input type="text" name="mo2hl" id="mo2hl" 
                                           value=""
                                           class="form-control ">
                                    <input type="hidden" class="form-control" id="s_id" value="">
                                </div>


                                <div class="col-sm-3  col-md-2 padding-4" id="div_add_mo2hl" style="display: block;">
                                    <button type="button" onclick="add_mo2hl($('#mo2hl').val())"
                                            style="    margin-top: 27px;"
                                            class="btn btn-labeled btn-success" name="save" value="save">
                                        <span class="btn-label"><i class="fa fa-floppy-o"></i></span>حفظ
                                    </button>
                                </div>
                                <div class="col-sm-3  col-md-3 padding-4" id="div_update_mo2hl" style="display: none;">
                                    <button type="button"
                                            class="btn btn-labeled btn-success " name="save" value="save" id="update_mo2hl">
                                        <span class="btn-label"><i class="fa fa-floppy-o"></i></span>حفظ
                                    </button>
                                </div>
                            </div>

                        </div>
                        <br>
                        <br>
                    </div>

                    <div id="myDiv_geha1"><br><br>
                   
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>

<!-- yara -->
<div class="modal fade" id="Modal_esdar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title ">  جهه الاصدار </h4>
            </div>
            <div class="modal-body">


                <div id="esdar_show">
                    <div class="col-sm-12 form-group">
                        <div class="col-sm-12 form-group">
                            <div class="col-sm-3  col-md-3 padding-4 ">

                                <button type="button" class="btn btn-labeled btn-success "
                                        onclick="$('#geha_input11').show(); show_add()"
                                        style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                                    <span class="btn-label"><i class="fa fa-floppy-o"></i></span>إضافة 
                                    جهه الاصدار
                                </button>

                            </div>
                        </div>
                        <div class="col-sm-12 no-padding form-group">

                            <div id="geha_input11" style="display: none">
                                <div class="col-sm-3  col-md-5 padding-2 ">
                                    <label class="label   ">جهه الاصدار </label>
                                    <input type="text" name="esdar" id="esdar" 
                                           value=""
                                           class="form-control ">
                                    <input type="hidden" class="form-control" id="s_id" value="">
                                </div>


                                <div class="col-sm-3  col-md-2 padding-4" id="div_add_esdar" style="display: block;">
                                    <button type="button" onclick="add_esdar($('#esdar').val())"
                                            style="    margin-top: 27px;"
                                            class="btn btn-labeled btn-success" name="save" value="save">
                                        <span class="btn-label"><i class="fa fa-floppy-o"></i></span>حفظ
                                    </button>
                                </div>
                                <div class="col-sm-3  col-md-3 padding-4" id="div_update_esdar" style="display: none;">
                                    <button type="button"
                                            class="btn btn-labeled btn-success " name="save" value="save" id="update_esdar">
                                        <span class="btn-label"><i class="fa fa-floppy-o"></i></span>حفظ
                                    </button>
                                </div>
                            </div>

                        </div>
                        <br>
                        <br>
                    </div>

                    <div id="myDiv_geha11"><br><br>
                   
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>


<script>
    function valid_pass_length()
    {
        if($("#user_password").val().length < 4){
            document.getElementById('validate_length').style.color = '#F00';
            document.getElementById('validate_length').innerHTML = 'كلمة المرور اكثر من اربع حروف';
           // $('button[type="submit"]').attr("disabled","disabled");
        }else if($("#user_password").val().length > 4 &&  $("#user_password").val().length < 10){
            document.getElementById('validate_length').style.color = '#F00';
            document.getElementById('validate_length').innerHTML = 'كلمة المرور ضعيفة';
           // $('button[type="submit"]').attr("disabled","disabled");
        }else if($("#user_password").val().length > 10){
            document.getElementById('validate_length').style.color = '#00FF00';
            document.getElementById('validate_length').innerHTML = 'كلمة المرور قوية';
           // $('button[type="submit"]').removeAttr("disabled");
        }
    }
    function valid_pass_copy()
    {
        if($("#user_password").val() == $("#user_password_copy").val()){
            document.getElementById('validate_copy').style.color = '#00FF00';
            document.getElementById('validate_copy').innerHTML = 'كلمة المرور متطابقة';
           // $('button[type="submit"]').removeAttr("disabled");
        }else{
            document.getElementById('validate_copy').style.color = '#F00';
            document.getElementById('validate_copy').innerHTML = 'كلمة المرور غير متطابقة';
            //$('button[type="submit"]').attr("disabled","disabled");
        }
    }
</script>


<script>

function update_Electronic(id) {

        var all_inputs = $(' [data-validation="required"]');
        var valid = 1;
        var text_valid = "";
        all_inputs.each(function (index, elem) {
            console.log(elem.id + $(elem).val());
            if ($(elem).val().length >= 1) {
                $(elem).css("border-color", "");
            } else {
                valid = 0;
                $(elem).css("border-color", "red");
            }
        });
        var form_data = new FormData();


        //

        //
        var files = $('#member_img')[0].files;
        var file_school = $('#card_img')[0].files;
        form_data.append("member_img", files[0]);
        form_data.append("card_img", file_school[0]);

        

        //
        //
        var serializedData = $('.Electronic_form').serializeArray();
        $.each(serializedData, function (key, item) {
            form_data.append(item.name, item.value);
        });
        $.ajax({
            type: 'post',
            
            url: '<?php echo base_url() ?>gam3ia_omomia/Gam3ia_omomia/update_gam3ia_member',
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function (xhr) {
                if (valid == 0) {
                    swal({
                        title: 'من فضلك ادخل كل الحقول ',
                        text: text_valid,
                        type: 'error',
                        confirmButtonText: 'تم'
                    });
                    xhr.abort();
                } else if (valid == 1) {
                    swal({
                        title: "جاري الإرسال ... ",
                        text: "",
                        imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                        showConfirmButton: false,
                        allowOutsideClick: false
                    });
                }
            },
            success: function (html) {
                swal({
                    title: 'تم تعديل  ',
                    type: 'success',
                    confirmButtonText: 'تم'
                });
                var all_inputs_set = $('.Electronic_form .form-control');
                all_inputs_set.each(function (index, elem) {
                    console.log(elem.id + $(elem).val());
                    // $(elem).val('');
                    // get_details();
                    // get_add();
                });
                if (html == 1) {

                    //get_data('family_members');
                    // show_tab('family_members');
                }
            }
        });
    }
</script>

<!-- yara -->
<script>
    function get_details_mhna() {
       // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>gam3ia_omomia/Gam3ia_omomia/load_mhna",
            
            // beforeSend: function () {
            //     $('#myDiv_geha').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            // },
            success: function (d) {
                $('#myDiv_geha').html(d);

            }

        });
    }
</script>
<script>
    function getTitle(value,id) {


        $('#mehna_fk').val(id);
        $('#mehna_name').val(value);

        $('#Modal_family').modal('hide');
    }
</script>
<script>
  
    function add_geha(value) {

        $('#div_update').hide();
        $('#div_add').show();
        //  alert(value);

       
        if (value != 0 && value != '' ) {
            var dataString = 'mhna=' + value ;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>gam3ia_omomia/Gam3ia_omomia/add_mhna',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {

                  //  $('#reason').val(' ');
                  $('#mhna').val('');
                //  $('#Modal_family').modal('hide');
                    swal({
                        title: "تم الحفظ بنجاح!",
  
  
        }
        );
        get_details_mhna();
                }
            });
        }

    }


</script>
<script>
    function update_mhna(id) {
        var id = id;
        $('#geha_input').show();
        $('#div_add').hide();
        $('#div_update').show();


        $.ajax({
            url: "<?php echo base_url() ?>gam3ia_omomia/Gam3ia_omomia/getById",
            type: "Post",
            dataType: "html",
            data: {id: id},
            success: function (data) {

                var obj = JSON.parse(data);
                //console.log(obj);
               // console.log(obj.title_setting);

                $('#mhna').val(obj.title_setting);


            }

        });

        $('#update').on('click', function () {
            var mhna = $('#mhna').val();
         

            $.ajax({
                url: "<?php echo base_url() ?>gam3ia_omomia/Gam3ia_omomia/update_mhna",
                type: "Post",
                dataType: "html",
                data: {mhna: mhna,id: id},
                success: function (html) {
                    //  alert('hh');
                    $('#mhna').val('');
                    $('#div_update').hide();
                    $('#div_add').show();
                   // $('#Modal_family').modal('hide');
                    swal({
                        title: "تم التعديل بنجاح!",
  
  
        }
        );
        get_details_mhna();
                    

                }

            });

        });

    }

  
</script>
<script>
  
    
        function delete_mhna(id) {
        //  confirm('هل انت متأكد من عملية الحذف ؟');
        var r = confirm('هل انت متأكد من عملية الحذف ؟');
        if (r == true) {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>gam3ia_omomia/Gam3ia_omomia/delete_mhna',
                data: {id: id},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    //   alert(html);
                    $('#mhna').val('');
                   // $('#Modal_family').modal('hide');
                  
                    swal({
                        title: "تم الحذف بنجاح!",
  
  
        }
        );
        get_details_mhna();

                }
            });
        }

    }
</script>
<!-- get_details_mo2hl -->
<script>
    function get_details_mo2hl() {
       // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>gam3ia_omomia/Gam3ia_omomia/load_mo2hl",
            
            // beforeSend: function () {
            //     $('#myDiv_geha1').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            // },
            success: function (d) {
                $('#myDiv_geha1').html(d);

            }

        });
    }
</script>
<script>
    function getTitle_mo2hl(value,id) {


        $('#moahel_3elmi_fk').val(id);

        $('#moahel_3elmi_name').val(value);
        $('#Modal_mo2hl').modal('hide');
    }
</script>
<script>
  
  function add_mo2hl(value) {

      $('#div_update_mo2hl').hide();
      $('#div_add_mo2hl').show();
      //  alert(value);

     
      if (value != 0 && value != '' ) {
          var dataString = 'mo2hl=' + value ;
          $.ajax({
              type: 'post',
              url: '<?php echo base_url() ?>gam3ia_omomia/Gam3ia_omomia/add_mo2hl',
              data: dataString,
              dataType: 'html',
              cache: false,
              success: function (html) {

                //  $('#reason').val(' ');
                $('#mo2hl').val('');
              //  $('#Modal_mo2hl').modal('hide');
                  swal({
                      title: "تم الحفظ بنجاح!",


      }
      );
      get_details_mo2hl();
              }
          });
      }

  }


</script>
<script>
    function update_mo2hl(id) {
        var id = id;
        $('#geha_input1').show();
        $('#div_add_mo2hl').hide();
        $('#div_update_mo2hl').show();


        $.ajax({
            url: "<?php echo base_url() ?>gam3ia_omomia/Gam3ia_omomia/getById_mo2hl",
            type: "Post",
            dataType: "html",
            data: {id: id},
            success: function (data) {

                var obj = JSON.parse(data);
                //console.log(obj);
               // console.log(obj.title_setting);

                $('#mo2hl').val(obj.title_setting);


            }

        });

        $('#update_mo2hl').on('click', function () {
            var mo2hl = $('#mo2hl').val();
         

            $.ajax({
                url: "<?php echo base_url() ?>gam3ia_omomia/Gam3ia_omomia/update_mo2hl",
                type: "Post",
                dataType: "html",
                data: {mo2hl: mo2hl,id: id},
                success: function (html) {
                    //  alert('hh');
                    $('#mo2hl').val('');
                    $('#div_update_mo2hl').hide();
                    $('#div_add_mo2hl').show();
                   // $('#Modal_mo2hl').modal('hide');
                    swal({
                        title: "تم التعديل بنجاح!",
  
  
        }
        );
        get_details_mo2hl();     

                }

            });

        });

    }

  
</script>
<script>
  
    
        function delete_mo2hl(id) {
        //  confirm('هل انت متأكد من عملية الحذف ؟');
             var r = confirm('هل انت متأكد من عملية الحذف ؟');
        if (r == true) {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>gam3ia_omomia/Gam3ia_omomia/delete_mo2hl',
                data: {id: id},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    //   alert(html);
                    $('#mo2hl').val('');
                    //$('#Modal_mo2hl').modal('hide');
                  
                    swal({
                        title: "تم الحذف بنجاح!",
  
  
        }
        );
        get_details_mo2hl();

                }
            });
        }

    }
</script>
<!-- yara -->
<script>
    function get_details_esdar() {
       // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>gam3ia_omomia/Gam3ia_omomia/load_esdar",
            
            // beforeSend: function () {
            //     $('#myDiv_geha11').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            // },
            success: function (d) {
                $('#myDiv_geha11').html(d);

            }

        });
    }
</script>
<script>
    function getTitle_esdar(value,id) {


        $('#geha_esdar_fk').val(id);
        $('#geha_esdar_name').val(value);

        $('#Modal_esdar').modal('hide');
    }
</script>
<script>
  
  function add_esdar(value) {

      $('#div_update_esdar').hide();
      $('#div_add_esdar').show();
      //  alert(value);

     
      if (value != 0 && value != '' ) {
          var dataString = 'esdar=' + value ;
          $.ajax({
              type: 'post',
              url: '<?php echo base_url() ?>gam3ia_omomia/Gam3ia_omomia/add_esdar',
              data: dataString,
              dataType: 'html',
              cache: false,
              success: function (html) {

                //  $('#reason').val(' ');
                $('#esdar').val('');
              //  $('#Modal_esdar').modal('hide');
                  swal({
                      title: "تم الحفظ بنجاح!",


      }
      );
      get_details_esdar();

              }
          });
      }

  }


</script>
<script>
    function update_esdar(id) {
        var id = id;
        $('#geha_input11').show();
        $('#div_add_esdar').hide();
        $('#div_update_esdar').show();


        $.ajax({
            url: "<?php echo base_url() ?>gam3ia_omomia/Gam3ia_omomia/getById_esdar",
            type: "Post",
            dataType: "html",
            data: {id: id},
            success: function (data) {

                var obj = JSON.parse(data);
                //console.log(obj);
               // console.log(obj.title_setting);

                $('#esdar').val(obj.title_setting);


            }

        });

        $('#update_esdar').on('click', function () {
            var esdar = $('#esdar').val();
         

            $.ajax({
                url: "<?php echo base_url() ?>gam3ia_omomia/Gam3ia_omomia/update_esdar",
                type: "Post",
                dataType: "html",
                data: {esdar: esdar,id: id},
                success: function (html) {
                    //  alert('hh');
                    $('#esdar').val('');
                    $('#div_update_esdar').hide();
                    $('#div_add_esdar').show();
                   // $('#Modal_esdar').modal('hide');
                    swal({
                        title: "تم التعديل بنجاح!",
  
  
        }
        );
        get_details_esdar();    

                }

            });

        });

    }

  
</script>
<script>
  
    
        function delete_esdar(id) {
        //  confirm('هل انت متأكد من عملية الحذف ؟');
             var r = confirm('هل انت متأكد من عملية الحذف ؟');
        if (r == true) {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>gam3ia_omomia/Gam3ia_omomia/delete_esdar',
                data: {id: id},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    //   alert(html);
                    $('#esdar').val('');
                   // $('#Modal_esdar').modal('hide');
                  
                    swal({
                        title: "تم الحذف بنجاح!",
  
  
        }
        );
        get_details_esdar();

                }
            });
        }

    }
</script>
<!-- yara l]dki ,pd -->

<script>
    function GetMemberName(obj) {

        console.log(' obj :' + obj.dataset.name);
        var hai_name = obj.dataset.hai_name;
        var hai_id = obj.dataset.hai_id;
        var city_name = obj.dataset.city_name;
        var city_id = obj.dataset.city_id;

        document.getElementById('city_id_fk').value = city_id;
        document.getElementById('city_name').value = city_name;
        document.getElementById('hai_id_fk').value = hai_id;
        document.getElementById('hai_name').value = hai_name;
        $("#myModalInfo .close").click();

    }

    function GetDiv(div) {

        html = '<div class="col-md-12 no-padding"><table id="js_table_members" class="table table-striped table-bordered dt-responsive nowrap " >' +
            '<thead><tr class="greentd"><th style="width: 50px;">#</th><th style="width: 50px;"> المدينه </th><th style="width: 170px;" >الحي </th>' +
            '</tr></thead><table><div id="dataMember"></div></div>';
        $("#" + div).html(html);
        $('#js_table_members').show();
        var oTable_usergroup = $('#js_table_members').DataTable({
            dom: 'Bfrtip',
            "ajax": '<?php echo base_url(); ?>human_resources/Human_resources/getConnection',

            aoColumns: [
                {"bSortable": true},
                {"bSortable": true},
                {"bSortable": true}

            ],

            buttons: [
                'pageLength',
                'copy',
                'excelHtml5',
                {
                    extend: "pdfHtml5",
                    orientation: 'landscape'
                },
                {
                    extend: 'print',
                    exportOptions: {columns: ':visible'},
                    orientation: 'landscape'
                },
                'colvis'
            ],

            colReorder: true,
            destroy: true

        });
    }


</script>
<script>
    function GetType(valu) {
        if (valu == 1) {
            document.getElementById("job_name_fk").removeAttribute("disabled", "disabled");
            document.getElementById("job_place_name").removeAttribute("disabled", "disabled");
            document.getElementById("job_address").removeAttribute("disabled", "disabled");
            document.getElementById("job_mob").removeAttribute("disabled", "disabled");
            document.getElementById("job_title").setAttribute("data-validation", "required");
            document.getElementById("employer").setAttribute("data-validation", "required");
            document.getElementById("work_address").setAttribute("data-validation", "required");
            document.getElementById("job_mob").setAttribute("data-validation", "required");

        } else {
            document.getElementById("job_name_fk").value = '';
            document.getElementById("job_place_name").value = '';
            document.getElementById("job_address").value = '';
            document.getElementById("job_mob").value = '';

            document.getElementById("job_name_fk").setAttribute("disabled", "disabled");
            document.getElementById("job_place_name").setAttribute("disabled", "disabled");
            document.getElementById("job_address").setAttribute("disabled", "disabled");
            document.getElementById("job_mob").setAttribute("disabled", "disabled");
            document.getElementById("job_name_fk").removeAttribute("data-validation", "required");
            document.getElementById("job_place_name").removeAttribute("data-validation", "required");
            document.getElementById("job_address").removeAttribute("data-validation", "required");
            document.getElementById("job_mob").removeAttribute("data-validation", "required");

        }


    }

</script>
<script src='<?php echo base_url(); ?>asisst/admin_asset/js/hijri-date.js'></script>
<script src='<?php echo base_url(); ?>asisst/admin_asset/js/calendar.js'></script>
<script>

    /***************************************/


    var cal1 = new Calendar(),
        cal2 = new Calendar(true, 0, true, true),
        date1 = document.getElementById('date-Miladi'),
        date2 = document.getElementById('date-Hijri'),
        cal1Mode = cal1.isHijriMode(),
        cal2Mode = cal2.isHijriMode();


    /*
      var today = cal1.getDate();
 var dd = today.getDate();

 var mm = today.getMonth()+1;
 var yyyy = today.getFullYear();
 if(dd<10)
 {
     dd='0'+dd;
 }

 if(mm<10)
 {
     mm='0'+mm;
 }

 melady_date = dd+'/'+mm+'/'+yyyy;
  alert(melady_date);
 /***********************/




    <?php
    if(!isset($result) && empty($result))
    { ?>
    date1.setAttribute("value", cal1.getDate().getDateString());

    date2.setAttribute("value", cal2.getDate().getDateString());
    <?php }?>
    document.getElementById('cal-1').appendChild(cal1.getElement());
    document.getElementById('cal-2').appendChild(cal2.getElement());


    cal1.show();
    cal2.show();
    <?php
    if(!isset($result) && empty($result))
    { ?>
    setDateFields1();
    <?php }?>

    cal1.callback = function () {
        if (cal1Mode !== cal1.isHijriMode()) {
            cal2.disableCallback(true);
            cal2.changeDateMode();
            cal2.disableCallback(false);
            cal1Mode = cal1.isHijriMode();
            cal2Mode = cal2.isHijriMode();
        } else

            cal2.setTime(cal1.getTime());
        setDateFields1();
    };

    cal2.callback = function () {
        if (cal2Mode !== cal2.isHijriMode()) {
            cal1.disableCallback(true);
            cal1.changeDateMode();
            cal1.disableCallback(false);
            cal1Mode = cal1.isHijriMode();
            cal2Mode = cal2.isHijriMode();
        } else

            cal1.setTime(cal2.getTime());
        setDateFields1();
    };


    cal1.onHide = function () {
        cal1.show(); // prevent the widget from being closed
    };

    cal2.onHide = function () {
        cal2.show(); // prevent the widget from being closed
    };

    function setDateFields1() {
        date1.value = cal1.getDate().getDateString();
        date2.value = cal2.getDate().getDateString();
        <?php
        if(!isset($result) && empty($result))
        { ?>
        date1.setAttribute("value", cal1.getDate().getDateString());
        date2.setAttribute("value", cal2.getDate().getDateString());
        <?php }?>
    }

    function showCal1() {
        if (cal1.isHidden())
            cal1.show();
        else
            cal1.hide();
    }

    function showCal2() {
        if (cal2.isHidden())
            cal2.show();
        else
            cal2.hide();


    }


</script>

<script>


    var calEnd1 = new Calendar(),
        calEnd2 = new Calendar(true, 0, true, true),
        dateEnd1 = document.getElementById('date-Miladi-end'),
        dateEnd2 = document.getElementById('date-Hijri-end'),
        calEnd1Mode = calEnd1.isHijriMode(),
        calEnd2Mode = calEnd2.isHijriMode();

    <?php
    if(!isset($result) && empty($result))
    { ?>
    dateEnd1.setAttribute("value", calEnd1.getDate().getDateString());
    dateEnd2.setAttribute("value", calEnd2.getDate().getDateString());
    <?php }?>
    document.getElementById('cal-end-1').appendChild(calEnd1.getElement());
    document.getElementById('cal-end-2').appendChild(calEnd2.getElement());


    calEnd1.show();
    calEnd2.show();
    <?php
    if(!isset($result) && empty($result))
    { ?>
    setDateFieldsEnd1();


    <?php }?>


    calEnd1.callback = function () {
        if (calEnd1Mode !== calEnd1.isHijriMode()) {
            calEnd2.disableCallback(true);
            calEnd2.changeDateMode();
            calEnd2.disableCallback(false);
            calEnd1Mode = calEnd1.isHijriMode();
            calEnd2Mode = calEnd2.isHijriMode();
        } else

            calEnd2.setTime(calEnd1.getTime());
        setDateFieldsEnd1();
    };

    calEnd2.callback = function () {
        if (calEnd2Mode !== calEnd2.isHijriMode()) {
            calEnd1.disableCallback(true);
            calEnd1.changeDateMode();
            calEnd1.disableCallback(false);
            calEnd1Mode = calEnd1.isHijriMode();
            calEnd2Mode = calEnd2.isHijriMode();
        } else

            calEnd1.setTime(calEnd2.getTime());
        setDateFieldsEnd1();
    };


    calEnd1.onHide = function () {
        calEnd1.show(); // prevent the widget from being closed
    };

    calEnd2.onHide = function () {
        calEnd2.show(); // prevent the widget from being closed
    };


    function setDateFieldsEnd1() {
        dateEnd1.value = calEnd1.getDate().getDateString();
        dateEnd2.value = calEnd2.getDate().getDateString();
        <?php
        if(!isset($result) && empty($result))
        { ?>
        dateEnd1.setAttribute("value", calEnd1.getDate().getDateString());
        dateEnd2.setAttribute("value", calEnd2.getDate().getDateString());

        <?php }?>


        var birth_date = calEnd2.getDate().getDateString();
        var res = birth_date.split("/");
        var year_birth = res[2];

        var current_year = '<?php echo $current_hijry_year?>';
        var ageYear = parseFloat(current_year) - parseFloat(year_birth);
        // alert(ageYear);
        $('#age').val(ageYear + 'سنه');
    }


    function showCalEnd1() {
        if (calEnd1.isHidden())
            calEnd1.show();
        else
            calEnd1.hide();
    }

    function showCalEnd2() {

        if (calEnd2.isHidden())
            calEnd2.show();

        else
            calEnd2.hide();


    }


    //# sourceURL=pen.js

</script>