<style type="text/css">
    .padd {
        padding: 0 3px !important;
    }

    .no-padding {
        padding: 0;
    }

    .no-margin {
        margin: 0;
    }

    h4 {
        margin-top: 0;
    }

    .btn-group > .btn, .btn-group > .btn + .btn, .btn-group > .btn:first-child, .fc .fc-button-group > * {
        height: 34px !important;
        border-radius: 4px !important;
        margin: 0 !important;
    }

    .bootstrap-select.btn-group .dropdown-toggle .caret {
        right: 92% !important;
    }

    .btn-label {
        left: 12px;
    }

    .tree ul {
        margin-right: 10px;
        position: relative;
        margin-left: 0;
    }

    .tree ul li {
        padding-left: 0;
    }

    .tree ul ul {
        margin-left: 0;
    }

    @media (min-width: 992px) {
        .col_md_10 {
            width: 10%;
            float: right;
        }

        .col_md_15 {
            width: 15%;
            float: right;
        }

        .col_md_20 {
            width: 20%;
            float: right;
        }

        .col_md_25 {
            width: 25%;
            float: right;
        }

        .col_md_30 {
            width: 30%;
            float: right;
        }

        .col_md_35 {
            width: 35%;
            float: right;
        }

        .col_md_40 {
            width: 40%;
            float: right;
        }

        .col_md_45 {
            width: 45%;
            float: right;
        }

        .col_md_50 {
            width: 50%;
            float: right;
        }

        .col_md_60 {
            width: 60%;
            float: right;
        }

        .col_md_70 {
            width: 70%;
            float: right;
        }

        .col_md_75 {
            width: 75%;
            float: right;
        }

        .col_md_80 {
            width: 80%;
            float: right;
        }

        .col_md_85 {
            width: 85%;
            float: right;
        }

        .col_md_90 {
            width: 90%;
            float: right;
        }

        .col_md_95 {
            width: 95%;
            float: right;
        }

        .col_md_100 {
            width: 100%;
            float: right;
        }
    }

    .label_title_2 {
        width: 100%;
        color: #000;
        height: auto;
        margin: 0;
        font-family: 'hl';
        padding-right: 0px;
        font-size: 16px;
        margin-bottom: 5px;
        margin-top: 5px;
        display: inline-block;
    }

    .input_style_2 {
        border-radius: 0px;
        width: 100%;
    }

    ul span {
        display: inline !important;
    }

    span.dalel-num {
        padding: 1px 4px;
        border-radius: 2px;
    }

    .scrol_width ::-webkit-scrollbar {
        width: 15px;
        height: 5px;
    }

    .tree li a {
        font-size: 16px;
    }

    .whitespaces {
        white-space: pre-wrap;
    }
</style>
<!-- details -->
<div class="col-sm-12 col-xs-12">
    <table class="table  table-striped table-bordered dt-responsive nowrap">
        <tbody>
        <tr>
            <th style="width: 110px">إسم الخطة</th>
            <td><span class="label" style="background-color: #32e26b">
                                  <?= $get_all->pln_name ?></span>
            </td>
            <th>تاريخ البداية</th>
            <td><?= $get_all->pln_from_date ?> </td>
        </tr>
        <tr>
        </tr>
        <tr>
            <th> الرؤية</th>
            <td>
                <p class="whitespaces"><?= $get_all->pln_roya ?></p></td>
            <th>تاريخ النهاية</th>
            <td><?= $get_all->pln_to_date ?> </td>
        </tr>
        <tr>
            <th>الرسالة</th>
            <td><p class="whitespaces"><?= $get_all->pln_resala ?></p></td>
            <th> مراجع الخطة</th>
            <td><span class="label" style="background-color: #32e26b"><?= $get_all->pln_reviser_name ?></span></td>
        </tr>
        <tr>
            <th> القيم</th>
            <td><p class="whitespaces"><?= $get_all->pln_qiam ?></p></td>
            <th>معتمد الخطة</th>
            <td><span class="label" style="background-color: #ff8080"><?= $get_all->pln_suspender_name ?></span></td>
        </tr>
        </tbody>
    </table>
