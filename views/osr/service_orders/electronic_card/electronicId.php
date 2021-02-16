<?php
$type = array(1 => 'تالف', 2 => 'مفقود', 3 => 'تجديد', 4 => 'تغيير رقم سري', 5 => 'إصدار');
?>

<div class="col-sm-12 col-md-12 col-xs-12 fadeInUp wow ">
    <div class="panel panel-default">
        <div class="panel-heading panel-title">
            معالجة البطاقة الالكترونية

        </div>
        <div class="panel-body" id="show_edite">
            <!-- <?php
            if (isset($record)) {
                echo form_open_multipart('osr/service_orders/Electronic_card/editElectronic_cardOrders/' . $record['id']);
            } else {
                echo form_open_multipart('osr/service_orders/Electronic_card');
            } ?> -->
            <?php
            if (isset($record) && !empty($record)) {
                echo form_open_multipart('osr/service_orders/Electronic_card/editElectronic_cardOrders/' . $record['id'] . '/tab1', array('class' => 'Electronic_form'));
                $action = " تعديل    ";
                echo '<input type="hidden"  name="update"  id="update" value="update">';
            } else {
                $action = "حفظ";

                echo form_open_multipart('osr/service_orders/Electronic_card', array('class' => 'Electronic_form'));
                echo '<input type="hidden"  name="add"  id="add" value="add">';
            }
            ?>
            <div class="form-group col-sm-12 col-xs-12 no-padding no-margin">
                <div class="form-group col-sm-1 col-xs-12 ">
                    <label class="label "> رقم الطلب</label>
                    <input type="text" id="talab_rkm" name="talab_rkm" class="form-control  "
                           value="<?php if (isset($record)) {
                               echo $record['talab_rkm'];
                           } else {
                               echo $last_rkm;
                           } ?>" readonly data-validation="required">
                </div>
                <div class="form-group col-sm-4 col-xs-12 padd">
                    <label class="label "> الاسم</label>
                    <select name="child_id_fk" id="child_id_fk" onchange="get_national_id();" class="form-control "
                            data-validation="required">
                        <option value="">إختر</option>
                        <?php
                        if (isset($children) && $children != null) {
                            foreach ($children as $value) {
                                $select = '';
                                if (isset($record) && $record['person_id_fk'] == $value->id) {
                                    $select = 'selected';
                                }
                                ?>
                                <option value="<?= $value->id ?>" <?= $select ?>><?= $value->member_full_name ?></option>
                                <?
                            }
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group col-sm-3 col-xs-12 padd">
                    <label class="label "> رقم الهوية</label>
                    <input type="text" id="national_id" name="national_id" readonly placeholder="رقم الهوية"
                           class="form-control  " value="<?php if (isset($record)) echo $record['national_id'] ?>"
                           onkeypress="return isNumberKey(event)" data-validation="required">
                </div>

                <div class="form-group col-sm-3 col-xs-12 padd">
                    <label class="label "> نوع خدمة البطاقة</label>
                    <select name="card_service_type" id="card_service_type" class="form-control "
                            data-validation="required">
                        <option value="">إختر</option>
                        <?php
                        foreach ($type as $key => $value) {
                            $select = '';
                            if (isset($record) && $record['card_service_type'] == $key) {
                                $select = 'selected';
                            }
                            ?>
                            <option value="<?= $key ?>" <?= $select ?>><?= $value ?></option>
                            <?
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-sm-4 col-xs-12 padd">
                    <label class="label "> ملاحظات</label>
                    <textarea id="notes" name="notes" class="form-control  " data-validation="required">
		<?php if (isset($record)) echo $record['notes'] ?>
		</textarea>
                </div>
            </div>
            <?php
            if (isset($record)) {
                $action = "تعديل";
                $button = 'update';
                $onclick = "update_Electronic(" . $record['id'] . ");";
            } else {
                $action = "حفظ";
                $button = 'add';
                $onclick = "save_Electronic();";
            } ?>
            <!-- <div class="form-group col-sm-12 col-xs-12 padd">
<?php
            if (isset($last_record) && $last_record != 4) {
                $disabled = "disabled";
                $span="<span style=\"font-size: medium;\" class=\" badge badge-danger\" id=\"span_form\">لا يمكن طلب جديد لان هنالك طلب جاري </span>";

            } else {

                $disabled = "";
                $span = "";

            } ?>
    <button type="submit" name="add_electronic_card" value="حفظ" class="btn btn-purple w-md m-b-5"><span><i class="fa fa-floppy-o" aria-hidden="true"></i></span>  <?= $action ?>  </button>
</div> -->


            <div class="col-xs-12 no-padding" style="padding: 10px;">
                <div class="">
                    <div class="text-center">
                        <input type="hidden" name="max" id="max"/>
                        <button type="button" id="buttons" <?= $disabled ?>
                                class="btn btn-labeled btn-success
                                            "
                                onclick="<?= $onclick ?>"
                                name="<?php echo $button; ?>"
                                value="<?php echo $button; ?>">
                                            <span class="btn-label"><i
                                                        class="fa fa-floppy-o"></i></span><?= $action ?>
                        </button>
                        <?= $span ?>
                    </div>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!--  -->
<div id="show_details">
    <div class="col-sm-12 col-md-12 col-xs-12 ">

        <div class="panel panel-info">
            <div class="panel-heading panel-title">
                طليات معالجة البطاقة الالكترونية
            </div>

            <div class="panel-body">
                <div class="form-group col-sm-12 col-xs-12 no-padding">
                    <?php
                    if (isset($records) && $records != null) {
                        $service_name = 'معالجة البطاقة الاكترونية';
                        $type = array(1 => 'تالف', 2 => 'مفقود', 3 => 'تجديد', 4 => 'تغيير رقم سري', 5 => 'إصدار');
                        $suspend_title = array(0 => 'جاري', 1 => 'تم القبول', 2 => 'تم الرفض', 3 => "تم التحويل", 4 => "تم الاعتماد بالموافقة", 5 => "تم الإعتماد بالرفض");
                        $suspend_class = array(0 => 'warning', 1 => 'success', 2 => 'danger', 3 => 'info', 4 => 'success', 5 => 'danger');

                        ?>
                        <table id="example" class="display table table-bordered responsive nowrap" cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>رقم الطلب</th>
                                <th>الإسم</th>
                                <th>رقم الهوية</th>
                                <th>نوع خدمة البطاقة</th>
                                <th> ملاحظات</th>
                                <th> حالة الطلب</th>
                                <th>الإجراء</th>
                                <!-- <th>الطباعه</th> -->
                            </tr>
                            </thead>
                            </tr>
                            <tbody>
                            <?php
                            $x = 1;
                            foreach ($records as $value) {
                                ?>
                                <tr>
                                    <td><?= ($x++) ?></td>
                                    <td><?= $value->talab_rkm ?></td>
                                    <td><?= $value->member_full_name ?></td>
                                    <td><?= $value->national_id ?></td>
                                    <td><?= $type[$value->card_service_type] ?></td>
                                    <td><?= $value->notes ?></td>
                                    <td><span style="font-size: medium"
                                              class="badge badge-<?php if (key_exists($value->approved, $suspend_class)) {
                                                  echo $suspend_class[$value->approved];
                                              } else {
                                                  echo "Dark";
                                              } ?>"><?php if (key_exists($value->approved, $suspend_title)) {
                                                echo $suspend_title[$value->approved];
                                            } else {
                                                echo "غير محدد";
                                            } ?></span></td>

                                    <td>
                                        <?php if ($value->approved == 0) { ?>
                                            <a onclick='swal({
                                                    title: "هل انت متأكد من التعديل ؟",
                                                    text: "",
                                                    type: "warning",
                                                    showCancelButton: true,
                                                    confirmButtonClass: "btn-warning",
                                                    confirmButtonText: "تعديل",
                                                    cancelButtonText: "إلغاء",
                                                    closeOnConfirm: true
                                                    },
                                                    function(){
                                                    editElectronic_cardOrders(<?= $value->id ?>);
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
                                                    closeOnConfirm: true
                                                    },
                                                    function(){
                                                    setTimeout(function(){deleteElectronic_card(<?= $value->id ?>);}, 500);
                                                    });'>
                                                <i class="fa fa-trash"> </i></a>

                                        <?php } else { ?>
                                            <span style="font-size: medium" class=" badge badge-info">لا يمكن التعديل او الحذف</span>
                                        <?php } ?>
                                    </td>


                                </tr>
                            <? } ?>
                            </tbody>
                        </table>

                        <?php

                    } else {
                        echo '<div class="alert alert-danger">لا توجد بيانات</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $('.docs-date').datetimepicker({
        locale: {calender: 'ummalqura', lang: 'ar'},
        format: 'DD/MM/YYYY'
    });

    $(function () {
        $.validate({
            validateHiddenInputs: true
        });
    });
