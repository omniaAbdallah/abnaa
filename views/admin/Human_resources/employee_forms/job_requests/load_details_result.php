
<?php if(!empty($get_items) && isset($get_items)){ ?>
    <table id="examplee"  class="table table-striped table-bordered "   >
        <thead>
        <tr class="info">
            <th class="text-center" >م </th>
            <?php if ($type==1){ ?>
            <th class="text-center" > إسم سبب ومبرر الإحتياج </th>
            <?php }else{ ?>

                <th class="text-center" > إسم طلب العمل بالوظيفة </th>
            <?php } ?>

            <th class="text-center" > الإجراء</th>
        </tr>
        </thead>
        <tbody>
        <?php $count=1; foreach($get_items as $record){ ?>
            <tr id="row_<?=$record->id?>">
                <td style="text-align: center" ><?php echo $count++; ?></td>
                <td style="text-align: center" ><?php echo $record->details; ?></td>

                <td style="text-align: center">
                    <a href="#"  data-toggle="modal" data-target="#modal-update_<?=$record->id?>">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                    <div class="modal fade" id="modal-update_<?=$record->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document" style="width: 70%;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title"> التعديل </h4>
                                </div>
                                <?php
                                echo form_open_multipart('human_resources/employee_forms/job_requests/Job_request/Update_details/'
                                    ,array("class"=>"update_item_form_".$record->id));
                                ?>
                                <div class="modal-body" id="update_item">
                                    <div class="col-md-12 no-padding">

                                        <input type="hidden" id="id" name="id" value="<?= $record->id?>">
                                        <div class="form-group col-md-4 col-sm-6  padding-4  ">
                                            <label class="label  ">إسم سبب ومبرر الإحتياج</label>
                                            <input type="text" name="details_reason" id="details_reason" value="<?= $record->details?>"
                                                   class="form-control" data-validation="required" >
                                        </div>

                                    </div>

                                </div>
                                <div class="modal-footer" style="display: inline-block;width: 100%;">
                                    <button
                                            type="button" onclick="update_item(<?php echo $record->id;?>);"
                                            class="btn btn-labeled btn-warning ">
                                        <span class="btn-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>تعديل
                                    </button>

                                    <button type="button" class="btn btn-labeled btn-danger " onclick="$('#modal-update_<?=$record->id?>').modal('hide')">
                                        <span class="btn-label"><i class="glyphicon glyphicon-remove"></i></span>إغلاق
                                    </button>

                                </div>
                                <?php
                                echo form_close();
                                ?>
                            </div>
                        </div>
                    </div>


                    <a href="#" onclick='swal({
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
                            delete_item(<?=$record->id?>);
                        });'>
                        <i class="fa fa-trash"> </i></a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
<?php } ?>


<script>
    function delete_item(id) {
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>human_resources/employee_forms/job_requests/Job_request/delete_item',
            data: {id: id},
            dataType: 'html',
            cache: false,
            success: function (html) {
                swal({
                    title: "تم الحذف ",
                });
                $('#row_'+id).remove();
                //load_details_result();
            }
        });
    }
</script>


<script>
    function update_item(id) {
        $('#modal-update_'+id).modal('hide');
        var all_inputs = $('.update_item_form_'+id+' [data-validation="required"]');
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
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>human_resources/employee_forms/job_requests/Job_request/add_update_details',
            data: $('.update_item_form_'+id).serialize()+'&update=1',
            dataType: 'text',
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
                        title: "جاري التعديل ... ",
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
                $('#modal-update_'+id).modal('hide');
                load_details_result();
            }
        });
    }
</script>

<script>
    $('#examplee').DataTable( {
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
                exportOptions: { columns: ':visible'},
                orientation: 'landscape'
            },
            'colvis'
        ],
        colReorder: true,
        "bDestroy": true
    } );
</script>

