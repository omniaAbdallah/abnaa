<div class="col-sm-1 no-padding ">
</div>
<div class="col-sm-10 no-padding ">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <!-- <div class="panel-heading">
            <h3 class="panel-title"> تسجيل وارد  </h3>
         </div> -->
        <div class="panel-body">
            <div class="vertical-tabs">
                <div class="col-sm-12 no-padding ">
                    <?php
                    if (isset($item) && !empty($item)) {
                        $rkm = $item->rkm;
                        $tsgeel_date = $item->tsgeel_date;
                        $estlam_date = $item->estlam_date;
                        $geha_ekhtsas_name = $item->geha_ekhtsas_name;
                        $geha_ekhtsas_id_fk = $item->geha_ekhtsas_id_fk;
                        $title = $item->title;
                        $title_id_fk = $item->title_id_fk;
                        $qued_kargy = $item->qued_kargy;
                        $subject = $item->subject;
                        $tarekt_estlam = $item->tarekt_estlam;
                        $tarekt_estlam_name = $item->tarekt_estlam_name;
                        $geha_morsla_id_fk = $item->geha_morsla_id_fk;
                        $geha_morsla_name = $item->geha_morsla_name;
                        $morsel_name = $item->morsel_name;
                        $morsel_id_fk = $item->morsel_id_fk;
                        $awlawya = $item->awlawya;
                        $is_secret = $item->is_secret;
                        $esthkak_date = $item->esthkak_date;
                        $notes = $item->notes;
                        $need_follow = $item->need_follow;
                        $no3_khtab_n = $item->no3_khtab_n;
                        $no3_khtab_fk = $item->no3_khtab_fk;
                        $reply_moamla = $item->reply_moamla;
                        $wared_type = $item->wared_type;
                        $morfq_num = $item->morfq_num;
                        $tsgeel_time = $item->tsgeel_time;
                        $estlam_time = $item->estlam_time;
                        $esthkak_time = $item->esthkak_time;
                        $folder_path = $item->folder_path;
                        $folder_id_fk = $item->folder_id_fk;
                        $folder_name = $item->folder_name;
                        $disabled = 'disabled';
                        if ($_SESSION['role_id_fk'] == 3) {
                            $emp_depart = $item->emp_depart_code;
                        } else {
                            $emp_depart = 0;
                        }
                        if ($_SESSION['emp_code'] == $item->current_form_user_id) {
                            $disabled_action = '';
                            $sapn_action = '';
                        } else {
                            $disabled_action = 'disabled';
                            $sapn_action = ' <span style="color:red;">لا يمكن التعديل الا من مدخل المعاملة  </span>';
                        }
                        if ( $item->suspend !=4) {
                            $action = '';
                            $sapn_act = '';
                        } else {
                            $action = 'disabled';
                            $sapn_act = ' <span style="color:red;">لا يمكن التعديل    نظرا لانتهاء المعامل  </span>';
                        }
                    } else {
                        $rkm = $last_rkm;
                        $tsgeel_date = date('Y-m-d');
                        $tsgeel_time = date('H:i');
                        $qued_kargy = '';
                        $estlam_date = date('Y-m-d');
                        $estlam_time =  date('H:i');
                        $geha_ekhtsas_name = '';
                        $geha_ekhtsas_id_fk = '';
                        $title = '';
                        $title_id_fk = '';
                        $subject = '';
                        $tarekt_estlam = '';
                        $tarekt_estlam_name = '';
                        $geha_morsla_id_fk = '';
                        $geha_morsla_name = '';
                        $morsel_name = '';
                        $morsel_id_fk = '';
                        $awlawya = '';
                        $is_secret = '';
                        $esthkak_date = date('Y-m-d');
                        $esthkak_time = date('H:i');
                        $notes = '';
                        $need_follow = '';
                        $folder = '';
                        $no3_khtab_n = '';
                        $no3_khtab_fk = '';
                        $reply_moamla = '';
                        $wared_type = '';
                        $morfq_num = '';
                        $folder_path = '';
                        $folder_id_fk = '';
                        $folder_name = '';
                        $disabled = '';
                        if ($_SESSION['role_id_fk'] == 3) {
                            $emp_depart = $emp_dep['eddara'];
                            //  echo $$emp_dep['eddara'];
                        } else {
                            $emp_depart = 0;
                        }
                    }
                    ?>
                    <div class="col-xs-12 no-padding">
                        <?php
                        if (isset($item) && !empty($item)){
                        ?>
                        <form action="<?php echo base_url() . 'all_secretary/archive/wared/Add_wared/update/' . $item->id; ?>"
                              method="post" id="form1">
                            <?php } else {
                                echo form_open_multipart('all_secretary/archive/wared/Add_wared/add', array('id' => 'wared_form', 'class' => 'wared_form'));
                            } ?>
                            <div class="col-xs-12 no-padding">
                                <input type="hidden" name="rkm" value="<?= $rkm ?>"/>
                                <input type="hidden" name="emp_depart_code" value="<?= $emp_depart ?>"/>
                                <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
                                    <label class="label"> رقم الوارد </label>
                                    <input title="" type="text" 
                                           value="<?php echo '2020' . '/' . $emp_depart . '/' . $rkm ?>"
                                           class="form-control  " readonly />
                                </div>
                                <div class="form-group padding-1 col-md-2 col-xs-12 padding-4">
                                    <label class="label "> نوع الوارد</label>
                                    <select name="wared_type" id="wared_type" onchange="get_type_div(this.value)"
                                             <?= $disabled ?> class="form-control">
                                        <option value="">إختر</option>
                                        <?php
                                        $arrxx = array(1 => 'وارد داخلي ', 2 => 'وارد خارجي');
                                        foreach ($arrxx as $key => $value) {
                                            $select = '';
                                            if ($wared_type != '') {
                                                if ($key == $wared_type) {
                                                    $select = 'selected';
                                                }
                                            } ?>
                                            <option value="<?php echo $key; ?>" <?= $select ?>> <?php echo $value; ?></option>
                                        <?php } ?>
                                    </select>
                                       <?php if (!empty($disabled)) { ?>
        <input type="hidden" name="wared_type" id="wared_type" value="<?= $wared_type ?>">
    <?php } ?>
                                </div>
                                <div class="form-group padding-4 col-md-2 col-xs-12 padding-4">
                                    <label class="label "> ردا علي معامله سابقه</label>
                                    <select name="reply_moamla"  class="form-control">
                                        <option value="">إختر</option>
                                        <?php $arrx = array(1 => 'نعم', 2 => 'لا');
                                        foreach ($arrx as $key => $value) {
                                            $select = '';
                                            if ($reply_moamla != '') {
                                                if ($key == $reply_moamla) {
                                                    $select = 'selected';
                                                }
                                            } ?>
                                            <option value="<?php echo $key; ?>" <?= $select ?>> <?php echo $value; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-2 col-sm-2 col-xs-12 padding-4">
                                    <label class="label">تاريخ التسجيل</label>
                                    <input type="date" class="form-control" placeholder="" name="tsgeel_date"
                                           value="<?= $tsgeel_date ?>"
                                           readonly
                                    />
                                </div>
                                <div class="form-group col-md-1 col-sm-2 col-xs-12 padding-4">
                                    <label class="label">القيد الخارجي</label>
                                    <input type="text" id="qued_kargy" name="qued_kargy" class="form-control"
                                           value="<?= $qued_kargy ?>"
                                           style="width: 100%; float: right;margin-left: 10px;    text-align: center;">
                                </div>
                                <input type="hidden" id="m13h" name="tsgeel_time" class="form-control"
                                      value="<?= $tsgeel_time ?>"
                                       style="width: 100%; float: right;margin-left: 10px;    text-align: center;">
                                <div class="form-group col-md-2 col-sm-2 col-xs-12 padding-4">
                                    <label class="label">تاريخ الاستلام</label>
                                    <input type="date" class="form-control" placeholder="" name="estlam_date"
                                           value="<?= $estlam_date ?>"
                                    />
                                </div>
                                <div class="form-group col-md-1 col-sm-2 col-xs-12 padding-4">
                                    <label class="label">وقت الاستلام</label>
                                    <input name="estlam_time" id="m12h_" class="form-control" type="time"
                                           value="<?= $estlam_time ?>"
                                           style="width: 100%; float: right;margin-left: 10px;    text-align: center;">
                                </div>
                            </div>
                            <div class="col-xs-12 no-padding">
                                <div class="form-group padding-4 col-md-3 col-xs-12">
                                    <label class="label "> المجلد</label>
                                    <input type="text" class="form-control  testButton inputclass" name="folder"
                                           id="folder"
                                           readonly="readonly" onclick="get_folders()" <?= $disabled ?>
                                           style="cursor:pointer;border: white;color: black;width: 84%;float: right;"
                                           value="<?php echo $folder_name ?>">
                                    <input type="hidden" name="folder_id_fk" id="folder_id_fk"
                                           value="<?= $folder_id_fk ?>">
                                    <input type="hidden" name="folder_path" id="folder_path"
                                           value="<?= $folder_path ?>">
                                    <button type="button" onclick="get_folders()" <?= $disabled ?>
                                            class="btn btn-success btn-next">
                                        <i class="fa fa-plus"></i></button>
                                </div>
                                <div class="form-group col-md-3 col-sm-6 padding-4"
                                >
                                    <label class="label  ">نوع الخطاب</label>
                                    <input type="text" name="no3_khtab_n" id="no3_khtab_n"
                                           value="<?php echo $no3_khtab_n ?>"
                                           class="form-control testButton inputclass" data-validation="required"
                                           style="cursor:pointer; width:85%;float: right;" autocomplete="off"
                                           ondblclick="$(this).attr('readonly','readonly'); $('#Modal_no3_khtab').modal('show');get_details_no3_khtab();"
                                           onblur="$(this).attr('readonly','readonly')"
                                           onkeypress="return isNumberKey(event);"
                                           readonly>
                                    <input type="hidden" name="no3_khtab_fk" id="no3_khtab_fk"
                                           value="<?php echo $no3_khtab_fk; ?>" class="form-control "
                                           data-validation-has-keyup-event="true" readonly>
                                    <button type="button" data-toggle="modal" data-target="#Modal_no3_khtab"
                                            onclick="get_details_no3_khtab()"
                                            class="btn btn-success btn-next">
                                        <i class="fa fa-plus"></i></button>
                                </div>
                                <div class="form-group col-md-3 col-sm-4 padding-4">
                                    <label class="label  ">عنوان الموضوع </label>
                                    <input type="text" name="title_name" id="title_name" value="<?php echo $title ?>"
                                           class="form-control testButton inputclass"
                                           style="cursor:pointer; width:85%;float: right;" autocomplete="off"
                                           ondblclick="$(this).attr('readonly','readonly'); $('#Modal_title').modal('show');get_details_title();"
                                           onblur="$(this).attr('readonly','readonly')"
                                           onkeypress="return isNumberKey(event);"
                                           readonly>
                                    <input type="hidden" name="title_id_fk" id="title_id_fk"
                                           value="<?php echo $title_id_fk; ?>" class="form-control "
                                           data-validation-has-keyup-event="true" readonly>
                                    <button type="button" data-toggle="modal" data-target="#Modal_title"
                                            onclick="get_details_title()"
                                            class="btn btn-success btn-next" style="">
                                        <i class="fa fa-plus"></i></button>
                                </div>
                                <div class="form-group col-md-1 col-sm-4 col-xs-12 padding-4">
                                    <label class="label">عدد المرفقات</label>
                                    <input type="number" class="form-control"
                                           onkeypress="validate_number(event)"
                                           placeholder="" name="morfq_num" value="<?= $morfq_num; ?>"/>
                                </div>
                                <div class="form-group col-md-2 col-sm-6 padding-4"
                                >
                                    <label class="label  ">طريقه الاستلام </label>
                                    <input type="text" name="tarekt_estlam_name" id="tarekt_estlam_name"
                                           value="<?php if (!empty($tareket_estlam)) {
                                               foreach ($tareket_estlam as $tareqa) {
                                                   echo $tareqa->estlam_fk_name;
                                                   echo ',';
                                               }
                                           } else {
                                               echo 'غير محدد';
                                           }
                                           ?>"
                                           class="form-control testButton inputclass" data-validation="required"
                                           style="cursor:pointer; width:78%;float: right;" autocomplete="off"
                                           ondblclick="$(this).attr('readonly','readonly'); $('#Modal_estlam').modal('show');get_details_estlam();"
                                           onblur="$(this).attr('readonly','readonly')"
                                           onkeypress="return isNumberKey(event);"
                                           readonly>
                                    <input type="hidden" name="tarekt_estlam" id="tarekt_estlam"
                                           value="" class="form-control "
                                           data-validation-has-keyup-event="true" readonly>
                                    <button type="button" data-toggle="modal" data-target="#Modal_estlam"
                                            onclick="get_details_estlam()"
                                            class="btn btn-success btn-next">
                                        <i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                            <div class="col-xs-12 no-padding">
                                <div class="form-group padding-4 col-md-2 col-xs-12">
                                    <label class="label "> درجه السريه</label>
                                    <select name="is_secret" data-validation="required"
                                            class="form-control">
                                        <option value="">إختر</option>
                                        <?php
                                        // $arr = (1 => 'نعم', 0 => 'لا');
                                        foreach ($arr as $key) {
                                            $select = '';
                                            if ($is_secret != '') {
                                                if ($key->id == $is_secret) {
                                                    $select = 'selected';
                                                }
                                            } ?>
                                            <option style="color:<?= $key->color ?>"
                                                    value="<?php echo $key->id; ?>" <?= $select ?>> <?php echo $key->title; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <!--31-8-20-om-->
                                <?php
                                if ($wared_type == 1) {
                                    $no3_out = 'none';
                                    $no3_in = 'block';
                                } else {
                                    $no3_out = 'block';
                                    $no3_in = 'none';
                                } ?>
                                <div id="no3_out" style="display:<?= $no3_out ?>;">
                                    <div class="form-group padding-4 col-md-4 col-xs-12">
                                        <label class="label "> جهه الارسال</label>
                                        <input type="text" class="form-control  testButton inputclass"
                                               name="geha_morsla_name" id="geha_morsla_name" data-validation="required"
                                               readonly="readonly"
                                               onclick="$('#gehatModal').modal('show'); get_details_geha_type();"
                                               style="cursor:pointer;border: white;color: black;width: 89%;float: right;"
                                               value="<?= $geha_morsla_name ?>">
                                        <input type="hidden" name="geha_morsla_id_fk" id="geha_morsla_id_fk"
                                               value="<?= $geha_morsla_id_fk ?>">
                                        <button type="button"
                                                onclick="$('#gehatModal').modal('show');get_details_geha_type();"
                                                class="btn btn-success btn-next">
                                            <i class="fa fa-plus"></i></button>
                                    </div>
                                    <div class="form-group padding-4 col-md-3 col-xs-12">
                                        <label class="label">جهه الاختصاص </label>
                                        <input type="text" name="geha_ekhtsas_name" id="geha_ekhtsas_name"
                                               value="<?php echo $geha_ekhtsas_name ?>"
                                               class="form-control testButton inputclass"
                                               onclick="load_geha_ektsas();"
                                               style="cursor:pointer; width:85%;float: right;" autocomplete="off"
                                               onblur="$(this).attr('readonly','readonly')"
                                               onkeypress="return isNumberKey(event);"
                                               readonly>
                                        <input type="hidden" name="geha_ekhtsas_id_fk" id="geha_ekhtsas_id_fk"
                                               value="<?php echo $geha_ekhtsas_id_fk; ?>" class="form-control "
                                               data-validation-has-keyup-event="true" readonly>
                                        <button type="button" data-toggle="modal" data-target="#Modal_travel_type"
                                                onclick="load_geha_ektsas();"
                                                class="btn btn-success btn-next">
                                            <i class="fa fa-plus"></i></button>
                                    </div>
                                    <div class="form-group padding-4 col-md-3 col-xs-12">
                                        <label class="label"> اسم المرسل </label>
                                        <input type="text" name="morsel_name" id="morsel_name"
                                               value="<?php echo $morsel_name ?>"
                                               class="form-control testButton inputclass"
                                               style="cursor:pointer; width:84%;float: right;" autocomplete="off"
                                               ondblclick="$(this).attr('readonly','readonly'); $('#Modal_geha_morsel').modal('show');get_details_geha_morsel();"
                                               onblur="$(this).attr('readonly','readonly')"
                                               onkeypress="return isNumberKey(event);"
                                               readonly>
                                        <input type="hidden" name="morsel_id_fk" id="morsel_id_fk"
                                               value="<?php echo $morsel_id_fk; ?>" class="form-control "
                                               data-validation-has-keyup-event="true" readonly>
                                        <button type="button"
                                                onclick="get_details_geha_morsel()" data-toggle="modal"
                                                data-target="#Modal_geha_morsel"
                                                class="btn btn-success btn-next">
                                            <i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
<div id="no3_in" style="display: <?= $no3_in ?>">
    <div class="form-group padding-4 col-md-4 col-xs-12">
        <label class="label "> الادارة </label>
        <input type="text" class="form-control  testButton inputclass"
               name="edara_n" id="edara_n" data-validation="required"
               readonly="readonly"
               onclick="$('#modal_type').modal('show'); get_edara_type(1);"
               style="cursor:pointer;border: white;color: black;width: 89%;float: right;"
               value="<?= $geha_morsla_name ?>">
        <input type="hidden" name="edara_id_fk" id="edara_id_fk"
               value="<?= $geha_morsla_id_fk ?>">
    </div>
    <div class="form-group padding-4 col-md-3 col-xs-12">
        <label class="label ">القسم</label>
        <input type="text" class="form-control  testButton inputclass"
               name="qsm_n" id="qsm_n"
               readonly="readonly"
               onclick="$('#modal_type').modal('show'); get_edara_type(2);"
               style="cursor:pointer;border: white;color: black;width: 82%;float: right;"
               value="<?= $geha_ekhtsas_name ?>">
        <input type="hidden" name="qsm_fk" id="qsm_fk"
               value="<?= $geha_ekhtsas_id_fk ?>">
        <input type="hidden" id="geha" data-id="" data-title="">
    </div>
    <div class="form-group padding-4 col-md-3 col-xs-12">
        <label class="label "> الموظف</label>
        <input type="text" class="form-control  testButton inputclass"
               name="emp_name" id="emp_name" readonly="readonly"
               onclick="$('#modal_type').modal('show'); get_edara_type(3);"
               style="cursor:pointer;border: white;color: black;width: 82%;float: right;"
               value="<?= $morsel_name ?>">
    </div>
</div>

                                <!--<div id="no3_in" style="display: <?= $no3_in ?>">
                                    <div class="form-group padding-4 col-md-4 col-xs-12">
                                        <label class="label "> الادارة </label>
                                        <input type="text" class="form-control  testButton inputclass"
                                               name="geha_morsla_name" id="edara_n" data-validation="required"
                                               readonly="readonly"
                                               onclick="$('#modal_type').modal('show'); get_edara_type(1);"
                                               style="cursor:pointer;border: white;color: black;width: 89%;float: right;"
                                               value="<?= $geha_morsla_name ?>">
                                        <input type="hidden" name="geha_morsel_fk" id="edara_id_fk"
                                               value="<?= $geha_morsla_id_fk ?>">
                                    </div>
                                    <div class="form-group padding-4 col-md-3 col-xs-12">
                                        <label class="label ">القسم</label>
                                        <input type="text" class="form-control  testButton inputclass"
                                               name="geha_ekhtsas_name" id="qsm_n"
                                               readonly="readonly"
                                               onclick="$('#modal_type').modal('show'); get_edara_type(2);"
                                               style="cursor:pointer;border: white;color: black;width: 82%;float: right;"
                                               value="<?= $geha_ekhtsas_name ?>">
                                        <input type="hidden" name="geha_ekhtsas_id_fk" id="qsm_fk"
                                               value="<?= $geha_ekhtsas_id_fk ?>">
                                        <input type="hidden" id="geha" data-id="" data-title="">
                                    </div>
                                    <div class="form-group padding-4 col-md-3 col-xs-12">
                                        <label class="label "> الموظف</label>
                                        <input type="text" class="form-control  testButton inputclass"
                                               name="morsel_name" id="emp_name" readonly="readonly"
                                               onclick="$('#modal_type').modal('show'); get_edara_type(3);"
                                               style="cursor:pointer;border: white;color: black;width: 82%;float: right;"
                                               value="<?= $morsel_name ?>">
                                    </div>
                                </div>-->
                            </div>
                            <!-- end 12-2-2020 rehab.dev------------------------------------------>
                    </div>
                    <div class="col-xs-12 no-padding">
                        <div class="form-group padding-4 col-md-2 col-xs-12">
                            <label class="label ">الاولويه</label>
                            <select name="awlawya" data-validation="required"
                                    class="form-control">
                                <option value="">إختر</option>
                                <?php
                                $arr = array(2 => 'عادي', 1 => 'هام', 0 => ' هام جدا');
                                foreach ($arr as $key => $value) {
                                    $select = '';
                                    if ($awlawya != '') {
                                        if ($key == $awlawya) {
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
                        <div class="form-group padding-4 col-md-1 col-xs-12">
                            <label class="label "> يحتاج متابعة</label>
                            <select type="text" name="need_follow" onchange="get_disable()" id="need_follow"
                                    class="form-control  ">
                                <?php
                                $arr = array('1' => 'نعم', '2' => 'لا');
                                foreach ($arr as $key => $value) {
                                    ?>
                                    <option value="<?= $key ?>"
                                        <?php
                                        if ($need_follow == $key) {
                                            echo 'selected';
                                        }
                                        ?>
                                    ><?= $value ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-2 col-sm-2 col-xs-12 padding-4">
                            <label class="label"> تاريخ الاستحقاق</label>
                            <input type="date" class="form-control" placeholder="" name="esthkak_date"
                                   id="esthkak_dates"
                                   value="<?= $esthkak_date; ?>"/>
                        </div>
                        <div class="form-group col-md-1 col-sm-2 col-xs-12 padding-4">
                            <label class="label"> وقت الاستحقاق</label>
                            <!-- <input type="time-local" class="form-control" placeholder="" name="esthkak_time" value="<?= $esthkak_time; ?>"/> -->
                            <input name="esthkak_time" id="m14h_" class="form-control" type="time"
                                   data-validation="required" value="<?= $esthkak_time ?>"
                                   style="width: 100%; float: right;margin-left: 10px;    text-align: center;">
                        </div>
                        <div class="form-group col-md-6 col-sm-4  padding-4">
                            <label class="label">ملاحظات</label>
                            <input type="text" class="form-control" placeholder="" name="notes" value="<?= $notes; ?>"/>
                        </div>
                        <div class="form-group col-md-12 col-sm-4  padding-4">
                            <label class="label">الموضوع</label>
                            <!-- <input type="text" class="form-control" placeholder=""  name="subject" value="<?= $subject; ?>"/> -->
                            <textarea class="form-control" placeholder="" name="subject"
                                      data-validation="required"
                            ><?= $subject; ?></textarea>
                        </div>
                    </div>
                    <div class="col-xs-12 text-center" style="margin-top: 15px;">
                        <input type="hidden" name="add" value="اضافه"/>
                        <?php if (isset($item) && !empty($item)) { ?>
                            <button type="submit" <?= $disabled_action ?> class="btn btn-labeled btn-success "
                            <?= $action ?>    name="add" value="اضافه">
                                <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                            </button>
                            <?= $sapn_action ?>
                            <br>
                    <?= $sapn_act ?>
                        <?php } else { ?>
                            <button type="button" id="buttons" class="btn btn-labeled btn-success "
                                    onclick="save_wared()"
                                    name="add" value="اضافه">
                                                    <span class="btn-label"><i
                                                                class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                            </button>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
if (isset($result) && !empty($result)) {
    ?>
    <div class="col-xs-12 no-padding">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title">الوارد </h3>
            </div>
            <div class="panel-body">
                <table class="table example table-bordered table-striped table-hover">
                    <thead>
                    <tr class="info">
                        <th>م</th>
                        <th> رقم الوارد</th>
                        <th> تاريخ الاستلام</th>
                        <th>جهه الاختصاص</th>
                        <th>الجهه المرسله</th>
                        <th> عنوان الموضوع</th>
                        <!-- <th> طريقه الاستلام</th> -->
                        <th> الاولويه</th>
                        <th>الاجراء</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $x = 1;
                    foreach ($result as $row) {
                        ?>
                        <tr>
                            <td><?php echo $x; ?></td>
                            <td>
                          <span class="label" style="background-color: #32e26b">
                             <?= $row->year . '/' . $row->emp_depart_code . '/' . $row->rkm ?>
                             </span>
                            </td>
                            <td><?php echo $row->estlam_date; ?></td>
                            <td><?php echo $row->geha_ekhtsas_name; ?></td>
                            <td><?php echo $row->geha_morsla_name; ?></td>
                            <td><?php echo $row->title; ?></td>
                            <!-- <td><?php echo $row->tarekt_estlam_name; ?></td> -->
                            <td><?php
                                if ($row->awlawya == 1) {
                                    echo 'هام';
                                } elseif ($row->awlawya == 2) {
                                    echo ' عادي  ';
                                } elseif ($row->awlawya == 0) {
                                    echo 'هام جدا  ';
                                } ?>
                            </td>
                            <td>
                                <!-- <button
                                data-toggle="modal" data-target="#myModal_print"
                                onclick="get_print('<?php echo $row->id ?>');"
                                class="btn btn-success">طباعه الباركود</button> -->
                                <div class="btn-group">
                                    <button type="button" class="btn btn-warning">إجراءات</button>
                                    <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="<?php echo base_url(); ?>/all_secretary/archive/wared/Add_wared/compelete_details/<?php echo $row->id; ?>"><i
                                                        class="fa fa-commenting-o" aria-hidden="true"></i> استكمال
                                                البيانات</a></li>
                                        <li><a onclick="get_print('<?php echo $row->id ?>');"
                                               data-toggle="modal" data-target="#myModal_print"><i class="fa fa-print"
                                                                                                   aria-hidden="true"></i>طباعه
                                                الباركود</a></li>
                                        <li>
                                            <a onclick="get_details(<?= $row->id ?>)"
                                               aria-hidden="true"
                                               data-toggle="modal"
                                               data-target="#myModal_det"><i class="fa fa-search"
                                                                             aria-hidden="true"></i>التفاصيل</a></i>
                                        <li><a onclick='swal({
                                                    title: "هل انت متأكد من التعديل ؟",
                                                    text: "",
                                                    type: "warning",
                                                    showCancelButton: true,
                                                    confirmButtonClass: "btn-warning",
                                                    confirmButtonText: "تعديل",
                                                    cancelButtonText: "إلغاء",
                                                    closeOnConfirm: false
                                                    },
                                                    function(){
                                                    window.location="<?= base_url() . 'all_secretary/archive/wared/Add_wared/update/' . $row->id ?>";
                                                    });'>
                                                <i class="fa fa-pencil"> </i>تعديل</a></li>
                                        <li><a onclick=' swal({
                                                    title: "هل انت متأكد من الحذف ؟",
                                                    text: "",
                                                    type: "warning",
                                                    showCancelButton: true,
                                                    confirmButtonClass: "btn-danger",
                                                    confirmButtonText: "حذف",
                                                    cancelButtonText: "إلغاء",
                                                    closeOnConfirm: false
                                                    },
                                                    function(){
                                                    swal("تم الحذف!", "", "success");
                                                    setTimeout(function(){window.location="<?= base_url() . 'all_secretary/archive/wared/Add_wared/delete/' . $row->id ?>";}, 500);
                                                    });'>
                                                <i class="fa fa-trash"> </i>حذف</a></i>
                                        <li>
                                            <a aria-hidden="true"
                                               data-toggle="modal"
                                               data-target="#myModal_reason_end<?= $row->id ?>"><i
                                                        class="fa fa-archive"> </i>انهاء للمعامله</a></li>
                                        <li>
                                            <a onclick="make_print('<?php echo $row->id ?>');">
                                                <i class="fa fa-print" aria-hidden="true">
                                                </i>طباعه الترويثة</a></li>
                                    </ul>
                                </div>
                                <!-- <?php if ($row->suspend != 4) { ?>
        <div id="update_reason">
        <a onclick='swal({
        title: "هل انت متأكد من التعديل ؟",
        text: "",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-warning",
        confirmButtonText: "تعديل",
        cancelButtonText: "إلغاء",
        closeOnConfirm: false
        },
        function(){
        window.location="<?= base_url() . 'all_secretary/archive/wared/Add_wared/update/' . $row->id ?>";
        });'>
    <i class="fa fa-pencil"> </i></a>
    <a onclick=' swal({
        title: "هل انت متأكد من الحذف ؟",
        text: "",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "حذف",
        cancelButtonText: "إلغاء",
        closeOnConfirm: false
        },
        function(){
        swal("تم الحذف!", "", "success");
        setTimeout(function(){window.location="<?= base_url() . 'all_secretary/archive/wared/Add_wared/delete/' . $row->id ?>";}, 500);
        });'>
    <i class="fa fa-trash"> </i></a>
                                            <i onclick="get_details(<?= $row->id ?>)"
                                               class="fa fa-search-plus" aria-hidden="true"
                                               data-toggle="modal"
                                               data-target="#myModal_det"></i>
                <button
                type="button"             class="btn btn-danger" aria-hidden="true"
                                               data-toggle="modal" onclick="get_reason_end(<?= $row->id ?>)"
                                               data-target="#myModal_end">انهاء للمعامله</button></div>
                                               <?php } else {
                                    $halet_eltalab = 'تم انهاء المعامله ';
                                    $halet_eltalab_class = 'success';
                                    ?>
                                                <span class="label label-<?php echo $halet_eltalab_class ?>" style="min-width: 140px;">
                                <?php echo $halet_eltalab; ?>
                                 </span>
                                               <?php } ?> -->
                            </td>
                        </tr>
                        <div class="modal fade" id="myModal_reason_end<?= $row->id ?>" tabindex="-1" role="dialog"
                             aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document" style="width: 80%">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title title "> انهاء المعامله </h4>
                                    </div>
                                    <div class="modal-body" style="
    height: 171px;
