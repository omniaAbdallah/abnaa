<style>
    .top-label {
        font-size: 13px;
    }
    .form-control {
        padding: 6px 0px;
    }
    .inner-heading-green {
        background-color: #5eab5e;
        padding: 10px;
        color: #fff;
    }
    .inner-heading-red {
        background-color: #c73e45;
        padding: 10px;
        color: #fff;
    }
    .no-padding {
        padding-left: 0px;
        padding-right: 0px;
    }
    table tr.green_background th,
    table tr.green_background td {
        background-color: #5eab5e;
        color: #fff;
        text-shadow: none;
        font-weight: 500;
    }
    table tr.red_background th,
    table tr.red_background td {
        background-color: #c73e45;
        padding: 10px;
        color: #fff;
        text-shadow: none;
        font-weight: 500;
    }
    table tr th,
    table tr td,
    table thead td,
    table thead th,
    table tfoot th,
    table tfoot td {
        padding: 3px 5px !important;
    }
    .orangetd td, .orangetd th {
        color: #000;
    }
    .plus-btn {
        padding: 6px 5px 5px 5px;
        background-color: green;
        color: #fff;
        border-radius: 50%;
    }
    .plus-btn:hover {
        color: #fff;
        border-radius: 0;
    }
    .bootstrap-select > .btn {
        width: 100%;
        padding-right: 8px;
    }
    a.details {
        padding: 4px;
        background-color: blue;
        color: #fff;
        cursor: pointer;
    }
    .modal-header {
        padding: 6px 5px;
    }
    .modal-header h4 {
        color: #00310d;
    }
    .modal-header p {
        color: #555;
        margin-bottom: 0
    }
    .modal-body p {
        color: #555;
        font-size: 16px
    }
    .modal-body p span {
        color: #00310d;
        font-weight: 600
    }
    .tb-table tbody th, .tb-table tbody td,
    .tb-table tfoot td, .tb-table tfoot th {
        padding: 0px !important;
        text-align: center;
    }
    td input[type=radio] {
        height: 20px;
        width: 20px;
    }