</div>
</div>
<!-- details -->
<div class="col-xs-12 no-padding">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
        <!-- <div class="panel-heading">
        <div class="panel-title"><h4><?php echo $title; ?></h4></div>
    </div> -->
        <div class="panel-body">
            <!--  <div class="col-md-7 col-sm-12 col-xs-12 padding-4">          </div>     -->
            <!---------------------------------------------------------------------------->
            <div class="col-md-2 col-sm-12 col-xs-12 padding-4">
                <button type="button" class="btn btn-labeled btn-success " data-toggle="modal" data-target="#add_hdaf"
                        style="border-top-left-radius: 14px;border-bottom-right-radius: 14px;">
                    <span class="btn-label"><i class="glyphicon glyphicon-plus"></i></span>
                    إضافه هدف إستراتيجي
                </button>
            </div>
            <!-- <div class=" col-md-8 col-sm-12 col-xs-12 padding-4"><h5 class="no-margin">شجرة  </h5> -->
            <div id="myDiv_geha1111">
                <div class="panel-body" style="height: 400px; overflow-y: scroll;margin-top: 56px;">
                    <div class="col-sm-12 col-xs-12 no-padding">                    <?php function buildTree($tree)
                        {
                            $color = array(1 => '#ec9732', 2 => '#c07852', 3 => '#75bf67', 4 => '#b6ab2d', 5 => '#09b6bb', 6 => '#3088d8', 7 => '#4d92a7', 8 => '#ef6c02', 9 => '#a69fb9', 10 => '#67351b', 11 => '#b6ea47', 12 => '#e18091', 13 => '#f5f44d', 14 => '#a63daa', 15 => '#fb1f73', 16 => '#9b9a92', 17 => '#8f0e0b', 18 => '#397631', 19 => '#074183', 20 => '#cab11e');
                            ?>
                            <ul id="tree3">
                                <?php foreach ($tree as $record) { ?>
                                    <div>
                                        <li>
                                            <?php
                                            $types_ways = array(1 => 'تجميعي', 2 => 'متوسط', 3 => 'اعلي رقم', 4 => 'اقل رقم');
                                            if ($record->level == 3) { ?>
                                                المؤشر <a data-toggle="modal" data-target="#add_editAccounDalel"
                                                          onclick="add_editAccounDalel(<?= $record->id ?>,2,this,<?= $record->level ?>,$('#plan_rkm').val());">
                                        <span class="dalel-num" style="background-color: <?= $color[$record->level] ?>">                                   
                                         <?= $record->code ?></span> <?= ' - ' . $record->name ?>
                                                    <span>[<?php foreach ($types_ways as $key => $value) {
                                                            $select = '';
                                                            if ($types_ways != '') {
                                                                if ($key == $record->tareket_hesab) {
                                                                    echo $value;
                                                                }
                                                            }
                                                        } ?>-
                                         <?php
                                         $types = array(1 => 'رقم', 2 => 'نسبه');
                                         foreach ($types as $key => $value) {
                                             $select = '';
                                             if ($types != '') {
                                                 if ($key == $record->no3_wehda_quas) {
                                                     echo $value;
                                                 }
                                             }
                                         } ?>-<?= $record->want_value ?>  <?= $record->wehda_quas ?>]</span>
                                                </a>
                                            <?php } elseif ($record->level == 2) {
                                                ?>
                                                السياسة <a data-toggle="modal" data-target="#add_editAccounDalel"
                                                           onclick="add_editAccounDalel(<?= $record->id ?>,2,this,<?= $record->level ?>,$('#plan_rkm').val());"> <span
                                                            class="dalel-num"
                                                            style="background-color: <?= $color[$record->level] ?>">                                      <?= $record->code ?></span> <?= ' - ' . $record->name ?>
                                                </a>
                                            <?php } elseif ($record->level == 1) {
                                                ?>
                                                الهدف الإستراتيجي <a data-toggle="modal" data-target="#add_editAccounDalel" onclick="add_editAccounDalel(<?= $record->id ?>,2,this,<?= $record->level ?>,$('#plan_rkm').val());">
                                       <span class="dalel-num"
                                             style="background-color: <?= $color[$record->level] ?>">                                      <?= $record->code ?></span> <?= ' - ' . $record->name ?>
                                                </a>
                                            <?php } ?>
                                            <div class="pull-right">                                        <?php if ($record->parent != 0) {
                                                    if ($record->level == 3) { ?>
                                                         
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
        setTimeout(function(){window.location="<?= base_url() . 'gwd/Gawda_plans/deleteAccount/' .$record->id . '/' . $record->plan_rkm ?>";}, 500);
        });'>
    <i class="fa fa-trash"> </i></a>
                                                        <!-- yara -->
                                                        
                                                        
                                                        
                                                                                                <?php }
                                                } ?>
                                                <?php
                                                if ($record->level == 1) { ?>
                                                    <a title="إضافة" id="add_account" data-toggle="modal" data-target="#add_editAccounDalel" data-parent="<?= $record->id ?>" data-parent_name="<?= $record->name ?>" data-parent_code="<?= $record->code ?>"
                                                       data-ttype="<?= $record->ttype ?>"
                                                       data-level="<?= $record->level ?>"
                                                       onclick="add_editAccounDalel(0,1,this,<?= $record->code ?>,<?= $record->level ?>,$('#plan_rkm').val());"><i
                                                                class="fa fa-plus-square" style="
    
">
                                                            إضافه سياسة
                                                        </i></a>
                                                <?php } elseif ($record->level == 2) {
                                                    ?>
                                                    <a title="إضافة" id="add_account" data-toggle="modal" data-target="#add_editAccounDalel" data-parent="<?= $record->id ?>" data-parent_name="<?= $record->name ?>" data-parent_code="<?= $record->code ?>"
                                                       data-ttype="<?= $record->ttype ?>"
                                                       data-level="<?= $record->level ?>"
                                                       onclick="add_editAccounDalel(0,1,this,<?= $record->code ?>,<?= $record->level ?>,$('#plan_rkm').val());"><i
                                                                class="fa fa-plus-square">
                                                            إضافه مؤشر
                                                        </i></a>
                                                <?php } ?>
                                                <a data-toggle="modal" data-target="#add_editAccounDalel"
                                                   onclick="add_editAccounDalel(<?= $record->id ?>,2,this,<?= $record->level ?>,$('#plan_rkm').val());"
                                                   title="تعديل "><i
                                                            class="fa fa-pencil-square"></i>
                                                </a>
                                            </div> <?php if (isset($record->subs)) {
                                                buildTree($record->subs);
                                            } ?>
                                        </li>
                                    </div>                         <?php } ?>
                            </ul>                        <?php }

                        if (isset($tree) && $tree != null) {
                            buildTree($tree);
                        } ?>                </div>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-sm-12 col-xs-12 padding-4"></div>
    </div>