">
                                        <div class="form-group col-sm-12">
                                            <div class="form-group col-md-4 col-sm-6 padding-4"
                                            >
                                                <label class="label  "> سبب انهاء المعامله </label>
                                                <input type="text" name="reason_name" id="reason_name" value=""
                                                       class="form-control testButton inputclass"
                                                       data-validation="required"
                                                       style="cursor:pointer; width:80%;float: right;"
                                                       autocomplete="off"
                                                       ondblclick="$(this).attr('readonly','readonly'); $('#myModal_end').modal('show'); get_reason_end();"
                                                       onblur="$(this).attr('readonly','readonly')"
                                                       onkeypress="return isNumberKey(event);"
                                                       readonly>
                                                <input type="hidden" id="reason_id_fk" name="reason_id_fk" value=""/>
                                                <button type="button" data-toggle="modal" data-target="#myModal_end"
                                                        onclick="get_reason_end();"
                                                        class="btn btn-success btn-next">
                                                    <i class="fa fa-plus"></i></button>
                                            </div>
                                            <div class="form-group col-md-4 col-sm-6 padding-4">
                                                <label class="label">المستلم منه </label>
                                                <input type="text" class="form-control"
                                                       type="text"
                                                       name="from_user_n" id="from_user_n"
                                                       value="">
                                            </div>
                                            <div class="form-group col-md-4 col-sm-6 padding-4">
                                                <label class="label">المسلم </label>
                                                <input type="text" class="form-control" placeholder=" حدد الموظف م"
                                                       type="text" style="width: 78%;float: right;" name="to_user_n"
                                                       id="to_user_n" readonly="readonly"
                                                       onclick="$('#tahwelModal_mosalm').modal('show'); load_tahwel_emp();"
                                                       value="">
                                                <input type="hidden" id="to_user_id" name="to_user_id" value=""/>
                                                <button type="button"
                                                        onclick="$('#tahwelModal_mosalm').modal('show');load_tahwel_emp();"
                                                        class="btn btn-success btn-next">
                                                    <i class="fa fa-plus"></i></button>
                                            </div>
                                            <!-- <div class="form-group col-md-4 col-sm-6 padding-4">
                                                      <label class="label">المسلم </label>
                                                      <input type="text" class="form-control"
                                                      placeholder=" حدد الموظف م" type="text" style="width: 78%;float: right;"
                                                                name="to_user_n" id="to_user_n"
                                                                readonly="readonly"
                                                                onclick="$('#tahwelModal').modal('show'); "
                                                                value="">
                                                                <input type="hidden" id="to_user_id" name="to_user_id" value=""/>
                                                         <button type="button"
                                                                 onclick="$('#tahwelModal').modal('show');"
                                                                 class="btn btn-success btn-next" >
                                                             <i class="fa fa-plus"></i></button>
                                                  </div>-->
                                            <div class="form-group col-md-4 col-sm-6 padding-4">
                                                <label class="label">التاريخ </label>
                                                <input type="date" class="form-control"
                                                       type="text"
                                                       name="date_end" id="date_end"
                                                       value="<?= date('Y-m-d'); ?>">
                                            </div>
                                            <!-- <div class="form-group col-md-2 col-sm-6 padding-4">
                                                <label class="label">رقم القيد الخارجي </label>
                                                <input type="number" class="form-control"
                                               type="text"
                                                          name="num_end" id="num_end"
                                                          value="">
                                            </div> -->
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق
                                        </button>
                                        <button type="button"
                                                class="btn btn-labeled btn-success "
                                                onclick="add_reason(<?= $row->id ?>)"
                                        >
                                            <span class="btn-label"><i
                                                        class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        $x++;
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
}
?>
<!-- yara -->
<div class="modal fade" id="Modal_geha_morsel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title "> مسؤولين الجهه </h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="col-sm-12 form-group">
                        <div class="col-sm-12 form-group">
                            <div class="col-sm-3  col-md-3 padding-4 ">
                                <button type="button" class="btn btn-labeled btn-success "
                                        onclick="$('#mostlm_input').show(); "
                                        style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                                    <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>
                                    اضافه مسؤول
                                </button>
                            </div>
                        </div>
                        <div class="col-sm-12 no-padding form-group">
                            <div id="mostlm_input" style="display: none">
                                <div class="col-sm-3  col-md-5 padding-2 ">
                                    <label class="label   "> إسم المسؤول </label>
                                    <input type="text" name="mostlm_name" id="mostlm_name" data-validation="required"
                                           value=""
                                           class="form-control ">
                                    <input type="hidden" class="form-control" id="mostlm_geha_id" value="">
                                </div>
                                <div class="form-group padding-4 col-md-3">
                                    <label class="label "> صفه المسؤول</label>
                                    <input type="text" name="safms2ol_name" id="safms2ol_name" value=""
                                           class="form-control" data-validation="required"
                                           style="cursor:pointer; width:80%;float: right;" autocomplete="off"
                                           onclick="$(this).attr('readonly','readonly'); $('#Modal_safms2ol').modal('show');get_details_safms2ol();"
                                           onblur="$(this).attr('readonly','readonly')"
                                           onkeypress="return isNumberKey(event);"
                                           readonly>
                                    <input type="hidden" name="safms2ol_fk" id="safms2ol_fk" value="">
                                    <button type="button" data-toggle="modal" data-target="#Modal_safms2ol"
                                            onclick="get_details_safms2ol()"
                                            class="btn btn-success btn-next">
                                        <i class="fa fa-plus"></i></button>
                                </div>
                                <div class="col-sm-3  col-md-2 padding-4" id="div_add_mostlm" style="display: block;">
                                    <button type="button" onclick="add_mostlm()"
                                            style="margin-top: 27px;"
                                            class="btn btn-labeled btn-success" name="save" value="save">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                    </button>
                                </div>
                                <div class="col-sm-3  col-md-3 padding-4" id="div_update_mostlm" style="display: none;">
                                    <button type="button" style="margin-top: 27px;"
                                            class="btn btn-labeled btn-success " name="save" value="save"
                                            id="update_mostalm">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>تعديل
                                    </button>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                    </div>
                    <div class="col-sm-12" id="myDiv_gehaa">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">اغلاق</button>
            </div>
        </div>
    </div>