</script>
<!-- yara11-4-2020 -->


<script>
    function save_Electronic() {
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


        var serializedData = $('.Electronic_form').serializeArray();
        $.each(serializedData, function (key, item) {
            form_data.append(item.name, item.value);
        });
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>osr/service_orders/Electronic_card',
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
                    title: 'تم اضافة  ',
                    type: 'success',
                    confirmButtonText: 'تم'
                });
                var all_inputs_set = $('.Electronic_form .form-control');
                all_inputs_set.each(function (index, elem) {
                    console.log(elem.id + $(elem).val());
                    $(elem).val('');
                    get_details();
                    get_add();
                });
                if (html == 1) {

                    //get_data('manzel');
                    // show_tab('manzel');
                }
            }
        });
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

        var serializedData = $('.Electronic_form').serializeArray();
        $.each(serializedData, function (key, item) {
            form_data.append(item.name, item.value);
        });
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>osr/service_orders/Electronic_card/edite',
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
                    $(elem).val('');

                    get_details();
                    get_add();
                });
                if (html == 1) {

                    //get_data('manzel');
                    // show_tab('manzel');
                }
            }
        });
    }
</script>


<script>
    function get_details() {
        $('#show_details').show();
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>osr/service_orders/Electronic_card/load_details",
            beforeSend: function () {
                $('#show_details').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#show_details').html(d);

            }

        });
    }
