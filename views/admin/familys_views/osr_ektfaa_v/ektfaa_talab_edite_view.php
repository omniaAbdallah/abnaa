<?php if (isset($one_data) && (!empty($one_data))) { ?>
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
        .form-group .help-block.form-error {
            display: block !important;
        }
        .check-style {
            display: inline-block;
        }
    </style>
    <div class="col-xs-12 ">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title ?>
                </h3>
            </div>
            <?php
            /* echo '<pre>';
             print_r($one_data);
             echo '</pre>';*/

            // echo form_open_multipart('family_controllers/osr_ektfaa/Ektfaa_talab/edite/' . $one_data['id'], array('id' => 'myform')); ?>
            <div class="panel-body">

                <div class="col-sm-12 col-xs-12">
                    <div class="custom-tabs">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" id="nav-tabs" role="tablist">
                            <li role="presentation" class="active ">
                                <a href="#main-data" aria-controls="main-data" role="tab"
                                   data-toggle="tab">البيانات الأساسية</a></li>
                            <li role="presentation"><a href="#dept-data" aria-controls="dept-data" role="tab"
                                                       data-toggle="tab">الديون والالتزمات</a></li>
                            <li role="presentation"><a href="#project-data" aria-controls="project-data"
                                                       role="tab" data-toggle="tab">بيانات المشروع</a></li>
                            <li role="presentation"><a href="#user-data" aria-controls="user-data"
                                                       role="tab" data-toggle="tab">الحسابات الخاصة بالمستخدم</a></li>
                            <li role="presentation"><a href="#attach-data" aria-controls="attach-data"
                                                       role="tab" data-toggle="tab"> رفع المستندات</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="main-data">
                                <fieldset>
                                    <?php echo form_open_multipart('family_controllers/osr_ektfaa/Ektfaa_talab/edite/' . $one_data['id']); ?>
                                    <input type="hidden" name="page" value="1">
                                    <legend> بيانات الاساسية</legend>
                                    <div class=" form-group col-sm-3  col-md-2 padding-4 ">
                                        <label class="label  ">رقم الملف </label>
                                        <input type="text" name="file_num" id="file_num"
                                               value="<?= $one_data['file_num'] ?>"
                                               ondblclick="$('#myModal').modal();load_table()"
                                               data-validation="required"
                                               readonly style="width: 79%;float: right" class="form-control ">
                                        <button type="button" data-toggle="modal" data-target="#myModal"
                                                onclick="load_table()" class="btn btn-success btn-next"
                                                style="float: left;">
                                            <i class="fa fa-plus"></i></button>
                                    </div>
                                    <div class=" form-group col-sm-3  col-md-2 padding-4 ">
                                        <label class="label  ">مقد الطلب</label>
                                        <input type="text" name="mokadem_talb" list="mokadem_talb" id="mokadem_talb_input" data-validation="required" class="form-control " onchange="getFile_num(this.value)">
                                        <datalist  id="mokadem_talb">
                                        </datalist>
                                    </div>
                                    <div class="col-md-12 " id="Details">
                                        <?php
                                        if (isset($file_num_data) && (!empty($file_num_data))) {
                                            $data['file_num_data'] = $file_num_data;
                                            $this->load->view('admin/familys_views/osr_ektfaa_v/details_load_page', $data);
                                        }
                                        ?>

                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-xs-12 text-center" style="margin-top: 29px;">
                                        <div class="panel-footer">
                                            <div class="text-center">
                                                <button class="btnNext  btn btn-labeled btn-warning"
                                                        style="font-size: 16px;">
                                                    التالى
                                                    <span class="btn-label" style="right: auto;left: -14px;"><i
                                                                class="fa fa-chevron-left"></i></span></button>

                                                <button type="submit" class="btn btn-labeled btn-success" name="save"
                                                        value="save"
                                                        style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                                            <span class="btn-label"><i
                                                        class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <?php echo form_close() ?>
                                </fieldset>
                            </div>
                            <div role="tabpanel" class="tab-pane fade " id="dept-data">
                                <fieldset>
                                    <legend>الديون والالتزمات</legend>
                                    <?php echo form_open_multipart('family_controllers/osr_ektfaa/Ektfaa_talab/edite/' . $one_data['id']); ?>
                                    <input type="hidden" name="page" value="2">

                                    <div class="form-group col-sm-3  col-md-2 padding-4 ">
                                        <label class="label">هل عليكم ديون </label>
                                        <div class="check-style">
                                            <input type="checkbox" id="have_debt1" data-div_id="debt_data"
                                                   name="have_debt"
                                                   data-validation="checkbox_group,check_show" data-validation-qty="1-1"
                                                   onclick="$('#debt_data').show();//$('#debt_data .form-control').attr('data-validation', 'required');"
                                                   value="yes">
                                            <label for="have_debt1" class="">نعم </label>
                                        </div>

                                        <div class="check-style">
                                            <input type="checkbox" id="have_debt2" data-div_id="debt_data"
                                                   data-validation="checkbox_group,check_show" data-validation-qty="1-1"
                                                   onclick="$('#debt_data').hide();$('#debt_data input').val(''); $('input[name=have_other_debt]').prop('checked', false);//$('#debt_data .form-control').removeAttr('data-validation');"
                                                   name="have_debt" value="no">
                                            <label for="have_debt2" class="">لا </label>
                                        </div>

                                    </div>

                                    <div id="debt_data" style="display: none">
                                        <div class=" form-group col-sm-3  col-md-2 padding-4 ">
                                            <label class="label  ">مقدار الدين </label>
                                            <input type="number" name="debt" id="debt" value="" data-validation="number"
                                                   class="form-control " data-validation-depends-on="have_debt"
                                                   data-validation-depends-on-value="yes">

                                        </div>
                                        <div class=" form-group col-sm-3  col-md-2 padding-4 ">
                                            <label class="label  ">صاحب الدين</label>
                                            <input type="text" name="debt_name" id="debt_name" value=""
                                                   data-validation="required"
                                                   class="form-control " data-validation-depends-on="have_debt"
                                                   data-validation-depends-on-value="yes">
                                        </div>
                                        <div class="form-group col-sm-3  col-md-3 padding-4 ">
                                            <label class="label">هل عليكم ديون متعثرة او قضايا بالمحكمة </label>
                                            <div class="check-style">
                                                <input type="checkbox" id="have_other_debt1" name="have_other_debt"
                                                       data-validation="checkbox_group" data-validation-qty="1-1"
                                                       onclick="$('#other_debt_name').show();//$('#other_debt_name .form-control').attr('data-validation', 'required');"
                                                       value="yes" data-validation-depends-on="have_debt"
                                                       data-validation-depends-on-value="yes">
                                                <label for="have_other_debt1" class="">نعم </label>
                                            </div>

                                            <div class="check-style">
                                                <input type="checkbox" id="have_other_debt2" name="have_other_debt"
                                                       data-validation="checkbox_group" data-validation-qty="1-1"
                                                       onclick="$('#other_debt_name').hide();$('#other_debt_name input').val('');//$('#other_debt_name .form-control').removeAttr('data-validation');"
                                                       value="no" data-validation-depends-on="have_debt"
                                                       data-validation-depends-on-value="yes">
                                                <label for="have_other_debt2" class="">لا </label>
                                            </div>

                                        </div>
                                        <div class=" form-group col-sm-3  col-md-2 padding-4 " id="other_debt_name"
                                             style="display: none">
                                            <label class="label  "> مقدارالدين/وصف القضية</label>
                                            <input type="text" name="other_debt_name" value=""
                                                   data-validation="required"
                                                   class="form-control " data-validation-depends-on="have_other_debt"
                                                   data-validation-depends-on-value="yes">
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-xs-12 text-center" style="margin-top: 29px;">
                                        <div class="panel-footer">
                                            <div class="text-center">
                                                <a class="btnPrevious btn btn-labeled btn-warning"
                                                   style="font-size: 16px;"><span class="btn-label"><i
                                                                class="fa fa-chevron-right"></i></span>السابق </a>
                                                <button class="btnNext  btn btn-labeled btn-warning"
                                                        style="font-size: 16px;">
                                                    التالى
                                                    <span class="btn-label" style="right: auto;left: -14px;"><i
                                                                class="fa fa-chevron-left"></i></span></button>

                                                <button type="submit" class="btn btn-labeled btn-success" name="save"
                                                        value="save"
                                                        style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                                            <span class="btn-label"><i
                                                        class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <?php echo form_close() ?>

                                </fieldset>
                            </div>
                            <div role="tabpanel" class="tab-pane fade " id="project-data">
                                <fieldset>
                                    <?php
                                    /*$project_type = array(1 => 'تجاري', 2 => "خدمي", 3 => "اسر منتجة");
                                    $tranning_type = array(1 => 'المحاسبة', 2 => "إدارة المشاريع", 3 => " مهارات البيع والتسويق", 4 => 'دورة التجميل', 5 => "صناعة العطور", 6 => "خياطة ", 7 => "إعداد مأكولات ");
                                    $project_states = array(1 => 'جديد', 2 => "قائم اقل من سنتين", 3 => "قائم اكثر من سنتين ");
                                    $num_work = array(1 => 'لا يوجد', 2 => "1", 3 => "2", 4 => "3 فاكثر");*/
                                    ?>
                                    <legend>بيانات المشروع</legend>
                                    <?php echo form_open_multipart('family_controllers/osr_ektfaa/Ektfaa_talab/edite/' . $one_data['id']); ?>
                                    <input type="hidden" name="page" value="3">
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
                                        <div class="check-style">
                                            <input type="checkbox" id="have_lincense1" name="have_lincense"
                                                   data-validation="checkbox_group" data-validation-qty="1-1"
                                                   onclick="$('#lincense_project').show();//$('#lincense_project .form-control').attr('data-validation', 'required');"
                                                   value="yes">
                                            <label for="have_lincense1" class="">نعم </label>
                                        </div>

                                        <div class="check-style">
                                            <input type="checkbox" id="have_lincense2" name="have_lincense"
                                                   data-validation="checkbox_group" data-validation-qty="1-1"
                                                   onclick="$('#lincense_project').hide();$('#lincense_project input').val('');//$('#lincense_project .form-control').removeAttr('data-validation');"
                                                   value="no">
                                            <label for="have_lincense2" class="">لا </label>
                                        </div>

                                    </div>
                                    <div class=" form-group col-sm-3  col-md-2 padding-4 " id="lincense_project"
                                         style="display: none">
                                        <label class="label  "> رخصة اسر المنتجة/سجل التجاري </label>
                                        <input type="text" name="lincense_project" value="" data-validation="required"
                                               data-validation-depends-on="have_lincense"
                                               data-validation-depends-on-value="yes"
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
                                        <div class="check-style">
                                            <input type="checkbox" id="have_tamwil1" name="have_tamwil"
                                                   data-validation="checkbox_group" data-validation-qty="1-1"
                                                   onclick="$('#tamwil_num').show();//$('#tamwil_num .form-control').attr('data-validation', 'required');"
                                                   value="yes">
                                            <label for="have_tamwil1" class="">نعم </label>
                                        </div>

                                        <div class="check-style">
                                            <input type="checkbox" id="have_tamwil2" name="have_tamwil"
                                                   data-validation="checkbox_group" data-validation-qty="1-1"
                                                   onclick="$('#tamwil_num').hide();$('#tamwil_num input').val('');//$('#tamwil_num .form-control').removeAttr('data-validation');"
                                                   value="no">
                                            <label for="have_tamwil2" class="">لا </label>
                                        </div>

                                    </div>
                                    <div class=" form-group col-sm-3  col-md-2 padding-4 " id="tamwil_num"
                                         style="display: none">
                                        <label class="label  "> المبلغ </label>
                                        <input type="number" name="tamwil_num" value="" data-validation="number"
                                               class="form-control " data-validation-depends-on="have_tamwil"
                                               data-validation-depends-on-value="yes">
                                    </div>
                                    <div class="form-group col-sm-3  col-md-3 padding-4 ">
                                        <label class="label">ارباح المشروع السنة الماضية للمشاريع القائمة </label>
                                        <div class="check-style">
                                            <input type="checkbox" id="project_profit1" name="project_profit"
                                                   data-validation="checkbox_group" data-validation-qty="1-1"
                                                   onclick="$('#profit_num').show();//$('#profit_num .form-control').attr('data-validation', 'required');"
                                                   value="yes">
                                            <label for="project_profit1" class="">نعم </label>
                                        </div>

                                        <div class="check-style">
                                            <input type="checkbox" id="project_profit2" name="project_profit"
                                                   data-validation="checkbox_group" data-validation-qty="1-1"
                                                   onclick="$('#profit_num').hide();$('#profit_num input').val('');//$('#profit_num .form-control').removeAttr('data-validation');"
                                                   value="no">
                                            <label for="project_profit2" class="">لا </label>
                                        </div>

                                    </div>
                                    <div class=" form-group col-sm-3  col-md-2 padding-4 " id="profit_num"
                                         style="display: none">
                                        <label class="label  "> قيمة الربح </label>
                                        <input type="number" name="profit_num" value="" data-validation="number"
                                               class="form-control " data-validation-depends-on="project_profit"
                                               data-validation-depends-on-value="yes">
                                    </div>

                                    <div class="form-group col-sm-3  col-md-2 padding-4 ">
                                        <label class="label">عدد العاملين من داخل الاسرة </label>
                                        <input type="number" name="mun_in" value="" data-validation="number"
                                               class="form-control ">
                                        <?php /*foreach ($num_work as $key => $item) { ?>
                            <div class="check-style">
                                <input type="checkbox" id="mun_in<?= $key ?>" name="mun_in"
                                       value="<?= $key ?>">
                                <label for="mun_in<?= $key ?>" class=""><?= $item ?> </label>
                            </div>
                        <?php }*/ ?>

                                    </div>
                                    <div class="form-group col-sm-3  col-md-2 padding-4 ">
                                        <label class="label">عدد العاملين من خارج الاسرة </label>
                                        <input type="number" name="num_out" value="" data-validation="number"
                                               class="form-control ">

                                        <?php /* foreach ($num_work as $key => $item) { ?>
                            <div class="check-style">
                                <input type="checkbox" id="num_out<?= $key ?>" name="num_out"
                                       value="<?= $key ?>">
                                <label for="num_out<?= $key ?>" class=""><?= $item ?> </label>
                            </div>
                        <?php } */ ?>

                                    </div>
                                    <div class="form-group col-sm-3  col-md-3 padding-4 ">
                                        <label class="label">هل لديكم الرغبة في تطوير المشروع من خلال التدريب </label>
                                        <div class="check-style">
                                            <input type="checkbox" id="need_tranning1" name="need_tranning"
                                                   data-validation="checkbox_group" data-validation-qty="1-1"
                                                   onclick="$('#tranning_ids').show();//$('#tranning_ids select').attr('data-validation', 'required');"
                                                   value="yes">
                                            <label for="need_tranning1" class="">نعم </label>
                                        </div>

                                        <div class="check-style">
                                            <input type="checkbox" id="need_tranning2" name="need_tranning"
                                                   data-validation="checkbox_group" data-validation-qty="1-1"
                                                   onclick="$('#tranning_ids').hide();$('#tranning_ids select').val('');$('.selectpicker').selectpicker('refresh'); //$('#tranning_ids select').removeAttr('data-validation');"
                                                   value="no">
                                            <label for="need_tranning2" class="">لا </label>
                                        </div>

                                    </div>
                                    <div class=" form-group col-sm-3  col-md-2 padding-4 " id="tranning_ids"
                                         style="display: none">
                                        <label class="label  "> نوع التدريب </label>
                                        <select class="form-control selectpicker" data-show-subtext="true"
                                                data-live-search="true" data-validation-depends-on="need_tranning"
                                                data-validation-depends-on-value="yes"
                                                data-validation="required" name="tranning_ids[]" multiple>
                                            <?php foreach ($tranning_type as $key => $item) { ?>
                                                <option value="<?= $item['code'] ?>"><?= $item['title'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="clearfix"></div>

                                    <div class="col-xs-12 text-center" style="margin-top: 29px;">
                                        <div class="panel-footer">
                                            <div class="text-center">
                                                <a class="btnPrevious btn btn-labeled btn-warning"
                                                   style="font-size: 16px;"><span class="btn-label"><i
                                                                class="fa fa-chevron-right"></i></span>السابق </a>
                                                <button class="btnNext  btn btn-labeled btn-warning"
                                                        style="font-size: 16px;">
                                                    التالى
                                                    <span class="btn-label" style="right: auto;left: -14px;"><i
                                                                class="fa fa-chevron-left"></i></span></button>

                                                <button type="submit" class="btn btn-labeled btn-success" name="save"
                                                        value="save"
                                                        style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                                                   <span class="btn-label"><i
                                                               class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <?php echo form_close() ?>
                                </fieldset>
                                <!-- <div class="col-xs-12 text-center">
                                     <button type="submit" class="btn btn-labeled btn-success" name="save" value="save"
                                             id="myBtn">
                                         <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                     </button>
                                 </div>-->
                            </div>
                            <!-- user_data -->

                            <!-- user_data -->
                            <div role="tabpanel" class="tab-pane fade " id="user-data">
                                <fieldset>
                                    <legend> الحسابات الخاصة بالمستخدم</legend>
                                    <?php echo form_open_multipart('family_controllers/osr_ektfaa/Ektfaa_talab/edite/' . $one_data['id']); ?>

                                    <input type="hidden" name="page" value="4">
                                    <div class="form-group col-sm-4  col-md-4 padding-4 ">
                                        <label class="label"> فيس بوك</label>
                                        <input type="text" class="form-control" name="facebook"
                                               value="<?php if (isset($one_data['facebook']) && !empty($one_data['facebook'])) {
                                                   echo $one_data['facebook'];
                                               } ?>"
                                        />
                                    </div>
                                    <div class="form-group col-sm-4  col-md-4 padding-4 ">
                                        <label class="label"> تويتر </label>
                                        <input type="text" class="form-control" name="twitter"
                                               value="<?php if (isset($one_data['twitter']) && !empty($one_data['twitter'])) {
                                                   echo $one_data['twitter'];
                                               } ?>"
                                        />
                                    </div>
                                    <div class="form-group col-sm-4  col-md-4 padding-4 ">
                                        <label class="label"> سناب </label>
                                        <input type="text" class="form-control" name="snapchat"
                                               value="<?php if (isset($one_data['snapchat']) && !empty($one_data['snapchat'])) {
                                                   echo $one_data['snapchat'];
                                               } ?>"
                                        />
                                    </div>
                                    <div class="form-group col-sm-4  col-md-4 padding-4 ">
                                        <label class="label"> موقع </label>
                                        <input type="text" class="form-control" name="webpage"
                                               value="<?php if (isset($one_data['webpage']) && !empty($one_data['webpage'])) {
                                                   echo $one_data['webpage'];
                                               } ?>"
                                        />
                                    </div>
                                    <div class="form-group col-sm-4  col-md-4 padding-4 ">
                                        <label class="label"> انستجرام </label>
                                        <input type="text" class="form-control" name="instgram"
                                               value="<?php if (isset($one_data['instgram']) && !empty($one_data['instgram'])) {
                                                   echo $one_data['instgram'];
                                               } ?>"
                                        />
                                    </div>

                                    <div class="col-xs-12 text-center" style="margin-top: 29px;">
                                        <div class="panel-footer">
                                            <div class="text-center">
                                                <a class="btnPrevious btn btn-labeled btn-warning"
                                                   style="font-size: 16px;"><span class="btn-label"><i
                                                                class="fa fa-chevron-right"></i></span>السابق </a>
                                                <button class="btnNext  btn btn-labeled btn-warning"
                                                        style="font-size: 16px;">
                                                    التالى
                                                    <span class="btn-label" style="right: auto;left: -14px;"><i
                                                                class="fa fa-chevron-left"></i></span></button>

                                                <button type="submit" class="btn btn-labeled btn-success" name="save"
                                                        value="save"
                                                        style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                                                   <span class="btn-label"><i
                                                               class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <?php echo form_close() ?>
                                </fieldset>
                            </div>
                            <!-- user_data -->

                            <!-- attach_data -->

                            <!-- user_data -->
                            <div role="tabpanel" class="tab-pane fade " id="attach-data">
                                <fieldset>
                                    <legend> رفع المستندات</legend>
                                    <?php echo form_open_multipart('family_controllers/osr_ektfaa/Ektfaa_talab/edite/' . $one_data['id']); ?>

                                    <input type="hidden" name="page" value="5">

                                    <!-- form -->
                                    <div class="col-md-12 col-sm-12 padding-4">
                                        <?php
                                        $x = 1;
                                        $files = array('صورة الهوية الوطنية للمتقدم 	' => 'national_card_img',
                                            'صورة السجل التجاري او الترخيص 	' => 'sgel_img',
                                            'موقع النشاط في قوقل  	' => 'location_img',
                                            'أخرى  	' => 'other_img');
                                        foreach ($files as $key => $value) {
                                            ?>
                                            <div class="form-group col-md-4 col-sm-3 col-xs-12 padding-4 ">
                                                <label class="label "><?= $key ?> </label>
                                                <input type="file" id="<?= $value ?>" name="<?= $value ?>"
                                                       accept="image/*"
                                                       class="form-control">
                                                <?php if (isset($result) && $result[$value] != null) { ?>

                                                    <a data-toggle="modal"
                                                       data-target="#myModal-view_photo<?= $value ?>">
                                                        <i class="fa fa-eye" title=" قراءة"></i> </a>
                                                    <!-- modal view -->
                                                    <div class="modal fade" id="myModal-view_photo<?= $value ?>"
                                                         tabindex="-1"
                                                         role="dialog" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal"
                                                                            aria-label="Close"><span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                    <h4 class="modal-title" id="myModalLabel">
                                                                        الصوره</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <img src="<?= base_url() . 'uploads/family_attached/osr_ektfaa_mostndat' . '/' . $result[$value] ?>"
                                                                         width="100%" alt="">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default"
                                                                            data-dismiss="modal">
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
                                    <!--  -->   <!-- form -->


                                    <div class="col-xs-12 ">


                                        <div class="col-md-12 col-sm-4  ">

                                            <input type="hidden" id="hidden_id" name="hidden_id"
                                                   value="<?= $one_data['id'] ?>">
                                            <input type="hidden" id="hidden_rkm" name="hidden_rkm"
                                                   value="<?= $one_data['id'] ?>">


                                            <div class="col-md-4 col-sm-4 padding-4">
                                                <label class="label"> صور المشروع</label>
                                                <input type="file" name="file[]" id="file" class="form-control"
                                                       accept="image/*"
                                                       data-validation="reuqired">
                                            </div>
                                            <!-- <button type="button" class="btn btn-success save"  style="padding: 6px 12px;"
                            onclick="upload_img(<?= $rkm; ?>)"
                             >حفظ
                    </button> -->
                                            <div class="col-xs-2 text-center" style="margin-top: 29px;">

                                                <button type="button"
                                                        class="btn btn-labeled btn-success "
                                                        onclick="upload_img(<?= $one_data['id']; ?>)"
                                                        style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                                                    <span class="btn-label"><i
                                                                class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                                </button>

                                            </div>
                                            <br>
                                            <br>

                                            <div id="result_files">
                                                <br/>
                                                <?php
                                                if (isset($one_dataa) && !empty($one_dataa)) {
                                                    $x = 1;
                                                    $image = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP');


                                                    $folder = 'uploads/family_attached/osr_ektfaa_mostndat';

                                                    ?>
                                                    <table id="example"
                                                           class="table  table-bordered table-striped table-hover">
                                                        <thead>
                                                        <tr class="greentd">
                                                            <th>م</th>

                                                            <th> الملف</th>


                                                            <th>الاجراء</th>

                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                        foreach ($one_dataa as $morfaq) {
                                                            $ext = pathinfo($morfaq->file, PATHINFO_EXTENSION);
                                                            //  $Destination = 'uploads/archive/deals/1bec9894697603bd9a45630d73230be5.jpg';

                                                            $Destination = $folder . '/' . $morfaq->file;

                                                            ?>
                                                            <tr>
                                                                <td><?= $x++ ?></td>


                                                                <td>


                                                                    <!--  -->
                                                                    <?php
                                                                    if (in_array($ext, $image)) {
                                                                        ?>
                                                                        <?php if (!empty($morfaq->file)) {
                                                                            $url = base_url() . $folder . '/' . $morfaq->file;
                                                                        } else {
                                                                            $url = base_url('asisst/fav/apple-icon-120x120.png');
                                                                        } ?>

                                                                        <a target="_blank"
                                                                           onclick="show_img('<?= $url ?>')">
                                                                            <i class=" fa fa-eye"></i>
                                                                        </a>


                                                                        <?php
                                                                    } else {
                                                                        echo 'لا يوجد';
                                                                    }
                                                                    ?>
                                                                    <!--  -->
                                                                </td>


                                                                <td>

                                                                    <i class="fa fa-trash" style="cursor: pointer"
                                                                       onclick="delete_morfq(<?= $morfaq->id ?>,<?= $morfaq->talb_id_fk ?>)"></i>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        ?>
                                                        </tbody>
                                                    </table>
                                                    <?php
                                                }
                                                ?>
                                            </div>


                                        </div>


                                        <div class="col-xs-12 text-center" style="margin-top: 29px;">
                                            <div class="panel-footer">
                                                <div class="text-center">
                                                    <a class="btnPrevious btn btn-labeled btn-warning"
                                                       style="font-size: 16px;"><span class="btn-label"><i
                                                                    class="fa fa-chevron-right"></i></span>السابق </a>
                                                    <button type="submit" class="btn btn-labeled btn-success"
                                                            name="save"
                                                            value="save"
                                                            style="background-color: #3c990b;border-color: #12891b;padding-top: 0;padding-bottom: 0;border-radius:2px; ">
                                            <span class="btn-label"><i
                                                        class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <?php echo form_close() ?>
                                </fieldset>
                            </div>
                            <!-- attach_data -->


                            <!-- user_data -->
                        </div>
                    </div>
                    <!-- <div class="col-xs-12 text-center">
                         <button type="submit" class="btn btn-labeled btn-success" name="save" value="save" id="myBtn">
                             <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                         </button>
                     </div>-->
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


            var type = $('#mokadem_talb [value="' + value + '"]').data('type');
            var id = $('#mokadem_talb [value="' + value + '"]').data('id');
            /*var type = $('#mokadem_talb option').filter(function() {
                return this.value == value;
            }).data('type');
            var id = $('#mokadem_talb option').filter(function() {
                return this.value == value;
            }).data('id');*/
            /* var type= $("#mokadem_talb_input option").find(':selected').data('type');
             var id= $("#mokadem_talb_input option").find(':selected').data('id');*/
            var file_num = $('#file_num').val();
            if (file_num != 0 && file_num != '' ) {
                $.ajax({
                    type: 'post',
                    url: '<?php echo base_url() ?>family_controllers/osr_ektfaa/Ektfaa_talab/getDetails',
                    data: {type:type,id:id,file_num:file_num},
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

        function get_select_data(value) {
            $('#file_num').val(value);
            $('#myModal').modal('hide');
            var file_num = $('#file_num').val();
            if (file_num != 0 && file_num != '') {
                $.ajax({
                    type: 'post',
                    url: '<?php echo base_url() ?>family_controllers/osr_ektfaa/Ektfaa_talab/get_member',
                    data: {file_num: file_num},
                    dataType: 'html',
                    cache: false,
                    success: function (resp) {
                        var member_data = JSON.parse(resp).member_data;
                        var str = ''; // variable to store the options
                        if (member_data.length > 0) {
                            str += '<option data-type="1" data-id="' + member_data[0].mother_id + '" value="' + member_data[0].mother_name + '" />'; // Storing options in variable

                            for (var i = 1; i < member_data.length; ++i) {
                                str += '<option data-type="2"  data-id="' + member_data[i].member_id + '" value="' + member_data[i].member_name + '" />'; // Storing options in variable
                            }
                            var my_list = document.getElementById("mokadem_talb");
                            my_list.innerHTML = str;
                        }
                    }
                });
            }
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            $('input[name=have_debt][value=<?=$one_data['have_debt']?>]').prop('checked', true);
            $('input[name=have_other_debt][value=<?=$one_data['have_other_debt']?>]').prop('checked', true);
            $('input[name=have_lincense][value=<?=$one_data['have_lincense']?>]').prop('checked', true);
            $('input[name=have_tamwil][value=<?=$one_data['have_tamwil']?>]').prop('checked', true);
            $('input[name=project_profit][value=<?=$one_data['project_profit']?>]').prop('checked', true);
            $('input[name=need_tranning][value=<?=$one_data['need_tranning']?>]').prop('checked', true);

            $('input[name=file_num]').val('<?=$one_data['file_num']?>');
            $('input[name=debt]').val('<?=$one_data['debt']?>');
            $('input[name=debt_name]').val('<?=$one_data['debt_name']?>');
            $('input[name=other_debt_name]').val('<?=$one_data['other_debt_name']?>');
            $('input[name=lincense_project]').val('<?=$one_data['lincense_project']?>');
            $('input[name=project_describ]').val('<?=$one_data['project_describ']?>');
            $('input[name=tamwil_num]').val(<?=$one_data['tamwil_num']?>);
            $('input[name=profit_num]').val(<?=$one_data['profit_num']?>);
            $('input[name=mun_in]').val(<?=$one_data['mun_in']?>);
            $('input[name=num_out]').val(<?=$one_data['num_out']?>);

            $('#type_project').val('<?=$one_data['type_project']?>');
            $('#project_states').val('<?=$one_data['project_states']?>');
            $('#mokadem_talb_input').val('<?=$one_data['mokadem_talb']?>');


            <?php $tranning_ids = unserialize($one_data['tranning_ids']);
            //            print_r($tranning_ids);
            if (!empty($tranning_ids) && is_array($tranning_ids)){
            foreach ($tranning_ids as $item){
            ?>
            $("#tranning_ids option[value='<?=$item?>']").prop("selected", true);
            <?php }  }?>


            $('.selectpicker').selectpicker("refresh");
            get_select_data(<?=$one_data['file_num']?>);


        });
        //fire event on radio button

    </script>
    <?php
} ?>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
        setTimeout(function () {
            $('input[type=checkbox]:checked').trigger('click');
        }, 300);


        // Add validator
        $.formUtils.addValidator({
            name: 'check_show',
            validatorFunction: function (value, $el, config, language, $form) {
                if (value === 'yes') {
                    $('#' + $el.data('div_id')).show();
                } else {
                    $('#' + $el.data('div_id')).hide();

                }
            },
            errorMessage: '',
            errorMessageKey: ''
        });

        // Initiate form validation
        $.validate();

        $('input[type=checkbox]').click(function () {
            var input_name = $(this).attr('name');

            $('input[name=' + input_name + ']').prop('checked', false);

            $(this).prop('checked', true);
        });

        $('.btnNext').click(function (e) {
            var isValid = $(e.target).parents('form').isValid();
            if (!isValid) {
                e.preventDefault(); //prevent the default action
            }
            if (isValid) {
                $('#nav-tabs  > .active').next('li').find('a').trigger('click');
                return false;
            }
        });
        $('.btnPrevious').click(function () {
            $('#nav-tabs > .active').prev('li').find('a').trigger('click');
        });
    });
</script>
<!-- yara -->

</script>

<script>

    function show_img(src) {

        var WinPrint = window.open('', '', 'width=800,height=700,toolbar=0,scrollbars=0,status=0');
        WinPrint.document.write('<img src="' + src + '" style="width: 100%; height:  100%;">');
        WinPrint.document.close();
        WinPrint.focus();
    }
</script>


<script>

    function upload_img(row) {


        var files = $('#file')[0].files;

        //var row = $('#row').val();

        if (files.length == 0) {

            swal({
                title: " برجاء ادخال  المرفق ! ",
                type: "warning",
                confirmButtonClass: "btn-warning",
                closeOnConfirm: false
            });

        } else {
            var error = '';
            var form_data = new FormData();
            for (var count = 0; count < files.length; count++) {
                var name = files[count].name;


                var extension = name.split('.').pop().toLowerCase();
                if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg', 'png', 'pdf', 'PNG', 'PDF', 'xls', 'doc', 'docx', 'txt', 'rar']) == -1) {
                    error += "Invalid " + count + " Image File"
                } else {
                    form_data.append("files[]", files[count]);

                    form_data.append("row", row);
                }
            }
            if (error == '') {


                $.ajax({
                    url: "<?php echo base_url(); ?>family_controllers/osr_ektfaa/Ektfaa_talab/add_morfaq", //base_url() return http://localhost/tutorial/codeigniter/
                    method: "POST",
                    data: form_data,

                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function () {

                    },
                    success: function (data) {
                        // alert(data);

                        //$('#images').show();
                        put_value(row);

                        $('#file').val('');
                        swal("تم الحفظ بنجاح !");


                        //  get_details(row);

                    }
                });


            }

        }
    }


</script>
<script>


    function delete_morfq(id, row) {
        //  confirm('?? ??? ????? ?? ????? ????? ?');
        var r = confirm('هل تريد حذف المرفق?');
        if (r == true) {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>family_controllers/osr_ektfaa/Ektfaa_talab/Delete_attach',
                data: {id: id},
                dataType: 'html',
                cache: false,
                success: function (html) {
                    //   alert(html);

                    // $('#Modal_esdar').modal('hide');
                    put_value(row);
                    swal({
                            title: "تم الحذف بنجاح!",


                        }
                    );
                    console.log(row);
                    //get_details(row);

                }
            });
        }

    }
</script>
<script>
    function put_value(rkm) {

        //     $('#hidden_rkm').val(rkm);
        $.ajax({
            type: 'post',
            data: {rkm: rkm},
            url: "<?php echo base_url();?>family_controllers/osr_ektfaa/Ektfaa_talab/get_attaches",


            success: function (html) {
                $("#result_files").html(html);
            }

        });
    }
</script>

<script>


    $('#example88').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'pageLength',
            'copy',
            'csv',
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
        colReorder: true
    });


</script>