</div>
<!--
<div class="modal fade" id="Modal_geha_morsel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title ">   مسؤولين الجهه   </h4>
            </div>
            <div class="modal-body">
                    <div id="myDiv_gehaa"><br><br>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">اغلاق</button>
            </div>
        </div>
    </div>
</div>
-->
<!-- yara -->
<!-- new -->
<div class="modal fade" id="Modal_no3_khtab" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title "> نوع الخطاب </h4>
            </div>
            <div class="modal-body">
                <div id="no3_khtab_show">
                    <div class="col-sm-12 form-group">
                        <div class="col-sm-12 form-group">
                            <div class="col-sm-3  col-md-3 padding-4 ">
                                <button type="button" class="btn btn-labeled btn-success "
                                        onclick="$('#geha_input11112').show(); show_add()"
                                        style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                                    <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>
                                    اضافه نوع الخطاب
                                </button>
                            </div>
                        </div>
                        <div class="col-sm-12 no-padding form-group">
                            <div id="geha_input11112" style="display: none">
                                <div class="col-sm-3  col-md-5 padding-2 ">
                                    <label class="label   "> نوع الخطاب </label>
                                    <input type="text" name="no3_khtab" id="no3_khtab" data-validation="required"
                                           value=""
                                           class="form-control ">
                                    <input type="hidden" class="form-control" id="s_id" value="">
                                </div>
                                <div class="col-sm-3  col-md-2 padding-4" id="div_add_no3_khtab"
                                     style="display: block;">
                                    <button type="button" onclick="add_no3_khtab($('#no3_khtab').val())"
                                            style="    margin-top: 27px;"
                                            class="btn btn-labeled btn-success" name="save" value="save">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                    </button>
                                </div>
                                <div class="col-sm-3  col-md-3 padding-4" id="div_update_no3_khtab"
                                     style="display: none;">
                                    <button type="button"
                                            class="btn btn-labeled btn-success " name="save" value="save"
                                            id="update_no3_khtab">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>تعديل
                                    </button>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                    </div>
                    <div id="myDiv_no3_khtab"><br><br>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">اغلاق</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- new -->
