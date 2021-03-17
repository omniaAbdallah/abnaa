<style type="text/css">
    .padd {
        padding: 0 15px !important;
    }

    .no-padding {
        padding: 0;
    }

    .no-margin {
        margin: 0;
    }

    .check-style {
        display: inline-block;
        margin: 0 10px;
    }

    .check-style input[type=checkbox] + label {
        line-height: 20px;
    }

    .check-style input[type=checkbox] + label:before {
        margin-left: 10px;
    }
</style>
<?php
$dayes = array('السبت', 'الأحد', 'الإثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'الجمعة');
$period = array('الصباح', 'المساء');
$answer = array(1 => 'نعم', 2 => 'لا');
$required1 = '';
$readonly1 = 'readonly';
$required2 = '';
$readonly2 = 'readonly';
$disabled = 'disabled';

    echo form_open_multipart('tataw3/Tataw3_c', array('id' => 'motato3_form'));
    $loop_page = 1;
    $disabled = '';
    $disabled_form = '';
    $action = 'تعديل';
    $disabled_f2a = 'disabled';
    if ($volunteer['another_charity'] == 1) {
        $required1 = 'required';
        $readonly1 = '';
    }
    if ($volunteer['having_disability'] == 1) {
        $required2 = 'required';
        $readonly2 = '';
    }

?>
<div class="roundedBox">
    <div class="col-xs-12 no-padding">
        <div class="stepwizard itab-2">
            <div class="stepwizard-row setup-panel" data-active="1">
                <div class="tab tab-1 stepwizard-step col-xs-4 no-padding active">
                    <a <?= $disabled_form ?> href="#step-1" type="button"
                                             class="btn obj-tablink btn-default btn-warning"> <span><i
                                    class="fa fa-home"></i> البيانات الشخصيه <b class="badge">1</b></span></a>
                </div>
                <div class="tab tab-2 stepwizard-step col-xs-4 no-padding">
                    <a <?= $disabled_form ?> href="#step-2" type="button" class="btn btn-default obj-tablink"> <span><i
                                    class="fa fa-male"></i>   المجالات واسباب التطوع <b class="badge">2</b></span></a>
                </div>
                <div class="tab tab-3 stepwizard-step col-xs-4 no-padding">
                    <a <?= $disabled_form ?> href="#step-3" type="button" class="btn btn-default obj-tablink"> <span><i
                                    class="fa fa-paperclip"></i>  فترات العمل التطوعي <b class="badge">3</b></span></a>
                </div>
            </div>
        </div>
        <div class="setup-container">
            <input type="hidden" name="add" value="add">
            <div class="setup-content" id="step-1" style="display: block;  ">
                <br>
                <div class="setup-head col-md-12 no-padding" style="    height: 460px;">
                    <div class="form-group col-sm-12 col-xs-12">
                        <div class="form-group col-sm-4 col-xs-12  padding-4"
                             style="    float: left; margin-left: 323px;">
                            <label class="label">فئه الطلب</label>
                            <div class="form-group">
                                <?php if (isset($volunteer) && !empty($volunteer['f2a_talab'] && $volunteer['f2a_talab'] == 1)) { ?>
                                    <div class="radio-content">
                                        <input type="radio" id="esnad1"
                                               name="esnad_to" <?= $disabled_f2a ?> <?php if (isset($volunteer) && !empty($volunteer['f2a_talab'] && $volunteer['f2a_talab'] == 1)) {
                                            echo 'checked';
                                        } else {
                                            echo 'checked';
                                        } ?> class="f2a_types" value="1" onclick="load_tahwel()">
                                        <label for="esnad1" class="radio-label"> فرد</label>
                                    </div>
                                <?php } elseif (isset($volunteer) && !empty($volunteer['f2a_talab'] && $volunteer['f2a_talab'] == 2)) { ?>
                                    <div class="radio-content">
                                        <input type="radio" id="esnad2"
                                               name="esnad_to" <?= $disabled_f2a ?> <?php if (isset($volunteer) && !empty($volunteer['f2a_talab'] && $volunteer['f2a_talab'] == 2)) {
                                            echo 'checked';
                                        } else {
                                            echo '';
                                        } ?> class="f2a_types" value="2" onclick="load_tahwel()">
                                        <label for="esnad2" class="radio-label"> جهه</label>
                                    </div>
                                <?php } else { ?>
                                    <div class="radio-content">
                                        <input type="radio" id="esnad1"
                                               name="esnad_to" <?= $disabled_f2a ?> <?php if (isset($volunteer) && !empty($volunteer['f2a_talab'] && $volunteer['f2a_talab'] == 1)) {
                                            echo 'checked';
                                        } else {
                                            echo 'checked';
                                        } ?> class="f2a_types" value="1" onclick="load_tahwel()">
                                        <label for="esnad1" class="radio-label"> فرد</label>
                                    </div>
                                    <div class="radio-content">
                                        <input type="radio" id="esnad2"
                                               name="esnad_to" <?= $disabled_f2a ?> <?php if (isset($volunteer) && !empty($volunteer['f2a_talab'] && $volunteer['f2a_talab'] == 2)) {
                                            echo 'checked';
                                        } else {
                                            echo '';
                                        } ?> class="f2a_types" value="2" onclick="load_tahwel()">
                                        <label for="esnad2" class="radio-label"> جهه</label>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12" id="tawel_result" style="display: none; 
    margin-top: -28px;
">
                    </div>
                </div>
                <!-----------------------------------F_members------------------------------------->
                <div class="setup-foot col-md-12 no-padding text-center">
                    <!-- <button type="button" id="button_mem_data" class="btn btn-labeled btn-success  save-btn" disabled="" name="ADD" value="ADD">
                                <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>إضافة فرد                             </button> -->
                    <button class="btn btn-danger previousBtn  btn-labeled" type="button"> <span class="btn-label"> <i
                                    class="fa fa-forward" aria-hidden="true"></i>
                            </span> السابق
                    </button>
                    <!--                   nextBtn onclick="save_main_data('step-1')"-->
                    <button style="direction: ltr;" class="btn btn-success btn_save btn-labeled" type="button"
                            onclick="save_main_data('step-1')"> <span
                                class="btn-label" style="right: auto;left: -14px;"> 
                            <i class="fa fa-backward" aria-hidden="true"></i>
                            </span>حفظ واستمرار
                    </button>
                    <input type="hidden" class="nextBtn" id="btn-step-1">
                    <!-- <button type="button" class="btn btn-labeled btn-warning " onclick="window.location='http://localhost/ABNAAv1/family_controllers/Family/AddNewRegister/screen-tab2'">
                                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>
                                    انهاء
                    </button> -->
                </div>
            </div>
            <div class="setup-content" id="step-2" style="display: none;">
                <!-------------------------------F_members----------------------------------------->
                <div class="setup-head col-md-12 no-padding" style="    height: 363px;">
                    <div class="form-group row col-sm-12 col-xs-12  padding-4">
                        <h4 class=""> المجالات والبرامج المطلوب التطوع بها
                            <span> 
                            <!-- <button type="button" data-toggle="modal" data-target="#model_add_setting"
                                           class="btn btn-success btn-next"
                                           onclick="$('#add_reson_div').hide();add_maglat()">
                        <i class="fa fa-plus"></i></button> -->
                        
                        </span></h4>
                        <div id="data_setting1">
                            <?php
                            //echo '<pre>'; print_r($volunteer_detail_field);
                            if (isset($fields) && $fields != null) {
                                foreach ($fields as $field) {
                                    $checked = '';
                                    if (isset($volunteer_detail_field) && in_array($field->id, $volunteer_detail_field)) {
                                        $checked = 'checked';
                                    }
                                    ?>
                                    <div class="col-xs-3 check-style">
                                        <input class="check_large" type="checkbox" id="gridCheck<?= $field->id; ?>"
                                               name="fields[]" value="<?= $field->id ?>"
                                               data-validation="validate_checkbox_group"
                                               data-validation-qty="1-<?= sizeof($fields) ?>" <?= $checked ?>>
                                        <label class="form-check-label"
                                               for="gridCheck<?= $field->id; ?>"><?= $field->title ?></label>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="form-group row col-sm-12 col-xs-12  padding-4">
                        <h4 class=""> ما هو سبب الرغبة بالتطوع لدى الجمعية
                            <span>
                             <!-- <button type="button" data-toggle="modal" data-target="#model_add_setting"
                                           class="btn btn-success btn-next" onclick="$('#add_reson_div').show();">
                        <i class="fa fa-plus"></i></button> -->
                        
                        </span>
                        </h4>
                        <div id="data_setting2">
                            <?php
                            //echo '<pre>'; print_r($volunteer_detail_reason);
                            if (isset($reasons) && $reasons != null) {
                                foreach ($reasons as $reason) {
                                    $checked = '';
                                    if (isset($volunteer_detail_reason) && in_array($reason->id, $volunteer_detail_reason)) {
                                        $checked = 'checked';
                                    }
                                    ?>
                                    <div class="col-xs-3 check-style">
                                        <input class="check_large" type="checkbox" id="grid<?= $reason->id; ?>"
                                               name="reasons[]" value="<?= $reason->id ?>"
                                               data-validation="validate_checkbox_group"
                                               data-validation-qty="1-<?= sizeof($reasons) ?>" <?= $checked ?>>
                                        <label class="form-check-label"
                                               for="grid<?= $reason->id; ?>"><?= $reason->title ?></label>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <!-----------------------------------F_members------------------------------------->
                <div class="setup-foot col-md-12 no-padding text-center">
                    <!-- <button type="button" id="button_mem_data" class="btn btn-labeled btn-success  save-btn" disabled="" name="ADD" value="ADD">
                                <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>إضافة فرد                             </button> -->
                    <button class="btn btn-danger previousBtn  btn-labeled" type="button"> <span class="btn-label"> <i
                                    class="fa fa-forward" aria-hidden="true"></i>
                            </span> السابق
                    </button>
                    <!--                    nextBtn-->
                    <button style="direction: ltr;" class="btn btn-success btn_save btn-labeled" type="button"
                            onclick="save_main_data('step-2')"> <span
                                class="btn-label" style="right: auto;left: -14px;"> <i class="fa fa-backward"
                                                                                       aria-hidden="true"></i>
                            </span> حفظ واستمرار
                    </button>
                    <input type="hidden" class="nextBtn" id="btn-step-2">
                    <!-- <button type="button" class="btn btn-labeled btn-warning " onclick="window.location='http://localhost/ABNAAv1/family_controllers/Family/AddNewRegister/screen-tab2'">
                                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>
                                    انهاء
                    </button> -->
                </div>
            </div>
            <div class="setup-content" id="step-3" style="display: none;">
                <br>
                <!-----------------------------------attachs------------------------------------->
                <div class="setup-head col-md-12 no-padding  padding-4" style="    height: 363px;">
                    <div class="form-group  col-sm-12 col-xs-12">
                        <h4 class="">الأيام والفترات التي أستطيع أن أتطوع بها</h4>
                    </div>
                    <div class="col-md-12 ">
                        <div class="col-xs-2  padding-4">
                            <label class="label "> الأيام</label>
                        </div>
                        <?php
                        $allDayes = array();
                        if (isset($volunteer)) {
                            $allDayes = unserialize($volunteer['dayes']);
                        }
                        foreach ($dayes as $key => $value) {
                            $checked = '';
                            if (in_array($key, $allDayes)) {
                                $checked = 'checked';
                            }
                            ?>
                            <div class="col-xs-1 check-style">
                                <input class="check_large" type="checkbox" id="gridcc<?= $key ?>" name="dayes[]"
                                       value="<?= $key ?>" data-validation="validate_checkbox_group"
                                       data-validation-qty="1-<?= sizeof($dayes) ?>" <?= $checked ?>>
                                <label class="form-check-label" for="gridcc<?= $key ?>"><?= $value ?></label>
                            </div>
                        <? } ?>
                    </div>
                    <div class="col-md-12 ">
                        <div class="col-xs-2  padding-4">
                            <label class="label "> الفترات</label>
                        </div>
                        <?php
                        $allPeriods = array();
                        if (isset($volunteer)) {
                            $allPeriods = unserialize($volunteer['period']);
                        }
                        foreach ($period as $key => $value) {
                            $checked = '';
                            if (in_array($key, $allPeriods)) {
                                $checked = 'checked';
                            }
                            ?>
                            <div class="col-xs-4 check-style">
                                <input class="check_large" type="checkbox" id="gridcv<?= $key ?>" name="period[]"
                                       value="<?= $key ?>" data-validation="validate_checkbox_group"
                                       data-validation-qty="1-<?= sizeof($period) ?>" <?= $checked ?>>
                                <label class="form-check-label" for="gridcv<?= $key ?>"><?= $value ?></label>
                            </div>
                        <? } ?>
                    </div>
                </div>
                <div class="setup-foot col-md-12 no-padding text-center">
                    <button class="btn btn-danger previousBtn  btn-labeled" type="button"> <span class="btn-label"> <i
                                    class="fa fa-forward" aria-hidden="true"></i>
                            </span> السابق
                    </button>
                   <!-- <button type="button" name="add" value="حفظ" class="btn btn-purple w-md m-b-5" <?= $disabled ?>
                            onclick="save_main_data('step-3')">
                        <span><i class="fa fa-floppy-o" aria-hidden="true"></i></span> <?= $action ?> </button>-->

                    <button  class="btn btn-success btn_save  btn-labeled" type="button" name="add" value="حفظ"
                            onclick="save_main_data('step-3')"> <span class="btn-label" >
                            <i class="fa fa-floppy-o" aria-hidden="true"></i>
                            </span>حفظ
                    </button>

                    <!--<button type="submit" id="button" class="btn btn-labeled btn-success " name="ADD" value="ADD">
                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>إضافة فرد                             </button>-->
                </div>
            </div>
            <!------------------------------------------------------------->
        </div>
    </div>
</div>
</form>
<div class="modal fade" id="my_load_pop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="my_load_popLabel"></h4>
            </div>
            <div class="modal-body">
                <div class="col-sm-12 form-group">
                    <div class="col-sm-12 form-group">
                        <div class="col-sm-3  col-md-3 padding-4 ">
                            <button type="button" class="btn btn-labeled btn-success "
                                    onclick="$('#geha_input').show();"
                                    style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                                                <span class="btn-label" id="span_id"><i
                                                            class="glyphicon glyphicon-plus"></i></span>
                            </button>
                        </div>
                    </div>
                    <div class="col-sm-12 no-padding form-group">
                        <div id="geha_input" style="display: none">
                            <div class="col-sm-3  col-md-5 padding-2 ">
                                <label class="label" id="input_label"> </label>
                                <input type="text" name="input_name" id="input_name" data-validation="required"
                                       value="" class="form-control ">
                                <input type="hidden" class="form-control" id="input_id" value="">
                                <input type="hidden" class="form-control" id="input_num" value="">
                                <input type="hidden" class="form-control" id="type" value="">
                            </div>
                            <div class="col-sm-3  col-md-2 padding-4" id="div_add">
                                <button type="button" onclick="sumit_pop()" style=" margin-top: 27px;"
                                        id="btn_pop" class="btn btn-labeled btn-success" name="save"
                                        value="1">
                                                    <span class="btn-label">
                                                        <i class="glyphicon glyphicon-floppy-disk"></i>
                                                    </span>
                                    <span id="btn_pop_span">حفظ</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                </div>
                <div id="my_load_table"></div>
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <button type="button" class="btn btn-danger" style="float: left;"
                        data-dismiss="modal">إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<!-- modal view -->
<div class="modal fade" id="myModal-view" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">الصوره</h4>
            </div>
            <div class="modal-body">
                <img src="<?= base_url() ?>uploads/human_resources/tato3/tato3_logo/<?php if (isset($volunteer)) echo $volunteer['logo_monzma']; ?>"
                     width="100%" alt="">
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
<div class="modal fade" id="myModalInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"> المدينه- الحي </h4>
            </div>
            <div class="modal-body">
                <div id="myDiv"></div>
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <button type="button" class="btn btn-danger"
                        style="float: left;" data-dismiss="modal">إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="model_add_setting" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div id="add_setting_div"></div>
                <div id="add_reson_div" style="display: none">
                    <div class="col-sm-4  col-md-3 padding-2 ">
                        <label class="label   "> سبب الرغبة بالتطوع لدى الجمعية </label>
                        <input type="text" name="resone" id="resone"
                               value="" class="form-control ">
                    </div>
                    <div class="col-sm-3  col-md-3 padding-4" id="div_add_morfq"
                         style="display: block;">
                        <button type="button" onclick="add_resones()"
                                style="    margin-top: 27px;"
                                class="btn btn-labeled btn-success" name="save" value="save">
                                            <span class="btn-label"><i
                                                        class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <button type="button" class="btn btn-danger"
                        style="float: left;" data-dismiss="modal">إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>/asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script src="<?php echo base_url(); ?>/asisst/admin_asset/plugins/icheck/icheck.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/js/jquery.form-validator.js"></script>
<script>
    var loop_page =<?=$loop_page?>;

    function show_tab(id) {
        $('a[href="#' + id + '"]').tab('show');
    }

    function save_main_data(div_id) {

        // motato3_form
        // $('#registerForm').serialize(),
        // var url = $('#mother_form').attr('action');
        // console.warn('url :: ' + url);
        var tabs = ['step-1', 'step-2', 'step-3'];

        function checkAdult(tab) {
            return tab == div_id;
        }

        var tab_index = tabs.findIndex(checkAdult);
        console.warn('tab_index :: ' + tab_index);
        var all_inputs = $(' #' + div_id + ' [data-validation="required"]');
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

        if ((!$('#current_forsa_fk').val())&&$('#current_forsa_fk').val().length < 1){
            text_valid=' الفرصة التطوعية';
            valid = 0;
        }
        var url = $('#motato3_form').attr('action');
        console.warn("url ::" + url);
        $.ajax({
            type: 'post',
            url: url,
            data: $('#motato3_form').serialize(),
            cache: false,
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
                        title: "جاري الحفظ ... ",
                        text: "",
                        imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                        showConfirmButton: false,
                        allowOutsideClick: false
                    });
                }
            },
            success: function (html) {

                if (loop_page == 0) {
                    var text_message = 'تم الاضافة بنجاح';
                } else {
                    var text_message = 'تم التعديل بنجاح';
                }
                swal({
                    title: text_message,
                    text: '',
                    type: 'success',
                    confirmButtonText: 'تم'
                });
                loop_page++;
                if (tab_index <= 2) {
                    if (tab_index == 2) {
                        console.warn('show_tab :: ' + tabs[0]);
                        show_tab(tabs[0]);
                    } else {
                        console.warn('show_tab :: ' + tabs[(tab_index + 1)]);
                        // show_tab(tabs[(tab_index + 1)]);
                        // $('a[href="#' + tabs[(tab_index + 1)] + '"]').removeAttr('disabled')
                        $('#btn-' + div_id).trigger("click");
                        $('a[href="#' + tabs[(tab_index + 1)] + '"]').removeAttr('disabled');
                        $('a[href="#' + div_id + '"]').removeAttr('disabled');
                    }
                }
            }
        });
    }
</script>
<script>
    function add_resones() {
        // add_setting_div
        $('#add_reson_div').show();
        var resone = $('#resone').val();
        if (resone.length >= 1) {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url()?>tataw3/Tataw3_c/add_reson',
                data: {title: resone},
                dataType: 'html',
                cache: false,
                beforeSend: function () {
                    swal({
                        title: "جاري الحفظ ... ",
                        text: "",
                        imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                        showConfirmButton: false,
                        allowOutsideClick: false
                    });
                },
                success: function (html) {
                    swal({
                        title: 'تم اضافة  بنجاح',
                        type: 'success',
                        confirmButtonText: 'تم'
                    });
                    $("#model_add_setting .close").click();
                    $('#resone').val("")
                    get_data_setting(2)
                }
            });
        } else {
            swal({
                title: 'من فضلك ادخل كل الحقول ',
                type: 'error',
                confirmButtonText: 'تم'
            });
            $('#resone').css("border-color", "red");
        }
    }

    function add_maglat() {
        // add_setting_div
        $.ajax({
            type: 'post',
            url: '<?php echo base_url()?>human_resources/tataw3/setting/Mgalat_setting',
            data: {from_pop: 1},
            dataType: 'html',
            cache: false,
            success: function (html) {
                $("#add_setting_div").html(html);
            }
        });
    }

    function get_data_setting(type) {
        // add_setting_div
        $.ajax({
            type: 'post',
            url: '<?php echo base_url()?>tataw3/Tataw3_c/get_data_setting',
            data: {type: type},
            dataType: 'html',
            cache: false,
            beforeSend: function () {
                $("#data_setting" + type).html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (html) {
                $("#data_setting" + type).html(html);
            }
        });
    }
</script>
<script type="text/javascript">
    function changeReadonly(val, id) {
        var obj = document.getElementById(id);
        if (val == 1) {
            obj.readOnly = false;
            obj.setAttribute('data-validation', 'required');
        } else {
            obj.readOnly = true;
            obj.removeAttribute('data-validation');
            obj.value = '';
        }
    }

    function checkUnique(argument) {
        var f2a_talab = $('input[name=esnad_to]:checked').val();
        var id_card = argument;
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>tataw3/Tataw3_c/checkUnique',
            data: {id_card: id_card, f2a_talab: f2a_talab},
            cache: false,
            success: function (result) {
                var obj = JSON.parse(result);
                console.log(obj);
                if (obj === null) {
                    $('#checkUnique').css("color", "#009688");
                    document.getElementById('checkUnique').innerHTML = 'رقم الهوية جديد';
                    $('.btn_save').removeAttr('disabled');
                } else {
                    $('#checkUnique').css("color", "red");
                    document.getElementById('checkUnique').innerHTML = 'تم إدخال رقم الهوية من قبل';

                    $('.btn_save').attr('disabled', 'disabled');
                    swal({
                        title: 'تم إدخال رقم الهوية من قبل  ',
                        type: 'warning',
                        confirmButtonText: 'تم'
                    });
                }
            }
        });
    }
