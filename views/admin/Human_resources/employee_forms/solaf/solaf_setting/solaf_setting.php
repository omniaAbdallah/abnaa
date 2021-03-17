<div class="col-sm-12 no-padding ">

    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title; ?></h3>
        </div>


        <div class="panel-body">


            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab1" data-toggle="tab"> ضوابط الدعم</a></li>
                <li><a href="#tab2" id="a_tab1" onclick="set_tab(1)" data-toggle="tab">ضوابط الإستحقاق</a></li>
                <li><a href="#tab2" id="a_tab3" onclick="set_tab(3)" data-toggle="tab">المستندات المطلوبة</a></li>
                <li><a href="#tab2" id="a_tab2" onclick="set_tab(2)" data-toggle="tab">ألية إسترداد القرض / السلف</a>
                <li><a href="#tab5" id="a_tab5" onclick="load_solaf_emp();" data-toggle="tab">ربط الموظفيين بالسلف</a>
                </li>


            </ul>

            <div class="tab-content">
                <div class="tab-pane fade in active" id="tab1">

                    <?php
                    $checked = array('', 'checked');
                    if (isset($solaf_main_setting) && !empty($solaf_main_setting)) {
                        $form = $solaf_main_setting->id;
                        $da3m_value = $solaf_main_setting->da3m_value;
                        $aqsa_moda_sadad = $solaf_main_setting->aqsa_moda_sadad;
                        $had_adna = $solaf_main_setting->had_adna;
                        $bnod = array(9 => $solaf_main_setting->rateb_asasy, 11 => $solaf_main_setting->bdl_sakn
                        , 12 => $solaf_main_setting->bdl_mowaslat, 15 => $solaf_main_setting->bdl_jwal
                        , 10 => $solaf_main_setting->rateb_mokto3, 16 => $solaf_main_setting->bdl_ma3esha
                        , 13 => $solaf_main_setting->bdl_amal, 14 => $solaf_main_setting->bdl_taklef);


                    } else {
                        $form = 0;
                        $da3m_value = '';
                        $aqsa_moda_sadad = '';
                        $had_adna = '';
                        $bnod = array(9 => 0, 11 => 0, 12 => 0, 15 => 0
                        , 10 => 0, 16 => 0, 13 => 0, 14 => 0);

                    }
                    ?>
                    <?php echo form_open_multipart(base_url() . 'human_resources/employee_forms/solaf/Solaf_setting/add_setting') ?>

                    <div class="col-sm-12 padding-4"  style="margin-top: 10px">
                        <input type="hidden" name="form_type" value="<?= $form ?>"/>
                        <div class="form-group row">
                            <label for="input1" class="col-sm-2 col-form-label">المبلغ المرصود للدعم</label>
                            <div class="col-sm-2">
                                <input type="number" class="form-control" min="0" name="da3m_value" id="input1"
                                       data-validation="required" value="<?= $da3m_value ?>" placeholder="">
                            </div>
                            <label class="col-sm-2 col-form-label">ريال</label>

                        </div>
                        <div class="form-group row">
                            <label for="input2" class="col-sm-2 col-form-label">أقصي مدة سداد</label>
                            <div class="col-sm-2">
                                <input type="number" class="form-control" value="<?= $aqsa_moda_sadad ?>" min="0"
                                       name="aqsa_moda_sadad"
                                       data-validation="required" id="input2">
                            </div>
                            <label class="col-sm-2 col-form-label"> شهر </label>

                        </div>
                        <div class="form-group row">
                            <label for="input3" class="col-sm-2 col-form-label">الحد الأدنى للإستقطاع</label>
                            <div class="col-sm-2">
                                <input type="number" class="form-control" value="<?= $had_adna ?>" min="0"
                                       name="had_adna"
                                       data-validation="required" id="input3">
                            </div>
                            <label class="col-sm-2 col-form-label">% </label>

                        </div>

                        <?php if (isset($badlat) && (!empty($badlat))) { ?>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">بنود الإستقطاع</label>
                                <div class="col-sm-10">


                                        <?php foreach ($badlat as $key => $value) {
                                            ?>
                                    <div class="check-style" style="display: inline-block;margin-left: 10px">

                                            <input class="check_large " type="checkbox" name="bnod[]"
                                                   value="<?= $value->id ?>"
                                                   id="gridCheck<?= $value->id ?>" <?php if (key_exists($value->id, $bnod)) {
                                                echo $checked[$bnod[$value->id]];
                                            } ?> >
                                            <label class="form-check-label" for="gridCheck<?= $value->id ?>">
                                                <?= $value->title ?>
                                            </label>
                                    </div>
                                        <?php } ?>


                                </div>
                            </div>

                        <?php } ?>
                    </div>
                    <div class="col-xs-12 text-center">
                        <input type="hidden" name="add" value="add">
                        <button type="submit" class="btn btn-labeled btn-success " id="reg" name="add" value="حفظ"
                                style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                        </button>


                    </div>
                    <?php echo form_close() ?>
                </div>
                <div class="tab-pane fade" id="tab2">
                    <?php
                    if (isset($one_solaf_dawabt) && !empty($one_solaf_dawabt)) {
                        $type = $one_solaf_dawabt->type;
                        $title = $one_solaf_dawabt->title;
                        $type_n = $one_solaf_dawabt->type_n;
                        $id = $one_solaf_dawabt->id;
                    } else {
                        $type = '';
                        $title = '';
                        $type_n = '';
                        $id = 0;

                    }
                    ?>
                    <?php echo form_open_multipart(base_url() . 'human_resources/employee_forms/solaf/Solaf_setting/add_dwabt_setting') ?>

                    <div class="col-sm-12 padding-4" style="margin: 10px 0">
                        <input type="hidden" name="id" id="setting_id" value="<?= $id ?>"/>
                        <input type="hidden" name="type" id="setting_type" value="<?= $type ?>"/>
                        <div class="col-md-6">
                            <label for="title" class="col-sm-4 col-form-label" id="lable_input">  <?= $type_n ?>
                                : </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="title" id="title"
                                       data-validation="required" value="<?= $title ?>" placeholder="">
                            </div>

                        </div>
                        <div class="col-md-4 text-center">
                            <input type="hidden" name="add" value="add">
                            <button type="submit" class="btn btn-labeled btn-success " id="reg" name="add" value="حفظ">
                                <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                            </button>

                        </div>
                    </div>

                    <?php echo form_close() ?>


                    <div class="col-md-12 no-padding" id="solaf_dawabt">

                    </div>
                </div>
                <div class="tab-pane fade" id="tab3">

                </div>
                <div class="tab-pane fade" id="tab4">

                </div>

                <div class="tab-pane fade" id="tab5">
                
                    <?php echo form_open_multipart(base_url() . 'human_resources/employee_forms/solaf/Solaf_setting/add_setting', array('class'=>'solaf_emp_form')); ?>

                    <div class="col-sm-12 padding-4"  style="margin-top: 10px">

                        <div class="form-group col-md-3 padding-4">
                            <label class=""> اسم الموظف </label>
                            <select class="form-control " id="emp_id" name="emp_id"
                                 data-show-subtext="true" data-live-search="true" data-validation="required"
                                    aria-required="true" onchange="get_data_emp();">
                                <option value="">إختر</option>
                                <?php
                                if (!empty($employees)) {
                                    foreach ($employees as $value) {
                                        ?>
                                        <option value="<?=$value->id?>" data-code="<?=$value->emp_code?>"><?php echo $value->employee; ?></option>
                                    <?php }
                                } ?>
                            </select>
                            <input type="hidden" name="emp_code" id="emp_code" >
                            <input type="hidden" name="emp_name" id="emp_name" >
                        </div>
                        <div class="form-group col-md-3 padding-4">
                            <label class="label"> كود الحساب </label>
                            <input type="text" class="form-control  testButton inputclass"
                                   name="rkm_hesab" id="rkm_hesab" readonly="readonly"
                                   data-toggle="modal" data-target="#myModal_hesab"
                                   style="cursor:pointer;float: right;width: 88%"
                                   data-validation="required">
                            <button type="button" data-toggle="modal" data-target="#myModal_hesab"
                                    onclick="$('#myModal_hesab').modal('hide');"
                                    class="btn btn-success btn-next" style="float: left;">
                                <i class="fa fa-plus"></i></button>
                        </div>
                        <div class="form-group col-md-3 padding-4">
                            <label class=""> اسم الحساب </label>
                            <input type="text" class="form-control  testButton inputclass" name="hesab_name"
                                   id="hesab_name" readonly="readonly"
                                   style="cursor:pointer;border: white;color: black"
                                   data-validation="required">
                        </div>
                    </div>
                    <div class="col-xs-12 text-center">
                        <input type="hidden" name="add" value="add">
                        <input type="hidden" name="id_emp_solf" id="id_emp_solf" value="">
                        <button type="button" class="btn btn-labeled btn-success "
                                id="add" name="add" value="حفظ" onclick="add_solaf_emp();"
                                style="background-color: #3c990b;border-color: #12891b;padding-top: 0;
                                margin: 10px; padding-bottom: 0;border-radius:2px; ">
                            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                        </button>


                    </div>
                    <?php echo form_close() ?>

                    <!-- Dalel Modal -->
                    <div class="modal fade" id="myModal_hesab" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document" style="width: 70%">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">الدليل المحاسبي </h4>
                                </div>
                                <div class="modal-body">
                                    <?php //if(!empty($tree)) {
                                    ?>
                                    <table id="" class="table table-bordered example" role="table">
                                        <thead>
                                        <tr class="info">
                                            <th style="font-size: 15px; width:88px !important; ">م</th>
                                            <th style="font-size: 15px;" class="text-left">رقم الحساب</th>
                                            <th style="font-size: 15px;" class="text-left">إسم الحساب</th>
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
                                            $colorArray = array(1 => '#ec9732', 2 => '#c07852', 3 => '#75bf67', 4 => '#b6ab2d', 5 => '#09b6bb', 6 => '#3088d8', 7 => '#4d92a7', 8 => '#ef6c02', 9 => '#a69fb9', 10 => '#67351b', 11 => '#b6ea47', 12 => '#e18091', 13 => '#f5f44d', 14 => '#a63daa', 15 => '#fb1f73', 16 => '#9b9a92', 17 => '#8f0e0b', 18 => '#397631', 19 => '#074183', 20 => '#cab11e');
                                            foreach ($tree as $record) {
                                                if ($record->hesab_no3 == 2) {
                                                }
                                                ?>
                                                <tr style="background-color: <?= $colorArray[$record->level] ?>; cursor: pointer;"
                                                    onclick="update_rkm_hesab(<?= $record->hesab_no3 ?>,<?= $record->code ?>,'<?= $record->name ?>')">
                                                    <td class="forTd"><?= $count++ ?></td>
                                                    <td class="forTd"><?= $record->code ?></td>
                                                    <td class="forTd"><?= $record->name ?></td>
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
                                    <?php // } ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="load_solaf_emp"></div>

            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>

<script>
    
    function load_solaf_emp() {
        //$('#table_panal').show();

        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/employee_forms/solaf/Solaf_setting/load_solaf_emp",
            cache: true,
            beforeSend: function () {
                $('#load_solaf_emp').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#load_solaf_emp').html(d);
            }
        });
    }

    function get_data_emp() {
        var emp_name=$("#emp_id option:selected").text();
        var emp_code=$("#emp_id option:selected").data('code');

        $('#emp_code').val(emp_code);
        $('#emp_name').val(emp_name);

    }
    function add_solaf_emp() {
            var all_inputs = $('.solaf_emp_form [data-validation="required"]');
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

            //form_data.append('add', 1);
            var serializedData = $('.solaf_emp_form').serializeArray();
            $.each(serializedData, function (key, item) {
                form_data.append(item.name, item.value);
                console.log(item.name+ "   :   "+item.value);
            });
            var id = $('#id_emp_solf').val();
            if (id !='') {
                form_data.append('update', 1);
            }
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>human_resources/employee_forms/solaf/Solaf_setting/add_solaf_emp',
                data: form_data,
                dataType: 'text',
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
                            title: "جاري الحفظ ...",
                            text: "",
                            imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                            showConfirmButton: false,
                            allowOutsideClick: false
                        });
                    }
                },
                success: function (html) {
                    swal({
                        title: 'تم  الحفظ  ',
                        type: 'success',
                        confirmButtonText: 'تم'
                    });
                    var all_inputs_set = $('.solaf_emp_form .form-control');
                    all_inputs_set.each(function (index, elem) {
                        console.log(elem.id + $(elem).val());
                        $(elem).val('');
                    });
                    load_solaf_emp();

                }
            });
    }

    function delete_solaf_emp(row_id) {
        $.ajax({
            type: 'get',
            url: '<?php echo base_url() ?>human_resources/employee_forms/solaf/Solaf_setting/delete_solaf_emp/' + row_id,
            cache: false,
            contentType: false,
            processData: false,
            success: function (html) {
                if (html == 1) {
                    load_solaf_emp();
                }
            }
        });
    }
    function select_solaf_emp(id,emp_id,emp_code,emp_name,rkm_hesab,hesab_name) {
        $('#id_emp_solf').val(id);
        $('#emp_id').val(emp_id);
        $('#emp_code').val(emp_code);
        $('#emp_name').val(emp_name);
        $('#rkm_hesab').val(rkm_hesab);
        $('#hesab_name').val(hesab_name);
        $().html("");
    }