</script>
<script>
    function get_add() {
        // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>osr/service_orders/Electronic_card/get_add",


            success: function (d) {
                $('#show_edite').html(d);

            }

        });
    }
</script>


<script>
    function editElectronic_cardOrders(id) {
        // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            data: {id: id},
            url: "<?php echo base_url();?>osr/service_orders/Electronic_card/editElectronic_cardOrders",

            beforeSend: function () {
                $('#show_edite').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#show_edite').html(d);
                $('#show_details').hide();

            }

        });
    }
</script>

<script>


    function deleteElectronic_card(id) {
        swal({
                title: "هل انت متاكد من الحذف?",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "نعم!",
                cancelButtonText: "لا!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        type: 'post',
                        url: '<?php echo base_url() ?>osr/service_orders/Electronic_card/deleteElectronic_card',
                        data: {id: id},
                        dataType: 'html',
                        cache: false,
                        beforeSend: function () {
                            swal({
                                title: "جاري الحذف ... ",
                                text: "",
                                imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                                showConfirmButton: false,
                                allowOutsideClick: false
                            });
                        },
                        success: function (html) {
                            //   alert(html);

                            // $('#Modal_esdar').modal('hide');

                            swal({
                                    title: "تم الحذف!",


                                }
                            );
                            get_details();
                            get_add();
                        }
                    });
                } else {
                    swal("تم الالغاء", "", "error");
                }
            });


    }
</script>
<script>
    function get_national_id() {

        var dataString = "child_id_fk=" + $("#child_id_fk").val();
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>osr/service_orders/Electronic_card/getNationalNum',
            data: dataString,
            dataType: 'html',
            cache: false,
            success: function (html) {

                //$("#mother_national_num").css("border-color", "red");
                $("#national_id").val(html);
                // $('button[type="submit"]').attr("disabled", "disabled");

            }
        });
    }
</script>