</div><!---------------------------------------------------------------------------->
<!---------------------------------------------------------------------------->
<div class="modal fade " id="add_editAccounDalel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog " style="width: 55%" role="document">
        <div class="modal-content" id="load_Accoun">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="add_editAccounDalel_title"></h4></div>
            <div class="modal-body">
                <div class="container-fluid">
                    <input type="hidden" id="plan_rkm" name="plan_rkm"
                           value="<?php echo $this->uri->segment(4); ?>">
                    <div class="  col-xs-12 no-padding" id="load_Accoun"></div>
                </div>
            </div>
            <div class="modal-footer">
                <span class=" label-danger" id="save_start_work_span" style="display: none;float: right">  </span>
                <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal"><span
                            class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<!-- yara -->
<div class="modal fade" id="add_hdaf" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 55%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title "> إضافه هدف إستراتيجي</</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid panel  panel-bd">
                    <?php echo form_open(base_url() . 'gwd/Gawda_plans_request/add_hadaf', array('id' => 'add_hadaf_form')) ?>
                    <div class="col-sm-12 form-group panel-body">
                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-sm-4">
                                <label class=""> الهدف الإستراتيجي </label>
                            </div>
                            <div class="col-xs-8 r-input">
                                <textarea class="form-control" style="margin: 0px 0px 0px -1.21528px;height: 59px;"
                                          name="name" id="hdaf_name" data-validation="required"></textarea>
                                <input type="hidden" id="plan_rkm" name="plan_rkm"
                                       value="<?php echo $this->uri->segment(4); ?>">
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 inner-side r-data">
                            <div class="col-sm-4">
                                <label class=""> الترتيب </label>
                            </div>
                            <div class="col-xs-8 r-input">
                                <input type="number" name="code" id="code"
                                       oninput="Checkcode(1,<?php echo $this->uri->segment(4); ?>);"
                                       data-validation="required"
                                       value="<?php echo $last_hdf; ?>" class="form-control ">
                            </div>
                        </div>
                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="add_hdaf(1,$('#plan_rkm').val())"
                        class="btn btn-labeled btn-success" name="save" value="save">
                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span> إضافه
                </button>
                <button type="button" onclick="add_hdaf(2,$('#plan_rkm').val())"
                        class="btn btn-labeled btn-success" name="save" value="save">
                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span> إضافه واستمرار
                </button>
                <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal"><span
                            class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<!-- yara -->
