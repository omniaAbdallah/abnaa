<style type="text/css">
    .small {
        position: absolute;
        bottom: -7px;
        right: 50%;
        font-size: 10px;
    }
</style>

<?php
$answer = array(1 => 'نعم', 2 => 'لا');
$type = array(1 => 'هوية وطنية', 2 => 'إقامة', 3 => 'وثيقة', 4 => 'جواز سفر');
$files = array('بطاقة العائلة	' => 'family_card_img', 'عقد النكاح	' => 'nekah_akd_img', 'صورة الهوية	' => 'hawia_img', 'الصورة الشخصية	' => 'person_img', 'عقد القاعة	' => 'akd_qa3a_img', 'تعريف بالراتب	' => 'ta3ref_ratb_img', 'تزكية الامام	' => 'tazkia_emam_img');
?>
<!-- <?php
if (isset($record)) {
    echo form_open_multipart('osr/service_orders/Marriage_orders/editMarriageOrders/' . $record['id']);
} else {
    echo form_open_multipart('osr/service_orders/Marriage_orders');
} ?> -->

<?php
if (isset($record) && !empty($record)) {
    echo form_open_multipart('osr/service_orders/Marriage_orders/editMarriageOrders/' . $record['id'], array('class' => 'family_Marriage_orders'));
    $action = " تعديل    ";
    echo '<input type="hidden"  name="id"  id="id" value="' . $record['id'] . '">';
    echo '<input type="hidden"  name="update"  id="update" value="update">';
} else {
    $action = "حفظ";

    echo form_open_multipart('osr/service_orders/Marriage_orders', array('class' => 'family_Marriage_orders'));
    echo '<input type="hidden"  name="add"  id="add" value="add">';
}
?>

