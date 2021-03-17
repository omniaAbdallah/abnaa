    <form method="post" action="<?php echo base_url(); ?>family_controllers/Family/add_required_files/<?php echo $record->mother_national_num; ?>">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">الملفات المطلوبة</h5>
            </div>
            <div class="modal-body">
                <div class="piece-box no-border ">
                    <!--<div class="piece-heading">
                                            <div class="col-xs-4">
                                                <h5 class="no-margin">رقم الطلب : <?php echo $record->id; ?></h5>
                                            </div>
                                            <div class="col-xs-5 ">
                                            </div>
                                            <div class="col-xs-3">
                                                <h5 class="no-margin">التاريخ : <?= date('Y-m-d') ?></h5>
                                            </div>
                                        </div>
                                    </div>-->
                    <table id=""
                           class="table table-striped table-bordered no-margin">
                        <thead>
                        <tr>
                            <th class="piece-heading">بيانات الاسرة</th>
                            <th>رقم الطلب
                                : <?php echo $record->id; ?></th>
                            <th colspan="2">التاريخ
                                : <?= date('Y-m-d') ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>اسم الاسرة
                                / <?php echo $record->father_name; ?></td>
                            <td>السجل المدني
                                / <?php echo $mother_num; ?></td>
                            <td> المدينة
                                / <?php echo $record->madina; ?> </td>
                            <td> الحي / <?php echo $record->hai; ?></td>
                        </tr>
                        </tbody>
                    </table>
                    <?php if (isset($main_attach_files) && !empty($main_attach_files)) { ?>
                        <table id=""
                               class="table table-striped table-bordered dt-responsive nowrap table-pd"
                               cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <td><input class="check_all_not"
                                           id="check_all_not<?php echo $mother_num; ?>"
                                           type="checkbox"
                                           onclick="check_all(<?php echo $mother_num; ?>);"><label
                                        class="checktitle">
                                        تحديدالكل </label>
                                </td>
                                <td>نوع الطلب</td>
                                <td>حالة الطلب</td>
                                <td>ملاحظات</td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $status = array('غير محدد', 'تحت الطلب', 'تم التسلم');
                            $y = 1;
                            foreach ($main_attach_files as $file_row) {
                                ?>
                                <tr>
                                    <td>
                                        <input class="check_large2 check_large<?php echo $mother_num; ?> check_large2"
                                               type="checkbox"
                                            <?php
                                            if (isset($record->required_files[$file_row->id_setting]) && !empty($record->required_files[$file_row->id_setting])) {
                                                if ($record->required_files[$file_row->id_setting]->doc_id_fk == $file_row->id_setting) {
                                                    echo 'checked';
                                                }
                                            }
                                            ?>
                                               name="doc_id_fk[]"
                                               value="<?= $file_row->id_setting ?>"/>
                                    </td>
                                    <td><?= $file_row->title_setting ?></td>
                                    <td>
                                        <select name="doc_status_fk[]"
                                                class=" no-padding form-control"
                                                aria-required="true">
                                            <option value="">اختر
                                            </option>
                                            <?php foreach ($status as $key => $value) { ?>
                                                <option value="<?= $key ?>"
                                                    <?php
                                                    if (isset($record->required_files[$file_row->id_setting]) && !empty($record->required_files[$file_row->id_setting])) {
                                                        if ($record->required_files[$file_row->id_setting]->doc_status_fk == $key) {
                                                            echo 'selected';
                                                        }
                                                    }
                                                    ?>
                                                ><?= $value ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" value="<?php
                                        if (isset($record->required_files[$file_row->id_setting]) && !empty($record->required_files[$file_row->id_setting])) {
                                            echo $record->required_files[$file_row->id_setting]->doc_notes;
                                        }
                                        ?>" name="doc_notes[]"
                                               class="form-control half"/>
                                    </td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td colspan="2"
                                    style="background-color: #428bca; color: white;text-align: center;">
                                    جوال التواصل ( الجمعية)
                                </td>
                                <td colspan="2">
                                    <input type="text" maxlength="10"
                                           name="society_mob"
                                           value="<?php if ($record->society_mob) {
                                               echo $record->society_mob;
                                           } ?>"
                                           onkeypress="validate_number(event);"
                                           onkeyup="check_length_num(this,10,'span_society_mob');"
                                           class="form-control half"
                                           placeholder="أدخل البيانات"
                                           required="required">
                                    <span id="span_society_mob"
                                          style="color: red;"></span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    <?php } ?>
                </div>
                <div class="modal-footer">
                    <button
                        type="button" onclick="print_prime_houe(<?= $mother_num ?>);"
                        class="btn btn-labeled btn-purple pull-left ">
                        <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعة كروكي
                        المنزل
                    </button>
                    
                      <button
                        type="button" onclick="printRequiredFiles_new(<?= $mother_num ?>);"
                        class="btn btn-labeled btn-purple pull-left ">
                        <span class="btn-label"><i class="glyphicon glyphicon-print"></i></span>طباعة النموذج
                        المنزل
                    </button>
                    
                    
                
                    
                    <button type="submit" name="go_submit" value="go_submit"
                            class="btn btn-labeled btn-warning">
                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-saved"></i></span>
                        حفظ
                    </button>
                    <button type="button" class="btn btn-labeled btn-danger" data-dismiss="modal">
                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-remove"></i></span>
                        إغلاق التفاصيل
                    </button>
                </div>
            </div>
        </div>
    </form>