<div class="modal fade" id="Modal_estlam" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title "> طريقه الاستلام </h4>
            </div>
            <div class="modal-body">
                <div id="estlam_show">
                    <div class="col-sm-12 form-group">
                        <div class="col-sm-12 form-group">
                            <div class="col-sm-3  col-md-3 padding-4 ">
                                <button type="button" class="btn btn-labeled btn-success "
                                        onclick="$('#geha_input1111').show(); show_add()"
                                        style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                                    <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>
                                    اضافه طريقه الاستلام
                                </button>
                            </div>
                        </div>
                        <div class="col-sm-12 no-padding form-group">
                            <div id="geha_input1111" style="display: none">
                                <div class="col-sm-3  col-md-5 padding-2 ">
                                    <label class="label   "> طريقه الاستلام </label>
                                    <input type="text" name="estlam" id="estlam" data-validation="required"
                                           value=""
                                           class="form-control ">
                                    <input type="hidden" class="form-control" id="s_id" value="">
                                </div>
                                <div class="col-sm-3  col-md-2 padding-4" id="div_add_estlam" style="display: block;">
                                    <button type="button" onclick="add_estlam($('#estlam').val())"
                                            style="    margin-top: 27px;"
                                            class="btn btn-labeled btn-success" name="save" value="save">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                    </button>
                                </div>
                                <div class="col-sm-3  col-md-3 padding-4" id="div_update_estlam" style="display: none;">
                                    <button type="button"
                                            class="btn btn-labeled btn-success " name="save" value="save"
                                            id="update_estlam">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>تعديل
                                    </button>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                    </div>
                    <div id="myDiv_estlam"><br><br>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">اغلاق</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal_det" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal">&times;
                </button>
                <h4 class="modal-title"> التفاصيل :
                    <span id="pop_rkm"></span>
                </h4>
            </div>
            <div class="modal-body">
                <div id="details"></div>
            </div>
            <div class="modal-footer" style=" display: inline-block;width: 100%;">
                <button type="button" class="btn btn-danger"
                        data-dismiss="modal">إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<!-- new -->
<!--  -->
<div class="modal fade" id="tahwelModal_mosalm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title title "> اسناد الي</h4>
            </div>
            <div class="modal-body">
                <!--<div class="form-group">
                    <div class="radio-content">
                        <input type="radio" id="esnad" name="esnad_to" class="sarf_types" value="1"
                               onclick="load_tahwel_emp()">
                        <label for="esnad" class="radio-label"> موظف</label>
                    </div>
                </div>-->
                <div class="col-xs-12" id="tawel_result_mosalm" style="display: none;">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<!--  -->
<div class="modal fade" id="myModal_end" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                        data-dismiss="modal">&times;
                </button>
                <h4 class="modal-title"> انهاء المعامله :
                </h4>
            </div>
            <div class="modal-body">
                <div id="reason_show">
                    <div class="col-sm-12 form-group">
                        <div class="col-sm-12 form-group">
                            <div class="col-sm-3  col-md-3 padding-4 ">
                                <button type="button" class="btn btn-labeled btn-success "
                                        onclick="$('#geha_input6').show(); show_add()"
                                        style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                                    <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>اضافه سبب
                                    انهاء المعامله
                                </button>
                            </div>
                        </div>
                        <div class="col-sm-12 no-padding form-group">
                            <div id="geha_input6" style="display: none">
                                <div class="col-sm-3  col-md-5 padding-2 ">
                                    <label class="label   ">سبب انهاء المعامله </label>
                                    <input type="text" name="reason_setting" id="reason_setting"
                                           data-validation="required"
                                           value=""
                                           class="form-control ">
                                    <input type="hidden" class="form-control" id="s_id" value="">
                                </div>
                                <div class="col-sm-3  col-md-2 padding-4" id="div_add_reason_setting"
                                     style="display: block;">
                                    <button type="button" onclick="add_reason_setting($('#reason_setting').val())"
                                            style="    margin-top: 27px;"
                                            class="btn btn-labeled btn-success" name="save" value="save">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                    </button>
                                </div>
                                <div class="col-sm-3  col-md-3 padding-4" id="div_update_reason_setting"
                                     style="display: none;">
                                    <button type="button"
                                            class="btn btn-labeled btn-success " name="save" value="save"
                                            id="update_reason_setting">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>تعديل
                                    </button>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                    </div>
                    <div id="end">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- new -->