</style>
<?php
$salary_types = array(1 => 'راتب أساسي', 2 => 'راتب مقطوع');
$disabled = '';
?>
<?php 
  $this->load->view('admin/maham_mowazf_view/basic_data/nav_links'); 
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $title ?> </h3>
        <!-- <div class="pull-left">
            <?php $data_load["emp_code"] = $personal_data[0]->emp_code;
            $data_load["id"] = $this->uri->segment(4);
            $this->load->view('admin/Human_resources/drop_down_menu', $data_load); ?>
        </div> -->
    </div>
    <div class="panel-body">
    <div class="col-xs-12 no-padding">
                   <div class="col-sm-12 col-xs-12">
                        <table class="table  table-striped table-bordered dt-responsive nowrap">
                            <tbody>
                            <tr>
                            <th style="width: 110px">كود الموظف </th>
                                <td>
               
               <?= $employee['emp_code'] ?>
               </td>

               <th style="width: 110px">إسم الموظف</th>
                                <td>
               
               <?= $employee['employee'] ?>
               </td>
            
            <?php
            if (isset($allData->markz) && !empty($allData->markz)) {
                $markz_name = $allData->markz_name;
                $markz_id = $allData->markz;
            } else {
                $markz_name = "";
                $markz_id = "";
            }
            ?>
             <th style="width: 110px">مركز التكلفه</th>
                                <td>
               
               <?= $employee['markz_name'] ?>
               </td>
            </tr>
            </tbody>
                        </table>
                </div>
	</div>
                    

        </div>
        <div class="clearfix"></div>
        <br>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
            <li class="active"><a href="#est7kak" data-toggle="tab"> بيانات الاستحقاقات</a></li>
            <li><a href="#estkta3" data-toggle="tab"> بيانات الاستقطاعات </a></li>
            <li><a href="#banks" data-toggle="tab"> بيانات الحسابات البنكية </a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade in active" id="est7kak">
                
                
                <div id="show_details">
                    <?php
                    if (isset($allData->badlat) && !empty($allData->badlat)) {
                    ?>
                    <table class="example display table table-bordered responsive nowrap tb_table text-center"
                           id="POITable"
                           cellspacing="0" width="100%" style="table-layout: auto;">
                        <thead>
                        <tr class="greentd"></tr>
                        <tr class="greentd">
                            <th>إسم البند</th>
                            <th> طريقه الحساب</th>
                            <th>القيمه</th>
                            <th>محدد المده</th>
                            <th>من تاريخ</th>
                            <th>الي تاريخ</th>
                            <th>يخضع للتأمينات</th>
                            <th>الدليل</th>
                            <!-- <th>الاجراء</th> -->
                        </tr>
                        <tbody>
                        <?php
                        foreach ($allData->badlat as $record) {
                            if (in_array($record->badalat->badl_discount_id_fk, $bdalat_id)) {
                                ?>
                                <tr>
                                    <td>
                                        <select disabled="disabled" class="badl_setting1 form-control" data-validation="required"
                                                id="db_band_name<?php echo $record->badalat->badl_discount_id_fk; ?>">
                                            <option value="0">اختر</option>
                                            <?php
                                            if (isset($badalat) && !empty($badalat)) {
                                                foreach ($badalat as $row) {
                                                    ?>
                                                    <option
                                                            value="<?php echo $row->id; ?>"<?php if ($row->id == $record->badalat->badl_discount_id_fk) {
                                                        echo 'selected';
                                                    } ?>><?php echo $row->title; ?></option>
                                                <?php }
                                            } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <?php if ($record->badalat->method_to_count == 1) {
                                            echo 'قيمه';
                                        } ?>
                                        <?php if ($record->badalat->method_to_count == 2) {
                                            echo 'نسبه';
                                        } ?>
                                    </td>
                                    <td>
                                        <?php echo $record->badalat->value; ?>
                                    </td>
                                    <?php
                                    $yes_no = array(1 => 'نعم', 2 => 'لا');
                                    ?>
                                    <td>
                                        <?php
                                        foreach ($yes_no as $key => $value) {
                                            ?>
                                            <?php if ($key == $record->badalat->specific_period) {
                                                echo $value;
                                            } ?>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php if ($record->badalat->specific_period == 1) {
                                            echo $record->badalat->date_from;
                                        } else {
                                            echo 'غير محدد';
                                        } ?>
                                    </td>
                                    <td>
                                        <?php if ($record->badalat->specific_period == 1) {
                                            echo $record->badalat->date_to;
                                        } else {
                                            echo 'غير محدد';
                                        } ?>
                                    </td>
                                    <td>
                                        <div class="skin-square">
                                            <div class="i-check">
                                                <input class="" disabled="disabled" type="checkbox" money="0"
                                                       class="check_value"
                                                       value="1"<?php if ($record->badalat->insurance_affect == 1) {
                                                    echo 'checked';
                                                } ?>>
                                            </div>
                                        </div>
                                    </td>
                                    <!-- Nagwa 20-6  -->
                                    <td>
                                        <?php if (isset($record->badalat->dalel_code) && !empty($record->badalat->dalel_code)) {
                                            echo $record->badalat->dalel_code;
                                        } else {
                                            echo 'لا يوجد';
                                        } ?>
                                        - <?php if (isset($record->badalat->dalel_name) && !empty($record->badalat->dalel_name)) {
                                            echo $record->badalat->dalel_name;
                                        } else {
                                            echo 'لا يوجد';
                                        } ?>
                                    </td>
                                    <!-- Nagwa 20-6  -->
                                    <!-- <td>
                                        <a onclick='delete_emp_finance_data(<?php echo $record->badalat->id; ?>,<?php echo $record->badalat->emp_id; ?>,<?php echo $record->badalat->value; ?>,1);
                                                '><i
                                                    class="fa fa-trash" aria-hidden="true"></i> </a>
                                        <a data-toggle="modal" type="button" style="cursor: pointer"
                                           data-target="#modal_having_esthakak"
                                           onclick="
                                                   get_edite(<?php echo $record->badalat->id; ?>);
                                                   fill_modal_select(1,<?php echo $record->badalat->badl_discount_id_fk; ?>);">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </a>
                                    </td> -->
                                </tr>
                                <!------------------------- start_modal - الاستحقاقات------------------------------------------------------------------>
                                <!------------------------- end_modal - الاستحقاقات------------------------------------------------------------------>
                                <?php
                            }
                        }
                        }
                        ?>
                        </tbody>
                        <tr class="greentd">
                            <input type="hidden"
                                   value="<?php if (isset($allData->get_having_value) && !empty($allData->get_having_value)) {
                                       echo $allData->get_having_value;
                                   } else {
                                       echo 0;
                                   } ?> " name="db_value_have" id="db_value">
                            <input type="hidden"
                                   value="<?php if (isset($allData->tamin_value) && !empty($allData->tamin_value)) {
                                       echo $allData->tamin_value;
                                   } else {
                                       echo 0;
                                   } ?> " name="db_value_have2" id="db_value_tamin">
                            <td colspan="2">إجمالي بنود الإستحقاقات</td>
                            <td><input type="text" readonly="readonly" name="having_all_value" class="form-control"
                                       value="<?php if (isset($allData->get_having_value) && !empty($allData->get_having_value)) {
                                           echo $allData->get_having_value;
                                       } else {
                                           echo 0;
                                       } ?> " id="all_value1"></td>
                            <td colspan="3">اجمالي البنود الخاضعه للتأمينات</td>
                            <td><input type="text" readonly="readonly" name="having_tamin_value" class="form-control"
                                       value="<?php if (isset($allData->tamin_value) && !empty($allData->tamin_value)) {
                                           echo $allData->tamin_value;
                                       } else {
                                           echo 0;
                                       } ?>" id="checked_value1"></td>
                            <td></td>
                            <td>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <!------------------------------------------------------------------------------------->
            <div class="tab-pane fade " id="estkta3">
               
                <!-- uyaraaaa20-7-2020 -->
                <div id="show_details_estktat3">
                    <?php
                    if (isset($allData->badlat) && !empty($allData->badlat)) {
                    ?>
                    <table class=" example display table table-bordered responsive nowrap tb_table text-center"
                           id="POITable2"
                           cellspacing="0" width="100%" style="table-layout: auto;">
                        <thead>
                        <tr class="greentd">
                        </tr>
                        <tr class="greentd">
                            <th>إسم البند</th>
                            <th> طريقه الحساب</th>
                            <th>القيمه</th>
                            <th>محدد المده</th>
                            <th>من تاريخ</th>
                            <th>الي تاريخ</th>
                            <th>الدليل</th>
                            <!-- <th>الاجراء</th> -->
                        </tr>
                        <tbody>
                        <?php
                        foreach ($allData->badlat as $record) {
                            if (isset($record->badalat) && !empty($record->badalat) && in_array($record->badalat->badl_discount_id_fk, $cuts_id)) {
                                ?>
                                <tr>
                                    <!-- <td>
                                        <?php
                                    if (isset($discounts) && !empty($discounts)) {
                                        foreach ($discounts as $row) {
                                            ?>
                                         <?php if ($row->id == $record->badalat->badl_discount_id_fk) {
                                                echo $row->title;
                                            } ?>
                                            <?php }
                                    } ?>
                                    </select>
                                </td> -->
                                    <td>
                                        <select disabled="disabled" class="form-control badl_setting2" name=""
                                                id="db_band_name<?php echo $record->badalat->badl_discount_id_fk; ?>"
                                                class="form-control"
                                                data-validation="required">
                                            <option value="0">اختر</option>
                                            <?php
                                            if (isset($discounts) && !empty($discounts)) {
                                                foreach ($discounts as $row) {
                                                    ?>
                                                    <option
                                                            value="<?php echo $row->id; ?>"<?php if ($row->id == $record->badalat->badl_discount_id_fk) {
                                                        echo 'selected';
                                                    } ?>><?php echo $row->title; ?></option>
                                                <?php }
                                            } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <?php if ($record->badalat->method_to_count == 1) {
                                            echo 'قيمه';
                                        } ?>
                                        <?php if ($record->badalat->method_to_count == 2) {
                                            echo 'نسبه';
                                        } ?>
                                    </td>
                                    <td>
                                        <?php echo $record->badalat->value; ?>
                                    </td>
                                    <?php
                                    $yes_no = array(1 => 'نعم', 2 => 'لا');
                                    ?>
                                    <td>
                                        <?php
                                        foreach ($yes_no as $key => $value) {
                                            ?>
                                            <?php if ($key == $record->badalat->specific_period) {
                                                echo $value;
                                            } ?>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php if ($record->badalat->specific_period == 1) {
                                            echo $record->badalat->date_from;
                                        } else {
                                            echo 'غير محدد';
                                        } ?>
                                    </td>
                                    <td>
                                        <?php if ($record->badalat->specific_period == 1) {
                                            echo $record->badalat->date_to;
                                        } else {
                                            echo 'غير محدد ';
                                        } ?>
                                    </td>
                                    <!--  Nagwa 20-6-->
                                    <td>
                                        <?php if (isset($record->badalat->dalel_code) && !empty($record->badalat->dalel_code)) {
                                            echo $record->badalat->dalel_code;
                                        } else {
                                            echo 'لا يوجد';
                                        } ?>
                                        <?php if (isset($record->badalat->dalel_name) && !empty($record->badalat->dalel_name)) {
                                            echo $record->badalat->dalel_name;
                                        } else {
                                            echo 'لا يوجد';
                                        } ?>
                                    </td>
                                    <!-- <td>
                                        <a onclick='delete_emp_finance_data(<?php echo $record->badalat->id; ?>,<?php echo $record->badalat->emp_id; ?>,<?php echo $record->badalat->value; ?>,2);
                                                '><i
                                                    class="fa fa-trash" aria-hidden="true"></i> </a>
                                        <a data-toggle="modal" type="button" style="cursor: pointer"
                                           data-target="#modal_discut"
                                           onclick="
                                                   get_discut(<?php echo $record->badalat->id; ?>);
                                                   fill_modal_select(2,<?php echo $record->badalat->badl_discount_id_fk; ?>);">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </a>
                                    </td> -->
                                </tr>
                                <!------------------------- start_modal - الاستقطاعات------------------------------------------------------------------>
                                <!------------------------- end_modal - الاستقطاعات------------------------------------------------------------------>
                                <?php
                            }
                        }
                        }
                        ?>
                        </tbody>
                        <tfoot>
                        <tr class="greentd" style="margin-bottom: 10px;">
                            <input type="hidden" name="db_value_cut"
                                   value="<?php if (isset($allData->get_discut_value) && !empty($allData->get_discut_value)) {
                                       echo $allData->get_discut_value;
                                   } else {
                                       echo 0;
                                   } ?> " id="db_value_cut">
                            <input type="hidden"
                                   value="<?php if (isset($allData->discut_tamin_value) && !empty($allData->discut_tamin_value)) {
                                       echo $allData->discut_tamin_value;
                                   } else {
                                       echo 0;
                                   } ?> " name="db_value_have2" id="db_value_tamin_discut">
                            <td colspan="2">إجمالي بنود الإستقطاعات</td>
                            <td><input type="text" readonly="readonly" class="form-control" name="discut_all_value"
                                       value="<?php if (isset($allData->get_discut_value) && !empty($allData->get_discut_value)) {
                                           echo $allData->get_discut_value;
                                       } else {
                                           echo 0;
                                       } ?> " id="all_value2"></td>
                            <td colspan="4" style="text-align: center;">
                            </td>
                           
                        </tfoot>
                        </tr>
                    </table>
                </div>
                <?php echo form_close(); ?>
            </div>
            <div class="tab-pane fade " id="banks">
                
                <div id="result_bank">
                </div>
                <div id="show_details_banks">
                    <?php
                    if (isset($allData->Banks)) {
                    ?>
                    <table class="example display table table-bordered responsive nowrap text-center" id="banktable"
                           cellspacing="0"
                           width="100%">
                        <thead>
                        <tr class="greentd">
                        </tr>
                        <tr class="greentd">
                            <th>إسم البنك</th>
                            <th>كود البنك</th>
                            <th>رقم الحساب</th>
                            <th>صوره الحساب</th>
                           
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($allData->Banks as $key => $value) {
                            ?>
                            <tr>
                                <td>
                                <?php
                                    if (isset($banks) && $banks != null) {
                                        foreach ($banks as $bank) {
                                            if ($bank->id == $value->bank_id_fk) {
                                            echo   $bank->ar_name;
                                            }
                                            ?>
                                            <!-- <option bank_code='<?= $bank->bank_code ?>'
                                                    value="<?= $bank->id ?>" <?= $select ?>> -->
                                                    <!-- </option> -->
                                            <?php
                                        }
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?= $value->bank_code ?>
                                </td>
                                <td>
                                <?= $value->bank_account_num ?>
                                </td>
                                <td>
                                    <a data-toggle="modal" type="button" style="cursor: pointer"
                                       data-target="#modal-img<?php echo $value->id; ?>">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <!--  -->
                                    <div class="modal fade" id="modal-img<?php echo $value->id; ?>" tabindex="-1"
                                         role="dialog"
                                         aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close"><span
                                                                aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel"></h4>
                                                </div>
                                                <div class="modal-body">
                                                    <?php if ($value->bank_id_fk_image === 0) { ?>
                                                        <img src="<?php echo base_url(); ?>asisst/web_asset/img/logo.png"
                                                             width="100%" height="">
                                                    <?php } else { ?>
                                                        <img src="<?php echo base_url(); ?>uploads/human_resources/emp_banks/<?php echo $value->bank_id_fk_image; ?>"
                                                             width="100%" height="">
                                                    <?php } ?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" style="float: left"
                                                            data-dismiss="modal">إغلاق
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--  -->
                                </td>
                               
                            </tr>
                            <?php
                        }
                        }
                        ?>
                        </tbody>
                       <?php /*  <!-- <tfoot>
                        <th colspan="5"></th>
                        <td colspan="1" >
                            <button type="button" onclick="get_bank();" class="btn btn-success btn-next"
                                    style="float: right;">
                                <i class="fa fa-plus"></i></button>
                        </td>
                        </tfoot> -->*/?>
                    </table>
                </div>
                <div class="col-xs-12 text-center">
                    <input type="hidden" name="count"
                           value="<?php if (isset($allData->Banks)) echo count($allData->Banks); else echo 0; ?>">
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
<?php
echo '<input type="hidden"  name="edit"  id="add" value="add">';
echo form_open_multipart('human_resources/Human_resources/edit_account/' . $this->uri->segment(4), array('class' => 'edite_account', 'id' => 'edite_account')); ?>
<div class="modal" id="modal-info" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel"
     data-wow-duration="0.5s">
    <div class="modal-dialog" role="document" style="width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabe<?php echo $value->id; ?>"> تعديل رقم الحساب</h4>
            </div>
            <div class="modal-body row" id="bank_edite">
            </div>
            <div class="modal-footer">
                <button type="button" onclick="edit_account(<?= $this->uri->segment(4); ?>)"
                        class="btn btn-labeled btn-success" name="edit"
                        value="edit"
                >
                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                </button>
                <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<?php echo form_close(); ?>
<!------------------------------------------------------------------------------------------modal_image--------------------->
<!---------------------------- modal    ------------------------------->
<!------------------------- start_modal - الاستحقاقات------------------------------------------------------------------>
<?php echo form_open_multipart('human_resources/Human_resources/edit_having_employee/' . $this->uri->segment(4) . '/1', array('class' => 'estkhkakat_edite', 'id' => 'estkhkakat_edite')); ?>
<div class="modal" id="modal_having_esthakak" tabindex="-1" role="dialog"
     aria-labelledby="modal_having_esthakak"
     data-wow-duration="0.5s">
    <div class="modal-dialog" role="document" style="width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h5 class="modal-title" id="modal_having_esthakak">
                    تعديل
                    استحقاقات
                    الموظف</h5>
            </div>
            <div class="modal-body " id="load_edite_esthkak">
            </div>
            <div class="modal-footer">
                <button type="button" onclick="estkhkakat_edite(<?= $this->uri->segment(4) ?>)"
                        class="btn btn-labeled btn-success" name="edit"
                        value="edit"
                >
                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                </button>
                <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<?php echo form_close(); ?>
<!------------------------------------------------- ----------------------------------------------------------------------------------------->
<!------------------------- end_modal - الاستحقاقات------------------------------------------------------------------>
<!------------------------- start_modal - الاستقطاعات------------------------------------------------------------------>
<?php echo form_open_multipart('human_resources/Human_resources/edit_having_employee/' . $this->uri->segment(4) . '/2', array('class' => 'estktat3_edite', 'id' => 'estktat3_edite')); ?>
<div class="modal" id="modal_discut" tabindex="-1" role="dialog"
     aria-labelledby="modal_discut"
     data-wow-duration="0.5s">
    <div class="modal-dialog" role="document" style="width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabemodal_having<?php echo $record->badalat->id; ?>">
                    تعديل استقطاعات الموظف</h4>
            </div>
            <div class="modal-body row" id="load_modal_discut">
            </div>
            <div class="modal-footer">
                <button
                        type="button" onclick="estktat3_edite(<?= $this->uri->segment(4) ?>)"
                        class="btn btn-labeled btn-success" name="edit"
                        value="edit"
                >
                    <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                </button>
                <button type="button" class="btn btn-labeled btn-danger " data-dismiss="modal">
                    <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                </button>
            </div>
        </div>
    </div>
</div>
<?php echo form_close(); ?>
<div class="modal fade" id="myModal_markz_taklfaa" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 70%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"> مراكز التكلفة </h4>
            </div>
            <div class="modal-body" id="load_mrakz">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<script>
   function get_badlat(markz_id) {
        console.log('markz_id :: '+markz_id);
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>human_resources/Human_resources/get_badlat',
            data: {markz_id:markz_id},
            cache: false,
            success: function (resp) {
                var obj = JSON.parse(resp);
                var options = '<option value="">اختر</option>';
                for (var i = 0; i < obj.length; i++) {
                    var option = '<option value="' + obj[i].band_id_fk + '" data-rkm_hesab="' + obj[i].rkm_hesab + '" data-hesab_name="' + obj[i].hesab_name + '"  > ' + obj[i].band_name + '</option>';
                    options += option;
                }
                $('#badl_discount_id_fk').html(options);
            }
        });
    }