<!--<script type="text/javascript" src="--><?php //echo base_url() ?><!--asisst/admin_asset/js/jquery-1.10.1.min.js"></script>-->
<script>
    function save_account(type, plan_rkm) {
        // $('#registerForm').serialize(),
        var all_inputs = $('#load_Accoun [data-validation="required"]');
        var valid = 1;
        var text_valid = "";
        all_inputs.each(function (index, elem) {
            console.log(elem.id + $(elem).val());
            if ($(elem).val().length >= 1) {
                // valid = 1;
                $(elem).css("border-color", "");
            } else {
                valid = 0;
                $(elem).css("border-color", "red");
            }
        });
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>gwd/Gawda_plans_request/addAccount',
            data: $('#MyFormDalil').serialize(),
            cache: false,
            beforeSend: function (xhr) {
                if (valid == 0) {
                    swal({title: 'من فضلك ادخل كل الحقول ', text: text_valid, type: 'error', confirmButtonText: 'تم'});
                    xhr.abort();
                } else if (valid == 1) {
                    swal({
                        title: "جاري الإرسال ... ",
                        text: "",
                        imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                        showConfirmButton: false,
                        allowOutsideClick: false
                    });
                    $(' button[name="save"]').attr("disabled", "disabled");

                }
            },
            success: function (html) {
                swal({title: 'تم إضافه  بنجاح', type: 'success', confirmButtonText: 'تم'});
                $(' button[name="save"]').removeAttr("disabled");

                if (type == 1) {
                    $('#add_editAccounDalel').modal('hide');
                    GetDiv_tree('myDiv_geha1111', plan_rkm);
                    // location.reload();
                } else if (type == 2) {
                    getCode();
                    $('#name').val('');
                    var level = parseFloat($('#level').val()) - 1;
                    $('#level').val(level);
                    GetDiv_tree('myDiv_geha1111', plan_rkm);
                }
            }
        });
    }

    // yara
    function save_account_mo24er(type, plan_rkm) {
        // $('#registerForm').serialize(),
        var all_inputs = $('#load_Accoun [data-validation="required"]');
        var valid = 1;
        var text_valid = "";
        all_inputs.each(function (index, elem) {
            console.log(elem.id + $(elem).val());
            if ($(elem).val().length >= 1) {
                //  valid = 1;
                $(elem).css("border-color", "");
            } else {
                valid = 0;
                $(elem).css("border-color", "red");
            }
        });
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>gwd/Gawda_plans_request/addAccount_mo24er',
            data: $('#MyFormmo24er').serialize(),
            cache: false,
            beforeSend: function (xhr) {
                if (valid == 0) {
                    swal({title: 'من فضلك ادخل كل الحقول ', text: text_valid, type: 'error', confirmButtonText: 'تم'});
                    xhr.abort();
                } else if (valid == 1) {
                    swal({
                        title: "جاري الإرسال ... ",
                        text: "",
                        imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                        showConfirmButton: false,
                        allowOutsideClick: false
                    });
                    $(' button[name="save"]').attr("disabled", "disabled");

                }
            },
            success: function (html) {
                swal({title: 'تم إضافه  بنجاح', type: 'success', confirmButtonText: 'تم'});
                $(' button[name="save"]').removeAttr("disabled");

                if (type == 1) {
                    $('#add_editAccounDalel').modal('hide');

                    GetDiv_tree('myDiv_geha1111', plan_rkm);
                } else if (type == 2) {
                    getCode();
                    $('#name').val('');
                    var level = parseFloat($('#level').val()) - 1;
                    $('#level').val(level);
                    GetDiv_tree('myDiv_geha1111', plan_rkm);

                }
            }
        });
    }

    // yara
    function add_editAccounDalel(id, method, obj, code, level, plan_rkm) {
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>gwd/Gawda_plans_request/add_editAccounDalel/' + id,
            data: {id: id, method: method, code: code, level: level, plan_rkm: plan_rkm},
            cache: false,
            beforeSend: function () {
                $("#load_Accoun").html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (html) {
                $("#load_Accoun").html(html);
                $('.selectpicker').selectpicker("refresh");
                if (method == 1) {
                    // var obj = $(obj);
                    $('#parent').val(obj.dataset.parent);
                    $('#parent_name').val(obj.dataset.parent_name);
                    $('#parent_code').val(obj.dataset.parent_code);
                    $('#ttype').val(obj.dataset.ttype);
                    $('#level').val(obj.dataset.level);
                    getCode();
                }
            }
        });
    }

    function editAccounDalel_ajex(method, plan_rkm) {
        var from_id = $("#from_id").val();
        var id = $('#id').val();
        var level = $('#level').val();
        var ttype = $('#ttype').val();
        var parent_code = $('#parent_code').val();
        var parent_name = $('#parent_name').val();
        var parent = $('#parent').val();
        var code = $('#code').val();
        var name = $('#name').val();
        var wehda_quas = $('#wehda_quas').val();
        var last_value = $('#last_value').val();
        var want_value = $('#want_value').val();
        var no3_wehda_quas = $("input[class='no3_wehda_quas']:checked").val();
        var tareket_hesab = $("input[class='tareket_hesab']:checked").val();
        console.warn('from_id:' + from_id);
        console.warn('method:' + method);
        console.warn('tareket_hesab:' + tareket_hesab);
        console.warn('name:' + name);
        console.warn('no3_wehda_quas :' + no3_wehda_quas);
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>gwd/Gawda_plans_request/update/' + id,
            data: {
                method: method,
                id: id,
                level: level,
                ttype: ttype,
                parent_code: parent_code,
                parent_name: parent_name,
                parent: parent,
                code: code,
                name: name,
                tareket_hesab: tareket_hesab,
                want_value: want_value,
                last_value: last_value,
                no3_wehda_quas: no3_wehda_quas,
                wehda_quas: wehda_quas,
                from_ajex: 1
            },
            cache: false,
            beforeSend: function () {
                swal({
                    title: "جاري الإرسال ... ",
                    text: "",
                    imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                    showConfirmButton: false,
                    allowOutsideClick: false
                });
                $(' button[name="save"]').attr("disabled", "disabled");

            },
            success: function (html) {
                swal({title: 'تم التعديل بنجاح', type: 'success', confirmButtonText: 'تم'});
                $(' button[name="save"]').removeAttr("disabled");
                $('#add_editAccounDalel').modal('hide');
                GetDiv_tree('myDiv_geha1111', plan_rkm);
            }
        });
    }</script>
