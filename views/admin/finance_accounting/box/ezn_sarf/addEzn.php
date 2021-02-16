<style>
    td .fa-trash {
        background: none !important;
        padding: 0px !important;
    }
    td .fa-pencil {
        background: none !important;
        padding: 0px !important;
    }
    td .fa-eye {
        background: none !important;
        padding: 0px !important;
    }
    td .fa-print {
        background: none !important;
        padding: 0px !important;
    }
</style>
<?php if ($_SESSION['role_id_fk'] == 3) { ?>
    <div class="col-md-12 no-padding">
        <?php if (!empty($result)) {
            $id = $result->id;
            $ezn_date_ar = $result->ezn_date_ar;
            $about = $result->about;
            $type = $result->type;
            $person_name = $result->person_name;
            $mob = $result->mob;
        } else {
            $id = "";
            $ezn_date_ar = date('Y-m-d');
            $person_name = "";
            $about = "";
            $type = "";
            $mob = "";
        }
        /*    $id = $this->uri->segment(6);
            if ($id == '') {
                echo form_open_multipart('finance_accounting/box/ezn_sarf/Ezn_sarf/addEzn');
            }
            else {
                echo form_open_multipart('finance_accounting/box/ezn_sarf/Ezn_sarf/addEzn/'.$id);
            }
*/
        echo form_open_multipart('finance_accounting/box/ezn_sarf/Ezn_sarf/process_add');
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
                <input list="pepople_arr" autocomplete="off" style="width:90%; float: right;" type="text"
                       name="person_name" id="person_name" class="form-control input_style_2 list"
                       value="<?= $person_name ?>" data-validation-has-keyup-event="true"
                       onkeyup="$('#person_name_div').html($(this).val())"/>
                <input type="hidden" name="mother_national_num" id="mother_national_num"
                       value="<?php if (!empty($result->mother_national_num)) {
                           echo $result->mother_national_num;
                       } ?>">
                <input type="hidden" name="type" id="type" value="<?= $type ?>">
                <input type="hidden" name="person_id_fk" id="person_id_fk"
                       value="<?php if (!empty($result->person_id_fk)) {
                           echo $result->person_id_fk;
                       } ?>">
                <button type="button" data-toggle="modal" data-target="#myModalInfo"
                        class="btn btn-success btn-next" style="">
                    <i class="fa fa-plus"></i></button>
                <datalist id="pepople_arr">
                    <?php if (!empty($people_arr)){
                    foreach ($people_arr
                    as $row){ ?>
                    <option value="<?= $row['title'] ?>">
                        <?php }
                        } ?>
                </datalist>
            </div>
            <div class="form-group col-md-2 col-sm-6 col-xs-6 padding-4">
                <h6 class="label ">الجوال </h6>
                <input style="font-weight: 600 !important;" type="text" onkeypress="validate_number(event)"
                       name="person_mob"
                       id="person_mob" value="<?php echo $mob; ?>"
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
        <div class="col-xs-12 text-center" style="    margin-top: 0px;margin-bottom: 15px;">
            <button type="submit" class="btn btn-labeled btn-success " name="save" value="save">
                <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
            </button>
        </div>
        <?php echo form_close() ?>
    </div>