</script>
<script>
    function load_mrakz() {
        $.ajax({
            type: 'get',
            url: "<?php echo base_url();?>human_resources/Human_resources/load_mrakz",
            beforeSend: function () {
                $('#load_mrakz').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#load_mrakz').html(d);
            }
        });
    }
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>/asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script>
    function add_row_1(type,emp_id) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/human_resources/add_record_1",
            data: {
                type: type,
                emp_id:emp_id
            },
            success: function (d) {
                if (type == 1) {
                    $('#result').html(d);
                } else {
                    $('#result2').html(d);
                }
            }
        });
    }
</script>
<script>
    function deleteRow(row, type) {
        var i = row.parentNode.parentNode.rowIndex;
        if (type == 1) {
            document.getElementById('POITable').deleteRow(i);
        } else {
            document.getElementById('POITable2').deleteRow(i);
        }
    }
</script>
<script>
    function put_value(len, type) {
        var valu = $('#value' + type + len).val();
        $('#check' + type + len).attr('money', valu);
        var count_value = 0;
        $(".valu" + type).each(function () {
            count_value = count_value + parseInt($(this).val());
        });
        if (type == 1) {
            var old_value = parseInt($('#db_value').val());
            $('#all_value' + type).val(count_value + old_value);
        } else {
            var old_value = parseInt($('#db_value_cut').val());
            $('#all_value' + type).val(count_value + old_value);
        }
    }
