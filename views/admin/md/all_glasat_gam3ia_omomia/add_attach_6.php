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
            <div class="col-sm-12" style="padding-bottom: 27px;">
                <div class="form-group col-sm-3">
                    <label class="label">رقم الجلسه</label>
                    <input type="text" class="form-control" id="glsa_rkm_full" name="glsa_rkm_full"
                           readonly value="<?php echo date("Y"); ?>/<?php echo $galsa->glsa_rkm; ?>"/>
                </div>
                <div class="form-group col-md-2 col-sm-6 col-xs-12 padding-4">
                    <label class="label" style="text-align: center !important;">
                        <img style="width: 18px;float: right;"
                             src="<?php echo base_url(); ?>asisst/admin_asset/img/f_date/icon3.png">
                        تاريخ فتح الجلسه
                        <img style="width: 18px;float: left;"
                             src="<?php echo base_url(); ?>asisst/admin_asset/img/f_date/icon6.png">
                    </label>
                    <div id="cal-1" style="    width: 50%;">
                        <input id="date-Miladi" class="form-control" data-validation="required"
                               name="glsa_date_m" class="form-control"
                               value="<?php echo $galsa->glsa_date_m; ?> "
                               type="text" onfocus="showCal1();" style=" width: 100%;float: right" readonly/>
                    </div>
                </div>
                <div class="form-group col-md-2 col-sm-6 col-xs-12 padding-4">
                    <div id="cal-2" style="    width: 50%;     margin-top: 18px;
    margin-right: -104px;">
                        <input id="date-Hijri" class="form-control" data-validation="required"
                               name="glsa_date_h" class="form-control"
                               value="<?php echo $galsa->glsa_date_h; ?>"
                               type="text" onfocus="showCal2();" style=" width: 100%;float: right" readonly/>
                    </div>
                </div>
            </div>

            <div class="col-md-12 load_morfaq">
                <div class="form-group col-sm-3">
                    <label class="label"> اسم المرفق </label>
                    <input type="text" class="form-control" name="title" id="title"
                           data-validation="required"
                           value=""/>
                    <!--                    <input type="hidden" name="activity_id" id="activity_id"-->
                    <!--                           value=--><?//= $record[0]->id ?><!--/>-->
                </div>
                <div class="form-group col-sm-3">
                    <label class="label"> المرفق </label>
                    <input type="file" class="form-control" name="file" id="myfile"
                           data-validation="required" value=""/>
                </div>

                <div class="col-xs-12 no-padding" style="padding: 10px;">
                    <div class="text-center">
                        <button type="button" id="buttons"  onclick="add_morfaq(<?= $galsa->id ?>,'file');"
                                class="btn btn-labeled btn-success" id="save" name="save" value="save">
                            <span class="btn-label"><i class="fa fa-floppy-o"></i></span>حفظ
                        </button>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