<div class="modal fade" id="mogldModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title  "> المجلد </h4>
            </div>
            <div class="modal-body" id="load_folders">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<!-- gehatModal  -->
<div class="modal fade" id="gehatModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title  "> الجهات </h4>
            </div>
            <div class="modal-body">
                <div id="travel_type_show">
                    <div class="col-sm-12 form-group">
                        <div class="col-sm-12 form-group">
                            <div class="col-sm-3  col-md-3 padding-4 ">
                                <button type="button" class="btn btn-labeled btn-success "
                                        onclick="$('#geha_input').show(); show_add()"
                                        style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                                    <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>
                                    اضافه جهه اساسيه
                                </button>
                            </div>
                        </div>
                        <div class="col-sm-12 no-padding form-group">
                            <div id="geha_input" style="display: none">
                                <div class="col-sm-3  col-md-5 padding-2 ">
                                    <label class="label   ">اضافه جهه اساسيه </label>
                                    <input type="text" name="geha_name" id="geha_name" data-validation="required"
                                           value=""
                                           class="form-control ">
                                    <input type="hidden" class="form-control" id="s_id" value="">
                                </div>
                                <div class="col-sm-3  col-md-2 padding-4" id="div_add_geha_type"
                                     style="display: block;">
                                    <button type="button" onclick="add_geha_type($('#geha_name').val())"
                                            style="    margin-top: 27px;"
                                            class="btn btn-labeled btn-success" name="save" value="save">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                    </button>
                                </div>
                                <div class="col-sm-3  col-md-3 padding-4" id="div_update_geha_type"
                                     style="display: none;">
                                    <button type="button"
                                            class="btn btn-labeled btn-success " name="save" value="save"
                                            id="update_geha_type">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>تعديل
                                    </button>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                    </div>
                    <div id="myDiv_gehat"><br><br>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
</div>
<!-- gehatModal  -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title title "></h4>
            </div>
            <div class="modal-body">
                <div id="output">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal_print" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">نموذج الطباعة </h4>
            </div>
            <div class="modal-body col-sm-12">
                <div class="col-sm-12">
                    <div id="div_print"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                <button type="button" onclick="printdiv('printableArea');" class="btn btn-success">طباعة</button>
            </div>
        </div>
    </div>
</div>
<!-- yara -->
<div class="modal fade" id="Modal_title" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title "> عنوان الموضوع </h4>
            </div>
            <div class="modal-body">
                <div id="title_show">
                    <div class="col-sm-12 form-group">
                        <div class="col-sm-12 form-group">
                            <div class="col-sm-3  col-md-3 padding-4 ">
                                <button type="button" class="btn btn-labeled btn-success "
                                        onclick="$('#input1111').show(); show_add()"
                                        style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                                    <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>
                                    اضافه عنوان الموضوع
                                </button>
                            </div>
                        </div>
                        <div class="col-sm-12 no-padding form-group">
                            <div id="input1111" style="display: none">
                                <div class="col-sm-3  col-md-5 padding-2 ">
                                    <label class="label   "> عنوان الموضوع </label>
                                    <input type="text" name="title" id="title" data-validation="required"
                                           value=""
                                           class="form-control ">
                                    <input type="hidden" class="form-control" id="s_id" value="">
                                </div>
                                <div class="col-sm-3  col-md-2 padding-4" id="div_add_title" style="display: block;">
                                    <button type="button" onclick="add_title($('#title').val())"
                                            style="    margin-top: 27px;"
                                            class="btn btn-labeled btn-success" name="save" value="save">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                    </button>
                                </div>
                                <div class="col-sm-3  col-md-3 padding-4" id="div_update_title" style="display: none;">
                                    <button type="button"
                                            class="btn btn-labeled btn-success " name="save" value="save"
                                            id="update_title">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>تعديل
                                    </button>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                    </div>
                    <div id="myDiv_title_sub"><br><br>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">اغلاق</button>
            </div>
        </div>
    </div>
</div>
<!--  start 12-2-2020 gehatektsasModal  -->
<div class="modal fade" id="gehatektsasModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title  "> الجهات الاختصاص </h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div id="geha_ektsas_show">
                        <div class="col-sm-12 form-group">
                            <div class="col-sm-3  col-md-3 padding-4 ">
                                <button type="button" class="btn btn-labeled btn-success "
                                        onclick="$('#geha_ektsas_input').show();"
                                        style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                                    <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>
                                    اضافه جهه اختصاص
                                </button>
                            </div>
                            <div class="col-sm-12 no-padding form-group">
                                <div id="geha_ektsas_input" style="display: none">
                                    <div class="col-sm-3  col-md-5 padding-2 ">
                                        <label class="label   "> إسم جهه الاختصاص </label>
                                        <input type="text" name="name" id="name" data-validation="required"
                                               value=""
                                               class="form-control ">
                                        <input type="hidden" class="form-control" id="id" value="">
                                    </div>
                                    <div class="form-group col-md-4 padding-4">
                                        <div class="col-sm-3  col-md-2 padding-4" id="div_add_geha_ektsas"
                                             style="display: block;">
                                            <button type="button"
                                                    onclick="add_geha_ektsas($('#geha_morsla_id_fk').val())"
                                                    style="    margin-top: 27px;"
                                                    class="btn btn-labeled btn-success" name="save" value="save">
                                            <span class="btn-label"><i
                                                        class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                            </button>
                                        </div>
                                        <div class="col-sm-3  col-md-3 padding-4" id="div_update_geha_ektsas"
                                             style="display: none;">
                                            <button type="button"
                                                    class="btn btn-labeled btn-success " name="save" value="save"
                                                    id="update_geha_ektsas">
                                            <span class="btn-label"><i
                                                        class="glyphicon glyphicon-floppy-disk"></i></span>تعديل
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br><br>
                        </div>
                        <div id="myDiv_geha_ektsas"><br><br></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="Modal_safms2ol" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title "> صفه المسؤول </h4>
            </div>
            <div class="modal-body">
                <div id="mohema_n_show">
                    <div class="col-sm-12 form-group">
                        <div class="col-sm-12 form-group">
                            <div class="col-sm-3  col-md-3 padding-4 ">
                                <button type="button" class="btn btn-labeled btn-success "
                                        onclick="$('#safms2ol_input').show(); show_add()"
                                        style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                                    <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>
                                    اضافه صفه المسؤول
                                </button>
                            </div>
                        </div>
                        <div class="col-sm-12 no-padding ">
                            <div id="safms2ol_input" style="display: none">
                                <div class="col-sm-3  col-md-5 padding-2 ">
                                    <label class="label "> صفه المسؤول </label>
                                    <input type="text" name="safms2ol" id="safms2ol" data-validation="required"
                                           value=""
                                           class="form-control ">
                                    <input type="hidden" class="form-control" id="s_id" value="">
                                </div>
                                <div class="col-sm-3  col-md-2 padding-4" id="div_add_safms2ol" style="display: block;">
                                    <button type="button" onclick="add_safms2ol($('#safms2ol').val())"
                                            style="    margin-top: 27px;"
                                            class="btn btn-labeled btn-success" name="save" value="save">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                    </button>
                                </div>
                                <div class="col-sm-3  col-md-3 padding-4" id="div_update_safms2ol"
                                     style="display: none;">
                                    <button type="button" style="    margin-top: 27px;"
                                            class="btn btn-labeled btn-success " name="save" value="save"
                                            id="update_safms2ol">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>تعديل
                                    </button>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                    </div>
                </div>
                <div class="col-sm-12 no-padding ">
                    <div id="myDiv_safms2ol">
                        <br><br>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">اغلاق</button>
            </div>
        </div>
    </div>
</div>
<!--31-8-20-om-->
<div class="modal fade" id="modal_type" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog " style="width: 80%" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel_header"></h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="col-xs-12 no-padding" id="load_type">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    function GetgehaektsasName(id, name) {
        $('#geha_ekhtsas_id_fk').val(id);
        $('#geha_ekhtsas_name').val(name);
        $('#gehatektsasModal').modal('hide');
    }
</script>
<script>
    function load_geha_ektsas(geha) {
        // $('#pop_rkm').text(rkm);
        var geha_id = $('#geha_morsla_id_fk').val();
        console.log(geha_id);
        if (geha_id != '') {
            $('#gehatektsasModal').modal('show');
            //  console.log(geha_id);
            $.ajax({
                type: 'post',
                url: '<?php echo base_url()?>all_secretary/archive/sader/Add_sader/load_gehat_ektsas',
                data: {geha: geha_id},
                dataType: 'html',
                cache: false,
                beforeSend: function () {
                    $('#myDiv_geha_ektsas').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
                },
                success: function (html) {
                    $("#myDiv_geha_ektsas").html(html);
                }
            });
        } else {
            swal({
                title: "من فضلك اختر الجهة الارسال اولا ! ",
                type: "warning",
                confirmButtonClass: "btn-warning"
            });
        }
    }
</script>
<script>
    function add_geha_ektsas(id) {
        $('#div_update_geha_ektsas').hide();
        $('#div_add_geha_ektsas').show();
        //  alert(value);
        var name = $("#name").val();
        var geha = id;
        if (name != 0 && name != '') {
            var dataString = 'name=' + name + '&geha=' + id;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>all_secretary/archive/gehat/Gehat/add_gehat_ektsas',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $('#name').val('');
                    swal({
                        title: "تم الحفظ بنجاح!",
                    });
                    load_geha_ektsas(geha);
                }
            });
        } else {
            swal({title: "برجاء ادخال البيانات!",});
        }
    }
</script>
<script>
    function update_geha_ektsas(id, geha) {
        var id = id;
        $('#div_add_geha_ektsas').hide();
        $('#div_update_geha_ektsas').show();
        $.ajax({
            url: "<?php echo base_url() ?>all_secretary/archive/gehat/Gehat/getById_gehat_ektsas",
            type: "Post",
            dataType: "html",
            data: {id: id},
            success: function (data) {
                var obj = JSON.parse(data);
                //console.log(obj);
                $('#name').val(obj.name);
                $('#id').val(obj.id);
            }
        });
        $('#update_geha_ektsas').on('click', function () {
            var id = $("#id").val();
            var name = $("#name").val();
            var dataString = 'id=' + id + '&name=' + name;
            $.ajax({
                url: "<?php echo base_url() ?>all_secretary/archive/gehat/Gehat/update_gehat_ektsas",
                type: "Post",
                dataType: "html",
                data: dataString,
                success: function (html) {
                    //  alert('hh');
                    $('#name').val('');
                    $('#div_update_geha_ektsas').hide();
                    $('#div_add_geha_ektsas').show();
                    swal({
                        title: "تم التعديل بنجاح!",
                    });
                    load_geha_ektsas(geha);
                }
            });
        });
    }