</script>
<script>
    function get_checked_value(type) {
        var count_value = 0;
        $(".check_value" + type + ':checkbox:checked').each(function () {
            count_value = count_value + parseInt($(this).attr('money'));
        });
        var old_value = parseInt($('#checked_value' + type).val());
        if (type == 1) {
            var old_value = parseInt($('#db_value_tamin').val());
            $('#checked_value' + type).val(count_value + old_value);
        } else {
            var old_value = parseInt($('#db_value_tamin_discut').val());
            $('#checked_value' + type).val(count_value + old_value);
        }
    }
</script>
<script>
    function get_bank(emp_id, emp_code) {
        var x = document.getElementById('banktable');
        var count = x.rows.length;
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/human_resources/getBanks",
            data: {count: count, emp_id: emp_id, emp_code: emp_code},
            success: function (d) {
                $('#result_bank').append(d);
            }
        });
    }
</script>
<script>
    function get_option(valu, type) {
        var valu = [];
        $(".badl_setting" + type).each(function () {
            valu.push($(this).val());
        })
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/human_resources/add_option_select",
            data: {valu: valu, type: type},
            success: function (d) {
                $(".badl_setting" + type).each(function () {
                    if ($(this).val() == 0) {
                        $(this).html(d);
                    }
                })
            }
        });
    }
