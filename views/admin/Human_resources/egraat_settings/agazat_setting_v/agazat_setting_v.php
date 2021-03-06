<style>
    .vertical-tabs .panel-footer {
        background-color: #e6e6e6;
        border-top: 1px solid #e1e6ef;
        display: inline-block;
        width: 100%;
        padding: 5px 10px;
    }

    .upChevron {
        display: none;
        /* position: absolute; */
        top: 0px;
        left: 0px;
        z-index: 1;
        font-size: 16px;
        cursor: pointer;
        background-color: #09704e;
        padding: 0px 9px;
        color: #fff;
        border-bottom-left-radius: 26px;
        border-bottom-right-radius: 26px;
        /* box-shadow: 0px 5px 0px #005237; */
        box-shadow: -1px 6px 8px #d48a00;
    }
</style>
<div class="col-xs-12 ">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
        <div class="panel-heading">
            <h3 class="panel-title"> <?= $title ?> </h3>
        </div>
        <div class="panel-body">
            <div class="col-md-12 col-sm-6 col-xs-12 padding-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5 class="panel-title">إعدادت سياسات الاجازات
                        </h5>
                    </div>
                    <div class="panel-body" style=" overflow: hidden;">
                        <!--  -->
                        <?php $url = base_url() . "human_resources/egraat_settings/Agazat_setting";
                        echo form_open_multipart($url, array('id' => 'form1')) ?>
                        <table class="table">
                            <tbody>
                            <tr>
                                <th colspan="2" scope="row"> الأجازة السنوية العادية لا تقل عن </th>
                                <td colspan="2"><input id="result1" name="min_nums_in_year"
                                           value="<?php if (isset($table->min_nums_in_year) && !empty($table->min_nums_in_year)) {
                                               echo $table->min_nums_in_year;
                                           } ?> " data-validation="required" class="form-control text-center  result" value=""></td>
                                <th scope="row">يوم</th>
                            </tr>
                            <tr>
                                <th colspan="2" scope="row"> عدد ايام الاجازة الطارئة المسموح به من رصيد الأجازة السنوية</th>
                                <td colspan="2"><input id="result1" name="emergency_nums_in_year"
                                           value="<?php if (isset($table->emergency_nums_in_year) && !empty($table->emergency_nums_in_year)) {
                                               echo $table->emergency_nums_in_year;
                                           } ?> " data-validation="required" class="form-control text-center  result" value=""></td>
                                <th scope="row">يوم</th>
                            </tr>
                            <tr>
                                <th >إذا كانت الاجازة السنويه (عادية) أكبر من </th>
                                <td><input id="result1" name="max_nums_in_year"
                                           value="<?php if (isset($table->max_nums_in_year) && !empty($table->max_nums_in_year)) {
                                               echo $table->max_nums_in_year;
                                           } ?>" data-validation="required" class="form-control text-center  result"
                                           value=""></td>
                                <th >يوم</th>
                                <th >يقدم الموظف طلب الاجازة قبل</th>
                                <td><input id="result1" name="moda_takdem_talb"
                                           value="<?php if (isset($table->moda_takdem_talb) && !empty($table->moda_takdem_talb)) {
                                               echo $table->moda_takdem_talb;
                                           } ?>" data-validation="required" class="form-control text-center  result"
                                           value=""></td>
                                <th > يوم</th>
                            </tr>
                            <tr>
                                <th >إذا كانت الاجازة السنوية (عادية) أقل من  </th>
                                <td><input id="result1" name="min_nums_in_talb"
                                           value="<?php if (isset($table->min_nums_in_talb) && !empty($table->min_nums_in_talb)) {
                                               echo $table->min_nums_in_talb;
                                           } ?>" data-validation="required" class="form-control text-center  result"
                                           value=""></td>
                                <th >يوم</th>
                                <th >يقدم الموظف طلب الاجازة قبل</th>
                                <td><input id="result1" name="moda_takdem_talb_min"
                                           value="<?php if (isset($table->moda_takdem_talb_min) && !empty($table->moda_takdem_talb_min)) {
                                               echo $table->moda_takdem_talb_min;
                                           } ?>" data-validation="required" class="form-control text-center  result"
                                           value=""></td>
                                <th > يوم</th>
                            </tr>
                            <tr>
                                <th colspan="3" scope="row">هل يمكن قبول تقديم علي الاجازة بدون راتب في حالة وجود رصيد كافي للموظف
                                    من الاجازة السنوية
                                </th>
                                <td>

                                    <select type="text" name="is_avlible_no_sallary_agaza"
                                            id="is_avlible_no_sallary_agaza" data-validation="required"
                                            class="form-control  ">
                                        <option value="">-اختر-</option>
                                        <?php
                                        $arr = array('1' => 'نعم', '2' => 'لا');
                                        foreach ($arr as $key => $value) {
                                            ?>

                                            <option value="<?= $key ?>"
                                                <?php
                                                if (isset($table->is_avlible_no_sallary_agaza) && !empty($table->is_avlible_no_sallary_agaza)) {
                                                    if ($table->is_avlible_no_sallary_agaza == $key) {
                                                        echo 'selected';
                                                    }
                                                }
                                                ?>
                                            ><?= $value ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>


                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <!--  -->
                    </div>
                    <div class="panel-footer" style="background-color: #eeeeee;
    height: 50px;" id="myTabs">
                        <button name="add" value="حفظ" type="submit" class="btn btn-labeled btn-success "
                                style="float: left"><span class="btn-label">
                            <i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                        </button>
                    </div>
                </div>
            </div>
            <!--  -->
            <!--  -->
            <!--  -->
        </div>
    </div>
</div>
