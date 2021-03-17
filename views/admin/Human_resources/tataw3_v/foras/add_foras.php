<style>
    .half_d {
        width: 30% !important;
        float: right !important;
    }

    .half_dd {
        width: 70% !important;
        float: right !important;
    }
</style>

<div class="col-xs-12 no-padding" >
    <?php
    if (isset($get_foras) && !empty($get_foras)){
        echo form_open_multipart('human_resources/tataw3/foras/Foras/update_foras/'.$get_foras->id);
        $forsa_name = $get_foras->forsa_name;
        $forsa_name_abbr = $get_foras->forsa_name_abbr;
        $wasf = $get_foras->wasf;
        $anshta = $get_foras->anshta;
        $makan = $get_foras->makan;
        $shroot = $get_foras->shroot;
        $a3ed_motatw3 = $get_foras->a3ed_motatw3;
        $mobadra_code = $get_foras->mobadra_code;
        $madina = $get_foras->madina;
        $start_date = $get_foras->start_date;
        $end_date = $get_foras->end_date;
        $start_join_date = $get_foras->start_join_date;
        $end_join_date = $get_foras->end_join_date;
        $gender = $get_foras->gender;
        $tataw3_hours = $get_foras->tataw3_hours;
        $aytam_amal = $get_foras->aytam_amal;
        $moshrf_name = $get_foras->moshrf_name;
        $moshrf_jwal = $get_foras->moshrf_jwal;
        $mnazm_logo = $get_foras->mnazm_logo;

    } else{
        echo form_open_multipart('human_resources/tataw3/foras/Foras/add_foras');

        $forsa_name = '';
        $forsa_name_abbr = '';
        $wasf = '';
        $anshta = '';
        $makan = '';
        $shroot = '';
        $a3ed_motatw3 = '';
        $mobadra_code = '';
        $madina = '';
        $start_date =date('Y-m-d');
        $end_date = date('Y-m-d');
        $start_join_date = date('Y-m-d');
        $end_join_date = date('Y-m-d');
        $gender = '';
        $tataw3_hours = '';
        $aytam_amal ='';
        $moshrf_name = '';
        $moshrf_jwal = '';
        $mnazm_logo = '';
    }
    ?>
    <div class="col-xs-3 no-padding" >
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading no-padding" style="margin-bottom: 0;">
                <h4 class="panel-title">المنظم</h4>

            </div>
            <div class="panel-body" >
                <br>
                <div class="col-sm-12">
                    <?php if(!empty($mnazm_logo)) {
                        ?>
                        <img id="output" src="<?= base_url()."uploads/human_resources/tato3/foras/".$get_foras->mnazm_logo ?>" width="100%"
                        >
                        <?php
                    } else{
                        ?>
                        <img id="output" src="" width="100%">
                        <?php
                    }
                    ?>
                </div>
                <div class="form-group col-md-12 col-sm-5 col-xs-12 padding-4">
                    <label class="label">اسم المشرف </label>
                    <input type="text" name="moshrf_name"
                           value="<?= $moshrf_name?>"
                           class="form-control  "  data-validation="required">

                </div>
                <div class="form-group col-md-12 col-sm-5 col-xs-12 padding-4">
                    <label class="label"> اللوجو </label>
                    <input type="file" name="mnazm_logo"
                           onchange="loadFile(event)"
                           class="form-control  "  >

                </div>
                <div class="form-group col-md-12 col-sm-5 col-xs-12 padding-4">
                    <label class="label"> رقم هاتف المشرف </label>
                    <input type="text" name="moshrf_jwal" onkeypress="validate_number(event)"
                           value="<?= $moshrf_jwal?>"
                           onkeyup="check_length_num(this,'10','jwal_span');"
                           maxlength="10"
                           class="form-control "  data-validation="required">
                    <span id="jwal_span" style="bottom: -20px;font-size: 14px;" class="span-validation"> </span>

                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-6 no-padding" >
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading no-padding" style="margin-bottom: 0;">
                <h4 class="panel-title">وصف الفرص التطوعية</h4>
            </div>
            <div class="panel-body" >
                <div class="col-md-12 no-padding" style=" margin-top: 10px;">


                <div class="form-group col-md-6 col-sm-5 col-xs-12 padding-4">
                    <label class="label">  اسم الفرصة التطوعية  </label>
                    <input type="text" name="forsa_name" id="forsa_name"
                           value="<?= $forsa_name?>"
                           oninput="set_abbr(this.value)"
                           class="form-control  "  data-validation="required">

                </div>
                <div class="form-group col-md-6 col-sm-5 col-xs-12 padding-4">
                    <label class="label">  الاسم المختصر    </label>
                    <input type="text" name="forsa_name_abbr" id="forsa_name_abbr"
                           value="<?= $forsa_name_abbr?>"
                           class="form-control  "  >

                </div>
                <div class="form-group col-md-12 col-sm-5 col-xs-12 padding-4">
                    <label class="label">    وصف الفرصة التطوعية   </label>
                    <input type="text" name="wasf"
                           value="<?= $wasf?>"
                           data-validation="required"
                           class="form-control  " >

                </div>
                <div class="form-group col-md-12 col-sm-5 col-xs-12 padding-4">
                    <label class="label">   الأنشطة الرئيسية    </label>
                   <textarea class="form-control" name="anshta"><?= $anshta?></textarea>

                </div>
                <div class="form-group col-md-12 col-sm-5 col-xs-12 padding-4">
                    <label class="label">    وصف المكان    </label>
                    <input type="text" name="makan"
                           value="<?= $makan?>"
                           class="form-control  " >

                </div>
                <div class="form-group col-md-12 col-sm-5 col-xs-12 padding-4">
                    <label class="label">    شروط الفرصة    </label>
                    <textarea class="form-control" name="shroot"><?= $shroot?></textarea>

                </div>
                <div class="form-group col-md-12 col-sm-5 col-xs-12 padding-4">
                    <label class="label">     العائد علي المتطوع    </label>
                    <textarea class="form-control" name="a3ed_motatw3"><?= $a3ed_motatw3?></textarea>

                </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-xs-3 no-padding" >
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading no-padding" style="margin-bottom: 0;">
                <h4 class="panel-title">التفاصيل</h4>
            </div>
            <div class="panel-body" >
                <div class="col-md-12 no-padding" style=" margin-top: 10px;">

                <div class="form-group  col-md-12 col-sm-5 col-xs-12 padding-4">
                           <label class="half_d">       نوع العمل    </label>
                    <select class="form-control half_dd "  name="mobadra_code" >
                        <option value="">اختر</option>
                        <?php
                        if (isset($mobdrat) && !empty($mobdrat)){
                            foreach ($mobdrat as $row){
                                ?>
                                <option value="<?= $row->code?>"
                                    <?php
                                    if ($mobadra_code==$row->code){
                                        echo 'selected';
                                    }
                                    ?>
                                ><?= $row->title?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>

                </div>
                <div class="form-group col-md-12 col-sm-5 col-xs-12 padding-4">
                    <label class="half_d">        المدينة    </label>
                    <select class="form-control half_dd"  name="madina" >
                        <option value="">اختر</option>
                        <?php
                        if (isset($cities) && !empty($cities)){
                            foreach ($cities as $row){
                                ?>
                                <option value="<?= $row->id?>"
                                    <?php
                                    if ($madina==$row->id){
                                        echo 'selected';
                                    }
                                    ?>
                                ><?= $row->name?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>

                </div>
                <div class="form-group col-md-12 col-sm-5 col-xs-12 padding-4">
                    <label class="half_d">     تاريخ البدء    </label>
                    <input type="date"  name="start_date"
                           value="<?= $start_date?>"
                           class="form-control half_dd  " >


                </div>
                <div class="form-group col-md-12 col-sm-5 col-xs-12 padding-4">

                    <label class="half_d">     تاريخ الإنتهاء    </label>
                    <input type="date" name="end_date"
                           value="<?= $end_date?>"

                           class="form-control half_dd " >


                </div>
                <div class="form-group col-md-12 col-sm-5 col-xs-12 padding-4">

                    <label class="half_d">      بدء الانضمام    </label>
                    <input type="date" name="start_join_date"

                           value="<?= $start_join_date?>"
                           class="form-control half_dd  " >


                </div>
                <div class="form-group col-md-12 col-sm-5 col-xs-12 padding-4">

                    <label class="half_d">      انتهاء الانضمام    </label>
                    <input type="date" name="end_join_date"
                           value="<?= $end_join_date?>"

                           class="form-control half_dd  " >


                </div>
                <div class="form-group col-md-12 col-sm-5 col-xs-1   2 padding-4">

                    <?php
                     $genders = array('1'=>'نساء فقط','2'=>'رجال فقط','3'=>'نساء ورجال')
                    ?>
                    <label class="half_d">        جنس المتطوعين    </label>
                    <select class="form-control half_dd" name="gender"   style="width: 83%;" >
                        <option value="">اختر</option>
                        <?php

                            foreach ($genders as $key=>$value){
                                ?>
                                <option value="<?= $key?>"
                                    <?php
                                    if ($gender==$key){
                                        echo 'selected';
                                    }
                                    ?>
                                ><?= $value?></option>
                                <?php
                            }

                        ?>
                    </select>



                </div>
                <div class="form-group col-md-12 col-sm-5 col-xs-12 padding-4">

                    <label class="half_d">      الساعات التطوعيه    </label>
                    <input type="text"    name="tataw3_hours" onkeypress="validate_number(event)"
                           value="<?= $tataw3_hours?>"
                           class="form-control half_dd  " >


                </div>
                <div class="form-group col-md-12 col-sm-5 col-xs-12 padding-4">
                    <?php
                    $days = array('1'=>' يوميا','2'=>' أسبوعيا','3'=>' شهريا')
                    ?>

                    <label class="half_d">       أيام العمل      </label>
                    <select class="form-control half_dd"   name="aytam_amal" >
                        <option value="">اختر</option>
                        <?php

                        foreach ($days as $key=>$value){
                            ?>
                            <option value="<?= $key?>"
                                <?php
                                if ($aytam_amal==$key){
                                    echo 'selected';
                                }
                                ?>
                            ><?= $value?></option>
                            <?php
                        }

                        ?>
                    </select>


                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group col-md-12 text-center">
        <button type="submit"  class="btn btn-labeled btn-success " name="add" value="add"   >
            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
        </button>

    </div>
    <?php
    echo form_close();
    ?>

</div>
<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>
<script>
    function set_abbr(value) {
        $('#forsa_name_abbr').val(value);
    }
</script>

<script>
    function check_length_num(this_input, max_lenth, span_id) {
        if ($(this_input).val().length != max_lenth) {
            $(this_input).css("border-color", "red");
            $("#" + span_id).html("الرقم مكون من" + max_lenth + "أرقام");
            $('button[type="submit"]').attr("disabled", "disabled");
        } else {
            $(this_input).css("border-color", "green");
            $("#" + span_id).html("");
            $('button[type="submit"]').removeAttr("disabled");
        }
    }
</script>

