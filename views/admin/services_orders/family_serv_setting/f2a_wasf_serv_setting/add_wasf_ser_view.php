<div id="show_edite">

<div class="col-xs-12  ">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title; ?></h3>
        </div>
        <div class="panel-body">
         
<?php
            if (isset($f2at) && !empty($f2at)) {
                echo form_open_multipart('services_orders/family_serv_setting/Serv_setting/wasf_service_setting_uptate/' .$f2at->id . '', array('class' => 'wasf_form'));
                $wasf_fe2a_title = $f2at->wasf_fe2a_title;
                $ser = $f2at->no3_khdma_id_fk;
                $f2a=$f2at->fe2a_khdma_id_fk;
                $button = 'update';
                $action = " تعديل    ";
                $onclick = "update_wasf(" . $f2at->id . ");";
                echo '<input type="hidden"  name="id"  id="id" value="' .$f2at->id . '">';
                echo '<input type="hidden"  name="update"  id="update" value="update">';
            } else {
                $action = "حفظ";
                $wasf_fe2a_title = '';
                $ser = '';
                $f2a='';
                $button = 'add';
                $onclick = "save_wasf();";
                echo form_open_multipart('services_orders/family_serv_setting/Serv_setting/wasf_service_setting', array('class' => 'wasf_form'));
                echo '<input type="hidden"  name="add"  id="add" value="add">';
            }
            ?>
            <div class="col-md-12 col-xs-12">
                <div class="form-group col-sm-2 col-xs-12 padding-4">
                    <label>نوع الخدمة </label>
                    <select type="text" class="form-control " name="service"
                            data-validation="required">
                        <option value=""> إختر </option>
                        <?php foreach ($service as $cat) { ?>
                            <option value="<?= $cat->id ?>"
                                <?php if ($ser == $cat->id) echo 'selected' ?>
                            ><?= $cat->khdma_name ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group col-sm-2 col-xs-12 padding-4">
                    <label>الفئات </label>
                    <select type="text" class="form-control " name="f2a"
                            data-validation="required">
                        <option value=""> إختر </option>
                        <?php foreach ($f2att as $cat) { ?>
                            <option value="<?= $cat->id ?>"
                                <?php if ($f2a == $cat->id) echo 'selected' ?>
                            ><?= $cat->wasf_fe2a_title ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group col-sm-4 col-xs-12 padding-4">

                    <label>وصف الخدمة  </label>
                    <input type="text" class="form-control " name="wasf_serv"
                           value="<?= $wasf_fe2a_title ?>" data-validation="required">

                </div>
                <div class="form-group col-sm-2 col-xs-12 padding-4" style="
    margin-top: 32px;
">
                    <button type="button" id="buttons" 
                                class="btn btn-labeled btn-success
                                            "
                                onclick="<?= $onclick ?>"
                                name="<?php echo $button; ?>"
                                value="<?php echo $button; ?>">
                                            <span class="btn-label"><i
                                                        class="glyphicon glyphicon-floppy-disk"></i></span><?= $action ?>
                        </button>

                </div>
            </div>

            <!-- <div class="col-md-12">
                <button type="submit" class="btn btn-success" value="1" name="save">حفظ</button>
            </div> -->
           
            <?php echo form_close() ?>
        </div>
    </div>
</div>
</div>
<div id="show_details">
<?php if ((isset($cat_service)) && (!empty($cat_service))) { ?>
    <div class="col-xs-12  ">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title2; ?></h3>
            </div>
            <div class="panel-body" >
                <table class="example table table-bordered">
                    <thead >
                    <tr class="info">
                    <th> م</th>
                        <th>نوع الخدمة</th>
                        <th>فئة الخدمة</th>
                        <th>وصف الفئة</th>
                        <th>الإجراء</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($cat_service as $key => $value) { ?>
                        <tr>
                            <td><?= ++$key ?></td>
                            <td><?= $value->khdma_name ?></td>
                            <td>
                            
                            <?php foreach ($f2att as $cat) { ?>
                              
                                    <?php if ($value->fe2a_khdma_id_fk  == $cat->id) echo $cat->wasf_fe2a_title; ?>
                                
                            <?php } ?>
                            
                           </td>
                            <td><?= $value->wasf_fe2a_title ?></td>
                            
                            <td>
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
                                                    edit_wasf(<?= $value->id ?>);
                                                    });'>
                                                <i class="fa fa-pencil"> </i></a>
                                            <a onclick='delete_f2a(<?= $value->id ?>)'>
                                                <i class="fa fa-trash"> </i></a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php } ?>
</div>
<!-- yara -->

<script>
    function save_wasf() {
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


        var serializedData = $('.wasf_form').serializeArray();
        $.each(serializedData, function (key, item) {
            form_data.append(item.name, item.value);
        });
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>services_orders/family_serv_setting/Serv_setting/wasf_service_setting',
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
                var all_inputs_set = $('.wasf_form .form-control');
                all_inputs_set.each(function (index, elem) {
                    console.log(elem.id + $(elem).val());
                    $(elem).val('');
                   
                   //
                });
                get_details();
                get_add_wasf();
                if (html == 1) {

                    //get_data('manzel');
                    // show_tab('manzel');
                }
            }
        });
    }
</script>


<script>

    function update_wasf(id) {

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

        var serializedData = $('.wasf_form').serializeArray();
        $.each(serializedData, function (key, item) {
            form_data.append(item.name, item.value);
        });
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>services_orders/family_serv_setting/Serv_setting/wasf_service_setting_uptate',
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
                var all_inputs_set = $('.wasf_form .form-control');
                all_inputs_set.each(function (index, elem) {
                    console.log(elem.id + $(elem).val());
                    $(elem).val('');

                  
                   
                });
                get_details();
                get_add_wasf();
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
            url: "<?php echo base_url();?>services_orders/family_serv_setting/Serv_setting/load_details_wasf",
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
    function edit_wasf(id) {
        // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            data: {id: id},
            url: "<?php echo base_url();?>services_orders/family_serv_setting/Serv_setting/edite_wasf",

            beforeSend: function () {
                $('#show_edite').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#show_edite').html(d);
            

            }

        });
    }
</script>
<script>
    function get_add_wasf() {
        // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>services_orders/family_serv_setting/Serv_setting/get_add_wasf",


            success: function (d) {
                $('#show_edite').html(d);

            }

        });
    }
</script>
<script>


    function delete_f2a(id) {
        swal({
                title: "هل انت متاكد من الحذف?",
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
                        url: '<?php echo base_url() ?>services_orders/family_serv_setting/Serv_setting/f2a_service_setting_delete',
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
                           
                        }
                    });
                } else {
                    swal("تم الالغاء", "", "error");
                }
            });


    }
</script>