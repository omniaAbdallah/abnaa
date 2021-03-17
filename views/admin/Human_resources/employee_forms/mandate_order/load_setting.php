<?php if (!empty($result)) { ?>    <br><br>

    <table id="examplee" class=" table table-bordered table-striped" role="table">

    <thead>

    <tr class="greentd">

        <th width="2%">#</th>

        <th class="text-center title"><?php if (isset($type_name)) {

                echo $type_name;

            } ?></th>

        <th>الاجراء</th>

    </tr>

    </thead>

    <tbody>

    <?php $x = 1;

    foreach ($result as $row) {

        ?>

        <tr>

            <td><input style="width: 90px;height: 20px;" type="radio" name="radio" data-id="<?= $row->id_setting ?>"

                       id="f<?= $row->id_setting ?>" ondblclick="GetName(<?= $row->id_setting ?>,'<?= $row->title_setting ?>')"></td>

            <td><?= $row->title_setting ?></td>

            <td>

                <a href="#" onclick="delete_setting(<?= $row->id_setting ?>)">

                    <i class="fa fa-trash" aria-hidden="true"></i>

                </a> <a href="#" onclick="get_by_id(<?= $row->id_setting ?>)">

                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>

                </a></td>

        </tr>            <?php } ?>

    </tbody>    </table><?php } ?>



<script>



    $('#examplee').DataTable({

        dom: 'Bfrtip', buttons: ['pageLength',

            'copy', 'csv', 'excelHtml5', {

                extend: "pdfHtml5",

                orientation: 'landscape'

            }, {

                extend: 'print',

                exportOptions: {columns: ':visible'}, orientation: 'landscape'

            }, 'colvis'], colReorder: true

    });</script>

<script>

    function delete_setting(id) {

        var type = $('#type_setting').data("id");

        var type_name = $('#type_setting').data("title");

       ;

        swal({

            title: "هل أنت متأكد من الحذف ؟",

            text: "", type: "warning",

            showCancelButton: true, confirmButtonClass: "btn-danger",

            confirmButtonText: "نعم", cancelButtonText: "لا",

            closeOnConfirm: false

        }, function () {

            $.ajax({

                type: 'post',

                url: '<?php echo base_url()?>human_resources/employee_forms/Mandate_orders/delete_setting',

                data: {id: id, type: type, type_name: type_name},

                dataType: 'html',

                cache: false,

                beforeSend: function (xhr) {

                    swal({

                        title: "جاري الحذف ... ",

                        text: "",

                        imageUrl: '<?php echo base_url() . 'asisst/admin_asset/img/loader.png';?>',

                        showConfirmButton: false,

                        allowOutsideClick: false

                    });



                },

                success: function (html) {



                    $('#setting_output').html(html);

//  get_filter_data();

                    swal({



                        title: 'تم الحذف بنجاح !',

                        type: 'warning', confirmButtonText: 'تم'

                    });

                }

            });

        });

    }</script>

<script>

    function get_by_id(row_id) {

        $('#add_input').show();

        $.ajax({

            type: 'post',

            url: '<?php echo base_url()?>human_resources/employee_forms/Mandate_orders/get_setting_by_id',

            data: {row_id: row_id},

            dataType: 'html',

            cache: false,

            success: function (html) {

                var obj = JSON.parse(html);

                $('#add_title').val(obj.title_setting);

                $('#row_setting_id').val(obj.id_setting);

            }

        });

    }</script>

