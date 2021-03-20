<style>
    .half_d {
        width: 30% !important;
        float: right !important;
    }
    .half_dd {
        width: 70% !important;
        float: right !important;
    }
</style>
<style>
    td .fa {
        background-color: unset;
        color: #000;
        padding: unset;
        font-size: unset;
        line-height: unset;
        border-radius: unset;
    }
</style>
<?php if ($_SESSION['role_id_fk'] == 3 || $_SESSION['role_id_fk'] == 1) {
    ?>
    <?php
    if (isset($records) && !empty($records)) {
        ?>
        <div class="col-sm-12 no-padding ">
            <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable ">
                <div class="panel-heading">
                    <h3 class="panel-title"> طلبات احتياج فرصة تطوعية</h3>
                </div>
                <div class="panel-body">
                    <!-----------------------------------------table------------------------------------->
                    <table id="example" class=" display table table-bordered   responsive nowrap" cellspacing="0"
                           width="100%">
                        <thead>
                        <tr class="greentd visible-md visible-lg">
                            <th>م</th>
                            <th>رقم الطلب</th>
                            <th>تاريخ الطلب</th>
                            <th>الإدارة</th>
                            <th>مقدم الطلب</th>
                            <th> اسم الفرصة التطوعية</th>
                            <th>العدد المستهدف</th>
                            <th> الاجراء</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $mostafed_type_arr = array(0 => 'داخلى', 1 => 'خارجى'); ?>
                        <?php
                        $x = 1;
                        foreach ($records as $row) {
                            if (isset($_POST['from_profile']) && (!empty($_POST['from_profile']))) {
                                $link_update = 'edit_talab(' . $row->id . ')';
                                $link_delete = 1;
                            } else {
                                $link_update = 'window.location="' . base_url() . 'human_resources/tataw3/Emptatw3/edit_talab/' . $row->id . '";';
                                $link_delete = 0;
                            }
                            ?>
                            <tr>
                                <td><?php echo $x; ?></td>
                                <td><?php echo $row->rkm_talb; ?></td>
                                <td><?php echo $row->date_talab; ?></td>
                                <td>
                                    <?php
                                    if (!empty($admin)):
                                        foreach ($admin as $record):
                                            if ($row->edara_id == $record->id) {
                                                echo $record->title;
                                            }
                                        endforeach;
                                    endif;
                                    ?>
                                </td>
                                <td><?php echo $row->mokdm_talab; ?></td>
                                <td><?php echo $row->forsa_name; ?></td>
                                <td><?php echo $row->num_motakdm; ?></td>
                                <td>
                                    <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#details_Modal"
                                        onclick="load_page_emps(<?= $row->id ?>);">الموظفين </a>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary">إجراءات</button>
                                        <button type="button" class="btn btn-primary dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="caret"></span>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a data-toggle="modal" data-target="#details_Modal"
                                                    onclick="load_page(<?= $row->id ?>);">
                                                    <i class="fa fa-list " aria-hidden="true"></i> تفاصيل </a></li>
                                            <li><a onclick='swal({
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
                                                <?= $link_update ?>
                                                        });'><i
                                                            class="fa fa-pencil-square-o" aria-hidden="true"></i> تعديل </a>
                                            </li>
                                            <li><a onclick='swal({
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
                                                        swal("تم الحذف!", "", "success");
                                                        window.location="<?php echo base_url(); ?>human_resources/tataw3/Emptatw3/delete_talab/<?php echo $row->id . '/' . $link_delete; ?>";
                                                        });'><i class="fa fa-trash"
                                                                aria-hidden="true"></i> حذف </a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <?php $x++;
                        } ?>
                        </tbody>
                    </table>
                    <!--------------------------------------------table---------------------------------->
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- details_Modal -->
    <div class="modal fade" id="details_Modal" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document" style="width: 80%">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" onclick="$('#details_Modal').modal('hide')" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" style="text-align: center;">التفاصيل </h4>
                </div>
                <div class="modal-body" id="result_page">
                </div>
                <div class="modal-footer" style="display: inline-block;width: 100%">
                    <button type="button" class="btn btn-labeled btn-danger "
                            onclick="$('#details_Modal').modal('hide')">
                        <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                    </button>
                </div>
            </div>
        </div>
    </div>
<?php } else {
    ?>
    <div class="alert alert-danger"> نظرا لانك ليس موظف.. لا يمكنك إقامة طلب احتياج فرصة تطوعية</div>
    <?php
} ?>
<!-- settingModal  -->
<script>
    function load_page(row_id) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/tataw3/Emptatw3/load_details",
            data: {row_id: row_id},
            success: function (d) {
                $('#result_page').html(d);
            }
        });
    }
</script>
<!-- load_details_emps -->
<script>
    function load_page_emps(row_id) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/tataw3/Emptatw3/load_details_emps",
            data: {row_id: row_id,finish:1},
            success: function (d) {
                $('#result_page').html(d);
            }
        });
    }
</script>