<script>
    function GetDiv_tree(div, plan_rkm) {
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>gwd/Gawda_plans_request/GetDiv_tree',
            data: {plan_rkm: plan_rkm},
            cache: false,
            beforeSend: function () {
                $("#" + div).html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (html) {
                $("#" + div).html(html);
                $('#tree3').treed({openedClass: 'fa-minus', closedClass: 'fa-plus'});
            }
        });
    }</script>

<script>
    function getCode() {
        var from_id = $("#from_id").val();
        var level = parseFloat($('#level').val()) + 1;
        $('#level').val(level);
        if ($('#parent').val()) {
            var dataString = 'id=' + $('#parent').val();
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>gwd/Gawda_plans_request/getLastSubCode',
                data: dataString,
                cache: false,
                success: function (result) {
                    if (result) {
                        code = parseFloat(result) + 1;
                    }
                    if (result == 0 && (level - 1) > 0) {
                        code = $('#parent_code').val();
                        // code = $('#parent').find('option:selected').attr('code');
                        for (i = 1; i < (level - 1) && i < 3; i++) {
                            code = code + 0;
                        }
                        code = code + 1;
                    }
                    $('#code').val(code);
                }
            });
            var dataString = 'id=' + $('#parent').val();
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>gwd/Gawda_plans_request/getParentData',
                data: dataString,
                cache: false,
                success: function (result) {
                    if (result) {
                        var obj = JSON.parse(result);

                    }
                }
            });
        }
    }</script>