</script>

    <script>
        $(document).ready(function () {
            load_tahwel(<?=$_SESSION['id']?>);
        });

        function load_tahwel(id) {
            $('#tawel_result').show();
            var type = $('input[name=esnad_to]:checked').val();
            //  alert(type);
           // $('#tahwel_type').val(type);
            $.ajax({
                type: 'post',
                url: '<?php echo base_url()?>tataw3/Tataw3_c/load_tahwel',
                data: {type: type, id: id},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $("#tawel_result").html(html);
                }
            });
        }
    </script>

<script>
    $(document).ready(function () {
        /*********/
        var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn'),
            allPreviousBtn = $('.previousBtn'),
            SaveBtn = $('.save-btn');
        allWells.hide();
        <?php $tab_show = $this->uri->segment(5, 0);
        if ($tab_show == 2) {
        ?>
        // $('a[href="#step-2"]').tab('show');
        var $target = $('#step-2'),
            $item = $('a[href="#step-2"]');
        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-warning').addClass('btn-default');
            $item.addClass('btn-warning');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
            $('.stepwizard-row ').attr('data-active', 2);
        }
        <?php }elseif ($tab_show == 3) {
        ?>
        var $target = $('#step-3'),
            $item = $('a[href="#step-3"]');
        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-warning').addClass('btn-default');
            $item.addClass('btn-warning');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
            $('.stepwizard-row ').attr('data-active', 3);
        }<?php }elseif ($tab_show == 1) {
        ?>
        var $target = $('#step-1'),
            $item = $('a[href="#step-1"]');
        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-warning').addClass('btn-default');
            $item.addClass('btn-warning');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
            $('.stepwizard-row ').attr('data-active', 1);
        }
        <?php }?>
        navListItems.click(function (e) {
            e.preventDefault();
            var $target = $($(this).attr('href')),
                $item = $(this);
            if (!$item.hasClass('disabled')) {
                navListItems.removeClass('btn-warning').addClass('btn-default');
                $item.addClass('btn-warning');
                allWells.hide();
                $target.show();
                $target.find('input:eq(0)').focus();
            }
        });
        allNextBtn.click(function () {
            var curStep = $(this).closest(".setup-content"),
                curStepBtn = curStep.attr("id"),
                nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                curInputs = curStep.find("input[type='text'],input[type='url'],select,input[type='number'],input[type='password']"),
                isValid = true;
            var datactive = $('.stepwizard-row ').attr('data-active');
            /*$(".form-group").removeClass("has-error");
            for (var i = 0; i < curInputs.length; i++) {
                if (!curInputs[i].validity.valid) {
                    isValid = false;
                    $(curInputs[i]).closest(".form-group").addClass("has-error");
                }
            }*/
            if (isValid) {
                nextStepWizard.removeAttr('disabled').trigger('click');
                if (datactive < 3) {
                    datactive++;
                    $('.stepwizard-row ').attr('data-active', datactive);
                } else {
                    $('.stepwizard-row ').attr('data-active', 1);
                }
            }
            //$(".stepwizard-row").append($moving_div);
        });
        allPreviousBtn.click(function () {
            var curStep = $(this).closest(".setup-content"),
                curStepBtn = curStep.attr("id"),
                previousStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().prev().children("a"),
                isValid = true;
            var datactive = $('.stepwizard-row ').attr('data-active');
            if (isValid) {
                previousStepWizard.removeAttr('disabled').trigger('click');
                if (datactive <= 3) {
                    datactive--;
                    $('.stepwizard-row ').attr('data-active', datactive);
                } else {
                    $('.stepwizard-row ').attr('data-active', 1);
                }
            }
        });
        $(".setup-content input,.setup-content select").bind("keyup change", function (e) {
            var curStep = $(this).closest(".setup-content"),
                curInputs = curStep.find("input,input[type='text'],input[type='url'],select,input[type='number'],input[type='password']");
            if ($(this).val() != '') {
                $(this).parent().removeClass("has-error");
            } else {
                $(this).parent().addClass("has-error");
            }
        });
        $('div.setup-panel div a.btn-warning').trigger('click');
    });