</script>
<script>
    function update_rkm_hesab(hesab_no3,rkm_hesab, hesab_name) {
        if (hesab_no3 == 2) {
            $('#rkm_hesab').val(rkm_hesab);
            $('#hesab_name').val(hesab_name);
            $('#myModal_hesab').modal('hide');
        } else {
            alert('ليس حساب فرعي');
        }
    }
</script>

<script>
    <?php $tab_show = $this->uri->segment(6, 0);
    if (isset($tab)) {
        $tab_show = $tab;
    }
    if($tab_show != 0){
    ?>
    $(document).ready(function () {
        $('a[id="a_tab<?=$tab_show?>"]').tab('show');

        <?php if (!isset($tab) && ($tab_show != 0)) {
        echo "set_tab($tab_show);";
        }?>
    });
    <?php }?>

</script>


<script>

    function set_tab(tab) {

        var tabs_lable = ['', 'ضبط الاستحقاق :', 'ألية استرداد القرض/السلفة :', 'اسم المستند :'];
        $('#lable_input').text(tabs_lable[tab]);
        $('#setting_type').val(tab);
        $('#title').val('');
        $('#setting_id').val(0);

        set_table(tab);

    }

    function set_table(type) {
        var request = $.ajax({
            url: "<?=base_url() . 'human_resources/employee_forms/solaf/Solaf_setting/get_solaf_dawabt'?>",
            type: "POST",
            data: {type: type},
            beforeSend: function () {
                $('#solaf_dawabt').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            }
        });
        request.done(function (msg) {

            $('#solaf_dawabt').html(msg);


        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });


    }
</script>


<script>

    function delete_dwabt(type, id) {

        var request = $.ajax({
            url: "<?=base_url() . 'human_resources/employee_forms/solaf/Solaf_setting/delete_solaf_dawabt'?>",
            type: "POST",
            data: {type: type, id: id},
            beforeSend: function () {
                $('#solaf_dawabt').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            }
        });
        request.done(function (msg) {

            $('#solaf_dawabt').html(msg);

            swal({
                title: "",
                text: "تم الحذف",
                type: "success",
                confirmButtonText: "تم",
            });
        });
        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });


    }
</script>