<script>
    function add_hdaf(type, plan_rkm) {
        //  alert(value);
        var all_inputs = $('#add_hadaf_form [data-validation="required"]');
        var valid = 1;
        var text_valid = "";
        all_inputs.each(function (index, elem) {
            /*  console.log(elem.id + $(elem).val());*/
            if ($(elem).val().length >= 1) {
                $(elem).css("border-color", "");
            } else {
                valid = 0;
                $(elem).css("border-color", "red");
            }
        });
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>gwd/Gawda_plans_request/add_hadaf',
            data: $('#add_hadaf_form').serialize(),
            cache: false,
            beforeSend: function (xhr) {
                if (valid == 0) {
                    swal({title: 'من فضلك ادخل كل الحقول ', text: text_valid, type: 'error', confirmButtonText: 'تم'});
                    xhr.abort();
                } else if (valid == 1) {
                    swal({
                        title: "جاري الإرسال ... ",
                        text: "",
                        imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                        showConfirmButton: false,
                        allowOutsideClick: false
                    });
                    $(' button[name="save"]').attr("disabled", "disabled");


                }
            },
            success: function (html) {
                swal({title: 'تم إضافه  بنجاح', type: 'success', confirmButtonText: 'تم'});
                $(' button[name="save"]').removeAttr("disabled");

                if (type == 1) {
                    var all_inputs_set = $('#add_hadaf_form .form-control');

                    all_inputs_set.each(function (index, elem) {
                        console.log(elem.id + $(elem).val());
                        $(elem).val('');
                    });
                    $("#add_hdaf").modal('hide');
                    GetDiv_tree('myDiv_geha1111', plan_rkm);

                } else if (type == 2) {
                    $('#hdaf_name').val('');
                    $('#code').val(parseInt($('#code').val()) + 1);
                    GetDiv_tree('myDiv_geha1111', plan_rkm);
                }
                /* GetDiv_tree('myDiv_geha1111', plan_rkm);*/
            }
        });

    }
</script>
<script>
    function Checkcode(level, plan_rkm) {
        var hdf_code = $('#code').val();
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>gwd/Gawda_plans_request/Checkcode',
            data: {hdf_code: hdf_code, level: level, plan_rkm: plan_rkm},
            dataType: 'html',
            cache: false,
            success: function (html) {
                if (html == 1) {
                    swal({title: 'برجاء ادخال ترتيب  لم يتم ادخالة من قبل', type: 'error', confirmButtonText: 'تم'});

                    $('#code').val('');
                    $(' button[name="save"]').attr("disabled", "disabled");
                } else {
                    $(' button[name="save"]').removeAttr("disabled");

                }
            }
        });
    }
</script>
