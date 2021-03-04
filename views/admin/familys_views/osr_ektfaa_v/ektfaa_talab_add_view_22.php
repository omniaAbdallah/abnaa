<style>
    fieldset {
        border: 1px solid #ddd !important;
        margin: 0;
        xmin-width: 0;
        padding: 10px;
        position: relative;
        border-radius: 4px;
        background-color: #f5f5f5;
        padding-left: 10px !important;
    }
    legend {
        font-size: 14px;
        font-weight: bold;
        margin-bottom: 0px;
        width: 35%;
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 5px 5px 5px 10px;
        background-color: #ffffff;
    }
</style>
<div class="col-xs-12 ">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $title ?>
            </h3>
        </div>
        <?php echo form_open_multipart('family_controllers/osr_ektfaa/Ektfaa_talab', array('id' => 'myform')); ?>
        <div class="panel-body">
            <div class="col-sm-12 col-xs-12">
                <fieldset>
                    <legend> بيانات الاساسية</legend>
                    <div class=" form-group col-sm-3  col-md-2 padding-4 ">
                        <label class="label  ">رقم الملف </label>
                        <input type="text" name="file_num" id="file_num" value=""
                               ondblclick="$('#myModal').modal();load_table()" data-validation="required"
                               readonly style="width: 79%;float: right" class="form-control ">
                        <button type="button" data-toggle="modal" data-target="#myModal"
                                onclick="load_table()" class="btn btn-success btn-next" style="float: left;">
                            <i class="fa fa-plus"></i></button>
                        <!-- <input type="hidden" name="mother_national_num" id="mother_national_num" value="">
                         <input type="hidden" name="father_card" id="father_card" value="">-->
                    </div>
                    <div class="col-md-12 " id="Details"></div>
                    <div class="clearfix"></div>
                </fieldset>
                <fieldset>
                    <legend>الديون والالتزمات</legend>
                    <div class="form-group col-sm-3  col-md-2 padding-4 ">
                        <label class="label">هل عليكم ديون </label>
                        <div class="radio-content">
                            <input type="radio" id="have_debt1" name="have_debt"
                                   onclick="$('#debt_data').show();$('#debt_data .form-control').attr('data-validation', 'required');"
                                   value="yes">
                            <label for="have_debt1" class="radio-label">نعم </label>
                        </div>

                        <div class="radio-content">
                            <input type="radio" id="have_debt2"
                                   onclick="$('#debt_data').hide();$('#debt_data input').val(''); $('input[name=have_other_debt]').prop('checked', false);$('#debt_data .form-control').removeAttr('data-validation');"
                                   name="have_debt" value="no">
                            <label for="have_debt2" class="radio-label">لا </label>
                        </div>

                    </div>

                    <div id="debt_data" style="display: none">
                        <div class=" form-group col-sm-3  col-md-2 padding-4 ">
                            <label class="label  ">مقدار الدين </label>
                            <input type="number" name="debt" id="debt" value="" data-validation="required"
                                   class="form-control ">

                        </div>
                        <div class=" form-group col-sm-3  col-md-2 padding-4 ">
                            <label class="label  ">صاحب الدين</label>
                            <input type="text" name="debt_name" id="debt_name" value="" data-validation="required"
                                   class="form-control ">
                        </div>
                        <div class="form-group col-sm-3  col-md-3 padding-4 ">
                            <label class="label">هل عليكم ديون متعثرة او قضايا بالمحكمة </label>
                            <div class="radio-content">
                                <input type="radio" id="have_other_debt1" name="have_other_debt"
                                       onclick="$('#other_debt_name').show();$('#other_debt_name .form-control').attr('data-validation', 'required');"
                                       value="yes">
                                <label for="have_other_debt1" class="radio-label">نعم </label>
                            </div>

                            <div class="radio-content">
                                <input type="radio" id="have_other_debt2" name="have_other_debt"
                                       onclick="$('#other_debt_name').hide();$('#other_debt_name input').val('');$('#other_debt_name .form-control').removeAttr('data-validation');"
                                       value="no">
                                <label for="have_other_debt2" class="radio-label">لا </label>
                            </div>

                        </div>
                        <div class=" form-group col-sm-3  col-md-2 padding-4 " id="other_debt_name"
                             style="display: none">
                            <label class="label  "> مقدارالدين/وصف القضية</label>
                            <input type="text" name="other_debt_name" value="" data-validation="required"
                                   class="form-control ">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </fieldset>
                <fieldset>
                    <?php
                    /*$project_type = array(1 => 'تجاري', 2 => "خدمي", 3 => "اسر منتجة");
                    $tranning_type = array(1 => 'المحاسبة', 2 => "إدارة المشاريع", 3 => " مهارات البيع والتسويق", 4 => 'دورة التجميل', 5 => "صناعة العطور", 6 => "خياطة ", 7 => "إعداد مأكولات ");
                    $project_states = array(1 => 'جديد', 2 => "قائم اقل من سنتين", 3 => "قائم اكثر من سنتين ");
                    $num_work = array(1 => 'لا يوجد', 2 => "1", 3 => "2", 4 => "3 فاكثر");*/

                    ?>
                    <legend>بيانات المشروع</legend>
                    <div class="form-group col-sm-3  col-md-2 padding-4 ">
                        <label class="label"> نوع المشروع </label>
                        <select class="form-control" data-validation="required" name="type_project">
                            <?php foreach ($project_type as $key => $item) { ?>
                                <option value="<?= $item['code'] ?>"><?= $item['title'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-sm-3  col-md-2 padding-4 ">
                        <label class="label">هل يوجد رخصة </label>
                        <div class="radio-content">
                            <input type="radio" id="have_lincense1" name="have_lincense"
                                   onclick="$('#lincense_project').show();$('#lincense_project .form-control').attr('data-validation', 'required');"
                                   value="yes">
                            <label for="have_lincense1" class="radio-label">نعم </label>
                        </div>

                        <div class="radio-content">
                            <input type="radio" id="have_lincense2" name="have_lincense"
                                   onclick="$('#lincense_project').hide();$('#lincense_project input').val('');$('#lincense_project .form-control').removeAttr('data-validation');"
                                   value="no">
                            <label for="have_lincense2" class="radio-label">لا </label>
                        </div>

                    </div>
                    <div class=" form-group col-sm-3  col-md-2 padding-4 " id="lincense_project"
                         style="display: none">
                        <label class="label  "> رخصة اسر المنتجة/سجل التجاري </label>
                        <input type="text" name="lincense_project" value="" data-validation="required"
                               class="form-control ">
                    </div>

                    <div class=" form-group col-sm-3  col-md-4 padding-4 ">
                        <label class="label  ">وصف المشروع </label>
                        <input type="text" name="project_describ" id="project_describ" value=""
                               data-validation="required"
                               class="form-control ">

                    </div>
                    <div class=" form-group col-sm-3  col-md-2 padding-4 ">
                        <label class="label  ">حالة المشروع </label>
                        <select class="form-control" data-validation="required" name="project_states">
                            <?php foreach ($project_states as $key => $item) { ?>
                                <option value="<?= $item['code'] ?>"><?= $item['title'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-sm-3  col-md-2 padding-4 ">
                        <label class="label">هل سبق الاستفادة من التمويل للمشروع </label>
                        <div class="radio-content">
                            <input type="radio" id="have_tamwil1" name="have_tamwil"
                                   onclick="$('#tamwil_num').show();$('#tamwil_num .form-control').attr('data-validation', 'required');"
                                   value="yes">
                            <label for="have_tamwil1" class="radio-label">نعم </label>
                        </div>

                        <div class="radio-content">
                            <input type="radio" id="have_tamwil2" name="have_tamwil"
                                   onclick="$('#tamwil_num').hide();$('#tamwil_num input').val('');$('#tamwil_num .form-control').removeAttr('data-validation');"
                                   value="no">
                            <label for="have_tamwil2" class="radio-label">لا </label>
                        </div>

                    </div>
                    <div class=" form-group col-sm-3  col-md-2 padding-4 " id="tamwil_num"
                         style="display: none">
                        <label class="label  "> المبلغ </label>
                        <input type="number" name="tamwil_num" value="" data-validation="required"
                               class="form-control ">
                    </div>
                    <div class="form-group col-sm-3  col-md-3 padding-4 ">
                        <label class="label">ارباح المشروع السنة الماضية للمشاريع القائمة </label>
                        <div class="radio-content">
                            <input type="radio" id="project_profit1" name="project_profit"
                                   onclick="$('#profit_num').show();$('#profit_num .form-control').attr('data-validation', 'required');"
                                   value="yes">
                            <label for="project_profit1" class="radio-label">نعم </label>
                        </div>

                        <div class="radio-content">
                            <input type="radio" id="project_profit2" name="project_profit"
                                   onclick="$('#profit_num').hide();$('#profit_num input').val('');$('#profit_num .form-control').removeAttr('data-validation');"
                                   value="no">
                            <label for="project_profit2" class="radio-label">لا </label>
                        </div>

                    </div>
                    <div class=" form-group col-sm-3  col-md-2 padding-4 " id="profit_num"
                         style="display: none">
                        <label class="label  "> قيمة الربح </label>
                        <input type="number" name="profit_num" value="" data-validation="required"
                               class="form-control ">
                    </div>

                    <div class="form-group col-sm-3  col-md-2 padding-4 ">
                        <label class="label">عدد العاملين من داخل الاسرة </label>
                        <input type="number" name="mun_in" value="" data-validation="required" class="form-control ">
                        <?php /*foreach ($num_work as $key => $item) { ?>
                            <div class="radio-content">
                                <input type="radio" id="mun_in<?= $key ?>" name="mun_in" 
                                       value="<?= $key ?>">
                                <label for="mun_in<?= $key ?>" class="radio-label"><?= $item ?> </label>
                            </div>
                        <?php }*/ ?>

                    </div>
                    <div class="form-group col-sm-3  col-md-2 padding-4 ">
                        <label class="label">عدد العاملين من خارج الاسرة </label>
                        <input type="number" name="num_out" value="" data-validation="required" class="form-control ">

                        <?php /* foreach ($num_work as $key => $item) { ?>
                            <div class="radio-content">
                                <input type="radio" id="num_out<?= $key ?>" name="num_out" 
                                       value="<?= $key ?>">
                                <label for="num_out<?= $key ?>" class="radio-label"><?= $item ?> </label>
                            </div>
                        <?php } */ ?>

                    </div>
                    <div class="form-group col-sm-3  col-md-3 padding-4 ">
                        <label class="label">هل لديكم الرغبة في تطوير المشروع من خلال التدريب </label>
                        <div class="radio-content">
                            <input type="radio" id="need_tranning1" name="need_tranning"
                                   onclick="$('#tranning_ids').show();$('#tranning_ids select').attr('data-validation', 'required');"
                                   value="yes">
                            <label for="need_tranning1" class="radio-label">نعم </label>
                        </div>

                        <div class="radio-content">
                            <input type="radio" id="need_tranning2" name="need_tranning"
                                   onclick="$('#tranning_ids').hide();$('#tranning_ids select').val('');$('#tranning_ids select').removeAttr('data-validation');"
                                   value="no">
                            <label for="need_tranning2" class="radio-label">لا </label>
                        </div>

                    </div>
                    <div class=" form-group col-sm-3  col-md-2 padding-4 " id="tranning_ids"
                         style="display: none">
                        <label class="label  "> نوع التدريب </label>
                        <select class="form-control selectpicker" data-show-subtext="true" data-live-search="true"
                                data-validation="required" name="tranning_ids[]" multiple>
                            <?php foreach ($tranning_type as $key => $item) { ?>
                                <option value="<?= $item['code'] ?>"><?= $item['title'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="clearfix"></div>
                </fieldset>
                <div class="col-xs-12 text-center">
                    <button type="submit" class="btn btn-labeled btn-success" name="save" value="save" id="myBtn">
                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">الأسرة</h4>
            </div>
            <div class="modal-body" id="json_table">
            </div>
            <div class="modal-footer" style="display: inline-block;width: 100%">
                <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<script>
    function load_table() {
        var html;
        html = '<div class="col-md-12"><table id="my_table" class="table table-striped table-bordered dt-responsive nowrap " >' +
            '<thead><tr><th style="width: 30px;">م</th><th style="width: 50px;"> رقم الملف </th><th style="width: 80px;"> إسم رب الأسرة </th><th style="width: 50px;" >رقم الهوية</th>' +
            '<th style="width: 80px;"> إسم الأم </th><th style="width: 50px;"> رقم الهوية </th></tr></thead><table><div id="dataMember"></div></div>';
        $("#json_table").html(html);
        $('#my_table').show();
        var oTable_usergroup = $('#my_table').DataTable({
            dom: 'Bfrtip',
            "ajax": '<?php echo base_url(); ?>family_controllers/osr_ektfaa/Ektfaa_talab/getFamilyTable',
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
    function getFile_num(value) {
        $('#file_num').val(value);
        console.log($('#radio' + value).attr('data-father'));
        $('#mokadem_name').val($('#radio' + value).attr('data-father'));
        $('#mother_national_num').val($('#radio' + value).attr('data-mother'));
        $('#father_card').val($('#radio' + value).attr('data-father-card'));
        $('#myModal').modal('hide');
        var file_num = $('#file_num').val();
        if (file_num != 0 && file_num != '') {
            var dataString = 'file_num=' + file_num;
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>family_controllers/osr_ektfaa/Ektfaa_talab/getDetails',
                data: $('#myform').serialize() + "&" + dataString,
                dataType: 'html',
                cache: false,
                beforeSend: function () {
                    $('#Details').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
                }
                ,
                success: function (html) {
                    $("#Details").html(html);
                }
            });
        }
    }
</script>
  