</script>
<script>
    function change_status2(row, emp_code, approved) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/human_resources/change_status",
            data: {row: row, emp_code: emp_code, approved: approved},
            success: function (d) {
                swal({
                    type: "success",
                    title: d,
                    confirmButtonText: "تم"
                });
                get_details_banks(emp_code);
                // location.reload();
            }
        });
    }
</script>
<script>
    function get_code_bank(id) {
        var valu = $("#bank_id_fk" + id).find('option:selected').attr('bank_code');
        $('#bank_code2' + id).val(valu);
    }
</script>
<script type="text/javascript">
    function readURL(input, id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#blah' + id).attr('src', e.target.result)
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<script>
    var loadFile = function (event, id) {
        var output = document.getElementById('blah' + id);
        output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>
<!-------------------------------------------------------------------------------------->
<script>
    function limit_peroid(valu, id) {
        if (valu == 1) {
            document.getElementById("have_date_to" + id).removeAttribute("disabled", "disabled");
            document.getElementById("have_date_from" + id).removeAttribute("disabled", "disabled");
        } else {
            document.getElementById("have_date_to" + id).setAttribute("disabled", "disabled");
            document.getElementById("have_date_from" + id).setAttribute("disabled", "disabled");
            $("#have_date_to" + id).val('');
            $("#have_date_from" + id).val('');
        }
    }
</script>
<script>
    function fill_modal_select(type, id) {
        var vv = $('#db_band_name' + id).val();
        var valu = [];
        $(".badl_setting" + type).each(function () {
            if (vv != $(this).val()) {
                valu.push($(this).val());
            }
        })
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/human_resources/fill_select_modal",
            data: {type: type, id: id, valu: valu},
            success: function (d) {
                $('#band_name' + id).html(d);
            }
        });
    }