<div id="show_edite">
    <div class="col-sm-6 col-md-6 col-xs-6 fadeInUp wow ">
        <div class="panel panel-default">
            <div class="panel-heading panel-title">
                مساعده زواج

            </div>
            <div class="panel-body">

                <div class="form-group col-sm-12 col-xs-12 no-padding no-margin">
                    <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
                        <label class="label "> رقم الطلب</label>
                        <input type="text" id="talab_rkm" name="talab_rkm" class="form-control  "
                               value="<?php if (isset($record)) {
                                   echo $record['talab_rkm'];
                               } else {
                                   echo $last_rkm;
                               } ?>" readonly data-validation="required">
                    </div>
                    <div class="form-group col-md-4 col-sm-3 col-xs-12 padding-4">
                        <label class="label "> الاسم</label>
                        <select name="person_id_fk" id="person_id_fk" class="form-control " data-validation="required">
                            <option value="">إختر</option>
                            <?php
                            if (isset($children) && $children != null) {
                                foreach ($children as $value) {
                                    $select = '';
                                    if (isset($record) && $record['person_id_fk'] == $value->id) {
                                        $select = 'selected';
                                    }
                                    ?>
                                    <option value="<?= $value->id ?>-<?= $value->member_full_name ?>" <?= $select ?>><?= $value->member_full_name ?></option>
                                    <?
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4 ">
                        <label class="label "> رقم الجوال </label>
                        <input type="text" id="jwal" name="jwal" placeholder="رقم الجوال " class="form-control "
                               value="<?php if (isset($record)) echo $record['jwal'] ?>" data-validation="required"
                               onkeypress="return isNumberKey(event)">
                    </div>

                    <div class="form-group col-md-4 col-sm-3 col-xs-12 padding-4">
                        <label class="label "> مكان الزواج</label>
                        <input type="text" id="makan_zawaj" name="makan_zawaj" placeholder="مكان الزواج"
                               class="form-control " value="<?php if (isset($record)) echo $record['makan_zawaj'] ?>"
                               data-validation="required">
                    </div>
                </div>

                <div class="form-group col-sm-12 col-xs-12 no-padding no-margin">
                    <div class="form-group col-md-4 col-sm-3 col-xs-12 padding-4">
                        <label class="label "> تاريخ الزواج</label>
                        <input type="date" id="date_zawaj" name="date_zawaj" placeholder="تاريخ الزواج"
                               class="form-control " data-validation="required"
                               value="<?php if (isset($record)) echo $record['date_zawaj'] ?>" autocomplete="off">
                    </div>

                    <div class="form-group col-md-4 col-sm-3 col-xs-12 padding-4">
                        <label class="label "> رقم العقد</label>
                        <input type="text" id="rkm_akd" name="rkm_akd" placeholder="رقم العقد" class="form-control "
                               value="<?php if (isset($record)) echo $record['rkm_akd'] ?>" data-validation="required"
                               onkeypress="return isNumberKey(event)">
                    </div>

                    <div class="form-group col-md-4 col-sm-3 col-xs-12 padding-4">
                        <label class="label "> تاريخ العقد</label>
                        <input type="date" id="date_akd" name="date_akd" placeholder="تاريخ العقد"
                               class="form-control  " data-validation="required"
                               value="<?php if (isset($record)) echo $record['date_akd'] ?>" autocomplete="off">
                    </div>
                </div>

                <div class="form-group col-sm-12 col-xs-12 no-padding no-margin">
                    <div class="form-group col-md-3 col-sm-3 col-xs-12 padding-4">
                        <label class="label "> جهة اصدار العقد</label>
                        <input type="text" id="geha_esdar_akd" name="geha_esdar_akd" placeholder="جهة اصدار العقد"
                               class="form-control " value="<?php if (isset($record)) echo $record['geha_esdar_akd'] ?>"
                               data-validation="required">
                    </div>

                    <div class="form-group col-md-3 col-sm-3 col-xs-12 padding-4">
                        <label class="label "> قيمة المهر</label>
                        <input type="text" id="mahr_value" name="mahr_value" placeholder="قيمة المهر"
                               class="form-control " value="<?php if (isset($record)) echo $record['mahr_value'] ?>"
                               data-validation="required" onkeypress="return isNumberKey(event)">
                    </div>

                    <div class="form-group col-md-2 col-sm-3 col-xs-12 padding-4">
                        <label class="label "> جنسية الزوجة</label>
                        <select name="gensia_husband" id="gensia_husband" class="form-control "
                                data-validation="required">
                            <option value="">إختر</option>
                            <?php
                            if (isset($nationality) && $nationality != null) {
                                foreach ($nationality as $value) {
                                    $select = '';
                                    if (isset($record) && $record['gensia_husband'] == $value->id_setting) {
                                        $select = 'selected';
                                    }
                                    ?>
                                    <option value="<?= $value->id_setting ?>" <?= $select ?>><?= $value->title_setting ?></option>
                                    <?
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4 col-sm-3 col-xs-12 padding-4">
                        <label class="label "> الزواج لاول مرة</label>
                        <?php
                        foreach ($answer as $key => $value) {
                            $select = '';
                            if (isset($record) && $record['first_zawaj'] == $key) {
                                $select = 'checked';
                            }
                            ?>
                            <input type="radio" name="first_zawaj" value="<?= $key ?>"
                                   data-validation="required" <?= $select ?>> <?= $value ?>&nbsp;&nbsp;&nbsp;
                            <?
                        }
                        ?>
                    </div>

                </div>


            </div>
        </div>
    </div>


    <div class="col-sm-6 col-md-6 col-xs-6 fadeInUp wow ">
        <div class="panel panel-default">
            <div class="panel-heading panel-title">
                مرفقات

            </div>
            <div class="panel-body">

                <?php
                $x = 1;
                foreach ($files as $key => $value) {
                    ?>
                    <div class="form-group col-md-4 col-sm-3 col-xs-12 padding-4 ">
                        <label class="label "><?= $key ?> </label>
                        <input type="file" id="<?= $value ?>" name="<?= $value ?>" accept="image/*" class="form-control">
                        <?php if (isset($record) && $record[$value] != null) { ?>
                            <a download
                               href="<?= base_url() . 'osr/service_orders/Marriage_orders/download/' . $record[$value] ?>">
                                <i class="fa fa-download" title=" تحميل"></i> </a>


                            <a data-toggle="modal" data-target="#myModal-view_photo<?= $value ?>">
                                <i class="fa fa-eye" title=" قراءة"></i> </a>
                            <!-- modal view -->
                            <div class="modal fade" id="myModal-view_photo<?= $value ?>" tabindex="-1"
                                 role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close"><span aria-hidden="true">&times;</span>
                                            </button>
                                            <h4 class="modal-title" id="myModalLabel">الصوره</h4>
                                        </div>
                                        <div class="modal-body">


                                            <img src="<?= base_url() . 'uploads/images' . '/' . $record[$value] ?>"
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


                            <?php
                        } ?>

                    </div>
                <? } ?>


            </div>
        </div>
    </div>
    <!--  -->
    <div class="col-xs-12 no-padding" style="padding: 10px;">
        <div class="">
            <div class="text-center">
                <?php
                if (isset($record)) {

                    $button = 'update';
                    $onclick = "update_family_zwag(" . $record['id'] . ");";
                } else {

                    $button = 'add';
                    $onclick = "save_family_zwag();";
                } ?>


                <button type="button" id="buttons"
                        class="btn btn-labeled btn-success
                                            "
                        onclick="<?= $onclick ?>"
                        name="<?php echo $button; ?>"
                        value="<?php echo $button; ?>">
                                            <span class="btn-label"><i
                                                        class="fa fa-floppy-o"></i></span><?= $action ?>
                </button>


            </div>
        </div>
    </div>
</div>
<?php echo form_close(); ?>
<!--  -->

</br>


<div class="col-sm-12 col-md-12 col-xs-12 " id="show_details">
    <div class="panel panel-info">
        <div class="panel-heading panel-title">
طلبات مساعده زواج
        </div>

        <div class="panel-body">
            <div class="form-group col-sm-12 col-xs-12 no-padding">
                <?php
                if (isset($records) && $records != null) {
                    $answer = array(1 => 'نعم', 2 => 'لا');
                    $type = array(1 => 'هوية وطنية', 2 => 'إقامة', 3 => 'وثيقة', 4 => 'جواز سفر');
                    $service_name = 'مساعدة زواج';
                    $files = array('بطاقة العائلة	' => 'family_card_img', 'عقد النكاح	' => 'nekah_akd_img', 'صورة الهوية	' => 'hawia_img', 'الصورة الشخصية	' => 'person_img', 'عقد القاعة	' => 'akd_qa3a_img', 'تعريف بالراتب	' => 'ta3ref_ratb_img', 'تزكية الامام	' => 'tazkia_emam_img');
                    // $files = array('بطاقة العائلة '=>'family_card','عقد النكاح  '=>'identity_img','صورة الهوية  '=>'marriage_contract','الصورة الشخصية  '=>'personal_picture','عقد القاعة '=>'hall_contract','تعريف بالراتب '=>'salary_definition','تزكية الامام  '=>'imam_recommendation');
                    $suspend_title = array(0 => 'جاري', 1 => 'تم القبول', 2 => 'تم الرفض', 3 => "تم التحويل", 4 => "تم الاعتماد بالموافقة", 5 => "تم الإعتماد بالرفض");
                    $suspend_class = array(0 => 'warning', 1 => 'success', 2 => 'danger', 3 => 'info', 4 => 'success', 5 => 'danger');

                    ?>

                    <table id="" class="example display table table-bordered responsive nowrap" cellspacing="0"
                           width="100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>رقم الطلب</th>
                            <th>الإسم</th>
                            <th>رقم الجوال</th>
                            <th>مكان الزواج</th>
                            <th>تاريخ الزواج</th>
                            <th>رقم العقد</th>
                            <th>تاريخ العقد</th>
                            <th>قيمة المهر</th>
                            <th>التفاصيل</th>
                            <th>حالة الطلب </th>
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
                                <td><?= $value->person_name ?></td>
                                <td><?= $value->jwal ?></td>


                                <td><?= $value->makan_zawaj ?></td>

                                <td><?= $value->date_zawaj ?></td>
                                <td><?= $value->rkm_akd ?></td>

                                <td><?= $value->date_akd ?></td>
                                <td><?= $value->mahr_value ?></td>


                                <td>
                                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal"
                                            data-target="#myModal<?= $value->id ?>"><span class="fa fa-list"></span>
                                        المرفقات
                                    </button>
                                </td>
                                <td><span style="font-size: medium" class="badge badge-<?php if (key_exists($value->suspend, $suspend_class)) {
                                        echo $suspend_class[$value->suspend];
                                    } else {
                                        echo "Dark";
                                    } ?>"><?php if (key_exists($value->suspend, $suspend_title)) {
                                            echo $suspend_title[$value->suspend];
                                        } else {
                                            echo "غير محدد";
                                        } ?></span></td>

                                <td>
                                    <?php if ($value->suspend == 0) { ?>
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
                                                editMarriageOrders(<?= $value->id ?>);
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
                                                setTimeout(function(){delete_marrage(<?= $value->id ?>);}, 500);
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
                    <?php foreach ($records as $value) { ?>
                        <div class="modal" id="myModal<?= $value->id ?>" tabindex="-1" role="dialog"
                             aria-labelledby="myModalLabel" data-wow-duration="0.5s">
                            <div class="modal-dialog" role="document" style="width: 90%">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">تفاصيل المرفقات</h4>
                                    </div>
                                    <br>
                                    <div class="modal-body no-padding no-margin form-group col-sm-12 col-xs-12">
                                        <div class="form-group col-sm-12 col-xs-12">
                                            <table class="table table-bordered table-devices">
                                                <tbody>
                                                <?php
                                                $x = 1;
                                                foreach ($files as $key => $value2) {
                                                    if ($x % 2 != 0) {
                                                        echo '</tr>';
                                                    }
                                                    ?>
                                                    <th class="gray_background" style="width: 25%;"><?= $key ?></th>
                                                    <td>
                                                        <?php if ($value->$value2) { ?>
                                                            <a href="<?= base_url() . 'osr/service_orders/Marriage_orders/download/' . $value->$value2 ?>"><span><i
                                                                            class="fa fa-download"></i></span></a>


                                                            <a data-toggle="modal"
                                                               data-target="#myview<?= $value->id ?>">
                                                                <i class="fa fa-eye" title=" قراءة"></i> </a>

                                                            <div class="modal fade" id="myview<?= $value->id ?>"
                                                                 tabindex="-1"
                                                                 role="dialog" aria-labelledby="myModal"
                                                                 style="width:50%">
                                                                <div class="" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close"
                                                                                    data-dismiss="modal"
                                                                                    aria-label="Close"><span
                                                                                        aria-hidden="true">&times;</span>
                                                                            </button>
                                                                            <h4 class="modal-title" id="myModal">
                                                                                الصوره</h4>
                                                                        </div>
                                                                        <div class="modal-body">


                                                                            <img src="<?= base_url() . 'uploads/images' . '/' . $value->$value2 ?>"
                                                                                 width="100%" alt="">

                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                    class="btn btn-default"
                                                                                    data-dismiss="modal">
                                                                                إغلاق
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <? } ?>
                                                    </td>
                                                    <?php
                                                    if ($x % 2 == 0) {
                                                        echo '</tr>';
                                                    }
                                                    $x++;
                                                }
                                                ?>
                                                </tbody>
                                            </table>
                                        </div>


                                    </div>
                                    <div class="modal-footer" style="border-top: 0;">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?
                    }
                } else {
                    echo '<div class="alert alert-danger">لا توجد بيانات</div>';
                }
                ?>
            </div>
        </div>
    </div>
</div>
</div>

<!--  -->
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

    function readURL(input, val) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#blah' + val)
                    .attr('src', e.target.result)
                    .width(50)
                    .height(50);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>


<script>
    function save_family_zwag() {
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

        //
        var files = $('#family_card_img')[0].files;
        var file_school = $('#nekah_akd_img')[0].files;
        form_data.append("family_card_img", files[0]);
        form_data.append("nekah_akd_img", file_school[0]);

        var files1 = $('#hawia_img')[0].files;
        var file_school1 = $('#person_img')[0].files;
        form_data.append("hawia_img", files1[0]);
        form_data.append("person_img", file_school1[0]);

        var files2 = $('#akd_qa3a_img')[0].files;
        var file_school2 = $('#ta3ref_ratb_img')[0].files;
        form_data.append("akd_qa3a_img", files2[0]);
        form_data.append("ta3ref_ratb_img", file_school2[0]);


        var files3 = $('#tazkia_emam_img')[0].files;
        form_data.append("tazkia_emam_img", files3[0]);

        //
        var serializedData = $('.family_Marriage_orders').serializeArray();
        $.each(serializedData, function (key, item) {
            form_data.append(item.name, item.value);
        });
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>osr/service_orders/Marriage_orders',
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
                var all_inputs_set = $('.family_Marriage_orders .form-control');
                all_inputs_set.each(function (index, elem) {
                    console.log(elem.id + $(elem).val());
                    $(elem).val('');
                    get_details();
                    get_add();
                });
                if (html == 1) {

                    //get_data('family_members');
                    // show_tab('family_members');
                }
            }
        });
    }
