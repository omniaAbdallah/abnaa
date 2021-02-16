<style>
    label.label-green {
        height: auto;
        line-height: unset;
        font-size: 14px !important;
        font-weight: 600 !important;
        text-align: right !important;
        margin-bottom: 0;
        background-color: transparent;
        color: #002542;
        border: none;
        padding-bottom: 0;
        font-weight: bold;
    }
    .half {
        width: 100% !important;
        float: right !important;
    }
    .input-style {
        border-radius: 0px;
        border-right: 1px solid #eee;
    }
    .header_h5 {
        text-align: center;
        background-color: #5f9007;
        padding: 10px;
        color: #fff;
    }
    .nav-tabs > li > a {
        /*  color: #222 !important;*/
        font-weight: 500 !important;
        border: 1px solid black !important;
        background: #e4e4e4;
    }

</style>
<?php if($_SESSION['hidden_action']){ ?>
    <style>
        input,select {
            pointer-events:none;
            color:#AAA;
            background:#F5F5F5;
        }

    </style>
<?php } ?>

<!--<div class="panel panel-bd lobidisable lobipanel lobipanel-sortable " id="load_files">-->
<div class="col-sm-12 col-md-12 col-xs-12 fadeInUp wow" id="load_files">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">
                <h4><?= $title ?></h4>
            </div>
        </div>
        <div class="panel-body">
            <!-------------------------------------------------->
            <?php
            $image_type = array('gif', 'Gif', 'ico', 'ICO', 'jpg', 'JPG', 'jpeg', 'JPEG', 'BNG', 'png', 'PNG', 'bmp', 'BMP');
            $files_type = array('pdf', 'PDF', 'xls', 'xlsx', ',doc', 'docx', 'txt'); ?>
            <div class="col-md-12">
                <div class="col-xs-12 col-sm-12 col-md-12 m-b-20">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab1" data-toggle="tab">
                                <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                وثائق اساسية</a></li>
                        <li><a href="#tab2" data-toggle="tab">
                                <i class="fa fa-files-o" aria-hidden="true"></i> وثائق اخري</a></li>
                    </ul>
                    <!-- Tab panels -->
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1">
                            <div class="panel-body"><br>
                                <h5 class="header_h5">وثائق اساسية</h5>
                                <input type="hidden" id="count_row" value="0"/>
                                <table class="table table-bordered" style="table-layout: fixed;">
                                    <thead>
                                    <tr class="greentd">
                                        <th style="text-align: center; width: 71px;">م</th>
                                        <th style="text-align: center; ">تصنيف</th>
                                        <th style="text-align: center;  width: 40%;">المرفق</th>
                                        <th style="text-align: center; width: 100px;">الإجراء</th>
                                    </tr>
                                    </thead>
                                    <tbody id="result_Table">
                                    <?php $x = 1;
                                    if (isset($data_table) && !empty($data_table)) {
                                        foreach ($data_table as $row) { ?>
                                            <tr class="text-center">
                                            <td rowspan="<?php echo sizeof($row->sub); ?>"><?php echo $x++ ?></td>
                                            <td rowspan="<?php echo sizeof($row->sub); ?>"><?php echo $row->title_setting; ?> </td>
                                            <?php if (!empty($row->sub)) {
                                                foreach ($row->sub as $row_sub) {
                                                    $filename = $row_sub->file_attach_name;
                                                    $ext = pathinfo($filename, PATHINFO_EXTENSION); ?>
                                                    <td class="text-center">
                                                        <a href="<?php echo base_url() . 'osr/Family/downloads_new/' . $row_sub->file_attach_name ?>"
                                                           download>
                                                            <i class="fa fa-download" title="تحميل"></i>
                                                        </a>
                                                        <?php
                                                        if (in_array($ext, $image_type)) { ?>
                                                            <!-- <a data-toggle="modal"
               data-target="#myModal-view-<?= $row_sub->id ?>">
                <i class="fa fa-eye" title=" قراءة"></i>
            </a>-->
                                                        <?php } elseif (in_array($ext, $files_type)) { ?>
                                                            <!-- <a href="<?php echo base_url() . 'osar/Family/read_attached_file/' . $row_sub->file_attach_name ?>"
               target="_blank">
                <i class="fa fa-eye" title=" قراءة"></i>
            </a>-->
                                                        <?php } ?>
                                                    </td>
                                                    <td class="text-center">
                                                    </td>
                                                    </tr>
                                                    <div class="modal fade" id="myModal-view-<?= $row_sub->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal"
                                                                            aria-label="Close"><span
                                                                                aria-hidden="true">&times;</span>
                                                                    </button>
                                                                    <h4 class="modal-title"
                                                                        id="myModalLabel">الصورة</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <img src="<?= base_url() . "uploads/family_attached/" . $row_sub->file_attach_name ?>"
                                                                         width="100%">
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
                                                <?php } // end sub foreach
                                            } else { ?>
                                                <td>--</td>
                                                <td>--
                                                </td></tr>                                        <?php } // end else
                                        } // end main  foreach  ?>
                                    <?php } else { // end main if ?>
                                        <tr id="frist_one">
                                            <td colspan="4" style="text-align: center;color: red"> لا يوجد
                                                مرفقات
                                            </td>
                                        </tr>
                                    <?php } // end main if ?>
                                    </tbody>
                                    <?php echo form_open_multipart('registration/Family/attach_files', array('id' => 'attach_form', 'class' => 'attach_form')); ?>
                                    <?php if(!$_SESSION['hidden_action']){ ?>
                                    <tr>
                                        <td rowspan="<?php //echo sizeof($row->sub); ?>"><?php //echo $x++ ?></td>
                                        <td><select name="file_attach_id_fk[]" class="form-control"
                                                    data-validation="required" aria-required="true"
                                                    tabindex="-1" aria-hidden="true">
                                                <option value="">إختر</option>
                                                <?php if (isset($type_attach_file) && !empty($type_attach_file)) {
                                                    foreach ($type_attach_file as $row) { ?>
                                                        <option value="<?php echo $row->id_setting ?>"><?php echo $row->title_setting ?></option>
                                                    <?php } ?>
                                                <?php } else {
                                                    echo '<option value=""> لا يوجد تصنيفات </option>';
                                                } ?>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="file" name="file_attach_name[]" id="file_attach_name"
                                                   class="form-control half"/></td>
                                        <td>
                                            <input type="hidden" name="add" value="ADD">
                                            <button style="float: left;" type="button" id="submit_t"
                                                    onclick="save_attatch('file_attach_name','tab1')"
                                                    class="btn btn-labeled btn-success " name="ADD"
                                                    value="حفظ">
                                            <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i>
                                            </span>حفظ
                                            </button>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    <tfoot>
                                    <tr>
                                        <td colspan="4" id="save_button">
                                        </td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <?php echo form_close() ?>
                        <div class="tab-pane fade" id="tab2">
                            <div class="panel-body"><br>
                                <h5 class="header_h5">وثائق اخري </h5>
                                <input type="hidden" id="count_row_other" value="0"/>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr class="greentd">
                                        <th style="text-align: center;width: 71px;">م</th>
                                        <th style="text-align: center">اسم المرفق</th>
                                        <th style="text-align: center;width: 40%;">المرفق</th>
                                        <th style="text-align: center;width: 100px;">الإجراء</th>
                                    </tr>
                                    </thead>
                                    <tbody id="result_Table_other">
                                    <?php
                                    $x = 1;
                                    if (isset($data_table_other) && !empty($data_table_other)) {
                                        foreach ($data_table_other as $row_other) {
                                            $filename = $row_other->file_attach_name;
                                            $ext = pathinfo($filename, PATHINFO_EXTENSION); ?>
                                            <tr class="text-center">
                                                <td><?php echo $x++ ?></td>
                                                <td><?php echo $row_other->file_attach_id_fk; ?> </td>
                                                <td>
                                                    <a href="<?php echo base_url() . 'osr/Family/downloads_new/' . $row_other->file_attach_name ?>"
                                                       download>
                                                        <i class="fa fa-download" title="تحميل"></i> </a>
                                                    <?php
                                                    /*
                                               if (in_array($ext, $image_type)) {
                                                  
                                                   ?>
                                                  <a data-toggle="modal"
                                                      data-target="#myModal-view-other-<?= $row_other->id ?>">
                                                       <i class="fa fa-eye" title=" قراءة"></i>
                                                   </a>      
                                                       <?php } elseif (in_array($ext, $files_type)) { ?>
                                                  
                                                   <a href="<?php echo base_url() . 'registration/Family/read_attached_file/' . $row_other->file_attach_name ?>"
                                                      target="_blank">
                                                       <i class="fa fa-eye" title=" قراءة"></i>
                                                   </a>
                                                   
                                                    <?php } 
                                                    */
                                                    ?>
                                                </td>
                                                <td>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="myModal-view-other-<?= $row_other->id ?>"
                                                 tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            <h4 class="modal-title" id="myModalLabel">
                                                                الصورة</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <img src="<?= base_url() . "uploads/family_attached/" . $row_other->file_attach_name ?>"
                                                                 width="100%">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default"
                                                                    data-dismiss="modal">إغلاق
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } // end sub foreach
                                    } else { // end main if ?>
                                        <tr id="sacend_one">
                                            <td colspan="4" style="text-align: center;color: red"> لا يوجد
                                                مرفقات
                                            </td>
                                        </tr>
                                    <?php } // end main if ?>                                </tbody>
                                    <tr>
                                        <?php echo form_open_multipart('registration/Family/attach_files', array('id' => 'attach_form', 'class' => 'attach_form')); ?>
                                    <tr>
                                        <td><?php echo $x++ ?></td>
                                        <td>
                                            <input type="text" name="file_name_other[]"
                                                   class="form-control half" data-validation="required"/>
                                        </td>
                                        <td>
                                            <input type="file" name="file_attach_name_other[]"
                                                   id="file_attach_name_other"
                                                   class="form-control half"/></td>
                                        <td>
                                            <input type="hidden" name="add" value="ADDOther">
                                            <button style="float: left;margin-left: 50px" type="button"
                                                    onclick="save_attatch('file_attach_name_other','tab2')"
                                                    id="submit_other" class="btn btn-labeled btn-success "
                                                    name="ADDOther" value="حفظ">
<span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i>
</span>حفظ
                                            </button>
                                        </td>
                                    </tr>
                                    <tfoot>
                                    <tr>
                                        <td colspan="4" id="save_button_other">
                                        </td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo form_close() ?>
            <!-------------------------------------------------->
        </div>

    </div>