</script>
<script>
    function get_tamin_value(valu, len) {
        var emp_id = $('#emp_id').val();
        var value_tamin = $('#checked_value1').val();
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/human_resources/get_tamin_value",
            data: {emp_id: emp_id},
            success: function (d) {
                if (valu == 2) {
                    var perc = (value_tamin / 100) * d;
                    $('#value2' + len).val(Math.round(perc));
                } else {
                    $('#value2' + len).val('');
                }
                var type = 2;
                var count_value = 0;
                $(".valu2").each(function () {
                    count_value = count_value + parseInt($(this).val());
                });
                var old_value = parseInt($('#db_value_cut').val());
                $('#all_value' + type).val(count_value + old_value);
            }
        });
    }
</script>
<!--------------------------------------------------------------->
<script>
    function get_value_modal(valu, id) {
        var value_tamin = $('#checked_value1').val();
        var emp_id = $('#emp_id').val();
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/human_resources/get_tamin_value",
            data: {emp_id: emp_id},
            success: function (d) {
                if (valu == 2) {
                    var perc = (value_tamin / 100) * d;
                    $('#edit_val' + id).val(Math.round(perc));
                } else {
                    $('#edit_val' + id).val('');
                }
            }
        });
    }
</script>
<script type="text/javascript" src="<?php echo base_url() ?>/asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/plugins/icheck/icheck.min.js" type="text/javascript"></script>
<script>
    $('.skin-minimal .i-check input').iCheck({
        checkboxClass: 'icheckbox_minimal',
        radioClass: 'iradio_minimal',
        increaseArea: '20%'
    });
    $('.skin-square .i-check input').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green'
    });
    $('.skin-flat .i-check input').iCheck({
        checkboxClass: 'icheckbox_flat-red',
        radioClass: 'iradio_flat-red'
    });
    $('.skin-line .i-check input').each(function () {
        var self = $(this),
            label = self.next(),
            label_text = label.text();
        label.remove();
        self.iCheck({
            checkboxClass: 'icheckbox_line-blue',
            radioClass: 'iradio_line-blue',
            insert: '<div class="icheck_line-icon"></div>' + label_text
        });
    });
</script>
<script>
    function get_rkm_hesab(type, badl_id) {
        var markz_id = $('#markz').val();
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/human_resources/get_rkm_hesab",
            data: {markz_id: markz_id, badl_id: badl_id},
            success: function (d) {
                var obj = JSON.parse(d);
                //
                if (d == 0) {
                    $('#dalel_code' + type).val('');
                    $('#dalel_name' + type).val('');
                    swal({
                        title: "البند غير مربوط بالدليل المحاسبي ",
                        type: "warning",
                        confirmButtonClass: "btn-warning",
                        closeOnConfirm: false
                    });
                } else {
                    $('#dalel_code' + type).val(obj.rkm_hesab);
                    $('#dalel_name' + type).val(obj.hesab_name);
                }
            }
        });
    }
</script>
<script>
    function update_rkm_esab(type, badl_id, id) {
        var markz_id = $('#markz').val();
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/human_resources/get_rkm_hesab",
            data: {markz_id: markz_id, badl_id: badl_id},
            success: function (d) {
                var obj = JSON.parse(d);
                if (d == 0) {
                    $('#have_dalel_code' + type + id).val('');
                    $('#have_dalel_name' + type + id).val('');
                    swal({
                        title: "البند غير مربوط بالدليل المحاسبي ",
                        type: "warning",
                        confirmButtonClass: "btn-warning",
                        closeOnConfirm: false
                    });
                } else {
                    $('#have_dalel_code' + type + id).val(obj.rkm_hesab);
                    $('#have_dalel_name' + type + id).val(obj.hesab_name);
                }
            }
        });
    }
</script>
<script>
    function save_esthkak(emp_id) {
        //  var all_inputs = $(' [data-validation="required"]');
        var all_inputs = $(' #esthkak [data-validation="required"]');
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
        var serializedData = $('.esthkak').serializeArray();
        $.each(serializedData, function (key, item) {
            form_data.append(item.name, item.value);
        });
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>human_resources/Human_resources/add_financeEmployee',
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
                var all_inputs_set = $('.esthkak .form-control');
                all_inputs_set.each(function (index, elem) {
                    console.log(elem.id + $(elem).val());
                    $(elem).val('');
                    //get_add();
                });
                get_details(emp_id);
              add_row_1(1,emp_id);
                if (html == 1) {
                    //get_data('manzel');
                    // show_tab('manzel');
                }
            }
        });
    }
</script>
<script>
    function save_estktat3(emp_id) {
        // var all_inputs = $(' [estktat3 data-validation="required"]');
        var all_inputs = $(' #estktat3 [data-validation="required"]');
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
        var serializedData = $('.estktat3').serializeArray();
        $.each(serializedData, function (key, item) {
            form_data.append(item.name, item.value);
        });
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>human_resources/Human_resources/add_financeEmployee',
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
                var all_inputs_set = $('.estktat3 .form-control');
                all_inputs_set.each(function (index, elem) {
                    console.log(elem.id + $(elem).val());
                    $(elem).val('');
                    //get_add();
                });
                get_details_estktat3(emp_id);
               add_row_1(2,emp_id);
                if (html == 1) {
                    //get_data('manzel');
                    // show_tab('manzel');
                }
            }
        });
    }
