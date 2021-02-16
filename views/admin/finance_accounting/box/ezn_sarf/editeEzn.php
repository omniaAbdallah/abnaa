<style>
    .form-control {
        display: block;
        width: 100%;
        height: 34px;
        padding: 6px 6px;
        font-size: 16px;
        line-height: 1.42857143;
        color: #002c52;
    }
</style>
<div class="col-md-12 no-padding">
    <?php if (!empty($result)) {
        $id = $result->id;
        $ezn_date_ar = $result->ezn_date_ar;
        $about = $result->about;
        $geha_name = $result->geha_name;
        $geha_mob = $result->geha_mob;
        $type = $result->type;

            echo form_open_multipart('finance_accounting/box/ezn_sarf/Ezn_sarf_request/editeEzn/'.$id);
        }

    ?>
    <!---------------- First row ----------------------->
    <div class="col-md-12 no-padding">
        <input type="hidden" name="emp_name" value="<?= $employee_data[0]->employee ?>"/>
        <input type="hidden" name="emp_code" value="<?= $employee_data[0]->emp_code ?>"/>
        <input type="hidden" name="direct_manager_id" value="<?= $employee_data[0]->manger ?>"/>
        <input type="hidden" name="edara_n" value="<?= $employee_data[0]->edara_n ?>"/>
        <input type="hidden" name="qsm_n" value="<?= $employee_data[0]->qsm_n ?>"/>
        <div class="form-group col-md-1 col-sm-6 col-xs-6 padding-4">
            <h6 class="label ">رقم الإذن </h6>
            <input type="text"
                <?php /*if(empty($last_id)){*/ ?>
                <?php /*}else{ echo'readonly'; }*/ ?> name="ezn_num"
                   value="" onkeyup="$('#pill_num_span').html($(this).val())"
                   class="form-control  input_style_2"
                   readonly>
        </div>
        <div class="form-group col-md-2 col-sm-6 col-xs-6 padding-4">
            <h6 class="label ">تاريخ الإذن </h6>
            <input type="date" name="ezn_date" data-validation="required"
                   id="day_date" value="<?= $ezn_date_ar ?>"
                   pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])/(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])/(?:30))|(?:(?:0[13578]|1[02])-31))"
                   onchange="GetDate2($(this).val());"
                   class="form-control  input_style_2"
                   data-validation-has-keyup-event="true">
        </div>
        <div class="form-group col-md-3 col-sm-6 col-xs-6 padding-4">
            <h6 class="label "> مقدم الإذن </h6>
            <input type="text" readonly
                   class="form-control  input_style_2" value="<?= $employee_data[0]->employee ?>"
                   data-validation-has-keyup-event="true">
            <input type="hidden" name="emp_id" value="<?= $employee_data[0]->id ?>"/>
        </div>
        <div class="form-group col-md-3 col-sm-6 col-xs-6 padding-4">
            <h6 class="label "> الإدارة </h6>
            <input type="text" readonly
                   value="<?= $employee_data[0]->edara_n ?>"
                   class="form-control  input_style_2"
                   data-validation-has-keyup-event="true">
            <input type="hidden" name="edara_fk" value="<?= $employee_data[0]->edara_id ?>">
        </div>
        <div class="form-group col-md-3 col-sm-6 col-xs-6 padding-4">
            <h6 class="label "> القسم </h6>
            <input type="text" readonly
                   value="<?= $employee_data[0]->qsm_n ?>"
                   class="form-control  input_style_2"
                   data-validation-has-keyup-event="true">
            <input type="hidden" name="qsm_fk" value="<?= $employee_data[0]->qsm_id ?>">
        </div>
    </div>
    <div class="col-md-12 no-padding">
        <div class="form-group col-md-2 col-sm-6 col-xs-6 padding-4">
            <h6 class="label ">المبلغ </h6>
            <input style="font-size: 18px !important; color: red !important;" type="text" step="any" name="value"
                   id="value"
                   data-validation="required"
                   class="form-control input_style_2 " onkeyup="GetArabicNum($(this).val())"
                   value="<?php if (!empty($number_value)) {
                       echo $number_value;
                   } ?>" data-validation-has-keyup-event="true"">
        </div>
        <div class="form-group col-md-10 col-sm-6 col-xs-6 padding-4">
            <h6 class="label "><span></span> فقط </h6>
            <input type="text" step="any" readonly
                   class="form-control input_style_2 arabic_number "
                   data-validation-has-keyup-event="true" value="<?php if (!empty($number_title)) {
                echo $number_title;
            } ?>">
        </div>
    </div>
    <div class="col-md-12 no-padding">
        <div class="form-group col-md-4 col-sm-6 col-xs-6 padding-4">
            <h6 class="label ">الجهة/المستفيد </h6>
            <input list="pepople_arr" autocomplete="off" style="width:90%; float: right;" type="text" name="person_name"
                   id="person_name" class="form-control input_style_2 list"
                   value="<?= $geha_name ?>" data-validation-has-keyup-event="true"
                   onkeyup="$('#person_name_div').html($(this).val())"/>

            <input type="hidden" name="type" id="type" value="<?= $type ?>">

            <button type="button" data-toggle="modal" data-target="#myModalInfo"
                    class="btn btn-success btn-next" style="">
                <i class="fa fa-plus"></i></button>
            <datalist id="pepople_arr">
                <?php if (!empty($people_arr)){
                foreach ($people_arr as $row){ ?>
                <option value="<?= $row['title'] ?>">
                    <?php }
                    } ?>
            </datalist>
        </div>
        <div class="form-group col-md-2 col-sm-6 col-xs-6 padding-4">
            <h6 class="label ">الجوال </h6>
            <input style="font-weight: 600 !important;" type="text" onkeypress="validate_number(event)"
                   name="person_mob"
                   id="person_mob" value="<?php echo $geha_mob; ?>"
                   class="form-control input_style_2 "/>
        </div>
        <div class="form-group col-md-6 col-sm-6 col-xs-6 padding-4">
            <h6 class="label ">عبارة عن </h6>
            <input type="text" name="about" data-validation="required"
                   class="form-control input_style_2 " onkeyup="$('#about_div').html($(this).val())"
                   data-validation-has-keyup-event="true" value="<?= $about ?>">
        </div>
    </div>
    <div class="col-md-12 " id="AttachTableDiv"></div>
    <!------------------------------------------------ahmed------------------------------------------>
    <!---------------- Second row ----------------------->
    <div class="modal fade" id="myModalInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document" style="width: 70%">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">الجهة/ المستفيد</h4>
                </div>
                <div class="modal-body">
                    <?php
                    $k_type_arr = array('1' => 'الموظفين', '2' => 'الأسر', '3' => 'الجمعية العمومية', '4' => 'المتطوعين', '5' => 'الجهات والمؤسسات');
                    if (isset($k_type_arr) && !empty($k_type_arr)) {
                        foreach ($k_type_arr as $key => $value) {
                            $checked = '';
                            if (isset($edit) && $edit['type']) {
                                $checked = 'checked';
                            }
                            ?>
                            <input type="radio" name="fe2a" style="margin-right: 15px"
                                   onclick="GetDiv('myDiv',<?= $key ?>)" value="<?= $key ?>" <?= $checked ?>
                                <?php if (!empty($$key)) {
                                    if ($$key == 1) {
                                        ?> checked <?php }
                                } ?>>
                            <label for="square-radio-1"><?= $value ?></label>
                            <?php
                        }
                    }
                    ?>
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
    <div class="col-xs-12 text-center" style="margin-top: 45px;">
        <button type="submit" class="btn btn-labeled btn-success " name="save" value="save">
            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
        </button>
    </div>
    <?php echo form_close() ?>
