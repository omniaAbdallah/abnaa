<style>
    label.label {
        margin-bottom: 0px !important;
        color: #002542 !important;
        display: block !important;
        text-align: right !important;
        font-size: 16px !important;
        padding: 0 !important;
        height: auto;
    }
</style>
<div class="col-xs-12 fadeInUp wow">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"> <?php echo $title; ?> </h3>
        </div>
        <div class="panel-body">
            <?php
            if (isset($galsa_member)){
            $alert_swal = 2;
            ?>
            <form action="<?php echo base_url(); ?>md/all_glasat/All_glasat/update_galsa/<?php echo $this->uri->segment(5); ?>/
                <?php echo $this->uri->segment(6); ?>" method="post" id="form1">
                <?php } else{
                $alert_swal = 1;
                ?>
                <form action="<?php echo base_url(); ?>md/all_glasat/All_glasat" method="post" id="form1">
                    <?php } ?>
                    <div class="col-sm-12">
                        <!-- <div class="form-group col-md-1 col-sm-1  padding-4"> -->
                            <!-- <label class="label">كود المجلس</label> -->
                            <input type="hidden" class="form-control"  name="mgls_code"
                                   value="<?php if (isset($last_magls)) {
                                       echo $last_magls->mg_code;
                                   } else {
                                       echo $last_magls_update->mgls_code;
                                   } ?>"
                                   class="form-control fe2a" id="">
                            <input type="hidden"  name="mgls_id_fk" value="<?php if (isset($last_magls)) {
                                echo $last_magls->id;
                            } else {
                                echo $last_magls_update->mgls_id_fk;
                            } ?>" class="form-control fe2a">
                        <!-- </div> -->
                        <!-- <div class="form-group col-md-2 col-sm-2 padding-4">
                            <label class="label">رقم الجلسه</label>
                            <input type="text" class="form-control" data-validation="required" name="glsa_rkm_full"
                                   readonly value="<?php echo date("Y"); ?>/<?php echo $last_galsa; ?>"/>
                            <input type="hidden" name="glsa_rkm" readonly value="<?php echo $last_galsa; ?>"/>
                        </div> -->
                        <div class="form-group col-md-2 col-sm-2 padding-4">
                            <label class="label">رقم الجلسه</label>
                            <input type="text" class="form-control"
                                   readonly value="<?php if (isset($last_magls_update) && !empty($last_magls_update->glsa_rkm_full)) {
                                       echo $last_magls_update->glsa_rkm_full;
                                   }?>"/>
                            <input type="hidden" class="form-control" data-validation="required" name="glsa_rkm_full"
                                   readonly value="<?php echo date("Y"); ?>/<?php echo $last_galsa; ?>"/>
                            <input type="hidden" name="glsa_rkm" readonly value="<?php echo $last_galsa; ?>"/>
                        </div>
                        <!-- <div class="col-sm-2  col-md-2 padding-4 ">
                            <label class="label   ">نوع الإجتماع </label>
                            <select name="no3_egtma3" id="no3_egtma3"
                                    class="form-control " data-validation="required"
                                    data-show-subtext="true" data-live-search="true" aria-required="true">
                                <option value="">اختر</option>
                                <?php $type_metting = array(1 => ' عادية', 2 => ' غير عادية');
                                foreach ($type_metting as $key => $value) { ?>
                                    <option data-title="<?= $value ?>" value="<?= $key ?>"
                                        <?php
                                        if (isset($last_magls_update) && !empty($last_magls_update->no3_egtma3)) {
                                            if ($last_magls_update->no3_egtma3 == $key) {
                                                echo 'selected';
                                            }
                                        }
                                        ?>
                                    > <?= $value ?> </option>
                                    <?php
                                } ?>
                            </select>
                        </div> -->
                        <div class="col-sm-3  col-md-2 padding-4 ">
                            <label class="label   "> تاريخ الجلسه </label>
                            <input type="date" name="glsa_date" id="glsa_date" class="form-control "
                                   data-validation="required"
                                   onchange="get_glsa_day(this.value);"
                                   value="<?php if (isset($last_magls_update) && !empty($last_magls_update->glsa_date_ar)) {
                                       echo $last_magls_update->glsa_date_ar;}else{
                                        echo date('Y-m-d');
                                    }
                                    ?>">
                        </div>
                        <div class="col-sm-3  col-md-1 padding-4 ">
                            <label class="label   "> اليوم </label>
                            <?php  $day_name_arr=array(0=>'الاحد',1=>"الاثنين",2=>"الثلاثاء",3=>"الاربعاء",4=>"الخميس",5=>"الجمعة",6=>"السبت") ?>
                            <input type="text" name="glsa_day" id="glsa_day" class="form-control "
                                   data-validation="required"
                                   value="<?php if (isset($last_magls_update) && !empty($last_magls_update->glsa_day)) {
                                       echo $last_magls_update->glsa_day;
                                   }else{
                                    echo $day_name_arr[date('w')];
                                   } ?>" readonly>
                        </div>
                        <div class="col-sm-2  col-md-2 padding-4 ">
                            <label class="label"> وقت الجلسه </label>
                            <input placeholder="الوقت" id="glsa_time" class="form-control " type="text"
                                   data-validation="required" name="glsa_time"
                                   value="<?php if (isset($last_magls_update) && !empty($last_magls_update->glsa_time)) {
                                       echo $last_magls_update->glsa_time;
                                   }
                                   ?>"
                                   style="float: right;text-align: center;">
                        </div>
                        <!-- yara -->
                        <div class="col-sm-2  col-md-2 padding-4 ">
                            <label class="label">  مدة الجلسه بالدقائق </label>
                            <input placeholder="المدة" id="glsa_duration" class="form-control " type="number"
                                   data-validation="required" name="glsa_duration"
                                   value="<?php if (isset($last_magls_update) && !empty($last_magls_update->glsa_duration)) {
                                       echo $last_magls_update->glsa_duration;
                                   }
                                   ?>"
                                   style="float: right;text-align: center;">
                        </div>
                        <!-- yara -->
                        <div class=" col-md-3 col-sm-4  padding-4 ">
                            <label class="label   ">مكان الإنعقاد </label>
                            <select id="makn_en3qd" name="makn_en3qd" data-validation="required"
                                    title="    اختر    مكان الإنعقاد   "
                                    class="form-control selectpicker"
                                    data-show-subtext="true"
                                    data-live-search="true">
                                <option value="">اختر</option>
                                <?php
                                if (isset($all_places) && (!empty($all_places))) {
                                    foreach ($all_places as $key) {
                                        $select = '';
                                        if (isset($last_magls_update->makn_en3qd) && (!empty($last_magls_update->makn_en3qd))) {
                                            if ($key->id_setting == $last_magls_update->makn_en3qd) {
                                                $select = 'selected';
                                            }
                                        }
                                        ?>
                                        <option value="<?php echo $key->id_setting; ?>" <?= $select ?>> <?php echo $key->title_setting; ?></option>
                                    <?php }
                                } ?>
                            </select>
                        </div>
                        </div>
                        <div class="col-md-12  padding-4 ">
                            <!-- <div class="col-sm-3  col-md-1 padding-4 ">
                                <label class="label   "> رقم قرار المجلس </label>
                                <input type="number" name="magls_rkm" id="magls_rkm" class="form-control "
                                       data-validation="required"
                                       value="<?php if (isset($last_magls_update) && !empty($last_magls_update->magls_rkm)) {
                                           echo $last_magls_update->magls_rkm;
                                       } ?>">
                            </div> -->
                            <div class="col-sm-4  col-md-4 padding-4 ">
                                <label class="label"> مقرر الجلسة </label>
                                <!-- <select id="glsa_reviser_id" name="glsa_reviser_id" data-validation="required"
                                        title="    اختر   مقرر الجلسة   "
                                        class="form-control selectpicker"
                                        data-show-subtext="true"
                                        data-live-search="true">
                                    <option value="">اختر</option>
                                    <?php
                                    if (isset($all_Emps) && (!empty($all_Emps))) {
                                        foreach ($all_Emps as $key) {
                                            $select = '';
                                            if (isset($last_magls_update->glsa_reviser_id) && (!empty($last_magls_update->glsa_reviser_id))) {
                                                if ($key->id == $last_magls_update->glsa_reviser_id) {
                                                    $select = 'selected';
                                                }
                                            }
                                            ?>
                                            <option value="<?php echo $key->id; ?>" <?= $select ?>> <?php echo $key->employee; ?></option>
                                        <?php }
                                    } ?>
                                </select> -->
                                <input name="glsa_reviser_name" id="glsa_reviser_name" class="form-control" style="width:90%; float: right;"
                                   readonly
                                   data-toggle="modal" data-target="#myModal_emps"
                                   onclick="GetDiv_emps('myDiv_emp')"
                                   data-validation="required"
                                   value="<?php if(isset($last_magls_update->glsa_reviser_name)) echo $last_magls_update->glsa_reviser_name ?>"> 
                                   <input type="hidden" id="glsa_reviser_time"
                                   class="form-control"
                                    name="glsa_reviser_time"