</script>
<script>
    $(".itab-2").on("click mouseover mouseout", ".tab a", function (e) {
        switch (e.type) {
            case "mouseover": // -----------
                $(this).parent().addClass("hover");
                break;
            case "mouseout": // -----------
                $(this).parent().removeClass("hover");
                break;
            case "click": // -----------
                $(this).parent().addClass("active")
                    .siblings().removeClass("active");
                $(this).parent().parent().attr(
                    "data-active",
                    $(this).parent().index() + 1
                );
                break;
            default: // -----------
                break;
        }
    });
</script>
<script>
    $('.skin-square .i-check input').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green'
    });
</script>
<script>
    function check_length_num(this_input, max_lenth, span_id) {
        if ($(this_input).val().length != max_lenth) {
            $(this_input).css("border-color", "red");
            $("#" + span_id).html("الرقم مكون من" + max_lenth + "أرقام");
            //  $(this_input).val('');
            this_input.setAttribute("required", "required");
            // document.getElementById("h_rent_amount").setAttribute("required", "required");
        } else if ($(this_input).val() == '0000000000') {
            $(this_input).css("border-color", "red");
            $("#" + span_id).html(" الرقم مكون من اصفار");
            $(this_input).val('');
            //$('button[type="submit"]').attr("disabled","disabled");
        } else {
            $(this_input).css("border-color", "green");
            $("#" + span_id).html("");
            // $('button[type="submit"]').removeAttr("disabled");
        }
    }
</script>