</script>
<script>
    function delete_geha_ektsas(id, geha) {
        var r = confirm('هل انت متاكد من الحذف ?');
        if (r == true) {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>all_secretary/archive/gehat/Gehat/delete_gehat_ektsas',
                data: {id: id},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    swal({
                        title: "تم الحذف بنجاح!",
                    });
                    load_geha_ektsas(geha);
                }
            });
        }
    }
</script>
<!-- end 12-2-2020 gehatektsasModal  -->
<script>
    function get_details_geha() {
        // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_secretary/archive/wared/Add_wared/load_geha",
            beforeSend: function () {
                $('#myDiv_geha1111').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#myDiv_geha1111').html(d);
            }
        });
    }
</script>
<script>
    function getTitle_travel_type(value, id) {
        $('#geha_ekhtsas_id_fk').val(id);
        $('#geha_ekhtsas_name').val(value);
        $('#Modal_travel_type').modal('hide');
    }
</script>
<script>
    function get_details_estlam() {
        // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_secretary/archive/wared/Add_wared/load_estlam",
            beforeSend: function () {
                $('#myDiv_estlam').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#myDiv_estlam').html(d);
            }
        });
    }
</script>
<script>
    function getTitle_estlam(value, id) {
        $('#tarekt_estlam').val(id);
        $('#tarekt_estlam_name').val(value);
        $('#Modal_estlam').modal('hide');
    }
</script>
<script>
    function add_estlam(value) {
        $('#div_update_estlam').hide();
        $('#div_add_estlam').show();
        //  alert(value);
        if (value != 0 && value != '') {
            var dataString = 'estlam=' + value;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/add_estlam',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    //  $('#reason').val(' ');
                    $('#estlam').val('');
                    //  $('#Modal_esdar').modal('hide');
                    swal({
                            title: "تم الحفظ!",
                        }
                    );
                    get_details_estlam();
                }
            });
        }
    }
</script>
<script>
    function update_estlam(id) {
        var id = id;
        $('#geha_input1111').show();
        $('#div_add_estlam').hide();
        $('#div_update_estlam').show();
        $.ajax({
            url: "<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/getById_estlam",
            type: "Post",
            dataType: "html",
            data: {id: id},
            success: function (data) {
                var obj = JSON.parse(data);
                //console.log(obj);
                console.log(obj.title);
                $('#estlam').val(obj.title);
            }
        });
        $('#update_estlam').on('click', function () {
            var estlam = $('#estlam').val();
            $.ajax({
                url: "<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/update_estlam",
                type: "Post",
                dataType: "html",
                data: {estlam: estlam, id: id},
                success: function (html) {
                    //  alert('hh');
                    $('#estlam').val('');
                    $('#div_update_estlam').hide();
                    $('#div_add_estlam').show();
                    // $('#Modal_esdar').modal('hide');
                    swal({
                            title: "تم التعديل!",
                        }
                    );
                    get_details_estlam();
                }
            });
        });
    }
</script>
<script>
    function delete_estlam(id) {
        //  confirm('?? ??? ????? ?? ????? ????? ?');
        var r = confirm('هل انت متاكد من الحذف ?');
        if (r == true) {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/delete_estlam',
                data: {id: id},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    //   alert(html);
                    $('#estlam').val('');
                    // $('#Modal_esdar').modal('hide');
                    swal({
                            title: "تم الحذف!",
                        }
                    );
                    get_details_estlam();
                }
            });
        }
    }
</script>
<script>
    function get_details_morsel() {
        // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_secretary/archive/wared/Add_wared/load_geha_morsel",
            beforeSend: function () {
                $('#myDiv_geha').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#myDiv_geha').html(d);
            }
        });
    }
</script>
<script>
    function getTitle_morsel(value, id) {
        $('#geha_morsla_id_fk').val(id);
        $('#geha_morsla_name').val(value);
        $('#Modal_morsel').modal('hide');
    }
</script>
<script src="<?= base_url() . 'asisst/admin_asset/' ?>sweet_alert/sweetalert.js"></script>
<link rel="stylesheet" href="<?= base_url() . 'asisst/admin_asset/' ?>sweet_alert/sweetalert.css">
<script>
    function get_details_geha_morsel() {
        // $('#pop_rkm').text(rkm);
        var id = $('#geha_morsla_id_fk').val();
        console.log(id);
        if (id == '') {
            $('#Modal_geha_morsel').modal('hide');
            swal({
                title: "من فضلك اختر الجهه اولا ",
                type: "warning",
                confirmButtonClass: "btn-warning",
                closeOnConfirm: false
            });
        } else {
            $.ajax({
                type: 'post',
                url: "<?php echo base_url();?>all_secretary/archive/wared/Add_wared/load_morsel",
                data: {id: id},
                beforeSend: function () {
                    $('#myDiv_gehaa').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
                },
                success: function (d) {
                    $('#myDiv_gehaa').html(d);
                }
            });
        }
    }
</script>
<script>
    function getTitle_geha_morsel(id, value) {
        $('#morsel_id_fk').val(id);
        $('#morsel_name').val(value);
        $('#Modal_geha_morsel').modal('hide');
    }
</script>
<script>
    function get_details(row_id) {
        // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_secretary/archive/wared/Add_wared/load_details",
            data: {row_id: row_id},
            beforeSend: function () {
                $('#details').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#details').html(d);
            }
        });
    }
</script>
<script>
    function GetfolderName(id, name, path) {
        $('#folder_id_fk').val(id);
        $('#folder').val(name);
        $('#folder_path').val(path);
        $('#mogldModal').modal('hide');
    }
</script>
<script>
    function changePage(text, id, title) {
        $('.title').text(text);
        $('#page').data('id', id);
        $('#page').data('title', title);
    }
</script>
<script>
    function load_page(type) {
        $.ajax({
            type: 'post',
            url: '<?php echo base_url()?>all_secretary/archive/sader/Add_sader/load_modal',
            data: {type: type},
            dataType: 'html',
            cache: false,
            success: function (html) {
                $("#output").html(html);
            }
        });
    }
</script>
<script>
    function GetName(id, name) {
        var title_fk = $('#page').data("id");
        var title_n = $('#page').data("title");
        $('#' + title_fk).val(id);
        $('#' + title_n).val(name);
        $('#myModal').modal('hide');
    }
</script>
<script>
var wader_id;
    function add_reason(id) {
       /* var id = id;
        var value = $('#reason_id_fk').val();
        var name = $('#reason_name').val();
        var to_user_n = $('#to_user_n').val();
        var to_user_id = $('#to_user_id').val();
        var from_user_n = $('#from_user_n').val();
        var date_end = $('#date_end').val();
        var num_end = $('#num_end').val();
        if (value != 0 && value != '' && name != 0 && name != '' && to_user_n != 0 && to_user_n != '' && from_user_n != 0 && from_user_n && num_end != 0 && num_end) {
          */
              var id = id;
            var value = $('#reason_id_fk'+wader_id).val();
            var name = $('#reason_name'+wader_id).val();
            var to_user_n = $('#to_user_n'+wader_id).val();
            var to_user_id = $('#to_user_id'+wader_id).val();
            var from_user_n = $('#from_user_n'+wader_id).val();
            var date_end = $('#date_end'+wader_id).val();
            var num_end = $('#num_end'+wader_id).val();
            if (value != 0 && value != '' && name != 0 && name != '' && to_user_n != 0 && to_user_n != '' && from_user_n != 0 && from_user_n && num_end) {

            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/add_reason_end',
                data: {
                    id: id,
                    value: value,
                    name: name,
                    to_user_n: to_user_n,
                    to_user_id: to_user_id,
                    from_user_n: from_user_n,
                    date_end: date_end,
                    num_end: num_end
                },
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $('#myModal_end').modal('hide');
                    swal({
                            title: "تم انهاء المعامله بنجاح!",
                        }
                    );
                    window.location.reload();
// $('#update_reason').hide();
// $('#span_reason').append("<span class='label label-success' style='min-width: 140px;''>تم انهاءالمعامله </span>");
                }
            });
        } else {
            swal({
                    title: "برجاء ادخال البيانات!",
                }
            );
        }
    }
</script>
<script>
   function getTitle_reason(id, value) {
            $('#reason_id_fk'+wader_id).val(id);
            $('#reason_name'+wader_id).val(value);
            $('#myModal_end').modal('hide');
        }
    /*function getTitle_reason(id, value) {
        $('#reason_id_fk').val(id);
        $('#reason_name').val(value);
        $('#myModal_end').modal('hide');
    }*/
</script>
<script>
    function get_reason_end() {
        // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_secretary/archive/wared/Add_wared/load_reason",
            beforeSend: function () {
                $('#end').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#end').html(d);
            }
        });
    }
</script>
<script>
    function get_print(id) {
        var print_id = id;
        var dataString = 'id=' + print_id;
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/PrintCode',
            data: dataString,
            dataType: 'html',
            cache: false,
            /*success: function (html) {
                //   alert(html);
                $("#div_print").html(html);
            }*/
              success: function (html) {
                //   alert(html);
                $("#div_print").html(html);

                window.onafterprint = function(){
                    console.log("Printing completed...");
                    location.href = '<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/compelete_details/'+id;

                }
            }
        });
        return false;
    }
</script>
<script>
    function get_details_no3_khtab() {
        // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_secretary/archive/wared/Add_wared/load_no3_khtab",
            beforeSend: function () {
                $('#myDiv_no3_khtab').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#myDiv_no3_khtab').html(d);
            }
        });
    }
</script>
<script>
    function getTitle_no3_khtab(value, id) {
        $('#no3_khtab_fk').val(id);
        $('#no3_khtab_n').val(value);
        $('#Modal_no3_khtab').modal('hide');
    }
</script>
<script>
    function add_no3_khtab(value) {
        $('#div_update_no3_khtab').hide();
        $('#div_add_no3_khtab').show();
        //  alert(value);
        if (value != 0 && value != '') {
            var dataString = 'no3_khtab=' + value;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/add_no3_khtab',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    //  $('#reason').val(' ');
                    $('#no3_khtab').val('');
                    //  $('#Modal_esdar').modal('hide');
                    swal({
                            title: "تم الحفظ!",
                        }
                    );
                    get_details_no3_khtab();
                }
            });
        }
    }