<?php } ?>
<!---------------------------------------------------------------------------------------------->
<div class="col-md-12 " style="">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab1" data-toggle="tab">الأذونات الجارية </a></li>
        <li><a href="#tab2" data-toggle="tab">الأذونات المعتمدة</a></li>
        <li><a href="#tab3" data-toggle="tab">الأذونات المرفوضة</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade in active" id="tab1">
            <div class="panel-body">
                <?php if (!empty($records)) { ?>
                    <table id="example" class="table table-bordered" role="table">
                        <thead>
                        <tr class="info">
                            <th width="2%">#</th>
                            <th class="text-left">رقم الإذن</th>
                            <th class="text-left">تاريخ الإذن</th>
                            <th class="text-left">مقدم الإذن</th>
                            <th class="text-left">الإدارة</th>
                            <th class="text-left">المبلغ</th>
                            <th class="text-left">الجهة / المستفيد</th>
                            <th class="text-left">الإجراء</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (isset($records) && $records != null) {
                            $x = 1;
                            foreach ($records as $value) {
                                ?>
                                <tr>
                                    <td><?= $x++ ?></td>
                                    <td><?= $value->ezn_rkm ?></td>
                                    <td><?= $value->ezn_date_ar ?></td>
                                    <td><?= $value->emp_name ?></td>
                                    <td><?= $value->edara_n ?></td>
                                    <td><?= $value->value ?></td>
                                    <td><?= $value->geha_name ?></td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <a href="<?= base_url() . "finance_accounting/box/ezn_sarf/Ezn_sarf/morfqat_ezn/" . $value->id ?>"
                                               class="btn btn-success"><i class="fa fa-cloud-upload"></i>مرفقات</a>
                                            <?php if ($value->suspend == 0) { ?>
                                                <a href="<?= base_url() . "finance_accounting/box/ezn_sarf/Ezn_sarf/editeEzn/" . $value->id ?>"
                                                   class="btn btn-warning"><i class="fa fa-pencil"></i>تعديل</a>
                                                <a href="#" onclick="return confirm(\'Are You Sure To Delete? \')"
                                                   class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> حذف </a>
                                            <?php } ?>
                                            <a href="<?= base_url() . "finance_accounting/box/ezn_sarf/Ezn_sarf/print_namozag_ezn/" . $value->id ?>"
                                               class="btn btn-inverse"><i class="fa fa-print"></i>طباعة</a>
                                            <a target="_blank" href="#"
                                               data-toggle="modal" data-target="#transferModal" data-backdrop="static"
                                               data-keyboard="false"
                                               onclick="GetTransferPage(<?php echo $value->id; ?>, <?= $value->level ?>)"
                                               class="btn btn-purple"><i class="fa fa-list"></i>إجراء</a>
                                            <button title="تحويل الإذن" type="button" class="btn btn-labeled btn-success"
    data-toggle="modal" data-target="#transferModal"   data-backdrop="static" data-keyboard="false"
onclick="GetTransferPage(<?php echo $value->id; ?>, <?= $value->level ?>)" >
<span class="btn-label"><i class="fa fa-undo"></i></span>
</button>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                <?php } else { ?>
                    <div style="color: red; font-size: large;" class="col-sm-12">لم يتم إضافة أذونات !!</div>
                <?php } ?>
            </div>
        </div>
        <div class="tab-pane fade" id="tab2">
            <div class="panel-body">
                <?php if (!empty($ozonat_suspended)) { ?>
                    <table id="example2" class="table table-bordered" role="table">
                        <thead>
                        <tr class="info">
                            <th width="2%">#</th>
                            <th class="text-left">رقم الإذن</th>
                            <th class="text-left">تاريخ الإذن</th>
                            <th class="text-left">مقدم الإذن</th>
                            <th class="text-left">الإدارة</th>
                            <th class="text-left">المبلغ</th>
                            <th class="text-left">الجهة / المستفيد</th>
                            <th class="text-left">الإجراء</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (isset($ozonat_suspended) && $ozonat_suspended != null) {
                            $xx = 1;
                            foreach ($ozonat_suspended as $suspend_ezn) {
                                ?>
                                <tr>
                                    <td><?= $xx++ ?></td>
                                    <td><?= $suspend_ezn->ezn_rkm ?></td>
                                    <td><?= $suspend_ezn->ezn_date_ar ?></td>
                                    <td><?= $suspend_ezn->emp_name ?></td>
                                    <td><?= $suspend_ezn->edara_n ?></td>
                                    <td><?= $suspend_ezn->value ?></td>
                                    <td><?= $suspend_ezn->geha_name ?></td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <a target="_blank" href="#"
                                               data-toggle="modal" data-target="#transferModal" data-backdrop="static"
                                               data-keyboard="false"
                                               onclick="GetTransferPage(<?php echo $suspend_ezn->id; ?>, <?= $suspend_ezn->level ?>)"
                                               class="btn btn-purple"><i class="fa fa-list"></i></a>
                                            <?php if ($suspend_ezn->suspend == '4') { ?>
                                                <a target="_blank"
                                                   href="<?= base_url() . "finance_accounting/box/ezn_sarf/Ezn_sarf/print_namozag_ezn/" . $suspend_ezn->id ?>"
                                                   class="btn btn-inverse"><i class="fa fa-print"></i>طباعة</a>
                                                   <a class="btn btn-warning btn-sm"
           href="<?= base_url() . 'finance_accounting/box/ezn_sarf/Ezn_sarf/make_sand_sarf/' . $suspend_ezn->id ?>"
           title=""> تنفيذ الصرف </a>
                                            <?php } ?>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                <?php } else { ?>
                    <div style="color: red; font-size: large;" class="col-sm-12">لا يوجد اذونات معتمدة</div>
                <?php } ?>
            </div>
        </div>
        <div class="tab-pane fade" id="tab3">
            <div class="panel-body">
                <?php if (!empty($ozonat_refused)) { ?>
                    <table id="example2" class="table table-bordered" role="table">
                        <thead>
                        <tr class="info">
                            <th width="2%">#</th>
                            <th class="text-left">رقم الإذن</th>
                            <th class="text-left">تاريخ الإذن</th>
                            <th class="text-left">مقدم الإذن</th>
                            <th class="text-left">الإدارة</th>
                            <th class="text-left">المبلغ</th>
                            <th class="text-left">الجهة / المستفيد</th>
                            <th class="text-left">الإجراء</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (isset($ozonat_refused) && $ozonat_refused != null) {
                            $xxx = 1;
                            foreach ($ozonat_refused as $refuz_ezn) {
                                ?>
                                <tr>
                                    <td><?= $xxx++ ?></td>
                                    <td><?= $refuz_ezn->ezn_rkm ?></td>
                                    <td><?= $refuz_ezn->ezn_date_ar ?></td>
                                    <td><?= $refuz_ezn->emp_name ?></td>
                                    <td><?= $refuz_ezn->edara_n ?></td>
                                    <td><?= $refuz_ezn->value ?></td>
                                    <td><?= $refuz_ezn->geha_name ?></td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <a target="_blank" href="#"
                                               data-toggle="modal" data-target="#transferModal" data-backdrop="static"
                                               data-keyboard="false"
                                               onclick="GetTransferPage(<?php echo $refuz_ezn->id; ?>, <?= $refuz_ezn->level ?>)"
                                               class="btn btn-purple"><i class="fa fa-list"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                <?php } else { ?>
                    <div style="color: red; font-size: large;" class="col-sm-12">لا يوجد اذونات معتمدة</div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<!---------------------------------------------------------------------------------------------->
<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width:70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">التفاصيل</h4>
            </div>
            <div class="modal-body" id="optionearea1">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<!---------------------------------------------------------myModals------------------------------------>
<div class="modal fade" id="transferModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width:91%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">تفاصيل التحويل</h4>
            </div>
            <form method="post" action="" id="saveAction">
                <div class="modal-body" id="optionearea2">
                </div>
                <div class="modal-footer" style="display: inline-block;width: 100%">
                    <!--   <button type="submit" class="btn btn-labeled btn-success" name="procedure_title_action" value="accept">
                          <span class="btn-label"><i class="glyphicon glyphicon-ok"></i></span>أوافق
                      </button>
  
                      <button type="submit" name="procedure_title_action" id="procedure_title_action" value="refuse" class="btn btn-labeled btn-purple">
                          <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>لا أوافق
                      </button>
  -->
                </div>
                <?php //echo form_close();
                ?>
            </form>
        </div>
    </div>
</div>
<!----- end table ------>
<div class="modal fade" id="Accounts" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width:75%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">الدليل المحاسبي </h4>
            </div>
            <div class="modal-body">
                <table id="" class="table table-bordered example" role="table">
                    <thead>
                    <tr class="info">
                        <th width="2%">#</th>
                        <th class="text-left">رقم الحساب</th>
                        <th class="text-left">إسم الحساب</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (isset($tree) && $tree != null) {
                        buildTreeTable($tree);
                    }
                    function buildTreeTable($tree, $count = 1)
                    {
                        $types = array(1 => 'رئيسي', 2 => 'فرعي');
                        $nature = array('', 'مدين', 'دائن');
                        $follow = array(1 => 'ميزانية', 2 => 'قائمة الأنشطة');
                        $colorArray = array(1 => '#FFB61E', 2 => '#3c990b', 3 => '#5b69bc', 4 => '#E5343D', 5 => '#d9edf7');
                        foreach ($tree as $record) {
                            $onclick = "alert('ليس حساب فرعي');";
                            if ($record->hesab_no3 == 2) {
                                $onclick = "$('#account').val('" . $record->code . " " . $record->name . "'); $('#band_name').val('" . $record->name . "'); $('#band_code').val('" . $record->code . "'); $('#Accounts').modal('hide');";
                            }
                            ?>
                            <tr style="background-color: <?= $colorArray[$record->level] ?>; cursor: pointer;"
                                onclick="<?= $onclick ?>">
                                <td><?= $count++ ?></td>
                                <td><?= $record->code ?></td>
                                <td><?= $record->name ?></td>
                            </tr>
                            <?php
                            if (isset($record->subs)) {
                                $count = buildTreeTable($record->subs, $count++);
                            }
                        }
                        return $count;
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<!------------------------------------------------------------->
<div class="modal fade" id="myModalInfo44" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">قائمة الاذونات</h4>
            </div>
            <div class="modal-body">
                <div id="all_ezn"></div>
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <button type="button" class="btn btn-danger"
                        style="float: left;" data-dismiss="modal">إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<!------------------------------------------------------------------------------------------------>
<script>
    function checkInputs() {
        /*     var ay7aga =document.getElementsByClassName('inputclass').value
             var value = $('.inputclass').filter(function () {
                 return this.value != '';
             });*/
        /* if ($('.inputclass').length > 0) {
             alert('some fields are empty!');
         }else {
      
             alert('some fields are empty!');
         }
      */
    }
</script>
<script>
    function add_row() {
        $(".mytable").show();
        //var x = document.getElementById('resultTable');
        var len = $(".resultTable").length + 1;
        $(".resultTable").append('<tr id="' + len + '"><td><input type="input" name="title[]" id="title"  class="form-control  " data-validation="reuqired"></td><td><input type="file" name="file[]" id="file"  class="form-control " data-validation="reuqired"></td><td><a href="#"  onclick="DeleteRow(' + len + ')"> <i class="fa fa-trash" ></i> </a></td></tr>');
    }
    function DeleteRow(valu) {
        $('#' + valu).remove();
        // var x = document.getElementById('resultTable');
        var len = $(".resultTable").length;
        if (len == 0) {
            $(".mytable").hide();
        }
    }
</script>
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
<script>
    function get_length(len, span_id) {
        if (len.length < 10) {
            document.getElementById("save").setAttribute("disabled", "disabled");
            document.getElementById("" + span_id).innerHTML = 'أقصي عدد 10 ارقام';
        }
        if (len.length > 10) {
            document.getElementById("save").setAttribute("disabled", "disabled");
            document.getElementById("" + span_id).innerHTML = 'أقصي عدد 10 ارقام';
        }
        if (len.length == 10) {
            document.getElementById("save").removeAttribute("disabled", "disabled");
            document.getElementById("" + span_id).innerHTML = '';
        }
    }
</script>
<script>
    function chek_length(inp_id, len) {
        var inchek_id = "#" + inp_id;
        var inchek = $('' + inchek_id).val();
        if (inchek.length < len) {
            document.getElementById("" + inp_id + "_span").style.color = '#F00';
            document.getElementById("" + inp_id + "_span").innerHTML = 'أقصي عدد ' + len + ' ارقام';
            document.getElementById("save").setAttribute("disabled", "disabled");
            var inchek_out = inchek.substring(0, len);
            $(inchek_id).val(inchek_out);
        }
        if (inchek.length > len) {
            document.getElementById("" + inp_id + "_span").style.color = '#F00';
            document.getElementById("" + inp_id + "_span").innerHTML = 'أقصي عدد ' + len + ' ارقام';
            document.getElementById("save").setAttribute("disabled", "disabled");
            var inchek_out = inchek.substring(0, len);
            $(inchek_id).val(inchek_out);
        }
        if (inchek.length == len) {
            document.getElementById("" + inp_id + "_span").innerHTML = '';
            document.getElementById("save").removeAttribute("disabled", "disabled");
        }
    }
</script>
<!------------------------------------start---------------------------->
<script>
    function GetF2aTypeArr(valu) {
        $('#js_table_members').show();
        var F2aType = valu;
        var oTable_usergroup = $('#js_table_members').DataTable({
            dom: 'Bfrtip',
            "ajax": '<?php echo base_url(); ?>all_Finance_resource/all_pills/AllPills/getConnection/' + F2aType,
            aoColumns: [
                {"bSortable": true},
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
<script>
    function GetTable(valu) {
        if (valu != 0 && valu != '') {
            var dataString = 'id=' + valu;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>finance_accounting/box/ezn_sarf/Ezn_sarf/GetTable',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $("#optionearea1").html(html);
                }
            });
        }
    }
    function GetTransferPage(valu, level) {
        /* $('#procedure_title_action').removeAttr('disabled');
         if (level == 0) {
             $('#saveAction').attr('action', '<?=base_url()?>finance_accounting/box/ezn_sarf/Ezn_sarf/addEmpAction');
                $('#procedure_title_action').attr('disabled', 'disabled');
            }
            if (level == 1) {
                $('#saveAction').attr('action', '<?=base_url()?>finance_accounting/box/ezn_sarf/Ezn_sarf/addModeerAction');
            }
            if (level == 2) {
                $('#saveAction').attr('action', '<?=base_url()?>finance_accounting/box/ezn_sarf/Ezn_sarf/addMohasebAction');
            }
            if (level == 3) {
                $('#saveAction').attr('action', '<?=base_url()?>finance_accounting/box/ezn_sarf/Ezn_sarf/Transformation_process');
            }
            if (level == 4) {
                $('#saveAction').attr('action', '<?=base_url()?>finance_accounting/box/ezn_sarf/Ezn_sarf/Manager_Transformation');
            }*/
        if (valu != 0 && valu != '') {
            var dataString = 'id=' + valu;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>finance_accounting/box/ezn_sarf/Ezn_sarf_request/GetTransferPage',
                data: dataString,
                dataType: 'html',
                cache: false,
                success: function (html) {
                    $("#optionearea2").html(html);
                }
            });
        }
    }
    /*  function GetTransferPage(valu, level) {
          $('#procedure_title_action').removeAttr('disabled');
          if (level == 0) {
              $('#saveAction').attr('action','<?=base_url()?>finance_accounting/box/ezn_sarf/Ezn_sarf/addEmpAction');
            $('#procedure_title_action').attr('disabled','disabled');
        }
        if (level == 1) {
            $('#saveAction').attr('action','<?=base_url()?>finance_accounting/box/ezn_sarf/Ezn_sarf/addModeerAction');
        }
        if (level == 2) {
            $('#saveAction').attr('action','<?=base_url()?>finance_accounting/box/ezn_sarf/Ezn_sarf/addMohasebAction');
        }
        if(level == 3){
            $('#saveAction').attr('action','<?=base_url()?>finance_accounting/box/ezn_sarf/Ezn_sarf/Transformation_process');
        }
        if(level == 4){
            $('#saveAction').attr('action','<?=base_url()?>finance_accounting/box/ezn_sarf/Ezn_sarf/Manager_Transformation');
        }
        if (valu !=0 &&   valu!='') {
            var dataString = 'id=' + valu ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>finance_accounting/box/ezn_sarf/Ezn_sarf/GetTransferPage',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#optionearea2").html(html);
                }
            });
        }
    }*/
    /*
     function GetTransferPage(valu) {
     if (valu !=0 &&   valu!='') {
     var dataString = 'id=' + valu ;
     $.ajax({
     type:'post',
     url: '<?php echo base_url() ?>finance_accounting/box/ezn_sarf/Ezn_sarf/GetTransferPage',
     data:dataString,
     dataType: 'html',
     cache:false,
     success: function(html){
     $("#optionearea2").html(html);
     }
     });
     }
     }*/
</script>
<!-----------------------------------------table attach---------------------->
<script>
    function GetAttachTable() {
        $('#AttachTableDiv').html('');
        $(".AttachTable").clone().appendTo('#AttachTableDiv')
        $("#myModal_attach .close").click();
    }
</script>
<script>
    function get_all_ezn(div, valu) {
        $("#" + div).html('<div class="col-md-12"><table id="js_table_members" class="table table-striped table-bordered dt-responsive nowrap " >' +
            '<thead><tr><th style="width: 50px;">#</th><th style="width: 50px;"> رقم الاذن </th><th style="width: 170px;" >تاريخ الاذن </th><th style="width: 170px;" >المبلغ</th><th style="width: 170px;" >الجهه/المستفيد </th><th style="width: 170px;" >رقم الجوال </th>' +
            '</tr></thead><table><div id="dataMember"></div></div>');
        $('#js_table_members').show();
        var oTable_usergroup = $('#js_table_members').DataTable({
            dom: 'Bfrtip',
            "ajax": '<?php echo base_url(); ?>finance_accounting/box/ezn_sarf/Ezn_sarf/get_all_ezn/',
            aoColumns: [
                {"bSortable": true},
                {"bSortable": true},
                {"bSortable": true},
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
    function get_detail(id, level) {
        window.location.href = "<?php echo base_url();?>finance_accounting/box/ezn_sarf/Ezn_sarf/eznTransform/" + id + "/" + level;
    }
</script>