</div>



<script>
    function validate_number(evt) {
        var theEvent = evt || window.event;
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode(key);
        var regex = /[0-9]|\./;
        if (!regex.test(key)) {
            theEvent.returnValue = false;
            if (theEvent.preventDefault) theEvent.preventDefault();
        }
    }
</script>


<!------------------------------------start---------------------------->

<script>
    function GetDiv(div, valu) {
        if (valu == 1) {
            var html = ('<div class="col-md-12"><table id="js_table_members" class="table table-striped table-bordered dt-responsive nowrap " >' +
                '<thead><tr><th style="width: 50px;">#</th><th style="width: 50px;"> كود الموظف </th><th style="width: 170px;" >إسم الموظف </th><th style="width: 170px;" >الإدارة</th>' +
                '<th style="width: 170px;" >القسم</th></tr></thead><table><div id="dataMember"></div></div>');
            var Columns = {
                aoColumns: [
                    {"bSortable": true},
                    {"bSortable": true},
                    {"bSortable": true},
                    {"bSortable": true}
                ]
            };
        } else if (valu == 2) {
            var html = ('<div class="col-md-12"><table id="js_table_members" class="table table-striped table-bordered dt-responsive nowrap " >' +
                '<thead><tr><th style="width: 50px;">#</th><th style="width: 50px;"> رقم الملف </th><th style="width: 170px;" >إسم رب الأسرة </th><th style="width: 170px;" >رقم هوية الاب</th> <th style="width: 170px;" >إسم مسئول الحساب البنكي</th> <th style="width: 170px;" >رقم هوية</th>' +
                '</tr></thead><table><div id="dataMember"></div></div>');
            var Columns = {
                aoColumns: [
                    {"bSortable": true},
                    {"bSortable": true},
                    {"bSortable": true},
                    {"bSortable": true},
                    {"bSortable": true}
                ]
            };
        } else if (valu == 3) {
            var html = ('<div class="col-md-12"><table id="js_table_members" class="table table-striped table-bordered dt-responsive nowrap " >' +
                '<thead><tr><th style="width: 10px;">#</th><th style="width: 50px;" > الإسم </th><th style="width: 50px;">رقم الهوية</th>' +
                '</tr></thead><table><div id="dataMember"></div></div>');
            var Columns = {
                aoColumns: [
                    {"bSortable": true},
                    {"bSortable": true},
                    {"bSortable": true}
                ]
            };
        } else if (valu == 4) {
            var html = ('<div class="col-md-12"><table id="js_table_members" class="table table-striped table-bordered dt-responsive nowrap " >' +
                '<thead><tr><th style="width: 10px;">#</th><th style="width: 50px;"> الإسم </th>' +
                '</tr></thead><table><div id="dataMember"></div></div>');
            var Columns = {
                aoColumns: [
                    {"bSortable": true},
                    {"bSortable": true}
                ]
            };
        } else if (valu == 5) {
            var html = ('<div class="col-md-12"><table id="js_table_members" class="table table-striped table-bordered dt-responsive nowrap " >' +
                '<thead><tr><th style="width: 10px;">#</th><th style="width: 50px;"> الإسم </th>' +
                '</tr></thead><table><div id="dataMember"></div></div>');
            var Columns = {
                aoColumns: [
                    {"bSortable": true}
                ]
            };
        }
        $("#" + div).html(html);
        $('#type').val(valu);
        $('#js_table_members').show();
        var F2aType = valu;
        var oTable_usergroup = $('#js_table_members').DataTable({
            dom: 'Bfrtip',
            "ajax": '<?php echo base_url(); ?>finance_accounting/box/ezn_sarf/Ezn_sarf_request/getConnection/' + F2aType,
            Columns
            ,
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
    function GetMemberName(valu) {
        var id = valu;
        var name = $("#member" + valu).data('name');
        var mob = $("#member" + valu).data('mob');
        var mother_num = $("#member" + valu).data('mother_num');
        var type = $("#member" + valu).data('type');
        $('#person_name').val(name);
        $('#person_name_div').html(name);
        $('#person_span').html(name);
        $('#person_mob').val(mob);
        if (mother_num != '') {
            $('#mother_national_num').val(mother_num);
        }
        if (type != '') {
            $('#type').val(type);
        }
        $("#myModalInfo .close").click();
    }
</script>
<script>
    function GetArabicNum(valu) {
        if (valu != 0 && valu != '') {
            var dataString = 'number=' + valu;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>finance_accounting/box/ezn_sarf/Ezn_sarf_request/GetArabicNum',
                data: dataString,
                cache: false,
                success: function (json_data) {
                    var JSONObject = JSON.parse(json_data);
                    $('.arabic_number').val(JSONObject['title']);
                    $('.arabic_number2').html(JSONObject['value']);
                    $('#arabic_number_span').html(JSONObject['title']);
                }
            });
        }
    }
</script>
<script>
    function GetDate2(valu) {
        $('#day_date_span').html(valu);
    }
</script>