</script>
<script>
    function get_details(emp_id) {
        $('#show_details').show();
        $.ajax({
            type: 'post',
            data: {emp_id: emp_id},
            url: "<?php echo base_url();?>human_resources/Human_resources/load_details",
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
    function get_details_estktat3(emp_id) {
        // $('#show_details_estktat3').show();
        $.ajax({
            type: 'post',
            data: {emp_id: emp_id},
            url: "<?php echo base_url();?>human_resources/Human_resources/load_details_estktat3",
            beforeSend: function () {
                $('#show_details_estktat3').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#show_details_estktat3').html(d);
            }
        });
    }
</script>
<script>
    function edit_account(emp_id) {
        //  var all_inputs = $(' [data-validation="required"]');
        var all_inputs = $(' #edite_account [data-validation="required"]');
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
        var files = $('#bank_image')[0].files;
        form_data.append("bank_image", files[0]);
        var serializedData = $('.edite_account').serializeArray();
        $.each(serializedData, function (key, item) {
            form_data.append(item.name, item.value);
        });
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>human_resources/Human_resources/edit_account',
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
                    title: 'تم التعديل  ',
                    type: 'success',
                    confirmButtonText: 'تم'
                });
                var all_inputs_set = $('.edite_account .form-control');
                all_inputs_set.each(function (index, elem) {
                    console.log(elem.id + $(elem).val());
                    // $(elem).val('');
                    //  get_details_account(emp_id);
                    //get_add();
                });
                get_details_banks(emp_id);
                if (html == 1) {
                    //get_data('manzel');
                    // show_tab('manzel');
                }
            }
        });
    }
</script>
<script>
    function estktat3_edite(emp_id) {
        // var all_inputs = $(' [estktat3 data-validation="required"]');
        var all_inputs = $(' #estktat3_edite [data-validation="required"]');
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
        var serializedData = $('.estktat3_edite').serializeArray();
        $.each(serializedData, function (key, item) {
            form_data.append(item.name, item.value);
        });
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>human_resources/Human_resources/edit_having_employee',
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
                var all_inputs_set = $('.estktat3 .form-control');
                all_inputs_set.each(function (index, elem) {
                    console.log(elem.id + $(elem).val());
                    //  $(elem).val('');
                    //get_add();
                });
                get_details_estktat3(emp_id);
                add_row_1(2,emp_id);
                if (html == 1) {
                    //get_data('manzel');
                    // show_tab('manzel');
                }
            }
        });
    }
</script>
<script>
    function estkhkakat_edite(emp_id) {
        // var all_inputs = $(' [estktat3 data-validation="required"]');
        var all_inputs = $('#estkhkakat_edite [data-validation="required"]');
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
        var serializedData = $('.estkhkakat_edite').serializeArray();
        $.each(serializedData, function (key, item) {
            form_data.append(item.name, item.value);
        });
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>human_resources/Human_resources/edit_having_employee',
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
                get_details(emp_id);
                add_row_1(1,emp_id);
                if (html == 1) {
                    //get_data('manzel');
                    // show_tab('manzel');
                }
            }
        });
    }
</script>
<!-- <script> function load_mrakz() {
$.ajax({
    type: 'get',
    url: "<?php echo base_url(); ?>human_resources/Human_resources/load_mrakz",
    beforeSend: function () {
        $('#load_mrakz').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
    },
    success: function (d) {
        $('#load_mrakz').html(d);
    }
});
}
</script> -->
<script>
    function add_banks(emp_id) {
        // var all_inputs = $(' [estktat3 data-validation="required"]');
        var all_inputs = $(' #banks [data-validation="required"]');
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
        var files = $('#userfile')[0].files;
        form_data.append("userfile", files[0]);
        var serializedData = $('.banks').serializeArray();
        $.each(serializedData, function (key, item) {
            form_data.append(item.name, item.value);
        });
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>human_resources/Human_resources/add_banks_employee',
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
                var all_inputs_set = $('.banks .form-control');
                all_inputs_set.each(function (index, elem) {
                    console.log(elem.id + $(elem).val());
                    $(elem).val('');
                    //get_add();
                });
                get_details_banks(emp_id);
                if (html == 1) {
                    //get_data('manzel');
                    // show_tab('manzel');
                }
            }
        });
    }
</script>
<script>
    function get_details_banks(emp_id) {
        $('#show_details_estktat3').show();
        $.ajax({
            type: 'post',
            data: {emp_id: emp_id},
            url: "<?php echo base_url();?>human_resources/Human_resources/load_details_banks",
            beforeSend: function () {
                $('#show_details_banks').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#show_details_banks').html(d);
            }
        });
    }
