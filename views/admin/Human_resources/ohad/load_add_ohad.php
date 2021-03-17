

<div class="col-md-12">
    <div role="form" class="load_add_ohad">
        <div class="col-md-12">

            <div class="form-group col-sm-2 padding-4">
                <label class="label">تتاريخ الإستلام </label>
                <input type="date" class="form-control" name="estlam_date" id="estlam_date"
                       data-validation="required"
                       value="<?=date('Y-m-d')?>"/>

            </div>

            <div class="form-group col-sm-3 padding-4">
                <label class="label">تتصنيف الأصل </label>

                <select id="main_device_code" name="main_device_code" class="selectpicker form-control bottom-input"
                        onchange="GetSubCode(this.value)"
                        data-show-subtext="true" data-live-search="true"  data-validation="required"  aria-required="true" >
                    <option value="">إختر</option>
                    <?php foreach ($ohad_devices as $key=>$value){
                        ?>
                        <option  value="<?=$key?>" ><?=$value?></option>
                    <?php } ?>
                </select>

            </div>

            <div class="form-group col-sm-3 padding-4">
                <label class="label">إسم الأصل </label>

                <select id="sub_device_code" name="sub_device_code" class="form-control bottom-input"
                        data-validation="required"  aria-required="true"  >
                    <option value=""> إختر</option>
                </select>
            </div>

            <div class="form-group col-sm-1 padding-4">
                <label class="label"> العدد </label>

                <input type="number"  class="form-control bottom-input"
                       name="device_num" id="device_num"
                       data-validation="required" />

            </div>

            <div class="form-group col-sm-2 padding-4">
                <label class="label"> الحالة </label>
                <?php $house_device_status=array(1=>'جيد',2=>'متوسط',3=>'غير جيد',4=>'يحتاج'); ?>
                <select class="form-control" id="device_status"  name="device_status"  data-validation="required" aria-control="required">
                    <option value="">إختر</option>
                    <?php
                    if(isset($house_device_status) && $house_device_status != null){
                        foreach ($house_device_status as $key=>$value) {
                            ?>
                            <option value="<?=$key?>"><?=$value?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </div>

        </div>
        <div class="col-xs-12 text-center" style="margin-bottom: 10px;">
<!--            <input type="hidden" name="emp_code" id="emp_code" value="--><?//=$employee['emp_code']?><!--"/>-->
            <input type="hidden" name="from_emp_code" id="from_emp_code" value="0"/>
            <input type="hidden" name="tahwel_date" id="tahwel_date" value="<?=date('Y-m-d')?>"/>
            <input type="hidden" name="add" id="add" value="add"/>
            <button type="buttons" name="save" value="save" id="saves" class="btn btn-success btn-labeled" value="حفظ"
                    onclick="loadAddOhad('load_add_ohad');" >
                <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>حفظ
            </button>
        </div>


    </div>
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
                    <?php if (isset($all_my_ohad)) { ?>
                        <th>حذف</th>
                    <?php } ?>
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
                        <td><?= $house_device_status[$row->device_status] ?></td>

                        <td style="width: 10%">

                            <a href="#" onclick='swal({
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
                                delete_ohad(<?=$row->id?>,"load_add_ohad");
                            });'>
                            <i class="fa fa-trash"> </i></a>
                        </td>

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

</div>


<script>
function GetSubCode(main_code) {
    if (main_code > 0 && main_code != '') {

        var dataString = 'code=' + main_code;
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>human_resources/ohad/Ohad_work/GetSubCodeDevices',
            data: dataString,
            dataType: 'html',
            cache: false,
            success: function (html) {
                $('#sub_device_code').html(html);
            }
        });
        return false;

    }
}
</script>

<script>
    function loadAddOhad(div) {
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
        console.log();
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>human_resources/ohad/Ohad_work/emp_ohad/'+<?php echo $this->uri->segment(5); ?>,
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


    function delete_ohad(id,div) {
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>human_resources/ohad/Ohad_work/delete_ohad',
            data: {id: id},
            dataType: 'html',
            cache: false,
            success: function (html) {
                swal("تم الحذف!", "", "success");
                load_page(<?php echo $this->uri->segment(5); ?>,div);
                //window.location.reload();

            }
        });

    }


</script>