</script>


<script>

    function update_family_zwag(id) {

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


        //

        //
        var files = $('#family_card_img')[0].files;
        var file_school = $('#nekah_akd_img')[0].files;
        form_data.append("family_card_img", files[0]);
        form_data.append("nekah_akd_img", file_school[0]);

        var files1 = $('#hawia_img')[0].files;
        var file_school1 = $('#person_img')[0].files;
        form_data.append("hawia_img", files1[0]);
        form_data.append("person_img", file_school1[0]);

        var files2 = $('#akd_qa3a_img')[0].files;
        var file_school2 = $('#ta3ref_ratb_img')[0].files;
        form_data.append("akd_qa3a_img", files2[0]);
        form_data.append("ta3ref_ratb_img", file_school2[0]);


        var files3 = $('#tazkia_emam_img')[0].files;
        form_data.append("tazkia_emam_img", files3[0]);

        //
        //
        var serializedData = $('.family_Marriage_orders').serializeArray();
        $.each(serializedData, function (key, item) {
            form_data.append(item.name, item.value);
        });
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>osr/service_orders/Marriage_orders/edite',
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
                var all_inputs_set = $('.family_Marriage_orders .form-control');
                all_inputs_set.each(function (index, elem) {
                    console.log(elem.id + $(elem).val());
                    $(elem).val('');
                    get_details();
                    get_add();
                });
                if (html == 1) {

                    //get_data('family_members');
                    // show_tab('family_members');
                }
            }
        });
    }
</script>


<script>
    function get_details() {
        // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>osr/service_orders/Marriage_orders/load_details",

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
            url: "<?php echo base_url();?>osr/service_orders/Marriage_orders/get_add",


            success: function (d) {
                $('#show_edite').html(d);

            }

        });
    }
</script>


<script>
    function editMarriageOrders(id) {
        // $('#pop_rkm').text(rkm);
        $.ajax({
            type: 'post',
            data: {id: id},
            url: "<?php echo base_url();?>osr/service_orders/Marriage_orders/editMarriageOrders",

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


    function delete_marrage(id) {
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
                        url: '<?php echo base_url() ?>osr/service_orders/Marriage_orders/delete_marrage',
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

