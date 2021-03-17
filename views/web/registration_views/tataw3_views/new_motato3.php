<style type="text/css">
    .inner-heading {
        background-color: #9ed6f3;
        padding: 10px;
    }

    .pop-text {
        background-color: #009688;
        color: #fff;
        padding: 7px;
        font-size: 14px;
        margin-bottom: 3px;
        margin-top: 3px;
    }

    .pop-text1 {
        background-color: #eee;
        padding: 7px;
        font-size: 14px;
        margin-bottom: 3px;
        margin-top: 3px;
    }

    .pop-title-text {
        margin-top: 4px;
        margin-bottom: 4px;
        padding: 6px;
        background-color: #9ed6f3;
    }

    .span-validation {
        color: rgb(255, 0, 0);
        font-size: 12px;
        position: absolute;
        bottom: -10px;
        right: 50%;
    }

    .astric {
        color: red;
        font-size: 25px;
        position: absolute;
    }

    .help-block.form-error {
        color: #a94442 !important;
        font-size: 11px !important;
        position: absolute !important;
        bottom: -23px !important;
        right: 50% !important;
    }

    /**************************/
    /* 27-1-2019 */
    /**************************/
    /* 27-1-2019 */
    label.label-green {
        height: auto;
        line-height: unset;
        font-size: 14px !important;
        font-weight: 600 !important;
        text-align: right !important;
        margin-bottom: 0;
        background-color: transparent;
        color: #002542;
        border: none;
        padding-bottom: 0;
        font-weight: bold;
    }

    .half {
        width: 100% !important;
        float: right !important;
    }

    .input-style {
        border-radius: 0px;
        border-right: 1px solid #eee;
    }

    .form-group {
        margin-bottom: 0px;
    }

    .bootstrap-select > .btn {
        width: 100%;
        padding-right: 5px;
    }

    .bootstrap-select.btn-group .dropdown-toggle .caret {
        right: auto !important;
        left: 4px;
    }

    .bootstrap-select.btn-group .dropdown-toggle .filter-option {
        font-size: 15px;
    }

    /*.form-control{
        font-size: 15px;
        color: #000;
        border-radius: 4px;
        border: 2px solid #b6d089 !important;
    }
    .form-control:focus {
        border: 2px solid #b6d089;
        -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
        box-shadow: 2px 2px 2px 1px #beffc3;
    }*/
    .has-success .form-control {
        border: 2px solid #b6d089;

        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
    }

    .has-success .form-control:focus {
        border: 2px solid #b6d089;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        box-shadow: 2px 2px 2px 1px #beffc3;
    }

    .nav-tabs > li > a {
        color: #222;
        font-weight: 500;
        background-color: #e6e6e6;
        font-size: 15px;
    }

    .tab-content {
        margin-top: 15px;
    }

    .label_title_2 {
        color: #002542;
    }

    .label {
        display: inline;
        padding: .2em .6em .3em;
        font-size: 100%;
        font-weight: 700;
        line-height: 1;
        color: #191818;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: .25em;
    }


    /******************************************/
    /*******************************************/

    /******************************/
    /**************/
    .check-style {
        display: inline-block;
        margin-left: 10px;
        margin-bottom: 10px;
    }

    .check-style input[type=checkbox] + label {
        display: block;
        margin: 0;
        cursor: pointer;
        padding: 0;
    }

    .check-style input[type=checkbox] {
        display: none;
    }

    .check-style input[type=checkbox] + label:before {
        content: "\2714";
        border: 0.1em solid #000;
        border-radius: 0.2em;
        display: inline-block;
        width: 20px;
        height: 20px;
        line-height: 20px;
        margin-left: 10px;
        text-align: center;
        /* padding-left: 0.2em; */
        /* padding-bottom: 0.3em; */
        /* margin-right: 0.2em; */
        vertical-align: bottom;
        color: transparent;
        transition: .2s;
    }

    .check-style input[type=checkbox] + label:active:before {
        transform: scale(0);
    }

    .check-style input[type=checkbox]:checked + label:before {
        background-color: MediumSeaGreen;
        border-color: MediumSeaGreen;
        color: #fff;
    }

    .check-style input[type=checkbox]:disabled + label:before {
        transform: scale(1);
        border-color: #aaa;
    }

    .check-style input[type=checkbox]:checked:disabled + label:before {
        transform: scale(1);
        background-color: #bfb;
        border-color: #bfb;
    }

    .radio-content input[type="radio"]:checked:disabled + .radio-label:before {
        background-color: #0b4332;
        box-shadow: inset 0 0 0 4px #f4f4f4;
    }

    /*************************/


    .radio-content {
        display: inline-block;
        width: auto;
        margin-left: 10px;
    }

    .radio-content input[type="radio"] {
        position: absolute;
        opacity: 0;
    }

    .radio-content input[type="radio"] + .radio-label:before {
        content: '';
        background: #f4f4f4;
        border-radius: 100%;
        border: 1px solid #b4b4b4;
        display: inline-block;
        width: 1.4em;
        height: 1.4em;
        position: relative;
        top: 2px;
        margin-left: 10px;
        vertical-align: top;
        cursor: pointer;
        text-align: center;
        transition: all 250ms ease;
    }

    .radio-content input[type="radio"]:checked + .radio-label:before {
        background-color: #0b4332;
        box-shadow: inset 0 0 0 4px #f4f4f4;
    }

    .radio-content input[type="radio"]:focus + .radio-label:before {
        outline: none;
        border-color: #0b4332;
    }

    .radio-content input[type="radio"]:disabled + .radio-label:before {
        box-shadow: inset 0 0 0 4px #f4f4f4;
        border-color: #b4b4b4;
        background: #b4b4b4;
    }

    .radio-content input[type="radio"] + .radio-label:empty:before {
        margin-right: 0;
    }

    .adder {
        border-top-left-radius: 14px;
        border-bottom-right-radius: 14px;
        box-shadow: 1px 2px 3px 2px #0b4332;
    }

    .main_content .well {
        background: #95c63c;
        color: #fff;
        font-size: 18px;
        border-radius: 0;
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

if ($this->uri->segment(5) == "") {
    $disabled_f2a = '';
    $action = 'حفظ';
    echo form_open_multipart('registration/Tato3/new_motato3');
} else {
    echo form_open_multipart('human_resources/tataw3/Tataw3_c/edit_volunteer/' . $this->uri->segment(5));
    $disabled = '';
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
}
?>


<section class="banner_page" style=" background: url(<?= base_url() . 'asisst/web_asset/' ?>img/profile-bg.jpg);">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="#">الرئيسية</a></li>
            <li class="active"><a href="#">تسجيل متطوع جديد</a></li>
        </ol>
    </div>
</section>
<section class="main_content pbottom-30 ptop-30">

    <div class="container">
        <div class="background-white content_page">
            <div class="col-md-12">

                <div class="panel-body">
                    <?php

                    if (($this->session->flashdata('success'))) {
                        ?>
                        <script> swal({
                                title: "تم تسجيل طلبك بنجاح سيتم التواصل معك من خلال الموظف المختص بالجمعيه ",
                                confirmButtonText: "تم"
                            });
                        </script>
                        <!-- <div class="col-md-12 alert alert-success alert-dismissable"> نجاح !...تمت اضافة البيانات بنجاح </div> -->

                        <?php
                    }
                    ?>
                    <div class="form-group col-sm-12 col-xs-12">
                        <!-- <h4 class="r-h4"></h4> -->
                        <div class="col-md-12">
                            <div class="well well-sm">البيانات الشخصية</div>
                        </div>
                        <?php
                        echo validation_errors();
                        ?>
                        <div class="setup-head col-md-12 no-padding">
                            <div class="form-group col-sm-12 col-xs-12">

                                <div class="form-group col-sm-4 col-xs-12  padding-4" style="    float: left;
    margin-left: 323px;">
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
   
">


                            </div>
                        </div>

                    </div>

                    <div class="form-group col-sm-12 col-xs-12">
                        <div class="col-md-12">
                            <div class="well well-sm">المجالات والبرامج المطلوب التطوع بها</div>
                        </div>
                        <span class="text-danger "><?php echo form_error('fields[]'); ?></span>
                        <!-- <h4 class="r-h4">المجالات والبرامج المطلوب التطوع بها</h4> -->
                        <?php
                        //echo '<pre>'; print_r($volunteer_detail_field);
                        if (isset($fields) && $fields != null) {
                            foreach ($fields as $field) {

                                ?>
                                <div class="col-xs-3 check-style">
                                    <input class="check_large" type="checkbox" id="gridCheck<?= $field->id; ?>"
                                           name="fields[]" value="<?= $field->id ?>"
                                           data-validation="validate_checkbox_group"
                                           data-validation-qty="1-<?= sizeof($fields) ?>">
                                    <label class="form-check-label"
                                           for="gridCheck<?= $field->id; ?>"><?= $field->title ?></label>
                                </div>
                                <?
                            }
                        }
                        ?>
                    </div>

                    <div class="form-group col-sm-12 col-xs-12">
                        <div class="col-md-12">
                            <div class="well well-sm">ما هو سبب الرغبة بالتطوع لدى الجمعية</div>
                        </div>
                        <span class="text-danger "><?php echo form_error('reasons[]'); ?></span>
                        <!-- <h4 class="r-h4">ما هو سبب الرغبة بالتطوع لدى الجمعية</h4> -->
                        <?php
                        //echo '<pre>'; print_r($volunteer_detail_reason);
                        if (isset($reasons) && $reasons != null) {
                            foreach ($reasons as $reason) {

                                ?>
                                <div class="col-xs-3 check-style">
                                    <input class="check_large" type="checkbox" id="grid<?= $reason->id; ?>"
                                           name="reasons[]"
                                           value="<?= $reason->id ?>" data-validation="validate_checkbox_group"
                                           data-validation-qty="1-<?= sizeof($reasons) ?>">
                                    <label class="form-check-label"
                                           for="grid<?= $reason->id; ?>"><?= $reason->title ?></label>
                                </div>
                                <?
                            }
                        }
                        ?>
                    </div>

                    <div class="form-group col-sm-12 col-xs-12">
                        <div class="well well-sm">الأيام والفترات التي أستطيع أن أتطوع بها</div>

                        <!-- <h4 class="r-h4">الأيام والفترات التي أستطيع أن أتطوع بها</h4> -->
                    </div>


                    <div class="col-md-12 padd">
                        <div class="col-xs-2">
                            <label> الأيام</label>
                            <span class="text-danger "><?php echo form_error('dayes[]'); ?></span>
                        </div>
                        <div class="col-xs-9 r-input" style="padding-left: 0 !important">
                            <?php
                            $allDayes = array();

                            if (isset($volunteer)) {
                                $allDayes = unserialize($volunteer['dayes']);
                            }
                            foreach ($dayes as $key => $value) {

                                ?>

                                <div class=" check-style" style="padding-left: 0 !important">

                                    <input class="check_large" type="checkbox" id="gridcc<?= $key ?>" name="dayes[]"
                                           value="<?= $key ?>" data-validation="validate_checkbox_group"
                                           data-validation-qty="1-<?= sizeof($dayes) ?>"
                                           onchange="make_all_checked(<?= $key ?>)">
                                    <label class="form-check-label" for="gridcc<?= $key ?>"><?= $value ?></label>
                                    &emsp;&emsp;
                                </div>
                            <? } ?>


                        </div>
                    </div>

                    <div class="col-md-12 padd">
                        <div class="col-xs-3">
                            <label> الفترات</label>
                            <span class="text-danger "><?php echo form_error('period[]'); ?></span>
                        </div>
                        <div class="col-xs-10 r-input" style="padding-left: 0 !important">
                            <?php
                            $allPeriods = array();
                            if (isset($volunteer)) {
                                $allPeriods = unserialize($volunteer['period']);
                            }
                            foreach ($period as $key => $value) {

                                ?>
                                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;
                                <div class="check-style" style="padding-left: 0 !important">
                                    <input class="check_large" type="checkbox" id="gridcv<?= $key ?>" name="period[]"
                                           value="<?= $key ?>" data-validation="validate_checkbox_group"
                                           data-validation-qty="1-<?= sizeof($period) ?>">
                                    <label class="form-check-label" for="gridcv<?= $key ?>"><?= $value ?></label>
                                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;
                                </div>
                            <? } ?>

                        </div>
                    </div>


                    <div class="form-group col-sm-12 col-xs-12 text-center">
                        <button type="submit" class="btn btn-labeled btn-success btn-purple" name="add"
                                value="حفظ" <?= $disabled ?> ><span class="btn-label"><i
                                        class="glyphicon glyphicon-floppy-disk"></i></span> حفظ
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


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

<script src="<?php echo base_url() ?>asisst/web_asset/js/jquery.form-validator.js"></script>
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
        //var dataString = 'id_card=' + argument + 'f2a_talab=' + f2a_talab;
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>registration/Tato3/checkUnique',
            data: {id_card: id_card, f2a_talab: f2a_talab},
            cache: false,
            success: function (result) {
                var obj = JSON.parse(result);
                console.log(obj);
                if (obj === null) {
                    document.getElementById('checkUnique').innerHTML = 'رقم الهوية جديد';
                    $('.btn-purple').removeAttr('disabled');
                } else {
                    document.getElementById('checkUnique').innerHTML = 'تم إدخال رقم الهوية من قبل';
                    $('.btn-purple').attr('disabled', 'disabled');
                }
            }
        });
    }