</script>
<script>
    function update_no3_khtab(id) {
        var id = id;
        $('#geha_input11112').show();
        $('#div_add_no3_khtab').hide();
        $('#div_update_no3_khtab').show();
        $.ajax({
            url: "<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/getById_no3_khtab",
            type: "Post",
            dataType: "html",
            data: {id: id},
            success: function (data) {
                var obj = JSON.parse(data);
                //console.log(obj);
                console.log(obj.title);
                $('#no3_khtab').val(obj.title);
            }
        });
        $('#update_no3_khtab').on('click', function () {
            var no3_khtab = $('#no3_khtab').val();
            $.ajax({
                url: "<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/update_no3_khtab",
                type: "Post",
                dataType: "html",
                data: {no3_khtab: no3_khtab, id: id},
                success: function (html) {
                    //  alert('hh');
                    $('#no3_khtab').val('');
                    $('#div_update_no3_khtab').hide();
                    $('#div_add_no3_khtab').show();
                    // $('#Modal_esdar').modal('hide');
                    swal({
                            title: "تم التعديل!",
                        }
                    );
                    get_details_no3_khtab();
                }
            });
        });
    }
</script>
<script>
    function delete_no3_khtab(id) {
        //  confirm('?? ??? ????? ?? ????? ????? ?');
        var r = confirm('هل انت متاكد من الحذف ?');
        if (r == true) {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/delete_no3_khtab',
                data: {id: id},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    //   alert(html);
                    $('#no3_khtab').val('');
                    // $('#Modal_esdar').modal('hide');
                    swal({
                            title: "تم الحذف!",
                        }
                    );
                    get_details_no3_khtab();
                }
            });
        }
    }
</script>
<script>
    function add_reason_setting(value) {
        $('#div_update_reason_setting').hide();
        $('#div_add_reason_setting').show();
        //  alert(value);
        if (value != 0 && value != '') {
            var dataString = 'reason_setting=' + value;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/add_reason_setting',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    //  $('#reason').val(' ');
                    $('#reason_setting').val('');
                    //  $('#Modal_esdar').modal('hide');
                    swal({
                            title: "تمت الاضافه بنجاح!",
                        }
                    );
                    get_reason_end();
                }
            });
        }
    }
</script>
<script>
    function update_reason_setting(id) {
        var id = id;
        $('#geha_input6').show();
        $('#div_add_reason_setting').hide();
        $('#div_update_reason_setting').show();
        $.ajax({
            url: "<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/getById_reason_setting",
            type: "Post",
            dataType: "html",
            data: {id: id},
            success: function (data) {
                var obj = JSON.parse(data);
                //console.log(obj);
                console.log(obj.title);
                $('#reason_setting').val(obj.title);
            }
        });
        $('#update_reason_setting').on('click', function () {
            var reason_setting = $('#reason_setting').val();
            $.ajax({
                url: "<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/update_reason_setting",
                type: "Post",
                dataType: "html",
                data: {reason_setting: reason_setting, id: id},
                success: function (html) {
                    //  alert('hh');
                    $('#reason_setting').val('');
                    $('#div_update_reason_setting').hide();
                    $('#div_add_reason_setting').show();
                    // $('#Modal_esdar').modal('hide');
                    swal({
                            title: "تم التعديل!",
                        }
                    );
                    get_reason_end();
                }
            });
        });
    }
</script>
<script>
    function delete_reason_setting(id) {
        //  confirm('?? ??? ????? ?? ????? ????? ?');
        var r = confirm('هل انت متاكد من الحذف ?');
        if (r == true) {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/delete_no3_khtab',
                data: {id: id},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    //   alert(html);
                    $('#reason_setting').val('');
                    // $('#Modal_esdar').modal('hide');
                    swal({
                            title: "تم الحذف!",
                        }
                    );
                    get_reason_end();
                }
            });
        }
    }
</script>
<script>
    function get_details_title() {
        // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_secretary/archive/wared/Add_wared/load_title",
            beforeSend: function () {
                $('#myDiv_title_sub').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#myDiv_title_sub').html(d);
            }
        });
    }
</script>
<script>
    function getTitle(value, id) {
        $('#title_id_fk').val(id);
        $('#title_name').val(value);
        $('#Modal_title').modal('hide');
    }
</script>
<script>
    function add_title(value) {
        $('#div_update_title').hide();
        $('#div_add_title').show();
        //  alert(value);
        if (value != 0 && value != '') {
            var dataString = 'title=' + value;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/add_title',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    //  $('#reason').val(' ');
                    $('#title').val('');
                    //  $('#Modal_esdar').modal('hide');
                    swal({
                            title: "تم الحفظ!",
                        }
                    );
                    get_details_title();
                }
            });
        }
    }
</script>
<script>
    function update_title(id) {
        var id = id;
        $('#input1111').show();
        $('#div_add_title').hide();
        $('#div_update_title').show();
        $.ajax({
            url: "<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/getById_title",
            type: "Post",
            dataType: "html",
            data: {id: id},
            success: function (data) {
                var obj = JSON.parse(data);
                //console.log(obj);
                console.log(obj.title);
                $('#title').val(obj.title);
            }
        });
        $('#update_title').on('click', function () {
            var title = $('#title').val();
            $.ajax({
                url: "<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/update_title",
                type: "Post",
                dataType: "html",
                data: {title: title, id: id},
                success: function (html) {
                    //  alert('hh');
                    $('#title').val('');
                    $('#div_update_title').hide();
                    $('#div_add_title').show();
                    // $('#Modal_esdar').modal('hide');
                    swal({
                            title: "تم التعديل!",
                        }
                    );
                    get_details_title();
                }
            });
        });
    }
</script>
<script>
    function delete_title(id) {
        //  confirm('?? ??? ????? ?? ????? ????? ?');
        var r = confirm('هل انت متاكد من الحذف ?');
        if (r == true) {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/delete_title',
                data: {id: id},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    //   alert(html);
                    $('#title').val('');
                    // $('#Modal_esdar').modal('hide');
                    swal({
                            title: "تم الحذف!",
                        }
                    );
                    get_details_title();
                }
            });
        }
    }
</script>
<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/analogue-time-picker.js"></script>
<script>
    timePickerInput({
        inputElement: document.getElementById("m12h"),
        mode: 12,
        // time: new Date()
    });
</script>
<script>
    timePickerInput({
        inputElement: document.getElementById("m13h"),
        mode: 12,
        // time: new Date()
    });
</script>
<script>
    timePickerInput({
        inputElement: document.getElementById("m14h"),
        mode: 12,
        // time: new Date()
    });
</script>
<!-- ىثص -->
<script>
    /*31-8-20-om*/
    function load_tahwel_emp() {
        $('#tawel_result_mosalm').show();
        /*var type = $('input[name=esnad_to]:checked').val();*/
        var type = 1;
        //  alert(type);
        $('#tahwel_type').val(type);
        $.ajax({
            type: 'post',
            url: '<?php echo base_url()?>all_secretary/archive/wared/Add_wared/load_tahwel_emp',
            data: {type: type},
            dataType: 'html',
            cache: false,
            success: function (html) {
                $("#tawel_result_mosalm").html(html);
            }
        });
    }
</script>
<script>
   /* function GettahwelName(id, name) {
        var checkBox = document.getElementById("myCheck" + id);
        var fieldHTML = '<div><input type="hidden" name="to_user_fk[]" value=""/></div>';
        //$('#to_user_n').append("<input type='hidden' id='to_user_fk"+id+"'  name='to_user_fk' value='"+id+"'/><input type='hidden'  data-validation='required' id='to_user_fk_name"+id+"' name='to_user_fk_name' value='"+name+"'/>");
        $('#to_user_id').val(id);
        $('#to_user_n').val(name);
        $('#tahwelModal_mosalm').modal('hide');
    }*/
         function GettahwelName(id, name) {
            var checkBox = document.getElementById("myCheck" + id);
            var fieldHTML = '<div><input type="hidden" name="to_user_fk[]" value=""/></div>';
            $('#to_user_id'+wader_id).val(id);
            $('#to_user_n'+wader_id).val(name);
            $('#tahwelModal').modal('hide');
        }
</script>
<!-- اضافه جهه اساسيه -->
<!-- yara -->
<script>
    function get_details_geha_type() {
        // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_secretary/archive/wared/Add_wared/load_geha",
            beforeSend: function () {
                $('#myDiv_gehat').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#myDiv_gehat').html(d);
            }
        });
    }
</script>
<script>
    function getTitle_geha_type(value, id) {
        $('#geha_morsla_id_fk').val(id);
        $('#geha_morsla_name').val(value);
        $('#gehatModal').modal('hide');
    }
</script>
<script>
    function add_geha_type(value) {
        $('#div_update_geha_type').hide();
        $('#div_add_geha_type').show();
        //  alert(value);
        if (value != 0 && value != '') {
            var dataString = 'geha_type=' + value;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/add_geha_type',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    //  $('#reason').val(' ');
                    $('#geha_name').val('');
                    //  $('#Modal_esdar').modal('hide');
                    swal({
                            title: "تم الاضافه بنجاح!",
                        }
                    );
                    get_details_geha_type();
                }
            });
        } else {
            swal({
                    title: "برجاء ادخال البيانات!",
                }
            );
        }
    }
</script>
<script>
    function update_geha_type(id) {
        var id = id;
        $('#geha_input').show();
        $('#div_add_geha_type').hide();
        $('#div_update_geha_type').show();
        $.ajax({
            url: "<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/getById_geha_type",
            type: "Post",
            dataType: "html",
            data: {id: id},
            success: function (data) {
                var obj = JSON.parse(data);
                //console.log(obj);
                console.log(obj.name);
                $('#geha_name').val(obj.name);
            }
        });
        $('#update_geha_type').on('click', function () {
            var geha_name = $('#geha_name').val();
            $.ajax({
                url: "<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/update_geha_type",
                type: "Post",
                dataType: "html",
                data: {geha_name: geha_name, id: id},
                success: function (html) {
                    //  alert('hh');
                    $('#geha_name').val('');
                    $('#div_update_geha_type').hide();
                    $('#div_add_geha_type').show();
                    // $('#Modal_esdar').modal('hide');
                    swal({
                            title: "تم التعديل بنجاح!",
                        }
                    );
                    get_details_geha_type();
                }
            });
        });
    }
</script>
<script>
    function delete_geha_type(id) {
        swal({
                title: "هل انت متاكد من الحذف ؟",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "نعم",
                cancelButtonText: "لا",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        type: 'post',
                        url: '<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/delete_geha_type',
                        data: {id: id},
                        dataType: 'html',
                        cache: false,
                        success: function (html) {
                            swal({
                                    title: "تم الحذف بنجاح!",
                                }
                            );
                            get_details_geha_type();
                        }
                    });
                } else {
                    swal("تم الالغاء", "", "error");
                }
            });
    }