<div class="col-xs-12 fadeInUp wow">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"> <?php echo $title_t; ?> </h3>
        </div>
        <div class="panel-body">
            <div class="col-md-12">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                    <tr class="info">
                        <th style="text-align: center;">اسم المرفق</th>
                        <th style="text-align: center;">الاجراء</th>
                    </tr>
                    </thead>
                    <tbody id="morfq_table">
                    <?php
                    if (isset($records) && !empty($records)) {
                        $z = 1;
                        foreach ($records as $row) {
                            ?>
                            <tr id="row_<?= $z ?>">
                                <td style="width: 80%">
                                    <?= $row->title ?>
                                </td>
                                <td style="width: 10%">
                                    <a href="<?php echo base_url() . 'md/all_glasat_gam3ia_omomia/all_glasat_gam3ia_omomia/read_file/' . $row->id ?>"
                                       target="_blank">
                                        <i class=" fa fa-eye"></i></a>
                                    <a href="<?php echo base_url() . 'md/all_glasat_gam3ia_omomia/all_glasat_gam3ia_omomia/download_file/' . $row->id.'/3' ?>"
                                       target="_blank">
                                        <i class=" fa fa-download"></i></a>
                                    <a href="#" onclick='swal({
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
                                            delete_my_morfaq($("#row_<?= $z ?>"),<?= $row->id ?>);
                                            });'>
                                        <i class="fa fa-trash"> </i></a>
                                </td>
                            </tr>
                            <?php
                            $z++;
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src='<?php echo base_url(); ?>asisst/admin_asset/js/hijri-date.js'></script>
<script src='<?php echo base_url(); ?>asisst/admin_asset/js/calendar.js'></script>
<script>
    var cal1 = new Calendar(),
        cal2 = new Calendar(true, 0, true, true),
        date1 = document.getElementById('date-Miladi'),
        date2 = document.getElementById('date-Hijri'),
        cal1Mode = cal1.isHijriMode(),
        cal2Mode = cal2.isHijriMode();
    /*	date1.setAttribute("value",cal1.getDate().getDateString());
     date2.setAttribute("value",cal2.getDate().getDateString());*/
    document.getElementById('cal-1').appendChild(cal1.getElement());
    document.getElementById('cal-2').appendChild(cal2.getElement());
    cal1.show();
    cal2.show();
    //	setDateFields1();
    cal1.callback = function () {
        if (cal1Mode !== cal1.isHijriMode()) {
            cal2.disableCallback(true);
            cal2.changeDateMode();
            cal2.disableCallback(false);
            cal1Mode = cal1.isHijriMode();
            cal2Mode = cal2.isHijriMode();
        } else
            cal2.setTime(cal1.getTime());
        setDateFields1();
    };
    cal2.callback = function () {
        if (cal2Mode !== cal2.isHijriMode()) {
            cal1.disableCallback(true);
            cal1.changeDateMode();
            cal1.disableCallback(false);
            cal1Mode = cal1.isHijriMode();
            cal2Mode = cal2.isHijriMode();
        } else
            cal1.setTime(cal2.getTime());
        setDateFields1();
    };
    cal1.onHide = function () {
        cal1.show(); // prevent the widget from being closed
    };
    cal2.onHide = function () {
        cal2.show(); // prevent the widget from being closed
    };
    function setDateFields1() {
        /*	date1.value = cal1.getDate().getDateString();
         date2.value = cal2.getDate().getDateString();*/
        date1.setAttribute("value", cal1.getDate().getDateString());
        date2.setAttribute("value", cal2.getDate().getDateString());
    }
    function showCal1() {
        if (cal1.isHidden())
            cal1.show();
        else
            cal1.hide();
    }
    function showCal2() {
        if (cal2.isHidden())
            cal2.show();
        else
            cal2.hide();
    }
</script>

<!--
<script>
    function det_datiles(glsa_rkm) {
        $.ajax({
            type: 'post',
            url: "<?=base_url() . 'md/all_glasat_gam3ia_omomia/all_glasat_gam3ia_omomia/det_datiles'?>",
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
-->


<script>

    function add_morfaq(glsa_id_fk,type) {

        var title = $('#title').val();
        var file = $('#myfile').prop('files')[0];
        var all_inputs = $('.load_morfaq [data-validation="required"]');
        var form_data = new FormData();
        form_data.append('file', file);
        form_data.append('title', title);
        form_data.append('save', 1);

        var valid = 1;
        var text_valid = "";
        all_inputs.each(function (index, elem) {
            console.log(elem.id + $(elem).val());
            if ($(elem).val() != '') {
                // valid=1;
                $(elem).css("border-color", "");
            } else {
                valid = 0;
                $(elem).css("border-color", "red");

            }
        });

        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>md/all_glasat_gam3ia_omomia/all_glasat_gam3ia_omomia/add_attach/'.glsa_id_fk,
            data: form_data,
            dataType: 'text',  // what to expect back from the PHP script, if anything
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
                        title: 'جاري الحفظ  ',
                        type: 'success',
                        confirmButtonText: 'تم'
                    });
                }
            },
            success: function (html) {
                swal({
                    title: 'تم الحفظ ',
                    type: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'تم'
                });
                window.location.reload();
                //load_add_morfaq(galsa_id);
            }
        });
    }

    function delete_my_morfaq(elem, attach) {
        $(elem).closest("tr").remove();

        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>md/all_glasat_gam3ia_omomia/all_glasat_gam3ia_omomia/delete_attach',
            data: {attach: attach,type:3},
            dataType: 'html',
            cache: false,
            success: function (html) {
                swal("تم الحذف!", "", "success");
                //window.location.reload();

            }
        });

    }

</script>