</script>

<script type="text/javascript" src="<?php echo base_url(); ?>/asisst/web_asset/js/jquery-1.10.1.min.js"></script>

<?php if ($this->uri->segment(5) == '') {
    ?>
    <script>
        $(document).ready(function () {
            load_tahwel();
        });

        function load_tahwel() {
            $('#tawel_result').show();
            var type = $('input[name=esnad_to]:checked').val();
            //  alert(type);
            $('#tahwel_type').val(type);

            $.ajax({
                type: 'post',
                url: '<?php echo base_url()?>registration/Tato3/load_tahwel',
                data: {type: type},
                dataType: 'html',
                cache: false,
                success: function (html) {

                    $("#tawel_result").html(html);
                }
            });
        }
    </script>
<?php } else { ?>
    <script>
        $(document).ready(function () {
            load_tahwel(<?=$this->uri->segment(5)?>);
        });

        function load_tahwel(id) {
            $('#tawel_result').show();
            var type = $('input[name=esnad_to]:checked').val();
            //  alert(type);
            $('#tahwel_type').val(type);

            $.ajax({
                type: 'post',
                url: '<?php echo base_url()?>registration/Tato3/load_tahwel',
                data: {type: type, id: id},
                dataType: 'html',
                cache: false,
                success: function (html) {

                    $("#tawel_result").html(html);

                }
            });
        }
    </script>

<?php } ?>


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
            $(this_input).setAttribute("required", "required");
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

<script>
    function get_sub_select(this_value, sub_id) {
        if (this_value != "" && this_value != 0) {
            var dataString = "get_sub_id=" + this_value;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>registration/Family/GetArea',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $("#" + sub_id).html(html);
                    $("#" + sub_id).selectpicker("refresh");
                }
            });
        }
    }
</script>
<script>
    function validate(evt) {
        var theEvent = evt || window.event;

        // Handle paste
        if (theEvent.type === 'paste') {
            key = event.clipboardData.getData('text/plain');
        } else {
            // Handle key press
            var key = theEvent.keyCode || theEvent.which;
            key = String.fromCharCode(key);
        }
        var regex = /[0-9]|\./;
        if (!regex.test(key)) {
            theEvent.returnValue = false;
            if (theEvent.preventDefault) theEvent.preventDefault();
        }
    }
</script>