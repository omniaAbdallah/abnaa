<div class="col-sm-12 no-padding">
    <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
        <div class="panel-heading">
            <h3 class="panel-title"><?= $title ?></h3>
        </div>
        <div class="panel-body">
            <?php
            echo form_open_multipart('family_controllers/osr_ektfaa/Osr_ektfaa_lagna/insert', array('id' => 'myform'));
            $lagna_name = " لجنة إكتفاء";
            $lagna_id = "2";
            ?>
            <div class="col-sm-12 form-group">
                <div class="col-sm-3  col-md-2 padding-4 ">
                    <label class="label  "> اسم اللجنة </label>
                    <input type="text" name="lagna_name" class="form-control "
                           value="<?php echo $lagna_name; ?>">
                    <input type="hidden" name="lagna_id" class="form-control "
                           value="<?php echo $lagna_id; ?>">
                </div>
                <div class="col-sm-3  col-md-4 padding-4 ">
                    <label class="label  "> الموظف </label>
                    <select name="emp_code"
                            onchange="get_sidebar_data()"
                            id="emp_code"
                            data-validation="required"
                            title="    اختر  معتمد الخطة  "
                            class="form-control selectpicker"
                            data-show-subtext="true"
                            data-live-search="true">
                        <option value="">اختر</option>
                        <?php if (isset($employees) && !empty($employees)) {
                            foreach ($employees as $row) {
                                if (!in_array($row->emp_code, $emp_in)) {
                                    ?>
                                    <option value="<?= $row->emp_code ?>"><?= $row->employee ?></option>
                                    <?php
                                }
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class=" col-md-3">
                    <label class="label"> الوظيفة داخل اللجنة</label>
                    <select name="job_in_lagna_id" id="job_in_lagna_id" class="form-control "
                            data-validation="required" aria-required="true">
                        <option value="">إختر</option>
                        <?php
                        $arrxx = array(1 => 'رئيس اللجنة',
                            2 => 'نائب رئيس اللجنة',
                        );
                        if (!empty($arrxx)):
                            foreach ($arrxx as $keyy => $value):
                                if (!in_array($keyy, $job_in)) {
                                    ?>
                                    <option
                                            value="<?php echo $keyy; ?>-<?php echo $value; ?>"><?php echo $value; ?></option>
                                    <?php
                                }
                            endforeach;
                        endif;
                        ?>
                        <option
                                value="3-عضو">عضو
                        </option>
                    </select>
                </div>
                <div class="col-sm-12 form-group 4 text-center">
                    <br>
                    <input type="hidden" name="save" id="save" value="save">
                    <?php
                    $type = 'button';
                    $onclick = 'add()';
                    ?>
                    <button type="<?php echo $type; ?>" onclick="<?php echo $onclick; ?>"
                            class="btn btn-labeled btn-success " name="save" value="save">
                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
                    </button>
                </div>
                <div class="col-sm-2 no-padding" style="
    float: left;
    margin-top: -115px;
">
                    <div class="text-center" id="sidebar_data">
                    </div>
                </div>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>
</div>
<?php if (isset($records) && $records != null) { ?>
    <div class="col-sm-12 no-padding">
        <div class="panel panel-bd lobidisable lobipanel lobipanel-sortable">
            <div class="panel-heading">
                <h3 class="panel-title"> لجنة إكتفاء</h3>
            </div>
            <div class="panel-body">
                <table id="" class="example table table-bordered table-striped" role="table">
                    <thead>
                    <tr class="greentd">
                        <th width="2%">م</th>
                        <th class="text-center"> صورة الموظف</th>
                        <th class="text-center"> كود الموظف</th>
                        <th class="text-center"> اسم الموظف</th>
                        <th class="text-center"> الوظيفة داخل اللجنة</th>
                        <th class="text-center"> الحالة</th>
                        <th class="text-center">الإجراء</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $x = 1;
                    foreach ($records as $value) {
                        ?>
                        <tr>
                            <td><?= $x++ ?></td>
                            <td>
                                <img src="<?= base_url() ?>uploads/human_resources/emp_photo/thumbs/<?= $value->emp_photo ?>"
                                     class="img-circle" width="45" height="45" alt="user"></td>
                            <td><?= $value->emp_code ?></td>
                            <td><?= $value->emp_name ?></td>
                            <td><?= $value->job_in_lagna_name ?></td>
                            <td>
                                <div class="toggle-example">
                                    <input id="checkbox_toggle" class="checkbox_toggle" data-size="mini"
                                           type="checkbox" <?php if ($value->status == 1) {
                                        echo 'checked';
                                    } ?> data-toggle="toggle" onchange="change_status(<?= $value->id ?>)"
                                           data-onstyle="success" data-offstyle="danger">
                                </div>
                                <?php /*if ($value->status == 1) { ?>
                                    <span class="badge badge-success m-r-15" style="font-size: 13px; width: 60px;" onclick="change_status(<?=$value->id?>)"> <i
                                                class="fa fa-thumbs-up" aria-hidden="true"></i> نشط </span>
                                <?php } else { ?>
                                    <span class="badge badge-danger m-r-15" style="font-size: 13px; width: 60px;" onclick="change_status(<?=$value->id?>)"> <i
                                                class="fa fa-thumbs-o-down" aria-hidden="true"></i> موقوف </span>
                                <?php } */ ?>
                            </td>
                            <td>
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
                                        setTimeout(function(){window.location="<?= base_url() . 'family_controllers/osr_ektfaa/Osr_ektfaa_lagna/Delete/' . $value->id ?>";}, 500);
                                        });'>
                                    <i class="fa fa-trash"> </i></a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php } ?>
<!-- myModal_attache -->
<script>
</script>
<script>
    function add() {
        $('#save').val('save');
        $('#myform').submit();
    }
</script>
<script>
    function get_sidebar_data() {
        var memb_id = $('#emp_code').val();
        if (memb_id) {
            $.ajax({
                type: 'post',
                url: "<?php echo base_url();?>family_controllers/osr_ektfaa/Osr_ektfaa_lagna/get_sidebar_data",
                data: {id: memb_id},
                beforeSend: function () {
                    $('#sidebar_data').html('<div class=\'loader-img\'><div class=\'bar1\'></div><div class=\'bar2\'></div><div class=\'bar3\'></div><div class=\'bar4\'></div><div class=\'bar5\'></div><div class=\'bar6\'></div></div>');
                },
                success: function (d) {
                    $('#sidebar_data').html(d);
                }
            });
        }
    }

    function change_status(id) {
        if (id) {
            $.ajax({
                type: 'post',
                url: "<?php echo base_url();?>family_controllers/osr_ektfaa/Osr_ektfaa_lagna/change_status",
                data: {id: id},
                success: function (d) {

                }
            });
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        $('.selectpicker').selectpicker("refresh");
        $('.checkbox_toggle').bootstrapToggle({
            on: 'نشط',
            off: 'غير نشط'
        });
        get_sidebar_data();
    });
</script>