value="<?php if (!empty($last_magls_update->glsa_reviser_time)) {
    echo $last_magls_update->glsa_reviser_time;
}else{
    echo date('H:i:s a');
}  ?>  ">
<input type="hidden" id="glsa_reviser_id" name="glsa_reviser_id" class="form-control"
value="<?php if (!empty($last_magls_update->glsa_reviser_id)) {
    echo $last_magls_update->glsa_reviser_id;
}  ?>  ">
                             <button type="button" data-toggle="modal" data-target="#myModal_emps"
                                    class="btn btn-success btn-next" style=""
                                    onclick="GetDiv_emps('myDiv_emp')">
                                <i class="fa fa-plus"></i></button> 
                            </div>
                            <div class="col-sm-4  col-md-4 padding-4 ">
                            <label class="label">   الموضوع  </label>
                            <input  id="subject" class="form-control " type="text"
                                   data-validation="required" name="subject"
                                   value="<?php if (isset($last_magls_update) && !empty($last_magls_update->subject)) {
                                       echo $last_magls_update->subject;
                                   }
                                   ?>"
                                   >
                        </div>
                        </div>
                   
                    <br>
                    <div class="col-md-12 text-center padding-4 ">
                                <label class="label   "> </label>
                                <?php if ((isset($open_galesa)) && (!empty($open_galesa)) && ($open_galesa > 0)) {
                                    $span = '<span  class="label-danger"> عذرا...  لا يمكنك إضافة جلسة جديدة لوجود جلسة نشطة بالمجلس </span>';
                                    $disabled = 'disabled';
                                } else {
                                    $span = '';
                                    $disabled = '';
                                } ?>
                                <button type="button" <?= $disabled ?>
                                        class="btn btn-labeled btn-success " onclick="save_galsa()" name="add"
                                        value="ADD"
                                        style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                                            <span class="btn-label"><i
                                                        class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                </button>
                                <input type="hidden" name="add" value="ADD"/>
                                <?= $span ?>
                            
                         
                        </div>
                 
                </form>
        </div>
    </div>
    </div>
    
    <div class="col-xs-12 fadeInUp wow no-padding ">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"> <?php echo $title_t; ?> </h3>
            </div>
            <div class="panel-body">
                <div class="col-md-12">
                    <?php if (isset($records) && !empty($records)) { ?>
                        <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0"
                               width="100%">
                            <thead>
                            <tr class="info">
                                <th>مسلسل</th>
                                <th>رقم الجلسة</th>
                                <th>تاريخ الجلسة</th>
                                <th>وقت الجلسة</th>
                                <th>حالة الجلسة</th>
                                <th>الأعضاء</th>
                                <th>عرض علي الموقع</th>
                                <th>الاجراء</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $x = 0;
                            foreach ($records as $row) {
                                $x++;
                                if ($row->glsa_finshed == 0) {
                                    $Halet_galsa = 'جلسة نشطة';
                                    $Halet_galsa_color = '#98c73e';
                                } elseif ($row->glsa_finshed == 1) {
                                    $Halet_galsa = 'جلسة إنتهت ';
                                    $Halet_galsa_color = '#e65656';
                                }
                                ?>
                                <tr>
                                    <td><?= $x ?></td>
                                    <td><?= $row->glsa_rkm_full ?></td>
                                    <td><?= $row->glsa_date_ar ?></td>
                                    <td><?= $row->glsa_time ?></td>
                                    <td style="background-color:<?php echo $Halet_galsa_color; ?>;">
                                        <?php echo $Halet_galsa; ?>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-add" data-toggle="modal"
                                                onclick="det_datiles(<?= $row->glsa_rkm ?>)"
                                                data-target="#myModal"><span class="fa fa-list"></span>
                                            التفاصيل
                                        </button>
                                    </td>
                                    <td>
                                        <?php
                                        if ($row->status == 1) {
                                            $status_checked = "checked";
                                        } else {
                                            $status_checked = "";
                                        }
                                        ?>
                                        <div class="toggle-example">
                                            <input id="status_hidden<?= $row->id ?>" type="hidden"
                                                   value="<?= $row->status ?>"/>
                                            <input id="checkbox_toggle" class="checkbox_toggle"
                                                   type="checkbox" <?= $status_checked ?> data-toggle="toggle"
                                                   onchange="change_status($('#status_hidden<?= $row->id ?>').val(),<?= $row->id ?>);"
                                                   data-onstyle="success" data-offstyle="danger" data-size="mini">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-danger">اضافه</button>
                                            <button type="button" class="btn btn-danger dropdown-toggle"
                                                    data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <?php if ($row->glsa_finshed == 0) { ?>
                                                    <li><a target="_blank"
                                                           href="<?= base_url() . 'md/all_glasat/All_glasat/update_galsa' . '/' . $row->glsa_rkm . '/' . $row->mgls_code ?>">
                                                            تعديل بيانات الجلسة </a></li>
                                                <?php } ?>
                                                <li><a target="_blank"
                                                       href="<?= base_url() ?>md/all_glasat/All_glasat/a3da_glsa/<?= $row->glsa_rkm ?>">
                                                        أعضاء الجلسه </a></li>
                                                <li><a target="_blank"
                                                       href="<?= base_url() ?>md/all_glasat/All_glasat/mehwr_glsa/<?= $row->glsa_rkm ?>">
                                                        محاور الجلسه </a></li>
                                                <li><a target="_blank"
                                                       href="<?= base_url() ?>md/all_glasat/Start_galsa/add_galsat_mon24a/<?= $row->glsa_rkm ?>">
                                                        مناقشة الجلسة </a></li>
                                                <li><a target="_blank"
                                                       href="<?= base_url() ?>md/all_glasat/All_glasat/add_attach/<?= $row->id ?>">
                                                        إضافة مرفقات </a></li>
                                                <li><a target="_blank"
                                                       href="<?= base_url() ?>md/all_glasat/All_glasat/add_video/<?= $row->id ?>">
                                                        مكتبة الفيديوهات </a></li>
                                                <li>
                                                    <a href="<?= base_url() ?>md/all_glasat/All_glasat/add_image/<?= $row->id ?>">
                                                        مكتبة الصور </a></li>
                                            </ul>
                                        </div>
                                        <?php
                                        if ($row->glsa_finshed == 0) { ?>
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
                                                    setTimeout(function(){window.location="<?php echo base_url() . 'md/all_glasat/All_glasat/delete_galsa/' . $row->id . '/' . $row->glsa_rkm ?>";}, 500);
                                                    });'>
                                                <i class="fa fa-trash"> </i></a>
                                            <?php
                                            if ($row->send_da3wat == 0) {
                                                $style = "";
                                                $style1 = "display: none;";
                                            } else {
                                                $style = "display: none;";
                                                $style1 = "";
                                            }
                                            ?>
                                            <a id="send_da3wat" class="btn btn-sm btn-info"
                                               style=" <?= $style ?>" onclick='swal({
                                                    title: "هل تريد إرسال الدعوات ؟",
                                                    text: "",
                                                    icon: "question",
                                                    iconHtml: "؟",
                                                    showCancelButton: true,
                                                    confirmButtonClass: "btn-warning",
                                                    confirmButtonText: "نعم",
                                                    cancelButtonText: "لا",
                                                    closeOnConfirm: false
                                                    },
                                                    function(){
                                                    send_da3wat(<?= $row->glsa_rkm ?>);
                                                    });'
                                               title="إرسال">إرسال الدعوه للأعضاء</a>
                                            <a id="trag3_send_da3wat" class="btn btn-sm btn-success"
                                               style="<?= $style1 ?>"> تم إرسال الدعوات </a>
                                        <?php } elseif ($row->glsa_finshed == 1) { ?>
                                            <span style="font-weight: normal !important;"
                                                  class="label-danger label label-default">لايمكن التعديل والحذف</span>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="myModal" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document" style="width: 80%">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">تفاصيل الأعضاء</h4>
                </div>
                <br>
                <div class="modal-body form-group col-sm-12 col-xs-12">
                    <div id="members_data"></div>
                </div>
                <div class="modal-footer" style="border-top: 0;">
                    <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo base_url() ?>asisst/admin_asset/js/analogue-time-picker.js"></script>
    <script>
        timePickerInput({
            inputElement: document.getElementById("glsa_time"),
            mode: 12,
            // time: new Date()
        });
    </script>
    <script>
        function get_glsa_day(day_date) {
            var event = new Date(day_date);
            var options = {weekday: 'long'};
            $('#glsa_day').val(event.toLocaleDateString('ar-EG', options));
        }
    </script>
    <script>
        function save_galsa() {
            var all_inputs = $(' #form1 [data-validation="required"]');
            var valid = 1;
            var text_valid = "";
            all_inputs.each(function (index, elem) {
                console.log(elem.id + $(elem).val());
                if ($(elem).val().length >= 1) {
                    // valid=1;
                    $(elem).css("border-color", "#5cb85c");
                } else {
                    valid = 0;
                    $(elem).css("border-color", "red");
                }
            });
            var makn_en3qd = $('#makn_en3qd').val();
            var glsa_reviser_id = $('#glsa_reviser_id').val();
            if (!makn_en3qd) {
                valid = 0;
                text_valid += "-مكان الإنعقاد ";
            }
            if (!glsa_reviser_id) {
                valid = 0;
                text_valid += "-مقرر الجلسة ";
            }
            if (valid == 0) {
                swal({
                    title: 'من فضلك ادخل كل الحقول ',
                    text: text_valid,
                    type: 'error',
                    confirmButtonText: 'تم'
                });
                return 0;
            } else {
                $('#form1').submit();
            }
        }
    </script>
    <!--16-7-om-->
    <script>
        function det_datiles(glsa_rkm) {
            $.ajax({
                type: 'post',
                url: "<?=base_url() . 'md/all_glasat/all_glasat/det_datiles'?>",
                data: {
                    glsa_rkm: glsa_rkm
                }, beforeSend: function () {
                    $('#members_data').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
                }, success: function (d) {
                    $('#members_data').html(d);
                }
            });
        }
    </script>
    <script>
        function send_da3wat(value) {
            if (value != 0 && value != '') {
                var dataString = 'glsa_rkm=' + value + '&send_da3wat=' + '1';
                $.ajax({
                    type: 'post',
                    url: '<?php echo base_url() ?>md/all_glasat/All_glasat/send_da3wat',
                    data: dataString,
                    dataType: 'html',
                    cache: false,
                    success: function (html) {
                        swal({
                            title: 'تم إرسال الدعوه',
                            confirmButtonText: "تم"
                        });
                        $("#trag3_send_da3wat").show();
                        $("#send_da3wat").hide();
                    }
                });
            }
        }
    </script>
    <script src="<?php echo base_url() ?>asisst/admin_asset/js/jquery-1.10.1.min.js" type="text/javascript"></script>
    <script src="
    <?php echo base_url() ?>asisst/admin_asset/plugins/bootstrap-toggle/bootstrap-toggle.min.js"
            type="text/javascript"></script>
    <script>
        $('.checkbox_toggle').bootstrapToggle({
            on: 'نعم',
            off: ' لا'
        });
    </script>
    <script>
        function change_status(valu, id) {
            $.ajax({
                type: 'post',
                url: "<?php echo base_url();?>md/all_glasat/all_glasat/change_status",
                data: {valu: valu, id: id},
                success: function (msg) {
                    var obj = JSON.parse(msg);
                    var status = obj.status;
                    console.log('status  ::' + status);
                    $('#status_hidden' + id).val(status);
                    if (status == 1) {
                        $('.show_status' + id).show();
                        console.log("????" + status);
                        // $('.checkbox_toggle').attr('Checked','Checked');
                        // $('.checkbox_toggle').bootstrapToggle('on');
                    } else {
                        $('.show_status' + id).hide();
                        console.log("hhhhhh" + status);
                        // $('.checkbox_toggle').bootstrapToggle('off');
                        // $('.checkbox_toggle').removeAttr('Checked');
                    }
                }
            });
        }
    </script>
    <!-- yaraaa15-10-2020 -->
    <div class="modal fade" id="myModal_emps" tabindex="-1" role="dialog"
aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document" style="width: 90%">
   <div class="modal-content">
       <div class="modal-header">
           <button type="button" class="close" onclick="$('#myModal_emps').modal('hide')"
                   aria-label="Close"><span
                       aria-hidden="true">&times;</span></button>
           <h4 class="modal-title" id="myModalLabel">  الموظفين </h4>
       </div>
       <div class="modal-body">
           <div id="myDiv_emp"></div>
       </div>
       <div class="modal-footer" style="display: inline-block;width: 100%">
           <button type="button" class="btn btn-danger"
                   style="float: left;" onclick="$('#myModal_emps').modal('hide')">إغلاق
           </button>
       </div>
   </div>
</div>
</div>
<script>
           // yara15-10-2020
            function GetDiv_emps(div) {
                html = '<div class="col-md-12 no-padding"><table id="js_table_members2" class="table table-striped table-bordered dt-responsive nowrap " >' +
                    '<thead><tr class="info"><th style="width: 50px;">م</th><th style="width: 50px;">   كود الموظف  </th><th style="width: 50px;">   اسم الموظف  </th>' +
                    '<th style="width: 50px;">    المسمي الوظيفي  </th><th style="width: 50px;">    الاداره  </th><th style="width: 50px;">   القسم  </th>' +
                    '</tr></thead><table><div id="dataMember"></div></div>';
                $("#" + div).html(html);
                $('#js_table_members2').show();
                var oTable_usergroup = $('#js_table_members2').DataTable({
                    dom: 'Bfrtip',
                    "ajax": '<?php echo base_url(); ?>md/all_glasat/All_glasat/getConnection_emp/',
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
                    destroy: true,
                });
            }
            function Get_emp_Name(obj) {
                var title = obj.dataset.name;
                var code = obj.dataset.code;
                document.getElementById('glsa_reviser_name').value = title;
                document.getElementById('glsa_reviser_id').value = code;
                $("#myModal_emps .close").click();
            }
        </script>