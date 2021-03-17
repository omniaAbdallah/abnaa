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
<?php if ($_SESSION['role_id_fk'] == 3) {
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
                            <th>اسم الموظف</th>
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
                                <td><?php echo $row->emp_name; ?></td>
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
    <a  class="btn btn-info btn-sm" data-toggle="modal" data-target="#details_Modal"
        style="padding:1px 5px;" onclick="load_page(<?= $row->tataw3_id_fk ?>);">
        <i class="fa fa-list " aria-hidden="true"></i>تفاصيل </a>
    <a class="btn btn-labeled btn-success" id="publish<?= $row->id ?>"
       style="padding:1px 5px;" onclick="make_action(<?= $row->id ?>,1);">
        <i class=" " aria-hidden="true"></i> قبول الطلب </a>
    <a class="btn btn-labeled btn-danger" id="publish<?= $row->id ?>"
       style="padding:1px 5px;" onclick="make_action(<?= $row->id ?>,2);">
        <i class=" " aria-hidden="true"></i> رفض الطلب </a>
</td>

                                <!--<td>
                                    <a  class="btn btn-info btn-sm" data-toggle="modal" data-target="#details_Modal"
                                       style="padding:1px 5px;" onclick="load_page(<?= $row->id ?>);">
                                        <i class="fa fa-list " aria-hidden="true"></i>تفاصيل </a>
                                    <a class="btn btn-labeled btn-success" id="publish<?= $row->id ?>"
                                       style="padding:1px 5px;" onclick="make_action(<?= $row->id ?>,1);">
                                        <i class=" " aria-hidden="true"></i> قبول الطلب </a>
                                    <a class="btn btn-labeled btn-danger" id="publish<?= $row->id ?>"
                                       style="padding:1px 5px;" onclick="make_action(<?= $row->id ?>,2);">
                                        <i class=" " aria-hidden="true"></i> رفض الطلب </a>
                                </td>-->
                            </tr>
                            <?php $x++;
                        } ?>
                        </tbody>
                    </table>
                    <!--------------------------------------------table---------------------------------->
                </div>
            </div>
        </div>
    <?php } else { ?>
        <div class="alert alert-danger"> لا يوجد بيانات .....</div>
    <?php }
} else {
    ?>
    <div class="alert alert-danger"> نظرا لانك ليس موظف.. لا يمكنك إقامة طلب احتياج فرصة تطوعية</div>
    <?php
} ?>
<!-- settingModal  -->
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

<script>
    function load_page(row_id) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/tataw3/Emptatw3/load_details",
            data: {row_id: row_id},
            beforeSend: function () {
                $('#result_page').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
            },
            success: function (d) {
                $('#result_page').html(d);
            }
        });
    }
   /* function load_page(row_id) {
        $.ajax({
            type: 'post',
            url: "<?php echo base_url();?>human_resources/tataw3/Emptatw3/load_details",
            data: {row_id: row_id},
            success: function (d) {
                $('#result_page').html(d);
            }
        });
    }*/
</script>
<script>
    function make_action(id, action) {
        swal({
                title: "هل انت متاكد من العملية?",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "نعم",
                cancelButtonText: "لا",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        type: 'post',
                        url: '<?php echo base_url() ?>human_resources/tataw3/Emptatw3/make_action',
                        data: {id: id, action: action},
                        dataType: 'html',
                        cache: false,
                        beforeSend: function () {
                            swal({
                                title: "جاري  ... ",
                                text: "",
                                imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',
                                showConfirmButton: false,
                                allowOutsideClick: false
                            });
                        },
                        success: function (html) {
                            swal({
                                    title: "تم !",
                                }
                            );
                            location.reload();
                        }
                    });
                } else {
                    swal("تم الالغاء", "", "error");
                }
            });
    }
</script>