</script>
<script>
    function get_folders() {
        var wared_type = $('#wared_type').val();
        console.warn('wared_type:' + wared_type);
        if (wared_type) {
            if (wared_type == 1) {
                wared_type = 4;
            } else if (wared_type == 2) {
                wared_type = 3;
            }
            $('#mogldModal').modal('show');
            $.ajax({
                type: 'post',
                url: "<?php echo base_url();?>all_secretary/archive/sader/Add_sader/get_folders",
                data: {type: wared_type},
                beforeSend: function () {
                    $('#load_folders').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
                },
                success: function (d) {
                    $('#load_folders').html(d);
                }
            });
        } else {
            swal({
                title: "من فضلك اختر نوع الوارد ",
                type: "warning",
                confirmButtonText: "تم"
            });
        }
    }
</script>
<script>
    function make_print(row_id) {
        var request = $.ajax({
            // print_resrv -- print_contract
            url: "<?=base_url() . 'all_secretary/archive/wared/Add_wared/print_tawresa'?>",
            type: "POST",
            data: {row_id: row_id},
        });
        request.done(function (msg) {
            var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(msg);
            WinPrint.document.close();
            WinPrint.focus();
            // WinPrint.print();
            // WinPrint.close();
            WinPrint.onafterprint = function(){
                WinPrint.close();
                console.log("Printing completed...");
                location.href = '<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/compelete_details/'+row_id;

            }
        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });

    }
</script>
<script>
    function get_details_safms2ol() {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_secretary/archive/gehat/Gehat/load_safms2ol",
            beforeSend: function () {
                $('#myDiv_safms2ol').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#myDiv_safms2ol').html(d);
            }
        });
    }
</script>
<script>
    function add_mostlm() {
        $('#div_update_mostlm').hide();
        $('#div_add_mostlm').show();
        var geha_id = $('#geha_morsla_id_fk').val();
        var mostlm_name = $('#mostlm_name').val();
        var safms2ol_name = $('#safms2ol_name').val();
        var safms2ol_fk = $('#safms2ol_fk').val();
        if (geha_id != 0 && geha_id != '' && mostlm_name != '' && safms2ol_fk != '') {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/add_ms2ol',
                data: {
                    geha_id: geha_id,
                    mostlm_name: mostlm_name,
                    safms2ol_name: safms2ol_name,
                    safms2ol_fk: safms2ol_fk
                },
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $('#mostlm_name').val('');
                    $('#safms2ol_name').val('');
                    $('#safms2ol_fk').val('');
                    swal({
                            title: "تم الاضافه بنجاح!",
                        }
                    );
                    $('#myDiv_gehaa').html(html);
                }
            });
        } else {
            swal({
                    title: "برجاء ادخال البيانات!",
                }
            );
        }
    }
</script>
<script>
    function update_mostlm(id) {
        var id = id;
        $('#update_mostalm').prop("onclick", null).off("click");
        $('#mostlm_input').show();
        $('#div_add_mostlm').hide();
        $('#div_update_mostlm').show();
        $.ajax({
            url: "<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/getById_mostlm",
            type: "Post",
            dataType: "html",
            data: {id: id},
            success: function (data) {
                var obj = JSON.parse(data);
                // console.log(obj.name);
                $('#mostlm_name').val(obj.name);
                $('#safms2ol_name').val(obj.safms2ol_name);
                $('#safms2ol_fk').val(obj.safms2ol_fk);
            }
        });
        $('#update_mostalm').on('click', function () {
            var geha_id = $('#geha_morsla_id_fk').val();
            var mostlm_name = $('#mostlm_name').val();
            var safms2ol_name = $('#safms2ol_name').val();
            var safms2ol_fk = $('#safms2ol_fk').val();
            $.ajax({
                url: "<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/update_ms2ol",
                type: "Post",
                dataType: "html",
                data: {
                    row_id: id,
                    geha_id: geha_id,
                    mostlm_name: mostlm_name,
                    safms2ol_name: safms2ol_name,
                    safms2ol_fk: safms2ol_fk
                },
                success: function (html) {
                    $('#mostlm_name').val('');
                    $('#safms2ol_name').val('');
                    $('#safms2ol_fk').val('');
                    $('#div_update_mostlm').hide();
                    $('#div_add_mostlm').show();
                    // $('#Modal_esdar').modal('hide');
                    $('#update_mostalm').prop("onclick", null).off("click");
                    swal({
                            title: "تم التعديل بنجاح!",
                        }
                    );
                    $('#myDiv_gehaa').html(html);
                }
            });
        });
    }
</script>
<script>
    function delete_mostlm(row_id, geha_id) {
        swal({
                title: "هل انت متاكد من الحذف ؟",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "نعم",
                cancelButtonText: "لا",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: "<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/delete_mostlm",
                        type: "Post",
                        dataType: "html",
                        data: {row_id: row_id, geha_id: geha_id},
                        success: function (html) {
                            $('#myDiv_gehaa').html(html);
                            swal({
                                    title: "تم الحذف بنجاح!",
                                }
                            );
                        }
                    });
                } else {
                    swal("تم الالغاء", "", "error");
                }
            });
    }
</script>
<script>
    function get_disable() {
        val = $('#need_follow').val();
//console.log(val);
        if (val == 2) {
            $('#esthkak_dates').attr("disabled", "disabled");
            $('#m14h').attr("disabled", "disabled");
        } else {
            $('#esthkak_dates').removeAttr("disabled", "disabled");
            $('#m14h').removeAttr("disabled", "disabled");
        }
    }
</script>
<script>
    function GetestlamName(id, name) {
        var checkBox = document.getElementById("myCheck" + id);
        if (checkBox.checked == true) {
            $('#tarekt_estlam_name').append("<input type='hidden' id='estlam_fk" + id + "'  name='estlam_fk' value='" + id + "'/><input type='hidden'  data-validation='required' id='estlam_fk_name" + id + "' name='estlam_fk_name' value='" + name + "'/>");
            var estlam_name = [];
            $("input[name='estlam_fk_name']").each(function () {
                estlam_name.push(this.value);
            });
            var estlam_fk = [];
            $("input[name='estlam_fk']").each(function () {
                estlam_fk.push(this.value);
            });
            $('#tarekt_estlam_name').val(estlam_name);
            $('#estlam_fk_name').val(estlam_name);
            $('#tarekt_estlam').val(estlam_fk);
        } else {
            $("#estlam_fk" + id).remove();
            $("#estlam_fk_name" + id).remove();
        }
    }
</script>
<!--  -->
<!-- yara18-3 -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    function save_wared() {
        // $('#registerForm').serialize(),
        var all_inputs = $(' .wared_form [data-validation="required"]');
        var valid = 1;
        var text_valid = "";
        all_inputs.each(function (index, elem) {
            console.log(elem.id + $(elem).val());
            if ($(elem).val().length >= 1) {
                // valid=1;
                $(elem).css("border-color", "");
            } else {
                valid = 0;
                $(elem).css("border-color", "red");
            }
        });
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/add',
            data: $('#wared_form').serialize(),
            cache: false,
            beforeSend: function (xhr) {
                if (valid == 0) {
                    swal({
                        title: 'من فضلك ادخل كل الحقول ',
                        text: text_valid,
                        type: 'error',
                        confirmButtonText: 'تم',
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
                var all_inputs_set = $('.wared_form .form-control');
                all_inputs_set.each(function (index, elem) {
                    console.log(elem.id + $(elem).val());
                    $(elem).val('');
                });
                swal("تم الحفظ بنجاح", {
                    buttons: {
                        cancel: "الغاء",
                        catch: {
                            text: "طباعه الباركود",
                            value: "catch",
                        },
                        defeat: {
                            text: " طباعه الترويثه",
                            value: "defeat",
                        },
                    },
                })
                    .then((value) => {
                        switch (value) {
                            case "defeat":
                                make_print(html);
                                //   location.href = '<?php echo base_url() ?>all_secretary/archive/sader/Add_sader/add_deal/'+html;
                                break;
                            case "catch":
                                $('#myModal_print').modal('show');
                                get_print(html);
                                //location.href = '<?php echo base_url() ?>all_secretary/archive/sader/Add_sader/add_deal/'+html;
                                //$('#barcodeModal').modal('show');
                                break;
                            default:
                                swal("تم الالغاء");
                                location.href = '<?php echo base_url() ?>all_secretary/archive/wared/Add_wared/compelete_details/' + html;
                        }
                    });
//
                // if (html == 1){
                //    // show_tab('general-detailsfa');
                // }
            }
        });
    }
</script>
<!--31-8-20-om-->
<script>
    function get_type_div(value) {
        if (value == 1) {
            $('#no3_out').hide();
            $('#no3_in').show();
            $('#geha_morsla_name').removeAttr('data-validation');
            $('#geha_ekhtsas_name').removeAttr('data-validation');
            $('#morsel_name').removeAttr('data-validation');
            $('#qsm_n').attr('data-validation="required"');
            $('#edara_n').attr('data-validation="required"');
            $('#emp_name').attr('data-validation="required"');
        } else {
            $('#no3_out').show();
            $('#no3_in').hide();
            $('#geha_morsla_name').attr('data-validation="required"');
            $('#geha_ekhtsas_name').attr('data-validation="required"');
            $('#morsel_name').attr('data-validation="required"');
            $('#qsm_n').removeAttr('data-validation');
            $('#edara_n').removeAttr('data-validation');
            $('#emp_name').removeAttr('data-validation');
        }
    }
    function get_edara_type(type) {
        var text_array = ['', 'الادارة', 'القسم', 'الموظف'];
        $('#myModalLabel_header').text(text_array[type]);
        var qsm_id = $('#qsm_fk').val();
        var edara_id = $('#edara_id_fk').val();
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>all_secretary/archive/sader/Add_sader/get_edara_type",
            data: {type: type, qsm_id: qsm_id, edara_id: edara_id},
            beforeSend: function () {
                $('#load_type').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#load_type').html(d);
            }
        });
    }
    function get_edara_typ_title(value, id, type) {
        switch (type) {
            case 1:
                $('#edara_id_fk').val(id);
                $('#edara_n').val(value);
                $('#modal_type').modal('hide');
                break;
            case 2:
                $('#qsm_fk').val(id);
                $('#qsm_n').val(value);
                $('#modal_type').modal('hide');
                break;
            case 3:
                $('#emp_name').val(value);
                $('#modal_type').modal('hide');
                break;
            default:
                break;
        }
    }
</script>