</script>
<!-- add_hesab -->
<script>
    function add_hesab(emp_code) {
        var markz = $('#markz').val();
        var markz_name = $('#markez_name').val();
        var having_all_value = $('#all_value1').val();
        var having_tamin_value = $('#checked_value1').val();
        var discut_all_value = $('#all_value2').val();
        var all_inputs = $(' #form_div [data-validation="required"]');
        var valid = 1;
        all_inputs.each(function (index, elem) {
            if ($(elem).val().length >= 1) {
                $(elem).css("border-color", "#5cb85c");
            } else {
                valid = 0;
                $(elem).css("border-color", "red");
            }
        });
        if (valid != 0) {
            $.ajax({
                type: 'post',
                url: "<?php echo base_url();?>human_resources/Human_resources/addfinanceEmployee",
                type: "POST",
                data: {
                    emp_code: emp_code,
                    markz: markz,
                    markz_name: markz_name,
                    having_all_value: having_all_value,
                    having_tamin_value: having_tamin_value,
                    discut_all_value: discut_all_value
                },
                beforeSend: function () {
                    swal({
                        title: "جاري الحفظ ... ",
                        text: "",
                        imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                        showConfirmButton: false,
                        allowOutsideClick: false
                    });
                },
                success: function (d) {
                    $('#markez').val(' ');
                    /* $('#markez_name').val(' ');
                     $('#account_num').val(' ');
                     $('#account').val(' ');*/
                    all_inputs.each(function (index, elem) {
                        $(elem).val('');
                        $(elem).css("border-color", "");
                    });
                    swal({
                        title: " تمت الاضافه بنجاح ",
                        type: "success",
                        confirmButtonClass: "btn-warning",
                        closeOnConfirm: false,
                        confirmButtonText: 'تم'
                    });
                    set_table();
                }
            });
        } else {
            swal({
                title: " برجاء ادخال  البيانات! ",
                type: "warning",
                confirmButtonClass: "btn-warning",
                closeOnConfirm: false,
                confirmButtonText: 'تم'
            });
        }
    }</script>
<!-- delete_emp_finance_data -->
<script>
    function delete_emp_finance_data(id,emp_id,value,type) {
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
                        url: '<?php echo base_url() ?>human_resources/Human_resources/delete_emp_finance_data',
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
                            $('#tasnef').val('');
                            // $('#Modal_esdar').modal('hide');
                            swal({
                                    title: "تم الحذف!",
                                }
                            );
                            if (type == 1) {
                                get_details(emp_id);
                                add_row_1(1,emp_id);
                            } else {
                                get_details_estktat3(emp_id);
                                add_row_1(2,emp_id);
                            }
                        }
                    });
                } else {
                    swal("تم الالغاء", "", "error");
                }
            });
    }
</script>
<!-- deleteFinanceEmp -->
<script>
    function deleteFinanceEmp(id, emp_id) {
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
                        url: '<?php echo base_url() ?>human_resources/Human_resources/deleteFinanceEmp',
                        data: {id: id, emp_id: emp_id},
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
                            get_details_banks(emp_id);
                        }
                    });
                } else {
                    swal("تم الالغاء", "", "error");
                }
            });
    }
</script>
<!-- yara20-7-2020 -->
<script>
    function get_peroid(type, len) {
        //alert(type+len+valu);
        var valu = $("#peroid" + type + len).val();
        if (valu == 1) {
            document.getElementById("date_to" + type + len).removeAttribute("disabled", "disabled");
            document.getElementById("date_from" + type + len).removeAttribute("disabled", "disabled");
        } else {
            document.getElementById("date_to" + type + len).setAttribute("disabled", "disabled");
            document.getElementById("date_from" + type + len).setAttribute("disabled", "disabled");
        }
    }
</script>
<script type="text/javascript" src="<?php echo base_url() ?>/asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script src="<?php echo base_url() ?>asisst/admin_asset/plugins/icheck/icheck.min.js" type="text/javascript"></script>
<script>
    $('.skin-minimal .i-check input').iCheck({
        checkboxClass: 'icheckbox_minimal',
        radioClass: 'iradio_minimal',
        increaseArea: '20%'
    });
    $('.skin-square .i-check input').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green'
    });
    $('.skin-flat .i-check input').iCheck({
        checkboxClass: 'icheckbox_flat-red',
        radioClass: 'iradio_flat-red'
    });
    $('.skin-line .i-check input').each(function () {
        var self = $(this),
            label = self.next(),
            label_text = label.text();
        label.remove();
        self.iCheck({
            checkboxClass: 'icheckbox_line-blue',
            radioClass: 'iradio_line-blue',
            insert: '<div class="icheck_line-icon"></div>' + label_text
        });
    });
</script>
<script>
</script>
<script>
    function get_edite(id) {
        //  $('#show_details_estktat3').show();
        $.ajax({
            type: 'post',
            data: {id: id},
            url: "<?php echo base_url();?>human_resources/Human_resources/load_edite_esthkak",
            beforeSend: function () {
                $('#load_edite_esthkak').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#load_edite_esthkak').html(d);
            }
        });
    }
</script>
<script>
    function get_discut(id) {
        //  $('#show_details_estktat3').show();
        $.ajax({
            type: 'post',
            data: {id: id},
            url: "<?php echo base_url();?>human_resources/Human_resources/load_edite_estkta3",
            beforeSend: function () {
                $('#load_modal_discut').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#load_modal_discut').html(d);
            }
        });
    }
</script>
<!-- edite_bank -->
<script>
    function edite_bank(id) {
        //  $('#show_details_estktat3').show();
        $.ajax({
            type: 'post',
            data: {id: id},
            url: "<?php echo base_url();?>human_resources/Human_resources/edite_bank",
            beforeSend: function () {
                $('#bank_edite').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#bank_edite').html(d);
            }
        });
    }
</script>