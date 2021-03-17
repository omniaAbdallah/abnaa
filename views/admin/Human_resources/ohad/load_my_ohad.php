

<div class="col-md-12" >
        <?php
        if (isset($all_my_ohad) && !empty($all_my_ohad)) {

            ?>
            <table class="display table table-bordered responsive nowrap tb_table" cellspacing="0" width="100%">
                <thead>
                <tr class="info">
                    <th>تاريخ الإستلام</th>
                    <th>تصنيف الأصل</th>
                    <th>إسم الأصل</th>
                    <th>العدد</th>
                    <th>الحالة</th>
                    <th>تحويل</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($all_my_ohad as $row) {
                    ?>
                    <tr>
                        <td><?= $row->estlam_date ?></td>
                        <td><?= $ohad_devices[$row->main_device_code] ?></td>
                        <td><?= $array_sub_ohad_devices[$row->sub_device_code] ?></td>
                        <td><?= $row->device_num ?></td>
                        <td><?php
                            $house_device_status=array(1=>'جيد',2=>'متوسط',3=>'غير جيد',4=>'يحتاج');
                            echo $house_device_status[$row->device_status];
                            ?></td>

                        <td>
                            <a data-toggle="modal"
                               data-target="#myModalonlyaccept-<?=$row->id?>"
                               class="btn btn-xs btn-success" title="تحويل">
                                <span class="fa fa-check-square-o"></span> تحويل العهده</a>
                        </td>
                        <div class="modal fade" id="myModalonlyaccept-<?= $row->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">تحويل العهدة</h4>
                                    </div>

                                    <input type="hidden" name="add" id="add"  value="add"/>
                                    <div class="modal-body">
                                        <div class="row" style="padding: 20px">
                                            <input type="hidden" name="main_device_code" id="main_device_code"  value="<?= $row->main_device_code ?>"/>
                                            <input type="hidden" name="sub_device_code" id="sub_device_code"  value="<?= $row->sub_device_code ?>"/>
                                            <input type="hidden" name="device_num" id="device_num"  value="<?= $row->device_num ?>"/>
                                            <input type="hidden" name="device_status" id="device_status"  value="<?= $row->device_status ?>"/>

                                            <div class="form-group col-sm-12 col-xs-12">
                                                <label class="label">تاريخ التحويل</label>
                                                <input type="date" class="form-control" name="tahwel_date" id="tahwel_date"
                                                       data-validation="required"
                                                       value="<?=date('Y-m-d')?>"/>
                                            </div>
                                            <div class="form-group col-sm-12 col-xs-12">
                                                <label class="label">الموظف المحول منه</label>

                                                <input type="text" name="from_emp_name" class="form-control" value="<?= $empName ?>" disabled="disabled"/>
                                                <input type="hidden" name="from_emp_code" value="<?= $row->emp_code ?>"/>
                                                <input type="hidden" name="emp_ohad_id" value="<?=$row->id?>"/>
                                            </div>
                                            <div class="form-group col-sm-12 col-xs-12">
                                                <label class="label">إختر الموظف
                                                    المراد التحويل اليه</label>
                                                <select name="to_emp_code" class="selectpicker form-control"
                                                        data-show-subtext="true" data-live-search="true" data-validation="required"
                                                        aria-required="true">
                                                    <option value="">إختر</option>
                                                    <?php
                                                    if (isset($all_employee) && $all_employee != null) {
                                                        foreach ($all_employee as $row2) {
                                                            $select = '';
                                                            ?>
                                                            <option value="<?= $row2->emp_code ?>" <?= $select ?>><?= $row2->employee ?></option>
                                                        <?php } ?>
                                                    <?php } ?>

                                                </select>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                                        <button type="button" name="transfer" value="transfer" class="btn btn-success"
                                                data-dismiss="modal"
                                        onclick="add_tahwel('load_my_ohad');">
                                            حفظ</button>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>

            <?php
        } else {
            echo '<div class="alert alert-danger">لا توجد عهد</div>';
        }
        ?>



</div>


<script>

    function add_tahwel(div) {
        var all_inputs = $('.div [data-validation="required"]');
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
        console.log($('.'+div).find("select, input").serialize());
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>human_resources/ohad/Ohad_work/add_tahwel/'+<?php echo $this->uri->segment(5); ?>,
            data: $('.'+div).find("select, input").serialize(),
            dataType: 'text',  // what to expect back from the PHP script, if anything
            cache: false,
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
                load_page(<?php echo $this->uri->segment(5); ?>,div);

                //window.location.reload
            }
        });
    }

</script>
